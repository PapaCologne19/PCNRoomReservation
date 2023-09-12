-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2023 at 07:32 AM
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
-- Database: `calendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `evt_id` bigint(20) NOT NULL,
  `evt_start` date NOT NULL,
  `evt_end` datetime NOT NULL,
  `evt_text` text NOT NULL,
  `evt_color` varchar(7) NOT NULL,
  `evt_bg` varchar(7) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `projector` varchar(255) NOT NULL,
  `whiteboard` varchar(255) NOT NULL,
  `ext_cord` varchar(255) NOT NULL,
  `sound` varchar(255) NOT NULL,
  `sound_simple` varchar(255) NOT NULL,
  `sound_advance` varchar(255) NOT NULL,
  `basic_lights` varchar(255) NOT NULL,
  `cleanup` varchar(255) NOT NULL,
  `cleanup_before` varchar(255) NOT NULL,
  `cleanup_after` varchar(255) NOT NULL,
  `others` varchar(255) NOT NULL,
  `others1` varchar(255) NOT NULL,
  `allday` varchar(255) NOT NULL,
  `x67` varchar(255) NOT NULL,
  `x78` varchar(255) NOT NULL,
  `x89` varchar(255) NOT NULL,
  `x910` varchar(255) NOT NULL,
  `x1011` varchar(255) NOT NULL,
  `x1112` varchar(255) NOT NULL,
  `x121` varchar(255) NOT NULL,
  `x12` varchar(255) NOT NULL,
  `x23` varchar(255) NOT NULL,
  `x34` varchar(255) NOT NULL,
  `x45` varchar(255) NOT NULL,
  `x56` varchar(255) NOT NULL,
  `room_orientation` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`evt_id`, `evt_start`, `evt_end`, `evt_text`, `evt_color`, `evt_bg`, `qty`, `projector`, `whiteboard`, `ext_cord`, `sound`, `sound_simple`, `sound_advance`, `basic_lights`, `cleanup`, `cleanup_before`, `cleanup_after`, `others`, `others1`, `allday`, `x67`, `x78`, `x89`, `x910`, `x1011`, `x1112`, `x121`, `x12`, `x23`, `x34`, `x45`, `x56`, `room_orientation`, `status`) VALUES
(1, '2023-09-08', '2023-09-08 00:00:00', 'boardroom', '#000000', '#fbff00', '3', '1', '1', '1', 'sound', '0', '0', '0', 'cleanup', '0', '0', 'others', '', 'x', 'Deo Villavicencio', 'Deo Villavicencio', 'Deo Villavicencio', '', '', '', '', '', '', '', '', '', 'Workshop', 'pending'),
(3, '2023-09-08', '2023-09-08 00:00:00', 'boardroom', '#000000', '#fbff00', '2', '1', '1', '1', 'sound', '1', '0', '1', 'cleanup', '1', '0', 'others', '', 'x', '', '', '', '', '', '', '', 'Deo Villavicencio', 'Deo Villavicencio', '', '', '', 'Classroom', 'pending'),
(5, '2023-09-09', '2023-09-09 00:00:00', 'boardroom', '#000000', '#fbff00', '2', '0', '1', '1', 'sound', '0', '0', '0', 'cleanup', '0', '0', 'others', '', 'x', 'Deo Villavicencio', 'Deo Villavicencio', '', '', '', '', '', '', '', '', '', '', 'Training', 'pending'),
(6, '2023-09-09', '2023-09-09 00:00:00', 'boardroom', '#000000', '#fbff00', '2', '0', '1', '1', 'sound', '0', '0', '0', 'cleanup', '0', '0', 'others', '', 'x', '', '', 'Deo Villavicencio', 'Deo Villavicencio', '', '', '', '', '', '', '', '', 'Training', 'pending'),
(9, '2023-09-10', '2023-09-10 00:00:00', 'boardroom', '#000000', '#fbff00', '2', '0', '0', '1', 'sound', '1', '0', '0', 'cleanup', '0', '0', 'others', '', 'x', 'Deo Villavicencio', 'Deo Villavicencio', '', '', '', '', '', '', '', '', '', '', 'Training', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `locationpo`
--

CREATE TABLE `locationpo` (
  `evt_id` bigint(20) NOT NULL,
  `evt_start` date NOT NULL,
  `evt_text` text NOT NULL,
  `evt_color` varchar(7) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `allday` varchar(255) NOT NULL,
  `x67` varchar(255) NOT NULL,
  `x78` varchar(255) NOT NULL,
  `x89` varchar(255) NOT NULL,
  `x910` varchar(255) NOT NULL,
  `x1011` varchar(255) NOT NULL,
  `x1112` varchar(255) NOT NULL,
  `x121` varchar(255) NOT NULL,
  `x12` varchar(255) NOT NULL,
  `x23` varchar(255) NOT NULL,
  `x34` varchar(255) NOT NULL,
  `x45` varchar(255) NOT NULL,
  `x56` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locationpo`
--

INSERT INTO `locationpo` (`evt_id`, `evt_start`, `evt_text`, `evt_color`, `qty`, `allday`, `x67`, `x78`, `x89`, `x910`, `x1011`, `x1112`, `x121`, `x12`, `x23`, `x34`, `x45`, `x56`) VALUES
(1, '2023-09-08', 'boardroom', '#000000', '3', 'x', '', 'Deo Villavicencio', 'Deo Villavicencio', '', '', '', '', '', '', '', '', ''),
(2, '2023-09-09', 'boardroom', '#000000', '2', 'x', 'Deo Villavicencio', 'Deo Villavicencio', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `rooms` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `rooms`, `capacity`, `timestamp`) VALUES
(1, 'MANILA', '', '2023-07-10 03:29:48'),
(2, 'BOARDROOM', '', '2023-07-10 03:29:48'),
(3, 'ANNEX 1', '', '2023-07-10 03:30:03'),
(4, 'ANNEX 2', '', '2023-07-10 03:30:18'),
(5, 'ANNEX 1 & 2', '', '2023-07-10 03:30:18'),
(6, 'ANNEX MINIROOM', '', '2023-07-10 03:30:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`evt_id`),
  ADD KEY `evt_start` (`evt_start`),
  ADD KEY `evt_end` (`evt_end`);

--
-- Indexes for table `locationpo`
--
ALTER TABLE `locationpo`
  ADD PRIMARY KEY (`evt_id`),
  ADD KEY `evt_start` (`evt_start`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `evt_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `locationpo`
--
ALTER TABLE `locationpo`
  MODIFY `evt_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
