-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2023 at 02:45 PM
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
-- Database: `nodemcu_rfid_iot_projects`
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_the_iot_projects`
--
ALTER TABLE `table_the_iot_projects`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
