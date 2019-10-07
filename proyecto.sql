-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-05-2019 a las 04:35:28
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id_art` int(11) NOT NULL DEFAULT '1000000000',
  `marca_art` varchar(50) DEFAULT NULL,
  `desc_art` varchar(100) DEFAULT NULL,
  `cant_art` int(11) DEFAULT '1',
  `pre_art` float DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id_art`, `marca_art`, `desc_art`, `cant_art`, `pre_art`) VALUES
(1000000000, 'generico', 'producto de prueba', 1, 2.99),
(1000000001, 'mas generico', 'Segundo producto de prueba', 4, 5),
(1000000002, '', 'jabón genérico', 8, 18.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_emp` int(11) NOT NULL,
  `us_emp` varchar(50) NOT NULL,
  `pass_emp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_emp`, `us_emp`, `pass_emp`) VALUES
(1, 'admin', 'admin'),
(2, 'root', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion`
--

CREATE TABLE `sesion` (
  `id_emp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sesion`
--

INSERT INTO `sesion` (`id_emp`) VALUES
(1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `id_ticket` int(11) DEFAULT '1000',
  `id_emp` int(11) DEFAULT NULL,
  `fecha_ticket` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_art` int(11) DEFAULT NULL,
  `desc_art` varchar(50) DEFAULT NULL,
  `pre_art` float(5,2) DEFAULT NULL,
  `sub_ticket` float(5,2) DEFAULT NULL,
  `total_ticket` float(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`id_ticket`, `id_emp`, `fecha_ticket`, `id_art`, `desc_art`, `pre_art`, `sub_ticket`, `total_ticket`) VALUES
(1, 0, '0000-00-00 00:00:00', 1000000000, 'producto de prueba', 2.99, 14.95, 29.95),
(1, 0, '0000-00-00 00:00:00', 1000000001, 'Segundo producto de prueba', 5.00, 15.00, 29.95),
(2, 1, '2019-04-28 16:49:41', 1000000000, 'producto de prueba', 2.99, 11.96, 36.96),
(2, 1, '2019-04-28 16:49:41', 1000000001, 'Segundo producto de prueba', 5.00, 25.00, 36.96),
(3, 1, '2019-04-28 16:57:26', 1000000001, 'Segundo producto de prueba', 5.00, 5.00, 5.00),
(4, 2, '2019-04-29 21:15:04', 1000000001, 'Segundo producto de prueba', 5.00, 10.00, 12.99),
(4, 2, '2019-04-29 21:15:04', 1000000000, 'producto de prueba', 2.99, 2.99, 12.99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_art` int(11) DEFAULT NULL,
  `desc_art` varchar(50) DEFAULT NULL,
  `cant_vent` int(11) NOT NULL DEFAULT '1',
  `pre_art` float(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id_art`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_emp`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_emp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
