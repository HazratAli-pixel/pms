-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2022 at 07:59 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `UserId` varchar(40) NOT NULL,
  `Position` varchar(20) NOT NULL,
  `ActiveStatus` int(11) NOT NULL,
  `Up_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `UserId`, `Position`, `ActiveStatus`, `Up_Date`) VALUES
(1, 'admin', 'eef6f4457ee96f8bae1893f5b234d238', '7902', 'Admin', 1, '2021-12-12 15:02:33'),
(8, 'hazrat369ali@gmail.com', 'eef6f4457ee96f8bae1893f5b234d238', 'AB7903', 'Cashier', 1, '2021-12-10 00:01:50'),
(9, 'halicse14@outlook.com', 'eef6f4457ee96f8bae1893f5b234d238', 'AB7902', 'Admin', 1, '2021-12-08 19:41:57'),
(10, 'hazrat369ali@gmail.com', '6786f3c62fbf9021694f6e51cc07fe3c', 'AB14526', 'Manager', 1, '2021-12-14 17:31:03');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `ID` int(11) NOT NULL,
  `name` text NOT NULL,
  `mobile` text NOT NULL,
  `email1` text NOT NULL,
  `email2` text NOT NULL,
  `phono` text NOT NULL,
  `contact` text NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `fax` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zip` text NOT NULL,
  `country` text NOT NULL,
  `priviousbal` float NOT NULL,
  `companyid` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `time` time NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`ID`, `name`, `mobile`, `email1`, `email2`, `phono`, `contact`, `address1`, `address2`, `fax`, `city`, `state`, `zip`, `country`, `priviousbal`, `companyid`, `date`, `time`, `status`) VALUES
(1, 'SK+f', '+8801306440448', 'hazrat369ali@gmail.com', 'hazrat369ali@gmail.com', '', '', 'http://hazratinfo.com/', '', '', '', '', '5310', 'Bangladesh', 120.02, '1', '2021-12-04', '04:44:01', 1),
(2, 'Square', '+8801306440448', 'hazrat369ali@gmail.com', 'hazrat369ali@gmail.com', '', '', 'rasiz', '', '', '', '', '', '', 1552.65, '2', '2021-12-04', '06:02:26', 1),
(3, 'SANDOZ', '01306440448', 'hazrat369ali@gmail.com', 'hazrat369ali@gmail.com', '01306440448', 'dsafa', 'saidpur, Nayatola', '', '', 'Saidpur', '', '5310', 'Bangladesh', 1254.41, '1222', '2021-12-11', '04:48:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customerledger`
--

CREATE TABLE `customerledger` (
  `ID` int(3) NOT NULL,
  `AdminID` text NOT NULL,
  `CustomerID` text NOT NULL,
  `InvoiceId` int(11) NOT NULL,
  `Debit` float NOT NULL,
  `PreDue` float NOT NULL,
  `Total` float NOT NULL,
  `Credit` float NOT NULL,
  `NewDue` float NOT NULL,
  `Status` int(1) NOT NULL,
  `Comments` text NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customerledger`
--

INSERT INTO `customerledger` (`ID`, `AdminID`, `CustomerID`, `InvoiceId`, `Debit`, `PreDue`, `Total`, `Credit`, `NewDue`, `Status`, `Comments`, `Date`) VALUES
(1, '7902', '2', 0, 210, 0, 210, 210, 0, 0, '', '2022-08-04'),
(2, '7902', '2', 0, 232, 0, 232, 200, 32, 0, '', '2022-08-04'),
(3, '7902', '5', 0, 195.7, 0, 195.7, 195.7, 0, 0, '', '2022-08-04'),
(4, '7902', '5', 0, 187.15, 0, 187.15, 100, 87.15, 0, '', '2022-08-04'),
(5, '7902', '6', 186, 341.05, 0, 341.05, 300, 41.05, 0, '', '2022-08-04'),
(6, '7902', '6', 187, 182, 41.05, 223.05, 223.05, 0, 0, '', '2022-08-04'),
(7, '7902', '6', 188, 130, 0, 130, 100, 30, 0, '', '2022-08-04'),
(8, '7902', '6', 189, 902.4, 30, 932.4, 500, 432.4, 0, '', '2022-08-04'),
(9, '7902', '2', 190, 462.65, 32, 494.65, 400, 94.65, 0, '', '2022-08-04'),
(10, '7902', '0', 191, 182, 0, 182, 182, 0, 0, '', '2022-08-04'),
(11, '7902', '0', 192, 40, 0, 40, 0, 0, 0, '', '2022-08-04'),
(12, '7902', '0', 193, 170, 0, 170, 170, 0, 0, '', '2022-08-04'),
(13, '7902', '0', 194, 123, 0, 123, 123, 0, 0, '', '2022-08-04'),
(14, '7902', '0', 195, 245, 0, 245, 245, 0, 0, '', '2022-08-04'),
(16, '7902', '3', 197, 98.8, 3000, 3098.8, 2500, 598.8, 0, '', '2022-08-05'),
(45, '7902', '2', 0, 0, 94.65, 94.65, 50, 44.65, 0, '', '2022-08-08'),
(46, '7902', '2', 0, 0, 44.65, 44.65, 44.65, 0, 0, '', '2022-08-08'),
(47, '7902', '3', 0, 0, 598.8, 598.8, 598.8, 0, 0, '', '2022-08-08'),
(48, '7902', '6', 0, 0, 432.4, 432.4, 300, 132.4, 0, '', '2022-08-08');

--
-- Triggers `customerledger`
--
DELIMITER $$
CREATE TRIGGER `cusledgerduecal` BEFORE INSERT ON `customerledger` FOR EACH ROW SET new.Total=new.Debit+new.PreDue, new.NewDue=new.Total-new.Credit
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customertable`
--

CREATE TABLE `customertable` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Phone` varchar(30) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` text NOT NULL,
  `Photo` varchar(150) NOT NULL,
  `DateTime` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `UpDateTime` datetime NOT NULL,
  `Status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customertable`
--

INSERT INTO `customertable` (`ID`, `Name`, `Phone`, `Email`, `Address`, `Photo`, `DateTime`, `UpDateTime`, `Status`) VALUES
(0, 'Waking Customer', '00000000000', '', 'Unknown', '', '2022-08-07 04:34:00', '0000-00-00 00:00:00', 1),
(1, 'Oindrila', '', 'dfasdf', 'Boksipara', '122.20', '2022-06-02 22:48:54', '0000-00-00 00:00:00', 1),
(2, 'Hazrat', '01306440448', 'dfasdf', '', '12545.2', '2022-08-07 05:31:35', '0000-00-00 00:00:00', 1),
(3, 'Riazul Islam', '', '', 'Chapra', '1845', '2022-08-07 05:31:36', '0000-00-00 00:00:00', 1),
(5, 'Riazul Islam', '', '', 'uttorpara', '', '2022-06-02 23:11:10', '0000-00-00 00:00:00', 1),
(6, 'Hasibul Islam', '01781835778', '', 'Foridpur', '', '2022-08-08 11:24:06', '0000-00-00 00:00:00', 1),
(8, 'Palash Rajbongsi', '01236547896', '', 'Puran Dhaka', '', '2022-08-08 11:31:55', '0000-00-00 00:00:00', 1),
(9, 'Imran Hasanb', '01234567896', '', 'Mohammapur', '', '2022-08-07 10:28:04', '0000-00-00 00:00:00', 1),
(10, 'Likchon Islam', '01908180170', '', 'Kashiram Belpukur', '', '2022-08-07 10:28:05', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `expance`
--

CREATE TABLE `expance` (
  `ID` int(11) NOT NULL,
  `UserId` varchar(40) NOT NULL,
  `NetAmount` float NOT NULL,
  `PaymentWay` varchar(40) NOT NULL,
  `Note` text NOT NULL,
  `AccountNo` varchar(100) NOT NULL,
  `BankName` varchar(40) NOT NULL,
  `PaymentBy` varchar(40) NOT NULL,
  `PayRcvBy` varchar(40) NOT NULL,
  `VerifiedStatus` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `expancelist`
--

CREATE TABLE `expancelist` (
  `ID` int(11) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `ExpenceName` varchar(20) NOT NULL,
  `UserId` varchar(40) NOT NULL,
  `PaymentBy` varchar(40) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `ID` int(11) NOT NULL,
  `InvoiceId` varchar(30) NOT NULL,
  `CustomerID` varchar(30) NOT NULL DEFAULT '0',
  `SellerID` varchar(30) NOT NULL,
  `NetPayment` float NOT NULL,
  `PreDue` float NOT NULL,
  `Total_with_due` float NOT NULL,
  `Tax` float NOT NULL,
  `discount` float NOT NULL,
  `PaidAmount` float NOT NULL,
  `DueAmount` float NOT NULL,
  `Note` text NOT NULL,
  `Up_date` date NOT NULL,
  `Status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`ID`, `InvoiceId`, `CustomerID`, `SellerID`, `NetPayment`, `PreDue`, `Total_with_due`, `Tax`, `discount`, `PaidAmount`, `DueAmount`, `Note`, `Up_date`, `Status`) VALUES
(156, '', '273325', '7902', 33, 0, 0, 0, 0, 33, 0, '', '0000-00-00', 0),
(157, '', '247788', '7902', 596.6, 0, 0, 0, 31.4, 1010.6, 0, '', '0000-00-00', 0),
(158, '', '434140', '7902', 20, 0, 0, 0, 0, 0, 0, '', '0000-00-00', 0),
(159, '', '51889', '7902', 420.85, 0, 0, 0, 22.15, 2700, 720.85, '', '0000-00-00', 0),
(160, '', '312564', '7902', 326.6, 0, 0, 0, 28.4, 500, 240.6, '', '0000-00-00', 0),
(161, '', '374946', '7902', 402, 0, 0, 0, 0, 0, 0, '', '0000-00-00', 0),
(162, '', '182914', '7902', 38, 0, 0, 0, 0, 38, 0, '', '0000-00-00', 0),
(163, '', '422723', '7902', 85, 0, 0, 0, 0, 85, 0, '', '0000-00-00', 0),
(164, '', '3', '7902', 2787.3, 0, 0, 0, 146.7, 4632.3, 0, '', '0000-00-00', 0),
(165, '', '3', '7902', 992.75, 0, 0, 0, 52.25, 2837.75, 0, '', '0000-00-00', 0),
(166, '', '1', '7902', 1444, 0, 0, 0, 76, 1566.2, 0, '', '0000-00-00', 0),
(167, '', '3', '7902', 38, 0, 0, 0, 0, 0, 0, '', '0000-00-00', 0),
(168, '', '2', '7902', 39, 0, 0, 0, 0, 39, 0, '', '0000-00-00', 0),
(169, '', '2', '7902', 180.32, 0, 0, 0, 15.68, 12725.5, 0, '', '0000-00-00', 0),
(170, '', '2', '7902', 798, 0, 0, 0, 42, 5000, 8343.2, '', '0000-00-00', 0),
(171, '', '2', '7902', 1615, 12545.2, 0, 0, 85, 13000, 1160.2, '', '0000-00-00', 0),
(172, '', '2', '7902', 1687.2, 12545.2, 14232.4, 0, 88.8, 10000, 4232.4, '', '0000-00-00', 0),
(173, '', '1', '7902', 855, 122.2, 977.2, 0, 45, 1000, 0, '', '0000-00-00', 0),
(174, '', '0', '7902', 20, 0, 20, 0, 0, 20, 0, '', '0000-00-00', 0),
(175, '', '0', '7902', 650, 0, 650, 0, 0, 650, 0, '', '0000-00-00', 0),
(176, '', '0', '7902', 130, 0, 130, 0, 0, 130, 0, '', '0000-00-00', 0),
(177, '', '0', '7902', 146, 0, 146, 0, 0, 146, 0, '', '0000-00-00', 0),
(178, '', '0', '7902', 220, 0, 220, 0, 0, 220, 0, '', '0000-00-00', 0),
(179, '', '0', '7902', 8, 0, 8, 0, 0, 8, 0, '', '0000-00-00', 0),
(180, '', '3', '7902', 358.15, 1845, 2203.15, 0, 18.85, 2203.15, 0, '', '0000-00-00', 0),
(181, '', '0', '7902', 260, 0, 260, 0, 0, 260, 0, '', '0000-00-00', 0),
(182, '', '2', '7902', 210, 12545.2, 12755.2, 0, 0, 12755.2, 0, '', '0000-00-00', 0),
(183, '', '2', '7902', 232, 0, 232, 0, 0, 200, 32, '', '0000-00-00', 0),
(184, '', '5', '7902', 195.7, 0, 195.7, 0, 10.3, 195.7, 0, '', '0000-00-00', 0),
(185, '', '5', '7902', 187.15, 0, 187.15, 0, 9.85, 100, 87.15, '', '0000-00-00', 0),
(186, '', '6', '7902', 341.05, 0, 341.05, 0, 17.95, 300, 41.05, '', '0000-00-00', 0),
(187, '', '6', '7902', 182, 41.05, 223.05, 0, 0, 223.05, 0, '', '0000-00-00', 0),
(188, '', '6', '7902', 130, 0, 130, 0, 0, 100, 30, '', '0000-00-00', 0),
(189, '', '6', '7902', 902.4, 30, 932.4, 0, 37.6, 500, 432.4, '', '0000-00-00', 0),
(190, '', '2', '7902', 462.65, 32, 494.65, 0, 24.35, 400, 94.65, '', '0000-00-00', 0),
(191, '', '0', '7902', 182, 0, 182, 0, 0, 182, 0, '', '0000-00-00', 0),
(192, '', '0', '7902', 40, 0, 40, 0, 0, 0, 0, '', '0000-00-00', 0),
(193, '', '0', '7902', 170, 0, 170, 0, 0, 170, 0, '', '0000-00-00', 0),
(194, '', '0', '7902', 123, 0, 123, 0, 0, 123, 0, '', '0000-00-00', 0),
(195, '', '0', '7902', 245, 0, 245, 0, 0, 245, 0, '', '0000-00-00', 0),
(196, '', '0', '7902', 228, 0, 228, 0, 12, 500, 160.4, '', '0000-00-00', 0),
(197, '', '3', '7902', 98.8, 3000, 3098.8, 0, 5.2, 2500, 598.8, '', '0000-00-00', 0),
(198, '', '0', '7902', 260, 0, 260, 0, 0, 260, 0, '', '0000-00-00', 0),
(199, '', '0', '7902', 299, 0, 299, 0, 0, 299, 0, '', '0000-00-00', 0),
(200, '', '0', '7902', 245, 0, 245, 0, 0, 245, 0, '', '0000-00-00', 0),
(201, '', '0', '7902', 350, 0, 350, 0, 0, 350, 0, '', '0000-00-00', 0),
(202, '', '0', '7902', 350, 0, 350, 0, 0, 350, 0, '', '0000-00-00', 0),
(203, '', '0', '7902', 1750, 0, 1750, 0, 0, 1750, 0, '', '0000-00-00', 0);

--
-- Triggers `invoice`
--
DELIMITER $$
CREATE TRIGGER `TotalPaymentwithdue` BEFORE INSERT ON `invoice` FOR EACH ROW SET new.Total_with_due=new.NetPayment+new.PreDue
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `customer_ledger` AFTER INSERT ON `invoice` FOR EACH ROW INSERT INTO customerledger (AdminID,CustomerID,InvoiceId,Debit,PreDue,Credit) 
VALUES(new.SellerID,new.CustomerID,new.ID,new.NetPayment,new.PreDue,new.PaidAmount)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `medicine_category`
--

CREATE TABLE `medicine_category` (
  `ID` int(11) NOT NULL,
  `MedicineCategory` text NOT NULL,
  `Status` int(3) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine_category`
--

INSERT INTO `medicine_category` (`ID`, `MedicineCategory`, `Status`, `Date`) VALUES
(1, 'Liquid', 1, '2021-12-10 20:40:02'),
(4, 'Syrup', 1, '2021-12-11 07:13:14'),
(5, 'Tablet', 0, '2022-08-05 14:52:32'),
(6, 'Cream', 1, '2021-12-10 20:41:30'),
(8, 'Capsul', 1, '2021-12-10 20:42:20'),
(9, 'Ointment', 1, '2021-12-11 07:13:20'),
(11, 'All', 0, '2022-08-05 14:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_list`
--

CREATE TABLE `medicine_list` (
  `ID` int(11) NOT NULL,
  `medicine_name` text NOT NULL,
  `item_code` text NOT NULL,
  `generic_name` text NOT NULL,
  `unit` varchar(20) NOT NULL,
  `box_size` int(11) NOT NULL,
  `strength` text NOT NULL,
  `shelf` int(11) NOT NULL,
  `medicine_details` text NOT NULL,
  `category` text NOT NULL,
  `medicine_type` text NOT NULL,
  `menufacturer` text NOT NULL,
  `company_price` float NOT NULL,
  `selling_pricce` float NOT NULL,
  `image` text NOT NULL,
  `igta` float NOT NULL,
  `bar_code` text NOT NULL,
  `date_time` date NOT NULL DEFAULT current_timestamp(),
  `last_update` time NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine_list`
--

INSERT INTO `medicine_list` (`ID`, `medicine_name`, `item_code`, `generic_name`, `unit`, `box_size`, `strength`, `shelf`, `medicine_details`, `category`, `medicine_type`, `menufacturer`, `company_price`, `selling_pricce`, `image`, `igta`, `bar_code`, `date_time`, `last_update`, `status`) VALUES
(13, 'Napa extend', 'MAD0125', 'aaaaa', 'kl', 11, '100', 20, '', '11', '11', '11', 120.25, 125.005, '', 0, '', '2021-12-04', '05:50:57', 1),
(14, 'Histacine', '7902', 'nas', 'mg', 11, '500', 5, 'fsaf', '11', '11', 'SK+f', 125.254, 125.005, '', 0, '', '2021-12-04', '19:31:17', 1),
(15, 'napa', '7903', 'asfasdf', 'mg', 11, '300', 15, '', '11', '11', 'SK+f', 125.254, 125.005, '', 0, '', '2021-12-05', '10:22:37', 1),
(17, 'Sinecod SR', 'MB1230', 'Butomirate citrate INN', 'mg', 10, '50', 7, '', 'Tablet', 'Heart disease', 'Square', 125.51, 5, '', 0, '', '2021-12-11', '04:12:45', 1),
(18, 'Fexo', 'FX152', 'N/A', 'mg', 50, '100', 9, '', 'Tablet', 'Suspension', 'Square', 5.8, 5, '', 0, '', '2021-12-11', '07:32:19', 1),
(19, 'Tryptin', 'S12541', '', 'mg', 100, '10', 13, '', 'Tablet', 'Heart disease', 'Square', 2.7, 3, '', 0, '', '2021-12-11', '15:52:43', 1),
(20, 'Almex', 'MB1231', 'Paracitamol', 'mg', 10, '400', 8, '', 'Capsul', 'Suspension', 'Novo', 33.48, 50.13, '', 0, '', '2021-12-11', '15:58:25', 1),
(21, 'aaaaaaa', '424', '', '', 0, '', 0, '', 'ointment', '', '', 0, 0, '', 0, '', '0000-00-00', '00:00:00', 1),
(22, 'bbbbb', '456', '', '', 0, '', 0, '', 'ointment', '', '', 0, 0, '', 0, '', '0000-00-00', '00:00:00', 1),
(23, 'cccc', '857', '', '', 0, '', 0, '', 'Capsul', '', '', 0, 0, '', 0, '', '0000-00-00', '00:00:00', 1),
(24, 'dddddd', '6585', '', '', 0, '', 0, '', 'syrup', '', '', 0, 0, '', 0, '', '0000-00-00', '00:00:00', 1),
(25, 'ewwwwfdfs', '54254', '', '', 0, '', 0, '', 'syrup', '', '', 0, 0, '', 0, '', '0000-00-00', '00:00:00', 1),
(26, 'sdafsdafsadf', '45324', '', '', 0, '', 0, '', 'Capsul', '', '', 0, 0, '', 0, '', '0000-00-00', '00:00:00', 1),
(27, 'tregrgdfg', '354', '', '', 0, '', 0, '', 'liquid', '', '', 0, 0, '', 0, '', '0000-00-00', '00:00:00', 1),
(28, 'ersdgdfgr w', '445', '', '', 0, '', 0, '', 'cream', '', '', 0, 0, '', 0, '', '0000-00-00', '00:00:00', 1),
(29, 'sadfawersdfa ', '1452', '', '', 0, '', 0, '', 'cream', '', '', 0, 0, '', 0, '', '0000-00-00', '00:00:00', 1),
(30, 'sadfsdafsdf', '17452', '', '', 0, '', 0, '', 'syrup', '', '', 0, 0, '', 0, '', '0000-00-00', '00:00:00', 1),
(31, 'tewsdff ', '25741', '', '', 0, '', 0, '', 'Capsul', '', '', 0, 0, '', 0, '', '0000-00-00', '00:00:00', 1),
(32, 'safwefsf', '2751', '', '', 0, '', 0, '', 'Tablet', '', '', 0, 0, '', 0, '', '0000-00-00', '00:00:00', 1),
(33, 'sdksjdafk', '57874', '', '', 0, '', 0, '', 'syrup', '', '', 0, 0, '', 0, '', '0000-00-00', '00:00:00', 1),
(34, 'asfwerfsdf', '275', '', '', 0, '', 0, '', 'syrup', '', '', 0, 0, '', 0, '', '0000-00-00', '00:00:00', 1),
(35, 'redfdff', '7574', '', '', 0, '', 0, '', 'cream', '', '', 0, 0, '', 0, '', '0000-00-00', '00:00:00', 1),
(36, 'sdaf ksdaf', '24141', '', '', 0, '', 0, '', '', '', '', 0, 0, '', 0, '', '0000-00-00', '00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `medicine_type`
--

CREATE TABLE `medicine_type` (
  `ID` int(11) NOT NULL,
  `MedicineType` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine_type`
--

INSERT INTO `medicine_type` (`ID`, `MedicineType`, `Date`, `Status`) VALUES
(2, 'Suspension', '0000-00-00', 1),
(3, 'Pain Killer', '0000-00-00', 1),
(4, 'Heart disease', '0000-00-00', 1),
(6, 'Suspension', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `medicine_unit`
--

CREATE TABLE `medicine_unit` (
  `ID` int(11) NOT NULL,
  `MedicineUnit` varchar(40) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine_unit`
--

INSERT INTO `medicine_unit` (`ID`, `MedicineUnit`, `Date`, `Status`) VALUES
(3, 'gram', '2021-12-12 21:14:47', 1),
(5, 'mg', '2022-08-05 14:29:36', 0),
(6, 'microgram', '2021-12-12 21:15:09', 1),
(7, 'litre', '2022-08-06 05:52:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rules_table`
--

CREATE TABLE `rules_table` (
  `ID` int(3) NOT NULL,
  `UserId` text NOT NULL,
  `Customer` int(1) NOT NULL,
  `Company` int(1) NOT NULL,
  `Medicine_info` int(1) NOT NULL,
  `Medicine_add` int(1) NOT NULL,
  `Purches` int(1) NOT NULL,
  `Invoice` int(1) NOT NULL,
  `Return_rule` int(1) NOT NULL,
  `Stock` int(1) NOT NULL,
  `Bank` int(1) NOT NULL,
  `Accounts` int(1) NOT NULL,
  `Report` int(1) NOT NULL,
  `HR` int(1) NOT NULL,
  `Tax` int(1) NOT NULL,
  `Service` int(1) NOT NULL,
  `Application` int(1) NOT NULL,
  `Status` int(1) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Update_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sellingproduct`
--

CREATE TABLE `sellingproduct` (
  `ID` int(8) NOT NULL,
  `InvoiceId` text NOT NULL,
  `CustomerID` varchar(40) NOT NULL,
  `ProductId` varchar(40) NOT NULL,
  `BatchId` varchar(40) NOT NULL,
  `Qty` int(4) NOT NULL,
  `Price` float NOT NULL,
  `NetPrice` float NOT NULL,
  `BoxPrcie` float NOT NULL,
  `NetBoxPrice` float NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `SellerId` varchar(40) NOT NULL,
  `Status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellingproduct`
--

INSERT INTO `sellingproduct` (`ID`, `InvoiceId`, `CustomerID`, `ProductId`, `BatchId`, `Qty`, `Price`, `NetPrice`, `BoxPrcie`, `NetBoxPrice`, `Date`, `SellerId`, `Status`) VALUES
(1, '157', '247788', 'MB1231', '112233', 10, 13, 12.25, 0, 0, '2022-05-27 11:13:17', '7902', 0),
(2, '157', '247788', '7902', '144174', 11, 22, 20, 0, 0, '2022-05-27 11:13:17', '7902', 0),
(3, '157', '247788', '7903', '112246', 12, 4, 3.6, 0, 0, '2022-05-27 11:13:17', '7902', 0),
(4, '157', '247788', 'MB1230', '112244', 13, 16, 15, 0, 0, '2022-05-27 11:13:17', '7902', 0),
(5, '158', '434140', '7903', '112246', 1, 4, 3.6, 0, 0, '2022-05-27 11:16:40', '7902', 0),
(6, '158', '434140', 'MB1230', '112244', 1, 16, 15, 0, 0, '2022-05-27 11:16:40', '7902', 0),
(7, '159', '51889', 'MB1231', '112233', 15, 13, 12.25, 0, 0, '2022-05-28 12:37:23', '7902', 0),
(8, '159', '51889', '7902', '112246', 14, 4, 3.6, 0, 0, '2022-06-02 14:26:29', '7902', 0),
(9, '159', '51889', 'MB1230', '112244', 12, 16, 150, 0, 0, '2022-05-28 12:37:23', '7902', 0),
(10, '160', '312564', 'MB1231', '112233', 15, 13, 12.25, 0, 0, '2022-06-01 16:14:29', '7902', 0),
(11, '160', '312564', 'MB1230', '112244', 10, 16, 150, 0, 0, '2022-06-01 16:14:29', '7902', 0),
(12, '161', '374946', '7902', '144174', 11, 22, 20, 0, 0, '2022-06-02 14:04:36', '7902', 0),
(13, '161', '374946', 'MB1230', '112244', 10, 16, 150, 0, 0, '2022-06-02 14:04:36', '7902', 0),
(14, '162', '182914', '7902', '144174', 1, 22, 20, 0, 0, '2022-06-02 14:05:47', '7902', 0),
(15, '162', '182914', 'MB1230', '112244', 1, 16, 150, 0, 0, '2022-06-02 14:05:47', '7902', 0),
(16, '163', '422723', 'MB1231', '112233', 5, 13, 12.25, 0, 0, '2022-06-02 14:27:55', '7902', 0),
(17, '163', '422723', '7903', '112246', 5, 4, 3.6, 0, 0, '2022-06-02 14:27:55', '7902', 0),
(18, '165', '', 'MB1231', '112233', 17, 208.25, 12.25, 0, 0, '2022-06-02 18:15:06', '7902', 0),
(19, '165', '', 'MB1230', '112244', 14, 2100, 150, 0, 0, '2022-06-02 18:15:06', '7902', 0),
(20, '165', '', '7903', '112246', 150, 540, 3.6, 0, 0, '2022-06-02 18:15:06', '7902', 0),
(21, '166', '', 'MB1230', '112244', 74, 1184, 150, 0, 0, '2022-06-02 18:25:12', '7902', 0),
(22, '166', '', '7903', '112246', 45, 180, 3.6, 0, 0, '2022-06-02 18:25:12', '7902', 0),
(23, '166', '', 'MB1231', '112233', 12, 156, 12.25, 0, 0, '2022-06-02 18:25:12', '7902', 0),
(24, '167', '', 'MB1230', '112244', 1, 16, 15, 0, 0, '2022-06-17 19:17:01', '7902', 0),
(25, '167', '', '7902', '144174', 1, 22, 21, 0, 0, '2022-06-17 19:17:01', '7902', 0),
(26, '168', '', 'MB1231', '112233', 1, 13, 12.25, 0, 0, '2022-06-18 07:06:59', '7902', 0),
(27, '168', '', '7902', '144174', 1, 22, 21, 0, 0, '2022-06-18 07:06:59', '7902', 0),
(28, '168', '', '7903', '112246', 1, 4, 3.6, 0, 0, '2022-06-18 07:06:59', '7902', 0),
(29, '169', '', '7903', '112246', 45, 180, 3.6, 0, 0, '2022-08-01 20:21:47', '7902', 0),
(30, '169', '', 'MB1230', '112244', 1, 16, 15, 0, 0, '2022-08-01 20:21:47', '7902', 0),
(31, '169', '', '7902', '144174', 10, 220, 21, 0, 0, '2022-08-03 10:24:18', '7902', 0),
(32, '169', '', '7903', '112246', 41, 164, 3.6, 0, 0, '2022-08-03 10:24:21', '7902', 0),
(33, '170', '', '7903', '112246', 10, 40, 3.6, 0, 0, '2022-08-03 10:41:21', '7902', 0),
(34, '170', '', 'MB1230', '112244', 50, 800, 15, 0, 0, '2022-08-03 10:41:21', '7902', 0),
(39, '171', '', 'MB1231', '112233', 100, 1300, 12.25, 0, 0, '2022-08-03 11:02:59', '7902', 0),
(40, '171', '', '7903', '112246', 100, 400, 3.6, 0, 0, '2022-08-03 11:02:59', '7902', 0),
(41, '172', '', 'MB1231', '112233', 52, 676, 12.25, 0, 0, '2022-08-03 11:06:34', '7902', 0),
(42, '172', '', '7902', '144174', 50, 1100, 21, 0, 0, '2022-08-03 11:06:34', '7902', 0),
(43, '173', '', '7903', '112246', 5, 20, 3.6, 0, 0, '2022-08-03 11:08:29', '7902', 0),
(44, '173', '', '7902', '144174', 40, 880, 21, 0, 0, '2022-08-03 11:08:29', '7902', 0),
(45, '174', '', '7903', '112246', 1, 4, 3.6, 0, 0, '2022-08-03 11:09:34', '7902', 0),
(46, '174', '', 'MB1230', '112244', 1, 16, 15, 0, 0, '2022-08-03 11:09:34', '7902', 0),
(47, '175', '', 'MB1231', '112233', 50, 650, 12.25, 0, 0, '2022-08-03 17:54:07', '7902', 0),
(48, '176', '', 'MB1231', '112233', 10, 130, 12.25, 0, 0, '2022-08-03 18:36:29', '7902', 0),
(49, '177', '', 'MB1231', '112233', 10, 130, 12.25, 0, 0, '2022-08-03 18:41:32', '7902', 0),
(50, '177', '', '7903', '112246', 4, 16, 3.6, 0, 0, '2022-08-03 18:41:32', '7902', 0),
(51, '178', '', '7902', '144174', 10, 220, 21, 0, 0, '2022-08-03 18:47:05', '7902', 0),
(52, '179', '', '7903', '112246', 2, 8, 3.6, 0, 0, '2022-08-03 18:49:11', '7902', 0),
(53, '180', '', 'MB1231', '112233', 5, 65, 12.25, 0, 0, '2022-08-03 18:54:00', '7902', 0),
(54, '180', '', '7903', '112246', 6, 24, 3.6, 0, 0, '2022-08-03 18:54:00', '7902', 0),
(55, '180', '', 'MB1230', '112244', 7, 112, 15, 0, 0, '2022-08-03 18:54:00', '7902', 0),
(56, '180', '', '7902', '144174', 8, 176, 21, 0, 0, '2022-08-03 18:54:00', '7902', 0),
(57, '181', '', '7903', '112246', 10, 40, 3.6, 0, 0, '2022-08-03 18:54:48', '7902', 0),
(58, '181', '', '7902', '144174', 10, 220, 21, 0, 0, '2022-08-03 18:54:48', '7902', 0),
(59, '182', '', 'MB1231', '112233', 6, 78, 12.25, 0, 0, '2022-08-03 19:18:58', '7902', 0),
(60, '182', '', '7902', '144174', 6, 132, 21, 0, 0, '2022-08-03 19:18:58', '7902', 0),
(61, '183', '', 'MB1231', '112233', 6, 78, 12.25, 0, 0, '2022-08-03 19:25:06', '7902', 0),
(62, '183', '', '7902', '144174', 7, 154, 21, 0, 0, '2022-08-03 19:25:06', '7902', 0),
(63, '184', '', 'MB1231', '112233', 4, 52, 12.25, 0, 0, '2022-08-03 19:35:10', '7902', 0),
(64, '184', '', '7902', '144174', 7, 154, 21, 0, 0, '2022-08-03 19:35:10', '7902', 0),
(65, '185', '', 'MB1231', '112233', 5, 65, 12.25, 0, 0, '2022-08-03 19:36:17', '7902', 0),
(66, '185', '', '7902', '144174', 6, 132, 21, 0, 0, '2022-08-03 19:36:17', '7902', 0),
(67, '186', '', 'MB1231', '112233', 9, 117, 12.25, 0, 0, '2022-08-03 19:43:14', '7902', 0),
(68, '186', '', '7902', '144174', 11, 242, 21, 0, 0, '2022-08-03 19:43:14', '7902', 0),
(69, '187', '', 'MB1231', '112233', 14, 182, 12.25, 0, 0, '2022-08-03 19:44:23', '7902', 0),
(70, '188', '', 'MB1231', '112233', 10, 130, 12.25, 0, 0, '2022-08-03 19:47:58', '7902', 0),
(71, '189', '', 'MB1231', '112233', 20, 260, 12.25, 0, 0, '2022-08-03 20:01:15', '7902', 0),
(72, '189', '', '7903', '112246', 50, 200, 3.6, 0, 0, '2022-08-03 20:01:15', '7902', 0),
(73, '189', '', 'MB1230', '112244', 30, 480, 15, 0, 0, '2022-08-03 20:01:15', '7902', 0),
(74, '190', '', 'MB1231', '112233', 7, 91, 12.25, 0, 0, '2022-08-04 05:06:39', '7902', 0),
(75, '190', '', '7902', '144174', 18, 396, 21, 0, 0, '2022-08-04 05:06:39', '7902', 0),
(76, '191', '', '7902', '144174', 1, 22, 21, 0, 0, '2022-08-04 05:09:00', '7902', 0),
(77, '191', '', '7903', '112246', 40, 160, 3.6, 0, 0, '2022-08-04 05:09:00', '7902', 0),
(78, '192', '', '7903', '112246', 10, 40, 3.6, 0, 0, '2022-08-04 08:45:47', '7902', 0),
(79, '193', '', '7903', '112246', 10, 40, 3.6, 0, 0, '2022-08-04 11:04:27', '7902', 0),
(80, '193', '', 'MB1231', '112233', 10, 130, 12.25, 0, 0, '2022-08-04 11:04:27', '7902', 0),
(81, '194', '', 'MB1231', '112233', 7, 91, 12.25, 0, 0, '2022-08-04 11:06:24', '7902', 0),
(82, '194', '', '7903', '112246', 8, 32, 3.6, 0, 0, '2022-08-04 11:06:24', '7902', 0),
(83, '195', '', 'MB1231', '112233', 7, 91, 12.25, 0, 0, '2022-08-04 11:06:55', '7902', 0),
(84, '195', '', '7902', '144174', 7, 154, 21, 0, 0, '2022-08-04 11:06:55', '7902', 0),
(85, '196', '', '7903', '144174', 5, 110, 21, 0, 0, '2022-08-05 11:10:33', '7902', 0),
(86, '196', '', 'MB1231', '112233', 10, 130, 12.25, 0, 0, '2022-08-05 11:10:33', '7902', 0),
(87, '197', '', 'MB1231', '112233', 8, 104, 12.25, 0, 0, '2022-08-05 12:40:39', '7902', 0),
(88, '198', '', 'MB1231', '112233', 20, 260, 12.25, 0, 0, '2022-08-07 04:27:04', '7902', 0),
(89, '199', '', 'MB1231', '112233', 1, 13, 12.25, 0, 0, '2022-08-07 04:31:04', '7902', 0),
(90, '199', '', '7903', '144174', 13, 286, 21, 0, 0, '2022-08-07 04:31:04', '7902', 0),
(91, '200', '', 'MB1231', '112233', 7, 91, 12.25, 0, 0, '2022-08-07 04:32:34', '7902', 0),
(92, '200', '', '7903', '144174', 7, 154, 21, 0, 0, '2022-08-07 04:32:34', '7902', 0),
(93, '201', '', 'MB1231', '112233', 10, 130, 12.25, 0, 0, '2022-08-07 04:37:05', '7902', 0),
(94, '201', '', '7903', '144174', 10, 220, 21, 0, 0, '2022-08-07 04:37:05', '7902', 0),
(95, '202', '', 'MB1231', '112233', 10, 130, 12.25, 0, 0, '2022-08-07 04:38:29', '7902', 0),
(96, '202', '', '7903', '144174', 10, 220, 21, 0, 0, '2022-08-07 04:38:29', '7902', 0),
(97, '203', '', 'MB1231', '112233', 50, 650, 12.25, 0, 0, '2022-08-07 04:39:56', '7902', 0),
(98, '203', '', '7903', '144174', 50, 1100, 21, 0, 0, '2022-08-07 04:39:56', '7902', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sr_table`
--

CREATE TABLE `sr_table` (
  `ID` int(3) NOT NULL,
  `CompanyId` varchar(18) NOT NULL,
  `SRName` varchar(30) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Designation` varchar(20) NOT NULL,
  `UserID` varchar(15) NOT NULL,
  `Status` int(2) NOT NULL,
  `Inputdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stocktable`
--

CREATE TABLE `stocktable` (
  `ID` int(11) NOT NULL,
  `Item_code` varchar(50) NOT NULL,
  `BatchNumber` varchar(40) NOT NULL,
  `InQty` int(10) NOT NULL,
  `SellQty` int(11) NOT NULL,
  `OutQty` int(11) NOT NULL,
  `RestQty` int(11) NOT NULL,
  `PurPrice` float NOT NULL,
  `SellPrice` float NOT NULL,
  `PurBoxPrice` float NOT NULL,
  `SellBoxPrice` float NOT NULL,
  `Date` date NOT NULL,
  `Up_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stocktable`
--

INSERT INTO `stocktable` (`ID`, `Item_code`, `BatchNumber`, `InQty`, `SellQty`, `OutQty`, `RestQty`, `PurPrice`, `SellPrice`, `PurBoxPrice`, `SellBoxPrice`, `Date`, `Up_Date`, `Status`) VALUES
(10, 'MB1231', '112233', 2000, 0, 1544, 456, 12.25, 13, 240, 280, '2022-05-20', '2022-08-07 04:40:34', 1),
(11, 'MB1230', '112244', 180, 0, 180, 0, 15, 16, 0, 0, '2022-03-11', '2022-08-04 11:14:05', 1),
(12, '7903', '144174', 2000, 0, 1621, 379, 21, 22, 0, 0, '2022-07-22', '2022-08-07 04:40:27', 1),
(13, '7903', '112246', 3033, 0, 2692, 341, 3.6, 4, 0, 0, '2022-07-21', '2022-08-04 10:33:17', 1);

--
-- Triggers `stocktable`
--
DELIMITER $$
CREATE TRIGGER `upstocktable` BEFORE UPDATE ON `stocktable` FOR EACH ROW SET new.OutQty=new.SellQty+new.OutQty,new.SellQty=0, new.RestQty=new.InQty-new.OutQty
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `ID` int(11) NOT NULL,
  `UserId` varchar(20) NOT NULL,
  `NidNumber` varchar(40) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `FName` varchar(40) NOT NULL,
  `MName` varchar(404) NOT NULL,
  `Phone1` varchar(40) NOT NULL,
  `Phone2` varchar(40) NOT NULL,
  `Email1` varchar(40) NOT NULL,
  `Email2` varchar(40) NOT NULL,
  `Address` text NOT NULL,
  `Photo` varchar(40) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`ID`, `UserId`, `NidNumber`, `Name`, `FName`, `MName`, `Phone1`, `Phone2`, `Email1`, `Email2`, `Address`, `Photo`, `Date`, `Status`) VALUES
(1, 'AB7902', '4663186106', 'Hazrat Ali', 'Md. Nazrul Islam', 'Most. Anjuara Begum', '12121221', '44454545', 'hazrat369ali@gmail.com', 'hazrat369ali@gmail.com', 'saidpur, Nayatola', 'avatar.jpg', '2021-12-12 16:06:05', 1),
(2, 'AB7903', '4663186126', 'Omar Faruk', 'Md. Nazrul Islam', 'Most. Anjuara Begum', '12121221', '44454545', 'hazrat369ali@gmail.com', 'hazrat369ali@gmail.com', 'saidpur, Nayatola sadf ', 'Aristopharma job thm.jpg', '2021-12-08 20:20:37', 0),
(3, '7902', '12545545', 'Hazrat Ali', 'Md. Nazrul Islam', 'Most. Anjuara Begum', '+8801306440448', '', 'halicse14@outlook.com', 'halicse14@outlook.com', 'http://hazratinfo.com/karsaf', 'ali.jpg', '2021-12-12 16:06:01', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `11` (`companyid`) USING HASH;

--
-- Indexes for table `customerledger`
--
ALTER TABLE `customerledger`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customertable`
--
ALTER TABLE `customertable`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `expance`
--
ALTER TABLE `expance`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`ID`,`InvoiceId`);

--
-- Indexes for table `medicine_category`
--
ALTER TABLE `medicine_category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `medicine_list`
--
ALTER TABLE `medicine_list`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `medicine_type`
--
ALTER TABLE `medicine_type`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `medicine_unit`
--
ALTER TABLE `medicine_unit`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rules_table`
--
ALTER TABLE `rules_table`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sellingproduct`
--
ALTER TABLE `sellingproduct`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sr_table`
--
ALTER TABLE `sr_table`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `stocktable`
--
ALTER TABLE `stocktable`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customerledger`
--
ALTER TABLE `customerledger`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `customertable`
--
ALTER TABLE `customertable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `expance`
--
ALTER TABLE `expance`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `medicine_category`
--
ALTER TABLE `medicine_category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `medicine_list`
--
ALTER TABLE `medicine_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `medicine_type`
--
ALTER TABLE `medicine_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `medicine_unit`
--
ALTER TABLE `medicine_unit`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rules_table`
--
ALTER TABLE `rules_table`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellingproduct`
--
ALTER TABLE `sellingproduct`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `sr_table`
--
ALTER TABLE `sr_table`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stocktable`
--
ALTER TABLE `stocktable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
