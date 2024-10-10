-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 16, 2020 at 04:06 PM
-- Server version: 10.2.34-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mbub5468_pabmbugm2020`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `userid` int(2) NOT NULL,
  `username` char(20) NOT NULL,
  `password` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`userid`, `username`, `password`) VALUES
(1, 'rekap', '22a9129348d3d5e6786c21ae0a940f579d1a1a927896394b8d74eaccc5969b1e'),
(2, 'panitia', 'eee0f8996491851587e597c668074653d96c8678d59d15c2a384e2fda02a5518');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(3) NOT NULL,
  `ip` char(40) NOT NULL,
  `waktu_daftar` char(20) NOT NULL,
  `interview` char(50) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama_lengkap` char(50) NOT NULL,
  `nama_panggilan` char(20) NOT NULL,
  `tempat_lahir` char(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` char(10) NOT NULL,
  `agama` char(10) NOT NULL,
  `pas_foto` char(75) NOT NULL,
  `foto_ktm` char(75) NOT NULL,
  `golongan_darah` char(15) NOT NULL,
  `tinggi_badan` int(5) NOT NULL,
  `berat_badan` int(5) NOT NULL,
  `hobi` text NOT NULL,
  `riwayat_penyakit` char(100) NOT NULL,
  `alergi` char(100) NOT NULL,
  `jenjang_studi` char(2) NOT NULL,
  `fakultas` char(30) NOT NULL,
  `prodi` char(60) NOT NULL,
  `asal_sma` char(50) NOT NULL,
  `nama_ortu` char(50) NOT NULL,
  `no_ortu` char(15) NOT NULL,
  `alamat_ortu` text NOT NULL,
  `no_telp` char(15) NOT NULL,
  `email` char(50) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_tempat` char(15) NOT NULL,
  `jam_malam` char(5) NOT NULL,
  `id_line` char(20) NOT NULL,
  `id_facebook` char(20) NOT NULL,
  `id_instagram` char(20) NOT NULL,
  `id_twitter` char(20) NOT NULL,
  `bidang_tari` text NOT NULL,
  `bidang_musik` text NOT NULL,
  `organisasi` text NOT NULL,
  `pernah_mb` char(5) NOT NULL,
  `unit_sebelumnya` char(30) NOT NULL,
  `section` char(30) NOT NULL,
  `kemampuan_alat` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `userid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
