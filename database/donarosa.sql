-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Nov-2019 às 20:33
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `donarosa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `nome_cargo` varchar(255) NOT NULL,
  `status_cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`id_cargo`, `nome_cargo`, `status_cargo`) VALUES
(1, 'caixa', 0),
(2, 'garcom', 0),
(3, 'admnistrador', 0),
(4, 'cozinheiro', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `status_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nome`, `status_categoria`) VALUES
(4, 'Cervejas', 0),
(5, 'Lanches', 0),
(6, 'Sucos', 0),
(12, 'Petisco', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cep` int(11) NOT NULL,
  `telefone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comandas`
--

CREATE TABLE `comandas` (
  `c_id` int(11) NOT NULL,
  `c_comanda` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `forma_pagamento`
--

CREATE TABLE `forma_pagamento` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `forma_pagamento`
--

INSERT INTO `forma_pagamento` (`id`, `nome`) VALUES
(1, 'Dinheiro'),
(2, 'Cartão Credito '),
(3, 'Cartão Debito');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

CREATE TABLE `itens` (
  `iditens` int(10) NOT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `observacao` varchar(45) DEFAULT NULL,
  `data_hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_produtos_fk` int(10) DEFAULT NULL,
  `id_pedido` int(10) UNSIGNED NOT NULL,
  `status_pedido` int(11) NOT NULL DEFAULT 0,
  `status_notificacao` int(11) NOT NULL DEFAULT 0,
  `status_finalizado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `itens`
--

INSERT INTO `itens` (`iditens`, `preco`, `observacao`, `data_hora`, `id_produtos_fk`, `id_pedido`, `status_pedido`, `status_notificacao`, `status_finalizado`) VALUES
(76, '10.00', 'New Text', '2019-11-29 18:22:04', 17, 98, 0, 0, 0),
(77, '20.00', 'New Text', '2019-11-29 18:22:04', 36, 99, 0, 0, 0),
(78, '10.00', 'New Text', '2019-11-29 18:22:04', 17, 100, 0, 0, 0),
(79, '10.00', 'New Text', '2019-11-29 18:22:04', 17, 101, 0, 0, 0),
(80, '10.00', 'New Text', '2019-11-29 18:22:04', 17, 102, 0, 0, 0),
(82, '10.00', 'New Text', '2019-11-29 18:22:04', 17, 103, 0, 0, 0),
(83, '10.00', 'New Text', '2019-11-29 18:22:04', 17, 60, 0, 0, 0),
(84, '10.00', 'New Text', '2019-11-29 18:22:04', 17, 60, 0, 0, 0),
(85, '10.00', 'New Text', '2019-11-29 18:22:04', 17, 60, 0, 0, 0),
(86, '10.00', 'New Text', '2019-11-29 18:22:04', 17, 104, 0, 0, 0),
(87, '10.00', 'New Text', '2019-11-29 18:22:04', 17, 105, 0, 0, 0),
(88, '10.00', 'New Text', '2019-11-29 18:22:04', 17, 105, 0, 0, 0),
(89, '10.00', 'New Text', '2019-11-29 18:22:04', 17, 105, 0, 0, 0),
(90, '10.00', 'New Text', '2019-11-29 18:22:04', 17, 106, 0, 0, 0),
(91, '10.00', 'New Text', '2019-11-29 18:22:04', 17, 108, 0, 0, 0),
(92, '10.00', 'New Text', '2019-11-29 18:22:04', 17, 110, 0, 0, 0),
(94, '10.00', 'Sem Gelo', '2019-11-29 18:22:04', 17, 120, 0, 0, 0),
(96, '10.00', 'New Text', '2019-11-29 18:22:04', 17, 121, 0, 0, 0),
(97, '10.00', 'New Text', '2019-11-29 18:22:04', 17, 120, 0, 0, 0),
(98, '10.00', 'New Text', '2019-11-29 18:22:04', 17, 60, 0, 0, 0),
(99, '10.00', 'sem gelo', '2019-11-29 18:22:04', 17, 120, 0, 0, 0),
(100, '10.00', 'New Text', '2019-11-29 18:22:04', 17, 60, 0, 0, 0),
(101, '10.00', 'New Text', '2019-11-29 18:22:04', 17, 60, 0, 0, 0),
(119, '10.00', 'New Text', '2019-11-29 18:35:19', 17, 60, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesa`
--

CREATE TABLE `mesa` (
  `idmesa` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mesa`
--

INSERT INTO `mesa` (`idmesa`, `numero`, `status`) VALUES
(8, 3, 1),
(9, 9, 1),
(10, 11, 1),
(12, 12, 1),
(13, 13, 0),
(14, 14, 0),
(15, 15, 0),
(16, 16, 0),
(17, 0, 0),
(18, 20, 0),
(20, 4, 0),
(50, 50, 0),
(51, 51, 0),
(53, 0, 0),
(57, 0, 0),
(99, 99, 0),
(100, 100, 0),
(103, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `idpedido` int(10) UNSIGNED NOT NULL,
  `idmesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`idpedido`, `idmesa`) VALUES
(1, 8),
(2, 8),
(3, 8),
(4, 8),
(5, 8),
(7, 8),
(8, 8),
(9, 8),
(12, 8),
(13, 8),
(14, 8),
(15, 8),
(16, 8),
(24, 8),
(29, 8),
(55, 8),
(110, 8),
(111, 8),
(121, 8),
(122, 8),
(19, 9),
(30, 9),
(31, 9),
(57, 9),
(78, 9),
(84, 9),
(93, 9),
(94, 9),
(96, 9),
(98, 9),
(99, 9),
(102, 9),
(106, 9),
(107, 9),
(112, 9),
(123, 9),
(130, 9),
(20, 10),
(41, 10),
(60, 10),
(67, 10),
(68, 10),
(79, 10),
(86, 10),
(87, 10),
(124, 10),
(125, 10),
(126, 10),
(127, 10),
(128, 10),
(129, 10),
(132, 10),
(134, 10),
(46, 12),
(62, 12),
(63, 12),
(131, 12),
(133, 12),
(26, 13),
(27, 13),
(28, 13),
(45, 13),
(69, 13),
(70, 13),
(25, 14),
(44, 14),
(54, 14),
(75, 14),
(76, 14),
(104, 14),
(43, 15),
(49, 15),
(53, 15),
(40, 16),
(42, 16),
(52, 16),
(72, 16),
(33, 17),
(34, 17),
(35, 17),
(36, 17),
(37, 17),
(38, 17),
(51, 17),
(32, 18),
(39, 18),
(47, 18),
(48, 18),
(50, 18),
(77, 18),
(82, 18),
(83, 18),
(88, 18),
(89, 18),
(90, 18),
(97, 18),
(100, 18),
(103, 18),
(105, 18),
(59, 20),
(108, 20),
(56, 50),
(58, 51),
(64, 53),
(101, 53),
(73, 57),
(109, 57),
(61, 99),
(65, 100),
(66, 100),
(85, 100),
(71, 103),
(74, 103),
(80, 103),
(81, 103),
(91, 103),
(92, 103),
(95, 103),
(113, 103),
(114, 103),
(115, 103),
(116, 103),
(117, 103),
(118, 103),
(119, 103),
(120, 103);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido_forma_pagamento`
--

CREATE TABLE `pedido_forma_pagamento` (
  `id` int(11) NOT NULL,
  `pedido_id` int(10) UNSIGNED NOT NULL,
  `forma_pagamento_id` int(11) NOT NULL,
  `valor` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedido_forma_pagamento`
--

INSERT INTO `pedido_forma_pagamento` (`id`, `pedido_id`, `forma_pagamento_id`, `valor`) VALUES
(1, 113, 1, '17.00'),
(2, 113, 2, '10.00'),
(3, 113, 3, '10.00'),
(4, 200, 3, '12.00'),
(6, 90, 3, '0.00'),
(7, 60, 1, '0.00'),
(8, 120, 3, '3.10'),
(9, 10, 2, '10.00'),
(10, 60, 2, '30.00'),
(11, 120, 1, '10.00'),
(12, 120, 1, '10.00'),
(13, 120, 1, '3.10'),
(14, 119, 1, '2.00'),
(15, 119, 2, '2.00'),
(16, 119, 3, '2.60'),
(17, 0, 1, '0.00'),
(18, 0, 1, '0.00'),
(19, 0, 1, '0.00'),
(20, 118, 1, '2.00'),
(21, 118, 2, '2.00'),
(22, 118, 3, '2.60'),
(23, 121, 1, '5.00'),
(24, 121, 2, '5.00'),
(25, 121, 3, '7.60');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `idprodutos` int(10) NOT NULL,
  `categoria_idcategoria` int(10) UNSIGNED NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `status_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`idprodutos`, `categoria_idcategoria`, `descricao`, `preco`, `status_produto`) VALUES
(17, 4, 'Brama', '10.00', 0),
(18, 6, 'Uva', '20.00', 1),
(21, 5, 'X-Tudo', '17.00', 1),
(22, 5, 'X-Frango', '5.00', 1),
(36, 4, 'Skoll', '20.00', 1),
(37, 5, 'X-Frango', '8.00', 0),
(38, 6, 'Uva', '5.00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `id_cargo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `login`, `senha`, `id_cargo`) VALUES
(9, 'admin', 'admin', 3),
(10, 'garcom', 'garcom', 2),
(11, 'cozinheiro', 'cozinheiro', 4),
(12, 'caixa', 'caixa', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Índices para tabela `comandas`
--
ALTER TABLE `comandas`
  ADD PRIMARY KEY (`c_id`);

--
-- Índices para tabela `forma_pagamento`
--
ALTER TABLE `forma_pagamento`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`iditens`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_produtos_fk` (`id_produtos_fk`) USING BTREE,
  ADD KEY `id_produtos_fk_2` (`id_produtos_fk`) USING BTREE;

--
-- Índices para tabela `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`idmesa`),
  ADD KEY `idmesa` (`idmesa`) USING BTREE;

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idpedido`) USING BTREE,
  ADD KEY `idemesa_fk` (`idmesa`) USING BTREE;

--
-- Índices para tabela `pedido_forma_pagamento`
--
ALTER TABLE `pedido_forma_pagamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`),
  ADD KEY `forma_pagamento_id` (`forma_pagamento_id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`idprodutos`),
  ADD UNIQUE KEY `idprodutos` (`idprodutos`),
  ADD KEY `produtos_FKIndex1` (`categoria_idcategoria`),
  ADD KEY `descricao` (`descricao`),
  ADD KEY `descricao_2` (`descricao`),
  ADD KEY `descricao_3` (`descricao`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cargo` (`id_cargo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `comandas`
--
ALTER TABLE `comandas`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `forma_pagamento`
--
ALTER TABLE `forma_pagamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `itens`
--
ALTER TABLE `itens`
  MODIFY `iditens` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT de tabela `mesa`
--
ALTER TABLE `mesa`
  MODIFY `idmesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idpedido` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT de tabela `pedido_forma_pagamento`
--
ALTER TABLE `pedido_forma_pagamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `idprodutos` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `itens`
--
ALTER TABLE `itens`
  ADD CONSTRAINT `id_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`idpedido`),
  ADD CONSTRAINT `id_produtos_fk` FOREIGN KEY (`id_produtos_fk`) REFERENCES `produtos` (`idprodutos`);

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `idemesa_fk` FOREIGN KEY (`idmesa`) REFERENCES `mesa` (`idmesa`);

--
-- Limitadores para a tabela `pedido_forma_pagamento`
--
ALTER TABLE `pedido_forma_pagamento`
  ADD CONSTRAINT `pedido_forma_pagamento_ibfk_1` FOREIGN KEY (`forma_pagamento_id`) REFERENCES `forma_pagamento` (`id`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`categoria_idcategoria`) REFERENCES `categoria` (`idcategoria`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_cargo` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id_cargo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
