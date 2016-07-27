-- MySQL dump 10.13  Distrib 5.6.30, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: sellutions_app
-- ------------------------------------------------------
-- Server version	5.6.30-0ubuntu0.15.10.1

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
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (1,'SOHO','Badajoz 130','asdf sadf asdf asf',NULL,'2016-04-29 20:18:09');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `field`
--

DROP TABLE IF EXISTS `field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fieldset_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `field`
--

LOCK TABLES `field` WRITE;
/*!40000 ALTER TABLE `field` DISABLE KEYS */;
INSERT INTO `field` VALUES (1,1,'¿El comerciante realiza un acercamiento acorde al modelo?','¿El comerciante realiza un acercamiento acorde al modelo?',1,'2016-05-02 15:14:15','2016-05-02 15:14:15'),(2,NULL,'¿El Comercial se habilita ...?','¿El Comercial se habilita ...?',1,'2016-05-02 15:32:00','2016-05-02 15:32:00');
/*!40000 ALTER TABLE `field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fieldset`
--

DROP TABLE IF EXISTS `fieldset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fieldset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `form_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fieldset`
--

LOCK TABLES `fieldset` WRITE;
/*!40000 ALTER TABLE `fieldset` DISABLE KEYS */;
INSERT INTO `fieldset` VALUES (1,'Acercamiento','Acercamiento Acercamiento Acercamiento',1,'2016-05-02 15:02:07','2016-05-02 15:04:55'),(2,'Indagar y Desarrollar','Indagar y Desarrollar\r\nIndagar y Desarrollar\r\nIndagar y Desarrollar',1,'2016-05-02 15:05:19','2016-05-02 15:05:19');
/*!40000 ALTER TABLE `fieldset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form`
--

DROP TABLE IF EXISTS `form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form`
--

LOCK TABLES `form` WRITE;
/*!40000 ALTER TABLE `form` DISABLE KEYS */;
INSERT INTO `form` VALUES (1,'Jugada del Día','asdf asdf sadf asdf s\r\nadf sdf asd\r\nf asdf sdf asdf asdf asdf ',NULL,'2016-04-29 21:31:31','2016-04-29 21:31:31'),(2,'Emprendedores y Pymes','asdasd',2,'2016-04-29 21:46:43','2016-05-02 15:00:54');
/*!40000 ALTER TABLE `form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1461874601),('m130524_201442_init',1461874607),('m160428_201138_initial',1461874607),('m160428_201354_user',1461874607);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `consultant_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '2',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (2,'Proyecto 1',1,2,11,1,'2016-05-02 20:37:04','2016-05-03 18:59:07');
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_subsidiary`
--

DROP TABLE IF EXISTS `project_subsidiary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_subsidiary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `subsidiary_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_subsidiary`
--

LOCK TABLES `project_subsidiary` WRITE;
/*!40000 ALTER TABLE `project_subsidiary` DISABLE KEYS */;
INSERT INTO `project_subsidiary` VALUES (1,NULL,1),(2,NULL,2),(3,NULL,1),(4,NULL,1),(5,NULL,2),(6,NULL,1),(7,NULL,2),(8,NULL,2),(9,NULL,1),(10,NULL,2),(11,NULL,1),(12,NULL,2),(13,NULL,1),(14,NULL,2),(15,NULL,1),(16,NULL,2),(17,NULL,1),(18,NULL,2),(19,NULL,1),(20,NULL,2),(21,NULL,1),(22,NULL,2),(23,NULL,1),(24,NULL,2),(25,NULL,1),(26,NULL,2),(27,NULL,1),(28,NULL,2),(29,NULL,1),(30,NULL,2),(31,NULL,1),(32,NULL,2),(33,NULL,1),(34,NULL,2),(35,NULL,1),(36,NULL,2),(37,NULL,1),(38,NULL,2),(39,NULL,1),(40,NULL,2),(41,2,1),(42,2,2);
/*!40000 ALTER TABLE `project_subsidiary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `round`
--

DROP TABLE IF EXISTS `round`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `round` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `round`
--

LOCK TABLES `round` WRITE;
/*!40000 ALTER TABLE `round` DISABLE KEYS */;
INSERT INTO `round` VALUES (22,2,'Ronda',1,'2016-05-02 00:00:00','2016-05-06 00:00:00','2016-05-03 18:59:08','2016-05-03 18:59:08'),(23,2,'Ronda',2,'2016-05-09 00:00:00','2016-05-13 00:00:00','2016-05-03 18:59:08','2016-05-03 18:59:08');
/*!40000 ALTER TABLE `round` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subsidiary`
--

DROP TABLE IF EXISTS `subsidiary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subsidiary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` text,
  `company_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subsidiary`
--

LOCK TABLES `subsidiary` WRITE;
/*!40000 ALTER TABLE `subsidiary` DISABLE KEYS */;
INSERT INTO `subsidiary` VALUES (1,'Sucursal Principal','Badajoz 130','Sucursal Principal\r\nBadajoz 130',1,'2016-04-29 20:38:12','2016-04-29 20:49:31'),(2,'Sucursal Secundaria','Badajoz 130','Sucursal Secundaria Sucursal Secundaria\r\nSucursal Secundaria Sucursal Secundaria',1,'2016-04-29 20:53:27','2016-04-29 20:53:27');
/*!40000 ALTER TABLE `subsidiary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `type` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (2,'Victor','Palma','victor','M8vinihgoiYDmce0yv3sITkj-H7x1j69','$2y$13$csfMao/K5AIckSyL0qfNue8vQ.Aw3c.S6S3P.qYpk24tYk5U4DMc6',NULL,'victor@soho.cl',10,1,1461879674,1461879674),(11,'Victor','Palma','victor2','6rOx8YYBbnDy7o9GUB4GH899rXtfBfv3','$2y$13$F5lWJyC6YRbTlqGfmLO0kucmMkfVdfCjbUE/DT9u9cUzosmRJRE/i',NULL,'victor2@soho.cl',10,2,1462206534,1462206534);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-03 18:03:52
