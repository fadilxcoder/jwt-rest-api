-- phpMyAdmin SQL Dump
-- version 5.0.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 22, 2020 at 05:37 PM
-- Server version: 5.7.14
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `experimental_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `jwt_users`
--

DROP TABLE IF EXISTS `jwt_users`;
CREATE TABLE `jwt_users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jwt_users`
--

INSERT INTO `jwt_users` (`id`, `full_name`, `email`, `password`) VALUES
(1, 'Amie Schoen', 'scruickshank@volkman.com', '$2y$10$5awB1FjrUSTPZYBMiicSL.ye9Ann0dx8zzqgsijLIHj6W3pBZsNiW'),
(2, 'Scrum Master', 'scrum-master@volkman.com', '$2y$10$5awB1FjrUSTPZYBMiicSL.ye9Ann0dx8zzqgsijLIHj6W3pBZsNiW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jwt_users`
--
ALTER TABLE `jwt_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jwt_users`
--
ALTER TABLE `jwt_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

