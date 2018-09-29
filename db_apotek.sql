-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2018 at 12:39 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id` int(3) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id`, `nama_jabatan`) VALUES
(1, 'Apoteker'),
(2, 'Kasir'),
(3, 'Petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id` varchar(8) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kelurahan` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `jabatan` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id`, `password`, `nama`, `no_telp`, `alamat`, `kelurahan`, `kecamatan`, `jabatan`) VALUES
('KY00001', 'A7036A32B031890418F38F7466283117DBB89850BDEA94DB597CC973D90728270055A87413B211ED8434DE1FEA4A45A8748D89E72871AF528B33B3BB8D496C3D', 'Dadang BTS', '0822281231', 'Jl. jalan Road', 'cijaura', 'buah batu', 1),
('KY00002', 'a001ebc2fb8177a99a5558eb04eac4aefe1a9ff7e36e968f18807c68a6ccdfff5e9f7d2d2e1f9798b29e67c8d7e8902af8fb95f767117b538f6ac31b3bb1b131', 'asdasd', NULL, NULL, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_obat`
--

CREATE TABLE `tbl_obat` (
  `id` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kandungan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_obat`
--

INSERT INTO `tbl_obat` (`id`, `nama`, `kandungan`) VALUES
('OB00001', 'Panadol', '10% mint');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesan`
--

CREATE TABLE `tbl_pesan` (
  `id` varchar(10) NOT NULL,
  `id_petugas` varchar(6) NOT NULL,
  `id_apoteker` varchar(6) NOT NULL,
  `tgl_pesan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesan_detail`
--

CREATE TABLE `tbl_pesan_detail` (
  `id` int(11) NOT NULL,
  `id_pesan` varchar(10) NOT NULL,
  `id_obat` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_jabatan` (`jabatan`);

--
-- Indexes for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pesan_detail`
--
ALTER TABLE `tbl_pesan_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pesan_detail`
--
ALTER TABLE `tbl_pesan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD CONSTRAINT `FK_jabatan` FOREIGN KEY (`jabatan`) REFERENCES `tbl_jabatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
