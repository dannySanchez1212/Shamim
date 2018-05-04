-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 192.168.10.10    Database: shamim_crud
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.16.04.1

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
-- Table structure for table `access_list`
--

DROP TABLE IF EXISTS `access_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `access_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `route` varchar(100) DEFAULT NULL,
  `can_read` enum('YES','NO') NOT NULL DEFAULT 'NO',
  `can_update` enum('YES','NO') NOT NULL DEFAULT 'NO',
  `can_delete` enum('YES','NO') NOT NULL DEFAULT 'NO',
  `owner_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access_list`
--

LOCK TABLES `access_list` WRITE;
/*!40000 ALTER TABLE `access_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `access_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `idcard_types`
--

DROP TABLE IF EXISTS `idcard_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idcard_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) NOT NULL,
  `value` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `idcard_types`
--

LOCK TABLES `idcard_types` WRITE;
/*!40000 ALTER TABLE `idcard_types` DISABLE KEYS */;
INSERT INTO `idcard_types` VALUES (1,0,'National ID'),(2,0,'Passport'),(3,0,'Birth Cerificate'),(4,0,'Driver\'s License');
/*!40000 ALTER TABLE `idcard_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `owner_id` int(10) unsigned NOT NULL,
  `payment_id` int(10) unsigned DEFAULT NULL,
  `package_id` int(10) unsigned NOT NULL,
  `amount` decimal(13,2) NOT NULL,
  `amount_paid` decimal(13,2) DEFAULT '0.00',
  `due_date` date DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `payment_status` enum('Pending','Processing','Completed') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `address` varchar(400) DEFAULT NULL,
  `map` varchar(200) DEFAULT NULL,
  `owner_id` int(11) NOT NULL,
  `owner_user_id` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nas_types`
--

DROP TABLE IF EXISTS `nas_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nas_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Value` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nas_types`
--

LOCK TABLES `nas_types` WRITE;
/*!40000 ALTER TABLE `nas_types` DISABLE KEYS */;
INSERT INTO `nas_types` VALUES (1,'Mikrotik'),(2,'Cisco'),(3,'Chillispot'),(4,'Other');
/*!40000 ALTER TABLE `nas_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nass`
--

DROP TABLE IF EXISTS `nass`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nass` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `owner_id` int(10) unsigned NOT NULL,
  `nas_ip` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shortname` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nas_type_id` int(11) DEFAULT NULL COMMENT 'Mikrotik, Cisco, ChilliSpot, Other',
  `ports` int(11) DEFAULT NULL,
  `secret` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'secret',
  `description` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT 'RADIUS Client',
  `pool_regular` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pool_public_ip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pool_blocked` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_username` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_password` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nass`
--

LOCK TABLES `nass` WRITE;
/*!40000 ALTER TABLE `nass` DISABLE KEYS */;
/*!40000 ALTER TABLE `nass` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `owner_user_activity_logs`
--

DROP TABLE IF EXISTS `owner_user_activity_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `owner_user_activity_logs` (
  `id` int(11) NOT NULL,
  `owner_user_id` int(11) DEFAULT NULL,
  `activity` varchar(250) DEFAULT NULL,
  `log_details` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `owner_user_activity_logs`
--

LOCK TABLES `owner_user_activity_logs` WRITE;
/*!40000 ALTER TABLE `owner_user_activity_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `owner_user_activity_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `owner_users`
--

DROP TABLE IF EXISTS `owner_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `owner_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `owner_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `localtion_id` int(11) DEFAULT '0',
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_locked` tinyint(1) DEFAULT '0',
  `token` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `locked_duration` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `owner_users`
--

LOCK TABLES `owner_users` WRITE;
/*!40000 ALTER TABLE `owner_users` DISABLE KEYS */;
INSERT INTO `owner_users` VALUES (1,NULL,NULL,1,NULL,0,'andrecolbe81@gmail.com','$2y$10$AKZPZwp.8L53LDNIbPuHve2abB6dRaO7LsTo8UaCr0d/GxXkhQHa.',1,NULL,NULL,NULL,0,NULL,0);
/*!40000 ALTER TABLE `owner_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `owner_users_temp`
--

DROP TABLE IF EXISTS `owner_users_temp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `owner_users_temp` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nass_type_id` int(10) unsigned DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `token` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validated` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `owner_users_temp`
--

LOCK TABLES `owner_users_temp` WRITE;
/*!40000 ALTER TABLE `owner_users_temp` DISABLE KEYS */;
/*!40000 ALTER TABLE `owner_users_temp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `owners`
--

DROP TABLE IF EXISTS `owners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `owners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_logo` blob,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line1` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line2` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `owners`
--

LOCK TABLES `owners` WRITE;
/*!40000 ALTER TABLE `owners` DISABLE KEYS */;
INSERT INTO `owners` VALUES (1,'Administradores',NULL,'giancolbe@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,NULL,NULL,'AR@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-04-19 21:04:38','2018-04-19 21:04:38',NULL,NULL),(3,NULL,NULL,'AR@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-04-19 21:04:50','2018-04-19 21:04:50',NULL,NULL),(4,NULL,NULL,'dc@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-04-19 21:05:30','2018-04-19 21:05:30',NULL,NULL),(5,'eeeee',NULL,'eve@gmail.com','ee','ee','ee','ee','ee','ee','ee','2018-04-19 21:12:43','2018-04-19 21:12:43',NULL,NULL),(6,'aaaaaa',NULL,'AAAA@gmail.com','aaa','aaa','aa','aa','aa','aa','aa','2018-04-19 21:59:32','2018-04-19 21:59:32',NULL,NULL),(7,'iiiiii',NULL,'iii@iicom','iii','iii','iii','iii','ii','ii','iii','2018-04-19 22:00:56','2018-04-19 22:00:56',NULL,NULL),(8,'oooo',NULL,'ooo@oo.com','oo','oo','oo','oo','oo','oo','oo','2018-04-19 22:07:10','2018-04-19 22:07:10',NULL,NULL),(9,'00000','/tmp/phpKGe0n4','000@oo.com','0000','000','00','00','00','000','00','2018-04-19 22:09:27','2018-04-19 22:09:27',NULL,NULL),(10,'00000',NULL,'000@oo.com','0000','000','00','00','00','000','00','2018-04-19 22:20:28','2018-04-19 22:20:28',NULL,NULL),(11,'00000','/tmp/phpC8nbts','000@oo.com','0000','000','00','00','00','000','00','2018-04-19 22:20:51','2018-04-19 22:20:51',NULL,NULL),(12,'00000','public/98pKUtOHYyTM3QnqFqoIKSJDS6k57uJQgpdInaOu.png','000@oo.com','00','00','00','00','00','00','00','2018-04-19 22:26:35','2018-04-19 22:26:35',NULL,NULL),(13,'uuuuu','logos/wYS9HTiTE48oi1PJ9iJWZfpRotUoyHilcqa2gurH.png','uuuu@uu.com','u','uuu','uuu','uuu','uuuu','uuu','uuu','2018-04-19 22:30:05','2018-04-19 22:30:05',NULL,NULL),(14,'ooo','logos/rcMUWDV0OG5Kuj1qo2hOL5qXMeLNDTW1ndAzvjaH.png','ooo@oo.com','oo','oo','oo','oo','oo','oo','oo','2018-04-19 22:31:17','2018-04-19 22:31:17',NULL,NULL),(15,'oooo','logos/LeskfC2FufalwPwTzVbdWjaRZPQNxmgqiKFqWJ9r.png','ooo@oo.com','oo','oo','oo','oo','oo','oo','oo','2018-04-19 22:33:01','2018-04-19 22:33:01',NULL,NULL),(16,'www','logos/f6HBfrbiZjeKdgMpfALvVtDkzvE9grFmmdWlwkbK.png','ww@ss.com','ww','ww','ww','ww','ww','ww','ww','2018-04-19 22:37:40','2018-04-19 22:37:40',NULL,NULL),(17,'oooo','logos/JaRCQXZFxdUIvaehM8I1pUsGd6qfxdQqQyfFqz6y.png','ooor@oo.com','11','oo','oo','oo','oo','oo','oo','2018-04-19 22:55:20','2018-04-19 22:55:20',NULL,NULL),(18,'oooo','logos/jJsPU1vuoRkDT9XwqiXUd7h9YP6iSCEsyYWhDBay.png','ooot@oo.com','112233445','oo','oo','oo','oo','oo','oo','2018-04-19 22:57:43','2018-04-19 22:57:43',NULL,NULL),(19,'AAAAv','logos/oKF3WFXzaF34GV2glbSOE25Iymu2x94HTk6JpOgp.png','ARiv@gmail.com','11111','aaa','aa','aa','aa','aa','aaa','2018-04-19 23:04:32','2018-04-19 23:04:32',NULL,NULL),(20,'eeeee','logos/2lftZDhnDVMpByvEY4uC6Ptl7OGqcsBQI49uGZEQ.png','eveeee@gmail.com','111111111','33','33','33','33','rr','rr','2018-04-19 23:06:39','2018-04-19 23:06:39',NULL,NULL),(21,'rr','logos/yJY8Uw858ODXWHhaATnc8TSyeMtAG6USFcZTWWSZ.png','rr@rr.com','112233445','rr','rr','rr','rr','rr','rr','2018-04-19 23:08:22','2018-04-19 23:08:22',NULL,NULL),(22,'qq','logos/Y6IRsqdq61On7J6I4tq7pt3OvpGJvwvBAtc1T0d2.png','qq@qq.com','112233445','qq','qq','qq','qq','qqqq','qq','2018-04-19 23:09:23','2018-04-19 23:09:23',NULL,NULL),(23,'yyyyy','logos/68bNG1PsE5alB1Qt7P5RJfC6mHBzmVvzwqs6zxuE.png','yyy@yy.com','1122334455','yy','yy','yy','yy','yy','yy','2018-04-19 23:14:09','2018-04-19 23:14:09',NULL,NULL),(24,'1111','logos/3UtHenu1uBneuGQuifRk1DroEHCNawZaDgs67ox0.png','11@aa.com','1122334455','11','11','11','11','11','11','2018-04-19 23:16:14','2018-04-19 23:16:14',NULL,NULL),(25,'dddd','logos/LbZJzxUcMJfQc5iCYlBhXWbqAvn1Fwn2uRqqNKef.png','wdefr@ddd.com','1122334455','ddd','dd ddd','Ciudad de Mexico','Nueva Esparta','dd dd mm','11','2018-04-19 23:27:30','2018-04-19 23:27:30',NULL,NULL),(26,'fff','logos/Nswh6sE19FoB1koYTihwNVEZsvdP9LmN4L2I5rJE.png','f@ddd.com','1122334455','1','1','drd ddr','eeee','ee','4e','2018-04-19 23:37:08','2018-04-19 23:37:08',NULL,NULL),(27,'hhh','logos/M3s7LCaKyyNM4HnYuaZYabpx1L3dhw0PHmqJLHiH.png','hh@hh.com','1122334455','hh','hh','hh','hh','hh','hh','2018-04-19 23:41:17','2018-04-19 23:41:17',NULL,NULL),(28,'jjj','logos/o2meRxGamFYN2IgNVzALxFN2hXrCYxzskfNBnUzc.png','jj@jj.com','1122334455','jj','jj','jj','jj','jj','jj','2018-04-19 23:45:14','2018-04-19 23:45:14',NULL,NULL),(29,'bbb','logos/SfUDgn0szeiaBQKVIyDOQGsUjHKD7nDnPl7iB12M.png','fddd@ddd.com','1122334455','bb','bb','bb','bb','bbb','bbb','2018-04-19 23:50:40','2018-04-19 23:50:40',NULL,NULL),(30,'iii','logos/ANuQWuVq9jKK0javkfrn00ckv0sb4qU5dwBS9QCA.png','f4r5@ddd.com','1122334455','ii','ii','ii','ii','ii','ii','2018-04-19 23:52:04','2018-04-19 23:52:04',NULL,NULL),(31,'iii','logos/inqtTXFbfpghMbd6gqRLHwiZ2u3LR22j9pDstIok.png','f4rffff5@ddd.com','1122334455','ii','ii','ii','ii','ii','ii','2018-04-19 23:53:39','2018-04-19 23:53:39',NULL,NULL);
/*!40000 ALTER TABLE `owners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `packages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `owner_id` int(10) unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_group` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bw_download` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bw_upload` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `burst_bw_rate_limit` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `fup_bw_download` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `fup_bw_upload` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `bw_data_limit` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `rate` decimal(13,2) NOT NULL DEFAULT '0.00',
  `billing_period` enum('Monthly','Weekly','Daily','Hourly') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Monthly' COMMENT 'daily, weekly, monthly',
  `grace_period` tinyint(2) DEFAULT '0',
  `nas_ids` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packages`
--

LOCK TABLES `packages` WRITE;
/*!40000 ALTER TABLE `packages` DISABLE KEYS */;
INSERT INTO `packages` VALUES (1,1,'PackagesTest',NULL,NULL,NULL,'0','0','0','0',0.00,'Monthly',0,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_method`
--

DROP TABLE IF EXISTS `payment_method`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_method`
--

LOCK TABLES `payment_method` WRITE;
/*!40000 ALTER TABLE `payment_method` DISABLE KEYS */;
INSERT INTO `payment_method` VALUES (1,'Bank',NULL,NULL),(2,'Cash',NULL,NULL);
/*!40000 ALTER TABLE `payment_method` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `owner_id` int(10) unsigned NOT NULL,
  `invoice_id` int(10) unsigned NOT NULL,
  `owner_user_id` int(10) unsigned NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `amount` decimal(13,2) NOT NULL DEFAULT '0.00',
  `transaction_type` enum('Credit','Debit Adjustment','Credit Adjustment','Refund') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_ref` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recieved_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) DEFAULT NULL,
  `value` varchar(100) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,NULL,'Owner Admin',NULL),(2,NULL,'Technical Support',NULL),(3,NULL,'Customer Support',NULL),(4,NULL,'Billing Manager',NULL),(5,NULL,'Customer Service',NULL),(6,NULL,'Area Manager',NULL),(7,NULL,'Report Manager',NULL),(8,NULL,'Lineman',NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sms_log`
--

DROP TABLE IF EXISTS `sms_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sms_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `body` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `cost` decimal(2,2) DEFAULT '0.00',
  `delivery_status` enum('Sent','Pending','Failed') DEFAULT NULL,
  `sms_provider` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms_log`
--

LOCK TABLES `sms_log` WRITE;
/*!40000 ALTER TABLE `sms_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `sms_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sms_providers`
--

DROP TABLE IF EXISTS `sms_providers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sms_providers` (
  `id` int(11) NOT NULL,
  `name` int(11) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `rate_unit` smallint(4) DEFAULT '1',
  `api_url` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sms_providers`
--

LOCK TABLES `sms_providers` WRITE;
/*!40000 ALTER TABLE `sms_providers` DISABLE KEYS */;
/*!40000 ALTER TABLE `sms_providers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_configs`
--

DROP TABLE IF EXISTS `system_configs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_configs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `owner_id` int(10) unsigned NOT NULL,
  `smtp_host` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_port` int(11) DEFAULT NULL,
  `encrypt_type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_username` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_password` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_api_url` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sms_provider_id` int(11) DEFAULT NULL,
  `sms_template_mobile_verify` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_template_welcome` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_template_service_blocked` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_template_technical_issue` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_template_bill_new` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_template_bill_reminder` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_reminder_days` tinyint(2) DEFAULT NULL,
  `enable_mobile_verification` tinyint(1) DEFAULT '0',
  `enable_user_portal` tinyint(1) DEFAULT '0',
  `enable_user_signup` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_configs`
--

LOCK TABLES `system_configs` WRITE;
/*!40000 ALTER TABLE `system_configs` DISABLE KEYS */;
/*!40000 ALTER TABLE `system_configs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket_status`
--

DROP TABLE IF EXISTS `ticket_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket_status`
--

LOCK TABLES `ticket_status` WRITE;
/*!40000 ALTER TABLE `ticket_status` DISABLE KEYS */;
INSERT INTO `ticket_status` VALUES (1,'New'),(2,'Open'),(3,'Resolved'),(4,'Closed');
/*!40000 ALTER TABLE `ticket_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tickets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  `owner_id` int(10) unsigned NOT NULL,
  `ticket_status` enum('New','Open','Resolved','Closed') COLLATE utf8mb4_unicode_ci DEFAULT 'New',
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_user_id` int(11) DEFAULT NULL,
  `src_ip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tickets_user_id_foreign` (`user_id`),
  KEY `tickets_owner_id_foreign` (`owner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_activity_logs`
--

DROP TABLE IF EXISTS `user_activity_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_activity_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `atovity` varchar(250) DEFAULT NULL,
  `details` varchar(450) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_activity_logs`
--

LOCK TABLES `user_activity_logs` WRITE;
/*!40000 ALTER TABLE `user_activity_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_activity_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_auths`
--

DROP TABLE IF EXISTS `user_auths`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_auths` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(10) DEFAULT NULL,
  `value` varchar(10) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `user_id` (`user_id`,`name`,`value`)
) ENGINE=InnoDB AUTO_INCREMENT=1002 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_auths`
--

LOCK TABLES `user_auths` WRITE;
/*!40000 ALTER TABLE `user_auths` DISABLE KEYS */;
INSERT INTO `user_auths` VALUES (1000,1,'username','sayeed',NULL),(1001,1,'password','mypass',NULL);
/*!40000 ALTER TABLE `user_auths` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_balances`
--

DROP TABLE IF EXISTS `user_balances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_balances` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `owner_id` int(10) unsigned NOT NULL,
  `debit` decimal(13,2) NOT NULL DEFAULT '0.00',
  `credit` decimal(13,2) NOT NULL DEFAULT '0.00',
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_balances`
--

LOCK TABLES `user_balances` WRITE;
/*!40000 ALTER TABLE `user_balances` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_balances` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profile`
--

DROP TABLE IF EXISTS `user_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned DEFAULT NULL,
  `owner_id` int(10) unsigned NOT NULL,
  `owner_user_id` int(11) NOT NULL,
  `date_of_birth` datetime DEFAULT NULL,
  `gender` enum('Male','Female','Other') COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workphone` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobilephone` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idcard_type_id` int(11) DEFAULT NULL,
  `idcard_no` int(11) NOT NULL,
  `idcard_issued_by` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profile`
--

LOCK TABLES `user_profile` WRITE;
/*!40000 ALTER TABLE `user_profile` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_types`
--

DROP TABLE IF EXISTS `user_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_types`
--

LOCK TABLES `user_types` WRITE;
/*!40000 ALTER TABLE `user_types` DISABLE KEYS */;
INSERT INTO `user_types` VALUES (1,'PPPoE'),(2,'Hotspot'),(3,'Public IP');
/*!40000 ALTER TABLE `user_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_uploads`
--

DROP TABLE IF EXISTS `user_uploads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `upload_path` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_uploads`
--

LOCK TABLES `user_uploads` WRITE;
/*!40000 ALTER TABLE `user_uploads` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_uploads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `owner_id` int(10) unsigned NOT NULL,
  `owner_user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `map` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activation_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` enum('New','Activated','Disabled','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'New',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,1,1,1,1,'Owner Admin','andrecolbe81@gmail.com','$2y$10$6/V7bJFR4Hm/4XCHf/bbeO2sWHExfRFLYXgJQhi6DoZq2OpKxLb2K',NULL,NULL,'qFlLpTGjH462YPRZCn84ZW9qBIYBdet1hKQB5rbhD6YbffZb8JkCq6PNHViZ',NULL,NULL,NULL,NULL,'New');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_online`
--

DROP TABLE IF EXISTS `users_online`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `data_in` int(11) DEFAULT NULL,
  `data_out` int(11) DEFAULT NULL,
  `started_at` timestamp NULL DEFAULT NULL,
  `stopped_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_online`
--

LOCK TABLES `users_online` WRITE;
/*!40000 ALTER TABLE `users_online` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_online` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_temp`
--

DROP TABLE IF EXISTS `users_temp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_temp` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `owner_id` int(10) unsigned NOT NULL,
  `owner_user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `map` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activation_date` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` enum('New','Activated','Disabled','Deleted') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'New',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_temp`
--

LOCK TABLES `users_temp` WRITE;
/*!40000 ALTER TABLE `users_temp` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_temp` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-20 17:52:47
