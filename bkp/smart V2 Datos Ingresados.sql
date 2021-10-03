-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-10-2021 a las 01:06:46
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
  `id_alertas` int(11) NOT NULL,
  `id_sensor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invernaderos`
--

CREATE TABLE `invernaderos` (
  `id_invernadero` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `ubicacion` varchar(45) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_modificacion` date NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `invernaderos`
--

INSERT INTO `invernaderos` (`id_invernadero`, `nombre`, `ubicacion`, `fecha_creacion`, `fecha_modificacion`, `estado`) VALUES
(1, 'Mapocho 01', 'Republica 290', '2005-05-05', '2005-05-05', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invernaderos_plantas`
--

CREATE TABLE `invernaderos_plantas` (
  `id_invernaderos_plantas` int(11) NOT NULL,
  `id_plantas` int(11) NOT NULL,
  `id_invernaderos` int(11) NOT NULL,
  `fercha_creacion` date NOT NULL,
  `fecha_modificacion` date NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `invernaderos_plantas`
--

INSERT INTO `invernaderos_plantas` (`id_invernaderos_plantas`, `id_plantas`, `id_invernaderos`, `fercha_creacion`, `fecha_modificacion`, `estado`) VALUES
(1, 1, 1, '2001-01-01', '2005-05-05', 1);

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
(1, '6', 'Alejandro', 'Galicia', '0000-00-00', '99999', '99999', 'asd@asd.cl', 'mi casa 123', '0000-00-00', '0000-00-00', 1),
(2, '2', 'Patricio', 'Tamayo', '2009-09-09', '222', '222', 'asd@asd.com', '1231 ', '2005-05-05', '2005-05-05', 1),
(3, '3', 'Nicolas', 'Ramirez', '1990-10-10', '123', '123', '123@123.com', '123', '0000-00-00', '0000-00-00', 1),
(4, '4', 'Jordan', 'Concha', '0000-00-00', '123', '444', '444@asd.cl', '1231 1', '2012-12-12', '2012-12-12', 1),
(5, '5', 'Dios del Olimpo', 'Zeus', '2005-05-05', '123123', '123123', '123@as.cl', 'asda', '2005-05-05', '2005-05-05', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas_invernaderos`
--

CREATE TABLE `personas_invernaderos` (
  `id_personas_invernaderos` int(11) NOT NULL,
  `id_personas` int(11) NOT NULL,
  `id_invernaderos` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_modificacion` date NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantas`
--

CREATE TABLE `plantas` (
  `id_plantas` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `temperatura` varchar(45) NOT NULL,
  `humedad` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plantas`
--

INSERT INTO `plantas` (`id_plantas`, `nombre`, `temperatura`, `humedad`, `estado`) VALUES
(1, 'Zapallo Italiano', '17', '45', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros_monitoreo`
--

CREATE TABLE `registros_monitoreo` (
  `id_registros_monitoreo` int(11) NOT NULL,
  `id_sensores` int(11) NOT NULL,
  `id_tipo_registro` int(11) NOT NULL,
  `registros_monitorio` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registros_monitoreo`
--

INSERT INTO `registros_monitoreo` (`id_registros_monitoreo`, `id_sensores`, `id_tipo_registro`, `registros_monitorio`, `fecha`, `hora`, `estado`) VALUES
(3, 1, 1, 'Tarjeta UNO', '2005-05-05', '05:05:05', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_roles` int(11) NOT NULL,
  `rol` varchar(45) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `fechaModificacion` date NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_roles`, `rol`, `fechaCreacion`, `fechaModificacion`, `estado`) VALUES
(1, 'Administrador General', '2000-05-05', '0000-00-00', 1),
(2, 'Supervisor General', '2000-05-05', '2000-05-05', 1),
(3, 'Agronomo', '2021-05-05', '2021-07-09', 1),
(4, 'Tecnico', '2021-07-09', '2021-07-09', 1),
(5, 'Ejecutivo', '2005-05-05', '2005-05-05', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sensores`
--

CREATE TABLE `sensores` (
  `id_sensores` int(11) NOT NULL,
  `id_tipos_sensores` int(11) NOT NULL,
  `nombre_sensor` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sensores`
--

INSERT INTO `sensores` (`id_sensores`, `id_tipos_sensores`, `nombre_sensor`, `estado`) VALUES
(1, 1, 'Placa Uno', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sensores_invernaderos`
--

CREATE TABLE `sensores_invernaderos` (
  `id_sensores_invernaderos` int(11) NOT NULL,
  `id_invernadero` int(11) NOT NULL,
  `id_sensor` int(11) NOT NULL,
  `fercha_freacion` date NOT NULL,
  `fecha_modificacion` date NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_registros`
--

CREATE TABLE `tipos_registros` (
  `id_tipos_registros` int(11) NOT NULL,
  `tipo_registrosco` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipos_registros`
--

INSERT INTO `tipos_registros` (`id_tipos_registros`, `tipo_registrosco`, `estado`) VALUES
(1, 'Control', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_sensores`
--

CREATE TABLE `tipos_sensores` (
  `id_tipos_sensores` int(11) NOT NULL,
  `tipo_sensor` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipos_sensores`
--

INSERT INTO `tipos_sensores` (`id_tipos_sensores`, `tipo_sensor`, `estado`) VALUES
(1, 'Suelo', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `rut` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `rut`, `id_rol`, `clave`, `estado`) VALUES
(1, 1, 1, '1', 1),
(2, 2, 2, '2', 1),
(3, 3, 3, '3', 1),
(4, 4, 4, '4', 1),
(5, 5, 5, '5', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alertas`
--
ALTER TABLE `alertas`
  ADD PRIMARY KEY (`id_alertas`),
  ADD KEY `fkAlertaSensor_idx` (`id_sensor`);

--
-- Indices de la tabla `invernaderos`
--
ALTER TABLE `invernaderos`
  ADD PRIMARY KEY (`id_invernadero`);

--
-- Indices de la tabla `invernaderos_plantas`
--
ALTER TABLE `invernaderos_plantas`
  ADD PRIMARY KEY (`id_invernaderos_plantas`),
  ADD KEY `fk_plantas_idx` (`id_plantas`),
  ADD KEY `fk_invernaderos_idx` (`id_invernaderos`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`rut`),
  ADD UNIQUE KEY `rut_UNIQUE` (`rut`);

--
-- Indices de la tabla `personas_invernaderos`
--
ALTER TABLE `personas_invernaderos`
  ADD PRIMARY KEY (`id_personas_invernaderos`),
  ADD KEY `fk_personas_idx` (`id_personas`),
  ADD KEY `fk_invernaderos_idx` (`id_invernaderos`);

--
-- Indices de la tabla `plantas`
--
ALTER TABLE `plantas`
  ADD PRIMARY KEY (`id_plantas`);

--
-- Indices de la tabla `registros_monitoreo`
--
ALTER TABLE `registros_monitoreo`
  ADD PRIMARY KEY (`id_registros_monitoreo`),
  ADD KEY `fkRegistroSensor_idx` (`id_sensores`),
  ADD KEY `fkRegistroTipo_idx` (`id_tipo_registro`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_roles`);

--
-- Indices de la tabla `sensores`
--
ALTER TABLE `sensores`
  ADD PRIMARY KEY (`id_sensores`),
  ADD KEY `fkSensoreTipo_idx` (`id_tipos_sensores`);

--
-- Indices de la tabla `sensores_invernaderos`
--
ALTER TABLE `sensores_invernaderos`
  ADD PRIMARY KEY (`id_sensores_invernaderos`),
  ADD KEY `fk_invernadero_sensor_idx` (`id_invernadero`),
  ADD KEY `fk_sensor_sensor_idx` (`id_sensor`);

--
-- Indices de la tabla `tipos_registros`
--
ALTER TABLE `tipos_registros`
  ADD PRIMARY KEY (`id_tipos_registros`);

--
-- Indices de la tabla `tipos_sensores`
--
ALTER TABLE `tipos_sensores`
  ADD PRIMARY KEY (`id_tipos_sensores`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`),
  ADD KEY `fk_user_rol_idx` (`id_rol`),
  ADD KEY `fk_user_personas_idx` (`rut`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alertas`
--
ALTER TABLE `alertas`
  MODIFY `id_alertas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `invernaderos`
--
ALTER TABLE `invernaderos`
  MODIFY `id_invernadero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `invernaderos_plantas`
--
ALTER TABLE `invernaderos_plantas`
  MODIFY `id_invernaderos_plantas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `personas_invernaderos`
--
ALTER TABLE `personas_invernaderos`
  MODIFY `id_personas_invernaderos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plantas`
--
ALTER TABLE `plantas`
  MODIFY `id_plantas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `registros_monitoreo`
--
ALTER TABLE `registros_monitoreo`
  MODIFY `id_registros_monitoreo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_roles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sensores`
--
ALTER TABLE `sensores`
  MODIFY `id_sensores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sensores_invernaderos`
--
ALTER TABLE `sensores_invernaderos`
  MODIFY `id_sensores_invernaderos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_registros`
--
ALTER TABLE `tipos_registros`
  MODIFY `id_tipos_registros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipos_sensores`
--
ALTER TABLE `tipos_sensores`
  MODIFY `id_tipos_sensores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alertas`
--
ALTER TABLE `alertas`
  ADD CONSTRAINT `fk_alerta_sensor` FOREIGN KEY (`id_sensor`) REFERENCES `sensores` (`id_sensores`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `invernaderos_plantas`
--
ALTER TABLE `invernaderos_plantas`
  ADD CONSTRAINT `fk_invernaderos_` FOREIGN KEY (`id_invernaderos`) REFERENCES `invernaderos` (`id_invernadero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_plantas` FOREIGN KEY (`id_plantas`) REFERENCES `plantas` (`id_plantas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `personas_invernaderos`
--
ALTER TABLE `personas_invernaderos`
  ADD CONSTRAINT `fk_invernaderos` FOREIGN KEY (`id_invernaderos`) REFERENCES `invernaderos` (`id_invernadero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personas` FOREIGN KEY (`id_personas`) REFERENCES `personas` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registros_monitoreo`
--
ALTER TABLE `registros_monitoreo`
  ADD CONSTRAINT `fk_RegistroRensor` FOREIGN KEY (`id_sensores`) REFERENCES `sensores` (`id_sensores`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_RegistroTipo` FOREIGN KEY (`id_tipo_registro`) REFERENCES `tipos_registros` (`id_tipos_registros`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sensores`
--
ALTER TABLE `sensores`
  ADD CONSTRAINT `fk_SensoreTipo` FOREIGN KEY (`id_tipos_sensores`) REFERENCES `tipos_sensores` (`id_tipos_sensores`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sensores_invernaderos`
--
ALTER TABLE `sensores_invernaderos`
  ADD CONSTRAINT `fk_invernadero_sensor` FOREIGN KEY (`id_invernadero`) REFERENCES `invernaderos` (`id_invernadero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sensor_sensor` FOREIGN KEY (`id_sensor`) REFERENCES `sensores` (`id_sensores`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_user_personas` FOREIGN KEY (`rut`) REFERENCES `personas` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_roles`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
