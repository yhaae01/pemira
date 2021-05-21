-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 21, 2021 at 07:01 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epemilos`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
('1', 'admin', '111');

-- --------------------------------------------------------

--
-- Table structure for table `tb_calon`
--

CREATE TABLE `tb_calon` (
  `id` varchar(50) NOT NULL,
  `namacalon` varchar(50) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `foto` varchar(50) NOT NULL,
  `totalsuara` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_calon`
--

INSERT INTO `tb_calon` (`id`, `namacalon`, `visi`, `misi`, `foto`, `totalsuara`) VALUES
('60a7512319661', 'Surya Intan Permana', '<p>Mewujudkan lembaga eksekutif yang aktif dalam mewujudkan pengembangan minat dan bakat di universitas dan masyarakat Indonesia keseluruhan.</p>', '<ul><li>Bisa memberikan wadah dalam mengembangkan minat dan bakat mahasiswa.</li><li>Bisa memberikan pelayanan dan manfaat bagi seluruh mahasiswa.</li><li>Mampu menciptakan dan mengembangkan nilai pengabdian serta pelayanan mahasiswa.</li><li>Mampu menanamkan cinta budaya dan tanah air pada mahaiswa.</li></ul>', '60a7512319661.jpg', 0),
('60a75ab1d743b', 'Ahmad Maulana Nasution', '<p>Mewujudkan mahasiswa Milenial yang aktif, kreatif dan bertanggung jawab yang mampu mengembangkan kampus dan masyarakat Indonesia.</p>', '<ol><li>Mampu mendukung dan menyelenggarakan kegiatan di kampus dan luar kampus.</li><li>Menampung aspirasi dan memecahkan masalah mahasiswa dengan prinsip kekeluargaan.</li><li>Menyelenggarakan program pengembangan bakat dan minat seluruh mahasiswa.</li><li>Mampu bekerja sama untuk mencapai tujuan BEM sebagai organisasi mahasiswa yang bersinergi.</li></ol>', '60a75ab1d743b.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengawas`
--

CREATE TABLE `tb_pengawas` (
  `id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `namapengawas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengawas`
--

INSERT INTO `tb_pengawas` (`id`, `username`, `password`, `namapengawas`) VALUES
('5c91075cc2', 'fariz', '12', 'Fariz Andifa'),
('5e7b697b672b2', 'Fauziah', '12', 'Siti Awaliatul Fauziah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id` varchar(255) NOT NULL,
  `nis` varchar(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `namasiswa` varchar(50) NOT NULL,
  `suara` varchar(255) NOT NULL,
  `absen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id`, `nis`, `password`, `namasiswa`, `suara`, `absen`) VALUES
('5fe591340e9f8', '12180308', 'ad91d1c567d83177dec11803c9ff858b', 'surya intan permana', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tb_calon`
--
ALTER TABLE `tb_calon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengawas`
--
ALTER TABLE `tb_pengawas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suara` (`suara`,`absen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
