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
-- Definition of table `controle_avaliacao`
--

DROP TABLE IF EXISTS `controle_avaliacao`;
CREATE TABLE `controle_avaliacao` (
  `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_avaliador` int(11) DEFAULT NULL,
  `id_avaliado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_avaliacao`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `controle_avaliacao`
--

/*!40000 ALTER TABLE `controle_avaliacao` DISABLE KEYS */;
INSERT INTO `controle_avaliacao` (`id_avaliacao`,`id_avaliador`,`id_avaliado`) VALUES 
 (1,1,6),
 (2,2,7),
 (3,3,8),
 (4,4,6),
 (5,5,10),
 (6,6,12),
 (7,7,14),
 (8,8,4),
 (9,9,1),
 (10,10,16),
 (11,11,15),
 (12,12,16),
 (13,13,18),
 (14,14,21),
 (15,15,17),
 (16,16,11),
 (17,17,10),
 (18,18,2),
 (19,19,3),
 (20,20,4),
 (21,21,8),
 (22,22,7);
/*!40000 ALTER TABLE `controle_avaliacao` ENABLE KEYS */;


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
INSERT INTO `email` (`id_usuario`,`email_1`,`email_2`) VALUES 
 (5,'joaodasilva@gmail.com',NULL),
 (6,'mariaAparecida@gmail.com',NULL),
 (7,'marcosperera@gmail.com',NULL),
 (8,'janainapenha@outlook.com',NULL),
 (9,'analuiza@hotmail.com',NULL),
 (10,'gabrielacordeiro@gmail.com',NULL),
 (11,'douglas@gmail.com',NULL),
 (12,'fabiano@hotmail.com',NULL),
 (13,'larissa@gmail.com',NULL),
 (14,'lucas@hotmail.com',NULL),
 (15,'juju@gmail.com',NULL),
 (16,'jaime_perola@gmail.com',NULL),
 (17,'laila@hotmail.com',NULL),
 (18,'iasmim@gmail.com',NULL),
 (19,'robson@gmail.com',NULL),
 (20,'mario@hotmail.com',NULL),
 (21,'josesalvador@gmail.com',NULL),
 (22,'biamiller_123@gmail.com',NULL),
 (23,'pamela_rosario@outlook.com',NULL),
 (24,'caua_penharou@hotmail.com',NULL),
 (25,'jeff_dacosta@outlook.com',NULL),
 (26,'janainapenha@outlook.com',NULL);
/*!40000 ALTER TABLE `email` ENABLE KEYS */;


--
-- Definition of table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
CREATE TABLE `endereco` (
  `id_usuario` int(11) NOT NULL,
  `cep` int(11) NOT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `rua` varchar(45) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `endereco`
--

/*!40000 ALTER TABLE `endereco` DISABLE KEYS */;
INSERT INTO `endereco` (`id_usuario`,`cep`,`bairro`,`rua`,`cidade`,`estado`,`latitude`,`longitude`) VALUES 
 (5,89142400,'Centro','Beijamin','Benedito Novo','SC',-26.801135,-49.382933),
 (6,89142401,'Centro','Roberto Carlos','Blumenau','SC',-26.890054,-49.153726),
 (7,89120000,'Centro','Carajás','Jaraguá do Sul','SC',-26.503185,-49.085988),
 (8,88037375,'Centro','Moacir Franco','Florianópolis','SC',-27.620965,-48.50836),
 (9,89743002,'Centro','Castelo Branco','Rodeio','SC',-26.908939,-49.375021),
 (10,98400035,'Centro','Tapajos','Doutor Pedrinho','SC',-26.745525,-49.468282),
 (11,95800120,'Centro','Castelo Branco','Joinville','SC',-26.382529,-48.866923),
 (12,87680054,'Centro','Blumenau','Rio do Sul','SC',-27.219339,-49.643059),
 (13,14561231,'Centro','General Osorio','Indaial','SC',-26.888157,-49.243966),
 (14,98535463,'Centro','Moacir Franco','Blumenau','SC',-26.893235,-49.082058),
 (15,89465231,'Centro','Perobas','Benedito Novo','SC',-26.787371,-49.36463),
 (16,45871200,'Centro','Petrolandia','Ascurra','SC',-26.950597,-49.369737),
 (17,58900463,'Centro','Castelo Branco','Brusque','SC',-27.104619,-48.918139),
 (18,89475601,'Centro','Cascavel','Rio dos Cedros','SC',-26.755808,-49.272447),
 (19,88004100,'Centro','Moacir Franco','Pomerode','SC',-26.741858,-49.171124),
 (20,89000123,'Centro','Pitanga','Gaspar','SC',-26.931333,-48.958521),
 (21,89120105,'Centro','Castelo Branco','Rio dos Cedros','SC',-26.813013,-49.282744),
 (22,98400035,'Centro','Av. Santana Bremer','Blumenau','SC',-26.811245,-49.282788),
 (23,89450001,'Centro','Violeta','Timbó','SC',-26.823866,-49.276681),
 (24,89457210,'Centro','Rosa Branca','Blumenau','SC',-26.836207,-49.262422),
 (25,12450045,'Centro','Castelo Branco','Blumenau','SC',-26.893235,-49.082074),
 (26,89120000,NULL,NULL,NULL,NULL,-27.1134,-48.9039);
/*!40000 ALTER TABLE `endereco` ENABLE KEYS */;


--
-- Definition of table `pontuacao_avaliacao`
--

DROP TABLE IF EXISTS `pontuacao_avaliacao`;
CREATE TABLE `pontuacao_avaliacao` (
  `id_avaliacao` int(11) NOT NULL,
  `id_avaliado` int(11) DEFAULT NULL,
  `qt_votos` int(11) DEFAULT NULL,
  `qt_pontos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_avaliacao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pontuacao_avaliacao`
--

/*!40000 ALTER TABLE `pontuacao_avaliacao` DISABLE KEYS */;
INSERT INTO `pontuacao_avaliacao` (`id_avaliacao`,`id_avaliado`,`qt_votos`,`qt_pontos`) VALUES 
 (1,1,5,15),
 (2,2,8,18),
 (3,3,10,30),
 (4,4,2,5),
 (5,5,6,19),
 (6,6,10,42),
 (7,7,20,90),
 (8,8,25,90),
 (9,9,10,32),
 (10,10,7,15),
 (11,11,5,10),
 (12,12,9,22),
 (13,13,10,25),
 (14,14,6,18),
 (15,15,10,26),
 (16,16,11,32),
 (17,17,10,20),
 (18,18,12,21),
 (19,19,13,22),
 (20,20,15,25),
 (21,21,14,16),
 (22,22,14,25),
 (23,23,15,24),
 (24,24,12,24),
 (25,25,65,300);
/*!40000 ALTER TABLE `pontuacao_avaliacao` ENABLE KEYS */;


--
-- Definition of table `servico`
--

DROP TABLE IF EXISTS `servico`;
CREATE TABLE `servico` (
  `id_usuario` tinyint(1) NOT NULL,
  `bebes` tinyint(1) DEFAULT '0',
  `criancas` tinyint(1) DEFAULT '0',
  `adolescentes` tinyint(1) DEFAULT '0',
  `idosos` tinyint(1) DEFAULT '0',
  `especiais` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servico`
--

/*!40000 ALTER TABLE `servico` DISABLE KEYS */;
INSERT INTO `servico` (`id_usuario`,`bebes`,`criancas`,`adolescentes`,`idosos`,`especiais`) VALUES 
 (5,1,1,1,0,0),
 (6,1,0,0,1,1),
 (7,1,1,1,1,1),
 (8,0,1,0,1,1),
 (9,0,1,0,0,0),
 (10,0,0,1,0,1),
 (11,1,0,1,1,0),
 (12,1,1,0,0,1),
 (13,1,1,1,0,0),
 (14,0,1,1,1,1),
 (15,1,1,0,0,1),
 (16,1,0,1,0,1),
 (17,0,1,0,1,0),
 (18,0,1,0,0,0),
 (19,0,1,0,0,0),
 (20,1,0,0,0,0),
 (21,0,0,0,1,0),
 (22,1,0,0,1,1),
 (23,1,1,0,0,0),
 (24,0,0,0,1,0),
 (25,0,1,0,0,0),
 (26,1,1,1,0,0);
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
INSERT INTO `telefone` (`id_usuario`,`telefone_1`,`telefone_2`) VALUES 
 (5,'47988365662',NULL),
 (6,'47986134564',NULL),
 (7,'47682136562',NULL),
 (8,'47986231696',NULL),
 (9,'47956128668',NULL),
 (10,'47962332556',NULL),
 (11,'47965656626',NULL),
 (12,'47923616516',NULL),
 (13,'47986126546',NULL),
 (14,'47686898165',NULL),
 (15,'47963235613',NULL),
 (16,'47986231696',NULL),
 (17,'47923684356',NULL),
 (18,'47416516516',NULL),
 (19,'47892969526',NULL),
 (20,'47932856111',NULL),
 (21,'47968632132',NULL),
 (22,'47966651321',NULL),
 (23,'47896632321',NULL),
 (24,'47963254651',NULL),
 (25,'47986232131',NULL),
 (26,'47986231696',NULL);
/*!40000 ALTER TABLE `telefone` ENABLE KEYS */;


--
-- Definition of table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `sobrenome` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `tp_usuario` varchar(1) NOT NULL DEFAULT 'C',
  `cnpj` varchar(14) DEFAULT NULL,
  `descricao` text,
  `regiao_de_atendimento` varchar(45) DEFAULT NULL,
  `dir_foto_perfil` varchar(350) DEFAULT NULL,
  `boosted` varchar(1) DEFAULT 'N',
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id_usuario`,`nome`,`sobrenome`,`senha`,`cpf`,`dt_cadastro`,`tp_usuario`,`cnpj`,`descricao`,`regiao_de_atendimento`,`dir_foto_perfil`,`boosted`) VALUES 
 (5,'JoÃ£o','Da Silva','202cb962ac59075b964b07152d234b70','12457614515','2021-07-12 19:31:00','P',NULL,'     ',NULL,'imagens/pic_usuarios/12457614515.png','N'),
 (6,'Maria','Aparecida','202cb962ac59075b964b07152d234b70','45621354877','2021-07-12 19:32:52','P',NULL,NULL,NULL,'imagens/pic_usuarios/45621354877.png','S'),
 (7,'Marcos','Perera','202cb962ac59075b964b07152d234b70','78546541654','2021-07-12 19:33:59','P',NULL,NULL,NULL,'imagens/pic_usuarios/78546541654.png','N'),
 (8,'Janaina','Da Penha','202cb962ac59075b964b07152d234b70','12548798654','2021-07-12 19:35:49','P',NULL,NULL,NULL,'imagens/pic_usuarios/12548798654.png','S'),
 (9,'Ana','Luiza','202cb962ac59075b964b07152d234b70','96846546546','2021-07-12 19:36:38','P',NULL,NULL,NULL,'imagens/pic_usuarios/96846546546.png','N'),
 (10,'Gabriela','Cordeiro','202cb962ac59075b964b07152d234b70','87951300564','2021-07-12 19:37:44','P',NULL,NULL,NULL,'imagens/pic_usuarios/87951300564.png','N'),
 (11,'Douglas','Paxeco','202cb962ac59075b964b07152d234b70','45621354000','2021-07-12 19:38:45','P',NULL,NULL,NULL,'imagens/pic_usuarios/45621354000.png','N'),
 (12,'Fabiano','Da Silva','202cb962ac59075b964b07152d234b70','12500489261','2021-07-12 19:40:04','P',NULL,NULL,NULL,'imagens/pic_usuarios/12500489261.png','S'),
 (13,'Larissa','Ferreira','202cb962ac59075b964b07152d234b70','12378984695','2021-07-12 19:41:20','P',NULL,NULL,NULL,'imagens/pic_usuarios/12378984695.png','N'),
 (14,'Lucas','Mario','202cb962ac59075b964b07152d234b70','89000547622','2021-07-12 19:42:33','P',NULL,NULL,NULL,'imagens/pic_usuarios/89000547622.png','S'),
 (15,'Juliana','Da Gama','202cb962ac59075b964b07152d234b70','77004870046','2021-07-12 19:43:37','P',NULL,NULL,NULL,'imagens/pic_usuarios/77004870046.png','N'),
 (16,'Jaime','Perola','202cb962ac59075b964b07152d234b70','19216812344','2021-07-12 19:45:21','P',NULL,NULL,NULL,'imagens/pic_usuarios/19216812344.png','N'),
 (17,'Laila','Carol','202cb962ac59075b964b07152d234b70','56800665054','2021-07-12 19:46:33','P',NULL,NULL,NULL,'imagens/pic_usuarios/56800665054.png','S'),
 (18,'Iasmim','Da Cunha','202cb962ac59075b964b07152d234b70','18316864654','2021-07-12 19:47:41','P',NULL,NULL,NULL,'imagens/pic_usuarios/18316864654.png','N'),
 (19,'Robson','Ferreira','202cb962ac59075b964b07152d234b70','52526546842','2021-07-12 19:48:53','P',NULL,NULL,NULL,'imagens/pic_usuarios/52526546842.png','S'),
 (20,'Mario','Bros','202cb962ac59075b964b07152d234b70','12460500012','2021-07-12 19:49:52','P',NULL,NULL,NULL,'imagens/pic_usuarios/12460500012.png','N'),
 (21,'JosÃ©','Salvador','202cb962ac59075b964b07152d234b70','40950560615','2021-07-12 19:52:03','P',NULL,NULL,NULL,'imagens/pic_usuarios/40950560615.png','N'),
 (22,'Beatriz','Miller','202cb962ac59075b964b07152d234b70','12181840087','2021-07-12 19:53:45','P',NULL,NULL,NULL,'imagens/pic_usuarios/12181840087.png','S'),
 (23,'PÃ¢mela','Rosario','202cb962ac59075b964b07152d234b70','12147932441','2021-07-12 19:55:08','P',NULL,NULL,NULL,'imagens/pic_usuarios/12147932441.png','N'),
 (24,'CauÃ£','Penharou','202cb962ac59075b964b07152d234b70','19186947332','2021-07-12 19:58:10','P',NULL,NULL,NULL,'imagens/pic_usuarios/19186947332.png','S'),
 (25,'Jefferson','Da Costa','202cb962ac59075b964b07152d234b70','14039405037','2021-07-12 19:59:51','P',NULL,NULL,NULL,'imagens/pic_usuarios/14039405037.png','N'),
 (26,'alskjdkasjd','laskdaslikdhlas','202cb962ac59075b964b07152d234b70','21316546384','2021-07-13 20:47:12','P',NULL,NULL,NULL,NULL,'N');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
