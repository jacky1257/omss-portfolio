-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Feb 18, 2024 at 02:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mypharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Jacky', 'jaekimjacky97@gmail.com', '$2y$10$VBeEOr7X6O9030P1WSo9Y.T6WOyBx8LqtVAZ9nq1q6A.lMR2kTsyC'),
(2, 'mamang', 'mamag@gmail.com', '$2y$10$wPqjewvFJ9zuJ2ucBm2GPua2SWPlKxHpVzgJGcUGImM5WljGEdu4a'),
(3, 'kku', 'kuku@gmail.com', '$2y$10$zrCDCjKZq6Zpx9FennjewOYF/yUhzeT.jPYpuSCUGuktLcBAH8p/e'),
(4, 'aco', 'aco@gmail.com', '$2y$10$RqW2N3X/IjTcJmjSpVqXxej7cUMxu4Kq8p9KbirtfH3huty1W46aC'),
(5, 'mimi', 'mimi@gmail.com', '$2y$10$4URE9WJbXhcXa8QsnSBZpepBzlvZFQX4Y5aQP3cdcPAefOwt8iC3.');

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
(1, 'Appeton Ku'),
(2, 'gsk'),
(4, 'Panadol'),
(7, 'Ensure');

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
(3, 'Health Food And Drinks'),
(5, 'Medicines'),
(6, 'Wellness and Life Style'),
(7, 'Cordels');

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
  `order_status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 1, 369142971, 11, 1, 0),
(2, 1, 1443759275, 11, 1, 0),
(3, 1, 513076138, 3, 1, 0),
(4, 1, 1266978742, 3, 1, 0),
(5, 1, 1858705897, 4, 1, 0),
(6, 1, 1054735388, 3, 2, 0),
(7, 1, 843109484, 13, 1, 0),
(8, 2, 419158548, 12, 1, 0),
(9, 2, 486229871, 27, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_usage` varchar(1000) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_usage`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(3, 'Panadol Children ', 'Panadol Suspension 6+ Years is an orange-flavoured suspension to provide effective relief of fever and pain in younger children.', '', 'Panadol,Children', 5, 2, 'download (1).jpeg', 'download.jpeg', 'panadolchildren60ml.webp', '12.50', '2024-01-29 14:28:43', 'true'),
(4, 'Axcel Paracetamol 500mg Tablet 100s', 'Take Axcel Paracetamol 500mg Tablets aid with the symptoms of fever and body aches.', '', 'Paracetamol, head ache', 5, 2, 'paracetamol.jpeg', 'para3.jpeg', 'Para 2.jpeg', '16', '2024-01-22 05:28:44', 'true'),
(12, 'Appeton Multivitamin', 'Appeton Multivitamin Hi-Q Taurine with DHA tablet is a dietary supplement supplemented with Taurine and DHA.', '', 'Vitamin,Appeton,DHA,SUPPLEMENT', 6, 1, 'appteon1.jpeg', 'appeton 2.avif', 'appeton3.jpg', '56.00', '2024-01-27 12:59:32', 'true'),
(27, 'Essential Oil Natural Pure', '100% Purity and Treatment Grade - Our therapeutic grade oils kit have been using the latest steam-pressing techniques with natural ingredients.', '', 'Essential,Oil ', 6, 7, 'ess1.jpeg', 'ess2.jpeg', 'ess3.jpeg', '16.00', '2024-01-29 13:30:40', 'true');

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
(3, 1, 13, 513076138, 1, '2024-01-27 14:12:23', 'Complete'),
(4, 0, 13, 1837030274, 1, '2024-01-22 12:06:08', 'pending'),
(5, 0, 13, 1531042182, 1, '2024-01-22 12:06:12', 'pending'),
(6, 0, 13, 218621219, 1, '2024-01-22 12:06:13', 'pending'),
(7, 1, 13, 1266978742, 1, '2024-01-22 12:16:05', 'Complete'),
(8, 1, 29, 1858705897, 2, '2024-01-28 04:38:12', 'Complete'),
(9, 1, 25, 1054735388, 1, '2024-01-27 12:14:50', 'pending'),
(10, 1, 81, 843109484, 3, '2024-01-28 04:34:12', 'pending'),
(11, 2, 56, 419158548, 1, '2024-02-02 13:10:13', 'Complete'),
(12, 2, 32, 486229871, 2, '2024-02-02 13:10:30', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(2, 1, 369142971, 5, 'Cash On Delivery', '2024-01-20 16:14:24'),
(4, 3, 513076138, 13, 'Cash On Delivery', '2024-01-27 14:12:23'),
(5, 8, 1858705897, 29, 'Cash On Delivery', '2024-01-28 04:38:12'),
(6, 11, 419158548, 56, 'Cash On Delivery', '2024-02-02 13:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
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
(2, 'cuku', 'cuku@gmail.com', '$2y$10$QEoq2cl44/AAX.frlGm1ces4oY3N0EBdebtNOz/fRYdu9BC9PnVsS', 'Capture1.PNG', '127.0.0.1', 'dgdsfdhfd', '2543645645');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

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
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
