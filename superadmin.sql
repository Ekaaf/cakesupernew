-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2021 at 07:22 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `superadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` int(3) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `created`, `modified`) VALUES
(1, 'ekaf', 'ekaf@gmail.com', '$2y$10$RZ3cjZioxtq1rzuw/nDryORFXELIxqQosgvkwCFdsalcs.2bZTUfm', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_otp`
--

CREATE TABLE `users_otp` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `otp` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_otp`
--

INSERT INTO `users_otp` (`id`, `user_id`, `otp`, `status`, `created`, `modified`) VALUES
(22, 1, '68199', 2, '2021-01-02 10:38:17', '2021-01-02 10:38:17'),
(23, 1, '879372', 2, '2021-01-02 10:41:11', '2021-01-02 10:41:11'),
(24, 1, '837856', 2, '2021-01-02 10:57:47', '2021-01-02 10:57:47'),
(25, 1, '822682', 2, '2021-01-02 10:58:10', '2021-01-02 10:58:10'),
(26, 1, '342770', 2, '2021-01-02 10:58:24', '2021-01-02 10:58:24'),
(27, 1, '408005', 2, '2021-01-02 10:58:54', '2021-01-02 10:58:54'),
(28, 1, '258781', 2, '2021-01-02 10:59:09', '2021-01-02 10:59:09'),
(29, 1, '301501', 2, '2021-01-02 11:05:06', '2021-01-02 11:05:06'),
(30, 1, '659334', 2, '2021-01-02 11:05:13', '2021-01-02 11:05:13'),
(31, 1, '149975', 2, '2021-01-02 11:05:23', '2021-01-02 11:05:23'),
(32, 1, '232558', 2, '2021-01-02 11:06:16', '2021-01-02 11:06:16'),
(33, 1, '815559', 2, '2021-01-02 11:41:36', '2021-01-02 11:41:36'),
(34, 1, '417684', 2, '2021-01-02 11:41:43', '2021-01-02 11:41:43'),
(35, 1, '53597', 2, '2021-01-02 11:41:53', '2021-01-02 11:41:53'),
(36, 1, '819676', 2, '2021-01-02 11:42:15', '2021-01-02 11:42:15'),
(37, 1, '205243', 2, '2021-01-02 11:43:30', '2021-01-02 11:43:30'),
(38, 1, '438310', 2, '2021-01-02 11:49:43', '2021-01-02 11:49:43'),
(39, 1, '100064', 2, '2021-01-02 11:52:23', '2021-01-02 11:52:23'),
(40, 1, '676063', 2, '2021-01-02 11:53:58', '2021-01-02 11:53:58'),
(41, 1, '380344', 2, '2021-01-02 11:54:18', '2021-01-02 11:54:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_otp`
--
ALTER TABLE `users_otp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_otp`
--
ALTER TABLE `users_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
