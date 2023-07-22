-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2023 at 12:02 PM
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
-- Database: `logitech`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '25', NULL),
('admin', '32', NULL),
('create-user', '25', NULL),
('create-user', '29', NULL),
('create-user', '3', NULL),
('create-user', '32', NULL),
('create-vouchersalary', '25', NULL),
('create-vouchersalary', '26', NULL),
('create-vouchersalary', '29', NULL),
('create-vouchersalary', '32', NULL),
('create-vouchersalary', '34', NULL),
('create-voucherwork', '25', NULL),
('create-voucherwork', '32', NULL),
('is-AOA', '28', NULL),
('is-cashier', '26', NULL),
('is-cashier', '30', NULL),
('read-voucherwork', '25', NULL),
('read-voucherwork', '32', NULL),
('read-voucherwork', '33', NULL),
('read-voucherwork', '35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text DEFAULT NULL,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'allows the admin for all', NULL, NULL, NULL, NULL),
('create-user', 1, 'allows to admin to create user', NULL, NULL, NULL, NULL),
('create-vouchersalary', 1, 'allows the user to create vouchers in salary section. ', NULL, NULL, NULL, NULL),
('create-voucherwork', 1, 'allow a user to create a voucher in work section', NULL, NULL, NULL, NULL),
('is-AOA', 1, 'can pass or decline the DA forms', NULL, NULL, NULL, NULL),
('is-cashier', 1, 'allows cashier/user to create valluable entry', NULL, NULL, 0, NULL),
('read-voucherwork', 1, 'Allows user to view/read the voucher', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'create-user'),
('admin', 'create-voucherwork');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `challansalary`
--

CREATE TABLE `challansalary` (
  `id` int(10) NOT NULL,
  `ReceivedForm` varchar(30) NOT NULL,
  `ReferenceLetterNo` int(30) NOT NULL,
  `ReferenceLetterDate` date NOT NULL,
  `NatureOfValuable` varchar(30) NOT NULL,
  `Amount` int(10) NOT NULL,
  `Shortcode` varchar(20) NOT NULL,
  `OldHeadOfAccount` int(30) NOT NULL,
  `RationalizedHeadofAccount` int(10) NOT NULL,
  `DrOrCr` varchar(20) NOT NULL,
  `ShortcodeAmount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `challansalary`
--

INSERT INTO `challansalary` (`id`, `ReceivedForm`, `ReferenceLetterNo`, `ReferenceLetterDate`, `NatureOfValuable`, `Amount`, `Shortcode`, `OldHeadOfAccount`, `RationalizedHeadofAccount`, `DrOrCr`, `ShortcodeAmount`) VALUES
(1, '2', 2, '0000-00-00', '2', 2, '2', 2, 2, '2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `challanwork`
--

CREATE TABLE `challanwork` (
  `id` int(10) NOT NULL,
  `ReceivedForm` varchar(30) NOT NULL,
  `ReferenceLetterNo` int(20) NOT NULL,
  `ReferenceLetterDate` date NOT NULL,
  `NatureOfValuable` varchar(30) NOT NULL,
  `Amount` int(20) NOT NULL,
  `Shortcode` varchar(20) NOT NULL,
  `OldHeadOfAccount` int(30) NOT NULL,
  `RationalizedHeadofAccount` int(30) NOT NULL,
  `DrOrCr` varchar(10) NOT NULL,
  `ShortcodeAmount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `challanwork`
--

INSERT INTO `challanwork` (`id`, `ReceivedForm`, `ReferenceLetterNo`, `ReferenceLetterDate`, `NatureOfValuable`, `Amount`, `Shortcode`, `OldHeadOfAccount`, `RationalizedHeadofAccount`, `DrOrCr`, `ShortcodeAmount`) VALUES
(1, '121', 12, '0000-00-00', '2 ', 12, '12', 32, 21, '22', 2500);

-- --------------------------------------------------------

--
-- Table structure for table `contractordetails`
--

CREATE TABLE `contractordetails` (
  `id` int(255) NOT NULL,
  `name` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `vat_tin_no` varchar(15) NOT NULL,
  `cst_tin_no` varchar(15) NOT NULL,
  `gst` varchar(30) NOT NULL,
  `contactPerson` varchar(25) NOT NULL,
  `contactPerson2` varchar(25) NOT NULL,
  `phoneNo` varchar(255) NOT NULL,
  `mobileNo` varchar(255) NOT NULL,
  `acHolderName` varchar(25) NOT NULL,
  `accountNo` int(25) NOT NULL,
  `ifscCode` varchar(15) NOT NULL,
  `bankName` varchar(20) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `currentAccount` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contractordetails`
--

INSERT INTO `contractordetails` (`id`, `name`, `address`, `vat_tin_no`, `cst_tin_no`, `gst`, `contactPerson`, `contactPerson2`, `phoneNo`, `mobileNo`, `acHolderName`, `accountNo`, `ifscCode`, `bankName`, `branch`, `currentAccount`) VALUES
(12, 'VIRAJ PROFILES LTD-II', 'G-2,1/2,1/3,G-22,23,32,33,34\r\nTARAPUR IND. AREA, BOISAR, DIST-THANE\r\n', '27700298420 - V', '27700298420 C', '27AABCV1740N1Z4', 'MR. K. THAKRE', 'MR. SUSHIL GUPTA', '', '', '', 0, '', 'SBI', '', 0),
(14, 'KESHAVA ORGANICS PVT LTD', 'PLOT NO- T-97,98,99 & 100\r\nMIDC TARAPUR, BOISAR, DIST-PALGHAR,401506', '27630014394 V', '27630014394 C', '27AAACK3793P1ZV', 'MR. RAUT', 'MR. DESHMUKH', '02525-661191', '8879071333', '', 0, '', 'Bank Of India', '', 0),
(15, 'DRV ORGANICS', 'PLOT NO- N-184/185\r\n\r\nMIDC TARAPUR\r\n', '27560009340 V', '27560009340 C', '27AAFFM4483Q1ZJ', 'MR. RAUT', '', '', '', '', 0, '', '', '', 0),
(16, 'ARLEX CHEMI PVT LTD', 'PLOT NO- E-43\r\nMIDC TARAPUR\r\n\r\n', '27530298659 V', '27530298659 C', '27AABCS1682C1ZL', 'MR. DHUMAL ', 'MR. BHAVESH BHAI', '022-32421179', '9324201237', '', 0, '', '', '', 0),
(17, 'NEW ALLIANCE DYE-CHEM PVT LTD', 'PLOT NO- K-63\r\nMIDC TARAPUR\r\n', '27610298421 V', '27610298421 C', '27AAACN9074G1Z9', 'MR. ARVIND SONPURKAR', '', '', '', '', 0, '', '', '', 0),
(18, 'BHARAT RASAYAN ', 'MIDC TARAPUR\r\n', '27180299967 V', '27180299967 C', '27AADFB2570K1ZG', 'MR. SARAL SHAH', '', '022-28488599', '02525-645762/645850', '', 0, '', '', '', 0),
(19, 'EVEREST KANTO CYLINDER LTD', 'PLOT NO- N-62\r\nMIDC TARAPUR\r\n', '27300330844 V', '27300330844 C', '', 'MR.', '', '', '', '', 0, '', '', '', 0),
(20, 'ESJAY CHEMICAL', 'MIDC TARAPUR\r\n', '27560350489 V', '27560350489 C', '27AHCPS3077N1ZR', 'MR. ANKIT ', '', '02525-645115', '', '', 0, '', '', '', 0),
(21, 'NOVAPHENE SPECIALITIES PVT LTD', 'PLOT NO- E-107\r\nMIDC TARAPUR\r\n', '27410920204 V', '27410920204 C', '27AADCD6193K1Z9', 'MR. SARAL SHAH', '', '', '', '', 0, '', '', '', 0),
(22, 'ASHA DYESTUFF IND. PVT LTD', 'PLOT NO- T-32,64 & 65\r\nMIDC TARAPUR\r\n\r\n', '27730389729 V', '27730389729 C', '27AABCA8919N1Z6', 'MR. NISHIKANT ', '', '', '', '', 0, '', '', '', 0),
(23, 'PREMIER SOLVENTS PVT LTD', 'PLOT NO- N-166\r\nMIDC TARAPUR\r\n', '27060014465 V', '27060014465 C', '27AABCP6118J1ZC', 'MR. J.D', '', '02525-661071/72', '022-28950082/83/84', '', 0, '', '', '', 0),
(24, 'CHEMCO INNOVATIVE CHEMIE PVT LTD', 'PLOT NO- T-24,25,26,27,39\r\nMIDC TARAPUR\r\n', '27440399831 V', '27440399831 C', '27AABCC1087F1ZW', 'MR. YASHWANT', '', '', '', '', 0, '', '', '', 0),
(25, 'ZENITH DYEINTERMEDIATES LTD', 'PLOT NO- T-22\r\nMIDC TARAPUR\r\n', '27790383488 V', '27790383488 C', '27AAACZ2155N1ZY', 'MR. AGRAWAL', '', '', '', '', 0, '', '', '', 0),
(26, 'RUCHIKA CHEMICAL INDUSTRIES PVT LTD', 'PLOT NO- T-93, 102, 103\r\nMIDC TARAPUR', '27830298785 V', '27830298785 C', '27AABCR1590C1ZN', 'MR. RAJU BHAI', '', '', '', '', 0, '', '', '', 0),
(27, 'SURU CHEMICALS & PHARMACEUTICALS PVT LTD', 'MIDC TARAPUR\r\n', '27360005085 V', '27360005085 C', '27AABCS4459H1Z6', 'MR. VISHAL', '', '022-67353637', '', '', 0, '', '', '', 0),
(28, 'SUKETU ORGANICS PVT LTD', 'PLOT NO- F-10/2\r\nMIDC TARAPUR\r\n', '27050529492 V', '27050529492 C', '27AAFCS6721G1ZB', 'MR. PATIL ', '', '', '', '', 0, '', '', '', 0),
(29, 'PEARL FARBEN CHEM PVT LTD', 'PLOT NO- N-167\r\nMIDC TARAPUR\r\n', '27610326357 V', '27610326357 C', '27AABCP7552L1Z0', 'MR. PATKAR', '', '', '', '', 0, '', '', '', 0),
(30, 'JUBAILO CHEM PVT LTD', 'PLOT NO- N-35\r\nMIDC TARAPUR\r\n', '27200408596 V', '27200408596 C', '27AAACJ1527G1ZV', 'MR. SHARMA', '', '', '', '', 0, '', '', '', 0),
(31, 'PAL FASHIONS PVT LTD', 'PLOT NO- E-49,E-49/1, E-49/2\r\nMIDC TARAPUR\r\n', '27080389747 V', '27080389747 C', '27AABCP7263L1Z0', 'MR. RAVINDRA', '', '', '', '', 0, '', '', '', 0),
(32, 'BOISUR CHEMICALS PVT LTD', 'PLOT NO- T-106\r\nMIDC TARAPUR\r\n', '27170404102 V', '27170404102 C', '27AABCB0099A1Z5', 'MR. RAJESH', '', '02525-661115', '', '', 0, '', '', '', 0),
(33, 'SURYA CHEMICALS', 'MIDC TARAPUR\r\n', '27750138294 V', '27750138294 C', '27AACPY7661H1Z6', 'MR. YADAV', '', '9823147007', '', '', 0, '', '', '', 0),
(34, 'Z H CHEMICALS PVT LTD.', 'PLOT NO- A-34/2, MIDC PATALGANGA,VILLAGE KAIRE,\r\nTAL- KHALAPUR, DIST- RAIGAD\r\n\r\n', '27921117755 V', '27921117755 C', '27AADCK7077M1ZX', 'MR. LAD', 'MR. RADE', '', '', '', 0, '', '', '', 0),
(35, 'SANKUR EXIM PVT LTD', 'PLOT NO- E-53\r\nMIDC TARAPUR\r\n', '27930350431 V', '27930350431 C', '27AAGCS2152Q1ZW', 'MR. SANDIP', '', '', '', '', 0, '', '', '', 0),
(36, 'SOLAR COLOURANT PVT LTD', 'MIDC TARAPUR\r\n', '27350349101 V', '27350349101 C', '27AAACS7123B1ZS', 'MR. ANKIT', '', '', '', '', 0, '', '', '', 0),
(37, 'SHREE CHAKRA ORGANICS PVT LTD', 'PLOT NO- K-62\r\nMIDC TARAPUR\r\n\r\n', '27670002053 V', '27670002053 C', '27AAACS0655A1ZV', 'MR. RAVI', '', '02525-270372', '', '', 0, '', '', '', 0),
(40, 'NANDOLIA ORGANIC CHEMICALS PVT LTD', 'PLOT NO- T-141\r\nMIDC TARAPUR\r\n', '27210998302 V', '27210998302 C', '27AABCN0808M1ZF', 'MR. RIZWAN ', '', '9898405032', '', '', 0, '', '', '', 0),
(41, 'DEEP POLYMER INDUSTRIES', 'NAVAPUR ROAD, BOISAR\r\n', '27930653265 V', '27930653265 V', '27AACPG5695D1ZQ', 'MR. NIMISH', '', '', '', '', 0, '', '', '', 0),
(42, 'ASHU ORGANICS (I) PVT LTD (UNIT II)', 'PLOT NO- W-48,49\r\nMIDC MORIVLI, AMBERNATH (W)\r\nTHANE\r\n', '27550331046 V', '27550331046 C', '27AABCA4578P1Z3', 'MR. ULHAS DEULKAR', '', '', '', '', 0, '', '', '', 0),
(45, 'S D FINE CHEM LTD', 'PLOT NO- E-27/28\r\nMIDC TARAPUR', '27530001160 V', '27530001160 C', '27AAACS5421L1ZA', '', '', '022-24959898/99', '', '', 0, '', '', '', 0),
(46, 'JAY AMBE CHEMICALS', 'PLOT NO- N-115\r\nMIDC TARAPUR\r\n', '27740080827 V', '27740080827 C', '27AADFJ8268N1ZN', 'MR.', '', '9326474961', '', '', 0, '', '', '', 0),
(47, 'ANUH PHARMA LTD', 'PLOT NO- E-17/3 & 4\r\nMIDC TARAPUR\r\n', '27280001443 V', '27280001443 C', '', 'MR. SANJAY', '', '', '', '', 0, '', '', '', 0),
(48, 'ACCUSYNTH SPECIALITY CHEMICALS PVT LTD', 'PLOT NO- E 29/1-2\r\nMIDC TARAPUR\r\n', '27370299911 V', '27370299911 C', '27AACCR2244J1ZE', 'MR. PAREKH', '', '', '', '', 0, '', '', '', 0),
(49, 'MOHINI ORGANICS PVT LTD', 'PLOT NO- T-78/79\r\nMIDC TARAPUR\r\n', '27460350447 V ', '27460350447 C', '', 'MR. SANKHE', '', '', '', '', 0, '', '', '', 0),
(50, 'SHIVAM PHARMA & CHEMICALS', 'MIDC TARAPUR\r\n', '27550911397 V ', '27550911397 C', '', 'MR. SHRIVASTAV', '', '', '', '', 0, '', '', '', 0),
(51, 'MAHARASHTRA ORGANO METALLIC CATALYSTS PVT LTD', 'PLOT NO- N-220 & 221\r\n\r\nMIDC TARAPUR\r\n', '27320299987 V', '27320299987 C', '27AABCM5076C1ZN', 'MR. ANKUR JI', '', '', '', '', 0, '', '', '', 0),
(52, 'PETROGRATE METAL PRODUCTS PVT LTD', 'PLOT NO- W-55/D\r\nMIDC TARAPUR\r\n', '27121161845 V ', '27121161845 C', '27AAICP3286E1Z9', 'MR. RAHUL', '', '9867285012', '', '', 0, '', '', '', 0),
(53, 'SONAL PLASRUB IND. PVT LTD', 'MIDC TARAPUR\r\n', '27570009965 V', '27570009965 V', '27AADCS5643M1ZX', 'MR. SINGH', '', '', '', '', 0, '', '', '', 0),
(54, 'AURO LABORATORIES LIMITED', 'PLOT NO- K-56\r\nMIDC TARAPUR\r\n', '27730329783 V', '27730329783 C', '27AAACA3977D1ZS', 'MR. MISHRA', '', '9320235359', '02266635456/60', '', 0, '', '', '', 0),
(55, 'OCEANIC LABORATORIES PVT LTD', 'PLOT NO- L-91\r\nMIDC TARAPUR\r\n', '27600009415 V ', '27600009415 C', '27AAACO0564C1ZV', 'MR. KUNAL', '', '9819452636', '', '', 0, '', '', '', 0),
(56, 'RETORT CHEMICAL PVT LTD (UNIT II)', 'PLOT NO- D-7/2/1\r\nMIDC TARAPUR\r\n', ' 27890004648 V ', '27890004648 C', '27AAACR2568M1ZZ', 'MR. ARANHA ', '', '02525-645320', '', '', 0, '', '', '', 0),
(57, 'RETORT CHEMICAL PVT LTD (UNIT I)', 'PLOT NO- E-17/1\r\nMIDC TARAPUR\r\n', '27890004648 V', '27890004648 C', '27AAACR2568M1ZZ', 'MR. ARANHA', '', '', '', '', 0, '', '', '', 0),
(58, 'SUCHMI ORGANICS', 'MIDC TARAPUR\r\n', '27020123127 V ', '27020123127 C', '27AAWFS6543C1ZS', 'MR. CHURI', '', '9545532082', '9765490787', '', 0, '', '', '', 0),
(59, 'FIB 2 FAB', 'MIDC TARAPUR\r\n', '27690825281 V ', '27690825281 C', '27AACFF3119P1Z8', 'MR. RAVINDRA', '', '', '', '', 0, '', '', '', 0),
(60, 'OM SAIRUDRA PLASTIC WORKS', 'SHIVAJI NAGAR, SALWAD\r\n', '27321068033 V', '27321068033 C', '27AQJPR7578M1ZQ', 'MR. ANUP', '', '', '', '', 0, '', '', '', 0),
(61, 'SATYAM PLASTIC', 'MIDC TARAPUR\r\n', '27300564808 V ', '27300564808 C', '27BCZPS3879K1Z9', 'MR. SONU', '', '', '', '', 0, '', '', '', 0),
(62, 'SUNDARAM ENTERPRISES', 'MIDC TARAPUR\r\n', '27480860656 V ', '27480860656 C', '27CBUPS2267L1ZP', 'MR. LALA', '', '', '', '', 0, '', '', '', 0),
(63, 'SABARI PLAST', 'MIDC TARAPUR\r\n', ' 27261021700 V ', '27261021700 C', '27AHHPN6281A1ZE', 'MR. NAIR', '', '', '', '', 0, '', '', '', 0),
(64, 'SAI FIBRE ENTERPRISES', 'MIDC TARAPUR\r\n', '27981069222 V ', '27981069222 C', '27ACLFS8450M1ZC', 'MR. MAHENDRA', '', '', '', '', 0, '', '', '', 0),
(65, 'ALBA ORGANICS', 'MIDC TARAPUR\r\n', ' 27360342936 V ', '27360342936 C', '27AAMFA0958R1ZQ', 'MR. BHAVE', '', '', '', '', 0, '', '', '', 0),
(66, 'YOGESH DYESTUFF PRODUCT PVT LTD', 'PLOT NO- C-4/1/4 MIDC TARAPUR\r\n', ' 27280281385 V ', '27280281385 C', '27AAACY0124C1ZX', 'MR. RAJU BHAI', '', '', '', '', 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `deductionshortcode`
--

CREATE TABLE `deductionshortcode` (
  `id` int(10) NOT NULL,
  `shortcode` int(30) NOT NULL,
  `OldHeadOfAccount` int(39) NOT NULL,
  `RationalizedHeadOfAccount` int(30) NOT NULL,
  `Amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deductionshortcodesalary`
--

CREATE TABLE `deductionshortcodesalary` (
  `id` int(10) NOT NULL,
  `shortcode` int(30) NOT NULL,
  `OldHeadOfAccount` int(30) NOT NULL,
  `RationalizedHeadOfAccount` int(30) NOT NULL,
  `Amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deductionvouchersalary`
--

CREATE TABLE `deductionvouchersalary` (
  `id` int(10) NOT NULL,
  `voucherid` int(10) NOT NULL,
  `shortcode` int(30) NOT NULL,
  `OldHeadOfAccount` int(30) NOT NULL,
  `RationalizedHeadOfAccount` int(30) NOT NULL,
  `DrOrCr` varchar(10) NOT NULL,
  `Amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deductionvouchersalary`
--

INSERT INTO `deductionvouchersalary` (`id`, `voucherid`, `shortcode`, `OldHeadOfAccount`, `RationalizedHeadOfAccount`, `DrOrCr`, `Amount`) VALUES
(5, 7, 24, 24, 24, '24', 12),
(6, 8, 12, 12, 12, '12', 2),
(8, 10, 2562, 6256, 7191, 'cr', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `deductionvoucherwork`
--

CREATE TABLE `deductionvoucherwork` (
  `id` int(10) NOT NULL,
  `voucherid` int(10) NOT NULL,
  `shortcode` int(39) NOT NULL,
  `OldHeadOfAccount` int(30) NOT NULL,
  `RationalizedHeadOfAccount` int(30) NOT NULL,
  `DrOrCr` varchar(10) NOT NULL,
  `Amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deductionvoucherwork`
--

INSERT INTO `deductionvoucherwork` (`id`, `voucherid`, `shortcode`, `OldHeadOfAccount`, `RationalizedHeadOfAccount`, `DrOrCr`, `Amount`) VALUES
(27, 30, 102, 3661, 6662, 'cr', 4000),
(28, 31, 22, 8256, 1591, 'cr', 1199),
(29, 31, 24, 2050, 2106, 'cr', 1),
(31, 33, 12, 12, 12, '12', 22),
(32, 34, 21, 21, 21, '21', 11),
(33, 35, 21, 21, 21, '21', 11);

-- --------------------------------------------------------

--
-- Table structure for table `headofaccounts`
--

CREATE TABLE `headofaccounts` (
  `Shortcode` int(11) NOT NULL,
  `OldHeadOfAccount` int(11) NOT NULL,
  `RationalizedHeadOfAccount` int(11) NOT NULL,
  `DrOrCr` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `byUserId` int(11) NOT NULL,
  `byUserName` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `byUserId`, `byUserName`, `description`, `time`) VALUES
(1, 32, 'Admin', 'Created new voucher- works sec', 1689750000),
(3, 32, 'Admin', 'Created new voucher- works sec', 1689750301),
(4, 32, 'Admin', 'Updated voucher with id= 32 in works section', 1689755089),
(5, 32, 'Admin', 'Deleted voucher with id= 32 in works section', 1689757510),
(6, 25, 'test', 'Created new voucher in salary section', 1689757966),
(7, 25, 'test', 'Deleted voucher with id= 11 in works section', 1689757985),
(8, 25, 'test', 'Updated voucher with id= 8 in salary section', 1689758042);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1687765503),
('m140506_102106_rbac_init', 1687767229),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1687767229),
('m180523_151638_rbac_updates_indexes_without_prefix', 1687767229),
('m200409_110543_rbac_update_mssql_trigger', 1687767229);

-- --------------------------------------------------------

--
-- Table structure for table `netpayvouchersalary`
--

CREATE TABLE `netpayvouchersalary` (
  `id` int(10) NOT NULL,
  `voucherid` int(10) NOT NULL,
  `shortcode` varchar(30) NOT NULL,
  `OldHeadOfAccount` int(30) NOT NULL,
  `RationalizedHeadOfAccount` int(30) NOT NULL,
  `DrOrCr` varchar(10) NOT NULL,
  `Amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `netpayvouchersalary`
--

INSERT INTO `netpayvouchersalary` (`id`, `voucherid`, `shortcode`, `OldHeadOfAccount`, `RationalizedHeadOfAccount`, `DrOrCr`, `Amount`) VALUES
(2, 10, '121', 7330, 3667, 'dr', 38000),
(4, 8, '12', 12, 12, 'dr', 10);

-- --------------------------------------------------------

--
-- Table structure for table `netpayvoucherwork`
--

CREATE TABLE `netpayvoucherwork` (
  `id` int(10) NOT NULL,
  `voucherid` int(10) NOT NULL,
  `shortcode` varchar(20) NOT NULL,
  `OldHeadOfAccount` int(30) NOT NULL,
  `RationalizedHeadOfAccount` int(30) NOT NULL,
  `DrOrCr` varchar(10) NOT NULL,
  `Amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `netpayvoucherwork`
--

INSERT INTO `netpayvoucherwork` (`id`, `voucherid`, `shortcode`, `OldHeadOfAccount`, `RationalizedHeadOfAccount`, `DrOrCr`, `Amount`) VALUES
(7, 30, '103', 2412, 1073, 'cr', 1000),
(8, 31, '23', 6921, 4383, 'dr', 3600),
(10, 33, '12', 12, 12, '12', -10),
(11, 34, '21', 21, 21, '12', 10),
(12, 35, '21', 21, 21, '12', 10);

-- --------------------------------------------------------

--
-- Table structure for table `paymentshortcode`
--

CREATE TABLE `paymentshortcode` (
  `id` int(10) NOT NULL,
  `shortcode` int(30) NOT NULL,
  `OldHeadOfAccount` int(30) NOT NULL,
  `RationalizedHeadOfAccount` int(30) NOT NULL,
  `Amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paymentshortcode`
--

INSERT INTO `paymentshortcode` (`id`, `shortcode`, `OldHeadOfAccount`, `RationalizedHeadOfAccount`, `Amount`) VALUES
(2, 1, 111, 111, 100),
(3, 2, 222, 222, 200);

-- --------------------------------------------------------

--
-- Table structure for table `paymentshortcodesalary`
--

CREATE TABLE `paymentshortcodesalary` (
  `id` int(10) NOT NULL,
  `shortcode` int(30) NOT NULL,
  `OldHeadOfAccount` int(30) NOT NULL,
  `RationalizedHeadOfAccount` int(30) NOT NULL,
  `Amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paymentvouchersalary`
--

CREATE TABLE `paymentvouchersalary` (
  `id` int(10) NOT NULL,
  `voucherid` int(10) NOT NULL,
  `shortcode` int(30) NOT NULL,
  `OldHeadOfAccount` int(30) NOT NULL,
  `RationalizedHeadOfAccount` int(30) NOT NULL,
  `DrOrCr` varchar(10) NOT NULL,
  `Amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paymentvouchersalary`
--

INSERT INTO `paymentvouchersalary` (`id`, `voucherid`, `shortcode`, `OldHeadOfAccount`, `RationalizedHeadOfAccount`, `DrOrCr`, `Amount`) VALUES
(6, 7, 24, 24, 24, '24', 24),
(7, 8, 12, 12, 12, '12', 12),
(9, 10, 212, 1111, 2509, 'dr', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `paymentvoucherwork`
--

CREATE TABLE `paymentvoucherwork` (
  `id` int(10) NOT NULL,
  `voucherid` int(10) NOT NULL,
  `shortcode` int(30) NOT NULL,
  `OldHeadOfAccount` int(30) NOT NULL,
  `RationalizedHeadOfAccount` int(30) NOT NULL,
  `DrOrCr` varchar(10) NOT NULL,
  `Amount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paymentvoucherwork`
--

INSERT INTO `paymentvoucherwork` (`id`, `voucherid`, `shortcode`, `OldHeadOfAccount`, `RationalizedHeadOfAccount`, `DrOrCr`, `Amount`) VALUES
(28, 30, 101, 6337, 1039, 'dr', 5000),
(29, 31, 21, 2512, 8657, 'dr', 4800),
(31, 33, 12, 12, 12, '12', 12),
(32, 34, 21, 21, 21, '21', 21),
(33, 35, 21, 21, 21, '21', 21);

-- --------------------------------------------------------

--
-- Table structure for table `user2`
--

CREATE TABLE `user2` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user2`
--

INSERT INTO `user2` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'intern', 'Y3VAKqmY7oy_qmIuvBKL2Nl_Oi7CL6wQ', '$2y$13$MebyTjVyXXDdoqeuifu62u.JXMmGpzIUlU.TfZys/oaL4B.OIXVPW', NULL, 'intern@gmai.com', 9, 1687297312, 1687297312, 'wCiUEppv3hVx-aHjdtDS4M-0X2Y5Ta2c_1687297312'),
(2, 'intern1', '003B6fEYAZHwTqd5pkb0FHAwY6OT6mpB', '$2y$13$PcqrtSHktw08lNDdwtau6OW9MPjbQqjVBCKnyn0US8zTzTKkjRPim', NULL, 'intern@gmail.com', 9, 1687297364, 1687297364, 'hJO22ORQ1CIkehuKs1foK754wmoF9NFV_1687297364'),
(3, 'ath', '6z2gw1PWANFa4CiyQJD-95QnmUZSiSe7', '$2y$13$yUUdMG4dfY6rpMYd3jzZveCbY/hi0HOlffktqpkiTnXXFHgDrr8Ne', NULL, 'ath@ath.com', 10, 1687367940, 1687368109, 'aly2d7V2Hljzdq1LXDjalfaJVTiTSE2u_1687367940'),
(10, 'temp', 'nmMS9T8L6b5orZwMA17f1eLFM4Mf9LrW', 'temp', NULL, '', 10, 1688360266, 1688360266, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(3, 'ath', '6z2gw1PWANFa4CiyQJD-95QnmUZSiSe7', '$2y$13$yUUdMG4dfY6rpMYd3jzZveCbY/hi0HOlffktqpkiTnXXFHgDrr8Ne', NULL, 10, 1687367940, 1687368109, 'aly2d7V2Hljzdq1LXDjalfaJVTiTSE2u_1687367940'),
(25, 'test', '', 'testtest', NULL, 10, 0, 1689311424, NULL),
(26, 'abc', '', 'abc', NULL, 10, 0, 0, NULL),
(28, 'aoa', '', 'aoa', NULL, 10, 0, 0, NULL),
(29, 'user1', 'WbNuj5ZtyQ4DZive-YHuK-I2CPaHnG_k', 'user1', NULL, 10, 1688963613, 1688963613, NULL),
(30, 'cashier', 'EX0humlXpHqMs9MNiAZ3SDwCoI_--JZo', 'cashier', NULL, 10, 1688981807, 1688981807, NULL),
(32, 'Admin', 'ouEQWYy9X66mupeCCBnS-MsqhZtPA-Ea', 'Admin', NULL, 10, 1688981990, 1689760807, NULL),
(33, 'dinesh', 'ixxZ4zHYVLAaS4eHWB9AoRJs2Hmymih5', 'dinesh', NULL, 10, 1689051203, 1689051203, NULL),
(34, 'user4', 'Y0F3O0iN870ykrxgobQ4WApBC0vvzoxj', 'user4', NULL, 10, 1689053178, 1689053178, NULL),
(35, 'xyz', 'geYyTQpfz9k4zm_Z9GKkbrlc64YWCx-Q', 'xyz', NULL, 10, 1689664472, 1689664472, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `valuable`
--

CREATE TABLE `valuable` (
  `id` int(10) NOT NULL,
  `ReceievedForm` varchar(30) NOT NULL,
  `ReferenceLetterNo` int(20) NOT NULL,
  `NatureOfValuable` varchar(30) NOT NULL,
  `Amount` int(20) NOT NULL,
  `SectionToWhichTheValuableBelong` varchar(30) NOT NULL,
  `ReferenceLetterDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `valuable`
--

INSERT INTO `valuable` (`id`, `ReceievedForm`, `ReferenceLetterNo`, `NatureOfValuable`, `Amount`, `SectionToWhichTheValuableBelong`, `ReferenceLetterDate`) VALUES
(1, '121', 12, '2 ', 12, '12', '0000-00-00'),
(120, '123', 33, '32', 32, '32', '0000-00-00'),
(122, 'jf', 32, 'g', 23, '23', '2023-07-12'),
(123, '42', 42, '42', 42, 'work', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `vouchersalary`
--

CREATE TABLE `vouchersalary` (
  `id` int(10) NOT NULL,
  `voucherid` int(10) NOT NULL,
  `NatureOfPayment` varchar(30) NOT NULL,
  `ModeOfPayment` varchar(30) NOT NULL,
  `SanctionRefNo` int(30) NOT NULL,
  `SanctionDate` date NOT NULL,
  `NameOfEmployee` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  `sent2AOA` tinyint(1) NOT NULL,
  `Created_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vouchersalary`
--

INSERT INTO `vouchersalary` (`id`, `voucherid`, `NatureOfPayment`, `ModeOfPayment`, `SanctionRefNo`, `SanctionDate`, `NameOfEmployee`, `status`, `sent2AOA`, `Created_by`) VALUES
(1, 53, '53', '53', 53, '0000-00-00', '53', '✔', 1, 29),
(7, 24, '24', '24', 24, '0000-00-00', '24', '', 1, 25),
(8, 12, '12', '12', 12, '0000-00-00', '12', '✔', 0, 25),
(10, 12, 'UPI', 'gpay', 56894, '2022-12-12', 'peter england', '✔', 1, 32);

-- --------------------------------------------------------

--
-- Table structure for table `voucherwork`
--

CREATE TABLE `voucherwork` (
  `id` int(10) NOT NULL,
  `voucherid` int(10) NOT NULL,
  `NatureOfPayment` varchar(30) NOT NULL,
  `ModeOfPayment` varchar(30) NOT NULL,
  `WorkOrderRefNo` int(20) NOT NULL,
  `WorkOrderDate` date NOT NULL,
  `Description` text NOT NULL,
  `NameOfContractor` varchar(30) NOT NULL,
  `status` varchar(11) NOT NULL,
  `sent2AOA` tinyint(1) NOT NULL,
  `Created_by` int(10) NOT NULL,
  `bankName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voucherwork`
--

INSERT INTO `voucherwork` (`id`, `voucherid`, `NatureOfPayment`, `ModeOfPayment`, `WorkOrderRefNo`, `WorkOrderDate`, `Description`, `NameOfContractor`, `status`, `sent2AOA`, `Created_by`, `bankName`) VALUES
(30, 0, 'RA', 'Cash', 1124927, '2018-08-09', 'Engagement of private security personnel', 'BHARAT RASAYAN ', '✔', 1, 32, ''),
(31, 0, 'RA', 'Cash', 112243, '2022-03-08', 'Engagement of private security personnel', 'BOISUR CHEMICALS PVT LTD', '', 1, 32, ''),
(33, 0, 'dxg', 'xv', 45, '2002-03-06', '45', 'KESHAVA ORGANICS PVT LTD', '', 0, 32, ''),
(34, 0, '21', '21', 21, '0000-00-00', '21', 'KESHAVA ORGANICS PVT LTD', '', 0, 32, ''),
(35, 0, '21', '21', 21, '0000-00-00', '21', 'KESHAVA ORGANICS PVT LTD', '', 0, 32, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `challansalary`
--
ALTER TABLE `challansalary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `challanwork`
--
ALTER TABLE `challanwork`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contractordetails`
--
ALTER TABLE `contractordetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `vat_tin_no` (`vat_tin_no`);

--
-- Indexes for table `deductionshortcode`
--
ALTER TABLE `deductionshortcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deductionshortcodesalary`
--
ALTER TABLE `deductionshortcodesalary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deductionvouchersalary`
--
ALTER TABLE `deductionvouchersalary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voucherid` (`voucherid`),
  ADD KEY `shortcode` (`shortcode`);

--
-- Indexes for table `deductionvoucherwork`
--
ALTER TABLE `deductionvoucherwork`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voucherid` (`voucherid`),
  ADD KEY `shortcode` (`shortcode`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `netpayvouchersalary`
--
ALTER TABLE `netpayvouchersalary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voucherid` (`voucherid`);

--
-- Indexes for table `netpayvoucherwork`
--
ALTER TABLE `netpayvoucherwork`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voucherid` (`voucherid`);

--
-- Indexes for table `paymentshortcode`
--
ALTER TABLE `paymentshortcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentshortcodesalary`
--
ALTER TABLE `paymentshortcodesalary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentvouchersalary`
--
ALTER TABLE `paymentvouchersalary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voucherid` (`voucherid`),
  ADD KEY `shortcode` (`shortcode`);

--
-- Indexes for table `paymentvoucherwork`
--
ALTER TABLE `paymentvoucherwork`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`voucherid`),
  ADD KEY `shortcode` (`shortcode`);

--
-- Indexes for table `user2`
--
ALTER TABLE `user2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `valuable`
--
ALTER TABLE `valuable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vouchersalary`
--
ALTER TABLE `vouchersalary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voucherid` (`voucherid`);

--
-- Indexes for table `voucherwork`
--
ALTER TABLE `voucherwork`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`voucherid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `challansalary`
--
ALTER TABLE `challansalary`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `challanwork`
--
ALTER TABLE `challanwork`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contractordetails`
--
ALTER TABLE `contractordetails`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=860;

--
-- AUTO_INCREMENT for table `deductionshortcode`
--
ALTER TABLE `deductionshortcode`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deductionshortcodesalary`
--
ALTER TABLE `deductionshortcodesalary`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deductionvouchersalary`
--
ALTER TABLE `deductionvouchersalary`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `deductionvoucherwork`
--
ALTER TABLE `deductionvoucherwork`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `netpayvouchersalary`
--
ALTER TABLE `netpayvouchersalary`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `netpayvoucherwork`
--
ALTER TABLE `netpayvoucherwork`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `paymentshortcode`
--
ALTER TABLE `paymentshortcode`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paymentshortcodesalary`
--
ALTER TABLE `paymentshortcodesalary`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentvouchersalary`
--
ALTER TABLE `paymentvouchersalary`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `paymentvoucherwork`
--
ALTER TABLE `paymentvoucherwork`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user2`
--
ALTER TABLE `user2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `valuable`
--
ALTER TABLE `valuable`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `vouchersalary`
--
ALTER TABLE `vouchersalary`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `voucherwork`
--
ALTER TABLE `voucherwork`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deductionvouchersalary`
--
ALTER TABLE `deductionvouchersalary`
  ADD CONSTRAINT `deductionvouchersalary_ibfk_1` FOREIGN KEY (`voucherid`) REFERENCES `vouchersalary` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deductionvoucherwork`
--
ALTER TABLE `deductionvoucherwork`
  ADD CONSTRAINT `deductionvoucherwork_ibfk_1` FOREIGN KEY (`voucherid`) REFERENCES `voucherwork` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `netpayvouchersalary`
--
ALTER TABLE `netpayvouchersalary`
  ADD CONSTRAINT `netpayvouchersalary_ibfk_1` FOREIGN KEY (`voucherid`) REFERENCES `vouchersalary` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `netpayvoucherwork`
--
ALTER TABLE `netpayvoucherwork`
  ADD CONSTRAINT `netpayvoucherwork_ibfk_1` FOREIGN KEY (`voucherid`) REFERENCES `voucherwork` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paymentvouchersalary`
--
ALTER TABLE `paymentvouchersalary`
  ADD CONSTRAINT `paymentvouchersalary_ibfk_1` FOREIGN KEY (`voucherid`) REFERENCES `vouchersalary` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paymentvoucherwork`
--
ALTER TABLE `paymentvoucherwork`
  ADD CONSTRAINT `paymentvoucherwork_ibfk_3` FOREIGN KEY (`voucherid`) REFERENCES `voucherwork` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
