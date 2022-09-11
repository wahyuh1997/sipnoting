-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2022 at 06:31 PM
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
  `usia_ibu` float(3,1) NOT NULL,
  `berat_balita` float(5,1) NOT NULL,
  `jarak_kehamilan` float(2,1) NOT NULL,
  `bayi_id` int(11) NOT NULL,
  `tinggi_balita` float NOT NULL,
  `z_score` float(8,4) NOT NULL,
  `kesimpulan` text NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`id`, `usia_ibu`, `berat_balita`, `jarak_kehamilan`, `bayi_id`, `tinggi_balita`, `z_score`, `kesimpulan`, `keterangan`, `created_by`, `created_at`) VALUES
(22, 26.0, 3000.0, 0.0, 7, 80, 1.2917, 'HK02', '[\"Jaga asupan nutrisi anak dengan memberikan makanan gizi seimbang\",\"Latihan peregangan\",\"Pantau tumbuh kembang anak\"]', 4, '2022-09-09 02:16:50'),
(25, 29.0, 4000.0, 0.0, 10, 58, -2.8095, 'HK01', '[\"Penuhi nutrisi bunda dimasa menyusui\",\"Berikan MPASI yang padat nutrisi (terutama protein, kalsium, Vitamin D)\",\"Konsultasikan ke Dokter anak untuk penanganan lebih lanjut\"]', 4, '2022-09-09 14:57:40'),
(26, 22.0, 8000.0, 2.0, 8, 98, -1.6889, 'HK01', '[\"Penuhi nutrisi bunda dimasa menyusui\",\"Berikan MPASI yang padat nutrisi (terutama protein, kalsium, Vitamin D)\",\"Konsultasikan ke Dokter anak untuk penanganan lebih lanjut\"]', 4, '2022-09-09 14:58:04'),
(27, 24.0, 3000.0, 0.0, 7, 68, -3.7083, 'HK01', '[\"Penuhi nutrisi bunda dimasa menyusui\",\"Berikan MPASI yang padat nutrisi (terutama protein, kalsium, Vitamin D)\",\"Konsultasikan ke Dokter anak untuk penanganan lebih lanjut\"]', 4, '2022-09-09 15:01:32');

-- --------------------------------------------------------

--
-- Table structure for table `profile_bayi`
--

CREATE TABLE `profile_bayi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL COMMENT '"L" Laki-laki, "P" Perempuan',
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `ayah` varchar(100) DEFAULT NULL,
  `ibu` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_bayi`
--

INSERT INTO `profile_bayi` (`id`, `user_id`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `ayah`, `ibu`, `alamat`, `created_at`, `updated_at`) VALUES
(7, 14, 'Bryan', 'L', 'Lokataro', '2021-07-28', 'Sudrajat', 'Suminah', 'Kronjo', '2022-09-06 15:13:16', NULL),
(8, 14, 'Nicky', 'P', 'Trenggalek', '2018-04-21', 'Sudrajat', 'Suminah', 'Kronjo', '2022-09-06 15:21:30', NULL),
(10, 15, 'Roy Kyoshi', 'L', 'Banyumas', '2022-05-04', 'Notosa', 'Nurjanni', 'Banyumas', '2022-09-09 07:43:22', '2022-09-09 11:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `standar_deviasi`
--

CREATE TABLE `standar_deviasi` (
  `id` int(11) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL COMMENT 'L laki-laki, P perempuan',
  `usia` int(2) NOT NULL COMMENT 'bulan',
  `minus_3_sd` float(4,1) NOT NULL,
  `minus_2_sd` float(4,1) NOT NULL,
  `minus_1_sd` float(4,1) NOT NULL,
  `median` float(4,1) NOT NULL,
  `1_sd` float(4,1) NOT NULL,
  `2_sd` float(4,1) NOT NULL,
  `3_sd` float(4,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `standar_deviasi`
--

INSERT INTO `standar_deviasi` (`id`, `jenis_kelamin`, `usia`, `minus_3_sd`, `minus_2_sd`, `minus_1_sd`, `median`, `1_sd`, `2_sd`, `3_sd`) VALUES
(1, 'P', 0, 43.6, 45.4, 47.3, 49.1, 51.0, 52.9, 54.7),
(2, 'L', 0, 44.2, 46.1, 48.0, 49.9, 51.8, 53.7, 55.6),
(3, 'L', 5, 59.6, 61.7, 63.8, 65.9, 68.0, 70.1, 72.2),
(4, 'L', 13, 69.6, 72.1, 74.5, 76.9, 79.3, 81.8, 84.2),
(5, 'P', 52, 91.7, 91.6, 101.1, 105.6, 101.1, 114.6, 119.1),
(6, 'L', 4, 57.6, 59.7, 61.8, 63.9, 66.0, 68.0, 70.1);

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
(4, 'admin@mail.com', 'admin', '089943789845', '$2y$10$8GKOlKFya3eLWcJ9XpXet.c0ajpOeZ7uozPQfu3/JJubkJexAo7TW', NULL, 1, 1, 'Pakar Gizi', '2022-09-04', NULL),
(14, 'sogar70275@esmoud.com', 'Sogar', '089658745258', '$2y$10$2N5k6F7fzBUDzl/hA4YKVeOWtekd64N32VxbkPCIMueyhTA33HdAe', '698937', 1, 0, NULL, '2022-09-06', NULL),
(15, 'notosa6817@laluxy.com', 'Notosari', '089976543671', '$2y$10$IFxgmllXuRhkvd/1uV6IA.WKSWpnTreK.gaNzyFltCmGUmqKpW5.2', '055517', 1, 0, NULL, '2022-09-09', NULL),
(16, 'alex@mail.com', 'alex98', '087656789876', '$2y$10$uYIE./IzGcuhKjuSixxpv.YPWc9YWk7CXywYYpi5UlQaHKcxb8dkm', NULL, 1, 0, NULL, '2022-09-09', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `profile_bayi`
--
ALTER TABLE `profile_bayi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `standar_deviasi`
--
ALTER TABLE `standar_deviasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
