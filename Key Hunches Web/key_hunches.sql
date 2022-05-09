-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 28, 2022 at 04:18 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `key_hunches`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_t`
--

DROP TABLE IF EXISTS `contact_t`;
CREATE TABLE IF NOT EXISTS `contact_t` (
  `cnt_ID` int(11) NOT NULL AUTO_INCREMENT,
  `cnt_Name` varchar(255) NOT NULL,
  `cnt_Email` varchar(255) NOT NULL,
  `cnt_Message` text NOT NULL,
  `cnt_fbdatetime` datetime NOT NULL,
  PRIMARY KEY (`cnt_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `malware_t`
--

DROP TABLE IF EXISTS `malware_t`;
CREATE TABLE IF NOT EXISTS `malware_t` (
  `malware_ID` int(11) NOT NULL AUTO_INCREMENT,
  `malware_Name` varchar(255) NOT NULL,
  `malware_Synopsis` varchar(255) NOT NULL,
  `malware_Price` varchar(255) NOT NULL,
  `photo_path` text NOT NULL,
  PRIMARY KEY (`malware_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `malware_t`
--

INSERT INTO `malware_t` (`malware_ID`, `malware_Name`, `malware_Synopsis`, `malware_Price`, `photo_path`) VALUES
(3, 'AutoSave Data Keylogger', 'This particular malware saves the collected data in the targeted victims computer by creating a file on its own.', '80', 'uploads/KeyloggerT2.jpg'),
(2, 'Sent Email Keylogger Malware', 'This particular malware, will collect all the following keystrokes and send it to the attackers email directly.', '100 GBP', 'uploads/keylogger.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mbcontact_t`
--

DROP TABLE IF EXISTS `mbcontact_t`;
CREATE TABLE IF NOT EXISTS `mbcontact_t` (
  `mbcnt_ID` int(11) NOT NULL AUTO_INCREMENT,
  `mbcnt_Name` varchar(255) NOT NULL,
  `mbcnt_Email` varchar(255) NOT NULL,
  `mbcnt_Message` text NOT NULL,
  `mbcnt_Fbdatetime` datetime NOT NULL,
  `user_ID` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`mbcnt_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;




-- --------------------------------------------------------

--
-- Table structure for table `purchase_t`
--

DROP TABLE IF EXISTS `purchase_t`;
CREATE TABLE IF NOT EXISTS `purchase_t` (
  `purchase_ID` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_Date` date NOT NULL,
  `user_ID` varchar(11) DEFAULT NULL,
  `malware_ID` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`purchase_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_t`
--

INSERT INTO `purchase_t` (`purchase_ID`, `purchase_Date`, `user_ID`, `malware_ID`) VALUES
(1, '2022-03-29', '2', '2'),
(2, '2022-03-29', '2', '2'),
(4, '2022-04-02', '5', '2'),
(5, '2022-04-02', '4', '3'),
(6, '2022-04-21', '2', '3');

-- --------------------------------------------------------

--
-- Table structure for table `users_t`
--

DROP TABLE IF EXISTS `users_t`;
CREATE TABLE IF NOT EXISTS `users_t` (
  `user_ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_Name` varchar(255) NOT NULL,
  `user_Password` varchar(50) NOT NULL,
  `user_Email` varchar(255) NOT NULL,
  `user_Role` int(11) NOT NULL,
  `user_Last_Login` datetime NOT NULL,
  PRIMARY KEY (`user_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
