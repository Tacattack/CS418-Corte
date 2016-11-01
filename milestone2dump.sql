-- MySQL dump 10.13  Distrib 5.5.52, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: QuestionAnswer
-- ------------------------------------------------------
-- Server version       5.5.52-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0
*/;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `QuestionAnswer`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `QuestionAnswer` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `QuestionAnswer`;
--
-- Table structure for table `Questions`
--

DROP TABLE IF EXISTS `Answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Answers` (
  `AnswerID` int(11) NOT NULL AUTO_INCREMENT,
  `questionID` int(250) NOT NULL,
  `answerScore` int(250) NOT NULL,
  `answerBody` varchar(250) NOT NULL,
  PRIMARY KEY (`AnswerID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Questions`
--

LOCK TABLES `Answers` WRITE;
/*!40000 ALTER TABLE `Answers` DISABLE KEYS */;
INSERT INTO `Answers` VALUES (1,1,1,'That is how do');
INSERT INTO `Answers` VALUES (2,1,-1,'This is also how do');
INSERT INTO `Answers` VALUES (3,1,6,'To do how or not how do to');
INSERT INTO `Answers` VALUES (4,2,100,'Do you even monies?');
INSERT INTO `Answers` VALUES (5,2,-250,'U Giv Dem Da MicroTransactions for da monies');
INSERT INTO `Answers` VALUES (6,2,50,'2 Stoopid For da Monies!');
INSERT INTO `Answers` VALUES (7,3,-250,'Unity For The Win!!');
INSERT INTO `Answers` VALUES (8,3,50,'One Does Not Simply Unreal');
INSERT INTO `Answers` VALUES (9,4,50,'The cake means you die you stoopid gamer 12 year old');
INSERT INTO `Answers` VALUES (10,5,300,'Civilization Strategy Game FTW!!');
INSERT INTO `Answers` VALUES (11,5,75,'All about that Shooter Genre');
INSERT INTO `Answers` VALUES (12,5,50,'PC Musterd Race!');
INSERT INTO `Answers` VALUES (13,5,-300,'Consoles For the Win');
INSERT INTO `Answers` VALUES (14,5,200,'I like simulation');
INSERT INTO `Answers` VALUES (15,8,200,'The short answer is no');
INSERT INTO `Answers` VALUES (16,8,200,'It is worth it if you like the quick and easy monies');
/*!40000 ALTER TABLE `Answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Questions`
--

DROP TABLE IF EXISTS `Questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questionScore` int(250) NOT NULL,
  `questionTitle` varchar(250) NOT NULL,
  `questionBody` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Questions`
--

LOCK TABLES `Questions` WRITE;
/*!40000 ALTER TABLE `Questions` DISABLE KEYS */;
INSERT INTO `Questions` VALUES (1,10,'Game Dev In Need Of Help','How Do?');
INSERT INTO `Questions` VALUES (2,-100,'Help A Stoopid Game Dev','How do I make all the monies from the stoopid gamers?');
INSERT INTO `Questions` VALUES (3,100,'Which is Better?','Im looking for an engine to use. Which is better? Unity or Unreal?');
INSERT INTO `Questions` VALUES (4,-50,'Is The Cake Really A Lie?','Was just wondering if the cake really is a lie. Can someone help me?');
INSERT INTO `Questions` VALUES (5,300,'Best Game Genre?','Im doing a report on the best game genre. What is it?');
INSERT INTO `Questions` VALUES (6,0,'I need game dev machine','Trying to find a new game dev machine. Any help would be nice');
INSERT INTO `Questions` VALUES (7,0,'Do mechanics actually work?','Game mechanics are important. Do they actually work though?');
INSERT INTO `Questions` VALUES (8,0,'Is Mobile Game Dev worth it','Is trying to become a mobile game developer worth the struggle?');
/*!40000 ALTER TABLE `Questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UserProfile`
--

DROP TABLE IF EXISTS `UserProfile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UserProfile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(50) NOT NULL,
  `password` char(50) NOT NULL,
  `email` char(50) NOT NULL,
  `userImage` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UserProfile`
--

LOCK TABLES `UserProfile` WRITE;
/*!40000 ALTER TABLE `UserProfile` DISABLE KEYS */;
/*!40000 ALTER TABLE `UserProfile` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

---
--- Table Structure for  Logged in User DB
---
DROP TABLE IF EXISTS `Users`;

CREATE TABLE `Users`(
`id` int(11) NOT NULL AUTO_INCREMENT,
`username` char(50) NOT NULL,
`password` char(50) NOT NULL,
PRIMARY KEY (`id`)
)ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;


---
--- Dumping data for table `Users`
---

LOCK TABLES `Users` WRITE;
INSERT INTO `Users` VALUES(16,'nbenfiel','password');
INSERT INTO `Users` VALUES(17,'tcorte','password');
UNLOCK TABLES;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

