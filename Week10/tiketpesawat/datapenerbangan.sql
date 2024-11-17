-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2024 at 08:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datapenerbangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `infopemesan`
--

CREATE TABLE `infopemesan` (
  `nama` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `penerbangan` varchar(30) NOT NULL,
  `waktu` varchar(6) NOT NULL,
  `bandara_asal` varchar(20) NOT NULL,
  `bandara_tujuan` varchar(20) NOT NULL,
  `maskapai` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah_kursi` int(11) NOT NULL,
  `nomor_kursi` int(20) NOT NULL,
  `tambahan` text NOT NULL,
  `pin` varchar(10) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `infopemesan`
--

INSERT INTO `infopemesan` (`nama`, `gender`, `penerbangan`, `waktu`, `bandara_asal`, `bandara_tujuan`, `maskapai`, `harga`, `jumlah_kursi`, `nomor_kursi`, `tambahan`, `pin`, `id`) VALUES
('Test', 'Laki-laki', 'Domestik', 'Siang', 'Surabaya', 'Manila', 'Air Asia', 500000, 1, 2, 'test', '123456', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `infopemesan`
--
ALTER TABLE `infopemesan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `infopemesan`
--
ALTER TABLE `infopemesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
