-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2022 at 10:55 PM
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
(1, 2, 3, '2022-06-04', 'lunch', 'accepted', 1),
(2, 5, 3, '2022-06-17', 'dinner', 'pending', 0);

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
(1, 'banula', '$2y$10$9fAWJyStAEl2QJi58QO0kO7SnIdQWsK.APel6ruhg5blGQ.HtLWsC', 'Banula Kumarage', '0702939990', 0),
(2, 'jalitha', '$2y$10$K0prQYe7JgQbkzYBNWHd6ODRpybGhuQqX9N994NZMJw4j9AhL7mvW', 'Jalitha Kalsara', '0223939900', 0),
(3, 'thamindu', '$2y$10$gH1z/gfckE2.RCTbgcUh.uWklwhuECkTJTquctAvM13PnCLUVrehy', 'Thamindu Kiridana', '0112233444', 0),
(4, 'sathsarani', '$2y$10$ztpZxNlDfDuf2BjoRB/NDuaJnG0lXDBJOSdfj1uIWr11PxoV9wHQO', 'Sathsarani Kapukotuwa', '0712288289', 0),
(5, 'udith', '$2y$10$mwkDDMDesk2sJUXPjyDMheTCQcR6ZQ3Y3/1M3fpLmOjjgwhAUFRxC', 'Udith Kaushalya', '0788929100', 0);

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
(1, 2, 1, 'completed', 'Need an Extra Pillow', '2022-06-02 20:44:29'),
(2, 5, 2, 'attended', 'Need an extra bed sheet', '2022-06-02 20:45:02');

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
(1, 'dammika', '$2y$10$uvBzhBeL/ia38OGw4t7e/u2B1Z5LtfliVdPERZjjg7j8nlf5M3YRO', 'Dammika Perera', '0700101100', 'dammika@gamil.com', 'manager', 'available', 0),
(2, 'lonewoulf', '$2y$10$uvBzhBeL/ia38OGw4t7e/u2B1Z5LtfliVdPERZjjg7j8nlf5M3YRO', 'Supun Madusanka', '0700102000', 'supunlone@gmail.com', 'customercareofficer', 'available', 0),
(3, 'dakshina', '$2y$10$3Lf.Nf1gBIVp4AsaLwaj2e1AZc2gP1/w2yPxjmJX75uwPrVuyj9ZO', 'Dakshina Ranmal', '0172233990', 'dakshina@gmail.com', 'worker', 'available', 0),
(4, 'gamunu', '$2y$10$Wp..Zaj6bOWG.nhSzfZBYexXwut2KDjEDwdY2PpjwW5aYkwR2En2i', 'Gamunu Bandara', '0172233992', 'gamunu@gmail.com', 'worker', 'available', 0),
(5, 'thinira', '$2y$10$dHecisf0bLCeRJ04WwuwIuuyFA1ZwYdQN3JZ9y5FFyJFnsXdFfuyO', 'Thinira Genuka', '0702233333', 'thinira@gmail.com', 'worker', 'working', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_assignment`
--

CREATE TABLE `employee_assignment` (
  `id` int(11) NOT NULL,
  `customer_request_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `is_closed` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_assignment`
--

INSERT INTO `employee_assignment` (`id`, `customer_request_id`, `employee_id`, `is_closed`) VALUES
(1, 1, 3, 1),
(2, 2, 5, 0);

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

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `customer_id`, `value`, `description`) VALUES
(1, 2, 3, 'Good accommodation ');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'vacant',
  `last_service` timestamp NULL DEFAULT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `capacity`, `type`, `status`, `last_service`, `price`) VALUES
(1, 4, 'Suite', 'occupied', '2022-06-02 17:15:09', 35000),
(2, 4, 'Suite', 'vacant', NULL, 35000),
(3, 4, 'Quad', 'occupied', NULL, 33000),
(4, 4, 'Quad', 'vacant', '2022-06-02 17:14:44', 33000),
(5, 2, 'Deluxe', 'vacant', NULL, 25000),
(6, 2, 'Deluxe', 'vacant', NULL, 25000),
(7, 2, 'Deluxe', 'vacant', NULL, 25000),
(8, 2, 'Deluxe', 'vacant', NULL, 25000),
(9, 2, 'Premium Deluxe', 'vacant', NULL, 30000),
(10, 2, 'Premium Deluxe', 'vacant', NULL, 30000),
(11, 2, 'Premium Deluxe', 'vacant', NULL, 30000),
(12, 2, 'Premium Deluxe', 'vacant', NULL, 30000),
(13, 3, 'Triple', 'occupied', NULL, 28000),
(14, 3, 'Triple', 'vacant', NULL, 28000),
(15, 1, 'Single', 'vacant', NULL, 22000),
(16, 1, 'Single', 'vacant', NULL, 22000),
(17, 1, 'Single', 'vacant', NULL, 22000),
(18, 1, 'Single', 'vacant', NULL, 22000),
(19, 4, 'Single', 'vacant', NULL, 22000),
(20, 4, 'Quad', 'vacant', NULL, 33000);

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
  `status` enum('reserved','paid','closed') NOT NULL DEFAULT 'reserved',
  `is_closed` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room_reservation`
--

INSERT INTO `room_reservation` (`id`, `room_ids`, `customer_id`, `check_in_date`, `check_out_date`, `type`, `status`, `is_closed`) VALUES
(1, '3', 2, '2022-06-04', '2022-06-06', 'fullboard', 'paid', 0),
(2, '13', 5, '2022-06-16', '2022-06-17', 'bedandbreakfast', 'paid', 0),
(3, '1', 4, '2022-06-04', '2022-06-05', 'fullboard', 'reserved', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_request`
--
ALTER TABLE `customer_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employee_assignment`
--
ALTER TABLE `employee_assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `room_reservation`
--
ALTER TABLE `room_reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
