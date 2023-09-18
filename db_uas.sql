-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 11:37 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `datapelanggan`
--

CREATE TABLE `datapelanggan` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datapelanggan`
--

INSERT INTO `datapelanggan` (`id`, `username`, `password`, `name`, `phone`, `address`, `email`, `jenis_kelamin`) VALUES
(4, 'shintazh', '3839c8059aad74c53d7660312ed3d571', 'Shinta Amalia Azhara', '087855161077', 'Wisma Tropodo, Waru Sidoarjo', 'shintaamaliaazhara@gmail.com', 'Perempuan'),
(5, 'Hana', '827ccb0eea8a706c4c34a16891f84e7b', 'Imtihana', '0854153244', 'jalan raya gunug anyar', 'hanakhf@gmail.com', 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `loginadmin`
--

CREATE TABLE `loginadmin` (
  `username` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loginadmin`
--

INSERT INTO `loginadmin` (`username`, `password`) VALUES
('admin', '464d5b9b1ba558a4c8afb8e4fe1ebd63');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `jenis_tugas` varchar(50) DEFAULT NULL,
  `detail_pesanan` text DEFAULT NULL,
  `metode_pembayaran` varchar(20) DEFAULT NULL,
  `deadline_pekerjaan` datetime DEFAULT NULL,
  `kode_pembayaran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `tanggal`, `nama`, `email`, `no_hp`, `jenis_tugas`, `detail_pesanan`, `metode_pembayaran`, `deadline_pekerjaan`, `kode_pembayaran`) VALUES
(2, '2023-06-12', 'SHINTA AMALIA AZHARA', 'shintaamaliaazhara@gmail.com', '087855161077', 'ipa11', '', 'cash', NULL, NULL),
(3, '2023-06-12', 'dela', 'deladwip@gmail.com', '087855161077', 'b_inggris', '', 'cash', NULL, NULL),
(4, '2023-06-13', 'amalia', 'shintaamaliaazhara@gmail.com', '08755161077', 'b_inggris', 'deadline tgl 15 kak', 'transfer', NULL, NULL),
(5, '2023-06-13', 'puspita', 'puspita@gmail.com', '08755161077', 'b_inggris', 'deadline tgl 25 kak', 'ewallet', NULL, NULL),
(6, '2023-06-13', 'puspita', 'puspita@gmail.com', '08755161077', 'b_inggris', 'deadline tgl 25 kak', 'ewallet', NULL, NULL),
(7, '2023-06-13', 'shinta', 'shintaamaliaazhara@gmail.com', '08755161077', 'matematika', 'deadline tgl 15 kak', 'transfer', NULL, NULL),
(8, '2023-06-13', 'Song he', 'puspita@gmail.com', '08755161077', 'kalkulus', 'deadline tgl 4 ', 'cash', NULL, NULL),
(9, '2023-06-13', 'JISOO', 'puspita@gmail.com', '08755161077', 'kalkulus', 'deadline tgl 4 ', 'ewallet', NULL, NULL),
(10, '2023-06-13', 'LISA', 'puspita@gmail.com', '08755161077', 'basis_data', 'deadline tgl 4 ', 'transfer', NULL, NULL),
(11, '2023-06-13', 'JENIEE', 'puspita@gmail.com', '08755161077', 'basis_data', 'deadline tgl 4 ', 'cash', NULL, NULL),
(12, '2023-06-13', 'JENIEE', 'puspita@gmail.com', '08755161077', 'basis_data', 'deadline tgl 4 ', 'cash', NULL, NULL),
(13, '2023-06-13', 'JENIEE', 'puspita@gmail.com', '08755161077', 'basis_data', 'deadline tgl 4 ', 'cash', NULL, NULL),
(14, '2023-06-13', 'JENIEE', 'puspita@gmail.com', '08755161077', 'basis_data', 'deadline tgl 4 ', 'cash', NULL, NULL),
(15, '2023-06-13', 'lala', 'lalala@gmail.com', '08755161077', 'geometri', 'deadline tgl 31', 'transfer', NULL, NULL),
(16, '2023-06-13', 'lala', 'lalala@gmail.com', '08755161077', 'geometri', 'deadline tgl 31', 'transfer', NULL, NULL),
(17, '2023-06-13', 'shinta', 'shintaamaliaazhara@gmail.com', '08755161077', 'b_inggris', 'deadline tgl 4 ', 'transfer', NULL, NULL),
(18, '2023-06-14', 'imtihana khofifah', 'hanakhf@gmail.com', '08785516175432', 'matematika', 'deadline tgl 31', 'transfer', NULL, NULL),
(19, '2023-06-14', 'imtihana khofifah', 'hanakhf@gmail.com', '08785516175432', 'matematika', 'deadline tgl 31', 'transfer', NULL, NULL),
(20, '2023-06-14', 'imtihana khofifah', 'hanakhf@gmail.com', '08785516175432', 'matematika', 'deadline tgl 31', 'transfer', NULL, NULL),
(21, '2023-06-14', 'imtihana khofifah', 'hanakhf@gmail.com', '08785516175432', 'matematika', 'deadline tgl 31', 'transfer', NULL, NULL),
(22, '2023-06-14', 'JENIEE', 'blackpink@official', '08785516175432', 'b_inggris', 'deadline tgl 15 kak', 'cash', NULL, NULL),
(23, '2023-06-14', 'shinta', 'shintaamaliaazhara@gmail.com', '08755161077', 'b_indonesia', 'deadline tgl 31', 'transfer', NULL, NULL),
(24, '2023-06-14', 'shinta', 'shintaamaliaazhara@gmail.com', '08755161077', 'b_indonesia', 'deadline tgl 31', 'transfer', NULL, NULL),
(25, '2023-06-14', 'shinta', 'shintaamaliaazhara@gmail.com', '08755161077', 'b_indonesia', 'deadline tgl 31', 'transfer', NULL, NULL),
(26, '2023-06-14', 'shinta', 'shintaamaliaazhara@gmail.com', '08755161077', 'Tugas Harian', 'semoga cepat selesai', '', NULL, NULL),
(27, '2023-06-14', 'shinta', 'shintaamaliaazhara@gmail.com', '08785516175432', 'ipa/ips', 'deadline tgl 31', '', NULL, NULL),
(28, '2023-06-14', 'shinta', 'shintaamaliaazhara@gmail.com', '08785516175432', 'ipa/ips', 'deadline tgl 31', '', NULL, NULL),
(29, '2023-06-14', 'JENIEE', 'blackpink@official', '08755161077', 'matematika', 'deadline tgl 31', '', NULL, NULL),
(30, '2023-06-14', 'JENIEE', 'blackpink@official', '08785516175432', 'ipa/ips', 'deadline tgl 4 ', '', NULL, NULL),
(31, '2023-06-14', 'shinta', 'shintaamaliaazhara@gmail.com', '08755161077', 'matematika', 'deadline tgl 4 ', 'transfer', NULL, NULL),
(32, '2023-06-14', 'imtihana khofifah', 'shintaamaliaazhara@gmail.com', '08755161077', 'matematika', '', 'cash', NULL, NULL),
(33, '2023-06-14', 'imtihana khofifah', 'shintaamaliaazhara@gmail.com', '08755161077', 'matematika', '', 'cash', NULL, NULL),
(34, '2023-06-14', 'Dela Dewi P', 'deladewipuspita@gmail.com', '08755161077', 'matematika', 'deadline tgl 31', 'ewallet', NULL, NULL),
(35, '2023-06-14', 'Dela Dewi P', 'deladewipuspita@gmail.com', '08755161077', 'matematika', 'deadline tgl 31', 'ewallet', NULL, NULL),
(36, '2023-06-14', 'Dela Dewi P', 'deladewipuspita@gmail.com', '08755161077', 'matematika', 'deadline tgl 31', 'ewallet', NULL, NULL),
(37, '2023-06-14', 'Dela Dewi P', 'deladewipuspita@gmail.com', '08755161077', 'matematika', 'deadline tgl 31', 'ewallet', NULL, NULL),
(38, '2023-06-14', 'Dela Dewi P', '', '', 'smp', '', 'cash', NULL, NULL),
(39, '2023-06-15', 'JENIEE', 'puspita@gmail.com', '08755161077', 'bahasa10', 'deadline tgl 31', '', '2023-06-23 23:02:00', NULL),
(40, '2023-06-15', 'JENIEE', 'puspita@gmail.com', '08755161077', 'bahasa10', 'deadline tgl 31', '', '2023-06-23 23:02:00', NULL),
(41, '2023-06-15', 'JENIEE', 'puspita@gmail.com', '08755161077', 'bahasa10', 'deadline tgl 31', '', '2023-06-23 23:02:00', NULL),
(42, '2023-06-15', 'Rose', 'blackpink@official', '08755161077', 'ips10', 'deadline tgl 31', '', '2023-06-27 23:06:00', NULL),
(43, '2023-06-15', '', '', '', 'b_indonesia', '', 'Transfer', '0000-00-00 00:00:00', NULL),
(44, '2023-06-15', 'imtihana khofifah', 'hanakhf@gmail.com', '08755161077', 'pengembangan_web', '', '', '2023-06-18 08:06:00', NULL),
(45, '2023-06-15', 'imtihana khofifah', 'hanakhf@gmail.com', '08755161077', 'pengembangan_web', '', 'Transfer', '2023-06-18 08:06:00', NULL),
(46, '2023-06-15', 'shinta', 'shintaamaliaazhara@gmail.com', '08755161077', 'pemrograman', '', 'ewllet', '2023-06-23 20:08:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datapelanggan`
--
ALTER TABLE `datapelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datapelanggan`
--
ALTER TABLE `datapelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
