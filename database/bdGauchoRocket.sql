CREATE DATABASE gaucho_rocket;
USE gaucho_rocket;

-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 03-12-2019 a las 00:40:13
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
(1, 'General'),
(2, 'Familiar'),
(3, 'Suit');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_fisico`
--

CREATE TABLE `estado_fisico` (
  `id_estado_fisico` int(11) NOT NULL,
  `id_tipo_viaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_fisico`
--

INSERT INTO `estado_fisico` (`id_estado_fisico`, `id_tipo_viaje`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_reserva`
--

CREATE TABLE `estado_reserva` (
  `id_estado_reserva` int(11) NOT NULL,
  `estado` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_reserva`
--

INSERT INTO `estado_reserva` (`id_estado_reserva`, `estado`) VALUES
(1, 'Falta Codigo medico '),
(2, 'Falta pago'),
(3, 'Falta Check-in'),
(4, 'Listo para viajar'),
(5, 'Vencida'),
(6, 'En lista de espera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hospital`
--

CREATE TABLE `hospital` (
  `id_hospital` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hospital`
--

INSERT INTO `hospital` (`id_hospital`, `nombre`) VALUES
(1, 'Bueno Aires'),
(2, 'Shanghai'),
(3, 'Ankara');

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
(1, 'Buenos Aires'),
(2, 'Ankara'),
(3, 'Estación Espacial In'),
(4, 'OrbiterHotel'),
(5, 'Luna'),
(6, 'Marte'),
(7, 'Ganimedes'),
(8, 'Europa'),
(9, 'Io'),
(10, 'Encedalo'),
(11, 'Titán');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nave`
--

CREATE TABLE `nave` (
  `id_nave` int(11) NOT NULL,
  `id_tipo_viaje` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `matricula` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nave`
--

INSERT INTO `nave` (`id_nave`, `id_tipo_viaje`, `nombre`, `matricula`) VALUES
(1, 1, 'Calandria', '01'),
(2, 1, 'Colibri', '03'),
(3, 2, 'Zorzal', ''),
(4, 2, 'Carancho', ''),
(5, 2, 'Aguilucho', ''),
(6, 2, 'Canario', ''),
(7, 3, 'Aguila', ''),
(8, 3, 'Condor', ''),
(9, 3, 'Halcon', ''),
(10, 3, 'Guanaco', ''),
(11, 1, 'Calandria', 'O2'),
(12, 1, 'Calandria', 'O6'),
(13, 1, 'Calandria', 'O7'),
(14, 1, 'Calandria', 'O10'),
(15, 1, 'Colibri', 'O4'),
(16, 1, 'Colibri', 'O5'),
(17, 1, 'Colibri', 'O8'),
(18, 1, 'Colibri', 'O9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasajero`
--

CREATE TABLE `pasajero` (
  `id_usuario` int(11) NOT NULL,
  `id_estado_fisico` int(11) DEFAULT NULL,
  `id_turno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `id_viaje` int(11) NOT NULL,
  `vencimiento_reserva` datetime NOT NULL,
  `id_estado_reserva` int(11) DEFAULT NULL,
  `cod_cabina` int(11) NOT NULL,
  `cod_servicio` int(11) NOT NULL,
  `valor` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `id_viaje`, `vencimiento_reserva`, `id_estado_reserva`, `cod_cabina`, `cod_servicio`, `valor`) VALUES
(1, 1, '0000-00-00 00:00:00', 2, 3, 1, 0),
(2, 1, '0000-00-00 00:00:00', 2, 3, 1, 0),
(3, 1, '0000-00-00 00:00:00', 2, 3, 1, 0),
(4, 1, '0000-00-00 00:00:00', 2, 3, 1, 0),
(5, 1, '0000-00-00 00:00:00', 2, 3, 1, 0),
(6, 3, '2019-12-08 02:00:00', 1, 2, 2, 100),
(7, 3, '2019-12-08 02:00:00', 1, 2, 2, 100),
(8, 3, '2019-12-08 02:00:00', 1, 2, 2, 100),
(9, 3, '2019-12-08 02:00:00', 1, 2, 2, 100),
(10, 3, '2019-12-08 02:00:00', 1, 2, 2, 100),
(11, 3, '2019-12-08 02:00:00', 1, 2, 2, 100),
(12, 3, '2019-12-08 02:00:00', 1, 2, 2, 100);

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
(1, 'Orbital'),
(2, 'Baja aceleracion'),
(3, 'Alta aceleracion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno_hospital`
--

CREATE TABLE `turno_hospital` (
  `id_turno` int(11) NOT NULL,
  `id_hospital` int(11) NOT NULL,
  `turnos` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `turno_hospital`
--

INSERT INTO `turno_hospital` (`id_turno`, `id_hospital`, `turnos`, `fecha`) VALUES
(1, 1, 300, '2019-12-04'),
(2, 2, 210, '2019-12-04'),
(3, 3, 200, '2019-12-04'),
(4, 1, 300, '2019-12-05'),
(5, 2, 210, '2019-12-05'),
(6, 3, 200, '2019-12-05'),
(7, 1, 300, '2019-12-06'),
(8, 2, 210, '2019-12-06'),
(9, 3, 200, '2019-12-06');

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
(3, 'juanfgsdfgsdgdsf', 'juan@g.com2', '202cb962ac59075b964b07152d234b70', 1),
(6, 'aa', 'araozesteban@gmail.com', '4124bc0a9335c27f086f24ba207a4912', 2),
(7, 'aaaa', 'araozesteban2@gmail.com', '4124bc0a9335c27f086f24ba207a4912', 2),
(8, 'aaaaa', 'araozesteban3@gmail.com', '4124bc0a9335c27f086f24ba207a4912', 2),
(9, 'aaaaaa', 'araozesteban4@gmail.com', '4124bc0a9335c27f086f24ba207a4912', 2),
(10, 'aaaaaaa', 'araozesteban5@gmail.com', '4124bc0a9335c27f086f24ba207a4912', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_hace_reserva`
--

CREATE TABLE `usuario_hace_reserva` (
  `id_reserva` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_hace_reserva`
--

INSERT INTO `usuario_hace_reserva` (`id_reserva`, `id_usuario`) VALUES
(12, 1),
(12, 3);

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
(1, '2019-12-08 00:00:00', NULL, '08:00:00', 10000, 1, 1, 1),
(2, '2019-12-08 02:00:00', NULL, '08:00:00', 10000, 1, 1, 1),
(3, '2019-12-08 04:00:00', NULL, '08:00:00', 10000, 1, 1, 1),
(4, '2019-12-08 06:00:00', NULL, '08:00:00', 15000, 1, 2, 2),
(5, '2019-12-08 08:00:00', NULL, '08:00:00', 15000, 1, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje_nave_cabina`
--

CREATE TABLE `viaje_nave_cabina` (
  `id_viaje` int(11) NOT NULL,
  `id_nave` int(11) NOT NULL,
  `id_cabina` int(11) NOT NULL,
  `asientos_disponibles` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `viaje_nave_cabina`
--

INSERT INTO `viaje_nave_cabina` (`id_viaje`, `id_nave`, `id_cabina`, `asientos_disponibles`) VALUES
(1, 1, 1, 180),
(1, 1, 2, 75),
(1, 1, 3, 25),
(2, 12, 1, 200),
(2, 12, 2, 75),
(2, 12, 3, 25),
(3, 13, 1, 200),
(3, 13, 2, 75),
(3, 13, 3, 25),
(4, 2, 1, 100),
(4, 2, 2, 18),
(4, 2, 3, 2),
(5, 15, 1, 100),
(5, 15, 2, 18),
(5, 15, 3, 2);

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
  ADD PRIMARY KEY (`id_estado_fisico`),
  ADD KEY `fk_id_tipo_viaje` (`id_tipo_viaje`);

--
-- Indices de la tabla `estado_reserva`
--
ALTER TABLE `estado_reserva`
  ADD PRIMARY KEY (`id_estado_reserva`);

--
-- Indices de la tabla `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id_hospital`) USING BTREE;

--
-- Indices de la tabla `lugar`
--
ALTER TABLE `lugar`
  ADD PRIMARY KEY (`id_lugar`);

--
-- Indices de la tabla `nave`
--
ALTER TABLE `nave`
  ADD PRIMARY KEY (`id_nave`),
  ADD KEY `fk_id_tipo_viaje_nave` (`id_tipo_viaje`);

--
-- Indices de la tabla `pasajero`
--
ALTER TABLE `pasajero`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_estado_fisico` (`id_estado_fisico`),
  ADD KEY `fk_id_turno_pasajero` (`id_turno`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_estado_reserva` (`id_estado_reserva`),
  ADD KEY `cod_cabina` (`cod_cabina`),
  ADD KEY `cod_servicio` (`cod_servicio`),
  ADD KEY `fk_id_viaje_reserva` (`id_viaje`);

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
  ADD PRIMARY KEY (`id_turno`),
  ADD KEY `fk_id_hospital_turno` (`id_hospital`);

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
-- Indices de la tabla `viaje_nave_cabina`
--
ALTER TABLE `viaje_nave_cabina`
  ADD PRIMARY KEY (`id_viaje`,`id_nave`,`id_cabina`),
  ADD KEY `fk_id_nave_viaje_cabina` (`id_nave`),
  ADD KEY `fk_id_cabina_nave_cabina` (`id_cabina`);

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
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `usuario_hace_reserva`
--
ALTER TABLE `usuario_hace_reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estado_fisico`
--
ALTER TABLE `estado_fisico`
  ADD CONSTRAINT `fk_id_tipo_viaje` FOREIGN KEY (`id_tipo_viaje`) REFERENCES `tipo_viaje` (`id_tipo_viaje`);

--
-- Filtros para la tabla `nave`
--
ALTER TABLE `nave`
  ADD CONSTRAINT `fk_id_tipo_viaje_nave` FOREIGN KEY (`id_tipo_viaje`) REFERENCES `tipo_viaje` (`id_tipo_viaje`);

--
-- Filtros para la tabla `pasajero`
--
ALTER TABLE `pasajero`
  ADD CONSTRAINT `fk_id_turno_pasajero` FOREIGN KEY (`id_turno`) REFERENCES `turno_hospital` (`id_turno`),
  ADD CONSTRAINT `pasajero_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `pasajero_ibfk_2` FOREIGN KEY (`id_estado_fisico`) REFERENCES `estado_fisico` (`id_estado_fisico`),
  ADD CONSTRAINT `pasajero_ibfk_3` FOREIGN KEY (`id_turno`) REFERENCES `turno_hospital` (`id_turno`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `fk_id_viaje_reserva` FOREIGN KEY (`id_viaje`) REFERENCES `viaje` (`id_viaje`),
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_estado_reserva`) REFERENCES `estado_reserva` (`id_estado_reserva`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`cod_cabina`) REFERENCES `cabina` (`id_cabina`),
  ADD CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`cod_servicio`) REFERENCES `servicio` (`id_servicio`);

--
-- Filtros para la tabla `turno_hospital`
--
ALTER TABLE `turno_hospital`
  ADD CONSTRAINT `fk_id_hospital_turno` FOREIGN KEY (`id_hospital`) REFERENCES `hospital` (`id_hospital`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`);

--
-- Filtros para la tabla `usuario_hace_reserva`
--
ALTER TABLE `usuario_hace_reserva`
  ADD CONSTRAINT `usuario_hace_reserva_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `usuario_hace_reserva_ibfk_3` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`);

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `viaje_ibfk_1` FOREIGN KEY (`id_tipo_viaje`) REFERENCES `tipo_viaje` (`id_tipo_viaje`),
  ADD CONSTRAINT `viaje_ibfk_2` FOREIGN KEY (`id_lugar_destino`) REFERENCES `lugar` (`id_lugar`),
  ADD CONSTRAINT `viaje_ibfk_3` FOREIGN KEY (`id_lugar_origen`) REFERENCES `lugar` (`id_lugar`);

--
-- Filtros para la tabla `viaje_nave_cabina`
--
ALTER TABLE `viaje_nave_cabina`
  ADD CONSTRAINT `fk_id_cabina_nave_cabina` FOREIGN KEY (`id_cabina`) REFERENCES `cabina` (`id_cabina`),
  ADD CONSTRAINT `fk_id_nave_viaje_cabina` FOREIGN KEY (`id_nave`) REFERENCES `nave` (`id_nave`),
  ADD CONSTRAINT `fk_id_viaje_nave_cabina` FOREIGN KEY (`id_viaje`) REFERENCES `viaje` (`id_viaje`);

--
-- Filtros para la tabla `viaje_puede_ser_hecho_por`
--
ALTER TABLE `viaje_puede_ser_hecho_por`
  ADD CONSTRAINT `viaje_puede_ser_hecho_por_ibfk_1` FOREIGN KEY (`id_estado_fisico`) REFERENCES `estado_fisico` (`id_estado_fisico`),
  ADD CONSTRAINT `viaje_puede_ser_hecho_por_ibfk_2` FOREIGN KEY (`id_tipo_viaje`) REFERENCES `tipo_viaje` (`id_tipo_viaje`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
