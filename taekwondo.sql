-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jul 2019 pada 09.56
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taekwondo`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_atlit`
--

CREATE TABLE `tbl_atlit` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jekel` varchar(5) NOT NULL,
  `dojang` varchar(225) NOT NULL,
  `sabuk` int(11) NOT NULL,
  `bb` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_atlit`
--

INSERT INTO `tbl_atlit` (`id`, `nama`, `jekel`, `dojang`, `sabuk`, `bb`) VALUES
(8, 'Agus', 'lk', 'Kudus', 0, '76Kg'),
(9, 'Beno', 'lk', 'Kudus', 0, '76'),
(10, 'Anggita', 'pr', 'Kudus', 3, '65Kg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ikutserta`
--

CREATE TABLE `tbl_ikutserta` (
  `id` int(11) NOT NULL,
  `id_atlit` int(11) NOT NULL,
  `id_turnamen` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `jenjang` int(11) NOT NULL,
  `tingkatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ikutserta`
--

INSERT INTO `tbl_ikutserta` (`id`, `id_atlit`, `id_turnamen`, `kategori`, `jenjang`, `tingkatan`) VALUES
(1, 8, 1, 1, 0, 1),
(2, 9, 1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`username`, `password`) VALUES
('a', '0cc175b9c0f1b6a831c399e269772661');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_sertawasit`
--

CREATE TABLE `tbl_sertawasit` (
  `id` int(11) NOT NULL,
  `id_wasit` int(11) NOT NULL,
  `id_turnamen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_sertawasit`
--

INSERT INTO `tbl_sertawasit` (`id`, `id_wasit`, `id_turnamen`) VALUES
(6, 1, 7),
(7, 2, 7),
(8, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_turnamen`
--

CREATE TABLE `tbl_turnamen` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `lokasi` varchar(225) NOT NULL,
  `penyelenggara` varchar(1000) NOT NULL,
  `tanggal` date NOT NULL,
  `informasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_turnamen`
--

INSERT INTO `tbl_turnamen` (`id`, `nama`, `lokasi`, `penyelenggara`, `tanggal`, `informasi`) VALUES
(1, 'PONAS', 'Jakarta', 'PONAS', '2018-01-02', 'Ada Apa denganmu'),
(7, 'POBDA', 'Pati', 'POBDA', '2017-03-05', 'AKusa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_wasit`
--

CREATE TABLE `tbl_wasit` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ttl` varchar(200) NOT NULL,
  `jekel` varchar(5) NOT NULL,
  `asal` varchar(225) NOT NULL,
  `sabuk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_wasit`
--

INSERT INTO `tbl_wasit` (`id`, `nama`, `ttl`, `jekel`, `asal`, `sabuk`) VALUES
(1, 'Mulyanto', 'Kudus, 2 Januari 1975', 'lk', 'Semarang', 3),
(2, 'Meytania', 'Surabaya, 3  Maret 1998', 'pr', 'Bandung', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_atlit`
--
ALTER TABLE `tbl_atlit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_ikutserta`
--
ALTER TABLE `tbl_ikutserta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_atlit` (`id_atlit`),
  ADD KEY `id_turnamen` (`id_turnamen`);

--
-- Indeks untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `tbl_sertawasit`
--
ALTER TABLE `tbl_sertawasit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_wasit` (`id_wasit`),
  ADD KEY `id_turnamen` (`id_turnamen`);

--
-- Indeks untuk tabel `tbl_turnamen`
--
ALTER TABLE `tbl_turnamen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_wasit`
--
ALTER TABLE `tbl_wasit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_atlit`
--
ALTER TABLE `tbl_atlit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_ikutserta`
--
ALTER TABLE `tbl_ikutserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_sertawasit`
--
ALTER TABLE `tbl_sertawasit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_turnamen`
--
ALTER TABLE `tbl_turnamen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_wasit`
--
ALTER TABLE `tbl_wasit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_ikutserta`
--
ALTER TABLE `tbl_ikutserta`
  ADD CONSTRAINT `tbl_ikutserta_ibfk_1` FOREIGN KEY (`id_turnamen`) REFERENCES `tbl_turnamen` (`id`),
  ADD CONSTRAINT `tbl_ikutserta_ibfk_2` FOREIGN KEY (`id_atlit`) REFERENCES `tbl_atlit` (`id`);

--
-- Ketidakleluasaan untuk tabel `tbl_sertawasit`
--
ALTER TABLE `tbl_sertawasit`
  ADD CONSTRAINT `tbl_sertawasit_ibfk_1` FOREIGN KEY (`id_wasit`) REFERENCES `tbl_wasit` (`id`),
  ADD CONSTRAINT `tbl_sertawasit_ibfk_2` FOREIGN KEY (`id_turnamen`) REFERENCES `tbl_turnamen` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
