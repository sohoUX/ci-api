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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (1,'Supervielle','Supervielle','Supervielle','/frontend/web/img/logos/1-imLogoSupervielle-1465857816.jpg','2016-06-13 18:24:24','2016-06-13 22:43:36');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'Afganistán','2016-06-13 18:04:41','2016-06-13 18:04:41'),(2,'Albania','2016-06-13 18:04:41','2016-06-13 18:04:41'),(3,'Argelia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(4,'Samoa Americana','2016-06-13 18:04:41','2016-06-13 18:04:41'),(5,'Andorra','2016-06-13 18:04:41','2016-06-13 18:04:41'),(6,'Angola','2016-06-13 18:04:41','2016-06-13 18:04:41'),(7,'Anguilla','2016-06-13 18:04:41','2016-06-13 18:04:41'),(8,'Antarctica','2016-06-13 18:04:41','2016-06-13 18:04:41'),(9,'Antigua y Barbuda','2016-06-13 18:04:41','2016-06-13 18:04:41'),(10,'Argentina','2016-06-13 18:04:41','2016-06-13 18:04:41'),(11,'Armenia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(12,'Aruba','2016-06-13 18:04:41','2016-06-13 18:04:41'),(13,'Australia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(14,'Austria','2016-06-13 18:04:41','2016-06-13 18:04:41'),(15,'Azerbaiyán','2016-06-13 18:04:41','2016-06-13 18:04:41'),(16,'Bahamas','2016-06-13 18:04:41','2016-06-13 18:04:41'),(17,'Bahrein','2016-06-13 18:04:41','2016-06-13 18:04:41'),(18,'Bangladesh','2016-06-13 18:04:41','2016-06-13 18:04:41'),(19,'Barbados','2016-06-13 18:04:41','2016-06-13 18:04:41'),(20,'Bielorrusia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(21,'Bélgica','2016-06-13 18:04:41','2016-06-13 18:04:41'),(22,'Belice','2016-06-13 18:04:41','2016-06-13 18:04:41'),(23,'Benín','2016-06-13 18:04:41','2016-06-13 18:04:41'),(24,'Bermudas','2016-06-13 18:04:41','2016-06-13 18:04:41'),(25,'Bután','2016-06-13 18:04:41','2016-06-13 18:04:41'),(26,'Bolivia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(27,'Bosnia-Herzegovina','2016-06-13 18:04:41','2016-06-13 18:04:41'),(28,'Botswana','2016-06-13 18:04:41','2016-06-13 18:04:41'),(29,'Brasil','2016-06-13 18:04:41','2016-06-13 18:04:41'),(30,'Brunei Darussalam','2016-06-13 18:04:41','2016-06-13 18:04:41'),(31,'Bulgaria','2016-06-13 18:04:41','2016-06-13 18:04:41'),(32,'Burkina Faso','2016-06-13 18:04:41','2016-06-13 18:04:41'),(33,'Burundi','2016-06-13 18:04:41','2016-06-13 18:04:41'),(34,'Camboya','2016-06-13 18:04:41','2016-06-13 18:04:41'),(35,'Camerún','2016-06-13 18:04:41','2016-06-13 18:04:41'),(36,'Canadá','2016-06-13 18:04:41','2016-06-13 18:04:41'),(37,'Cabo Verde','2016-06-13 18:04:41','2016-06-13 18:04:41'),(38,'Islas Caimán','2016-06-13 18:04:41','2016-06-13 18:04:41'),(39,'República Centroafricana','2016-06-13 18:04:41','2016-06-13 18:04:41'),(40,'Chad','2016-06-13 18:04:41','2016-06-13 18:04:41'),(41,'Chile','2016-06-13 18:04:41','2016-06-13 18:04:41'),(42,'China','2016-06-13 18:04:41','2016-06-13 18:04:41'),(43,'Isla De Navidad, Isla Christmas','2016-06-13 18:04:41','2016-06-13 18:04:41'),(44,'Islas Cocos','2016-06-13 18:04:41','2016-06-13 18:04:41'),(45,'Colombia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(46,'Comores','2016-06-13 18:04:41','2016-06-13 18:04:41'),(47,'República Democrática del Congo','2016-06-13 18:04:41','2016-06-13 18:04:41'),(48,'República del Congo','2016-06-13 18:04:41','2016-06-13 18:04:41'),(49,'Islas Cook','2016-06-13 18:04:41','2016-06-13 18:04:41'),(50,'Costa Rica','2016-06-13 18:04:41','2016-06-13 18:04:41'),(51,'Costa de Marfil','2016-06-13 18:04:41','2016-06-13 18:04:41'),(52,'Croacia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(53,'Cuba','2016-06-13 18:04:41','2016-06-13 18:04:41'),(54,'Chipre','2016-06-13 18:04:41','2016-06-13 18:04:41'),(55,'República Checa','2016-06-13 18:04:41','2016-06-13 18:04:41'),(56,'English English Name - Nombre Inglés','2016-06-13 18:04:41','2016-06-13 18:04:41'),(57,'Dinamarca','2016-06-13 18:04:41','2016-06-13 18:04:41'),(58,'Djibouti, Yibuti','2016-06-13 18:04:41','2016-06-13 18:04:41'),(59,'Dominica','2016-06-13 18:04:41','2016-06-13 18:04:41'),(60,'Dominicana, República','2016-06-13 18:04:41','2016-06-13 18:04:41'),(61,'Timor Oriental','2016-06-13 18:04:41','2016-06-13 18:04:41'),(62,'Ecuador','2016-06-13 18:04:41','2016-06-13 18:04:41'),(63,'Egipto','2016-06-13 18:04:41','2016-06-13 18:04:41'),(64,'El Salvador','2016-06-13 18:04:41','2016-06-13 18:04:41'),(65,'Guinea Ecuatorial','2016-06-13 18:04:41','2016-06-13 18:04:41'),(66,'Eritrea','2016-06-13 18:04:41','2016-06-13 18:04:41'),(67,'Estonia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(68,'Etiopía','2016-06-13 18:04:41','2016-06-13 18:04:41'),(69,'Islas Malvinas','2016-06-13 18:04:41','2016-06-13 18:04:41'),(70,'Islas Feroe','2016-06-13 18:04:41','2016-06-13 18:04:41'),(71,'Fiyi','2016-06-13 18:04:41','2016-06-13 18:04:41'),(72,'Finlandia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(73,'Francia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(74,'Guayana Francesa','2016-06-13 18:04:41','2016-06-13 18:04:41'),(75,'Polinesia Francesa','2016-06-13 18:04:41','2016-06-13 18:04:41'),(76,'Tierras Australes y Antárticas Francesas','2016-06-13 18:04:41','2016-06-13 18:04:41'),(77,'Gabón','2016-06-13 18:04:41','2016-06-13 18:04:41'),(78,'Gambia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(79,'Georgia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(80,'Alemania','2016-06-13 18:04:41','2016-06-13 18:04:41'),(81,'Ghana','2016-06-13 18:04:41','2016-06-13 18:04:41'),(82,'Gibraltar','2016-06-13 18:04:41','2016-06-13 18:04:41'),(83,'Gran Bretaña','2016-06-13 18:04:41','2016-06-13 18:04:41'),(84,'Grecia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(85,'Groenlandia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(86,'Granada','2016-06-13 18:04:41','2016-06-13 18:04:41'),(87,'Guadalupe','2016-06-13 18:04:41','2016-06-13 18:04:41'),(88,'Guam','2016-06-13 18:04:41','2016-06-13 18:04:41'),(89,'Guatemala','2016-06-13 18:04:41','2016-06-13 18:04:41'),(90,'República Guinea','2016-06-13 18:04:41','2016-06-13 18:04:41'),(91,'Guinea Bissau','2016-06-13 18:04:41','2016-06-13 18:04:41'),(92,'Guyana','2016-06-13 18:04:41','2016-06-13 18:04:41'),(93,'English English Name - Nombre Inglés','2016-06-13 18:04:41','2016-06-13 18:04:41'),(94,'Haiti','2016-06-13 18:04:41','2016-06-13 18:04:41'),(95,'Santa Sede, Vaticano, Ciudad del Vaticano','2016-06-13 18:04:41','2016-06-13 18:04:41'),(96,'Honduras','2016-06-13 18:04:41','2016-06-13 18:04:41'),(97,'Hong Kong','2016-06-13 18:04:41','2016-06-13 18:04:41'),(98,'Hungría','2016-06-13 18:04:41','2016-06-13 18:04:41'),(99,'Islandia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(100,'India','2016-06-13 18:04:41','2016-06-13 18:04:41'),(101,'Indonesia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(102,'Irán','2016-06-13 18:04:41','2016-06-13 18:04:41'),(103,'Iraq','2016-06-13 18:04:41','2016-06-13 18:04:41'),(104,'Irlanda','2016-06-13 18:04:41','2016-06-13 18:04:41'),(105,'Israel','2016-06-13 18:04:41','2016-06-13 18:04:41'),(106,'Italia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(107,'Jamaica','2016-06-13 18:04:41','2016-06-13 18:04:41'),(108,'Japón','2016-06-13 18:04:41','2016-06-13 18:04:41'),(109,'Jordania','2016-06-13 18:04:41','2016-06-13 18:04:41'),(110,'Kazajstán','2016-06-13 18:04:41','2016-06-13 18:04:41'),(111,'Kenia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(112,'Kiribati','2016-06-13 18:04:41','2016-06-13 18:04:41'),(113,'Corea del Norte','2016-06-13 18:04:41','2016-06-13 18:04:41'),(114,'Corea del Sur','2016-06-13 18:04:41','2016-06-13 18:04:41'),(115,'Kosovo','2016-06-13 18:04:41','2016-06-13 18:04:41'),(116,'Europa del Sur','2016-06-13 18:04:41','2016-06-13 18:04:41'),(117,'Kuwait','2016-06-13 18:04:41','2016-06-13 18:04:41'),(118,'Kirguistán','2016-06-13 18:04:41','2016-06-13 18:04:41'),(119,'Laos; oficialmente: República Democrática Popular Lao','2016-06-13 18:04:41','2016-06-13 18:04:41'),(120,'Letonia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(121,'Líbano','2016-06-13 18:04:41','2016-06-13 18:04:41'),(122,'Lesotho','2016-06-13 18:04:41','2016-06-13 18:04:41'),(123,'Liberia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(124,'Libia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(125,'Liechtenstein','2016-06-13 18:04:41','2016-06-13 18:04:41'),(126,'Lituania','2016-06-13 18:04:41','2016-06-13 18:04:41'),(127,'Luxemburgo','2016-06-13 18:04:41','2016-06-13 18:04:41'),(128,'Macao','2016-06-13 18:04:41','2016-06-13 18:04:41'),(129,'Macedonia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(130,'Madagascar','2016-06-13 18:04:41','2016-06-13 18:04:41'),(131,'Malawi','2016-06-13 18:04:41','2016-06-13 18:04:41'),(132,'Malasia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(133,'Maldivas','2016-06-13 18:04:41','2016-06-13 18:04:41'),(134,'Malí','2016-06-13 18:04:41','2016-06-13 18:04:41'),(135,'Malta','2016-06-13 18:04:41','2016-06-13 18:04:41'),(136,'Islas Marshall','2016-06-13 18:04:41','2016-06-13 18:04:41'),(137,'Martinica','2016-06-13 18:04:41','2016-06-13 18:04:41'),(138,'Mauritania','2016-06-13 18:04:41','2016-06-13 18:04:41'),(139,'Mauricio','2016-06-13 18:04:41','2016-06-13 18:04:41'),(140,'Mayotte','2016-06-13 18:04:41','2016-06-13 18:04:41'),(141,'México','2016-06-13 18:04:41','2016-06-13 18:04:41'),(142,'Micronesia, Estados Federados de','2016-06-13 18:04:41','2016-06-13 18:04:41'),(143,'Moldavia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(144,'Mónaco','2016-06-13 18:04:41','2016-06-13 18:04:41'),(145,'Mongolia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(146,'Montenegro','2016-06-13 18:04:41','2016-06-13 18:04:41'),(147,'Montserrat','2016-06-13 18:04:41','2016-06-13 18:04:41'),(148,'Marruecos','2016-06-13 18:04:41','2016-06-13 18:04:41'),(149,'Mozambique','2016-06-13 18:04:41','2016-06-13 18:04:41'),(150,'Myanmar, Birmania','2016-06-13 18:04:41','2016-06-13 18:04:41'),(151,'English English Name - Nombre Inglés','2016-06-13 18:04:41','2016-06-13 18:04:41'),(152,'Namibia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(153,'Nauru','2016-06-13 18:04:41','2016-06-13 18:04:41'),(154,'Nepal','2016-06-13 18:04:41','2016-06-13 18:04:41'),(155,'Países Bajos, Holanda','2016-06-13 18:04:41','2016-06-13 18:04:41'),(156,'Antillas Holandesas','2016-06-13 18:04:41','2016-06-13 18:04:41'),(157,'Nueva Caledonia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(158,'Nueva Zelanda','2016-06-13 18:04:41','2016-06-13 18:04:41'),(159,'Nicaragua','2016-06-13 18:04:41','2016-06-13 18:04:41'),(160,'Niger','2016-06-13 18:04:41','2016-06-13 18:04:41'),(161,'Nigeria','2016-06-13 18:04:41','2016-06-13 18:04:41'),(162,'Niue','2016-06-13 18:04:41','2016-06-13 18:04:41'),(163,'Marianas del Norte','2016-06-13 18:04:41','2016-06-13 18:04:41'),(164,'Noruega','2016-06-13 18:04:41','2016-06-13 18:04:41'),(165,'Omán','2016-06-13 18:04:41','2016-06-13 18:04:41'),(166,'Pakistán','2016-06-13 18:04:41','2016-06-13 18:04:41'),(167,'Palau','2016-06-13 18:04:41','2016-06-13 18:04:41'),(168,'Territorios Palestinos','2016-06-13 18:04:41','2016-06-13 18:04:41'),(169,'Panamá','2016-06-13 18:04:41','2016-06-13 18:04:41'),(170,'Papúa-Nueva Guinea','2016-06-13 18:04:41','2016-06-13 18:04:41'),(171,'Paraguay','2016-06-13 18:04:41','2016-06-13 18:04:41'),(172,'Perú','2016-06-13 18:04:41','2016-06-13 18:04:41'),(173,'Filipinas','2016-06-13 18:04:41','2016-06-13 18:04:41'),(174,'Isla Pitcairn','2016-06-13 18:04:41','2016-06-13 18:04:41'),(175,'Polonia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(176,'Portugal','2016-06-13 18:04:41','2016-06-13 18:04:41'),(177,'Puerto Rico','2016-06-13 18:04:41','2016-06-13 18:04:41'),(178,'Qatar','2016-06-13 18:04:41','2016-06-13 18:04:41'),(179,'Reunión','2016-06-13 18:04:41','2016-06-13 18:04:41'),(180,'Rumanía','2016-06-13 18:04:41','2016-06-13 18:04:41'),(181,'Federación Rusa','2016-06-13 18:04:41','2016-06-13 18:04:41'),(182,'Ruanda','2016-06-13 18:04:41','2016-06-13 18:04:41'),(183,'San Cristobal y Nevis','2016-06-13 18:04:41','2016-06-13 18:04:41'),(184,'Santa Lucía','2016-06-13 18:04:41','2016-06-13 18:04:41'),(185,'San Vincente y Granadinas','2016-06-13 18:04:41','2016-06-13 18:04:41'),(186,'Samoa','2016-06-13 18:04:41','2016-06-13 18:04:41'),(187,'San Marino','2016-06-13 18:04:41','2016-06-13 18:04:41'),(188,'Santo Tomé y Príncipe','2016-06-13 18:04:41','2016-06-13 18:04:41'),(189,'Arabia Saudita','2016-06-13 18:04:41','2016-06-13 18:04:41'),(190,'Senegal','2016-06-13 18:04:41','2016-06-13 18:04:41'),(191,'Serbia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(192,'Seychelles','2016-06-13 18:04:41','2016-06-13 18:04:41'),(193,'Sierra Leona','2016-06-13 18:04:41','2016-06-13 18:04:41'),(194,'Singapur','2016-06-13 18:04:41','2016-06-13 18:04:41'),(195,'Eslovaquia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(196,'Eslovenia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(197,'Islas Salomón','2016-06-13 18:04:41','2016-06-13 18:04:41'),(198,'Somalia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(199,'Sudáfrica','2016-06-13 18:04:41','2016-06-13 18:04:41'),(200,'Sudán del Sur','2016-06-13 18:04:41','2016-06-13 18:04:41'),(201,'España','2016-06-13 18:04:41','2016-06-13 18:04:41'),(202,'Sri Lanka','2016-06-13 18:04:41','2016-06-13 18:04:41'),(203,'Sudán','2016-06-13 18:04:41','2016-06-13 18:04:41'),(204,'Surinam','2016-06-13 18:04:41','2016-06-13 18:04:41'),(205,'Swazilandia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(206,'Suecia','2016-06-13 18:04:41','2016-06-13 18:04:41'),(207,'Suiza','2016-06-13 18:04:41','2016-06-13 18:04:41'),(208,'Siria','2016-06-13 18:04:41','2016-06-13 18:04:41');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `field`
--

LOCK TABLES `field` WRITE;
/*!40000 ALTER TABLE `field` DISABLE KEYS */;
INSERT INTO `field` VALUES (1,2,'ESA1Q','¿El Comercial realiza un acercamiento acorde al modelo? ',NULL,NULL,'2016-06-14 13:49:54','2016-06-14 13:49:54'),(2,2,'ESA2Q','¿El Comercial se habilita para hacer preguntas, mencionando su rol de Asesor? ',NULL,NULL,'2016-06-14 13:49:55','2016-06-14 13:49:55'),(3,3,'ESID1Q','¿Indaga a través de Preguntas de Información Básica las Oportunidades Manifiestas del cliente? ',NULL,NULL,'2016-06-14 13:49:55','2016-06-14 13:49:55'),(4,3,'ESID2Q','¿Las preguntas que formula son orientadas a responder algún objetivo(vs preguntas aleatorias)?',NULL,NULL,'2016-06-14 13:49:56','2016-06-14 13:49:56'),(5,3,'ESID3Q','¿La información relevada es pertinente para construir una hipótesis?',NULL,NULL,'2016-06-14 13:49:57','2016-06-14 13:49:57'),(6,3,'ESID4Q','¿Confirma a través de Preguntas de Confirmación  las Oportunidades Manifiestas del cliente? ',NULL,NULL,'2016-06-14 13:49:58','2016-06-14 13:49:58'),(7,3,'ESID5Q','¿Para trabajar Oportunidades Latentes construye una Hipótesis de Oportunidad? ',NULL,NULL,'2016-06-14 13:49:58','2016-06-14 13:49:58'),(8,3,'ESID6Q','¿La Hipótesis de Oportunidad es construida a partir de la información recabada por el oficial?',NULL,NULL,'2016-06-14 13:49:59','2016-06-14 13:49:59'),(9,3,'ESID7Q','¿Confirma Hiótesis de Oportunidad  mediante Pregunta de Contexto? ',NULL,NULL,'2016-06-14 13:49:59','2016-06-14 13:49:59'),(10,3,'ESID8Q','¿Las PDC formuladas permiten confirmar o refutar las Hipótesis desarrolladas?',NULL,NULL,'2016-06-14 13:50:00','2016-06-14 13:50:00'),(11,3,'ESID9Q','¿Utilizan POP para influenciar el pensamiento del cliente acerca de sus áreas de Preocupación o Beneficio? ',NULL,NULL,'2016-06-14 13:50:00','2016-06-14 13:50:00'),(12,3,'ESID10Q','¿Adopta la orientación de la pregunta de oportunidad que mejor se adecúa al cliente?',NULL,NULL,'2016-06-14 13:50:00','2016-06-14 13:50:00'),(13,3,'ESID11Q','¿Logra desarrollar la oportunidad latente en el cliente?',NULL,NULL,'2016-06-14 13:50:01','2016-06-14 13:50:01'),(14,3,'ESID12Q','¿Las preguntas formuladas evidenciaron una escucha activa (vs preguntas automatizadas por el oficial?)',NULL,NULL,'2016-06-14 13:50:01','2016-06-14 13:50:01'),(15,4,'ESPP1Q','¿Presenta la Propuesta transformando las características a beneficios personalizados?',NULL,NULL,'2016-06-14 13:50:01','2016-06-14 13:50:01'),(16,4,'ESPP2Q','¿Los beneficios expuestos se adecuan a los intereses del cliente?',NULL,NULL,'2016-06-14 13:50:01','2016-06-14 13:50:01'),(17,4,'ESPP3Q','¿Utiliza correctamente el conector para vincular características con beneficios personalizados?',NULL,NULL,'2016-06-14 13:50:01','2016-06-14 13:50:01'),(18,4,'ESPP4Q','¿Se evidencia escucha activa durante la entrevista?',NULL,NULL,'2016-06-14 13:50:02','2016-06-14 13:50:02'),(19,5,'ESCV1Q','¿Busca cerrar la venta resumiendo especificamente los aspectos tratados durante la presentación de la propuesta y que fueron de interés para el cliente?',NULL,NULL,'2016-06-14 13:50:02','2016-06-14 13:50:02'),(20,5,'ESCV2Q','¿Establece un plan de acción al cerrar la venta?',NULL,NULL,'2016-06-14 13:50:02','2016-06-14 13:50:02'),(21,5,'ESCV3Q','Ante Actitudes Adversas del cliente, ¿adopta una actitud proactiva para superarla? ',NULL,NULL,'2016-06-14 13:50:02','2016-06-14 13:50:02'),(22,5,'ESCV4Q','Al identificar Indiferencia, ¿profundiza las POP para hacerle ver al Cliente la Oportunidad aún no percibida como relevante?',NULL,NULL,'2016-06-14 13:50:03','2016-06-14 13:50:03'),(23,5,'ESCV5Q','Al identificar Escepticismo, ¿ofrecen pruebas que anulen dicha actitud? ',NULL,NULL,'2016-06-14 13:50:05','2016-06-14 13:50:05'),(24,5,'ESCV6Q','Al identificar Objeciones, ¿realiza una pregunta buscando demostrar el poco peso relativo que tiene la Objeción? ',NULL,NULL,'2016-06-14 13:50:05','2016-06-14 13:50:05'),(25,5,'ESCV7Q','¿Reconoce la actitud adversa presentada por el cliente y aplica correctamente la manera de revertirla?',NULL,NULL,'2016-06-14 13:50:06','2016-06-14 13:50:06'),(26,5,'ESCV8Q','Una vez revertida la Actitud Adversa identificada ¿Intenta nuevamente el cierre? ',NULL,NULL,'2016-06-14 13:50:06','2016-06-14 13:50:06'),(27,5,'ESCV9Q','¿En caso de no poder obtener el cierre en el momento propone un plan de acción claro y conciso?',NULL,NULL,'2016-06-14 13:50:07','2016-06-14 13:50:07'),(28,5,'ESCV10Q','¿ Se vale de cierres pariciales?',NULL,NULL,'2016-06-14 13:50:07','2016-06-14 13:50:07'),(29,6,'ESR1Q','¿Busca generar relacionamiento con el cliente al cierre de la entrevista (vs. sólo dar información y despedir)? ',NULL,NULL,'2016-06-14 13:50:08','2016-06-14 13:50:08'),(30,6,'ESR2Q','¿Presenta una actitud positiva en la solicitud de referidos, siguiendo las pautas de la metodología? ',NULL,NULL,'2016-06-14 13:50:09','2016-06-14 13:50:09'),(31,6,'ESR3Q','¿Califica el nuevo contacto? ',NULL,NULL,'2016-06-14 13:50:09','2016-06-14 13:50:09'),(32,6,'ESR4Q','¿Se despide de manera cordial mostrándose solicito para futuras oportunidades?',NULL,NULL,'2016-06-14 13:50:10','2016-06-14 13:50:10');
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
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `field_predefined_answer`
--

LOCK TABLES `field_predefined_answer` WRITE;
/*!40000 ALTER TABLE `field_predefined_answer` DISABLE KEYS */;
INSERT INTO `field_predefined_answer` VALUES (1,1,'ESA1A1',1,'Recibe al cliente de manera cortez y lo saluda identificándose dándole la bienvenida  Estableciendo empatía.','2016-06-14 13:49:54','2016-06-14 13:49:54'),(2,1,'ESA1A2',1,'Recibe al cliente de pie, lo saluda identificándose y dándole una cálida la bienvenida.  Mostrándose solicito a resolver sus consultas generando así un clima adecuado para la entrevista.','2016-06-14 13:49:54','2016-06-14 13:49:54'),(3,1,'ESA1A3',2,'No establece contacto con el cliente, omitiendo presentarse.','2016-06-14 13:49:54','2016-06-14 13:49:54'),(4,1,'ESA1A4',2,'Se muestra indiferente al inicio de la entrevista; no estabableciendo un adecuado contacto con el cliente, dificultando el establecer empatía con éste.','2016-06-14 13:49:54','2016-06-14 13:49:54'),(5,2,'ESA2A1',1,'Se habilita a preguntar tomando así el control de la entrevista.','2016-06-14 13:49:55','2016-06-14 13:49:55'),(6,2,'ESA2A2',2,'Comienza a indagar sin habilitarse para preguntar.  De este modo pierde posicionamiento y control de la entrevista.','2016-06-14 13:49:55','2016-06-14 13:49:55'),(7,2,'ESA2A3',2,'Comienza a indagar sin anticipar sus próximas acciones.  De este modo pierde posicionamiento y control de la entrevista.','2016-06-14 13:49:55','2016-06-14 13:49:55'),(8,3,'ESID1A1',1,'Realiza preguntas para profundizar en la oportunidad manifiesta del cliente, dándole claridad a la misma.','2016-06-14 13:49:55','2016-06-14 13:49:55'),(9,3,'ESID1A2',1,'Realiza preguntas pero no están ligadas a la oportunidad, son erráticas.  Perdiendo foco y efectividad.','2016-06-14 13:49:56','2016-06-14 13:49:56'),(10,3,'ESID1A3',2,'Desarrollo preguntas con foco en producto en lugar de identificar las oportunidades que movilizan al cliente a acercarse.','2016-06-14 13:49:56','2016-06-14 13:49:56'),(11,3,'ESID1A4',2,'Confunde Pregunta de Información Básica (la cual impacto sobre la oportunidad manifiesta)con Pregunta de Contexto (la que trabaja en el desarrollo de la oportunidad latente).','2016-06-14 13:49:56','2016-06-14 13:49:56'),(12,3,'ESID1A5',2,'No realiza preguntas a la inquietud manifiesta del cliente.  Anticipa producto/solución que considera más oportuno según su criterio, sin considerar las necesidades del cliente.','2016-06-14 13:49:56','2016-06-14 13:49:56'),(13,4,'ESID2A2',2,'Las preguntas formuladas dificultaban el fluir de la conversación por encontrarse demasiado estructuradas .','2016-06-14 13:49:57','2016-06-14 13:49:57'),(14,4,'ESID2A3',2,'El timing de las preguntas resultaba muy estructurado dificultando que surgiera una conversación en la cual el cliente se sientiera a gusto de responder.','2016-06-14 13:49:57','2016-06-14 13:49:57'),(15,5,'ESID3A2',2,'Se recabó suficiente información del cliente en temáticas no relevantes  dificultando elaborar una Hipótesis de Oportunidad acorde al cliente.','2016-06-14 13:49:57','2016-06-14 13:49:57'),(16,5,'ESID3A3',2,'La información obtenida fue escasa y no permitió  la construcción de una Hipótesis de Oportunidad para ese cliente.','2016-06-14 13:49:57','2016-06-14 13:49:57'),(17,6,'ESID4A1',1,'Verifica haber comprendido la oportunidad manifiesta del cliente, brindando claridad tanto al vendedor como al cliente sobre la misma.','2016-06-14 13:49:58','2016-06-14 13:49:58'),(18,6,'ESID4A2',2,'No verifica haber comprendido correctamente la oportunidad manifiesta del cliente.  Pudiendo generar un nivel de confusión en el díalogo.','2016-06-14 13:49:58','2016-06-14 13:49:58'),(19,6,'ESID4A3',2,'Confunde Pregunta de Confirmación (de la oporutnidad del cliente) con cierre de venta.','2016-06-14 13:49:58','2016-06-14 13:49:58'),(20,7,'ESID5A1',1,'Desarrolla Hipótesis de Opotrunidad conscientemente, vinculada a la oportunidad manifiesta del cliente.','2016-06-14 13:49:59','2016-06-14 13:49:59'),(21,7,'ESID5A2',1,'Frente al reclamo del cliente, puede desarrollar Hipótesis de Oportunidad abriendo la posibilidad de trabajar oportunidades latentes en el cliente.','2016-06-14 13:49:59','2016-06-14 13:49:59'),(22,7,'ESID5A3',1,'Logra construir Hipótesis de Oportunidad sin ser ésta consistente con la oportunidad manifiesta del cliente.','2016-06-14 13:49:59','2016-06-14 13:49:59'),(23,7,'ESID5A4',2,'No construye conscientemente una Hipótesis de Oportunidad, perdiendo de desarrollar oportunidades latentes en el cliente.','2016-06-14 13:49:59','2016-06-14 13:49:59'),(24,7,'ESID5A5',2,'Construye una Hipótesis de Oportunidad con foco en producto, perdiendo la posibilidad de identificar oportunidades latentes en el cliente.','2016-06-14 13:49:59','2016-06-14 13:49:59'),(25,8,'ESID6A2',2,'La Hipotesis de Oportunidad no se encontraba vinculada con la situación del cliente, resultando necesario formular una nueva.','2016-06-14 13:49:59','2016-06-14 13:49:59'),(26,9,'ESID7A1',1,'Confirma Hipótesis de Oportunidad mediante Preguntas de Contexto acordes a la Hipótesis planteda.','2016-06-14 13:49:59','2016-06-14 13:49:59'),(27,9,'ESID7A2',1,'Al confirmar la Hipótesis de Oportunidad desarrolla Preguntas de Contexto sin un foco aparente, sin lograr su objetivo.','2016-06-14 13:49:59','2016-06-14 13:49:59'),(28,9,'ESID7A3',2,'Desarrolla Preguntas de Contexto con foco en producto/solución y no con foco en la oportunidad del cliente.','2016-06-14 13:50:00','2016-06-14 13:50:00'),(29,9,'ESID7A4',2,'No desarrolla Preguntas de Contexto que validen su Hipótesis de Oportunidad, anticipando el producto/solución.','2016-06-14 13:50:00','2016-06-14 13:50:00'),(30,10,'ESID8A2',2,'Las PDC formuladas no estuvieron bien estructuradas y no permitieron confirmar la Hipótesis por lo que se tuvo que repreguntar','2016-06-14 13:50:00','2016-06-14 13:50:00'),(31,11,'ESID9A1',1,'Desarrolla una Pregunta de Oportunidad Potencial abierta con foco en preocupación o beneficio sin anticipar respuesta y o producto, buscando la reflexión del cliente frente a una situación hipotética.','2016-06-14 13:50:00','2016-06-14 13:50:00'),(32,11,'ESID9A3',2,'Desarrolla una pregunta abierta con foco en preocupación o beneficio buscando la reflexión del cliente frente a una situación hipotética,  pero en la pregunta incluye el producto y o respuesta.','2016-06-14 13:50:00','2016-06-14 13:50:00'),(33,11,'ESID9A4',2,'Genera pregunta de Oportunidad Potencial sobre la necesidad manifiesta del cliente en lugar de desarrollar una oportunidad Potencial.','2016-06-14 13:50:00','2016-06-14 13:50:00'),(34,11,'ESID9A5',2,'Si bien realiza POP, la pregunta tiene baja orientación hacia la oportunidad detectada del ciente perdiendo efectividad.','2016-06-14 13:50:00','2016-06-14 13:50:00'),(35,12,'ESID10A1',1,'Comprende el impacto que la pregunta con enfoque en preocupación podría despertar para este cliente y formula POP considerando este enfoque.','2016-06-14 13:50:00','2016-06-14 13:50:00'),(36,12,'ESID10A2',1,'Comprende el impacto que la pregunta con enfoque en deseo podría despertar para este cliente y formula POP considerando este enfoque.','2016-06-14 13:50:00','2016-06-14 13:50:00'),(37,12,'ESID10A3',2,'Si bien realiza POP no logra determinar el enfoque más adecuado del  cliente, perdiendo efectividad sobre la reflexión del mismo.','2016-06-14 13:50:01','2016-06-14 13:50:01'),(38,13,'ESID11A2',2,'No logra captar el interés del cliente, por lo que no se avanza en otra oportundidad.','2016-06-14 13:50:01','2016-06-14 13:50:01'),(39,14,'ESID12A2',2,'Se realizaron preguntas estandarizadas sin tener en cuenta la información suministrada por el cliente en la conversación, relizando preguntas de temas ya abordados por el cliente.','2016-06-14 13:50:01','2016-06-14 13:50:01'),(40,15,'ESPP1A2',2,'No logra distiguir entre beneficios (solución) y características del producto.  Esto le dificulta al Cliente  distinguir el valor que significa para él ese producto desde la solución que le ofrece.','2016-06-14 13:50:01','2016-06-14 13:50:01'),(41,16,'ESPP2A2',2,'Presenta una propuesta, que si bien habla de beneficios, no presenta contenido de valor para el ciente.  No resultando atractivo para éste, perdiendo así impacto en la oportunidad de venta.','2016-06-14 13:50:01','2016-06-14 13:50:01'),(42,16,'ESPP2A3',2,'Presenta una propuesta comercial con foco en las características del producto.  No resultando atractivo para el cliente, perdiendo así impacto en la oportunidad de venta.','2016-06-14 13:50:01','2016-06-14 13:50:01'),(43,17,'ESPP3A2',2,'No aplica correctamente la estructura que integra la caracteristica del producto con el beneficio personalizado, restando énfasis a la solución.','2016-06-14 13:50:01','2016-06-14 13:50:01'),(44,19,'ESCV1A2',2,'No sintetizar los puntos acordados con el cliente posterga la decisión del mismo pudiendo perder la oportunidad de efectuar el cierre de la venta','2016-06-14 13:50:02','2016-06-14 13:50:02'),(45,20,'ESCV2Q4',2,'Posterga la decisión perdiendo la oportunidad de efectuar el cierre de la venta, sin generar un plan de acción librando el cierre en manos del cliente.','2016-06-14 13:50:02','2016-06-14 13:50:02'),(46,21,'ESCV3A2',2,'No reconoce que el Cliente ha presentado una Actitud Adversa; por lo cual no puede rebatirla y avanzar con la venta.','2016-06-14 13:50:02','2016-06-14 13:50:02'),(47,22,'ESCV4A2',2,'Frente a la indiferencia,  provocada por anticipar producto, logró mediante argumentos resolverla.','2016-06-14 13:50:04','2016-06-14 13:50:04'),(48,22,'ESCV4A3',2,'Frente a la indiferencia logró mediante argumentos resolverla.','2016-06-14 13:50:04','2016-06-14 13:50:04'),(49,22,'ESCV4A4',2,'Frente a la indiferencia, provocada por anticipar producto, no realiza ninguna acción tendiente a revertirla.','2016-06-14 13:50:04','2016-06-14 13:50:04'),(50,22,'ESCV4A5',2,'Frente a la indiferencia no realiza ninguna acción tendiente a revertirla.','2016-06-14 13:50:04','2016-06-14 13:50:04'),(51,23,'ESCV5A2',2,'Al identificar Escepticismo no ofrece al cliente pruebas fehacientes (fisicas, electrónicas, basadas en la relación de confianza) en un intento de minimizar la situación adversa.','2016-06-14 13:50:05','2016-06-14 13:50:05'),(52,24,'ESCV6A3',2,'Al identificar Objeciones (una desventaja real del producto) busca destrabarla desde el foco en el producto, desarrollando el costo de la solución.  Quitando importancia al impacto de la oportunidad.','2016-06-14 13:50:05','2016-06-14 13:50:05'),(53,24,'ESCV6A4',2,'Al identificar Objeciones (una deventaja del producto) no toma ninguna actitud para resolverla o superarla para avanzar hacia el cierre.','2016-06-14 13:50:05','2016-06-14 13:50:05'),(54,25,'ESCV7A2',2,'Identificar la  Actitud Adversa presentada por el cliente y aplicar la estrategia adecuada para revertirla le permitiría aproximarse al cierre.','2016-06-14 13:50:06','2016-06-14 13:50:06'),(55,26,'ESCV8A1',2,'Realiza varios intentos en la busqueda de concretar el cierre sin obterlo.','2016-06-14 13:50:06','2016-06-14 13:50:06'),(56,26,'ESCV8A4',2,'Una vez revertida la actitud adversa no actúa de manera proactiva para avanzar en el cierre.','2016-06-14 13:50:06','2016-06-14 13:50:06'),(57,27,'ESCV9A2',2,'No impulsa un plan de acción tendiente a obtener el cierre en un próximo contacto.','2016-06-14 13:50:07','2016-06-14 13:50:07'),(58,27,'ESCV9A3',2,'Al no poder concretar el cierre de la venta en el momento, propone un plan de acción que no queda claro para el cliente.','2016-06-14 13:50:07','2016-06-14 13:50:07'),(59,28,'ESCV10A2',2,'A lo largo del encuentro utiliza cierres parciales en los que establece compromisos con el cliente, pero no los retoma al moemento del cierre.','2016-06-14 13:50:08','2016-06-14 13:50:08'),(60,28,'ESCV10A3',2,'No se vale de cierres parciales a lo largo de la entrevista, lo que impacta negativamente al momento de consolidar el cierre ya que surgen  consultas o malas interpretaciones que podrían hacer peligar la concreción de la venta.','2016-06-14 13:50:08','2016-06-14 13:50:08'),(61,28,'ESCV10A4',2,'No se vale de cierres parciales a lo largo de la entrevista, lo que impacta negativamente al momento de consolidar el cierre por cuanto que aparecen Actitudes Adversas no revertirla de manera temprana.','2016-06-14 13:50:08','2016-06-14 13:50:08'),(62,29,'ESR1A2',2,'Despide al cliente con cortesía.','2016-06-14 13:50:08','2016-06-14 13:50:08'),(63,29,'ESR1A3',2,'Despide al cliente con cortesía y entrega una tarjeta personal al cliente.','2016-06-14 13:50:09','2016-06-14 13:50:09'),(64,30,'ESR2A2',2,'Presenta una actitud positiva en la solicitud de referidos, entrega al cliente su tarjeta personal en un intento por llegar a nuevos clientes.','2016-06-14 13:50:09','2016-06-14 13:50:09'),(65,30,'ESR2A3',2,'Presenta una actitud positiva en la solicitud de referidos, solicita datos que lo ayuden a cubrir sus objetivos.','2016-06-14 13:50:09','2016-06-14 13:50:09'),(66,30,'ESR2A4',2,'No solicita referidos.','2016-06-14 13:50:09','2016-06-14 13:50:09'),(67,31,'ESR3A3',2,'No desarrolla preguntas para calificar al nuevo contacto, perdiendo información valiosa al momento de establecer el contacto inicial con este.','2016-06-14 13:50:10','2016-06-14 13:50:10'),(68,32,'ESR4A3',2,'Se despide sin utilizar ninguna frase de cortesía que promueva futuros contactos.','2016-06-14 13:50:10','2016-06-14 13:50:10'),(69,32,'ESMT1A2',2,'El tiempo se diluyó ante la falta de conocimiento del oficial de los procesos internos.','2016-06-14 13:50:10','2016-06-14 13:50:10'),(70,32,'ESMT1A3',2,'El tiempo se extendió ante interrupciones de terceros.','2016-06-14 13:50:10','2016-06-14 13:50:10'),(71,32,'ESMT1A4',2,'Se empleó más tiempo del necesario por desarrollarse una presentación con foco en producto','2016-06-14 13:50:10','2016-06-14 13:50:10'),(72,32,'ESMT1A5',2,'Se empleó más tiempo del necesario por desarrollarse preguntas sin un claro objetivo','2016-06-14 13:50:10','2016-06-14 13:50:10'),(73,32,'ESMT1A6',2,'otro:','2016-06-14 13:50:10','2016-06-14 13:50:10'),(74,32,'ESMT2A3',2,'Durante los tiempos en los que no se pudo procesar o consultar informació, no se mantuvo conversación alguna con el cliente.','2016-06-14 13:50:10','2016-06-14 13:50:10');
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
INSERT INTO `fieldset` VALUES (1,'Planificación Responsable de Sucursal','',100,'2016-06-13 19:59:46','2016-06-13 22:49:52'),(2,'Acercamiento','',5,'2016-06-13 20:04:36','2016-06-13 20:04:36'),(3,'Indagar y Desarrollar','',40,'2016-06-13 20:05:36','2016-06-13 20:05:36'),(4,'Presentar Propuesta','',15,'2016-06-13 20:05:58','2016-06-13 20:05:58'),(5,'Cerrar la Venta','',15,'2016-06-13 20:07:44','2016-06-13 20:07:44'),(6,'Relacionamiento','',10,'2016-06-13 20:08:10','2016-06-13 20:08:10'),(7,'Contacto Telefónico','',15,'2016-06-13 20:47:57','2016-06-13 20:47:57'),(8,'Seguimiento','',20,'2016-06-13 20:48:56','2016-06-13 20:48:56'),(9,'Apertura','',15,'2016-06-13 20:49:09','2016-06-13 20:49:09'),(10,'Detección de Fortalezas y Oportunidades de Mejora','',40,'2016-06-13 20:49:23','2016-06-13 20:49:23'),(11,'Conducta Prioritaria y Plan Táctico','',15,'2016-06-13 20:49:41','2016-06-13 20:49:41');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `file`
--

LOCK TABLES `file` WRITE;
/*!40000 ALTER TABLE `file` DISABLE KEYS */;
INSERT INTO `file` VALUES (1,11,'reporte__consultor20160614-1327.pdf','210bbfae0a27713f4134650df39b32cc','/home/victor/devel/sellutions/app/common/files/201606','pdf',1,'evaluation','2016-06-14 13:27:13','2016-06-14 13:27:13');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (1,'Proyecto 1',1,1,2,11,1,'2016-06-13 22:39:21','2016-06-13 22:39:44');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_form`
--

LOCK TABLES `project_form` WRITE;
/*!40000 ALTER TABLE `project_form` DISABLE KEYS */;
INSERT INTO `project_form` VALUES (1,NULL,1,0),(2,NULL,2,0),(3,NULL,3,0),(4,NULL,4,0),(5,NULL,5,0),(6,1,1,20),(7,1,2,20),(8,1,3,20),(9,1,4,20),(10,1,5,20);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_round_observation`
--

LOCK TABLES `project_round_observation` WRITE;
/*!40000 ALTER TABLE `project_round_observation` DISABLE KEYS */;
INSERT INTO `project_round_observation` VALUES (1,1,1,62,'asdasd','asdas','asdasd','asdasd','asdasd','2016-06-14 13:26:37','2016-06-14 13:26:43');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_subsidiary`
--

LOCK TABLES `project_subsidiary` WRITE;
/*!40000 ALTER TABLE `project_subsidiary` DISABLE KEYS */;
INSERT INTO `project_subsidiary` VALUES (1,NULL,1),(2,NULL,2),(3,NULL,3),(4,1,1),(5,1,2),(6,1,3);
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
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `province`
--

LOCK TABLES `province` WRITE;
/*!40000 ALTER TABLE `province` DISABLE KEYS */;
INSERT INTO `province` VALUES (1,'Arica',41),(2,'Parinacota',41),(3,'Iquique',41),(4,'El Tamarugal',41),(5,'Antofagasta',41),(6,'El Loa',41),(7,'Tocopilla',41),(8,'Chañaral',41),(9,'Copiapó',41),(10,'Huasco',41),(11,'Choapa',41),(12,'Elqui',41),(13,'Limarí',41),(14,'Isla de Pascua',41),(15,'Los Andes',41),(16,'Petorca',41),(17,'Quillota',41),(18,'San Antonio',41),(19,'San Felipe de Aconcagua',41),(20,'Valparaiso',41),(21,'Chacabuco',41),(22,'Cordillera',41),(23,'Maipo',41),(24,'Melipilla',41),(25,'Santiago',41),(26,'Talagante',41),(27,'Cachapoal',41),(28,'Cardenal Caro',41),(29,'Colchagua',41),(30,'Cauquenes',41),(31,'Curicó',41),(32,'Linares',41),(33,'Talca',41),(34,'Arauco',41),(35,'Bio Bío',41),(36,'Concepción',41),(37,'Ñuble',41),(38,'Cautín',41),(39,'Malleco',41),(40,'Valdivia',41),(41,'Ranco',41),(42,'Chiloé',41),(43,'Llanquihue',41),(44,'Osorno',41),(45,'Palena',41),(46,'Aisén',41),(47,'Capitán Prat',41),(48,'Coihaique',41),(49,'General Carrera',41),(50,'Antártica Chilena',41),(51,'Magallanes',41),(52,'Tierra del Fuego',41),(53,'Última Esperanza',41),(54,'Buenos Aires',10),(55,'Catamarca',10),(56,'Chaco',10),(57,'Chubut',10),(58,'Córdoba',10),(59,'Corrientes',10),(60,'Entre Ríos',10),(61,'Formosa',10),(62,'Jujuy',10),(63,'La Pampa',10),(64,'La Rioja',10),(65,'Mendoza',10),(66,'Misiones',10),(67,'Neuquén',10),(68,'Río Negro',10),(69,'Salta',10),(70,'San Juan',10),(71,'San Luis',10),(72,'Santa Cruz',10),(73,'Santa Fe',10),(74,'Santiago del Estero',10),(75,'Tierra del Fuego, Antártida e Islas del Atlántico Sur',10),(76,'Tucumán',10);
/*!40000 ALTER TABLE `province` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `round`
--

LOCK TABLES `round` WRITE;
/*!40000 ALTER TABLE `round` DISABLE KEYS */;
INSERT INTO `round` VALUES (54,2,'Ronda',1,NULL,'2016-05-02 00:00:00','2016-05-06 00:00:00','2016-05-31 15:04:45','2016-05-31 15:04:45'),(55,2,'Ronda',2,1,'2016-05-09 00:00:00','2016-05-13 00:00:00','2016-05-31 15:04:45','2016-05-31 15:04:45'),(56,2,'Ronda',1,NULL,'2016-05-02 00:00:00','2016-05-06 00:00:00','2016-06-03 14:50:00','2016-06-03 14:50:00'),(57,2,'Ronda',2,1,'2016-05-09 00:00:00','2016-05-13 00:00:00','2016-06-03 14:50:00','2016-06-03 14:50:00'),(58,5,'Ronda 1',1,1,'2016-05-03 00:00:00','2016-05-03 00:00:00','2016-06-03 15:07:19','2016-06-03 16:05:34'),(59,5,'Ronda 2',2,NULL,'2016-05-03 00:00:00','2016-05-03 00:00:00','2016-06-03 15:17:57','2016-06-03 16:05:34'),(60,6,'Ronda',1,1,'2016-05-07 00:00:00','2016-05-07 00:00:00','2016-06-07 17:27:11','2016-06-07 17:27:11'),(61,7,'Ronda',1,1,'2016-05-08 00:00:00','2016-05-08 00:00:00','2016-06-08 21:21:53','2016-06-10 19:22:54'),(62,1,'Ronda',1,1,'2016-05-13 00:00:00','2016-05-13 00:00:00','2016-06-13 22:39:44','2016-06-13 22:39:44');
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
  `province_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subsidiary`
--

LOCK TABLES `subsidiary` WRITE;
/*!40000 ALTER TABLE `subsidiary` DISABLE KEYS */;
INSERT INTO `subsidiary` VALUES (1,'SUC 07 - CONGRESO','Av. Belgrano 1783 (1093)- Buenos Aires','ALVAREZ Mariela',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(2,'SUC 08 - BELGRANO','La Pampa 2103 (1428) - Buenos Aires','BERTONERI, Javier',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(3,'SUC 20 - MARTINEZ','Santa Fe 1830  (1640)','BUCCO, Maximiliano',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(4,'SUC 25 - BOTANICO','Cerviño 3799 (1425) - Buenos Aires','FERRAZIN, Rocio',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(5,'SUC 30 - VILLA DEVOTO','F. Beiró 3180 (1419) - Buenos Aires','DAMICO, Enrique Ariel',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(6,'SUC 54 - CASTELAR','Gdor. Arias 2455/57 (1712)','OURO, Martin',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(7,'SUC 67 - SAN JOSE','Godoy Cruz 1499 (5519) San Jose -Pcia de Mendoza','PUGA, José',NULL,NULL,1,65,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(8,'SUC 74 - TUNUYAN','San Martín 1010 (5560) Tunuyan-Pcia de Mendoza','FOZZATTI, Carlos',NULL,NULL,1,65,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(9,'SUC 01 - BARRIO NORTE','Av. Callao 1021  (1024)- Buenos Aires','MUICEY, Marcos',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(10,'SUC 04 - BOULOGNE','Av. Sáenz 2202 (1609)','NERVI, Marcelo',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(11,'SUC 24 - ADROGUE','Esteban Adrogué 1050 (1846)','CIOPPI, Maria Victoria',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(12,'SUC 44 - SAAVEDRA','Manzanares 4012  (1430) Buenos Aires','RIZZO, Nicolás',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(13,'SUC 77 - LAS HERAS','Av. Dr. Moreno 1545 (5539) Las Heras-Pcia de Mendoza','MENDOZA, Jorge',NULL,NULL,1,65,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(14,'SUC 82 - BUENOS AIRES','San Martín 176  (1004) - Buenos Aires','PLATAS, Roberto',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(15,'SUC 68 - GUTIERREZ','Maza 2181  (5511) Gutierrez-Pcia de Mendoza','BRAMUCCI, Mariano',NULL,NULL,1,65,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(16,'SUC 18 - LANUS','H. Yrigoyen 4275 (1824)','GIGANTI, Andrés',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(17,'SUC 29 - LA LUCILA','Av, Libertador 3879 (1636)','SCANDURA, Maximiliano',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(18,'SUC 32 - PEDRO GOYENA','Pedro Goyena 1291 (1406) - Buenos Aires','FUMIERE, Mariano',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(19,'SUC 33 -  BAJO ALEM','Córdoba 331  (1054)- Buenos Aires','PEREZ, Mariai Laura',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(20,'SUC 53 - LA PLATA','Calle 47 N° 636 (1900)','BARRESI, Hernán',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(21,'SUC 56 - PLAZA GÜEMES','Charcas 3602  (1425)- Buenos Aires','SALVO, Claudio',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(22,'SUC 63 - LA PLATA CATEDRAL','Calle 12 °1111 (1900)','',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(23,'SUC 78 - BOULEVARD BELGRANO','Belgrano 1403 (5500) Capital Mendoza-Pcia de Mendoza','COSTA, Octavio',NULL,NULL,1,65,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(24,'SUC 14 - SAN MARTIN','Calle 54 N° 3587 (1650)','BORDA, Mauro',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(25,'SUC 69 - BALCARCE-MENDOZA','Balcarce 99 y Alvear (5570) Libertador Gral.San Martin. -Pcia de Mendoza','SILVETTI, Gustavo',NULL,NULL,1,65,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(26,'SUC 05 - TRIBUNALES','Montevideo 498 (1019) - Buenos Aires','DIAZ PRIETO, Pablo',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(27,'SUC 10 - RECOLETA','Callao 1991  (1024)- Buenos Aires','RAMIREZ, Oscar',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(28,'SUC 15 - LOMAS DE ZAMORA','Colombres 160 (1832)','LOPEZ, Pablo',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(29,'SUC 23 - VICENTE LOPEZ','Av. Maipú 755  (1638)','',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(30,'SUC 47 - LUJAN','San Martín 401 (6700)','CARNIBELLA, Alberto',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(31,'SUC 95 - PLAZA GODOY CRUZ','Rivadavia 585 (5501) -Godoy Cruz-Pcia.de Mendoza','SANCHEZ, Jorge',NULL,NULL,1,65,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(32,'SUC 61 - LIBERTADOR','Libertador 6597 (1428) - Buenos Aires','PICCONE, Fernando',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(33,'SUC 02 - ALTOS DE PALERMO','Av. Santa Fe 3164 (1425) Buenos Aires','ROMERO,  Paola',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(34,'SUC 12 - Buenos AiresLLITO','J. M. Moreno 230 (1424)- Buenos Aires','DEL PINO, Ximena',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(35,'SUC 65 - SAN MIGUEL DE TUCUMAN','San Martin 829  (4000) - S.M. de Tucumán','DIP, Marcelo',NULL,NULL,1,76,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(36,'SUC 79 - RODEO DE LA CRUZ','Bº de Los Andes 9500 y Nahuel Huapi  (5525)-Rodeo de la Cruz. Guaymallen -Pcia de Mza','PRADAL, Pablo',NULL,NULL,1,65,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(37,'SUC 97 - PALERMO HOLLYWOOD','Avda Juan B Justo 1447','SARASOLA, Andrés',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(38,'SUC 92 - RIO CUARTO III','Constitución 930 (5800) Rio Cuarto- Pcia.de Cordoba','ZALDUMBIDE, Eduardo H',NULL,NULL,1,58,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(39,'SUC 45 - BELGRANO \"R\"','Crámer 1710 (1426)  Buenos Aires','TAPIA, Sebastian',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(40,'SUC 06 - PLAZA FRANCIA','Las Heras 2401  (1425) - Buenos Aires','ETCHEGOYEN, Mariano',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(41,'SUC 21 - BOEDO','Av. Boedo 729 (1218)','AGUIRRE, Javier',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(42,'SUC 73 - TUPUNGATO','Belgrano 601 (5561) Tupungato-Pcia de Mendoza','FRANKENBERGER, Sergio',NULL,NULL,1,65,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(43,'SUC 09 - PLAZA SAN MARTIN','Suipacha 1280  (1011)- Buenos Aires','HOMBRE, Federico',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(44,'SUC 03 - HAEDO','Av. Rivadavia 16060 (1706)','CAGGIANO, Jimena',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(45,'SUC 51- BARRACAS','Montes de Oca 736  (1270) - Buenos Aires','LANNES, Matías',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(46,'SUC 228 - UNIVERSIDAD DEL ACONCAGUA','Rioja 1238 -(5500) Ciudad  Mendoza-Pcia.de Mendoza','BALDILLOU, Cesar',NULL,NULL,1,65,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(47,'SUC 26 - COLEGIALES','Cabildo 1020 (1426) - Buenos Aires','POZZOLO, Francisco',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(48,'SUC 31-  ESCOBAR','25 de Mayo 1469/73 (1625)','Medina, Daniel',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(49,'SUC 50 - FLORES','Rivadavia 6411/19  (1406)- Buenos Aires','ALTWARG, Gabriel',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(50,'SUC 57 - PLAZA VICENTE LOPEZ','Uruguay 1163 (1016) - Buenos Aires','FRANCOVICH, Dario',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(51,'SUC 13 - VILLA ADELINA','Paraná 6459 (1607)','FIRMATI, Mauro',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(52,'SUC 27 - VILLA URQUIZA','Triunvirato 4302  (1431) - Buenos Aires','GOMEZ, Gustavo',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(53,'SUC 48 - MONSERRAT','Moreno 877  (1091) - Buenos Aires','Chiavarino Marina',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(54,'SUC 75 - SHOPPING','Av. Acceso Este 3280 Lat.Norte y Rosario (5521)- Villa Nueva . Guaymallen-Pcia de Mza','SCOKIN, Cecilia Etel',NULL,NULL,1,65,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(55,'SUC 52 - IMPRENTA','L. M. Campos 1201 (1426) - Buenos Aires','NOVOA, Javier',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(56,'SUC 36 - MICROCENTRO','Reconquista 330  ( 1003)- Buenos Aires','ROSALES, Carlos Daniel',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(57,'SUC 17 - PILAR','Tucumán 499 (1629)','GALERA, Marcelo',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(58,'SUC 22 - LINIERS','Rivadavia 11494  (1408)- Buenos Aires','GIOVANETTI, Sandra',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(59,'SUC 58 - VILLA CRESPO','Scalabrini Ortiz 249 (1414) - Buenos Aires','Gimenez Guillermo',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(60,'SUC 62 - MONTE GRANDE','Boulevard Buenos Aires 206 (1842)','GONZALEZ, Mayra',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(61,'SUC 55 - OLIVOS','Maipú 2836 (1636)','Caamano Monica',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(62,'SUC 28 - LOMAS DE SAN ISIDRO','S. Fernández 198 esq. Laprida (1642)','FERRARI, Federico',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(63,'SUC 39 - MAR DEL PLATA CENTRO','Colón 3201 esq Independencia (7600)  - Mar del Plata','DENIRO, Carlos',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(64,'SUC 41 - PLAZA COLON','Colón 724 (5000) - Córdoba','CHIANALINO, Mariano',NULL,NULL,1,58,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(65,'SUC 16 - QUILMES','Alsina 222 (1878)','SINDAS, Sebastián',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(66,'SUC 43 - ROSARIO CENTRO','Peatonal Cordoba 1460 - Rosario','CRECENTE, Marcelo',NULL,NULL,1,73,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(67,'SUC 19 - CORDOBA','Rivadavia 47 (5000)','HEREDIA, Hugo R.',NULL,NULL,1,58,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(68,'SUC 91 - SAN JUAN','Rivadavia 74 Este  (5400) Ciudad de San Juan -Pcia de San Juan','DE LOS RIOS, Santiago',NULL,NULL,1,70,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(69,'SUC 35 - VILLA ALLENDE','Goycoechea 360  (5105) (Córdoba)','BARRERA, David',NULL,NULL,1,58,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(70,'SUC 66 - MENDOZA MICROCENTRO','San Martín 841 (5500) Ciudad de Mendoza-Pcia de Mendoza','NOTTI, Martín',NULL,NULL,1,65,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(71,'SUC 80 - MALARGÜE','San Martín 361 (5613) Malargue-Pcia de Mendoza','LUNA, Gabriel',NULL,NULL,1,65,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(72,'SUC 11 - RAMOS MEJIA','Av. De mayo 251  (1704)','PEDACE Hernan',NULL,NULL,1,54,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(73,'SUC 94 - LUJAN DE CUYO','San Martín 565 (5507) -Lujan de Cuyo- Pcia.de Mendoza','OLGADE, Luis',NULL,NULL,1,65,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(74,'SUC 76 - GENERAL ALVEAR','Alvear Oeste y Ameghino (5620) - Gral.Alvear - Pcia. De Mendoza','GUIDARELLI, Leandro',NULL,NULL,1,65,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(75,'SUC 42 - PALMARES','R. Panamericana 2650, Centro Comercial Open Mall - Godoy Cruz (5501) - Mendoza','JALIL, Pablo',NULL,NULL,1,65,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(76,'SUC 93 - CAÑON DEL ATUEL','Mitre 122 (5600) San Rafael - Pcia.de Mendoza','RICCI, Pedro',NULL,NULL,1,65,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(77,'SUC 64 - BARRIO CIVICO','Colón 435 (5500)(Mendoza)','LIZARRAGA, Soledad',NULL,NULL,1,65,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(78,'SUC 34 - MENDOZA CENTRO','9 de julio 1257 esq. Gutierrez  (5500)- Mendoza','FRANKEL, Laura',NULL,NULL,1,65,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(79,'SUC 268 - LA TERMINAL','Estación de Interconexión Regional de Ómnibus San Luis, Avenida del Fundador s/n San Luis.  CP 5.700.-','BARRIONUEVO,  Carlos Marcelo',NULL,NULL,1,71,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(80,'SUC 98 - LA PUNTA','Autopista de la  Serrania Puntanas Km 783 (5710) Ciudad de La Punta (San Luis)','GIRALT CALFA, Livia',NULL,NULL,1,71,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(81,'SUC 105 - LA TOMA','9 de Julio y P. Graciarena, La Toma SL (5750)','CAMPOS, Alfredo',NULL,NULL,1,71,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(82,'SUC 260 - TERRAZAS DE PORTEZUELO','Serranias Puntanas Km 783.- Pcia de San Luis . Cod. Postal 5700','Fortuna Alejandro',NULL,NULL,1,71,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(83,'SUC 101 - SAN LUIS','Rivadavia 699 (5700), San Luis Capital SL (5700)','RAMOSCA, Eduardo',NULL,NULL,1,71,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(84,'SUC 121 - BARRIO ESTACION','Av.  Mitre 1623  Villa Mercedes - San Luis (5730)','COMETTO, Yanina',NULL,NULL,1,71,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(85,'SUC 106 - JUSTO DARACT','Av. H. Yrigoyen 389, Justo Daract San Luis (5738)','CACERES, Víctor Hugo',NULL,NULL,1,71,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(86,'SUC 104 - QUINES','San Martín 383 (5711), Quines San Luis','SAN MARTIN, Nazareno',NULL,NULL,1,71,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(87,'SUC 102 - VILLA MERCEDES','Av. Mitre 510 (5730), Villa Mercedes San Luis','ZANGRA, Pedro Rodolfo',NULL,NULL,1,71,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(88,'SUC 110 - MERLO','Presbítero Becerra 562, Merlo San Luis  (5881)','OCHOA, Fabio Dario',NULL,NULL,1,71,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(89,'SUC 103 - SANTA ROSA','Rivadavia esq Santa Rosa (5777), Santa Rosa San Lusis','Coveperwhaite, Pablo',NULL,NULL,1,71,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(90,'SUC 107 - NUEVA GALIA','Pringles 595, Nueva Galia San Luis (6216)','MIRANDA, Silvia Graciela',NULL,NULL,1,71,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(91,'SUC 108 - CONCARÁN','Hermanas Mora y Gobernador Elia Adre, Concarán San Luis (5770)','Lucia Godoy',NULL,NULL,1,71,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(92,'SUC 109 - SAN FRANCISCO','Av. Centenario y 25 de Mayo, San Francisco San Luis (5705)','SAN MARTIN, Nazareno',NULL,NULL,1,71,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(93,'SUC 111 - BUENA ESPERANZA','Pedernera y 25 de Mayo, B. Esperanza San Luis (6277)','CASTILLO, Elsa Mariana',NULL,NULL,1,71,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(94,'SUC 112 - ARIZONA','Av. Santa Marina s/n, Arizona San Luis (6389)','SOTO, Oscar Ramón',NULL,NULL,1,71,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(95,'SUC 114 - UNION','Av. Antonio Dassa 655, Unión San Luis (6261)','CORNARA, Luis Pablo',NULL,NULL,1,71,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(96,'SUC 115 - NASCHEL','San Martín 332, Naschel San Luis (5759)','Ivan Castro Allende',NULL,NULL,1,71,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(97,'SUC 116 - TILISARAO','25 de Mayo 844, Tilisarao San Luis (5773)','RUBIRA, Natalia',NULL,NULL,1,71,'2016-06-13 18:38:14','2016-06-13 18:38:14'),(98,'SUC 119 - CANDELARIA','San Martín y Santa Fé, Candelaria San Luis (5730)','MAYDANA, Roberto',NULL,NULL,1,71,'2016-06-13 18:38:14','2016-06-13 18:38:14');
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

-- Dump completed on 2016-06-14  9:54:09
