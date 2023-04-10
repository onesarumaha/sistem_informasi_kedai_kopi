-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2023 at 06:41 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi8`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bb` int(11) NOT NULL,
  `nama_bahan_baku` varchar(50) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bb`, `nama_bahan_baku`, `jumlah`, `id_satuan`, `ket`) VALUES
(2, 'hvghgj', 1, 5, 'khgjh'),
(3, 'gvfghfh', 2, 4, 'jjhghg'),
(5, 'hjvhgh', 2, 4, 'klkjghhjjk');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_menu`
--

CREATE TABLE `daftar_menu` (
  `id_menu` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `kode_menu` varchar(30) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `harga` int(30) NOT NULL,
  `diskon` int(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_menu`
--

INSERT INTO `daftar_menu` (`id_menu`, `id_kategori`, `id_satuan`, `kode_menu`, `nama_menu`, `harga`, `diskon`, `deskripsi`, `gambar`) VALUES
(1, 1, 4, 'AIA9100423', 'nama produk', 12345, 2, 'deksipsi', 'crew.jpg'),
(2, 5, 5, 'AIA9300423', 'hvhgfghf', 399, 787, 'jhgjgh', 'bacround2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'jjgk'),
(5, 'sasasa');

-- --------------------------------------------------------

--
-- Table structure for table `order_menu`
--

CREATE TABLE `order_menu` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_order` varchar(30) NOT NULL,
  `tgl_order` datetime NOT NULL,
  `status` enum('Lunas','Belum Lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_menu`
--

INSERT INTO `order_menu` (`id_order`, `id_user`, `kode_order`, `tgl_order`, `status`) VALUES
(1, 3, 'KOP83204', '2023-04-10 20:32:06', 'Belum Lunas'),
(2, 3, 'KOP73204', '2023-04-10 20:32:12', 'Belum Lunas'),
(3, 3, 'KOP93504', '2023-04-10 20:35:47', 'Belum Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `kode` varchar(30) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `qty` int(6) NOT NULL,
  `desk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `kode`, `id_order`, `id_menu`, `qty`, `desk`) VALUES
(1, '', 1, 1, 3, ''),
(2, '', 2, 2, 3, ''),
(3, 'KOP93504', 3, 1, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(4, 'Pack'),
(5, 'Lusin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` int(20) NOT NULL,
  `alamat` text NOT NULL,
  `level` enum('Kasir','Pelanggan','Pemilik') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_lengkap`, `username`, `password`, `email`, `no_hp`, `alamat`, `level`) VALUES
(1, 'Friska Yuli Suchendar', 'Kasir', '$2y$10$.KRUJvGtvsPBPNwrarWra.yfoXxjME6a3KdpziEBhkzquO5zwBfJG', '', 0, '', 'Kasir'),
(2, 'Dodi Sarumaha', 'pemilik', '$2y$10$ZxdsOT/oaTcpZslXr47tK.hP6e70gRG5ETbf9CVzJ3T25VUGlaHeq', '', 0, '', 'Pemilik'),
(3, 'Indara Saputri', 'pelanggan', '$2y$10$Wpy/Y0xsB0.T5FSybGkucOWMiHxKqt5YVlpNaRaUIa3uqtCrM8.GK', '', 0, '', 'Pelanggan'),
(4, 'Muni Sari', 'muni', '$2y$10$eOaXFSAHlLqmvqIbzoaWhejGy2TLkJf5PDUcORenLXOkYSTOxZqNa', '', 0, '', 'Pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bb`),
  ADD KEY `id_satuan` (`id_satuan`);

--
-- Indexes for table `daftar_menu`
--
ALTER TABLE `daftar_menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_satuan` (`id_satuan`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `order_menu`
--
ALTER TABLE `order_menu`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_produk` (`id_menu`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  MODIFY `id_bb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `daftar_menu`
--
ALTER TABLE `daftar_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_menu`
--
ALTER TABLE `order_menu`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD CONSTRAINT `bahan_baku_ibfk_1` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`);

--
-- Constraints for table `daftar_menu`
--
ALTER TABLE `daftar_menu`
  ADD CONSTRAINT `daftar_menu_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `daftar_menu_ibfk_2` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`);

--
-- Constraints for table `order_menu`
--
ALTER TABLE `order_menu`
  ADD CONSTRAINT `order_menu_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order_menu` (`id_order`),
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `daftar_menu` (`id_menu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
