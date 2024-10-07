-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2024 at 06:57 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plagiarism_detection`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `administrator_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `levels` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`administrator_id`, `name`, `username`, `password`, `levels`) VALUES
(1, 'admin sistem', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '0');

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE `papers` (
  `paper_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `years` year(4) NOT NULL,
  `document` text DEFAULT NULL,
  `text_doc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`paper_id`, `title`, `years`, `document`, `text_doc`) VALUES
(5, 'Analisis Pengaruh Metodologi Agile terhadap Produktivitas Tim Pengembang Perangkat Lunak', 2020, NULL, NULL),
(6, 'Implementasi DevOps dalam Pengembangan Perangkat Lunak untuk Meningkatkan Kecepatan dan Kualitas Rilis', 2020, NULL, NULL),
(7, 'Studi Komparatif antara Penggunaan Bahasa Pemrograman Python dan Java dalam Pengembangan Aplikasi Web', 2021, NULL, NULL),
(8, 'Pengaruh Penggunaan Alat Otomatisasi Pengujian terhadap Kualitas Perangkat Lunak', 2022, NULL, NULL),
(9, 'Peran Machine Learning dalam Pengembangan Sistem Keamanan Siber', 2022, NULL, NULL),
(10, 'Analisis Penggunaan Microservices Architecture dalam Pengembangan Aplikasi Skala Besar', 2023, NULL, NULL),
(11, 'Analisis Penggunaan Microservices Architecture dalam Pengembangan Aplikasi Skala Kecil', 2023, NULL, NULL),
(12, 'Evaluasi Efektivitas Metode Continuous Integration dan Continuous Deployment dalam Proses Pengembangan Perangkat Lunak', 2024, NULL, NULL),
(13, 'Pengaruh Penggunaan Framework React dan Angular terhadap Kinerja Aplikasi Front-End', 2024, NULL, NULL),
(14, 'Studi Kasus Implementasi Sistem Manajemen Proyek Berbasis Cloud dalam Perusahaan Pengembang Perangkat Lunak', 2023, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`administrator_id`);

--
-- Indexes for table `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`paper_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `administrator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `papers`
--
ALTER TABLE `papers`
  MODIFY `paper_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
