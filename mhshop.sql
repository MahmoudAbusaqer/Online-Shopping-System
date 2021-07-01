-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2020 at 08:36 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mhshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin-customer`
--

CREATE TABLE `admin-customer` (
  `id` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `is_admin` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin-customer`
--

INSERT INTO `admin-customer` (`id`, `password`, `is_admin`) VALUES
(111, '698d51a19d8a121ce581499d7b701668', 'yes'),
(123, '202cb962ac59075b964b07152d234b70', 'no'),
(222, 'bcbe3365e6ac95ea2c0343a2395834dd', 'no'),
(456, 'e10adc3949ba59abbe56e057f20f883e', 'no'),
(888, '202cb962ac59075b964b07152d234b70', 'no'),
(999, 'b706835de79a2b4e80506f582af3676a', 'no'),
(123456, 'c33367701511b4f6020ec61ded352059', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `categroy`
--

CREATE TABLE `categroy` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categroy`
--

INSERT INTO `categroy` (`id`, `name`, `description`, `image_url`) VALUES
(111, 'T-Shirt ', 'It is the best T-Shirt in the market and it is so soft ', 'assorted-clothes-996329.jpg'),
(222, 'Pants', 'It is pants', 'photo-of-three-jeans-1598507.jpg'),
(333, 'Jacket', 'It is a Jacket', 'assorted-cloth-lot-1336873.jpg'),
(444, 'Shoes', 'It is good shoes', 'footwear-leather-shoes-wear-267320.jpg'),
(555, 'Suits', 'It is the best Suits in the market and it is so soft ', 'person-standing-next-to-clothes-on-hangers-3839692.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` enum('normal','discount') NOT NULL,
  `price` double NOT NULL,
  `image` varchar(255) NOT NULL,
  `categroy_id` int(11) DEFAULT NULL,
  `discount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `type`, `price`, `image`, `categroy_id`, `discount`) VALUES
(11, 'Nike T-Shirt', 'discount', 100, 'man-wearing-orange-nike-crew-neck-t-shirt-733500.jpg', 111, 0.3),
(12, 'Nice T Shirt', 'normal', 120, 'man-taking-selfie-2764667.jpg', 111, 0),
(21, 'Nice Pants', 'discount', 70, 'high-angle-shot-of-shoes-1024550.jpg', 222, 0.25),
(31, 'Nice Jacket', 'normal', 175, 'smiling-man-walking-alone-on-pathway-2245433.jpg', 333, 0),
(41, 'Soccer shoes', 'discount', 180, 'pair-of-white-yellow-and-gray-soccer-cleats-274385.jpg', 444, 0.15),
(51, 'Nice Suit', 'discount', 250, 'man-in-black-suit-3613388.jpg', 555, 0.2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin-customer`
--
ALTER TABLE `admin-customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categroy`
--
ALTER TABLE `categroy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categroy_id` (`categroy_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categroy_id`) REFERENCES `categroy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
