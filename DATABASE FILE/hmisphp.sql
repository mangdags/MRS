-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2023 at 11:19 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmisphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `his_accounts`
--

CREATE TABLE `his_accounts` (
  `acc_id` int(200) NOT NULL,
  `acc_name` varchar(200) DEFAULT NULL,
  `acc_desc` text DEFAULT NULL,
  `acc_type` varchar(200) DEFAULT NULL,
  `acc_number` varchar(200) DEFAULT NULL,
  `acc_amount` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_accounts`
--

INSERT INTO `his_accounts` (`acc_id`, `acc_name`, `acc_desc`, `acc_type`, `acc_number`, `acc_amount`) VALUES
(1, 'Individual Retirement Account', '<p>IRA&rsquo;s are simply an account where you stash your money for retirement. The concept is pretty simple, your account balance is not taxed UNTIL you withdraw, at which point you pay the taxes there. This allows you to grow your account with interest without taxes taking away from the balance. The net result is you earn more money.</p>', 'Payable Account', '518703294', '25000'),
(2, 'Equity Bank', '<p>Find <em>bank account</em> stock <em>images</em> in HD and millions of other royalty-free stock photos, illustrations and vectors in the Shutterstock collection. Thousands of new</p>', 'Receivable Account', '753680912', '12566'),
(3, 'Test Account Name', '<p>This is a demo test</p>', 'Payable Account', '620157843', '1100');

-- --------------------------------------------------------

--
-- Table structure for table `his_admin`
--

CREATE TABLE `his_admin` (
  `ad_id` int(20) NOT NULL,
  `ad_fname` varchar(200) DEFAULT NULL,
  `ad_lname` varchar(200) DEFAULT NULL,
  `ad_email` varchar(200) DEFAULT NULL,
  `ad_pwd` varchar(200) DEFAULT NULL,
  `ad_dpic` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_admin`
--

INSERT INTO `his_admin` (`ad_id`, `ad_fname`, `ad_lname`, `ad_email`, `ad_pwd`, `ad_dpic`, `status`) VALUES
(1, 'System', 'Administrator', 'admin@mail.com', '4c7f5919e957f354d57243d37f223cf31e9e7181', 'doc-icon.png', 1),
(2, 'Diana Anne', 'Tacdol', 'diana@gmail.com', 'fe703d258c7ef5f50b71e06565a65aa07194907f', NULL, 5),
(3, 'Angel Ahne', 'Bellandres', 'medicalrecord@mail.com', 'fe703d258c7ef5f50b71e06565a65aa07194907f', NULL, 4),
(4, 'rose', 'marie', 'nurse@gmail.com', 'fe703d258c7ef5f50b71e06565a65aa07194907f', NULL, 3),
(5, 'aldrin', 'gascon', 'doctor@gmail.com', 'fe703d258c7ef5f50b71e06565a65aa07194907f', NULL, 2),
(6, 'Front', 'Desk', 'frontdesk@gmail.com', 'fe703d258c7ef5f50b71e06565a65aa07194907f', NULL, 6),
(17, 'Another', 'Employee', 'testemployee@email.com', 'adcd7048512e64b48da55b027577886ee5a36350', '114-1146025_vector-cats-simple-transparent-background-cat-vector-png.png', 7),
(40, 'Laboratory', 'Staff', 'laboratory@mail.com', 'fe703d258c7ef5f50b71e06565a65aa07194907f', '114-1146025_vector-cats-simple-transparent-background-cat-vector-png.png', 5),
(41, 'Medical', 'Record', 'medical@mail.com', 'fe703d258c7ef5f50b71e06565a65aa07194907f', 'doctor_admin_icon_4-512.png', 4);

-- --------------------------------------------------------

--
-- Table structure for table `his_assets`
--

CREATE TABLE `his_assets` (
  `asst_id` int(20) NOT NULL,
  `asst_name` varchar(200) DEFAULT NULL,
  `asst_desc` longtext DEFAULT NULL,
  `asst_vendor` varchar(200) DEFAULT NULL,
  `asst_status` varchar(200) DEFAULT NULL,
  `asst_dept` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `his_audit`
--

CREATE TABLE `his_audit` (
  `id` int(11) NOT NULL,
  `changes` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_audit`
--

INSERT INTO `his_audit` (`id`, `changes`, `user_id`, `date`) VALUES
(1, 'Delete patient 4', 1, '2023/01/22 03:48:08pm'),
(2, 'Delete patient 3', 1, '2023/01/22 03:48:11pm'),
(3, 'Add patient <br>Name: Randall Ragudo', 1, '2023/01/22 03:56:12pm'),
(4, 'Change patient Ward Number<br> From <br> To 1', 1, '2023/01/22 03:56:38pm'),
(5, 'Change patient Bed Number<br> From <br> To 5', 1, '2023/01/22 03:56:38pm'),
(6, 'Change patient Lastname<br> From Cough and Cold<br> To Ragudo', 1, '2023/01/22 03:57:41pm'),
(7, 'Change patient Bed Number<br> From 5<br> To 6', 2, '2023/01/22 03:58:42pm'),
(8, 'Delete Prescription of MQU4W', 1, '2023/02/01 11:14:15pm'),
(9, 'Delete Prescription of PRC93', 1, '2023/02/01 11:14:19pm'),
(10, 'Add patient <br>Name: Rose Angela', 4, '2023/02/03 11:10:58am'),
(11, 'Discharged patient Randall Ragudo', 5, '2023/02/03 08:33:30pm'),
(12, 'Add medical record of Rose headache', 3, '2023/02/03 08:53:32pm'),
(13, 'Add patient <br>Name: patient One', 6, '2023/02/04 01:11:48pm'),
(14, 'Add patient <br>Name: patient One', 6, '2023/02/04 01:12:32pm'),
(15, 'Add patient <br>Name: patient One', 6, '2023/02/04 01:12:37pm'),
(16, 'Add patient <br>Name: patient One', 6, '2023/02/04 01:12:54pm'),
(17, 'Add patient <br>Name: First Last', 6, '2023-02-04T15:21'),
(18, 'Add patient <br>Name: First Last', 6, '2023-01-30T12:12'),
(101, 'Change patient Pulse<br> from 123<br> to 123', 4, ''),
(102, 'Change patient BP<br>from 123<br> to 123', 4, ''),
(103, 'Change patient Cardiac Rate<br>from 123<br> to 123', 4, ''),
(104, 'Change patient Bed Number<br> from <br />\r\n<b>Notice</b>:  Undefined property: stdClass::$bednumber in <b>D:XAMPPhtdocsMRSackend\nursehis_admin_update_single_patient.php</b> on line <b>260</b><br />\r\n<br> to ', 4, ''),
(105, 'Change patient Complaint<br>from 123<br> to ', 4, ''),
(106, 'Change patient Pulse<br> from 123<br> to 123', 4, ''),
(107, 'Change patient BP<br>from 123<br> to 123', 4, ''),
(108, 'Change patient Cardiac Rate<br>from 123<br> to 123', 4, ''),
(109, 'Change patient Bed Number<br> from <br />\r\n<b>Notice</b>:  Undefined property: stdClass::$bednumber in <b>D:XAMPPhtdocsMRSackend\nursehis_admin_update_single_patient.php</b> on line <b>260</b><br />\r\n<br> to ', 4, ''),
(110, 'Change patient Pulse<br> from 123<br> to 123', 4, ''),
(111, 'Change patient BP<br>from 123<br> to 123', 4, ''),
(112, 'Change patient Cardiac Rate<br>from 123<br> to 123', 4, ''),
(113, 'Change patient Bed Number<br> from <br />\r\n<b>Notice</b>:  Undefined property: stdClass::$bednumber in <b>D:XAMPPhtdocsMRSackend\nursehis_admin_update_single_patient.php</b> on line <b>254</b><br />\r\n<br> to ', 4, ''),
(114, 'Discharged patient Rose headache', 5, '2023/02/04 11:14:13pm'),
(115, 'Discharged patient First Last', 5, '2023/02/04 11:50:32pm'),
(116, 'Discharged patient First Last Set type to OutPatient', 5, '2023/02/04 11:51:44pm'),
(117, 'Discharged patient patient Aolasd Set type to OutPatient', 5, '2023/02/04 11:52:35pm'),
(118, 'Discharged patient First Last Set type to OutPatient', 5, '2023/02/04 11:59:17pm'),
(119, 'Transferred patient Rose headache to  Another Hospital', 5, '2023/02/05 12:04:41am'),
(120, 'Transferred patient Rose headache to  Transferred', 5, '2023/02/05 12:17:03am'),
(121, 'Transferred patient Rose headache to  Transferred', 5, '2023/02/05 12:17:51am'),
(122, 'Add Prescription to patient Randall Ragudo<br> Prescription: <p>Prescriptions</p>', 5, '2023/02/05 12:22:41am'),
(123, 'Delete Prescription of 2DU1K', 5, '2023/02/05 12:46:21am'),
(124, 'Add patient Labtest for patient Aolasd<br> Lab test: ', 5, '2023/02/05 12:49:27am'),
(125, 'Add patient Labtest for patient Aolasd<br> Lab test: <p>Laboratory test</p>', 5, '2023/02/05 12:50:09am'),
(126, 'Add Prescription to patient Randall Ragudo<br> Prescription: <p>Drink water</p>', 5, '2023/02/05 01:49:15am'),
(127, 'Change patient Ward Number<br> From <br />\r\n<b>Notice</b>:  Undefined property: stdClass::$wardnumber in <b>D:XAMPPhtdocsMRSackenddoctorhis_admin_update_single_patient.php</b> on line <b>167</b><br />\r\n<br> To ', 5, '2023/02/05 02:12:12am'),
(128, 'Change patient Bed Number<br> From <br />\r\n<b>Notice</b>:  Undefined property: stdClass::$bednumber in <b>D:XAMPPhtdocsMRSackenddoctorhis_admin_update_single_patient.php</b> on line <b>168</b><br />\r\n<br> To ', 5, '2023/02/05 02:12:12am'),
(129, 'Change patient Bed phone number<br>From 09066752664<br> To ', 5, '2023/02/05 02:12:12am'),
(130, 'Change patient Bed ailment<br>From Cough and Cold<br> To Diagnosis of patient will go here', 5, '2023/02/05 02:12:12am'),
(131, 'Change patient diagnosis<br>From Diagnosis of patient<br> To ', 5, '2023/02/05 02:16:58am'),
(132, 'Add patient <br>Name: New Customer', 6, '2312-12-31T12:03'),
(133, 'Add patient <br>Name: New Customer', 6, '1223-12-02T12:12'),
(134, 'Add patient <br>Name: New Customer', 6, '1223-12-02T12:12'),
(135, 'Add patient <br>Name: New Customer', 6, '2312-12-31T12:03'),
(136, 'Add patient <br>Name: New Customer', 6, '2312-12-31T12:03'),
(137, 'Add patient <br>Name: New Customer', 6, '0003-12-12T21:02'),
(138, 'Add patient <br>Name: Another Name', 6, '1212-12-23T12:31'),
(139, 'Add patient Labtest for Another Name<br> Lab test: <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>', 40, '2023/02/05 01:22:30pm'),
(140, 'Add Lab result for  patient Another Name<br> Result: <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>', 40, '2023/02/05 01:23:48pm'),
(141, 'Add Lab result for  patient Another Name<br> Result: <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>', 40, '2023/02/05 01:24:58pm'),
(142, 'Change lab Equipment named Graduated Cylinder quantity <br>To: Quiapo<br> From: 10', 40, '2023/02/05 01:31:15pm'),
(143, 'Delete Lab Equipment with code of  840135976', 40, '2023/02/05 01:31:36pm'),
(144, 'Add medical record of Another Name', 1, '2023/02/05 01:37:53pm'),
(145, 'Add medical record of New Patient', 41, '2023/02/05 01:50:04pm'),
(146, 'Add medical record of New Patient', 41, '2023/02/05 01:57:26pm'),
(147, 'Add medical record of New Patient', 41, '2023/02/05 01:58:40pm'),
(148, 'Add medical record of New Patient', 41, '2023/02/05 01:59:09pm'),
(149, 'Add medical record of New Patient', 41, '2023/02/05 02:01:41pm'),
(150, 'Add medical record of New Patient', 0, '2023/02/05 02:02:08pm'),
(151, 'Add medical record of First Last', 41, '2023/02/05 02:03:14pm'),
(152, 'Add medical record of First Last', 41, '2023/02/05 02:03:34pm'),
(153, 'Add medical record of First Last', 41, '2023/02/05 02:03:57pm'),
(154, 'Add medical record of First Last', 41, '2023/02/05 02:04:17pm'),
(155, 'Add medical record of First Last', 41, '2023/02/05 02:04:27pm'),
(156, 'Add medical record of First Last', 41, '2023/02/05 02:04:48pm'),
(157, 'Add medical record of patient Aolasd', 41, '2023/02/05 02:04:57pm'),
(158, 'Add medical record of patient Aolasd', 41, '2023/02/05 02:12:30pm'),
(159, 'Add medical record of patient Aolasd', 41, '2023/02/05 02:13:30pm'),
(160, 'Add medical record of patient Aolasd', 41, '2023/02/05 02:14:18pm'),
(161, 'Add medical record of patient Aolasd', 41, '2023/02/05 02:16:00pm'),
(162, 'Change Prescription of First Last<br> Changes:  To  ', 41, '2023/02/05 02:29:59pm'),
(163, 'Change Prescription of First Last<br> Changes:  To  ', 41, '2023/02/05 02:30:37pm'),
(164, 'Change Prescription of First Last<br> Changes:  To  ', 41, '2023/02/05 02:31:25pm'),
(165, 'Change Prescription of First Last<br> Changes:  To  ', 41, '2023/02/05 02:32:22pm'),
(166, 'Change Prescription of First Last<br> Changes:  To  ', 41, '2023/02/05 02:42:05pm'),
(167, 'Change Prescription of First Last<br> Changes:  To  ', 41, '2023/02/05 02:42:51pm'),
(168, 'Change Prescription of First Last<br> Changes: Prescription To <p>Prescription will go here</p>', 41, '2023/02/05 02:43:22pm'),
(169, 'Add medical record of New Patient', 41, '2023/02/05 02:45:27pm');

-- --------------------------------------------------------

--
-- Table structure for table `his_bed`
--

CREATE TABLE `his_bed` (
  `bed_id` int(11) NOT NULL,
  `ward_number` int(11) NOT NULL,
  `is_taken` int(11) NOT NULL DEFAULT 1 COMMENT '1 = Free, 2 = Taken'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `his_bed`
--

INSERT INTO `his_bed` (`bed_id`, `ward_number`, `is_taken`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 1, 1),
(4, 1, 1),
(5, 2, 1),
(6, 2, 1),
(7, 2, 1),
(8, 2, 1),
(9, 3, 1),
(10, 3, 1),
(11, 3, 1),
(12, 3, 1),
(13, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `his_docs`
--

CREATE TABLE `his_docs` (
  `doc_id` int(20) NOT NULL,
  `doc_fname` varchar(200) DEFAULT NULL,
  `doc_lname` varchar(200) DEFAULT NULL,
  `doc_email` varchar(200) DEFAULT NULL,
  `doc_pwd` varchar(200) DEFAULT NULL,
  `doc_dept` varchar(200) DEFAULT NULL,
  `doc_number` varchar(200) DEFAULT NULL,
  `doc_dpic` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_docs`
--

INSERT INTO `his_docs` (`doc_id`, `doc_fname`, `doc_lname`, `doc_email`, `doc_pwd`, `doc_dept`, `doc_number`, `doc_dpic`) VALUES
(13, 'Doctor', 'Who', 'doctorwho@mail.com', '123', 'Surgery', NULL, NULL),
(14, 'Stephen', 'Strange', 'doctorstrange@mail.com', '123', 'Physician', '1231231123', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `his_equipments`
--

CREATE TABLE `his_equipments` (
  `eqp_id` int(20) NOT NULL,
  `eqp_code` varchar(200) DEFAULT NULL,
  `eqp_name` varchar(200) DEFAULT NULL,
  `eqp_vendor` varchar(200) DEFAULT NULL,
  `eqp_desc` longtext DEFAULT NULL,
  `eqp_dept` varchar(200) DEFAULT NULL,
  `eqp_status` varchar(200) DEFAULT NULL,
  `eqp_qty` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 = deleted1 = active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_equipments`
--

INSERT INTO `his_equipments` (`eqp_id`, `eqp_code`, `eqp_name`, `eqp_vendor`, `eqp_desc`, `eqp_dept`, `eqp_status`, `eqp_qty`, `status`) VALUES
(1, '514682709', 'SAMPLE', 'SAMPLE', '<p>sa</p>', 'Laboratory', 'Functioning', '1', 0),
(2, '840135976', 'Graduated Cylinder', 'Quiapo', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>', 'Laboratory', 'Functioning', '2', 0),
(3, '976301528', 'Erlenmeyer Flask', 'Quiapo', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>', 'Laboratory', 'Functioning', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `his_laboratory`
--

CREATE TABLE `his_laboratory` (
  `lab_id` int(20) NOT NULL,
  `lab_pat_name` varchar(200) DEFAULT NULL,
  `lab_pat_ailment` varchar(200) DEFAULT NULL,
  `lab_pat_number` varchar(200) DEFAULT NULL,
  `lab_pat_tests` longtext DEFAULT NULL,
  `lab_pat_results` longtext DEFAULT NULL,
  `lab_number` varchar(200) DEFAULT NULL,
  `image` text NOT NULL,
  `lab_date_rec` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_laboratory`
--

INSERT INTO `his_laboratory` (`lab_id`, `lab_pat_name`, `lab_pat_ailment`, `lab_pat_number`, `lab_pat_tests`, `lab_pat_results`, `lab_number`, `image`, `lab_date_rec`, `status`) VALUES
(2, 'patient Aolasd', 'Aolasd', '45LFJ', '', NULL, '3DO4E', '114-1146025_vector-cats-simple-transparent-background-cat-vector-png.png', '2023-02-04 16:49:27', 1),
(3, 'patient Aolasd', 'Aolasd', '45LFJ', '<p>Laboratory test</p>', NULL, '84AHU', '114-1146025_vector-cats-simple-transparent-background-cat-vector-png.png', '2023-02-04 16:50:09', 1),
(4, 'Another Name', 'A', 'WHSPL', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>', 'Z5XGK', '77109399_493973714548947_1570411593001336832_n.png', '2023-02-05 05:23:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `his_medical_records`
--

CREATE TABLE `his_medical_records` (
  `mdr_id` int(20) NOT NULL,
  `mdr_number` varchar(200) DEFAULT NULL,
  `mdr_pat_name` varchar(200) DEFAULT NULL,
  `mdr_pat_adr` varchar(200) DEFAULT NULL,
  `mdr_pat_age` varchar(200) DEFAULT NULL,
  `mdr_pat_ailment` varchar(200) DEFAULT NULL,
  `mdr_pat_number` varchar(200) DEFAULT NULL,
  `mdr_pat_prescr` longtext DEFAULT NULL,
  `mdr_date_rec` timestamp(4) NOT NULL DEFAULT current_timestamp(4) ON UPDATE current_timestamp(4),
  `status` int(11) NOT NULL COMMENT '0 = delete\r\n1 = active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_medical_records`
--

INSERT INTO `his_medical_records` (`mdr_id`, `mdr_number`, `mdr_pat_name`, `mdr_pat_adr`, `mdr_pat_age`, `mdr_pat_ailment`, `mdr_pat_number`, `mdr_pat_prescr`, `mdr_date_rec`, `status`) VALUES
(4, '51AD2', 'Rose headache', 'Santa Catalina', '11', 'headache', '5GU9A', '', '2023-02-03 12:53:32.7349', 1),
(5, 'FG4K0', 'Another Name', 'Outer Space', '0', 'A', 'WHSPL', '', '2023-02-05 05:37:53.7318', 1),
(11, 'CA6GY', 'New Patient', 'Outer Space', '10', '', 'OJ7VH', NULL, '2023-02-05 06:02:08.3537', 1),
(12, 'I3FB0', 'First Last', 'Address', '12', '', '', ' ', '2023-02-05 06:29:59.0120', 1),
(17, '1DWK2', 'First Last', 'Address', '24', '123', 'DHGXS', '<p>Prescription will go here</p>', '2023-02-05 06:43:22.5165', 1),
(21, 'PKUZT', 'patient Aolasd', 'Address', '-1', 'Aolasd', '45LFJ', 'Prescription', '2023-02-05 06:15:46.3761', 1),
(23, '21FR6', 'New Patient', 'Outer Space', '10', '', 'OJ7VH', '', '2023-02-05 06:45:27.6768', 1);

-- --------------------------------------------------------

--
-- Table structure for table `his_patients`
--

CREATE TABLE `his_patients` (
  `pat_id` int(20) NOT NULL,
  `pat_fname` varchar(200) DEFAULT NULL,
  `pat_mname` varchar(200) DEFAULT NULL,
  `pat_lname` varchar(200) DEFAULT NULL,
  `pat_dob` varchar(200) DEFAULT NULL,
  `pat_age` varchar(200) DEFAULT NULL,
  `pat_sex` varchar(200) DEFAULT NULL,
  `pat_civil_status` varchar(200) DEFAULT NULL,
  `pat_nationality` varchar(200) DEFAULT NULL,
  `pat_number` varchar(200) DEFAULT NULL,
  `pat_addr` varchar(200) DEFAULT NULL,
  `pat_ward` varchar(50) DEFAULT NULL,
  `pat_bed` varchar(50) DEFAULT NULL,
  `pat_phone` varchar(200) DEFAULT NULL,
  `pat_type` varchar(200) DEFAULT NULL,
  `pat_date_joined` varchar(50) DEFAULT NULL,
  `pat_ailment` varchar(200) DEFAULT NULL,
  `pat_discharge_status` varchar(200) DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = delete\r\n1 = active',
  `pat_employer` varchar(200) DEFAULT NULL,
  `pat_employer_mobile` varchar(200) DEFAULT NULL,
  `notified_authority` varchar(200) DEFAULT NULL,
  `brought_by` varchar(200) DEFAULT NULL,
  `brought_by_mobile` varchar(200) DEFAULT NULL,
  `condition_arrival` varchar(200) DEFAULT NULL,
  `pat_temp` decimal(10,2) DEFAULT NULL,
  `temp_method` varchar(200) DEFAULT NULL,
  `pat_pulse` decimal(10,2) DEFAULT NULL,
  `pat_bp` varchar(200) DEFAULT NULL,
  `pat_cardiac_rate` decimal(10,2) DEFAULT NULL,
  `pat_resp_rate` decimal(10,2) DEFAULT NULL,
  `pat_weight` decimal(10,2) DEFAULT NULL,
  `pat_curr_medication` varchar(1000) DEFAULT NULL,
  `pat_physical_findings` varchar(1000) DEFAULT NULL,
  `pat_diagnosis` varchar(1000) DEFAULT NULL,
  `plan` varchar(1000) DEFAULT NULL,
  `nurse_note` varchar(1000) DEFAULT NULL,
  `date_time_disposition` datetime DEFAULT NULL,
  `disposition` varchar(200) DEFAULT NULL,
  `condition_discharge` varchar(200) DEFAULT NULL,
  `attending_doctor` varchar(250) DEFAULT NULL,
  `nurse_instruction` varchar(2000) DEFAULT NULL,
  `pat_instruction` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_patients`
--

INSERT INTO `his_patients` (`pat_id`, `pat_fname`, `pat_mname`, `pat_lname`, `pat_dob`, `pat_age`, `pat_sex`, `pat_civil_status`, `pat_nationality`, `pat_number`, `pat_addr`, `pat_ward`, `pat_bed`, `pat_phone`, `pat_type`, `pat_date_joined`, `pat_ailment`, `pat_discharge_status`, `status`, `pat_employer`, `pat_employer_mobile`, `notified_authority`, `brought_by`, `brought_by_mobile`, `condition_arrival`, `pat_temp`, `temp_method`, `pat_pulse`, `pat_bp`, `pat_cardiac_rate`, `pat_resp_rate`, `pat_weight`, `pat_curr_medication`, `pat_physical_findings`, `pat_diagnosis`, `plan`, `nurse_note`, `date_time_disposition`, `disposition`, `condition_discharge`, `attending_doctor`, `nurse_instruction`, `pat_instruction`) VALUES
(5, 'Randall', NULL, 'Ragudo', '11/12/2011', '11', 'Male', 'Single', 'Filipino', 'GI6U7', 'Santa Catalina', '1', '6', '09066752664', 'InPatient', '2023/01/22 03:56:12pm', 'Sickness', '', 1, NULL, NULL, NULL, NULL, NULL, 'Good', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Diagnosis of patient goes here...', NULL, NULL, NULL, NULL, NULL, '0', 'Instruction for nurse', 'Instruction for patient'),
(6, 'Rose', NULL, 'headache', '11/12/2011', '11', NULL, 'Single', NULL, '5GU9A', 'Santa Catalina', '', '', '09123456789', 'InPatient', '2023/02/03 11:10:58am', 'headache', '', 0, NULL, NULL, NULL, NULL, NULL, 'Good', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'muscle pain', NULL, NULL, NULL, NULL, NULL, '0', '', ''),
(7, 'patient', NULL, 'Aolasd', '2023-02-06', '-1', NULL, NULL, NULL, '45LFJ', 'Address', '', '', '123123123', 'OutPatient', '2023/02/04 01:11:48pm', 'Aolasd', 'Discharged', 1, NULL, NULL, NULL, NULL, NULL, 'Good', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Patient diagnosis', NULL, NULL, NULL, NULL, NULL, '0', '', ''),
(11, 'First', 'Mi', 'Last', '2010-12-15', '12', 'Female', 'Married', 'Filipino', 'PT94Y', 'Address', '1', '12', '091234567890', 'OutPatient', '2023-02-04T15:21', 'Complaint', 'Discharged', 1, 'Empo', '', '', 'unknown', '', 'Fair', '32.00', 'Oral', '54.00', '54', '0.00', '0.00', '131.00', 'Medication', 'Findings', 'Diagnosis', 'Plan', 'Notes', '2023-02-24 12:12:00', 'For Admission', 'Stable', '0', '', ''),
(12, 'First', 'Mi', 'Last', '1998-02-20', '24', 'Male', 'Single', 'Filipino', 'DHGXS', 'Address', '1', '8', '091234567890', 'OutPatient', '2023-01-30T12:12', '123', 'Discharged', 1, 'Empo', '091234567891', 'Yes', 'Police', '091234567892', 'Good', '37.00', 'Axilla', '122.00', '110/90', '100.00', '100.00', '55.00', '123', '123', 'unknown diagnosis', '123', '123', '2023-02-04 01:02:00', 'For Admission', 'Stable', '0', '', ''),
(28, 'New', 'Test', 'Patient', '2023-02-05', '10', 'Male', 'Child', 'FILIPINO', 'OJ7VH', 'Outer Space', NULL, NULL, '1231412312', NULL, '1223-12-02T12:12', NULL, NULL, 1, 'None', '0', 'Yes', 'Police', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'New', 'T', 'Patient', '2023-02-05', '15', 'Male', 'Child', 'FILIPINO', 'GR0LI', 'Outer Space', NULL, NULL, '1231412312', NULL, '2312-12-31T12:03', NULL, NULL, 1, 'None', '0', 'Yes', 'Police', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'New', 'Test', 'Patient', '2023-02-05', '25', 'Male', 'Child', 'FILIPINO', '1DFHZ', 'Outer Space', '1', '9', '1231412312', 'Choose', '0003-12-12T21:02', 'Complaint', NULL, 1, 'None', '0', 'Yes', 'Relatives', '0', 'Good', '50000.00', 'Axilla', '100.00', '100/90', '100.00', '100.00', '55.00', 'Medication', 'Findings', '', 'Plan', 'NOtes', '0000-00-00 00:00:00', 'Choose', 'Choose', NULL, NULL, NULL),
(32, 'Another', 'Middle', 'Name', '2023-02-05', '30', 'Male', 'Child', 'FILIPINO', 'WHSPL', 'Outer Space', '2', '11', '1231412312', 'Choose', '1212-12-23T12:31', 'A', NULL, 1, 'None', '0', 'Yes', 'Relatives', '0', 'Good', '200.00', 'Oral', '123.00', '110/90', '100.00', '123.00', '55.00', 'A', 'A', '', 'A', 'AAA', '0000-00-00 00:00:00', 'Choose', 'Choose', 'Strange, Stephen', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `his_patient_transfers`
--

CREATE TABLE `his_patient_transfers` (
  `t_id` int(20) NOT NULL,
  `t_hospital` varchar(200) DEFAULT NULL,
  `t_date` varchar(200) DEFAULT NULL,
  `t_pat_name` varchar(200) DEFAULT NULL,
  `t_pat_number` varchar(200) DEFAULT NULL,
  `t_status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_patient_transfers`
--

INSERT INTO `his_patient_transfers` (`t_id`, `t_hospital`, `t_date`, `t_pat_name`, `t_pat_number`, `t_status`) VALUES
(3, 'Another Hospital', '2023-02-05', 'Rose headache', '5GU9A', 'Success');

-- --------------------------------------------------------

--
-- Table structure for table `his_payrolls`
--

CREATE TABLE `his_payrolls` (
  `pay_id` int(20) NOT NULL,
  `pay_number` varchar(200) DEFAULT NULL,
  `pay_doc_name` varchar(200) DEFAULT NULL,
  `pay_doc_number` varchar(200) DEFAULT NULL,
  `pay_doc_email` varchar(200) DEFAULT NULL,
  `pay_emp_salary` varchar(200) DEFAULT NULL,
  `pay_date_generated` timestamp(4) NOT NULL DEFAULT current_timestamp(4) ON UPDATE current_timestamp(4),
  `pay_status` varchar(200) DEFAULT NULL,
  `pay_descr` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_payrolls`
--

INSERT INTO `his_payrolls` (`pay_id`, `pay_number`, `pay_doc_name`, `pay_doc_number`, `pay_doc_email`, `pay_emp_salary`, `pay_date_generated`, `pay_status`, `pay_descr`) VALUES
(2, 'HUT1B', 'Henry Doe', 'N8TI0', 'henryd@hms.org', '7555', '2022-10-20 17:14:18.3708', 'Paid', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a,</p>'),
(3, 'T294L', 'Bryan Arreola', 'YDS7L', 'bryan@mail.com', '15500', '2022-10-20 17:14:50.5588', NULL, '<p>demo demo demo demo demo</p>'),
(4, '3UOXY', 'Jessica Spencer', '5VIFT', 'jessica@mail.com', '4150', '2022-10-22 11:04:36.9626', NULL, '<p>This is a demo payroll description for test!!</p>');

-- --------------------------------------------------------

--
-- Table structure for table `his_pharmaceuticals`
--

CREATE TABLE `his_pharmaceuticals` (
  `phar_id` int(20) NOT NULL,
  `phar_name` varchar(200) DEFAULT NULL,
  `phar_bcode` varchar(200) DEFAULT NULL,
  `phar_desc` longtext DEFAULT NULL,
  `phar_qty` varchar(200) DEFAULT NULL,
  `phar_cat` varchar(200) DEFAULT NULL,
  `phar_vendor` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_pharmaceuticals`
--

INSERT INTO `his_pharmaceuticals` (`phar_id`, `phar_name`, `phar_bcode`, `phar_desc`, `phar_qty`, `phar_cat`, `phar_vendor`) VALUES
(1, 'Paracetamol', '134057629', '<ul><li><strong>Paracetamol</strong>, also known as <strong>acetaminophen</strong> and <strong>APAP</strong>, is a medication used to treat <a href=\"https://en.wikipedia.org/wiki/Pain\">pain</a> and <a href=\"https://en.wikipedia.org/wiki/Fever\">fever</a>. It is typically used for mild to moderate pain relief. There is mixed evidence for its use to relieve fever in children.&nbsp; It is often sold in combination with other medications, such as in many <a href=\"https://en.wikipedia.org/wiki/Cold_medication\">cold medications</a> Paracetamol is also used for severe pain, such as <a href=\"https://en.wikipedia.org/wiki/Cancer_pain\">cancer pain</a> and pain after surgery, in combination with <a href=\"https://en.wikipedia.org/wiki/Opioid_analgesic\">opioid pain medication</a>. It is typically used either by mouth or <a href=\"https://en.wikipedia.org/wiki/Rectally\">rectally</a>, but is also available by <a href=\"https://en.wikipedia.org/wiki/Intravenous\">injection into a vein</a>. Effects last between two and four hours.</li><li>Paracetamol is generally safe at recommended doses.The recommended maximum daily dose for an adult is three to four grams. Higher doses may lead to toxicity, including <a href=\"https://en.wikipedia.org/wiki/Liver_failure\">liver failure</a> Serious skin rashes may rarely occur. It appears to be safe during <a href=\"https://en.wikipedia.org/wiki/Pregnancy\">pregnancy</a> and when <a href=\"https://en.wikipedia.org/wiki/Breastfeeding\">breastfeeding</a>.In those with liver disease, it may still be used, but in lower doses. It is classified as a mild <a href=\"https://en.wikipedia.org/wiki/Analgesic\">analgesic</a>. It does not have significant <a href=\"https://en.wikipedia.org/wiki/Anti-inflammatory\">anti-inflammatory</a> activity. How it works is not entirely clear.</li><li>Paracetamol was first made in 1877. It is the most commonly used medication for pain and fever in both the United States and Europe. It is on the <a href=\"https://en.wikipedia.org/wiki/World_Health_Organization%27s_List_of_Essential_Medicines\">World Health Organization&#39;s List of Essential Medicines</a>, the safest and most effective medicines needed in a <a href=\"https://en.wikipedia.org/wiki/Health_system\">health system</a>.<a href=\"https://en.wikipedia.org/wiki/Paracetamol#cite_note-WHO21st-24\">[24]</a> Paracetamol is available as a <a href=\"https://en.wikipedia.org/wiki/Generic_medication\">generic medication</a> with trade names including <a href=\"https://en.wikipedia.org/wiki/Tylenol_(brand)\">Tylenol</a> and <a href=\"https://en.wikipedia.org/wiki/Panadol_(brand)\">Panadol</a>, among others.The wholesale price in the <a href=\"https://en.wikipedia.org/wiki/Developing_world\">developing world</a> is less than US$0.01 per dose. In the United States, it costs about US$0.04 per dose. In 2019, it was the 17th most prescribed medication in the United States, with more than 29&nbsp;million prescriptions.</li></ul>', '500', 'Antipyretics', 'Dawa Limited Kenya'),
(2, 'Aspirin', '452760813', '<ul><li><strong>Aspirin</strong>, also known as <strong>acetylsalicylic acid</strong> (<strong>ASA</strong>), is a <a href=\"https://en.wikipedia.org/wiki/Medication\">medication</a> used to reduce <a href=\"https://en.wikipedia.org/wiki/Pain\">pain</a>, <a href=\"https://en.wikipedia.org/wiki/Fever\">fever</a>, or <a href=\"https://en.wikipedia.org/wiki/Inflammation\">inflammation</a>.<a href=\"https://en.wikipedia.org/wiki/Aspirin#cite_note-AHSF2016-5\">[5]</a> Specific inflammatory conditions which aspirin is used to treat include <a href=\"https://en.wikipedia.org/wiki/Kawasaki_disease\">Kawasaki disease</a>, <a href=\"https://en.wikipedia.org/wiki/Pericarditis\">pericarditis</a>, and <a href=\"https://en.wikipedia.org/wiki/Rheumatic_fever\">rheumatic fever</a>.<a href=\"https://en.wikipedia.org/wiki/Aspirin#cite_note-AHSF2016-5\">[5]</a> Aspirin given shortly after a <a href=\"https://en.wikipedia.org/wiki/Myocardial_infarction\">heart attack</a> decreases the risk of death.<a href=\"https://en.wikipedia.org/wiki/Aspirin#cite_note-AHSF2016-5\">[5]</a> Aspirin is also used long-term to help prevent further heart attacks, <a href=\"https://en.wikipedia.org/wiki/Ischaemic_stroke\">ischaemic strokes</a>, and <a href=\"https://en.wikipedia.org/wiki/Thrombus\">blood clots</a> in people at high risk.<a href=\"https://en.wikipedia.org/wiki/Aspirin#cite_note-AHSF2016-5\">[5]</a> It may also decrease the risk of certain types of <a href=\"https://en.wikipedia.org/wiki/Cancer\">cancer</a>, particularly <a href=\"https://en.wikipedia.org/wiki/Colorectal_cancer\">colorectal cancer</a>.<a href=\"https://en.wikipedia.org/wiki/Aspirin#cite_note-6\">[6]</a> For pain or fever, effects typically begin within 30 minutes.<a href=\"https://en.wikipedia.org/wiki/Aspirin#cite_note-AHSF2016-5\">[5]</a> Aspirin is a <a href=\"https://en.wikipedia.org/wiki/Nonsteroidal_anti-inflammatory_drug\">nonsteroidal anti-inflammatory drug</a> (NSAID) and works similarly to other NSAIDs but also suppresses the normal functioning of <a href=\"https://en.wikipedia.org/wiki/Platelet\">platelets</a>.<a href=\"https://en.wikipedia.org/wiki/Aspirin#cite_note-AHSF2016-5\">[5]</a></li><li>One common <a href=\"https://en.wikipedia.org/wiki/Adverse_effect\">adverse effect</a> is an <a href=\"https://en.wikipedia.org/wiki/Upset_stomach\">upset stomach</a>.<a href=\"https://en.wikipedia.org/wiki/Aspirin#cite_note-AHSF2016-5\">[5]</a> More significant side effects include <a href=\"https://en.wikipedia.org/wiki/Stomach_ulcer\">stomach ulcers</a>, <a href=\"https://en.wikipedia.org/wiki/Stomach_bleeding\">stomach bleeding</a>, and worsening <a href=\"https://en.wikipedia.org/wiki/Asthma\">asthma</a>.<a href=\"https://en.wikipedia.org/wiki/Aspirin#cite_note-AHSF2016-5\">[5]</a> Bleeding risk is greater among those who are older, drink <a href=\"https://en.wikipedia.org/wiki/Alcohol_(drug)\">alcohol</a>, take other NSAIDs, or are on other <a href=\"https://en.wikipedia.org/wiki/Anticoagulants\">blood thinners</a>.<a href=\"https://en.wikipedia.org/wiki/Aspirin#cite_note-AHSF2016-5\">[5]</a> Aspirin is not recommended in the last part of <a href=\"https://en.wikipedia.org/wiki/Pregnancy\">pregnancy</a>.<a href=\"https://en.wikipedia.org/wiki/Aspirin#cite_note-AHSF2016-5\">[5]</a> It is not generally recommended in children with <a href=\"https://en.wikipedia.org/wiki/Infection\">infections</a> because of the risk of <a href=\"https://en.wikipedia.org/wiki/Reye_syndrome\">Reye syndrome</a>.<a href=\"https://en.wikipedia.org/wiki/Aspirin#cite_note-AHSF2016-5\">[5]</a> High doses may result in <a href=\"https://en.wikipedia.org/wiki/Tinnitus\">ringing in the ears</a>.<a href=\"https://en.wikipedia.org/wiki/Aspirin#cite_note-AHSF2016-5\">[5]</a></li></ul>', '500', 'Analgesics', 'Cosmos Kenya Limited'),
(3, 'Test Pharma', '465931288', '<p>This is a demo test.&nbsp;This is a demo test.&nbsp;This is a demo test.</p>', '36', 'Antibiotics', 'Cosmos Pharmaceutical Limited');

-- --------------------------------------------------------

--
-- Table structure for table `his_pharmaceuticals_categories`
--

CREATE TABLE `his_pharmaceuticals_categories` (
  `pharm_cat_id` int(20) NOT NULL,
  `pharm_cat_name` varchar(200) DEFAULT NULL,
  `pharm_cat_vendor` varchar(200) DEFAULT NULL,
  `pharm_cat_desc` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_pharmaceuticals_categories`
--

INSERT INTO `his_pharmaceuticals_categories` (`pharm_cat_id`, `pharm_cat_name`, `pharm_cat_vendor`, `pharm_cat_desc`) VALUES
(1, 'Antipyretics', 'Cosmos Kenya Limited', '<ul><li>An <strong>antipyretic</strong> (<a href=\"https://en.wikipedia.org/wiki/Help:IPA/English\">/ËŒ&aelig;ntipaÉªËˆrÉ›tÉªk/</a>, from <em>anti-</em> &#39;against&#39; and <em><a href=\"https://en.wiktionary.org/wiki/pyretic\">pyretic</a></em> &#39;feverish&#39;) is a substance that reduces <a href=\"https://en.wikipedia.org/wiki/Fever\">fever</a>. Antipyretics cause the <a href=\"https://en.wikipedia.org/wiki/Hypothalamus\">hypothalamus</a> to override a <a href=\"https://en.wikipedia.org/wiki/Prostaglandin\">prostaglandin</a>-induced increase in <a href=\"https://en.wikipedia.org/wiki/Thermoregulation\">temperature</a>. The body then works to lower the temperature, which results in a reduction in fever.</li><li>Most antipyretic medications have other purposes. The most common antipyretics in the United States are <a href=\"https://en.wikipedia.org/wiki/Ibuprofen\">ibuprofen</a> and <a href=\"https://en.wikipedia.org/wiki/Aspirin\">aspirin</a>, which are <a href=\"https://en.wikipedia.org/wiki/Nonsteroidal_anti-inflammatory_drugs\">nonsteroidal anti-inflammatory drugs</a> (NSAIDs) used primarily as <a href=\"https://en.wikipedia.org/wiki/Analgesics\">analgesics</a> (pain relievers), but which also have antipyretic properties; and <a href=\"https://en.wikipedia.org/wiki/Acetaminophen\">acetaminophen</a> (paracetamol), an analgesic with weak anti-inflammatory properties.<a href=\"https://en.wikipedia.org/wiki/Antipyretic#cite_note-2\">[2]</a></li></ul>'),
(2, 'Analgesics', 'Dawa Limited Kenya', '<ul><li><p>An <strong>analgesic</strong> or <strong>painkiller</strong> is any member of the group of <a href=\"https://en.wikipedia.org/wiki/Pharmaceutical_drug\">drugs</a> used to achieve analgesia, relief from <a href=\"https://en.wikipedia.org/wiki/Pain\">pain</a>.</p><p>Analgesic drugs act in various ways on the <a href=\"https://en.wikipedia.org/wiki/Peripheral_nervous_system\">peripheral</a> and <a href=\"https://en.wikipedia.org/wiki/Central_nervous_system\">central</a> nervous systems. They are distinct from <a href=\"https://en.wikipedia.org/wiki/Anesthetic\">anesthetics</a>, which temporarily affect, and in some instances completely eliminate, <a href=\"https://en.wikipedia.org/wiki/Sense\">sensation</a>. Analgesics include <a href=\"https://en.wikipedia.org/wiki/Paracetamol\">paracetamol</a> (known in North America as <a href=\"https://en.wikipedia.org/wiki/Acetaminophen\">acetaminophen</a> or simply APAP), the <a href=\"https://en.wikipedia.org/wiki/Nonsteroidal_anti-inflammatory_drug\">nonsteroidal anti-inflammatory drugs</a> (NSAIDs) such as the <a href=\"https://en.wikipedia.org/wiki/Salicylate\">salicylates</a>, and <a href=\"https://en.wikipedia.org/wiki/Opioid\">opioid</a> drugs such as <a href=\"https://en.wikipedia.org/wiki/Morphine\">morphine</a> and <a href=\"https://en.wikipedia.org/wiki/Oxycodone\">oxycodone</a>.</p></li></ul>'),
(3, 'Antibiotics', 'Cosmos Kenya Limited', '<p>Antibiotics</p>');

-- --------------------------------------------------------

--
-- Table structure for table `his_prescriptions`
--

CREATE TABLE `his_prescriptions` (
  `pres_id` int(200) NOT NULL,
  `pres_pat_name` varchar(200) DEFAULT NULL,
  `pres_pat_age` varchar(200) DEFAULT NULL,
  `pres_pat_number` varchar(200) DEFAULT NULL,
  `pres_number` varchar(200) DEFAULT NULL,
  `pres_pat_addr` varchar(200) DEFAULT NULL,
  `pres_pat_type` varchar(200) DEFAULT NULL,
  `pres_date` timestamp(4) NOT NULL DEFAULT current_timestamp(4) ON UPDATE current_timestamp(4),
  `pres_pat_ailment` varchar(200) DEFAULT NULL,
  `pres_ins` longtext DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '0 = deleted\r\n1 = active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_prescriptions`
--

INSERT INTO `his_prescriptions` (`pres_id`, `pres_pat_name`, `pres_pat_age`, `pres_pat_number`, `pres_number`, `pres_pat_addr`, `pres_pat_type`, `pres_date`, `pres_pat_ailment`, `pres_ins`, `status`) VALUES
(4, 'Randall Ragudo', '11', 'GI6U7', '2DU1K', 'Santa Catalina', 'InPatient', '2023-02-04 16:46:21.9010', 'Cough and Cold', '<p>Prescriptions</p>', 0),
(5, 'Randall Ragudo', '11', 'GI6U7', '6A8OK', 'Santa Catalina', 'InPatient', '2023-02-04 17:49:15.6298', 'Cough and Cold', '<p>Drink water</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `his_pwdresets`
--

CREATE TABLE `his_pwdresets` (
  `id` int(20) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `his_surgery`
--

CREATE TABLE `his_surgery` (
  `s_id` int(200) NOT NULL,
  `s_number` varchar(200) DEFAULT NULL,
  `s_doc` varchar(200) DEFAULT NULL,
  `s_pat_number` varchar(200) DEFAULT NULL,
  `s_pat_name` varchar(200) DEFAULT NULL,
  `s_pat_ailment` varchar(200) DEFAULT NULL,
  `s_pat_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `s_pat_status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_surgery`
--

INSERT INTO `his_surgery` (`s_id`, `s_number`, `s_doc`, `s_pat_number`, `s_pat_name`, `s_pat_ailment`, `s_pat_date`, `s_pat_status`) VALUES
(2, '8KQWD', 'Martin Mbithi', 'RAV6C', 'John Doe', 'Malaria', '2020-01-13 08:50:10.649889', 'Successful'),
(3, '7K18R', 'Bryan Arreola', '3Z14K', 'Cynthia Connolly', 'Demo Test', '2022-10-18 17:26:44.053571', 'Successful'),
(4, 'ECF62', 'Bryan Arreola', '4TLG0', 'Christine Moore', 'Demo Test', '2022-10-22 11:03:33.765255', 'Successful');

-- --------------------------------------------------------

--
-- Table structure for table `his_vendor`
--

CREATE TABLE `his_vendor` (
  `v_id` int(20) NOT NULL,
  `v_number` varchar(200) DEFAULT NULL,
  `v_name` varchar(200) DEFAULT NULL,
  `v_adr` varchar(200) DEFAULT NULL,
  `v_mobile` varchar(200) DEFAULT NULL,
  `v_email` varchar(200) DEFAULT NULL,
  `v_phone` varchar(200) DEFAULT NULL,
  `v_desc` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_vendor`
--

INSERT INTO `his_vendor` (`v_id`, `v_number`, `v_name`, `v_adr`, `v_mobile`, `v_email`, `v_phone`, `v_desc`) VALUES
(1, '6ISKC', 'Cosmos Pharmaceutical Limited', 'P.O. Box 41433, GPO 00100 Nairobi, Kenya', '', 'info@cosmospharmaceuticallimited.com', '+254(20)550700-9', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,</p>');

-- --------------------------------------------------------

--
-- Table structure for table `his_vitals`
--

CREATE TABLE `his_vitals` (
  `vit_id` int(20) NOT NULL,
  `vit_number` varchar(200) DEFAULT NULL,
  `vit_pat_number` varchar(200) DEFAULT NULL,
  `vit_bodytemp` varchar(200) DEFAULT NULL,
  `vit_heartpulse` varchar(200) DEFAULT NULL,
  `vit_resprate` varchar(200) DEFAULT NULL,
  `vit_bloodpress` varchar(200) DEFAULT NULL,
  `vit_daterec` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `his_vitals`
--

INSERT INTO `his_vitals` (`vit_id`, `vit_number`, `vit_pat_number`, `vit_bodytemp`, `vit_heartpulse`, `vit_resprate`, `vit_bloodpress`, `vit_daterec`) VALUES
(3, '1KB9V', '3Z14K', '38', '77', '12', '90/60', '2022-10-18 17:10:16.904915'),
(4, 'ELYOM', '2', '38', '88', '12', '110/80', '2022-11-19 04:23:18.442836'),
(5, 'AL0J8', 'YDS7L', '36', '72', '15', '90/60', '2022-10-18 17:42:17.500662'),
(6, 'MS2OJ', '4TLG0', '37', '70', '15', '120/80', '2022-10-22 11:01:52.148658'),
(7, 'MVOJ4', '3', '37', '70', '15', '120/80', '2022-11-19 05:23:23.101122'),
(8, '74TUK', '3Z14K', '37', '123', '123', '123', '2022-11-19 05:24:46.829638'),
(9, 'C5U2A', 'ISL1E', '37', '70', '15', '120/80', '2022-11-20 05:13:07.328090'),
(10, 'SBTPC', 'ISL1E', '37', '70', '123', '120/80', '2023-01-19 16:56:24.362868'),
(11, 'EMYTF', '3', '37', '70', '15', '120/80', '2023-01-19 16:58:47.843185'),
(12, '0SV8P', 'SA7ZJ', '37', '70', '123', '120/80', '2023-01-19 17:57:20.048376'),
(13, 'RH3T6', '3', '37', '123', '15', '120/80', '2023-01-19 17:57:36.680236'),
(15, 'EFHPQ', '32.00', '32.00', '100.00', '100.00', '110/90', '2023-02-04 22:21:27.211707'),
(16, 'W4YH7', '32.00', '32.00', '100.00', '100.00', '110/90', '2023-02-04 22:21:33.767766'),
(22, 'F0J7P', '32.00', '32.00', '100.00', '100.00', '110/90', '2023-02-04 22:35:31.735359'),
(23, '2CFJL', '37', '37', '100.00', '100.00', '110/90', '2023-02-04 22:36:55.577977'),
(33, 'O0EAS', '0.00', '0.00', '54.00', '0.00', '54', '2023-02-04 23:48:08.644608'),
(34, 'S5WBC', '32', '32', '54.00', '0.00', '54', '2023-02-04 23:48:19.284352'),
(35, 'IGHAX', '32.00', '32.00', '54.00', '0.00', '54', '2023-02-04 23:48:31.233378'),
(36, 'F7LYV', '37.00', '37.00', '100.00', '100.00', '110/90', '2023-02-04 23:52:51.337479'),
(37, '2C7GM', '37.00', '37.00', '100.00', '100.00', '110/90', '2023-02-04 23:53:01.676841'),
(38, 'NPAG6', '12', '37.00', '120', '100.00', '110/90', '2023-02-04 23:56:08.144320'),
(39, 'QW49T', '12', '37.00', '122', '100.00', '110/90', '2023-02-04 23:57:03.789632'),
(41, NULL, 'OJ7VH', '0', '0', '0', '0', '2023-02-05 01:25:47.424700'),
(44, '0', 'GR0LI', '0', '0', '0', '0', '2023-02-05 01:41:43.378805'),
(45, 'F1GTD', '30', '55', '55', '123', '100/90', '2023-02-05 01:44:56.710812'),
(46, 'F1GTD', '30', '55', '55', '123', '100/90', '2023-02-05 01:46:36.358775'),
(47, '6I5Q3', '1DFHZ', '50000.00', '100.00', '100.00', '100/90', '2023-02-05 02:16:48.432319'),
(48, 'PAGWT', 'WHSPL', '200.00', '123.00', '123.00', '110/90', '2023-02-05 02:37:26.785183');

-- --------------------------------------------------------

--
-- Table structure for table `his_ward`
--

CREATE TABLE `his_ward` (
  `ward_id` int(11) NOT NULL,
  `is_full` int(11) NOT NULL DEFAULT 1 COMMENT '1 = False, 2 = True'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `his_ward`
--

INSERT INTO `his_ward` (`ward_id`, `is_full`) VALUES
(1, 1),
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `department`) VALUES
(1, 'Admin'),
(2, 'Doctor'),
(3, 'Nurse'),
(4, 'Medical Records'),
(5, 'Laboratory'),
(6, 'Front Desk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `his_accounts`
--
ALTER TABLE `his_accounts`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `his_admin`
--
ALTER TABLE `his_admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `his_assets`
--
ALTER TABLE `his_assets`
  ADD PRIMARY KEY (`asst_id`);

--
-- Indexes for table `his_audit`
--
ALTER TABLE `his_audit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `his_bed`
--
ALTER TABLE `his_bed`
  ADD PRIMARY KEY (`bed_id`);

--
-- Indexes for table `his_docs`
--
ALTER TABLE `his_docs`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `his_equipments`
--
ALTER TABLE `his_equipments`
  ADD PRIMARY KEY (`eqp_id`);

--
-- Indexes for table `his_laboratory`
--
ALTER TABLE `his_laboratory`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indexes for table `his_medical_records`
--
ALTER TABLE `his_medical_records`
  ADD PRIMARY KEY (`mdr_id`);

--
-- Indexes for table `his_patients`
--
ALTER TABLE `his_patients`
  ADD PRIMARY KEY (`pat_id`);

--
-- Indexes for table `his_patient_transfers`
--
ALTER TABLE `his_patient_transfers`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `his_payrolls`
--
ALTER TABLE `his_payrolls`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `his_pharmaceuticals`
--
ALTER TABLE `his_pharmaceuticals`
  ADD PRIMARY KEY (`phar_id`);

--
-- Indexes for table `his_pharmaceuticals_categories`
--
ALTER TABLE `his_pharmaceuticals_categories`
  ADD PRIMARY KEY (`pharm_cat_id`);

--
-- Indexes for table `his_prescriptions`
--
ALTER TABLE `his_prescriptions`
  ADD PRIMARY KEY (`pres_id`);

--
-- Indexes for table `his_pwdresets`
--
ALTER TABLE `his_pwdresets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `his_surgery`
--
ALTER TABLE `his_surgery`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `his_vendor`
--
ALTER TABLE `his_vendor`
  ADD PRIMARY KEY (`v_id`);

--
-- Indexes for table `his_vitals`
--
ALTER TABLE `his_vitals`
  ADD PRIMARY KEY (`vit_id`);

--
-- Indexes for table `his_ward`
--
ALTER TABLE `his_ward`
  ADD PRIMARY KEY (`ward_id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `his_accounts`
--
ALTER TABLE `his_accounts`
  MODIFY `acc_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `his_admin`
--
ALTER TABLE `his_admin`
  MODIFY `ad_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `his_assets`
--
ALTER TABLE `his_assets`
  MODIFY `asst_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `his_audit`
--
ALTER TABLE `his_audit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `his_bed`
--
ALTER TABLE `his_bed`
  MODIFY `bed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `his_docs`
--
ALTER TABLE `his_docs`
  MODIFY `doc_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `his_equipments`
--
ALTER TABLE `his_equipments`
  MODIFY `eqp_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `his_laboratory`
--
ALTER TABLE `his_laboratory`
  MODIFY `lab_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `his_medical_records`
--
ALTER TABLE `his_medical_records`
  MODIFY `mdr_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `his_patients`
--
ALTER TABLE `his_patients`
  MODIFY `pat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `his_patient_transfers`
--
ALTER TABLE `his_patient_transfers`
  MODIFY `t_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `his_payrolls`
--
ALTER TABLE `his_payrolls`
  MODIFY `pay_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `his_pharmaceuticals`
--
ALTER TABLE `his_pharmaceuticals`
  MODIFY `phar_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `his_pharmaceuticals_categories`
--
ALTER TABLE `his_pharmaceuticals_categories`
  MODIFY `pharm_cat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `his_prescriptions`
--
ALTER TABLE `his_prescriptions`
  MODIFY `pres_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `his_pwdresets`
--
ALTER TABLE `his_pwdresets`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `his_surgery`
--
ALTER TABLE `his_surgery`
  MODIFY `s_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `his_vendor`
--
ALTER TABLE `his_vendor`
  MODIFY `v_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `his_vitals`
--
ALTER TABLE `his_vitals`
  MODIFY `vit_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `his_ward`
--
ALTER TABLE `his_ward`
  MODIFY `ward_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
