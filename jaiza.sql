-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2015 at 04:02 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jaiza`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`city_ID`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_ID`, `name`, `updated_at`) VALUES
(2, 'کراچی', '2015-03-19 18:22:18'),
(4, 'اسلام آباد', '2015-03-19 18:23:12'),
(6, 'لاہور', '2015-03-19 18:22:54');

-- --------------------------------------------------------

--
-- Table structure for table `colmuns`
--

CREATE TABLE IF NOT EXISTS `colmuns` (
  `colmuns_ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) CHARACTER SET utf8 NOT NULL,
  `summary` text CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `scancopy` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tags` text COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `leader_ID` int(11) NOT NULL,
  `newspaper_ID` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`colmuns_ID`),
  KEY `leader_ID` (`leader_ID`,`newspaper_ID`),
  KEY `newpapaer_ID` (`newspaper_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=52 ;

--
-- Dumping data for table `colmuns`
--

INSERT INTO `colmuns` (`colmuns_ID`, `title`, `summary`, `date`, `link`, `scancopy`, `tags`, `details`, `type`, `leader_ID`, `newspaper_ID`, `updated_at`) VALUES
(51, '', '', '2015-03-22', '', 'uploads/459011426982902.jpg', '', '', 'Column', 1, 7, '2015-03-22 00:08:22');

-- --------------------------------------------------------

--
-- Stand-in structure for view `columnview`
--
CREATE TABLE IF NOT EXISTS `columnview` (
`ID` int(11)
,`title` varchar(40)
,`summary` text
,`date` date
,`link` varchar(200)
,`scancopy` varchar(200)
,`tags` text
,`details` text
,`type` varchar(15)
,`leaderID` int(11)
,`leaderName` varchar(40)
,`leaderDesignation` varchar(40)
,`newspaperID` int(11)
,`newspaperName` varchar(30)
,`newspaperCity` varchar(20)
,`newspaperCityID` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `greport`
--
CREATE TABLE IF NOT EXISTS `greport` (
`ID` int(11)
,`date` date
,`pageNO` varchar(11)
,`columnNO` varchar(11)
,`link` varchar(300)
,`scancopy` int(11)
,`userID` int(11)
,`newspaperID` int(11)
,`pressreleaseID` int(11)
,`newspaperName` varchar(30)
,`pressreleaseName` varchar(20)
);
-- --------------------------------------------------------

--
-- Table structure for table `leader`
--

CREATE TABLE IF NOT EXISTS `leader` (
  `leader_ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) CHARACTER SET utf8 NOT NULL,
  `designation` varchar(40) CHARACTER SET utf8 NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`leader_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `leader`
--

INSERT INTO `leader` (`leader_ID`, `name`, `designation`, `updated_at`) VALUES
(1, '', '', '2015-03-21 23:36:12'),
(5, 'ریاض', 'ناضم', '2015-03-22 00:37:12');

-- --------------------------------------------------------

--
-- Table structure for table `newspaper`
--

CREATE TABLE IF NOT EXISTS `newspaper` (
  `newspaper_ID` int(11) NOT NULL AUTO_INCREMENT,
  `circularPeriod` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`newspaper_ID`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `newspaper`
--

INSERT INTO `newspaper` (`newspaper_ID`, `circularPeriod`, `website`, `name`, `language`, `city_id`, `updated_at`) VALUES
(7, 'weekly', 'jang.com', 'جنگ', 'English', 6, '2015-03-19 18:27:48'),
(14, 'daily', '', 'جنگ', 'English', 4, '2015-03-19 18:27:43'),
(15, '', '', 'Nawae Waqat', 'اردو', 2, '2015-03-20 21:00:09'),
(16, 'daily', 'http://asdasdas/cap,', 'Awaaz', 'English', 6, '2015-03-19 13:39:05'),
(17, '', '', 'The News', 'انگریزی', 6, '2015-03-23 23:29:05'),
(18, '', '', 'Awaaz', 'پشتو', 2, '2015-03-24 00:12:10');

-- --------------------------------------------------------

--
-- Stand-in structure for view `newspaperview`
--
CREATE TABLE IF NOT EXISTS `newspaperview` (
`ID` int(11)
,`circularPeriod` varchar(30)
,`website` varchar(200)
,`name` varchar(30)
,`language` varchar(10)
,`cityID` int(11)
,`cityName` varchar(20)
);
-- --------------------------------------------------------

--
-- Table structure for table `pressrelease`
--

CREATE TABLE IF NOT EXISTS `pressrelease` (
  `pr_ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `place` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `tag` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `scancopy` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `leader_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pr_ID`),
  KEY `leader_ID` (`leader_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=56 ;

--
-- Dumping data for table `pressrelease`
--

INSERT INTO `pressrelease` (`pr_ID`, `title`, `date`, `place`, `detail`, `tag`, `type`, `scancopy`, `leader_ID`, `user_ID`, `updated_at`) VALUES
(48, '', '2015-03-22', '', '', '', 'PR', '', 1, 1, '2015-03-22 00:09:35'),
(55, 'aaaa', '2015-03-22', '', '', '', 'PR', '', 1, 1, '2015-03-24 00:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `report_ID` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `pageNO` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `columnNO` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `scancopy` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `newspaper_ID` int(11) NOT NULL,
  `pressrelease_ID` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`report_ID`),
  UNIQUE KEY `report_ID` (`report_ID`),
  KEY `user_ID` (`user_ID`),
  KEY `user_ID_2` (`user_ID`),
  KEY `pressrelease_ID` (`pressrelease_ID`),
  KEY `newspaper_ID` (`newspaper_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=37 ;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_ID`, `date`, `pageNO`, `columnNO`, `link`, `scancopy`, `user_ID`, `newspaper_ID`, `pressrelease_ID`, `updated_at`) VALUES
(1, '2015-03-22', 'i', 'f', '', 0, 1, 15, 48, '2015-03-24 00:23:57'),
(2, '2015-03-22', 'b', 'f', '', 0, 1, 14, 48, '2015-03-24 00:28:55'),
(3, '2015-03-22', '1', 'f', '', 0, 1, 7, 48, '2015-03-24 00:28:55'),
(4, '2015-03-22', '3', 'f', '', 0, 1, 15, 49, '2015-03-24 00:28:55'),
(5, '2015-03-22', '11', 'b', '', 0, 1, 7, 50, '2015-03-24 00:28:55'),
(6, '2015-03-22', 'f', 'f', '', 0, 1, 16, 49, '2015-03-24 00:28:55'),
(7, '2015-03-22', '9', 'n', '', 0, 1, 7, 49, '2015-03-24 00:28:55'),
(8, '2015-03-22', 'i', 'b', '', 0, 1, 14, 49, '2015-03-24 00:28:55'),
(9, '2015-03-22', '3', 'f', '', 0, 1, 16, 48, '2015-03-24 00:28:55'),
(10, '2015-03-22', 'b', 'f', '', 0, 1, 14, 50, '2015-03-24 00:28:55'),
(11, '2015-03-22', 'n', 'b', '', 0, 1, 16, 50, '2015-03-24 00:28:55'),
(12, '2015-03-22', '4', 'f', '', 0, 1, 15, 50, '2015-03-24 00:28:55'),
(13, '2015-03-22', '12', 'f', '', 0, 1, 7, 51, '2015-03-24 00:28:55'),
(14, '2015-03-22', '5', 'f', '', 0, 1, 15, 51, '2015-03-24 00:28:56'),
(15, '2015-03-22', 'n', 'f', '', 0, 1, 14, 51, '2015-03-24 00:28:55'),
(16, '2015-03-22', 'i', 'f', '', 0, 1, 16, 51, '2015-03-24 00:28:55'),
(17, '2015-03-22', '14', 'f', '', 0, 1, 7, 52, '2015-03-24 00:28:56'),
(18, '2015-03-22', 'f', 'f', '', 0, 1, 14, 52, '2015-03-24 00:28:56'),
(19, '2015-03-22', '6', 'f', '', 0, 1, 15, 52, '2015-03-24 00:28:56'),
(20, '2015-03-22', 'i', 'i', '', 0, 1, 16, 52, '2015-03-24 00:28:56'),
(21, '2015-03-22', '', 'f', '', 0, 1, 17, 48, '2015-03-24 00:21:17'),
(22, '2015-03-22', '', 'f', '', 0, 1, 18, 48, '2015-03-24 00:28:55'),
(23, '2015-03-22', '', 'f', '', 0, 1, 18, 49, '2015-03-24 00:28:55'),
(24, '2015-03-22', '', 'f', '', 0, 1, 17, 49, '2015-03-24 00:28:55'),
(25, '2015-03-22', '', 'f', '', 0, 1, 18, 50, '2015-03-24 00:28:55'),
(26, '2015-03-22', '', 'f', '', 0, 1, 17, 50, '2015-03-24 00:28:55'),
(27, '2015-03-22', '', 'f', '', 0, 1, 17, 51, '2015-03-24 00:28:55'),
(28, '2015-03-22', '', 'f', '', 0, 1, 18, 51, '2015-03-24 00:28:56'),
(29, '2015-03-22', '', 'f', '', 0, 1, 17, 52, '2015-03-24 00:28:56'),
(30, '2015-03-22', '', 'f', '', 0, 1, 18, 52, '2015-03-24 00:28:56'),
(31, '2015-03-22', '', 'f', '', 0, 1, 7, 55, '2015-03-24 00:28:56'),
(32, '2015-03-22', '', 'f', '', 0, 1, 14, 55, '2015-03-24 00:28:56'),
(33, '2015-03-22', '', 'f', '', 0, 1, 16, 55, '2015-03-24 00:28:56'),
(34, '2015-03-22', '', 'f', '', 0, 1, 17, 55, '2015-03-24 00:28:56'),
(35, '2015-03-22', '', 'f', '', 0, 1, 15, 55, '2015-03-24 00:28:56'),
(36, '2015-03-22', '', 'f', '', 0, 1, 18, 55, '2015-03-24 00:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `tag_ID` int(11) NOT NULL AUTO_INCREMENT,
  `title_tag` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tag_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_ID`, `title_tag`, `updated_at`) VALUES
(25, 'weqw', '2015-03-18 21:30:28'),
(32, 'gggg', '2015-03-20 12:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) DEFAULT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `temp_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hold` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_ID` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `isAdmin`, `username`, `timestamp`, `temp_password`, `code`, `hold`, `remember_token`, `updated_at`, `active`) VALUES
(1, 'اسامہ', 'muhammadusamariaz@gmail.com', '$2y$10$Zy0qTBhjwjxPLWknIa20luGODfoBaS.qduWdaNcrze3p1yTkdwRgu', 0, 'u0347', '2015-03-10 14:00:40', '', '', '', 'uEmU7ASfsgMVuEXusPem1hzlLkDvXJ92cZl309w2TCtGSDHJiQfoyKr3b4ol', '2015-03-24 00:44:55', 0),
(2, '', '111@22.com', '$2y$10$9B8qwQIbiNleE4zTdjCbRu61xYHLHihiEe.CFmmCRZSA94vcdOZeG', 0, 'u0348', '2015-03-20 22:12:15', '', '', '', '', '0000-00-00 00:00:00', 0),
(3, '', 'SS@AA.COM', '$2y$10$m3SAGYKLlhOnw9X.G8shyeitP1V9SB.zNVLQZYlvHYS/B453ia5Ru', 0, 'اسامہ', '2015-03-21 00:23:15', '', '', '', '', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Structure for view `columnview`
--
DROP TABLE IF EXISTS `columnview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `columnview` AS select `cl`.`colmuns_ID` AS `ID`,`cl`.`title` AS `title`,`cl`.`summary` AS `summary`,`cl`.`date` AS `date`,`cl`.`link` AS `link`,`cl`.`scancopy` AS `scancopy`,`cl`.`tags` AS `tags`,`cl`.`details` AS `details`,`cl`.`type` AS `type`,`cl`.`leader_ID` AS `leaderID`,`l`.`name` AS `leaderName`,`l`.`designation` AS `leaderDesignation`,`cl`.`newspaper_ID` AS `newspaperID`,`n`.`name` AS `newspaperName`,`c`.`name` AS `newspaperCity`,`c`.`city_ID` AS `newspaperCityID` from (((`colmuns` `cl` join `leader` `l`) join `newspaper` `n`) join `city` `c`) where ((`cl`.`leader_ID` = `l`.`leader_ID`) and (`cl`.`newspaper_ID` = `n`.`newspaper_ID`) and (`n`.`city_id` = `c`.`city_ID`));

-- --------------------------------------------------------

--
-- Structure for view `greport`
--
DROP TABLE IF EXISTS `greport`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `greport` AS select `report`.`report_ID` AS `ID`,`report`.`date` AS `date`,`report`.`pageNO` AS `pageNO`,`report`.`columnNO` AS `columnNO`,`report`.`link` AS `link`,`report`.`scancopy` AS `scancopy`,`report`.`user_ID` AS `userID`,`report`.`newspaper_ID` AS `newspaperID`,`report`.`pressrelease_ID` AS `pressreleaseID`,`newspaper`.`name` AS `newspaperName`,`pressrelease`.`title` AS `pressreleaseName` from ((`report` join `newspaper`) join `pressrelease`) where ((`report`.`newspaper_ID` = `newspaper`.`newspaper_ID`) and (`report`.`pressrelease_ID` = `pressrelease`.`pr_ID`));

-- --------------------------------------------------------

--
-- Structure for view `newspaperview`
--
DROP TABLE IF EXISTS `newspaperview`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `newspaperview` AS select `newspaper`.`newspaper_ID` AS `ID`,`newspaper`.`circularPeriod` AS `circularPeriod`,`newspaper`.`website` AS `website`,`newspaper`.`name` AS `name`,`newspaper`.`language` AS `language`,`newspaper`.`city_id` AS `cityID`,`city`.`name` AS `cityName` from (`newspaper` join `city`) where (`newspaper`.`city_id` = `city`.`city_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `colmuns`
--
ALTER TABLE `colmuns`
  ADD CONSTRAINT `colmuns_ibfk_1` FOREIGN KEY (`leader_ID`) REFERENCES `leader` (`leader_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `colmuns_ibfk_2` FOREIGN KEY (`newspaper_ID`) REFERENCES `newspaper` (`newspaper_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `newspaper`
--
ALTER TABLE `newspaper`
  ADD CONSTRAINT `newspaper_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_ID`);

--
-- Constraints for table `pressrelease`
--
ALTER TABLE `pressrelease`
  ADD CONSTRAINT `pressrelease_ibfk_1` FOREIGN KEY (`leader_ID`) REFERENCES `leader` (`leader_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`newspaper_ID`) REFERENCES `newspaper` (`newspaper_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
