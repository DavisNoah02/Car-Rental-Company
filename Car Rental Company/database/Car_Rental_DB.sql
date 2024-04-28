CREATE DATABASE  IF NOT EXISTS `car_rental_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
-- CREATE DATABASE IF NOT EXISTS `car_rental_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `car_rental_db`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: car_rental_db
-- ------------------------------------------------------
-- Server version	8.0.35

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
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `car_id` int NOT NULL,
  `booking_date` datetime NOT NULL,
  `selected_dates` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `car_id` (`car_id`),
  CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cars` (
  `id` int NOT NULL AUTO_INCREMENT,
  `car_name` varchar(100) NOT NULL,
  `car_type` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `car_image` varchar(255) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `engine_type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cars`
--

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` VALUES (1,'Toyota Camry','sedan',6500.00,1,'\\assets\\images\\Cars\\toyota-camry.jpg','Chuka','Toyota','Camry','Petrol'),(2,'Honda Civic','sedan',4900.00,0,'\\assets\\images\\Cars\\Honda civic.jpg','Nairobi','Honda','Civic','Hybrid'),(3,'Tesla Model 3','sedan',7000.00,1,'\\assets\\images\\Cars\\Tesla model 3.jpg','Chuka','Tesla','Model 3','Electric'),(4,'Chevrolet Malibu','sedan',5400.00,0,'\\assets\\images\\Cars\\Chevrolet-Malibu.JPG','Chuka','Chevrolet ','Malibu','Diesel'),(5,'Nissan Altima','sedan',6300.00,0,'\\assets\\images\\Cars\\Nissan altima.jpg','Nairobi','Nissan  ','Altima','Petrol'),(6,'BMW 3 Series','SUV',12500.00,1,'\\assets\\images\\Cars\\BMW 3 series.jpg','Eldoret','BMW','3 Series','Diesel'),(7,'Audi A4','sedan',9400.00,0,'\\assets\\images\\Cars\\Audi A4.jpg','Chuka','Audi','A4','Petrol'),(8,'Mercedes-Benz C-Class','sedan',10600.00,0,'\\assets\\images\\Cars\\Mercedes-Benz_C.jpg','Mombasa','Mercedes-Benz','C-Class','Petrol'),(9,'Volkswagen Passat','sedan',6000.00,0,'\\assets\\images\\Cars\\volkswagen passat.jpg','Nairobi','Volkswagen ','Passat','Diesel'),(10,'Hyundai Sonata','sedan',4000.00,0,'\\assets\\images\\Cars\\hyndai sonata.jpg','Eldoret','Hyundai','Sonata','Petrol'),(11,'Kia Optima','sedan',5100.00,0,'\\assets\\images\\Cars\\kia-optima.jpg','Chuka','Kia','Optima','Petrol'),(12,'Subaru Impreza','sedan',7900.00,1,'\\assets\\images\\Cars\\subaru impreza.jpg','Nairobi','Subaru','Impreza','Petrol'),(13,'Lexus ES','sedan',14100.00,0,'\\assets\\images\\Cars\\Lexus-es.jpg','Mombasa','Lexus','ES','Diesel'),(14,'Mazda6','sedan',9000.00,0,'\\assets\\images\\Cars\\mazda 6.jpg','Nairobi','Mazda','6','Petrol'),(15,'Ford Mustang','SUV',15000.00,0,'\\assets\\images\\Cars\\ford mustang.jpg','Mombasa','Ford ','3 Series','Petrol'),(16,'Chevrolet Impala','sedan',6600.00,0,'\\assets\\images\\Cars\\Chevrolet-Impala.jpg','Chuka','Chevrolet','Impala','Diesel'),(17,'Acura TLX','sedan',5000.00,0,'\\assets\\images\\Cars\\Acura TLX.jpg','Eldoret','Acura','TLX','Petrol'),(18,'Infiniti Q50','sedan',4900.00,0,'\\assets\\images\\Cars\\Infinity Q50.jpg','Chuka','Infiniti','Q50','Diesel'),(19,'Porsche 911','convertible',25000.00,1,'\\assets\\images\\Cars\\Porsche 911.jpg','Mombasa','Porsche','911','Petrol'),(20,'Jaguar XF','sedan',13800.00,0,'\\assets\\images\\Cars\\Jaguar XF.jpg','Eldoret','Jaguar','XF','Petrol');
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'Noah','noahdavemunene@gmail.com','123Lee.');
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

-- Dump completed on 2023-11-10 17:14:30
