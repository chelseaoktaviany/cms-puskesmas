-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2022 at 06:34 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms-puskesmas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(6) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(25) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `nama_lengkap`, `email`, `password`, `image`) VALUES
('1', 'lucassixtynine', 'Lucas', 'lucassixtynine@email.com', '1234', '562326692_39103463f6171dec918b21c7548e0110.png'),
('2', 'admin', 'elena cantik', 'elena@email.com', '12', '598021790_chxl.jpeg'),
('3', 'johnsonxx', 'johnson', 'johnson22@email.com', '4566', '');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `kode_dokter` varchar(6) NOT NULL,
  `nama_dokter` varchar(30) DEFAULT NULL,
  `jenis_kelamin` varchar(2) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `keahlian` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`kode_dokter`, `nama_dokter`, `jenis_kelamin`, `telepon`, `alamat`, `keahlian`) VALUES
('D00001', 'Dr. Elena Kusuma', 'P', '0839400920', 'Jl. Gajah Mada, No. 8', 'Dokter Spesialis Kulit'),
('D00002', 'Dr. Jason Widjaja', 'L', '08877156990', 'Jl. Bekasi Jaya, No. 2', 'Dokter Spesialis Gigi'),
('D00003', 'Kassandra', 'P', '+1082093302', 'Elephant St.', 'Dokter Spesialis Telinga');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `kode_kamar` varchar(6) NOT NULL,
  `jenis_kamar` varchar(30) DEFAULT NULL,
  `tarif_permalam` int(11) DEFAULT NULL,
  `fasilitas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`kode_kamar`, `jenis_kamar`, `tarif_permalam`, `fasilitas`) VALUES
('K00001', 'Kamar Kelas 1', 100000, 'AC, TV, WC, 2 orang'),
('K00002', 'VVIP Kelas 2', 750000, 'AC, Dapur, TV, WC, 1 orang');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `kode_layanan` varchar(6) NOT NULL,
  `jenis_layanan` varchar(50) DEFAULT NULL,
  `tarif_layanan` int(11) DEFAULT NULL,
  `kode_dokter` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`kode_layanan`, `jenis_layanan`, `tarif_layanan`, `kode_dokter`) VALUES
('L00001', 'Konsultasi Gigi', 200000, 'D00002'),
('L00002', 'Konsultasi Kulit', 450000, 'D00001');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kode_obat` varchar(6) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `satuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kode_obat`, `nama_obat`, `harga`, `deskripsi`, `satuan`) VALUES
('OB0001', 'Proris Ibuprofen 200 mg', 30000, 'Obat ini digunakan untuk nyeri ringan sampai sedang antara lain penyakit gigi atau pencabutan gigi', 'Tablet'),
('OB0002', 'Hydrocortisone', 25000, 'Obat yang digunakan untuk meredakan perandangan, mengurangi reaksi sistem kekebalan tubuh', 'Unit'),
('OB0003', 'Siladex Antitussive', 40000, 'Obat batuk yang diformulasikan khusus untuk mengatasi masalah batuk tidak berdahak atau kering', 'Sirup');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `kode_pasien` varchar(6) NOT NULL,
  `nama_pasien` varchar(30) DEFAULT NULL,
  `jenis_kelamin` varchar(1) DEFAULT NULL,
  `gol_darah` varchar(2) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`kode_pasien`, `nama_pasien`, `jenis_kelamin`, `gol_darah`, `tanggal_lahir`, `alamat`) VALUES
('P00001', 'Diana', 'P', 'A', '1987-06-24', 'Jl. Jatinegara Timur, 19'),
('P00002', 'Leonard', 'L', 'AB', '1990-08-19', 'Jl. Cipinang Muara'),
('P00003', 'Claude', 'L', 'AB', '1980-08-19', 'Jl. Anggrek Biru'),
('P00004', 'Catalina', 'P', 'O', '1983-02-15', 'Jl. Anggrek Biru');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `no_record` varchar(6) NOT NULL,
  `tanggal_masuk` datetime DEFAULT NULL,
  `diagnosa` text DEFAULT NULL,
  `kode_pasien` varchar(6) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `tarif_kamar` int(11) DEFAULT NULL,
  `tarif_layanan` int(11) DEFAULT NULL,
  `kode_dokter` varchar(6) DEFAULT NULL,
  `kode_layanan` varchar(6) DEFAULT NULL,
  `kode_kamar` varchar(6) DEFAULT NULL,
  `kode_obat` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`no_record`, `tanggal_masuk`, `diagnosa`, `kode_pasien`, `alamat`, `tarif_kamar`, `tarif_layanan`, `kode_dokter`, `kode_layanan`, `kode_kamar`, `kode_obat`) VALUES
('R00001', '2021-12-29 12:04:00', 'Gigi Bungsu', 'P00001', 'Jl. Anggrek Biru', 100000, 200000, 'D00001', 'L00001', 'K00001', 'OB0001'),
('R00002', '2021-12-31 12:15:00', 'Penyakit Gigi', 'P00002', 'Jl. Anggrek', 750000, 300000, 'D00002', 'L00002', 'K00002', 'OB0001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`kode_dokter`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`kode_kamar`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`kode_layanan`),
  ADD KEY `idx_kode_dokter` (`kode_dokter`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`kode_pasien`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`no_record`),
  ADD KEY `kode_dokter` (`kode_dokter`),
  ADD KEY `kode_layanan` (`kode_layanan`),
  ADD KEY `kode_pasien` (`kode_pasien`),
  ADD KEY `kode_kamar` (`kode_kamar`),
  ADD KEY `kode_obat` (`kode_obat`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `layanan`
--
ALTER TABLE `layanan`
  ADD CONSTRAINT `idx_kode_dokter` FOREIGN KEY (`kode_dokter`) REFERENCES `dokter` (`kode_dokter`);

--
-- Constraints for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD CONSTRAINT `rekam_medis_ibfk_1` FOREIGN KEY (`kode_dokter`) REFERENCES `dokter` (`kode_dokter`),
  ADD CONSTRAINT `rekam_medis_ibfk_2` FOREIGN KEY (`kode_layanan`) REFERENCES `layanan` (`kode_layanan`),
  ADD CONSTRAINT `rekam_medis_ibfk_3` FOREIGN KEY (`kode_pasien`) REFERENCES `pasien` (`kode_pasien`),
  ADD CONSTRAINT `rekam_medis_ibfk_4` FOREIGN KEY (`kode_kamar`) REFERENCES `kamar` (`kode_kamar`),
  ADD CONSTRAINT `rekam_medis_ibfk_5` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
