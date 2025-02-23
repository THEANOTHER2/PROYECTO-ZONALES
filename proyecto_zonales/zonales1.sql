-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-08-2018 a las 23:20:08
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `zonales1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canto`
--

CREATE TABLE IF NOT EXISTS `canto` (
  `id` int(11) NOT NULL,
  `vocalizacion` float(11,1) NOT NULL,
  `puesta_en_escena` float(11,1) NOT NULL,
  `total` float(11,2) NOT NULL,
  `id_regional` int(11) NOT NULL,
  `id_jurado` int(11) NOT NULL,
  `ritmo_entonacion_y_medida` float(11,1) NOT NULL,
  `calidad_interpretativa` float(11,1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `canto`
--

INSERT INTO `canto` (`id`, `vocalizacion`, `puesta_en_escena`, `total`, `id_regional`, `id_jurado`, `ritmo_entonacion_y_medida`, `calidad_interpretativa`) VALUES
(5, 9.0, 6.9, 6.80, 2, 123, 3.4, 4.3),
(6, 5.6, 2.3, 5.13, 5, 123, 3.4, 4.5),
(7, 2.0, 7.5, 4.07, 1, 1006129762, 3.4, 2.1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenteria`
--

CREATE TABLE IF NOT EXISTS `cuenteria` (
  `id` int(11) NOT NULL,
  `fluidez_verbal` float(11,1) NOT NULL,
  `coherencia` float(11,1) NOT NULL,
  `argumento` float(11,1) NOT NULL,
  `impacto_al_publico` float(11,1) NOT NULL,
  `creatividad` float(11,1) NOT NULL,
  `total` float(11,2) NOT NULL,
  `id_regional` int(11) NOT NULL,
  `id_jurado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuenteria`
--

INSERT INTO `cuenteria` (`id`, `fluidez_verbal`, `coherencia`, `argumento`, `impacto_al_publico`, `creatividad`, `total`, `id_regional`, `id_jurado`) VALUES
(1, 9.9, 9.8, 9.7, 9.6, 9.5, 9.71, 3, 1006129762),
(2, 6.0, 7.0, 8.0, 4.0, 8.8, 6.66, 1, 123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `danza_folclórica`
--

CREATE TABLE IF NOT EXISTS `danza_folclórica` (
  `id` int(11) NOT NULL,
  `calidad_interpretativa` float(11,1) NOT NULL,
  `composicion_coreografia` float(11,1) NOT NULL,
  `esamble_y_sincronizacion` float(11,1) NOT NULL,
  `vestuario` float(11,1) NOT NULL,
  `investigacion` float(11,1) NOT NULL,
  `total` float(11,2) NOT NULL,
  `id_regional` int(11) NOT NULL,
  `id_jurado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `danza_folclórica`
--

INSERT INTO `danza_folclórica` (`id`, `calidad_interpretativa`, `composicion_coreografia`, `esamble_y_sincronizacion`, `vestuario`, `investigacion`, `total`, `id_regional`, `id_jurado`) VALUES
(1, 6.9, 9.6, 2.4, 4.2, 1.0, 5.55, 3, 1006129762),
(9, 7.0, 7.0, 7.0, 7.0, 7.0, 7.00, 4, 1006129762),
(11, 4.0, 4.0, 4.0, 4.0, 4.0, 4.00, 1, 1006129762),
(12, 2.4, 2.4, 2.4, 2.4, 2.4, 2.40, 2, 1006129762),
(14, 9.0, 9.0, 9.0, 9.0, 9.0, 9.00, 5, 1006129762),
(15, 9.0, 1.0, 2.0, 4.0, 7.8, 4.68, 1, 123),
(16, 8.0, 9.0, 8.0, 10.0, 7.0, 8.30, 1, 12345);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `danza_moderna`
--

CREATE TABLE IF NOT EXISTS `danza_moderna` (
  `id` int(11) NOT NULL,
  `calidad_interpretativa` float(11,1) NOT NULL,
  `composicion_coreografia` float(11,1) NOT NULL,
  `esamble_y_sincronizacion` float(11,1) NOT NULL,
  `vestuario` float(11,1) NOT NULL,
  `investigacion` float(11,1) NOT NULL,
  `total` float(11,2) NOT NULL,
  `id_regional` int(11) NOT NULL,
  `id_jurado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `danza_moderna`
--

INSERT INTO `danza_moderna` (`id`, `calidad_interpretativa`, `composicion_coreografia`, `esamble_y_sincronizacion`, `vestuario`, `investigacion`, `total`, `id_regional`, `id_jurado`) VALUES
(1, 5.0, 6.2, 6.3, 6.4, 7.0, 5.97, 1, 123),
(2, 5.6, 7.6, 4.3, 8.9, 6.6, 6.04, 3, 1006129762),
(4, 6.1, 5.4, 3.0, 6.0, 7.6, 5.17, 1, 1006129762);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jurado`
--

CREATE TABLE IF NOT EXISTS `jurado` (
  `n°_documento` int(11) NOT NULL,
  `tipo_de_documento` varchar(2) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `especialidad` varchar(40) NOT NULL,
  `contraseña` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jurado`
--

INSERT INTO `jurado` (`n°_documento`, `tipo_de_documento`, `nombre`, `apellido`, `especialidad`, `contraseña`) VALUES
(123, 'CC', 'Yo', ':V', 'Memes', 'Ella'),
(12345, 'CC', 'Santiago', 'Vergara', 'Hacer nada', 'qw'),
(1006129762, 'CC', 'David', 'Mahecha', 'Player', 'XD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regional`
--

CREATE TABLE IF NOT EXISTS `regional` (
  `id_regional` int(10) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `regional`
--

INSERT INTO `regional` (`id_regional`, `nombre`) VALUES
(1, 'Antioquia'),
(2, 'Risaralda'),
(3, 'Caldas'),
(4, 'Huila'),
(5, 'Tolima');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teatro`
--

CREATE TABLE IF NOT EXISTS `teatro` (
  `id` int(11) NOT NULL,
  `escenografia` float(11,1) NOT NULL,
  `caracterizacion_de_los_personajes` float(11,1) NOT NULL,
  `expresion_corporal` float(11,1) NOT NULL,
  `puesta_en_escena` float(11,1) NOT NULL,
  `vestuario_y_maquillaje` float(11,1) NOT NULL,
  `impacto` float(11,1) NOT NULL,
  `total` float(11,2) NOT NULL,
  `id_regional` int(11) NOT NULL,
  `id_jurado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `teatro`
--

INSERT INTO `teatro` (`id`, `escenografia`, `caracterizacion_de_los_personajes`, `expresion_corporal`, `puesta_en_escena`, `vestuario_y_maquillaje`, `impacto`, `total`, `id_regional`, `id_jurado`) VALUES
(1, 5.1, 5.2, 5.3, 5.4, 5.5, 5.6, 5.35, 5, 1006129762),
(2, 6.0, 7.0, 6.0, 7.0, 8.0, 8.9, 7.08, 4, 123);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `canto`
--
ALTER TABLE `canto`
  ADD PRIMARY KEY (`id`), ADD KEY `id_regional` (`id_regional`), ADD KEY `id_jurado` (`id_jurado`);

--
-- Indices de la tabla `cuenteria`
--
ALTER TABLE `cuenteria`
  ADD PRIMARY KEY (`id`), ADD KEY `id_regional` (`id_regional`), ADD KEY `id_jurado` (`id_jurado`);

--
-- Indices de la tabla `danza_folclórica`
--
ALTER TABLE `danza_folclórica`
  ADD PRIMARY KEY (`id`), ADD KEY `id_regional` (`id_regional`), ADD KEY `id_jurado` (`id_jurado`);

--
-- Indices de la tabla `danza_moderna`
--
ALTER TABLE `danza_moderna`
  ADD PRIMARY KEY (`id`), ADD KEY `id_regional` (`id_regional`), ADD KEY `id_jurado` (`id_jurado`);

--
-- Indices de la tabla `jurado`
--
ALTER TABLE `jurado`
  ADD PRIMARY KEY (`n°_documento`);

--
-- Indices de la tabla `regional`
--
ALTER TABLE `regional`
  ADD PRIMARY KEY (`id_regional`);

--
-- Indices de la tabla `teatro`
--
ALTER TABLE `teatro`
  ADD PRIMARY KEY (`id`), ADD KEY `id_regional` (`id_regional`), ADD KEY `id_jurado` (`id_jurado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `canto`
--
ALTER TABLE `canto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `cuenteria`
--
ALTER TABLE `cuenteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `danza_folclórica`
--
ALTER TABLE `danza_folclórica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `danza_moderna`
--
ALTER TABLE `danza_moderna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `teatro`
--
ALTER TABLE `teatro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `canto`
--
ALTER TABLE `canto`
ADD CONSTRAINT `canto_ibfk_1` FOREIGN KEY (`id_regional`) REFERENCES `regional` (`id_regional`),
ADD CONSTRAINT `canto_ibfk_2` FOREIGN KEY (`id_jurado`) REFERENCES `jurado` (`n°_documento`);

--
-- Filtros para la tabla `cuenteria`
--
ALTER TABLE `cuenteria`
ADD CONSTRAINT `cuenteria_ibfk_1` FOREIGN KEY (`id_regional`) REFERENCES `regional` (`id_regional`),
ADD CONSTRAINT `cuenteria_ibfk_2` FOREIGN KEY (`id_jurado`) REFERENCES `jurado` (`n°_documento`);

--
-- Filtros para la tabla `danza_folclórica`
--
ALTER TABLE `danza_folclórica`
ADD CONSTRAINT `danza_folclórica_ibfk_1` FOREIGN KEY (`id_regional`) REFERENCES `regional` (`id_regional`),
ADD CONSTRAINT `danza_folclórica_ibfk_2` FOREIGN KEY (`id_jurado`) REFERENCES `jurado` (`n°_documento`);

--
-- Filtros para la tabla `danza_moderna`
--
ALTER TABLE `danza_moderna`
ADD CONSTRAINT `danza_moderna_ibfk_1` FOREIGN KEY (`id_regional`) REFERENCES `regional` (`id_regional`),
ADD CONSTRAINT `danza_moderna_ibfk_2` FOREIGN KEY (`id_jurado`) REFERENCES `jurado` (`n°_documento`);

--
-- Filtros para la tabla `teatro`
--
ALTER TABLE `teatro`
ADD CONSTRAINT `teatro_ibfk_1` FOREIGN KEY (`id_regional`) REFERENCES `regional` (`id_regional`),
ADD CONSTRAINT `teatro_ibfk_2` FOREIGN KEY (`id_jurado`) REFERENCES `jurado` (`n°_documento`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
