-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 12 jan. 2020 à 13:55
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pc_buying_pro`
--

-- --------------------------------------------------------

--
-- Structure de la table `orderline`
--

DROP TABLE IF EXISTS `orderline`;
CREATE TABLE IF NOT EXISTS `orderline` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Product_Id` int(10) NOT NULL,
  `Quantity_Ordered` int(11) NOT NULL,
  `PriceEach` double NOT NULL,
  `Order_Id` int(10) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `Id` int(20) NOT NULL AUTO_INCREMENT,
  `User_Id` int(11) NOT NULL,
  `CreationTimestamp` datetime NOT NULL,
  `CompleteTimestamp` datetime DEFAULT NULL,
  `TaxRate` double DEFAULT NULL,
  `TaxAmount` double DEFAULT NULL,
  `TotalAmount` double DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `ProductLine` varchar(255) NOT NULL,
  `Photo` varchar(255) NOT NULL,
  `Description` varchar(900) NOT NULL,
  `QuantityInStock` int(100) NOT NULL,
  `BuyPrice` double NOT NULL,
  `SalePrice` double NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(90) COLLATE utf8_bin NOT NULL,
  `Password` varchar(160) COLLATE utf8_bin NOT NULL,
  `Role` varchar(10) COLLATE utf8_bin NOT NULL,
  `FirstName` varchar(15) COLLATE utf8_bin NOT NULL,
  `LastName` varchar(15) COLLATE utf8_bin NOT NULL,
  `CreationTimeStamp` date NOT NULL,
  `Adress` varchar(60) COLLATE utf8_bin NOT NULL,
  `City` varchar(60) COLLATE utf8_bin NOT NULL,
  `Zip` varchar(5) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
