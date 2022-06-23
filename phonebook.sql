-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2022 at 03:33 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phonebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `sid`
--

CREATE TABLE `sid` (
  `contact_id` int(11) NOT NULL COMMENT 'Primary Key',
  `contact_name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sid`
--

INSERT INTO `sid` (`contact_id`, `contact_name`, `designation`, `phone`, `address`) VALUES
(1, 'Kiran', 'Player', '9823541678', 'Nagpur'),
(2, 'Rahul', 'Boxer', '8451267235', 'Pune'),
(3, 'Viki', 'Family Friend', '8451236745', 'Kolhapur'),
(4, 'Sham', 'Engineer', '8642513789', 'Islampur'),
(5, 'John', 'Developer', '7541239854', 'Mumbai'),
(6, 'Ram', 'Teacher', '9821547632', 'Satara'),
(7, 'Ramesh', 'Friend', '9784512365', 'Karad'),
(8, 'suresh', 'doc', '9456872139', 'Sangli'),
(9, 'Harshad', 'Builder', '9531248769', 'Mumbai'),
(10, 'Pankaj', 'Manager', '8754365124', 'Pune'),
(12, 'Uday', 'Contractor', '8654123587', 'Sangli'),
(13, 'Santosh', 'Mechanic', '8456712359', 'Karad');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `contact_id` int(11) NOT NULL COMMENT 'Primary Key',
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`contact_id`, `name`, `username`, `email`, `password`) VALUES
(1, 'Sid', 'sid', 'sidk@gmail.com', 'Pass@123'),
(2, 'Sid', 'axndx', 'sid@gmail.com', 'Pass@123'),
(33, 'Vipul', 'vsp', 'vipul@gmail.com', 'Vipul@123');

-- --------------------------------------------------------

--
-- Table structure for table `vsp`
--

CREATE TABLE `vsp` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vsp`
--

INSERT INTO `vsp` (`contact_id`, `contact_name`, `designation`, `phone`, `address`) VALUES
(1, 'rohan', 'classmate', '9564872351', 'Vita');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sid`
--
ALTER TABLE `sid`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `vsp`
--
ALTER TABLE `vsp`
  ADD PRIMARY KEY (`contact_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sid`
--
ALTER TABLE `sid`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `vsp`
--
ALTER TABLE `vsp`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
