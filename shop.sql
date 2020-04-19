-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2018 at 02:47 PM
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
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_emailid` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`, `admin_emailid`) VALUES
(1, 'admin', 'admin', 'sharu.v.1502@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `name`, `email`, `password`, `phone`, `address`, `created`, `modified`, `status`) VALUES
(1, 'sharath', 'kumar', 'sharu', 'sharathkumarv183@gmail.com', 'Sharu1502', '8867852993', 'Pension Mohalla Shimoga', '2018-03-14 21:04:10', '2018-03-14 21:04:10', '1'),
(2, 'faheem', 'khan', 'faheemz', 'faheem@codebliss.in', 'Faheem123', '7823232323', 'Lbs NAgar Above Vegetable shop shimoga', '2018-03-15 14:46:26', '2018-03-15 14:46:26', '1'),
(3, 'jeev', 'kumar', 'jeevan', 'jeevanjeevanpaddu@gmail.com', 'Jeevan123', '9876543210', 'srnmc college', '2018-03-19 16:40:54', '2018-03-19 16:40:54', '1'),
(4, 'savi', 'v', 'savinay', 'sssavinay.03@gmail.com', 'Savinay123', '8762574533', 'srnmc college', '2018-03-19 18:40:28', '2018-03-19 18:40:28', '1');

-- --------------------------------------------------------

--
-- Table structure for table `deliveryguy`
--

CREATE TABLE `deliveryguy` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deliveryguy`
--

INSERT INTO `deliveryguy` (`id`, `name`, `emailid`, `password`, `phone`, `created_date`) VALUES
(1, 'satishoruganti', 'sathish@gmail.com', '1234', '8867852991', '2018-02-23 14:45:17'),
(2, 'rajesh', 'rajesh@gmail.com', 'rajesh', '7823232323', '2018-03-23 14:01:23'),
(3, 'smith', 'smith@gmail.com', 'smith', '9896586586', '2018-03-23 16:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `deliveryguy_id` int(11) NOT NULL,
  `total_price` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `delivery_status` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `deliveryguy_id`, `total_price`, `created`, `modified`, `status`, `delivery_status`) VALUES
(1, 1, 1, 12645.00, '2018-03-15 10:58:38', '2018-03-15 10:58:38', '1', 'delivered'),
(2, 2, 1, 12110.00, '2018-03-15 11:31:24', '2018-03-15 11:31:24', '1', 'returned'),
(3, 1, 1, 2500.00, '2018-03-15 13:01:39', '2018-03-15 13:01:39', '1', 'delivered'),
(4, 3, 2, 800.00, '2018-03-19 12:11:43', '2018-03-19 12:11:43', '1', 'delivered'),
(5, 3, 2, 900.00, '2018-03-19 14:04:38', '2018-03-19 14:04:38', '1', 'pending'),
(6, 4, 2, 36.00, '2018-03-19 14:10:47', '2018-03-19 14:10:47', '1', 'pending'),
(7, 4, 1, 12545.00, '2018-03-19 17:04:56', '2018-03-19 17:04:56', '1', 'pending'),
(10, 1, 1, 220.00, '2018-03-23 11:19:14', '2018-03-23 11:19:14', '1', 'delivered');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 1, 10, 1),
(2, 1, 6, 1),
(3, 1, 5, 2),
(4, 2, 7, 1),
(5, 2, 10, 1),
(6, 3, 9, 1),
(7, 3, 8, 1),
(8, 4, 9, 1),
(9, 4, 5, 1),
(10, 5, 5, 1),
(11, 5, 3, 1),
(12, 6, 1, 1),
(13, 7, 9, 1),
(14, 7, 6, 1),
(15, 7, 10, 1),
(19, 10, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `product_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `product_img`, `price`, `created`, `modified`, `status`) VALUES
(1, 'santoor', 'moisursing soap', 'santoor.jpg', 36.00, '2018-02-18 00:00:00', '0000-00-00 00:00:00', '1'),
(2, 'Himalaya shampoo', 'hair shampoo ', 'himalayan_shop.jpg', 120.00, '2018-02-18 05:19:19', '0000-00-00 00:00:00', '1'),
(3, 'Dawath Rice', 'Basumati rice', 'dawathrice.jpg', 600.00, '2018-02-18 03:16:09', '0000-00-00 00:00:00', '1'),
(4, 'jasmine', 'hair oil', 'jasmineoil.jpg', 58.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(5, 'Ferrero Rocher', 'chocolate', 'ferrero_rocher_chocolate.jpg', 300.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(6, 'Frooti', 'soft Drinks', 'frooti.jpg', 45.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(7, 'Apple', 'ooty apple fruit', 'apple.jpg', 110.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(8, 'watch', 'rist watch', 'watch.jpg', 2000.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(9, 'charger', 'to full the battery', 'mobile_charger.jpg', 500.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(10, 'mobile', 'to attend the calls', 'mobile.jpg', 12000.00, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'),
(11, 'bajaj Almond Oil', 'cool and soft hair', 'oil.jpg', 200.00, '2018-03-23 16:23:24', '2018-03-23 16:23:24', '1');

-- --------------------------------------------------------

--
-- Table structure for table `products_ratings`
--

CREATE TABLE `products_ratings` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `ratings_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_ratings`
--

INSERT INTO `products_ratings` (`id`, `product_id`, `customer_id`, `ratings_score`) VALUES
(1, 10, 2, 4),
(2, 6, 1, 3),
(3, 10, 1, 5),
(4, 9, 1, 5),
(5, 1, 4, 3),
(6, 10, 4, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveryguy`
--
ALTER TABLE `deliveryguy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `customer_id_2` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_ratings`
--
ALTER TABLE `products_ratings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `deliveryguy`
--
ALTER TABLE `deliveryguy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products_ratings`
--
ALTER TABLE `products_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
