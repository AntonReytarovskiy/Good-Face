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
-- Table structure for table `deletes`
--

DROP TABLE IF EXISTS `deletes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `deletes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `del_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `delete` (`message_id`,`login`),
  KEY `login` (`login`),
  CONSTRAINT `deletes_ibfk_1` FOREIGN KEY (`message_id`) REFERENCES `messages` (`ID`) ON DELETE CASCADE,
  CONSTRAINT `deletes_ibfk_2` FOREIGN KEY (`login`) REFERENCES `accounts` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deletes`
--

LOCK TABLES `deletes` WRITE;
/*!40000 ALTER TABLE `deletes` DISABLE KEYS */;
INSERT INTO `deletes` VALUES (1,3,'antosha','2016-05-05 03:00:48'),(2,4,'antosha','2016-05-05 03:00:58'),(3,5,'antosha','2016-05-05 03:01:19'),(4,2,'antosha','2016-05-05 03:01:23'),(5,1,'antosha','2016-05-05 03:07:27'),(6,7,'antosha','2016-05-05 03:09:22'),(7,6,'antosha','2016-05-05 03:11:18'),(8,10,'antosha','2016-05-05 03:11:26'),(9,8,'antosha','2016-05-05 03:11:33'),(10,16,'antosha','2016-05-05 03:41:54'),(11,15,'antosha','2016-05-05 03:41:56'),(12,14,'antosha','2016-05-05 03:41:57'),(13,13,'antosha','2016-05-05 03:41:58'),(14,12,'antosha','2016-05-05 03:42:02');
/*!40000 ALTER TABLE `deletes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-22 16:37:55
