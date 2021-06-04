-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 04 Jun 2021 pada 23.18
-- Versi server: 5.7.24
-- Versi PHP: 7.2.19

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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
('1', 'admin', '111');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_calon`
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
-- Dumping data untuk tabel `tb_calon`
--

INSERT INTO `tb_calon` (`id`, `namacalon`, `visi`, `misi`, `foto`, `totalsuara`) VALUES
('60b03c9c3c527', 'Surya Intan Permana', '<p>Membentuk Badan Eksekutif Mahasiswa yang aktif sebagai pionir dalam pergerakan untuk mewujudkan mahasiswa yang berkompeten dan memiliki integritas terhadap problematika yang terjadi di tengah masyarakat.</p>', '<ol><li>Memotivasi sesama rekan mahasiswa agar menumbuhkan daya saing yang tinggi dan produktivitas yang berdampak di era teknologi yang dinamis di tengah masyarakat.</li><li>Menjadikan BEM sebagai mediator antara universitas dan mahasiswa dalam berkomunikasi dan berdiskusi, juga menjadi penampung dan pelaksana aspirasi mahasiswa.</li><li>Mendukung pertumbuhan mahasiswa yang memiliki intelektual tinggi dan keberanian yang besar dalam menanggapi segala bentuk perubahan.</li></ol>', 'calon_1622162588.png', 0),
('60b03cc48c1c0', 'Ahmad Maulana', '<p>Menjadikan BEM sebagai wadah penerima aspirasi mahasiswa, sekaligus penggerak dan pelaksana aspirasi mahasiswa yang relevan bagi mahasiswa dan universitas, juga menciptakan BEM sebagai organisasi yang jujur, adil, disiplin, dan berakhlak mulia dalam lingkup masyarakat maupun kampus.</p>', '<ol><li>Membuka diri terhadap masukan yang diberikan mahasiswa maupun universitas demi pengembangan diri BEM yang lebih baik untu kke depannya.</li><li>Mendukung kemajuan organisasi/ UKM yang berada di bawah naungan universitas.</li><li>Menjalin komunikasi yang harmonis dengan organisasi/ UKM secara internal maupun eksternal guna mewujudkan visi misi BEM dan juga visi dan misi organisasi/ UKM</li><li>Mengadakan kegiatan sosial yang memberi dampak positif terhadap lingkungan sekitar.</li></ol>', 'calon_1622162628.jpg', 0),
('60b03d1437ad7', 'Eka Wardana', '<p>Mewujudkan BEM yang independen, unggul, berkualitas, aspiratif, dan progresif, guna menunaikan tugas yang telah dipercayakan mahasiswa dan universitas kepada BEM</p>', '<ol><li>Menjadi sebuah wadah yang transparan bagi aspirasi mahasiswa dan menindaklanjuti aspirasi tersebut agar bisa diwujudkan secara nyata di lingkup universitas dan masyarakat</li><li>Mengadakan kegiatan untuk pengembangan diri mahasiswa secara rutin, sehingga muncul bibit bibit unggul dari mahasiswa</li><li>Menjadi organisasi yang mandiri terhadap pengadaan kegiatan, namun tetap bertanggung jawab baik terhadap universitas maupun mahasiswa.</li></ol>', 'calon_1622162708.png', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengawas`
--

CREATE TABLE `tb_pengawas` (
  `id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `namapengawas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengawas`
--

INSERT INTO `tb_pengawas` (`id`, `username`, `password`, `namapengawas`) VALUES
('5c91075cc2', 'fariz', '12', 'Fariz Andifa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id` int(11) NOT NULL,
  `nis` varchar(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `namasiswa` varchar(50) NOT NULL,
  `suara` varchar(255) NOT NULL,
  `absen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id`, `nis`, `password`, `namasiswa`, `suara`, `absen`) VALUES
(2, '11200098', '11200098', 'SITI ARIFAH', '0', '1'),
(3, '11200125', '11200125', 'ANDIKA MARDIANSYAH', '0', '1'),
(4, '11200127', '11200127', 'CASAM', '0', '1'),
(5, '11200141', '11200141', 'UJANG FURKON', '0', '1'),
(6, '11200158', '11200158', 'SRI YULIANTI', '0', '1'),
(7, '11200195', '11200195', 'PUTRI RAHMADANI', '0', '1'),
(8, '11200199', '11200199', 'ELSA MAULIDIA', '0', '1'),
(9, '11200277', '11200277', 'MUHAMMAD RIDHO', '0', '1'),
(10, '11200313', '11200313', 'GILAR KAUTSAR', '0', '1'),
(11, '11200345', '11200345', 'GUNAWAN', '0', '1'),
(12, '11200418', '11200418', 'DIMAS DWI', '0', '1'),
(13, '11200541', '11200541', 'AYU LESTARI', '0', '1'),
(14, '12200015', '12200015', 'TRIYANTO KURNIAWAN', '0', '1'),
(15, '12200018', '12200018', 'DEVIRA FEBRIAN', '0', '1'),
(16, '12200054', '12200054', 'FEBI TANIA', '0', '1'),
(17, '12200102', '12200102', 'SUMANDO ARITONANG', '0', '1'),
(18, '12200112', '12200112', 'AYU NURAISYAH', '0', '1'),
(19, '12200319', '12200319', 'ALDAN JANUARSYAH', '0', '1'),
(20, '12200335', '12200335', 'MUHAMAD DHENI', '0', '1'),
(21, '12200479', '12200479', 'VIRGIAWAN TRI', '0', '1'),
(22, '12200487', '12200487', 'SULTAN PENGKUH', '0', '1'),
(23, '12200507', '12200507', 'IHSAN PRAHADI', '0', '1'),
(24, '12200541', '12200541', 'ARFAN KURNIANTO', '0', '1'),
(25, '12200570', '12200570', 'MURFID DZAKWAN', '0', '1'),
(26, '12200586', '12200586', 'ZAYAN SHA\'AT', '0', '1'),
(27, '12200589', '12200589', 'RIZAL SURYA', '0', '1'),
(28, '12200594', '12200594', 'DAFFA ALWAN', '0', '1'),
(29, '12200614', '12200614', 'ROBBY AKHROMAN', '0', '1'),
(30, '12200645', '12200645', 'FAUZAN RASYID', '0', '1'),
(31, '12200664', '12200664', 'GITA SEPTIA', '0', '1'),
(32, '12200680', '12200680', 'RIAN HIDAYAT', '0', '1'),
(33, '12200714', '12200714', 'FAHDIANTO MUHAMMAD', '0', '1'),
(34, '12200727', '12200727', 'KHOERUZZEN ARIP', '0', '1'),
(35, '12200731', '12200731', 'MUHAMMAD IKHSAN', '0', '1'),
(36, '12200764', '12200764', 'PUTRI CHAERUN', '0', '1'),
(37, '12200799', '12200799', 'ANITA ANANDA', '0', '1'),
(38, '12200823', '12200823', 'MAULVI AR', '0', '1'),
(39, '12200842', '12200842', 'HANIF ADI', '0', '1'),
(40, '12200850', '12200850', 'AZILLA RAMDANISA', '0', '1'),
(41, '12200860', '12200860', 'MUCHAMAD RIZKI', '0', '1'),
(42, '12200918', '12200918', 'RANA SHAFA', '0', '1'),
(43, '12200930', '12200930', 'MUHAMMAD ARYA', '0', '1'),
(44, '12200931', '12200931', 'SEPTIAN MUHAMAD', '0', '1'),
(45, '12200971', '12200971', 'ALDA AZIZAH', '0', '1'),
(46, '12200992', '12200992', 'MUHAMMAD IFDHAL', '0', '1'),
(47, '12200993', '12200993', 'NAUFAL FAHREZA', '0', '1'),
(48, '12201022', '12201022', 'FAISHAL FATHIN', '0', '1'),
(49, '12201099', '12201099', 'FAHRI RAHMAN', '0', '1'),
(50, '12201116', '12201116', 'TIRA DESIANA', '0', '1'),
(51, '12201229', '12201229', 'SRI INDAH', '0', '1'),
(52, '12201276', '12201276', 'EUIS SYAFARANI', '0', '1'),
(53, '12201277', '12201277', 'JUAN PUTRA', '0', '1'),
(54, '12201286', '12201286', 'NURUL ELVIDA', '0', '1'),
(55, '12201325', '12201325', 'REZZA ZIANA', '0', '1'),
(56, '12201347', '12201347', 'SYAFIRA REGHITA', '0', '1'),
(57, '12201431', '12201431', 'MUHAMMAD LUTFIANSYAH', '0', '1'),
(58, '12201502', '12201502', 'LINTAS RIANDHI', '0', '1'),
(59, '12201508', '12201508', 'MUHAMMAD RAJA', '0', '1'),
(60, '12200034', '12200034', 'ADITTIA NUGROHO', '0', '1'),
(61, '12200052', '12200052', 'MARTHALIA DEWI', '0', '1'),
(62, '12200175', '12200175', 'BUNGA FEBRIANI', '0', '1'),
(63, '12200293', '12200293', 'MUHAMMAD FIKRI', '0', '1'),
(64, '12200300', '12200300', 'FEBRI YANTO', '0', '1'),
(65, '12200302', '12200302', 'FEBRIANSYAH', '0', '1'),
(66, '12200370', '12200370', 'DIMAS AGUNG', '0', '1'),
(67, '12200434', '12200434', 'PUTRA RAIHAN', '0', '1'),
(68, '12200503', '12200503', 'GALIH NUGRAHA', '0', '1'),
(69, '12200504', '12200504', 'MUHAMMAD RIDHO', '0', '1'),
(70, '12200513', '12200513', 'YOHANA NODERISTA', '0', '1'),
(71, '12200550', '12200550', 'AHMAD ZULFIKAR', '0', '1'),
(72, '12200613', '12200613', 'LYVIA MAHARANI', '0', '1'),
(73, '12200699', '12200699', 'HILMAN RUSDIAN', '0', '1'),
(74, '12200717', '12200717', 'NABIL FAHRI', '0', '1'),
(75, '12200814', '12200814', 'RIN MEGAWATTY', '0', '1'),
(76, '12201020', '12201020', 'MUHAMMAD RIZQI', '0', '1'),
(77, '12201057', '12201057', 'ANGGI HANDIANTO', '0', '1'),
(78, '12201139', '12201139', 'FATHONI SIDIK', '0', '1'),
(79, '12201382', '12201382', 'IRVANTO RIZKI', '0', '1'),
(80, '11190023', '11190023', 'SILVY EKAVIA', '0', '1'),
(81, '11190265', '11190265', 'IAN FLEMINGS', '0', '1'),
(82, '11190307', '11190307', 'RISA GIANITA', '0', '1'),
(83, '11190537', '11190537', 'MIA KURNIA', '0', '1'),
(84, '11190741', '11190741', 'ADE RATIH', '0', '1'),
(85, '11190960', '11190960', 'QAHHARANI DIWI', '0', '1'),
(86, '11190985', '11190985', 'INNEKE SHELLY', '0', '1'),
(87, '11191038', '11191038', 'FITRIA ANGGRAINI', '0', '1'),
(88, '11191075', '11191075', 'MAI RAHAYU', '0', '1'),
(89, '11180213', '11180213', 'NOVI YANTI', '0', '1'),
(90, '11180648', '11180648', 'OKI SAPUTRA', '0', '1'),
(91, '11190164', '11190164', 'AYU NINGTIAS', '0', '1'),
(92, '11190385', '11190385', 'CHINTYA APRILLIA', '0', '1'),
(93, '11190434', '11190434', 'MULYADI', '0', '1'),
(94, '11190473', '11190473', 'ADITYA HERY', '0', '1'),
(95, '11190501', '11190501', 'LOLA MAYCHITA', '0', '1'),
(96, '11190758', '11190758', 'OKTO YOSEP', '0', '1'),
(97, '11190782', '11190782', 'SITI AISAH', '0', '1'),
(98, '11191072', '11191072', 'RUTH HANDAYANI', '0', '1'),
(99, '11191166', '11191166', 'REHAN BIMA', '0', '1'),
(100, '12183442', '12183442', 'RAY ARFANDI', '0', '1'),
(101, '12190442', '12190442', 'DINDA NURLITA', '0', '1'),
(102, '12190647', '12190647', 'FATUR RAHMAN', '0', '1'),
(103, '12190702', '12190702', 'TRISNIA CAHYA', '0', '1'),
(104, '12190715', '12190715', 'REVIYANAFAUZIA', '0', '1'),
(105, '12190726', '12190726', 'FAHRI ATTALAH', '0', '1'),
(106, '12190796', '12190796', 'SANDI SAPUTRA', '0', '1'),
(107, '12190809', '12190809', 'INDRA MAULANA', '0', '1'),
(108, '12190863', '12190863', 'BAGAS KURNIAWAN', '0', '1'),
(109, '12190934', '12190934', 'FAJAR ARIFIN', '0', '1'),
(110, '12190937', '12190937', 'AHMAD ZILDAN', '0', '1'),
(111, '12191102', '12191102', 'JORGI ALFAJRI', '0', '1'),
(112, '12191244', '12191244', 'PRETTY INDAH', '0', '1'),
(113, '12191271', '12191271', 'PUTRA MUNZIR', '0', '1'),
(114, '12191435', '12191435', 'ADITYA WARMAN', '0', '1'),
(115, '12191526', '12191526', 'NUR ALIF', '0', '1'),
(116, '12191693', '12191693', 'SITI ATIYA', '0', '1'),
(117, '12191731', '12191731', 'MUHAMMAD RASHOKI', '0', '1'),
(118, '12191767', '12191767', 'ANDIKA FATURRACHMAN', '0', '1'),
(119, '12191797', '12191797', 'MUHAMMAD FAQIH', '0', '1'),
(120, '12191798', '12191798', 'ARIFBUDIMAN', '0', '1'),
(121, '12191819', '12191819', 'RIFQY AKHBAR', '0', '1'),
(122, '12191925', '12191925', 'GENTA PRASIDYA', '0', '1'),
(123, '12192064', '12192064', 'RIFQI SULHAN', '0', '1'),
(124, '12192160', '12192160', 'DWIDHARMAWAN', '0', '1'),
(125, '12192225', '12192225', 'ROBBI MAULANA', '0', '1'),
(126, '12192234', '12192234', 'ARI BAHARI', '0', '1'),
(127, '12192363', '12192363', 'PUTRA AGUNG', '0', '1'),
(128, '12192374', '12192374', 'FADILAH PATUHROHMAN', '0', '1'),
(129, '12192427', '12192427', 'SYIFA SALSABILA', '0', '1'),
(130, '12192500', '12192500', 'HANSEL HANDYAWAN', '0', '1'),
(131, '12192620', '12192620', 'RADITYO ABSHAR', '0', '1'),
(132, '12192658', '12192658', 'ADAM GUNAWAN', '0', '1'),
(133, '12192805', '12192805', 'ANNISA DELLA', '0', '1'),
(134, '12192860', '12192860', 'MUHAMMAD REZA', '0', '1'),
(135, '12190132', '12190132', 'FEBRIANA DWI', '0', '1'),
(136, '12190253', '12190253', 'AMRI JAFAR', '0', '1'),
(137, '12190414', '12190414', 'UCI ARDESPA', '0', '1'),
(138, '12190483', '12190483', 'AHMAD JABRAN', '0', '1'),
(139, '12190491', '12190491', 'SAHRA ISNI', '0', '1'),
(140, '12190499', '12190499', 'MUHAMMAD RIFKY', '0', '1'),
(141, '12190567', '12190567', 'RUSLAN HAETAMI', '0', '1'),
(142, '12190676', '12190676', 'RINDIYANA SURYANINGSIH', '0', '1'),
(143, '12190799', '12190799', 'CHAIRIL BANI', '0', '1'),
(144, '12191369', '12191369', 'RESHA JULLYANTAMA', '0', '1'),
(145, '12191549', '12191549', 'DONI RAHMAN', '0', '1'),
(146, '12191594', '12191594', 'KHAIRUL ARIFIN', '0', '1'),
(147, '12191606', '12191606', 'AKHMAD IMADUDDIN', '0', '1'),
(148, '12191796', '12191796', 'KEVIN RIFO', '0', '1'),
(149, '12191934', '12191934', 'ENCI NURSAMSI', '0', '1'),
(150, '12192206', '12192206', 'MUHAMMAD GUSTI', '0', '1'),
(151, '12192435', '12192435', 'AGIL PRIYATNA', '0', '1'),
(152, '12192649', '12192649', 'SITI HARFIAH', '0', '1'),
(153, '12192684', '12192684', 'YOGHI OKTAPIANSYAH', '0', '1'),
(154, '12192729', '12192729', 'GALYH ARY', '0', '1'),
(155, '12192810', '12192810', 'SARAH SHAFIRA', '0', '1'),
(156, '12192820', '12192820', 'NABILA HELPIRA', '0', '1'),
(157, '12192842', '12192842', 'TAUFIK MAULANA', '0', '1'),
(158, '12192933', '12192933', 'ANDHIKA FERRIAL', '0', '1'),
(159, '12192972', '12192972', 'FEBRYANA NABILLA', '0', '1'),
(160, '12194048', '12194048', 'RIMBA DEWANGGA', '0', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeks untuk tabel `tb_calon`
--
ALTER TABLE `tb_calon`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pengawas`
--
ALTER TABLE `tb_pengawas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suara` (`suara`,`absen`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
