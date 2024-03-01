-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 07:25 AM
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
(1, 'satyamev jayate', 'nitu', 'admin@gmail.com', 'nitu', 'admin', '64d7d701c2302.jpg', '2023-04-23');

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
(4, 'sv', 'df', 'er', '567', 'sravantibagchi02888@gmail.com', 'gh', 'fgd', '2023-09-28 14:56:33.015332');

-- --------------------------------------------------------

--
-- Table structure for table `leads_details`
--

CREATE TABLE `leads_details` (
  `id` int(20) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `uname` varchar(25) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `address` varchar(500) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `doj` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `qualification` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leads_details`
--

INSERT INTO `leads_details` (`id`, `user_id`, `uname`, `fname`, `lname`, `address`, `contact`, `mail`, `doj`, `qualification`, `designation`) VALUES
(1, 'lead-0001', 'azam167', 'anwar', 'azam', '', '', 'ayush@gmail.com', '2023-10-11 15:30:18.862403', '', ''),
(2, 'lead-0002', 'shetty123', 'shilpa', 'shetty', '', '', 'shilpa123@gmail.com', '2023-10-11 15:37:11.731852', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(100) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `uname`, `pass`) VALUES
(1, 'Bagchi25', 'Bagchi25'),
(2, 'Raj123', 'Raj123'),
(21, 'ayu123', 'ayushman@1234567890'),
(23, 'shivani23', '123asch@45'),
(24, 'azam167', 'abcd@1234'),
(25, 'shetty123', 'shilpa@789');

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
(11, 'emp-0002', 'raj123@gmail.com', 'hello!! how are you?', 'cancelled', '2023-09-25 18:28:41.133102'),
(18, 'emp-0001', 'bagchi@gmail.com', 'I want immediate leave and I have fever', 'approved', '2023-09-25 18:28:41.133102'),
(34, 'emp-0001', 'bagchi@gmail.com', 'jasdsdnasdlkaskd[pqwopqo  pwqpqpd,msdnvfdndjfnv QWPQWIEOQWIPWOE klndcvasdnansv', 'rejected', '2023-09-25 18:28:41.133102'),
(35, 'emp-0001', 'bagchi@gmail.com', 'hi', 'pending', '2023-09-25 18:28:41.133102'),
(37, 'emp-0002', 'raj123@gmail.com', 'I will not be present today', 'cancelled', '2023-09-25 18:28:41.133102'),
(38, 'emp-0002', 'raj123@gmail.com', 'may i come in?', 'cancelled', '2023-09-25 18:28:41.133102'),
(39, 'emp-0002', 'raj123@gmail.com', 'i am raj', 'cancelled', '2023-09-25 18:31:27.489785'),
(40, 'emp-0002', 'raj123@gmail.com', 'raaazzzz in home', 'pending', '2023-09-25 18:44:25.496352'),
(41, 'emp-0002', 'raj123@gmail.com', 'raaazzz t raaazzz hi rhega', 'pending', '2023-09-25 18:45:34.600010'),
(42, 'emp-0002', 'raj123@gmail.com', 'hey yeah', 'pending', '2023-09-25 18:55:08.451650'),
(43, 'emp-0002', 'raj123@gmail.com', 'hi i am raj', 'pending', '2023-10-16 19:50:04.461386');

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
('', 1, 'emp-0001', 'Bagchi25', 'Shrabanti', 'Bagchi', '46748478', 'kolkata', '2023-07-15', 'bagchi@gmail.com', 'btech', 'web dev'),
('', 2, 'emp-0002', 'Raj123', 'Raj', 'Banerjee', '6897689778', 'kolkata', '26-07-23', 'raj123@gmail.com', 'B.Tech', 'Data Analyst'),
('', 7, 'emp-00013', 'ayu123', 'ayushman', 'khurana', '', '', '2023-10-02', 'ayush@gmail.com', '', ''),
('', 9, 'emp-00013', 'shivani23', 'shivani', 'khurana', '1234567890', 'cdfgdgdfgrtrtrt', '2023-10-03', 'khurana.cvani@gmail.com', 'hrns', 'designer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

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
-- Indexes for table `leads_details`
--
ALTER TABLE `leads_details`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `client_details`
--
ALTER TABLE `client_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leads_details`
--
ALTER TABLE `leads_details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_requests`
--
ALTER TABLE `user_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
