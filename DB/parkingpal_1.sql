-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2021 at 04:53 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parkingpal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Security_Code` int(55) NOT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Security_Code`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Administrator', 'admin', 771231234, 7, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2021-01-05 05:38:23');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `slot_id` int(11) NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `userid`, `slot_id`, `time`) VALUES
(1, 10, 5, '2021-11-05'),
(2, 10, 5, '2021-11-05'),
(3, 1, 1, '2021-11-05'),
(4, 1, 1, '2021-11-05'),
(5, 1, 1, '2021-11-05'),
(6, 1, 2, '2021-11-05'),
(7, 1, 1, '2021-11-05'),
(8, 1, 3, '2021-11-05'),
(9, 2, 1, '2021-11-05'),
(10, 1, 4, '2021-11-06'),
(11, 1, 2, '2021-11-06'),
(12, 1, 3, '2021-11-06'),
(13, 1, 3, '2021-11-06'),
(14, 1, 3, '2021-11-06'),
(15, 1, 3, '2021-11-06'),
(16, 1, 4, '2021-11-06');

-- --------------------------------------------------------

--
-- Table structure for table `booking_table`
--

CREATE TABLE `booking_table` (
  `booking_id` int(11) NOT NULL,
  `slot_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `booking_time` time NOT NULL,
  `payment_paid` enum('No','Yes') COLLATE utf8_unicode_ci NOT NULL,
  `came_for_booking` enum('No','Yes') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `booking_table`
--

INSERT INTO `booking_table` (`booking_id`, `slot_id`, `client_id`, `booking_time`, `payment_paid`, `came_for_booking`) VALUES
(3, 1, 3, '09:00:00', 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `client_table`
--

CREATE TABLE `client_table` (
  `client_id` int(11) NOT NULL,
  `client_email_address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `client_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `client_first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `client_last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `client_date_of_birth` date NOT NULL,
  `client_gender` enum('Male','Female','Other') COLLATE utf8_unicode_ci NOT NULL,
  `client_address` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `client_phone_no` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `client_maritial_status` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `client_added_on` datetime NOT NULL,
  `client_verification_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email_verify` enum('No','Yes') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `client_table`
--

INSERT INTO `client_table` (`client_id`, `client_email_address`, `client_password`, `client_first_name`, `client_last_name`, `client_date_of_birth`, `client_gender`, `client_address`, `client_phone_no`, `client_maritial_status`, `client_added_on`, `client_verification_code`, `email_verify`) VALUES
(1, 'aaa@gmail.com', 'aaa', 'aaa', 'aaa', '2021-02-26', 'Male', 'Green view, 1025, NYC', '85745635210', 'Single', '2021-02-18 16:34:55', 'b1f3f8409f7687072adb1f1b7c22d4b0', 'Yes'),
(6, 'vbbbb@gmail.com', 'bbbbb', 'aaa', 'aaa', '2021-02-26', 'Male', 'Green view, 1025, NYC', '85745635210', 'Single', '2021-02-18 16:34:55', 'b1f3f8409f7687072adb1f1b7c22d4b0', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `url` varchar(225) NOT NULL,
  `available` int(1) NOT NULL,
  `slot_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `url`, `available`, `slot_user`) VALUES
(1, 'Area 51', 'https://www.google.com/maps/d/viewer?ie=UTF8&t=h&oe=UTF8&msa=0&mid=14TfSK3OCFZTvFXGNEyBWs56MWC4&ll=37.23954048106237%2C-115.81582680223849&z=16', 0, 0),
(2, 'Area 52', 'https://www.google.com/maps/d/viewer?ie=UTF8&t=h&oe=UTF8&msa=0&mid=14TfSK3OCFZTvFXGNEyBWs56MWC4&ll=37.23954048106237%2C-115.81582680223849&z=16', 0, 0),
(3, 'Sri lanka', 'https://www.google.lk/maps/@6.9218386,79.8562055,13z', 0, 0),
(4, 'Nayantha', 'asda', 0, 1),
(5, 'nbsaidas', 'asdwqdwqfqfwq', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_email` varchar(55) NOT NULL,
  `c_website` varchar(55) NOT NULL,
  `c_address` varchar(255) NOT NULL,
  `last_update` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `c_name`, `c_email`, `c_website`, `c_address`, `last_update`) VALUES
(1, 'Demo Company', 'vparksystem@company.com', 'codeastro.com', '8169 Geigeer St NW', '2021-06-08 20:48:52');

-- --------------------------------------------------------

--
-- Table structure for table `vcategory`
--

CREATE TABLE `vcategory` (
  `ID` int(10) NOT NULL,
  `VehicleCat` varchar(120) DEFAULT NULL,
  `shortDescription` varchar(50) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vcategory`
--

INSERT INTO `vcategory` (`ID`, `VehicleCat`, `shortDescription`, `CreationDate`) VALUES
(1, 'Four Wheeler', 'Demo 4W', '2019-07-05 11:06:50'),
(2, 'Two Wheeler', 'Demo 2W', '2019-07-05 11:07:09'),
(6, 'Three Wheeler', 'MTCL 2W', '2021-03-07 16:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_info`
--

CREATE TABLE `vehicle_info` (
  `ID` int(10) NOT NULL,
  `ParkingNumber` varchar(120) DEFAULT NULL,
  `VehicleCategory` varchar(120) NOT NULL,
  `VehicleCompanyname` varchar(120) DEFAULT NULL,
  `RegistrationNumber` varchar(120) DEFAULT NULL,
  `OwnerName` varchar(120) DEFAULT NULL,
  `OwnerContactNumber` bigint(10) DEFAULT NULL,
  `InTime` timestamp NULL DEFAULT current_timestamp(),
  `OutTime` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `ParkingCharge` varchar(120) NOT NULL,
  `Remark` mediumtext NOT NULL,
  `Status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle_info`
--

INSERT INTO `vehicle_info` (`ID`, `ParkingNumber`, `VehicleCategory`, `VehicleCompanyname`, `RegistrationNumber`, `OwnerName`, `OwnerContactNumber`, `InTime`, `OutTime`, `ParkingCharge`, `Remark`, `Status`) VALUES
(1, '96069', 'Four Wheeler', 'Hyundai', 'GGZ-1155', 'Jamie Macon', 8956232528, '2021-03-09 05:58:38', '2021-03-09 10:15:43', '34', 'NA', 'Out'),
(2, '52796', 'Two Wheeler', 'KTM', 'GTM-1069', 'Dan Wilson', 8989898989, '2021-03-09 08:58:38', '2021-03-09 14:16:26', '20', 'NA', 'Out'),
(3, '65023', 'Two Wheeler', 'Yamaha', 'JFF-7888', 'Lynn Roberts\n', 7845123697, '2021-03-09 08:58:38', '2021-03-09 12:16:31', '20', 'Vehicle Out', 'Out'),
(4, '90880', 'Two Wheeler', 'Suzuki', 'PLO-8507', 'Charles Mathew', 2132654447, '2021-03-09 08:58:38', '2021-03-09 13:58:38', '20', 'Vehicle Out', 'Out'),
(5, '09894', 'Two Wheeler', 'Piaggio', 'DLE-7701', 'Theresa Hay\n', 4654654654, '2021-03-09 08:58:38', '2021-03-09 14:58:38', '15', 'none', 'Out'),
(6, '78915', 'Two Wheeler', 'Aprilia', 'GZG-7896', 'Susie Eller', 7978999879, '2021-03-09 08:58:38', NULL, '', '', ''),
(7, '25207', 'Two Wheeler', 'Honda', 'LDC-7019', 'Shannon Pinson\n', 1234567890, '2021-03-09 11:03:05', '2021-03-09 11:58:38', '5', 'none', 'Out'),
(8, '58836', 'Two Wheeler', 'Yamaha', 'FYS-6969', 'Mark Paull', 1234567890, '2021-03-09 11:32:02', '2021-03-09 12:58:38', '5', 'Vehicle Out', 'Out'),
(9, '52207', 'Four Wheeler', 'Ford ', 'CAS-7850', 'Bernice Willilams\n', 7411112000, '2021-03-07 10:42:52', '2021-03-09 11:58:38', '7', 'none', 'Out'),
(10, '47648', 'Four Wheeler', 'Tesla', 'CST-6907', 'Myra Warnke\n', 8541112500, '2021-03-07 14:54:03', NULL, '', '', ''),
(11, '03289', 'Four Wheeler', 'Volkswagen', 'STT-7002', 'Colin Greenwood', 2574442560, '2021-03-08 13:50:15', NULL, '', '', ''),
(12, '62450', 'Two Wheeler', 'KTM', 'ILS-2580', 'Bruno Denn', 1254447850, '2021-03-08 09:34:55', '2021-03-08 15:58:38', '30', 'none', 'Out'),
(13, '28913', 'Four Wheeler', 'Hyundai', 'SSO-8800', 'Tanya Chilton\n', 2570005640, '2021-03-09 13:09:16', NULL, '', '', ''),
(14, '63879', 'Four Wheeler', 'Hyundai', 'GEP-7805', 'Matthew  Foust\n', 6667869500, '2021-07-16 15:28:32', '2021-07-16 17:17:19', '5', 'none', 'Out'),
(15, '37066', 'Four Wheeler', 'Tesla', 'QWE-9602', 'Paul Nicholls', 7412589658, '2021-07-17 16:18:01', '2021-07-17 16:49:40', '5', 'none', 'Out'),
(16, '19803', 'Four Wheeler', 'Renault', 'ABE-3470', 'Alyse Conn', 7896547850, '2021-07-17 16:59:26', '2021-07-17 17:20:22', '2', 'none', 'Out'),
(17, '25088', 'Four Wheeler', 'Volkswagen', 'TRS-8027', 'Bonnie Jackson', 7014741470, '2021-07-17 17:40:22', NULL, '', '', ''),
(18, '37496', 'Four Wheeler', 'Chevrolet', 'VNT-9135', 'Larry Clark', 7890240001, '2021-07-17 17:43:16', NULL, '', '', ''),
(19, '99316', 'Four Wheeler', 'MG', 'PIJ-8802', 'Jessica Garner', 7012560025, '2021-07-17 17:44:07', '2021-07-17 17:45:05', '3', 'none.', 'Out'),
(20, '59268', 'Two Wheeler', 'Kawasaki', 'LLL-8987', 'James', 7014569980, '2021-07-17 17:46:37', '2021-10-27 18:32:27', '7', 'dgdgd', 'Out');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_table`
--
ALTER TABLE `booking_table`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `client_table`
--
ALTER TABLE `client_table`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vcategory`
--
ALTER TABLE `vcategory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `booking_table`
--
ALTER TABLE `booking_table`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client_table`
--
ALTER TABLE `client_table`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vcategory`
--
ALTER TABLE `vcategory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicle_info`
--
ALTER TABLE `vehicle_info`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
