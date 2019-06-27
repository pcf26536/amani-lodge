-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 28, 2019 at 04:01 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

DROP DATABASE IF EXISTS argie_tamera;

CREATE DATABASE IF NOT EXISTS argie_tamera;

USE argie_tamera;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `argie_tamera`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `auth` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `position` varchar(45) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`user_id`, `username`, `password`, `position`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'sheila', 'sheila', 'frontdesk');

CREATE TABLE IF NOT EXISTS `amenities` (
  `amenities_id` int(11) NOT NULL AUTO_INCREMENT,
  `pic` varchar(100) NOT NULL,
  `des` text NOT NULL,
  PRIMARY KEY (`amenities_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`amenities_id`, `pic`, `des`) VALUES
(1, 'amenities/IconAC.jpg', 'Every room in MARA LODGE has Air Conditioning. Each room has an easy-to-use remote control to set your comfort level without having to leave the bed.'),
(2, 'amenities/IconBkfst.jpg', 'Upon your arrival, you will recieve a complimentary "Welcome Drink" for your travel here. Also, there is Free Breakfast for all accomodations.'),
(3, 'amenities/IconCocktail.jpg', 'Located in the lobby, we offer a full-service Bar & Coffee Shop with a variety of beverages. '),
(4, 'amenities/IconFunction.jpg', 'Located on the 4th floor, we hold many activities for all occasions here in the Function Room. One can reserve this room for conferences, parties, and more.'),
(5, 'amenities/IconGen.jpg', 'We have generators on standby 24 hours a day, 7 days a week in an event of a "Brown Out", providing uninterrupted electricity service to the building.'),
(6, 'amenities/IconLaundry.jpg', 'Whether on business or pleasure, we provide laundry and pressing service here. We deliver your clothes to your room, or in person to accomodate your schedule.'),
(7, 'amenities/IconLongDist.jpg', 'Need to call home or send documents? We provide Fax services and phones equipped for Long Distance calls to home, the office, or anywhere in between.'),
(8, 'amenities/restaurantLG.jpg', 'Not only a great place to eat, but has great street-side view of maasai mara national park. '),
(9, 'amenities/IconShower.jpg', 'Every room is individualy equipped with personal water heaters in the showers. Fully adjustable, you''ll always have a comfortable shower without burning or freezing yourself.'),
(10, 'amenities/IconTaxi.jpg', 'Have a meeting to go to or just want to go out? You can schedule trips anywhere around the city by utilizing our transportation service offered here.'),
(11, 'amenities/IconTV.jpg', 'No room would be complete without complimentary Cable TV and telephone service in every room. Channels may vary.'),
(12, 'amenities/SmIconWiFi.png', 'Free wifi is available within Mara lodge');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` int(11) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `city`, `country`, `email`, `contact`, `password`, `address`) VALUES
(27, 'eric', 'wachira', 'nyahururu', 'Kenya', 'erintel18@gmail.com', 724341695,  'heavensent18', '615'),
(39, 'eric', 'wachira', 'nyahururu', 'Kenya', 'erintel18@gmail.com', 724341695,  'heavensent18', '615'),
(66, 'james', 'waweru', 'naivasha', 'Kenya', 'eriwa1@live.com', 727731541, '12345', '615'),
(63, 'John', 'Corner', 'Adis Ababa', 'Ethiopia', 'eriwa1@live.com', 712121211,'wachiraz', '615'),
(36, 'john', 'mwangi', 'cairo', 'Congo', 'mwas2@yahoo.com', 702862415, '12345', '615'),
(64, 'eric', 'wachira', 'nyahururu', 'Kenya', 'erintel18@gmail.com', 724341695, 'heavensent18', '615'),
(68, 'eric', 'wachira', 'nyahururu', 'Kenya', 'erintel18@gmail.com', 724341695,'heavensent18', '615'),
(71, 'samuel', 'mwangi', 'thika', 'Kenya', 'githaesam@gmail.com', 721166337, '12345', '615'),
(67, 'dorcas', 'muthoni', 'ku', 'Kenya', 'dorcasmuthoni@gmail.com', 713449152, 'johnnjenga', '615'),
(31, 'joel', 'wamae', 'NAIROBI','Kenya', 'eriwa9801@gmail.com', 702862415, 'heavensent18', '615'),
(72, 'samuel', 'mwangi', 'thika', 'Kenya', 'githaesam@gmail.com', 721166337,'12345', '615'),
(65, 'john123', 'main233', 'sjdjjjjjj223', 'Kenya', 'eriwa1@live.com', 71235645,'12345', '615'),
(74, 'samuel', 'mwangi', 'thika', 'Kenya', 'githaesam@gmail.com', 721166337, '12345', '615'),
(75, 'samuel', 'mwangi', 'thika', 'Kenya', 'githaesam@gmail.com', 721166337, '12345', '615'),
(76, 'samuel', 'mwangi', 'thika','Kenya', 'githaesam@gmail.com', 721166337, '12345', '615'),
(77, 'samuel', 'mwangi', 'thika', 'Kenya', 'githaesam@gmail.com', 721166337, '12345', '615'),
(78, 'samuel', 'mwangi', 'thika', 'Kenya', 'githaesam@gmail.com', 721166337, '12345', '615'),
(87, 'dorcas', 'waweru', 'nyeri', 'Kenya', 'dorcaswaweru@yahoo.com', 702862415, '12345678', '615'),
(88, 'dorcas', 'waweru', 'nyeri', 'Kenya', 'dorcaswaweru@yahoo.com', 702862415,'12345678', '615'),
(89, 'dorcas', 'waweru', 'nyeri', 'Kenya', 'dorcaswaweru@yahoo.com', 702862415, '12345678', '615'),
(90, 'dorcas', 'waweru', 'nyeri', 'Kenya', 'dorcaswaweru@yahoo.com', 702862415, '12345678', '615'),
(91, 'dorcas', 'waweru', 'nyeri', 'Kenya', 'dorcaswaweru@yahoo.com', 702862415, '12345678', '615'),
(92, 'dorcas', 'waweru', 'nyeri', 'Kenya', 'dorcaswaweru@yahoo.com', 702862415, '12345678', '615');

-- --------------------------------------------------------


--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `rate` int(11) NOT NULL,
  `description` varchar(300) NOT NULL,
  `image` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `max_adult` int(11) NOT NULL,
  `max_child` int(11) NOT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `type`, `rate`, `description`, `image`, `qty`, `max_adult`, `max_child`) VALUES
(9, 'Superior', 9500, '3king sized bed,hot shower,Fully air conditioned,wifi,t.v', 'photos/superiora.jpg', 10, 3, 5),
(10, 'Deluxe', 8500, 'double king sized bed,hot shower,air conditioned,wifi,t.v', 'photos/deluxe.jpg', 10, 3, 5),
(11, 'Standard', 7500, 'Queen sized bed,air conditioner,wi-fi,tv', 'photos/standard.jpg', 10, 3, 5),
(12, 'Tent', 6000, 'double mahogany bed,wi-fi,t.v', 'photos/tent.jpg', 10, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `arrival` varchar(30) NOT NULL,
  `departure` varchar(30) NOT NULL,
  `adults` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `result` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `no_room` int(11) NOT NULL,
  `payable` int(11) NOT NULL,
  `code` varchar(30) NOT NULL UNIQUE,
  `status` varchar(10) NOT NULL,
  `confirmation` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`reservation_id`),
  FOREIGN KEY (`user_id`) REFERENCES users (`user_id`),
  FOREIGN KEY (`room_id`) REFERENCES room (`room_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=93 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`user_id`,`arrival`, `departure`, `adults`, `child`, `result`, `room_id`, `no_room`, `payable`, `status`, `confirmation`, `code`) VALUES
(27, '14/03/2019', '15/03/2019', 1, 2, 1, 11, 11, 10450, 'out', 'i0qhe7y6', 'NCS1STVTC7'),
(39, '19/03/2019', '20/03/2019', 1, 0, 1, 9, 5, 0, 'out', 'gsq8opfh', 'NCS1STVTC8'),
(66, '26/03/2019', '27/03/2019', 1, 1, 1, 10, 1, 8500, 'active', 'fcikycx3', 'NCS1STVTC9'),
(63, '20/03/2019', '21/03/2019', 1, 0, 1, 10, 1, 8500, 'out', 'mn0ffr0i', 'NCS1STVTC0'),
(36, '14/03/2019', '16/03/2019', 1, 2, 2, 11, 2, 3800, 'out', 'azgsnmca', 'NCS1STVTC1'),
(64, '20/03/2019', '22/03/2019', 1, 0, 2, 11, 2, 30000, 'out', '3shqpo3f', 'NCS1STVTC2'),
(68, '28/03/2019', '30/03/2019', 2, 0, 2, 10, 2, 34000, 'active', 'tnb5fgay', 'NCS1STVTC3'),
(71, '27/03/2019', '29/03/2019', 1, 0, 1, 9, 2, 38000, 'active', 'uxfm2ngf', 'NCS1STVTC4'),
(67, '26/03/2019', '27/03/2019', 1, 0, 1, 9, 3, 28500, 'active', '4gswyafu', 'NCS1STVTC5'),
(31, '11/03/2019', '13/03/2019', 2, 0, 2, 10, 4, 8800, 'out', 'ke5jin7t', 'NCS1STVTC6'),
(72, '27/03/2019', '28/03/2019', 1, 0, 1, 11, 9, 67500, 'out', 'mnra23gt', 'NCS1STVTB0'),
(65, '21/03/2019', '21/03/2019', 1, 0, 1, 9, 0, 23456, 'active', 'pkf22jkg', 'NCS1STVTB1'),
(74, '27/03/2019', '28/03/2019', 1, 0, 1, 11, 9, 67500, 'out', 'hzbh3n7z', 'NCS1STVTB2'),
(75, '27/03/2019', '28/03/2019', 1, 0, 1, 11, 9, 67500, 'out', 'o0ikzx7b', 'NCS1STVTB3'),
(76, '27/03/2019', '29/03/2019', 1, 0, 1, 11, 2, 30000, 'active', 'dumogz0k', 'NCS1STVTB4'),
(77, '27/03/2019', '29/03/2019', 1, 0, 2, 11, 2, 30000, 'out', 'pudgmce4', 'NCS1STVTB5'),
(78, '27/03/2019', '29/03/2019', 1, 0, 2, 11, 2, 30000, 'out', '07m4awzt', 'NCS1STVTB6'),
(87, '28/03/2019', '30/03/2019', 2, 0, 2, 12, 2, 24000, 'active', 'daccsm4d', 'NCS1STVTB7'),
(88, '28/03/2019', '30/03/2019', 2, 0, 2, 12, 2, 24000, 'active', 'sfi7es3f', 'NCS1STVTB8'),
(89, '28/03/2019', '30/03/2019', 2, 0, 2, 12, 2, 24000, 'active', 'ysawtb0q', 'NCS1STVTB9'),
(90, '28/03/2019', '30/03/2019', 2, 0, 2, 12, 2, 24000, 'active', 'pt27twt8', 'NCS1STVTE0'),
(91, '28/03/2019', '30/03/2019', 2, 0, 2, 12, 2, 24000, 'active', 'k5iesax0', 'NCS1STVTE1'),
(92, '28/03/2019', '30/03/2019', 2, 0, 2, 12, 2, 24000, 'active', 'mezp3mhv', 'NCS1STVTE2');

-- --------------------------------------------------------

--
-- Table structure for table `roominventory`
--

CREATE TABLE IF NOT EXISTS `roominventory` (
  `roominventory_id` int(11) NOT NULL AUTO_INCREMENT,
  `arrival` varchar(30) NOT NULL,
  `departure` varchar(30) NOT NULL,
  `qty_reserve` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `confirmation` varchar(10) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`roominventory_id`),
  FOREIGN KEY (`room_id`) REFERENCES room (`room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=97 ;

--
-- Dumping data for table `roominventory`
--

INSERT INTO `roominventory` (`roominventory_id`, `arrival`, `departure`, `qty_reserve`, `room_id`, `confirmation`, `status`) VALUES
(30, '09/03/2019', '11/03/2019', 4, 10, '6z7r6t87', 'Active'),
(31, '11/03/2019', '13/03/2019', 4, 10, 'ke5jin7t', 'Active'),
(34, '13/03/2019', '14/03/2019', 4, 10, '2j6yeky7', 'Active'),
(37, '15/03/2019', '18/03/2019', 5, 10, 'oxx2ziss', 'Active'),
(65, '21/03/2019', '21/03/2019', 5, 9, 'pkf22jkg', 'Active'),
(66, '26/03/2019', '27/03/2019', 1, 10, 'fcikycx3', 'Active'),
(67, '26/03/2019', '27/03/2019', 3, 9, '4gswyafu', 'Active'),
(68, '28/03/2019', '30/03/2019', 2, 10, 'tnb5fgay', 'Active'),
(71, '27/03/2019', '29/03/2019', 2, 9, 'uxfm2ngf', 'Active'),
(72, '27/03/2019', '28/03/2019', 9, 11, 'mnra23gt', 'Active'),
(73, '27/03/2019', '28/03/2019', 9, 11, 'vt8hticg', 'Active'),
(74, '27/03/2019', '28/03/2019', 9, 11, 'hzbh3n7z', 'Active'),
(75, '27/03/2019', '28/03/2019', 9, 11, 'o0ikzx7b', 'Active'),
(76, '27/03/2019', '29/03/2019', 2, 11, 'dumogz0k', 'Active'),
(77, '27/03/2019', '29/03/2019', 2, 11, 'pudgmce4', 'Active'),
(78, '27/03/2019', '29/03/2019', 2, 11, '07m4awzt', 'Active'),
(79, '27/03/2019', '29/03/2019', 2, 11, 'm5tj5xir', 'Active'),
(80, '27/03/2019', '29/03/2019', 2, 11, 'nwdb5m5w', 'Active'),
(81, '27/03/2019', '29/03/2019', 2, 11, 'dhcvaapp', 'Active'),
(84, '26/03/2019', '28/03/2019', 2, 10, 'o3icnj5u', 'Active'),
(85, '26/03/2019', '28/03/2019', 2, 10, 'ffnkakjf', 'Active'),
(86, '28/03/2019', '30/03/2019', 2, 11, 'isauo340', 'Active'),
(87, '28/03/2019', '30/03/2019', 2, 12, 'daccsm4d', 'Active'),
(88, '28/03/2019', '30/03/2019', 2, 12, 'sfi7es3f', 'Active'),
(89, '28/03/2019', '30/03/2019', 2, 12, 'ysawtb0q', 'Active'),
(90, '28/03/2019', '30/03/2019', 2, 12, 'pt27twt8', 'Active'),
(91, '28/03/2019', '30/03/2019', 2, 12, 'k5iesax0', 'Active'),
(92, '28/03/2019', '30/03/2019', 2, 12, 'hxbcpas5', 'Active'),
(93, '28/03/2019', '30/03/2019', 2, 12, 'rrz72qdt', 'Active'),
(94, '28/03/2019', '30/03/2019', 2, 12, 'o7smmfgy', 'Active'),
(95, '28/03/2019', '30/03/2019', 2, 12, 'e2ebqh6h', 'Active'),
(96, '28/03/2019', '30/03/2019', 2, 12, 'mezp3mhv', 'Active');

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `name`, `email`, `content`) VALUES
(1, 'eric', 'erintel18@gmail.com', 'tomorrow is on friday'),
(2, 'joel', 'eriwa9801@gmail.com', 'thanks 4 your services'),
(3, 'samuel', 'githaesam@gmail.com', 'programming is fun');

-- --------------------------------------------------------

--
-- Table structure for table `payment_notification`
--

CREATE TABLE IF NOT EXISTS `payment_notification` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` varchar(100) NOT NULL,
  `item_number` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `amount` decimal(65,0) NOT NULL,
  `currency` varchar(20) NOT NULL,
  `txn_id` varchar(30) NOT NULL,
  `payer_email` varchar(100) NOT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `payment_notification`
--

INSERT INTO `payment_notification` (`pay_id`, `item_name`, `item_number`, `status`, `amount`, `currency`, `txn_id`, `payer_email`) VALUES
(1, 'Superior', 'hssa40d5', 'CompletedOut', 3000, 'PHP', '14G24020NN154222R', 'argiep_1323161216_per@gmail.com'),
(2, 'Standard Double', 'p2mzycvy', 'Completed', 33, 'PHP', '66J76616N2842804Y', 'argiep_1323161216_per@gmail.com');

-- --------------------------------------------------------

--
-- Constraints for dumped tables
--

--
-- Constraints for table `room`
--
-- ALTER TABLE `room`
  -- ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `amenities` (`amenities_id`) ON UPDATE CASCADE;
