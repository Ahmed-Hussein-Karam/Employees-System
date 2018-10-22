-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2018 at 03:13 AM
-- Server version: 8.0.11
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employees-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `Day` date NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `StatusTypeID` int(11) NOT NULL,
  `WorkingHours` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`Day`, `EmployeeID`, `StatusTypeID`, `WorkingHours`) VALUES
('2018-10-01', 1, 1, 8),
('2018-10-02', 1, 2, 0),
('2018-10-03', 1, 1, 5),
('2018-10-04', 1, 1, 7),
('2018-10-01', 2, 1, 6),
('2018-10-02', 2, 1, 7),
('2018-10-03', 2, 3, 0),
('2018-10-04', 2, 3, 0),
('2018-10-01', 4, 1, 7),
('2018-10-02', 4, 1, 8),
('2018-10-03', 4, 1, 8),
('2018-10-04', 4, 1, 8),
('2018-10-01', 11, 1, 4),
('2018-10-02', 11, 1, 5),
('2018-10-03', 11, 1, 3),
('2018-10-04', 11, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Mobile` varchar(50) DEFAULT NULL,
  `HireDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`ID`, `Name`, `Email`, `Mobile`, `HireDate`) VALUES
(1, 'Hazem Foudaa', 'hazem-foudaa@gmail.com', '2', '2018-09-02'),
(2, 'Ali', 'ali@gmail.com', '01055555555', '2018-10-16'),
(4, 'Mona', 'mona@gmail.com', '64', '2018-10-26'),
(11, 'Hesham', 'hesham@gmail.com', '32165165', '2018-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `statustypes`
--

CREATE TABLE `statustypes` (
  `ID` int(11) NOT NULL,
  `Type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `statustypes`
--

INSERT INTO `statustypes` (`ID`, `Type`) VALUES
(2, 'Absent'),
(4, 'Day OFF'),
(1, 'Present'),
(3, 'Sick Leave');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Passwd` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Email`, `Passwd`) VALUES
(1, 'Ahmed Hussein', 'ahkcsit@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`EmployeeID`,`Day`),
  ADD KEY `StatusTypeID` (`StatusTypeID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `statustypes`
--
ALTER TABLE `statustypes`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Type` (`Type`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `statustypes`
--
ALTER TABLE `statustypes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`StatusTypeID`) REFERENCES `statustypes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
