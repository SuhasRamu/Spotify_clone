-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2022 at 07:08 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spotify`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id` int(10) NOT NULL,
  `a_name` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `bio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `a_name`, `date`, `bio`) VALUES
(0, 'Darshan', '1979-02-02', 'he is a Famous actor'),
(0, 'Sudeep', '1966-06-09', 'Pan india actor'),
(0, 'Vikram', '1997-06-26', 'Great singer'),
(0, 'Prajwal', '1972-09-20', 'Actor'),
(0, 'Ganesh', '1965-08-20', 'Golden star'),
(0, 'Yash', '1985-08-22', 'Rocking star'),
(0, 'Puneeth Rajkumar', '1982-08-27', 'Power star');

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `id` int(10) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `dor` date NOT NULL,
  `cover` varbinary(10000) DEFAULT NULL,
  `artist` varchar(20) NOT NULL,
  `rating` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`id`, `sname`, `dor`, `cover`, `artist`, `rating`) VALUES
(1, 'kannu Hodiyaka', '2019-06-13', 0x726f626572742e6a7067, 'Darshan', 4),
(2, 'Pailwan title track', '2018-06-15', 0x70696c2e6a7067, 'Sudeep', 4),
(3, 'Dorassani', '2018-06-15', 0x646f726573616e692e6a7067, 'Sudeep', 3),
(4, 'Kottigobba 3', '2020-05-29', 0x6b6b332e6a7067, 'Sudeep', 3),
(5, 'Soul of Dia', '2018-06-21', 0x6469612e6a7067, 'Vikram', 4),
(6, 'Ninne modhalu', '2018-08-13', 0x6b6973732e6a7067, 'Vikram', 5),
(7, 'Inspector vikram', '2016-05-10', 0x76696b72616d2e6a7067, 'Prajwal', 5),
(8, 'Mungaru male', '2005-06-24', 0x6d6d2e6a7067, 'Ganesh', 4),
(9, 'Anjaniputra', '2017-12-29', 0x616e6a616e692e6a7067, 'Puneeth Rajkumar', 5),
(10, 'Googly', '2015-05-14', 0x676f6f676c692e6a7067, 'Yash', 3),
(11, 'o jaanu', '2019-08-31', 0x73657468612e6a7067, 'Puneeth Rajkumar', 5),
(12, 'Soul of Dia', '2018-06-21', 0x6469612e6a7067, 'Vikram', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
