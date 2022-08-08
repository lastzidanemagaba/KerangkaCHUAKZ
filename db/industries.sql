-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2022 at 10:59 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `industries`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_dinas`
--

CREATE TABLE `jadwal_dinas` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_shift` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_dinas`
--

INSERT INTO `jadwal_dinas` (`id`, `id_user`, `tanggal`, `id_shift`) VALUES
(1, 4, '2022-07-01', 0),
(2, 4, '2022-07-02', 4),
(3, 4, '2022-07-03', 2),
(4, 4, '2022-07-04', 2),
(5, 4, '2022-07-05', 2),
(6, 4, '2022-07-06', 2),
(7, 4, '2022-07-07', 2),
(8, 4, '2022-07-08', 2),
(9, 4, '2022-07-09', 2),
(10, 4, '2022-07-10', 2),
(11, 4, '2022-07-11', 3),
(12, 4, '2022-07-12', 3),
(13, 4, '2022-07-13', 3),
(14, 4, '2022-07-14', 3),
(15, 4, '2022-07-15', 3),
(16, 4, '2022-07-16', 3),
(17, 4, '2022-07-17', 3),
(18, 4, '2022-07-18', 3),
(19, 4, '2022-07-19', 3),
(20, 4, '2022-07-20', 3),
(22, 4, '2022-07-22', 3),
(23, 4, '2022-07-23', 3),
(24, 4, '2022-07-24', 3),
(25, 4, '2022-07-25', 3),
(26, 4, '2022-07-26', 3),
(27, 4, '2022-07-27', 3),
(28, 4, '2022-07-28', 3),
(29, 4, '2022-07-29', 3),
(30, 4, '2022-07-30', 2),
(31, 4, '2022-05-06', 1),
(32, 4, '2022-05-07', 0),
(33, 4, '2022-05-10', 1),
(34, 4, '2022-05-01', 4),
(35, 4, '2022-07-28', 2),
(36, 4, '2022-08-01', 1),
(37, 4, '2022-08-02', 2),
(38, 4, '2022-08-03', 2),
(39, 4, '2022-08-04', 2),
(40, 4, '2022-08-05', 2),
(41, 4, '2022-08-06', 2),
(42, 4, '2022-08-07', 2),
(43, 4, '2022-08-08', 2),
(44, 4, '2022-08-09', 2),
(45, 4, '2022-08-10', 2),
(46, 4, '2022-08-11', 2),
(47, 4, '2022-08-12', 2),
(48, 4, '2022-08-13', 2),
(49, 4, '2022-08-14', 2),
(50, 4, '2022-08-15', 2),
(51, 4, '2022-08-16', 2),
(52, 4, '2022-08-17', 2),
(53, 4, '2022-06-04', 1),
(54, 4, '2022-06-05', 0),
(55, 4, '2022-06-06', 0),
(56, 4, '2022-06-11', 0),
(57, 4, '2022-06-12', 0),
(58, 4, '2022-06-13', 0),
(59, 4, '2022-06-14', 0),
(60, 4, '2022-06-15', 0),
(61, 4, '2022-05-08', 0),
(62, 4, '2022-05-09', 0),
(63, 4, '2022-05-02', 4),
(64, 4, '2022-05-03', 4),
(65, 4, '2022-05-04', 4),
(66, 4, '2022-05-05', 4),
(67, 4, '2022-08-18', 2),
(68, 4, '2022-08-19', 2),
(69, 4, '2022-08-20', 2),
(70, 7, '2022-08-01', 2),
(71, 7, '2022-08-02', 2),
(72, 7, '2022-08-03', 2),
(73, 7, '2022-08-06', 2),
(74, 7, '2022-08-04', 2),
(75, 7, '2022-08-05', 2),
(76, 7, '2022-08-07', 2),
(77, 7, '2022-08-08', 2),
(78, 7, '2022-08-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `level_shift`
--

CREATE TABLE `level_shift` (
  `id` int(11) NOT NULL,
  `kode` varchar(16) NOT NULL,
  `shift` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_shift`
--

INSERT INTO `level_shift` (`id`, `kode`, `shift`) VALUES
(0, 'L', 'Libur'),
(1, 'P', 'Pagi'),
(2, 'S', 'Siang'),
(3, 'SR', 'Sore'),
(4, 'M', 'Malam'),
(5, 'C', 'Cuti');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `jenis_kelamin`, `telp`, `alamat`) VALUES
('10110470110', 'Ade Zenudin Bimashita', 'Laki-laki', '08199288272', 'Tegal'),
('10110470111', 'Ani Lestari', 'Perempuan', '089228827727', 'Jakarta'),
('10110470112', 'Imam Maulana', 'Laki-laki', '08561777166', 'Bandung'),
('10110470113', 'Siska Melina Rachman', 'Perempuan', '0828817717', 'Bandung'),
('10110470114', 'Diki Somantri', 'Laki-laki', '081662662771', 'Padang');

-- --------------------------------------------------------

--
-- Table structure for table `user_list`
--

CREATE TABLE `user_list` (
  `id` int(11) NOT NULL,
  `nip` varchar(64) NOT NULL,
  `nama_lengkap` varchar(64) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `email` varchar(64) NOT NULL,
  `id_level` int(11) NOT NULL COMMENT '1sadm, 2spv, 3adm, 4ptgs',
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_list`
--

INSERT INTO `user_list` (`id`, `nip`, `nama_lengkap`, `username`, `password`, `no_hp`, `email`, `id_level`, `status`) VALUES
(1, '12345', 'Test Superadmin', 'testsuperadmin', '47aafdea08632dd73b61a81e5909ea25', '08123456789', 'testsuperadmin@gmail.com', 1, 1),
(2, '123456', 'Test Supervisor', 'testsupervisor', '65748fd11d2a65e145d22fa5d09a657d', '08123456789', 'testsupervisor@gmail.com', 2, 1),
(4, '123', 'Test Petugass', 'testpetugas', '52d6c34d642d7bd0d0c7267854754d9a', '08123456789', 'testpetugas@gmail.com', 4, 1),
(5, '12345', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '08123456789', 'admin@gmail.com', 3, 1),
(6, '127.01.05', 'Gabriela', 'gabriela', '276e697e74e8b5264465139a480db556', '081227105698', 'gabriela@gmail.com', 1, 1),
(7, '1', 'Petugas 2', 'petugas2', 'ac5604a8b8504d4ff5b842480df02e91', '081919911', 'petugas@gmail.com', 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal_dinas`
--
ALTER TABLE `jadwal_dinas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_shift`
--
ALTER TABLE `level_shift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `user_list`
--
ALTER TABLE `user_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal_dinas`
--
ALTER TABLE `jadwal_dinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `level_shift`
--
ALTER TABLE `level_shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_list`
--
ALTER TABLE `user_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
