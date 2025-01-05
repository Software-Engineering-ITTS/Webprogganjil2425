-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jan 2025 pada 07.06
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academicsystem`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `logmatkul`
--

CREATE TABLE `logmatkul` (
  `id` int(11) NOT NULL,
  `idPembelajar` int(11) NOT NULL,
  `idMatkul` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `logmatkul`
--

INSERT INTO `logmatkul` (`id`, `idPembelajar`, `idMatkul`) VALUES
(1, 1, 3),
(2, 1, 3),
(3, 1, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

CREATE TABLE `matkul` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `idPengajar` int(11) DEFAULT 1,
  `status` enum('active','nonactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`id`, `name`, `description`, `idPengajar`, `status`) VALUES
(1, '', NULL, 1, 'nonactive'),
(3, 'tes f', 'Mata kuliah ini mi mobile.', 1, 'active'),
(4, 'Pemrograman Web', 'Mata kuliah ini membahas tentang pengembangan aplikasi web.', 1, 'active'),
(5, 'edit', 'edit ril', 1, 'nonactive'),
(6, 'hakim', '123', 1, 'nonactive'),
(7, 'hakim', 'hakim123\n', 1, 'nonactive'),
(8, 'edit sebelum demo', 'desk edit sebelum demo\n', 1, 'active'),
(9, 'tes sebelum demo ', 'desk tes sebelum demo ', 1, 'active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelajar`
--

CREATE TABLE `pembelajar` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `prodi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembelajar`
--

INSERT INTO `pembelajar` (`id`, `name`, `email`, `pass`, `prodi`) VALUES
(1, 'ayam', 'ayam@gmail.com', '123', 'Software Engineer'),
(2, 'p', 'pp@gmail.com', '123', 'Data Sains'),
(3, 'oit', 'p@gmail.com', '123', 'Software Engineer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajar`
--

CREATE TABLE `pengajar` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengajar`
--

INSERT INTO `pengajar` (`id`, `name`, `email`, `pass`) VALUES
(1, 'tes', 'tes@gmail.com', 'pass123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `logmatkul`
--
ALTER TABLE `logmatkul`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPembelajar` (`idPembelajar`),
  ADD KEY `idMatkul` (`idMatkul`);

--
-- Indeks untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPengajar` (`idPengajar`);

--
-- Indeks untuk tabel `pembelajar`
--
ALTER TABLE `pembelajar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `logmatkul`
--
ALTER TABLE `logmatkul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `matkul`
--
ALTER TABLE `matkul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pembelajar`
--
ALTER TABLE `pembelajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `logmatkul`
--
ALTER TABLE `logmatkul`
  ADD CONSTRAINT `logmatkul_ibfk_1` FOREIGN KEY (`idPembelajar`) REFERENCES `pembelajar` (`id`),
  ADD CONSTRAINT `logmatkul_ibfk_2` FOREIGN KEY (`idMatkul`) REFERENCES `matkul` (`id`);

--
-- Ketidakleluasaan untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD CONSTRAINT `matkul_ibfk_1` FOREIGN KEY (`idPengajar`) REFERENCES `pengajar` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
