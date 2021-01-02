-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2021 at 09:15 PM
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
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`id`, `email`, `token`, `status`, `created`, `modified`) VALUES
(1, 'ekaf@gmail.com', 'f7cb0ef4336e0543d69290627e3b87e2409670688', 2, '2021-01-02 20:02:24', '2021-01-02 20:02:24'),
(2, 'ekaf@gmail.com', 'f7cb0ef4336e0543d69290627e3b87e2301489489', 0, '2021-01-02 20:02:33', '2021-01-02 20:02:33'),
(3, 'ekaf@gmail.com', 'f7cb0ef4336e0543d69290627e3b87e2442475644', 1, '2021-01-02 20:03:20', '2021-01-02 20:03:20');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin_attempt`
--

CREATE TABLE `userlogin_attempt` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userlogin_attempt`
--

INSERT INTO `userlogin_attempt` (`id`, `user_id`, `created`, `modified`) VALUES
(1, 1, '2021-01-02 19:24:43', '2021-01-02 19:24:43');

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
(42, 1, '654495', 0, '2021-01-02 18:57:29', '2021-01-02 18:57:29'),
(43, 1, '438702', 0, '2021-01-02 18:57:44', '2021-01-02 18:57:44'),
(44, 1, '773630', 0, '2021-01-02 18:58:37', '2021-01-02 18:58:37'),
(45, 1, '223078', 0, '2021-01-02 19:10:09', '2021-01-02 19:10:09'),
(46, 1, '422244', 0, '2021-01-02 19:10:39', '2021-01-02 19:10:39'),
(47, 1, '592315', 0, '2021-01-02 19:10:48', '2021-01-02 19:10:48'),
(48, 1, '856290', 0, '2021-01-02 18:10:57', '2021-01-02 19:10:57'),
(49, 1, '787377', 1, '2021-01-02 19:24:43', '2021-01-02 19:24:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlogin_attempt`
--
ALTER TABLE `userlogin_attempt`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userlogin_attempt`
--
ALTER TABLE `userlogin_attempt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_otp`
--
ALTER TABLE `users_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
