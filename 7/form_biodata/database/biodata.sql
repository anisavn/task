-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2019 at 01:19 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biodata`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`) VALUES
(1, 'Jakarta'),
(2, 'Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE `hobbies` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hobbies`
--

INSERT INTO `hobbies` (`id`, `name`) VALUES
(1, 'Renang'),
(2, 'Game'),
(3, 'Mancing'),
(4, 'Gibah'),
(5, 'Programming');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth_id` int(11) NOT NULL,
  `phone_number` varchar(18) NOT NULL,
  `address` text NOT NULL,
  `last_education` enum('SMA/SMK','S1','S2') NOT NULL,
  `religion` enum('Islam','Kristen','Katolik') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `date_of_birth`, `place_of_birth_id`, `phone_number`, `address`, `last_education`, `religion`) VALUES
(1, 'Lucinta Luna', '1992-07-12', 1, '081111', 'Jakarta', 'S1', 'Kristen'),
(2, 'Satrio', '2001-07-21', 2, '082222', 'Bandung', 'SMA/SMK', 'Islam'),
(4, 'Syahrini', '1989-01-01', 2, '083333', 'Bandungg', 'S1', 'Islam'),
(5, 'Vina Anisa', '2019-07-05', 1, '087777', 'Solok', 'S1', 'Islam'),
(6, 'dio', '2019-07-17', 1, '12', 'ad', 'S1', 'Kristen'),
(7, 'dio', '2019-07-09', 1, '122', 'ad', 'S1', 'Katolik'),
(8, 'dio', '2019-07-09', 1, '122', 'ad', 'S1', 'Katolik'),
(9, 'Dioooo', '2019-07-09', 2, '0861625', 'fdjhfaksjd', 'S1', 'Katolik'),
(10, 'asdf', '2019-07-01', 1, '08765', 'asd', 'S1', 'Kristen'),
(11, 'df', '2019-07-01', 1, '65', 'hh', 'S1', 'Kristen');

-- --------------------------------------------------------

--
-- Table structure for table `users_hobbies`
--

CREATE TABLE `users_hobbies` (
  `biodata_id` int(11) NOT NULL,
  `hobby_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_hobbies`
--

INSERT INTO `users_hobbies` (`biodata_id`, `hobby_id`) VALUES
(1, 1),
(2, 2),
(4, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_ibfk_1` (`place_of_birth_id`);

--
-- Indexes for table `users_hobbies`
--
ALTER TABLE `users_hobbies`
  ADD KEY `users_hobbies_ibfk_1` (`biodata_id`),
  ADD KEY `users_hobbies_ibfk_2` (`hobby_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`place_of_birth_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_hobbies`
--
ALTER TABLE `users_hobbies`
  ADD CONSTRAINT `users_hobbies_ibfk_1` FOREIGN KEY (`biodata_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_hobbies_ibfk_2` FOREIGN KEY (`hobby_id`) REFERENCES `hobbies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
