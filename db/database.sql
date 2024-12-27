-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 27, 2024 at 04:01 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_ledger`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

DROP TABLE IF EXISTS `akses`;
CREATE TABLE IF NOT EXISTS `akses` (
  `id_akses` int(11) NOT NULL AUTO_INCREMENT,
  `nama_akses` varchar(255) NOT NULL,
  `kontak_akses` varchar(20) DEFAULT NULL,
  `email_akses` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `image_akses` char(40) DEFAULT NULL COMMENT '36untuknama dan 3 untuk ext',
  `akses` varchar(20) NOT NULL,
  `datetime_daftar` datetime NOT NULL,
  `datetime_update` datetime NOT NULL,
  PRIMARY KEY (`id_akses`),
  KEY `akses` (`akses`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `akses_album`
--

DROP TABLE IF EXISTS `akses_album`;
CREATE TABLE IF NOT EXISTS `akses_album` (
  `id_akses_album` int(11) NOT NULL AUTO_INCREMENT,
  `id_akses` int(11) NOT NULL,
  `nama_album` varchar(50) NOT NULL,
  PRIMARY KEY (`id_akses_album`),
  KEY `id_akses` (`id_akses`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `akses_entitas`
--

DROP TABLE IF EXISTS `akses_entitas`;
CREATE TABLE IF NOT EXISTS `akses_entitas` (
  `uuid_akses_entitas` varchar(32) NOT NULL,
  `akses` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`uuid_akses_entitas`),
  KEY `akses` (`akses`),
  KEY `uuid_akses_entitas` (`uuid_akses_entitas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `akses_fitur`
--

DROP TABLE IF EXISTS `akses_fitur`;
CREATE TABLE IF NOT EXISTS `akses_fitur` (
  `id_akses_fitur` int(11) NOT NULL AUTO_INCREMENT,
  `kode` char(32) NOT NULL,
  `nama` text NOT NULL,
  `kategori` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_akses_fitur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `akses_galeri`
--

DROP TABLE IF EXISTS `akses_galeri`;
CREATE TABLE IF NOT EXISTS `akses_galeri` (
  `id_akses_galeri` int(11) NOT NULL AUTO_INCREMENT,
  `id_akses` int(11) NOT NULL,
  `id_akses_album` int(11) NOT NULL,
  `foto` char(36) NOT NULL COMMENT 'Filename foto',
  `caption` text NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id_akses_galeri`),
  KEY `id_akses` (`id_akses`),
  KEY `id_akses_album` (`id_akses_album`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `akses_ijin`
--

DROP TABLE IF EXISTS `akses_ijin`;
CREATE TABLE IF NOT EXISTS `akses_ijin` (
  `id_akses` int(10) NOT NULL,
  `id_akses_fitur` int(12) NOT NULL,
  `kode` varchar(32) NOT NULL,
  `nama` text NOT NULL,
  `kategori` text NOT NULL,
  KEY `id_akses` (`id_akses`),
  KEY `id_akses_fitur` (`id_akses_fitur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `akses_login`
--

DROP TABLE IF EXISTS `akses_login`;
CREATE TABLE IF NOT EXISTS `akses_login` (
  `id_akses` int(11) NOT NULL,
  `token` char(32) NOT NULL,
  `date_creat` datetime NOT NULL,
  `date_expired` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `akses_referensi`
--

DROP TABLE IF EXISTS `akses_referensi`;
CREATE TABLE IF NOT EXISTS `akses_referensi` (
  `id_akses_referensi` int(12) NOT NULL AUTO_INCREMENT,
  `uuid_akses_entitas` varchar(32) NOT NULL,
  `id_akses_fitur` int(12) NOT NULL,
  PRIMARY KEY (`id_akses_referensi`),
  KEY `uuid_akses_entitas` (`uuid_akses_entitas`),
  KEY `id_akses_fitur` (`id_akses_fitur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `akses_validasi`
--

DROP TABLE IF EXISTS `akses_validasi`;
CREATE TABLE IF NOT EXISTS `akses_validasi` (
  `id_akses_validasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_akses` int(11) NOT NULL,
  `kode_rahasia` char(12) NOT NULL COMMENT '12 digit (md5)',
  `datetime_creat` datetime NOT NULL,
  `datetime_expired` datetime NOT NULL,
  `ussed` tinyint(1) NOT NULL COMMENT '1: Sudah digunakan\r\n0: Belum',
  PRIMARY KEY (`id_akses_validasi`),
  KEY `to_akses` (`id_akses`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `id_log` int(10) NOT NULL AUTO_INCREMENT,
  `id_akses` int(10) DEFAULT NULL,
  `datetime_log` varchar(25) NOT NULL,
  `kategori_log` varchar(20) NOT NULL,
  `deskripsi_log` varchar(100) NOT NULL,
  PRIMARY KEY (`id_log`),
  KEY `id_akses` (`id_akses`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_email`
--

DROP TABLE IF EXISTS `log_email`;
CREATE TABLE IF NOT EXISTS `log_email` (
  `id_log_email` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text,
  `email` text NOT NULL,
  `subjek` text NOT NULL,
  `pesan` text NOT NULL,
  `datetime` text NOT NULL,
  PRIMARY KEY (`id_log_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lupa_password`
--

DROP TABLE IF EXISTS `lupa_password`;
CREATE TABLE IF NOT EXISTS `lupa_password` (
  `id_lupa_password` int(10) NOT NULL AUTO_INCREMENT,
  `id_akses` int(10) NOT NULL,
  `tanggal_dibuat` varchar(25) NOT NULL,
  `tanggal_expired` varchar(25) NOT NULL,
  `code_unik` text NOT NULL,
  PRIMARY KEY (`id_lupa_password`),
  KEY `id_akses` (`id_akses`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setting_email_gateway`
--

DROP TABLE IF EXISTS `setting_email_gateway`;
CREATE TABLE IF NOT EXISTS `setting_email_gateway` (
  `id_setting_email_gateway` int(10) NOT NULL AUTO_INCREMENT,
  `email_gateway` text,
  `password_gateway` varchar(20) DEFAULT NULL,
  `url_provider` text,
  `port_gateway` varchar(10) DEFAULT NULL,
  `nama_pengirim` varchar(25) DEFAULT NULL,
  `url_service` text NOT NULL,
  `validasi_email` varchar(10) NOT NULL,
  `redirect_validasi` text NOT NULL,
  `pesan_validasi_email` text NOT NULL,
  PRIMARY KEY (`id_setting_email_gateway`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setting_general`
--

DROP TABLE IF EXISTS `setting_general`;
CREATE TABLE IF NOT EXISTS `setting_general` (
  `id_setting_general` int(11) NOT NULL AUTO_INCREMENT,
  `title_page` varchar(20) NOT NULL,
  `kata_kunci` text NOT NULL,
  `deskripsi` text NOT NULL,
  `alamat_bisnis` text NOT NULL,
  `email_bisnis` text NOT NULL,
  `telepon_bisnis` varchar(15) NOT NULL,
  `favicon` text NOT NULL,
  `logo` text NOT NULL,
  `base_url` text NOT NULL,
  PRIMARY KEY (`id_setting_general`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akses`
--
ALTER TABLE `akses`
  ADD CONSTRAINT `akses_ibfk_1` FOREIGN KEY (`akses`) REFERENCES `akses_entitas` (`akses`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `akses_album`
--
ALTER TABLE `akses_album`
  ADD CONSTRAINT `album_to_akses` FOREIGN KEY (`id_akses`) REFERENCES `akses` (`id_akses`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `akses_galeri`
--
ALTER TABLE `akses_galeri`
  ADD CONSTRAINT `galeri_to_akses` FOREIGN KEY (`id_akses`) REFERENCES `akses` (`id_akses`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `galeri_to_album` FOREIGN KEY (`id_akses_album`) REFERENCES `akses_album` (`id_akses_album`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `akses_ijin`
--
ALTER TABLE `akses_ijin`
  ADD CONSTRAINT `akses_ijin_ibfk_1` FOREIGN KEY (`id_akses`) REFERENCES `akses` (`id_akses`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `akses_ijin_ibfk_2` FOREIGN KEY (`id_akses_fitur`) REFERENCES `akses_fitur` (`id_akses_fitur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `akses_referensi`
--
ALTER TABLE `akses_referensi`
  ADD CONSTRAINT `akses_referensi_ibfk_1` FOREIGN KEY (`uuid_akses_entitas`) REFERENCES `akses_entitas` (`uuid_akses_entitas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `akses_referensi_ibfk_2` FOREIGN KEY (`id_akses_fitur`) REFERENCES `akses_fitur` (`id_akses_fitur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `akses_validasi`
--
ALTER TABLE `akses_validasi`
  ADD CONSTRAINT `to_akses` FOREIGN KEY (`id_akses`) REFERENCES `akses` (`id_akses`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`id_akses`) REFERENCES `akses` (`id_akses`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `lupa_password`
--
ALTER TABLE `lupa_password`
  ADD CONSTRAINT `lupa_password_ibfk_1` FOREIGN KEY (`id_akses`) REFERENCES `akses` (`id_akses`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
