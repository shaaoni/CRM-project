-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 05:37 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(20) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL DEFAULT 'admin',
  `img` varchar(255) NOT NULL,
  `time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `full_name`, `username`, `email`, `pass`, `type`, `img`, `time`) VALUES
(1, 'Shrabanti Bagchi', 'nitu', 'admin@gmail.com', 'nitu', 'admin', '65740b4a5bfb0.JPG', '2023-04-23');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `login` time(6) DEFAULT NULL,
  `logout` time(6) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `emp_id`, `login`, `logout`, `date`) VALUES
(1, 'emp-0001', '19:02:36.000000', '18:41:45.000000', '2024-01-29'),
(2, 'emp-0004', '18:42:56.000000', '18:43:15.000000', '2024-01-29'),
(3, 'emp-0005', '18:44:55.000000', '18:45:46.000000', '2024-01-29'),
(4, 'emp-0001', '20:34:31.000000', NULL, '2024-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `calender_master_event`
--

CREATE TABLE `calender_master_event` (
  `event_id` int(20) NOT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `event_desc` varchar(255) DEFAULT NULL,
  `event_start` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `event_end` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_details`
--

CREATE TABLE `client_details` (
  `id` int(100) NOT NULL,
  `client_fname` varchar(59) NOT NULL,
  `client_lname` varchar(59) NOT NULL,
  `cmp_name` varchar(25) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `project_dsc` varchar(255) NOT NULL,
  `date_sbmn` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_details`
--

INSERT INTO `client_details` (`id`, `client_fname`, `client_lname`, `cmp_name`, `contact`, `email`, `project_name`, `project_dsc`, `date_sbmn`) VALUES
(3, 'ab', 'sc', 'crm', '456', 'bagchisravanti647@gmail.com', 'fs', 'das', '2023-09-28 14:56:03.743385'),
(4, 'sv', 'df', 'er', '567', 'sravantibagchi02888@gmail.com', 'gh', 'fgd', '2023-09-28 14:56:33.015332'),
(5, 'john', 'gomes', 'amazon', '78678986', 'john@gmail.com', 'web service', 'Api integration', '2024-01-21 16:02:41.366494');

-- --------------------------------------------------------

--
-- Table structure for table `emp_task`
--

CREATE TABLE `emp_task` (
  `task_id` int(11) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `task_desc` varchar(255) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `deadline` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_task`
--

INSERT INTO `emp_task` (`task_id`, `emp_id`, `email`, `task_desc`, `date`, `deadline`) VALUES
(1, 'emp-0001', 'tom@gmail.com', 'make a portfolio', '2024-01-21 00:27:41.542070', NULL),
(3, 'emp-0001', 'tom@gmail.com', 'write', '2024-01-21 20:57:43.241794', '2024-02-03'),
(5, 'emp-0002', '', 'website design', '2024-01-25 17:28:20.613487', '2024-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(100) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `uname`, `pass`, `status`) VALUES
(1, 'tom123', 'tom@123', 'active'),
(4, 'dan66', 'dan66', 'inactive'),
(5, 'emma23', 'Emma@23', 'inactive'),
(6, 'rup45', 'Rup@45', 'inactive'),
(7, 'mridha22', 'mridha22', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `user_requests`
--

CREATE TABLE `user_requests` (
  `request_id` int(11) NOT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `user_request` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','rejected','cancelled') DEFAULT NULL,
  `Date` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_requests`
--

INSERT INTO `user_requests` (`request_id`, `user_id`, `email_id`, `user_request`, `status`, `Date`) VALUES
(1, 'emp-0001', 'tom@gmail.com', 'I need urgent leave now', 'rejected', '2023-11-25 11:25:42.173013'),
(2, 'emp-0001', 'tom@gmail.com', 'pet kharap amr', 'rejected', '2023-11-25 11:27:38.228554');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `img` varchar(255) NOT NULL DEFAULT 'plogo.png',
  `id` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `contacts` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `doj` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `qualification` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`img`, `id`, `user_id`, `uname`, `fname`, `lname`, `contacts`, `address`, `doj`, `email`, `qualification`, `designation`) VALUES
('plogo.png', 1, 'emp-0001', 'tom123', 'Tom', 'Smith', '34546556', 'London', '', 'tom@gmail.com', 'btech', 'Jr.Web Developer'),
('plogo.png', 4, 'emp-0004', 'dan66', 'Daniel', 'Radcliff', '', '', '2023-12-01', 'dan66@gmail.com', 'BCA', 'Sr. Graphics Designer'),
('plogo.png', 5, 'emp-0005', 'emma23', 'Emma', 'Watson', '', '', '2023-12-27', 'emma@gmail.com', '', ''),
('plogo.png', 6, 'emp-0006', 'rup45', 'Rupert', 'Grint', '', '', '2023-12-28', 'rupert@gmail.com', '', ''),
('plogo.png', 7, 'emp-0005', 'mridha22', 'mrdfd', 'mridha', '', '', '2024-01-02', 'mdh@gmail.com', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calender_master_event`
--
ALTER TABLE `calender_master_event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `client_details`
--
ALTER TABLE `client_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_task`
--
ALTER TABLE `emp_task`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_requests`
--
ALTER TABLE `user_requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client_details`
--
ALTER TABLE `client_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `emp_task`
--
ALTER TABLE `emp_task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_requests`
--
ALTER TABLE `user_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
