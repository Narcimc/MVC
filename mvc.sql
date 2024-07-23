-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-02-2023 a las 18:23:30
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mvc`
--
DROP DATABASE IF EXISTS `mvc`;
CREATE DATABASE IF NOT EXISTS `mvc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mvc`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `cat_id` int(11) NOT NULL,
  `cat_nombre` varchar(30) NOT NULL,
  `cat_descripcion` varchar(100) NOT NULL,
  `cat_estado` int(1) NOT NULL,
  `cat_usuarioActualizacion` varchar(12) NOT NULL,
  `cat_fechaActualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`cat_id`, `cat_nombre`, `cat_descripcion`, `cat_estado`, `cat_usuarioActualizacion`, `cat_fechaActualizacion`) VALUES
(1, 'Víveres', 'Víveres en general', 1, '', '2021-02-01 15:50:44'),
(2, 'Productos de limpieza', 'Productos de limpieza para el hogar', 1, '', '2021-02-17 15:55:58'),
(3, 'Zapatos', 'zapatos deportivos y casuales', 1, '', '2021-02-19 12:44:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `prod_id` int(11) NOT NULL,
  `prod_nombre` varchar(50) NOT NULL,
  `prod_estado` int(1) NOT NULL,
  `prod_precio` double NOT NULL,
  `prod_idCategoria` int(11) NOT NULL,
  `prod_usuarioActualizacion` varchar(12) NOT NULL,
  `prod_fechaActualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`prod_id`, `prod_nombre`, `prod_estado`, `prod_precio`, `prod_idCategoria`, `prod_usuarioActualizacion`, `prod_fechaActualizacion`) VALUES
(1, 'ARROZ INTEGRAL', 0, 100, 1, 'usuario', '2021-02-19 23:15:21'),
(2, 'AZUCAR BLANCO SAN CARLOS', 0, 1.99, 1, 'usuario', '2022-09-01 16:52:57'),
(3, 'ACEITE', 0, 111, 1, 'usuario', '2023-02-27 17:59:05'),
(43, 'Nuevo producto de zapatos', 1, 12.5, 3, 'usuario', '2023-02-27 18:20:10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `fk_categoria` (`prod_idCategoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`prod_idCategoria`) REFERENCES `categoria` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
