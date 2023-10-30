-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2023 at 09:09 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart_tbl`
--

CREATE TABLE `add_to_cart_tbl` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(225) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(225) NOT NULL,
  `admin_email` varchar(225) NOT NULL,
  `admin_password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'mary john', 'maryjohn242322@gmail.com', 'qwerty');

-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE `category_tbl` (
  `category_id` int(100) NOT NULL,
  `category_name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_tbl`
--

INSERT INTO `category_tbl` (`category_id`, `category_name`) VALUES
(1, 'Cooking Essentials'),
(2, 'Packaged Food'),
(3, 'Personal Care'),
(4, 'Snacks & Soft Drinks');

-- --------------------------------------------------------

--
-- Table structure for table `payment_tbl`
--

CREATE TABLE `payment_tbl` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(225) NOT NULL,
  `amount` int(225) NOT NULL,
  `card_number` int(225) NOT NULL,
  `expiry_month` int(100) NOT NULL,
  `cvv_number` int(100) NOT NULL,
  `expiry_year` int(100) NOT NULL,
  `holder_name` varchar(225) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_tbl`
--

INSERT INTO `payment_tbl` (`payment_id`, `order_id`, `invoice_number`, `amount`, `card_number`, `expiry_month`, `cvv_number`, `expiry_year`, `holder_name`, `date`) VALUES
(1, 3, 1985480120, 1012, 0, 12, 0, 2022, 'mary', '2022-11-27 12:21:56'),
(2, 5, 847182266, 1798, 0, 11, 0, 2023, 'JENCY', '2022-11-27 14:10:32'),
(3, 7, 768834755, 590, 0, 8, 0, 2025, 'anu', '2022-11-28 09:48:45'),
(4, 4, 1985480120, 0, 0, 11, 0, 2023, 'mary', '2022-12-04 08:35:32'),
(6, 10, 847182266, 950, 0, 12, 0, 2031, 'mary', '2022-12-04 17:02:44'),
(7, 11, 847182266, 378, 0, 12, 0, 2030, 'jency', '2022-12-04 17:05:02'),
(9, 14, 1985480120, 208, 0, 12, 0, 2028, 'mary', '2022-12-06 17:36:36'),
(14, 24, 1985480120, 590, 0, 0, 0, 0, '', '2023-03-04 08:06:06'),
(15, 26, 1985480120, 899, 0, 8, 0, 2023, 'mary', '2023-03-06 14:31:29'),
(16, 27, 847182266, 54, 0, 12, 0, 2024, 'jency', '2023-03-07 14:37:54');

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `product_id` int(100) NOT NULL,
  `product_name` varchar(225) NOT NULL,
  `product_description` varchar(225) NOT NULL,
  `product_keyword` varchar(225) NOT NULL,
  `category_id` int(100) NOT NULL,
  `sub_category_id` int(100) NOT NULL,
  `product_image` varchar(225) NOT NULL,
  `product_offer` int(100) NOT NULL,
  `product_actual_price` int(100) NOT NULL,
  `product_current_price` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`product_id`, `product_name`, `product_description`, `product_keyword`, `category_id`, `sub_category_id`, `product_image`, `product_offer`, `product_actual_price`, `product_current_price`, `date`, `status`) VALUES
(1, 'Wheat Atta', 'Safe Harvest Whole Wheat Atta (5 kg)', 'safe, wheat,atta', 1, 1, 'Atta.jpeg', 20, 325, 260, '2023-03-07 14:25:08', 'true'),
(2, 'Roasted Rava', 'Elite Roasted Rava (500 gm)', 'elite,rava', 1, 1, 'Rava.jpg', 10, 39, 35, '2023-03-07 14:25:43', 'true'),
(3, 'Maida', 'Elite Maida (500 gm)', 'elite,maida', 1, 1, 'Maida.jpg', 10, 36, 32, '2022-11-27 07:49:38', 'true'),
(4, 'Appam Podi', 'Palat Appam Podi (1 kg)', 'palat,appam podi', 1, 1, 'appam-podi.jpg', 10, 86, 77, '2022-11-27 07:51:40', 'true'),
(5, 'Idiyappam Podi', 'Naga Idiyappam Flour (500 gm)', 'naga,idiyappam podi', 1, 1, 'Idiyappam flour.jpg', 5, 46, 44, '2022-11-27 08:03:10', 'true'),
(6, 'Cooking Oil', 'Saffola Tasty Refined Cooking Oil (1 L)', 'saffola,cooking oil', 1, 3, 'Cooking oil.jpg', 15, 200, 170, '2022-11-27 08:08:15', 'true'),
(7, 'Toor Dal', 'Safe Harvest Toor/ Arhar Dal (1 kg)', 'safe,harvest,toor dal,arhar dal,dal', 1, 4, 'tur-dal-toor-dal-safe-harvest-original-imag762nbvgz3d7e.jpeg', 20, 225, 180, '2022-11-27 08:19:30', 'true'),
(8, 'Urad Dal', 'Nature Organic Urad Dal (1 kg)', 'nature,organic,urad dal,dal', 1, 4, 'urad dal.png', 25, 250, 188, '2022-11-27 08:20:46', 'true'),
(9, 'Green Peas', 'Origo Fresh Green Peas (500 gm)', 'origo,green peas,peas', 1, 4, 'green peas.png', 50, 140, 70, '2022-11-27 08:23:22', 'true'),
(10, 'Brown Chana', 'Tata Sampann Brown Chana (1 kg)', 'tata,brown chana,chana,dal', 1, 4, 'brown chana.jpg', 10, 125, 113, '2022-11-27 08:26:56', 'true'),
(11, 'Soya Chunks', 'Fortune Soya Chunks (200 gm)', 'fortune,soya chunks,soya', 1, 4, 'soya chunks.jpg', 10, 60, 54, '2022-11-27 08:32:53', 'true'),
(12, 'Ghee Pouch', 'Godrej Jersey Ghee 100 ml Pouch', 'godrej,ghee', 1, 3, 'Ghee.jpeg', 20, 75, 60, '2022-11-27 08:35:33', 'true'),
(13, 'Sunflower Oil', 'Gold Winner Refined Sunflower Oil (1 L)', 'gold winner,sunflower oil,oil', 1, 3, 'Sunflower oil.jpg', 15, 185, 157, '2022-11-27 08:38:18', 'true'),
(14, 'Olive Oil', 'Oleev Extra Light Olive Oil Plastic Bootle (1 L)', 'oleev,olive oil,oil', 1, 3, 'Olive oil.jpg', 40, 1499, 899, '2022-11-27 08:41:10', 'true'),
(15, 'Groundnut Oil', 'Mr.Gold Groundnut Oil Pouch (1 L)', 'mr.gold,groundnut oil,oil', 1, 3, 'Groundnut oil.jpeg', 10, 215, 194, '2022-11-27 08:46:22', 'true'),
(16, 'Cashews', 'Happilo 100% Natural Premium Whole Kajul Cashews (500 gm)', 'happilo,cashew', 1, 2, 'Cashew.jpeg', 40, 775, 465, '2022-11-27 08:49:50', 'true'),
(17, 'Almonds', 'Farmely Premium California Almonds (500 gm)', 'farmely,almond', 1, 2, 'Almond .jpg', 50, 949, 475, '2022-11-27 08:57:46', 'true'),
(18, 'Dates', 'Molsis Royal Zahidi Dates (500 gm)', 'molsis,dates', 1, 2, 'Dates.jpg', 35, 160, 104, '2022-11-27 09:00:33', 'true'),
(19, 'Cranberries', 'Regency Dried Cranberries (200 gm)', 'regency,dried cranberries,dry fruits,cranberries', 1, 2, 'Cranberries.jpg', 35, 260, 169, '2022-11-27 09:03:35', 'true'),
(20, 'Blueberry', 'Regency Dried Blueberry ', 'regency,blueberry', 1, 2, 'Blueberry.jpg', 30, 240, 168, '2022-11-27 09:47:50', 'true'),
(21, 'Black Pepper', 'Zoff Black Pepper (50 gm)', 'zoff,black pepper,pepper', 1, 5, 'black pepper.png', 15, 82, 70, '2022-11-27 09:50:15', 'true'),
(22, 'Chicken Masala', 'Aachi Chicken Masala', 'aachi,chicken masala,masala', 1, 5, 'chicken masala.jpg', 10, 55, 50, '2022-11-27 09:53:13', 'true'),
(23, 'Sambar Powder', 'Eastern Sambar Powder', 'eastern,sambar powder,powder', 1, 5, 'sambar powder.png', 8, 52, 48, '2022-11-27 09:57:14', 'true'),
(24, 'Chilli Powder', 'Tata Sampann Chilli Powder (100 gm)', 'tata,chilli powder,powder', 1, 5, 'chilli powder.jpg', 20, 105, 84, '2022-11-27 10:00:39', 'true'),
(25, 'Coriander Powder', 'Kitchen Treasures Coriander Powder (500 gm)', 'kitchen teasures, coriander powder,powder', 1, 5, 'coriander powder.jpg', 15, 121, 103, '2022-11-27 10:02:55', 'true'),
(26, 'Cerelac', 'baby item', 'cerelac', 4, 18, 'bv4.png', 15, 230, 196, '2022-11-28 10:04:08', 'true'),
(27, 'Dark Fantasy', 'Sunfeast Dark Fantasy Choco Fills Cream Filled (300 g)', 'sunfeast,dark fantasy,biscuits', 4, 16, 'dark fantasy.jpg', 35, 170, 111, '2023-03-07 16:34:09', 'true'),
(28, 'Potato Chips', 'Pringles Orginal Potato Chips (107 g)', 'chips,pringles,potato chips', 4, 16, 'potato chips.jpg', 10, 115, 104, '2023-03-07 16:36:34', 'true'),
(29, 'Banana Chips', 'Beyond Snacks Kerala Banana Peri Peri Chips (85 g)', 'banana chips,peri peri chips,kerala chips,chips,beyond snack', 4, 16, 'banana chips.jpg', 30, 120, 84, '2023-03-07 16:39:51', 'true'),
(30, 'Milk Rusk', 'Elite Classic Milk Rusk (405 g)', 'rusk,milk rusk,elite,snacks', 4, 16, 'Rusk.png', 15, 65, 55, '2023-03-07 16:43:04', 'true'),
(31, 'Cashew Cookies', 'Britannia Good Day Cashew Cookies (120 g)', 'good day,cashew cookies,britannia,biscuit', 4, 16, 'biscuit.png', 0, 20, 20, '2023-03-07 16:46:07', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `review_tbl`
--

CREATE TABLE `review_tbl` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_review` varchar(225) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review_tbl`
--

INSERT INTO `review_tbl` (`review_id`, `product_id`, `user_id`, `product_review`, `date`) VALUES
(1, 1, 1, 'nice product', '2022-11-27 12:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_tbl`
--

CREATE TABLE `sub_category_tbl` (
  `sub_category_id` int(100) NOT NULL,
  `sub_category_name` varchar(225) NOT NULL,
  `category_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_category_tbl`
--

INSERT INTO `sub_category_tbl` (`sub_category_id`, `sub_category_name`, `category_id`) VALUES
(1, 'Atta & Flour', 1),
(2, 'Dry Fruits & Seeds', 1),
(3, 'Ghee & Oil', 1),
(4, 'Dals & Pulse', 1),
(5, 'Masala & Spices', 1),
(6, 'Noodles & Pasta', 2),
(7, 'Chocolates & Sweets', 2),
(8, 'Breakfast Cereals', 2),
(9, 'Ketchups & Spreads', 2),
(10, 'Jams & Honey', 2),
(11, 'Soaps & Face Washes', 3),
(12, 'Hair Care', 3),
(13, 'Oral Care', 3),
(14, 'Kajal & Makeup Products', 3),
(15, 'Creams & Lotions', 3),
(16, 'Biscuits & chips', 4),
(17, 'Tea & Coffee', 4),
(18, 'Juices & Soft Drinks', 4),
(19, 'make up items', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_login_tbl`
--

CREATE TABLE `user_login_tbl` (
  `login_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login_tbl`
--

INSERT INTO `user_login_tbl` (`login_id`, `user_id`, `username`, `password`) VALUES
(1, 0, 'joyals', '$2y$10$ei534AFkzVCIeKLV3pwYOefoFPcBJmQrmfjgZULLUHj/RFvuRXIcW'),
(2, 0, 'mary', '$2y$10$lxupznpFoU.TfACaOoQoJuvjgqLiuYQLTU5e9WX4OLxkCVtqjeRNa'),
(3, 0, 'jency', '$2y$10$hhQlIdnm2dPF2Wke2hjjieQmfH./7kUhMpmloL2A1HMLCcbc/4vtW'),
(4, 0, 'hanna', '$2y$10$pXZkLyuvLLsnjlv5zmksbeJxmv6nDjSSkpyjI3bSrHFrD7R1qjnUO'),
(5, 0, 'joyal', '$2y$10$usg7WWOyALtWjdzPNwb/0OZlLeE3h/.4KRzEsb9GRe4YOcgUpOlU.'),
(6, 0, 'sreejith', '$2y$10$xaQ7gVdr/ccFlct1/cmwC.mtf3gthOTFQuM5zadXXC73D9w1rmqp6'),
(7, 0, 'anu', '$2y$10$VTj9IHjD9BTW6KlCBuCo7..nRDJ833/KVVVLBLnK/AFEUbCfFejJ6');

-- --------------------------------------------------------

--
-- Table structure for table `user_order_pending_tbl`
--

CREATE TABLE `user_order_pending_tbl` (
  `order_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `amount_due` int(225) NOT NULL,
  `invoice_number` int(100) NOT NULL,
  `product_quantity` int(100) NOT NULL,
  `order_status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_order_tbl`
--

CREATE TABLE `user_order_tbl` (
  `order_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `particular_price` int(225) NOT NULL,
  `amount_due` int(100) NOT NULL,
  `invoice_number` int(100) NOT NULL,
  `products_quantity` int(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_order_tbl`
--

INSERT INTO `user_order_tbl` (`order_id`, `user_id`, `product_id`, `particular_price`, `amount_due`, `invoice_number`, `products_quantity`, `order_date`, `order_status`) VALUES
(1, 1, 1, 520, 520, 1985480120, 2, '2022-11-27 12:21:56', 'Completed'),
(2, 1, 5, 132, 652, 1985480120, 3, '2022-11-27 12:21:56', 'Completed'),
(3, 1, 7, 360, 1012, 1985480120, 2, '2022-11-27 12:21:56', 'Completed'),
(4, 1, 14, 1798, 1798, 608267788, 2, '2022-12-04 08:35:33', 'Completed'),
(5, 2, 14, 1798, 1798, 847182266, 2, '2022-11-27 14:10:32', 'Completed'),
(6, 6, 1, 520, 520, 768834755, 2, '2022-11-28 09:48:45', 'Completed'),
(7, 6, 2, 70, 590, 768834755, 2, '2022-11-28 09:48:45', 'Completed'),
(8, 1, 19, 338, 338, 639349024, 2, '2022-12-04 12:17:40', 'Completed'),
(9, 1, 17, 950, 950, 1232072433, 2, '2022-12-06 17:33:26', 'Completed'),
(10, 2, 17, 950, 950, 60983783, 2, '2022-12-04 17:02:44', 'Completed'),
(11, 2, 11, 378, 378, 372508027, 7, '2022-12-04 17:05:02', 'Completed'),
(12, 2, 5, 88, 88, 1494388759, 2, '2023-03-07 14:37:54', 'Completed'),
(13, 1, 5, 88, 88, 2038685653, 2, '2022-12-06 17:33:26', 'Completed'),
(14, 1, 18, 208, 208, 1843568783, 2, '2022-12-06 17:36:36', 'Completed'),
(15, 3, 21, 140, 140, 357954675, 2, '2022-12-06 18:18:16', 'Completed'),
(16, 3, 22, 150, 150, 1140535353, 3, '2022-12-06 18:23:23', 'Completed'),
(17, 1, 19, 169, 169, 1779651812, 1, '2023-01-09 02:29:38', 'Completed'),
(18, 1, 16, 465, 465, 172906044, 1, '2023-03-02 18:34:50', 'Completed'),
(19, 1, 1, 520, 520, 1424276492, 2, '2023-03-04 08:06:07', 'Completed'),
(20, 1, 9, 70, 590, 1424276492, 1, '2023-03-04 08:06:07', 'Completed'),
(21, 1, 1, 520, 520, 300716291, 2, '2023-03-04 08:06:07', 'Completed'),
(22, 1, 9, 70, 590, 300716291, 1, '2023-03-04 08:06:07', 'Completed'),
(23, 1, 1, 520, 520, 1367377133, 2, '2023-03-04 08:06:07', 'Completed'),
(24, 1, 9, 70, 590, 1367377133, 1, '2023-03-04 08:06:07', 'Completed'),
(25, 1, 14, 899, 899, 65758045, 1, '2023-03-06 14:31:29', 'Completed'),
(26, 1, 14, 899, 899, 1948911166, 1, '2023-03-06 14:31:29', 'Completed'),
(27, 2, 11, 54, 54, 1393388312, 1, '2023-03-07 14:37:54', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `user_id` int(100) NOT NULL,
  `user_email` varchar(225) NOT NULL,
  `user_address` varchar(225) NOT NULL,
  `user_phone_number` varchar(225) NOT NULL,
  `user_ip_address` varchar(225) NOT NULL,
  `user_password` varchar(225) NOT NULL,
  `user_image` varchar(225) NOT NULL,
  `username` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`user_id`, `user_email`, `user_address`, `user_phone_number`, `user_ip_address`, `user_password`, `user_image`, `username`) VALUES
(1, 'maryjohn242322@gmail.com', 'vettathu puthuppally kottayam', '7736895093', '::1', '$2y$10$lxupznpFoU.TfACaOoQoJuvjgqLiuYQLTU5e9WX4OLxkCVtqjeRNa', 'kid.jpg', 'mary'),
(2, 'jjencykuriakose@gmail.com', 'painumkal manarcad kottayam', '7356027052', '::1', '$2y$10$hhQlIdnm2dPF2Wke2hjjieQmfH./7kUhMpmloL2A1HMLCcbc/4vtW', 'kid 2.jpg', 'jency'),
(3, 'hannareji243@gmail.com', 'kochuveetil g s road kottayam', '7034129477', '::1', '$2y$10$pXZkLyuvLLsnjlv5zmksbeJxmv6nDjSSkpyjI3bSrHFrD7R1qjnUO', 'kid 4.jpg', 'hanna'),
(4, 'joyals775@gmail.com', 'mattathil rani pathanamthitta', '8590343392', '::1', '$2y$10$usg7WWOyALtWjdzPNwb/0OZlLeE3h/.4KRzEsb9GRe4YOcgUpOlU.', 'kid 3.jpg', 'joyal'),
(5, 'sreejith654@yahoo.com', 'thandasherryil mithrakari alappuzha', '7034576061', '::1', '$2y$10$xaQ7gVdr/ccFlct1/cmwC.mtf3gthOTFQuM5zadXXC73D9w1rmqp6', 'kid 5.png', 'sreejith'),
(6, 'anu@gmail.com', 'ttsdfytr434', '1234567890', '::1', '$2y$10$VTj9IHjD9BTW6KlCBuCo7..nRDJ833/KVVVLBLnK/AFEUbCfFejJ6', 'kid 3.jpg', 'anu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_to_cart_tbl`
--
ALTER TABLE `add_to_cart_tbl`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category_tbl`
--
ALTER TABLE `category_tbl`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `review_tbl`
--
ALTER TABLE `review_tbl`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `sub_category_tbl`
--
ALTER TABLE `sub_category_tbl`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `user_login_tbl`
--
ALTER TABLE `user_login_tbl`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `user_order_pending_tbl`
--
ALTER TABLE `user_order_pending_tbl`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_order_tbl`
--
ALTER TABLE `user_order_tbl`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_to_cart_tbl`
--
ALTER TABLE `add_to_cart_tbl`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
  MODIFY `category_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment_tbl`
--
ALTER TABLE `payment_tbl`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `review_tbl`
--
ALTER TABLE `review_tbl`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_category_tbl`
--
ALTER TABLE `sub_category_tbl`
  MODIFY `sub_category_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_login_tbl`
--
ALTER TABLE `user_login_tbl`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_order_pending_tbl`
--
ALTER TABLE `user_order_pending_tbl`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_order_tbl`
--
ALTER TABLE `user_order_tbl`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
