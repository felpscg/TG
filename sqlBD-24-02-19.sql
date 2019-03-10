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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='CEP*, Rua*, Número*, Complemento, Bairro*, Cidade* e UF* (Estado)';

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela tg.registros
CREATE TABLE IF NOT EXISTS `registros` (
  `pkregistro` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`pkregistro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.
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

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela tg.telefones
CREATE TABLE IF NOT EXISTS `telefones` (
  `pktelefone` int(11) NOT NULL AUTO_INCREMENT,
  `ddd` char(2) NOT NULL,
  `telefone` char(12) NOT NULL,
  `tipo` char(20) NOT NULL COMMENT 'Telefone, Celular, Fax',
  `local` char(20) DEFAULT NULL COMMENT 'Principa, residencial, trabalho, Comercial, Outro',
  PRIMARY KEY (`pktelefone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.
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
  `habilitacao` int(11) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Nome*, CPF*, RG, Data de Nascimento*, Endereço*, Telefone*(celular e/ou fixo), E-mail*, senha*, Veículo*, Habilitação* e Data de Cadastro*';

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela tg.vagas
CREATE TABLE IF NOT EXISTS `vagas` (
  `pknmvaga` int(11) NOT NULL AUTO_INCREMENT,
  `numerovaga` int(11) NOT NULL,
  `estadovaga` char(2) NOT NULL DEFAULT 'l' COMMENT 'Estado da vaga diario',
  PRIMARY KEY (`pknmvaga`),
  UNIQUE KEY `numerovaga` (`numerovaga`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='l - livre\r\no - ocupado\r\nr - reservado\r\n//minha reserva somente no php quando a id do cliente for igual ao registro do sistema na data atual';

-- Exportação de dados foi desmarcado.
-- Copiando estrutura para tabela tg.veiculos
CREATE TABLE IF NOT EXISTS `veiculos` (
  `pkveiculo` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(8) NOT NULL,
  `cor` char(20) DEFAULT NULL,
  `marca` char(50) DEFAULT NULL,
  `modelo` char(40) DEFAULT NULL,
  PRIMARY KEY (`pkveiculo`),
  UNIQUE KEY `placa` (`placa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='Placa*, Ano, Cor, Marca e Modelo';

-- Exportação de dados foi desmarcado.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
