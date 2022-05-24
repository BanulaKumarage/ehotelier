-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2022 at 05:20 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ehotelier`
--

-- --------------------------------------------------------

--
-- Table structure for table `buffet_reservation`
--

CREATE TABLE `buffet_reservation` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `date` date NOT NULL,
  `slot` enum('breakfast','lunch','dinner') NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `is_closed` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buffet_reservation`
--

INSERT INTO `buffet_reservation` (`id`, `customer_id`, `capacity`, `date`, `slot`, `status`, `is_closed`) VALUES
(1, 1, 4, '2022-05-26', 'dinner', 'pending', 0),
(2, 1, 5, '2022-05-27', 'lunch', 'pending', 0),
(3, 1, 3, '2022-05-25', 'dinner', 'pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `is_closed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `name`, `contact_no`, `is_closed`) VALUES
(1, 'user1', '$2y$10$uvBzhBeL/ia38OGw4t7e/u2B1Z5LtfliVdPERZjjg7j8nlf5M3YRO', 'Harry Potter', '0711122123', 0),
(2, 'banula', '$2y$10$SLa.9gVB7YxknOT1wtBWY.5TNiSDrqn3e1zKs8JzkwnbrmQ5UVepi', 'banula', '0711266278', 0),
(3, 'jalitha', '$2y$10$2L7GUB4eQYWr0s7iBCHGQ.10Exz.mMcz3wmnfePtn7XE5ZVxYaix2', 'jalitha', '0711266278', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_request`
--

CREATE TABLE `customer_request` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_request`
--

INSERT INTO `customer_request` (`id`, `customer_id`, `reservation_id`, `status`, `description`, `timestamp`) VALUES
(1, 1, 5, 'pending', 'Room service', '2022-05-24 11:49:44');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact_no` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` enum('manager','customercareofficer','worker') NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'available',
  `is_closed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `username`, `password`, `name`, `contact_no`, `email`, `role`, `status`, `is_closed`) VALUES
(1, 'employee1', '$2y$10$uvBzhBeL/ia38OGw4t7e/u2B1Z5LtfliVdPERZjjg7j8nlf5M3YRO', 'Ben Tenison', '0711111111', 'a@gmail.com', 'manager', 'available', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_assignment`
--

CREATE TABLE `employee_assignment` (
  `id` int(11) NOT NULL,
  `customer_request_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `sender_type` varchar(50) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `receiver_type` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `value` tinyint(11) NOT NULL DEFAULT 0,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'vacant',
  `last_service` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `capacity`, `type`, `status`, `last_service`) VALUES
(1, 4, 'Suite', 'occupied', NULL),
(2, 4, 'Quad', 'vacant', NULL),
(3, 2, 'Deluxe', 'vacant', NULL),
(4, 2, 'Premium Deluxe', 'vacant', NULL),
(5, 2, 'Deluxe', 'vacant', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room_reservation`
--

CREATE TABLE `room_reservation` (
  `id` int(11) NOT NULL,
  `room_ids` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `type` enum('fullboard','halfboard','bedandbreakfast') NOT NULL,
  `status` enum('reserved','paid','closed') NOT NULL DEFAULT 'reserved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_reservation`
--

INSERT INTO `room_reservation` (`id`, `room_ids`, `customer_id`, `check_in_date`, `check_out_date`, `type`, `status`) VALUES
(4, '3,5', 1, '2022-05-23', '2022-05-24', 'halfboard', 'closed'),
(5, '3,5', 1, '2022-05-23', '2022-05-24', 'halfboard', 'reserved'),
(6, '3,5', 1, '2022-05-23', '2022-05-24', 'halfboard', 'reserved'),
(7, '1', 1, '2022-05-23', '2022-05-24', 'halfboard', 'reserved'),
(8, '3,5', 1, '2022-05-23', '2022-05-24', 'halfboard', 'reserved'),
(9, '3,5', 1, '2022-05-23', '2022-05-24', 'halfboard', 'reserved'),
(10, '3,5', 1, '2022-05-23', '2022-05-24', 'halfboard', 'reserved'),
(11, '3,5', 1, '2022-05-23', '2022-05-24', 'halfboard', 'reserved'),
(12, '1', 1, '2022-05-23', '2022-05-24', 'halfboard', 'reserved'),
(13, '1', 1, '2022-05-25', '2022-05-26', 'halfboard', 'reserved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buffet_reservation`
--
ALTER TABLE `buffet_reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_request`
--
ALTER TABLE `customer_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `reservation_id` (`reservation_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_assignment`
--
ALTER TABLE `employee_assignment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_request_id` (`customer_request_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_reservation`
--
ALTER TABLE `room_reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buffet_reservation`
--
ALTER TABLE `buffet_reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_request`
--
ALTER TABLE `customer_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_assignment`
--
ALTER TABLE `employee_assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `room_reservation`
--
ALTER TABLE `room_reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buffet_reservation`
--
ALTER TABLE `buffet_reservation`
  ADD CONSTRAINT `buffet_reservation_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `customer_request`
--
ALTER TABLE `customer_request`
  ADD CONSTRAINT `customer_request_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `customer_request_ibfk_2` FOREIGN KEY (`reservation_id`) REFERENCES `room_reservation` (`id`);

--
-- Constraints for table `employee_assignment`
--
ALTER TABLE `employee_assignment`
  ADD CONSTRAINT `employee_assignment_ibfk_1` FOREIGN KEY (`customer_request_id`) REFERENCES `customer_request` (`id`),
  ADD CONSTRAINT `employee_assignment_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `room_reservation`
--
ALTER TABLE `room_reservation`
  ADD CONSTRAINT `room_reservation_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
