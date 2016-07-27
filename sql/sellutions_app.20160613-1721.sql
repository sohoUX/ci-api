-- MySQL dump 10.13  Distrib 5.7.12, for Linux (x86_64)
--
-- Host: localhost    Database: sellutions_app
-- ------------------------------------------------------
-- Server version	5.7.12-0ubuntu1

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
-- Table structure for table `commune`
--

DROP TABLE IF EXISTS `commune`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commune` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `province_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=346 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commune`
--

LOCK TABLES `commune` WRITE;
/*!40000 ALTER TABLE `commune` DISABLE KEYS */;
INSERT INTO `commune` VALUES (1,'Arica',1),(2,'Camarones',1),(3,'General Lagos',2),(4,'Putre',2),(5,'Alto Hospicio',3),(6,'Iquique',3),(7,'Camiña',4),(8,'Colchane',4),(9,'Huara',4),(10,'Pica',4),(11,'Pozo Almonte',4),(12,'Antofagasta',5),(13,'Mejillones',5),(14,'Sierra Gorda',5),(15,'Taltal',5),(16,'Calama',6),(17,'Ollague',6),(18,'San Pedro de Atacama',6),(19,'María Elena',7),(20,'Tocopilla',7),(21,'Chañaral',8),(22,'Diego de Almagro',8),(23,'Caldera',9),(24,'Copiapó',9),(25,'Tierra Amarilla',9),(26,'Alto del Carmen',10),(27,'Freirina',10),(28,'Huasco',10),(29,'Vallenar',10),(30,'Canela',11),(31,'Illapel',11),(32,'Los Vilos',11),(33,'Salamanca',11),(34,'Andacollo',12),(35,'Coquimbo',12),(36,'La Higuera',12),(37,'La Serena',12),(38,'Paihuaco',12),(39,'Vicuña',12),(40,'Combarbalá',13),(41,'Monte Patria',13),(42,'Ovalle',13),(43,'Punitaqui',13),(44,'Río Hurtado',13),(45,'Isla de Pascua',14),(46,'Calle Larga',15),(47,'Los Andes',15),(48,'Rinconada',15),(49,'San Esteban',15),(50,'La Ligua',16),(51,'Papudo',16),(52,'Petorca',16),(53,'Zapallar',16),(54,'Hijuelas',17),(55,'La Calera',17),(56,'La Cruz',17),(57,'Limache',17),(58,'Nogales',17),(59,'Olmué',17),(60,'Quillota',17),(61,'Algarrobo',18),(62,'Cartagena',18),(63,'El Quisco',18),(64,'El Tabo',18),(65,'San Antonio',18),(66,'Santo Domingo',18),(67,'Catemu',19),(68,'Llaillay',19),(69,'Panquehue',19),(70,'Putaendo',19),(71,'San Felipe',19),(72,'Santa María',19),(73,'Casablanca',20),(74,'Concón',20),(75,'Juan Fernández',20),(76,'Puchuncaví',20),(77,'Quilpué',20),(78,'Quintero',20),(79,'Valparaíso',20),(80,'Villa Alemana',20),(81,'Viña del Mar',20),(82,'Colina',21),(83,'Lampa',21),(84,'Tiltil',21),(85,'Pirque',22),(86,'Puente Alto',22),(87,'San José de Maipo',22),(88,'Buin',23),(89,'Calera de Tango',23),(90,'Paine',23),(91,'San Bernardo',23),(92,'Alhué',24),(93,'Curacaví',24),(94,'María Pinto',24),(95,'Melipilla',24),(96,'San Pedro',24),(97,'Cerrillos',25),(98,'Cerro Navia',25),(99,'Conchalí',25),(100,'El Bosque',25),(101,'Estación Central',25),(102,'Huechuraba',25),(103,'Independencia',25),(104,'La Cisterna',25),(105,'La Granja',25),(106,'La Florida',25),(107,'La Pintana',25),(108,'La Reina',25),(109,'Las Condes',25),(110,'Lo Barnechea',25),(111,'Lo Espejo',25),(112,'Lo Prado',25),(113,'Macul',25),(114,'Maipú',25),(115,'Ñuñoa',25),(116,'Pedro Aguirre Cerda',25),(117,'Peñalolén',25),(118,'Providencia',25),(119,'Pudahuel',25),(120,'Quilicura',25),(121,'Quinta Normal',25),(122,'Recoleta',25),(123,'Renca',25),(124,'San Miguel',25),(125,'San Joaquín',25),(126,'San Ramón',25),(127,'Santiago',25),(128,'Vitacura',25),(129,'El Monte',26),(130,'Isla de Maipo',26),(131,'Padre Hurtado',26),(132,'Peñaflor',26),(133,'Talagante',26),(134,'Codegua',27),(135,'Coínco',27),(136,'Coltauco',27),(137,'Doñihue',27),(138,'Graneros',27),(139,'Las Cabras',27),(140,'Machalí',27),(141,'Malloa',27),(142,'Mostazal',27),(143,'Olivar',27),(144,'Peumo',27),(145,'Pichidegua',27),(146,'Quinta de Tilcoco',27),(147,'Rancagua',27),(148,'Rengo',27),(149,'Requínoa',27),(150,'San Vicente de Tagua Tagua',27),(151,'La Estrella',28),(152,'Litueche',28),(153,'Marchihue',28),(154,'Navidad',28),(155,'Peredones',28),(156,'Pichilemu',28),(157,'Chépica',29),(158,'Chimbarongo',29),(159,'Lolol',29),(160,'Nancagua',29),(161,'Palmilla',29),(162,'Peralillo',29),(163,'Placilla',29),(164,'Pumanque',29),(165,'San Fernando',29),(166,'Santa Cruz',29),(167,'Cauquenes',30),(168,'Chanco',30),(169,'Pelluhue',30),(170,'Curicó',31),(171,'Hualañé',31),(172,'Licantén',31),(173,'Molina',31),(174,'Rauco',31),(175,'Romeral',31),(176,'Sagrada Familia',31),(177,'Teno',31),(178,'Vichuquén',31),(179,'Colbún',32),(180,'Linares',32),(181,'Longaví',32),(182,'Parral',32),(183,'Retiro',32),(184,'San Javier',32),(185,'Villa Alegre',32),(186,'Yerbas Buenas',32),(187,'Constitución',33),(188,'Curepto',33),(189,'Empedrado',33),(190,'Maule',33),(191,'Pelarco',33),(192,'Pencahue',33),(193,'Río Claro',33),(194,'San Clemente',33),(195,'San Rafael',33),(196,'Talca',33),(197,'Arauco',34),(198,'Cañete',34),(199,'Contulmo',34),(200,'Curanilahue',34),(201,'Lebu',34),(202,'Los Álamos',34),(203,'Tirúa',34),(204,'Alto Biobío',35),(205,'Antuco',35),(206,'Cabrero',35),(207,'Laja',35),(208,'Los Ángeles',35),(209,'Mulchén',35),(210,'Nacimiento',35),(211,'Negrete',35),(212,'Quilaco',35),(213,'Quilleco',35),(214,'San Rosendo',35),(215,'Santa Bárbara',35),(216,'Tucapel',35),(217,'Yumbel',35),(218,'Chiguayante',36),(219,'Concepción',36),(220,'Coronel',36),(221,'Florida',36),(222,'Hualpén',36),(223,'Hualqui',36),(224,'Lota',36),(225,'Penco',36),(226,'San Pedro de La Paz',36),(227,'Santa Juana',36),(228,'Talcahuano',36),(229,'Tomé',36),(230,'Bulnes',37),(231,'Chillán',37),(232,'Chillán Viejo',37),(233,'Cobquecura',37),(234,'Coelemu',37),(235,'Coihueco',37),(236,'El Carmen',37),(237,'Ninhue',37),(238,'Ñiquen',37),(239,'Pemuco',37),(240,'Pinto',37),(241,'Portezuelo',37),(242,'Quillón',37),(243,'Quirihue',37),(244,'Ránquil',37),(245,'San Carlos',37),(246,'San Fabián',37),(247,'San Ignacio',37),(248,'San Nicolás',37),(249,'Treguaco',37),(250,'Yungay',37),(251,'Carahue',38),(252,'Cholchol',38),(253,'Cunco',38),(254,'Curarrehue',38),(255,'Freire',38),(256,'Galvarino',38),(257,'Gorbea',38),(258,'Lautaro',38),(259,'Loncoche',38),(260,'Melipeuco',38),(261,'Nueva Imperial',38),(262,'Padre Las Casas',38),(263,'Perquenco',38),(264,'Pitrufquén',38),(265,'Pucón',38),(266,'Saavedra',38),(267,'Temuco',38),(268,'Teodoro Schmidt',38),(269,'Toltén',38),(270,'Vilcún',38),(271,'Villarrica',38),(272,'Angol',39),(273,'Collipulli',39),(274,'Curacautín',39),(275,'Ercilla',39),(276,'Lonquimay',39),(277,'Los Sauces',39),(278,'Lumaco',39),(279,'Purén',39),(280,'Renaico',39),(281,'Traiguén',39),(282,'Victoria',39),(283,'Corral',40),(284,'Lanco',40),(285,'Los Lagos',40),(286,'Máfil',40),(287,'Mariquina',40),(288,'Paillaco',40),(289,'Panguipulli',40),(290,'Valdivia',40),(291,'Futrono',41),(292,'La Unión',41),(293,'Lago Ranco',41),(294,'Río Bueno',41),(295,'Ancud',42),(296,'Castro',42),(297,'Chonchi',42),(298,'Curaco de Vélez',42),(299,'Dalcahue',42),(300,'Puqueldón',42),(301,'Queilén',42),(302,'Quemchi',42),(303,'Quellón',42),(304,'Quinchao',42),(305,'Calbuco',43),(306,'Cochamó',43),(307,'Fresia',43),(308,'Frutillar',43),(309,'Llanquihue',43),(310,'Los Muermos',43),(311,'Maullín',43),(312,'Puerto Montt',43),(313,'Puerto Varas',43),(314,'Osorno',44),(315,'Puero Octay',44),(316,'Purranque',44),(317,'Puyehue',44),(318,'Río Negro',44),(319,'San Juan de la Costa',44),(320,'San Pablo',44),(321,'Chaitén',45),(322,'Futaleufú',45),(323,'Hualaihué',45),(324,'Palena',45),(325,'Aisén',46),(326,'Cisnes',46),(327,'Guaitecas',46),(328,'Cochrane',47),(329,'O\'higgins',47),(330,'Tortel',47),(331,'Coihaique',48),(332,'Lago Verde',48),(333,'Chile Chico',49),(334,'Río Ibáñez',49),(335,'Antártica',50),(336,'Cabo de Hornos',50),(337,'Laguna Blanca',51),(338,'Punta Arenas',51),(339,'Río Verde',51),(340,'San Gregorio',51),(341,'Porvenir',52),(342,'Primavera',52),(343,'Timaukel',52),(344,'Natales',53),(345,'Torres del Paine',53);
/*!40000 ALTER TABLE `commune` ENABLE KEYS */;
UNLOCK TABLES;

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
  `logo` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (1,'SOHO','Badajoz 130','asdf sadf asdf asf','/frontend/web/img/logos/1-logo-supervielle-1462384067.png',NULL,'2016-05-04 17:47:47'),(3,'Sellutions','Sellutions 123','Sellutions','/frontend/web/img/logos/3-logo-1464969203.png','2016-06-03 15:53:23','2016-06-03 15:53:23');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluation`
--

DROP TABLE IF EXISTS `evaluation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_id` int(11) DEFAULT NULL,
  `consultant_id` int(11) DEFAULT NULL,
  `form_id` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `subsidiary_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `round_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluation`
--

LOCK TABLES `evaluation` WRITE;
/*!40000 ALTER TABLE `evaluation` DISABLE KEYS */;
/*!40000 ALTER TABLE `evaluation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluation_area`
--

DROP TABLE IF EXISTS `evaluation_area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluation_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluation_area`
--

LOCK TABLES `evaluation_area` WRITE;
/*!40000 ALTER TABLE `evaluation_area` DISABLE KEYS */;
INSERT INTO `evaluation_area` VALUES (1,'Red de sucursales','Red de sucursales','2016-06-03 14:22:22','2016-06-03 14:22:22'),(2,'Red de Oficinas','Red de Oficinas','2016-06-03 14:53:50','2016-06-03 14:53:50');
/*!40000 ALTER TABLE `evaluation_area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluation_field`
--

DROP TABLE IF EXISTS `evaluation_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluation_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evaluation_id` int(11) DEFAULT NULL,
  `field_id` int(11) DEFAULT NULL,
  `answer` int(11) DEFAULT '0',
  `alternatives` text,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluation_field`
--

LOCK TABLES `evaluation_field` WRITE;
/*!40000 ALTER TABLE `evaluation_field` DISABLE KEYS */;
/*!40000 ALTER TABLE `evaluation_field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluation_observation`
--

DROP TABLE IF EXISTS `evaluation_observation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluation_observation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evaluation_id` int(11) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluation_observation`
--

LOCK TABLES `evaluation_observation` WRITE;
/*!40000 ALTER TABLE `evaluation_observation` DISABLE KEYS */;
/*!40000 ALTER TABLE `evaluation_observation` ENABLE KEYS */;
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
  `code` varchar(45) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `field`
--

LOCK TABLES `field` WRITE;
/*!40000 ALTER TABLE `field` DISABLE KEYS */;
INSERT INTO `field` VALUES (1,1,'','¿Realiza Planificación para el logro de objetivos ?','',1,'2016-06-13 20:27:16','2016-06-13 20:27:16'),(2,1,'','¿Utiliza Embudo de Ventas?','',1,'2016-06-13 20:28:00','2016-06-13 20:28:00'),(3,1,'',' ¿Asigna a cada colaborador objetivos individuales?','',1,'2016-06-13 20:28:23','2016-06-13 20:28:23'),(4,1,'','¿Revisa semanalmente las Oportunidades con su Equipo?','',1,'2016-06-13 20:28:33','2016-06-13 20:28:33');
/*!40000 ALTER TABLE `field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `field_predefined_answer`
--

DROP TABLE IF EXISTS `field_predefined_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `field_predefined_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field_id` int(11) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `answer` int(11) DEFAULT NULL,
  `detail` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `field_predefined_answer`
--

LOCK TABLES `field_predefined_answer` WRITE;
/*!40000 ALTER TABLE `field_predefined_answer` DISABLE KEYS */;
INSERT INTO `field_predefined_answer` VALUES (23,134,NULL,1,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus semper lacus et arcu scelerisque sollicitudin. Quisque lacus erat, faucibus quis nulla vitae, fringilla sodales tortor.','2016-06-07 20:28:21','2016-06-07 20:28:21'),(24,134,NULL,1,' Etiam vestibulum pretium tellus vel mollis. Sed odio ex, ornare in magna in, bibendum mollis tellus. Fusce mattis ornare fermentum.','2016-06-07 20:28:21','2016-06-07 20:28:21'),(25,134,NULL,1,'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc laoreet iaculis fringilla. In auctor ac est eget suscipit.','2016-06-07 20:28:21','2016-06-07 20:28:21'),(26,134,NULL,2,'Mauris iaculis euismod nibh, blandit laoreet ligula consectetur nec. Sed consectetur finibus tincidunt. Morbi aliquet fringilla ex, nec condimentum lacus dapibus eu.','2016-06-07 20:28:21','2016-06-07 20:28:21');
/*!40000 ALTER TABLE `field_predefined_answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `field_skip_logic`
--

DROP TABLE IF EXISTS `field_skip_logic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `field_skip_logic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field_id` int(11) DEFAULT NULL,
  `target_id` int(11) DEFAULT NULL,
  `answer` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `field_skip_logic`
--

LOCK TABLES `field_skip_logic` WRITE;
/*!40000 ALTER TABLE `field_skip_logic` DISABLE KEYS */;
/*!40000 ALTER TABLE `field_skip_logic` ENABLE KEYS */;
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
  `percentage` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fieldset`
--

LOCK TABLES `fieldset` WRITE;
/*!40000 ALTER TABLE `fieldset` DISABLE KEYS */;
INSERT INTO `fieldset` VALUES (1,'Planificación Responsable de Sucursal','',100,'2016-06-13 19:59:46','2016-06-13 20:01:09'),(2,'Acercamiento','',5,'2016-06-13 20:04:36','2016-06-13 20:04:36'),(3,'Indagar y Desarrollar','',40,'2016-06-13 20:05:36','2016-06-13 20:05:36'),(4,'Presentar Propuesta','',15,'2016-06-13 20:05:58','2016-06-13 20:05:58'),(5,'Cerrar la Venta','',15,'2016-06-13 20:07:44','2016-06-13 20:07:44'),(6,'Relacionamiento','',10,'2016-06-13 20:08:10','2016-06-13 20:08:10'),(7,'Contacto Telefónico','',15,'2016-06-13 20:47:57','2016-06-13 20:47:57'),(8,'Seguimiento','',20,'2016-06-13 20:48:56','2016-06-13 20:48:56'),(9,'Apertura','',15,'2016-06-13 20:49:09','2016-06-13 20:49:09'),(10,'Detección de Fortalezas y Oportunidades de Mejora','',40,'2016-06-13 20:49:23','2016-06-13 20:49:23'),(11,'Conducta Prioritaria y Plan Táctico','',15,'2016-06-13 20:49:41','2016-06-13 20:49:41');
/*!40000 ALTER TABLE `fieldset` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `file`
--

DROP TABLE IF EXISTS `file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `entity_id` int(11) DEFAULT NULL,
  `entity_type` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `file`
--

LOCK TABLES `file` WRITE;
/*!40000 ALTER TABLE `file` DISABLE KEYS */;
/*!40000 ALTER TABLE `file` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form`
--

LOCK TABLES `form` WRITE;
/*!40000 ALTER TABLE `form` DISABLE KEYS */;
INSERT INTO `form` VALUES (1,'Planificación','',2,'2016-06-13 19:44:40','2016-06-13 20:24:47'),(2,'Colaborador 1','',2,'2016-06-13 19:44:52','2016-06-13 20:59:21'),(3,'Colaborador 2','',2,'2016-06-13 19:45:03','2016-06-13 21:00:05'),(4,'Responsable de Sucursal','',2,'2016-06-13 19:45:13','2016-06-13 21:01:25'),(5,'Gerente Zonal','',2,'2016-06-13 19:45:29','2016-06-13 21:02:06');
/*!40000 ALTER TABLE `form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `form_fieldset`
--

DROP TABLE IF EXISTS `form_fieldset`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `form_fieldset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_id` int(11) DEFAULT '0',
  `fieldset_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `form_fieldset`
--

LOCK TABLES `form_fieldset` WRITE;
/*!40000 ALTER TABLE `form_fieldset` DISABLE KEYS */;
INSERT INTO `form_fieldset` VALUES (1,1,1),(2,2,2),(3,2,3),(4,2,4),(5,2,5),(6,2,6),(7,2,7),(8,3,2),(9,3,3),(10,3,4),(11,3,5),(12,3,6),(13,3,7),(14,4,8),(15,4,9),(16,4,10),(17,4,11),(18,5,8),(19,5,9),(20,5,10),(21,5,11);
/*!40000 ALTER TABLE `form_fieldset` ENABLE KEYS */;
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
  `area_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `consultant_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '2',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (2,'Proyecto 1',1,1,2,11,1,'2016-05-02 20:37:04','2016-06-03 14:50:00'),(5,'Proyecto Oficinas',2,3,2,11,1,'2016-06-03 15:06:24','2016-06-03 16:05:34'),(6,'Proyecto 2',1,1,2,11,1,'2016-06-07 17:27:03','2016-06-07 17:27:11'),(7,'Proyecto 4',1,1,2,11,1,'2016-06-08 21:21:46','2016-06-10 19:22:54');
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_form`
--

DROP TABLE IF EXISTS `project_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `form_id` int(11) DEFAULT NULL,
  `percentage` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_form`
--

LOCK TABLES `project_form` WRITE;
/*!40000 ALTER TABLE `project_form` DISABLE KEYS */;
INSERT INTO `project_form` VALUES (1,NULL,1,NULL),(2,NULL,2,NULL),(3,NULL,1,NULL),(4,NULL,2,NULL),(5,NULL,3,NULL),(6,NULL,4,NULL),(7,NULL,5,NULL),(8,NULL,6,NULL),(9,NULL,1,NULL),(10,NULL,2,NULL),(11,NULL,3,NULL),(12,NULL,4,NULL),(13,NULL,5,NULL),(14,NULL,6,NULL),(15,NULL,1,NULL),(16,NULL,2,NULL),(17,NULL,3,NULL),(18,NULL,4,NULL),(19,NULL,5,NULL),(20,NULL,6,NULL),(21,NULL,1,NULL),(22,NULL,2,NULL),(23,NULL,3,NULL),(24,NULL,4,NULL),(25,NULL,5,NULL),(26,NULL,6,NULL),(27,NULL,1,NULL),(28,NULL,2,NULL),(29,NULL,3,NULL),(30,NULL,4,NULL),(31,NULL,5,NULL),(32,NULL,6,NULL),(33,2,1,NULL),(34,2,2,NULL),(35,2,3,NULL),(36,2,4,NULL),(37,2,5,NULL),(38,2,6,NULL),(39,NULL,1,NULL),(40,NULL,2,NULL),(41,NULL,3,NULL),(42,NULL,4,NULL),(43,NULL,5,NULL),(44,NULL,6,NULL),(45,NULL,1,NULL),(46,NULL,2,NULL),(47,NULL,3,NULL),(48,NULL,4,NULL),(49,NULL,5,NULL),(50,NULL,6,NULL),(51,NULL,1,NULL),(52,NULL,2,NULL),(53,NULL,3,NULL),(54,NULL,4,NULL),(55,NULL,5,NULL),(56,NULL,6,NULL),(57,NULL,1,NULL),(58,NULL,2,NULL),(59,NULL,3,NULL),(60,NULL,4,NULL),(61,NULL,5,NULL),(62,NULL,6,NULL),(63,NULL,1,NULL),(64,NULL,2,NULL),(65,NULL,3,NULL),(66,NULL,4,NULL),(67,NULL,5,NULL),(68,NULL,6,NULL),(69,NULL,1,NULL),(70,NULL,2,NULL),(71,NULL,3,NULL),(72,NULL,4,NULL),(73,NULL,5,NULL),(74,NULL,6,NULL),(75,NULL,1,NULL),(76,NULL,2,NULL),(77,NULL,3,NULL),(78,NULL,4,NULL),(79,NULL,5,NULL),(80,NULL,6,NULL),(81,NULL,1,NULL),(82,NULL,2,NULL),(83,NULL,3,NULL),(84,NULL,4,NULL),(85,NULL,5,NULL),(86,NULL,6,NULL),(87,5,7,NULL),(88,NULL,7,NULL),(89,6,7,NULL),(90,NULL,1,NULL),(91,NULL,2,NULL),(92,NULL,1,NULL),(93,NULL,2,NULL),(94,7,1,NULL),(95,7,2,NULL);
/*!40000 ALTER TABLE `project_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_round_observation`
--

DROP TABLE IF EXISTS `project_round_observation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_round_observation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `subsidiary_id` int(11) DEFAULT NULL,
  `round_id` int(11) DEFAULT NULL,
  `comment` text,
  `strengths` text,
  `improvement_opportunities` text,
  `priority_conductive` text,
  `tactical_plan` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_round_observation`
--

LOCK TABLES `project_round_observation` WRITE;
/*!40000 ALTER TABLE `project_round_observation` DISABLE KEYS */;
INSERT INTO `project_round_observation` VALUES (1,2,1,52,'asdd asdasdasd asdd d d asd asd asd',NULL,NULL,NULL,NULL,NULL,NULL),(2,2,1,55,'asdfsadf sadf asdf asdf sadf Guys',NULL,NULL,NULL,NULL,NULL,NULL),(3,5,3,58,'dfsdfsdfsdf','fs','asd','a','ddd','2016-06-07 14:08:40','2016-06-07 14:08:40'),(4,6,1,60,'sdfg sdfg tdf gdfg dsfg','asdasdas','asdasda asqqq','asd adfg xfgh g srg fg','sdfgh sdfg sdfg','2016-06-08 19:19:49','2016-06-08 19:50:34'),(5,7,1,61,'asdasdasd','asdasdasd','asdasd','asdasd','asdasdasd','2016-06-13 13:45:13','2016-06-13 13:46:04');
/*!40000 ALTER TABLE `project_round_observation` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_subsidiary`
--

LOCK TABLES `project_subsidiary` WRITE;
/*!40000 ALTER TABLE `project_subsidiary` DISABLE KEYS */;
INSERT INTO `project_subsidiary` VALUES (1,NULL,1),(2,NULL,2),(3,NULL,1),(4,NULL,1),(5,NULL,2),(6,NULL,1),(7,NULL,2),(8,NULL,2),(9,NULL,1),(10,NULL,2),(11,NULL,1),(12,NULL,2),(13,NULL,1),(14,NULL,2),(15,NULL,1),(16,NULL,2),(17,NULL,1),(18,NULL,2),(19,NULL,1),(20,NULL,2),(21,NULL,1),(22,NULL,2),(23,NULL,1),(24,NULL,2),(25,NULL,1),(26,NULL,2),(27,NULL,1),(28,NULL,2),(29,NULL,1),(30,NULL,2),(31,NULL,1),(32,NULL,2),(33,NULL,1),(34,NULL,2),(35,NULL,1),(36,NULL,2),(37,NULL,1),(38,NULL,2),(39,NULL,1),(40,NULL,2),(41,NULL,1),(42,NULL,2),(43,NULL,1),(44,NULL,2),(45,NULL,1),(46,NULL,2),(47,NULL,1),(48,NULL,2),(49,NULL,1),(50,NULL,2),(51,NULL,1),(52,NULL,2),(53,NULL,1),(54,NULL,2),(55,NULL,1),(56,NULL,2),(57,NULL,1),(58,NULL,2),(59,NULL,1),(60,NULL,2),(61,NULL,1),(62,NULL,2),(63,NULL,1),(64,NULL,2),(65,NULL,1),(66,NULL,2),(67,NULL,1),(68,NULL,2),(69,NULL,1),(70,NULL,2),(71,NULL,1),(72,NULL,2),(73,NULL,1),(74,NULL,2),(75,2,1),(76,2,2),(77,4,1),(78,4,2),(79,NULL,1),(80,NULL,2),(81,NULL,1),(82,NULL,2),(83,NULL,1),(84,NULL,2),(85,NULL,1),(86,NULL,2),(87,NULL,1),(88,NULL,2),(89,NULL,1),(90,NULL,2),(91,NULL,1),(92,NULL,2),(93,NULL,1),(94,NULL,2),(95,NULL,3),(96,5,3),(97,NULL,1),(98,6,1),(99,NULL,1),(100,NULL,1),(101,7,1);
/*!40000 ALTER TABLE `project_subsidiary` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `region_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `province`
--

LOCK TABLES `province` WRITE;
/*!40000 ALTER TABLE `province` DISABLE KEYS */;
INSERT INTO `province` VALUES (1,'Arica',1),(2,'Parinacota',1),(3,'Iquique',2),(4,'El Tamarugal',2),(5,'Antofagasta',3),(6,'El Loa',3),(7,'Tocopilla',3),(8,'Chañaral',4),(9,'Copiapó',4),(10,'Huasco',4),(11,'Choapa',5),(12,'Elqui',5),(13,'Limarí',5),(14,'Isla de Pascua',6),(15,'Los Andes',6),(16,'Petorca',6),(17,'Quillota',6),(18,'San Antonio',6),(19,'San Felipe de Aconcagua',6),(20,'Valparaiso',6),(21,'Chacabuco',7),(22,'Cordillera',7),(23,'Maipo',7),(24,'Melipilla',7),(25,'Santiago',7),(26,'Talagante',7),(27,'Cachapoal',8),(28,'Cardenal Caro',8),(29,'Colchagua',8),(30,'Cauquenes',9),(31,'Curicó',9),(32,'Linares',9),(33,'Talca',9),(34,'Arauco',10),(35,'Bio Bío',10),(36,'Concepción',10),(37,'Ñuble',10),(38,'Cautín',11),(39,'Malleco',11),(40,'Valdivia',12),(41,'Ranco',12),(42,'Chiloé',13),(43,'Llanquihue',13),(44,'Osorno',13),(45,'Palena',13),(46,'Aisén',14),(47,'Capitán Prat',14),(48,'Coihaique',14),(49,'General Carrera',14),(50,'Antártica Chilena',15),(51,'Magallanes',15),(52,'Tierra del Fuego',15),(53,'Última Esperanza',15);
/*!40000 ALTER TABLE `province` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `region`
--

DROP TABLE IF EXISTS `region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `code` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `region`
--

LOCK TABLES `region` WRITE;
/*!40000 ALTER TABLE `region` DISABLE KEYS */;
INSERT INTO `region` VALUES (1,'Arica y Parinacota','XV'),(2,'Tarapacá','I'),(3,'Antofagasta','II'),(4,'Atacama','III'),(5,'Coquimbo','IV'),(6,'Valparaiso','V'),(7,'Metropolitana de Santiago','RM'),(8,'Libertador General Bernardo O\'Higgins','VI'),(9,'Maule','VII'),(10,'Biobío','VIII'),(11,'La Araucanía','IX'),(12,'Los Ríos','XIV'),(13,'Los Lagos','X'),(14,'Aisén del General Carlos Ibáñez del Campo','XI'),(15,'Magallanes y de la Antártica Chilena','XII');
/*!40000 ALTER TABLE `region` ENABLE KEYS */;
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
  `status` int(11) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `round`
--

LOCK TABLES `round` WRITE;
/*!40000 ALTER TABLE `round` DISABLE KEYS */;
INSERT INTO `round` VALUES (54,2,'Ronda',1,NULL,'2016-05-02 00:00:00','2016-05-06 00:00:00','2016-05-31 15:04:45','2016-05-31 15:04:45'),(55,2,'Ronda',2,1,'2016-05-09 00:00:00','2016-05-13 00:00:00','2016-05-31 15:04:45','2016-05-31 15:04:45'),(56,2,'Ronda',1,NULL,'2016-05-02 00:00:00','2016-05-06 00:00:00','2016-06-03 14:50:00','2016-06-03 14:50:00'),(57,2,'Ronda',2,1,'2016-05-09 00:00:00','2016-05-13 00:00:00','2016-06-03 14:50:00','2016-06-03 14:50:00'),(58,5,'Ronda 1',1,1,'2016-05-03 00:00:00','2016-05-03 00:00:00','2016-06-03 15:07:19','2016-06-03 16:05:34'),(59,5,'Ronda 2',2,NULL,'2016-05-03 00:00:00','2016-05-03 00:00:00','2016-06-03 15:17:57','2016-06-03 16:05:34'),(60,6,'Ronda',1,1,'2016-05-07 00:00:00','2016-05-07 00:00:00','2016-06-07 17:27:11','2016-06-07 17:27:11'),(61,7,'Ronda',1,1,'2016-05-08 00:00:00','2016-05-08 00:00:00','2016-06-08 21:21:53','2016-06-10 19:22:54');
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
  `manager` varchar(255) DEFAULT NULL,
  `consultant` varchar(255) DEFAULT NULL,
  `description` text,
  `company_id` int(11) DEFAULT NULL,
  `commune_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subsidiary`
--

LOCK TABLES `subsidiary` WRITE;
/*!40000 ALTER TABLE `subsidiary` DISABLE KEYS */;
INSERT INTO `subsidiary` VALUES (1,'Sucursal Principal','Badajoz 130','Victor Palma',NULL,'Sucursal Principal\r\nBadajoz 130',1,127,'2016-04-29 20:38:12','2016-05-16 16:07:03'),(2,'Sucursal Secundaria','Pocuro 3128','Juan Parra','Jose Perez','Sucursal Secundaria Sucursal Secundaria\r\nSucursal Secundaria Sucursal Secundaria',1,118,'2016-04-29 20:53:27','2016-05-16 16:08:18'),(3,'Sucursal 1','Vicuña Mackenna 181','Gerente s1','Consultor s1','Sucursal 1',3,127,'2016-06-03 15:54:30','2016-06-03 19:39:11');
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
  `gender` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `avatar` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
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
INSERT INTO `user` VALUES (2,'Victor','Palma','victor','M8vinihgoiYDmce0yv3sITkj-H7x1j69','$2y$13$csfMao/K5AIckSyL0qfNue8vQ.Aw3c.S6S3P.qYpk24tYk5U4DMc6',NULL,'victor@soho.cl',10,1,NULL,1461879674,1462452441,'/frontend/web/img/avatars/2.jpg'),(11,'Victor (Consultor)','Palma','victor2','6rOx8YYBbnDy7o9GUB4GH899rXtfBfv3','$2y$13$ktPMRCmw81LcHz3jdcJkieg8UKL44DTUVP4Bpb4jbKNnwru9h.u3u',NULL,'victor.palma.melo@gmail.com',10,2,NULL,1462206534,1464880839,'/frontend/web/img/avatars/11.jpg');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'sellutions_app'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-13 17:21:41
