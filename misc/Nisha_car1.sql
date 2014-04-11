-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2014 at 06:39 PM
-- Server version: 5.5.34-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Nisha_car1`
--

-- --------------------------------------------------------

--
-- Table structure for table `Antaldorrar`
--

CREATE TABLE IF NOT EXISTS `Antaldorrar` (
  `AntaldorrarID` int(20) NOT NULL,
  `Type` varchar(50) NOT NULL,
  PRIMARY KEY (`AntaldorrarID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Antaldorrar`
--

INSERT INTO `Antaldorrar` (`AntaldorrarID`, `Type`) VALUES
(1, '3D'),
(2, '4D'),
(3, '5D'),
(4, 'Skap');

-- --------------------------------------------------------

--
-- Table structure for table `Bilmarke`
--

CREATE TABLE IF NOT EXISTS `Bilmarke` (
  `BilmarkeID` int(20) NOT NULL,
  `BrandName` varchar(50) NOT NULL,
  PRIMARY KEY (`BilmarkeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Bilmarke`
--

INSERT INTO `Bilmarke` (`BilmarkeID`, `BrandName`) VALUES
(1, 'Alfa Romeo'),
(2, 'Aston Martin');

-- --------------------------------------------------------

--
-- Table structure for table `Car`
--

CREATE TABLE IF NOT EXISTS `Car` (
  `REGID` varchar(50) NOT NULL,
  `BilmarkeID` int(20) DEFAULT NULL,
  `Model` varchar(20) DEFAULT NULL,
  `ArsYear` varchar(20) DEFAULT NULL,
  `Miltal` int(20) NOT NULL,
  `AntaldorrarID` int(20) DEFAULT NULL COMMENT 'foreign key',
  `FargKodID` int(20) DEFAULT NULL COMMENT 'foreign key',
  `CID` int(20) NOT NULL COMMENT 'foreign key',
  `FargKod` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`REGID`),
  KEY `BilmarkeID` (`BilmarkeID`),
  KEY `FargKodID` (`FargKodID`),
  KEY `CID` (`CID`),
  KEY `AntaldorrarID` (`AntaldorrarID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Car`
--

INSERT INTO `Car` (`REGID`, `BilmarkeID`, `Model`, `ArsYear`, `Miltal`, `AntaldorrarID`, `FargKodID`, `CID`, `FargKod`) VALUES
('car1', 1, 'diso', '1234', 23, 2, 2, 1, '2133');

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE IF NOT EXISTS `Customer` (
  `CID` int(20) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Email` varchar(50) NOT NULL,
  PRIMARY KEY (`CID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Customer Information' AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`CID`, `FirstName`, `LastName`, `Address`, `Email`) VALUES
(1, 'mehmod', 'Khan', 'studentbacken 25', 'malagori@gmail.com'),
(2, 'zia', 'Khan', 'studentbacken 25', 'ziq@gmail.com'),
(3, 'zia2', 'Khan', 'studentbacken 25', 'zia2@gmail.com'),
(4, 'zia3', 'Khan', 'studentbacken 25', 'zia3@gmail.com'),
(5, 'mehmod1', 'Khan1', 'studentbacken 25', 'zia2@gmail.com'),
(6, 'mehmod1', 'khan', 'studentbacken 25', 'zia2@gmail.com'),
(7, 'mehmod12', 'khan', 'studentbacken 25', 'malagori@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Damage`
--

CREATE TABLE IF NOT EXISTS `Damage` (
  `DID` int(20) NOT NULL AUTO_INCREMENT,
  `InsuranceID` int(20) NOT NULL,
  `SkadeNr` int(20) NOT NULL,
  `SkadeDay` date NOT NULL,
  `SkadetypID` int(20) NOT NULL,
  `AntalSkador` int(20) NOT NULL,
  `Ersattningsbar` tinyint(1) DEFAULT NULL,
  `Vallande` tinyint(1) DEFAULT NULL,
  `Sjalvrisk` tinyint(1) DEFAULT NULL,
  `Momspliktig` tinyint(1) DEFAULT NULL,
  `REGID` varchar(50) NOT NULL,
  PRIMARY KEY (`DID`),
  KEY `REGID` (`REGID`),
  KEY `SkadetypID` (`SkadetypID`),
  KEY `InsuranceID` (`InsuranceID`),
  KEY `REGID_2` (`REGID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Car Damage Table' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `DamageTypes`
--

CREATE TABLE IF NOT EXISTS `DamageTypes` (
  `DTID` int(20) NOT NULL AUTO_INCREMENT,
  `DamageType` varchar(50) NOT NULL,
  `Description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`DTID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `FargKod`
--

CREATE TABLE IF NOT EXISTS `FargKod` (
  `FargKodID` int(20) NOT NULL AUTO_INCREMENT,
  `ColorType` varchar(50) NOT NULL,
  PRIMARY KEY (`FargKodID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `FargKod`
--

INSERT INTO `FargKod` (`FargKodID`, `ColorType`) VALUES
(1, 'Vit'),
(2, 'Röd'),
(3, 'Blå'),
(4, 'Gul'),
(5, 'Grå'),
(6, 'Grön'),
(7, 'Brun'),
(8, 'Silver');

-- --------------------------------------------------------

--
-- Table structure for table `Insurance`
--

CREATE TABLE IF NOT EXISTS `Insurance` (
  `InsuranceID` int(20) NOT NULL AUTO_INCREMENT,
  `CompanyName` varchar(50) NOT NULL,
  PRIMARY KEY (`InsuranceID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `NewDamages`
--

CREATE TABLE IF NOT EXISTS `NewDamages` (
  `NDID` int(20) NOT NULL AUTO_INCREMENT,
  `REGID` varchar(50) NOT NULL,
  `DTID` int(20) NOT NULL,
  PRIMARY KEY (`NDID`),
  KEY `REGID` (`REGID`,`DTID`),
  KEY `REGID_2` (`REGID`),
  KEY `DTID` (`DTID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `OldDamages`
--

CREATE TABLE IF NOT EXISTS `OldDamages` (
  `ODID` int(20) NOT NULL AUTO_INCREMENT,
  `REGID` varchar(50) NOT NULL,
  `DTID` int(20) NOT NULL,
  PRIMARY KEY (`ODID`),
  KEY `REGID` (`REGID`,`DTID`),
  KEY `REGID_2` (`REGID`),
  KEY `DTID` (`DTID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Phone`
--

CREATE TABLE IF NOT EXISTS `Phone` (
  `PID` int(11) NOT NULL AUTO_INCREMENT,
  `Mobile` int(13) NOT NULL,
  `LandLine` int(13) DEFAULT NULL,
  `CID` int(20) NOT NULL COMMENT 'Foreign Key',
  PRIMARY KEY (`PID`),
  KEY `CID` (`CID`),
  KEY `CID_2` (`CID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `QR`
--

CREATE TABLE IF NOT EXISTS `QR` (
  `QRID` int(20) NOT NULL AUTO_INCREMENT,
  `Link` varchar(200) NOT NULL,
  `PathToQR` varchar(500) NOT NULL,
  `REGID` varchar(50) NOT NULL,
  PRIMARY KEY (`QRID`),
  KEY `REGID` (`REGID`),
  KEY `REGID_2` (`REGID`),
  KEY `REGID_3` (`REGID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Skadetyp`
--

CREATE TABLE IF NOT EXISTS `Skadetyp` (
  `SkadetypID` int(20) NOT NULL AUTO_INCREMENT,
  `DamageReason` varchar(50) NOT NULL,
  PRIMARY KEY (`SkadetypID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Status`
--

CREATE TABLE IF NOT EXISTS `Status` (
  `STID` int(20) NOT NULL AUTO_INCREMENT,
  `StatusType` varchar(20) NOT NULL,
  `StartEnd` varchar(20) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `BokadID` date NOT NULL,
  `BeraknadKlart` date NOT NULL,
  `KlarDatum` date NOT NULL,
  `REGID` varchar(50) NOT NULL,
  PRIMARY KEY (`STID`),
  KEY `REGID` (`REGID`),
  KEY `REGID_2` (`REGID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `UID` int(10) NOT NULL AUTO_INCREMENT,
  `Fullname` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`UID`, `Fullname`, `Username`, `Email`, `Password`) VALUES
(1, 'Zia Ullah', 'Admin', 'zia_gt@yahoo.com', 'pakistan123');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Car`
--
ALTER TABLE `Car`
  ADD CONSTRAINT `Car_ibfk_1` FOREIGN KEY (`BilmarkeID`) REFERENCES `Bilmarke` (`BilmarkeID`),
  ADD CONSTRAINT `Car_ibfk_2` FOREIGN KEY (`FargKodID`) REFERENCES `FargKod` (`FargKodID`),
  ADD CONSTRAINT `Car_ibfk_3` FOREIGN KEY (`CID`) REFERENCES `Customer` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Car_ibfk_4` FOREIGN KEY (`AntaldorrarID`) REFERENCES `Antaldorrar` (`AntaldorrarID`);

--
-- Constraints for table `Damage`
--
ALTER TABLE `Damage`
  ADD CONSTRAINT `Damage_ibfk_1` FOREIGN KEY (`InsuranceID`) REFERENCES `Insurance` (`InsuranceID`),
  ADD CONSTRAINT `Damage_ibfk_2` FOREIGN KEY (`SkadetypID`) REFERENCES `Skadetyp` (`SkadetypID`),
  ADD CONSTRAINT `Damage_ibfk_3` FOREIGN KEY (`REGID`) REFERENCES `Car` (`REGID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `NewDamages`
--
ALTER TABLE `NewDamages`
  ADD CONSTRAINT `NewDamages_ibfk_1` FOREIGN KEY (`REGID`) REFERENCES `Car` (`REGID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `NewDamages_ibfk_2` FOREIGN KEY (`DTID`) REFERENCES `DamageTypes` (`DTID`);

--
-- Constraints for table `OldDamages`
--
ALTER TABLE `OldDamages`
  ADD CONSTRAINT `OldDamages_ibfk_1` FOREIGN KEY (`REGID`) REFERENCES `Car` (`REGID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `OldDamages_ibfk_2` FOREIGN KEY (`DTID`) REFERENCES `DamageTypes` (`DTID`);

--
-- Constraints for table `Phone`
--
ALTER TABLE `Phone`
  ADD CONSTRAINT `Phone_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `Customer` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `QR`
--
ALTER TABLE `QR`
  ADD CONSTRAINT `QR_ibfk_1` FOREIGN KEY (`REGID`) REFERENCES `Car` (`REGID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Status`
--
ALTER TABLE `Status`
  ADD CONSTRAINT `Status_ibfk_1` FOREIGN KEY (`REGID`) REFERENCES `Car` (`REGID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
