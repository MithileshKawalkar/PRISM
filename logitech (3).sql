-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 11:50 AM
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
('read-voucherwork', '33', NULL);

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
(3, 5, 21, 21, 21, '21', 11),
(5, 7, 24, 24, 24, '24', 12),
(6, 8, 12, 12, 12, '12', 2);

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
(8, 10, 0, 0, 0, '', 0),
(9, 11, 0, 0, 0, '', 0),
(10, 12, 0, 0, 0, '', 0),
(11, 13, 12, 12, 0, '12', 0),
(15, 18, 4, 4, 4, '4', 4),
(22, 25, 21, 21, 21, '21', 12),
(24, 27, 12, 12, 12, '12', 2);

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
(2, 25, '21', 21, 21, '21', 9),
(4, 27, '12', 12, 12, '12', 0);

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
(4, 5, 21, 21, 21, '21`', 21),
(6, 7, 24, 24, 24, '24', 24),
(7, 8, 12, 12, 12, '12', 12);

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
(8, 10, 6, 6, 66, '6', 12),
(9, 11, 8, 8, 8, '8', 8),
(10, 12, 9, 9, 9, '9', 9),
(11, 13, 0, 0, 0, 'y', 0),
(16, 18, 4, 4, 4, '4', 44),
(23, 25, 21, 21, 21, '21', 21),
(25, 27, 1, 1, 12, '1', 2);

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
(25, 'test', '', 'test', NULL, 10, 0, 0, NULL),
(26, 'abc', '', 'abc', NULL, 10, 0, 0, NULL),
(28, 'aoa', '', 'aoa', NULL, 10, 0, 0, NULL),
(29, 'user1', 'WbNuj5ZtyQ4DZive-YHuK-I2CPaHnG_k', 'user1', NULL, 10, 1688963613, 1688963613, NULL),
(30, 'cashier', 'EX0humlXpHqMs9MNiAZ3SDwCoI_--JZo', 'cashier', NULL, 10, 1688981807, 1688981807, NULL),
(32, 'Admin', 'ouEQWYy9X66mupeCCBnS-MsqhZtPA-Ea', 'admin', NULL, 10, 1688981990, 1688981990, NULL),
(33, 'dinesh', 'ixxZ4zHYVLAaS4eHWB9AoRJs2Hmymih5', 'dinesh', NULL, 10, 1689051203, 1689051203, NULL),
(34, 'user4', 'Y0F3O0iN870ykrxgobQ4WApBC0vvzoxj', 'user4', NULL, 10, 1689053178, 1689053178, NULL);

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
(5, 21, '21', '21', 21, '0000-00-00', '21', '❌', 0, 25),
(7, 24, '24', '24', 24, '0000-00-00', '24', '', 1, 25),
(8, 12, '12', '12', 12, '0000-00-00', '12', '✔', 0, 25);

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
  `Created_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voucherwork`
--

INSERT INTO `voucherwork` (`id`, `voucherid`, `NatureOfPayment`, `ModeOfPayment`, `WorkOrderRefNo`, `WorkOrderDate`, `Description`, `NameOfContractor`, `status`, `sent2AOA`, `Created_by`) VALUES
(3, 3, '3', '3', 3, '0000-00-00', '3', '3', '✔', 1, 29),
(6, 4, '1', '1', 1, '2023-07-05', '12', '12', '✔', 1, 29),
(7, 0, '1', '1', 1, '0000-00-00', '1', '1', '❌', 0, 33),
(10, 0, '66', '6', 6, '0000-00-00', '6', '6', '✔', 1, 33),
(11, 0, '8', '8', 8, '0000-00-00', '8', '8', '✔', 1, 25),
(12, 0, '9', '9', 9, '0000-00-00', '9', '9', '', 0, 25),
(13, 0, 'y', 'y', 0, '0000-00-00', 'y', 'y', '', 0, 25),
(18, 0, '4', '4', 4, '0000-00-00', '4', '4', '', 0, 0),
(25, 0, '21', '21', 21, '0000-00-00', '21', '21', '', 0, 25),
(27, 0, '12', '12', 122, '0000-00-00', '12', '11', '✔', 1, 25);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `deductionvoucherwork`
--
ALTER TABLE `deductionvoucherwork`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `netpayvouchersalary`
--
ALTER TABLE `netpayvouchersalary`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `netpayvoucherwork`
--
ALTER TABLE `netpayvoucherwork`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `paymentvoucherwork`
--
ALTER TABLE `paymentvoucherwork`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user2`
--
ALTER TABLE `user2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `valuable`
--
ALTER TABLE `valuable`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `vouchersalary`
--
ALTER TABLE `vouchersalary`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `voucherwork`
--
ALTER TABLE `voucherwork`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
