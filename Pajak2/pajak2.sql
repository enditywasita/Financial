-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2020 at 01:47 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pajak2`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`) VALUES
(2, 'endity', 'endity'),
(3, 'enditywa', 'endity'),
(5, 'b', 'b'),
(6, 'asd', 'asd'),
(8, 'asd', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_transaksi` varchar(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `pembayaran` varchar(20) NOT NULL,
  `kode_user` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `id_user`, `no_transaksi`, `keterangan`, `jumlah`, `pembayaran`, `kode_user`, `tanggal`) VALUES
(46, 11, '001', 'setoran modal', 150000000, 'Debit', '1101', '2019-12-27 02:08:38'),
(47, 11, '001', 'setoran modal', 150000000, 'Kredit', '3001', '2019-12-23 10:11:31'),
(48, 11, '002', 'Beli Meja + Kursi', 2400000, 'Debit', '1701', '2019-12-23 10:12:26'),
(49, 11, '002', 'Beli Meja + Kursi', 2400000, 'Kredit', '1101', '2019-12-23 10:12:26'),
(50, 11, '003', 'Setoran ke Bank', 100000000, 'Debit', '1102', '2019-12-23 10:13:01'),
(51, 11, '003', 'Setoran ke Bank', 100000000, 'Kredit', '1101', '2019-12-23 10:13:01'),
(52, 11, '004', 'pembelian Baju', 75000000, 'Debit', '5101', '2019-12-23 10:14:03'),
(53, 11, '004', 'pembelian Baju', 75000000, 'Kredit', '2101', '2019-12-23 10:14:03'),
(54, 11, '005', 'pembelian Baju', 30000000, 'Debit', '5101', '2019-12-23 10:14:59'),
(55, 11, '005', 'pembelian Baju', 30000000, 'Kredit', '1101', '2019-12-23 10:14:59'),
(56, 11, '006', 'bayar gaji', 2500000, 'Debit', '5201', '2019-12-23 10:15:46'),
(57, 11, '006', 'bayar gaji', 2500000, 'Kredit', '1101', '2019-12-23 10:15:46'),
(58, 11, '007', 'Bayar Listrik/Air/Telpon', 1000000, 'Debit', '5202', '2019-12-23 10:16:41'),
(59, 11, '007', 'Bayar Listrik/Air/Telpon', 1000000, 'Kredit', '1101', '2019-12-23 10:16:41'),
(60, 11, '008', 'Bayar BBM', 600000, 'Debit', '5203', '2019-12-23 10:17:16'),
(61, 11, '008', 'Bayar BBM', 600000, 'Kredit', '1101', '2019-12-23 10:17:16'),
(62, 11, '009', 'bayar Angkutan', 450000, 'Debit', '5204', '2019-12-23 10:17:54'),
(63, 11, '009', 'bayar Angkutan', 450000, 'Kredit', '1101', '2019-12-23 10:17:54'),
(64, 11, '010', 'Bayar LKMD', 50000, 'Debit', '5206', '2019-12-23 10:18:35'),
(65, 11, '010', 'Bayar LKMD', 50000, 'Kredit', '1101', '2019-12-23 10:18:35'),
(66, 11, '011', 'jurnal penyesuaian', 200000, 'Debit', '5205', '2019-12-23 10:19:26'),
(67, 11, '011', 'jurnal penyesuaian', 200000, 'Kredit', '1901', '2019-12-23 10:19:26'),
(68, 11, '012', 'Penjualan Ke Tuan A', 65000000, 'Debit', '1103', '2019-12-23 10:20:29'),
(69, 11, '012', 'Penjualan Ke Tuan A', 65000000, 'Kredit', '4101', '2019-12-23 10:20:29'),
(70, 11, '013', 'Penjualan Ke Tuan B', 60000000, 'Debit', '1101', '2019-12-23 10:21:05'),
(71, 11, '013', 'Penjualan Ke Tuan B', 60000000, 'Kredit', '4101', '2019-12-23 10:21:05'),
(72, 11, '014', 'Retur Pembelian', 5000000, 'Debit', '2101', '2019-12-23 10:22:21'),
(73, 11, '014', 'Retur Pembelian', 5000000, 'Kredit', '5151', '2019-12-23 10:22:21'),
(74, 11, '015', 'Retur Penjualan', 10000000, 'Debit', '4151', '2019-12-23 10:23:07'),
(75, 11, '015', 'Retur Penjualan', 10000000, 'Kredit', '1103', '2019-12-23 10:23:08'),
(76, 11, '016', 'Pendapatan dari Bank', 225000, 'Debit', '1102', '2019-12-23 10:24:07'),
(77, 11, '016', 'Pendapatan dari Bank', 225000, 'Kredit', '4201', '2019-12-23 10:24:07'),
(78, 11, '017', 'Bayar OKP', 100000, 'Debit', '5301', '2019-12-23 10:24:40'),
(79, 11, '017', 'Bayar OKP', 100000, 'Kredit', '1101', '2019-12-23 10:24:40'),
(80, 11, '018', 'jurnal penyesuaian', 10325000, 'Debit', '6000', '2019-12-23 10:57:39'),
(81, 11, '018', 'jurnal penyesuaian', 10325000, 'Kredit', '3003', '2019-12-23 10:57:39'),
(82, 11, '019', 'Untuk Keperluan Pribadi', 5000000, 'Debit', '3201', '2019-12-23 11:23:28'),
(83, 11, '019', 'Untuk Keperluan Pribadi', 5000000, 'Kredit', '1101', '2019-12-23 11:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `neraca`
--

CREATE TABLE `neraca` (
  `id` int(11) NOT NULL,
  `kode_akun` int(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_akun` varchar(50) NOT NULL,
  `saldo_awal` int(20) NOT NULL,
  `tipe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `neraca`
--

INSERT INTO `neraca` (`id`, `kode_akun`, `id_user`, `nama_akun`, `saldo_awal`, `tipe`) VALUES
(43, 1101, 11, 'Kasir', 0, 'Neraca'),
(44, 1102, 11, 'Bank Permata', 0, 'Neraca'),
(45, 1103, 11, 'Piutang Dagang', 0, 'Neraca'),
(46, 1301, 11, 'Persediaan', 0, 'Neraca & Laba Rugi'),
(47, 1501, 11, 'Perlengkapan Toko', 0, 'Neraca'),
(48, 1601, 11, 'Biaya Dibayar Dimuka', 0, 'Neraca'),
(49, 1401, 11, 'PPh Final', 0, 'Neraca'),
(50, 1701, 11, 'Peralatan Toko', 0, 'Neraca'),
(51, 1901, 11, 'Akumulasi Penyusutan Peralatan Toko', 0, 'Neraca'),
(52, 2101, 11, 'Hutang Dagang', 0, 'Neraca'),
(53, 2102, 11, 'HUtang Gaji', 0, 'Neraca'),
(54, 2103, 11, 'Hutang Bank', 0, 'Neraca'),
(55, 2104, 11, 'Hutang Pajak', 0, 'Neraca'),
(57, 3001, 11, 'Modal', 0, 'Neraca'),
(58, 3002, 11, 'Saldo Laba', 0, 'Neraca'),
(59, 3003, 11, 'Saldo Laba Tahun Berjalan', 0, 'Neraca'),
(60, 3201, 11, 'Prive', 0, 'Neraca'),
(61, 4101, 11, 'Penjualan', 0, 'Laba Rugi'),
(62, 4151, 11, 'Retur Penjualan', 0, 'Laba Rugi'),
(63, 5101, 11, 'Pembelian', 0, 'Laba Rugi'),
(64, 5151, 11, 'Retur Pembelian', 0, 'Laba Rugi'),
(65, 5201, 11, 'Beban Gaji', 0, 'Laba Rugi'),
(66, 5202, 11, 'Beban Air/Listrik/telpon', 0, 'Laba Rugi'),
(67, 5203, 11, 'Beban BBM', 0, 'Laba Rugi'),
(68, 5204, 11, 'Beban Angkutan', 0, 'Laba Rugi'),
(69, 5205, 11, 'Beban Penyusutan Peralatan Toko', 0, 'Laba Rugi'),
(70, 5206, 11, 'Beban Lainnya', 0, 'Laba Rugi'),
(71, 4201, 11, 'Pendapatan Luar Usaha Lainnya', 0, 'Laba Rugi'),
(72, 5301, 11, 'Biaya Luar Usaha Lainnya', 0, 'Laba Rugi'),
(73, 6000, 11, 'Ikhtisar Laba Rugi', 0, 'Neraca');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `nama_pimpinan` varchar(50) NOT NULL,
  `periode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `id_akun`, `nama_perusahaan`, `nama_pimpinan`, `periode`) VALUES
(4, 3, 'xaxa', 'xaxaxa', '2019-12'),
(11, 2, 'CV.Abadi', 'Widianto', '2019-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_user` (`kode_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `neraca`
--
ALTER TABLE `neraca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_akun` (`id_akun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `neraca`
--
ALTER TABLE `neraca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `neraca`
--
ALTER TABLE `neraca`
  ADD CONSTRAINT `neraca_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
