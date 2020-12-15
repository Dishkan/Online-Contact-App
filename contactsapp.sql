-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 15 2020 г., 09:22
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `contactsapp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `number` bigint NOT NULL,
  `second_number` bigint DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `second_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `number`, `second_number`, `email`, `second_email`, `created_at`, `updated_at`) VALUES
(1, 'Elon Musk', 998915556565, 998915556560, 'elonmusk@gmail.com', 'elonmusk2@gmail.com', '2020-12-10 11:31:49', '2020-12-15 00:26:16'),
(39, 'Mark Zuckerberg', 998917455555, 998917455554, 'mark@gmail.com', 'mark2@gmail.com', '2020-12-13 06:42:33', '2020-12-15 01:05:08'),
(40, 'Bill Gates', 998996552523, 998996552522, 'billgates@gmail.com', 'billgates2@gmail.com', '2020-12-13 06:43:58', '2020-12-14 11:40:12'),
(41, 'Pavel Durov', 998914665352, 998914665351, 'durov@gmail.com', 'durov2@gmail.com', '2020-12-13 06:44:51', '2020-12-15 00:42:25'),
(42, 'Dilshod Khudoyarov', 998998889192, NULL, 'blablabla@gmail.com', NULL, '2020-12-13 06:51:17', '2020-12-15 01:19:44');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `number` (`number`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `second_number` (`second_number`),
  ADD UNIQUE KEY `second_email` (`second_email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
