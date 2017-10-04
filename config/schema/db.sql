-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 04, 2017 at 03:48 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 5.6.31-6+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mebel`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `idCategory` int(11) NOT NULL,
  `Title` varchar(45) NOT NULL,
  `Description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`idCategory`, `Title`, `Description`) VALUES
(1, 'Souvenir', 'Simple souvenirs from natural materials'),
(2, 'House for kid', 'A little houses for babies and kids'),
(3, 'Table', 'Tables from natural materials'),
(4, 'Chair', 'Chairs from natural materials'),
(5, 'Art', 'Tools for art'),
(6, 'Shelves and cupboards', 'Shelves and cupboards from natural materials'),
(7, 'Sports complex', 'Sports complex from natural ingridients'),
(8, 'Bed', 'Bed from natural material');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `idImage` int(11) NOT NULL,
  `Image` varchar(250) NOT NULL,
  `Product_idProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`idImage`, `Image`, `Product_idProduct`) VALUES
(1, 'product/suv2.jpg', 1),
(2, 'product/suv2.jpg', 1),
(3, 'product/suv2.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `idMaterial` int(11) NOT NULL,
  `Title` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`idMaterial`, `Title`) VALUES
(1, 'Wood'),
(3, 'Beton');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `idOrder` int(11) NOT NULL,
  `User_IdUser` int(11) NOT NULL,
  `Status` int(1) NOT NULL,
  `Weight` decimal(10,2) NOT NULL,
  `Order_item_count` int(11) NOT NULL,
  `Shipping` int(11) NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  `Order_Type` int(11) NOT NULL,
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `idOrder_item` int(11) NOT NULL,
  `orders_idOrder` int(11) NOT NULL,
  `idProduct` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `idProduct` int(11) NOT NULL,
  `Category_idCategory` int(11) NOT NULL,
  `Material_idMaterial` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Description` longtext NOT NULL,
  `Interest` int(11) NOT NULL DEFAULT '1',
  `Size` varchar(255) NOT NULL,
  `Weight` decimal(10,2) NOT NULL,
  `MainImage` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`idProduct`, `Category_idCategory`, `Material_idMaterial`, `Name`, `Price`, `Description`, `Interest`, `Size`, `Weight`, `MainImage`) VALUES
(1, 1, 1, 'Yin and yang', '15.93', 'Yin and yang souvenir', 30, '2 cm on 2 cm', '2.00', 'product/suv1.jpg'),
(2, 1, 1, 'Wooden brush', '8.95', 'Just wooden brush', 42, '5 cm on 1 cm', '0.10', 'product/suv4.jpg'),
(3, 1, 1, 'Wooden trinket for keys', '4.00', 'Just trinket ', 99, '2 cm on 2 cm', '0.10', 'product/suv3.jpg'),
(4, 2, 3, 'Little house for babies', '150.00', 'Just house', 15, '2 m on 2 m on 2 m', '15.00', 'product/detdom1.jpg'),
(5, 3, 1, 'Table ', '228.00', 'Parasts galds', 54, '0', '0.00', 'product/galds1.jpg'),
(6, 4, 1, 'Chair', '43.95', 'Parasts kresls', 15, '0', '0.00', 'product/kresli1.jpg'),
(7, 5, 1, 'Molbert', '123.10', '123123123123123', 1, '12 x 12', '0.05', 'product/973240a3.jpg'),
(11, 7, 1, 'Sport complex 1', '100.00', 'Sport complex', 34, '50 cm on 3 m', '10.00', 'product/92d7e5c7.jpg'),
(12, 6, 1, 'Shelve 1', '45.00', 'Big shelve ', 33, '3m on 3m on 1.5 m', '30.00', 'product/03099be6.jpg'),
(13, 8, 1, 'Bed 1 ', '75.00', 'Simple big double bed ', 77, '3m on 2m', '47.00', 'product/579cc635.jpg'),
(14, 8, 1, 'Bed 2', '55.00', 'Single bad for kids', 22, '2m on 1m', '15.00', 'product/d31f5710.jpg'),
(15, 3, 1, 'Big table for parties', '99.00', 'Big table for garden and parties', 14, '4m on 1.5m', '35.00', 'product/0b474916.jpg'),
(16, 3, 1, 'Table for kids', '35.00', 'Table for kids', 19, '0.5 m on 1m', '10.00', 'product/34465263.jpg'),
(17, 4, 1, 'Chair 2', '50.00', 'Simple wooden chair', 45, '0.5 on 0.5', '5.00', 'product/026d6aea.jpg'),
(18, 8, 1, 'Bed for kids with shelves in it', '115.00', 'Bed for kids with shelves in it from natural materials', 49, '3m on 1m on 1m', '55.00', 'product/9035861c.jpg'),
(19, 8, 1, 'Bed for little kids', '99.00', 'Bed for little kids with place under it', 45, '3m on 2m on 1.5m', '33.00', 'product/d0ffec8f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `Login` varchar(45) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Surname` varchar(45) NOT NULL,
  `Phonenumber` int(8) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Adress` varchar(150) NOT NULL,
  `Root` int(1) NOT NULL DEFAULT '0',
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `Login`, `Password`, `Email`, `Name`, `Surname`, `Phonenumber`, `Country`, `City`, `Adress`, `Root`, `Created`) VALUES
(3, 'men300', '$2y$10$Vd2TXNa7TdvKT9GgEdIEVuDtguIa8zYyN/IqgHTlhZ/zIdb1BpepG', 'men300@inbox.lv', 'Aleksejs', 'Muzicenko', 20312131, 'Lithuania', 'Vilnius', 'Zakamuizu iela 90', 1, '2017-10-03 17:27:58'),
(4, 'karlis', '$2y$10$SAxd1GxjlzXycUJjJJN2zuyhMtabX8iZGMjPKHSb3Qfy6LQzLNgEa', 'men300@inbox.lv', 'Karlis', 'Berdzh', 20315612, 'Estonia', 'Talinn', 'klosta pika 21', 0, '2017-10-04 10:10:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`idImage`),
  ADD KEY `fk_Image_Product1_idx` (`Product_idProduct`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`idMaterial`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `User_IdUser` (`User_IdUser`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`idOrder_item`),
  ADD KEY `fk_order_item_orders1_idx` (`orders_idOrder`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `fk_Product_Category1_idx` (`Category_idCategory`),
  ADD KEY `fk_product_material1_idx` (`Material_idMaterial`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `idImage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `idMaterial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `idOrder_item` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_Image_Product1` FOREIGN KEY (`Product_idProduct`) REFERENCES `product` (`idProduct`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`User_IdUser`) REFERENCES `user` (`idUser`);

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `fk_order_item_orders1` FOREIGN KEY (`orders_idOrder`) REFERENCES `orders` (`idOrder`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_Product_Category1` FOREIGN KEY (`Category_idCategory`) REFERENCES `category` (`idCategory`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_material1` FOREIGN KEY (`Material_idMaterial`) REFERENCES `material` (`idMaterial`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
