-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 13, 2019 at 01:21 AM
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
-- Database: `inventario_rpg`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventario`
--

CREATE TABLE `inventario` (
  `id_personagem` int(11) DEFAULT NULL,
  `id_item` int(11) DEFAULT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventario`
--

INSERT INTO `inventario` (`id_personagem`, `id_item`, `quantidade`) VALUES
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `atributos` varchar(100) NOT NULL,
  `preco` float NOT NULL,
  `preco_base` float NOT NULL,
  `durabilidade` int(11) NOT NULL,
  `flags` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `nome`, `atributos`, `preco`, `preco_base`, `durabilidade`, `flags`) VALUES
(1, 'asd', 'asddsdsd', 12, 11, 1, 'ff');

-- --------------------------------------------------------

--
-- Table structure for table `personagem`
--

CREATE TABLE `personagem` (
  `id_personagem` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `experiencia` float DEFAULT NULL,
  `sexo` tinyint(1) NOT NULL,
  `raca` varchar(100) NOT NULL,
  `cod_inventario` int(11) NOT NULL,
  `cod_armazem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='FON	';

--
-- Dumping data for table `personagem`
--

INSERT INTO `personagem` (`id_personagem`, `name`, `experiencia`, `sexo`, `raca`, `cod_inventario`, `cod_armazem`) VALUES
(2, 'qwe', 23, 1, 'asd', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventario`
--
ALTER TABLE `inventario`
  ADD KEY `id_personagem` (`id_personagem`),
  ADD KEY `id_item` (`id_item`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `personagem`
--
ALTER TABLE `personagem`
  ADD PRIMARY KEY (`id_personagem`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`id_personagem`) REFERENCES `personagem` (`id_personagem`),
  ADD CONSTRAINT `inventario_ibfk_2` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
