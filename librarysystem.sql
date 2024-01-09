-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2024 at 05:16 PM
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
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(2, 'Preityantoinette', 'gandaa', '$2y$10$hIJKVRQMYYvwmsS4EBezSepuwI9FTBagTSDU6jzISDJixz5rKAEi6'),
(8, 'preuty', 'preity', '$2y$10$B7FJ1agooVOGbCF8kB427efSABsd2WSjjh4MoOpSlQDnJ58yODcU2'),
(9, 'albert', 'albert', '$2y$10$2IUmIsh1mWJoZk.MbUM.du0e1IXR/OJi9SSIYE2ES1.wQQw1sfng2'),
(10, 'rivera', 'rivera', '$2y$10$L8ikLsbPKKbkf94Rh.DO1u2g3.j7s6wDRe5W52ZHqKQwgFdM7rpgu'),
(11, 'jin', 'jin123', '$2y$10$l0LSFC0697KiRhqnpWcYheTkRBhf1waeWGsFXzz1VWnmi/BPX7Z92');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
