-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-02-2020 a las 06:58:35
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `systemsapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `systems`
--

CREATE TABLE `systems` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `creation_date` datetime NOT NULL,
  `modification_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `systems`
--

INSERT INTO `systems` (`id`, `name`, `creation_date`, `modification_date`) VALUES
(1, 'testing system', '2020-02-16 23:40:26', '2020-02-16 23:40:26'),
(2, 'testing system', '2020-02-16 23:42:01', '2020-02-16 23:42:01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `systems`
--
ALTER TABLE `systems`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `systems`
--
ALTER TABLE `systems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
