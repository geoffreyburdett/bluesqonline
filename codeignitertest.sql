-- MySQL dump 10.13  Distrib 5.5.37, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: codeignitertest
-- ------------------------------------------------------
-- Server version	5.5.37-0ubuntu0.12.04.1

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
-- Table structure for table `entries`
--

DROP TABLE IF EXISTS `entries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entries`
--

LOCK TABLES `entries` WRITE;
/*!40000 ALTER TABLE `entries` DISABLE KEYS */;
INSERT INTO `entries` VALUES (1,'blog entry 1','entry1','NOW! This is my 1st blog entry, bitches!'),(2,'blog entry 2','entry2','Blog entry 2 text... asdf'),(3,'blog entry 3','entry3','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean enim ante, imperdiet non molestie id, sollicitudin et mi. Mauris vestibulum nisi vitae rhoncus venenatis. Pellentesque aliquam congue neque, ut placerat ipsum ultrices et. Sed eget libero nec tellus condimentum fermentum. Integer at tristique lacus. Ut nec ante at urna mattis luctus et sit amet risus. Cras metus arcu, rutrum at nisl id, ullamcorper convallis ligula. Donec a libero pellentesque, venenatis leo vel, luctus libero. Praesent fermentum condimentum elit, quis vestibulum est hendrerit nec. Sed ornare, ante eu cursus accumsan, diam velit euismod justo, a vehicula lacus ante eget lectus. Praesent sed commodo mi, sed mollis tellus.</p> \n<p>Duis in volutpat neque. Quisque congue magna sit amet ullamcorper pellentesque. Aenean tincidunt accumsan elit eu lobortis. Cras vestibulum urna ac nunc hendrerit volutpat nec eget erat. Morbi ut tellus ac orci mollis faucibus. Sed lorem neque, ornare sit amet imperdiet a, dictum viverra velit. Vivamus elit odio, gravida a mauris hendrerit, scelerisque luctus lectus. In venenatis ac turpis eget mattis. Cras sed tempor massa, vitae viverra ante. Integer interdum dui a purus gravida sodales. Ut quam elit, vestibulum id congue at, sollicitudin eget libero. Nam nec justo risus. Sed commodo eros in enim rhoncus rhoncus. Fusce molestie ligula odio, et facilisis erat tincidunt et. Nam suscipit fringilla tortor ut facilisis. Donec et ante sit amet lectus tincidunt placerat.</p> \n<p>Pellentesque tincidunt lacus nisi, ultrices dapibus lorem vehicula et. In hac habitasse platea dictumst. Sed eu laoreet leo. Suspendisse eu turpis turpis. Vestibulum ut mi vel nisl bibendum sollicitudin. Morbi quis urna nec lorem porta rhoncus. Donec pulvinar risus tincidunt facilisis sollicitudin. Fusce id urna velit. Mauris id tellus eget est viverra consectetur accumsan sed purus. Sed tincidunt risus eget velit rhoncus, posuere semper massa venenatis. Fusce a sem porta, aliquam libero in, ullamcorper neque. Nullam dolor leo, rutrum eu sapien eu, posuere pharetra sem. Duis et congue odio, a varius felis. Vivamus gravida rutrum mi sed suscipit. Vestibulum non pharetra tortor.</p> \n<p>Phasellus vitae magna adipiscing, interdum arcu eget, cursus risus. Suspendisse venenatis massa lobortis lacus pellentesque dapibus. Praesent eu velit sed nibh egestas consectetur et et mi. Nunc lobortis metus urna. Duis non enim ut ante aliquet hendrerit. Proin eu est tempor, mattis elit eu, malesuada nisl. Mauris in odio consequat ante posuere commodo eu vitae lectus. Praesent sit amet justo sit amet tellus sollicitudin varius. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus vitae massa faucibus, tempor odio et, faucibus nisi. Donec eget varius lectus.</p> \n<p>Cras id lectus arcu. Sed scelerisque purus augue, ut convallis purus viverra et. Cras posuere odio imperdiet dui gravida porttitor. Proin semper, tellus ac euismod tristique, lectus erat congue turpis, eu euismod diam tortor quis turpis. Proin vehicula risus quis justo adipiscing, sit amet posuere velit malesuada. Praesent sodales erat faucibus imperdiet fermentum. In at placerat enim. Morbi gravida condimentum ligula, vel feugiat libero tempor vel. Etiam convallis turpis ut tortor tincidunt, vitae tempor diam ornare. Pellentesque lorem ipsum, molestie ut sem at, eleifend congue metus. Donec sed arcu leo.</p> \n'),(16,'title','slug','content here'),(17,'a','b','c'),(18,'title','slu','asdf'),(19,'title','slug','content'),(20,'blog entry 1','entry1','Blog entry 1 text...'),(21,'blog entry 1','entry1','This is my 1st blog entry, bithes!'),(22,'title','slug','content'),(23,'title2','slug','content'),(24,'title2','slug','content'),(25,'new entry','new slug','new content'),(26,'new entry','new slug','new content'),(27,'new entry','new slug','new content'),(28,'a','b','c'),(29,'a','b','c'),(30,'a','b','c'),(31,'sdfa','sadf','asdf'),(32,'trew','asdf','asdf'),(33,'trewds','asdfasdf','asdf'),(34,'trewdswqre','asdfasdf','asdf'),(35,'dsf','sdfa','bkhjl'),(36,'blog entry 2','entry2','Blog entry 2 text...'),(37,'sdfafsd','sdaf','dsfa');
/*!40000 ALTER TABLE `entries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'article1 title','article1','article1 text'),(2,'article2 title','article2','article2 text'),(3,'asdfasdfasdfasdfasdfasdfasdfasdfasdfkmlashdflkjashdilfubaslkdjfnlaksdjfnkluasdjnfkjasdfnlkjasdkfnaksljdfhcmlskdfhclkadjsfhmlckaj','asdfasdfasdfasdfasdfasdfasdfasdfasdfkmlashdflkjashdilfubaslkdjfnlaksdjfnkluasdjnfkjasdfnlkjasdkfnaksljdfhcmlskdfhclkadjsfhmlckaj','asdf'),(4,'asdf','asdf','asdf');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `first_name` varchar(400) DEFAULT NULL,
  `last_name` varchar(400) DEFAULT NULL,
  `access_level` tinyint(4) DEFAULT NULL,
  `email` varchar(400) DEFAULT NULL,
  `pw_update_req` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'geoffreyburdett','5a61e08372771cc0587c74a846621ce9','2014-06-13 12:28:06','geoffrey','burdett',50,NULL,NULL),(3,'viewer','5a61e08372771cc0587c74a846621ce9','0000-00-00 00:00:00','Viewer','Burdett',10,'asdf@asdf.asdf',NULL),(4,'editor','5a61e08372771cc0587c74a846621ce9','0000-00-00 00:00:00','Editor','Burdett',10,NULL,NULL),(5,'creator','5a61e08372771cc0587c74a846621ce9','0000-00-00 00:00:00','Creator','Burdett',10,NULL,NULL),(6,'admin','5a61e08372771cc0587c74a846621ce9','0000-00-00 00:00:00','Admin','Burdett',10,NULL,NULL),(7,'superuser','5a61e08372771cc0587c74a846621ce9','0000-00-00 00:00:00','SuperUser','Burdett',10,NULL,NULL),(40,'bbobs','a49d67f580804caf12f2e3f94dd662a5','2014-06-24 14:49:58','billy','bob',10,'geoffreyburdett@gmail.com',NULL);
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

-- Dump completed on 2014-08-06 14:42:39
