-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: db
-- Время создания: Дек 16 2021 г., 08:19
-- Версия сервера: 8.0.26
-- Версия PHP: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hospital`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Doctors`
--

CREATE TABLE `Doctors` (
  `id` int NOT NULL,
  `POSITION` varchar(20) NOT NULL,
  `NAME` varchar(20) NOT NULL,
  `SURNAME` varchar(20) NOT NULL,
  `MIDDLENAME` varchar(20) NOT NULL,
  `ROOMNUM` int NOT NULL,
  `SALARY` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `Doctors`
--

INSERT INTO `Doctors` (`id`, `POSITION`, `NAME`, `SURNAME`, `MIDDLENAME`, `ROOMNUM`, `SALARY`) VALUES
(7, 'Терапевт', 'Евгения', 'Иванова', 'Николаевна', 202, 10000),
(9, 'Педиатр', 'Анна', 'Смирнова', 'Александровна', 302, 20000),
(10, 'Хирург', 'Дмитрий', 'Андреев', 'Владимирович', 304, 20000),
(11, 'Хирург', 'Давид', 'Рахимов', 'Каренович', 304, 20000),
(12, 'Хирург', 'Давид', 'Рахимов', 'Каренович', 304, 20000);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int UNSIGNED NOT NULL,
  `news` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `news`) VALUES
(1, 'Новость 1');

-- --------------------------------------------------------

--
-- Структура таблицы `news1`
--

CREATE TABLE `news1` (
  `id` int NOT NULL,
  `NEWS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `news1`
--

INSERT INTO `news1` (`id`, `NEWS`) VALUES
(5, '1 декабря: Неврологи отмечают профессиональный праздник'),
(6, '12 ноября: В областной больнице появилась еще одна уютная игровая комната');

-- --------------------------------------------------------

--
-- Структура таблицы `PATIENTS`
--

CREATE TABLE `PATIENTS` (
  `ID` int NOT NULL,
  `NAME` varchar(20) NOT NULL,
  `SURNAME` varchar(20) NOT NULL,
  `MIDDLENAME` varchar(20) NOT NULL,
  `BIRTHDAY` date NOT NULL,
  `DISEASES` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `PATIENTS`
--

INSERT INTO `PATIENTS` (`ID`, `NAME`, `SURNAME`, `MIDDLENAME`, `BIRTHDAY`, `DISEASES`) VALUES
(1, 'Имя', 'Фамилия', '', '2021-12-01', ''),
(2, '123', '213', '', '2021-12-09', ''),
(3, '321', '24', '', '2021-12-10', '');

-- --------------------------------------------------------

--
-- Структура таблицы `phones`
--

CREATE TABLE `phones` (
  `id` int NOT NULL,
  `number` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `phones`
--

INSERT INTO `phones` (`id`, `number`) VALUES
(13, '+7777654'),
(14, '+111'),
(15, '2131231'),
(16, '21312311'),
(17, '+78005553535'),
(18, '+7321211321'),
(19, '+73212113211'),
(20, '+222'),
(21, '+999999'),
(22, '54'),
(23, '542');

-- --------------------------------------------------------

--
-- Структура таблицы `qa`
--

CREATE TABLE `qa` (
  `id` int UNSIGNED NOT NULL,
  `qa` varchar(191) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Дамп данных таблицы `qa`
--

INSERT INTO `qa` (`id`, `qa`) VALUES
(1, 'вопрос 1'),
(2, 'вопрос 2');

-- --------------------------------------------------------

--
-- Структура таблицы `qa1`
--

CREATE TABLE `qa1` (
  `id` int NOT NULL,
  `QA` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `qa1`
--

INSERT INTO `qa1` (`id`, `QA`) VALUES
(1, 'Как попасть в Областную консультативную поликлинику и перечень необходимых документов.'),
(2, 'Что взять с собой на роды в больницу?');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `login` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`) VALUES
(1, 'Dimon', '123@mail.ru', '$2y$10$fGJo4HSGoksueF46EzubHeqw0MC.XIzAYg4fpV930eEhl6iC/dEM6');

-- --------------------------------------------------------

--
-- Структура таблицы `Workingdays`
--

CREATE TABLE `Workingdays` (
  `IDDOCTOR` int NOT NULL,
  `MONDAY` time NOT NULL,
  `TUESDAY` time NOT NULL,
  `WEDNESDAY` time NOT NULL,
  `THURSDAY` time NOT NULL,
  `FRIDAY` time NOT NULL,
  `SATURDAY` time NOT NULL,
  `SUNDAY` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `Workingdays`
--

INSERT INTO `Workingdays` (`IDDOCTOR`, `MONDAY`, `TUESDAY`, `WEDNESDAY`, `THURSDAY`, `FRIDAY`, `SATURDAY`, `SUNDAY`) VALUES
(1, '20:49:23', '16:49:23', '56:49:23', '17:49:23', '24:49:23', '31:49:23', '17:49:23'),
(2, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(3, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(4, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(5, '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Doctors`
--
ALTER TABLE `Doctors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news1`
--
ALTER TABLE `news1`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `qa`
--
ALTER TABLE `qa`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `qa1`
--
ALTER TABLE `qa1`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Doctors`
--
ALTER TABLE `Doctors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `news1`
--
ALTER TABLE `news1`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `phones`
--
ALTER TABLE `phones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `qa`
--
ALTER TABLE `qa`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `qa1`
--
ALTER TABLE `qa1`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
