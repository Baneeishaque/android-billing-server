-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2017 at 06:00 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `android-billing`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` int(11) NOT NULL,
  `month` varchar(15) NOT NULL,
  `year` int(11) NOT NULL,
  `total-amount` double NOT NULL,
  `total-tax` double NOT NULL,
  `net-amount` double NOT NULL,
  `shop-id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `day`, `month`, `year`, `total-amount`, `total-tax`, `net-amount`, `shop-id`) VALUES
(1, 23, '02', 2017, 7110, 280, 7380, 10),
(2, 23, '02', 2017, 7110, 280, 7380, 2),
(3, 23, '02', 2017, 7110, 280, 7380, 3),
(4, 24, '02', 2017, 7110, 280, 7380, 10),
(5, 24, '02', 2017, 7110, 280, 7380, 2),
(6, 24, '02', 2017, 7110, 280, 7380, 3);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE IF NOT EXISTS `bill` (
  `id` int(11) NOT NULL,
  `product-name` varchar(50) NOT NULL,
  `amount` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `product-name`, `amount`, `tax`, `total`) VALUES
(1011, 'pen', 200, 15, 215),
(1011, 'book', 600, 30, 630),
(1011, 'cap', 300, 15, 315),
(1011, 'watch', 200, 3, 203),
(1011, 'ring', 200, 2, 202),
(1012, 'boot', 500, 60, 560),
(1012, 'bat', 1000, 15, 1015),
(1012, 'ball', 800, 20, 820),
(1012, 'jercy', 200, 10, 210),
(1012, 'cup', 200, 10, 210),
(1013, 't-shirt', 250, 20, 270),
(1013, 'pant', 800, 30, 830),
(1013, 'shirt', 600, 30, 630),
(1013, 'inner', 150, 10, 160),
(1013, 'sari', 1000, 20, 1020);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('username', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `unit-price` double NOT NULL,
  `stock` int(11) NOT NULL,
  `minimum-stock` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `unit-price`, `stock`, `minimum-stock`, `shop_id`) VALUES
(2, 'p2', 5, 17, 10, 10),
(3, 'p3', 6, 12, 2, 10),
(4, 'pvc pipe 2inch', 150, 500, 50, 17),
(5, 'aluminium  sheet (first quality)', 400, 250, 25, 17),
(6, 'metal sheet', 500, 50, 75, 17);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
  `bill-no` int(11) NOT NULL,
  `shop-id` int(11) NOT NULL,
  `purchase-id` int(11) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` double NOT NULL,
  `tax` double NOT NULL,
  `total` double NOT NULL,
  `customer-name` varchar(50) NOT NULL,
  `customer-mob` varchar(50) NOT NULL,
  `day` int(11) NOT NULL,
  `month` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`purchase-id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`bill-no`, `shop-id`, `purchase-id`, `time`, `amount`, `tax`, `total`, `customer-name`, `customer-mob`, `day`, `month`, `year`) VALUES
(1011, 10, 1, '2017-02-23 14:42:53', 1500, 65, 1565, 'samad', '9633332205', 23, '02', 2017),
(1012, 10, 2, '2017-02-23 15:32:29', 2700, 105, 2805, 'jijith', '9666348821', 23, '02', 2017),
(1013, 10, 3, '2017-02-23 15:45:39', 2910, 110, 2910, 'ramees', '8943775931', 23, '02', 2017),
(1011, 2, 4, '2017-02-23 09:12:53', 1500, 65, 1565, 'samad', '9633332205', 23, '02', 2017),
(1012, 2, 5, '2017-02-23 10:02:29', 2700, 105, 2805, 'jijith', '9666348821', 23, '02', 2017),
(1013, 2, 6, '2017-02-23 10:15:39', 2910, 110, 2910, 'ramees', '8943775931', 23, '02', 2017),
(1011, 3, 7, '2017-02-23 09:12:53', 1500, 65, 1565, 'samad', '9633332205', 23, '02', 2017),
(1012, 3, 8, '2017-02-23 10:02:29', 2700, 105, 2805, 'jijith', '9666348821', 23, '02', 2017),
(1013, 3, 9, '2017-02-23 10:15:39', 2910, 110, 2910, 'ramees', '8943775931', 23, '02', 2017),
(1011, 10, 10, '2017-02-23 09:12:53', 1500, 65, 1565, 'samad', '9633332205', 24, '02', 2017),
(1012, 10, 11, '2017-02-23 10:02:29', 2700, 105, 2805, 'jijith', '9666348821', 24, '02', 2017),
(1013, 10, 12, '2017-02-23 10:15:39', 2910, 110, 2910, 'ramees', '8943775931', 24, '02', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE IF NOT EXISTS `shop` (
  `reg.no` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `owner` int(11) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`reg.no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`reg.no`, `name`, `category`, `location`, `owner`, `admin`) VALUES
(10, 'os1', 'c1', 'l1', 3, 5),
(11, 'mk hard ', 'hard', 'tirur', 6, 7),
(12, 'KK', 'Eletrical', 'Tirur', 8, 0),
(13, 'MK ', 'Supermarket ', 'Kavilakkkad', 8, 0),
(14, 'KR ', 'Bakery', 'Tirunavaya', 8, 0),
(15, 'metals', 'hardware', 'alathiyur ', 6, 0),
(16, 'pkh', 'sale', 'tirur', 9, 0),
(17, 'metal', 'hardware', 'alingal', 10, 0),
(18, 'COLOUR BALOON', 'Toys', 'Tirur', 8, 0),
(19, 'KISMATH', 'Fancy', 'Alathiyur', 8, 0),
(20, 'Jk', 'Sports', 'Tirur', 6, 0),
(21, 'narayan ', 'hardware ', 'tirur ', 15, 18),
(22, 'narayan ', 'textiles ', 'tirur', 15, 0),
(23, 'narayan ', 'electronics ', 'tirur ', 15, 0),
(24, 'j hard', 'hard', 'tirur', 19, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `shop_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `role`, `shop_id`, `name`) VALUES
(3, 'o1', 'o1', 'o1@e.com', 'owner', 0, '0'),
(4, 'osu1', 'osp1', 'ose@e.com', 'keeper', 10, 'osn1'),
(5, 'osu2', 'osp2', 'osn2@e.com', 'keeper', 10, 'osn2'),
(6, 'jijith ', 'xxx', 'a@gmail.com', 'owner', 0, '0'),
(7, 'su', 's', 's', 'keeper', 11, 'su'),
(8, 'Messi', 'Messi', '', 'owner', 0, '0'),
(9, 'rafeeq', '1234', 'rafeeq@mail.com', 'owner', 0, '0'),
(10, 'shamsu', 'sha', 'shamsu', 'owner', 0, '0'),
(11, 'samad', 'samad', 'samad', 'keeper', 17, 'samad'),
(12, 'Kaka', 'Kaka', '', 'keeper', 12, 'Riyas'),
(13, 'Nani', 'Nani', '', 'owner', 0, '0'),
(14, '99', '99', '', 'keeper', 18, 'Hashir'),
(15, 'narayan', 'narayan ', 'narayan ', 'owner', 0, '0'),
(16, 'mon', 'mon', 'mon', 'keeper', 21, 'mon'),
(17, 'mol', 'mol', 'mol', 'keeper', 21, 'mol'),
(18, 'sura ', 'sura ', 'sura ', 'keeper', 21, 'sura '),
(19, 'j', 'j', 'j', 'owner', 0, '0'),
(20, 'i', 'i', 'i', 'keeper', 24, 'i');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
