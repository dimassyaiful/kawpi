-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2019 at 08:19 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kawpi`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `nik` int(11) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`nik`, `password`) VALUES
(1, 'Wsq$2y$10$K9dHTQSDeDneD1U3yIOWgeDp3i3rL8wYbqd0oYVub5gEX7XGgnb7mKz2'),
(99, 'nt5$2y$10$0lDC2EJCpv/SyONUPKGQmeqM4HXYDyNZ5xVimpbwvoyh7lRZ/0kHiB9D'),
(100, 'mjQ$2y$10$E4KE6FD5YkxQkFqvmGMcV./lL2GK5wUzp8cvFtyqd3zW5kJT8vja.NzT');

-- --------------------------------------------------------

--
-- Table structure for table `mapping_pengguna`
--

CREATE TABLE `mapping_pengguna` (
  `nik` int(11) NOT NULL,
  `id_posisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapping_pengguna`
--

INSERT INTO `mapping_pengguna` (`nik`, `id_posisi`) VALUES
(99, 1),
(100, 2),
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `nik` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `ttl` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`nik`, `nama`, `ttl`, `alamat`, `provinsi`, `email`) VALUES
(1, 'Luck Man', '2019-12-31', 'Batam', 'Sumut', '99@99.com'),
(99, 'ketua', '2019-12-31', 'Batamku', 'Jabar', 'dim@Polibatam.ac.id'),
(100, 'Ketua', '2019-12-31', 'Batam', 'sumbar', '99@aslkdlas.com');

-- --------------------------------------------------------

--
-- Table structure for table `portopolio`
--

CREATE TABLE `portopolio` (
  `nik` int(11) NOT NULL,
  `bidang_keahlian` varchar(100) NOT NULL,
  `riwayat_pelatihan` text NOT NULL,
  `sertifikat_dimiliki` text NOT NULL,
  `riwayat_project` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `portopolio`
--

INSERT INTO `portopolio` (`nik`, `bidang_keahlian`, `riwayat_pelatihan`, `sertifikat_dimiliki`, `riwayat_project`) VALUES
(1, 'IT', '- Sertifikasi', 'sertifikasi', 'project');

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE `posisi` (
  `id_posisi` int(11) NOT NULL,
  `nama_posisi` enum('admin','ketua','sekretariat','anggota','pendaftar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`id_posisi`, `nama_posisi`) VALUES
(1, 'admin'),
(2, 'ketua'),
(3, 'sekretariat'),
(4, 'anggota'),
(5, 'pendaftar');

-- --------------------------------------------------------

--
-- Table structure for table `verifikasi`
--

CREATE TABLE `verifikasi` (
  `nik` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_verifikasi` date NOT NULL,
  `keterangan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verifikasi`
--

INSERT INTO `verifikasi` (`nik`, `status`, `tgl_verifikasi`, `keterangan`) VALUES
(1, 0, '2019-07-17', 'Data tidak valid');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `mapping_pengguna`
--
ALTER TABLE `mapping_pengguna`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `mapping_pengguna_ibfk_2` (`id_posisi`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `portopolio`
--
ALTER TABLE `portopolio`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id_posisi`);

--
-- Indexes for table `verifikasi`
--
ALTER TABLE `verifikasi`
  ADD PRIMARY KEY (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id_posisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `pengguna` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mapping_pengguna`
--
ALTER TABLE `mapping_pengguna`
  ADD CONSTRAINT `mapping_pengguna_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `pengguna` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mapping_pengguna_ibfk_2` FOREIGN KEY (`id_posisi`) REFERENCES `posisi` (`id_posisi`) ON UPDATE CASCADE;

--
-- Constraints for table `portopolio`
--
ALTER TABLE `portopolio`
  ADD CONSTRAINT `portopolio_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `pengguna` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `verifikasi`
--
ALTER TABLE `verifikasi`
  ADD CONSTRAINT `verifikasi_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `pengguna` (`nik`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
