-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 19 2019 г., 10:59
-- Версия сервера: 5.5.64-MariaDB
-- Версия PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE IF NOT EXISTS `categories` (
  `id_cat` int(11) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id_cat`, `category`) VALUES
(1, 'Торты'),
(2, 'Пирожные'),
(3, 'Закусочные тортики'),
(4, 'Кремовые тортики'),
(5, 'Букет');

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ok` varchar(100) NOT NULL,
  `vk` varchar(100) NOT NULL,
  `inst` varchar(100) NOT NULL,
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

INSERT INTO `contacts` (`id`, `phone`, `email`, `ok`, `vk`, `inst`, `address`, `header`, `hometext`, `work`, `about`, `delivery`) VALUES
(1, '+7(965)539-12-98', 'gorkundp@yandex.ru', 'https://ok.ru', 'https://vk.com', 'https://www.instagram.com', 'c.Натальино, ул. Революционная, д.13', 'Тортик-надо.рф', '<p>Домашняя <strong>страница</strong>', 'Работаем каждый день с 9.00 до 22.00', '<p>О нас <strong>страница</strong>', '<p>Доставка <strong>страница</strong>');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `category_id` int(100) NOT NULL,
  `description` text NOT NULL,
  `price` int(10) NOT NULL,
  `units_id` varchar(20) NOT NULL,
  `path_big` varchar(150) NOT NULL,
  `path_small` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `category_id`, `description`, `price`, `units_id`, `path_big`, `path_small`) VALUES
(1, 'Ежик', 1, 'Вкуснейший тортик, пальчики оближешь', 390, '3', '/db/images/big/8f9507d2dd_ejik.jpg', '/db/images/small/8f9507d2dd_ejik.jpg'),
(2, 'Книга жизни', 4, 'Нежный бисквит с необычной начинкой и кремовым украшением', 350, '3', '/db/images/big/41796672c4_i.jpg', '/db/images/small/41796672c4_i.jpg'),
(3, 'Тортик для охотника', 3, 'Прекрасный подарок для мужчин', 280, '3', '/db/images/big/9ab7b03b83_2.jpg', '/db/images/small/9ab7b03b83_2.jpg'),
(4, 'Букет', 5, 'Необычный подарок для любимого', 500, '1', '/db/images/big/3345e41fba_i_(1).jpg', '/db/images/small/3345e41fba_i_(1).jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `units`
--

CREATE TABLE IF NOT EXISTS `units` (
  `id_units` int(100) NOT NULL,
  `units` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `units`
--

INSERT INTO `units` (`id_units`, `units`) VALUES
(1, 'шт.'),
(3, 'кг'),
(4, 'уп.');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `role` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `role`, `name`) VALUES
(1, 'admin', '6bda543f66da02541990bd12081dc79f', 'admin', 'Администратор');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cat`);

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
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `units`
--
ALTER TABLE `units`
  MODIFY `id_units` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
