-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 08, 2023 at 09:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posyandu_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblAdmin`
--

CREATE TABLE `tblAdmin` (
  `id` int(11) NOT NULL,
  `adm_username` varchar(25) NOT NULL,
  `adm_password` varchar(200) NOT NULL,
  `adm_nama_admin` varchar(50) NOT NULL,
  `adm_role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblAdmin`
--

INSERT INTO `tblAdmin` (`id`, `adm_username`, `adm_password`, `adm_nama_admin`, `adm_role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Ferry Aryani', 'Petugas Posyandu');

-- --------------------------------------------------------

--
-- Table structure for table `tblAnak`
--

CREATE TABLE `tblAnak` (
  `anak_NIK` varchar(16) NOT NULL,
  `anak_nama_anak` varchar(50) NOT NULL,
  `anak_jenis_kelamin` varchar(20) NOT NULL,
  `anak_tanggal_lahir` date NOT NULL,
  `anak_tempat_lahir` varchar(50) NOT NULL,
  `anak_tinggi_badan` float NOT NULL,
  `anak_berat_badan` float NOT NULL,
  `anak_imunisasi` varchar(50) NOT NULL,
  `anak_vaksin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblAnak`
--

INSERT INTO `tblAnak` (`anak_NIK`, `anak_nama_anak`, `anak_jenis_kelamin`, `anak_tanggal_lahir`, `anak_tempat_lahir`, `anak_tinggi_badan`, `anak_berat_badan`, `anak_imunisasi`, `anak_vaksin`) VALUES
('3121212521521425', 'Abizar', 'Laki-Laki', '2022-06-08', 'Indonesia', 34, 11, 'Belum', 'Ya'),
('3121212521521465', 'Fandi', 'Laki-Laki', '2022-02-06', 'Indonesia', 25, 10, 'Belum', 'Ya'),
('320735326316461', 'Aqila Humaira', 'Perempuan', '2020-10-16', 'Indonesia', 82, 15, 'Contoh Data', 'Contoh Data');

-- --------------------------------------------------------

--
-- Table structure for table `tblPengaturan`
--

CREATE TABLE `tblPengaturan` (
  `id` int(16) NOT NULL,
  `png_nama_pengaturan` varchar(50) NOT NULL,
  `png_nama_posyandu` varchar(50) NOT NULL,
  `png_alamat_posyandu` text NOT NULL,
  `png_no_telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblPengaturan`
--

INSERT INTO `tblPengaturan` (`id`, `png_nama_pengaturan`, `png_nama_posyandu`, `png_alamat_posyandu`, `png_no_telepon`) VALUES
(1, 'Pengaturan Basic', 'Sejahtera', 'Alamat Posyandu, No.12, 40204', '6282130130233');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblAdmin`
--
ALTER TABLE `tblAdmin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `i_username` (`adm_username`);

--
-- Indexes for table `tblAnak`
--
ALTER TABLE `tblAnak`
  ADD PRIMARY KEY (`anak_NIK`);

--
-- Indexes for table `tblPengaturan`
--
ALTER TABLE `tblPengaturan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblAdmin`
--
ALTER TABLE `tblAdmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblPengaturan`
--
ALTER TABLE `tblPengaturan`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
