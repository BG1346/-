-- MariaDB dump 10.17  Distrib 10.4.6-MariaDB, for osx10.13 (x86_64)
--
-- Host: localhost    Database: GGY
-- ------------------------------------------------------
-- Server version	10.4.6-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `LIKE`
--

DROP TABLE IF EXISTS `LIKE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `LIKE` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `spot_id` int(10) DEFAULT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `like` int(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `spot_id` (`spot_id`),
  CONSTRAINT `like_ibfk_1` FOREIGN KEY (`spot_id`) REFERENCES `spot` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `LIKE`
--

LOCK TABLES `LIKE` WRITE;
/*!40000 ALTER TABLE `LIKE` DISABLE KEYS */;
INSERT INTO `LIKE` VALUES (1,13,'dfk',1),(2,4,'::1',0),(3,3,'::1',0),(4,6,'::1',1),(5,25,'::1',0),(6,26,'::1',0),(7,14,'::1',0),(8,15,'::1',0),(9,13,'::1',0),(10,12,'::1',0),(11,27,'::1',0),(12,8,'::1',0),(13,17,'::1',0),(14,23,'::1',1),(15,775,'::1',0),(16,24,'::1',0),(17,22,'::1',0),(18,21,'::1',0),(19,9,'::1',1),(20,18,'::1',0),(21,7,'::1',0),(22,10,'::1',0),(23,11,'::1',0);
/*!40000 ALTER TABLE `LIKE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SUBCATEGORY`
--

DROP TABLE IF EXISTS `SUBCATEGORY`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SUBCATEGORY` (
  `category` varchar(30) NOT NULL,
  `subcategory` varchar(30) NOT NULL,
  PRIMARY KEY (`subcategory`,`category`),
  KEY `category` (`category`),
  CONSTRAINT `subcategory_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SUBCATEGORY`
--

LOCK TABLES `SUBCATEGORY` WRITE;
/*!40000 ALTER TABLE `SUBCATEGORY` DISABLE KEYS */;
INSERT INTO `SUBCATEGORY` VALUES ('cafe','abnormal'),('attraction','beach'),('food','bread'),('attraction','cultural heritage'),('attraction','etc'),('cafe','etc'),('food','etc'),('stay','etc'),('stay','guest house'),('stay','hotel'),('food','meal'),('stay','motel'),('cafe','normal');
/*!40000 ALTER TABLE `SUBCATEGORY` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `board`
--

DROP TABLE IF EXISTS `board`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `board` (
  `board_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `nickname` varchar(20) DEFAULT NULL,
  `type` varchar(20) DEFAULT 'general',
  `title` varchar(50) DEFAULT NULL,
  `contents` text NOT NULL,
  `hits` int(10) DEFAULT 0,
  `reg_date` datetime DEFAULT current_timestamp(),
  `attached_file_path` varchar(100) DEFAULT NULL,
  `attached_file_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`board_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=471 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `board`
--

LOCK TABLES `board` WRITE;
/*!40000 ALTER TABLE `board` DISABLE KEYS */;
INSERT INTO `board` VALUES (470,180,'asdf','일반','sfad','afsd',0,'2019-11-25 10:14:32','','');
/*!40000 ALTER TABLE `board` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `category` varchar(30) NOT NULL,
  PRIMARY KEY (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES ('attraction'),('cafe'),('food'),('stay');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('00aad51823b0b1365f7f547975a3b11fdddb6490','::1',1574401790,'__ci_last_regenerate|i:1574401790;referred_from|s:30:\"http://[::1]/index/board_write\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('6ebf9f4c72c27aa0424e280caf3c75d2071a28ca','::1',1574402358,'__ci_last_regenerate|i:1574402358;referred_from|s:29:\"http://[::1]/index/board_page\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('fa98164750091ebbdbf5ae2cc57522e28df85e81','::1',1574402708,'__ci_last_regenerate|i:1574402708;referred_from|s:30:\"http://[::1]/index/board_write\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('6ab834b5bda8be9343335a6317e315ffe7a8bcc6','::1',1574403185,'__ci_last_regenerate|i:1574403185;referred_from|s:30:\"http://[::1]/index/board_write\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('14259511197f030fcc691aea81099dad2296b411','::1',1574403593,'__ci_last_regenerate|i:1574403593;referred_from|s:29:\"http://[::1]/index/board_page\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('64174c07d21d10c270be147edf26750e725f6aa0','::1',1574403898,'__ci_last_regenerate|i:1574403898;referred_from|s:30:\"http://[::1]/index/board_write\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('98a2e75b1795a8b2fe4b156e9a6ba46af5de16d0','::1',1574404264,'__ci_last_regenerate|i:1574404264;referred_from|s:30:\"http://[::1]/index/board_write\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('af7ed61df9df010ebf05f8bf1212607bee57ba5d','::1',1574404574,'__ci_last_regenerate|i:1574404574;referred_from|s:30:\"http://[::1]/index/board_write\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('83b161b95fbdd9d5c878cbb2be87c7b25697f3c6','::1',1574404927,'__ci_last_regenerate|i:1574404927;referred_from|s:30:\"http://[::1]/index/board_write\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('6c8376a76db0406ffb1f1d414c7fad142bf23847','::1',1574405315,'__ci_last_regenerate|i:1574405315;referred_from|s:30:\"http://[::1]/index/board_write\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('51dec7d86f6cd50c531cd4b92302c306f591dd95','::1',1574405622,'__ci_last_regenerate|i:1574405622;referred_from|s:30:\"http://[::1]/index/board_write\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('3e741d8937261a12bdde25793c25a7b35aaf0c0f','::1',1574405929,'__ci_last_regenerate|i:1574405929;referred_from|s:30:\"http://[::1]/index/board_write\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('ba2f0ab1e8b388468ed7f8447373a361b2f421e3','::1',1574406234,'__ci_last_regenerate|i:1574406234;referred_from|s:30:\"http://[::1]/index/board_write\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('14a41f61eed1dc8ec21c32d4a2dd1bc3e3721ca0','::1',1574406592,'__ci_last_regenerate|i:1574406592;referred_from|s:30:\"http://[::1]/index/board_write\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('76993f3d8f7e5849d668a5e781e91ba4cd188286','::1',1574406937,'__ci_last_regenerate|i:1574406937;referred_from|s:29:\"http://[::1]/index/board_page\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('109da0b1e5b1134b59c7a8027440f9bc1d4ebf2c','::1',1574407273,'__ci_last_regenerate|i:1574407273;referred_from|s:13:\"http://[::1]/\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('1af49bb8fc1377d987533704dea733e855735fd1','::1',1574407705,'__ci_last_regenerate|i:1574407705;referred_from|s:31:\"http://[::1]/index/board_page/5\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('8fe9682d05f496181b448d2b58964cc05a1fce5a','::1',1574408021,'__ci_last_regenerate|i:1574408021;referred_from|s:29:\"http://[::1]/index/board_page\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('1adb926e51d990fd4b222f9d65c5ac95cafc052c','::1',1574408340,'__ci_last_regenerate|i:1574408340;referred_from|s:29:\"http://[::1]/index/board_page\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('1d5430c91697c15506c95926719a1b6c7f757134','::1',1574409619,'__ci_last_regenerate|i:1574409619;referred_from|s:29:\"http://[::1]/index/board_page\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('c8a2c28a030475ad5f1bb904fad96b9b9ee540b5','::1',1574410754,'__ci_last_regenerate|i:1574410754;referred_from|s:34:\"http://[::1]/index/categorize_page\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;spot_11|b:1;'),('7452928b997ddb17887485fb71a1d07a4c73b249','::1',1574410774,'__ci_last_regenerate|i:1574410757;referred_from|s:18:\"http://[::1]/index\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('7d5ae65cca0a171c896ed38156ec2798a3437754','::1',1574644450,'__ci_last_regenerate|i:1574644450;referred_from|s:13:\"http://[::1]/\";'),('6ffe03ecb126fcd0de3f89ae2f67dbb8a542c5d0','::1',1574644481,'__ci_last_regenerate|i:1574644475;referred_from|s:27:\"http://[::1]/index/signin_v\";'),('1d617069fe6d0a47aae553dcd2dae3c9c1cab6a0','::1',1574644789,'__ci_last_regenerate|i:1574644789;referred_from|s:34:\"http://[::1]/index/categorize_page\";email|s:6:\"test12\";logged_in|b:1;nickname|s:4:\"asfd\";'),('f24fef8c742be9820b90a18f696dd2fbfd8c2c3a','::1',1574645096,'__ci_last_regenerate|i:1574645096;referred_from|s:34:\"http://[::1]/index/categorize_page\";email|s:6:\"test12\";logged_in|b:1;nickname|s:4:\"asfd\";'),('c24f3a254a6d23745fd921d93d8067d5be97873d','::1',1574645467,'__ci_last_regenerate|i:1574645467;referred_from|s:34:\"http://[::1]/index/categorize_page\";email|s:6:\"test12\";logged_in|b:1;nickname|s:4:\"asfd\";'),('e56d3a9e61220ce56810766177e54c066b2a3b48','::1',1574646490,'__ci_last_regenerate|i:1574646490;referred_from|s:34:\"http://[::1]/index/categorize_page\";email|s:6:\"test12\";logged_in|b:1;nickname|s:4:\"asfd\";'),('f53e01938026f20cea18b758cc18b904b6d4ce27','::1',1574647465,'__ci_last_regenerate|i:1574647465;referred_from|s:34:\"http://[::1]/index/categorize_page\";email|s:6:\"test12\";logged_in|b:1;nickname|s:4:\"asfd\";'),('551a963ec2e4249051ee5ae4b0f4bf12fbf6fe54','::1',1574647439,'__ci_last_regenerate|i:1574647434;referred_from|s:34:\"http://[::1]/index/categorize_page\";'),('8477b2935afd3b2017f97408f44a9feb5ccb6777','::1',1574647951,'__ci_last_regenerate|i:1574647951;referred_from|s:34:\"http://[::1]/index/categorize_page\";email|s:6:\"test12\";logged_in|b:1;nickname|s:4:\"asfd\";'),('81877f263732fc25e20a1959e3e51b5305cf6cf7','::1',1574648302,'__ci_last_regenerate|i:1574648302;referred_from|s:34:\"http://[::1]/index/categorize_page\";email|s:6:\"test12\";logged_in|b:1;nickname|s:4:\"asfd\";'),('4b3df825ec4dfafb626bd20cd3eb7137ca11f86c','::1',1574648325,'__ci_last_regenerate|i:1574648302;referred_from|s:34:\"http://[::1]/index/categorize_page\";email|s:6:\"test12\";logged_in|b:1;nickname|s:4:\"asfd\";');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spot`
--

DROP TABLE IF EXISTS `spot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spot` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) DEFAULT NULL,
  `category` varchar(30) DEFAULT NULL,
  `subcategory` varchar(30) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `addr` text DEFAULT NULL,
  `hours` varchar(100) DEFAULT NULL,
  `tel1` varchar(30) DEFAULT NULL,
  `tel2` varchar(30) DEFAULT NULL,
  `like` int(10) DEFAULT NULL,
  `x` text DEFAULT NULL,
  `y` text DEFAULT NULL,
  `imagepath` text DEFAULT NULL,
  `hits` int(10) NOT NULL DEFAULT 0,
  `district` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  KEY `subcategory` (`subcategory`),
  CONSTRAINT `spot_ibfk_1` FOREIGN KEY (`category`) REFERENCES `category` (`category`),
  CONSTRAINT `spot_ibfk_2` FOREIGN KEY (`subcategory`) REFERENCES `subcategory` (`subcategory`)
) ENGINE=InnoDB AUTO_INCREMENT=776 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spot`
--

LOCK TABLES `spot` WRITE;
/*!40000 ALTER TABLE `spot` DISABLE KEYS */;
INSERT INTO `spot` VALUES (3,'test2','food','bread','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',0,'128.89970046043683','37.753712285990524','6garlic_main.jpg',9,'OO동'),(4,'빵다방','food','bread','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',92,'128.91811727610298','37.7690056080449','bbangdabang_main.jpg',21,'OO동'),(6,'라카이','stay','hotel','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',1,'128.90447293828205','37.80705852849509','lakai_main.jpg',9,'OO동'),(7,'라피네','stay','hotel','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',0,'128.8438020478478','37.72411551912109','lapine_main.jpg',9,'OO동'),(8,'세인트존스','stay','hotel','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',0,'128.92093175969828','37.79128245709586','saint_johns_main.jpg',5,'OO동'),(9,'씨마크','stay','hotel','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',1,'128.91507730578857','37.797200791762485','sea_mark_main.jpg',9,'OO동'),(10,'커피 아메리카','cafe','normal','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',0,'128.94941362961993','37.7710069854435','coffeeAmerica_main.jpg',2,'OO동'),(11,'주문진 해변','attraction','beach','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',-2,'128.8185945981478','37.911338588426325','dokkaebi_main.jpg',8,'OO동'),(12,'돌체테리아','cafe','normal','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',0,'128.8185945981478','37.911338588426325','dolcheTeria_main.jpg',6,'OO동'),(13,'기와','cafe','abnormal','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',0,'128.9162274310414','37.78600092217664','giwa_main.jpg',7,'OO동'),(14,'경포 해변','attraction','beach','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',1,'128.90743338738656','37.805796289898076','gyeongpo_beach_main.jpg',11,'OO동'),(15,'교동 짬뽕','food','meal','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',0,'128.878536068091','37.76960020492399','gyojjam_main.jpg',3,'OO동'),(17,'어린 왕자','stay','guest house','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',126,'128.90221754753867','37.80819039640179','little_prince_main.jpg',3,'OO동'),(18,'미르 마르','cafe','normal','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',19,'128.94726032835422','37.77250195059535','mirmar_main.jpg',7,'OO동'),(21,'오죽헌','attraction','cultural heritage','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',0,'128.87671358153074','37.77830977058274','ojukheon_main.jpg',4,'OO동'),(22,'오월','cafe','abnormal','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',0,'128.8931497615375','37.750790894578515','owol_main.jpg',6,'OO동'),(23,'선교장','attraction','cultural heritage','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',11,'128.884636370015','37.787274554650814','seonkyojang_main.jpg',4,'OO동'),(24,'씨에스타','stay','guest house','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',0,'128.9124272778853','37.79692315685062','siestar_main.jpg',1,'OO동'),(25,'쏠','stay','guest house','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',0,'128.89388642903177','37.81416929428848','sol_main.jpg',4,'OO동'),(26,'테라로사','cafe','abnormal','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',0,'128.88504347779983','37.82240068661653','terrarosa_main.jpg',6,'OO동'),(27,'툇마루','cafe','abnormal','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',0,'128.91360871897047','37.787801928705896','toitmaru_main.jpg',6,'OO동'),(775,'박이추 커피공장','cafe',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'128.86685462219364','37.84689771968194','bak2chew.jpg',3,'OO동');
/*!40000 ALTER TABLE `spot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nickname` varchar(30) DEFAULT NULL,
  `certificated` int(1) DEFAULT 0,
  `cert_number` int(4) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=194 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (180,'test','81dc9bdb52d04dc20036dbd8313ed055','asdf',0,1973),(181,'test2','81dc9bdb52d04dc20036dbd8313ed055','asdf',0,7912),(182,'test3','81dc9bdb52d04dc20036dbd8313ed055','asdf',0,9523),(183,'test10','81dc9bdb52d04dc20036dbd8313ed055','asldkfj',0,8526),(184,'test20','81dc9bdb52d04dc20036dbd8313ed055','sldakfj',0,8701),(185,'test1000','81dc9bdb52d04dc20036dbd8313ed055','sfda',1,7974),(186,'asdf','81dc9bdb52d04dc20036dbd8313ed055','wfe',0,2245),(187,'tt1t','200820e3227815ed1756a6b531e7e0d2','asdf',0,8067),(188,'tt11','81dc9bdb52d04dc20036dbd8313ed055','qw',0,9242),(189,'test1001','81dc9bdb52d04dc20036dbd8313ed055','laskdfj',1,5306),(190,'test1111','81dc9bdb52d04dc20036dbd8313ed055','asdlkfj',1,3569),(191,'ttest','81dc9bdb52d04dc20036dbd8313ed055','asdlkfj',0,2429),(192,'zcbzcb','5bacd9f25613659b2fbd2f3a58822e5c','nsdflkasdjf',0,4443),(193,'test12','81dc9bdb52d04dc20036dbd8313ed055','asfd',0,9093);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-25 11:20:38
