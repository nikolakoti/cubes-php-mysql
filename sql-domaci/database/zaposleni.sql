-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2017 at 02:48 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zaposleni`
--

-- --------------------------------------------------------

--
-- Table structure for table `platni_razred`
--

CREATE TABLE `platni_razred` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL,
  `iznos_plate` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `platni_razred`
--

INSERT INTO `platni_razred` (`id`, `naziv`, `iznos_plate`) VALUES
(1, 'Nulti', '0.00'),
(2, 'Pocetni', '50000.00'),
(3, 'Napredni', '100000.00'),
(4, 'Menadzment', '150000.00');

-- --------------------------------------------------------

--
-- Table structure for table `radna_pozicija`
--

CREATE TABLE `radna_pozicija` (
  `id` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL,
  `platni_razred_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `radna_pozicija`
--

INSERT INTO `radna_pozicija` (`id`, `naziv`, `platni_razred_id`) VALUES
(1, 'Praktikant', 1),
(2, 'Junior Programer', 2),
(3, 'Junior Tester', 2),
(4, 'Office Manager', 2),
(5, 'Senior Programer', 3),
(6, 'Senior Tester', 3),
(7, 'Specijalista za Digitalni Marketing', 3),
(8, 'Tehnicki Direktor', 4),
(9, 'Generalni Direktor', 4),
(10, 'Operativni Direktor', 4);

-- --------------------------------------------------------

--
-- Table structure for table `zaposleni`
--

CREATE TABLE `zaposleni` (
  `id` int(11) NOT NULL,
  `ime` char(50) NOT NULL,
  `prezime` varchar(255) NOT NULL,
  `jmbg` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zaposleni`
--

INSERT INTO `zaposleni` (`id`, `ime`, `prezime`, `jmbg`) VALUES
(1, 'Nikola', 'Kotarac', 411985770042);

-- --------------------------------------------------------

--
-- Table structure for table `zaposlen_na_radnoj_poziciji`
--

CREATE TABLE `zaposlen_na_radnoj_poziciji` (
  `id` int(11) NOT NULL,
  `radna_pozicija_id` int(11) NOT NULL,
  `zaposlen_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `zaposlen_na_radnoj_poziciji`
--

INSERT INTO `zaposlen_na_radnoj_poziciji` (`id`, `radna_pozicija_id`, `zaposlen_id`, `status`, `datum`) VALUES
(1, 1, 1, 1, '2014-03-18'),
(2, 2, 1, 1, '2014-10-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `platni_razred`
--
ALTER TABLE `platni_razred`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `radna_pozicija`
--
ALTER TABLE `radna_pozicija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zaposleni`
--
ALTER TABLE `zaposleni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zaposlen_na_radnoj_poziciji`
--
ALTER TABLE `zaposlen_na_radnoj_poziciji`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `platni_razred`
--
ALTER TABLE `platni_razred`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `radna_pozicija`
--
ALTER TABLE `radna_pozicija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `zaposleni`
--
ALTER TABLE `zaposleni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `zaposlen_na_radnoj_poziciji`
--
ALTER TABLE `zaposlen_na_radnoj_poziciji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
