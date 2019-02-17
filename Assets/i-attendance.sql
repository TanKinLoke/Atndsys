-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2009 at 03:03 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `i-attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_record`
--

CREATE TABLE `activity_record` (
  `Activity_Name` varchar(50) NOT NULL,
  `Activity_Venue` varchar(50) NOT NULL,
  `Activity_Date` date NOT NULL,
  `Activity_Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table for Activity Record';

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
('1', 'Da', '12', 'a'),
('a', 'Db', '1234', 'a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`Student_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
