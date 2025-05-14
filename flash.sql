-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2025 a las 10:45:07
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `flash`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(555) NOT NULL,
  `imagen` varchar(555) NOT NULL,
  `rutajuego` varchar(300) NOT NULL,
  `fechasubi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id`, `nombre`, `descripcion`, `imagen`, `rutajuego`, `fechasubi`) VALUES
(1, 'Super Mario Combat', 'Juego de accion protagonizado por super mario', 'http://localhost/abProgra/views/admin/img/flash_Mario_Combat_screenshot.jpg', 'http://localhost/abProgra/views/admin/biblidejuegos/Mario_Combat.swf', '2025-05-14 04:14:46'),
(2, 'Dad n\' Me', 'Juego de estilo Beat em\' up side-scroller donde peleas contra niños (?) hastat llegar al final del barrio', 'http://localhost/abProgra/views/admin/img/dadnme_screenshot.png', 'http://localhost/abProgra/views/admin/biblidejuegos/dadnme.swf', '2025-05-14 05:15:05'),
(3, 'Papa\'s Pizzeria', 'Juego sandbox (?) en el que creas pizzas para tus clientes', 'http://localhost/abProgra/views/admin/img/Papa\'s Pizzeria.jpg', 'http://localhost/abProgra/views/admin/biblidejuegos/papaspizzeria_v2.swf', '2025-05-14 05:31:38'),
(4, 'para el testeo del edit', 'para el testeo del edit', 'http://localhost/abProgra/views/admin/img/Alien Hominid.png', 'http://localhost/abProgra/views/admin/biblidejuegos/alien_hominid.swf', '2025-05-14 08:37:40'),
(5, 'para el testeo del edit2', 'para el testeo del edit2', 'http://localhost/abProgra/views/admin/img/Bloxorz.jpg', 'http://localhost/abProgra/views/admin/biblidejuegos/bloxors.swf', '2025-05-14 08:41:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego_tag`
--

CREATE TABLE `juego_tag` (
  `id_juego` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tags`
--

INSERT INTO `tags` (`id`, `nombre`) VALUES
(2, 'Acción'),
(1, 'Aventura'),
(5, 'Plataformas'),
(3, 'Puzzles'),
(4, 'RPG');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `juego_tag`
--
ALTER TABLE `juego_tag`
  ADD PRIMARY KEY (`id_juego`,`id_tag`),
  ADD KEY `id_tag` (`id_tag`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `juego_tag`
--
ALTER TABLE `juego_tag`
  ADD CONSTRAINT `juego_tag_ibfk_1` FOREIGN KEY (`id_juego`) REFERENCES `juegos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `juego_tag_ibfk_2` FOREIGN KEY (`id_tag`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
