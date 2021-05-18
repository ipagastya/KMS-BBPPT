-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2021 at 04:35 PM
-- Server version: 8.0.13-4
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `1O7emlC26Q`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `iddivisi` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Aktif'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`, `nama`, `email`, `nip`, `iddivisi`, `level`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'infobbppt@gmail.com', '12345', 'Pelayanan', 'Admin', 'Aktif'),
(2, 'pegawai', '047aeeb234644b9e2d4138ed3bc7976a', 'Pegawai01', 'agastyawerdikatama@gmail.com', '12344', 'Umum', 'Pegawai', 'Aktif'),
(15, 'sapik', '9cd2ceb69bb3bfd134fd6eb3f1e1a295', 'Shafiq', 'sapik@bbppt.go.id', '1234', 'Umum', 'Admin', 'Aktif'),
(14, 'vina', 'e7bb4f7ed097bd6ccefc46018fda32c8', 'Vina', 'vina@bbppt.go.id', '1997', 'Umum', 'Admin', 'Aktif'),
(13, 'agas', 'ed91e01fc018aae86f8a9d7a624174b5', 'Agas', 'awerdikatama@gmail.com', '1234', 'Pelayanan', 'Admin', 'Aktif'),
(16, 'dias', 'd36a36c25ffe288126d40000c6c5714e', 'Dias', 'i.putu012@ui.ac.id', '12344', 'Sarana Teknik', 'Pegawai', 'Aktif'),
(17, 'alpin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Alvin', 'alpin@bbppt.go.id', '1245', 'Pengujian Perangkat', 'Pegawai', 'Aktif'),
(18, 'agnes', '2d8463b5c3a3c6c8854a175683fe6303', 'Agnes', 'hrmnagns@gmail.com', '1278', 'Umum', 'Admin', 'Aktif'),
(23, 'admin2', '0192023a7bbd73250516f069df18b500', 'admin ke dua', 'admin2@postel.go.id', '12312345678', 'Tata Usaha', 'Admin', 'Aktif'),
(24, 'hrmnagns', '0dac594ad82dc8e550007c11d4c59868', 'Her', 'hrmnagns@gmail.com', '124567', 'Umum', 'Pegawai', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `iddivisi` int(255) NOT NULL,
  `namadivisi` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`iddivisi`, `namadivisi`) VALUES
(8, 'Umum'),
(3, 'Pelayanan'),
(4, 'Tata Usaha'),
(5, 'Sarana Teknik'),
(7, 'Pengujian Perangkat');

-- --------------------------------------------------------

--
-- Table structure for table `favorit`
--

CREATE TABLE `favorit` (
  `id` int(255) NOT NULL,
  `idinformasi` int(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favorit`
--

INSERT INTO `favorit` (`id`, `idinformasi`, `judul`, `username`, `tanggal`) VALUES
(35, 8, 'KOMINFO', 'pegawai', '2021-05-11'),
(45, 26, 'Standar Pelayanan Pengujian', 'alpin', '2021-05-17'),
(39, 28, 'Layanan Pengujian', 'admin', '2021-05-12'),
(41, 27, 'Standar Pelayanan Kalibrasi', 'admin', '2021-05-16'),
(42, 25, 'Struktur Organisasi', 'admin', '2021-05-17'),
(43, 28, 'Layanan Pengujian', 'alpin', '2021-05-17'),
(44, 2, 'Visi Misi', 'pegawai', '2021-05-17'),
(46, 30, 'Tata Cara dan Persyaratan Pengujian Perangkat Bluetooth', 'alpin', '2021-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id` int(255) NOT NULL,
  `nomordokumen` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `dokumen` text NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL,
  `restricted` text NOT NULL,
  `iddivisi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '8',
  `idperangkat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id`, `nomordokumen`, `judul`, `dokumen`, `keterangan`, `tanggal`, `restricted`, `iddivisi`, `idperangkat`) VALUES
(2, '001', 'Visi Misi', 'dokumen_1620826259.jpg', '<h3>VISI</h3>\r\n\r\n<p><strong>&quot;SESUAI DENGAN VISI PRESIDEN REPUBLIK INDONESIA TAHUN 2019-2024.&quot;</strong></p>\r\n\r\n<h3>MISI</h3>\r\n\r\n<p><strong>1. Menjadi Pusat Pengujian Perangkat Teknologi Informasi dan Komunikasi (TIK) di Indonesia untuk peningkatan daya saing perangkat telekomunikasi nasional.</strong></p>\r\n\r\n<p><strong>2. Menjadi Lembaga Penilaian Kesesuaian yang profesional.</strong></p>\r\n\r\n<p><strong>3. Memberikan perlindungan keamanan bagi penggunaan perangkat TIK di masyarakat, jaringan telekomunikasi dan lingkungan elektromagnetik.</strong></p>\r\n\r\n<p><strong>4. Menjadi bagian dari kesatuan kebijakan standarisasi dan manajemen spektrum frekuensi radio.</strong></p>\r\n\r\n<p><img alt=\"\" src=\"src/upload/3687.PNG\" style=\"height:575px; width:1013px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n', '2021-05-04', 'Non Aktif', '8', ''),
(25, '002', 'Struktur Organisasi', 'dokumen_1620826737.', '<p><img alt=\"\" src=\"src/upload/15751.png\" style=\"height:618px; width:914px\" /></p>\r\n', '2021-05-12', 'Non Aktif', '8', ''),
(26, '003', 'Standar Pelayanan Pengujian', 'dokumen_1620827070.pdf', '', '2021-05-12', 'Aktif', '8', ''),
(27, '004', 'Standar Pelayanan Kalibrasi', 'dokumen_1620827773.pdf', '', '2021-05-12', 'Aktif', '8', ''),
(28, '005', 'Layanan Pengujian', 'dokumen_1620828638.', '<h3>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; LAYANAN PENGUJIAN</h3>\r\n\r\n<p>Pengujian Alat dan Perangkat Telekomunikasi adalah penilaian kesesuaian karakteristik alat dan perangkat telekomunikasi terhadap persyaratan teknis yang berlaku melalui pengukuran. Persyaratan teknis tersebut merupakan persyaratan yang ditetapkan oleh Menteri terhadap alat dan perangkat telekomunikasi dengan memperhatikan aspek elektris/elektronis, Iingkungan, keselamatan/ keamanan, dan kesehatan. Apabila Menteri belum mengatur persyaratan teknis, pengujian alat dan perangkat telekomunikasi dapat mengacu pada standar internasional atau standar lainnya.</p>\r\n\r\n<p>Pengujian alat dan perangkat telekomunikasi dilaksanakan oleh Balai Uji. Balai Uji adalah laboratorium milik negara atau laboratorium milik swasta yang terakreditasi dan ditetapkan oleh Badan Penetap (Direktorat Jenderal SDPPI). Pengujian dilaksanakan melalui uji laboratorium (in-house test); dan/atau uji lapangan (on-site test). Uji laboratorium (in-house test) dilaksanakan di Balai Uji. Uji laboratorium (in-house test) kelas regular dilaksanakan selama 21 (dua puluh satu) hari kerja.</p>\r\n\r\n<p><strong>Persyaratan :</strong></p>\r\n\r\n<ol>\r\n	<li>Jumlah Perangkat / Sampel Uji 1 (satu) disertai dengan photo perangkat :\r\n	<ul>\r\n		<li>Photo tampak depan, belakang atas dan disertai dengan dimensi (panjang, lebar, volume dan diameter);</li>\r\n		<li>Serial Number, Merek dan tipe harus terlihat jelas;</li>\r\n	</ul>\r\n	</li>\r\n	<li>Dokumen teknis alat dan perangkat :\r\n	<ul>\r\n		<li>Spesifikasi teknis perangkat dan dilengkapi dengan deklarasi yang diisi oleh pemohon;</li>\r\n		<li>Petunjuk pemakaian alat / manual book dalam Bahasa Indonesia atau sekurang &ndash; kurangnya dalam bahasa Inggris;</li>\r\n		<li>Wiring diagram / installation diagram / configuration block connection / instrument connection diagram;</li>\r\n		<li>Test report dari pabrikan (Optional);</li>\r\n		<li>Deklarasi teknis.</li>\r\n	</ul>\r\n	</li>\r\n	<li>Peralatan Pendukung :\r\n	<ul>\r\n		<li>Petunjuk pengujian dan daftar alat bantu;</li>\r\n		<li>Petunjuk perintah &ndash; perintah (command line) untuk setiap konfigurasi.</li>\r\n	</ul>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"src/upload/31410.png\" style=\"height:572px; width:1019px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2021-05-12', 'Non Aktif', '8', ''),
(30, 'blt-00123', 'Tata Cara dan Persyaratan Pengujian Perangkat Bluetooth', 'dokumen_1621240668.pdf', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '2021-05-17', 'Non Aktif', '7', '9');

-- --------------------------------------------------------

--
-- Table structure for table `perangkat`
--

CREATE TABLE `perangkat` (
  `idperangkat` int(255) NOT NULL,
  `iddivisi` int(255) NOT NULL,
  `namaperangkat` varchar(255) NOT NULL,
  `biaya` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perangkat`
--

INSERT INTO `perangkat` (`idperangkat`, `iddivisi`, `namaperangkat`, `biaya`) VALUES
(5, 7, 'Sentral GSM', 'Rp 6.500.000,00'),
(6, 7, 'Router', 'Rp 5.000.000,00'),
(7, 7, 'Radar Cuaca', 'Rp 8,500,000.00'),
(8, 7, 'Pemancar Radio Beacons', 'Rp 6,500,000.00'),
(9, 7, 'Bluetooth', 'Rp 2,500,000.00');

-- --------------------------------------------------------

--
-- Table structure for table `resetPasswords`
--

CREATE TABLE `resetPasswords` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `resetPasswords`
--

INSERT INTO `resetPasswords` (`id`, `code`, `email`) VALUES
(2, '160a298110dabd', 'agastyawerdikatama@gmail.com'),
(3, '160a29ecce2dea', 'agastyawerdikatama@gmail.com'),
(4, '160a2a025d5bbe', 'agastyawerdikatama@gmail.com'),
(5, '160a3e6a3f2b80', 'infobbppt@gmail.com'),
(6, '160a3e6ede644b', 'infobbppt@gmail.com'),
(7, '160a3e76001962', 'infobbppt@gmail.com'),
(8, '160a3e94b33f7e', 'infobbppt@gmail.com'),
(9, '160a3ea070f8fb', 'infobbppt@gmail.com'),
(10, '160a3ea151fa8c', 'infobbppt@gmail.com'),
(11, '160a3ea5ddf4c3', 'infobbppt@gmail.com'),
(12, '160a3ea7761a25', 'infobbppt@gmail.com'),
(13, '160a3ea994795f', 'infobbppt@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`iddivisi`);

--
-- Indexes for table `favorit`
--
ALTER TABLE `favorit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perangkat`
--
ALTER TABLE `perangkat`
  ADD PRIMARY KEY (`idperangkat`);

--
-- Indexes for table `resetPasswords`
--
ALTER TABLE `resetPasswords`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `iddivisi` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `favorit`
--
ALTER TABLE `favorit`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `perangkat`
--
ALTER TABLE `perangkat`
  MODIFY `idperangkat` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `resetPasswords`
--
ALTER TABLE `resetPasswords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
