-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 25 2017 г., 21:30
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
(2, 'Bernu majini', 'Majins prieks berniem'),
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
(1, 'suv2.jpg', 1),
(2, 'suv2.jpg', 1),
(3, 'suv2.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `idOrder` int(11) NOT NULL,
  `Status` int(1) NOT NULL,
  `Cart_idCart` int(11) NOT NULL,
  `User_IdUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `idProduct` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Description` longtext NOT NULL,
  `Interest` int(11) NOT NULL DEFAULT '1',
  `Material` varchar(255) NOT NULL,
  `Size` int(255) NOT NULL,
  `MainImage` varchar(250) DEFAULT NULL,
  `Category_idCategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`idProduct`, `Name`, `Price`, `Description`, `Interest`, `Material`, `Size`, `MainImage`, `Category_idCategory`) VALUES
(1, 'In jan', '15.93', 'Injan suvenirs. Koks', 30, '', 0, 'suv1.jpg', 1),
(2, 'Rascheska', '19.50', 'Just rascheska', 42, '', 0, 'suv4.jpg', 1),
(3, 'Brelok', '5.33', 'Just brelok', 99, '', 0, 'suv3.jpg', 1),
(4, 'Majins mazuliem', '150.00', 'Just home', 1, '', 0, 'detdom1.jpg', 2),
(5, 'Galds ', '228.00', 'Parasts galds', 54, '', 0, 'galds1.jpg', 3),
(6, 'Kresli 1', '43.95', 'Parasts kresls', 15, '', 0, 'kresli1.jpg', 4);

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
  `City` varchar(50) NOT NULL,
  `Adress` varchar(150) NOT NULL,
  `Root` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`idUser`, `Login`, `Password`, `Email`, `Name`, `Surname`, `Phonenumber`, `City`, `Adress`, `Root`) VALUES
(1, 'men', '$2y$10$Nj9QLkbYcjPpYZyj0Xw9k.eKv67rN9c8jkvue.LDbMV1HOO5bJiKO', 'men300@inbox.lv', 'men', 'men', 1231231, '', '', 1),
(2, 'men300', '$2y$10$g2njqD3Qfsm/AQDujOgdHei2O7ohjqsPYTGSznsQzXDwLjA2vZ20S', 'men300@inbox.lv', 'Alexey', 'Muzicenko', 20361226, '', '', 1),
(3, 'mennem', '$2y$10$l.awuQzqRLIENGcqbQ4U.uZqd5ghR.LvGWar9089HM9IEQzQ5q1R2', 'men300@inbox.lv', 'alex', 'boris', 20361226, '1231', '23123123', 0),
(4, 'mennem1', '$2y$10$GcgeZzeqEOhrZq5Y0o/vzuYc2H6A5NCCW8dH1r5V8ytGmZCo316QS', 'men300@inbox.lv', 'alex', 'boris', 20361226, '', '', 0),
(5, 'mennem12', '$2y$10$LEJ8wygjEIx5BD5cOWNty.pS331g/Ie/Mz6ClwDLzbnVbEGPdeO0K', 'men300@inbox.lv', 'alex', 'boris', 20361226, '', '', 0);

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
-- Индексы таблицы `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `fk_Order_Cart1_idx` (`Cart_idCart`),
  ADD KEY `User_IdUser` (`User_IdUser`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `fk_Product_Category1_idx` (`Category_idCategory`);

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
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_Image_Product1` FOREIGN KEY (`Product_idProduct`) REFERENCES `product` (`idProduct`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_Order_Cart1` FOREIGN KEY (`Cart_idCart`) REFERENCES `cart` (`idCart`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`User_IdUser`) REFERENCES `user` (`idUser`);

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_Product_Category1` FOREIGN KEY (`Category_idCategory`) REFERENCES `category` (`idCategory`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
