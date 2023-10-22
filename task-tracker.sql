-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2023 at 09:01 AM
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
  `tanggal` date NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `progress` enum('Not yet started','In Progress','Finish') NOT NULL,
  `done` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, 'Rizki', 'Fadhil', 'rizkifadhil95', 'rizkifadhil95@gmail.com', '$2y$10$GrXlxNKDP/F8yOWxC4YUCucBEUpUiMMSULyGRXzubTJy8MXnXrHRm', 'm', '2023-10-21'),
(3, 'izam', 'aja', 'izamaja', 'izamrizkyali@gmail.com', '$2y$10$Hw4RtbrnwQ6Um2cjrrF23uIvffghxVwpLQr9QmA5Zz0uFqEPxhuCa', 'm', '2023-10-06'),
(4, 'fikri', 'naufal', 'fikriaja', 'fikri12@gmail.com', '$2y$10$rznOlO/9vHu1iOL.8TuSh.yGQtQ83dSWzyVl7NSUNK0Wn0ySARDsq', 'op', '2023-10-01'),
(5, 'izam', 'anjay', 'izamm', 'izamrizky12@gmail.com', '$2y$10$vp8BP2lbKTNw.egxBR/cT.k/1P4oXD/gRjAecpn6PYjyPjrbC7dum', 'op', '2023-10-02'),
(6, 'abi', 'andrea', 'abiandrea', 'abiaja12@gmail.com', '$2y$10$Gl3mop7aVZGKqPneoTxgsOLg8NaTPkhoGV0Gnci7kkRhDNbHPKM1K', 'op', '2023-10-02'),
(7, 'abi', 'fikri', 'abiaja', 'abi12@gmail.com', '$2y$10$kuJI.rJcFIR24FJS9tWb1uRP.9rQhUpmJLFhHOPxvGW0fvu6IVIUq', 'op', '2023-10-02'),
(8, 'izam', 'naufal', 'izammm', 'izam12@gmail.com', '$2y$10$gE3JiAlJ7tUl2w7mGSF0VOt3wBu7RgNelifpCIyHcNUVO5OHcGER6', 'op', '2023-10-03'),
(9, 'abi', 'naufal', 'budi', 'izamrizky123@gmail.com', '$2y$10$UtHxrM2YRh4czVLlnKz7M.7NuPN5.haKHsfVUn8J7FAugFduEWLv6', 'op', '2023-10-09');

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
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `listtask`
--
ALTER TABLE `listtask`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `master_user`
--
ALTER TABLE `master_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
