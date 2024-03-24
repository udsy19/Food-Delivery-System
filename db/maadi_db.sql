-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2022 at 11:58 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maadi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`name`, `email`, `comment`) VALUES
('a', 'abc@gmail.com', 'a'),
('Udaya', 'udayav@kis.in', 'Blah blah'),
('drge', 'gerge@sdd.com', 'ergedr'),
('d', 'udayatejas2004@gmail.com', 'sfgbsrrbed'),
('d', 'udayatejas2004@gmail.com', 'sfgbsrrbed'),
('d', 'dW@wvbei.werw', 'ss'),
('d', 'dW@wvbei.werw', 'ss'),
('f', 'ffh@ss', 'f'),
('f', 'ffh@ss', 'f');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('udaya', 'udayapass');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `prod_code` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `variety` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `prod_code`, `image`, `price`, `variety`) VALUES
(1, 'Briyani Mushroom Pizza', 'P001', 'Briyani_Mushroom_Pizza.jpg', 320, 'Pizza'),
(2, 'Deluxe Veggie Cheese Burst', 'P002', 'Deluxe Veggie Cheese Burst.jpg', 160, 'Pizza'),
(3, 'Deluxe Veggie Pizza', 'P003', 'Deluxe Veggie Pizza.jpg', 160, 'Pizza'),
(4, 'Double Cheese Margherita', 'P004', 'Double Cheese Margherita.jpg', 160, 'Pizza'),
(5, 'Four Cheese Pizza', 'P005', 'Four Cheese Pizza.jpg', 160, 'Pizza'),
(6, 'Paneer Tikka Pizza', 'P006', 'Paneer Tikka Pizza.jpg', 160, 'Pizza'),
(7, 'Mushroom and Corn Pizza', 'P007', 'Mushroom and Corn Pizza.jpg', 160, 'Pizza'),
(8, 'Butterscotch Thick Shake', 'TS001', 'Butterscotch Thick Shake.jpg', 160, 'Thick_Shake'),
(9, 'Chocolate Thick Shake', 'TS002', 'Chocolate Thick Shake.jpg', 160, 'Thick_Shake'),
(10, 'Strawberry Thick Shake', 'TS003', 'Strawberry Thick Shake.jpg', 160, 'Thick_Shake'),
(11, 'Vanilla Thick Shake', 'TS004', 'Vanilla Thick Shake.jpg', 160, 'Thick_Shake'),
(12, 'Club Veggie', 'SW001', 'Club Veggie.jpg', 160, 'Sandwich'),
(13, 'Focassia Mexican Veg', 'SW002', 'Focassia Mexican Veg.jpg', 160, 'Sandwich'),
(14, 'Focassia Paneer Tikka', 'SW003', 'Focassia Paneer Tikka.jpg', 160, 'Sandwich'),
(15, 'Mushroom and Mayo', 'SW004', 'Mushroom and Mayo.jpg', 160, 'Sandwich'),
(16, 'Peri Peri Fries', 'SN001', 'Peri Peri Fries.jpg', 160, 'Snacks'),
(17, 'Salted Fries', 'SN002', 'Salted Fries.jpg', 160, 'Snacks'),
(18, 'Salted Fries', 'SN003', 'Smileys.jpg', 160, 'Snacks'),
(19, 'Sooji Cheese Cutlet', 'SN004', 'Sooji Cheese Cutlet.jpg', 160, 'Snacks');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_id` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `state` varchar(10) NOT NULL DEFAULT 'Tamil Nadu',
  `city` varchar(10) NOT NULL DEFAULT 'Dindigul',
  `postal_code` int(10) NOT NULL DEFAULT 624005,
  `street_address_1` varchar(250) NOT NULL,
  `street_address_2` varchar(250) NOT NULL,
  `street_address_3` varchar(250) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `product_details` text NOT NULL,
  `subtotal` int(50) NOT NULL,
  `shipping_cost` int(10) NOT NULL DEFAULT 50,
  `total` int(50) NOT NULL,
  `payment_method` varchar(25) NOT NULL DEFAULT 'Cash on Delivery',
  `username` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `creation_date`, `order_id`, `first_name`, `last_name`, `state`, `city`, `postal_code`, `street_address_1`, `street_address_2`, `street_address_3`, `email`, `phone_number`, `product_details`, `subtotal`, `shipping_cost`, `total`, `payment_method`, `username`, `user_id`, `user_email`) VALUES
(2, '2022-02-05 11:37:11', 'SA409050222', 'Udaya', 'Tejas', 'Tamil Nadu', 'Dindigul', 624005, 'Seven Roads Junction', 's', 's', 'udayatejas2004@gmail.com', '+919944990078', '{\"P005\":\"1\",\"P002\":\"1\",\"P001\":\"1\",\"P004\":\"50\"}', 8480, 50, 8530, 'Cash on Delivery', 'sample', '10', 'sample@sample.com'),
(3, '2022-02-05 11:44:00', 'SA437050222', 'Udaya', 'Tejas', 'Tamil Nadu', 'Dindigul', 624005, 'a', 'b', 'c', 'udayatejas2004@gmail.com', '99449900789944990078', '{\"P002\":\"1\"}', 160, 50, 210, 'Cash on Delivery', 'sample', '10', 'sample@sample.com'),
(4, '2022-02-05 11:51:28', 'SA246050222', 'Udaya', 'Tejas', 'Tamil Nadu', 'Dindigul', 624005, 'Seven Roads Junction', 'sdsf', '', 'udayatejas2004@gmail.com', '+919944990078', '{\"P001\":\"1\"}', 160, 50, 210, 'Cash on Delivery', 'sample', '10', 'sample@sample.com'),
(5, '2022-02-05 11:56:01', 'SA718050222', 'Udaya', 'Tejas', 'Tamil Nadu', 'Dindigul', 624005, 'Seven Roads Junction', 'sfsfsfsfsf', '', 'udayatejas2004@gmail.com', '+919944990078', '{\"P001\":2}', 320, 50, 370, 'Cash on Delivery', 'sample', '10', 'sample@sample.com'),
(6, '2022-02-05 11:59:11', 'SA604050222', 'Udaya', 'Tejas', 'Tamil Nadu', 'Dindigul', 624005, 'Seven Roads Junction', 'zfsfsf', '', 'udayatejas2004@gmail.com', '+919944990078', '{\"P001\":\"1\"}', 160, 50, 210, 'Cash on Delivery', 'sample', '10', 'sample@sample.com'),
(7, '2022-02-05 11:59:37', 'SA518050222', 'Udaya', 'Tejas', 'Tamil Nadu', 'Dindigul', 624005, 'Seven Roads Junction', 'sdfsfsf', '', 'udayatejas2004@gmail.com', '+919944990078', '{\"P002\":\"1\"}', 160, 50, 210, 'Cash on Delivery', 'sample', '10', 'sample@sample.com'),
(8, '2022-02-05 12:00:01', 'SA580050222', 'Udaya', 'Tejas', 'Tamil Nadu', 'Dindigul', 624005, 'Seven Roads Junction', 'sdsf', '', 'udayatejas2004@gmail.com', '+919944990078', '{\"P001\":\"1\"}', 160, 50, 210, 'Cash on Delivery', 'sample', '10', 'sample@sample.com'),
(9, '2022-02-05 12:56:06', 'SA828050222', 'Udaya', 'Tejas', 'Tamil Nadu', 'Dindigul', 624005, 'Seven Roads Junction', 's', '', 'udayatejas2004@gmail.com', '+919944990078', '{\"P002\":\"1\",\"P001\":\"1\"}', 320, 50, 370, 'Cash on Delivery', 'sample', '10', 'sample@sample.com'),
(10, '2022-02-05 14:56:30', 'AS569050222', 'Udaya', 'Tejas', 'Tamil Nadu', 'Dindigul', 624005, 'Seven Roads Junction', 'srsfsrsr', '', 'udayatejas2004@gmail.com', '+919944990078', '{\"P007\":2,\"P001\":\"1\"}', 480, 50, 530, 'Cash on Delivery', 'ask', '14', 'ask@dfxds.dgdg'),
(11, '2022-02-05 15:18:03', 'SA129050222', 'Udaya', 'Tejas', 'Tamil Nadu', 'Dindigul', 624005, 's', 's', '', 'udayatejas2004@gmail.com', '+919944990078', '{\"P001\":2,\"P004\":\"1\",\"P002\":\"1\",\"P003\":\"1\",\"P005\":\"1\"}', 960, 50, 1010, 'Cash on Delivery', 'sample', '10', 'sample@sample.com'),
(12, '2022-02-05 15:25:13', 'SA447050222', 'Udaya', 'Tejas', 'Tamil Nadu', 'Dindigul', 624005, 'Seven Roads Junction', 'dsss', '', 'udayatejas2004@gmail.com', '+919944990078', '{\"P001\":\"1\"}', 160, 50, 210, 'Cash on Delivery', 'sample', '10', 'sample@sample.com'),
(13, '2022-02-05 15:27:31', 'SA618050222', 'Udaya', 'Tejas', 'Tamil Nadu', 'Dindigul', 624005, 'Seven Roads Junction', 'fssfsf', '', 'udayatejas2004@gmail.com', '+919944990078', '{\"P001\":\"1\"}', 160, 50, 210, 'Cash on Delivery', 'sample', '10', 'sample@sample.com'),
(14, '2022-02-07 04:01:22', 'SA744070222', 'Udaya', 'Tejas', 'Tamil Nadu', 'Dindigul', 624005, 'Seven Roads Junction', 'a', '', 'udayatejas2004@gmail.com', '+919944990078', '{\"P001\":\"1\",\"P002\":\"1\"}', 320, 50, 370, 'Cash on Delivery', 'sample', '10', 'sample@sample.com'),
(15, '2022-02-07 08:23:08', 'KY677070222', 'Lakshmi', 'Anand', 'Tamil Nadu', 'Dindigul', 624005, 'Seelapadi', 'Nil', '', 'udayatejas2004@gmail.com', '+919944990078', '{\"P007\":\"1\",\"P004\":\"5\"}', 960, 50, 1010, 'Cash on Delivery', 'kysi', '17', 'kyrans@kis.in'),
(16, '2022-02-14 17:54:09', 'SA893140222', 'Udaya', 'Tejas', 'Tamil Nadu', 'Dindigul', 624005, 'Seven Roads Junction', '1', '', 'udayatejas2004@gmail.com', '+919944990078', '{\"P001\":2,\"P002\":\"1\",\"P004\":\"1\"}', 640, 50, 690, 'Cash on Delivery', 'sample', '10', 'sample@sample.com'),
(17, '2022-03-17 05:55:36', 'SA434170322', 's', 's', 'Tamil Nadu', 'Dindigul', 624005, 'ss', 'ss', 'ss', 'udayav@kis.in', '9944990078', '{\"P001\":2,\"P002\":\"1\"}', 480, 50, 530, 'Cash on Delivery', 'sample', '10', 'sample@sample.com'),
(18, '2022-03-18 03:44:40', 'SH543180322', 's', 's', 'Tamil Nadu', 'Dindigul', 624005, 'ss', 'ss', 'ss', 'udayav@kis.in', '9944990078', '{\"P001\":\"9\"}', 2880, 50, 2930, 'Cash on Delivery', 'shali', '19', 'sample@sample.com'),
(19, '2022-04-02 17:29:41', 'SA162020422', 'Udaya', 'Tejas', 'Tamil Nadu', 'Dindigul', 624005, 'Seven Roads Junction', '222', '', 'udayatejas2004@gmail.com', '+919944990078', '{\"P004\":\"1\",\"P002\":\"1\",\"P005\":\"1\"}', 480, 50, 530, 'Cash on Delivery', 'sample', '10', 'sample@sample.com'),
(20, '2022-04-02 18:41:04', 'AD658030422', 'Udaya', 'Tejas', 'Tamil Nadu', 'Dindigul', 624005, 'Seven Roads Junction', '66', '6', 'udayatejas2004@gmail.com', '+919944990078', '{\"P002\":2}', 320, 50, 370, 'Cash on Delivery', 'admin', '15', 'admin'),
(21, '2022-04-03 11:03:31', 'SA916030422', 'Udaya', 'Tejas', 'Tamil Nadu', 'Dindigul', 624005, 'ss', 'ss', 'ss', 'udayatejas2004@gmail.com', '+919944990078', '{\"SW001\":\"1\"}', 160, 50, 210, 'Cash on Delivery', 'sample', '10', 'sample@sample.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`) VALUES
(10, 'sample', 'sample', 'sample@sample.com', 'blah'),
(11, 'dw', 'wd', 'udayatejas2004@gmail.com', 'hh'),
(12, 'Udaya', 'udsy', 'udayatejas2004@gmail.com', 'blah'),
(13, 'udaya', 'udsy', 'udayatejas2004@gmail.com', '1'),
(14, 'ask', 'ask', 'ask@dfxds.dgdg', '1234'),
(15, 'administrator', 'admin', 'admin', 'admin'),
(16, 'Udaya Tejas', 'udsy19', 'udayatejas2004@gmail.com', '1'),
(17, 'bignigga', 'kysi', 'kyrans@kis.in', '1'),
(18, 'Udaya Tejas', 'udsy19', 'udayatejas2004@gmail.com', '1'),
(19, 'Shalini', 'shali', 'sample@sample.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
