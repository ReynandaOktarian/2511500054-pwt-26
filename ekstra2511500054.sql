-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 05, 2026 at 05:00 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jadwalguru`
--

-- --------------------------------------------------------

--
-- Table structure for table `ekstra2511500054`
--

CREATE TABLE `ekstra2511500054` (
  `id_ekstra` varchar(5) NOT NULL,
  `nama_ekstra` varchar(50) NOT NULL,
  `ket` varchar(20) NOT NULL,
  `semester` int(5) NOT NULL,
  `thn_ajaran` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ekstra2511500054`
--

INSERT INTO `ekstra2511500054` (`id_ekstra`, `nama_ekstra`, `ket`, `semester`, `thn_ajaran`) VALUES
('1', 'Aec', 'Esport, Mole', 4, '2020/2021');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ekstra2511500054`
--
ALTER TABLE `ekstra2511500054`
  ADD PRIMARY KEY (`id_ekstra`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
