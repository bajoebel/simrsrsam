/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.1.37-MariaDB : Database - db_siranap
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_siranap` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_siranap`;

/*Table structure for table `tb_jenisruang` */

DROP TABLE IF EXISTS `tb_jenisruang`;

CREATE TABLE `tb_jenisruang` (
  `jenis_id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_ruangan` varchar(50) DEFAULT NULL,
  `jenis_status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`jenis_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `tb_jenisruang` */

insert  into `tb_jenisruang`(`jenis_id`,`jenis_ruangan`,`jenis_status`) values (1,'Ruang Perawatan Anak',1),(2,'Perinatologi',1),(3,'Ruang Perawatan Mata / THT/ Bedah',1),(4,'Ruang Perawatan Interne wanita',1),(5,'Ruang Perawatan Interne pria',1),(6,'Ruang Perawatan Paru',1),(7,'Ruang Perawatan Kebidanan',1),(8,'VIP ',1),(9,'Ruang Jantung',1),(10,'ICU',1),(11,'Neurologi',1),(12,'VIP C',1);

/*Table structure for table `tb_kelas` */

DROP TABLE IF EXISTS `tb_kelas`;

CREATE TABLE `tb_kelas` (
  `kelas_id` int(11) NOT NULL AUTO_INCREMENT,
  `kelas_nama` varchar(10) DEFAULT NULL,
  `kelas_status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`kelas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kelas` */

insert  into `tb_kelas`(`kelas_id`,`kelas_nama`,`kelas_status`) values (1,'KELAS I',1),(2,'KELAS II',1),(3,'KELAS III',1),(4,'UTAMA',1),(5,'VIP',1),(6,'HCU',1),(7,'ISOLASI',1);

/*Table structure for table `tb_ketersediaan` */

DROP TABLE IF EXISTS `tb_ketersediaan`;

CREATE TABLE `tb_ketersediaan` (
  `bed_id` int(11) NOT NULL AUTO_INCREMENT,
  `bed_jenisid` int(11) DEFAULT NULL,
  `bed_ruangid` int(5) DEFAULT NULL,
  `bed_kelasid` int(11) DEFAULT NULL,
  `bed_lkterisi` int(11) DEFAULT NULL,
  `bed_prterisi` int(11) DEFAULT NULL,
  `bed_lkprterisi` int(11) DEFAULT NULL,
  PRIMARY KEY (`bed_id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

/*Data for the table `tb_ketersediaan` */

insert  into `tb_ketersediaan`(`bed_id`,`bed_jenisid`,`bed_ruangid`,`bed_kelasid`,`bed_lkterisi`,`bed_prterisi`,`bed_lkprterisi`) values (4,1,1,1,1,0,0),(5,1,2,2,0,0,0),(6,1,3,7,0,0,0),(7,1,4,3,0,0,0),(8,1,5,3,0,0,0),(9,1,6,6,0,0,0),(10,1,6,3,0,0,0),(11,3,7,1,0,0,0),(12,3,12,2,0,0,0),(13,3,13,2,0,0,0),(14,3,8,3,0,0,0),(15,3,9,3,0,0,0),(16,3,10,3,0,0,0),(17,3,11,3,0,0,0),(18,4,14,1,0,0,0),(19,4,15,1,0,0,0),(20,4,18,2,0,0,0),(21,4,17,7,0,0,0),(22,4,20,2,0,0,0),(23,4,21,2,0,0,0),(24,4,22,6,0,0,0),(25,4,16,2,0,0,0),(26,4,19,2,0,0,0),(27,5,23,1,0,0,0),(28,5,24,1,0,0,0),(29,5,25,2,0,0,0),(30,5,26,7,0,0,0),(31,5,27,3,0,0,0),(32,5,28,3,0,0,0),(33,5,29,3,0,0,0),(34,5,30,3,0,0,0),(35,4,31,6,0,0,0),(36,6,33,1,0,0,0),(37,6,34,1,0,0,0),(38,6,32,3,0,0,0),(39,6,35,2,0,0,0),(40,6,36,7,0,0,0),(41,7,28,1,0,0,0),(42,7,38,2,0,0,0),(43,7,39,3,0,0,0),(44,8,40,5,0,0,0),(45,8,41,5,0,0,0),(46,8,42,5,0,0,0),(47,8,43,5,0,0,0),(48,8,44,5,0,0,0),(49,8,45,5,0,0,0),(50,8,46,5,0,0,0),(51,8,47,5,0,0,0),(52,8,48,5,0,0,0),(53,9,49,6,0,0,0),(54,9,50,1,0,0,0),(55,9,51,1,0,0,0),(56,9,52,2,0,0,0),(57,9,53,2,0,0,0),(58,10,37,1,0,0,0),(59,10,38,2,0,0,0),(60,10,39,3,0,0,0),(61,11,60,1,0,0,0),(62,11,61,2,0,0,0),(63,11,62,3,0,0,0),(64,11,63,3,0,0,0),(65,11,64,3,0,0,0),(66,11,65,3,0,0,0),(67,11,55,5,0,0,0),(68,11,58,5,0,0,0);

/*Table structure for table `tb_ruang` */

DROP TABLE IF EXISTS `tb_ruang`;

CREATE TABLE `tb_ruang` (
  `ruang_id` int(11) NOT NULL AUTO_INCREMENT,
  `ruang_nama` varchar(50) DEFAULT NULL,
  `ruang_kapasitas_lk` int(11) DEFAULT NULL,
  `ruang_kapasitas_pr` int(11) DEFAULT NULL,
  `ruang_kapasitas_lkpr` int(11) DEFAULT NULL,
  `ruang_kapasitas_rusak` int(11) DEFAULT NULL,
  `ruang_status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`ruang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

/*Data for the table `tb_ruang` */

insert  into `tb_ruang`(`ruang_id`,`ruang_nama`,`ruang_kapasitas_lk`,`ruang_kapasitas_pr`,`ruang_kapasitas_lkpr`,`ruang_kapasitas_rusak`,`ruang_status`) values (1,'ATHFAL I',1,1,0,0,1),(2,'ATHFAL II',0,0,3,0,1),(3,'ATHFAL III',0,0,3,0,1),(4,'ATHFAL IV',0,0,3,1,1),(5,'ATHFAL V',0,0,0,0,1),(6,'ATHFAL IV',0,0,3,0,1),(7,'HAJAROL ASWAT I',0,0,3,0,1),(8,'HAJAROL ASWAT II',0,3,0,0,1),(9,'HAJAROL ASWAT III',0,3,0,0,1),(10,'HAJAROL ASWAT IV',3,0,0,0,1),(11,'HAJAROL ASWAT V',3,0,0,0,1),(12,'HAJAROL ASWAT VI',2,0,0,0,1),(13,'HAJAROL ASWAT VII',0,2,0,0,1),(14,'ANNISA I',0,2,0,0,1),(15,'ANNISA II',0,2,0,0,1),(16,'ANNISA III',0,3,0,0,1),(17,'ANNISA IV',0,2,0,0,1),(18,'ANNISA V',0,2,0,0,1),(19,'ANNISA VI',0,3,0,0,1),(20,'ANNNISA VII',0,3,0,0,1),(21,'ANNISA VIII',0,3,0,0,1),(22,'ANNISA IX',0,2,0,0,1),(23,'IKHWAN I',2,0,0,0,1),(24,'IKHWAN II',2,0,0,0,1),(25,'IKHWAN III',3,0,0,0,1),(26,'IKHWAN IV',2,0,0,0,1),(27,'IKHWAN V',3,0,0,0,1),(28,'IKHWAN VI',3,0,0,0,1),(29,'IKHWAN VII',3,0,0,0,1),(30,'IKHWAN VIII',3,0,0,0,1),(31,'IKHWAN IX',2,0,0,0,1),(32,'HILMAN I',0,0,3,0,1),(33,'HILMAN II',0,0,2,0,1),(34,'HILMAN III',0,0,2,0,1),(35,'HILAMN IV',0,0,2,0,1),(36,'HILAMN V',0,0,2,0,1),(37,'SITI SARAH',0,2,0,0,1),(38,'SITI MARYAM',0,3,0,0,1),(39,'SITI HAJAR',0,8,0,0,1),(40,'ASYIFA I',0,0,1,0,1),(41,'ASYIFA II',0,0,1,0,1),(42,'ASYIFA III',0,0,1,0,1),(43,'ASYIFA IV',0,0,1,0,1),(44,'ASYIFA V',0,0,1,0,1),(45,'ASYIFA VI',0,0,1,0,1),(46,'ASYIFA VII',0,0,1,0,1),(47,'ASYIFA VIII',0,0,1,0,1),(48,'ASYIFA IX',0,0,1,0,1),(49,'QOLBUN SALIM I',0,0,5,0,1),(50,'QOLBUN SALIM II',0,2,0,0,1),(51,'QOLBUN SALIM III',2,0,0,0,1),(52,'QOLBUN SALIM IV',4,0,0,0,1),(53,'QOLBUN SALIM V',0,4,0,0,1),(54,'IMTIAS I',0,0,1,0,1),(55,'IMTIAS II',0,0,1,0,1),(56,'IMTIAS III',0,0,1,0,1),(57,'IMTIAS IV',0,0,1,0,1),(58,'IMTIAS V',0,0,1,0,1),(59,'IMTIAS VI',0,0,6,0,1),(60,'IMTIAS VII',0,0,2,0,1),(61,'IMTIAS VIII',0,0,2,0,1),(62,'IMTIAS IX',0,0,6,0,1),(63,'IMTIAS X',0,0,6,0,1),(64,'IMTIAS XI',0,0,0,0,1),(65,'IMTIAS XII',0,0,0,0,1);

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `user_namalengkap` varchar(50) DEFAULT NULL,
  `user_jenisruang` int(11) DEFAULT NULL,
  `user_pass` char(32) DEFAULT NULL,
  `user_admin` tinyint(1) DEFAULT NULL,
  `user_status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id`,`username`,`user_namalengkap`,`user_jenisruang`,`user_pass`,`user_admin`,`user_status`) values (1,'admin','Administrator',0,'21232f297a57a5a743894a0e4a801fc3',1,1),(2,'anak','Ruang Rawat Anak',1,'21232f297a57a5a743894a0e4a801fc3',0,1),(3,'perinatologi','Perinatologi',2,'827ccb0eea8a706c4c34a16891f84e7b',NULL,1),(4,'vipc','VIP C',12,'827ccb0eea8a706c4c34a16891f84e7b',NULL,1),(5,'neurologi','Neurologi',11,'827ccb0eea8a706c4c34a16891f84e7b',NULL,1),(6,'icu','ICU',10,'827ccb0eea8a706c4c34a16891f84e7b',NULL,1),(7,'jantung','Ruang Jantung',9,'827ccb0eea8a706c4c34a16891f84e7b',NULL,1),(8,'vip','VIP',8,'827ccb0eea8a706c4c34a16891f84e7b',NULL,1),(9,'kebidanan','Ruang Perawatan Kebidanan',7,'827ccb0eea8a706c4c34a16891f84e7b',NULL,1),(10,'paru','Ruang Perawatan Paru',6,'827ccb0eea8a706c4c34a16891f84e7b',NULL,1),(11,'interne_pria',' 	Ruang Perawatan Interne pria',5,'827ccb0eea8a706c4c34a16891f84e7b',NULL,1),(12,'interne_wanita','Ruang Perawatan Interne wanita',4,'827ccb0eea8a706c4c34a16891f84e7b',NULL,1),(13,'bedah','Ruang Perawatan Mata / THT/ Bedah',3,'827ccb0eea8a706c4c34a16891f84e7b',NULL,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
