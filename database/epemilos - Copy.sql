-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2020 at 07:03 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `visi` varchar(100) NOT NULL,
  `misi` varchar(200) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `totalsuara` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_calon`
--

INSERT INTO `tb_calon` (`id`, `namacalon`, `visi`, `misi`, `foto`, `totalsuara`) VALUES
('5e634550d4aec', 'Indah Chaesarawati', 'Menjadikan Keluarga BEM UBSI Bogor Sebagai Lembaga Yang Sinergis, Berkualitas, Unggul Dan Inovasi', '1. Mewujudkan BEM UBSI Bogor Sebagai wadah utama mengalang aspirasi mahasiswa, oleh mahasiswa dan untuk mahasiswa\r\n2. Melahirkan Mahasiswa yang aktif, solutif dan kreatif dalam mengelola isu srategis\r', '5e634550d4aec.jpg', 0),
('5e654149db756', 'Thifal Pratama sanjaya', 'Terbentuknya BEM UBSI Bogor yang berkolaborasi aktif, dan bersinergi. Demi terwujud nya lingkungan k', '1.Membangun hubungan harmonis antar elemen baik internal maupun eksternal kampus\r\n2. Mendorong pengalaman tridharma perguruan tinggi\r\n3. Mengoptimalkan fungsi advokasi mahasiswa\r\n4. Menciptakan lingku', '5e654149db756.jpg', 0),
('5e654248cb5e4', 'Elis Setiawati', 'Mewujudkan aspirasi mahasiswa dan juga membantu mewujudkan generasi muda yang aktif inovatif dan per', '1. Mengadakan kegiatan rutin bakti sosial\r\n2. Menciptakan kegiatan program yang bersifat kegiatan keterampilan(kulikuler & ekstrakulikuler)\r\n3. Menciptakan kegiatan bermanfaat di luar jam kuliah (bela', '5e654248cb5e4.jpg', 0);

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
  `kelas` varchar(20) NOT NULL,
  `suara` varchar(255) NOT NULL,
  `absen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id`, `nis`, `password`, `namasiswa`, `kelas`, `suara`, `absen`) VALUES
('5e5fbe3461213', '12170596', 'c20ad4d76fe97759aa27a0c99bff6710', 'fariz andifa', '12.2B.13', '0', '5e5fbe3461213'),
('5e60f42ceacaf', '12182186', 'c20ad4d76fe97759aa27a0c99bff6710', 'via', '12.2C.13', '0', '5e60f42ceacaf'),
('5e6f0dc1aaec7', '12192505', 'c20ad4d76fe97759aa27a0c99bff6710', 'Lucky Nursarastri', '11.2B.13', '0', '5e6f0dc1aaec7');

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
