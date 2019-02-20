-- MySQL dump 10.13  Distrib 5.5.62, for Win32 (AMD64)
--
-- Host: localhost    Database: scholarship
-- ------------------------------------------------------
-- Server version	5.5.62

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
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application` (
  `application_id` varchar(10) NOT NULL DEFAULT '',
  `stud_name` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `clg_address` varchar(512) DEFAULT NULL,
  `la_yr_course` varchar(32) DEFAULT NULL,
  `cu_yr_course` varchar(32) DEFAULT NULL,
  `no_of_arrear` tinyint(4) DEFAULT NULL,
  `elig_for_scholar` tinyint(4) DEFAULT NULL,
  `elig_for_next_exam` tinyint(4) DEFAULT NULL,
  `dept` varchar(32) DEFAULT NULL,
  `cast` varchar(32) DEFAULT NULL,
  `class` varchar(4) DEFAULT NULL,
  `temp_address` varchar(512) DEFAULT NULL,
  `perm_address` varchar(512) DEFAULT NULL,
  `prev_yr_scholar_amt` varchar(8) DEFAULT NULL,
  `hostel_chk_in_la_yr` varchar(32) DEFAULT NULL,
  `hostel_chk_out_la_yr` varchar(32) DEFAULT NULL,
  `hostel_chk_in_cu_yr` varchar(32) DEFAULT NULL,
  `hostel_chk_out_cu_yr` varchar(32) DEFAULT NULL,
  `cand_behav_impr` varchar(255) DEFAULT NULL,
  `cand_prev_yr_attend` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`application_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application`
--

LOCK TABLES `application` WRITE;
/*!40000 ALTER TABLE `application` DISABLE KEYS */;
INSERT INTO `application` VALUES ('DCE174202','Haris Kumar T K','Kubendran T S','Tirupparankunram Rd, Jaihindpuram, Madurai, Tamil Nadu 625011','Computer Science Engineering','Computer Science Engineering',0,1,1,'Computer Science Engineering','Sourastra','BC','Plot 4, Pethanachi Amman St, Thulasi Ram Main St, Villapuram, Madurai - 12','Plot 4, Pethanachi Amman St, Thulasi Ram Main St, Villapuram, Madurai - 12','0','-','-','-','-','-',0);
/*!40000 ALTER TABLE `application` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `application_avail`
--

DROP TABLE IF EXISTS `application_avail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `application_avail` (
  `application_id` varchar(10) DEFAULT NULL,
  `reg_no` varchar(6) NOT NULL,
  `submitted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`reg_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `application_avail`
--

LOCK TABLES `application_avail` WRITE;
/*!40000 ALTER TABLE `application_avail` DISABLE KEYS */;
INSERT INTO `application_avail` VALUES ('DCE174202','174202','2019-02-12 17:34:38');
/*!40000 ALTER TABLE `application_avail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_auth`
--

DROP TABLE IF EXISTS `staff_auth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff_auth` (
  `username` varchar(255) DEFAULT NULL,
  `passwd` varchar(512) DEFAULT NULL,
  `level` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_auth`
--

LOCK TABLES `staff_auth` WRITE;
/*!40000 ALTER TABLE `staff_auth` DISABLE KEYS */;
INSERT INTO `staff_auth` VALUES ('staff0','welcome123',0),('staff1','welcome123',1),('staff2','welcome123',2);
/*!40000 ALTER TABLE `staff_auth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stud_auth`
--

DROP TABLE IF EXISTS `stud_auth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stud_auth` (
  `username` varchar(6) DEFAULT NULL,
  `passwd` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stud_auth`
--

LOCK TABLES `stud_auth` WRITE;
/*!40000 ALTER TABLE `stud_auth` DISABLE KEYS */;
INSERT INTO `stud_auth` VALUES ('174202','welcome123');
/*!40000 ALTER TABLE `stud_auth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stud_info`
--

DROP TABLE IF EXISTS `stud_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stud_info` (
  `reg_no` varchar(6) NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `dept` varchar(32) DEFAULT NULL,
  `course_dur` varchar(7) DEFAULT NULL,
  `blood_grp` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`reg_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stud_info`
--

LOCK TABLES `stud_info` WRITE;
/*!40000 ALTER TABLE `stud_info` DISABLE KEYS */;
INSERT INTO `stud_info` VALUES ('174202','Haris Kumar T K','1999-09-05','Computer Engineering','2017-19','B+ve');
/*!40000 ALTER TABLE `stud_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `validation`
--

DROP TABLE IF EXISTS `validation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `validation` (
  `application_id` varchar(10) DEFAULT NULL,
  `lvl_0` tinyint(1) DEFAULT NULL,
  `lvl_1` tinyint(1) DEFAULT NULL,
  `lvl_2` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `validation`
--

LOCK TABLES `validation` WRITE;
/*!40000 ALTER TABLE `validation` DISABLE KEYS */;
INSERT INTO `validation` VALUES ('DCE174202',0,0,0);
/*!40000 ALTER TABLE `validation` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-20  9:25:49
