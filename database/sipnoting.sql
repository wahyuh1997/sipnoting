-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Sep 2022 pada 17.09
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `diagnosis`
--

CREATE TABLE `diagnosis` (
  `id` int(11) NOT NULL,
  `usia_ibu` float(3,1) NOT NULL,
  `berat_balita` float(6,1) NOT NULL,
  `jarak_kehamilan` float(3,1) NOT NULL,
  `bayi_id` int(11) NOT NULL,
  `tinggi_balita` float NOT NULL,
  `z_score` float(8,4) NOT NULL,
  `kesimpulan` text NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diagnosis`
--

INSERT INTO `diagnosis` (`id`, `usia_ibu`, `berat_balita`, `jarak_kehamilan`, `bayi_id`, `tinggi_balita`, `z_score`, `kesimpulan`, `keterangan`, `created_by`, `created_at`) VALUES
(1, 9.9, 5.0, 2.0, 4, 30, -17.0952, 'HK01', NULL, 0, '2022-09-06 15:48:50'),
(2, 9.9, 5.0, 2.0, 4, 30, -17.0952, 'HK01', NULL, 7, '2022-09-06 15:50:04'),
(3, 9.9, 5000.0, 2.0, 4, 30, -17.0952, 'HK01', NULL, 7, '2022-09-07 15:11:27'),
(4, 20.0, 5000.0, 2.0, 4, 30, -17.0952, 'HK01', NULL, 7, '2022-09-07 15:13:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile_bayi`
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
-- Dumping data untuk tabel `profile_bayi`
--

INSERT INTO `profile_bayi` (`id`, `user_id`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `ayah`, `ibu`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 1, '', 'L', 'tangerang', '0000-00-00', 'gh', 'hg', 'dasdas', '2022-09-02 13:41:17', '2022-09-02 13:41:17'),
(2, 6, '', NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-04 09:10:53', NULL),
(3, 7, '', 'L', 'Tangerang', '2022-07-02', 'mian', 'maun', 'lolo', '2022-09-04 09:12:21', '2022-09-04 10:29:19'),
(4, 7, 'Sumintul', 'L', NULL, '2022-04-06', 'ganti', 'santi', 'kepo', '2022-09-06 13:32:37', '2022-09-06 14:52:04'),
(5, 7, 'arel', 'L', 'Tangerang', '2022-03-01', 'Samian', 'Masri', 'gatau', '2022-09-06 13:56:52', NULL),
(6, 7, 'arel', 'L', 'Tangerang', '2022-03-01', 'Samian', 'Masri', 'gatau', '2022-09-06 13:56:57', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `standar_deviasi`
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
-- Dumping data untuk tabel `standar_deviasi`
--

INSERT INTO `standar_deviasi` (`id`, `jenis_kelamin`, `usia`, `minus_3_sd`, `minus_2_sd`, `minus_1_sd`, `median`, `1_sd`, `2_sd`, `3_sd`) VALUES
(1, 'P', 0, 43.6, 45.4, 47.3, 49.1, 51.0, 52.9, 54.7),
(2, 'L', 0, 44.2, 46.1, 48.0, 49.9, 51.8, 53.7, 55.6),
(3, 'L', 5, 100.6, 61.7, 63.8, 65.9, 68.0, 70.1, 72.2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `nama`, `no_hp`, `password`, `kode_otp`, `verified`, `is_admin`, `jabatan`, `created_at`, `updated_at`) VALUES
(4, 'admin@mail.com', 'admin', '085743265412', '$2y$10$pjxMHU3VmCX7FEp6bdKsIeD5P0SOy4jg9FQDjtX.HDx7ctw1jvusu', NULL, 1, 1, 'Ahli Gizi', '2022-09-04', NULL),
(5, 'andi@gmail.com', 'andi rifaldi', '089602584857', '$2y$10$QxkH9Ar9pB.dzy3tS3DQT.lQW3GlS0GfuWmxiQU6MsUaxh/nB6YUS', NULL, 1, 1, 'direktur', '2022-09-04', NULL),
(6, 'andi1@gmail.com', '', '08976565', '$2y$10$GmPYG.wW0PUhGSI478clAe5XC2b4cJqGKUO/F1SCaN.rEXUVlkA1K', '751056', 1, 0, NULL, '2022-09-04', NULL),
(7, 'andi2@gmail.com', 'naim', '00000', '$2y$10$jLKzESE7ih5OsMy8rTJqGeHnt7bwMHlEqvAdwAugyH.Jw7/P3XU86', '853002', 1, 0, NULL, '2022-09-04', NULL),
(8, 'andirifaldi31@gmail.com', '', '08976565', '$2y$10$NFT8Hdg/8ckbW5c1lYBAoO/aXhwzKCOYlpOIpLAInoga/jSWhzxaW', '869023', 0, 0, NULL, '2022-09-04', NULL),
(9, 'andirifaldi10@gmail.com', '', '08976565', '$2y$10$pCzdlcundFMr9gIpx.34K.AfDFjZnDCmj7YFcdpVmdkQllIXdGRqG', '030798', 0, 0, NULL, '2022-09-04', NULL),
(10, 'test@gmail.com', '', '08976565', '$2y$10$Ks1GbO9jy82H5Y1ltP6u3u46700Lb.OYi1VH8Fe6AEZ1zCVEAUvHe', '352294', 0, 0, NULL, '2022-09-04', NULL),
(11, 'test1@gmail.com', '', '08976565', '$2y$10$DVTcfqbM8sbvjSomzrGzo.VS/N6RaXMoflPpmxAhMU2o4j.cx6Ice', '735265', 0, 0, NULL, '2022-09-04', NULL),
(12, 'test2@gmail.com', '', '08976565', '$2y$10$skQOrQhoAi/.by./m/iKee58kgnZsivPf7N8tO/1FCsKDrVdEkK1u', '226574', 0, 0, NULL, '2022-09-04', NULL),
(13, 'test3@gmail.com', '', '08976565', '$2y$10$EaLlKj3f7vI32Wjl3oXaR.5I/y73p6RNcuT3QqGUGws1dwGJfOvaW', '772817', 0, 0, NULL, '2022-09-04', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profile_bayi`
--
ALTER TABLE `profile_bayi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `standar_deviasi`
--
ALTER TABLE `standar_deviasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `profile_bayi`
--
ALTER TABLE `profile_bayi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `standar_deviasi`
--
ALTER TABLE `standar_deviasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
