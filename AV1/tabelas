--
-- Estrutura para tabela `lmz_clientes`
--

CREATE TABLE `lmz_clientes` (
  `id` int(11) NOT NULL,
  `codigoComprador` varchar(32) NOT NULL,
  `nomeComprador` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `lmz_clientes`
--

INSERT INTO `lmz_clientes` (`id`, `codigoComprador`, `nomeComprador`, `email`) VALUES
(1, '1001', 'Mario Silva', 'mario.silva@gmail.com'),
(2, '1002', 'Lucas Oliveira', 'lucas.oliveira@gmail.com'),
(3, '1003', 'Sarah Venderei', 'sarah.venderei@gmail.com'),
(4, '1004', 'Julia Souza', 'julia.souza.@gmail.com'),
(5, '1005', 'Alberto Costa', 'alberto.costa@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `lmz_compras`
--

CREATE TABLE `lmz_compras` (
  `id` int(11) NOT NULL,
  `SKU` varchar(20) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `lmz_compras`
--

INSERT INTO `lmz_compras` (`id`, `SKU`, `quantidade`) VALUES
(1, 'MES001', 150),
(2, 'COP005', 300),
(3, 'CAD004', 250),
(4, 'JAN006', 120),
(5, 'POR002', 400),
(6, 'CAM001', 380),
(7, 'FOL007', 210),
(8, 'FOT008', 320),
(9, 'OCU009', 180),
(10, 'AAA004', 90),
(11, 'RTX003', 140);

-- --------------------------------------------------------

--
-- Estrutura para tabela `lmz_entregas`
--

CREATE TABLE `lmz_entregas` (
  `id` int(11) NOT NULL,
  `codigoPedido` varchar(32) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `CEP` varchar(11) NOT NULL,
  `UF` varchar(2) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `valor` float(7,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `lmz_entregas`
--

INSERT INTO `lmz_entregas` (`id`, `codigoPedido`, `endereco`, `CEP`, `UF`, `pais`, `valor`) VALUES
(1, 'L001', 'Av. I, 1010', '54541-666', 'MG', 'Brasil', 28.00),
(2, 'L002', 'Rua F, 300', '42341-999', 'RS', 'Brasil', 23.00),
(3, 'L003', 'Av. G, 555', '54221-888', 'SP', 'Brasil', 15.00),
(4, 'L004', 'Rua H, 789', '56721-777', 'RJ', 'Brasil', 35.00),
(5, 'L005', 'Rua J, 2020', '45321-555', 'RS', 'Brasil', 38.00),
(6, 'L006', 'Av. K, 3030', '54231-444', 'RJ', 'Brasil', 29.00),
(7, 'L007', 'Rua N, 6060', '7621-111', 'BA', 'Brasil', 18.00),
(8, 'L008', 'Av. O, 7070', '76321-000', 'SP', 'Brasil', 9.00),
(9, 'L009', 'Av. U, 1313', '54389-444', 'MG', 'Brasil', 20.00),
(10, 'L010', 'Av. AA, 1919', '54366-888', 'RJ', 'Brasil', 30.00),
(11, 'L011', 'Av. Y, 1717', '54000-000', 'MG', 'Brasil', 28.00),
(12, 'L012', 'Rua T, 1212', '54099-555', 'MG', 'Brasil', 36.00),
(13, 'L013', 'Rua P, 8080', '6521-999', 'SP', 'Brasil', 14.00),
(14, 'L014', 'Av. AC, 2121', '23431-666', 'RJ', 'Brasil', 9.00),
(15, 'L015', 'Av. W, 1515', '54555-222', 'RS', 'Brasil', 40.00),
(16, 'L016', 'Rua Z, 1818', '54567-999', 'RS', 'Brasil', 45.00),
(17, 'L017', 'Rua AD, 2222', '43215-555', 'RJ', 'Brasil', 38.00),
(18, 'L018', 'Av. M, 5050', '98321-222', 'RS', 'Brasil', 42.00),
(19, 'L019', 'Rua R, 1010', '23431-777', 'RS', 'Brasil', 17.00),
(20, 'L020', 'Rua S, 1111', '12321-666', 'MG', 'Brasil', 14.00),
(21, 'L021', 'Rua Z, 1818', '54567-999', 'RS', 'Brasil\r', 45.00),
(22, 'L022', 'Av. AA, 1919', '54366-888', 'RJ', 'Brasil\r', 30.00),
(23, 'L023', 'Rua AB, 2020', '54456-777', 'MG', 'Brasil\r', 27.00),
(24, 'L024', 'Av. AC, 2121', '23431-666', 'RJ', 'Brasil\r', 9.00),
(25, 'L025', 'Rua AD, 2222', '43215-555', 'RJ', 'Brasil\r', 38.00),
(26, 'L026', 'Av. AE, 2323', '31131-444', 'RJ', 'Brasil\r', 9.00);


-- --------------------------------------------------------

--
-- Estrutura para tabela `lmz_estoque`
--

CREATE TABLE `lmz_estoque` (
  `id` int(11) NOT NULL,
  `SKU` varchar(20) NOT NULL,
  `quantidade` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `lmz_estoque`
--

INSERT INTO `lmz_estoque` (`id`, `SKU`, `quantidade`) VALUES
(1, 'MES001', 1),
(2, 'COP005', 3),
(3, 'CAD004', 4),
(4, 'JAN006', 5),
(5, 'POR002', 10),
(6, 'CAM001', 6),
(7, 'FOL007', 2),
(8, 'FOT008', 7),
(9, 'OCU009', 2),
(10, 'AAA004', 4),
(11, 'RTX003', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `lmz_itens_pedidos`
--

CREATE TABLE `lmz_itens_pedidos` (
  `id` int(11) NOT NULL,
  `codigoPedido` varchar(20) NOT NULL,
  `SKU` varchar(20) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_unitario` float(7,2) NOT NULL DEFAULT 0.00, 
  `status` enum('aprovado','cancelado','pendente') NOT NULL DEFAULT 'pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `lmz_itens_pedidos`
--

INSERT INTO `lmz_itens_pedidos` (`id`, `codigoPedido`, `SKU`, `quantidade`, `valor_unitario`, `status`) VALUES
(1, 'L001', 'MES001', 1, 79.99, 'pendente'),
(2, 'L002', 'COP005', 2, 29.90, 'pendente'),
(3, 'L003', 'CAD004', 2, 499.50, 'pendente'),
(4, 'L003', 'JAN006', 1, 199.99, 'pendente'),
(5, 'L004', 'POR002', 5, 799.95, 'pendente'),
(6, 'L004', 'CAM001', 1, 120.00, 'pendente'),
(7, 'L004', 'FOL007', 1, 1.00, 'pendente'),
(8, 'L005', 'FOT008', 3, 5.99, 'pendente'),
(9, 'L005', 'OCU009', 3, 19.90, 'pendente'),
(10, 'L006', 'AAA004', 5, 99999.90, 'pendente'),
(11, 'L006', 'RTX003', 1, 19999.00, 'pendente'),
(12, 'L007', 'MES001', 1, 79.99, 'pendente'),
(13, 'L007', 'COP005', 4, 29.90, 'pendente'),
(14, 'L008', 'CAD004', 3, 499.50, 'pendente'),
(15, 'L008', 'JAN006', 2, 199.99, 'pendente'),
(16, 'L009', 'POR002', 1, 799.95, 'pendente'),
(17, 'L009', 'CAM001', 3, 120.00, 'pendente'),
(18, 'L010', 'FOL007', 5, 1.00, 'pendente'),
(19, 'L010', 'FOT008', 4, 5.99, 'pendente'),
(20, 'L011', 'OCU009', 2, 19.90, 'pendente'),
(21, 'L012', 'AAA004', 5, 99999.90, 'pendente'),
(22, 'L012', 'RTX003', 4, 19999.00, 'pendente'),
(23, 'L012', 'MES001', 4, 79.99, 'pendente'),
(24, 'L013', 'COP005', 1, 29.90, 'pendente'),
(25, 'L013', 'CAD004', 1, 499.50, 'pendente'),
(26, 'L014', 'JAN006', 2, 199.99, 'pendente'),
(27, 'L015', 'POR002', 3, 799.95, 'pendente'),
(28, 'L015', 'CAM001', 1, 120.00, 'pendente'),
(29, 'L016', 'FOL007', 5, 1.00, 'pendente'),
(30, 'L017', 'FOT008', 4, 5.99, 'pendente'),
(31, 'L017', 'OCU009', 4, 19.90, 'pendente'),
(32, 'L018', 'AAA004', 3, 99999.90, 'pendente'),
(33, 'L018', 'RTX003', 5, 19999.00, 'pendente'),
(34, 'L019', 'MES001', 3, 79.99, 'pendente'),
(35, 'L020', 'COP005', 5, 29.90, 'pendente'),
(36, 'L020', 'CAD004', 1, 499.50, 'pendente'),
(37, 'L021', 'JAN006', 2, 199.99, 'pendente'),
(38, 'L022', 'POR002', 2, 799.95, 'pendente'),
(39, 'L023', 'CAM001', 1, 120.00, 'pendente'),
(40, 'L023', 'FOL007', 1, 1.00, 'pendente'),
(41, 'L024', 'FOT008', 3, 5.99, 'pendente'),
(42, 'L025', 'OCU009', 2, 19.90, 'pendente'),
(43, 'L025', 'AAA004', 4, 99999.90, 'pendente'),
(44, 'L026', 'RTX003', 3, 19999.00, 'pendente'),
(45, 'L027', 'MES001', 5, 79.99, 'pendente'),
(46, 'L027', 'COP005', 1, 29.90, 'pendente'),
(47, 'L028', 'CAD004', 5, 499.50, 'pendente'),
(48, 'L029', 'JAN006', 3, 199.99, 'pendente'),
(49, 'L030', 'POR002', 2, 799.95, 'pendente'),
(50, 'L031', 'CAM001', 5, 120.00, 'pendente');


-- --------------------------------------------------------

--
-- Estrutura para tabela `lmz_pedidos`
--

CREATE TABLE `lmz_pedidos` (
  `id` int(11) NOT NULL,
  `codigoPedido` varchar(32) NOT NULL,
  `codigoComprador` varchar(32) NOT NULL,
  `dataPedido` date NOT NULL,
  `valor` float(7,2) NOT NULL,
  `status` enum('aprovado','cancelado','pendente') NOT NULL DEFAULT 'pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `lmz_pedidos`
--

INSERT INTO `lmz_pedidos` (`id`, `codigoPedido`, `codigoComprador`, `dataPedido`, `valor`, `status`) VALUES
(1, 'L001', '1005', '2024-10-02', 79.99, 'pendente'),
(2, 'L002', '1001', '2024-10-03', 29.90, 'pendente'),
(3, 'L003', '1002', '2024-10-05', 499.50, 'pendente'),
(4, 'L004', '1003', '2024-10-07', 199.99, 'pendente'),
(5, 'L005', '1005', '2024-10-10', 799.95, 'pendente'),
(6, 'L006', '1002', '2024-10-11', 120.00, 'pendente'),
(7, 'L007', '1005', '2024-10-14', 1.00, 'pendente'),
(8, 'L008', '1005', '2024-10-16', 5.99, 'pendente'),
(9, 'L009', '1004', '2024-10-17', 19.90, 'pendente'),
(10, 'L010', '1001', '2024-10-23', 99999.90, 'pendente'),
(11, 'L011', '1001', '2024-10-28', 19999.00, 'pendente'),
(12, 'L012', '1003', '2024-09-02', 79.99, 'pendente'),
(13, 'L013', '1005', '2024-09-27', 29.90, 'pendente'),
(14, 'L014', '1003', '2024-09-06', 499.50, 'pendente'),
(15, 'L015', '1003', '2024-09-26', 199.99, 'pendente'),
(16, 'L016', '1003', '2024-09-16', 799.95, 'pendente'),
(17, 'L017', '1004', '2024-09-16', 120.00, 'pendente'),
(18, 'L018', '1005', '2024-09-18', 1.00, 'pendente'),
(19, 'L019', '1004', '2024-09-20', 5.99, 'pendente'),
(20, 'L020', '1003', '2024-09-27', 19.90, 'pendente'),
(21, 'L021', '1005', '2024-09-20', 99999.90, 'pendente'),
(22, 'L022', '1002', '2024-09-25', 19999.00, 'pendente'),
(23, 'L023', '1003', '2024-09-19', 79.99, 'pendente'),
(24, 'L024', '1002', '2024-09-29', 29.90, 'pendente'),
(25, 'L025', '1002', '2024-09-07', 499.50, 'pendente'),
(26, 'L026', '1002', '2024-09-14', 199.99, 'pendente'),
(27, 'L027', '1005', '2024-09-09', 799.95, 'pendente'),
(28, 'L028', '1002', '2024-09-06', 120.00, 'pendente'),
(29, 'L029', '1003', '2024-09-24', 1.00, 'pendente'),
(30, 'L030', '1001', '2024-09-12', 5.99, 'pendente'),
(31, 'L031', '1004', '2024-09-23', 19.90, 'pendente'),
(32, 'L032', '1002', '2024-09-24', 99999.90, 'pendente'),
(33, 'L033', '1005', '2024-09-01', 19999.00, 'pendente'),
(34, 'L034', '1005', '2024-09-26', 79.99, 'pendente'),
(35, 'L035', '1004', '2024-09-14', 29.90, 'pendente'),
(36, 'L036', '1005', '2024-09-01', 499.50, 'pendente'),
(37, 'L037', '1001', '2024-09-08', 199.99, 'pendente'),
(38, 'L038', '1001', '2024-09-09', 799.95, 'pendente'),
(39, 'L039', '1003', '2024-09-03', 120.00, 'pendente'),
(40, 'L040', '1002', '2024-09-10', 1.00, 'pendente'),
(41, 'L041', '1001', '2024-09-29', 5.99, 'pendente'),
(42, 'L042', '1003', '2024-09-03', 19.90, 'pendente'),
(43, 'L043', '1005', '2024-09-23', 99999.90, 'pendente'),
(44, 'L044', '1002', '2024-09-04', 19999.00, 'pendente'),
(45, 'L045', '1003', '2024-09-14', 79.99, 'pendente'),
(46, 'L046', '1004', '2024-09-29', 29.90, 'pendente'),
(47, 'L047', '1005', '2024-09-08', 499.50, 'pendente'),
(48, 'L048', '1005', '2024-09-06', 199.99, 'pendente'),
(49, 'L049', '1005', '2024-09-24', 799.95, 'pendente'),
(50, 'L050', '1003', '2024-09-22', 120.00, 'pendente');


-- --------------------------------------------------------

--
-- Estrutura para tabela `lmz_produtos`
--

CREATE TABLE `lmz_produtos` (
  `id` int(11) NOT NULL,
  `SKU` varchar(20) NOT NULL,
  `UPC` varchar(20) NOT NULL,
  `nomeProduto` varchar(50) NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `lmz_produtos`
--

INSERT INTO `lmz_produtos` (`id`, `SKU`, `UPC`, `nomeProduto`, `valor`) VALUES
(1, 'MES001', '123987654321', 'Mesa', 79.99),
(2, 'COP005', '678912345678', 'Copo', 29.90),
(3, 'CAD004', '789654123987', 'Cadeira', 499.50),
(4, 'JAN006', '321654987123', 'Janela', 199.99),
(5, 'POR002', '987321654123', 'Porta', 799.95),
(6, 'CAM001', '123654789012', 'Camera', 120.00),
(7, 'FOL007', '876543219876', 'Folha', 1.00),
(8, 'FOT008', '456789123456', 'Foto', 5.99),
(9, 'OCU009', '789123654321', 'Oculos', 19.90),
(10, 'AAA004', '654987123456', 'AAA', 99999.90),
(11, 'RTX003', '321789654123', 'RTX 4090', 19999.00);


-- --------------------------------------------------------

--
-- Estrutura para tabela `lmz_tempdata`
--

CREATE TABLE `lmz_tempdata` (
  `codigoPedido` varchar(30) NOT NULL,
  `dataPedido` date NOT NULL,
  `SKU` varchar(20) NOT NULL,
  `UPC` varchar(20) NOT NULL,
  `nomeProduto` varchar(100) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` float NOT NULL,
  `frete` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `codigoComprador` varchar(4) NOT NULL,
  `nomeComprador` varchar(50) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `CEP` varchar(11) NOT NULL,
  `UF` varchar(2) NOT NULL,
  `pais` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `lmz_tempdata_estoque`
--

CREATE TABLE `lmz_tempdata_estoque` (
  `SKU` varchar(20) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `lmz_tempdata_estoque`
--

INSERT INTO lmz_tempdata_estoque (SKU, quantidade) VALUES
('MES001', 2),
('COP005', 4),
('CAD004', 5),
('JAN006', 8),
('POR002', 15),
('CAM001', 9),
('FOL007', 2),
('FOT008', 7),
('OCU009', 2),
('AAA004', 4),
('RTX003', 2);


-- --------------------------------------------------------

--

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `lmz_clientes`
--
ALTER TABLE `lmz_clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigoComprador` (`codigoComprador`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `lmz_compras`
--
ALTER TABLE `lmz_compras`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `SKU` (`SKU`);

--
-- Índices de tabela `lmz_entregas`
--
ALTER TABLE `lmz_entregas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigoPedido` (`codigoPedido`);

--
-- Índices de tabela `lmz_estoque`
--
ALTER TABLE `lmz_estoque`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `SKU` (`SKU`);

--
-- Índices de tabela `lmz_itens_pedidos`
--
ALTER TABLE `lmz_itens_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ItensPedidosCodigoComprador` (`codigoPedido`),
  ADD KEY `FK_ItensPedidosSKU` (`SKU`);

--
-- Índices de tabela `lmz_pedidos`
--
ALTER TABLE `lmz_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigoPedido` (`codigoPedido`),
  ADD KEY `FK_PedidosComprador` (`codigoComprador`);

--
-- Índices de tabela `lmz_produtos`
--
ALTER TABLE `lmz_produtos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `SKU` (`SKU`),
  ADD UNIQUE KEY `UPC` (`UPC`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `lmz_clientes`
--
ALTER TABLE `lmz_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `lmz_compras`
--
ALTER TABLE `lmz_compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `lmz_entregas`
--
ALTER TABLE `lmz_entregas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=512;

--
-- AUTO_INCREMENT de tabela `lmz_estoque`
--
ALTER TABLE `lmz_estoque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `lmz_itens_pedidos`
--
ALTER TABLE `lmz_itens_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1024;

--
-- AUTO_INCREMENT de tabela `lmz_pedidos`
--
ALTER TABLE `lmz_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=512;

--
-- AUTO_INCREMENT de tabela `lmz_produtos`
--
ALTER TABLE `lmz_produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `lmz_compras`
--
ALTER TABLE `lmz_compras`
  ADD CONSTRAINT `FK_ComprasSKU` FOREIGN KEY (`SKU`) REFERENCES `lmz_produtos` (`SKU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `lmz_entregas`
--
ALTER TABLE `lmz_entregas`
  ADD CONSTRAINT `FK_EntregasCodigoPedido` FOREIGN KEY (`codigoPedido`) REFERENCES `lmz_pedidos` (`codigoPedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `lmz_estoque`
--
ALTER TABLE `lmz_estoque`
  ADD CONSTRAINT `FK_EstoqueSKU` FOREIGN KEY (`SKU`) REFERENCES `lmz_produtos` (`SKU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `lmz_itens_pedidos`
--
ALTER TABLE `lmz_itens_pedidos`
  ADD CONSTRAINT `FK_ItensPedidosCodigoComprador` FOREIGN KEY (`codigoPedido`) REFERENCES `lmz_pedidos` (`codigoPedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ItensPedidosSKU` FOREIGN KEY (`SKU`) REFERENCES `lmz_produtos` (`SKU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `lmz_pedidos`
--
ALTER TABLE `lmz_pedidos`
  ADD CONSTRAINT `FK_PedidosComprador` FOREIGN KEY (`codigoComprador`) REFERENCES `lmz_clientes` (`codigoComprador`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

ALTER TABLE lmz_tempdata ADD PRIMARY KEY (`codigoPedido`);



