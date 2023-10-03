-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2023 at 08:57 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_address`
--

CREATE TABLE `tb_address` (
  `address_id` int(11) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `place_of_residence` text NOT NULL,
  `permanent_address` text NOT NULL,
  `email` text NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_address`
--

INSERT INTO `tb_address` (`address_id`, `phone_number`, `place_of_residence`, `permanent_address`, `email`, `employee_id`) VALUES
(50, '01234522512', 'Hoa Phu, Long Ho, Vinh Long', 'Hoa Phu, Long Ho, Vinh Long', '20004083@st.vlute.edu.vn', 53),
(51, '01231145212', 'Khom Ben Chuoi, P1, TX Duyen Hai, TP Tra Vinh', 'Khom Ben Chuoi, P1, TX Duyen Hai, TP Tra Vinh', '20004014@st.vlute.edu.vn', 54),
(70, '0823040752', 'Rach Gia', '9/83 Phi Kinh, Vĩnh Hiệp, Rạch Gía, Kiên Giang', ' tranthanhminh2018@gmail.com', 74);

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `account_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`account_id`, `username`, `password`, `role`) VALUES
(5, 'Admin', '123456', 'admin'),
(6, 'HoangLam', '123458', 'super'),
(7, 'Chin', '12345', 'user'),
(8, 'Dat', '123', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tb_certificate`
--

CREATE TABLE `tb_certificate` (
  `certificate_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `certificate` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_certificate`
--

INSERT INTO `tb_certificate` (`certificate_id`, `employee_id`, `certificate`) VALUES
(23, 74, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_citizen_identity`
--

CREATE TABLE `tb_citizen_identity` (
  `cccd_id` int(11) NOT NULL,
  `cccd_number` varchar(50) NOT NULL,
  `date_of_issue_cccd` date NOT NULL,
  `place_of_issue_cccd` text NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_citizen_identity`
--

INSERT INTO `tb_citizen_identity` (`cccd_id`, `cccd_number`, `date_of_issue_cccd`, `place_of_issue_cccd`, `employee_id`) VALUES
(50, '086202088888', '2021-05-31', 'VL', 53),
(51, '086202099999', '2021-08-31', 'VL', 54),
(70, '09123445556002', '2023-09-02', 'Kien Giang', 74);

-- --------------------------------------------------------

--
-- Table structure for table `tb_contract`
--

CREATE TABLE `tb_contract` (
  `contract_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `contract_duration` text NOT NULL,
  `end_date` date NOT NULL,
  `type_contract_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_contract`
--

INSERT INTO `tb_contract` (`contract_id`, `start_date`, `contract_duration`, `end_date`, `type_contract_id`, `employee_id`) VALUES
(47, '2023-08-01', '2 Year', '2023-08-25', 2, 53),
(48, '2023-08-16', '3 Year', '2023-08-25', 3, 54),
(66, '2023-09-01', '6 Month', '2024-02-15', 1, 74);

-- --------------------------------------------------------

--
-- Table structure for table `tb_country`
--

CREATE TABLE `tb_country` (
  `country_id` int(11) NOT NULL,
  `country_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_country`
--

INSERT INTO `tb_country` (`country_id`, `country_name`) VALUES
(1, 'VIETNAM'),
(3, 'MYANMAR'),
(4, 'CAMBODIA'),
(5, 'MALAYSIA'),
(6, 'SINGAPORE');

-- --------------------------------------------------------

--
-- Table structure for table `tb_employee`
--

CREATE TABLE `tb_employee` (
  `employee_id` int(11) NOT NULL,
  `employee_code` varchar(50) NOT NULL,
  `photo` text NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `english_name` varchar(200) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `marital_status` tinyint(1) NOT NULL,
  `date_of_birth` date NOT NULL,
  `national_name` text NOT NULL,
  `military_service` tinyint(1) NOT NULL,
  `team_id` int(11) NOT NULL,
  `health_checkup_date` date NOT NULL,
  `job_title_id` int(11) NOT NULL,
  `job_category_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_employee`
--

INSERT INTO `tb_employee` (`employee_id`, `employee_code`, `photo`, `last_name`, `first_name`, `english_name`, `gender`, `marital_status`, `date_of_birth`, `national_name`, `military_service`, `team_id`, `health_checkup_date`, `job_title_id`, `job_category_id`, `position_id`, `level_id`, `country_id`, `location_id`) VALUES
(53, 'NS04', 'NS04_Photo.jpeg', 'Tran', 'Hoang Lam', 'Mr Lam', 1, 0, '2002-09-18', 'Viet Nam', 1, 4, '2023-08-01', 9, 1, 1, 1, 1, 1),
(54, 'NS05', 'NS05_Photo.jpeg', 'Nguyen', 'Le Truong Chinh', 'Mr Chin', 0, 1, '2002-11-25', 'Maylaysia', 1, 6, '2023-08-08', 6, 1, 2, 2, 5, 5),
(74, 'NS021', 'TAP HUAN KY NANG MAY TINH.jpg', 'Tran', 'Thanh Minhh', 'Mr. Minh', 0, 0, '2002-04-24', 'Palestine', 0, 1, '0000-00-00', 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_job_category`
--

CREATE TABLE `tb_job_category` (
  `job_category_id` int(11) NOT NULL,
  `job_category_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `tb_job_title` (
  `job_title_id` int(11) NOT NULL,
  `job_title_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `tb_level` (
  `level_id` int(11) NOT NULL,
  `level_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `tb_location` (
  `location_id` int(11) NOT NULL,
  `location_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_location`
--

INSERT INTO `tb_location` (`location_id`, `location_name`) VALUES
(1, 'HỒ CHÍ MINH'),
(2, 'HÀ NỘI'),
(3, 'YANGON'),
(4, 'PHNOM PENH'),
(5, 'MALAYSIA'),
(6, 'SINGAPORE');

-- --------------------------------------------------------

--
-- Table structure for table `tb_log`
--

CREATE TABLE `tb_log` (
  `id` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `name_account` varchar(50) NOT NULL,
  `action` text NOT NULL,
  `timestap` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_log`
--

INSERT INTO `tb_log` (`id`, `id_account`, `name_account`, `action`, `timestap`) VALUES
(1, 5, 'Admin', 'Logged', '2023-09-19 08:42:25'),
(2, 5, 'Admin', 'Logged out', '2023-09-19 08:50:55'),
(3, 5, 'Admin', 'Logged', '2023-09-19 08:54:58'),
(4, 5, 'Admin', 'Delete employee', '2023-09-19 14:00:45'),
(5, 5, 'Admin', 'Delete employee', '2023-09-19 14:00:56'),
(6, 5, 'Admin', 'Delete employee', '2023-09-19 14:00:58'),
(7, 5, 'Admin', 'Import file', '2023-09-19 14:02:47'),
(8, 5, 'Admin', 'Import file', '2023-09-19 14:02:47'),
(9, 5, 'Admin', 'Import file', '2023-09-19 14:02:48'),
(10, 5, 'Admin', 'Delete employee', '2023-09-19 14:07:40'),
(11, 5, 'Admin', 'Delete employee', '2023-09-19 14:07:43'),
(12, 5, 'Admin', 'Delete employee', '2023-09-19 14:07:46'),
(13, 5, 'Admin', 'Delete employee', '2023-09-19 14:16:46'),
(14, 5, 'Admin', 'Delete employee', '2023-09-19 14:16:48'),
(15, 5, 'Admin', 'Delete employee', '2023-09-19 14:16:51'),
(16, 5, 'Admin', 'Import file', '2023-09-19 14:17:22'),
(17, 5, 'Admin', 'Import file', '2023-09-19 14:17:22'),
(18, 5, 'Admin', 'Import file', '2023-09-19 14:17:23'),
(19, 5, 'Admin', 'Logged', '2023-09-20 08:18:00'),
(20, 5, 'Admin', 'Delete employee', '2023-09-20 08:18:10'),
(21, 5, 'Admin', 'Delete employee', '2023-09-20 08:18:14'),
(22, 5, 'Admin', 'Delete employee', '2023-09-20 08:18:17'),
(23, 5, 'Admin', 'Import file', '2023-09-20 08:18:29'),
(24, 5, 'Admin', 'Update Employee', '2023-09-20 08:22:43'),
(25, 5, 'Admin', 'Export file', '2023-09-20 08:28:13'),
(26, 5, 'Admin', 'Logged', '2023-09-20 08:37:10'),
(27, 5, 'Admin', 'Logged', '2023-09-20 08:37:53'),
(28, 5, 'Admin', 'Logged', '2023-09-20 08:39:04'),
(29, 5, 'Admin', 'Logged', '2023-09-20 08:39:26'),
(30, 5, 'Admin', 'Logged', '2023-09-20 08:40:10'),
(31, 5, 'Admin', 'Logged', '2023-09-20 08:41:00'),
(32, 5, 'Admin', 'Logged', '2023-09-20 08:41:06'),
(33, 5, 'Admin', 'Logged', '2023-09-20 08:44:51'),
(34, 5, 'Admin', 'Logged', '2023-09-20 08:44:57'),
(35, 5, 'Admin', 'Logged', '2023-09-20 08:44:57'),
(36, 5, 'Admin', 'Logged', '2023-09-20 08:44:58'),
(37, 5, 'Admin', 'Logged', '2023-09-20 08:46:45'),
(38, 5, 'Admin', 'Logged', '2023-09-20 08:47:36'),
(39, 5, 'Admin', 'Logged', '2023-09-20 08:50:34'),
(40, 5, 'Admin', 'Logged', '2023-09-20 08:55:12'),
(41, 5, 'Admin', 'Logged', '2023-09-20 08:55:13'),
(42, 5, 'Admin', 'Logged', '2023-09-20 08:55:13'),
(43, 5, 'Admin', 'Logged', '2023-09-20 08:55:13'),
(44, 5, 'Admin', 'Logged', '2023-09-20 08:55:15'),
(45, 5, 'Admin', 'Logged', '2023-09-20 08:55:37'),
(46, 5, 'Admin', 'Logged', '2023-09-21 02:03:46'),
(47, 5, 'Admin', 'Logged', '2023-09-21 02:04:11'),
(48, 5, 'Admin', 'Logged', '2023-09-21 02:04:18'),
(49, 5, 'Admin', 'Logged', '2023-09-21 02:06:55'),
(50, 5, 'Admin', 'Logged', '2023-09-21 02:07:07'),
(51, 5, 'Admin', 'Logged', '2023-09-21 02:07:08'),
(52, 5, 'Admin', 'Logged', '2023-09-21 02:08:25'),
(53, 5, 'Admin', 'Logged', '2023-09-21 02:09:40'),
(54, 5, 'Admin', 'Logged', '2023-09-21 02:11:36'),
(55, 5, 'Admin', 'Logged', '2023-09-21 02:11:39'),
(56, 5, 'Admin', 'Logged', '2023-09-21 02:11:41'),
(57, 5, 'Admin', 'Logged', '2023-09-21 02:11:42'),
(58, 5, 'Admin', 'Logged', '2023-09-21 02:11:43'),
(59, 5, 'Admin', 'Logged', '2023-09-21 02:11:43'),
(60, 5, 'Admin', 'Logged', '2023-09-21 02:11:46'),
(61, 5, 'Admin', 'Logged', '2023-09-21 02:13:01'),
(62, 5, 'Admin', 'Logged', '2023-09-21 02:13:02'),
(63, 5, 'Admin', 'Logged', '2023-09-21 02:14:05'),
(64, 5, 'Admin', 'Logged', '2023-09-21 02:14:15'),
(65, 5, 'Admin', 'Logged', '2023-09-21 02:14:33'),
(66, 5, 'Admin', 'Logged', '2023-09-21 02:14:34'),
(67, 5, 'Admin', 'Logged', '2023-09-21 02:16:25'),
(68, 5, 'Admin', 'Logged', '2023-09-21 02:16:43'),
(69, 5, 'Admin', 'Logged', '2023-09-21 02:16:59'),
(70, 5, 'Admin', 'Logged', '2023-09-21 02:17:18'),
(71, 5, 'Admin', 'Logged', '2023-09-21 02:17:19'),
(72, 5, 'Admin', 'Logged', '2023-09-21 02:17:24'),
(73, 5, 'Admin', 'Logged', '2023-09-21 02:17:59'),
(74, 5, 'Admin', 'Logged', '2023-09-21 02:18:22'),
(75, 5, 'Admin', 'Logged', '2023-09-21 02:19:49'),
(76, 5, 'Admin', 'Logged out', '2023-09-21 02:27:53'),
(77, 7, 'Chin', 'Logged', '2023-09-21 02:28:07'),
(78, 7, 'Chin', 'Logged out', '2023-09-21 02:28:58'),
(79, 5, 'Admin', 'Logged', '2023-09-21 02:29:19'),
(80, 5, 'Admin', 'Logged', '2023-09-21 02:31:08'),
(81, 5, 'Admin', 'Logged', '2023-09-21 02:32:57'),
(82, 5, 'Admin', 'Logged', '2023-09-21 02:33:33'),
(83, 5, 'Admin', 'Logged', '2023-09-21 02:35:30'),
(84, 5, 'Admin', 'Logged', '2023-09-21 02:48:38'),
(85, 5, 'Admin', 'Logged', '2023-09-21 02:49:13'),
(86, 5, 'Admin', 'Logged', '2023-09-21 02:50:26'),
(87, 5, 'Admin', 'Logged', '2023-09-21 02:50:39'),
(88, 5, 'Admin', 'Logged', '2023-09-21 02:53:56'),
(89, 5, 'Admin', 'Logged', '2023-09-21 02:54:34'),
(90, 5, 'Admin', 'Logged', '2023-09-21 02:55:31'),
(91, 5, 'Admin', 'Logged', '2023-09-21 02:56:06'),
(92, 5, 'Admin', 'Logged', '2023-09-21 02:56:50'),
(93, 5, 'Admin', 'Logged', '2023-09-21 02:57:59'),
(94, 5, 'Admin', 'Logged', '2023-09-21 02:58:03'),
(95, 5, 'Admin', 'Logged', '2023-09-21 02:58:15'),
(96, 5, 'Admin', 'Logged', '2023-09-21 02:58:47'),
(97, 5, 'Admin', 'Logged', '2023-09-21 02:59:08'),
(98, 5, 'Admin', 'Logged', '2023-09-21 02:59:48'),
(99, 5, 'Admin', 'Logged', '2023-09-21 02:59:51'),
(100, 5, 'Admin', 'Logged', '2023-09-21 03:00:53'),
(101, 5, 'Admin', 'Logged', '2023-09-21 03:02:27'),
(102, 5, 'Admin', 'Logged', '2023-09-21 03:02:29'),
(103, 5, 'Admin', 'Logged', '2023-09-21 03:03:00'),
(104, 5, 'Admin', 'Logged', '2023-09-21 03:04:15'),
(105, 5, 'Admin', 'Logged', '2023-09-21 03:04:54'),
(106, 5, 'Admin', 'Logged', '2023-09-21 03:05:37'),
(107, 5, 'Admin', 'Logged', '2023-09-21 03:05:57'),
(108, 5, 'Admin', 'Logged', '2023-09-21 03:07:29'),
(109, 5, 'Admin', 'Logged', '2023-09-21 03:08:03'),
(110, 5, 'Admin', 'Logged', '2023-09-21 03:08:20'),
(111, 5, 'Admin', 'Logged', '2023-09-21 03:08:31'),
(112, 5, 'Admin', 'Logged', '2023-09-21 03:08:49'),
(113, 5, 'Admin', 'Logged', '2023-09-21 03:09:37'),
(114, 5, 'Admin', 'Logged', '2023-09-21 03:09:46'),
(115, 5, 'Admin', 'Logged', '2023-09-21 03:09:48'),
(116, 5, 'Admin', 'Logged', '2023-09-21 03:10:26'),
(117, 5, 'Admin', 'Logged', '2023-09-21 03:11:02'),
(118, 5, 'Admin', 'Logged', '2023-09-21 03:11:16'),
(119, 5, 'Admin', 'Logged', '2023-09-21 03:11:46'),
(120, 5, 'Admin', 'Logged', '2023-09-21 03:12:15'),
(121, 5, 'Admin', 'Logged', '2023-09-21 03:12:49'),
(122, 5, 'Admin', 'Logged', '2023-09-21 03:13:13'),
(123, 5, 'Admin', 'Logged', '2023-09-21 03:13:38'),
(124, 5, 'Admin', 'Logged', '2023-09-21 03:14:25'),
(125, 5, 'Admin', 'Logged', '2023-09-21 03:14:47'),
(126, 5, 'Admin', 'Logged', '2023-09-21 03:15:02'),
(127, 5, 'Admin', 'Logged', '2023-09-21 03:15:24'),
(128, 5, 'Admin', 'Logged', '2023-09-21 03:16:36'),
(129, 5, 'Admin', 'Logged', '2023-09-21 03:17:00'),
(130, 5, 'Admin', 'Logged', '2023-09-21 03:20:13'),
(131, 5, 'Admin', 'Logged', '2023-09-21 03:20:25'),
(132, 5, 'Admin', 'Logged', '2023-09-21 03:27:15'),
(133, 5, 'Admin', 'Logged', '2023-09-21 03:27:26'),
(134, 5, 'Admin', 'Logged', '2023-09-21 03:27:29'),
(135, 5, 'Admin', 'Logged', '2023-09-21 03:28:00'),
(136, 5, 'Admin', 'Logged', '2023-09-21 03:28:38'),
(137, 5, 'Admin', 'Logged', '2023-09-21 03:28:39'),
(138, 5, 'Admin', 'Logged', '2023-09-21 03:29:06'),
(139, 5, 'Admin', 'Logged', '2023-09-21 03:29:29'),
(140, 5, 'Admin', 'Logged', '2023-09-21 03:29:35'),
(141, 5, 'Admin', 'Logged', '2023-09-21 03:29:38'),
(142, 5, 'Admin', 'Logged', '2023-09-21 03:31:19'),
(143, 5, 'Admin', 'Logged', '2023-09-21 03:31:22'),
(144, 5, 'Admin', 'Logged', '2023-09-21 03:31:24'),
(145, 5, 'Admin', 'Logged', '2023-09-21 03:32:03'),
(146, 5, 'Admin', 'Logged', '2023-09-21 03:32:04'),
(147, 5, 'Admin', 'Logged', '2023-09-21 03:33:34'),
(148, 5, 'Admin', 'Logged', '2023-09-21 03:35:43'),
(149, 5, 'Admin', 'Logged', '2023-09-21 03:35:59'),
(150, 5, 'Admin', 'Logged', '2023-09-21 03:37:08'),
(151, 5, 'Admin', 'Logged', '2023-09-21 03:37:43'),
(152, 5, 'Admin', 'Logged', '2023-09-21 03:44:52'),
(153, 5, 'Admin', 'Logged', '2023-09-21 03:45:05'),
(154, 5, 'Admin', 'Logged', '2023-09-21 03:45:15'),
(155, 5, 'Admin', 'Logged', '2023-09-21 03:45:23'),
(156, 5, 'Admin', 'Logged', '2023-09-21 03:45:25'),
(157, 5, 'Admin', 'Logged', '2023-09-21 03:45:52'),
(158, 5, 'Admin', 'Logged', '2023-09-21 03:48:31'),
(159, 5, 'Admin', 'Logged', '2023-09-21 03:48:34'),
(160, 5, 'Admin', 'Logged', '2023-09-21 03:48:58'),
(161, 5, 'Admin', 'Logged', '2023-09-21 03:50:17'),
(162, 5, 'Admin', 'Logged', '2023-09-21 03:50:22'),
(163, 5, 'Admin', 'Logged', '2023-09-21 03:50:25'),
(164, 5, 'Admin', 'Logged', '2023-09-21 03:50:39'),
(165, 5, 'Admin', 'Logged', '2023-09-21 03:52:07'),
(166, 5, 'Admin', 'Logged', '2023-09-21 13:50:48'),
(167, 5, 'Admin', 'Logged', '2023-09-21 13:56:17'),
(168, 5, 'Admin', 'Logged', '2023-09-21 13:56:21'),
(169, 5, 'Admin', 'Logged', '2023-09-21 13:56:38'),
(170, 5, 'Admin', 'Logged', '2023-09-21 13:56:42'),
(171, 5, 'Admin', 'Logged', '2023-09-21 13:56:44'),
(172, 5, 'Admin', 'Logged', '2023-09-21 13:57:42'),
(173, 5, 'Admin', 'Logged', '2023-09-21 13:57:46'),
(174, 5, 'Admin', 'Logged', '2023-09-21 13:58:02'),
(175, 5, 'Admin', 'Logged', '2023-09-21 13:58:46'),
(176, 5, 'Admin', 'Logged', '2023-09-21 13:58:48'),
(177, 5, 'Admin', 'Logged', '2023-09-21 13:58:51'),
(178, 5, 'Admin', 'Logged', '2023-09-21 13:59:31'),
(179, 5, 'Admin', 'Logged', '2023-09-21 14:04:16'),
(180, 5, 'Admin', 'Logged', '2023-09-21 14:04:17'),
(181, 5, 'Admin', 'Logged', '2023-09-21 14:04:18'),
(182, 5, 'Admin', 'Logged', '2023-09-21 14:05:00'),
(183, 5, 'Admin', 'Logged', '2023-09-21 14:05:01'),
(184, 5, 'Admin', 'Logged', '2023-09-21 14:05:21'),
(185, 5, 'Admin', 'Logged', '2023-09-21 14:06:41'),
(186, 5, 'Admin', 'Logged', '2023-09-21 14:07:04'),
(187, 5, 'Admin', 'Logged', '2023-09-21 14:07:05'),
(188, 5, 'Admin', 'Logged', '2023-09-21 14:07:08'),
(189, 5, 'Admin', 'Logged', '2023-09-21 14:07:14'),
(190, 5, 'Admin', 'Logged', '2023-09-21 14:07:16'),
(191, 5, 'Admin', 'Logged', '2023-09-21 14:07:25'),
(192, 5, 'Admin', 'Logged', '2023-09-21 14:07:37'),
(193, 5, 'Admin', 'Logged', '2023-09-21 14:07:43'),
(194, 5, 'Admin', 'Logged out', '2023-09-21 14:07:51'),
(195, 5, 'Admin', 'Logged', '2023-09-21 14:08:04'),
(196, 5, 'Admin', 'Logged', '2023-09-21 14:08:09'),
(197, 5, 'Admin', 'Logged', '2023-09-21 14:08:11'),
(198, 5, 'Admin', 'Logged', '2023-09-21 14:08:39'),
(199, 5, 'Admin', 'Logged', '2023-09-21 14:08:40'),
(200, 5, 'Admin', 'Logged', '2023-09-21 14:08:43'),
(201, 5, 'Admin', 'Logged', '2023-09-21 14:12:31'),
(202, 5, 'Admin', 'Logged', '2023-09-21 14:12:46'),
(203, 5, 'Admin', 'Logged', '2023-09-21 14:12:49'),
(204, 5, 'Admin', 'Logged', '2023-09-21 14:14:08'),
(205, 5, 'Admin', 'Logged', '2023-09-21 14:14:10'),
(206, 5, 'Admin', 'Logged', '2023-09-21 14:21:29'),
(207, 5, 'Admin', 'Logged', '2023-09-21 14:21:40'),
(208, 5, 'Admin', 'Logged', '2023-09-21 14:23:21'),
(209, 5, 'Admin', 'Logged', '2023-09-21 14:24:21'),
(210, 5, 'Admin', 'Logged', '2023-09-21 14:25:44'),
(211, 5, 'Admin', 'Logged', '2023-09-21 14:26:03'),
(212, 5, 'Admin', 'Logged', '2023-09-21 14:27:51'),
(213, 5, 'Admin', 'Logged', '2023-09-21 14:29:53'),
(214, 5, 'Admin', 'Logged', '2023-09-21 14:29:55'),
(215, 5, 'Admin', 'Logged', '2023-09-21 14:31:38'),
(216, 5, 'Admin', 'Logged', '2023-09-21 14:35:05'),
(217, 5, 'Admin', 'Logged', '2023-09-21 14:35:34'),
(218, 5, 'Admin', 'Logged', '2023-09-21 14:37:33'),
(219, 5, 'Admin', 'Logged', '2023-09-21 14:37:33'),
(220, 5, 'Admin', 'Logged', '2023-09-21 14:38:52'),
(221, 5, 'Admin', 'Logged out', '2023-09-21 14:39:26'),
(222, 5, 'Admin', 'Logged', '2023-09-21 14:39:31'),
(223, 5, 'Admin', 'Logged', '2023-09-21 14:39:33'),
(224, 5, 'Admin', 'Logged', '2023-09-21 14:39:36'),
(225, 5, 'Admin', 'Logged', '2023-09-21 14:39:43'),
(226, 5, 'Admin', 'Logged', '2023-09-21 14:39:45'),
(227, 5, 'Admin', 'Logged', '2023-09-21 14:39:50'),
(228, 5, 'Admin', 'Logged', '2023-09-21 14:39:53'),
(229, 5, 'Admin', 'Logged', '2023-09-21 14:39:54'),
(230, 5, 'Admin', 'Logged', '2023-09-21 14:39:56'),
(231, 5, 'Admin', 'Logged out', '2023-09-21 14:42:11'),
(232, 5, 'Admin', 'Logged', '2023-09-21 14:42:18'),
(233, 5, 'Admin', 'Logged out', '2023-09-22 02:35:19'),
(234, 7, 'Chin ', 'Logged', '2023-09-22 02:35:31'),
(235, 7, 'Chin ', 'Logged out', '2023-09-22 02:41:22'),
(236, 5, 'Admin', 'Logged', '2023-09-22 02:41:27'),
(237, 5, 'Admin', 'Delete employee', '2023-09-22 02:50:43'),
(238, 5, 'Admin', 'Add employee', '2023-09-22 02:53:15'),
(239, 5, 'Admin', 'Logged', '2023-09-22 03:46:12'),
(240, 5, 'Admin', 'Logged out', '2023-09-22 04:21:04'),
(241, 8, 'Dat', 'Logged', '2023-09-22 04:22:40'),
(242, 8, 'Dat', 'Logged out', '2023-09-22 04:27:44'),
(243, 5, 'Admin', 'Logged', '2023-09-22 04:27:51'),
(244, 5, 'Admin', 'Delete employee', '2023-09-22 04:27:56'),
(245, 5, 'Admin', 'Delete employee', '2023-09-22 04:27:58'),
(246, 5, 'Admin', 'Delete employee', '2023-09-22 04:28:00'),
(247, 5, 'Admin', 'Delete employee', '2023-09-22 04:28:02'),
(248, 5, 'Admin', 'Import file', '2023-09-22 04:28:46'),
(249, 5, 'Admin', 'Import file', '2023-09-22 04:34:58'),
(250, 5, 'Admin', 'Export file', '2023-09-22 04:43:09'),
(251, 5, 'Admin', 'Logged out', '2023-09-23 05:18:04'),
(252, 5, 'Admin', 'Logged', '2023-09-23 05:18:23'),
(253, 5, 'Admin', 'Add employee', '2023-09-23 05:28:21'),
(254, 5, 'Admin', 'Delete employee', '2023-09-23 05:28:48'),
(255, 5, 'Admin', 'Delete employee', '2023-09-23 05:29:07'),
(256, 5, 'Admin', 'Delete employee', '2023-09-23 05:29:12'),
(257, 5, 'Admin', 'Delete employee', '2023-09-23 05:29:17'),
(258, 5, 'Admin', 'Delete employee', '2023-09-23 05:29:21'),
(259, 5, 'Admin', 'Delete employee', '2023-09-23 05:29:27'),
(260, 5, 'Admin', 'Import file', '2023-09-23 05:34:47'),
(261, 5, 'Admin', 'Logged out', '2023-09-23 06:36:55'),
(262, 7, 'Chin', 'Logged', '2023-09-23 06:37:00'),
(263, 7, 'Chin', 'Logged out', '2023-09-23 14:38:26'),
(264, 5, 'Admin', 'Logged', '2023-09-23 14:38:33'),
(265, 5, 'Admin', 'Add employee', '2023-09-23 15:01:36'),
(266, 5, 'Admin', 'Add employee', '2023-09-23 15:09:10'),
(267, 5, 'Admin', 'Export file', '2023-09-24 05:17:07'),
(268, 5, 'Admin', 'Update Employee', '2023-09-24 05:27:10'),
(269, 5, 'Admin', 'Export file', '2023-09-24 06:44:14'),
(270, 5, 'Admin', 'Export file', '2023-09-24 06:49:07'),
(271, 5, 'Admin', 'Delete employee', '2023-09-24 06:56:00'),
(272, 5, 'Admin', 'Delete employee', '2023-09-24 06:56:05'),
(273, 5, 'Admin', 'Delete employee', '2023-09-24 06:56:08'),
(274, 5, 'Admin', 'Delete employee', '2023-09-24 06:56:11'),
(275, 5, 'Admin', 'Delete employee', '2023-09-24 06:56:14'),
(276, 5, 'Admin', 'Delete employee', '2023-09-24 06:56:19'),
(277, 5, 'Admin', 'Delete employee', '2023-09-24 06:56:22'),
(278, 5, 'Admin', 'Delete employee', '2023-09-24 06:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_passport`
--

CREATE TABLE `tb_passport` (
  `pass_id` int(11) NOT NULL,
  `pass_number` varchar(50) NOT NULL,
  `date_of_issue` date NOT NULL,
  `date_of_expiry` date NOT NULL,
  `place_of_issue` text NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_passport`
--

INSERT INTO `tb_passport` (`pass_id`, `pass_number`, `date_of_issue`, `date_of_expiry`, `place_of_issue`, `employee_id`) VALUES
(48, 'L18092002', '2023-08-17', '2024-08-17', 'VN', 53),
(49, 'C25112002', '2023-05-17', '2024-05-17', 'USA', 54),
(69, 'D09876546', '2023-09-01', '2025-07-11', 'Kien Giang', 74);

-- --------------------------------------------------------

--
-- Table structure for table `tb_personal_profile`
--

CREATE TABLE `tb_personal_profile` (
  `personal_profile_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `profile` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_personal_profile`
--

INSERT INTO `tb_personal_profile` (`personal_profile_id`, `employee_id`, `profile`) VALUES
(23, 74, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_position`
--

CREATE TABLE `tb_position` (
  `position_id` int(11) NOT NULL,
  `position_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `tb_team` (
  `team_id` int(11) NOT NULL,
  `team_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `tb_type_contract` (
  `type_contract_id` int(11) NOT NULL,
  `type_contract_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_type_contract`
--

INSERT INTO `tb_type_contract` (`type_contract_id`, `type_contract_name`) VALUES
(1, 'Fixed-Term Contract'),
(2, 'Permanent Contract'),
(3, 'Probationary Contract'),
(4, 'Resignation/Leaving Contract'),
(5, 'Intern');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_activity`
--

CREATE TABLE `tb_user_activity` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_address`
--
ALTER TABLE `tb_address`
  ADD PRIMARY KEY (`address_id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`),
  ADD KEY `fk_address_employee` (`employee_id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `tb_certificate`
--
ALTER TABLE `tb_certificate`
  ADD PRIMARY KEY (`certificate_id`),
  ADD KEY `fk_certificate_employee` (`employee_id`);

--
-- Indexes for table `tb_citizen_identity`
--
ALTER TABLE `tb_citizen_identity`
  ADD PRIMARY KEY (`cccd_id`),
  ADD UNIQUE KEY `cccd_number` (`cccd_number`),
  ADD KEY `fk_citizenidentity_employee` (`employee_id`);

--
-- Indexes for table `tb_contract`
--
ALTER TABLE `tb_contract`
  ADD PRIMARY KEY (`contract_id`),
  ADD KEY `fk_contract_type_contract` (`type_contract_id`),
  ADD KEY `fk_contract_employee` (`employee_id`);

--
-- Indexes for table `tb_country`
--
ALTER TABLE `tb_country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `tb_employee`
--
ALTER TABLE `tb_employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `employee_code` (`employee_code`),
  ADD KEY `fk_employee_position` (`job_title_id`),
  ADD KEY `fk_employee_role` (`position_id`),
  ADD KEY `fk_employee_level` (`level_id`),
  ADD KEY `fk_employee_country` (`country_id`),
  ADD KEY `fk_employee_job_category` (`job_category_id`),
  ADD KEY `fk_employee_team` (`team_id`),
  ADD KEY `fk_employee_location` (`location_id`);

--
-- Indexes for table `tb_job_category`
--
ALTER TABLE `tb_job_category`
  ADD PRIMARY KEY (`job_category_id`);

--
-- Indexes for table `tb_job_title`
--
ALTER TABLE `tb_job_title`
  ADD PRIMARY KEY (`job_title_id`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `tb_location`
--
ALTER TABLE `tb_location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_passport`
--
ALTER TABLE `tb_passport`
  ADD PRIMARY KEY (`pass_id`),
  ADD UNIQUE KEY `pass_number` (`pass_number`),
  ADD KEY `fk_passport_employee` (`employee_id`);

--
-- Indexes for table `tb_personal_profile`
--
ALTER TABLE `tb_personal_profile`
  ADD PRIMARY KEY (`personal_profile_id`),
  ADD KEY `fk_personalprofile_employee` (`employee_id`);

--
-- Indexes for table `tb_position`
--
ALTER TABLE `tb_position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `tb_team`
--
ALTER TABLE `tb_team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `tb_type_contract`
--
ALTER TABLE `tb_type_contract`
  ADD PRIMARY KEY (`type_contract_id`);

--
-- Indexes for table `tb_user_activity`
--
ALTER TABLE `tb_user_activity`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_address`
--
ALTER TABLE `tb_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_certificate`
--
ALTER TABLE `tb_certificate`
  MODIFY `certificate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_citizen_identity`
--
ALTER TABLE `tb_citizen_identity`
  MODIFY `cccd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tb_contract`
--
ALTER TABLE `tb_contract`
  MODIFY `contract_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tb_country`
--
ALTER TABLE `tb_country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_employee`
--
ALTER TABLE `tb_employee`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tb_job_category`
--
ALTER TABLE `tb_job_category`
  MODIFY `job_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_job_title`
--
ALTER TABLE `tb_job_title`
  MODIFY `job_title_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_location`
--
ALTER TABLE `tb_location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT for table `tb_passport`
--
ALTER TABLE `tb_passport`
  MODIFY `pass_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tb_personal_profile`
--
ALTER TABLE `tb_personal_profile`
  MODIFY `personal_profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_position`
--
ALTER TABLE `tb_position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_team`
--
ALTER TABLE `tb_team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_type_contract`
--
ALTER TABLE `tb_type_contract`
  MODIFY `type_contract_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user_activity`
--
ALTER TABLE `tb_user_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_address`
--
ALTER TABLE `tb_address`
  ADD CONSTRAINT `fk_address_employee` FOREIGN KEY (`employee_id`) REFERENCES `tb_employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_certificate`
--
ALTER TABLE `tb_certificate`
  ADD CONSTRAINT `fk_certificate_employee` FOREIGN KEY (`employee_id`) REFERENCES `tb_employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_citizen_identity`
--
ALTER TABLE `tb_citizen_identity`
  ADD CONSTRAINT `fk_citizenidentity_employee` FOREIGN KEY (`employee_id`) REFERENCES `tb_employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_employee_country` FOREIGN KEY (`country_id`) REFERENCES `tb_country` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_job_category` FOREIGN KEY (`job_category_id`) REFERENCES `tb_job_category` (`job_category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_job_title` FOREIGN KEY (`job_title_id`) REFERENCES `tb_job_title` (`job_title_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_level` FOREIGN KEY (`level_id`) REFERENCES `tb_level` (`level_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_location` FOREIGN KEY (`location_id`) REFERENCES `tb_location` (`location_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_position` FOREIGN KEY (`position_id`) REFERENCES `tb_position` (`position_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_employee_team` FOREIGN KEY (`team_id`) REFERENCES `tb_team` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_passport`
--
ALTER TABLE `tb_passport`
  ADD CONSTRAINT `fk_passport_employee` FOREIGN KEY (`employee_id`) REFERENCES `tb_employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_personal_profile`
--
ALTER TABLE `tb_personal_profile`
  ADD CONSTRAINT `fk_personalprofile_employee` FOREIGN KEY (`employee_id`) REFERENCES `tb_employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
