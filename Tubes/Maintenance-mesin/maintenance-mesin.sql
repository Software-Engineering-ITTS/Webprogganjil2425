-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 02, 2025 at 09:18 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maintenance-mesin`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `jadwal_id` bigint UNSIGNED NOT NULL,
  `mesin_id` bigint UNSIGNED NOT NULL,
  `maintenance_date` date NOT NULL,
  `status` enum('Pending','In Progress','Completed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`jadwal_id`, `mesin_id`, `maintenance_date`, `status`, `created_at`, `updated_at`) VALUES
(27, 1, '2024-12-31', 'In Progress', '2024-12-28 13:50:50', '2024-12-28 13:50:50'),
(28, 2, '2024-12-30', 'In Progress', '2024-12-28 13:51:09', '2024-12-28 13:51:09'),
(29, 4, '2024-12-28', 'Completed', '2024-12-28 13:51:28', '2024-12-28 13:51:28'),
(30, 4, '2025-01-01', 'In Progress', '2024-12-28 13:51:45', '2024-12-28 13:51:45'),
(31, 5, '2025-01-02', 'Pending', '2024-12-28 13:52:09', '2024-12-28 13:52:09'),
(32, 6, '2024-12-29', 'Completed', '2024-12-28 13:52:32', '2024-12-28 13:52:32'),
(33, 1, '2025-01-03', 'Pending', '2024-12-28 13:53:28', '2024-12-28 13:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id` bigint UNSIGNED NOT NULL,
  `mesin_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `jadwal_id` bigint UNSIGNED NOT NULL,
  `status` enum('Pending','In Progress','Completed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `maintenance_date` date DEFAULT NULL,
  `deskripsi_perawatan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `mesin_id`, `user_id`, `jadwal_id`, `status`, `maintenance_date`, `deskripsi_perawatan`, `created_at`, `updated_at`) VALUES
(6, 1, 1, 32, 'Completed', '2024-12-26', 'selesai dilaksanakan maintenance', NULL, NULL),
(27, 1, 1, 27, 'In Progress', '2024-12-31', 'dalam proses sabar ya', NULL, NULL),
(28, 2, 1, 27, 'In Progress', '2024-12-30', 'sedang dalam proses', NULL, NULL),
(29, 4, 1, 29, 'Completed', '2024-12-28', 'udah nih', NULL, NULL),
(30, 5, 1, 30, 'In Progress', '2025-01-01', 'sabar ya masih maintenance', NULL, NULL),
(31, 5, 1, 31, 'Pending', '2025-01-02', 'masih pending ya', NULL, NULL),
(32, 6, 1, 32, 'Completed', '2024-12-29', 'udah nih ambil', NULL, NULL),
(33, 1, 1, 33, 'Pending', '2025-01-03', 'sabar ya blum progress', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mesin`
--

CREATE TABLE `mesin` (
  `mesin_id` bigint UNSIGNED NOT NULL,
  `no_mesin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mesin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sparepart_mesin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fungsi_mesin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mesin`
--

INSERT INTO `mesin` (`mesin_id`, `no_mesin`, `nama_mesin`, `sparepart_mesin`, `fungsi_mesin`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'MES001', 'Mesin Pembakaran', 'Busi', 'Menghasilkan tenaga melalui pembakaran', 'Mesin pembakaran yang digunakan pada mobil bensin untuk menggerakkan kendaraan.', '2024-12-26 05:23:09', '2024-12-26 22:29:30'),
(2, 'MES002', 'Mesin Diesel', 'Filter Solar', 'Membakar solar untuk menghasilkan tenaga', 'Mesin yang menggunakan bahan bakar diesel dengan efisiensi tinggi.', '2024-12-26 05:23:51', '2024-12-26 22:30:18'),
(4, 'MES003', 'Mesin Pendingin', 'Radiator', 'Mendinginkan mesin selama operasi', 'Sistem pendingin yang menjaga suhu optimal mesin.', '2024-12-26 10:04:42', '2024-12-26 22:30:53'),
(5, 'MES004', 'Mesin Hidrolik', 'Pompa Hidrolik', 'Menggerakkan alat berat melalui tekanan', 'Digunakan pada alat berat seperti ekskavator untuk menghasilkan gaya besar.', '2024-12-26 10:04:55', '2024-12-26 22:31:38'),
(6, 'MES005', 'Mesin Turbo', 'Turbocharger', 'Menambah tenaga mesin dengan tekanan udara', 'Memanfaatkan gas buang untuk meningkatkan efisiensi dan daya mesin.', '2024-12-26 10:55:03', '2024-12-26 22:32:18'),
(7, '1', 'A', 'AB', 'CCCC', 'ABABAB', '2024-12-26 22:32:42', '2024-12-26 22:32:42'),
(8, '2', 'B', 'BABABA', 'ABCD', 'BACABC', '2024-12-26 22:33:08', '2024-12-26 22:33:08'),
(9, '3', 'C', 'CACACA', 'BBBB', 'CABCAB', '2024-12-26 22:33:33', '2024-12-26 22:33:33'),
(12, '1', '1', '1', '1', '1', '2024-12-27 23:23:31', '2024-12-27 23:23:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(52, '2014_10_12_000000_create_users_table', 1),
(53, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(54, '2019_08_19_000000_create_failed_jobs_table', 1),
(55, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(56, '2024_12_23_111456_mesin', 1),
(57, '2024_12_26_130317_create_maintenance_table', 1),
(58, '2024_12_26_130347_create_jadwal_table', 1),
(59, '2024_12_27_070147_add_user_id_and_description_to_maintenance_table', 2),
(60, '2024_12_27_081644_add_status_to_jadwals_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint UNSIGNED NOT NULL,
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'fai', 'a@gmail.com', NULL, '$2y$12$BIJqb1rPttUbokR.xB.GPOmoXqX4kWvCorb176aNW3JzdSUqH.nzu', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`jadwal_id`),
  ADD KEY `jadwal_mesin_id_foreign` (`mesin_id`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maintenance_mesin_id_foreign` (`mesin_id`),
  ADD KEY `maintenance_user_id_foreign` (`user_id`),
  ADD KEY `jadwal_id` (`jadwal_id`);

--
-- Indexes for table `mesin`
--
ALTER TABLE `mesin`
  ADD PRIMARY KEY (`mesin_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `jadwal_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `mesin`
--
ALTER TABLE `mesin`
  MODIFY `mesin_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_mesin_id_foreign` FOREIGN KEY (`mesin_id`) REFERENCES `mesin` (`mesin_id`) ON DELETE CASCADE;

--
-- Constraints for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD CONSTRAINT `maintenance_ibfk_1` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`jadwal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `maintenance_mesin_id_foreign` FOREIGN KEY (`mesin_id`) REFERENCES `mesin` (`mesin_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `maintenance_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
