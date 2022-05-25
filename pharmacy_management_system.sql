-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 04:55 AM
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
-- Table structure for table `customertable`
--

CREATE TABLE `customertable` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `FName` varchar(200) NOT NULL,
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

INSERT INTO `customertable` (`ID`, `Name`, `FName`, `Phone`, `Email`, `Address`, `Photo`, `DateTime`, `UpDateTime`, `Status`) VALUES
(1, 'Oindrila', 'fasf', '141', 'dfasdf', 'fsadf', 'safdsaf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 'Hazrat', 'fasf', '141', 'dfasdf', 'fsadf', 'safdsaf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(3, 'Riazul Islam', '', '4521144', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(4, 'Riazul Islam', '', '4521144', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0);

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
  `CustomerID` varchar(30) NOT NULL,
  `SellerID` varchar(30) NOT NULL,
  `NetPayment` float NOT NULL,
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

INSERT INTO `invoice` (`ID`, `InvoiceId`, `CustomerID`, `SellerID`, `NetPayment`, `Tax`, `discount`, `PaidAmount`, `DueAmount`, `Note`, `Up_date`, `Status`) VALUES
(116, '', '3028', '7902', 39, 0, 0, 39, 0, '', '0000-00-00', 0),
(117, '', '4595', '7902', 17, 0, 0, 17, 0, '', '0000-00-00', 0),
(118, '', '1067', 'AB7903', 1421.04, 0, 106.96, 0, 0, '', '0000-00-00', 0),
(119, '', '1756', 'AB7903', 20, 0, 0, 0, 0, '', '0000-00-00', 0),
(120, '', '240', 'AB7903', 78, 0, 0, 0, 0, '', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `medicine_category`
--

CREATE TABLE `medicine_category` (
  `ID` int(11) NOT NULL,
  `MedicineCategory` text NOT NULL,
  `MedicineCategoryStatus` int(3) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicine_category`
--

INSERT INTO `medicine_category` (`ID`, `MedicineCategory`, `MedicineCategoryStatus`, `Date`) VALUES
(1, 'Liquid', 1, '2021-12-10 20:40:02'),
(4, 'Syrup', 1, '2021-12-11 07:13:14'),
(5, 'Tablet', 1, '2021-12-10 20:41:03'),
(6, 'Cream', 1, '2021-12-10 20:41:30'),
(8, 'Capsul', 1, '2021-12-10 20:42:20'),
(9, 'Ointment', 1, '2021-12-11 07:13:20');

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
(13, 'Napa extend', 'MAD0125', 'aaaaa', 'kl', 11, '100', 44, '', '11', '11', '11', 120.25, 125.005, '', 0, '', '2021-12-04', '05:50:57', 1),
(14, 'Histacine', '7902', 'nas', 'mg', 11, '500', 4, 'fsaf', '11', '11', 'SK+f', 125.254, 125.005, '', 0, '', '2021-12-04', '19:31:17', 1),
(15, 'napa', '7903', 'asfasdf', 'mg', 11, '300', 4, '', '11', '11', 'SK+f', 125.254, 125.005, '', 0, '', '2021-12-05', '10:22:37', 1),
(17, 'Sinecod SR', 'MB1230', 'Butomirate citrate INN', 'mg', 10, '50', 7, '', 'Tablet', 'Heart disease', 'Square', 125.51, 5, '', 0, '', '2021-12-11', '04:12:45', 1),
(18, 'Fexo', 'FX152', 'N/A', 'mg', 50, '100', 9, '', 'Tablet', 'Suspension', 'Square', 5.8, 5, '', 0, '', '2021-12-11', '07:32:19', 1),
(19, 'Tryptin', 'S12541', '', 'mg', 100, '10', 13, '', 'Tablet', 'Heart disease', 'Square', 2.7, 3, '', 0, '', '2021-12-11', '15:52:43', 1),
(20, 'Almex', 'MB1231', 'Paracitamol', 'mg', 10, '400', 8, '', 'Capsul', 'Suspension', 'Novo', 33.48, 50.13, '', 0, '', '2021-12-11', '15:58:25', 1);

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
(5, 'Pain Killer 2', '0000-00-00', 1),
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
(4, 'mg', '2021-12-12 21:14:56', 1),
(5, 'mg', '2021-12-10 22:03:25', 1),
(6, 'microgram', '2021-12-12 21:15:09', 1),
(7, 'litre', '2021-12-12 21:15:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sellingproduct`
--

CREATE TABLE `sellingproduct` (
  `ID` int(11) NOT NULL,
  `InvoiceId` varchar(40) NOT NULL,
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
(1933202, '116', '3028', 'MB1231', '112233', 1, 13, 12.25, 0, 0, '2021-12-16 06:35:13', '7902', 0),
(1933205, '117', '4595', 'MB1231', '112233', 1, 13, 12.25, 0, 0, '2021-12-16 06:44:12', '7902', 0),
(1933207, '118', '1067', '7902', '144174', 52, 22, 20, 0, 0, '2022-05-15 05:27:30', 'AB7903', 0),
(1933209, '119', '1756', '7903', '112246', 1, 4, 3.6, 0, 0, '2022-05-15 05:28:10', 'AB7903', 0),
(1933211, '120', '240', '7903', '112246', 3, 4, 3.6, 0, 0, '2022-05-16 05:05:28', 'AB7903', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stocktable`
--

CREATE TABLE `stocktable` (
  `ID` int(11) NOT NULL,
  `Item_code` varchar(50) NOT NULL,
  `BatchNumber` varchar(40) NOT NULL,
  `InQty` int(10) NOT NULL,
  `OutQty` int(11) NOT NULL,
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

INSERT INTO `stocktable` (`ID`, `Item_code`, `BatchNumber`, `InQty`, `OutQty`, `PurPrice`, `SellPrice`, `PurBoxPrice`, `SellBoxPrice`, `Date`, `Up_Date`, `Status`) VALUES
(10, 'MB1231', '112233', 5120, 1325, 12.25, 13, 240, 280, '2022-05-20', '2021-12-15 15:26:06', 1),
(11, 'MB1230', '112244', 150, 15, 15, 16, 0, 0, '2022-03-11', '2021-12-15 15:27:21', 1),
(12, '7902', '144174', 1425, 142, 20, 22, 0, 0, '2022-07-22', '2021-12-15 15:27:21', 1),
(13, '7903', '112246', 2564, 1325, 3.6, 4, 0, 0, '2022-07-21', '2021-12-15 15:28:27', 1);

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
-- Indexes for table `sellingproduct`
--
ALTER TABLE `sellingproduct`
  ADD PRIMARY KEY (`InvoiceId`),
  ADD UNIQUE KEY `ID` (`ID`);

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
-- AUTO_INCREMENT for table `customertable`
--
ALTER TABLE `customertable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expance`
--
ALTER TABLE `expance`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `medicine_category`
--
ALTER TABLE `medicine_category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `medicine_list`
--
ALTER TABLE `medicine_list`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `medicine_type`
--
ALTER TABLE `medicine_type`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `medicine_unit`
--
ALTER TABLE `medicine_unit`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sellingproduct`
--
ALTER TABLE `sellingproduct`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1933213;

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
