-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 25, 2020 at 11:50 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.8

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
  `visi` varchar(256) NOT NULL,
  `misi` varchar(256) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `totalsuara` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_calon`
--

INSERT INTO `tb_calon` (`id`, `namacalon`, `visi`, `misi`, `foto`, `totalsuara`) VALUES
('5fe5b717afa03', 'Indah Chaesarawati', '<p>Menjadikan Keluarga BEM UBSI Bogor Sebagai Lembaga Yang Sinergis, Berkualitas, Unggul Dan Inovasi', '<p>1. Mewujudkan BEM UBSI Bogor Sebagai wadah utama mengalang aspirasi mahasiswa, oleh mahasiswa dan untuk mahasiswa</p><p>2. Melahirkan Mahasiswa yang aktif, solutif dan kreatif dalam mengelola isu s', '5fe5b717afa03.jpg', 0),
('5fe5b7414a33e', 'Thifal Pratama sanjaya', '<p>Terbentuknya BEM UBSI Bogor yang berkolaborasi aktif, dan bersinergi. Demi terwujud nya lingkunga', '<p>1.Membangun hubungan harmonis antar elemen baik internal maupun eksternal kampus\\</p><p>2. Mendorong pengalaman tridharma perguruan tinggi</p><p>3. Mengoptimalkan fungsi advokasi mahasiswa</p><p>4.', '5fe5b7414a33e.jpg', 0),
('5fe5b76b4ff33', 'Elis Setiawati', '<p>Mewujudkan aspirasi mahasiswa dan juga membantu mewujudkan generasi muda yang aktif inovatif dan ', '<p>1. Mengadakan kegiatan rutin bakti sosial</p><p>2. Menciptakan kegiatan program yang bersifat kegiatan keterampilan(kulikuler &amp; ekstrakulikuler)</p><p>3. Menciptakan kegiatan bermanfaat di luar', '5fe5b76b4ff33.jpg', 0);

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
('5fe591340e9f8', '12180308', 'ad91d1c567d83177dec11803c9ff858b', 'surya intan permana', '', '');

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
