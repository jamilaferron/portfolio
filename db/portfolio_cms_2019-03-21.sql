# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.43)
# Database: portfolio_cms
# Generation Time: 2019-03-21 10:02:03 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table paragraphs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `paragraphs`;

CREATE TABLE `paragraphs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `paragraph` varchar(400) NOT NULL DEFAULT '',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `paragraphs` WRITE;
/*!40000 ALTER TABLE `paragraphs` DISABLE KEYS */;

INSERT INTO `paragraphs` (`id`, `paragraph`, `deleted`)
VALUES
	(1,'I am a highly motivated full-stack web developer in training with a keen interest in PHP development. I am currently studying at the Mayden Academy in Bath. I have recently attained my BSc in Computing and IT (Software) from the Open University, this is where I decided to embark on a career as a Software Engineer.	 											',0),
	(2,'In my spare time I enjoy learning new creative skills which require me to use my hands and combine multiple ideas to form new creations. In recent years I have taught myself how to sew, knit and crochet. When I am not working or indulging in my hobbies you will find me providing support to young people in semi independence accommodation.',0),
	(3,'Hi',1),
	(4,'This is cool',1),
	(5,'this is cooler',1),
	(6,'please make this work',1),
	(7,'fingers crossed ',1),
	(8,'last go',1),
	(9,'please let this work',1),
	(10,'is this going to work',1),
	(11,'workers',1),
	(12,'still works',1),
	(13,'works twice',1),
	(14,'1ooth try',1),
	(15,'this is a test',1),
	(16,'this is another test',1),
	(17,'uyfvhjfytkf h',1),
	(18,'uyfvhjfytkf hjo;jp;oi',1),
	(19,'I am a highly motivated full-stack web developer in training with a keen interest in PHP development. I am currently studying at the Mayden Academy in Bath. I have recently attained my BSc in Computing and IT (Software) from the Open University, this is where I decided to embark on a career as a Software Engineer.',1);

/*!40000 ALTER TABLE `paragraphs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `password`)
VALUES
	(2,'jferron','$2y$10$r8oZwA7/JbZKUYMzS2Xb7O3/s7gc46IDOKvCUdGQKIct84CP1pORe');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
