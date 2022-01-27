-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2022 at 04:42 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `departement` varchar(120) NOT NULL,
  `section` varchar(120) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `password` varchar(120) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama`, `username`, `departement`, `section`, `no_telepon`, `password`, `role_id`) VALUES
(4, 'Joko Santoso', 'joko', 'Departement 1', 'ABC', '0653246512', '81dc9bdb52d04dc20036dbd8313ed055', 2),
(6, 'Andi', 'andi', 'Departement 1', 'BCD', '0217687634', '827ccb0eea8a706c4c34a16891f84e7b', 2),
(7, 'Rescy', 'admin', 'Departement 2', 'AMD', '065423624', '21232f297a57a5a743894a0e4a801fc3', 1),
(8, 'Bayu', 'bayu', 'Departement 2', 'AMD', '07612233', '81dc9bdb52d04dc20036dbd8313ed055', 2),
(13, 'Buyung', 'buyung', 'dfg', 'QWE', '08534XXXXX', '81dc9bdb52d04dc20036dbd8313ed055', 2),
(14, 'Komar', 'komar', 'ASD', 'QWE', '0865342XXXX', '81dc9bdb52d04dc20036dbd8313ed055', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `kode_tipe` varchar(120) NOT NULL,
  `merek` varchar(120) NOT NULL,
  `no_plat` varchar(20) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `vendor` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `ac` int(11) NOT NULL,
  `mp3_player` int(11) NOT NULL,
  `central_lock` int(11) NOT NULL,
  `tgl_commisioning` varchar(20) NOT NULL,
  `maintenance_weekly` varchar(20) NOT NULL,
  `maintenance_monthly` varchar(20) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `dokumen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `kode_tipe`, `merek`, `no_plat`, `warna`, `tahun`, `vendor`, `status`, `ac`, `mp3_player`, `central_lock`, `tgl_commisioning`, `maintenance_weekly`, `maintenance_monthly`, `gambar`, `dokumen`) VALUES
(23, 'SDN', 'Yaris', 'B 1234 RT', 'Hitam', '2016', 'AA', '1', 1, 1, 0, '', '', '', 'honda-city.jpg', 'poster_hemat_energi_(7).jpg'),
(24, 'MNV', 'Avanza', 'B 1224 KW', 'Hitam', '2018', 'AA', '1', 1, 0, 0, '', '', '', 'avanza-hitam.jpg', 'database.png'),
(25, 'SDN', 'Camry', 'B 1224 KK', 'Hitam', '2019', 'BB', '1', 1, 1, 0, '', '', '', 'toyota-camry.jpg', '1.jpg'),
(26, 'MNV', 'Avanza', 'B 1234 KK', 'Hitam', '2018', 'BB', '1', 1, 1, 1, '', '', '', 'avanza-hitam.jpg', '4.jpg'),
(27, 'SDN', 'Avanza', 'B 1224 YY', 'Hitam', '2019', 'KK', '1', 1, 1, 0, '23 April', 'asdfhash', 'fgfdshsf', 'avanza-hitam.jpg', '6.jpg'),
(28, 'MNV', 'Avanza', 'B 1234 WW', 'Hitam', '2018', 'BB', '1', 1, 1, 1, '', '', '', 'avanza-hitam.jpg', '5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tipe`
--

CREATE TABLE `tipe` (
  `id_tipe` int(11) NOT NULL,
  `kode_tipe` varchar(120) NOT NULL,
  `nama_tipe` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipe`
--

INSERT INTO `tipe` (`id_tipe`, `kode_tipe`, `nama_tipe`) VALUES
(1, 'SDN', 'Sedan'),
(3, 'MNV', 'Mini Van'),
(4, 'Tipe 1', 'Truk');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_rental` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `tgl_rental` date NOT NULL,
  `jam_rental` varchar(12) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `jam_kembali` varchar(12) NOT NULL,
  `dari` varchar(20) NOT NULL,
  `tujuan` varchar(20) NOT NULL,
  `status_rental` varchar(20) NOT NULL,
  `hm_awal` varchar(20) NOT NULL,
  `hm_terakhir` varchar(50) NOT NULL,
  `kondisi` varchar(50) NOT NULL,
  `komplain` varchar(50) NOT NULL,
  `status_pengembalian` varchar(20) NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `jam_pengembalian` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_rental`, `id_customer`, `id_mobil`, `tgl_rental`, `jam_rental`, `tgl_kembali`, `jam_kembali`, `dari`, `tujuan`, `status_rental`, `hm_awal`, `hm_terakhir`, `kondisi`, `komplain`, `status_pengembalian`, `tgl_pengembalian`, `jam_pengembalian`) VALUES
(12, 14, 25, '2022-01-18', '03 : 00 PM', '2022-01-20', '05 : 30 PM', 'AA', 'BB', 'ACC', '', '12121', 'Aman', 'Tidak ada', 'Kembali', '2022-01-21', '04 : 00 PM'),
(13, 14, 25, '2022-01-18', '03 : 00 PM', '2022-01-20', '02 : 00 PM', 'SSS', 'BB', 'ACC', '', '12121', 'Aman', 'Tidak ada', 'Kembali', '2022-01-21', '04 : 00 PM'),
(15, 13, 24, '2022-01-20', '05 : 00 AM', '2022-01-22', '05 : 00 PM', 'AA', 'BB', 'ACC', '120', '150', 'Aman', '-', 'Kembali', '2022-01-22', '06 : 00 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `tipe`
--
ALTER TABLE `tipe`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_rental`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tipe`
--
ALTER TABLE `tipe`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_rental` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
