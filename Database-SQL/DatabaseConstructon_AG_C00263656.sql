-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               8.0.32 - MySQL Community Server - GPL
-- Server OS:                    Linux
-- HeidiSQL Version:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for Key_Management
CREATE DATABASE IF NOT EXISTS `Key_Management` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `Key_Management`;

-- Dumping structure for table Key_Management.Key_Manager_Antigen
CREATE TABLE IF NOT EXISTS `Key_Manager_Antigen` (
  `antigen_mgmr_id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(65) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `antigen_key` binary(50) NOT NULL DEFAULT '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0',
  PRIMARY KEY (`antigen_mgmr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table Key_Management.Key_Manager_CloseContacts
CREATE TABLE IF NOT EXISTS `Key_Manager_CloseContacts` (
  `cc_mgmr_id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(50) NOT NULL DEFAULT '',
  `cc_key` binary(50) NOT NULL,
  PRIMARY KEY (`cc_mgmr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table Key_Management.Key_Manager_Data
CREATE TABLE IF NOT EXISTS `Key_Manager_Data` (
  `managementID` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(65) NOT NULL DEFAULT '0',
  `key_value` binary(50) NOT NULL,
  PRIMARY KEY (`managementID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.


-- Dumping database structure for Sentinel
CREATE DATABASE IF NOT EXISTS `Sentinel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `Sentinel`;

-- Dumping structure for table Sentinel.Antigens
CREATE TABLE IF NOT EXISTS `Antigens` (
  `antigen_ID` int NOT NULL AUTO_INCREMENT,
  `DateOfTest` varchar(100) NOT NULL DEFAULT '',
  `AG_Image` longblob NOT NULL,
  `FK_UserID` int NOT NULL,
  PRIMARY KEY (`antigen_ID`),
  KEY `FK1_UserID` (`FK_UserID`),
  CONSTRAINT `FK1_UserID` FOREIGN KEY (`FK_UserID`) REFERENCES `User` (`user_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table Sentinel.Close_Contacts
CREATE TABLE IF NOT EXISTS `Close_Contacts` (
  `CC_ID` int NOT NULL AUTO_INCREMENT,
  `CC_FirstName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `CC_LastName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `CC_Phone` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `FK_userID` int NOT NULL,
  PRIMARY KEY (`CC_ID`),
  KEY `FK2_UserID` (`FK_userID`),
  CONSTRAINT `FK2_UserID` FOREIGN KEY (`FK_userID`) REFERENCES `User` (`user_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

-- Dumping structure for table Sentinel.User
CREATE TABLE IF NOT EXISTS `User` (
  `user_ID` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '' COMMENT 'No encryption required, key length sticks at 30',
  `Password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `FirstName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `LastName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `Address1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `Address2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `County` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `Eircode` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `Dob` varchar(255) NOT NULL DEFAULT '',
  `Phone` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`user_ID`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
