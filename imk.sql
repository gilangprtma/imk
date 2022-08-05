-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2022 at 10:17 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imk`
--

-- --------------------------------------------------------

--
-- Table structure for table `checklist`
--

CREATE TABLE `checklist` (
  `checklist_id` int(11) NOT NULL,
  `checklist_mobiltanki_id` int(11) DEFAULT 0,
  `checklist_created_datetime` datetime DEFAULT current_timestamp(),
  `checklist_updated_datetime` datetime DEFAULT NULL,
  `checklist_is_close` tinyint(4) DEFAULT 0 COMMENT '0 = open, 1 = closed, 2 = blokir',
  `checklist_close_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checklist`
--

INSERT INTO `checklist` (`checklist_id`, `checklist_mobiltanki_id`, `checklist_created_datetime`, `checklist_updated_datetime`, `checklist_is_close`, `checklist_close_datetime`) VALUES
(1, 5, '2022-07-21 08:04:27', NULL, 1, '2022-07-21 08:35:37'),
(2, 5, '2022-07-22 08:28:00', NULL, 1, '2022-07-25 09:14:05'),
(3, 5, '2022-07-26 15:01:04', NULL, 1, '2022-07-26 15:29:25'),
(4, 8, '2022-07-27 07:36:03', NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `checklist_detail`
--

CREATE TABLE `checklist_detail` (
  `checklist_detail_id` int(11) NOT NULL,
  `checklist_detail_checklist_id` int(11) DEFAULT 0,
  `checklist_detail_temuan` varchar(255) DEFAULT NULL,
  `checklist_detail_kategori` varchar(50) DEFAULT NULL,
  `checklist_detail_batas_temuan_hari` date DEFAULT NULL,
  `checklist_detail_input_datetime` datetime DEFAULT current_timestamp(),
  `checklist_detail_is_close` tinyint(4) DEFAULT 0 COMMENT '0 = open, 1 = close, 2 = blokir',
  `checklist_detail_close_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checklist_detail`
--

INSERT INTO `checklist_detail` (`checklist_detail_id`, `checklist_detail_checklist_id`, `checklist_detail_temuan`, `checklist_detail_kategori`, `checklist_detail_batas_temuan_hari`, `checklist_detail_input_datetime`, `checklist_detail_is_close`, `checklist_detail_close_datetime`) VALUES
(1, 1, 'Ban Axle 2 No. 4 (1mm)', 'Ban', '2022-07-24', '2022-07-21 08:04:27', 1, '2022-07-21 08:05:08'),
(2, 1, 'Lampu rem kiri atas mati', 'Lampu-lampu', '2022-07-28', '2022-07-21 08:04:27', 1, '2022-07-21 08:35:37'),
(3, 2, 'Bracket tidak efektif', 'Bracket', '2022-07-09', '2022-07-22 08:28:00', 1, '2022-07-25 08:52:57'),
(4, 2, 'Rotari mati', 'Lampu-lampu', '2022-07-12', '2022-07-22 08:28:00', 1, '2022-07-25 09:13:59'),
(5, 2, 'Lampu sein kanan depan mati', 'Lampu-lampu', '2022-07-17', '2022-07-22 08:28:00', 1, '2022-07-25 09:14:05'),
(6, 3, 'Ban Axle 1 No. 2 (1mm)', 'Ban', '2022-07-23', '2022-07-26 15:01:04', 1, '2022-07-26 15:28:47'),
(7, 3, 'Lampu rotari mati', 'Lampu-lampu', '2022-07-11', '2022-07-26 15:01:04', 1, '2022-07-26 15:29:25'),
(8, 4, 'Kabel grounding kurang panjang', 'Lampu-lampu', '2022-07-27', '2022-07-27 07:36:03', 2, NULL),
(9, 4, 'Lampu rem kanan bawah mati', 'Lampu-lampu', '2022-07-26', '2022-07-27 07:36:03', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mobiltanki`
--

CREATE TABLE `mobiltanki` (
  `id` int(11) NOT NULL,
  `nopol` varchar(50) NOT NULL,
  `transportir` varchar(128) NOT NULL,
  `kapasitas` varchar(50) NOT NULL,
  `pemeriksaan_terakhir` int(11) NOT NULL,
  `tanggal_pemeriksaan` int(11) NOT NULL,
  `merk_mobil` varchar(128) NOT NULL,
  `tahun_pembuatan` varchar(50) NOT NULL,
  `jenis_produk` varchar(128) NOT NULL,
  `lokasi` varchar(256) NOT NULL,
  `jenis` varchar(256) NOT NULL,
  `ta` date NOT NULL,
  `tera` date NOT NULL,
  `keur` date NOT NULL,
  `pajak` date NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobiltanki`
--

INSERT INTO `mobiltanki` (`id`, `nopol`, `transportir`, `kapasitas`, `pemeriksaan_terakhir`, `tanggal_pemeriksaan`, `merk_mobil`, `tahun_pembuatan`, `jenis_produk`, `lokasi`, `jenis`, `ta`, `tera`, `keur`, `pajak`, `status`) VALUES
(3, 'L8663UI', 'PT Putra Wahyu Persada', '24', 0, 1650785190, 'UD Trcuk', '2017', 'Avtur', 'FT Rewulu', '', '2022-04-30', '2023-04-22', '2022-07-25', '2023-05-31', 'Ready'),
(4, 'G1780DA', 'PT. Murni Adi Dukuh Jaya', '16', 0, 1652538404, 'Hino', '2015', 'Multi Produk', 'FT Rewulu', 'Pola Tarif', '2022-05-31', '2022-05-31', '2022-07-31', '2022-05-31', 'Blokir'),
(5, 'B9444TEI', 'PT. Adam Trans', '24', 0, 1652538377, 'Hino', '2019', 'Multi Produk', 'FT Rewulu', 'Pola Sewa', '2022-06-11', '2022-06-11', '2022-07-11', '2022-06-11', ''),
(8, 'AB1234XX', 'PT. Zeaby', '32', 0, 1658900103, 'Mery', '2021', 'Multi Produk', 'FT Rewulu', 'Pola Sewa', '2022-07-30', '2022-07-31', '2022-08-06', '2022-08-05', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `date_update` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `image`, `password`, `role_id`, `is_active`, `date_created`, `date_update`) VALUES
(3, 'Gilang Pratama', 'pgilang11@gmail.com', '085643371946', 'default.png', '$2y$10$VK33XpvIXxc/zvjAfOtZfu5dzKfrwOdrvmqABFyi7qweNF8/e0rg.', 1, 1, 1645291439, 0),
(5, 'Gilang Pratama', 'mk.gilang.pratama1@mitrakerja.pertamina.com', '085643371946', 'default.png', '$2y$10$VK33XpvIXxc/zvjAfOtZfu5dzKfrwOdrvmqABFyi7qweNF8/e0rg.', 2, 1, 1646506611, 1650631567);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(4, 1, 5),
(5, 1, 6),
(7, 2, 1),
(8, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Home'),
(2, 'User'),
(5, 'Master'),
(6, 'Checklist');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'home', 'monitor', 1),
(2, 2, 'Profile', 'user', 'user', 0),
(3, 2, 'List Users', 'user/list', 'list', 1),
(4, 5, 'Mobil Tanki', 'master/mobiltanki', 'truck', 1),
(5, 6, 'Checklist', 'checklist', 'check-circle', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checklist`
--
ALTER TABLE `checklist`
  ADD PRIMARY KEY (`checklist_id`),
  ADD KEY `checklist_mobiltanki_id` (`checklist_mobiltanki_id`),
  ADD KEY `checklist_is_close` (`checklist_is_close`);

--
-- Indexes for table `checklist_detail`
--
ALTER TABLE `checklist_detail`
  ADD PRIMARY KEY (`checklist_detail_id`),
  ADD KEY `checklist_detail_checklist_id` (`checklist_detail_checklist_id`),
  ADD KEY `checklist_detail_is_close` (`checklist_detail_is_close`);

--
-- Indexes for table `mobiltanki`
--
ALTER TABLE `mobiltanki`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checklist`
--
ALTER TABLE `checklist`
  MODIFY `checklist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `checklist_detail`
--
ALTER TABLE `checklist_detail`
  MODIFY `checklist_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mobiltanki`
--
ALTER TABLE `mobiltanki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
