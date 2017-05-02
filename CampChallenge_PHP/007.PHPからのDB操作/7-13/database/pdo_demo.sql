DROP DATABASE IF EXISTS `class_schedule`;

CREATE DATABASE class_schedule;

use class_schedule;

-- MySQL dump 10.15  Distrib 10.0.17-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: class_schedule
-- ------------------------------------------------------
-- Server version	10.0.17-MariaDB

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
-- Table structure for table `m_subjects`
--

DROP TABLE IF EXISTS `m_subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subjectName` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=cp932;
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS `m_teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacherName` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=cp932;

--
-- Table structure for table `t_users`
--

DROP TABLE IF EXISTS `t_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `days` text NOT NULL,
  `period` int(11) DEFAULT NULL,
  `teachers` int(11) NOT NULL,
  `subjects` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY(id) REFERENCES m_subjects(id),
  FOREIGN KEY(id) REFERENCES m_teachers(id)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=cp932;
/*!40101 SET character_set_client = @saved_cs_client */;

-- 曜日と何時限目かの情報をあらかじめ作成
INSERT INTO t_users (days, period) VALUES ("月", 1), ("火", 1), ("水", 1), ("木", 1), ("金",1), ("月", 2), ("火", 2), ("水", 2), ("木", 2), ("金", 2), ("月", 3), ("火", 3), ("水", 3), ("木", 3), ("金", 3), ("月", 4), ("火", 4), ("水", 4), ("木", 4), ("金", 4);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-12-24 10:56:25
