-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2018 at 04:25 PM
-- Server version: 5.6.38
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tqpxgciz_LMDDevelopments`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admins`
--

CREATE TABLE `Admins` (
  `AdminID` int(4) NOT NULL,
  `AdminUsername` varchar(30) NOT NULL,
  `AdminPassID` varchar(50) NOT NULL,
  `AdminFirstName` varchar(30) NOT NULL,
  `AdminLastName` varchar(30) DEFAULT NULL,
  `AdminLevel` int(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admins`
--

INSERT INTO `Admins` (`AdminID`, `AdminUsername`, `AdminPassID`, `AdminFirstName`, `AdminLastName`, `AdminLevel`) VALUES
(1, 'admin2', 'admin2', 'Liam ', 'McDermott', 2),
(4, 'admin', 'admin', 'Liam', 'McDermott', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Area`
--

CREATE TABLE `Area` (
  `AreaID` int(4) NOT NULL,
  `AreaName` varchar(50) DEFAULT NULL,
  `AreaTown` varchar(50) DEFAULT NULL,
  `AreaCounty` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Area`
--

INSERT INTO `Area` (`AreaID`, `AreaName`, `AreaTown`, `AreaCounty`) VALUES
(1, 'St Johns', 'Worcester', 'Worcestershire'),
(2, 'City Centre', 'Worcester', 'Worcestershire'),
(3, 'Birmingham', 'Birmingham', 'West Midlands');

-- --------------------------------------------------------

--
-- Table structure for table `Features`
--

CREATE TABLE `Features` (
  `FeatureID` int(4) NOT NULL,
  `FeatureName` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Features`
--

INSERT INTO `Features` (`FeatureID`, `FeatureName`) VALUES
(1, 'Wooden Floors'),
(2, 'Central Heating'),
(3, 'Basement Room');

-- --------------------------------------------------------

--
-- Table structure for table `Garden`
--

CREATE TABLE `Garden` (
  `GardenID` int(4) NOT NULL,
  `GardenType` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Garden`
--

INSERT INTO `Garden` (`GardenID`, `GardenType`) VALUES
(1, 'Front And Back'),
(2, 'Front'),
(3, 'Back'),
(4, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `House`
--

CREATE TABLE `House` (
  `HouseID` int(4) NOT NULL,
  `AreaID` int(4) DEFAULT NULL,
  `StyleID` int(4) DEFAULT NULL,
  `ParkingTypeID` int(4) DEFAULT NULL,
  `RentalTypeID` int(4) DEFAULT NULL,
  `GardenID` int(4) DEFAULT NULL,
  `HouseAddress` varchar(50) DEFAULT NULL,
  `HousePostcode` varchar(30) DEFAULT NULL,
  `BedroomNo` int(1) DEFAULT NULL,
  `PricePCM` int(4) DEFAULT NULL,
  `HouseDescription` varchar(800) DEFAULT NULL,
  `Latitude` varchar(12) DEFAULT NULL,
  `Longitude` varchar(12) DEFAULT NULL,
  `HouseImageOne` varchar(50) DEFAULT NULL,
  `HouseImageTwo` varchar(50) DEFAULT NULL,
  `HouseImageThree` varchar(50) DEFAULT NULL,
  `HouseImageFour` varchar(50) DEFAULT NULL,
  `HouseImageFive` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `House`
--

INSERT INTO `House` (`HouseID`, `AreaID`, `StyleID`, `ParkingTypeID`, `RentalTypeID`, `GardenID`, `HouseAddress`, `HousePostcode`, `BedroomNo`, `PricePCM`, `HouseDescription`, `Latitude`, `Longitude`, `HouseImageOne`, `HouseImageTwo`, `HouseImageThree`, `HouseImageFour`, `HouseImageFive`) VALUES
(4, 1, 7, 3, 1, 3, '249 Henwick Road', 'WR2 5PG', 7, 500, '7 bedroom student let with communal lounge, kitchen, 2 bathrooms and garden. ', '52.201381', '-2.240277', 'houseImages/249 Henwick 1.JPG', 'houseImages/249 Henwick 2.jpg', 'houseImages/249 Henwick 3.jpg', 'houseImages/249 Henwick 4.jpg', 'houseImages/249 Henwick 5.jpg'),
(5, 1, 7, 3, 1, 1, '251 Henwick Road', 'WR2 5PG', 6, 500, '6 bedroom student let, 2 bathrooms, communal lounge, kitchen and garden. Plenty of on-site parking available.', '52.201411', '-2.240317', 'houseImages/251 Henwick Road 1.JPG', 'houseImages/251 Henwick 2.jpg', 'houseImages/251 Henwick 3.jpg', 'houseImages/251 Henwick 4.jpg', 'houseImages/251 Henwick 5.jpg'),
(6, 2, 3, 4, 1, 3, '30 Fort Royal Hill', 'WR5 1BT', 6, 600, '6 bedroom student let, communal lounge, large kitchen, patio, 2 bathrooms, attic room with ensuite.', '52.187742', '-2.213225', 'houseImages/30 Fort Royal Hill 1.JPG', 'houseImages/30 Fort Royal Hill 2.JPG', 'houseImages/30 Fort Royal Hill 3.JPG', 'houseImages/30 Fort Royal Hill 4.JPG', 'houseImages/30 Fort Royal Hill 5.JPG'),
(8, 2, 4, 4, 1, 3, '2 Lansdowne Terrace', 'WR1 1SR', 6, 400, 'Rent includes all bills as a student let. As a professional let it includes water rates, council tax and internet, with gas and electricity shared.', '52.201615', '-2.219444', 'houseImages/2 Lansdowne 1.JPG', 'houseImages/2 Lansdowne 2.jpg', 'houseImages/2 Lansdowne 3.jpg', 'houseImages/2 Lansdowne 4.jpg', 'houseImages/2 Lansdowne 5.jpg'),
(9, 2, 3, 4, 1, 3, '1 Albert Road', 'WR5 1EB', 5, 600, '5 bedroom, communal lounge, kitchen, 2 bathrooms  and cloakroom, garden.', '52.188551', '-2.208008', 'houseImages/1 Albert 1.JPG', 'houseImages/1 Albert 2.jpg', 'houseImages/1 Albert 3.jpg', 'houseImages/1 Albert 4.jpg', 'houseImages/1 Albert 5.jpg'),
(10, 2, 3, 4, 2, 3, '122 Lansdowne Road', 'WR3 8JL', 6, 700, '6 bedrooms, communal lounge, 2 bathrooms, large kitchen, utility and patio.', '52.20156', ' -2.212243', 'houseImages/122 Lansdowne 1.jpg', 'houseImages/122 Lansdowne 2.jpg', 'houseImages/122 Lansdowne 3.jpg', 'houseImages/122 Lansdowne 4.jpg', 'houseImages/122 Lansdowne 5.jpg'),
(11, 2, 4, 4, 3, 1, '124 Astwood Road', 'WR3 8EZ', 5, 500, '5 bedroom, communal lounge, kitchen, 2 bathrooms, one bedroom with ensuite, extensive gardens, off road parking.', '52.204637', '-2.206907', 'houseImages/124 Astwood 1.jpg', 'houseImages/124 Astwood 2.jpg', 'houseImages/124 Astwood 3.jpg', 'houseImages/124 Astwood 4.jpg', 'houseImages/124 Astwood 5.jpg'),
(12, 2, 3, 4, 2, 3, '26 Barry Street', 'WR1 1NR', 2, 550, '2 bedroom house consisting off open plan lounge/kitchen, double bedroom and bathroom.', '52.199299', '-2.216658', 'houseImages/26 Barry Street 1.jpg', 'houseImages/26 Barry Street 2.jpg', 'houseImages/26 Barry Street 3.jpg', 'houseImages/26 Barry Street 4.jpg', 'houseImages/26 Barry Street 5.jpg'),
(13, 2, 4, 4, 2, 3, '67 The Hill Avenue', 'WR5 2AN', 4, 600, '4 bedroom, 2 reception, kitchen, cloaks, first floor bathroom, attic bedroom with ensuite, off road parking, extensive gardens.', '52.183301', '-2.214645', 'houseImages/67 The Hill 1.jpg', 'houseImages/67 The Hill 2.jpg', 'houseImages/67 The Hill 3.jpg', 'houseImages/67 The Hill 4.jpg', 'houseImages/67 The Hill 5.jpg'),
(14, 2, 1, 5, 3, 3, '27 Park Street', 'WR5 1AD', 7, 550, '7 bedrooms, 2 kitchens, 3 bathrooms, communal gardens.', '52.188894', '-2.214560', 'houseImages/27 Park Street 1.jpg', 'houseImages/27 Park Street 2.jpg', 'houseImages/27 Park Street 3.jpg', 'houseImages/27 Park Street 4.jpg', 'houseImages/27 Park Street 5.jpg'),
(15, 3, 5, 4, 3, 1, '3 Hillaries Road', 'B23 7QP', 4, 650, 'Compromises of ground floor 2 bed flat, first floor studio flat, second floor one bedroom flat, third floor open plan 1 bedroom flat. Off road parking for several cars, large rear garden, communal laundry room.', '52.513871', '-1.852537', 'houseImages/3 Hillaries 1.jpg', 'houseImages/3 Hillaries 2.jpg', 'houseImages/3 Hillaries 3.jpg', 'houseImages/3 Hillaries 4.jpg', 'houseImages/3 Hillaries 5.jpg'),
(16, 3, 4, 5, 3, 3, '15 Oval Road', 'B24 8PN', 6, 650, '6 self contained units, comprising of 2 ground floor studio rooms, 1 bed ground floor flat, 2 first floor studio rooms and 2 bed split level maisonette. Off road parking for several cars, rear patio area and extensive gardens. Sizeable detached storage facility.', '52.512274', '-1.848377', 'houseImages/15 Oval 1.jpg', 'houseImages/15 Oval 2.jpg', 'houseImages/15 Oval 3.jpg', 'houseImages/15 Oval 4.jpg', 'houseImages/15 Oval 5.jpg'),
(17, 2, 3, 5, 3, 3, '83 Woolhope Road', ' WR5 2AR', 6, 500, '6 bedroom Victorian semi, 2 bedrooms with ensuite bathrooms, first floor bathroom, communal lounge, kitchen and cloakroom.', '52.184031', '-2.217076', 'houseImages/83 Woolhope Road 1.jpg', 'houseImages/83 Woolhope Road 2.jpg', 'houseImages/83 Woolhope Road 3.jpg', 'houseImages/83 Woolhope Road 4.jpg', 'houseImages/83 Woolhope Road 5.jpg'),
(18, 2, 4, 4, 3, 3, '69 The Hill Avenue', 'WR5 2AN', 1, 350, 'Off road parking, extensive gardens.', '52.183225', '-2.214713', 'houseImages/69 The Hill 1.jpg', 'houseImages/69 The Hill 2.jpg', 'houseImages/69 The Hill 3.jpg', 'houseImages/69 The HIll 4.jpg', 'houseImages/69 The HIll 5.jpg'),
(21, 2, 4, 4, 1, 3, '10 Southfield Street', 'WR1 1NH', 6, 450, '6 bedroomed house with communal lounge, 2 bathrooms, cloakroom and garden. Easy access to city centre.', '52.196801', '-2.218779', 'houseImages/10 Southfield 1.jpg', 'houseImages/10 Southfield 2.jpg', 'houseImages/10 Southfield 3.jpg', 'houseImages/10 Southfield 4.jpg', 'houseImages/10 Southfield 5.jpg'),
(20, 2, 2, 1, 3, 1, '247 Henwick Road', 'WR2 5PG', 1, 450, '247 Henwick Road, Worcester, WR2 5PG.  Description: 7 bedroom student let with communal lounge, kitchen, 2 bathrooms and garden.  Plenty of on-site parking available.', '52.201340', '-2.240285', 'houseImages/247 Henwick 1.jpg', 'houseImages/247 Henwick 2.jpg', 'houseImages/247 Henwick 3.jpg', 'houseImages/247 Henwick 4.jpg', 'houseImages/247 Henwick 5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `HouseFeatureLink`
--

CREATE TABLE `HouseFeatureLink` (
  `HouseFeatureID` int(4) NOT NULL,
  `FeatureID` int(4) DEFAULT NULL,
  `HouseID` int(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `HouseFeatureLink`
--

INSERT INTO `HouseFeatureLink` (`HouseFeatureID`, `FeatureID`, `HouseID`) VALUES
(10, 2, 6),
(9, 2, 5),
(15, 2, 10),
(8, 2, 4),
(14, 2, 9),
(13, 1, 9),
(12, 2, 8),
(16, 1, 11),
(17, 2, 11),
(18, 1, 12),
(19, 2, 12),
(20, 1, 13),
(21, 2, 13),
(22, 1, 14),
(23, 2, 14),
(24, 2, 15),
(25, 2, 16),
(26, 1, 17),
(27, 2, 17),
(28, 2, 18),
(36, 3, 21),
(35, 2, 21),
(34, 1, 21),
(32, 1, 20),
(33, 2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `ParkingType`
--

CREATE TABLE `ParkingType` (
  `ParkingTypeID` int(4) NOT NULL,
  `ParkingType` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ParkingType`
--

INSERT INTO `ParkingType` (`ParkingTypeID`, `ParkingType`) VALUES
(1, 'Garage And Drive'),
(2, 'Garage'),
(3, 'Drive'),
(4, '1 Parking Space'),
(5, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `RentalType`
--

CREATE TABLE `RentalType` (
  `RentalTypeID` int(4) NOT NULL,
  `RentalType` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `RentalType`
--

INSERT INTO `RentalType` (`RentalTypeID`, `RentalType`) VALUES
(1, 'Student'),
(2, 'Family'),
(3, 'Professional'),
(4, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `Style`
--

CREATE TABLE `Style` (
  `StyleID` int(4) NOT NULL,
  `StyleName` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Style`
--

INSERT INTO `Style` (`StyleID`, `StyleName`) VALUES
(1, 'Flats'),
(2, 'Detached'),
(3, 'Semi-Detached'),
(4, 'Terraced'),
(5, 'End Of Terrace'),
(6, 'Cottage'),
(7, 'Bungalows');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admins`
--
ALTER TABLE `Admins`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `Area`
--
ALTER TABLE `Area`
  ADD PRIMARY KEY (`AreaID`);

--
-- Indexes for table `Features`
--
ALTER TABLE `Features`
  ADD PRIMARY KEY (`FeatureID`);

--
-- Indexes for table `Garden`
--
ALTER TABLE `Garden`
  ADD PRIMARY KEY (`GardenID`);

--
-- Indexes for table `House`
--
ALTER TABLE `House`
  ADD PRIMARY KEY (`HouseID`),
  ADD KEY `area_fk` (`AreaID`),
  ADD KEY `style_fk` (`StyleID`),
  ADD KEY `parking_fk` (`ParkingTypeID`),
  ADD KEY `rental_fk` (`RentalTypeID`),
  ADD KEY `garden_fk` (`GardenID`);

--
-- Indexes for table `HouseFeatureLink`
--
ALTER TABLE `HouseFeatureLink`
  ADD PRIMARY KEY (`HouseFeatureID`),
  ADD KEY `feature_fk` (`FeatureID`),
  ADD KEY `house_fk` (`HouseID`);

--
-- Indexes for table `ParkingType`
--
ALTER TABLE `ParkingType`
  ADD PRIMARY KEY (`ParkingTypeID`);

--
-- Indexes for table `RentalType`
--
ALTER TABLE `RentalType`
  ADD PRIMARY KEY (`RentalTypeID`);

--
-- Indexes for table `Style`
--
ALTER TABLE `Style`
  ADD PRIMARY KEY (`StyleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admins`
--
ALTER TABLE `Admins`
  MODIFY `AdminID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Area`
--
ALTER TABLE `Area`
  MODIFY `AreaID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Features`
--
ALTER TABLE `Features`
  MODIFY `FeatureID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Garden`
--
ALTER TABLE `Garden`
  MODIFY `GardenID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `House`
--
ALTER TABLE `House`
  MODIFY `HouseID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `HouseFeatureLink`
--
ALTER TABLE `HouseFeatureLink`
  MODIFY `HouseFeatureID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `ParkingType`
--
ALTER TABLE `ParkingType`
  MODIFY `ParkingTypeID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `RentalType`
--
ALTER TABLE `RentalType`
  MODIFY `RentalTypeID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Style`
--
ALTER TABLE `Style`
  MODIFY `StyleID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
