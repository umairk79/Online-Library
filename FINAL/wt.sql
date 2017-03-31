-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2016 at 01:04 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wt`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `uname` varchar(25) DEFAULT NULL,
  `pword` varchar(25) DEFAULT NULL,
  `type1` char(1) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `fullname` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uname`, `pword`, `type1`, `email`, `contact`, `fullname`) VALUES
('roberto', '0', 'u', 'asdada@dass.com', '2131', 'sada haq'),
('roberto', '0', 'u', 'asdada@dass.com', '12313131', 'adad'),
('sasf555', '0', 'u', 'sayyed.fahim.79@facebook.com', '88552244', 'adadaada'),
('aditya96', 'asdfg', 'u', 'adityakuchekar@gmail.com', '8743518418', 'Aditya Kuchekar'),
('paul', 'scholes', 'u', 'khanumair.79@gmail.com', '4234242', 'Umair Khan'),
('khan', 'umair', 'u', 'sayyed.fahim.79@facebook.com', '41232344', 'awd aw dsdsad'),
('asdad', '0', 'u', 'sayyed.fahim.79@facebook.com', '261371', 'kuagsdad'),
('umair', 'khan', 'u', 'sparadityakuchekar@gmail.com', '387242', 'sdaaad');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
