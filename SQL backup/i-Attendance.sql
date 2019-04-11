-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 03, 2019 at 01:13 PM
-- Server version: 10.3.12-MariaDB
-- PHP Version: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `i-Attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_attendance`
--

CREATE TABLE `activity_attendance` (
  `Activity_Name` varchar(50) DEFAULT NULL,
  `Student_Name` varchar(50) DEFAULT NULL,
  `Student_ID` varchar(5) DEFAULT NULL,
  `Class` varchar(5) NOT NULL,
  `pkey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_attendance`
--

INSERT INTO `activity_attendance` (`Activity_Name`, `Student_Name`, `Student_ID`, `Class`, `pkey`) VALUES
('Test1', 'H&#039;ng Cherng Khai', 'D3232', '4SA3', 5),
('Test1', 'Bryan Lai', 'D3676', '5SK2', 6);

-- --------------------------------------------------------

--
-- Table structure for table `activity_record`
--

CREATE TABLE `activity_record` (
  `Activity_Name` varchar(50) NOT NULL,
  `Activity_Venue` varchar(50) NOT NULL,
  `Activity_Date` varchar(10) NOT NULL,
  `Activity_Start_Time` varchar(15) NOT NULL,
  `Activity_End_Time` varchar(15) NOT NULL,
  `pkey` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table for Activity Record';

--
-- Dumping data for table `activity_record`
--

INSERT INTO `activity_record` (`Activity_Name`, `Activity_Venue`, `Activity_Date`, `Activity_Start_Time`, `Activity_End_Time`, `pkey`) VALUES
('Test1', 'Bryan&#039;s house', '2019-04-01', '10:20 am', '12:20 pm', 10),
('Arduino Workshop', 'Penang Science Cluster', '2019-04-02', '10:30 am', '12:30 pm', 11),
('Test2', 'Bryan&#039;s house', '2019-04-03', '10:30 am', '12:30 pm', 12);

-- --------------------------------------------------------

--
-- Table structure for table `Activity_Venue`
--

CREATE TABLE `Activity_Venue` (
  `Venue` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Activity_Venue`
--

INSERT INTO `Activity_Venue` (`Venue`) VALUES
('a'),
('Auditorium'),
('b'),
('Bryan&#039;s house'),
('c'),
('cr'),
('d'),
('dg'),
('dh'),
('dj'),
('dk'),
('dr'),
('dt'),
('du'),
('dy'),
('e'),
('f'),
('i-CreatorZ Hub'),
('kd'),
('Penang Science Cluster'),
('td'),
('ud'),
('yd');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `Student_Name` varchar(50) NOT NULL,
  `Student_ID` varchar(5) NOT NULL,
  `Card_ID` varchar(12) NOT NULL,
  `Class` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`Student_Name`, `Student_ID`, `Card_ID`, `Class`) VALUES
('BRYAN LAI WEI MING', 'D2940', '1754820906', '5SK2'),
('GABRIEL SOON CHAI LONG', 'D3010', '0071163430', '5SA1'),
('KHAW EUGENE', 'D3068', '1754562186', '5SA6'),
('KHAW ZHAN KHAI', 'D3071', '1754022154', '5SA1'),
('KOAY XIAN CONG', 'D3093', '1754735178', '5SA1'),
('LIM ZHE YUAN', 'D3147', '1754192842', '5SK1'),
('LOH ZENG MING', 'D3159', '3915336058', '5SA2'),
('NICHOLAS CHUAN DER LI', 'D3197', '1755995066', '5SB4'),
('TAN KIN LOKE', 'D3276', '1756421306', '5SK1'),
('TIN SHAN WEN', 'D3326', '1756088186', '5SK1'),
('VICTOR TAN KAH PING', 'D3332', '0070922902', '5SA3'),
('ANG WAI LOON', 'D3476', '1756763018', '4SK1'),
('BENJIN LEE QIAO CHEN', 'D3482', '1754445162', '4SA1'),
('CHEAH EE CHENG', 'D3499', '1756533226', '4SK1'),
('CHEAH ZIXU', 'D3503', '1755988074', '4SK2'),
('DING ZHUANG QIN', 'D3549', '1754547818', '4SA2'),
('H&#039;NG CHERNG KHAI', 'D3579', '1756400698', '4SA3'),
('JOSHUA LIM CHIEW KHOON', 'D3599', '0054981892', '4SA3'),
('LIM HEE SZEN', 'D3655', '3060116882', '4SA2'),
('LIM JUN YI', 'D3661', '3059852066', '4SA3'),
('LIM ZHEN YANG', 'D3671', '1674290439', '4SA3'),
('OO JIAN HONG', 'D3710', '1345372423', '4SA1'),
('OOI JUN XIANG', 'D3715', '0058549332', '4SK2'),
('TAN HAO YANG', 'D3744', '1750575111', '4SK2'),
('TAN JIA ERN', 'D3748', '0702551910', '4SA4'),
('TEH BING JIE', 'D3784', '0070654150', '4SA1'),
('THAM YONG SHIANG', 'D3799', '3059873586', '4SA1'),
('WONG XUAN BIN', 'D3816', '3060113234', '4SK2'),
('ANDREW PHENG QI JINN', 'D3923', '0070964070', '3SK1'),
('HEW JIN HONG', 'D3933', '0070751846', '3SK1'),
('LAWRENCE LOCK CHENG JUN', 'D3943', '0073475222', '3SK2'),
('LIM EUGENE', 'D3948', '0070651094', '3SK1'),
('NG YI HENG', 'D3956', '0070952726', '3SK2'),
('OOI KAI YUNN', 'D3962', '0070926102', '3SK3'),
('RYAN CHIN JIAN HWA', 'D3968', '0070807958', '3SK1'),
('SIM SZE YU', 'D3970', '0071091446', '3SK2'),
('SOO QI REN', 'D3971', '0071344678', '3SK3'),
('TAN CHOON WEI', 'D3973', '0058027092', '3SK3'),
('TAN CHUEN KEAT', 'D3974', '4203850564', '3SK1'),
('TAN YI WEI', 'D3980', '0070880166', '3SK3'),
('TEW ZHE KHAI', 'D3984', '0070654470', '3SK2'),
('YEAP TEIK LIANG', 'D3988', '0071053926', '3SK3'),
('LEE REN HUAI', 'D4105', '4206574836', '3TA3'),
('TEOH ZI HONG', 'D4227', '0072562038', '3SK1'),
('ALDEN GOH KAI RAY', 'D4389', '0054945620', '2SK1'),
('LEE XIAN YAO', 'D4433', '0058103684', '2SK3'),
('SOON HAI QIN', 'D4469', '0055212244', '2SK1'),
('GOH KHOON HENG', 'D4563', '3114776529', '2TC2'),
('LEE YI FAN', 'D4626', '3114761999', '2TA4'),
('LEONG JIA SERN', 'D4630', '3914907165', '2TA3'),
('SOONG CHEOK WAYNE', 'D4711', '3914830207', '2TA4'),
('YEOH KEVAN', 'D4765', '0058719668', '2TA2'),
('WONG YUAN HONG', 'D4840', '', '2SK4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_attendance`
--
ALTER TABLE `activity_attendance`
  ADD PRIMARY KEY (`pkey`);

--
-- Indexes for table `activity_record`
--
ALTER TABLE `activity_record`
  ADD PRIMARY KEY (`pkey`),
  ADD UNIQUE KEY `Activity_Name` (`Activity_Name`);

--
-- Indexes for table `Activity_Venue`
--
ALTER TABLE `Activity_Venue`
  ADD PRIMARY KEY (`Venue`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`Student_ID`),
  ADD UNIQUE KEY `Card_ID` (`Card_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_attendance`
--
ALTER TABLE `activity_attendance`
  MODIFY `pkey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `activity_record`
--
ALTER TABLE `activity_record`
  MODIFY `pkey` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
