-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2025 at 03:51 PM
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
-- Database: `470_laundry_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `phone`, `address`) VALUES
(121234, 'Minjum Sumath', 'Minjumcorpo@gmail.com', 'Qweqwe23%', '01854325687', 'Badda, Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(20) NOT NULL,
  `order_id` int(20) NOT NULL,
  `customer_id` int(20) NOT NULL,
  `laundry_id` int(20) NOT NULL,
  `discount_id` int(20) NOT NULL,
  `payment_method` varchar(15) NOT NULL,
  `discount_applied` float NOT NULL,
  `total_price` float NOT NULL,
  `discount_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `email`, `password`, `phone`, `address`) VALUES
(1, 'Nusrat Jahan', 'nusratJ98@gmail.com', 'RtyytR88#', '01754565686', 'House#21, Road#9, Mirpur, Dhaka'),
(2, 'Sayeda Anjum', 'anjumsays@yahoo.com', 'veryVERY999!', '01892320435', 'House#76, Road#6, Dhanmondi, Dhaka'),
(3, 'Aarav Chowdhury', 'A.Ch3212@gmail.com', '00PQPQ00&', '01758328232', 'House#13, Road#11, Lalmatia, Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `discount_id` int(20) NOT NULL,
  `code` varchar(10) NOT NULL,
  `expiry_date` date NOT NULL,
  `discount_rate` float NOT NULL,
  `min_order_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`discount_id`, `code`, `expiry_date`, `discount_rate`, `min_order_price`) VALUES
(2000, 'SUMMER10', '2025-06-10', 0.01, 100);

-- --------------------------------------------------------

--
-- Table structure for table `discount_history`
--

CREATE TABLE `discount_history` (
  `order_id` int(20) NOT NULL,
  `discount_id` int(20) NOT NULL,
  `customer_id` int(20) NOT NULL,
  `usage_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laundromat`
--

CREATE TABLE `laundromat` (
  `laundromat_id` int(20) NOT NULL,
  `laundromat_name` varchar(50) NOT NULL,
  `representative_name` varchar(50) NOT NULL,
  `business_email` varchar(200) NOT NULL,
  `area` varchar(20) NOT NULL,
  `operating_hours` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `price_per_item` float NOT NULL,
  `avg_ratings` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laundromat`
--

INSERT INTO `laundromat` (`laundromat_id`, `laundromat_name`, `representative_name`, `business_email`, `area`, `operating_hours`, `phone`, `address`, `price_per_item`, `avg_ratings`) VALUES
(501, 'Wash & Fold', 'Nafis Ahmed', 'washnfoldofficial@gmail.com', 'Dhanmondi', '7:00am to 12:00am', '01934892034', 'LUSH TOWER, 3rd Floor, Block-C, Road#7,  Dhanmondi, Dhaka', 19.99, 0),
(502, 'Ahmed\'s', 'Meghna Hasan', 'ahmedbusiness.09@gmail.com', 'Badda', '6:00am to 11:30pm', '01933203454', 'Cha-90/3, North Badda (Pragoti Sharoni), Dhaka – 1212', 22, 0),
(503, 'Clean Wash', 'Tanjim Rahman', 'MNMandcobusiness@gmail.com', 'Dhanmondi', '7:15am to 12:00am', '01542357865', '2nd Floor, House No 97, Road No 11/A, Satmasjid Road, Dhaka 1209', 25, 0),
(504, 'SS Laundry', 'Soikot Hossain', 'ss.laundry.official@gmail.com', 'Mohakhali', '6:00am to 11:59pm', '01748694036', 'HOUSE: 410 (GROUND FLOOR), ROAD#27, MOHAKHALI D.O.H.S, DHAKA, 1206', 25, 0),
(505, 'Fast & Fresh ', 'Arnab Hasan', 'f&fcompany@gmail.com', 'Mirpur', '8:15am to 12:00am', '01938745465', 'Plot# 54, Avenue# 1, Block# B Mirpur 10, Dhaka 1216', 30, 0),
(506, 'Magic Wash', 'Faris Malik', 'M.W.comapany&co@gmail.com', 'Uttara', '5:00am to 12:00am', '01938455863', 'House# 1/B, 1st floor, Quantum Emerald Point, Gareeb-e-Newaz Ave, Dhaka 1230', 24.99, 0);

-- --------------------------------------------------------

--
-- Table structure for table `laundry_order`
--

CREATE TABLE `laundry_order` (
  `order_id` int(20) NOT NULL,
  `cust_id` int(20) NOT NULL,
  `service_type` varchar(15) NOT NULL,
  `cloth_type` varchar(30) NOT NULL,
  `cloth_qty` int(11) NOT NULL,
  `special_intructions` varchar(200) NOT NULL,
  `last_delivery_date` date NOT NULL,
  `laudromat_name` varchar(30) NOT NULL,
  `laundromat_id` int(20) NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `item_price` float NOT NULL,
  `submit_method` varchar(15) NOT NULL,
  `pickup_method` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_history`
--

CREATE TABLE `purchase_history` (
  `purchase_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `ratings_id` int(20) NOT NULL,
  `customer_id` int(20) NOT NULL,
  `laundro_id` int(20) NOT NULL,
  `rating` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `ratings_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `saleshistory`
--

CREATE TABLE `saleshistory` (
  `sale_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0gquvsFa8xQsyOHEtKb0IleJlzfo1bjJ4vXkz7f8', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZGdrb25UWmduYkVtQ1B5eUl4TnNmbnBMZnFyTURyd0dOUkVKQWR3biI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly9sb2NhbGhvc3QvZGFzaGJvYXJkLzQ3MF9sYXVuZHJ5X3Byb2plY3QvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744647936),
('avPEJSqKj8VwVoh1KGScqvAtlZyqIthLBBcTtN13', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMnk4emZhZEhlN0YzS3dkcmd2SHFJOG9DREc4aWtkc1hicGh6cTBwViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly9sb2NhbGhvc3QvZGFzaGJvYXJkLzQ3MF9sYXVuZHJ5X3Byb2plY3QvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744647467),
('vW8GER7IbfeqK07z1ZM3svmNHfcTnmIpO2F5VjWg', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZE9HMmV4NnBWTGoyMFY1VjlPTEVrd01la2tqOURKUG55UWlzbktzdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly9sb2NhbGhvc3QvZGFzaGJvYXJkLzQ3MF9sYXVuZHJ5X3Byb2plY3QvcHVibGljIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1744613768);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `bill_order` (`order_id`),
  ADD KEY `bill_customer` (`customer_id`),
  ADD KEY `bill_discount` (`discount_id`),
  ADD KEY `bill_laundry` (`laundry_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discount_id`);

--
-- Indexes for table `discount_history`
--
ALTER TABLE `discount_history`
  ADD KEY `history_order` (`order_id`),
  ADD KEY `history_customer` (`customer_id`),
  ADD KEY `history_discount` (`discount_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laundromat`
--
ALTER TABLE `laundromat`
  ADD PRIMARY KEY (`laundromat_id`);

--
-- Indexes for table `laundry_order`
--
ALTER TABLE `laundry_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `order_customer` (`cust_id`),
  ADD KEY `order_laundro` (`laundromat_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `purchase_history`
--
ALTER TABLE `purchase_history`
  ADD KEY `purchase` (`purchase_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`ratings_id`),
  ADD KEY `ratings_laundro` (`laundro_id`),
  ADD KEY `ratings_cust` (`customer_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `review_ratings` (`ratings_id`);

--
-- Indexes for table `saleshistory`
--
ALTER TABLE `saleshistory`
  ADD KEY `sale_bill` (`sale_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `discount_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2001;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laundromat`
--
ALTER TABLE `laundromat`
  MODIFY `laundromat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=507;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `ratings_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `bill_discount` FOREIGN KEY (`discount_id`) REFERENCES `discount` (`discount_id`),
  ADD CONSTRAINT `bill_laundry` FOREIGN KEY (`laundry_id`) REFERENCES `laundromat` (`laundromat_id`),
  ADD CONSTRAINT `bill_order` FOREIGN KEY (`order_id`) REFERENCES `laundry_order` (`order_id`);

--
-- Constraints for table `discount_history`
--
ALTER TABLE `discount_history`
  ADD CONSTRAINT `history_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `history_discount` FOREIGN KEY (`discount_id`) REFERENCES `discount` (`discount_id`),
  ADD CONSTRAINT `history_order` FOREIGN KEY (`order_id`) REFERENCES `laundry_order` (`order_id`);

--
-- Constraints for table `laundry_order`
--
ALTER TABLE `laundry_order`
  ADD CONSTRAINT `order_customer` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `order_laundro` FOREIGN KEY (`laundromat_id`) REFERENCES `laundromat` (`laundromat_id`);

--
-- Constraints for table `purchase_history`
--
ALTER TABLE `purchase_history`
  ADD CONSTRAINT `fk_purchase_order` FOREIGN KEY (`purchase_id`) REFERENCES `laundry_order` (`order_id`),
  ADD CONSTRAINT `purchase` FOREIGN KEY (`purchase_id`) REFERENCES `bill` (`bill_id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_cust` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `ratings_laundro` FOREIGN KEY (`laundro_id`) REFERENCES `laundromat` (`laundromat_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ratings` FOREIGN KEY (`ratings_id`) REFERENCES `ratings` (`ratings_id`);

--
-- Constraints for table `saleshistory`
--
ALTER TABLE `saleshistory`
  ADD CONSTRAINT `sale_bill` FOREIGN KEY (`sale_id`) REFERENCES `bill` (`bill_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
