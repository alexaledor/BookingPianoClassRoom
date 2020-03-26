-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Чрв 25 2019 р., 20:49
-- Версія сервера: 10.3.15-MariaDB-100.cba-log
-- Версія PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `smarthost`
--

-- --------------------------------------------------------

--
-- Структура таблиці `building`
--

CREATE TABLE `building` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(64) NOT NULL,
  `ADDRESS` varchar(64) DEFAULT NULL,
  `PHONE` varchar(64) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `building`
--

INSERT INTO `building` (`ID`, `NAME`, `ADDRESS`, `PHONE`) VALUES
(1, 'Building 1', NULL, NULL),
(2, 'Building 2', NULL, NULL),
(3, 'Building 3', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `classroom`
--

CREATE TABLE `classroom` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(256) NOT NULL,
  `BUILDING_ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `classroom`
--

INSERT INTO `classroom` (`ID`, `NAME`, `BUILDING_ID`) VALUES
(1, '106', 1),
(2, '108', 1),
(3, '406', 2),
(4, '401', 2),
(5, '301', 3),
(6, '302', 3),
(7, '101', 1),
(8, '103', 1),
(9, '405', 2),
(10, '403', 2),
(11, '307', 3),
(12, '308', 3);

-- --------------------------------------------------------

--
-- Структура таблиці `course`
--

CREATE TABLE `course` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `course`
--

INSERT INTO `course` (`ID`, `NAME`) VALUES
(1, 'I course'),
(2, 'II course'),
(3, 'III course'),
(4, 'IV course'),
(5, 'V course');

-- --------------------------------------------------------

--
-- Структура таблиці `reserve`
--

CREATE TABLE `reserve` (
  `ID` int(11) NOT NULL,
  `DATE` date NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `PART_TIME` int(11) NOT NULL,
  `CLASS_ROOM_ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `reserve`
--

INSERT INTO `reserve` (`ID`, `DATE`, `USER_ID`, `PART_TIME`, `CLASS_ROOM_ID`) VALUES
(226, '2019-01-21', 1, 1, 7),
(225, '2019-01-21', 1, 0, 7),
(224, '2019-01-16', 2, 3, 1),
(223, '2019-01-16', 2, 2, 1),
(222, '2019-01-16', 2, 1, 1),
(221, '2019-01-16', 2, 0, 1),
(220, '2019-01-15', 2, 2, 7),
(219, '2019-01-15', 2, 3, 7),
(218, '2019-01-15', 2, 4, 7),
(208, '2019-01-11', 2, 11, 7),
(206, '2019-01-11', 2, 10, 7),
(205, '2019-01-11', 2, 9, 7),
(204, '2019-01-11', 2, 8, 7),
(217, '2019-01-15', 2, 5, 7),
(202, '2019-01-11', 2, 6, 7),
(200, '2019-01-11', 2, 5, 7),
(216, '2019-01-11', 2, 4, 7),
(215, '2019-01-11', 1, 3, 7),
(197, '2019-01-11', 2, 2, 7),
(212, '2019-01-11', 1, 1, 7),
(211, '2019-01-11', 1, 0, 7);

-- --------------------------------------------------------

--
-- Структура таблиці `unit`
--

CREATE TABLE `unit` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `unit`
--

INSERT INTO `unit` (`ID`, `NAME`) VALUES
(3, 'Crankcase'),
(4, 'Drum'),
(1, 'Piano'),
(2, 'Violin');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `LOGIN` varchar(256) NOT NULL,
  `PASSWORD` varchar(64) NOT NULL,
  `FIRST_NAME` varchar(256) NOT NULL,
  `LAST_NAME` varchar(256) NOT NULL,
  `UNIT` varchar(64) NOT NULL,
  `COURS` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`ID`, `LOGIN`, `PASSWORD`, `FIRST_NAME`, `LAST_NAME`, `UNIT`, `COURS`) VALUES
(1, 'alex', '123', 'Alexey', 'Dorofeev', '1', 1),
(2, 'andrey', '123', 'Andrey', 'Dorofeev', '2', 1),
(3, 'vlad', '123', 'Vladislav', 'Dorofeev', '4', 1);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `building`
--
ALTER TABLE `building`
  ADD PRIMARY KEY (`ID`);

--
-- Індекси таблиці `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`ID`);

--
-- Індекси таблиці `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`ID`);

--
-- Індекси таблиці `reserve`
--
ALTER TABLE `reserve`
  ADD PRIMARY KEY (`ID`);

--
-- Індекси таблиці `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NAME` (`NAME`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `building`
--
ALTER TABLE `building`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблиці `classroom`
--
ALTER TABLE `classroom`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблиці `course`
--
ALTER TABLE `course`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблиці `reserve`
--
ALTER TABLE `reserve`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;
--
-- AUTO_INCREMENT для таблиці `unit`
--
ALTER TABLE `unit`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
