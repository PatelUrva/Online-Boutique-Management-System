-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2021 at 12:01 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boutique`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

CREATE TABLE `tblcart` (
  `cart_id` int(11) NOT NULL,
  `Customerid` int(11) NOT NULL,
  `Payable_Amount` double NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcart`
--

INSERT INTO `tblcart` (`cart_id`, `Customerid`, `Payable_Amount`, `status`) VALUES
(1, 3, 8075, 'DEACTIVE'),
(2, 3, 850, 'DEACTIVE'),
(5, 3, 850, 'DEACTIVE'),
(12, 3, 5000, 'DEACTIVE'),
(13, 3, 6500, 'DEACTIVE'),
(18, 3, 10055, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tblcarttransaction`
--

CREATE TABLE `tblcarttransaction` (
  `cart_trans_id` int(11) NOT NULL,
  `cartid` int(11) NOT NULL,
  `Productid` int(11) NOT NULL,
  `Size` varchar(50) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Total_Amount` float NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcarttransaction`
--

INSERT INTO `tblcarttransaction` (`cart_trans_id`, `cartid`, `Productid`, `Size`, `Quantity`, `Total_Amount`, `status`) VALUES
(4, 1, 11, 'L', 1, 4500, 'DEACTIVE'),
(5, 1, 4, 'XS', 1, 3575, 'DEACTIVE'),
(6, 2, 47, 'XS', 1, 850, 'DEACTIVE'),
(15, 5, 16, 'XS', 1, 850, 'DEACTIVE'),
(22, 12, 6, 'L', 1, 5000, 'DEACTIVE'),
(23, 13, 37, 'L', 1, 6500, 'DEACTIVE'),
(28, 18, 42, 'XS', 3, 2550, 'ACTIVE'),
(29, 18, 25, 'S', 1, 6305, 'ACTIVE'),
(30, 18, 19, 'S', 2, 1200, 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `tblcity`
--

CREATE TABLE `tblcity` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcity`
--

INSERT INTO `tblcity` (`city_id`, `city_name`, `state_id`) VALUES
(1, 'Surat', 1),
(2, 'Navsari', 1),
(3, 'Bardoli', 1),
(4, 'Valsad', 1),
(5, 'Ahmedabad', 1),
(6, 'Panaji', 2),
(7, 'Margoa', 2),
(8, 'Jua', 2),
(9, 'Nuvem', 2),
(10, 'Varca', 2),
(11, 'Pune', 3),
(12, 'Nashik', 3),
(13, 'Kohlapur', 3),
(14, 'Nagpur', 3),
(15, 'Thane', 3),
(16, 'Jaipur', 4),
(17, 'Udaipur', 4),
(18, 'Jaisalmer', 4),
(19, 'Jodhpur', 4),
(20, 'Bikaner', 4),
(21, 'Mohali', 5),
(22, 'Ludhiyana', 5),
(23, 'Amritsar', 5),
(24, 'Chandigarh', 5),
(25, 'Patiala', 5),
(26, 'Orlando', 6),
(27, 'Tampa', 6),
(28, 'Naples', 6),
(29, 'Jacksonville', 6),
(30, 'Miami', 6),
(31, 'Detroit', 7),
(32, 'Warren', 7),
(33, 'Lansing', 7),
(34, 'Flint', 7),
(35, 'Grand Rapids', 7),
(36, 'Austin', 8),
(37, 'Dallas', 8),
(38, 'Houston', 8),
(39, 'San Antorio', 8),
(40, 'Waco', 8),
(41, 'Skyline', 9),
(42, 'Spokane', 9),
(43, 'Vancouver', 9),
(44, 'Richland', 9),
(45, 'Pasco', 9),
(46, 'San Diego', 10),
(47, 'San Francisco', 10),
(48, 'Los Angeles', 10),
(49, 'San Jose', 10),
(50, 'Auckland', 10),
(51, 'Monteral', 11),
(52, 'Levis', 11),
(53, 'Laval', 11),
(54, 'Downtown', 11),
(55, 'Gatineau', 11),
(56, 'Toronto', 12),
(57, 'Hamilton', 12),
(58, 'Vaughan', 12),
(59, 'Waterloo', 12),
(60, 'Welland', 12),
(61, 'Brandon', 13),
(62, 'Thompson', 13),
(63, 'Winnipeg', 13),
(64, 'Steinbach', 13),
(65, 'Dauphin', 13),
(66, 'Edmonton', 14),
(67, 'Calgary', 14),
(68, 'Camrose', 14),
(69, 'Cold Lake', 14),
(70, 'Beaumont', 14),
(71, 'Dawson', 15),
(72, 'Watson Lake', 15),
(73, 'Whitehorse', 15),
(74, 'Teslin', 15),
(75, 'Mayo', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tblcolor`
--

CREATE TABLE `tblcolor` (
  `id` int(11) NOT NULL,
  `c_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcolor`
--

INSERT INTO `tblcolor` (`id`, `c_name`) VALUES
(1, 'Black'),
(2, 'Blue'),
(17, 'Brown'),
(22, 'Copper'),
(24, 'Cream'),
(14, 'Dark Green'),
(20, 'Golden'),
(10, 'Gray'),
(3, 'Green'),
(18, 'Magenta'),
(12, 'Maroon'),
(11, 'Mustard'),
(25, 'Mutli Color'),
(4, 'Navy Blue'),
(23, 'Nude'),
(9, 'Off-White'),
(13, 'Orange'),
(16, 'Paroot'),
(15, 'Peech'),
(5, 'Pink'),
(19, 'Purple'),
(7, 'Red'),
(21, 'Silver'),
(8, 'White'),
(6, 'Yellow');

-- --------------------------------------------------------

--
-- Table structure for table `tblcountry`
--

CREATE TABLE `tblcountry` (
  `c_id` int(11) NOT NULL,
  `country_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcountry`
--

INSERT INTO `tblcountry` (`c_id`, `country_name`) VALUES
(1, 'India'),
(2, 'America'),
(3, 'Canada');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomer`
--

CREATE TABLE `tblcustomer` (
  `id` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `address` varchar(500) NOT NULL,
  `cityid` int(11) NOT NULL,
  `pincode` int(11) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` date NOT NULL,
  `contactno` char(10) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `password` char(8) NOT NULL,
  `status` varchar(20) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcustomer`
--

INSERT INTO `tblcustomer` (`id`, `fname`, `lname`, `address`, `cityid`, `pincode`, `gender`, `dob`, `contactno`, `emailid`, `password`, `status`, `userid`) VALUES
(2, 'Urvi', 'Shah', '9, J K Park, Kadod', 1, 394335, 'Female', '2002-03-02', '9569856975', 'urvi123@gmail.com', 'urvishah', 'DEACTIVE', 0),
(3, 'Krima', 'Shah', '101, Zanda Bazar,  Kadod', 11, 394601, 'Female', '1992-05-28', '9874569859', 'krima@gmail.com', 'krima123', 'ACTIVE', 0),
(4, 'dhyani', 'shah', '112, aydhup nagar society, bardoli', 1, 394601, 'Female', '2003-02-04', '0689589658', 'dhyani@gmail.com', 'dhyani12', 'DEACTIVE', 0),
(5, 'hardik', 'suhagiya', '12, varacha, surat', 1, 395010, 'Male', '2001-02-01', '9856985478', 'hardil@gmail.com', 'hardik', 'ACTIVE', 0),
(7, 'nitin', 'patel', '201,east malad, near ganesh temple, maharashtra', 14, 396001, 'Male', '1998-01-07', '6589658968', 'nitu541@gmail.com', 'nitinp', 'ACTIVE', 0),
(9, 'jenish', 'patel', '203, jk park, opp ichabal hall, valsad', 4, 396001, 'Female', '1994-01-12', '8745698569', 'jenu12@gmail.com', 'jenishp', 'ACTIVE', 0),
(10, 'laxmi', 'patel', '102, ambavadi, near ichaba hall, valsad', 4, 396001, 'Female', '1991-05-21', '9856325698', 'laxmi@gmail.com', 'laxmip', 'ACTIVE', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomerorder`
--

CREATE TABLE `tblcustomerorder` (
  `Serialno` int(11) NOT NULL,
  `Billno` varchar(50) NOT NULL,
  `Orderno` int(11) NOT NULL,
  `Customerid` int(11) NOT NULL,
  `Cartid` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `PaymentDesc` varchar(250) NOT NULL,
  `Transactionid` varchar(100) NOT NULL,
  `order_datetime` date NOT NULL,
  `delivery_datetime` date NOT NULL,
  `Status` varchar(50) NOT NULL,
  `order_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcustomerorder`
--

INSERT INTO `tblcustomerorder` (`Serialno`, `Billno`, `Orderno`, `Customerid`, `Cartid`, `Quantity`, `Amount`, `PaymentDesc`, `Transactionid`, `order_datetime`, `delivery_datetime`, `Status`, `order_status`) VALUES
(1, 'KdSIjnp', 4, 3, 1, 2, 8075, 'Debit Card', 'JwKA9kXQJU0MjB2', '2021-04-24', '2021-04-29', 'Paid', 'Delivered'),
(2, 'kPfpGjv', 4, 3, 2, 1, 850, 'COD', '', '2021-04-15', '2021-04-20', 'Paid', 'Delivered'),
(4, 'edrHy9A', 4, 3, 5, 1, 850, 'COD', '', '2021-05-05', '2021-05-10', 'Pending', 'Cancelled'),
(7, 'IeL2xJR', 4, 3, 12, 1, 5000, 'COD', '', '2021-05-05', '2021-05-10', 'Pending', 'Cancelled'),
(8, 'HpYkHgq', 4, 3, 13, 1, 6500, 'COD', '', '2021-05-05', '2021-05-10', 'Pending', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomerordermaster`
--

CREATE TABLE `tblcustomerordermaster` (
  `no` int(11) NOT NULL,
  `Customerid` int(11) NOT NULL,
  `Full_Name` varchar(50) NOT NULL,
  `Mobile_Number` char(10) NOT NULL,
  `Shipping_address` varchar(250) NOT NULL,
  `Cityid` int(11) NOT NULL,
  `pincode` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcustomerordermaster`
--

INSERT INTO `tblcustomerordermaster` (`no`, `Customerid`, `Full_Name`, `Mobile_Number`, `Shipping_address`, `Cityid`, `pincode`, `status`) VALUES
(1, 7, 'Nitin Patel', '9874569856', '201,east malad, near ganesh temple, maharashtra', 12, 396301, 'Delivered'),
(4, 3, 'krima shah', '985698569', '112, aydhup nagar society, bardoli,,near jalaram khaman', 3, 394601, 'Delivered'),
(5, 6, 'Anandi Bhalani', '8980554960', 'Gandhi circle, Khergam,,Opp .Amardeep Eye Hospital', 4, 396040, 'Pending'),
(6, 5, 'Hardik Suhagiya', '9874569859', '203, maninagar society, opp ichabal hall, valsad,,opp. DMart Mall', 4, 396001, 'Pending'),
(7, 8, 'Jenish Patel', '9265796594', '203, maninagar society, opp ichabal hall, valsad,,', 4, 396001, 'Pending'),
(8, 9, 'jenish patel', '0874569856', '203, jk park, opp ichabal hall, valsad,,', 4, 396001, 'Pending'),
(9, 10, 'laxmi patel', '9856325698', '102, ambavadi, near ichaba hall, valsad,,', 4, 396001, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tblfabric`
--

CREATE TABLE `tblfabric` (
  `id` int(11) NOT NULL,
  `f_type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblfabric`
--

INSERT INTO `tblfabric` (`id`, `f_type`) VALUES
(4, 'Canvas'),
(1, 'Cotton'),
(6, 'Georgette'),
(7, 'Muslin'),
(8, 'Organza'),
(5, 'Shiffon'),
(3, 'Silk'),
(2, 'Synthetic'),
(9, 'Velvet');

-- --------------------------------------------------------

--
-- Table structure for table `tblfeedback`
--

CREATE TABLE `tblfeedback` (
  `id` int(11) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `Customerid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblfeedback`
--

INSERT INTO `tblfeedback` (`id`, `comment`, `Customerid`) VALUES
(1, 'same as image displayed', 2),
(2, 'EASY TO USE', 3),
(3, 'nice photos', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbloccasion`
--

CREATE TABLE `tbloccasion` (
  `id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbloccasion`
--

INSERT INTO `tbloccasion` (`id`, `type`) VALUES
(3, 'Casual'),
(1, 'Party'),
(2, 'Wedding');

-- --------------------------------------------------------

--
-- Table structure for table `tblpcategory`
--

CREATE TABLE `tblpcategory` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpcategory`
--

INSERT INTO `tblpcategory` (`id`, `cat_name`) VALUES
(2, 'ChaniyaCholi'),
(3, 'Dresses'),
(6, 'Gowns'),
(7, 'IndoWestern'),
(1, 'Kurtis'),
(5, 'SalwarSuits'),
(4, 'Sarees');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(11) NOT NULL,
  `PCategoryid` int(11) NOT NULL,
  `Fabricid` int(11) NOT NULL,
  `Colorid` int(11) NOT NULL,
  `Size` varchar(50) NOT NULL,
  `Price` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Occasionid` int(11) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `DateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `PCategoryid`, `Fabricid`, `Colorid`, `Size`, `Price`, `Quantity`, `Occasionid`, `Description`, `status`, `DateTime`) VALUES
(1, 2, 2, 3, 'XS,S', 5000, 12, 2, 'Bottle Green Net Flared Lehenga Choli With Heavy Sequinsed Work', 'ACTIVE', '2021-03-16 07:51:13'),
(2, 1, 6, 4, 'XS,L,S', 550, 20, 3, 'Teal Blue Georgette Sequins \r\nWorked Anarkali Kurti', 'DEACTIVE', '2021-03-16 08:13:57'),
(3, 4, 3, 2, 'L', 2535, 20, 1, 'Dark Blue Art Silk Plain Saree with Lace With Full Embroidered', 'DEACTIVE', '2021-03-16 10:10:22'),
(4, 2, 6, 6, 'XS,L,XL,M,S,XXL', 3575, 15, 2, 'Mustard Yellow Net Designer Flared Lehenga Choli with\r\nFloral Embroidered ', 'DEACTIVE', '2021-03-17 04:58:44'),
(5, 5, 3, 10, 'XS,L,XL,M', 2000, 5, 1, 'Grey Cotton Silk Embroidered Anarkali Suit ', 'ACTIVE', '2021-03-17 05:08:53'),
(6, 4, 3, 2, 'L', 5000, 8, 2, 'Rama Blue Banarasi Silk Traditional Woven Saree with Patola Border', 'ACTIVE', '2021-03-17 05:13:13'),
(7, 5, 3, 6, 'XS,L,M', 800, 7, 1, 'Yellow and Light Blue Silk Traditional Patola', 'ACTIVE', '2021-03-17 05:17:53'),
(8, 4, 6, 3, 'L', 2300, 15, 2, 'Green Georgette Silk Plain Saree with Contrast Embroidered Border and Pallu', 'ACTIVE', '2021-03-17 05:26:28'),
(9, 3, 6, 4, 'XS,L,XL,M,S', 1500, 15, 1, 'Dark Blue Georgette Designer Anarkali Suit', 'ACTIVE', '2021-03-17 05:29:35'),
(10, 1, 7, 8, 'XS,L,XL,M', 500, 10, 3, 'Pearl White Muslin Printed Flared Kurti with Palazzo', 'DEACTIVE', '2021-03-17 05:38:24'),
(11, 6, 4, 3, 'L,XL,M', 4500, 5, 1, 'Mint Green Net Fancy Flared Gown with 3D Flowers', 'ACTIVE', '2021-03-17 05:40:56'),
(12, 1, 2, 1, 'XS,L,XL,M', 350, 15, 3, 'Simple Black Viscose Rayon Anarkali Printed Kurti', 'ACTIVE', '2021-03-17 05:43:29'),
(13, 6, 2, 12, 'XS,L,XL,M,S,XXL', 3500, 5, 2, 'Maroon Imported Layered Anarkali Gown ', 'ACTIVE', '2021-03-17 05:48:06'),
(14, 6, 8, 15, 'XS,L,XL,M', 2500, 10, 1, 'Beige Peech Organza Anarkali Gown with Sequins\r\n', 'ACTIVE', '2021-03-17 05:50:20'),
(15, 2, 3, 5, 'XS,L,XL,M,S,XXL', 2000, 15, 2, 'Pink Silk Lehenga with Woven Buttis and Embroidered Blouse\r\n', 'ACTIVE', '2021-03-17 05:52:02'),
(16, 1, 1, 5, 'XS,S,L', 850, 15, 3, 'Mauve Muslin Pleated Long Kurti with Floral Print', 'ACTIVE', '2021-03-17 15:49:36'),
(17, 1, 2, 12, 'XS,S,L,M', 650, 12, 1, 'Maroon Rayon High Low Kurti with Palazzo', 'ACTIVE', '2021-03-17 16:24:55'),
(18, 1, 2, 1, 'XS,L,M,XL', 550, 8, 3, 'Black Rayon Straight Cut Plain Kurti with Leggings', 'ACTIVE', '2021-03-17 16:27:04'),
(19, 1, 1, 2, 'S,L,M', 600, 15, 1, 'Blue Chanderi Checks Printed Anarkali Kurti', 'ACTIVE', '2021-03-17 16:29:50'),
(21, 1, 2, 6, 'S,L,M,XL', 750, 20, 3, 'Mustard Yellow Rayon Kurti with Printed Long Jacket', 'ACTIVE', '2021-03-17 16:31:24'),
(22, 1, 1, 5, 'XS,S,L,M,XL', 350, 25, 3, 'Coral Pink Cotton Short Kurti with Embroidery ', 'ACTIVE', '2021-03-17 16:34:16'),
(23, 2, 4, 5, 'S,L,M,XL', 8500, 15, 2, 'Pink Net Lehenga Choli with Sequins Work', 'ACTIVE', '2021-03-18 05:02:32'),
(24, 2, 3, 3, 'S,L,M', 5785, 5, 2, 'Teal Green Silk Printed Lehenga Choli with Contrast Border', 'ACTIVE', '2021-03-18 05:04:28'),
(25, 2, 4, 2, 'S,L,M,XL', 6305, 15, 1, 'Teal Blue Net Deigner Sequins Worked Lehenga with Off Shoulder Blouse', 'ACTIVE', '2021-03-18 05:06:43'),
(26, 2, 8, 1, 'XS,S,L,M', 5005, 7, 1, 'Black Organza Digital Floral Printed Lehenga with Senquins Worked Off Shoulder Blouse', 'ACTIVE', '2021-03-18 05:08:08'),
(27, 2, 5, 5, 'S,L,M', 4500, 8, 2, 'Dusty Pink Net Lehenga Choli with Zari Embroidered Butta', 'ACTIVE', '2021-03-18 05:09:36'),
(28, 2, 6, 12, 'XS,S,L,M,XL', 2665, 9, 2, 'Maroon Georgette Lehenga with Bandhej Print Juliet Sleeved Blouse', 'ACTIVE', '2021-03-18 05:11:03'),
(29, 6, 6, 2, 'XS,S,M,XL', 5000, 5, 1, 'Prussian Blue Georgette One Shoulder Plain Fancy Gown with Handworked Belt', 'ACTIVE', '2021-03-18 05:19:52'),
(30, 6, 4, 2, 'XS,S,L,M', 6500, 8, 2, 'Light Blue Net Designer Embroidered Floor Length Gown', 'ACTIVE', '2021-03-18 05:21:04'),
(31, 6, 4, 2, 'S,L,M,XL', 5800, 5, 1, 'Light Blue Net Designer Cold Shoulder Floor Length Gown with Sequins and Cutdana', 'ACTIVE', '2021-03-18 05:22:11'),
(32, 6, 2, 9, 'S,L,M', 6500, 7, 2, 'Off White Net Designer Layered Gown with 3D Work', 'ACTIVE', '2021-03-18 05:23:18'),
(33, 6, 5, 1, 'XS,S,L,M,XL', 3500, 4, 1, 'Black Net Designer Anarkali Gown with Sequins Work\r\n', 'ACTIVE', '2021-03-18 05:24:26'),
(34, 6, 6, 4, 'S,L,M,XL', 6270, 8, 1, 'Navy Blue Georgette Silk Cutdana Worked Anarkali Gown with Bat Sleeves', 'ACTIVE', '2021-03-18 05:25:37'),
(35, 4, 3, 7, 'L', 6500, 10, 2, 'Red Banarasi Silk Designer All Over Woven Saree with Elephant Motifs', 'ACTIVE', '2021-03-18 05:39:02'),
(36, 4, 3, 3, 'L', 3835, 15, 2, 'Green and Pink Art Silk Bandhej Printed Saree with Zari Gold Floral Woven Border\r\n', 'ACTIVE', '2021-03-18 05:43:18'),
(37, 4, 3, 2, 'L', 6500, 15, 2, 'Teal Blue and Yellow Banarasi Silk Half and Half Floral Jaal Woven Saree with Embroidery', 'ACTIVE', '2021-03-18 05:46:11'),
(38, 4, 3, 3, 'L', 5000, 8, 2, 'Bottle Green Banarasi Silk Woven Saree with Golden Peacock Motif Border ', 'ACTIVE', '2021-03-18 05:48:10'),
(39, 4, 6, 23, 'L', 4500, 15, 1, 'Beige Georgette Plain Saree with Maroon Embroidered Cutwork Border', 'ACTIVE', '2021-03-18 05:49:18'),
(40, 4, 2, 15, 'L', 4110, 9, 1, 'Dusty Peach and Black Shaded Lycra Zari Worked Ruffle Saree with Designer Blouse\r\n', 'ACTIVE', '2021-03-18 05:50:26'),
(41, 3, 3, 10, 'XS,S,L', 500, 8, 1, 'Grey Satin Silk Floral Printed Anarkali Suit', 'ACTIVE', '2021-03-18 07:52:20'),
(42, 3, 6, 19, 'XS,S,L,M', 850, 12, 2, 'Wine Purple Georgette Anarkali Embroidered Suit', 'ACTIVE', '2021-03-18 07:53:08'),
(43, 3, 6, 2, 'S,L,M', 1500, 15, 2, 'Prussian Blue Georgette Designer Floral and Sequin Embroidered Suit', 'ACTIVE', '2021-03-18 07:55:08'),
(44, 3, 2, 11, 'S,L,M,XL', 1500, 5, 1, 'Mustard Net Designer Anarkali Lehenga Suit with Sequins Work', 'ACTIVE', '2021-03-18 07:56:13'),
(45, 3, 3, 24, 'XS,S,L,M', 890, 8, 1, 'Cream Silk Contrast Floral Embroidered Anarkali Suit with Modern Look\r\n', 'ACTIVE', '2021-03-18 07:57:02'),
(46, 3, 6, 3, 'XS,S,L,M,XL', 2000, 5, 2, 'Dark Rama Green Satin Georgette Designer Embroidered Anarkali Suit', 'ACTIVE', '2021-03-18 07:58:17'),
(47, 5, 3, 6, 'XS,S,L', 850, 15, 2, 'Yellow Silk Patola Woven Straight Cut Patiala Suit', 'ACTIVE', '2021-03-18 08:04:42'),
(48, 5, 3, 5, 'XS,S,L,M', 1050, 20, 2, 'Pink Silk Gota Patti Worked Straight Cut Patiala Suit', 'ACTIVE', '2021-03-18 08:05:37'),
(49, 5, 3, 12, 'S,L,M', 1500, 8, 2, 'Maroon Silk Straight Cut Palazzo Suit with Gota Patti Lace', 'ACTIVE', '2021-03-18 08:06:28'),
(50, 5, 2, 5, 'S,M,XL', 950, 5, 1, 'Splendid Light Pink Soft Net Base Festive Wear Sequin Sharara Suit', 'ACTIVE', '2021-03-18 08:07:23'),
(51, 5, 6, 4, 'S,L,M,XL', 2500, 8, 1, 'Delightful Royal Blue Georgette Base Festive Wear Pant Style Suit', 'ACTIVE', '2021-03-18 08:08:18'),
(52, 5, 3, 10, 'XS,S,L,M,XL', 599, 5, 3, 'Modish Cloud Grey Silk Base Beautiful Palazzo Salwar Suit', 'ACTIVE', '2021-03-18 08:09:20'),
(53, 7, 6, 2, 'S,L,M', 2500, 15, 1, 'Blue Georgette Designer Indo Western Crop Top with Bell Sleeved Long Jacket', 'ACTIVE', '2021-03-18 09:01:01'),
(54, 7, 2, 10, 'XS,S,L,M', 1500, 20, 1, 'Grey Crepe Designer Indo Western Crop Top with Long Jacket', 'ACTIVE', '2021-03-18 09:01:52'),
(55, 7, 1, 3, 'S,L,M,XL', 899, 8, 3, 'Sage Green Cotton Foil Printed Indo Western Suit with Perfect Punjabi Look\r\n', 'ACTIVE', '2021-03-18 09:02:42'),
(56, 7, 1, 8, 'XS,S,L,XL', 3500, 15, 2, 'White Lehenga With Yellow Blouse', 'ACTIVE', '2021-03-18 09:03:33'),
(57, 7, 5, 8, 'XS,S,L,M,XL', 799, 8, 1, 'White Skirt Top Set With Embroidered Jacket', 'ACTIVE', '2021-03-18 09:04:35'),
(58, 7, 6, 3, 'S,L,M,XL', 4500, 15, 2, 'Green Embroidered Lehenga Choli with Jacket', 'ACTIVE', '2021-03-18 09:05:31'),
(62, 2, 3, 4, 'XS,S,L,M', 5000, 5000, 2, 'Navy Blue Crepe Silk Digital Floral Printed Lehenga Choli', 'ACTIVE', '2021-04-04 08:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `tblproductimage`
--

CREATE TABLE `tblproductimage` (
  `id` int(11) NOT NULL,
  `FrontImage` varchar(300) NOT NULL,
  `BackImage` varchar(300) NOT NULL,
  `LeftImage` varchar(300) NOT NULL,
  `RightImage` varchar(300) NOT NULL,
  `Productid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproductimage`
--

INSERT INTO `tblproductimage` (`id`, `FrontImage`, `BackImage`, `LeftImage`, `RightImage`, `Productid`) VALUES
(4, 'gcfront.jpg', 'gcfront.jpg', 'gcleft.jpg', 'gcright.jpg', 1),
(5, 'kurti31.jpg', 'kurti32.jpg', 'kurti33.jpg', 'kurti33.jpg', 2),
(6, 'saree31.jpg', 'saree33.jpg', 'saree32.jpg', 'saree33.jpg', 3),
(7, 'ycfront.jpg', 'ycleft.jpg', 'ycright.jpg', 'ycleft.jpg', 4),
(8, 'd21.jpg', 'd22.jpg', 'd23.jpg', 'd21.jpg', 5),
(9, 'saree21.jpg', 'saree23.jpg', 'saree22.jpg', 'saree21.jpg', 6),
(10, 'd31.jpg', 'd33.jpg', 'd32.jpg', 'd31.jpg', 7),
(11, 'saree11.jpg', 'saree12.jpg', 'saree11.jpg', 'saree12.jpg', 8),
(12, 'd11.jpg', 'd13.jpg', 'd12.jpg', 'd11.jpg', 9),
(13, 'kurti21.jpg', 'kurti23.jpg', 'kurti22.jpg', 'kurti22.jpg', 10),
(14, 'gown31.jpg', 'gown32.jpg', 'gown33.jpg', 'gown32.jpg', 11),
(15, 'kurti11.jpg', 'kurti13.jpg', 'kurti12.jpg', 'kurti12.jpg', 12),
(16, 'gown11.jpg', 'gown12.jpg', 'gown11.jpg', 'gown12.jpg', 13),
(17, 'gown21.jpg', 'gown23.jpg', 'gown24.jpg', 'gown22.jpg', 14),
(18, 'rcfront.jpg', 'rcback.jpg', 'rcleft.jpg', 'rcright.jpg', 15),
(19, 'Kurti1Front.jpg', 'Kurti1Back.jpg', 'Kurti1Left.jpg', 'Kurti1Right.jpg', 16),
(20, 'Kurti2Back.jpg', 'Kurti2Front.jpg', 'Kurti2Right.jpg', 'Kurti2Left.jpg', 17),
(21, 'Kurti3Front.jpg', 'Kurti3Back.jpg', 'Kurti3Left.jpg', 'Kurti3Right.jpg', 18),
(22, 'Kurti4Front.jpg', 'Kurti4Right.jpg', 'Kurti4Front.jpg', 'Kurti4Right.jpg', 19),
(23, 'Kurti4Front.jpg', 'Kurti4Right.jpg', 'Kurti4Front.jpg', 'Kurti4Right.jpg', 20),
(24, 'Kurti5Front.jpg', 'Kurti5Left.jpg', 'Kurti5Left.jpg', 'Kurti5Front.jpg', 21),
(25, 'Kurti6Front.jpg', 'Kurti6Back.jpg', 'Kurti6Front.jpg', 'Kurti6Back.jpg', 22),
(26, 'ChaniyaCholi1Front.jpg', 'ChaniyaCholi1Left.jpg', 'ChaniyaCholi1Back.jpg', 'ChaniyaCholi1Right.jpg', 23),
(27, 'ChaniyaCholi2Front.jpg', 'ChaniyaCholi2Back.jpg', 'ChaniyaCholi2Left.jpg', 'ChaniyaCholi2Left.jpg', 24),
(28, 'ChaniyaCholi3Front.jpg', 'ChaniyaCholi3Right.jpg', 'ChaniyaCholi3Left.jpg', 'ChaniyaCholi3Right.jpg', 25),
(29, 'ChaniyaCholi4Front.jpg', 'ChaniyaCholi4Left.jpg', 'ChaniyaCholi4Right.jpg', 'ChaniyaCholi4Left.jpg', 26),
(30, 'ChaniyaCholi5Front.jpg', 'ChaniyaCholi5Right.jpg', 'ChaniyaCholi5Right.jpg', 'ChaniyaCholi5Front.jpg', 27),
(31, 'ChaniyaCholi6Front.jpg', 'ChaniyaCholi6Back.jpg', 'ChaniyaCholi6Left.jpg', 'ChaniyaCholi6Right.jpg', 28),
(32, 'Gown1Front.jpg', 'Gown1Back.jpg', 'Gown1Front.jpg', 'Gown1Back.jpg', 29),
(33, 'Gown2Front.jpg', 'Gown2Back.jpg', 'Gown2Front.jpg', 'Gown2Back.jpg', 30),
(34, 'Gown3Front.jpg', 'Gown3Back.jpg', 'Gown3Left.jpg', 'Gown3Right.jpg', 31),
(35, 'Gown4Front.jpg', 'Gown4Back.jpg', 'Gown4Left.jpg', 'Gown4Right.jpg', 32),
(36, 'Gown5Front.jpg', 'Gown5Back.jpg', 'Gown5Back.jpg', 'Gown5Front.jpg', 33),
(37, 'Gown6Front.jpg', 'Gown6Back.jpg', 'Gown6Right.jpg', 'Gown6Right.jpg', 34),
(38, 'Saree1Front.jpg', 'Saree1Back.jpg', 'Saree1Right.jpg', 'Saree1Right.jpg', 35),
(39, 'Saree2Front.jpg', 'Saree2Back.jpg', 'Saree2Right.jpg', 'Saree2Right.jpg', 36),
(40, 'Saree3Front.jpg', 'Saree3Back.jpg', 'Saree3Left.jpg', 'Saree3Right.jpg', 37),
(41, 'Saree4Front.jpg', 'Saree4Back.jpg', 'Saree4Front.jpg', 'Saree4Back.jpg', 38),
(42, 'Saree5Front.jpg', 'Saree5Right.jpg', 'Saree5Right.jpg', 'Saree5Front.jpg', 39),
(43, 'Saree6Front.jpg', 'Saree6Back.jpg', 'Saree6Left.jpg', 'Saree6Left.jpg', 40),
(44, 'Dresses1Front.jpg', 'Dresses1Back.jpg', 'Dresses1Left.jpg', 'Dresses1Left.jpg', 41),
(45, 'Dresses2Front.jpg', 'Dresses2Back.jpg', 'Dresses2Right.jpg', 'Dresses2Right.jpg', 42),
(46, 'Dresses3Front.jpg', 'Dresses3Left.jpg', 'Dresses3Right.jpg', 'Dresses3Right.jpg', 43),
(47, 'Dresses4Front.jpg', 'Dresses4Back.jpg', 'Dresses4Right.jpg', 'Dresses4Right.jpg', 44),
(48, 'Dresses5Front.jpg', 'Dresses5Right.jpg', 'Dresses5Right.jpg', 'Dresses5Front.jpg', 45),
(49, 'Dresses6Front.jpg', 'Dresses6Left.jpg', 'Dresses6Right.jpg', 'Dresses6Right.jpg', 46),
(50, 'Salwarsuits1Front.jpg', 'Salwarsuits1Left.jpg', 'Salwarsuits1Right.jpg', 'Salwarsuits1Right.jpg', 47),
(51, 'Salwarsuits2Front.jpg', 'Salwarsuits2Left.jpg', 'Salwarsuits2Right.jpg', 'Salwarsuits2Right.jpg', 48),
(52, 'Salwarsuits3Front.jpg', 'Salwarsuits3Right.jpg', 'Salwarsuits3Front.jpg', 'Salwarsuits3Right.jpg', 49),
(53, 'Salwarsuits4Front.jpg', 'Salwarsuits4Back.jpg', 'Salwarsuits4Right.jpg', 'Salwarsuits4Right.jpg', 50),
(54, 'Salwarsuits5Front.jpg', 'Salwarsuits5Left.jpg', 'Salwarsuits5Right.jpg', 'Salwarsuits5Right.jpg', 51),
(55, 'Salwarsuits6Front.jpg', 'Salwarsuits6Back.jpg', 'Salwarsuits6Right.jpg', 'Salwarsuits6Right.jpg', 52),
(56, 'IndoWestern1Front.jpg', 'IndoWestern1Right.jpg', 'IndoWestern1Right.jpg', 'IndoWestern1Front.jpg', 53),
(57, 'IndoWestern2Front.jpg', 'IndoWestern2Left.jpg', 'IndoWestern2Right.jpg', 'IndoWestern2Right.jpg', 54),
(58, 'IndoWestern3Front.jpg', 'IndoWestern3Right.jpg', 'IndoWestern3Right.jpg', 'IndoWestern3Front.jpg', 55),
(59, 'IndoWestern4Front.jpg', 'IndoWestern4Left.jpg', 'IndoWestern4Right.jpg', 'IndoWestern4Right.jpg', 56),
(60, 'IndoWestern5Front.jpg', 'IndoWestern5Back.jpg', 'IndoWestern5Right.jpg', 'IndoWestern5Right.jpg', 57),
(61, 'IndoWestern6Front.jpg', 'IndoWestern6Back.jpg', 'IndoWestern6Left.jpg', 'IndoWestern6Right.jpg', 58),
(62, 'ChaniyacholiFront.jpg', 'ChaniyacholiLeft.jpg', 'ChaniyacholiLeft.jpg', 'ChaniyacholiFront.jpg', 59),
(63, 'ChaniyaCholi2Left.jpg', 'ChaniyaCholi2Left.jpg', 'ChaniyaCholi2Left.jpg', 'ChaniyaCholi2Left.jpg', 60),
(64, 'ChaniyaCholi2Left.jpg', 'ChaniyaCholi2Left.jpg', 'ChaniyaCholi2Left.jpg', 'ChaniyaCholi2Left.jpg', 61),
(65, 'ChaniyacholiFront.jpg', 'ChaniyacholiLeft.jpg', 'ChaniyacholiFront.jpg', 'ChaniyacholiLeft.jpg', 62);

-- --------------------------------------------------------

--
-- Table structure for table `tblstate`
--

CREATE TABLE `tblstate` (
  `s_id` int(11) NOT NULL,
  `state_name` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstate`
--

INSERT INTO `tblstate` (`s_id`, `state_name`, `country_id`) VALUES
(1, 'Gujarat', 1),
(2, 'Goa', 1),
(3, 'Maharashtra', 1),
(4, 'Rajashthan', 1),
(5, 'Punjab', 1),
(6, 'Florida', 2),
(7, 'Michigan', 2),
(8, 'Texas', 2),
(9, 'Washington', 2),
(10, 'California', 2),
(11, 'Quebec', 3),
(12, 'Ontario', 3),
(13, 'Manitoba', 3),
(14, 'Alberta', 3),
(15, 'Yukon', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `username`, `password`) VALUES
(1, 'diu12@gmail.com', 'diyapp'),
(2, 'abc@gmail.com', 'urvapp'),
(3, 'anandibhalani@gmail.com', 'anandi12'),
(4, 'dhyani@gmail.com', 'dhyani12'),
(5, 'anandibhalani@gmail.com', 'Anandi'),
(6, 'nitu541@gmail.com', 'nitinp'),
(7, 'jenu12@gmail.com', 'jenishp'),
(8, 'jenu12@gmail.com', 'jenishp'),
(9, 'laxmi@gmail.com', 'laxmip');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcart`
--
ALTER TABLE `tblcart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tblcarttransaction`
--
ALTER TABLE `tblcarttransaction`
  ADD PRIMARY KEY (`cart_trans_id`);

--
-- Indexes for table `tblcity`
--
ALTER TABLE `tblcity`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `tblcolor`
--
ALTER TABLE `tblcolor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`c_name`);

--
-- Indexes for table `tblcountry`
--
ALTER TABLE `tblcountry`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emailid` (`emailid`),
  ADD UNIQUE KEY `contactno` (`contactno`);

--
-- Indexes for table `tblcustomerorder`
--
ALTER TABLE `tblcustomerorder`
  ADD PRIMARY KEY (`Serialno`),
  ADD UNIQUE KEY `Billno` (`Billno`);

--
-- Indexes for table `tblcustomerordermaster`
--
ALTER TABLE `tblcustomerordermaster`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tblfabric`
--
ALTER TABLE `tblfabric`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type` (`f_type`);

--
-- Indexes for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbloccasion`
--
ALTER TABLE `tbloccasion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `type` (`type`);

--
-- Indexes for table `tblpcategory`
--
ALTER TABLE `tblpcategory`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`cat_name`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `PCategoryid` (`PCategoryid`);

--
-- Indexes for table `tblproductimage`
--
ALTER TABLE `tblproductimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstate`
--
ALTER TABLE `tblstate`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcart`
--
ALTER TABLE `tblcart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tblcarttransaction`
--
ALTER TABLE `tblcarttransaction`
  MODIFY `cart_trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblcity`
--
ALTER TABLE `tblcity`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tblcolor`
--
ALTER TABLE `tblcolor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tblcountry`
--
ALTER TABLE `tblcountry`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblcustomer`
--
ALTER TABLE `tblcustomer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblcustomerorder`
--
ALTER TABLE `tblcustomerorder`
  MODIFY `Serialno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblcustomerordermaster`
--
ALTER TABLE `tblcustomerordermaster`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblfabric`
--
ALTER TABLE `tblfabric`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblfeedback`
--
ALTER TABLE `tblfeedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbloccasion`
--
ALTER TABLE `tbloccasion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblpcategory`
--
ALTER TABLE `tblpcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tblproductimage`
--
ALTER TABLE `tblproductimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tblstate`
--
ALTER TABLE `tblstate`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcity`
--
ALTER TABLE `tblcity`
  ADD CONSTRAINT `state_id` FOREIGN KEY (`state_id`) REFERENCES `tblstate` (`s_id`);

--
-- Constraints for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD CONSTRAINT `tblproduct_ibfk_1` FOREIGN KEY (`PCategoryid`) REFERENCES `tblpcategory` (`id`);

--
-- Constraints for table `tblstate`
--
ALTER TABLE `tblstate`
  ADD CONSTRAINT `country_id` FOREIGN KEY (`country_id`) REFERENCES `tblcountry` (`c_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
