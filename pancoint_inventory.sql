-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 19, 2018 at 11:51 PM
-- Server version: 5.6.41-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pancoint_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `batcheditem`
--

CREATE TABLE `batcheditem` (
  `uid` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `oldq` int(11) NOT NULL,
  `newq` int(11) NOT NULL,
  `cost` varchar(20) NOT NULL,
  `selingprice` varchar(20) NOT NULL,
  `user` int(11) NOT NULL,
  `bdate` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batcheditem`
--

INSERT INTO `batcheditem` (`uid`, `item_id`, `oldq`, `newq`, `cost`, `selingprice`, `user`, `bdate`, `status`, `batch`) VALUES
(1, 1, 1, 2, '55000', '60000', 11, '2015-05-01', 'Added', 0),
(2, 23, 9, 6, '1000', '2000', 13, '2015-11-05', 'Added', 0),
(3, 26, 2, 17, '3000', '4000', 13, '2015-11-05', 'Added', 0),
(4, 25, 1, 6, '1500', '2500', 13, '2015-11-05', 'Added', 0),
(5, 23, 9, 3, '1000', '2000', 13, '2015-11-05', 'Added', 0),
(6, 27, 1, 17, '4000', '6000', 13, '2015-11-05', 'Added', 0),
(7, 25, 1, 6, '1500', '2500', 13, '2015-11-05', 'Added', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `price` varchar(20) NOT NULL,
  `soldprice` varchar(20) NOT NULL,
  `item_id` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL,
  `transID` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `item`, `price`, `soldprice`, `item_id`, `quantity`, `user`, `xdate`, `transID`, `status`) VALUES
(1, 'Dell 15', '50000', '60000', '1', 1, 11, '2015-05-01', '4143048409082', 0),
(2, '', '', '', '', 0, 11, '2015-05-01', '4143048409082', 0),
(4, '', '', '', '', 0, 12, '2015-06-08', '3143375507257', 0),
(5, 'HP Optical Mouse', '650', '800', '4', 1, 12, '2015-06-08', '8143376064171', 0),
(6, '', '', '', '', 0, 12, '2015-06-08', '8143376064171', 0),
(7, 'HP LaserJet P1102w', '23700', '26000', '108', 1, 12, '2015-06-09', '7143385002948', 0),
(8, '', '', '', '', 0, 12, '2015-06-09', '7143385002948', 0),
(9, 'Dell Optical Mouse', '550', '800', '5', 1, 12, '2015-06-10', '2143392166439', 0),
(10, '', '', '', '', 0, 12, '2015-06-10', '2143392166439', 0),
(11, 'iPhone Power Bank Case (Newnow)', '5000', '6000', '105', 1, 12, '2015-06-10', '4143392273684', 0),
(12, '', '', '', '', 0, 12, '2015-06-10', '4143392273684', 0),
(13, 'Havit HV-SK473', '900', '1200', '35', 1, 12, '2015-06-10', '1143393701894', 0),
(15, 'JcTech HeadPhones', '800', '1200', '80', 1, 12, '2015-06-10', '1143393701894', 0),
(17, 'Power Cable', '200', '500', '59', 1, 12, '2015-06-10', '1143393701894', 0),
(18, '', '', '', '', 0, 12, '2015-06-10', '1143393701894', 0),
(19, 'HP Adapter (19V)', '1000', '2500', '60', 1, 1, '2015-06-10', '51433948460108', 0),
(20, '', '', '', '', 0, 1, '2015-06-10', '51433948460108', 0),
(21, 'HP Adapter 19V (Big Mouth)', '1000', '2500', '60', 5, 1, '2015-06-11', '8143401281496', 0),
(22, 'HP Adapter 19V (Small Mouth)', '1000', '2500', '113', 1, 12, '2015-06-11', '41434013119310', 0),
(23, '', '', '', '', 0, 12, '2015-06-11', '41434013119310', 0),
(24, 'TP Link Wireless Adapter', '1800', '2500', '13', 2, 12, '2015-06-11', '71434025723710', 0),
(26, 'Tools Pack', '500', '1000', '18', 1, 12, '2015-06-11', '71434025723710', 0),
(28, 'Blackberry Charger', '400', '1000', '37', 2, 12, '2015-06-11', '71434025723710', 0),
(30, 'EarPhone (S4)', '400', '700', '54', 2, 12, '2015-06-11', '71434025723710', 0),
(32, 'EarPhone (Nokia)', '250', '400', '56', 1, 12, '2015-06-11', '71434025723710', 0),
(34, 'Power Cable', '200', '500', '59', 5, 12, '2015-06-11', '71434025723710', 0),
(36, 'Acer Adapter (19V)', '1000', '2000', '64', 1, 12, '2015-06-11', '71434025723710', 0),
(38, 'VGA Cables', '300', '500', '58', 1, 12, '2015-06-11', '71434025723710', 0),
(39, 'Infinix Hot', '16000', '18500', '53', 1, 1, '2015-06-12', '101434116341108', 0),
(40, 'Perfect Optical Mouse', '350', '500', '6', 1, 12, '2015-06-16', '6143445412095', 0),
(41, '', '', '', '', 0, 12, '2015-06-16', '6143445412095', 0),
(42, 'HDMI Cable', '1200', '1500', '78', 1, 12, '2015-06-22', '9143496049568', 0),
(44, 'Bluetooth Adapter', '400', '500', '14', 1, 12, '2015-06-22', '9143496049568', 0),
(45, 'iPad/iPhone 4 Charger', '800', '1500', '36', 1, 12, '2015-06-26', '7143530239454', 0),
(46, '', '', '', '', 0, 12, '2015-06-26', '7143530239454', 0),
(47, 'Printer Cable', '350', '500', '57', 1, 12, '2015-06-26', '7143530239454', 0),
(48, '', '', '', '', 0, 12, '2015-06-26', '7143530239454', 0),
(49, 'JcTech Comfortable Optical Mouse', '1200', '1500', '9', 1, 12, '2015-06-26', '3143531056043', 0),
(50, '', '', '', '', 0, 12, '2015-06-26', '3143531056043', 0),
(51, 'iPad/iPhone 4 Charger', '800', '1500', '36', 1, 12, '2015-06-29', '8143556820136', 0),
(52, '', '', '', '', 0, 12, '2015-06-29', '8143556820136', 0),
(53, 'JcTech USB Card Reader', '1500', '2000', '77', 1, 12, '2015-06-29', '10143556909493', 0),
(54, '', '', '', '', 0, 12, '2015-06-29', '10143556909493', 0),
(55, 'Havit USB Keyboard', '550', '800', '87', 1, 12, '2015-07-01', '2143574285319', 0),
(56, '', '', '', '', 0, 12, '2015-07-01', '2143574285319', 0),
(57, 'Havit USB Keyboard', '550', '800', '87', 1, 12, '2015-07-01', '91435743146610', 0),
(58, '', '', '', '', 0, 12, '2015-07-01', '91435743146610', 0),
(59, 'Printer Cable', '350', '500', '57', 1, 12, '2015-07-01', '101435750999110', 0),
(61, 'iPad/iPhone 4 Charger', '800', '1500', '36', 1, 12, '2015-07-01', '101435750999110', 0),
(62, 'iPad/iPhone 4 Charger', '800', '1500', '36', 1, 12, '2015-07-03', '8143590932521', 0),
(63, '', '', '', '', 0, 12, '2015-07-03', '8143590932521', 0),
(64, 'Perfect Optical Mouse', '350', '500', '6', 1, 12, '2015-07-03', '4143592736257', 0),
(65, '', '', '', '', 0, 12, '2015-07-03', '4143592736257', 0),
(66, '8GB Transcent (Jet 350)', '1500', '2000', '23', 1, 12, '2015-07-07', '2143625664464', 0),
(68, '8GB Transcent (Jet 350)', '1500', '2000', '23', 1, 12, '2015-07-07', '2143625664464', 0),
(70, 'Nokia Lumia 430', '13300', '16500', '115', 1, 12, '2010-01-01', '10126236566932', 0),
(72, 'Samsung Galaxy Core Prime', '24000', '27000', '116', 1, 12, '2010-01-01', '10126236566932', 0),
(74, 'Samsung Galaxy Grand Prime', '34000', '37000', '117', 1, 12, '2010-01-01', '10126236566932', 0),
(75, 'Lenovo A319', '15100', '17000', '118', 1, 12, '2010-01-01', '31262366541910', 0),
(77, '8GB Transcent (Jet 350)', '1500', '2000', '23', 1, 12, '2010-01-01', '31262366541910', 0),
(79, 'Samsung Note 2 Charger', '700', '2000', '39', 1, 12, '2010-01-01', '8126237109875', 0),
(80, '', '', '', '', 0, 12, '2010-01-01', '8126237109875', 0),
(81, 'iPad/iPhone 4 Charger', '800', '1500', '36', 1, 12, '2010-01-01', '8126237109875', 0),
(82, '', '', '', '', 0, 12, '2010-01-01', '8126237109875', 0),
(83, 'Nokia Lumia 430', '13300', '16500', '115', 1, 12, '2010-01-01', '2126236546461', 0),
(84, '', '', '', '', 0, 12, '2010-01-01', '2126236546461', 0),
(85, 'Samsung S4 Charger', '700', '1500', '38', 1, 12, '2010-01-01', '2126236546461', 0),
(87, '4GB Open Brand', '800', '1200', '22', 1, 12, '2010-01-01', '2126236546461', 0),
(88, '', '', '', '', 0, 12, '2010-01-01', '2126236546461', 0),
(89, 'Dell Wireless Mouse', '1300', '2500', '12', 1, 12, '2015-07-10', '314364815121010', 0),
(90, '', '', '', '', 0, 12, '2015-07-10', '314364815121010', 0),
(91, 'Perfect Optical Mouse', '350', '500', '6', 1, 12, '2015-07-10', '314364815121010', 0),
(92, '', '', '', '', 0, 12, '2015-07-10', '314364815121010', 0),
(93, 'Dell Wireless Mouse', '1300', '2500', '12', 1, 12, '2015-07-10', '31436483780109', 0),
(94, '', '', '', '', 0, 12, '2015-07-10', '31436483780109', 0),
(95, 'Dell Wireless Mouse', '1300', '2500', '12', 2, 12, '2015-08-17', '71439807879410', 0),
(97, 'Laptop Bags (Small)', '2500', '3000', '85', 1, 12, '2015-08-17', '71439807879410', 0),
(99, 'iPad/iPhone 4 Charger', '800', '1500', '36', 1, 12, '2015-08-17', '71439807879410', 0),
(101, 'VGA Cables', '300', '500', '58', 1, 12, '2015-08-17', '71439807879410', 0),
(103, 'Samsung S4 Charger', '700', '1500', '38', 1, 12, '2015-08-17', '71439807879410', 0),
(105, '4GB Open Brand', '800', '1200', '22', 1, 12, '2015-08-17', '7143980922162', 0),
(106, '', '', '', '', 0, 12, '2015-08-17', '7143980922162', 0),
(107, 'Havit USB Keyboard', '550', '800', '87', 2, 12, '2015-08-17', '8143981150668', 0),
(108, '', '', '', '', 0, 12, '2015-08-17', '8143981150668', 0),
(109, 'Perfect Optical Mouse', '350', '500', '6', 1, 12, '2015-08-17', '8143981150668', 0),
(110, '', '', '', '', 0, 12, '2015-08-17', '8143981150668', 0),
(111, 'Mercury PS2 Optical Mouse', '700', '800', '10', 1, 12, '2015-08-17', '8143981150668', 0),
(112, '', '', '', '', 0, 12, '2015-08-17', '8143981150668', 0),
(113, 'iPad/iPhone 4 Charger', '800', '1500', '36', 1, 12, '2015-09-24', '3144309649135', 0),
(114, '', '', '', '', 0, 12, '2015-09-24', '3144309649135', 0),
(115, 'Perfect Optical Mouse', '350', '500', '6', 1, 12, '2015-09-24', '3144309649135', 0),
(116, '', '', '', '', 0, 12, '2015-09-24', '3144309649135', 0),
(117, 'iPad/iPhone 4 Charger', '800', '1500', '36', 2, 12, '2015-09-29', '9144351336348', 0),
(118, '', '', '', '', 0, 12, '2015-09-29', '9144351336348', 0),
(119, 'HP Adapter 19V (Big Mouth)', '1000', '2500', '60', 1, 12, '2015-09-29', '9144351336348', 0),
(120, '', '', '', '', 0, 12, '2015-09-29', '9144351336348', 0),
(121, 'Samsung Galaxy Core Prime', '24000', '27000', '116', 1, 12, '2015-09-29', '9144351336348', 0),
(122, '', '', '', '', 0, 12, '2015-09-29', '9144351336348', 0),
(123, 'iPad/iPhone 4 Charger', '800', '1500', '36', 1, 12, '2015-09-30', '5144360852738', 0),
(124, '', '', '', '', 0, 12, '2015-09-30', '5144360852738', 0),
(125, 'Nokia Lumia 520', '19500', '22500', '114', 1, 12, '2015-09-30', '5144360852738', 0),
(126, '', '', '', '', 0, 12, '2015-09-30', '5144360852738', 0),
(127, 'Lenovo Tab A7', '15000', '25000', '45', 1, 12, '2015-10-09', '8144439878232', 0),
(129, 'Power Cable', '200', '500', '59', 1, 12, '2015-10-09', '8144439878232', 0),
(131, 'Power Bank', '1000', '2000', '40', 1, 12, '2015-10-09', '8144439878232', 0),
(133, '16GB SD Card', '1600', '2500', '43', 1, 12, '2015-10-09', '8144439878232', 0),
(135, '16GB Transcend (Jet 300)', '2200', '2500', '25', 1, 12, '2015-10-09', '8144439878232', 0),
(136, '', '', '', '', 0, 12, '2015-10-09', '8144439878232', 0),
(137, 'Havit USB Keyboard', '550', '800', '87', 1, 13, '2015-10-31', '3144629331651', 0),
(139, 'Nokia Lumia 520', '19500', '22500', '114', 1, 13, '2015-10-31', '3144629331651', 0),
(141, 'Samsung Note 2 Charger', '700', '2000', '39', 1, 13, '2015-10-31', '3144629331651', 0),
(142, '', '', '', '', 0, 13, '2015-10-31', '3144629331651', 0),
(143, 'Perfect Optical Mouse', '350', '500', '6', 3, 13, '2015-11-03', '3144653980538', 0),
(145, 'Lenovo Tab A7', '15000', '25000', '45', 1, 13, '2015-11-03', '3144653980538', 0),
(147, 'iPad/iPhone 4 Charger', '1000', '1500', '125', 1, 13, '2015-11-03', '3144653980538', 0),
(148, '', '', '', '', 0, 13, '2015-11-03', '3144653980538', 0),
(149, 'Infinix Hot 2', '18500', '22000', '132', 1, 13, '2015-11-03', '3144654323798', 0),
(150, '', '', '', '', 0, 13, '2015-11-03', '3144654323798', 0),
(151, 'Samsung Galaxy Grand Prime', '34000', '37000', '117', 1, 13, '2015-11-10', '11447147720109', 0),
(152, '', '', '', '', 0, 13, '2015-11-10', '11447147720109', 0),
(153, 'Samsung Bluetooth Earpiece', '1800', '3000', '127', 1, 13, '2015-11-12', '4144733342349', 0),
(155, 'Dell Optical Mouse', '550', '800', '5', 1, 13, '2015-11-12', '4144733342349', 0),
(157, 'Gear Head Wireless Mouse', '1000', '2000', '130', 1, 13, '2015-11-12', '4144733342349', 0),
(158, '', '', '', '', 0, 13, '2015-11-12', '4144733342349', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `category`, `user`, `xdate`) VALUES
(1, 'Computer Accessories', 11, '2015-05-01'),
(2, 'Network Accessories', 11, '2015-05-01'),
(3, 'New Phones', 11, '2015-05-01'),
(4, 'Used Phones', 11, '2015-05-01'),
(5, 'New NoteBooks', 11, '2015-05-01'),
(6, 'Used NoteBooks', 11, '2015-05-01'),
(7, 'iPad/Phone Accessories', 1, '2015-06-09'),
(8, 'CCTV Cameras', 1, '2015-06-01'),
(9, 'CCTV Accessories', 1, '2015-06-01'),
(10, 'Notebook Accessories', 1, '2015-06-01'),
(11, 'New iPads and Tablets', 1, '2015-06-02'),
(12, 'Used iPads and Tablets', 1, '2015-06-02'),
(13, 'Power Adapters', 1, '2015-06-02'),
(14, 'LaserJet Printers', 1, '2015-06-09'),
(15, 'Colour Printers', 1, '2015-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `clocking`
--

CREATE TABLE `clocking` (
  `cid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(300) NOT NULL,
  `email` varchar(50) NOT NULL,
  `clockin` time NOT NULL,
  `clockout` time NOT NULL,
  `idno` varchar(30) NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `sname` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL,
  `regnof` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `slogan` varchar(200) NOT NULL,
  `xdate` date NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `sname`, `address`, `regnof`, `email`, `phone`, `username`, `password`, `logo`, `slogan`, `xdate`, `user`) VALUES
(2, 'pl-transform', '11 BAYODE OLUWOLE STREET', 'DIS', 'info@pltransform.com', '08068870439', 'EXCEL', 'NDS1821', 'logo2.png', 'anything is possible', '2018-06-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `counter` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`counter`, `id`) VALUES
(126, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `idno` varchar(30) NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cid`, `tid`, `name`, `address`, `email`, `phone`, `birthday`, `idno`, `user`, `xdate`) VALUES
(1, 1, 'Vincent Ohiri', '', 'vinnoangel@gmail.com', '2347032208220', '0000-00-00', '339217510', 1, '2018-06-11'),
(2, 1, 'Hero Lawson', '', 'herolawson@gmail.com', '2348068870439', '0000-00-00', '339222710', 1, '2018-06-11'),
(6, 0, 'hero lawson', '11 bayode oluyole street ikeja ', 'herolawson@gmail.com', '2348068870439', '1980-05-05', '287361995', 1, '2018-06-11'),
(7, 0, 'GREG', '11 bayode oluyole street ikeja ', 'aca4luv@yahoo.com', '2347035112001', '2018-06-14', '28961366', 1, '2018-06-14'),
(8, 0, 'favor', '11 bayode oluyole street ikeja ', 'fendurance105@gmal.com', '2347016636684', '0000-00-00', '12345', 1, '2018-06-27');

-- --------------------------------------------------------

--
-- Table structure for table `customer_messages`
--

CREATE TABLE `customer_messages` (
  `mid` int(11) NOT NULL,
  `Sender` text NOT NULL,
  `Content` varchar(500) NOT NULL,
  `towhom` int(11) NOT NULL,
  `phones` longtext NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_messages`
--

INSERT INTO `customer_messages` (`mid`, `Sender`, `Content`, `towhom`, `phones`, `user`, `xdate`) VALUES
(1, 'PL-Transf', '    Testing', 1, '', 1, '2018-06-11'),
(2, 'PL-Transf', '    testing', 1, '', 1, '2018-06-11'),
(3, 'PLTRANSFORM', '    vffdfd', 1, '', 1, '2018-06-11'),
(4, 'pltransform', '   Do more to be more ', 2, '', 1, '2018-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `dailyexpenses`
--

CREATE TABLE `dailyexpenses` (
  `did` int(11) NOT NULL,
  `typeid` varchar(50) NOT NULL,
  `amount` double NOT NULL,
  `termid` int(11) NOT NULL,
  `sessionid` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `debtors`
--

CREATE TABLE `debtors` (
  `id` int(11) NOT NULL,
  `transID` varchar(30) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `qty` varchar(500) NOT NULL,
  `total_amount` varchar(10) NOT NULL,
  `paid` varchar(10) NOT NULL,
  `bal` double NOT NULL,
  `xdate` date NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eventcalender`
--

CREATE TABLE `eventcalender` (
  `eid` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `title` varchar(200) NOT NULL,
  `descr` longtext NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expensestype`
--

CREATE TABLE `expensestype` (
  `eid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expensestype`
--

INSERT INTO `expensestype` (`eid`, `name`, `user`, `xdate`) VALUES
(1, 'Fuel', 1, '2018-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `happyhour`
--

CREATE TABLE `happyhour` (
  `hid` int(11) NOT NULL,
  `shh` datetime NOT NULL,
  `ehh` datetime NOT NULL,
  `discount` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `happyhour` int(11) NOT NULL,
  `iid` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `price` varchar(20) NOT NULL,
  `saleprice` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `descript` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL,
  `bestSeller` int(11) NOT NULL,
  `item_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`happyhour`, `iid`, `cat_id`, `item`, `price`, `saleprice`, `image`, `descript`, `quantity`, `user`, `xdate`, `bestSeller`, `item_status`) VALUES
(0, 2, 6, 'Dell Latitude 13.3\"', '40000', '50000', '', 'Intel Core i5, 120GB HDD, 2GB RAM, Webcan, WLAN', 1, 1, '2015-05-15', 0, 1),
(0, 3, 6, 'Dell Inspiron 15', '50000', '55000', '', 'Intel Core i3, 320GB HDD, 4GB RAM, 15.6\", Webcam, WLAN', 1, 1, '2015-05-15', 0, 1),
(0, 5, 1, 'Dell Optical Mouse', '550', '800', '', 'Optical Mouse', 5002, 1, '2015-05-15', 0, 1),
(0, 6, 1, 'Perfect Optical Mouse', '350', '500', '', 'Optical Mouse', 3800, 1, '2015-05-15', 0, 1),
(0, 7, 1, 'Amax 3D Scroll Mouse', '250', '300', '', 'Sroll Mouse', 5009, 1, '2015-05-15', 0, 1),
(0, 8, 1, 'Maxtron Optical Mouse', '700', '800', '', 'Optical Mouse', 5004, 1, '2015-05-15', 0, 1),
(0, 9, 1, 'JcTech Comfortable Optical Mouse', '1200', '1500', '', 'Optical Mouse', 5001, 1, '2015-05-15', 0, 1),
(0, 10, 1, 'Mercury PS2 Optical Mouse', '700', '800', '', 'Optical Mouse', 5001, 1, '2015-05-15', 0, 1),
(0, 11, 1, 'HP Wireless Mouse', '1300', '2500', '', 'Wireless Mouse', 5005, 1, '2015-05-15', 0, 1),
(0, 12, 1, 'Dell Wireless Mouse', '1300', '2500', '', 'Wireless Mouse', 5000, 1, '2015-05-15', 0, 1),
(0, 13, 2, 'TP Link Wireless Adapter', '1800', '2500', '', 'USB Wireless Adapter', 0, 1, '2015-05-15', 0, 1),
(0, 14, 1, 'Bluetooth Adapter', '400', '500', '', 'Bluetooth Adapter', 5001, 1, '2015-05-15', 0, 1),
(0, 15, 1, 'USB Hub', '1900', '2400', '', 'HUB', 490, 1, '2015-05-15', 0, 1),
(0, 16, 1, 'HDD Enclosure', '800', '1200', '', 'Hard Drive Case', 5006, 1, '2015-05-15', 0, 1),
(0, 17, 1, 'Transcend DVD/CD Writer', '2500', '3500', '', 'External DVD writer', 2000, 1, '2015-05-15', 0, 1),
(0, 18, 1, 'Tools Pack', '500', '1000', '', 'Screw Drivers', 2001, 1, '2015-05-15', 0, 1),
(0, 19, 1, 'Bluetooth Cardbus', '2200', '2500', '', 'Bluetooth Add-on', 5001, 1, '2015-05-15', 0, 1),
(0, 20, 1, '4GB Transcend (Jet F300)', '1500', '1800', '', 'Flash Drive', 5002, 1, '2015-05-15', 0, 1),
(0, 21, 1, '4GB Transcend (Jet V70)', '1200', '1400', '', 'Flash Drive', 5005, 1, '2015-05-15', 0, 1),
(0, 22, 1, '4GB Open Brand', '800', '1200', '', 'Flash Drive', 5013, 1, '2015-05-15', 0, 1),
(0, 23, 1, '8GB Transcent (Jet 350)', '1500', '2000', '', 'Flash Drive', 5009, 1, '2015-05-15', 0, 1),
(0, 24, 1, '16GB Transcend (Jet 510G)', '2500', '3000', '', 'Flash Drive', 4995, 1, '2015-05-15', 0, 1),
(0, 25, 1, '16GB Transcend (Jet 300)', '2200', '2500', '', 'Flash Drive', 4980, 1, '2015-05-15', 0, 1),
(0, 26, 1, '32GB Transcend (Jet 510s)', '4200', '4700', '', 'Flash Drive', 5002, 1, '2015-05-15', 0, 1),
(0, 27, 1, '32GB Transcend (Jet 300)', '3500', '4000', '', 'Flash Drive', 5001, 1, '2015-05-15', 0, 1),
(0, 28, 1, '2GB Dell IPS', '1000', '1200', '', 'Flash Drive', 5021, 1, '2015-05-15', 0, 1),
(0, 29, 1, '1GB Dell Hand Band', '800', '1000', '', 'Flash Drive', 4991, 1, '2015-05-15', 0, 1),
(0, 30, 1, 'Digital PC Camera', '1000', '1500', '', 'External Webcam', 5001, 1, '2015-05-15', 0, 1),
(0, 31, 1, 'Kongda Data Cable', '500', '700', '', 'Fire Wire Cable', 5002, 1, '2015-05-15', 0, 1),
(0, 32, 1, 'ASDA 2.0 ', '1000', '2000', '', 'PC Speakers', 5001, 1, '2015-05-15', 0, 1),
(0, 33, 1, 'Havit HV-SK610', '1400', '1800', '', 'PC Speakers', 5002, 1, '2015-05-15', 0, 1),
(0, 34, 1, 'Havit HV-SK427', '1400', '1800', '', 'PC Speakers', 5003, 1, '2015-05-15', 0, 1),
(0, 35, 1, 'Havit HV-SK473', '900', '1200', '', 'PC Speakers', 5003, 1, '2015-05-15', 0, 1),
(0, 36, 7, 'iPad/iPhone 4 Charger', '800', '1500', '', 'Charger', 5, 1, '2015-06-01', 0, 1),
(0, 37, 7, 'Blackberry Charger', '400', '1000', '', 'BB Charger', 6, 1, '2015-06-01', 0, 1),
(0, 38, 7, 'Samsung S4 Charger', '700', '1500', '', 'S4 Charger', 4, 1, '2015-06-01', 0, 1),
(0, 39, 7, 'Samsung Note 2 Charger', '700', '2000', '', 'Charger', 6, 1, '2015-06-01', 0, 1),
(0, 40, 7, 'Power Bank', '1000', '2000', '', 'Power Bank', 4, 1, '2015-06-01', 0, 1),
(0, 41, 7, '4GB SD Card', '800', '1500', '', 'Memory Card', 6, 1, '2015-06-02', 0, 1),
(0, 42, 7, '8GB SD Card', '1000', '1800', '', 'Memory Card', 5, 1, '2015-06-02', 0, 1),
(0, 43, 7, '16GB SD Card', '1600', '2500', '', 'Memory Card', 0, 1, '2015-06-02', 0, 1),
(0, 44, 7, '32GB SD Card', '3000', '4000', '', 'Memory Card', 2, 1, '2015-06-02', 0, 1),
(0, 45, 11, 'Lenovo Tab A7', '15000', '25000', '', 'Tablet', 0, 1, '2015-06-02', 0, 1),
(0, 46, 12, 'Cruz Velocity', '12000', '15000', '', 'Tablet', 1, 1, '2015-06-02', 0, 1),
(0, 47, 3, 'Nokia X Dual Sim', '17850', '19000', '', 'Phone', 1, 1, '2015-06-02', 0, 1),
(0, 48, 3, 'Ocean 2', '', '', '', 'Phone', 0, 1, '2015-06-02', 0, 1),
(0, 49, 3, 'InnJoo One', '28000', '30000', '', 'Phone', 1, 1, '2015-06-02', 0, 1),
(0, 50, 3, 'Infinix Zero (8GB)', '', '', '', 'Phone', 0, 1, '2015-06-02', 0, 1),
(0, 51, 3, 'Infinix Zero (16GB)', '', '', '', 'Phone', 0, 1, '2015-06-02', 0, 1),
(0, 52, 3, 'Infinix Hot Note', '', '', '', 'Phone', 0, 1, '2015-06-02', 0, 1),
(0, 53, 3, 'Infinix Hot', '16000', '19000', '', 'Phone', 2, 1, '2015-06-02', 0, 1),
(0, 54, 7, 'EarPhone (S4)', '400', '700', '', 'HeadPhone', 2, 1, '2015-06-02', 0, 1),
(0, 55, 7, 'EarPhone (Symantec)', '300', '500', '', 'HeadPhone', 1, 1, '2015-06-02', 0, 1),
(0, 56, 7, 'EarPhone (Nokia)', '250', '400', '', 'HeadPhone', 5, 1, '2015-06-02', 0, 1),
(0, 57, 1, 'Printer Cable', '350', '500', '', 'Printer Cable', 4012, 1, '2015-06-02', 0, 1),
(0, 58, 1, 'VGA Cables', '300', '500', '', 'VGA Cable', 512, 1, '2015-06-02', 0, 1),
(0, 59, 1, 'Power Cable', '200', '500', '', 'Power Cable', 3020, 1, '2015-06-02', 0, 1),
(0, 60, 13, 'HP Adapter 19V (Big Mouth)', '1000', '2500', '', 'Power Adapters', 0, 1, '2015-06-11', 0, 1),
(0, 61, 13, 'Dell Adapter (19V)', '1300', '2500', '', 'Power Adapters', 5, 1, '2015-06-02', 0, 1),
(0, 62, 13, 'Sony (12V)', '500', '800', '', 'Power Adapters', 2, 1, '2015-06-02', 0, 1),
(0, 63, 13, 'Toshiba (19V)', '1500', '3500', '', 'Power Adapters', 4, 1, '2015-06-02', 0, 1),
(0, 64, 13, 'Acer Adapter (19V)', '1000', '2000', '', 'Power Adapters', 1, 1, '2015-06-02', 0, 1),
(0, 65, 13, 'Compaq Adapter (10V)', '600', '1000', '', 'Power Adapters', 4, 1, '2015-06-02', 0, 1),
(0, 66, 13, 'IBM Adapter (16V)', '1000', '2000', '', 'Power Adapters', 2, 1, '2015-06-02', 0, 1),
(0, 67, 13, 'Compaq Adapter (5V)', '600', '1000', '', 'Power Adapters', 1, 1, '2015-06-02', 0, 1),
(0, 68, 13, 'Other Adapters (12V)', '500', '800', '', 'Power Adapters', 4, 1, '2015-06-02', 0, 1),
(0, 69, 13, 'Other Adapters (9V)', '500', '1000', '', 'Power Adapters', 2, 1, '2015-06-02', 0, 1),
(0, 70, 13, 'Other Adapters (15V)', '1000', '2000', '', 'Power Adapters', 1, 1, '2015-06-02', 0, 1),
(0, 71, 13, 'Other Adapters (19V)', '1000', '2000', '', 'Power Adapters', 2, 1, '2015-06-02', 0, 1),
(0, 72, 7, 'BB Z10 Bluetoth Earpiece', '1800', '3000', '', 'Bluetoth Earpiece', 2, 1, '2015-06-02', 0, 1),
(0, 73, 7, 'HTC Bluetooth Headset', '1800', '3000', '', 'Bluetoth Earpiece', 2, 1, '2015-06-02', 0, 1),
(0, 74, 7, 'Samsung Bluetoth Earpiece', '1800', '3000', '', 'Bluetoth Earpiece', 1, 1, '2015-06-02', 0, 1),
(0, 75, 7, 'Sony Bluetoth Earpiece', '', '', '', 'Bluetoth Earpiece', 0, 1, '2015-06-02', 0, 1),
(0, 76, 7, 'Apple Bluetoth Earpiece', '', '', '', 'Bluetoth Earpiece', 0, 1, '2015-06-02', 0, 1),
(0, 77, 1, 'JcTech USB Card Reader', '1500', '2000', '', 'Card Reader', 5003, 1, '2015-06-02', 0, 1),
(0, 78, 1, 'HDMI Cable', '1200', '1500', '', 'HDMI', 5003, 1, '2015-06-02', 0, 1),
(0, 79, 1, 'Mouse Pads', '100', '150', '', 'Mouse Pad', 3808, 1, '2015-06-02', 0, 1),
(0, 80, 1, 'JcTech HeadPhones', '800', '1200', '', 'HeadPhone', 5006, 1, '2015-06-02', 0, 1),
(0, 81, 1, 'TP Link Desktop Switch', '2500', '4000', '', 'Desktop Switch', 1901, 1, '2015-06-02', 0, 1),
(0, 82, 1, 'TP Link PCI Adapter', '2000', '2500', '', 'PCI Adapter', 302, 1, '2015-06-02', 0, 1),
(0, 83, 10, 'Laptop Skin', '700', '1000', '', 'Laptop Skin', 10, 1, '2015-06-02', 0, 1),
(0, 84, 10, 'Laptop Bags (Big)', '3500', '5000', '', 'Bag', 3, 1, '2015-06-02', 0, 1),
(0, 85, 10, 'Laptop Bags (Small)', '2500', '3000', '', 'Bag', 3, 1, '2015-06-02', 0, 1),
(0, 86, 10, 'Laptop Battery', '', '', '', 'Laptop Battery', 0, 1, '2015-06-02', 0, 1),
(0, 87, 1, 'Havit USB Keyboard', '550', '800', '', 'Keyboard', 5014, 1, '2015-06-02', 0, 1),
(0, 88, 1, 'Serial Keyboard', '500', '650', '', 'Keyboard', 3004, 1, '2015-06-02', 0, 1),
(0, 89, 1, 'PS/2 Keyboard', '500', '700', '', 'Keyboard', 4003, 1, '2015-06-02', 0, 1),
(0, 90, 1, 'Logitech PC Webcam', '1200', '1500', '', 'webcam', 5001, 1, '2015-06-09', 0, 1),
(0, 91, 8, 'Indoor Dome Camera (Small)', '4000', '6000', '', 'Indoor Camera', 3, 1, '2015-06-09', 0, 1),
(0, 92, 8, 'Outdoor Camera (8mm)', '', '', '', 'Outdoor Camera', 0, 1, '2015-06-09', 0, 1),
(0, 93, 8, 'Outdoor Camera (6mm)', '', '', '', 'Outdoor Camera', 0, 1, '2015-06-09', 0, 1),
(0, 94, 10, 'USB Notebook Cooler', '', '', '', 'Cooler', 0, 1, '2015-06-09', 0, 1),
(0, 95, 1, '2 Ports VGA Splitter', '1700', '2000', '', 'VGA Splitter', 5001, 1, '2015-06-09', 0, 1),
(0, 96, 1, 'JC Tech Power Supply', '2500', '3000', '', '550w Power Supply', 5001, 1, '2015-06-09', 0, 1),
(0, 97, 1, 'Lite-On CD-Rom (52x)', '1800', '2200', '', 'CD-Rom', 5004, 1, '2015-06-09', 0, 1),
(0, 98, 1, 'Samsung CD-Rom', '1800', '2200', '', 'CD-Rom', 4003, 1, '2015-06-09', 0, 1),
(0, 99, 1, 'Samsung CD-RW', '2500', '3000', '', 'CD-RW', 4001, 1, '2015-06-09', 0, 1),
(0, 100, 1, 'LG CD-RW', '2000', '2600', '', 'CD-RW', 5000, 1, '2015-06-09', 0, 1),
(0, 101, 1, 'Mercury CD-Rom (56x)', '1800', '2200', '', 'CD-Rom', 5001, 1, '2015-06-09', 0, 1),
(0, 102, 7, 'iPad Screen Protector', '700', '1000', '', 'Screen Protector', 2, 1, '2015-06-09', 0, 1),
(0, 103, 7, 'iPad Fashion Case (10inch)', '1500', '2500', '', 'iPad Case', 12, 1, '2015-06-09', 0, 1),
(0, 104, 7, 'iPad Rich Boss Case (10inch)', '1500', '2500', '', 'iPad Case', 2, 1, '2015-06-09', 0, 1),
(0, 105, 7, 'iPhone Power Bank Case (Newnow)', '5000', '6000', '', 'Power Bank Case', 1, 1, '2015-06-09', 0, 1),
(0, 106, 8, 'Indoor Dome Camera (Big)', '4500', '7000', '', 'Indoor Camera', 2, 1, '2015-06-09', 0, 1),
(0, 107, 14, 'HP LaserJet P1102', '16500', '18500', '', 'HP LaserJet', 1, 1, '2015-06-09', 0, 1),
(0, 108, 14, 'HP LaserJet P1102w', '23700', '26000', '', 'HP LaserJet', 0, 1, '2015-06-09', 0, 1),
(0, 109, 15, 'HP OfficeJet 4500w', '15000', '18000', '', 'HP OfficeJet', 1, 1, '2015-06-09', 0, 1),
(0, 110, 2, 'Cisco Wireless Router 1941/K9', '155000', '165000', '', 'Wireless Router', 1, 1, '2015-06-09', 0, 1),
(0, 111, 1, 'HP Optical Mouse', '1200', '2000', '', 'Optical Mouse', 5000, 1, '2015-06-09', 0, 1),
(0, 112, 6, 'HP Envy 14', '45000', '65000', '', 'HP Laptop', 1, 1, '2015-06-09', 0, 1),
(0, 113, 13, 'HP Adapter 19V (Small Mouth)', '1000', '2500', '', 'Adapter', 2, 1, '2015-06-11', 0, 1),
(0, 114, 3, 'Nokia Lumia 520', '19500', '22500', '', 'Lumia 520', 0, 1, '2010-01-01', 0, 1),
(0, 115, 3, 'Nokia Lumia 430', '13300', '16500', '', ' Lumia 430', 0, 1, '2010-01-01', 0, 1),
(0, 116, 3, 'Samsung Galaxy Core Prime', '24000', '27000', '', 'Galaxy Core Prime', 0, 1, '2010-01-01', 0, 1),
(0, 117, 3, 'Samsung Galaxy Grand Prime', '34000', '37000', '', 'Galaxy Grand Prime', 0, 1, '2010-01-01', 0, 1),
(0, 118, 3, 'Lenovo A319', '15100', '17000', '', 'Lenovo A319', 0, 1, '2010-01-01', 0, 1),
(0, 119, 6, 'HP Pavilion DM4', '47000', '55000', '', 'HP DM4', 1, 1, '2010-01-01', 0, 1),
(0, 120, 6, 'HP Elitebook 6930p', '23000', '38000', '', ' Elitebook', 1, 1, '2010-01-01', 0, 1),
(0, 121, 1, 'Sandisk 64GB SD Card', '4760', '6500', '', 'SD Card', 4001, 13, '2015-10-23', 0, 1),
(0, 122, 1, 'Sandisk 32GB SD Card', '1204', '3500', '', 'SD Card', 5006, 13, '2015-10-23', 0, 1),
(0, 123, 7, 'USB Bluetooth', '', '', '', 'Bluetooth Add-on', 0, 13, '2015-10-23', 0, 1),
(0, 124, 1, 'SanDisk 16GB SD Card', '1213', '2500', '', 'SD Card', 4003, 13, '2015-10-23', 0, 1),
(0, 125, 7, 'iPad/iPhone 4 Charger', '1000', '1500', '', 'Charger', 5, 13, '2015-10-23', 0, 1),
(0, 126, 7, 'Sony Bluetoth Earpiece', '', '', '', 'Bluetoth Earpiece', 0, 13, '2015-10-23', 0, 1),
(0, 127, 7, 'Samsung Bluetooth Earpiece', '1800', '3000', '', 'Bluetoth Earpiece', 1, 13, '2015-10-23', 0, 1),
(0, 128, 7, 'Apple Earpiece', '', '', '', 'Earpiece', 0, 13, '2015-10-23', 0, 1),
(0, 129, 7, 'Blackberry Earpiece', '', '', '', 'Earpiece', 0, 13, '2015-10-23', 0, 1),
(0, 130, 1, 'Gear Head Wireless Mouse', '1000', '2000', '', 'Wireless Mouse', 5003, 13, '2015-10-26', 0, 1),
(0, 131, 1, 'Belkin Laptop to HDTV Cable', '1000', '2000', '', 'HDMI Cable', 5005, 13, '2015-10-26', 0, 1),
(0, 132, 3, 'Infinix Hot 2', '18500', '22000', '', 'Phone', 0, 13, '2015-11-03', 0, 1),
(0, 133, 3, 'Nokia  105(Dual Sim)', '', '', '', 'Phone', 0, 13, '2015-11-03', 0, 1),
(0, 134, 3, 'Nokia 105(Single Sim)', '', '', '', 'Phone', 0, 13, '2015-11-03', 0, 1),
(0, 135, 1, 'BlueGate 650V UPS', '', '', '', 'UPS', 0, 13, '2015-11-03', 0, 1),
(0, 137, 1, '64GB SanDisk Flash Drive', '4000', '6000', '', 'Flash Drive', 5003, 13, '2015-11-05', 0, 1),
(0, 138, 1, '32GB SanDisk Flash Drive ', '3000', '4000', '', 'Flash Drive', 5010, 13, '2015-11-05', 0, 1),
(0, 139, 1, '32GB Toshiba Flash Drive', '3000', '4000', '', 'Flash Drive', 5007, 13, '2015-11-05', 0, 1),
(0, 140, 1, '16GB SanDisk Flash Drive', '1500', '2500', '', 'Flash Drive', 4992, 13, '2015-11-05', 0, 1),
(0, 141, 1, '8GB SanDisk Flash Drive', '1000', '2000', '', 'Flash Drive', 5006, 13, '2015-11-05', 0, 1),
(0, 142, 11, 'Samsung Galaxy Tab 4', '25000', '30000', '', 'Tablet', 1, 13, '2015-11-10', 0, 1),
(0, 143, 11, 'Dell Venue  8', '38000', '40000', '', 'Tablet', 1, 13, '2015-11-10', 0, 1),
(0, 144, 11, 'Ipad Mini', '85000', '95000', '', 'Ipad', 1, 13, '2015-11-10', 0, 1),
(0, 145, 11, 'Ipad Air 2', '90000', '95000', '', 'Ipad', 2, 13, '2015-11-10', 0, 1),
(0, 146, 11, 'Samsung Galaxy Tab A', '55000', '60000', '', 'Tablet', 2, 13, '2015-11-10', 0, 1),
(0, 147, 3, 'Iphone 6S', '155000', '170000', '', 'Phone', 2, 13, '2015-11-10', 0, 1),
(0, 148, 3, 'Iphone 5S', '118000', '120000', '', 'Phone', 1, 13, '2015-11-10', 0, 1),
(0, 149, 3, 'Sony Xperia T2', '50000', '60000', '', 'Phone', 1, 13, '2015-11-10', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `items_update`
--

CREATE TABLE `items_update` (
  `uid` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `oldq` int(11) NOT NULL,
  `newq` int(11) NOT NULL,
  `cost` varchar(20) NOT NULL,
  `oldsellingprice` double NOT NULL,
  `saleprice` varchar(20) NOT NULL,
  `user` int(11) NOT NULL,
  `udate` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `batch` int(11) NOT NULL,
  `xdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_update`
--

INSERT INTO `items_update` (`uid`, `item_id`, `oldq`, `newq`, `cost`, `oldsellingprice`, `saleprice`, `user`, `udate`, `status`, `batch`, `xdate`) VALUES
(1, 1, 0, 1, '50000', 0, '60000', 11, '2015-05-01', 'Added', 0, '0000-00-00'),
(2, 1, 0, 1, '50000', 0, '55000', 1, '2015-05-15', 'Added', 0, '0000-00-00'),
(3, 82, 0, 2, '2000', 0, '2500', 1, '2015-06-08', 'Added', 0, '0000-00-00'),
(4, 31, 0, 2, '500', 0, '700', 1, '2015-06-08', 'Added', 0, '0000-00-00'),
(5, 9, 0, 2, '1200', 0, '1500', 1, '2015-06-08', 'Added', 0, '0000-00-00'),
(6, 11, 0, 5, '1300', 0, '2500', 1, '2015-06-08', 'Added', 0, '0000-00-00'),
(7, 4, 0, 5, '650', 0, '800', 1, '2015-06-08', 'Added', 0, '0000-00-00'),
(8, 16, 0, 3, '800', 0, '1000', 1, '2015-06-08', 'Added', 0, '0000-00-00'),
(9, 33, 0, 2, '1400', 0, '1800', 1, '2015-06-08', 'Added', 0, '0000-00-00'),
(10, 35, 0, 4, '900', 0, '1200', 1, '2015-06-08', 'Added', 0, '0000-00-00'),
(11, 34, 0, 3, '1400', 0, '1800', 1, '2015-06-08', 'Added', 0, '0000-00-00'),
(12, 30, 0, 1, '1000', 0, '1500', 1, '2015-06-08', 'Added', 0, '0000-00-00'),
(13, 19, 0, 1, '2200', 0, '2500', 1, '2015-06-08', 'Added', 0, '0000-00-00'),
(14, 14, 0, 2, '400', 0, '500', 1, '2015-06-08', 'Added', 0, '0000-00-00'),
(15, 23, 0, 12, '1500', 0, '2000', 1, '2015-06-08', 'Added', 0, '0000-00-00'),
(16, 21, 0, 5, '1200', 0, '1400', 1, '2015-06-08', 'Added', 0, '0000-00-00'),
(17, 20, 0, 2, '1500', 0, '1800', 1, '2015-06-08', 'Added', 0, '0000-00-00'),
(18, 22, 0, 15, '800', 0, '1200', 1, '2015-06-08', 'Added', 0, '0000-00-00'),
(19, 28, 0, 21, '1000', 0, '1200', 1, '2015-06-08', 'Added', 0, '0000-00-00'),
(20, 29, 0, 1, '800', 0, '1000', 1, '2015-06-08', 'Added', 0, '0000-00-00'),
(21, 24, 0, 1, '2500', 0, '3000', 1, '2015-06-08', 'Added', 0, '0000-00-00'),
(22, 25, 0, 2, '2200', 0, '2500', 1, '2015-06-08', 'Added', 0, '0000-00-00'),
(23, 32, 0, 1, '1000', 0, '2000', 1, '2015-06-08', 'Added', 0, '0000-00-00'),
(24, 7, 0, 9, '250', 0, '300', 1, '2015-06-08', 'Added', 0, '0000-00-00'),
(25, 26, 0, 2, '4200', 0, '4700', 1, '2015-06-08', 'Added', 0, '0000-00-00'),
(26, 27, 0, 1, '3500', 0, '4000', 1, '2015-06-08', 'Added', 0, '0000-00-00'),
(27, 58, 0, 14, '300', 0, '500', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(28, 18, 0, 2, '500', 0, '1000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(29, 57, 0, 14, '350', 0, '500', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(30, 59, 0, 27, '200', 0, '500', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(31, 13, 0, 2, '1800', 0, '2500', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(32, 45, 0, 2, '15000', 0, '25000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(33, 46, 0, 1, '12000', 0, '15000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(34, 2, 0, 1, '40000', 0, '50000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(35, 3, 0, 1, '50000', 0, '55000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(36, 83, 0, 10, '700', 0, '1000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(37, 85, 0, 4, '2500', 0, '3000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(38, 49, 0, 1, '28000', 0, '30000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(39, 47, 0, 1, '17850', 0, '19000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(40, 73, 0, 2, '1800', 0, '3000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(41, 72, 0, 2, '1800', 0, '3000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(42, 74, 0, 1, '1800', 0, '3000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(43, 63, 0, 4, '1500', 0, '3500', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(44, 62, 0, 2, '500', 0, '800', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(45, 69, 0, 2, '500', 0, '1000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(46, 71, 0, 2, '1000', 0, '2000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(47, 70, 0, 1, '1000', 0, '2000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(48, 68, 0, 4, '500', 0, '800', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(49, 66, 0, 2, '1000', 0, '2000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(50, 60, 0, 7, '1000', 0, '2500', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(51, 61, 0, 5, '1300', 0, '2500', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(52, 67, 0, 1, '600', 0, '1000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(53, 65, 0, 4, '600', 0, '1000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(54, 64, 0, 2, '1000', 0, '2000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(55, 81, 0, 1, '2500', 0, '4000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(56, 88, 0, 4, '500', 0, '650', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(57, 89, 0, 3, '500', 0, '700', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(58, 6, 0, 8, '350', 0, '500', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(59, 79, 0, 8, '100', 0, '150', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(60, 10, 0, 2, '700', 0, '800', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(61, 8, 0, 4, '700', 0, '800', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(62, 90, 0, 1, '1200', 0, '1500', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(63, 77, 0, 4, '1500', 0, '2000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(64, 78, 0, 4, '1200', 0, '1500', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(65, 16, 3, 3, '800', 0, '1200', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(66, 80, 0, 7, '800', 0, '1200', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(67, 87, 0, 18, '550', 0, '800', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(68, 5, 0, 4, '550', 0, '800', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(69, 12, 0, 4, '1300', 0, '2500', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(70, 53, 0, 1, '16000', 0, '18500', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(71, 38, 0, 6, '700', 0, '1500', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(72, 39, 0, 8, '700', 0, '2000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(73, 40, 0, 5, '1000', 0, '2000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(74, 36, 0, 15, '800', 0, '1500', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(75, 55, 0, 1, '300', 0, '500', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(76, 54, 0, 4, '400', 0, '700', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(77, 56, 0, 6, '250', 0, '400', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(78, 37, 0, 8, '400', 0, '1000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(79, 42, 0, 5, '1000', 0, '1800', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(80, 41, 0, 6, '800', 0, '1500', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(81, 44, 0, 2, '3000', 0, '4000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(82, 43, 0, 2, '1600', 0, '2500', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(83, 99, 0, 1, '2500', 0, '3000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(84, 98, 0, 3, '1800', 0, '2200', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(85, 101, 0, 1, '1800', 0, '2200', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(86, 97, 0, 4, '1800', 0, '2200', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(87, 96, 0, 1, '2500', 0, '3000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(88, 95, 0, 1, '1700', 0, '2000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(89, 105, 0, 2, '5000', 0, '6000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(90, 102, 0, 2, '700', 0, '1000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(91, 104, 0, 2, '1500', 0, '2500', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(92, 103, 0, 12, '1500', 0, '2500', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(93, 91, 0, 3, '4000', 0, '6000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(94, 106, 0, 2, '4500', 0, '7000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(95, 108, 0, 1, '23700', 0, '26000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(96, 107, 0, 1, '16500', 0, '18500', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(97, 109, 0, 1, '15000', 0, '18000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(98, 110, 0, 1, '155000', 0, '165000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(99, 112, 0, 1, '45000', 0, '65000', 1, '2015-06-09', 'Added', 0, '0000-00-00'),
(100, 113, 0, 3, '1000', 0, '2500', 1, '2015-06-11', 'Added', 0, '0000-00-00'),
(101, 84, 0, 3, '3500', 0, '5000', 1, '2015-06-12', 'Added', 0, '0000-00-00'),
(102, 53, 0, 2, '16000', 0, '19000', 1, '2010-01-01', 'Added', 0, '0000-00-00'),
(103, 117, 0, 2, '34000', 0, '37000', 1, '2010-01-01', 'Added', 0, '0000-00-00'),
(104, 116, 0, 2, '24000', 0, '27000', 1, '2010-01-01', 'Added', 0, '0000-00-00'),
(105, 114, 0, 2, '19500', 0, '22500', 1, '2010-01-01', 'Added', 0, '0000-00-00'),
(106, 115, 0, 2, '13300', 0, '16500', 1, '2010-01-01', 'Added', 0, '0000-00-00'),
(107, 118, 0, 1, '15100', 0, '17000', 1, '2010-01-01', 'Added', 0, '0000-00-00'),
(108, 119, 0, 1, '47000', 0, '55000', 1, '2010-01-01', 'Added', 0, '0000-00-00'),
(109, 120, 0, 1, '23000', 0, '38000', 1, '2010-01-01', 'Added', 0, '0000-00-00'),
(110, 121, 0, 1, '4760', 0, '6500', 13, '2015-10-23', 'Added', 0, '0000-00-00'),
(111, 122, 0, 6, '1204', 0, '3500', 13, '2015-10-23', 'Added', 0, '0000-00-00'),
(112, 124, 0, 3, '1213', 0, '2500', 13, '2015-10-23', 'Added', 0, '0000-00-00'),
(113, 127, 0, 2, '1800', 0, '3000', 13, '2015-10-23', 'Added', 0, '0000-00-00'),
(114, 125, 0, 6, '1000', 0, '1500', 13, '2015-10-23', 'Added', 0, '0000-00-00'),
(115, 131, 0, 5, '1000', 0, '2000', 13, '2015-10-26', 'Added', 0, '0000-00-00'),
(116, 130, 0, 4, '1000', 0, '2000', 13, '2015-10-26', 'Added', 0, '0000-00-00'),
(117, 132, 0, 1, '18500', 0, '22000', 13, '2015-11-03', 'Added', 0, '0000-00-00'),
(118, 137, 0, 3, '4000', 0, '6000', 13, '2015-11-05', 'Added', 0, '0000-00-00'),
(119, 139, 0, 7, '3000', 0, '4000', 13, '2015-11-10', 'Added', 0, '0000-00-00'),
(120, 138, 0, 10, '3000', 0, '4000', 13, '2015-11-10', 'Added', 0, '0000-00-00'),
(121, 140, 0, 6, '1500', 0, '2500', 13, '2015-11-10', 'Added', 0, '0000-00-00'),
(122, 141, 0, 6, '1000', 0, '2000', 13, '2015-11-10', 'Added', 0, '0000-00-00'),
(123, 146, 0, 2, '55000', 0, '60000', 13, '2015-11-10', 'Added', 0, '0000-00-00'),
(124, 142, 0, 1, '25000', 0, '30000', 13, '2015-11-10', 'Added', 0, '0000-00-00'),
(125, 144, 0, 1, '85000', 0, '95000', 13, '2015-11-10', 'Added', 0, '0000-00-00'),
(126, 145, 0, 2, '90000', 0, '95000', 13, '2015-11-10', 'Added', 0, '0000-00-00'),
(127, 143, 0, 1, '38000', 0, '40000', 13, '2015-11-10', 'Added', 0, '0000-00-00'),
(128, 149, 0, 1, '50000', 0, '60000', 13, '2015-11-10', 'Added', 0, '0000-00-00'),
(129, 147, 0, 2, '155000', 0, '170000', 13, '2015-11-10', 'Added', 0, '0000-00-00'),
(130, 148, 0, 1, '118000', 0, '120000', 13, '2015-11-10', 'Added', 0, '0000-00-00'),
(131, 58, 12, 500, '300', 0, '500', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(132, 15, 0, 490, '1900', 0, '2400', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(133, 17, 0, 2000, '2500', 0, '3500', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(134, 82, 2, 300, '2000', 0, '2500', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(135, 81, 1, 1900, '2500', 0, '4000', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(136, 18, 1, 2000, '500', 0, '1000', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(137, 88, 4, 3000, '500', 0, '650', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(138, 121, 1, 4000, '4760', 0, '6500', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(139, 122, 6, 5000, '1204', 0, '3500', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(140, 124, 3, 4000, '1213', 0, '2500', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(141, 99, 1, 4000, '2500', 0, '3000', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(142, 98, 3, 4000, '1800', 0, '2200', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(143, 89, 3, 4000, '500', 0, '700', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(144, 57, 12, 4000, '350', 0, '500', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(145, 59, 20, 3000, '200', 0, '500', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(146, 6, 0, 3800, '350', 0, '500', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(147, 79, 8, 3800, '100', 0, '150', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(148, 10, 1, 5000, '700', 0, '800', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(149, 101, 1, 5000, '1800', 0, '2200', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(150, 8, 4, 5000, '700', 0, '800', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(151, 90, 1, 5000, '1200', 0, '1500', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(152, 97, 4, 5000, '1800', 0, '2200', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(153, 100, 0, 5000, '2000', 0, '2600', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(154, 31, 2, 5000, '500', 0, '700', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(155, 77, 3, 5000, '1500', 0, '2000', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(156, 80, 6, 5000, '800', 0, '1200', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(157, 9, 1, 5000, '1200', 0, '1500', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(158, 96, 1, 5000, '2500', 0, '3000', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(159, 11, 5, 5000, '1300', 0, '2500', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(160, 111, 0, 5000, '1200', 0, '2000', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(161, 78, 3, 5000, '1200', 0, '1500', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(162, 16, 6, 5000, '800', 0, '1200', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(163, 87, 14, 5000, '550', 0, '800', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(164, 33, 2, 5000, '1400', 0, '1800', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(165, 35, 3, 5000, '900', 0, '1200', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(166, 34, 3, 5000, '1400', 0, '1800', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(167, 130, 3, 5000, '1000', 0, '2000', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(168, 30, 1, 5000, '1000', 0, '1500', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(169, 12, 0, 5000, '1300', 0, '2500', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(170, 5, 2, 5000, '550', 0, '800', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(171, 19, 1, 5000, '2200', 0, '2500', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(172, 14, 1, 5000, '400', 0, '500', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(173, 131, 5, 5000, '1000', 0, '2000', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(174, 32, 1, 5000, '1000', 0, '2000', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(175, 7, 9, 5000, '250', 0, '300', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(176, 23, 9, 5000, '1500', 0, '2000', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(177, 141, 6, 5000, '1000', 0, '2000', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(178, 137, 3, 5000, '4000', 0, '6000', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(179, 21, 5, 5000, '1200', 0, '1400', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(180, 20, 2, 5000, '1500', 0, '1800', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(181, 22, 13, 5000, '800', 0, '1200', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(182, 26, 2, 5000, '4200', 0, '4700', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(183, 27, 1, 5000, '3500', 0, '4000', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(184, 139, 7, 5000, '3000', 0, '4000', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(185, 138, 10, 5000, '3000', 0, '4000', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(186, 28, 21, 5000, '1000', 0, '1200', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(187, 95, 1, 5000, '1700', 0, '2000', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(188, 29, 1, 5000, '800', 0, '1000', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(189, 24, 0, 5000, '2500', 0, '3000', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(190, 25, 0, 5000, '2200', 0, '2500', 1, '2017-09-18', 'Added', 0, '0000-00-00'),
(191, 140, 2, 5000, '1500', 0, '2500', 1, '2017-09-18', 'Added', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `operation` varchar(50) NOT NULL,
  `otable` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` varchar(20) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `operation`, `otable`, `description`, `user`, `xdate`, `date_time`) VALUES
(1, 'Item Removed', 'items Table', 'item_id=1, Quantity Removed 4', 1, '2016/07/02', '2016-07-02 12:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `lowstock`
--

CREATE TABLE `lowstock` (
  `lid` int(11) NOT NULL,
  `lowstock` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lowstock`
--

INSERT INTO `lowstock` (`lid`, `lowstock`, `user`, `xdate`) VALUES
(1, 3, 1, '2015-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `mid` int(11) NOT NULL,
  `Sender` text NOT NULL,
  `Content` varchar(500) NOT NULL,
  `towhom` int(11) NOT NULL,
  `phones` longtext NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`mid`, `Sender`, `Content`, `towhom`, `phones`, `user`, `xdate`) VALUES
(5, 'PLTRANSFORM', 'This is directly from the server. Helo ensure you do real life testing with him. Register him. Thank you', 2147483647, '2347032208220, 2348068870439', 1, '2018-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `messages_templates`
--

CREATE TABLE `messages_templates` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `sender` varchar(11) NOT NULL,
  `message` text NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages_templates`
--

INSERT INTO `messages_templates` (`id`, `title`, `sender`, `message`, `user`, `xdate`) VALUES
(1, 'Welcome Message After Registration', 'PLTRANSFORM', 'Dear {$name},\r\nThank you for identifying with us. We assure you of our quality service. \r\nLook forward to seeing you again', 1, '2018-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

CREATE TABLE `ordertable` (
  `sale_id` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `price` varchar(255) NOT NULL,
  `soldprice` varchar(20) NOT NULL,
  `item_id` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `deliverdate` date NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL,
  `transID` varchar(30) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paid_debt`
--

CREATE TABLE `paid_debt` (
  `id` int(11) NOT NULL,
  `transID` varchar(30) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `qty` varchar(500) NOT NULL,
  `total_amount` varchar(10) NOT NULL,
  `paid` double NOT NULL,
  `bal` varchar(10) NOT NULL,
  `payment_mode` varchar(11) NOT NULL,
  `xdate` date NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `passmarks2`
--

CREATE TABLE `passmarks2` (
  `id` int(11) NOT NULL,
  `passmark` varchar(120) NOT NULL,
  `xdate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payees`
--

CREATE TABLE `payees` (
  `pid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `other` varchar(120) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `accname` varchar(100) NOT NULL,
  `accno` varchar(20) NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL,
  `payeeid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paymenthistory`
--

CREATE TABLE `paymenthistory` (
  `pid` int(11) NOT NULL,
  `custID` int(11) NOT NULL,
  `transID` varchar(50) NOT NULL,
  `transactions` longtext NOT NULL,
  `transtype` int(11) NOT NULL,
  `amt` varchar(20) NOT NULL,
  `paid` varchar(20) NOT NULL,
  `bal` varchar(20) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymenthistory`
--

INSERT INTO `paymenthistory` (`pid`, `custID`, `transID`, `transactions`, `transtype`, `amt`, `paid`, `bal`, `payment_status`, `user`, `xdate`) VALUES
(1, 0, '2147483647', '', 0, '60000', '65000', '5000', '', 11, '2015-05-01'),
(2, 0, '2147483647', '', 0, '800', '1000', '200', '', 12, '2015-06-08'),
(3, 0, '2147483647', '', 0, '26000', '26000', '0', '', 12, '2015-06-09'),
(4, 0, '2147483647', '', 0, '800', '800', '0', '', 12, '2015-06-10'),
(5, 0, '2147483647', '', 0, '6000', '6000', '0', '', 12, '2015-06-10'),
(6, 0, '2147483647', '', 0, '2900', '2900', '0', '', 12, '2015-06-10'),
(7, 0, '2147483647', '', 0, '2500', '2500', '0', '', 1, '2015-06-10'),
(8, 0, '2147483647', '', 0, '12500', '12500', '0', '', 1, '2015-06-11'),
(9, 0, '2147483647', '', 0, '2500', '2500', '0', '', 12, '2015-06-11'),
(10, 0, '2147483647', '', 0, '14800', '14800', '0', '', 12, '2015-06-11'),
(11, 0, '2147483647', '', 0, '18500', '18500', '0', '', 1, '2015-06-12'),
(12, 0, '2147483647', '', 0, '500', '1000', '500', '', 12, '2015-06-16'),
(13, 0, '2147483647', '', 0, '2000', '2300', '300', '', 12, '2015-06-22'),
(14, 0, '2147483647', '', 0, '2000', '2000', '0', '', 12, '2015-06-26'),
(15, 0, '2147483647', '', 0, '1500', '1500', '0', '', 12, '2015-06-26'),
(16, 0, '2147483647', '', 0, '1500', '1500', '0', '', 12, '2015-06-29'),
(17, 0, '2147483647', '', 0, '2000', '2000', '0', '', 12, '2015-06-29'),
(18, 0, '2147483647', '', 0, '800', '800', '0', '', 12, '2015-07-01'),
(19, 0, '2147483647', '', 0, '2000', '2000', '0', '', 12, '2015-07-01'),
(20, 0, '2147483647', '', 0, '1500', '1500', '0', '', 12, '2015-07-03'),
(21, 0, '2147483647', '', 0, '500', '500', '0', '', 12, '2015-07-03'),
(22, 0, '2147483647', '', 0, '4000', '4000', '0', '', 12, '2015-07-07'),
(23, 0, '2147483647', '', 0, '80500', '80500', '0', '', 12, '2010-01-01'),
(24, 0, '2147483647', '', 0, '19000', '19000', '0', '', 12, '2010-01-01'),
(25, 0, '2147483647', '', 0, '3500', '3500', '0', '', 12, '2010-01-01'),
(26, 0, '2147483647', '', 0, '19200', '19200', '0', '', 12, '2010-01-01'),
(27, 0, '2147483647', '', 0, '3000', '3000', '0', '', 12, '2015-07-10'),
(28, 0, '2147483647', '', 0, '2500', '2500', '0', '', 12, '2015-07-10'),
(29, 0, '2147483647', '', 0, '11500', '11500', '0', '', 12, '2015-08-17'),
(30, 0, '2147483647', '', 0, '1200', '1200', '0', '', 12, '2015-08-17'),
(31, 0, '2147483647', '', 0, '2900', '2900', '0', '', 12, '2015-08-17'),
(32, 0, '2147483647', '', 0, '2000', '2000', '0', '', 12, '2015-09-24'),
(33, 0, '2147483647', '', 0, '32500', '32500', '0', '', 12, '2015-09-29'),
(34, 0, '2147483647', '', 0, '24000', '24000', '0', '', 12, '2015-09-30'),
(35, 0, '2147483647', '', 0, '32500', '32500', '0', '', 12, '2015-10-09'),
(36, 0, '2147483647', '', 0, '25300', '32300', '7000', '', 13, '2015-10-31'),
(37, 0, '2147483647', '', 0, '28000', '28000', '0', '', 13, '2015-11-03'),
(38, 0, '2147483647', '', 0, '22000', '22000', '0', '', 13, '2015-11-03'),
(39, 0, '2147483647', '', 0, '37000', '37000', '0', '', 13, '2015-11-10'),
(40, 0, '2147483647', '', 0, '5800', '5800', '0', '', 13, '2015-11-12'),
(41, 0, '0', '2GB Dell IPS=2', 1, '0', '3000', '3000', 'cash', 1, '2017-04-24'),
(42, 0, '0', '16GB SD Card=1, 16GB Transcend (Jet 510G)=1', 1, '5500', '5500', '0', 'cash', 1, '2017-09-18'),
(44, 0, '0', '16GB SanDisk Flash Drive=2, 16GB Transcend (Jet 300)=1', 1, '7500', '7500', '0', 'cash', 1, '2017-09-18'),
(45, 0, 'DIS7150572789831', '16GB SanDisk Flash Drive=1', 1, '2500', '2500', '0', 'cash', 1, '2017-09-18'),
(46, 0, 'DIS5150572914173', '16GB SanDisk Flash Drive=1', 1, '2500', '2500', '0', 'cash', 1, '2017-09-18'),
(47, 0, 'DIS8150574456333', '16GB SanDisk Flash Drive=10, 16GB Transcend (Jet 300)=15, 16GB Transcend (Jet 300)=5, 16GB Transcend (Jet 510G)=5, 1GB Dell Hand Band=10', 1, '100000', '100000', '0', 'cash', 1, '2017-09-18');

-- --------------------------------------------------------

--
-- Table structure for table `paymentvoucher`
--

CREATE TABLE `paymentvoucher` (
  `pvid` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  `sesion_id` int(11) NOT NULL,
  `refno` varchar(20) NOT NULL,
  `no` varchar(20) NOT NULL,
  `payeeid` varchar(20) NOT NULL,
  `payeename` varchar(100) NOT NULL,
  `bank` varchar(60) NOT NULL,
  `accname` varchar(100) NOT NULL,
  `accno` varchar(20) NOT NULL,
  `chequeno` varchar(30) NOT NULL,
  `duedate` date NOT NULL,
  `amout` varchar(20) NOT NULL,
  `ctcode` varchar(10) NOT NULL,
  `narration` varchar(200) NOT NULL,
  `amtb4tax` varchar(10) NOT NULL,
  `withtax` varchar(10) NOT NULL,
  `vat` varchar(10) NOT NULL,
  `levy` varchar(10) NOT NULL,
  `netpay` varchar(15) NOT NULL,
  `grandtotal` varchar(20) NOT NULL,
  `raisedby` varchar(60) NOT NULL,
  `raiseddate` date NOT NULL,
  `Auditedby` varchar(60) NOT NULL,
  `Auditeddate` date NOT NULL,
  `Authorizedby` varchar(60) NOT NULL,
  `Authorizeddate` date NOT NULL,
  `issuedby` varchar(60) NOT NULL,
  `issueddate` date NOT NULL,
  `amtinword` varchar(200) NOT NULL,
  `cc1` varchar(100) NOT NULL,
  `ccdate` date NOT NULL,
  `cc2` varchar(100) NOT NULL,
  `cc3` varchar(100) NOT NULL,
  `xdate` date NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `price` varchar(20) NOT NULL,
  `soldprice` varchar(20) NOT NULL,
  `item_id` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL,
  `transID` varchar(30) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `returned` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `item`, `price`, `soldprice`, `item_id`, `quantity`, `user`, `xdate`, `transID`, `customer_id`, `status`, `returned`) VALUES
(1, 'Dell 15', '50000', '60000', '1', 1, 11, '2015-05-01', '4143048409082', 0, 1, 0),
(2, 'HP Optical Mouse', '650', '800', '4', 1, 12, '2015-06-08', '8143376064171', 0, 1, 0),
(3, 'HP LaserJet P1102w', '23700', '26000', '108', 1, 12, '2015-06-09', '7143385002948', 0, 1, 0),
(4, 'Dell Optical Mouse', '550', '800', '5', 1, 12, '2015-06-10', '2143392166439', 0, 1, 0),
(5, 'iPhone Power Bank Case (Newnow)', '5000', '6000', '105', 1, 12, '2015-06-10', '4143392273684', 0, 1, 0),
(6, 'Havit HV-SK473', '900', '1200', '35', 1, 12, '2015-06-10', '1143393701894', 0, 1, 0),
(7, 'JcTech HeadPhones', '800', '1200', '80', 1, 12, '2015-06-10', '1143393701894', 0, 1, 0),
(8, 'Power Cable', '200', '500', '59', 1, 12, '2015-06-10', '1143393701894', 0, 1, 0),
(9, 'HP Adapter (19V)', '1000', '2500', '60', 1, 1, '2015-06-10', '51433948460108', 0, 1, 0),
(10, 'HP Adapter 19V (Big Mouth)', '1000', '2500', '60', 5, 1, '2015-06-11', '8143401281496', 0, 1, 0),
(11, 'HP Adapter 19V (Small Mouth)', '1000', '2500', '113', 1, 12, '2015-06-11', '41434013119310', 0, 1, 0),
(12, 'TP Link Wireless Adapter', '1800', '2500', '13', 2, 12, '2015-06-11', '71434025723710', 0, 1, 0),
(13, 'Tools Pack', '500', '1000', '18', 1, 12, '2015-06-11', '71434025723710', 0, 1, 0),
(14, 'Blackberry Charger', '400', '1000', '37', 2, 12, '2015-06-11', '71434025723710', 0, 1, 0),
(15, 'EarPhone (S4)', '400', '700', '54', 2, 12, '2015-06-11', '71434025723710', 0, 1, 0),
(16, 'EarPhone (Nokia)', '250', '400', '56', 1, 12, '2015-06-11', '71434025723710', 0, 1, 0),
(17, 'Power Cable', '200', '500', '59', 5, 12, '2015-06-11', '71434025723710', 0, 1, 0),
(18, 'Acer Adapter (19V)', '1000', '2000', '64', 1, 12, '2015-06-11', '71434025723710', 0, 1, 0),
(19, 'VGA Cables', '300', '500', '58', 1, 12, '2015-06-11', '71434025723710', 0, 1, 0),
(20, 'Infinix Hot', '16000', '18500', '53', 1, 1, '2015-06-12', '101434116341108', 0, 1, 0),
(21, 'Perfect Optical Mouse', '350', '500', '6', 1, 12, '2015-06-16', '6143445412095', 0, 1, 0),
(22, 'HDMI Cable', '1200', '1500', '78', 1, 12, '2015-06-22', '9143496049568', 0, 1, 0),
(23, 'Bluetooth Adapter', '400', '500', '14', 1, 12, '2015-06-22', '9143496049568', 0, 1, 0),
(24, 'iPad/iPhone 4 Charger', '800', '1500', '36', 1, 12, '2015-06-26', '7143530239454', 0, 1, 0),
(25, 'Printer Cable', '350', '500', '57', 1, 12, '2015-06-26', '7143530239454', 0, 1, 0),
(26, 'JcTech Comfortable Optical Mouse', '1200', '1500', '9', 1, 12, '2015-06-26', '3143531056043', 0, 1, 0),
(27, 'iPad/iPhone 4 Charger', '800', '1500', '36', 1, 12, '2015-06-29', '8143556820136', 0, 1, 0),
(28, 'JcTech USB Card Reader', '1500', '2000', '77', 1, 12, '2015-06-29', '10143556909493', 0, 1, 0),
(29, 'Havit USB Keyboard', '550', '800', '87', 1, 12, '2015-07-01', '91435743146610', 0, 1, 0),
(30, 'Printer Cable', '350', '500', '57', 1, 12, '2015-07-01', '101435750999110', 0, 1, 0),
(31, 'iPad/iPhone 4 Charger', '800', '1500', '36', 1, 12, '2015-07-01', '101435750999110', 0, 1, 0),
(32, 'iPad/iPhone 4 Charger', '800', '1500', '36', 1, 12, '2015-07-03', '8143590932521', 0, 1, 0),
(33, 'Perfect Optical Mouse', '350', '500', '6', 1, 12, '2015-07-03', '4143592736257', 0, 1, 0),
(34, '8GB Transcent (Jet 350)', '1500', '2000', '23', 1, 12, '2015-07-07', '2143625664464', 0, 1, 0),
(35, '8GB Transcent (Jet 350)', '1500', '2000', '23', 1, 12, '2015-07-07', '2143625664464', 0, 1, 0),
(36, 'Nokia Lumia 430', '13300', '16500', '115', 1, 12, '2010-01-01', '10126236566932', 0, 1, 0),
(37, 'Samsung Galaxy Core Prime', '24000', '27000', '116', 1, 12, '2010-01-01', '10126236566932', 0, 1, 0),
(38, 'Samsung Galaxy Grand Prime', '34000', '37000', '117', 1, 12, '2010-01-01', '10126236566932', 0, 1, 0),
(39, 'Lenovo A319', '15100', '17000', '118', 1, 12, '2010-01-01', '31262366541910', 0, 1, 0),
(40, '8GB Transcent (Jet 350)', '1500', '2000', '23', 1, 12, '2010-01-01', '31262366541910', 0, 1, 0),
(41, 'Samsung Note 2 Charger', '700', '2000', '39', 1, 12, '2010-01-01', '8126237109875', 0, 1, 0),
(42, 'iPad/iPhone 4 Charger', '800', '1500', '36', 1, 12, '2010-01-01', '8126237109875', 0, 1, 0),
(43, 'Nokia Lumia 430', '13300', '16500', '115', 1, 12, '2010-01-01', '2126236546461', 0, 1, 0),
(44, 'Samsung S4 Charger', '700', '1500', '38', 1, 12, '2010-01-01', '2126236546461', 0, 1, 0),
(45, '4GB Open Brand', '800', '1200', '22', 1, 12, '2010-01-01', '2126236546461', 0, 1, 0),
(46, 'Dell Wireless Mouse', '1300', '2500', '12', 1, 12, '2015-07-10', '314364815121010', 0, 1, 0),
(47, 'Perfect Optical Mouse', '350', '500', '6', 1, 12, '2015-07-10', '314364815121010', 0, 1, 0),
(48, 'Dell Wireless Mouse', '1300', '2500', '12', 1, 12, '2015-07-10', '31436483780109', 0, 1, 0),
(49, 'Dell Wireless Mouse', '1300', '2500', '12', 2, 12, '2015-08-17', '71439807879410', 0, 1, 0),
(50, 'Laptop Bags (Small)', '2500', '3000', '85', 1, 12, '2015-08-17', '71439807879410', 0, 1, 0),
(51, 'iPad/iPhone 4 Charger', '800', '1500', '36', 1, 12, '2015-08-17', '71439807879410', 0, 1, 0),
(52, 'VGA Cables', '300', '500', '58', 1, 12, '2015-08-17', '71439807879410', 0, 1, 0),
(53, 'Samsung S4 Charger', '700', '1500', '38', 1, 12, '2015-08-17', '71439807879410', 0, 1, 0),
(54, '4GB Open Brand', '800', '1200', '22', 1, 12, '2015-08-17', '7143980922162', 0, 1, 0),
(55, 'Havit USB Keyboard', '550', '800', '87', 2, 12, '2015-08-17', '8143981150668', 0, 1, 0),
(56, 'Perfect Optical Mouse', '350', '500', '6', 1, 12, '2015-08-17', '8143981150668', 0, 1, 0),
(57, 'Mercury PS2 Optical Mouse', '700', '800', '10', 1, 12, '2015-08-17', '8143981150668', 0, 1, 0),
(58, 'iPad/iPhone 4 Charger', '800', '1500', '36', 1, 12, '2015-09-24', '3144309649135', 0, 1, 0),
(59, 'Perfect Optical Mouse', '350', '500', '6', 1, 12, '2015-09-24', '3144309649135', 0, 1, 0),
(60, 'iPad/iPhone 4 Charger', '800', '1500', '36', 2, 12, '2015-09-29', '9144351336348', 0, 1, 0),
(61, 'HP Adapter 19V (Big Mouth)', '1000', '2500', '60', 1, 12, '2015-09-29', '9144351336348', 0, 1, 0),
(62, 'Samsung Galaxy Core Prime', '24000', '27000', '116', 1, 12, '2015-09-29', '9144351336348', 0, 1, 0),
(63, 'iPad/iPhone 4 Charger', '800', '1500', '36', 1, 12, '2015-09-30', '5144360852738', 0, 1, 0),
(64, 'Nokia Lumia 520', '19500', '22500', '114', 1, 12, '2015-09-30', '5144360852738', 0, 1, 0),
(65, 'Lenovo Tab A7', '15000', '25000', '45', 1, 12, '2015-10-09', '8144439878232', 0, 1, 0),
(66, 'Power Cable', '200', '500', '59', 1, 12, '2015-10-09', '8144439878232', 0, 1, 0),
(67, 'Power Bank', '1000', '2000', '40', 1, 12, '2015-10-09', '8144439878232', 0, 1, 0),
(68, '16GB SD Card', '1600', '2500', '43', 1, 12, '2015-10-09', '8144439878232', 0, 1, 0),
(69, '16GB Transcend (Jet 300)', '2200', '2500', '25', 1, 12, '2015-10-09', '8144439878232', 0, 1, 0),
(70, 'Havit USB Keyboard', '550', '800', '87', 1, 13, '2015-10-31', '3144629331651', 0, 1, 0),
(71, 'Nokia Lumia 520', '19500', '22500', '114', 1, 13, '2015-10-31', '3144629331651', 0, 1, 0),
(72, 'Samsung Note 2 Charger', '700', '2000', '39', 1, 13, '2015-10-31', '3144629331651', 0, 1, 0),
(73, 'Perfect Optical Mouse', '350', '500', '6', 3, 13, '2015-11-03', '3144653980538', 0, 1, 0),
(74, 'Lenovo Tab A7', '15000', '25000', '45', 1, 13, '2015-11-03', '3144653980538', 0, 1, 0),
(75, 'iPad/iPhone 4 Charger', '1000', '1500', '125', 1, 13, '2015-11-03', '3144653980538', 0, 1, 0),
(76, 'Infinix Hot 2', '18500', '22000', '132', 1, 13, '2015-11-03', '3144654323798', 0, 1, 0),
(77, 'Samsung Galaxy Grand Prime', '34000', '37000', '117', 1, 13, '2015-11-10', '11447147720109', 0, 1, 0),
(78, 'Samsung Bluetooth Earpiece', '1800', '3000', '127', 1, 13, '2015-11-12', '4144733342349', 0, 1, 0),
(79, 'Dell Optical Mouse', '550', '800', '5', 1, 13, '2015-11-12', '4144733342349', 0, 1, 0),
(80, 'Gear Head Wireless Mouse', '1000', '2000', '130', 1, 13, '2015-11-12', '4144733342349', 0, 1, 0),
(81, '2GB Dell IPS', 'Not Fixed', 'NaN', '28', 2, 1, '2017-04-24', 'P2149308703416', 0, 0, 0),
(82, '16GB SD Card', '2500', '2500', '43', 1, 1, '2017-09-18', 'P5150572593794', 0, 1, 0),
(83, '16GB Transcend (Jet 510G)', '3000', '3000', '24', 1, 1, '2017-09-18', 'P5150572593794', 0, 1, 0),
(84, '16GB SanDisk Flash Drive', '2500', '5000', '140', 2, 1, '2017-09-18', 'DIS81505727490610', 0, 1, 0),
(85, '16GB Transcend (Jet 300)', '2500', '2500', '25', 1, 1, '2017-09-18', 'DIS81505727490610', 0, 1, 0),
(86, '16GB SanDisk Flash Drive', '2500', '2500', '140', 1, 1, '2017-09-18', 'DIS7150572789831', 0, 1, 0),
(87, '16GB SanDisk Flash Drive', '2500', '2500', '140', 1, 1, '2017-09-18', 'DIS5150572914173', 0, 1, 0),
(88, '16GB SanDisk Flash Drive', '2500', '25000', '140', 10, 1, '2017-09-18', 'DIS8150574456333', 0, 1, 0),
(89, '16GB Transcend (Jet 300)', '2500', '37500', '25', 15, 1, '2017-09-18', 'DIS8150574456333', 0, 1, 0),
(90, '16GB Transcend (Jet 300)', '2500', '12500', '25', 5, 1, '2017-09-18', 'DIS8150574456333', 0, 1, 0),
(91, '16GB Transcend (Jet 510G)', '3000', '15000', '24', 5, 1, '2017-09-18', 'DIS8150574456333', 0, 1, 0),
(92, '1GB Dell Hand Band', '1000', '10000', '29', 10, 1, '2017-09-18', 'DIS8150574456333', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `iid` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `price` varchar(20) NOT NULL,
  `descript` varchar(200) NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sms_account`
--

CREATE TABLE `sms_account` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `datentime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms_account`
--

INSERT INTO `sms_account` (`id`, `username`, `password`, `datentime`) VALUES
(1, 'vinnoangel@gmail.com', 'My 19761', '2018-06-11 03:23:02');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `gid` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `othername` varchar(50) NOT NULL,
  `typeid` int(11) NOT NULL,
  `sex` varchar(8) NOT NULL,
  `residential` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(35) NOT NULL,
  `employdate` date NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `passport` varchar(100) NOT NULL,
  `nname` varchar(50) NOT NULL,
  `naddress` varchar(250) NOT NULL,
  `nemail` varchar(50) NOT NULL,
  `nphone` varchar(30) NOT NULL,
  `user` int(11) NOT NULL,
  `xdate` date NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `systemusers`
--

CREATE TABLE `systemusers` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `log` datetime NOT NULL,
  `email` varchar(255) NOT NULL,
  `xdate` date NOT NULL,
  `status` int(11) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `deptids` int(11) NOT NULL,
  `cat` int(255) NOT NULL,
  `expenses` int(11) NOT NULL DEFAULT '0',
  `users` int(11) NOT NULL DEFAULT '0',
  `set_items` int(11) NOT NULL DEFAULT '0',
  `re_order_level` int(11) NOT NULL DEFAULT '0',
  `stock_entry` int(11) NOT NULL DEFAULT '0',
  `sale_item` int(11) NOT NULL DEFAULT '0',
  `report` int(11) NOT NULL DEFAULT '0',
  `customers` int(11) NOT NULL DEFAULT '0',
  `backup` int(11) NOT NULL DEFAULT '0',
  `company` int(11) NOT NULL,
  `invoice` int(11) NOT NULL,
  `sms` int(11) NOT NULL,
  `shelf` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `systemusers`
--

INSERT INTO `systemusers` (`id`, `username`, `password`, `log`, `email`, `xdate`, `status`, `surname`, `fname`, `deptids`, `cat`, `expenses`, `users`, `set_items`, `re_order_level`, `stock_entry`, `sale_item`, `report`, `customers`, `backup`, `company`, `invoice`, `sms`, `shelf`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2015-11-14 19:05:38', 'nobleogyify@yahoo.com', '2012-10-12', 0, 'Enyika', 'Iheanyi', 0, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `id` int(11) NOT NULL,
  `class` varchar(20) NOT NULL,
  `xdate` date NOT NULL,
  `user` int(11) NOT NULL,
  `sch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`id`, `class`, `xdate`, `user`, `sch`) VALUES
(1, 'Mr', '2014-05-27', 1, 0),
(2, 'Mrs', '2014-05-27', 1, 0),
(3, 'Miss', '2014-05-27', 1, 0),
(4, 'Dr', '2014-05-27', 1, 0),
(5, 'Prof', '2014-05-27', 1, 0),
(6, 'Engr', '2014-05-27', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usercat`
--

CREATE TABLE `usercat` (
  `id` int(11) NOT NULL,
  `cat` varchar(255) NOT NULL,
  `role1` int(11) NOT NULL DEFAULT '0',
  `role2` int(11) NOT NULL DEFAULT '0',
  `role3` int(11) NOT NULL DEFAULT '0',
  `role4` int(11) NOT NULL DEFAULT '0',
  `role5` int(11) NOT NULL DEFAULT '0',
  `role6` int(11) NOT NULL DEFAULT '0',
  `role7` int(11) NOT NULL DEFAULT '0',
  `role8` int(11) NOT NULL DEFAULT '0',
  `role9` int(11) NOT NULL DEFAULT '0',
  `role10` int(11) NOT NULL DEFAULT '0',
  `role11` int(11) NOT NULL DEFAULT '0',
  `role12` int(11) NOT NULL DEFAULT '0',
  `xdate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usercat`
--

INSERT INTO `usercat` (`id`, `cat`, `role1`, `role2`, `role3`, `role4`, `role5`, `role6`, `role7`, `role8`, `role9`, `role10`, `role11`, `role12`, `xdate`) VALUES
(2, 'Admin', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2012-11-16'),
(14, 'Staff', 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 1, '2014-12-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batcheditem`
--
ALTER TABLE `batcheditem`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `clocking`
--
ALTER TABLE `clocking`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `customer_messages`
--
ALTER TABLE `customer_messages`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `dailyexpenses`
--
ALTER TABLE `dailyexpenses`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `debtors`
--
ALTER TABLE `debtors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventcalender`
--
ALTER TABLE `eventcalender`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `expensestype`
--
ALTER TABLE `expensestype`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `happyhour`
--
ALTER TABLE `happyhour`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `items_update`
--
ALTER TABLE `items_update`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lowstock`
--
ALTER TABLE `lowstock`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `messages_templates`
--
ALTER TABLE `messages_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `paid_debt`
--
ALTER TABLE `paid_debt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passmarks2`
--
ALTER TABLE `passmarks2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payees`
--
ALTER TABLE `payees`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `paymenthistory`
--
ALTER TABLE `paymenthistory`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `paymentvoucher`
--
ALTER TABLE `paymentvoucher`
  ADD PRIMARY KEY (`pvid`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `sms_account`
--
ALTER TABLE `sms_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `systemusers`
--
ALTER TABLE `systemusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usercat`
--
ALTER TABLE `usercat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batcheditem`
--
ALTER TABLE `batcheditem`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `clocking`
--
ALTER TABLE `clocking`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer_messages`
--
ALTER TABLE `customer_messages`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dailyexpenses`
--
ALTER TABLE `dailyexpenses`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `debtors`
--
ALTER TABLE `debtors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eventcalender`
--
ALTER TABLE `eventcalender`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expensestype`
--
ALTER TABLE `expensestype`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `happyhour`
--
ALTER TABLE `happyhour`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `items_update`
--
ALTER TABLE `items_update`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lowstock`
--
ALTER TABLE `lowstock`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages_templates`
--
ALTER TABLE `messages_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ordertable`
--
ALTER TABLE `ordertable`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paid_debt`
--
ALTER TABLE `paid_debt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `passmarks2`
--
ALTER TABLE `passmarks2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payees`
--
ALTER TABLE `payees`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymenthistory`
--
ALTER TABLE `paymenthistory`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `paymentvoucher`
--
ALTER TABLE `paymentvoucher`
  MODIFY `pvid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_account`
--
ALTER TABLE `sms_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `systemusers`
--
ALTER TABLE `systemusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usercat`
--
ALTER TABLE `usercat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
