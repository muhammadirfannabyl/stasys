-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2021 at 03:08 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stasys`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `when` datetime NOT NULL,
  `quota` int(5) NOT NULL,
  `u_id` int(5) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `desc`, `when`, `quota`, `u_id`, `created`) VALUES
(1, 'MAT263 Assessment 2', 'Linear Algebra II second assessment for students from CS1105D.', '2021-01-15 14:00:00', 30, 1, '0000-00-00'),
(2, 'Semester Break Dinner', 'Dinner for students who are taking a  break for a week before enduring another pain with upcoming final assessments.', '2021-01-22 20:00:00', 25, 1, '0000-00-00'),
(3, 'Semester Break Dinner', 'Dinner for students who are taking a  break for a week before enduring another pain with upcoming final assessments.', '2021-01-22 20:00:00', 25, 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `participation`
--

CREATE TABLE `participation` (
  `id` int(5) NOT NULL,
  `u_id` int(5) NOT NULL,
  `e_id` int(5) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participation`
--

INSERT INTO `participation` (`id`, `u_id`, `e_id`, `created`) VALUES
(1, 2, 1, '2021-01-14'),
(2, 4, 1, '2021-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `un` varchar(50) NOT NULL,
  `pw` varchar(50) NOT NULL,
  `mat_id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `prog` varchar(10) NOT NULL,
  `part` int(2) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `un`, `pw`, `mat_id`, `name`, `prog`, `part`, `created`) VALUES
(1, 'admin', 'edmin', '2018123456', 'STASYS Administrator', 'SYSTEM', 0, '2021-01-14'),
(2, 'yongcf', 'ycfong', '2018253729', 'Yong Chua Fong', 'CS110', 5, '2021-01-14'),
(4, 'mohana', 'mnazri', '2018566028', 'Mohammad Nik Azril', 'CS110', 5, '0000-00-00'),
(5, 'rachfk', 'rfkaa', '2018425605', 'Rachel Fang Kaa Shui', 'CS110', 5, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `participation`
--
ALTER TABLE `participation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `participation`
--
ALTER TABLE `participation`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
