-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 11, 2014 at 08:23 PM
-- Server version: 5.5.35
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `section_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `order`, `title`, `text`, `type`, `section_id`) VALUES
(1, 1, '<span class="Article-Title">Talented</span>        ', '\n        <p class="Article-Text">\n        \n        \n        \n        \n        \n                \n        \n        \n        \n         \n        \n        \n                             \n                            Fact: Some People are just plan good at what they do. And we are!                                                                              </p>    ', 'article', 2),

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order` int(11) NOT NULL,
  `columns` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `order`, `columns`, `title`, `image`) VALUES
(2, 2, 3, '<span class="Section-Title">About Us</span>            ', ''),
(3, 3, 1, '<span class="Section-Title">Service Locations</span>', ''),
(4, 4, 2, '<span class="Section-Title">Contact Us</span>            ', ''),
(1, 1, 1, ' <span class="Section-Title">Home</span>            ', '');

-- --------------------------------------------------------

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
