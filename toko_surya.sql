-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2023 at 06:03 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_surya`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kg` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kg`) VALUES
(5, 'TV'),
(6, 'Realme'),
(7, 'Laptop Lenovo');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `id_pd` int(11) NOT NULL,
  `nama_psn` varchar(125) NOT NULL,
  `alamat` varchar(125) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(125) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_hrg` varchar(125) NOT NULL,
  `cpo` text NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_pd`, `nama_psn`, `alamat`, `no_hp`, `email`, `jumlah`, `total_hrg`, `cpo`, `tgl`) VALUES
(7, 4, 'Surya', 'Depok', '220802', 'gardadepan.me@gmail.com', 2, '4446242', 'tes', '2023-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_pd` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode` varchar(11) NOT NULL,
  `nama` varchar(125) NOT NULL,
  `harga_jual` double NOT NULL,
  `harga_beli` double NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `min_stok` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_pd`, `id_kategori`, `kode`, `nama`, `harga_jual`, `harga_beli`, `stok`, `min_stok`, `deskripsi`, `gambar`) VALUES
(8, 6, '103ba37f', 'Realme GT NEO 3T', 5499000, 5000000, 30, 0, 'Dimensions:	162.9 x 75.8 x 8.7 mm (6.41 x 2.98 x 0.34 in)\r\nWeight:	194.5 g (6.88 oz)\r\nBuild:	Glass front (Gorilla Glass 5), plastic back, plastic frame\r\nSIM:	Dual SIM (Nano-SIM, dual stand-by)\r\nType:	AMOLED, 120Hz, HDR10+, 1300 nits (peak)\r\nSize	6.62 inches, 105.8 cm2 (~85.7% screen-to-body ratio)\r\nResolution:	1080 x 2400 pixels, 20:9 ratio (~398 ppi density)\r\nProtection:	Corning Gorilla Glass 5\r\nCard slot	No\r\nInternal:	128GB 6GB RAM, 128GB 8GB RAM, 256GB 8GB RAM\r\n 	UFS 3.1', '1653967430847.png'),
(9, 6, 'deb886fc', 'Realme Narzo 50A Prime', 1749000, 1000000, 20, 0, 'Dimensions	164.4 x 75.6 x 8.1 mm (6.47 x 2.98 x 0.32 in)\r\nWeight	189 g (6.67 oz)\r\nBuild	Glass front, plastic frame, plastic back\r\nSIM	Dual SIM (Nano-SIM, dual stand-by)\r\nType	IPS LCD, 600 nits (peak)\r\nSize	6.6 inches, 104.9 cm2 (~84.4% screen-to-body ratio)\r\nResolution	1080 x 2408 pixels, 20:9 ratio (~400 ppi density)\r\nCard slot	microSDXC (dedicated slot)\r\nInternal	64GB 4GB RAM, 128GB 4GB RAM\r\nSELFIE CAMERA	Single	8 MP, f/2.0\r\nMAIN CAMERA	Triple	50 MP, f/1.8, 26mm (wide), 1/2.76\", 0.64µm, PDAF\r\n2 MP, f/2.4, (macro)\r\n\r\nBATTERY	Type	Li-Po 5000 mAh, non-removable\r\nCharging	18W wired', 'narzo-50-prem.jpg'),
(10, 7, '27d5ff4e', 'Lenovo IdeaPad D330', 2800000, 2000000, 40, 0, 'TAMPILAN\r\nLayar	10.1\"\r\nResolusi Layar	1920 x 1200pixels\r\nTeknologi Layar	IPS\r\nPLATFORM\r\nProsesor	Intel Celeron N4000, Intel Celeron N4020\r\nBrand Prosesor	Intel\r\nProsesor Inti	Dual Core\r\nKecepatan Prosesor	1.1GHz\r\nSistem Operasi	Windows 10\r\nPENYIMPANAN\r\nPenyimpanan	128 - 256GB\r\nTipe Penyimpanan	eMMC\r\nMEMORI\r\nRAM	4 - 8GB\r\nTipe RAM	DDR4L\r\nGRAFIS\r\nGraphic Card	Intel® Integrated graphics\r\nBATERAI\r\nDaya Tahan Baterai	13h\r\nKAMERA\r\nResolusi Webcam	HD\r\nKONEKSI\r\nWi-Fi Standard	802.11ac\r\nFITUR\r\nLayar Sentuh	Ya\r\nFingerprint Reader	Tidak\r\nBacklit Keyboard	Tidak\r\nWARNA\r\nWarna	Abu-abu', 'Lenovo IdeaPad D330.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_pd`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_pd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
