-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 20, 2024 at 03:47 AM
-- Server version: 10.11.6-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u492530099_nmiet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `AdminName` varchar(200) NOT NULL,
  `EmailId` varchar(150) NOT NULL,
  `ContactNumber` bigint(12) NOT NULL,
  `password` varchar(250) NOT NULL,
  `updationDate` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `token` varchar(230) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `AdminName`, `EmailId`, `ContactNumber`, `password`, `updationDate`, `status`, `token`) VALUES
(5, 'admin', 'Committee Head', 'omkarty0306@gmail.com', 0, 'Admin@1133', '', 1, 'NT132ZHEFK');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `priorityId` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`, `priorityId`) VALUES
(2, 'Other', '', '2020-06-22 18:30:00', '2023-09-11 07:02:02', 'P2'),
(4, 'Office', '', '2023-08-17 12:56:57', '2023-09-11 07:02:24', 'P2'),
(6, 'Library', 'ok', '2023-08-17 12:57:56', '2023-09-08 16:18:15', 'P4'),
(7, 'Workshop', '', '2023-08-17 12:58:07', '2023-09-08 13:41:36', 'P3'),
(8, 'Exam', '', '2023-08-17 12:58:14', '2023-09-08 13:41:41', 'P1'),
(9, 'FE', '', '2023-08-17 12:58:54', '2023-09-11 07:04:18', 'P3'),
(10, 'Hostel', 'ok', '2023-08-17 12:58:59', '2023-09-08 16:17:47', 'P1'),
(11, 'Canteen ', '', '2023-08-17 12:59:05', '2023-09-11 07:02:49', 'P3'),
(13, 'COM', '', '2023-08-17 12:59:54', '2023-09-11 07:04:00', 'P3'),
(14, 'IT', '', '2023-08-17 13:00:01', '2023-09-11 07:04:30', 'P3'),
(15, 'MECH', '', '2023-08-17 13:00:07', '2023-09-11 07:03:47', 'P3'),
(16, 'E&TC', '', '2023-08-17 13:00:17', '2023-09-11 07:04:46', 'P3'),
(17, 'Anti ranging', '', '2023-08-21 07:22:42', '2023-09-08 13:41:53', 'P1'),
(18, 'Women redressal', '', '2023-08-21 07:25:04', '2023-09-11 07:05:02', 'P1'),
(29, 'Sexual Harresment', '', '2023-09-11 09:01:37', '2023-09-11 09:02:08', 'P2');

-- --------------------------------------------------------

--
-- Table structure for table `complaintremark`
--

CREATE TABLE `complaintremark` (
  `id` int(11) NOT NULL,
  `complaintNumber` int(11) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `remarkDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `complaintremark`
--

INSERT INTO `complaintremark` (`id`, `complaintNumber`, `state`, `remark`, `remarkDate`) VALUES
(2, 1000163, 'in process', 'zal issue fx', '2023-09-21 14:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `currentdate`
--

CREATE TABLE `currentdate` (
  `Id` int(2) NOT NULL,
  `CurrentDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currenttime`
--

CREATE TABLE `currenttime` (
  `id` int(11) NOT NULL,
  `data` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `currenttime`
--

INSERT INTO `currenttime` (`id`, `data`, `created_at`, `updated_at`) VALUES
(1, 'some datat', '2023-08-16 16:31:18', '2023-08-16 16:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `description` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `rating`, `description`) VALUES
(2, 4, 'good'),
(5, 5, 'Awesome'),
(6, 5, 'Nice Website'),
(9, 5, 'good'),
(12, 4, 'Good'),
(14, 5, 'Good'),
(17, 5, 'good'),
(20, 5, ''),
(21, 1, ''),
(22, 1, ''),
(23, 1, 'hggf'),
(24, 4, 'Website is good');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `password`, `status`) VALUES
('omkarty0306@gmail.com', '$2y$10$o3FC.ipknAxtfYqSlZW6v.72V5OIgTu0eGR7J2T6d2VKPI69qAcmi', 1),
('ishwar7702@gmail.com', '$2y$10$ElR4Uiz/Kdt7u3v4By3UyeTVXJNFIqJDHaWuDgc5TKkVB0/zGMg2i', 1),
('mahesh.yadav250502@gmail.com', '$2y$10$Z2rGzg.VDqVf0C8kd/HhB.N022gx5Et99vL7hfc85/zSJeuK.lcxO', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Principal`
--

CREATE TABLE `Principal` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `AdminName` varchar(200) NOT NULL,
  `EmailId` varchar(150) NOT NULL,
  `ContactNumber` bigint(12) NOT NULL,
  `password` varchar(250) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `Principal`
--

INSERT INTO `Principal` (`id`, `username`, `AdminName`, `EmailId`, `ContactNumber`, `password`, `updationDate`) VALUES
(1, 'principal', 'principal', 'principal@gmail.com', 1234567890, 'principal', '09-09-2023 12:21:01 PM');

-- --------------------------------------------------------

--
-- Table structure for table `priority`
--

CREATE TABLE `priority` (
  `Priority` text NOT NULL,
  `priorityId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `priority`
--

INSERT INTO `priority` (`Priority`, `priorityId`) VALUES
('P1', 1),
('P2', 2),
('P3', 3),
('P4', 4);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `stateName` varchar(255) DEFAULT NULL,
  `stateDescription` tinytext DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `stateName`, `stateDescription`, `postingDate`, `updationDate`) VALUES
(1, 'New', 'New Created', '2020-06-27 19:18:02', NULL),
(2, 'In Process', 'Working on complaint', '2020-06-27 19:18:14', NULL),
(3, 'Closed', 'Complaint has been successfully closed', '2020-06-27 19:18:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(16, 4, 'Tution Fee Recipt', '2023-08-17 13:05:13', NULL),
(17, 4, 'Bonafide', '2023-08-17 13:05:23', NULL),
(19, 4, 'Accountant', '2023-08-17 13:05:51', NULL),
(20, 4, 'Other', '2023-08-17 13:06:10', NULL),
(21, 8, 'Resullt', '2023-08-17 13:41:17', NULL),
(22, 8, 'Exam Form', '2023-08-17 13:41:28', NULL),
(23, 8, 'Hall Ticket', '2023-08-17 13:41:42', NULL),
(24, 8, 'Other', '2023-08-17 13:41:53', NULL),
(25, 6, 'Complaint', '2023-08-17 13:42:29', NULL),
(26, 6, 'Query', '2023-08-17 13:42:40', NULL),
(27, 6, 'Other', '2023-08-17 13:42:51', NULL),
(29, 7, 'Complaint ', '2023-08-17 13:47:09', NULL),
(30, 7, 'Query', '2023-08-17 13:47:19', NULL),
(31, 7, 'Other', '2023-08-17 13:47:28', NULL),
(32, 11, 'Food Quality', '2023-08-17 13:48:05', NULL),
(33, 11, 'Improvement', '2023-08-17 13:48:14', NULL),
(34, 11, 'Other', '2023-08-17 13:48:25', NULL),
(35, 10, 'Cleanness', '2023-08-17 13:49:44', NULL),
(36, 10, 'Facility', '2023-08-17 13:49:54', NULL),
(37, 10, 'Other', '2023-08-17 13:50:04', NULL),
(38, 9, 'Facility', '2023-08-17 13:51:28', NULL),
(39, 9, 'Staff Complaint', '2023-08-17 13:51:40', NULL),
(40, 9, 'Teaching Learning Process', '2023-08-17 13:51:48', NULL),
(41, 9, 'Other', '2023-08-17 13:51:57', NULL),
(42, 16, 'Facility', '2023-08-17 13:57:00', NULL),
(43, 16, 'Staff Complaint', '2023-08-17 13:57:13', NULL),
(44, 16, 'Teaching Learning Process', '2023-08-17 13:57:20', NULL),
(45, 16, 'Other', '2023-08-17 13:57:28', NULL),
(46, 15, 'Facility', '2023-08-17 13:57:54', NULL),
(47, 15, 'Staff Complaint', '2023-08-17 13:58:02', NULL),
(48, 15, 'Teaching Learning Process', '2023-08-17 13:58:11', NULL),
(49, 15, 'Other', '2023-08-17 13:58:21', NULL),
(50, 14, 'Facility', '2023-08-17 14:00:48', NULL),
(51, 14, 'Staff Complaint', '2023-08-17 14:00:55', NULL),
(52, 14, 'Teaching Learning Process', '2023-08-17 14:01:03', NULL),
(53, 14, 'Other', '2023-08-17 14:01:13', NULL),
(54, 13, 'Facility', '2023-08-17 14:02:41', NULL),
(55, 13, 'Staff Complaint', '2023-08-17 14:02:50', NULL),
(56, 13, 'Teaching Learning Process', '2023-08-17 14:02:58', NULL),
(57, 13, 'Other', '2023-08-17 14:03:06', NULL),
(58, 2, 'Other', '2023-08-17 14:03:16', NULL),
(59, 17, 'Student Welfare', '2023-08-21 07:23:46', NULL),
(60, 17, 'Student Safety', '2023-08-21 07:24:06', NULL),
(61, 17, 'Anti-Bullying', '2023-08-21 07:24:17', NULL),
(62, 17, 'Harassment Prevention', '2023-08-21 07:24:28', NULL),
(63, 17, 'Gender Equity', '2023-08-21 07:24:37', NULL),
(64, 18, 'Domestic Violence', '2023-08-21 07:25:36', NULL),
(65, 18, 'Sexual Assault', '2023-08-21 07:25:49', NULL),
(66, 18, 'Gender Discrimination', '2023-08-21 07:26:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblcomplaints`
--

CREATE TABLE `tblcomplaints` (
  `complaintNumber` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `complaintType` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT 'New',
  `noc` varchar(255) DEFAULT NULL,
  `complaintDetails` mediumtext DEFAULT NULL,
  `complaintFile` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `lastUpdationDate` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Priority` text NOT NULL,
  `evFile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcomplaints`
--

INSERT INTO `tblcomplaints` (`complaintNumber`, `userId`, `category`, `subcategory`, `complaintType`, `state`, `noc`, `complaintDetails`, `complaintFile`, `regDate`, `status`, `lastUpdationDate`, `Priority`, `evFile`) VALUES
(1000147, 697, 7, 'Select Subcategory', 'General Query', 'closed', 'Student', 'H', 'EAadhaar_2821250370901720230627130213_02092023143924.pdf-unlocked.pdf', '2023-09-13 16:30:04', '', '2023-09-15 04:27:35', 'P3', NULL),
(1000148, 1, 18, 'Domestic Violence', ' Complaint', 'closed', 'Student', 'hjguyf', '', '2023-09-13 09:44:25', '', '2023-09-14 17:28:44', 'P1', NULL),
(1000149, 1, 18, 'Domestic Violence', ' Complaint', 'in process', 'Student', 'hjguyf', '', '2023-09-13 09:44:30', '', '2023-09-15 04:31:41', 'P1', NULL),
(1000150, 1, 17, 'Student Safety', 'General Query', 'in process', 'Student', 'Whaubs', '', '2023-09-14 12:09:46', '', '2023-09-20 14:59:28', 'P1', NULL),
(1000151, 1, 17, 'Student Safety', 'General Query', 'New', 'Student', 'Whaubs', '', '2023-09-14 12:09:47', '', '2023-09-14 12:09:47', 'P1', NULL),
(1000152, 1, 17, 'Student Safety', 'General Query', 'in process', 'Student', 'Need Help', '', '2023-09-14 17:09:57', '', '2023-09-23 14:48:29', 'P1', NULL),
(1000153, 1, 4, 'Accountant', 'General Query', 'closed', 'Student', 'Nh', '', '2023-09-14 17:30:12', '', '2023-09-14 17:44:06', 'P2', NULL),
(1000154, 1, 6, 'Complaint', 'General Query', 'closed', 'Staff', 'Hh', '', '2023-09-14 17:30:43', '', '2023-09-14 17:44:27', 'P4', NULL),
(1000155, 1, 4, 'Bonafide', ' Complaint', 'closed', 'Student', 'Na', '', '2023-09-13 03:56:36', '', '2023-09-15 04:26:23', 'P2', NULL),
(1000156, 1, 6, 'Query', ' Complaint', 'closed', 'Student', 'Na', '', '2023-09-11 03:57:59', '', '2023-09-15 04:28:02', 'P4', NULL),
(1000157, 697, 10, 'Facility', 'General Query', 'closed', 'Student', 'isseu', '', '2023-09-15 03:58:05', '', '2023-09-15 04:26:52', 'P1', NULL),
(1000158, 1, 17, 'Student Welfare', ' Complaint', 'New', 'Student', 'khhhh', '', '2023-09-15 09:38:48', '', '2023-09-15 09:38:48', 'P1', NULL),
(1000159, 1, 18, 'Sexual Assault', ' Complaint', 'closed', 'Student', 'hfgyf', '', '2023-09-16 05:27:09', '', '2023-09-16 05:34:04', 'P1', NULL),
(1000160, 1, 9, 'Select Subcategory', ' Complaint', 'New', 'Staff', 'Test', '', '2023-09-17 08:32:34', '', '2023-09-17 08:32:34', 'P3', NULL),
(1000161, 1, 2, 'Other', ' Complaint', 'New', 'Student', 'Ok', '', '2023-09-17 08:33:49', '', '2023-09-17 08:33:49', 'P2', NULL),
(1000162, 697, 13, 'Staff Complaint', ' Complaint', 'closed', 'Student', 'h', 'logo-real-estate-home-solutions-that-is-home-solution_527952-33.avif', '2023-09-20 14:52:01', '', '2023-09-20 15:07:16', 'P3', NULL),
(1000163, 697, 14, 'Teaching Learning Process', ' Complaint', 'closed', 'Student', 'ok', '', '2023-09-20 17:17:08', '', '2023-09-21 14:54:43', 'P3', 'LOTO2.jpg'),
(1000164, 5, 14, 'Staff Complaint', 'General Query', 'New', 'Student', 'okk', '', '2023-09-20 17:21:30', '', '2023-09-20 17:21:30', 'P3', NULL),
(1000165, 697, 18, 'Sexual Assault', ' Complaint', 'closed', 'Student', 'djfh', '', '2023-09-23 10:32:01', '', '2023-09-23 10:39:14', 'P1', NULL),
(1000166, 1, 16, 'Staff Complaint', ' Complaint', 'closed', 'Student', 'Ok', '', '2023-09-23 14:35:44', '', '2023-09-23 14:42:13', 'P3', 'WIN_20230725_16_25_53_Pro.jpg'),
(1000167, 1, 7, 'Complaint ', 'General Query', 'New', 'Student', 'bf', '', '2024-02-16 18:17:09', '', '2024-02-16 18:17:09', 'P3', NULL),
(1000168, 1, 4, 'Bonafide', ' Complaint', 'closed', 'Student', 'na', '', '2024-02-18 11:11:14', '', '2024-02-18 11:19:22', 'P2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblforwardhistory`
--

CREATE TABLE `tblforwardhistory` (
  `id` int(11) NOT NULL,
  `ComplaintNumber` bigint(12) DEFAULT NULL,
  `ForwardFrom` int(6) DEFAULT NULL,
  `ForwardTo` int(6) DEFAULT NULL,
  `ForwadDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblforwardhistory`
--

INSERT INTO `tblforwardhistory` (`id`, `ComplaintNumber`, `ForwardFrom`, `ForwardTo`, `ForwadDate`) VALUES
(52, 1000145, 5, 14, '2023-09-11 09:12:23'),
(53, 1000144, 5, 14, '2023-09-12 05:46:33'),
(54, 1000147, 5, 11, '2023-09-12 17:28:40'),
(55, 1000147, 5, 11, '2023-09-12 17:28:44'),
(56, 1000149, 5, 14, '2023-09-13 09:47:30'),
(57, 1000159, 5, 14, '2023-09-16 05:28:41'),
(58, 1000150, 0, 11, '2023-09-20 14:40:59'),
(59, 1000162, 0, 11, '2023-09-20 15:04:34'),
(60, 1000163, 5, 11, '2023-09-20 17:18:18'),
(61, 1000163, 5, 11, '2023-09-20 17:19:31'),
(62, 1000152, 5, 11, '2023-09-21 16:27:09'),
(63, 1000165, 5, 11, '2023-09-23 10:36:00'),
(64, 1000166, 5, 14, '2023-09-23 14:40:23'),
(65, 1000168, 5, 11, '2024-02-18 11:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubadmin`
--

CREATE TABLE `tblsubadmin` (
  `id` int(11) NOT NULL,
  `SubAdminName` varchar(150) DEFAULT NULL,
  `Department` varchar(150) DEFAULT NULL,
  `EmailId` varchar(150) DEFAULT NULL,
  `ContactNumber` bigint(12) DEFAULT NULL,
  `UserName` varchar(12) DEFAULT NULL,
  `Password` varchar(150) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp(),
  `LastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `IsActive` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblsubadmin`
--

INSERT INTO `tblsubadmin` (`id`, `SubAdminName`, `Department`, `EmailId`, `ContactNumber`, `UserName`, `Password`, `RegDate`, `LastUpdationDate`, `IsActive`) VALUES
(11, 'Trial', 'Trial', 'saurabhkarande0901@gmail.com', 1111111111, 'Trial', '333', '2023-08-14 03:24:43', '2023-09-10 06:57:56', 1),
(13, 'Kapil Wagh', 'Information Technology', 'shivam810246@gmail.com', 9359938375, 'Kapilwagh', 'kapil', '2023-08-22 05:42:22', '2023-09-10 06:53:26', 1),
(14, 'saurabh', 'Exam', 'saurabhkarande0901@gmail.com', 7841810901, 'exam', '123', '2023-09-10 13:09:48', '2023-09-11 08:28:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubadminremark`
--

CREATE TABLE `tblsubadminremark` (
  `id` int(11) NOT NULL,
  `ComplainNumber` bigint(12) DEFAULT NULL,
  `ComplainStatus` varchar(20) DEFAULT NULL,
  `ComplainRemark` mediumtext DEFAULT NULL,
  `RemarkBy` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `evFile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblsubadminremark`
--

INSERT INTO `tblsubadminremark` (`id`, `ComplainNumber`, `ComplainStatus`, `ComplainRemark`, `RemarkBy`, `PostingDate`, `evFile`) VALUES
(71, 1000148, 'closed', 'Ok', 0, '2023-09-14 17:28:44', NULL),
(72, 1000147, 'closed', 'Jh', 0, '2023-09-14 17:29:09', NULL),
(73, 1000153, 'closed', 'Hgg', 0, '2023-09-14 17:44:06', NULL),
(74, 1000154, 'closed', 'Hgy', 0, '2023-09-14 17:44:27', NULL),
(75, 1000159, 'closed', 'drfgf', 14, '2023-09-16 05:34:04', NULL),
(76, 1000150, 'new', 'f', 11, '2023-09-20 14:44:53', NULL),
(77, 1000150, 'in process', 'n', 11, '2023-09-20 14:59:28', NULL),
(78, 1000150, 'in process', 'hh', 11, '2023-09-20 15:01:00', NULL),
(79, 1000150, 'in process', 'h', 11, '2023-09-20 15:02:53', NULL),
(80, 1000162, 'in process', 'j', 11, '2023-09-20 15:05:38', NULL),
(81, 1000162, 'closed', 'h', 11, '2023-09-20 15:07:16', NULL),
(82, 1000163, 'in process', 'in process ahe', 11, '2023-09-20 17:22:51', NULL),
(83, 1000163, 'in process', 'dff', 11, '2023-09-20 18:01:30', NULL),
(84, 1000163, 'in process', 'jj', 11, '2023-09-20 18:05:00', NULL),
(85, 1000163, 'new', 'f', 11, '2023-09-21 14:53:14', NULL),
(86, 1000163, 'closed', 'cd', 11, '2023-09-21 14:54:43', NULL),
(87, 1000165, 'closed', 'cosed zali', 11, '2023-09-23 10:39:14', NULL),
(88, 1000166, 'closed', 'hjbhjvh', 14, '2023-09-23 14:42:13', NULL),
(89, 1000152, 'in process', 'ok', 11, '2023-09-23 14:48:29', NULL),
(90, 1000168, 'closed', 'done', 11, '2024-02-18 11:19:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(218, 697, 'mahesh', 0x323430313a343930303a316334323a33, '2023-09-12 16:29:08', '', 1),
(219, 0, '821B20040', 0x3130332e35312e3135342e3734000000, '2023-09-12 17:22:17', '', 0),
(220, 0, 'mahesh', 0x3130332e35312e3135342e3734000000, '2023-09-13 03:27:03', '', 0),
(221, 697, 'mahesh', 0x3130332e35312e3135342e3734000000, '2023-09-13 03:27:17', '13-09-2023 08:58:46 AM', 1),
(222, 697, 'mahesh', 0x3130332e35312e3135342e3734000000, '2023-09-13 03:28:55', '13-09-2023 09:19:08 AM', 1),
(223, 0, '821B20040', 0x3130332e35312e3135342e3734000000, '2023-09-13 05:28:33', '', 0),
(224, 1, '821B20040', 0x3130332e35312e3135342e3734000000, '2023-09-13 05:44:24', '13-09-2023 11:16:04 AM', 1),
(225, 0, 'admin', 0x3130332e35312e3135342e3734000000, '2023-09-13 05:46:18', '', 0),
(226, 0, '821B20040', 0x3130332e35312e3135342e3734000000, '2023-09-13 05:46:30', '', 0),
(227, 1, '821B20040', 0x3130332e35312e3135342e3734000000, '2023-09-13 05:46:57', '', 1),
(228, 1, '821B20040', 0x3130332e35312e3135342e3734000000, '2023-09-13 06:08:57', '', 1),
(229, 0, '821B2004', 0x3130332e35312e3135342e3734000000, '2023-09-13 06:11:44', '', 0),
(230, 1, '821B20040', 0x3130332e35312e3135342e3734000000, '2023-09-13 06:12:04', '', 1),
(231, 1, '821B20040', 0x3130332e3130392e31322e3234330000, '2023-09-13 09:43:24', '13-09-2023 03:15:14 PM', 1),
(232, 1, '821B20040', 0x3130332e3130392e31322e3234330000, '2023-09-13 09:46:25', '', 1),
(233, 1, '821B20040', 0x3130332e3130392e31322e3234330000, '2023-09-13 09:46:26', '', 1),
(234, 1, '821B20040', 0x323430313a343930303a373937333a31, '2023-09-14 12:08:57', '', 1),
(235, 1, '821B20040', 0x3130332e35312e3135342e3739000000, '2023-09-14 15:27:45', '', 1),
(236, 697, 'mahesh', 0x323430313a343930303a316334323a33, '2023-09-14 15:28:09', '', 1),
(237, 0, 'admin', 0x3130332e35312e3135342e3734000000, '2023-09-14 15:29:10', '', 0),
(238, 1, '821B20040', 0x3130332e35312e3135342e3734000000, '2023-09-14 15:29:16', '', 1),
(239, 1, '821B20040', 0x3130332e35312e3135342e3739000000, '2023-09-14 15:29:59', '', 1),
(240, 1, '821B20040', 0x3130332e35312e3135342e3739000000, '2023-09-14 16:30:48', '', 1),
(241, 697, 'mahesh', 0x323430313a343930303a316334323a33, '2023-09-14 16:34:02', '14-09-2023 10:22:05 PM', 1),
(242, 0, '821B20040', 0x3130332e35312e3135342e3739000000, '2023-09-14 16:37:52', '', 0),
(243, 1, '821B20040', 0x3130332e35312e3135342e3739000000, '2023-09-14 16:46:12', '', 1),
(244, 1, '821B20040', 0x3130332e35312e3135342e3739000000, '2023-09-14 16:49:40', '14-09-2023 10:21:07 PM', 1),
(245, 1, '821B20040', 0x3130332e35312e3135342e3739000000, '2023-09-14 16:51:27', '14-09-2023 10:21:52 PM', 1),
(246, 1, '821B20040', 0x3130332e35312e3135342e3739000000, '2023-09-14 16:59:47', '14-09-2023 10:30:27 PM', 1),
(247, 1, '821B20040', 0x3130332e35312e3135342e3739000000, '2023-09-14 17:01:38', '14-09-2023 10:33:28 PM', 1),
(248, 1, '821B20040', 0x3130332e35312e3135342e3739000000, '2023-09-14 17:08:44', '14-09-2023 10:41:16 PM', 1),
(249, 1, '821B20040', 0x3130332e35312e3135342e3734000000, '2023-09-14 17:25:49', '', 1),
(250, 1, '821B20040', 0x3130332e35312e3135342e3734000000, '2023-09-14 17:26:30', '', 1),
(251, 1, '821B20040', 0x3130332e35312e3135342e3734000000, '2023-09-14 17:27:12', '', 1),
(252, 1, '821B20040', 0x3130332e35312e3135342e3734000000, '2023-09-14 17:29:42', '', 1),
(253, 1, '821B20040', 0x3130332e35312e3135342e3739000000, '2023-09-14 17:30:42', '14-09-2023 11:01:07 PM', 1),
(254, 697, 'mahesh', 0x323430313a343930303a316334323a33, '2023-09-14 17:48:41', '', 1),
(255, 697, 'mahesh', 0x323430313a343930303a316334323a33, '2023-09-14 18:03:23', '15-09-2023 12:08:05 AM', 1),
(256, 1, '821B20040', 0x3130332e3130392e31322e3234330000, '2023-09-15 03:54:53', '', 1),
(257, 1, '821B20040', 0x3130332e3130392e31322e3234330000, '2023-09-15 03:56:16', '15-09-2023 09:28:31 AM', 1),
(258, 697, 'mahesh', 0x3130332e3130392e31322e3234330000, '2023-09-15 03:57:23', '15-09-2023 09:34:53 AM', 1),
(259, 1, '821B20040', 0x3130332e3130392e31322e3234330000, '2023-09-15 04:24:39', '15-09-2023 09:55:10 AM', 1),
(260, 1, '821B20040', 0x3130332e3130392e31322e3234330000, '2023-09-15 04:29:14', '15-09-2023 09:59:27 AM', 1),
(261, 1, '821B20040', 0x3130332e3130392e31322e3234330000, '2023-09-15 07:50:46', '', 1),
(262, 1, '821B20040', 0x323430393a343038313a326430313a64, '2023-09-15 09:13:16', '', 1),
(263, 1, '821B20040', 0x3130332e3130392e31322e3234330000, '2023-09-15 09:36:26', '15-09-2023 03:09:19 PM', 1),
(264, 1, '821B20040', 0x3130332e35312e3135342e3734000000, '2023-09-15 10:08:03', '15-09-2023 03:38:11 PM', 1),
(265, 1, '821B20040', 0x3130332e35312e3135342e3734000000, '2023-09-15 10:09:02', '', 1),
(266, 0, '72153229C', 0x34352e3235322e37332e313437000000, '2023-09-15 12:55:47', '', 0),
(267, 0, '1810510283', 0x3130332e3133332e3132342e34330000, '2023-09-16 03:37:50', '', 0),
(268, 0, '1810510283', 0x3130332e3133332e3132342e34330000, '2023-09-16 03:42:03', '', 0),
(269, 1, '821B20040', 0x3130332e3130392e31322e3234330000, '2023-09-16 05:22:25', '16-09-2023 10:57:26 AM', 1),
(270, 1, '821B20040', 0x3130332e3130392e31322e3234330000, '2023-09-16 05:35:08', '16-09-2023 11:57:46 AM', 1),
(271, 0, '821B20040', 0x323430313a343930303a373937333a31, '2023-09-16 07:06:54', '', 0),
(272, 0, '821B200040', 0x323430313a343930303a373937333a31, '2023-09-16 07:07:10', '', 0),
(273, 0, '821B200040', 0x3130332e35312e3135342e3739000000, '2023-09-16 09:38:15', '', 0),
(274, 0, '821B200040', 0x3130332e35312e3135342e3739000000, '2023-09-16 09:54:43', '', 0),
(275, 0, '821B20040', 0x3130332e35312e3135342e3739000000, '2023-09-16 10:00:12', '', 0),
(276, 0, '821B20040', 0x3130332e35312e3135342e3739000000, '2023-09-16 10:00:18', '', 0),
(277, 1, '821B20040', 0x3130332e35312e3135342e3739000000, '2023-09-16 10:00:51', '16-09-2023 03:31:09 PM', 1),
(278, 0, '821B200040', 0x3130332e35312e3135342e3739000000, '2023-09-16 10:05:48', '', 0),
(279, 0, 'Admin', 0x323430323a653238303a336531353a38, '2023-09-16 12:07:19', '', 0),
(280, 0, '821B20040', 0x3130332e35312e3135342e3735000000, '2023-09-17 07:00:38', '', 0),
(281, 1, '821B20040', 0x3130332e35312e3135342e3735000000, '2023-09-17 07:01:06', '', 1),
(282, 0, '821B200040', 0x3130332e35312e3135342e3739000000, '2023-09-17 08:21:08', '', 0),
(283, 1, '821B20040', 0x3130332e35312e3135342e3739000000, '2023-09-17 08:21:37', '', 1),
(284, 1, '821B20040', 0x3130332e35312e3135342e3739000000, '2023-09-17 08:30:16', '17-09-2023 02:04:50 PM', 1),
(285, 1, '821B20040', 0x3130332e35312e3135342e3739000000, '2023-09-17 08:35:09', '17-09-2023 02:05:28 PM', 1),
(286, 1, '821B20040', 0x3130332e3135312e3233342e36360000, '2023-09-17 08:42:54', '', 1),
(287, 0, '821B20040', 0x3130332e35312e3135342e3734000000, '2023-09-17 14:37:18', '', 0),
(288, 1, '821B20040', 0x3130332e35312e3135342e3739000000, '2023-09-18 04:09:40', '18-09-2023 09:40:34 AM', 1),
(289, 697, 'mahesh', 0x323430313a343930303a316334333a39, '2023-09-20 14:16:53', '20-09-2023 08:10:22 PM', 1),
(290, 697, 'mahesh', 0x323430313a343930303a316334333a39, '2023-09-20 14:51:36', '20-09-2023 08:34:07 PM', 1),
(291, 697, 'mahesh', 0x323430313a343930303a316334333a39, '2023-09-20 15:06:32', '', 1),
(292, 697, 'Mahesh', 0x323430313a343930303a316334333a39, '2023-09-20 17:08:56', '', 1),
(293, 697, 'mahesh', 0x323430313a343930303a316334333a39, '2023-09-20 17:16:50', '', 1),
(294, 697, 'mahesh', 0x323430313a343930303a316334333a39, '2023-09-20 17:23:13', '', 1),
(295, 697, 'mahesh', 0x323430313a343930303a316331363a37, '2023-09-21 14:45:49', '', 1),
(296, 697, 'mahesh', 0x323430313a343930303a316331363a37, '2023-09-21 16:42:28', '', 1),
(297, 1, '821B20040', 0x3130332e35312e3135342e3831000000, '2023-09-21 17:19:05', '21-09-2023 10:50:46 PM', 1),
(298, 0, 'mahesh', 0x3130332e35312e3135342e3734000000, '2023-09-21 18:20:06', '', 0),
(299, 697, 'Mahesh', 0x3130332e35312e3135342e3734000000, '2023-09-21 18:20:27', '', 1),
(300, 697, 'Mahesh', 0x3130332e35312e3135342e3734000000, '2023-09-21 18:20:45', '21-09-2023 11:51:36 PM', 1),
(301, 697, 'mahesh', 0x323430313a343930303a316334333a39, '2023-09-21 18:24:14', '', 1),
(302, 1, '821B20040', 0x3130332e35312e3135342e3739000000, '2023-09-21 18:27:18', '21-09-2023 11:57:47 PM', 1),
(303, 697, 'Mahesh', 0x3130332e35312e3135342e3734000000, '2023-09-21 18:27:45', '22-09-2023 12:00:00 AM', 1),
(304, 1, '821B20040', 0x3130332e35312e3135342e3739000000, '2023-09-21 18:29:43', '21-09-2023 11:59:56 PM', 1),
(305, 697, 'mahesh', 0x3130332e35312e3135342e3734000000, '2023-09-22 03:16:59', '22-09-2023 08:48:06 AM', 1),
(306, 697, 'mahesh', 0x323430313a343930303a316334333a39, '2023-09-22 15:51:18', '', 1),
(307, 697, 'Mahesh', 0x3130332e35312e3135342e3734000000, '2023-09-22 17:39:56', '', 1),
(308, 697, 'Mahesh', 0x3130332e35312e3135342e3734000000, '2023-09-22 17:40:13', '', 1),
(309, 1, '821B20040', 0x3130332e35312e3135342e3739000000, '2023-09-22 17:45:50', '', 1),
(310, 1, '821B20040', 0x3130332e35312e3135342e3739000000, '2023-09-22 17:45:53', '', 1),
(311, 1, '821B20040', 0x323430323a653238303a336531353a38, '2023-09-22 17:48:55', '', 1),
(312, 1, '821B20040', 0x3130332e35312e3135342e3739000000, '2023-09-22 17:51:12', '', 1),
(313, 1, '821B20040', 0x3130332e35312e3135342e3739000000, '2023-09-22 17:51:18', '', 1),
(314, 697, 'Mahesh', 0x323430313a343930303a316334333a39, '2023-09-22 17:54:10', '22-09-2023 11:31:16 PM', 1),
(315, 697, 'Mahesh', 0x323430313a343930303a353266643a35, '2023-09-23 04:22:05', '', 1),
(316, 697, 'Mahesh', 0x3130332e3130392e31322e3234330000, '2023-09-23 07:47:16', '', 1),
(317, 697, 'Mahesh', 0x3130332e3130392e31322e3234330000, '2023-09-23 07:47:32', '23-09-2023 01:18:27 PM', 1),
(318, 697, 'mahesh', 0x323430313a343930303a316334353a31, '2023-09-23 10:29:47', '23-09-2023 04:02:44 PM', 1),
(319, 1, '821B20040', 0x3130332e35312e3135342e3734000000, '2023-09-23 14:35:20', '23-09-2023 08:08:01 PM', 1),
(320, 1, '821B20040', 0x3130332e35312e3135342e3734000000, '2023-09-23 14:42:50', '23-09-2023 08:13:39 PM', 1),
(321, 1, '821B20040', 0x3130332e35312e3135342e3734000000, '2023-09-23 14:43:49', '23-09-2023 08:14:57 PM', 1),
(322, 697, 'mahesh', 0x323430313a343930303a316334353a31, '2023-09-24 14:51:58', '', 1),
(323, 0, '5834194834038', 0x3130362e3231362e3234312e33350000, '2023-09-25 15:23:47', '', 0),
(324, 0, '5834194834038', 0x3130362e3231362e3234312e33350000, '2023-09-25 15:28:22', '', 0),
(325, 0, '2164191242019', 0x3130362e3231362e3234312e33350000, '2023-09-25 16:02:44', '', 0),
(326, 697, 'mahesh', 0x323430313a343930303a353330393a39, '2023-10-02 11:55:17', '', 1),
(327, 0, 'admin', 0x323430313a343930303a353330393a39, '2023-10-02 13:40:58', '', 0),
(328, 697, 'mahesh', 0x323430313a343930303a353033353a65, '2023-10-02 16:33:08', '02-10-2023 10:03:16 PM', 1),
(329, 697, 'mahesh', 0x323430313a343930303a353266663a38, '2023-10-04 12:25:03', '', 1),
(330, 697, 'mahesh', 0x323430313a343930303a353266663a38, '2023-10-04 12:25:04', '', 1),
(331, 697, 'mahesh', 0x323430313a343930303a353266663a38, '2023-10-04 12:27:48', '', 1),
(332, 0, '821B20040', 0x3130332e35312e3135342e3738000000, '2023-10-12 16:08:56', '', 0),
(333, 1, '821B20040', 0x3130332e35312e3135342e3738000000, '2023-10-13 17:46:02', '', 1),
(334, 697, 'mahesh', 0x323430313a343930303a316334353a31, '2023-10-14 08:38:49', '', 1),
(335, 697, 'mahesh', 0x323430313a343930303a316334353a31, '2023-10-14 08:38:49', '', 1),
(336, 697, 'mahesh', 0x323430393a343063323a313136613a31, '2023-11-03 08:18:09', '', 1),
(337, 697, 'mahesh', 0x323430393a343063323a313136613a31, '2023-11-03 08:18:09', '03-11-2023 01:59:27 PM', 1),
(338, 1, '821B20040', 0x323430393a343038313a313538393a64, '2023-11-13 15:06:09', '13-11-2023 08:36:23 PM', 1),
(339, 697, 'mahesh', 0x323430313a343930303a316331373a63, '2023-11-20 16:54:40', '', 1),
(340, 697, 'mahesh', 0x323430313a343930303a353630353a38, '2023-11-21 05:01:53', '', 1),
(341, 697, 'mahesh', 0x3130332e3130392e31322e3235300000, '2023-11-23 05:39:28', '23-11-2023 11:11:04 AM', 1),
(342, 1, '821B20040', 0x3130332e35312e3135342e3732000000, '2024-02-16 18:16:31', '16-02-2024 11:47:49 PM', 1),
(343, 1, '821B20040', 0x3130332e35312e3135342e3732000000, '2024-02-16 18:23:55', '16-02-2024 11:54:10 PM', 1),
(344, 1, '821B20040', 0x3130332e35312e3135342e3732000000, '2024-02-16 18:32:18', '17-02-2024 12:04:03 AM', 1),
(345, 0, '845792', 0x323430313a343930303a313937313a62, '2024-02-18 10:53:40', '', 0),
(346, 0, '821B2004', 0x323430313a343930303a313937313a62, '2024-02-18 10:54:04', '', 0),
(347, 0, '821B2004', 0x323430313a343930303a313937313a62, '2024-02-18 10:54:20', '', 0),
(348, 0, '94457', 0x323430313a343930303a313937313a62, '2024-02-18 11:02:58', '', 0),
(349, 0, '94457', 0x323430313a343930303a313937313a62, '2024-02-18 11:03:37', '', 0),
(350, 1, '821B20040', 0x323430313a343930303a313937313a62, '2024-02-18 11:03:56', '18-02-2024 04:34:55 PM', 1),
(351, 1, '821B20040', 0x323430313a343930303a313937313a62, '2024-02-18 11:05:03', '18-02-2024 04:42:27 PM', 1),
(352, 0, '2020033700023125', 0x323430393a343038313a313430363a61, '2024-02-18 11:54:59', '', 0),
(353, 697, 'mahesh', 0x323430313a343930303a353761383a31, '2024-02-19 03:59:39', '', 1),
(354, 0, '2020033700023160', 0x323430313a343930303a316334343a33, '2024-02-19 06:20:00', '', 0),
(355, 0, '2020033700023160', 0x323430313a343930303a316334343a33, '2024-02-19 06:21:55', '', 0),
(356, 1, '821B20040', 0x323430313a343930303a316334343a33, '2024-02-19 06:23:38', '19-02-2024 11:55:48 AM', 1),
(357, 0, '821B20040', 0x3232332e3233332e38342e3338000000, '2024-02-19 08:14:53', '', 0),
(358, 1, '821B20040', 0x3232332e3233332e38342e3338000000, '2024-02-19 08:26:43', '19-02-2024 02:00:17 PM', 1),
(359, 0, ' 821B20040', 0x323430393a343038313a6438353a6262, '2024-02-19 13:38:47', '', 0),
(360, 0, '2564987325698425', 0x323430313a343930303a353761343a38, '2024-02-19 15:58:46', '', 0),
(361, 0, '2564987325698425', 0x323430313a343930303a353761343a38, '2024-02-19 16:03:58', '', 0),
(362, 0, '94457', 0x323430313a343930303a353761343a38, '2024-02-19 16:05:52', '', 0),
(363, 0, '94457', 0x323430313a343930303a353761343a38, '2024-02-19 16:07:12', '', 0),
(364, 0, 'Trial', 0x323430313a343930303a353761343a38, '2024-02-19 16:15:17', '', 0),
(365, 1, '821B20040', 0x323430313a343930303a353761343a38, '2024-02-19 16:36:56', '19-02-2024 10:09:45 PM', 1),
(366, 1, '821B20040', 0x323430313a343930303a353761343a38, '2024-02-19 16:51:07', '19-02-2024 10:21:22 PM', 1),
(367, 1, '821B20040', 0x323430313a343930303a353761343a38, '2024-02-19 17:07:24', '', 1),
(368, 1, '821B20040', 0x323430313a343930303a353761343a38, '2024-02-19 17:07:24', '19-02-2024 10:37:39 PM', 1),
(369, 1, '821B20040', 0x3130332e35312e3135342e3732000000, '2024-02-19 17:37:06', '', 1),
(370, 0, 'mahesh', 0x323430313a343930303a316334343a62, '2024-02-20 03:12:24', '', 0),
(371, 0, 'mahesh', 0x323430313a343930303a316334343a62, '2024-02-20 03:12:31', '', 0),
(372, 0, 'mahesh', 0x323430313a343930303a316334343a62, '2024-02-20 03:12:38', '', 0),
(373, 1, '821B20040', 0x323430313a343930303a316334343a62, '2024-02-20 03:13:55', '', 1),
(374, 0, 'mahesh', 0x323430313a343930303a316334343a62, '2024-02-20 03:16:30', '', 0),
(375, 0, 'mahesh', 0x323430313a343930303a316334343a62, '2024-02-20 03:16:39', '', 0),
(376, 0, 'mahesh', 0x323430313a343930303a316334343a62, '2024-02-20 03:18:58', '', 0),
(377, 697, 'mahesh', 0x323430313a343930303a316334343a62, '2024-02-20 03:19:04', '', 1),
(378, 1, '821B20040', 0x323430313a343930303a316334343a62, '2024-02-20 03:43:24', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contactNo` bigint(11) DEFAULT NULL,
  `userImage` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `username` varchar(28) NOT NULL,
  `token` varchar(30) NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `city` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `userEmail`, `password`, `contactNo`, `userImage`, `regDate`, `updationDate`, `status`, `username`, `token`, `updated_time`, `city`, `address`, `pincode`) VALUES
(1, 'Monali Mankar', 'saurabhkarande001@gmail.com', '821B20040', 78418109011, '', '2023-08-18 18:30:00', '2023-08-18 18:30:00', 1, '821B20040', 'X8LHAC7RFU', '0000-00-00 00:00:00', 'Talegaon', 'Pune', '410507'),
(697, 'Mahesh Anant Yadav', 'mahesh.yadav250502@gmail.com', '789', 9359840399, '', '2023-08-28 13:25:59', NULL, 1, 'mahesh', '1UP5OHE8KQ', '0000-00-00 00:00:00', 'mahesh', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `code` varchar(10) NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `code_expiration` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`user_id`, `email`, `password`, `code`, `updated_time`, `code_expiration`) VALUES
(121, 'mahesh.yadav250502@gmail.com', '456', 'M4ZGATEC1H', '2023-08-29 16:04:56', NULL),
(122, 'ishwar7702@gmail.com', '123', 'AKBLUFSI7G', '2023-09-08 19:09:45', 1694200168);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaintremark`
--
ALTER TABLE `complaintremark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currenttime`
--
ALTER TABLE `currenttime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Principal`
--
ALTER TABLE `Principal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `priority`
--
ALTER TABLE `priority`
  ADD PRIMARY KEY (`priorityId`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  ADD PRIMARY KEY (`complaintNumber`);

--
-- Indexes for table `tblforwardhistory`
--
ALTER TABLE `tblforwardhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubadmin`
--
ALTER TABLE `tblsubadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubadminremark`
--
ALTER TABLE `tblsubadminremark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `complaintremark`
--
ALTER TABLE `complaintremark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `currenttime`
--
ALTER TABLE `currenttime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `Principal`
--
ALTER TABLE `Principal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `priority`
--
ALTER TABLE `priority`
  MODIFY `priorityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tblcomplaints`
--
ALTER TABLE `tblcomplaints`
  MODIFY `complaintNumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000169;

--
-- AUTO_INCREMENT for table `tblforwardhistory`
--
ALTER TABLE `tblforwardhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tblsubadmin`
--
ALTER TABLE `tblsubadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblsubadminremark`
--
ALTER TABLE `tblsubadminremark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=379;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8141;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
