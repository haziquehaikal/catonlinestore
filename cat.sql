-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 28, 2017 at 02:53 PM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cat`
--

-- --------------------------------------------------------

--
-- Table structure for table `ORDERS`
--

CREATE TABLE IF NOT EXISTS `ORDERS` (
  `orderid` varchar(10) NOT NULL,
  `memid` varchar(10) NOT NULL,
  `total` decimal(13,2) NOT NULL,
  `status` int(2) NOT NULL,
  `date` varchar(30) NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ORDERS`
--

INSERT INTO `ORDERS` (`orderid`, `memid`, `total`, `status`, `date`) VALUES
('CAT31746', '3648744', 2018.00, 1, '2017-01-13 04:56:07'),
('CAT93083', '1634755', 110.00, 0, '2016-11-26 10:46:22'),
('CAT95239', '1634755', 258.84, 1, '2016-12-23 08:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE IF NOT EXISTS `order_item` (
  `uuid` varchar(20) NOT NULL,
  `orderid` varchar(10) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`uuid`, `orderid`, `qty`, `type`) VALUES
('PRO85632', 'CAT38291', '1', 'cat'),
('PRO72952', 'CAT93875', '120', 'cat'),
('PRO78963', 'CAT93875', '196', 'supply'),
('PRO72952', 'CAT40573', '1', 'cat'),
('PRO78963', 'CAT40573', '1', 'supply'),
('PRO85632', 'CAT36964', '1', 'cat'),
('PRO85632', 'CAT27694', '2', 'cat'),
('PRO85632', 'CAT39450', '2', 'cat'),
('PRO85632', 'CAT95239', '1', 'cat'),
('PRO85632', 'CAT95239', '1', 'cat'),
('PRO72952', 'CAT00768', '1', 'cat'),
('PRO85632', 'CAT37561', '1', 'cat'),
('PRO85632', 'CAT29689', '1', 'cat'),
('PRO72952', 'CAT29689', '1', 'cat'),
('PRO78963', 'CAT29689', '1', 'supply'),
('PRO65723', 'CAT21460', '2', 'aqua'),
('PRO26595', 'CAT21460', '1', 'cat'),
('PRO85632', 'CAT47895', '12', 'cat'),
('PRO78963', 'CAT47895', '31', 'supply'),
('PRO55017', 'CAT93083', '1', 'aqua'),
('PRO43764', 'CAT93083', '1', 'aqua'),
('PRO93425', 'CAT93083', '1', 'aqua'),
('PRO73070', 'CAT42332', '1', 'aqua'),
('PRO11513', 'CAT47547', '1', 'aqua'),
('PRO32721', 'CAT47547', '1', 'aqua'),
('PRO73070', 'CAT47547', '1', 'aqua'),
('PRO36587', 'CAT47547', '1', 'assc'),
('PRO05076', 'CAT47547', '1', 'aqua'),
('PRO73070', 'CAT47547', '1', 'aqua'),
('PRO04778', 'CAT47927', '1', 'aqua'),
('PRO13635', 'CAT47927', '1', 'cat'),
('PRO19935', 'CAT31746', '100', 'aqua'),
('PRO26551', 'CAT31746', '1', 'supply'),
('PRO77154', 'CAT31746', '2', 'assc');

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCT`
--

CREATE TABLE IF NOT EXISTS `PRODUCT` (
  `uuid` varchar(100) NOT NULL,
  `brand` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `info` varchar(255) NOT NULL,
  `price` decimal(13,2) NOT NULL,
  `image_id` varchar(80) NOT NULL,
  `stock` varchar(10) NOT NULL,
  PRIMARY KEY (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PRODUCT`
--

INSERT INTO `PRODUCT` (`uuid`, `brand`, `type`, `info`, `price`, `image_id`, `stock`) VALUES
('PRO04778', 'ProDiet 500g Dry Cat Food Gour', 'aqua', 'Makanan for kucing\r\nboek', 10.30, '586e301198e8d', ''),
('PRO11513', 'Mixed Guppy', 'aqua', 'Ikan ni cantik snga', 15.00, '58607fc7d9b46.jpg', ''),
('PRO11610', 'Rainbow Play Balls', 'assc', 'mainan for kucing', 5.59, '58610f764fcea', ''),
('PRO13635', 'ProDiet 500g Dry Cat Food Ocea', 'aqua', 'makanan for kucing cepat besar ke', 65.30, '58628d2590260.jpg', ''),
('PRO15529', 'FISH AQUARIUM', 'aqua', 'FISH', 100.00, '586270b8441be.jpg', ''),
('PRO17912', 'BRITISH SHORTHAIR CAT', 'aqua', 'BRI', 8700.63, '58626aeaafb62.jpg', ''),
('PRO19935', 'Mickey Mouse Platy', 'aqua', '', 20.00, '586080845d292.jpg', ''),
('PRO25344', 'Terra Cotta Dish', 'assc', '- Also available in Green, Purple & Blue\r\n- Small\r\n- 120 mL (4.22 oz)\r\n', 13.00, '586111c718305.jpg', ''),
('PRO26551', 'AQUARIUM DECORATION', 'supply', 'FFF', 17.30, '58627100533c9.jpg', ''),
('PRO32721', 'Half Black Guppy', 'aqua', '', 20.00, '58607fe20134c.jpg', ''),
('PRO35428', 'PERSIAN CAT', 'cat', 'PERSIAN', 17.30, '586268594ba03.jpg', ''),
('PRO36587', 'Large Roll', 'assc', '', 25.00, '586073168c78e.jpg', ''),
('PRO40303', 'Sunset Platy', 'aqua', '', 20.00, '586080b08d034.jpg', ''),
('PRO42750', 'LILAC POINT SIAMESE CAT', 'cat', 'LILAC', 17.30, '58626b13b2f72.jpg', ''),
('PRO43764', 'White Skirt', 'aqua', '', 25.00, '5860814d2c938.jpg', ''),
('PRO43901', 'Power Cat Fresh Ocean Fish 500', 'cat', '', 6.79, '58628e3e7a169.jpg', ''),
('PRO45726', 'BRITISH SHORTHAIR CINNAMON', 'cat', 'BRI', 17.30, '58626ac16e87e.jpg', ''),
('PRO46900', 'BLUEPOINT SIAMESE CAT', 'cat', 'BLUE', 17.30, '58626a798ed88.jpg', ''),
('PRO49105', 'Catnip Spray ', 'assc', '90ml', 25.00, '586074705bfcd.jpg', ''),
('PRO49210', 'FISH FOOD', 'supply', 'FFF', 17.30, '586270db47659.jpg', ''),
('PRO55017', 'White Molly Fish', 'aqua', '', 25.00, '586080f9b5eeb.jpg', ''),
('PRO55328', 'Power Cat Fresh Ocean Tuna 500', 'cat', '', 6.79, '58628e541fccc.jpg', ''),
('PRO58779', 'Teaser', 'assc', '', 10.00, '58611374a6bfc.jpg', ''),
('PRO59122', 'Mini Food Dish', 'assc', '', 4.00, '58610e8e924b9.jpg', ''),
('PRO59816', ' Cat Love Litter Scoop ', 'assc', 'Grey - 14 cm (5.5 in)', 11.00, '5861092ce5008.jpg', ''),
('PRO61106', 'SIAMESE CAT', 'cat', 'SIAM', 17.30, '5862688c1f0dd.jpg', ''),
('PRO61623', 'CAT FOOD', 'supply', 'CAT', 17.30, '586270975b678.jpg', ''),
('PRO64872', 'ProDiet 500g Dry Cat Food Fres', 'cat', '', 6.80, '58628d92cf702.jpg', ''),
('PRO73070', 'Cobra Guppy', 'aqua', '', 25.00, '586080c911fbf.jpg', ''),
('PRO77029', 'Fancy Feast Chicken, Turkey &V', 'cat', '450g', 20.00, '5862899748f65.jpg', ''),
('PRO77154', 'Cat Litter', 'assc', '', 9.00, '586112cf68446.jpg', ''),
('PRO79330', 'Fancy Feast Beef, Salmon & Che', 'cat', '450g', 20.00, '58628aa2ab39f.jpg', ''),
('PRO81756', 'CAT BEDS', 'supply', 'CAT', 17.30, '58627076118e6.jpg', ''),
('PRO83384', 'CAT CARRIER', 'supply', 'CAT', 17.30, '58627056c1508.jpg', ''),
('PRO83623', 'Pencil Fish', 'aqua', '', 40.00, '586081f9918bd.jpg', ''),
('PRO86068', 'Glowlight Tetra', 'aqua', '', 30.00, '586081d67d80d.jpg', ''),
('PRO91736', 'Bubble Wash', 'aqua', 'Bublle the cat', 98.20, '5877ef3ff191f.JPG', ''),
('PRO93425', 'Full Red Guppy', 'aqua', '', 60.00, '586082314e97c.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `memid` varchar(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `level` varchar(50) NOT NULL,
  `status` varchar(5) NOT NULL,
  PRIMARY KEY (`memid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`memid`, `username`, `fname`, `lname`, `password`, `email`, `address`, `tel`, `level`, `status`) VALUES
('1634755', 'juweenjamila', 'Zureen gil', ' Camelia', 'eincomel!', 'jjcamelia@gmail.com.zm', 'NO 2 jalan uniten', '01133334397', 'ADMIN', '1'),
('2201719', 'admin', 'bella', 'laluna', 'test', 'mira@admin.com', 'No 2 Jalan Bucuk 44 indonesia', '0125258258', 'USER', '1'),
('3648744', 'haziq', 'Rocky', 'Labu', 'test123', 'test@gmail.com', 'No 2 Jalan Bucuk 44 Sinapore', '999', 'USER', '1'),
('5885250', 'test', 'Haziq', 'Comel', 'admin', 'admin@mode.com', 'No 2 Jalan Bucuk 44 Johor banan di sebelah sana', '1300-88-2525', 'ADMIN', '1'),
('6512670', 'milly', 'milo', 'narnia', 'milly', 'milly@molly.com', 'NO 3 jalan kondo', '857455339', 'USER', '1'),
('6613805', 'bellacomel', 'Sara ', 'Bella', 'test123', 'bella@sara.com', 'NO 2 JALAN CINTA ABADI', '01230392323', 'USER', '1'),
('7180586', 'yolo', 'syubiechim', '', 'qidah123', 'qidahaan@gmail.com', '', '', 'USER', '1'),
('7713574', 'najhan', 'ain', '', '12345', 'ainananana@gmail.com', '', '', 'USER', '1'),
('9298876', 'sufianhakim7', 'Sufian', 'Hakim', 'sufian123', 'sufianhakim7@gmail.com', '', '', 'USER', '1'),
('9940235', 'haziq96', 'Haziq Haik', 'Kinah', 'test123', 'test@bella.com', 'No 2 jalan lemau 3/1asd', '012-9999999', 'USER', '1');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
  `vendorID` varchar(10) NOT NULL,
  `companyName` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `tel` varchar(15) NOT NULL,
  PRIMARY KEY (`vendorID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendorID`, `companyName`, `email`, `address`, `tel`) VALUES
('VEN05698', 'Bella Cats Sdn Bhd', 'bella@bella.com', 'No 2,  Jalan 3 ,  kampung sungai buloh \r\n45200 Sungai Buloh , Selangor', '09-22320223'),
('VEN12342', 'Haziq kucing sdn bhd', 'haziq@kucingfamous.com', 'No 2 jalan penindustrian 3 , taman leng kong \r\nJohor darul takzim', '011222252'),
('VEN13771', 'Wisma Niaga Sdn Bhd', 'haziq@kucingtak.com', 'No 2 Jalan Cindrawasih , 43200 Selangor', '012555-8986'),
('VEN30524', 'Fish Star Sdn. Bhd.', 'fishstarhq@gmail.com', 'no.73 Jln BM12/5\r\nKg Entah\r\n', '017-6319116'),
('VEN85632', 'Indah Maju Sdn Bhd', 'indah@maju.com', 'NO 2 Jalan indah , 4399 maju , selangor', '012-8859658');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_items`
--

CREATE TABLE IF NOT EXISTS `vendor_items` (
  `uuid` varchar(10) NOT NULL,
  `vendorID` varchar(10) NOT NULL,
  `items_qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
