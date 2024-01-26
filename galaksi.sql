-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2024 at 08:47 PM
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
-- Database: `galaksi`
--

-- --------------------------------------------------------

--
-- Table structure for table `calon_peserta`
--

CREATE TABLE `calon_peserta` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tpq_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `lomba` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `domisili` varchar(255) NOT NULL,
  `pas_poto` varchar(255) NOT NULL,
  `akte` varchar(255) NOT NULL,
  `kk` varchar(255) NOT NULL,
  `is_peserta` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calon_peserta`
--

INSERT INTO `calon_peserta` (`id`, `user_id`, `tpq_id`, `nama`, `tgl_lahir`, `lomba`, `kategori`, `domisili`, `pas_poto`, `akte`, `kk`, `is_peserta`) VALUES
(30, 3, 2, 'Budi', '2024-01-05', 'Tartil Quran (Putra)', 'Remaja', 'Kab. Raja Ampat', 'uploads/420976190jeruk.jpg', 'uploads/6998841720semangka.jpg', 'uploads/6353869396apel.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tpq`
--

CREATE TABLE `tpq` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tpq`
--

INSERT INTO `tpq` (`id`, `nama`) VALUES
(2, 'Nama TPQ 1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `tpq_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `profil` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `domisili` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `tpq_id`, `username`, `password`, `nama`, `profil`, `email`, `phone`, `jenis_kelamin`, `instansi`, `domisili`, `role`) VALUES
(3, 2, 'user', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'User', 'uploads/profil/9971217152semangka.jpg', 'email@gmail.com', '0831', 'Pria', 'instansi', 'domisili', 'user'),
(4, 2, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin', '', 'admin@gmail.com', '083176543', 'Pria', 'instansi', 'Kab. Manokwari', 'admin'),
(5, 2, 'test', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, '', 'test@gmail.com', '0831', 'Pria', NULL, 'Kota Sorong', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calon_peserta`
--
ALTER TABLE `calon_peserta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tpq_id_calon_peserta_foreign` (`tpq_id`),
  ADD KEY `user_id_calon_peserta_foreign` (`user_id`);

--
-- Indexes for table `tpq`
--
ALTER TABLE `tpq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tpq_id_user_foreign` (`tpq_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calon_peserta`
--
ALTER TABLE `calon_peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tpq`
--
ALTER TABLE `tpq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calon_peserta`
--
ALTER TABLE `calon_peserta`
  ADD CONSTRAINT `tpq_id_calon_peserta_foreign` FOREIGN KEY (`tpq_id`) REFERENCES `tpq` (`id`),
  ADD CONSTRAINT `user_id_calon_peserta_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `tpq_id_user_foreign` FOREIGN KEY (`tpq_id`) REFERENCES `tpq` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
