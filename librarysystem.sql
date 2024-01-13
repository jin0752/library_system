-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 12:49 PM
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
(1, 123131, 'fasfafsa', 'fafafa', 1231231, 'fahjkda', 1231321),
(2, 0, 'Introduction to Linear Algebra with Application', 'Jim DeFranza, Daniel Gagliardi', 2019, 'QA 184.2 D43 2009 copy 1', 3565);

-- --------------------------------------------------------

--
-- Table structure for table `student_logs`
--

CREATE TABLE `student_logs` (
  `id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `student_logs`
--

INSERT INTO `student_logs` (`id`, `name`, `date`) VALUES
('2a2c6219', 'Camela', '2023-12-12 22:55:19'),
('2a2c6219', 'Camela', '2023-12-12 22:55:27'),
('ABEF2740', 'Lore', '2023-12-12 22:55:28'),
('8a61ab1a', 'Jeffrey', '2023-12-12 22:55:31'),
('ABEF2740', 'Lore', '2023-12-12 23:03:44'),
('ABEF2740', 'Lore', '2023-12-13 12:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `table_the_iot_projects`
--

CREATE TABLE `table_the_iot_projects` (
  `name` varchar(100) NOT NULL,
  `id` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `table_the_iot_projects`
--

INSERT INTO `table_the_iot_projects` (`name`, `id`, `gender`, `email`, `mobile`) VALUES
('Camela', '2a2c6219', 'Female', 'Camela@Gmail.com', '097777'),
('Albert Son', '39EAB06D', 'Male', 'AlbertSon@gmail.com', '9800998787'),
('Jeffrey', '8a61ab1a', 'Male', 'jayjaypantaleon@gmail.com', '09424590845'),
('Lore', 'ABEF2740', 'Male', 'axel@gmil', '052352'),
('adsdsad', 'asadsadsad', 'Male', 'adsad', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `mname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fname`, `mname`, `lname`, `email`, `password`, `cpassword`) VALUES
(9, 'albert', '', '', '', 'albert', '$2y$10$2IUmIsh1mWJoZk.MbUM.du0e1IXR/OJi9SSIYE2ES1.wQQw1sfng2', ''),
(10, 'rivera', '', '', '', 'rivera', '$2y$10$L8ikLsbPKKbkf94Rh.DO1u2g3.j7s6wDRe5W52ZHqKQwgFdM7rpgu', ''),
(11, 'jin', '', '', '', 'jin123', '$2y$10$l0LSFC0697KiRhqnpWcYheTkRBhf1waeWGsFXzz1VWnmi/BPX7Z92', ''),
(13, 'jin123', 'albert son', 'purificacion', 'albert son', 'albert@sample.com', '$2y$10$Np1QatwfRg.W9G3IKWepaubbiz6na9E92NDRNTdMrb0.d8UyJnVHa', ''),
(14, 'admin', 'albert ', 'pds', 'albert ', 'dsadsa', '$2y$10$8Nm4hGMnNvKq8S0qTGv1ke60zPWbAM./LClQpV0cSgcCX1QbNQktS', '$2y$10$hKzkJqM2xoDHV51TgEEvj.1WV/SAC5vIc00g5PPgpB6Wf.cbdgj/q'),
(21, 'test', 'admin', 'test', 'admin', 'test@sample.com', '$2y$10$8j3fXnL0fzD2BWSddda77.P/7roc.YvqdHuSe5/TYdhdaQCs5JcF.', '$2y$10$wu./kLHRtF3rE9IgOCg72ecxUTYrsj1gDpwJxeffTm4O08s///TIa'),
(22, 'bon', 'bonna', 'giatay', 'bonna', 'bon@sample.com', '$2y$10$1vEqBNU9As48mMcx5e7HB.pYrsuGtFL.ki4BErZfBCV3cYWebnXWS', '$2y$10$7L5I//PESFlyoLbw.lTZ6emFNfEwbOgW9TAXn287D1ko/35cUwvuO');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
