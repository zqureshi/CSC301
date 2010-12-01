-- phpMyAdmin SQL Dump
-- version 2.11.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 01, 2010 at 02:58 AM
-- Server version: 5.0.90
-- PHP Version: 5.2.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aafjj9f2_booking_tool`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `Date` date NOT NULL default '0000-00-00',
  `tID` int(11) NOT NULL default '0',
  `rID` int(11) NOT NULL default '0',
  `id` int(11) NOT NULL,
  `course` varchar(15) collate utf8_unicode_ci NOT NULL,
  `confirmation` varchar(50) collate utf8_unicode_ci NOT NULL,
  `note` varchar(100) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`Date`,`tID`,`rID`),
  KEY `id` (`id`),
  KEY `rid` (`rID`),
  KEY `tid` (`tID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) collate utf8_unicode_ci NOT NULL default '0',
  `ip_address` varchar(16) collate utf8_unicode_ci NOT NULL default '0',
  `user_agent` varchar(50) collate utf8_unicode_ci NOT NULL,
  `last_activity` int(10) unsigned NOT NULL default '0',
  `user_data` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Recovery`
--

CREATE TABLE IF NOT EXISTS `Recovery` (
  `id` varchar(40) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY  (`id`,`user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `rID` int(11) NOT NULL auto_increment,
  `name` varchar(50) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`rID`)
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

CREATE TABLE IF NOT EXISTS `time` (
  `tID` int(11) NOT NULL auto_increment,
  `name` varchar(50) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`tID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

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

CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(11) NOT NULL auto_increment,
  `admin` tinyint(4) NOT NULL default '0',
  `first_name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `email` varchar(50) collate utf8_unicode_ci NOT NULL,
  `password` text collate utf8_unicode_ci NOT NULL,
  `username` varchar(50) collate utf8_unicode_ci NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `admin`, `first_name`, `last_name`, `email`, `password`, `username`) VALUES
(1, 1, 'Labook', 'Admin', 'labook@example.net', '3f1efe82963c4ef101869065556135e032d95a33', 'Admin'),
(2, 0, 'Demo', 'User', 'demo@example.net', '89e495e7941cf9e40e6980d14a16bf023ccd4c91', 'demo');

-- --------------------------------------------------------

--
-- Table structure for table `variables`
--

CREATE TABLE IF NOT EXISTS `variables` (
  `name` varchar(20) NOT NULL,
  `value` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variables`
--

INSERT INTO `variables` (`name`, `value`) VALUES
('maxBookings', '1'),
('limitDate', '2010-12-31');
