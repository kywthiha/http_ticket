-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2020 at 03:10 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

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
(9, '2020-01-29', 33, NULL, 1, '2020-01-27 11:19:54'),
(10, '2020-01-29', 34, '7', 1, '2020-01-27 20:07:00'),
(11, '2020-01-29', 35, NULL, 1, '2020-01-27 20:38:58'),
(12, '2020-01-29', 36, '7', 1, '2020-01-28 04:01:34'),
(13, '2020-01-29', 37, NULL, 1, '2020-01-28 12:11:13'),
(14, '2020-01-29', 38, NULL, 1, '2020-01-28 12:20:08'),
(15, '2020-01-29', 39, NULL, 1, '2020-01-28 12:23:27'),
(17, '2020-01-29', 40, NULL, 1, '2020-01-28 13:48:29'),
(18, '2020-01-29', 41, NULL, 1, '2020-01-28 13:56:00'),
(19, '2020-01-29', 42, '17', 1, '2020-01-28 15:24:53'),
(20, '2020-01-29', NULL, NULL, 0, '2020-01-28 15:46:56'),
(21, '2020-01-29', 43, NULL, 1, '2020-01-28 15:50:20');

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
(1, 461, 19, '2020-01-29'),
(2, 462, 19, '2020-01-29'),
(3, 466, 19, '2020-01-29'),
(4, 467, 19, '2020-01-29'),
(5, 586, 20, '2020-01-29'),
(6, 587, 20, '2020-01-29'),
(7, 591, 20, '2020-01-29'),
(8, 592, 20, '2020-01-29'),
(9, 596, 20, '2020-01-29'),
(10, 597, 21, '2020-01-29'),
(11, 601, 21, '2020-01-29'),
(12, 602, 21, '2020-01-29'),
(13, 606, 21, '2020-01-29'),
(14, 607, 21, '2020-01-29');

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
(20, 5, 45, 'Standard'),
(21, 7, 12, 'VIP'),
(22, 6, 45, 'Standard'),
(23, 8, 16, 'VIP'),
(24, 9, 16, 'Standard'),
(25, 10, 44, 'VIP'),
(26, 11, 28, 'Standard'),
(27, 12, 36, 'Standard'),
(28, 13, 12, 'VIP'),
(29, 14, 36, 'Standard'),
(30, 15, 18, 'VIP');

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
(33, 'Kyauk Padaung'),
(34, 'Meiktila'),
(35, 'Kalaw'),
(36, 'Sagaing'),
(37, 'Myin Mu'),
(38, 'Chaung U');

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
(27, 'Pakokku - Yangon'),
(30, 'Yangon-Pakokku'),
(31, 'Bago-Aung Lan'),
(32, 'Aung Lan-Bago'),
(33, 'Pakokku-Chauk'),
(34, 'Chauk-Pakokku'),
(36, 'Magway-Aung Pan'),
(37, 'Aung Pan-Magway'),
(38, 'Mandalay-Momywa'),
(39, 'Monywa-Mandalay'),
(40, 'Kamma-Bagan/Nyaung Oo'),
(42, 'Bagan/Nyaung Oo-Kamma');

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
(27, 1, 11),
(27, 2, 13),
(27, 4, 12),
(30, 1, 12),
(30, 2, 33),
(30, 3, 13),
(30, 4, 11),
(31, 1, 17),
(31, 2, 14),
(32, 1, 14),
(32, 2, 17),
(33, 1, 11),
(33, 2, 21),
(34, 1, 21),
(34, 2, 11),
(36, 1, 28),
(36, 2, 34),
(36, 3, 35),
(36, 4, 15),
(37, 1, 15),
(37, 2, 34),
(37, 3, 35),
(37, 4, 28),
(38, 1, 27),
(38, 2, 36),
(38, 3, 37),
(38, 4, 38),
(38, 5, 30),
(39, 1, 30),
(39, 2, 38),
(39, 3, 37),
(39, 4, 36),
(39, 5, 27),
(40, 1, 29),
(40, 2, 11),
(40, 3, 13),
(42, 1, 13),
(42, 2, 11),
(42, 3, 29);

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
(24, 27, 20, '05:30:00', '18:30:00', 11000),
(25, 27, 22, '18:30:00', '05:00:00', 11000),
(26, 27, 25, '13:00:00', '02:30:00', 12000),
(27, 30, 29, '05:30:00', '18:30:00', 11000),
(28, 30, 25, '16:00:00', '04:30:00', 12000),
(29, 30, 29, '12:30:00', '01:30:00', 11000),
(30, 31, 28, '08:00:00', '13:30:00', 5000),
(31, 31, 26, '16:00:00', '21:30:00', 5000),
(32, 31, 24, '14:30:00', '19:00:00', 5000);

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
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
                         `id` bigint(20) NOT NULL,
                         `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
                         `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
                         `role` enum('admin','standard','operator','') COLLATE utf8_unicode_ci NOT NULL,
                         `operator_id` bigint(20) DEFAULT NULL,
                         `staff_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(416, 24, 1),
(417, 24, 2),
(418, 24, 3),
(419, 24, 4),
(420, 24, 5),
(421, 24, 6),
(422, 24, 7),
(423, 24, 8),
(424, 24, 9),
(425, 24, 10),
(426, 24, 11),
(427, 24, 12),
(428, 24, 13),
(429, 24, 14),
(430, 24, 15),
(431, 24, 16),
(432, 24, 17),
(433, 24, 18),
(434, 24, 19),
(435, 24, 20),
(436, 24, 21),
(437, 24, 22),
(438, 24, 23),
(439, 24, 24),
(440, 24, 25),
(441, 24, 26),
(442, 24, 27),
(443, 24, 28),
(444, 24, 29),
(445, 24, 30),
(446, 24, 31),
(447, 24, 32),
(448, 24, 33),
(449, 24, 34),
(450, 24, 35),
(451, 24, 36),
(452, 24, 37),
(453, 24, 38),
(454, 24, 39),
(455, 24, 40),
(456, 24, 41),
(457, 24, 42),
(458, 24, 43),
(459, 24, 44),
(460, 24, 45),
(461, 25, 1),
(462, 25, 2),
(463, 25, 3),
(464, 25, 4),
(465, 25, 5),
(466, 25, 6),
(467, 25, 7),
(468, 25, 8),
(469, 25, 9),
(470, 25, 10),
(471, 25, 11),
(472, 25, 12),
(473, 25, 13),
(474, 25, 14),
(475, 25, 15),
(476, 25, 16),
(477, 25, 17),
(478, 25, 18),
(479, 25, 19),
(480, 25, 20),
(481, 25, 21),
(482, 25, 22),
(483, 25, 23),
(484, 25, 24),
(485, 25, 25),
(486, 25, 26),
(487, 25, 27),
(488, 25, 28),
(489, 25, 29),
(490, 25, 30),
(491, 25, 31),
(492, 25, 32),
(493, 25, 33),
(494, 25, 34),
(495, 25, 35),
(496, 25, 36),
(497, 25, 37),
(498, 25, 38),
(499, 25, 39),
(500, 25, 40),
(501, 25, 41),
(502, 25, 42),
(503, 25, 43),
(504, 25, 44),
(505, 25, 45),
(506, 26, 1),
(507, 26, 2),
(508, 26, 3),
(509, 26, 4),
(510, 26, 5),
(511, 26, 6),
(512, 26, 7),
(513, 26, 8),
(514, 26, 9),
(515, 26, 10),
(516, 26, 11),
(517, 26, 12),
(518, 26, 13),
(519, 26, 14),
(520, 26, 15),
(521, 26, 16),
(522, 26, 17),
(523, 26, 18),
(524, 26, 19),
(525, 26, 20),
(526, 26, 21),
(527, 26, 22),
(528, 26, 23),
(529, 26, 24),
(530, 26, 25),
(531, 26, 26),
(532, 26, 27),
(533, 26, 28),
(534, 26, 29),
(535, 26, 30),
(536, 26, 31),
(537, 26, 32),
(538, 26, 33),
(539, 26, 34),
(540, 26, 35),
(541, 26, 36),
(542, 26, 37),
(543, 26, 38),
(544, 26, 39),
(545, 26, 40),
(546, 26, 41),
(547, 26, 42),
(548, 26, 43),
(549, 26, 44),
(550, 27, 1),
(551, 27, 2),
(552, 27, 3),
(553, 27, 4),
(554, 27, 5),
(555, 27, 6),
(556, 27, 7),
(557, 27, 8),
(558, 27, 9),
(559, 27, 10),
(560, 27, 11),
(561, 27, 12),
(562, 27, 13),
(563, 27, 14),
(564, 27, 15),
(565, 27, 16),
(566, 27, 17),
(567, 27, 18),
(568, 27, 19),
(569, 27, 20),
(570, 27, 21),
(571, 27, 22),
(572, 27, 23),
(573, 27, 24),
(574, 27, 25),
(575, 27, 26),
(576, 27, 27),
(577, 27, 28),
(578, 27, 29),
(579, 27, 30),
(580, 27, 31),
(581, 27, 32),
(582, 27, 33),
(583, 27, 34),
(584, 27, 35),
(585, 27, 36),
(586, 28, 1),
(587, 28, 2),
(588, 28, 3),
(589, 28, 4),
(590, 28, 5),
(591, 28, 6),
(592, 28, 7),
(593, 28, 8),
(594, 28, 9),
(595, 28, 10),
(596, 28, 11),
(597, 28, 12),
(598, 28, 13),
(599, 28, 14),
(600, 28, 15),
(601, 28, 16),
(602, 28, 17),
(603, 28, 18),
(604, 28, 19),
(605, 28, 20),
(606, 28, 21),
(607, 28, 22),
(608, 28, 23),
(609, 28, 24),
(610, 28, 25),
(611, 28, 26),
(612, 28, 27),
(613, 28, 28),
(614, 28, 29),
(615, 28, 30),
(616, 28, 31),
(617, 28, 32),
(618, 28, 33),
(619, 28, 34),
(620, 28, 35),
(621, 28, 36),
(622, 28, 37),
(623, 28, 38),
(624, 28, 39),
(625, 28, 40),
(626, 28, 41),
(627, 28, 42),
(628, 28, 43),
(629, 28, 44),
(630, 29, 1),
(631, 29, 2),
(632, 29, 3),
(633, 29, 4),
(634, 29, 5),
(635, 29, 6),
(636, 29, 7),
(637, 29, 8),
(638, 29, 9),
(639, 29, 10),
(640, 29, 11),
(641, 29, 12),
(642, 29, 13),
(643, 29, 14),
(644, 29, 15),
(645, 29, 16),
(646, 29, 17),
(647, 29, 18),
(648, 29, 19),
(649, 29, 20),
(650, 29, 21),
(651, 29, 22),
(652, 29, 23),
(653, 29, 24),
(654, 29, 25),
(655, 29, 26),
(656, 29, 27),
(657, 29, 28),
(658, 29, 29),
(659, 29, 30),
(660, 29, 31),
(661, 29, 32),
(662, 29, 33),
(663, 29, 34),
(664, 29, 35),
(665, 29, 36),
(666, 30, 1),
(667, 30, 2),
(668, 30, 3),
(669, 30, 4),
(670, 30, 5),
(671, 30, 6),
(672, 30, 7),
(673, 30, 8),
(674, 30, 9),
(675, 30, 10),
(676, 30, 11),
(677, 30, 12),
(678, 31, 1),
(679, 31, 2),
(680, 31, 3),
(681, 31, 4),
(682, 31, 5),
(683, 31, 6),
(684, 31, 7),
(685, 31, 8),
(686, 31, 9),
(687, 31, 10),
(688, 31, 11),
(689, 31, 12),
(690, 31, 13),
(691, 31, 14),
(692, 31, 15),
(693, 31, 16),
(694, 31, 17),
(695, 31, 18),
(696, 31, 19),
(697, 31, 20),
(698, 31, 21),
(699, 31, 22),
(700, 31, 23),
(701, 31, 24),
(702, 31, 25),
(703, 31, 26),
(704, 31, 27),
(705, 31, 28),
(706, 32, 1),
(707, 32, 2),
(708, 32, 3),
(709, 32, 4),
(710, 32, 5),
(711, 32, 6),
(712, 32, 7),
(713, 32, 8),
(714, 32, 9),
(715, 32, 10),
(716, 32, 11),
(717, 32, 12),
(718, 32, 13),
(719, 32, 14),
(720, 32, 15),
(721, 32, 16);

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
(33, 'fdf', 3, 'kyaw@gmail.com', 'dfd'),
(34, 'gfdgfdg', 4, 'kyaw@gmail.com', 'fsdfs'),
(35, 'Kyaw Thi Ha', 3, 'kyawthi547@gmail.com', '09778673750'),
(36, 'HELLO', 3, 'fdfsdfsd@gmaico', '09432432423'),
(37, 'Kyaw', 1, 'kyaw@gmail.com', '89478934'),
(38, 'dhtyky', 3, 'fjiho@gmail.com', '0987468570'),
(39, 'hlbhi', 5, 'vhulo@gmail.com', '0999786865'),
(40, 'erg;sp', 4, 'gy@gmail.com', '90457606768'),
(41, 'rhbwoyh', 4, 'geu@gmail.com', '9846565768'),
(42, 'fuyui', 4, 'ghj@gmail.com', '099788677678'),
(43, 'fyuoi', 4, 'tfyi@gmail.com', '786573555347');

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
    ADD PRIMARY KEY (`bus_id`),
    ADD KEY `bus_bus_operator_id` (`bus_operator_id`);

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
    ADD PRIMARY KEY (`s_id`),
    ADD KEY `schedule_route_id` (`route_id`),
    ADD KEY `schedule_bus_id` (`bus_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `name` (`name`),
    ADD KEY `staff_operator_id` (`operator_id`),
    ADD KEY `staff_staff_id` (`staff_id`);

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
    MODIFY `booking_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `booking_detail`
--
ALTER TABLE `booking_detail`
    MODIFY `bd_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `booking_status`
--
ALTER TABLE `booking_status`
    MODIFY `bs_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
    MODIFY `bus_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `bus_operator`
--
ALTER TABLE `bus_operator`
    MODIFY `bus_operator_id` bigint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
    MODIFY `c_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
    MODIFY `r_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
    MODIFY `s_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
    MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
    MODIFY `t_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=722;

--
-- AUTO_INCREMENT for table `traveller`
--
ALTER TABLE `traveller`
    MODIFY `traveller_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

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
-- Constraints for table `bus`
--
ALTER TABLE `bus`
    ADD CONSTRAINT `bus_bus_operator_id` FOREIGN KEY (`bus_operator_id`) REFERENCES `bus_operator` (`bus_operator_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `route_detail`
--
ALTER TABLE `route_detail`
    ADD CONSTRAINT `route_detail_city_id` FOREIGN KEY (`city_id`) REFERENCES `city` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `route_detail_route_id` FOREIGN KEY (`route_id`) REFERENCES `route` (`r_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
    ADD CONSTRAINT `schedule_bus_id` FOREIGN KEY (`bus_id`) REFERENCES `bus` (`bus_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `schedule_route_id` FOREIGN KEY (`route_id`) REFERENCES `route` (`r_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
    ADD CONSTRAINT `staff_operator_id` FOREIGN KEY (`operator_id`) REFERENCES `bus_operator` (`bus_operator_id`) ON DELETE CASCADE ON UPDATE CASCADE,
    ADD CONSTRAINT `staff_staff_id` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
    ADD CONSTRAINT `ticket_schedule_id` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
