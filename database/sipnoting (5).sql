-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2022 at 05:19 PM
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
  `berat_balita` float(7,1) NOT NULL,
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
(27, 24.0, 3000.0, 0.0, 7, 68, -3.7083, 'HK01', '[\"Penuhi nutrisi bunda dimasa menyusui\",\"Berikan MPASI yang padat nutrisi (terutama protein, kalsium, Vitamin D)\",\"Konsultasikan ke Dokter anak untuk penanganan lebih lanjut\"]', 4, '2022-09-09 15:01:32'),
(28, 23.0, 8000.0, 3.0, 12, 72, -1.6087, 'HK01', '[\"Penuhi nutrisi bunda dimasa menyusui\",\"Berikan MPASI yang padat nutrisi (terutama protein, kalsium, Vitamin D)\",\"Konsultasikan ke Dokter anak untuk penanganan lebih lanjut\"]', 18, '2022-09-10 13:55:34'),
(29, 25.0, 9999.9, 2.0, 13, 73, 0.6250, 'HK02', '[\"Jaga asupan nutrisi anak dengan memberikan makanan gizi seimbang\",\"Latihan peregangan\",\"Pantau tumbuh kembang anak\"]', 18, '2022-09-10 14:03:44'),
(30, 21.0, 9999.9, 0.0, 14, 71, -1.5217, 'HK01', '[\"Penuhi nutrisi bunda dimasa menyusui\",\"Berikan MPASI yang padat nutrisi (terutama protein, kalsium, Vitamin D)\",\"Konsultasikan ke Dokter anak untuk penanganan lebih lanjut\"]', 20, '2022-09-11 07:19:38'),
(31, 22.0, 4000.0, 1.0, 15, 70, 3.5909, 'HK02', '[\"Jaga asupan nutrisi anak dengan memberikan makanan gizi seimbang\",\"Latihan peregangan\",\"Pantau tumbuh kembang anak\"]', 20, '2022-09-11 07:29:28'),
(34, 22.0, 3000.0, 1.0, 19, 60, 0.0952, 'HK02', '[\"Jaga asupan nutrisi anak dengan memberikan makanan gizi seimbang\",\"Latihan peregangan\",\"Pantau tumbuh kembang anak\"]', 22, '2022-09-11 15:07:23'),
(35, 19.0, 9999.9, 0.0, 18, 110, 0.0000, 'HK02', '[\"Jaga asupan nutrisi anak dengan memberikan makanan gizi seimbang\",\"Latihan peregangan\",\"Pantau tumbuh kembang anak\"]', 21, '2022-09-12 13:57:09'),
(36, 22.0, 9999.9, 1.0, 18, 110, 0.0000, 'HK02', '[\"Jaga asupan nutrisi anak dengan memberikan makanan gizi seimbang\",\"Latihan peregangan\",\"Pantau tumbuh kembang anak\"]', 21, '2022-09-12 14:00:25'),
(37, 21.0, 9999.9, 2.0, 18, 90, -4.2553, 'HK01', '[\"Penuhi nutrisi bunda dimasa menyusui\",\"Berikan MPASI yang padat nutrisi (terutama protein, kalsium, Vitamin D)\",\"Konsultasikan ke Dokter anak untuk penanganan lebih lanjut\"]', 21, '2022-09-12 14:00:59'),
(38, 21.0, 9999.9, 1.0, 18, 90, -4.2553, 'HK01', '[\"Penuhi nutrisi bunda dimasa menyusui\",\"Berikan MPASI yang padat nutrisi (terutama protein, kalsium, Vitamin D)\",\"Konsultasikan ke Dokter anak untuk penanganan lebih lanjut\"]', 21, '2022-09-12 14:07:08'),
(39, 19.0, 9999.9, 1.0, 18, 80, -6.3830, 'HK01', '[\"Penuhi nutrisi bunda dimasa menyusui\",\"Berikan MPASI yang padat nutrisi (terutama protein, kalsium, Vitamin D)\",\"Konsultasikan ke Dokter anak untuk penanganan lebih lanjut\"]', 21, '2022-09-12 14:07:49'),
(40, 19.0, 9999.9, 2.0, 18, 100, -2.1277, 'HK01', '[\"Penuhi nutrisi bunda dimasa menyusui\",\"Berikan MPASI yang padat nutrisi (terutama protein, kalsium, Vitamin D)\",\"Konsultasikan ke Dokter anak untuk penanganan lebih lanjut\"]', 21, '2022-09-12 14:08:26'),
(41, 28.0, 9999.9, 3.0, 18, 110, 0.0000, 'HK02', '[\"Jaga asupan nutrisi anak dengan memberikan makanan gizi seimbang\",\"Latihan peregangan\",\"Pantau tumbuh kembang anak\"]', 21, '2022-09-12 14:09:18'),
(42, 18.0, 9999.9, 0.0, 18, 120, 2.1739, 'HK02', '[\"Jaga asupan nutrisi anak dengan memberikan makanan gizi seimbang\",\"Latihan peregangan\",\"Pantau tumbuh kembang anak\"]', 21, '2022-09-12 14:09:56'),
(43, 17.0, 9999.9, 3.0, 18, 130, 4.3478, 'HK02', '[\"Jaga asupan nutrisi anak dengan memberikan makanan gizi seimbang\",\"Latihan peregangan\",\"Pantau tumbuh kembang anak\"]', 21, '2022-09-12 14:13:34'),
(44, 20.0, 4000.0, 0.0, 8, 70, -7.9111, 'HK01', '[\"Penuhi nutrisi bunda dimasa menyusui\",\"Berikan MPASI yang padat nutrisi (terutama protein, kalsium, Vitamin D)\",\"Konsultasikan ke Dokter anak untuk penanganan lebih lanjut\"]', 14, '2022-09-12 14:42:04'),
(46, 29.0, 20000.0, 0.0, 8, 100, -1.2444, 'HK02', '[\"Jaga asupan nutrisi anak dengan memberikan makanan gizi seimbang\",\"Latihan peregangan\",\"Pantau tumbuh kembang anak\"]', 14, '2022-09-12 15:05:20'),
(47, 30.0, 7000.0, 9.0, 8, 110, -0.9778, 'HK02', '[\"Jaga asupan nutrisi anak dengan memberikan makanan gizi seimbang\",\"Latihan peregangan\",\"Pantau tumbuh kembang anak\"]', 14, '2022-09-12 15:10:01'),
(48, 30.0, 7000.0, 9.0, 8, 110, -0.9778, 'HK02', '[\"Jaga asupan nutrisi anak dengan memberikan makanan gizi seimbang\",\"Latihan peregangan\",\"Pantau tumbuh kembang anak\"]', 14, '2022-09-12 15:12:59'),
(49, 22.0, 18000.0, 4.0, 8, 100, -1.2444, 'HK02', '[\"Jaga asupan nutrisi anak dengan memberikan makanan gizi seimbang\",\"Latihan peregangan\",\"Pantau tumbuh kembang anak\"]', 14, '2022-09-12 15:16:42');

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
(8, 14, 'Nicky', 'P', 'Trenggalek', '2018-04-21', 'Sudrajat', 'Suminah', 'Kronjo', '2022-09-06 15:21:30', NULL),
(10, 15, 'Roy Kyoshi', 'L', 'Banyumas', '2022-05-04', 'Notosa', 'Nurjanni', 'Banyumas', '2022-09-09 07:43:22', '2022-09-09 11:48:28'),
(12, 18, 'Nailu', 'L', 'Tangerang', '2021-09-10', 'Jongin', 'Yoona', 'jl.in aja dulu alias let it flow', '2022-09-10 10:54:30', NULL),
(13, 18, 'ainun', 'P', 'wonosari', '2021-10-20', 'Dio', 'Dhera', 'kabupaten', '2022-09-10 14:00:07', NULL),
(18, 21, 'andrez', 'L', 'tangerang', '2017-09-12', 'budi', 'caca', 'sewan', '2022-09-11 13:52:33', '2022-09-12 14:53:52'),
(19, 22, 'ina', 'P', 'tangerang', '2022-06-06', 'rojak', 'tiah', 'bojong', '2022-09-11 14:57:04', NULL);

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
(6, 'L', 4, 57.6, 59.7, 61.8, 63.9, 66.0, 68.0, 70.1),
(7, 'L', 1, 48.9, 50.8, 52.8, 54.7, 56.7, 58.6, 60.6),
(8, 'L', 2, 52.4, 54.4, 56.4, 58.4, 60.4, 62.4, 64.4),
(9, 'L', 3, 55.3, 57.3, 59.4, 61.4, 63.5, 65.5, 67.6),
(10, 'L', 6, 61.2, 63.3, 65.5, 67.6, 69.8, 71.9, 74.0),
(11, 'L', 7, 62.7, 64.8, 67.0, 69.2, 71.3, 73.5, 75.7),
(12, 'L', 8, 64.0, 66.2, 68.4, 70.6, 72.8, 75.0, 77.2),
(13, 'L', 9, 65.2, 67.5, 69.7, 72.0, 74.2, 76.5, 78.7),
(14, 'L', 10, 66.4, 68.7, 71.0, 73.3, 75.6, 77.9, 80.1),
(15, 'L', 11, 67.6, 69.9, 72.2, 74.5, 76.9, 79.2, 81.5),
(16, 'L', 12, 68.6, 71.0, 73.4, 75.7, 78.1, 80.5, 82.9),
(17, 'L', 14, 70.6, 73.1, 75.6, 78.0, 80.5, 83.5, 85.5),
(18, 'L', 15, 71.6, 74.1, 76.6, 79.1, 81.7, 84.2, 86.7),
(19, 'L', 16, 72.5, 75.0, 77.6, 80.2, 82.8, 85.4, 88.0),
(20, 'L', 17, 73.3, 76.0, 78.6, 81.2, 83.9, 86.5, 89.2),
(21, 'L', 18, 74.2, 76.9, 79.6, 82.3, 85.0, 87.7, 90.4),
(22, 'L', 19, 75.0, 77.7, 80.5, 83.2, 86.0, 88.8, 91.5),
(23, 'L', 20, 75.8, 78.6, 81.4, 84.2, 87.0, 89.8, 92.6),
(24, 'L', 21, 76.5, 79.4, 82.3, 85.1, 88.0, 90.9, 93.8),
(25, 'L', 22, 77.2, 80.2, 83.1, 86.0, 89.0, 91.9, 94.9),
(26, 'L', 23, 78.0, 81.0, 83.9, 86.9, 89.9, 92.9, 95.9),
(27, 'L', 24, 78.7, 81.7, 84.8, 87.8, 90.9, 93.9, 97.0),
(28, 'L', 25, 78.6, 81.7, 84.9, 88.0, 91.1, 94.2, 97.3),
(29, 'L', 26, 79.3, 82.5, 85.6, 88.8, 92.0, 95.2, 98.3),
(30, 'L', 27, 79.9, 83.1, 86.4, 89.6, 92.9, 96.1, 99.3),
(31, 'L', 28, 80.5, 83.8, 87.1, 90.4, 93.7, 97.0, 100.3),
(32, 'L', 29, 81.1, 84.5, 87.8, 91.2, 94.5, 97.9, 101.2),
(33, 'L', 30, 81.7, 85.1, 88.5, 91.9, 95.3, 98.7, 102.1),
(34, 'L', 31, 82.3, 85.7, 89.2, 92.7, 96.1, 99.6, 103.0),
(35, 'L', 32, 82.8, 86.4, 89.9, 93.4, 96.9, 100.4, 103.9),
(36, 'L', 33, 83.4, 86.9, 90.5, 94.1, 97.6, 101.2, 104.8),
(37, 'L', 34, 83.9, 87.5, 91.1, 94.8, 98.4, 102.0, 105.6),
(38, 'L', 35, 84.4, 88.1, 91.8, 95.4, 99.1, 102.7, 106.4),
(39, 'L', 36, 85.0, 88.7, 92.4, 96.1, 99.8, 103.5, 107.2),
(40, 'L', 37, 85.5, 89.2, 93.0, 96.7, 100.5, 104.2, 108.0),
(41, 'L', 38, 86.0, 89.8, 93.6, 97.4, 101.2, 105.0, 108.8),
(42, 'L', 39, 86.5, 90.3, 94.2, 98.0, 101.8, 105.7, 109.5),
(43, 'L', 40, 87.0, 90.9, 94.7, 98.6, 102.5, 106.4, 110.3),
(44, 'L', 41, 87.5, 91.4, 95.3, 99.2, 103.2, 107.1, 111.0),
(45, 'L', 42, 88.0, 91.9, 95.9, 99.9, 103.8, 107.8, 111.7),
(46, 'L', 43, 88.4, 92.4, 96.4, 100.4, 104.5, 108.5, 112.5),
(47, 'L', 44, 88.9, 93.0, 97.0, 101.0, 105.1, 109.1, 113.2),
(48, 'L', 45, 89.4, 93.5, 97.5, 101.6, 105.7, 109.8, 113.9),
(49, 'L', 46, 89.8, 94.0, 98.1, 102.2, 106.3, 110.4, 114.6),
(50, 'L', 47, 90.3, 94.4, 98.6, 102.8, 106.9, 111.1, 115.2),
(51, 'L', 48, 90.7, 94.9, 99.1, 103.3, 107.5, 111.7, 115.9),
(52, 'L', 49, 91.2, 95.4, 99.7, 103.9, 108.1, 112.4, 116.6),
(53, 'L', 50, 91.6, 95.9, 100.2, 104.4, 108.7, 113.0, 117.3),
(54, 'L', 51, 92.1, 96.4, 100.7, 105.0, 109.3, 113.6, 117.9),
(55, 'L', 52, 92.5, 96.9, 101.2, 105.6, 109.9, 114.2, 118.6),
(56, 'L', 53, 93.0, 97.4, 101.7, 106.1, 110.5, 114.9, 119.2),
(57, 'L', 54, 93.4, 97.8, 102.3, 106.7, 111.1, 115.5, 119.9),
(58, 'L', 55, 93.9, 98.3, 102.8, 107.2, 111.7, 116.1, 120.6),
(59, 'L', 56, 94.3, 98.8, 103.3, 107.8, 112.3, 116.7, 121.2),
(60, 'L', 57, 94.7, 99.3, 103.8, 108.3, 112.8, 117.4, 121.9),
(61, 'L', 58, 95.2, 99.7, 104.3, 108.9, 113.4, 118.0, 122.6),
(62, 'L', 59, 95.6, 100.2, 104.8, 109.4, 114.0, 118.6, 123.2),
(63, 'L', 60, 96.1, 100.7, 105.3, 110.0, 114.6, 119.2, 123.9),
(64, 'P', 1, 47.8, 49.8, 51.7, 53.7, 55.6, 57.6, 59.5),
(65, 'P', 2, 51.0, 53.0, 55.0, 57.1, 59.1, 61.1, 63.2),
(66, 'P', 3, 53.5, 55.6, 57.7, 59.8, 61.9, 64.0, 66.1),
(67, 'P', 4, 55.6, 57.8, 59.9, 62.1, 64.3, 66.4, 68.6),
(68, 'P', 5, 57.4, 59.6, 61.8, 64.0, 66.2, 68.5, 70.7),
(69, 'P', 6, 58.9, 61.2, 63.5, 65.7, 68.0, 70.3, 72.5),
(70, 'P', 7, 60.3, 62.7, 65.0, 67.3, 69.6, 71.9, 74.2),
(71, 'P', 8, 61.7, 64.0, 66.4, 68.7, 71.1, 73.5, 75.8),
(72, 'P', 9, 62.9, 65.3, 67.7, 70.1, 72.6, 75.0, 77.4),
(73, 'P', 10, 64.1, 66.5, 69.0, 71.5, 73.9, 76.4, 78.9),
(74, 'P', 11, 65.2, 67.7, 70.3, 72.8, 75.3, 77.8, 80.3),
(75, 'P', 12, 66.3, 68.9, 71.4, 74.0, 76.6, 79.2, 81.7),
(76, 'P', 13, 67.3, 70.0, 72.6, 75.2, 77.8, 80.5, 83.1),
(77, 'P', 14, 68.3, 71.0, 73.7, 76.4, 79.1, 81.7, 84.4),
(78, 'P', 15, 69.3, 72.0, 74.8, 77.5, 80.2, 83.0, 85.7),
(79, 'P', 16, 70.2, 73.0, 75.8, 78.6, 81.4, 84.2, 87.0),
(80, 'P', 17, 71.1, 74.0, 76.8, 79.7, 82.5, 85.4, 88.2),
(81, 'P', 18, 72.0, 74.9, 77.8, 80.7, 83.6, 86.5, 89.4),
(82, 'P', 19, 72.8, 75.8, 78.8, 81.7, 84.7, 87.6, 90.6),
(83, 'P', 20, 73.7, 76.7, 79.7, 82.7, 85.7, 88.7, 91.7),
(84, 'P', 21, 74.5, 77.5, 80.6, 83.7, 86.7, 89.8, 92.9),
(85, 'P', 22, 75.2, 78.4, 81.5, 84.6, 87.7, 90.8, 94.0),
(86, 'P', 23, 76.0, 79.2, 82.3, 85.5, 88.7, 91.9, 95.0),
(87, 'P', 24, 76.7, 80.0, 83.2, 86.4, 89.6, 92.9, 96.1),
(88, 'P', 25, 76.8, 80.0, 83.3, 86.6, 89.9, 93.1, 96.4),
(89, 'P', 26, 77.5, 80.8, 84.1, 87.4, 90.8, 94.1, 97.4),
(90, 'P', 27, 78.1, 81.5, 84.9, 88.3, 91.7, 95.0, 98.4),
(91, 'P', 28, 78.8, 82.2, 85.7, 89.1, 92.5, 96.0, 99.4),
(92, 'P', 29, 79.5, 82.9, 86.4, 89.9, 93.4, 96.9, 100.3),
(93, 'P', 30, 80.1, 83.6, 87.1, 90.7, 94.2, 97.7, 101.3),
(94, 'P', 31, 80.7, 84.3, 87.9, 91.4, 95.0, 98.6, 102.2),
(95, 'P', 32, 81.3, 84.9, 88.6, 92.2, 95.8, 99.4, 103.1),
(96, 'P', 33, 81.9, 85.6, 89.3, 92.9, 96.6, 100.3, 103.9),
(97, 'P', 34, 82.5, 86.2, 89.9, 93.6, 97.4, 101.1, 104.8),
(98, 'P', 35, 83.1, 86.8, 90.6, 94.4, 98.1, 101.9, 105.6),
(99, 'P', 36, 83.6, 87.4, 91.2, 95.1, 98.9, 102.7, 106.5),
(100, 'P', 37, 84.2, 88.0, 91.9, 95.7, 99.6, 103.4, 107.3),
(101, 'P', 38, 84.7, 88.6, 92.5, 96.4, 100.3, 104.2, 108.1),
(102, 'P', 39, 85.3, 89.2, 93.1, 97.1, 101.0, 105.0, 108.9),
(103, 'P', 40, 85.8, 89.8, 93.8, 97.7, 101.7, 105.7, 109.7),
(104, 'P', 41, 86.3, 90.4, 94.4, 98.4, 102.4, 106.4, 110.5),
(105, 'P', 42, 86.8, 90.9, 95.0, 99.0, 103.1, 107.2, 111.2),
(106, 'P', 43, 87.4, 91.5, 95.6, 99.7, 103.8, 107.9, 112.0),
(107, 'P', 44, 87.9, 92.0, 96.2, 100.3, 104.5, 108.6, 112.7),
(108, 'P', 45, 88.4, 92.5, 96.7, 100.9, 105.1, 109.3, 113.5),
(109, 'P', 46, 88.9, 93.1, 97.3, 101.5, 105.8, 110.0, 114.2),
(110, 'P', 47, 89.3, 93.6, 97.9, 102.1, 106.4, 110.7, 114.9),
(111, 'P', 48, 89.8, 94.1, 98.4, 102.7, 107.0, 111.3, 115.7),
(112, 'P', 49, 90.3, 94.6, 99.0, 103.3, 107.7, 112.0, 116.4),
(113, 'P', 50, 90.7, 95.1, 99.5, 103.9, 108.3, 112.7, 117.1),
(114, 'P', 51, 91.2, 95.6, 100.1, 104.5, 108.9, 113.3, 117.7),
(115, 'P', 53, 92.1, 96.6, 101.1, 105.6, 110.1, 114.6, 119.1),
(116, 'P', 54, 92.6, 97.1, 101.6, 106.2, 110.7, 115.2, 119.8),
(117, 'P', 55, 93.0, 97.6, 102.2, 106.7, 111.3, 115.9, 120.4),
(118, 'P', 56, 93.4, 98.1, 102.7, 107.3, 111.9, 116.5, 121.1),
(119, 'P', 57, 93.9, 98.5, 103.2, 107.8, 112.5, 117.1, 121.8),
(120, 'P', 58, 94.3, 99.0, 103.7, 108.4, 113.0, 117.7, 122.4),
(121, 'P', 59, 94.7, 99.5, 104.2, 108.9, 113.6, 118.3, 123.1),
(122, 'P', 60, 95.2, 99.9, 104.7, 109.4, 114.2, 118.9, 123.7);

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
(14, 'sogar70275@esmoud.com', 'Sogar', '089658745258', '$2y$10$vXkx4HwjZt14.bkN8I9LreN9ITuOUhxVp.9hh6z4QxIwEl.CHwYAO', '701715', 1, 0, NULL, '2022-09-06', NULL),
(15, 'notosa6817@laluxy.com', 'Notosari', '089976543671', '$2y$10$IFxgmllXuRhkvd/1uV6IA.WKSWpnTreK.gaNzyFltCmGUmqKpW5.2', '055517', 1, 0, NULL, '2022-09-09', NULL),
(16, 'alex@mail.com', 'alex98', '087656789876', '$2y$10$uYIE./IzGcuhKjuSixxpv.YPWc9YWk7CXywYYpi5UlQaHKcxb8dkm', NULL, 1, 0, NULL, '2022-09-09', NULL),
(18, 'TRI111@GMAIL.COM', 'uwi', '081923892139', '$2y$10$w8QKA7JUftDBY6RiTqaDaOxNRqnjPk5cW6LL872H9RODkTHYRLcIO', '745492', 1, 0, NULL, '2022-09-10', NULL),
(20, 'yani@gmail.com', 'yani', '081211188888', '$2y$10$rc6Ry5hwBWMl1QtFJMY9LuycD3exkdPE/7HxbKvKfmAppqc4vMTUS', '471379', 1, 0, NULL, '2022-09-11', NULL),
(21, 'Salsabila@yahoo.com', 'caca', '081383451276', '$2y$10$4eITyWP8dpmc4ACCaeqiHuvEAvgj8YTiHjb1WT9crwFu5lYXyBXNu', '407684', 1, 0, NULL, '2022-09-11', NULL),
(22, 'tiahahahaha@gmail.com', 'tiah', '0812345678999', '$2y$10$t8RSNVgo8vRFg0cM4pd0duH.rPvu0S6iNBUZ40ISE3ZE6DsbCbCBa', NULL, 1, 0, NULL, '2022-09-11', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `profile_bayi`
--
ALTER TABLE `profile_bayi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `standar_deviasi`
--
ALTER TABLE `standar_deviasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
