-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2020 at 01:03 PM
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
  `booking_id` bigint(20) NOT NULL,
  `departure_date` date NOT NULL,
  `traveller_id` bigint(20) DEFAULT NULL,
  `staff_id` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `departure_date`, `traveller_id`, `staff_id`, `status`, `create_date_time`) VALUES
(7, '2020-01-29', 31, NULL, 1, '2020-01-27 11:09:58'),
(8, '2020-01-29', 32, NULL, 1, '2020-01-27 11:16:55'),
(9, '2020-01-29', 33, NULL, 1, '2020-01-27 11:19:54');

-- --------------------------------------------------------

--
-- Table structure for table `booking_detail`
--

CREATE TABLE `booking_detail` (
  `bd_id` bigint(20) NOT NULL,
  `ticket_id` bigint(5) NOT NULL,
  `booking_id` bigint(5) NOT NULL,
  `departure_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking_detail`
--

INSERT INTO `booking_detail` (`bd_id`, `ticket_id`, `booking_id`, `departure_date`) VALUES
(23, 51, 7, '2020-01-29'),
(24, 46, 7, '2020-01-29'),
(25, 45, 7, '2020-01-29'),
(26, 40, 7, '2020-01-29'),
(27, 192, 8, '2020-01-29'),
(28, 191, 8, '2020-01-29'),
(29, 196, 8, '2020-01-29'),
(30, 186, 9, '2020-01-29'),
(31, 185, 9, '2020-01-29'),
(32, 184, 9, '2020-01-29');

-- --------------------------------------------------------

--
-- Table structure for table `booking_status`
--

CREATE TABLE `booking_status` (
  `bs_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
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
(4, 0, 33, 'Standard'),
(6, 0, 52, 'VIP'),
(7, 0, 12, 'VIP'),
(8, 0, 32, 'VIP'),
(10, 10, 32, 'Standard'),
(11, 5, 44, 'Standard'),
(12, 11, 32, 'Standard'),
(13, 12, 24, 'Standard'),
(14, 12, 44, 'VIP'),
(15, 13, 16, 'Standard'),
(16, 14, 48, 'Standard'),
(17, 15, 20, 'Standard'),
(18, 0, 28, 'Standard');

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
(10, 'Mann Yarzar', 'mann@gmail.com', '09267978655'),
(11, 'Taw Win', 'taw@gmail.com', '09653323678'),
(12, 'Aung Lann Star', 'star@gmail.com', '09976545354'),
(13, 'Aung Kabar', 'kabar@gmail.com', '09478545435455555'),
(14, 'Aung Naing Moe', 'moe@gmail.com', '0977973487'),
(15, 'Hello', 'hello@gmail.com', '09950058782'),
(17, 'vxcv', 'vxcvxcv2fsfds2@fsf', 'vxcvcx');

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
(14, 'Mawgay - Mandalay'),
(15, 'Yangon - Pakokku'),
(16, 'Chauk-Magway'),
(17, 'Mandalay-Momywa'),
(18, 'Gangaw-Hakha'),
(19, 'Bago-Aung Lan'),
(20, 'Mandalay-Magway'),
(21, 'Bagan-Yangon'),
(22, 'Magway-Chauk'),
(23, 'Hakha-Gangaw'),
(24, 'Aung Lan-Bago');

-- --------------------------------------------------------

--
-- Table structure for table `route_detail`
--

CREATE TABLE `route_detail` (
  `route_id` bigint(20) NOT NULL,
  `location` int(11) NOT NULL,
  `city_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `route_detail`
--

INSERT INTO `route_detail` (`route_id`, `location`, `city_id`) VALUES
(3, 1, 4),
(3, 2, 5),
(3, 3, 7),
(4, 1, 7),
(4, 2, 5),
(4, 3, 4),
(5, 1, 4),
(5, 2, 5),
(5, 3, 7),
(7, 1, 9),
(7, 2, 7),
(7, 3, 10),
(7, 4, 8),
(8, 1, 7),
(8, 2, 10),
(8, 3, 8),
(9, 1, 7),
(9, 2, 8),
(9, 3, 10),
(10, 1, 7),
(10, 2, 8),
(10, 3, 9),
(10, 4, 10),
(10, 5, 5),
(11, 1, 7),
(11, 2, 5),
(12, 1, 7),
(12, 2, 8),
(12, 3, 5),
(13, 1, 11),
(13, 2, 13),
(13, 3, 32),
(13, 4, 12),
(14, 1, 28),
(14, 2, 27),
(15, 1, 12),
(15, 2, 32),
(15, 3, 13),
(15, 4, 11),
(16, 1, 21),
(16, 2, 29),
(16, 3, 11),
(16, 4, 28),
(17, 1, 27),
(17, 2, 30),
(18, 1, 24),
(18, 2, 29),
(18, 3, 11),
(18, 4, 28),
(18, 5, 25),
(19, 1, 17),
(19, 2, 14),
(20, 1, 27),
(20, 2, 28),
(21, 1, 13),
(21, 2, 32),
(21, 3, 12),
(22, 1, 28),
(22, 2, 11),
(22, 3, 29),
(22, 4, 21),
(23, 1, 25),
(23, 2, 12),
(23, 3, 28),
(23, 4, 11),
(23, 5, 29),
(23, 6, 24),
(24, 1, 14),
(24, 2, 17),
(25, 1, 11),
(25, 2, 27),
(25, 3, 25),
(25, 4, 13);

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
(7, 9, 3, '05:05:00', '17:05:00', 555),
(12, 15, 8, '19:00:00', '06:00:00', 12000),
(13, 15, 12, '09:00:00', '18:00:00', 12000),
(14, 13, 6, '20:00:00', '07:30:00', 11000),
(15, 14, 7, '06:00:00', '10:30:00', 5000),
(16, 14, 15, '13:30:00', '17:00:00', 5000),
(17, 14, 13, '20:30:00', '12:30:00', 5500),
(18, 15, 11, '15:30:00', '02:00:00', 11000),
(19, 14, 13, '02:22:00', '14:04:00', 12000);

--
-- Triggers `schedule`
--
DELIMITER $$
CREATE TRIGGER `ticket_auto_generate` AFTER INSERT ON `schedule` FOR EACH ROW BEGIN
DECLARE no_of_seat INT;
DECLARE seat_count INT;
SET seat_count = 1;
SET no_of_seat = (SELECT bus.no_of_seat FROM bus WHERE bus.bus_id = NEW.bus_id);
read_loop: LOOP
    IF seat_count > no_of_seat THEN
      LEAVE read_loop;
    END IF;
    INSERT INTO ticket (ticket.schedule_id,ticket.seat_no) VALUES (NEW.s_id, seat_count);
    SET seat_count = seat_count + 1;
  END LOOP;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `t_id` bigint(20) NOT NULL,
  `schedule_id` bigint(20) NOT NULL,
  `seat_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`t_id`, `schedule_id`, `seat_no`) VALUES
(1, 12, 1),
(2, 12, 2),
(3, 12, 3),
(4, 12, 4),
(5, 12, 5),
(6, 12, 6),
(7, 12, 7),
(8, 12, 8),
(9, 12, 9),
(10, 12, 10),
(11, 12, 11),
(12, 12, 12),
(13, 12, 13),
(14, 12, 14),
(15, 12, 15),
(16, 12, 16),
(17, 12, 17),
(18, 12, 18),
(19, 12, 19),
(20, 12, 20),
(21, 12, 21),
(22, 12, 22),
(23, 12, 23),
(24, 12, 24),
(25, 12, 25),
(26, 12, 26),
(27, 12, 27),
(28, 12, 28),
(29, 12, 29),
(30, 12, 30),
(31, 12, 31),
(32, 12, 32),
(33, 13, 1),
(34, 13, 2),
(35, 13, 3),
(36, 13, 4),
(37, 13, 5),
(38, 13, 6),
(39, 13, 7),
(40, 13, 8),
(41, 13, 9),
(42, 13, 10),
(43, 13, 11),
(44, 13, 12),
(45, 13, 13),
(46, 13, 14),
(47, 13, 15),
(48, 13, 16),
(49, 13, 17),
(50, 13, 18),
(51, 13, 19),
(52, 13, 20),
(53, 13, 21),
(54, 13, 22),
(55, 13, 23),
(56, 13, 24),
(57, 13, 25),
(58, 13, 26),
(59, 13, 27),
(60, 13, 28),
(61, 13, 29),
(62, 13, 30),
(63, 13, 31),
(64, 13, 32),
(65, 14, 1),
(66, 14, 2),
(67, 14, 3),
(68, 14, 4),
(69, 14, 5),
(70, 14, 6),
(71, 14, 7),
(72, 14, 8),
(73, 14, 9),
(74, 14, 10),
(75, 14, 11),
(76, 14, 12),
(77, 14, 13),
(78, 14, 14),
(79, 14, 15),
(80, 14, 16),
(81, 14, 17),
(82, 14, 18),
(83, 14, 19),
(84, 14, 20),
(85, 14, 21),
(86, 14, 22),
(87, 14, 23),
(88, 14, 24),
(89, 14, 25),
(90, 14, 26),
(91, 14, 27),
(92, 14, 28),
(93, 14, 29),
(94, 14, 30),
(95, 14, 31),
(96, 14, 32),
(97, 14, 33),
(98, 14, 34),
(99, 14, 35),
(100, 14, 36),
(101, 14, 37),
(102, 14, 38),
(103, 14, 39),
(104, 14, 40),
(105, 14, 41),
(106, 14, 42),
(107, 14, 43),
(108, 14, 44),
(109, 14, 45),
(110, 14, 46),
(111, 14, 47),
(112, 14, 48),
(113, 14, 49),
(114, 14, 50),
(115, 14, 51),
(116, 14, 52),
(117, 15, 1),
(118, 15, 2),
(119, 15, 3),
(120, 15, 4),
(121, 15, 5),
(122, 15, 6),
(123, 15, 7),
(124, 15, 8),
(125, 15, 9),
(126, 15, 10),
(127, 15, 11),
(128, 15, 12),
(129, 16, 1),
(130, 16, 2),
(131, 16, 3),
(132, 16, 4),
(133, 16, 5),
(134, 16, 6),
(135, 16, 7),
(136, 16, 8),
(137, 16, 9),
(138, 16, 10),
(139, 16, 11),
(140, 16, 12),
(141, 16, 13),
(142, 16, 14),
(143, 16, 15),
(144, 16, 16),
(145, 17, 1),
(146, 17, 2),
(147, 17, 3),
(148, 17, 4),
(149, 17, 5),
(150, 17, 6),
(151, 17, 7),
(152, 17, 8),
(153, 17, 9),
(154, 17, 10),
(155, 17, 11),
(156, 17, 12),
(157, 17, 13),
(158, 17, 14),
(159, 17, 15),
(160, 17, 16),
(161, 17, 17),
(162, 17, 18),
(163, 17, 19),
(164, 17, 20),
(165, 17, 21),
(166, 17, 22),
(167, 17, 23),
(168, 17, 24),
(169, 18, 1),
(170, 18, 2),
(171, 18, 3),
(172, 18, 4),
(173, 18, 5),
(174, 18, 6),
(175, 18, 7),
(176, 18, 8),
(177, 18, 9),
(178, 18, 10),
(179, 18, 11),
(180, 18, 12),
(181, 18, 13),
(182, 18, 14),
(183, 18, 15),
(184, 18, 16),
(185, 18, 17),
(186, 18, 18),
(187, 18, 19),
(188, 18, 20),
(189, 18, 21),
(190, 18, 22),
(191, 18, 23),
(192, 18, 24),
(193, 18, 25),
(194, 18, 26),
(195, 18, 27),
(196, 18, 28),
(197, 18, 29),
(198, 18, 30),
(199, 18, 31),
(200, 18, 32),
(201, 18, 33),
(202, 18, 34),
(203, 18, 35),
(204, 18, 36),
(205, 18, 37),
(206, 18, 38),
(207, 18, 39),
(208, 18, 40),
(209, 18, 41),
(210, 18, 42),
(211, 18, 43),
(212, 18, 44),
(213, 19, 1),
(214, 19, 2),
(215, 19, 3),
(216, 19, 4),
(217, 19, 5),
(218, 19, 6),
(219, 19, 7),
(220, 19, 8),
(221, 19, 9),
(222, 19, 10),
(223, 19, 11),
(224, 19, 12),
(225, 19, 13),
(226, 19, 14),
(227, 19, 15),
(228, 19, 16),
(229, 19, 17),
(230, 19, 18),
(231, 19, 19),
(232, 19, 20),
(233, 19, 21),
(234, 19, 22),
(235, 19, 23),
(236, 19, 24);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_seat`
--

CREATE TABLE `ticket_seat` (
  `ticket_id` bigint(20) NOT NULL,
  `departure_date` date NOT NULL,
  `create_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `traveller`
--

CREATE TABLE `traveller` (
  `traveller_id` bigint(20) NOT NULL,
  `traveller_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender_id` int(20) NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `phone_no` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traveller`
--

INSERT INTO `traveller` (`traveller_id`, `traveller_name`, `gender_id`, `email`, `phone_no`) VALUES
(11, 'fdf', 3, 'ee@g', 'dfd'),
(12, 'fdf', 3, 'ee@g', 'dfd'),
(13, 'Kyaw', 1, 'kyaw@gmail.com', '09432432423'),
(14, '22', 2, 'fdfdsf@fsef', 'dfd'),
(15, 'afdsf', 5, 'fdfdsf@fsef', 'fdf'),
(16, 'afdsf', 5, 'fdfdsf@fsef', 'fdf'),
(17, 'afdsf', 5, 'fdfdsf@fsef', 'fdf'),
(18, 'fdf', 4, 'kyaw@gmail.com', '09432432423'),
(19, '22', 5, 'fdfdsf@fsef', '222'),
(20, '22', 3, 'kyaw@gmail.com', '09432432423'),
(21, 'Kyaw', 3, 'kyaw@gmail.com', '222'),
(22, 'Kyaw', 3, 'kyaw@gmail.com', '222'),
(23, 'Kyaw', 3, 'kyaw@gmail.com', '222'),
(24, 'Kyaw', 3, 'kyaw@gmail.com', '222'),
(25, 'Kyaw', 3, 'kyaw@gmail.com', '222'),
(26, 'Kyaw', 3, 'kyaw@gmail.com', '222'),
(27, 'gfdgfdg', 4, 'gfdg@g', 'fsdf'),
(28, 'Heelo', 2, 'http@gma', '09778643700'),
(29, 'fdf', 3, 'fdfdsf@fsef', 'dsadsad'),
(30, '22', 5, 'kyaw@gmail.com', '09432432423'),
(31, '22', 3, 'fdfdsf@fsef', '09432432423'),
(32, '22', 4, 'kyaw@gmail.com', '222'),
(33, 'fdf', 3, 'kyaw@gmail.com', 'dfd');

-- --------------------------------------------------------

--
-- Table structure for table `traveller_gender`
--

CREATE TABLE `traveller_gender` (
  `g_id` int(11) NOT NULL,
  `g_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `group_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `traveller_gender`
--

INSERT INTO `traveller_gender` (`g_id`, `g_name`, `group_status`) VALUES
(1, 'Male', 0),
(2, 'Female', 0),
(3, 'Male Group', 1),
(4, 'Femal Group', 1),
(5, 'Mixed Group', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `booking_traveller_id` (`traveller_id`);

--
-- Indexes for table `booking_detail`
--
ALTER TABLE `booking_detail`
  ADD PRIMARY KEY (`bd_id`),
  ADD UNIQUE KEY `ticket_id` (`ticket_id`,`departure_date`),
  ADD KEY `booking_detail_booking_id` (`booking_id`);

--
-- Indexes for table `booking_status`
--
ALTER TABLE `booking_status`
  ADD PRIMARY KEY (`bs_id`);

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
-- Indexes for table `route_detail`
--
ALTER TABLE `route_detail`
  ADD UNIQUE KEY `route_id` (`route_id`,`location`,`city_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `schedule_id` (`schedule_id`);

--
-- Indexes for table `ticket_seat`
--
ALTER TABLE `ticket_seat`
  ADD UNIQUE KEY `ticket_id` (`ticket_id`,`departure_date`),
  ADD KEY `departure_date` (`departure_date`);

--
-- Indexes for table `traveller`
--
ALTER TABLE `traveller`
  ADD PRIMARY KEY (`traveller_id`),
  ADD KEY `traveller_gender_id` (`gender_id`);

--
-- Indexes for table `traveller_gender`
--
ALTER TABLE `traveller_gender`
  ADD PRIMARY KEY (`g_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `booking_detail`
--
ALTER TABLE `booking_detail`
  MODIFY `bd_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `booking_status`
--
ALTER TABLE `booking_status`
  MODIFY `bs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `bus_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `bus_operator`
--
ALTER TABLE `bus_operator`
  MODIFY `bus_operator_id` bigint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `c_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `r_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `s_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `t_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `traveller`
--
ALTER TABLE `traveller`
  MODIFY `traveller_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `traveller_gender`
--
ALTER TABLE `traveller_gender`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_traveller_id` FOREIGN KEY (`traveller_id`) REFERENCES `traveller` (`traveller_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `booking_detail`
--
ALTER TABLE `booking_detail`
  ADD CONSTRAINT `booking_detail_booking_id` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_detail_ticket_id` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`t_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_seat`
--
ALTER TABLE `ticket_seat`
  ADD CONSTRAINT `ticket_seat_ticket_id` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`t_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `traveller`
--
ALTER TABLE `traveller`
  ADD CONSTRAINT `traveller_gender_id` FOREIGN KEY (`gender_id`) REFERENCES `traveller_gender` (`g_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
