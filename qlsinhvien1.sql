-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2021 at 06:09 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlsinhvien1`
--

-- --------------------------------------------------------

--
-- Table structure for table `lophoc`
--

CREATE TABLE `lophoc` (
  `malophoc` int(11) NOT NULL,
  `tenlophoc` varchar(30) DEFAULT NULL,
  `sdt` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lophoc`
--

INSERT INTO `lophoc` (`malophoc`, `tenlophoc`, `sdt`) VALUES
(1009, 'An toÃ n máº¡ng', '0383531434');

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE `sinhvien` (
  `masv` int(11) NOT NULL,
  `ten` varchar(30) DEFAULT NULL,
  `ngaysinh` date DEFAULT NULL,
  `gioitinh` varchar(3) DEFAULT NULL,
  `chucvu` varchar(20) DEFAULT NULL,
  `luong` double DEFAULT NULL,
  `cmnd` varchar(11) DEFAULT NULL,
  `sdt` varchar(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `diachi` varchar(30) DEFAULT NULL,
  `hinhanh` varchar(200) NOT NULL,
  `malophoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`masv`, `ten`, `ngaysinh`, `gioitinh`, `chucvu`, `luong`, `cmnd`, `sdt`, `email`, `diachi`, `hinhanh`, `malophoc`) VALUES
(441, 'DÆ°Æ¡ng', '2021-07-15', 'Nam', 'Cao', 20000, '0010', '02344565776', 'mactungduongkn@gmail.com', 'HÃ  Ná»™i', 'Screenshot 2021-07-14 090209.png', 1009),
(442, 'Doanh', '2021-07-15', 'Ná»', 'Tháº¥p', 20000, '0010dd', '02344565776', 'mastertricks99@gmail.com', 'HÃ  Ná»™i', '7f6694053dafcef197be.jpg', 1009);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `pass`, `full_name`, `email`) VALUES
('k14', 'e10adc3949ba59abbe56e057f20f883e', 'Khôi', 'khoidanghoang144@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`malophoc`);

--
-- Indexes for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`masv`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lophoc`
--
ALTER TABLE `lophoc`
  MODIFY `malophoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1010;

--
-- AUTO_INCREMENT for table `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `masv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=443;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
