/*
SQLyog Enterprise - MySQL GUI v8.14 
MySQL - 5.1.28-rc-community 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `app_authority` (
	`id` double ,
	`zname` varchar (1800),
	`ename` varchar (1800)
); 
insert into `app_authority` (`id`, `zname`, `ename`) values('1','应用列表','appInfoAction-appList');
