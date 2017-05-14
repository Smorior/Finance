-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql202.epizy.com
-- Generation Time: May 14, 2017 at 06:45 PM
-- Server version: 5.6.35-81.0
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `epiz_19828078_pset7`
--

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `id` int(10) unsigned NOT NULL,
  `status` varchar(255) NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `shares` int(10) unsigned NOT NULL,
  `price` float unsigned DEFAULT NULL,
  `tmp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `status`, `symbol`, `shares`, `price`, `tmp`) VALUES
(30, 'BUY', 'GOOG', 10, 827.88, '2017-04-06 20:24:36'),
(30, 'BUY', 'GOOG', 50, 827.88, '2017-04-06 20:22:04'),
(30, 'BUY', 'AAPL', 1, 143.66, '2017-04-06 20:16:33'),
(30, 'BUY', 'GOOG', 1, 827.88, '2017-04-06 20:06:45'),
(32, 'SELL', 'YHOO', 10, 46.38, '2017-04-05 23:34:13'),
(32, 'BUY', 'AAPL', 1, 144.02, '2017-04-05 23:34:01'),
(32, 'BUY', 'AAPL', 1, 144.02, '2017-04-05 23:33:50'),
(32, 'BUY', 'FB', 1, 141.85, '2017-04-05 23:33:43'),
(32, 'BUY', 'YHOO', 10, 46.38, '2017-04-05 23:33:32'),
(30, 'BUY', 'GOOG', 10, 827.88, '2017-04-06 20:25:20'),
(30, 'BUY', 'GOOG', 10, 827.88, '2017-04-06 20:27:41'),
(35, 'BUY', 'GOOG', 10, 827.88, '2017-04-06 21:48:55'),
(30, 'SELL', 'goog', 81, 827.88, '2017-04-07 06:04:08'),
(30, 'BUY', 'YHOO', 50, 46.44, '2017-04-08 00:33:30'),
(30, 'SELL', 'AAPL', 12, 143.34, '2017-04-08 09:00:51'),
(39, 'BUY', 'AAPL', 10, 143.34, '2017-04-08 15:07:52'),
(39, 'SELL', 'Aapl', 10, 143.34, '2017-04-08 15:08:26'),
(40, 'BUY', 'AAPL', 10, 143.34, '2017-04-09 20:21:20'),
(40, 'SELL', 'Aapl', 10, 143.34, '2017-04-09 20:21:47'),
(41, 'BUY', 'AMZN', 5, 894.88, '2017-04-09 20:49:04'),
(41, 'BUY', 'BABA', 50, 108.99, '2017-04-09 20:50:45'),
(40, 'BUY', 'WMT', 100, 72.9, '2017-04-10 07:33:26'),
(41, 'SELL', 'baba', 50, 111.67, '2017-04-10 15:34:50'),
(41, 'SELL', 'amzn', 5, 907.17, '2017-04-10 15:35:05'),
(41, 'BUY', 'RTN', 67, 151.54, '2017-04-10 15:36:57'),
(30, 'BUY', 'AAPL', 1, 141.05, '2017-04-15 00:14:37'),
(45, 'BUY', 'GOOG', 5, 823.56, '2017-04-15 15:02:42'),
(45, 'SELL', 'Goog', 5, 823.56, '2017-04-15 15:03:32'),
(30, 'BUY', 'SHLX', 5, 32.3, '2017-04-16 12:49:01'),
(41, 'SELL', 'rtn', 67, 152.88, '2017-04-20 10:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
  `id` int(10) unsigned NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `shares` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`symbol`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `symbol`, `shares`) VALUES
(30, 'YHOO', 50),
(32, 'FB', 1),
(32, 'AAPL', 2),
(35, 'GOOG', 10),
(30, 'AAPL', 1),
(40, 'WMT', 100),
(30, 'SHLX', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `cash` decimal(65,4) unsigned NOT NULL DEFAULT '0.0000',
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `hash`, `cash`, `email`) VALUES
(1, 'andi', '$2y$10$c.e4DK7pVyLT.stmHxgAleWq4yViMmkwKz3x8XCo4b/u3r8g5OTnS', '0.0000', ''),
(2, 'caesar', '$2y$10$0p2dlmu6HnhzEMf9UaUIfuaQP7tFVDMxgFcVs0irhGqhOxt6hJFaa', '0.0000', ''),
(3, 'eli', '$2y$10$COO6EnTVrCPCEddZyWeEJeH9qPCwPkCS0jJpusNiru.XpRN6Jf7HW', '0.0000', ''),
(4, 'hdan', '$2y$10$o9a4ZoHqVkVHSno6j.k34.wC.qzgeQTBHiwa3rpnLq7j2PlPJHo1G', '0.0000', ''),
(5, 'jason', '$2y$10$ci2zwcWLJmSSqyhCnHKUF.AjoysFMvlIb1w4zfmCS7/WaOrmBnLNe', '0.0000', ''),
(6, 'john', '$2y$10$dy.LVhWgoxIQHAgfCStWietGdJCPjnNrxKNRs5twGcMrQvAPPIxSy', '0.0000', ''),
(7, 'levatich', '$2y$10$fBfk7L/QFiplffZdo6etM.096pt4Oyz2imLSp5s8HUAykdLXaz6MK', '0.0000', ''),
(8, 'rob', '$2y$10$3pRWcBbGdAdzdDiVVybKSeFq6C50g80zyPRAxcsh2t5UnwAkG.I.2', '0.0000', ''),
(9, 'skroob', '$2y$10$395b7wODm.o2N7W5UZSXXuXwrC0OtFB17w4VjPnCIn/nvv9e4XUQK', '0.0000', ''),
(10, 'zamyla', '$2y$10$UOaRF0LGOaeHG4oaEkfO4O7vfI34B1W23WqHr9zCpXL68hfQsS3/e', '1000.0000', ''),
(32, 'Milena', '$1$MYChP2RX$t69mif6U6iXzlXHuazDkG1', '3355.0000', ''),
(30, 'zeljko', '$1$59MEijoW$eLwu7WDSlWmbmwZp6utAT0', '67875.0100', ''),
(44, 'vladica', '$1$WxeOH3gU$j98gdFL/tkWlBq3U80nR..', '10000.0000', 'vladica.aleksic84@gmail.com'),
(39, 'gandalf', '$1$RuV4Asb.$o8.b/FRC2ip4U.pbYDt851', '10000.0000', 'Slavko.vidakovic@netplanet.rs'),
(40, 'Djuradj', '$1$OVC7Chn0$0Oq0MjX22nZ0H/VgkYkBt.', '2710.0000', 'djuradj@gmail.com'),
(41, 'milos', '$1$.HDxXy8m$E2K42cT9dnnyBFI4T7E9d/', '10285.2300', 'miloscolakovic@gmail.com'),
(45, 'Rasskot', '$1$LgjAg33h$h70ccZEntMGc7KDhaOXo01', '10000.0000', 'rasskot@yahoo.co.uk');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
