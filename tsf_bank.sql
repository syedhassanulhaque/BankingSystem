-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2022 at 04:09 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tsf_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `sender_acc` int(100) NOT NULL,
  `receiver_acc` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `sender_acc`, `receiver_acc`, `amount`, `transaction_id`, `time`) VALUES
(51, 20223, 20226, 3000, '202236378ea97c316420226', '2022-11-19 14:39:19'),
(52, 20221, 20225, 1000, '202216378eabecf3dc20225', '2022-11-19 14:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `balance` int(100) NOT NULL,
  `acc` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `balance`, `acc`) VALUES
(1, 'Hassan', 'syedha@gmail.com', 11000, 20221),
(2, 'Farhan', 'jhccvas@gmail.com', 1000, 20222),
(3, 'Kshitij', 'kshitij@gmail.com', 96000, 20223),
(4, 'Rohan', 'rohan@gmail.com', 87435, 20224),
(5, 'Faraz', 'faraz@gmail.com', 78465, 20225),
(6, 'Abu Bakr', 'abubakr@gmail.com', 876565, 20226),
(7, 'Arbaz', 'arbaz@gmail.com', 938987, 20228),
(8, 'Mohit', 'mohit@gmail.com', 8759, 20229),
(9, 'Sarfaraz', 'sarfaraz@gmail.com', 8576, 202210),
(10, 'Ahmad', 'ahmad@gmail.com', 87235, 202211),
(11, 'Irfan', 'irfan@gmail.com', 100000, 202212),
(12, 'Madhav', 'madhav@gmail.com', 93856, 202213);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
