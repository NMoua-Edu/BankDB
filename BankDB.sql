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
  `CHECKING` varchar(45) NOT NULL,
  `SAVING` varchar(45) NOT NULL,
  PRIMARY KEY (`ACCOUNT_TYPE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_type`
--

LOCK TABLES `account_type` WRITE;
/*!40000 ALTER TABLE `account_type` DISABLE KEYS */;
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
  `ACCOUNT_BALANCE` float NOT NULL,
  `CUSTOMER_ACCOUNT_ID` varchar(45) NOT NULL,
  `ADMIN_ACCOUNT_ID` varchar(45) NOT NULL,
  `Users_USER_ID` int NOT NULL,
  `Account_TYPE_ACCOUNT_TYPE_ID` int NOT NULL,
  PRIMARY KEY (`ACCOUNTS_ID`),
  KEY `fk_ACCOUNTS_Users1_idx` (`Users_USER_ID`),
  KEY `fk_ACCOUNTS_Account_TYPE1_idx` (`Account_TYPE_ACCOUNT_TYPE_ID`),
  CONSTRAINT `fk_ACCOUNTS_Account_TYPE1` FOREIGN KEY (`Account_TYPE_ACCOUNT_TYPE_ID`) REFERENCES `account_type` (`ACCOUNT_TYPE_ID`),
  CONSTRAINT `fk_ACCOUNTS_Users1` FOREIGN KEY (`Users_USER_ID`) REFERENCES `users` (`USER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
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
  `TRANSFERS` float NOT NULL,
  `DEPOSITS` float NOT NULL,
  `WITHDRAWALS` float NOT NULL,
  PRIMARY KEY (`TRANSACTION_TYPE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction_type`
--

LOCK TABLES `transaction_type` WRITE;
/*!40000 ALTER TABLE `transaction_type` DISABLE KEYS */;
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
  `TRANSACTION_APPROVAL` varchar(45) NOT NULL,
  `TRANSACTION_FROM` varchar(45) NOT NULL,
  `TRANSACTION_TO` varchar(45) NOT NULL,
  `ACCOUNTS_ACCOUNTS_ID` int NOT NULL,
  `TRANSACTION_TYPE_TRANSACTION_TYPE_ID` int NOT NULL,
  PRIMARY KEY (`TRANSACTIONS_ID`),
  KEY `fk_TRANSACTIONS_ACCOUNTS1_idx` (`ACCOUNTS_ACCOUNTS_ID`),
  KEY `fk_TRANSACTIONS_TRANSACTION_TYPE1_idx` (`TRANSACTION_TYPE_TRANSACTION_TYPE_ID`),
  CONSTRAINT `fk_TRANSACTIONS_ACCOUNTS1` FOREIGN KEY (`ACCOUNTS_ACCOUNTS_ID`) REFERENCES `accounts` (`ACCOUNTS_ID`),
  CONSTRAINT `fk_TRANSACTIONS_TRANSACTION_TYPE1` FOREIGN KEY (`TRANSACTION_TYPE_TRANSACTION_TYPE_ID`) REFERENCES `transaction_type` (`TRANSACTION_TYPE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'a','123','ab','bc','a@a.com'),(2,2,'User','123','FIrst','last','e@gmail.com'),(3,2,'Names','123','hi','man','132@gmail.com'),(4,2,'dafd','123','fie','name','ere@gmail.com'),(5,1,'A13','123','hi','mane','er123e@gmail.com'),(6,2,'dafds','123','re','we','fdd@gmail.com'),(7,2,'a132','123','first2','name','e2@gmail.com'),(8,2,'asdfads','asd','as','asd','aew@gmail.com'),(9,2,'fdsafa','$2y$10$HZJ2uYXej3KVaOLsoEVdHengH7GUMo1mUkfWP/4sLUENJlff5ad/i','weew','we','hadfg@gmail.com'),(10,2,'kj','$2y$10$8qnYHxYN6YOxHxYDnBfBcez1MtwZg69dwr7JUmkpEK6eWRbYfcpIS','sh','ew','ewrew@gmail.com'),(11,2,'Hello','$2y$10$KEed.Gy13EFKl/lyqgSR4O9ouLehApMane4bUlRV7bss4K/4P1Qau','hi','my','wee@gmail.com');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'bankdb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-03-23 15:56:47
