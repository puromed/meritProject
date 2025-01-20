-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 20, 2025 at 10:01 PM
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
  `description` text,
  `activity_date` datetime DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `availability` varchar(20) DEFAULT 'open',
  `merit_id` int DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activity_id`, `activity_name`, `description`, `activity_date`, `location`, `availability`, `merit_id`, `created`, `modified`) VALUES
(1, 'Sports Carnival 2024', 'Annual sports event featuring competitive sports such as track running, pole jumping, marathon and so on. Tie up those shoelaces and get ready to invigorate your body and moves towards excellence!', '2024-12-28 09:00:00', 'Main Sports Complex', 'open', 12, '2024-12-26 14:28:43', '2024-12-26 14:28:43'),
(2, 'Activity2', 'Lorem', '2024-12-31 10:00:00', 'Hall2', 'open', 11, '2024-12-26 11:30:47', '2025-01-18 14:05:04'),
(5, 'Open Day', 'Day that is open', '2025-01-20 10:00:00', 'Main Hall', 'open', 10, '2025-01-19 09:36:26', '2025-01-19 09:38:36'),
(7, 'Marhaban', 'asdbahskashdashkj', '2025-01-21 10:00:00', 'Sport hall', 'open', 11, '2025-01-19 15:02:41', '2025-01-19 15:02:41');

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

--
-- Dumping data for table `merits`
--

INSERT INTO `merits` (`merit_id`, `merit_type`, `description`, `points`, `created`, `modified`) VALUES
(10, 'extra', 'things you do for fun', 4, '2025-01-19 09:26:08', '2025-01-19 09:35:31'),
(11, 'Curricular activities', 'Activities that is part of the institution curriculum and result in grades or credits', 2, '2024-12-26 06:25:05', '2025-01-19 09:35:39'),
(12, 'Extracuricular Activities', 'Activities that is separated from the core concept of the institutions.', 0.85, '2024-12-26 06:32:18', '2024-12-26 06:32:18');

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

--
-- Dumping data for table `merit_letter_requests`
--

INSERT INTO `merit_letter_requests` (`id`, `student_id`, `status`, `created`, `modified`, `user_id`) VALUES
(1, '2024123456', 'approved', '2024-12-23 16:26:34', '2024-12-23 16:36:06', 6),
(3, '2024542298', 'approved', '2025-01-20 12:42:18', '2025-01-20 17:28:48', 7);

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
(20241227132537, 'Initial', '2024-12-27 13:33:16', '2024-12-27 13:33:16', 0),
(20250120215807, 'Initial', '2025-01-20 21:58:07', '2025-01-20 21:58:07', 0);

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
('2024123456', 6, 'puro', '2003-10-03', 'Male', 'puro@localhost.com', '011234567', 'Jalan Persiaran', 'pinggiran', '45000', 'Shah Alam', 'Selangor', '2024-12-21 17:26:15', '2025-01-19 09:12:58'),
('2024542298', 7, 'Thomas Muller', '2004-02-07', 'Male', 'munich@localhost.com', '01121101067', 'no.17, Jalan Setia Murni 1/12', 'Setia Alam', '40170', 'Shah Alam', 'Selangor', '2025-01-20 11:05:32', '2025-01-20 11:05:32');

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
  `modified` datetime DEFAULT CURRENT_TIMESTAMP,
  `activity_id` int DEFAULT NULL,
  `points` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_merits`
--

INSERT INTO `student_merits` (`student_merit_id`, `student_id`, `merit_id`, `Date_Received`, `created`, `modified`, `activity_id`, `points`) VALUES
(1, '2024123456', 12, '2024-12-26', '2024-12-26 14:05:44', '2024-12-26 14:05:44', 1, 0.85),
(2, '2024123456', 10, '2025-01-19', '2025-01-19 09:44:13', '2025-01-19 09:44:13', 5, 4),
(3, '2024123456', 11, '2025-01-19', '2025-01-19 15:04:06', '2025-01-19 15:04:06', 7, 2),
(4, '2024542298', 11, '2025-01-20', '2025-01-20 11:06:38', '2025-01-20 11:06:38', 2, 2),
(5, '2024542298', 11, '2025-01-20', '2025-01-20 11:07:03', '2025-01-20 11:07:03', 7, 2),
(6, '2024542298', 12, '2025-01-20', '2025-01-20 11:32:32', '2025-01-20 11:32:32', 1, 0.85);

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
(5, 'boo@localhost.com', '$2y$10$uwt1.lcOPgogG0WKkFkdkuVEJzwRUQ78z4SFArHQS2oN7A3DDw.EC', 'user', '2024-12-18 18:17:36', '2024-12-18 18:17:36'),
(6, 'puro@localhost.com', '$2y$10$nqwE3FBV2TcsZW1kNQXMuOntdMj7HfGbzZOrHN4ixtlNA3Jfi8THW', 'user', '2024-12-21 17:26:15', '2024-12-21 17:26:15'),
(7, 'munich@localhost.com', '$2y$10$eH6CSoSAnFPhWSo15kRX7e9LMDFufnnBYAMOcvonJ5rHtb1EfddI2', 'user', '2025-01-20 11:05:32', '2025-01-20 11:05:32');

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
  ADD KEY `merit_id` (`merit_id`),
  ADD KEY `activity_id` (`activity_id`);

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
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activity_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `merits`
--
ALTER TABLE `merits`
  MODIFY `merit_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `merit_letter_requests`
--
ALTER TABLE `merit_letter_requests`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_merits`
--
ALTER TABLE `student_merits`
  MODIFY `student_merit_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `student_merits_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `student_merits_ibfk_4` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`activity_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
