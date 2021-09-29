-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-09-2021 a las 04:22:22
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `smart`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alertas`
--

CREATE TABLE `alertas` (
  `idalertas` int(11) NOT NULL,
  `rut` int(11) NOT NULL,
  `idsensor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invernaderos`
--

CREATE TABLE `invernaderos` (
  `idinvernaderos` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `ubicacion` varchar(45) NOT NULL,
  `rut` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `rut` int(11) NOT NULL,
  `dv` varchar(1) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `celular` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `direccionActual` varchar(45) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `FechaModificacion` date NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`rut`, `dv`, `nombres`, `apellidos`, `fechaNacimiento`, `celular`, `telefono`, `correo`, `direccionActual`, `fechaCreacion`, `FechaModificacion`, `estado`) VALUES
(1, '', 'Alejandro', 'Galicia', '0000-00-00', '99999', '99999', 'asd@asd.cl', 'mi casa 123', '0000-00-00', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros_monitorio`
--

CREATE TABLE `registros_monitorio` (
  `idregistros_monitorio` int(11) NOT NULL,
  `idsensores` int(11) NOT NULL,
  `idtipo_registro` int(11) NOT NULL,
  `registros_monitoriocol` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idroles` int(11) NOT NULL,
  `rol` varchar(45) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `fechaModificacion` date NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idroles`, `rol`, `fechaCreacion`, `fechaModificacion`, `estado`) VALUES
(1, 'Administrador General', '2000-05-05', '0000-00-00', 1),
(2, 'Supervisor General', '2000-05-05', '2000-05-05', 1),
(3, 'Agronomo', '2021-05-05', '2021-07-09', 1),
(4, 'Tecnico', '2021-07-09', '2021-07-09', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sensores`
--

CREATE TABLE `sensores` (
  `idsensores` int(11) NOT NULL,
  `idtipos_sensores` int(11) NOT NULL,
  `idinvernadero` int(11) NOT NULL,
  `nombresensor` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_registros`
--

CREATE TABLE `tipos_registros` (
  `idtipos_registros` int(11) NOT NULL,
  `ipo_registrosco` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_sensores`
--

CREATE TABLE `tipos_sensores` (
  `idtipos_sensores` int(11) NOT NULL,
  `tiposensor` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuarios` int(11) NOT NULL,
  `fk_rut` int(11) NOT NULL,
  `idrol` int(11) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuarios`, `fk_rut`, `idrol`, `clave`, `estado`) VALUES
(1, 1, 1, '1', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alertas`
--
ALTER TABLE `alertas`
  ADD PRIMARY KEY (`idalertas`),
  ADD KEY `fkAlertaRut_idx` (`rut`),
  ADD KEY `fkAlertaSensor_idx` (`idsensor`);

--
-- Indices de la tabla `invernaderos`
--
ALTER TABLE `invernaderos`
  ADD PRIMARY KEY (`idinvernaderos`),
  ADD KEY `fkinveRut_idx` (`rut`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`rut`),
  ADD UNIQUE KEY `rut_UNIQUE` (`rut`);

--
-- Indices de la tabla `registros_monitorio`
--
ALTER TABLE `registros_monitorio`
  ADD PRIMARY KEY (`idregistros_monitorio`),
  ADD KEY `fkRegistroSensor_idx` (`idsensores`),
  ADD KEY `fkRegistroTipo_idx` (`idtipo_registro`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idroles`);

--
-- Indices de la tabla `sensores`
--
ALTER TABLE `sensores`
  ADD PRIMARY KEY (`idsensores`),
  ADD KEY `fkSensoreTipo_idx` (`idtipos_sensores`),
  ADD KEY `fkSensorInvernadero_idx` (`idinvernadero`);

--
-- Indices de la tabla `tipos_registros`
--
ALTER TABLE `tipos_registros`
  ADD PRIMARY KEY (`idtipos_registros`);

--
-- Indices de la tabla `tipos_sensores`
--
ALTER TABLE `tipos_sensores`
  ADD PRIMARY KEY (`idtipos_sensores`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuarios`),
  ADD KEY `fk_user_rol_idx` (`idrol`),
  ADD KEY `fk_user_personas_idx` (`fk_rut`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alertas`
--
ALTER TABLE `alertas`
  MODIFY `idalertas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registros_monitorio`
--
ALTER TABLE `registros_monitorio`
  MODIFY `idregistros_monitorio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idroles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sensores`
--
ALTER TABLE `sensores`
  MODIFY `idsensores` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_registros`
--
ALTER TABLE `tipos_registros`
  MODIFY `idtipos_registros` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alertas`
--
ALTER TABLE `alertas`
  ADD CONSTRAINT `fkAlertaRut` FOREIGN KEY (`rut`) REFERENCES `personas` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkAlertaSensor` FOREIGN KEY (`idsensor`) REFERENCES `sensores` (`idsensores`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `invernaderos`
--
ALTER TABLE `invernaderos`
  ADD CONSTRAINT `fkinveRut` FOREIGN KEY (`rut`) REFERENCES `personas` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registros_monitorio`
--
ALTER TABLE `registros_monitorio`
  ADD CONSTRAINT `fkRegistroRensor` FOREIGN KEY (`idsensores`) REFERENCES `sensores` (`idsensores`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkRegistroTipo` FOREIGN KEY (`idtipo_registro`) REFERENCES `tipos_registros` (`idtipos_registros`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sensores`
--
ALTER TABLE `sensores`
  ADD CONSTRAINT `fkSensorInvernadero` FOREIGN KEY (`idinvernadero`) REFERENCES `invernaderos` (`idinvernaderos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkSensoreTipo` FOREIGN KEY (`idtipos_sensores`) REFERENCES `tipos_sensores` (`idtipos_sensores`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_user_personas` FOREIGN KEY (`fk_rut`) REFERENCES `personas` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_rol` FOREIGN KEY (`idrol`) REFERENCES `roles` (`idroles`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
