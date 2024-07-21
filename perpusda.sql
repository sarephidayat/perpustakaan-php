-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 21, 2024 at 03:54 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpusda`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int NOT NULL,
  `judul` varchar(200) NOT NULL,
  `isbn` varchar(200) NOT NULL,
  `penulis` varchar(200) NOT NULL,
  `tahun_terbit` varchar(200) NOT NULL,
  `penerbit` varchar(200) NOT NULL,
  `kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `isbn`, `penulis`, `tahun_terbit`, `penerbit`, `kategori`) VALUES
(2, 'Kebanggaan dan Prasangka', '978-1-85326-000-2', 'Jane Austin', '1813', 'T. Etergon', 'Romance'),
(4, 'Gatsby yang Agung', '978-1-85326-000-2', 'F. Scott Fitzgerald', '1925', 'Charles Scribner\'s Sons', 'Romance'),
(5, 'Moby Dick', '978-0-14-243724-7', 'Herman Melville', '1897', 'Harper & Brothers', 'Adventure'),
(6, 'Jane Eyre', '978-0-14-144114-6', 'Charlotte Brontë', '1989', 'Smith, Elder & Co.', 'Klasik');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pendidikan_terakhir` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `email`, `pendidikan_terakhir`, `alamat`) VALUES
(10, 'Nila Amadya Sari', 'nillaamadya@gmail.com', 'SARJANA', 'Dieng, Wonosobo'),
(11, 'Liliana Natsir', 'natsiropeng@gmail.com', 'DIPLOMA 2', 'Tahunan, Jepara'),
(12, 'Yoga Iskandar', 'yongkiforme@gmail.com', 'DIPLOMA 3', 'Tahunan, Jepara'),
(13, 'Hidayatusholihin', 'hidasholih@gmail.com', 'SARJANA', 'Ngaliyan, Semarang');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(5, 'syarif', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'hidayat', '827ccb0eea8a706c4c34a16891f84e7b'),
(7, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id` int NOT NULL,
  `nama` varchar(200) NOT NULL,
  `pekerjaan` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id`, `nama`, `pekerjaan`, `alamat`) VALUES
(6, 'Yoga Iskandar', 'Mahasiswa', 'Tahunan, Jepara'),
(7, 'Yongki Sikumbang', 'Wirausaha', 'Perumnas, Tahunan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
