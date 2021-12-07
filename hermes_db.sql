-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 07, 2021 at 08:40 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hermes_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `ID` int(11) NOT NULL,
  `converser_1_id` varchar(11) DEFAULT NULL,
  `converser_2_id` varchar(11) DEFAULT NULL,
  `last_message_id` int(11) DEFAULT NULL,
  `last_converser_id` int(11) DEFAULT NULL,
  `seen` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `ID` int(11) NOT NULL,
  `conversation_id` int(11) DEFAULT NULL,
  `from_id` int(11) DEFAULT NULL,
  `to_id` int(11) DEFAULT NULL,
  `message` varchar(767) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `user_id` varchar(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(127) DEFAULT NULL,
  `gender` varchar(31) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `profile_img` varchar(127) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `user_id`, `email`, `password`, `name`, `gender`, `birthday`, `profile_img`) VALUES
(1, 'USR0000001', 'test@email.com', '$2y$10$nuwMlRSTBJ7QuK3oXJodb.GsPExVfs5Dk4TkhZrls7hotg7dEBEOO', 'tester', NULL, NULL, NULL),
(2, 'USR0000002', 'santa@email.com', '$2y$10$1Jy4R6M/KeWiphHdpFDDE.UsioiUjRhLAWgea/h9EfxBfxOnWCND.', 'Santanas', NULL, NULL, 'uploads/img/user_1/profile.png'),
(3, 'USR0000003', 'user@email.com', '$2y$10$BPeyzFfD3CszpT93vTYXSuS2JEDfCoY9woWggKR0Y26TcGAE1//4a', 'User', NULL, NULL, 'uploads/img/user_2/profile.jpeg'),
(4, 'USR0000004', 'master@email.com', '$2y$10$QmociH33RacECE7kQ9jRU.xZSd/Aj/inOviuHlcTZelld9oZ9o7HS', 'Master', NULL, NULL, 'uploads/img/user_3/profile.jpeg'),
(5, 'USR0000005', '1@email.com', '$2y$10$KXqgBvhd30M7VE18BeXZ/.n2wrKRgG6rmvIokVQP6NxqTI/XfMIi.', '1', NULL, NULL, ''),
(6, 'USR0000006', '2@email.com', '$2y$10$7hCTGo7kr36QvnWkH3KPRu4e0T53.KHn3Be3ys2gcE6D.YIoRBmCu', 'Joker', NULL, NULL, '1/profile.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
