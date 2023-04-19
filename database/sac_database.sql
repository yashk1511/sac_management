-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2023 at 07:58 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sac_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `allotment`
--

CREATE TABLE `allotment` (
  `hostel_name` varchar(255) NOT NULL,
  `room_number` int(11) NOT NULL,
  `isoccupied` tinyint(1) DEFAULT 0,
  `allotee_id` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allotment`
--

INSERT INTO `allotment` (`hostel_name`, `room_number`, `isoccupied`, `allotee_id`) VALUES
('Amber', 1, 1, '20JE1110');

-- --------------------------------------------------------

--
-- Table structure for table `caretaker_data`
--

CREATE TABLE `caretaker_data` (
  `emp_id` char(4) NOT NULL,
  `name_first` varchar(255) NOT NULL,
  `name_last` varchar(255) NOT NULL,
  `mobile_number` char(10) NOT NULL,
  `gender` set('Female','Male') NOT NULL,
  `hostel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `caretaker_data`
--

INSERT INTO `caretaker_data` (`emp_id`, `name_first`, `name_last`, `mobile_number`, `gender`, `hostel`) VALUES
('2111', 'Caretaker1', 'CT1', '9999999999', 'Male', 'Amber');

-- --------------------------------------------------------

--
-- Table structure for table `charges`
--

CREATE TABLE `charges` (
  `type` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `charges`
--

INSERT INTO `charges` (`type`, `amount`) VALUES
('amenities', '1000.00');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaint_id` int(11) NOT NULL,
  `complainant_id` char(8) NOT NULL,
  `hostel` varchar(255) NOT NULL,
  `type` set('Room Maintenance Issue','Cleanliness issue','Water Issue','Electricity issue','Staff issue','Internet Issue','Other') NOT NULL,
  `description` varchar(255) NOT NULL,
  `atr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`complaint_id`, `complainant_id`, `hostel`, `type`, `description`, `atr`) VALUES
(3, '20JE1110', 'Amber', 'Room Maintenance Issue', 'This is a complaint.\r\n', ''),
(4, '20JE1110', 'Amber', 'Room Maintenance Issue,Cleanliness issue', 'paani nahi aa raha', '');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `hostel` varchar(255) NOT NULL,
  `type` set('repair','subscriptions','salaries') NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hostel_data`
--

CREATE TABLE `hostel_data` (
  `hostel_name` varchar(255) NOT NULL,
  `warden` varchar(255) NOT NULL,
  `mess_manager` varchar(255) NOT NULL,
  `caretaker` varchar(255) NOT NULL,
  `rent` decimal(10,2) NOT NULL,
  `mess_charge` decimal(10,2) NOT NULL,
  `budget` decimal(10,0) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hostel_data`
--

INSERT INTO `hostel_data` (`hostel_name`, `warden`, `mess_manager`, `caretaker`, `rent`, `mess_charge`, `budget`) VALUES
('Amber', 'Warden1', 'Mess manager1', 'Caretaker1', '600.00', '0.00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

CREATE TABLE `login_info` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` set('Student','Warden','SAC Chairman','Caretaker','Mess Manager') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`username`, `password`, `role`) VALUES
('messmanager1', '$2y$10$dugB4MIZqcLRO7u7NikM1O.6RY1PMXiXBeP/ZR2gw5nLFAZ4TLs.m', 'Mess Manager'),
('warden1', '$2y$10$kZ2duQDeboXwdw1sMP/Mf./rgM8/wOMwW7kznN1KjrX3744vpcWSO', 'Warden'),
('yash', '$2y$10$XbrFNK5zvZNJIaFNAFDOZOUhoi5Twr2nfCx4nUqfs0fNOcn4iddnC', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `mess_manager_data`
--

CREATE TABLE `mess_manager_data` (
  `emp_id` char(4) NOT NULL,
  `name_first` varchar(255) NOT NULL,
  `name_last` varchar(255) NOT NULL,
  `mobile_number` char(10) NOT NULL,
  `gender` set('Female','Male') NOT NULL,
  `hostel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mess_manager_data`
--

INSERT INTO `mess_manager_data` (`emp_id`, `name_first`, `name_last`, `mobile_number`, `gender`, `hostel`) VALUES
('3111', 'Mess manager1', 'MM1', '9999999999', 'Male', 'Amber');

-- --------------------------------------------------------

--
-- Table structure for table `profile_data`
--

CREATE TABLE `profile_data` (
  `username` varchar(255) NOT NULL,
  `institute_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile_data`
--

INSERT INTO `profile_data` (`username`, `institute_id`) VALUES
('yash', '20JE1110'),
('warden1', '1111'),
('messmanager1', '3111');

-- --------------------------------------------------------

--
-- Table structure for table `sac_chairman_data`
--

CREATE TABLE `sac_chairman_data` (
  `emp_id` char(4) NOT NULL,
  `name_first` varchar(255) NOT NULL,
  `name_last` varchar(255) NOT NULL,
  `mobile_number` char(10) NOT NULL,
  `gender` set('Female','Male') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sac_chairman_data`
--

INSERT INTO `sac_chairman_data` (`emp_id`, `name_first`, `name_last`, `mobile_number`, `gender`) VALUES
('4111', 'Chairman1', 'CM1', '9999999999', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

CREATE TABLE `student_data` (
  `admission_no` char(8) NOT NULL,
  `name_first` varchar(255) NOT NULL,
  `name_last` varchar(255) NOT NULL,
  `gender` set('Male','Female') NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_city` varchar(255) NOT NULL,
  `address_state` varchar(255) NOT NULL,
  `address_pin` char(6) NOT NULL,
  `mobile_number` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`admission_no`, `name_first`, `name_last`, `gender`, `address_line1`, `address_city`, `address_state`, `address_pin`, `mobile_number`) VALUES
('20JE1110', 'Yash', 'Kumar', 'Male', 'amber', 'Lucknow', 'UP', '226029', '9026622349');

-- --------------------------------------------------------

--
-- Table structure for table `warden_data`
--

CREATE TABLE `warden_data` (
  `emp_no` char(4) NOT NULL,
  `name_first` varchar(255) NOT NULL,
  `name_last` varchar(255) NOT NULL,
  `gender` set('Male','Female') NOT NULL,
  `mobile_number` char(10) NOT NULL,
  `hostel_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warden_data`
--

INSERT INTO `warden_data` (`emp_no`, `name_first`, `name_last`, `gender`, `mobile_number`, `hostel_name`) VALUES
('1111', 'Umakanta', 'Tripathi', 'Male', '9999999999', 'Amber');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allotment`
--
ALTER TABLE `allotment`
  ADD PRIMARY KEY (`hostel_name`,`room_number`);

--
-- Indexes for table `caretaker_data`
--
ALTER TABLE `caretaker_data`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `charges`
--
ALTER TABLE `charges`
  ADD UNIQUE KEY `type` (`type`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostel_data`
--
ALTER TABLE `hostel_data`
  ADD UNIQUE KEY `hostel_name` (`hostel_name`);

--
-- Indexes for table `login_info`
--
ALTER TABLE `login_info`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `mess_manager_data`
--
ALTER TABLE `mess_manager_data`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `sac_chairman_data`
--
ALTER TABLE `sac_chairman_data`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`admission_no`);

--
-- Indexes for table `warden_data`
--
ALTER TABLE `warden_data`
  ADD PRIMARY KEY (`emp_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
