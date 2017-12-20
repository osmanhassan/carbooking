-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2017 at 11:21 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carbooking_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookingId` int(50) NOT NULL,
  `destination` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `carNumber` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `bookingTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `returnTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pickupFrom` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `passengers` int(3) NOT NULL,
  `bookedBy` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookingId`, `destination`, `carNumber`, `bookingTime`, `returnTime`, `pickupFrom`, `passengers`, `bookedBy`) VALUES
(6, 'Location 1', 'Car 3', '2017-12-10 11:00:00', '2017-12-10 14:00:00', 'Location 2', 3, 'hassanmdosman@gmail.com'),
(7, 'Location 3', 'Car 2', '2017-12-09 01:00:00', '2017-12-09 07:00:00', 'Location 3', 2, 'hassanmdosman@gmail.com'),
(8, 'Location 3', 'Car 2', '2017-12-11 20:00:00', '2017-12-11 22:00:00', 'Location 3', 3, 'hassanmdosman@gmail.com'),
(9, 'Location 3', 'Car 2', '2017-12-22 21:00:00', '2017-12-26 00:00:00', 'Location 3', 3, 'hassanmdosman@gmail.com'),
(10, 'Location 2', 'Car 2', '2017-12-15 18:00:00', '2017-12-15 22:00:00', 'Location 2', 4, 'hassanmdosman@gmail.com'),
(12, 'Location 2', 'Car 2', '2017-12-16 02:00:00', '2017-12-16 03:00:00', 'Location 1', 2, 'hassanmdosman@gmail.com'),
(13, 'Location 1', 'Car 2', '2017-12-15 22:00:00', '2017-12-15 23:00:00', 'Location 2', 2, 'hassanmdosman@gmail.com'),
(14, 'Location 3', 'Car 2', '2017-12-16 00:00:00', '2017-12-12 02:00:00', 'Location 1', 2, 'hassanmdosman@gmail.com'),
(15, 'Location 2', 'Car 2', '2017-12-15 23:00:00', '2017-12-16 00:00:00', 'Location 3', 3, 'hassanmdosman@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userEmail` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userEmail`, `password`) VALUES
('hassanmdosman@gmail.com', 'bb6022e8d2f9956571ac7194f2073450');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookingId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookingId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
