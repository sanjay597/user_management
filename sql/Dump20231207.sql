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

-- Dump completed on 2023-12-07  9:32:38
