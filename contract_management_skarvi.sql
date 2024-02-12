-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2024 at 09:42 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contract_management_skarvi`
--

-- --------------------------------------------------------

--
-- Table structure for table `cargodescription`
--

CREATE TABLE `cargodescription` (
  `id` int(11) NOT NULL,
  `Cargodescriptionname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cargodescription`
--

INSERT INTO `cargodescription` (`id`, `Cargodescriptionname`) VALUES
(1, 'Hello World!!!'),
(2, 'Hi Duniya'),
(3, 'Hi! I am Jyothirmai'),
(4, 'Hello from Jyothi!');

-- --------------------------------------------------------

--
-- Table structure for table `counterparty`
--

CREATE TABLE `counterparty` (
  `id` int(11) NOT NULL,
  `Counterpartyname` varchar(255) DEFAULT NULL,
  `Counterpartylocation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `counterparty`
--

INSERT INTO `counterparty` (`id`, `Counterpartyname`, `Counterpartylocation`) VALUES
(1, 'Ramanathan Ravi', 'London'),
(2, 'Rokkam Nikhila', 'Vizianagaram'),
(3, 'Vanaparthi Jyothirmai', 'Visakhapatnam'),
(4, 'Gorle Jyothi', 'Mumbai');

-- --------------------------------------------------------

--
-- Table structure for table `termcontract`
--

CREATE TABLE `termcontract` (
  `id` int(11) NOT NULL,
  `Counterpartyname` varchar(255) DEFAULT NULL,
  `Cargodescriptionname` varchar(255) DEFAULT NULL,
  `Termcontractfrom` date DEFAULT NULL,
  `Termcontractto` date DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `termcontract`
--

INSERT INTO `termcontract` (`id`, `Counterpartyname`, `Cargodescriptionname`, `Termcontractfrom`, `Termcontractto`, `Quantity`) VALUES
(1, 'Ramanathan Ravi', 'Hello World!!!', '2024-02-11', '2024-02-29', 4),
(2, 'Rokkam Nikhila', 'Hi Duniya', '2024-02-02', '2024-03-01', 2),
(3, 'Vanaparthi Jyothirmai', 'Hi! I am Jyothirmai', '2024-02-14', '2024-02-29', 8),
(4, 'Gorle Jyothi', 'Hello from Jyothi!', '2024-02-12', '2024-02-17', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cargodescription`
--
ALTER TABLE `cargodescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counterparty`
--
ALTER TABLE `counterparty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `termcontract`
--
ALTER TABLE `termcontract`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cargodescription`
--
ALTER TABLE `cargodescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `counterparty`
--
ALTER TABLE `counterparty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `termcontract`
--
ALTER TABLE `termcontract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
