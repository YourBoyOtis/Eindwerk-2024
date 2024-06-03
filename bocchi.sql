-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 03 jun 2024 om 11:49
-- Serverversie: 5.6.13
-- PHP-versie: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `bocchi`
--
CREATE DATABASE IF NOT EXISTS `bocchi` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bocchi`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `adres`
--

CREATE TABLE IF NOT EXISTS `adres` (
  `AdresID` int(11) NOT NULL,
  `Stad` text NOT NULL,
  `Postcode` text NOT NULL,
  `straat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE IF NOT EXISTS `gebruikers` (
  `gebruikersID` int(11) NOT NULL,
  `Gebruikersnaam` text NOT NULL,
  `Wachtwoord` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden uitgevoerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`gebruikersID`, `Gebruikersnaam`, `Wachtwoord`) VALUES
(0, 'ddd', 'ddd'),
(0, 'er', 'er'),
(0, 'd', 'd');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE IF NOT EXISTS `klanten` (
  `KlantID` int(11) NOT NULL,
  `Naam` int(11) NOT NULL,
  `AdresID` int(11) NOT NULL,
  `Email` text NOT NULL,
  `Telefoon` int(11) NOT NULL,
  UNIQUE KEY `Telefoon` (`Telefoon`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `producten`
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
-- Gegevens worden uitgevoerd voor tabel `producten`
--

INSERT INTO `producten` (`productID`, `naam`, `image`, `merk`, `prijs`, `stock?`, `aantal`, `omschrijving`, `type`) VALUES
(1, 'Fender Stratocaster', '61rewiTFMgL.jpg', 'Fender', 1200, 1, 4, '', 'elektrisch'),
(1, 'Fender Stratocaster', '61rewiTFMgL.jpg', 'Fender', 1200, 1, 4, '', 'elektrisch');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `winkelmandje`
--

CREATE TABLE IF NOT EXISTS `winkelmandje` (
  `ID` int(11) NOT NULL,
  `gebruikersID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `aantal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
