-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2019 at 10:55 PM
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
  `classes` varchar(32) NOT NULL,
  `durabilidade` int(11) NOT NULL,
  `desc` varchar(256) DEFAULT NULL,
  `flags` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `nome`, `preco_base`, `dano`, `forca`, `intelecto`, `vigor`, `armadura`, `classes`, `durabilidade`, `desc`, `flags`) VALUES
(1, 'Machadão do Jurado', 470580, 1200, 344, 0, 586, 0, 'guerreiro.', 85, NULL, ''),
(2, 'Picareta de Mineração do Peão', 29083400, 62, 16, 0, 24, 0, '', 90, NULL, NULL),
(3, 'Cajado de Dominância', 10180000, 24, 0, 68, 23, 0, '', 120, NULL, NULL),
(4, 'Cajado do Sabio da Montanha', 410000000, 536, 0, 1531, 586, 0, 'elfo; elfo negro.', 85, NULL, ''),
(5, 'Cajado Corrompido do Gladiador', 123069000, 406, 0, 1531, 586, 0, 'elfo.', 70, NULL, ''),
(6, 'Poção de vida', 50, 0, 0, 0, 0, 0, '', 0, 'Recupera 200 de vida.', ''),
(7, 'Poção de mana', 65, 0, 0, 0, 0, 0, '', 0, 'Recupera 150 de mana.', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personagem`
--

CREATE TABLE `personagem` (
  `id_personagem` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `experiencia` float DEFAULT 0,
  `sexo` char(1) NOT NULL,
  `classe` varchar(100) NOT NULL,
  `carteira` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='FON	';

--
-- Dumping data for table `personagem`
--

INSERT INTO `personagem` (`id_personagem`, `name`, `experiencia`, `sexo`, `classe`, `carteira`) VALUES
(1, 'Matador_de_OncaXD', 8000, 'M', 'viking', 0),
(2, 'Caçador_de_Vampiros12', 12000, 'M', 'elfo sombrio', 1200000),
(3, 'MainYassuo2kk', 1280000, 'M', 'elfo', 202020),
(4, 'Gabrutinha', 66666, 'F', 'viking', 123456),
(5, 'AnnaBele', 6666670, 'F', 'elfo negro', 6666670);

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
-- Indexes for table `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_personagem`,`id_item`),
  ADD KEY `FK_invItem` (`id_item`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `personagem`
--
ALTER TABLE `personagem`
  ADD PRIMARY KEY (`id_personagem`),
  ADD KEY `experiencia` (`experiencia`);

--
-- Indexes for table `pre_compra`
--
ALTER TABLE `pre_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_comprador` (`id_comprador`),
  ADD KEY `id_item` (`id_item`);

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
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  ADD CONSTRAINT `armazeminventario_ibfk_1` FOREIGN KEY (`id_armazem`) REFERENCES `armazem` (`id_armazem`),
  ADD CONSTRAINT `armazeminventario_ibfk_2` FOREIGN KEY (`id_personagem`) REFERENCES `personagem` (`id_personagem`);

--
-- Constraints for table `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `FK_invItem` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`),
  ADD CONSTRAINT `FK_invPersonagem` FOREIGN KEY (`id_personagem`) REFERENCES `personagem` (`id_personagem`);

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
