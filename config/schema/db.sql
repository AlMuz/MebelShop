-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 16, 2017 at 11:08 AM
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
(1, 'product/8d72ad18.jpg', 1),
(2, 'product/1bc8c7bd.jpg', 1),
(4, 'product/156005c5.jpg', 7),
(5, 'product/799bad5a.jpg', 7),
(6, 'product/d0096ec6.jpg', 7),
(7, 'product/5ec582a3.jpg', 4),
(8, 'product/9ef4f777.jpg', 4),
(9, 'product/93e0fa03.jpg', 18),
(10, 'product/40531423.jpg', 5),
(11, 'product/433944e4.jpg', 19),
(12, 'product/7b3689c7.jpg', 19);

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
(3, 'Colored glass');

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
  `Order_Type` varchar(40) NOT NULL,
  `Created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`idOrder`, `User_IdUser`, `Status`, `Weight`, `Order_item_count`, `Shipping`, `Total`, `Order_Type`, `Created`) VALUES
(1, 3, 0, '0.00', 1, 1, '43.95', 'Creditcard', '2017-10-10 09:31:06'),
(2, 3, 0, '229.20', 3, 1, '942.00', 'Creditcard', '2017-10-10 11:01:41'),
(3, 4, 2, '34.20', 2, 1, '147.00', 'Creditcard', '2017-10-12 08:25:16'),
(4, 3, 0, '47.00', 1, 1, '75.00', 'Creditcard', '2017-10-12 08:47:42'),
(5, 3, 0, '47.00', 1, 1, '75.00', 'Creditcard', '2017-10-12 08:48:04'),
(6, 3, 0, '0.00', 1, 1, '228.00', 'Creditcard', '2017-10-12 08:49:37'),
(7, 3, 0, '0.10', 2, 1, '232.00', 'Creditcard', '2017-10-12 08:51:39'),
(8, 3, 0, '55.00', 1, 1, '115.00', 'Creditcard', '2017-10-12 08:51:58'),
(9, 3, 0, '10.00', 1, 1, '100.00', 'Creditcard', '2017-10-12 08:52:21'),
(10, 3, 1, '660.00', 1, 1, '1380.00', 'Creditcard', '2017-10-12 08:52:42'),
(11, 3, 0, '0.10', 1, 1, '4.00', 'Creditcard', '2017-10-12 08:53:05'),
(12, 3, 0, '55.00', 1, 1, '115.00', 'Creditcard', '2017-10-12 08:53:26'),
(13, 3, 0, '33.00', 1, 1, '99.00', 'Creditcard', '2017-10-12 08:53:49'),
(14, 3, 0, '0.10', 1, 1, '4.00', 'Creditcard', '2017-10-12 08:54:08'),
(15, 3, 0, '33.00', 1, 1, '99.00', 'Creditcard', '2017-10-12 08:54:31'),
(16, 3, 0, '0.10', 1, 1, '4.00', 'Creditcard', '2017-10-12 08:55:04'),
(17, 3, 0, '33.10', 2, 1, '103.00', 'Creditcard', '2017-10-13 07:16:33'),
(18, 3, 0, '600.50', 3, 1, '1992.09', 'Creditcard', '2017-10-16 04:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `idOrder_item` int(11) NOT NULL,
  `orders_idOrder` int(11) NOT NULL,
  `Product_idProduct` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`idOrder_item`, `orders_idOrder`, `Product_idProduct`, `quantity`, `price`, `sub_total`) VALUES
(1, 1, 6, 1, '43.95', '43.95'),
(2, 2, 3, 12, '4.00', '48.00'),
(3, 2, 17, 6, '50.00', '300.00'),
(4, 2, 19, 6, '99.00', '594.00'),
(5, 3, 3, 12, '4.00', '48.00'),
(6, 3, 19, 1, '99.00', '99.00'),
(7, 4, 13, 1, '75.00', '75.00'),
(8, 5, 13, 1, '75.00', '75.00'),
(9, 6, 5, 1, '228.00', '228.00'),
(10, 7, 3, 1, '4.00', '4.00'),
(11, 7, 5, 1, '228.00', '228.00'),
(12, 8, 18, 1, '115.00', '115.00'),
(13, 9, 11, 1, '100.00', '100.00'),
(14, 10, 18, 12, '115.00', '1380.00'),
(15, 11, 3, 1, '4.00', '4.00'),
(16, 12, 18, 1, '115.00', '115.00'),
(17, 13, 19, 1, '99.00', '99.00'),
(18, 14, 3, 1, '4.00', '4.00'),
(19, 15, 19, 1, '99.00', '99.00'),
(20, 16, 3, 1, '4.00', '4.00'),
(21, 17, 3, 1, '4.00', '4.00'),
(22, 17, 19, 1, '99.00', '99.00'),
(23, 18, 13, 12, '75.00', '900.00'),
(24, 18, 1, 13, '15.93', '207.09'),
(25, 18, 7, 15, '59.00', '885.00');

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
(1, 1, 1, 'Yin and yang', '15.93', '<p>In <a href="https://en.wikipedia.org/wiki/Chinese_philosophy">Chinese philosophy</a>, <strong>yin and yang</strong> (lit. &quot;dark-bright&quot;, &quot;negative-positive&quot;) describe how seemingly opposite or contrary forces may actually be complementary, <a href="https://en.wikipedia.org/wiki/Interconnected">interconnected</a>, and interdependent in the natural world, and how they may give rise to each other as they interrelate to one another</p>\r\n', 30, '20 cm on 20 cm', '0.50', 'product/3f8bf3c6.jpg'),
(2, 1, 1, 'Wooden brush', '8.95', 'Just wooden brush', 42, '5 cm on 1 cm', '0.10', 'product/suv4.jpg'),
(3, 1, 1, 'Wooden trinket for keys', '4.00', 'Just trinket ', 99, '2 cm on 2 cm', '0.10', 'product/suv3.jpg'),
(4, 2, 1, 'Little house for babies', '150.00', 'Just house', 15, '2 m on 2 m on 2 m', '15.00', 'product/detdom1.jpg'),
(5, 3, 1, 'Table ', '228.00', 'Parasts galds', 54, '3m on 3m on 1.5m', '15.00', 'product/galds1.jpg'),
(6, 4, 1, 'Chair', '43.95', 'Parasts kresls', 15, '50 cm on 50 cm on 1m', '3.00', 'product/kresli1.jpg'),
(7, 5, 1, 'Easel ', '59.00', '<p>An <strong>easel</strong> is an upright support used for displaying and/or fixing something resting upon it, at an angle of about 20&deg; to the vertical. In particular, easels are traditionally used by <a href="https://en.wikipedia.org/wiki/Painters">painters</a> to support a painting while they work on it, normally standing up, and are also sometimes used to display finished paintings. Artists&#39; easels are still typically made of wood, in functional designs that have changed little for centuries, or even millennia, though new materials and designs are available. Easels are typically made from <a href="https://en.wikipedia.org/wiki/Wood">wood</a>, <a href="https://en.wikipedia.org/wiki/Aluminum">aluminum</a> or <a href="https://en.wikipedia.org/wiki/Steel">steel</a>.</p>\r\n', 12, '50cm on 12', '2.00', 'product/f3ccdd27.jpg'),
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
(3, 'men300', '$2y$10$Vd2TXNa7TdvKT9GgEdIEVuDtguIa8zYyN/IqgHTlhZ/zIdb1BpepG', 'men300@inbox.lv', 'Aleksejs', 'Muzicenko', 20312131, 'Lithuania', 'Vilnius', 'Zakamuizu iela 90', 1, '2017-10-03 14:27:58'),
(4, 'karlis', '$2y$10$SAxd1GxjlzXycUJjJJN2zuyhMtabX8iZGMjPKHSb3Qfy6LQzLNgEa', 'men300@inbox.lv', 'Karlis', 'Berdzh', 20315612, 'Estonia', 'Talinn', 'klosta pika 21', 0, '2017-10-04 07:10:59'),
(5, 'test12', '$2y$10$zzRFyznxQb1ej0pYCqj81.icsR4IA5.6jl5iX00mBRvGvNZFKBzhm', 'test@test.lv', 'test', 'test', 21312312, 'Estonia', 'Talinn', 'Karmanu 12', 0, '2017-10-05 05:25:01'),
(6, 'gunhawk95', '$2y$10$hKDk55L4fM6Ya9LTdF4vi.SC.q7wtpz61WoVfo3HUIOHUaTa.sAU2', 'noahcore95@gmail.com', 'Ruslans', 'Nazarovs', 29837434, 'Latvia', 'Jurmala', 'Nometnju Iela 22, 17', 0, '2017-10-05 12:47:54'),
(7, 'Vana01', '$2y$10$Kdz78Xk5XqSoIx4zG5FRUOIdVLlGA3IJ/LE3lSG6liFjcycvWHSOa', 'vana02@inbox.lv', 'Ivan', 'Muzicenko', 22813371, 'Latvia', 'Riga', 'Brivibas', 0, '2017-10-05 13:02:36'),
(8, 'Testexample', '$2y$10$St08eZCC2tDaZzE2f/jp0uFRYay1vYFmzgzG6bwi/dv3iOcb3FLV2', 'Testexample@testexample.lv', 'Testexample', 'Testexample', 20312121, 'Latvia', 'Riga', 'Brivibas', 1, '2017-10-08 09:21:04'),
(9, 'albert', '$2y$10$YuTAqenla4aoV11WdxS8g.rkht2idtFXSGcwwNH7qbIBx9UzFGTky', 'almuz@inbox.lv', 'Albert', 'Ochkurin', 20312312, 'Lithuania', 'Vilnius', '123123', 0, '2017-10-16 04:34:54');

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
  MODIFY `idImage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `idMaterial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `idOrder_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
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
