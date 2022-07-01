-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2022 at 10:32 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `photoeditor`
--

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `photoID` varchar(255) NOT NULL,
  `photoName` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photoID`, `photoName`, `created_at`, `userID`) VALUES
('62796b5fb3cd9', 'IMG_5992.JPG', '2022-05-09 19:28:31', 13),
('627973140eab1', 'IMG_5992.JPG', '2022-05-09 20:01:24', 13),
('6279741101fb5', 'IMG_5203.JPG', '2022-05-09 20:05:37', 13),
('627974a74862d', 'IMG_6300.JPG', '2022-05-09 20:08:07', 13),
('6279755b3365a', 'IMG_5590.JPG', '2022-05-09 20:11:07', 13),
('62797b448a818', 'IMG_5203.JPG', '2022-05-09 20:36:20', 13),
('62909d5d811ed', 'IMG_5641.JPG', '2022-05-27 09:43:57', 14),
('62909e18b1a57', 'IMG_5749.JPG', '2022-05-27 09:47:04', 14),
('62909e413099a', 'IMG_5627.JPG', '2022-05-27 09:47:45', 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `email`, `password`, `created_at`) VALUES
(13, 'jancek12345', 'jan.sterle123@gmail.com', '$2y$10$1rkJTrh0zkn/DKmv/IJj9uj./Fj5Mrmb0MC232RRdFwMgPDexkVSW', '2022-05-08 13:11:14'),
(14, 'janinani123', 'janinani.sterle123@gmail.com', '$2y$10$X0ljtNFv.H2lHVkSUvHVn.5hsfMSFqf37VPwqdfaILKbfLBwz/fcW', '2022-05-09 07:49:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`photoID`),
  ADD KEY `fk_userID` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `fk_userID` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
