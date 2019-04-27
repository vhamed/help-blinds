-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 05, 2018 at 01:37 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final-prj`
--

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ipaddress` varchar(12) NOT NULL DEFAULT '192.168.1.1',
  `phone` varchar(13) NOT NULL DEFAULT '+213669403608',
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `type` enum('blind','agent','cousin') NOT NULL,
  `status` enum('on','off','work','call','wait') NOT NULL DEFAULT 'off',
  `correspID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `surname`, `username`, `password`, `ipaddress`, `phone`, `latitude`, `longitude`, `type`, `status`, `correspID`) VALUES
(1, 'sadek', 'ayadi', 'sadek', '1', '192.168.1.1', '+213669403608', 35.532, 6.17242, 'blind', 'off', 0),
(2, 'amar', 'mekhalfi', 'amar', '1', '192.168.1.1', '+213669403608', 35.411, 6.1622, 'agent', 'off', 0),
(3, 'imad', 'ayadi', 'imad', '1', '192.168.1.1', '+213669403608', 35.5295, 6.1723, 'cousin', 'off', 0),
(4, 'nafaa', 'ayadi', 'nafaa', '1', '192.168.1.1', '+213669403608', 35.5295, 6.1723, 'cousin', 'off', 0),
(5, 'gaga', 'ayadi', 'gaga', '1', '192.168.1.1', '+213669403608', 35.5295, 6.1723, 'cousin', 'off', 0),
(6, 'alaid', 'ayadi', 'alaid', '1', '192.168.1.1', '+213669403608', 35.5295, 6.1723, 'cousin', 'off', 0),
(7, 'masoud', 'masoud', 'masoud', '1', '192.168.1.1', '+213669403608', 35.5606, 6.17359, 'blind', 'off', 0),
(8, 'kadour', '', 'kadour', '1', '192.168.1.1', '+213669403608', 35.5369, 6.1727, 'blind', 'off', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
