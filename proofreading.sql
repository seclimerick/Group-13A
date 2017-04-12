-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2017 at 06:53 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proofreading`
--

-- --------------------------------------------------------

--
-- Table structure for table `completedtasks`
--

CREATE TABLE `completedtasks` (
  `Task_ID` smallint(6) NOT NULL,
  `Student_ID` bigint(20) NOT NULL,
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
  `Student_ID` bigint(20) NOT NULL,
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
  `Student_ID` bigint(20) NOT NULL,
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
  `Student_ID` bigint(20) DEFAULT NULL,
  `Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Deadline` date NOT NULL,
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
  `Claimed_By` bigint(20) DEFAULT '0',
  `Flagged` tinyint(1) DEFAULT '0',
  `Completed` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`Task_ID`, `Student_ID`, `Date`, `Deadline`, `Task_Type`, `Title`, `Req_Words`, `Word_Count`, `Total_Pages`, `File_Format`, `Due_Date`, `Due_Time`, `Description`, `Tag`, `Claimed_By`, `Flagged`, `Completed`) VALUES
(30, 15171789, '2017-04-12 12:01:39', '2017-05-11', 'Assignment', 'Designing A Web Based Database', 3000, 3000, 7, 'Docx', '2017-04-12', '17:00:00', 'Project', 'Database Design', 0, 0, 0);

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
  `Student_ID` bigint(20) NOT NULL,
  `User_Type` varchar(15) DEFAULT NULL,
  `Surname` varchar(25) NOT NULL,
  `Forename` varchar(30) NOT NULL,
  `Discipline` varchar(40) NOT NULL,
  `Level` varchar(10) NOT NULL,
  `Current` tinyint(1) DEFAULT NULL,
  `Email` varchar(35) NOT NULL,
  `Password1` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`Student_ID`, `User_Type`, `Surname`, `Forename`, `Discipline`, `Level`, `Current`, `Email`, `Password1`) VALUES
(15168841, 'Moderator', 'Carr', 'Shane', 'Software Engineering', 'MSc', 1, '15168841@stumail.ul.ie', '4652f3d2c1b8695e99edf534d431c530b1752c1b17c40'),
(15171789, 'Student', 'Fitzpatrick', 'John', 'Computing Technologies', 'BSc', 1, '15171789@stumail.ul.ie', '4652f3d2c1b8695e99edf534d431c530b1752c1b17c40'),
(15181596, 'Student', 'O\'Callaghan', 'Michael', 'Product Design and Technology', 'BSc', 1, '15181596@stumail.ul.ie', '4652f3d2c1b8695e99edf534d431c530b1752c1b17c40'),
(15183796, 'Student', 'Sexton', 'Thomas', 'Law and Accounting', 'BA', 1, '15183796@stumail.ul.ie', '4652f3d2c1b8695e99edf534d431c530b1752c1b17c40'),
(15186185, 'Student', 'O\'Mahoney', 'Geraldine', 'Nursing (Intellectual Disability)', 'BSc', 1, '15186185@stumail.ul.ie', '4652f3d2c1b8695e99edf534d431c530b1752c1b17c40'),
(15196623, 'Moderator', 'Daly', 'Ciara', 'Nursing (Mental Health)', 'BSc', 1, '15196623@stumail.ul.ie', '4652f3d2c1b8695e99edf534d431c530b1752c1b17c40'),
(16113232, 'Moderator', 'Li', 'Nan', 'Product Design and Technology', 'MSc', 1, '16113232@stumail.ul.ie', '4652f3d2c1b8695e99edf534d431c530b1752c1b17c40'),
(16115224, 'Student', 'Bartkowski', 'Katarzyna', 'Midwifery', 'BSc', 1, '16115224@stumail.ul.ie', '4652f3d2c1b8695e99edf534d431c530b1752c1b17c40'),
(16121516, 'Moderator', 'Matthews', 'George', 'Sport and Exercise Sciences', 'BSc', 1, '16121516@stumail.ul.ie', '4652f3d2c1b8695e99edf534d431c530b1752c1b17c40'),
(16123234, 'Student', 'O\'Leary', 'Michael', 'Software Engineering', 'MSc', 1, '16123234@stumail.ul.ie', '4652f3d2c1b8695e99edf534d431c530b1752c1b17c40'),
(16123555, 'Student', 'Moneke', 'Zviko', 'Nursing (Mental Health)', 'BSc', 1, '16123555', '4652f3d2c1b8695e99edf534d431c530b1752c1b17c40'),
(16127959, 'Student', 'O\'Callaghan', 'Michael', 'Computing Technologies', 'BSc', 1, '16127959@stumail.ul.ie', '4652f3d2c1b8695e99edf534d431c530b1752c1b17c40'),
(16131657, 'Student', 'Walters', 'David', 'Sport and Exercise Sciences', 'BSc', 1, '16131657@stumail.ul.ie', '4652f3d2c1b8695e99edf534d431c530b1752c1b17c40'),
(16142511, 'Student', 'Frawley', 'Cathal', 'Sport and Exercise Sciences', 'BSc', 1, '16142511@stumail.ul.ie', '4652f3d2c1b8695e99edf534d431c530b1752c1b17c40'),
(16144556, 'Moderator', 'Browne', 'Martin', 'Law and Accounting', 'MA', 1, '16144556@stumail.ul.ie', '4652f3d2c1b8695e99edf534d431c530b1752c1b17c40'),
(16168941, 'Student', 'White', 'Mary', 'Law and Accounting', 'BA', 1, '16168941@stumail.ul.ie', '4652f3d2c1b8695e99edf534d431c530b1752c1b17c40'),
(16172526, 'Student', 'Czech', 'Tomasz', 'Law and Accounting', 'BA', 1, '16172526@stumail.ul.ie', '4652f3d2c1b8695e99edf534d431c530b1752c1b17c40'),
(16172845, 'Student', 'O\'Donnell', 'Siobhan', 'Computing Technologies', 'MSc', 1, '16172845@stumail.ul.ie', '4652f3d2c1b8695e99edf534d431c530b1752c1b17c40'),
(16181654, 'Student', 'O\'Gorman', 'Thomas', 'Law and Accounting', 'MA', 1, '16181654@stumail.ul.ie', '4652f3d2c1b8695e99edf534d431c530b1752c1b17c40'),
(16186149, 'Student', 'Manley', 'Shannon', 'Nursing (Mental Health)', 'BSc', 1, '16186149@stumail.ul.ie', '4652f3d2c1b8695e99edf534d431c530b1752c1b17c40');

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
  ADD PRIMARY KEY (`Task_ID`,`Student_ID`,`Completed`);

--
-- Indexes for table `expiredtasks`
--
ALTER TABLE `expiredtasks`
  ADD PRIMARY KEY (`Task_ID`);

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
  ADD PRIMARY KEY (`Task_ID`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`Tag_ID`);

--
-- Indexes for table `tagsused`
--
ALTER TABLE `tagsused`
  ADD PRIMARY KEY (`TUID`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`Task_ID`);

--
-- Indexes for table `tasktypes`
--
ALTER TABLE `tasktypes`
  ADD PRIMARY KEY (`Task_Type`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`Student_ID`);

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
  MODIFY `Task_ID` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
