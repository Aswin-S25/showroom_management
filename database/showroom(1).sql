-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2022 at 09:22 PM
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
-- Database: `showroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_book`
--

CREATE TABLE `tbl_book` (
  `id` int(100) UNSIGNED NOT NULL,
  `cusname` varchar(100) NOT NULL,
  `mobile` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `modelname` varchar(100) NOT NULL,
  `payment` text NOT NULL,
  `conformation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_book`
--

INSERT INTO `tbl_book` (`id`, `cusname`, `mobile`, `address`, `modelname`, `payment`, `conformation`) VALUES
(1, 'Kuame Shields', 25, 'Nihil corrupti et q', 'Quidem amet vitae n', 'FULL PAYMENT', 'APPROVED'),
(2, 'Lane Hubbard', 4, 'Fugiat fuga In qui', 'Ut esse dolor lauda', 'EMI', 'APPROVED'),
(3, 'Katell Salazar', 62, 'Nam in quo iusto rei', 'Quia deserunt aut do', 'EMI', 'PENDING'),
(4, 'Geoffrey Rose', 93, 'Enim autem consequat', 'Non voluptas sit nes', 'EMI', 'CANCELED'),
(5, 'Kelly Franklin', 68, 'Saepe ad sed quia mi', 'Velit dolores totam ', 'FULL PAYMENT', 'APPROVED');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id` int(100) UNSIGNED NOT NULL,
  `cusname` varchar(100) NOT NULL,
  `mobile` int(10) NOT NULL,
  `model_name` varchar(100) NOT NULL,
  `conformation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `id` int(10) UNSIGNED NOT NULL,
  `modelname` varchar(11) NOT NULL,
  `mileage` double(10,2) NOT NULL,
  `topspeed` int(11) NOT NULL,
  `wheel` varchar(11) NOT NULL,
  `power` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `color` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`id`, `modelname`, `mileage`, `topspeed`, `wheel`, `power`, `price`, `color`) VALUES
(5, 'Commodi tem', 41.00, 48, 'Commodi vol', 0, 913, 'Rem ex reic'),
(6, 'Ad veniam i', 12.00, 38, 'Neque est r', 0, 927, 'Dolorem lab'),
(7, 'Debitis acc', 21.00, 91, 'Elit sunt q', 0, 64, 'Commodi mai');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `mobile`, `password`) VALUES
(1, 'user', 'user@gmail.com', 65754, '1234'),
(2, 'arif', 'arif@gmail.com', 4587215, '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_book`
--
ALTER TABLE `tbl_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_book`
--
ALTER TABLE `tbl_book`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
