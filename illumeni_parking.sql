-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2021 at 05:21 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `illumeni_parking`
--

-- --------------------------------------------------------

--
-- Table structure for table `cost_tbl`
--

CREATE TABLE `cost_tbl` (
  `floor` varchar(255) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cost_tbl`
--

INSERT INTO `cost_tbl` (`floor`, `cost`) VALUES
('FIRSTFLOOR', 200),
('SECONDFLOOR', 300),
('THIRDFLOOR', 500);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `feedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mpesa`
--

CREATE TABLE `mpesa` (
  `id` int(11) NOT NULL,
  `Cust_name` varchar(255) NOT NULL,
  `mphone` int(11) NOT NULL,
  `mpin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `paypal`
--

CREATE TABLE `paypal` (
  `id` int(11) NOT NULL,
  `Cust_name` varchar(255) NOT NULL,
  `pemail` varchar(255) NOT NULL,
  `ppin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reserved_spots`
--

CREATE TABLE `reserved_spots` (
  `floor` varchar(255) NOT NULL,
  `spot` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `vehicle` varchar(255) NOT NULL,
  `platenumber` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `d1` date NOT NULL,
  `d2` date NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `level` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) NOT NULL DEFAULT 'Active',
  `joindate` date NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `password`, `phone`, `level`, `status`, `joindate`, `id`) VALUES
('admin', 'admin@gmail.com', 'admin', 791498056, 1, 'Active', '2021-12-11', 1),
('Ivy Neema', 'ivy.wairi@gmail.com', 'Nemsh2006', 742504665, 0, 'Active', '2021-12-11', 4),
('Beth Kajuju', 'beth.kajuju@gmail.com', 'BethKajuju', 722396515, 0, 'Active', '2021-12-11', 5),
('Jane', 'jane@gmail.com', 'jane', 782392113, 0, 'Active', '2021-12-12', 6),
('Steve', 'steve@gmail.com', 'steve', 723482919, 0, 'Active', '2021-12-12', 7);

-- --------------------------------------------------------

--
-- Table structure for table `visa`
--

CREATE TABLE `visa` (
  `Cust_id` int(11) NOT NULL,
  `Cust_name` varchar(255) NOT NULL,
  `cardno` int(11) NOT NULL,
  `edate` date NOT NULL,
  `cvv` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mpesa`
--
ALTER TABLE `mpesa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paypal`
--
ALTER TABLE `paypal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserved_spots`
--
ALTER TABLE `reserved_spots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visa`
--
ALTER TABLE `visa`
  ADD PRIMARY KEY (`Cust_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mpesa`
--
ALTER TABLE `mpesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paypal`
--
ALTER TABLE `paypal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reserved_spots`
--
ALTER TABLE `reserved_spots`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `visa`
--
ALTER TABLE `visa`
  MODIFY `Cust_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
