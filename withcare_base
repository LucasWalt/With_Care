-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.50-community

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

--
-- Create schema withcare
--

CREATE DATABASE IF NOT EXISTS withcare;
USE withcare;

--
-- Definition of table `chat_mensagem`
--

DROP TABLE IF EXISTS `chat_mensagem`;
CREATE TABLE `chat_mensagem` (
  `id_mensagem` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `conteudo_mensagem` text NOT NULL,
  `dt_mensagem` datetime NOT NULL,
  PRIMARY KEY (`id_mensagem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_mensagem`
--

/*!40000 ALTER TABLE `chat_mensagem` DISABLE KEYS */;
/*!40000 ALTER TABLE `chat_mensagem` ENABLE KEYS */;

--
-- Definition of table `email`
--

DROP TABLE IF EXISTS `email`;
CREATE TABLE `email` (
  `id_usuario` int(11) NOT NULL,
  `email_1` varchar(45) NOT NULL,
  `email_2` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email`
--

/*!40000 ALTER TABLE `email` DISABLE KEYS */;
/*!40000 ALTER TABLE `email` ENABLE KEYS */;

--
-- Definition of table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
CREATE TABLE `endereco` (
  `id_usuario` int(11) NOT NULL,
  `cep` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `cidade` varchar(45) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `rua` varchar(45) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `endereco`
--

/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;

--
-- Definition of table `servico`
--

DROP TABLE IF EXISTS `servico`;
CREATE TABLE `servico` (
  `id_usuario` tinyint(1) NOT NULL,
  `bebes` tinyint(1) NULL DEFAULT 0,
  `criancas` tinyint(1) NULL DEFAULT 0,
  `adolescentes` tinyint(1) NULL DEFAULT 0,
  `idosos` tinyint(1) NULL DEFAULT 0,
  `especiais` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servico`
--

/*!40000 ALTER TABLE `servico` DISABLE KEYS */;
/*!40000 ALTER TABLE `servico` ENABLE KEYS */;

--
-- Definition of table `telefone`
--

DROP TABLE IF EXISTS `telefone`;
CREATE TABLE `telefone` (
  `id_usuario` int(11) NOT NULL,
  `telefone_1` varchar(45) DEFAULT NULL,
  `telefone_2` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `telefone`
--

/*!40000 ALTER TABLE `telefone` DISABLE KEYS */;
/*!40000 ALTER TABLE `telefone` ENABLE KEYS */;

--
-- Definition of table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `cnpj` varchar(14) DEFAULT NULL,
  `descricao` text,
  `regiao_de_atendimento` varchar(45) DEFAULT NULL,
  `dt_cadastro` datetime NOT NULL,
  `sobrenome` varchar(200) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;