-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 17, 2016 at 11:25 AM
-- Server version: 5.5.49-cll-lve
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phplicence`
--

-- --------------------------------------------------------

--
-- Table structure for table `licences`
--

CREATE TABLE IF NOT EXISTS `licences` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `projectid` int(255) NOT NULL,
  `serverip` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `licencekey` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `dateissued` varchar(255) NOT NULL,
  `expirationdate` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `licences`
--

INSERT INTO `licences` (`id`, `projectid`, `serverip`, `website`, `licencekey`, `status`, `dateissued`, `expirationdate`, `username`) VALUES
(13, 16, '104.25.40.17', 'powerbot.org', 'OWNED-f100b51fc7c78a2b744172ebd4c99fe4', '1', '08/03/16', '00/09/09', 'TheSocomj'),
(12, 16, '107.180.26.90', 'outragehost.com', 'OWNED-e4536428eb53ef844a8bc0adecd4d4ac', '1', '08/03/16', '00/00/09', 'TheSocomj');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `secret_key` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `secret_key`, `username`, `name`) VALUES
(16, '2f6cfcc63040f522da33932849e013a9', 'TheSocomj', 'OutrageHost'),
(15, 'e77240602f3834aa80ab9ebcf2d25a42', 'TheSocomj', 'rGuard');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `rank` int(11) NOT NULL DEFAULT '0',
  `ip` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=39 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `username`, `password`, `email`, `rank`, `ip`, `date`) VALUES
(37, 'afc8f95ad8e45da0062800771c268978', '--', '--', '--', 5, '--', '2016-07-11'),
(38, 'ef774c9f186de5919b0e5fc47acf0cfc', '--', '--', '--', 1, '--', '2016-07-15');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
