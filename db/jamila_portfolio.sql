# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.6.43)
# Database: jamila_portfolio
# Generation Time: 2019-05-13 21:34:06 +0000
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
	(2,'In my spare time I enjoy learning new creative skills which require me to use my hands and combine multiple ideas to form new creations. In recent years I have taught myself how to sew, knit and crochet. When I am not working or indulging in my hobbies you will find me providing support to young people in semi independence accommodation.',0);

/*!40000 ALTER TABLE `paragraphs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table projects
# ------------------------------------------------------------

DROP TABLE IF EXISTS `projects`;

CREATE TABLE `projects` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `live_link` varchar(255) DEFAULT NULL,
  `repo_link` varchar(255) DEFAULT NULL,
  `img` varchar(255) NOT NULL DEFAULT '',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;

INSERT INTO `projects` (`id`, `name`, `live_link`, `repo_link`, `img`, `deleted`)
VALUES
	(1,'Logo Challenge','','http://bit.ly/Logo-Challenge','uploads/638712503.jpg',0),
	(2,'Paintmaster 3000','http://bit.ly/paintmaster3000','https://github.com/Mayden-Academy/2019-paint-app','uploads/paintmaster.png',0),
	(3,'Pilot Shop','','http://bit.ly/Pilot-Shop','uploads/pilotshop.png',0),
	(4,'Aptitude Test','','http://bit.ly/ma-aptitudetest','uploads/aptitudeTest.png',0),
	(5,'Top Dog','http://bit.ly/nmr-topdog','https://github.com/Mayden-Academy/2019-nmr-TopDog','uploads/topdog.png',0),
	(6,'Portfolio CMS','','http://bit.ly/portfolio-cms','uploads/cms.png',0);

/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `img` varchar(255) DEFAULT 'Null',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `password`, `img`)
VALUES
	(1,'jferron','$2y$10$zfxd9zz.TXBpnUpURsTv9.VDso3liMU4GGi0gnRGw5B8lYvzHa7mq','uploads/IMG_3858.jpg');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
