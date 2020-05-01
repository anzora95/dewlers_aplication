-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: dewlers_app
-- ------------------------------------------------------
-- Server version	5.7.24

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
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `registerDate` date NOT NULL,
  `modificationDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'El Salvador','0','2020-01-28','2020-01-28');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ctl_rol_users`
--

DROP TABLE IF EXISTS `ctl_rol_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ctl_rol_users` (
  `ctl_rol_id` int(11) NOT NULL,
  `ctl_user_id` int(11) NOT NULL,
  KEY `ctl_rol_id` (`ctl_rol_id`),
  KEY `ctl_ser_id` (`ctl_user_id`),
  CONSTRAINT `ctl_rol_users_ctl_rols_FK` FOREIGN KEY (`ctl_rol_id`) REFERENCES `ctl_rols` (`id`),
  CONSTRAINT `ctl_rol_users_ctl_users_FK` FOREIGN KEY (`ctl_user_id`) REFERENCES `ctl_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ctl_rol_users`
--

LOCK TABLES `ctl_rol_users` WRITE;
/*!40000 ALTER TABLE `ctl_rol_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `ctl_rol_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ctl_rols`
--

DROP TABLE IF EXISTS `ctl_rols`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ctl_rols` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(555) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ctl_rols`
--

LOCK TABLES `ctl_rols` WRITE;
/*!40000 ALTER TABLE `ctl_rols` DISABLE KEYS */;
/*!40000 ALTER TABLE `ctl_rols` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ctl_users`
--

DROP TABLE IF EXISTS `ctl_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ctl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `registerDate` date DEFAULT NULL,
  `modificationDate` date DEFAULT NULL,
  `appKey` varchar(250) NOT NULL,
  `code` varchar(45) NOT NULL,
  `rankingStatus` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `ranking_id` int(11) NOT NULL,
  `registerType_id` int(11) NOT NULL,
  `historyStatus` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `state_id` (`state_id`),
  KEY `ranking_id` (`ranking_id`),
  KEY `registerType_id` (`registerType_id`),
  CONSTRAINT `ctl_users_rankings_FK` FOREIGN KEY (`ranking_id`) REFERENCES `rankings` (`id`),
  CONSTRAINT `ctl_users_registertypes_FK` FOREIGN KEY (`registerType_id`) REFERENCES `registertypes` (`id`),
  CONSTRAINT `ctl_users_states_FK` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ctl_users`
--

LOCK TABLES `ctl_users` WRITE;
/*!40000 ALTER TABLE `ctl_users` DISABLE KEYS */;
INSERT INTO `ctl_users` VALUES (1,'Jose Anzora','$2y$10$qazPhtKxDR9Fz.j53UaKR./zBd6bLhvuyC7TwtXsoca16ma0DDheG','this is a test salt',1,NULL,NULL,'test appkey','burned code',1,1,1,1,1),(2,'Diego Gonzales','$2y$10$hGMhzKXKADUp98TzQy7qoOSTv3J.ViT0vdE6lPG1afVflfKhRd5ne','this is a test salt',1,NULL,NULL,'test appkey','burned code',1,1,1,1,1),(3,'Ariel Zelaya','$2y$10$MUC7PH3/EuFMc11K7201ZuOUp/A0aaKfOU0q4uTSxnHNO7O4hy/lW','this is a test salt',1,NULL,NULL,'test appkey','burned code',1,1,1,1,1),(4,'Marvin Vigil','$2y$10$dIgZBDiTMlohRg0YxNQORey4iROckhgX2B42lAKDuT6lvVFT6OIuC','this is a test salt',1,NULL,NULL,'test appkey','burned code',1,1,1,1,1),(5,'Alex Menendez','$2y$10$L9iEngF3hK0cAjYLctZz7uUQaLSPDbNN/pwvxEQVG5tkLdV6ROANK','this is a test salt',1,NULL,NULL,'test appkey','burned code',1,1,1,1,1),(6,'Katya','$2y$10$melDKY/zjQbj/GR1SOc/quRVK6ERBp2foFtqVrLWjGexWMcw1PGnm','this is a test salt',1,NULL,NULL,'test appkey','burned code',1,1,1,1,1);
/*!40000 ALTER TABLE `ctl_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `double_or_nothing`
--

DROP TABLE IF EXISTS `double_or_nothing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `double_or_nothing` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `duel_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `loser_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `double_or_nothing_duel_id_foreign` (`duel_id`),
  CONSTRAINT `double_or_nothing_duel_id_foreign` FOREIGN KEY (`duel_id`) REFERENCES `duels` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `double_or_nothing`
--

LOCK TABLES `double_or_nothing` WRITE;
/*!40000 ALTER TABLE `double_or_nothing` DISABLE KEYS */;
INSERT INTO `double_or_nothing` VALUES (1,1,1,'3');
/*!40000 ALTER TABLE `double_or_nothing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `duels`
--

DROP TABLE IF EXISTS `duels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `duels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tittle` varchar(100) NOT NULL,
  `ctl_user_id_challenger` int(11) NOT NULL,
  `ctl_user_id_challenged` int(11) NOT NULL,
  `ctl_user_id_witness` int(11) NOT NULL,
  `registerDate` date DEFAULT NULL,
  `modificationDate` date DEFAULT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `testFile` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `ctl_user_id_winner` int(11) DEFAULT NULL,
  `duelstate` int(11) NOT NULL,
  `pot` double(8,2) NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `duelstate` (`duelstate`),
  KEY `ctl_user_id_winner` (`ctl_user_id_winner`),
  KEY `ctl_user_id_witness` (`ctl_user_id_witness`),
  KEY `ctl_user_id_challenged` (`ctl_user_id_challenged`),
  KEY `ctl_user_id_challenger` (`ctl_user_id_challenger`),
  CONSTRAINT `duels_ctl_users_FK` FOREIGN KEY (`ctl_user_id_challenger`) REFERENCES `ctl_users` (`id`),
  CONSTRAINT `duels_ctl_users_FK_1` FOREIGN KEY (`ctl_user_id_challenged`) REFERENCES `ctl_users` (`id`),
  CONSTRAINT `duels_ctl_users_FK_2` FOREIGN KEY (`ctl_user_id_witness`) REFERENCES `ctl_users` (`id`),
  CONSTRAINT `duels_ctl_users_FK_3` FOREIGN KEY (`ctl_user_id_winner`) REFERENCES `ctl_users` (`id`),
  CONSTRAINT `duels_duelstatuses_FK` FOREIGN KEY (`duelstate`) REFERENCES `duelstatuses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `duels`
--

LOCK TABLES `duels` WRITE;
/*!40000 ALTER TABLE `duels` DISABLE KEYS */;
INSERT INTO `duels` VALUES (1,'Best pokemon masters',1,3,2,'2020-01-31','2020-02-10','2020-01-31','2020-02-10','this is a test file',0,1,4,50.00,NULL);
/*!40000 ALTER TABLE `duels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `duelstatuses`
--

DROP TABLE IF EXISTS `duelstatuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `duelstatuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(250) NOT NULL,
  `registerDate` date NOT NULL,
  `modificationDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `duelstatuses`
--

LOCK TABLES `duelstatuses` WRITE;
/*!40000 ALTER TABLE `duelstatuses` DISABLE KEYS */;
INSERT INTO `duelstatuses` VALUES (1,'Requested','2020-01-15','2020-01-15'),(2,'Acepted','2020-02-06','2020-02-06'),(3,'Initiated','2020-02-07','2020-02-07'),(4,'Finished','2020-02-07','2020-02-07'),(5,'Double or nothing','2020-02-07','2020-02-07');
/*!40000 ALTER TABLE `duelstatuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gameaccountbalances`
--

DROP TABLE IF EXISTS `gameaccountbalances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gameaccountbalances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movementDate` date NOT NULL,
  `movementAmount` float NOT NULL,
  `status` int(11) NOT NULL,
  `internalAccount_id` int(11) NOT NULL,
  `duel_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `duel_id` (`duel_id`),
  KEY `internalAccount_id` (`internalAccount_id`),
  CONSTRAINT `gameAccountBalances_duels_FK` FOREIGN KEY (`duel_id`) REFERENCES `duels` (`id`),
  CONSTRAINT `gameAccountBalances_internalAccounts_FK` FOREIGN KEY (`internalAccount_id`) REFERENCES `internalaccounts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gameaccountbalances`
--

LOCK TABLES `gameaccountbalances` WRITE;
/*!40000 ALTER TABLE `gameaccountbalances` DISABLE KEYS */;
/*!40000 ALTER TABLE `gameaccountbalances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `internalaccountmovements`
--

DROP TABLE IF EXISTS `internalaccountmovements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `internalaccountmovements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registerDate` date NOT NULL,
  `systemRegisterDate` date NOT NULL,
  `amount` float NOT NULL,
  `inPayment` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `internalAccount_id` int(11) NOT NULL,
  `movementType` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `internalAccount_id` (`internalAccount_id`),
  KEY `movementType` (`movementType`),
  CONSTRAINT `internalAccountMovements_internalAccounts_FK` FOREIGN KEY (`internalAccount_id`) REFERENCES `internalaccounts` (`id`),
  CONSTRAINT `internalAccountMovements_movementTypes_FK` FOREIGN KEY (`movementType`) REFERENCES `movementtypes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `internalaccountmovements`
--

LOCK TABLES `internalaccountmovements` WRITE;
/*!40000 ALTER TABLE `internalaccountmovements` DISABLE KEYS */;
/*!40000 ALTER TABLE `internalaccountmovements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `internalaccounts`
--

DROP TABLE IF EXISTS `internalaccounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `internalaccounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `registerDate` date NOT NULL,
  `modificationDate` date NOT NULL,
  `balance` float NOT NULL,
  `status` int(11) NOT NULL,
  `ctl_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ctl_user` (`ctl_user_id`),
  CONSTRAINT `internalAccounts_ctl_users_FK` FOREIGN KEY (`ctl_user_id`) REFERENCES `ctl_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `internalaccounts`
--

LOCK TABLES `internalaccounts` WRITE;
/*!40000 ALTER TABLE `internalaccounts` DISABLE KEYS */;
INSERT INTO `internalaccounts` VALUES (1,'1','2020-02-06','2020-02-06',1242.5,1,1),(2,'1','2020-02-06','2020-02-06',1202.5,1,2),(3,'1','2020-02-06','2020-02-06',1150,1,3),(4,'1','2020-02-06','2020-02-06',1200,1,4),(5,'1','2020-02-06','2020-02-06',1200,1,5),(6,'1','2020-02-06','2020-02-06',1200,1,6);
/*!40000 ALTER TABLE `internalaccounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_01_31_170905_add_column_pot',2),(5,'2020_03_13_161337_add_description_to_duels_table',3),(6,'2020_04_15_222519_create_ratings_table',4),(7,'2020_04_16_145703_create_posts_table',5),(8,'2020_04_17_160606_create_double_or_nothing_table',6),(9,'2020_04_17_173019_add_column_foreing_key_to_double_or_nothing_table',7),(10,'2020_04_20_164334_add_column_loser_id_to_double_or_nothing',8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movementtypes`
--

DROP TABLE IF EXISTS `movementtypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movementtypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `registerDate` date NOT NULL,
  `modificationDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movementtypes`
--

LOCK TABLES `movementtypes` WRITE;
/*!40000 ALTER TABLE `movementtypes` DISABLE KEYS */;
/*!40000 ALTER TABLE `movementtypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('ariel@mvagency.co','$2y$10$hAvzcTcggDeYG5JgUfXi0.uzLuurrh14qSMFRV3mquYOcRUGUsrj6','2020-01-31 03:34:16');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persons`
--

DROP TABLE IF EXISTS `persons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(80) NOT NULL,
  `birthDate` date NOT NULL,
  `registerDate` date NOT NULL,
  `modificationDate` date NOT NULL,
  `photography` varchar(250) NOT NULL,
  `ctl_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ctl_user_id` (`ctl_user_id`),
  CONSTRAINT `persons_ctl_users_FK` FOREIGN KEY (`ctl_user_id`) REFERENCES `ctl_users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persons`
--

LOCK TABLES `persons` WRITE;
/*!40000 ALTER TABLE `persons` DISABLE KEYS */;
INSERT INTO `persons` VALUES (1,'Jose Anzora','Jose Anzora','jose@mvagency.co','2002-01-30','2020-02-06','2020-02-06','123456789',1),(2,'Diego Gonzales','Diego Gonzales','diego@mvganeyc.co','2002-01-30','2020-02-06','2020-02-06','123456789',2),(3,'Ariel Zelaya','Ariel Zelaya','ariel@mvagency.co','2002-01-30','2020-02-06','2020-02-06','123456789',3),(4,'Marvin Vigil','Marvin Vigil','marvin@mvagency.co','2002-01-30','2020-02-06','2020-02-06','123456789',4),(5,'Alex Menendez','Alex Menendez','alex@mvagency.co','2002-01-30','2020-02-06','2020-02-06','123456789',5),(6,'Katya','Katya','katya@mvagency.co','2002-01-30','2020-02-06','2020-02-06','123456789',6);
/*!40000 ALTER TABLE `persons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'Jose',NULL,NULL),(2,'Betty',NULL,NULL);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rankings`
--

DROP TABLE IF EXISTS `rankings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rankings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rankings`
--

LOCK TABLES `rankings` WRITE;
/*!40000 ALTER TABLE `rankings` DISABLE KEYS */;
INSERT INTO `rankings` VALUES (1,'Lorem ranking',1);
/*!40000 ALTER TABLE `rankings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ratings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `rateable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rateable_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ratings_rateable_type_rateable_id_index` (`rateable_type`,`rateable_id`),
  KEY `ratings_rateable_id_index` (`rateable_id`),
  KEY `ratings_rateable_type_index` (`rateable_type`),
  KEY `ratings_user_id_foreign` (`user_id`),
  CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratings`
--

LOCK TABLES `ratings` WRITE;
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
INSERT INTO `ratings` VALUES (16,'2020-04-17 05:09:03','2020-04-17 05:09:03',4,'App\\Post',1,2),(17,'2020-04-17 05:09:10','2020-04-17 05:09:10',5,'App\\Post',1,2),(18,'2020-04-25 04:15:30','2020-04-25 04:15:30',3,'App\\Post',1,3),(19,'2020-04-25 07:08:31','2020-04-25 07:08:31',3,'App\\Post',2,1);
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registertypes`
--

DROP TABLE IF EXISTS `registertypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registertypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registertypes`
--

LOCK TABLES `registertypes` WRITE;
/*!40000 ALTER TABLE `registertypes` DISABLE KEYS */;
INSERT INTO `registertypes` VALUES (1,'Recomended',1);
/*!40000 ALTER TABLE `registertypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sentpayments`
--

DROP TABLE IF EXISTS `sentpayments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sentpayments` (
  `id` int(11) NOT NULL,
  `description` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `registerDate` date NOT NULL,
  `billingDate` date NOT NULL,
  `sentPaymentStatus_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `duel_id` int(11) NOT NULL,
  KEY `sentPaymentStatus_id` (`sentPaymentStatus_id`),
  KEY `duel_id` (`duel_id`),
  CONSTRAINT `sentpayments_duels_FK` FOREIGN KEY (`duel_id`) REFERENCES `duels` (`id`),
  CONSTRAINT `sentpayments_sentpaymentstatuses_FK` FOREIGN KEY (`sentPaymentStatus_id`) REFERENCES `sentpaymentstatuses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sentpayments`
--

LOCK TABLES `sentpayments` WRITE;
/*!40000 ALTER TABLE `sentpayments` DISABLE KEYS */;
/*!40000 ALTER TABLE `sentpayments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sentpaymentstatuses`
--

DROP TABLE IF EXISTS `sentpaymentstatuses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sentpaymentstatuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sentpaymentstatuses`
--

LOCK TABLES `sentpaymentstatuses` WRITE;
/*!40000 ALTER TABLE `sentpaymentstatuses` DISABLE KEYS */;
/*!40000 ALTER TABLE `sentpaymentstatuses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `registerDate` date NOT NULL,
  `modificationDate` date NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`),
  CONSTRAINT `states_countries_FK` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES (1,'San Salvador',0,'2020-01-28','2020-01-28',1);
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stripeaccounts`
--

DROP TABLE IF EXISTS `stripeaccounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stripeaccounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cardNumber` varchar(250) NOT NULL,
  `expirationDate` date NOT NULL,
  `token` varchar(250) NOT NULL,
  `activationStatus` int(11) NOT NULL,
  `activationDate` date NOT NULL,
  `internalAccount_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `internalAccount_id` (`internalAccount_id`),
  CONSTRAINT `stripeaccounts_internalAccounts_FK` FOREIGN KEY (`internalAccount_id`) REFERENCES `internalaccounts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stripeaccounts`
--

LOCK TABLES `stripeaccounts` WRITE;
/*!40000 ALTER TABLE `stripeaccounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `stripeaccounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stripemovementaccounts`
--

DROP TABLE IF EXISTS `stripemovementaccounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stripemovementaccounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registerDate` date NOT NULL,
  `amount` float NOT NULL,
  `inPayment` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `stripeAccount` int(11) NOT NULL,
  `movementType` int(11) NOT NULL,
  `systemregisterDate` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `movementType` (`movementType`),
  KEY `stripeAccount` (`stripeAccount`),
  CONSTRAINT `stripemovementaccounts_movementTypes_FK` FOREIGN KEY (`movementType`) REFERENCES `movementtypes` (`id`),
  CONSTRAINT `stripemovementaccounts_stripeaccounts_FK` FOREIGN KEY (`stripeAccount`) REFERENCES `stripeaccounts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stripemovementaccounts`
--

LOCK TABLES `stripemovementaccounts` WRITE;
/*!40000 ALTER TABLE `stripemovementaccounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `stripemovementaccounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `systeminternalaccounts`
--

DROP TABLE IF EXISTS `systeminternalaccounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `systeminternalaccounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(250) NOT NULL,
  `accountNumber` varchar(250) NOT NULL,
  `cardNumber` varchar(250) NOT NULL,
  `expireDate` date NOT NULL,
  `activationDate` date NOT NULL,
  `activationStatus` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systeminternalaccounts`
--

LOCK TABLES `systeminternalaccounts` WRITE;
/*!40000 ALTER TABLE `systeminternalaccounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `systeminternalaccounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Jose Anzora','jose@mvagency.co',NULL,'$2y$10$xXXF8Rm3NufHXPggX9/BB.z/OSM9vUIwRGAZDoHCnlK.KiLd6X5Ym',NULL,'2020-02-07 02:17:33','2020-02-07 02:17:33'),(2,'Diego Gonzales','diego@mvagency.co',NULL,'$2y$10$gqB7F.ZaCcyzEWXld89GLOo4O/51N6uzjH8H6R0LvTVUMD5mbKCS.',NULL,'2020-02-07 02:33:51','2020-02-07 02:33:51'),(3,'Ariel Zelaya','ariel@mvagency.co',NULL,'$2y$10$H8zwKSbaW4NyYtJ90goXnODFEpIk4o1HX.3LE07pPamXff1VP8eWW',NULL,'2020-02-07 02:34:43','2020-02-07 02:34:43'),(4,'Marvin Vigil','marvin@mvagency.co',NULL,'$2y$10$lMZKwxo0YOYxrrvDoEgLwut6WUfBPrcvf3BcSkjCfD.gm0uNSjXYa',NULL,'2020-02-07 02:35:18','2020-02-07 02:35:18'),(5,'Alex Menendez','alex@mvagency.co',NULL,'$2y$10$UdvJH3qRn1wn5hYkzDvrfO15f0FUt4HVT2rIDMyzLpyiCkH4sSQkC',NULL,'2020-02-07 02:35:48','2020-02-07 02:35:48'),(6,'Katya','katya@mvagency.co',NULL,'$2y$10$lLhpe4hrVbUahVljvGg7Uu9zQ40.ekmEHVDmubHDzVVW72l98PpCi',NULL,'2020-02-07 04:19:20','2020-02-07 04:19:20');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'dewlers_app'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-27 16:14:34
