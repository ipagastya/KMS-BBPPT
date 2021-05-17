-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 16, 2021 at 08:39 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kms`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `iddivisi` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`, `nama`, `email`, `nip`, `iddivisi`, `level`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'admin@bbppt.go.id', '12345', 'Pelayanan', 'Admin', 'Aktif'),
(2, 'pegawai', '047aeeb234644b9e2d4138ed3bc7976a', 'Pegawai01', 'pegawai@bbppt.go.id', '12344', 'Umum', 'Pegawai', 'Aktif'),
(15, 'sapik', '9cd2ceb69bb3bfd134fd6eb3f1e1a295', 'Shafiq', 'sapik@bbppt.go.id', '1234', 'Umum', 'Admin', 'Aktif'),
(14, 'vina', 'e7bb4f7ed097bd6ccefc46018fda32c8', 'Vina', 'vina@bbppt.go.id', '1997', 'Umum', 'Admin', 'Aktif'),
(13, 'agas', '215b401f60fafd39ce86a7109ac71ed0', 'Agas', 'agas@bbppt.go.id', '1234', 'Pelayanan', 'Admin', 'Aktif'),
(16, 'dias', 'd36a36c25ffe288126d40000c6c5714e', 'Dias', 'dias@bppt.go.id', '12344', 'Sarana Teknik', 'Pegawai', 'Aktif'),
(17, 'alpin', 'd9be8dacc34375b56ac0a93a46a014c8', 'Alvin', 'alpin@bbppt.go.id', '1245', 'Pengujian Perangkat', 'Pegawai', 'Aktif'),
(18, 'agnes', '2d8463b5c3a3c6c8854a175683fe6303', 'Agnes', 'agnes@bbppt.go.id', '1278', 'Umum', 'Admin', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE IF NOT EXISTS `divisi` (
  `iddivisi` int(255) NOT NULL AUTO_INCREMENT,
  `namadivisi` varchar(255) NOT NULL,
  PRIMARY KEY (`iddivisi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

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

CREATE TABLE IF NOT EXISTS `favorit` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idinformasi` int(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `favorit`
--

INSERT INTO `favorit` (`id`, `idinformasi`, `judul`, `username`, `tanggal`) VALUES
(40, 29, 'Tahapan Kalibrasi', 'admin', '2021-05-12'),
(35, 8, 'KOMINFO', 'pegawai', '2021-05-11'),
(38, 2, 'Visi Misi', 'admin', '2021-05-12'),
(39, 28, 'Layanan Pengujian', 'admin', '2021-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE IF NOT EXISTS `informasi` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nomordokumen` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `dokumen` text NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL,
  `restricted` text NOT NULL,
  `iddivisi` varchar(255) NOT NULL,
  `idperangkat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id`, `nomordokumen`, `judul`, `dokumen`, `keterangan`, `tanggal`, `restricted`, `iddivisi`, `idperangkat`) VALUES
(2, '001', 'Visi Misi', 'dokumen_1621222445.png', '<h3>VISI</h3>\r\n\r\n<p><strong>SESUAI DENGAN VISI PRESIDEN REPUBLIK INDONESIA TAHUN 2019-2024</strong></p>\r\n\r\n<h3>MISI</h3>\r\n\r\n<p><strong>1. Menjadi Pusat Pengujian Perangkat Teknologi Informasi dan Komunikasi (TIK) di Indonesia untuk peningkatan daya saing perangkat telekomunikasi nasional.</strong></p>\r\n\r\n<p><strong>2. Menjadi Lembaga Penilaian Kesesuaian yang profesional.</strong></p>\r\n\r\n<p><strong>3. Memberikan perlindungan keamanan bagi penggunaan perangkat TIK di masyarakat, jaringan telekomunikasi dan lingkungan elektromagnetik.</strong></p>\r\n\r\n<p><strong>4. Menjadi bagian dari kesatuan kebijakan standarisasi dan manajemen spektrum frekuensi radio.</strong></p>\r\n\r\n<p><img alt="" src="src/upload/3687.PNG" style="height:575px; width:1013px" /></p>\r\n\r\n<p>&nbsp;</p>\r\n', '2021-05-04', 'Aktif', '8', ''),
(25, '002', 'Struktur Organisasi', '', '<p><img alt="" src="src/upload/15751.png" style="height:618px; width:914px" /></p>\r\n', '2021-05-12', 'Aktif', '8', ''),
(26, '003', 'Standar Pelayanan Pengujian', 'dokumen_1620827070.pdf', '', '2021-05-12', 'Aktif', '8', ''),
(27, '004', 'Standar Pelayanan Kalibrasi', 'dokumen_1620827773.pdf', '', '2021-05-12', 'Aktif', '8', ''),
(28, '005', 'Layanan Pengujian', '', '<h3>LAYANAN PENGUJIAN</h3>\r\n\r\n<p>Pengujian Alat dan Perangkat Telekomunikasi adalah penilaian kesesuaian karakteristik alat dan perangkat telekomunikasi terhadap persyaratan teknis yang berlaku melalui pengukuran. Persyaratan teknis tersebut merupakan persyaratan yang ditetapkan oleh Menteri terhadap alat dan perangkat telekomunikasi dengan memperhatikan aspek elektris/elektronis, Iingkungan, keselamatan/ keamanan, dan kesehatan. Apabila Menteri belum mengatur persyaratan teknis, pengujian alat dan perangkat telekomunikasi dapat mengacu pada standar internasional atau standar lainnya.</p>\r\n\r\n<p>Pengujian alat dan perangkat telekomunikasi dilaksanakan oleh Balai Uji. Balai Uji adalah laboratorium milik negara atau laboratorium milik swasta yang terakreditasi dan ditetapkan oleh Badan Penetap (Direktorat Jenderal SDPPI). Pengujian dilaksanakan melalui uji laboratorium (in-house test); dan/atau uji lapangan (on-site test). Uji laboratorium (in-house test) dilaksanakan di Balai Uji. Uji laboratorium (in-house test) kelas regular dilaksanakan selama 21 (dua puluh satu) hari kerja.</p>\r\n\r\n<p><strong>Persyaratan :</strong></p>\r\n\r\n<ol>\r\n	<li>Jumlah Perangkat / Sampel Uji 1 (satu) disertai dengan photo perangkat :\r\n	<ul>\r\n		<li>Photo tampak depan, belakang atas dan disertai dengan dimensi (panjang, lebar, volume dan diameter);</li>\r\n		<li>Serial Number, Merek dan tipe harus terlihat jelas;</li>\r\n	</ul>\r\n	</li>\r\n	<li>Dokumen teknis alat dan perangkat :\r\n	<ul>\r\n		<li>Spesifikasi teknis perangkat dan dilengkapi dengan deklarasi yang diisi oleh pemohon;</li>\r\n		<li>Petunjuk pemakaian alat / manual book dalam Bahasa Indonesia atau sekurang &ndash; kurangnya dalam bahasa Inggris;</li>\r\n		<li>Wiring diagram / installation diagram / configuration block connection / instrument connection diagram;</li>\r\n		<li>Test report dari pabrikan (Optional);</li>\r\n		<li>Deklarasi teknis.</li>\r\n	</ul>\r\n	</li>\r\n	<li>Peralatan Pendukung :\r\n	<ul>\r\n		<li>Petunjuk pengujian dan daftar alat bantu;</li>\r\n		<li>Petunjuk perintah &ndash; perintah (command line) untuk setiap konfigurasi.</li>\r\n	</ul>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="" src="src/upload/31410.png" style="height:572px; width:1019px" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2021-05-12', 'Aktif', '8', ''),
(29, '006', 'Tahapan Kalibrasi', '', '<p><img alt="" src="src/upload/29885.png" style="height:630px; width:1019px" /></p>\r\n', '2021-05-12', 'Aktif', '8', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `idkategori` int(255) NOT NULL AUTO_INCREMENT,
  `idinformasi` int(255) NOT NULL,
  `namakategori` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`idkategori`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `kategori`
--


-- --------------------------------------------------------

--
-- Table structure for table `perangkat`
--

CREATE TABLE IF NOT EXISTS `perangkat` (
  `idperangkat` int(255) NOT NULL AUTO_INCREMENT,
  `iddivisi` int(255) NOT NULL,
  `namaperangkat` varchar(255) NOT NULL,
  `biaya` varchar(255) NOT NULL,
  PRIMARY KEY (`idperangkat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `perangkat`
--

INSERT INTO `perangkat` (`idperangkat`, `iddivisi`, `namaperangkat`, `biaya`) VALUES
(5, 7, 'Sentral GSM', 'Rp 6.500.000,00'),
(6, 7, 'Router', 'Rp 5.000.000,00'),
(7, 7, 'Radar Cuaca', 'Rp 8,500,000.00'),
(8, 7, 'Pemancar Radio Beacons', 'Rp 6,500,000.00'),
(9, 7, 'Bluetooth', 'Rp 2,500,000.00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
