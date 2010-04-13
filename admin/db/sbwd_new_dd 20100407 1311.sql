-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.37


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema sbwd
--

CREATE DATABASE IF NOT EXISTS sbwd;
USE sbwd;

--
-- Definition of table `sbwd`.`admins`
--

DROP TABLE IF EXISTS `sbwd`.`admins`;
CREATE TABLE  `sbwd`.`admins` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sbwd`.`admins`
--

/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
LOCK TABLES `admins` WRITE;
INSERT INTO `sbwd`.`admins` VALUES  (1,'jim','ee76bae37306a745dfc3afc4f6f6f1fc403d5bb5');
UNLOCK TABLES;
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;


--
-- Definition of table `sbwd`.`collection_photos`
--

DROP TABLE IF EXISTS `sbwd`.`collection_photos`;
CREATE TABLE  `sbwd`.`collection_photos` (
  `cphoto_id` int(11) NOT NULL AUTO_INCREMENT,
  `col_id` int(11) NOT NULL,
  `cphoto_url` varchar(120) NOT NULL,
  PRIMARY KEY (`cphoto_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sbwd`.`collection_photos`
--

/*!40000 ALTER TABLE `collection_photos` DISABLE KEYS */;
LOCK TABLES `collection_photos` WRITE;
INSERT INTO `sbwd`.`collection_photos` VALUES  (10,2,'sb_6606946691426052205.jpg'),
 (11,2,'sb_10368988741516462107.jpg'),
 (12,2,'sb_605355025318415875.jpg'),
 (13,2,'sb_986485475500242715.jpg'),
 (16,2,'sb_7896599131992356410.jpg'),
 (17,2,'sb_15908706712086309934.jpg'),
 (18,3,'sb_17602931161181201832.jpg'),
 (19,3,'sb_21102000791158589808.jpg'),
 (20,3,'sb_1907999911981655969.jpg'),
 (21,3,'sb_1282273993275322590.jpg'),
 (22,5,'sb_16654084381083266934.jpg'),
 (23,5,'sb_6088186871210485463.jpg'),
 (24,5,'sb_4601827601640164789.jpg'),
 (25,6,'sb_680654798486097080.jpg'),
 (26,6,'sb_3432471831673185568.jpg'),
 (27,6,'sb_679108206396178539.jpg'),
 (28,6,'sb_9272283591583342956.jpg');
UNLOCK TABLES;
/*!40000 ALTER TABLE `collection_photos` ENABLE KEYS */;


--
-- Definition of table `sbwd`.`collections`
--

DROP TABLE IF EXISTS `sbwd`.`collections`;
CREATE TABLE  `sbwd`.`collections` (
  `col_id` int(11) NOT NULL AUTO_INCREMENT,
  `col_type` varchar(50) NOT NULL,
  `col_name` varchar(120) NOT NULL,
  `col_desc` text,
  PRIMARY KEY (`col_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sbwd`.`collections`
--

/*!40000 ALTER TABLE `collections` DISABLE KEYS */;
LOCK TABLES `collections` WRITE;
INSERT INTO `sbwd`.`collections` VALUES  (2,'bridal','Watters & Watters','								Influenced by the fashion forward looks of New York and Milan, Vatana Watters has a modern vision for glamorous yet simple bridal gowns. Consisting of two lines, Watters and WTOO, these gowns feature clean lines with detail in fabric instead of heavy embroidery. Combining the best luxury fabrics with clever designs, a Watters gown is perfect for a simplistic bride. 																												'),
 (3,'bridal','Justina McCaffrey','Graduating from the Fashion Institute of LA in 1985, McCaffrey has become a household name in the North American bridal market. After creating her own wedding dress, McCaffrey began her start in the industry with friends and relatives requesting her designs. With gowns showing off their elegance, delicacy, and originality, the McCaffrey label has a distinctive look. With gowns that stand for something timeless with a hint of nostalgia to the classics, a McCaffrey gown is perfect for the graceful bride. 														'),
 (4,'bridal','Marisa','Marisa, founded in 1988, offers contemporary gowns with understated elegance. With an emphasis on body shaping instead of overdone detail, Marisa gowns are known for their stunning silhouettes.  These high-quality yet affordable gowns with pure silks are perfect for the fashionable bride. 														'),
 (5,'bridal','Alvina Valenta','Alvina Valenta designer Victoria McMillan prides herself in making gowns known for their timeless elegance, intricate detail, and sophistication. All of these gowns are embellished by hand with hand-rolled roses, beading, and consist of the finest silks. McMillan, known for experimenting with pastel shades in addition to the traditional white and ivory, adds a personal touch of lace and edging to the hems of her gowns. A Alvina Valenta gown is perfect for the contemporary bride. 																					'),
 (6,'bridal','Anne Barge','With a design career spanning of over thirty years, the Anne Barge collection has made a name synonymous with superior bridal gowns. Anne\'s custom made gowns are inspired by 1950\'s and 1960\'s classics. All of her gowns are custom made to transform the client\'s vision of her dress into reality. An Anne Barge gown is perfect for the timeless, southern bride. 															'),
 (7,'bridal','Rivini','RIVINI designer Rita Vinieris is known for creating gowns with simple luxury consisting of fluid silhouettes and much attention to detail. RIVINI gowns, cut from lush silks, crepes, satins, chiffons, and organzas, will leave a bride glowing with elegance. Subtle finishing touches include soft tucks and pleats, understated beading and a modern cut. A RIVINI gown is perfect for the luxurious bride. '),
 (8,'bridal','Mikaella','Mikaella designer Paloma Blanca has been producing exceptional bridal gowns since 1937. With Mikaella’s launch in 2004, these gowns were to designed to provide the bridal industry with a high quality product at an attractive price. A Mikaella gown is perfect for a classic bride with a modern 21st century flair. '),
 (9,'bridal','Kenneth Poole','Founded in 2003 by Amsale Aberra, the Kenneth Pool collection is known for its sexy and unapologetic glamour. This label has long been recognized for its embodiment of drama, luxurious fabrics, and exquisite beadwork. The Kenneth Pool collection allows Aberra to show off her creativity with elaborate fashion. A Kenneth Pool gown is perfect for a bride who commands the spotlight. '),
 (10,'bridal','Romona Keveza','Coming Soon.'),
 (11,'bridal','Amy Michelson','Coming Soon.'),
 (14,'ATTENDANTS','The Dessy Group','Coming Soon.'),
 (15,'ATTENDANTS','Lazaro',NULL),
 (16,'ATTENDANTS','Bill Levkoff',NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `collections` ENABLE KEYS */;


--
-- Definition of table `sbwd`.`events`
--

DROP TABLE IF EXISTS `sbwd`.`events`;
CREATE TABLE  `sbwd`.`events` (
  `event_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `event_h1` varchar(120) NOT NULL,
  `event_h2` varchar(120) DEFAULT NULL,
  `event_type` varchar(45) NOT NULL,
  `event_date` varchar(45) NOT NULL,
  `event_time` varchar(45) DEFAULT NULL,
  `event_place` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sbwd`.`events`
--

/*!40000 ALTER TABLE `events` DISABLE KEYS */;
LOCK TABLES `events` WRITE;
INSERT INTO `sbwd`.`events` VALUES  (1,'FLORDA','BRIDAL EXPO','event','January 31st, 2010','12PM - 4:30PM','');
UNLOCK TABLES;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;


--
-- Definition of table `sbwd`.`photoshoot_photos`
--

DROP TABLE IF EXISTS `sbwd`.`photoshoot_photos`;
CREATE TABLE  `sbwd`.`photoshoot_photos` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `ps_id` int(11) NOT NULL,
  `photo_url` varchar(120) NOT NULL,
  PRIMARY KEY (`photo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sbwd`.`photoshoot_photos`
--

/*!40000 ALTER TABLE `photoshoot_photos` DISABLE KEYS */;
LOCK TABLES `photoshoot_photos` WRITE;
INSERT INTO `sbwd`.`photoshoot_photos` VALUES  (19,6,'sb_8835965091691075747.jpg'),
 (18,5,'sb_1063698003270389394.jpg'),
 (17,4,'sb_2082119050457538489.jpg'),
 (16,3,'sb_16759662981379261738.jpg'),
 (15,3,'sb_594390048213271112.jpg'),
 (14,3,'sb_10546198582047532859.jpg'),
 (13,3,'sb_11576252642077348645.jpg'),
 (12,3,'sb_844514337814462349.jpg'),
 (21,7,'sb_179248237324931846.jpg'),
 (20,7,'sb_10699900231561218480.jpg'),
 (22,7,'sb_13074050721646821013.jpg');
UNLOCK TABLES;
/*!40000 ALTER TABLE `photoshoot_photos` ENABLE KEYS */;


--
-- Definition of table `sbwd`.`photoshoots`
--

DROP TABLE IF EXISTS `sbwd`.`photoshoots`;
CREATE TABLE  `sbwd`.`photoshoots` (
  `ps_id` int(11) NOT NULL AUTO_INCREMENT,
  `ps_name` varchar(50) NOT NULL,
  `ps_thumb` varchar(120) DEFAULT NULL,
  `ps_photographer` varchar(120) NOT NULL,
  PRIMARY KEY (`ps_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sbwd`.`photoshoots`
--

/*!40000 ALTER TABLE `photoshoots` DISABLE KEYS */;
LOCK TABLES `photoshoots` WRITE;
INSERT INTO `sbwd`.`photoshoots` VALUES  (7,'The Greens','th_sb_179248237324931846.jpg','Jim Wharton');
UNLOCK TABLES;
/*!40000 ALTER TABLE `photoshoots` ENABLE KEYS */;


--
-- Definition of table `sbwd`.`press`
--

DROP TABLE IF EXISTS `sbwd`.`press`;
CREATE TABLE  `sbwd`.`press` (
  `press_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `press_name` varchar(120) NOT NULL,
  `press_desc` text,
  PRIMARY KEY (`press_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sbwd`.`press`
--

/*!40000 ALTER TABLE `press` DISABLE KEYS */;
LOCK TABLES `press` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `press` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
