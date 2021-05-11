-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2019 at 03:48 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tuckshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(10) unsigned NOT NULL,
  `admin_username` varchar(500) NOT NULL DEFAULT '',
  `admin_password` varchar(500) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `class_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `name`, `date`) VALUES
(1, 'Basic 7 Topaz', '2019-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `deduction`
--

CREATE TABLE IF NOT EXISTS `deduction` (
  `deduction_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE IF NOT EXISTS `deposit` (
  `id` int(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `voucher` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `item_id` int(10) unsigned NOT NULL,
  `item_name` varchar(5000) NOT NULL DEFAULT '',
  `item_price` double DEFAULT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_image` varchar(5000) NOT NULL DEFAULT '',
  `item_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_price`, `item_quantity`, `item_image`, `item_date`) VALUES
(1, 'Pure Bliss', 50, 100, '', '2019-06-22'),
(2, 'Wafers', 40, 200, '', '2019-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE IF NOT EXISTS `orderdetails` (
  `order_id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `class_id` int(11) NOT NULL,
  `order_name` varchar(1000) NOT NULL DEFAULT '',
  `order_price` double NOT NULL DEFAULT '0',
  `order_quantity` int(10) unsigned NOT NULL DEFAULT '0',
  `order_total` double NOT NULL DEFAULT '0',
  `order_status` varchar(45) NOT NULL DEFAULT '',
  `status_verify` varchar(1000) NOT NULL,
  `delivery_status` varchar(255) NOT NULL,
  `order_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`order_id`, `user_id`, `class_id`, `order_name`, `order_price`, `order_quantity`, `order_total`, `order_status`, `status_verify`, `delivery_status`, `order_date`) VALUES
(1, 29, 1, 'Pure Bliss', 50, 1, 50, 'Ordered', 'confirmed', '', '2019-06-22'),
(2, 29, 1, 'Wafers', 40, 1, 40, 'Ordered', 'pending', '', '2019-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(1000) NOT NULL,
  `user_name` varchar(1000) NOT NULL,
  `user_gender` varchar(1000) NOT NULL,
  `user_rollno` varchar(1000) NOT NULL,
  `class_id` int(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_name`, `user_gender`, `user_rollno`, `class_id`, `user_password`, `date`) VALUES
(1, 'adeleye@yahoo.com', 'Adeleye Jonathan', 'male', 'DLHS/ABK/18/0726', 1, 'male', '2019-06-21'),
(2, 'angelbert2@yahoo.com', 'Angelbert Joshua', 'male', 'DLHS/ABK/18/0715', 1, 'male', '2019-06-21'),
(3, 'adewumishalom@yahoo.com', 'ADEWUMI SHALOM', 'male', 'DLHS/ABK/18/0717', 1, 'male', '2019-06-21'),
(4, 'albertlaura@yahoo.com', 'ALBERT LAURA', 'female', 'DLHS/ABK/18/0702', 1, 'female', '2019-06-21'),
(5, 'amosfreedom@yahoo.com', 'AMOS FREEDOM', 'male', 'DLHS/ABK/18/0709', 1, 'male', '2019-06-21'),
(6, 'ayenidemilade@yahoo.com', 'AYENI DEMILADE', 'female', 'DLHS/ABK/18/0701', 1, 'female', '2019-06-21'),
(7, 'braimohgrace@yahoo.com', 'BRAIMOH GRACE', 'female', 'DLHS/ABK/18/0699', 1, 'female', '2019-06-21'),
(8, 'busuyikehinde@yahoo.com', 'BUSUYI KEHINDE', 'male', 'DLHS/ABK/18/0632', 1, 'male', '2019-06-21'),
(9, 'chukwumarvellous@yahoo.com', 'CHUKWU MARVELLOUS', 'female', 'DLHS/ABK/18/0707', 1, 'female', '2019-06-21'),
(10, 'chukwummesoma@yahoo.com', 'CHUKWU MMESOMA', 'female', 'DLHS/ABK/18/0700', 1, 'female', '2019-06-21'),
(11, 'efunbotedeborah@yahoo.com', 'EFUNBOTE DEBORAH', 'female', 'DLHS/ABK/18/0779', 1, 'female', '2019-06-21'),
(12, 'ezeamuziegodsradiance@yahoo.com', 'EZEAMUZIE GODSRADIANCE', 'female', 'DLHS/ABK/18/0703', 1, 'female', '2019-06-21'),
(13, 'ibiambrian@yahoo.com', 'IBIAM BRIAN', 'male', 'DLHS/ABK/18/0710', 1, 'male', '2019-06-21'),
(14, 'ikemexcelsis@yahoo.com', 'IKEM EXCELSIS', 'female', 'DLHS/ABK/18/0698', 1, 'female', '2019-06-21'),
(15, 'ikemefunajoshua@yahoo.com', 'IKEMEFUNA JOSHUA JAMES', 'male', 'DLHS/ABK/18/0704', 1, 'male', '2019-06-21'),
(16, 'kakayayaifeoluwa@yahoo.com', 'KAKAYAYA IFEOLUWA', 'male', 'DLHS/ABK/18/0784', 1, 'male', '2019-06-21'),
(17, 'nwokorochidiebere@yahoo.com', 'NWOKORO CHIDIEBERE WISDOM', 'male', 'DLHS/ABK/18/0708', 1, 'male', '2019-06-21'),
(18, 'ogboguugochukwu@yahoo.com', 'OGBOGU UGOCHUKWU', 'male', 'DLHS/ABK/18/0716', 1, 'male', '2019-06-21'),
(19, 'olokedamilare@yahoo.com', 'OLOKE DAMILARE', 'male', 'DLHS/ABK/18/0713', 1, 'male', '2019-06-21'),
(20, 'obetadavid@yahoo.com', 'OBETA DAVID', 'male', 'DLHS/ABK/18/0706', 1, 'male', '2019-06-21'),
(21, 'olubukunmiayoadetofarati@yahoo.com', 'OLUBUKUNMI-AYOADE TOFARATI', 'female', 'DLHS/ABK/18/0697', 1, 'female', '2019-06-21'),
(22, 'onuohadaniel@yahoo.com', 'ONUOHA DANIEL', 'male', 'DLHS/ABK/18/0714', 1, 'male', '2019-06-21'),
(23, 'olaleyeomobosola@yahoo.com', 'OLALEYE OMOBOSOLA', 'female', 'DLHS/ABK/18/0727', 1, 'female', '2019-06-21'),
(24, 'otegboladivinetrust@yahoo.com', 'OTEGBOLA DIVINE-TRUST', 'female', 'DLHS/ABK/18/0705', 1, 'female', '2019-06-21'),
(25, 'onojapeter@yahoo.om', 'ONOJA PETER', 'male', 'DLHS/ABK/18/0712', 1, 'male', '2019-06-21'),
(26, 'pauldarrelufedo@yahoo.com', 'PAUL DARREL UFEDO', 'male', 'DLHS/ABK/18/0711', 1, 'male', '2019-06-21'),
(27, 'anichukwuemmanuel@yahoo.com', 'ANICHUKWU EMMANUEL', 'male', 'DLHS/ABK/18/0785', 1, 'male', '2019-06-21'),
(28, 'ainafaith@yahoo.com', 'AINA FAITH', 'female', 'DLHS/ABK/18/0786', 1, 'female', '2019-06-21'),
(29, 'adekalu@yahoo.com', 'ADEKALU PRAISE FAYOKEMI', 'female', 'ABK/18/0791', 1, 'female', '2019-06-21'),
(30, 'obikoya@yahoo.com', 'OBIKOYA MOTOLANI', 'female', 'ABK/18/0792', 1, 'female', '2019-06-21'),
(31, 'oladipupoesther@yahoo.com', 'OLADIPUPO ESTHER', 'female', 'ABK/18/0793', 1, 'female', '2019-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE IF NOT EXISTS `voucher` (
  `id` int(11) NOT NULL,
  `voucher` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `deduction`
--
ALTER TABLE `deduction`
  ADD PRIMARY KEY (`deduction_id`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK_orderdetails_1` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `deduction`
--
ALTER TABLE `deduction`
  MODIFY `deduction_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `FK_orderdetails_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
