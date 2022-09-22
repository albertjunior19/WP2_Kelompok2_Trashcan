-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 08:19 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trashcan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `nama`, `email`, `password`) VALUES
(60, 'admin', 'Administrator', 'admin@gmail.com', '$2y$10$TG1up1w3dSUD1F71DothtuadIrcfhePwD/gnGL5Gjf6RW1Tz6FYq6');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `user_id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fotoprofil` text NOT NULL,
  `password` text NOT NULL,
  `user_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `telepon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`user_id`, `nama_lengkap`, `email`, `fotoprofil`, `password`, `user_created`, `telepon`) VALUES
(1, 'Taufik Hidayat', 'taufik@gmail.com', '85795d5bcb2406575dedc820d4cb8b64.jpg', '$2y$10$jqquXQWf3SAS0WBhbzkYneSiIJ7pCKang2A8ODTLCr2r8jdWmjTh6', '2021-12-01 03:38:20', '081381044430');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` smallint(6) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `url` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `url`) VALUES
(1, 'Botol', 'botol'),
(2, 'Plastik', 'plastik'),
(7, 'Kaleng', 'kaleng');

-- --------------------------------------------------------

--
-- Table structure for table `tb_blog`
--

CREATE TABLE `tb_blog` (
  `blog_id` int(11) NOT NULL,
  `blog_judul` varchar(90) NOT NULL,
  `blog_url` text NOT NULL,
  `blog_tgl` datetime NOT NULL,
  `blog_isi` text NOT NULL,
  `blog_gambar` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_blog`
--

INSERT INTO `tb_blog` (`blog_id`, `blog_judul`, `blog_url`, `blog_tgl`, `blog_isi`, `blog_gambar`) VALUES
(0, 'Tesss Xdxd Jiah', 'tesss-xdxd-jiah-1638330921.html', '2021-12-01 10:55:21', 'hahahahi haha', 'fe83aad9b5c482e648f8245af40ab007.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `d_transaksi_id` varchar(10) NOT NULL,
  `d_transaksi_item` int(7) NOT NULL,
  `d_transaksi_qty` smallint(4) NOT NULL,
  `d_transaksi_biaya` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`d_transaksi_id`, `d_transaksi_item`, `d_transaksi_qty`, `d_transaksi_biaya`) VALUES
('1', 1804248801, 2, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_notifikasi`
--

CREATE TABLE `tb_notifikasi` (
  `idnotif` int(11) NOT NULL,
  `notif_id` varchar(90) NOT NULL,
  `notif_perihal` varchar(50) DEFAULT NULL,
  `notif_dari` varchar(70) DEFAULT NULL,
  `notif_time` timestamp NULL DEFAULT current_timestamp(),
  `notif_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_notifikasi`
--

INSERT INTO `tb_notifikasi` (`idnotif`, `notif_id`, `notif_perihal`, `notif_dari`, `notif_time`, `notif_status`) VALUES
(1, '1', 'Transaksi baru', 'Taufik Hidayat', '2022-06-16 11:18:24', 0),
(2, '1', 'Bukti Pembayaran Masuk', 'Taufik Hidayat', '2022-06-16 11:18:40', 0),
(3, '1', 'Bukti Pembayaran Masuk', 'Taufik Hidayat', '2022-06-16 11:30:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `pesan_id` varchar(100) NOT NULL,
  `pesan_nama` varchar(50) NOT NULL,
  `pesan_email` varchar(50) NOT NULL,
  `nohp` text NOT NULL,
  `pesan_tgl` datetime NOT NULL,
  `pesan_subjek` varchar(50) NOT NULL,
  `pesan_isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `produk_id` int(11) NOT NULL,
  `produk_url` text NOT NULL,
  `id_kategori` text NOT NULL,
  `nama_produk` text NOT NULL,
  `produk_weight` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `produk_status` varchar(50) DEFAULT NULL,
  `harga` varchar(8) NOT NULL,
  `namamitra` text NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`produk_id`, `produk_url`, `id_kategori`, `nama_produk`, `produk_weight`, `stok`, `produk_status`, `harga`, `namamitra`, `gambar`) VALUES
(1804248801, 'donat-cokelat-1655367975.html', '1', 'Donat Cokelat', 1000, 50, NULL, '10000', 'Pak Yanto', '0aa1af31fff3961efc0aaea932b963f5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `transaksi_id` int(10) NOT NULL,
  `transaksi_userid` int(7) NOT NULL,
  `transaksi_total` text NOT NULL,
  `transaksi_tujuan` varchar(255) NOT NULL,
  `transaksi_pos` int(5) NOT NULL,
  `transaksi_kota` varchar(25) NOT NULL,
  `transaksi_tgl_pesan` date NOT NULL,
  `transaksi_bts_bayar` date NOT NULL,
  `transaksi_status` text NOT NULL,
  `transaksi_note` text NOT NULL,
  `transaksi_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `ongkir` text NOT NULL,
  `noresi` text NOT NULL,
  `buktipembayaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`transaksi_id`, `transaksi_userid`, `transaksi_total`, `transaksi_tujuan`, `transaksi_pos`, `transaksi_kota`, `transaksi_tgl_pesan`, `transaksi_bts_bayar`, `transaksi_status`, `transaksi_note`, `transaksi_time`, `ongkir`, `noresi`, `buktipembayaran`) VALUES
(1, 1, '30000', 'Jl. Kalidoni Palembang', 30118, 'Senen', '2022-06-16', '2022-06-19', 'Selesai', 'Makan', '2022-06-16 11:18:24', '10000', '125421521', '81cf805342d0eb0113c4ee621ff2008b.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `trashpick`
--

CREATE TABLE `trashpick` (
  `idtrashpick` int(11) NOT NULL,
  `iduser` varchar(255) NOT NULL,
  `nama` text NOT NULL,
  `notelp` text NOT NULL,
  `alamat` text NOT NULL,
  `jenisbarang` text NOT NULL,
  `berat` text NOT NULL,
  `tanggalpickup` date NOT NULL,
  `waktupickup` text NOT NULL,
  `biayapickup` text NOT NULL,
  `uploadbukti` text NOT NULL,
  `waktuupload` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trashpick`
--

INSERT INTO `trashpick` (`idtrashpick`, `iduser`, `nama`, `notelp`, `alamat`, `jenisbarang`, `berat`, `tanggalpickup`, `waktupickup`, `biayapickup`, `uploadbukti`, `waktuupload`) VALUES
(1, '1', 'Taufik Hidayat', '084912412', 'Jl. Nungcik Palembang', 'Botol', '9', '0000-00-00', '17:00', '6000', 'bukti.jpeg', '2022-06-16 17:54:07'),
(2, '1', 'Taufik Hidayat', '084901289421', 'Jl. Nungcik Kalidoni Palembang', 'Botol', '9', '2022-06-16', '18:33', '6000', 'bukti1.jpeg', '2022-06-16 18:33:51'),
(3, '1', 'Taufik Hidayat', '08491284921', 'Jl. Nungcik Kalidoni Palembang', 'Botol', '8', '2022-06-16', '17:00', '6000', 'bukti2.jpeg', '2022-06-16 18:35:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_blog`
--
ALTER TABLE `tb_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `tb_notifikasi`
--
ALTER TABLE `tb_notifikasi`
  ADD PRIMARY KEY (`idnotif`);

--
-- Indexes for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`pesan_id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indexes for table `trashpick`
--
ALTER TABLE `trashpick`
  ADD PRIMARY KEY (`idtrashpick`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_blog`
--
ALTER TABLE `tb_blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=973549015;

--
-- AUTO_INCREMENT for table `tb_notifikasi`
--
ALTER TABLE `tb_notifikasi`
  MODIFY `idnotif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1804248802;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `transaksi_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trashpick`
--
ALTER TABLE `trashpick`
  MODIFY `idtrashpick` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
