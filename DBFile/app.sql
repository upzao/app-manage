/*
SQLyog Ultimate v8.71 
MySQL - 5.5.20 : Database - app
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`app` /*!40100 DEFAULT CHARACTER SET gbk */;

USE `app`;

/*Table structure for table `app_applist` */

DROP TABLE IF EXISTS `app_applist`;

CREATE TABLE `app_applist` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `bigname` varchar(200) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `que` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=gbk;

/*Data for the table `app_applist` */

insert  into `app_applist`(`id`,`bigname`,`name`,`subject`,`url`,`que`) values (1,'b1.jpg','m1','卡拉OK','http://124.232.136.234:8080/karaoke_hn/test/epg_index.jsp',1),(7,'b7.jpg','m7','智慧旅游','http://124.232.136.239:1090/travel/itv/index.php',2),(3,'b3.jpg','m3','天翼商城','http://124.232.136.236:7777/surfing/baby/index.php',3),(4,'b4.jpg','m4','宝宝乐园','http://124.232.136.236:7777/animation/itv/index.php',4),(5,'b5.jpg','m5','休闲游戏','http://124.232.136.233/hw/default.aspx',5),(6,'b6.jpg','m6','教育直通车','http://124.232.136.228:8090/portal.aspx',6);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
