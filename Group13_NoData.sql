-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2017 at 02:08 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group13`
--

-- --------------------------------------------------------

--
-- Table structure for table `completedtasks`
--

CREATE TABLE `completedtasks` (
  `Task_ID` smallint(6) NOT NULL,
  `User_ID` bigint(20) NOT NULL,
  `Completed` tinyint(1) NOT NULL,
  `Date_Completed` date NOT NULL,
  `Completed_By` bigint(20) NOT NULL,
  `Comments` text NOT NULL,
  `Sent` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `expiredtasks`
--

CREATE TABLE `expiredtasks` (
  `Task_ID` smallint(6) NOT NULL,
  `User_ID` bigint(20) NOT NULL,
  `Date` date NOT NULL,
  `Expiry_Date` date NOT NULL,
  `Task_Type` varchar(15) NOT NULL,
  `Title` tinytext NOT NULL COMMENT 'Max 255 Characters',
  `Req_Words` smallint(6) NOT NULL,
  `Word_Count` smallint(6) NOT NULL,
  `Total_Pages` smallint(6) NOT NULL,
  `File_Format` varchar(12) NOT NULL,
  `Due_Date` date NOT NULL,
  `Due_Time` time NOT NULL,
  `Description` text NOT NULL,
  `Tag` text NOT NULL,
  `Claimed_By` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `Faculty` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fileformats`
--

CREATE TABLE `fileformats` (
  `Format` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `flaggedtasks`
--

CREATE TABLE `flaggedtasks` (
  `Task_ID` smallint(6) NOT NULL,
  `User_ID` bigint(20) NOT NULL,
  `Date` date NOT NULL,
  `Expiry_Date` date NOT NULL,
  `Task_Type` varchar(15) NOT NULL,
  `Title` tinytext NOT NULL COMMENT 'Max 255 Characters',
  `Req_Words` smallint(6) NOT NULL,
  `Word_Count` smallint(6) NOT NULL,
  `Total_Pages` smallint(6) NOT NULL,
  `File_Format` varchar(12) NOT NULL,
  `Due_Date` date NOT NULL,
  `Due_Time` time NOT NULL,
  `Description` text NOT NULL,
  `Tag` text NOT NULL,
  `Claimed_By` bigint(20) NOT NULL,
  `Flagged` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `Tag_ID` int(11) NOT NULL,
  `Tag` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tagsused`
--

CREATE TABLE `tagsused` (
  `TUID` int(11) NOT NULL,
  `Task_ID` smallint(6) NOT NULL,
  `Tag_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `Task_ID` smallint(6) NOT NULL,
  `User_ID` bigint(20) NOT NULL,
  `Date` date NOT NULL,
  `Expiry_Date` date NOT NULL,
  `Task_Type` varchar(15) NOT NULL,
  `Title` tinytext NOT NULL COMMENT 'Max 255 Characters',
  `Req_Words` smallint(6) NOT NULL,
  `Word_Count` smallint(6) NOT NULL,
  `Total_Pages` smallint(6) NOT NULL,
  `File_Format` varchar(12) NOT NULL,
  `Due_Date` date NOT NULL,
  `Due_Time` time NOT NULL,
  `Description` text NOT NULL,
  `Tag` text NOT NULL,
  `Claimed_By` bigint(20) NOT NULL,
  `Flagged` tinyint(1) NOT NULL,
  `Completed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tasktypes`
--

CREATE TABLE `tasktypes` (
  `Task_Type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `User_ID` bigint(20) NOT NULL,
  `User_Type` varchar(15) NOT NULL,
  `Surname` varchar(25) NOT NULL,
  `Forename` varchar(30) NOT NULL,
  `Discipline` varchar(40) NOT NULL,
  `Level` varchar(10) NOT NULL,
  `Current` tinyint(1) NOT NULL,
  `Email` varchar(35) NOT NULL,
  `Password1` varchar(45) NOT NULL,
  `Reputation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `usertypes`
--

CREATE TABLE `usertypes` (
  `User_Type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `completedtasks`
--
ALTER TABLE `completedtasks`
  ADD PRIMARY KEY (`Task_ID`,`User_ID`,`Completed`),
  ADD KEY `CompTID` (`Task_ID`),
  ADD KEY `CompTUID` (`User_ID`),
  ADD KEY `CompBy` (`Completed_By`);

--
-- Indexes for table `expiredtasks`
--
ALTER TABLE `expiredtasks`
  ADD PRIMARY KEY (`Task_ID`),
  ADD KEY `UserId` (`User_ID`),
  ADD KEY `TaskType` (`Task_Type`),
  ADD KEY `FFormat` (`File_Format`),
  ADD KEY `Claimed_By` (`Claimed_By`),
  ADD KEY `Task_ID` (`Task_ID`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`Faculty`);

--
-- Indexes for table `fileformats`
--
ALTER TABLE `fileformats`
  ADD PRIMARY KEY (`Format`);

--
-- Indexes for table `flaggedtasks`
--
ALTER TABLE `flaggedtasks`
  ADD PRIMARY KEY (`Task_ID`),
  ADD KEY `UserId` (`User_ID`),
  ADD KEY `TaskType` (`Task_Type`),
  ADD KEY `FFormat` (`File_Format`),
  ADD KEY `Claimed_By` (`Claimed_By`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`Tag_ID`);

--
-- Indexes for table `tagsused`
--
ALTER TABLE `tagsused`
  ADD PRIMARY KEY (`TUID`),
  ADD KEY `Tag_ID` (`Tag_ID`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`Task_ID`),
  ADD KEY `UserId` (`User_ID`),
  ADD KEY `TaskType` (`Task_Type`),
  ADD KEY `FFormat` (`File_Format`),
  ADD KEY `Claimed_By` (`Claimed_By`);

--
-- Indexes for table `tasktypes`
--
ALTER TABLE `tasktypes`
  ADD PRIMARY KEY (`Task_Type`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `Discipline2` (`Discipline`),
  ADD KEY `Level` (`Level`),
  ADD KEY `User_Type` (`User_Type`),
  ADD KEY `Discipline` (`Discipline`);

--
-- Indexes for table `usertypes`
--
ALTER TABLE `usertypes`
  ADD PRIMARY KEY (`User_Type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flaggedtasks`
--
ALTER TABLE `flaggedtasks`
  MODIFY `Task_ID` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `Tag_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tagsused`
--
ALTER TABLE `tagsused`
  MODIFY `TUID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `Task_ID` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `expiredtasks`
--
ALTER TABLE `expiredtasks`
  ADD CONSTRAINT `expiredtasks_ibfk_1` FOREIGN KEY (`Task_ID`) REFERENCES `tasks` (`Task_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tagsused`
--
ALTER TABLE `tagsused`
  ADD CONSTRAINT `tagsused_ibfk_1` FOREIGN KEY (`Tag_ID`) REFERENCES `tags` (`Tag_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`Task_Type`) REFERENCES `tasktypes` (`Task_Type`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`File_Format`) REFERENCES `fileformats` (`Format`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_ibfk_3` FOREIGN KEY (`User_ID`) REFERENCES `userinfo` (`User_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD CONSTRAINT `userinfo_ibfk_2` FOREIGN KEY (`User_Type`) REFERENCES `usertypes` (`User_Type`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
