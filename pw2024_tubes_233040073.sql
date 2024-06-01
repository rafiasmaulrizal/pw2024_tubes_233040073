-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2024 at 11:18 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw2024_tubes_233040073`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `lokasi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `deskripsi`, `lokasi`, `gambar`) VALUES
(1, 'Camping Lakaside', 'Green Corner menyediakan 2 area Camping Ground yaitu Green Corner Camp &amp; GC Land', 'Green Corner Camp &amp; GC Land', '664945ec33b9d.png'),
(2, 'Cabin &amp; Cottage', 'Terdapat 2 jenis Cabin di Green Corner : Cabin GC (2 Unit) &amp; Treecabin (3 Unit). Cottage terdapat 2 unit', 'Green Corner ', '66494644057e1.png'),
(3, 'Outbound', 'Agar menambah keseruan selama di Green Corner, Anda bisa menikmati Outbound : Rafting, ATV, Paintball, Flyingfox, Fun Offroad, Fun Games &amp; Team Building', 'Green Corner', '6649472cbd34f.png');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int NOT NULL,
  `kategori_id` int DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `harga` decimal(10,0) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `nama`, `harga`, `gambar`, `deskripsi`) VALUES
(1, 2, 'CABIN GC - Terdapat 2 Unit Cabin', '1200000', '6652a369439a5.png', 'Luas &amp; Nyaman Pemandangan view Danau Toilet didalam (Waterheater) Kapasitas 7 Orang Gazebo dan Dermaga Private Akses Mudah dijangkau'),
(2, 2, 'TREECABIN - Terdapat 3 unit', '600', '6652a49e6767c.png', 'Luas &amp; Nyaman Pemandangan view Danau Toilet didalam (Waterheater) Kapasitas 4 Orang Halaman Luas Akses Mudah dijangkau'),
(3, 2, 'COTTAGE - Terdapat 2 unit', '450', '66518d39cc36a.png', 'Luas &amp; Nyaman Pemandangan view Danau Toilet didalam (Waterheater) Kapasitas 5 Orang Halaman Luas Akses Mudah dijangkau'),
(4, 1, 'Camp Arpenaz GC A', '450', '6652a87c65e09.png', 'Tenda Quechua ArpenazSelimut, Bantal, KasurLampu TendaColokan ListrikTiket Camping'),
(5, 1, 'Camp Arpenaz GC B', '510', '6652a89698720.png', 'Tenda Quechua Arpenaz Selimut, Bantal, Kasur Lampu Tenda Colokan Listrik Sarapan Tiket Camping'),
(6, 1, 'Camp Arpenaz GC C', '750', '6652a8a5a1c4b.png', 'Tenda Quechua Arpenaz Selimut, Bantal, Kasur Lampu Tenda Colokan Listrik Makan 3 kali Api Unggun Tiket Camping'),
(7, 1, 'Camp Dome A3', '350', '6652a9db4a54d.png', 'Tenda Dome Borneo Selimut, Bantal, Kasur Lampu Tenda Colokan Listrik Tiket Camping'),
(9, 1, 'Camp Dome B3', '420', '6652aa3bb249f.png', 'Tenda Dome Borneo Selimut, Bantal, Kasur Lampu Tenda Colokan Listrik Sarapan Tiket Camping'),
(11, 1, 'Camp Dome C3', '600', '6652aa6915e50.png', 'Tenda Dome Borneo Selimut, Bantal, Kasur Lampu Tenda Colokan Listrik Makan 3 kali Api Unggun Tiket Camping'),
(12, 1, 'Camp Dome A2', '300', '6652aa9dbec01.png', 'Tenda Dome Borneo Selimut, Bantal, Kasur Lampu Tenda Colokan Listrik Tiket Camping'),
(14, 1, 'Camp Dome B2', '350', '6652aac6db27d.png', 'Tenda Dome Borneo Selimut, Bantal, Kasur Lampu Tenda Colokan Listrik Sarapan Tiket Camping'),
(15, 1, 'Camp Dome C2', '425', '6652ab0c6ce42.png', 'Tenda Dome Borneo Selimut, Bantal, Kasur Lampu Tenda Colokan Listrik Makan 3 kali Api Unggun Tiket Camping'),
(17, 3, 'Rafting', '150', '6652ac2eb2ed6.png', 'Minimal 5 orang Rafting jarak 4.8 km Perlengkapan Rafting Tour Leader &amp; Rescue Jemputan Rafting PP Perahu Kayu'),
(20, 3, 'FlyingFox', '30', '6652ac73938e8.png', 'Minimal 5 orang\r\nPanjang Track 300 m\r\nPerlengkapan FlyingFox\r\nInstruktuk\r\nTim Support\r\nPP Perahu Kayu'),
(21, 3, 'Paintball', '85', '6652ac988ddfb.png', 'Minimal 10 orang\r\nPerlengkapan Paintball (seragam, body protector, google mask, peluru)\r\nInstruktuk\r\nTim Support\r\nPP Perahu Kayu'),
(22, 3, 'Fun Offroad', '1750', '6652acc3cc37d.png', 'Minimal 7 Orang\r\nTiket Masuk\r\nMobil Land Rover\r\nDriver &amp; Guide\r\nTim Support\r\nAir Mineral'),
(23, 3, 'ATV Paket 1', '175', '6652ace7adcf8.png', 'Minimal 5 orang\r\nPerlengkapan (helm)\r\nGuide\r\nDokumentasi std\r\nTiket masuk\r\nPP Perahu Kayu'),
(24, 3, 'Fun Games', '50', '6652ad1c7c1dd.png', 'Minimal 15 orang\r\nLapangan &amp; Fasilitator\r\nTeam Support\r\nSound System\r\nDokumentasi std'),
(25, 3, 'Team Buillding', '80', '6652ad3ecb86c.png', 'Minimal 15 orang\r\nLapangan &amp; Fasilitator\r\nMedia Team Buillding Games\r\nTeam Support\r\nSound System\r\nDokumentasi std');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(5, 'rafi', 'rafi.233040073@mail.unpas.ac.id', '$2y$10$uA3nXsWfr/5YPnZbgHTVGO8xGojXKHYXfjzxuFo3/bK2HQnMGStQm', 'user'),
(6, 'adminrafi', 'rafiarizal@gmail.com', '$2y$10$m2h2bzr5NH2iRfx2QD7YP.NJ4rQLRia9i84hzvYsVekl3Yz2zkzFG', 'admin'),
(7, 'user', 'user@gmail.com', '$2y$10$Eg9y3shA1lwUh01kRo/Ju.yS3s5b28b.SB.i3qNMv4N6KcP3PiG4m', 'user'),
(8, 'user1', 'user1@gmail.com', '$2y$10$jfLDAlYGAd8Jgo.XnKqndemGZOsnSAFx2Zj.PxiIfoqe0crzPx28C', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`),
  ADD KEY `kategori_produk` (`kategori_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori_produk` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
