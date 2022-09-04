-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2022 at 06:56 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipnoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `id` int(11) NOT NULL,
  `usia_ibu` float(2,1) NOT NULL,
  `berat_balita` float(2,1) NOT NULL,
  `jarak_kehamilan` float(2,1) NOT NULL,
  `bayi_id` int(11) NOT NULL,
  `tinggi_balita` float NOT NULL,
  `z_score` float(8,4) NOT NULL,
  `kesimpulan` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profile_bayi`
--

CREATE TABLE `profile_bayi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL COMMENT '"L" Laki-laki, "P" Perempuan',
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `ayah` varchar(100) NOT NULL,
  `ibu` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_bayi`
--

INSERT INTO `profile_bayi` (`id`, `user_id`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `ayah`, `ibu`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 1, 'L', 'tangerang', '0000-00-00', 'gh', 'hg', 'dasdas', '2022-09-02 13:41:17', '2022-09-02 13:41:17');

-- --------------------------------------------------------

--
-- Table structure for table `standar_deviasi`
--

CREATE TABLE `standar_deviasi` (
  `id` int(11) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL COMMENT 'L laki-laki, P perempuan',
  `usia` int(2) NOT NULL COMMENT 'bulan',
  `minus_3_sd` float(3,1) NOT NULL,
  `minus_2_sd` float(3,1) NOT NULL,
  `minus_1_sd` float(3,1) NOT NULL,
  `median` float(3,1) NOT NULL,
  `1_sd` float(3,1) NOT NULL,
  `2_sd` float(3,1) NOT NULL,
  `3_sd` float(3,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `standar_deviasi`
--

INSERT INTO `standar_deviasi` (`id`, `jenis_kelamin`, `usia`, `minus_3_sd`, `minus_2_sd`, `minus_1_sd`, `median`, `1_sd`, `2_sd`, `3_sd`) VALUES
(1, 'P', 0, 43.6, 45.4, 47.3, 49.1, 51.0, 52.9, 54.7),
(2, 'L', 0, 44.2, 46.1, 48.0, 49.9, 51.8, 53.7, 55.6),
(3, 'P', 1, 47.8, 49.8, 51.7, 53.7, 55.6, 57.6, 59.5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `kode_otp` varchar(6) DEFAULT NULL,
  `verified` int(1) NOT NULL DEFAULT 0 COMMENT '1 = Aktif, 0 = regist, 2 = tidak aktif',
  `is_admin` int(1) NOT NULL DEFAULT 1 COMMENT '1 = admin, 0 = member',
  `jabatan` varchar(50) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `nama`, `no_hp`, `password`, `kode_otp`, `verified`, `is_admin`, `jabatan`, `created_at`, `updated_at`) VALUES
(4, 'admin@mail.com', 'admin', '085743265412', '$2y$10$pjxMHU3VmCX7FEp6bdKsIeD5P0SOy4jg9FQDjtX.HDx7ctw1jvusu', NULL, 1, 1, 'Ahli Gizi', '2022-09-04', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_bayi`
--
ALTER TABLE `profile_bayi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standar_deviasi`
--
ALTER TABLE `standar_deviasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile_bayi`
--
ALTER TABLE `profile_bayi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `standar_deviasi`
--
ALTER TABLE `standar_deviasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
