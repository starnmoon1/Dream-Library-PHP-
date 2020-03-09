-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 16, 2020 at 05:46 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Manage_Library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookCode` int(11) NOT NULL,
  `bookName` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `authorName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryCode` int(11) NOT NULL,
  `publishingName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publishingYear` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `bookImage` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookCode`, `bookName`, `authorName`, `categoryCode`, `publishingName`, `publishingYear`, `description`, `bookImage`) VALUES
(1, 'Khoa hoc va doi song', '1', 6, '1', 1972, 'Su thu vi cua Khoa hoc trong doi song', 'https://znews-photo.zadn.vn/w1024/Uploaded/kbd_bcvi/2019_11_23/5d828d976f24eb1a752053b5.jpg'),
(4, 'Đừng bao giờ đi ăn một mình', '1', 3, '1', 2020, 'qua hay ', 'https://katherineannehayes.files.wordpress.com/2015/07/img_0858.jpg'),
(6, 'Hay Quá', 'Việt', 6, 'Kim Đồng', 2020, 'hay thật', 'https://i.pinimg.com/originals/72/c0/d8/72c0d848df6794f97a166dbcbfee5e92.jpg'),
(7, '2', '2', 1, '2', 2, '2', 'https://i.pinimg.com/originals/af/46/e3/af46e3c4694d8b61753011d32fcc75d3.jpg'),
(8, 'Ngon', 'Hà Nội', 1, 'Việt Nam', 1990, 'Hay', 'https://i.ytimg.com/vi/6lt2JfJdGSY/maxresdefault.jpg'),
(9, '3', '3', 1, '3', 3, '3', 'https://addons-media.operacdn.com/media/CACHE/images/themes/05/126105/1.0-rev1/images/d197fa99-897f-46a6-954e-c6f852179897/7eaf8a54a1a9a12b0f383fdb050ae52c.jpg'),
(10, '5', '5', 4, '5', 5, '5', 'user.jpeg'),
(11, '6', '6', 1, '6', 6, '6', 'user.jpeg'),
(12, '8', '8', 3, '8', 8, '8', 'user.jpeg'),
(13, '6', 'Hà Nội', 1, '3', 3, '3', 'user.jpeg'),
(14, 'v', 'v', 1, 'v', 2019, 'aaaaa', 'user.jpeg'),
(15, '3', '3', 1, '3', 3, '2', 'book.jpeg'),
(16, 'Ngon', 'NG', 5, 'NG', 1992, 'ha noi', 'book.jpeg'),
(17, '2', 'Hà Nội', 7, 'Việt Nam', 3, '2', 'book.jpeg'),
(18, 'Ngon', 'Hà Nội', 1, 'LOng', 2019, 'hay quá', 'book.jpeg'),
(19, 'Hoàn đẹp rai', 'Hà Nội', 3, 'Việt Nam', 2, '2', 'book.jpeg'),
(20, '4', '4', 1, '4', 4, '4', 'book.jpeg'),
(21, '4', '4', 1, '4', 4, '4', 'book.jpeg'),
(22, '3', '3', 1, '3', 3, '3', 'book.jpeg'),
(23, '2', '2', 1, '2', 2, '2', 'book.jpeg'),
(24, 'Ngon', 'Hà Nội', 1, 'Việt Nam', 123, '123', 'book.jpeg'),
(25, '12', '12', 1, '12', 12, '12', 'book.jpeg'),
(26, '12', '12', 1, '12', 12, '12', 'book.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrowCode` int(11) NOT NULL,
  `userCode` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `borrowDate` date NOT NULL,
  `deadlineDay` date DEFAULT NULL,
  `bookCode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrowCode`, `userCode`, `borrowDate`, `deadlineDay`, `bookCode`) VALUES
(8, '1', '2019-10-20', '2020-01-24', 1),
(19, '3', '1010-10-10', '1011-10-10', 4),
(23, '3', '2020-01-22', '2020-01-22', 4);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryCode` int(11) NOT NULL,
  `categoryName` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryCode`, `categoryName`) VALUES
(1, 'Công nghệ thông tin'),
(2, 'Kinh doanh'),
(3, 'Truyện tranh'),
(4, 'Tiếng Anh'),
(5, 'Tiểu thuyết'),
(6, 'Khoa học'),
(7, 'Thé giới động vật');

-- --------------------------------------------------------

--
-- Table structure for table `returnTicket`
--

CREATE TABLE `returnTicket` (
  `borrowCode` int(11) NOT NULL,
  `bookCode` int(11) NOT NULL,
  `note` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `returnDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `returnTicket`
--

INSERT INTO `returnTicket` (`borrowCode`, `bookCode`, `note`, `status`, `returnDate`) VALUES
(1, 1, 'muon trong thang', 1, '2020-01-24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userCode` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `startDay` date NOT NULL,
  `endDay` date NOT NULL,
  `userName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userCode`, `startDay`, `endDay`, `userName`, `address`, `phone`) VALUES
('1', '2020-01-02', '2020-01-31', 'Long', 'Hà Nội', 363632105),
('2', '2020-01-01', '2020-01-31', 'Hoàn', 'Hà Nội 2', 363632105),
('3', '2020-01-01', '2020-02-01', 'Thắng', 'Nam Định', 90302519),
('CGM01', '2020-01-08', '2020-01-24', 'Trần Anh Tuấn', 'Nam Định', 12346789);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookCode`),
  ADD KEY `authorCode` (`authorName`),
  ADD KEY `categoryCode` (`categoryCode`),
  ADD KEY `publishingCode` (`publishingName`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrowCode`),
  ADD KEY `cardCode` (`userCode`),
  ADD KEY `bookCode` (`bookCode`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryCode`);

--
-- Indexes for table `returnTicket`
--
ALTER TABLE `returnTicket`
  ADD PRIMARY KEY (`borrowCode`),
  ADD KEY `bookCode` (`bookCode`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrowCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `returnTicket`
--
ALTER TABLE `returnTicket`
  MODIFY `borrowCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`categoryCode`) REFERENCES `categories` (`categoryCode`);

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_2` FOREIGN KEY (`bookCode`) REFERENCES `books` (`bookCode`),
  ADD CONSTRAINT `borrow_ibfk_3` FOREIGN KEY (`userCode`) REFERENCES `user` (`userCode`);

--
-- Constraints for table `returnTicket`
--
ALTER TABLE `returnTicket`
  ADD CONSTRAINT `returnTicket_ibfk_1` FOREIGN KEY (`bookCode`) REFERENCES `books` (`bookCode`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
