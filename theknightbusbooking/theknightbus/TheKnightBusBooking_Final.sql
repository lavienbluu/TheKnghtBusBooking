-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 25, 2021 at 03:38 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `TheKnightBusBooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `Bed`
--

CREATE TABLE `Bed` (
  `idBed` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `idBedType` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `idFloor` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Bed`
--

INSERT INTO `Bed` (`idBed`, `idBedType`, `idFloor`) VALUES
('A1', 'A', 1),
('A2', 'A', 1),
('A3', 'A', 1),
('A4', 'A', 1),
('B1', 'B', 2),
('B2', 'B', 2),
('B3', 'B', 2),
('B4', 'B', 2),
('B5', 'B', 2),
('C1', 'C', 3),
('C2', 'C', 3),
('C3', 'C', 3),
('C4', 'C', 3),
('C5', 'C', 3);

-- --------------------------------------------------------

--
-- Table structure for table `BedType`
--

CREATE TABLE `BedType` (
  `idBedType` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `BedTypeName` varchar(100) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BedType`
--

INSERT INTO `BedType` (`idBedType`, `BedTypeName`) VALUES
('A', 'Simple bed'),
('B', 'Deluxe bed'),
('C', 'Premium bed');

-- --------------------------------------------------------

--
-- Table structure for table `Bus`
--

CREATE TABLE `Bus` (
  `idBus` int(10) NOT NULL,
  `BusDirection` varchar(20) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Bus`
--

INSERT INTO `Bus` (`idBus`, `BusDirection`) VALUES
(1, 'Clockwise'),
(2, 'Clockwise'),
(3, 'Clockwise'),
(4, 'Clockwise'),
(5, 'Clockwise'),
(6, 'Clockwise'),
(7, 'Clockwise'),
(8, 'Anticlockwise'),
(9, 'Anticlockwise'),
(10, 'Anticlockwise'),
(11, 'Anticlockwise'),
(12, 'Anticlockwise'),
(13, 'Anticlockwise'),
(14, 'Anticlockwise');

-- --------------------------------------------------------

--
-- Table structure for table `Floors`
--

CREATE TABLE `Floors` (
  `idFloor` int(10) NOT NULL,
  `FloorPrice` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Floors`
--

INSERT INTO `Floors` (`idFloor`, `FloorPrice`) VALUES
(1, 11),
(2, 13),
(3, 15);

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `idPayment` int(100) NOT NULL,
  `ticketID` int(250) NOT NULL,
  `userID` int(250) NOT NULL,
  `AccountName` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `AccountID` int(100) NOT NULL,
  `AccountBank` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `AccountCVV` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Payment`
--

INSERT INTO `Payment` (`idPayment`, `ticketID`, `userID`, `AccountName`, `AccountID`, `AccountBank`, `AccountCVV`) VALUES
(1, 1, 4, 'a01', 1, 'hogwarts', 1),
(2, 2, 4, 'a03', 3, 'hogwarts', 3),
(3, 3, 4, 'a04', 4, 'gringotts', 4),
(4, 4, 4, 'a05', 5, 'hogwarts', 5),
(5, 5, 4, 'a09', 9, 'gringotts', 9),
(6, 6, 4, 'a08', 8, 'hogwarts', 8),
(7, 7, 4, 'a09', 9, 'gringotts', 9),
(8, 8, 4, 'a10', 10, 'hogwarts', 10),
(9, 9, 4, 'a11', 11, 'gringotts', 11),
(10, 10, 4, 'a12', 12, 'hogwarts', 12),
(11, 11, 4, 'a13', 13, 'gringotts', 13),
(12, 12, 4, 'a14', 14, 'hogwarts', 14),
(13, 13, 4, 'a16', 16, 'gringotts', 16),
(14, 14, 4, 'a17', 17, 'hogwarts', 17),
(15, 15, 4, 'a19', 19, 'hogwarts', 19),
(16, 16, 4, 'a20', 20, 'gringotts', 20),
(17, 17, 4, 'a01', 1, 'hogwarts', 1),
(18, 18, 4, 'a21', 21, 'gringotts', 21),
(19, 19, 4, 'a22', 22, 'hogwarts', 22),
(20, 20, 4, 'a23', 23, 'gringotts', 23),
(21, 21, 6, 'Hongsapat', 1234567, 'hogwarts', 132),
(22, 22, 4, 'a15', 3, 'hogwarts', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Routes`
--

CREATE TABLE `Routes` (
  `idRoute` int(100) NOT NULL,
  `RouteName` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `idOStation` int(100) NOT NULL,
  `idDStation` int(100) NOT NULL,
  `busID` int(10) NOT NULL,
  `DTime` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `ETA` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `RoutePrice` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Routes`
--

INSERT INTO `Routes` (`idRoute`, `RouteName`, `idOStation`, `idDStation`, `busID`, `DTime`, `ETA`, `RoutePrice`) VALUES
(0, 'Example', 3, 3, 2, '05:00', '09:00', 700),
(1, 'Hogwart Express', 1, 2, 1, '06:00', '08:00', 11),
(2, 'Hogwarts Express', 1, 2, 8, '11:30', '21:05', 59),
(3, 'Be Ready for School', 1, 3, 1, '06:00', '08:30', 14),
(4, 'Be Ready for School', 1, 3, 8, '11:30', '20:35', 56),
(5, 'Christmas at Weasley\'s', 1, 4, 1, '06:00', '11:00', 30),
(6, 'Christmas at Weasley\'s', 1, 4, 8, '11:30', '18:05', 40),
(7, 'Train to Nightmare', 1, 5, 1, '06:00', '14:00', 50),
(8, 'Train to Nightmare', 1, 5, 8, '11:30', '15:05', 20),
(9, 'Back to the Birth Place', 1, 6, 1, '06:00', '15:30', 55),
(10, 'Hogwarts\' Field Trip', 1, 6, 8, '11:30', '13:35', 15),
(11, 'Please, Professor', 1, 7, 1, '06:00', '17:30', 69),
(12, 'Please, Professor', 1, 7, 8, '11:30', '11:35', 1),
(13, 'Hogwarts Express', 2, 1, 2, '06:00', '15:35', 59),
(14, 'Hogwarts Express', 2, 1, 9, '11:30', '13:30', 11),
(15, 'Oh! I Forgot Sth', 2, 3, 2, '06:00', '06:30', 3),
(16, 'Oh! I Forgot Sth', 2, 3, 9, '11:30', '22:35', 67),
(17, 'To Ron\'s', 2, 4, 2, '06:00', '09:00', 19),
(18, 'To Ron\'s', 2, 4, 9, '11:30', '20:05', 51),
(19, 'Train to Hell', 2, 5, 2, '06:00', '12:00', 39),
(20, 'Train to Hell', 2, 5, 9, '11:30', '17:05', 31),
(21, 'Mom!', 2, 6, 2, '06:00', '13:30', 44),
(22, 'Mom!', 2, 6, 9, '11:30', '13:35', 26),
(23, 'Trick or Treat', 2, 7, 2, '06:00', '15:30', 58),
(24, 'Trick or Treat', 2, 7, 9, '11:30', '13:35', 12),
(25, 'I am Late!', 3, 1, 3, '06:00', '15:05', 56),
(26, 'I am Late!', 3, 1, 10, '11:30', '13:00', 14),
(27, 'Where is My Ticket?', 3, 2, 3, '06:00', '13:35', 67),
(28, 'Where is My Ticket?', 3, 2, 10, '11:30', '12:00', 3),
(29, 'My Pocket is Empty', 3, 4, 3, '06:00', '08:30', 16),
(30, 'My Pocket is Empty', 3, 4, 10, '11:30', '20:35', 54),
(31, 'Hell Again', 3, 5, 3, '06:00', '11:30', 36),
(32, 'Hell Again', 3, 5, 10, '11:30', '17:35', 34),
(33, 'Bagshot\'s Home Tour', 3, 6, 3, '06:00', '13:00', 41),
(34, 'Bagshot\'s Home Tour', 3, 6, 10, '11:30', '16:05', 29),
(35, 'Shops to Shops', 3, 7, 3, '06:00', '15:35', 55),
(36, 'Shops to Shops', 3, 7, 10, '11:30', '14:05', 15),
(37, 'We\'ll Bring You Straight Back Home!', 4, 1, 4, '06:00', '12:35', 40),
(38, 'We\'ll Bring You Straight Back Home!', 4, 1, 11, '11:30', '16:30', 30),
(39, 'We Won\'t Be Late', 4, 2, 4, '06:00', '14:35', 51),
(40, 'We Won\'t Be Late', 4, 2, 11, '11:30', '14:30', 19),
(41, 'We Can Get Your School Stuffs there', 4, 3, 4, '06:00', '15:05', 54),
(42, 'We Can Get Your School Stuffs there', 4, 3, 11, '11:30', '14:00', 16),
(43, 'Time to Go Hell', 4, 5, 4, '06:00', '09:00', 20),
(44, 'Time to Go Hell', 4, 5, 11, '11:30', '20:05', 50),
(45, 'To Potter\'s', 4, 6, 4, '06:00', '10:30', 25),
(46, 'To Potter\'s', 4, 6, 11, '11:30', '16:35', 45),
(47, 'Sneaking Mom', 4, 7, 4, '06:00', '12:30', 39),
(48, 'Sneaking Mom', 4, 7, 11, '11:30', '16:35', 31),
(49, 'Direct to School', 5, 1, 5, '06:00', '09:35', 20),
(50, 'Direct to School', 5, 1, 12, '11:30', '19:30', 50),
(51, 'To Platform 9 3/4', 5, 2, 5, '06:00', '11:35', 31),
(52, 'To Platform 9 3/4', 5, 2, 12, '11:30', '17:30', 39),
(53, 'You are a Wizard, Harry', 5, 3, 5, '06:00', '12:05', 34),
(54, 'You are a Wizard, Harry', 5, 3, 12, '11:30', '17:00', 36),
(55, 'It\'s Not Much But It\'s Home', 5, 4, 5, '06:00', '14:35', 50),
(56, 'It\'s Not Much But It\'s Home', 5, 4, 12, '11:30', '14:30', 20),
(57, 'Hell to Home', 5, 6, 5, '06:00', '07:30', 5),
(58, 'Hell to Home', 5, 6, 12, '11:30', '19:35', 64),
(59, 'Get a Treat', 5, 7, 5, '06:00', '09:30', 19),
(60, 'Get a Treat', 5, 7, 12, '11:30', '19:35', 51),
(61, 'Wizarding History Tour', 6, 1, 6, '06:00', '08:05', 15),
(62, 'Wizarding History Tour', 6, 1, 13, '11:30', '21:00', 55),
(63, 'Albus to School', 6, 2, 6, '06:00', '10:05', 26),
(64, 'Albus to School', 6, 2, 13, '11:30', '19:00', 44),
(65, 'Madam\'s Shopping', 6, 3, 6, '06:00', '10:35', 34),
(66, 'Madam\'s Shopping', 6, 3, 13, '11:30', '18:30', 41),
(67, 'Family Visiting', 6, 4, 6, '06:00', '11:05', 50),
(68, 'Family Visiting', 6, 4, 13, '11:30', '16:00', 25),
(69, 'Harry\'s Trip', 6, 5, 6, '06:00', '14:05', 70),
(70, 'Harry\'s Trip', 6, 5, 13, '11:30', '13:00', 5),
(71, 'Wizarding Village Tour', 6, 7, 6, '06:00', '08:00', 14),
(72, 'Wizarding Village Tour', 6, 7, 13, '11:30', '21:05', 56),
(73, 'Weekend is Over', 7, 1, 7, '06:00', '06:05', 1),
(74, 'Weekend is Over', 7, 1, 14, '11:30', '23:00', 69),
(75, 'Let\'s Do Some Muggle Business', 7, 2, 7, '06:00', '08:05', 12),
(76, 'Let\'s Do Some Muggle Business', 7, 2, 14, '11:30', '21:00', 58),
(77, 'Shops to Shops', 7, 3, 7, '06:00', '08:35', 15),
(78, 'Shops to Shops', 7, 3, 14, '11:30', '20:30', 55),
(79, 'Let\'s Get Home Before Mom Knows', 7, 4, 7, '06:00', '11:05', 31),
(80, 'Let\'s Get Home Before Mom Knows', 7, 4, 14, '11:30', '18:00', 39),
(81, 'Hide That Zonko\'s', 7, 5, 7, '06:00', '14:05', 51),
(82, 'Hide That Zonko\'s', 7, 5, 14, '11:30', '15:00', 19),
(83, 'Village to Village', 7, 6, 7, '06:00', '15:35', 56),
(84, 'Village to Village', 7, 6, 14, '11:30', '13:30', 14),
(85, 'Hogwarts Round Trip', 1, 1, 1, '06:00', '17:35', 70),
(86, 'Hogwarts Round Trip', 1, 1, 8, '11:30', '23:05', 70),
(87, 'Kings Cross Station Round Trip', 2, 2, 2, '06:00', '17:35', 70),
(88, 'Kings Cross Station Round Trip', 2, 2, 9, '11:30', '23:05', 70),
(89, 'Diagon Alley Round Trip', 3, 3, 3, '06:00', '17:35', 70),
(90, 'Diagon Alley Round Trip', 3, 3, 10, '11:30', '23:05', 70),
(91, 'The Burrow Round Trip', 4, 4, 4, '06:00', '17:35', 70),
(92, 'The Burrow Round Trip', 4, 4, 11, '11:30', '23:05', 70),
(93, 'Number 4, Privet Drive Round Trip', 5, 5, 5, '06:00', '17:35', 70),
(94, 'Number 4, Privet Drive Round Trip', 5, 5, 12, '11:30', '23:05', 70),
(95, 'Godrics Hollow Round Trip', 6, 6, 6, '06:00', '17:35', 70),
(96, 'Godrics Hollow Round Trip', 6, 6, 13, '11:30', '23:05', 70),
(97, 'Hogsmeade Village Round Trip', 7, 7, 7, '06:00', '17:35', 70),
(98, 'Hogsmeade Village Round Trip', 7, 7, 14, '11:30', '23:05', 70);

-- --------------------------------------------------------

--
-- Table structure for table `Station`
--

CREATE TABLE `Station` (
  `idStation` int(100) NOT NULL,
  `StationName` varchar(250) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Station`
--

INSERT INTO `Station` (`idStation`, `StationName`) VALUES
(1, 'Hogwarts'),
(2, 'Kings Cross Station'),
(3, 'Diagon Alley'),
(4, 'The Burrow'),
(5, 'Number 4, Privet Drive'),
(6, 'Godrics Hollow'),
(7, 'Hogsmeade');

-- --------------------------------------------------------

--
-- Table structure for table `Ticket`
--

CREATE TABLE `Ticket` (
  `idTicket` int(250) NOT NULL,
  `idUser` int(250) NOT NULL,
  `DepartureDate` date NOT NULL,
  `Bus` int(10) NOT NULL,
  `idBed` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `idRoute` int(100) NOT NULL,
  `HotWaterBottle` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `Toothpaste` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `TotalPrice` int(100) NOT NULL,
  `BookingStatus` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `BedStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Ticket`
--

INSERT INTO `Ticket` (`idTicket`, `idUser`, `DepartureDate`, `Bus`, `idBed`, `idRoute`, `HotWaterBottle`, `Toothpaste`, `TotalPrice`, `BookingStatus`, `BedStatus`) VALUES
(1, 4, '2021-11-23', 1, 'C5', 5, 'Yellow', 'Blue', 45, 'Your payment is confirmed', 0),
(2, 6, '2021-11-23', 1, 'C3', 3, 'Yellow', 'Green', 29, 'Wait for payment Confirmation', 0),
(3, 4, '2021-11-23', 5, 'C4', 59, 'Blue', 'Purple', 34, 'Wait for payment Confirmation', 0),
(4, 4, '2021-11-23', 10, 'C4', 32, 'Green', 'Yellow', 49, 'Wait for payment Confirmation', 0),
(5, 4, '2021-11-23', 1, 'C2', 5, 'Blue', 'Green', 45, 'Wait for payment Confirmation', 0),
(6, 4, '2021-11-23', 2, 'C3', 15, 'Yellow', 'Green', 18, 'Wait for payment Confirmation', 0),
(7, 6, '2021-11-24', 10, 'C4', 34, 'Blue', 'Green', 44, 'Wait for payment Confirmation', 0),
(8, 6, '2021-11-10', 4, 'C5', 43, 'Blue', 'Green', 35, 'Wait for payment Confirmation', 0),
(9, 4, '2021-11-24', 5, 'C3', 57, 'Blue', 'Green', 20, 'Wait for payment Confirmation', 0),
(10, 4, '2021-11-23', 13, 'C2', 72, 'Yellow', 'Green', 71, 'Wait for payment Confirmation', 0),
(11, 6, '2021-11-23', 7, 'C4', 73, 'Yellow', 'Yellow', 16, 'Wait for payment Confirmation', 0),
(12, 6, '2021-11-23', 2, 'C1', 15, 'Blue', 'Purple', 18, 'Wait for payment Confirmation', 0),
(13, 4, '2021-11-23', 1, 'C3', 9, 'Yellow', 'Green', 70, 'Wait for payment Confirmation', 0),
(14, 4, '2021-11-23', 2, 'B3', 21, 'None', 'None', 57, 'Wait for payment Confirmation', 0),
(15, 4, '2021-11-23', 3, 'C4', 31, 'Blue', 'Blue', 51, 'Wait for payment Confirmation', 0),
(16, 6, '2021-12-09', 8, 'A4', 10, 'None', 'None', 26, 'Wait for payment Confirmation', 0),
(17, 6, '2021-11-23', 2, 'B5', 87, 'None', 'None', 83, 'Wait for payment Confirmation', 0),
(18, 4, '2021-11-23', 1, 'B5', 3, 'None', 'None', 27, 'Wait for payment Confirmation', 0),
(19, 4, '2021-11-23', 1, 'C1', 3, 'Blue', 'Green', 29, 'Wait for payment Confirmation', 0),
(20, 6, '2021-11-17', 12, 'A2', 52, 'None', 'None', 50, 'Wait for payment Confirmation', 0),
(21, 6, '2021-11-18', 1, 'C3', 1, 'Blue', 'Yellow', 26, 'Wait for payment Confirmation', 0),
(22, 4, '2021-11-18', 2, 'A3', 19, 'None', 'None', 50, 'Wait for payment Confirmation', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(250) NOT NULL,
  `username` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `upassword` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `cpassword` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `FName` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `LName` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `uaddress` varchar(250) CHARACTER SET utf8mb4 NOT NULL,
  `gender` varchar(45) CHARACTER SET utf8mb4 NOT NULL,
  `DOB` date NOT NULL,
  `urole` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `username`, `upassword`, `cpassword`, `FName`, `LName`, `email`, `uaddress`, `gender`, `DOB`, `urole`) VALUES
(1, 'admin1', 'admin123', 'admin123', 'Fifee', 'Granger', 'fifee@hogwarts.com', 'Thailand', 'Female', '2021-11-09', 'Admin'),
(2, 'admin2', 'admin123', 'admin123', 'drttdt', 'rcgcc', 'tdyy', 'tdtrd', 'Male', '2021-10-29', 'Admin'),
(3, 'admin3', 'admin123', 'admin123', 'Hongsapatara', 'Thippayapokin', 'admin3@knightbus.com', 'Hogwarts', 'Female', '2000-08-05', 'Admin'),
(4, 'kiwewi', 'kiwewi1234', 'kiwewi1234', 'Kiwi', 'Potter', 'kiwi@potter.com', 'Number 4, Privet Drive, Little Whinging, Surrey', 'Female', '2000-12-15', 'User'),
(5, 'RewTnd', '123456', '123456', 'Thanadon', 'Pitakwarin', '123456@gmail.com', '22/12 London', 'Male', '2021-10-01', 'User'),
(6, 'eeaarrtthhisme', '1234', '1234', 'Earth', 'Potter', 'earthongsapat@gmail.com', 'Number 4, Privet', 'Female', '2021-10-07', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Bed`
--
ALTER TABLE `Bed`
  ADD PRIMARY KEY (`idBed`),
  ADD KEY `idFloor` (`idFloor`),
  ADD KEY `idBedType` (`idBedType`);

--
-- Indexes for table `BedType`
--
ALTER TABLE `BedType`
  ADD PRIMARY KEY (`idBedType`);

--
-- Indexes for table `Bus`
--
ALTER TABLE `Bus`
  ADD PRIMARY KEY (`idBus`);

--
-- Indexes for table `Floors`
--
ALTER TABLE `Floors`
  ADD PRIMARY KEY (`idFloor`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`idPayment`),
  ADD KEY `User` (`userID`),
  ADD KEY `ticketID` (`ticketID`);

--
-- Indexes for table `Routes`
--
ALTER TABLE `Routes`
  ADD PRIMARY KEY (`idRoute`),
  ADD KEY `idStation1` (`idOStation`),
  ADD KEY `idStation2` (`idDStation`),
  ADD KEY `idBus` (`busID`);

--
-- Indexes for table `Station`
--
ALTER TABLE `Station`
  ADD PRIMARY KEY (`idStation`);

--
-- Indexes for table `Ticket`
--
ALTER TABLE `Ticket`
  ADD PRIMARY KEY (`idTicket`),
  ADD KEY `idBed` (`idBed`),
  ADD KEY `idRoute` (`idRoute`),
  ADD KEY `BusNumber` (`Bus`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Bed`
--
ALTER TABLE `Bed`
  ADD CONSTRAINT `idBedType` FOREIGN KEY (`idBedType`) REFERENCES `BedType` (`idBedType`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idFloor` FOREIGN KEY (`idFloor`) REFERENCES `Floors` (`idFloor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Payment`
--
ALTER TABLE `Payment`
  ADD CONSTRAINT `ticketID` FOREIGN KEY (`ticketID`) REFERENCES `Ticket` (`idTicket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userID` FOREIGN KEY (`userID`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Routes`
--
ALTER TABLE `Routes`
  ADD CONSTRAINT `idBus` FOREIGN KEY (`busID`) REFERENCES `Bus` (`idBus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idStation1` FOREIGN KEY (`idOStation`) REFERENCES `Station` (`idStation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idStation2` FOREIGN KEY (`idDStation`) REFERENCES `Station` (`idStation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Ticket`
--
ALTER TABLE `Ticket`
  ADD CONSTRAINT `Bus` FOREIGN KEY (`Bus`) REFERENCES `Bus` (`idBus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idBed` FOREIGN KEY (`idBed`) REFERENCES `Bed` (`idBed`) ON DELETE CASCADE,
  ADD CONSTRAINT `idRoute` FOREIGN KEY (`idRoute`) REFERENCES `Routes` (`idRoute`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idUser` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
