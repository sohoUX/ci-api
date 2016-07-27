# ************************************************************
# Sequel Pro SQL dump
# Versi�n 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.10)
# Base de datos: sellutions_app
# Tiempo de Generaci�n: 2016-05-26 02:50:15 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Volcado de tabla commune
# ------------------------------------------------------------

DROP TABLE IF EXISTS `commune`;

CREATE TABLE `commune` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `province_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `commune` WRITE;
/*!40000 ALTER TABLE `commune` DISABLE KEYS */;

INSERT INTO `commune` (`id`, `name`, `province_id`)
VALUES
	(1,'Arica',1),
	(2,'Camarones',1),
	(3,'General Lagos',2),
	(4,'Putre',2),
	(5,'Alto Hospicio',3),
	(6,'Iquique',3),
	(7,'Camiña',4),
	(8,'Colchane',4),
	(9,'Huara',4),
	(10,'Pica',4),
	(11,'Pozo Almonte',4),
	(12,'Antofagasta',5),
	(13,'Mejillones',5),
	(14,'Sierra Gorda',5),
	(15,'Taltal',5),
	(16,'Calama',6),
	(17,'Ollague',6),
	(18,'San Pedro de Atacama',6),
	(19,'María Elena',7),
	(20,'Tocopilla',7),
	(21,'Chañaral',8),
	(22,'Diego de Almagro',8),
	(23,'Caldera',9),
	(24,'Copiapó',9),
	(25,'Tierra Amarilla',9),
	(26,'Alto del Carmen',10),
	(27,'Freirina',10),
	(28,'Huasco',10),
	(29,'Vallenar',10),
	(30,'Canela',11),
	(31,'Illapel',11),
	(32,'Los Vilos',11),
	(33,'Salamanca',11),
	(34,'Andacollo',12),
	(35,'Coquimbo',12),
	(36,'La Higuera',12),
	(37,'La Serena',12),
	(38,'Paihuaco',12),
	(39,'Vicuña',12),
	(40,'Combarbalá',13),
	(41,'Monte Patria',13),
	(42,'Ovalle',13),
	(43,'Punitaqui',13),
	(44,'Río Hurtado',13),
	(45,'Isla de Pascua',14),
	(46,'Calle Larga',15),
	(47,'Los Andes',15),
	(48,'Rinconada',15),
	(49,'San Esteban',15),
	(50,'La Ligua',16),
	(51,'Papudo',16),
	(52,'Petorca',16),
	(53,'Zapallar',16),
	(54,'Hijuelas',17),
	(55,'La Calera',17),
	(56,'La Cruz',17),
	(57,'Limache',17),
	(58,'Nogales',17),
	(59,'Olmué',17),
	(60,'Quillota',17),
	(61,'Algarrobo',18),
	(62,'Cartagena',18),
	(63,'El Quisco',18),
	(64,'El Tabo',18),
	(65,'San Antonio',18),
	(66,'Santo Domingo',18),
	(67,'Catemu',19),
	(68,'Llaillay',19),
	(69,'Panquehue',19),
	(70,'Putaendo',19),
	(71,'San Felipe',19),
	(72,'Santa María',19),
	(73,'Casablanca',20),
	(74,'Concón',20),
	(75,'Juan Fernández',20),
	(76,'Puchuncaví',20),
	(77,'Quilpué',20),
	(78,'Quintero',20),
	(79,'Valparaíso',20),
	(80,'Villa Alemana',20),
	(81,'Viña del Mar',20),
	(82,'Colina',21),
	(83,'Lampa',21),
	(84,'Tiltil',21),
	(85,'Pirque',22),
	(86,'Puente Alto',22),
	(87,'San José de Maipo',22),
	(88,'Buin',23),
	(89,'Calera de Tango',23),
	(90,'Paine',23),
	(91,'San Bernardo',23),
	(92,'Alhué',24),
	(93,'Curacaví',24),
	(94,'María Pinto',24),
	(95,'Melipilla',24),
	(96,'San Pedro',24),
	(97,'Cerrillos',25),
	(98,'Cerro Navia',25),
	(99,'Conchalí',25),
	(100,'El Bosque',25),
	(101,'Estación Central',25),
	(102,'Huechuraba',25),
	(103,'Independencia',25),
	(104,'La Cisterna',25),
	(105,'La Granja',25),
	(106,'La Florida',25),
	(107,'La Pintana',25),
	(108,'La Reina',25),
	(109,'Las Condes',25),
	(110,'Lo Barnechea',25),
	(111,'Lo Espejo',25),
	(112,'Lo Prado',25),
	(113,'Macul',25),
	(114,'Maipú',25),
	(115,'Ñuñoa',25),
	(116,'Pedro Aguirre Cerda',25),
	(117,'Peñalolén',25),
	(118,'Providencia',25),
	(119,'Pudahuel',25),
	(120,'Quilicura',25),
	(121,'Quinta Normal',25),
	(122,'Recoleta',25),
	(123,'Renca',25),
	(124,'San Miguel',25),
	(125,'San Joaquín',25),
	(126,'San Ramón',25),
	(127,'Santiago',25),
	(128,'Vitacura',25),
	(129,'El Monte',26),
	(130,'Isla de Maipo',26),
	(131,'Padre Hurtado',26),
	(132,'Peñaflor',26),
	(133,'Talagante',26),
	(134,'Codegua',27),
	(135,'Coínco',27),
	(136,'Coltauco',27),
	(137,'Doñihue',27),
	(138,'Graneros',27),
	(139,'Las Cabras',27),
	(140,'Machalí',27),
	(141,'Malloa',27),
	(142,'Mostazal',27),
	(143,'Olivar',27),
	(144,'Peumo',27),
	(145,'Pichidegua',27),
	(146,'Quinta de Tilcoco',27),
	(147,'Rancagua',27),
	(148,'Rengo',27),
	(149,'Requínoa',27),
	(150,'San Vicente de Tagua Tagua',27),
	(151,'La Estrella',28),
	(152,'Litueche',28),
	(153,'Marchihue',28),
	(154,'Navidad',28),
	(155,'Peredones',28),
	(156,'Pichilemu',28),
	(157,'Chépica',29),
	(158,'Chimbarongo',29),
	(159,'Lolol',29),
	(160,'Nancagua',29),
	(161,'Palmilla',29),
	(162,'Peralillo',29),
	(163,'Placilla',29),
	(164,'Pumanque',29),
	(165,'San Fernando',29),
	(166,'Santa Cruz',29),
	(167,'Cauquenes',30),
	(168,'Chanco',30),
	(169,'Pelluhue',30),
	(170,'Curicó',31),
	(171,'Hualañé',31),
	(172,'Licantén',31),
	(173,'Molina',31),
	(174,'Rauco',31),
	(175,'Romeral',31),
	(176,'Sagrada Familia',31),
	(177,'Teno',31),
	(178,'Vichuquén',31),
	(179,'Colbún',32),
	(180,'Linares',32),
	(181,'Longaví',32),
	(182,'Parral',32),
	(183,'Retiro',32),
	(184,'San Javier',32),
	(185,'Villa Alegre',32),
	(186,'Yerbas Buenas',32),
	(187,'Constitución',33),
	(188,'Curepto',33),
	(189,'Empedrado',33),
	(190,'Maule',33),
	(191,'Pelarco',33),
	(192,'Pencahue',33),
	(193,'Río Claro',33),
	(194,'San Clemente',33),
	(195,'San Rafael',33),
	(196,'Talca',33),
	(197,'Arauco',34),
	(198,'Cañete',34),
	(199,'Contulmo',34),
	(200,'Curanilahue',34),
	(201,'Lebu',34),
	(202,'Los Álamos',34),
	(203,'Tirúa',34),
	(204,'Alto Biobío',35),
	(205,'Antuco',35),
	(206,'Cabrero',35),
	(207,'Laja',35),
	(208,'Los Ángeles',35),
	(209,'Mulchén',35),
	(210,'Nacimiento',35),
	(211,'Negrete',35),
	(212,'Quilaco',35),
	(213,'Quilleco',35),
	(214,'San Rosendo',35),
	(215,'Santa Bárbara',35),
	(216,'Tucapel',35),
	(217,'Yumbel',35),
	(218,'Chiguayante',36),
	(219,'Concepción',36),
	(220,'Coronel',36),
	(221,'Florida',36),
	(222,'Hualpén',36),
	(223,'Hualqui',36),
	(224,'Lota',36),
	(225,'Penco',36),
	(226,'San Pedro de La Paz',36),
	(227,'Santa Juana',36),
	(228,'Talcahuano',36),
	(229,'Tomé',36),
	(230,'Bulnes',37),
	(231,'Chillán',37),
	(232,'Chillán Viejo',37),
	(233,'Cobquecura',37),
	(234,'Coelemu',37),
	(235,'Coihueco',37),
	(236,'El Carmen',37),
	(237,'Ninhue',37),
	(238,'Ñiquen',37),
	(239,'Pemuco',37),
	(240,'Pinto',37),
	(241,'Portezuelo',37),
	(242,'Quillón',37),
	(243,'Quirihue',37),
	(244,'Ránquil',37),
	(245,'San Carlos',37),
	(246,'San Fabián',37),
	(247,'San Ignacio',37),
	(248,'San Nicolás',37),
	(249,'Treguaco',37),
	(250,'Yungay',37),
	(251,'Carahue',38),
	(252,'Cholchol',38),
	(253,'Cunco',38),
	(254,'Curarrehue',38),
	(255,'Freire',38),
	(256,'Galvarino',38),
	(257,'Gorbea',38),
	(258,'Lautaro',38),
	(259,'Loncoche',38),
	(260,'Melipeuco',38),
	(261,'Nueva Imperial',38),
	(262,'Padre Las Casas',38),
	(263,'Perquenco',38),
	(264,'Pitrufquén',38),
	(265,'Pucón',38),
	(266,'Saavedra',38),
	(267,'Temuco',38),
	(268,'Teodoro Schmidt',38),
	(269,'Toltén',38),
	(270,'Vilcún',38),
	(271,'Villarrica',38),
	(272,'Angol',39),
	(273,'Collipulli',39),
	(274,'Curacautín',39),
	(275,'Ercilla',39),
	(276,'Lonquimay',39),
	(277,'Los Sauces',39),
	(278,'Lumaco',39),
	(279,'Purén',39),
	(280,'Renaico',39),
	(281,'Traiguén',39),
	(282,'Victoria',39),
	(283,'Corral',40),
	(284,'Lanco',40),
	(285,'Los Lagos',40),
	(286,'Máfil',40),
	(287,'Mariquina',40),
	(288,'Paillaco',40),
	(289,'Panguipulli',40),
	(290,'Valdivia',40),
	(291,'Futrono',41),
	(292,'La Unión',41),
	(293,'Lago Ranco',41),
	(294,'Río Bueno',41),
	(295,'Ancud',42),
	(296,'Castro',42),
	(297,'Chonchi',42),
	(298,'Curaco de Vélez',42),
	(299,'Dalcahue',42),
	(300,'Puqueldón',42),
	(301,'Queilén',42),
	(302,'Quemchi',42),
	(303,'Quellón',42),
	(304,'Quinchao',42),
	(305,'Calbuco',43),
	(306,'Cochamó',43),
	(307,'Fresia',43),
	(308,'Frutillar',43),
	(309,'Llanquihue',43),
	(310,'Los Muermos',43),
	(311,'Maullín',43),
	(312,'Puerto Montt',43),
	(313,'Puerto Varas',43),
	(314,'Osorno',44),
	(315,'Puero Octay',44),
	(316,'Purranque',44),
	(317,'Puyehue',44),
	(318,'Río Negro',44),
	(319,'San Juan de la Costa',44),
	(320,'San Pablo',44),
	(321,'Chaitén',45),
	(322,'Futaleufú',45),
	(323,'Hualaihué',45),
	(324,'Palena',45),
	(325,'Aisén',46),
	(326,'Cisnes',46),
	(327,'Guaitecas',46),
	(328,'Cochrane',47),
	(329,'O\'higgins',47),
	(330,'Tortel',47),
	(331,'Coihaique',48),
	(332,'Lago Verde',48),
	(333,'Chile Chico',49),
	(334,'Río Ibáñez',49),
	(335,'Antártica',50),
	(336,'Cabo de Hornos',50),
	(337,'Laguna Blanca',51),
	(338,'Punta Arenas',51),
	(339,'Río Verde',51),
	(340,'San Gregorio',51),
	(341,'Porvenir',52),
	(342,'Primavera',52),
	(343,'Timaukel',52),
	(344,'Natales',53),
	(345,'Torres del Paine',53);

/*!40000 ALTER TABLE `commune` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla company
# ------------------------------------------------------------

DROP TABLE IF EXISTS `company`;

CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `description` text,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;

INSERT INTO `company` (`id`, `name`, `address`, `description`, `logo`, `created_at`, `updated_at`)
VALUES
	(1,'SOHO','Badajoz 130','asdf sadf asdf asf','/frontend/web/img/logos/1-logo-supervielle-1462384067.png',NULL,'2016-05-04 17:47:47');

/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla evaluation
# ------------------------------------------------------------

DROP TABLE IF EXISTS `evaluation`;

CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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

LOCK TABLES `evaluation` WRITE;
/*!40000 ALTER TABLE `evaluation` DISABLE KEYS */;

INSERT INTO `evaluation` (`id`, `consultant_id`, `form_id`, `project_id`, `subsidiary_id`, `status`, `round_id`, `created_at`, `updated_at`)
VALUES
	(1,11,1,2,1,2,52,'2016-05-17 17:17:30','2016-05-17 20:48:40'),
	(2,11,2,2,1,2,52,'2016-05-17 17:17:30','2016-05-18 14:47:42'),
	(3,11,3,2,1,2,52,'2016-05-17 17:17:30','2016-05-18 20:03:22'),
	(4,11,4,2,1,2,52,'2016-05-17 17:17:30','2016-05-18 20:00:34'),
	(5,11,5,2,1,2,52,'2016-05-17 17:17:30','2016-05-18 20:03:55'),
	(6,11,6,2,1,2,52,'2016-05-17 17:17:30','2016-05-18 20:04:33'),
	(7,11,1,2,2,0,52,'2016-05-18 13:32:28','2016-05-18 13:32:28'),
	(8,11,2,2,2,0,52,'2016-05-18 13:32:28','2016-05-18 13:32:28'),
	(9,11,3,2,2,0,52,'2016-05-18 13:32:28','2016-05-18 13:32:28'),
	(10,11,4,2,2,0,52,'2016-05-18 13:32:28','2016-05-18 13:32:28'),
	(11,11,5,2,2,0,52,'2016-05-18 13:32:29','2016-05-18 13:32:29'),
	(12,11,6,2,2,0,52,'2016-05-18 13:32:29','2016-05-18 13:32:29');

/*!40000 ALTER TABLE `evaluation` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla evaluation_field
# ------------------------------------------------------------

DROP TABLE IF EXISTS `evaluation_field`;

CREATE TABLE `evaluation_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `evaluation_id` int(11) DEFAULT NULL,
  `field_id` int(11) DEFAULT NULL,
  `answer` int(11) DEFAULT '0',
  `comment` text,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `evaluation_field` WRITE;
/*!40000 ALTER TABLE `evaluation_field` DISABLE KEYS */;

INSERT INTO `evaluation_field` (`id`, `evaluation_id`, `field_id`, `answer`, `comment`, `updated_at`, `created_at`)
VALUES
	(1,1,1,2,NULL,'2016-05-17 19:15:58','2016-05-17 17:26:35'),
	(2,1,2,0,NULL,'2016-05-17 19:15:59','2016-05-17 17:26:36'),
	(3,1,3,0,NULL,'2016-05-17 19:15:59','2016-05-17 17:26:37'),
	(4,1,4,0,NULL,'2016-05-17 19:15:59','2016-05-17 17:26:49'),
	(5,1,5,0,NULL,'2016-05-17 19:15:59','2016-05-17 18:27:31'),
	(6,1,6,0,NULL,'2016-05-17 19:15:59','2016-05-17 18:28:06'),
	(7,1,7,1,NULL,'2016-05-17 19:15:59','2016-05-17 18:28:39'),
	(8,1,8,1,NULL,'2016-05-17 19:15:59','2016-05-17 18:46:50'),
	(9,1,9,2,NULL,'2016-05-17 19:15:59','2016-05-17 18:46:54'),
	(10,1,10,1,NULL,'2016-05-17 19:15:58','2016-05-17 18:51:34'),
	(11,1,11,1,NULL,'2016-05-17 19:15:58','2016-05-17 18:51:36'),
	(12,2,12,1,NULL,'2016-05-18 14:47:39','2016-05-18 13:45:12'),
	(13,2,13,2,NULL,'2016-05-18 14:47:39','2016-05-18 13:45:13'),
	(14,2,14,2,NULL,'2016-05-18 14:47:39','2016-05-18 13:45:18'),
	(15,2,15,1,NULL,'2016-05-18 14:47:39','2016-05-18 13:45:19'),
	(16,2,16,0,NULL,'2016-05-18 14:47:39','2016-05-18 14:47:27'),
	(17,2,17,1,NULL,'2016-05-18 14:47:39','2016-05-18 14:47:28'),
	(18,2,18,0,NULL,'2016-05-18 14:47:40','2016-05-18 14:47:29'),
	(19,2,19,2,NULL,'2016-05-18 14:47:40','2016-05-18 14:47:30'),
	(20,2,20,2,NULL,'2016-05-18 14:47:40','2016-05-18 14:47:31'),
	(21,2,21,0,NULL,'2016-05-18 14:47:40','2016-05-18 14:47:31'),
	(22,2,22,2,NULL,'2016-05-18 14:47:40','2016-05-18 14:47:36'),
	(23,2,23,1,NULL,'2016-05-18 14:47:40','2016-05-18 14:47:37'),
	(24,2,24,0,NULL,'2016-05-18 14:47:40','2016-05-18 14:47:38'),
	(25,2,25,2,NULL,'2016-05-18 14:47:40','2016-05-18 14:47:39'),
	(26,2,26,0,NULL,'2016-05-18 14:47:40','2016-05-18 14:47:40'),
	(27,2,27,2,NULL,'2016-05-18 14:47:40','2016-05-18 14:47:40'),
	(28,3,79,1,NULL,'2016-05-18 20:03:20','2016-05-18 19:50:59'),
	(29,3,80,2,NULL,'2016-05-18 20:03:20','2016-05-18 19:51:01'),
	(30,3,81,2,NULL,'2016-05-18 20:03:20','2016-05-18 19:51:03'),
	(31,3,82,2,NULL,'2016-05-18 20:03:20','2016-05-18 19:51:03'),
	(32,3,83,2,NULL,'2016-05-18 20:03:20','2016-05-18 19:51:04'),
	(33,3,84,2,NULL,'2016-05-18 20:03:21','2016-05-18 19:51:05'),
	(34,3,85,2,NULL,'2016-05-18 20:03:21','2016-05-18 19:51:07'),
	(35,3,86,1,NULL,'2016-05-18 20:03:21','2016-05-18 19:51:19'),
	(36,3,87,0,NULL,'2016-05-18 20:03:21','2016-05-18 19:51:19'),
	(37,3,91,2,NULL,'2016-05-18 20:03:21','2016-05-18 19:51:22'),
	(38,3,92,2,NULL,'2016-05-18 20:03:21','2016-05-18 19:51:22'),
	(39,3,93,1,NULL,'2016-05-18 20:03:22','2016-05-18 19:51:23'),
	(40,3,94,1,NULL,'2016-05-18 20:03:22','2016-05-18 19:51:24'),
	(41,3,89,0,NULL,'2016-05-18 20:03:21','2016-05-18 19:51:25'),
	(42,3,88,1,NULL,'2016-05-18 20:03:21','2016-05-18 19:51:25'),
	(43,3,90,2,NULL,'2016-05-18 20:03:21','2016-05-18 19:51:26'),
	(44,3,95,1,NULL,'2016-05-18 20:03:22','2016-05-18 19:51:32'),
	(45,3,96,2,NULL,'2016-05-18 20:03:22','2016-05-18 19:51:33'),
	(46,3,97,1,NULL,'2016-05-18 20:03:22','2016-05-18 19:51:35'),
	(47,3,100,2,NULL,'2016-05-18 20:03:19','2016-05-18 19:51:35'),
	(48,3,98,2,NULL,'2016-05-18 20:03:22','2016-05-18 19:51:36'),
	(49,3,99,1,NULL,'2016-05-18 20:03:22','2016-05-18 19:51:37'),
	(50,3,101,2,NULL,'2016-05-18 20:03:19','2016-05-18 19:51:38'),
	(51,3,102,1,NULL,'2016-05-18 20:03:19','2016-05-18 19:51:39'),
	(52,3,103,2,NULL,'2016-05-18 20:03:19','2016-05-18 19:51:39'),
	(53,3,105,2,NULL,'2016-05-18 20:03:20','2016-05-18 19:51:42'),
	(54,3,106,1,NULL,'2016-05-18 20:03:20','2016-05-18 19:51:43'),
	(55,3,107,1,NULL,'2016-05-18 20:03:20','2016-05-18 19:51:43'),
	(56,3,108,1,NULL,'2016-05-18 20:03:20','2016-05-18 19:51:44'),
	(57,3,104,2,NULL,'2016-05-18 20:03:20','2016-05-18 19:51:48'),
	(58,4,109,1,NULL,'2016-05-18 20:00:29','2016-05-18 20:00:06'),
	(59,4,110,2,NULL,'2016-05-18 20:00:30','2016-05-18 20:00:06'),
	(60,4,111,1,NULL,'2016-05-18 20:00:30','2016-05-18 20:00:09'),
	(61,4,112,2,NULL,'2016-05-18 20:00:30','2016-05-18 20:00:10'),
	(62,4,113,0,NULL,'2016-05-18 20:00:30','2016-05-18 20:00:11'),
	(63,4,114,2,NULL,'2016-05-18 20:00:30','2016-05-18 20:00:12'),
	(64,4,115,1,NULL,'2016-05-18 20:00:30','2016-05-18 20:00:12'),
	(65,4,116,2,NULL,'2016-05-18 20:00:30','2016-05-18 20:00:16'),
	(66,4,117,1,NULL,'2016-05-18 20:00:31','2016-05-18 20:00:16'),
	(67,4,118,2,NULL,'2016-05-18 20:00:31','2016-05-18 20:00:17'),
	(68,4,119,0,NULL,'2016-05-18 20:00:31','2016-05-18 20:00:17'),
	(69,4,126,0,NULL,'2016-05-18 20:00:32','2016-05-18 20:00:20'),
	(70,4,127,2,NULL,'2016-05-18 20:00:32','2016-05-18 20:00:21'),
	(71,4,128,1,NULL,'2016-05-18 20:00:32','2016-05-18 20:00:21'),
	(72,4,129,1,NULL,'2016-05-18 20:00:32','2016-05-18 20:00:23'),
	(73,4,130,2,NULL,'2016-05-18 20:00:32','2016-05-18 20:00:25'),
	(74,4,131,2,NULL,'2016-05-18 20:00:32','2016-05-18 20:00:25'),
	(75,4,132,1,NULL,'2016-05-18 20:00:32','2016-05-18 20:00:27'),
	(76,4,133,0,NULL,'2016-05-18 20:00:33','2016-05-18 20:00:27'),
	(77,4,120,0,NULL,'2016-05-18 20:00:31','2016-05-18 20:00:28'),
	(78,4,121,2,NULL,'2016-05-18 20:00:31','2016-05-18 20:00:29'),
	(79,4,122,1,NULL,'2016-05-18 20:00:31','2016-05-18 20:00:30'),
	(80,4,123,2,NULL,'2016-05-18 20:00:31','2016-05-18 20:00:30'),
	(81,4,124,1,NULL,'2016-05-18 20:00:31','2016-05-18 20:00:31'),
	(82,4,125,0,NULL,'2016-05-18 20:00:32','2016-05-18 20:00:32'),
	(83,5,28,2,NULL,'2016-05-18 20:03:51','2016-05-18 20:03:33'),
	(84,5,29,2,NULL,'2016-05-18 20:03:52','2016-05-18 20:03:36'),
	(85,5,42,2,NULL,'2016-05-18 20:03:52','2016-05-18 20:03:36'),
	(86,5,43,1,NULL,'2016-05-18 20:03:52','2016-05-18 20:03:37'),
	(87,5,44,1,NULL,'2016-05-18 20:03:52','2016-05-18 20:03:38'),
	(88,5,45,2,NULL,'2016-05-18 20:03:52','2016-05-18 20:03:38'),
	(89,5,46,1,NULL,'2016-05-18 20:03:52','2016-05-18 20:03:41'),
	(90,5,47,1,NULL,'2016-05-18 20:03:52','2016-05-18 20:03:41'),
	(91,5,48,1,NULL,'2016-05-18 20:03:53','2016-05-18 20:03:42'),
	(92,5,49,0,NULL,'2016-05-18 20:03:53','2016-05-18 20:03:42'),
	(93,5,51,2,NULL,'2016-05-18 20:03:53','2016-05-18 20:03:45'),
	(94,5,52,2,NULL,'2016-05-18 20:03:53','2016-05-18 20:03:45'),
	(95,5,53,2,NULL,'2016-05-18 20:03:53','2016-05-18 20:03:46'),
	(96,5,50,0,NULL,'2016-05-18 20:03:53','2016-05-18 20:03:46'),
	(97,5,54,1,NULL,'2016-05-18 20:03:53','2016-05-18 20:03:51'),
	(98,5,55,2,NULL,'2016-05-18 20:03:53','2016-05-18 20:03:52'),
	(99,5,56,1,NULL,'2016-05-18 20:03:53','2016-05-18 20:03:52'),
	(100,5,57,2,NULL,'2016-05-18 20:03:53','2016-05-18 20:03:53'),
	(101,5,58,1,NULL,'2016-05-18 20:03:53','2016-05-18 20:03:53'),
	(102,6,59,2,NULL,'2016-05-18 20:04:30','2016-05-18 20:04:07'),
	(103,6,60,1,NULL,'2016-05-18 20:04:30','2016-05-18 20:04:11'),
	(104,6,61,0,NULL,'2016-05-18 20:04:30','2016-05-18 20:04:14'),
	(105,6,62,2,NULL,'2016-05-18 20:04:30','2016-05-18 20:04:14'),
	(106,6,63,1,NULL,'2016-05-18 20:04:31','2016-05-18 20:04:16'),
	(107,6,64,1,NULL,'2016-05-18 20:04:31','2016-05-18 20:04:17'),
	(108,6,65,1,NULL,'2016-05-18 20:04:31','2016-05-18 20:04:18'),
	(109,6,66,1,NULL,'2016-05-18 20:04:31','2016-05-18 20:04:18'),
	(110,6,67,1,NULL,'2016-05-18 20:04:31','2016-05-18 20:04:19'),
	(111,6,68,1,NULL,'2016-05-18 20:04:31','2016-05-18 20:04:20'),
	(112,6,69,1,NULL,'2016-05-18 20:04:31','2016-05-18 20:04:23'),
	(113,6,70,1,NULL,'2016-05-18 20:04:31','2016-05-18 20:04:23'),
	(114,6,71,1,NULL,'2016-05-18 20:04:32','2016-05-18 20:04:24'),
	(115,6,72,1,NULL,'2016-05-18 20:04:32','2016-05-18 20:04:25'),
	(116,6,73,2,NULL,'2016-05-18 20:04:32','2016-05-18 20:04:26'),
	(117,6,74,2,NULL,'2016-05-18 20:04:32','2016-05-18 20:04:26'),
	(118,6,78,1,NULL,'2016-05-18 20:04:32','2016-05-18 20:04:28'),
	(119,6,77,1,NULL,'2016-05-18 20:04:32','2016-05-18 20:04:29'),
	(120,6,76,1,NULL,'2016-05-18 20:04:32','2016-05-18 20:04:29'),
	(121,6,75,2,NULL,'2016-05-18 20:04:32','2016-05-18 20:04:31');

/*!40000 ALTER TABLE `evaluation_field` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla evaluation_observation
# ------------------------------------------------------------

DROP TABLE IF EXISTS `evaluation_observation`;

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

LOCK TABLES `evaluation_observation` WRITE;
/*!40000 ALTER TABLE `evaluation_observation` DISABLE KEYS */;

INSERT INTO `evaluation_observation` (`id`, `evaluation_id`, `slug`, `name`, `value`, `created_at`, `updated_at`)
VALUES
	(1,1,'strengths','Fortalezas','sdfsdfdffdd asd','2016-05-17 22:57:07','2016-05-18 14:45:29'),
	(2,1,'improvement_opportunities','Oportunidades de mejora','asd asd das','2016-05-17 22:57:07','2016-05-18 14:45:29'),
	(3,1,'priority_conductive','Conductora Prioritaria','asdf\nsadf\nsadf\nasdfasdfasf','2016-05-17 22:57:08','2016-05-18 14:45:29'),
	(4,1,'tactical_plan','Plan Táctico','asdasda asd','2016-05-17 22:57:08','2016-05-18 14:45:29'),
	(5,2,'strengths','Fortalezas','asdasd','2016-05-18 14:48:35','2016-05-18 14:48:39'),
	(6,2,'improvement_opportunities','Oportunidades de mejora','asdasd','2016-05-18 14:48:35','2016-05-18 14:48:39'),
	(7,2,'priority_conductive','Conductora Prioritaria','asdasd','2016-05-18 14:48:35','2016-05-18 14:48:39'),
	(8,2,'tactical_plan','Plan Táctico','asdasdasd asd','2016-05-18 14:48:35','2016-05-18 14:48:39'),
	(9,3,'strengths','Fortalezas','asdf sdf','2016-05-18 19:51:52','2016-05-18 19:51:55'),
	(10,3,'improvement_opportunities','Oportunidades de mejora','sadf asdf','2016-05-18 19:51:52','2016-05-18 19:51:55'),
	(11,3,'priority_conductive','Conductora Prioritaria','sdf sadf asdf','2016-05-18 19:51:52','2016-05-18 19:51:55'),
	(12,3,'tactical_plan','Plan Táctico','sadf sadf sadf','2016-05-18 19:51:52','2016-05-18 19:51:55'),
	(13,4,'strengths','Fortalezas','asdf sdf','2016-05-18 20:00:50','2016-05-18 20:00:55'),
	(14,4,'improvement_opportunities','Oportunidades de mejora','sadf asdfsadf','2016-05-18 20:00:50','2016-05-18 20:00:55'),
	(15,4,'priority_conductive','Conductora Prioritaria','asdf asdf asdf','2016-05-18 20:00:50','2016-05-18 20:00:55'),
	(16,4,'priority_conductive','Conductora Prioritaria','','2016-05-18 20:00:50','2016-05-18 20:00:50'),
	(17,4,'tactical_plan','Plan Táctico','asdf asdf asdf sadf','2016-05-18 20:00:50','2016-05-18 20:00:55'),
	(18,5,'strengths','Fortalezas','sadfsdfsdf','2016-05-18 20:03:57','2016-05-18 20:04:00'),
	(19,5,'improvement_opportunities','Oportunidades de mejora','sdfsdf','2016-05-18 20:03:57','2016-05-18 20:04:00'),
	(20,5,'priority_conductive','Conductora Prioritaria','sdfsdfs','2016-05-18 20:03:57','2016-05-18 20:04:00'),
	(21,5,'priority_conductive','Conductora Prioritaria','','2016-05-18 20:03:57','2016-05-18 20:03:57'),
	(22,5,'priority_conductive','Conductora Prioritaria','','2016-05-18 20:03:57','2016-05-18 20:03:57'),
	(23,5,'tactical_plan','Plan Táctico','sdfsdfsdf','2016-05-18 20:03:57','2016-05-18 20:04:00'),
	(24,6,'strengths','Fortalezas','asdfsdf','2016-05-18 20:04:34','2016-05-18 20:04:38'),
	(25,6,'improvement_opportunities','Oportunidades de mejora','sdfsadfas','2016-05-18 20:04:35','2016-05-18 20:04:38'),
	(26,6,'priority_conductive','Conductora Prioritaria','sadfasdfsadf','2016-05-18 20:04:35','2016-05-18 20:04:38'),
	(27,6,'tactical_plan','Plan Táctico','asdfsadfsadf','2016-05-18 20:04:35','2016-05-18 20:04:38');

/*!40000 ALTER TABLE `evaluation_observation` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla field
# ------------------------------------------------------------

DROP TABLE IF EXISTS `field`;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `field` WRITE;
/*!40000 ALTER TABLE `field` DISABLE KEYS */;

INSERT INTO `field` (`id`, `fieldset_id`, `code`, `name`, `description`, `type`, `created_at`, `updated_at`)
VALUES
	(1,1,'','¿Lleva adelante la reunión diaria con su equipo?','',1,'2016-05-17 16:06:13','2016-05-17 16:06:13'),
	(2,1,'','¿Logra mantener el foco de la reunión?','',1,'2016-05-17 16:06:25','2016-05-17 16:06:25'),
	(3,1,'','¿Cumple con el tiempo establecido para la realización de la reunión?','',1,'2016-05-17 16:06:40','2016-05-17 16:06:40'),
	(4,1,'','¿Promueve buen clima durante las mismas, motivando al equipo para la consecución de los objetivos?','',1,'2016-05-17 16:06:51','2016-05-17 16:06:51'),
	(5,1,'','¿Establece acciones correctivas frente a desvíos en el logro de los objetivos?','',1,'2016-05-17 16:07:02','2016-05-17 16:07:02'),
	(6,1,'','¿Felicita a quienes se destacan en su performance?','',1,'2016-05-17 16:07:14','2016-05-17 16:07:14'),
	(7,1,'','¿Tiene buen manejo de la dinámica de la reunión?','',1,'2016-05-17 16:07:34','2016-05-17 16:07:34'),
	(8,1,'','¿Invita a los participantes a sumarse a la propuesta de trabajo?','',1,'2016-05-17 16:07:46','2016-05-17 16:07:46'),
	(9,1,'','¿Maneja el uso del tablero?','',1,'2016-05-17 16:07:58','2016-05-17 16:07:58'),
	(10,2,'','¿Realiza reuniones mensuales con su equipo con el objetivo de compartir novedades y buenas prácticas?','',1,'2016-05-17 16:08:10','2016-05-17 16:08:10'),
	(11,2,'','¿Realiza un informe de los resultante en la reunión para compartir con el equipo y con su regional?','',1,'2016-05-17 16:08:20','2016-05-17 16:08:20'),
	(12,3,'','¿El Gerente planifica y actualiza las acciones que se realizarán para lograr el presupuesto?','',1,'2016-05-17 16:12:45','2016-05-17 16:12:45'),
	(13,3,'','¿Planifica acciones concretas que faciliten el logro de los objetivos?','',1,'2016-05-17 16:13:06','2016-05-17 16:13:06'),
	(14,3,'','¿Asigna a cada colaborador objetivos individuales?','',1,'2016-05-17 16:13:28','2016-05-17 16:13:28'),
	(15,3,'','¿Revisa semanalmente las Oportunidades con su Equipo?','',1,'2016-05-17 16:13:41','2016-05-17 16:13:41'),
	(16,4,'','¿Realiza Embudo de Ventas?','',1,'2016-05-17 16:14:05','2016-05-17 16:14:05'),
	(17,4,'','¿Planifica y actualiza en Embudo de Ventas las Oportunidades a desarrollar?','',1,'2016-05-17 16:14:18','2016-05-17 16:14:18'),
	(18,4,'','¿Planifica acciones concretas que faciliten la evolución de las oportunidades?','',1,'2016-05-17 16:14:31','2016-05-17 16:14:31'),
	(19,4,'','¿Analiza su base actual de clientes para identificar nuevas oportunidades?','',1,'2016-05-17 16:14:42','2016-05-17 16:14:42'),
	(20,4,'','¿Trabaja con una base de referidos para prospectar?','',1,'2016-05-17 16:14:55','2016-05-17 16:14:55'),
	(21,4,'','¿Revisa semanalmente las Oportunidades con su Gerente?	','',1,'2016-05-17 16:15:06','2016-05-17 16:15:06'),
	(22,5,'','¿Realiza Embudo de Ventas?	','',1,'2016-05-17 16:15:21','2016-05-17 16:15:21'),
	(23,5,'','¿Planifica y actualiza en Embudo de Ventas las Oportunidades a desarrollar?','',1,'2016-05-17 16:15:32','2016-05-17 16:15:32'),
	(24,5,'','¿Planifica acciones concretas que faciliten la evolución de las oportunidades?','',1,'2016-05-17 16:15:41','2016-05-17 16:15:41'),
	(25,5,'','¿Analiza su base actual de clientes para identificar nuevas oportunidades?','',1,'2016-05-17 16:15:50','2016-05-17 16:15:50'),
	(26,5,'','¿Trabaja con una base de referidos para prospectar?','',1,'2016-05-17 16:16:05','2016-05-17 16:16:05'),
	(27,5,'','¿Revisa semanalmente las Oportunidades con su Gerente?	','',1,'2016-05-17 16:16:18','2016-05-17 16:16:18'),
	(28,6,'','¿Identifica con claridad a los Actores Clave en las nuevas oportunidades?','',1,'2016-05-17 16:20:44','2016-05-17 16:20:44'),
	(29,6,'','¿Demuestra Conocer y Comprender el negocio del cliente?','',1,'2016-05-17 16:21:01','2016-05-17 16:21:01'),
	(42,6,NULL,'¿Prepara el negocio para ganar credibilidad en los Actores Clave del cliente?',NULL,1,NULL,NULL),
	(43,6,NULL,'¿Desarrolla un Motivo Convincente para generar las entrevistas con los Actores Clave?',NULL,1,NULL,NULL),
	(44,6,NULL,'¿Compende en profundidad la Necesidad Manifiesta del cliente antes de hacer su propuesta?',NULL,1,NULL,NULL),
	(45,6,NULL,'¿Genera Hipótesis de Oportunidad a para identificar Necesidades Latentes?',NULL,1,NULL,NULL),
	(46,6,NULL,'¿Desarrolla Necesidades Latentes mediante preguntas de Contexto basado en un hipótesis?',NULL,1,NULL,NULL),
	(47,6,NULL,'¿Desarrolla Necesidades Latentes mediante preguntas de Oportunidad  Potencial?',NULL,1,NULL,NULL),
	(48,6,NULL,'¿Presenta su Propuesta generando Valor para el negocio del cliente?',NULL,1,NULL,NULL),
	(49,6,NULL,'¿Utiliza la HPO para preparar sus oportunidades y encuentros clave con clientes?',NULL,1,NULL,NULL),
	(50,6,NULL,'¿Conoce y comprende el uso de la HPO?',NULL,1,NULL,NULL),
	(51,6,NULL,'¿Reconoce su nivel de relacionamiento actual y puede proyectar el relacionamiento a futuro?',NULL,1,NULL,NULL),
	(52,6,NULL,'¿Logra identificar las Fortalezas y Debilidades que el cliente establece con su empresa y con la competencia?',NULL,1,NULL,NULL),
	(53,6,NULL,'¿Desarrolla Relacionamiento personal con los Actores Clave del Cliente?',NULL,1,NULL,NULL),
	(54,7,NULL,'¿Se presenta de manera clara y mencionando al Banco como entidad a la que representa?',NULL,1,NULL,NULL),
	(55,7,NULL,'¿Despierta el interés del cliente mediante un motivo convincente?',NULL,1,NULL,NULL),
	(56,7,NULL,'¿Evita presentar productos en el contacto inicial?',NULL,1,NULL,NULL),
	(57,7,NULL,'¿Ofrece opción para realizar la entrevista presencial?',NULL,1,NULL,NULL),
	(58,7,NULL,'¿Intenta más de una vez para concretar entrevista?',NULL,1,NULL,NULL),
	(59,19,NULL,'¿Realizan un seguimiento periódico de la evolución del desempeño de los colaboradores?',NULL,1,NULL,NULL),
	(60,19,NULL,'¿Genera Receptividad y buen clima con los colaboradores en sus sesiones de Coaching?',NULL,1,NULL,NULL),
	(61,19,NULL,'¿ Desarrolla la reunión en un clima adecuado y confidencial?',NULL,1,NULL,NULL),
	(62,19,NULL,'En caso que corresponda, ¿Retoma la Conducta Prioritaria acordada en la sesión anterior?',NULL,1,NULL,NULL),
	(63,19,NULL,'¿En las sesiones de Coaching buscan favorecer el Auto-Análisis de Fortalezas  por medio de preguntas?',NULL,1,NULL,NULL),
	(64,19,NULL,'¿Logra mediante preguntas específicas guiar la reflexión del colaborador?',NULL,1,NULL,NULL),
	(65,19,NULL,'¿Realiza una síntesis de las Fortalezas abordadas?',NULL,1,NULL,NULL),
	(66,19,NULL,'¿En las sesiones de Coaching buscan favorecer el Auto-Análisis de las Oportunidades de Mejora  por medio de preguntas?',NULL,1,NULL,NULL),
	(67,19,NULL,'¿Logra mediante preguntas específicas guiar la reflexión del colaborador sobre las Oportunidades de Mejora?',NULL,1,NULL,NULL),
	(68,19,NULL,'¿Realiza una síntesis de las Oportunidades de Mejora abordadas?',NULL,1,NULL,NULL),
	(69,19,NULL,'Si el colaborador no logra mediante preguntas específicas identificar sus Fortalezas u Oportunidades de Mejora el Coach ¿brinda feedback exponiendo su diagnóstico en términos de un análisis descriptivo y objetivo?',NULL,1,NULL,NULL),
	(70,19,NULL,'¿Las sesiones de Coaching culminan con una Conducta Prioritaria?',NULL,1,NULL,NULL),
	(71,19,NULL,'En función de la CP ¿ Acuerdan un Plan de Acción?',NULL,1,NULL,NULL),
	(72,19,NULL,'¿El Plan de Acción establecido se encuentra detallado?',NULL,1,NULL,NULL),
	(73,19,NULL,'El Plan de Acción  ¿ se encuentra ligado a una fecha?',NULL,1,NULL,NULL),
	(74,19,NULL,'Al identificar falta de conocimiento en el colaborador ¿asume rol de Mentor mediante la explicación conceptual y la provisión de ejemplos?',NULL,1,NULL,NULL),
	(75,19,NULL,'Al identificar que se trata de una falta de habilidad para la puesta en práctica por parte de su colaborador ¿asume rol de Entrenador mediante role play sobre la CP?',NULL,1,NULL,NULL),
	(76,19,NULL,'Al identificar que se trata de una  cuestión de actitud para la puesta en práctica de la conducta observada por parte de su colaborador ¿asume rol Confrontador permitiendo la identificación y reflexión del colaborador?',NULL,1,NULL,NULL),
	(77,19,NULL,'¿ Identifica correctamente el rol utilizado?',NULL,1,NULL,NULL),
	(78,19,NULL,'¿La evolución del desempeño de cada colaborador es documentada con Reportes de Coaching?',NULL,1,NULL,NULL),
	(79,13,NULL,'¿El Comercial realiza un acercamiento acorde al modelo?',NULL,1,NULL,NULL),
	(80,13,NULL,'¿El Comercial se habilita para hacer preguntas, mencionando su rol de Asesor?',NULL,1,NULL,NULL),
	(81,14,NULL,'¿Indaga a través de Preguntas de Información Básica las Oportunidades Manifiestas del cliente?',NULL,1,NULL,NULL),
	(82,14,NULL,'¿Confirma a través de Preguntas de Confirmación  las Oportunidades Manifiestas del cliente?',NULL,1,NULL,NULL),
	(83,14,NULL,'¿Para trabajar Oportunidades Latentes construye una Hipótesis de Oportunidad a partir de la cual confirma mediante PDC?',NULL,1,NULL,NULL),
	(84,14,NULL,'¿Utilizan POP para influenciar el pensamiento del cliente acerca de sus áreas de Preocupación o Beneficio?',NULL,1,NULL,NULL),
	(85,14,NULL,'¿Evita introducir el producto anticipadamente en la formulación de preguntas?',NULL,1,NULL,NULL),
	(86,15,NULL,'¿Indaga a través de Preguntas de Información Básica las Oportunidades Manifiestas del cliente?',NULL,1,NULL,NULL),
	(87,15,NULL,'¿Confirma a través de Preguntas de Confirmación  las Oportunidades Manifiestas del cliente?',NULL,1,NULL,NULL),
	(88,15,NULL,'¿Para trabajar Oportunidades Latentes construye una Hipótesis de Oportunidad a partir de la cual confirma mediante PDC?',NULL,1,NULL,NULL),
	(89,15,NULL,'¿Utilizan POP para influenciar el pensamiento del cliente acerca de sus áreas de Preocupación o Beneficio?',NULL,1,NULL,NULL),
	(90,15,NULL,'¿Evita introducir el producto anticipadamente en la formulación de preguntas?',NULL,1,NULL,NULL),
	(91,15,NULL,'¿Presenta la propuesta poniendo énfasis en los Beneficios Personalizados (vs. sólo características genéricas)?',NULL,1,NULL,NULL),
	(92,15,NULL,'¿Al presentar la propuesta tiene en cuenta el perfil del cliente y busca adaptarse a él?',NULL,1,NULL,NULL),
	(93,15,NULL,'¿Los beneficios que presenta se relacionan directamente con las Oportunidades identificadas por el Cliente?',NULL,1,NULL,NULL),
	(94,15,NULL,'¿Utiliza la técnica del conector correctamente?',NULL,1,NULL,NULL),
	(95,16,NULL,'¿Busca cerrar la venta resumiendo los beneficios y formulando un Plan de Acción?',NULL,1,NULL,NULL),
	(96,16,NULL,'Ante Actitudes Adversas del cliente, ¿adopta una actitud proactiva para superarla?',NULL,1,NULL,NULL),
	(97,16,NULL,'Al identificar Indiferencia, ¿profundiza las POP para hacerle ver al Cliente la Oportunidad aún no percibida como relevante?',NULL,1,NULL,NULL),
	(98,16,NULL,'Al identificar Escepticismo ¿Ofrecen pruebas que anulen dicha actitud?',NULL,1,NULL,NULL),
	(99,16,NULL,'Al identificar Objeciones ¿Realiza una pregunta buscando demostrar el poco peso relativo que tiene la Objeción?',NULL,1,NULL,NULL),
	(100,16,NULL,'Una vez revertida la Actitud Adversa identificada ¿Intenta nuevamente el cierre?',NULL,1,NULL,NULL),
	(101,17,NULL,'¿Busca generar relacionamiento con el cliente al cierre de la entrevista (vs. sólo dar información y despedir)?',NULL,1,NULL,NULL),
	(102,17,NULL,'¿Solicita referidos?',NULL,1,NULL,NULL),
	(103,17,NULL,'¿Propone grupo de afinidad desde la perspectiva de las Oportunidades trabajadas?',NULL,1,NULL,NULL),
	(104,18,NULL,'¿Se presenta de manera clara y mencionando al Banco como entidad a la que representa?',NULL,1,NULL,NULL),
	(105,18,NULL,'¿Despierta el interés del cliente mediante un motivo convincente?',NULL,1,NULL,NULL),
	(106,18,NULL,'¿Evita presentar productos en el contacto inicial?',NULL,1,NULL,NULL),
	(107,18,NULL,'¿Ofrece opción para realizar la entrevista presencial?',NULL,1,NULL,NULL),
	(108,18,NULL,'¿Intenta más de una vez para concretar entrevista?',NULL,1,NULL,NULL),
	(109,8,NULL,'¿El Comercial realiza un acercamiento acorde al modelo?',NULL,1,NULL,NULL),
	(110,8,NULL,'¿El Comercial se habilita para hacer preguntas, mencionando su rol de Asesor?',NULL,1,NULL,NULL),
	(111,9,NULL,'¿Indaga a través de Preguntas de Información Básica las Oportunidades Manifiestas del cliente?',NULL,1,NULL,NULL),
	(112,9,NULL,'¿Confirma a través de Preguntas de Confirmación  las Oportunidades Manifiestas del cliente?',NULL,1,NULL,NULL),
	(113,9,NULL,'¿Para trabajar Oportunidades Latentes construye una Hipótesis de Oportunidad a partir de la cual confirma mediante PDC?',NULL,1,NULL,NULL),
	(114,9,NULL,'¿Utilizan POP para influenciar el pensamiento del cliente acerca de sus áreas de Preocupación o Beneficio?',NULL,1,NULL,NULL),
	(115,9,NULL,'¿Evita introducir el producto anticipadamente en la formulación de preguntas?',NULL,1,NULL,NULL),
	(116,10,NULL,'¿Presenta la propuesta poniendo énfasis en los Beneficios Personalizados (vs. sólo características genéricas)?',NULL,1,NULL,NULL),
	(117,10,NULL,'¿Al presentar la propuesta tiene en cuenta el perfil del cliente y busca adaptarse a él?',NULL,1,NULL,NULL),
	(118,10,NULL,'¿Los beneficios que presenta se relacionan directamente con las Oportunidades identificadas por el Cliente?',NULL,1,NULL,NULL),
	(119,10,NULL,'¿Utiliza la técnica del conector correctamente?',NULL,1,NULL,NULL),
	(120,20,NULL,'¿Busca cerrar la venta resumiendo los beneficios y formulando un Plan de Acción?',NULL,1,NULL,NULL),
	(121,20,NULL,'Ante Actitudes Adversas del cliente, ¿adopta una actitud proactiva para superarla?',NULL,1,NULL,NULL),
	(122,20,NULL,'Al identificar Indiferencia, ¿profundiza las POP para hacerle ver al Cliente la Oportunidad aún no percibida como relevante?',NULL,1,NULL,NULL),
	(123,20,NULL,'Al identificar Escepticismo ¿Ofrecen pruebas que anulen dicha actitud?',NULL,1,NULL,NULL),
	(124,20,NULL,'Al identificar Objeciones ¿Realiza una pregunta buscando demostrar el poco peso relativo que tiene la Objeción?',NULL,1,NULL,NULL),
	(125,20,NULL,'Una vez revertida la Actitud Adversa identificada ¿Intenta nuevamente el cierre?',NULL,1,NULL,NULL),
	(126,11,NULL,'¿Busca generar relacionamiento con el cliente al cierre de la entrevista (vs. sólo dar información y despedir)?',NULL,1,NULL,NULL),
	(127,11,NULL,'¿Solicita referidos?',NULL,1,NULL,NULL),
	(128,11,NULL,'¿Propone grupo de afinidad desde la perspectiva de las Oportunidades trabajadas?',NULL,1,NULL,NULL),
	(129,12,NULL,'¿Se presenta de manera clara y mencionando al Banco como entidad a la que representa?',NULL,1,NULL,NULL),
	(130,12,NULL,'¿Despierta el interés del cliente mediante un motivo convincente?',NULL,1,NULL,NULL),
	(131,12,NULL,'¿Evita presentar productos en el contacto inicial?',NULL,1,NULL,NULL),
	(132,12,NULL,'¿Ofrece opción para realizar la entrevista presencial?',NULL,1,NULL,NULL),
	(133,12,NULL,'¿Intenta más de una vez para concretar entrevista?',NULL,1,NULL,NULL);

/*!40000 ALTER TABLE `field` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla field_skip_logic
# ------------------------------------------------------------

DROP TABLE IF EXISTS `field_skip_logic`;

CREATE TABLE `field_skip_logic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field_id` int(11) DEFAULT NULL,
  `target_id` int(11) DEFAULT NULL,
  `answer` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Volcado de tabla fieldset
# ------------------------------------------------------------

DROP TABLE IF EXISTS `fieldset`;

CREATE TABLE `fieldset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `form_id` int(11) DEFAULT NULL,
  `percentage` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `fieldset` WRITE;
/*!40000 ALTER TABLE `fieldset` DISABLE KEYS */;

INSERT INTO `fieldset` (`id`, `name`, `description`, `form_id`, `percentage`, `created_at`, `updated_at`)
VALUES
	(1,'Jugada del Día','',1,75,'2016-05-17 15:59:28','2016-05-17 16:05:03'),
	(2,'Reuniones con el Equipo','',1,25,'2016-05-17 15:59:35','2016-05-17 16:05:17'),
	(3,'Planificación Gerente','',2,33.3,'2016-05-17 16:11:42','2016-05-17 16:11:42'),
	(4,'Planificación  Emprendedores & Pymes','',2,33.3,'2016-05-17 16:12:02','2016-05-17 16:12:02'),
	(5,'Planificación  Identitè','',2,33.3,'2016-05-17 16:12:22','2016-05-17 16:12:22'),
	(6,'Hoja de Preparación de Oportunidad','',5,85,'2016-05-17 16:20:02','2016-05-17 16:20:02'),
	(7,'Contacto Telefónico','',5,15,'2016-05-17 16:20:13','2016-05-17 16:20:26'),
	(8,'Acercamiento','',4,5,'2016-05-17 16:35:40','2016-05-17 16:35:40'),
	(9,'Indagar y Desarrollar','',4,40,'2016-05-17 16:35:59','2016-05-17 16:35:59'),
	(10,'Presentar Propuesta','',4,15,'2016-05-17 16:36:12','2016-05-17 16:36:12'),
	(11,'Relacionamiento','',4,10,'2016-05-17 16:36:29','2016-05-17 16:36:29'),
	(12,'Contacto Telefónico','',4,15,'2016-05-17 16:37:12','2016-05-17 16:37:12'),
	(13,'Acercamiento','',3,5,'2016-05-17 16:38:02','2016-05-17 16:38:02'),
	(14,'Indagar y Desarrollar','',3,40,'2016-05-17 16:38:21','2016-05-17 16:38:21'),
	(15,'Presentar Propuesta','',3,15,'2016-05-17 16:38:36','2016-05-17 16:38:36'),
	(16,'Cerrar la Venta','',3,15,'2016-05-17 16:38:50','2016-05-17 16:38:50'),
	(17,'Relacionamiento','',3,10,'2016-05-17 16:39:07','2016-05-17 16:39:07'),
	(18,'Contacto Telefónico','',3,15,'2016-05-17 16:39:23','2016-05-17 16:39:23'),
	(19,'Sesión de Coaching','',6,100,'2016-05-17 16:40:02','2016-05-17 16:40:02'),
	(20,'Cerrar la Venta','',4,15,'2016-05-18 19:57:44','2016-05-18 19:57:44');

/*!40000 ALTER TABLE `fieldset` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla form
# ------------------------------------------------------------

DROP TABLE IF EXISTS `form`;

CREATE TABLE `form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `form` WRITE;
/*!40000 ALTER TABLE `form` DISABLE KEYS */;

INSERT INTO `form` (`id`, `name`, `description`, `user_id`, `created_at`, `updated_at`)
VALUES
	(1,'Reuniones','',NULL,'2016-04-29 21:31:31','2016-05-17 15:58:10'),
	(2,'Planificación','asdasd',2,'2016-04-29 21:46:43','2016-05-17 15:58:25'),
	(3,'Renta Masiva','',2,'2016-05-17 15:58:35','2016-05-17 15:58:35'),
	(4,'Identité','',2,'2016-05-17 15:58:45','2016-05-17 15:58:45'),
	(5,'E&P','',2,'2016-05-17 15:58:54','2016-05-17 15:58:54'),
	(6,'Gerente de Sucursal','',2,'2016-05-17 15:59:05','2016-05-17 15:59:05');

/*!40000 ALTER TABLE `form` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla migration
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;

INSERT INTO `migration` (`version`, `apply_time`)
VALUES
	('m000000_000000_base',1461874601),
	('m130524_201442_init',1461874607),
	('m160428_201138_initial',1461874607),
	('m160428_201354_user',1461874607);

/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla project
# ------------------------------------------------------------

DROP TABLE IF EXISTS `project`;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;

INSERT INTO `project` (`id`, `name`, `company_id`, `user_id`, `consultant_id`, `status`, `created_at`, `updated_at`)
VALUES
	(2,'Proyecto 1',1,2,11,1,'2016-05-02 20:37:04','2016-05-17 17:15:36');

/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla project_form
# ------------------------------------------------------------

DROP TABLE IF EXISTS `project_form`;

CREATE TABLE `project_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `form_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `project_form` WRITE;
/*!40000 ALTER TABLE `project_form` DISABLE KEYS */;

INSERT INTO `project_form` (`id`, `project_id`, `form_id`)
VALUES
	(1,NULL,1),
	(2,NULL,2),
	(3,NULL,1),
	(4,NULL,2),
	(5,NULL,3),
	(6,NULL,4),
	(7,NULL,5),
	(8,NULL,6),
	(9,NULL,1),
	(10,NULL,2),
	(11,NULL,3),
	(12,NULL,4),
	(13,NULL,5),
	(14,NULL,6),
	(15,NULL,1),
	(16,NULL,2),
	(17,NULL,3),
	(18,NULL,4),
	(19,NULL,5),
	(20,NULL,6),
	(21,2,1),
	(22,2,2),
	(23,2,3),
	(24,2,4),
	(25,2,5),
	(26,2,6);

/*!40000 ALTER TABLE `project_form` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla project_round_observation
# ------------------------------------------------------------

DROP TABLE IF EXISTS `project_round_observation`;

CREATE TABLE `project_round_observation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `subsidiary_id` int(11) DEFAULT NULL,
  `round_id` int(11) DEFAULT NULL,
  `value` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `project_round_observation` WRITE;
/*!40000 ALTER TABLE `project_round_observation` DISABLE KEYS */;

INSERT INTO `project_round_observation` (`id`, `project_id`, `subsidiary_id`, `round_id`, `value`, `created_at`, `updated_at`)
VALUES
	(1,2,1,52,'asdd asdasdasd asdd d d asd asd asd',NULL,NULL);

/*!40000 ALTER TABLE `project_round_observation` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla project_subsidiary
# ------------------------------------------------------------

DROP TABLE IF EXISTS `project_subsidiary`;

CREATE TABLE `project_subsidiary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) DEFAULT NULL,
  `subsidiary_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `project_subsidiary` WRITE;
/*!40000 ALTER TABLE `project_subsidiary` DISABLE KEYS */;

INSERT INTO `project_subsidiary` (`id`, `project_id`, `subsidiary_id`)
VALUES
	(1,NULL,1),
	(2,NULL,2),
	(3,NULL,1),
	(4,NULL,1),
	(5,NULL,2),
	(6,NULL,1),
	(7,NULL,2),
	(8,NULL,2),
	(9,NULL,1),
	(10,NULL,2),
	(11,NULL,1),
	(12,NULL,2),
	(13,NULL,1),
	(14,NULL,2),
	(15,NULL,1),
	(16,NULL,2),
	(17,NULL,1),
	(18,NULL,2),
	(19,NULL,1),
	(20,NULL,2),
	(21,NULL,1),
	(22,NULL,2),
	(23,NULL,1),
	(24,NULL,2),
	(25,NULL,1),
	(26,NULL,2),
	(27,NULL,1),
	(28,NULL,2),
	(29,NULL,1),
	(30,NULL,2),
	(31,NULL,1),
	(32,NULL,2),
	(33,NULL,1),
	(34,NULL,2),
	(35,NULL,1),
	(36,NULL,2),
	(37,NULL,1),
	(38,NULL,2),
	(39,NULL,1),
	(40,NULL,2),
	(41,NULL,1),
	(42,NULL,2),
	(43,NULL,1),
	(44,NULL,2),
	(45,NULL,1),
	(46,NULL,2),
	(47,NULL,1),
	(48,NULL,2),
	(49,NULL,1),
	(50,NULL,2),
	(51,NULL,1),
	(52,NULL,2),
	(53,NULL,1),
	(54,NULL,2),
	(55,NULL,1),
	(56,NULL,2),
	(57,NULL,1),
	(58,NULL,2),
	(59,NULL,1),
	(60,NULL,2),
	(61,NULL,1),
	(62,NULL,2),
	(63,NULL,1),
	(64,NULL,2),
	(65,NULL,1),
	(66,NULL,2),
	(67,NULL,1),
	(68,NULL,2),
	(69,NULL,1),
	(70,NULL,2),
	(71,2,1),
	(72,2,2);

/*!40000 ALTER TABLE `project_subsidiary` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla province
# ------------------------------------------------------------

DROP TABLE IF EXISTS `province`;

CREATE TABLE `province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `region_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `province` WRITE;
/*!40000 ALTER TABLE `province` DISABLE KEYS */;

INSERT INTO `province` (`id`, `name`, `region_id`)
VALUES
	(1,'Arica',1),
	(2,'Parinacota',1),
	(3,'Iquique',2),
	(4,'El Tamarugal',2),
	(5,'Antofagasta',3),
	(6,'El Loa',3),
	(7,'Tocopilla',3),
	(8,'Chañaral',4),
	(9,'Copiapó',4),
	(10,'Huasco',4),
	(11,'Choapa',5),
	(12,'Elqui',5),
	(13,'Limarí',5),
	(14,'Isla de Pascua',6),
	(15,'Los Andes',6),
	(16,'Petorca',6),
	(17,'Quillota',6),
	(18,'San Antonio',6),
	(19,'San Felipe de Aconcagua',6),
	(20,'Valparaiso',6),
	(21,'Chacabuco',7),
	(22,'Cordillera',7),
	(23,'Maipo',7),
	(24,'Melipilla',7),
	(25,'Santiago',7),
	(26,'Talagante',7),
	(27,'Cachapoal',8),
	(28,'Cardenal Caro',8),
	(29,'Colchagua',8),
	(30,'Cauquenes',9),
	(31,'Curicó',9),
	(32,'Linares',9),
	(33,'Talca',9),
	(34,'Arauco',10),
	(35,'Bio Bío',10),
	(36,'Concepción',10),
	(37,'Ñuble',10),
	(38,'Cautín',11),
	(39,'Malleco',11),
	(40,'Valdivia',12),
	(41,'Ranco',12),
	(42,'Chiloé',13),
	(43,'Llanquihue',13),
	(44,'Osorno',13),
	(45,'Palena',13),
	(46,'Aisén',14),
	(47,'Capitán Prat',14),
	(48,'Coihaique',14),
	(49,'General Carrera',14),
	(50,'Antártica Chilena',15),
	(51,'Magallanes',15),
	(52,'Tierra del Fuego',15),
	(53,'Última Esperanza',15);

/*!40000 ALTER TABLE `province` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla region
# ------------------------------------------------------------

DROP TABLE IF EXISTS `region`;

CREATE TABLE `region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `code` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `region` WRITE;
/*!40000 ALTER TABLE `region` DISABLE KEYS */;

INSERT INTO `region` (`id`, `name`, `code`)
VALUES
	(1,'Arica y Parinacota','XV'),
	(2,'Tarapacá','I'),
	(3,'Antofagasta','II'),
	(4,'Atacama','III'),
	(5,'Coquimbo','IV'),
	(6,'Valparaiso','V'),
	(7,'Metropolitana de Santiago','RM'),
	(8,'Libertador General Bernardo O\'Higgins','VI'),
	(9,'Maule','VII'),
	(10,'Biobío','VIII'),
	(11,'La Araucanía','IX'),
	(12,'Los Ríos','XIV'),
	(13,'Los Lagos','X'),
	(14,'Aisén del General Carlos Ibáñez del Campo','XI'),
	(15,'Magallanes y de la Antártica Chilena','XII');

/*!40000 ALTER TABLE `region` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla round
# ------------------------------------------------------------

DROP TABLE IF EXISTS `round`;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `round` WRITE;
/*!40000 ALTER TABLE `round` DISABLE KEYS */;

INSERT INTO `round` (`id`, `project_id`, `name`, `position`, `status`, `start_date`, `end_date`, `created_at`, `updated_at`)
VALUES
	(52,2,'Ronda',1,1,'2016-05-02 00:00:00','2016-05-06 00:00:00','2016-05-17 17:15:37','2016-05-17 17:15:37'),
	(53,2,'Ronda',2,NULL,'2016-05-09 00:00:00','2016-05-13 00:00:00','2016-05-17 17:15:37','2016-05-17 17:15:37');

/*!40000 ALTER TABLE `round` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla subsidiary
# ------------------------------------------------------------

DROP TABLE IF EXISTS `subsidiary`;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `subsidiary` WRITE;
/*!40000 ALTER TABLE `subsidiary` DISABLE KEYS */;

INSERT INTO `subsidiary` (`id`, `name`, `address`, `manager`, `consultant`, `description`, `company_id`, `commune_id`, `created_at`, `updated_at`)
VALUES
	(1,'Sucursal Principal','Badajoz 130','Victor Palma',NULL,'Sucursal Principal\r\nBadajoz 130',1,127,'2016-04-29 20:38:12','2016-05-16 16:07:03'),
	(2,'Sucursal Secundaria','Pocuro 3128','Juan Parra','Jose Perez','Sucursal Secundaria Sucursal Secundaria\r\nSucursal Secundaria Sucursal Secundaria',1,118,'2016-04-29 20:53:27','2016-05-16 16:08:18');

/*!40000 ALTER TABLE `subsidiary` ENABLE KEYS */;
UNLOCK TABLES;


# Volcado de tabla user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `name`, `last_name`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `type`, `gender`, `created_at`, `updated_at`, `avatar`)
VALUES
	(2,'Victor','Palma','victor','M8vinihgoiYDmce0yv3sITkj-H7x1j69','$2y$13$csfMao/K5AIckSyL0qfNue8vQ.Aw3c.S6S3P.qYpk24tYk5U4DMc6',NULL,'victor@soho.cl',10,1,NULL,1461879674,1462452441,'/frontend/web/img/avatars/2.jpg'),
	(11,'Victor (Consultor)','Palma','victor2','6rOx8YYBbnDy7o9GUB4GH899rXtfBfv3','$2y$13$F5lWJyC6YRbTlqGfmLO0kucmMkfVdfCjbUE/DT9u9cUzosmRJRE/i',NULL,'victor2@soho.cl',10,2,NULL,1462206534,1462452504,'/frontend/web/img/avatars/11.jpg');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
