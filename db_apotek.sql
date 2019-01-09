-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 08, 2019 at 03:19 AM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(6) UNSIGNED ZEROFILL NOT NULL,
  `id_transaction` int(10) UNSIGNED DEFAULT NULL,
  `transaction_date` datetime(3) DEFAULT NULL,
  `total_stock_price` int(10) DEFAULT NULL,
  `total_product_price` int(10) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `pay` int(10) DEFAULT NULL,
  `cash` int(10) DEFAULT NULL,
  `profit` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` int(5) UNSIGNED ZEROFILL NOT NULL,
  `product_name` varchar(45) DEFAULT NULL,
  `product_category` varchar(45) DEFAULT NULL,
  `product_description` varchar(45) DEFAULT NULL,
  `product_stock` int(11) DEFAULT NULL COMMENT 'auto increment by stock\n',
  `stock_price` int(10) DEFAULT NULL,
  `product_price` int(10) DEFAULT NULL,
  `created` timestamp(3) NULL DEFAULT CURRENT_TIMESTAMP(3),
  `update` datetime(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `product_name`, `product_category`, `product_description`, `product_stock`, `stock_price`, `product_price`, `created`, `update`) VALUES
(10001, 'Tolak Angin', 'Obat', 'Obat masuk angin', 10, 2000, 3000, '0000-00-00 00:00:00.000', '0000-00-00 00:00:00.000'),
(10002, 'Betadin', 'Obat luar', 'Obat luka berdarah', 5, 7000, 10000, '0000-00-00 00:00:00.000', '0000-00-00 00:00:00.000');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id_stock` int(4) UNSIGNED ZEROFILL NOT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL COMMENT 'fk from user',
  `id_supplier` int(10) UNSIGNED DEFAULT NULL COMMENT 'fk from supplier',
  `id_product` int(10) UNSIGNED DEFAULT NULL COMMENT 'fk from product\n',
  `stock_date` timestamp(3) NULL DEFAULT NULL,
  `stock_qty` int(11) DEFAULT NULL,
  `stock_price` int(10) DEFAULT NULL COMMENT 'price buy from supplier\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(3) UNSIGNED ZEROFILL NOT NULL,
  `supplier_name` varchar(45) DEFAULT NULL,
  `supplier_email` varchar(45) DEFAULT NULL,
  `supplier_phone` varchar(45) DEFAULT NULL,
  `supplier_address` varchar(200) DEFAULT NULL,
  `created` timestamp(3) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id_transaction` int(6) UNSIGNED ZEROFILL NOT NULL,
  `transaction_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `transaction_type` varchar(15) DEFAULT 'umum',
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `transaction_customer` varchar(15) DEFAULT 'umum',
  `id_product` int(10) UNSIGNED DEFAULT NULL,
  `stock_price` int(11) DEFAULT NULL,
  `product_price` int(10) DEFAULT NULL,
  `transaction_qty` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id_transaction`, `transaction_date`, `transaction_type`, `id_user`, `transaction_customer`, `id_product`, `stock_price`, `product_price`, `transaction_qty`) VALUES
(090001, '2019-01-07 04:21:05', 'umum', 4, 'umum', 10002, 25000, 30000, 2),
(090002, '2019-01-07 04:23:09', 'umum', 5, 'umum', 10001, 29000, 39000, 2),
(090003, '2019-01-10 17:00:00', 'umum', 6, 'umum', 10002, 39000, 49000, 4),
(090007, '2019-01-06 17:00:00', 'umum', 5, 'umum', 10001, 20000, 30000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `is_confirmed` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `level` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `avatar`, `created_at`, `updated_at`, `is_admin`, `is_confirmed`, `is_deleted`, `full_name`, `phone`, `address`, `level`) VALUES
(004, 'ahmadbagwi', 'ahmadbagwi.id@gmail.com', '$2y$10$3VnPa9q7bIL9LFRtgXje8OYskLv18LXg0FeBRqTyZG0UCwRDf/kNK', '', '2019-01-01 12:00:28', NULL, 0, 0, 0, NULL, NULL, NULL, NULL),
(005, 'nismara', 'nismara@gmail.com', '$2y$10$cf3pFRAAldjlgjua/PML.OnmYb8YusHCNNB3k2.LannH4xSq3O7Aq', '', '2019-01-01 13:03:27', NULL, 0, 0, 0, NULL, NULL, NULL, NULL),
(006, 'Rifai', 'rifai@gmail.com', '$2y$10$zeHUR/GLO.GWtVlKIVe0GOYVPYfRWk27UkJo0RkYsDF5NicGLplCS', '', '2019-01-01 13:29:17', NULL, 0, 0, 0, 'Rifai Ahmad', '0987', 'Cibanteng', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `timestamp` (`timestamp`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `fk_payment_id_transaction_idx` (`id_transaction`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`),
  ADD KEY `fk_stock_id_user_idx` (`id_user`),
  ADD KEY `fk_stock_id_supplier_idx` (`id_supplier`),
  ADD KEY `fk_stock_id_product_idx` (`id_product`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `fk_transaction_id_user_idx` (`id_user`),
  ADD KEY `fk_transaction_id_product_idx` (`id_product`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10003;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90008;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_payment_id_transaction` FOREIGN KEY (`id_transaction`) REFERENCES `transaction` (`id_transaction`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fk_stock_id_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stock_id_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stock_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `fk_transaction_id_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transaction_id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
