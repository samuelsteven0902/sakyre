-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2022 at 12:42 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sakyre-bs`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_bank`
--

CREATE TABLE `db_bank` (
  `bank_id` int(12) NOT NULL,
  `bank_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_bank`
--

INSERT INTO `db_bank` (`bank_id`, `bank_name`) VALUES
(1, 'BCA'),
(2, 'BRI'),
(3, 'BNI'),
(4, 'MANDIRI');

-- --------------------------------------------------------

--
-- Table structure for table `db_category`
--

CREATE TABLE `db_category` (
  `category_id` int(12) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_category`
--

INSERT INTO `db_category` (`category_id`, `category_name`) VALUES
(1, 'Romance'),
(2, 'Fantasy'),
(3, 'Action'),
(7, 'Sci-Fi'),
(8, 'Thriller'),
(9, 'Comedy'),
(10, 'Jungle');

-- --------------------------------------------------------

--
-- Table structure for table `db_ongkir`
--

CREATE TABLE `db_ongkir` (
  `ongkir_id` int(11) NOT NULL,
  `ongkir_kota` varchar(50) NOT NULL,
  `ongkir_harga` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_ongkir`
--

INSERT INTO `db_ongkir` (`ongkir_id`, `ongkir_kota`, `ongkir_harga`) VALUES
(1, 'Jakarta', 20000),
(2, 'Yogyakarta', 5000),
(3, 'Malang', 6000),
(4, 'Kartasura', 5000),
(5, 'Surabaya', 15000),
(6, 'Bandung', 22000);

-- --------------------------------------------------------

--
-- Table structure for table `db_product`
--

CREATE TABLE `db_product` (
  `product_id` int(12) NOT NULL,
  `category_id` int(12) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `desc` varchar(100) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_status` varchar(10) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_product`
--

INSERT INTO `db_product` (`product_id`, `category_id`, `product_name`, `product_price`, `product_description`, `desc`, `product_image`, `product_status`, `date_created`) VALUES
(11, 7, 'The Psychology of Money', 250000, '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>\r\n', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. ', 'sakyre1623779024.jpg', '1', '2021-06-10 17:00:00'),
(20, 9, 'The Fetch', 75000, '<p><strong>Lorem ipsum</strong> dolor sit amet, consectetur adipiscing elit. Nunc varius purus ac sodales condimentum. In venenatis a dui id convallis. Pellentesque finibus pulvinar nisi, a tempus lacus dictum a. Praesent iaculis sapien id orci aliquet vehicula. In fringilla turpis enim, in varius tortor suscipit ultricies. Quisque elementum id tortor quis finibus. Praesent viverra tristique ex, sit amet elementum ex porttitor eget. Nunc cursus gravida nunc, volutpat placerat orci molestie ac. Suspendisse purus velit, tincidunt egestas dui ut, iaculis pulvinar lacus. Phasellus placerat, quam sit amet cursus viverra, enim quam sollicitudin mauris, id sagittis enim lectus sit amet sapien. Phasellus interdum dictum leo, eget euismod ligula vehicula nec. Praesent aliquet mollis purus, ac vestibulum justo auctor nec. Phasellus convallis consequat tristique.</p>\r\n\r\n<p>Praesent finibus orci metus. Pellentesque sed ante id neque finibus aliquet id vel velit. Donec ac nulla sed mi sagittis eleifend laoreet vitae dui. Donec fermentum rhoncus erat, a molestie diam venenatis ac. Donec laoreet libero sit amet erat tristique, et finibus nisl eleifend. Aliquam non augue dictum, tempor purus a, ullamcorper leo. Sed velit justo, cursus efficitur luctus sed, rhoncus sed diam. Donec rhoncus varius purus, sed consequat ipsum mollis sed. Nullam orci mauris, luctus et ligula id, lacinia tempor augue. Nulla sagittis elit sit amet sem accumsan faucibus.</p>\r\n', '<p><strong>Lorem ipsum</strong> dolor sit amet, consectetur adipiscing elit. Nunc varius purus ac so', 'sakyre1623773394.png', '1', '2021-06-14 17:00:00'),
(21, 7, 'Persona', 89000, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc varius purus ac sodales condimentum. In venenatis a dui id convallis. Pellentesque finibus pulvinar nisi, a tempus lacus dictum a. Praesent iaculis sapien id orci aliquet vehicula. In fringilla turpis enim, in varius tortor suscipit ultricies. Quisque elementum id tortor quis finibus. Praesent viverra tristique ex, sit amet elementum ex porttitor eget. Nunc cursus gravida nunc, volutpat placerat orci molestie ac. Suspendisse purus velit, tincidunt egestas dui ut, iaculis pulvinar lacus. Phasellus placerat, quam sit amet cursus viverra, enim quam sollicitudin mauris, id sagittis enim lectus sit amet sapien. Phasellus interdum dictum leo, eget euismod ligula vehicula nec. Praesent aliquet mollis purus, ac vestibulum justo auctor nec. Phasellus convallis consequat tristique.</p>\r\n\r\n<p>Praesent finibus orci metus. Pellentesque sed ante id neque finibus aliquet id vel velit. Donec ac nulla sed mi sagittis eleifend laoreet vitae dui. Donec fermentum rhoncus erat, a molestie diam venenatis ac. Donec laoreet libero sit amet erat tristique, et finibus nisl eleifend. Aliquam non augue dictum, tempor purus a, ullamcorper leo. Sed velit justo, cursus efficitur luctus sed, rhoncus sed diam. Donec rhoncus varius purus, sed consequat ipsum mollis sed. Nullam orci mauris, luctus et ligula id, lacinia tempor augue. Nulla sagittis elit sit amet sem accumsan faucibus.</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc varius purus ac sodales condimentum', 'sakyre1623773455.png', '1', '2021-06-14 17:00:00'),
(22, 8, 'Your Heart of the Sea', 98000, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc varius purus ac sodales condimentum. In venenatis a dui id convallis. Pellentesque finibus pulvinar nisi, a tempus lacus dictum a. Praesent iaculis sapien id orci aliquet vehicula. In fringilla turpis enim, in varius tortor suscipit ultricies. Quisque elementum id tortor quis finibus. Praesent viverra tristique ex, sit amet elementum ex porttitor eget. Nunc cursus gravida nunc, volutpat placerat orci molestie ac. Suspendisse purus velit, tincidunt egestas dui ut, iaculis pulvinar lacus. Phasellus placerat, quam sit amet cursus viverra, enim quam sollicitudin mauris, id sagittis enim lectus sit amet sapien. Phasellus interdum dictum leo, eget euismod ligula vehicula nec. Praesent aliquet mollis purus, ac vestibulum justo auctor nec. Phasellus convallis consequat tristique.</p>\r\n\r\n<p>Praesent finibus orci metus. Pellentesque sed ante id neque finibus aliquet id vel velit. Donec ac nulla sed mi sagittis eleifend laoreet vitae dui. Donec fermentum rhoncus erat, a molestie diam venenatis ac. Donec laoreet libero sit amet erat tristique, et finibus nisl eleifend. Aliquam non augue dictum, tempor purus a, ullamcorper leo. Sed velit justo, cursus efficitur luctus sed, rhoncus sed diam. Donec rhoncus varius purus, sed consequat ipsum mollis sed. Nullam orci mauris, luctus et ligula id, lacinia tempor augue. Nulla sagittis elit sit amet sem accumsan faucibus.</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc varius purus ac sodales condimentum', 'sakyre1623773505.jpg', '1', '2021-06-14 17:00:00'),
(24, 1, 'Your Heart of the Sea 2', 80000, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer convallis orci sed nulla vestibulum pharetra. Morbi vitae volutpat purus, id laoreet libero. Proin congue vehicula justo a hendrerit. In vulputate tempor sollicitudin. Quisque sagittis a est nec viverra. Donec sodales ultrices odio sed cursus. Curabitur dictum malesuada mattis.</p>\r\n', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer convallis orci sed nulla vestibu', 'sakyre1623782080.jpg', '1', '2021-06-14 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `db_transaction`
--

CREATE TABLE `db_transaction` (
  `tr_id` int(12) NOT NULL,
  `wishlist_id` int(12) NOT NULL,
  `tr_name` varchar(100) NOT NULL,
  `bank_id` int(12) NOT NULL,
  `ongkir_id` int(11) NOT NULL,
  `tr_address` text NOT NULL,
  `tr_codepos` int(12) NOT NULL,
  `tr_hp` varchar(12) NOT NULL,
  `tr_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_transaction`
--

INSERT INTO `db_transaction` (`tr_id`, `wishlist_id`, `tr_name`, `bank_id`, `ongkir_id`, `tr_address`, `tr_codepos`, `tr_hp`, `tr_date`) VALUES
(9, 23, 'Fiddini', 4, 1, 'SOLO raya sekitaran Kampus UNS', 53116, '0876789098', '2021-06-16 11:19:09');

-- --------------------------------------------------------

--
-- Table structure for table `db_user`
--

CREATE TABLE `db_user` (
  `id` int(12) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `hp` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `role` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_user`
--

INSERT INTO `db_user` (`id`, `username`, `email`, `password`, `nama`, `hp`, `alamat`, `role`) VALUES
(5, 'rjoanditya', 'rjoanditya@student.uns.ac.id', '$2y$10$WDhanfBxdQ/PRotJENJ9QudNSv6aazMjOcBWEZk24KDpP4ClWY412', 'Rizky Joanditya', '088908980989', 'Purwokerto Timur', 'admin'),
(7, 'radisya', 'radisya08@gmail.com', '$2y$10$rHWg9ykyDhhXUXeqgrm0zeFtAaJhD0Tl6WgxEHz5bdv050H1lDp7.', 'Radisya', '081000000000', 'Purwokerto Timur', 'member'),
(10, 'pembeli', 'pembeli@gmail.com', '$2y$10$ZCY.K.S/PlZTnNqdIzcR0.x5R0c9Z/jDwopc6BEFSPSXI3AUDDLPO', 'pembeli', '08908098098', 'Surakarta', 'member'),
(13, 'samuel steven', 'samuelsteven@student.uns.ac.id', '$2y$10$patkXoF5hPDiBVLTxmK.IObeZXZ5DlCziyWMEnvPcjHHaBe6qFpta', 'samuel', '085157538997', 'jalan demak bintoro', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `db_wishlist`
--

CREATE TABLE `db_wishlist` (
  `wishlist_id` int(12) NOT NULL,
  `id` int(12) NOT NULL,
  `product_id` int(12) NOT NULL,
  `category_id` int(12) NOT NULL,
  `wishlist_qty` int(10) NOT NULL,
  `wishlist_status` enum('done','in progres') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_wishlist`
--

INSERT INTO `db_wishlist` (`wishlist_id`, `id`, `product_id`, `category_id`, `wishlist_qty`, `wishlist_status`) VALUES
(20, 5, 24, 1, 1, 'done'),
(23, 5, 20, 1, 1, 'in progres'),
(51, 5, 22, 1, 1, 'in progres'),
(52, 7, 21, 1, 1, 'in progres'),
(53, 13, 24, 1, 1, 'in progres');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_bank`
--
ALTER TABLE `db_bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `db_category`
--
ALTER TABLE `db_category`
  ADD PRIMARY KEY (`category_id`) USING BTREE;

--
-- Indexes for table `db_ongkir`
--
ALTER TABLE `db_ongkir`
  ADD PRIMARY KEY (`ongkir_id`);

--
-- Indexes for table `db_product`
--
ALTER TABLE `db_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `db_product_ibfk_1` (`category_id`);

--
-- Indexes for table `db_transaction`
--
ALTER TABLE `db_transaction`
  ADD PRIMARY KEY (`tr_id`),
  ADD KEY `db_transaction_ibfk_2` (`bank_id`),
  ADD KEY `db_transaction_ibfk_3` (`wishlist_id`),
  ADD KEY `ongkir_id` (`ongkir_id`);

--
-- Indexes for table `db_user`
--
ALTER TABLE `db_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_wishlist`
--
ALTER TABLE `db_wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `db_wishlist_ibfk_1` (`id`),
  ADD KEY `db_wishlist_ibfk_2` (`product_id`),
  ADD KEY `db_wishlist_ibfk_3` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_bank`
--
ALTER TABLE `db_bank`
  MODIFY `bank_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `db_category`
--
ALTER TABLE `db_category`
  MODIFY `category_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `db_ongkir`
--
ALTER TABLE `db_ongkir`
  MODIFY `ongkir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `db_product`
--
ALTER TABLE `db_product`
  MODIFY `product_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `db_transaction`
--
ALTER TABLE `db_transaction`
  MODIFY `tr_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `db_user`
--
ALTER TABLE `db_user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `db_wishlist`
--
ALTER TABLE `db_wishlist`
  MODIFY `wishlist_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `db_product`
--
ALTER TABLE `db_product`
  ADD CONSTRAINT `db_product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `db_category` (`category_id`);

--
-- Constraints for table `db_transaction`
--
ALTER TABLE `db_transaction`
  ADD CONSTRAINT `db_transaction_ibfk_2` FOREIGN KEY (`bank_id`) REFERENCES `db_bank` (`bank_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `db_transaction_ibfk_3` FOREIGN KEY (`wishlist_id`) REFERENCES `db_wishlist` (`wishlist_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `db_transaction_ibfk_4` FOREIGN KEY (`ongkir_id`) REFERENCES `db_ongkir` (`ongkir_id`);

--
-- Constraints for table `db_wishlist`
--
ALTER TABLE `db_wishlist`
  ADD CONSTRAINT `db_wishlist_ibfk_1` FOREIGN KEY (`id`) REFERENCES `db_user` (`id`),
  ADD CONSTRAINT `db_wishlist_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `db_product` (`product_id`),
  ADD CONSTRAINT `db_wishlist_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `db_category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
