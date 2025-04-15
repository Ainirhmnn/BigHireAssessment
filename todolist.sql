-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2025 at 03:14 AM
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
-- Database: `bigheroassessment`
--

-- --------------------------------------------------------

--
-- Table structure for table `todolist`
--

CREATE TABLE `todolist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `desc` longtext NOT NULL,
  `is_completed` char(255) NOT NULL,
  `status` char(255) NOT NULL,
  `due_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `todolist`
--

INSERT INTO `todolist` (`id`, `created_at`, `updated_at`, `title`, `desc`, `is_completed`, `status`, `due_date`) VALUES
(1, '2025-04-14 01:25:57', '2025-04-14 07:21:54', 'abcdefgh', '1231112121212121', 'N', 'D', '2025-04-15'),
(2, '2025-04-14 06:23:09', '2025-04-14 07:21:57', 'abc', '12345', 'N', 'D', '2025-04-14'),
(3, '2025-04-14 06:24:20', '2025-04-14 07:22:01', 'ac 22', 'dsds', 'N', 'D', '2025-04-15'),
(4, '2025-04-14 06:24:32', '2025-04-14 07:22:04', '123', '1212121', 'N', 'D', '2025-04-15'),
(5, '2025-04-14 06:25:18', '2025-04-14 17:03:30', 'Buy groceries', 'list to buy: \n- apple\n- chicken', 'Y', 'A', '2025-04-14'),
(6, '2025-04-14 06:32:50', '2025-04-14 17:06:03', 'wash laundry', 'acfee', 'N', 'D', '2025-04-16'),
(7, '2025-04-14 06:49:18', '2025-04-14 07:29:59', 'Wash Laundry', 'Please separate light color clothes with others to avoid it from damage', 'N', 'A', '2025-04-15'),
(8, '2025-04-14 17:08:20', '2025-04-14 17:08:20', 'Gardening', 'Design the garden layout for both indoor and outdoor garden', 'N', 'A', '2025-04-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todolist`
--
ALTER TABLE `todolist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todolist`
--
ALTER TABLE `todolist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
