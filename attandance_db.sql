-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2024 at 10:22 PM
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
-- Table structure for table `add_records_student`
--

CREATE TABLE `add_records_student` (
  `r_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `reg_number` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `department_code` varchar(255) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `department_code` varchar(50) NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_student_tb`
--

INSERT INTO `add_student_tb` (`SID`, `student_name`, `reg_number`, `course_code`, `semester`, `department_code`, `status`) VALUES
(1, 'kululinda mlekwa', 'T21-03-07893', 'CD111', '2', 'IST', 1),
(2, 'mussa emanuel', 'T21-03-06784', 'CD111', '2', 'IST', 0),
(3, 'thani thani', 'T21-03-45637', 'CD111', '2', 'IST', 0),
(4, 'thani thani', 'T21-03-06784', 'CD111', '2', 'IST', 0),
(5, 'gloria robinson', 'T21-03-78654', 'IT213', 'two', 'CSE', 1),
(6, 'Ester', 'T21-03-09876', 'IT213', 'two', 'CSE', 0),
(7, 'REAH', 'T25-=03-07554', 'IT213', 'two', 'CSE', 1),
(8, 'mimi', 'T21-03-65321', 'CD111', 'two', 'CSE', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attendence_records`
--

CREATE TABLE `attendence_records` (
  `id` int(11) NOT NULL,
  `reg_number` varchar(255) NOT NULL,
  `attendence_date` date NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendence_records`
--

INSERT INTO `attendence_records` (`id`, `reg_number`, `attendence_date`, `status`) VALUES
(36, 'T21-03-06784', '2024-01-28', 0),
(37, 'T21-03-07893', '2024-01-28', 0),
(38, 'T21-03-45637', '2024-01-28', 1),
(39, 'T21-03-65321', '2024-01-28', 0),
(40, 'T21-03-78654', '2024-01-28', 1),
(41, 'T21-03-09876', '2024-01-28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password_tb`
--

CREATE TABLE `forgot_password_tb` (
  `FID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `timestamp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forgot_password_tb`
--

INSERT INTO `forgot_password_tb` (`FID`, `email`, `token`, `timestamp`) VALUES
(1, 'finaldeveloper20@gmail.com', '6f105c6297caba8cf9b9280288b85bcde8e9c1f30fb4dc1ac402180f44f13eb3', '0000-00-00'),
(2, 'finaldeveloper20@gmail.com', 'd2d9e0cd7f8cdda5d7188ab1595e974933774f642cbd8470cac3b4f672ca9fdb', '0000-00-00'),
(3, 'finaldeveloper20@gmail.com', '449baf70a96dac1c51a232ecfb23954df1226073f0932c6be68c8ba8204bda89', '0000-00-00'),
(4, 'finaldeveloper20@gmail.com', '0eb72a5795e0339e7d577556ce25bc63d046df29df43a6b399ce8c9b87510e67', '0000-00-00'),
(5, 'finaldeveloper20@gmail.com', 'a45f365a354b0014e43d45737c4fed70071ce97266114f7e2f24fa92554c4044', '0000-00-00'),
(6, 'finaldeveloper20@gmail.com', '7c5f3dd1d44b398e5c54e58be6e184a6dcf7edc1adc2347edd0024525ea19f03', '0000-00-00'),
(7, 'finaldeveloper20@gmail.com', 'cfeb80f3ec0612fcfb988fa651e949cd8083ee9d781a7cb8d5496d07c8f4b666', '0000-00-00'),
(8, 'finaldeveloper20@gmail.com', '6eb7b4390d0e5cd5358686338822d97c840dfa3a88f257c97d1d5cfc81015040', '0000-00-00'),
(9, 'finaldeveloper20@gmail.com', '5749b4618238dec2a895968516625aa4d98415f510c4fcc2bed9b2aa98fedf46', '0000-00-00'),
(10, 'finaldeveloper20@gmail.com', 'd3f6ef32f6cee3132322831d72e0afb21f5e86fe6808717915dde7705a248f8b', '0000-00-00'),
(11, 'finaldeveloper20@gmail.com', '4f89adb16bee70f4968349c223207793ab8ce36175fe50142267aa1d106bb104', '0000-00-00');

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
-- Indexes for table `add_records_student`
--
ALTER TABLE `add_records_student`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `add_student_tb`
--
ALTER TABLE `add_student_tb`
  ADD PRIMARY KEY (`SID`);

--
-- Indexes for table `attendence_records`
--
ALTER TABLE `attendence_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgot_password_tb`
--
ALTER TABLE `forgot_password_tb`
  ADD PRIMARY KEY (`FID`);

--
-- Indexes for table `user_tb`
--
ALTER TABLE `user_tb`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_records_student`
--
ALTER TABLE `add_records_student`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `add_student_tb`
--
ALTER TABLE `add_student_tb`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `attendence_records`
--
ALTER TABLE `attendence_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `forgot_password_tb`
--
ALTER TABLE `forgot_password_tb`
  MODIFY `FID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_tb`
--
ALTER TABLE `user_tb`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
