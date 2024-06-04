-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 04, 2024 at 01:40 AM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bocchi`
--
CREATE DATABASE IF NOT EXISTS `bocchi` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bocchi`;

-- --------------------------------------------------------

--
-- Table structure for table `bestellingen`
--

CREATE TABLE IF NOT EXISTS `bestellingen` (
  `bestellingID` int(11) NOT NULL,
  `datum` date NOT NULL,
  `gebruikersID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `aantal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bestellingen`
--

INSERT INTO `bestellingen` (`bestellingID`, `datum`, `gebruikersID`, `productID`, `aantal`) VALUES
(1, '2024-06-04', 0, 1, 1),
(2, '2024-06-04', 0, 1, 1),
(3, '2024-06-04', 0, 1, 1),
(4, '2024-06-04', 0, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gebruikers`
--

CREATE TABLE IF NOT EXISTS `gebruikers` (
  `gebruikersID` int(11) NOT NULL,
  `Gebruikersnaam` text NOT NULL,
  `Wachtwoord` text NOT NULL,
  PRIMARY KEY (`gebruikersID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gebruikers`
--

INSERT INTO `gebruikers` (`gebruikersID`, `Gebruikersnaam`, `Wachtwoord`) VALUES
(0, 'a', 's'),
(1, 'z', 'z'),
(2, 'd', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `producten`
--

CREATE TABLE IF NOT EXISTS `producten` (
  `productID` int(11) NOT NULL,
  `naam` text NOT NULL,
  `image` text NOT NULL,
  `merk` text NOT NULL,
  `prijs` int(11) NOT NULL,
  `stock?` tinyint(1) NOT NULL,
  `aantal` int(11) DEFAULT NULL,
  `omschrijving` text NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producten`
--

INSERT INTO `producten` (`productID`, `naam`, `image`, `merk`, `prijs`, `stock?`, `aantal`, `omschrijving`, `type`) VALUES
(0, 'Fender Stratocaster\r\n', '61rewiTFMgL (1).jpg', 'Fender', 1200, 1, 1, '', 'elektrisch'),
(1, 'Gibson Les Paul\r\n', '1664522808LPS6F002HNH1_front-ezgif.com-webp-to-jpg-converter', 'Gibson', 1500, 1, 1, '', 'elektrisch'),
(2, 'Ibanez RG', '3.jpg', 'Ibanez', 200, 1, 1, '', 'elektrisch'),
(3, 'PRS SE Custom', '4.jpg', 'PRS', 1100, 1, 1, '', 'elektrisch'),
(4, 'Martin D-28', '5.jpg', 'Martin', 2300, 1, 1, '', 'akoestisch'),
(5, 'Taylor 314Ce', '6.jpg', 'Taylor', 2000, 1, 1, '', 'akoestisch'),
(6, 'Fender Precision Bass', '7.jpg', 'Fender', 1100, 1, 1, '', 'bass'),
(7, 'Gibson Thunderbird', '8.jpg', 'Gibson', 1400, 1, 1, '', 'bass'),
(8, 'Gitaarsnaren', '9.jpg', 'Fazley', 10, 1, 1, '', 'accessoire'),
(9, 'Plectrums', '10.jpg', 'Fazley', 5, 1, 1, '', 'accessoire'),
(10, 'Gitaarriem', '11.jpg', 'Fazley', 20, 1, 1, '', 'accessoire');

-- --------------------------------------------------------

--
-- Table structure for table `winkelmandje`
--

CREATE TABLE IF NOT EXISTS `winkelmandje` (
  `ID` int(11) NOT NULL,
  `gebruikersID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `aantal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `winkelmandje`
--

INSERT INTO `winkelmandje` (`ID`, `gebruikersID`, `productID`, `aantal`) VALUES
(0, 0, 2, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
