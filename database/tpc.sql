-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 08:20 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tpc`
--

-- --------------------------------------------------------

--
-- Table structure for table `annuocements`
--

CREATE TABLE `annuocements` (
  `annouce_id` int(10) NOT NULL,
  `title` varchar(60) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date_annouce` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(10) NOT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `company_description` text DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `HR_name` varchar(50) DEFAULT NULL,
  `HR_email` varchar(50) DEFAULT NULL,
  `HR_mobile` varchar(10) DEFAULT NULL,
  `company_url` varchar(40) DEFAULT NULL,
  `company_location` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(10) NOT NULL,
  `dept_name` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
(1, 'Civil_01'),
(2, 'Civil_02'),
(3, 'Computer'),
(4, 'Electronics'),
(5, 'Electrical'),
(6, 'Mechanical_06'),
(7, 'Mechanical_07'),
(8, 'Production'),
(9, 'Electronics & Communication'),
(10, 'Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `drive`
--

CREATE TABLE `drive` (
  `drive_id` int(10) NOT NULL,
  `company_id` int(10) DEFAULT NULL,
  `drive_deadline` date DEFAULT NULL,
  `job_location` varchar(60) DEFAULT NULL,
  `internship` int(10) DEFAULT NULL,
  `stipend` int(10) DEFAULT NULL,
  `internship_duration` int(10) DEFAULT NULL,
  `bond_period` decimal(2,1) DEFAULT NULL,
  `internship_included` int(10) DEFAULT NULL,
  `bonus_amount` int(10) DEFAULT NULL,
  `included_ctc` int(10) DEFAULT NULL,
  `hsc_criteria` int(10) DEFAULT NULL,
  `ssc_criteria` int(10) DEFAULT NULL,
  `cpi_criteria` decimal(4,2) DEFAULT NULL,
  `active_backlog` int(10) DEFAULT NULL,
  `dead_backlog` int(10) DEFAULT NULL,
  `dept_eligible` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`dept_eligible`)),
  `no_of_job_role` int(10) DEFAULT NULL,
  `job_role` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`job_role`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(20) NOT NULL,
  `drive_id` int(10) DEFAULT NULL,
  `company_id` int(10) DEFAULT NULL,
  `student_placed` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`student_placed`)),
  `post_on` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` varchar(20) NOT NULL,
  `s_fname` varchar(30) DEFAULT NULL,
  `s_lname` varchar(30) DEFAULT NULL,
  `s_mname` varchar(30) DEFAULT NULL,
  `s_email` varchar(40) DEFAULT NULL,
  `s_mobile` varchar(10) DEFAULT NULL,
  `s_dept` int(10) DEFAULT NULL,
  `s_gender` varchar(10) DEFAULT NULL,
  `s_password` varchar(64) DEFAULT NULL,
  `s_dob` date DEFAULT NULL,
  `s_category` varchar(10) DEFAULT NULL,
  `s_linkedin` varchar(50) DEFAULT NULL,
  `s_academic_year` int(10) DEFAULT NULL,
  `s_enrollment` varchar(20) DEFAULT NULL,
  `s_pAddress` text DEFAULT NULL,
  `s_cAdresss` text DEFAULT NULL,
  `is_d2d` int(10) DEFAULT NULL,
  `is_approved` int(10) DEFAULT 0,
  `is_placed` int(10) DEFAULT 0,
  `is_registered` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_fname`, `s_lname`, `s_mname`, `s_email`, `s_mobile`, `s_dept`, `s_gender`, `s_password`, `s_dob`, `s_category`, `s_linkedin`, `s_academic_year`, `s_enrollment`, `s_pAddress`, `s_cAdresss`, `is_d2d`, `is_approved`, `is_placed`, `is_registered`) VALUES
('19cp015', NULL, NULL, NULL, '19cp015@bvmengineering.ac.in', '9898926279', 5, 'on', 'NjI5MmQ4NDI5NTBkODE3NjgyOGZkYTg5N2Y3N2M0Mzg=', NULL, NULL, NULL, 2019, NULL, NULL, NULL, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_academic`
--

CREATE TABLE `student_academic` (
  `s_id` varchar(20) NOT NULL,
  `ssc_passing_year` int(10) DEFAULT NULL,
  `ssc_total` int(10) DEFAULT NULL,
  `ssc_board` varchar(30) DEFAULT NULL,
  `ssc_school` varchar(60) DEFAULT NULL,
  `ssc_educational_gap` int(10) DEFAULT NULL,
  `hsc_passing_year` int(10) DEFAULT NULL,
  `hsc_th_percentage` decimal(4,2) DEFAULT NULL,
  `hsc_th_p_percentage` decimal(4,2) DEFAULT NULL,
  `hsc_th_marks` int(10) DEFAULT NULL,
  `hsc_th_p_marks` int(10) DEFAULT NULL,
  `hsc_board` varchar(40) DEFAULT NULL,
  `hsc_school` varchar(60) DEFAULT NULL,
  `hsc_educational_gap` int(10) DEFAULT NULL,
  `d2d_passing_year` int(10) DEFAULT NULL,
  `d2d_cgpa` decimal(4,2) DEFAULT NULL,
  `d2d_college` varchar(60) DEFAULT NULL,
  `d2d_sem1` decimal(4,2) DEFAULT NULL,
  `d2d_sem2` decimal(4,2) DEFAULT NULL,
  `d2d_sem3` decimal(4,2) DEFAULT NULL,
  `d2d_sem4` decimal(4,2) DEFAULT NULL,
  `d2d_sem5` decimal(4,2) DEFAULT NULL,
  `d2d_sem6` decimal(4,2) DEFAULT NULL,
  `d2d_backlogs` int(10) DEFAULT NULL,
  `d2d_educational_gap` int(10) DEFAULT NULL,
  `bvm_sem1` decimal(4,2) DEFAULT NULL,
  `bvm_sem2` decimal(4,2) DEFAULT NULL,
  `bvm_sem3` decimal(4,2) DEFAULT NULL,
  `bvm_sem4` decimal(4,2) DEFAULT NULL,
  `bvm_sem5` decimal(4,2) DEFAULT NULL,
  `bvm_sem6` decimal(4,2) DEFAULT NULL,
  `bvm_active_backlog` int(10) DEFAULT NULL,
  `bvm_dead_backlog` int(10) DEFAULT NULL,
  `bvm_total_backlog` int(10) DEFAULT NULL,
  `bvm_cpi` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_document`
--

CREATE TABLE `student_document` (
  `s_id` varchar(20) NOT NULL,
  `ssc_marksheet` varchar(64) DEFAULT NULL,
  `hsc_marksheet` varchar(64) DEFAULT NULL,
  `d2d_marksheet` varchar(64) DEFAULT NULL,
  `bvm_marksheet` varchar(64) DEFAULT NULL,
  `resume` varchar(64) DEFAULT NULL,
  `photo` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_placed`
--

CREATE TABLE `student_placed` (
  `s_id` varchar(20) NOT NULL,
  `drive_applied` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`drive_applied`)),
  `drive_selected` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tpc`
--

CREATE TABLE `tpc` (
  `tpc_id` varchar(20) NOT NULL,
  `tpc_fname` varchar(50) DEFAULT NULL,
  `tpc_lname` varchar(50) DEFAULT NULL,
  `tpc_email` varchar(40) DEFAULT NULL,
  `tpc_mobile` varchar(10) DEFAULT NULL,
  `tpc_password` varchar(64) DEFAULT NULL,
  `tpc_department` int(10) DEFAULT NULL,
  `is_active` int(10) DEFAULT NULL,
  `academic_year` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tpf`
--

CREATE TABLE `tpf` (
  `tpf_id` varchar(20) NOT NULL,
  `tpf_fname` varchar(50) DEFAULT NULL,
  `tpf_lname` varchar(50) DEFAULT NULL,
  `tpf_email` varchar(40) DEFAULT NULL,
  `tpf_mobile` varchar(10) DEFAULT NULL,
  `tpf_password` varchar(64) DEFAULT NULL,
  `tpf_department` int(10) DEFAULT NULL,
  `is_active` int(10) DEFAULT NULL,
  `academic_year` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tpf`
--

INSERT INTO `tpf` (`tpf_id`, `tpf_fname`, `tpf_lname`, `tpf_email`, `tpf_mobile`, `tpf_password`, `tpf_department`, `is_active`, `academic_year`) VALUES
('1', 'Vatsal', 'Shah', 'vatsal@bvm.com', '9898778899', 'YTBkMWE1YjU1M2I5MzRlZTEyZjM1YmYxNDE3MTU3ZTA=', 10, 1, 2022),
('2', 'Jimish', 'Ravat', 'jimish@bvm.com', '7676456378', 'YTBkMWE1YjU1M2I5MzRlZTEyZjM1YmYxNDE3MTU3ZTA=', 3, 1, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `tpo`
--

CREATE TABLE `tpo` (
  `tpo_id` varchar(20) NOT NULL,
  `tpo_name` varchar(50) DEFAULT NULL,
  `tpo_email` varchar(40) DEFAULT NULL,
  `tpo_number` varchar(10) DEFAULT NULL,
  `tpo_password` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tpo`
--

INSERT INTO `tpo` (`tpo_id`, `tpo_name`, `tpo_email`, `tpo_number`, `tpo_password`) VALUES
('1', 'Mehul Patel', 'placement@bvm.com', '9898778800', 'YTBkMWE1YjU1M2I5MzRlZTEyZjM1YmYxNDE3MTU3ZTA=');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annuocements`
--
ALTER TABLE `annuocements`
  ADD PRIMARY KEY (`annouce_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `drive`
--
ALTER TABLE `drive`
  ADD PRIMARY KEY (`drive_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `drive_id` (`drive_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `s_dept` (`s_dept`);

--
-- Indexes for table `student_academic`
--
ALTER TABLE `student_academic`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `student_document`
--
ALTER TABLE `student_document`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `student_placed`
--
ALTER TABLE `student_placed`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tpc`
--
ALTER TABLE `tpc`
  ADD PRIMARY KEY (`tpc_id`),
  ADD KEY `tpc_department` (`tpc_department`);

--
-- Indexes for table `tpf`
--
ALTER TABLE `tpf`
  ADD PRIMARY KEY (`tpf_id`),
  ADD KEY `tpf_department` (`tpf_department`);

--
-- Indexes for table `tpo`
--
ALTER TABLE `tpo`
  ADD PRIMARY KEY (`tpo_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drive`
--
ALTER TABLE `drive`
  ADD CONSTRAINT `drive_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`drive_id`) REFERENCES `drive` (`drive_id`),
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`s_dept`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `student_academic`
--
ALTER TABLE `student_academic`
  ADD CONSTRAINT `student_academic_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`);

--
-- Constraints for table `student_document`
--
ALTER TABLE `student_document`
  ADD CONSTRAINT `student_document_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`);

--
-- Constraints for table `student_placed`
--
ALTER TABLE `student_placed`
  ADD CONSTRAINT `student_placed_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `student` (`s_id`);

--
-- Constraints for table `tpc`
--
ALTER TABLE `tpc`
  ADD CONSTRAINT `tpc_ibfk_1` FOREIGN KEY (`tpc_department`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `tpf`
--
ALTER TABLE `tpf`
  ADD CONSTRAINT `tpf_ibfk_1` FOREIGN KEY (`tpf_department`) REFERENCES `department` (`dept_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
