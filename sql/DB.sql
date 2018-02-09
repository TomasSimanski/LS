-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 09 2018 г., 12:48
-- Версия сервера: 5.5.50
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `LS`
--

-- --------------------------------------------------------

--
-- Структура таблицы `FILES`
--

CREATE TABLE IF NOT EXISTS `FILES` (
  `ID` int(10) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `USER_ID` int(10) NOT NULL,
  `UPLOADED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `FILE` mediumblob NOT NULL,
  `SIZE` int(11) NOT NULL,
  `TYPE` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Структура таблицы `USERS`
--

CREATE TABLE IF NOT EXISTS `USERS` (
  `ID` int(10) NOT NULL,
  `EMAIL` varchar(64) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `CREATED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `FILES`
--
ALTER TABLE `FILES`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `FILES`
--
ALTER TABLE `FILES`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `USERS`
--
ALTER TABLE `USERS`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;