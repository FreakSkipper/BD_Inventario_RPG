-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2019 at 05:20 PM
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
  `id_personagem` int(11) NOT NULL,
  `id_armazem` int(11) NOT NULL,
  `cidade` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `armazeminventario`
--

CREATE TABLE `armazeminventario` (
  `id_armazem` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inventario`
--

CREATE TABLE `inventario` (
  `id_personagem` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `personagem`
--

CREATE TABLE `personagem` (
  `id_personagem` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `experiencia` float DEFAULT NULL,
  `sexo` tinyint(1) NOT NULL,
  `raca` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='FON	';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `armazem`
--
ALTER TABLE `armazem`
  ADD PRIMARY KEY (`id_armazem`,`id_personagem`),
  ADD KEY `FK_armPersonagem` (`id_personagem`);

--
-- Indexes for table `armazeminventario`
--
ALTER TABLE `armazeminventario`
  ADD PRIMARY KEY (`id_armazem`,`id_item`),
  ADD KEY `FK_armInvItem` (`id_item`);

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
  ADD PRIMARY KEY (`id_personagem`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `armazem`
--
ALTER TABLE `armazem`
  ADD CONSTRAINT `FK_armArmazemInventario` FOREIGN KEY (`id_armazem`) REFERENCES `armazeminventario` (`id_armazem`),
  ADD CONSTRAINT `FK_armPersonagem` FOREIGN KEY (`id_personagem`) REFERENCES `personagem` (`id_personagem`);

--
-- Constraints for table `armazeminventario`
--
ALTER TABLE `armazeminventario`
  ADD CONSTRAINT `FK_armInvItem` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`);

--
-- Constraints for table `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `FK_invItem` FOREIGN KEY (`id_item`) REFERENCES `item` (`id_item`),
  ADD CONSTRAINT `FK_invPersonagem` FOREIGN KEY (`id_personagem`) REFERENCES `personagem` (`id_personagem`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
