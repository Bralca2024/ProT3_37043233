-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-07-2024 a las 00:55:40
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cabral_fernando`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfiles` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfiles`, `descripcion`) VALUES
(1, 'admin'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `repassword` varchar(100) NOT NULL,
  `perfil_id` int(11) NOT NULL DEFAULT 2,
  `baja` varchar(2) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `usuario`, `email`, `password`, `repassword`, `perfil_id`, `baja`) VALUES
(1, 'Francis', 'Cabreras', 'Francis00', 'ferbralca2099@gmail.com', '$2y$10$MURCOSxAX8aSAf1QyxyT/u5unFrLzPehHVNJ/dM4oym9MzTsHtS7m', '', 2, 'NO'),
(2, 'Javier Fernando', 'Cabral', 'Bralca2024', 'bralca2016@gmail.com', '$2y$10$hqXdpGT1dpmhl.ec/JlhjuvQnYx.5RIW0wV85VLf1elzC7dUlLcSy', '', 1, 'NO'),
(3, 'Francisco', 'Cabral', 'Fercho', 'franciscodev@gmail.com', '$2y$10$BpVJMIjtlu8rQqvSTpPKV.eBnLBpEnCISh0xuNW41YDG5exJwdXJa', '', 2, 'NO'),
(5, 'Roberto Augusto', 'Cabral', 'Roberto65', 'bralca2088@gmail.com', '$2y$10$KHWgUE6VJAp18XfhcLIQkeSlH5ycr/lOC5rrpDR4dU1TvWs/KJ/la', '', 2, 'NO'),
(14, 'Teresa', 'Contreras', 'Teresita56', 'tere2015@gmail.com', '$2y$10$gqckp9JrYnfVWuPxEpo9OO4q6vOfAaVhPpYubO8IA4VxiLpyJUIp6', '', 2, 'NO'),
(18, 'Fernando', 'Acosta', 'BralFer', 'fernando@gmail.com', '$2y$10$btqeplIj.zm6J724tBGmiuhWOn1DBzow76OBm62cy8vT1.zhi4.FW', '', 2, 'NO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfiles`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfiles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
