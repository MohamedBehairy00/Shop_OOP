-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2024 at 12:11 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_online_oop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `desc`, `price`, `image`, `created_at`) VALUES
(51, 'Iphone 5', 'Hello', '50000', '66d19a818a6971725012609.jpg', '2024-08-30 12:55:45'),
(53, 'Product 4', 'Hello', '60000', '66d19a98d87a31725012632.jpg', '2024-08-30 13:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `phone`, `email`) VALUES
(1, 'Mohamed', '01234567891', '01029683616', 'm@m.com'),
(2, 'osama', ' $2y$10$vlS4TQ1/uJsLAnbSa59ybu83eo2Rw/UxdyR8cGV6MjxQbakS2YZBq', '01029683616', 'l@l.com'),
(3, 'ola', ' $2y$10$dE2rGpMXWOLqJ/EjW2KzjOPI25zXtQlzMliIuhdrxkfpImDBVx7be', '0121345896748', 'o@o.com'),
(4, 'sara', ' $2y$10$0j8u5ctxLEM3rPNO5Hdfles0qqTg0eYQa9Og7bqjbm1BpRmW7St7W', '021654896789', 's@s.com'),
(5, 'peter', ' $2y$10$9rpGeycFggelndZqhVBDVu/iUg3XXpDBX22Deg7V6c9qdkkUPP4b.', '023464864784', 'p@p.com'),
(6, 'lolo', ' $2y$10$rvsWWYDD1/7wDXVeqh3HuuuJ6v1R8MhrAbwOKEYtQ976KrkUgBjIG', '012345647897', 'k@k.com'),
(7, 'dina', '$2y$10$yrNqFKrtiE1FrAtmlDtGeuMmsuV5nMq8ZUzPsNDwDHapTD8Hjjvm2', '135468548647', 'd@d.com'),
(8, 'toto', '$2y$10$y8I1w1Z8CYn7.5Q2ftbap.cyL7A7rMvS08ZfQuAicvlwksKhsuL9W', '13241564987', 't@t.com'),
(9, 'hamdy', '$2y$10$/L1JHSpNThfiR5SzDRmkPOVoA.bEnwa7dXqxYwXXtHncQU5hnFFDS', '156486541856', 'h@h.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
