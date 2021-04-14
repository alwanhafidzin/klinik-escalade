-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2016 at 06:52 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinikkecantikan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE IF NOT EXISTS `antrian` (
  `no_antrian` int(11) NOT NULL,
  `ID_pasien` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`no_antrian`, `ID_pasien`) VALUES
(1, 1),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `antrian_sekarang`
--

CREATE TABLE IF NOT EXISTS `antrian_sekarang` (
  `no_antrian` int(11) DEFAULT NULL,
  `id_pasien` int(11) DEFAULT NULL,
  `nama` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_dokter`
--

CREATE TABLE IF NOT EXISTS `data_dokter` (
  `nama` varchar(150) NOT NULL,
  `file_CV` varchar(50) NOT NULL,
  `therapy` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_pasien`
--

CREATE TABLE IF NOT EXISTS `data_pasien` (
  `ID_pasien` int(11) NOT NULL,
  `foto` blob NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Alamat` varchar(150) NOT NULL,
  `Tanggal_lahir` date NOT NULL,
  `No_hp` varchar(15) NOT NULL,
  `keluhan_utama` text NOT NULL,
  `riwayat_penyakit` text NOT NULL,
  `riwayat_alergi_obat` text NOT NULL,
  `riwayat_pengobatan_sebelumnya` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pasien`
--

INSERT INTO `data_pasien` (`ID_pasien`, `foto`, `Nama`, `Alamat`, `Tanggal_lahir`, `No_hp`, `keluhan_utama`, `riwayat_penyakit`, `riwayat_alergi_obat`, `riwayat_pengobatan_sebelumnya`) VALUES
(1, '', 'Dainty Resfulany', 'Malang', '1995-01-22', '0857777777777', 'sun damage', '-', '-', '-'),
(4, 0x316a6c2e6a7067, 'ali1', 'malang1', '1995-01-03', '089909999001', 'a1', 'ab1', 'bc1', 'd1');

-- --------------------------------------------------------

--
-- Table structure for table `detail_layanan`
--

CREATE TABLE IF NOT EXISTS `detail_layanan` (
  `id_detail_layanan` int(11) NOT NULL,
  `id_rekam_medis` int(11) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `harga_layanan` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_layanan`
--

INSERT INTO `detail_layanan` (`id_detail_layanan`, `id_rekam_medis`, `id_layanan`, `harga_layanan`) VALUES
(1, 3, 2, 20000),
(2, 3, 1, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `klinik_sessions`
--

CREATE TABLE IF NOT EXISTS `klinik_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE IF NOT EXISTS `layanan` (
  `id_layanan` int(11) NOT NULL,
  `Layanan` varchar(50) NOT NULL,
  `Harga` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`id_layanan`, `Layanan`, `Harga`) VALUES
(1, 'Facial', 40000),
(3, 'Konsultasi Dokter', 100000),
(4, 'Suntik Jerawat', 300000);

-- --------------------------------------------------------

--
-- Table structure for table `login_session`
--

CREATE TABLE IF NOT EXISTS `login_session` (
  `uid` bigint(20) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('dokter','resepsionis') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_session`
--

INSERT INTO `login_session` (`uid`, `username`, `password`, `level`) VALUES
(2, 'resepsionis', '3aeff485f68b360d076de3d73f9247ad', 'resepsionis'),
(1, 'dokter', 'd22af4180eee4bd95072eb90f94930e5', 'dokter');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE IF NOT EXISTS `rekam_medis` (
  `id_rekam_medis` int(11) NOT NULL,
  `ID_pasien` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `foto` varchar(150) NOT NULL,
  `resep` text NOT NULL,
  `diagnosis` text NOT NULL,
  `tanggal_next_control` date NOT NULL,
  `total_bayar` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`id_rekam_medis`, `ID_pasien`, `tanggal`, `foto`, `resep`, `diagnosis`, `tanggal_next_control`, `total_bayar`) VALUES
(1, 4, '0000-00-00', '', '', 'flek hitam', '0000-00-00', 0),
(3, 1, '2016-07-05', 'kk.jpg', '1. ksa\r\n2. aksdm', 'pilek', '2016-07-29', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_rekam_medis` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_rekam_medis`, `status`) VALUES
(2, 1, 1),
(3, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `level` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `name`, `level`, `status`) VALUES
('dokter', 'd22af4180eee4bd95072eb90f94930e5', 'Dokter Kece', 1, 1),
('resepsionis', '3aeff485f68b360d076de3d73f9247ad', 'Resepsionis Kece', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`no_antrian`);

--
-- Indexes for table `data_dokter`
--
ALTER TABLE `data_dokter`
  ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `data_pasien`
--
ALTER TABLE `data_pasien`
  ADD PRIMARY KEY (`ID_pasien`);

--
-- Indexes for table `detail_layanan`
--
ALTER TABLE `detail_layanan`
  ADD PRIMARY KEY (`id_detail_layanan`);

--
-- Indexes for table `klinik_sessions`
--
ALTER TABLE `klinik_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`id_rekam_medis`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `no_antrian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `data_pasien`
--
ALTER TABLE `data_pasien`
  MODIFY `ID_pasien` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `detail_layanan`
--
ALTER TABLE `detail_layanan`
  MODIFY `id_detail_layanan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `id_rekam_medis` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
