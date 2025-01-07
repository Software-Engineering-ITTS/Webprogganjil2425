-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2024 at 01:34 PM
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
-- Database: `tokobuku`
--

-- --------------------------------------------------------

--
-- Table structure for table `bukus`
--

CREATE TABLE `bukus` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `stok` int NOT NULL,
  `sampul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bukus`
--

INSERT INTO `bukus` (`id`, `judul`, `penulis`, `genre`, `harga`, `stok`, `sampul`, `created_at`, `updated_at`) VALUES
(1, 'Belajar Laravel untuk Pemula', 'John Doe', 'Teknologi', 150000, 10, 'uploads/sampul/default.jpg', NULL, NULL),
(2, 'Pemrograman Web dengan PHP', 'Jane Doe', 'Teknologi', 120000, 15, 'uploads/sampul/default.jpg', NULL, NULL),
(3, 'Mengenal JavaScript untuk Pemula', 'Rudi Hidayat', 'Teknologi', 100000, 5, 'uploads/sampul/default.jpg', NULL, NULL),
(4, 'Desain UX/UI untuk Pemula', 'Andi Setiawan', 'Desain', 200000, 8, 'uploads/sampul/default.jpg', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukus`
--
ALTER TABLE `bukus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bukus`
--
ALTER TABLE `bukus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
