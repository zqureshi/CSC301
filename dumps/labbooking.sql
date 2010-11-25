-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 25, 2010 at 11:29 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT=0;
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `labbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `Date` date NOT NULL DEFAULT '0000-00-00',
  `tID` int(11) NOT NULL DEFAULT '0',
  `rID` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL,
  `course` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Date`,`tID`,`rID`),
  KEY `id` (`id`),
  KEY `rid` (`rID`),
  KEY `tid` (`tID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`Date`, `tID`, `rID`, `id`, `course`, `confirmation`, `note`) VALUES
('2010-11-19', 1, 1, 1, 'CSC301', '220000', 'Tutorial'),
('2010-11-19', 1, 2, 1, 'CSC343', '220000', 'Assignment'),
('2010-11-19', 2, 1, 1, 'CSC373', '220000', 'Tutorial'),
('2010-11-19', 4, 1, 2, 'csc100', '220000', 'Hello'),
('2010-11-19', 3, 1, 2, 'AMD interview', '220000', 'Good Luck'),
('2010-11-19', 5, 1, 2, 'AMD interview', '220000', 'AGAIN'),
('2010-11-19', 2, 2, 2, 'CSC336', '220000', 'Assignment'),
('2010-11-08', 1, 1, 4, 'CSC343H1', '220000', 'ZZZ'),
('2010-11-08', 2, 1, 4, 'CSC301H1', '220000', 'sadfdasf'),
('2010-11-26', 1, 1, 2, 'CSC301', '220000', 'TEST'),
('2010-11-27', 2, 2, 2, 'Test', '220000', 'Test'),
('2011-05-25', 2, 4, 2, 'Test', '220000', ''),
('2010-11-09', 1, 1, 4, 'CSC301H1', '220000', 'ZET'),
('2010-11-30', 3, 1, 2, 'Test', '220000', ''),
('2010-11-30', 2, 3, 1, 'CSC324', '220000', 'blablabla'),
('2010-11-16', 2, 2, 1, 'blabla', '220000', 'blalba'),
('2010-11-15', 1, 1, 1, 'boom', '220000', 'boom');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('ec96efd19f9524f7d6429e4a0ee9755c', '0.0.0.0', 'Mozilla/5.0 (X11; U; Linux i686; en-US) AppleWebKi', 1290679408, 'a:1:{s:2:"id";s:2:"12";}'),
('bef9b7b41d3eb704c776aa3e1bc01148', '0.0.0.0', 'Mozilla/5.0 (X11; Linux i686; rv:2.0b7) Gecko/2010', 1290679476, 'a:1:{s:2:"id";s:1:"1";}');

-- --------------------------------------------------------

--
-- Table structure for table `Recovery`
--

DROP TABLE IF EXISTS `Recovery`;
CREATE TABLE IF NOT EXISTS `Recovery` (
  `id` varchar(40) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id`,`user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Recovery`
--

INSERT INTO `Recovery` (`id`, `user`) VALUES
('e132bf7daccc4184dda25b1abba33ca4071c9129', 16);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `rID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`rID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`rID`, `name`) VALUES
(1, 'library'),
(2, 'laptop_cart'),
(3, 'tech_75'),
(4, 'tech_85'),
(5, 'business_218'),
(6, 'business_271'),
(7, 'cs_224'),
(8, 'ce_226');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

DROP TABLE IF EXISTS `time`;
CREATE TABLE IF NOT EXISTS `time` (
  `tID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`tID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`tID`, `name`) VALUES
(1, '08:45-10:00'),
(2, '10:05-11:20'),
(3, '11:25-12:40'),
(4, '12:45-14:00'),
(5, '14:05-15:20');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` tinyint(4) NOT NULL DEFAULT '0',
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `admin`, `first_name`, `last_name`, `email`, `password`, `username`) VALUES
(1, 1, 'Zeeshan', 'Qureshi', 'zeeshan.quireshi@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'zeeshanq'),
(2, 1, 'Michael', 'Ing', 'mikeing2001@gmail.com', 'c286f4abd2207c691a86a6870e103fdd52cd11be', 'mikeing2001'),
(6, 1, 'Sean', 'Sutherland', 't0suther@cdf.toronto.edu', '34da1369d029a253a7586a8b582100180bba6441', 't0suther'),
(12, 0, 'Demo', 'User', 'noreply@nodomain.net', '89e495e7941cf9e40e6980d14a16bf023ccd4c91', 'demo'),
(11, 0, 'Test', 'User', 'test@testdomain.test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test');
COMMIT;
