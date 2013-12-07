-- phpMyAdmin SQL Dump
-- version 4.0.5deb1.precise~ppa.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 07, 2013 at 11:22 PM
-- Server version: 5.6.14-1+debphp.org~precise+1
-- PHP Version: 5.5.4-1+debphp.org~precise+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `umbc`
--

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE IF NOT EXISTS `sell` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isbn` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `edition` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `condition` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=119 ;

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `failed_logins` int(11) DEFAULT '0',
  `last_attempt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `last_ip` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
