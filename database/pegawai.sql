-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 07:31 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pegawai`
--

-- --------------------------------------------------------

--
-- Table structure for table `child_karyawan_pekerjaan`
--

CREATE TABLE `child_karyawan_pekerjaan` (
  `id` int(11) NOT NULL,
  `id_karyawan` varchar(12) NOT NULL,
  `perusahaan` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `thn_masuk` year(4) NOT NULL,
  `thn_keluar` year(4) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `child_karyawan_pendidikan`
--

CREATE TABLE `child_karyawan_pendidikan` (
  `id` int(11) NOT NULL,
  `id_karyawan` varchar(12) NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `thn_masuk` year(4) NOT NULL,
  `thn_lulus` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_karyawan` varchar(11) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_ktp` varchar(20) NOT NULL,
  `pendidikan` enum('SD','SMP','SMU','D1','D2','D3','D4','S1','S2','S3') NOT NULL,
  `thn_input` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `child_karyawan_pendidikan`
--
ALTER TABLE `child_karyawan_pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `child_karyawan_pendidikan`
--
ALTER TABLE `child_karyawan_pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
