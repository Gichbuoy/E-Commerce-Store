-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 1, 2023 at 00.23 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freshcery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(3) NOT NULL,
  `adminname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mypassword` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `adminname`, `email`, `mypassword`, `created_at`) VALUES
(1, 'admin.first', 'admin.first@gmail.com', '$2y$10$EvaSGxbY90rOqk0fkdvmoOJToy5s4oVfZlJzph..4vqQT4jpPCDHS', '2022-12-12 11:33:37'),
(2, 'admin.second', 'admin.second@gmail.com', '$2y$10$nEx02PaHMHQaKPoosW8nQeMunZopWa7K.UAh6onmxgw4GldIEYDG.', '2022-12-12 12:10:05');

-- --------------------------------------------------------


--
-- Table structure for the table `cart`
--

CREATE TABLE `cart` (
  `id` int(3) NOT NULL,
  `pro_id` int(3) NOT NULL,
  `pro_title` varchar(200) NOT NULL,
  `pro_image` varchar(200) NOT NULL,
  `pro_price` int(10) NOT NULL,
  `pro_qty` int(10) NOT NULL,
  `pro_subtotal` int(10) NOT NULL,
  `user_id` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------


--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(3) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `icon` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `icon`, `description`, `created_at`) VALUES
(1, 'VEGETABLES', 'vegetables.jpg', 'bistro-carrot', 'Rapidiously foster exceptional alignments for plug-and-play interfaces. Progressively expedite cross-platform core competencies vis-a-vis cross-media', '2022-12-07 12:11:04'),
(2, 'MEATS', 'meats.jpg', 'bistro-roast-leg', 'Rapidiously foster exceptional alignments for plug-and-play interfaces. Progressively expedite cross-platform core competencies vis-a-vis cross-media', '2022-12-07 12:11:04'),
(3, 'FISHES', 'fish.jpg', 'bistro-fish-1', 'Continually reintermediate impactful web-readiness with enabled catalysts for change. Globally synthesize go forward information for sustainable ', '2022-12-07 13:15:14'),
(4, 'FRUITS', 'fruits.jpg', 'bistro-apple', 'Continually reintermediate impactful web-readiness with enabled catalysts for change. Globally synthesize go forward information for sustainable ', '2022-12-07 13:15:14');

-- --------------------------------------------------------


--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(3) NOT NULL,
  `name` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `zip_code` int(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `order_notes` text NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'sent to admins',
  `price` int(20) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `lname`, `company_name`, `address`, `city`, `country`, `zip_code`, `email`, `phone_number`, `order_notes`, `status`, `price`, `user_id`, `created_at`) VALUES
(5, 'Alex', 'Maina', 'Afree Tec', '254-Underground', 'Gotham', 'DC', 3232332, 'user1@user.com', +25498765678', 'good quality products', sent to admins', 110, 1, '2022-12-14 12:47:47');

-- --------------------------------------------------------


--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(3) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(10) NOT NULL,
  `quantity` int(3) NOT NULL DEFAULT 1,
  `image` varchar(200) NOT NULL,
  `exp_date` varchar(200) NOT NULL,
  `category_id` int(3) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `quantity`, `image`, `exp_date`, `category_id`, `status`, `created_at`) VALUES
(1, 'VEGETABLES', 'Collaboratively extend collaborative ROI after client-centric metrics. Energistically enhance scalable scenarios whereas long-term high-impact architectures. Uniquely formulate leading-edge experiences through installed base technology. Quickly pontificate focused data after cutting-edge', '10', 1, 'vegetables.jpg', '2025', 1, 1, '2022-12-07 14:07:43'),
(2, 'MEATS', 'Enthusiastically enable competitive e-business rather than efficient total linkage. Professionally predominate superior infrastructures with unique technology. Assertively plagiarize premium communities vis-a-vis professional channels. ', '40', 1, 'meats.jpg', '2023', 2, 1, '2022-12-07 14:07:43'),
(3, 'FISHES', 'Interactively predominate cross-media web services and leveraged e-tailers. Authoritatively drive visionary leadership without resource maximizing value. Credibly transform an expanded array of architectures for compelling results. ', '50', 1, 'fish.jpg', '2024', 3, 1, '2022-12-07 15:30:26'),
(4, 'FRUITS', 'Uniquely incentivize real-time services through e-business intellectual capital. Dramatically recaptiualize global internal or \"organic\" sources after timely schemas. Progressively network cross ', '40', 1, 'fruits.jpg', '2024', 4, 1, '2022-12-07 15:30:26'),
(5, 'meat loaf', 'Quickly administrate viral best practices without out-of-the-box benefits. Competently formulate bleeding-edge metrics without flexible niche markets. Conveniently customize leveraged networks via orthogonal convergence. Appropriately ', '30', 1, 'meats.jpg', '2024', 2, 1, '2022-12-08 09:24:54'),
(6, 'tomatos', 'Globally coordinate cross-media e-tailers vis-a-vis quality methodologies. Efficiently parallel task competitive synergy after ubiquitous metrics. Efficiently synthesize cost effective core ', '10', 1, 'vegetables.jpg', '2024', 1, 1, '2022-12-08 09:32:32');

-- --------------------------------------------------------


--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `mypassword` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `phone_number` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `username`, `mypassword`, `image`, `address`, `city`, `country`, `zip_code`, `phone_number`, `created_at`) VALUES
(1, 'Mohamed Hassan', 'mohame@gmail.com', 'Mohamed Hassan', '$2y$10$EvaSGxbY90rOqk0fkdvmoOJToy5s4oVfZlJzph..4vqQT4jpPCDHS', 'user.png', 'Rapidiously extend diverse models before one-to-one architectures. Phosfluorescently envisioneer impactful users rather than corporate action ite', 'berlin', 'Germany', '3333322111', '3333322111', '2022-12-04 14:57:34'),
(2, 'joe doe', 'joe@gmail.com', 'joe@gmail.com', '$2y$10$tRmAQOgx4m8KGIHTAUDd/u3BPsYH1LJZnGlxXouTdsbkBEfa.uM3O', 'user.png', '', '', '', '0', '0', '2022-12-04 14:58:52'),
(50, 'web coding', 'web@gmail.com', 'web@gmail.com', '$2y$10$kJnCoRMo9O147I/UXh.ZQutUs7vLp9p8eBchUaT5Schm9pVGUc/4e', 'user.png', '', '', '', '0', '0', '2022-12-06 15:08:09'),
(51, 'user@gmail.com', 'user@gmail.com', 'user@gmail.com', '$2y$10$fBD2JqjhcoGv/uHxtFDFvuT79OpPRQKAa.6GdsEYt4lNX6ExbsfHy', 'user.png', '', '', '', '0', '0', '2022-12-06 15:09:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
