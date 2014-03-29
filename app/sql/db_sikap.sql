-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2013 at 12:37 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_sikap`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_types`
--

CREATE TABLE IF NOT EXISTS `account_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `account_types`
--

INSERT INTO `account_types` (`id`, `name`, `description`) VALUES
(1, 'Admin DPM', ''),
(2, 'Admin Akademik', ''),
(3, 'Mahasiswa', ''),
(4, 'Super Administrator', '');

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `organizer` varchar(100) NOT NULL,
  `summary` text NOT NULL,
  `activity_date` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT '-1',
  `student_id` char(9) NOT NULL,
  `last_accessed` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `name`, `type`, `organizer`, `summary`, `activity_date`, `status`, `student_id`, `last_accessed`) VALUES
(1, 'Paramadina Leaders Camp', 1, 'Universitas Paramadina', '<p>Testing</p>', '2011-06-14', 1, '210000027', '0000-00-00 00:00:00'),
(2, 'Grha Mahardhika Paramadina', 73, 'Universitas Paramadina', '<p><strong>Testing</strong></p>', '2010-09-10', 1, '210000027', '2013-01-16 10:27:18'),
(3, 'Kongres Serikat Mahasiswa', 7, 'Serikat Mahasiswa Universitas Paramadina', '<p>Testing</p>', '2013-01-16', 1, '210000027', '2013-01-16 10:43:47'),
(4, 'Grha Mahardhika Paramadina', 73, 'Universitas Paramadina', 'Testing', '2013-01-16', 0, '837800001', '2013-01-16 11:04:27'),
(5, 'PLC ', 1, 'Universitas Paramadina', 'testing', '2011-06-14', 1, '837800001', '2013-01-16 12:03:48');

-- --------------------------------------------------------

--
-- Table structure for table `activity_types`
--

CREATE TABLE IF NOT EXISTS `activity_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_name` varchar(255) NOT NULL,
  `level_information` varchar(512) DEFAULT NULL,
  `time_information` varchar(100) DEFAULT NULL,
  `point` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

--
-- Dumping data for table `activity_types`
--

INSERT INTO `activity_types` (`id`, `activity_name`, `level_information`, `time_information`, `point`) VALUES
(1, 'Paramadina Leadership Camp (PLC) - Peserta', NULL, NULL, 5),
(2, 'Paramadina Leadership Camp (PLC) - Koordinator Ketua', NULL, NULL, 7),
(3, 'Paramadina Leaders Camp (PLC) - Panitia / Fasilitator', NULL, NULL, 5),
(4, 'OKUP (Organisasi Kemahasiswaan Universitas Paramadina) - SEMA (Badan Pengurus Harian)', 'Sekretaris Jendral', NULL, 8),
(5, 'OKUP (Organisasi Kemahasiswaan Universitas Paramadina) - SEMA (Badan Pengurus Harian)', 'Ketua Divisi', NULL, 5),
(6, 'OKUP (Organisasi Kemahasiswaan Universitas Paramadina) - SEMA (Badan Pengurus Harian)', 'Anggota Divisi', NULL, 3),
(7, 'OKUP (Organisasi Kemahasiswaan Universitas Paramadina) - SEMA (Dewan Pengawas)', NULL, NULL, 2),
(8, 'OKUP (Organisasi Kemahasiswaan Universitas Paramadina) - HIMA (Ketua)', NULL, NULL, 5),
(9, 'OKUP (Organisasi Kemahasiswaan Universitas Paramadina) - HIMA (Wakil Ketua)', NULL, NULL, 4),
(10, 'OKUP (Organisasi Kemahasiswaan Universitas Paramadina) - HIMA (Ketua Divisi / Koordinator)', NULL, NULL, 3),
(11, 'OKUP (Organisasi Kemahasiswaan Universitas Paramadina) - HIMA (Anggota Divisi)', NULL, NULL, 1),
(12, 'Oganisasi Eksternal Kampus - Lokal / Per Tahun', 'Ketua', NULL, 3),
(13, 'Oganisasi Eksternal Kampus - Lokal / Per Tahun', 'Pengurus', NULL, 2),
(14, 'Oganisasi Eksternal Kampus - Lokal / Per Tahun', 'Anggota', NULL, 1),
(15, 'Oganisasi Eksternal Kampus - Nasional / Per Tahun', 'Ketua', NULL, 5),
(16, 'Oganisasi Eksternal Kampus - Nasional / Per Tahun', 'Pengurus', NULL, 3),
(17, 'Oganisasi Eksternal Kampus - Nasional / Per Tahun', 'Anggota', NULL, 2),
(18, 'Oganisasi Eksternal Kampus - Internasional / Per Tahun', 'Ketua', NULL, 7),
(19, 'Oganisasi Eksternal Kampus - Internasional / Per Tahun', 'Pengurus', NULL, 5),
(20, 'Oganisasi Eksternal Kampus - Internasional / Per Tahun', 'Anggota', NULL, 3),
(21, 'Kepanitiaan (Event) - Lokal / Per Event', 'Ketua', '<= 1 Hari', 2),
(22, 'Kepanitiaan (Event) - Lokal / Per Event', 'Ketua', '> 1 Hari', 3),
(23, 'Kepanitiaan (Event) - Lokal / Per Event', 'Pengurus', '<= 1 Hari', 1),
(24, 'Kepanitiaan (Event) - Lokal / Per Event', 'Pengurus', '> 1 Hari', 1.5),
(25, 'Kepanitiaan (Event) - Lokal / Per Event', 'Anggota', '<= 1 Hari', 0.5),
(26, 'Kepanitiaan (Event) - Lokal / Per Event', 'Anggota', '> 1 Hari', 1),
(27, 'Kepanitiaan (Event) - Nasional / Per Event', 'Ketua', '<= 1 Hari', 3),
(28, 'Kepanitiaan (Event) - Nasional / Per Event', 'Ketua', '> 1 Hari', 4),
(29, 'Kepanitiaan (Event) - Nasional / Per Event', 'Pengurus', '<= 1 Hari', 2),
(30, 'Kepanitiaan (Event) - Nasional / Per Event', 'Pengurus', '> 1 Hari', 3),
(31, 'Kepanitiaan (Event) - Nasional / Per Event', 'Anggota', '<= 1 Hari', 1),
(32, 'Kepanitiaan (Event) - Nasional / Per Event', 'Anggota', '> 1 Hari', 1.5),
(33, 'Kepanitiaan (Event) - Internasional / Per Event', 'Ketua', '<= 1 Hari', 4),
(34, 'Kepanitiaan (Event) - Internasional / Per Event', 'Ketua', '> 1 Hari', 5),
(35, 'Kepanitiaan (Event) - Internasional / Per Event', 'Pengurus', '<= 1 Hari', 3),
(36, 'Kepanitiaan (Event) - Internasional / Per Event', 'Pengurus', '> 1 Hari', 4),
(37, 'Kepanitiaan (Event) - Internasional / Per Event', 'Anggota', '<= 1 Hari', 2),
(38, 'Kepanitiaan (Event) - Internasional / Per Event', 'Anggota', '> 1 Hari', 3),
(39, 'Pelatihan - Lokal / Per Event', 'Pembicara / Narasumber', '<= 1 Sesi', 4),
(40, 'Pelatihan - Lokal / Per Event', 'Pembicara / Narasumber', '> 1 Sesi', 5),
(41, 'Pelatihan - Lokal / Per Event', 'Moderator', '<= 1 Sesi', 2),
(42, 'Pelatihan - Lokal / Per Event', 'Moderator', '> 1 Sesi', 3),
(43, 'Pelatihan - Lokal / Per Event', 'MC', '<= 1 Sesi', 2),
(44, 'Pelatihan - Lokal / Per Event', 'MC', '> 1 Sesi', 3),
(45, 'Pelatihan - Lokal / Per Event', 'Peserta', '1 - 4 Jam', 1),
(46, 'Pelatihan - Lokal / Per Event', 'Peserta', '5 - 8 Jam', 1.5),
(47, 'Pelatihan - Lokal / Per Event', 'Peserta', '9 - 16 Jam', 2),
(48, 'Pelatihan - Lokal / Per Event', 'Peserta', '17 - 24 Jam', 2.5),
(49, 'Pelatihan - Nasional / Per Event', 'Pembicara / Narasumber', '<= 1 Sesi', 5),
(50, 'Pelatihan - Nasional / Per Event', 'Pembicara / Narasumber', '> 1 Sesi', 6),
(51, 'Pelatihan - Nasional / Per Event', 'Moderator', '<= 1 Sesi', 3),
(52, 'Pelatihan - Nasional / Per Event', 'Moderator', '> 1 Sesi', 4),
(53, 'Pelatihan - Nasional / Per Event', 'MC', '<= 1 Hari', 3),
(54, 'Pelatihan - Nasional / Per Event', 'MC', '> 1 Hari', 4),
(55, 'Pelatihan - Nasional / Per Event', 'Peserta', '1 - 4 Jam', 2),
(56, 'Pelatihan - Nasional / Per Event', 'Peserta', '5 - 8 Jam', 2.5),
(57, 'Pelatihan - Nasional / Per Event', 'Peserta', '9 - 16 Jam', 3),
(58, 'Pelatihan - Nasional / Per Event', 'Peserta', '7 - 24 Jam', 3.5),
(59, 'Pelatihan - Internasional / Per Event', 'Pembicara / Narasumber', '<= 1 Sesi', 6),
(60, 'Pelatihan - Internasional / Per Event', 'Pembicara / Narasumber', '> 1 Sesi', 7),
(61, 'Pelatihan - Internasional / Per Event', 'Moderator', '<= 1 Sesi', 4),
(62, 'Pelatihan - Internasional / Per Event', 'Moderator', '> 1 Sesi', 5),
(63, 'Pelatihan - Internasional / Per Event', 'MC', '<= 1 Sesi', 4),
(64, 'Pelatihan - Internasional / Per Event', 'MC', '> 1 Sesi', 5),
(65, 'Pelatihan - Internasional / Per Event', 'Peserta', '1 - 4 Jam', 3),
(66, 'Pelatihan - Internasional / Per Event', 'Peserta', '5 - 8 Jam', 3.5),
(67, 'Pelatihan - Internasional / Per Event', 'Peserta', '9 - 16 Jam', 4),
(68, 'Pelatihan - Internasional / Per Event', 'Peserta', '17 - 24 Jam', 4.5),
(69, 'Grha Mahardika Paramadina (GMP) - Koordinator / Ketua', NULL, NULL, 5),
(70, 'Grha Mahardika Paramadina (GMP) - Panitia / Fasilitator', NULL, NULL, 4),
(71, 'Grha Mahardika Paramadina (GMP) - Peserta', 'Hadir 1 Hari', NULL, 0),
(72, 'Grha Mahardika Paramadina (GMP) - Peserta', 'Hadir 2 Hari', NULL, 2),
(73, 'Grha Mahardika Paramadina (GMP) - Peserta', 'Hadir 3 Hari', NULL, 5),
(74, 'Mentoring - Mentor', '< 3 Pertemuan ', NULL, 0),
(75, 'Mentoring - Mentor', '>= 3 Pertemuan', NULL, 5),
(76, 'Mentoring - Mentee', '< 3 Pertemuan', NULL, 0),
(77, 'Mentoring - Mentee', '>= 3 Pertemuan', NULL, 3),
(78, 'Penelitian - Tingkat Nasional', 'Peneliti Utama', NULL, 5),
(79, 'Penelitian - Tingkat Nasional', 'Anggota Peneliti', NULL, 3),
(80, 'Penelitian - Tingkat Nasional', 'Asisten Peneliti', NULL, 2),
(81, 'Penelitian - Tingkat Internasional', 'Peneliti Utama', NULL, 7),
(82, 'Penelitian - Tingkat Internasional', 'Anggota Peneliti', NULL, 5),
(83, 'Penelitian - Tingkat Internasional', 'Asisten Peneliti', NULL, 3),
(84, 'Karya Ilmiah / Publikasi - Karya Populer', 'Tingkat Nasional', 'Penulis Utama', 3),
(85, 'Karya Ilmiah / Publikasi - Karya Populer', 'Tingkat Nasional', 'Anggota Penulis', 1.5),
(86, 'Karya Ilmiah / Publikasi - Karya Populer', 'Tingkat Internasional', 'Penulis Utama', 5),
(87, 'Karya Ilmiah / Publikasi - Karya Populer', 'Tingkat Internasional', 'Anggota Penulis', 3),
(88, 'Karya Ilmiah / Publikasi - Karya Ilmiah', 'Tingkat Nasional', 'Penulis Utama', 4),
(89, 'Karya Ilmiah / Publikasi - Karya Ilmiah', 'Tingkat Nasional', 'Anggota Penulis', 2),
(90, 'Karya Ilmiah / Publikasi - Karya Ilmiah', 'Tingkat Internasional', 'Penulis Utama', 5),
(91, 'Karya Ilmiah / Publikasi - Karya Ilmiah', 'Tingkat Internasional', 'Anggota Penulis', 3),
(92, 'Penulisan Buku - Buku Populer', 'Tingkat Nasional', 'Penulis Utama', 5),
(93, 'Penulisan Buku - Buku Populer', 'Tingkat Nasional', 'Anggota Penulis', 3),
(94, 'Penulisan Buku - Buku Populer', 'Tingkat Internasional', 'Penulis Utama', 7),
(95, 'Penulisan Buku - Buku Populer', 'Tingkat Internasional', 'Anggota Penulis', 5),
(96, 'Penulisan Buku - Buku Populer', 'Tingkat Internasional', 'Penulis Utama', 8),
(97, 'Penulisan Buku - Buku Populer', 'Tingkat Internasional', 'Anggota Penulis', 6),
(98, 'Asisten Dosen / Laboratorium (Per Semester) - Koordinator Asisten', NULL, NULL, 2),
(99, 'Asisten Dosen / Laboratorium (Per Semester) - Asisten', NULL, NULL, 3),
(100, 'Karya Yang Dipamerkan (Bukan Dalam Kegiatan Penilaian Perkuliahan) - Tingkat Lokal', 'Tunggal', NULL, 5),
(101, 'Karya Yang Dipamerkan (Bukan Dalam Kegiatan Penilaian Perkuliahan) - Tingkat Lokal', 'Tim', NULL, 3),
(102, 'Karya Yang Dipamerkan (Bukan Dalam Kegiatan Penilaian Perkuliahan) - Tingkat Nasional', 'Tunggal', NULL, 7),
(103, 'Karya Yang Dipamerkan (Bukan Dalam Kegiatan Penilaian Perkuliahan) - Tingkat Nasional', 'Tim', NULL, 4),
(104, 'Karya Yang Dipamerkan (Bukan Dalam Kegiatan Penilaian Perkuliahan) - Tingkat Internasional', 'Tunggal', NULL, 8),
(105, 'Karya Yang Dipamerkan (Bukan Dalam Kegiatan Penilaian Perkuliahan) - Tingkat Internasional', 'Tim', NULL, 5),
(106, 'Lomba / Kompetisi - Tingkat Lokal', 'Berprestasi (I - Harapan, Predikat Khusus)', NULL, 3),
(107, 'Lomba / Kompetisi - Tingkat Lokal', 'Kepersertaan', NULL, 1.5),
(108, 'Lomba / Kompetisi - Tingkat Nasional', 'Berprestasi (I - Harapan, Predikat Khusus)', NULL, 5),
(109, 'Lomba / Kompetisi - Tingkat Nasional', 'Kepersertaan', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `name`, `nickname`, `email`, `phone`, `user_id`) VALUES
(1, 'Imam Hidayat', 'imam', 'imam.hidayat92@gmail.com', '085711102261', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `descriptions` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `descriptions`) VALUES
(1, 'Kabar Terbaru Paramadina', ''),
(2, 'Artikel Khusus', '');

-- --------------------------------------------------------

--
-- Table structure for table `english_tests`
--

CREATE TABLE IF NOT EXISTS `english_tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `semester` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `english_tests`
--

INSERT INTO `english_tests` (`id`, `semester`, `score`, `student_id`) VALUES
(1, 1, 450, 210000027);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(512) NOT NULL,
  `student_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE IF NOT EXISTS `grades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `semester` smallint(6) NOT NULL,
  `point` smallint(6) NOT NULL,
  `grade` double NOT NULL,
  `student_id` varchar(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `semester`, `point`, `grade`, `student_id`) VALUES
(1, 1, 23, 3.88, '210000027'),
(2, 2, 25, 3.79, '210000027'),
(3, 3, 23, 3.71, '210000027'),
(4, 4, 21, 3.54, '210000027'),
(5, 1, 23, 3.45, '837800001'),
(6, 2, 23, 2.44, '837800001'),
(7, 3, 15, 1.8, '837800001'),
(8, 4, 15, 3.8, '837800001'),
(9, 5, 15, 4, '837800001'),
(10, 1, 23, 3.3, '837800002'),
(11, 2, 24, 3.7, '837800002'),
(12, 1, 22, 3.86, '210000013'),
(13, 2, 23, 3.83, '210000013'),
(14, 3, 23, 3.65, '210000013'),
(15, 4, 21, 3.83, '210000013');

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE IF NOT EXISTS `majors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `total_credit` int(11) NOT NULL,
  `color` char(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`id`, `name`, `description`, `total_credit`, `color`) VALUES
(1, 'Desain Komunikasi Visual', '', 144, ''),
(2, 'Desain Produk Industri', '', 144, ''),
(3, 'Falsafah dan Agama', '', 144, ''),
(4, 'Hubungan Internasional', '', 144, ''),
(5, 'Ilmu Komunikasi', '', 144, ''),
(6, 'Manajemen dan Bisnis', '', 144, ''),
(7, 'Psikologi', '', 144, ''),
(8, 'Teknik Informatika', '', 144, '');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `subject` varchar(512) NOT NULL,
  `body` text NOT NULL,
  `sent` datetime NOT NULL,
  `read` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `excerpt` varchar(100) NOT NULL,
  `notification` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dismissed` bit(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `excerpt`, `notification`, `url`, `user_id`, `dismissed`) VALUES
(1, 'Aktifitas kamu telah di-<em>review</em> oleh DPM.', 'Aktifitas kamu (Grha Mahardhika Paramadina) telah di-<em>review</em> oleh Direktorat Pengembangan Mahasiswa. Silakan melakukan <em>follow up</em> sesuai jadwal.', 'http://localhost/sikap/activities/details/2', 0, '1'),
(2, 'Aktifitas kamu telah di-<em>verify</em> oleh DPM.', 'Aktifitas kamu (Paramadina Leaders Camp) telah di-<em>verify</em> oleh Direktorat Pengembangan Mahasiswa. Terima kasih telah meng-<em>update</em> aktifitas kamu lewat SIKAP.', 'http://localhost/sikap/activities/details/1', 1, '1'),
(3, 'Aktifitas kamu telah di-<em>review</em> oleh DPM.', 'Aktifitas kamu (Grha Mahardhika Paramadina) telah di-<em>review</em> oleh Direktorat Pengembangan Mahasiswa. Silakan melakukan <em>follow up</em> sesuai jadwal.', 'http://localhost/sikap/activities/details/2', 1, '1'),
(4, 'Aktifitas kamu telah di-<em>verify</em> oleh DPM.', 'Aktifitas kamu (Grha Mahardhika Paramadina) telah di-<em>verify</em> oleh Direktorat Pengembangan Mahasiswa. Terima kasih telah meng-<em>update</em> aktifitas kamu lewat SIKAP.', 'http://localhost/sikap/activities/details/2', 1, '1'),
(5, 'Aktifitas kamu telah di-<em>verify</em> oleh DPM.', 'Aktifitas kamu (Kongres Serikat Mahasiswa) telah di-<em>verify</em> oleh Direktorat Pengembangan Mahasiswa. Terima kasih telah meng-<em>update</em> aktifitas kamu lewat SIKAP.', 'http://localhost/sikap/activities/details/3', 1, '1'),
(6, 'Aktifitas kamu telah di-<em>review</em> oleh DPM.', 'Aktifitas kamu (Grha Mahardhika Paramadina) telah di-<em>review</em> oleh Direktorat Pengembangan Mahasiswa. Silakan melakukan <em>follow up</em> sesuai jadwal.', 'http://localhost/sikap/activities/details/4', 2, '1'),
(7, 'Aktifitas kamu telah di-<em>review</em> oleh DPM.', 'Aktifitas kamu (PLC ) telah di-<em>review</em> oleh Direktorat Pengembangan Mahasiswa. Silakan melakukan <em>follow up</em> sesuai jadwal.', 'http://localhost/sikap/activities/details/5', 2, '0'),
(8, 'Aktifitas kamu telah di-<em>verify</em> oleh DPM.', 'Aktifitas kamu (PLC ) telah di-<em>verify</em> oleh Direktorat Pengembangan Mahasiswa. Terima kasih telah meng-<em>update</em> aktifitas kamu lewat SIKAP.', 'http://localhost/sikap/activities/details/5', 2, '0');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(125) NOT NULL,
  `published_time` datetime NOT NULL,
  `excerpt` varchar(500) NOT NULL,
  `thumbnail_url` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `published_time`, `excerpt`, `thumbnail_url`, `url`, `created`, `modified`, `category_id`, `user_id`) VALUES
(2, 'Pameran DPI', '0000-00-00 00:00:00', 'Prodi DPI Menggelar Pameran di lobby paramadina', 'd89634125a0a07d000d72af57db070a0_pameran deprin.jpg', 'http://paramadina.ac.id/index.php?option=com_content&view=article&id=1029%3Adesain-produk-paramadina-dalam-pameran-desain-tingkat-nasional&catid=54%3Adesain-produk&Itemid=128&lang=en', '2013-01-15 18:02:42', '2013-01-15 11:02:43', 1, 1),
(3, 'Orasi Ilmiah Totok Amin Soefijanto, MA, Ed.D: Media sebagai Guru Masyarakat', '0000-00-00 00:00:00', 'Orasi Ilmiah Bp. Totok Amin Soefijanto, MA, Ed.D: Media sebagai Guru Masyarakat yang disampaikan pada Dies Natalis Universitas Paramadina, 10 Januari 2013.', 'a262e06f6d41f5d273d2eb34bcb5b30d_img_8644-k.jpg', 'http://paramadina.ac.id/index.php?option=com_content&view=article&id=1032%3Aorasi-ilmiah-totok-amin-soefijanto-ma-edd-media-sebagai-guru-masyarakat&catid=46%3Aberita&lang=en', '2013-01-15 18:12:22', '2013-01-15 11:12:23', 1, 1),
(4, 'Pertukaran tokoh muda Muslim Australia dan Indonesia', '0000-00-00 00:00:00', 'Universitas Paramadina dan Kedubes Australia kembali mengadakan MEP (Muslim Exchange Program)', 'ef60ba3a5458b354bc1a30f8daea91a2_logo mep.jpg', 'http://paramadina.ac.id/index.php?option=com_content&view=article&id=1022%3Apertukaran-tokoh-muda-muslim-australia-dan-indonesia&catid=46%3Aberita&lang=en', '2013-01-15 22:13:37', '2013-01-15 15:13:38', 1, 1),
(5, ' Perguruan Tinggi dan Media Bersinergi untuk Mewujudkan Masyarakat Madani ', '0000-00-00 00:00:00', 'Perayaan Dies Natalis Universitas Paramadina ke-15 ', 'ccebf9b485204e176229c5db624cfe39_1.jpg', 'http://paramadina.ac.id/index.php?option=com_content&view=article&id=1031%3Aperguruan-tinggi-dan-media-bersinergi-untuk-mewujudkan-masyarakat-madani-&catid=45%3Aagenda&lang=en', '2013-01-15 22:16:57', '2013-01-15 15:16:58', 1, 1),
(6, 'Workshop Rendering Bagi Pelajar', '0000-00-00 00:00:00', 'Improdes (HIMA DPI) mengadakan workshop rendering bagi siswa SMU', 'd4157e20ae5e408043c35e12ad5ddfb0_2.jpg', 'http://paramadina.ac.id/index.php?option=com_content&view=article&id=1023%3Aworkshop-rendering-bagi-pelajar&catid=54%3Adesain-produk&Itemid=128&lang=en', '2013-01-15 22:24:55', '2013-01-15 15:24:56', 1, 1),
(7, 'Pameran Akademik â€œKarya Komaâ€', '0000-00-00 00:00:00', 'Pameran Akademik â€œKarya Komaâ€ yang diselenggarakan di Auditorium Nurcholish Madjid 19-21 November 2012', 'a71de6978af70f9152cc11c9fa052160_3.jpg', 'http://paramadina.ac.id/index.php?option=com_content&view=article&id=1020%3Apameran-akademik-karya-koma&catid=54%3Adesain-produk&Itemid=128&lang=en', '2013-01-15 22:28:55', '2013-01-15 15:28:56', 1, 1),
(8, 'Kembali menjuarai â€œElectrical Innovation Awardâ€', '0000-00-00 00:00:00', 'Mahasiswa Desain Produk kembali meraih penghargaan dalam â€œElectrical Innovation Awardâ€ 2012 (EIA).', 'c847db7f81699c5d602bcd5f1fdaefff_4.jpg', 'http://paramadina.ac.id/index.php?option=com_content&view=article&id=1026%3Akembali-menjuarai-electrical-innovation-award&catid=54%3Adesain-produk&Itemid=128&lang=en', '2013-01-15 22:31:33', '2013-01-15 15:31:34', 1, 1),
(9, 'Desain Produk Paramadina dalam pameran desain tingkat nasional', '0000-00-00 00:00:00', 'Mahasiswa Desain Produk Paramadina kembali berpartisipasi dalam â€œPameran Produk Kayu dan Rotan Indonesia 2012â€', '6c70108fbb1cb53d85b95e4d86d06610_5.jpg', 'http://paramadina.ac.id/index.php?option=com_content&view=article&id=1029%3Adesain-produk-paramadina-dalam-pameran-desain-tingkat-nasional&catid=54%3Adesain-produk&Itemid=128&lang=en', '2013-01-15 22:34:06', '2013-01-15 15:34:07', 1, 1),
(10, 'Kunjungan Industri 10 finalis PSDC 2012', '0000-00-00 00:00:00', 'Kunjungan 10 finalis PSDC 2012 ke kantor D2C (Direct Design Center) PT Tritunggal Bangun Sejahtera', '6c99f174571af15e8d81b7f7bd813371_6.jpg', 'http://paramadina.ac.id/index.php?option=com_content&view=article&id=1028%3Akunjungan-industri-10-finalis-psdc-2012&catid=54%3Adesain-produk&Itemid=128&lang=en', '2013-01-15 22:37:16', '2013-01-15 15:37:17', 1, 1),
(11, 'Manisnya Hidup: Menikmati Minuman Penyegar Tanpa Rasa Bersalah', '0000-00-00 00:00:00', 'Menikmati Minuman Penyegar tanpa ada rasa khawatir', '136a306af5bf152192c4c5e1517976df_7.jpg', 'http://health.detik.com/read/2013/01/15/123543/2142489/756/manisnya-hidup-menikmati-minuman-penyegar-tanpa-rasa-bersalah?l992202755', '2013-01-15 22:48:25', '2013-01-15 15:48:26', 2, 1),
(12, 'Ini Efek Samping Diabetes Terhadap Kesehatan Emosi ', '0000-00-00 00:00:00', 'Efek Samping Diabetes terhadap kesehatan aspek emosional seseorang.', '162eea7ba7e22586bf189ef168e7836a_8.jpg', 'http://health.detik.com/read/2013/01/15/113056/2142403/766/ini-efek-samping-diabetes-terhadap-kesehatan-emosi', '2013-01-15 22:52:25', '2013-01-15 15:52:26', 2, 1),
(13, 'Ini Dia Posisi Tidur yang Baik dan Buruk bagi Kesehatan', '0000-00-00 00:00:00', 'Posisi tidur yang Baik dan buruk bagi kesehatan', '9a182386795ebee60b06e405285299d3_9.jpg', 'http://health.detik.com/read/2013/01/14/190000/2141944/766/ini-dia-posisi-tidur-yang-baik-dan-buruk-bagi-kesehatan', '2013-01-15 23:02:35', '2013-01-15 16:02:36', 2, 1),
(14, 'Overdosis Vitamin Bikin Tubuh Susah Menyembuhkan Diri', '0000-00-00 00:00:00', 'Efek buruk dari overdosis dalam mengkonsumsi vitamin', '1be07da5229b3d902269cf7c25178c6b_10.jpg', 'http://health.detik.com/read/2013/01/14/153210/2141621/763/overdosis-vitamin-bikin-tubuh-susah-menyembuhkan-diri', '2013-01-15 23:08:32', '2013-01-15 16:08:33', 2, 1),
(15, 'Ini Kebiasaan Buruk yang Bikin Anda Lebih Rentan Tertular Flu', '0000-00-00 00:00:00', 'Kebiasaan buruk yang sering dilakukan dan menjadi faktor tertularnya virus flu,', '0b6ff9ca44fa0de1c6eac1c10d67b95b_11.jpg', 'http://health.detik.com/read/2013/01/14/110024/2141163/766/ini-kebiasaan-buruk-yang-bikin-anda-lebih-rentan-tertular-flu', '2013-01-15 23:15:05', '2013-01-15 16:15:06', 2, 1),
(16, '''Bodyguard'' Alami Ini Bikin Tubuh Tetap Sehat', '0000-00-00 00:00:00', '''Bodyguard'' alami dan aneh di tubuh yang bikin seseorang tetap sehat', 'f115b2389bc5d723674a44d2b0b452b0_12.jpg', 'http://health.detik.com/read/2013/01/14/112535/2141223/766/-bodyguard--alami-ini-bikin-tubuh-tetap-sehat', '2013-01-15 23:18:35', '2013-01-15 16:18:36', 2, 1),
(17, 'Manfaat Sehat yang Anda Dapatkan dengan Minum Jus Lemon', '0000-00-00 00:00:00', 'Manfaat meminum jus lemon', 'd15c81ccc8d9a77a8c718d052a3b8fc2_13.jpg', 'http://health.detik.com/read/2013/01/13/150104/2140733/766/manfaat-sehat-yang-anda-dapatkan-dengan-minum-jus-lemon', '2013-01-15 23:20:45', '2013-01-15 16:20:46', 2, 1),
(18, 'Waduh, Penggunaan Biofuel Ternyata Bisa Hasilkan Zat Beracun', '0000-00-00 00:00:00', 'Emisi yang dilepaskan dari pembakaran biofuel dapat berubah menjadi senyawa kimia berbahaya.', '408a3528d5e98c415906a7a82bbc3148_14.jpg', 'http://health.detik.com/read/2013/01/14/083131/2140996/763/waduh-penggunaan-biofuel-ternyata-bisa-hasilkan-zat-beracun', '2013-01-15 23:25:23', '2013-01-15 16:25:24', 2, 1),
(19, 'Nge-tweet & Update Status Facebook Bisa Memecah Konsentrasi Kerja ', '0000-00-00 00:00:00', 'Meng-update status di Twitter atau Facebook dapat menyabotase konsentrasi Anda.', '0ca4c528a32184eb24cade51fb071f95_15.jpg', 'http://health.detik.com/read/2013/01/11/143000/2139694/763/nge-tweet-update-status-facebook-bisa-memecah-konsentrasi-kerja', '2013-01-15 23:30:31', '2013-01-15 16:30:32', 2, 1),
(20, 'Awas, Menghirup Asap Rokok Tingkatkan Risiko Pikun', '0000-00-00 00:00:00', 'Menghirup asap rokok dapat meningkatkan resiko terjadinya kepikunan', '55ba80d46a5220779a68ac5fb5fd2ee9_17.jpg', 'http://health.detik.com/read/2013/01/11/105824/2139356/763/awas-menghirup-asap-rokok-tingkatkan-risiko-pikun', '2013-01-15 23:32:38', '2013-01-15 16:32:39', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE IF NOT EXISTS `quotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(1000) NOT NULL,
  `author` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `text`, `author`) VALUES
(1, 'Ternyata dibalik ke-TIDAKTAHU-an kita, TUHAN telah menyiapkan SURPRISE! ', 'MeerryCH'),
(2, 'Belajarlah dari kesalahan dan jangan menyerah sebelum berperang', 'jungki'),
(3, 'Yang mengkritikmu itu sebetulnya sedang menerima tugasNYA utk menguji kebesaran jiwamu', 'AlissaWahid'),
(4, 'Tidak ada kata "tidak bisa" yang ada hanya "mau" atau "tidak mau"', 'Cirelli'),
(5, 'Penderitaan menghasilkan pengalaman dan pengalaman menghasilkan kebijaksanaan ', 'PresidenSuper'),
(6, 'Apapun bisa diselesaikan, jika kamu mau menyelesaikannya. Tiada kunci yang tak bisa dibuka, tiada ikatan yang tak bisa dilepaskan', 'Sin xian'),
(7, 'Jangan biarkan masa lalumu menjadi penentu kebahagiaan masa kini dan masa depan mu ', 'KeishaVourie'),
(8, 'Seburuk apa pun hari ini. Percayalah, masih ada esok yang akan lebih baik', 'Rrantii'),
(9, 'Tiada masalah yang terlalu besar jika kamu memiliki tujuan hidup yang lebih besar', 'Indra pagandi'),
(10, 'Terkadang kita lebih mengejar sesuatu yg sulit diperoleh, tetapi sering melupakan nikmat yg ada didepan mata', 'jun xin'),
(11, 'Hasil tertinggi pendidikan adalah sikap teloransi', 'Hellen Keller'),
(12, 'Pendidikan membuat perbedaan besar di antara manusia', 'Andalas'),
(13, 'Kejeniusan tanpa pendidikan adalah ibarat perak di dalam tambang', 'Gerbang Timur'),
(14, 'Pendidikan mengembangkan kemampuan, tetapi tidak menciptakannya', 'Aris Munandar'),
(15, 'Pendidikan membuat perbedaan besar di antara manusia', 'John Locke'),
(16, 'Pendidikan mempunyai akar yang pahit, tapi buahnya manis', 'Aris Toteles'),
(17, 'Semua kebijakan dapat di ukur dengan keadilan', 'Aris Toteles'),
(18, 'Diri kita dibentuk dari apa yang kita lakukan berulang kali; sedangkan kesuksesan bukan merupakan usaha dan tindakan melainkan akibat dari suatu kebiasaan!', 'Aris Toteles'),
(19, 'Jangan mencoba untuk menjadi orang yang sukses, lebih baik mencoba untuk menjadi orang yang berguna', 'Albert Einstein'),
(20, 'Ilmu pengetahuan, Tuan-tuan, betapa pun tingginya, dia tidak berpribadi. Sehebat-hebatnya mesin, dibikin oleh sehebat-hebat manusia dia pun tidak berpribadi. Tetapi sesederhana-sederhana cerita yang ditulis, dia mewakili pribadi individu atau malahan bisa juga bangsanya', 'Pramoedya'),
(21, 'Orang sukses sejati adalah mereka yang berhasil menata diri, pikiran, mata serta mulutnya', 'Abdullah Gymnastiar'),
(22, 'Tidak ada manusia yang menyembah pendidikan mendapatkan hasil terbaik dalam pendidikan', 'Sugiharto'),
(23, 'Seluruh tujuan pendidikan adalah untuk mengganti cermin menjadi jendela', 'Michael Jackson'),
(24, 'Pendidikan telah menciptakan populasi yang luas, yang dapat membaca tapi tidak bisa membedakan apa yang pantas dibaca', 'Indra jun'),
(25, 'Pendidikan adalah penemuan terbesar dalam kebodohan kita sendiri', 'Suara Merdeka'),
(26, 'Pendidikan bukan persiapan untuk hidup, pendidikan adalah hidup itu sendiri', 'John Dewey'),
(27, 'Tujuan pendidikan adalah mempersiapkan generasi muda', 'Robert Maynard'),
(28, 'Untuk mendidik diri mereka sendiri seumur hidup mereka ', 'Gloria Steinem'),
(29, 'Yang hebat didunia ini bukanlah tempat dimana kita berada melainkan arah yang kita tuju ', 'Oliver Windwill'),
(30, 'Arah yang diberikan pendidikan untuk mengawali hidup seseorang akan menentukan masa depannya', 'Plato'),
(31, 'Murid yang dipersenjatai dengan informasi akan selalu memenangkan pertempuran', 'Meladee McCarty'),
(32, 'Mengajar berarti belajar lagi', 'Oliver Wendell'),
(33, 'Guru biasa memberitahukan, guru baik menjelaskan, guru ulung memeragakan, guru hebat mengilhami ', 'William Arthur'),
(34, 'Aku menyentuh masa depan. Aku mengajar', 'Christa McClauf'),
(35, 'Seni mengajar dalah seni membantu penemuan ', 'Mark Van Doren'),
(36, 'Aku bukan seorang Guru tapi seorang pembangkit ', 'Robert Frost'),
(37, 'Tujuan mengajar adalah untuk membuat anak bisa maju tanpa Gurunya', 'Elbert Hubbard'),
(38, 'Mengajari anak-anak berhitung memang bagus, tapi yang terbaik adalah mengajari mereka apa yang perlu diperhitungkan', 'Rob Talent'),
(39, 'Anak-anak adalah sumber alam kita yang paling berharga ', 'Herbert Hoover'),
(40, 'Setiap murid bisa belajar, hanya saja tidak pada hari yang sama atau dengan cara yang sama ', 'George Evans'),
(41, 'Keluhuran budi pekerti akan tampak pada ucapan dan tindakan', 'Matthew Bellamy'),
(42, 'Orang yang berjiwa besar teguh pendiriannya, tetapi tidak keras kepala', 'Christ Wolstenhome'),
(43, 'Bekerja atas dorongan cinta akan terasa senang tiada jemu dan lelah', 'Dominique Howard'),
(44, 'Sifat orang yang berlilmu tinggi adalah merendahkan hari kepada manusia dan takut kepada Tuhan', 'Indira'),
(45, 'Belajarlah dari kesalahan orang lain. Anda tak dapat hidup cukup lama untuk melakukan semua kesalahan itu sendiri', 'Martin Vanbee'),
(46, 'Raihlah ilmu, dan untuk meraih ilmu belajarlah untuk tenang dan sabar', 'Khalifah Umar'),
(47, 'Pengetahuan tidaklah cukup; kita harus mengamalkannya. Niat tidaklah cukup; kita harus melakukannya', 'Johan Wolfgang'),
(48, 'Ilmu pengetahuan tanpa agama adalah pincang', 'Albert Einstein'),
(49, 'Semua ilmu ada pokok bahasannya. Pokok bahasan ilmu para Nabi adalah manusia... Mereka datang untuk mendidik manusia', 'George inteus'),
(50, 'Kemalasan memang tampak menggoda, tapi bekerja memberi kepuasan', 'Anne Franc'),
(51, 'Hiduplah seolah-olah Anda adalah untuk mati besok. Pelajari seolah-olah Anda adalah untuk hidup selamanya', 'Mahatma Ghandi'),
(52, 'Saya tidak pernah membiarkan sekolah saya mengganggu pendidikan saya', 'Mark Twinn'),
(53, 'Dunia adalah sebuah buku dan orang-orang yang tidak melakukan perjalanan hanya membaca satu halaman', 'Saint Augustine'),
(54, 'Anda mendidik seorang pria. Anda mendidik seorang perempuan, Anda mendidik satu generasi', 'Bringham Young'),
(55, 'Pendidikan adalah senjata paling ampuh yang dapat anda gunakan untuk mengubah dunia', 'Nelson Mandela'),
(56, 'Pendidikan adalah kemampuan untuk mendengarkan pada hampir semua hal tanpa kehilangan kesabaran anda atau rasa percaya diri anda', 'Robert Frost'),
(57, 'Jika Anda ingin bercinta, pergi ke perguruan tinggi. Jika Anda ingin pendidikan, pergi ke perpustakaan', 'Frank Zappa'),
(58, 'Saya bukan seorang guru, melainkan saya dapat menyadarkan semua orang untuk menuntut ilmu', 'Robert Frost'),
(59, 'Tanpa pendidikan, kita berada dalam bahaya mengerikan dan mematikan', 'G.K'),
(60, 'Yang berpendidikan berbeda dengan yang tidak berpendidikan sebanyak hidup berbeda dari orang mati', 'Aristotle'),
(61, 'Cobalah untuk tidak memiliki waktu yang baik ... ini seharusnya pendidikan', 'Charlez M'),
(62, 'Anak-anak harus diajarkan bagaimana untuk berpikir, bukan apa yang harus dipikirkan', 'Margareth Meth'),
(63, 'Mendidik pikiran tanpa mendidik hati adalah bukan pendidikan sama sekali', 'Aristotle'),
(64, 'Pendidikan adalah paspor kami untuk masa depan, karena besok milik orang-orang yang mempersiapkan diri untuk hari ini', 'Malcolm X'),
(65, 'Pernikahan bisa menunggu, pendidikan tidak bisa', 'Khalaed'),
(66, 'Aku pergi ke sekolah, tapi aku tidak pernah belajar apa yang saya ingin tahu', 'Bill Waterson'),
(67, 'Pendidikan terdiri terutama dari apa yang telah kita pelajari', 'Mark Twain'),
(68, 'Siapapun yang berhenti belajar adalah kaum tua, baik di dua puluh atau delapan puluh. Siapapun yang terus belajar tetap muda', 'Henry Foard'),
(69, 'Orang yang membaca apa-apa yang lebih berpendidikan dibandingkan orang yang membaca apa-apa kecuali surat kabar', 'Thomas Jaferson'),
(70, 'Mendidik anak laki-laki, dan Anda mendidik seorang individu. Mendidik seorang gadis, dan Anda mendidik masyarakat', 'Greg Mortesson'),
(71, 'Pendidikan bukanlah pengisian ember, tapi pencahayaan dari api', 'Wahid buddi'),
(72, 'Untuk mendidik orang dalam pikiran tetapi tidak dalam moral adalah untuk mendidik ancaman kepada masyarakat', 'Theodore'),
(73, 'Saya lebih suka menghibur dan berharap bahwa orang belajar sesuatu daripada mendidik orang dan berharap mereka dihibur', 'Walt Disney'),
(74, 'Pendidikan formal akan membuat Anda hidup dan akan membuat Anda uang', 'Jim Rohn'),
(75, 'Pendidikan adalah nyala api, bukan mengisi sebuah kapal', 'Socrates'),
(76, 'Pendidikan, saya yakin, satu-satunya jenis pendidikan ada', 'Isaac'),
(77, 'Favorit saya definisi intelektual: Seseorang ''yang telah dididik di luar / nya kecerdasannya', 'Arthur'),
(78, 'Pendidikan adalah kekuatan untuk berpikir jernih, kekuatan untuk bertindak baik di pekerjaan dunia, dan kekuatan untuk menghargai hidup', 'Brigyam Hyung'),
(79, 'Pendidikan bukanlah pengganti untuk kecerdasan', 'Frank Herbet'),
(80, 'Pendidikan adalah sebuah sistem ketidaktahuan ditetapkan', 'Noam Chomsky'),
(81, 'Saya pikir Anda belajar lebih banyak jika anda tertawa pada saat yang sama', 'Mary Ann'),
(82, 'Sejarah manusia menjadi lebih dan lebih perlombaan antara pendidikan dan bencana', 'H.G'),
(83, 'Kebijaksanaan, datang bukan dari usia, tapi dari pendidikan dan pembelajaran', 'Anton Chekov'),
(84, 'Semua kehidupan adalah pendidikan konstan', 'Elanor Rosevart'),
(85, 'Pendidikan adalah penemuan progresif kebodohan kita sendiri', 'Will Durant'),
(86, 'Rahasia pendidikan terletak pada menghargai murid', 'Ralph Waldo'),
(87, 'Pendidikan umum tidak didirikan untuk memberikan masyarakat apa yang diinginkan. Justru sebaliknya', 'May Sarton'),
(88, 'Tidak ada sekolah sama dengan rumah yang layak dan tidak ada guru sama dengan orang tua yang saleh', 'Mahatma Gandhi'),
(89, 'Pendidikan melahirkan keyakinan. Keyakinan berharap keturunan. Harapan melahirkan perdamaian', 'Confucius'),
(90, 'Bermain adalah bentuk tertinggi dari penelitian', 'Albert Einstein'),
(91, 'Pendidikan, telah menghasilkan populasi yang luas mampu membaca tetapi tidak dapat membedakan apa yang patut dibaca', 'George Mc aulay'),
(92, 'Pendidikan adalah senjata, yang berpengaruh tergantung pada siapa yang memegang di tangannya dan pada siapa ditujukan', 'Joseph Stalin'),
(93, 'Belajar tanpa berpikir adalah kerja hilang, berpikir tanpa belajar adalah berbahaya', 'Confucius'),
(94, 'Tujuan pendidikan totaliter tidak pernah menanamkan keyakinan tetapi untuk menghancurkan kemampuan untuk membentuk kebanyakan orang', 'Hannah Arendth'),
(95, 'Pendidikan adalah proses penjualan seseorang di buku', 'Douglas Wilson'),
(96, 'Belajar adalah hiasan dalam kemakmuran, tempat perlindungan dalam kesengsaraan, dan rezeki di usia tua', 'Aristotle'),
(97, 'Pendidikan saya adalah kebebasan saya harus membaca tanpa pandang bulu dan sepanjang waktu, dengan mata saya', 'Dylan Thomas'),
(98, 'Ketika Anda mempelajari guru besar ... Anda akan belajar lebih banyak dari pekerjaan mereka peduli dan keras daripada dari gaya mereka', 'Willam Glasser'),
(99, 'Pendidikan yang sesungguhnya akhirnya harus terbatas pada orang-orang yang bersikeras untuk tahu. Sisanya adalah menggiring domba', 'Ezra Pound'),
(100, 'Tidak ada kekayaan seperti pengetahuan, tidak ada kemiskinan seperti kebodohan', 'Ali Bin Abi Thalib');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` varchar(9) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nickname` varchar(15) NOT NULL,
  `birth_date` date NOT NULL,
  `address` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `join_date` date NOT NULL,
  `major_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `nickname`, `birth_date`, `address`, `email`, `join_date`, `major_id`, `user_id`) VALUES
('210000013', 'Emanuel Agung Cahyono', 'Nuel', '1992-01-21', 'Wonosobo', 'emanuel.cahyono92@gmail.com', '2010-09-16', 8, 3),
('210000027', 'Mokhamad Syamsul Latief Imam H', 'Imam', '1992-08-04', 'Jl. M. Hasan', 'imam.hidayat92@gmail.com', '2010-09-20', 8, 1),
('837800001', 'Test User 1', 'Alpha', '1992-12-20', '', 'someone@example.com', '2007-09-01', 1, 0),
('837800002', 'Test User 2', 'Beta', '1994-12-01', 'Jl. Somewhere', 'someone@example.com', '2011-09-20', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` bit(1) NOT NULL,
  `account_type` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created`, `modified`, `is_active`, `account_type`, `account_id`) VALUES
(1, 'imam', 'e7aaa6dbbb525a8d3a811cc8249ada10b441d3b7', '2013-01-14 23:04:30', '2013-01-14 17:23:48', '1', 3, 210000027),
(2, 'alpha', 'e7aaa6dbbb525a8d3a811cc8249ada10b441d3b7', '2013-01-15 03:34:44', '2013-01-14 20:35:28', '1', 3, 837800001),
(3, 'nuel', 'e7aaa6dbbb525a8d3a811cc8249ada10b441d3b7', '2013-01-15 12:44:39', '2013-01-15 05:47:47', '1', 3, 210000013),
(4, 'admin', 'e7aaa6dbbb525a8d3a811cc8249ada10b441d3b7', '2013-01-15 15:07:38', '2013-01-15 08:19:36', '1', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
