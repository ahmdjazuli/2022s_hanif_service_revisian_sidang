-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2022 at 03:22 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2022s_hanif_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataservice`
--

CREATE TABLE `dataservice` (
  `notransaksi` varchar(10) NOT NULL,
  `tgl` date NOT NULL,
  `barang` varchar(100) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `namap` varchar(100) NOT NULL,
  `alamatp` text NOT NULL,
  `telpp` varchar(15) NOT NULL,
  `kerusakan` varchar(50) NOT NULL,
  `kondisibrg` varchar(100) NOT NULL,
  `garansi` date NOT NULL,
  `kerusakanbaru` varchar(100) NOT NULL,
  `metode` varchar(50) NOT NULL,
  `urut` int(5) NOT NULL,
  `bertugas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataservice`
--

INSERT INTO `dataservice` (`notransaksi`, `tgl`, `barang`, `merk`, `jenis`, `namap`, `alamatp`, `telpp`, `kerusakan`, `kondisibrg`, `garansi`, `kerusakanbaru`, `metode`, `urut`, `bertugas`) VALUES
('2022083005', '2022-08-30', 'PC Ryzen 3 2200g', 'AMD', 'PC', 'Coki Anwar', 'Banjarbaru', '628124731483', 'Matol', 'Baik', '2022-09-07', '', 'Langsung', 3, 'Yudi'),
('2022083020', '2022-08-30', 'Fan Komputer', 'Gigabyte', 'PC', 'Hariyanto', '-', '6282172614255', 'ga mutar', 'Baik', '2022-08-31', '', 'Langsung', 1, 'Yudi'),
('2022083044', '2022-08-30', 'Monitor', 'LG', 'PC', 'Mustika Ratu', 'BJM', '6289172314213', 'Blank', 'Baik', '2022-09-01', '', 'Langsung', 2, 'Yudi');

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `idgaji` int(5) NOT NULL,
  `id` int(5) NOT NULL,
  `idjabatan` int(5) NOT NULL,
  `tgl` date NOT NULL,
  `gajinya` float NOT NULL,
  `tunjangan` float NOT NULL,
  `total` float NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`idgaji`, `id`, `idjabatan`, `tgl`, `gajinya`, `tunjangan`, `total`, `ket`) VALUES
(4, 6, 2, '2022-07-02', 1600000, 0, 1600000, 'Masuk Full.'),
(5, 8, 3, '2022-06-01', 3000000, 100000, 3100000, 'Berhalangan Hadir 1hari.');

-- --------------------------------------------------------

--
-- Table structure for table `inventori`
--

CREATE TABLE `inventori` (
  `idinventori` int(2) NOT NULL,
  `namainven` varchar(50) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `bahan` varchar(50) NOT NULL,
  `stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventori`
--

INSERT INTO `inventori` (`idinventori`, `namainven`, `merk`, `jenis`, `bahan`, `stok`) VALUES
(5, 'Obeng Magnetic All in One', 'Handy', 'Obeng', 'Stainless Steel + Plastik', 1),
(6, 'Bardi Smart IP Camera CCTV 360 INDOOR', 'Bardi', 'CCTV', 'Besi', 4),
(7, 'Tang Rivet', 'Tekiro', 'Tang', 'Aluminium', 3),
(8, 'Lemari Kaca Susun Serbaguna 50x40x160 (P x L x T)', 'MOU', 'Etalase', 'Aluminium', 2),
(9, 'Etalase Kaca 1.5 Meter', 'Rajeg', 'Etalase', 'Aluminium', 2),
(10, 'LCD LED 19EN33', 'LG', 'Monitor', 'Stainless Steel + Plastik', 2);

-- --------------------------------------------------------

--
-- Table structure for table `inventorikeluar`
--

CREATE TABLE `inventorikeluar` (
  `idinventorikeluar` int(5) NOT NULL,
  `idinventori` int(2) NOT NULL,
  `id` int(11) NOT NULL,
  `tglkeluar` date NOT NULL,
  `catatan` text NOT NULL,
  `jumlah` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventorikeluar`
--

INSERT INTO `inventorikeluar` (`idinventorikeluar`, `idinventori`, `id`, `tglkeluar`, `catatan`, `jumlah`) VALUES
(1, 10, 8, '2022-07-20', 'ha', 1);

--
-- Triggers `inventorikeluar`
--
DELIMITER $$
CREATE TRIGGER `gaKeluar` AFTER DELETE ON `inventorikeluar` FOR EACH ROW BEGIN 
	UPDATE inventori SET stok = stok + OLD.jumlah
    WHERE idinventori = OLD.idinventori;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `jadiKeluar` AFTER INSERT ON `inventorikeluar` FOR EACH ROW BEGIN 
	UPDATE inventori SET stok = stok - NEW.jumlah
    WHERE idinventori = NEW.idinventori;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ubahKeluar` AFTER UPDATE ON `inventorikeluar` FOR EACH ROW BEGIN
	UPDATE inventori SET stok = stok + OLD.jumlah, 
                     stok = stok - NEW.jumlah 
    WHERE idinventori = NEW.idinventori;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `inventorimasuk`
--

CREATE TABLE `inventorimasuk` (
  `idinventorimasuk` int(5) NOT NULL,
  `idinventori` int(2) NOT NULL,
  `tgl` date NOT NULL,
  `ket` text NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventorimasuk`
--

INSERT INTO `inventorimasuk` (`idinventorimasuk`, `idinventori`, `tgl`, `ket`, `jumlah`, `harga`, `total`) VALUES
(1, 6, '2022-07-02', '-', 4, 325000, 1300000),
(2, 9, '2022-07-02', '-', 3, 600000, 1800000),
(3, 8, '2022-07-04', '-', 2, 300000, 600000),
(4, 7, '2022-07-01', '-', 3, 15000, 45000),
(5, 5, '2022-07-03', '-', 2, 18000, 36000),
(7, 6, '2022-07-18', '-', 3, 200000, 600000),
(8, 10, '2022-07-20', '-', 2, 450000, 900000);

--
-- Triggers `inventorimasuk`
--
DELIMITER $$
CREATE TRIGGER `deleteMasuk` AFTER DELETE ON `inventorimasuk` FOR EACH ROW BEGIN 
	UPDATE inventori SET stok = stok - OLD.jumlah
    WHERE idinventori = OLD.idinventori;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `masukMasuk` AFTER INSERT ON `inventorimasuk` FOR EACH ROW BEGIN
	UPDATE inventori SET stok = stok + NEW.jumlah
    WHERE idinventori = NEW.idinventori;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ubahMasuk` AFTER UPDATE ON `inventorimasuk` FOR EACH ROW BEGIN
	UPDATE inventori SET stok = stok - OLD.jumlah, 
                     stok = stok + NEW.jumlah 
    WHERE idinventori = NEW.idinventori;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `inventorirusak`
--

CREATE TABLE `inventorirusak` (
  `idinventorirusak` int(5) NOT NULL,
  `idinventori` int(2) NOT NULL,
  `id` int(11) NOT NULL,
  `tglrusak` date NOT NULL,
  `ket` text NOT NULL,
  `jumlah` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventorirusak`
--

INSERT INTO `inventorirusak` (`idinventorirusak`, `idinventori`, `id`, `tglrusak`, `ket`, `jumlah`) VALUES
(1, 6, 8, '2022-07-02', 'Kamera tidak berfungsi', 1),
(2, 9, 8, '2022-07-01', 'Kaca Pecah', 1),
(3, 6, 8, '2022-07-18', 'kamera tidak berfungsi', 2),
(4, 5, 8, '2022-07-18', '-', 1);

--
-- Triggers `inventorirusak`
--
DELIMITER $$
CREATE TRIGGER `gaRusak` AFTER DELETE ON `inventorirusak` FOR EACH ROW BEGIN 
	UPDATE inventori SET stok = stok + OLD.jumlah
    WHERE idinventori = OLD.idinventori;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `jadiRusak` AFTER INSERT ON `inventorirusak` FOR EACH ROW BEGIN 
	UPDATE inventori SET stok = stok - NEW.jumlah
    WHERE idinventori = NEW.idinventori;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ubahRusak` AFTER UPDATE ON `inventorirusak` FOR EACH ROW BEGIN
	UPDATE inventori SET stok = stok + OLD.jumlah, 
                     stok = stok - NEW.jumlah 
    WHERE idinventori = NEW.idinventori;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `idjabatan` int(5) NOT NULL,
  `jabatannya` varchar(100) NOT NULL,
  `gaji` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`idjabatan`, `jabatannya`, `gaji`) VALUES
(1, 'Teknisi Pemula', 1500000),
(2, 'Admin Pemula', 1600000),
(3, 'Teknisi Berpengalaman', 3000000),
(4, 'Admin Berpengalaman', 2900000);

-- --------------------------------------------------------

--
-- Table structure for table `proses`
--

CREATE TABLE `proses` (
  `idproses` int(5) NOT NULL,
  `notransaksi` varchar(10) NOT NULL,
  `id` int(5) NOT NULL,
  `waktu` datetime NOT NULL,
  `ket` varchar(100) NOT NULL,
  `biaya` float NOT NULL,
  `jenis` enum('Sparepart','Service') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proses`
--

INSERT INTO `proses` (`idproses`, `notransaksi`, `id`, `waktu`, `ket`, `biaya`, `jenis`) VALUES
(43, '2022083020', 8, '2022-08-30 11:21:00', 'Cek Kelengkapan (Kabel)', 5000, 'Service'),
(44, '2022083020', 8, '2022-08-30 12:21:00', 'Cek Kelistrikan', 15000, 'Service'),
(45, '2022083020', 8, '2022-08-30 14:22:00', 'Biaya Service dan Perbaikan', 25000, 'Service'),
(47, '2022083044', 8, '2022-08-31 11:22:00', 'Cek Kabel', 100000, 'Service'),
(48, '2022083044', 8, '2022-08-31 14:23:00', 'Selesai', 0, 'Service'),
(49, '2022083005', 8, '2022-08-30 12:07:00', 'Cek Kabel dan Kelistrikan', 25000, 'Service'),
(50, '2022083005', 8, '2022-08-30 16:07:00', 'Mobo Baru', 750000, 'Sparepart'),
(51, '2022083005', 8, '2022-08-31 17:08:00', 'RAM Baru', 570000, 'Sparepart'),
(52, '2022083020', 8, '2022-08-30 17:10:00', 'Selesai', 0, 'Service');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `jk` enum('Laki-Laki','Wanita') NOT NULL,
  `ttl` varchar(80) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `tugas` varchar(100) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `jk`, `ttl`, `telp`, `alamat`, `tugas`, `level`) VALUES
(1, 'Admin', 'admin', 'admin', '', '', '', '', '', 'Admin'),
(3, 'Mustika Ratu', 'ratu', 'ratu', 'Wanita', 'BJM, 31 April 1995', '6289172314213', 'BJM', '', 'Pelanggan'),
(4, 'Nida', 'nida', 'nida', 'Wanita', 'betulbanar, 15 Mei 1999', '089666714255', 'hantu mariaban', 'CS', 'Karyawan'),
(5, 'Hariyanto', 'hariyanto', 'hariyanto', 'Laki-Laki', 'Bengkulu, 19 Desember 1998', '6282172614255', '-', '', 'Pelanggan'),
(6, 'Ace', 'ace', 'ace', 'Wanita', 'Seoul, 19 Januari 1992', '08888314764', '-', 'CS', 'Karyawan'),
(8, 'Yudi', 'yudi', 'yudi', 'Laki-Laki', 'Banjarbaru, 12 Agustus 2000', '089896716733', 'Banjarbaru', 'Service', 'Karyawan'),
(9, 'Coki Anwar', 'coki', 'coki', 'Laki-Laki', 'Banjarbaru, 19 Desember 1985', '628124731483', 'Banjarbaru', '', 'Pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataservice`
--
ALTER TABLE `dataservice`
  ADD PRIMARY KEY (`notransaksi`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`idgaji`),
  ADD KEY `id` (`id`),
  ADD KEY `idjabatan` (`idjabatan`);

--
-- Indexes for table `inventori`
--
ALTER TABLE `inventori`
  ADD PRIMARY KEY (`idinventori`);

--
-- Indexes for table `inventorikeluar`
--
ALTER TABLE `inventorikeluar`
  ADD PRIMARY KEY (`idinventorikeluar`),
  ADD KEY `idinventori` (`idinventori`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `inventorimasuk`
--
ALTER TABLE `inventorimasuk`
  ADD PRIMARY KEY (`idinventorimasuk`),
  ADD KEY `idinventori` (`idinventori`);

--
-- Indexes for table `inventorirusak`
--
ALTER TABLE `inventorirusak`
  ADD PRIMARY KEY (`idinventorirusak`),
  ADD KEY `idinventori` (`idinventori`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`idjabatan`);

--
-- Indexes for table `proses`
--
ALTER TABLE `proses`
  ADD PRIMARY KEY (`idproses`),
  ADD KEY `notransaksi` (`notransaksi`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `idgaji` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventori`
--
ALTER TABLE `inventori`
  MODIFY `idinventori` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `inventorikeluar`
--
ALTER TABLE `inventorikeluar`
  MODIFY `idinventorikeluar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventorimasuk`
--
ALTER TABLE `inventorimasuk`
  MODIFY `idinventorimasuk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `inventorirusak`
--
ALTER TABLE `inventorirusak`
  MODIFY `idinventorirusak` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `idjabatan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `proses`
--
ALTER TABLE `proses`
  MODIFY `idproses` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gaji`
--
ALTER TABLE `gaji`
  ADD CONSTRAINT `gaji_ibfk_1` FOREIGN KEY (`idjabatan`) REFERENCES `jabatan` (`idjabatan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gaji_ibfk_2` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Constraints for table `inventorimasuk`
--
ALTER TABLE `inventorimasuk`
  ADD CONSTRAINT `inventorimasuk_ibfk_1` FOREIGN KEY (`idinventori`) REFERENCES `inventori` (`idinventori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventorirusak`
--
ALTER TABLE `inventorirusak`
  ADD CONSTRAINT `inventorirusak_ibfk_1` FOREIGN KEY (`idinventori`) REFERENCES `inventori` (`idinventori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proses`
--
ALTER TABLE `proses`
  ADD CONSTRAINT `proses_ibfk_1` FOREIGN KEY (`notransaksi`) REFERENCES `dataservice` (`notransaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proses_ibfk_2` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
