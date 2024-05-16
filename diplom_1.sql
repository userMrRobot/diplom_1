-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 16 2024 г., 16:48
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `diplom_1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `reg_user`
--

CREATE TABLE `reg_user` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `reg_user`
--

INSERT INTO `reg_user` (`id`, `email`, `password`, `user_role`) VALUES
(2, 'valera1@ya.ru', '$2y$10$tPutJoD46pELA6ZOfPULgeo3yjdk233KEQR6/kyACXeE62FoifIfO', 'admin'),
(3, '1111@mail.com', '$2y$10$DGKE0w0K38U40LI1YCO1k.JPJF2.Hhcxj9zVljulsQ3V9FRahplWm', 'admin'),
(5, 'asdasd@dsad.ru', '$2y$10$7PM0v/6G3Xi8pILWnyrgHeFr9DVM84yy3VtbImoiqws9ILYphe1x2', 'user'),
(7, 'eee@mail.ru', '$2y$10$nxGSVKNjM5ZfO1ElfxCjH.9ZOXIorXNaF3PoufTwq0H7ai38dZIHq', 'user'),
(8, 'mihail@mail.ru', '$2y$10$jdqrdkl6cDe3aswDMjlSc.bBl2YSb3vXIePrGaKlnQQsGvsY2m4Pa', 'user'),
(10, 'dsfdsf@sd.ru', '$2y$10$IUzHurCNFIEsTj6wtiJRzOIBjjePCltIN23hGgfs8i42HFT3E3nzG', 'user'),
(16, 'rustem111@ya.ru', '$2y$10$7EAhWKvtpXr358AvLSkjZelDt3iMtJVqm4BLAgH2rJ9m5T/oER0Z6', 'user'),
(18, 'messi1@ya.ru', '$2y$10$m0FqauQ0g/o5ec0QnOlvhOvxUQCWU5Jp0mmKJKGaDxK2jNzjcoZRO', 'user'),
(20, 'kristiano1@ya.ru', '$2y$10$ggm5yxUnklo2dij2HAhbPubIuQxKDaN9D01nFApKlgMhMlV38XQYq', 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `user_role`) VALUES
(1, 'boobs@mail.ru', '$2y$10$wPuwP6DDeLOsn7wtObQ8rOCuFasnxTz6GzvWIXrRwlidCEu3k74im', 'user'),
(3, 'edem@mail.cu', '$2y$10$JVcxy/pZz9lKTXOmiG6i.eaCiVqP/QVZKK9dfxgoACwbvYhrlfv8a', 'user'),
(4, 'boobs1@mail.ru', '$2y$10$pLaDnSXieuoYr5IYRwu.7uMFUhSDKZJjDw4El.r9/Uvvm29vS6cZC', 'admin'),
(5, 'boobs14333@mail.ru', '$2y$10$qHEM7U773W8INLz.ilRgBOqcq0UxOz0j2mv9tMAGEvUvmMIirsdaa', 'user');

-- --------------------------------------------------------

--
-- Структура таблицы `users_1`
--

CREATE TABLE `users_1` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'noname',
  `job_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'zavod',
  `status` varchar(255) NOT NULL DEFAULT 'online',
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'img/demo/avatars/avatar-g.png',
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '11111111',
  `address` varchar(255) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `vk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `inst` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users_1`
--

INSERT INTO `users_1` (`id`, `username`, `job_title`, `status`, `image`, `phone`, `address`, `email`, `vk`, `tg`, `inst`) VALUES
(2, 'Валерий Меладзе', 'компания майкорсофт', 'busy', 'img/demo/avatars/6645e616c50bc.png', '+7 987 514 8658', 'ул просмушкиных 115/4', 'Alita@smartadminwebapp.com', 'dfgfdgfd', 'gdfgdfg', 'dfgfdg'),
(3, 'Мистериус кук', 'Human Resources, Gotbootstrap Inc.', 'ofline', 'img/demo/avatars/6645e58e53d74.png', '+1 313-779-1347', '55 Smyth Rd, Detroit, MI, 48341, USA', 'john.cook@smartadminwebapp.com', '', '', ''),
(5, 'Dr. John Oliverytr', 'Oncologist, Gotbootstrap Inc.try', 'ofline', 'img/demo/avatars/6645e5b788954.png', '+1 313-779-8134tryrt', '134 Gallery St, Detroit, MI, 46214, USAtry', 'john.oliver@smartadminwebapp.com5', '', '', ''),
(7, 'шрек Попович', 'Пекарня', 'ofline', 'img/demo/avatars/663cb5fa90e1a.png', '1111111', 'Дом у болота', 'eee@mail.ru', 'шрек', 'шрек', 'шрек'),
(8, 'Михаил', 'завод', 'ofline', 'img/demo/avatars/avatar-m.png', '+79454241', 'завод на петровке', 'jimmy.fallan@smartadminwebapp.com', 'vk.com', 'tg.com', 'inst.com'),
(10, 'Arica Gracef', 'Accounting, Gotbootstrap Inc.f', 'ofline', 'img/demo/avatars/avatar-j.png', '+1 313-779-3347f', '798 Smyth Rd, Detroit, MI, 48341, USAf', 'dsfdsf@sd.ru', '', '', ''),
(16, 'РУстемМолодец', 'Школа 25', 'online', 'img/demo/avatars/6644dfac07ed0.png', '+1 987 584 55 44', 'проспект Зеленый дом 3', 'rustem111@ya.ru', NULL, NULL, NULL),
(18, 'Леонель Месси', 'fifa 16', 'online', 'img/demo/avatars/6645e37b7a6bc.jpg', ' +5 789 548 65 25', 'БарселонаБ 5 дом', 'messi1@ya.ru', 'vk/leo', 'tg/leo', 'inst/leo'),
(20, 'Криштиану Роналду', 'Футбик 15', 'online', 'img/demo/avatars/6645de4915625.jpg', '+8 978 548 95 62', 'Манчестер , 14', 'kristiano1@ya.ru', 'vk/ro', 'tg/ro', 'inst/ro');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `reg_user`
--
ALTER TABLE `reg_user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_1`
--
ALTER TABLE `users_1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `reg_user`
--
ALTER TABLE `reg_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `users_1`
--
ALTER TABLE `users_1`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
