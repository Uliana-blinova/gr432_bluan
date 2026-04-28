-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 28 2026 г., 15:57
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dean_office`
--

-- --------------------------------------------------------

--
-- Структура таблицы `disciplines`
--

CREATE TABLE `disciplines` (
  `discipline_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `disciplines`
--

INSERT INTO `disciplines` (`discipline_id`, `name`) VALUES
(2, 'Базы данных'),
(3, 'Веб-программирование'),
(4, 'Компьютерные сети'),
(1, 'Программирование на стороне сервера');

-- --------------------------------------------------------

--
-- Структура таблицы `grades`
--

CREATE TABLE `grades` (
  `grade_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `discipline_id` int(11) NOT NULL,
  `grade_value` int(11) DEFAULT NULL,
  `date_recorded` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`group_id`, `name`) VALUES
(1, 'ИВТ-21-1'),
(2, 'ИВТ-21-2'),
(3, 'ИВТ-22-1'),
(4, 'ФКН-101');

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `patronymic` varchar(100) DEFAULT NULL,
  `gender` enum('male','female') NOT NULL,
  `birth_date` date NOT NULL,
  `address` text DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`id`, `surname`, `name`, `patronymic`, `gender`, `birth_date`, `address`, `group_id`) VALUES
(1, 'Петров', 'Иван', 'Сергеевич', '', '2005-05-12', NULL, 1),
(2, 'Сидоров', 'Иван', 'Сергеевич', '', '2005-05-17', NULL, 1),
(3, 'Иванова', 'Анна', 'Петровна', '', '2005-08-20', NULL, 2),
(4, 'qwe', '', 'qwe', 'male', '2026-04-01', 'asdf', NULL),
(5, 'asd', 'asd', 'asd', 'female', '2026-04-23', 'werty', 3),
(6, 'Петров', 'Петр', 'Петрович', 'male', '2026-04-08', 'г.Москва', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `study_plan`
--

CREATE TABLE `study_plan` (
  `plan_id` int(11) NOT NULL COMMENT 'AUTO_INCREMENT',
  `group_id` int(11) DEFAULT NULL,
  `discipline_id` int(11) DEFAULT NULL,
  `course_num` int(11) NOT NULL,
  `semester_num` int(11) NOT NULL,
  `total_hours` int(11) NOT NULL,
  `control_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `study_plan`
--

INSERT INTO `study_plan` (`plan_id`, `group_id`, `discipline_id`, `course_num`, `semester_num`, `total_hours`, `control_type`) VALUES
(1, 1, 2, 3, 1, 72, 'зачет'),
(2, 3, 3, 1, 2, 40, 'зачет'),
(3, 4, 4, 1, 1, 120, 'экзамен');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','dean') DEFAULT 'dean'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `login`, `password`, `role`) VALUES
(1, 'asd', 'asd', 'bfd59291e825b5f2bbf1eb76569f8fe7', 'dean'),
(2, 'Сергеев Сергей Сергеевич', 'sergeev_serg', 'sergeev123', 'dean');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `disciplines`
--
ALTER TABLE `disciplines`
  ADD PRIMARY KEY (`discipline_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`grade_id`),
  ADD UNIQUE KEY `unique_student_discipline` (`student_id`,`discipline_id`),
  ADD KEY `discipline_id` (`discipline_id`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Индексы таблицы `study_plan`
--
ALTER TABLE `study_plan`
  ADD PRIMARY KEY (`plan_id`),
  ADD UNIQUE KEY `group_id_2` (`group_id`),
  ADD UNIQUE KEY `discipline_id_2` (`discipline_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `discipline_id` (`discipline_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `login_2` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `disciplines`
--
ALTER TABLE `disciplines`
  MODIFY `discipline_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `grades`
--
ALTER TABLE `grades`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`discipline_id`) REFERENCES `disciplines` (`discipline_id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
