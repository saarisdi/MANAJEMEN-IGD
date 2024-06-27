-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2024 at 07:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemenigd`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `nama`, `password`, `no_telp`) VALUES
(1, 'admin', 'admin', '$2y$10$oa7.RWe8fogJdntPvf8eh.EWHXfQiNU53Bx8btdPiGt0kKaM2VaHy', '456');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokter`
--

CREATE TABLE `tbl_dokter` (
  `no` int(30) NOT NULL,
  `id` varchar(25) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `jadwal` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_dokter`
--

INSERT INTO `tbl_dokter` (`no`, `id`, `nama`, `keterangan`, `jadwal`) VALUES
(1, 'DR01', 'dr. Nobita, Sp.BTKV', 'Spesialis Bedah Toraks, Jantung, dan Pembuluh Darah', 'Jumat (09.00 - 19.00)'),
(2, 'DR02', 'dr. Doraemon, Sp.PD', 'Spesialis Penyakit Dalam', 'Senin (09.00 - 20.00)'),
(3, 'DR03', 'dr. Shizuka, Sp. A', 'Spesialis Anak', 'Rabu (07.00 - 16.00)'),
(4, 'DR04', 'dr. Dorami, Sp. OT', 'Spesialis Bedah Tulang dan Sendi ', 'Selasa (06.00 - 13.00)'),
(5, 'DR05', 'dr. Giant, Sp.BU', 'Spesialis Bedah Umum', 'Selasa (08.00 - 18.00)');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kasur`
--

CREATE TABLE `tbl_kasur` (
  `no` int(50) NOT NULL,
  `id` varchar(25) NOT NULL,
  `type_kasur` varchar(250) NOT NULL,
  `jumlah_kasur` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kasur`
--

INSERT INTO `tbl_kasur` (`no`, `id`, `type_kasur`, `jumlah_kasur`) VALUES
(1, '101', 'Type A', 20),
(2, '102', 'Type B', 11),
(3, '103', 'Type C', 7),
(4, '104', 'Type D', 12),
(5, '105', 'Type E', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keluar`
--

CREATE TABLE `tbl_keluar` (
  `no` int(50) NOT NULL,
  `id` varchar(50) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `jam_keluar` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_keluar`
--

INSERT INTO `tbl_keluar` (`no`, `id`, `nama`, `tanggal_keluar`, `jam_keluar`) VALUES
(1, 'PS01', 'Upin', '2024-09-23', '10:09:22'),
(2, 'PS02', 'Ehsan', '2024-07-05', '20:07:35'),
(3, 'PS03', 'Fizi', '2024-09-13', '21:00:00'),
(4, 'PS04', 'Mail', '2024-11-09', '23:00:05'),
(5, 'PS05', 'Opet', '2024-06-30', '21:01:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_masuk`
--

CREATE TABLE `tbl_masuk` (
  `no` int(50) NOT NULL,
  `id` varchar(25) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `jam_masuk` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_masuk`
--

INSERT INTO `tbl_masuk` (`no`, `id`, `nama`, `tanggal_masuk`, `jam_masuk`) VALUES
(1, 'PS01', 'Upin', '2024-06-30', '18:25:28'),
(2, 'PS02', 'Ehsan', '2024-06-28', '22:11:08'),
(3, 'PS03', 'Fizi', '2024-08-15', '22:00:00'),
(4, 'PS04', 'Mail', '2024-08-28', '12:01:00'),
(0, 'PS05', 'opet', '2024-06-28', '02:19:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `no` int(55) NOT NULL,
  `id` varchar(30) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `umur` int(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `ket_masuk` varchar(30) NOT NULL,
  `ket_kesehatan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`no`, `id`, `nama`, `umur`, `alamat`, `ket_masuk`, `ket_kesehatan`) VALUES
(1, 'PS01', 'upin', 10, 'kp. durian runtuh', 'bpjs', 'botak'),
(1, 'PS02', 'ehsan', 10, 'kp. durian runtuh', 'umum', 'obes'),
(0, 'PS03', 'fizi', 8, 'kp. drurian runtuh', 'umum', 'ceking'),
(0, 'PS04', 'mail', 9, 'kp. drurian runtuh', 'bpjs', 'terlalu kaya'),
(5, 'PS05', 'jarjit', 10, 'kp. durian runtuh', 'umum', 'india');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perawat`
--

CREATE TABLE `tbl_perawat` (
  `no` int(50) NOT NULL,
  `id` varchar(25) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `jadwal` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_perawat`
--

INSERT INTO `tbl_perawat` (`no`, `id`, `nama`, `keterangan`, `jadwal`) VALUES
(1, 'PW01', 'Feng', 'Tim 1', 'Jumat (09.00 - 17.00)'),
(2, 'PW02', 'Ying', 'Tim 2', 'Senin (09.00 - 20.00)'),
(3, 'PW03', 'Yaya', 'Tim 1', 'Selasa (09.00 - 11.00)'),
(4, 'PW04', 'Ochobot', 'Tim 1', 'Kamis (09.00 - 16.00)'),
(5, 'PW05', 'Gopal', 'Tim 2', 'Rabu (09.00 - 12.00)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kasur`
--
ALTER TABLE `tbl_kasur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_keluar`
--
ALTER TABLE `tbl_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_masuk`
--
ALTER TABLE `tbl_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_perawat`
--
ALTER TABLE `tbl_perawat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
