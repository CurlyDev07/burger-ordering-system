-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2019 at 04:14 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simple_ordering_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(1, 'admin@purplebug.com', '123456'),
(2, 'esprenreggie@yahoo.com', '123456'),
(3, 'madel@gmail.com', '123456'),
(4, 'Tengpadilla28@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `ingredient_id` int(11) NOT NULL,
  `ingredient_type` varchar(255) NOT NULL,
  `ingredient_name` varchar(255) NOT NULL,
  `ingredient_parent_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`ingredient_id`, `ingredient_type`, `ingredient_name`, `ingredient_parent_name`) VALUES
(322, 'bread', '', NULL),
(323, '', 'Japanese Parmasen', 'bread'),
(324, '', 'Whole Wheat', 'bread'),
(325, '', 'Italian Herb', 'bread'),
(326, 'sauce', '', NULL),
(327, '', 'Honey Mustard', 'sauce'),
(328, '', 'Spicy â€ŽMayo', 'sauce'),
(329, '', 'Mustard', 'sauce'),
(330, '', 'â€ŽMayo', 'sauce'),
(331, 'sandwich-type', '', NULL),
(332, '', 'Turkey Bacon Club', 'sandwich-type'),
(333, '', 'Oven Roasted Turkey', 'sandwich-type'),
(334, '', 'Savory Ham', 'sandwich-type'),
(335, '', 'italian(Salami, Ham & Pepperoni)', 'sandwich-type'),
(336, 'cheese', '', NULL),
(337, '', 'Pepperjack', 'cheese'),
(338, '', 'American', 'cheese'),
(339, '', 'Swiss', 'cheese'),
(340, 'veggies', '', NULL),
(341, '', 'Peppers-Jalapeno', 'veggies'),
(342, '', 'Peppers-Banana', 'veggies'),
(343, '', 'Cucumber', 'veggies'),
(344, '', 'Lettuce', 'veggies'),
(345, '', 'Pickles', 'veggies'),
(346, '', 'Spinach', 'veggies'),
(347, '', 'Tomato', 'veggies'),
(348, '', 'Onions', 'veggies'),
(349, '', 'Olives', 'veggies'),
(350, '', 'Peppers-Green and Red', 'veggies');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `bread` varchar(255) NOT NULL,
  `sauce` varchar(255) NOT NULL,
  `sandwich_type` varchar(255) NOT NULL,
  `cheese` varchar(255) NOT NULL,
  `veggies` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `bread`, `sauce`, `sandwich_type`, `cheese`, `veggies`) VALUES
(28, 'Japanese Parmasen', 'Honey Mustard', 'Turkey Bacon Club', 'Pepperjack', 'Peppers-Jalapeno'),
(29, 'Italian Herb', 'â€ŽMayo', 'Oven Roasted Turkey', 'Pepperjack', 'Lettuce'),
(30, 'Italian Herb', 'â€ŽMayo', 'italian(Salami, Ham & Pepperoni)', 'Swiss', 'Peppers-Green and Red'),
(31, 'Italian Herb', 'â€ŽMayo', 'italian(Salami, Ham & Pepperoni)', 'Swiss', 'Peppers-Jalapeno');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL,
  `customer_fullname` varchar(255) NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `customer_fullname`, `transaction_date`) VALUES
(28, 'Noel Guevarra', '2018-08-10 13:21:11'),
(29, 'Reggie Frias', '2018-08-10 13:34:27'),
(30, 'Reggie Frias', '2018-08-11 00:42:12'),
(31, 'Reggie Frias', '2018-12-07 14:45:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ingredient_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `ingredient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=351;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
