/*
SQLyog Community v10.12 
MySQL - 5.1.30-community-log : Database - decent_pharma_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`decent_pharma_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `decent_pharma_db`;

/*Table structure for table `courier_service_info` */

DROP TABLE IF EXISTS `courier_service_info`;

CREATE TABLE `courier_service_info` (
  `courier_service_id` int(11) NOT NULL AUTO_INCREMENT,
  `courier_service_company` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `csc_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `csc_address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `csc_contact_person` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `csc_contact_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`courier_service_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `courier_service_info` */

insert  into `courier_service_info`(`courier_service_id`,`courier_service_company`,`csc_code`,`csc_address`,`csc_contact_person`,`csc_contact_no`,`entry_by`,`entry_date`,`last_update_by`,`last_update_date`,`company_id`,`active_flag`) values (1,'S.A Paribahan','S.A','Dhaka','Motaleb','0193847387',1,'0000-00-00 00:00:00',NULL,NULL,1,'Y'),(2,'Korotoa','KTA','Dhaka','Tamim','0293479579',1,'0000-00-00 00:00:00',NULL,NULL,1,'Y');

/*Table structure for table `generic_name_info` */

DROP TABLE IF EXISTS `generic_name_info`;

CREATE TABLE `generic_name_info` (
  `generic_name_id` int(11) NOT NULL AUTO_INCREMENT,
  `generic_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `generic_name_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`generic_name_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `generic_name_info` */

insert  into `generic_name_info`(`generic_name_id`,`generic_name`,`generic_name_code`,`entry_by`,`entry_date`,`last_update_by`,`last_update_date`,`company_id`,`active_flag`) values (1,'Ranitidin','RAN',1,'2013-09-19 00:00:00',NULL,NULL,1,'Y');

/*Table structure for table `hr_emp_dept_info` */

DROP TABLE IF EXISTS `hr_emp_dept_info`;

CREATE TABLE `hr_emp_dept_info` (
  `dep_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dept_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dept_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dept_contact_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dept_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) NOT NULL,
  `last_update_date` datetime NOT NULL,
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`dep_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `hr_emp_dept_info` */

insert  into `hr_emp_dept_info`(`dep_id`,`dept_name`,`dept_code`,`dept_address`,`dept_contact_no`,`dept_email`,`entry_by`,`entry_date`,`last_update_by`,`last_update_date`,`company_id`,`active_flag`) values (1,'Human Resource','HR','Dhaka','0125633322','hr@info.co',1,'2013-09-19 00:00:00',0,'2013-09-19 07:07:16',1,'Y');

/*Table structure for table `hr_emp_designation` */

DROP TABLE IF EXISTS `hr_emp_designation`;

CREATE TABLE `hr_emp_designation` (
  `designation_id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `designation_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`designation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `hr_emp_designation` */

insert  into `hr_emp_designation`(`designation_id`,`designation`,`designation_code`,`entry_by`,`entry_date`,`last_update_by`,`last_update_date`,`company_id`,`active_flag`) values (1,'Medical Information Officer','M.I.O',1,'2013-09-19 00:00:00',NULL,'2013-09-19 06:33:52',1,'Y'),(2,'Supervisor','S.V',1,'2013-09-19 00:00:00',NULL,NULL,1,'Y');

/*Table structure for table `hr_employee_depot_rel` */

DROP TABLE IF EXISTS `hr_employee_depot_rel`;

CREATE TABLE `hr_employee_depot_rel` (
  `edr_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `depot_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `designation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`edr_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `hr_employee_depot_rel` */

insert  into `hr_employee_depot_rel`(`edr_id`,`employee_id`,`depot_id`,`designation_id`,`designation`,`entry_by`,`entry_date`,`last_update_by`,`last_update_date`,`company_id`,`active_flag`) values (1,2,1,1,'M.I.O',1,'0000-00-00 00:00:00',NULL,NULL,1,'Y');

/*Table structure for table `hr_employee_hierarchy` */

DROP TABLE IF EXISTS `hr_employee_hierarchy`;

CREATE TABLE `hr_employee_hierarchy` (
  `eh_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `superior_emp_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`eh_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `hr_employee_hierarchy` */

insert  into `hr_employee_hierarchy`(`eh_id`,`employee_id`,`superior_emp_id`,`company_id`,`entry_by`,`entry_date`,`last_update_by`,`last_update_date`,`active_flag`) values (1,2,3,1,1,'0000-00-00 00:00:00',NULL,NULL,'Y');

/*Table structure for table `hr_employee_info` */

DROP TABLE IF EXISTS `hr_employee_info`;

CREATE TABLE `hr_employee_info` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dept_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `emp_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emp_father` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_mother` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_pre_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_par_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_contact_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_dob` date DEFAULT NULL,
  `emp_national_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_passport_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_dl_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_maritual_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'UNMARRIED',
  `prev_experience` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_bank_acc_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_edu_qualification` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `joining_date` datetime NOT NULL,
  `leaving_date` datetime DEFAULT NULL,
  `emp_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'OFFICER',
  `last_promotion_date` datetime DEFAULT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) NOT NULL,
  `last_update_date` datetime NOT NULL,
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`employee_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `hr_employee_info` */

insert  into `hr_employee_info`(`employee_id`,`employee_code`,`dept_id`,`designation_id`,`emp_name`,`emp_father`,`emp_mother`,`emp_pre_address`,`emp_par_address`,`emp_contact_no`,`emp_dob`,`emp_national_id`,`emp_passport_no`,`emp_dl_no`,`emp_maritual_status`,`prev_experience`,`emp_bank_acc_no`,`emp_edu_qualification`,`joining_date`,`leaving_date`,`emp_type`,`last_promotion_date`,`entry_by`,`entry_date`,`last_update_by`,`last_update_date`,`company_id`,`active_flag`) values (1,'KH',1,1,'Khokon','gour','zharna','dhaka','dhaka','01719347580','1985-10-10','13156464646',NULL,'13165646','Bachelor','3 yrs','1212313','Bsc','2013-09-19 00:00:00',NULL,'empoyee',NULL,1,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',1,'Y'),(2,'HM',1,2,'Himel','','','Dhaka','Dhaka','20054359379','0000-00-00','163446416',NULL,'564636313','Bachelor','3 yrs','13313313','Bsc','2013-04-08 00:00:00',NULL,'empoyee',NULL,1,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',1,'Y'),(3,'SJ',1,1,'Sujon','','','dhaka','dhaak','532323','0000-00-00','464641631636',NULL,'31313131','Married','2 yrs','313131','Bsc','0000-00-00 00:00:00',NULL,'empoyee',NULL,1,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',1,'Y');

/*Table structure for table `inv_customer_info` */

DROP TABLE IF EXISTS `inv_customer_info`;

CREATE TABLE `inv_customer_info` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `depot_id` int(11) NOT NULL,
  `zone_id` int(11) NOT NULL,
  `customer_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `org_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_address` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_contact_no` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_bank_acc_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_due_limit` float NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `inv_customer_info` */

insert  into `inv_customer_info`(`customer_id`,`customer_code`,`depot_id`,`zone_id`,`customer_name`,`org_name`,`owner_name`,`customer_address`,`customer_contact_no`,`customer_bank_acc_no`,`customer_due_limit`,`entry_by`,`entry_date`,`last_update_by`,`last_update_date`,`company_id`,`active_flag`) values (1,'PT',0,0,'Peter','Zahan Pharmacy','Mijanur','Dhaka','018738439759','79437593479',0,1,'0000-00-00 00:00:00',NULL,NULL,1,'Y'),(2,'TT',0,0,'Test','Test','test','dhaka','2035349050','946749',0,1,'0000-00-00 00:00:00',NULL,NULL,1,'Y');

/*Table structure for table `inv_customer_zone` */

DROP TABLE IF EXISTS `inv_customer_zone`;

CREATE TABLE `inv_customer_zone` (
  `zone_id` int(11) NOT NULL AUTO_INCREMENT,
  `depot_id` int(11) NOT NULL,
  `zone_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mio_id` int(11) NOT NULL,
  `sv_id` int(11) NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`zone_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `inv_customer_zone` */

insert  into `inv_customer_zone`(`zone_id`,`depot_id`,`zone_name`,`mio_id`,`sv_id`,`entry_by`,`entry_date`,`last_update_by`,`last_update_date`,`company_id`,`active_flag`) values (1,1,'Jatrabari',3,2,1,'0000-00-00 00:00:00',NULL,NULL,1,'Y');

/*Table structure for table `inv_depot_info` */

DROP TABLE IF EXISTS `inv_depot_info`;

CREATE TABLE `inv_depot_info` (
  `depot_id` int(11) NOT NULL AUTO_INCREMENT,
  `depot_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `depot_address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `depot_contact_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `depot_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  `company_id` int(11) NOT NULL,
  PRIMARY KEY (`depot_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `inv_depot_info` */

insert  into `inv_depot_info`(`depot_id`,`depot_name`,`depot_address`,`depot_contact_no`,`depot_flag`,`entry_by`,`entry_date`,`last_update_by`,`last_update_date`,`active_flag`,`company_id`) values (1,'Factory Depo','Dhaka','02759437953','FD',1,'0000-00-00 00:00:00',NULL,NULL,'Y',1),(2,'Central Depo','Dhaka','02759437889','CD',1,'0000-00-00 00:00:00',NULL,NULL,'Y',1),(3,'Sub Depo','Dhaka','0595469','SD',1,'0000-00-00 00:00:00',NULL,NULL,'Y',1);

/*Table structure for table `inv_depot_product_stock` */

DROP TABLE IF EXISTS `inv_depot_product_stock`;

CREATE TABLE `inv_depot_product_stock` (
  `dpst_id` int(11) NOT NULL AUTO_INCREMENT,
  `depot_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `current_stock` float NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`dpst_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `inv_depot_product_stock` */

/*Table structure for table `inv_employee_customer_inv` */

DROP TABLE IF EXISTS `inv_employee_customer_inv`;

CREATE TABLE `inv_employee_customer_inv` (
  `ecr_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`ecr_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `inv_employee_customer_inv` */

/*Table structure for table `product_batch_info` */

DROP TABLE IF EXISTS `product_batch_info`;

CREATE TABLE `product_batch_info` (
  `product_batch_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_batch_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_quantity` float NOT NULL,
  `mfg_date` date NOT NULL,
  `exp_date` date NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) NOT NULL,
  `last_update_date` datetime NOT NULL,
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`product_batch_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_batch_info` */

insert  into `product_batch_info`(`product_batch_id`,`product_batch_code`,`product_id`,`product_code`,`product_quantity`,`mfg_date`,`exp_date`,`entry_by`,`entry_date`,`last_update_by`,`last_update_date`,`company_id`,`active_flag`) values (1,'BT1234',1,'NH',10,'2013-09-21','2017-09-20',1,'0000-00-00 00:00:00',0,'0000-00-00 00:00:00',1,'Y');

/*Table structure for table `product_info` */

DROP TABLE IF EXISTS `product_info`;

CREATE TABLE `product_info` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `generic_name_id` int(11) NOT NULL,
  `product_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_pack_size_id` int(11) NOT NULL,
  `product_pack_size` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `product_unit_id` int(11) NOT NULL,
  `product_unit` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `unit_price` float NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`product_id`),
  KEY `product_code` (`product_code`),
  KEY `product_code_2` (`product_code`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_info` */

insert  into `product_info`(`product_id`,`generic_name_id`,`product_code`,`product_name`,`product_pack_size_id`,`product_pack_size`,`product_unit_id`,`product_unit`,`unit_price`,`description`,`entry_by`,`entry_date`,`last_update_by`,`last_update_date`,`company_id`,`active_flag`) values (1,1,'NH','Norma-H',1,'10x10',1,'kg',2.5,'Gastrict',1,'2013-09-21 00:00:00',NULL,NULL,1,'Y');

/*Table structure for table `product_offer_info` */

DROP TABLE IF EXISTS `product_offer_info`;

CREATE TABLE `product_offer_info` (
  `product_offer_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_offer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_batch_id` int(11) NOT NULL,
  `offer_start_date` date NOT NULL,
  `offer_end_date` date NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`product_offer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_offer_info` */

insert  into `product_offer_info`(`product_offer_id`,`product_offer`,`product_batch_id`,`offer_start_date`,`offer_end_date`,`entry_by`,`entry_date`,`last_update_by`,`last_update_date`,`company_id`,`active_flag`) values (1,'1 pack free',1,'2013-09-21','2013-09-23',0,'0000-00-00 00:00:00',NULL,NULL,1,'Y');

/*Table structure for table `product_pack_size` */

DROP TABLE IF EXISTS `product_pack_size`;

CREATE TABLE `product_pack_size` (
  `product_pack_size_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_pack_size` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_quantity` float NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`product_pack_size_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_pack_size` */

insert  into `product_pack_size`(`product_pack_size_id`,`product_pack_size`,`product_quantity`,`entry_by`,`entry_date`,`last_update_by`,`last_update_date`,`company_id`,`active_flag`) values (1,'10x10',100,1,'2013-09-19 00:00:00',NULL,NULL,1,'Y');

/*Table structure for table `product_stock_sales` */

DROP TABLE IF EXISTS `product_stock_sales`;

CREATE TABLE `product_stock_sales` (
  `p_stc_sl_id` int(11) NOT NULL AUTO_INCREMENT,
  `prdct_stock_sale_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `opennig_stock` float NOT NULL,
  `stock_in` float NOT NULL,
  `total_stock` float NOT NULL,
  `stock_out` float NOT NULL,
  `closing_stock` float NOT NULL,
  `stock_from_depot_id` int(11) DEFAULT NULL,
  `stock_from_depot_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `stock_sale_date` datetime NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`p_stc_sl_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_stock_sales` */

/*Table structure for table `product_unit_info` */

DROP TABLE IF EXISTS `product_unit_info`;

CREATE TABLE `product_unit_info` (
  `product_unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_unit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`product_unit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_unit_info` */

insert  into `product_unit_info`(`product_unit_id`,`product_unit`,`entry_by`,`entry_date`,`last_update_by`,`last_update_date`,`company_id`,`active_flag`) values (1,'kg',1,'2013-09-19 00:00:00',NULL,NULL,1,'Y'),(2,'ml',1,'2013-09-19 00:00:00',NULL,NULL,1,'Y');

/*Table structure for table `st_company_info` */

DROP TABLE IF EXISTS `st_company_info`;

CREATE TABLE `st_company_info` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `company_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_contact_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `incharge_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `incharge_contact_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_tin_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_website` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vat` float NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `active_flag` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `st_company_info` */

insert  into `st_company_info`(`company_id`,`company_name`,`company_address`,`company_contact_no`,`incharge_name`,`incharge_contact_no`,`company_tin_no`,`company_email`,`company_website`,`vat`,`last_update_by`,`last_update_date`,`active_flag`) values (1,'Decent Pharmacutical Ltd.','Mohakhali,DOHS','503480580438','Mr. Rahim','48085048',NULL,NULL,NULL,0,1,'2013-09-19 10:10:00','Y');

/*Table structure for table `st_left_menu` */

DROP TABLE IF EXISTS `st_left_menu`;

CREATE TABLE `st_left_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(100) NOT NULL,
  `page_title` varchar(150) NOT NULL,
  `position` int(11) NOT NULL,
  `status` varchar(2) NOT NULL,
  `main_menu_id` int(11) NOT NULL,
  `module` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `st_left_menu` */

insert  into `st_left_menu`(`id`,`page_name`,`page_title`,`position`,`status`,`main_menu_id`,`module`) values (1,'add_dept','Add Department',1,'Y',1,'hr'),(2,'add_desig','Add Designation',2,'Y',1,'hr'),(3,'add_emp','Add Employee',3,'Y',1,'hr'),(4,'add_product_unit','Add Unit',1,'Y',2,'inv'),(5,'add_product_pack_size','Add Pack Size',2,'Y',2,'inv'),(6,'add_generic_name','Add Generic Name',3,'Y',2,'inv'),(7,'add_product','Add Product',4,'Y',2,'inv'),(8,'add_customer','Add Customer',4,'',1,'hr'),(9,'add_courier','Add Courier',5,'',1,'hr'),(10,'add_depo','Add Depo',6,'',1,'hr'),(11,'add_zone','Add Zone',7,'',1,'hr'),(12,'add_product_offer','Add Offer',8,'',1,'hr'),(13,'add_customer_zone','Add Customer Zone',9,'',1,'hr'),(14,'add_product_batch','Add Batch',10,'',1,'hr'),(15,'add_emp_hierachy','Add Hierachy',11,'',1,'hr');

/*Table structure for table `st_menu_info` */

DROP TABLE IF EXISTS `st_menu_info`;

CREATE TABLE `st_menu_info` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `module_id` int(11) NOT NULL,
  `mother_menu_id` int(11) NOT NULL,
  `sub_menu_flag` int(11) NOT NULL,
  `menu_contant` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `common_for_all` int(11) NOT NULL,
  `menu_order` int(11) NOT NULL,
  `entry_by` int(11) DEFAULT NULL,
  `entry_date` datetime NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `st_menu_info` */

insert  into `st_menu_info`(`menu_id`,`menu_name`,`module_id`,`mother_menu_id`,`sub_menu_flag`,`menu_contant`,`common_for_all`,`menu_order`,`entry_by`,`entry_date`,`active_flag`) values (1,'Employee',1,0,0,'',0,1,NULL,'0000-00-00 00:00:00','Y'),(2,'Product',2,0,0,'',0,1,NULL,'0000-00-00 00:00:00','Y');

/*Table structure for table `st_module_info` */

DROP TABLE IF EXISTS `st_module_info`;

CREATE TABLE `st_module_info` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `module_folder` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `last_update_by` int(11) NOT NULL,
  `last_update_date` datetime NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `st_module_info` */

insert  into `st_module_info`(`module_id`,`module_name`,`module_folder`,`active_flag`,`last_update_by`,`last_update_date`) values (1,'hr','hr','Y',1,'2013-09-19 10:10:31'),(2,'Inventory','inv','Y',1,'2013-09-19 16:17:49');

/*Table structure for table `st_user_group` */

DROP TABLE IF EXISTS `st_user_group`;

CREATE TABLE `st_user_group` (
  `user_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `module_ids` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `menu_ids` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `group_hierarchy` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`user_group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `st_user_group` */

/*Table structure for table `st_user_info` */

DROP TABLE IF EXISTS `st_user_info`;

CREATE TABLE `st_user_info` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_full_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_login_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_group_id` int(11) NOT NULL,
  `user_contact_no` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_email` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_address` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `st_user_info` */

insert  into `st_user_info`(`user_id`,`user_full_name`,`user_login_id`,`user_password`,`user_group_id`,`user_contact_no`,`user_email`,`user_address`,`entry_by`,`entry_date`,`last_update_by`,`last_update_date`,`company_id`,`active_flag`) values (1,'semicon','','123456',1,'123456',NULL,NULL,1,'2013-09-19 10:08:27',1,'2013-09-19 10:08:31',1,'Y');

/*Table structure for table `vehicle_info` */

DROP TABLE IF EXISTS `vehicle_info`;

CREATE TABLE `vehicle_info` (
  `vehicle_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `regi_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `managing_person_id` int(11) DEFAULT NULL,
  `managing_person_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `current_status` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'STAND BY',
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`vehicle_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `vehicle_info` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
