-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 24-10-2019 a las 02:58:16
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gaucho_rocket`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabina`
--

CREATE TABLE `cabina` (
  `id_cabina` int(11) NOT NULL,
  `tipo_cabina` varchar(20) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_fisico`
--

CREATE TABLE `estado_fisico` (
  `id_estado_fisico` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_reserva`
--

CREATE TABLE `estado_reserva` (
  `id_estado_reserva` int(11) NOT NULL,
  `estado` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar`
--

CREATE TABLE `lugar` (
  `id_lugar` int(11) NOT NULL,
  `nombre_lugar` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lugar`
--

INSERT INTO `lugar` (`id_lugar`, `nombre_lugar`) VALUES
(1, 'Saturno'),
(2, 'Neptuno'),
(3, 'Jupiter'),
(4, 'Tierra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nave`
--

CREATE TABLE `nave` (
  `id_nave` int(11) NOT NULL,
  `tipo_nave` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nave_tiene_cabina`
--

CREATE TABLE `nave_tiene_cabina` (
  `id_nave` int(11) NOT NULL,
  `id_cabina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasajero`
--

CREATE TABLE `pasajero` (
  `id_usuario` int(11) DEFAULT NULL,
  `id_estado_fisico` int(11) DEFAULT NULL,
  `id_hospital` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `vencimiento_reserva` datetime DEFAULT NULL,
  `id_estado_reserva` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_cabina`
--

CREATE TABLE `reserva_cabina` (
  `id_reserva` int(11) NOT NULL,
  `id_cabina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva_servicio`
--

CREATE TABLE `reserva_servicio` (
  `id_reserva` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` int(11) NOT NULL,
  `tipo_sevicio` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `descripcion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_viaje`
--

CREATE TABLE `tipo_viaje` (
  `id_tipo_viaje` int(11) NOT NULL,
  `nombre_tipo_viaje` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_viaje`
--

INSERT INTO `tipo_viaje` (`id_tipo_viaje`, `nombre_tipo_viaje`) VALUES
(1, 'orbital');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno_hospital`
--

CREATE TABLE `turno_hospital` (
  `id_hospital` int(11) NOT NULL,
  `nombre_hospital` varchar(35) DEFAULT NULL,
  `turnos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(25) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `contraseña` varchar(40) DEFAULT NULL,
  `id_tipo_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_hace_reserva`
--

CREATE TABLE `usuario_hace_reserva` (
  `id_reserva` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `id_viaje` int(11) NOT NULL,
  `salida_viaje` datetime DEFAULT NULL,
  `llegada_viaje` datetime DEFAULT NULL,
  `duracion` time DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `id_tipo_viaje` int(11) DEFAULT NULL,
  `id_lugar_destino` int(11) DEFAULT NULL,
  `id_lugar_origen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`id_viaje`, `salida_viaje`, `llegada_viaje`, `duracion`, `precio`, `id_tipo_viaje`, `id_lugar_destino`, `id_lugar_origen`) VALUES
(1, '2019-10-09 00:00:00', '2019-10-17 00:00:00', '05:00:00', 123, 1, 1, 1),
(2, '2019-10-17 00:00:00', '2019-10-18 00:00:00', '05:00:00', 456, 1, 2, 2),
(3, '2019-10-16 00:00:00', '2019-10-19 00:00:00', '09:00:00', 567, 1, 1, 1),
(4, '2019-11-14 00:00:00', '2019-11-16 00:00:00', '12:00:00', 4562, 1, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje_hecho_por`
--

CREATE TABLE `viaje_hecho_por` (
  `id_reserva` int(11) NOT NULL,
  `id_viaje` int(11) NOT NULL,
  `id_nave` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje_puede_ser_hecho_por`
--

CREATE TABLE `viaje_puede_ser_hecho_por` (
  `id_estado_fisico` int(11) NOT NULL,
  `id_viaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cabina`
--
ALTER TABLE `cabina`
  ADD PRIMARY KEY (`id_cabina`);

--
-- Indices de la tabla `estado_fisico`
--
ALTER TABLE `estado_fisico`
  ADD PRIMARY KEY (`id_estado_fisico`);

--
-- Indices de la tabla `estado_reserva`
--
ALTER TABLE `estado_reserva`
  ADD PRIMARY KEY (`id_estado_reserva`);

--
-- Indices de la tabla `lugar`
--
ALTER TABLE `lugar`
  ADD PRIMARY KEY (`id_lugar`);

--
-- Indices de la tabla `nave`
--
ALTER TABLE `nave`
  ADD PRIMARY KEY (`id_nave`);

--
-- Indices de la tabla `nave_tiene_cabina`
--
ALTER TABLE `nave_tiene_cabina`
  ADD PRIMARY KEY (`id_nave`,`id_cabina`),
  ADD KEY `id_cabina` (`id_cabina`);

--
-- Indices de la tabla `pasajero`
--
ALTER TABLE `pasajero`
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_estado_fisico` (`id_estado_fisico`),
  ADD KEY `id_hospital` (`id_hospital`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_estado_reserva` (`id_estado_reserva`);

--
-- Indices de la tabla `reserva_cabina`
--
ALTER TABLE `reserva_cabina`
  ADD PRIMARY KEY (`id_reserva`,`id_cabina`),
  ADD KEY `id_cabina` (`id_cabina`);

--
-- Indices de la tabla `reserva_servicio`
--
ALTER TABLE `reserva_servicio`
  ADD PRIMARY KEY (`id_reserva`,`id_servicio`),
  ADD KEY `id_servicio` (`id_servicio`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `tipo_viaje`
--
ALTER TABLE `tipo_viaje`
  ADD PRIMARY KEY (`id_tipo_viaje`);

--
-- Indices de la tabla `turno_hospital`
--
ALTER TABLE `turno_hospital`
  ADD PRIMARY KEY (`id_hospital`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_tipo_usuario` (`id_tipo_usuario`);

--
-- Indices de la tabla `usuario_hace_reserva`
--
ALTER TABLE `usuario_hace_reserva`
  ADD PRIMARY KEY (`id_reserva`,`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`id_viaje`),
  ADD KEY `id_tipo_viaje` (`id_tipo_viaje`),
  ADD KEY `id_lugar` (`id_lugar_destino`),
  ADD KEY `id_lugar_origen` (`id_lugar_origen`);

--
-- Indices de la tabla `viaje_hecho_por`
--
ALTER TABLE `viaje_hecho_por`
  ADD PRIMARY KEY (`id_reserva`,`id_viaje`,`id_nave`),
  ADD KEY `id_viaje` (`id_viaje`),
  ADD KEY `id_nave` (`id_nave`);

--
-- Indices de la tabla `viaje_puede_ser_hecho_por`
--
ALTER TABLE `viaje_puede_ser_hecho_por`
  ADD PRIMARY KEY (`id_estado_fisico`,`id_viaje`),
  ADD KEY `id_viaje` (`id_viaje`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `nave_tiene_cabina`
--
ALTER TABLE `nave_tiene_cabina`
  ADD CONSTRAINT `nave_tiene_cabina_ibfk_1` FOREIGN KEY (`id_nave`) REFERENCES `nave` (`id_nave`),
  ADD CONSTRAINT `nave_tiene_cabina_ibfk_2` FOREIGN KEY (`id_cabina`) REFERENCES `cabina` (`id_cabina`);

--
-- Filtros para la tabla `pasajero`
--
ALTER TABLE `pasajero`
  ADD CONSTRAINT `pasajero_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `pasajero_ibfk_2` FOREIGN KEY (`id_estado_fisico`) REFERENCES `estado_fisico` (`id_estado_fisico`),
  ADD CONSTRAINT `pasajero_ibfk_3` FOREIGN KEY (`id_hospital`) REFERENCES `turno_hospital` (`id_hospital`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_estado_reserva`) REFERENCES `estado_reserva` (`id_estado_reserva`);

--
-- Filtros para la tabla `reserva_cabina`
--
ALTER TABLE `reserva_cabina`
  ADD CONSTRAINT `reserva_cabina_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`),
  ADD CONSTRAINT `reserva_cabina_ibfk_2` FOREIGN KEY (`id_cabina`) REFERENCES `cabina` (`id_cabina`);

--
-- Filtros para la tabla `reserva_servicio`
--
ALTER TABLE `reserva_servicio`
  ADD CONSTRAINT `reserva_servicio_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`),
  ADD CONSTRAINT `reserva_servicio_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id_servicio`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`);

--
-- Filtros para la tabla `usuario_hace_reserva`
--
ALTER TABLE `usuario_hace_reserva`
  ADD CONSTRAINT `usuario_hace_reserva_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`),
  ADD CONSTRAINT `usuario_hace_reserva_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `viaje_ibfk_1` FOREIGN KEY (`id_tipo_viaje`) REFERENCES `tipo_viaje` (`id_tipo_viaje`),
  ADD CONSTRAINT `viaje_ibfk_2` FOREIGN KEY (`id_lugar_destino`) REFERENCES `lugar` (`id_lugar`),
  ADD CONSTRAINT `viaje_ibfk_3` FOREIGN KEY (`id_lugar_origen`) REFERENCES `lugar` (`id_lugar`);

--
-- Filtros para la tabla `viaje_hecho_por`
--
ALTER TABLE `viaje_hecho_por`
  ADD CONSTRAINT `viaje_hecho_por_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`),
  ADD CONSTRAINT `viaje_hecho_por_ibfk_2` FOREIGN KEY (`id_viaje`) REFERENCES `viaje` (`id_viaje`),
  ADD CONSTRAINT `viaje_hecho_por_ibfk_3` FOREIGN KEY (`id_nave`) REFERENCES `nave` (`id_nave`);

--
-- Filtros para la tabla `viaje_puede_ser_hecho_por`
--
ALTER TABLE `viaje_puede_ser_hecho_por`
  ADD CONSTRAINT `viaje_puede_ser_hecho_por_ibfk_1` FOREIGN KEY (`id_estado_fisico`) REFERENCES `estado_fisico` (`id_estado_fisico`),
  ADD CONSTRAINT `viaje_puede_ser_hecho_por_ibfk_2` FOREIGN KEY (`id_viaje`) REFERENCES `viaje` (`id_viaje`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
