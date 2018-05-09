-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 09-Maio-2018 às 02:40
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `agrofloresta`
--
CREATE DATABASE IF NOT EXISTS `agrofloresta` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `agrofloresta`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `ID_area` int(5) NOT NULL AUTO_INCREMENT,
  `cod_localizacao` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `uni_medida` varchar(10) NOT NULL,
  `tamanho` double NOT NULL,
  PRIMARY KEY (`ID_area`),
  KEY `cod_localizacao` (`cod_localizacao`),
  KEY `ID_area` (`ID_area`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `area`
--

INSERT INTO `area` (`ID_area`, `cod_localizacao`, `nome`, `uni_medida`, `tamanho`) VALUES
(1, '1', 'Monteiro', 'Hectare', 1000),
(2, '1', 'Gomes', 'Alqueires', 1000),
(3, '1', 'Jamil', 'Ares', 1000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cultura`
--

CREATE TABLE IF NOT EXISTS `cultura` (
  `ID_cultura` int(5) NOT NULL AUTO_INCREMENT,
  `cod_area` int(5) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `nome_cul` varchar(50) NOT NULL,
  `renda` float NOT NULL,
  `gasto` float NOT NULL,
  `q_produzida` float NOT NULL,
  `q_esperada` float NOT NULL,
  PRIMARY KEY (`ID_cultura`),
  KEY `cod_area` (`cod_area`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `cultura`
--

INSERT INTO `cultura` (`ID_cultura`, `cod_area`, `tipo`, `nome_cul`, `renda`, `gasto`, `q_produzida`, `q_esperada`) VALUES
(3, 1, 'Lenhosa', 'Pau-Brasil', 10000.5, 5000, 30000, 20750);

-- --------------------------------------------------------

--
-- Estrutura da tabela `localizacao`
--

CREATE TABLE IF NOT EXISTS `localizacao` (
  `ID_localizacao` int(5) NOT NULL AUTO_INCREMENT,
  `pais` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `municipio` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_localizacao`),
  KEY `ID_localizacao` (`ID_localizacao`),
  KEY `ID_localizacao_2` (`ID_localizacao`),
  KEY `ID_localizacao_3` (`ID_localizacao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `localizacao`
--

INSERT INTO `localizacao` (`ID_localizacao`, `pais`, `estado`, `municipio`) VALUES
(1, 'Brasil', 'SÃ£o Paulo', 'Araraquara'),
(2, 'Brasil', 'SÃ£o Paulo', 'Barretos');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cultura`
--
ALTER TABLE `cultura`
  ADD CONSTRAINT `cultura_ibfk_1` FOREIGN KEY (`cod_area`) REFERENCES `area` (`ID_area`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
