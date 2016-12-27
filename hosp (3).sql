-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2016 at 02:43 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hosp`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `password`, `email`, `status`) VALUES
(1, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `timeslot_id` int(11) NOT NULL,
  `appoint_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `booked_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patient_id`, `doctor_id`, `timeslot_id`, `appoint_date`, `status`, `booked_on`, `updated_on`) VALUES
(19, 1, 3, 1, '2016-12-06', 1, '2016-12-05 11:18:48', '2016-12-05 11:18:48'),
(20, 1, 3, 2, '2016-12-06', 1, '2016-12-05 11:21:25', '2016-12-05 11:21:25'),
(21, 1, 2, 1, '2016-12-14', 1, '2016-12-05 11:53:19', '2016-12-05 11:53:19'),
(22, 1, 3, 1, '2016-12-07', 1, '2016-12-05 12:18:28', '2016-12-05 12:18:28'),
(23, 1, 3, 2, '2016-12-07', 1, '2016-12-05 12:19:03', '2016-12-05 12:19:03'),
(24, 1, 3, 3, '2016-12-07', 1, '2016-12-05 12:19:49', '2016-12-05 12:19:49'),
(25, 1, 3, 1, '2016-12-23', 1, '2016-12-05 18:31:33', '2016-12-05 18:31:33'),
(26, 1, 7, 2, '2016-12-22', 1, '2016-12-05 18:32:42', '2016-12-05 18:32:42'),
(27, 1, 7, 3, '2016-12-09', 1, '2016-12-05 18:34:02', '2016-12-05 18:34:02'),
(28, 1, 3, 1, '2016-12-08', 1, '2016-12-05 18:34:30', '2016-12-05 18:34:30'),
(29, 16, 2, 1, '2016-12-06', 1, '2016-12-05 19:26:26', '2016-12-05 19:26:26'),
(30, 16, 3, 2, '2016-12-14', 1, '2016-12-05 19:34:18', '2016-12-05 19:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `posted_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `subject`, `message`, `posted_on`) VALUES
(1, 'Keshav', 'chinna1754@gmail.com', 'Test', 'Cashew ', '2016-07-05 14:30:22'),
(3, 'Chenna Keshavulu Goud Bekkari', 'cxb80030@ucmo.edu', 'test mail', 'vbhxcvxjcvnxhcx', '2016-11-09 14:17:48'),
(4, 'hbvhbvjhxcvb', 'chinna1754@gmail.coom', ' bcxkvbx', 'bjicbkjfbdbksd', '2016-11-11 20:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `dept_name` varchar(250) NOT NULL,
  `dept_code` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `dept_name`, `dept_code`) VALUES
(4, 'Dentist', 'DEPT#0013'),
(6, 'Orthopedist', 'DEPT#003'),
(7, 'Audiologist', 'DEPT#004');

-- --------------------------------------------------------

--
-- Table structure for table `doctorresponce`
--

CREATE TABLE `doctorresponce` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `response` text NOT NULL,
  `added_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorresponce`
--

INSERT INTO `doctorresponce` (`id`, `appointment_id`, `response`, `added_on`) VALUES
(8, 19, ' hgcvsdyvcsdyc vv cy  cbcasvc sayc vyy yv ca svcvygasv cya vy\r\n hgcvsdyvcsdyc vv cy  cbcasvc sayc vyy yv ca svcvygasv cya vy\r\n hgcvsdyvcsdyc vv cy  cbcasvc sayc vyy yv ca svcvygasv cya vy\r\n hgcvsdyvcsdyc vv cy  cbcasvc sayc vyy yv ca svcvygasv cya vy', '2016-12-05 14:46:16'),
(9, 19, ' cbhufdvbhub vbsdbv usdb vusdb vusdb vsdbvu ', '2016-12-05 14:47:07'),
(10, 19, ' bcvsvgvgvdgvsdgcvy', '2016-12-05 14:48:26'),
(11, 19, ' ftdftsdy yvcsdvytvds ysdv ytvvsdyfv sdyfysdsdv', '2016-12-05 18:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `doctor_code` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `dept_id` int(11) NOT NULL,
  `file_location` text NOT NULL,
  `file_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `firstname`, `lastname`, `username`, `doctor_code`, `password`, `dept_id`, `file_location`, `file_name`) VALUES
(2, 'Doctor1vcxhvh', 'Doctor1', 'doc1@hosp.com', 'DOC#0014', 'qqqqqq', 4, 'uploads/1480983361Hang Chen.jpg', 'Hang Chen.jpg'),
(3, 'Doctor2', 'Doctor2', 'doc2@hosp.com', 'DOC#002', '343b1c4a3ea721b2d640fc8700db0f36', 4, 'uploads/14791639012.png', '2.png'),
(7, 'Admin', 'Admin', 'chinna1754@gmail.coom', 'Doc#214', '343b1c4a3ea721b2d640fc8700db0f36', 6, 'uploads/1480902769usecaseAdmin.png', 'usecaseAdmin.png'),
(8, 'CHENNA', 'BEKKARI', 'CXB30@UCMO.EDU', 'Doc#2142', '343b1c4a3ea721b2d640fc8700db0f36', 7, 'uploads/1480902987Anshuman Singh.jpg', 'Anshuman Singh.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `emailsendingaddress`
--

CREATE TABLE `emailsendingaddress` (
  `id` int(11) NOT NULL,
  `senderemail` text,
  `emailpassword` text,
  `emailhost` text,
  `emailport` int(11) NOT NULL,
  `siteurl` text,
  `test` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emailsendingaddress`
--

INSERT INTO `emailsendingaddress` (`id`, `senderemail`, `emailpassword`, `emailhost`, `emailport`, `siteurl`, `test`) VALUES
(1, 'chinna4network@gmail.com', 'networknetwork', 'smtp.gmail.com', 587, 'http://localhost/hospital', '');

-- --------------------------------------------------------

--
-- Table structure for table `insurancedetails`
--

CREATE TABLE `insurancedetails` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `policynumber` varchar(50) NOT NULL,
  `agency` varchar(250) NOT NULL,
  `memberid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insurancedetails`
--

INSERT INTO `insurancedetails` (`id`, `patient_id`, `policynumber`, `agency`, `memberid`) VALUES
(2, 1, '111', 'ABC', '123456'),
(3, 16, '123456789', 'ambc', 'madhan');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(250) NOT NULL,
  `state` varchar(250) NOT NULL,
  `country` varchar(250) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `registered_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `username`, `password`, `firstname`, `lastname`, `mobile`, `address`, `city`, `state`, `country`, `zipcode`, `registered_on`) VALUES
(1, 'chinna1754@gmail.com', '343b1c4a3ea721b2d640fc8700db0f36', 'Chenna Keshavulu', 'Bekkari', '8168889431', '11592 APT#202 HOLMES RD vxfg fdjg dsg v', 'Kansas City', 'Missouri (MO)', 'United States', '64131', '2016-07-26 13:51:57'),
(5, 'qqq@qqq.com', '343b1c4a3ea721b2d640fc8700db0f36', 'Chenna', 'B', '8162996478', '11592 APT#202 HOLMES RD', 'Kansas City', 'Missouri (MO)', 'United States', '64131', '2016-08-16 10:52:53'),
(6, 'patient1@hosp.com', '343b1c4a3ea721b2d640fc8700db0f36', 'Patient', '1', '7896541230', ' bvff sdv cjdv h', 'Kansas City', 'Missouri (MO)', 'United States', '64131', '2016-11-05 14:27:23'),
(8, 'cxb80030@ucmo.edu', 'd41d8cd98f00b204e9800998ecf8427e', 'Chenna Keshavulu', 'Bekkari', '8168889431', '11592 APT#202 HOLMES RD', 'Kansas City', 'Missouri (MO)', 'United States', '64131', '2016-12-03 20:29:35'),
(12, 'cxb80030@ucmo.ed', 'd41d8cd98f00b204e9800998ecf8427e', 'Chenna Keshavulu', 'Bekkari', '8168889431', '11592 APT#202 HOLMES RD', 'Kansas City', 'Missouri (MO)', 'United States', '64131', '2016-12-05 19:20:37'),
(16, 'madhanboya.k@gmail.com', '61afdc26621336152604c94ec2559d71', 'madhan', 'kumar', '8168303235', 'chestnut', 'kasnas', 'mo', 'United States', '64114', '2016-12-05 19:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `paymentinfo`
--

CREATE TABLE `paymentinfo` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `nameoncard` varchar(250) NOT NULL,
  `cardnumber` varchar(16) NOT NULL,
  `expmonth` varchar(3) NOT NULL,
  `expyear` int(11) NOT NULL,
  `cvv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentinfo`
--

INSERT INTO `paymentinfo` (`id`, `patient_id`, `nameoncard`, `cardnumber`, `expmonth`, `expyear`, `cvv`) VALUES
(2, 1, 'ABCD', '7896541233214577', '12', 2023, 123);

-- --------------------------------------------------------

--
-- Table structure for table `testreport`
--

CREATE TABLE `testreport` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `report` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testreport`
--

INSERT INTO `testreport` (`id`, `appointment_id`, `test_id`, `report`) VALUES
(1, 19, 2, 'Not Applicable'),
(2, 19, 3, 'Passed'),
(3, 19, 4, 'Failed'),
(4, 20, 2, 'Not Applicable'),
(5, 20, 3, 'Passed'),
(6, 20, 4, 'Failed'),
(7, 19, 2, 'Not Applicable'),
(8, 19, 3, 'Passed'),
(9, 19, 4, 'Failed');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `testname` varchar(250) NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `testname`, `doctor_id`) VALUES
(2, 'TEST2', 3),
(3, 'TEST3', 3),
(4, 'TEST1', 3),
(5, 'surgery', 3);

-- --------------------------------------------------------

--
-- Table structure for table `timeslots`
--

CREATE TABLE `timeslots` (
  `id` int(11) NOT NULL,
  `timeslot` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeslots`
--

INSERT INTO `timeslots` (`id`, `timeslot`) VALUES
(1, '09:00 am'),
(2, '11:00 am'),
(3, '02:00 pm'),
(4, '04:00 pm'),
(5, '10:00am'),
(6, '12:00 Am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorresponce`
--
ALTER TABLE `doctorresponce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emailsendingaddress`
--
ALTER TABLE `emailsendingaddress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurancedetails`
--
ALTER TABLE `insurancedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testreport`
--
ALTER TABLE `testreport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeslots`
--
ALTER TABLE `timeslots`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `doctorresponce`
--
ALTER TABLE `doctorresponce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `emailsendingaddress`
--
ALTER TABLE `emailsendingaddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `insurancedetails`
--
ALTER TABLE `insurancedetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `paymentinfo`
--
ALTER TABLE `paymentinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `testreport`
--
ALTER TABLE `testreport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `timeslots`
--
ALTER TABLE `timeslots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
