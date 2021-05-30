-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 30, 2021 at 10:45 PM
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
('60b03c9c3c527', 'Surya Intan Permana', '<p>Membentuk Badan Eksekutif Mahasiswa yang aktif sebagai pionir dalam pergerakan untuk mewujudkan mahasiswa yang berkompeten dan memiliki integritas terhadap problematika yang terjadi di tengah masyarakat.</p>', '<ol><li>Memotivasi sesama rekan mahasiswa agar menumbuhkan daya saing yang tinggi dan produktivitas yang berdampak di era teknologi yang dinamis di tengah masyarakat.</li><li>Menjadikan BEM sebagai mediator antara universitas dan mahasiswa dalam berkomunikasi dan berdiskusi, juga menjadi penampung dan pelaksana aspirasi mahasiswa.</li><li>Mendukung pertumbuhan mahasiswa yang memiliki intelektual tinggi dan keberanian yang besar dalam menanggapi segala bentuk perubahan.</li></ol>', 'calon_1622162588.png', 0),
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
('5c91075cc2', 'fariz', '12', 'Fariz Andifa');

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
('60b40f423dac3', '12191021', '4da9ab0b80f718fa2ec757c9146fc05f', 'thifal pratama sanjaya', '0', '0'),
('60b40f591f54e', '12182270', 'a4da0bcb2d51e8f82de8025f36d4df3f', 'elis setiawati', '0', '0'),
('60b40f667a44f', '12191047', '0b62f01dd3683a5e7ecd476035414ef1', 'indah chaesarawati', '0', '0'),
('60b40f785ccc0', '11190700', 'd645393f1862b5947a3cb55ae5f62929', 'indri gusti rahayu', '0', '0'),
('60b40f8168d3b', '12182186', 'b8cb2ed9610bf5fc1ffd52d56c2ba8d9', 'via petriani', '0', '0'),
('60b40f8f2af2f', '11191038', '18b6bce4c16cb0de29b5acb3a721924d', 'fitria anggraini', '0', '0'),
('60b40f98d8111', '12182423', 'ee864925a16ffb6039e00fa54bc5717b', 'dea ratna furi', '0', '0'),
('60b40fa506909', '12192620', '175b9930ec49188bb17c7af83fda9b88', 'radityo abshar pramudya', '0', '0'),
('60b40fae73cc2', '12192114', 'd3b9895937323ecef17bed42e997260e', 'siti addindi hasanah', '0', '0'),
('60b40fb7c3ea7', '12191767', '70209986e719a73a5b5dd2743463440c', 'andika faturrachman', '0', '0'),
('60b40fc4e99fd', '11190960', 'fa2a5155bf4f67cb982ab58f75244ee7', 'qahharani diwi', '0', '0'),
('60b40fcda5856', '11190597', 'c28d2b7dcfb4b9e66118581889b6234f', 'gilang ramadhan', '0', '0'),
('60b40fd35d537', '11190429', '8d3f8ac7376661f9f4c4eb481fb3ffc3', 'rani', '0', '0'),
('60b40fe067aa1', '11190985', 'ade81506ecd555561d58bf71a543c946', 'inneke shelly koesherawati', '0', '0'),
('60b40fefbfcf6', '12182309', '1fc86a02a06234e4030ac8fbc704c9a9', 'pynthia christiana ringkin', '0', '0'),
('60b40ff9a3a73', '12191532', '579214e21f2c43c3c2ecd5971aa7197b', 'indah fitriani', '0', '0'),
('60b4100201a07', '12170789', 'd10c07188c32137d91b0a75076e54882', 'abdul aziz', '0', '0'),
('60b4100c90bd5', '12191819', 'e1446dd82be92baec247a55c08597639', 'rifqy akhbar alfiansyah', '0', '0'),
('60b4101793f0f', '12192505', '3e370f1c9e2dbff1b07b13cccda2f95e', 'lucky nursarastri', '0', '0'),
('60b4156a037b5', '12180308', 'ad91d1c567d83177dec11803c9ff858b', 'surya intan permana', '0', '0');

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
