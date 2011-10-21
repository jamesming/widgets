-- phpMyAdmin SQL Dump
-- version 2.11.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 11, 2011 at 02:01 PM
-- Server version: 5.0.77
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mynuvotv_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `carousel_items`
--

CREATE TABLE IF NOT EXISTS `carousel_items` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `created` datetime default NULL,
  `updated` datetime NOT NULL,
  `page_link` varchar(255) default NULL,
  `name` varchar(255) default NULL,
  `video_link` varchar(255) default NULL,
  `facebook_link` varchar(255) default NULL,
  `launch` int(1) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=133 ;

--
-- Dumping data for table `carousel_items`
--

INSERT INTO `carousel_items` (`id`, `created`, `updated`, `page_link`, `name`, `video_link`, `facebook_link`, `launch`) VALUES
(110, '2011-10-04 17:01:34', '2011-10-07 10:51:09', 'http://www.mynuvotv.com/series/dark-angel', 'Dark Angel - Tonight', NULL, NULL, NULL),
(109, '2011-10-04 06:10:42', '2011-10-07 10:48:24', 'http://www.mynuvotv.com/model-latina-las-vegas/', 'Model Latinas Vegas - 2 Hour Premiere Event', NULL, NULL, NULL),
(106, '2011-10-04 04:56:55', '2011-10-07 10:50:33', 'http://www.mynuvotv.com/operation-osmin/', 'Osmin', '', '', 1),
(112, '2011-10-04 17:54:51', '2011-10-07 09:10:08', 'http://stage.mynuvotv.com/series/cristinas-court', 'Cristinas Court', NULL, NULL, NULL),
(120, '2011-10-07 09:01:02', '2011-10-07 09:03:33', 'http://www.mynuvotv.com/series/mission-menu', 'Mission Menu Premiere', NULL, NULL, NULL),
(121, '2011-10-07 09:03:40', '2011-10-07 09:04:35', 'http://www.mynuvotv.com/series/nypd-blue', 'Battle of the Blues', NULL, NULL, NULL),
(123, '2011-10-07 09:05:05', '2011-10-07 09:06:00', 'http://bcove.me/aghfhah0', 'Factinos v2', NULL, NULL, NULL),
(124, '2011-10-07 15:05:46', '2011-10-10 18:47:14', 'http://bcove.me/d5yusb8s', 'Factino 10/11', NULL, NULL, NULL),
(125, '2011-10-07 15:08:21', '2011-10-08 07:13:32', 'http://www.mynuvotv.com/model-latina-las-vegas/', 'Model Latina 410', NULL, NULL, NULL),
(126, '2011-10-07 15:14:32', '2011-10-07 15:16:16', 'http://www.mynuvotv.com/series/miami-ink', 'Miami Ink Weeknights', NULL, NULL, NULL),
(127, '2011-10-07 17:33:25', '2011-10-07 17:34:12', 'http://www.mynuvotv.com/movies', '48 Hrs', NULL, NULL, NULL),
(128, '2011-10-07 17:34:20', '2011-10-07 17:34:53', 'http://www.mynuvotv.com/movies', 'El Cantante', NULL, NULL, NULL),
(129, '2011-10-07 17:38:30', '2011-10-07 17:42:05', 'http://www.mynuvotv.com/operation-osmin/', 'Operation Osmin Friday', NULL, NULL, NULL),
(132, '2011-10-10 15:24:35', '2011-10-11 12:23:27', 'http://www.mynuvotv.com/series/adrenalina', 'Adrenalina', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carousel_items_images`
--

CREATE TABLE IF NOT EXISTS `carousel_items_images` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `created` datetime default NULL,
  `updated` datetime default NULL,
  `carousel_item_id` int(11) default NULL,
  `image_type_id` int(11) default NULL,
  `image_type` varchar(255) default NULL,
  `top` int(11) default NULL,
  `left` int(11) default NULL,
  `type` varchar(255) default NULL,
  `width` int(11) default NULL,
  `height` int(11) default NULL,
  `facebook_top` int(11) default NULL,
  `facebook_left` int(11) default NULL,
  `facebook_width` int(11) default NULL,
  `facebook_height` int(11) default NULL,
  `video_top` int(11) default NULL,
  `video_left` int(11) default NULL,
  `video_width` int(11) default NULL,
  `video_height` int(11) default NULL,
  `facebook_link` varchar(255) default NULL,
  `video_link` varchar(255) default NULL,
  PRIMARY KEY  (`id`),
  KEY `carousel_item_id` (`carousel_item_id`),
  KEY `image_type_id` (`image_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `carousel_items_images`
--

INSERT INTO `carousel_items_images` (`id`, `created`, `updated`, `carousel_item_id`, `image_type_id`, `image_type`, `top`, `left`, `type`, `width`, `height`, `facebook_top`, `facebook_left`, `facebook_width`, `facebook_height`, `video_top`, `video_left`, `video_width`, `video_height`, `facebook_link`, `video_link`) VALUES
(32, '2011-10-06 12:47:23', '2011-10-06 13:29:15', 116, 3, 'tune_in', NULL, NULL, NULL, 671, 168, 90, 319, 214, 78, 84, 510, 156, 84, 'http://www.cnn.com', ''),
(16, '2011-10-04 06:10:48', NULL, 109, 6, 'right_tab', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, '2011-10-06 12:46:58', '2011-10-06 13:28:46', 116, 1, 'hero', NULL, NULL, NULL, 1700, 1040, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, '2011-10-04 16:52:41', '2011-10-06 15:12:28', 109, 1, 'hero', NULL, NULL, NULL, 1700, 1040, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, '2011-10-04 16:53:14', '2011-10-07 10:48:12', 109, 3, 'tune_in', NULL, NULL, NULL, 675, 161, 90, 322, 193, 70, 83, 517, 130, 78, 'http://www.facebook.com/ModelLatina', 'http://bcove.me/q16lhvyo'),
(21, '2011-10-04 17:01:52', '2011-10-06 15:11:04', 110, 1, 'hero', NULL, NULL, NULL, 1700, 1040, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, '2011-10-04 17:02:04', NULL, 110, 6, 'right_tab', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, '2011-10-04 17:02:15', '2011-10-05 03:52:18', 110, 3, 'tune_in', NULL, NULL, NULL, 387, 100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, '2011-10-04 17:56:32', '2011-10-05 03:52:53', 112, 3, 'tune_in', NULL, NULL, NULL, 452, 96, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, '2011-10-04 17:56:16', NULL, 112, 6, 'right_tab', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, '2011-10-04 17:55:41', '2011-10-07 09:09:48', 112, 1, 'hero', NULL, NULL, NULL, 1700, 1040, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, '2011-10-06 12:47:10', '2011-10-06 13:28:40', 116, 6, 'right_tab', NULL, NULL, NULL, 263, 225, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, '2011-10-06 15:11:37', '2011-10-06 15:11:37', 106, 1, 'hero', NULL, NULL, NULL, 1700, 1040, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, '2011-10-06 15:13:55', '2011-10-06 15:13:55', 106, 6, 'right_tab', NULL, NULL, NULL, 263, 225, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, '2011-10-06 15:14:08', '2011-10-07 10:50:30', 106, 3, 'tune_in', NULL, NULL, NULL, 671, 168, 95, 323, 205, 73, 93, 513, 154, 75, 'http://www.facebook.com/OperationOsmin', 'http://bcove.me/8751biem'),
(36, '2011-10-07 09:01:22', '2011-10-07 09:01:22', 120, 1, 'hero', NULL, NULL, NULL, 1700, 1040, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, '2011-10-07 09:01:36', '2011-10-07 09:01:36', 120, 6, 'right_tab', NULL, NULL, NULL, 263, 225, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, '2011-10-07 09:01:51', '2011-10-07 09:03:30', 120, 3, 'tune_in', NULL, NULL, NULL, 505, 160, 86, 286, 214, 74, NULL, NULL, NULL, NULL, 'http://www.facebook.com/MissionMenu', NULL),
(39, '2011-10-07 09:03:51', '2011-10-07 09:03:52', 121, 1, 'hero', NULL, NULL, NULL, 1700, 1040, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, '2011-10-07 09:03:59', '2011-10-07 09:03:59', 121, 6, 'right_tab', NULL, NULL, NULL, 263, 225, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, '2011-10-07 09:04:09', '2011-10-07 09:04:09', 121, 3, 'tune_in', NULL, NULL, NULL, 497, 92, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, '2011-10-07 09:05:14', '2011-10-07 09:05:14', 123, 1, 'hero', NULL, NULL, NULL, 1700, 1040, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, '2011-10-07 09:05:22', '2011-10-07 09:05:22', 123, 6, 'right_tab', NULL, NULL, NULL, 263, 225, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, '2011-10-07 15:06:05', '2011-10-07 15:06:05', 124, 1, 'hero', NULL, NULL, NULL, 1700, 1040, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, '2011-10-07 15:06:14', '2011-10-07 15:06:14', 124, 6, 'right_tab', NULL, NULL, NULL, 263, 225, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, '2011-10-07 15:09:06', '2011-10-07 15:09:07', 125, 1, 'hero', NULL, NULL, NULL, 1700, 1040, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, '2011-10-07 15:09:18', '2011-10-07 15:09:18', 125, 6, 'right_tab', NULL, NULL, NULL, 263, 225, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, '2011-10-07 15:10:14', '2011-10-07 15:13:45', 125, 3, 'tune_in', NULL, NULL, NULL, 675, 161, 88, 320, 198, 73, 89, 524, 147, 67, 'http://www.facebook.com/ModelLatina', 'http://bcove.me/q16lhvyo'),
(49, '2011-10-07 15:15:19', '2011-10-07 15:15:19', 126, 1, 'hero', NULL, NULL, NULL, 1700, 1040, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, '2011-10-07 15:15:28', '2011-10-07 15:15:28', 126, 6, 'right_tab', NULL, NULL, NULL, 263, 225, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, '2011-10-07 15:15:47', '2011-10-07 15:16:11', 126, 3, 'tune_in', NULL, NULL, NULL, 342, 159, 84, 123, 219, 73, NULL, NULL, NULL, NULL, 'http://www.facebook.com/MiamiInknuvoTV', NULL),
(52, '2011-10-07 17:33:48', '2011-10-07 17:33:49', 127, 1, 'hero', NULL, NULL, NULL, 1700, 1040, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, '2011-10-07 17:33:56', '2011-10-07 17:33:56', 127, 6, 'right_tab', NULL, NULL, NULL, 263, 225, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, '2011-10-07 17:34:06', '2011-10-07 17:34:07', 127, 3, 'tune_in', NULL, NULL, NULL, 253, 92, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, '2011-10-07 17:34:35', '2011-10-07 17:34:35', 128, 1, 'hero', NULL, NULL, NULL, 1700, 1040, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, '2011-10-07 17:34:43', '2011-10-07 17:34:43', 128, 6, 'right_tab', NULL, NULL, NULL, 263, 225, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, '2011-10-07 17:34:49', '2011-10-07 17:34:50', 128, 3, 'tune_in', NULL, NULL, NULL, 317, 92, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, '2011-10-07 17:39:13', '2011-10-07 17:39:14', 129, 1, 'hero', NULL, NULL, NULL, 1700, 1040, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, '2011-10-07 17:39:27', '2011-10-07 17:39:27', 129, 6, 'right_tab', NULL, NULL, NULL, 263, 225, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, '2011-10-07 17:41:20', '2011-10-07 17:42:02', 129, 3, 'tune_in', NULL, NULL, NULL, 532, 159, 84, 178, 212, 75, 80, 379, 153, 79, 'http://www.facebook.com/OperationOsmin', 'http://bcove.me/8751biem'),
(61, '2011-10-10 15:25:09', '2011-10-11 12:22:57', 132, 1, 'hero', NULL, NULL, NULL, 1700, 1040, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, '2011-10-10 15:25:17', '2011-10-11 12:23:18', 132, 6, 'right_tab', NULL, NULL, NULL, 263, 225, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, '2011-10-10 15:25:29', '2011-10-10 15:26:19', 132, 3, 'tune_in', NULL, NULL, NULL, 396, 168, 95, 100, 210, 73, NULL, NULL, NULL, NULL, 'https://www.facebook.com/adrenalinashow', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carousel_items_sets`
--

CREATE TABLE IF NOT EXISTS `carousel_items_sets` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `created` datetime default NULL,
  `updated` datetime default NULL,
  `carousel_item_id` int(11) default NULL,
  `carousel_set_id` int(11) default NULL,
  `order` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `carousel_item_id` (`carousel_item_id`),
  KEY `carousel_set_id` (`carousel_set_id`),
  KEY `order` (`order`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=126 ;

--
-- Dumping data for table `carousel_items_sets`
--

INSERT INTO `carousel_items_sets` (`id`, `created`, `updated`, `carousel_item_id`, `carousel_set_id`, `order`) VALUES
(90, '2011-10-07 17:43:07', NULL, 0, 7, 5),
(89, '2011-10-07 17:43:07', NULL, 120, 7, 4),
(88, '2011-10-07 17:43:07', NULL, 125, 7, 3),
(87, '2011-10-07 17:43:07', NULL, 129, 7, 2),
(86, '2011-10-07 17:43:07', NULL, 126, 7, 1),
(100, '2011-10-07 17:44:38', NULL, 0, 8, 5),
(99, '2011-10-07 17:44:38', NULL, 112, 8, 4),
(98, '2011-10-07 17:44:38', NULL, 120, 8, 3),
(97, '2011-10-07 17:44:38', NULL, 125, 8, 2),
(96, '2011-10-07 17:44:38', NULL, 128, 8, 1),
(115, '2011-10-10 18:48:32', NULL, 0, 9, 5),
(114, '2011-10-10 18:48:32', NULL, 124, 9, 4),
(113, '2011-10-10 18:48:32', NULL, 120, 9, 3),
(112, '2011-10-10 18:48:32', NULL, 125, 9, 2),
(111, '2011-10-10 18:48:32', NULL, 132, 9, 1),
(85, '2011-10-07 15:17:03', NULL, 0, 6, 5),
(84, '2011-10-07 15:17:03', NULL, 124, 6, 4),
(83, '2011-10-07 15:17:03', NULL, 120, 6, 3),
(82, '2011-10-07 15:17:03', NULL, 126, 6, 2),
(81, '2011-10-07 15:17:03', NULL, 125, 6, 1),
(105, '2011-10-07 17:44:48', NULL, 0, 5, 5),
(104, '2011-10-07 17:44:48', NULL, 121, 5, 4),
(103, '2011-10-07 17:44:48', NULL, 120, 5, 3),
(102, '2011-10-07 17:44:48', NULL, 125, 5, 2),
(101, '2011-10-07 17:44:48', NULL, 127, 5, 1),
(125, '2011-10-11 13:10:21', NULL, 0, 10, 5),
(124, '2011-10-11 13:10:21', NULL, 126, 10, 4),
(123, '2011-10-11 13:10:21', NULL, 129, 10, 3),
(122, '2011-10-11 13:10:21', NULL, 132, 10, 2),
(121, '2011-10-11 13:10:21', NULL, 127, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `carousel_sets`
--

CREATE TABLE IF NOT EXISTS `carousel_sets` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `created` datetime default NULL,
  `updated` datetime default NULL,
  `name` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `carousel_sets`
--

INSERT INTO `carousel_sets` (`id`, `created`, `updated`, `name`) VALUES
(7, '2011-10-07 17:43:07', NULL, 'Friday 10/7'),
(8, '2011-10-07 17:44:38', NULL, 'Sunday 10/9'),
(6, '2011-10-07 15:17:03', NULL, 'Mon 10/10'),
(5, '2011-10-07 09:07:33', '2011-10-07 17:44:48', 'Saturday 10/8'),
(9, '2011-10-10 15:27:17', '2011-10-10 18:48:32', 'Tuesday 10/11'),
(10, '2011-10-11 13:10:06', '2011-10-11 13:10:21', 'Wednesday 10/12');

-- --------------------------------------------------------

--
-- Table structure for table `carousel_sets_calendars`
--

CREATE TABLE IF NOT EXISTS `carousel_sets_calendars` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `created` datetime default NULL,
  `updated` datetime default NULL,
  `month` int(2) default NULL,
  `day` int(2) default NULL,
  `year` int(4) default NULL,
  `day_of_year` int(3) default NULL,
  `carousel_set_id` int(11) default NULL,
  `unix_time` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `carousel_sets_calendars`
--

INSERT INTO `carousel_sets_calendars` (`id`, `created`, `updated`, `month`, `day`, `year`, `day_of_year`, `carousel_set_id`, `unix_time`) VALUES
(13, '2011-10-07 17:44:56', NULL, 10, 7, 2011, 279, 7, NULL),
(12, '2011-10-07 15:17:15', NULL, 10, 10, 2011, 282, 6, NULL),
(14, '2011-10-07 17:45:08', NULL, 10, 9, 2011, 281, 8, NULL),
(11, '2011-10-07 09:08:02', NULL, 10, 8, 2011, 280, 5, NULL),
(16, '2011-10-10 15:27:27', NULL, 10, 11, 2011, 283, 9, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `image_types`
--

CREATE TABLE IF NOT EXISTS `image_types` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `created` datetime default NULL,
  `updated` datetime default NULL,
  `name` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `image_types`
--

INSERT INTO `image_types` (`id`, `created`, `updated`, `name`) VALUES
(4, NULL, NULL, 'feature'),
(5, NULL, NULL, 'thumb'),
(1, NULL, NULL, 'hero'),
(3, NULL, NULL, 'tune_in'),
(6, NULL, NULL, 'right_tab'),
(2, NULL, NULL, 'premium_hero');

-- --------------------------------------------------------

--
-- Table structure for table `nu_spotlight_items`
--

CREATE TABLE IF NOT EXISTS `nu_spotlight_items` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `created` datetime default NULL,
  `updated` datetime NOT NULL,
  `name` varchar(255) default NULL,
  `title` varchar(255) default NULL,
  `blurb` blob,
  `link` varchar(255) NOT NULL,
  `launch` int(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=176 ;

--
-- Dumping data for table `nu_spotlight_items`
--

INSERT INTO `nu_spotlight_items` (`id`, `created`, `updated`, `name`, `title`, `blurb`, `link`, `launch`) VALUES
(91, '2011-09-22 19:01:47', '2011-10-11 12:46:47', 'Nuvo Store', 'Get Your nuvoTV Swag On!', 0x3c7370616e20636c6173733d224170706c652d7374796c652d7370616e22207374796c653d22636f6c6f723a207267622833312c2033302c203238293b20666f6e742d66616d696c793a2048656c7665746963612c20417269616c2c20274c696265726174696f6e2053616e73272c204672656553616e732c2073616e732d73657269663b20666f6e742d73697a653a20313470783b206c696e652d6865696768743a20323170783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b20223e57616e7420746f20726f636b20616e204f736d696e2d696e73706972656420542d73686972743f20436865636b206f7574206f7572206e75766f5456206f6e6c696e652073746f726520666f722022466963682c2053616c612c205761646122207465657320616e64206f74686572204f736d696e69736d2070617261706865726e616c69612e3c2f7370616e3e, 'http://www.cafepress.com/mynuvotv', 1),
(94, '2011-09-22 19:17:12', '2011-09-29 19:14:13', 'Ringtones', 'Download Nu Beats For Your Phone!', 0x3c7370616e20636c6173733d224170706c652d7374796c652d7370616e22207374796c653d22636f6c6f723a207267622833312c2033302c203238293b20666f6e742d66616d696c793a2048656c7665746963612c20417269616c2c20274c696265726174696f6e2053616e73272c204672656553616e732c2073616e732d73657269663b20666f6e742d73697a653a20313470783b206c696e652d6865696768743a20323170783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b20223e496e20646573706572617465206e656564206f662061206e65772072696e67746f6e653f20436865636b206f757420616c6c20746865206e75766f54562074756e657320617661696c61626c6520666f7220646f776e6c6f6164206e6f772e3c2f7370616e3e, '', 1),
(87, '2011-09-22 18:53:59', '2011-10-11 12:46:07', 'Osmin on Hulu', 'Watch the World''s most Psychotic Trainer on Hulu!', 0x3c666f6e742073697a653d2233223e52656c69766520736f6d65206f6620746865206d6f737420756e636f6e76656e74696f6e616c203c623e776f726b6f7574733c2f623e20545627732065766572207365656e206e6f77206f6e2048756c752e3c2f666f6e743e, 'http://www.hulu.com/operation-osmin', 1),
(129, '2011-09-28 17:04:33', '2011-10-11 12:44:37', 'ML4 Behind the Scenes', 'Get behind the scenes coverage of the Models!', 0x266e6273703b3c7370616e20636c6173733d224170706c652d7374796c652d7370616e22207374796c653d22636f6c6f723a207267622833312c2033302c203238293b20666f6e742d66616d696c793a2048656c7665746963612c20417269616c2c20274c696265726174696f6e2053616e73272c204672656553616e732c2073616e732d73657269663b20666f6e742d73697a653a20313470783b206c696e652d6865696768743a20323170783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b20223e57616e7420746f206b6e6f77207768617420746865206d6f64656c7320646f207768656e206e6f7420696d7072657373696e6720746865206a75646765733f2047657420626568696e642d7468652d7363656e657320636f76657261676520696e204d6f64656c204c6174696e61277320566964656f20436f6e74726f6c20526f6f6d2e3c2f7370616e3e, 'http://mynuvotv.com/model-latina-las-vegas/?videos=1', 1),
(103, '2011-09-22 19:48:18', '2011-09-23 04:53:38', 'T-Shirt', 'Want to Rock a Super Cool Model Latina T-Shirt?', 0x3c7370616e20636c6173733d224170706c652d7374796c652d7370616e22207374796c653d22636f6c6f723a207267622833312c2033302c203238293b20666f6e742d66616d696c793a2048656c7665746963612c20417269616c2c20274c696265726174696f6e2053616e73272c204672656553616e732c2073616e732d73657269663b20666f6e742d73697a653a20313470783b206c696e652d6865696768743a20323170783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b20223e4f6620636f7572736520796f7520646f21205368617265207468697320766964656f207769746820796f757220667269656e647320616e64207765276c6c2073656e6420796f7520612046524545206c696d697465642065646974696f6e204d6f64656c204c6174696e6120542d73686972742e3c2f7370616e3e, '', 0),
(115, '2011-09-23 04:42:45', '2011-10-11 12:44:17', 'Twitter Mondays', 'Tweet With Us Every Monday!', 0x3c7370616e20636c6173733d224170706c652d7374796c652d7370616e22207374796c653d22636f6c6f723a207267622833312c2033302c203238293b20666f6e742d66616d696c793a2048656c7665746963612c20417269616c2c20274c696265726174696f6e2053616e73272c204672656553616e732c2073616e732d73657269663b20666f6e742d73697a653a20313470783b206c696e652d6865696768743a20323170783b206261636b67726f756e642d636f6c6f723a20726762283235352c203235352c20323535293b20223e42652070617274206f66207468652022696e222063726f77642e20557365206861736874616720234d4c566567617320647572696e67204d6f64656c204c6174696e61204c61732056656761732074686973204d6f6e6461792061742031302f396320616e6420796f757220747765657473206d617920617070656172206f6e206e75766f54563c2f7370616e3e, 'http://www.mynuvotv.com/model-latina-vegas-cast/twitter.php', 1),
(174, '2011-10-11 12:28:13', '2011-10-11 12:33:08', '10 Latin Restaurants', 'Top 10 Latin-Flavored American Restaurants.', 0x4e75766f2773204d697373696f6e204d656e7520666f6c6c6f777320612073656c662d6465736372696265642022556e69746564204e6174696f6e73206f6620636865667322200d0a6173207468657920636f6f6b20757020706c656e7479206f662064656c6963696f7573206472616d61207768696c652068656c70696e672072657374617572616e747320676f200d0a66726f6d2073696d6d6572696e6720746f2073697a7a6c696e672077697468206578636974696e67206e65772063756c747572652d6261736564206469736865732e, 'http://www.mynuvotv.com/series/mission-menu/features', 0),
(175, '2011-10-11 12:33:52', '2011-10-11 12:36:23', 'Twitter Tonight', 'Tweet with Us Tonight!', 0x42652070617274206f66207468652022696e222063726f77642e20557365206861736874616720234d4c566567617320647572696e67204d6f64656c204c6174696e61204c617320566567617320546f6e696768742061742031302f3963, 'http://www.mynuvotv.com/model-latina-vegas-cast/twitter.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nu_spotlight_items_images`
--

CREATE TABLE IF NOT EXISTS `nu_spotlight_items_images` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `created` datetime default NULL,
  `updated` datetime default NULL,
  `image_type_id` int(11) NOT NULL,
  `image_type` varchar(255) NOT NULL,
  `nu_spotlight_item_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `image_type_id` (`image_type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `nu_spotlight_items_images`
--

INSERT INTO `nu_spotlight_items_images` (`id`, `created`, `updated`, `image_type_id`, `image_type`, `nu_spotlight_item_id`) VALUES
(4, '2011-09-22 22:23:06', NULL, 4, 'feature', 87),
(5, '2011-09-22 22:27:08', NULL, 5, 'thumb', 87),
(9, '2011-09-23 04:34:03', NULL, 4, 'feature', 91),
(10, '2011-09-23 04:34:08', NULL, 5, 'thumb', 91),
(11, '2011-09-23 04:36:53', NULL, 4, 'feature', 94),
(12, '2011-09-23 04:37:02', NULL, 4, 'feature', 103),
(13, '2011-09-23 04:38:29', NULL, 5, 'thumb', 94),
(14, '2011-09-23 04:39:35', NULL, 5, 'thumb', 103),
(16, '2011-09-23 04:42:59', NULL, 4, 'feature', 115),
(17, '2011-09-23 04:43:12', NULL, 5, 'thumb', 115),
(22, '2011-09-28 17:05:32', NULL, 4, 'feature', 129),
(23, '2011-09-28 17:05:38', NULL, 5, 'thumb', 129),
(33, '2011-10-11 12:31:12', NULL, 4, 'feature', 174),
(34, '2011-10-11 12:31:19', NULL, 5, 'thumb', 174),
(35, '2011-10-11 12:36:08', NULL, 4, 'feature', 175),
(36, '2011-10-11 12:36:17', NULL, 5, 'thumb', 175);

-- --------------------------------------------------------

--
-- Table structure for table `nu_spotlight_items_sets`
--

CREATE TABLE IF NOT EXISTS `nu_spotlight_items_sets` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `created` datetime default NULL,
  `updated` datetime default NULL,
  `nu_spotlight_item_id` int(11) default NULL,
  `nu_spotlight_set_id` int(11) default NULL,
  `order` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `nu_spotlight_item_id` (`nu_spotlight_item_id`),
  KEY `nu_spotlight_set_id` (`nu_spotlight_set_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=191 ;

--
-- Dumping data for table `nu_spotlight_items_sets`
--

INSERT INTO `nu_spotlight_items_sets` (`id`, `created`, `updated`, `nu_spotlight_item_id`, `nu_spotlight_set_id`, `order`) VALUES
(180, '2011-10-04 17:59:23', NULL, 103, 12, 5),
(179, '2011-10-04 17:59:23', NULL, 103, 12, 4),
(178, '2011-10-04 17:59:23', NULL, 103, 12, 3),
(177, '2011-10-04 17:59:23', NULL, 103, 12, 2),
(176, '2011-10-04 17:59:23', NULL, 103, 12, 1),
(105, '2011-09-26 22:15:59', NULL, 115, 14, 5),
(104, '2011-09-26 22:15:59', NULL, 87, 14, 4),
(103, '2011-09-26 22:15:59', NULL, 103, 14, 3),
(102, '2011-09-26 22:15:59', NULL, 94, 14, 2),
(101, '2011-09-26 22:15:59', NULL, 91, 14, 1),
(190, '2011-10-11 13:12:19', NULL, 103, 15, 5),
(189, '2011-10-11 13:12:19', NULL, 115, 15, 4),
(188, '2011-10-11 13:12:19', NULL, 87, 15, 3),
(187, '2011-10-11 13:12:19', NULL, 91, 15, 2),
(186, '2011-10-11 13:12:19', NULL, 129, 15, 1),
(181, '2011-10-11 12:42:44', NULL, 174, 17, 1),
(182, '2011-10-11 12:42:44', NULL, 129, 17, 2),
(183, '2011-10-11 12:42:44', NULL, 87, 17, 3),
(184, '2011-10-11 12:42:44', NULL, 91, 17, 4),
(185, '2011-10-11 12:42:44', NULL, 115, 17, 5);

-- --------------------------------------------------------

--
-- Table structure for table `nu_spotlight_sets`
--

CREATE TABLE IF NOT EXISTS `nu_spotlight_sets` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `created` datetime default NULL,
  `updated` datetime default NULL,
  `name` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `nu_spotlight_sets`
--

INSERT INTO `nu_spotlight_sets` (`id`, `created`, `updated`, `name`) VALUES
(12, '2011-09-26 21:04:19', '2011-10-04 17:59:23', 'All Black'),
(14, '2011-09-26 22:09:58', '2011-09-26 22:15:59', 'another test'),
(15, '2011-09-26 22:14:32', '2011-10-11 13:12:19', 'Latinos'),
(17, '2011-10-11 12:42:44', NULL, 'Tuesday 10/11');

-- --------------------------------------------------------

--
-- Table structure for table `nu_spotlight_sets_calendars`
--

CREATE TABLE IF NOT EXISTS `nu_spotlight_sets_calendars` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `created` datetime default NULL,
  `updated` datetime default NULL,
  `month` int(2) default NULL,
  `day` int(2) default NULL,
  `year` int(4) default NULL,
  `day_of_year` int(11) NOT NULL,
  `unix_time` datetime NOT NULL,
  `nu_spotlight_set_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `nu_spotlight_set_id` (`nu_spotlight_set_id`),
  KEY `day` (`day`),
  KEY `month` (`month`),
  KEY `day_of_year` (`day_of_year`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `nu_spotlight_sets_calendars`
--

INSERT INTO `nu_spotlight_sets_calendars` (`id`, `created`, `updated`, `month`, `day`, `year`, `day_of_year`, `unix_time`, `nu_spotlight_set_id`) VALUES
(54, '2011-09-29 21:05:43', NULL, 9, 16, 2011, 258, '0000-00-00 00:00:00', 14),
(58, '2011-10-04 19:43:29', NULL, 10, 4, 2011, 276, '0000-00-00 00:00:00', 12),
(49, '2011-09-29 18:59:14', NULL, 12, 9, 2011, 342, '0000-00-00 00:00:00', 12),
(39, '2011-09-28 16:15:09', NULL, 9, 13, 2011, 255, '0000-00-00 00:00:00', 12),
(48, '2011-09-29 18:19:44', NULL, 9, 20, 2011, 262, '0000-00-00 00:00:00', 15),
(56, '2011-09-29 21:59:47', NULL, 9, 4, 2011, 246, '0000-00-00 00:00:00', 15),
(57, '2011-09-29 21:59:51', NULL, 9, 6, 2011, 248, '0000-00-00 00:00:00', 14),
(65, '2011-10-04 16:54:52', NULL, 10, 5, 2011, 277, '0000-00-00 00:00:00', 14),
(60, '2011-10-04 19:55:12', NULL, 10, 2, 2011, 274, '0000-00-00 00:00:00', 15),
(67, '2011-10-11 12:48:19', NULL, 10, 11, 2011, 283, '0000-00-00 00:00:00', 17),
(68, '2011-10-11 13:12:33', NULL, 10, 12, 2011, 284, '0000-00-00 00:00:00', 15);

-- --------------------------------------------------------

--
-- Table structure for table `nu_spotlight_videos_calendars`
--

CREATE TABLE IF NOT EXISTS `nu_spotlight_videos_calendars` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `created` datetime default NULL,
  `updated` datetime default NULL,
  `month` int(2) default NULL,
  `day` int(2) default NULL,
  `year` int(4) default NULL,
  `day_of_year` int(3) default NULL,
  `unix_time` datetime NOT NULL,
  `title` varchar(255) default NULL,
  `blurb` blob,
  `link` varchar(255) default NULL,
  `launch` int(1) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `nu_spotlight_videos_calendars`
--

INSERT INTO `nu_spotlight_videos_calendars` (`id`, `created`, `updated`, `month`, `day`, `year`, `day_of_year`, `unix_time`, `title`, `blurb`, `link`, `launch`) VALUES
(9, '2011-09-30 17:46:38', NULL, 1, 11, 2012, 10, '2012-01-11 00:00:00', 'asdf', 0x266e6273703b61736466, 'asdf', NULL),
(8, '2011-09-30 16:40:35', '2011-09-30 18:00:05', 9, 7, 2011, 249, '2011-09-07 00:00:00', 'Watch on BrightCove', 0x4c6f72656d20697073756d20646f6c6f722073697420616d65742c266e6273703b3c623e636f6e73656374657475723c2f623e266e6273703b6164697069736963696e6720656c69742c2073656420646f20656975736d6f642074656d706f7220696e6369646964756e74207574206c61626f726520657420646f6c6f7265206d61676e6120616c697175612e20557420656e696d206164206d696e696d2076656e69616d2e, 'def', NULL),
(10, '2011-09-30 17:46:51', NULL, 12, 29, 2011, 362, '2011-12-29 00:00:00', 'adsf', 0x266e6273703b61647366, 'asdf', NULL),
(12, '2011-09-30 18:23:52', '2011-10-04 18:44:48', 9, 1, 2011, 243, '2011-09-01 00:00:00', 'TESTING', 0x266e6273703b54455354, 'TEST', 1),
(14, '2011-10-04 19:56:02', NULL, 10, 5, 2011, 277, '2011-10-05 00:00:00', 'test', 0x74657374, '', NULL),
(15, '2011-10-11 12:27:06', NULL, 10, 10, 2011, 282, '2011-10-10 00:00:00', 'Beauties and the Feast', 0x3c693e4d6f64656c204c6174696e613c2f693e27732066696e616c20736978207368617265206120726f636b792073686f6f7420617420746865204772616e642043616e796f6e2e203c693e4d697373696f6e204d656e753c2f693e27730d0a206d61737465722063686566732075736520736f757468206f662074686520626f726465722073697a7a6c6520746f20736176652061206479696e67204d65786963616e200d0a72657374617572616e742e20476f6f642067656e657469637320617265204a65737369636120416c6261277320736578696573742073656372657420776561706f6e206f6e203c693e4461726b20416e67656c3c2f693e2e20416e642074656d7065727320666c6172652061732074686520696e6b20666c6f7773206f6e203c693e4d69616d6920496e6b3c2f693e2e, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `isAdmin` int(11) NOT NULL,
  `created` datetime default NULL,
  `updated` datetime default NULL,
  `activate` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) default NULL,
  `password` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `isAdmin`, `created`, `updated`, `activate`, `full_name`, `first_name`, `last_name`, `email`, `password`) VALUES
(22, 0, '2011-06-01 15:31:53', '2011-09-26 04:13:16', 0, 'Cesar Chavez', '', '', 'cchavez@mynuvotv.com', '202cb962ac59075b964b07152d234b70');
