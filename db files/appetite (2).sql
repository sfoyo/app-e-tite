-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 14, 2019 at 10:16 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `address` varchar(300) NOT NULL,
  `country` varchar(50) NOT NULL,
  `region` varchar(100) NOT NULL,
  `d_o_j` date NOT NULL,
  `subscription_period` int(11) NOT NULL,
  `package` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `item_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `sub_type` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `cost` int(11) NOT NULL,
  `cuisine` varchar(50) NOT NULL,
  `availability` tinyint(1) NOT NULL,
  `veg` tinyint(1) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`item_id`, `client_id`, `type`, `sub_type`, `name`, `description`, `cost`, `cuisine`, `availability`, `veg`, `image`) VALUES
(1, 1, 'food', 'starter', 'Veg Burger', 'tomato, cheese, cucumber, onion, red sauce', 300, 'American', 1, 1, 'burger.jpg'),
(2, 1, 'food', 'starter', 'Fries', 'tomato, cheese, cucumber, onion, red sauce', 300, 'American', 1, 1, 'fries.jpg'),
(3, 1, 'food', 'starter', 'Pasta', 'tomato, cheese, cucumber, onion, red sauce', 300, 'Italian', 1, 1, 'pasta.jpg'),
(4, 1, 'food', 'starter', 'Veg Momos', 'tomato, cheese, cucumber, onion, red sauce', 300, 'Chinese', 1, 1, 'momos.jpg'),
(5, 1, 'food', 'starter', 'Chicken Tikka', 'tomato, cheese, cucumber, onion, red sauce', 500, 'Punjabi', 1, 0, 'chicken.jpg'),
(6, 1, 'food', 'starter', 'Samosa', 'tomato, cheese, cucumber, onion, red sauce', 200, 'Indian', 1, 1, 'samosa.jpg'),
(7, 1, 'food', 'starter', 'Pizza', 'tomato, cheese, cucumber, onion, red sauce', 1000, 'Italian', 1, 1, 'pizza.jpg'),
(8, 1, 'food', 'main course', 'Shahi Paneer', 'tomato, cheese, cucumber, onion, red sauce', 500, 'Indian', 1, 1, '1.jpg'),
(9, 1, 'food', 'main course', 'Mix Veg', 'tomato, cheese, cucumber, onion, red sauce', 500, 'Indian', 1, 1, '2.jpg'),
(10, 1, 'food', 'main course', 'Naan', 'White Floor, Ginger', 100, 'Indian', 1, 1, '3.jpg'),
(11, 1, 'food', 'main course', 'Butter Chicken', 'tomato, cheese, cucumber, onion, red sauce', 500, 'Indian', 1, 0, '4.jpg\r\n'),
(12, 1, 'food', 'main course', 'Aloo Mutter', 'tomato, cheese, cucumber, onion, red sauce', 500, 'Indian', 1, 1, '5.jpg'),
(13, 1, 'food', 'main course', 'Malai Chaap', 'tomato, cheese, cucumber, onion, red sauce', 500, 'Indian', 1, 1, '6.jpg'),
(14, 1, 'food', ' main course', 'Chana Masala', 'tomato, cheese, cucumber, onion, red sauce', 500, 'Indian', 1, 1, '7.jpg'),
(15, 1, 'desert', '', 'Brownie', 'Cream, Chocolate', 200, 'American', 1, 1, 'd1.jpg\r\n'),
(16, 1, 'desert', '', 'American truffel', 'Cream, Chocolate', 200, 'American', 1, 1, 'd2.jpg'),
(17, 1, 'desert', '', 'Red Velvet', 'Cream, Velvet', 200, 'Thai', 1, 1, 'd3.jpg'),
(18, 1, 'desert', '', 'Belgium Chocolate Ice Cream', 'Chocolate, Cream', 200, 'Belgium', 1, 1, 'd4.jpg\r\n'),
(19, 1, 'desert', '', 'Waffle Ice-Cream Sandwich', 'Cream, Chocolate', 300, 'American', 1, 1, 'd5.jpg'),
(20, 1, 'drink', '', 'Red Bull', '100ml', 400, '', 1, 1, 'dr1.jpg'),
(21, 1, 'drink', '', 'Mineral Water', '150ml', 100, '', 1, 1, 'dr2.jpg'),
(22, 1, 'drink', '', 'Coke', '600ml', 150, '', 1, 1, 'dr3.jpg'),
(23, 1, 'drink', '', 'Sprite', '', 600, '', 1, 1, 'dr4.jpg'),
(24, 1, 'beverage', '', 'Cocoa Cream', '', 500, '', 1, 1, 'b1.jpg'),
(25, 1, 'beverage', '', 'Caramel Frappe', '', 500, '', 1, 1, 'b2.jpg'),
(26, 1, 'beverage', '', 'Mango Frappe', '', 500, '', 1, 1, 'b3.jpg'),
(27, 1, 'beverage', '', 'Cafe Frappe', '', 500, '', 1, 1, 'b4.jpg'),
(28, 1, 'beverage', '', 'Cafe Mocha', '', 500, '', 1, 1, 'b8.jpg'),
(29, 1, 'beverage', '', 'Dark Frappe', '', 500, '', 1, 1, 'b5.jpg'),
(30, 1, 'beverage', '', 'Cold Coffee', '', 500, '', 1, 1, 'b6.jpg'),
(31, 1, 'beverage', '', 'Inverted Cappuccino', '', 500, '', 1, 1, 'b7.jpg'),
(32, 1, 'beverage', '', 'Vegan Shake', '', 500, '', 1, 1, 'b9.jpg'),
(33, 1, 'drink', '', 'Cool Blue', '', 500, '', 1, 1, 'dr5.jpg'),
(34, 1, 'drink', '', 'Classic Lemonade', '', 500, '', 1, 1, 'dr6.jpg'),
(35, 1, 'drink', '', 'Orangy Delight', '', 500, '', 1, 1, 'dr7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `table_number` varchar(50) NOT NULL,
  `time` time NOT NULL,
  `bill_amount` int(11) NOT NULL,
  `restaurant_rating` int(11) NOT NULL,
  `app_rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `screensavers`
--

CREATE TABLE `screensavers` (
  `client_id` int(11) NOT NULL,
  `image_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
