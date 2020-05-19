-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: localhost    Database: dewlers
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ctl_users`
--

LOCK TABLES `ctl_users` WRITE;
/*!40000 ALTER TABLE `ctl_users` DISABLE KEYS */;
INSERT INTO `ctl_users` VALUES (1,'Jose Anzora','$2y$10$OZMby3R.S9cImcJ/TD47legCxFt7OpTXtZYhvbvUPVtpw0FEJjAJq','this is a test salt',1,NULL,NULL,'test appkey','burned code',1,1,1,1,1),(2,'Diego Gonzales','$2y$10$pUdgOwF57ruGGkTUkcKEqeYysABmUG9tsjrklNyn5n.rvhkY3Fez.','this is a test salt',1,NULL,NULL,'test appkey','burned code',1,1,1,1,1),(3,'Marvin Vigil','$2y$10$5YYNwNUSAEIk0gUDdycikODk3.ZeNcg4Jaypxo.SaU5rpyy4KtyLe','this is a test salt',1,NULL,NULL,'test appkey','burned code',1,1,1,1,1),(4,'Sandy Flores','$2y$10$7aJztKH2Ii9p3FbMvLdKwOIFdPLzeTdwFKkmeQTqlsg0kuCjhimau','this is a test salt',1,NULL,NULL,'test appkey','burned code',1,1,1,1,1);
/*!40000 ALTER TABLE `ctl_users` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `duels`
--

LOCK TABLES `duels` WRITE;
/*!40000 ALTER TABLE `duels` DISABLE KEYS */;
INSERT INTO `duels` VALUES (1,'New duel',1,2,3,NULL,NULL,'2020-01-31','2020-02-10','this is a test file',1,NULL,1,15.00),(2,'Test 2',1,3,4,NULL,NULL,'2020-01-31','2020-02-10','this is a test file',1,NULL,1,50.00),(3,'Test 3',1,4,3,'2020-02-10','2020-02-10','2020-01-31','2020-02-10','this is a test file',1,NULL,1,60.00),(4,'example',1,2,3,'2020-01-31','2020-02-10','2020-01-31','2020-02-10','this is a test file',1,NULL,1,20.00),(5,'example 3',1,2,4,'2020-01-31','2020-02-10','2020-01-31','2020-02-10','this is a test file',1,NULL,1,25.00),(6,'PALDINS DUEL',3,2,1,'2020-01-31','2020-02-10','2020-01-31','2020-02-10','this is a test file',1,NULL,1,60.00);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `duelstatuses`
--

LOCK TABLES `duelstatuses` WRITE;
/*!40000 ALTER TABLE `duelstatuses` DISABLE KEYS */;
INSERT INTO `duelstatuses` VALUES (1,'On go','2020-01-15','2020-01-15');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `internalaccounts`
--

LOCK TABLES `internalaccounts` WRITE;
/*!40000 ALTER TABLE `internalaccounts` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_01_31_170905_add_column_pot',2);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persons`
--

LOCK TABLES `persons` WRITE;
/*!40000 ALTER TABLE `persons` DISABLE KEYS */;
INSERT INTO `persons` VALUES (1,'Jose Anzora','Jose Anzora','jose@mvagency.co','2002-01-30','2020-02-03','2020-02-03','123456789',1),(2,'Diego Gonzales','Diego Gonzales','diego@mvagency.co','2002-01-30','2020-02-03','2020-02-03','123456789',2),(3,'Marvin Vigil','Marvin Vigil','marvin@mvagency.co','2002-01-30','2020-02-03','2020-02-03','123456789',3),(4,'Sandy Flores','Sandy Flores','sandy@mvagency.co','2002-01-30','2020-02-03','2020-02-03','123456789',4);
/*!40000 ALTER TABLE `persons` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Jose Anzora','jose@mvagency.co',NULL,'$2y$10$7JBL1gW4.MgUUZQrgw70mODxa5UavI4UsRJU0oTE6Yy39PKTJPpMu',NULL,'2020-02-03 21:55:07','2020-02-03 21:55:07'),(2,'Diego Gonzales','diego@mvagency.co',NULL,'$2y$10$uTbJ4mTJeBmBR3ym.XdPs.T2yB9zLsxJh6x/f.RFSMwufQ0rcyb2u',NULL,'2020-02-03 21:58:17','2020-02-03 21:58:17'),(3,'Marvin Vigil','marvin@mvagency.co',NULL,'$2y$10$Dn87Zw/uGlXdAQQSNEybtueEnTQBTTWjdi9AXcENojf1/s.xn8o8i',NULL,'2020-02-03 21:59:28','2020-02-03 21:59:28'),(4,'Sandy Flores','sandy@mvagency.co',NULL,'$2y$10$4Rfpu5vLrBGqZVUgI9/Ps.iR8OtX8gnmrjcFesAZWWZPqAXuhotHu',NULL,'2020-02-03 22:00:14','2020-02-03 22:00:14');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'dewlers'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-27 12:25:09
