-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 30-Maio-2018 às 04:37
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
  `ID_area` int(11) NOT NULL AUTO_INCREMENT,
  `cod_localizacao` int(100) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `uni_medida` varchar(10) NOT NULL,
  `tamanho` int(100) NOT NULL,
  PRIMARY KEY (`ID_area`),
  KEY `cod_localizacao` (`cod_localizacao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `area`
--

INSERT INTO `area` (`ID_area`, `cod_localizacao`, `nome`, `uni_medida`, `tamanho`) VALUES
(2, 2, 'Mata AtlÃ¢ntica', 'Alqueires', 500),
(3, 3, 'Reserva ', 'Alqueires', 600),
(4, 3, 'Mata', 'Alqueires', 600);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cultura`
--

CREATE TABLE IF NOT EXISTS `cultura` (
  `ID_cultura` int(11) NOT NULL AUTO_INCREMENT,
  `cod_area` int(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `nome_cul` varchar(100) NOT NULL,
  `renda` float NOT NULL,
  `gasto` float NOT NULL,
  `q_produzida` float NOT NULL,
  `q_esperada` float NOT NULL,
  PRIMARY KEY (`ID_cultura`),
  KEY `cod_area` (`cod_area`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `cultura`
--

INSERT INTO `cultura` (`ID_cultura`, `cod_area`, `tipo`, `nome_cul`, `renda`, `gasto`, `q_produzida`, `q_esperada`) VALUES
(3, 2, 'alimento', 'cultura do milho', 100000, 4000, 5000, 5500),
(4, 3, 'alimento', 'soja', 2300, 500, 4600, 4700);

-- --------------------------------------------------------

--
-- Estrutura da tabela `localizacao`
--

CREATE TABLE IF NOT EXISTS `localizacao` (
  `ID_localizacao` int(100) NOT NULL AUTO_INCREMENT,
  `pais` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `municipio` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_localizacao`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `localizacao`
--

INSERT INTO `localizacao` (`ID_localizacao`, `pais`, `estado`, `municipio`) VALUES
(2, 'Argentina', 'Rio de Janeiro', 'Rio de janeiro'),
(3, 'Brasil', 'SÃ£o Paulo', 'Araraquara');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_ibfk_1` FOREIGN KEY (`cod_localizacao`) REFERENCES `localizacao` (`ID_localizacao`);

--
-- Limitadores para a tabela `cultura`
--
ALTER TABLE `cultura`
  ADD CONSTRAINT `cultura_ibfk_1` FOREIGN KEY (`cod_area`) REFERENCES `area` (`ID_area`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
