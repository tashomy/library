-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 07:15 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteka`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `id` int(11) NOT NULL,
  `naziv_kategorije` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`id`, `naziv_kategorije`) VALUES
(1, 'Istorija'),
(2, 'Nauka'),
(3, 'Romani'),
(4, 'Djeca'),
(5, 'Psihologija');

-- --------------------------------------------------------

--
-- Table structure for table `knjige`
--

CREATE TABLE `knjige` (
  `id` int(11) NOT NULL,
  `kategorija_id` int(11) NOT NULL,
  `naziv` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `cijena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `knjige`
--

INSERT INTO `knjige` (`id`, `kategorija_id`, `naziv`, `autor`, `cijena`) VALUES
(1, 3, 'Rat i mir', 'Lav Tolstoj', 7),
(2, 1, 'Ilijada i Odiseja', 'Homer', 9),
(3, 3, 'Gordost i predrasude', 'Dzejn Ostin', 6),
(4, 3, 'Bozanstvena komedija', 'Dante Aligijeri', 12),
(5, 4, 'Guliverova putovanja', 'Dzonatan Svift', 7),
(6, 3, 'Lovac u zitu', 'Dzerom Selindzer', 10),
(7, 3, 'Sto godina samoce', 'Gabrijel Garsija Markes', 9),
(8, 2, 'Porijeklo vrsta', 'Carls Darvin', 15),
(9, 3, 'Gospodja Dalovej', 'Virdzinija Vulf', 8),
(10, 1, 'Istorija', 'Herodot', 19),
(11, 2, 'Kapital', 'Karl Marks', 13),
(12, 3, 'Gospodar prstenova', 'Dzon Tolkin', 25),
(13, 3, 'Ubiti pticu rugalicu', 'Harper Li', 11),
(14, 3, 'Gospodja Bovari', 'Gistav Flober', 8),
(15, 3, 'Ana Karenjina', 'Lav Tolstoj', 10),
(16, 3, 'Hamlet', 'Vilijam Sekspir', 8),
(17, 3, 'Otelo', 'Vilijam Sekspir', 9),
(18, 4, 'Dozivljaji Haklberi Fina', 'Mark Tven', 7),
(19, 4, 'Farma', 'Dzordz Orvel', 5),
(20, 3, 'Gospodar muva', 'Vilijam Golding', 13),
(21, 3, 'Sunce se ponovo radja', 'Ernest Hemingvej', 14),
(22, 3, 'Dok lezah na samrti', 'Vilijam Fokner', 12),
(23, 3, 'Doba nevinosti', 'Idit Vorton', 11),
(24, 3, 'Dan skakavaca', 'Natanijel Vest', 9),
(25, 5, 'Tumacenje snova', 'Sigmund Frojd', 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knjige`
--
ALTER TABLE `knjige`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategorija_id` (`kategorija_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `knjige`
--
ALTER TABLE `knjige`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `knjige`
--
ALTER TABLE `knjige`
  ADD CONSTRAINT `knjige_ibfk_1` FOREIGN KEY (`kategorija_id`) REFERENCES `kategorija` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
