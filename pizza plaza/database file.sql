-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 03, 2022 at 03:15 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzaplaza`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

DROP TABLE IF EXISTS `tblcart`;
CREATE TABLE IF NOT EXISTS `tblcart` (
  `productID` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `cartID` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cartID`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

DROP TABLE IF EXISTS `tblorder`;
CREATE TABLE IF NOT EXISTS `tblorder` (
  `orderID` varchar(100) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `qty` int NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `orderNo` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`orderNo`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`orderID`, `productName`, `qty`, `email`, `date`, `orderNo`) VALUES
('8855', 'chicken', 1, 'sriyan@gmail.com', '2022-12-03', 1),
('8855', 'BBQ pizza', 1, 'sriyan@gmail.com', '2022-12-03', 2),
('8855', 'vegie pizza', 1, 'sriyan@gmail.com', '2022-12-03', 3),
('5457', 'prawns pizza', 1, 'sriyan@gmail.com', '2022-12-03', 4),
('5457', 'chicken', 1, 'sriyan@gmail.com', '2022-12-03', 5),
('6442', 'vegie pizza', 1, 'sriyan@gmail.com', '2022-12-03', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tblpayment`
--

DROP TABLE IF EXISTS `tblpayment`;
CREATE TABLE IF NOT EXISTS `tblpayment` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `total` double NOT NULL,
  `orderID` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblpayment`
--

INSERT INTO `tblpayment` (`ID`, `total`, `orderID`) VALUES
(9, 933, '5457'),
(8, 1911, '8855'),
(10, 1100, '6442');

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

DROP TABLE IF EXISTS `tblproducts`;
CREATE TABLE IF NOT EXISTS `tblproducts` (
  `pizzaID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `imagePath` varchar(1000) NOT NULL,
  `smallPrice` varchar(20) NOT NULL,
  `mediumPrice` varchar(20) NOT NULL,
  `largePrice` varchar(20) NOT NULL,
  PRIMARY KEY (`pizzaID`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`pizzaID`, `name`, `description`, `imagePath`, `smallPrice`, `mediumPrice`, `largePrice`) VALUES
(13, 'vegie pizza', 'pure vegetable pizza', 'images/productschicago pizza.jpg', '1100', '2000', '3000'),
(14, 'BBQ pizza', 'wow', 'images/products/BBQ-Chicken-Pizza-4.jpg', '800', '1200', '2000'),
(15, 'chicken', 'ezzz', 'images/products/devilled chicken.jpg', '11', '11', '11'),
(19, 'chicken', 'woww', 'images/productscheese pizza.jpg', '133', '333', '333'),
(17, 'prawns pizza', 'wow wow owow', 'images/products/prawns.jpg', '800', '1800', '2300'),
(18, 'chicago pizza', 'wow better than newyork pizza', 'images/products/chicago pizza.jpg', '1000', '2000', '3000'),
(20, 'rasa pizza', 'aaaaaa', 'images/products/20695.jpg', '100', '200', '300');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE IF NOT EXISTS `tbluser` (
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`name`, `email`, `address`, `phone`, `password`, `type`) VALUES
('sriyan', 'sriyan@gmail.com', 'piliyandala', '1', '123', 0),
('admin', 'anuruddasriyan@gmail.com', 'piliyandala', '1111111', '123', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
