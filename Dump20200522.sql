-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: mydb
-- ------------------------------------------------------
-- Server version	8.0.15

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
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `color` varchar(45) NOT NULL,
  `hex` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colors`
--

LOCK TABLES `colors` WRITE;
/*!40000 ALTER TABLE `colors` DISABLE KEYS */;
INSERT INTO `colors` VALUES (0,'без цвета','000000'),(1,'красный','FF0000'),(2,'зеленый','3FFF2D'),(3,'синий','2D31FF'),(4,'желтый','FBFF16'),(5,'серый','606060');
/*!40000 ALTER TABLE `colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'registered','пользователи, прошедшие модерацию'),(2,'PHP','Серьезные ребята.'),(3,'JavaScript','Умные и веселые'),(4,'Java','Серьезные ребята.');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `recipient` varchar(255) NOT NULL,
  `read` tinyint(1) NOT NULL,
  `sections_id` int(11) NOT NULL,
  `color_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `c_sections_id_idx` (`sections_id`),
  KEY `c_colors_id_idx` (`color_id`),
  KEY `c_colors_idx` (`color_id`),
  CONSTRAINT `c_color` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `c_sections_id` FOREIGN KEY (`sections_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,'Привет','Привет','2020-05-08 11:45:41','admin@mail.ru','admin',1,1,0),(2,'Привет','как дела?','2020-05-08 11:45:41','admin@mail.ru','admin',1,2,1),(3,'Привет','получил мое сообщение?','2020-05-08 11:45:41','admin@mail.ru','admin',1,2,2),(4,'Новое задание','надо сделать проект','2020-05-08 11:45:41','admin@mail.ru','anna',1,3,3),(5,'asd','sdf','2020-05-08 12:50:19','admin@mail.ru','anna',1,2,4),(6,'Привет','привет я рома как у тебя дела ??????????????','2020-05-08 13:40:43','roman@mail.ru','anna',1,1,5),(7,'Сверка','Нужно сверить все данные за последние 2 недели','2020-05-13 13:13:17','admin@mail.ru','anna',1,1,2),(8,'Верстка сайта','wsdfg','2020-05-13 13:28:35','admin@mail.ru','рома',1,1,1),(9,'Мой сайт','aaaaa','2020-05-13 13:38:27','admin@mail.ru','рома',1,3,2),(10,'Мой сайт','sss','2020-05-13 13:38:37','admin@mail.ru','рома',1,1,4),(11,'Мой сайт','xxxxx','2020-05-13 13:45:59','admin@mail.ru','рома',1,1,4),(12,'Мой сайт','vvvv','2020-05-13 13:49:15','admin@mail.ru','рома',1,1,2),(13,'Мой сайт','bbbb','2020-05-13 13:50:34','admin@mail.ru','рома',1,1,5),(14,'Верстка сайта','sdfvb','2020-05-13 13:51:24','admin@mail.ru','admin',1,1,0),(15,'Верстка сайта','sdfvb','2020-05-13 13:55:47','admin@mail.ru','admin',0,1,3),(16,'Мой сайт','zzzzz','2020-05-13 13:56:02','admin@mail.ru','admin',0,3,2),(17,'1','1','2020-05-13 14:24:16','admin@mail.ru','admin',0,1,1),(18,'text','text','2020-05-08 11:45:41','admin@mail.ru','anna',0,1,4),(19,'Верстка сайта','Верстка сайта','2020-05-14 15:24:42','admin@mail.ru','anna',1,1,3),(20,'Привет','Привет','2020-05-14 15:25:11','admin@mail.ru','anna',0,1,2),(25,'Привет','Привет','2020-05-14 16:07:24','admin@mail.ru','anna',1,1,2),(26,'Мой сайт','Мой сайт Мой сайт Мой сайт','2020-05-14 16:08:07','admin@mail.ru','anna',1,4,0),(27,'письмо','письмо','2020-05-15 09:26:59','admin@mail.ru','bebe',1,2,4),(28,'письмо','письмо','2020-05-15 09:30:24','admin@mail.ru','bebe',1,2,5),(30,'Верстка сайта','Верстка сайта','2020-05-15 09:56:26','admin@mail.ru','bebe',1,3,5),(31,'проверка','проверка','2020-05-15 10:30:15','admin@mail.ru','anna',1,3,2),(32,'проверка','проверка','2020-05-15 10:31:43','admin@mail.ru','anna',1,3,3),(33,'проверка','проверка','2020-05-15 10:31:45','admin@mail.ru','anna',1,3,5),(34,'Привет','Привет','2020-05-15 10:42:23','admin@mail.ru','рома',1,4,5),(35,'admin','admin','2020-05-15 11:55:29','admin@mail.ru','bebe',1,4,4),(36,'Сегодня выходной','погода отличная, делаю дз','2020-05-16 14:10:58','admin@mail.ru','рома',1,2,3),(37,'test','','2020-05-17 15:09:33','admin@mail.ru','anna',0,1,1),(38,'выходной','сегодня воскресенье. 25 градусов за окном','2020-05-17 15:10:54','admin@mail.ru','рома',1,2,2),(39,'test','экранирование','2020-05-17 15:23:14','admin@mail.ru','admin',0,1,4),(40,'test2','test2','2020-05-19 14:57:13','admin@mail.ru','admin',1,1,1),(41,'экранировнаие','','2020-05-20 21:44:01','admin@mail.ru','admin',1,5,3);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `c_user_idx` (`created_by`),
  CONSTRAINT `c_user` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sections`
--

LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` VALUES (1,1,'Основные','по работе','2020-05-08 11:45:41',27),(2,1,'Основные','личные','2020-05-08 11:45:41',27),(3,2,'Оповещения','по работе','2020-05-08 11:45:41',27),(4,2,'Оповещения','личные','2020-05-08 11:45:41',27),(5,3,'Спам','спам','2020-05-08 13:32:10',25);
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `activity` tinyint(1) DEFAULT '1',
  `phone` varchar(20) DEFAULT NULL,
  `can_mail` tinyint(1) DEFAULT '1',
  `time` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (25,'anna','$2y$11$phPePGUuJu9mE.cfsmOuK.SXDt7Cb/DrZ06XSfmeN9ip0Q7vEFi2a','anna.smith@mail.ru',1,'89222345678',1,'0'),(26,'bebe','$2y$11$whhCfQCtXQJv3rflqHJst.h1.PgBnSIx1srEFPSjS5IYHSKJ6I1gu','bebe@mail.ru',1,'89332345678',1,'0'),(27,'admin','$2y$11$hLAA2ZobVctv44tX3KQeku88KBg5m9NaLiWIqfs8CIn7SEyM4CnVG','admin@mail.ru',1,'82223345566',1,'12:49:49'),(28,'рома','$2y$11$Nq5pQaYOZvF5rDpVbwFrZebcUAIZEBJR9d/hjrDKkGY/02LZSmNRC','roman@mail.ru',1,'89282947911',1,'13:37:33'),(29,'юлия','$2y$11$7vWNEbdmtzUKHBUzF/9O1uyZJwA0LkrNbWLlhAFLWH/xQkL320pZ2','yul@gmail.com',1,'89282227962',1,'12:28:12'),(30,'Рома ВЫСОЦКИЙ','$2y$11$kskVNRgxDyuu6fxgTTucy.S.SOnqT7o5ImZXQ8jka7GzE4d86zqES','vyssotskaya.yulia@gmail.com',1,'89282947962',1,'13:03:18'),(31,'мама','$2y$11$iin2tMn09YhkGW.OBA72ZuiV1apGEx6qBS0n9ABJUHoR6U.FXKHLW','vyssotskaya@gmail.com',1,'89282947922',1,'13:08:44'),(32,'test','$2y$11$fTg4fymeIJTCvmpwtqDDmOEFhiw5.2bOFirDoBjUCF5RxfjRjwL26','test@mail.ru',1,'111111111',1,'13:18:06');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_groups` (
  `id_users` int(11) NOT NULL,
  `id_groups` int(11) NOT NULL,
  PRIMARY KEY (`id_users`,`id_groups`),
  KEY `c_id_groups_idx` (`id_groups`),
  CONSTRAINT `c_id_group` FOREIGN KEY (`id_groups`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `c_id_user` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (25,1),(27,1),(30,1),(31,1),(26,2),(28,2),(25,3),(27,3),(28,3),(26,4),(28,4),(32,4);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-22 11:55:06
