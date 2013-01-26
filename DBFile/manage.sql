/*
SQLyog Enterprise - MySQL GUI v8.14 
MySQL - 5.1.28-rc-community 
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;

create table `app_manager` (
	`id` double ,
	`mname` varchar (600),
	`mpsw` varchar (600),
	`nickname` varchar (600),
	`roletype` varchar (600),
	`ext1` varchar (1500),
	`ext2` varchar (1500),
	`ext3` varchar (1500)
); 
insert into `app_manager` (`id`, `mname`, `mpsw`, `nickname`, `roletype`, `ext1`, `ext2`, `ext3`) values('1','admin','21232f297a57a5a743894a0e4a801fc3','超级管理员','100',NULL,NULL,NULL);
