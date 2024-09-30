-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2024 a las 22:20:35
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
-- Base de datos: `users_lawyers`
--
CREATE DATABASE IF NOT EXISTS `users_lawyers` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `users_lawyers`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos`
--

CREATE TABLE `casos` (
  `id_caso` int(11) NOT NULL,
  `tipo_caso` varchar(255) NOT NULL,
  `fecha_accidente` date NOT NULL,
  `juzgado` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `id_abogado` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `hora` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `casos`
--

INSERT INTO `casos` (`id_caso`, `tipo_caso`, `fecha_accidente`, `juzgado`, `estado`, `id_abogado`, `id_usuario`, `descripcion`, `hora`) VALUES
(2, 'Accidente de tráfico', '2023-12-15', 'Juzgado 1', 'pendiente', 8, 33, 'Choque entre dos vehículos en una intersección, se solicita compensación por daños materiales.', '2023-12-15'),
(3, 'Pleito contra seguro', '2023-11-20', 'Juzgado 2', 'en progreso', 8, 34, 'Negativa de la compañía de seguros a cubrir los costos médicos después de un accidente automovilístico, se busca resolución legal.', '0000-00-00'),
(4, 'Atropello', '2023-10-10', 'Juzgado 3', 'finalizado', 8, 35, 'Peatón atropellado en un paso de peatones por un conductor distraído, se resolvió fuera de los tribunales.', '0000-00-00'),
(5, 'Atropello', '2023-09-05', 'Juzgado 4', 'pendiente', 8, 36, 'Accidente entre un ciclista y un automóvil, el ciclista sufrió lesiones graves y se busca una compensación justa.', '2023-09-05'),
(6, 'Accidente de tráfico', '2023-08-12', 'Juzgado 5', 'en progreso', 8, 37, 'Colisión múltiple en una carretera principal durante condiciones climáticas adversas, se solicita indemnización por lesiones personales y daños a la propiedad.', '0000-00-00'),
(7, 'Accidente de tráfico', '2023-07-25', 'Juzgado 6', 'finalizado', 31, 38, 'Accidente entre un camión y un automóvil que resultó en la muerte de uno de los pasajeros, se llegó a un acuerdo extrajudicial.', '0000-00-00'),
(8, 'Accidente de tráfico', '2023-06-30', 'Juzgado 7', 'pendiente', 31, 39, 'Accidente causado por un conductor ebrio, se busca una compensación por lesiones personales y daños a la propiedad.', '0000-00-00'),
(9, 'Pleito contra seguro', '2023-05-18', 'Juzgado 8', 'en progreso', 32, 40, 'Negativa de la aseguradora a cubrir los costos de reparación después de un accidente automovilístico, se busca una solución legal.', '0000-00-00'),
(10, 'Pleito contra seguro', '2023-04-03', 'Juzgado 9', 'finalizado', 32, 41, 'Disputa sobre la cantidad de compensación ofrecida por la compañía de seguros después de un accidente, se llegó a un acuerdo en el tribunal.', '0000-00-00'),
(11, 'Pleito contra seguro', '2023-03-22', 'Juzgado 10', 'pendiente', 31, 42, 'Aseguradora se niega a pagar la compensación por un accidente de motocicleta, se inicia un proceso legal para resolver el problema.', '0000-00-00'),
(12, 'Accidente de tráfico', '2023-02-09', 'Juzgado 11', 'en progreso', 32, 43, 'Accidente automovilístico con lesiones graves, se está disputando la responsabilidad y la compensación financiera.', '0000-00-00'),
(13, 'Accidente de tráfico', '2023-01-14', 'Juzgado 12', 'finalizado', 32, 44, 'Accidente entre dos vehículos en una intersección, se resolvió fuera del tribunal con una compensación monetaria.', '0000-00-00'),
(14, 'Accidente de tráfico', '2022-12-27', 'Juzgado 13', 'pendiente', 31, 45, 'Colisión entre un automóvil y una bicicleta, se buscan daños y perjuicios por lesiones personales y daños a la propiedad.', '0000-00-00'),
(15, 'Accidente de tráfico', '2022-11-30', 'Juzgado 14', 'en progreso', 32, 46, 'Accidente de tráfico con múltiples vehículos involucrados, se están determinando las responsabilidades legales.', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `mensaje` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`nombre`, `correo`, `mensaje`, `id`) VALUES
('adri martinez', 'adri@adri.com', 'dfsgdsfgdfhsdfhsdfhsdfhs', 1),
('adri martinez', 'adri@adri.com', 'akldsfjaklsdjflkasjdfklas', 2),
('adri martinez', 'adri@adri.com', 'dsfgdsgadsg', 3),
('adri martinez', 'adri@adri.com', 'dsfgdsgadsg', 4),
('adri martinez', 'adri@adri.com', 'dsfgdsgadsg', 5),
('adri martinez', 'adri@adri.com', 'dsfgdsgadsg', 6),
('adri martinez', 'adri@adri.com', 'sdfasdfasdgadsga', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE `expediente` (
  `id_expediente` int(11) NOT NULL,
  `id_caso` int(11) DEFAULT NULL,
  `fecha_apertura` date DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mensaje` text DEFAULT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) DEFAULT NULL,
  `conversacion_id` int(11) NOT NULL,
  `receptor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `user_id`, `mensaje`, `fecha_hora`, `name`, `conversacion_id`, `receptor_id`) VALUES
(19, 31, 'helloooo\r\n', '2024-04-25 21:35:16', 'Juan García', 1714080916, 41),
(20, 31, 'hoal', '2024-04-25 21:38:54', 'Juan García', 1714081134, 43),
(21, 31, 'hola julia', '2024-04-26 16:46:18', 'Juan García', 1714081134, 43),
(22, 31, 'hola julia contestame por favor', '2024-04-26 16:56:40', 'Juan García', 1714081134, 43),
(23, 8, 'hola juan que tal va el caso¿?', '2024-04-26 17:02:57', 'Carlos Gómez', 1714150977, 31),
(24, 31, 'bien carlos , ya he sacado las pruebas que necesitaba ', '2024-04-26 17:04:00', 'Juan García', 1714150977, 8),
(25, 31, 'Genial, pues a por ello!!', '2024-04-26 17:04:32', 'Juan García', 1714150977, 8),
(26, 31, 'Carlos me puedes hacer un favor?', '2024-04-26 17:08:00', 'Juan García', 1714150977, 8),
(27, 8, 'si claro!!!', '2024-04-26 17:08:18', 'Carlos Gómez', 1714150977, 31),
(28, 8, 'hola maria!!', '2024-04-26 17:08:41', 'Carlos Gómez', 1714151321, 47),
(29, 31, 'pues podrías prestarme tu impresora que la mía se ha roto?', '2024-04-26 17:37:01', 'Juan García', 1714150977, 8),
(30, 8, 'hola juan pues la verdad que si, pero lo unico avisarte de que queda poca tinta', '2024-04-27 10:45:29', 'Carlos Gómez', 1714150977, 31),
(31, 8, 'hola', '2024-04-27 11:25:21', 'Carlos Gómez', 1714151321, 47),
(32, 8, 'hola', '2024-04-27 11:30:14', NULL, 1714151321, 47),
(33, 47, 'hola', '2024-04-27 11:30:44', 'María Guerra', 1714151321, 8),
(34, 47, 'hola juan', '2024-04-27 11:32:12', 'María Guerra', 1714217532, 31),
(35, 47, 'hola tere', '2024-04-27 11:32:19', 'María Guerra', 1714217539, 32),
(36, 8, 'como estas', '2024-04-27 11:32:39', NULL, 1714151321, 47),
(37, 31, 'hola maria', '2024-04-27 11:32:57', NULL, 1714217532, 47),
(38, 31, 'hola maria', '2024-04-27 11:37:32', NULL, 1714217532, 47),
(39, 47, 'hola', '2024-04-27 11:45:30', 'María Guerra', 1714151321, 8),
(40, 47, 'hola', '2024-04-27 11:50:04', 'María Guerra', 1714151321, 8),
(41, 8, 'hola', '2024-04-27 11:50:22', NULL, 1714151321, 47),
(42, 8, 'hola maria', '2024-04-27 11:58:22', 'Carlos Gómez', 1714151321, 47),
(43, 47, 'hola carlos', '2024-04-27 11:58:45', 'María Guerra', 1714151321, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user',
  `dni` varchar(255) NOT NULL,
  `edad` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user_form`
--

INSERT INTO `user_form` (`id`, `nombre`, `email`, `password`, `user_type`, `dni`, `edad`, `apellido`) VALUES
(1, 'admin1', 'admin@admin.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', '', '', ''),
(2, 'user', 'user@user.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '', '', ''),
(8, 'Carlos Gómez', 'abo@aaa.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', '', '', ''),
(31, 'Juan García', 'abo2@aaa.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', '', '', ''),
(32, 'Teresa Pérez', 'abo3@aaa.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', '', '', ''),
(33, 'Pepe Gómez', 'user1@aaa.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '', '', ''),
(34, 'Marta Pérez', 'user2@aaa.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '', '', ''),
(35, 'Antonio Cuesta', 'user3@aaa.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '', '', ''),
(36, 'Juan Hidalgo', 'user4@aaa.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '', '', ''),
(37, 'Alicia Berdugo', 'user5@aaa.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '', '', ''),
(38, 'Raúl Jimenez', 'user6@aaa.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '', '', ''),
(39, 'Pedro Pernía', 'user7@aaa.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '', '', ''),
(40, 'Jose Encina', 'user8@aaa.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '', '', ''),
(41, 'Patricia Conde', 'user9@aaa.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '', '', ''),
(42, 'Lucia Sanz', 'user10@aaa.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '', '', ''),
(43, 'Julia Sarmiento', 'user11@aaa.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '', '', ''),
(44, 'Mario Gómez', 'user12@aaa.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '', '', ''),
(45, 'Sergio Florin', 'user13@aaa.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '', '', ''),
(46, 'Alejandro García', 'user14@aaa.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '', '', ''),
(47, 'María Guerra', 'user15@aaa.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `casos`
--
ALTER TABLE `casos`
  ADD PRIMARY KEY (`id_caso`),
  ADD KEY `id_abogado` (`id_abogado`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD PRIMARY KEY (`id_expediente`),
  ADD KEY `id_caso` (`id_caso`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `casos`
--
ALTER TABLE `casos`
  MODIFY `id_caso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
  MODIFY `id_expediente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `casos`
--
ALTER TABLE `casos`
  ADD CONSTRAINT `casos_ibfk_1` FOREIGN KEY (`id_abogado`) REFERENCES `user_form` (`id`),
  ADD CONSTRAINT `casos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `user_form` (`id`);

--
-- Filtros para la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD CONSTRAINT `expediente_ibfk_1` FOREIGN KEY (`id_caso`) REFERENCES `casos` (`id_caso`),
  ADD CONSTRAINT `expediente_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `user_form` (`id`);

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_form` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
