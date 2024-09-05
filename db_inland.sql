create database db_inland;
-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 05:06 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inland`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `resortid` int(200) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file_description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No Description',
  `uploaded_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `resortid`, `file_name`, `file_description`, `uploaded_on`, `status`) VALUES
(59, 3, 'jmaire-01.jpg', 'Pool', '2022-09-27 12:20:21', '1'),
(57, 3, 'jmaire-05.jpg', 'Pavilion', '2022-09-27 13:03:43', '1'),
(53, 1, 'doms-1.jpg', '', '2022-08-30 19:20:45', '1'),
(54, 1, 'doms-5.jpg', '', '2022-08-30 19:21:37', '1'),
(55, 1, 'doms-7.jpg', '', '2022-08-30 19:24:16', '1'),
(60, 2, 't-1.jpg', '', '2022-08-30 19:32:15', '1'),
(61, 2, 't-5.jpg', '', '2022-08-30 19:32:26', '1'),
(62, 4, 'r-1.jpg', '', '2022-08-30 19:33:17', '1'),
(63, 4, 'r-2.jpg', '', '2022-08-30 19:33:26', '1'),
(71, 1, 'doms-4.jpg', '', '2022-09-01 15:15:18', '1'),
(72, 1, 'doms-8.jpg', '', '2022-09-01 15:15:18', '1'),
(73, 12, '1669825818838.jpg', 'JEPAC Pool and Slides', '2022-11-21 12:05:42', '1'),
(74, 12, '1669825829403.jpg', 'JEPAC Activities', '2022-11-21 12:05:59', '1'),
(85, 11, '1669827088165.jpg', 'No Description', '2022-11-21 08:53:39', '1'),
(86, 13, '1670769762813.jpg', 'No Description', '2022-11-22 09:49:52', '1'),
(78, 5, '1669827130540.jpg', 'No Description', '2022-11-21 12:16:21', '1'),
(79, 5, '1669827142486.jpg', 'No Description', '2022-11-21 12:16:21', '1'),
(80, 5, '1669827148569.jpg', 'No Description', '2022-11-21 12:16:21', '1'),
(87, 13, '1670769768751.jpg', 'No Description', '2022-11-22 09:49:52', '1'),
(83, 3, 'jmaire-03.jpg', 'No Description', '2022-11-21 08:10:43', '1'),
(88, 13, '1670769773006.jpg', 'No Description', '2022-11-22 09:49:52', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_add_on_amenities`
--

CREATE TABLE `tb_add_on_amenities` (
  `add_on_amenity_id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `amenity_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amenity_fee` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_add_on_amenities`
--

INSERT INTO `tb_add_on_amenities` (`add_on_amenity_id`, `po_id`, `amenity_id`, `quantity`, `total_amenity_fee`) VALUES
(4, 11, 2, 1, 90);

-- --------------------------------------------------------

--
-- Table structure for table `tb_add_on_details`
--

CREATE TABLE `tb_add_on_details` (
  `add_on_details_id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `resort_room_id` int(11) NOT NULL,
  `num_adults` int(11) NOT NULL,
  `adult_fee` int(11) NOT NULL,
  `num_kids` int(11) NOT NULL,
  `kids_fee` int(11) NOT NULL,
  `total_fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_add_on_details`
--

INSERT INTO `tb_add_on_details` (`add_on_details_id`, `po_id`, `resort_room_id`, `num_adults`, `adult_fee`, `num_kids`, `kids_fee`, `total_fee`) VALUES
(13, 9, 3, 4, 320, 3, 150, 869),
(16, 9, 2, 2, 160, 1, 50, 2109),
(21, 13, 5, 2, 160, 5, 250, 2609),
(23, 16, 2, 12, 960, 1, 50, 2909),
(24, 11, 2, 3, 240, 4, 200, 2339);

-- --------------------------------------------------------

--
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `cart_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `resortid` int(11) NOT NULL,
  `resort_room_id` int(11) NOT NULL,
  `checkindate` date NOT NULL,
  `checkoutdate` date NOT NULL,
  `num_adults` int(11) NOT NULL,
  `num_kids` int(11) NOT NULL,
  `cart_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_cart`
--

INSERT INTO `tb_cart` (`cart_id`, `guest_id`, `resortid`, `resort_room_id`, `checkindate`, `checkoutdate`, `num_adults`, `num_kids`, `cart_status`) VALUES
(1, 1, 1, 2, '2022-12-31', '2022-12-31', 1, 2, 'Place Order'),
(2, 1, 2, 4, '2022-12-25', '2022-12-25', 2, 3, 'Place Order'),
(5, 1, 3, 6, '2022-12-28', '2022-12-28', 2, 3, 'Place Order'),
(6, 11, 1, 5, '2022-12-21', '2022-12-21', 3, 5, 'Place Order'),
(9, 1, 3, 8, '2022-12-22', '2022-12-22', 4, 2, 'Place Order'),
(10, 1, 3, 11, '2022-12-23', '2022-12-23', 5, 2, 'Place Order'),
(11, 1, 3, 8, '2022-12-24', '2022-12-24', 5, 1, 'Place Order'),
(12, 1, 3, 11, '2022-12-30', '2022-12-30', 2, 2, 'Place Order'),
(13, 1, 1, 1, '2022-12-27', '2022-12-27', 2, 3, 'Place Order'),
(14, 1, 1, 1, '2022-12-18', '2022-12-18', 5, 2, 'Place Order'),
(15, 1, 2, 4, '2022-11-18', '2022-11-18', 7, 4, 'Place Order'),
(17, 1, 3, 6, '2022-12-18', '2022-12-18', 5, 4, 'Place Order'),
(18, 11, 3, 8, '2022-12-17', '2022-12-18', 4, 2, ''),
(19, 11, 2, 4, '2022-12-26', '2022-12-27', 3, 1, ''),
(20, 1, 1, 1, '2022-12-19', '2022-12-19', 5, 2, 'Place Order'),
(21, 1, 3, 8, '2022-12-18', '2022-12-19', 6, 7, 'Place Order'),
(22, 1, 1, 1, '2022-12-22', '2022-12-23', 3, 4, 'Place Order');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guest`
--

CREATE TABLE `tb_guest` (
  `guest_id` int(11) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `MiddleName` varchar(30) NOT NULL,
  `ContactNo` varchar(15) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_guest`
--

INSERT INTO `tb_guest` (`guest_id`, `LastName`, `FirstName`, `MiddleName`, `ContactNo`, `Address`, `Username`, `Password`, `status`) VALUES
(1, 'Segura', 'Jay R', 'L.', '09877655432', 'Lambunao, Iloilo Philippines', 'jayr', 'jayr', 'Offline now'),
(11, 'EL', 'Emman', 'S.', '0929138344', 'Lambunao, Iloilo Philippines', 'emman', 'emman', 'Offline now'),
(12, 'Lavente', 'Jasper', 'A.', '0939248344', 'Lambunao, Iloilo Philippines', 'jasper', 'jasper', ''),
(13, 'New', 'New First', 'Jeffrey', '0972374445', 'Cunarom Lambunao, Iloilo', 'jeffrey', 'jeffrey', 'Active now'),
(14, 'Lavente', 'Jasper', 'A', '0992832744', 'Capangyan Lambunao Iloilo', 'allen', 'allen', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invalid`
--

CREATE TABLE `tb_invalid` (
  `id` int(200) NOT NULL,
  `reportid` int(200) NOT NULL,
  `resortname` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `mun` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `district` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `remarks` varchar(1000) COLLATE latin1_general_ci NOT NULL,
  `idate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_invalid`
--

INSERT INTO `tb_invalid` (`id`, `reportid`, `resortname`, `mun`, `district`, `remarks`, `idate`) VALUES
(6, 12, 'J\'maire Farm', 'LAMBUNAO ', 'THIRD DISTRICT', 'Number of Customer not valid\n', '2022-11-19 21:51:30'),
(7, 14, 'J\'maire Farm', 'LAMBUNAO ', 'THIRD DISTRICT', 'Please Check your Records\n', '2022-11-01 14:15:09'),
(10, 15, 'J\'maire Farm', 'LAMBUNAO ', 'THIRD DISTRICT', 'Unable', '2022-11-01 18:41:14'),
(11, 15, 'J\'maire Farm', 'LAMBUNAO ', 'THIRD DISTRICT', 'Unable', '2022-11-01 18:42:13'),
(12, 15, 'J\'maire Farm', 'LAMBUNAO ', 'THIRD DISTRICT', 'Unable', '2022-11-01 18:43:08'),
(13, 15, 'J\'maire Farm', 'LAMBUNAO ', 'THIRD DISTRICT', 'Please Check', '2022-11-01 18:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `tb_location`
--

CREATE TABLE `tb_location` (
  `location_id` int(11) NOT NULL,
  `resortid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `lon` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_location`
--

INSERT INTO `tb_location` (`location_id`, `resortid`, `name`, `lat`, `lon`, `address`) VALUES
(1, 5, 'Gines Garden Resort', '11.0891', '122.5446', 'Gines Garden Resort\r\nBrgy. Gines Lambunao Iloilo'),
(2, 4, 'Riverside Beach Resort', '10.6869', '122.4483', 'Riverside Beach Resort\r\nOton Iloilo\r\n'),
(3, 3, 'J\'maire Farm', '11.0743', '122.5238', 'J\'maire Farm\r\nSibaguan Lambunao, Iloilo'),
(5, 12, 'Jade Energetic Paradise Adventure Corp.', '10.9922', '122.5546', 'Jade Energetic Paradise Adventure Corp.\r\nCabayugan Badiangan, Iloilo'),
(6, 2, 'Turogban Inland Resort', '11.0285', '122.5454', 'Turogban Inland Resort\r\nBinaba-an Labayno Lambunao, Iloilo'),
(7, 1, 'Papa Doms Inland Resort', '11.0690', '122.5055', 'Papa Doms Inland Resort\r\nBrgy. Maite Grande Lambunao Iloilo');

-- --------------------------------------------------------

--
-- Table structure for table `tb_municipal`
--

CREATE TABLE `tb_municipal` (
  `adminid` int(200) NOT NULL,
  `username` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(20) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_municipal`
--

INSERT INTO `tb_municipal` (`adminid`, `username`, `password`, `status`) VALUES
(1, 'admin', 'admin', 'Offline now');

-- --------------------------------------------------------

--
-- Table structure for table `tb_municipality`
--

CREATE TABLE `tb_municipality` (
  `id` int(200) NOT NULL,
  `mun` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `district` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_municipality`
--

INSERT INTO `tb_municipality` (`id`, `mun`, `district`, `username`, `password`, `status`) VALUES
(1, 'OTON', 'FIRST DISTRICT', 'OTON', 'OTON', 'Offline now'),
(2, 'TIGBAUAN', 'FIRST DISTRICT', 'TIGBAUAN', 'TIGBAUAN', ''),
(3, 'GUIMBAL', 'FIRST DISTRICT', 'GUIMBAL', 'GUIMBAL', 'Offline now'),
(4, 'TUBUNGAN', 'FIRST DISTRICT', 'TUBUNGAN', 'TUBUNGAN', ''),
(5, 'IGBARAS', 'FIRST DISTRICT', 'IGBARAS', 'IGBARAS', ''),
(6, 'MIAGAO', 'FIRST DISTRICT', 'MIAGAO', 'MIAGAO', ''),
(7, 'SAN JOAQUIN  ', 'FIRST DISTRICT', 'SANJOAQUIN', 'SANJOAQUIN', ''),
(8, 'SAN MIGUEL', 'SECOND DISTRICT', 'SANMIGUEL', 'SANMIGUEL', ''),
(9, 'ALIMODIAN', 'SECOND DISTRICT', 'ALIMODIAN', 'ALIMODIAN', ''),
(10, 'LEON', 'SECOND DISTRICT', 'LEON', 'LEON', ''),
(11, 'PAVIA', 'SECOND DISTRICT', 'PAVIA', 'PAVIA', ''),
(12, 'SANTA BARBARA ', 'SECOND DISTRICT', 'SANTABARBARA ', 'SANTABARBARA ', ''),
(13, 'NEW LUCENA ', 'SECOND DISTRICT', 'NEWLUCENA', 'NEWLUCENA', ''),
(14, 'ZARRAGA', 'SECOND DISTRICT', 'ZARRAGA', 'ZARRAGA', ''),
(15, 'LEGANES ', 'SECOND DISTRICT', 'LEGANES ', 'LEGANES ', ''),
(16, 'CABATUAN', 'THIRD DISTRICT', 'CABATUAN', 'CABATUAN', ''),
(17, 'MAASIN', 'THIRD DISTRICT', 'MAASIN', 'MAASIN', ''),
(18, 'JANIUAY', 'THIRD DISTRICT', 'JANIUAY', 'JANIUAY', ''),
(19, 'BADIANGAN', 'THIRD DISTRICT', 'BADIANGAN', 'BADIANGAN', ''),
(20, 'LAMBUNAO ', 'THIRD DISTRICT', 'LAMBUNAO', 'LAMBUNAO', 'Offline now'),
(21, 'CALINOG', 'THIRD DISTRICT', 'CALINOG', 'CALINOG', ''),
(22, 'BINGAWAN', 'THIRD DISTRICT', 'BINGAWAN', 'BINGAWAN', ''),
(23, 'MINA', 'THIRD DISTRICT', 'MINA', 'MINA', ''),
(24, 'POTOTAN', 'THIRD DISTRICT', 'POTOTAN', 'POTOTAN', ''),
(25, 'DUMANGAS', 'FOURTH DISTRICT', 'DUMANGAS', 'DUMANGAS', ''),
(26, 'BAROTAC NUEVO ', 'FOURTH DISTRICT', 'BAROTACNUEVO ', 'BAROTACNUEVO ', ''),
(27, 'DINGLE', 'FOURTH DISTRICT', 'DINGLE', 'DINGLE', ''),
(28, 'DUENAS ', 'FOURTH DISTRICT', 'DUENAS ', 'DUENAS ', ''),
(29, 'PASSI CITY ', 'FOURTH DISTRICT', 'PASSI', 'PASSI', ''),
(30, 'SAN ENRIQUE ', 'FOURTH DISTRICT', 'SANENRIQUE', 'SANENRIQUE', ''),
(31, 'BANATE', 'FOURTH DISTRICT', '', '', ''),
(32, 'BAROTAC VIEJO ', 'FIFTH DISTRICT', '', '', ''),
(33, 'AJUY', 'FIFTH DISTRICT', '', '', ''),
(34, 'CONCEPCION', 'FIFTH DISTRICT', '', '', ''),
(35, 'SAN DIONISIO ', 'FIFTH DISTRICT', '', '', ''),
(36, 'SARA', 'FIFTH DISTRICT', '', '', ''),
(37, 'LEMERY', 'FIFTH DISTRICT', '', '', ''),
(38, 'BATAD', 'FIFTH DISTRICT', '', '', ''),
(39, 'ESTANCIA', 'FIFTH DISTRICT', '', '', ''),
(40, 'BALASAN', 'FIFTH DISTRICT', '', '', ''),
(41, 'CARLES', 'FIFTH DISTRICT', '', '', ''),
(42, 'ANILAO', 'FIFTH DISTRICT', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_placed_order`
--

CREATE TABLE `tb_placed_order` (
  `po_id` int(11) NOT NULL,
  `cart_id` int(20) NOT NULL,
  `adult_fee` int(20) NOT NULL,
  `kids_fee` int(20) NOT NULL,
  `total_fee` int(20) NOT NULL,
  `discount` double NOT NULL DEFAULT 0,
  `payment_method` varchar(100) NOT NULL,
  `message` varchar(2000) NOT NULL,
  `reservation_status` varchar(30) NOT NULL DEFAULT 'Pending',
  `reject_reason` varchar(1000) NOT NULL DEFAULT 'Contact Resort',
  `ratings` int(5) NOT NULL DEFAULT 0,
  `rating_comment` varchar(1000) NOT NULL DEFAULT 'Customer didn''t write anything.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_placed_order`
--

INSERT INTO `tb_placed_order` (`po_id`, `cart_id`, `adult_fee`, `kids_fee`, `total_fee`, `discount`, `payment_method`, `message`, `reservation_status`, `reject_reason`, `ratings`, `rating_comment`) VALUES
(1, 1, 80, 100, 2079, 0, 'Pay on Site', ' sample', 'Completed', 'Contact Resort', 0, ''),
(2, 2, 240, 210, 749, 0, 'GCASH', ' Hoping to Accept', 'Rejected', 'Unable to Manage Payment on Scheduled Date', 0, ''),
(3, 6, 240, 250, 2689, 0, 'GCASH', ' Hoping for Acceptance', 'Pending', 'Contact Resort', 0, ''),
(4, 9, 240, 70, 1209, 0, 'GCASH', ' Hoping to Accepted', 'Reviewed', 'Contact Resort', 5, 'Rooms are neat and clean. Also, It is a nice place. Staff are very friendly and accommodated. I highly recommend this resort.'),
(5, 10, 300, 70, 1469, 0, 'Pay on Site', 'Thank you in advance', 'Pending', 'Contact Resort', 0, ''),
(7, 11, 300, 35, 1234, 0, 'Pay on Site', ' -------', 'Rejected', 'Contact Resort', 0, 'Customer didn\'t write anything.'),
(8, 12, 120, 70, 1289, 0, 'GCASH', ' Hello', 'Reviewed', 'Contact Resort', 5, 'Staff are well-trained. Facilities are clean and sanitized'),
(9, 13, 160, 150, 1609, 0, 'Pay on Site', ' ', 'Rejected', 'Contact Resort', 5, 'Clean and Fragrant. Well-Trained and Accommodated Staff'),
(10, 15, 840, 280, 1419, 0, 'Pay on Site', ' Daebak', 'Pending', 'Contact Resort', 0, 'Customer didn\'t write anything.'),
(11, 14, 400, 100, 1799, 0, 'GCASH', 'See you soon', 'Reviewed', 'Contact Resort', 5, 'Nice Ambiance'),
(12, 17, 300, 140, 1640, 0, 'Pay on Site', ' See you', 'PaymentApproval', 'Contact Resort', 0, 'Customer didn\'t write anything.'),
(13, 20, 400, 100, 1799, 0, 'Pay on Site', ' ', 'Approved', 'Contact Resort', 0, 'Customer didn\'t write anything.'),
(14, 21, 360, 245, 1504, 0, 'GCASH', ' Anneong', 'Rejected', 'Contact Resort', 0, 'Customer didn\'t write anything.'),
(15, 5, 120, 105, 1425, 0, 'GCASH', ' ', 'Pending', 'Contact Resort', 0, 'Customer didn\'t write anything.'),
(16, 22, 240, 200, 1739, 0, 'GCASH', ' ', 'PaymentApproval', 'Contact Resort', 0, 'Customer didn\'t write anything.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_provincial`
--

CREATE TABLE `tb_provincial` (
  `provid` int(200) NOT NULL,
  `username` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `status` varchar(20) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_provincial`
--

INSERT INTO `tb_provincial` (`provid`, `username`, `password`, `status`) VALUES
(1, 'PROVINCE', 'PROVINCE', 'Offline now');

-- --------------------------------------------------------

--
-- Table structure for table `tb_report`
--

CREATE TABLE `tb_report` (
  `id` int(200) NOT NULL,
  `reportid` int(11) NOT NULL DEFAULT 1000,
  `resortid` int(200) NOT NULL,
  `male_domestic` int(11) DEFAULT 0,
  `female_domestic` int(11) NOT NULL DEFAULT 0,
  `dcx_quan` int(200) NOT NULL,
  `male_foreign` int(11) NOT NULL DEFAULT 0,
  `female_foreign` int(11) NOT NULL DEFAULT 0,
  `fcx_quan` int(200) NOT NULL,
  `total_customer` int(11) NOT NULL,
  `rdate` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `rsales` float(10,2) NOT NULL,
  `rexpenses` float(10,2) NOT NULL,
  `rstatus` varchar(200) COLLATE latin1_general_ci NOT NULL DEFAULT 'Pending',
  `date_validated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_report`
--

INSERT INTO `tb_report` (`id`, `reportid`, `resortid`, `male_domestic`, `female_domestic`, `dcx_quan`, `male_foreign`, `female_foreign`, `fcx_quan`, `total_customer`, `rdate`, `rsales`, `rexpenses`, `rstatus`, `date_validated`) VALUES
(12, 1000, 3, 41, 59, 100, 12, 8, 20, 120, '2022-10-29', 15670.00, 560.00, 'Invalid', '2022-10-29 14:42:44'),
(13, 1000, 3, 23, 27, 50, 6, 5, 11, 61, '2022-10-30', 12340.00, 780.00, 'Validated', '2022-11-01 14:15:29'),
(8, 10, 2, 138, 8, 146, 13, 9, 22, 168, '2022-09-16', 1920.00, 590.00, 'Validated', '2022-11-01 14:02:28'),
(14, 1000, 3, 25, 15, 40, 3, 0, 3, 43, '2022-11-01', 18700.00, 1235.00, 'Invalid', '2022-11-01 14:07:15'),
(15, 1000, 3, 56, 22, 78, 7, 2, 9, 87, '2022-11-02', 20100.00, 2300.00, 'Pending', '2022-11-01 18:44:06'),
(16, 1000, 3, 46, 24, 70, 4, 1, 5, 75, '2022-11-03', 17900.00, 1950.00, 'Validated', '2022-11-01 14:38:17'),
(17, 1000, 3, 1268, 56, 1324, 45, 5, 50, 1374, '2022-12-14', 25600.00, 3468.00, 'Validated', '2022-11-19 21:52:06'),
(18, 1000, 3, 124, 178, 302, 190, 24, 214, 516, '2022-12-13', 35700.00, 12800.00, 'Validated', '2022-11-13 13:51:20'),
(19, 1000, 2, 125, 56, 181, 35, 5, 40, 221, '2022-06-13', 10900.00, 670.00, 'Validated', '2022-11-13 13:56:33'),
(20, 1000, 2, 670, 540, 1210, 70, 35, 105, 1315, '2022-07-13', 45600.00, 10500.00, 'Pending', '2022-11-13 13:53:54'),
(21, 1000, 1, 135, 67, 202, 87, 18, 105, 307, '2021-01-13', 18900.00, 3400.00, 'Validated', '2022-11-13 14:28:18'),
(22, 1000, 1, 560, 350, 910, 98, 27, 125, 1035, '2021-02', 55600.00, 15800.00, 'Pending', '2022-11-23 02:13:55'),
(23, 1000, 1, 135, 78, 213, 46, 22, 68, 281, '2022-11', 56700.00, 22400.00, 'Pending', '2022-11-23 02:14:26'),
(24, 1000, 1, 167, 56, 223, 89, 24, 113, 336, '2022-12', 97800.00, 15400.00, 'Pending', '2022-11-23 02:08:02'),
(25, 1000, 1, 34, 87, 121, 90, 25, 115, 236, '2022-09', 27800.00, 12300.00, 'Pending', '2022-11-23 02:14:16');

-- --------------------------------------------------------

--
-- Table structure for table `tb_resort`
--

CREATE TABLE `tb_resort` (
  resortid int(200) NOT NULL,
  resortname varchar(200) COLLATE latin1_general_ci NOT NULL,
  resortaddress varchar(200) COLLATE latin1_general_ci NOT NULL,
  mun varchar(200) COLLATE latin1_general_ci NOT NULL,
  district varchar(200) COLLATE latin1_general_ci NOT NULL,
  contact_no varchar(200) COLLATE latin1_general_ci NOT NULL,
  username varchar(200) COLLATE latin1_general_ci NOT NULL,
  password varchar(200) COLLATE latin1_general_ci NOT NULL,
  status varchar(15) COLLATE latin1_general_ci NOT NULL,
  isLocated int(11) NOT NULL DEFAULT 0,
  isFeatured int(11) NOT NULL DEFAULT 0,
  isTopItem int(11) NOT NULL DEFAULT 0,
  isBestSeller int(11) NOT NULL DEFAULT 0,
  isPromoDeals int(11) NOT NULL DEFAULT 0,
  isOnSale int(11) NOT NULL DEFAULT 0,
  adultEntranceFee int(20) NOT NULL DEFAULT 0,
  kidsEntranceFee int(20) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_resort`
--

INSERT INTO `tb_resort` (`resortid`, `resortname`, `resortaddress`, `mun`, `district`, `contact_no`, `username`, `password`, `status`, `isLocated`, `isFeatured`, `isTopItem`, `isBestSeller`, `isPromoDeals`, `isOnSale`, `adultEntranceFee`, `kidsEntranceFee`) VALUES
(1, 'Papa Dom\'\'s Resort', 'Maite Pequeno, Lambunao, Iloilo', 'LAMBUNAO', 'THIRD DISTRICT', '09123456789', 'PDOMS', 'PDOMS', 'Offline now', 1, 1, 0, 0, 0, 0, 80, 50),
(2, 'Turogban Inland Resort', 'Tuburan, Lambunao, Iloilo', 'LAMBUNAO', 'THIRD DISTRICT', '09462143875', 'TUROGBAN', 'TUROGBAN', 'Offline now', 1, 0, 0, 0, 1, 0, 120, 70),
(3, 'J\'maire Farm', 'Sibaguan, Lambunao, Iloilo', 'LAMBUNAO ', 'THIRD DISTRICT', '09124365879', 'JMAIRE', 'JMAIRE', 'Offline now', 1, 1, 1, 0, 0, 0, 60, 35),
(4, 'Riverside Beach Resort', 'Oton, Iloilo', 'OTON', 'FIRST DISTRICT', '09123456787', 'RIVERSIDE', 'RIVERSIDE', 'Offline now', 1, 1, 0, 0, 0, 0, 0, 0),
(5, 'Gines Garden Resort', 'Gines Lambunao, Iloilo', 'LAMBUNAO ', 'THIRD DISTRICT', '09866236224', 'GINES', 'GINES', 'Offline now', 1, 0, 0, 0, 0, 0, 1, 1),
(11, 'Damires Hills', 'Janiuay, Iloilo', 'Janiuay', 'THIRD DISTRICT', '09981827333', 'DAMIRES', 'DAMIRES', 'Offline now', 0, 0, 0, 0, 0, 0, 0, 0),
(12, 'Jade Energetic Paradise Adventure Corp.', 'Brgy. Cabayugan Badiangan, Iloilo', 'Badiangan', 'THIRD DISTRICT', '09097372637', 'JADE', 'JADE', 'Offline now', 1, 0, 0, 0, 0, 0, 0, 0),
(13, 'Shamrock Beach Resort', 'Guimbal, Iloilo', 'GUIMBAL', 'FIRST DISTRICT', '0907152558', 'SHAMROCK', 'SHAMROCK', 'Offline now', 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_resort_amenities`
--

CREATE TABLE `tb_resort_amenities` (
  `amenity_id` int(11) NOT NULL,
  `resortid` int(11) NOT NULL,
  `amenity_name` varchar(100) NOT NULL,
  `amenity_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_resort_amenities`
--

INSERT INTO `tb_resort_amenities` (`amenity_id`, `resortid`, `amenity_name`, `amenity_price`) VALUES
(1, 1, 'Pillows', 50),
(2, 1, 'Blanket', 90),
(4, 1, 'Curtain', 30);

-- --------------------------------------------------------

--
-- Table structure for table `tb_resort_report`
--

CREATE TABLE `tb_resort_report` (
  `resort_report_id` int(11) NOT NULL,
  `resortid` int(11) NOT NULL,
  `report_file` varchar(1000) NOT NULL,
  `date_of_submission` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `report_status` varchar(20) NOT NULL DEFAULT 'For Validation'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_resort_report`
--

INSERT INTO `tb_resort_report` (`resort_report_id`, `resortid`, `report_file`, `date_of_submission`, `report_status`) VALUES
(9, 3, 'IRJET-V7I4241 (1).pdf', '2022-09-14 15:58:53', 'Invalid'),
(10, 2, 'Upload.docx', '2022-09-15 05:19:44', 'Validated'),
(11, 2, 'pigs disease.docx', '2022-09-15 05:57:59', 'Validated'),
(12, 3, 'Design_and_Implementation_of_Poultry_Farming_Infor.pdf', '2022-10-29 14:33:05', 'Invalid'),
(13, 4, 'receipt.docx', '2022-10-01 14:33:11', 'For Validation');

-- --------------------------------------------------------

--
-- Table structure for table `tb_resort_room`
--

CREATE TABLE `tb_resort_room` (
  `resort_room_id` int(11) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `room_capacity` int(11) NOT NULL,
  `room_price` double NOT NULL,
  `room_status` varchar(20) NOT NULL,
  `resortid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_resort_room`
--

INSERT INTO `tb_resort_room` (`resort_room_id`, `room_name`, `room_capacity`, `room_price`, `room_status`, `resortid`) VALUES
(1, 'Room 1', 12, 1299, 'Available', 1),
(2, 'AC Room', 10, 1899, 'Not Available', 1),
(3, 'Cottage 1', 5, 399, 'Not Available', 1),
(4, 'Cottage Ilang-Ilang', 4, 299, 'Available', 2),
(5, 'Room 5', 15, 2199, 'Available', 1),
(6, 'Room 201', 5, 1200, 'Available', 3),
(7, 'Room 509', 10, 2999, 'Not Available', 4),
(8, 'Room 202', 3, 899, 'Available', 3),
(9, 'Room 203', 5, 1090, 'Not Available', 3),
(11, 'Room 204', 7, 1099, 'Available', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_add_on_amenities`
--
ALTER TABLE `tb_add_on_amenities`
  ADD PRIMARY KEY (`add_on_amenity_id`);

--
-- Indexes for table `tb_add_on_details`
--
ALTER TABLE `tb_add_on_details`
  ADD PRIMARY KEY (`add_on_details_id`);

--
-- Indexes for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tb_guest`
--
ALTER TABLE `tb_guest`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `tb_invalid`
--
ALTER TABLE `tb_invalid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_location`
--
ALTER TABLE `tb_location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `tb_municipal`
--
ALTER TABLE `tb_municipal`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `tb_municipality`
--
ALTER TABLE `tb_municipality`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_placed_order`
--
ALTER TABLE `tb_placed_order`
  ADD PRIMARY KEY (`po_id`);

--
-- Indexes for table `tb_provincial`
--
ALTER TABLE `tb_provincial`
  ADD PRIMARY KEY (`provid`);

--
-- Indexes for table `tb_report`
--
ALTER TABLE `tb_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_resort`
--
ALTER TABLE `tb_resort`
  ADD PRIMARY KEY (`resortid`);

--
-- Indexes for table `tb_resort_amenities`
--
ALTER TABLE `tb_resort_amenities`
  ADD PRIMARY KEY (`amenity_id`);

--
-- Indexes for table `tb_resort_report`
--
ALTER TABLE `tb_resort_report`
  ADD PRIMARY KEY (`resort_report_id`);

--
-- Indexes for table `tb_resort_room`
--
ALTER TABLE `tb_resort_room`
  ADD PRIMARY KEY (`resort_room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `tb_add_on_amenities`
--
ALTER TABLE `tb_add_on_amenities`
  MODIFY `add_on_amenity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_add_on_details`
--
ALTER TABLE `tb_add_on_details`
  MODIFY `add_on_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_guest`
--
ALTER TABLE `tb_guest`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_invalid`
--
ALTER TABLE `tb_invalid`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_location`
--
ALTER TABLE `tb_location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_municipal`
--
ALTER TABLE `tb_municipal`
  MODIFY `adminid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_municipality`
--
ALTER TABLE `tb_municipality`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tb_placed_order`
--
ALTER TABLE `tb_placed_order`
  MODIFY `po_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_provincial`
--
ALTER TABLE `tb_provincial`
  MODIFY `provid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_report`
--
ALTER TABLE `tb_report`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_resort`
--
ALTER TABLE `tb_resort`
  MODIFY `resortid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_resort_amenities`
--
ALTER TABLE `tb_resort_amenities`
  MODIFY `amenity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_resort_report`
--
ALTER TABLE `tb_resort_report`
  MODIFY `resort_report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_resort_room`
--
ALTER TABLE `tb_resort_room`
  MODIFY `resort_room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
