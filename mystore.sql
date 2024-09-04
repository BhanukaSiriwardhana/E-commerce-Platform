-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2024 at 08:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Tomcat'),
(2, 'King Street'),
(3, 'Zerzone'),
(4, 'Pasi');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 't-shirts'),
(2, ''),
(3, ''),
(4, 'Shirts');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 1, 477265985, 5, 1, 'pending'),
(2, 1, 2097069688, 5, 1, 'pending'),
(3, 1, 1550041679, 5, 1, 'pending'),
(4, 1, 1276338424, 1, 1, 'pending'),
(5, 1, 1109286605, 3, 1, 'pending'),
(6, 1, 1403211504, 1, 1, 'pending'),
(7, 1, 181476005, 2, 1, 'pending'),
(8, 1, 335232284, 3, 1, 'pending'),
(9, 1, 241194857, 2, 1, 'pending'),
(10, 1, 1461154752, 5, 1, 'pending'),
(11, 1, 1782200, 3, 1, 'pending'),
(12, 1, 8197648, 5, 1, 'pending'),
(13, 1, 1968152651, 5, 1, 'pending'),
(14, 1, 1449155440, 5, 1, 'pending'),
(15, 1, 933071133, 5, 1, 'pending'),
(16, 1, 1089863973, 5, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`) VALUES
(1, 't-shirt', 'buy one get one free', 't-shirt', 1, 2, 'team-1.jpg', 'product-5.jpg', 'product-4.jpg', '3200'),
(2, 't-shirt', 'buy one get one free', 't-shirt', 1, 2, 'team-1.jpg', 'product-5.jpg', 'product-4.jpg', '3200'),
(3, 'Shoes ', 'High quality shoes', 'shoes', 1, 3, 'product-1.jpg', 'product-3.jpg', 'product-2.jpg', '4500'),
(4, 'Shoes ', 'High quality shoes', 'shoes', 1, 3, 'product-1.jpg', 'product-3.jpg', 'product-2.jpg', '4500'),
(5, 'Cotton Shirts', 'high quality Cotton shirts for mens', 'shirt', 4, 3, 'product-4.jpg', 'product-2.jpg', 'team-1.jpg', '6500');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 1, 6500, 1550041679, 1, '2024-09-03 01:24:11', 'pending'),
(2, 1, 3200, 1276338424, 1, '2024-09-03 01:29:59', 'pending'),
(3, 1, 4500, 1109286605, 1, '2024-09-03 01:53:29', 'pending'),
(4, 1, 3200, 1403211504, 1, '2024-09-03 02:07:00', 'pending'),
(5, 1, 0, 1530149721, 0, '2024-09-03 02:09:02', 'pending'),
(6, 1, 0, 55757644, 0, '2024-09-03 02:09:34', 'pending'),
(7, 1, 3200, 181476005, 1, '2024-09-03 02:12:30', 'pending'),
(8, 1, 4500, 335232284, 1, '2024-09-03 02:19:51', 'pending'),
(9, 1, 3200, 241194857, 1, '2024-09-03 02:22:38', 'pending'),
(10, 1, 6500, 1461154752, 1, '2024-09-03 02:35:14', 'pending'),
(11, 1, 7700, 1782200, 2, '2024-09-03 03:51:43', 'pending'),
(12, 1, 6500, 8197648, 1, '2024-09-03 04:03:13', 'pending'),
(13, 1, 6500, 1968152651, 1, '2024-09-03 04:07:56', 'pending'),
(14, 1, 6500, 1449155440, 1, '2024-09-03 04:17:45', 'pending'),
(15, 1, 6500, 933071133, 1, '2024-09-03 05:09:18', 'pending'),
(16, 1, 6500, 1089863973, 1, '2024-09-03 05:32:29', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(1, 'Pasindu', 'rashmikaj315@gmail.com', '$2y$10$sm6eyfl0a6uP/p10MW.Yru3J16HjRyE33vgIdDF/pmqW.Pz05/QYS', 'team-1.jpg', '::1', 'Weera mawatha', '0705216373');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
