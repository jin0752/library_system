-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 05:34 PM
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
-- Database: `librarysystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(100) NOT NULL,
  `cabnum` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `year` int(255) NOT NULL,
  `bookver` varchar(255) NOT NULL,
  `booknum` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `cabnum`, `title`, `author`, `year`, `bookver`, `booknum`) VALUES
(1, 0, 'Introduction to Linear Algebra with Application', 'Jim DeFranza, Daniel Gagliardi', 2019, 'QA 184.2 D43 2009 copy 1', 3565),
(2, 0, 'Basic Statistics 5th Edition', 'Charles Henry Brase, Corrine Pellillo Brase', 2012, 'QA 276.12 B12 2012 copy 3', 5635),
(3, 0, 'Trigonometry Ninth Edition', 'John Hornsby, David Schneider', 2009, 'QA 531 L52 2009 copy 3', 97803855),
(4, 0, 'An Introduction to Computer Science Using C', 'Roger Eggen, Maurice Eggen', 1994, 'QA 76 C65 E33 1994 copy 1', 1093),
(5, 0, 'Artificial Intelligence (Structures and Strategies for Complex Problem Solving)', 'George F. Luger', 2003, 'Q 335 L48 2003', 5601),
(6, 0, 'New trends in school science equipment', 'United Nations Educational, Scientific and Cultural Organization', 1983, 'Q 183 N48 1983', 454),
(7, 0, 'The Physical Sciences', 'Dr. Franklin G. Fisk, Dr. Milo K. Blecha', 1974, 'Q 158.5 F57 1974', 221),
(8, 0, 'Remarkable Relatives', 'John Train', 1981, 'PN 6231 T72 1981', 1875);

-- --------------------------------------------------------

--
-- Table structure for table `student_logs`
--

CREATE TABLE `student_logs` (
  `id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_logs`
--

INSERT INTO `student_logs` (`id`, `name`, `date`, `status`) VALUES
('abef2740', 'Lore', '2024-01-16 15:03:11', 'Check-in'),
('abef2740', 'Lore', '2024-01-16 15:03:17', 'Check-out'),
('8a61ab1a', 'albert son rivera', '2024-01-16 15:03:44', 'Check-in'),
('8a61ab1a', 'albert son rivera', '2024-01-16 15:03:44', 'Check-out'),
('8a61ab1a', 'albert son rivera', '2024-01-16 15:03:45', 'Check-out'),
('8a61ab1a', 'albert son rivera', '2024-01-16 15:03:49', 'Check-in'),
('8a61ab1a', 'albert son rivera', '2024-01-16 15:03:50', 'Check-out'),
('8a61ab1a', 'albert son rivera', '2024-01-16 15:03:50', 'Check-in'),
('8a61ab1a', 'albert son rivera', '2024-01-16 15:03:56', 'Check-in'),
('8a61ab1a', 'albert son rivera', '2024-01-16 15:03:56', 'Check-out'),
('8a61ab1a', 'albert son rivera', '2024-01-16 15:03:56', 'Check-in'),
('abef2740', 'Lore', '2024-01-23 13:56:40', 'Check-in'),
('abef2740', 'lolo', '2024-01-23 13:58:37', 'Check-out'),
('abef2740', 'lolo', '2024-01-23 13:58:56', 'Check-in'),
('abef2740', 'lolo', '2024-01-23 14:00:14', 'Check-out'),
('8a61ab1a', 'bon basmayor', '2024-01-23 14:31:22', 'Check-out'),
('8a61ab1a', 'bon basmayor', '2024-01-23 14:32:03', 'Check-in'),
('8a61ab1a', 'bon basmayor', '2024-01-23 14:32:21', 'Check-out'),
('8a61ab1a', 'bon basmayor', '2024-01-23 14:33:38', 'Check-in'),
('abef2740', 'lore axel', '2024-01-23 14:36:21', 'Check-in'),
('abef2740', 'lore axel', '2024-01-23 14:36:28', 'Check-out'),
('abef2740', 'lore axel', '2024-01-23 14:36:48', 'Check-in'),
('8a61ab1a', 'bon basmayor', '2024-01-23 14:37:00', 'Check-out'),
('8a61ab1a', 'bon basmayor', '2024-01-23 14:37:08', 'Check-in'),
('abef2740', 'lore axel', '2024-01-23 14:37:16', 'Check-out'),
('8a61ab1a', 'bon basmayor', '2024-01-23 14:37:25', 'Check-out'),
('abef2740', 'lore axel', '2024-01-23 14:39:07', 'Check-in'),
('8a61ab1a', 'bon basmayor', '2024-01-23 14:39:07', 'Check-in'),
('8a61ab1a', 'bon basmayor', '2024-01-25 11:54:17', 'Check-out'),
('8a61ab1a', 'bon basmayor', '2024-01-25 11:54:18', 'Check-in'),
('8a61ab1a', 'bon basmayor', '2024-01-25 11:55:32', 'Check-out'),
('8a61ab1a', 'bon basmayor', '2024-01-25 11:55:33', 'Check-in'),
('8a61ab1a', 'bon basmayor', '2024-01-25 11:55:33', 'Check-out'),
('8a61ab1a', 'bon basmayor', '2024-01-25 11:55:46', 'Check-in'),
('8a61ab1a', 'bon basmayor', '2024-01-25 11:55:46', 'Check-out'),
('8a61ab1a', 'bon basmayor', '2024-01-25 11:55:47', 'Check-out'),
('8a61ab1a', 'bon basmayor', '2024-01-25 11:55:51', 'Check-in'),
('8a61ab1a', 'bon basmayor', '2024-01-25 11:55:51', 'Check-out'),
('8a61ab1a', 'bon basmayor', '2024-01-25 11:55:54', 'Check-out'),
('8a61ab1a', 'bon basmayor', '2024-01-25 11:55:54', 'Check-in'),
('8a61ab1a', 'bon basmayor', '2024-01-25 11:55:55', 'Check-out'),
('8a61ab1a', 'bon basmayor', '2024-01-25 11:55:55', 'Check-in'),
('8a61ab1a', 'bon basmayor', '2024-01-25 11:55:59', 'Check-in'),
('8a61ab1a', 'bon basmayor', '2024-01-25 11:55:59', 'Check-out'),
('8a61ab1a', 'bon basmayor', '2024-01-25 11:56:01', 'Check-in'),
('8a61ab1a', 'bon basmayor', '2024-01-25 11:56:02', 'Check-out'),
('8a61ab1a', 'bon basmayor', '2024-01-25 11:56:03', 'Check-in');

-- --------------------------------------------------------

--
-- Table structure for table `table_the_iot_projects`
--

CREATE TABLE `table_the_iot_projects` (
  `name` varchar(100) NOT NULL,
  `id` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `table_the_iot_projects`
--

INSERT INTO `table_the_iot_projects` (`name`, `id`, `gender`, `email`, `mobile`, `status`) VALUES
('bon basmayor', '8a61ab1a', 'Female', 'bon@gmail.com', '09335191191', 'Check-in'),
('lore axel', 'abef2740', 'Male', 'loreaxel@GMAIL.COM', '09335192678', 'Check-in');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `mname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(250) NOT NULL,
  `verification_code` varchar(255) NOT NULL,
  `is_verified` int(50) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `mname`, `lname`, `email`, `password`, `cpassword`, `verification_code`, `is_verified`) VALUES
(9, '', '', '', 'albert', '$2y$10$2IUmIsh1mWJoZk.MbUM.du0e1IXR/OJi9SSIYE2ES1.wQQw1sfng2', '', '', 0),
(10, '', '', '', 'rivera', '$2y$10$L8ikLsbPKKbkf94Rh.DO1u2g3.j7s6wDRe5W52ZHqKQwgFdM7rpgu', '', '', 0),
(11, '', '', '', 'jin123', '$2y$10$l0LSFC0697KiRhqnpWcYheTkRBhf1waeWGsFXzz1VWnmi/BPX7Z92', '', '', 0),
(14, 'albert ', 'pds', 'albert ', 'dsadsa', '$2y$10$8Nm4hGMnNvKq8S0qTGv1ke60zPWbAM./LClQpV0cSgcCX1QbNQktS', '$2y$10$hKzkJqM2xoDHV51TgEEvj.1WV/SAC5vIc00g5PPgpB6Wf.cbdgj/q', '', 0),
(21, 'admin', 'test', 'admin', 'test@sample.com', '$2y$10$8j3fXnL0fzD2BWSddda77.P/7roc.YvqdHuSe5/TYdhdaQCs5JcF.', '$2y$10$wu./kLHRtF3rE9IgOCg72ecxUTYrsj1gDpwJxeffTm4O08s///TIa', '', 0),
(22, 'bonna', 'giatay', 'bonna', 'bon@sample.com', '$2y$10$1vEqBNU9As48mMcx5e7HB.pYrsuGtFL.ki4BErZfBCV3cYWebnXWS', '$2y$10$7L5I//PESFlyoLbw.lTZ6emFNfEwbOgW9TAXn287D1ko/35cUwvuO', '', 0),
(83, 'albert', 'son', 'albert', 'jin.clips@gmail.com', '$2y$10$zeY5lDj60OrOot2.BIAeEeKVgIH2Vjlr2rBQl5uq/vf/vucUEV3tm', '$2y$10$zHhgjd8tzKADaEAS5yfDAe1GP2smUK7vnvNrTXwmRJmkpdoXM.EF6', '16dabd489d1210de1cedc8f4687e271a', 1),
(84, 'albert', 'son', 'albert', 'jin.clips@gmail.com', '$2y$10$zeY5lDj60OrOot2.BIAeEeKVgIH2Vjlr2rBQl5uq/vf/vucUEV3tm', '$2y$10$zHhgjd8tzKADaEAS5yfDAe1GP2smUK7vnvNrTXwmRJmkpdoXM.EF6', '16dabd489d1210de1cedc8f4687e271a', 1),
(85, 'albert', 'son', 'albert', 'jin.clips@gmail.com', '$2y$10$/6WPZg1XV7BUjABe.FtwJOGpI8r0QGV4WzH0uc09yTWAgNKt/W1eq', '$2y$10$l7n5j5P7/rp39K6s1uhRtep292IvScPP0pvXSKqOf3l/RY9R27GbO', 'd8793fd93c7623f19ddf40078f01a0a8', 1),
(86, 'albert', 'son', 'albert', 'jin.clips@gmail.com', '$2y$10$/6WPZg1XV7BUjABe.FtwJOGpI8r0QGV4WzH0uc09yTWAgNKt/W1eq', '$2y$10$l7n5j5P7/rp39K6s1uhRtep292IvScPP0pvXSKqOf3l/RY9R27GbO', 'd8793fd93c7623f19ddf40078f01a0a8', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_the_iot_projects`
--
ALTER TABLE `table_the_iot_projects`
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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
