-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.15 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para db_gincana
CREATE DATABASE IF NOT EXISTS `db_gincana` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_gincana`;

-- Copiando estrutura para tabela db_gincana.ci_sessions
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela db_gincana.ci_sessions: ~22 rows (aproximadamente)
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
	('f9u8v13napke9oa0c2vegbnpqdkuk9ta', '127.0.0.1', 1569204870, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536393230343737323B),
	('5erjblduqnpjhkj08hmra91j8fm4c4eo', '127.0.0.1', 1569205356, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536393230353335363B),
	('j9eqd9441vn4e6hvknl5sjt8a4b88dko', '127.0.0.1', 1569206204, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536393230363230343B),
	('qgg1cucmv4q409ri67jg5giuhqf0579k', '127.0.0.1', 1569206715, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536393230363731353B),
	('58rbt3bv0inpncqh9qjp6f31092sfd74', '127.0.0.1', 1569207373, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536393230373337333B),
	('vlkao4apmvclkhuodfu0519idrqbe8dg', '127.0.0.1', 1569207578, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536393230373337333B),
	('e6gj0uitvd838ccmsdq8mho8bndu6ede', '127.0.0.1', 1569208757, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536393230383735373B),
	('ea9dila158lr873c4r7flq62jolp1if3', '127.0.0.1', 1569209164, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536393230393136343B),
	('6tumpvsr2v7m8odkr0sbs5os6h7tgvae', '127.0.0.1', 1569209165, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536393230393136343B),
	('ga0lvqf2f2c18oit8pggb636icpfi9n1', '127.0.0.1', 1569210896, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536393231303839363B),
	('fpk1o7719jnraig8hkfq28uf7lv12ato', '127.0.0.1', 1569211121, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536393231303839363B),
	('l2tf6qprpfh9pd8rtn1v3q17ge36n9oq', '127.0.0.1', 1569268286, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536393236383238363B),
	('f6lkkbj8tdfmdsv2dgk5dbutmf1eehbe', '127.0.0.1', 1569270214, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536393237303231343B),
	('rc2fnd3k4s2ckjpsa43umf1m0io49e94', '127.0.0.1', 1569270519, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536393237303531393B),
	('67mbn0ch721ruhrtuo995abv7pqdftm2', '127.0.0.1', 1569271869, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536393237313836393B),
	('jdjv4nfr1hcqtgu2qvlq0s8fcom7nk5i', '127.0.0.1', 1569272221, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536393237323232313B),
	('0d7m334rfukgok5neajfdjspa976l024', '127.0.0.1', 1569272924, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536393237323932343B),
	('bmkojh1pf9locif63tja8tkbqo9d6ncn', '127.0.0.1', 1569273238, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536393237333233383B),
	('2glu3rcddnla46g5n1gqs9h9dgkgmb11', '127.0.0.1', 1569273676, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536393237333637363B),
	('vs6jhd18vubu9a4nvf195bcoud8skopd', '127.0.0.1', 1569273911, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536393237333637363B),
	('qtp5qn8jctk8pulibqpmdipe5d9morvm', '127.0.0.1', 1569285914, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536393238353931343B),
	('qenrorqviijhl7cnso8sno6jmms14f5c', '127.0.0.1', 1569348215, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536393334383231353B),
	('2fugcunpv3a2ou1qes82sgmgnkiap3u1', '127.0.0.1', 1569348683, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536393334383638333B),
	('klv2t4g6t4d98fggqh21srlu0ih09t2q', '127.0.0.1', 1569349176, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536393334393137363B),
	('2pqode5dlcbf84vs466dr83t2p3dif3h', '127.0.0.1', 1569348917, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536393334383638333B),
	('q4k7d2817tv384np2pdl5noltvskklhf', '127.0.0.1', 1569350218, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536393335303231363B),
	('2rbsqt4q0tjf9jc054iqu60d2ccku8lr', '127.0.0.1', 1569350217, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536393335303231363B),
	('kvfbim106p28jo2am9fct7t2tq7n78vb', '127.0.0.1', 1569350850, _binary 0x5F5F63695F6C6173745F726567656E65726174657C693A313536393335303738343B);
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;

-- Copiando estrutura para tabela db_gincana.equipe
CREATE TABLE IF NOT EXISTS `equipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela db_gincana.equipe: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `equipe` DISABLE KEYS */;
INSERT INTO `equipe` (`id`, `nome`) VALUES
	(1, 'Marinheiros'),
	(2, 'SWAT'),
	(3, 'Elite Dourada'),
	(4, 'Equipe C');
/*!40000 ALTER TABLE `equipe` ENABLE KEYS */;

-- Copiando estrutura para tabela db_gincana.integrante
CREATE TABLE IF NOT EXISTS `integrante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_equipe` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data_nasc` date DEFAULT NULL,
  `rg` varchar(11) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela db_gincana.integrante: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `integrante` DISABLE KEYS */;
INSERT INTO `integrante` (`id`, `id_equipe`, `nome`, `data_nasc`, `rg`, `cpf`) VALUES
	(10, 2, 'Parick', '2000-01-10', '12234654', '64654654'),
	(11, 1, 'Popeye', '2000-01-01', '31654', '654654'),
	(12, 3, 'Pedro', '2000-01-01', '6546546', '654654'),
	(13, 3, 'Maria', '2000-01-01', '56465464', '654654'),
	(14, 4, 'Daniel', '1999-01-01', '6654', '54654'),
	(15, 1, 'Paulodir', '2000-01-10', '12234654', '64654654'),
	(16, 1, 'Andressa', '1999-03-10', '12234654', '64654654');
/*!40000 ALTER TABLE `integrante` ENABLE KEYS */;

-- Copiando estrutura para tabela db_gincana.pontuacao
CREATE TABLE IF NOT EXISTS `pontuacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_equipe` int(11) NOT NULL,
  `id_prova` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `pontos` float NOT NULL,
  `data_hora` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela db_gincana.pontuacao: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `pontuacao` DISABLE KEYS */;
INSERT INTO `pontuacao` (`id`, `id_equipe`, `id_prova`, `id_usuario`, `pontos`, `data_hora`) VALUES
	(125, 24, 18, 1, 10, '2017-08-26 08:59:04'),
	(126, 25, 18, 1, 15, '2017-08-26 08:59:04'),
	(127, 26, 18, 1, 8, '2017-08-26 08:59:04');
/*!40000 ALTER TABLE `pontuacao` ENABLE KEYS */;

-- Copiando estrutura para tabela db_gincana.prova
CREATE TABLE IF NOT EXISTS `prova` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(400) NOT NULL,
  `descricao` longtext,
  `num_int` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela db_gincana.prova: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `prova` DISABLE KEYS */;
INSERT INTO `prova` (`id`, `nome`, `descricao`, `num_int`) VALUES
	(18, 'Corrida', 'correr mais rapido ganha', 1);
/*!40000 ALTER TABLE `prova` ENABLE KEYS */;

-- Copiando estrutura para tabela db_gincana.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `nivel` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela db_gincana.usuario: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `nome`, `senha`, `nivel`) VALUES
	(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'ADMINISTRADOR'),
	(2, 'Andressa', '12345', 'Esposa'),
	(3, 'Popoye', '12345', 'marujo');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
