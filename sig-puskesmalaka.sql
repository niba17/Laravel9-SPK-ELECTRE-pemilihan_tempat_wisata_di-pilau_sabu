-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2023 at 02:59 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sig-puskesmalaka`
--

-- --------------------------------------------------------

--
-- Table structure for table `alkes`
--

CREATE TABLE `alkes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(128) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alkes`
--

INSERT INTO `alkes` (`id`, `nama`, `updated_at`, `created_at`) VALUES
(1, 'Timbangan Bayi', '2023-04-11 19:20:57', '2023-04-03 22:00:23'),
(2, 'Timbangan Dewasa', '2023-04-03 23:07:00', '2023-04-03 23:07:00'),
(4, 'Dopler', '2023-04-05 21:35:05', '2023-04-05 21:35:05'),
(5, 'Tensimeter', '2023-04-05 21:35:18', '2023-04-05 21:35:18'),
(6, 'Troli', '2023-04-05 21:35:35', '2023-04-05 21:35:35'),
(7, 'Sterilisasi Ozon', '2023-04-05 21:46:26', '2023-04-05 21:46:26');

-- --------------------------------------------------------

--
-- Table structure for table `faskes`
--

CREATE TABLE `faskes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(128) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faskes`
--

INSERT INTO `faskes` (`id`, `nama`, `updated_at`, `created_at`) VALUES
(1, 'Poli Umum', '2023-04-03 23:00:14', '2023-04-03 21:53:51'),
(2, 'Poli KIA', '2023-04-03 23:00:27', '2023-04-03 22:11:26'),
(4, 'Poli TB', '2023-04-03 23:00:49', '2023-04-03 22:19:25'),
(5, 'Laboratorium', '2023-04-03 23:01:02', '2023-04-03 22:28:51'),
(6, 'Apotik', '2023-04-03 23:01:12', '2023-04-03 23:01:12'),
(7, 'Kendaraan', '2023-04-03 23:01:27', '2023-04-03 23:01:27');

-- --------------------------------------------------------

--
-- Table structure for table `faskes_alkes`
--

CREATE TABLE `faskes_alkes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faskes_id` bigint(20) UNSIGNED DEFAULT NULL,
  `alkes_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faskes_alkes`
--

INSERT INTO `faskes_alkes` (`id`, `faskes_id`, `alkes_id`, `created_at`, `updated_at`) VALUES
(1, 6, 4, NULL, NULL),
(2, 7, 6, NULL, NULL),
(3, 2, 4, NULL, NULL),
(4, 7, 1, '2023-04-11 16:04:44', '2023-04-11 16:22:30'),
(5, 2, 1, '2023-04-11 16:07:19', '2023-04-11 16:07:19'),
(6, NULL, 2, '2023-04-11 16:07:41', '2023-04-11 16:07:41'),
(7, 1, 1, '2023-04-11 16:27:18', '2023-04-11 16:27:18'),
(8, 2, 6, '2023-04-11 16:41:49', '2023-04-11 16:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(47, 'Malaka Tengah', NULL, NULL),
(48, 'Sesitamean', NULL, NULL),
(51, 'Rinhat', NULL, NULL),
(52, 'Wewiku', '2023-03-27 16:24:30', '2023-03-27 16:24:30'),
(53, 'Malaka Baru', '2023-03-27 16:28:31', '2023-03-27 16:28:31'),
(54, 'Malaka Timur', '2023-03-27 16:41:01', '2023-03-27 16:41:01'),
(55, 'Io Kufeu', '2023-03-27 16:44:30', '2023-03-27 16:44:30'),
(56, 'Weliman', '2023-03-27 16:45:46', '2023-03-27 16:45:46'),
(57, 'Botin Leobele', '2023-03-27 16:51:29', '2023-03-27 16:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id`, `nama`, `kecamatan_id`, `created_at`, `updated_at`) VALUES
(108, 'wehali', 47, NULL, '2023-03-23 14:40:06'),
(109, 'boen', 51, NULL, NULL),
(110, 'Kaputu', 48, '2023-03-23 14:25:06', '2023-03-23 14:25:38'),
(111, 'Tafuli', 47, '2023-03-23 14:33:07', '2023-03-23 14:33:07'),
(112, 'Alkani', 52, '2023-03-27 16:24:39', '2023-03-27 16:24:39'),
(113, 'Oan Mane', 53, '2023-03-27 16:28:40', '2023-03-27 16:28:40'),
(114, 'Dirma', 54, '2023-03-27 16:40:43', '2023-03-27 16:41:09'),
(115, 'Tunabesi', 55, '2023-03-27 16:44:42', '2023-03-27 16:44:42'),
(116, 'Laleten', 56, '2023-03-27 16:45:37', '2023-03-27 16:45:57'),
(117, 'Weoe', 52, '2023-03-27 16:47:24', '2023-03-27 16:47:24'),
(118, 'Takarai', 57, '2023-03-27 16:51:19', '2023-03-27 16:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_09_19_134504_make_kasus_table', 1),
(3, '2022_09_19_145703_create_puskesmas_table', 2),
(4, '2022_09_19_150923_create_kecamatan_table', 3),
(6, '2022_09_19_151045_create_kelurahan_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nip` varchar(128) NOT NULL,
  `golongan` bigint(20) UNSIGNED DEFAULT NULL,
  `pendidikan` bigint(20) UNSIGNED DEFAULT NULL,
  `jabatan` bigint(20) UNSIGNED DEFAULT NULL,
  `tmpt_tugas` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `puskesmas`
--

CREATE TABLE `puskesmas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(128) NOT NULL,
  `kecamatan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kelurahan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lat` varchar(128) NOT NULL,
  `lng` varchar(128) NOT NULL,
  `gambar` varchar(128) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `puskesmas`
--

INSERT INTO `puskesmas` (`id`, `nama`, `kecamatan_id`, `kelurahan_id`, `lat`, `lng`, `gambar`, `created_at`, `updated_at`) VALUES
(3, 'Puskesmas Betun', 47, 108, '-9.567606', ' 124.903574', 'puskesBetun.jpg', NULL, NULL),
(4, 'Puskesmas Kaputu', 48, 110, '-9.49562', '124.85395', NULL, NULL, NULL),
(5, 'Puskesmas Tafuli', 47, 111, '-9.598938', '124.665733', NULL, NULL, NULL),
(6, 'Puskesmas Alkani', 52, 112, '-9.75342', '124.82184', NULL, '2023-03-27 16:26:53', '2023-03-27 16:26:53'),
(7, 'Puskesmas Fahiluka', 53, 113, '-9.621753', '124.942291', NULL, '2023-03-27 16:29:44', '2023-03-27 16:29:44'),
(8, 'Puskesmas Seon', 54, 114, '-9.415517', '124.902807', NULL, '2023-03-27 16:41:41', '2023-03-27 16:41:41'),
(9, 'Puskesmas Tunabesi', 55, 115, '-9.487714', '124.794077', NULL, '2023-03-27 16:45:18', '2023-03-27 16:45:18'),
(10, 'Puskesmas Weliman', 56, 116, '-9.631572', '124.864466', NULL, '2023-03-27 16:46:34', '2023-03-27 16:46:34'),
(11, 'Puskesmas Weoe', 52, 117, '-9.692728', '124.838019', NULL, '2023-03-27 16:48:08', '2023-03-27 16:48:08'),
(12, 'Puskesmas Sarina', 57, 118, '-9.501305', '124.891031', NULL, '2023-03-27 16:52:13', '2023-03-27 16:52:13');

-- --------------------------------------------------------

--
-- Table structure for table `puskes_alkes`
--

CREATE TABLE `puskes_alkes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `puskesmas_id` bigint(20) UNSIGNED NOT NULL,
  `alkes_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `puskes_alkes`
--

INSERT INTO `puskes_alkes` (`id`, `puskesmas_id`, `alkes_id`, `jumlah`, `updated_at`, `created_at`) VALUES
(18, 5, 4, 7, '2023-04-11 18:27:23', NULL),
(19, 7, 7, 7, NULL, NULL),
(20, 4, 4, 7, '2023-04-11 18:37:25', NULL),
(21, 3, 5, 6, NULL, NULL),
(22, 3, 2, NULL, '2023-04-11 18:05:53', '2023-04-11 17:57:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$sjWmdMvt.0bQg77O/iIaA.faFUEyusZ.GiBpRJTwc8WLUOFIVwVCC', NULL, '2023-01-03 22:09:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alkes`
--
ALTER TABLE `alkes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faskes`
--
ALTER TABLE `faskes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faskes_alkes`
--
ALTER TABLE `faskes_alkes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faskes_id` (`faskes_id`,`alkes_id`),
  ADD KEY `alkes_id` (`alkes_id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `puskesmas_id` (`kecamatan_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `golongan` (`golongan`,`pendidikan`,`jabatan`,`tmpt_tugas`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `puskesmas`
--
ALTER TABLE `puskesmas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kecamatan_id` (`kecamatan_id`),
  ADD KEY `kelurahan_id` (`kelurahan_id`);

--
-- Indexes for table `puskes_alkes`
--
ALTER TABLE `puskes_alkes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `puskesmas_id` (`puskesmas_id`,`alkes_id`),
  ADD KEY `alkes_id` (`alkes_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alkes`
--
ALTER TABLE `alkes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `faskes`
--
ALTER TABLE `faskes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `faskes_alkes`
--
ALTER TABLE `faskes_alkes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `puskesmas`
--
ALTER TABLE `puskesmas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `puskes_alkes`
--
ALTER TABLE `puskes_alkes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faskes_alkes`
--
ALTER TABLE `faskes_alkes`
  ADD CONSTRAINT `faskes_alkes_ibfk_1` FOREIGN KEY (`faskes_id`) REFERENCES `faskes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `faskes_alkes_ibfk_2` FOREIGN KEY (`alkes_id`) REFERENCES `alkes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `kelurahan_ibfk_1` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `puskesmas`
--
ALTER TABLE `puskesmas`
  ADD CONSTRAINT `puskesmas_ibfk_1` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `puskesmas_ibfk_2` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `puskes_alkes`
--
ALTER TABLE `puskes_alkes`
  ADD CONSTRAINT `puskes_alkes_ibfk_1` FOREIGN KEY (`puskesmas_id`) REFERENCES `puskesmas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `puskes_alkes_ibfk_2` FOREIGN KEY (`alkes_id`) REFERENCES `alkes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
