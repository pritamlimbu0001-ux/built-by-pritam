-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: pritam_portfolio
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `contact_messages`
--

LOCK TABLES `contact_messages` WRITE;
/*!40000 ALTER TABLE `contact_messages` DISABLE KEYS */;
INSERT INTO `contact_messages` VALUES (1,'pritam limbu','pritamlimbu0001@gmail.com','monthly','5t4ht6',NULL,'2026-09-28 07:38:34','2026-09-28 07:38:34'),(2,'pritam limbu','pritamlimbu0001@gmail.com','monthly','egd g dg',NULL,'2026-09-28 07:44:08','2026-09-28 07:44:08');
/*!40000 ALTER TABLE `contact_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
INSERT INTO `profiles` VALUES (1,'Pritam Limbu','Computer Engineering Student & Web Developer','Nepal','I\'m a Computer Engineering student from Nepal, focused on building practical web applications with Laravel, PHP and MySQL. I enjoy turning ideas into working, real-world software ” like my futsal booking system.','I\'m Pritam Limbu, a Computer Engineering student based in Nepal. Alongside my studies, I develop practical skills in modern web development ” designing and building applications that solve everyday problems.\r\n\r\nMy main stack is Laravel, PHP and MySQL, with HTML, CSS, JavaScript and Tailwind CSS on the frontend. My favourite way to learn is by shipping real projects ” most recently, an online futsal booking system.\r\n\r\nI\'m still early in my journey, and I\'m committed to improving one project at a time. I\'m looking for opportunities to grow as a developer and contribute to meaningful work.','profile/WMDHvhJcEvhJakNrIFA2shg3wxVGZmfbRdYlrivL.png','2026-09-29 03:18:19','2026-09-29 10:35:52');
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,'Saptashree Futsal ” Online Booking System','saptashree-futsal','A modern futsal booking website built with Laravel, PHP and MySQL.','A modern futsal booking website built with Laravel, PHP and MySQL.\r\n\r\nCustomers can view futsal information, pick a date and time slot, and manage their bookings online.\r\n\r\nKey features:\r\n- Browse futsal information and available slots\r\n- Date & time slot selection for bookings\r\n- Booking management for customers','Laravel,PHP,MySQL,Blade','https://github.com/pritamlimbu0001-ux',NULL,'projects/RZqp3NigUjoNnrX0gxqHbqE1w9anhqAHB76AggZv.png',1,1,1,'2026-09-29 03:18:19','2026-09-29 05:25:47');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `resumes`
--

LOCK TABLES `resumes` WRITE;
/*!40000 ALTER TABLE `resumes` DISABLE KEYS */;
INSERT INTO `resumes` VALUES (1,'cv/pritam-limbu-cv.pdf','Pritam-Limbu-CV.pdf','2026-09-29 03:18:19','2026-09-29 03:18:19');
/*!40000 ALTER TABLE `resumes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `skills`
--

LOCK TABLES `skills` WRITE;
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
INSERT INTO `skills` VALUES (1,'HTML','Frontend',0,1,'2026-09-29 03:18:19','2026-09-29 03:18:19'),(2,'CSS','Frontend',0,2,'2026-09-29 03:18:19','2026-09-29 03:18:19'),(3,'JavaScript','Frontend',0,3,'2026-09-29 03:18:19','2026-09-29 03:18:19'),(4,'Tailwind CSS','Frontend',0,4,'2026-09-29 03:18:19','2026-09-29 03:18:19'),(5,'PHP','Backend',0,5,'2026-09-29 03:18:19','2026-09-29 03:18:19'),(6,'Laravel','Backend',0,6,'2026-09-29 03:18:19','2026-09-29 03:18:19'),(7,'MySQL','Database',0,7,'2026-09-29 03:18:19','2026-09-29 03:18:19'),(8,'Git','Tools',0,8,'2026-09-29 03:18:19','2026-09-29 03:18:19'),(9,'GitHub','Tools',0,9,'2026-09-29 03:18:19','2026-09-29 03:18:19'),(10,'VS Code','Tools',0,10,'2026-09-29 03:18:19','2026-09-29 03:18:19');
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `social_links`
--

LOCK TABLES `social_links` WRITE;
/*!40000 ALTER TABLE `social_links` DISABLE KEYS */;
INSERT INTO `social_links` VALUES (1,'GitHub','https://github.com/pritamlimbu0001-ux','github',1,1,'2026-09-29 03:18:19','2026-09-29 03:18:19');
/*!40000 ALTER TABLE `social_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Pritam Limbu','pritamlimbu0001@gmail.com',NULL,'$2y$12$VsNYXLvAypXyU8prbd/GoewK3F4Hc7TMtm4m0ptIMhdS5H6gp8Z8W',NULL,1,'2026-09-29 02:21:08','2026-09-29 02:21:08');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-09-29 22:25:30

