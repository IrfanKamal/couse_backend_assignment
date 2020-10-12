-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2020 at 12:59 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `couse_backend_assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `game_tbl`
--

CREATE TABLE `game_tbl` (
  `game_id` int(16) NOT NULL,
  `nama_game` varchar(255) NOT NULL,
  `jumlah_level` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game_tbl`
--

INSERT INTO `game_tbl` (`game_id`, `nama_game`, `jumlah_level`) VALUES
(1, 'Flappy Bird', 1),
(2, 'Pong', 1),
(3, 'Magnetized', 5),
(4, 'Angry Birds', 10),
(5, 'Match Tree', 1);

-- --------------------------------------------------------

--
-- Table structure for table `score_tbl`
--

CREATE TABLE `score_tbl` (
  `score_id` int(16) NOT NULL,
  `email` varchar(255) NOT NULL,
  `game_id` int(16) NOT NULL,
  `level` int(16) NOT NULL,
  `score` int(255) NOT NULL,
  `waktu_score` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `score_tbl`
--

INSERT INTO `score_tbl` (`score_id`, `email`, `game_id`, `level`, `score`, `waktu_score`) VALUES
(1, 'test@email.com', 1, 1, 50, '2020-10-12 17:50:46'),
(2, 'test@email.com', 3, 3, 25, '2020-10-12 17:54:48'),
(3, 'test@email.com', 3, 3, 40, '2020-10-12 17:54:57'),
(4, 'test@email.com', 2, 1, 10, '2020-10-12 17:57:03'),
(5, 'test@email.com', 3, 1, 10, '2020-10-12 17:57:39'),
(6, 'test@email.com', 3, 2, 39, '2020-10-12 17:57:47'),
(7, 'test@email.com', 3, 4, 31, '2020-10-12 17:57:54'),
(8, 'test@email.com', 3, 5, 90, '2020-10-12 17:58:01'),
(9, 'test@email.com', 4, 1, 5, '2020-10-12 17:58:07'),
(10, 'test@email.com', 4, 2, 20, '2020-10-12 17:58:13'),
(11, 'test@email.com', 4, 3, 45, '2020-10-12 17:58:19'),
(12, 'test@email.com', 4, 4, 24, '2020-10-12 17:58:26'),
(13, 'test@email.com', 5, 1, 60, '2020-10-12 17:58:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`email`, `password`, `nama_user`, `token`) VALUES
('test@email.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Test Akun', '2f2bb40a1b754ccc5532df5a8ddcc832');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game_tbl`
--
ALTER TABLE `game_tbl`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `score_tbl`
--
ALTER TABLE `score_tbl`
  ADD PRIMARY KEY (`score_id`),
  ADD KEY `GAME FK` (`game_id`),
  ADD KEY `USER FK` (`email`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `score_tbl`
--
ALTER TABLE `score_tbl`
  MODIFY `score_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `score_tbl`
--
ALTER TABLE `score_tbl`
  ADD CONSTRAINT `GAME FK` FOREIGN KEY (`game_id`) REFERENCES `game_tbl` (`game_id`),
  ADD CONSTRAINT `USER FK` FOREIGN KEY (`email`) REFERENCES `user_tbl` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
