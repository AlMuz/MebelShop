-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 03 2017 г., 23:04
-- Версия сервера: 10.1.26-MariaDB
-- Версия PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mebel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `idCategory` int(11) NOT NULL,
  `Title` varchar(45) NOT NULL,
  `Description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`idCategory`, `Title`, `Description`) VALUES
(1, 'Suveniri', 'Parasti suveniri no koka'),
(2, 'Bernu majini', 'Majins prieks berniem1'),
(3, 'Galdi', 'Parasti galdi'),
(4, 'Kresli', 'Parasti kresli');

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `idImage` int(11) NOT NULL,
  `Image` varchar(250) NOT NULL,
  `Product_idProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`idImage`, `Image`, `Product_idProduct`) VALUES
(1, 'product/suv2.jpg', 1),
(2, 'product/suv2.jpg', 1),
(3, 'product/suv2.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `material`
--

CREATE TABLE `material` (
  `idMaterial` int(11) NOT NULL,
  `Title` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `material`
--

INSERT INTO `material` (`idMaterial`, `Title`) VALUES
(1, 'Wood'),
(3, 'Beton');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
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
  `Created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `order_item`
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
-- Структура таблицы `product`
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
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`idProduct`, `Category_idCategory`, `Material_idMaterial`, `Name`, `Price`, `Description`, `Interest`, `Size`, `Weight`, `MainImage`) VALUES
(1, 1, 1, 'Yin and yang', '15.93', 'Yin and yang souvenir', 30, '2 cm on 2 cm', '2.00', 'product/suv1.jpg'),
(2, 1, 1, 'Wooden brush', '8.95', 'Just wooden brush', 42, '5 cm on 1 cm', '0.10', 'product/suv4.jpg'),
(3, 1, 1, 'Wooden trinket for keys', '4.00', 'Just trinket ', 99, '2 cm on 2 cm', '0.10', 'product/suv3.jpg'),
(4, 2, 1, 'Little house for babies', '150.00', 'Just house', 15, '2 m on 2 m on 2 m', '15.00', 'product/detdom1.jpg'),
(5, 3, 1, 'Table ', '228.00', 'Parasts galds', 54, '0', '0.00', 'product/galds1.jpg'),
(6, 4, 1, 'Chair', '43.95', 'Parasts kresls', 15, '0', '0.00', 'product/kresli1.jpg'),
(7, 3, 1, 'Molbert', '123.10', '123123123123123', 1, '12 x 12', '0.05', 'product/973240a3.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
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
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`idUser`, `Login`, `Password`, `Email`, `Name`, `Surname`, `Phonenumber`, `Country`, `City`, `Adress`, `Root`, `Created`) VALUES
(3, 'men300', '$2y$10$Vd2TXNa7TdvKT9GgEdIEVuDtguIa8zYyN/IqgHTlhZ/zIdb1BpepG', 'men300@inbox.lv', 'Aleksejs', 'Muzicenko', 20312131, 'Estonia', 'Estonia', '123123safa', 1, '2017-10-03 17:27:58');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`idImage`),
  ADD KEY `fk_Image_Product1_idx` (`Product_idProduct`);

--
-- Индексы таблицы `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`idMaterial`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `User_IdUser` (`User_IdUser`);

--
-- Индексы таблицы `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`idOrder_item`),
  ADD KEY `fk_order_item_orders1_idx` (`orders_idOrder`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `fk_Product_Category1_idx` (`Category_idCategory`),
  ADD KEY `fk_product_material1_idx` (`Material_idMaterial`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `idImage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `material`
--
ALTER TABLE `material`
  MODIFY `idMaterial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `order_item`
--
ALTER TABLE `order_item`
  MODIFY `idOrder_item` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_Image_Product1` FOREIGN KEY (`Product_idProduct`) REFERENCES `product` (`idProduct`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`User_IdUser`) REFERENCES `user` (`idUser`);

--
-- Ограничения внешнего ключа таблицы `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `fk_order_item_orders1` FOREIGN KEY (`orders_idOrder`) REFERENCES `orders` (`idOrder`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_Product_Category1` FOREIGN KEY (`Category_idCategory`) REFERENCES `category` (`idCategory`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_material1` FOREIGN KEY (`Material_idMaterial`) REFERENCES `material` (`idMaterial`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
