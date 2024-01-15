-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2024 at 11:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attandance_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_student_tb`
--

CREATE TABLE `add_student_tb` (
  `SID` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `reg_number` varchar(225) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `department_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_student_tb`
--

INSERT INTO `add_student_tb` (`SID`, `student_name`, `reg_number`, `course_code`, `semester`, `department_code`) VALUES
(1, 'kululinda mlekwa', 'T21-03-07893', 'CD111', '2', 'IST'),
(2, 'mussa emanuel', 'T21-03-06784', 'CD111', '2', 'IST'),
(3, 'thani thani', 'T21-03-45637', 'CD111', '2', 'IST'),
(4, 'thani thani', 'T21-03-06784', 'CD111', '2', 'IST'),
(5, 'gloria robinson', 'T21-03-78654', 'IT213', 'two', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
--

CREATE TABLE `user_tb` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` int(50) NOT NULL,
  `lecturer_id` varchar(50) NOT NULL,
  `course_name` varchar(20) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `department_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`user_id`, `full_name`, `email`, `phone_number`, `lecturer_id`, `course_name`, `course_code`, `semester`, `class_name`, `username`, `password`, `department_code`) VALUES
(1, 'kubehwa mlekwa', 'kubehwa@gmail.com', 423434223, 'DD3', 'computer', 'CD111', '2', 'lrb123', 'hakimu', 'admin3', 'IST'),
(2, 'chesco', 'chesco@gmail.com', 423425346, 'CC2', 'IT security', 'IT213', 'two', 'LRB105', 'mahenge', 'admin4', 'CSE'),
(3, 'chesco', 'chesco@gmail.com', 423425346, 'CC2', 'IT security', 'IT213', 'two', 'LRB105', 'mahenge', 'admi4', 'CSE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_student_tb`
--
ALTER TABLE `add_student_tb`
  ADD PRIMARY KEY (`SID`);

--
-- Indexes for table `user_tb`
--
ALTER TABLE `user_tb`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_student_tb`
--
ALTER TABLE `add_student_tb`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_tb`
--
ALTER TABLE `user_tb`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
