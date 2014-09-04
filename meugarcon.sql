-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 27-Ago-2014 às 21:23
-- Versão do servidor: 5.6.14
-- versão do PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `meugarcon`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'Porcoes'),
(2, 'Sanduiches'),
(3, 'Pizzas'),
(4, 'Bebidas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  `descricao` varchar(1000) NOT NULL,
  `preco` decimal(5,2) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `item`
--

INSERT INTO `item` (`id`, `nome`, `descricao`, `preco`, `idcategoria`) VALUES
(1, 'Batata Frita', 'Porcao de 100g de batata fritas', '4.50', 1),
(2, 'Salaminho', 'Porcao de 100g de salaminho defumado', '6.00', 1),
(3, 'X-Frango', 'Pao, hamburger de frango, ovo, queijo, presunto, alface e molho especial', '7.50', 2),
(4, 'X-Bacon', 'Pao, hamburguer de boi, queijo, bacon, alface, molho especial e batata palha', '7.50', 2),
(5, 'Frango c/ Catupity', 'molho de tomate, mussarela, frango desfiado e catupiry', '18.30', 3),
(6, 'Quatro Queijos', 'molho de tomate, mussarela, gorgonzola, provolone e catupiry', '19.00', 3),
(7, 'Coca-Cola 1L', 'Garrafa pet de coca-cola.', '4.50', 4),
(8, 'Coca-Cola 2L', 'Garrafa pet de coca-cola', '7.50', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesa`
--

CREATE TABLE IF NOT EXISTS `mesa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(10) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero` (`numero`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Extraindo dados da tabela `mesa`
--

INSERT INTO `mesa` (`id`, `numero`, `status`) VALUES
(7, '1', 'livre'),
(8, '2', 'livre'),
(9, '3', 'livre'),
(10, '4', 'livre'),
(11, '5', 'ocupada'),
(12, '6', 'ocupada'),
(13, '7', 'livre'),
(14, '8', 'livre'),
(15, '9', 'livre'),
(16, '10', 'livre'),
(17, '11', 'livre'),
(18, '12', 'livre'),
(19, '13', 'livre'),
(20, '14', 'ocupada'),
(21, '15', 'ocupada'),
(22, '16', 'ocupada'),
(28, '17', 'ocupada'),
(29, '18', 'ocupada'),
(30, '19', 'ocupada');