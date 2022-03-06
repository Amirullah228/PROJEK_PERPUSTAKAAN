-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2021 at 12:13 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `tmp_l` varchar(30) NOT NULL,
  `tanggal` varchar(25) NOT NULL,
  `jk` varchar(25) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `kls` varchar(25) NOT NULL,
  `thn_m` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nim`, `nama`, `tmp_l`, `tanggal`, `jk`, `jurusan`, `kls`, `thn_m`) VALUES
(1, 2184007, 'Nurul Hidayah', 'Sukarjo Mesim', '2021-11-17', 'perempuan', 'IPS', 'X', '2018-11-01'),
(2, 2184002, 'Juned', 'palembang', '2001-06-11', 'laki-laki', 'IPA', 'XII', '2021-11-04'),
(3, 2184003, ' Samsurizal', 'Malaysia', '1993-11-01', 'laki-laki', 'IPA', 'XII', '2001-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `th_terbit` date NOT NULL,
  `isbn` int(11) NOT NULL,
  `jml_buku` varchar(25) NOT NULL,
  `lokasi` text NOT NULL,
  `tgl_input` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul_buku`, `pengarang`, `penerbit`, `stok`, `th_terbit`, `isbn`, `jml_buku`, `lokasi`, `tgl_input`) VALUES
(1, 'Javascript Dasar', 'Ibnu Hajim Dr, Skom. Mkom', 'Jago Tekno', 110, '2011-11-03', 9342344, '120 Halaman', 'Bandung Jl,Simput', '2013-11-14'),
(2, 'Pasti Bisa', 'Mari Mencoba', 'jangan takut gagal', 0, '2008-01-23', 9322344, '102 Halaman', 'Jakarta', '2019-02-23'),
(3, 'SQL Yog Dasar', 'Jangan takut gagal', 'Teknologi', 35, '2014-02-04', 932, '102 Halaman', 'Surabaya', '2010-06-17'),
(4, 'Node JS', 'Sandhika Galih', 'WebUnpas', 50, '2019-01-31', 9322344, '102 Halaman', 'Bandung', '2021-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `idbuku` int(11) NOT NULL,
  `bukunya` varchar(30) NOT NULL,
  `idpinjam` varchar(25) NOT NULL,
  `tgl_p` varchar(25) NOT NULL,
  `tgl_k` varchar(25) NOT NULL,
  `status` varchar(8) NOT NULL DEFAULT 'Dipinjam',
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`id_pinjam`, `idbuku`, `bukunya`, `idpinjam`, `tgl_p`, `tgl_k`, `status`, `stok`) VALUES
(22, 1, 'Javascript Dasar', 'Nurul Hidayah', '21-11-2021', '28-11-2021', 'Selesai', 0);

--
-- Triggers `pinjam`
--
DELIMITER $$
CREATE TRIGGER `updatestok` AFTER INSERT ON `pinjam` FOR EACH ROW BEGIN
	UPDATE buku SET stok=stok-		 NEW.stok WHERE id = NEW.idbuku;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `foto`, `nama`, `email`, `password`) VALUES
(20, 'dcbe58b5a89c43291f5fa4d08a980278.png', 'Amirullah', 'coba@gmail.com', '123456'),
(21, '31996e39c496908f753c7448d2268f38.png', 'Nurul Hidayah', 'nur@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
