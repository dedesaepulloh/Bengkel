-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2020 at 09:26 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bengkel`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jasa`
--

CREATE TABLE `tbl_jasa` (
  `id_jasa` int(11) NOT NULL,
  `nama_jasa` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jasa`
--

INSERT INTO `tbl_jasa` (`id_jasa`, `nama_jasa`, `harga`) VALUES
(1, 'Ganti Oli', 10000),
(2, 'DD', 44);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `type` varchar(15) NOT NULL,
  `no_polisi` varchar(30) NOT NULL,
  `no_rangka` varchar(30) NOT NULL,
  `no_mesin` varchar(30) NOT NULL,
  `kilometer` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `tanggal`, `nama_pelanggan`, `telepon`, `alamat`, `type`, `no_polisi`, `no_rangka`, `no_mesin`, `kilometer`) VALUES
(1, '2020-01-11', 'Dede Saepulloh', '085721037115', 'Sepulsa Teknologi Indonesia', 'Beat', 'Z 6684 PI', '467899ASF23', 'GFHK35678943', '3000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan_det`
--

CREATE TABLE `tbl_penjualan_det` (
  `id_penjualan` varchar(20) NOT NULL,
  `id_sparepart` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penjualan_det`
--

INSERT INTO `tbl_penjualan_det` (`id_penjualan`, `id_sparepart`, `harga`, `qty`, `harga_total`) VALUES
('TRX0000007', 1, 40000, 1, 40000),
('TRX0000008', 3, 30000, 1, 30000),
('TRX0000009', 1, 40000, 1, 40000),
('TRX0000010', 1, 40000, 1, 40000),
('TRX0000011', 1, 40000, 1, 40000),
('TRX0000012', 1, 40000, 1, 40000),
('TRX0000013', 1, 40000, 1, 40000),
('TRX0000014', 3, 30000, 1, 30000),
('TRX0000016', 1, 40000, 2, 80000),
('TRX0000017', 1, 40000, 1, 40000),
('TRX0000017', 3, 30000, 1, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan_head`
--

CREATE TABLE `tbl_penjualan_head` (
  `id_penjualan` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penjualan_head`
--

INSERT INTO `tbl_penjualan_head` (`id_penjualan`, `tanggal`, `bayar`, `kembali`) VALUES
('TRX0000001', '2020-01-21', 1, 1),
('TRX0000002', '2020-01-21', 1, 1),
('TRX0000003', '2020-01-21', 1, 1),
('TRX0000004', '2020-01-14', 3, 3),
('TRX0000005', '2020-01-21', 2, 2),
('TRX0000006', '2020-01-13', 2, 2),
('TRX0000007', '2020-01-14', 1, 1),
('TRX0000008', '2020-01-21', 2, 2),
('TRX0000009', '2020-01-21', 1, 1),
('TRX0000010', '2020-01-22', 50000, 10000),
('TRX0000011', '2020-01-23', 50000, 10000),
('TRX0000012', '2020-01-23', 50000, 10000),
('TRX0000013', '2020-01-23', 100000, 60000),
('TRX0000014', '2020-01-23', 50000, 20000),
('TRX0000015', '2020-01-16', 50000, 10000),
('TRX0000016', '2020-01-22', 10000, 0),
('TRX0000017', '2020-01-23', 100000, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_det`
--

CREATE TABLE `tbl_service_det` (
  `id_service` varchar(20) NOT NULL,
  `id_jasa` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_sparepart` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_service_det`
--

INSERT INTO `tbl_service_det` (`id_service`, `id_jasa`, `harga`, `id_sparepart`, `qty`, `harga_total`) VALUES
('SV0000004', 1, 0, '1', 1, 40000),
('SV0000005', 1, 0, '1', 1, 40000),
('SV0000005', 1, 0, '1', 1, 40000),
('SV0000006', 1, 0, '1', 1, 40000),
('SV0000007', 1, 0, '1', 2, 80000),
('SV0000008', 1, 0, '1', 1, 40000),
('SV0000008', 1, 0, '3', 1, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_head`
--

CREATE TABLE `tbl_service_head` (
  `id_service` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pelanggan` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_service_head`
--

INSERT INTO `tbl_service_head` (`id_service`, `tanggal`, `id_pelanggan`, `status`, `bayar`, `kembali`) VALUES
('SV0000001', '2020-01-02', '1', 'Sudah Dibayar', 0, 0),
('SV0000002', '2020-01-22', '1', 'Sudah Dibayar', 0, 0),
('SV0000003', '2020-01-16', '1', 'Sudah Dibayar', 0, 0),
('SV0000004', '2020-01-22', '1', 'Sudah Dibayar', 50000, 10000),
('SV0000005', '2020-01-22', '1', 'Sudah Dibayar', 100000, 20000),
('SV0000006', '2020-01-23', '1', 'Sudah Dibayar', 50000, 10000),
('SV0000007', '2020-01-23', '1', 'Sudah Dibayar', 100000, 20000),
('SV0000008', '2020-01-23', '1', 'Sudah Dibayar', 100000, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sparepart`
--

CREATE TABLE `tbl_sparepart` (
  `id_sparepart` int(11) NOT NULL,
  `nama_sparepart` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sparepart`
--

INSERT INTO `tbl_sparepart` (`id_sparepart`, `nama_sparepart`, `harga_beli`, `harga_jual`, `stok`) VALUES
(1, 'AHM Oil', 30000, 40000, 10),
(3, 'FEDERAL OIL', 25000, 30000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sparepart_masuk`
--

CREATE TABLE `tbl_sparepart_masuk` (
  `id_masuk` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `faktur` varchar(20) NOT NULL,
  `id_supplier` varchar(20) NOT NULL,
  `id_sparepart` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sparepart_masuk`
--

INSERT INTO `tbl_sparepart_masuk` (`id_masuk`, `tanggal`, `faktur`, `id_supplier`, `id_sparepart`, `jumlah`, `harga_beli`, `harga_total`) VALUES
(14, '2020-01-22', 'SM0000001', '1', '3', 2, 25000, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(30) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`id_supplier`, `nama_supplier`, `telepon`, `alamat`) VALUES
(1, 'PT Surya Abadi', '085323066956', 'Indihiang, Tasikmalaya'),
(5, 'PT Galunggung', '08123456789', 'Elabram System');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `password`, `level`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(4, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'Kasir'),
(5, 'admin', '202cb962ac59075b964b07152d234b70', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_jasa`
--
ALTER TABLE `tbl_jasa`
  ADD PRIMARY KEY (`id_jasa`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tbl_penjualan_head`
--
ALTER TABLE `tbl_penjualan_head`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `tbl_service_head`
--
ALTER TABLE `tbl_service_head`
  ADD PRIMARY KEY (`id_service`);

--
-- Indexes for table `tbl_sparepart`
--
ALTER TABLE `tbl_sparepart`
  ADD PRIMARY KEY (`id_sparepart`);

--
-- Indexes for table `tbl_sparepart_masuk`
--
ALTER TABLE `tbl_sparepart_masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_jasa`
--
ALTER TABLE `tbl_jasa`
  MODIFY `id_jasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sparepart`
--
ALTER TABLE `tbl_sparepart`
  MODIFY `id_sparepart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_sparepart_masuk`
--
ALTER TABLE `tbl_sparepart_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
