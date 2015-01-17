-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2014 at 10:12 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alumni`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE IF NOT EXISTS `alumni` (
  `Person_ID` int(11) NOT NULL,
  `Academic_Degree` char(20) DEFAULT NULL,
  `Major_Department_ID` int(11) NOT NULL,
  `Minor_department_ID` int(11) DEFAULT NULL,
  `Major_Advisor` char(20) DEFAULT NULL,
  `Graduation_year` year(4) DEFAULT NULL,
  `Linked_in_URL` varchar(500) DEFAULT NULL,
  `Facebook_URL` varchar(500) DEFAULT NULL,
  `Twitter_URL` varchar(500) DEFAULT NULL,
  `Fundraising_contribution` int(11) DEFAULT '0',
  `Committee_ID` int(11) NOT NULL,
  `Sport_Club_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`Person_ID`, `Academic_Degree`, `Major_Department_ID`, `Minor_department_ID`, `Major_Advisor`, `Graduation_year`, `Linked_in_URL`, `Facebook_URL`, `Twitter_URL`, `Fundraising_contribution`, `Committee_ID`, `Sport_Club_ID`) VALUES
(2, 'btech', 4, 2, 'ken schen', 2008, 'linkedin.com/swetha', 'facebook.com/swetha', 'twitter.com/swetha', 11902, 1, 2),
(9, '', 1, NULL, 'chen', 0000, '', '', '', 11902, 0, 0),
(10, '', 1, NULL, '', 0000, '', '', '', 11902, 0, 0),
(13, 'Masters', 2, NULL, 'Dr.Thompson', 2016, 'https://www.linked.com/profileid=213121', '', '', 0, 0, 0),
(15, '', 4, NULL, '', 0000, '', '', '', 0, 0, 0),
(16, '', 2, NULL, '', 0000, '', '', '', 0, 0, 0),
(17, '', 2, NULL, '', 2016, '', '', '', 0, 0, 0),
(18, '', 1, NULL, '', 0000, '', '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `alumni_admin`
--

CREATE TABLE IF NOT EXISTS `alumni_admin` (
  `Person_ID` int(11) NOT NULL,
  `Designation` char(50) DEFAULT NULL,
  `Office_Address` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni_admin`
--

INSERT INTO `alumni_admin` (`Person_ID`, `Designation`, `Office_Address`) VALUES
(1, 'admin', 'uncc'),
(12, 'Admin head', 'Woodward hall'),
(19, 'Admin Head', '');

-- --------------------------------------------------------

--
-- Table structure for table `alumni_event`
--

CREATE TABLE IF NOT EXISTS `alumni_event` (
  `Event_ID` int(11) NOT NULL,
  `Student_ID` int(11) NOT NULL,
  `Registered_Datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni_event`
--

INSERT INTO `alumni_event` (`Event_ID`, `Student_ID`, `Registered_Datetime`) VALUES
(1, 2, '2014-11-30 02:46:57'),
(3, 13, '2014-12-03 06:00:56');

-- --------------------------------------------------------

--
-- Stand-in structure for view `alumni_info`
--
CREATE TABLE IF NOT EXISTS `alumni_info` (
`Person_ID` int(11)
,`Academic_Degree` char(20)
,`Major_Department_ID` int(11)
,`Minor_department_ID` int(11)
,`Major_Advisor` char(20)
,`Graduation_year` year(4)
,`Linked_in_URL` varchar(500)
,`Facebook_URL` varchar(500)
,`Twitter_URL` varchar(500)
,`Fundraising_contribution` int(11)
,`Committee_ID` int(11)
,`Sport_Club_ID` int(11)
,`major` char(50)
,`minor` char(50)
,`Role_Description` char(100)
,`Sport_Name` char(20)
);
-- --------------------------------------------------------

--
-- Table structure for table `committee`
--

CREATE TABLE IF NOT EXISTS `committee` (
  `Committee_ID` int(11) NOT NULL,
  `Role_Description` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `committee`
--

INSERT INTO `committee` (`Committee_ID`, `Role_Description`) VALUES
(0, 'Not Applicable'),
(1, 'board of directors'),
(2, 'board of members');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `Department_ID` int(11) NOT NULL,
  `Department_Name` char(50) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Department_ID`, `Department_Name`, `Description`) VALUES
(1, 'College of Engineering', 'college of engineering'),
(2, 'College of Business', 'college of business'),
(3, 'College of Arts', 'college of arts'),
(4, 'College of Education', 'college of education');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
`Event_ID` int(11) NOT NULL,
  `Event_description` varchar(2000) NOT NULL,
  `Event_Title` varchar(200) DEFAULT NULL,
  `Event_Start_time` date DEFAULT NULL,
  `Event_End_time` date DEFAULT NULL,
  `Person_ID` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`Event_ID`, `Event_description`, `Event_Title`, `Event_Start_time`, `Event_End_time`, `Person_ID`) VALUES
(1, 'Thanks giving celebrations: Thanksgiving Day is a national holiday celebrated primarily in the United States and Canada as a day of giving thanks for the blessing of the harvest and of the preceding year. Several other places around the world observe similar celebrations. It is celebrated on the fourth Thursday of November in the United States and on the second Monday of October in Canada. Thanksgiving has its historical roots in religious and cultural traditions, and has long been celebrated in a secular manner as well.', 'thanks giving Buffet', '2014-11-25', '2014-11-29', 1),
(2, 'Black Friday is the Friday following Thanksgiving Day in the United States (the fourth Thursday of November), often regarded as the beginning of the Christmas shopping season. In recent years, most major retailers have opened very early and offered promotional sales to kick off the holiday shopping season, similar to Boxing Day sales in many Commonwealth nations. Black Friday is not a holiday, but California and some other states observe "The Day After Thanksgiving" as a holiday for state government employees, sometimes in lieu of another federal holiday such as Columbus Day.', 'Black friday.......', '2014-11-28', '2014-11-30', 1),
(3, 'Celebrations for students', 'Christmas Celebrations!!', '2014-12-24', '2014-12-25', 12),
(4, 'Get-to gether party for the alumni of University of north carolina at charlotte. Its appreciated if most of the alumni can be present', 'Get Together Party', '2014-12-09', '2014-12-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
`Event_ID` int(11) NOT NULL,
  `Event_description` varchar(2000) NOT NULL,
  `Event_Title` varchar(200) DEFAULT NULL,
  `Event_Start_time` datetime DEFAULT NULL,
  `Event_End_time` datetime DEFAULT NULL,
  `Person_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `Person_ID` int(11) NOT NULL,
  `Department_ID` int(11) NOT NULL,
  `Designation` char(50) DEFAULT NULL,
  `Personal_Website` varchar(500) DEFAULT NULL,
  `Office_Address` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`Person_ID`, `Department_ID`, `Designation`, `Personal_Website`, `Office_Address`) VALUES
(3, 1, 'professor', 'uncc.edu', 'woodward 210'),
(11, 1, 'Professor', '', ''),
(14, 1, 'Professor', 'http:// www.uncc.edu/asever', 'Woodward hall');

-- --------------------------------------------------------

--
-- Table structure for table `fundraising`
--

CREATE TABLE IF NOT EXISTS `fundraising` (
`fund_ID` int(11) NOT NULL,
  `person_ID` int(11) NOT NULL,
  `contribution_year` year(4) NOT NULL,
  `contribution_amount` int(11) NOT NULL,
  `contribution_purpose` varchar(500) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `fundraising`
--

INSERT INTO `fundraising` (`fund_ID`, `person_ID`, `contribution_year`, `contribution_amount`, `contribution_purpose`) VALUES
(7, 2, 2014, 22, 'sports1'),
(8, 2, 2014, 500, 'sports'),
(9, 10, 2014, 100, 'college of engineering'),
(10, 9, 2014, 11802, 'college of engineering');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
`Photo_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Photo_Name` varchar(100) DEFAULT NULL,
  `Photo_Description` varbinary(2000) DEFAULT NULL,
  `Updated_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`Photo_ID`, `User_ID`, `Photo_Name`, `Photo_Description`, `Updated_time`) VALUES
(24, 1, '1915794909.jpg', 0x48616c6c6f7765656e21212121212121, '2014-12-03 08:58:19'),
(25, 1, '2016392651.jpg', 0x556e6976657273697479, '2014-12-03 08:58:34'),
(26, 1, '627326950.jpg', 0x556e697665727369747920696e20736e6f77, '2014-12-03 08:58:50'),
(27, 1, '2140061464.jpg', 0x756e6363, '2014-12-03 08:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
`Person_ID` int(11) NOT NULL,
  `Username` char(50) NOT NULL,
  `Password` char(50) NOT NULL,
  `Email_address` char(50) NOT NULL,
  `Is_Alumni` char(1) NOT NULL DEFAULT 'N',
  `Is_Faculty` char(1) NOT NULL DEFAULT 'N',
  `Is_Admin` char(1) NOT NULL DEFAULT 'N',
  `First_Name` char(50) DEFAULT NULL,
  `Middle_Name` char(50) DEFAULT NULL,
  `Last_Name` char(50) DEFAULT NULL,
  `Address_Line1` varchar(500) DEFAULT NULL,
  `Address_Line2` varchar(500) DEFAULT NULL,
  `City` char(20) DEFAULT NULL,
  `State` char(20) DEFAULT NULL,
  `ZIP` char(20) DEFAULT NULL,
  `Mobile_number` char(20) DEFAULT NULL,
  `Photo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`Person_ID`, `Username`, `Password`, `Email_address`, `Is_Alumni`, `Is_Faculty`, `Is_Admin`, `First_Name`, `Middle_Name`, `Last_Name`, `Address_Line1`, `Address_Line2`, `City`, `State`, `ZIP`, `Mobile_number`, `Photo`) VALUES
(1, '1234', '81dc9bdb52d04dc20036dbd8313ed055', 'medavarapuswetha@gmail.com', 'N', 'N', '1', 'Swetha', '', 'medavarapu', '', '', '', '', '', '123456789', '1257612175.jpg'),
(2, '12345', '81dc9bdb52d04dc20036dbd8313ed055', 'osdfd@k.c', '1', 'N', 'N', 'lsdkf', 'kishan', 'sdfsdf', 'dfsdfsdfdsf', 'charlotte', 'sdfsdfsf', 'dsfsdfds', '65655555', '54565623233', '1000954539.jpg'),
(3, '789', '81dc9bdb52d04dc20036dbd8313ed055', 'ksdfsd@kk.c', 'N', '1', 'N', 'jkjxcjx', 'lasfjdf', 'kleurfb', 'charlotte', 'klasflsjdf', 'jkadsfkasdj', 'laksdjfaklsf', '230092', '23423432432', ''),
(9, 'vathsan', '202cb962ac59075b964b07152d234b70', 'vathsan.vk@gmail.com', '1', 'N', 'N', 'Srivathsan', '', 'VK', '', '', '', '', '', '', '442470981.JPG'),
(10, 'chandy1', '202cb962ac59075b964b07152d234b70', 'vathsan.vk@gmail.com', '1', 'N', 'N', 'Chandrachudeswaran', '', 'Sankar', '', '', '', '', '', '', '968735701.jpg'),
(11, 'pamela', '202cb962ac59075b964b07152d234b70', 'plthomps@uncc.edu', 'N', '1', 'N', 'Pamela', '', 'Thompson', '', '', 'Charlotte', '', '', '', '1129253364.jpg'),
(12, 'srini', '202cb962ac59075b964b07152d234b70', 'snambi@uncc.edu', 'N', 'N', '1', 'Srinivasan', '', 'Nambi', 'sdfdsf', 'bmm', 'Charlotte', 'NC', '28262', '12345679', '859364695.JPG'),
(13, 'james', '202cb962ac59075b964b07152d234b70', 'james@uncc.edu', '1', 'N', 'N', 'James', '', 'Scarboro', 'NC', '', 'Charlotte', 'NC', '12345', '54545', '1056019367.JPG'),
(14, 'alisever', '202cb962ac59075b964b07152d234b70', 'asever@uncc.edu', 'N', '1', 'N', 'Dr.Ali', '', 'Sever', 'University lane', 'apartment E', 'charlotte', 'North Carolina', '28262', '1212121', NULL),
(15, ' dany', '202cb962ac59075b964b07152d234b70', 'danile@uncc.edu', '1', 'N', 'N', 'Daniel', '', 'Shen', '', '', '', '', '', '', NULL),
(16, 'ekta', '202cb962ac59075b964b07152d234b70', 'ekta@uncc.edu', '1', 'N', 'N', 'Ekta', '', 'Dosad', '1', 'apartment E', 'charlotte', 'North Carolina', '28262', '', NULL),
(17, 'daniel', '202cb962ac59075b964b07152d234b70', 'abc@123.edu', '1', 'N', 'N', 'daniel', '', 'shen', '1', '', 'charlotte', 'NC', '28262', '123', NULL),
(18, 'vinoth', '202cb962ac59075b964b07152d234b70', 'vinoth@uncc.edu', '1', 'N', 'N', 'Vinoth', '', 'S', '', '', '', '', '', '', NULL),
(19, 'shwetha', '202cb962ac59075b964b07152d234b70', 'shwetha@uncc.edu', 'N', 'N', '1', 'Shwetha', '', 'M', '', '', '', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_comments`
--

CREATE TABLE IF NOT EXISTS `personal_comments` (
  `Alumni_Person_ID` int(11) NOT NULL,
  `Faculty_Person_ID` int(11) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Comment_Desciption` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personal_comments`
--

INSERT INTO `personal_comments` (`Alumni_Person_ID`, `Faculty_Person_ID`, `Timestamp`, `Comment_Desciption`) VALUES
(9, 11, '0000-00-00 00:00:00', 'He shifted to Raleigh'),
(9, 11, '2014-12-03 08:25:36', 'He also did PHD in UNCC'),
(9, 11, '2014-12-03 08:50:58', 'Hello how are you'),
(2, 11, '2014-12-03 08:54:18', 'Hi');

-- --------------------------------------------------------

--
-- Table structure for table `sport_club`
--

CREATE TABLE IF NOT EXISTS `sport_club` (
  `Sport_Club_ID` int(11) NOT NULL,
  `Sport_Name` char(20) NOT NULL,
  `Club_Name` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sport_club`
--

INSERT INTO `sport_club` (`Sport_Club_ID`, `Sport_Name`, `Club_Name`) VALUES
(0, 'Not Applicable', ''),
(1, 'basketball', 'bsk ball'),
(2, 'tennis', 'tennis');

-- --------------------------------------------------------

--
-- Structure for view `alumni_info`
--
DROP TABLE IF EXISTS `alumni_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `alumni_info` AS select `p`.`Person_ID` AS `Person_ID`,`p`.`Academic_Degree` AS `Academic_Degree`,`p`.`Major_Department_ID` AS `Major_Department_ID`,`p`.`Minor_department_ID` AS `Minor_department_ID`,`p`.`Major_Advisor` AS `Major_Advisor`,`p`.`Graduation_year` AS `Graduation_year`,`p`.`Linked_in_URL` AS `Linked_in_URL`,`p`.`Facebook_URL` AS `Facebook_URL`,`p`.`Twitter_URL` AS `Twitter_URL`,`p`.`Fundraising_contribution` AS `Fundraising_contribution`,`p`.`Committee_ID` AS `Committee_ID`,`p`.`Sport_Club_ID` AS `Sport_Club_ID`,`d`.`Department_Name` AS `major`,`dp`.`Department_Name` AS `minor`,`c`.`Role_Description` AS `Role_Description`,`s`.`Sport_Name` AS `Sport_Name` from ((((`alumni` `p` join `department` `d` on((`p`.`Major_Department_ID` = `d`.`Department_ID`))) left join `department` `dp` on((`p`.`Minor_department_ID` = `dp`.`Department_ID`))) join `committee` `c` on((`c`.`Committee_ID` = `p`.`Committee_ID`))) join `sport_club` `s` on((`s`.`Sport_Club_ID` = `p`.`Sport_Club_ID`)));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
 ADD PRIMARY KEY (`Person_ID`), ADD KEY `IX2_Major_Dept_ID` (`Major_Department_ID`), ADD KEY `IX3_Minor_Dept_ID` (`Minor_department_ID`), ADD KEY `IX4_Committee_ID` (`Committee_ID`), ADD KEY `IX5_SPORT_CLUB_ID` (`Sport_Club_ID`), ADD KEY `IX1_graduation_year` (`Graduation_year`);

--
-- Indexes for table `alumni_admin`
--
ALTER TABLE `alumni_admin`
 ADD PRIMARY KEY (`Person_ID`);

--
-- Indexes for table `alumni_event`
--
ALTER TABLE `alumni_event`
 ADD PRIMARY KEY (`Event_ID`,`Student_ID`);

--
-- Indexes for table `committee`
--
ALTER TABLE `committee`
 ADD PRIMARY KEY (`Committee_ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
 ADD PRIMARY KEY (`Department_ID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
 ADD PRIMARY KEY (`Event_ID`), ADD KEY `IX1_Person_ID` (`Person_ID`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`Event_ID`), ADD KEY `IX1_Person_ID` (`Person_ID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
 ADD PRIMARY KEY (`Person_ID`), ADD KEY `IX2_DEPT_ID` (`Department_ID`);

--
-- Indexes for table `fundraising`
--
ALTER TABLE `fundraising`
 ADD PRIMARY KEY (`fund_ID`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
 ADD PRIMARY KEY (`Photo_ID`), ADD KEY `UPDATES` (`User_ID`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
 ADD PRIMARY KEY (`Person_ID`), ADD UNIQUE KEY `User_ID` (`Username`), ADD KEY `IX1_Username` (`Username`), ADD KEY `Password` (`Password`), ADD KEY `First_Name` (`First_Name`), ADD KEY `Last_Name` (`Last_Name`), ADD KEY `Photo` (`Photo`);

--
-- Indexes for table `personal_comments`
--
ALTER TABLE `personal_comments`
 ADD PRIMARY KEY (`Timestamp`,`Alumni_Person_ID`,`Faculty_Person_ID`), ADD KEY `VIEWS` (`Alumni_Person_ID`), ADD KEY `POSTED_BY` (`Faculty_Person_ID`);

--
-- Indexes for table `sport_club`
--
ALTER TABLE `sport_club`
 ADD PRIMARY KEY (`Sport_Club_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
MODIFY `Event_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `Event_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fundraising`
--
ALTER TABLE `fundraising`
MODIFY `fund_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
MODIFY `Photo_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
MODIFY `Person_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumni`
--
ALTER TABLE `alumni`
ADD CONSTRAINT `ALUMNI_LOGIN` FOREIGN KEY (`Person_ID`) REFERENCES `person` (`Person_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `MAJORING_IN` FOREIGN KEY (`Major_Department_ID`) REFERENCES `department` (`Department_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `MEMBER_OF` FOREIGN KEY (`Committee_ID`) REFERENCES `committee` (`Committee_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `MINORS_IN` FOREIGN KEY (`Minor_department_ID`) REFERENCES `department` (`Department_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `PLAYS_FOR` FOREIGN KEY (`Sport_Club_ID`) REFERENCES `sport_club` (`Sport_Club_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `alumni_admin`
--
ALTER TABLE `alumni_admin`
ADD CONSTRAINT `ADMIN_LOGIN` FOREIGN KEY (`Person_ID`) REFERENCES `person` (`Person_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
ADD CONSTRAINT `CREATES` FOREIGN KEY (`Person_ID`) REFERENCES `alumni_admin` (`Person_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
ADD CONSTRAINT `FACULTY_LOGIN` FOREIGN KEY (`Person_ID`) REFERENCES `person` (`Person_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `HAS` FOREIGN KEY (`Department_ID`) REFERENCES `department` (`Department_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
ADD CONSTRAINT `UPDATES` FOREIGN KEY (`User_ID`) REFERENCES `person` (`Person_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `personal_comments`
--
ALTER TABLE `personal_comments`
ADD CONSTRAINT `POSTED_BY` FOREIGN KEY (`Faculty_Person_ID`) REFERENCES `faculty` (`Person_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `VIEWS` FOREIGN KEY (`Alumni_Person_ID`) REFERENCES `alumni` (`Person_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
