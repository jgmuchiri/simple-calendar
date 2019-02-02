-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 25, 2016 at 09:02 PM
-- Server version: 5.6.27-0ubuntu1
-- PHP Version: 5.6.11-1ubuntu3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql_nicecalendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE IF NOT EXISTS `calendar` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `start` date NOT NULL,
  `start_t` time NOT NULL,
  `end` date DEFAULT NULL,
  `end_t` time NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `allDay` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT 'false'
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `title`, `start`, `start_t`, `end`, `end_t`, `description`, `allDay`) VALUES
(51, 'hello hhe', '0000-00-00', '00:00:00', '0000-00-00', '00:00:00', 'tes', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `help_articles`
--

CREATE TABLE IF NOT EXISTS `help_articles` (
  `id` int(10) NOT NULL,
  `order` int(5) NOT NULL,
  `article_name` varchar(50) NOT NULL,
  `article_body` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `help_articles`
--

INSERT INTO `help_articles` (`id`, `order`, `article_name`, `article_body`) VALUES
(8, 0, 'Overview', 'iCoolCal is a customizable php/mysql calendar that utilizes CodeIgniter framework and Arshaw''s Fullcalendar plugin.&nbsp;<div><br></div>'),
(9, 0, 'Installation', 'To install iCoolCal, follow the following steps:<div><span ><br></span></div><div><span >Copy the files into the root of your existing CodeIgniter installation. Make sure you don''t have existing files with similar names.</span><div><div><ul><li>/application/controllers</li><li>/application/models</li><li>/application/views</li><li>/assets</li></ul><div>Edit the following files</div><ul><li>/application/config/config.php</li><li>/application/config/routes.php</li><li>/application/config/database.php</li></ul><div>install database with schema in the root folder (sql_calendar.sql)</div></div></div></div>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `help_articles`
--
ALTER TABLE `help_articles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `help_articles`
--
ALTER TABLE `help_articles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
