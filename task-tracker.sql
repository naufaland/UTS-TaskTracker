-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2023 at 09:53 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task-tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `listtask`
--

CREATE TABLE `listtask` (
  `id` int(11) NOT NULL,
  `taskTitle` varchar(50) NOT NULL,
  `time_date` datetime NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `progress` enum('Not yet started','In Progress','Finish') NOT NULL,
  `done` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `listtask`
--

INSERT INTO `listtask` (`id`, `taskTitle`, `time_date`, `deskripsi`, `progress`, `done`) VALUES
(13, 'aefgdfgdfgd', '0000-00-00 00:00:00', 'Ini latian juga bang', 'Not yet started', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_user`
--

CREATE TABLE `master_user` (
  `id` int(11) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_user`
--

INSERT INTO `master_user` (`id`, `nama_depan`, `nama_belakang`, `username`, `email`, `password`, `gender`, `tanggal_lahir`) VALUES
(2, 'Rizki', 'Fadhil', 'rizkifadhil95', 'rizkifadhil95@gmail.com', '$2y$10$GrXlxNKDP/F8yOWxC4YUCucBEUpUiMMSULyGRXzubTJy8MXnXrHRm', 'm', '2023-10-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `listtask`
--
ALTER TABLE `listtask`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `listtask`
--
ALTER TABLE `listtask`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `master_user`
--
ALTER TABLE `master_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
