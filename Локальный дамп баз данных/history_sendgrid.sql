-- MySQL dump 10.14  Distrib 5.5.68-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: history_sendgrid
-- ------------------------------------------------------
-- Server version	5.5.68-MariaDB

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
-- Table structure for table `Contact`
--

DROP TABLE IF EXISTS `Contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Contact` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `name_contact` text,
  PRIMARY KEY (`id_contact`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Contact`
--

LOCK TABLES `Contact` WRITE;
/*!40000 ALTER TABLE `Contact` DISABLE KEYS */;
INSERT INTO `Contact` VALUES (95,NULL),(96,NULL),(97,NULL),(98,NULL),(99,NULL),(100,NULL);
/*!40000 ALTER TABLE `Contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Email`
--

DROP TABLE IF EXISTS `Email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Email` (
  `id_email` int(11) NOT NULL AUTO_INCREMENT,
  `id_contact` int(11) NOT NULL,
  `email` varchar(320) NOT NULL,
  PRIMARY KEY (`id_email`),
  KEY `id_contact` (`id_contact`),
  KEY `id_contact_2` (`id_contact`),
  KEY `id_contact_3` (`id_contact`),
  CONSTRAINT `Email_ibfk_1` FOREIGN KEY (`id_contact`) REFERENCES `Contact` (`id_contact`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Email`
--

LOCK TABLES `Email` WRITE;
/*!40000 ALTER TABLE `Email` DISABLE KEYS */;
INSERT INTO `Email` VALUES (38,95,'aylav98@mail.ru'),(39,96,'dva@netlife.pro'),(40,97,'damakinava@netlife.pro'),(41,98,'alewtina.tikhonova@yandex.ru'),(42,99,'damakinava@gmail.com'),(43,100,'song40@yandex.ru');
/*!40000 ALTER TABLE `Email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `History`
--

DROP TABLE IF EXISTS `History`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `History` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_email` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `id_template` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_contact` (`id_email`),
  KEY `id_contact_2` (`id_email`),
  KEY `id_template` (`id_template`),
  KEY `id_email` (`id_email`),
  CONSTRAINT `History_ibfk_3` FOREIGN KEY (`id_email`) REFERENCES `Email` (`id_email`),
  CONSTRAINT `History_ibfk_2` FOREIGN KEY (`id_template`) REFERENCES `Template` (`id_template`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `History`
--

LOCK TABLES `History` WRITE;
/*!40000 ALTER TABLE `History` DISABLE KEYS */;
INSERT INTO `History` VALUES (23,38,'2021-05-20 13:43:53',14),(24,39,'2021-05-20 13:43:53',14),(25,40,'2021-05-20 13:43:53',14),(26,41,'2021-05-20 13:47:06',14),(27,41,'2021-05-20 13:48:38',14),(28,42,'2021-05-20 13:48:38',14),(29,41,'2021-05-20 13:49:39',15),(30,42,'2021-05-20 13:49:39',15),(31,41,'2021-05-20 13:50:59',15),(32,42,'2021-05-20 13:50:59',15),(33,38,'2021-05-20 23:36:11',15),(34,38,'2021-05-20 23:37:12',15),(35,38,'2021-05-20 23:37:18',16),(36,38,'2021-05-20 23:37:37',14),(37,38,'2021-05-20 23:38:24',14),(38,38,'2021-05-20 23:38:30',17),(39,38,'2021-05-20 23:39:26',17),(40,38,'2021-05-20 23:41:06',17),(41,38,'2021-05-20 23:41:25',14),(42,39,'2021-05-20 23:41:25',14),(43,42,'2021-05-20 23:41:25',14),(44,38,'2021-05-20 23:43:26',14),(45,39,'2021-05-20 23:43:26',14),(46,42,'2021-05-20 23:43:26',14),(47,43,'2021-05-20 23:43:26',14),(48,41,'2021-05-20 23:43:26',14),(49,38,'2021-05-20 23:51:23',14),(50,39,'2021-05-20 23:51:23',14),(51,42,'2021-05-20 23:51:23',14),(52,41,'2021-05-20 23:51:23',14),(53,38,'2021-05-20 23:51:31',14),(54,39,'2021-05-20 23:51:31',14),(55,42,'2021-05-20 23:51:31',14),(56,41,'2021-05-20 23:51:31',14),(57,38,'2021-05-20 23:51:37',15),(58,39,'2021-05-20 23:51:37',15),(59,42,'2021-05-20 23:51:37',15),(60,41,'2021-05-20 23:51:37',15),(61,38,'2021-05-21 00:01:18',15),(62,39,'2021-05-21 00:01:18',15),(63,42,'2021-05-21 00:01:18',15),(64,41,'2021-05-21 00:01:18',15);
/*!40000 ALTER TABLE `History` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Template`
--

DROP TABLE IF EXISTS `Template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Template` (
  `id_template` int(11) NOT NULL AUTO_INCREMENT,
  `id_template_sendgrid` text NOT NULL,
  `name_template` text NOT NULL,
  PRIMARY KEY (`id_template`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Template`
--

LOCK TABLES `Template` WRITE;
/*!40000 ALTER TABLE `Template` DISABLE KEYS */;
INSERT INTO `Template` VALUES (14,'d-697bdba370734e20bcdad329e1e5ef1f','Общий шаблон 01ms со всем перечнем услуг'),(15,'d-67a1839a06b04b8fb9b7ad19f76cfc9d','Test'),(16,'d-bf8bf8f5e6ff4964a891e9e4be77c9a5','new test'),(17,'d-1dcf1ceabfff42b59fa45214a59c023e','new Test');
/*!40000 ALTER TABLE `Template` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-21  0:48:20
