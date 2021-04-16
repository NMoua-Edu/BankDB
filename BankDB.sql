-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bankdb
-- ------------------------------------------------------
-- Server version	8.0.23

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
-- Table structure for table `account_type`
--

DROP TABLE IF EXISTS `account_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_type` (
  `ACCOUNT_TYPE_ID` int NOT NULL AUTO_INCREMENT,
  `CHECKING` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `SAVING` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`ACCOUNT_TYPE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_type`
--

LOCK TABLES `account_type` WRITE;
/*!40000 ALTER TABLE `account_type` DISABLE KEYS */;
INSERT INTO `account_type` VALUES (1,'4',' '),(3,'4',NULL),(4,'4',NULL),(5,'3',NULL),(6,'3',NULL),(7,NULL,'4'),(8,'3',NULL),(9,NULL,'4'),(10,'3',NULL),(11,NULL,'4'),(12,'3',NULL),(13,NULL,'4'),(14,'3',NULL),(15,NULL,'4'),(16,NULL,'4'),(17,NULL,'4'),(18,NULL,'4'),(19,NULL,'4'),(20,'3',NULL),(21,NULL,'4'),(22,NULL,'4'),(23,NULL,'4'),(24,NULL,'4'),(25,NULL,'4'),(26,NULL,'4'),(27,NULL,'4'),(28,NULL,'4'),(29,NULL,'4'),(30,NULL,'4'),(31,NULL,'4'),(32,NULL,'4'),(33,NULL,'4'),(34,NULL,'4'),(35,NULL,'4'),(36,NULL,'4'),(37,NULL,'4'),(38,NULL,'4'),(39,NULL,'4'),(40,NULL,'4'),(41,NULL,'4'),(42,NULL,'4'),(43,NULL,'4'),(44,NULL,'4'),(45,NULL,'4'),(46,'3',NULL),(47,NULL,'4'),(48,NULL,'4'),(49,NULL,'4'),(50,NULL,'4'),(51,NULL,'4'),(52,NULL,'4'),(53,NULL,'4'),(54,NULL,'4'),(55,NULL,'4'),(56,NULL,'4'),(57,NULL,'4'),(58,NULL,'4'),(59,NULL,'4'),(60,NULL,'4'),(61,NULL,'4'),(62,NULL,'4'),(63,NULL,'4'),(64,'3',NULL),(65,'3',NULL),(66,NULL,'4'),(67,'3',NULL),(68,NULL,'4'),(69,NULL,'4'),(70,'3',NULL),(71,'3',NULL),(72,'3',NULL),(73,NULL,'4'),(75,'3',NULL);
/*!40000 ALTER TABLE `account_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accounts` (
  `ACCOUNTS_ID` int NOT NULL AUTO_INCREMENT,
  `ACCOUNT_BALANCE` float NOT NULL DEFAULT '0',
  `Users_USER_ID` int NOT NULL,
  `Account_TYPE_ACCOUNT_TYPE_ID` int NOT NULL,
  PRIMARY KEY (`ACCOUNTS_ID`),
  KEY `fk_ACCOUNTS_Users1_idx` (`Users_USER_ID`),
  KEY `fk_ACCOUNTS_Account_TYPE1_idx` (`Account_TYPE_ACCOUNT_TYPE_ID`),
  CONSTRAINT `fk_ACCOUNTS_Account_TYPE1` FOREIGN KEY (`Account_TYPE_ACCOUNT_TYPE_ID`) REFERENCES `account_type` (`ACCOUNT_TYPE_ID`),
  CONSTRAINT `fk_ACCOUNTS_Users1` FOREIGN KEY (`Users_USER_ID`) REFERENCES `users` (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (2,0,10,8),(3,5,10,9),(4,0,15,29),(5,0,20,63),(6,0,20,64),(7,0,21,65),(8,0,21,66),(9,0,22,67),(10,10.5,22,68),(11,0,23,69),(12,0,23,70),(13,0,23,71),(14,0,24,72),(15,0,24,73),(17,0,22,75);
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction_type`
--

DROP TABLE IF EXISTS `transaction_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transaction_type` (
  `TRANSACTION_TYPE_ID` int NOT NULL AUTO_INCREMENT,
  `TRANSFERS` float DEFAULT NULL,
  `DEPOSITS` float DEFAULT NULL,
  `WITHDRAWALS` float DEFAULT NULL,
  PRIMARY KEY (`TRANSACTION_TYPE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction_type`
--

LOCK TABLES `transaction_type` WRITE;
/*!40000 ALTER TABLE `transaction_type` DISABLE KEYS */;
INSERT INTO `transaction_type` VALUES (1,NULL,5,NULL);
/*!40000 ALTER TABLE `transaction_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transactions` (
  `TRANSACTIONS_ID` int NOT NULL AUTO_INCREMENT,
  `AMOUNT_OF_TRANSACTION` float NOT NULL,
  `TRANSACTION_APPROVAL` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `TRANSACTION_FROM` varchar(45) NOT NULL,
  `TRANSACTION_TO` varchar(45) NOT NULL,
  `ACCOUNTS_ACCOUNTS_ID` int NOT NULL,
  `TRANSACTION_TYPE_TRANSACTION_TYPE_ID` int NOT NULL,
  PRIMARY KEY (`TRANSACTIONS_ID`),
  KEY `fk_TRANSACTIONS_ACCOUNTS1_idx` (`ACCOUNTS_ACCOUNTS_ID`),
  KEY `fk_TRANSACTIONS_TRANSACTION_TYPE1_idx` (`TRANSACTION_TYPE_TRANSACTION_TYPE_ID`),
  CONSTRAINT `fk_TRANSACTIONS_ACCOUNTS1` FOREIGN KEY (`ACCOUNTS_ACCOUNTS_ID`) REFERENCES `accounts` (`ACCOUNTS_ID`),
  CONSTRAINT `fk_TRANSACTIONS_TRANSACTION_TYPE1` FOREIGN KEY (`TRANSACTION_TYPE_TRANSACTION_TYPE_ID`) REFERENCES `transaction_type` (`TRANSACTION_TYPE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,26,'Yes','Bob','John',10,1),(2,20,'No','family','john',10,1);
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `USER_ID` int NOT NULL AUTO_INCREMENT,
  `USER_TYPE_USER_TYPE_ID` int NOT NULL,
  `USER_NAME` varchar(45) NOT NULL,
  `PASSWORD` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `FIRST_NAME` varchar(45) NOT NULL,
  `LAST_NAME` varchar(45) NOT NULL,
  `EMAIL_ADDRESS` varchar(45) NOT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'a','123','ab','bc','a@a.com'),(2,2,'User','123','FIrst','last','e@gmail.com'),(3,2,'Names','123','hi','man','132@gmail.com'),(4,2,'dafd','123','fie','name','ere@gmail.com'),(5,1,'A13','123','hi','mane','er123e@gmail.com'),(6,2,'dafds','123','re','we','fdd@gmail.com'),(7,2,'a132','123','first2','name','e2@gmail.com'),(8,2,'asdfads','asd','as','asd','aew@gmail.com'),(9,2,'fdsafa','$2y$10$HZJ2uYXej3KVaOLsoEVdHengH7GUMo1mUkfWP/4sLUENJlff5ad/i','weew','we','hadfg@gmail.com'),(10,2,'kj','$2y$10$8qnYHxYN6YOxHxYDnBfBcez1MtwZg69dwr7JUmkpEK6eWRbYfcpIS','sh','ew','ewrew@gmail.com'),(11,2,'Hello','$2y$10$KEed.Gy13EFKl/lyqgSR4O9ouLehApMane4bUlRV7bss4K/4P1Qau','hi','my','wee@gmail.com'),(12,2,'name123','$2y$10$rdPqQQkmuuupN.VKu5m9CeCEpLwHPS6xbXX6x.Zim.KI9P81KHJJu','first ','name','ead@gmail.com'),(13,2,'username123','$2y$10$b63fWl3rJexmx8njX92uve6.SfmMyvY86zTXNjPV1a1wHTL1JM79K','User','name','name@gmail.com'),(14,1,'testing','$2y$10$yyNAWsKf6uWMfi9YyHnkwuLgg1HZ00uEqZ20Lh7t5N1DzhaEBVaEq','test','test','test@gmail.com'),(15,2,'kcljlkajsdlkfj','$2y$10$tDO2Mambv0m0j6h2WHH/suBhAZfq71LpJrXq6/NPPtHi86Wy.E4ju','adsf','saadfs','afda@gadfg.com'),(16,2,'testingname','$2y$10$n9I9wNA2.5mfK7KS2iLOMem5wslgM..zsneTWMr9GJGps9z56dncS','testingname','testingname1','testingwer@gmail.com'),(17,2,'testing1','$2y$10$SYGUX1EbmfKpoTIawPR3QuiPbW5obFju191v0Bc04J89wGv.IdVh2','testing','test','adsadsfasdf@gmail.com'),(18,2,'testing123','$2y$10$cl3CheyOnZ8lEjkmn37jwOr/EYMCZJ13cLLbHXfvHYS33ZAu8Zizu','test','hi','agkjdsladks@kajklsfjkl.com'),(19,2,'test','$2y$10$dagA2dgR44KxLB./k7N10OEqXz0Hff5pFd64iFM23zLvFkLgFGiPq','asdfa','adsafsd','hgasdf@gmail.copm'),(20,2,'dsa','$2y$10$EjnTknPRaDfd8eB6WZVT2O1IuRfFM/Bz8W30gUb3aqbdQ.eDbNW8W','asdf','qwe','trtr@mail.com'),(21,2,'op','$2y$10$SbjY/1z5u75/tZPVFaJ5o.cDC5ABei3ZCbJA08cj1qz3A/yyyt5Mu','asdfadsf','faasd','kkjkk@gmail.com'),(22,2,'tyt','$2y$10$B4abTovv4yZeXDC3deGOo.V0V9LuNe/z0cKoEHii4TcJcJ7tEEjS6','kljgkl','kljklkl','safdasd@gmail.com'),(23,2,'kgkg','$2y$10$hUt5vAGXx3acFuCP1Fx.cO0o5z4WDWMNaw/ZV7DV7sv683Ft.6.4G','dslafjk','kljklsaj','kjk@gmail.com'),(24,1,'admin','$2y$10$3jQzL/e9lSKIf3bONcGL4uvZfwHfV3KbGTOzYSCqwVrFvDwdNjYBe','admin','test','admin@test.com'),(25,2,'lkj','$2y$10$a8t.NOSw4PGntAhpxOPYOuz31UZq1zLPIJxYklBQg/kzzkCFHaYoa','kj','jk','jk@gmail.com');
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

-- Dump completed on 2021-04-16  8:58:52
