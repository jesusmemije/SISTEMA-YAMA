-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 28-04-2020 a las 09:19:04
-- Versión del servidor: 5.7.29-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.24-0ubuntu0.18.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `constructora_yama`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idcategoria` int(4) NOT NULL,
  `categoria` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idcategoria`, `categoria`, `descripcion`, `fecha_creacion`) VALUES
(1, 'En cimbra', 'Herramienta correspondiente a la cimbra para obras.', '2020-03-04'),
(2, 'Herramienta', 'Herramienta básica relacionada con la construcción de las obras.', '2020-03-04'),
(3, 'Maquinaria menor', 'Se refiere a la maquinaria con la que actualmente contamos.', '2020-03-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramientas`
--

CREATE TABLE `herramientas` (
  `idherramienta` int(4) NOT NULL,
  `idcategoria` int(4) NOT NULL,
  `herramienta` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(4) NOT NULL,
  `nota` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `herramientas`
--

INSERT INTO `herramientas` (`idherramienta`, `idcategoria`, `herramienta`, `cantidad`, `nota`) VALUES
(1, 1, 'Triplay1', 12, NULL),
(2, 1, 'Barrotes', 10, NULL),
(3, 1, 'Polines', 11, NULL),
(4, 1, 'Duela', 15, NULL),
(5, 1, 'Fajilla', 40, NULL),
(6, 1, 'Tabla', 20, NULL),
(7, 1, 'Andamios metálicos ', 30, NULL),
(8, 1, 'Pedacera de madera', 20, NULL),
(9, 2, 'Picos', 20, NULL),
(10, 2, 'Palas', 15, NULL),
(11, 2, 'Barreras', 20, NULL),
(12, 2, 'Marros', 40, NULL),
(13, 2, 'Carretillas', 10, NULL),
(14, 2, 'Botes mezcleros', 27, NULL),
(15, 2, 'Tambos 200 lt', 12, NULL),
(16, 2, 'Tinacos 1,100 lt', 11, NULL),
(17, 2, 'Tinacos 2,500 lt', 5, NULL),
(18, 2, 'Tinaco 5,000 lt ', 13, NULL),
(19, 2, 'Puntales metálicos', 20, NULL),
(20, 3, 'Revolvedoras', 10, NULL),
(21, 3, 'Taladros', 23, NULL),
(22, 3, 'Esmeriles', 7, NULL),
(23, 3, 'Cortados de loseta', 24, NULL),
(24, 3, 'Cisayas', 4, NULL),
(25, 3, 'Cortadora de concreto', 17, NULL),
(26, 3, 'Cimbra metálica calle ', 26, NULL),
(27, 3, 'Reglas metálicas calle', 32, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales_obra`
--

CREATE TABLE `materiales_obra` (
  `idmaterial_obra` int(4) NOT NULL,
  `idobra` int(4) NOT NULL,
  `idherramienta` int(4) NOT NULL,
  `cantidad` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `materiales_obra`
--

INSERT INTO `materiales_obra` (`idmaterial_obra`, `idobra`, `idherramienta`, `cantidad`) VALUES
(4, 1, 8, 12),
(5, 1, 12, 5),
(6, 4, 1, 45),
(7, 4, 4, 2),
(8, 4, 9, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras`
--

CREATE TABLE `obras` (
  `idobra` int(4) NOT NULL,
  `idusuario` int(4) NOT NULL,
  `obra` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` date NOT NULL,
  `nota` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `obras`
--

INSERT INTO `obras` (`idobra`, `idusuario`, `obra`, `fecha_creacion`, `nota`) VALUES
(1, 1, 'Obra Edificio', '2020-04-26', ''),
(2, 1, 'Obra Puente ', '2020-04-02', ''),
(4, 2, 'EJemplo', '2020-04-26', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idrol` int(4) NOT NULL,
  `rol` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idrol`, `rol`, `descripcion`, `fecha_creacion`) VALUES
(1, 'administrador', 'Tiene el control total del sistema.', '2020-03-04'),
(2, 'Lectura', 'Solo puede ver datos pero no editarlos', '2020-03-04'),
(6, 'Escritor ', 'sssss', '2020-04-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(4) NOT NULL,
  `idrol` int(4) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `idrol`, `nombre`, `apellidos`, `email`, `password`, `fecha_creacion`) VALUES
(1, 1, 'Jesús', 'González Memije', 'memije.dev@gmail.com', '12345', '2020-03-04'),
(2, 2, 'Eduardo ', 'Castro', 'eduardo@gmail.com', '1212', '2020-03-04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  ADD PRIMARY KEY (`idherramienta`),
  ADD KEY `idcategoria` (`idcategoria`);

--
-- Indices de la tabla `materiales_obra`
--
ALTER TABLE `materiales_obra`
  ADD PRIMARY KEY (`idmaterial_obra`),
  ADD KEY `idherramienta` (`idherramienta`),
  ADD KEY `idobra` (`idobra`);

--
-- Indices de la tabla `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`idobra`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `idrol` (`idrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idcategoria` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  MODIFY `idherramienta` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `materiales_obra`
--
ALTER TABLE `materiales_obra`
  MODIFY `idmaterial_obra` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `obras`
--
ALTER TABLE `obras`
  MODIFY `idobra` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idrol` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `herramientas`
--
ALTER TABLE `herramientas`
  ADD CONSTRAINT `herramientas_categorias` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`idcategoria`);

--
-- Filtros para la tabla `materiales_obra`
--
ALTER TABLE `materiales_obra`
  ADD CONSTRAINT `materiales_obra_herramientas` FOREIGN KEY (`idherramienta`) REFERENCES `herramientas` (`idherramienta`),
  ADD CONSTRAINT `materiales_obra_obras` FOREIGN KEY (`idobra`) REFERENCES `obras` (`idobra`);

--
-- Filtros para la tabla `obras`
--
ALTER TABLE `obras`
  ADD CONSTRAINT `obras_usuarios` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_rol` FOREIGN KEY (`idrol`) REFERENCES `roles` (`idrol`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
