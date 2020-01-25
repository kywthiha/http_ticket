-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2020 at 10:35 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `http_ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `booking_date` datetime NOT NULL,
  `traveller_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `staff_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_detail`
--

CREATE TABLE `booking_detail` (
  `bd_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `ticket_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `booking_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `bus_id` bigint(20) NOT NULL,
  `bus_operator_id` bigint(20) NOT NULL,
  `no_of_seat` int(11) NOT NULL,
  `type` enum('Standard','VIP') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bus_id`, `bus_operator_id`, `no_of_seat`, `type`) VALUES
(4, 0, 33, 'Standard');

-- --------------------------------------------------------

--
-- Table structure for table `bus_operator`
--

CREATE TABLE `bus_operator` (
  `bus_operator_id` bigint(5) NOT NULL,
  `bus_operator_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `phone_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bus_operator`
--

INSERT INTO `bus_operator` (`bus_operator_id`, `bus_operator_name`, `email`, `phone_no`) VALUES
(5, 'Famous', 'famous@gmail.com', '09445892201'),
(6, 'Shwe Sin Satt Kyar', 'shwesin@gmail.com', '09343432423'),
(7, 'Kamma Yarzar', 'kamma@gmail.com', '09444555123'),
(8, 'Aung Myanmar', 'aung@gmail.com', '09776612452'),
(9, 'Shwe Nyaung Aye', 'shwe@gmail.com', '09984576257'),
(10, 'Mann Yarzar', 'mann@gmail.com', '09267978655');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `c_id` bigint(20) NOT NULL,
  `c_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`c_id`, `c_name`) VALUES
(11, 'Pakokku'),
(12, 'Yangon'),
(13, 'Bagan/Nyaung Oo'),
(14, 'AungLan '),
(15, 'Aungpan'),
(16, 'Ayadaw'),
(17, 'Bago'),
(18, 'Bahin'),
(19, 'Bilin'),
(20, 'Bokpyin'),
(21, 'Chauk'),
(22, 'Danubyu'),
(23, 'Dawei'),
(24, 'Gangaw'),
(25, 'Hakha'),
(26, 'Hopin'),
(27, 'Mandalay'),
(28, 'Magway'),
(29, 'Kamma'),
(30, 'Monywa'),
(32, 'Kyauk Padaunk');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `r_id` bigint(20) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`r_id`, `title`) VALUES
(13, 'Pakokku-Yangon'),
(14, 'Mawgay - Mandalay');

-- --------------------------------------------------------

--
-- Table structure for table `route_detail`
--

CREATE TABLE `route_detail` (
  `rd_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `route_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `location` int(11) NOT NULL,
  `city_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `route_detail`
--

INSERT INTO `route_detail` (`rd_id`, `route_id`, `location`, `city_id`) VALUES
('', '3', 1, '4'),
('', '3', 2, '5'),
('', '3', 3, '7'),
('', '4', 1, '7'),
('', '4', 2, '5'),
('', '4', 3, '4'),
('', '5', 1, '4'),
('', '5', 2, '5'),
('', '5', 3, '7'),
('', '7', 1, '9'),
('', '7', 2, '7'),
('', '7', 3, '9'),
('', '7', 4, '8'),
('', '8', 1, '7'),
('', '8', 2, '10'),
('', '8', 3, '8'),
('', '9', 1, '7'),
('', '9', 2, '8'),
('', '9', 3, '10'),
('', '10', 1, '7'),
('', '10', 2, '8'),
('', '10', 3, '9'),
('', '10', 4, '10'),
('', '10', 5, '5'),
('', '11', 1, '7'),
('', '11', 2, '5'),
('', '12', 1, '7'),
('', '12', 2, '8'),
('', '12', 3, '5'),
('', '13', 1, '11'),
('', '13', 2, '13'),
('', '13', 3, '32'),
('', '13', 4, '12'),
('', '14', 1, '28'),
('', '14', 2, '27');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `s_id` bigint(20) NOT NULL,
  `route_id` bigint(20) NOT NULL,
  `bus_id` bigint(20) NOT NULL,
  `departure_time` time NOT NULL,
  `arrival_time` time NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`s_id`, `route_id`, `bus_id`, `departure_time`, `arrival_time`, `price`) VALUES
(2, 9, 5, '05:06:00', '07:06:00', 6666),
(3, 9, 3, '15:03:00', '13:03:00', 2224),
(7, 9, 3, '05:05:00', '17:05:00', 555);

--
-- Triggers `schedule`
--
DELIMITER $$
CREATE TRIGGER `ticket_auto_generate` AFTER INSERT ON `schedule` FOR EACH ROW BEGIN
DECLARE no_of_seat BIGINT;
  SET no_of_seat = (SELECT bus.no_of_seat FROM bus WHERE bus.bus_id = NEW.bus_id);
INSERT INTO ticket (ticket.schedule_id,ticket.seat_no) VALUES (NEW.s_id, no_of_seat);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `t_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `schedule_id` bigint(20) NOT NULL,
  `seat_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`t_id`, `schedule_id`, `seat_no`) VALUES
('', 3, 0),
('', 0, 0),
('', 6, 0),
('', 7, 50);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_seat`
--

CREATE TABLE `ticket_seat` (
  `ts_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `schedule_id` bigint(20) NOT NULL,
  `seat_no` int(11) NOT NULL,
  `seat_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `traveller`
--

CREATE TABLE `traveller` (
  `traveller_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `traveller_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `phone_no` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `bus_operator`
--
ALTER TABLE `bus_operator`
  ADD PRIMARY KEY (`bus_operator_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `bus_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bus_operator`
--
ALTER TABLE `bus_operator`
  MODIFY `bus_operator_id` bigint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `c_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `r_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `s_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
