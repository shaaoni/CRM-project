-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2023 at 09:16 PM
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
(2, 'Raj23', 'Raj123');

-- --------------------------------------------------------

--
-- Table structure for table `user_requests`
--

CREATE TABLE `user_requests` (
  `request_id` int(11) NOT NULL,
  `user_id` varchar(20) DEFAULT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `user_request` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_requests`
--

INSERT INTO `user_requests` (`request_id`, `user_id`, `email_id`, `user_request`, `status`) VALUES
(11, 'emp-0002', 'raj123@gmail.com', 'hello!! how are you?', 'pending'),
(18, 'emp-0001', 'bagchi@gmail.com', 'I want immediate leave and I have fever', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
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

INSERT INTO `workers` (`id`, `user_id`, `uname`, `fname`, `lname`, `contacts`, `address`, `doj`, `email`, `qualification`, `designation`) VALUES
(1, 'emp-0001', 'bagchi25', 'Shrabanti', 'Bagchi', '46748478', 'kolkata', '2023-07-15', 'bagchi@gmail.com', 'btech', 'web dev'),
(2, 'emp-0002', 'Raj23', 'Raj', 'Banerjee', '6897689778', 'kolkata', '26-07-23', 'raj123@gmail.com', 'B.Tech', 'Data Analyst');

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
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_requests`
--
ALTER TABLE `user_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
