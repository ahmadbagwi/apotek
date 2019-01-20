-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 18, 2019 at 04:44 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangMasuk`
--

CREATE TABLE `barangMasuk` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `idUser` int(4) DEFAULT NULL COMMENT 'fk from user',
  `namaSuplier` varchar(25) DEFAULT NULL COMMENT 'fk from supplier',
  `idProduk` int(6) UNSIGNED ZEROFILL DEFAULT NULL,
  `tanggal` timestamp(3) NULL DEFAULT NULL,
  `jumlah` int(4) DEFAULT NULL,
  `modal` int(10) DEFAULT NULL COMMENT 'price buy from supplier'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(6) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `idUser` int(6) UNSIGNED ZEROFILL DEFAULT NULL,
  `tanggal` datetime(3) DEFAULT NULL,
  `jumlahModal` int(10) DEFAULT NULL,
  `jumlahJual` int(10) DEFAULT NULL,
  `bayar` int(10) DEFAULT NULL,
  `kembali` int(10) DEFAULT NULL,
  `profit` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `kode`, `idUser`, `tanggal`, `jumlahModal`, `jumlahJual`, `bayar`, `kembali`, `profit`) VALUES
(1, 'trx_20190118160529', NULL, '2019-01-18 16:05:29.000', 31000, 40000, 50000, 10000, 9000),
(2, 'trx_20190118161150', NULL, '2019-01-18 16:11:50.000', 100000, 130000, 130000, 0, 30000),
(3, 'trx_20190118161507', NULL, '2019-01-18 16:15:07.000', 43000, 60000, 65000, 5000, 17000);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `kode` varchar(20) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `jenis` varchar(15) DEFAULT 'umum',
  `idUser` int(4) UNSIGNED DEFAULT NULL,
  `pelanggan` varchar(15) DEFAULT 'umum',
  `idProduk` int(6) UNSIGNED ZEROFILL DEFAULT NULL,
  `modal` int(10) DEFAULT NULL,
  `jual` int(10) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `kode`, `tanggal`, `jenis`, `idUser`, `pelanggan`, `idProduk`, `modal`, `jual`, `jumlah`, `total`) VALUES
(000001, 'trx_20190118160529', '2019-01-18 16:05:29', 'umum', NULL, 'umum', 100008, 8000, 10000, 2, 20000),
(000002, 'trx_20190118160529', '2019-01-18 16:05:29', 'umum', NULL, 'umum', 100006, 15000, 20000, 1, 20000),
(000003, 'trx_20190118161150', '2019-01-18 16:11:50', 'umum', 4, 'umum', 100004, 20000, 30000, 1, 30000),
(000004, 'trx_20190118161150', '2019-01-18 16:11:50', 'umum', 4, 'umum', 100001, 8000, 10000, 10, 100000),
(000005, 'trx_20190118161507', '2019-01-18 16:15:07', 'umum', 4, 'umum', 100002, 15000, 20000, 1, 20000),
(000006, 'trx_20190118161507', '2019-01-18 16:15:07', 'umum', 4, 'umum', 100004, 20000, 30000, 1, 30000),
(000007, 'trx_20190118161507', '2019-01-18 16:15:07', 'umum', 4, 'umum', 100001, 8000, 10000, 1, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `kategori` varchar(45) DEFAULT NULL,
  `deskripsi` varchar(45) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `modal` int(10) DEFAULT NULL,
  `jual` int(10) DEFAULT NULL,
  `dibuat` timestamp(3) NULL DEFAULT CURRENT_TIMESTAMP(3)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id`, `nama`, `kategori`, `deskripsi`, `stok`, `modal`, `jual`, `dibuat`) VALUES
(100001, 'Vitamin C', 'vitamin', 'untuk sariawan ', 5, 8000, 10000, '2019-01-08 19:10:09.134'),
(100002, 'Dancow', 'susu anak', 'susu untuk dibawah 1 tahun', 5, 15000, 20000, '2019-01-08 19:07:05.173'),
(100003, 'Betadin', 'obat luar', 'untuk luka berdarah', 5, 8000, 10000, '2019-01-08 19:06:06.149'),
(100004, 'Perban', 'Obat luar', 'untuk menutup luka', 5, 20000, 30000, '2019-01-09 17:00:00.000'),
(100005, 'Minyak Kayu Putih', 'Obat luar', 'obat masuk angin', 8, 5500, 7500, '2019-01-16 19:04:17.000'),
(100006, 'Vitamin A', 'obat', 'vitamin', 20, 15000, 20000, '2019-01-18 07:59:18.000'),
(100007, 'Minyak Telon', 'minyak', 'minyak', 20, 10000, 15000, '2019-01-18 07:59:18.000'),
(100008, 'Paracetamol', 'obat', 'obat', 10, 8000, 10000, '2019-01-18 09:03:18.000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `is_confirmed` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `level` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `avatar`, `created_at`, `updated_at`, `is_admin`, `is_confirmed`, `is_deleted`, `full_name`, `phone`, `address`, `level`) VALUES
(004, 'ahmadbagwi', 'ahmadbagwi.id@gmail.com', '$2y$10$3VnPa9q7bIL9LFRtgXje8OYskLv18LXg0FeBRqTyZG0UCwRDf/kNK', '', '2019-01-01 12:00:28', NULL, 0, 0, 0, NULL, NULL, NULL, NULL),
(007, 'admin1', 'admin1@gmail.com', '$2y$10$22Igtl2hmj6mIjRKVizG7uFdwxWGs1Ueb4BhLwYFyfPTZGJkBGT7y', '', '2019-01-18 14:01:00', NULL, 0, 0, 0, 'Admin 1', '085719191852', 'Bogor', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangMasuk`
--
ALTER TABLE `barangMasuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProduk` (`idProduk`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `timestamp` (`timestamp`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `idProduk` (`idProduk`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangMasuk`
--
ALTER TABLE `barangMasuk`
  MODIFY `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100009;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangMasuk`
--
ALTER TABLE `barangMasuk`
  ADD CONSTRAINT `barangMasuk_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `barangMasuk_ibfk_2` FOREIGN KEY (`idProduk`) REFERENCES `stok` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`idProduk`) REFERENCES `stok` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
