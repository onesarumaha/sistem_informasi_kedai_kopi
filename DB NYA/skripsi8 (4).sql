-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 04:32 PM
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
(1, 5, 6, 'AIA6100623', 'Kopi Kenangan', 25000, 0, 'Kopi Kenangan merupakan salah satu brand kopi Tanah Air yang populer di kalangan masyarakat . Bahkan gelar unicorn berhasil disabet dalam waktu kurang dari lima tahun. Seperti namanya, Kopi Kenangan adalah perusahaan yang bergerak di bidang kopi minuman yang turut meramaikan pasar kopi kekinian di Indonesia.', 'images.jpg'),
(2, 5, 6, 'AIA5160623', 'Es Kopi Thailand', 25000, 0, 'Resep kopi kekinian pertama yang bisa Anda coba di rumah adalah es kopi Thailand. Cocok untuk teman kerja di rumah atau di kantor.', 'a.jpg'),
(3, 5, 6, 'AIA4170623', 'Spice Cappuccino', 15000, 0, 'Saat cuaca dingin dan mata mengantuk, secangkir cappuccino hangat pasti bisa menyegarkan tubuh kembali. Padukan dengan rempah-rempah agar tubuh tetap hangat.', 'b.jpg'),
(4, 5, 6, 'AIA6190623', 'Mocha Frappuccino', 20000, 0, 'Kalau Anda biasa ngopi di Starbucks dan kedai kopi lainnya, mocha frappuccino mungkin termasuk salah satu minuman yang biasa Anda pesan. Mocha frappuccino adalah ice blend yang memadukan kopi, susu, dan cokelat, kemudian disajikan bersama topping whipped cream.', 'c.jpg'),
(5, 5, 6, 'AIA9200623', 'Es Kopi Melaka', 10000, 0, 'Saat cuaca dingin dan mata mengantuk, secangkir cappuccino hangat pasti bisa menyegarkan tubuh kembali. Padukan dengan rempah-rempah agar tubuh tetap hangat.', 'd.jpg'),
(6, 1, 7, 'AIA7250623', 'Onion Ring', 35000, 0, ' Onion ring adalah sebuah makanan yang terbuat dari bawang bombay yang digoreng. Sedangkan untuk penyajiannya biasanya akan disantap dengan mayonaise.', 'e.jpg'),
(7, 1, 7, 'AIA8260623', 'Roti Bakar', 15000, 0, 'Roti juga memiliki kandungan yang baik untuk tubuh. Roti bakar di cafe biasanya akan menggunakan topping yang melimpah supaya roti yang disajikan bisa semakin lezat.', 'r.jpg');

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
(1, 'Makanan'),
(5, 'Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id_keuangan` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jenis_transaksi` enum('Pendapatan','Pengeluaran') NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `ket` text NOT NULL,
  `jumlah` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_menu`
--

CREATE TABLE `order_menu` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_order` varchar(30) NOT NULL,
  `tgl_order` datetime NOT NULL,
  `status` enum('Lunas','Belum Lunas','Tunai') NOT NULL,
  `no_meja` int(10) NOT NULL,
  `status_order` enum('Menunggu','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `jumlah` int(30) NOT NULL,
  `upload_bayar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(5, 'Lusin'),
(6, 'Cup'),
(7, 'Porsi');

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
(4, 'Muni Sari', 'muni', '$2y$10$eOaXFSAHlLqmvqIbzoaWhejGy2TLkJf5PDUcORenLXOkYSTOxZqNa', '', 0, '', 'Pelanggan'),
(5, 'Indari', 'ine', '$2y$10$/ArAmHp9WaUFHAkFs.Y4IOycG6Y6L8fln1w/k7xU76.7.cZ/7R6vO', '', 0, '', 'Pelanggan'),
(6, 'Indah Sari', 'sari', '$2y$10$bY.eQiI9RfdVzHVyTzdmUuMtjy0I.S1MlRqx8AdeAehGpEkBr4PMu', '', 0, '', 'Pelanggan');

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
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id_keuangan`);

--
-- Indexes for table `order_menu`
--
ALTER TABLE `order_menu`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_order` (`id_order`);

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
  MODIFY `id_bb` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daftar_menu`
--
ALTER TABLE `daftar_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_menu`
--
ALTER TABLE `order_menu`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order_menu` (`id_order`);

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
