-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2020 a las 21:09:50
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `santodomingordventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albumes`
--

CREATE TABLE `albumes` (
  `id_alb` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `albumes`
--

INSERT INTO `albumes` (`id_alb`, `usuario`, `fecha`, `nombre`) VALUES
(1, 9, '2020-04-15', 'D997C8DF37A4A287B3B'),
(2, 9, '2020-04-15', 'F6F66343712AC10C73D'),
(3, 9, '2020-04-15', '60A0985042F057AA97E'),
(4, 9, '2020-04-27', 'B3BB48D2DF3914FFF12'),
(5, 16, '2020-04-29', '95948B4309015B73C67'),
(6, 16, '2020-04-29', 'F6082E66C56285BCBAF'),
(7, 16, '2020-04-29', '65C6EB646EC85F8AD53'),
(8, 16, '2020-04-29', 'FC59E49F34D63776C89'),
(9, 9, '2020-05-04', '1453BD32EC4E18324DC'),
(10, 9, '2020-05-04', '21DBBFF39FC4B103EA4'),
(11, 9, '2020-05-04', '4D70CEC5327EE604850'),
(12, 17, '2020-05-06', '199B64376884F80F821'),
(13, 17, '2020-05-09', '6D22CE7C23F339D92D3'),
(14, 26, '2020-05-10', '22625AB8A48F29578CB'),
(15, 26, '2020-05-10', '257CECF5DA66B5A1304'),
(16, 26, '2020-05-10', 'BCD5673BFDFA4735EA0'),
(17, 26, '2020-05-10', '1F7B3648EE50744A7E9'),
(18, 26, '2020-05-10', '444413BCB8BE8DD922A'),
(19, 26, '2020-05-10', '62B4535A7484D6E99F1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_coment` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `contenido` text CHARACTER SET latin1 COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id__fot` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `ruta` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `album` text COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `producto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id__fot`, `usuario`, `fecha`, `ruta`, `album`, `producto`) VALUES
(3, 9, '2020-04-15', '10A100F687AFF.jpg', 'D83D782346DC79BA105', 1),
(4, 9, '2020-04-15', '10F05244E5202.jpg', '485DF98B95BA620EF97', 1),
(5, 9, '2020-04-15', '125E032AA2BA3.jpg', '485DF98B95BA620EF97', 1),
(6, 9, '2020-04-15', '1172B73E12577.jpg', '76B41BC8A7DAC7B410C', 1),
(7, 9, '2020-04-15', '1226D01DB76E2.jpg', '76B41BC8A7DAC7B410C', 1),
(8, 9, '2020-04-15', '16D7019D644C1.jpg', '69AA357746652DB06E6', 1),
(9, 9, '2020-04-15', '1BEB23B02D3B2.jpg', '69AA357746652DB06E6', 1),
(10, 9, '2020-04-15', '13CA0E3872741.jpg', 'BED4B64D1760D45CD4C', 1),
(11, 9, '2020-04-15', '105AB6DD36D52.jpg', 'BED4B64D1760D45CD4C', 1),
(12, 9, '2020-04-15', '15F9080B6F71A.jpg', '03CE5753EB741FE84B7', 1),
(13, 9, '2020-04-15', '1618A1DF35A7C.jpg', '03CE5753EB741FE84B7', 1),
(14, 9, '2020-04-15', '1AF5949E9E451.jpg', 'D997C8DF37A4A287B3B', 1),
(15, 9, '2020-04-15', '1F4CBCA738D78.jpg', 'D997C8DF37A4A287B3B', 1),
(16, 9, '2020-04-15', '180F34734CB41.jpg', 'F6F66343712AC10C73D', 1),
(17, 9, '2020-04-15', '1F95B57C5A430.jpg', 'F6F66343712AC10C73D', 1),
(18, 9, '2020-04-15', '1149D55FC3FC1.jpg', '60A0985042F057AA97E', 1),
(19, 9, '2020-04-15', '157EBF3277D4C.jpg', '60A0985042F057AA97E', 1),
(20, 9, '2020-04-27', '249D59D5FA462.jpg', 'B3BB48D2DF3914FFF12', 2),
(21, 9, '2020-04-27', '2B60A06AA651E.jpg', 'B3BB48D2DF3914FFF12', 2),
(22, 9, '2020-04-27', '29787AB5D1B86.jpg', 'B3BB48D2DF3914FFF12', 2),
(23, 9, '2020-04-27', '29C5F662C4C7A.jpg', 'B3BB48D2DF3914FFF12', 2),
(24, 9, '2020-05-04', '38A3F1BEC1937.jpg', '1453BD32EC4E18324DC', 3),
(25, 9, '2020-05-04', '3F61EFDE4F004.jpg', '1453BD32EC4E18324DC', 3),
(26, 9, '2020-05-04', '348EA376FDA05.jpg', '1453BD32EC4E18324DC', 3),
(27, 9, '2020-05-04', '412CF9043F75D.jpg', '21DBBFF39FC4B103EA4', 4),
(28, 9, '2020-05-04', '401672934C6B6.jpg', '21DBBFF39FC4B103EA4', 4),
(29, 9, '2020-05-04', '488CF87617F72.jpg', '21DBBFF39FC4B103EA4', 4),
(30, 9, '2020-05-04', '4CC801E89762E.jpg', '21DBBFF39FC4B103EA4', 4),
(31, 9, '2020-05-04', '422C064DD0A74.jpg', '21DBBFF39FC4B103EA4', 4),
(32, 9, '2020-05-04', '42D16F6A5F148.jpg', '21DBBFF39FC4B103EA4', 4),
(33, 9, '2020-05-04', '58827BF224540.jpg', '4D70CEC5327EE604850', 5),
(34, 9, '2020-05-04', '5660EED7EDAB4.jpg', '4D70CEC5327EE604850', 5),
(35, 9, '2020-05-04', '59716D270D3B7.jpg', '4D70CEC5327EE604850', 5),
(36, 9, '2020-05-04', '57F91155C45B5.jpg', '4D70CEC5327EE604850', 5),
(37, 9, '2020-05-04', '5DC61D5A869CA.jpg', '4D70CEC5327EE604850', 5),
(38, 9, '2020-05-04', '5FF2284EA1281.jpg', '4D70CEC5327EE604850', 5),
(39, 17, '2020-05-06', '601F3DC392064.jpg', '199B64376884F80F821', 6),
(40, 17, '2020-05-06', '60FEB1DFAD589.jpg', '199B64376884F80F821', 6),
(41, 17, '2020-05-06', '605BE4C8CBE0A.jpg', '199B64376884F80F821', 6),
(42, 17, '2020-05-09', '78148FA0A5F9B.jpg', '6D22CE7C23F339D92D3', 7),
(43, 17, '2020-05-09', '7CB3E68089B2C.jpg', '6D22CE7C23F339D92D3', 7),
(44, 17, '2020-05-09', '7A9F3AFE42255.jpg', '6D22CE7C23F339D92D3', 7),
(45, 26, '2020-05-10', '8FC7888B932FC.jpg', '22625AB8A48F29578CB', 8),
(46, 26, '2020-05-10', '82AA358CA3622.jpg', '22625AB8A48F29578CB', 8),
(47, 26, '2020-05-10', '8D4C23B19B1A8.jpg', '22625AB8A48F29578CB', 8),
(48, 26, '2020-05-10', '98AE2F175A3CB.jpg', '257CECF5DA66B5A1304', 9),
(49, 26, '2020-05-10', '9835B262877CA.jpg', '257CECF5DA66B5A1304', 9),
(50, 26, '2020-05-10', '10225AB589ACE0.jpg', 'BCD5673BFDFA4735EA0', 10),
(51, 26, '2020-05-10', '11579ABC7B44C9.jpg', '1F7B3648EE50744A7E9', 11),
(52, 26, '2020-05-10', '11341DEAE86827.jpg', '1F7B3648EE50744A7E9', 11),
(53, 26, '2020-05-10', '122E0BB8BBC0A9.jpg', '444413BCB8BE8DD922A', 12),
(54, 26, '2020-05-10', '13055DF78E7D0B.jpg', '62B4535A7484D6E99F1', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_pub` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `titulo` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `contenido` text CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `estado` binary(1) NOT NULL,
  `imagen` int(11) DEFAULT NULL,
  `categoria` int(11) NOT NULL,
  `comentarios` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_pub`, `usuario`, `fecha`, `titulo`, `contenido`, `precio`, `estado`, `imagen`, `categoria`, `comentarios`) VALUES
(11, 26, '2020-05-10 12:29:34', 'Anuncio', 'Descripción del anuncio', '1224', 0x31, 17, 8, NULL),
(12, 26, '2020-05-10 12:34:22', 'Venta de vehiculo', 'Descripción del vehícn del vehiculo', '2143545', 0x30, 18, 9, NULL),
(13, 26, '2020-05-10 13:30:37', 'Ventas de vehiculo y alquiler tambien', 'Descripción de ventas', '34565', 0x31, 19, 6, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellido` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `mail` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fotoperfil` text COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `genero` text COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `cedula` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `direccion` text COLLATE utf8mb4_spanish2_ci NOT NULL,
  `password` text COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `username`, `nombre`, `apellido`, `mail`, `fotoperfil`, `fecha_nac`, `genero`, `cedula`, `telefono`, `direccion`, `password`) VALUES
(7, 'ddddddbhsc', 'dddd', 'ddddddddd', 'fdhskjhk@eeee.com', NULL, '2019-10-16', 'M', 'dddd', 'ddddd', 'dddd', 'ddddddddddd'),
(8, 'felix', 'kjk', 'as', 'manuel00fx@outlook.com', NULL, '2020-04-08', 'M', '22301574608', '8092678945', 'sdfdsfasd', '$2y$10$np.7aPfHx82Ec4y.nnv5suhyDRqJHVsW9LQcqTeihw4hlKdqMNYjO'),
(9, 'felix1234', 'kjkd', 'asa', 'manudel00fx@outlook.com', NULL, '2020-04-22', 'M', '22301574608', '8092678945', 'wsed', '$2y$10$kXzxcM9/gjXo0RBeSoJSAOsGS88ZliTddyZX/ZHXUoe3XYrTPvDg2'),
(26, 'Miguel', 'Miguel Angel', 'Gonzalez', 'MiguelU@.com', NULL, '2020-05-09', 'M', '12324', '8294534344', 'Mi direccion', '$2y$10$PtfTDjK/tcS6E/TMp5XPfO4e9kPOYSCiMpiBiy9Nh11k2cHkx82ym'),
(28, 'AlienDiaz', 'NNN', 'NNN', 'Njjdjjdjd@hdd', NULL, '2020-10-22', 'M', '3333333333333', '8099093834', 'FFFFFFFFFF', '$2y$10$h//lZYZjQEhh2NqDN0lZYeLu57plFoft4cjYquJgCYZh7.gdC8GyC');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `albumes`
--
ALTER TABLE `albumes`
  ADD PRIMARY KEY (`id_alb`),
  ADD KEY `id_alb` (`id_alb`),
  ADD KEY `id_alb_2` (`id_alb`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_coment`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id__fot`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_pub`),
  ADD KEY `imagen` (`imagen`),
  ADD KEY `comentarios` (`comentarios`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `albumes`
--
ALTER TABLE `albumes`
  MODIFY `id_alb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_coment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id__fot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_pub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`imagen`) REFERENCES `fotos` (`id__fot`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`comentarios`) REFERENCES `comentarios` (`id_coment`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
