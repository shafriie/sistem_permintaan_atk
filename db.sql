-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 15, 2018 at 05:40 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `satria`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_atk`
--

CREATE TABLE `tbl_atk` (
  `kode_atk` int(11) NOT NULL,
  `nama_atk` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_atk`
--

INSERT INTO `tbl_atk` (`kode_atk`, `nama_atk`, `stok`, `satuan`) VALUES
(87246237, 'Buku Capung', 86, 'Pcs'),
(834231245, 'Pulpen Aladin', 90, 'Pcs');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_departemen`
--

CREATE TABLE `tbl_departemen` (
  `kd_departemen` varchar(50) NOT NULL,
  `nama_departemen` varchar(100) NOT NULL,
  `gedung` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_departemen`
--

INSERT INTO `tbl_departemen` (`kd_departemen`, `nama_departemen`, `gedung`) VALUES
('akd001', 'Akademik', 'C'),
('dir001', 'Direktorat', 'E'),
('fin001', 'Finance', 'B'),
('front001', 'Front Office', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `kd_departemen` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `level` int(11) NOT NULL COMMENT '1=GA, 2=Karyawan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id_karyawan`, `username`, `nama`, `kd_departemen`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `level`) VALUES
(1, 'reno', 'Reno Setiadi', 'fin001', 'L', 'Jakarta', '1997-11-01', 'Islam', 'Jln Pademangan', 2),
(3, 'jajang', 'Jajang Arifin', 'akd001', 'L', 'Pandeglang', '2002-09-09', 'Islam', 'Jln Pademangan', 1),
(4, 'dayat', 'Hidayat Nurwahid', 'akd001', 'L', 'Pandeglang', '2013-12-29', 'Islam', 'Jln Pademangan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` int(11) NOT NULL COMMENT '1=GA, 2=karyawan'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `username`, `password`, `level`) VALUES
(1, 'jajang', '123456', 1),
(2, 'reno', '1234', 2),
(3, 'dayat', '123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permintaan_detail`
--

CREATE TABLE `tbl_permintaan_detail` (
  `id_detail` int(11) NOT NULL,
  `id_header` int(11) NOT NULL,
  `kode_atk` int(11) NOT NULL,
  `nama_atk` varchar(100) NOT NULL,
  `sisa_stok` int(11) NOT NULL,
  `stok_request` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=pending, 2=progress, 3=reject, 4=kirim'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_permintaan_detail`
--

INSERT INTO `tbl_permintaan_detail` (`id_detail`, `id_header`, `kode_atk`, `nama_atk`, `sisa_stok`, `stok_request`, `satuan`, `status`) VALUES
(1, 1, 87246237, 'Buku Capung', 98, 12, 'Pcs', 3),
(2, 1, 834231245, 'Pulpen Aladin', 90, 11, 'Pcs', 4),
(3, 2, 87246237, 'Buku Capung', 98, 111, 'Pcs', 2),
(4, 4, 87246237, 'Buku Capung', 98, 12, 'Pcs', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permintaan_header`
--

CREATE TABLE `tbl_permintaan_header` (
  `id_header` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `tanggal_permintaan` date NOT NULL,
  `nama` varchar(70) NOT NULL,
  `kd_departemen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_permintaan_header`
--

INSERT INTO `tbl_permintaan_header` (`id_header`, `username`, `tanggal_permintaan`, `nama`, `kd_departemen`) VALUES
(1, 'reno', '2018-08-14', 'Reno Setiadi', 'fin001'),
(2, 'reno', '2018-08-14', 'Reno Setiadi', 'fin001'),
(3, 'reno', '2018-08-14', 'Reno Setiadi', 'fin001'),
(4, 'dayat', '2018-08-15', 'Hidayat Nurwahid', 'akd001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_atk`
--
ALTER TABLE `tbl_atk`
  ADD PRIMARY KEY (`kode_atk`);

--
-- Indexes for table `tbl_departemen`
--
ALTER TABLE `tbl_departemen`
  ADD PRIMARY KEY (`kd_departemen`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_permintaan_detail`
--
ALTER TABLE `tbl_permintaan_detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tbl_permintaan_header`
--
ALTER TABLE `tbl_permintaan_header`
  ADD PRIMARY KEY (`id_header`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_permintaan_detail`
--
ALTER TABLE `tbl_permintaan_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_permintaan_header`
--
ALTER TABLE `tbl_permintaan_header`
  MODIFY `id_header` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
