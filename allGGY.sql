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
  PRIMARY KEY (`board_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=178 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `board`
--

LOCK TABLES `board` WRITE;
/*!40000 ALTER TABLE `board` DISABLE KEYS */;
INSERT INTO `board` VALUES (175,180,'asdf','일반','수정dfsafsd','수정글\r\nsadfafds',0,'2019-11-20 17:59:05');
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
INSERT INTO `ci_sessions` VALUES ('dad7d46372efda9d8436b8a7d8e8fbc60268f85e','::1',1574233434,'__ci_last_regenerate|i:1574233434;referred_from|s:35:\"http://[::1]/index/delete_board/134\";email|s:8:\"test1111\";logged_in|b:1;nickname|s:7:\"asdlkfj\";'),('c1c9febf6e8ab29b64a038f5e77f918f075c3b5d','::1',1574233736,'__ci_last_regenerate|i:1574233736;referred_from|s:35:\"http://[::1]/index/board_delete/134\";email|s:8:\"test1111\";logged_in|b:1;nickname|s:7:\"asdlkfj\";'),('c39999c71cddb5fd56fc63cdd5608e7b0f7da16d','::1',1574234661,'__ci_last_regenerate|i:1574234661;referred_from|s:29:\"http://[::1]/index/board_page\";'),('e8ff20e9c8840d4af01bc0f21aef94e151deac2a','::1',1574234055,'__ci_last_regenerate|i:1574234055;referred_from|s:29:\"http://[::1]/index/board_page\";email|s:8:\"test1111\";logged_in|b:1;nickname|s:7:\"asdlkfj\";'),('49f93fea2941219494057d1c3e9118962792219d','::1',1574234484,'__ci_last_regenerate|i:1574234484;referred_from|s:29:\"http://[::1]/index/board_page\";email|s:8:\"test1111\";logged_in|b:1;nickname|s:7:\"asdlkfj\";'),('e2311cecd91b8fe253a75d858230f5dd390c0108','::1',1574235626,'__ci_last_regenerate|i:1574235626;referred_from|s:25:\"http://[::1]/index/signin\";email|s:4:\"test\";logged_in|b:1;nickname|s:4:\"asdf\";user_id|s:3:\"180\";'),('6b25ea24d5bd0620febb3671fafa4bf9a85e9464','::1',1574234991,'__ci_last_regenerate|i:1574234991;referred_from|s:29:\"http://[::1]/index/board_page\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('2ebfa789010d9407a9fdcc487629a7c36484d0fc','::1',1574235662,'__ci_last_regenerate|i:1574235662;referred_from|s:29:\"http://[::1]/index/board_page\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('b5a9aea8c97ef8d0a1375a46fe1d9bdbc4048601','::1',1574236008,'__ci_last_regenerate|i:1574236008;referred_from|s:29:\"http://[::1]/index/board_page\";user_id|s:3:\"180\";nickname|s:7:\"asdlkfj\";email|s:5:\"ttest\";logged_in|b:1;'),('9c1bdeeadc16185ca1954ea2055550930d682f0c','::1',1574236395,'__ci_last_regenerate|i:1574236395;referred_from|s:29:\"http://[::1]/index/board_page\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('8de438cf9f5e47903bfeb7cc5c0c43588aae14c3','::1',1574236696,'__ci_last_regenerate|i:1574236696;referred_from|s:29:\"http://[::1]/index/board_page\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('8c7feae4a8408beda860b5152ab8ddbf627bc5e9','::1',1574237065,'__ci_last_regenerate|i:1574237065;referred_from|s:35:\"http://[::1]/index/board_modify/167\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('4d08799926ef21a300ba048219e858a53251a367','::1',1574237187,'__ci_last_regenerate|i:1574237187;referred_from|s:25:\"http://[::1]/index/signin\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('8b0d6a359a3ef5dd9762a2aee05db8085da7e368','::1',1574237367,'__ci_last_regenerate|i:1574237367;referred_from|s:27:\"http://[::1]/index/map_page\";user_id|s:3:\"191\";nickname|s:7:\"asdlkfj\";email|s:5:\"ttest\";logged_in|b:1;'),('4caea54008df2405ceab3cf541d9499194bf2d5a','::1',1574240529,'__ci_last_regenerate|i:1574240529;referred_from|s:35:\"http://[::1]/index/board_modify/170\";user_id|s:3:\"191\";nickname|s:7:\"asdlkfj\";email|s:5:\"ttest\";logged_in|b:1;'),('980bed01017a1aa76776594c4c864b188d2bb3eb','::1',1574237907,'__ci_last_regenerate|i:1574237907;referred_from|s:35:\"http://[::1]/index/board_modify/167\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('b7889bb6015b83039d7d16eb10b33508db024b7f','::1',1574238392,'__ci_last_regenerate|i:1574238392;referred_from|s:29:\"http://[::1]/index/board_page\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('f7d4bf24823a50e56bd25b8ffa401473ff112f24','::1',1574238740,'__ci_last_regenerate|i:1574238740;referred_from|s:29:\"http://[::1]/index/board_page\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('0d9e6cd47c49f1f56f4edb2546ba1a3a4b335eb6','::1',1574239346,'__ci_last_regenerate|i:1574239346;referred_from|s:30:\"http://[::1]/index/board_write\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('81367f5f7d9a8a01d4093b312b143d914754b5f1','::1',1574239871,'__ci_last_regenerate|i:1574239871;referred_from|s:29:\"http://[::1]/index/board_page\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('2129154b6655b6151c3fa6efd6401b842c0435e0','::1',1574240188,'__ci_last_regenerate|i:1574240188;referred_from|s:29:\"http://[::1]/index/board_page\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('ce01c5fd3cdb415373066367ed06420f352bcb56','::1',1574240509,'__ci_last_regenerate|i:1574240509;referred_from|s:29:\"http://[::1]/index/board_page\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;'),('082da3bc416554f670827f22bebe471bcad1cf11','::1',1574240644,'__ci_last_regenerate|i:1574240529;referred_from|s:29:\"http://[::1]/index/board_page\";user_id|s:3:\"191\";nickname|s:7:\"asdlkfj\";email|s:5:\"ttest\";logged_in|b:1;'),('5bb549d841f01b9b551556c4b1f51c89825e6f9f','::1',1574240745,'__ci_last_regenerate|i:1574240531;referred_from|s:34:\"http://[::1]/index/categorize_page\";user_id|s:3:\"180\";nickname|s:4:\"asdf\";email|s:4:\"test\";logged_in|b:1;');
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
INSERT INTO `spot` VALUES (3,'test2','food','bread','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',0,'128.89970046043683','37.753712285990524','6garlic_main.jpg',8,'OO동'),(4,'빵다방','food','bread','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',92,'128.91811727610298','37.7690056080449','bbangdabang_main.jpg',21,'OO동'),(6,'라카이','stay','hotel','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',1,'128.90447293828205','37.80705852849509','lakai_main.jpg',9,'OO동'),(7,'라피네','stay','hotel','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',0,'128.8438020478478','37.72411551912109','lapine_main.jpg',9,'OO동'),(8,'세인트존스','stay','hotel','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',0,'128.92093175969828','37.79128245709586','saint_johns_main.jpg',5,'OO동'),(9,'씨마크','stay','hotel','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',1,'128.91507730578857','37.797200791762485','sea_mark_main.jpg',9,'OO동'),(10,'커피 아메리카','cafe','normal','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',0,'128.94941362961993','37.7710069854435','coffeeAmerica_main.jpg',2,'OO동'),(11,'주문진 해변','attraction','beach','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',-2,'128.8185945981478','37.911338588426325','dokkaebi_main.jpg',7,'OO동'),(12,'돌체테리아','cafe','normal','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',0,'128.8185945981478','37.911338588426325','dolcheTeria_main.jpg',5,'OO동'),(13,'기와','cafe','abnormal','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',0,'128.9162274310414','37.78600092217664','giwa_main.jpg',7,'OO동'),(14,'경포 해변','attraction','beach','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',1,'128.90743338738656','37.805796289898076','gyeongpo_beach_main.jpg',11,'OO동'),(15,'교동 짬뽕','food','meal','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',0,'128.878536068091','37.76960020492399','gyojjam_main.jpg',3,'OO동'),(17,'어린 왕자','stay','guest house','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',126,'128.90221754753867','37.80819039640179','little_prince_main.jpg',3,'OO동'),(18,'미르 마르','cafe','normal','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',19,'128.94726032835422','37.77250195059535','mirmar_main.jpg',7,'OO동'),(21,'오죽헌','attraction','cultural heritage','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',0,'128.87671358153074','37.77830977058274','ojukheon_main.jpg',4,'OO동'),(22,'오월','cafe','abnormal','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',0,'128.8931497615375','37.750790894578515','owol_main.jpg',6,'OO동'),(23,'선교장','attraction','cultural heritage','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',11,'128.884636370015','37.787274554650814','seonkyojang_main.jpg',4,'OO동'),(24,'씨에스타','stay','guest house','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',0,'128.9124272778853','37.79692315685062','siestar_main.jpg',1,'OO동'),(25,'쏠','stay','guest house','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',0,'128.89388642903177','37.81416929428848','sol_main.jpg',4,'OO동'),(26,'테라로사','cafe','abnormal','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',0,'128.88504347779983','37.82240068661653','terrarosa_main.jpg',6,'OO동'),(27,'툇마루','cafe','abnormal','썸네일 샘플','content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample content sample ','address sample','hours_sample','000-0000-0000','000-0000-0000',0,'128.91360871897047','37.787801928705896','toitmaru_main.jpg',6,'OO동'),(775,'박이추 커피공장','cafe',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,'128.86685462219364','37.84689771968194','bak2chew.jpg',3,'OO동');
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
) ENGINE=MyISAM AUTO_INCREMENT=192 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (180,'test','81dc9bdb52d04dc20036dbd8313ed055','asdf',0,1973),(181,'test2','81dc9bdb52d04dc20036dbd8313ed055','asdf',0,7912),(182,'test3','81dc9bdb52d04dc20036dbd8313ed055','asdf',0,9523),(183,'test10','81dc9bdb52d04dc20036dbd8313ed055','asldkfj',0,8526),(184,'test20','81dc9bdb52d04dc20036dbd8313ed055','sldakfj',0,8701),(185,'test1000','81dc9bdb52d04dc20036dbd8313ed055','sfda',1,7974),(186,'asdf','81dc9bdb52d04dc20036dbd8313ed055','wfe',0,2245),(187,'tt1t','200820e3227815ed1756a6b531e7e0d2','asdf',0,8067),(188,'tt11','81dc9bdb52d04dc20036dbd8313ed055','qw',0,9242),(189,'test1001','81dc9bdb52d04dc20036dbd8313ed055','laskdfj',1,5306),(190,'test1111','81dc9bdb52d04dc20036dbd8313ed055','asdlkfj',1,3569),(191,'ttest','81dc9bdb52d04dc20036dbd8313ed055','asdlkfj',0,2429);
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

-- Dump completed on 2019-11-20 18:07:32
