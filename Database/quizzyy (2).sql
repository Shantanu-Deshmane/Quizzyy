-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2024 at 07:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizzyy`
--

-- --------------------------------------------------------

--
-- Table structure for table `cnt_form`
--

CREATE TABLE `cnt_form` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cnt_form`
--

INSERT INTO `cnt_form` (`id`, `name`, `email`, `phone_number`, `message`) VALUES
(15, 'Shubham Chavan', 'chsvanshubham112@gmail.com', '8855656599', ''),
(17, 'shantanu', 'Shantanu@gmail.com', '7666964743', '');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_scores`
--

CREATE TABLE `quiz_scores` (
  `score` int(100) NOT NULL,
  `id` int(10) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_scores`
--

INSERT INTO `quiz_scores` (`score`, `id`, `date`) VALUES
(2, 0, '2024-04-15 08:47:48'),
(10, 0, '2024-04-15 08:47:48'),
(8, 12345, '2024-04-15 08:47:48'),
(12, 12345, '2024-04-15 08:47:48'),
(2, 0, '2024-04-15 08:47:48'),
(0, 0, '2024-04-15 08:47:48'),
(2, 45, '2024-04-15 08:47:48'),
(12, 27, '2024-04-15 08:47:48'),
(2, 27, '2024-04-15 08:47:48'),
(10, 45, '2024-04-15 08:49:10'),
(18, 46, '2024-04-15 09:59:20'),
(2, 47, '2024-04-15 10:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `first_name`, `last_name`, `phone_number`, `email`, `password`, `date`) VALUES
(21, ' bhjh', 'ugg', '08855885588', 'deshmane@gmail.com', 'Pass@123', '2024-04-15 08:59:45'),
(22, ' shantanu', 'Deshmane', '8857891211', 'deshmaneshantanu@gmail.com', 'Pass@123', '2024-04-15 08:59:45'),
(23, ' Aditya', 'Borgaonkar', '7666964743', 'adityaborgaonkar4@gmail.com', 'Aditya@123', '2024-04-15 08:59:45'),
(25, ' Kedar', 'Kumbhar', '8857891211', 'shantanudeshmane81@gmail.com', 'Shantanu@123', '2024-04-15 08:59:45'),
(26, ' shubham', 'pawar', '7666964743', 'shubjam@gmail.com', 'Shubham@123', '2024-04-15 08:59:45'),
(27, ' viraj', 'pawar', '7666964743', 'viraj@gmail.com', 'Shubham@123', '2024-04-15 08:59:45'),
(28, ' Suhas', 'patil', '7666964743', 'suhas1232@gmail.com', 'Pass@123', '2024-04-15 08:59:45'),
(29, ' Ganesh ', 'patil', '9765477461', 'ganeshp@gmail.com', 'Ganesh@123', '2024-04-15 08:59:45'),
(30, ' yash', 'jangade', '7020721008', 'yashjangade@gmail.com', 'Yash@123', '2024-04-15 08:59:45'),
(31, ' vinit', 'Thorat', '9423501341', 'vinitthorat03@gmail.com', 'Vinit@123', '2024-04-15 08:59:45'),
(32, ' Aditya', 'Borgaonkar', '8484972543', 'adityaborgaonkar4@gmail.com', 'Aditya@123', '2024-04-15 08:59:45'),
(33, ' fdgfdg', 'ghghfhg', '1234567890', 'adityaborgaonkar4@gmail.com', '12345678@shreeA', '2024-04-15 08:59:45'),
(34, ' shreyash', 'jadhav', '8983110944', 'mr.shreyashjadhav@gmail.com', '12345678@Sh', '2024-04-15 08:59:45'),
(35, ' abhi', 'chavan', '7666964743', 'abhichavan@gmail.com', 'Pass@123', '2024-04-15 08:59:45'),
(36, ' rohit', 'jadhav', '8857891211', 'rahuljadhav@gmail.com', 'Rahul@123', '2024-04-15 08:59:45'),
(37, ' yogesh ', 'pawar', '7666964743', 'pawaryogesh77@gmail.com', 'Yogesh@123', '2024-04-15 08:59:45'),
(38, ' gaurav', 'pawar', '7666964743', 'gaurav@gmail.com', 'Gaurav@123', '2024-04-15 08:59:45'),
(39, ' pooja', 'deshmane', '8806096438', 'pooja@gmail.com', 'Pooja@123', '2024-04-15 08:59:45'),
(40, ' Mohan', 'Salunkhe', '7666964743', 'mohan@gmail.com', 'Pass@123', '2024-04-15 08:59:45'),
(41, 'Shantanu', 'Deshmane', '888888888888888', 'deshmaneshantanu9@gmail.com', '$2y$10$ENsWow2mpMEiL', '2024-04-15 08:59:45'),
(42, 'Shantanu', 'd', '7666964743', 'Shantanu@gmail.com', '$2y$10$NtHMF6ZXavNuA', '2024-04-15 08:59:45'),
(43, 'Shantanu', 'd', '7666964743', 'Shantanu@gmail.com', '$2y$10$QTlAOqpNXW4aG', '2024-04-15 08:59:45'),
(44, ' Aditya', 'Borgaonkar', '8484972543', 'adityaborgaonkar4@gmail.com', 'Pass@123', '2024-04-15 08:59:45'),
(45, ' user', 'user', '7666964743', 'user@gmail.com', 'User@123', '2024-04-15 08:59:45'),
(46, ' shantanu', 'deshmane', '7666964743', 'shantanudeshmane81@gmail.com', 'Pass@123', '2024-04-15 09:57:58'),
(47, ' john', 'smith', '7666964743', 'john@gmail.com', 'John@123', '2024-04-15 10:00:51'),
(48, ' Shantanu', 'Deshmane', '7666964743', 'shantanudeshmane81@gmail.com', 'Shantanu@123', '2024-06-17 21:11:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cnt_form`
--
ALTER TABLE `cnt_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_scores`
--
ALTER TABLE `quiz_scores`
  ADD KEY `user_id` (`id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cnt_form`
--
ALTER TABLE `cnt_form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
