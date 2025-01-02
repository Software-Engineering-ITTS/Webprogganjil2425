-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 02, 2025 at 10:51 AM
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
-- Database: `jadwal_presensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `nama`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin', '2024-12-25 11:48:21', '2024-12-25 11:48:21');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kerjas`
--

CREATE TABLE `jadwal_kerjas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `shift` varchar(255) NOT NULL,
  `id_karyawan` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_kerjas`
--

INSERT INTO `jadwal_kerjas` (`id`, `tanggal`, `shift`, `id_karyawan`, `created_at`, `updated_at`) VALUES
(1, '2024-12-26', 'Malam (15:00 - 23:00)', 1, '2024-12-25 09:06:23', '2024-12-25 11:46:25'),
(2, '2024-12-30', 'Pagi (07:00 - 15:00)', 4, '2024-12-25 09:16:25', '2024-12-27 19:36:25'),
(4, '2024-12-31', 'Malam (15:00 - 23:00)', 1, '2024-12-25 09:19:48', '2024-12-27 21:45:19'),
(7, '2024-12-29', 'Pagi (07:00 - 15:00)', 1, '2024-12-25 09:19:48', '2024-12-27 21:44:29'),
(8, '2024-12-30', 'Malam (15:00 - 23:00)', 1, '2024-12-25 09:19:48', '2024-12-27 21:44:19'),
(9, '2002-05-29', 'Pagi (07:00 - 15:00)', 2, '2024-12-25 09:19:48', '2024-12-25 09:19:48'),
(10, '2024-12-27', 'Pagi (07:00 - 15:00)', 2, '2024-12-25 09:19:48', '2024-12-25 11:39:23'),
(11, '2024-12-26', 'Malam (15:00 - 23:00)', 2, '2024-12-25 09:19:48', '2024-12-25 11:39:10'),
(12, '2024-12-28', 'Malam (15:00 - 23:00)', 2, '2024-12-25 09:19:48', '2024-12-25 11:39:57'),
(13, '1992-09-02', 'Malam (15:00 - 23:00)', 2, '2024-12-25 09:19:48', '2024-12-25 09:19:48'),
(14, '1995-03-28', 'Pagi (07:00 - 15:00)', 5, '2024-12-25 09:19:48', '2024-12-25 09:19:48'),
(15, '2024-12-29', 'Malam (15:00 - 23:00)', 4, '2024-12-25 09:19:48', '2024-12-25 23:29:08'),
(16, '2025-01-01', 'Malam (15:00 - 23:00)', 6, '2024-12-25 09:19:48', '2024-12-27 21:21:31'),
(17, '1985-02-14', 'Pagi (07:00 - 15:00)', 6, '2024-12-25 09:19:48', '2024-12-25 09:19:48'),
(18, '2011-05-18', 'Malam (15:00 - 23:00)', 5, '2024-12-25 09:19:48', '2024-12-25 09:19:48'),
(20, '2016-01-26', 'Pagi (07:00 - 15:00)', 5, '2024-12-25 09:19:48', '2024-12-25 09:19:48'),
(21, '2025-01-05', 'Malam (15:00 - 23:00)', 4, '2024-12-25 09:19:48', '2024-12-27 19:36:41'),
(22, '2024-12-28', 'Pagi (07:00 - 15:00)', 4, '2024-12-25 09:19:48', '2024-12-25 23:28:53'),
(23, '2025-01-02', 'Pagi (07:00 - 15:00)', 4, '2024-12-25 09:19:48', '2024-12-28 08:02:36'),
(24, '1995-03-24', 'Malam (15:00 - 23:00)', 6, '2024-12-25 09:19:48', '2024-12-25 09:19:48'),
(25, '2020-08-20', 'Pagi (07:00 - 15:00)', 5, '2024-12-25 09:19:48', '2024-12-25 09:19:48'),
(26, '2013-09-05', 'Malam (15:00 - 23:00)', 5, '2024-12-25 09:19:48', '2024-12-25 09:19:48'),
(27, '2023-04-14', 'Malam (15:00 - 23:00)', 5, '2024-12-25 09:19:48', '2024-12-25 09:19:48'),
(28, '2024-12-27', 'Malam (15:00 - 23:00)', 4, '2024-12-25 09:19:48', '2024-12-25 23:28:28'),
(29, '2024-12-26', 'Malam (15:00 - 23:00)', 4, '2024-12-26 00:02:18', '2024-12-26 00:02:18'),
(30, '2024-12-26', 'Pagi (07:00 - 15:00)', 4, '2024-12-26 00:02:33', '2024-12-26 00:02:33'),
(31, '2024-12-31', 'Pagi (07:00 - 15:00)', 1, '2024-12-27 19:45:44', '2024-12-27 19:45:44'),
(32, '2024-12-31', 'Malam (15:00 - 23:00)', 2, '2024-12-27 19:46:17', '2024-12-27 21:35:11'),
(33, '2024-12-31', 'Pagi (07:00 - 15:00)', 6, '2024-12-27 19:46:41', '2024-12-27 21:26:15'),
(36, '2025-01-02', 'Pagi (07:00 - 15:00)', 6, '2024-12-27 21:13:46', '2024-12-27 21:26:30'),
(37, '2024-12-01', 'Malam (15:00 - 23:00)', 6, '2024-12-27 21:17:07', '2024-12-27 21:17:07'),
(41, '2024-12-31', 'Pagi (07:00 - 15:00)', 2, '2024-12-27 21:35:31', '2024-12-27 21:35:31'),
(42, '2025-01-02', 'Pagi (07:00 - 15:00)', 1, '2025-01-01 22:45:48', '2025-01-01 22:45:48'),
(43, '2025-01-03', 'Malam (15:00 - 23:00)', 1, '2025-01-01 22:46:12', '2025-01-01 22:46:12'),
(44, '2025-01-02', 'Malam (15:00 - 23:00)', 2, '2025-01-01 22:46:38', '2025-01-01 22:46:38'),
(45, '2025-01-03', 'Pagi (07:00 - 15:00)', 2, '2025-01-01 22:46:46', '2025-01-01 22:46:46'),
(46, '2025-01-03', 'Malam (15:00 - 23:00)', 4, '2025-01-01 22:47:29', '2025-01-01 22:47:29'),
(47, '2025-01-02', 'Malam (15:00 - 23:00)', 5, '2025-01-01 22:47:51', '2025-01-01 22:47:51'),
(48, '2025-01-09', 'Pagi (07:00 - 15:00)', 5, '2025-01-01 22:48:34', '2025-01-01 22:48:34'),
(49, '2025-01-03', 'Pagi (07:00 - 15:00)', 5, '2025-01-01 22:48:44', '2025-01-01 22:48:44'),
(50, '2025-01-03', 'Malam (15:00 - 23:00)', 6, '2025-01-02 00:27:03', '2025-01-02 00:27:13'),
(51, '2025-01-07', 'Pagi (07:00 - 15:00)', 6, '2025-01-02 00:27:26', '2025-01-02 00:27:26'),
(52, '2025-01-07', 'Malam (15:00 - 23:00)', 1, '2025-01-02 00:27:42', '2025-01-02 00:27:42');

-- --------------------------------------------------------

--
-- Table structure for table `karyawans`
--

CREATE TABLE `karyawans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `divisi` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyawans`
--

INSERT INTO `karyawans` (`id`, `nama`, `nip`, `jabatan`, `divisi`, `alamat`, `no_telp`, `email`, `password`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Pharita', '12309', 'Staff', 'Pemasaran', 'Jetis Kulon, Ketintang, Surabaya', '0897654325', 'pharita@gmail', 'pharita', 'uploads/OnMaCNhv2JchPe8wVQcTLQB4rHa1KZDg0Nthe2lf.jpg', '2024-12-25 06:52:52', '2024-12-25 07:38:07'),
(2, 'Mingyu', '56757', 'Manager', 'Logistik', 'Karah, Jambangan', '089765432134', 'mingyu@gmail', 'mingyu', 'uploads/MqOpPG4VkzqDjtPUknQEJZRqyCnuZnMjh6CbBezz.jpg', '2024-12-25 06:54:02', '2024-12-25 06:54:02'),
(4, 'Rami', '5356', 'Manager', 'Produksi', 'Sidoarjo', '087654321231', 'rami@gmail', 'rami', 'uploads/esyEXbV9HuTY7urVAVIyrfUJNxopjSSoJyiSoV1U.jpg', '2024-12-25 07:34:04', '2024-12-25 07:34:04'),
(5, 'Scoups', '7578', 'Staff', 'Produksi', 'Waru, Sidoarjo', '087698766543', 'scoups@gmail', 'scoups', 'uploads/sLGcDbeNbWvgd836YOaY5mXs0kq7wD0OYYC2BiSf.jpg', '2024-12-25 07:35:03', '2024-12-25 07:36:08'),
(6, 'Vernon', '707868', 'Staff', 'Logistik', 'Darmo, Surabay', '089432134455', 'vernon@gmail', 'vernon', 'uploads/8NThqnyhRRLp6LcymdR8O868VAn4ZKnVbIuRZR0Q.jpg', '2024-12-25 07:37:31', '2024-12-25 07:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_12_17_145339_create_admins_table', 1),
(6, '2024_12_17_145408_create_karyawans_table', 1),
(7, '2024_12_17_145500_create_jadwal_kerjas_table', 1),
(8, '2024_12_17_145512_create_pindah_shifts_table', 1),
(9, '2024_12_17_145534_create_presensis_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pindah_shifts`
--

CREATE TABLE `pindah_shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_awal` date NOT NULL,
  `shift_awal` varchar(255) NOT NULL,
  `tanggal_pindah` date NOT NULL,
  `shift_pindah` varchar(255) NOT NULL,
  `alasan` text NOT NULL,
  `status_pengajuan` enum('Pending','Disetujui','Ditolak') DEFAULT 'Pending',
  `tanggal_pengajuan` date NOT NULL,
  `tanggal_proses` date DEFAULT NULL,
  `id_karyawan` bigint(20) UNSIGNED NOT NULL,
  `id_jadwal_kerja` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pindah_shifts`
--

INSERT INTO `pindah_shifts` (`id`, `tanggal_awal`, `shift_awal`, `tanggal_pindah`, `shift_pindah`, `alasan`, `status_pengajuan`, `tanggal_pengajuan`, `tanggal_proses`, `id_karyawan`, `id_jadwal_kerja`, `created_at`, `updated_at`) VALUES
(1, '2024-12-30', 'Pagi (07:00 - 15:00)', '2024-12-30', 'Malam (15:00 - 23:00)', 'Pagi hari ada acara keluarga', 'Ditolak', '2024-12-26', '2024-12-28', 4, 2, '2024-12-26 00:57:25', '2024-12-27 19:36:25'),
(8, '2025-01-04', 'Pagi (07:00 - 15:00)', '2025-01-05', 'Malam (15:00 - 23:00)', 'Tanggal 4 saya akan izin ada kegiatan volunteer', 'Disetujui', '2024-12-26', '2024-12-28', 4, 21, '2024-12-26 03:41:12', '2024-12-27 19:36:41'),
(9, '2025-01-02', 'Malam (15:00 - 23:00)', '2025-01-02', 'Pagi (07:00 - 15:00)', 'Malam hari saya ada acara keluarga', 'Disetujui', '2024-12-28', '2024-12-28', 4, 23, '2024-12-28 08:02:04', '2024-12-28 08:02:36');

-- --------------------------------------------------------

--
-- Table structure for table `presensis`
--

CREATE TABLE `presensis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  `status_waktu` enum('Terlambat','Tepat Waktu','Tidak Ada') DEFAULT NULL,
  `status_hadir` enum('Hadir','Izin','Sakit') NOT NULL,
  `id_karyawan` bigint(20) UNSIGNED NOT NULL,
  `id_jadwal_kerja` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presensis`
--

INSERT INTO `presensis` (`id`, `tanggal`, `jam_masuk`, `jam_keluar`, `status_waktu`, `status_hadir`, `id_karyawan`, `id_jadwal_kerja`, `created_at`, `updated_at`) VALUES
(1, '2024-12-26', '14:35:00', '17:37:00', 'Tepat Waktu', 'Hadir', 4, 29, '2024-12-26 06:24:09', '2024-12-27 10:37:33'),
(9, '2024-12-29', '00:00:00', '00:00:00', 'Tidak Ada', 'Izin', 4, 15, '2024-12-27 10:46:16', '2024-12-27 10:46:16'),
(17, '2024-12-28', '01:35:00', '18:36:00', 'Tepat Waktu', 'Hadir', 4, 22, '2024-12-27 11:35:57', '2024-12-27 11:36:08'),
(19, '2024-12-28', '12:32:00', '12:37:00', 'Tepat Waktu', 'Hadir', 2, 12, '2024-12-27 22:32:43', '2024-12-27 22:37:37'),
(20, '2025-01-02', '16:49:00', NULL, 'Terlambat', 'Hadir', 4, 23, '2025-01-02 02:49:20', '2025-01-02 02:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwal_kerjas`
--
ALTER TABLE `jadwal_kerjas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_kerjas_id_karyawan_foreign` (`id_karyawan`);

--
-- Indexes for table `karyawans`
--
ALTER TABLE `karyawans`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `pindah_shifts`
--
ALTER TABLE `pindah_shifts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pindah_shifts_id_karyawan_foreign` (`id_karyawan`),
  ADD KEY `pindah_shifts_id_jadwal_kerja_foreign` (`id_jadwal_kerja`);

--
-- Indexes for table `presensis`
--
ALTER TABLE `presensis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `presensis_id_karyawan_foreign` (`id_karyawan`),
  ADD KEY `presensis_id_jadwal_kerja_foreign` (`id_jadwal_kerja`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal_kerjas`
--
ALTER TABLE `jadwal_kerjas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `karyawans`
--
ALTER TABLE `karyawans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pindah_shifts`
--
ALTER TABLE `pindah_shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `presensis`
--
ALTER TABLE `presensis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal_kerjas`
--
ALTER TABLE `jadwal_kerjas`
  ADD CONSTRAINT `jadwal_kerjas_id_karyawan_foreign` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pindah_shifts`
--
ALTER TABLE `pindah_shifts`
  ADD CONSTRAINT `pindah_shifts_id_jadwal_kerja_foreign` FOREIGN KEY (`id_jadwal_kerja`) REFERENCES `jadwal_kerjas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pindah_shifts_id_karyawan_foreign` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `presensis`
--
ALTER TABLE `presensis`
  ADD CONSTRAINT `presensis_id_jadwal_kerja_foreign` FOREIGN KEY (`id_jadwal_kerja`) REFERENCES `jadwal_kerjas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `presensis_id_karyawan_foreign` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawans` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
