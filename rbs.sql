-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2016 at 07:22 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobilenumber` bigint(11) NOT NULL,
  `principal` double NOT NULL,
  `interest` decimal(10,0) NOT NULL,
  `bday` date NOT NULL,
  `createddate` date NOT NULL,
  `acno` int(11) DEFAULT NULL,
  `deleteable` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`firstname`, `lastname`, `email`, `mobilenumber`, `principal`, `interest`, `bday`, `createddate`, `acno`, `deleteable`) VALUES
('GREGORY', 'VARGHESE', 'smallstar1234@gmail.com', 2147483647, 300, '11', '1993-11-12', '2016-03-21', 495954634, 0),
('ATUL', 'KUMAR', 'punk@gmail.com', 9280294927, 399, '11', '1331-01-12', '2016-03-21', 467671648, 0),
('', '', '', 0, 301, '12', '0000-00-00', '2016-03-28', 958884655, 0),
('GREG', 'VARG', 'thewinger94@gmail.com', 8280294927, 400, '11', '1996-10-12', '2016-03-28', 1504114713, 0);

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE IF NOT EXISTS `loans` (
  `accountnumber` bigint(20) NOT NULL,
  `principal` bigint(20) NOT NULL,
  `interest` decimal(10,0) NOT NULL,
  `duedate` date NOT NULL,
  `createddate` date NOT NULL,
  `deleteable` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`accountnumber`, `principal`, `interest`, `duedate`, `createddate`, `deleteable`) VALUES
(0, 300, '12', '0000-00-00', '2016-03-28', 0),
(0, 300, '12', '0000-00-00', '2016-03-28', 0),
(123453, 400, '12', '2016-03-31', '2016-03-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `NAME` varchar(30) NOT NULL,
  `EMAIL` varchar(256) NOT NULL,
  `PASSWORD` varchar(256) NOT NULL,
  `TYPE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`NAME`, `EMAIL`, `PASSWORD`, `TYPE`) VALUES
('Gregory', '1@1.com', 'c4ca4238a0b923820dcc509a6f75849b', 1),
('Varghese', '2@2.com', 'c81e728d9d4c2f636f067f89cc14862c', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`EMAIL`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
