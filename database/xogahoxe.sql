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

CREATE TABLE `user` (
  `mail` varchar(60) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `city` varchar(60),
  `phone` int(12),
  `age` int(3),
  `image` varchar(255),
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `game` varchar(60) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(60) NOT NULL,
  `date` datetime NOT NULL,
  `min_players` tinyint(2) NOT NULL,
  `max_players` tinyint(2) NOT NULL,
  `description` text,
  `info` text,
  `players` varchar(255) NOT NULL,
  `owner` varchar(30) NOT NULL,
  `id` tinyint(6) AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `name` tinytext NOT NULL,
  `price` tinyint(12) NOT NULL,
  `status` tinytext NOT NULL,
  `delivery` tinytext NOT NULL,
  `address` varchar(60) NOT NULL,
  `city` tinytext NOT NULL,
  `description` text,
  `sold` tinyint(1) DEFAULT 0,
  `owner` varchar(30) NOT NULL,
  `id` tinyint(6) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE event
    ADD CONSTRAINT EventUser_FK
    FOREIGN KEY (owner)
    REFERENCES user(username);

--
-- Indexes for table `product`
--
ALTER TABLE product
    ADD CONSTRAINT ProductUser_FK
    FOREIGN KEY (owner)
    REFERENCES user(username);

--
-- Indexes for table `user`
--

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--