-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 13 2018 г., 14:54
-- Версия сервера: 10.1.30-MariaDB
-- Версия PHP: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testtask`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `productName` text NOT NULL,
  `price` int(11) NOT NULL DEFAULT '10000',
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`productId`, `productName`, `price`, `description`) VALUES
(1, 'Школьная форма', 10000, 'Описание формы....'),
(2, 'Товар 2', 10000, 'Его описание...'),
(3, 'Товар 3', 8888, 'Еще одно описание...');

-- --------------------------------------------------------

--
-- Структура таблицы `sales`
--

CREATE TABLE `sales` (
  `saleId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `salePrice` int(11) NOT NULL,
  `startSale` date NOT NULL,
  `endSale` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sales`
--

INSERT INTO `sales` (`saleId`, `productId`, `salePrice`, `startSale`, `endSale`) VALUES
(1, 1, 12000, '2016-05-01', '2017-01-01'),
(2, 1, 15000, '2016-07-01', '2016-09-10'),
(3, 1, 20000, '2017-06-01', '2017-10-20'),
(4, 1, 5000, '2017-12-15', '2017-12-31');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD KEY `productId` (`productId`);

--
-- Индексы таблицы `sales`
--
ALTER TABLE `sales`
  ADD KEY `saleId` (`saleId`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `sales`
--
ALTER TABLE `sales`
  MODIFY `saleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
