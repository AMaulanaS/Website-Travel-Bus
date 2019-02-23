-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2019 at 03:31 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travelbus2`
--

-- --------------------------------------------------------

--
-- Table structure for table `kursi`
--

CREATE TABLE `kursi` (
  `kursid` varchar(3) NOT NULL,
  `brgkt` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kursi`
--

INSERT INTO `kursi` (`kursid`, `brgkt`) VALUES
('A1', 0),
('A2', 0),
('A3', 0),
('A4', 0),
('B1', 0),
('B2', 0),
('B3', 0),
('B4', 0),
('C1', 0),
('C2', 0),
('C3', 0),
('C4', 0),
('D1', 0),
('D2', 0),
('D3', 0),
('D4', 0),
('E1', 0),
('E2', 0),
('E3', 0),
('E4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_transaksi` int(30) NOT NULL,
  `kode_booking` varchar(30) NOT NULL,
  `tgl` date NOT NULL,
  `jalur` varchar(30) NOT NULL,
  `jml_kursi` int(5) NOT NULL,
  `tmp_duduk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_transaksi`, `kode_booking`, `tgl`, `jalur`, `jml_kursi`, `tmp_duduk`) VALUES
(1, '', '0000-00-00', '', 0, ''),
(2, '', '0000-00-00', '3', 2, 'B1,B2'),
(3, '', '0000-00-00', 'Semarang - Jogja (06.00 - 10.0', 2, 'C3,C4'),
(4, '', '2019-01-16', 'Semarang - Jogja (06.00 - 10.0', 2, 'A3,A4');

-- --------------------------------------------------------

--
-- Table structure for table `penumpang`
--

CREATE TABLE `penumpang` (
  `no` int(100) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jalur` varchar(30) NOT NULL,
  `tmp_duduk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rutetravel`
--

CREATE TABLE `rutetravel` (
  `id` int(11) NOT NULL,
  `jalur` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rutetravel`
--

INSERT INTO `rutetravel` (`id`, `jalur`) VALUES
(1, 'Semarang - Jogja (06.00 - 10.0'),
(3, 'Semarang - Surabaya (05.00 - 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kursi`
--
ALTER TABLE `kursi`
  ADD PRIMARY KEY (`kursid`),
  ADD UNIQUE KEY `kursi` (`kursid`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `rutetravel`
--
ALTER TABLE `rutetravel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jalur` (`jalur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_transaksi` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rutetravel`
--
ALTER TABLE `rutetravel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
