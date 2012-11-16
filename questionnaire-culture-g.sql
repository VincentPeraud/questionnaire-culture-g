-- MySQL dump 10.13  Distrib 5.5.25, for osx10.6 (i386)
--
-- Host: localhost    Database: questionnaire-culture-g
-- ------------------------------------------------------
-- Server version	5.5.25

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
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (1,'Avez-vous enrichi votre culture gÃ©nÃ©rale personnelle en assistant aux cours ?',1),(2,'Si vous avez rÃ©pondu non Ã  la question prÃ©cÃ©dente, expliquez briÃ¨vement pourquoi :',2),(3,'Quelle note donneriez-vous Ã  ces cours de culture gÃ©nÃ©rale ?',3),(4,'Que pensez-vous de la maniÃ¨re dont le cours est prÃ©sentÃ©, de la maniÃ¨re dont il se dÃ©roule ?',4),(5,'Avez-vous des suggestions pour amÃ©liorer le cours ? De quels autres sujets aimeriez-vous dÃ©battre ?',5),(6,'Autres remarques :',6);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reponse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_question` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_question` (`id_question`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `reponse_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `reponse_ibfk_3` FOREIGN KEY (`id_question`) REFERENCES `question` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reponse`
--

LOCK TABLES `reponse` WRITE;
/*!40000 ALTER TABLE `reponse` DISABLE KEYS */;
/*!40000 ALTER TABLE `reponse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(8) NOT NULL,
  `datetime` datetime DEFAULT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'amghar_a',NULL,0),(2,'amrani_i',NULL,0),(3,'barrie_a',NULL,0),(4,'belhad_b',NULL,0),(5,'bourdo_j',NULL,0),(6,'brogow_a',NULL,0),(7,'comman_b',NULL,0),(8,'de-cas_b',NULL,0),(9,'desboy_y',NULL,0),(10,'diallo_l',NULL,0),(11,'ekwegb_s',NULL,0),(12,'fouqui_c',NULL,0),(13,'gandji_m',NULL,0),(14,'garry_m',NULL,0),(15,'getto_f',NULL,0),(16,'gibeau_l',NULL,0),(17,'hajem_s',NULL,0),(18,'jolive_p',NULL,0),(19,'kherfi_a',NULL,0),(20,'le-van_a',NULL,0),(21,'levava_s',NULL,0),(22,'lounes_z',NULL,0),(23,'mardar_r',NULL,0),(24,'merbou_l',NULL,0),(25,'miziel_r',NULL,0),(26,'moumni_a',NULL,0),(27,'myrtil_t',NULL,0),(28,'nivet_a',NULL,0),(29,'patry_r',NULL,0),(30,'philip_c',NULL,0),(31,'pouit_d',NULL,0),(32,'prevos_b',NULL,0),(33,'ribeir_a',NULL,0),(34,'sepher_a',NULL,0),(35,'siba_a',NULL,0),(36,'surmel_m',NULL,0),(37,'talis_l',NULL,0),(38,'touba_e',NULL,0),(39,'valett_a',NULL,0),(40,'virapa_d',NULL,0),(41,'peraud_v',NULL,1),(42,'ngonta_e',NULL,1),(43,'lopez_l',NULL,1);
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

-- Dump completed on 2012-11-16 15:33:08
