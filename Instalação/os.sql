-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.31 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura para tabela 7system.os
DROP TABLE IF EXISTS `os`;
CREATE TABLE IF NOT EXISTS `os` (
  `ID_OS` int(20) NOT NULL AUTO_INCREMENT,
  `ID_client` int(20) NOT NULL,
  `Datecreat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Nome_client` varchar(50) DEFAULT NULL,
  `Date_OS` date DEFAULT NULL,
  `Modelo` varchar(60) DEFAULT NULL,
  `Detalhe` varchar(60) DEFAULT NULL,
  `Reclamacao` varchar(60) DEFAULT NULL,
  `Laudo_tecnico` varchar(30) DEFAULT NULL,
  `Valor_Total` float DEFAULT NULL,
  `Desconto` int(10) DEFAULT NULL,
  `Atendente` varchar(20) DEFAULT NULL,
  `Obs` varchar(60) DEFAULT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID_OS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela 7system.os: ~2 rows (aproximadamente)

-- Copiando estrutura para tabela 7system.os_itens
DROP TABLE IF EXISTS `os_itens`;
CREATE TABLE IF NOT EXISTS `os_itens` (
  `ID_iten` int(20) NOT NULL AUTO_INCREMENT,
  `ID_OS` int(20) NOT NULL,
  `Codigo` int(20) NOT NULL,
  `Nome` varchar(30) NOT NULL,
  `Quantidade` int(20) NOT NULL,
  `Valor` float NOT NULL,
  PRIMARY KEY (`ID_iten`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela 7system.os_itens: ~31 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
