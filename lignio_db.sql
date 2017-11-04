CREATE DATABASE  IF NOT EXISTS `lignio_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `lignio_db`;
-- MySQL dump 10.13  Distrib 5.7.13, for linux-glibc2.5 (x86_64)
--
-- Host: localhost    Database: lignio_db
-- ------------------------------------------------------
-- Server version	5.7.19-0ubuntu0.16.04.1

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking_details`
--

LOCK TABLES `booking_details` WRITE;
/*!40000 ALTER TABLE `booking_details` DISABLE KEYS */;
INSERT INTO `booking_details` VALUES (1,2,1,1,0,'2017-10-20 00:31:56','2017-10-20 00:31:56',1),(2,2,3,1,0,'2017-10-20 00:31:56','2017-10-20 00:31:56',1),(3,3,1,1,0,'2017-10-20 00:33:35','2017-10-20 00:33:35',1),(4,3,3,1,0,'2017-10-20 00:33:35','2017-10-20 00:33:35',1),(5,4,4,1,0,'2017-10-22 11:25:07','2017-10-22 11:25:07',1);
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
  `user_id` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (2,2,1,1,'Offline',0,NULL,NULL,1,'2017-10-20 00:31:56','2017-10-20 00:31:56',1),(3,3,1,1,'Offline',0,NULL,NULL,1,'2017-10-20 00:33:35','2017-10-20 00:33:35',1),(4,4,1,1,'Offline',0,NULL,NULL,1,'2017-10-22 11:25:07','2017-10-22 11:25:07',1);
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
INSERT INTO `jwt` VALUES ('YmJEODloZWtGYVdXVG1Qa3U1c3hZNE9IalEwcUcySTViRnRaMEhHR2EvbVAxQkM2QzhxT1QxbVBRcGFaQkk4UVRhdGhVd3NlaHJkbTIrWmNaTmdKQy8xbTJOSXpBU1RzTG93RzRkdzd3NjMzbCtQNklTbVU0bXlWZFRXbW16aHJoVHRReTRhbkpRRTRkRnprcjBPSmJVeThhRDdTbzgvSFpRWUZ4ckRBWWdFPQ==',1507947592208),('YmJEODloZWtGYVdXVG1Qa3U1c3hZNE9IalEwcUcySTViRnRaMEhHR2EvbVAxQkM2QzhxT1QxbVBRcGFaQkk4UVRhdGhVd3NlaHJkbTIrWmNaTmdKQy8xbTJOSXpBU1RzTG93RzRkdzd3NjBIOENJVmhhUWR5QzhBQVlPaWQvcjFEbjZxT3k5Y1Zja1REUGJ3SmNDNXRmUDlnL1RNNVY0TEREK2NXUE9MNWxVPQ==',1507951542979),('YmJEODloZWtGYVdXVG1Qa3U1c3hZNE9IalEwcUcySTViRnRaMEhHR2EvbVAxQkM2QzhxT1QxbVBRcGFaQkk4UVRhdGhVd3NlaHJkbTIrWmNaTmdKQy8xbTJOSXpBU1RzTG93RzRkdzd3NjBveEdEWTV4dFROdWhxTk1YWk51aDVWR3J5WG85LzRGVnZVR3gxcWN5TjZwR3NlQ2FxeVlpNkJTWHA2aHVoWXhFPQ==',1507953303770),('YmJEODloZWtGYVdXVG1Qa3U1c3hZNE9IalEwcUcySTViRnRaMEhHR2EvbVAxQkM2QzhxT1QxbVBRcGFaQkk4UVRhdGhVd3NlaHJkbTIrWmNaTmdKQy8xbTJOSXpBU1RzTG93RzRkdzd3NjJ1bjhkRlMxeWF5OUEyODdXM3F6NlduNTlFNmd3b2dGZlBBMUQ0aHJ4L2kyUmFkK3AyVjNNYjdwMTgwaHBDNjdNPQ==',1507992730792),('YmJEODloZWtGYVdXVG1Qa3U1c3hZNE9IalEwcUcySTViRnRaMEhHR2EvbVAxQkM2QzhxT1QxbVBRcGFaQkk4UVRhdGhVd3NlaHJkbTIrWmNaTmdKQy8xbTJOSXpBU1RzTG93RzRkdzd3NjNIU1pFbFZwOXhBMTJNODZRclRoVCtLc0RIVGwrRURUTjFmRTQyTkZKY1ZrTEVtQzdoOFN1UEVrOHZwVzRSdWY0PQ==',1508037965593),('YmJEODloZWtGYVdXVG1Qa3U1c3hZNE9IalEwcUcySTViRnRaMEhHR2EvbVAxQkM2QzhxT1QxbVBRcGFaQkk4UVRhdGhVd3NlaHJkbTIrWmNaTmdKQy8xbTJOSXpBU1RzTG93RzRkdzd3NjJUdVFxQXZkV3Y0MjVXMk42MEN6dStDWlhESmwvUUtZbzVNeFVXSm9WY3g1STI4ZUR1UHBNV0tvdnZHZVQrUCtNPQ==',1508078483308),('YmJEODloZWtGYVdXVG1Qa3U1c3hZNE9IalEwcUcySTViRnRaMEhHR2EvbVAxQkM2QzhxT1QxbVBRcGFaQkk4UVRhdGhVd3NlaHJkbTIrWmNaTmdKQy8xbTJOSXpBU1RzTG93RzRkdzd3NjE1NitLQytMeVR1ZERjdngvR2dNUHR0M2dVamxxNmF6SEdXQURvdW5CTXdaMFlYbzUybjJaeW5TYjRERzQwVFRjPQ==',1508402088880),('YmJEODloZWtGYVdXVG1Qa3U1c3hZNE9IalEwcUcySTViRnRaMEhHR2EvbVAxQkM2QzhxT1QxbVBRcGFaQkk4UVRhdGhVd3NlaHJkbTIrWmNaTmdKQy8xbTJOSXpBU1RzTG93RzRkdzd3NjBLMm9lbFNnSUYvL2VpaFdnMFFTNmcwZTJad05pMndDelRETjMrejZLdVBuSkhBcFg2bGZUaGJ1TXcrUjRPclZRPQ==',1508417882255),('YmJEODloZWtGYVdXVG1Qa3U1c3hZNE9IalEwcUcySTViRnRaMEhHR2EvbVAxQkM2QzhxT1QxbVBRcGFaQkk4UVRhdGhVd3NlaHJkbTIrWmNaTmdKQy8xbTJOSXpBU1RzTG93RzRkdzd3NjJxZmpMYm9DYjNTL0hScjU3eVZqVGg4V3IxMFd0ekRWZ0tWOEpwQTFCOGtOTHhaT292eW56K2h4R1IxNHpDNWtzPQ==',1508441600819),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0lkM3gzcC9lYXpSMjVLME1raHFMK1VJWjhtMTk5Yy9peWtzNnl0Mis0SFR5SEJGNXBMOGwvZnAyRjNMcFpEcnhaZk5xOVZndzZmMzJUcGp2S1BFOVliREZTaXc4dXA0TU9DSlkzYkRFYWxLNURadkZFejd5S0x0ZmlmVWNLZlp3PT0=',1508441614276),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0lkM3gzcC9lYXpSMjVLME1raHFMK1VJWjhtMTk5Yy9peWtzNnl0Mis0SFR5SEJGNXBMOGwvZnAyRjNMcFpEcnpyQ3ZTQUdiQlcwc1pRQ3h6WTdKdVBSdzBPQ2t5RzM4bHVnWS9yZWdnNlRxdWhHOXNtZXlYaTlwMkhsZjBSVE53PT0=',1508441669705),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0lkM3gzcC9lYXpSMjVLME1raHFMK1VJWjhtMTk5Yy9peWtzNnl0Mis0SFR5SEJGNXBMOGwvZnAyRjNMcFpEcjI5a0FVcXhlN1FtK1MxcTFDbi9TOUdvdkpucTFoUXNqcUlWWkxxUm1xQmtpTTZjc284RE5tQWxTMi9RNUV2QXVRPT0=',1508442303316),('YmJEODloZWtGYVdXVG1Qa3U1c3hZNE9IalEwcUcySTViRnRaMEhHR2EvbXlzdkg2dlp6NnI1WDFBRnUyVGJHOWMxYWNyRFd2UU9IbFluY0JVYitaQmxibVYycDlyUTh0R2s0MFNSMVFPN2twS3JqWXRvekRTb2NER0NTL0UxZlQxLzFIaEo2R3dPc0VzNmlvaFp4dDNnPT0=',1508442363321),('YmJEODloZWtGYVdXVG1Qa3U1c3hZL1ZCQi9jM0MxdjQxUkt4WlhpeE5VNXJxVGk2aklIOFIybkpXU0p0Wlk2MFphcWVEZGpHZ2QzTmtNdmpIbjlTKzFRVVFLNXBXRmpGeGRIaHFaVjFSMGNsVnhCVzN4Qko0WDlhLzlmUXl3STVDUjVXSnpEQS9wT2kwU0pxS3UrZ1BZS0lkUGhVRS9pZWFHdS9rb29jbjRFPQ==',1508445061563),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdVJKSitQRjlIREVOaXJuZHk1cXVzeVdCNlpwSTdjQkRnWEtYSHpoOGxvM3RheHFKWkNDbFhtcVFaVnk1M1JqSDJrNWU5Q3BZNVFtT3dwc05FMk9GQzA4PQ==',1508477479927),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdWFyTmVEbUZTeGdwTmsyWGYwajhCMDYxQkJnaXdBMGcwL0poUjVCbkVJYlBDQ25TQXczczJxcGZuYm16Q2pVdkI1KzBsVUdhMG5pbGltN2lmd2ZrZjJ3PQ==',1508483854141),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdVJZbHBSdEUyakVRcnNFa055UW9TcjVrUjZUSFhjN3JtdEIvYkhRc1phbVhSRnd1bHlMeGxHT2lYU0M5NkVYNVd1KzlyRXd5OHJTSHQzMllYRGM1cVZZPQ==',1508511544553),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdWR4RkFqcW1rV29zSVNGNGJ0K3NDaTJEMFhYVWhMREhmMDQrYW9hSjFqZWdtZjlVQ2lyeSs5ck5CNnVxbm1KZFUwWlBHSFA1V09NSlVjREc0OWZER1hrPQ==',1508525740175),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdVRLWnlKdWp0RzZyWE9RaUZ3K0ZjUjBqdkFZMnMweHNoODNPL2ZtaVFreGJoOWh3TzFOOVNuWWpERGtBNUVMUEhQb3BpRVVoNmRtWkE3MlFQRmF4eXJZPQ==',1508562345050),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdWVaNG5jWDJuOHdKa0VhMDRCSmZobndLbE40T1RLODJaRnlBaU1RNGs5ekhybTBiWXg2UWgydWZ1TkxTdm84ZUdqQnpyTDlCRk4yMEpVZzlqb1lMT1VVPQ==',1508657207195),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdVNOcHNOUXB1MFJWNDlYa2VxNkNXZTA5SlhoZzV5WTNRWGxNQVRzN0tWenVlZEc4SGErUnQxMURBZTlVYXA0ZStkYnozb0pPWHRNNkNrTDR0YVRKSWc4PQ==',1508684992720),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdVUyVUdnSEtmSzk5WFNQbkNsSjFLWlFLeE1HZmp6eE1lcU5HMWdPZzcwVEpaT2wvYVRpeGVDVWUvTUpFWXVtTlZtWjJIRUh4ODNoWCtleC9LRVVLS2VrPQ==',1508692381348),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdWRSV1RhbEZVekpiZE9PK25MQ1gxVnpYd1pvZmgwdzIrdjRKV09nUTBsSXBGSkE5UXBTZ1VUTXhhNi9seUorQmxuQzFkZ1MyYXlNMXRFUG1DS1FEa2FEVWhnd3FLWGYvVFRDNVo1OWl1NUFz',1508785273135),('YmJEODloZWtGYVdXVG1Qa3U1c3hZK0pwcmxnRmR2QS9CRDF1RzJGdUhvYXpEb1cvdDJJMUh1S1NTTUVKVTJuZkRpSmJqekF6VklrZGxvVjFxTkpTdVFsMjlVdU84QXh0MzlYMmJ4TGJEc3VvSmhhYmdCYitXb2gvU3ExY2dHNkdyRTc0ZEFveFB6RE5LSlNTVnUvelptRXZiMkV1a2czWEVUVERuVmVOQXlXck4ycWVOTUxneFh5THpXVk9heXhU',1509286641394);
/*!40000 ALTER TABLE `jwt` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'diagnostictest_create',''),(2,'diagnostictest_read','diagnostic_lab_id'),(3,'diagnostictest_read',NULL),(4,'diagnostictest_update','diagnostic_lab_id'),(5,'diagnostictest_delete','diagnostic_lab_id'),(6,'diagnostictest_delete',''),(7,'booking_read','user_id'),(8,'booking_read','diagnostic_lab_id'),(9,'booking_create',''),(10,'booking_update',NULL),(11,'report_create',NULL),(12,'report_update','diagnostic_lab_id'),(13,'bookingdetail_update',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'doctor','Report generation'),(2,'reception','Create, Read, Update Bookings'),(3,'pathologists','Pathologists'),(4,'manager','delegates all work to pathologists and doctors');
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_permissions`
--

LOCK TABLES `role_permissions` WRITE;
/*!40000 ALTER TABLE `role_permissions` DISABLE KEYS */;
INSERT INTO `role_permissions` VALUES (1,1,2),(2,1,4),(3,1,8),(4,1,11),(5,1,12),(6,2,9),(7,2,10),(8,2,2);
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
INSERT INTO `user_role` VALUES (1,1),(1,2),(1,4);
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
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `phone_UNIQUE` (`phone`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Siddhartha','Murari','9674544035','sid@mail.com','1','MALE','283, Janapath, West Durganagar, North Dum Dum',700065,'Kolkata','West Bengal','2017-10-19 23:39:00','2017-10-19 23:39:00',1,'N'),(2,'Bhaskar','Murari','8961112533',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-10-20 00:31:56','2017-10-20 00:31:56',1,'Y'),(3,'Munmoon','Murari','9804668722',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2017-10-20 00:33:35','2017-10-20 00:33:35',1,'Y'),(4,'Aryaman','Murari','9999999999','arya@mail.com','1','MALE',NULL,NULL,NULL,NULL,'2017-10-22 11:25:06','2017-10-22 11:25:06',1,'Y');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-29 18:49:07
