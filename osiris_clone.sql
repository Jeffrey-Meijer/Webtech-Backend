-- MySQL dump 10.13  Distrib 8.0.32, for macos13.0 (arm64)
--
-- Host: localhost    Database: osiris_clone
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `exams`
--

DROP TABLE IF EXISTS `exams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `exams` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `teacher_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `exams_users_uuid_fk` (`teacher_id`),
  CONSTRAINT `exams_users_uuid_fk` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exams`
--

LOCK TABLES `exams` WRITE;
/*!40000 ALTER TABLE `exams` DISABLE KEYS */;
INSERT INTO `exams` VALUES (1,'Algoritmiek II',59212),(4,'Webtech II',59212),(5,'Programmeren II',12345),(6,'Programmeren I',12345),(7,'Bedrijfskunde',59212);
/*!40000 ALTER TABLE `exams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_exams`
--

DROP TABLE IF EXISTS `user_exams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_exams` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `exam_id` int NOT NULL,
  `grade` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_exams_users_uuid_fk` (`user_id`),
  KEY `user_exams_exams_id_fk` (`exam_id`),
  CONSTRAINT `user_exams_exams_id_fk` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_exams_users_uuid_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`uuid`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_exams`
--

LOCK TABLES `user_exams` WRITE;
/*!40000 ALTER TABLE `user_exams` DISABLE KEYS */;
INSERT INTO `user_exams` VALUES (3,440234,1,8.3),(4,12345,1,10),(5,593201,1,10),(7,593201,4,6.7),(8,593201,7,4),(9,440234,7,9.7),(11,440234,5,NULL);
/*!40000 ALTER TABLE `user_exams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uuid` int NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `password` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `occupation` enum('Student','Teacher','Administrator') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_pk2` (`uuid`),
  UNIQUE KEY `users_pk3` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,440234,'Jeffrey','Meijer','$2y$10$bBIIGNeQRQ5dcKM9htofjuzmqR49wXsdgW6VrC4DaQx4QZj7PK3v2','je.j.meijer@st.hanze.nl','Student'),(2,12345,'Teacher1','Hanze','Test123Hash','te.s.test@pl.hanze.nl','Teacher'),(3,593201,'Test','Heyy','$2y$10$D/W1dgDqLjBi5LypFvaNr.iI.wAmZkQyLc.NsqIPGnYCryZolXaum','jeffreymeijer11@gmail.com','Administrator'),(4,59212,'Jeffrey','Meijer','$2y$10$K8ED9e8JFGnZLU9gvZT3Meult0PB2mZigY340u1ec6sHzIt92Twtm','test@test.nl','Teacher'),(6,7,'Test','Heyy','$2y$10$QhDUupx6N.7evWTUwe8KZu63MOL9SfoWE5tVJWFZwj..pjx9IQ626','testemail@email.com','Administrator');
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

-- Dump completed on 2023-04-14 18:11:03
