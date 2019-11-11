-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 05-11-2019 a las 01:19:34
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `tipo_cabina` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cabina`
--

INSERT INTO `cabina` (`id_cabina`, `tipo_cabina`) VALUES
(1, 'general'),
(2, 'familiar'),
(3, 'Suit');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_fisico`
--

CREATE TABLE `estado_fisico` (
  `id_estado_fisico` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_fisico`
--

INSERT INTO `estado_fisico` (`id_estado_fisico`, `numero`) VALUES
(1, 1),
(2, 2),
(3, 3);

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
  `tipo_nave` varchar(20) DEFAULT NULL,
  `capacidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nave`
--

INSERT INTO `nave` (`id_nave`, `tipo_nave`, `capacidad`) VALUES
(1, 'Calandria', 300),
(2, 'Colibri', 120),
(3, 'Zorzal', 100),
(4, 'Carancho', 110),
(5, 'Aguilucho', 60),
(6, 'Canario', 80),
(7, 'Aguila', 300),
(8, 'Condor', 350),
(9, 'Halcon', 200),
(10, 'Guanaco', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nave_tiene_cabina`
--

CREATE TABLE `nave_tiene_cabina` (
  `id_nave` int(11) NOT NULL,
  `id_cabina` int(11) NOT NULL,
  `cantidad_de_asientos_en_cabina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nave_tiene_cabina`
--

INSERT INTO `nave_tiene_cabina` (`id_nave`, `id_cabina`, `cantidad_de_asientos_en_cabina`) VALUES
(1, 1, 200),
(1, 2, 75),
(1, 3, 25),
(2, 1, 100),
(2, 2, 18),
(2, 3, 2),
(3, 1, 50),
(3, 2, 50),
(4, 1, 110),
(5, 2, 50),
(5, 3, 10),
(6, 2, 70),
(6, 3, 10),
(7, 1, 200),
(7, 2, 75),
(7, 3, 25),
(8, 1, 300),
(8, 2, 10),
(8, 3, 40),
(9, 1, 150),
(9, 2, 25),
(9, 3, 25),
(10, 3, 100);

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
  `id_estado_reserva` int(11) DEFAULT NULL,
  `cod_cabina` int(11) NOT NULL,
  `cod_servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` int(11) NOT NULL,
  `tipo_servicio` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_servicio`, `tipo_servicio`) VALUES
(1, 'Standar'),
(2, 'Gourmet'),
(3, 'Spa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL,
  `descripcion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `descripcion`) VALUES
(1, 'Cliente'),
(2, 'Administrador');

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
(1, 'orbital'),
(2, 'baja aceleracion'),
(3, 'alta aceleracion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno_hospital`
--

CREATE TABLE `turno_hospital` (
  `id_hospital` int(11) NOT NULL,
  `nombre_hospital` varchar(35) DEFAULT NULL,
  `turnos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `turno_hospital`
--

INSERT INTO `turno_hospital` (`id_hospital`, `nombre_hospital`, `turnos`) VALUES
(1, 'Buenos Aires', 300),
(2, 'Shangai', 210),
(3, 'Ankara', 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `contrasena` varchar(40) DEFAULT NULL,
  `id_tipo_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `email`, `contrasena`, `id_tipo_usuario`) VALUES
(1, 'leo', 'leonel@g.com', '202cb962ac59075b964b07152d234b70', 1),
(2, 'juan', 'juan@g.com', '250cf8b51c773f3f8dc8b4be867a9a02', 1),
(3, 'juanfgsdfgsdgdsf', 'juan@g.com2', '202cb962ac59075b964b07152d234b70', 1);

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
  `id_viaje` int(11) NOT NULL,
  `id_nave` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `viaje_hecho_por`
--

INSERT INTO `viaje_hecho_por` (`id_viaje`, `id_nave`) VALUES
(1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje_puede_ser_hecho_por`
--

CREATE TABLE `viaje_puede_ser_hecho_por` (
  `id_estado_fisico` int(11) NOT NULL,
  `id_tipo_viaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `viaje_puede_ser_hecho_por`
--

INSERT INTO `viaje_puede_ser_hecho_por` (`id_estado_fisico`, `id_tipo_viaje`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(3, 3);

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
  ADD KEY `id_estado_reserva` (`id_estado_reserva`),
  ADD KEY `cod_cabina` (`cod_cabina`),
  ADD KEY `cod_servicio` (`cod_servicio`);

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
  ADD PRIMARY KEY (`id_viaje`,`id_nave`),
  ADD KEY `id_nave` (`id_nave`),
  ADD KEY `id_viaje` (`id_viaje`) USING BTREE;

--
-- Indices de la tabla `viaje_puede_ser_hecho_por`
--
ALTER TABLE `viaje_puede_ser_hecho_por`
  ADD PRIMARY KEY (`id_estado_fisico`,`id_tipo_viaje`),
  ADD KEY `id_viaje` (`id_tipo_viaje`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_estado_reserva`) REFERENCES `estado_reserva` (`id_estado_reserva`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`cod_cabina`) REFERENCES `cabina` (`id_cabina`),
  ADD CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`cod_servicio`) REFERENCES `servicio` (`id_servicio`);

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
  ADD CONSTRAINT `viaje_hecho_por_ibfk_2` FOREIGN KEY (`id_viaje`) REFERENCES `viaje` (`id_viaje`),
  ADD CONSTRAINT `viaje_hecho_por_ibfk_3` FOREIGN KEY (`id_nave`) REFERENCES `nave` (`id_nave`);

--
-- Filtros para la tabla `viaje_puede_ser_hecho_por`
--
ALTER TABLE `viaje_puede_ser_hecho_por`
  ADD CONSTRAINT `viaje_puede_ser_hecho_por_ibfk_1` FOREIGN KEY (`id_estado_fisico`) REFERENCES `estado_fisico` (`id_estado_fisico`),
  ADD CONSTRAINT `viaje_puede_ser_hecho_por_ibfk_2` FOREIGN KEY (`id_tipo_viaje`) REFERENCES `tipo_viaje` (`id_tipo_viaje`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
