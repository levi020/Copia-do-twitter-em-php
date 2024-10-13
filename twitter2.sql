-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/10/2024 às 00:05
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `twitter2`
--
CREATE DATABASE IF NOT EXISTS `twitter2` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `twitter2`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `coments`
--

DROP TABLE IF EXISTS `coments`;
CREATE TABLE IF NOT EXISTS `coments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(40) NOT NULL,
  `text` varchar(250) NOT NULL,
  `ativo` varchar(3) NOT NULL,
  `data` date DEFAULT NULL,
  `horas` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `coments`
--

INSERT INTO `coments` (`id`, `UserName`, `text`, `ativo`, `data`, `horas`) VALUES
(17, 'Levi12', 'Uuuuuu', 's', '1990-12-08', NULL),
(18, 'Levi12', 'aaa', 's', '2003-09-11', NULL),
(19, 'Levi12', 'ola mundo', 's', '2024-08-27', NULL),
(21, 'Levi12', 'fdmtekuedky', 's', '2024-08-27', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(40) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `ativo` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `senha`, `ativo`) VALUES
(1, 'Levi123', 'aa', 's'),
(2, 'Levi12', 'aa', 's'),
(3, 'Pablo', '123', 's');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
