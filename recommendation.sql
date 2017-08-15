-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2017 at 08:27 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recommendation`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Keywords` varchar(200) NOT NULL,
  `Authors` varchar(200) NOT NULL,
  `Size` varchar(200) NOT NULL,
  `Path` varchar(200) DEFAULT NULL,
  `Rating` varchar(200) NOT NULL,
  `Foreign_Key` varchar(500) NOT NULL,
  `Publisher` varchar(200) DEFAULT NULL,
  `Rating_count` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`ID`, `Name`, `Keywords`, `Authors`, `Size`, `Path`, `Rating`, `Foreign_Key`, `Publisher`, `Rating_count`) VALUES
(1, 'Mein Kampf', 'Literature Biography Adolf Hitler Germany History ', 'Adolf Hitler', '1.2 MB', 'D:\\Books\\Genres\\Biographies', '1', 'LIT/BIO/HITLER', 'The Noontide Press', '0'),
(2, 'My Experiments with Truth', 'Literature Biography Mahatma Gandhi India', 'Mahatma Gandhi (M. K. Gandhi) ', '2 MB', 'D:\\Books\\Genres\\Biographies', '5', 'LIT/BIO/GANDHI', 'Gandhi Book Centre', '5');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `ID` int(11) DEFAULT NULL,
  `BookID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`ID`, `BookID`, `UserID`, `rating`) VALUES
(1, 1, 1, 4),
(2, 2, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `City` varchar(200) DEFAULT NULL,
  `Email` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Interest` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `City`, `Email`, `Password`, `Interest`) VALUES
(1, 'Mukesh Kumar Srivastava', 'Bhubaneshwar', 'mukeshsrivastav691@gmail.com', '12345', 'Technology Cricket Sports Creativity');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`BookID`,`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email_unique` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
