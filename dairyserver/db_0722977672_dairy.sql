-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 13, 2018 at 09:53 AM
-- Server version: 5.7.12-log
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_0722977672_dairy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_animal`
--

DROP TABLE IF EXISTS `tbl_yagan_animal`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_animal` (
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
  `culled` tinytext NOT NULL,
  PRIMARY KEY (`Animal_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_yagan_animal`
--

INSERT INTO `tbl_yagan_animal` (`Animal_ID`, `calfid`, `Animal_Name`, `DoB`, `Breed_type`, `Breed_product`, `Potential_yield`, `Bodyweight`, `Color`, `dateadmitted`, `animalgender`, `animalsource`, `value`, `culled`) VALUES
('1', '1', '2', '2016-10-11', 'BREED004', 'Milk', 5, 34, 'dfdfg', '2018-10-06', 'Heifer', 'Calving', 4334, 'yes'),
('AN002', '', 'Tuikong', '2017-09-05', 'BREDD001', 'Milk', 40, 300, 'White', '2018-09-19', 'Heifer', 'Purchase', 50000, 'no'),
('AN003', '', 'Lelkina', '2016-09-13', 'BREED003', 'Milk', 34, 300, 'Red', '2018-09-19', '', '', 50000, 'no'),
('AN004', '', 'Lelit', '2016-09-05', 'BREED002', 'Milk', 23, 3400, 'White', '2018-09-19', '', 'Purchase', 300000, 'no'),
('AN005', '', 'Kampala', '2018-09-11', 'BREED004', 'Milk', 40, 250, 'Mix white black', '2018-09-19', 'Heifer', 'Purchase', 300000, 'no'),
('AN78', '', 'Cheptilit', '2018-10-02', 'BREDD001', 'Milk', 12, 500, 'WHite', '2018-10-06', 'Heifer', 'Purchase', 3400, 'no'),
('CA089', 'CA089', 'Jeel', '2018-10-02', 'BREED003', 'Milk', 34, 344, 'White Grey', '2018-10-06', 'Heifer', 'Calving', 456, 'yes'),
('CAL5001', 'CAL5001', 'Teta', '2017-10-10', '', 'Milk', 55, 344, 'White', '2018-10-06', 'Heifer', 'Calving', 3400, 'no'),
('H0090', '', 'Lelmet2', '2018-05-16', 'BREED004', 'Milk', 40, 2000, 'White and black', '2018-10-02', 'Heifer', 'Purchase', 40000, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_animalbreed`
--

DROP TABLE IF EXISTS `tbl_yagan_animalbreed`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_animalbreed` (
  `SNo` int(20) NOT NULL AUTO_INCREMENT,
  `Breedtype` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`SNo`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `tbl_yagan_animalbreedingservice`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_animalbreedingservice` (
  `SNo` int(11) NOT NULL AUTO_INCREMENT,
  `breedingserviceid` varchar(30) NOT NULL,
  `AnimalID` varchar(30) NOT NULL,
  `sirebreed` varchar(30) NOT NULL,
  `Servicedate` date NOT NULL,
  `servicetype` varchar(30) NOT NULL,
  `Estimatecalfdate` date NOT NULL,
  `calvingease` varchar(30) NOT NULL,
  `serviceprovider` varchar(30) NOT NULL,
  `comments` varchar(30) NOT NULL,
  PRIMARY KEY (`SNo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_yagan_animalbreedingservice`
--

INSERT INTO `tbl_yagan_animalbreedingservice` (`SNo`, `breedingserviceid`, `AnimalID`, `sirebreed`, `Servicedate`, `servicetype`, `Estimatecalfdate`, `calvingease`, `serviceprovider`, `comments`) VALUES
(1, '', 'AN004', '', '2018-09-12', 'AI', '2019-06-12', 'Easy', 'AN004', 'good'),
(2, '', 'AN002', '', '2018-09-04', 'AI', '2019-06-04', 'Moderate', 'AN002', 'great'),
(3, '', 'AN002', '', '2018-09-19', 'Bull', '2019-06-19', 'Easy', 'AN002', ''),
(4, '', 'H0090', '', '2018-10-03', 'AI', '2019-07-03', 'Moderate', 'H0090', 'Good'),
(5, '', 'H0090', '', '2018-10-03', 'Bull', '2019-07-03', 'Easy', 'H0090', 'good'),
(6, '', 'AN004', '', '2018-10-02', 'AI', '2019-07-02', 'Moderate', 'AN004', ''),
(7, 'AN003_2018-10-08', 'AN003', '', '2018-10-08', 'AI', '2019-07-08', 'Easy', 'AN003', ''),
(8, 'AN004_2018-10-03', 'AN004', '', '2018-10-03', 'AI', '2019-07-03', 'Moderate', 'AN004', ''),
(9, 'AN003_2018-10-02', 'AN003', 'g', '2018-10-02', 'Bull', '2019-07-02', 'Easy', 'AN003', ''),
(10, 'AN005_2018-10-02', 'AN005', 'BREDD001', '2018-10-02', 'Bull', '2019-07-02', 'Easy', 'AN005', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_animalcalvingrecord`
--

DROP TABLE IF EXISTS `tbl_yagan_animalcalvingrecord`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_animalcalvingrecord` (
  `CalvngID` int(11) NOT NULL AUTO_INCREMENT,
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
  `winned` varchar(10) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`CalvngID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_yagan_animalcalvingrecord`
--

INSERT INTO `tbl_yagan_animalcalvingrecord` (`CalvngID`, `AnimalID`, `calfbreedtype`, `calvingdate`, `sex`, `aliveordead`, `calfID`, `calfName`, `hybridlevel`, `calfbodycolor`, `calfcowsire`, `calfmaternalgranddam`, `calfpaternalgranddam`, `calfmaternalgrandsire`, `calfpaternalgrandsire`, `winned`) VALUES
(1, 'AN004', '', '2018-09-20', 'Female', 'Alive', 'AN004_C001', 'Angel', 'Level one', '', 'AN004_C001', 'Good', '', '', '', 'no'),
(2, 'AN003', '', '2018-09-24', 'Female', 'alive', 'AN003_CAL001', 'Sere', '', '', 'AN003_CAL001', 'good', '', '', '', 'no'),
(3, 'H0090', '', '2018-10-03', 'Female', 'Alive', 'T9938', 'Temere', '', '', 'T00983', 'good', '', '', '', 'no'),
(4, 'AN002', '', '2017-10-10', 'Female', 'Alive', 'CAL5001', 'Teta', '', '', 'Bull1', 'Cow1', 'Cow2', 'Cow4', 'weee', 'yes'),
(5, 'AN005', 'BREED004', '2016-10-11', 'Male', 'Alive', '1', '2', 'Level 3', 'Black', '3', '4', '5', '6', '7', 'no'),
(6, 'AN003', 'BREED003', '2018-10-02', 'Male', 'Alive', 'CA089', 'Jeel', 'Level 4', 'White Grey', 'Ndume', 'Ndume2', 'Ndume3', 'Coq3', 'Cow4', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_animalfamily`
--

DROP TABLE IF EXISTS `tbl_yagan_animalfamily`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_animalfamily` (
  `familyid` int(11) NOT NULL AUTO_INCREMENT,
  `animalID` varchar(20) NOT NULL,
  `hybridlevel` varchar(40) NOT NULL,
  `cowdam` varchar(50) NOT NULL,
  `cowsire` varchar(50) NOT NULL,
  `maternalgranddam` varchar(50) NOT NULL,
  `paternalgranddam` varchar(50) NOT NULL,
  `maternalgrandsire` varchar(50) NOT NULL,
  `paternalgrandsire` varchar(50) NOT NULL,
  PRIMARY KEY (`familyid`),
  UNIQUE KEY `animalID` (`animalID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_yagan_animalfamily`
--

INSERT INTO `tbl_yagan_animalfamily` (`familyid`, `animalID`, `hybridlevel`, `cowdam`, `cowsire`, `maternalgranddam`, `paternalgranddam`, `maternalgrandsire`, `paternalgrandsire`) VALUES
(2, 'AN002', 'Level Four', 'Chemisto', 'Kirgit', 'teta', 'school', 'high', 'low'),
(4, 'AN005', 'Level One', '', '', '', '', '', ''),
(5, 'H0090', 'Level Three', 'Mother1', 'Father1', 'Granmum1', 'Grandfather1', 'Grandmum2', 'Grandfather2'),
(6, 'AN78', 'Level One', 'Co1', 'c3', 'c4', 'c6', 'c6', 'c4'),
(7, 'CA089', 'Level 4', 'AN003', 'Ndume', 'Ndume2', 'Ndume3', 'Coq3', 'Cow4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_buyer`
--

DROP TABLE IF EXISTS `tbl_yagan_buyer`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_buyer` (
  `Buyerid` varchar(20) NOT NULL,
  `buyername` varchar(30) NOT NULL,
  `Buyertype` varchar(30) NOT NULL,
  `dateadded` date NOT NULL,
  `buyerproducttype` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`Buyerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_yagan_buyer`
--

INSERT INTO `tbl_yagan_buyer` (`Buyerid`, `buyername`, `Buyertype`, `dateadded`, `buyerproducttype`, `status`) VALUES
('BUY004', 'John Kimani', 'BUY001', '2018-09-14', '', 'active'),
('BUYER 007', 'Luenzo', 'BUYER002', '2018-10-03', '', 'active'),
('BUYer 34', 'Daniel ', 'BUYER001', '2018-10-03', 'Meat', 'active'),
('Buyer002', 'Daniel koki', 'Buyer1', '2018-09-10', '', 'active'),
('Buyerr001', 'John mwangi', 'Buyer3', '2018-09-10', '', 'active'),
('RE001', 'Dan Maingi', 'BUYER002', '2018-09-04', '', 'active'),
('SO001', 'METKEI', 'BUYER3', '2018-09-11', '', 'active'),
('WS001', 'Jame Mutuku', 'BUYER001', '2018-09-12', '', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_buyertype`
--

DROP TABLE IF EXISTS `tbl_yagan_buyertype`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_buyertype` (
  `SNo` int(20) NOT NULL AUTO_INCREMENT,
  `buyercode` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  PRIMARY KEY (`SNo`),
  UNIQUE KEY `buyercode` (`buyercode`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_yagan_buyertype`
--

INSERT INTO `tbl_yagan_buyertype` (`SNo`, `buyercode`, `description`) VALUES
(1, 'BUYER001', 'Wholesaler'),
(2, 'BUYER002', 'Retail'),
(3, 'BUYER3', 'Society');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_configitems`
--

DROP TABLE IF EXISTS `tbl_yagan_configitems`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_configitems` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `typecode` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `type` varchar(30) NOT NULL,
  `configdate` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `typtecode` (`typecode`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `tbl_yagan_consumablesstock`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_consumablesstock` (
  `stockid` int(20) NOT NULL AUTO_INCREMENT,
  `ConsumableID` varchar(30) NOT NULL,
  `Consumabletype` varchar(30) NOT NULL,
  `stockqnty` int(20) NOT NULL,
  `currentstock` int(20) NOT NULL,
  `stockdate` date NOT NULL,
  `providerid` varchar(20) NOT NULL,
  `itembrandname` varchar(40) NOT NULL,
  `itemprice` float NOT NULL,
  `itemname` varchar(40) NOT NULL,
  `reorderlevel` int(20) NOT NULL,
  PRIMARY KEY (`stockid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_yagan_consumablesstock`
--

INSERT INTO `tbl_yagan_consumablesstock` (`stockid`, `ConsumableID`, `Consumabletype`, `stockqnty`, `currentstock`, `stockdate`, `providerid`, `itembrandname`, `itemprice`, `itemname`, `reorderlevel`) VALUES
(8, 'Con 02929', 'spray chemicals', 56, 56, '2018-10-02', 'DEW001', '', 300, '', 10),
(4, 'FEED001', 'Feed', 5, -63, '2018-09-17', 'PR001', '', 50, '', 10),
(5, 'FED002', 'Feed', 45, -67, '2018-09-19', 'PR004', '', 456, '', 10),
(6, 'FEED003', 'Feed', 23, -140, '2018-09-19', 'PRO001', '', 890, '', 10),
(9, 'FEED002', 'Feed', 3, -100, '2018-10-02', 'dsfdsf', 'afds', 34, 'dsfds', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_consumablestypes`
--

DROP TABLE IF EXISTS `tbl_yagan_consumablestypes`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_consumablestypes` (
  `SNo` int(11) NOT NULL AUTO_INCREMENT,
  `Consumabletype` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`SNo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `tbl_yagan_culfmanagement`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_culfmanagement` (
  `CalfID` varchar(20) NOT NULL,
  `mngcode` varchar(30) NOT NULL,
  `activitydate` date NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_culfmanagementtypes`
--

DROP TABLE IF EXISTS `tbl_yagan_culfmanagementtypes`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_culfmanagementtypes` (
  `SNo` int(11) NOT NULL AUTO_INCREMENT,
  `mngttype` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`SNo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_yagan_culfmanagementtypes`
--

INSERT INTO `tbl_yagan_culfmanagementtypes` (`SNo`, `mngttype`, `description`) VALUES
(1, 'CMNGT001', 'Weighing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_culling`
--

DROP TABLE IF EXISTS `tbl_yagan_culling`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_culling` (
  `Animal_ID` varchar(20) NOT NULL,
  `cullreason` varchar(100) NOT NULL,
  `cullanimalvalue` double NOT NULL,
  `culldate` date NOT NULL,
  `cull_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cull_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_yagan_culling`
--

INSERT INTO `tbl_yagan_culling` (`Animal_ID`, `cullreason`, `cullanimalvalue`, `culldate`, `cull_id`) VALUES
('FR001', 'Sold, old age', 345, '2018-09-10', 1),
('H004', 'Gift', 45000, '2018-09-06', 2),
('J003', 'Sold, old age', 39000, '2018-09-14', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_documentmngt`
--

DROP TABLE IF EXISTS `tbl_yagan_documentmngt`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_documentmngt` (
  `SNo` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `file_type` varchar(40) NOT NULL,
  `upload_date` date NOT NULL,
  `file_name` varchar(40) NOT NULL,
  `file_desc` varchar(40) NOT NULL,
  PRIMARY KEY (`SNo`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_yagan_documentmngt`
--

INSERT INTO `tbl_yagan_documentmngt` (`SNo`, `name`, `email`, `filename`, `file_type`, `upload_date`, `file_name`, `file_desc`) VALUES
(19, 'Jonh', 'Kalinga@gjeje.com', 'uploads/997927cross2.png', '', '0000-00-00', '', ''),
(20, 'Jonh', 'Kalinga@gjeje.com', 'uploads/295871cross2.png', '', '0000-00-00', '', ''),
(23, 'sfsdfdsgfdgdfh', 'cjehe@jdkd.com', 'uploads/605772cows.png', 'Receipt', '2018-10-10', 'Chris', 'James'),
(24, 'fgfdg', 'check@asdfj.com', 'uploads/131820icon.png', '', '2018-10-10', 'fsdg', 'fgfdgfd'),
(25, 'afdaf', 'chepken@uonbi.ac.ke', 'uploads/479037thumbnail.png', 'Receipt', '2018-10-11', 'Chris', 'che'),
(26, 'fghgf', 'chepken@uonbi.ac.ke', 'uploads/535408icon.png', 'Receipt', '2018-10-11', 'dfgdf', 'hfgh'),
(27, 'sfsdfdsgfdgdfh', 'cjehe@jdkd.com', 'uploads/922899cows.png', 'Treatment Report', '2018-10-09', 'Dan', 'dfsdf'),
(28, 'fredf', 'chepken@uonbi.ac.ke', 'uploads/334986cows.png', 'General', '2018-10-23', 'frert', 'fgggg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_equipmentacquisition`
--

DROP TABLE IF EXISTS `tbl_yagan_equipmentacquisition`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_equipmentacquisition` (
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

--
-- Dumping data for table `tbl_yagan_equipmentacquisition`
--

INSERT INTO `tbl_yagan_equipmentacquisition` (`equipment_id`, `equipment_name`, `equipment_type`, `equipment_cost`, `equipment_date`, `acquisition_type`, `equipment_condition`, `equipment_life`, `equipment_operator`, `equipment_use`) VALUES
('EG344', 'Tractor', 'Automobile', 30409, '2018-10-02', 'Leased', 'Good', '23', 'John', 'Harrow'),
('GH522', 'Car2', 'Automobile', 25363, '2018-10-08', 'Bought', 'Bad', '12', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_equipmentservice`
--

DROP TABLE IF EXISTS `tbl_yagan_equipmentservice`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_equipmentservice` (
  `SNo` int(20) NOT NULL AUTO_INCREMENT,
  `EquipmentID` varchar(30) NOT NULL,
  `Servicedate` date NOT NULL,
  `serviceprovider` varchar(30) NOT NULL,
  `servicecost` float NOT NULL,
  `servicetype` varchar(40) NOT NULL,
  `servicedescription` varchar(100) NOT NULL,
  `servicereasons` varchar(100) NOT NULL,
  PRIMARY KEY (`SNo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_yagan_equipmentservice`
--

INSERT INTO `tbl_yagan_equipmentservice` (`SNo`, `EquipmentID`, `Servicedate`, `serviceprovider`, `servicecost`, `servicetype`, `servicedescription`, `servicereasons`) VALUES
(1, 'EG344', '2018-10-10', 'PR001', 34, 'Routine', 'Good', 'Ok'),
(2, 'EG344', '2018-10-23', 'DEW001', 345, 'Routine', 'fgghghh', 'fgghghhg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_farmworkers`
--

DROP TABLE IF EXISTS `tbl_yagan_farmworkers`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_farmworkers` (
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
  `removed` varchar(10) NOT NULL,
  PRIMARY KEY (`workerID`),
  UNIQUE KEY `IDCard` (`IDCard`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_yagan_farmworkers`
--

INSERT INTO `tbl_yagan_farmworkers` (`workerID`, `Surname`, `FirstName`, `OtherNames`, `IDCard`, `personempdate`, `DoB`, `Gender`, `JobGrade`, `Worktype`, `empdate`, `salary`, `removed`) VALUES
('244', 'derick', 'tom', 'james', '4566', '2018-10-02', '2018-10-02', 'Male', 'Manager 2', 'FW002', '2018-10-06', 7500, 'no'),
('37384', 'John', 'Tom', 'other', '2345325', '2018-11-06', '2018-11-06', 'Male', 'Manager 2', 'FW002', '2018-11-06', 561, 'no'),
('FW100', 'James', 'Kiboi', 'John', '21823842', '0000-00-00', '2018-09-11', 'Male', 'Manager 1', 'FW001', '2018-09-06', 6500, 'no'),
('John1', 'Teric', 'John', 'Mike', '3848484', '0000-00-00', '2018-09-13', 'Male', 'Milk man', 'FW002', '2018-09-14', 3000, 'no'),
('MIL008', 'Kering', 'David', 'TOM', '3248254', '0000-00-00', '2018-09-19', '', 'Manager 2', 'WK003', '2018-09-19', 5400, 'no'),
('ML7899', 'Hariate', 'Paul', '', '29330404', '0000-00-00', '2018-09-10', 'Female', 'Manager 2', 'FW002', '2018-09-06', 12000, 'no'),
('WO0023', 'James', 'Tom', 'Derick', '273838', '0000-00-00', '2018-09-11', 'Male', 'Milk man', 'FW002', '2018-09-19', 4000, 'no'),
('WO9383', 'John', 'dsfdsf', 'dfssdf', 'sdgfs', '0000-00-00', '2018-10-03', 'Male', 'Manager 2', 'FW002', '2018-10-02', 8000, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_farmworkerstypes`
--

DROP TABLE IF EXISTS `tbl_yagan_farmworkerstypes`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_farmworkerstypes` (
  `SNo` int(20) NOT NULL AUTO_INCREMENT,
  `workertype` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`SNo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `tbl_yagan_feeding`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_feeding` (
  `feedingid` varchar(30) NOT NULL,
  `feedtype` varchar(30) NOT NULL,
  `animal` varchar(30) NOT NULL,
  `feeddate` date NOT NULL,
  `feedqnty` int(20) NOT NULL,
  `feedingtime` varchar(30) NOT NULL,
  `feedingcomments` varchar(30) NOT NULL,
  `consumedcost` double NOT NULL,
  PRIMARY KEY (`feedingid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_yagan_feeding`
--

INSERT INTO `tbl_yagan_feeding` (`feedingid`, `feedtype`, `animal`, `feeddate`, `feedqnty`, `feedingtime`, `feedingcomments`, `consumedcost`) VALUES
('J0051536925037198', 'CON002', 'J005', '2018-09-19', 45, 'Afternoon', 'sfsd', 5000),
('J0051537212780092', 'FEED001', 'J005', '2018-09-17', 34, 'Afternoon', 'good', 300),
('FR0061537212813124', 'FED002', 'FR006', '2018-09-17', 22, 'Evening', 'great', 400),
('FR0061537212846084', 'FED002', 'FR006', '2018-09-17', 56, 'Morning', 'ggf', 0),
('J0051537215934665', 'FED002', 'J005', '2018-09-14', 34, 'Morning', '33', 450),
('FR0061537215959352', 'FEED001', 'FR006', '2018-09-14', 34, 'Morning', 'fgd', 0),
('AN0031537380526778', 'FEED002', 'AN003', '2018-09-19', 23, 'Morning', 'food', 6777),
('AN0041537380547482', 'FEED003', 'AN004', '2018-09-19', 45, 'Afternoon', '', 688),
('AN0021537385917075', 'FEED002', 'AN002', '2018-09-18', 12, 'Morning', 'dsgfdg', 0),
('AN0021537385934931', 'FEED002', 'AN002', '2018-09-17', 3, 'Afternoon', 'asds', 450),
('AN0021537385960219', 'FEED003', 'AN002', '2018-09-17', 34, 'Morning', 'dfdsf', 0),
('AN0021537446194384', 'FEED002', 'AN002', '2018-09-11', 23, 'Morning', 'good', 1000),
('AN0021537446226409', 'FEED003', 'AN002', '2018-09-14', 1, 'Morning', 'df', 0),
('AN0021537446257225', 'FEED002', 'AN002', '2018-09-13', 18, 'Afternoon', 'sdffg', 400),
('H00901538495171635', 'FEED003', 'H0090', '2018-10-03', 23, 'Morning', 'sdfsd', 100),
('AN0021541506504464', 'FEED002', 'AN002', '2018-11-06', 10, 'Morning', 'erg', 340);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_feedtype`
--

DROP TABLE IF EXISTS `tbl_yagan_feedtype`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_feedtype` (
  `SNo` int(20) NOT NULL AUTO_INCREMENT,
  `feedtype` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`SNo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `tbl_yagan_itemtypes`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_itemtypes` (
  `itemcode` varchar(20) NOT NULL,
  `itemtype` varchar(50) NOT NULL,
  PRIMARY KEY (`itemcode`),
  UNIQUE KEY `itemtype` (`itemtype`)
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

DROP TABLE IF EXISTS `tbl_yagan_newdairyregistration`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_newdairyregistration` (
  `SNo` int(30) NOT NULL AUTO_INCREMENT,
  `dairyphone` varchar(20) NOT NULL,
  `dairyemail` varchar(40) NOT NULL,
  `verified` int(11) NOT NULL,
  `verification_code` varchar(264) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dairysurname` varchar(30) NOT NULL,
  `dairyothernames` varchar(30) NOT NULL,
  `dairyusername` varchar(20) NOT NULL,
  `dairybrandname` varchar(50) NOT NULL,
  `regdate` date NOT NULL,
  `trial` varchar(10) DEFAULT 'yes',
  `endtrialdate` date NOT NULL,
  PRIMARY KEY (`SNo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_yagan_newdairyregistration`
--

INSERT INTO `tbl_yagan_newdairyregistration` (`SNo`, `dairyphone`, `dairyemail`, `verified`, `verification_code`, `modified`, `dairysurname`, `dairyothernames`, `dairyusername`, `dairybrandname`, `regdate`, `trial`, `endtrialdate`) VALUES
(2, '0722977672', 'Weke', 0, '', '2018-11-10 08:22:08', 'weke', 'weke', 'weke', 'weke', '2018-11-06', 'yes', '2018-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_production`
--

DROP TABLE IF EXISTS `tbl_yagan_production`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_production` (
  `productionid` varchar(40) NOT NULL,
  `productiondate` date NOT NULL,
  `animalID` varchar(30) NOT NULL,
  `producttype` varchar(30) NOT NULL,
  `productqnty` int(10) NOT NULL,
  `totalprice` double NOT NULL,
  `comments` text NOT NULL,
  `productiontime` varchar(30) NOT NULL,
  PRIMARY KEY (`productionid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_yagan_production`
--

INSERT INTO `tbl_yagan_production` (`productionid`, `productiondate`, `animalID`, `producttype`, `productqnty`, `totalprice`, `comments`, `productiontime`) VALUES
('AN0021537379493819', '2018-09-19', 'AN002', 'Milk1', 89, 500, 'Very well', 'Evening'),
('AN0021537446281505', '2018-09-13', 'AN002', 'Milk1', 34, 390, 'good', 'Morning'),
('AN0021537446301608', '2018-09-12', 'AN002', 'Milk1', 12, 450, '', 'Morning'),
('AN0021537446331440', '2018-09-14', 'AN002', 'Milk1', 17, 400, '', 'Afternoon'),
('AN0021537446362202', '2018-09-14', 'AN002', 'Milk1', 2, 300, '', 'Evening'),
('AN0031537379380083', '2018-09-19', 'AN003', 'Milk1', 34, 300, 'Good', 'Morning'),
('AN0031537379510122', '2018-09-19', 'AN003', 'Milk1', 20, 210, 'Good', 'Evening'),
('AN0041537379475211', '2018-09-18', 'AN004', 'Milk1', 23, 100, 'Lower', 'Morning'),
('H00901538493858435', '2018-10-01', 'H0090', 'Milk1', 20, 20, 'good', 'Morning');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_productsale`
--

DROP TABLE IF EXISTS `tbl_yagan_productsale`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_productsale` (
  `SNo` int(20) NOT NULL AUTO_INCREMENT,
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
  `paid` varchar(10) NOT NULL,
  PRIMARY KEY (`SNo`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_yagan_productsale`
--

INSERT INTO `tbl_yagan_productsale` (`SNo`, `productsaleID`, `BuyerID`, `Producttype`, `saledate`, `saleamount`, `saleprice`, `salesperson`, `modeofpay`, `termsofpay`, `totalamount`, `paid`) VALUES
(1, 'Buyer002Milk2018-10-04', 'BUY004', 'Milk', '2018-09-14', 3, '34', 'John', '', '', '102', 'no'),
(2, 'Buyer002Milk2018-10-05', 'SO001', 'Milk', '2018-09-19', 30, '30', 'John', '', '', '900', 'no'),
(3, 'Buyer002Milk2018-10-01', 'Buyerr001', 'Milk', '2018-10-03', 45, '30', 'Dan', '', '', '1350', 'no'),
(4, 'Buyer002Milk2018-10-08', 'BUY004', 'Milk', '2018-10-03', 40, '45', 'john', 'Cash', 'Daily', '1800', 'yes'),
(5, 'Buyer002Milk2018-10-07', 'Buyer002', 'Milk', '2018-10-07', 20, '21', '23', 'Cash', 'Daily', '420', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_productuse`
--

DROP TABLE IF EXISTS `tbl_yagan_productuse`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_productuse` (
  `SNo` int(30) NOT NULL AUTO_INCREMENT,
  `useid` varchar(30) NOT NULL,
  `producttype` varchar(30) NOT NULL,
  `usetype` varchar(30) NOT NULL,
  `usedate` date NOT NULL,
  `amountused` int(30) NOT NULL,
  `whoused` varchar(30) NOT NULL,
  `productiontime` varchar(30) NOT NULL,
  PRIMARY KEY (`SNo`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_yagan_productuse`
--

INSERT INTO `tbl_yagan_productuse` (`SNo`, `useid`, `producttype`, `usetype`, `usedate`, `amountused`, `whoused`, `productiontime`) VALUES
(1, 'Milk1536924280622', 'Milk', 'Milk domestic use', '2018-09-14', 34, 'James', 'Afternoon'),
(2, 'Milk1537379687723', 'Milk', 'Milk domestic use', '2018-09-19', 23, 'John', 'Morning'),
(3, 'Milk1537379711729', 'Milk', 'Milk calves use', '2018-09-19', 2, 'Joel', 'Morning'),
(4, 'Milk1538493994046', 'Milk', 'Milk domestic use', '2018-10-02', 12, 'John', 'Morning');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_productype`
--

DROP TABLE IF EXISTS `tbl_yagan_productype`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_productype` (
  `Productid` varchar(20) NOT NULL,
  `Productname` varchar(30) NOT NULL,
  `Productprice` float NOT NULL,
  `SNo` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`SNo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `tbl_yagan_profitloss`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_profitloss` (
  `SNo` int(30) NOT NULL AUTO_INCREMENT,
  `month` varchar(20) NOT NULL,
  `totalprod` float NOT NULL DEFAULT '0',
  `totalservice` float NOT NULL DEFAULT '0',
  `labourcost` float NOT NULL DEFAULT '0',
  `totalfeed` float NOT NULL DEFAULT '0',
  `animalid` varchar(20) NOT NULL DEFAULT 'Null',
  `animalname` varchar(50) NOT NULL DEFAULT 'Null',
  `Subtotal` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`SNo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_yagan_profitloss`
--

INSERT INTO `tbl_yagan_profitloss` (`SNo`, `month`, `totalprod`, `totalservice`, `labourcost`, `totalfeed`, `animalid`, `animalname`, `Subtotal`) VALUES
(1, '09-2018', 2040, 0, 5217.89, 1850, 'AN002', 'Tuikong', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_salespayments`
--

DROP TABLE IF EXISTS `tbl_yagan_salespayments`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_salespayments` (
  `SNo` int(30) NOT NULL AUTO_INCREMENT,
  `productsaleID` varchar(60) NOT NULL,
  `Amountpaid` float NOT NULL,
  `datepaid` date NOT NULL,
  PRIMARY KEY (`SNo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_yagan_salespayments`
--

INSERT INTO `tbl_yagan_salespayments` (`SNo`, `productsaleID`, `Amountpaid`, `datepaid`) VALUES
(1, 'Buyer002Milk2018-10-08', 1800, '2018-10-23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_serviceprovider`
--

DROP TABLE IF EXISTS `tbl_yagan_serviceprovider`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_serviceprovider` (
  `providerID` varchar(20) NOT NULL,
  `servicetype` varchar(20) NOT NULL,
  `Providername` varchar(30) NOT NULL,
  `Telephone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dateadded` date NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`providerID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_yagan_serviceprovider`
--

INSERT INTO `tbl_yagan_serviceprovider` (`providerID`, `servicetype`, `Providername`, `Telephone`, `email`, `dateadded`, `status`) VALUES
('DEW001', 'SER001', 'John Koech', '072535363', 'joel@uoodd.ac.ke', '2018-09-14', 'active'),
('dsfdsf', 'SERVICE1', 'sdfsdf', 'dsfds', 'dsfsd', '2018-09-05', 'active'),
('PR001', 'SERVICE1', 'Ketkins sam', '0722348474', 'try@try.com', '2018-09-10', 'active'),
('PR004', 'SERVICE3', 'Dancan khaemba', '0732738383', 'chepek@sosos.com', '2018-09-17', 'active'),
('PRO001', 'SERVICE001', 'Thomas', '0738394', 'chepken@eiri890', '2018-09-19', 'active'),
('PROV009', 'SERVICE005', 'Daniel', '0773838', 'cheoeo', '2018-10-10', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_services`
--

DROP TABLE IF EXISTS `tbl_yagan_services`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_services` (
  `SNo` int(30) NOT NULL AUTO_INCREMENT,
  `calfid` varchar(20) NOT NULL,
  `servicetype` varchar(30) NOT NULL,
  `animal` varchar(30) NOT NULL,
  `servicedate` date NOT NULL,
  `serviceprovider` varchar(30) NOT NULL,
  `servicedescription` varchar(100) NOT NULL,
  `serviceprice` float NOT NULL,
  PRIMARY KEY (`SNo`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_yagan_services`
--

INSERT INTO `tbl_yagan_services` (`SNo`, `calfid`, `servicetype`, `animal`, `servicedate`, `serviceprovider`, `servicedescription`, `serviceprice`) VALUES
(1, '', 'SER003', 'FR006', '2018-09-14', 'DEW001', 'fggg', 455),
(2, '', 'SER003', 'FR006', '2018-09-11', 'DEW001', 'Vaccination for antrax', 200),
(3, '', 'SER001', 'FR006', '2018-09-14', 'PR004', 'Foot and mouth', 0),
(4, '', 'SER003', 'FR006', '2018-09-12', 'DEW001', 'ffg', 0),
(5, '', 'SERVICE004', 'AN002', '2018-09-20', 'PR004', 'deworm', 0),
(6, '', 'SERVICE001', 'H0090', '2018-10-03', 'DEW001', 'hdsahdas', 0),
(7, '', 'SERVICE005', 'AN002', '2018-10-04', 'DEW001', 'dsgdsgdfg', 456),
(8, 'Calf', 'SERVICE005', '', '2018-10-08', 'PR001', 'weigh567', 400),
(9, 'Cow', 'SERVICE005', 'AN002', '2018-10-15', 'PR004', 'weigh 578', 300),
(10, 'T9938', 'SERVICE001', '', '2018-10-16', 'PR001', 'tru', 324),
(11, '', 'SERVICE002', 'AN78', '2018-10-14', 'DEW001', 'spray', 123),
(12, 'CA089', 'SERVICE001', '', '2018-10-15', 'PR004', 'Three months', 500),
(13, 'AN004_C001', 'SERVICE002', '', '2018-10-09', 'PR001', 'Good', 200);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_servicestypes`
--

DROP TABLE IF EXISTS `tbl_yagan_servicestypes`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_servicestypes` (
  `SNo` int(20) NOT NULL AUTO_INCREMENT,
  `servicetype` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`SNo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_yagan_servicestypes`
--

INSERT INTO `tbl_yagan_servicestypes` (`SNo`, `servicetype`, `description`) VALUES
(1, 'SERVICE001', 'Vaccination'),
(2, 'SERVICE002', 'Spraying'),
(3, 'SERVICE004', 'Deworming'),
(4, 'SERVICE005', 'Veternary');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_treatment`
--

DROP TABLE IF EXISTS `tbl_yagan_treatment`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_treatment` (
  `treatmentid` varchar(20) NOT NULL,
  `treatmenttype` varchar(30) NOT NULL,
  `animal` varchar(30) NOT NULL,
  `treatmentdate` date NOT NULL,
  `serviceprovider` varchar(30) NOT NULL,
  `diseasestype` varchar(30) NOT NULL,
  PRIMARY KEY (`treatmentid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_yagan_user`
--

DROP TABLE IF EXISTS `tbl_yagan_user`;
CREATE TABLE IF NOT EXISTS `tbl_yagan_user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
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
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `regdate` date NOT NULL,
  `trial` varchar(10) NOT NULL DEFAULT 'yes',
  `endtrialdate` date NOT NULL,
  `passwordchange` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_yagan_user`
--

INSERT INTO `tbl_yagan_user` (`id`, `surname`, `othernames`, `username`, `password`, `orgtel`, `email`, `userlevel`, `organization`, `verified`, `verification_code`, `created`, `modified`, `regdate`, `trial`, `endtrialdate`, `passwordchange`) VALUES
(1, '', '', 'chris', '7efc94f1f26bdafde81e2fcd91c62b53', '0722977672', 'chepken@gmail.com', 9, '0722977672', 0, '', '0000-00-00', '2018-11-11 15:35:36', '0000-00-00', 'yes', '2019-01-31', 1),
(2, '', '', 'chris1', '5ef41f69e8bd52382ecff421389c0f62', '0733977672', 'chepken@uonbi.ac.ke', 8, '0722977671', 0, '', '0000-00-00', '2018-11-11 11:19:13', '0000-00-00', 'yes', '0000-00-00', 0),
(3, '', '', 'chris2', '1e132c918c2ed634a32650d0a2a35fb0', '0733977671', 'chep1@yahoo.com', 5, '0733977672', 0, '', '0000-00-00', '2018-11-10 16:10:35', '0000-00-00', 'yes', '0000-00-00', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
