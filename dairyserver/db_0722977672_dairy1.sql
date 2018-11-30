-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 19, 2018 at 10:54 AM
-- Server version: 10.2.17-MariaDB
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `db_0721977672_dairy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_animal`
--

CREATE TABLE `tbl_yagan_animal` (
  `Animal_ID` varchar(20) NOT NULL,
  `calfid` varchar(30) NOT NULL,
  `Animal_Name` varchar(50) NOT NULL,
  `DoB` date NOT NULL,
  `Breed_type` varchar(30) NOT NULL,
  `Breed_product` varchar(30) NOT NULL,
  `Potential_yield` int(10) NOT NULL,
  `Bodyweight` int(10) NOT NULL,
  `Color` varchar(50) NOT NULL,
  `dateadmitted` date NOT NULL,
  `animalgender` varchar(10) NOT NULL,
  `animalsource` varchar(50) NOT NULL,
  `value` double NOT NULL,
  `culled` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_animalbreed`
--

CREATE TABLE `tbl_yagan_animalbreed` (
  `SNo` int(20) NOT NULL,
  `Breedtype` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_yagan_animalbreed`
--

INSERT INTO `tbl_yagan_animalbreed` (`SNo`, `Breedtype`, `description`) VALUES
(4, 'BREDD001', 'Friesian'),
(5, 'BREED002', 'Guernsey'),
(6, 'BREED003', 'Jersey'),
(7, 'BREED004', 'Ayshire');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_animalbreedingservice`
--

CREATE TABLE `tbl_yagan_animalbreedingservice` (
  `SNo` int(11) NOT NULL,
  `breedingserviceid` varchar(30) NOT NULL,
  `AnimalID` varchar(30) NOT NULL,
  `sirebreed` varchar(30) NOT NULL,
  `Servicedate` date NOT NULL,
  `servicetype` varchar(30) NOT NULL,
  `Estimatecalfdate` date NOT NULL,
  `calvingease` varchar(30) NOT NULL,
  `serviceprovider` varchar(30) NOT NULL,
  `comments` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_animalcalvingrecord`
--

CREATE TABLE `tbl_yagan_animalcalvingrecord` (
  `CalvngID` int(11) NOT NULL,
  `AnimalID` varchar(30) NOT NULL,
  `calfbreedtype` varchar(30) NOT NULL,
  `calvingdate` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `aliveordead` varchar(10) NOT NULL,
  `calfID` varchar(30) NOT NULL,
  `calfName` varchar(30) NOT NULL,
  `hybridlevel` varchar(10) NOT NULL,
  `calfbodycolor` varchar(30) NOT NULL,
  `calfcowsire` varchar(50) NOT NULL,
  `calfmaternalgranddam` varchar(50) NOT NULL,
  `calfpaternalgranddam` varchar(50) NOT NULL,
  `calfmaternalgrandsire` varchar(50) NOT NULL,
  `calfpaternalgrandsire` varchar(50) NOT NULL,
  `winned` varchar(10) NOT NULL DEFAULT 'no'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_animalfamily`
--

CREATE TABLE `tbl_yagan_animalfamily` (
  `familyid` int(11) NOT NULL,
  `animalID` varchar(20) NOT NULL,
  `hybridlevel` varchar(40) NOT NULL,
  `cowdam` varchar(50) NOT NULL,
  `cowsire` varchar(50) NOT NULL,
  `maternalgranddam` varchar(50) NOT NULL,
  `paternalgranddam` varchar(50) NOT NULL,
  `maternalgrandsire` varchar(50) NOT NULL,
  `paternalgrandsire` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_buyer`
--

CREATE TABLE `tbl_yagan_buyer` (
  `Buyerid` varchar(20) NOT NULL,
  `buyername` varchar(30) NOT NULL,
  `Buyertype` varchar(30) NOT NULL,
  `dateadded` date NOT NULL,
  `buyerproducttype` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_buyertype`
--

CREATE TABLE `tbl_yagan_buyertype` (
  `SNo` int(20) NOT NULL,
  `buyercode` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_configitems`
--

CREATE TABLE `tbl_yagan_configitems` (
  `id` int(20) NOT NULL,
  `typecode` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL,
  `configdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_yagan_configitems`
--

INSERT INTO `tbl_yagan_configitems` (`id`, `typecode`, `description`, `type`, `configdate`) VALUES
(6, 'B002', 'Ayshire', 'DIT001', '2018-09-05'),
(7, 'B003', 'Guernsey', 'DIT001', '2018-09-05'),
(8, 'B004', 'Jersey', 'DIT001', '2018-09-05'),
(9, 'B001', 'Fresian', 'DIT001', '2018-09-05'),
(10, 'FW001', 'Farm Manager', 'DIT002', '2018-09-05'),
(11, 'FW002', 'Milk Man', 'DIT002', '2018-09-05'),
(12, 'FW005', 'Cleaner', 'DIT002', '2018-09-05'),
(13, 'FEED001', 'Hay', 'DIT008', '2018-09-06'),
(14, 'SER001', 'Deworming', 'DIT003', '2018-09-14'),
(15, 'DIS001', 'Foot and Mouth', 'DIT007', '2018-09-14'),
(16, 'SER003', 'Vaccination', 'DIT003', '2018-09-14'),
(17, 'BUY001', 'Wholesaler', 'DIT005', '2018-09-14'),
(18, 'BUY002', 'Retail Milk', 'DIT005', '2018-09-14'),
(19, 'CON001', 'Spray chemical', 'DIT011', '2018-09-14'),
(20, 'CON002', 'Salt', 'DIT011', '2018-09-14'),
(21, 'FED002', 'Forder', 'DIT008', '2018-09-14'),
(22, 'FED003', 'Hay', 'DIT008', '2018-09-14'),
(23, 'BUy2363', 'buyer2', 'DIT005', '2018-09-19'),
(24, 'FW009', 'Overseer', 'DIT002', '2018-09-19'),
(26, 'FEED002', 'Forder', 'DIT008', '2018-09-19'),
(27, 'FEED003', 'Green food', 'DIT008', '2018-09-19'),
(34, 'CON003', 'Milk salt', 'DIT011', '2018-09-19'),
(35, 'BREDD001', 'Friesian', 'DIT001', '2018-09-19'),
(36, 'BREED002', 'Guernsey', 'DIT001', '2018-09-19'),
(37, 'BREED003', 'Jersey', 'DIT001', '2018-09-19'),
(38, 'BREED004', 'Ayshire', 'DIT001', '2018-09-19'),
(39, 'CMNGT001', 'Weighing', 'DIT0012', '2018-09-19'),
(41, 'WK003', 'Milk Man', 'DIT002', '2018-09-19'),
(42, 'SERVICE001', 'Vaccination', 'DIT003', '2018-09-19'),
(43, 'SERVICE002', 'Spraying', 'DIT003', '2018-09-19'),
(44, 'SERVICE004', 'Deworming', 'DIT003', '2018-09-19'),
(45, 'BUYER001', 'Wholesaler', 'DIT005', '2018-09-19'),
(46, 'BUYER002', 'Retail', 'DIT005', '2018-09-19'),
(47, 'BUYER3', 'Society', 'DIT005', '2018-09-19'),
(48, 'SERVICE005', 'Veternary', 'DIT003', '2018-10-02'),
(49, 'CON0190', 'Milking jelly', 'DIT011', '2018-10-02'),
(50, 'Con 02929', 'Spraying powder', 'DIT011', '2018-10-02'),
(51, 'Donations', 'Donations', 'DIT004', '2018-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_consumablesstock`
--

CREATE TABLE `tbl_yagan_consumablesstock` (
  `stockid` int(20) NOT NULL,
  `ConsumableID` varchar(30) NOT NULL,
  `Consumabletype` varchar(30) NOT NULL,
  `stockqnty` int(20) NOT NULL,
  `currentstock` int(20) NOT NULL,
  `stockdate` date NOT NULL,
  `providerid` varchar(20) NOT NULL,
  `itembrandname` varchar(40) NOT NULL,
  `itemprice` float NOT NULL,
  `itemname` varchar(40) NOT NULL,
  `reorderlevel` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_consumablestypes`
--

CREATE TABLE `tbl_yagan_consumablestypes` (
  `SNo` int(11) NOT NULL,
  `Consumabletype` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_yagan_consumablestypes`
--

INSERT INTO `tbl_yagan_consumablestypes` (`SNo`, `Consumabletype`, `description`) VALUES
(2, 'CON001', 'Dewormers Nilzan'),
(3, 'CON002', 'Triatix'),
(4, 'CON003', 'Milk salt'),
(5, 'CON0190', 'Milking jelly'),
(6, 'Con 02929', 'Spraying powder');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_culfmanagement`
--

CREATE TABLE `tbl_yagan_culfmanagement` (
  `CalfID` varchar(20) NOT NULL,
  `mngcode` varchar(30) NOT NULL,
  `activitydate` date NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_culfmanagementtypes`
--

CREATE TABLE `tbl_yagan_culfmanagementtypes` (
  `SNo` int(11) NOT NULL,
  `mngttype` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_yagan_culfmanagementtypes`
--

INSERT INTO `tbl_yagan_culfmanagementtypes` (`SNo`, `mngttype`, `description`) VALUES
(1, 'CMNGT001', 'Weighing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_culling`
--

CREATE TABLE `tbl_yagan_culling` (
  `Animal_ID` varchar(20) NOT NULL,
  `cullreason` varchar(100) NOT NULL,
  `cullanimalvalue` double NOT NULL,
  `culldate` date NOT NULL,
  `cull_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_documentmngt`
--

CREATE TABLE `tbl_yagan_documentmngt` (
  `SNo` int(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `file_type` varchar(40) NOT NULL,
  `upload_date` date NOT NULL,
  `file_name` varchar(40) NOT NULL,
  `file_desc` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_equipmentacquisition`
--

CREATE TABLE `tbl_yagan_equipmentacquisition` (
  `equipment_id` varchar(30) NOT NULL,
  `equipment_name` varchar(30) NOT NULL,
  `equipment_type` varchar(40) NOT NULL,
  `equipment_cost` float NOT NULL,
  `equipment_date` date NOT NULL,
  `acquisition_type` varchar(30) NOT NULL,
  `equipment_condition` varchar(30) NOT NULL,
  `equipment_life` varchar(20) NOT NULL,
  `equipment_operator` varchar(40) NOT NULL,
  `equipment_use` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_equipmentservice`
--

CREATE TABLE `tbl_yagan_equipmentservice` (
  `SNo` int(20) NOT NULL,
  `EquipmentID` varchar(30) NOT NULL,
  `Servicedate` date NOT NULL,
  `serviceprovider` varchar(30) NOT NULL,
  `servicecost` float NOT NULL,
  `servicetype` varchar(40) NOT NULL,
  `servicedescription` varchar(100) NOT NULL,
  `servicereasons` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_farmworkers`
--

CREATE TABLE `tbl_yagan_farmworkers` (
  `workerID` varchar(20) NOT NULL,
  `Surname` varchar(20) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `OtherNames` varchar(20) NOT NULL,
  `IDCard` varchar(20) NOT NULL,
  `personempdate` date NOT NULL,
  `DoB` date NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `JobGrade` varchar(20) NOT NULL,
  `Worktype` varchar(20) NOT NULL,
  `empdate` date NOT NULL,
  `salary` float NOT NULL,
  `removed` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_farmworkerstypes`
--

CREATE TABLE `tbl_yagan_farmworkerstypes` (
  `SNo` int(20) NOT NULL,
  `workertype` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_yagan_farmworkerstypes`
--

INSERT INTO `tbl_yagan_farmworkerstypes` (`SNo`, `workertype`, `description`) VALUES
(1, 'FW009', 'Overseer'),
(2, 'FW002', 'Farm Manager'),
(3, 'WK003', 'Milk Man');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_feeding`
--

CREATE TABLE `tbl_yagan_feeding` (
  `feedingid` varchar(30) NOT NULL,
  `feedtype` varchar(30) NOT NULL,
  `animal` varchar(30) NOT NULL,
  `feeddate` date NOT NULL,
  `feedqnty` int(20) NOT NULL,
  `feedingtime` varchar(30) NOT NULL,
  `feedingcomments` varchar(30) NOT NULL,
  `consumedcost` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_feedtype`
--

CREATE TABLE `tbl_yagan_feedtype` (
  `SNo` int(20) NOT NULL,
  `feedtype` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_yagan_feedtype`
--

INSERT INTO `tbl_yagan_feedtype` (`SNo`, `feedtype`, `description`) VALUES
(1, 'FEED001', 'Hay'),
(3, 'FEED002', 'Forder'),
(4, 'FEED003', 'Green mater');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_itemtypes`
--

CREATE TABLE `tbl_yagan_itemtypes` (
  `itemcode` varchar(20) NOT NULL,
  `itemtype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_yagan_itemtypes`
--

INSERT INTO `tbl_yagan_itemtypes` (`itemcode`, `itemtype`) VALUES
('DIT001', 'Animal breed '),
('DIT005', 'Buyer '),
('DIT012', 'Calf Managemnt'),
('DIT011', 'Consumables'),
('DIT007', 'Disease'),
('DIT002', 'Farm worker '),
('DIT008', 'Feed'),
('DIT010', 'incomepayments'),
('DIT009', 'Product '),
('DIT004', 'Product use'),
('DIT003', 'Service type'),
('DIT006', 'Treatment ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_newdairyregistration`
--

CREATE TABLE `tbl_yagan_newdairyregistration` (
  `SNo` int(30) NOT NULL,
  `dairyphone` varchar(20) NOT NULL,
  `dairyemail` varchar(40) NOT NULL,
  `verified` int(11) NOT NULL,
  `verification_code` varchar(264) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dairysurname` varchar(30) NOT NULL,
  `dairyothernames` varchar(30) NOT NULL,
  `dairyusername` varchar(20) NOT NULL,
  `dairybrandname` varchar(50) NOT NULL,
  `regdate` date NOT NULL,
  `trial` varchar(10) DEFAULT 'yes',
  `endtrialdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_production`
--

CREATE TABLE `tbl_yagan_production` (
  `productionid` varchar(40) NOT NULL,
  `productiondate` date NOT NULL,
  `animalID` varchar(30) NOT NULL,
  `producttype` varchar(30) NOT NULL,
  `productqnty` int(10) NOT NULL,
  `totalprice` double NOT NULL,
  `comments` text NOT NULL,
  `productiontime` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_productsale`
--

CREATE TABLE `tbl_yagan_productsale` (
  `SNo` int(20) NOT NULL,
  `productsaleID` varchar(60) NOT NULL,
  `BuyerID` varchar(30) NOT NULL,
  `Producttype` varchar(30) NOT NULL,
  `saledate` date NOT NULL,
  `saleamount` int(20) NOT NULL,
  `saleprice` decimal(30,0) NOT NULL,
  `salesperson` varchar(30) NOT NULL,
  `modeofpay` varchar(40) NOT NULL,
  `termsofpay` varchar(40) NOT NULL,
  `totalamount` decimal(30,0) NOT NULL,
  `paid` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_productuse`
--

CREATE TABLE `tbl_yagan_productuse` (
  `SNo` int(30) NOT NULL,
  `useid` varchar(30) NOT NULL,
  `producttype` varchar(30) NOT NULL,
  `usetype` varchar(30) NOT NULL,
  `usedate` date NOT NULL,
  `amountused` int(30) NOT NULL,
  `whoused` varchar(30) NOT NULL,
  `productiontime` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_productype`
--

CREATE TABLE `tbl_yagan_productype` (
  `Productid` varchar(20) NOT NULL,
  `Productname` varchar(30) NOT NULL,
  `Productprice` float NOT NULL,
  `SNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_yagan_productype`
--

INSERT INTO `tbl_yagan_productype` (`Productid`, `Productname`, `Productprice`, `SNo`) VALUES
('MILK1', 'MILK', 36, 1),
('MILK2', 'Yourgut', 120, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_profitloss`
--

CREATE TABLE `tbl_yagan_profitloss` (
  `SNo` int(30) NOT NULL,
  `month` varchar(20) NOT NULL,
  `totalprod` float NOT NULL DEFAULT 0,
  `totalservice` float NOT NULL DEFAULT 0,
  `labourcost` float NOT NULL DEFAULT 0,
  `totalfeed` float NOT NULL DEFAULT 0,
  `animalid` varchar(20) NOT NULL DEFAULT 'Null',
  `animalname` varchar(50) NOT NULL DEFAULT 'Null',
  `Subtotal` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_salespayments`
--

CREATE TABLE `tbl_yagan_salespayments` (
  `SNo` int(30) NOT NULL,
  `productsaleID` varchar(60) NOT NULL,
  `Amountpaid` float NOT NULL,
  `datepaid` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_serviceprovider`
--

CREATE TABLE `tbl_yagan_serviceprovider` (
  `providerID` varchar(20) NOT NULL,
  `servicetype` varchar(20) NOT NULL,
  `Providername` varchar(30) NOT NULL,
  `Telephone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dateadded` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_services`
--

CREATE TABLE `tbl_yagan_services` (
  `SNo` int(30) NOT NULL,
  `calfid` varchar(20) NOT NULL,
  `servicetype` varchar(30) NOT NULL,
  `animal` varchar(30) NOT NULL,
  `servicedate` date NOT NULL,
  `serviceprovider` varchar(30) NOT NULL,
  `servicedescription` varchar(100) NOT NULL,
  `serviceprice` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_servicestypes`
--

CREATE TABLE `tbl_yagan_servicestypes` (
  `SNo` int(20) NOT NULL,
  `servicetype` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_treatment`
--

CREATE TABLE `tbl_yagan_treatment` (
  `treatmentid` varchar(20) NOT NULL,
  `treatmenttype` varchar(30) NOT NULL,
  `animal` varchar(30) NOT NULL,
  `treatmentdate` date NOT NULL,
  `serviceprovider` varchar(30) NOT NULL,
  `diseasestype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_user`
--

CREATE TABLE `tbl_yagan_user` (
  `id` int(20) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `othernames` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `orgtel` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `userlevel` int(5) NOT NULL,
  `organization` varchar(50) NOT NULL,
  `verified` int(11) NOT NULL,
  `verification_code` varchar(264) NOT NULL,
  `created` date NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `regdate` date NOT NULL,
  `trial` varchar(10) NOT NULL DEFAULT 'yes',
  `endtrialdate` date NOT NULL,
  `passwordchange` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_yagan_user`
--

INSERT INTO `tbl_yagan_user` (`id`, `surname`, `othernames`, `username`, `password`, `orgtel`, `email`, `userlevel`, `organization`, `verified`, `verification_code`, `created`, `modified`, `regdate`, `trial`, `endtrialdate`, `passwordchange`) VALUES
(1, '', '', 'chris', '7efc94f1f26bdafde81e2fcd91c62b53', '0722977672', 'chepken@gmail.com', 9, '0722977672', 0, '', '0000-00-00', '2018-11-11 15:35:36', '0000-00-00', 'yes', '2019-01-31', 1),
(2, '', '', 'chris1', '5ef41f69e8bd52382ecff421389c0f62', '0733977672', 'chepken@uonbi.ac.ke', 8, '0722977671', 0, '', '0000-00-00', '2018-11-11 11:19:13', '0000-00-00', 'yes', '0000-00-00', 0),
(3, '', '', 'chris2', '1e132c918c2ed634a32650d0a2a35fb0', '0733977671', 'chep1@yahoo.com', 5, '0733977672', 0, '', '0000-00-00', '2018-11-10 16:10:35', '0000-00-00', 'yes', '0000-00-00', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_yagan_animal`
--
ALTER TABLE `tbl_yagan_animal`
  ADD PRIMARY KEY (`Animal_ID`);

--
-- Indexes for table `tbl_yagan_animalbreed`
--
ALTER TABLE `tbl_yagan_animalbreed`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `tbl_yagan_animalbreedingservice`
--
ALTER TABLE `tbl_yagan_animalbreedingservice`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `tbl_yagan_animalcalvingrecord`
--
ALTER TABLE `tbl_yagan_animalcalvingrecord`
  ADD PRIMARY KEY (`CalvngID`);

--
-- Indexes for table `tbl_yagan_animalfamily`
--
ALTER TABLE `tbl_yagan_animalfamily`
  ADD PRIMARY KEY (`familyid`),
  ADD UNIQUE KEY `animalID` (`animalID`);

--
-- Indexes for table `tbl_yagan_buyer`
--
ALTER TABLE `tbl_yagan_buyer`
  ADD PRIMARY KEY (`Buyerid`);

--
-- Indexes for table `tbl_yagan_buyertype`
--
ALTER TABLE `tbl_yagan_buyertype`
  ADD PRIMARY KEY (`SNo`),
  ADD UNIQUE KEY `buyercode` (`buyercode`);

--
-- Indexes for table `tbl_yagan_configitems`
--
ALTER TABLE `tbl_yagan_configitems`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `typtecode` (`typecode`);

--
-- Indexes for table `tbl_yagan_consumablesstock`
--
ALTER TABLE `tbl_yagan_consumablesstock`
  ADD PRIMARY KEY (`stockid`);

--
-- Indexes for table `tbl_yagan_consumablestypes`
--
ALTER TABLE `tbl_yagan_consumablestypes`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `tbl_yagan_culfmanagementtypes`
--
ALTER TABLE `tbl_yagan_culfmanagementtypes`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `tbl_yagan_culling`
--
ALTER TABLE `tbl_yagan_culling`
  ADD PRIMARY KEY (`cull_id`);

--
-- Indexes for table `tbl_yagan_documentmngt`
--
ALTER TABLE `tbl_yagan_documentmngt`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `tbl_yagan_equipmentservice`
--
ALTER TABLE `tbl_yagan_equipmentservice`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `tbl_yagan_farmworkers`
--
ALTER TABLE `tbl_yagan_farmworkers`
  ADD PRIMARY KEY (`workerID`),
  ADD UNIQUE KEY `IDCard` (`IDCard`);

--
-- Indexes for table `tbl_yagan_farmworkerstypes`
--
ALTER TABLE `tbl_yagan_farmworkerstypes`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `tbl_yagan_feeding`
--
ALTER TABLE `tbl_yagan_feeding`
  ADD PRIMARY KEY (`feedingid`);

--
-- Indexes for table `tbl_yagan_feedtype`
--
ALTER TABLE `tbl_yagan_feedtype`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `tbl_yagan_itemtypes`
--
ALTER TABLE `tbl_yagan_itemtypes`
  ADD PRIMARY KEY (`itemcode`),
  ADD UNIQUE KEY `itemtype` (`itemtype`);

--
-- Indexes for table `tbl_yagan_newdairyregistration`
--
ALTER TABLE `tbl_yagan_newdairyregistration`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `tbl_yagan_production`
--
ALTER TABLE `tbl_yagan_production`
  ADD PRIMARY KEY (`productionid`);

--
-- Indexes for table `tbl_yagan_productsale`
--
ALTER TABLE `tbl_yagan_productsale`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `tbl_yagan_productuse`
--
ALTER TABLE `tbl_yagan_productuse`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `tbl_yagan_productype`
--
ALTER TABLE `tbl_yagan_productype`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `tbl_yagan_profitloss`
--
ALTER TABLE `tbl_yagan_profitloss`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `tbl_yagan_salespayments`
--
ALTER TABLE `tbl_yagan_salespayments`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `tbl_yagan_serviceprovider`
--
ALTER TABLE `tbl_yagan_serviceprovider`
  ADD PRIMARY KEY (`providerID`);

--
-- Indexes for table `tbl_yagan_services`
--
ALTER TABLE `tbl_yagan_services`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `tbl_yagan_servicestypes`
--
ALTER TABLE `tbl_yagan_servicestypes`
  ADD PRIMARY KEY (`SNo`);

--
-- Indexes for table `tbl_yagan_treatment`
--
ALTER TABLE `tbl_yagan_treatment`
  ADD PRIMARY KEY (`treatmentid`);

--
-- Indexes for table `tbl_yagan_user`
--
ALTER TABLE `tbl_yagan_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_yagan_animalbreed`
--
ALTER TABLE `tbl_yagan_animalbreed`
  MODIFY `SNo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_yagan_animalbreedingservice`
--
ALTER TABLE `tbl_yagan_animalbreedingservice`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_yagan_animalcalvingrecord`
--
ALTER TABLE `tbl_yagan_animalcalvingrecord`
  MODIFY `CalvngID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_yagan_animalfamily`
--
ALTER TABLE `tbl_yagan_animalfamily`
  MODIFY `familyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_yagan_buyertype`
--
ALTER TABLE `tbl_yagan_buyertype`
  MODIFY `SNo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_yagan_configitems`
--
ALTER TABLE `tbl_yagan_configitems`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_yagan_consumablesstock`
--
ALTER TABLE `tbl_yagan_consumablesstock`
  MODIFY `stockid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_yagan_consumablestypes`
--
ALTER TABLE `tbl_yagan_consumablestypes`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_yagan_culfmanagementtypes`
--
ALTER TABLE `tbl_yagan_culfmanagementtypes`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_yagan_culling`
--
ALTER TABLE `tbl_yagan_culling`
  MODIFY `cull_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_yagan_documentmngt`
--
ALTER TABLE `tbl_yagan_documentmngt`
  MODIFY `SNo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_yagan_equipmentservice`
--
ALTER TABLE `tbl_yagan_equipmentservice`
  MODIFY `SNo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_yagan_farmworkerstypes`
--
ALTER TABLE `tbl_yagan_farmworkerstypes`
  MODIFY `SNo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_yagan_feedtype`
--
ALTER TABLE `tbl_yagan_feedtype`
  MODIFY `SNo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_yagan_newdairyregistration`
--
ALTER TABLE `tbl_yagan_newdairyregistration`
  MODIFY `SNo` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_yagan_productsale`
--
ALTER TABLE `tbl_yagan_productsale`
  MODIFY `SNo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_yagan_productuse`
--
ALTER TABLE `tbl_yagan_productuse`
  MODIFY `SNo` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_yagan_productype`
--
ALTER TABLE `tbl_yagan_productype`
  MODIFY `SNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_yagan_profitloss`
--
ALTER TABLE `tbl_yagan_profitloss`
  MODIFY `SNo` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_yagan_salespayments`
--
ALTER TABLE `tbl_yagan_salespayments`
  MODIFY `SNo` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_yagan_services`
--
ALTER TABLE `tbl_yagan_services`
  MODIFY `SNo` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_yagan_servicestypes`
--
ALTER TABLE `tbl_yagan_servicestypes`
  MODIFY `SNo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_yagan_user`
--
ALTER TABLE `tbl_yagan_user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;
