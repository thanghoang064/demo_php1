-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 25, 2022 at 01:47 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `we17308`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` tinyint(3) NOT NULL,
  `hinh` varchar(255) NOT NULL,
  `id_cate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `status`, `hinh`, `id_cate`) VALUES
(1, 'Lưu minh vũ 1222222', 'luuminhvu111@gmail.com', 1, '', 0),
(2, 'Nguyễn đức mạnh 1232', 'nguyenducmanh@gmail.com', 1, '', 0),
(3, 'nguyễn văn c', 'nguyenvanc@gmail.com', 0, '', 2),
(4, 'nguyen van ccccc', 'abc@gmail.com', 0, '', 2),
(5, 'Hoang Quang Thang', 'ẻewrewrưẻ', 1, 'download.jpeg', 1),
(6, 'Hoang Quang Thang', 'ẻewrewrưẻ', 1, 'download.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_cate`
--

CREATE TABLE `user_cate` (
  `id` int(11) NOT NULL,
  `cate_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_cate`
--

INSERT INTO `user_cate` (`id`, `cate_name`) VALUES
(1, 'Khách hàng'),
(2, 'Admin'),
(3, 'Nhân Viên');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_cate`
--
ALTER TABLE `user_cate`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_cate`
--
ALTER TABLE `user_cate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
