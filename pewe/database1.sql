-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Okt 2024 pada 04.14
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
-- Database: `database1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `no_telpon` varchar(20) NOT NULL,
  `email1` varchar(255) NOT NULL,
  `unesa` varchar(10) NOT NULL,
  `non_unesa` varchar(10) NOT NULL,
  `pembayaran` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `gender`, `nama_lengkap`, `no_telpon`, `email1`, `unesa`, `non_unesa`, `pembayaran`, `created_at`) VALUES
(23, 'Pria', 'ojan al faaqih', '87777', 'ojanfaaqih@gmail.com', '1', '1', 'cash', '2024-10-09 19:11:51'),
(24, 'Pria', 'fauzan faaqih', '0877777', 'fauzan12faaqih@gmail.com', '1', '0', 'cash', '2024-10-09 19:36:56'),
(25, 'Wanita', 'areta', '0877777', 'aretal@gmail.com', '0', '1', 'cash', '2024-10-09 19:37:13'),
(26, 'Pria', 'fauzan faaqih', '0877777', 'fauzan12faaqih@gmail.com', '1', '1', 'cash', '2024-10-10 12:22:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `created_at`) VALUES
(1, 'ojan', 'fauzan', 'ojan@gmail.com', '123', '2024-10-06 22:18:08'),
(2, 'mamang', 'ardho', 'ardho@gmail.com', '123', '2024-10-06 22:21:08'),
(3, 'aul', 'areta', 'aulareta@gmail.com', '123', '2024-10-09 00:17:45');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
