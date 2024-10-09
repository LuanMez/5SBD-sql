-- 1.cursor processar pedidos
DELIMITER // 
CREATE PROCEDURE lmz_processar_pedidos()
BEGIN

    DECLARE v_codigoPedido VARCHAR(20);
    DECLARE v_statusPedido VARCHAR(20);
    DECLARE v_codigoProduto VARCHAR(20);
    DECLARE v_quantidade INT;
    DECLARE fim_pedidos INT DEFAULT 0;
    DECLARE fim_itens INT DEFAULT 0;

    -- 01. Verificar e alterar código do pedido se necessário
    DECLARE v_pedidoDuplicado INT DEFAULT 0;

    -- Declarações de cursores
    DECLARE cursor_processar_pedidos CURSOR FOR 
        SELECT codigoPedido, status FROM lmz_pedidos;
    DECLARE cursor_processar_itens CURSOR FOR 
        SELECT SKU, quantidade FROM lmz_itens_pedidos;
    
    -- Tratamento de exceção: define fim como 1 quando não houver mais registros
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET fim_pedidos = 1, fim_itens = 1;

    -- 02.1 a 02.6 - Inserções nas tabelas relevantes (mesma lógica)
    
    -- 03. Limpar a tabela `tempdata`
    TRUNCATE TABLE lmz_tempdata;

    -- Abrir o cursor de pedidos
    OPEN cursor_processar_pedidos;

    -- Processar os pedidos pendentes com WHILE
    WHILE fim_pedidos = 0 DO

        -- Buscar os valores de pedido
        FETCH cursor_processar_pedidos INTO v_codigoPedido, v_statusPedido;

        -- Verificar se o pedido está em análise ou pendente
        IF v_statusPedido = 'pendente' THEN

            -- Abrir o cursor de itens
            OPEN cursor_processar_itens;

            -- Processar os itens do pedido com WHILE
            WHILE fim_itens = 0 DO

                -- Buscar os valores dos itens
                FETCH cursor_processar_itens INTO v_codigoProduto, v_quantidade;

                -- Para cada item do pedido, verificar se há estoque
                IF (SELECT quantidade FROM lmz_estoque WHERE SKU = v_codigoProduto) >= v_quantidade THEN

                    -- Atualizar o status do item para 'aprovado'
                    UPDATE lmz_itens_pedidos 
                    SET status = 'aprovado' 
                    WHERE codigoPedido = v_codigoPedido AND SKU = v_codigoProduto;

                    -- Atualizar a quantidade do SKU no estoque
                    UPDATE lmz_estoque 
                    SET quantidade = quantidade - v_quantidade 
                    WHERE SKU = v_codigoProduto;

                ELSE
                    -- Atualizar o status do pedido e do item para 'pendente'
                    UPDATE lmz_pedidos 
                    SET status = 'pendente' 
                    WHERE codigoPedido = v_codigoPedido;

                    UPDATE lmz_itens_pedidos 
                    SET status = 'pendente' 
                    WHERE codigoPedido = v_codigoPedido AND SKU = v_codigoProduto;

                    -- Se o produto já estiver na lista de compras, atualiza; senão, insere
                    IF EXISTS (SELECT 1 FROM lmz_compras WHERE SKU = v_codigoProduto) THEN
                        UPDATE lmz_compras 
                        SET quantidade = quantidade + v_quantidade 
                        WHERE SKU = v_codigoProduto;
                    ELSE
                        INSERT INTO lmz_compras (SKU, quantidade) 
                        VALUES (v_codigoProduto, v_quantidade - (SELECT quantidade FROM lmz_estoque WHERE SKU = v_codigoProduto));
                    END IF;

                END IF;

            END WHILE;

            -- Fechar o cursor de itens
            CLOSE cursor_processar_itens;

            -- Verificar se todos os itens do pedido foram aprovados
            IF NOT EXISTS (SELECT 1 FROM lmz_itens_pedidos WHERE codigoPedido = v_codigoPedido AND status = 'pendente') THEN
                UPDATE lmz_pedidos 
                SET status = 'aprovado' 
                WHERE codigoPedido = v_codigoPedido;
            END IF;

        END IF;

    END WHILE;

    -- Fechar o cursor de pedidos
    CLOSE cursor_processar_pedidos;

END//
DELIMITER ;


-- 2.cursor processar estoque
DELIMITER // 
CREATE PROCEDURE lmz_processar_estoque()
BEGIN

    -- Variáveis para armazenar os valores do cursor
    DECLARE var_SKU VARCHAR(20);       
    DECLARE var_quantidade INT;    
    DECLARE fim INT DEFAULT 0;         

    -- Cursor para selecionar os valores da tabela temporária
    DECLARE cursor_processar_estoque CURSOR FOR 
        SELECT SKU, quantidade FROM lmz_tempdata_estoque;

    -- Tratamento de exceção: define 'fim' como 1 quando não houver mais registros
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET fim = 1;

    -- Iniciar o cursor
    OPEN cursor_processar_estoque;

    -- Enquanto não atingir o fim, continuar processando
    WHILE fim = 0 DO

        -- Buscar os valores de SKU e quantidade
        FETCH cursor_processar_estoque INTO var_SKU, var_quantidade;

        -- Atualiza a tabela de estoque
        UPDATE lmz_estoque 
        SET quantidade = quantidade + var_quantidade 
        WHERE SKU = var_SKU;

        -- Atualiza a tabela de compras
        UPDATE lmz_compras 
        SET quantidade = quantidade - var_quantidade 
        WHERE SKU = var_SKU;

    END WHILE;

    -- Fechar o cursor após o processamento
    CLOSE cursor_processar_estoque;

    -- Remover registros de compras com quantidade <= 0
    DELETE FROM lmz_compras WHERE quantidade <= 0;

    -- Limpar a tabela temporária de estoque (opcional)
    -- TRUNCATE TABLE lmz_tempdata_estoque;

END //
DELIMITER ;
