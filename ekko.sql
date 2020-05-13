-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 13, 2020 at 02:06 PM
-- Server version: 5.7.21-1ubuntu1
-- PHP Version: 7.2.3-1ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekko`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_items`
--

CREATE TABLE `all_items` (
  `id` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(120) NOT NULL,
  `image` varchar(255) NOT NULL,
  `on_sale` tinyint(1) NOT NULL,
  `merchant_id` int(50) NOT NULL,
  `merchant_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_items`
--

INSERT INTO `all_items` (`id`, `name`, `description`, `price`, `image`, `on_sale`, `merchant_id`, `merchant_name`) VALUES
(1, 'The Village', 'The Village art piece makes an amazing center piece. It can be placed in the living or dining room wall to tie the room together with its warm colors.', 800, 'art_edit.jpg', 1, 1, 'Ajanlekoko'),
(2, 'Jamaican Swagger', 'Jamaican Swagger is an Afro-fusion piece that celebrates color, culture and the uniqueness of the African heritage and more specifically that of Jamaica.', 1100, 'art_edit_1.jpg', 0, 2, 'Omiata'),
(3, 'Colorful Pride', 'Colorful Pride is a sense of home, owning who you are. This painting simply makes a statement. Be proud of you.', 1500, 'art_edit_2.jpg', 0, 3, 'Apeloko'),
(4, 'Sky High', 'Sky High is a celebration of the African beauty. That is the wildlife that is found of the continent. It is a celebration of the beautiful Giraffes.', 900, 'art_edit_3.jpg', 0, 4, 'Abimbola'),
(5, 'We Move', 'A painting capturing the essence of working together to make strides. This piece demonstrates unity and does so with a burst of color.', 850, 'art_edit_4.jpg', 1, 5, 'Abioye'),
(6, 'Twin Uteo', 'The Uteo is a woven basket-like lid that is traditionally used as a winnower. Today, it serves as modern decoration and comes in different shapes, colors and sizes.', 70, 'art_edit_5.jpg', 0, 6, 'Adebowale');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(50) NOT NULL,
  `customer_id` int(50) NOT NULL,
  `item_id` int(50) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(50) NOT NULL,
  `total_amount` int(50) NOT NULL,
  `created_on` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `customer_id`, `item_id`, `item_name`, `quantity`, `total_amount`, `created_on`) VALUES
(1, 1, 5, 'We Move', 1, 850, '2020-05-13 09:21:54.000000'),
(2, 1, 2, 'Jamaican Swagger', 1, 1100, '2020-05-13 09:22:27.000000'),
(3, 1, 4, 'Sky High', 1, 900, '2020-05-13 09:22:35.000000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`) VALUES
(1, 'random.user ', 'Random ', 'User', 'random.user@gmail.com', '43299038614edb9937a834a64c143ab3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_items`
--
ALTER TABLE `all_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_items`
--
ALTER TABLE `all_items`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
