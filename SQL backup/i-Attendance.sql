-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 19, 2019 at 01:47 PM
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
  `pkey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_attendance`
--

INSERT INTO `activity_attendance` (`Activity_Name`, `Student_Name`, `Student_ID`, `pkey`) VALUES
('General Meeting', '1', '12', 6);

-- --------------------------------------------------------

--
-- Table structure for table `activity_record`
--

CREATE TABLE `activity_record` (
  `Activity_Name` varchar(50) NOT NULL,
  `Activity_Venue` varchar(50) NOT NULL,
  `Activity_Date` date NOT NULL,
  `Activity_Start_Time` varchar(15) NOT NULL,
  `Activity_End_Time` varchar(15) NOT NULL,
  `pkey` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table for Activity Record';

--
-- Dumping data for table `activity_record`
--

INSERT INTO `activity_record` (`Activity_Name`, `Activity_Venue`, `Activity_Date`, `Activity_Start_Time`, `Activity_End_Time`, `pkey`) VALUES
('Test', 'i-CreatorZ Hub', '2019-02-17', '10:30 am', '12:30 pm', 35),
('First Activity', 'i-CreatorZ Hub', '2019-02-28', '10:30 am', '12:30 pm', 36),
('test', 'i-CreatorZ Hub', '2019-03-16', '10:30 am', '12:30 pm', 37);

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
('Auditorium'),
('i-CreatorZ Hub'),
('Penang Science Cluster');

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
('ZXIU', 'D1111', '8712', '4SK1'),
('kin loke', 'D3276', '817212', '4sk1'),
('CHEAH ZIXU', 'D3503', '12345567', '4SK2'),
('ZIXU', 'E3508', 'fhfgfhjfh', '5AK5');

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
  ADD PRIMARY KEY (`pkey`);

--
-- Indexes for table `Activity_Venue`
--
ALTER TABLE `Activity_Venue`
  ADD PRIMARY KEY (`Venue`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`Student_ID`);

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
  MODIFY `pkey` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
