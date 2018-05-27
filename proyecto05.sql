-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2018 a las 05:21:23
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto05`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriaherramienta`
--

CREATE TABLE `categoriaherramienta` (
  `idCategoriaHerramienta` int(11) NOT NULL,
  `categoria` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoriaherramienta`
--

INSERT INTO `categoriaherramienta` (`idCategoriaHerramienta`, `categoria`) VALUES
(1, 'Jardineria'),
(2, 'Carpinteia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `idDetalle` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fechaRegistro` date DEFAULT NULL,
  `fechaModificacion` date DEFAULT NULL,
  `fechaEliminacion` date DEFAULT NULL,
  `Prestamo_idPrestamo` int(11) NOT NULL,
  `Herramienta_idHerramienta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idEmpleado` int(11) NOT NULL,
  `dui` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `cargo` varchar(200) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `estadoEmpleado` int(11) DEFAULT NULL,
  `fechaRegistro` date DEFAULT NULL,
  `fechaModificacion` date DEFAULT NULL,
  `fechaEliminacion` date DEFAULT NULL,
  `Usuario_idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `dui`, `nombre`, `genero`, `cargo`, `telefono`, `estadoEmpleado`, `fechaRegistro`, `fechaModificacion`, `fechaEliminacion`, `Usuario_idUsuario`) VALUES
(1, '05422222-2', 'Juan Carlos', 'Masculino', 'Bodega', '2222-0997', 1, NULL, '2018-05-24', NULL, 1),
(2, '123213132', 'Carlos', 'Masculino', 'Jefe', '432221', 0, '2018-05-21', '2018-05-22', '2018-05-22', 2),
(3, '1323123', 'Alejandro', 'Masculino', 'Bodega', '312312-22', 1, '2018-05-22', '2018-05-24', '0000-00-00', 5),
(4, '23421342', 'walter', 'masculino', 'bodega', '5233', 1, '2018-05-24', '0000-00-00', '0000-00-00', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoherramienta`
--

CREATE TABLE `estadoherramienta` (
  `idEstadoHerramienta` int(11) NOT NULL,
  `estado` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estadoherramienta`
--

INSERT INTO `estadoherramienta` (`idEstadoHerramienta`, `estado`) VALUES
(1, 'Defectuosa'),
(2, 'Buen Estado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramienta`
--

CREATE TABLE `herramienta` (
  `idHerramienta` int(11) NOT NULL,
  `nombreHerramienta` varchar(200) NOT NULL,
  `estado` int(11) NOT NULL,
  `fechaRegistro` date DEFAULT NULL,
  `fechaModificacion` date DEFAULT NULL,
  `fechaEliminacion` date DEFAULT NULL,
  `categoriaHerramienta_idCategoriaHerramienta` int(11) NOT NULL,
  `estadoHerramienta_idEstadoHerramienta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `herramienta`
--

INSERT INTO `herramienta` (`idHerramienta`, `nombreHerramienta`, `estado`, `fechaRegistro`, `fechaModificacion`, `fechaEliminacion`, `categoriaHerramienta_idCategoriaHerramienta`, `estadoHerramienta_idEstadoHerramienta`) VALUES
(1, 'Jamon con patas', 1, NULL, NULL, NULL, 1, 1),
(4, 'martillo', 1, '2018-05-23', '0000-00-00', '0000-00-00', 1, 1),
(6, 'jamon', 1, '2018-05-23', '0000-00-00', '0000-00-00', 1, 1),
(7, 'serrucho', 1, '2018-05-24', '0000-00-00', '0000-00-00', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `idPrestamo` int(11) NOT NULL,
  `horaPrestamo` time NOT NULL,
  `fechaRegistro` datetime DEFAULT NULL,
  `fechaModificacion` date DEFAULT NULL,
  `fechaEliminacion` date DEFAULT NULL,
  `Empleado_idEmpleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `rol` varchar(200) DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `rol`, `estado`) VALUES
(1, 'ADMIN', 1),
(2, 'USUARIO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `salt` varchar(200) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `fechaRegistro` date DEFAULT NULL,
  `fechaModificacion` datetime DEFAULT NULL,
  `fechaEliminacion` date DEFAULT NULL,
  `Rol_idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombreUsuario`, `password`, `salt`, `estado`, `fechaRegistro`, `fechaModificacion`, `fechaEliminacion`, `Rol_idRol`) VALUES
(1, 'fdds', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'f6bcfd2fcde5c91c33ac9debdc1aaa9495ea9f69', 0, NULL, '2018-05-19 00:00:00', '2018-05-19', 1),
(2, 'Lolito', '123', '', 0, '0000-00-00', '2018-05-19 00:00:00', '2018-05-22', 1),
(3, 'juan3', 'b49a5780a99ea81284fc0746a78f84a30e4d5c73', '42638ba9dc6a38e3a1dec1f45ba04c951a882513', 0, '2018-05-19', '2018-05-19 00:00:00', '2018-05-22', 1),
(4, 'prueba', '22ea1c649c82946aa6e479e1ffd321e4a318b1b0', '2ea61dc244f12caabae7f8b401926eaf6822efdc', 0, '2018-05-19', '2018-05-19 00:00:00', '2018-05-19', 2),
(5, 'juan', 'b49a5780a99ea81284fc0746a78f84a30e4d5c73', '42638ba9dc6a38e3a1dec1f45ba04c951a882513', 1, '2018-05-19', '0000-00-00 00:00:00', '0000-00-00', 1),
(6, ' castro', 'b49a5780a99ea81284fc0746a78f84a30e4d5c73', '42638ba9dc6a38e3a1dec1f45ba04c951a882513', 1, '2018-05-22', '2018-05-22 00:00:00', '0000-00-00', 1),
(7, 'lo', 'b49a5780a99ea81284fc0746a78f84a30e4d5c73', '42638ba9dc6a38e3a1dec1f45ba04c951a882513', 1, '2018-05-22', '2018-05-22 18:28:52', '0000-00-00', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoriaherramienta`
--
ALTER TABLE `categoriaherramienta`
  ADD PRIMARY KEY (`idCategoriaHerramienta`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`idDetalle`),
  ADD KEY `fk_Detalle_Prestamo1_idx` (`Prestamo_idPrestamo`),
  ADD KEY `fk_Detalle_Herramienta1_idx` (`Herramienta_idHerramienta`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`),
  ADD KEY `fk_Empleado_Usuario1_idx` (`Usuario_idUsuario`);

--
-- Indices de la tabla `estadoherramienta`
--
ALTER TABLE `estadoherramienta`
  ADD PRIMARY KEY (`idEstadoHerramienta`);

--
-- Indices de la tabla `herramienta`
--
ALTER TABLE `herramienta`
  ADD PRIMARY KEY (`idHerramienta`),
  ADD KEY `fk_Herramienta_categoriaHerramienta1_idx` (`categoriaHerramienta_idCategoriaHerramienta`),
  ADD KEY `fk_Herramienta_estadoHerramienta1_idx` (`estadoHerramienta_idEstadoHerramienta`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`idPrestamo`),
  ADD KEY `fk_Prestamo_Empleado1_idx` (`Empleado_idEmpleado`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_Usuario_Rol_idx` (`Rol_idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoriaherramienta`
--
ALTER TABLE `categoriaherramienta`
  MODIFY `idCategoriaHerramienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `idDetalle` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `estadoherramienta`
--
ALTER TABLE `estadoherramienta`
  MODIFY `idEstadoHerramienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `herramienta`
--
ALTER TABLE `herramienta`
  MODIFY `idHerramienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `idPrestamo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `fk_Detalle_Herramienta1` FOREIGN KEY (`Herramienta_idHerramienta`) REFERENCES `herramienta` (`idHerramienta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Detalle_Prestamo1` FOREIGN KEY (`Prestamo_idPrestamo`) REFERENCES `prestamo` (`idPrestamo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_Empleado_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `herramienta`
--
ALTER TABLE `herramienta`
  ADD CONSTRAINT `fk_Herramienta_categoriaHerramienta1` FOREIGN KEY (`categoriaHerramienta_idCategoriaHerramienta`) REFERENCES `categoriaherramienta` (`idCategoriaHerramienta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Herramienta_estadoHerramienta1` FOREIGN KEY (`estadoHerramienta_idEstadoHerramienta`) REFERENCES `estadoherramienta` (`idEstadoHerramienta`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `fk_Prestamo_Empleado1` FOREIGN KEY (`Empleado_idEmpleado`) REFERENCES `empleado` (`idEmpleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Rol` FOREIGN KEY (`Rol_idRol`) REFERENCES `rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
