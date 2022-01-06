-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 06, 2022 at 09:12 PM
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
  `seen` tinyint(1) DEFAULT NULL,
  `status` int(2) DEFAULT 0 COMMENT '0=none;\r\n1=user2 confirmation;\r\n2=confirmed;'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`ID`, `converser_1_id`, `converser_2_id`, `last_message_id`, `last_converser_id`, `seen`, `status`) VALUES
(1, '2', '1', 4, 2, 1, 2);

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

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`ID`, `conversation_id`, `from_id`, `to_id`, `message`, `date_time`) VALUES
(1, 1, 1, 2, 'hi', '2022-01-07 03:18:11'),
(2, 1, 2, 1, 'hello', '2022-01-07 03:18:33'),
(3, 1, 1, 2, 'hoy', '2022-01-07 03:43:35'),
(4, 1, 2, 1, 'wat', '2022-01-04 04:05:07');

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
(1, 'USR0000001', 'batman@email.com', '$2y$10$/DzMdkMqUQRBbLmzg1oqe.GZY0MY0zLcIEBUpuMSG9t.pS.EaqfB6', 'BATMAN', NULL, NULL, 'uploads/img/user_USR0000001/profile.jpeg'),
(2, 'USR0000002', 'joker@email.com', '$2y$10$bYe0WLvDIBkXFb3k2xoNa.2tRWQjGnrQrLJLQCIUw0TuGUof2Aaaa', 'JOKER', NULL, NULL, 'uploads/img/user_USR0000002/profile.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users_login`
--

CREATE TABLE `users_login` (
  `id` int(11) NOT NULL,
  `user_id` varchar(11) DEFAULT NULL,
  `log_in_last` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_login`
--

INSERT INTO `users_login` (`id`, `user_id`, `log_in_last`) VALUES
(1, 'USR0000001', '2022-01-07 03:47:50'),
(2, 'USR0000002', '2022-01-07 04:12:04');

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
-- Indexes for table `users_login`
--
ALTER TABLE `users_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_login`
--
ALTER TABLE `users_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
