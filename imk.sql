-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 07:54 AM
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
  `id` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `date_updated` int(11) NOT NULL,
  `ban` varchar(50) NOT NULL,
  `apar` varchar(50) NOT NULL,
  `bracket` varchar(50) NOT NULL,
  `t2` varchar(50) NOT NULL,
  `cut_off` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checklist`
--

INSERT INTO `checklist` (`id`, `id_mobil`, `date_created`, `date_updated`, `ban`, `apar`, `bracket`, `t2`, `cut_off`) VALUES
(1, 1, 0, 0, '1', '1', '1', '1', '0');

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
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobiltanki`
--

INSERT INTO `mobiltanki` (`id`, `nopol`, `transportir`, `kapasitas`, `pemeriksaan_terakhir`, `tanggal_pemeriksaan`, `merk_mobil`, `tahun_pembuatan`, `jenis_produk`, `lokasi`, `jenis`, `ta`, `tera`, `keur`, `pajak`, `status`) VALUES
(3, 'L8663UI', 'PT Putra Wahyu Persada', '24', 0, 1650785190, 'UD Trcuk', '2017', 'Avtur', 'FT Rewulu', '', '2022-04-30', '2023-04-22', '2022-10-22', '2023-05-31', 'Ready'),
(4, 'G1780DA', 'PT. Murni Adi Dukuh Jaya', '16', 0, 1652538404, 'Hino', '2015', 'Multi Produk', 'FT Rewulu', 'Pola Tarif', '2022-05-31', '2022-05-31', '2022-05-31', '2022-05-31', 'Off'),
(5, 'B9444TEI', 'PT. Adam Trans', '24', 0, 1652538377, 'Hino', '2019', 'Multi Produk', 'FT Rewulu', 'Pola Sewa', '2022-06-11', '2022-06-11', '2022-06-11', '2022-06-11', 'Ready');

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
(5, 'Gilang Pratama', 'mk.gilang.pratama1@mitrakerja.pertamina.com', '085643371946', 'default.png', '$2y$10$c2E8GTQgcdL4Z.MDb50PSOcZ7lJ1pShZ7Uk/Lgr8iEMCsV9oFsmye', 2, 1, 1646506611, 1650631567);

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
(3, 2, 2),
(4, 1, 5),
(5, 1, 6);

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
(2, 2, 'Profile', 'user', 'user', 1),
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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mobiltanki`
--
ALTER TABLE `mobiltanki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
