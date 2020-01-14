-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2019 a las 20:57:17
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cucirenta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casa`
--

CREATE TABLE `casa` (
  `idC` int(11) NOT NULL,
  `domicilio` varchar(300) CHARACTER SET utf8 NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `nomb_propietario` varchar(150) CHARACTER SET utf8 NOT NULL,
  `colonia` varchar(100) CHARACTER SET utf8 NOT NULL,
  `codigo_postal` int(10) NOT NULL,
  `cuartos` int(2) NOT NULL,
  `baños` int(2) NOT NULL,
  `descripcion` text CHARACTER SET utf8 NOT NULL,
  `foto_primary` varchar(200) CHARACTER SET utf8 NOT NULL,
  `maps` varchar(2000) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `casa`
--

INSERT INTO `casa` (`idC`, `domicilio`, `telefono`, `nomb_propietario`, `colonia`, `codigo_postal`, `cuartos`, `baños`, `descripcion`, `foto_primary`, `maps`) VALUES
(1, 'Fidel Velazquez #111', '392102300', 'Isaac Lopez Valadez', 'Infonavit 2', 47840, 4, 2, 'Una casa el cual renta por cuartos y es solo para mujeres', 'Servidor/Casas/casa-14.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1322.4330503065282!2d-102.77428065496342!3d20.366163635639143!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842ed8ef1f212a83%3A0x17c0925577418d87!2sFidel%20Vel%C3%A1zquez%20132%2C%20R%C3%ADo%20Zula%20II%2C%2047800%20Ocotl%C3%A1n%2C%20Jal.!5e0!3m2!1ses-419!2smx!4v1575678282110!5m2!1ses-419!2smx\" width=\"400\" height=\"300\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>'),
(2, 'Platon #180', '3921027200', 'Luis Ernesto Mendez', 'Infonavit 3', 47800, 5, 3, 'Renta de cuartos para jovenes estudiantes de cualquier sexo y cada cuarto contiene dos camas', 'Servidor/Casas/casa-11.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3740.3999512295836!2d-102.7687275857662!3d20.36639301543666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842ed8e46b1c2163%3A0x50a941e15496497!2sPlat%C3%B3n%20180%2C%20Paso%20Blanco%2C%2047800%20Ocotl%C3%A1n%2C%20Jal.!5e0!3m2!1ses-419!2smx!4v1575741512277!5m2!1ses-419!2smx\" width=\"400\" height=\"300\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>'),
(3, 'Platon #216', '3923909829', 'Maria Del Carmen Jimenez', 'Infonavit 3', 47800, 4, 2, 'Renta de cuartos para jovenes estudiantes, solo hombre, esta casa es intolerante a las fiestas y escandalos juveniles', 'Servidor/Casas/casa-12.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3740.3739661412096!2d-102.76855848576616!3d20.36746521540109!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842ed8e491b5fc15%3A0x4267cb8cd8ee7dee!2sPlat%C3%B3n%20216%2C%20Paso%20Blanco%2C%2047800%20Ocotl%C3%A1n%2C%20Jal.!5e0!3m2!1ses-419!2smx!4v1575741431805!5m2!1ses-419!2smx\" width=\"400\" height=\"300\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>'),
(4, 'Fidel Velazquez #126', '3921021254', 'Juan Pedro Rico Perez', 'Infonavit 2', 47840, 6, 3, 'Esta casa se renta para cualquier tipo de personas que necesiten un cuarto, el cual contiene una cama y mubles para ropa ', 'Servidor/Casas/casa-4.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3740.3984002071606!2d-102.77548438576613!3d20.36645701543451!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842ed8ef1a342305%3A0x1143636689b9028b!2sFidel%20Vel%C3%A1zquez%20118%2C%20R%C3%ADo%20Zula%20II%2C%2047800%20Ocotl%C3%A1n%2C%20Jal.!5e0!3m2!1ses-419!2smx!4v1575741656612!5m2!1ses-419!2smx\" width=\"400\" height=\"300\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>'),
(5, 'De Socrates #249', '3921057200', 'Araceli Montaño Jimenez', 'Infonavit 3', 47800, 3, 1, 'Renta de cuartos para jovenes estudiantes mujeres prohivido ingresar hombres a la casa y la casera vive en un apartado de la casa', 'Servidor/Casas/casa-15.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3740.3525726590806!2d-102.77032518576621!3d20.368347915371775!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842ed8e4fd8cb89b%3A0x2dcc8fdf8c3ba00d!2sDe%20S%C3%B3crates%20249%2C%20Paso%20Blanco%2C%2047800%20Ocotl%C3%A1n%2C%20Jal.!5e0!3m2!1ses-419!2smx!4v1575741964541!5m2!1ses-419!2smx\" width=\"400\" height=\"300\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `idCasa` int(11) NOT NULL,
  `idUsuarios` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `idC` int(11) NOT NULL,
  `ruta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`idC`, `ruta`) VALUES
(1, 'Servidor/Casas/casa-1/casa-1-1.jpg'),
(1, 'Servidor/Casas/casa-1/casa-1-2.jpg'),
(1, 'Servidor/Casas/casa-1/casa-1-3.jpg'),
(1, 'Servidor/Casas/casa-1/casa-1-4.jpg'),
(1, 'Servidor/Casas/casa-1/casa-1-5.jpg'),
(1, 'Servidor/Casas/casa-1/casa-1-6.jpg'),
(2, 'Servidor/Casas/casa-2/casa-2-1.jpg'),
(2, 'Servidor/Casas/casa-2/casa-2-2.jpg'),
(2, 'Servidor/Casas/casa-2/casa-2-3.jpg'),
(2, 'Servidor/Casas/casa-2/casa-2-4.jpg'),
(2, 'Servidor/Casas/casa-2/casa-2-5.jpg'),
(2, 'Servidor/Casas/casa-2/casa-2-6.jpg'),
(3, 'Servidor/Casas/casa-3/casa-3-1.jpg'),
(3, 'Servidor/Casas/casa-3/casa-3-2.jpg'),
(3, 'Servidor/Casas/casa-3/casa-3-3.jpg'),
(3, 'Servidor/Casas/casa-3/casa-3-4.jpg'),
(3, 'Servidor/Casas/casa-3/casa-3-5.jpg'),
(3, 'Servidor/Casas/casa-3/casa-3-6.jpg'),
(4, 'Servidor/Casas/casa-4/casa-4-1.jpg'),
(4, 'Servidor/Casas/casa-4/casa-4-2.jpg'),
(4, 'Servidor/Casas/casa-4/casa-4-3.jpg'),
(4, 'Servidor/Casas/casa-4/casa-4-4.jpg'),
(4, 'Servidor/Casas/casa-4/casa-4-5.jpg'),
(4, 'Servidor/Casas/casa-4/casa-4-6.jpg'),
(5, 'Servidor/Casas/casa-5/casa-5-1.jpg'),
(5, 'Servidor/Casas/casa-5/casa-5-2.jpg'),
(5, 'Servidor/Casas/casa-5/casa-5-3.jpg'),
(5, 'Servidor/Casas/casa-5/casa-5-4.jpg'),
(5, 'Servidor/Casas/casa-5/casa-5-5.jpg'),
(5, 'Servidor/Casas/casa-5/casa-5-6.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idU` int(11) NOT NULL,
  `id_google` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idU`, `id_google`, `email`) VALUES
(1, '12333', 'erw3'),
(2, '104921732530512097060', 'chicharo3nelson@gmail.com'),
(4, '107523888384085575941', 'said.lopez@alumnos.udg.mx');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `casa`
--
ALTER TABLE `casa`
  ADD PRIMARY KEY (`idC`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD KEY `idCasa` (`idCasa`),
  ADD KEY `idUsuarios` (`idUsuarios`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD KEY `idC` (`idC`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idU`),
  ADD UNIQUE KEY `id_google` (`id_google`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `casa`
--
ALTER TABLE `casa`
  MODIFY `idC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`idCasa`) REFERENCES `casa` (`idC`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`idUsuarios`) REFERENCES `usuario` (`idU`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`idC`) REFERENCES `casa` (`idC`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
