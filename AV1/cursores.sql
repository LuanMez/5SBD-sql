--1 Cursor
CREATE PROCEDURE lmz_processar_estoque()
BEGIN

    -- Declaração de variáveis para armazenar os valores do cursor
    DECLARE v_SKU VARCHAR(20);         
    DECLARE v_quantidade INT;       
    DECLARE pronto INT DEFAULT 0;      

    -- Declaração do cursor para selecionar os valores da tabela temporária de estoque
    DECLARE cursor_estoque CURSOR FOR 
        SELECT SKU, quantidade FROM lmz_tempdata_estoque;

    -- Tratamento de exceção: define o valor de 'pronto' como 1 quando não houver mais registros para buscar no cursor
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET pronto = 1;

    -- Abrindo o cursor para iniciar a leitura dos dados
    OPEN cursor_estoque;

    -- Loop para processar os dados do cursor até que todos os registros sejam processados
    read_loop: LOOP

        -- Buscar os valores de SKU e quantidade do cursor
        FETCH cursor_estoque INTO v_SKU, v_quantidade;

        -- Se o valor de 'pronto' for 1, significa que não há mais registros; sai do loop
        IF pronto THEN
            LEAVE read_loop;
        END IF;

        -- Atualizar a quantidade do produto no estoque somando a quantidade recebida
        UPDATE lmz_estoque 
        SET quantidade = quantidade + v_quantidade 
        WHERE SKU = v_SKU;

        -- Atualizar a quantidade de produtos comprados subtraindo a quantidade recebida
        UPDATE lmz_compras 
        SET quantidade = quantidade - v_quantidade 
        WHERE SKU = v_SKU;
        
    END LOOP;

    -- Remover da tabela 'lmz_compras' os registros onde a quantidade de compras for menor ou igual a zero
    DELETE FROM lmz_compras WHERE quantidade <= 0;

    -- Limpeza da tabela temporária de estoque (desativada, mas pode ser ativada se necessário)
    -- TRUNCATE TABLE lmz_tempdata_estoque;

END

--2 Cursor

DELIMITER //

CREATE DEFINER=`root`@`localhost` PROCEDURE `lmz_processar_pedidos`()
BEGIN
    DECLARE v_codigoPedido VARCHAR(20);
    DECLARE v_statusPedido VARCHAR(20);
    DECLARE v_codigoProduto VARCHAR(20);
    DECLARE v_quantidade INT;
    DECLARE pronto INT DEFAULT 0;
    DECLARE itens_aprovados INT DEFAULT 1;  -- Variável local sem o símbolo @

    -- Declarações de cursores
    DECLARE cursor_pedidos CURSOR FOR SELECT codigoPedido, status FROM lmz_pedidos;
    DECLARE cursor_itens CURSOR FOR SELECT SKU, quantidade FROM lmz_itens_pedidos;
    
    -- Declarando o handler para não encontrar dados
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET pronto = 1;

    -- 01. Limpar a tabela tempdata
    TRUNCATE TABLE lmz_tempdata;

    -- 02. Processar os pedidos
    OPEN cursor_pedidos;

    pedidos_loop: LOOP
        FETCH cursor_pedidos INTO v_codigoPedido, v_statusPedido;

        -- Se não houver mais linhas, saia do loop
        IF pronto THEN
            LEAVE pedidos_loop;
        END IF;

        -- Inicializa a flag como 1 (pedido aprovado inicialmente)
        SET itens_aprovados = 1;

        -- Verificar se o pedido está em análise ou pendente
        IF v_statusPedido = 'pendente' THEN
            OPEN cursor_itens;

            itens_loop: LOOP
                FETCH cursor_itens INTO v_codigoProduto, v_quantidade;

                -- Se não houver mais linhas, saia do loop
                IF pronto THEN
                    LEAVE itens_loop;
                END IF;

                -- Para cada item do pedido, verificar se há estoque suficiente
                IF (SELECT quantidade FROM lmz_estoque WHERE SKU = v_codigoProduto) < v_quantidade THEN
                    -- Atualizar a flag, pois há estoque insuficiente
                    SET itens_aprovados = 0;

                    -- Verificar se o item está na tabela de compras
                    IF EXISTS (SELECT 1 FROM lmz_compras WHERE SKU = v_codigoProduto) THEN
                        -- Se estiver, atualizar a quantidade na tabela de compras
                        UPDATE lmz_compras 
                        SET quantidade = quantidade + v_quantidade 
                        WHERE SKU = v_codigoProduto;
                    ELSE
                        -- Se não estiver, adicionar à tabela de compras
                        INSERT INTO lmz_compras (SKU, quantidade) 
                        VALUES (v_codigoProduto, v_quantidade);
                    END IF;

                    -- Atualizar o status do item do pedido para "pendente"
                    UPDATE lmz_itens_pedidos 
                    SET status = 'pendente' 
                    WHERE codigoPedido = v_codigoPedido 
                      AND SKU = v_codigoProduto;

                ELSE
                    -- Se houver estoque suficiente, atualizar o status do item para "aprovado"
                    UPDATE lmz_itens_pedidos 
                    SET status = 'aprovado' 
                    WHERE codigoPedido = v_codigoPedido 
                      AND SKU = v_codigoProduto;

                    -- Atualizar a quantidade do SKU na tabela de estoque
                    UPDATE lmz_estoque 
                    SET quantidade = quantidade - v_quantidade 
                    WHERE SKU = v_codigoProduto;
                END IF;
            END LOOP;

            CLOSE cursor_itens;

            -- Se todos os itens do pedido foram aprovados, atualizar o status do pedido
            IF itens_aprovados = 1 THEN
                UPDATE lmz_pedidos 
                SET status = 'aprovado' 
                WHERE codigoPedido = v_codigoPedido;
            ELSE
                UPDATE lmz_pedidos 
                SET status = 'pendente' 
                WHERE codigoPedido = v_codigoPedido;
            END IF;
        END IF;

    END LOOP;

    CLOSE cursor_pedidos;

END//
DELIMITER ;
