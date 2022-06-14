-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 14, 2022 at 03:33 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nim` char(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `email`, `jurusan`, `gambar`) VALUES
(10, 'Winata Pranata', 'A2.2000113', 'A2.2000113@mhs.stmik-sumedang.ac.id ', 'Teknik Informatika', '629cac7fbed69.png'),
(11, ' Winaya Zarkasih ', 'A2.2000114', 'A2.2000114@mhs.stmik-sumedang.ac.id', 'Teknik Informatika', 'pas_foto_winaya.png'),
(28, 'Bagas Sudam Darmana', 'A2.2000017', 'A2.2000017@mhs.stmik-sumedang.ac.id', 'Teknik Informatika', '62a7e4a97b6ef.png'),
(29, 'Albi Fajar Ramadhan', 'A2.2000003', 'a2.2000003@mhs.stmik-sumedang.ac.id', 'Teknik Informatika', '62a7e4fdda8c5.png'),
(30, 'testing', 'testing', 'testing@gmail.com', 'Teknik Informatika', 'nophoto.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(2, 'admin', '$2y$10$RARhPcl.mHOVMHDWHT2c3uMOFJ0oaupdcFhXXDlwjwNl7QSxpc5Eu'),
(3, 'admin123', '$2y$10$MEb2D7JPhhIix7HQNG8Of.2kPLnoXGj5e2kaP2PTG6f9HHGwlwQF.'),
(4, 'admin12', '$2y$10$OA8ozaGjSdm7DAYEDTxWXOxL294XI.cMVpSlyVng8Ra6N6EE31ZYO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
