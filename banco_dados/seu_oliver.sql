-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Maio-2020 às 04:57
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `seu_oliver`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `configuracao_oliver`
--

CREATE TABLE `configuracao_oliver` (
  `id` int(11) NOT NULL,
  `tipo_comunicacao` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `assinatura` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satisfacao` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `configuracao_oliver`
--

INSERT INTO `configuracao_oliver` (`id`, `tipo_comunicacao`, `assinatura`, `satisfacao`) VALUES
(1, '{\"sms\":\"sim\",\"zap\":\"sim\"}', '- Oliver', 'a:2:{s:8:\"realizar\";a:1:{i:0;s:3:\"sim\";}s:8:\"mensagem\";s:120:\"Olá, gostariamos de saber se você ficou satisfeito com o produto adquirido. Envie 1 para sim, caso contrário envie 0.\";}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sobrenome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
