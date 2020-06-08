-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-06-2020 a las 12:45:40
-- Versión del servidor: 5.6.41-84.1
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `javierc1_apseguros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cusuario`
--

CREATE TABLE `cusuario` (
  `idUsuario` smallint(6) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apPaterno` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apMaterno` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cusuario`
--

INSERT INTO `cusuario` (`idUsuario`, `nombre`, `apPaterno`, `apMaterno`, `login`, `password`) VALUES
(1, 'Javier Alejandro', 'Cruz', 'Espinosa', 'ajedrezdin', '$2y$10$vKiliFSe2bHf8oMEYs.IwOsgj');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cusuario2`
--

CREATE TABLE `cusuario2` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apPaterno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apMaterno` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cusuario2`
--

INSERT INTO `cusuario2` (`idUsuario`, `nombre`, `apPaterno`, `apMaterno`, `login`, `password`) VALUES
(1, 'Javier Alejandro ', 'Cruz', 'Espinosa', 'ajedrezdinamico@hotmail.com', '$2y$10$66ktVKiO2z1j5CLreTHsRuPBUNMWHH0rQsIt9QNLruvdrVrSu1iyi'),
(2, 'grecia', 'cruz', 'espinosa', 'abcd@hotmail.com', '$2y$10$xRYpZt/0nOFjRIIE2cJA4O529RoMIjoOTA4z9dSZr5UR8u2s6G5k2'),
(3, 'Manuel', 'Cruz', 'Espinosa', '123@hotamail.com', '$2y$10$XmT29IFyD3klCI120OJAhu7o00b1OFpcDf1QXn9QGYteJy7dlbPhK'),
(6, 'Daniel ', 'Gonzales', 'Mendoza', 'dani123@gmail.com', '$2y$10$WZjnM8N7j06.GWZO3Y/0FO49doWv4As4yOLnOISKGUgCOi2UU.Iym');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cusuario`
--
ALTER TABLE `cusuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `cusuario2`
--
ALTER TABLE `cusuario2`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cusuario`
--
ALTER TABLE `cusuario`
  MODIFY `idUsuario` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cusuario2`
--
ALTER TABLE `cusuario2`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
