-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2019 at 02:47 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventario`
--

-- --------------------------------------------------------

--
-- Table structure for table `armazem`
--

CREATE TABLE `armazem` (
  `id_armazem` int(11) NOT NULL,
  `cidade` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `armazem`
--

INSERT INTO `armazem` (`id_armazem`, `cidade`) VALUES
(9, 'Notre Dame'),
(10, 'Boralus'),
(11, 'Ionia'),
(12, 'Warspear');

-- --------------------------------------------------------

--
-- Table structure for table `armazeminventario`
--

CREATE TABLE `armazeminventario` (
  `id_armazem` int(11) NOT NULL,
  `id_personagem` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `armazeminventario`
--

INSERT INTO `armazeminventario` (`id_armazem`, `id_personagem`, `id_item`, `quantidade`) VALUES
(9, 1, 6, 200),
(9, 5, 7, 50);

-- --------------------------------------------------------

--
-- Table structure for table `equipamento`
--

CREATE TABLE `equipamento` (
  `id_personagem` int(11) NOT NULL,
  `id_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipamento`
--

INSERT INTO `equipamento` (`id_personagem`, `id_item`) VALUES
(4, 1),
(5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `inventario`
--

CREATE TABLE `inventario` (
  `id_personagem` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventario`
--

INSERT INTO `inventario` (`id_personagem`, `id_item`, `quantidade`) VALUES
(4, 1, 1),
(5, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `preco_base` float NOT NULL,
  `dano` int(11) NOT NULL,
  `forca` int(11) NOT NULL,
  `intelecto` int(11) NOT NULL,
  `vigor` int(11) NOT NULL,
  `armadura` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `classes` varchar(32) NOT NULL,
  `durabilidade` int(11) NOT NULL,
  `peso` float NOT NULL DEFAULT 0,
  `desc` varchar(256) DEFAULT NULL,
  `flags` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `nome`, `preco_base`, `dano`, `forca`, `intelecto`, `vigor`, `armadura`, `tipo`, `classes`, `durabilidade`, `peso`, `desc`, `flags`) VALUES
(1, 'Machadao do Jurado', 470580, 1200, 344, 0, 586, 0, 0, 'guerreiro', 85, 20, NULL, ''),
(2, 'Picareta de Mineracao do Peao', 29083400, 62, 16, 0, 24, 0, 0, '', 90, 15, NULL, NULL),
(3, 'Cajado de Dominancia', 10180000, 24, 0, 68, 23, 0, 0, '', 120, 16.5, NULL, NULL),
(4, 'Cajado do Sabio da Montanha', 410000000, 536, 0, 1531, 586, 0, 0, 'elfo; elfo negro.', 85, 14.6, NULL, ''),
(5, 'Cajado Corrompido do Gladiador', 123069000, 406, 0, 1531, 586, 0, 0, 'elfo.', 70, 19.8, NULL, ''),
(6, 'Pocao de vida', 50, 0, 0, 0, 0, 0, 8, '', 0, 0.1, 'Recupera 200 de vida', ''),
(7, 'Pocao de mana', 65, 0, 0, 0, 0, 0, 8, '', 0, 0.1, 'Recupera 150 de mana', NULL),
(10, 'Anel Medonho do Pirata', 4530240, 0, 0, 0, 12, 0, 7, '', 0, 0.2, NULL, NULL),
(11, 'Anel das Mares', 2000010, 18, 0, 0, 0, 0, 7, '', 0, 0, 'A misteriosa safira revela as profundezas rodopiantes do mar.', NULL),
(14, 'Elmo de Placa do Gladiador Notorio', 40530200, 0, 495, 495, 864, 471, 2, 'guerreiro', 100, 5, NULL, NULL),
(15, 'Capuz do Senhor do Fogo', 13780800, 0, 0, 16, 37, 13, 2, 'elfo', 100, 0, NULL, NULL),
(16, 'Adaga Eletrificada', 97660000, 152, 0, 0, 191, 0, 1, '', 45, 4, NULL, NULL),
(17, 'Punhal do Feiticeiro', 8560450, 80, 0, 8, 8, 0, 1, '', 32, 3.2, NULL, NULL),
(18, 'Peitoral do Passageiro Sortudo', 100000000, 0, 826, 826, 1551, 845, 3, '', 165, 18, NULL, NULL),
(19, 'Peitoral Glorioso', 10780100, 0, 0, 0, 0, 579, 3, '', 115, 14, NULL, NULL),
(20, 'Calcas do Golpe Magico', 60940800, 0, 0, 19, 9, 10, 4, '', 56, 8.5, NULL, NULL),
(21, 'Calcas de Couro Repulsivas', 54650200, 0, 0, 44, 65, 38, 4, '', 68, 6.2, NULL, NULL),
(24, 'Sapatos de Tecido Grosso', 300420, 0, 0, 0, 0, 24, 5, '', 30, 0, NULL, NULL),
(25, 'Sapatos do Conjurador', 210360, 0, 0, 0, 0, 32, 5, '', 35, 0, NULL, NULL),
(26, 'Colar Danificado', 12000400, 0, 0, 188, 0, 0, 0, '', 100, 0, NULL, NULL),
(27, 'Colar Danificado', 12000400, 0, 0, 188, 0, 0, 6, '', 100, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personagem`
--

CREATE TABLE `personagem` (
  `id_personagem` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `experiencia` float DEFAULT 0,
  `sexo` char(1) NOT NULL,
  `classe` varchar(100) NOT NULL,
  `carteira` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='FON	';

--
-- Dumping data for table `personagem`
--

INSERT INTO `personagem` (`id_personagem`, `id_usuario`, `name`, `experiencia`, `sexo`, `classe`, `carteira`) VALUES
(1, 4, 'Matador_de_OncaXD', 8000, 'M', 'viking', 0),
(2, 4, 'Cacador_de_Vampiros12', 12000, 'M', 'elfo sombrio', 1200000),
(3, 2, 'MainYassuo2kk', 1280000, 'M', 'elfo', 202020),
(4, 1, 'Gabrutinha', 66666, 'F', 'viking', 123456),
(5, 3, 'AnnaBele', 6666670, 'F', 'elfo negro', 6666670);

-- --------------------------------------------------------

--
-- Table structure for table `pre_compra`
--

CREATE TABLE `pre_compra` (
  `id` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `preco_unit` float NOT NULL,
  `quantidade` int(11) DEFAULT 0,
  `id_comprador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pre_compra`
--

INSERT INTO `pre_compra` (`id`, `id_item`, `preco_unit`, `quantidade`, `id_comprador`) VALUES
(1, 6, 58, 200, 2),
(2, 6, 62, 66, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tipo_item`
--

CREATE TABLE `tipo_item` (
  `id` int(11) NOT NULL,
  `descricao` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipo_item`
--

INSERT INTO `tipo_item` (`id`, `descricao`) VALUES
(0, 'arma primaria'),
(1, 'arma secundaria'),
(2, 'cabeca'),
(3, 'parte superior'),
(4, 'parte inferior'),
(5, 'calcado'),
(6, 'colar'),
(7, 'anel'),
(8, 'consumivel');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `login` varchar(256) NOT NULL COMMENT 'Email do usuario',
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `login`, `senha`) VALUES
(1, 'gabi@jogador.com', '123456'),
(2, 'yasuosoloq@jogador.com', '121212'),
(3, 'aninha2019@jogador.com', 'X666X'),
(4, 'pedraoDestruidor@jogador.com', 'SoPedrada');

-- --------------------------------------------------------

--
-- Table structure for table `venda`
--

CREATE TABLE `venda` (
  `id` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `preco_unit` float NOT NULL,
  `quantidade` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venda`
--

INSERT INTO `venda` (`id`, `id_vendedor`, `id_item`, `preco_unit`, `quantidade`) VALUES
(1, 5, 1, 512000, 1),
(2, 5, 7, 60, 50),
(3, 4, 2, 29080000, 1),
(4, 3, 4, 410050000, 1),
(5, 3, 7, 70, 36);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `armazem`
--
ALTER TABLE `armazem`
  ADD PRIMARY KEY (`id_armazem`);

--
-- Indexes for table `armazeminventario`
--
ALTER TABLE `armazeminventario`
  ADD PRIMARY KEY (`id_armazem`,`id_item`,`id_personagem`),
  ADD KEY `FK_armInvItem` (`id_item`),
  ADD KEY `id_personagem` (`id_personagem`);

--
-- Indexes for table `equipamento`
--
ALTER TABLE `equipamento`
  ADD PRIMARY KEY (`id_personagem`,`id_item`),
  ADD KEY `id_item` (`id_item`);

--
-- Indexes for table `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_personagem`,`id_item`),
  ADD KEY `FK_invItem` (`id_item`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `tipo` (`tipo`);

--
-- Indexes for table `personagem`
--
ALTER TABLE `personagem`
  ADD PRIMARY KEY (`id_personagem`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `pre_compra`
--
ALTER TABLE `pre_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_comprador` (`id_comprador`),
  ADD KEY `id_item` (`id_item`);

--
-- Indexes for table `tipo_item`
--
ALTER TABLE `tipo_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vendedor` (`id_vendedor`),
  ADD KEY `id_item` (`id_item`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `armazem`
--
ALTER TABLE `armazem`
  MODIFY `id_armazem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `personagem`
--
ALTER TABLE `personagem`
  MODIFY `id_personagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pre_compra`
--
ALTER TABLE `pre_compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `armazeminventario`
--
ALTER TABLE `armazeminventario`
  ADD CONSTRAINT `FK_armInvItem` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`),
  ADD CONSTRAINT `armazeminventario_ibfk_2` FOREIGN KEY (`id_personagem`) REFERENCES `personagem` (`id_personagem`),
  ADD CONSTRAINT `armazeminventario_ibfk_3` FOREIGN KEY (`id_armazem`) REFERENCES `armazem` (`id_armazem`);

--
-- Constraints for table `equipamento`
--
ALTER TABLE `equipamento`
  ADD CONSTRAINT `equipamento_ibfk_1` FOREIGN KEY (`id_personagem`) REFERENCES `personagem` (`id_personagem`),
  ADD CONSTRAINT `equipamento_ibfk_2` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`);

--
-- Constraints for table `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `FK_invItem` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`),
  ADD CONSTRAINT `FK_invPersonagem` FOREIGN KEY (`id_personagem`) REFERENCES `personagem` (`id_personagem`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipo_item` (`id`);

--
-- Constraints for table `personagem`
--
ALTER TABLE `personagem`
  ADD CONSTRAINT `personagem_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Constraints for table `pre_compra`
--
ALTER TABLE `pre_compra`
  ADD CONSTRAINT `pre_compra_ibfk_1` FOREIGN KEY (`id_comprador`) REFERENCES `personagem` (`id_personagem`),
  ADD CONSTRAINT `pre_compra_ibfk_2` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`);

--
-- Constraints for table `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`id_vendedor`) REFERENCES `personagem` (`id_personagem`),
  ADD CONSTRAINT `venda_ibfk_2` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
