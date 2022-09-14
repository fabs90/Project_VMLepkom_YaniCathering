-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2022 at 02:45 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cathering`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_pembeli`
--

CREATE TABLE `data_pembeli` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telepon` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `catatan` text DEFAULT NULL,
  `bayar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_pembeli`
--

INSERT INTO `data_pembeli` (`id`, `nama`, `email`, `no_telepon`, `alamat`, `catatan`, `bayar`) VALUES
(1, 'Fabian', 'fabianjuliansyah@yahoo.co.id', '123456', 'Jl. Cipta Guna', 'Tumpeng 1 ya mbak', 'tf_online'),
(2, 'Cimin', 'kucing@gmail.com', '082182347162', 'Jalan Pondok Gede', 'Tumpeng 2 nya 1 dan Nasibox-2 50 box yaa', 'tf_online'),
(3, 'Fabian', 'admin1@gmail.com', '1234', 'Jalan Cipta Guna', '12345', 'tf_online');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token_ganti_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `email`, `token_ganti_password`) VALUES
(2, 'admin', '$2y$10$4jIqfULl9iJY2CEsdKTTMe1.rUkyHfHfISpgchjkYZ/pl5CJpY8k2', 'admin1@gmail.com', ''),
(3, 'fabian', '$2y$10$V209QcIhEb3G/GtFmyP7qeYd.5uedwh/R9yXg/Cn/IQ27geLLAx8.', 'fabianjuliansyah@yahoo.co.id', '');

-- --------------------------------------------------------

--
-- Table structure for table `nasibox_product`
--

CREATE TABLE `nasibox_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nasibox_product`
--

INSERT INTO `nasibox_product` (`id`, `name`, `image`, `price`, `description`) VALUES
(1, 'NasiBox-1', 'nasibox1.jpeg', '29.000', 'Nasi kuning, Tempe orek buncis, Ayam goreng, Mie goreng, Telur Balado'),
(2, 'Nasibox-2', 'nasibox2.jpeg', '18.000', 'Nasi liwet, lalapan dan sambal, ayam bakar, ikan asin, tahu tempe'),
(3, 'NasiBox-3', 'nasibox3.jpeg', '25.000', 'Nasi kuning, mie goreng, ayam goreng, kering tempe, telur balado'),
(4, 'Nasibox-4', 'nasibox4.jpeg', '25.000', 'Nasi putih, tahu tempe bacem, telur pindang, ayam bakar, urap'),
(5, 'Nasibox-5', 'nasibox5.jpeg', '23.000', 'Nasi kuning, mie goreng, ayam bakar, telur balado, kentang goreng balado'),
(6, 'Nasibox-6', 'nasibox6.jpeg', '30.000', 'Nasi liwet teri, Tahu tempe, Ayam goreng kuning, sambal dan lalapan');

-- --------------------------------------------------------

--
-- Table structure for table `tumpeng_product`
--

CREATE TABLE `tumpeng_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tumpeng_product`
--

INSERT INTO `tumpeng_product` (`id`, `name`, `image`, `price`, `description`) VALUES
(1, 'Tumpeng-1', 'tumpeng1.jpeg', '299.000', 'Nasi kuning, ayam goreng, telor dadar, ikan asin, urap, tahu, tempe bacem, lalap dan sambal'),
(2, 'Tumpeng-2', 'tumpeng2.jpeg', '259.000', 'Nasi kuning, ayam bakar, telur balado, udang goreng, mie goreng, urap, kering tempe'),
(3, 'Tumpeng-3', 'Tumpeng3.jpeg', '269.000', 'Nasi kuning, sambal goreng kentang, kering tempe, perkedel, urap, ayam bakar, telur balado, lalap dan sambal'),
(4, 'Tumpeng-4', 'tumpeng4.jpeg', '215.000', 'Nasi kuning, mie goreng, urap, dendeng balado, udang goreng, ayam goreng lengkuas, sate lilit,  telur dadar, kering kentang, sambal'),
(5, 'Tumpeng-5', 'tumpeng5.jpeg', '249.000', 'Nasi kuning, ayam bakar, lalap dan sambal, telur balado, kering tempe, urap'),
(6, 'Tumpeng-6 (Mini)', 'tumpeng6.jpeg', '30.000', 'Nasi kuning, timun, jeruk, egg roll, kering tempe, perkedel, telur balado, mie goreng');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_pembeli`
--
ALTER TABLE `data_pembeli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nasibox_product`
--
ALTER TABLE `nasibox_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tumpeng_product`
--
ALTER TABLE `tumpeng_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_pembeli`
--
ALTER TABLE `data_pembeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nasibox_product`
--
ALTER TABLE `nasibox_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tumpeng_product`
--
ALTER TABLE `tumpeng_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
