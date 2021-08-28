-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2021 at 12:16 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `published_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `author`, `publisher`, `isbn`, `published_date`) VALUES
(1, 'The Dressmaker\'s Gift', 'Fiona Valpy', 'Lake Union Publishin', '9781542005135', '01/10/2019'),
(6, 'A Slave of the Shadows', 'Naomi Finley 1', 'Huntson Press', 'B079LYSJP9', '05/03/2018'),
(25, 'The book of books', 'Author X', 'Publisher X', '1234567890123', '11-02-2021'),
(26, 'Book 11', 'Author x', 'Publisher 1', '1234567890123', '11-02-2021'),
(28, 'Book 101', 'Auth 101', 'Pub 101', '1234567890123', '11/02/2021'),
(29, 'Book 101', 'Auth 101', 'Pub 101', '1234567890123', '11/02/2021'),
(30, 'Book 101', 'Auth 101', 'Pub 101', '1234567890123', '11/02/2021'),
(31, 'Book 101', 'Auth 101', 'Pub 101', '1234567890123', '11/02/2021'),
(32, 'dasd', 'dasd', 'Publisher 5', '1234567890123', 'adsa'),
(33, 'dsada', 'dsada', 'Hacked Publisher', '1234567890123', '1231312');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
