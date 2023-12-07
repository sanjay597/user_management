-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: user_management
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `pagination_users`
--

DROP TABLE IF EXISTS `pagination_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pagination_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `designation` varchar(45) NOT NULL,
  `dob` varchar(45) NOT NULL,
  `doj` varchar(45) NOT NULL,
  `blood_group` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `address` varchar(200) NOT NULL,
  `identity_proof` varchar(45) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` int NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagination_users`
--

LOCK TABLES `pagination_users` WRITE;
/*!40000 ALTER TABLE `pagination_users` DISABLE KEYS */;
INSERT INTO `pagination_users` VALUES (1,'Test 2','Accountant','2000-01-02','2020-01-02','A+','1234567890','test2@email.com','Address 2',NULL,1,1,'2023-12-07 00:00:00'),(2,'Test 3','Accountant','2000-01-03','2020-01-03','A+','1234567890','test3@email.com','Address 3',NULL,1,1,'2023-12-07 00:00:00'),(3,'Test 4','Accountant','2000-01-04','2020-01-04','A+','1234567890','test4@email.com','Address 4',NULL,1,1,'2023-12-07 00:00:00'),(4,'Test 5','Accountant','2000-01-05','2020-01-05','A+','1234567890','test5@email.com','Address 5',NULL,1,1,'2023-12-07 00:00:00'),(5,'Test 6','Accountant','2000-01-06','2020-01-06','A+','1234567890','test6@email.com','Address 6',NULL,1,1,'2023-12-07 00:00:00'),(6,'Test 7','Accountant','2000-01-07','2020-01-07','A+','1234567890','test7@email.com','Address 7',NULL,1,1,'2023-12-07 00:00:00'),(7,'Test 8','Accountant','2000-01-08','2020-01-08','A+','1234567890','test8@email.com','Address 8',NULL,1,1,'2023-12-07 00:00:00'),(8,'Test 9','Accountant','2000-01-09','2020-01-09','A+','1234567890','test9@email.com','Address 9',NULL,1,1,'2023-12-07 00:00:00'),(9,'Test 10','Accountant','2000-01-10','2020-01-10','A+','1234567890','test10@email.com','Address 10',NULL,1,1,'2023-12-07 00:00:00'),(10,'Test 11','Accountant','2000-01-11','2020-01-11','A+','1234567890','test11@email.com','Address 11',NULL,1,1,'2023-12-07 00:00:00'),(11,'Test 12','Accountant','2000-01-12','2020-01-12','A+','1234567890','test12@email.com','Address 12',NULL,1,1,'2023-12-07 00:00:00'),(12,'Test 13','Accountant','2000-01-13','2020-01-13','A+','1234567890','test13@email.com','Address 13',NULL,1,1,'2023-12-07 00:00:00'),(13,'Test 14','Accountant','2000-01-14','2020-01-14','A+','1234567890','test14@email.com','Address 14',NULL,1,1,'2023-12-07 00:00:00'),(14,'Test 15','Accountant','2000-01-15','2020-01-15','A+','1234567890','test15@email.com','Address 15',NULL,1,1,'2023-12-07 00:00:00'),(15,'Test 16','Accountant','2000-01-16','2020-01-16','A+','1234567890','test16@email.com','Address 16',NULL,1,1,'2023-12-07 00:00:00'),(16,'Test 17','Accountant','2000-01-17','2020-01-17','A+','1234567890','test17@email.com','Address 17',NULL,1,1,'2023-12-07 00:00:00'),(17,'Test 18','Accountant','2000-01-18','2020-01-18','A+','1234567890','test18@email.com','Address 18',NULL,1,1,'2023-12-07 00:00:00'),(18,'Test 19','Accountant','2000-01-19','2020-01-19','A+','1234567890','test19@email.com','Address 19',NULL,1,1,'2023-12-07 00:00:00'),(19,'Test 20','Accountant','2000-01-20','2020-01-20','A+','1234567890','test20@email.com','Address 20',NULL,1,1,'2023-12-07 00:00:00'),(20,'Test 21','Accountant','2000-01-21','2020-01-21','A+','1234567890','test21@email.com','Address 21',NULL,1,1,'2023-12-07 00:00:00'),(21,'Test 22','Accountant','2000-01-22','2020-01-22','A+','1234567890','test22@email.com','Address 22',NULL,1,1,'2023-12-07 00:00:00'),(22,'Test 23','Accountant','2000-01-23','2020-01-23','A+','1234567890','test23@email.com','Address 23',NULL,1,1,'2023-12-07 00:00:00'),(23,'Test 24','Accountant','2000-01-24','2020-01-24','A+','1234567890','test24@email.com','Address 24',NULL,1,1,'2023-12-07 00:00:00'),(24,'Test 25','Accountant','2000-01-25','2020-01-25','A+','1234567890','test25@email.com','Address 25',NULL,1,1,'2023-12-07 00:00:00'),(25,'Test 26','Accountant','2000-01-26','2020-01-26','A+','1234567890','test26@email.com','Address 26',NULL,1,1,'2023-12-07 00:00:00'),(26,'Test 27','Accountant','2000-01-27','2020-01-27','A+','1234567890','test27@email.com','Address 27',NULL,1,1,'2023-12-07 00:00:00'),(27,'Test 28','Accountant','2000-01-28','2020-01-28','A+','1234567890','test28@email.com','Address 28',NULL,1,1,'2023-12-07 00:00:00'),(28,'Test 29','Accountant','2000-01-29','2020-01-29','A+','1234567890','test29@email.com','Address 29',NULL,1,1,'2023-12-07 00:00:00'),(29,'Test 30','Accountant','2000-01-30','2020-01-30','A+','1234567890','test30@email.com','Address 30',NULL,1,1,'2023-12-07 00:00:00'),(30,'Test 31','Accountant','2000-01-31','2020-01-31','A+','1234567890','test31@email.com','Address 31',NULL,1,1,'2023-12-07 00:00:00'),(31,'Test 32','Accountant','2000-02-01','2020-02-01','A+','1234567890','test32@email.com','Address 32',NULL,1,1,'2023-12-07 00:00:00'),(32,'Test 33','Accountant','2000-02-02','2020-02-02','A+','1234567890','test33@email.com','Address 33',NULL,1,1,'2023-12-07 00:00:00'),(33,'Test 34','Accountant','2000-02-03','2020-02-03','A+','1234567890','test34@email.com','Address 34',NULL,1,1,'2023-12-07 00:00:00'),(34,'Test 35','Accountant','2000-02-04','2020-02-04','A+','1234567890','test35@email.com','Address 35',NULL,1,1,'2023-12-07 00:00:00'),(35,'Test 36','Accountant','2000-02-05','2020-02-05','A+','1234567890','test36@email.com','Address 36',NULL,1,1,'2023-12-07 00:00:00'),(36,'Test 37','Accountant','2000-02-06','2020-02-06','A+','1234567890','test37@email.com','Address 37',NULL,1,1,'2023-12-07 00:00:00'),(37,'Test 38','Accountant','2000-02-07','2020-02-07','A+','1234567890','test38@email.com','Address 38',NULL,1,1,'2023-12-07 00:00:00'),(38,'Test 39','Accountant','2000-02-08','2020-02-08','A+','1234567890','test39@email.com','Address 39',NULL,1,1,'2023-12-07 00:00:00'),(39,'Test 40','Accountant','2000-02-09','2020-02-09','A+','1234567890','test40@email.com','Address 40',NULL,1,1,'2023-12-07 00:00:00'),(40,'Test 41','Accountant','2000-02-10','2020-02-10','A+','1234567890','test41@email.com','Address 41',NULL,1,1,'2023-12-07 00:00:00'),(41,'Test 42','Accountant','2000-02-11','2020-02-11','A+','1234567890','test42@email.com','Address 42',NULL,1,1,'2023-12-07 00:00:00'),(42,'Test 43','Accountant','2000-02-12','2020-02-12','A+','1234567890','test43@email.com','Address 43',NULL,1,1,'2023-12-07 00:00:00'),(43,'Test 44','Accountant','2000-02-13','2020-02-13','A+','1234567890','test44@email.com','Address 44',NULL,1,1,'2023-12-07 00:00:00'),(44,'Test 45','Accountant','2000-02-14','2020-02-14','A+','1234567890','test45@email.com','Address 45',NULL,1,1,'2023-12-07 00:00:00'),(45,'Test 46','Accountant','2000-02-15','2020-02-15','A+','1234567890','test46@email.com','Address 46',NULL,1,1,'2023-12-07 00:00:00'),(46,'Test 47','Accountant','2000-02-16','2020-02-16','A+','1234567890','test47@email.com','Address 47',NULL,1,1,'2023-12-07 00:00:00'),(47,'Test 48','Accountant','2000-02-17','2020-02-17','A+','1234567890','test48@email.com','Address 48',NULL,1,1,'2023-12-07 00:00:00'),(48,'Test 49','Accountant','2000-02-18','2020-02-18','A+','1234567890','test49@email.com','Address 49',NULL,1,1,'2023-12-07 00:00:00'),(49,'Test 50','Accountant','2000-02-19','2020-02-19','A+','1234567890','test50@email.com','Address 50',NULL,1,1,'2023-12-07 00:00:00');
/*!40000 ALTER TABLE `pagination_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_master`
--

DROP TABLE IF EXISTS `user_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_master` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `role` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `dob` varchar(45) NOT NULL,
  `profile_pic` varchar(200) NOT NULL,
  `signature` varchar(200) NOT NULL,
  `password` blob NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Active, 0 = Inactive, 2 = Not Approved, 3 = Rejected',
  `created_by` int NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` int NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_master`
--

LOCK TABLES `user_master` WRITE;
/*!40000 ALTER TABLE `user_master` DISABLE KEYS */;
INSERT INTO `user_master` VALUES (1,'Super Admin','superadmin','1234567890','superadmin@email.com','Bhubaneswar Odisha','Male','1990-01-01','','',_binary '!(ZS3Œ™yŠŒ§k]',1,1,'2023-12-06 00:00:00',1,'2023-12-06 00:00:00'),(2,'Admin','admin','1234567890','admin@email.com','Bhubaneswar Odisha','Male','1990-01-01','','',_binary '!(ZS3Œ™yŠŒ§k]',1,1,'2023-12-06 00:00:00',1,'2023-12-06 00:00:00'),(3,'Test 34','user','1234567891','test@email.com','test','Male','2000-01-01','./assets/user/profle/profile_pic_1701894650.g','./assets/user/signature/signature1701894650.g','',1,0,'0000-00-00 00:00:00',1,'2023-12-06 22:57:12'),(4,'Test','user','1234567890','test@email.com','test','Male','2000-01-01','./assets/user/profle/profile_pic_1701894703.g','./assets/user/signature/signature1701894703.g','',1,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(5,'Test','user','1234567890','test@email.com','test','Male','2000-01-01','http://localhost/user_management/assets/user/','http://localhost/user_management/assets/user/','',1,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(6,'Test','user','1234567890','test@email.com','test','Male','2000-01-01','C:\\xampp\\htdocs\\user_management\\application\\.','C:\\xampp\\htdocs\\user_management\\application\\a','',1,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(7,'Test','user','1234567890','test@email.com','test','Male','2000-01-01','./assets/user/profle/profile_pic_1701894796.g','./assets/user/signature/signature1701894796.g','',1,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(8,'Test','user','1234567890','test@email.com','test','Male','2000-01-01','assets/user/profle/profile_pic_1701894827.gif','assets/user/signature/signature1701894827.gif','',1,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(9,'Test','user','1234567890','test@email.com','test','Male','2000-01-01','assets/user/profile/profile_pic_1701894927.gi','assets/user/signature/signature1701894927.gif','',1,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(10,'Test','user','1234567890','test@email.com','test','Male','2000-01-01','assets/user/profile/profile_pic_1701894978.gi','assets/user/signature/signature1701894978.gif','',1,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(11,'Test','user','1234567890','test@email.com','test','Male','2000-01-01','assets/user/profile/profile_pic_1701896153.gi','assets/user/signature/signature1701896153.gif','',1,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(12,'Test','user','1234567890','test@email.com','test','Male','2000-01-01','assets/user/profile/profile_pic_1701896263.gi','assets/user/signature/signature1701896263.gif',_binary '°˜\ï´\êxš«6',1,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(13,'Test 2','user','1234567890','test2@email.com','test','Female','2023-12-01','assets/user/profile/profile_pic_1701896479.gi','assets/user/signature/signature1701896479.gif',_binary 'ö\0\ë\Ú\Øa\æ>D€B',1,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(14,'Test 2','user','1234567890','test2@email.com','test','Female','2023-12-01','assets/user/profile/profile_pic_1701896497.gi','assets/user/signature/signature1701896497.gif',_binary 'ƒ­W\\g!\à\ì \åoº©ª_',1,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(15,'Test 3','user','1234567890','test3@email.com','test','Male','2023-12-07','assets/user/profile/profile_pic_1701896555.gi','assets/user/signature/signature1701896555.gif',_binary '\Ú\ÕÂ\ß<h1òğò§\ßWl-',1,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(16,'Test 3','user','1234567890','test3@email.com','test','Male','2023-12-07','assets/user/profile/profile_pic_1701896562.gi','assets/user/signature/signature1701896562.gif',_binary 'O\İJ\Ø\'|\á\ÃF\ï¾',1,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(17,'Test 4','user','1234567890','test4@email.com','test','Male','2023-12-01','assets/user/profile/profile_pic_1701896614.gi','assets/user/signature/signature1701896614.gif',_binary '+\ã3=Wğ\Ùe\Ğ\ÄL4\Ğ',1,0,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00'),(18,'Admin user','user','1234567890','adminuser@email.com','Test','Male','2023-12-01','assets/user/profile/profile_pic_1701900638.gif','assets/user/signature/signature1701900638.gif',_binary 'š\îQ`GW2±Í¦\ÑbD',1,0,'0000-00-00 00:00:00',18,'2023-12-06 23:24:03'),(19,'R user','user','1234567890','testr@email.com','test','Male','2023-12-01','assets/user/profile/profile_pic_1701920522.gif','assets/user/signature/signature1701920522.gif',_binary '0C\è\Ã·[¬PqÅ°ıA',1,0,'2023-12-07 04:42:02',0,'2023-12-07 04:42:02');
/*!40000 ALTER TABLE `user_master` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-07 10:49:08
