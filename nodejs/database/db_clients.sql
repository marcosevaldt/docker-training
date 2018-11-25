-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Nov 12, 2018 at 10:07 PM
-- Server version: 5.6.42
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_clients`
--
CREATE DATABASE IF NOT EXISTS `db_clients` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_clients`;

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `address_type_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `addresses`
--

TRUNCATE TABLE `addresses`;
--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` VALUES(1, 1, 1, 'Avenida das Entregas, 255.');
INSERT INTO `addresses` VALUES(2, 1, 2, 'Avenida das Cobranças, 150.');

-- --------------------------------------------------------

--
-- Table structure for table `addresses_type`
--

DROP TABLE IF EXISTS `addresses_type`;
CREATE TABLE `addresses_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `addresses_type`
--

TRUNCATE TABLE `addresses_type`;
--
-- Dumping data for table `addresses_type`
--

INSERT INTO `addresses_type` VALUES(1, 'Entrega');
INSERT INTO `addresses_type` VALUES(2, 'Cobrança');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1',
  `client_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `clients`
--

TRUNCATE TABLE `clients`;
--
-- Dumping data for table `clients`
--

INSERT INTO `clients` VALUES(1, 'William Agamoto'  , 'william@example.com', 'secret', '(51) 983746612', '399.663.370-08', 1, 1);
INSERT INTO `clients` VALUES(1, 'Josevaldo Pereira', 'josevaldo@example.com', 'secret', '(51) 987783392', '910.390.930-19', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients_status`
--

DROP TABLE IF EXISTS `clients_status`;
CREATE TABLE `clients_status` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `clients_status`
--

TRUNCATE TABLE `clients_status`;
--
-- Dumping data for table `clients_status`
--

INSERT INTO `clients_status` VALUES(1, 'Ativo');
INSERT INTO `clients_status` VALUES(2, 'Inativo');

-- --------------------------------------------------------

--
-- Table structure for table `clients_type`
--

DROP TABLE IF EXISTS `clients_type`;
CREATE TABLE `clients_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `clients_type`
--

TRUNCATE TABLE `clients_type`;
--
-- Dumping data for table `clients_type`
--

INSERT INTO `clients_type` VALUES(1, 'Admin');
INSERT INTO `clients_type` VALUES(2, 'Usuário');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `document_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `documents`
--

TRUNCATE TABLE `documents`;
--
-- Dumping data for table `documents`
--

INSERT INTO `documents` VALUES(1, 0, '846.259.370-00', 2);
INSERT INTO `documents` VALUES(2, 0, '811.367.173-2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `documents_type`
--

DROP TABLE IF EXISTS `documents_type`;
CREATE TABLE `documents_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `documents_type`
--

TRUNCATE TABLE `documents_type`;
--
-- Dumping data for table `documents_type`
--

INSERT INTO `documents_type` VALUES(1, 'RG');
INSERT INTO `documents_type` VALUES(2, 'CPF');

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

DROP TABLE IF EXISTS `phones`;
CREATE TABLE `phones` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `phone_type_id` int(11) NOT NULL,
  `number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `phones`
--

TRUNCATE TABLE `phones`;
--
-- Dumping data for table `phones`
--

INSERT INTO `phones` VALUES(1, 0, 2, '(51)9999-9999');
INSERT INTO `phones` VALUES(2, 0, 1, '(51)99999-9999');

-- --------------------------------------------------------

--
-- Table structure for table `phones_type`
--

DROP TABLE IF EXISTS `phones_type`;
CREATE TABLE `phones_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `phones_type`
--

TRUNCATE TABLE `phones_type`;
--
-- Dumping data for table `phones_type`
--

INSERT INTO `phones_type` VALUES(1, 'Residencial');
INSERT INTO `phones_type` VALUES(2, 'Comercial');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addresses_type`
--
ALTER TABLE `addresses_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_status`
--
ALTER TABLE `clients_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients_type`
--
ALTER TABLE `clients_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents_type`
--
ALTER TABLE `documents_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phones_type`
--
ALTER TABLE `phones_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `addresses_type`
--
ALTER TABLE `addresses_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients_status`
--
ALTER TABLE `clients_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients_type`
--
ALTER TABLE `clients_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `documents_type`
--
ALTER TABLE `documents_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `phones_type`
--
ALTER TABLE `phones_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!20101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
