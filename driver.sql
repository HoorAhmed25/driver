-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2021 at 08:54 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `driver`
--

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(10) NOT NULL,
  `uname` varchar(200) NOT NULL,
  `nationalId` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `age` int(10) NOT NULL,
  `governorate` varchar(200) NOT NULL,
  `education` varchar(100) NOT NULL,
  `license` varchar(200) NOT NULL,
  `edu` varchar(200) NOT NULL,
  `national` varchar(200) NOT NULL,
  `Dlicense` varchar(200) NOT NULL,
  `gesh` varchar(200) NOT NULL,
  `eqrar` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `governorate`
--

CREATE TABLE `governorate` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `governorate`
--

INSERT INTO `governorate` (`id`, `name`) VALUES
(1, 'القاهره'),
(2, 'الاسكندرية'),
(3, 'بورسعيد'),
(4, 'السويس'),
(11, 'دمياط'),
(12, 'الدقهلية'),
(13, 'الشرقية'),
(14, 'القليوبية'),
(15, 'كفر الشيخ'),
(16, 'الغربية'),
(17, 'المنوفية'),
(18, 'البحيرة'),
(19, 'الاسماعيلية'),
(21, 'الجيزه'),
(22, 'بنى سويف'),
(23, 'الفيوم'),
(24, 'المنيا'),
(25, 'اسيوط'),
(26, 'سوهاج'),
(27, 'قنا'),
(28, 'اسوان'),
(29, 'الاقصر'),
(31, 'البحر الاحمر'),
(32, 'الوادى الجديد'),
(33, 'مرسى مطروح'),
(34, 'شمال سيناء'),
(35, 'جنوب سيناء');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'admin', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `governorate`
--
ALTER TABLE `governorate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
