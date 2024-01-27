-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 25, 2024 at 09:29 PM
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
-- Table structure for table `tblLansia`
--

CREATE TABLE `tblLansia` (
  `lansia_NIK` varchar(16) NOT NULL,
  `lansia_nama_lengkap` varchar(50) NOT NULL,
  `lansia_jenis_kelamin` varchar(20) NOT NULL,
  `lansia_tanggal_lahir` date NOT NULL,
  `lansia_tempat_lahir` varchar(50) NOT NULL,
  `lansia_alamat_lengkap` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblLansia`
--

INSERT INTO `tblLansia` (`lansia_NIK`, `lansia_nama_lengkap`, `lansia_jenis_kelamin`, `lansia_tanggal_lahir`, `lansia_tempat_lahir`, `lansia_alamat_lengkap`) VALUES
('3207081506620002', 'Harry Haryana', 'Laki-laki', '1962-06-15', 'Denpasar', 'Denpasar, Bali.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblLansia`
--
ALTER TABLE `tblLansia`
  ADD PRIMARY KEY (`lansia_NIK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
