-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2023 a las 20:05:04
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_sportlife`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cantidad_producto`
--

CREATE TABLE `cantidad_producto` (
  `id` int(100) NOT NULL,
  `id_pedido` int(100) NOT NULL,
  `Cantidad` int(100) NOT NULL,
  `id_producto` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cantidad_producto`
--

INSERT INTO `cantidad_producto` (`id`, `id_pedido`, `Cantidad`, `id_producto`) VALUES
(1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(100) NOT NULL,
  `id_producto` int(100) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Iva` decimal(5,2) NOT NULL,
  `Total` decimal(7,2) NOT NULL,
  `Foto` varchar(255) NOT NULL DEFAULT 'FOTO',
  `Contado` decimal(7,2) NOT NULL,
  `Descuento` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `id_producto`, `Fecha`, `Iva`, `Total`, `Foto`, `Contado`, `Descuento`) VALUES
(1, 1, '2023-11-17 00:30:04', '100.00', '1100.00', 'FOTO', '1000.00', '100.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(100) NOT NULL,
  `Nombreproducto` varchar(255) NOT NULL,
  `Precio` decimal(7,2) NOT NULL,
  `Tipoproducto` varchar(255) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Iva` decimal(5,2) NOT NULL,
  `Marca` varchar(255) NOT NULL,
  `Mercanciadisponible` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `Nombreproducto`, `Precio`, `Tipoproducto`, `Descripcion`, `Iva`, `Marca`, `Mercanciadisponible`) VALUES
(1, 'Balon de volleyball', '500.00', 'Balon', 'Balon de color blanco y verde', '50.00', 'Mikasa', 13),
(2, 'Raqueta de tenis', '350.00', 'raqueta', 'color negro con blanco', '5.00', 'spalding', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cantidad_producto`
--
ALTER TABLE `cantidad_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cantidad_producto`
--
ALTER TABLE `cantidad_producto`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
