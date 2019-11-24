-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 19, 2019 at 06:16 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appetite`
--

-- --------------------------------------------------------

--
-- Table structure for table `ordered_items`
--

CREATE TABLE `ordered_items` (
  `order_no` int(11) NOT NULL,
  `ordered_items_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `special_instructions` varchar(300) NOT NULL,
  `cost` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `accepted` tinyint(1) DEFAULT NULL,
  `time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordered_items`
--

INSERT INTO `ordered_items` (`order_no`, `ordered_items_id`, `item_id`, `name`, `special_instructions`, `cost`, `quantity`, `accepted`, `time`) VALUES
(1, 12, 1, 'Veg Burger', '1', 300, 1, 1, 20),
(2, 13, 2, 'Fries', '1', 300, 2, 1, 15),
(3, 14, 2, 'Fries', '1', 300, 2, 1, 15),
(4, 15, 2, 'Fries', '1', 300, 2, 1, 15),
(5, 16, 2, 'Fries', '1', 300, 2, 1, 15),
(1, 17, 2, 'Fries', '1', 300, 2, 1, 15),
(1, 18, 2, 'Fries', '1', 300, 1, 1, 15),
(5, 19, 2, 'Fries', '1', 300, 2, 1, 15),
(6, 20, 2, 'Fries', '1', 300, 2, 1, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ordered_items`
--
ALTER TABLE `ordered_items`
  ADD PRIMARY KEY (`ordered_items_id`),
  ADD KEY `order_no` (`ordered_items_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ordered_items`
--
ALTER TABLE `ordered_items`
  MODIFY `ordered_items_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
