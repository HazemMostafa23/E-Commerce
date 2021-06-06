-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2021 at 08:53 PM
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
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Age` int(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `sQuestion` varchar(256) NOT NULL,
  `sAnswer` varchar(5000) NOT NULL,
  `Role` int(11) NOT NULL,
  `Survey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`ID`, `Name`, `Email`, `Password`, `Age`, `Image`, `sQuestion`, `sAnswer`, `Role`, `Survey`) VALUES
(1, 'Admin', 'admin@gmail.com', 'Admin@123', 20, 'user.jpeg', 'What\'s your grandfather name?', 'admin', 2, 0),
(2, 'Admin2', 'admin2@gmail.com', 'Admin@123', 20, 'user.jpeg', 'What\'s your sons name?', 'admin', 2, 0),
(3, 'HR', 'hr@gmail.com', 'Admin@123', 20, 'user.jpeg', 'Where did you travel in twenty eighteen?', 'Egypt', 3, 0),
(4, 'Auditor', 'auditor@gmail.com', 'Auditor@123', 20, 'user.jpeg', 'Where is London located?', 'England', 4, 0),
(5, 'Mostafa', 'mostafa@gmail.com', 'Mostafa@123', 20, 'adham.jpeg', 'Where did you go to college?', 'MIU', 1, 0),
(6, 'Hazem', 'hazem@gmail.com', 'Hazem@123', 20, 'user.jpeg', 'Where did you go to college?', 'MIU', 1, 0),
(7, 'Mohamed', 'mohamed@gmail.com', 'Mohamed@123', 20, 'adham.jpg', 'Where did you go to college?', 'MIU', 1, 0),
(18, 'Hany', 'Hany@gmail.com', 'AdmiN@123', 21, 'user.jpeg', 'What is your second name?', 'Hany', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `ID` int(11) NOT NULL,
  `Message` varchar(256) NOT NULL,
  `UID` int(11) NOT NULL,
  `MID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`ID`, `Message`, `UID`, `MID`) VALUES
(2, 'Hi', 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) NOT NULL,
  `AID` int(11) NOT NULL,
  `CHID` int(11) NOT NULL,
  `MID` int(11) NOT NULL,
  `Comment` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `ID` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `AID` int(11) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Complaint` varchar(256) NOT NULL,
  `Reply` varchar(256) NOT NULL,
  `Image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`ID`, `UID`, `AID`, `Name`, `Complaint`, `Reply`, `Image`) VALUES
(1, 4, 1, 'admin1', 'This admin misabused his power', 'we will see', 'negx.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Complain` varchar(10000) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  `Reply` varchar(5000) NOT NULL,
  `CID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `formresponses`
--

CREATE TABLE `formresponses` (
  `CID` int(11) NOT NULL,
  `QID` int(11) NOT NULL,
  `Response` varchar(5000) NOT NULL,
  `FID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `ID` int(11) NOT NULL,
  `AID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`ID`, `AID`) VALUES
(1, 4),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `formsquestions`
--

CREATE TABLE `formsquestions` (
  `ID` int(11) NOT NULL,
  `Question` varchar(256) NOT NULL,
  `QID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `formsquestions`
--

INSERT INTO `formsquestions` (`ID`, `Question`, `QID`) VALUES
(1, 'Did you not find a product that you were looking for?', 1),
(1, 'Are you happy with our service?', 2),
(1, 'Did you like our website?', 3),
(2, 'What about your order?', 4),
(2, 'Is it good?', 5);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `ID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `AID` int(11) NOT NULL,
  `Title` varchar(256) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`ID`, `CID`, `AID`, `Title`, `Status`) VALUES
(2, 7, 0, 'I want to talk with admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderedproducts`
--

CREATE TABLE `orderedproducts` (
  `ID` int(11) NOT NULL,
  `Product` varchar(256) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Size` varchar(256) NOT NULL,
  `Price` int(11) NOT NULL,
  `PID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderedproducts`
--

INSERT INTO `orderedproducts` (`ID`, `Product`, `Quantity`, `Size`, `Price`, `PID`) VALUES
(2, 'Air Max Viva', 3, '38', 1800, 2),
(2, 'OLD SKOOL PRO\r\n', 2, '37', 1500, 4),
(3, 'OLD SKOOL PRO\r\n', 2, '37', 1500, 4),
(4, 'AE Super Soft Color-Block T-Shirt', 3, 'Large', 200, 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Amount` int(11) NOT NULL,
  `CID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `Email`, `Amount`, `CID`) VALUES
(2, 'mohamed@gmail.com', 8400, 7),
(3, 'mohamed@gmail.com', 3000, 7),
(4, 'hazem@gmail.com', 600, 6);

-- --------------------------------------------------------

--
-- Table structure for table `penalties`
--

CREATE TABLE `penalties` (
  `ID` int(11) NOT NULL,
  `HRID` int(11) NOT NULL,
  `AID` int(11) NOT NULL,
  `Reason` varchar(256) NOT NULL,
  `Image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penalties`
--

INSERT INTO `penalties` (`ID`, `HRID`, `AID`, `Reason`, `Image`) VALUES
(1, 3, 1, 'bad attidute', 'negx.jpg'),
(2, 3, 2, 'bad attidute', 'Free_Sample_By_Wix.jfif'),
(3, 3, 2, 'Bad attitude ', 'negx.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Price` int(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `maCategory` varchar(11) NOT NULL,
  `miCategory` varchar(11) NOT NULL,
  `Color` varchar(256) NOT NULL,
  `Brand` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `Name`, `Description`, `Price`, `Quantity`, `Image`, `maCategory`, `miCategory`, `Color`, `Brand`) VALUES
(1, 'Air Max 270 ', 'Men\'s Shoes', 1500, 150, 'shoe1.jpg', 'Men', 'Shoes', 'Black', 'Nike'),
(2, 'Air Max Viva', 'Women\'s shoes', 1800, 150, 'shoe2.jpg', 'Women', 'Shoes', 'Pink', 'Nike'),
(3, 'POP ULTRARANGE EXO\r\n', 'Women Street Wear', 1500, 200, 'shoe4.png', 'Women', 'Shoes', 'Black/Pink', 'Vans'),
(4, 'OLD SKOOL PRO\r\n', 'Street Wear', 1500, 150, 'shoe3.png', 'Men', 'Shoes', 'Black', 'Vans'),
(5, 'KIDS CHECK BUMPER OLD SKOOL\r\n', 'Kids Wear', 800, 80, 'shoe5.jpg', 'Children', 'Shoes', 'Red', 'Vans'),
(6, 'KIDS SEQUIN PATCH CLASSIC SLIP-ON', 'Kids Wear', 1000, 100, 'shoe6.jpg', 'Children', 'Shoes', 'White', 'Vans'),
(7, 'AE Super Soft Color-Block T-Shirt', 'Men\'s Tshirt', 200, 150, 'mentop1.jpg', 'Men', 'Tops', 'White', 'American Eagle'),
(8, 'AE Super Soft Curved Hem Icon T-Shirt\r\n', 'Men\'s Tshirt', 200, 150, 'mentop2.jpg', 'Men', 'Tops', 'Black', 'American Eagle'),
(9, 'AE Super Soft Icon Tie-Dye T-Shirt\r\n', 'Men\'s Tshirt', 200, 150, 'mentop3.jpg', 'Men', 'Tops', 'White', 'American Eagle'),
(10, 'AE Smocked Square Neck Blouse', 'Women\'s Top', 250, 100, 'womantop1.jpg', 'Women', 'Tops', 'Black', 'American Eagle'),
(11, 'AE Smocked Square Neck Blouse\r\n', 'Women\'s Top', 100, 150, 'womantop2.jpg', 'Women', 'Tops', 'Blue', 'American Eagle'),
(12, 'AE Paisley Midi Kimono\r\n', 'Women\'s Kimono', 280, 100, 'womantop3.jpg', 'Women', 'Tops', 'Pink', 'American Eagle'),
(13, 'PLEATED SLIM PANTS', 'Men Pants', 750, 80, 'manpants1.jpg', 'Men', 'Bottoms', 'Black', 'ZARA'),
(14, 'STRETCH CARGO PANTS\r\n', 'Men Pants', 750, 80, 'manpants2.jpg', 'Men', 'Bottoms', 'Green', 'ZARA'),
(15, 'CROPPED CARGO PANTS', 'Men Pants', 750, 80, 'manpants3.jpg', 'Men', 'Bottoms', 'Black', 'ZARA'),
(16, 'Boy Printed Jogger Trousers\r\n', 'Kids Pants', 150, 100, 'childrenpants1.jpg', 'Children', 'Bottoms', 'Blue', 'Defacto'),
(17, 'Boy Relax Fit Trousers\r\n', 'Kids Pants', 100, 100, 'childrenpants2.jpg', 'Children', 'Bottoms', 'Grey', 'Defacto'),
(19, 'Patterned Tie and Mask Set\r\n', 'Men\'s tie', 50, 25, 'tie.jpg', 'Men', 'Accessoires', 'Blue', 'Defacto'),
(20, '7 Pack Short Socks\r\n', 'women socks', 50, 50, 'socks1.jpg', 'Women', 'Accessoires', '', 'ZARA'),
(21, '5 Pack Jacquard Socks Set\r\n', 'Men\'s Socks', 50, 50, 'socks2.jpg', 'Men', 'Accessoires', '', 'ZARA'),
(22, 'Plaid Patterned Shawl\r\n', 'Women Shawl', 150, 50, 'womenshawl.jpg', 'Women', 'Accessoires', 'Pink', 'H&M');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `ID` int(11) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Review` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`ID`, `Email`, `Rating`, `Review`) VALUES
(3, 'mohamed@gmail.com', 5, 'I like it very much , would recommend'),
(4, 'mohamed@gmail.com', 3, 'good product'),
(2, 'hazem@gmail.com', 4, 'I recommend this.'),
(3, 'hazem@gmail.com', 1, 'very bad product'),
(4, 'hazem@gmail.com', 3, 'Very Nice'),
(6, 'hazem@gmail.com', 3, 'its okay');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `ID` int(11) NOT NULL,
  `Role` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`ID`, `Role`) VALUES
(1, 'Customer'),
(2, 'Administrator'),
(3, 'HR Partner'),
(4, 'Auditor');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `ID` int(11) NOT NULL,
  `Size` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`ID`, `Size`) VALUES
(2, '37'),
(2, '38'),
(2, '39'),
(2, '40'),
(2, '41'),
(2, '42'),
(3, '37'),
(3, '38'),
(3, '39'),
(3, '40'),
(3, '41'),
(3, '42'),
(4, '37'),
(4, '38'),
(4, '39'),
(4, '40'),
(4, '41'),
(4, '42'),
(5, '37'),
(5, '38'),
(5, '39'),
(5, '40'),
(5, '41'),
(5, '42'),
(6, '37'),
(6, '38'),
(6, '39'),
(6, '40'),
(6, '41'),
(6, '42'),
(7, 'Small'),
(7, 'Medium'),
(7, 'Large'),
(7, 'XLarge'),
(7, 'XX'),
(8, 'Small'),
(8, 'Medium'),
(8, 'Large'),
(8, 'XLarge'),
(8, 'XX'),
(9, 'Small'),
(9, 'Medium'),
(9, 'Large'),
(9, 'XLarge'),
(9, 'XX'),
(10, 'Small'),
(10, 'Medium'),
(10, 'Large'),
(10, 'XLarge'),
(10, 'XX'),
(11, 'Small'),
(11, 'Medium'),
(11, 'Large'),
(11, 'XLarge'),
(11, 'XX'),
(12, 'Small'),
(12, 'Medium'),
(12, 'Large'),
(12, 'XLarge'),
(12, 'XX'),
(13, 'Small'),
(13, 'Medium'),
(13, 'Large'),
(13, 'XLarge'),
(13, 'XX'),
(14, 'Small'),
(14, 'Medium'),
(14, 'Large'),
(14, 'XLarge'),
(14, 'XX'),
(15, 'Small'),
(15, 'Medium'),
(15, 'Large'),
(15, 'XLarge'),
(15, 'XX'),
(16, 'XXSmall'),
(16, 'XSmall'),
(16, 'Small'),
(16, 'Medium'),
(17, 'XXSmall'),
(17, 'XSmall'),
(17, 'Small'),
(17, 'Medium'),
(19, 'Small'),
(19, 'Medium'),
(19, 'Large'),
(20, 'Small'),
(20, 'Medium'),
(20, 'Large'),
(21, 'Small'),
(21, 'Medium'),
(21, 'Large'),
(22, 'Small'),
(22, 'Medium'),
(22, 'Large'),
(1, '37'),
(1, '38'),
(1, '37'),
(1, '38'),
(1, '39'),
(1, '40'),
(1, '41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Role` (`Role`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`MID`),
  ADD KEY `ID` (`ID`),
  ADD KEY `UID` (`UID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CHID` (`CHID`,`MID`),
  ADD KEY `MID` (`MID`),
  ADD KEY `AID` (`AID`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UID` (`UID`),
  ADD KEY `AID` (`AID`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CID` (`CID`);

--
-- Indexes for table `formresponses`
--
ALTER TABLE `formresponses`
  ADD KEY `CID` (`CID`,`QID`,`FID`),
  ADD KEY `QID` (`QID`),
  ADD KEY `FID` (`FID`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `AID` (`AID`);

--
-- Indexes for table `formsquestions`
--
ALTER TABLE `formsquestions`
  ADD PRIMARY KEY (`QID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CID` (`CID`);

--
-- Indexes for table `orderedproducts`
--
ALTER TABLE `orderedproducts`
  ADD KEY `ID` (`ID`),
  ADD KEY `PID` (`PID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CID` (`CID`);

--
-- Indexes for table `penalties`
--
ALTER TABLE `penalties`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `HRID` (`HRID`,`AID`),
  ADD KEY `AID` (`AID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD KEY `ID` (`ID`),
  ADD KEY `ID_2` (`ID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `MID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `formsquestions`
--
ALTER TABLE `formsquestions`
  MODIFY `QID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penalties`
--
ALTER TABLE `penalties`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`Role`) REFERENCES `roles` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `messages` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chats_ibfk_2` FOREIGN KEY (`UID`) REFERENCES `accounts` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`CHID`) REFERENCES `messages` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`MID`) REFERENCES `chats` (`MID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`AID`) REFERENCES `accounts` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `accounts` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `complaints_ibfk_2` FOREIGN KEY (`AID`) REFERENCES `accounts` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contactus`
--
ALTER TABLE `contactus`
  ADD CONSTRAINT `contactus_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `accounts` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `formresponses`
--
ALTER TABLE `formresponses`
  ADD CONSTRAINT `formresponses_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `accounts` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formresponses_ibfk_2` FOREIGN KEY (`QID`) REFERENCES `formsquestions` (`QID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formresponses_ibfk_3` FOREIGN KEY (`FID`) REFERENCES `forms` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `forms`
--
ALTER TABLE `forms`
  ADD CONSTRAINT `forms_ibfk_1` FOREIGN KEY (`AID`) REFERENCES `accounts` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `formsquestions`
--
ALTER TABLE `formsquestions`
  ADD CONSTRAINT `formsquestions_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `forms` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `accounts` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderedproducts`
--
ALTER TABLE `orderedproducts`
  ADD CONSTRAINT `orderedproducts_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `orders` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderedproducts_ibfk_2` FOREIGN KEY (`PID`) REFERENCES `products` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `accounts` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penalties`
--
ALTER TABLE `penalties`
  ADD CONSTRAINT `penalties_ibfk_1` FOREIGN KEY (`HRID`) REFERENCES `accounts` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penalties_ibfk_2` FOREIGN KEY (`AID`) REFERENCES `accounts` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `products` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sizes`
--
ALTER TABLE `sizes`
  ADD CONSTRAINT `sizes_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `products` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
