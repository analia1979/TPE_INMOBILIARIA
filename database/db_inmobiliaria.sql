-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2019 a las 00:43:06
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_inmobiliaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `descripcion`) VALUES
(1, 'CASAS'),
(2, 'TERRENOS'),
(3, 'CAMPOS'),
(4, 'DEPARTAMENTOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(10) NOT NULL,
  `texto` varchar(100) NOT NULL,
  `puntaje` int(5) NOT NULL,
  `id_inmueble_fk` int(11) NOT NULL,
  `id_usuario_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `texto`, `puntaje`, `id_inmueble_fk`, `id_usuario_fk`) VALUES
(2, 'segundo comentario', 4, 7, 1),
(4, 'cuarto comentario ', 2, 7, 1),
(5, 'gdgdfdf', 2, 7, 1),
(8, 'nuevo comentario usuario3', 5, 7, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `idImagen` int(11) NOT NULL,
  `path` varchar(50) NOT NULL,
  `idInmueble_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`idImagen`, `path`, `idInmueble_fk`) VALUES
(1, 'img/5dcdc6fe97681.jpg', 28),
(2, 'img/5dcdc6ff417a6.jpg', 28),
(3, 'img/5dcdedb8c84c0.jpg', 29),
(4, 'img/5dcdedb933dd7.jpg', 29),
(5, 'img/5dcdedb95129e.jpg', 29),
(6, 'img/5dd1a0fc6927e.jpg', 30),
(7, 'img/5dd1a0fca7a8d.jpg', 30),
(8, 'img/5dd1a0fd27bc8.jpg', 30),
(9, 'img/5dd1a0fdeb0f6.jpg', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble`
--

CREATE TABLE `inmueble` (
  `id_inmueble` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `vendida` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inmueble`
--

INSERT INTO `inmueble` (`id_inmueble`, `descripcion`, `precio`, `idCategoria`, `vendida`) VALUES
(7, 'Casa en Dorrego 1090- Excelente ubicacion', 1000000, 1, b'1'),
(8, 'Excelente ubicacion-3 Ambientes con cochera', 10000210, 1, b'1'),
(9, 'Terreno sobre ruta 226-40 hect.', 5000000, 2, b'1'),
(10, 'Terreno de 20x40 zona quintas', 100000, 2, b'1'),
(11, 'Terreno en barrio Casariego. 10x30', 280000, 2, b'1'),
(12, 'Terreno 20x40 zona rural', 150000, 2, b'1'),
(13, 'AV.SAN MARTIN 450. Zona centrica. ', 120000, 1, b'1'),
(14, 'Campo 100hs sobre ruta 65-Ideal para siembra', 10000, 3, b'1'),
(15, 'Terreno sobre ruta-Todos los servicios', 1550000, 2, b'0'),
(16, 'Campo de 300hs sin bajos-Ruta 226 km 150', 150000, 3, b'1'),
(17, 'con imagenes', 1, 1, b'1'),
(18, 'insertar imagen', 1, 1, b'1'),
(19, 'agregar imagen', 1, 1, b'1'),
(20, 'agregar imagen', 1, 1, b'1'),
(21, 'insertar nueva imagen', 2, 1, b'1'),
(22, 'insertarn dos imagenes', 3, 1, b'1'),
(23, 'imasgen', 9, 1, b'1'),
(24, 'insertarndo imagen de nuevo', 15, 1, b'1'),
(25, 'insertarndo imagen de nuevo', 15, 1, b'1'),
(26, 'insertarndo imagen de nuevo', 15, 1, b'1'),
(27, 'insertarndo imagen de nuevo', 15, 1, b'1'),
(28, 'insertarndo imagen de nuevo 2 img', 180, 1, b'1'),
(29, 'Campo nueva imagen a insertar', 180000, 3, b'1'),
(30, 'NUEVO INSERT DE IMAGEN', 333, 4, b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `password`, `admin`) VALUES
(1, 'analiamega@gmail.com', '$2y$12$No8wUi6KJVD5349eI5wP1u.KipFyej763bPAdqnHtl3CrAZDu53YS', 1),
(2, 'fer1979@gmail.com', '$2y$12$KhoJgcbNaeLpUT1zkC6YvObMzWo.y8EIVOqOMHlfpeLNNAZITQJ2i', 1),
(3, 'movian1979@hotmail.com', '$2y$12$0b3eWftONO/cMBrQwxlHueUSvrZi/3/p8vFwXGtEyBo5LrPy7z.5i', 0),
(4, 'movian1982@hotmail.com', '$2y$12$3qb93lxSReu7HZsL5KNGCOtio0gV7ASQaOfg.gVNiDP5v.iSvt/NS', 0),
(5, 'movian1983@hotmail.com', '$2y$12$WF3ckN/MX49IzU97mxes1OW.eQ9tWAJ07Wgv1FUKHCJTW4CNhWdMS', 0),
(6, 'cristian1979@hotmail.com', '$2y$10$xZvsnbpyI5OFoOXoyk1O3ORZVy57/QNCpZocFs.QQjeOS37TRfvgu', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_inmueble_fk` (`id_inmueble_fk`) USING BTREE,
  ADD KEY `id_usuario_fk` (`id_usuario_fk`) USING BTREE;

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`idImagen`),
  ADD KEY `fk_id_inmueble` (`idInmueble_fk`) USING BTREE;

--
-- Indices de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD PRIMARY KEY (`id_inmueble`),
  ADD KEY `fk_idCategoria` (`idCategoria`) USING BTREE;

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `idImagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  MODIFY `id_inmueble` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_inmueble_fk`) REFERENCES `inmueble` (`id_inmueble`),
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_usuario_fk`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`idInmueble_fk`) REFERENCES `inmueble` (`id_inmueble`);

--
-- Filtros para la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD CONSTRAINT `inmueble_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
