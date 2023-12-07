-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2023 at 01:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nitttraining`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblagencies`
--

CREATE TABLE `tblagencies` (
  `id` int(11) NOT NULL,
  `name` varchar(400) NOT NULL,
  `state` varchar(20) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(300) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblagencies`
--

INSERT INTO `tblagencies` (`id`, `name`, `state`, `contact_person`, `phone`, `email`, `address`) VALUES
(1, 'ABU', 'Katsina', 'Umar Balarabe', '08036416987', 'ubaz@gmail.com', 'AA');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategories`
--

CREATE TABLE `tblcategories` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcategories`
--

INSERT INTO `tblcategories` (`id`, `category`) VALUES
(1, 'Customised'),
(2, 'Scheduled');

-- --------------------------------------------------------

--
-- Table structure for table `tblcourses`
--

CREATE TABLE `tblcourses` (
  `course_id` int(11) NOT NULL,
  `course` varchar(400) NOT NULL,
  `category_id` int(11) NOT NULL,
  `duration` varchar(300) NOT NULL,
  `fee` double NOT NULL,
  `institution_percentage` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `trans_by` varchar(300) NOT NULL,
  `trans_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcourses`
--

INSERT INTO `tblcourses` (`course_id`, `course`, `category_id`, `duration`, `fee`, `institution_percentage`, `status`, `trans_by`, `trans_date`) VALUES
(1, 'Diploma in accounting', 1, '3', 0, 12, 1, 'ubaz', '2023-09-05 21:44:05'),
(2, 'Diploma in accounting1', 1, '4', 0, 11, 1, 'ubaz', '2023-09-05 21:45:03'),
(5, 'Diploma in accounting222', 2, '1', 323232, 1, 1, 'ubaz', '2023-09-05 21:45:45');

-- --------------------------------------------------------

--
-- Table structure for table `tblcourse_enrolment`
--

CREATE TABLE `tblcourse_enrolment` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `coordinator_id` int(11) NOT NULL,
  `course_classification` enum('Customised','Scheduled','','') NOT NULL,
  `venue_id` int(11) NOT NULL,
  `course_fee` float NOT NULL,
  `per_institution` double NOT NULL,
  `start_date` date NOT NULL,
  `ending_date` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcourse_enrolment`
--

INSERT INTO `tblcourse_enrolment` (`id`, `course_id`, `coordinator_id`, `course_classification`, `venue_id`, `course_fee`, `per_institution`, `start_date`, `ending_date`, `status`) VALUES
(2, 1, 2, 'Customised', 1, 222, 0, '0000-00-00', '0000-00-00', ''),
(3, 2, 2, 'Customised', 2, 12, 0, '0000-00-00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblroles`
--

CREATE TABLE `tblroles` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblroles`
--

INSERT INTO `tblroles` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Coordinator'),
(3, 'Director'),
(4, 'Management'),
(5, 'SA'),
(6, 'TA');

-- --------------------------------------------------------

--
-- Table structure for table `tblschoolinfo`
--

CREATE TABLE `tblschoolinfo` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `state` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `trans_by` varchar(200) NOT NULL,
  `trans_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `email`, `fullname`, `phone`, `role`, `status`, `trans_by`, `trans_date`) VALUES
(2, 'ubaz@gmail.com', 'Umar Balarabe', '99', 1, 0, 'ubaz', '2023-09-05 21:18:58'),
(12, 'aashehu.cs@buk.edu.ng', 'Umar Balarabe AA', '09156204078', 1, 1, 'ubaz', '2023-09-05 21:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblvenue`
--

CREATE TABLE `tblvenue` (
  `id` int(11) NOT NULL,
  `venue_name` varchar(300) NOT NULL,
  `trans_by` varchar(100) NOT NULL,
  `trans_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblvenue`
--

INSERT INTO `tblvenue` (`id`, `venue_name`, `trans_by`, `trans_date`) VALUES
(1, 'CIT', '', '2023-09-06 10:06:20'),
(2, 'Musa Abdullahi', '', '2023-09-06 10:06:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblagencies`
--
ALTER TABLE `tblagencies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tblcategories`
--
ALTER TABLE `tblcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `tblcourses`
--
ALTER TABLE `tblcourses`
  ADD PRIMARY KEY (`course_id`),
  ADD UNIQUE KEY `course` (`course`);

--
-- Indexes for table `tblcourse_enrolment`
--
ALTER TABLE `tblcourse_enrolment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblroles`
--
ALTER TABLE `tblroles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblschoolinfo`
--
ALTER TABLE `tblschoolinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tblvenue`
--
ALTER TABLE `tblvenue`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `venue_name` (`venue_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblagencies`
--
ALTER TABLE `tblagencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcategories`
--
ALTER TABLE `tblcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcourses`
--
ALTER TABLE `tblcourses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblcourse_enrolment`
--
ALTER TABLE `tblcourse_enrolment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblroles`
--
ALTER TABLE `tblroles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblschoolinfo`
--
ALTER TABLE `tblschoolinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblvenue`
--
ALTER TABLE `tblvenue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
