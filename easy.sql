-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2018 a las 20:00:01
-- Versión del servidor: 10.1.8-MariaDB
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `easy`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `acc_token` varchar(100) NOT NULL,
  `acc_contra` varchar(250) NOT NULL,
  `acc_codigo` varchar(20) NOT NULL,
  `usu_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`acc_token`, `acc_contra`, `acc_codigo`, `usu_codigo`) VALUES
('09294ce3814019acac495d055444c358', '$2y$10$/Na0FUGFVwRWG8iBtj.Pyu35CVt2mvFPIT3w78nbzlar1r.It2/hi', '', 14),
('2236796a2c51ded4c4a5358d2177f6ef', '$2y$10$zKIZ2/4Ds0wx/TEfsdY/tuxfVW71CkcAcqQqivFw2dEb4OSc1ZAyy', '', 12),
('7ea297125cb6546b81665ed12baa2c81', '$2y$10$dc9UmeuleBCtPeDWireYLuQweqxG0oEgG4xIZi0OKp5AT0KcpMIme', '', 11),
('jhgdasaddghhfdfghhgf', '$2y$10$qTD5VQmm/NYFKA6TeP0Yi.NCqBKGpXCCEFmr8hQcWSNHx.KBUaUie', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id_act` int(11) NOT NULL,
  `nom_act` varchar(100) DEFAULT NULL,
  `fecha_realizacion` date NOT NULL,
  `id_ins` int(11) NOT NULL,
  `id_ficha` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id_act`, `nom_act`, `fecha_realizacion`, `id_ins`, `id_ficha`) VALUES
(10, 'dompi', '2018-06-18', 2, 1355152);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendiz`
--

CREATE TABLE `aprendiz` (
  `id_apre` int(11) NOT NULL,
  `usu_codigo` int(11) NOT NULL,
  `fecha_registro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aprendiz`
--

INSERT INTO `aprendiz` (`id_apre`, `usu_codigo`, `fecha_registro`) VALUES
(2, 14, '2018-06-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendizxficha`
--

CREATE TABLE `aprendizxficha` (
  `id_aprendiz` int(11) NOT NULL,
  `id_ficha` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aprendizxficha`
--

INSERT INTO `aprendizxficha` (`id_aprendiz`, `id_ficha`) VALUES
(2, 1355152);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id_actividad` int(11) NOT NULL,
  `id_apren` int(11) NOT NULL,
  `hora_entrada` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `ciu_codigo` int(11) NOT NULL,
  `ciu_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`ciu_codigo`, `ciu_nombre`) VALUES
(1, 'medellin'),
(2, 'bogota');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

CREATE TABLE `ficha` (
  `id_ficha` bigint(20) NOT NULL,
  `nom_ficha` varchar(100) DEFAULT NULL,
  `id_jor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ficha`
--

INSERT INTO `ficha` (`id_ficha`, `nom_ficha`, `id_jor`) VALUES
(1355152, 'adsiii', 2),
(1355155, 'ADSI\r\n', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

CREATE TABLE `instructor` (
  `id_ins` int(11) NOT NULL,
  `usu_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `instructor`
--

INSERT INTO `instructor` (`id_ins`, `usu_codigo`) VALUES
(1, 1),
(2, 11),
(3, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor_ficha`
--

CREATE TABLE `instructor_ficha` (
  `id_ins` int(11) DEFAULT NULL,
  `id_ficha` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `instructor_ficha`
--

INSERT INTO `instructor_ficha` (`id_ins`, `id_ficha`) VALUES
(NULL, 1355155),
(3, 1355155);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada`
--

CREATE TABLE `jornada` (
  `id_jor` int(11) NOT NULL,
  `nom_jor` varchar(20) DEFAULT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jornada`
--

INSERT INTO `jornada` (`id_jor`, `nom_jor`, `hora_inicio`, `hora_fin`) VALUES
(1, 'diurna', '00:00:00', '00:00:00'),
(2, 'mixta', '00:00:00', '00:00:00'),
(3, 'nocturna', '00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_id`
--

CREATE TABLE `rol_id` (
  `rol_id` int(11) NOT NULL,
  `rol_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol_id`
--

INSERT INTO `rol_id` (`rol_id`, `rol_nombre`) VALUES
(1, 'admin'),
(2, 'Instructor'),
(3, 'Aprendiz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usu_codigo` int(11) NOT NULL,
  `usu_identificacion` bigint(20) NOT NULL,
  `usu_nombre` varchar(40) NOT NULL,
  `usu_nombre2` varchar(40) NOT NULL,
  `usu_apellido` varchar(40) NOT NULL,
  `usu_apellido2` varchar(40) NOT NULL,
  `usu_correo` varchar(100) NOT NULL,
  `usu_celular` bigint(20) NOT NULL,
  `ciu_codigo` int(11) NOT NULL,
  `usu_direccion` varchar(100) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `tipo_documento` varchar(50) NOT NULL,
  `usu_estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_codigo`, `usu_identificacion`, `usu_nombre`, `usu_nombre2`, `usu_apellido`, `usu_apellido2`, `usu_correo`, `usu_celular`, `ciu_codigo`, `usu_direccion`, `rol_id`, `tipo_documento`, `usu_estado`) VALUES
(1, 9904, 'Cristian', '', 'lopera', '', 'dompi@gmail.com', 1231232, 2, 'sadas', 1, 'Tarjeta de identidad', 'activo'),
(11, 99043, 'cristian', 'alexis', 'l', 'b', 'cristian@gmail.com', 3233557660, 1, 'calle 95', 2, 'Cedula de ciudadania', 'activo'),
(12, 123213, 'cristian', 'alexis', 'lopera', 'bedoya', 'cristian@gmail.com', 3233557660, 1, 'calle 95', 2, 'Cedula de ciudadania', 'activo'),
(14, 324324, '3243', '324', '234', '34234', 'cristian@gmail.com', 324, 2, '234324', 3, 'Cedula de ciudadania', 'activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`acc_token`),
  ADD KEY `usu_codigo` (`usu_codigo`),
  ADD KEY `acc_codigo` (`acc_codigo`);

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id_act`),
  ADD KEY `id_ins` (`id_ins`),
  ADD KEY `id_ficha` (`id_ficha`);

--
-- Indices de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  ADD PRIMARY KEY (`id_apre`),
  ADD KEY `usu_codigo` (`usu_codigo`);

--
-- Indices de la tabla `aprendizxficha`
--
ALTER TABLE `aprendizxficha`
  ADD KEY `id_aprendiz` (`id_aprendiz`),
  ADD KEY `id_ficha` (`id_ficha`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD KEY `id_actividad` (`id_actividad`),
  ADD KEY `id_apren` (`id_apren`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`ciu_codigo`);

--
-- Indices de la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`id_ficha`),
  ADD KEY `id_jor` (`id_jor`);

--
-- Indices de la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`id_ins`),
  ADD KEY `usu_codigo` (`usu_codigo`);

--
-- Indices de la tabla `instructor_ficha`
--
ALTER TABLE `instructor_ficha`
  ADD KEY `id_ins` (`id_ins`),
  ADD KEY `id_ficha` (`id_ficha`);

--
-- Indices de la tabla `jornada`
--
ALTER TABLE `jornada`
  ADD PRIMARY KEY (`id_jor`);

--
-- Indices de la tabla `rol_id`
--
ALTER TABLE `rol_id`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_codigo`),
  ADD UNIQUE KEY `usu_identificacion` (`usu_identificacion`),
  ADD KEY `ciu_codigo` (`ciu_codigo`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id_act` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  MODIFY `id_apre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `ciu_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `instructor`
--
ALTER TABLE `instructor`
  MODIFY `id_ins` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `rol_id`
--
ALTER TABLE `rol_id`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD CONSTRAINT `acceso_ibfk_1` FOREIGN KEY (`usu_codigo`) REFERENCES `usuario` (`usu_codigo`);

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `actividad_ibfk_3` FOREIGN KEY (`id_ins`) REFERENCES `instructor` (`id_ins`) ON UPDATE CASCADE,
  ADD CONSTRAINT `actividad_ibfk_4` FOREIGN KEY (`id_ficha`) REFERENCES `ficha` (`id_ficha`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  ADD CONSTRAINT `aprendiz_ibfk_1` FOREIGN KEY (`usu_codigo`) REFERENCES `usuario` (`usu_codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `aprendizxficha`
--
ALTER TABLE `aprendizxficha`
  ADD CONSTRAINT `aprendizxficha_ibfk_1` FOREIGN KEY (`id_ficha`) REFERENCES `ficha` (`id_ficha`) ON UPDATE CASCADE,
  ADD CONSTRAINT `aprendizxficha_ibfk_2` FOREIGN KEY (`id_aprendiz`) REFERENCES `aprendiz` (`id_apre`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_act`) ON UPDATE CASCADE,
  ADD CONSTRAINT `asistencia_ibfk_2` FOREIGN KEY (`id_apren`) REFERENCES `aprendiz` (`id_apre`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD CONSTRAINT `ficha_ibfk_1` FOREIGN KEY (`id_jor`) REFERENCES `jornada` (`id_jor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`usu_codigo`) REFERENCES `usuario` (`usu_codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `instructor_ficha`
--
ALTER TABLE `instructor_ficha`
  ADD CONSTRAINT `instructor_ficha_ibfk_1` FOREIGN KEY (`id_ins`) REFERENCES `instructor` (`id_ins`) ON UPDATE CASCADE,
  ADD CONSTRAINT `instructor_ficha_ibfk_2` FOREIGN KEY (`id_ficha`) REFERENCES `ficha` (`id_ficha`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol_id` (`rol_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`ciu_codigo`) REFERENCES `ciudad` (`ciu_codigo`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
