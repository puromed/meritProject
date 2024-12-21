-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 21, 2024 at 04:47 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emerit`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `activity_id` int NOT NULL,
  `activity_name` varchar(50) NOT NULL,
  `merit_id` int DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `merits`
--

CREATE TABLE `merits` (
  `merit_id` int NOT NULL,
  `merit_type` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `points` float NOT NULL DEFAULT '0',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `merit_letter_requests`
--

CREATE TABLE `merit_letter_requests` (
  `id` int NOT NULL,
  `student_id` varchar(30) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
(20241211105630, 'CreateTablesInitial', '2024-12-11 11:18:45', '2024-12-11 11:18:45', 0),
(20241213080058, 'Initial', '2024-12-13 08:00:58', '2024-12-13 08:00:58', 0),
(20241220065447, 'CreateMeritLetterRequests', '2024-12-20 07:15:45', '2024-12-20 07:15:45', 0),
(20241220141537, 'UpdatedMigration', '2024-12-20 14:20:53', '2024-12-20 14:20:53', 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` varchar(50) NOT NULL,
  `user_id` int DEFAULT NULL,
  `name` varchar(100) NOT NULL DEFAULT 'empty',
  `date_of_birth` date NOT NULL,
  `gender` varchar(30) NOT NULL DEFAULT 'empty',
  `email` varchar(100) NOT NULL DEFAULT 'empty',
  `phone_number` varchar(14) NOT NULL DEFAULT 'empty',
  `address1` varchar(100) NOT NULL DEFAULT 'empty',
  `address2` varchar(100) NOT NULL DEFAULT 'empty',
  `postcode` varchar(10) NOT NULL DEFAULT 'empty',
  `city` varchar(100) NOT NULL DEFAULT 'empty',
  `state` varchar(100) NOT NULL DEFAULT 'empty',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `user_id`, `name`, `date_of_birth`, `gender`, `email`, `phone_number`, `address1`, `address2`, `postcode`, `city`, `state`, `created`, `modified`) VALUES
('0', NULL, 'Amir', '2003-10-03', 'Male', 'puro@localhost.com', '01234567891', 'no.9, jalan test', 'pinggiran', '42610', 'Jenjarom', 'Selangor', '2024-12-21 16:07:06', '2024-12-21 16:07:06');

-- --------------------------------------------------------

--
-- Table structure for table `student_merits`
--

CREATE TABLE `student_merits` (
  `student_merit_id` int NOT NULL,
  `student_id` varchar(30) NOT NULL,
  `merit_id` int DEFAULT NULL,
  `Date_Received` date DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT 'user',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `created`, `modified`) VALUES
(3, 'test123@localhost.com', '$2y$10$jfaNnIrff1Abi8L182WxHOA.iZbfl9.vN2Y7ne2yiL.aLEhkruGF.', 'admin', '2024-12-11 11:35:51', '2024-12-11 11:35:51'),
(4, 'cuba@localhost.com', '$2y$10$3q7/CkArQvrAgQ0kvZzpDuJOujxZiOyzE52JXD3br6JJJMg5pfMfW', 'user', '2024-12-11 11:36:14', '2024-12-11 11:36:14'),
(5, 'boo@localhost.com', '$2y$10$uwt1.lcOPgogG0WKkFkdkuVEJzwRUQ78z4SFArHQS2oN7A3DDw.EC', 'user', '2024-12-18 18:17:36', '2024-12-18 18:17:36'),
(11, 'puro@localhost.com', '$2y$10$YX.hBWOSwDRZCtRW8WkgL.9yIz3a/5LNQerjvCVUuFryZchhEBGHa', 'user', '2024-12-21 16:07:06', '2024-12-21 16:07:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `merit_id` (`merit_id`);

--
-- Indexes for table `merits`
--
ALTER TABLE `merits`
  ADD PRIMARY KEY (`merit_id`),
  ADD UNIQUE KEY `merit_id` (`merit_id`);

--
-- Indexes for table `merit_letter_requests`
--
ALTER TABLE `merit_letter_requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`),
  ADD KEY `BY_STUDENT_ID` (`student_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `student_id` (`student_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `student_merits`
--
ALTER TABLE `student_merits`
  ADD PRIMARY KEY (`student_merit_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `merit_id` (`merit_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `merit_letter_requests`
--
ALTER TABLE `merit_letter_requests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`merit_id`) REFERENCES `merits` (`merit_id`);

--
-- Constraints for table `merit_letter_requests`
--
ALTER TABLE `merit_letter_requests`
  ADD CONSTRAINT `merit_letter_requests_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `student_merits`
--
ALTER TABLE `student_merits`
  ADD CONSTRAINT `student_merits_ibfk_2` FOREIGN KEY (`merit_id`) REFERENCES `merits` (`merit_id`),
  ADD CONSTRAINT `student_merits_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
