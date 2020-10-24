-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2018 at 01:43 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enrollment`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `status1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `email`, `password`, `role`, `status1`) VALUES
('admin', 'admin@enrollment.com', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 0),
('E00001', 'student@enrollment.com', 'e10adc3949ba59abbe56e057f20f883e', 'student', 0),
('E00002', 'student2@enrollment.com', 'e10adc3949ba59abbe56e057f20f883e', 'student', 0),
('S00001', 'registrar@enrollment.com', 'e10adc3949ba59abbe56e057f20f883e', 'registrar', 0),
('S00002', 'faculty@enrollment.com', 'e10adc3949ba59abbe56e057f20f883e', 'faculty', 0),
('S00003', 'accounting@enrollment.com', 'e10adc3949ba59abbe56e057f20f883e', 'treasurer', 0),
('S00004', 'cashier@enrollment.com', 'e10adc3949ba59abbe56e057f20f883e', 'cashier', 0),
('S00005', 'president@enrollment.com', 'e10adc3949ba59abbe56e057f20f883e', 'president', 0),
('S00006', 'principal@enrollment.com', 'e10adc3949ba59abbe56e057f20f883e', 'principal', 0);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `syId` varchar(30) NOT NULL,
  `studentId` varchar(30) NOT NULL,
  `juneP` decimal(11,1) NOT NULL,
  `juneA` decimal(11,1) NOT NULL,
  `julyA` decimal(11,1) NOT NULL,
  `julyP` decimal(11,1) NOT NULL,
  `augustA` decimal(11,1) NOT NULL,
  `augustP` decimal(11,1) NOT NULL,
  `septemberA` decimal(11,1) NOT NULL,
  `septemberP` decimal(11,1) NOT NULL,
  `octoberA` decimal(11,1) NOT NULL,
  `octoberP` decimal(11,1) NOT NULL,
  `novemberA` decimal(11,1) NOT NULL,
  `novemberP` decimal(11,1) NOT NULL,
  `decemberA` decimal(11,1) NOT NULL,
  `decemberP` decimal(11,1) NOT NULL,
  `januaryA` decimal(11,1) NOT NULL,
  `januaryP` decimal(11,1) NOT NULL,
  `februaryA` decimal(11,1) NOT NULL,
  `februaryP` decimal(11,1) NOT NULL,
  `marchA` decimal(11,1) NOT NULL,
  `marchP` decimal(11,1) NOT NULL,
  `juneS` int(11) NOT NULL,
  `julyS` int(11) NOT NULL,
  `augustS` int(11) NOT NULL,
  `septemberS` int(11) NOT NULL,
  `octoberS` int(11) NOT NULL,
  `novemberS` int(11) NOT NULL,
  `decemberS` int(11) NOT NULL,
  `januaryS` int(11) NOT NULL,
  `februaryS` int(11) NOT NULL,
  `marchS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `syId`, `studentId`, `juneP`, `juneA`, `julyA`, `julyP`, `augustA`, `augustP`, `septemberA`, `septemberP`, `octoberA`, `octoberP`, `novemberA`, `novemberP`, `decemberA`, `decemberP`, `januaryA`, `januaryP`, `februaryA`, `februaryP`, `marchA`, `marchP`, `juneS`, `julyS`, `augustS`, `septemberS`, `octoberS`, `novemberS`, `decemberS`, `januaryS`, `februaryS`, `marchS`) VALUES
(1, '2019-2020', '1', '1.0', '0.0', '1.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', '0.0', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `behavior`
--

CREATE TABLE `behavior` (
  `id` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `d1` varchar(33) NOT NULL,
  `d2` varchar(33) NOT NULL,
  `t1` varchar(33) NOT NULL,
  `t2` varchar(33) NOT NULL,
  `k1` varchar(33) NOT NULL,
  `k2` varchar(33) NOT NULL,
  `b1` varchar(33) NOT NULL,
  `b2` varchar(33) NOT NULL,
  `sy` varchar(33) NOT NULL,
  `q` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `behavior`
--

INSERT INTO `behavior` (`id`, `studentId`, `d1`, `d2`, `t1`, `t2`, `k1`, `k2`, `b1`, `b2`, `sy`, `q`) VALUES
(6, 1, 'AO', 'AO', 'AO', 'AO', 'AO', 'AO', 'AO', 'AO', '2019-2020', 1),
(7, 1, 'SO', 'SO', 'SO', 'SO', 'SO', 'SO', 'SO', 'SO', '2019-2020', 2),
(8, 1, 'RO', 'RO', 'RO', 'RO', 'RO', 'RO', 'RO', 'RO', '2019-2020', 3),
(9, 1, 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', 'NO', '2019-2020', 4);

-- --------------------------------------------------------

--
-- Table structure for table `book_fee`
--

CREATE TABLE `book_fee` (
  `id` int(11) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `id` int(11) NOT NULL,
  `sy` varchar(255) NOT NULL,
  `status` int(255) NOT NULL,
  `end` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`id`, `sy`, `status`, `end`) VALUES
(1, '2019-2020', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `studentId` int(11) DEFAULT NULL,
  `w1` int(11) DEFAULT NULL,
  `w2` int(11) DEFAULT NULL,
  `w3` int(11) DEFAULT NULL,
  `w4` int(11) DEFAULT NULL,
  `w5` int(11) DEFAULT NULL,
  `w6` int(11) DEFAULT NULL,
  `w7` int(11) DEFAULT NULL,
  `w8` int(11) DEFAULT NULL,
  `w9` int(11) DEFAULT NULL,
  `w10` int(11) DEFAULT NULL,
  `p1` int(11) DEFAULT NULL,
  `p2` int(11) DEFAULT NULL,
  `p3` int(11) DEFAULT NULL,
  `p4` int(11) NOT NULL,
  `p5` int(11) DEFAULT NULL,
  `p6` int(11) DEFAULT NULL,
  `p7` int(11) DEFAULT NULL,
  `p8` int(11) DEFAULT NULL,
  `p9` int(11) DEFAULT NULL,
  `p10` int(11) DEFAULT NULL,
  `q1` int(11) DEFAULT NULL,
  `quarter` int(11) DEFAULT NULL,
  `wTotal` int(11) DEFAULT NULL,
  `pTotal` int(11) DEFAULT NULL,
  `initialGrade` float(11,2) DEFAULT NULL,
  `syId` varchar(30) DEFAULT NULL,
  `subjectId` int(11) DEFAULT NULL,
  `wwps` decimal(11,2) NOT NULL,
  `ptps` decimal(11,2) NOT NULL,
  `qaps` decimal(11,2) NOT NULL,
  `wwws` decimal(11,2) NOT NULL,
  `ptws` decimal(11,2) NOT NULL,
  `qg` int(11) NOT NULL,
  `qaws` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `studentId`, `w1`, `w2`, `w3`, `w4`, `w5`, `w6`, `w7`, `w8`, `w9`, `w10`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `q1`, `quarter`, `wTotal`, `pTotal`, `initialGrade`, `syId`, `subjectId`, `wwps`, `ptps`, `qaps`, `wwws`, `ptws`, `qg`, `qaws`) VALUES
(1, 1, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 1, 60, 60, 97.94, '2019-2020', 1, '93.75', '100.00', '100.00', '30.94', '33.00', 98, '34.00'),
(2, 1, 6, 6, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 3, 1, 44, 40, 42.13, '2019-2020', 2, '48.89', '44.44', '33.33', '16.13', '14.67', 70, '11.33'),
(3, 2, 5, 6, 6, 6, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 4, 1, 53, 50, 77.50, '2019-2020', 1, '82.81', '83.33', '66.67', '27.33', '27.50', 85, '22.67'),
(4, 2, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 3, 1, 40, 40, 40.67, '2019-2020', 2, '44.44', '44.44', '33.33', '14.67', '14.67', 70, '11.33'),
(5, 1, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 3, 20, 20, 33.33, '2019-2020', 3, '33.33', '33.33', '33.33', '11.00', '11.00', 68, '11.33'),
(6, 2, 6, 5, 5, 5, 5, 5, 5, 5, 2, 2, 2, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 3, 45, 47, 78.93, '2019-2020', 3, '75.00', '78.33', '83.33', '24.75', '25.85', 86, '28.33');

-- --------------------------------------------------------

--
-- Table structure for table `grade_fee`
--

CREATE TABLE `grade_fee` (
  `id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grade_level`
--

CREATE TABLE `grade_level` (
  `id` int(11) NOT NULL,
  `grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade_level`
--

INSERT INTO `grade_level` (`id`, `grade`) VALUES
(1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `grade_section`
--

CREATE TABLE `grade_section` (
  `id` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `max` int(11) NOT NULL,
  `grade_level` int(11) NOT NULL,
  `adviser_id` varbinary(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade_section`
--

INSERT INTO `grade_section` (`id`, `section`, `max`, `grade_level`, `adviser_id`) VALUES
(1, 'Makopa', 33, 11, 0x533030303032);

-- --------------------------------------------------------

--
-- Table structure for table `homecontent`
--

CREATE TABLE `homecontent` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `homeimage`
--

CREATE TABLE `homeimage` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `log` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `username`, `log`, `time`) VALUES
(1, 'S00002', 'User Logout', 'March 23, 2018 4:54:pm  '),
(2, 'admin', 'Add Account registrar', 'March 23, 2018 4:56:pm  '),
(3, 'admin', 'User Logout', 'March 23, 2018 4:56:pm  '),
(4, 'S00001', 'User Login', 'March 23, 2018 4:56:pm  '),
(5, 'S00001', 'Add Account faculty', 'March 23, 2018 4:57:pm  '),
(6, 'S00001', 'User Logout', 'March 23, 2018 4:58:pm  '),
(7, 'S00001', 'User Login', 'March 23, 2018 4:58:pm  '),
(8, 'S00001', 'Add Account student', 'March 23, 2018 5:02:pm  '),
(9, 'S00001', 'User Logout', 'March 23, 2018 5:03:pm  '),
(10, 'admin', 'User Login', 'March 23, 2018 5:03:pm  '),
(11, 'admin', 'Add Account treasurer', 'March 23, 2018 5:03:pm  '),
(12, 'admin', 'User Logout', 'March 23, 2018 5:03:pm  '),
(13, 'S00003', 'User Login', 'March 23, 2018 5:03:pm  '),
(14, 'S00003', 'User Logout', 'March 23, 2018 5:04:pm  '),
(15, 'admin', 'User Login', 'March 23, 2018 5:04:pm  '),
(16, 'admin', 'Add Account cashier', 'March 23, 2018 5:04:pm  '),
(17, 'admin', 'User Logout', 'March 23, 2018 5:04:pm  '),
(18, 'S00004', 'User Login', 'March 23, 2018 5:04:pm  '),
(19, 'S00004', 'User Logout', 'March 23, 2018 5:05:pm  '),
(20, 'S00002', 'User Login', 'March 23, 2018 5:05:pm  '),
(21, 'S00002', 'User Logout', 'March 23, 2018 6:22:pm  '),
(22, 'admin', 'User Login', 'March 23, 2018 6:24:pm  '),
(23, 'admin', 'Add Account president', 'March 23, 2018 6:25:pm  '),
(24, 'admin', 'User Logout', 'March 23, 2018 6:25:pm  '),
(25, 'S00005', 'User Login', 'March 23, 2018 6:25:pm  '),
(26, 'S00005', 'User Logout', 'March 23, 2018 7:06:pm  '),
(27, 'E00001', 'User Login', 'March 23, 2018 7:06:pm  '),
(28, 'E00001', 'User Logout', 'March 23, 2018 7:06:pm  '),
(29, 'S00005', 'User Login', 'March 23, 2018 7:06:pm  '),
(30, 'S00005', 'User Logout', 'March 23, 2018 7:07:pm  '),
(31, 'S00001', 'User Login', 'March 23, 2018 7:07:pm  '),
(32, 'S00001', 'User Logout', 'March 23, 2018 7:10:pm  '),
(33, 'S00005', 'User Login', 'March 23, 2018 7:10:pm  '),
(34, 'S00005', 'User Logout', 'March 23, 2018 7:12:pm  '),
(35, 'S00001', 'User Login', 'March 23, 2018 7:12:pm  '),
(36, 'S00001', 'User Logout', 'March 23, 2018 7:13:pm  '),
(37, 'S00003', 'User Login', 'March 23, 2018 7:13:pm  '),
(38, 'S00003', 'User Logout', 'March 23, 2018 7:41:pm  '),
(39, 'S00002', 'User Login', 'March 23, 2018 7:41:pm  '),
(40, 'S00002', 'User Logout', 'March 23, 2018 8:08:pm  '),
(41, 'S00004', 'User Login', 'March 23, 2018 8:08:pm  '),
(42, 'S00004', 'User Logout', 'March 23, 2018 8:17:pm  '),
(43, 'S00002', 'User Login', 'March 23, 2018 8:18:pm  '),
(44, 'S00002', 'User Logout', 'March 23, 2018 8:42:pm  '),
(45, 'S00001', 'User Login', 'March 23, 2018 8:42:pm  '),
(46, 'S00001', 'Add Account student', 'March 23, 2018 8:43:pm  '),
(47, 'S00001', 'User Logout', 'March 23, 2018 8:43:pm  '),
(48, 'S00003', 'User Login', 'March 23, 2018 8:43:pm  '),
(49, 'S00003', 'User Logout', 'March 23, 2018 8:44:pm  '),
(50, 'S00004', 'User Login', 'March 23, 2018 8:44:pm  '),
(51, 'S00004', 'User Logout', 'March 23, 2018 8:44:pm  '),
(52, 'S00002', 'User Login', 'March 23, 2018 8:44:pm  '),
(53, 'S00002', 'User Logout', 'March 23, 2018 8:46:pm  '),
(54, 'S00001', 'User Login', 'March 23, 2018 8:46:pm  '),
(55, 'S00001', 'User Logout', 'March 23, 2018 8:46:pm  '),
(56, 'S00003', 'User Login', 'March 23, 2018 8:46:pm  '),
(57, 'S00003', 'User Logout', 'March 23, 2018 8:46:pm  '),
(58, 'S00002', 'User Login', 'March 23, 2018 8:47:pm  '),
(59, 'S00002', 'User Logout', 'March 23, 2018 8:48:pm  '),
(60, 'S00001', 'User Login', 'March 23, 2018 8:48:pm  '),
(61, 'S00001', 'User Logout', 'March 23, 2018 8:49:pm  '),
(62, 'S00002', 'User Login', 'March 23, 2018 8:50:pm  '),
(63, 'S00002', 'User Logout', 'March 23, 2018 8:54:pm  '),
(64, 'S00001', 'User Login', 'March 23, 2018 8:54:pm  '),
(65, 'S00001', 'User Logout', 'March 23, 2018 8:55:pm  '),
(66, 'S00002', 'User Login', 'March 23, 2018 8:55:pm  '),
(67, 'S00002', 'User Logout', 'March 23, 2018 9:30:pm  '),
(68, 'E00001', 'User Login', 'March 23, 2018 9:30:pm  '),
(69, 'E00001', 'User Login', 'March 24, 2018 1:52:am  '),
(70, 'E00001', 'User Logout', 'March 24, 2018 1:56:am  '),
(71, 'E00001', 'User Login', 'March 24, 2018 1:56:am  '),
(72, 'E00001', 'User Logout', 'March 24, 2018 2:06:am  '),
(73, 'S00001', 'User Login', 'March 24, 2018 2:06:am  '),
(74, 'S00001', 'User Logout', 'March 24, 2018 2:09:am  '),
(75, 'E00001', 'User Login', 'March 24, 2018 6:55:am  '),
(76, 'S00002', 'User Login', 'March 27, 2018 3:53:pm  '),
(77, 'S00002', 'User Logout', 'March 27, 2018 4:28:pm  '),
(78, 'S00001', 'User Login', 'March 27, 2018 4:29:pm  '),
(79, 'S00001', 'User Logout', 'March 27, 2018 4:33:pm  '),
(80, 'S00002', 'User Login', 'March 27, 2018 4:34:pm  '),
(81, 'S00002', 'User Logout', 'March 27, 2018 5:12:pm  '),
(82, 'S00001', 'User Login', 'March 27, 2018 5:12:pm  '),
(83, 'S00001', 'User Logout', 'March 27, 2018 6:26:pm  '),
(84, 'S00002', 'User Login', 'March 27, 2018 6:29:pm  '),
(85, 'S00002', 'User Logout', 'March 27, 2018 9:29:pm  '),
(86, 'S00003', 'User Login', 'March 27, 2018 9:30:pm  '),
(87, 'S00003', 'User Login', 'March 28, 2018 1:34:am  '),
(88, 'S00003', 'User Logout', 'March 28, 2018 2:06:am  '),
(89, 'S00004', 'User Login', 'March 28, 2018 2:06:am  '),
(90, 'S00004', 'User Logout', 'March 28, 2018 2:14:am  '),
(91, 'S00003', 'User Login', 'March 28, 2018 2:14:am  '),
(92, 'S00001', 'User Login', 'April 1, 2018 7:52:am  '),
(93, 'S00001', 'User Login', 'April 1, 2018 5:18:pm  '),
(94, 'S00001', 'User Login', 'April 2, 2018 12:20:am  '),
(95, 'S00001', 'User Logout', 'April 2, 2018 12:23:am  '),
(96, 'admin', 'User Login', 'April 2, 2018 12:23:am  '),
(97, 'admin', 'Add Account principal', 'April 2, 2018 12:24:am  '),
(98, 'admin', 'User Logout', 'April 2, 2018 12:24:am  '),
(99, 'S00001', 'User Login', 'April 2, 2018 12:24:am  ');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `page_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `link` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_report`
--

CREATE TABLE `payment_report` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `grade` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `sy` varchar(255) NOT NULL,
  `description` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_report`
--

INSERT INTO `payment_report` (`id`, `account_id`, `user_id`, `amount`, `grade`, `date`, `sy`, `description`) VALUES
(1, 0, 'E00001', '10000.00', 11, '2018-03-23	', '2019-2020', 'june pay'),
(2, 0, 'E00002', '333.00', 11, '2018-03-23	', '2019-2020', 'june pay'),
(3, 0, 'E00001', '500.00', 11, '2018-03-28	', '2019-2020', 'july pay'),
(4, 0, 'E00001', '44.00', 11, '2018-03-28	', '2019-2020', 'august pay'),
(5, 0, 'E00001', '1000.00', 11, '2018-03-28	', '2019-2020', 'september pay');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `mi` varchar(2) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `place_birth` varchar(255) NOT NULL,
  `mother` varchar(255) NOT NULL,
  `m_occu` varchar(255) NOT NULL,
  `father` varchar(255) NOT NULL,
  `f_occu` varchar(255) NOT NULL,
  `track` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staticpage`
--

CREATE TABLE `staticpage` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_account`
--

CREATE TABLE `student_account` (
  `id` int(11) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `sy` varchar(255) NOT NULL,
  `back_account` decimal(10,2) NOT NULL,
  `months_pay` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_account`
--

INSERT INTO `student_account` (`id`, `user_id`, `grade`, `section`, `total_amount`, `balance`, `sy`, `back_account`, `months_pay`) VALUES
(1, 'E00001', 11, 'Makopa', '20000.00', '8456.00', '2019-2020', '0.00', '2500.00'),
(2, 'E00002', 11, 'Makopa', '20000.00', '19667.00', '2019-2020', '0.00', '2500.00');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(11) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `place_birth` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `mother` varchar(255) NOT NULL,
  `m_occupation` varchar(255) NOT NULL,
  `father` varchar(255) NOT NULL,
  `f_occupation` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `back_account` decimal(10,2) NOT NULL,
  `track` int(255) NOT NULL,
  `schoolType` int(10) UNSIGNED ZEROFILL NOT NULL,
  `voucherId` int(11) DEFAULT NULL,
  `sectionId` varchar(30) NOT NULL,
  `lrn` int(11) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `user_id`, `grade`, `section`, `birthdate`, `place_birth`, `gender`, `mother`, `m_occupation`, `father`, `f_occupation`, `status`, `back_account`, `track`, `schoolType`, `voucherId`, `sectionId`, `lrn`, `age`) VALUES
(1, 'E00001', 11, 'Makopa', '2018-02-27', 'i dont know', 'male', 'i dont know', 'i dont know', '', '', 'enrolled', '0.00', 1, 0000000001, 1, '', 1111111111, 12),
(2, 'E00002', 11, 'Makopa', '2018-02-27', 'adf', 'male', '1111111111111111', '11111', '', '', 'enrolled', '0.00', 1, 0000000001, 1, '', 2147483647, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_records`
--

CREATE TABLE `student_records` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `grade` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `sy` varchar(255) NOT NULL,
  `track` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_requirement`
--

CREATE TABLE `student_requirement` (
  `id` int(11) NOT NULL,
  `studentId` varchar(100) NOT NULL,
  `req1` varchar(100) NOT NULL,
  `req2` varchar(100) NOT NULL,
  `req3` varchar(100) NOT NULL,
  `req4` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_requirement`
--

INSERT INTO `student_requirement` (`id`, `studentId`, `req1`, `req2`, `req3`, `req4`) VALUES
(1, 'E00001', '3416c71dc073f3710ffa4350fbcce351.jpg', '6b4b387b4985248213cc90e4ca710242.jpg', '6d80ce84f376419b6bdbf8591d5caebe.png', '88b55b305a9d9fef9af06b3f362f7c47.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `grade_level` int(11) NOT NULL,
  `instructorId` varchar(11) DEFAULT NULL,
  `track` int(11) DEFAULT NULL,
  `written_work` int(11) DEFAULT NULL,
  `performance_task` int(11) DEFAULT NULL,
  `quarterly_assesment` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `category` varchar(30) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject`, `grade_level`, `instructorId`, `track`, `written_work`, `performance_task`, `quarterly_assesment`, `semester`, `category`, `type`) VALUES
(1, 'Math', 11, 'S00002', 1, 33, 33, 34, 1, 'Core', 0),
(2, 'English', 11, 'S00002', 1, 33, 33, 34, 1, 'Core', 0),
(3, 'Math and Science study for senior high', 11, 'S00002', 1, 33, 33, 34, 2, 'Core', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject_hps`
--

CREATE TABLE `subject_hps` (
  `id` int(11) NOT NULL,
  `subjectId` int(11) DEFAULT NULL,
  `w1` int(11) DEFAULT NULL,
  `w2` int(11) DEFAULT NULL,
  `w3` int(11) DEFAULT NULL,
  `w4` int(11) DEFAULT NULL,
  `w5` int(11) DEFAULT NULL,
  `w6` int(11) DEFAULT NULL,
  `w7` int(11) DEFAULT NULL,
  `w8` int(11) DEFAULT NULL,
  `w9` int(11) DEFAULT NULL,
  `w10` int(11) DEFAULT NULL,
  `wtotal` int(11) DEFAULT NULL,
  `p1` int(11) DEFAULT NULL,
  `p2` int(11) DEFAULT NULL,
  `p3` int(11) DEFAULT NULL,
  `p4` int(11) DEFAULT NULL,
  `p5` int(11) DEFAULT NULL,
  `p6` int(11) DEFAULT NULL,
  `p7` int(11) DEFAULT NULL,
  `p8` int(11) DEFAULT NULL,
  `p9` int(11) DEFAULT NULL,
  `p10` int(11) DEFAULT NULL,
  `ptotal` int(11) DEFAULT NULL,
  `q1` int(11) DEFAULT NULL,
  `quarter` int(11) DEFAULT NULL,
  `sy` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_hps`
--

INSERT INTO `subject_hps` (`id`, `subjectId`, `w1`, `w2`, `w3`, `w4`, `w5`, `w6`, `w7`, `w8`, `w9`, `w10`, `wtotal`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `ptotal`, `q1`, `quarter`, `sy`) VALUES
(1, 1, 10, 6, 6, 6, 6, 6, 6, 6, 6, 6, 64, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 60, 6, 1, '2019-2020'),
(2, 2, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 90, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 90, 9, 1, '2019-2020'),
(3, 3, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 60, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 60, 6, 3, '2019-2020');

-- --------------------------------------------------------

--
-- Table structure for table `summer`
--

CREATE TABLE `summer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sy` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `summer`
--

INSERT INTO `summer` (`id`, `name`, `sy`, `created`) VALUES
(1, 'Summer 2018', '2019-2020', '2018-03-24 02:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `summer_enrollee`
--

CREATE TABLE `summer_enrollee` (
  `id` int(11) NOT NULL,
  `summerId` varchar(30) NOT NULL,
  `studentId` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `summer_enrollee`
--

INSERT INTO `summer_enrollee` (`id`, `summerId`, `studentId`, `status`) VALUES
(1, '1', '1', 0),
(2, '1', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sy`
--

CREATE TABLE `sy` (
  `id` int(11) NOT NULL,
  `sy` varchar(20) NOT NULL,
  `semesters` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sy`
--

INSERT INTO `sy` (`id`, `sy`, `semesters`) VALUES
(1, '2019-2020', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE `tracks` (
  `id` int(11) NOT NULL,
  `track_name` varchar(255) DEFAULT NULL,
  `adviser_id` varchar(255) DEFAULT NULL,
  `category` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`id`, `track_name`, `adviser_id`, `category`) VALUES
(1, 'Stra111', NULL, 'Academic');

-- --------------------------------------------------------

--
-- Table structure for table `tuition`
--

CREATE TABLE `tuition` (
  `id` int(11) NOT NULL,
  `for` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tuition`
--

INSERT INTO `tuition` (`id`, `for`, `amount`) VALUES
(1, 'tuition', '20000.00');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `id` int(11) NOT NULL,
  `userID` varchar(11) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `Mi` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contactNumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `userID`, `lastName`, `firstName`, `Mi`, `address`, `contactNumber`) VALUES
(1, 'admin', 'admin', 'user', 'ma', 'admin ', '01982309182'),
(2, 'S00001', 'registrar', 'user', 'm', 'm', '09128309128'),
(3, 'S00002', 'faculty', 'user', 'm', 'asldkfj', '12312312312'),
(4, 'E00001', 'james', 'bond', 'm', 'sdf', '11111111111'),
(5, 'S00003', 'accounting', 'user', 'm', '019823', '11111111111'),
(6, 'S00004', 'cashier', 'user', 'm', 'lkjsdf', '11111111111'),
(7, 'S00005', 'test', 'test', 'te', 'm', '12312312311'),
(8, 'E00002', 'will', 'smitth', 'd', 'sadf', '11111111111'),
(9, 'S00006', 'Principal', 'user', 'mi', 'james bond', '01283091283');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `label` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`label`, `amount`, `id`) VALUES
('Butcher 2000', 2000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `behavior`
--
ALTER TABLE `behavior`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_fee`
--
ALTER TABLE `book_fee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grade` (`grade`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_fee`
--
ALTER TABLE `grade_fee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grade` (`grade`);

--
-- Indexes for table `grade_level`
--
ALTER TABLE `grade_level`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grade` (`grade`);

--
-- Indexes for table `grade_section`
--
ALTER TABLE `grade_section`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `section` (`section`);

--
-- Indexes for table `homecontent`
--
ALTER TABLE `homecontent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homeimage`
--
ALTER TABLE `homeimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_report`
--
ALTER TABLE `payment_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staticpage`
--
ALTER TABLE `staticpage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_account`
--
ALTER TABLE `student_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_records`
--
ALTER TABLE `student_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_requirement`
--
ALTER TABLE `student_requirement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_hps`
--
ALTER TABLE `subject_hps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `summer`
--
ALTER TABLE `summer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `summer_enrollee`
--
ALTER TABLE `summer_enrollee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sy`
--
ALTER TABLE `sy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuition`
--
ALTER TABLE `tuition`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `for` (`for`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `behavior`
--
ALTER TABLE `behavior`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `book_fee`
--
ALTER TABLE `book_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `grade_fee`
--
ALTER TABLE `grade_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade_level`
--
ALTER TABLE `grade_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grade_section`
--
ALTER TABLE `grade_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `homecontent`
--
ALTER TABLE `homecontent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homeimage`
--
ALTER TABLE `homeimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_report`
--
ALTER TABLE `payment_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staticpage`
--
ALTER TABLE `staticpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_account`
--
ALTER TABLE `student_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_records`
--
ALTER TABLE `student_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_requirement`
--
ALTER TABLE `student_requirement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject_hps`
--
ALTER TABLE `subject_hps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `summer`
--
ALTER TABLE `summer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `summer_enrollee`
--
ALTER TABLE `summer_enrollee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sy`
--
ALTER TABLE `sy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tracks`
--
ALTER TABLE `tracks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tuition`
--
ALTER TABLE `tuition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
