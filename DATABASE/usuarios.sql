-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2022 a las 15:04:45
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `usuarios`
--
CREATE DATABASE IF NOT EXISTS `usuarios` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `usuarios`;

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `registrar_usuario`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `registrar_usuario` (IN `Nombre` VARCHAR(100), IN `Apellido` VARCHAR(100), IN `Documento` INT(11), IN `Correo` VARCHAR(100), IN `Contraseña` VARCHAR(80), IN `IdRol` INT(11), IN `FechaRegistro` DATE)   begin 
insert into usuario(nombre,apellido, documento, correo, contraseña, idRol, fechaRegistro) VALUES 
(Nombre, Apellido, Documento, Correo, Contraseña, IdRol, FechaRegistro);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `cantidadusuariosadministrador`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `cantidadusuariosadministrador`;
CREATE TABLE `cantidadusuariosadministrador` (
`count(*)` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `cantidadusuariosstandar`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `cantidadusuariosstandar`;
CREATE TABLE `cantidadusuariosstandar` (
`count(*)` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombreRol` varchar(200) DEFAULT NULL,
  `descripcion` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombreRol`, `descripcion`) VALUES
(1, 'Administrador', 'gestiona todo el sistema'),
(2, 'estandar', 'usa el sistema');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `documento` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contraseña` varchar(80) NOT NULL,
  `idRol` int(11) DEFAULT NULL,
  `fechaRegistro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `documento`, `correo`, `contraseña`, `idRol`, `fechaRegistro`) VALUES
(1, 'Ivan', 'culma', 2332132, 'ivan@gmail.com', '$2y$10$oMf1tHGKVjGRdNIXUdMUVOaHHeA85sTCZbIH5exTl9L05uf3DDVNS', 1, '2022-10-26'),
(2, 'Roberto', 'Buendia', 1006149367, 'pandora@gami.com', '$2y$10$sdS4NRx.qDhNgEoPO3bkR.Ab6ZkkvUag.wEqB8fpEFFSFynbgrHKi', 2, '2022-10-26'),
(3, 'jose', 'perez', 2343433, 'jose@gmail.com', '$2y$10$VO51ywM7vdw1N8QvrbqNBuD419fZqXqMLLNRBiduuEJP4PVDMJfge', 2, '2022-10-26'),
(4, 'frida', 'perez', 53454, 'frida@gmail.com', '$2y$10$oMf1tHGKVjGRdNIXUdMUVOaHHeA85sTCZbIH5exTl9L05uf3DDVNS', 2, '2022-09-18'),
(5, 'josefa', 'Diaz', 53454, 'josefa@gmail.com', '$2y$10$oMf1tHGKVjGRdNIXUdMUVOaHHeA85sTCZbIH5exTl9L05uf3DDVNS', 2, '2022-05-14'),
(6, 'pedro', 'calderon', 53324454, 'pedro@gmail.com', '$2y$10$oMf1tHGKVjGRdNIXUdMUVOaHHeA85sTCZbIH5exTl9L05uf3DDVNS', 2, '2022-07-24'),
(7, 'luis', 'perdomo', 53324454, 'luis@gmail.com', '$2y$10$oMf1tHGKVjGRdNIXUdMUVOaHHeA85sTCZbIH5exTl9L05uf3DDVNS', 2, '2022-09-28');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `usuariosoctubre`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `usuariosoctubre`;
CREATE TABLE `usuariosoctubre` (
`id` int(11)
,`nombre` varchar(100)
,`apellido` varchar(100)
,`documento` int(11)
,`correo` varchar(100)
,`contraseña` varchar(80)
,`idRol` int(11)
,`fechaRegistro` date
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `usuarios_alfabeticamente`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `usuarios_alfabeticamente`;
CREATE TABLE `usuarios_alfabeticamente` (
`id` int(11)
,`nombre` varchar(100)
,`apellido` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `cantidadusuariosadministrador`
--
DROP TABLE IF EXISTS `cantidadusuariosadministrador`;

DROP VIEW IF EXISTS `cantidadusuariosadministrador`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cantidadusuariosadministrador`  AS SELECT count(0) AS `count(*)` FROM `usuario` WHERE `usuario`.`idRol` = 11  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `cantidadusuariosstandar`
--
DROP TABLE IF EXISTS `cantidadusuariosstandar`;

DROP VIEW IF EXISTS `cantidadusuariosstandar`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cantidadusuariosstandar`  AS SELECT count(0) AS `count(*)` FROM `usuario` WHERE `usuario`.`idRol` = 22  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `usuariosoctubre`
--
DROP TABLE IF EXISTS `usuariosoctubre`;

DROP VIEW IF EXISTS `usuariosoctubre`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usuariosoctubre`  AS SELECT `usuario`.`id` AS `id`, `usuario`.`nombre` AS `nombre`, `usuario`.`apellido` AS `apellido`, `usuario`.`documento` AS `documento`, `usuario`.`correo` AS `correo`, `usuario`.`contraseña` AS `contraseña`, `usuario`.`idRol` AS `idRol`, `usuario`.`fechaRegistro` AS `fechaRegistro` FROM `usuario` WHERE `usuario`.`fechaRegistro` >= '2022-10-01''2022-10-01'  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `usuarios_alfabeticamente`
--
DROP TABLE IF EXISTS `usuarios_alfabeticamente`;

DROP VIEW IF EXISTS `usuarios_alfabeticamente`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usuarios_alfabeticamente`  AS SELECT `usuario`.`id` AS `id`, `usuario`.`nombre` AS `nombre`, `usuario`.`apellido` AS `apellido` FROM `usuario` ORDER BY `usuario`.`nombre` ASC  ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `rol` FOREIGN KEY (`idRol`) REFERENCES `rol` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
