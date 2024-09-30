-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2024 a las 22:21:02
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
-- Base de datos: `eventos`
--
CREATE DATABASE IF NOT EXISTS `eventos` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `eventos`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `inicio` date NOT NULL,
  `final` date NOT NULL,
  `color` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `inicio`, `final`, `color`, `user`) VALUES
(1, 'Plazo para presentar alegaciones.', '2024-04-17', '2024-04-23', '#37d784', '33'),
(2, 'Cita con Abogado', '2024-04-16', '2024-04-16', '#3774FF', '33'),
(3, 'Presentar papeles en Juzgado.', '2024-04-25', '2024-04-28', '#f207b4', '34'),
(4, 'Plazo para presentar alegaciones.', '2024-04-25', '2024-04-30', '#f2eb07', '36'),
(5, 'Cita con el Abogado', '2024-04-23', '2024-04-23', '#0723f2', '36'),
(6, 'Presentar papeles en Juzgado.', '2024-04-26', '2024-04-26', '#3788d8', '37'),
(7, 'Plazo para presentar alegaciones.', '2024-04-30', '2024-05-07', '#67d737', '39'),
(8, 'Plazo para presentar Pruebas.', '2024-03-20', '2024-04-11', '#67d737', '39'),
(9, 'Cita con el Abogado', '2024-04-16', '2024-04-16', '#374ad7', '39'),
(10, 'Cita con el Abogado', '2024-04-23', '2024-04-23', '#374ad7', '39'),
(11, 'Plazo para presentar alegaciones.', '2024-05-21', '2024-05-28', '#d73737', '40'),
(12, 'Plazo para presentar alegaciones.', '2024-05-21', '2024-05-28', '#d73737', '40'),
(13, 'Presentar papeles Caso Pepe', '2024-04-24', '2024-05-01', '#d7374f', '8'),
(14, 'Cita con Cliente', '2024-04-25', '2024-04-25', '#374ad7', '8'),
(15, 'Cita con cliente.', '2024-05-01', '2024-05-01', '#373cd7', '8'),
(16, 'Cita con cliente.', '2024-05-02', '2024-05-02', '#373cd7', '8'),
(17, 'Cita con cliente.', '2024-05-06', '2024-05-06', '#373cd7', '8'),
(18, 'Cita con cliente.', '2024-05-07', '2024-05-07', '#373cd7', '8'),
(19, 'Cita con cliente.', '2024-05-09', '2024-05-09', '#373cd7', '8'),
(20, 'Cita con cliente.', '2024-04-14', '2024-04-14', '#373cd7', '8'),
(21, 'Cita con cliente.', '2024-04-16', '2024-04-16', '#373cd7', '8'),
(22, 'Presentar citación Juzgado.', '2024-04-18', '2024-04-18', '#37d76f', '8'),
(23, 'Presentar citación Juzgado.', '2024-05-16', '2024-05-16', '#37d76f', '8'),
(24, 'Presentar Desestimación del Caso.', '2024-05-20', '2024-05-24', '#37d76f', '8'),
(25, 'carrera ponle freno', '2023-11-08', '2023-11-08', '#24578a', '8'),
(26, 'carrera ponle freno', '2023-11-08', '2023-11-08', '#24578a', '8'),
(27, 'carrera ponle freno', '2023-11-08', '2023-11-08', '#24578a', '8'),
(28, 'carrera ponle freno', '2024-04-03', '2024-04-03', '#3788d8', '8');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
