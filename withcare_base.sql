CREATE DATABASE `withcare` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `sobrenome` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `dt_cadastro` datetime NOT NULL,
  `tp_usuario` varchar(1) NOT NULL DEFAULT 'C',
  `cnpj` varchar(14) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `regiao_de_atendimento` varchar(45) DEFAULT NULL,
  `dir_foto_perfil` varchar(350) DEFAULT NULL,
  `boosted` varchar(1) DEFAULT 'N',
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

CREATE TABLE `telefone` (
  `id_usuario` int(11) NOT NULL,
  `telefone_1` varchar(45) DEFAULT NULL,
  `telefone_2` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `servico` (
  `id_usuario` tinyint(1) NOT NULL,
  `bebes` tinyint(1) DEFAULT 0,
  `criancas` tinyint(1) DEFAULT 0,
  `adolescentes` tinyint(1) DEFAULT 0,
  `idosos` tinyint(1) DEFAULT 0,
  `especiais` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `pontuacao_avaliacao` (
  `id_avaliacao` int(11) NOT NULL,
  `id_avaliado` int(11) DEFAULT NULL,
  `qt_votos` int(11) DEFAULT NULL,
  `qt_pontos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_avaliacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `endereco` (
  `id_usuario` int(11) NOT NULL,
  `cep` int(11) NOT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `rua` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `email` (
  `id_usuario` int(11) NOT NULL,
  `email_1` varchar(45) NOT NULL,
  `email_2` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `controle_avaliacao` (
  `id_avaliacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_avaliador` int(11) DEFAULT NULL,
  `id_avaliado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_avaliacao`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
