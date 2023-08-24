-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
<<<<<<< HEAD
-- Generation Time: Aug 22, 2023 at 02:05 AM
=======
-- Generation Time: Aug 21, 2023 at 09:31 AM
>>>>>>> 1d8a5de949cbfa85e721a6b9fc71d4199d73697d
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
  PRIMARY KEY (`address_id`),
  UNIQUE KEY `phone_number` (`phone_number`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_address`
--

INSERT INTO `tb_address` (`address_id`, `phone_number`, `place_of_residence`, `permanent_address`, `email`) VALUES
(1, '0523171888', 'Hoa Phu, Long Ho, Vinh Long', 'Hoa Phu, Long Ho, Vinh Long', '20004083@st.vlute.edu.vn'),
(2, '0345158100', 'Khom Ben Chuoi, P1, TX Duyen Hai, TP Tra Vinh', 'Khom Ben Chuoi, P1, TX Duyen Hai, TP Tra Vinh', '20004014@st.vlute.edu.vn'),
(3, '999999999', 'Tien Giang', 'Tien Giang', '20004090@st.vlute.edu.vn'),
(4, '0345158101', 'aggâgagagâg', 'Trà Vinh', 'chinhnguyen6930@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE IF NOT EXISTS `tb_admin` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`account_id`, `username`, `password`) VALUES
(5, 'Admin', '123456'),
(6, 'HoangLam', '123458'),
(7, 'Chin', '12345'),
(8, 'Linh', '123');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_certificate`
--

INSERT INTO `tb_certificate` (`certificate_id`, `employee_id`, `certificate`) VALUES
(1, 1, 'Microsoft Office'),
(2, 2, 'CompTIA A+'),
(3, 3, 'CompTIA Network+'),
(4, 0, '.gitignore'),
(5, 0, '.gitignore'),
(6, 4, '.gitignore'),
(7, 6, '.gitignore'),
(8, 7, 'Bang Tong Hop Tien Do Cong Viec.xlsx'),
(9, 0, 'Bang Tong Hop Tien Do Cong Viec.xlsx'),
(10, 0, 'Bang Tong Hop Tien Do Cong Viec.xlsx'),
(11, 0, 'Bang Tong Hop Tien Do Cong Viec.xlsx');

-- --------------------------------------------------------

--
-- Table structure for table `tb_citizen_identity`
--

DROP TABLE IF EXISTS `tb_citizen_identity`;
CREATE TABLE IF NOT EXISTS `tb_citizen_identity` (
  `cccd_id` int(11) NOT NULL AUTO_INCREMENT,
  `cccd_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_issue_cccd` date NOT NULL,
  `place_of_issue_cccd` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cccd_id`),
  UNIQUE KEY `cccd_number` (`cccd_number`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_citizen_identity`
--

INSERT INTO `tb_citizen_identity` (`cccd_id`, `cccd_number`, `date_of_issue_cccd`, `place_of_issue_cccd`) VALUES
(1, '086202088888', '2021-05-31', 'VL'),
(2, '086202099999', '2021-08-31', 'VL'),
(3, '086202055555', '2020-05-31', 'VL'),
(4, '125151251552', '0000-00-00', '121215512525'),
(16, '335046769', '0000-00-00', 'Tra Vinh');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contract`
--

DROP TABLE IF EXISTS `tb_contract`;
CREATE TABLE IF NOT EXISTS `tb_contract` (
  `contract_id` int(11) NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `contract_duration` text COLLATE utf8_unicode_ci NOT NULL,
  `end_date` date NOT NULL,
  `type_contract_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  PRIMARY KEY (`contract_id`),
  KEY `fk_contract_type_contract` (`type_contract_id`),
  KEY `fk_contract_employee` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_country`
--

DROP TABLE IF EXISTS `tb_country`;
CREATE TABLE IF NOT EXISTS `tb_country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_country`
--

INSERT INTO `tb_country` (`country_id`, `country_name`) VALUES
(1, 'VIETNAM'),
(2, 'VIETNAM'),
(3, 'MYANMAR'),
(4, 'CAMBODIA'),
(5, 'MALAYSIA'),
(6, 'SINGAPORE');

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
  `gender` tinyint(1) NOT NULL,
  `marital_status` tinyint(1) NOT NULL,
  `date_of_birth` date NOT NULL,
  `national_name` text COLLATE utf8_unicode_ci NOT NULL,
  `military_service` tinyint(1) NOT NULL,
  `team_id` int(11) NOT NULL,
  `health_checkup_date` date NOT NULL,
  `job_title_id` int(11) NOT NULL,
  `job_category_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `pass_id` int(11) NOT NULL,
  `cccd_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  PRIMARY KEY (`employee_id`),
  UNIQUE KEY `employee_code` (`employee_code`),
  KEY `fk_employee_position` (`job_title_id`),
  KEY `fk_employee_role` (`position_id`),
  KEY `fk_employee_level` (`level_id`),
  KEY `fk_employee_pass` (`pass_id`),
  KEY `fk_employee_citizen_identity` (`cccd_id`),
  KEY `fk_employee_address` (`address_id`),
  KEY `fk_employee_country` (`country_id`),
  KEY `fk_employee_job_category` (`job_category_id`),
<<<<<<< HEAD
  KEY `fk_employee_team` (`team_id`),
  KEY `fk_employee_location` (`location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
=======
  KEY `fk_employee_team` (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
>>>>>>> 1d8a5de949cbfa85e721a6b9fc71d4199d73697d

--
-- Dumping data for table `tb_employee`
--

INSERT INTO `tb_employee` (`employee_id`, `employee_code`, `photo`, `employee_name`, `english_name`, `gender`, `marital_status`, `date_of_birth`, `national_name`, `military_service`, `team_id`, `health_checkup_date`, `job_title_id`, `job_category_id`, `position_id`, `level_id`, `pass_id`, `cccd_id`, `address_id`, `country_id`, `location_id`) VALUES
<<<<<<< HEAD
(13, 'NS01', '', 'Trần Hoàng Lam', 'Mr Lam', 1, 0, '2002-09-18', 'Viet Nam', 1, 4, '2023-08-01', 9, 1, 3, 2, 1, 1, 1, 1, 1),
(14, 'NS02', '', 'Nguyễn Lê Trường Chinh', 'Mr Chin', 0, 1, '2002-11-25', 'Maylaysia', 1, 6, '2023-08-08', 6, 1, 2, 4, 2, 2, 2, 5, 5),
(15, 'NS03', '', 'Nguyễn Nhật Linh', 'Mr Linh', 1, 1, '2002-08-02', 'Singapore', 1, 5, '2023-08-04', 7, 2, 8, 6, 3, 3, 3, 6, 6);
=======
(11, 'NS01', '', 'Trần Hoàng Lam', 'Lam', 1, 1, '2002-09-18', 'Viet Nam', 1, 4, '2023-08-01', 6, 1, 2, 2, 1, 1, 1, 1, 0),
(12, 'NS02', '', 'Trần Thanh Đạt', 'Đạt', 1, 1, '2002-09-18', 'Viet Nam', 1, 4, '2023-08-01', 6, 1, 2, 2, 1, 1, 1, 1, 0);
>>>>>>> 1d8a5de949cbfa85e721a6b9fc71d4199d73697d

-- --------------------------------------------------------

--
-- Table structure for table `tb_job_category`
--

DROP TABLE IF EXISTS `tb_job_category`;
CREATE TABLE IF NOT EXISTS `tb_job_category` (
  `job_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_category_name` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`job_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_job_category`
--

INSERT INTO `tb_job_category` (`job_category_id`, `job_category_name`) VALUES
(1, 'Engineer'),
(2, 'Office');

-- --------------------------------------------------------

--
-- Table structure for table `tb_job_title`
--

DROP TABLE IF EXISTS `tb_job_title`;
CREATE TABLE IF NOT EXISTS `tb_job_title` (
  `job_title_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_title_name` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`job_title_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_job_title`
--

INSERT INTO `tb_job_title` (`job_title_id`, `job_title_name`) VALUES
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
-- Table structure for table `tb_level`
--

DROP TABLE IF EXISTS `tb_level`;
CREATE TABLE IF NOT EXISTS `tb_level` (
  `level_id` int(11) NOT NULL AUTO_INCREMENT,
  `level_name` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`level_id`, `level_name`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7');

-- --------------------------------------------------------

--
-- Table structure for table `tb_location`
--

DROP TABLE IF EXISTS `tb_location`;
CREATE TABLE IF NOT EXISTS `tb_location` (
  `location_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` text COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`location_id`),
  KEY `fk_location_country` (`country_id`)
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_location`
--

INSERT INTO `tb_location` (`location_id`, `location_name`, `country_id`) VALUES
(1, 'HỒ CHÍ MINH', 1),
(2, 'HÀ NỘI', 2),
(3, 'YANGON', 3),
(4, 'PHNOM PENH', 4),
(5, 'MALAYSIA', 5),
(6, 'SINGAPORE', 6);
=======
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
>>>>>>> 1d8a5de949cbfa85e721a6b9fc71d4199d73697d

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
  PRIMARY KEY (`pass_id`),
  UNIQUE KEY `pass_number` (`pass_number`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `personal_profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `profile` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`personal_profile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_personal_profile`
--

INSERT INTO `tb_personal_profile` (`personal_profile_id`, `employee_id`, `profile`) VALUES
(1, 1, 'CV'),
(2, 2, 'Đơn Xin Việc'),
(3, 3, 'Đơn thôi việc'),
(4, 0, 'README.md'),
(5, 0, 'README.md'),
(6, 4, 'README.md'),
(7, 6, 'README.md'),
(8, 7, 'Nguyen Le Truong Chinh - Bao Cao Tien Do Cong Viec.xlsx'),
(9, 0, 'Nguyen Le Truong Chinh - Bao Cao Tien Do Cong Viec.xlsx'),
(10, 0, 'Nguyen Le Truong Chinh - Bao Cao Tien Do Cong Viec.xlsx'),
(11, 0, 'Nguyen Le Truong Chinh - Bao Cao Tien Do Cong Viec.xlsx');

-- --------------------------------------------------------

--
-- Table structure for table `tb_position`
--

DROP TABLE IF EXISTS `tb_position`;
CREATE TABLE IF NOT EXISTS `tb_position` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `position_name` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_position`
--

INSERT INTO `tb_position` (`position_id`, `position_name`) VALUES
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
-- Table structure for table `tb_team`
--

DROP TABLE IF EXISTS `tb_team`;
CREATE TABLE IF NOT EXISTS `tb_team` (
  `team_id` int(11) NOT NULL AUTO_INCREMENT,
  `team_name` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_team`
--

INSERT INTO `tb_team` (`team_id`, `team_name`) VALUES
(1, 'CDT'),
(2, 'POD'),
(3, 'SST'),
(4, 'ITS'),
(5, 'SEA'),
(6, 'ASS'),
(7, 'PAT'),
(8, 'FID'),
(9, 'PLD'),
(10, 'ETC');

-- --------------------------------------------------------

--
-- Table structure for table `tb_type_contract`
--

DROP TABLE IF EXISTS `tb_type_contract`;
CREATE TABLE IF NOT EXISTS `tb_type_contract` (
  `type_contract_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_contract_name` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`type_contract_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_type_contract`
--

INSERT INTO `tb_type_contract` (`type_contract_id`, `type_contract_name`) VALUES
(1, 'Fixed-Term Contract'),
(2, 'Permanent Contract'),
(3, 'Probationary Contract'),
(4, 'Resignation/Leaving Contract'),
(5, 'Intern');

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
  ADD CONSTRAINT `fk_employee_citizen_identity` FOREIGN KEY (`cccd_id`) REFERENCES `tb_citizen_identity` (`cccd_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_country` FOREIGN KEY (`country_id`) REFERENCES `tb_country` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_job_category` FOREIGN KEY (`job_category_id`) REFERENCES `tb_job_category` (`job_category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_job_title` FOREIGN KEY (`job_title_id`) REFERENCES `tb_job_title` (`job_title_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_level` FOREIGN KEY (`level_id`) REFERENCES `tb_level` (`level_id`) ON DELETE CASCADE ON UPDATE CASCADE,
<<<<<<< HEAD
  ADD CONSTRAINT `fk_employee_location` FOREIGN KEY (`location_id`) REFERENCES `tb_location` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE,
=======
>>>>>>> 1d8a5de949cbfa85e721a6b9fc71d4199d73697d
  ADD CONSTRAINT `fk_employee_pass` FOREIGN KEY (`pass_id`) REFERENCES `tb_passport` (`pass_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_position` FOREIGN KEY (`position_id`) REFERENCES `tb_position` (`position_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_team` FOREIGN KEY (`team_id`) REFERENCES `tb_team` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_location`
--
ALTER TABLE `tb_location`
  ADD CONSTRAINT `fk_location_country` FOREIGN KEY (`country_id`) REFERENCES `tb_country` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
