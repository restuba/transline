-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Feb 2016 pada 01.41
-- Versi Server: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtiket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bis`
--

CREATE TABLE IF NOT EXISTS `bis` (
  `trayek_kode` varchar(10) NOT NULL,
  `trayek_asal` varchar(50) NOT NULL,
  `trayek_tujuan` varchar(50) NOT NULL,
  `jam` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bis`
--

INSERT INTO `bis` (`trayek_kode`, `trayek_asal`, `trayek_tujuan`, `jam`, `harga`) VALUES
('B-01', 'Bandung', 'Semarang', '04.00', '75000'),
('B-02', 'Bandung', 'Jakarta', '04.00', '75000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi`
--

CREATE TABLE IF NOT EXISTS `konfirmasi` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `pengirim` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfirmasi`
--

INSERT INTO `konfirmasi` (`id`, `kode_transaksi`, `jumlah`, `pengirim`) VALUES
(1, '1455802045B-01 ', '1', 'wad'),
(2, '1455803231B-01 ', '1', 'pengirim'),
(3, '1455984754B-01 ', '2', 'pengirim ie'),
(4, '1455985120B-01', '45', 'pengirim ie'),
(5, '1455985200B-02', '21312321321121313', 'awd'),
(6, '1456017112B-02 ', 'akeh', 'bapake'),
(7, '1456304898B-01 ', '1', '123'),
(8, '1456353996B-02', '', 'restu bayu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `trayek_kode` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `waktupesan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `kursi` varchar(10) NOT NULL,
  `konfirmasi` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `kode_transaksi`, `trayek_kode`, `tanggal`, `waktupesan`, `nama`, `alamat`, `nohp`, `email`, `kursi`, `konfirmasi`) VALUES
(1, '1455802045B-01', 'B-01', '2016-02-18', '2016-02-18 13:27:48', 'wad', 'awdwad', 'awd', 'awdd@2awfwfa', '3D', 1),
(2, '1455803231B-01', 'B-01', '2016-02-18', '2016-02-18 13:47:39', 'nama', 'alamt', 'no', 'email@gmai', '3D', 1),
(18, '1456353996B-02', 'B-02', '2016-02-24', '2016-02-24 23:52:29', 'restu bayu', 'Jl. Tambaksogra RT 01/RW 05 Kecamatan Sumbang ', '08979022122', 'resbayuaji@gmail.com', '1A', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bis`
--
ALTER TABLE `bis`
  ADD PRIMARY KEY (`trayek_kode`),
  ADD UNIQUE KEY `trayek_kode` (`trayek_kode`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
