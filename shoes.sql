-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2019 at 07:51 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `name`, `description`, `image`, `price`) VALUES
(9, 'Plumber', 'Are you looking for an expert plumbing service to get your water tank cleaned or the wash basin unclogged?         ', 'plumber.jpg', '100'),
(10, 'Carpentary', '  Interior and exterior door installation or replacement. Interior and exterior trim installation or replaceent. Base trim and crown molding installation.            ', 'carpent.png', '100'),
(11, 'Beauty', '  Hairstyling. Hair Colouring. Facial. Pedicure. Manicure + more. Head Massage. Hair Cut. Hair Care Treatment. Makeup. Body waxing      ', 'beauty1.jpg', '100'),
(12, 'Home Cleaning', '  Are you thinking of opting for a kitchen or bathroom deep cleaning? Log on to Service Joy, check out our home cleaning services and book a service easily           ', 'cleaning.jpg', '100'),
(13, 'Construction', '  Our expert construction builders and construction contractors can help you set off your home/office construction plans.           ', 'constructionjpg.jpg', '100'),
(14, 'Electrical', ' Are you looking for a qualified electrician to fit an exhaust fan in your kitchen? Then, register on ServiceJoy and book top-quality electrical Experts.     ', 'electrical.jpg', '100'),
(15, 'Painting', ' Best home painting services by verified professional, On time services for Interior House Painting, Exterior House Painting, Wood Painting, Metal Painting', 'paint.jpg', '100'),
(16, 'Pest Control', 'We offers you various kinds of pest management services such as pest control, insect control, termite control, cockroach control.', 'pest.jpg', '200'),
(17, 'Appliances Repair', 'Get professionals for repair service for all your home appliances with ServiceJoy. Book online for any kind of installation or repair work.', 'repair.jpg', '100'),
(18, 'Courier Services', 'Are you looking to Send parcels To Your Friends & Relatives Then, Book on ServiceJoy and Get your Parcels Picked Up From Your Doorsteps.', 'courier.jpg', '100');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `service` varchar(255) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'confirmed',
  `custid` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `service`, `pname`, `mobile`, `pincode`, `city`, `state`, `address`, `time`, `status`, `custid`) VALUES
(69, 'Courier Services', 'Rohit Sood', '9803748982', '141003', 'Ludhiana', 'Punjab', '#6906, St no. 12, new janta nagar, near maghar di chakki, near kamal diary', '09:00AM-12:00PM', '1', 1),
(70, 'Electrical', 'deeksha Sood', '98037412822', '141003', 'Ludhiana', 'Punjab', '#6906, St no. 12, new janta nagar, near maghar di chakki, near kamal diary', '03:00PM-06:00PM', '1', 4),
(71, 'Electrical', 'Rohit Sood', '9803748982', '141003', 'Ludhiana', 'Punjab', '#6906, St no. 12, new janta nagar, near maghar di chakki, near kamal diary', '03:00PM-06:00PM', 'Confirmed', 4);

-- --------------------------------------------------------

--
-- Table structure for table `serviceman`
--

CREATE TABLE `serviceman` (
  `id` bigint(20) NOT NULL,
  `service` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serviceman`
--

INSERT INTO `serviceman` (`id`, `service`, `name`, `contact`) VALUES
(1, 'plumber', 'Rohit', '9803748982'),
(2, 'Carpentary', 'Prabhdeep', '9780302705'),
(3, 'courier', 'pankaj', '9803918485'),
(4, 'beauty', 'nandni', '9876543210'),
(5, 'home cleaning', 'manisha', '9123456780'),
(6, 'construction', 'jagveer', '9815780324'),
(7, 'appliances repair', 'arsh', '9638527410'),
(8, 'pest control', 'avtar', '8418529630'),
(9, 'painting', 'aman', '9517538520'),
(10, 'electrical', 'baljeet', '8360552149');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'Rohit', 'rohitsood4445@gmail.com', 'admin'),
(2, 'Rohit soodd', 'rohitsood4440@gmail.com', 'rohitsood'),
(3, 'Rohit soodd', 'rohitsood4440@gmail.com', 'rohitsood'),
(4, 'Deeksha ', 'deeksha1294@gmail.com', 'rohit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serviceman`
--
ALTER TABLE `serviceman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `serviceman`
--
ALTER TABLE `serviceman`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
