-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2025 at 03:53 AM
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
-- Database: `dbservicemotor`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `part_tambahan` text DEFAULT NULL,
  `total_pembayaran` decimal(10,2) DEFAULT NULL,
  `tanggal_pembayaran` date DEFAULT NULL,
  `id_pendaftaran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `part_tambahan`, `total_pembayaran`, `tanggal_pembayaran`, `id_pendaftaran`) VALUES
(1, 'Oli mesin', 200000.00, '2025-01-10', 1),
(2, 'Kampas rem', 350000.00, '2025-01-11', 2),
(6, '0', 75000.00, '2025-02-26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nopol` varchar(20) DEFAULT NULL,
  `type_motor` varchar(50) DEFAULT NULL,
  `paket_service` varchar(50) DEFAULT NULL,
  `keluhan` text DEFAULT NULL,
  `harga_service` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `nama`, `alamat`, `nopol`, `type_motor`, `paket_service`, `keluhan`, `harga_service`) VALUES
(1, 'Budi Santoso', 'Jl. Merdeka No. 1', 'AB 1234 CD', 'Honda Vario', 'service_ringan', 'Mesin berisik', 75000.00),
(2, 'Rina Ayu', 'Jl. Maju No. 2', 'EF 5678 GH', 'Yamaha NMAX', 'ganti_oli', 'Rem blong', 50000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pendaftaran` (`id_pendaftaran`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pendaftaran`) REFERENCES `pendaftaran` (`id_pendaftaran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
