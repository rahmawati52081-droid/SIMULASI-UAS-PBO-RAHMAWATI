-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2026 at 08:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_ti1d_rahmawati`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(100) DEFAULT NULL,
  `lokasi_kampus` varchar(100) DEFAULT NULL,
  `jenis_prestasi` varchar(50) DEFAULT NULL,
  `tingkat_prestasi` varchar(50) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(100) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Ahmad Fauzi', 'SMAN 1 Jakarta', 85.50, 250000.00, 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(2, 'Budi Santoso', 'SMAN 3 Bandung', 78.25, 250000.00, 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(3, 'Citra Lestari', 'SMAN 2 Surabaya', 92.00, 250000.00, 'Reguler', 'Kedokteran', 'Kampus Barat', NULL, NULL, NULL, NULL),
(4, 'Dedi Wijaya', 'SMKN 1 Semarang', 80.00, 250000.00, 'Reguler', 'Teknik Elektro', 'Kampus Utama', NULL, NULL, NULL, NULL),
(5, 'Eka Putri', 'SMA Kristen Yusuf', 88.75, 250000.00, 'Reguler', 'Akuntansi', 'Kampus Barat', NULL, NULL, NULL, NULL),
(6, 'Fajar Nugroho', 'SMAN 8 Yogyakarta', 84.10, 250000.00, 'Reguler', 'Manajemen', 'Kampus Barat', NULL, NULL, NULL, NULL),
(7, 'Gita Permata', 'SMAN 1 Medan', 79.90, 250000.00, 'Reguler', 'Psikologi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(8, 'Hadi Syahputra', 'SMAN 17 Palembang', 86.00, 150000.00, 'Prestasi', 'Hukum', 'Kampus Utama', 'Olimpiade Matematika', 'Nasional', NULL, NULL),
(9, 'Indah Cahyani', 'SMA Al-Azhar Pusat', 90.50, 150000.00, 'Prestasi', 'Teknik Kimia', 'Kampus Utama', 'Karya Ilmiah Remaja', 'Internasional', NULL, NULL),
(10, 'Joko Tingkir', 'SMAN 1 Solo', 75.00, 150000.00, 'Prestasi', 'Ilmu Komunikasi', 'Kampus Barat', 'Futsal', 'Provinsi', NULL, NULL),
(11, 'Kartika Sari', 'SMAN 3 Malang', 89.20, 150000.00, 'Prestasi', 'Sastra Inggris', 'Kampus Barat', 'Debat Bahasa Inggris', 'Nasional', NULL, NULL),
(12, 'Laksana Tri', 'SMAN 1 Denpasar', 83.40, 150000.00, 'Prestasi', 'Arsitektur', 'Kampus Utama', 'Desain Grafis', 'Nasional', NULL, NULL),
(13, 'Mega Utami', 'SMA Taruna Nusantara', 91.15, 150000.00, 'Prestasi', 'Hubungan Internasional', 'Kampus Utama', 'Paskibraka', 'Nasional', NULL, NULL),
(14, 'Naufal Hadi', 'SMAN 1 Makassar', 82.00, 150000.00, 'Prestasi', 'Teknik Sipil', 'Kampus Utama', 'Bulutangkis', 'Provinsi', NULL, NULL),
(15, 'Oki Darmawan', 'SMAN 4 Bandung', 87.30, 300000.00, 'Kedinasan', 'Statistika', 'Kampus Utama', NULL, NULL, 'SK-772/KD/2026', 'Badan Pusat Statistik'),
(16, 'Putri Amelia', 'SMAN 1 padang', 89.00, 300000.00, 'Kedinasan', 'Administrasi Publik', 'Kampus Barat', NULL, NULL, 'SK-104/KD/2026', 'Kementerian Dalam Negeri'),
(17, 'Qomaruddin', 'MAN 2 Kebumen', 81.50, 300000.00, 'Kedinasan', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, 'SK-055/BSSN/2026', 'Badan Siber dan Sandi Negara'),
(18, 'Rini Astuti', 'SMAN 70 Jakarta', 93.40, 300000.00, 'Kedinasan', 'Akuntansi Sektor Publik', 'Kampus Barat', NULL, NULL, 'SK-991/KEMENKEU/2026', 'Kementerian Keuangan'),
(19, 'Sultan Bahtiar', 'SMAN 1 Banjarmasin', 84.60, 300000.00, 'Kedinasan', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, 'SK-203/KOMINFO/2026', 'Kementerian Kominfo'),
(20, 'Tari Handayani', 'SMAN 1 Pontianak', 86.85, 300000.00, 'Kedinasan', 'Manajemen Logistik', 'Kampus Barat', NULL, NULL, 'SK-412/HUB/2026', 'Kementerian Perhubungan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
