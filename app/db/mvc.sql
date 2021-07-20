-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Структура на таблица `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_type` enum('web','desktop') NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Схема на данните от таблица `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_type`) VALUES
(1, 'windows 98', 'desktop'),
(2, 'my web page', 'web'),
(3, 'some other web page', 'web'),
(4, 'warcraft III', 'desktop'),
(5, 'www.abv.bg', 'web'),
(6, 'mvc', 'web');

-- --------------------------------------------------------

--
-- Структура на таблица `products_complains`
--

CREATE TABLE IF NOT EXISTS `products_complains` (
  `complain_id` int(11) NOT NULL AUTO_INCREMENT,
  `complain_desc` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_version` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `date_fixed` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `fixed_by` int(11) DEFAULT NULL,
  `status` enum('unreaded','readed','unfounded','fixed') NOT NULL,
  PRIMARY KEY (`complain_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Схема на данните от таблица `products_complains`
--

INSERT INTO `products_complains` (`complain_id`, `complain_desc`, `product_id`, `product_version`, `date_added`, `date_fixed`, `added_by`, `fixed_by`, `status`) VALUES
(1, 'this shit is shit', 1, '99', '2012-06-18 02:39:31', '2012-06-18 05:24:19', 7, 1, 'fixed'),
(2, 'very cool game', 4, '1.24', '2012-06-18 02:39:31', '2012-06-18 04:32:38', 7, 2, 'fixed'),
(3, 'this sucks', 1, '2000', '2012-06-18 02:58:35', '2012-06-18 04:32:40', 7, 2, 'fixed'),
(4, 'fuck it', 1, '95', '2012-06-18 03:10:37', '2012-06-18 04:32:41', 2, 2, 'fixed'),
(5, 'waaaaa', 1, '6', '2012-06-18 04:52:31', '2012-06-18 05:19:03', 1, 1, 'fixed'),
(6, 'waaaaa', 1, '6', '2012-06-18 04:52:47', '0000-00-00 00:00:00', 1, NULL, 'unreaded'),
(7, 'waaaaa', 1, '6', '2012-06-18 04:55:02', '0000-00-00 00:00:00', 1, NULL, 'unreaded'),
(8, 'waaaaa', 1, '6', '2012-06-18 04:56:04', '0000-00-00 00:00:00', 1, NULL, 'unreaded'),
(9, 'waaaaa', 1, '6', '2012-06-18 04:56:18', '2012-06-18 06:11:07', 1, 2, 'fixed'),
(10, 'fuck it', 1, '1', '2012-06-18 04:58:29', '0000-00-00 00:00:00', 1, NULL, 'unreaded'),
(11, 'sasasasa', 1, '2000', '2012-06-18 05:17:09', '0000-00-00 00:00:00', 1, NULL, 'unreaded'),
(12, 'sasasasa', 1, '2000', '2012-06-18 05:17:31', '2012-06-18 06:11:20', 1, 2, 'fixed'),
(13, 'sasasasa', 1, '2000', '2012-06-18 05:18:02', '0000-00-00 00:00:00', 1, NULL, 'unreaded'),
(14, 'sdsadas', 1, '34', '2012-06-18 06:10:50', '0000-00-00 00:00:00', 2, NULL, 'unreaded'),
(18, 'NEW NEW NEW', 1, 'NEW', '2015-01-26 04:01:41', '0000-00-00 00:00:00', 7, NULL, 'readed'),
(19, 'NEW2', 1, 'NEW2', '2015-01-26 04:08:44', '2015-01-29 19:38:38', 7, 2, 'fixed');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_plane` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `role` enum('user','developer','admin') NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `password_plane`, `email`, `phone`, `role`) VALUES
(1, 'Tania', '', '1', '', '', 'admin'),
(2, 'Daniel', '', '1', '', '', 'developer'),
(3, 'user', '', '', '', '', 'user'),
(8, 'DanielVonCalabrese', '', '1', 'alexisonfire@abv.bg', '', 'user'),
(7, 'dido', '', '1', 'dido@dido.com', '', 'user'),
(9, 'didodi', '', '1', 'alexisonfire@abv.bg1', '1', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
