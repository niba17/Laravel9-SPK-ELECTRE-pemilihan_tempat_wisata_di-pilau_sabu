-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2023 at 02:42 PM
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
-- Database: `spk-electre`
--

-- --------------------------------------------------------

--
-- Table structure for table `desa`
--

CREATE TABLE `desa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(128) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `desa`
--

INSERT INTO `desa` (`id`, `nama`, `updated_at`, `created_at`) VALUES
(1, 'Desa 1', '2023-06-18 19:07:19', '2023-06-18 17:45:07'),
(3, 'Desa 2', '2023-06-18 18:02:05', '2023-06-18 18:02:05'),
(4, 'Desa 3', '2023-06-18 18:02:13', '2023-06-18 18:02:13'),
(5, 'Desa 4', '2023-06-18 19:05:53', '2023-06-18 19:05:53');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(128) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama`, `updated_at`, `created_at`) VALUES
(10, 'Sabu Barat', '2023-06-04 02:51:55', '2023-06-04 02:51:55'),
(11, 'Sabu Tengah', '2023-06-04 02:52:24', '2023-06-04 02:52:24'),
(12, 'Sabu Timur', '2023-06-04 02:52:41', '2023-06-04 02:52:41'),
(13, 'Sabu Liae', '2023-06-04 02:53:01', '2023-06-04 02:53:01'),
(14, 'Hawu Mehara', '2023-06-04 02:53:25', '2023-06-04 02:53:25');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan_kelurahan`
--

CREATE TABLE `kecamatan_kelurahan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kecamatan_id` bigint(20) UNSIGNED NOT NULL,
  `kelurahan_id` bigint(20) UNSIGNED NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecamatan_kelurahan`
--

INSERT INTO `kecamatan_kelurahan` (`id`, `kecamatan_id`, `kelurahan_id`, `updated_at`, `created_at`) VALUES
(21, 10, 15, '2023-06-18 18:09:10', '2023-06-18 18:01:51'),
(22, 10, 14, '2023-06-18 18:08:51', '2023-06-18 18:08:51');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(128) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id`, `nama`, `updated_at`, `created_at`) VALUES
(13, 'Mebba', '2023-06-04 02:54:08', '2023-06-04 02:54:08'),
(14, 'Bolou', '2023-06-04 02:54:35', '2023-06-04 02:54:35'),
(15, 'Limaggu', '2023-06-04 02:54:56', '2023-06-04 02:54:56'),
(17, 'BLM', '2023-06-04 04:09:40', '2023-06-04 04:06:29');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan_desa`
--

CREATE TABLE `kelurahan_desa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelurahan_id` bigint(20) UNSIGNED NOT NULL,
  `desa_id` bigint(20) UNSIGNED NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelurahan_desa`
--

INSERT INTO `kelurahan_desa` (`id`, `kelurahan_id`, `desa_id`, `updated_at`, `created_at`) VALUES
(4, 14, 3, '2023-06-18 19:26:48', '2023-06-18 19:26:48'),
(5, 14, 1, '2023-06-18 19:40:41', '2023-06-18 19:40:41');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(128) NOT NULL,
  `bobot_referensi` double NOT NULL,
  `cost_benefit` varchar(128) NOT NULL,
  `bobot_perhitungan` varchar(128) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`, `bobot_referensi`, `cost_benefit`, `bobot_perhitungan`, `updated_at`, `created_at`) VALUES
(27, 'FASILITAS', 0.28, 'Benefit', 'JSK', '2023-06-06 10:12:57', '2023-06-04 02:20:01'),
(28, 'JARAK', 0.22, 'Benefit', 'BSK', '2023-06-06 10:13:06', '2023-06-04 02:20:31'),
(29, 'BIAYA', 0.11, 'Cost', 'BSK', '2023-06-06 10:13:15', '2023-06-04 02:21:02'),
(30, 'WAKTU', 0.17, 'Benefit', 'BSK', '2023-06-06 10:13:46', '2023-06-04 02:21:29'),
(31, 'KEAMANAN', 0.22, 'Benefit', 'BSK', '2023-06-06 10:13:54', '2023-06-04 02:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_sub_kriteria`
--

CREATE TABLE `kriteria_sub_kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_kriteria_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bobot` double NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria_sub_kriteria`
--

INSERT INTO `kriteria_sub_kriteria` (`id`, `kriteria_id`, `sub_kriteria_id`, `bobot`, `updated_at`, `created_at`) VALUES
(94, 27, 67, 1, '2023-06-04 02:36:28', '2023-06-04 02:36:28'),
(95, 27, 68, 1, '2023-06-04 02:36:48', '2023-06-04 02:36:48'),
(96, 27, 69, 1, '2023-06-04 02:37:08', '2023-06-04 02:37:08'),
(97, 27, 70, 1, '2023-06-04 02:37:29', '2023-06-04 02:37:29'),
(98, 27, 71, 1, '2023-06-04 02:37:49', '2023-06-04 02:37:49'),
(99, 28, 72, 5, '2023-06-04 02:39:03', '2023-06-04 02:38:10'),
(100, 28, 73, 4, '2023-06-04 02:39:27', '2023-06-04 02:39:27'),
(101, 28, 74, 3, '2023-06-04 02:39:48', '2023-06-04 02:39:48'),
(102, 28, 75, 2, '2023-06-04 02:40:11', '2023-06-04 02:40:11'),
(103, 28, 76, 1, '2023-06-04 02:42:05', '2023-06-04 02:41:00'),
(104, 29, 77, 3, '2023-06-04 02:42:45', '2023-06-04 02:42:45'),
(105, 29, 78, 2, '2023-06-04 02:43:07', '2023-06-04 02:43:07'),
(106, 29, 79, 1, '2023-06-04 02:43:26', '2023-06-04 02:43:26'),
(107, 30, 80, 5, '2023-06-04 02:43:48', '2023-06-04 02:43:48'),
(108, 30, 81, 4, '2023-06-04 02:44:06', '2023-06-04 02:44:06'),
(109, 30, 82, 3, '2023-06-04 02:44:26', '2023-06-04 02:44:26'),
(110, 30, 83, 2, '2023-06-04 02:44:44', '2023-06-04 02:44:44'),
(111, 30, 84, 1, '2023-06-04 02:45:22', '2023-06-04 02:45:22'),
(112, 31, 86, 1, '2023-06-04 02:46:12', '2023-06-04 02:46:12'),
(113, 31, 87, 3, '2023-06-04 03:04:07', '2023-06-04 02:46:44'),
(114, 31, 88, 5, '2023-06-04 03:03:49', '2023-06-04 02:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_wisata`
--

CREATE TABLE `lokasi_wisata` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(128) NOT NULL,
  `kecamatan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kelurahan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `desa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi_wisata`
--

INSERT INTO `lokasi_wisata` (`id`, `nama`, `kecamatan_id`, `kelurahan_id`, `desa_id`, `updated_at`, `created_at`) VALUES
(472, 'Pantai Napae', 14, 17, NULL, '2023-06-04 04:10:46', '2023-06-04 04:10:46'),
(473, 'Taman Doa Skyber', 10, 17, NULL, '2023-06-04 04:29:24', '2023-06-04 04:11:23'),
(474, 'Bukit Salju', 14, 17, NULL, '2023-06-04 04:11:50', '2023-06-04 04:11:50'),
(475, 'Kelabba Madja', 14, 17, NULL, '2023-06-04 04:12:19', '2023-06-04 04:12:19'),
(476, 'GoaLie Madira', 14, 17, NULL, '2023-06-04 04:14:20', '2023-06-04 04:14:20'),
(477, 'Pantai Rae Mea', 12, 15, NULL, '2023-06-04 04:14:50', '2023-06-04 04:14:50'),
(478, 'Goa Mabala', 11, 17, NULL, '2023-06-04 04:15:15', '2023-06-04 04:15:15'),
(479, 'Pantai Cemara Nyiu Wudu', 12, 17, NULL, '2023-06-04 04:30:06', '2023-06-04 04:16:18'),
(480, 'Pantai Mananga', 12, 14, NULL, '2023-06-04 04:17:01', '2023-06-04 04:17:01'),
(481, 'Kampung Adat Namata', 10, 17, NULL, '2023-06-04 04:30:20', '2023-06-04 04:17:23'),
(482, 'Pantai Cemara Jiwuwu', 12, 17, NULL, '2023-06-04 04:22:14', '2023-06-04 04:18:02'),
(483, 'Pantai Kepo', 13, 17, NULL, '2023-06-04 04:18:24', '2023-06-04 04:18:24'),
(484, 'Pantai Majala', 13, 17, NULL, '2023-06-04 04:18:46', '2023-06-04 04:18:46'),
(485, 'Halla Padji', 11, 17, NULL, '2023-06-04 04:19:04', '2023-06-04 04:19:04'),
(486, 'Pantai Uba Happu', 11, 17, NULL, '2023-06-04 04:23:25', '2023-06-04 04:23:25'),
(487, 'Goe Lie Geta', 12, 17, NULL, '2023-06-04 04:23:47', '2023-06-04 04:23:47'),
(488, 'Pantai Mahera', 12, 17, NULL, '2023-06-04 04:24:09', '2023-06-04 04:24:09'),
(489, 'Wadu Mea', 11, 17, NULL, '2023-06-04 04:24:54', '2023-06-04 04:24:54'),
(490, 'Pantai Batu Tiga', 12, 17, NULL, '2023-06-04 04:25:30', '2023-06-04 04:25:30'),
(491, 'Wadu Maddi', 14, 17, NULL, '2023-06-04 04:25:53', '2023-06-04 04:25:53'),
(492, 'Wadu Walla', 13, 17, NULL, '2023-06-04 04:26:13', '2023-06-04 04:26:13'),
(493, 'Pantai Banteng Ege', 13, 17, NULL, '2023-06-04 04:27:22', '2023-06-04 04:27:22'),
(494, 'Pantai Lede Raga', 10, 17, NULL, '2023-06-04 04:27:43', '2023-06-04 04:27:43'),
(495, 'Kampung Adat Kuji Ratu', 12, 17, NULL, '2023-06-04 04:28:09', '2023-06-04 04:28:09'),
(496, 'Kawasan EkoWisata Mangrove', 10, 17, NULL, '2023-06-04 04:28:32', '2023-06-04 04:28:32'),
(497, 'Kolam Eimadabubu', 10, 17, NULL, '2023-06-04 04:28:57', '2023-06-04 04:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_wisata_sub_kriteria`
--

CREATE TABLE `lokasi_wisata_sub_kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lokasi_wisata_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi_wisata_sub_kriteria`
--

INSERT INTO `lokasi_wisata_sub_kriteria` (`id`, `lokasi_wisata_id`, `kriteria_id`, `sub_kriteria_id`, `updated_at`, `created_at`) VALUES
(1751, 472, 27, 67, '2023-06-04 04:31:14', '2023-06-04 04:31:14'),
(1752, 472, 27, 68, '2023-06-04 04:33:06', '2023-06-04 04:33:06'),
(1753, 472, 27, 69, '2023-06-04 04:33:27', '2023-06-04 04:33:27'),
(1754, 472, 27, 70, '2023-06-04 04:34:02', '2023-06-04 04:34:02'),
(1755, 472, 28, 72, '2023-06-04 04:34:28', '2023-06-04 04:34:28'),
(1756, 472, 29, 79, '2023-06-04 04:34:46', '2023-06-04 04:34:46'),
(1758, 473, 27, 67, '2023-06-04 04:36:24', '2023-06-04 04:36:24'),
(1759, 473, 27, 68, '2023-06-04 04:36:39', '2023-06-04 04:36:39'),
(1760, 473, 27, 69, '2023-06-04 04:37:03', '2023-06-04 04:37:03'),
(1761, 473, 27, 70, '2023-06-04 04:37:22', '2023-06-04 04:37:22'),
(1762, 473, 28, 72, '2023-06-04 04:37:47', '2023-06-04 04:37:47'),
(1763, 473, 29, 79, '2023-06-04 04:38:20', '2023-06-04 04:38:20'),
(1764, 473, 30, 80, '2023-06-04 04:38:43', '2023-06-04 04:38:43'),
(1765, 473, 31, 88, '2023-06-04 04:39:00', '2023-06-04 04:39:00'),
(1766, 474, 27, 67, '2023-06-04 04:39:42', '2023-06-04 04:39:42'),
(1767, 474, 27, 69, '2023-06-04 04:40:10', '2023-06-04 04:40:10'),
(1768, 474, 28, 74, '2023-06-04 04:40:40', '2023-06-04 04:40:40'),
(1769, 474, 29, 78, '2023-06-04 04:41:15', '2023-06-04 04:41:15'),
(1771, 474, 30, 82, '2023-06-04 04:42:41', '2023-06-04 04:42:41'),
(1773, 475, 27, 67, '2023-06-04 04:44:17', '2023-06-04 04:44:17'),
(1774, 475, 27, 68, '2023-06-04 04:44:36', '2023-06-04 04:44:36'),
(1775, 475, 27, 69, '2023-06-04 04:44:54', '2023-06-04 04:44:54'),
(1776, 475, 27, 70, '2023-06-04 04:45:15', '2023-06-04 04:45:15'),
(1777, 475, 27, 71, '2023-06-04 04:45:43', '2023-06-04 04:45:43'),
(1778, 475, 28, 75, '2023-06-04 04:46:29', '2023-06-04 04:46:29'),
(1779, 475, 29, 79, '2023-06-04 04:46:46', '2023-06-04 04:46:46'),
(1780, 475, 30, 83, '2023-06-04 04:47:05', '2023-06-04 04:47:05'),
(1781, 475, 31, 88, '2023-06-04 04:47:23', '2023-06-04 04:47:23'),
(1782, 476, 27, 67, '2023-06-04 04:48:29', '2023-06-04 04:48:29'),
(1783, 476, 27, 68, '2023-06-04 04:48:59', '2023-06-04 04:48:59'),
(1784, 476, 28, 74, '2023-06-04 04:49:21', '2023-06-04 04:49:21'),
(1785, 476, 29, 78, '2023-06-04 04:49:46', '2023-06-04 04:49:46'),
(1786, 476, 30, 81, '2023-06-04 04:50:08', '2023-06-04 04:50:08'),
(1787, 476, 31, 87, '2023-06-04 04:50:42', '2023-06-04 04:50:42'),
(1788, 477, 27, 67, '2023-06-04 04:51:33', '2023-06-04 04:51:33'),
(1789, 477, 27, 68, '2023-06-04 04:51:56', '2023-06-04 04:51:56'),
(1790, 477, 27, 71, '2023-06-04 04:52:22', '2023-06-04 04:52:22'),
(1791, 477, 28, 73, '2023-06-04 04:52:52', '2023-06-04 04:52:52'),
(1792, 477, 29, 78, '2023-06-04 04:53:21', '2023-06-04 04:53:21'),
(1793, 477, 30, 81, '2023-06-04 04:53:43', '2023-06-04 04:53:43'),
(1794, 477, 31, 88, '2023-06-04 04:54:05', '2023-06-04 04:54:05'),
(1795, 478, 27, 67, '2023-06-04 04:54:52', '2023-06-04 04:54:52'),
(1796, 478, 27, 69, '2023-06-04 04:55:10', '2023-06-04 04:55:10'),
(1797, 478, 28, 73, '2023-06-04 04:55:53', '2023-06-04 04:55:53'),
(1798, 478, 29, 78, '2023-06-04 04:56:27', '2023-06-04 04:56:27'),
(1799, 478, 30, 81, '2023-06-04 04:56:50', '2023-06-04 04:56:50'),
(1800, 478, 31, 87, '2023-06-04 04:57:20', '2023-06-04 04:57:20'),
(1801, 479, 27, 67, '2023-06-04 05:02:36', '2023-06-04 05:02:36'),
(1802, 479, 27, 69, '2023-06-04 05:02:50', '2023-06-04 05:02:50'),
(1803, 479, 28, 73, '2023-06-04 05:03:16', '2023-06-04 05:03:16'),
(1807, 480, 27, 67, '2023-06-04 05:04:32', '2023-06-04 05:04:32'),
(1809, 480, 28, 74, '2023-06-04 05:07:16', '2023-06-04 05:07:16'),
(1810, 480, 29, 77, '2023-06-04 05:07:32', '2023-06-04 05:07:32'),
(1811, 480, 30, 82, '2023-06-04 05:07:53', '2023-06-04 05:07:53'),
(1812, 480, 31, 86, '2023-06-04 05:08:18', '2023-06-04 05:08:18'),
(1813, 481, 27, 67, '2023-06-04 05:09:07', '2023-06-04 05:09:07'),
(1814, 481, 27, 68, '2023-06-04 05:09:27', '2023-06-04 05:09:27'),
(1815, 481, 27, 69, '2023-06-04 05:09:45', '2023-06-04 05:09:45'),
(1816, 481, 28, 72, '2023-06-04 05:10:34', '2023-06-04 05:10:34'),
(1817, 481, 29, 78, '2023-06-04 05:10:53', '2023-06-04 05:10:53'),
(1818, 481, 30, 80, '2023-06-04 05:11:15', '2023-06-04 05:11:15'),
(1819, 481, 31, 87, '2023-06-04 05:11:48', '2023-06-04 05:11:48'),
(1820, 482, 27, 67, '2023-06-04 05:12:23', '2023-06-04 05:12:23'),
(1821, 482, 27, 68, '2023-06-04 05:12:43', '2023-06-04 05:12:43'),
(1822, 482, 27, 69, '2023-06-04 05:13:01', '2023-06-04 05:13:01'),
(1823, 482, 27, 71, '2023-06-04 05:13:20', '2023-06-04 05:13:20'),
(1824, 482, 28, 73, '2023-06-04 05:13:43', '2023-06-04 05:13:43'),
(1825, 482, 29, 78, '2023-06-04 05:14:04', '2023-06-04 05:14:04'),
(1826, 482, 30, 81, '2023-06-04 05:15:15', '2023-06-04 05:15:15'),
(1827, 482, 31, 87, '2023-06-04 05:15:56', '2023-06-04 05:15:56'),
(1828, 483, 27, 67, '2023-06-04 05:16:34', '2023-06-04 05:16:34'),
(1829, 483, 27, 68, '2023-06-04 05:16:48', '2023-06-04 05:16:48'),
(1830, 483, 27, 69, '2023-06-04 05:17:08', '2023-06-04 05:17:08'),
(1831, 483, 27, 71, '2023-06-04 05:17:30', '2023-06-04 05:17:30'),
(1832, 483, 28, 74, '2023-06-04 05:17:53', '2023-06-04 05:17:53'),
(1833, 483, 29, 78, '2023-06-04 05:18:11', '2023-06-04 05:18:11'),
(1834, 483, 30, 82, '2023-06-04 05:18:38', '2023-06-04 05:18:38'),
(1835, 483, 31, 87, '2023-06-04 05:18:59', '2023-06-04 05:18:59'),
(1836, 484, 27, 67, '2023-06-04 05:19:26', '2023-06-04 05:19:26'),
(1837, 484, 28, 76, '2023-06-04 05:19:46', '2023-06-04 05:19:46'),
(1838, 484, 29, 77, '2023-06-04 05:20:06', '2023-06-04 05:20:06'),
(1839, 484, 30, 84, '2023-06-04 05:20:58', '2023-06-04 05:20:58'),
(1840, 484, 31, 86, '2023-06-04 05:21:17', '2023-06-04 05:21:17'),
(1841, 485, 27, 67, '2023-06-04 05:21:45', '2023-06-04 05:21:45'),
(1842, 485, 28, 74, '2023-06-04 05:22:14', '2023-06-04 05:22:14'),
(1843, 485, 29, 77, '2023-06-04 05:22:30', '2023-06-04 05:22:30'),
(1844, 485, 30, 82, '2023-06-04 05:22:49', '2023-06-04 05:22:49'),
(1845, 485, 31, 86, '2023-06-04 05:23:02', '2023-06-04 05:23:02'),
(1846, 486, 27, 67, '2023-06-04 06:00:44', '2023-06-04 06:00:44'),
(1847, 486, 28, 74, '2023-06-04 06:01:01', '2023-06-04 06:01:01'),
(1848, 486, 29, 77, '2023-06-04 06:01:16', '2023-06-04 06:01:16'),
(1849, 486, 30, 82, '2023-06-04 06:01:40', '2023-06-04 06:01:40'),
(1850, 486, 31, 86, '2023-06-04 06:01:55', '2023-06-04 06:01:55'),
(1851, 487, 27, 67, '2023-06-04 06:02:10', '2023-06-04 06:02:10'),
(1852, 487, 28, 74, '2023-06-04 06:02:30', '2023-06-04 06:02:30'),
(1853, 487, 29, 77, '2023-06-04 06:02:46', '2023-06-04 06:02:46'),
(1854, 487, 30, 83, '2023-06-04 06:03:55', '2023-06-04 06:03:55'),
(1855, 487, 31, 86, '2023-06-04 06:04:33', '2023-06-04 06:04:33'),
(1856, 488, 27, 67, '2023-06-04 06:05:10', '2023-06-04 06:05:10'),
(1857, 488, 27, 68, '2023-06-04 06:05:37', '2023-06-04 06:05:37'),
(1858, 488, 27, 69, '2023-06-04 06:05:53', '2023-06-04 06:05:53'),
(1859, 488, 27, 71, '2023-06-04 06:06:09', '2023-06-04 06:06:09'),
(1860, 488, 28, 74, '2023-06-04 06:06:28', '2023-06-04 06:06:28'),
(1861, 488, 29, 78, '2023-06-04 06:06:47', '2023-06-04 06:06:47'),
(1862, 488, 30, 82, '2023-06-04 06:07:10', '2023-06-04 06:07:10'),
(1863, 488, 31, 88, '2023-06-04 06:07:26', '2023-06-04 06:07:26'),
(1864, 489, 27, 67, '2023-06-04 06:07:46', '2023-06-04 06:07:46'),
(1865, 489, 27, 68, '2023-06-04 06:08:07', '2023-06-04 06:08:07'),
(1866, 489, 27, 69, '2023-06-04 06:08:27', '2023-06-04 06:08:27'),
(1867, 489, 28, 74, '2023-06-04 06:08:48', '2023-06-04 06:08:48'),
(1868, 489, 29, 77, '2023-06-04 06:09:08', '2023-06-04 06:09:08'),
(1869, 489, 30, 83, '2023-06-04 06:09:26', '2023-06-04 06:09:26'),
(1870, 489, 31, 86, '2023-06-04 06:09:44', '2023-06-04 06:09:44'),
(1871, 490, 27, 67, '2023-06-04 06:10:03', '2023-06-04 06:10:03'),
(1872, 490, 28, 74, '2023-06-04 06:10:27', '2023-06-04 06:10:27'),
(1873, 490, 29, 78, '2023-06-04 06:10:56', '2023-06-04 06:10:56'),
(1874, 490, 30, 82, '2023-06-04 06:11:17', '2023-06-04 06:11:17'),
(1875, 490, 31, 87, '2023-06-04 06:11:33', '2023-06-04 06:11:33'),
(1876, 491, 27, 67, '2023-06-04 06:11:58', '2023-06-04 06:11:58'),
(1877, 491, 27, 69, '2023-06-04 06:12:21', '2023-06-04 06:12:21'),
(1878, 491, 28, 75, '2023-06-04 06:12:44', '2023-06-04 06:12:44'),
(1879, 491, 29, 78, '2023-06-04 06:13:12', '2023-06-04 06:13:12'),
(1880, 491, 30, 82, '2023-06-04 06:13:45', '2023-06-04 06:13:45'),
(1881, 491, 31, 87, '2023-06-04 06:14:07', '2023-06-04 06:14:07'),
(1882, 492, 27, 68, '2023-06-04 06:15:26', '2023-06-04 06:15:26'),
(1883, 492, 27, 69, '2023-06-04 06:15:47', '2023-06-04 06:15:47'),
(1884, 492, 28, 74, '2023-06-04 06:16:10', '2023-06-04 06:16:10'),
(1885, 492, 29, 77, '2023-06-04 06:16:25', '2023-06-04 06:16:25'),
(1886, 492, 30, 83, '2023-06-04 06:16:46', '2023-06-04 06:16:46'),
(1887, 492, 31, 86, '2023-06-04 06:17:17', '2023-06-04 06:17:17'),
(1888, 493, 27, 67, '2023-06-04 06:17:46', '2023-06-04 06:17:46'),
(1893, 494, 27, 67, '2023-06-04 06:19:45', '2023-06-04 06:19:45'),
(1894, 493, 28, 74, '2023-06-04 06:23:13', '2023-06-04 06:23:13'),
(1895, 493, 29, 77, '2023-06-04 06:23:31', '2023-06-04 06:23:31'),
(1896, 493, 30, 82, '2023-06-04 06:23:59', '2023-06-04 06:23:59'),
(1897, 493, 31, 86, '2023-06-04 06:24:20', '2023-06-04 06:24:20'),
(1898, 494, 27, 69, '2023-06-04 06:24:43', '2023-06-04 06:24:43'),
(1899, 494, 28, 72, '2023-06-04 06:25:16', '2023-06-04 06:25:16'),
(1900, 494, 29, 77, '2023-06-04 06:25:33', '2023-06-04 06:25:33'),
(1901, 494, 30, 81, '2023-06-04 06:25:55', '2023-06-04 06:25:55'),
(1902, 494, 31, 86, '2023-06-04 06:26:11', '2023-06-04 06:26:11'),
(1903, 495, 27, 67, '2023-06-04 06:26:49', '2023-06-04 06:26:49'),
(1904, 495, 27, 68, '2023-06-04 06:27:08', '2023-06-04 06:27:08'),
(1905, 495, 28, 73, '2023-06-04 06:27:28', '2023-06-04 06:27:28'),
(1906, 495, 29, 78, '2023-06-04 06:27:43', '2023-06-04 06:27:43'),
(1907, 495, 30, 81, '2023-06-04 06:28:02', '2023-06-04 06:28:02'),
(1908, 495, 31, 87, '2023-06-04 06:28:17', '2023-06-04 06:28:17'),
(1909, 496, 27, 67, '2023-06-04 06:28:34', '2023-06-04 06:28:34'),
(1910, 496, 27, 68, '2023-06-04 06:28:54', '2023-06-04 06:28:54'),
(1911, 496, 27, 69, '2023-06-04 06:29:09', '2023-06-04 06:29:09'),
(1912, 496, 27, 71, '2023-06-04 06:29:25', '2023-06-04 06:29:25'),
(1913, 496, 28, 72, '2023-06-04 06:29:44', '2023-06-04 06:29:44'),
(1914, 496, 29, 78, '2023-06-04 06:30:00', '2023-06-04 06:30:00'),
(1915, 496, 30, 80, '2023-06-04 06:30:20', '2023-06-04 06:30:20'),
(1916, 496, 31, 87, '2023-06-04 06:30:37', '2023-06-04 06:30:37'),
(1917, 497, 27, 67, '2023-06-04 06:30:53', '2023-06-04 06:30:53'),
(1918, 497, 27, 68, '2023-06-04 06:31:09', '2023-06-04 06:31:09'),
(1919, 497, 28, 72, '2023-06-04 06:31:32', '2023-06-04 06:31:32'),
(1920, 497, 29, 77, '2023-06-04 06:31:48', '2023-06-04 06:31:48'),
(1921, 497, 30, 80, '2023-06-04 06:32:08', '2023-06-04 06:32:08'),
(1922, 497, 31, 87, '2023-06-04 06:32:25', '2023-06-04 06:32:25'),
(1923, 479, 29, 77, '2023-06-04 06:40:53', '2023-06-04 06:40:53'),
(1924, 479, 30, 81, '2023-06-04 06:41:34', '2023-06-04 06:41:34'),
(1925, 479, 31, 86, '2023-06-04 06:41:56', '2023-06-04 06:41:56'),
(1926, 472, 30, 80, '2023-06-06 03:43:05', '2023-06-06 03:43:05'),
(1927, 472, 31, 88, '2023-06-06 03:43:22', '2023-06-06 03:43:22'),
(1930, 474, 31, 87, '2023-06-06 09:57:28', '2023-06-06 09:57:28');

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
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(128) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id`, `nama`, `updated_at`, `created_at`) VALUES
(67, 'Tempat Parkir', '2023-06-04 02:25:12', '2023-06-04 02:25:12'),
(68, 'Toilet', '2023-06-04 02:28:35', '2023-06-04 02:28:35'),
(69, 'Lopo', '2023-06-04 02:28:51', '2023-06-04 02:28:51'),
(70, 'Kantin', '2023-06-04 02:29:06', '2023-06-04 02:29:06'),
(71, 'Tempat Sampah', '2023-06-04 02:29:24', '2023-06-04 02:29:24'),
(72, '0 – ≤ 10 km', '2023-06-04 02:30:01', '2023-06-04 02:30:01'),
(73, '> 10 – ≤ 20 km', '2023-06-04 02:30:17', '2023-06-04 02:30:17'),
(74, '> 20 – ≤ 30 km', '2023-06-04 02:30:33', '2023-06-04 02:30:33'),
(75, '> 30 – ≤ 40 km', '2023-06-04 02:30:48', '2023-06-04 02:30:48'),
(76, '> 40 – ≤ 50 km', '2023-06-04 02:31:04', '2023-06-04 02:31:04'),
(77, '0 – ≤ 3.500', '2023-06-04 02:31:35', '2023-06-04 02:31:35'),
(78, '>3.500 – ≤ 7.000', '2023-06-04 02:31:49', '2023-06-04 02:31:49'),
(79, '>7.000 – ≤ 10.000', '2023-06-04 02:32:06', '2023-06-04 02:32:06'),
(80, '0 – ≤ 16 menit', '2023-06-04 02:32:30', '2023-06-04 02:32:30'),
(81, '> 16 – ≤ 32 menit', '2023-06-04 02:32:44', '2023-06-04 02:32:44'),
(82, '> 32 – ≤ 48 menit', '2023-06-04 02:33:01', '2023-06-04 02:33:01'),
(83, '> 48 – ≤ 64 menit', '2023-06-04 02:33:17', '2023-06-04 02:33:17'),
(84, '> 64 – ≤ 80 menit', '2023-06-04 02:33:32', '2023-06-04 02:33:32'),
(86, 'Tidak Terdapat Bale-Bale Dan Security', '2023-06-04 02:34:59', '2023-06-04 02:34:59'),
(87, 'Bale-bale', '2023-06-04 02:35:29', '2023-06-04 02:35:29'),
(88, 'Security', '2023-06-04 02:35:47', '2023-06-04 02:35:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$NzaBVfjILD7tDI8YmG5QfOziOpNqCe68hZEPzKSgRcpbESS4XCWdy', 1, NULL, '2023-05-26 16:40:10'),
(15, 'a', '$2y$10$2nHrMssIHsy.qVb8bFgcIe.2iOLnh4iCSYuDmiBzSjda1duNNcTpu', NULL, '2023-04-08 18:42:31', '2023-04-08 18:42:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan_kelurahan`
--
ALTER TABLE `kecamatan_kelurahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kecamatan_id` (`kecamatan_id`,`kelurahan_id`),
  ADD KEY `kelurahan_id` (`kelurahan_id`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelurahan_desa`
--
ALTER TABLE `kelurahan_desa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelurahan_id` (`kelurahan_id`,`desa_id`),
  ADD KEY `desa_id` (`desa_id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria_sub_kriteria`
--
ALTER TABLE `kriteria_sub_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria_id` (`kriteria_id`,`sub_kriteria_id`),
  ADD KEY `sub_kriteria_id` (`sub_kriteria_id`);

--
-- Indexes for table `lokasi_wisata`
--
ALTER TABLE `lokasi_wisata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kecamatan_id` (`kecamatan_id`,`kelurahan_id`),
  ADD KEY `kelurahan_id` (`kelurahan_id`),
  ADD KEY `desa_id` (`desa_id`);

--
-- Indexes for table `lokasi_wisata_sub_kriteria`
--
ALTER TABLE `lokasi_wisata_sub_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_id` (`lokasi_wisata_id`,`sub_kriteria_id`),
  ADD KEY `sub_kriteria_id` (`sub_kriteria_id`),
  ADD KEY `kriteria_id` (`kriteria_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `desa`
--
ALTER TABLE `desa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kecamatan_kelurahan`
--
ALTER TABLE `kecamatan_kelurahan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kelurahan_desa`
--
ALTER TABLE `kelurahan_desa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `kriteria_sub_kriteria`
--
ALTER TABLE `kriteria_sub_kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `lokasi_wisata`
--
ALTER TABLE `lokasi_wisata`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=499;

--
-- AUTO_INCREMENT for table `lokasi_wisata_sub_kriteria`
--
ALTER TABLE `lokasi_wisata_sub_kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1931;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kecamatan_kelurahan`
--
ALTER TABLE `kecamatan_kelurahan`
  ADD CONSTRAINT `kecamatan_kelurahan_ibfk_1` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kecamatan_kelurahan_ibfk_2` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelurahan_desa`
--
ALTER TABLE `kelurahan_desa`
  ADD CONSTRAINT `kelurahan_desa_ibfk_1` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kelurahan_desa_ibfk_2` FOREIGN KEY (`desa_id`) REFERENCES `desa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kriteria_sub_kriteria`
--
ALTER TABLE `kriteria_sub_kriteria`
  ADD CONSTRAINT `kriteria_sub_kriteria_ibfk_1` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kriteria_sub_kriteria_ibfk_2` FOREIGN KEY (`sub_kriteria_id`) REFERENCES `sub_kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lokasi_wisata`
--
ALTER TABLE `lokasi_wisata`
  ADD CONSTRAINT `lokasi_wisata_ibfk_5` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `lokasi_wisata_ibfk_6` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `lokasi_wisata_ibfk_7` FOREIGN KEY (`desa_id`) REFERENCES `desa` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `lokasi_wisata_sub_kriteria`
--
ALTER TABLE `lokasi_wisata_sub_kriteria`
  ADD CONSTRAINT `lokasi_wisata_sub_kriteria_ibfk_1` FOREIGN KEY (`lokasi_wisata_id`) REFERENCES `lokasi_wisata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lokasi_wisata_sub_kriteria_ibfk_2` FOREIGN KEY (`sub_kriteria_id`) REFERENCES `sub_kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lokasi_wisata_sub_kriteria_ibfk_3` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
