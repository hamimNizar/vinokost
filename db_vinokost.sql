-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2022 at 08:19 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_vinokost`
--

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `nama_kamar` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` enum('Disewa','Tersedia') NOT NULL DEFAULT 'Tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `nama_kamar`, `gambar`, `deskripsi`, `status`) VALUES
(2, 'B05', '202205060241603c48b820169f70641963ba_wp2001489.jpg', 'Kamar ini berada di lantai 2 bagian pojok kiri. Sedikit lebih luas dari kamar lainnya. Sudah termasuk kasur, almari, dan meja belajar.', 'Disewa'),
(3, 'B012', '202205060305603c4a4d695ede7eda3c675d_ezgif-2-b6f5a17527d3.jpg', 'jkgksgjfosa da soidhoiasd. bernuansa senja', 'Disewa'),
(4, 'A03', '202205220430colorful_bokeh_4k_8k-1600x900.jpg', 'Kamar ini terletak pada lantai 1. Dekat dengan kamar mandi. Dalam kamar sudah termasuk kasur, almari, meja, dan kursi. Pada pagi hari terkena sinar matahari yang cukup. depan kamar terdapat taman.', 'Disewa'),
(5, 'A09', '2022060708041_XUGioaEVJq_PTZYqwTQm9g.png', 'Kamar ini berada pada lantai 1 full facilitas', 'Disewa'),
(7, 'B043', '2022071306261.jpg', 'Berada di lantai 2. FUll perabotan', 'Disewa');

-- --------------------------------------------------------

--
-- Table structure for table `penyewaan`
--

CREATE TABLE `penyewaan` (
  `id_penyewaan` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `mulai_sewa` date NOT NULL,
  `akhir_sewa` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` enum('Pending','Diingatkan','Berjalan','Lanjut Sewa','Berhenti Sewa') NOT NULL DEFAULT 'Pending',
  `tanggal_sewa` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyewaan`
--

INSERT INTO `penyewaan` (`id_penyewaan`, `id_kamar`, `id_user`, `mulai_sewa`, `akhir_sewa`, `jumlah`, `keterangan`, `tanggal_sewa`) VALUES
(2, 2, 2, '2022-05-09', '2022-11-10', 500000, 'Diingatkan', '2022-05-16'),
(5, 3, 5, '2022-05-14', '2022-11-15', 500000, 'Lanjut Sewa', '2022-05-16'),
(13, 4, 6, '2022-06-05', '2022-12-05', 500000, 'Berjalan', '2022-06-05'),
(14, 5, 7, '2022-06-07', '2022-12-07', 500000, 'Berjalan', '2022-06-07'),
(16, 3, 5, '2022-07-09', '2022-10-09', 1500000, 'Berhenti Sewa', '2022-07-09'),
(19, 3, 4, '2022-07-10', '2022-10-10', 1500000, 'Berjalan', '2022-07-10'),
(21, 7, 9, '2022-07-13', '2022-09-20', 1500000, 'Berjalan', '2022-07-13');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(100) DEFAULT NULL,
  `id_penyewaan` int(11) NOT NULL,
  `tipe_pembayaran` varchar(100) DEFAULT NULL,
  `kode_pembayaran` varchar(100) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending',
  `tanggal_transaksi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `id_penyewaan`, `tipe_pembayaran`, `kode_pembayaran`, `jumlah`, `status`, `tanggal_transaksi`) VALUES
(6, '175c48f3-04da-4171-bab4-fde3b78d599b', 13, 'bank_transfer', NULL, 500000, 'settlement', '2022-06-05 10:59:29'),
(7, 'c1387a57-34a5-4dc1-9419-aba4f1df664c', 14, 'bank_transfer', NULL, 500000, 'settlement', '2022-06-07 15:07:26'),
(8, '6236ba2c-708c-41f5-a475-a551b68fa2e5', 16, 'bank_transfer', NULL, 1500000, 'settlement', '2022-07-09 21:41:24'),
(11, '85952190-73e8-4b19-98c4-f546dbb7f710', 19, 'bank_transfer', NULL, 1500000, 'settlement', '2022-07-10 23:36:50'),
(13, 'dbab587f-c515-423e-92b0-54175d555392', 21, 'bank_transfer', NULL, 1500000, 'pending', '2022-07-13 13:27:32');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL DEFAULT 'Aktif',
  `jenis_user` enum('Admin','Penghuni') NOT NULL DEFAULT 'Penghuni'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `alamat`, `no_telepon`, `email`, `username`, `password`, `status`, `jenis_user`) VALUES
(1, 'Vinokost Admin', 'Surabaya', '081223881891', 'admin@gmail.com', 'admin', 'admin123', 'Aktif', 'Admin'),
(2, 'hamim', 'Bojonegoro', '081334328207', 'hamim@gmail.com', 'hamim', 'hamim123', 'Aktif', 'Penghuni'),
(3, 'Aqlima', 'Malang', '081229334889', 'aqlima@gmail.com', 'aqlima', 'aqlima123', 'Tidak Aktif', 'Penghuni'),
(4, 'Rangga', 'Jakarta', '081234567899', 'acil@gmail.com', 'rangga', 'rangga123', 'Aktif', 'Penghuni'),
(5, 'Andara', 'Andara', '089098765212', 'andara@gmail.com', 'andara', 'andara123', 'Aktif', 'Penghuni'),
(6, 'Dio', 'Tulungagung', '081263789012', 'dio@gmail.com', 'dio', 'dio123', 'Aktif', 'Penghuni'),
(7, 'budi', 'Kediri', '081234567892', 'budi@gmail.com', 'budi', 'budi', 'Aktif', 'Penghuni'),
(9, 'abdul', 'Malang', '08123', 'abdul@gmail.com', 'abdul', 'abdul123', 'Aktif', 'Penghuni');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`id_penyewaan`),
  ADD KEY `id_kamar` (`id_kamar`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_penyewaan` (`id_penyewaan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penyewaan`
--
ALTER TABLE `penyewaan`
  MODIFY `id_penyewaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD CONSTRAINT `penyewaan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `penyewaan_ibfk_2` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_penyewaan`) REFERENCES `penyewaan` (`id_penyewaan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
