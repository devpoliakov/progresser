-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Хост: localhost
-- Час створення: Січ 14 2018 р., 21:07
-- Версія сервера: 5.5.46-MariaDB-log
-- Версія PHP: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `torpedo02_round`
--

-- --------------------------------------------------------

--
-- Структура таблиці `objects`
--

CREATE TABLE IF NOT EXISTS `objects` (
  `ID` int(255) NOT NULL,
  `objectTitle` varchar(255) NOT NULL,
  `objectWeight` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `objects`
--
ALTER TABLE `objects`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `objects`
--
ALTER TABLE `objects`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
