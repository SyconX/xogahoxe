-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Nov 03, 2022 at 03:14 PM
-- Server version: 10.3.4-MariaDB
-- PHP Version: 7.3.0RC5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xogahoxe`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `User` (
  `mail` varchar(60) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `city` text,
  `phone` int(12),
  `age` int(3),
  `image` varchar(255),
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `event`
--

CREATE TABLE `Event` (
  `game` varchar(60) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` tinytext NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `min_players` tinyint(2) NOT NULL,
  `max_players` tinyint(2) NOT NULL,
  `players` varchar(255) NOT NULL,
  `description` text,
  `info` int(11),
  `id` tinyint(6) NOT NULL,
  `owner` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `Product` (
  `name` tinytext NOT NULL,
  `price` tinyint(12) NOT NULL,
  `status` tinytext NOT NULL,
  `delivery` tinytext NOT NULL,
  `address` varchar(60) NOT NULL,
  `city` tinytext NOT NULL,
  `description` text,
  `id` tinyint(6) NOT NULL AUTO_INCREMENT,
  `owner` varchar(30) NOT NULL,
  `sold` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE Event
    ADD CONSTRAINT EventUser_FK
    FOREIGN KEY (owner)
    REFERENCES User(username);

--
-- Indexes for table `product`
--
ALTER TABLE Product
    ADD CONSTRAINT ProductUser_FK
    FOREIGN KEY (owner)
    REFERENCES User(username);

--
-- Indexes for table `user`
--

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
