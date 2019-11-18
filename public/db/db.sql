-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 18 2019 г., 17:07
-- Версия сервера: 5.6.41
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u435826_tortik`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id_cat` int(11) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id_cat`, `category`) VALUES
(6, 'торты'),
(11, 'пирожны');

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `id` int(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `header` varchar(100) NOT NULL,
  `hometext` text NOT NULL,
  `work` varchar(100) NOT NULL,
  `about` text NOT NULL,
  `delivery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`id`, `phone`, `email`, `address`, `header`, `hometext`, `work`, `about`, `delivery`) VALUES
(1, '+7(965)539-12-98', 'gorkundp@yandex.ru', 'c.Натальино, ул. Революционная, д.12', 'Тортик-надо.рф', '<p>Домашняя <strong>страница</strong>', 'Работаем каждый день с 9.00 до 22.00', '<p>О нас <strong>страница</strong>', '<p>Доставка <strong>страница</strong>');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `category_id` int(100) NOT NULL,
  `description` text NOT NULL,
  `price` int(10) NOT NULL,
  `units_id` varchar(20) NOT NULL,
  `path_big` varchar(150) NOT NULL,
  `path_small` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `category_id`, `description`, `price`, `units_id`, `path_big`, `path_small`) VALUES
(3, 'Панчо', 1, '87п', 500, 'шт.', '/db/images/big/8f9507d2dd_ejik.jpg', '/db/images/small/8f9507d2dd_ejik.jpg'),
(7, 'Ежик', 7, 'ugv7', 450, 'кг.', '/db/images/big/8f9507d2dd_ejik.jpg', '/db/images/small/8f9507d2dd_ejik.jpg'),
(8, 'Ежик', 7, 'jygfd', 540, '2', '/db/images/big/8f9507d2dd_ejik.jpg', '/db/images/small/8f9507d2dd_ejik.jpg'),
(9, 'Ежик', 6, 'ош', 85, '1', '/db/images/big/8f9507d2dd_ejik.jpg', '/db/images/small/8f9507d2dd_ejik.jpg'),
(10, 'Первый торт', 11, 'рпмпмпмпмммгщгщгщмщщриришщишщи рши шри шри', 700, '4', '/db/images/big/bd4b03cde2_medovik.jpg', '/db/images/small/bd4b03cde2_medovik.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `units`
--

CREATE TABLE `units` (
  `id_units` int(100) NOT NULL,
  `units` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `units`
--

INSERT INTO `units` (`id_units`, `units`) VALUES
(1, 'шт.'),
(3, 'кг.'),
(4, 'уп.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cat`);

--
-- Индексы таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id_units`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `units`
--
ALTER TABLE `units`
  MODIFY `id_units` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
