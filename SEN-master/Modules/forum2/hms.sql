-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 16, 2013 at 05:00 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hms`
--

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
  `post` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`forum_id`, `subject`, `date`, `time`, `name`, `post`) VALUES
(1, 'mk', '2013-03-16', '13:53:00', 'm', 'm, b'),
(2, 'mkk', '2013-03-16', '13:53:00', 'mmn', 'm, bmn '),
(3, 'k', '2013-03-16', '16:55:00', 'kjhj', 'hkhkuli'),
(4, 'k.nb;lvligl;t', '2013-03-16', '16:55:00', 'bbuv;ol/icy', 'luivtlidrl6ugph');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
