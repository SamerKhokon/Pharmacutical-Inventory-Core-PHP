-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 18, 2013 at 12:01 PM
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `generic_name_info`
--


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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `hr_emp_designation`
--


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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `inv_depot_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `inv_depot_product_stock`
--

CREATE TABLE IF NOT EXISTS `inv_depot_product_stock` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `product_info`
--


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
-- Table structure for table `product_pack_size`
--

CREATE TABLE IF NOT EXISTS `product_pack_size` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `product_pack_size`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `product_unit_info`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

--
-- Dumping data for table `st_company_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `st_menu_info`
--

CREATE TABLE IF NOT EXISTS `st_menu_info` (
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

--
-- Dumping data for table `st_menu_info`
--


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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

--
-- Dumping data for table `st_module_info`
--


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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `st_user_info`
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

