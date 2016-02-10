-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 23, 2013 at 04:59 AM
-- Server version: 5.1.30
-- PHP Version: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `decent_pharma_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `courier_service_info`
--

CREATE TABLE IF NOT EXISTS `courier_service_info` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `courier_service_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `customer_payment_info`
--

CREATE TABLE IF NOT EXISTS `customer_payment_info` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `customer_payment_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `generic_name_info`
--

CREATE TABLE IF NOT EXISTS `generic_name_info` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `generic_name_info`
--

INSERT INTO `generic_name_info` (`generic_name_id`, `generic_name`, `generic_name_code`, `entry_by`, `entry_date`, `last_update_by`, `last_update_date`, `company_id`, `active_flag`) VALUES
(1, 'test', 'test', 1, '2013-09-23 00:00:00', NULL, NULL, 1, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_depot_rel`
--

CREATE TABLE IF NOT EXISTS `hr_employee_depot_rel` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `hr_employee_depot_rel`
--


-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_hierarchy`
--

CREATE TABLE IF NOT EXISTS `hr_employee_hierarchy` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `hr_employee_hierarchy`
--


-- --------------------------------------------------------

--
-- Table structure for table `hr_employee_info`
--

CREATE TABLE IF NOT EXISTS `hr_employee_info` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `hr_employee_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `hr_emp_dept_info`
--

CREATE TABLE IF NOT EXISTS `hr_emp_dept_info` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `hr_emp_dept_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `hr_emp_designation`
--

CREATE TABLE IF NOT EXISTS `hr_emp_designation` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `hr_emp_designation`
--

INSERT INTO `hr_emp_designation` (`designation_id`, `designation`, `designation_code`, `entry_by`, `entry_date`, `last_update_by`, `last_update_date`, `company_id`, `active_flag`) VALUES
(1, 'Managing Director', 'MD', 1, '2013-09-22 00:00:00', NULL, '2013-09-22 09:29:37', 1, 'Y'),
(2, 'Director', 'Dir', 1, '2013-09-22 00:00:00', NULL, '2013-09-22 09:29:54', 1, 'Y'),
(3, 'Area Manager', 'AM', 1, '2013-09-22 00:00:00', NULL, '2013-09-22 09:32:56', 1, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `inv_customer_info`
--

CREATE TABLE IF NOT EXISTS `inv_customer_info` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `inv_customer_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `inv_customer_zone`
--

CREATE TABLE IF NOT EXISTS `inv_customer_zone` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `inv_customer_zone`
--


-- --------------------------------------------------------

--
-- Table structure for table `inv_depot_info`
--

CREATE TABLE IF NOT EXISTS `inv_depot_info` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `inv_depot_info`
--

INSERT INTO `inv_depot_info` (`depot_id`, `depot_name`, `depot_address`, `depot_contact_no`, `depot_flag`, `entry_by`, `entry_date`, `last_update_by`, `last_update_date`, `active_flag`, `company_id`) VALUES
(1, 'Factory Depot', 'Pabna', '1234', 'FD', 1, '0000-00-00 00:00:00', NULL, NULL, 'Y', 1),
(2, 'Central Depot', 'Dhaka', '2345', 'CD', 1, '0000-00-00 00:00:00', NULL, NULL, 'Y', 1),
(3, 'Sub Depot-1', 'Dhaka', '3456', 'SD', 1, '0000-00-00 00:00:00', NULL, NULL, 'Y', 1),
(4, 'Sub Depot-2', 'Gajipur', '4567', 'SD', 1, '0000-00-00 00:00:00', NULL, NULL, 'Y', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inv_depot_product_stock`
--

CREATE TABLE IF NOT EXISTS `inv_depot_product_stock` (
  `dpst_id` int(11) NOT NULL AUTO_INCREMENT,
  `depot_id` int(11) NOT NULL,
  `depot_type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `current_stock` float NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`dpst_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `inv_depot_product_stock`
--


-- --------------------------------------------------------

--
-- Table structure for table `inv_employee_customer_inv`
--

CREATE TABLE IF NOT EXISTS `inv_employee_customer_inv` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `inv_employee_customer_inv`
--


-- --------------------------------------------------------

--
-- Table structure for table `inv_product_sales`
--

CREATE TABLE IF NOT EXISTS `inv_product_sales` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `inv_product_sales`
--


-- --------------------------------------------------------

--
-- Table structure for table `inv_sales_info`
--

CREATE TABLE IF NOT EXISTS `inv_sales_info` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `inv_sales_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `ordered_product_info`
--

CREATE TABLE IF NOT EXISTS `ordered_product_info` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ordered_product_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `product_batch_info`
--

CREATE TABLE IF NOT EXISTS `product_batch_info` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `product_batch_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE IF NOT EXISTS `product_info` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`product_id`, `generic_name_id`, `product_code`, `product_name`, `product_pack_size_id`, `product_pack_size`, `product_unit_id`, `product_unit`, `unit_price`, `description`, `entry_by`, `entry_date`, `last_update_by`, `last_update_date`, `company_id`, `active_flag`) VALUES
(1, 1, 'ACF-2', 'Acf Tablet', 1, '10X10s', 1, 'ml', 140, '--', 1, '2013-09-23 00:00:00', NULL, NULL, 1, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `product_offer_info`
--

CREATE TABLE IF NOT EXISTS `product_offer_info` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `product_offer_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `product_order_info`
--

CREATE TABLE IF NOT EXISTS `product_order_info` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `product_order_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `product_pack_size`
--

CREATE TABLE IF NOT EXISTS `product_pack_size` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product_pack_size`
--

INSERT INTO `product_pack_size` (`product_pack_size_id`, `product_pack_size`, `product_quantity`, `entry_by`, `entry_date`, `last_update_by`, `last_update_date`, `company_id`, `active_flag`) VALUES
(1, '10X10s', 100, 1, '2013-09-23 00:00:00', NULL, NULL, 1, 'Y'),
(2, '5X10s', 50, 1, '2013-09-23 00:00:00', NULL, NULL, 1, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `product_return_info`
--

CREATE TABLE IF NOT EXISTS `product_return_info` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `product_return_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `product_stock_sales`
--

CREATE TABLE IF NOT EXISTS `product_stock_sales` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `product_stock_sales`
--


-- --------------------------------------------------------

--
-- Table structure for table `product_transfer_info`
--

CREATE TABLE IF NOT EXISTS `product_transfer_info` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `product_transfer_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `product_unit_info`
--

CREATE TABLE IF NOT EXISTS `product_unit_info` (
  `product_unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_unit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `entry_by` int(11) NOT NULL,
  `entry_date` datetime NOT NULL,
  `last_update_by` int(11) DEFAULT NULL,
  `last_update_date` datetime DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`product_unit_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `product_unit_info`
--

INSERT INTO `product_unit_info` (`product_unit_id`, `product_unit`, `entry_by`, `entry_date`, `last_update_by`, `last_update_date`, `company_id`, `active_flag`) VALUES
(1, 'ml', 1, '2013-09-23 00:00:00', NULL, NULL, 1, 'Y'),
(2, 'mg', 1, '2013-09-23 00:00:00', NULL, NULL, 1, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `sales_return_info`
--

CREATE TABLE IF NOT EXISTS `sales_return_info` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sales_return_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `st_company_info`
--

CREATE TABLE IF NOT EXISTS `st_company_info` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=2 ;

--
-- Dumping data for table `st_company_info`
--

INSERT INTO `st_company_info` (`company_id`, `company_name`, `company_address`, `company_contact_no`, `incharge_name`, `incharge_contact_no`, `company_tin_no`, `company_email`, `company_website`, `vat`, `last_update_by`, `last_update_date`, `active_flag`) VALUES
(1, 'Semicon Pharma Ltd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `st_menu_info`
--

CREATE TABLE IF NOT EXISTS `st_menu_info` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=25 ;

--
-- Dumping data for table `st_menu_info`
--

INSERT INTO `st_menu_info` (`menu_id`, `menu_name`, `module_id`, `module_folder`, `mother_menu_id`, `sub_menu_flag`, `menu_contant`, `common_for_all`, `menu_order`, `entry_by`, `entry_date`, `active_flag`) VALUES
(1, 'Web Control', 1, 'settings', 0, 1, '', 0, 1, 1, '2013-09-21 14:42:01', 'Y'),
(2, 'Module Setup', 1, 'settings', 1, 0, 'add_module', 0, 10, 1, '2013-09-21 14:44:04', 'Y'),
(3, 'Menu Setup', 1, 'settings', 1, 0, 'add_menu', 0, 20, 1, '2013-09-21 15:42:33', 'Y'),
(4, 'Department Setup', 2, 'hr', 0, 0, 'add_dept', 0, 10, 1, '2013-09-22 13:17:38', 'Y'),
(5, 'User Setting', 1, 'settings', 0, 1, '', 0, 10, 1, '2013-09-22 15:04:21', 'Y'),
(6, 'User Group Setup', 1, 'settings', 5, 0, 'add_user_group', 0, 10, 1, '2013-09-22 15:12:34', 'Y'),
(7, 'User Setup', 1, 'settings', 5, 0, 'user_create', 0, 20, 1, '2013-09-22 15:15:00', 'Y'),
(8, 'Employee', 2, 'hr', 0, 1, '', 0, 20, 1, '2013-09-22 15:18:48', 'Y'),
(9, 'Designation Setup', 2, 'hr', 8, 0, 'add_desig', 0, 10, 1, '2013-09-22 15:26:23', 'Y'),
(10, 'Employee Setup', 2, 'hr', 8, 0, 'add_emp', 0, 20, 1, '2013-09-22 15:39:07', 'Y'),
(11, 'Employee-Hierachy', 1, 'settings', 8, 0, 'add_emp_hierachy', 0, 30, 1, '2013-09-22 15:48:44', 'Y'),
(12, 'Customer', 2, 'hr', 0, 1, '', 0, 30, 1, '2013-09-22 16:28:39', 'Y'),
(13, 'Customer Zone', 2, 'hr', 12, 0, 'add_zone', 0, 10, 1, '2013-09-22 16:33:46', 'Y'),
(14, 'Customer Entry', 2, 'hr', 12, 0, 'add_customer', 0, 20, 1, '2013-09-22 16:34:19', 'Y'),
(15, 'Depot', 3, 'inv', 0, 1, '', 0, 10, 1, '2013-09-22 16:37:30', 'Y'),
(16, 'Depot Entry', 3, 'inv', 15, 0, 'add_depot', 0, 10, 1, '2013-09-22 16:38:26', 'Y'),
(17, 'Employee-Depot Rel', 3, 'inv', 15, 0, 'add_emp_depo_rel', 0, 20, 1, '2013-09-22 16:40:34', 'Y'),
(18, 'Product', 3, 'inv', 0, 1, '', 0, 20, 1, '2013-09-22 16:51:42', 'Y'),
(19, 'Generic Name Setup', 3, 'inv', 18, 0, 'add_generic_name', 0, 10, 1, '2013-09-22 16:53:13', 'Y'),
(20, 'Product Setup', 3, 'inv', 18, 0, 'add_product', 0, 25, 1, '2013-09-22 16:53:52', 'Y'),
(21, 'Pack Size', 3, 'inv', 18, 0, 'add_product_pack_size', 0, 23, 1, '2013-09-22 16:55:53', 'Y'),
(22, 'product Unit', 3, 'inv', 18, 0, 'add_product_unit', 0, 20, 1, '2013-09-22 16:56:38', 'Y'),
(23, 'Product Batch', 3, 'inv', 18, 0, 'add_product_batch', 0, 30, 1, '2013-09-22 16:57:24', 'Y'),
(24, 'Product Offer', 3, 'inv', 18, 0, 'add_product_offer', 0, 40, 1, '2013-09-22 16:58:22', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `st_module_info`
--

CREATE TABLE IF NOT EXISTS `st_module_info` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `module_folder` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `active_flag` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `last_update_by` int(11) NOT NULL,
  `last_update_date` datetime NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=5 ;

--
-- Dumping data for table `st_module_info`
--

INSERT INTO `st_module_info` (`module_id`, `module_name`, `module_folder`, `active_flag`, `last_update_by`, `last_update_date`) VALUES
(1, 'Settings', 'settings', 'Y', 1, '2013-09-21 12:03:15'),
(2, 'Human Resources', 'hr', 'Y', 1, '2013-09-21 12:03:29'),
(3, 'Inventory', 'inv', 'Y', 1, '2013-09-21 12:03:50'),
(4, 'Stock & Sales', 'stock_sale', 'Y', 1, '2013-09-21 17:29:14');

-- --------------------------------------------------------

--
-- Table structure for table `st_user_group`
--

CREATE TABLE IF NOT EXISTS `st_user_group` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `st_user_group`
--


-- --------------------------------------------------------

--
-- Table structure for table `st_user_info`
--

CREATE TABLE IF NOT EXISTS `st_user_info` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `st_user_info`
--

INSERT INTO `st_user_info` (`user_id`, `user_full_name`, `user_login_id`, `user_password`, `user_group_id`, `user_contact_no`, `user_email`, `user_address`, `entry_by`, `entry_date`, `last_update_by`, `last_update_date`, `company_id`, `active_flag`) VALUES
(1, 'Admin', 'admin', 'admin', 1, '', '', '', 1, '2013-09-21 11:05:00', 1, '2013-09-21 11:05:00', 1, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `transfering_product_info`
--

CREATE TABLE IF NOT EXISTS `transfering_product_info` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `transfering_product_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_activity_log`
--

CREATE TABLE IF NOT EXISTS `user_activity_log` (
  `user_activity_log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `browse_page` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `log_date_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_activity_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_table_log`
--

CREATE TABLE IF NOT EXISTS `user_table_log` (
  `user_tbl_log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `table_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `table_pk` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tbl_pk_id` int(11) NOT NULL,
  `activity` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'insert',
  `browse_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_table_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `vehicle_info`
--

CREATE TABLE IF NOT EXISTS `vehicle_info` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

--
-- Dumping data for table `vehicle_info`
--

