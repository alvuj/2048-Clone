-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2023 at 10:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2048`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(50) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `high_score` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `user_name`, `password`, `high_score`) VALUES
(1, 'Ivan', 'password123', 500),
(2, 'Ana', 'password123', 1000),
(3, 'Marko', 'password123', 1500),
(4, 'Marija', 'password123', 2000),
(5, 'Petar', 'password123', 2500),
(6, 'Iva', 'password123', 3000),
(7, 'Josip', 'password123', 3500),
(8, 'Lucija', 'password123', 4000),
(9, 'Tomislav', 'password123', 4250),
(10, 'Marta', 'password123', 4500),
(11, 'Luka', 'password123', 4750),
(12, 'Lara', 'password123', 5000),
(13, 'Nikola', 'password123', 5250),
(14, 'Sara', 'password123', 5500),
(15, 'Filip', 'password123', 5750),
(16, 'Ana', 'password123', 6000),
(17, 'Matija', 'password123', 6250),
(18, 'Nina', 'password123', 6500),
(19, 'Leon', 'password123', 6750),
(20, 'Elena', 'password123', 7000),
(63, 'test', 'test', 2020);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
