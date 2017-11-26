CREATE DATABASE  IF NOT EXISTS `lignio_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `lignio_db`;
-- MySQL dump 10.13  Distrib 5.7.13, for linux-glibc2.5 (x86_64)
--
-- Host: localhost    Database: lignio_db
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
-- Table structure for table `booking_details`
--

DROP TABLE IF EXISTS `booking_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `booking_details` (
  `booking_detail_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `diagnostic_test_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `assigned_to` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`booking_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking_details`
--

LOCK TABLES `booking_details` WRITE;
/*!40000 ALTER TABLE `booking_details` DISABLE KEYS */;
INSERT INTO `booking_details` VALUES (1,2,1,2,1,'2017-10-20 00:31:56','2017-10-20 00:31:56',1),(2,2,3,1,0,'2017-10-20 00:31:56','2017-10-20 00:31:56',1),(3,3,1,1,0,'2017-10-20 00:33:35','2017-10-20 00:33:35',1),(4,3,3,1,0,'2017-10-20 00:33:35','2017-10-20 00:33:35',1),(5,4,4,1,0,'2017-10-22 11:25:07','2017-10-22 11:25:07',1),(6,5,1,2,1,'2017-11-04 12:13:38','2017-11-04 12:13:38',1),(7,5,3,2,1,'2017-11-04 12:13:38','2017-11-04 12:13:38',1),(8,5,4,2,1,'2017-11-04 12:13:38','2017-11-04 12:13:38',1),(9,6,1,1,0,'2017-11-11 18:59:36','2017-11-11 18:59:36',1),(10,6,3,1,0,'2017-11-11 18:59:36','2017-11-11 18:59:36',1);
/*!40000 ALTER TABLE `booking_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `end_user_id` int(11) DEFAULT NULL,
  `diagnostic_lab_id` int(11) DEFAULT NULL,
  `booking_creator_id` int(11) NOT NULL,
  `booking_type` varchar(7) DEFAULT NULL,
  `paid_amount` int(11) NOT NULL,
  `expected_report_delivery_date` datetime DEFAULT NULL,
  `actual_report_delivery_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_active` int(11) DEFAULT '1',
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (2,2,1,1,'Offline',0,NULL,NULL,1,'2017-10-20 00:31:56','2017-10-20 00:31:56',1),(3,3,1,1,'Offline',0,NULL,NULL,1,'2017-10-20 00:33:35','2017-10-20 00:33:35',1),(4,4,1,1,'Offline',0,NULL,NULL,1,'2017-10-22 11:25:07','2017-10-22 11:25:07',1),(5,1,1,1,'Offline',0,NULL,NULL,1,'2017-11-04 12:13:38','2017-11-04 12:13:38',1),(6,2,1,1,'Offline',200,NULL,NULL,1,'2017-11-11 18:59:36','2017-11-11 18:59:36',1);
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diagnostic_tests`
--

DROP TABLE IF EXISTS `diagnostic_tests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diagnostic_tests` (
  `diagnostic_test_id` int(11) NOT NULL AUTO_INCREMENT,
  `diagnostic_lab_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `specimen` varchar(45) DEFAULT NULL,
  `method` varchar(45) DEFAULT NULL,
  `cost` varchar(45) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`diagnostic_test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diagnostic_tests`
--

LOCK TABLES `diagnostic_tests` WRITE;
/*!40000 ALTER TABLE `diagnostic_tests` DISABLE KEYS */;
INSERT INTO `diagnostic_tests` VALUES (1,1,'Absolute Basophil Count','3 mL. Blood',NULL,'100',1,'2017-10-02 12:08:04','2017-10-02 12:08:04'),(3,1,'Absolute Lymphocyte Count','3 mL. Blood',NULL,'300',1,'2017-10-02 12:24:26','2017-10-02 12:24:26'),(4,1,'Sugar Fasting','3 mL. Blood','','250',1,'2017-10-19 17:12:00','2017-10-19 17:12:00'),(6,2,'Absolute Granulocyte Count','3 mL. Blood',NULL,'250',1,'2017-10-02 12:09:10','2017-10-02 12:09:10');
/*!40000 ALTER TABLE `diagnostic_tests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `end_users`
--

DROP TABLE IF EXISTS `end_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `end_users` (
  `end_user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) DEFAULT NULL,
  `middlename` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) NOT NULL,
  `password` varchar(60) NOT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `pincode` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_first_login` char(1) DEFAULT 'Y',
  `is_active` int(11) DEFAULT '1',
  PRIMARY KEY (`end_user_id`),
  UNIQUE KEY `phone_UNIQUE` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `end_users`
--

LOCK TABLES `end_users` WRITE;
/*!40000 ALTER TABLE `end_users` DISABLE KEYS */;
INSERT INTO `end_users` VALUES (1,'Arya',NULL,'Murari',NULL,'8961112533','',NULL,NULL,NULL,NULL,NULL,'2017-11-04 12:13:38','2017-11-04 12:13:38','Y',1),(2,'Sourav',NULL,'Basu',NULL,'9674503228','',NULL,NULL,NULL,NULL,NULL,'2017-11-11 18:59:36','2017-11-11 18:59:36','Y',1);
/*!40000 ALTER TABLE `end_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `input_types`
--

DROP TABLE IF EXISTS `input_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `input_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `input_types`
--

LOCK TABLES `input_types` WRITE;
/*!40000 ALTER TABLE `input_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `input_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jwt`
--

DROP TABLE IF EXISTS `jwt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jwt` (
  `token` longtext NOT NULL,
  `expiry` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jwt`
--

LOCK TABLES `jwt` WRITE;
/*!40000 ALTER TABLE `jwt` DISABLE KEYS */;
INSERT INTO `jwt` VALUES ('YmJEODloZWtGYVdXVG1Qa3U1c3hZNE9IalEwcUcySTViRnRaMEhHR2EvbVAxQkM2QzhxT1QxbVBRcGFaQkk4UVRhdGhVd3NlaHJkbTIrWmNaTmdKQy8xbTJOSXpBU1RzTG93RzRkdzd3NjMzbCtQNklTbVU0bXlWZFRXbW16aHJoVHRReTRhbkpRRTRkRnprcjBPSmJVeThhRDdTbzgvSFpRWUZ4ckRBWWdFPQ==',1507947592208),('YmJEODloZWtGYVdXVG1Qa3U1c3hZNE9IalEwcUcySTViRnRaMEhHR2EvbVAxQkM2QzhxT1QxbVBRcGFaQkk4UVRhdGhVd3NlaHJkbTIrWmNaTmdKQy8xbTJOSXpBU1RzTG93RzRkdzd3NjBIOENJVmhhUWR5QzhBQVlPaWQvcjFEbjZxT3k5Y1Zja1REUGJ3SmNDNXRmUDlnL1RNNVY0TEREK2NXUE9MNWxVPQ==',1507951542979),('YmJEODloZWtGYVdXVG1Qa3U1c3hZNE9IalEwcUcySTViRnRaMEhHR2EvbVAxQkM2QzhxT1QxbVBRcGFaQkk4UVRhdGhVd3NlaHJkbTIrWmNaTmdKQy8xbTJOSXpBU1RzTG93RzRkdzd3NjBveEdEWTV4dFROdWhxTk1YWk51aDVWR3J5WG85LzRGVnZVR3gxcWN5TjZwR3NlQ2FxeVlpNkJTWHA2aHVoWXhFPQ==',1507953303770),('YmJEODloZWtGYVdXVG1Qa3U1c3hZNE9IalEwcUcySTViRnRaMEhHR2EvbVAxQkM2QzhxT1QxbVBRcGFaQkk4UVRhdGhVd3NlaHJkbTIrWmNaTmdKQy8xbTJOSXpBU1RzTG93RzRkdzd3NjJ1bjhkRlMxeWF5OUEyODdXM3F6NlduNTlFNmd3b2dGZlBBMUQ0aHJ4L2kyUmFkK3AyVjNNYjdwMTgwaHBDNjdNPQ==',1507992730792),('YmJEODloZWtGYVdXVG1Qa3U1c3hZNE9IalEwcUcySTViRnRaMEhHR2EvbVAxQkM2QzhxT1QxbVBRcGFaQkk4UVRhdGhVd3NlaHJkbTIrWmNaTmdKQy8xbTJOSXpBU1RzTG93RzRkdzd3NjNIU1pFbFZwOXhBMTJNODZRclRoVCtLc0RIVGwrRURUTjFmRTQyTkZKY1ZrTEVtQzdoOFN1UEVrOHZwVzRSdWY0PQ==',1508037965593),('YmJEODloZWtGYVdXVG1Qa3U1c3hZNE9IalEwcUcySTViRnRaMEhHR2EvbVAxQkM2QzhxT1QxbVBRcGFaQkk4UVRhdGhVd3NlaHJkbTIrWmNaTmdKQy8xbTJOSXpBU1RzTG93RzRkdzd3NjJUdVFxQXZkV3Y0MjVXMk42MEN6dStDWlhESmwvUUtZbzVNeFVXSm9WY3g1STI4ZUR1UHBNV0tvdnZHZVQrUCtNPQ==',1508078483308),('YmJEODloZWtGYVdXVG1Qa3U1c3hZNE9IalEwcUcySTViRnRaMEhHR2EvbVAxQkM2QzhxT1QxbVBRcGFaQkk4UVRhdGhVd3NlaHJkbTIrWmNaTmdKQy8xbTJOSXpBU1RzTG93RzRkdzd3NjE1NitLQytMeVR1ZERjdngvR2dNUHR0M2dVamxxNmF6SEdXQURvdW5CTXdaMFlYbzUybjJaeW5TYjRERzQwVFRjPQ==',1508402088880),('YmJEODloZWtGYVdXVG1Qa3U1c3hZNE9IalEwcUcySTViRnRaMEhHR2EvbVAxQkM2QzhxT1QxbVBRcGFaQkk4UVRhdGhVd3NlaHJkbTIrWmNaTmdKQy8xbTJOSXpBU1RzTG93RzRkdzd3NjBLMm9lbFNnSUYvL2VpaFdnMFFTNmcwZTJad05pMndDelRETjMrejZLdVBuSkhBcFg2bGZUaGJ1TXcrUjRPclZRPQ==',1508417882255),('YmJEODloZWtGYVdXVG1Qa3U1c3hZNE9IalEwcUcySTViRnRaMEhHR2EvbVAxQkM2QzhxT1QxbVBRcGFaQkk4UVRhdGhVd3NlaHJkbTIrWmNaTmdKQy8xbTJOSXpBU1RzTG93RzRkdzd3NjJxZmpMYm9DYjNTL0hScjU3eVZqVGg4V3IxMFd0ekRWZ0tWOEpwQTFCOGtOTHhaT292eW56K2h4R1IxNHpDNWtzPQ==',1508441600819),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0lkM3gzcC9lYXpSMjVLME1raHFMK1VJWjhtMTk5Yy9peWtzNnl0Mis0SFR5SEJGNXBMOGwvZnAyRjNMcFpEcnhaZk5xOVZndzZmMzJUcGp2S1BFOVliREZTaXc4dXA0TU9DSlkzYkRFYWxLNURadkZFejd5S0x0ZmlmVWNLZlp3PT0=',1508441614276),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0lkM3gzcC9lYXpSMjVLME1raHFMK1VJWjhtMTk5Yy9peWtzNnl0Mis0SFR5SEJGNXBMOGwvZnAyRjNMcFpEcnpyQ3ZTQUdiQlcwc1pRQ3h6WTdKdVBSdzBPQ2t5RzM4bHVnWS9yZWdnNlRxdWhHOXNtZXlYaTlwMkhsZjBSVE53PT0=',1508441669705),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0lkM3gzcC9lYXpSMjVLME1raHFMK1VJWjhtMTk5Yy9peWtzNnl0Mis0SFR5SEJGNXBMOGwvZnAyRjNMcFpEcjI5a0FVcXhlN1FtK1MxcTFDbi9TOUdvdkpucTFoUXNqcUlWWkxxUm1xQmtpTTZjc284RE5tQWxTMi9RNUV2QXVRPT0=',1508442303316),('YmJEODloZWtGYVdXVG1Qa3U1c3hZNE9IalEwcUcySTViRnRaMEhHR2EvbXlzdkg2dlp6NnI1WDFBRnUyVGJHOWMxYWNyRFd2UU9IbFluY0JVYitaQmxibVYycDlyUTh0R2s0MFNSMVFPN2twS3JqWXRvekRTb2NER0NTL0UxZlQxLzFIaEo2R3dPc0VzNmlvaFp4dDNnPT0=',1508442363321),('YmJEODloZWtGYVdXVG1Qa3U1c3hZL1ZCQi9jM0MxdjQxUkt4WlhpeE5VNXJxVGk2aklIOFIybkpXU0p0Wlk2MFphcWVEZGpHZ2QzTmtNdmpIbjlTKzFRVVFLNXBXRmpGeGRIaHFaVjFSMGNsVnhCVzN4Qko0WDlhLzlmUXl3STVDUjVXSnpEQS9wT2kwU0pxS3UrZ1BZS0lkUGhVRS9pZWFHdS9rb29jbjRFPQ==',1508445061563),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdVJKSitQRjlIREVOaXJuZHk1cXVzeVdCNlpwSTdjQkRnWEtYSHpoOGxvM3RheHFKWkNDbFhtcVFaVnk1M1JqSDJrNWU5Q3BZNVFtT3dwc05FMk9GQzA4PQ==',1508477479927),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdWFyTmVEbUZTeGdwTmsyWGYwajhCMDYxQkJnaXdBMGcwL0poUjVCbkVJYlBDQ25TQXczczJxcGZuYm16Q2pVdkI1KzBsVUdhMG5pbGltN2lmd2ZrZjJ3PQ==',1508483854141),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdVJZbHBSdEUyakVRcnNFa055UW9TcjVrUjZUSFhjN3JtdEIvYkhRc1phbVhSRnd1bHlMeGxHT2lYU0M5NkVYNVd1KzlyRXd5OHJTSHQzMllYRGM1cVZZPQ==',1508511544553),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdWR4RkFqcW1rV29zSVNGNGJ0K3NDaTJEMFhYVWhMREhmMDQrYW9hSjFqZWdtZjlVQ2lyeSs5ck5CNnVxbm1KZFUwWlBHSFA1V09NSlVjREc0OWZER1hrPQ==',1508525740175),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdVRLWnlKdWp0RzZyWE9RaUZ3K0ZjUjBqdkFZMnMweHNoODNPL2ZtaVFreGJoOWh3TzFOOVNuWWpERGtBNUVMUEhQb3BpRVVoNmRtWkE3MlFQRmF4eXJZPQ==',1508562345050),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdWVaNG5jWDJuOHdKa0VhMDRCSmZobndLbE40T1RLODJaRnlBaU1RNGs5ekhybTBiWXg2UWgydWZ1TkxTdm84ZUdqQnpyTDlCRk4yMEpVZzlqb1lMT1VVPQ==',1508657207195),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdVNOcHNOUXB1MFJWNDlYa2VxNkNXZTA5SlhoZzV5WTNRWGxNQVRzN0tWenVlZEc4SGErUnQxMURBZTlVYXA0ZStkYnozb0pPWHRNNkNrTDR0YVRKSWc4PQ==',1508684992720),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdVUyVUdnSEtmSzk5WFNQbkNsSjFLWlFLeE1HZmp6eE1lcU5HMWdPZzcwVEpaT2wvYVRpeGVDVWUvTUpFWXVtTlZtWjJIRUh4ODNoWCtleC9LRVVLS2VrPQ==',1508692381348),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdWRSV1RhbEZVekpiZE9PK25MQ1gxVnpYd1pvZmgwdzIrdjRKV09nUTBsSXBGSkE5UXBTZ1VUTXhhNi9seUorQmxuQzFkZ1MyYXlNMXRFUG1DS1FEa2FEVWhnd3FLWGYvVFRDNVo1OWl1NUFz',1508785273135),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdVFsMjlVdU84QXh0MzlYMmJ4TGJEc3VvSmhhYmdCYitXb2gvU3ExY2dHNkdyRTc0ZEFveFB6RE5LSlNTVnUvelptRXZiMkV1a2czWEVUVERuVmVOQXlXck4ycWVOTUxneFh5THpXVk9heXhU',1509286931549),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdWF3enhQY1VwcGQ4M2RNZEk3UkhqdHNsWFowbHdmRVg0THlDWFpkNVZpRHlrei9GSmN5eVNzWGlBaU9NL0FneHlqT1Q0bkFyYTB0WmxMd3ZHNjVGVEp4R2dqUEx5MWdSQnpMdCsvZWV5SzI1',1509769218343),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdVRkNHFtTSs5WGd3N29nN3RiZHA0SVVJSzhBV2Vyb0tqS0ErM2pLclVlZ0lTdmR2WWZoc2tTZ2l1bWpLMURnK2U2Q2wrY3ZGQWdRQjZLanRxSmgwd1V4OTZaUlNnUklHOXVzUDNqMFZJeTc3',1509781448016),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdVpCVWVHTGlTQ1cxSWY0aEh3cVpWTkppc05CTmM4ZlRuM09UOXFBMDZyUGF4cWRFYU5hSVRQelBVNjB3QkNYZUZ6M05PazdRWFlQbk1NVytYRzdrMzZPY1p5OU1jcTRzZVhiQkRYcUZrWjhW',1509801165382),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdWVXRHAxNTAvU3ZVYWpLbmQrMHJUQTZrL1E1ODFBeXViVWpscFJjUFhUSmI2aWFneDBweFFseVdQcTFpbDZqOFAzTnRKNDRFRkoxcmtGWDY5NlhLMWlFY0tSUW9ha1NrRGRJa3JqRTZZME5U',1509819370724),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdVd3Vm5CNy9JK1VPZ1dvWnh3RlpYR29VNkcxamQyK0lQeHdWQ3BMUFVqZy9HaExDcStXNUlFVWhpajBDRTd6MG1UUkRRRkdUYUZkQ29wNUZMeWg3UURjRTJSak9PNjdlR1B4cDNCdjBPbTZV',1509832257225),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdWY4bmQ4Q1htN2MrTjBRSmtYS2YxSzBrLzNWUjZkK05FN0J3NzYrSXhTN3loS2tUZnZoNTRwQUZ3di9VSjJtVFR4WnFqVlQ2THZ2RUR2RW5MMlBmMlhMT1hWK2Q0NGRxZUV4bmZOc0N5NXBw',1509867286852),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdVhmNzA3SS9ONlZjVDNwcWxuMERITTFvWGlRZ05mZEgwWG9DN2VFcW56MnRiUndXUUIzM29LcFVMZHZHT2hCS2x5aGovcC95d214WVBoMGtEMHJYM0VCakFFY3k4NkxBRWJ2MXpVQlFBdTFH',1509873028878),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdWVMdVVURnVQUmdFc21mVi92MG5ia0ZQcWV6dlBiSEE1Y3lpcmtFV1ZtdE5JYy9UWWZ2NGovdndhempqTUZtemRvSnNtUjRIY01NT0RMQSttQWlPZU1ra1BISjBxWkh4akQ5Qm5IRERmN2RJ',1510413933689),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdWIveldDWEJnRXIwczl4QU0rZHl2aXJleXYzU3FsMG8wUzhKMFprZFBUYjdSa0pWcnNUbDY3elgwMWROcitSdWVFUzhhdDROclpDaFdZeEhrTnFnb2Q3T1QxS3dncHdDdjVqelFEaE1pL25G',1510512883546),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdWJmMjhRRjlnczMyUFFsa2tBNE01VDRGN3BjRTlwSzR4eXNkZDg5SXBIM1JaWGUzMVRhaGVmcEUrNGZ0bDNza01tam1uQndOVlJBUFVoV1FpUzYrQjdNeEZPaUFYNzV2ejN0dU1yOWN0MEtw',1510539386118),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdWZSQlRUeTJsY2d0TzAxZkRMS0o2bS9VNUJyQWZZUlRnN01aWFZZcjBXQ1hJeldNeE8ySTRnWjVYb0xjaFBuR1A5aUdWRGxGUnNYS0NUMjE5NlNxVnRaMXJ1QUIyemtOZVY5bDdTdm1aSTdy',1510587156540),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdWNjVGYycGZTZkN1ZjR1azVMZGg2K1NPaDl4VnFyQTY5VmVmWGJ1M0ltVVNjQUtUMHZ3NjJ0OFhHQzJrOFBQWWtRL0pZU1c0VnpwSUxiWHo3b1lSS0tNdWNwYVVNNVk1Y0FPdldUM3NMd3Jp',1511370051204),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdWU1VFdEK3dRTVg3VlJXcDZ2ZXR3ajl2bGlLdzVXMzVXTXhFdVY1ZHlRQ2h1NmN5blZObCtyRG9WRkEzalkyYys5Nmd4STNXWEQ0U1Y1SWNqUzIreFRNZnN4Zk9YYXVIOVNDeGlnaHRFUk4r',1511464848631),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdVJYaXl0OHovQUZFQXhrZ1VGTmM4d3pmTTdSN0RkcE9UdkhYRmI4T05BbnJQeXpGMlgydmppcnJLaXdvMlhxMi9oNWhEdmVqcy9WTTFzNVlPTGNOUkRlMjNxNmZCYjJvZm1JblVWTlpSMUNn',1511661515931),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdVY1THE5M1RIbGQwdVBGQnBpVFd5eFBXUlF5dTZEbjdQTkx6NjZ0aFZyYVkvWm9wZUNJa2lkYlVBT1NWWHdyUzYrZUtHK2pUYWJEZXN2d1dtVmpZYXp0MThxeFNpOFVxd3VVMXpHR2t0ZWQ5',1511683646453),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdVRLUkhEZlBubmIrbHVtdEIrUUpjQkFZT2VkeHF6M0grTHlEdnFLbkpSK0p3ZDFYMjVTL0hGbXVKdElsejF3NUhoSlRMeGdVYWdTZ2tXSThLK0N6MStXaFB4THF2R0FxdUVhb3pCRWEzN3c5',1511680382526),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdVllS0hVdlpJQlRUcysyWU1NRUZuVVZOa3pWMDFlQTFRekZUUlUxQTdqelJ0Rjd6OU80bnQzRWxTRDZuMjFWZDk0Nzgra0VkZFBDSldIakJzSkVvbm4yNnpKQlQvYkFWbDJVVHBycEJCVXdq',1511680383802),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdWIxOXdEVWFRNzhCMnNKWUNWOHEzalpFQnh2TzMzQnpHeGViVC8zY3BySmFCQmFHS3h3eVlCbXlQSmpRaXMyS3FoL1JJUWFpZ1J5NUZvSEVHS1pqK0h2WkM2ZFMxTVVUNmRtU3JVT29kbkV1',1511680384220),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdVhSM21lR0x3VHlOQnVCZVN4NS9lSE5INXIyTXh4c2J2R25BWHZKUVpHcFhGYWdySnIwS2swWlpVdVB0Tm12UVB1YkxIS0h6QzVzSmRGTFc3TDAzUXY1K3ljYnZYbVJkRXFPSVpjNHB1MklQ',1511680384521),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdWZjOXpjSTVBTklqSGp1bTNySG5aTFBha2RZVFloU2xMMktyU3cxdVlPSk9zSjYzTDRuSEJSdUJPMWVLZGMxQ1RlTEFTNi9KSkhuWml1LzhtNEFQajQ5bmQrSEFCcDZySGVkeDRGL1htTHNL',1511680384843),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdWFXYmRxc21vbVAzZCttYUFDZ2toNVFBQW9HNlhERUZYcFQwOXNyaFRJc1VwQXAxcGx4SEsyZ2E5NE53MWRNOVcwZFMwa0N3MXBKTllyZkhaRFRTMlV3V3EwWlV4VEZlT2E3dGZId1lBWFps',1511680385610),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdWJkRThxOW1Lam9MM0NQbXM2czM4Vkg3eEJrcGxMWVFnS0p4YktzYnM4MkpTdW1OTDl0QVB6M0Nrb0Zzc2ZJdDhoc0U5djhkdDVXTzFLQzFoVVl1S1NtTjRVT0NXNE9yRXJ3V25BVy82cmE0',1511680386004),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdWVDS1E4aXF0WEhGTTY2MHpURWNlWEFKTjJPL2dCdk1Md3lCRGRjUFJiL1RWWWgxRWtmNVF6K2xkeU9ZNHpJOXdWWlNROVdRd093OC9QWnVlcnR4MkVITk5pWTUrTTh2ZE4zS1dtVy95UTVL',1511680386597),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdWQ0VHpXeHZYbGhxN3hyWFp0QWY4V0xBT1lwSlc3eWtldG01RVF5QU1KWUVJYXUrUXlpbmNXNHF5d0E2a2Z6R2JMclpaUWdrNTc1bzdsNEtuVEthR2hheVNQdGR2OWwxQjFqckpkc1k3SlVH',1511680387022),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdVliQmpxbkpmQjFRclQ0R25WbHlrYU5UdDZFd2syOFR5Q1BGQzk1R084Yk13NHA2SFdHU2RiV1JEYW5PTHowWnAxMmZFSDc3OVI1bkNiNEloTm9zQXU1SW4zUTVtUVNKNEtxQXZIdEFXQWMr',1511687034040),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdVlyNU84Zkx1NXFGdm9iM1V2MWNsWkhNRU1CdzA4N0VWUGxCeWE3ZW45NjYyWVNMMXRIMGtrOVpOMWdneXZhdk5wdis0VE5KbHphZkVLRjBud00vaU9XYnVMN1p6VTVtcmt5SXQvWHdiWE44',1511693487205),('OE8rUkhncGhGa1QvNGt4N0hFMGU1aGhHcXd5c3BMem9QdlBsV3B3T0p6Yy9RTFlMOHNDcGtlYy9yeDB4bENUdXZXMWtORmY2Ym94NG5sZVdCcW9PaVQyb01MS3ZBQzc2OUY5cDZrTWNXTVpJTmpoTFE2QVBlMVVrZXpOcGdNajExNy9YOVY1T2VsbGY3L2VlQUlPSVhVUCs5Q3AzaU8wbHBiL1JEWk1NczBTaFUraTZ2UWRnb1pwUnZ1dktMQzV3',1511713027181),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdVMyVDI4RHJLWDI3R3pWd1JVbjBzWm5LM0VUSjNvY3NHN3N5ZzBJTlgxaVN1KzJHTHhQMXh4ZGpZdFVSd0VXZ3F5ZGJFSGI2czZwQVRsN0FvUjFINDUyS3dBckRXb3Q3U2swV1RTOHkzZmdR',1511713117704);
/*!40000 ALTER TABLE `jwt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_diagnostic_test_params`
--

DROP TABLE IF EXISTS `master_diagnostic_test_params`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `master_diagnostic_test_params` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `diagnostic_test_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `input_type_id` int(11) DEFAULT NULL,
  `list_values` varchar(500) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_diagnostic_test_params`
--

LOCK TABLES `master_diagnostic_test_params` WRITE;
/*!40000 ALTER TABLE `master_diagnostic_test_params` DISABLE KEYS */;
/*!40000 ALTER TABLE `master_diagnostic_test_params` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_diagnostic_tests`
--

DROP TABLE IF EXISTS `master_diagnostic_tests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `master_diagnostic_tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_diagnostic_tests`
--

LOCK TABLES `master_diagnostic_tests` WRITE;
/*!40000 ALTER TABLE `master_diagnostic_tests` DISABLE KEYS */;
/*!40000 ALTER TABLE `master_diagnostic_tests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_access_by_roles`
--

DROP TABLE IF EXISTS `menu_access_by_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_access_by_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_access_by_roles`
--

LOCK TABLES `menu_access_by_roles` WRITE;
/*!40000 ALTER TABLE `menu_access_by_roles` DISABLE KEYS */;
INSERT INTO `menu_access_by_roles` VALUES (1,1,2,NULL,NULL,1),(2,1,4,NULL,NULL,1),(3,2,2,NULL,NULL,1),(4,2,4,NULL,NULL,1),(5,3,2,NULL,NULL,1),(6,4,1,NULL,NULL,1),(7,4,2,NULL,NULL,1),(8,4,3,NULL,NULL,1),(9,4,4,NULL,NULL,1),(10,5,1,NULL,NULL,1),(11,6,1,NULL,NULL,1),(12,7,1,NULL,NULL,1),(13,5,3,NULL,NULL,1),(14,6,3,NULL,NULL,1),(15,7,3,NULL,NULL,1),(16,5,4,NULL,NULL,1),(17,6,4,NULL,NULL,1),(18,7,4,NULL,NULL,1),(19,8,5,NULL,NULL,1);
/*!40000 ALTER TABLE `menu_access_by_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `parent_id` varchar(45) DEFAULT NULL,
  `sequence` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'Bookings','','0',1,NULL,NULL,1),(2,'View Bookings','/Booking','1',1,NULL,NULL,1),(3,'New Booking','/Booking/create','1',2,NULL,NULL,1),(4,'Profile','/Profile','0',3,NULL,NULL,1),(5,'Diagnostic Tests','/DiagnosticTest','0',2,NULL,NULL,1),(6,'View Diagnostic Tests','/DiagnosticTest','5',1,NULL,NULL,1),(7,'Add New','/DiagnosticTest/create','5',2,NULL,NULL,1),(8,'Master Diagnostic Tests','/MasterDiagnosticTests','0',0,NULL,NULL,1);
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organization`
--

DROP TABLE IF EXISTS `organization`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `organization` (
  `organization_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_active` int(11) DEFAULT '1',
  PRIMARY KEY (`organization_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organization`
--

LOCK TABLES `organization` WRITE;
/*!40000 ALTER TABLE `organization` DISABLE KEYS */;
INSERT INTO `organization` VALUES (1,'RB Diagnostic Center','We were incorporated in 2010 with a vision of redefining medical diagnosis. Today we stand as the fastest growing diagnostic center of North Kolkata because of the love and trust of the community. Our medical equipments are always the latest and the best in the industry. We participate in international medical seminars to keep up with the everchanging technology. We hope to continue living with our strong service commitment for the society. ','2017-10-08 00:00:00','2017-10-08 00:00:00',1);
/*!40000 ALTER TABLE `organization` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `permission_description` varchar(50) NOT NULL,
  `restrict` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`permission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'diagnostictest_create',''),(2,'diagnostictest_read','diagnostic_lab_id'),(3,'diagnostictest_read',NULL),(4,'diagnostictest_update','diagnostic_lab_id'),(5,'diagnostictest_delete','diagnostic_lab_id'),(6,'diagnostictest_delete',''),(8,'booking_read','diagnostic_lab_id'),(9,'booking_create',''),(10,'booking_update',NULL),(11,'report_create',NULL),(12,'report_update','diagnostic_lab_id'),(13,'bookingdetail_update',NULL),(14,'user_read','diagnostic_lab_id'),(15,'user_read',NULL),(16,'bookingdetail_read',NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  `role_description` varchar(50) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'doctor','Report generation'),(2,'reception','Create, Read, Update Bookings'),(3,'pathologists','Pathologists'),(4,'manager','delegates all work to pathologists and doctors'),(5,'Superadmin','Admin of Admin(s)');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_permissions`
--

DROP TABLE IF EXISTS `role_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_permissions` (
  `role_permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`role_permission_id`),
  KEY `role_id` (`role_id`),
  KEY `permission_id` (`permission_id`),
  CONSTRAINT `role_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`),
  CONSTRAINT `role_permissions_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`permission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_permissions`
--

LOCK TABLES `role_permissions` WRITE;
/*!40000 ALTER TABLE `role_permissions` DISABLE KEYS */;
INSERT INTO `role_permissions` VALUES (1,1,2),(2,1,4),(3,1,8),(4,1,11),(5,1,12),(6,2,9),(7,2,10),(8,2,2),(9,4,14),(10,4,13),(11,1,16);
/*!40000 ALTER TABLE `role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Pending'),(2,'In Progress'),(3,'Completed'),(4,'Cancelled');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_org_map`
--

DROP TABLE IF EXISTS `user_org_map`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_org_map` (
  `user_id` int(11) DEFAULT NULL,
  `diagnostic_lab_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_org_map`
--

LOCK TABLES `user_org_map` WRITE;
/*!40000 ALTER TABLE `user_org_map` DISABLE KEYS */;
INSERT INTO `user_org_map` VALUES (1,1);
/*!40000 ALTER TABLE `user_org_map` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  KEY `role_id` (`role_id`),
  KEY `user_role_ibfk_1_idx` (`user_id`),
  CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (1,1),(1,2),(1,4),(1,3),(2,1),(2,2),(2,3),(2,4),(2,5);
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `password` varchar(80) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `state` varchar(45) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_first_login` varchar(1) NOT NULL,
  `org_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `phone_UNIQUE` (`phone`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Siddhartha','Murari','9674544035','sid@mail.com','1','MALE','283, Janapath, West Durganagar, North Dum Dum',700065,'Kolkata','West Bengal','2017-10-19 23:39:00','2017-10-19 23:39:00',1,'N',1),(2,'Superadmin','','8961112533','admin@mail.com','1','MALE','',700065,'Kolkata','West Bengal','2017-10-19 23:39:00','2017-10-19 23:39:00',1,'N',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'lignio_db'
--

--
-- Dumping routines for database 'lignio_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-26 20:49:26
