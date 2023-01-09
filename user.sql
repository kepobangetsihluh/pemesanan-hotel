-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Des 2021 pada 03.15
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cat`
--

CREATE TABLE `cat` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cat`
--

INSERT INTO `cat` (`id`, `name`, `code`) VALUES
(1, 'Standar', 'Standar'),
(2, 'Deluxe', 'Deluxe'),
(3, 'Family', 'Family');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `booking_id` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tipe` enum('Standar','Deluxe','Family') NOT NULL,
  `date` date NOT NULL,
  `durasi` double NOT NULL,
  `sarapan` enum('Ya','Tidak') NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `booking_id`, `name`, `gender`, `nik`, `tipe`, `date`, `durasi`, `sarapan`, `total`) VALUES
(1, '157260', 'Muhammad Fikri Arzyah', 'Laki-laki', '3201272602030123', 'Deluxe', '2021-12-16', 3, 'Ya', 2105000),
(2, '446207', 'Muzdalifah', 'Perempuan', '3211231202980001', 'Standar', '2021-12-12', 2, 'Tidak', 1000000),
(3, '419390', 'Umi Isnaini', 'Perempuan', '3201111212880324', 'Family', '2021-12-11', 4, 'Ya', 3680000),
(4, '797541', 'Juliari Bagus', 'Laki-laki', '2201131205880021', 'Deluxe', '2021-12-11', 1, 'Tidak', 750000),
(5, '105175', 'Taheyung', 'Laki-laki', '1234567891234567', 'Family', '2021-12-13', 2, 'Tidak', 2000000),
(6, '674549', 'Ririn Kurnia Sari', 'Perempuan', '9821438765123455', 'Standar', '2021-12-15', 4, 'Tidak', 1800000),
(7, '835688', 'MEGANT RATI', 'Perempuan', '1234567898765432', 'Family', '2021-12-16', 4, 'Ya', 3680000),
(8, '512617', 'Rifdan Dzul', 'Laki-laki', '2342123567842356', 'Deluxe', '2021-12-14', 1, 'Ya', 830000),
(9, '762072', 'Mutiara Khoirunnisa', 'Perempuan', '3201371907010005', 'Standar', '2021-12-13', 1, 'Tidak', 500000),
(10, '992635', 'FIKI', 'Laki-laki', '3201372602020009', 'Deluxe', '2021-12-11', 4, 'Ya', 2780000),
(11, '464633', 'TUTI', 'Perempuan', '3201372602020008', 'Deluxe', '2021-12-12', 3, 'Ya', 2105000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `gambar` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `services`
--

INSERT INTO `services` (`id`, `code`, `price`, `gambar`) VALUES
(1, 'Standar', 500000, '/app/images/kamar1.jpg'),
(2, 'Deluxe', 750000, '/app/images/kamar2.jpg'),
(3, 'Family', 1000000, '/app/images/kamar3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cat`
--
ALTER TABLE `cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
