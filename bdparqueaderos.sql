-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-09-2019 a las 23:46:58
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdparqueaderos`
--
CREATE DATABASE IF NOT EXISTS `bdparqueaderos` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bdparqueaderos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_capacidades`
--

CREATE TABLE `tbl_capacidades` (
  `id` int(11) NOT NULL,
  `parqueadero_id` int(11) DEFAULT NULL,
  `tipoVehiculo_id` int(11) DEFAULT NULL,
  `cupos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_convenios`
--

CREATE TABLE `tbl_convenios` (
  `id` int(11) NOT NULL,
  `empresa_id` int(11) DEFAULT NULL,
  `parqueadero_id` int(11) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empresas`
--

CREATE TABLE `tbl_empresas` (
  `id` int(11) NOT NULL,
  `nit` varchar(45) DEFAULT NULL,
  `razonSocial` varchar(100) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_horarios`
--

CREATE TABLE `tbl_horarios` (
  `id` int(11) NOT NULL,
  `parqueadero_id` int(11) DEFAULT NULL,
  `diasemana` enum('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado') DEFAULT NULL,
  `horaI` time DEFAULT NULL,
  `horaF` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_parqueaderos`
--

CREATE TABLE `tbl_parqueaderos` (
  `id` int(11) NOT NULL,
  `CodigoCamaraComercio` int(11) DEFAULT NULL,
  `RazonSocial` varchar(45) DEFAULT NULL,
  `TELEFONO` int(11) DEFAULT NULL,
  `DIRECCION` varchar(45) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `UbicacionLat` varchar(100) DEFAULT NULL,
  `UbicacionLon` varchar(100) DEFAULT NULL,
  `Foto` longblob,
  `Descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_parqueaderos`
--

INSERT INTO `tbl_parqueaderos` (`id`, `CodigoCamaraComercio`, `RazonSocial`, `TELEFONO`, `DIRECCION`, `usuario_id`, `UbicacionLat`, `UbicacionLon`, `Foto`, `Descripcion`) VALUES
(1, 314125, 'PARQUEADERO 1', 325255, 'cll falsa 1 2 3', 1, '9.300805', '-75.397397', NULL, NULL),
(2, 232376, 'SATELITE', 852837, 'cll falsa 1 2 3 ', 1, '9.300805', '-75.387497', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_registros`
--

CREATE TABLE `tbl_registros` (
  `id` int(11) NOT NULL,
  `numeroVenta` int(11) NOT NULL,
  `fechaHoraIngreso` datetime DEFAULT NULL,
  `NoCupo` int(11) DEFAULT NULL,
  `fechaHoraSalida` datetime DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `tarifa_id` int(11) DEFAULT NULL,
  `precioTarifa` double DEFAULT NULL,
  `calificacion` int(11) DEFAULT NULL,
  `comentario` text,
  `convenio_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reserva`
--

CREATE TABLE `tbl_reserva` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `parqueadero_id` int(11) DEFAULT NULL,
  `fechaHoraReserva` datetime DEFAULT NULL,
  `tiempoLlegada` int(11) DEFAULT NULL,
  `tipovehiculo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tarifas`
--

CREATE TABLE `tbl_tarifas` (
  `id` int(11) NOT NULL,
  `parqueadero_id` int(11) DEFAULT NULL,
  `tipoTiempo` enum('Parcial','Hora','Dia','Unico','Mensual') DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `tipoVehiculo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipovehiculos`
--

CREATE TABLE `tbl_tipovehiculos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id` int(11) NOT NULL,
  `CEDULA` int(11) NOT NULL,
  `NOMBRE` varchar(45) DEFAULT NULL,
  `APELLIDO` varchar(45) DEFAULT NULL,
  `TELEFONO` int(11) DEFAULT NULL,
  `CORREO` varchar(100) DEFAULT NULL,
  `GENERO` enum('Masculino','Femenino') DEFAULT NULL,
  `FNACIMIENTO` date DEFAULT NULL,
  `CONTRASEÑA` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id`, `CEDULA`, `NOMBRE`, `APELLIDO`, `TELEFONO`, `CORREO`, `GENERO`, `FNACIMIENTO`, `CONTRASEÑA`) VALUES
(1, 421515, 'MARIA ', 'RAMOS ORTEGA', 252532, 'example@gmail.com', 'Masculino', '1998-01-01', '356a192b7913b04c54574d18c28d46e6395428ab');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_capacidades`
--
ALTER TABLE `tbl_capacidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_capacidad_parqueadero_idx` (`parqueadero_id`),
  ADD KEY `fk_capacidad_tipoVehiculo_idx` (`tipoVehiculo_id`);

--
-- Indices de la tabla `tbl_convenios`
--
ALTER TABLE `tbl_convenios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_convenio_empresa_idx` (`empresa_id`),
  ADD KEY `fk_convenio_parqueadero_idx` (`parqueadero_id`);

--
-- Indices de la tabla `tbl_empresas`
--
ALTER TABLE `tbl_empresas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nit_UNIQUE` (`nit`);

--
-- Indices de la tabla `tbl_horarios`
--
ALTER TABLE `tbl_horarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_horario_parqueadero_idx` (`parqueadero_id`);

--
-- Indices de la tabla `tbl_parqueaderos`
--
ALTER TABLE `tbl_parqueaderos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_parqueadero_usuario_idx` (`usuario_id`);

--
-- Indices de la tabla `tbl_registros`
--
ALTER TABLE `tbl_registros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_registro_usuario_idx` (`usuario_id`),
  ADD KEY `fk_registro_tarifa_idx` (`tarifa_id`),
  ADD KEY `fk_registro_convenio_idx` (`convenio_id`);

--
-- Indices de la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reserva_usuario_idx` (`usuario_id`),
  ADD KEY `fk_reserva_parqueadero_idx` (`parqueadero_id`),
  ADD KEY `fk_reserva_tipoVehiculo_idx` (`tipovehiculo_id`);

--
-- Indices de la tabla `tbl_tarifas`
--
ALTER TABLE `tbl_tarifas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tarifa_parqueadero_idx` (`parqueadero_id`),
  ADD KEY `fk_tarifa_tipoVehiculo_idx` (`tipoVehiculo_id`);

--
-- Indices de la tabla `tbl_tipovehiculos`
--
ALTER TABLE `tbl_tipovehiculos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CORREO_UNIQUE` (`CORREO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_capacidades`
--
ALTER TABLE `tbl_capacidades`
  ADD CONSTRAINT `fk_capacidad_parqueadero` FOREIGN KEY (`parqueadero_id`) REFERENCES `tbl_parqueaderos` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_capacidad_tipoVehiculo` FOREIGN KEY (`tipoVehiculo_id`) REFERENCES `tbl_tipovehiculos` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_convenios`
--
ALTER TABLE `tbl_convenios`
  ADD CONSTRAINT `fk_convenio_empresa` FOREIGN KEY (`empresa_id`) REFERENCES `tbl_empresas` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_convenio_parqueadero` FOREIGN KEY (`parqueadero_id`) REFERENCES `tbl_parqueaderos` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_horarios`
--
ALTER TABLE `tbl_horarios`
  ADD CONSTRAINT `fk_horario_parqueadero` FOREIGN KEY (`parqueadero_id`) REFERENCES `tbl_parqueaderos` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_parqueaderos`
--
ALTER TABLE `tbl_parqueaderos`
  ADD CONSTRAINT `fk_parqueadero_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `tbl_usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_registros`
--
ALTER TABLE `tbl_registros`
  ADD CONSTRAINT `fk_registro_convenio` FOREIGN KEY (`convenio_id`) REFERENCES `tbl_convenios` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_registro_tarifa` FOREIGN KEY (`tarifa_id`) REFERENCES `tbl_tarifas` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_registro_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `tbl_usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  ADD CONSTRAINT `fk_reserva_parqueadero` FOREIGN KEY (`parqueadero_id`) REFERENCES `tbl_parqueaderos` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reserva_tipoVehiculo` FOREIGN KEY (`tipovehiculo_id`) REFERENCES `tbl_tipovehiculos` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reserva_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `tbl_usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_tarifas`
--
ALTER TABLE `tbl_tarifas`
  ADD CONSTRAINT `fk_tarifa_parqueadero` FOREIGN KEY (`parqueadero_id`) REFERENCES `tbl_parqueaderos` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tarifa_tipoVehiculo` FOREIGN KEY (`tipoVehiculo_id`) REFERENCES `tbl_tipovehiculos` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
