-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 28, 2021 at 12:58 AM
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
('60b03c9c3c527', 'Surya Intan Permana', '<p>Membentuk Badan Eksekutif Mahasiswa yang aktif sebagai pionir dalam pergerakan untuk mewujudkan mahasiswa yang berkompeten dan memiliki integritas terhadap problematika yang terjadi di tengah masyarakat.</p>', '<ol><li>Memotivasi sesama rekan mahasiswa agar menumbuhkan daya saing yang tinggi dan produktivitas yang berdampak di era teknologi yang dinamis di tengah masyarakat.</li><li>Menjadikan BEM sebagai mediator antara universitas dan mahasiswa dalam berkomunikasi dan berdiskusi, juga menjadi penampung dan pelaksana aspirasi mahasiswa.</li><li>Mendukung pertumbuhan mahasiswa yang memiliki intelektual tinggi dan keberanian yang besar dalam menanggapi segala bentuk perubahan.</li></ol>', 'calon_1622162588.png', 2),
('60b03cc48c1c0', 'Ahmad Maulana', '<p>Menjadikan BEM sebagai wadah penerima aspirasi mahasiswa, sekaligus penggerak dan pelaksana aspirasi mahasiswa yang relevan bagi mahasiswa dan universitas, juga menciptakan BEM sebagai organisasi yang jujur, adil, disiplin, dan berakhlak mulia dalam lingkup masyarakat maupun kampus.</p>', '<ol><li>Membuka diri terhadap masukan yang diberikan mahasiswa maupun universitas demi pengembangan diri BEM yang lebih baik untu kke depannya.</li><li>Mendukung kemajuan organisasi/ UKM yang berada di bawah naungan universitas.</li><li>Menjalin komunikasi yang harmonis dengan organisasi/ UKM secara internal maupun eksternal guna mewujudkan visi misi BEM dan juga visi dan misi organisasi/ UKM</li><li>Mengadakan kegiatan sosial yang memberi dampak positif terhadap lingkungan sekitar.</li></ol>', 'calon_1622162628.jpg', 0),
('60b03d1437ad7', 'Eka Wardana', '<p>Mewujudkan BEM yang independen, unggul, berkualitas, aspiratif, dan progresif, guna menunaikan tugas yang telah dipercayakan mahasiswa dan universitas kepada BEM</p>', '<ol><li>Menjadi sebuah wadah yang transparan bagi aspirasi mahasiswa dan menindaklanjuti aspirasi tersebut agar bisa diwujudkan secara nyata di lingkup universitas dan masyarakat</li><li>Mengadakan kegiatan untuk pengembangan diri mahasiswa secara rutin, sehingga muncul bibit bibit unggul dari mahasiswa</li><li>Menjadi organisasi yang mandiri terhadap pengadaan kegiatan, namun tetap bertanggung jawab baik terhadap universitas maupun mahasiswa.</li></ol>', 'calon_1622162708.png', 0);

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
('5fe591340e9f8', '12180308', 'ad91d1c567d83177dec11803c9ff858b', 'surya intan permana', '60b03c9c3c527', '5fe591340e9f8'),
('60ad918ab3c52', '12180310', 'ecf3a6a1857c750142183ce938185f0f', 'ahmad maulana', '60b03c9c3c527', '60ad918ab3c52'),
('60ad91d969057', '12180311', '32250170a0dca92d53ec9624f336ca24', 'eka wardana', '0', '0');

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
