-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 21, 2021 at 11:12 AM
-- Server version: 10.4.15-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u726414194_stasys`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL,
  `location` varchar(100) NOT NULL,
  `quota` int(5) NOT NULL,
  `u_id` int(5) NOT NULL,
  `created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `description`, `date_time`, `location`, `quota`, `u_id`, `created`) VALUES
(1, 'MAT263 Assessment 2', 'Linear Algebra II second assessment for students from CS1105D.', '2021-01-15 14:00:00', 'Discord', 30, 1, '2021-01-14 14:50:05'),
(2, 'Semester Break Dinner', 'Dinner for students who are taking a  break for a week before enduring another pain with upcoming final assessments.', '2021-01-22 20:00:00', 'KFC Aiman Mall', 25, 1, '2021-01-14 14:50:05'),
(3, 'Partyyy', 'LETS GO PARTY!', '2021-01-14 00:00:00', 'Rumah Tuak', 25, 1, '0000-00-00 00:00:00'),
(10, 'Sleep', 'Let us go to sleep.', '2021-01-15 02:10:00', 'Bed', 10, 4, '2021-01-14 00:00:00'),
(11, 'CSC318 Group Project Progress Presentation', 'Nay we rest in peace with this work-in-progress website development project.', '2021-01-15 08:00:00', 'Google Meet', 15, 4, '2021-01-15 00:00:00'),
(12, 'CSC318 Group Project Progress Presentation v2', 'Rest in pieces.', '2021-01-19 08:00:00', 'Google Meet', 15, 8, '2021-01-17 16:08:43'),
(15, 'Progol', 'ess', '2021-01-18 12:31:00', 'Google Meet', 10, 8, '2021-01-17 16:31:35');

-- --------------------------------------------------------

--
-- Table structure for table `participation`
--

CREATE TABLE `participation` (
  `id` int(5) NOT NULL,
  `u_id` int(5) NOT NULL,
  `e_id` int(5) NOT NULL,
  `created` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participation`
--

INSERT INTO `participation` (`id`, `u_id`, `e_id`, `created`) VALUES
(1, 2, 1, '2021-01-14 00:00:00'),
(2, 4, 1, '2021-01-14 00:00:00'),
(3, 1, 10, '2021-01-14 14:48:58'),
(4, 2, 10, '2021-01-15 14:48:58'),
(5, 4, 10, '2021-01-13 14:48:58'),
(6, 5, 10, '2021-01-14 14:49:18'),
(8, 4, 2, '2021-01-15 00:00:00'),
(9, 8, 12, '2021-01-17 16:09:00'),
(10, 8, 13, '2021-01-17 16:16:50');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(1) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `title`) VALUES
(1, 'Developer'),
(2, 'Administrator'),
(3, 'User');

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
  `created` timestamp NULL DEFAULT current_timestamp(),
  `access_lvl` int(1) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `un`, `pw`, `mat_id`, `name`, `prog`, `part`, `created`, `access_lvl`) VALUES
(1, 'admin', 'edmin', '2018123456', 'STASYS Administrator', 'SYSTEM', 1, '2021-01-14 00:00:00', 2),
(2, 'yongcf', 'ycfong', '2018253729', 'Yong Chua Fong', 'CS110', 5, '2021-01-14 00:00:00', 3),
(4, 'mohana', 'mnazri', '2018566028', 'Mohammad Nik Azril', 'CS110', 5, '2021-01-13 00:00:00', 3),
(5, 'rachfk', 'rfkaa', '2018425605', 'Rachel Fang Kaa Shui', 'CS110', 5, '2021-01-15 00:00:00', 3),
(6, 'andriane', 'andriane', '2018233658', 'Andriane Edrie', 'CS110', 5, '2021-01-17 00:00:00', 1),
(7, 'adli', 'adli', '2018405408', 'Mohd Adli', 'CS110', 5, '2021-01-17 00:00:00', 1),
(8, 'nabyl', 'nabyl', '2018283248', 'Nabyl Muhd Irfan', 'CS110', 5, '2021-01-17 00:00:00', 1),
(9, 'irffi', 'irffi', '2018271014', 'Mohd Irffi', 'CS110', 5, '2021-01-17 06:51:06', 3),
(10, 'aliya', 'aliya', '2018663214', 'Aliya Shahirah', 'CS110', 5, '2021-01-17 06:51:54', 3);

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
-- Indexes for table `position`
--
ALTER TABLE `position`
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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `participation`
--
ALTER TABLE `participation`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
