-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: goodface
-- ------------------------------------------------------
-- Server version	5.7.11-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `birth_day` date DEFAULT NULL,
  `sex` varchar(6) DEFAULT NULL,
  `city_id` int(10) unsigned NOT NULL,
  `reg_date` datetime DEFAULT NULL,
  `last_login_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `login` (`login`),
  KEY `city_id` (`city_id`),
  CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city_` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (5,'dasha','7c4a8d09ca3762af61e59520943dc26494f8941b','Дарья','Балактионова','2016-05-04','woman',20671,'2016-05-04 03:00:31','2016-05-05 03:23:05'),(6,'test13','7c4a8d09ca3762af61e59520943dc26494f8941b','test','test','2016-05-04','man',17849,'2016-05-04 03:00:31','2016-05-05 11:37:18'),(7,'test14','7c4a8d09ca3762af61e59520943dc26494f8941b','test','test','1995-03-02','man',17849,'2016-05-04 03:00:31','2016-05-05 11:37:45'),(8,'antosha','677e9e611aa63260ee4b5ccdee0431829966e4d8','Антон','Рейтаровский','1998-06-03','man',20671,'2016-05-04 03:00:32','2016-05-05 11:01:27'),(9,'       ','bab791e157462ccf081f4d7b85ca026b3a1940cd','               ','               ','2016-05-11','man',25751,'2016-05-05 06:12:44','2016-05-05 03:20:36'),(14,'   valerka','7c4a8d09ca3762af61e59520943dc26494f8941b','   valera','   sdkfskdfksdf','2016-05-29','man',26439,'2016-05-05 07:01:24','2016-05-05 04:01:24');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-22 16:37:53
