-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 25, 2024 at 11:39 AM
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
  `anak_nama_ibu` varchar(50) DEFAULT NULL,
  `anak_jenis_kelamin` varchar(20) NOT NULL,
  `anak_tanggal_lahir` date NOT NULL,
  `anak_tempat_lahir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblAnak`
--

INSERT INTO `tblAnak` (`anak_NIK`, `anak_nama_anak`, `anak_nama_ibu`, `anak_jenis_kelamin`, `anak_tanggal_lahir`, `anak_tempat_lahir`) VALUES
('3121212521521405', 'Rafatar', 'Ibu Rafatar', 'Laki-Laki', '2022-06-24', 'Bali'),
('3121212521521425', 'Abizar', 'Ibu Abizar', 'Laki-Laki', '2022-06-08', 'Indonesia'),
('3121212521521463', 'Rifa', 'Ibu Rifa', 'Perempuan', '2022-01-24', 'Bali'),
('3121212521521465', 'Fandi', 'Ibu Fandi', 'Laki-Laki', '2022-02-06', 'Indonesia'),
('3121212521521487', 'Nisha', 'Ibu Nisha', 'Perempuan', '2023-02-23', 'Bali'),
('320735326316461', 'Aqila Humaira', 'Ibu Aqila', 'Perempuan', '2020-10-16', 'Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `tblIbu`
--

CREATE TABLE `tblIbu` (
  `ibu_nik` varchar(16) NOT NULL,
  `ibu_nama` varchar(90) NOT NULL,
  `ibu_nama_suami` varchar(90) NOT NULL,
  `ibu_tanggal_lahir` date NOT NULL,
  `ibu_alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblIbu`
--

INSERT INTO `tblIbu` (`ibu_nik`, `ibu_nama`, `ibu_nama_suami`, `ibu_tanggal_lahir`, `ibu_alamat`) VALUES
('3207081406920006', 'Rafika', 'Guntur', '1992-01-25', 'Banda Aceh'),
('3207081407920001', 'Hermione', 'Sugiharto', '1992-01-08', 'Denpasar, Bali'),
('3207081412950004', 'Rina', 'Rudi', '1995-03-25', 'Kalimantan');

-- --------------------------------------------------------

--
-- Table structure for table `tblLansia`
--

CREATE TABLE `tblLansia` (
  `lansia_NIK` varchar(16) NOT NULL,
  `lansia_nama_lengkap` varchar(50) NOT NULL,
  `lansia_jenis_kelamin` varchar(20) NOT NULL,
  `lansia_tanggal_lahir` date NOT NULL,
  `lansia_tempat_lahir` varchar(50) NOT NULL,
  `lansia_alamat_lengkap` text NOT NULL,
  `lansia_jadwal_pemeriksaan` varchar(20) NOT NULL,
  `lansia_hasil_pemeriksaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblLansia`
--

INSERT INTO `tblLansia` (`lansia_NIK`, `lansia_nama_lengkap`, `lansia_jenis_kelamin`, `lansia_tanggal_lahir`, `lansia_tempat_lahir`, `lansia_alamat_lengkap`, `lansia_jadwal_pemeriksaan`, `lansia_hasil_pemeriksaan`) VALUES
('3207081506620002', 'Harry Haryana', 'Laki-laki', '1962-06-15', 'Denpasar', 'Denpasar, Bali.', 'Senin', 'Dummy Data');

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

-- --------------------------------------------------------

--
-- Table structure for table `tblPeriksaAnak`
--

CREATE TABLE `tblPeriksaAnak` (
  `id_pemeriksaan` int(11) NOT NULL,
  `anak_NIK` varchar(16) NOT NULL,
  `status_periksa` varchar(50) NOT NULL,
  `periksa_tb` varchar(5) NOT NULL,
  `periksa_bb` varchar(5) NOT NULL,
  `periksa_lila` varchar(5) NOT NULL,
  `periksa_lk` varchar(5) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_periksa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblPeriksaIbu`
--

CREATE TABLE `tblPeriksaIbu` (
  `id_pemeriksaan` int(11) NOT NULL,
  `ibu_nik` varchar(16) NOT NULL,
  `jenis_pelayanan` varchar(100) NOT NULL,
  `tanggal_periksa` date NOT NULL,
  `keterangan` text NOT NULL,
  `status_periksa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `tblIbu`
--
ALTER TABLE `tblIbu`
  ADD PRIMARY KEY (`ibu_nik`);

--
-- Indexes for table `tblLansia`
--
ALTER TABLE `tblLansia`
  ADD PRIMARY KEY (`lansia_NIK`);

--
-- Indexes for table `tblPengaturan`
--
ALTER TABLE `tblPengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblPeriksaAnak`
--
ALTER TABLE `tblPeriksaAnak`
  ADD PRIMARY KEY (`id_pemeriksaan`),
  ADD KEY `fk_anak` (`anak_NIK`);

--
-- Indexes for table `tblPeriksaIbu`
--
ALTER TABLE `tblPeriksaIbu`
  ADD PRIMARY KEY (`id_pemeriksaan`),
  ADD KEY `fk_ibu` (`ibu_nik`);

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

--
-- AUTO_INCREMENT for table `tblPeriksaAnak`
--
ALTER TABLE `tblPeriksaAnak`
  MODIFY `id_pemeriksaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `tblPeriksaIbu`
--
ALTER TABLE `tblPeriksaIbu`
  MODIFY `id_pemeriksaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
