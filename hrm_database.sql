-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 17, 2023 at 07:01 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlns`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_address`
--

DROP TABLE IF EXISTS `tb_address`;
CREATE TABLE IF NOT EXISTS `tb_address` (
  `address_id` int NOT NULL AUTO_INCREMENT,
  `phone_number` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `place_of_residence` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `permanent_address` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tb_address`
--

INSERT INTO `tb_address` (`address_id`, `phone_number`, `place_of_residence`, `permanent_address`, `email`) VALUES
(1, '0523171888', 'Hoa Phu, Long Ho, Vinh Long', 'Hoa Phu, Long Ho, Vinh Long', '20004083@st.vlute.edu.vn'),
(2, '0345158100', 'Khom Ben Chuoi, P1, TX Duyen Hai, TP Tra Vinh', 'Khom Ben Chuoi, P1, TX Duyen Hai, TP Tra Vinh', '20004014@st.vlute.edu.vn'),
(3, '999999999', 'Tien Giang', 'Tien Giang', '20004090@st.vlute.edu.vn');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE IF NOT EXISTS `tb_admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_certificate`
--

DROP TABLE IF EXISTS `tb_certificate`;
CREATE TABLE IF NOT EXISTS `tb_certificate` (
  `certificate_id` int NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL,
  `certificate` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`certificate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tb_certificate`
--

INSERT INTO `tb_certificate` (`certificate_id`, `employee_id`, `certificate`) VALUES
(1, 1, 'Microsoft Office'),
(2, 2, 'CompTIA A+'),
(3, 3, 'CompTIA Network+');

-- --------------------------------------------------------

--
-- Table structure for table `tb_citizen_identity`
--

DROP TABLE IF EXISTS `tb_citizen_identity`;
CREATE TABLE IF NOT EXISTS `tb_citizen_identity` (
  `cccd_id` int NOT NULL AUTO_INCREMENT,
  `cccd_number` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `date_of_issue_cccd` date NOT NULL,
  `place_of_issue_cccd` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`cccd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tb_citizen_identity`
--

INSERT INTO `tb_citizen_identity` (`cccd_id`, `cccd_number`, `date_of_issue_cccd`, `place_of_issue_cccd`) VALUES
(1, '086202088888', '2021-05-31', 'VL'),
(2, '086202099999', '2021-08-31', 'VL'),
(3, '086202055555', '2020-05-31', 'VL');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contract`
--

DROP TABLE IF EXISTS `tb_contract`;
CREATE TABLE IF NOT EXISTS `tb_contract` (
  `contract_id` int NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `contract_duration` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `end_date` date NOT NULL,
  `type_contract_id` int NOT NULL,
  PRIMARY KEY (`contract_id`),
  KEY `fk_contract_type_contract` (`type_contract_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tb_contract`
--

INSERT INTO `tb_contract` (`contract_id`, `start_date`, `contract_duration`, `end_date`, `type_contract_id`) VALUES
(3, '2023-08-17', '2', '2025-08-17', 1),
(4, '2023-02-07', '5', '2028-02-07', 2),
(5, '2023-02-07', '4', '2027-02-07', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_country`
--

DROP TABLE IF EXISTS `tb_country`;
CREATE TABLE IF NOT EXISTS `tb_country` (
  `country_id` int NOT NULL AUTO_INCREMENT,
  `country_name` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tb_country`
--

INSERT INTO `tb_country` (`country_id`, `country_name`) VALUES
(1, 'Viet Nam'),
(2, 'Cambodia'),
(3, 'Thailand'),
(4, 'Laos'),
(5, 'Malaysia');

-- --------------------------------------------------------

--
-- Table structure for table `tb_employee`
--

DROP TABLE IF EXISTS `tb_employee`;
CREATE TABLE IF NOT EXISTS `tb_employee` (
  `employee_id` int NOT NULL AUTO_INCREMENT,
  `employee_code` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `photo` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `employee_name` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `english_name` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `unit` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `team` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `health_checkup_date` date NOT NULL,
  `position_id` int NOT NULL,
  `role_id` int NOT NULL,
  `level_id` int NOT NULL,
  `pass_id` int NOT NULL,
  `cccd_id` int NOT NULL,
  `address_id` int NOT NULL,
  `country_id` int NOT NULL,
  `office_id` int NOT NULL,
  `personal_profile_id` int NOT NULL,
  `certificate_id` int NOT NULL,
  `contract_id` int NOT NULL,
  PRIMARY KEY (`employee_id`),
  KEY `fk_employee_position` (`position_id`),
  KEY `fk_employee_role` (`role_id`),
  KEY `fk_employee_level` (`level_id`),
  KEY `fk_employee_pass` (`pass_id`),
  KEY `fk_employee_citizen_identity` (`cccd_id`),
  KEY `fk_employee_address` (`address_id`),
  KEY `fk_employee_country` (`country_id`),
  KEY `fk_employee_office` (`office_id`),
  KEY `fk_employee_personal_profile` (`personal_profile_id`),
  KEY `fk_employee_certificate` (`certificate_id`),
  KEY `fk_employee_contract` (`contract_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tb_employee`
--

INSERT INTO `tb_employee` (`employee_id`, `employee_code`, `photo`, `employee_name`, `english_name`, `date_of_birth`, `unit`, `team`, `health_checkup_date`, `position_id`, `role_id`, `level_id`, `pass_id`, `cccd_id`, `address_id`, `country_id`, `office_id`, `personal_profile_id`, `certificate_id`, `contract_id`) VALUES
(1, 'NS01', '', 'Trần Hoàng Lam', 'Tran Hoang Lam', '2002-09-18', 'A', 'A', '2023-08-01', 1, 1, 1, 1, 1, 1, 1, 2, 1, 1, 3),
(2, 'NS02', '', 'Nguyễn Nhật Linh', 'Nguyen Nhat Linh', '2002-08-02', 'B', 'B', '2023-08-08', 9, 2, 2, 3, 3, 3, 5, 1, 2, 2, 4),
(3, 'NS03', '', 'Nguyễn Lê Trường Chinh', 'Nguyen Le Truong Chinh', '2002-11-25', 'C', 'A', '2023-08-04', 6, 8, 3, 2, 2, 2, 3, 4, 3, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

DROP TABLE IF EXISTS `tb_level`;
CREATE TABLE IF NOT EXISTS `tb_level` (
  `level_id` int NOT NULL AUTO_INCREMENT,
  `level_name` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`level_id`, `level_name`) VALUES
(1, 'Junior/Entry Level'),
(2, 'Mid-Level'),
(3, 'Senior Level '),
(4, 'Lead/Principal Level'),
(5, 'Management Level'),
(6, 'Executive Level');

-- --------------------------------------------------------

--
-- Table structure for table `tb_office`
--

DROP TABLE IF EXISTS `tb_office`;
CREATE TABLE IF NOT EXISTS `tb_office` (
  `office_id` int NOT NULL AUTO_INCREMENT,
  `office_name` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`office_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tb_office`
--

INSERT INTO `tb_office` (`office_id`, `office_name`) VALUES
(1, 'Ho Chi Minh'),
(2, 'Ha Noi'),
(3, 'YanGon'),
(4, 'PhnomPenh');

-- --------------------------------------------------------

--
-- Table structure for table `tb_passport`
--

DROP TABLE IF EXISTS `tb_passport`;
CREATE TABLE IF NOT EXISTS `tb_passport` (
  `pass_id` int NOT NULL AUTO_INCREMENT,
  `pass_number` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `date_of_issue` date NOT NULL,
  `date_of_expiry` date NOT NULL,
  `place_of_issue` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`pass_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tb_passport`
--

INSERT INTO `tb_passport` (`pass_id`, `pass_number`, `date_of_issue`, `date_of_expiry`, `place_of_issue`) VALUES
(1, 'L18092002', '2023-08-17', '2024-08-17', 'VN'),
(2, 'C25112002', '2023-05-17', '2024-05-17', 'USA'),
(3, 'L00000000', '2023-02-17', '2024-02-17', 'RK');

-- --------------------------------------------------------

--
-- Table structure for table `tb_personal_profile`
--

DROP TABLE IF EXISTS `tb_personal_profile`;
CREATE TABLE IF NOT EXISTS `tb_personal_profile` (
  `personal_profile_id` int NOT NULL AUTO_INCREMENT,
  `employee_id` int NOT NULL,
  `profile` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`personal_profile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tb_personal_profile`
--

INSERT INTO `tb_personal_profile` (`personal_profile_id`, `employee_id`, `profile`) VALUES
(1, 1, 'CV'),
(2, 2, 'Đơn Xin Việc'),
(3, 3, 'Đơn thôi việc');

-- --------------------------------------------------------

--
-- Table structure for table `tb_position`
--

DROP TABLE IF EXISTS `tb_position`;
CREATE TABLE IF NOT EXISTS `tb_position` (
  `position_id` int NOT NULL AUTO_INCREMENT,
  `position_name` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tb_position`
--

INSERT INTO `tb_position` (`position_id`, `position_name`) VALUES
(1, 'CEO'),
(2, 'CFO'),
(3, 'Software Developer/Engineer'),
(4, 'Web Developer'),
(5, 'Mobile App Developer'),
(6, 'Full Stack Developer'),
(7, 'DevOps Engineer'),
(8, 'Sales Manager'),
(9, 'IT Support/Help Desk'),
(10, 'Data Engineer'),
(11, 'Network Engineer');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

DROP TABLE IF EXISTS `tb_role`;
CREATE TABLE IF NOT EXISTS `tb_role` (
  `role_id` int NOT NULL AUTO_INCREMENT,
  `role_name` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`role_id`, `role_name`) VALUES
(1, 'System Analyst'),
(2, 'Software Developer'),
(3, 'Project Manager'),
(4, 'Network Infrastructure Specialist'),
(5, 'Information Security Specialist'),
(6, 'Database Specialist'),
(7, 'Helpdesk/Desktop Support Specialist'),
(8, 'Data Analyst');

-- --------------------------------------------------------

--
-- Table structure for table `tb_type_contract`
--

DROP TABLE IF EXISTS `tb_type_contract`;
CREATE TABLE IF NOT EXISTS `tb_type_contract` (
  `type_contract_id` int NOT NULL AUTO_INCREMENT,
  `type_contract_name` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`type_contract_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tb_type_contract`
--

INSERT INTO `tb_type_contract` (`type_contract_id`, `type_contract_name`) VALUES
(1, 'Fixed-Term Contract'),
(2, 'Permanent Contract'),
(3, 'Probationary Contract'),
(4, 'Resignation/Leaving Contract');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_contract`
--
ALTER TABLE `tb_contract`
  ADD CONSTRAINT `fk_contract_type_contract` FOREIGN KEY (`type_contract_id`) REFERENCES `tb_type_contract` (`type_contract_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_employee`
--
ALTER TABLE `tb_employee`
  ADD CONSTRAINT `fk_employee_address` FOREIGN KEY (`address_id`) REFERENCES `tb_address` (`address_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_certificate` FOREIGN KEY (`certificate_id`) REFERENCES `tb_certificate` (`certificate_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_citizen_identity` FOREIGN KEY (`cccd_id`) REFERENCES `tb_citizen_identity` (`cccd_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_contract` FOREIGN KEY (`contract_id`) REFERENCES `tb_contract` (`contract_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_country` FOREIGN KEY (`country_id`) REFERENCES `tb_country` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_level` FOREIGN KEY (`level_id`) REFERENCES `tb_level` (`level_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_office` FOREIGN KEY (`office_id`) REFERENCES `tb_office` (`office_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_pass` FOREIGN KEY (`pass_id`) REFERENCES `tb_passport` (`pass_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_personal_profile` FOREIGN KEY (`personal_profile_id`) REFERENCES `tb_personal_profile` (`personal_profile_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_position` FOREIGN KEY (`position_id`) REFERENCES `tb_position` (`position_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_role` FOREIGN KEY (`role_id`) REFERENCES `tb_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
