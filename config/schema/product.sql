-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Окт 15 2017 г., 19:43
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
(1, 1, 1, 'Yin and yang', '15.93', '<p>In <a href=\"https://en.wikipedia.org/wiki/Chinese_philosophy\">Chinese philosophy</a>, <strong>yin and yang</strong> (lit. &quot;dark-bright&quot;, &quot;negative-positive&quot;) describe how seemingly opposite or contrary forces may actually be complementary, <a href=\"https://en.wikipedia.org/wiki/Interconnected\">interconnected</a>, and interdependent in the natural world, and how they may give rise to each other as they interrelate to one another</p>\r\n', 30, '20 cm on 20 cm', '0.50', 'product/3f8bf3c6.jpg'),
(2, 1, 1, 'Wooden brush', '8.95', 'Just wooden brush', 42, '5 cm on 1 cm', '0.10', 'product/suv4.jpg'),
(3, 1, 1, 'Wooden trinket for keys', '4.00', 'Just trinket ', 99, '2 cm on 2 cm', '0.10', 'product/suv3.jpg'),
(4, 2, 1, 'Little house for babies', '150.00', 'Just house', 15, '2 m on 2 m on 2 m', '15.00', 'product/detdom1.jpg'),
(5, 3, 1, 'Table ', '228.00', 'Parasts galds', 54, '3m on 3m on 1.5m', '15.00', 'product/galds1.jpg'),
(6, 4, 1, 'Chair', '43.95', 'Parasts kresls', 15, '50 cm on 50 cm on 1m', '3.00', 'product/kresli1.jpg'),
(7, 5, 1, 'Easel ', '59.00', '<p>An <strong>easel</strong> is an upright support used for displaying and/or fixing something resting upon it, at an angle of about 20&deg; to the vertical. In particular, easels are traditionally used by <a href=\"https://en.wikipedia.org/wiki/Painters\">painters</a> to support a painting while they work on it, normally standing up, and are also sometimes used to display finished paintings. Artists&#39; easels are still typically made of wood, in functional designs that have changed little for centuries, or even millennia, though new materials and designs are available. Easels are typically made from <a href=\"https://en.wikipedia.org/wiki/Wood\">wood</a>, <a href=\"https://en.wikipedia.org/wiki/Aluminum\">aluminum</a> or <a href=\"https://en.wikipedia.org/wiki/Steel\">steel</a>.</p>\r\n', 12, '50cm on 12', '2.00', 'product/f3ccdd27.jpg'),
(11, 7, 1, 'Sport complex 1', '100.00', 'Sport complex', 34, '50 cm on 3 m', '10.00', 'product/92d7e5c7.jpg'),
(12, 6, 1, 'Shelve 1', '45.00', 'Big shelve ', 33, '3m on 3m on 1.5 m', '30.00', 'product/03099be6.jpg'),
(13, 8, 1, 'Bed 1 ', '75.00', 'Simple big double bed ', 77, '3m on 2m', '47.00', 'product/579cc635.jpg'),
(14, 8, 1, 'Bed 2', '55.00', 'Single bad for kids', 22, '2m on 1m', '15.00', 'product/d31f5710.jpg'),
(15, 3, 1, 'Big table for parties', '99.00', 'Big table for garden and parties', 14, '4m on 1.5m', '35.00', 'product/0b474916.jpg'),
(16, 3, 1, 'Table for kids', '35.00', 'Table for kids', 19, '0.5 m on 1m', '10.00', 'product/34465263.jpg'),
(17, 4, 1, 'Chair 2', '50.00', 'Simple wooden chair', 45, '0.5 on 0.5', '5.00', 'product/026d6aea.jpg'),
(18, 8, 1, 'Bed for kids with shelves in it', '115.00', 'Bed for kids with shelves in it from natural materials', 49, '3m on 1m on 1m', '55.00', 'product/9035861c.jpg'),
(19, 8, 1, 'Bed for little kids', '99.00', 'Bed for little kids with place under it', 45, '3m on 2m on 1.5m', '33.00', 'product/d0ffec8f.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `fk_Product_Category1_idx` (`Category_idCategory`),
  ADD KEY `fk_product_material1_idx` (`Material_idMaterial`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

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
