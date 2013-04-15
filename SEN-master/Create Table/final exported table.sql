-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2013 at 11:58 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sen`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
  `actifact_id` int(30) NOT NULL AUTO_INCREMENT,
  `resident_id` char(30) DEFAULT NULL,
  `location` char(30) NOT NULL,
  `Name` char(30) NOT NULL,
  UNIQUE KEY `Name` (`Name`),
  KEY `actifact_id` (`actifact_id`),
  KEY `resident_id` (`resident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`actifact_id`, `resident_id`, `location`, `Name`) VALUES
(4, '201001220', 'j wing', 'carrom board 1'),
(2, '201001211', 'g wing 1 floor', 'tv remote');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` char(30) NOT NULL,
  `name` char(30) NOT NULL,
  `contact` int(20) DEFAULT NULL,
  `login_id` char(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `login_id` (`login_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `contact`, `login_id`) VALUES
('200999001', 'admin2', 913231231, '200999001'),
('admin1', 'admin1', 328479, 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE IF NOT EXISTS `complaints` (
  `complaints_id` int(15) NOT NULL AUTO_INCREMENT,
  `posting_date` date NOT NULL,
  `posting_time` time NOT NULL,
  `serviced_date` date DEFAULT NULL,
  `serviced_time` time DEFAULT NULL,
  `serviced` tinyint(1) NOT NULL DEFAULT '0',
  `id` char(30) DEFAULT NULL,
  `Type` varchar(10) NOT NULL,
  `description` varchar(300) NOT NULL,
  PRIMARY KEY (`complaints_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`complaints_id`, `posting_date`, `posting_time`, `serviced_date`, `serviced_time`, `serviced`, `id`, `Type`, `description`) VALUES
(1, '2013-03-29', '18:31:35', '2013-04-01', '22:34:27', 1, '201001200', 'General', 'fan of our room is not working please do something...'),
(14, '2013-04-01', '19:15:29', NULL, NULL, 0, '201001199', 'General', 'i have some proble,'),
(16, '2013-04-01', '19:51:35', NULL, NULL, 0, '201001199', '', ''),
(17, '2013-04-01', '23:56:57', NULL, NULL, 0, '201001199', 'General', 'adding general comolain test'),
(18, '2013-04-01', '23:57:13', '2013-04-02', '00:04:11', 1, '201001199', 'Water', 'adding water comolain test'),
(19, '2013-04-01', '23:57:24', NULL, NULL, 0, '201001199', 'Electrical', 'adding electrical comolain test'),
(20, '2013-04-01', '23:57:30', '2013-04-01', '23:58:33', 1, '201001199', 'Electrical', 'adding electrical comolain test2'),
(21, '2013-04-01', '23:57:41', '2013-04-02', '00:04:46', 1, '201001199', 'Furniture', 'adding furniturecomolain test2'),
(22, '2013-04-01', '23:57:48', NULL, NULL, 0, '201001199', 'Furniture', 'adding furniturecomolain test'),
(23, '2013-04-02', '00:46:26', NULL, NULL, 0, '201001199', '', ''),
(24, '2013-04-02', '00:46:33', NULL, NULL, 0, '201001199', 'General', 'm, ,'),
(25, '2012-01-01', '12:23:00', '2012-01-02', '13:50:00', 1, '201211018', 'Electrical', 'Wall sockets short circuiting'),
(64, '2012-10-11', '01:11:00', NULL, NULL, 0, '201001211', 'Furniture', 'Table drawer broken'),
(65, '2012-10-11', '01:11:00', NULL, NULL, 0, '201001211', 'Furniture', 'Table drawer broken'),
(66, '2012-10-11', '01:11:00', NULL, NULL, 0, '201001211', 'Furniture', 'Table drawer broken'),
(67, '2011-07-31', '14:52:00', '2011-08-01', '11:22:00', 1, '201101055', 'Water', 'Early morning water doesnt come in the washrooms'),
(68, '2013-02-24', '18:51:00', '2012-02-27', '15:18:00', 1, '201101051', 'Electrical', 'Fan not working'),
(69, '2013-02-26', '10:42:00', '2013-02-28', '13:00:00', 1, '201101029', 'Furniture', 'Chair is broken'),
(70, '2013-04-27', '19:53:00', NULL, NULL, 0, '201101021', 'Furniture', 'Bed is broken'),
(71, '2011-12-15', '22:29:00', NULL, NULL, 0, '200901056', 'General', 'Termites in the room'),
(72, '2012-11-05', '23:38:00', '2012-11-08', '18:45:00', 1, '201001057', 'Electrical', 'Tubelight needs replacement'),
(73, '2012-12-02', '00:14:00', '2012-12-02', '14:09:00', 1, '201110032', 'Furniture', 'Wardrobes lock is not working'),
(74, '2012-06-07', '08:59:00', NULL, NULL, 0, '201101156', 'Water', 'Shower is broken'),
(75, '2013-01-05', '10:28:00', NULL, NULL, 0, '201101092', 'Electrical', 'Wall socket near door not working'),
(76, '2013-03-14', '14:47:00', NULL, NULL, 0, '201221039', 'General', 'Termites in the room'),
(77, '2012-07-16', '15:18:00', NULL, NULL, 0, '201201222', 'Water', 'Taps are leaking in the washrooms'),
(78, '2013-01-18', '17:27:00', '2013-01-20', '17:04:00', 1, '201101066', 'Furniture', 'One of the wall racks has a crack '),
(79, '0000-00-00', '22:24:00', NULL, NULL, 0, '201211037', 'Electrical', 'Tubelight needs replacement');

-- --------------------------------------------------------

--
-- Table structure for table `dhobi_status`
--

CREATE TABLE IF NOT EXISTS `dhobi_status` (
  `dhobi_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `present` char(1) NOT NULL DEFAULT 'o',
  PRIMARY KEY (`dhobi_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `dhobi_status`
--

INSERT INTO `dhobi_status` (`dhobi_id`, `name`, `present`) VALUES
(2, 'bhavar', 'o'),
(3, 'viren', 'o');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `doctor_id` char(30) NOT NULL,
  `name` char(30) NOT NULL,
  `present` char(1) NOT NULL,
  `login_id` char(30) DEFAULT NULL,
  UNIQUE KEY `doctor_id` (`doctor_id`),
  KEY `login_id` (`login_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `name`, `present`, `login_id`) VALUES
('doctor1', 'purnima', 'n', 'doctor1'),
('doctor2', 'sachin', 'n', 'doctor2');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_suggestions`
--

CREATE TABLE IF NOT EXISTS `doctor_suggestions` (
  `doctor_id` char(30) NOT NULL,
  `suggestion` char(30) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`doctor_id`,`date_time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_suggestions`
--

INSERT INTO `doctor_suggestions` (`doctor_id`, `suggestion`, `date_time`) VALUES
('doctor1', 'malaria outspread', '2013-04-08 12:59:48'),
('doctor1', 'Fogging should be done regular', '2013-04-09 11:11:28'),
('doctor1', 'everyone shuld wash hands befo', '2013-04-09 11:12:03'),
('doctor1', 'water coolers should be servic', '2013-04-09 11:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_visit`
--

CREATE TABLE IF NOT EXISTS `doctor_visit` (
  `visit_id` int(30) NOT NULL AUTO_INCREMENT,
  `time_date` datetime NOT NULL,
  `doctor_id` char(30) NOT NULL,
  `resident_id` char(30) NOT NULL,
  `Ailment` char(30) NOT NULL,
  PRIMARY KEY (`visit_id`),
  KEY `resident_id` (`resident_id`),
  KEY `doctor_id` (`doctor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `doctor_visit`
--

INSERT INTO `doctor_visit` (`visit_id`, `time_date`, `doctor_id`, `resident_id`, `Ailment`) VALUES
(1, '2013-04-09 03:59:48', 'doctor1', '201001211', 'malaria'),
(2, '2013-04-09 12:19:48', 'doctor1', '201201052', 'cold'),
(3, '2013-04-12 12:21:48', 'doctor1', '201101055', 'back ache'),
(4, '2013-03-30 12:32:48', 'doctor1', '201101029', 'head ache'),
(5, '2013-03-08 01:23:48', 'doctor1', '201001057', 'malaria'),
(6, '2013-02-06 01:04:48', 'doctor1', '201210007', 'vomiting'),
(7, '2013-02-02 12:15:48', 'doctor1', '201001020', 'tuberculosis'),
(8, '2013-02-22 01:25:48', 'doctor1', '201221054', 'tetanus'),
(9, '2013-02-11 01:26:48', 'doctor1', '201110032', 'vomiting'),
(10, '2013-03-15 12:37:48', 'doctor1', '200901235', 'typhoid'),
(11, '2013-01-19 01:30:00', 'doctor1', '201101167', 'pneumonia'),
(12, '2013-01-23 12:19:48', 'doctor1', '201001137', 'cold'),
(13, '2013-02-20 12:30:48', 'doctor1', '201001135', 'back ache'),
(14, '2013-02-01 01:21:48', 'doctor1', '201201125', 'head ache'),
(15, '2013-04-06 05:22:48', 'doctor2', '201001190', 'vomiting'),
(16, '2013-01-03 06:13:48', 'doctor2', '201201140', 'cold'),
(17, '2013-01-27 06:54:48', 'doctor2', '201110038', 'cold'),
(18, '2013-01-26 05:01:48', 'doctor2', '201101143', 'head ache'),
(19, '2013-03-19 06:27:48', 'doctor2', '200901164', 'cough'),
(20, '2013-04-14 05:09:48', 'doctor2', '200901118', 'malaria'),
(21, '2013-03-09 06:19:48', 'doctor2', '201201068', 'vomiting'),
(22, '2013-03-03 05:10:48', 'doctor2', '201221063', 'pneumonia'),
(23, '2013-03-02 06:20:48', 'doctor2', '201121344', 'typhoid'),
(24, '2013-01-18 05:33:48', 'doctor2', '200901085', 'tetanus'),
(25, '2013-02-24 06:19:48', 'doctor2', '201211034', 'tuberculosis'),
(26, '2013-04-10 05:29:48', 'doctor2', '201101086', 'vomiting'),
(27, '2013-04-09 12:19:48', 'doctor1', '201201052', 'cold'),
(28, '2013-04-12 12:21:48', 'doctor1', '201101055', 'back ache'),
(29, '2013-03-30 12:32:48', 'doctor1', '201101029', 'head ache'),
(30, '2013-03-08 01:23:48', 'doctor1', '201001057', 'malaria'),
(31, '2013-02-06 01:04:48', 'doctor1', '201210007', 'vomiting'),
(32, '2013-02-02 12:15:48', 'doctor1', '201001020', 'tuberculosis'),
(33, '2013-02-22 01:25:48', 'doctor1', '201221054', 'tetanus'),
(34, '2013-02-11 01:26:48', 'doctor1', '201110032', 'vomiting'),
(35, '2013-03-15 12:37:48', 'doctor1', '200901235', 'typhoid'),
(36, '2013-01-19 01:30:00', 'doctor1', '201101167', 'pneumonia'),
(37, '2013-01-23 12:19:48', 'doctor1', '201001137', 'cold'),
(38, '2013-02-20 12:30:48', 'doctor1', '201001135', 'back ache'),
(39, '2013-02-01 01:21:48', 'doctor1', '201201125', 'head ache'),
(40, '2013-04-06 05:22:48', 'doctor2', '201001190', 'vomiting'),
(41, '2013-01-03 06:13:48', 'doctor2', '201201140', 'cold'),
(42, '2013-01-27 06:54:48', 'doctor2', '201110038', 'cold'),
(43, '2013-01-26 05:01:48', 'doctor2', '201101143', 'head ache'),
(44, '2013-03-19 06:27:48', 'doctor2', '200901164', 'cough'),
(45, '2013-04-14 05:09:48', 'doctor2', '200901118', 'malaria'),
(46, '2013-03-09 06:19:48', 'doctor2', '201201068', 'vomiting'),
(47, '2013-03-03 05:10:48', 'doctor2', '201221063', 'pneumonia'),
(48, '2013-03-02 06:20:48', 'doctor2', '201121344', 'typhoid'),
(49, '2013-01-18 05:33:48', 'doctor2', '200901085', 'tetanus'),
(50, '2013-02-24 06:19:48', 'doctor2', '201211034', 'tuberculosis'),
(51, '2013-04-10 05:29:48', 'doctor2', '201101086', 'vomiting');

-- --------------------------------------------------------

--
-- Table structure for table `etic`
--

CREATE TABLE IF NOT EXISTS `etic` (
  `id` char(30) NOT NULL,
  `newpaper` char(50) NOT NULL,
  `paid` char(1) NOT NULL,
  `Payment_recv_from` char(30) NOT NULL DEFAULT 'not paid',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etic`
--

INSERT INTO `etic` (`id`, `newpaper`, `paid`, `Payment_recv_from`) VALUES
('200901050', 'The Times of India and The Economic Times', 'n', 'not paid'),
('200901069', 'The Times of India and The Economic Times', 'n', 'not paid'),
('200901085', 'The Times of India', 'n', 'not paid'),
('200901112', 'The Times of India', 'n', 'not paid'),
('200901145', 'The Times of India', 'n', 'not paid'),
('201001211', 'The Times of India', 'n', 'not paid'),
('201001213', 'The Times of India and The Economic Times', 'n', 'not paid'),
('201001220', 'The Economic Times', 'n', 'not paid'),
('201101002', 'The Times of India and The Economic Times', 'n', 'not paid'),
('201101016', 'The Times of India', 'n', 'not paid'),
('201101058', 'The Times of India and The Economic Times', 'y', 'hmcg1'),
('201101072', 'The Times of India', 'n', 'not paid'),
('201101099', 'The Economic Times', 'n', 'not paid'),
('201101156', 'The Economic Times', 'n', 'not paid'),
('201101162', 'The Economic Times', 'n', 'not paid'),
('201121014', 'The Economic Times', 'n', 'not paid'),
('201201030', 'The Times of India', 'n', 'not paid'),
('201201140', 'The Times of India and The Economic Times', 'n', 'not paid'),
('201201176', 'The Economic Times', 'n', 'not paid'),
('201201222', 'The Times of India and The Economic Times', 'n', 'not paid'),
('201221041', 'The Economic Times', 'n', 'not paid');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE IF NOT EXISTS `forum` (
  `forum_id` int(11) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `name` varchar(50) NOT NULL,
  `post` varchar(300) NOT NULL,
  PRIMARY KEY (`forum_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`forum_id`, `subject`, `date`, `time`, `name`, `post`) VALUES
(1, 'ayush', '2013-04-09', '14:51:00', 'water supply', 'it is arnd 8 in morning and 6 in evening'),
(2, 'aman', '2013-04-09', '14:51:00', 'hot water', 'is hot water also there'),
(3, 'ayush', '2013-04-09', '14:54:00', 'confetionery', 'yes they are same');

-- --------------------------------------------------------

--
-- Table structure for table `gate_evening`
--

CREATE TABLE IF NOT EXISTS `gate_evening` (
  `entry_id` int(30) NOT NULL AUTO_INCREMENT,
  `resident_id` char(30) NOT NULL,
  `time_date` datetime NOT NULL,
  `entry_exit` char(1) NOT NULL DEFAULT 'o',
  PRIMARY KEY (`entry_id`),
  KEY `resident_id` (`resident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `gate_evening`
--

INSERT INTO `gate_evening` (`entry_id`, `resident_id`, `time_date`, `entry_exit`) VALUES
(2, '201001211', '2013-03-29 10:58:17', 'o'),
(3, '201001211', '2013-03-29 10:58:24', 'i'),
(4, '201001211', '2013-03-29 11:12:16', 'o'),
(5, '201101013', '2013-04-01 19:58:17', 'o'),
(6, '201211008', '2013-03-03 20:58:24', 'i'),
(7, '201101011', '2013-02-07 21:12:16', 'o'),
(8, '201201211', '2013-01-09 22:58:17', 'o'),
(9, '201001211', '2013-04-19 23:58:24', 'i'),
(10, '201001001', '2013-02-11 00:12:16', 'o'),
(11, '201001009', '2013-03-14 22:58:17', 'o'),
(12, '201101016', '2013-01-21 19:58:24', 'i'),
(13, '201211018', '2013-04-18 22:12:16', 'o'),
(14, '201121014', '2013-03-15 23:58:17', 'o'),
(15, '201201054', '2013-02-20 21:58:24', 'i'),
(16, '201201059', '2013-01-10 20:12:16', 'o'),
(17, '201101058', '2013-03-30 02:58:17', 'o'),
(18, '201110031', '2013-03-02 19:12:24', 'o'),
(19, '201201052', '2013-04-04 20:20:16', 'o'),
(20, '201201030', '2013-04-05 21:58:17', 'o'),
(21, '201101055', '2013-04-06 22:30:24', 'o'),
(22, '201101029', '2013-01-11 23:41:16', 'o'),
(23, '201201176', '2013-01-12 00:52:17', 'o'),
(24, '201001057', '2013-02-14 01:14:24', 'o'),
(25, '201221040', '2013-04-15 02:24:16', 'o'),
(26, '201210007', '2013-04-17 03:38:17', 'o'),
(27, '200901193', '2013-04-21 04:49:24', 'o'),
(28, '201221054', '2013-03-18 19:24:16', 'o'),
(29, '200901056', '2013-03-19 20:13:17', 'o'),
(30, '200901235', '2013-02-24 21:05:24', 'o'),
(31, '200901112', '2013-02-28 23:04:16', 'o'),
(32, '201101167', '2013-01-10 22:58:17', 'o'),
(33, '201201234', '2013-02-23 00:29:24', 'o'),
(34, '200901085', '2013-04-01 01:11:16', 'o'),
(35, '201101092', '2013-01-09 02:51:17', 'o'),
(36, '201101099', '2013-02-07 03:57:24', 'o'),
(37, '201101086', '2013-03-03 21:14:16', 'o'),
(38, '201201222', '2013-04-05 22:22:17', 'o'),
(39, '200901145', '2013-04-07 20:33:24', 'o'),
(40, '201101162', '2013-02-23 19:55:16', 'o'),
(41, '201110031', '2013-03-02 21:12:24', 'i'),
(42, '201201052', '2013-04-04 22:20:16', 'i'),
(43, '201201030', '2013-04-05 00:58:17', 'i'),
(44, '201101055', '2013-04-06 01:30:24', 'i'),
(45, '201101029', '2013-01-11 03:41:16', 'i'),
(46, '201201176', '2013-01-12 01:52:17', 'i'),
(47, '201001057', '2013-02-14 05:14:24', 'i'),
(48, '201221040', '2013-04-15 02:35:16', 'i'),
(49, '201210007', '2013-04-17 04:38:17', 'i'),
(50, '200901193', '2013-04-21 05:49:24', 'i'),
(51, '201221054', '2013-03-18 20:24:16', 'i'),
(52, '200901056', '2013-03-19 21:13:17', 'i'),
(53, '200901235', '2013-02-24 23:05:24', 'i'),
(54, '200901112', '2013-02-28 00:04:16', 'i'),
(55, '201101167', '2013-01-10 23:58:17', 'i'),
(56, '201201234', '2013-02-23 02:29:24', 'i'),
(57, '200901085', '2013-04-01 03:11:16', 'i'),
(58, '201101092', '2013-01-09 04:51:17', 'i'),
(59, '201101099', '2013-02-07 04:57:24', 'i'),
(60, '201101086', '2013-03-03 22:14:16', 'i'),
(61, '201201222', '2013-04-05 00:22:17', 'i'),
(62, '200901145', '2013-04-07 22:33:24', 'i'),
(63, '201101162', '2013-02-23 23:55:16', 'i');

-- --------------------------------------------------------

--
-- Table structure for table `gate_laptop_entry`
--

CREATE TABLE IF NOT EXISTS `gate_laptop_entry` (
  `entry_id` int(30) NOT NULL AUTO_INCREMENT,
  `resident_id` char(30) NOT NULL,
  `entry_time_date` datetime DEFAULT NULL,
  `exit_time_date` datetime DEFAULT NULL,
  PRIMARY KEY (`entry_id`),
  KEY `resident_id` (`resident_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `gate_laptop_entry`
--

INSERT INTO `gate_laptop_entry` (`entry_id`, `resident_id`, `entry_time_date`, `exit_time_date`) VALUES
(3, '201001211', '2013-04-09 01:37:50', '2013-04-09 01:39:18'),
(4, '201001220', '2013-04-09 10:00:36', NULL),
(5, '201001190', '2013-04-09 13:37:50', '2013-04-09 22:39:18'),
(6, '201110031', '2013-03-02 21:12:24', NULL),
(7, '201201052', '2013-04-04 22:20:16', NULL),
(8, '201201030', '2013-04-05 00:58:17', NULL),
(9, '201101055', '2013-04-06 01:30:24', NULL),
(10, '201101029', '2013-01-11 03:41:16', NULL),
(11, '201201176', '2013-01-12 01:52:17', NULL),
(12, '201001057', '2013-02-14 05:14:24', NULL),
(13, '201221040', '2013-04-15 02:35:16', NULL),
(14, '201210007', '2013-04-17 04:38:17', NULL),
(15, '200901193', '2013-04-21 05:49:24', NULL),
(16, '201221054', '2013-03-18 20:24:16', NULL),
(17, '200901056', '2013-03-19 21:13:17', NULL),
(18, '200901235', '2013-02-24 23:05:24', NULL),
(19, '200901112', '2013-02-28 00:04:16', NULL),
(20, '201101167', '2013-01-10 23:58:17', NULL),
(21, '201201234', '2013-02-23 02:29:24', NULL),
(22, '200901085', '2013-04-01 03:11:16', NULL),
(23, '201101092', '2013-01-09 04:51:17', NULL),
(24, '201101099', '2013-02-07 04:57:24', NULL),
(25, '201101086', '2013-03-03 22:14:16', NULL),
(26, '201201222', '2013-04-05 00:22:17', NULL),
(27, '200901145', '2013-04-07 22:33:24', NULL),
(28, '201101162', '2013-02-23 23:55:16', NULL),
(29, '201101013', '2013-04-29 19:58:17', '2013-04-29 23:15:00'),
(30, '201211008', '2013-03-29 20:58:24', '2013-03-30 22:55:24'),
(31, '201101011', '2013-02-28 09:12:16', '2013-02-28 16:52:16'),
(32, '201201211', '2013-01-29 13:58:17', '2013-01-29 18:28:17'),
(33, '201001211', '2013-04-06 23:58:24', '2013-04-07 08:18:24'),
(34, '201001001', '2013-02-14 10:12:16', '2013-02-14 15:33:16'),
(35, '201001009', '2013-03-29 20:12:17', '2013-03-29 22:58:17'),
(36, '201101016', '2013-01-03 19:58:24', '2013-01-29 19:58:24'),
(37, '201211018', '2013-04-01 13:12:16', '2013-04-01 22:45:16'),
(38, '201121014', '2013-03-11 18:58:17', '2013-03-11 20:08:17'),
(39, '201201054', '2013-02-17 15:33:24', '2013-02-17 21:58:24'),
(40, '201201059', '2013-01-20 20:12:16', '2013-01-22 09:32:16'),
(41, '201101058', '2013-03-23 23:58:17', '2013-03-24 02:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `gate_leave`
--

CREATE TABLE IF NOT EXISTS `gate_leave` (
  `leave_id` int(30) NOT NULL AUTO_INCREMENT,
  `resident_id` char(30) NOT NULL,
  `entry_time_date` datetime DEFAULT NULL,
  `exit_time_date` datetime DEFAULT NULL,
  `purpose` char(100) NOT NULL,
  PRIMARY KEY (`leave_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `gate_leave`
--

INSERT INTO `gate_leave` (`leave_id`, `resident_id`, `entry_time_date`, `exit_time_date`, `purpose`) VALUES
(1, '201001211', '2013-03-29 11:06:45', '2013-03-29 11:03:24', 'home'),
(2, '201001211', '2013-03-29 11:28:24', '2013-03-29 11:24:48', 'home'),
(3, '201001220', NULL, '2013-04-09 10:34:46', 'home'),
(4, '201001190', '2013-04-09 13:37:50', '2013-04-09 22:39:18', 'official'),
(5, '201110031', NULL, '2013-03-22 21:12:24', 'home'),
(6, '201201052', NULL, '2013-03-22 22:20:16', 'project'),
(7, '201201030', NULL, '2013-03-23 00:58:17', 'home'),
(8, '201101055', NULL, '2013-03-23 01:30:24', 'home'),
(9, '201101029', NULL, '2013-03-22 03:41:16', 'home'),
(10, '201201176', NULL, '2013-03-22 01:52:17', 'project'),
(11, '201001057', NULL, '2013-02-22 05:14:24', 'home'),
(12, '201221040', NULL, '2013-03-22 02:35:16', 'home'),
(13, '201210007', NULL, '2013-03-22 04:38:17', 'home'),
(14, '200901193', NULL, '2013-03-24 05:49:24', 'home'),
(15, '201221054', NULL, '2013-03-23 20:24:16', 'project'),
(16, '200901056', NULL, '2013-03-24 21:13:17', 'home'),
(17, '200901235', NULL, '2013-03-23 23:05:24', 'home'),
(18, '200901112', NULL, '2013-03-22 00:04:16', 'home'),
(19, '201101167', NULL, '2013-03-23 23:58:17', 'project'),
(20, '201201234', NULL, '2013-03-24 02:29:24', 'home'),
(21, '200901085', NULL, '2013-03-22 03:11:16', 'home'),
(22, '201101092', NULL, '2013-03-24 04:51:17', 'home'),
(23, '201101099', NULL, '2013-03-22 04:57:24', 'project'),
(24, '201101086', NULL, '2013-03-22 22:14:16', 'home'),
(25, '201201222', NULL, '2013-03-24 00:22:17', 'home'),
(26, '200901145', NULL, '2013-03-22 22:33:24', 'project'),
(27, '201101162', NULL, '2013-03-23 23:55:16', 'home'),
(28, '201101013', '2013-03-31 19:58:17', '2013-03-29 23:15:00', 'home'),
(29, '201211008', '2013-03-30 20:58:24', '2013-03-30 22:55:24', 'home'),
(30, '201101011', '2013-03-31 18:12:16', '2013-03-28 16:52:16', 'home'),
(31, '201201211', '2013-03-30 13:58:17', '2013-03-29 18:28:17', 'home'),
(32, '201001211', '2013-03-31 23:58:24', '2013-03-07 08:18:24', 'home'),
(33, '201001001', '2013-03-30 10:12:16', '2013-03-14 15:33:16', 'home'),
(34, '201001009', '2013-03-29 20:12:17', '2013-03-29 22:58:17', 'home'),
(35, '201101016', '2013-03-30 19:58:24', '2013-03-29 19:58:24', 'home'),
(36, '201211018', '2013-03-31 13:12:16', '2013-03-01 22:45:16', 'home'),
(37, '201121014', '2013-03-31 18:58:17', '2013-03-11 20:08:17', 'home'),
(38, '201201054', '2013-03-30 15:33:24', '2013-03-17 21:58:24', 'home'),
(39, '201201059', '2013-04-01 20:12:16', '2013-03-22 09:32:16', 'home'),
(40, '201101058', '2013-04-01 23:58:17', '2013-03-24 02:58:17', 'home');

-- --------------------------------------------------------

--
-- Table structure for table `hmc`
--

CREATE TABLE IF NOT EXISTS `hmc` (
  `id` char(30) DEFAULT NULL,
  `wing` char(1) NOT NULL DEFAULT '',
  `floor` int(3) NOT NULL DEFAULT '0',
  `login_id` char(30) DEFAULT NULL,
  PRIMARY KEY (`wing`,`floor`),
  KEY `login_id` (`login_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hmc`
--

INSERT INTO `hmc` (`id`, `wing`, `floor`, `login_id`) VALUES
('201101013', 'a', 0, 'hmca0'),
('200901010', 'a', 1, 'hmca1'),
('201121019', 'a', 2, 'hmca2'),
('201201176', 'b', 0, 'hmcb0'),
('201101055', 'b', 1, 'hmcb1'),
('200901056', 'b', 2, 'hmcb2'),
('201101167', 'c', 0, 'hmcc0'),
('201101156', 'c', 1, 'hmcc1'),
('201101143', 'd', 0, 'hmcd0'),
('201001198', 'd', 1, 'hmcd1'),
('200901118', 'd', 2, 'hmcd2'),
('201201061', 'e', 0, 'hmce0'),
('201101068', 'e', 2, 'hmce2'),
('200901069', 'f', 0, 'hmcf0'),
('201211037', 'f', 1, 'hmcf1'),
('201001075', 'f', 2, 'hmcf2'),
('201101013', 'g', 0, 'hmcg0'),
('201001215', 'g', 1, 'hmcg1'),
('201001211', 'g', 2, 'hmcg2'),
('201001200', 'h', 0, 'hmch0'),
('201101162', 'h', 1, 'hmch1'),
('201001222', 'h', 2, 'hmch2'),
('201101233', 'j', 0, 'hmcj0'),
('201201230', 'j', 1, 'hmcj1'),
('200901145', 'j', 2, 'hmcj2'),
('201221039', 'k', 0, 'hmck0'),
('201101086', 'k', 1, 'hmck1'),
('201211034', 'k', 2, 'hmck2');

-- --------------------------------------------------------

--
-- Table structure for table `laptop_registration`
--

CREATE TABLE IF NOT EXISTS `laptop_registration` (
  `laptop_id` char(30) NOT NULL,
  `resident_id` char(30) NOT NULL DEFAULT '',
  `name_of_manufacturer` char(15) NOT NULL,
  `present_status` char(1) NOT NULL,
  `invoice_number` char(30) DEFAULT NULL,
  KEY `resident_id` (`resident_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laptop_registration`
--

INSERT INTO `laptop_registration` (`laptop_id`, `resident_id`, `name_of_manufacturer`, `present_status`, `invoice_number`) VALUES
('DB2JEB2E23BEI23URFFE', '200901010', 'LENOVO', 'i', 'IN90234'),
('H28O7EI232J323', '200901066', 'TOSHIBA', 'i', 'DN8223'),
('HD78EHQQWEQ89', '200901069', 'DATAWIND', 'i', 'HD87232'),
('grtog4234', '200901112', 'Lenovo', 'i', '8923'),
('DN8712OE12L', '200901164', 'DELL', 'i', 'HD72LA'),
('HD23873EQ8E921', '201001009', 'HP', 'i', 'YY889131'),
('HF9OHRH3QTQRGERQ', '201001053', 'ACER', 'i', 'HHD831'),
('ND92WEH29OE', '201001063', 'TOSHIBA', 'i', 'H98123'),
('jbg42443bg', '201001114', 'HP', 'i', '43456'),
('DHQ8OEG23E', '201001190', 'LENOVO', 'i', 'HD872I32'),
('jjjqvq1', '201001211', 'dell', 'o', '1234'),
('gt556g', '201001220', 'dell', 'i', '987655'),
('HDO872HE23WQ', '201101002', 'SONY', 'i', 'DH87212'),
('HD79O8E1209I12', '201101011', 'DELL', 'i', 'LAKSD123'),
('HBJUYQWEQEQWE0', '201101051', 'DELL', 'i', 'HHU8722'),
('hgui4325', '201101092', 'HP', 'i', '4324'),
('vjhg13234', '201101119', 'Vaio', 'i', '390930'),
('cgfgveveyu3234', '201101167', 'Acer', 'i', '1312'),
('efe84234hfd', '201101199', 'Sony', 'i', '1344'),
('e3647yuf99', '201110033', 'HP', 'i', '713'),
('vfdfb4324254', '201110038', 'Lenovo', 'i', '573465'),
('HASP92E01E2', '201201006', 'LENOVO', 'i', 'AIDIU812'),
('AJD9P8QEJPIE', '201201030', 'ACER', 'i', 'HDW87Q11'),
('hith54353', '201201125', 'Acer', 'i', '8908'),
('vfdu23435', '201201222', 'Toshiba', 'i', '4354'),
('H8734HO1E81EHO', '201201230', 'HITACHI', 'i', 'H9823H4'),
('N8727321312BHHJ', '201221039', 'TOSHIBA', 'i', 'H831233'),
('ASDNQWLUIDO9812', '201221040', 'HITACHI', 'i', 'AHD7812'),
('87Y312EQWOIJ298', '201221041', 'SAMSUNG', 'i', 'HH78123'),
('NDUIE2HE23E332', '201221054', 'DEL', 'i', 'RE132'),
('NAD8OHE23OE213', '201221063', 'HP', 'i', 'HD78923');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `login_id` char(30) NOT NULL,
  `password` char(30) NOT NULL,
  `priority` int(3) DEFAULT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `password`, `priority`) VALUES
('200901010', 'reset123', 1),
('200901050', 'reset123', 1),
('200901056', 'reset123', 1),
('200901060', 'reset123', 1),
('200901062', 'reset123', 1),
('200901066', 'reset123', 1),
('200901069', 'reset123', 1),
('200901071', 'reset123', 1),
('200901076', 'reset123', 1),
('200901085', 'reset123', 1),
('200901101', 'reset123', 1),
('200901112', 'reset123', 1),
('200901118', 'reset123', 1),
('200901145', 'reset123', 1),
('200901153', 'reset123', 1),
('200901164', 'reset123', 1),
('200901193', 'reset123', 1),
('200901222', 'reset123', 1),
('200901235', 'reset123', 1),
('200921043', 'reset123', 1),
('200999001', 'reset123', 4),
('201001001', 'reset123', 1),
('201001009', 'reset123', 1),
('201001015', 'reset123', 1),
('201001020', 'reset123', 1),
('201001024', 'reset123', 1),
('201001053', 'reset123', 1),
('201001057', 'reset123', 1),
('201001063', 'reset123', 1),
('201001067', 'reset123', 1),
('201001070', 'reset123', 1),
('201001075', 'reset123', 1),
('201001114', 'reset123', 1),
('201001135', 'reset123', 1),
('201001137', 'reset123', 1),
('201001154', 'reset123', 1),
('201001190', 'reset123', 1),
('201001198', 'reset123', 1),
('201001199', 'reset123', 1),
('201001200', 'reset123', 1),
('201001211', 'reset123', 1),
('201001212', 'reset123', 1),
('201001213', 'reset123', 1),
('201001215', 'reset123', 1),
('201001217', 'reset123', 1),
('201001218', 'reset123', 1),
('201001220', 'reset123', 1),
('201001222', 'reset123', 1),
('201001223', 'reset123', 1),
('201101002', 'reset123', 1),
('201101011', 'reset123', 1),
('201101013', 'reset123', 1),
('201101016', 'reset123', 1),
('201101021', 'reset123', 1),
('201101029', 'reset123', 1),
('201101051', 'reset123', 1),
('201101055', 'reset123', 1),
('201101058', 'reset123', 1),
('201101059', 'reset123', 1),
('201101064', 'reset123', 1),
('201101066', 'reset123', 1),
('201101068', 'reset123', 1),
('201101072', 'reset123', 1),
('201101086', 'reset123', 1),
('201101092', 'reset123', 1),
('201101099', 'reset123', 1),
('201101111', 'reset123', 1),
('201101119', 'reset123', 1),
('201101143', 'reset123', 1),
('201101156', 'reset123', 1),
('201101162', 'reset123', 1),
('201101167', 'reset123', 1),
('201101199', 'reset123', 1),
('201101233', 'reset123', 1),
('201110031', 'reset123', 1),
('201110032', 'reset123', 1),
('201110033', 'reset123', 1),
('201110035', 'reset123', 1),
('201110038', 'reset123', 1),
('201121014', 'reset123', 1),
('201121019', 'reset123', 1),
('201121344', 'reset123', 1),
('201122543', 'reset123', 1),
('201201006', 'reset123', 1),
('201201030', 'reset123', 1),
('201201052', 'reset123', 1),
('201201054', 'reset123', 1),
('201201059', 'reset123', 1),
('201201060', 'reset123', 1),
('201201061', 'reset123', 1),
('201201068', 'reset123', 1),
('201201070', 'reset123', 1),
('201201073', 'reset123', 1),
('201201125', 'reset123', 1),
('201201140', 'reset123', 1),
('201201160', 'reset123', 1),
('201201176', 'reset123', 1),
('201201183', 'reset123', 1),
('201201194', 'reset123', 1),
('201201211', 'reset123', 1),
('201201222', 'reset123', 1),
('201201230', '123', 1),
('201201234', 'reset123', 1),
('201210007', 'reset123', 1),
('201210074', 'reset123', 1),
('201211008', 'reset123', 1),
('201211018', 'reset123', 1),
('201211030', 'reset123', 1),
('201211034', 'reset123', 1),
('201211035', 'reset123', 1),
('201211037', 'reset123', 1),
('201221017', 'reset123', 1),
('201221039', 'reset123', 1),
('201221040', 'reset123', 1),
('201221041', 'reset123', 1),
('201221054', 'reset123', 1),
('201221063', 'reset123', 1),
('admin1', 'admin1', 4),
('doctor1', 'reset123', 6),
('doctor2', 'reset123', 6),
('guard', 'guard1', 5),
('hmca0', 'reset123', 2),
('hmca1', 'reset123', 2),
('hmca2', 'reset123', 2),
('hmcb0', 'reset123', 2),
('hmcb1', 'reset123', 2),
('hmcb2', 'reset123', 2),
('hmcc0', 'reset123', 2),
('hmcc1', 'reset123', 2),
('hmcconvener', 'hmcconvener', 3),
('hmcd0', 'reset123', 2),
('hmcd1', 'reset123', 2),
('hmcd2', 'reset123', 2),
('hmce0', 'reset123', 2),
('hmce2', 'reset123', 2),
('hmcf0', 'reset123', 2),
('hmcf1', 'reset123', 2),
('hmcf2', 'reset123', 2),
('hmcg0', 'reset123', 2),
('hmcg1', 'reset123', 2),
('hmcg2', 'reset', 2),
('hmch0', 'reset123', 2),
('hmch1', 'reset123', 2),
('hmch2', 'reset123', 2),
('hmcj0', 'reset123', 2),
('hmcj1', 'reset123', 2),
('hmcj2', 'reset123', 2),
('hmck0', 'reset123', 2),
('hmck1', 'reset123', 2),
('hmck2', 'reset123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `lost_found`
--

CREATE TABLE IF NOT EXISTS `lost_found` (
  `lost_found_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `id` char(30) DEFAULT NULL,
  `Title` varchar(10) NOT NULL,
  `object_details` varchar(100) DEFAULT NULL,
  `place` varchar(10) NOT NULL,
  PRIMARY KEY (`lost_found_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `lost_found`
--

INSERT INTO `lost_found` (`lost_found_id`, `date`, `time`, `type`, `id`, `Title`, `object_details`, `place`) VALUES
(34, '2012-01-01', '12:23:00', 0, '201001001', 'Pen Drive', 'Moser Baer Pen Drive 4 GB lost near Cafeteria please return it if anyone finds it', 'Cafeteria'),
(35, '2012-10-11', '01:11:00', 0, '201001211', 'Labtop cha', 'Dell Laptop I7 charger. If found please contact on my ID', 'CEP'),
(36, '2013-02-24', '18:51:00', 0, '201201176', 'Roger Pres', ' brown coloured book. If found, please return it to the Library officials', 'Library'),
(37, '2013-02-26', '10:42:00', 0, '201211037', 'passport', 'On the name of Tukaram. If foundplease return it to the hostel supervisor', 'B-Wing'),
(38, '2013-04-27', '19:53:00', 0, '201001212', 'I-Card', 'Lost My I card. If found, please return it to the A-111', 'Lecture Th'),
(65, '2011-12-15', '22:29:00', 0, '201001220', 'Gate-pass', 'Lost my gate pass If found please return it to the C 101', 'Library'),
(66, '2011-12-15', '22:29:00', 0, '201001220', 'Gate-pass', 'Lost my gate pass If found please return it to the C 101', 'Library'),
(69, '2012-11-05', '23:38:00', 0, '200901145', 'Speakers', 'Lost I Ball speakers If found please revert back to 9111100002', 'A Wing'),
(82, '2012-06-07', '08:59:00', 0, '201001223', 'I-Card', 'Moser Baer hard disk 1 TB lost near LT. If found, please revert back to my ID', 'Lecture Th'),
(84, '2013-01-05', '10:28:00', 0, '201001200', 'Pen Drive', 'I-Ball Baer Pen Drive (16 GB) lost near Cafeteria. If found, please revert back to my ID', 'Lab Buildi'),
(85, '2013-03-14', '14:47:00', 0, '201201222', 'Database G', 'Book with brown cover lost near LT. If found, please revert back to E-301', 'Library'),
(86, '2012-07-16', '15:18:00', 0, '201201230', 'WI-FI Rout', 'Lost my Adhoc Router. If found please revert back to my ID', 'H-Wing'),
(87, '2013-01-18', '17:27:00', 0, '201101086', 'Laptop Bag', 'Lost my Dell Laptop Bag with Govinda written on top. If found please revert back to C-001', 'Resource C'),
(88, '0000-00-00', '22:24:00', 0, '201001211', 'I-Card', 'Lost my Identity Card. If found please revert back to H-007', 'CEP');

-- --------------------------------------------------------

--
-- Table structure for table `residents`
--

CREATE TABLE IF NOT EXISTS `residents` (
  `id` char(30) NOT NULL,
  `name` char(30) NOT NULL,
  `room` int(5) NOT NULL,
  `floor` int(3) NOT NULL,
  `wing` char(2) NOT NULL,
  `contact_details` char(30) DEFAULT NULL,
  `guardian_contact_details` char(30) DEFAULT NULL,
  `batch` int(5) NOT NULL,
  `program` char(10) NOT NULL,
  `email` char(30) NOT NULL,
  `login_id` char(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `login_id` (`login_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `residents`
--

INSERT INTO `residents` (`id`, `name`, `room`, `floor`, `wing`, `contact_details`, `guardian_contact_details`, `batch`, `program`, `email`, `login_id`) VALUES
('200901010', 'MOHIT SINHA', 203, 1, 'a', '2147483647', '2147483647', 2009, 'btech', '200901010@daiict.ac.in', '200901010'),
('200901050', 'YASH  KUMBHANI', 206, 1, 'b', '88657126371', '213123123', 2009, 'btech', '200901050@daiict.ac.in', '200901050'),
('200901056', 'SHARAN SHODHAN', 302, 2, 'b', '81293133112', '2134124', 2009, 'btech', '200901056@daiict.ac.in', '200901056'),
('200901060', 'MAITY ANUBHAV', 104, 0, 'e', '878213123', '68712312', 2009, 'btech', '200901060@daiict.ac.in', '200901060'),
('200901062', 'Ayush Bhel', 201, 1, 'e', '66512312', '33623123', 2009, 'btech', '200901062@daiict.ac.in', '200901062'),
('200901066', 'ABHISHEK GARGH', 302, 2, 'e', '4412321', '7723123', 2009, 'btech', '200901066@daiict.ac.in', '200901066'),
('200901069', 'DHRUV BHATA', 119, 0, 'f', '2213123', '7712312', 2009, 'btech', '200901069@daiict.ac.in', '200901069'),
('200901071', 'AKHIL AHUJA', 201, 1, 'f', '2131231', '779132', 2009, 'btech', '200901071@daiict.ac.in', '200901071'),
('200901076', 'KUSHAGRA JAIN', 301, 2, 'f', '88912312', '9812312', 2009, 'btech', '200901076@daiict.ac.in', '200901076'),
('200901085', 'PALASHI DUBEY', 109, 0, 'k', '88723123123', '671283123', 2009, 'btech', '200901085@daiict.ac.in', '200901085'),
('200901101', 'Ramesh Gupta', 301, 2, 'c', '9896435212', '7823125971', 2009, 'btech', '200901101@daiict.ac.in', '200901101'),
('200901112', 'Aman Gupta', 101, 0, 'c', '9876435212', '6534284312', 2009, 'btech', '200901112@daiict.ac.in', '200901112'),
('200901118', 'Mohit Dhimmar', 301, 2, 'd', '7823124471', '5323129571', 2009, 'btech', '200901118@daiict.ac.in', '200901118'),
('200901145', 'DEVANSHI MEHTA', 317, 2, 'j', '67312323', '673123123', 2009, 'btech', '200901145@daiict.ac.in', '200901145'),
('200901153', 'Parth Shastri', 201, 1, 'd', '7903129571', '9876435212', 2009, 'btech', '200901153@daiict.ac.in', '200901153'),
('200901164', 'Aman Shastri', 101, 0, 'd', '9876999212', '7823129999', 2009, 'btech', '200901164@daiict.ac.in', '200901164'),
('200901193', 'Krutarth Patel', 116, 0, 'b', '866554422', '867123312', 2009, 'btech', '200901193@daiict.ac.in', '200901193'),
('200901222', 'Nalin', 304, 2, 'g', '2147483647', '2147483647', 2009, 'phd', '200901222@daiict.ac.in', '200901222'),
('200901235', 'Utsav Patel', 201, 1, 'c', '9876435432', '7823129526', 2009, 'btech', '200901235@daiict.ac.in', '200901235'),
('200921043', 'tino', 303, 2, 'e', '4234', '243234', 2009, 'btech', '200921043@daiict.ac.in', '200921043'),
('201001001', 'VISHAL TYAGI', 101, 0, 'a', '2147483647', '0', 2010, 'btech', '201001001@daiict.ac.in', '201001001'),
('201001009', 'BHAVYA BANSAL', 204, 1, 'a', '886523546', '998123121', 2010, 'btech', '201001009@daiict.ac.in', '201001009'),
('201001015', 'PRATEEK JOSHI', 301, 2, 'a', '9898948837', '76661233', 2010, 'btech', '201001015@daiict.ac.in', '201001015'),
('201001020', 'SAURABH BARLA', 101, 0, 'b', '7878779901', '97810238', 2010, 'btech', '201001020@daiict.ac.in', '201001020'),
('201001024', 'KAUSHAL PARMAR', 205, 1, 'b', '7766889988', '98778234', 2010, 'BTECH', '201001024@daiict.ac.in', '201001024'),
('201001053', 'LOKESH SINGH', 105, 0, 'e', '5665123123', '65612312', 2010, 'btech', '201001053@daiict.ac.in', '201001053'),
('201001057', 'MODI ISHAN', 305, 2, 'b', '781231231', '7878123', 2010, 'btech', '201001057@daiict.ac.in', '201001057'),
('201001063', 'RUSHI SHAH', 205, 1, 'e', '123213123', '12312321331', 2010, 'btech', '201001063@daiict.ac.in', '201001063'),
('201001067', 'AYUSH CHODRI', 304, 2, 'e', '669283924', '557312', 2010, 'btech', '201001067@daiict.ac.in', '201001067'),
('201001070', 'SHINI KATABA', 204, 1, 'f', '12321411', '668123', 2010, 'btech', '201001070@daiict.ac.in', '201001070'),
('201001075', 'YASH LUHADIYA', 318, 2, 'f', '87123123', '', 2010, 'BTECH', '201001075@daiict.ac.in', '201001075'),
('201001114', 'Yogin Shastri', 302, 2, 'd', '7823129222', '7822129571', 2010, 'btech', '201001114@daiict.ac.in', '201001114'),
('201001135', 'Ayush Rungta', 102, 0, 'c', '9876435234', '3457564590', 2010, 'btech', '201001135@daiict.ac.in', '201001135'),
('201001137', 'Dhanesh Kapadia', 202, 1, 'c', '9876435212', '7823129534', 2011, 'btech', '201001137@daiict.ac.in', '201001137'),
('201001154', 'Unnikrishnan Grover', 102, 0, 'd', '9876435008', '7811129571', 2010, 'btech', '201001154@daiict.ac.in', '201001154'),
('201001190', 'Harsh Shah', 302, 2, 'c', '9786435212', '7811129571', 2010, 'btech', '201001190@daiict.ac.in', '201001190'),
('201001198', 'Saurabh Gupta', 202, 1, 'd', '7829929571', '9876995212', 2010, 'btech', '201001198@daiict.ac.in', '201001198'),
('201001199', 'nikung', 101, 0, 'h', '42432432', '354535434', 2010, 'Mtech', '201001199@daiict.ac.in', '201001199'),
('201001200', 'Prateek', 109, 0, 'h', '2147483647', '2147483647', 2010, 'B-Tech', '201001200@daiict.ac.in', '201001200'),
('201001211', 'ABHISHEK', 1, 2, 'g', '999823423', '324234', 2010, 'btech', '201001211@daiict.ac.in', '201001211'),
('201001212', 'lavish', 211, 2, 'g', '992333', '122122', 2010, 'btech', '201001212@daiict.ac.in', '201001212'),
('201001213', 'sahil sikka', 201, 2, 'g', '4475645', '23849234', 2010, 'btech', '201001213@daiict.ac.in', '201001213'),
('201001215', 'prasson', 204, 1, 'g', '99234234', '23234324', 2010, 'btech', '201001215@daiict.ac.in', '201001215'),
('201001217', 'kaushal', 111, 0, 'g', '940843348', '234234', 2010, 'phd', '201001217@daiict.ac.in', '201001217'),
('201001220', 'vani', 101, 1, 'j', '2764382', '2678362', 2010, 'btech', '201001220@daiict.ac.in', '201001220'),
('201001222', 'harsh', 316, 2, 'h', '2147483647', '2147483647', 2010, 'btech', '201001222@daiict.ac.in', '201001222'),
('201001223', 'Vaishali Behl', 101, 0, 'j', '9909155978', '9428120988', 2010, 'B.TECH', '201001223@daiict.ac.in', '201001223'),
('201101002', 'AMRIT KHANNA', 111, 0, 'a', '2147483647', '986238123', 2011, 'btech', '201101002@daiict.ac.in', '201101002'),
('201101011', 'NALIN PATIDAR', 107, 1, 'a', '2147483647', '2147483647', 2011, 'btech', '201101011@daiict.ac.in', '201101011'),
('201101013', 'SAGAR CHANDARANA', 115, 1, 'a', '7878778871', '2112414991', 2011, 'btech', '201101013@daiict.ac.in', '201101013'),
('201101016', 'UDIT PANDEY', 304, 2, 'a', '7359473740', '55457823', 2011, 'btech', '201101016@daiict.ac.in', '201101016'),
('201101021', 'PARMAR JASVANT', 104, 0, 'b', '9724960102', '654357123', 2011, 'btech', '201101021@daiict.ac.in', '201101021'),
('201101029', 'SAUMIK TRIVEDI', 107, 1, 'b', '8773132123', '8676162321', 2011, 'BTECH', '201101029@daiict.ac.in', '201101029'),
('201101051', 'ACHAL SEKSARIA', 109, 1, 'b', '9727257330', '771237123', 2011, 'btech', '201101051@daiict.ac.in', '201101051'),
('201101055', 'VIPUL GARG', 219, 1, 'b', '87123123123', '21312312', 2011, 'btech', '201101055@daiict.ac.in', '201101055'),
('201101058', 'PALASH JAIN', 307, 2, 'b', '71273123124', '78123120', 2011, 'btech', '201101058@daiict.ac.in', '201101058'),
('201101059', 'GUPTA VAIBHAV', 107, 0, 'e', '21123123', '21123141', 2011, 'btech', '201101059@daiict.ac.in', '201101059'),
('201101064', 'RUSHI RAINA', 217, 1, 'e', '44122341', '1123123123', 2011, 'btech', '201101064@daiict.ac.in', '201101064'),
('201101066', 'PAWAN SEWA', 116, 0, 'f', '441312312', '923123', 2011, 'btech', '201101066@daiict.ac.in', '201101066'),
('201101068', 'ABHISHEK MERTIA', 308, 2, 'e', '8712312312', '557123', 2011, 'btech', '201101068@daiict.ac.in', '201101068'),
('201101072', 'NIKUNJ AAMI', 207, 1, 'f', '671231', '7812312', 2011, 'btech', '201101072@daiict.ac.in', '201101072'),
('201101086', 'PRIYANKA MEENA', 202, 1, 'k', '8862312312', '6213123123', 2011, 'btech', '201101086@daiict.ac.in', '201101086'),
('201101092', 'SHAKIRA KULSHRESHTA', 117, 0, 'k', '71823213', '362436', 2011, 'btech', '201101092@daiict.ac.in', '201101092'),
('201101099', 'BIMAN KULSHRESHTA', 113, 0, 'k', '667813123', '6763123', 2011, 'btech', '201101099@daiict.ac.in', '201101099'),
('201101111', 'Jeet Patel', 303, 2, 'c', '9999435212', '7823129322', 2011, 'btech', '201101111@daiict.ac.in', '201101111'),
('201101119', 'Ayush Rankawat', 303, 0, 'd', '9111435212', '9876435111', 2011, 'btech', '201101119@daiict.ac.in', '201101119'),
('201101143', 'Rahul Gandhi', 103, 0, 'd', '8881435212', '7823999571', 2011, 'btech', '201101143@daiict.ac.in', '201101143'),
('201101156', 'Rahul Desai', 203, 1, 'c', '9876435980', '7814129571', 2011, 'btech', '201101156@daiict.ac.in', '201101156'),
('201101162', 'NITESH KUMAR', 205, 1, 'h', '7832131231', '565123123', 2011, 'btech', '201101162@daiict.ac.in', '201101162'),
('201101167', 'Rohan Kohli', 103, 0, 'c', '9876435214', '7823129571', 2011, 'btech', '201101167@daiict.ac.in', '201101167'),
('201101199', 'Nikunj Garg', 203, 1, 'd', '7820029571', '9872235212', 2011, 'btech', '201101199@daiict.ac.in', '201101199'),
('201101233', 'Preeti Patel', 103, 0, 'j', '7867129571', '7867126666', 2011, 'btech', '201101233@daiict.ac.in', '201101233'),
('201110031', 'Ayush Patel', 107, 0, 'b', '9876435212', '7823129571', 2011, 'mtech', '201110031@daiict.ac.in', '201110031'),
('201110032', 'Paresh Patel', 205, 1, 'c', '9976435212', '7822229571', 2011, 'mtech', '201110032@daiict.ac.in', '201110032'),
('201110033', 'Samay Patel', 305, 2, 'c', '8896435212', '7823149571', 2011, 'mtech', '201110033@daiict.ac.in', '201110033'),
('201110035', 'Akshat Pandey', 105, 0, 'd', '72133129571', '9872135212', 2011, 'btech', '201110035@daiict.ac.in', '201110035'),
('201110038', 'Hardik Thakkar', 205, 1, 'd', '7824449571', '4423129571', 2011, 'mtech', '201110038@daiict.ac.in', '201110038'),
('201121014', 'MOHIT CHOUDHARY', 109, 1, 'a', '7878459946', '771231211', 2012, 'mtech', '201121014@daiict.ac.in', '201121014'),
('201121019', 'ABHINAV JAIN', 318, 2, 'a', '8460873755', '667126312', 2011, 'mtech', '201121019@daiict.ac.in', '201121019'),
('201121344', 'lucky singh', 320, 2, 'e', '1234567890', '5678901234', 2011, 'mscit', '201121344@daiict.ac.in', '201121344'),
('201122543', 'gani', 103, 0, 'k', '2147483647', '2742874', 2011, 'mtech', '201122543@daiict.ac.in', '201122543'),
('201201006', 'GANPAT MEENA', 115, 0, 'a', '2147483647', '2147483647', 2012, 'btech', '201201006@daiict.ac.in', '201201006'),
('201201030', 'CHANDRA PATEL', 112, 1, 'b', '77655436791', '778963123', 2012, 'BTECH', '201201030@daiict.ac.in', '201201030'),
('201201052', 'JAYESH HATHILA', 113, 1, 'b', '9727257331', '76782312', 2012, 'btech', '201201052@daiict.ac.in', '201201052'),
('201201054', 'PRATEEK AGRAWAL', 119, 1, 'b', '97272573378', '98712312461', 2012, 'btech', '201201054@daiict.ac.in', '201201054'),
('201201059', 'PANKAJ BOHRA', 318, 2, 'b', '4467123312', '44571231', 2012, 'btech', '201201059@daiict.ac.in', '201201059'),
('201201060', 'PALLO KUMAR', 218, 1, 'e', '31231241', '123124124', 2012, 'btech', '201201060@daiict.ac.in', '201201060'),
('201201061', 'SACHDEVA NITIN', 114, 0, 'e', '12312321314', '1123123', 2012, 'btech', '201201061@daiict.ac.in', '201201061'),
('201201068', 'JAY SMITH', 317, 2, 'e', '213123211', '9981231', 2012, 'btech', '201201068@daiict.ac.in', '201201068'),
('201201070', 'RUTIK JHALLO', 114, 0, 'f', '123123', '11231231', 2012, 'btech', '201201070@daiict.ac.in', '201201070'),
('201201073', 'KIMTA KALA', 217, 1, 'f', '66182831', '313123124', 2012, 'btech', '201201073@daiict.ac.in', '201201073'),
('201201125', 'Harsh Popat', 204, 1, 'c', '9876436212', '7872129571', 2012, 'btech', '201201125@daiict.ac.in', '201201125'),
('201201140', 'Akash Gupta', 304, 2, 'c', '9876995212', '7990129571', 2012, 'btech', '201201140@daiict.ac.in', '201201140'),
('201201160', 'Raman Desai', 204, 1, 'd', '9876435222', '97776435212', 2012, 'btech', '201201160@daiict.ac.in', '201201160'),
('201201176', 'RAMESHBHAI PATEL', 111, 0, 'b', '9879721312', '765213', 2012, 'btech', '201201176@daiict.ac.in', '201201176'),
('201201183', 'Gulshan Garg', 104, 0, 'd', '9876435555', '9923129571', 2012, 'btech', '201201183@daiict.ac.in', '201201183'),
('201201194', 'Sandeep Gupta', 304, 2, 'd', '2226435212', '3336435212', 2012, 'btech', '201201194@daiict.ac.in', '201201194'),
('201201211', 'happy', 220, 1, 'a', '888775544', '213123', 2012, 'btech', '201201211@daiict.ac.in', '201201211'),
('201201222', 'Prutha Patel', 104, 0, 'j', '7865559571', '7867129101', 2012, 'btech', '201201222@daiict.ac.in', '201201222'),
('201201230', 'harsha', 203, 1, 'j', '998804326', '187732', 2012, 'btech', '201001230@daiict.ac.in', '201201230'),
('201201234', 'Rohan Khan', 105, 0, 'c', '9876435217', '7823129571', 2012, 'btech', '201201234@daiict.ac.in', '201201234'),
('201210007', 'MANISH PAREGI', 203, 1, 'b', '7766554412', '763123123', 2012, 'msit', '201210007@daiict.ac.in', '201210007'),
('201210074', 'AYUSH RANA', 308, 2, 'f', '41123123', '4123132', 2012, 'mtech', '201210074@daiict.ac.in', '201210074'),
('201211008', 'JAYESH BAIRWA', 108, 0, 'a', '2147483647', '2147483647', 2012, 'msit', '201211008@daiict.ac.in', '201211008'),
('201211018', 'PATEL NIRMAL', 315, 2, 'a', '8141006510', '312391312', 2012, 'mdes', '201211018@daiict.ac.in', '201211018'),
('201211030', 'SAURABH SINGH', 313, 2, 'b', '8712312311', '667123123', 2012, 'msit', '201211030@daiict.ac.in', '201211030'),
('201211034', 'SURBHI AMIPARA', 313, 2, 'k', '88786923123', '67231231', 2012, 'msit', '201211034@daiict.ac.in', '201211034'),
('201211035', 'KAYNME SHUSHA', 313, 2, 'e', '3213214421', '1123131', 2012, 'msit', '201211035@daiict.ac.in', '201211035'),
('201211037', 'MANNU KAMATH', 212, 1, 'f', '2421312', '7784321', 2012, 'mdes', '201211037@daiict.ac.in', '201211037'),
('201221017', 'PANDYA BHARGAV', 310, 2, 'a', '7359477340', '33578812', 2012, 'phd', '201221017@daiict.ac.in', '201221017'),
('201221039', 'PALAVI SUMATHI', 111, 0, 'k', '98123123123', '445213123', 2012, 'phd', '201221039@daiict.ac.in', '201221039'),
('201221040', 'SUSHANT PRITMANI', 110, 1, 'b', '9173414878', '723123', 2012, 'phd', '201221040@daiict.ac.in', '201221040'),
('201221041', 'SAUABH PANDEY', 105, 0, 'f', '55712312', '11231231', 2012, 'phd', '201221041@daiict.ac.in', '201221041'),
('201221054', 'PIYUSH KAPOOR', 116, 0, 'b', '88678712312', '67213134', 2012, 'mtech', '201221054@daiict.ac.in', '201221054'),
('201221063', 'DHANESH SHUKLA', 211, 1, 'e', '14232414', '4124132', 2012, 'PHD', '201221063@daiict.ac.in', '201221063');

-- --------------------------------------------------------

--
-- Table structure for table `snail_mail`
--

CREATE TABLE IF NOT EXISTS `snail_mail` (
  `snail_mail_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `received_status` tinyint(1) NOT NULL DEFAULT '0',
  `id` char(30) DEFAULT NULL,
  `sentby` varchar(100) NOT NULL,
  PRIMARY KEY (`snail_mail_id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `snail_mail`
--

INSERT INTO `snail_mail` (`snail_mail_id`, `date`, `time`, `received_status`, `id`, `sentby`) VALUES
(1, '2013-04-08', '22:25:06', 0, '201001199', '.nik.'),
(2, '2013-04-09', '22:59:50', 0, '201101013', '.SPEEDPOST.'),
(3, '2013-04-09', '23:00:16', 0, '201101013', '.SPEEDPOST.'),
(4, '2013-04-09', '23:01:16', 0, '201101013', '.BALAJI COURIER	  .'),
(5, '2013-04-09', '23:01:27', 0, '201101013', '.DTDC	 .'),
(6, '2013-04-09', '23:03:09', 0, '201001015', '.MARUTI	  .'),
(7, '2013-04-09', '23:04:43', 0, '200901069', '.BALAJI COURIER	.'),
(8, '2013-04-09', '23:04:46', 0, '201001213', '.BALAJI COURIER	.'),
(9, '2013-04-09', '23:05:07', 0, '201101092', '.BALAJI COURIER	.'),
(10, '2013-04-09', '23:05:48', 0, '200901145', '.BLUE DART.'),
(11, '2013-04-09', '23:05:50', 0, '201201222', '.BLUE DART.'),
(12, '2013-04-09', '23:06:01', 0, '201101162', '.BLUE DART.'),
(13, '2013-04-09', '23:06:48', 0, '200901069', '.SPEEDPOST	.'),
(14, '2013-04-09', '23:06:50', 0, '201101066', '.SPEEDPOST	.'),
(15, '2013-04-09', '23:07:01', 0, '201201073', '.SPEEDPOST	.'),
(16, '2013-04-09', '23:07:57', 0, '201211035', '.FEDEX.'),
(17, '2013-04-09', '23:08:00', 0, '201101059', '.FEDEX.'),
(18, '2013-04-09', '23:08:03', 0, '201001067', '.FEDEX.'),
(19, '2013-04-09', '23:08:06', 0, '201001070', '.FEDEX.');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_2` FOREIGN KEY (`resident_id`) REFERENCES `residents` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`login_id`);

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_2` FOREIGN KEY (`id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_2` FOREIGN KEY (`login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor_visit`
--
ALTER TABLE `doctor_visit`
  ADD CONSTRAINT `doctor_visit_ibfk_1` FOREIGN KEY (`resident_id`) REFERENCES `residents` (`id`),
  ADD CONSTRAINT `doctor_visit_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`doctor_id`);

--
-- Constraints for table `gate_evening`
--
ALTER TABLE `gate_evening`
  ADD CONSTRAINT `gate_evening_ibfk_1` FOREIGN KEY (`resident_id`) REFERENCES `residents` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gate_laptop_entry`
--
ALTER TABLE `gate_laptop_entry`
  ADD CONSTRAINT `gate_laptop_entry_ibfk_1` FOREIGN KEY (`resident_id`) REFERENCES `residents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hmc`
--
ALTER TABLE `hmc`
  ADD CONSTRAINT `hmc_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`login_id`),
  ADD CONSTRAINT `hmc_ibfk_2` FOREIGN KEY (`id`) REFERENCES `residents` (`id`);

--
-- Constraints for table `laptop_registration`
--
ALTER TABLE `laptop_registration`
  ADD CONSTRAINT `laptop_registration_ibfk_1` FOREIGN KEY (`resident_id`) REFERENCES `residents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lost_found`
--
ALTER TABLE `lost_found`
  ADD CONSTRAINT `lost_found_ibfk_2` FOREIGN KEY (`id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `residents`
--
ALTER TABLE `residents`
  ADD CONSTRAINT `residents_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`login_id`),
  ADD CONSTRAINT `residents_ibfk_3` FOREIGN KEY (`login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `snail_mail`
--
ALTER TABLE `snail_mail`
  ADD CONSTRAINT `snail_mail_ibfk_2` FOREIGN KEY (`id`) REFERENCES `residents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
