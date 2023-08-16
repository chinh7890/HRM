-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 16, 2023 at 07:45 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrm_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_address`
--

DROP TABLE IF EXISTS `tb_address`;
CREATE TABLE IF NOT EXISTS `tb_address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `phone_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `place_of_residence` text COLLATE utf8_unicode_ci NOT NULL,
  `permanent_address` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_certificate`
--

DROP TABLE IF EXISTS `tb_certificate`;
CREATE TABLE IF NOT EXISTS `tb_certificate` (
  `certificate_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `certificate` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`certificate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_citizen_identity`
--

DROP TABLE IF EXISTS `tb_citizen_identity`;
CREATE TABLE IF NOT EXISTS `tb_citizen_identity` (
  `cccd_id` int(11) NOT NULL AUTO_INCREMENT,
  `cccd_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_issue_cccd` date NOT NULL,
  `place_of_issue_cccd` date NOT NULL,
  PRIMARY KEY (`cccd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_contract`
--

DROP TABLE IF EXISTS `tb_contract`;
CREATE TABLE IF NOT EXISTS `tb_contract` (
  `contract_id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `contract_duration` text COLLATE utf8_unicode_ci NOT NULL,
  `end_date` int(11) NOT NULL,
  `type_contract_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  PRIMARY KEY (`contract_id`),
  KEY `fk_contract_type_contract` (`type_contract_id`),
  KEY `fk_contract_employee` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_country`
--

DROP TABLE IF EXISTS `tb_country`;
CREATE TABLE IF NOT EXISTS `tb_country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_employee`
--

DROP TABLE IF EXISTS `tb_employee`;
CREATE TABLE IF NOT EXISTS `tb_employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `photo` text COLLATE utf8_unicode_ci NOT NULL,
  `employee_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `english_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `unit` text COLLATE utf8_unicode_ci NOT NULL,
  `team` text COLLATE utf8_unicode_ci NOT NULL,
  `health_checkup_date` date NOT NULL,
  `position_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `type_contract_id` int(11) NOT NULL,
  `pass_id` int(11) NOT NULL,
  `cccd_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `office_id` int(11) NOT NULL,
  `personal_profile_id` int(11) NOT NULL,
  `certificate_id` int(11) NOT NULL,
  PRIMARY KEY (`employee_id`),
  KEY `fk_employee_position` (`position_id`),
  KEY `fk_employee_role` (`role_id`),
  KEY `fk_employee_level` (`level_id`),
  KEY `fk_employee_typecontract` (`type_contract_id`),
  KEY `fk_employee_pass` (`pass_id`),
  KEY `fk_employee_citizen_identity` (`cccd_id`),
  KEY `fk_employee_address` (`address_id`),
  KEY `fk_employee_country` (`country_id`),
  KEY `fk_employee_office` (`office_id`),
  KEY `fk_employee_personal_profile` (`personal_profile_id`),
  KEY `fk_employee_certificate` (`certificate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

DROP TABLE IF EXISTS `tb_level`;
CREATE TABLE IF NOT EXISTS `tb_level` (
  `level_id` int(11) NOT NULL AUTO_INCREMENT,
  `level_name` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_office`
--

DROP TABLE IF EXISTS `tb_office`;
CREATE TABLE IF NOT EXISTS `tb_office` (
  `office_id` int(11) NOT NULL AUTO_INCREMENT,
  `office_name` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`office_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_passport`
--

DROP TABLE IF EXISTS `tb_passport`;
CREATE TABLE IF NOT EXISTS `tb_passport` (
  `pass_id` int(11) NOT NULL AUTO_INCREMENT,
  `pass_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_issue` date NOT NULL,
  `date_of_expiry` date NOT NULL,
  `place_of_issue` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`pass_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_personal_profile`
--

DROP TABLE IF EXISTS `tb_personal_profile`;
CREATE TABLE IF NOT EXISTS `tb_personal_profile` (
  `personal_profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `profile` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`personal_profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_position`
--

DROP TABLE IF EXISTS `tb_position`;
CREATE TABLE IF NOT EXISTS `tb_position` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `position_name` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

DROP TABLE IF EXISTS `tb_role`;
CREATE TABLE IF NOT EXISTS `tb_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_type_contract`
--

DROP TABLE IF EXISTS `tb_type_contract`;
CREATE TABLE IF NOT EXISTS `tb_type_contract` (
  `type_contract_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_contract_name` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`type_contract_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_contract`
--
ALTER TABLE `tb_contract`
  ADD CONSTRAINT `fk_contract_employee` FOREIGN KEY (`employee_id`) REFERENCES `tb_employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_contract_type_contract` FOREIGN KEY (`type_contract_id`) REFERENCES `tb_type_contract` (`type_contract_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_employee`
--
ALTER TABLE `tb_employee`
  ADD CONSTRAINT `fk_employee_address` FOREIGN KEY (`address_id`) REFERENCES `tb_address` (`address_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_certificate` FOREIGN KEY (`certificate_id`) REFERENCES `tb_certificate` (`certificate_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_citizen_identity` FOREIGN KEY (`cccd_id`) REFERENCES `tb_citizen_identity` (`cccd_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_country` FOREIGN KEY (`country_id`) REFERENCES `tb_country` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_level` FOREIGN KEY (`level_id`) REFERENCES `tb_level` (`level_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_office` FOREIGN KEY (`office_id`) REFERENCES `tb_office` (`office_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_pass` FOREIGN KEY (`pass_id`) REFERENCES `tb_passport` (`pass_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_personal_profile` FOREIGN KEY (`personal_profile_id`) REFERENCES `tb_personal_profile` (`personal_profile_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_position` FOREIGN KEY (`position_id`) REFERENCES `tb_position` (`position_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_role` FOREIGN KEY (`role_id`) REFERENCES `tb_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_typecontract` FOREIGN KEY (`type_contract_id`) REFERENCES `tb_type_contract` (`type_contract_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
