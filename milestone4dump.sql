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
  `answerBody` varchar(2000) NOT NULL,
  `answerPoster` varchar(250) NOT NULL,
  `bestAnswer` int (1) NOT NULL,
  PRIMARY KEY (`AnswerID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Questions`
--

LOCK TABLES `Answers` WRITE;
/*!40000 ALTER TABLE `Answers` DISABLE KEYS */;
INSERT INTO `Answers` VALUES (1,80,1,'That is how do','nbenfiel',0);
INSERT INTO `Answers` VALUES (2,1,-1,'This is also how do','nbenfiel',0);
INSERT INTO `Answers` VALUES (3,1,6,'To do how or not how do to','tcorte',0);
INSERT INTO `Answers` VALUES (4,2,100,'Do you even monies?','tcorte',0);
INSERT INTO `Answers` VALUES (5,2,-250,'U Giv Dem Da MicroTransactions for da monies','nbenfiel',0);
INSERT INTO `Answers` VALUES (6,2,50,'2 Stoopid For da Monies!','tcorte',0);
INSERT INTO `Answers` VALUES (7,3,-250,'Unity For The Win!!','nbenfiel',0);
INSERT INTO `Answers` VALUES (8,3,50,'One Does Not Simply Unreal','tcorte',0);
INSERT INTO `Answers` VALUES (9,4,50,'The cake means you die you stoopid gamer 12 year old','nbenfiel',0);
INSERT INTO `Answers` VALUES (10,5,300,'Civilization Strategy Game FTW!!','tcorte',0);
INSERT INTO `Answers` VALUES (11,5,75,'All about that Shooter Genre','nbenfiel',0);
INSERT INTO `Answers` VALUES (12,80,50,'PC Musterd Race!','nbenfiel',0);
INSERT INTO `Answers` VALUES (13,5,-300,'Consoles For the Win','nbenfiel',0);
INSERT INTO `Answers` VALUES (14,5,200,'I like simulation','tcorte',0);
INSERT INTO `Answers` VALUES (15,8,200,'The short answer is no','nbenfiel',0);
INSERT INTO `Answers` VALUES (16,8,200,'It is worth it if you like the quick and easy monies','tcorte',0);
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
  `questionBody` varchar(8000) NOT NULL,
  `questionPoster` varchar(250) NOT NULL,
  `questionFrozen` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Questions`
--

LOCK TABLES `Questions` WRITE;
/*!40000 ALTER TABLE `Questions` DISABLE KEYS */;
INSERT INTO `Questions` VALUES (1,10,'Game Dev In Need Of Help','How Do?', 'nbenfiel',0);
INSERT INTO `Questions` VALUES (2,-100,'Help A Stoopid Game Dev','How do I make all the monies from the stoopid gamers?', 'tcorte',0);
INSERT INTO `Questions` VALUES (3,100,'Which is Better?','Im looking for an engine to use. Which is better? Unity or Unreal?', 'nbenfiel',0);
INSERT INTO `Questions` VALUES (4,-50,'Is The Cake Really A Lie?','Was just wondering if the cake really is a lie. Can someone help me?', 'nbenfiel',0);
INSERT INTO `Questions` VALUES (5,300,'Best Game Genre?','Im doing a report on the best game genre. What is it?', 'tcorte',0);
INSERT INTO `Questions` VALUES (6,0,'I need game dev machine','Trying to find a new game dev machine. Any help would be nice', 'tcorte',0);
INSERT INTO `Questions` VALUES (7,0,'Do mechanics actually work?','Game mechanics are important. Do they actually work though?', 'nbenfiel',0);
INSERT INTO `Questions` VALUES (8,0,'Is Mobile Game Dev worth it','Is trying to become a mobile game developer worth the struggle?', 'tcorte',0);
INSERT INTO `Questions` VALUES (9,0,'Developing Games','Why is game development hard?','nbenfiel',0);
INSERT INTO `Questions` VALUES (10,0,'Game Engine','What do you recommend to use?','tcorte',0);
INSERT INTO `Questions` VALUES (11,0,'Ghosts','How does one deal with ghosts in games?','pvenkman',0);
INSERT INTO `Questions` VALUES (12,0,'Power of Zuul','I am Zuul.','zuul',0);
INSERT INTO `Questions` VALUES (13,0,'Giant Mashmellows','Lets see if he wants smore?','rstantz',0);
INSERT INTO `Questions` VALUES (14,0,'Another Game','Who would be interesting in another Ghostbusters game?','jbrunelle',0);
INSERT INTO `Questions` VALUES (15,0,'Collecting Food','How does one collect food in the Ghostbusters game?','slimer',0);
INSERT INTO `Questions` VALUES (16,3,'I am Gozer','Foolish Mortals','gozer',0);
INSERT INTO `Questions` VALUES (17,0,'Gatekeeper','Are you the gatekeeper?','keymaster',0);
INSERT INTO `Questions` VALUES (18,5,'Ray thought of this','Raaaawwwrrr','staypuft',0);
INSERT INTO `Questions` VALUES (19,0,'Keymaster','Are you the keymaster?','gatemaster',0);
INSERT INTO `Questions` VALUES (20,0,'Types of questions','Whats with all these Ghostbusters Questions?','tcorte',0);
INSERT INTO `Questions` VALUES (21,0,'More Questions','Why are there not more Ghostbuster questions?','nbenfiel',0);
INSERT INTO `Questions` VALUES (22,6,'Twinkies','You actually eat this?','pvenkman',0);
INSERT INTO `Questions` VALUES (23,0,'Dana','There is no Dana, only Zuul!','zuul',0);
INSERT INTO `Questions` VALUES (24,12,'Insert Religous Question','Are you god?','rstantz',0);
INSERT INTO `Questions` VALUES (25,0,'Game Development','Whats up with these kids and game development?','jbrunelle',0);
INSERT INTO `Questions` VALUES (26,0,'Website','Why cant they make a good website?','jbrunelle',0);
INSERT INTO `Questions` VALUES (27,0,'Fantastic','Are all these students fantastic or is it just this group?','jbrunelle',0);
INSERT INTO `Questions` VALUES (28,0,'Which is better','Which is better Ghostbusters 1 or Ghostbusters 2?','jbrunelle',0);
INSERT INTO `Questions` VALUES (29,423,'Another game','Should they make another Ghostbusters Video Game?','jbrunelle',0);
INSERT INTO `Questions` VALUES (30,0,'Engine','Whats the best engine to use for a beginner?','tcorte',0);
INSERT INTO `Questions` VALUES (31,0,'God Rays','How does a Ray work in Unity?','tcorte',0);
INSERT INTO `Questions` VALUES (32,0,'Types of Games','What kind of games do people want these days?','tcorte',0);
INSERT INTO `Questions` VALUES (33,0,'MySQL','Why is it hard to connect MySQL with a Unity Game?','tcorte',0);
INSERT INTO `Questions` VALUES (34,68,'Assassins Creed','Whose idea was it for Assassins creed games to continue?','tcorte',0);
INSERT INTO `Questions` VALUES (35,0,,'Developing Games','Why are games hard to develop for?','tcorte',0);
INSERT INTO `Questions` VALUES (36,0,'New Techniques','Whats the best way to learn new techniques for game mechanics?','nbenfiel',0);
INSERT INTO `Questions` VALUES (37,0,'Complete Garbage','Why are most developers complete garbage?','nbenfiel',0);
INSERT INTO `Questions` VALUES (38,23,'Ubisoft','Should Ubisoft let the Vivendi take over happen?','nbenfiel',0);
INSERT INTO `Questions` VALUES (39,0,'Activision','How much money does Activision expect after every Call of Duty Release?','nbenfiel',0);
INSERT INTO `Questions` VALUES (40,0,'Which is better','Which is better Theif or Dishonored?','nbenfiel',0);
INSERT INTO `Questions` VALUES (41,58,'Batman Arkham Knight','Why was Batman Arkham Knight for PC such garbage in terms of performance?','nbenfiel',0);
INSERT INTO `Questions` VALUES (42,0,'Limits','Performance or pushing the limits?','nbenfiel',0);
INSERT INTO `Questions` VALUES (43,234,'Polygon, not the pokemon','How many polygons are on the screen in the most intense moments in games?','nbenfiel',0);
INSERT INTO `Questions` VALUES (44,-234,'Raw Horsepower','How much raw GPU horsepower does one need?','nbenfiel',0);
INSERT INTO `Questions` VALUES (45,3333,'Half Life 3','When will Half Life 3 be released?','nbenfiel',0);
INSERT INTO `Questions` VALUES (46,333,'Lord Gaben','Who said Half-Life 3?','nbenfiel',0);
INSERT INTO `Questions` VALUES (47,3,'Half life 3 confirmed','Has Half-life 3 been confirmed?','nbenfiel',0);
INSERT INTO `Questions` VALUES (48,33,'Conrfimed','Half-life 3 VR?','nbenfiel',0);
INSERT INTO `Questions` VALUES (49,0,'Cake is a lie','Portal 3?','nbenfiel',0);
INSERT INTO `Questions` VALUES (50,0,'Lord GabeN','All hail the new emperor Lord GabeN!','tcorte',0);
INSERT INTO `Questions` VALUES (51,0,'Gaming Related','Whats up with all these non gaming related question from the ghostbusters?','jbrunelle',0);
INSERT INTO `Questions` VALUES (52,240,'Gonna call','I know who Im not going to call!','jbrunelle',0);
INSERT INTO `Questions` VALUES (53,0,'Ghostbusters 2','Ghostbusters 2 was a terrible movie, but looking back I was excited in the theater to see it, were you?','jbrunelle',0);
INSERT INTO `Questions` VALUES (54,0,'Gaming Industry','Why does the Gaming Industry make so much more than the film industry?','jbrunelle',0);
INSERT INTO `Questions` VALUES (55,0,'Make it yourself','Who wants to make Half-Life 3?','jbrunelle',0);
INSERT INTO `Questions` VALUES (56,349,'Valve','Should Valve ever release Half-Life 3?','jbrunelle',0);
INSERT INTO `Questions` VALUES (57,0,'Money','How much money does Valve bring in during the Holidays?','jbrunelle',0);
INSERT INTO `Questions` VALUES (58,0,'EA','Should EA just shut down forever?','jbrunelle',0);
INSERT INTO `Questions` VALUES (59,0,'E3','Whats the next E3 going to be like?','jbrunelle',0);
INSERT INTO `Questions` VALUES (60,423,'Half life E3','What if they announce Half-Life 3 at the next E3, thoughts?','jbrunelle',0);
INSERT INTO `Questions` VALUES (61,0,'This class','What will this class accomplish with Ghostbuster refernces?','jbrunelle',0);
INSERT INTO `Questions` VALUES (62,0,'Enjoy Half-life','Why cant more people enjoy Half-life?','jbrunelle',0);
INSERT INTO `Questions` VALUES (63,59,'Breaking Doker','Whats my problem with this students breaking Docker?','jbrunelle',0);
INSERT INTO `Questions` VALUES (64,0,'Zuul','Zuul was here','zuul',0);
INSERT INTO `Questions` VALUES (65,0,'Interdimensional Computer','Testing out my interdimmensional computer','zuul',0);
INSERT INTO `Questions` VALUES (66,0,'World','Gotta take over the world one question at a time','zuul',0);
INSERT INTO `Questions` VALUES (67,0,'Where art thou','Where is the gatekeeper?','zuul',0);
INSERT INTO `Questions` VALUES (68,0,'lol nope','Who is the gatekeeper?','zuul',0);
INSERT INTO `Questions` VALUES (69,0,'Coming back','Why didnt Gozer come back in the second movie? ','zuul',0);
INSERT INTO `Questions` VALUES (70,0,'Psychotic dogs','Who even thought of crazy psychotic dogs for that part?','zuul',0);
INSERT INTO `Questions` VALUES (71,24,'Only Zuul','There is only Zuul in this Database!','zuul',0);
INSERT INTO `Questions` VALUES (72,0,'All Ghostbusters','Paging all the ghostbusters!','zuul',0);
INSERT INTO `Questions` VALUES (73,0,'Eggs popping','I make eggs pop out of there shells and fry on the counter','zuul',0);
INSERT INTO `Questions` VALUES (74,0,'Only GabeN','There shall only be one Gaben.','zuul',0);
INSERT INTO `Questions` VALUES (75,0,'Questions to add','Im running out of questions to add','zuul',0);
INSERT INTO `Questions` VALUES (76,-123,'Many questions','Ive added way to many questions to this dump','zuul',0);
INSERT INTO `Questions` VALUES (77,0,'Docker up','If only Docker was still up, Id be Zuul','zuul',0);
INSERT INTO `Questions` VALUES (78,0,'Praise Zuul','Praise Zuul','zuul',0);
INSERT INTO `Questions` VALUES (79,0,'Console War','Consoles vs PC Go!','zuul',0);
INSERT INTO `Questions` VALUES (80,9001,'The best of the best','PCMR!','gatekeeper',0);
INSERT INTO `Questions` VALUES (81,321,'Reviews','PCGamer or EuroGamer?','gatekeeper',0);
INSERT INTO `Questions` VALUES (82,0,'Bethesda','Should Bethesda keep review copies until the day before?','gatekeeper',0);
INSERT INTO `Questions` VALUES (83,0,'Pandering','Should video game companies pander to the minority of complainers?','gatekeeper',0);
INSERT INTO `Questions` VALUES (84,0,'Gamergate','What is gamergate and why is it important?','gatekeeper',0);
INSERT INTO `Questions` VALUES (85,0,'Totalbiscuit','Who is The Cynical Brit?','gatekeeper',0);
INSERT INTO `Questions` VALUES (86,0,'Game Development','Whats up with game development these days?','gatekeeper',0);
INSERT INTO `Questions` VALUES (87,0,'Dog','Why is there a dog laying on my computer as I work on this project?','gatekeeper',0);
INSERT INTO `Questions` VALUES (88,0,'Dank memes','Why are the alt right all about dem dank memes?','gatekeeper',0);
INSERT INTO `Questions` VALUES (89,0,'Thanks Obama','Is Trump the next Obama?','gatekeeper',0);
INSERT INTO `Questions` VALUES (90,0,'Orange','Who is even Trump','keymaster',0);
INSERT INTO `Questions` VALUES (91,0,'Key','Where does one put this key?','keymaster',0);
INSERT INTO `Questions` VALUES (92,0,'Legend of Zelda','Is Zelda a girl','keymaster',0);
INSERT INTO `Questions` VALUES (93,0,'Stereotype','Why arent more people upset that Mario is a stereotype?','keymaster',0);
INSERT INTO `Questions` VALUES (94,234,'This website','Why did we create a website about game development?','keymaster',0);
INSERT INTO `Questions` VALUES (95,0,'Fun','Who said this would be fun!?!?!?!','keymaster',0);
INSERT INTO `Questions` VALUES (96,0,'Still looking','Are you the gatekeeper?','keymaster',0);
INSERT INTO `Questions` VALUES (97,624,'Release','Who said the keymaster had to release Zuul?','keymaster',0);
INSERT INTO `Questions` VALUES (98,0,'Powerful','If Zuul is so powerful why didnt they just breakout without my help?','keymaster',0);
INSERT INTO `Questions` VALUES (99,0,'What am I doing','This site needs some more Dank memes,thoughts?','keymaster',0);
INSERT INTO `Questions` VALUES (100,0,'Dank Games','Why does Anita have to put her opinion in everything?','keymaster',0);
INSERT INTO `Questions` VALUES (101,0,'Quination','Who the hell is even Zoe Quin?','keymaster',0);
INSERT INTO `Questions` VALUES (102,0,'VR games','Why are there nor more eating games?','slimer',0);
INSERT INTO `Questions` VALUES (103,639,'Main character','Whose idea was it to make another ghostbusters without me being the main character?','slimer',0);
INSERT INTO `Questions` VALUES (104,0,'Method','Whats the best method for creating ghosts?','slimer',0);
INSERT INTO `Questions` VALUES (105,0,'Location location','Wheres the hidded food stands in the Ghostbusters Video Game?','slimer',0);
INSERT INTO `Questions` VALUES (106,0,'Program','How do I program a game if I dont have hands?','slimer',0);
INSERT INTO `Questions` VALUES (107,430,'Games','How do I program a game if I just end up eating the machine?','slimer',0);
INSERT INTO `Questions` VALUES (108,0,'Ghosts','Why are all the ghosts running the wrong direction?','slimer',0);
INSERT INTO `Questions` VALUES (109,0,'Return of Zuul','Wheres Zuul in the new Ghostbusters?','slimer',0);
INSERT INTO `Questions` VALUES (110,493,'Me','Whats up with my portrail in the new Ghostbusters movie?','slimer',0);
INSERT INTO `Questions` VALUES (111,0,'Raise scares','How does one go about getting a raise for the scares I do in movies?','slimer',0);
INSERT INTO `Questions` VALUES (112,0,'Food containter','Whats the best condoment from food stands that I can use for my game?','slimer',0);
INSERT INTO `Questions` VALUES (113,0,'Slimer','Whos the ghost you gonna call?','slimer',0);
INSERT INTO `Questions` VALUES (114,604,'Continuing the series','What ever happened to the end of Ghostbusters III?','slimer',0);
INSERT INTO `Questions` VALUES (115,0,'Representation','Whats up with this under representation of ghosts in games?','slimer',0);
INSERT INTO `Questions` VALUES (116,0,'Female Ghosts','Why are there not enough females ghosts?','slimer',0);
INSERT INTO `Questions` VALUES (117,129,'Slimer 2020','Should a ghost run for president?','slimer',0);
INSERT INTO `Questions` VALUES (118,0,'Government','why do ghosts not have a say in the government?','slimer',0);
INSERT INTO `Questions` VALUES (119,0,'Ghost rights','Do ghosts have rights?','slimer',0);
INSERT INTO `Questions` VALUES (120,239,'Majority','Are ghosts a minority or a majority?','slimer',0);
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
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UserProfile`
--

LOCK TABLES `UserProfile` WRITE;
/*!40000 ALTER TABLE `UserProfile` DISABLE KEYS */;
INSERT INTO `UserProfile` VALUES(1,'nbenfiel','password','nbenf@odu.edu',1);
INSERT INTO `UserProfile` VALUES(2,'tcorte','password','tcorte@odu.edu',1);
INSERT INTO `UserProfile` VALUES(3,'admin', 'cs518pa$$','admin@email.com',1);
INSERT INTO `UserProfile` VALUES(4,'jbrunelle','M0n@rch$','jbrunelle@odu.edu',1);
INSERT INTO `UserProfile` VALUES(5,'pvenkman','imadoctor','pvenk@email.com',0);
INSERT INTO `UserProfile` VALUES(6,'rstantz','boguspassword','rstantz@email.com',0);
INSERT INTO `UserProfile` VALUES(7,'dbarrett','fr1ed3GGS','dbarrett@email.com',0);
INSERT INTO `UserProfile` VALUES(8,'ltully','<!--<i>','ltully@email.com',0);
INSERT INTO `UserProfile` VALUES(9,'espengler','dontcross the streams',,'espengler@email.com',0);
INSERT INTO `UserProfile` VALUES(10,'janine','--!drop tables;','janine@email.com',0);
INSERT INTO `UserProfile` VALUES(11,'winston','zeddM0r3','winston@email.com',0);
INSERT INTO `UserProfile` VALUES(12,'gozer','d3$truct0R','gozer@email.com',0);
INSERT INTO `UserProfile` VALUES(13,'slimer','f33dM3','slimer@email.com',0);
INSERT INTO `UserProfile` VALUES(14,'zuul','105"; DROP TABLE','zuul@email.com',0);
INSERT INTO `UserProfile` VALUES(15,'keymaster','n0D@na',,'keymaster@email.com',0);
INSERT INTO `UserProfile` VALUES(16,'gatekeeper','$l0r','gatekeeper@email.com',0);
INSERT INTO `UserProfile` VALUES(17,'staypuft','m@r$hM@ll0w','staypuft@email.com',0);

/*!40000 ALTER TABLE `UserProfile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UserPictures`
--

DROP TABLE IF EXISTS `UserPictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `UserPictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `user` varchar(250) NOT NULL,
  `pictureName` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UserPictures`
--

LOCK TABLES `UserPictures` WRITE;
/*!40000 ALTER TABLE `UserPictures` DISABLE KEYS */;
INSERT INTO UserPictures VALUES(1,1,'nbenfiel','lordgaben.png');
INSERT INTO UserPictures VALUES(2,2,'tcorte','tacAttack.png');
/*!40000 ALTER TABLE `UserPictures` ENABLE KEYS */;
UNLOCK TABLES;