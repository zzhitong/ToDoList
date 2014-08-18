-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2014 at 12:41 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mytask`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(32) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Name` (`Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `Name`, `updated_at`, `created_at`) VALUES
(1, 'New', '2014-08-15 16:13:07', '2014-08-15 16:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbltodotasks`
--

CREATE TABLE IF NOT EXISTS `tbltodotasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Author` varchar(37) NOT NULL,
  `CategoryId` int(11) NOT NULL DEFAULT '1',
  `Title` varchar(37) NOT NULL,
  `Description` varchar(520) DEFAULT NULL,
  `DueDate` date NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_PerToDoTask` (`CategoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbltodotasks`
--

INSERT INTO `tbltodotasks` (`id`, `Author`, `CategoryId`, `Title`, `Description`, `DueDate`, `updated_at`, `created_at`) VALUES
(8, 'zzhitong', 1, 'task3', 'tyrtgnfg fgggfhfhfgh', '2014-08-29', '2014-08-16 22:38:20', '2014-08-15 06:56:34'),
(10, 'zzhao', 1, 'task37', 'ghfhbvvbnvbnvn\r\n,n,nm,nm,n', '2014-08-28', '2014-08-15 16:26:53', '2014-08-15 16:26:53');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbltodotasks`
--
ALTER TABLE `tbltodotasks`
  ADD CONSTRAINT `fk_PerToDoTask` FOREIGN KEY (`CategoryId`) REFERENCES `categories` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
