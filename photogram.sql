-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: photogram
-- ------------------------------------------------------
-- Server version	8.0.34-0ubuntu0.23.04.1

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
-- Table structure for table `auth`
--

DROP TABLE IF EXISTS `auth`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `active` int NOT NULL DEFAULT '1',
  `blocked` int NOT NULL DEFAULT '0',
  `sec_email` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth`
--

LOCK TABLES `auth` WRITE;
/*!40000 ALTER TABLE `auth` DISABLE KEYS */;
INSERT INTO `auth` VALUES (1,'saran','$2y$09$M.pejZGyxK8I70ImYoAxUuOa2pipujQyHtsFN48fJGwSbSU3gVrP.','saranmass685@gmail.com','9600317637',1,0,NULL),(2,'fubu','$2y$09$2UYAmnVcuyHdHUwhT6BNj.jj5RX84KrzI.fpXKKJVUWA5m6D/03Cy','fubu@support.com','9042101354',1,0,NULL),(3,'hacker','$2y$09$SUcaJN5W6NDdh1RHlWqxROpnIGINacP14O2prtnpfK/yq/WgW3WY2','test@lahtp.com','4444433335',1,0,NULL);
/*!40000 ALTER TABLE `auth` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `group` (
  `id` int NOT NULL AUTO_INCREMENT,
  `g_avatar` varchar(1024) NOT NULL,
  `g_title` varchar(45) NOT NULL,
  `uploaded_time` datetime NOT NULL,
  `owner` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group`
--

LOCK TABLES `group` WRITE;
/*!40000 ALTER TABLE `group` DISABLE KEYS */;
INSERT INTO `group` VALUES (1,'/groupavatar/f758bb66641c32ac02d823d98fceb09d.jpeg','The Boys','2023-09-18 11:42:23','saran');
/*!40000 ALTER TABLE `group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group_messages`
--

DROP TABLE IF EXISTS `group_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `group_messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `group_id` int NOT NULL,
  `sender_id` int NOT NULL,
  `status` int NOT NULL,
  `message` longtext NOT NULL,
  `timestamp` timestamp NOT NULL,
  `owner` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_messages`
--

LOCK TABLES `group_messages` WRITE;
/*!40000 ALTER TABLE `group_messages` DISABLE KEYS */;
INSERT INTO `group_messages` VALUES (1,1,1,0,'hi','2023-09-16 04:48:39','saran'),(2,1,2,0,'hi bro','2023-09-16 04:50:06','fubu');
/*!40000 ALTER TABLE `group_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `likes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL,
  `status` varchar(8) NOT NULL,
  `timestamp` timestamp NOT NULL,
  `owner` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (1,1,164,'unliked','2023-09-16 06:24:51','saran'),(2,1,160,'unliked','2023-09-17 11:29:54','saran'),(3,1,163,'unliked','2023-09-17 11:33:15','saran'),(4,1,161,'liked','2023-09-17 11:33:29','saran'),(5,2,164,'unliked','2023-09-18 03:43:06','fubu'),(6,2,161,'liked','2023-09-18 03:43:25','fubu');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userid` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `post_text` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  `multiple_images` varchar(1024) COLLATE utf8mb4_general_ci NOT NULL,
  `image_uri` varchar(1024) COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` varchar(1024) COLLATE utf8mb4_general_ci NOT NULL,
  `like_count` int NOT NULL,
  `uploaded_time` datetime NOT NULL,
  `owner` varchar(225) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (160,'1','','0','/files/2149a7561204318ff0f79930af6b6540.jpeg','/ava/17791e443b7b79bb3749a59bd0acc6e1.jpeg',0,'2023-09-04 18:21:16','saran'),(161,'2','','0','/files/8d30486aa7398d5de3b75c576c8c2172.jpeg','/ava/794e823cb13d9fc5634c54fa67f6640b.jpeg',2,'2023-09-04 18:29:41','fubu'),(163,'2','','0','/files/0c324ddec13729b364add49497369b88.jpeg','/ava/794e823cb13d9fc5634c54fa67f6640b.jpeg',0,'2023-09-07 18:45:16','fubu'),(164,'2','','0','/files/2528f1ee3ed1a71bc3630783155043e0.jpeg','/ava/794e823cb13d9fc5634c54fa67f6640b.jpeg',0,'2023-09-07 18:45:46','fubu');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `session` (
  `id` int NOT NULL AUTO_INCREMENT,
  `uid` int NOT NULL,
  `token` varchar(32) COLLATE utf8mb4_general_ci NOT NULL,
  `login_time` datetime NOT NULL,
  `ip` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `user_agent` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `active` int NOT NULL,
  `fingerprint` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `session`
--

LOCK TABLES `session` WRITE;
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
INSERT INTO `session` VALUES (3,1,'648d6aa475e585cb42f5ba291efccf7c','2023-09-15 22:03:41','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(4,1,'2e68c259e4c791dde84ca2a754e83cad','2023-09-15 22:53:06','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(5,1,'eca8e3d78ca2416883c387a714d67d77','2023-09-15 23:07:57','127.0.0.1','Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(6,1,'4d13f132ca65425e5b8cd8d1267010cf','2023-09-15 23:16:39','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(7,1,'c99b1bb6931e740e1bde4525358de5cb','2023-09-15 23:18:27','127.0.0.1','Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(8,1,'ad21f83fbefb3ad2562fddd405484e2d','2023-09-15 23:21:38','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(9,1,'2e810eaedff1539cacb3f37a3bcd8f48','2023-09-16 10:21:11','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(10,1,'ebbe9e73e50d9093b39962de488b10f8','2023-09-16 10:53:59','127.0.0.1','Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(11,1,'afb1b76c09318b970867212190aaf01b','2023-09-16 11:48:23','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(12,1,'29842c86010826ce6aab3c2f0b754957','2023-09-16 13:54:22','127.0.0.1','Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(13,1,'19ea4cb7ba25efb92921c26bdda0438c','2023-09-16 14:01:11','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(14,1,'225c691a5ac8ef79fdc807f4f53ae8a0','2023-09-16 15:06:14','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(15,1,'283236b3999a894528d3a9ae95a832ff','2023-09-16 16:22:19','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(16,1,'94a42d0afda28a1add9657b87bef79d9','2023-09-16 16:54:08','127.0.0.1','Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(17,1,'a5a311053c4dcb47cc0202ff99d76f39','2023-09-16 17:15:35','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(18,1,'179d3b64fcb4e7d93e798f6e50b56ff1','2023-09-16 18:40:56','127.0.0.1','Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(19,1,'c12304b7a1436b41676428168cf2e81e','2023-09-16 18:44:21','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(20,1,'ccb8c30445db63185963b46df11a338a','2023-09-17 12:55:30','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(21,1,'5e01a0170eb9de8256f3e2709260ccdc','2023-09-17 16:35:44','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(22,1,'a985423eca48dc948730ea9ac58f8852','2023-09-17 17:58:34','127.0.0.1','Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(23,1,'2131c65aeee7c6ef3907e2c6f3cd6257','2023-09-17 18:02:47','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(24,1,'17f78739657e4c6ff0d8e24a3659f1d0','2023-09-17 18:54:29','127.0.0.1','Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(25,1,'99f7d6019abf9a1e2cae92224f3e6cf2','2023-09-17 18:57:36','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(26,1,'e51ed12b45fa85ce2639d27db9f083c2','2023-09-17 19:57:07','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(29,1,'ae7ba5ba277d3a89b3082511257fedd0','2023-09-18 09:13:52','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(30,1,'e7b5dd3d3c704e899918f893147ecfda','2023-09-18 09:16:48','127.0.0.1','Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(31,1,'74993238944b991e0e20853140b7a87e','2023-09-18 09:18:04','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(32,1,'2c32cef4a7a2138b031d35488328df58','2023-09-18 11:22:25','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(33,1,'ecfb7de284c8043b9282234b23e28640','2023-09-18 11:34:38','127.0.0.1','Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(34,1,'c1459c1311b00cf2267ef759139fb5bb','2023-09-18 11:36:57','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(35,1,'67f00d46c87db78b61f05fd8bb8c0d1b','2023-09-18 11:43:55','127.0.0.1','Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Mobile Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(36,1,'749c76b502864ad1c8919f47a9b6a113','2023-09-18 11:48:41','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(37,1,'1eb213e3fc14c6f85c5f9859ddb57559','2023-09-18 14:45:57','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(38,1,'22b795ef80898205f3c9fcbf0d14bc79','2023-09-18 16:49:02','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(39,1,'1eff059359376a8b60c4e64b81136a9d','2023-09-18 19:53:23','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(40,1,'8a4c087eb4523af12dab8c20dcf68fe6','2023-09-18 20:49:53','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e'),(41,1,'873baa7f84eb6d6c3534f5131911544d','2023-09-19 17:29:18','127.0.0.1','Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/116.0.0.0 Safari/537.36',1,'3e326e34468453df86c34c6b2f397c4e');
/*!40000 ALTER TABLE `session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userid` varchar(5) NOT NULL,
  `bio` longtext NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `dob` date NOT NULL,
  `linkname` varchar(50) NOT NULL,
  `link` varchar(1024) NOT NULL,
  `uploaded_time` datetime DEFAULT NULL,
  `owner` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'1','hi bro','/ava/17791e443b7b79bb3749a59bd0acc6e1.jpeg','Male','2004-03-29','','saran.selfmade.one','2023-08-26 13:21:19','saran'),(2,'2','Hey there! I am using Photogram','/ava/794e823cb13d9fc5634c54fa67f6640b.jpeg','','2023-08-26','','','2023-08-27 14:21:19','fubu'),(3,'3','Hey there! I am using Photogram','/ava/avatar.jpg','','2023-09-06','','','2023-09-06 12:02:12','hacker'),(4,'4','Hey there! I am using Photogram','/ava/avatar.jpg','','2023-09-09','','','2023-09-09 11:12:32','test');
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

-- Dump completed on 2023-09-19 17:38:33
