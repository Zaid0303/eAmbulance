-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2024 at 04:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eahpdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_capacity` varchar(255) NOT NULL,
  `cat_equipment` varchar(255) NOT NULL,
  `cat_cost` varchar(255) NOT NULL,
  `cat_specialization` varchar(255) NOT NULL,
  `cat_address` varchar(255) NOT NULL,
  `cat_img` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_capacity`, `cat_equipment`, `cat_cost`, `cat_specialization`, `cat_address`, `cat_img`, `status`) VALUES
(1, 'Basic Ambulance', 'Medium', 'First Aid Kit, Oxygen Cylinder', '$50/hour', 'Non-A/C, Non-ICU', 'Nazimabad', 'Basic Ambulance.png', 1),
(3, 'Advanced Ambulance', 'Large', 'Defibrillator, Ventilator, Oxygen Cylinder', '$100/hour', 'A/C, ICU Equipped', '', 'Advance Ambulance.png', 1),
(4, 'ICCU Ambulance', 'Extra Large', 'Full ICU Setup, Defibrillator, Ventilator, ECG Machine', '$150/hour', 'A/C, ICCU Equipped', '', 'ambulance.png', 1),
(5, 'Neonatal Ambulance', 'Medium', 'Incubator, Ventilator, Oxygen Supply', '$120/hour', 'NICU Equipped, A/C', '', 'Neonatal Ambulance.png', 1),
(6, 'Bariatric Ambulance', 'Extra Large', 'Hydraulic Lift, Wheelchair, Oxygen Cylinder', '$200/hour', 'A/C, Specialized for Obese Patients', '', 'Bariatric Ambulance.png', 1),
(7, 'Cardiac Ambulance', 'Large', 'Defibrillator, ECG Machine, Ventilator', '$130/hour', 'ICU Equipped, A/C, Cardiac Monitoring', '', 'Cardiac Ambulance.png', 1),
(8, 'Maternity Ambulance', 'Medium', 'Birthing Kit, Oxygen Cylinder, Medical Monitoring', '$90/hour', 'A/C, Specialized for Maternity Care', '', 'Maternity Ambulance.png', 1),
(9, 'Pediatric Ambulance', 'Medium', 'Pediatric Ventilator, Oxygen Cylinder, Monitoring Devices', '$110/hour', 'A/C, Specialized for Children', '', 'Pediatric Ambulance.png', 1),
(10, 'Air Ambulance', 'Fully Large', 'Full ICU Setup, Defibrillator, Ventilator, Oxygen Supply', '$500/hour', 'Air Transport, ICU Equipped, A/C', '', 'Air Ambulance.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_mess` varchar(255) NOT NULL,
  `contact_time` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_name`, `contact_email`, `contact_mess`, `contact_time`, `status`) VALUES
(23, 'Ahtesham', 'techbudspk@gmail.com', 'Plz Help me', '2024-09-21 15:49:46', 1),
(24, 'Ahtesham', 'techbudspk@gmail.com', 'Plz Help me', '2024-09-21 15:49:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `f_email` varchar(255) NOT NULL,
  `f_mess` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `f_name`, `f_email`, `f_mess`, `status`) VALUES
(1, 'Syed Murtaza', 'm@gmail.com', 'murtaza', 1),
(2, 'Hanif', 'hanif@gmail.com', 'goood he good hai malik', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_name` varchar(255) NOT NULL,
  `gallery_img` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_name`, `gallery_img`, `status`) VALUES
(1, 'Gallery One', 'gallery-1.jpg', 1),
(3, 'Gallery Two', 'gallery-2.jpg', 1),
(4, 'Gallery Three', 'gallery-3.png', 1),
(5, 'Gallery Four', 'gallery-4.jpg', 1),
(6, 'Gallery Five', 'gallery-5.jpg', 1),
(7, 'Gallery Six', 'gallery-6.jpg', 1),
(8, 'Gallery Seven', 'gallery-7.jpeg', 1),
(9, 'Gallery Eight', 'gallery-8.jpg', 1),
(10, 'Gallery Nine', 'gallery-9.jpg', 1),
(11, 'Gallery Ten', 'gallery-10.jpg', 1),
(12, 'Gallery eleven', 'gallery-11.jpg', 1),
(13, 'Gallery Twelve', 'gallery-12.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `ser_id` int(11) NOT NULL,
  `ser_name` varchar(255) NOT NULL,
  `ser_para` varchar(255) NOT NULL,
  `ser_img` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`ser_id`, `ser_name`, `ser_para`, `ser_img`, `status`) VALUES
(1, 'Emergency Ambulance', '24/7 emergency services for immediate medical assistance and rapid transport to the nearest medical facility.', 'service-1.jpg', 1),
(2, 'Basic Life Support (BLS) Ambulance', 'Equipped with essential medical supplies and staffed with trained paramedics, providing care for non-critical patients during transportation.', 'service-2.jpeg', 1),
(3, 'Advanced Life Support (ALS) Ambulance', ' ALS ambulances are fitted with advanced medical equipment and staffed by paramedics trained to manage critical situations, including cardiac arrests and trauma.', 'service-3.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 8989898980, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2024-01-10 08:56:46');

-- --------------------------------------------------------

--
-- Table structure for table `tblambulance`
--

CREATE TABLE `tblambulance` (
  `ID` int(11) NOT NULL,
  `AmbulanceType` varchar(250) DEFAULT NULL,
  `AmbRegNum` varchar(250) DEFAULT NULL,
  `DriverName` varchar(250) DEFAULT NULL,
  `DriverContactNumber` bigint(20) DEFAULT NULL,
  `Ablemail` varchar(255) NOT NULL,
  `Ablpass` varchar(255) NOT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `Status` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblambulance`
--

INSERT INTO `tblambulance` (`ID`, `AmbulanceType`, `AmbRegNum`, `DriverName`, `DriverContactNumber`, `Ablemail`, `Ablpass`, `CreationDate`, `Status`, `UpdationDate`) VALUES
(11, '1', 'DL-123456', 'robert 1', 322023026, 'driver', '$2y$10$yd6B4XbiMdT6nh.eEOR7HufI5puLR/3V9cyULOAHt1cooVohWUOOe', '2024-09-20 06:04:55', 'Assigned', '2024-09-20 10:34:06'),
(12, '1', 'DL-123457', 'robert 1', 322023026, 'driver', '$2y$10$zIwXUwWCQ5Rh9H7NeVVKc.0aczhYUJYz074xCkfjscVwxPxyptZDC', '2024-09-20 06:12:21', NULL, NULL),
(13, '1', 'DL-123458', 'cristianaa', 322023026, 'driver', '827ccb0eea8a706c4c34a16891f84e7b', '2024-09-20 06:19:31', 'Reached', '2024-09-21 05:37:44'),
(14, '1', 'DS12345', 'Ahtesham', 9274285, 'Ahtesham', 'd93591bdf7860e1e4ee2fca799911215', '2024-09-20 11:43:31', 'Assigned', '2024-09-21 04:55:11');

-- --------------------------------------------------------

--
-- Table structure for table `tblambulancehiring`
--

CREATE TABLE `tblambulancehiring` (
  `ID` int(11) NOT NULL,
  `BookingNumber` int(10) DEFAULT NULL,
  `PatientName` varchar(250) DEFAULT NULL,
  `RelativeName` varchar(250) DEFAULT NULL,
  `RelativeConNum` bigint(11) DEFAULT NULL,
  `hospital` varchar(255) NOT NULL,
  `UserLocation` varchar(255) NOT NULL,
  `HiringDate` varchar(250) DEFAULT NULL,
  `HiringTime` varchar(250) DEFAULT NULL,
  `AmbulanceType` int(5) DEFAULT NULL,
  `Address` mediumtext DEFAULT NULL,
  `City` mediumtext DEFAULT NULL,
  `State` mediumtext DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `BookingDate` timestamp NULL DEFAULT current_timestamp(),
  `Remark` varchar(250) DEFAULT NULL,
  `Status` varchar(250) DEFAULT NULL,
  `AmbulanceRegNo` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblambulancehiring`
--

INSERT INTO `tblambulancehiring` (`ID`, `BookingNumber`, `PatientName`, `RelativeName`, `RelativeConNum`, `hospital`, `UserLocation`, `HiringDate`, `HiringTime`, `AmbulanceType`, `Address`, `City`, `State`, `Message`, `BookingDate`, `Remark`, `Status`, `AmbulanceRegNo`, `UpdationDate`, `user_id`) VALUES
(26, 481727559, 'ahtesham', 'arain', 3133826989, 'Jinnah International Airport, Airport Road, Faisal Cantonment, Karachi, Pakistan', '24.927435, 67.0330624', '2024-10-03', '18:00', 0, 'H # A007 SECTOR X3 GULSHAN-E-MAYMAR KARACHI.', 'Lahore', 'z', 'xv', '2024-09-21 13:56:03', 'srgf', 'Reached', '', '2024-09-21 14:01:32', 3),
(27, 767668604, 'samsung', 'wsg', 3133826989, 'Giga Mall, Sector F DHA Phase II, Islamabad, Pakistan', '24.9274365, 67.0330579', '2024-10-09', '19:09', 0, 'H # A007 SECTOR X3 GULSHAN-E-MAYMAR KARACHI.', 'Lahore', 'sfs', 'f', '2024-09-21 14:04:25', 'sr', 'Assigned', '14', '2024-09-21 14:10:43', 3),
(28, 283869223, 'iphone 13 pro', 'ether', 3133826989, 'Centaurus Mall, Jinnah Avenue, F 8/4 F-8, Islamabad, Pakistan', '24.9288488, 67.034556', '2024-10-02', '19:15', 0, 'H # A007 SECTOR X3 GULSHAN-E-MAYMAR KARACHI.', 'Lahore', 'kpk', 's', '2024-09-21 14:11:50', 'xf', 'On the way', '   ', '2024-09-21 14:19:54', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbllogin_users`
--

CREATE TABLE `tbllogin_users` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbllogin_users`
--

INSERT INTO `tbllogin_users` (`ID`, `username`, `email`, `password`, `img`) VALUES
(1, 'Muhammad Zaid', 'zaid123@gmail.com', '$2y$10$xUjfwoPvP82c7Zex6raNm.e5Uamg9u1Q./biVRsXHP9RAIi2rCyv2', ''),
(2, 'Zaid', 'zaid03@gmail.com', '87337be9fd2b1a6f6428cc3ff7a59d1c', ''),
(3, 'ahtesham', 'aht@gmail.com', '516797754cc4659ed695e8eda8929843', '');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext DEFAULT NULL,
  `PageImage` varchar(255) NOT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `PageImage`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'About us', '<div style=\"text-align: center;\"><b>Emergency Ambulance Hiring Portal</b></div><div style=\"text-align: center;\"><font face=\"times new roman\">We prioritize the well-being of our patients above all else. Thats why we offer top-notch ambulance services to ensure swift and secure medical transportation whenever the need arises. Our dedicated team of skilled paramedics and drivers is equipped with state-of-the-art ambulances, ready to respond to emergencies 24/7.</font><br></div><div style=\"text-align: left;\"><br></div>', 'about.jpg', NULL, NULL, '2024-09-20 20:18:46'),
(2, 'contactus', 'Contact Us', '<span style=\"color: rgb(102, 102, 102); font-family: Arial, sans-serif;\">123 Medical Road, Health City</span>', '', 'hospital@gmail.com', 92342256, '2024-09-20 09:39:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbltrackinghistory`
--

CREATE TABLE `tbltrackinghistory` (
  `ID` int(10) NOT NULL,
  `BookingNumber` int(10) DEFAULT NULL,
  `AmbulanceRegNum` varchar(250) DEFAULT NULL,
  `Remark` varchar(250) DEFAULT NULL,
  `Status` varchar(250) DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbltrackinghistory`
--

INSERT INTO `tbltrackinghistory` (`ID`, `BookingNumber`, `AmbulanceRegNum`, `Remark`, `Status`, `UpdationDate`) VALUES
(1, 292564626, 'DL15RT5678', 'Assigned', 'Assigned', '2024-03-04 07:05:11'),
(2, 292564626, 'DL15RT5678', 'On the way', 'On the way', '2024-03-04 07:41:03'),
(3, 292564626, 'DL15RT5678', 'Ambulance Pick the patient', 'Pickup', '2024-03-04 08:03:00'),
(4, 292564626, 'DL15RT5678', 'Patient reached Hospital', 'Reached', '2024-03-04 12:34:02'),
(5, 193862343, 'DL15RT5678', 'Ambulance Has been assigned', 'Assigned', '2024-03-05 05:25:18'),
(6, 193862343, 'DL15RT5678', 'Ambulance is on the way reached soon', 'On the way', '2024-03-05 05:33:02'),
(7, 193862343, 'DL15RT5678', 'Patient has been picked', 'Pickup', '2024-03-05 05:33:20'),
(8, 193862343, 'DL15RT5678', 'Patient reached to the hospital', 'Reached', '2024-03-05 05:34:34'),
(9, 901408998, 'DL14RT5678', 'Assigned Ambulance', 'Assigned', '2024-03-05 06:51:45'),
(10, 901408998, 'DL14RT5678', 'On The way', 'On the way', '2024-03-05 06:56:50'),
(11, 603153853, 'DL15RT5678', 'Ambulance Assigned', 'Assigned', '2024-03-14 01:20:22'),
(12, 603153853, 'DL15RT5678', 'Ambulance is on the way to pick the pateint', 'On the way', '2024-03-14 01:20:49'),
(13, 603153853, 'DL15RT5678', 'Patient is picked up and w heading to the hospital', 'Pickup', '2024-03-14 01:28:53'),
(15, 603153853, 'DL15RT5678', 'Patient reached at hospital', 'Reached', '2024-03-14 01:38:15'),
(16, 369344538, 'DL15RT5678', 'Ambulance Assigned ', 'Assigned', '2024-03-14 01:45:04'),
(17, 369344538, 'DL15RT5678', 'Ambulance is on the way to pick the patient', 'On the way', '2024-03-14 01:45:41'),
(18, 369344538, 'DL15RT5678', 'Patient is picked up heading to destination', 'Pickup', '2024-03-14 01:46:07'),
(19, 369344538, 'DL15RT5678', 'Reached hospital\r\n', 'Reached', '2024-03-14 01:46:26'),
(20, 185258573, 'DL15RT5678', 'ambulance assigned', 'Assigned', '2024-03-14 14:39:45'),
(21, 901408998, 'DL14RT5678', 'Patient Pick form given address', 'Pickup', '2024-03-14 14:51:24'),
(22, 506835701, '', 'soryy', 'Rejected', '2024-09-19 09:30:58'),
(23, 690502340, 'DL-123456', 'ffbhdx', 'Assigned', '2024-09-19 09:54:47'),
(24, 185258573, 'DL15RT5678', 'tv', 'On the way', '2024-09-19 10:00:44'),
(25, 690502340, 'DL-123456', '3fv', 'On the way', '2024-09-19 10:00:55'),
(26, 690502340, 'DL-123456', 'ebge', 'Pickup', '2024-09-19 10:01:06'),
(27, 690502340, 'DL-123456', 'vef', 'Reached', '2024-09-19 10:01:18'),
(28, 851346545, 'DL-123456', 'hello', 'Assigned', '2024-09-19 12:55:32'),
(29, 969526925, '', 'wd', 'Rejected', '2024-09-20 10:03:54'),
(30, 983099508, 'DL-123456', 'h', 'Assigned', '2024-09-20 10:29:11'),
(31, 851346545, 'DL-123456', 'gch', 'On the way', '2024-09-20 10:29:23'),
(32, 326919687, '', 'vhvh', 'Rejected', '2024-09-20 10:29:32'),
(33, 150650264, '', 'mm', 'Rejected', '2024-09-20 10:29:54'),
(34, 636820173, '', '', 'Assigned', '2024-09-20 10:32:05'),
(35, 0, '', '', 'Assigned', '2024-09-20 10:32:24'),
(36, 822291172, '', '', 'Assigned', '2024-09-20 10:32:37'),
(37, 636820173, '', '', 'Assigned', '2024-09-20 10:33:33'),
(38, 185258573, 'DL15RT5678', '', 'Assigned', '2024-09-20 10:33:46'),
(39, 851346545, 'DL-123456', '', 'Assigned', '2024-09-20 10:34:06'),
(40, 822291172, '', 'aegws', 'On the way', '2024-09-20 10:52:04'),
(41, 822291172, '', 'hdrhd', 'Pickup', '2024-09-20 10:52:19'),
(42, 822291172, '', 'aegs', 'Reached', '2024-09-20 10:52:46'),
(43, 847216245, '', 'ok im coming', 'Assigned', '2024-09-20 11:48:02'),
(44, 513571990, '', 'fhd', 'Assigned', '2024-09-20 12:07:47'),
(45, 722657463, '', 'gvg', 'Assigned', '2024-09-20 12:25:49'),
(46, 862968897, 'DS12345', 'zdgz', 'Assigned', '2024-09-20 12:37:01'),
(47, 862968897, 'DS12345', 'zd', 'On the way', '2024-09-20 12:37:53'),
(48, 554033237, 'DS12345', 'jvj', 'Assigned', '2024-09-21 04:55:12'),
(49, 997809491, 'DL-123458', 'qefgd', 'Assigned', '2024-09-21 05:22:58'),
(50, 997809491, 'DL-123458', 'dwa', 'On the way', '2024-09-21 05:34:23'),
(51, 997809491, 'DL-123458', 'srgvx', 'Pickup', '2024-09-21 05:36:29'),
(52, 997809491, 'DL-123458', 'adv', 'Reached', '2024-09-21 05:37:45'),
(53, 748256887, 'DS12345', 'komji', 'Assigned', '2024-09-21 07:26:41'),
(54, 319205949, '', 'cgcj', 'Assigned', '2024-09-21 13:04:41'),
(55, 481727559, '', 'dfh', 'Assigned', '2024-09-21 13:56:54'),
(56, 481727559, '', 'cng', 'On the way', '2024-09-21 13:57:33'),
(57, 481727559, '', 'dtuh', 'Pickup', '2024-09-21 13:58:33'),
(58, 481727559, '', 'srgf', 'Reached', '2024-09-21 14:01:32'),
(59, 767668604, '14', 'sr', 'Assigned', '2024-09-21 14:10:43'),
(60, 283869223, '   ', 'sgd', 'Assigned', '2024-09-21 14:18:16'),
(61, 283869223, '   ', 'xf', 'On the way', '2024-09-21 14:19:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ser_id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblambulance`
--
ALTER TABLE `tblambulance`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `AmbRegNum` (`AmbRegNum`);

--
-- Indexes for table `tblambulancehiring`
--
ALTER TABLE `tblambulancehiring`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ablunaceid` (`AmbulanceRegNo`),
  ADD KEY `BookingNumber` (`BookingNumber`);

--
-- Indexes for table `tbllogin_users`
--
ALTER TABLE `tbllogin_users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpage`
--
ALTER TABLE `tblpage`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbltrackinghistory`
--
ALTER TABLE `tbltrackinghistory`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `abid` (`AmbulanceRegNum`),
  ADD KEY `bid` (`BookingNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `ser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblambulance`
--
ALTER TABLE `tblambulance`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblambulancehiring`
--
ALTER TABLE `tblambulancehiring`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbllogin_users`
--
ALTER TABLE `tbllogin_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblpage`
--
ALTER TABLE `tblpage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbltrackinghistory`
--
ALTER TABLE `tbltrackinghistory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
