# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.19)
# Database: Catalogue
# Generation Time: 2017-08-27 13:49:12 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table content
# ------------------------------------------------------------

DROP TABLE IF EXISTS `content`;

CREATE TABLE `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(50) NOT NULL DEFAULT '',
  `parent_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `content` WRITE;
/*!40000 ALTER TABLE `content` DISABLE KEYS */;

INSERT INTO `content` (`id`, `text`, `parent_id`)
VALUES
	(1,'Root (alpha)',0),
	(2,'Root (beta)',0),
	(3,'Parent A',1),
	(4,'Parent B',1),
	(5,'Parent C',2),
	(6,'Child A1',3),
	(7,'Child A2',3),
	(8,'Child A3',3),
	(9,'Child B1',4),
	(10,'Child C1',5),
	(11,'Grandchild A1.1',6),
	(12,'Grandchild A1.2',6),
	(13,'Grandchild A1.3',6),
	(14,'Grandchild A1.4',6),
	(15,'Grandchild A2.1',7),
	(16,'Grandchild A2.2',7),
	(17,'Grandchild A2.3',7),
	(18,'Grandchild A2.4',7),
	(19,'Grandchild A3.1',8),
	(20,'Grandchild A3.2',8),
	(21,'Grandchild A3.3',8),
	(22,'Grandchild B1.1',9),
	(23,'Grandchild B1.2',9),
	(24,'Grandchild B1.3',9),
	(25,'Grandchild C1.1',10),
	(26,'Grandchild C1.2',10),
	(27,'Grandchild C1.3',10);

/*!40000 ALTER TABLE `content` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
