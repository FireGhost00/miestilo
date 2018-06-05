-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2018 a las 05:16:57
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `miestilo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `Categorias` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `Categorias`) VALUES
(1, 'Caballero'),
(2, 'Dama'),
(3, 'Niño');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(5) NOT NULL,
  `nombres` varchar(25) NOT NULL,
  `Apellidos` varchar(25) NOT NULL,
  `Sexo` char(1) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL DEFAULT '',
  `email` varchar(60) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `estado` char(1) DEFAULT 'A',
  `tipo` char(8) NOT NULL DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombres`, `Apellidos`, `Sexo`, `direccion`, `telefono`, `email`, `usuario`, `password`, `estado`, `tipo`) VALUES
(1, 'Nelson', 'Gomez', 'M', 'San Salvador', '78754544', '2517562016@mail.utec.edu.sv', 'admin', '12345', 'A', 'admin'),
(2, 'Juan', 'Perez3', 'M', ' Apopa San Salvador', '22577777', 'juanp@gmail.com', 'clientejuan', '12345', 'A', 'cliente'),
(3, 'German ', 'Gomez', 'M', 'Soyapango San salvador', '22577777', 'gedugomez@hotmail.com', 'G.Gomez', '12345', 'A', 'cliente'),
(4, 'tomas', 'urbina', 'M', 'utec', '22222323', 't@t.com', 'turbina', '12345', 'A', 'cliente'),
(5, 'yova', 'duran', 'M', 'san martin', '70898046', 'yova.music@hotmail.es', 'yova', '1234', 'A', 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `valorcompra` double(10,2) NOT NULL,
  `estado` char(1) NOT NULL,
  `tipotc` varchar(25) NOT NULL,
  `nombretc` varchar(50) NOT NULL,
  `bancotc` varchar(50) NOT NULL,
  `numerotc` varchar(50) NOT NULL,
  `mestc` char(2) NOT NULL,
  `aniotc` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id`, `idcliente`, `fecha`, `valorcompra`, `estado`, `tipotc`, `nombretc`, `bancotc`, `numerotc`, `mestc`, `aniotc`) VALUES
(1, 2, '2018-05-20 23:25:45', 5.00, '0', 'Visa', 'Nelson Gomez', 'Davivienda', '1234567', '01', '2019'),
(3, 2, '2018-05-21 01:35:23', 150.00, '0', 'Visa', 'Nelson Gomez', 'Davivienda', '12334566', '01', '2018'),
(4, 5, '2018-05-21 01:58:53', 300.00, '0', 'Visa', 'edwin giovanni', 'dadivienda', '70898046', '08', '2018'),
(10, 4, '2018-05-22 21:50:21', 215.00, '0', 'Visa', 'tomas', 'tomas', '123', '01', '2018');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Telefono` char(8) NOT NULL,
  `comentario` varchar(120) NOT NULL,
  `Estado` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `Nombre`, `Email`, `Telefono`, `comentario`, `Estado`) VALUES
(1, 'Nelson', 'realgomez@gmail.com', '0', 'esto es genial', 'I'),
(2, 'Nelson', 'realgomez@gmail.com', '0', 'la cague', 'A'),
(3, 'Pedro', 'realgomez@gmail.com', '70758813', 'necesite modificar el diseÃ±o', 'A'),
(4, 'Nelson', 'realgomez@gmail.com', '0', 'esto es genial', 'I');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE `cotizacion` (
  `idCotizacion` int(11) NOT NULL,
  `Nombres` varchar(30) NOT NULL,
  `Correo` varchar(60) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cotizacion`
--

INSERT INTO `cotizacion` (`idCotizacion`, `Nombres`, `Correo`, `Telefono`, `idProducto`, `cantidad`, `estado`) VALUES
(1, 'Nelson Gomez3', 'Ngomez@gmail.com', 22577777, 23, 2, 'A'),
(2, 'tomas', 't@t.com', 22222323, 27, 1, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompra`
--

CREATE TABLE `detallecompra` (
  `id` int(11) NOT NULL,
  `idcompra` int(11) NOT NULL,
  `producto` varchar(50) NOT NULL,
  `precio` double(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallecompra`
--

INSERT INTO `detallecompra` (`id`, `idcompra`, `producto`, `precio`, `cantidad`) VALUES
(1, 1, 'tomas', 5.00, 1),
(2, 3, 'PUREBOOST DPR SHOES', 150.00, 1),
(3, 4, 'PUREBOOST DPR SHOES', 150.00, 1),
(4, 4, 'PUREBOOST  SHOES GRA', 150.00, 1),
(5, 5, 'PUREBOOST DPR SHOES', 150.00, 1),
(6, 5, 'SPEED TRAINER 3 SHOE', 75.00, 1),
(7, 6, 'PUREBOOST DPR SHOES', 150.00, 1),
(8, 9, 'CRAZY ELITE SHOES', 140.00, 1),
(9, 10, 'SPEED TRAINER 3 SHOE', 75.00, 1),
(10, 10, 'CRAZY ELITE SHOES', 140.00, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE `encuesta` (
  `id_encuesta` int(11) NOT NULL,
  `Repuesta_1` char(2) NOT NULL,
  `Repuesta_2` varchar(25) NOT NULL,
  `Repuesta_3` char(2) NOT NULL,
  `Repuesta_4` varchar(25) NOT NULL,
  `Repuesta_5` char(2) NOT NULL,
  `Repuesta_6` varchar(50) NOT NULL,
  `Repuesta_7` char(2) NOT NULL,
  `Repuesta_8` char(2) NOT NULL,
  `Repuesta_9` varchar(25) NOT NULL,
  `Repuesta_10` char(15) NOT NULL,
  `Repuesta_11` char(15) NOT NULL,
  `Repuesta_12` char(10) NOT NULL,
  `Repuesta_13` char(10) NOT NULL,
  `Repuesta_14` char(2) NOT NULL,
  `Repuesta_15` varchar(100) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `encuesta`
--

INSERT INTO `encuesta` (`id_encuesta`, `Repuesta_1`, `Repuesta_2`, `Repuesta_3`, `Repuesta_4`, `Repuesta_5`, `Repuesta_6`, `Repuesta_7`, `Repuesta_8`, `Repuesta_9`, `Repuesta_10`, `Repuesta_11`, `Repuesta_12`, `Repuesta_13`, `Repuesta_14`, `Repuesta_15`, `estado`) VALUES
(15, 'si', 'Colores ', 'si', 'zapatos', 'si', 'Informacion, navegacion, ', 'si', 'si', 'Ningun Problema', 'no encontre nad', 'sencillo', 'Excelente', 'Siempre', 'si', ' Buen Trabajo', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProductos` int(11) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Precio` double NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `Unidades` int(11) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProductos`, `Nombre`, `idCategoria`, `Descripcion`, `Precio`, `imagen`, `Unidades`, `estado`) VALUES
(22, 'PUREBOOST DPR SHOES3', 1, 'Deportivo Running', 150, 'img/1.jpg', 21, 'A'),
(23, 'PUREBOOST  SHOES GRA', 1, 'Deportivo Running', 150, 'img/2.jpg', 50, 'A'),
(25, 'SPEED TRAINER 3 SHOE', 1, 'Tennis Running', 75, 'img/9.jpg', 75, 'A'),
(26, 'ADIDAS GIRLS', 3, 'TENIS PEQUEÑO PARA NIÑAS', 50, 'img/imgN1.jpg', 90, 'A'),
(27, 'CRAZY ELITE SHOES', 1, 'ADIDAS TENIS RUNNING', 140, 'img/7.jpg', 100, 'A'),
(28, 'SPEED TRAINER 3 SHOE', 1, 'ADIDAS TENNIS RUNNING', 75, 'img/8.jpg', 120, 'A'),
(30, 'ADIDAS GIRLS PINK', 3, 'ADIDAS PARA NIÑO', 45, 'img/imgN5.jpg', 60, 'A'),
(31, 'ADIDAS GIRLS PINK WH', 3, 'TENIS  PARA NIÑAS', 60, 'img/imgN2.jpg', 75, 'A'),
(33, 'ALPHABOUNCE 1 SHOES', 2, 'Tennis Running', 100, 'img/m-1.jpg', 120, 'A'),
(34, 'MI SUERNOVA SHOES', 2, 'TENIS  RUNNING ', 90, 'img/m-2.jpg', 80, 'A'),
(35, 'ADIZERO UBERSONIC', 2, 'ADIDAS TENIS RUNNING', 150, 'img/m-3.jpg', 75, 'A'),
(36, 'ADIZERO UBERSONIC W', 2, 'ADIDAS TENIS RUNNING', 100, 'img/m-5.jpg', 50, 'A'),
(37, 'ADIDAS BOY', 3, 'ADIDAS TENIS PARA NIÑO', 75, 'img/imagen2.jpg', 90, 'A'),
(38, 'tomas', 1, 'prueba', 5, 'img/MazingerZ.png', 1, 'A');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcliente` (`idcliente`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`idCotizacion`),
  ADD KEY `idProducto` (`idProducto`),
  ADD KEY `idCliente` (`Nombres`);

--
-- Indices de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD PRIMARY KEY (`id_encuesta`,`Repuesta_2`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProductos`),
  ADD KEY `idCategoria` (`idCategoria`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  MODIFY `idCotizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  MODIFY `id_encuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProductos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD CONSTRAINT `cotizacion_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProductos`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`idCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
