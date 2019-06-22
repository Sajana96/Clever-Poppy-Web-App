-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 22, 2019 at 03:05 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cleverpoppy`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `code` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `unitprice` double NOT NULL,
  `quantity` int(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  `dateAdded` datetime DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`code`, `name`, `unitprice`, `quantity`, `image`, `dateAdded`) VALUES
('p001', 'Item1', 700, 3, 'images.jpg', NULL),
('p002', 'Item2', 340, 10, 'images.jpg', NULL),
('p003', 'Item3', 680, 5, 'images.jpg', NULL),
('p004', 'Item45', 840, 8, 'download.jpg', NULL),
('p005', 'Item5', 1000, 6, 'download.jpg', NULL),
('p006', 'Item6', 1580, 10, 'makeup-1-700x400.jpg', NULL),
('p007', 'Item7', 690, 3, 'makeup-1-700x400.jpg', NULL),
('p008', 'Item8', 1650, 5, 'download.jpg', NULL),
('p009', 'Item9', 1300, 4, 'download.jpg', NULL),
('p0010', 'Item10', 870, 9, 'images.jpg', '2019-06-22 20:26:35');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`username`, `password`, `name`) VALUES
('sajana96', '123456', 'Sajana'),
('malmi96', '123', 'Malmi');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
