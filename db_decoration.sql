-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2022 at 09:27 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_decoration`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_acara` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `id_user`, `id_paket`, `alamat`, `tgl_acara`) VALUES
(1, 2, 3, 'Jl. Siliwangi No. 47 Majalengka', '2022-07-27'),
(2, 2, 1, 'Jl.Sangkuriang', '2022-08-18'),
(6, 5, 1, 'ada', '2022-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `nama_paket` varchar(50) NOT NULL,
  `harga` int(12) NOT NULL,
  `fasilitas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `harga`, `fasilitas`) VALUES
(1, 'PAKET 1', 20000000, '- MAKE UP PENGANTIN\r\n- BAJU AKAD PENGANTIN\r\n- 2 SET BAJU RESEPSI\r\n- 4 PAGAR AYU PLUS MAKEUP\r\n- BAJU IBU HAJAT PLUS MAKEUP\r\n- BAJU BAPAK HAJAT\r\n- MELATI SET SUNDA SIGER\r\n- KIDUNG\r\n- FOTO DOKUMENTASI\r\n- DEKORASI PELAMINAN (6 METER)\r\n- TENDA 5 LOKAL (6x4 METER)\r\n- DEKORASI ATAP\r\n- PANGGUNG PELAMINAN\r\n- 1 SET ALAT PERASMANAN (BESAR)\r\n- MEJA TAMU\r\n- 2 SET MEJA VIP\r\n- 100 KURSI\r\n- BACKGROUND TENDA FULL                    '),
(2, 'PAKET 2', 18000000, '- MAKEUP PENGANTIN\r\n- BAJU AKAD PENGANTIN\r\n- 2 SET BAJU RESEPSI\r\n- 4 PAGAR AYU PLUS MAKEUP\r\n- BAJU IBU HAJAT PLUS MAKEUP\r\n- BAJU BAPAK HAJAT\r\n- MELATI SET SUNDA SIGER\r\n- KIDUNG\r\n- FOTO DOKUMENTASI\r\n- DEKORASI PELAMINAN (6 METER)\r\n- TENDA 4 LOKAL (6x4 METER)\r\n- DEKORASI ATAP\r\n- PANGGUNG PELAMINAN\r\n- 1 SET ALAT PERASMANAN (BESAR)\r\n- MEJA TAMU\r\n- 100 KURSI\r\n- BACKGROUND TENDA FULL                                                            '),
(3, 'PAKET 3', 15000000, '                        - MAKEUP PENGANTIN\r\n- BAJU AKAD PENGANTIN\r\n- 2 SET BAJU RESEPSI\r\n- 4 PAGAR AYU PLUS MAKEUP\r\n- BAJU IBU HAJAT PLUS MAKEUP\r\n- BAJU BAPAK HAJAT\r\n- MELATI SET SUNDA SIGER\r\n- KIDUNG\r\n- FOTO DOKUMENTASI\r\n- DEKORASI PELAMINAN (6 METER)\r\n- TENDA 3 LOKAL (6x4 METER)\r\n- DEKORASI ATAP\r\n- PANGGUNG PELAMINAN\r\n- 1 SET ALAT PERASMANAN (KECIL)                                        ');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL,
  `waktu_pembayaran` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_booking`, `waktu_pembayaran`) VALUES
(1, 1, '2022-07-20 10:30:00'),
(2, 1, '2022-06-14 16:00:00'),
(3, 2, '2022-06-28 04:48:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `no_hp` char(13) NOT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('admin','member','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `no_hp`, `nik`, `username`, `password`, `role`) VALUES
(1, 'Taufik Iskandar', '', NULL, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'Doni', '877272811', '320816666666', 'doni', '2da9cd653f63c010b6d6c5a5ad73fe32', 'member'),
(5, 'DWi', '0877272811', '3208118220202222', 'dwi', '7aa2602c588c05a93baf10128861aeb9', 'member'),
(6, 'Jono Sajalah', '0892972398', '', 'jono', '42867493d4d4874f331d288df0044baa', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`),
  ADD KEY `id_paket` (`id_paket`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_booking` (`id_booking`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_booking`) REFERENCES `booking` (`id_booking`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
