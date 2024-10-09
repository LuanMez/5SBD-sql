--Inserindo o dados nas tabelas
-- Carregando os dados de pedidos
LOAD DATA INFILE 'C:/Produtos/pedidos.csv'
INTO TABLE lmz_tempdata
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

-- Chamando o processamento de pedidos
CALL lmz_processar_pedidos();

-- Carregar o arquivo CSV na tabela temporária
LOAD DATA INFILE 'C:/Produtos/estoque.csv'
INTO TABLE lmz_tempdata_estoque
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS;

-- Processar o estoque
CALL lmz_processar_estoque();
