/*
SQLyog Community v10.12 
MySQL - 5.1.30-community-log : Database - decent_pharma_db_01
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`decent_pharma_db_01` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `decent_pharma_db_01`;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `courier_service_info` */

/*Table structure for table `customer_payment_info` */

DROP TABLE IF EXISTS `customer_payment_info`;

CREATE TABLE `customer_payment_info` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `invoice_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `previous_due` float NOT NULL,
  `payed_amount` float NOT NULL,
  `current_inv_due` float NOT NULL,
  `total_closing_due` float NOT NULL,
  `payment_date` date NOT NULL,
  `payment_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'CASH',
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `customer_payment_info` */

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `generic_name_info` */

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `hr_emp_dept_info` */

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `hr_emp_designation` */

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `hr_employee_depot_rel` */

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `hr_employee_hierarchy` */

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `hr_employee_info` */

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `inv_customer_info` */

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `inv_customer_zone` */

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `inv_depot_info` */

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

/*Table structure for table `inv_product_sales` */

DROP TABLE IF EXISTS `inv_product_sales`;

CREATE TABLE `inv_product_sales` (
  `product_sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pack_size_id` int(11) NOT NULL,
  `pack_size` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `unit_id` int(11) NOT NULL,
  `unit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` float NOT NULL,
  `bonus_quantity` float NOT NULL,
  `total_quantity` float NOT NULL,
  `unit_price` float NOT NULL,
  `total_unit_price` float NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`product_sales_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `inv_product_sales` */

/*Table structure for table `inv_sales_info` */

DROP TABLE IF EXISTS `inv_sales_info`;

CREATE TABLE `inv_sales_info` (
  `inv_sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `total_price` float NOT NULL,
  `didcount_percentage` float NOT NULL,
  `grand_total_price` float NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sales_by` int(11) NOT NULL,
  `previous_due` float NOT NULL,
  `payment` float NOT NULL,
  `current_inv_due` float NOT NULL,
  `total_due` float NOT NULL,
  `delivery_by` int(11) NOT NULL,
  `sales_date` date NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`inv_sales_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `inv_sales_info` */

/*Table structure for table `ordered_product_info` */

DROP TABLE IF EXISTS `ordered_product_info`;

CREATE TABLE `ordered_product_info` (
  `ordered_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_order_id` int(11) NOT NULL,
  `product_pack_size` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_pack_size_id` int(11) NOT NULL,
  `product_unit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_unit_id` int(11) NOT NULL,
  `order_quantity` float NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`ordered_product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `ordered_product_info` */

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_batch_info` */

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_info` */

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_offer_info` */

/*Table structure for table `product_order_info` */

DROP TABLE IF EXISTS `product_order_info`;

CREATE TABLE `product_order_info` (
  `product_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` date NOT NULL,
  `order_taken_by` int(11) NOT NULL COMMENT 'MIO/employee_id',
  `order_taker_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'MIO/employee_code',
  `customer_id` int(11) NOT NULL,
  `customer_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `order_delivery_date` date NOT NULL,
  `delivery_date` date DEFAULT NULL COMMENT 'actual date of delivery',
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `order_status` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'REGULAR' COMMENT 'REGULER/EMERGENCY',
  `delivery_status` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PENDING' COMMENT 'PENDING/PROCESSING/DELIVERED',
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`product_order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_order_info` */

/*Table structure for table `product_pack_size` */

DROP TABLE IF EXISTS `product_pack_size`;

CREATE TABLE `product_pack_size` (
  `product_pack_size_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_pack_size` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'eg. 10X10s',
  `product_quantity` float NOT NULL COMMENT 'eg. 10X10s=100, 5X10s=50',
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`product_pack_size_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_pack_size` */

/*Table structure for table `product_return_info` */

DROP TABLE IF EXISTS `product_return_info`;

CREATE TABLE `product_return_info` (
  `product_return_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_return_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `invoice_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_pack_size_id` int(11) NOT NULL,
  `product_pack_size` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_unit_price` float NOT NULL,
  `return_quantity` float NOT NULL,
  `return_bonus_quantity` float NOT NULL,
  `total_unit_price` float NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`product_return_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_return_info` */

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

/*Table structure for table `product_transfer_info` */

DROP TABLE IF EXISTS `product_transfer_info`;

CREATE TABLE `product_transfer_info` (
  `ddpt_id` int(11) NOT NULL AUTO_INCREMENT,
  `challan_no` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoice_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ref_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `transfer_from` int(11) NOT NULL,
  `transfer_from_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `transfer_to` int(11) NOT NULL,
  `transfer_to_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `transport_id` int(11) DEFAULT NULL,
  `load_supervised_by` int(11) DEFAULT NULL,
  `in_charge_emp_id` int(11) NOT NULL,
  `delivery_date` datetime NOT NULL,
  `process_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ON THE WAY',
  `check_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'NOT CHECKED',
  `driver_id` int(11) DEFAULT NULL,
  `unload_supervised_by` int(11) DEFAULT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`ddpt_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_transfer_info` */

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_unit_info` */

/*Table structure for table `sales_return_info` */

DROP TABLE IF EXISTS `sales_return_info`;

CREATE TABLE `sales_return_info` (
  `sales_return_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `invoice_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `depot_id` int(11) NOT NULL,
  `depot_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zone_id` int(11) NOT NULL,
  `zone_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sv_id` int(11) NOT NULL,
  `sv_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mr_id` int(11) NOT NULL,
  `mr_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `commission_amount` float NOT NULL,
  `sales_total_amount` int(11) NOT NULL,
  `grand_total` float NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `return_date` date NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`sales_return_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `sales_return_info` */

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

insert  into `st_company_info`(`company_id`,`company_name`,`company_address`,`company_contact_no`,`incharge_name`,`incharge_contact_no`,`company_tin_no`,`company_email`,`company_website`,`vat`,`last_update_by`,`last_update_date`,`active_flag`) values (1,'Semicon Pharma Ltd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,'Y');

/*Table structure for table `st_menu_info` */

DROP TABLE IF EXISTS `st_menu_info`;

CREATE TABLE `st_menu_info` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `module_id` int(11) NOT NULL,
  `module_folder` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mother_menu_id` int(11) NOT NULL,
  `sub_menu_flag` int(11) NOT NULL,
  `menu_contant` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `common_for_all` int(11) NOT NULL,
  `menu_order` int(11) NOT NULL,
  `entry_by` int(11) DEFAULT NULL,
  `entry_date` datetime NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `st_menu_info` */

insert  into `st_menu_info`(`menu_id`,`menu_name`,`module_id`,`module_folder`,`mother_menu_id`,`sub_menu_flag`,`menu_contant`,`common_for_all`,`menu_order`,`entry_by`,`entry_date`,`active_flag`) values (1,'Web Control',1,'settings',0,1,'',0,1,1,'2013-09-21 14:42:01','Y'),(2,'Add Module',1,'settings',1,0,'add_module',0,10,1,'2013-09-21 14:44:04','Y'),(3,'Add Menu',1,'settings',1,0,'add_menu',0,20,1,'2013-09-21 15:42:33','Y');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

/*Data for the table `st_module_info` */

insert  into `st_module_info`(`module_id`,`module_name`,`module_folder`,`active_flag`,`last_update_by`,`last_update_date`) values (1,'Settings','settings','Y',1,'2013-09-21 12:03:15'),(2,'Human Resources','hr','Y',1,'2013-09-21 12:03:29'),(3,'Inventory','inv','Y',1,'2013-09-21 12:03:50'),(4,'Stock & Sales','stock_sale','Y',1,'2013-09-21 17:29:14');

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

insert  into `st_user_info`(`user_id`,`user_full_name`,`user_login_id`,`user_password`,`user_group_id`,`user_contact_no`,`user_email`,`user_address`,`entry_by`,`entry_date`,`last_update_by`,`last_update_date`,`company_id`,`active_flag`) values (1,'Admin','admin','admin',1,'','','',1,'2013-09-21 11:05:00',1,'2013-09-21 11:05:00',1,'Y');

/*Table structure for table `transfering_product_info` */

DROP TABLE IF EXISTS `transfering_product_info`;

CREATE TABLE `transfering_product_info` (
  `transfering_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `challan_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ref_no` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pac_size_id` int(11) NOT NULL,
  `pack_size` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_unit_id` int(11) NOT NULL,
  `product_unit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_quantity` float NOT NULL,
  `product_bonus_quantity` float NOT NULL,
  `unit_price` float NOT NULL,
  `total_unit_price` float NOT NULL,
  `ddpt_id` int(11) NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`transfering_product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `transfering_product_info` */

/*Table structure for table `user_activity_log` */

DROP TABLE IF EXISTS `user_activity_log`;

CREATE TABLE `user_activity_log` (
  `user_activity_log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `browse_page` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `log_date_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_activity_log` */

/*Table structure for table `user_table_log` */

DROP TABLE IF EXISTS `user_table_log`;

CREATE TABLE `user_table_log` (
  `user_tbl_log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `table_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `table_pk` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tbl_pk_id` int(11) NOT NULL,
  `activity` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'insert',
  `browse_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `user_table_log` */

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
