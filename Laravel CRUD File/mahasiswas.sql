-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 28, 2024 at 06:59 PM
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
-- Database: `datamahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `id_fakultas` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mahasiswas`
--

INSERT INTO `mahasiswas` (`id`, `nim`, `nama`, `prodi`, `alamat`, `foto`, `id_fakultas`, `created_at`, `updated_at`) VALUES
(1, '1201240011', 'Vernoon', 'Informatika', 'Jakarta Utara', 'uploads/UHtCUsTFH3LM3TujnlXUCLENaghLhofPKUP595FX.jpg', 1, '2024-11-28 10:17:57', '2024-11-28 10:18:17'),
(2, '1201240001', 'Mingyu', 'Sains Data', 'Kalimantan Timur', 'uploads/EMXo1GfPXgEBRZzejhXKeVuCJa96NUqU3b8NenBu.jpg', 1, '2024-11-28 10:17:57', '2024-11-28 10:45:07'),
(3, '1201240022', 'Pharita', 'Teknik Elektro', 'Sulawesi Selatan', 'uploads/q6hxL4XFn7pmELpCb46BNLnG1vCk7OiBlIQpA1ku.jpg', 2, '2024-11-28 10:44:28', '2024-11-28 10:44:28'),
(4, '1201240028', 'Scoups', 'Bisnis Digital', 'Yogyakarta', 'uploads/stFRCyVVdVmaRWtNjaQtKTRpW4DegbGX5kcJsYGu.jpg', 3, '2024-11-28 10:46:04', '2024-11-28 10:47:13'),
(5, '1201240044', 'Ahyeon', 'Teknik Komputer', 'Tangerang', 'uploads/l6oOwhb43eCh3icRm69pQe9SgvwLVLbVp6X5Zplm.jpg', 2, '2024-11-28 10:48:14', '2024-11-28 10:48:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswas_id_fakultas_foreign` (`id_fakultas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD CONSTRAINT `mahasiswas_id_fakultas_foreign` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
