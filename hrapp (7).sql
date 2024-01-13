-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2023 at 11:53 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `addprofile`
--

CREATE TABLE `addprofile` (
  `sno` int(10) NOT NULL,
  `bioid` varchar(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `DOB` date NOT NULL,
  `jobtype` varchar(60) NOT NULL,
  `designation` varchar(60) NOT NULL,
  `department` varchar(60) NOT NULL,
  `experience` varchar(60) NOT NULL,
  `password` varchar(40) NOT NULL,
  `shift` varchar(20) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addprofile`
--

INSERT INTO `addprofile` (`sno`, `bioid`, `name`, `email`, `phonenumber`, `DOB`, `jobtype`, `designation`, `department`, `experience`, `password`, `shift`, `image`) VALUES
(3, '192011094', 'harish', 'hari7708861310@gmail.com', 808708298, '2002-03-02', 'select', 'tl', 'it', '3 years', '123user123', 'shift2', 'uploads/profile65573f2aa3613getstart.png'),
(4, '123qwe', 'raju', 'raju@gmail.com', 93939399, '2023-09-01', 'intern', 'tl', 'it', '3 years', '123qwe', 'shift2', 'uploads/profile65573f2aa3613getstart.png'),
(5, '192011211', 'raaghav', 'raaghav@gmail.com', 2147483647, '2023-09-14', 'permanent', 'tl', 'finance', '3 years', '123', 'shift3', 'uploads/profile65573f2aa3613getstart.png'),
(9, '14131313', 'maya', '13131@mail.com', 2147483647, '0000-00-00', 'intern', 'summa', 'art', '2years', '123asd', 'shift2', 'uploads/profile65573f2aa3613getstart.png'),
(10, '14151313', 'lqlqlq', '13131@mail.com', 2147483647, '0000-00-00', 'intern', 'summa', 'art', '2years', '123asd', 'shift2', 'uploads/profile65573f2aa3613getstart.png'),
(15, '192011114', 'karan', 'karan2k@maikd.com', 2147483647, '0000-00-00', 'intern', 'summa', 'art', '2 years', '123321', 'shift2', 'uploads/profile65573f2aa3613getstart.png'),
(17, '123rty', 'John Doe', 'john.doe@example.com', 1234567890, '0000-00-00', 'Full-time', 'Software Engineer', 'IT', '5 years', '123', 'Shift 2', 'uploads/profile65573f2aa3613getstart.png'),
(18, '1111', 'qqqq', 'qqqq@gmail.com', 992299229, '0000-00-00', 'Permanent', 'to', 'it', '3 years', '123', 'Shift 3', 'uploads/profile65573f2aa3613getstart.png'),
(34, '31124', 'Rajakumar', 'rajakuma.rk360@gmail.com', 32323232, '2023-11-08', 'intern', 'ss', 'ee', '6', '33', 'shift1', 'uploads/profile65573f2aa3613getstart.png'),
(61, '1919192', 'jenny', 'hgb@gmail.com', 2147483647, '2001-11-16', 'permanent', 'intern', 'iOS', '34year', '123', 'shift2', 'uploads/profile65645110b4673item-210516-ab8e9ef52f.jpg'),
(98, 'zxzsscs', 'sfscsr', 'qwqwssds', 3434343, '2002-03-03', 'sdsdd', 'aaass', 'sdsdsdss', '34', '12qw', 'shift1', 'uploads/profile658021a4bb040.jpg'),
(110, 'zxzsscs', 'sfscsr', 'qwqwssds', 3434343, '2002-03-03', 'sdsdd', 'aaass', 'sdsdsdss', '34', '12qw', 'shift1', 'uploads/profile6583bac04b182.jpg'),
(117, '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 'uploads/profile_6583c7572f56c.png'),
(118, ' [Your bioid value]', ' [Your name value]', ' [Your email value]', 0, '0000-00-00', ' [Your jobtype value]', ' [Your designation value]', ' [Your department value]', ' [Your experience value]', ' [Your password value]', ' [Your shift value]', 'uploads/profile_6583d0194cd15.png'),
(119, 'ssdsd', ' [Your name value]', ' [Your email value]', 0, '0000-00-00', ' [Your jobtype value]', ' [Your designation value]', ' [Your department value]', ' [Your experience value]', ' [Your password value]', ' [Your shift value]', 'uploads/profile_6583d04849835.png'),
(120, '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 'uploads/profile_6583d214b0314.png'),
(121, '', '', '', 0, '0000-00-00', '', '', '', '', '', '', 'uploads/profile_658a56800e69d.png');

-- --------------------------------------------------------

--
-- Table structure for table `adjusted_leave_count`
--

CREATE TABLE `adjusted_leave_count` (
  `id` int(11) DEFAULT NULL,
  `bioid` varchar(255) DEFAULT NULL,
  `leavetype` varchar(255) DEFAULT NULL,
  `adjusted_count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adjusted_leave_count`
--

INSERT INTO `adjusted_leave_count` (`id`, `bioid`, `leavetype`, `adjusted_count`) VALUES
(NULL, '123qwe', 'Sick Leave', 9),
(NULL, '123qwe', 'Sick Leave', 7),
(NULL, '123qwe', 'Casual Leave', 9);

-- --------------------------------------------------------

--
-- Table structure for table `applyleave`
--

CREATE TABLE `applyleave` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `bioid` varchar(100) NOT NULL,
  `title` varchar(60) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `leavetype` varchar(60) NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `reason` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applyleave`
--

INSERT INTO `applyleave` (`sno`, `bioid`, `title`, `startdate`, `enddate`, `leavetype`, `phonenumber`, `reason`) VALUES
(3, '192011095', 'Maternity Leave', '2023-12-10', '2023-12-20', 'Maternity', 876543210, 'Expecting a baby'),
(21, '123456', 'Vacation', '2023-11-01', '2023-11-07', 'Paid Leave', 123, 'Vacation in Europe'),
(64, '123qwe', 'p;kkg', '2023-12-15', '2023-12-15', 'Maternity Leave', 2147483647, 'dsfavc sdad'),
(65, '123qwe', 'dsfdsd', '2023-12-07', '2023-12-09', 'Maternity Leave', 2147483647, 'dsfd dsdxs dszs'),
(66, '123qwe', 'dsfkjdsojkldsl', '2023-12-12', '2023-12-12', 'Maternity Leave', 2147483647, 'dsvd dwsds');

-- --------------------------------------------------------

--
-- Table structure for table `applypermission`
--

CREATE TABLE `applypermission` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `bioid` varchar(40) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `starttime` time DEFAULT NULL,
  `endtime` time DEFAULT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `reason` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applypermission`
--

INSERT INTO `applypermission` (`sno`, `bioid`, `title`, `date`, `starttime`, `endtime`, `phonenumber`, `reason`) VALUES
(1, 'a123', 'fkam;f.', '2023-09-13', '12:17:09', '30:17:09', '903090293', 'dfdmnflasmd'),
(2, 'B234', 'Presentation', '2023-10-12', '02:00:00', '04:00:00', '9876543210', 'Internal team briefing'),
(3, 'C345', 'Training', '2023-10-15', '10:30:00', '01:00:00', '1112223333', 'Product training session'),
(4, 'D456', 'Workshop', '2023-10-18', '03:00:00', '05:30:00', '4445556666', 'Skill development workshop'),
(5, 'E567', 'Conference', '2023-10-20', '11:00:00', '03:00:00', '7778889999', 'Industry conference'),
(6, 'F678', 'Seminar', '2023-10-22', '01:30:00', '04:30:00', '2223334444', 'Educational seminar'),
(15, '123qwe', 'qspslsp,', '2023-11-25', '11:44:00', '12:49:00', '9834897483', 'lslal,lm dla;kdal sdlsdk '),
(16, '123qwe', 'plolj dom', '2023-11-25', '11:45:00', '12:45:00', '9834897483', 'e dikdmsl skd kdlk dksdk k');

-- --------------------------------------------------------

--
-- Table structure for table `approvedleave`
--

CREATE TABLE `approvedleave` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `bioid` varchar(40) NOT NULL,
  `title` varchar(100) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `leavetype` varchar(60) NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `reason` varchar(60) NOT NULL,
  `no_of_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `approvedleave`
--

INSERT INTO `approvedleave` (`sno`, `bioid`, `title`, `startdate`, `enddate`, `leavetype`, `phonenumber`, `reason`, `no_of_days`) VALUES
(36, '123qwe', '12121sdds', '2023-12-07', '2023-12-08', 'Comp-off', 2147483647, 'ddddfcd', 2),
(37, '123qwe', 'qqqqq', '2023-11-24', '2023-11-24', 'Comp-off', 2147483647, 'sasas', 1),
(38, '123qwe', 'sdsdsd', '2023-11-20', '2023-11-21', 'Casual Leave', 0, 'sdsdsdff', 2),
(39, '123qwe', 'sdsds', '2023-11-20', '2023-11-21', 'Sick Leave', 0, 'wdsd', 2),
(40, '123qwe', 'gfuggiu', '2023-12-07', '2023-12-07', 'Sick Leave', 2147483647, 'hghj', 1),
(41, '123qwe', 'aasass', '2023-12-11', '2023-12-12', 'Sick Leave', 2147483647, 'sfdsfsdfsdg', 2),
(42, '123qwe', 'allal', '2023-12-13', '2023-12-13', 'Casual Leave', 2147483647, 'dsfsf', 1),
(43, '192011094', 'gkygiki', '2023-12-13', '2023-12-13', 'Sick Leave', 2147483647, 'hgvhgkuhplkn hnjln', 0);

-- --------------------------------------------------------

--
-- Table structure for table `approvedpermission`
--

CREATE TABLE `approvedpermission` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `bioid` varchar(40) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `starttime` time NOT NULL,
  `endtime` time NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `reason` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `approvedpermission`
--

INSERT INTO `approvedpermission` (`sno`, `bioid`, `title`, `date`, `starttime`, `endtime`, `phonenumber`, `reason`) VALUES
(1, 'A123', 'Meeting', '2023-10-10', '09:00:00', '11:00:00', 1234567890, 'Client discussion'),
(2, '123qwe', 'jajaj', '0000-00-00', '00:00:00', '00:00:00', 0, ''),
(3, '123qwe', '', '0000-00-00', '00:00:00', '00:00:00', 0, ''),
(4, '123qwe', '', '0000-00-00', '00:00:00', '00:00:00', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `bioid` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `workhrs` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`bioid`, `date`, `status`, `workhrs`) VALUES
('123qwe', '2023-11-01', 'present', 8),
('123qwe', '2023-11-02', 'absent', 8),
('123qwe', '2023-11-03', 'late', 7.7),
('123qwe', '2023-11-04', 'present', 8),
('123qwe', '2023-11-05', 'absent', 8),
('123qwe', '2023-11-06', 'present', 8),
('123qwe', '2023-11-07', 'late', 7.7),
('123qwe', '2023-11-08', 'present', 8),
('123qwe', '2023-11-09', 'absent', 8),
('123qwe', '2023-11-10', 'late', 7.7),
('123qwe', '2023-11-11', 'present', 8),
('123qwe', '2023-11-12', 'absent', 8),
('123qwe', '2023-11-13', 'present', 8),
('123qwe', '2023-11-14', 'late', 7.7),
('123qwe', '2023-11-15', 'present', 8),
('123qwe', '2023-11-16', 'absent', 8),
('123qwe', '2023-11-17', 'late', 7.7),
('123qwe', '2023-11-18', 'present', 8),
('123qwe', '2023-11-19', 'absent', 8),
('123qwe', '2023-11-20', 'late', 7.7),
('192011094', '2023-11-01', 'present', 8),
('192011094', '2023-11-02', 'present', 8),
('192011094', '2023-11-03', 'absent', 8),
('192011094', '2023-11-04', 'present', 8),
('192011094', '2023-11-05', 'absent', 8),
('192011094', '2023-11-06', 'present', 8),
('192011094', '2023-11-07', 'present', 8),
('192011094', '2023-11-08', 'absent', 8),
('192011094', '2023-11-09', 'present', 8),
('192011094', '2023-11-10', 'absent', 8),
('192011094', '2023-11-11', 'present', 8),
('192011094', '2023-11-12', 'absent', 8),
('192011094', '2023-11-13', 'present', 8),
('192011094', '2023-11-14', 'present', 8),
('192011094', '2023-11-15', 'absent', 8),
('192011094', '2023-11-16', 'present', 8),
('192011094', '2023-11-17', 'absent', 8),
('192011094', '2023-11-18', 'present', 8),
('192011094', '2023-11-19', 'present', 8),
('192011094', '2023-11-20', 'absent', 8),
('123qwe', '2023-11-30', 'present', 8),
('123qwe', '2023-11-22', 'nil', 8),
('123qwe', '2023-11-23', 'nil', 8),
('123qwe', '2023-11-24', 'nil', 8),
('123qwe', '2023-11-25', 'nil', 8),
('123qwe', '2023-11-26', 'nil', 8),
('123qwe', '2023-11-27', 'nil', 8),
('123qwe', '2023-11-28', 'nil', 8),
('123qwe', '2023-11-29', 'nil', 8),
('123qwe', '2023-11-30', 'nil', 8),
('123qwe', '2023-11-21', 'nil', 8);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `department` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`sno`, `department`) VALUES
(1, 'finance'),
(2, 'it'),
(7, 'live'),
(9, 'cse'),
(12, 'hr'),
(15, 'mygreatlearning.com'),
(16, 'training'),
(17, 'iOS');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `Sno` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Day` varchar(20) DEFAULT NULL,
  `HolidayName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`Sno`, `Date`, `Day`, `HolidayName`) VALUES
(1, '2023-01-01', 'Sunday', 'New Year Day'),
(2, '2023-01-15', 'Sunday', 'Pongal'),
(3, '2023-01-16', 'Monday', 'Thiruvalluvar Day'),
(4, '2023-01-17', 'Tuesday', 'Uzhavar Thirunal'),
(5, '2023-01-26', 'Thursday', 'Republic Day'),
(6, '2023-02-05', 'Sunday', 'Thai Poosam'),
(7, '2023-03-22', 'Wednesday', 'Telugu New Year Day'),
(8, '2023-04-01', 'Saturday', 'Annual closing of Accounts for Commercial Banks and Co-operative Banks'),
(9, '2023-04-04', 'Tuesday', 'Mahaveer Jayanthi'),
(10, '2023-04-07', 'Friday', 'Good Friday'),
(11, '2023-04-14', 'Friday', 'Tamil New Years Day and Dr.B.R.Ambedkars Birthday'),
(12, '2023-04-22', 'Saturday', 'Ramzan (Idul Fitr)'),
(13, '2023-05-01', 'Monday', 'May Day'),
(14, '2023-06-29', 'Thursday', 'Bakrid (Idul Azha)'),
(15, '2023-07-29', 'Saturday', 'Muharram'),
(16, '2023-08-15', 'Tuesday', 'Independence Day'),
(17, '2023-09-06', 'Wednesday', 'Krishna Jayanthi'),
(18, '2023-09-17', 'Sunday', 'Vinayakar Chathurthi'),
(19, '2023-09-28', 'Thursday', 'Milad-un-Nabi'),
(20, '2023-10-02', 'Monday', 'Gandhi Jayanthi'),
(21, '2023-10-23', 'Monday', 'Ayutha Pooja'),
(22, '2023-10-24', 'Tuesday', 'Vijaya Dasami'),
(23, '2023-11-12', 'Sunday', 'Deepavali'),
(24, '2023-12-25', 'Monday', 'Christmas');

-- --------------------------------------------------------

--
-- Table structure for table `rejectedleave`
--

CREATE TABLE `rejectedleave` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `bioid` varchar(40) NOT NULL,
  `title` varchar(100) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `leavetype` varchar(60) NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `reason` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rejectedleave`
--

INSERT INTO `rejectedleave` (`sno`, `bioid`, `title`, `startdate`, `enddate`, `leavetype`, `phonenumber`, `reason`) VALUES
(0, '123qwe', 'kdhjslf', '2023-09-07', '2023-09-14', 'Special Casual Leave', 2147483647, 'nkfjfipafldjaf k'),
(0, '123qwe', 'dshu', '2023-09-06', '2023-09-29', 'Casual Leave', 2147483647, 'ijdsbucj'),
(0, '789012', 'Sick Leave', '2023-11-10', '2023-11-12', 'Sick Leave', 987, 'Fever and flu'),
(0, '192011094', 'jgify', '2023-09-13', '2023-09-22', 'Vacation Leave', 2147483647, 'jlhjbljhjl,'),
(0, '123qwe', 'Jaik', '2023-07-06', '2023-07-07', 'sick leave', 9999999, 'nothing'),
(0, '123qwe', 'Leave 2', '2023-11-05', '2023-11-07', 'Sick Leave', 2147483647, 'Medical condition');

-- --------------------------------------------------------

--
-- Table structure for table `rejectedpermission`
--

CREATE TABLE `rejectedpermission` (
  `sno` bigint(20) UNSIGNED NOT NULL,
  `bioid` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `starttime` time DEFAULT NULL,
  `endtime` time DEFAULT NULL,
  `phonenumber` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rejectedpermission`
--

INSERT INTO `rejectedpermission` (`sno`, `bioid`, `title`, `date`, `starttime`, `endtime`, `phonenumber`, `reason`) VALUES
(1, 0, 'Presentation', '2023-11-02', '03:30:00', '06:00:00', 2147483647, 'Client pitch presentation'),
(2, 0, 'Meeting', '2023-10-30', '10:00:00', '12:30:00', 2147483647, 'Team coordination meeting'),
(3, 0, 'Training', '2023-10-28', '09:30:00', '12:00:00', 2147483647, 'Sales training workshop'),
(4, 0, 'Event', '2023-10-25', '05:00:00', '08:00:00', 2147483647, 'Company anniversary celebration');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `bioid` varchar(40) NOT NULL,
  `name` varchar(60) NOT NULL,
  `basicsalary` int(11) NOT NULL,
  `allowance` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`bioid`, `name`, `basicsalary`, `allowance`, `total`) VALUES
('123qwe', 'raju', 10000, 2000, 12000),
('12341234', 'karan', 10000, 3000, 13000),
('192011213', '', 12121, 11111, 0),
('123qwe', '', 12121, 11111, 23232);

-- --------------------------------------------------------

--
-- Table structure for table `salary1`
--

CREATE TABLE `salary1` (
  `bioid` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `basicsalary` int(11) NOT NULL,
  `allowance` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary1`
--

INSERT INTO `salary1` (`bioid`, `date`, `basicsalary`, `allowance`, `total`) VALUES
('123qwe', '2023-09-17', 10000, 2000, 12000),
('123qwe', '2023-09-14', 10000, 3000, 13000),
('12341234', '2023-09-13', 10000, 3000, 13000),
('123qwe', '2023-09-15', 12121, 0, 23232),
('123qwe', '2023-09-14', 12121, 11111, 23232),
('', '0000-00-00', 0, 0, 0),
('123qwe', '0000-00-00', 20000, 24, 20024),
('192011094', '0000-00-00', 30000, 2000, 32000),
('192011094', '0000-00-00', 2, 2, 3),
('dog', '2023-03-01', 1232, 222, 1233),
('123qwe', '2023-11-20', 123, 2, 125),
(' [Your Bio ID]', '2023-11-20', 123, 2, 125),
('192011094', '2023-11-21', 10000, 2000, 12000),
('192011211', '2023-11-24', 10000, 2000, 12000),
('123qwe', '2023-11-24', 123, 334, 457),
('192011087', '2023-11-23', 123, 2000, 2123),
('192011094', '2023-12-05', 10000, 2000, 12000),
('qwe123', '2023-12-13', 10000, 2000, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `total_leave_count`
--

CREATE TABLE `total_leave_count` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bioid` varchar(255) NOT NULL,
  `leavetype` varchar(255) NOT NULL,
  `count` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `total_leave_count`
--

INSERT INTO `total_leave_count` (`id`, `bioid`, `leavetype`, `count`) VALUES
(28, '123qwe', 'Sick Leave', 3),
(29, '123qwe', 'Sick Leave', 5),
(30, '123qwe', 'Casual Leave', 3);

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `sno` bigint(200) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `bioid` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `usertype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`sno`, `name`, `bioid`, `password`, `usertype`) VALUES
(1, 'raja', '192011213', '123', 1),
(2, 'karan', '12341234', '12345', 2),
(3, 'gopi', '123123', 'qwer123', 3),
(4, '', '192011255', '123qwe123', 0),
(5, 'eugine', '192011354', '123qwe123', 0),
(6, 'harish', '192011094', '123user123', 3),
(7, 'raju', '123qwe', '123qwe', 2),
(8, 'raaghav', '192011211', '123', 1),
(12, 'dummy1', '14131313', '123asd', 2),
(13, 'dummy1', '14151313', '123asd', 2),
(20, 'Rajakumar', '31124', '33', 1),
(33, 'jenny', '1919192', '123', 2),
(70, 'sfscsr', 'zxzsscs', '12qw', 1),
(82, 'sfscsr', 'zxzsscs', '12qw', 1),
(89, '', '', '', 0),
(90, ' [Your name value]', ' [Your bioid value]', ' [Your password value]', 0),
(91, ' [Your name value]', 'ssdsd', ' [Your password value]', 0),
(92, '', '', '', 0),
(93, '', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addprofile`
--
ALTER TABLE `addprofile`
  ADD UNIQUE KEY `sno` (`sno`);

--
-- Indexes for table `applyleave`
--
ALTER TABLE `applyleave`
  ADD UNIQUE KEY `sno` (`sno`);

--
-- Indexes for table `applypermission`
--
ALTER TABLE `applypermission`
  ADD UNIQUE KEY `sno` (`sno`);

--
-- Indexes for table `approvedleave`
--
ALTER TABLE `approvedleave`
  ADD UNIQUE KEY `sno` (`sno`);

--
-- Indexes for table `approvedpermission`
--
ALTER TABLE `approvedpermission`
  ADD UNIQUE KEY `sno` (`sno`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD UNIQUE KEY `sno` (`sno`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`Sno`);

--
-- Indexes for table `rejectedpermission`
--
ALTER TABLE `rejectedpermission`
  ADD UNIQUE KEY `sno` (`sno`);

--
-- Indexes for table `total_leave_count`
--
ALTER TABLE `total_leave_count`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD UNIQUE KEY `sno` (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addprofile`
--
ALTER TABLE `addprofile`
  MODIFY `sno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `applyleave`
--
ALTER TABLE `applyleave`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `applypermission`
--
ALTER TABLE `applypermission`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `approvedleave`
--
ALTER TABLE `approvedleave`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `approvedpermission`
--
ALTER TABLE `approvedpermission`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `Sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `rejectedpermission`
--
ALTER TABLE `rejectedpermission`
  MODIFY `sno` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `total_leave_count`
--
ALTER TABLE `total_leave_count`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `sno` bigint(200) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
