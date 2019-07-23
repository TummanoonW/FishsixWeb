-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 22, 2019 at 07:26 AM
-- Server version: 10.1.37-MariaDB
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
-- Database: `fishsix`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `ID` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password_hash` varchar(32) COLLATE utf8_bin NOT NULL,
  `username` varchar(20) COLLATE utf8_bin NOT NULL,
  `profile_pic` text COLLATE utf8_bin,
  `apiKey` varchar(32) COLLATE utf8_bin NOT NULL,
  `type` varchar(10) COLLATE utf8_bin NOT NULL,
  `isRoot` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`ID`, `email`, `password_hash`, `username`, `profile_pic`, `apiKey`, `type`, `isRoot`) VALUES
(1, 'barnista@gmail.com', '8e3b4f8d1345f6d108d5b18b3c7e60db', 'Barnista', NULL, '', 'admin', ''),
(2, 'fealucus@gmail.com', 'fcd115697f7a0de8204c43bbfa52b0bc', 'Fealucus', NULL, '', 'student', ''),
(4, 'nollet@gmail.com', '0423468d132623f49edf3ed5bc6301fc', 'KoolAid', '', '', 'student', ''),
(5, '', '', '', '', '', '', ''),
(6, 'exzurestudio@gmail.com', '6add84506c86a658bc85038f91e35ce7', 'gapsurat', '', '', 'admin', ''),
(7, 'nollet2@gmail.com', '353eab65a0668ecd8d509bf518209945', 'KanyeWest', '', '51bd0a6070d7fbbc46963f2e2e518d73', 'user', ''),
(8, 'nollet3@gmail.com', '353eab65a0668ecd8d509bf518209945', 'KanyeWest', '', 'b949fae0b612fed1b6d0895c44d362ed', 'user', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
