-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.13 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para tg
CREATE DATABASE IF NOT EXISTS `tg` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;
USE `tg`;

-- Copiando estrutura para tabela tg.enderecos
CREATE TABLE IF NOT EXISTS `enderecos` (
  `pkendereco` int(11) NOT NULL AUTO_INCREMENT,
  `cep` char(9) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `numero` char(6) NOT NULL,
  `complemento` varchar(60) DEFAULT NULL,
  `bairro` varchar(80) NOT NULL,
  `cidade` varchar(80) NOT NULL,
  `estado` char(2) NOT NULL,
  PRIMARY KEY (`pkendereco`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='CEP*, Rua*, Número*, Complemento, Bairro*, Cidade* e UF* (Estado)';

-- Copiando dados para a tabela tg.enderecos: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `enderecos` DISABLE KEYS */;
INSERT INTO `enderecos` (`pkendereco`, `cep`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `estado`) VALUES
	(1, '19901080', 'Parana', '1563', NULL, 'matilde', 'Ourinhos', 'SP'),
	(2, '19901080', 'Parana', '100', '2', 'centro', 'Ourinhos', 'SP'),
	(3, '19901080', 'Rua Paraná', '1333', '212', 'Jardim Matilde', 'Ourinhos', 'SP'),
	(4, '19901080', 'Rua Paraná', '1323', '123', 'Jardim Matilde', 'Ourinhos', 'SP'),
	(5, '19901080', 'Rua Paraná', '1234', '', 'Jardim Matilde', 'Ourinhos', 'SP'),
	(6, '19901080', 'Rua Paraná', '1563', NULL, 'Jardim Matilde', 'Ourinhos', 'SP'),
	(7, '19901080', 'Rua Paraná', '1563', NULL, 'Jardim Matilde', 'Ourinhos', 'SP'),
	(8, '19901080', 'Rua Paraná', '1563', NULL, 'Jardim Matilde', 'Ourinhos', 'SP'),
	(9, '19901080', 'Rua Paraná', '1563', NULL, 'Jardim Matilde', 'Ourinhos', 'SP'),
	(10, '19901080', 'Rua Paraná', '1563', NULL, 'Jardim Matilde', 'Ourinhos', 'SP');
/*!40000 ALTER TABLE `enderecos` ENABLE KEYS */;

-- Copiando estrutura para tabela tg.registros
CREATE TABLE IF NOT EXISTS `registros` (
  `pkregistro` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`pkregistro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela tg.registros: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `registros` DISABLE KEYS */;
/*!40000 ALTER TABLE `registros` ENABLE KEYS */;

-- Copiando estrutura para tabela tg.reservas
CREATE TABLE IF NOT EXISTS `reservas` (
  `pkreserva` int(11) NOT NULL AUTO_INCREMENT,
  `hrentrada` time NOT NULL,
  `hrsaida` time NOT NULL,
  `dataentrada` date NOT NULL,
  `datasaida` date NOT NULL,
  `dataregistro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fkvaga` int(11) NOT NULL,
  `fkusuario` int(11) NOT NULL,
  PRIMARY KEY (`pkreserva`),
  KEY `fk_vaga` (`fkvaga`),
  KEY `fk_usuario` (`fkusuario`),
  CONSTRAINT `fk_usuario` FOREIGN KEY (`fkusuario`) REFERENCES `usuarios` (`pkusuario`) ON UPDATE CASCADE,
  CONSTRAINT `fk_vaga` FOREIGN KEY (`fkvaga`) REFERENCES `vagas` (`numerovaga`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='vaga, datasaida, dataentrada, hrsaida, hrentrada, dataregistro\r\n\r\nverificar se há outro registro com a mesma vaga, se houver enviar para o registro;\r\ntoda a vaga que estiver registrada no dia atual da consulta deve alterar a tabela vagas do mesmo registro exibindo reservado;\r\n';

-- Copiando dados para a tabela tg.reservas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;

-- Copiando estrutura para tabela tg.telefones
CREATE TABLE IF NOT EXISTS `telefones` (
  `pktelefone` int(11) NOT NULL AUTO_INCREMENT,
  `ddd` char(2) NOT NULL,
  `telefone` char(12) NOT NULL,
  `tipo` char(20) NOT NULL COMMENT 'Telefone, Celular, Fax',
  `local` char(20) DEFAULT NULL COMMENT 'Principa, residencial, trabalho, Comercial, Outro',
  PRIMARY KEY (`pktelefone`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela tg.telefones: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `telefones` DISABLE KEYS */;
INSERT INTO `telefones` (`pktelefone`, `ddd`, `telefone`, `tipo`, `local`) VALUES
	(1, '14', '998975807', 'Teste', 'Teste'),
	(2, '14', '99897-5807', 'celular', 'principal'),
	(3, '14', '998975807', 'celular', 'principal'),
	(4, '14', '998975807', 'celular', 'principal'),
	(5, '14', '998975807', 'celular', 'principal'),
	(6, '14', '998975807', 'celular', 'residencial'),
	(7, '14', '998975807', 'celular', 'principal');
/*!40000 ALTER TABLE `telefones` ENABLE KEYS */;

-- Copiando estrutura para tabela tg.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `pkusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `rg` varchar(9) DEFAULT NULL,
  `datanasc` date NOT NULL,
  `email` varchar(130) NOT NULL,
  `senha` mediumtext NOT NULL,
  `datacad` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Data de cadastro',
  `habilitacao` char(30) NOT NULL,
  `fktelefone` int(11) NOT NULL,
  `fkendereco` int(11) NOT NULL,
  `fkveiculo` int(11) NOT NULL,
  PRIMARY KEY (`pkusuario`),
  UNIQUE KEY `habilitacao` (`habilitacao`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `fkendereco` (`fkendereco`),
  UNIQUE KEY `fkveiculo` (`fkveiculo`),
  KEY `fk_telefone` (`fktelefone`),
  CONSTRAINT `fk_endereco` FOREIGN KEY (`fkendereco`) REFERENCES `enderecos` (`pkendereco`) ON UPDATE CASCADE,
  CONSTRAINT `fk_telefone` FOREIGN KEY (`fktelefone`) REFERENCES `telefones` (`pktelefone`) ON UPDATE CASCADE,
  CONSTRAINT `fk_veiculo` FOREIGN KEY (`fkveiculo`) REFERENCES `veiculos` (`pkveiculo`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Nome*, CPF*, RG, Data de Nascimento*, Endereço*, Telefone*(celular e/ou fixo), E-mail*, senha*, Veículo*, Habilitação* e Data de Cadastro*';

-- Copiando dados para a tabela tg.usuarios: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`pkusuario`, `nome`, `cpf`, `rg`, `datanasc`, `email`, `senha`, `datacad`, `habilitacao`, `fktelefone`, `fkendereco`, `fkveiculo`) VALUES
	(2, 'Felipe Corrêa Gomes', '46188259878', '507995818', '1998-11-03', 'felipefelpgomes42@gmail.com', '202cb962ac59075b964b07152d234b70', '2019-03-02 11:43:33', '12312312123122312', 6, 9, 8);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

-- Copiando estrutura para tabela tg.vagas
CREATE TABLE IF NOT EXISTS `vagas` (
  `pknmvaga` int(11) NOT NULL AUTO_INCREMENT,
  `numerovaga` int(11) NOT NULL,
  `estadovaga` char(9) NOT NULL DEFAULT 'l' COMMENT 'Estado da vaga diario',
  PRIMARY KEY (`pknmvaga`),
  UNIQUE KEY `numerovaga` (`numerovaga`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='l - livre\r\no - ocupado\r\n//reservado quando a reserva estiver no dia atual\r\n//minha reserva somente no php quando a id do cliente for igual ao registro do sistema na data atual\r\n//numero de vaga~pknmvaga caso a vaga fisica tenha agum problema';

-- Copiando dados para a tabela tg.vagas: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `vagas` DISABLE KEYS */;
INSERT INTO `vagas` (`pknmvaga`, `numerovaga`, `estadovaga`) VALUES
	(1, 1, 'livre'),
	(2, 2, 'livre'),
	(3, 3, 'livre'),
	(4, 4, 'livre'),
	(5, 5, 'livre'),
	(6, 6, 'livre'),
	(7, 7, 'livre'),
	(8, 8, 'livre'),
	(9, 9, 'livre'),
	(10, 10, 'livre'),
	(11, 11, 'livre'),
	(12, 12, 'livre');
/*!40000 ALTER TABLE `vagas` ENABLE KEYS */;

-- Copiando estrutura para tabela tg.veiculos
CREATE TABLE IF NOT EXISTS `veiculos` (
  `pkveiculo` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(8) NOT NULL,
  `ano` year(4) DEFAULT NULL,
  `cor` char(20) DEFAULT NULL,
  `marca` char(50) DEFAULT NULL,
  `modelo` char(40) DEFAULT NULL,
  PRIMARY KEY (`pkveiculo`),
  UNIQUE KEY `placa` (`placa`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Placa*, Ano, Cor, Marca e Modelo';

-- Copiando dados para a tabela tg.veiculos: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `veiculos` DISABLE KEYS */;
INSERT INTO `veiculos` (`pkveiculo`, `placa`, `ano`, `cor`, `marca`, `modelo`) VALUES
	(8, 'BJO3495', '2016', 'cinza', 'Wolksvagem', 'Gol quadrado');
/*!40000 ALTER TABLE `veiculos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
