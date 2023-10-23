-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2023 at 04:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `done` tinyint(1) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `listtask`
--

INSERT INTO `listtask` (`id`, `taskTitle`, `tanggal`, `deskripsi`, `progress`, `done`, `user_id`) VALUES
(49, 'progress testing', '2023-10-22', 'testing testing', 'In Progress', NULL, 12),
(50, 'halo', '2023-10-22', 'HAI HALO', 'Not yet started', NULL, 13);

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
  `gender` varchar(20) NOT NULL,
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
(9, 'abi', 'naufal', 'budi', 'izamrizky123@gmail.com', '$2y$10$UtHxrM2YRh4czVLlnKz7M.7NuPN5.haKHsfVUn8J7FAugFduEWLv6', 'op', '2023-10-09'),
(10, 'King', 'Abi', 'kingabi', 'kingabi@gmail.com', '$2y$10$gTRfmsg/qw1V5SphRW87veeZKmmhTpt9F3WHO7tNcIJ5qt82kvEvq', 'op', '2022-06-07'),
(11, 'Fikri', 'Andrasito', 'sabotenjakku', 'lolol@gmail.com', '$2y$10$Zd9qj4rOWgv2fJvajrC6muXMRKNi7oVwFqAfetAEzZ.il/Jai2z/q', 'op', '2023-10-11'),
(12, 'King', 'rabbit', 'king', 'king@gmail.com', '$2y$10$ewYxWhg7ToJvQNPpiZHvN.AxpNuWi9TBMyhu/MU4PP465F2AUVL9e', 'op', '2023-10-10'),
(13, 'lego', 'ninjago', 'ninjago', 'lego@gmail.com', '$2y$10$6M45RBmsetnop..wEVG2.OE1UkEAXP6f.p8mkQL87yoRdQy67153K', 'op', '2023-10-22'),
(14, 'King', 'Fikri', 'kingfikri', 'kingfikri@gmail.com', '$2y$10$b.ggz/I9LQcpsY8pfOHOfe5fDGA0FuyezVOa98A94ew2CHSWjYOju', 'op', '2023-10-11');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `master_user`
--
ALTER TABLE `master_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
