-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 03 2017 г., 11:51
-- Версия сервера: 5.7.14
-- Версия PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `muzfurn`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `idCart` int(11) NOT NULL,
  `FullPrice` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Product_idProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'Ladites', 'Tas ir ladisu kategorija'),
(2, 'Skapiti', 'Tas ir skapisu kategorija'),
(3, 'Kresli', 'Kresli'),
(5, 'Virtuves skapiti', 'Virtuves skapiti'),
(6, 'aaa', 'aaa');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `idComments` int(11) NOT NULL,
  `Login` varchar(45) NOT NULL,
  `Comment` text NOT NULL,
  `Date` datetime NOT NULL,
  `Moderation` int(1) NOT NULL DEFAULT '0',
  `Product_idProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `idImage` int(11) NOT NULL,
  `Image` varchar(250) NOT NULL,
  `Product_idProduct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `order`
--

CREATE TABLE `order` (
  `idOrder` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Surname` varchar(45) NOT NULL,
  `City` varchar(45) NOT NULL,
  `Adress` varchar(100) NOT NULL,
  `PhoneNumber` int(8) NOT NULL,
  `Cart_idCart` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `idProduct` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Price` int(11) NOT NULL,
  `Description` longtext NOT NULL,
  `MiniDescription` varchar(250) NOT NULL,
  `MainImage` varchar(250) DEFAULT NULL,
  `Category_idCategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`idProduct`, `Name`, `Price`, `Description`, `MiniDescription`, `MainImage`, `Category_idCategory`) VALUES
(1, 'Kresls', 25, 'Sastav no koka.', 'Sastav no koka.', NULL, 3),
(2, 'Virtuves skapīši Pipento', 59, ' Krāsas:\r\n\r\n-augša balta\r\n\r\n-apakša tumši brūna', ' Krāsas:\r\n-augša balta\r\n-apakša tumši brūna', NULL, 5),
(3, 'Aaaa', 1000, 'Aaaa product', 'Aaaa product', NULL, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `Login` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Root` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`idUser`, `Login`, `Password`, `Email`, `Root`) VALUES
(1, '', '4297f44b13955235245b2497399d7a93', '', 0),
(2, 'men300', '4297f44b13955235245b2497399d7a93', '1@al.lv', 1),
(3, 'mennem', '4297f44b13955235245b2497399d7a93', 'men300@inbox.lv', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `userinfo`
--

CREATE TABLE `userinfo` (
  `idUserInfo` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `Surname` varchar(45) NOT NULL,
  `PhoneNumber` int(8) NOT NULL,
  `City` varchar(45) NOT NULL,
  `Adress` varchar(100) NOT NULL,
  `IP` varchar(45) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `userinfo`
--

INSERT INTO `userinfo` (`idUserInfo`, `Name`, `Surname`, `PhoneNumber`, `City`, `Adress`, `IP`, `Date`) VALUES
(2, '1', '1', 1, '1', 'men300', '::1', '2017-06-13 00:07:48');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idCart`),
  ADD KEY `fk_Cart_Product1_idx` (`Product_idProduct`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`idComments`),
  ADD KEY `fk_Comments_Product1_idx` (`Product_idProduct`);

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
  ADD KEY `fk_Order_Cart1_idx` (`Cart_idCart`);

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
-- Индексы таблицы `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`idUserInfo`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `idCart` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `idComments` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `idImage` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `order`
--
ALTER TABLE `order`
  MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `idUserInfo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_Cart_Product1` FOREIGN KEY (`Product_idProduct`) REFERENCES `product` (`idProduct`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_Comments_Product1` FOREIGN KEY (`Product_idProduct`) REFERENCES `product` (`idProduct`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_Image_Product1` FOREIGN KEY (`Product_idProduct`) REFERENCES `product` (`idProduct`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_Order_Cart1` FOREIGN KEY (`Cart_idCart`) REFERENCES `cart` (`idCart`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_Product_Category1` FOREIGN KEY (`Category_idCategory`) REFERENCES `category` (`idCategory`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `userinfo`
--
ALTER TABLE `userinfo`
  ADD CONSTRAINT `idUserInfo` FOREIGN KEY (`idUserInfo`) REFERENCES `user` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
