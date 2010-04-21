-- MySQL dump 10.11
--
-- Host: localhost    Database: sbwd
-- ------------------------------------------------------
-- Server version	5.0.38-Ubuntu_0ubuntu1-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL auto_increment,
  `username` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'jim','ee76bae37306a745dfc3afc4f6f6f1fc403d5bb5');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ads`
--

DROP TABLE IF EXISTS `ads`;
CREATE TABLE `ads` (
  `ad_id` int(11) NOT NULL auto_increment,
  `ad_img` varchar(120) NOT NULL,
  `ad_link` varchar(120) default NULL,
  PRIMARY KEY  (`ad_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ads`
--

LOCK TABLES `ads` WRITE;
/*!40000 ALTER TABLE `ads` DISABLE KEYS */;
INSERT INTO `ads` VALUES (1,'ad_2113861727853503305.jpg','http://www.solutionsbridal.com/events.php'),(2,'ad_10889844861016112291.jpg','http://supersite.com');
/*!40000 ALTER TABLE `ads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collection_photos`
--

DROP TABLE IF EXISTS `collection_photos`;
CREATE TABLE `collection_photos` (
  `cphoto_id` int(11) NOT NULL auto_increment,
  `col_id` int(11) NOT NULL,
  `cphoto_url` varchar(120) NOT NULL,
  PRIMARY KEY  (`cphoto_id`)
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `collection_photos`
--

LOCK TABLES `collection_photos` WRITE;
/*!40000 ALTER TABLE `collection_photos` DISABLE KEYS */;
INSERT INTO `collection_photos` VALUES (10,2,'sb_6606946691426052205.jpg'),(11,2,'sb_10368988741516462107.jpg'),(12,2,'sb_605355025318415875.jpg'),(13,2,'sb_986485475500242715.jpg'),(16,2,'sb_7896599131992356410.jpg'),(17,2,'sb_15908706712086309934.jpg'),(18,3,'sb_17602931161181201832.jpg'),(19,3,'sb_21102000791158589808.jpg'),(20,3,'sb_1907999911981655969.jpg'),(21,3,'sb_1282273993275322590.jpg'),(22,5,'sb_16654084381083266934.jpg'),(23,5,'sb_6088186871210485463.jpg'),(24,5,'sb_4601827601640164789.jpg'),(25,6,'sb_680654798486097080.jpg'),(26,6,'sb_3432471831673185568.jpg'),(27,6,'sb_679108206396178539.jpg'),(28,6,'sb_9272283591583342956.jpg'),(36,18,'sb_2318031771159218740.jpg'),(34,18,'sb_21204210671999073934.jpg'),(35,18,'sb_1373842675198736943.jpg'),(37,18,'sb_438445300966180999.jpg'),(38,19,'sb_885274202206970672.jpg'),(39,19,'sb_10889963921671982030.jpg'),(40,19,'sb_1465492685292208431.jpg'),(41,19,'sb_18896285451434312313.jpg'),(42,20,'sb_19965689542044907005.jpg'),(43,20,'sb_7823534571310883386.jpg'),(44,20,'sb_227086691700588572.jpg'),(45,20,'sb_5642085401674121384.jpg'),(46,20,'sb_19420706321972807740.jpg'),(47,20,'sb_1149292820802931404.jpg'),(48,20,'sb_2612184771503732371.jpg'),(49,20,'sb_5170626571034384788.jpg'),(59,21,'sb_1669803297766084695.jpg'),(56,21,'sb_1161419628157024663.jpg'),(57,21,'sb_1532778055936007882.jpg'),(58,21,'sb_902518239346448425.jpg'),(60,21,'sb_19400334121598872468.jpg'),(61,21,'sb_347380001507768401.jpg'),(62,21,'sb_14012801631539735117.jpg'),(63,21,'sb_154398543955990923.jpg'),(64,21,'sb_19888071081674899612.jpg'),(65,22,'sb_1071337111078782726.jpg'),(66,22,'sb_406266822158353131.jpg'),(67,22,'sb_16931391892067746455.jpg'),(69,22,'sb_48817930337246066.jpg'),(70,23,'sb_20602974781238131728.jpg'),(71,23,'sb_2076530146289507725.jpg'),(72,23,'sb_20435145221836139408.jpg'),(73,23,'sb_124816743260522227.jpg'),(74,24,'sb_6578971131203282111.jpg'),(75,24,'sb_1839422503452815196.jpg'),(76,24,'sb_11600597221829056515.jpg'),(77,24,'sb_2055389510282447334.jpg'),(78,13,'sb_933659142606310485.jpg'),(79,13,'sb_1483311529224255872.jpg'),(80,13,'sb_364640526895839347.jpg'),(81,13,'sb_9383566649198526.jpg'),(82,13,'sb_1489342184660523705.jpg'),(83,13,'sb_1421872491158427702.jpg'),(84,14,'sb_1696400871490742887.jpg'),(85,14,'sb_72184740050888756.jpg'),(86,14,'sb_724054025181440062.jpg'),(87,14,'sb_21076624421313931934.jpg'),(88,14,'sb_9711973661617413891.jpg'),(89,14,'sb_7851744181567133922.jpg'),(90,15,'sb_10162022382116177796.jpg'),(91,15,'sb_1573470326191963337.jpg'),(92,15,'sb_234870107748562914.jpg'),(93,15,'sb_16852578121822503091.jpg'),(95,12,'sb_1981243768881905435.jpg'),(96,12,'sb_13786506131767876835.jpg'),(97,12,'sb_390172041643301946.jpg'),(98,9,'sb_1043487460506052035.jpg'),(99,9,'sb_4204639761393417787.jpg'),(100,7,'sb_975643637100873451.jpg'),(101,7,'sb_5368625501965646501.jpg'),(102,7,'sb_9231064201411851360.jpg'),(103,25,'sb_38925332345375518.jpg'),(104,25,'sb_2022238823800589859.jpg'),(109,25,'sb_2034221352602455738.jpg'),(112,25,'sb_11344153841348126334.jpg'),(113,26,'sb_96270188249595295.jpg'),(114,26,'sb_1705950705743829687.jpg');
/*!40000 ALTER TABLE `collection_photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `collections`
--

DROP TABLE IF EXISTS `collections`;
CREATE TABLE `collections` (
  `col_id` int(11) NOT NULL auto_increment,
  `col_type` varchar(50) NOT NULL,
  `col_name` varchar(120) NOT NULL,
  `col_desc` text,
  PRIMARY KEY  (`col_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `collections`
--

LOCK TABLES `collections` WRITE;
/*!40000 ALTER TABLE `collections` DISABLE KEYS */;
INSERT INTO `collections` VALUES (1,'bridal','Jasmine','																																The Jasmine collection has prided itself in innovation and design sine 1985. They provide two lines of dresses: Jasmine Couture and Jasmine Collection. With both these lines, Jasmine hopes to satisfy any bride. Their designs are constructed by individual seamstresses and feature hand-sewn beadwork and trim. With a commitment to great customer service and satisfaction, Jasmine is extremely flexible in making almost any changes to their dresses. Jasmine creates the perfect gown for the high fashion bride.																																			'),(2,'bridal','Watters & Watters','Influenced by the fashion forward looks of New York and Milan, Vatana Watters has a modern vision for glamorous yet simple bridal gowns. Consisting of two lines, Watters and WTOO, these gowns feature clean lines with detail in fabric instead of heavy embroidery. Combining the best luxury fabrics with clever designs, a Watters gown is perfect for a simplistic bride. 																					'),(3,'bridal','Justina McCaffrey','Graduating from the Fashion Institute of LA in 1985, McCaffrey has become a household name in the North American bridal market. After creating her own wedding dress, McCaffrey began her start in the industry with friends and relatives requesting her designs. With gowns showing off their elegance, delicacy, and originality, the McCaffrey label has a distinctive look. With gowns that stand for something timeless with a hint of nostalgia to the classics, a McCaffrey gown is perfect for the graceful bride. 														'),(4,'bridal','Marisa','Marisa, founded in 1988, offers contemporary gowns with understated elegance. With an emphasis on body shaping instead of overdone detail, Marisa gowns are known for their stunning silhouettes.  These high-quality yet affordable gowns with pure silks are perfect for the fashionable bride. 														'),(5,'bridal','Alvina Valenta','								Alvina Valenta designer Victoria McMillan prides herself in making gowns known for their timeless elegance, intricate detail, and sophistication. All of these gowns are embellished by hand with hand-rolled roses, beading, and consist of the finest silks. McMillan, known for experimenting with pastel shades in addition to the traditional white and ivory, adds a personal touch of lace and edging to the hems of her gowns. A Alvina Valenta gown is perfect for the contemporary bride. 																												'),(6,'bridal','Anne Barge','								With a design career spanning of over thirty years, the Anne Barge collection has made a name synonymous with superior bridal gowns. Anne\\\'s custom made gowns are inspired by 1950\\\'s and 1960\\\'s classics. All of her gowns are custom made to transform the client\\\'s vision of her dress into reality. An Anne Barge gown is perfect for the timeless, southern bride. 																						'),(7,'bridal','Rivini','								RIVINI designer Rita Vinieris is known for creating gowns with simple luxury consisting of fluid silhouettes and much attention to detail. RIVINI gowns, cut from lush silks, crepes, satins, chiffons, and organzas, will leave a bride glowing with elegance. Subtle finishing touches include soft tucks and pleats, understated beading and a modern cut. A RIVINI gown is perfect for the luxurious bride. 							'),(8,'bridal','Mikaella','																Mikaella designer Paloma Blanca has been producing exceptional bridal gowns since 1937. With Mikaellaï¿½s launch in 2004, these gowns were to designed to provide the bridal industry with a high quality product at an attractive price. A Mikaella gown is perfect for a classic bride with a modern 21st century flair. 														'),(9,'bridal','Kenneth Poole','								Founded in 2003 by Amsale Aberra, the Kenneth Pool collection is known for its sexy and unapologetic glamour. This label has long been recognized for its embodiment of drama, luxurious fabrics, and exquisite beadwork. The Kenneth Pool collection allows Aberra to show off her creativity with elaborate fashion. A Kenneth Pool gown is perfect for a bride who commands the spotlight. 							'),(10,'bridal','Romona Keveza','Coming Soon.'),(11,'bridal','Amy Michelson','								Coming Soon.							'),(12,'bridal','Lazaro','								Lazaro, former artist, has transformed his works into bridal gown masterpieces. Avoiding trends, Lazarro blends ultra-glamorous vintage details and floral embellishments into his collections. The Lazaro gown ranges from simple silhouettes to extravagant ball gowns and is perfect for a feminine bride. 							'),(13,'ATTENDANTS','Watters & Watters','																																													'),(14,'ATTENDANTS','The Dessy Group','								Coming Soon.							'),(15,'ATTENDANTS','Lazaro','															'),(16,'ATTENDANTS','Bill Levkoff','																														'),(18,'FLOWERGIRLS','Wawa Flower Girls','								\r\n							'),(19,'ACCESSORIES','Angela Nuran Shoes','								\r\n							'),(20,'ACCESSORIES','Grace & Garzia Shoes','								\r\n							'),(21,'ACCESSORIES','Mariell Jewelry','								\r\n							'),(22,'ACCESSORIES','Touch-Ups Shoes','								\r\n							'),(23,'FLOWERGIRLS','Rosebuds','								\r\n							'),(24,'FLOWERGIRLS','Us Angels','								\r\n							'),(25,'MOMS','Watters & Watters','								\r\n							'),(26,'BRIDAL','Alfred Sung','Alfred Sung, Canadaâ€™s top fashion designer and renowned international style maker, prides himself in designing lavish gowns with indulgent details. This collection comprises of beautifully crafted silhouette gowns ranging from graceful to dramatic in their yards of Angel Tulle, lustrous satins, and silk chiffons. An Alfred Sung gown is perfect for the sophisticated bride. 								\r\n							');
/*!40000 ALTER TABLE `collections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `event_id` int(10) unsigned NOT NULL auto_increment,
  `event_h1` varchar(120) NOT NULL,
  `event_h2` varchar(120) default NULL,
  `event_type` varchar(45) NOT NULL,
  `event_date` varchar(45) NOT NULL,
  `event_time` varchar(45) default NULL,
  `event_place` varchar(120) default NULL,
  PRIMARY KEY  (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'MOVING SALE','Designer Gowns On Sale','event','April 16th-May 25th','','Winter Park');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photoshoot_photos`
--

DROP TABLE IF EXISTS `photoshoot_photos`;
CREATE TABLE `photoshoot_photos` (
  `photo_id` int(11) NOT NULL auto_increment,
  `ps_id` int(11) NOT NULL,
  `photo_url` varchar(120) NOT NULL,
  PRIMARY KEY  (`photo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photoshoot_photos`
--

LOCK TABLES `photoshoot_photos` WRITE;
/*!40000 ALTER TABLE `photoshoot_photos` DISABLE KEYS */;
INSERT INTO `photoshoot_photos` VALUES (1,1,'sb_179248237324931846.jpg'),(2,1,'sb_10699900231561218480.jpg'),(3,1,'sb_13074050721646821013.jpg');
/*!40000 ALTER TABLE `photoshoot_photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photoshoots`
--

DROP TABLE IF EXISTS `photoshoots`;
CREATE TABLE `photoshoots` (
  `ps_id` int(11) NOT NULL auto_increment,
  `ps_name` varchar(50) NOT NULL,
  `ps_thumb` varchar(120) default NULL,
  `ps_photographer` varchar(120) NOT NULL,
  PRIMARY KEY  (`ps_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photoshoots`
--

LOCK TABLES `photoshoots` WRITE;
/*!40000 ALTER TABLE `photoshoots` DISABLE KEYS */;
INSERT INTO `photoshoots` VALUES (1,'test','th_sb_13074050721646821013.jpg','Charles De Gaul');
/*!40000 ALTER TABLE `photoshoots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `press`
--

DROP TABLE IF EXISTS `press`;
CREATE TABLE `press` (
  `press_id` int(10) unsigned NOT NULL auto_increment,
  `press_name` varchar(120) NOT NULL,
  `press_desc` text,
  `press_img` varchar(120) default NULL,
  PRIMARY KEY  (`press_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `press`
--

LOCK TABLES `press` WRITE;
/*!40000 ALTER TABLE `press` DISABLE KEYS */;
INSERT INTO `press` VALUES (2,'test2','This was an excerpt from a beautiful little spread we did in Bridal Outdoorswomen Monthly. Pg 31-39.																											','ad_796748325797647573.jpg'),(4,'test1','Another delightful spread from Urban box headed brides.','ad_9408271411091678435.jpg'),(5,'test3','Beautiful long text listing to see how it will flow on the page.','ad_19159833331381028829.jpg'),(6,'test','another test to see how it\'ll flow... notice I put an apostrophe in there....','ad_244989030156534307.jpg'),(7,'The Knot','','p_1508353691657695318.jpg');
/*!40000 ALTER TABLE `press` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quotes`
--

DROP TABLE IF EXISTS `quotes`;
CREATE TABLE `quotes` (
  `q_id` int(10) unsigned NOT NULL auto_increment,
  `q_body` text NOT NULL,
  `q_sig` varchar(120) NOT NULL,
  PRIMARY KEY  (`q_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quotes`
--

LOCK TABLES `quotes` WRITE;
/*!40000 ALTER TABLE `quotes` DISABLE KEYS */;
INSERT INTO `quotes` VALUES (1,'\"It was the most beautiful day of my life.\"		\r\n							','-Sara, brand new bride'),(2,'\"Such a gorgeous experience...\"							\r\n																																																								','-Delia');
/*!40000 ALTER TABLE `quotes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salegowns`
--

DROP TABLE IF EXISTS `salegowns`;
CREATE TABLE `salegowns` (
  `gown_id` int(11) NOT NULL auto_increment,
  `gown_name` varchar(60) default NULL,
  `gown_desc` text,
  `gown_designer` varchar(120) default NULL,
  `gown_img` varchar(120) default NULL,
  PRIMARY KEY  (`gown_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salegowns`
--

LOCK TABLES `salegowns` WRITE;
/*!40000 ALTER TABLE `salegowns` DISABLE KEYS */;
INSERT INTO `salegowns` VALUES (8,'2087','Alencon Lace, Ivory, Size 10,\r\n	Retail $3909.99, Sale $2931','Judd Waddell','g_1516815995241047110.jpg'),(9,'Lusso','Double Faced Silk, Ivory & Tonal Beading\r\n	Retail $5255.99, Sale $3941','Rivini','g_1205792103606029328.jpg'),(6,'1085','Satin, White Size 10, Retail $2,580, Sale $1935','Judd Waddell','g_5796529791953972558.jpg'),(10,'233720 ','Size 8 Satin, Ivory\r\n	Retail $1390.99, Sale $695','2Be by Elizabeth Darcy','g_619768500534311235.jpg'),(11,'2092','Size 0, Silk Crepe, Ivory\r\n	Retail $1920.99, Sale $1440','Watters','g_12649692256828842.jpg'),(12,'Janice','Size 10, Lace, Pearl White\r\n	Retail $1245, Sale $933','Miryam','g_988856961836678952.jpg'),(13,'T182','Size 12, Silk Satin, Ivory\r\n	Retail $1251.99, Sale $938','Jasmine','g_1559392026492694514.jpg'),(14,'3517','Size 10, Silk Satin, White\r\n	Retail $3319.99, Sale $2489','Lazaro','g_9379548061780145273.jpg'),(15,'T934','Size 18, Satin, Ivory\r\n	Retail $1315, Sale $789','Jasmine','g_863805398617061705.jpg'),(16,'F117','Size 12, Satin, Ivory\r\n	Retail $820.99, Sale $410','Jasmine','g_2024131756399371943.jpg'),(17,'Lustro','Size 10, Silk, Ivory\r\n	Retail $4771.99, Sale $3578','Rivini','g_14049476832124221832.jpg'),(18,'05053B','Size 10, Silk Shantung, Ivory\r\n	Retail $1383.99, Sale $691','Watters','g_1858414541819544143.jpg'),(19,'233705','Size 10, Organza & Ribbon, Ivory\r\n	Retail $1041.99, Sale $520','2Be by Elizabeth Darcy','g_15122168331250564857.jpg'),(20,'Palasis','Size 10, Silk Satin, White\r\n	Retail $4802.99, Sale $2401','Rivini','g_4063217531881979243.jpg'),(27,'T885','Size 12, Silk Satin, Ivory\r\n	Retail $2134.99, Sale $1067','Jasmine','g_9955123141892382262.jpg'),(26,'1262','Size 10, Lace Taffeta, Pearl\r\n	Retail $1475.99, Sale $737','Mikaella','g_11528080821183229671.jpg'),(25,'19663 ','Size 12, Lace & Organza, White/Oyster\r\n	Retail $3385.99, Sale $2031','Alvina Valenta','g_11094122911069173827.jpg'),(24,'F864','Size 14, Never Been Worn, Taffeta, White\r\n	Retail $793.99, no sale, brand new','Jasmine','g_10559234091697948194.jpg'),(28,'F121','Size 12, Taffeta, Ivory\r\n	Retail $655.99, Sale $327','Jasmine','g_15817515091195629549.jpg'),(29,'T996','Size 12, Satin, Ivory\r\n	Retail $1491.99, Sale $745','Jasmine','g_2000340436276243401.jpg'),(30,'3502','Size 12, Tulle, Ivory\r\n	Retail $2820.99, Sale $1690','Lazaro','g_93606664726590853.jpg'),(31,'F811','Size 10, Chiffon, Ivory\r\n	Retail $957.99, Sale $478','Jasmine','g_1174216651693146814.jpg'),(32,'T184','Size 12, Lace, Ivory\r\n	Retail $1504.99, Sale $752','Jasmine','g_1948900580999529412.jpg'),(33,'T188','Size 12, Taffeta, Taupe\r\n	Retail $1447.99, Sale $723','Jasmine','g_921142888751890312.jpg'),(34,'T185R','Size 14, Satin, Ivory\r\n	Retail $1328.99, Sale $664','Jasmine','g_158015911916714355.jpg'),(35,'F162','Size 12, Lace & Tulle, Ivory\r\n	Retail $921.99, Sale $460','Jasmine','g_7472029811467533272.jpg'),(36,'C2701','Size10, Satin, Retail $3487.99, Sale $1743','Kristy Kelly','g_1653599241933610702.jpg');
/*!40000 ALTER TABLE `salegowns` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2010-04-21  0:13:27
