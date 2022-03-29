-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-03-2022 a las 07:50:52
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gdlwebcamp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `superuser` tinyint(1) NOT NULL,
  `editado` datetime NOT NULL,
  `foto` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id_admin`, `usuario`, `nombre`, `password`, `superuser`, `editado`, `foto`) VALUES
(2, 'admin2', 'admin', '$2y$12$l3uxhLfZA5xLyPPitOHyaOKVJcaCSjT.EP/W/p2ecD6UKfi.D78am', 0, '2022-03-18 18:55:27', 'user3-128x128'),
(3, 'admin', 'admin', '$2y$12$8nT6spzyML6S9HT2CWKJse8Ttl61O7soNrtS.co6lmjEIP6djz/wG', 1, '2022-03-18 19:02:05', 'user1-128x128');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_evento`
--

CREATE TABLE `categoria_evento` (
  `id_categoria` tinyint(10) NOT NULL,
  `cat_evento` varchar(50) NOT NULL,
  `icono` varchar(16) NOT NULL,
  `editado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria_evento`
--

INSERT INTO `categoria_evento` (`id_categoria`, `cat_evento`, `icono`, `editado`) VALUES
(1, 'Seminarios', 'fa fa-code', NULL),
(2, 'Conferencias', 'fa fa-comment', '2022-03-21 23:14:26'),
(3, 'Talleres', 'fa fa-university', NULL),
(7, 'Workshop', 'fab fa-black-tie', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` tinyint(10) NOT NULL,
  `nombre_evento` varchar(60) NOT NULL,
  `fecha_evento` date NOT NULL,
  `hora_evento` varchar(5) NOT NULL,
  `id_cat_evento` tinyint(10) NOT NULL,
  `id_inv_evento` tinyint(4) NOT NULL,
  `clave` varchar(10) NOT NULL,
  `editado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_evento`, `nombre_evento`, `fecha_evento`, `hora_evento`, `id_cat_evento`, `id_inv_evento`, `clave`, `editado`) VALUES
(1, 'Responsive Web Design', '2022-12-09', '10:00', 3, 1, 'taller_01', '0000-00-00 00:00:00'),
(2, 'Flexbox', '2022-12-09', '12:00', 3, 2, 'taller_02', '0000-00-00 00:00:00'),
(3, 'HTML5 y CSS3', '2022-12-09', '14:00', 3, 3, 'taller_03', '0000-00-00 00:00:00'),
(4, 'Drupal', '2022-12-09', '17:00', 3, 4, 'taller_04', '0000-00-00 00:00:00'),
(5, 'WordPress', '2022-12-09', '19:00', 3, 5, 'taller_05', '0000-00-00 00:00:00'),
(6, 'Como ser freelancer', '2022-12-09', '10:00', 2, 6, 'conf_01', '0000-00-00 00:00:00'),
(7, 'Tecnologías del Futuro', '2022-12-09', '17:00', 2, 1, 'conf_02', '0000-00-00 00:00:00'),
(8, 'Seguridad en la Web', '2022-12-09', '19:00', 2, 2, 'conf_03', '0000-00-00 00:00:00'),
(9, 'Diseño UI y UX para móviles', '2022-12-09', '10:00', 1, 6, 'sem_01', '0000-00-00 00:00:00'),
(10, 'AngularJS', '2022-12-10', '10:00', 3, 1, 'taller_06', '0000-00-00 00:00:00'),
(11, 'PHP y MySQL', '2022-12-10', '12:00', 3, 2, 'taller_07', '0000-00-00 00:00:00'),
(12, 'JavaScript Avanzado', '2022-12-10', '14:00', 3, 3, 'taller_08', '0000-00-00 00:00:00'),
(13, 'SEO en Google', '2022-12-10', '17:00', 3, 4, 'taller_09', '0000-00-00 00:00:00'),
(14, 'De Photoshop a HTML5 y CSS3', '2022-12-10', '19:00', 3, 5, 'taller_10', '0000-00-00 00:00:00'),
(15, 'PHP Intermedio y Avanzado', '2022-12-10', '21:00', 3, 6, 'taller_11', '0000-00-00 00:00:00'),
(16, 'Como crear una tienda online que venda millones en pocos día', '2022-12-10', '10:00', 2, 6, 'conf_04', '0000-00-00 00:00:00'),
(17, 'Los mejores lugares para encontrar trabajo', '2022-12-10', '17:00', 2, 1, 'conf_05', '0000-00-00 00:00:00'),
(18, 'Pasos para crear un negocio rentable ', '2022-12-10', '19:00', 2, 2, 'conf_06', '0000-00-00 00:00:00'),
(19, 'Aprende a Programar en una mañana', '2022-12-10', '10:00', 1, 3, 'sem_02', '0000-00-00 00:00:00'),
(20, 'Diseño UI y UX para móviles', '2022-12-10', '17:00', 1, 5, 'sem_03', '0000-00-00 00:00:00'),
(21, 'Laravel', '2022-12-11', '10:00', 3, 1, 'taller_12', '0000-00-00 00:00:00'),
(22, 'Crea tu propia API', '2022-12-11', '12:00', 3, 2, 'taller_13', '0000-00-00 00:00:00'),
(23, 'JavaScript y jQuery', '2022-12-11', '14:00', 3, 3, 'taller_14', '0000-00-00 00:00:00'),
(24, 'Creando Plantillas para WordPress', '2022-12-11', '17:00', 3, 4, 'taller_15', '0000-00-00 00:00:00'),
(25, 'Tiendas Virtuales en Magento', '2022-12-11', '19:00', 3, 5, 'taller_16', '0000-00-00 00:00:00'),
(26, 'Como hacer Marketing en línea', '2022-12-11', '10:00', 2, 6, 'conf_07', '0000-00-00 00:00:00'),
(27, '¿Con que lenguaje debo empezar?', '2022-12-11', '17:00', 2, 2, 'conf_08', '0000-00-00 00:00:00'),
(28, 'Frameworks y librerias Open Source', '2022-12-11', '19:00', 2, 3, 'conf_09', '0000-00-00 00:00:00'),
(29, 'Creando una App en Android en una mañana', '2022-12-11', '10:00', 1, 4, 'sem_04', '0000-00-00 00:00:00'),
(30, 'Creando una App en iOS en una tarde', '2022-12-11', '17:00', 1, 1, 'sem_05', '0000-00-00 00:00:00'),
(31, 'Angular 5', '2022-12-10', '14:00', 7, 5, '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitados`
--

CREATE TABLE `invitados` (
  `id_invitado` tinyint(4) NOT NULL,
  `nombre_invitado` varchar(30) NOT NULL,
  `apellido_invitado` varchar(30) NOT NULL,
  `descripcion_invitado` text NOT NULL,
  `url_imagen` varchar(50) NOT NULL,
  `editado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `invitados`
--

INSERT INTO `invitados` (`id_invitado`, `nombre_invitado`, `apellido_invitado`, `descripcion_invitado`, `url_imagen`, `editado`) VALUES
(1, 'Rafael', 'Bautista', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, possimus porro saepe iusto doloremque numquam quas optio ratione aut, iste libero eius nemo deleniti magni? Autem at placeat quasi ut.', 'invitado1.jpg', '2022-03-22 15:49:21'),
(2, 'Shari', 'Herrera', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, possimus porro saepe iusto doloremque numquam quas optio ratione aut, iste libero eius nemo deleniti magni? Autem at placeat quasi ut.', 'invitado2.jpg', NULL),
(3, 'Gregorio', 'Sanchez', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, possimus porro saepe iusto doloremque numquam quas optio ratione aut, iste libero eius nemo deleniti magni? Autem at placeat quasi ut.', 'invitado3.jpg', '2022-03-22 15:38:42'),
(4, 'Susana', 'Rivera', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, possimus porro saepe iusto doloremque numquam quas optio ratione aut, iste libero eius nemo deleniti magni? Autem at placeat quasi ut.', 'invitado4.jpg', NULL),
(5, 'Harold', 'Garcia', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, possimus porro saepe iusto doloremque numquam quas optio ratione aut, iste libero eius nemo deleniti magni? Autem at placeat quasi ut.', 'invitado5.jpg', '2022-03-22 15:47:40'),
(6, 'Susan', 'Sanchez', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, possimus porro saepe iusto doloremque numquam quas optio ratione aut, iste libero eius nemo deleniti magni? Autem at placeat quasi ut.', 'invitado6.jpg', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regalos`
--

CREATE TABLE `regalos` (
  `id_regalo` int(11) NOT NULL,
  `nombre_regalo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `regalos`
--

INSERT INTO `regalos` (`id_regalo`, `nombre_regalo`) VALUES
(2, 'Etiquetas'),
(3, 'Plumas'),
(1, 'Pulseras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrados`
--

CREATE TABLE `registrados` (
  `id_registrado` bigint(20) UNSIGNED NOT NULL,
  `nombre_registrado` varchar(50) NOT NULL,
  `apellido_registrado` varchar(50) NOT NULL,
  `email_registrado` varchar(100) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `pases_articulos` longtext NOT NULL,
  `talleres_registrados` longtext NOT NULL,
  `regalo` varchar(50) NOT NULL,
  `total_pagado` varchar(50) NOT NULL,
  `pagado` int(1) DEFAULT NULL,
  `editado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registrados`
--

INSERT INTO `registrados` (`id_registrado`, `nombre_registrado`, `apellido_registrado`, `email_registrado`, `fecha_registro`, `pases_articulos`, `talleres_registrados`, `regalo`, `total_pagado`, `pagado`, `editado`) VALUES
(25, 'Jose', 'Arroyave', 'poer0601@hotmail.com', '2022-03-24 15:20:07', '{\"pase_dia\":1,\"pase_completo\":1,\"dos_dias\":1,\"camisas\":4,\"etiquetas\":1}', '{\"eventos\":[\"conf_01\",\"conf_03\"]}', 'Plumas', '164.2', 0, '2022-03-25 09:20:43'),
(29, 'Jose', 'Arroyave', 'poer0601@hotmail.com', '2022-03-24 18:39:25', '{\"pase_dia\":2,\"pase_completo\":3,\"dos_dias\":4,\"camisas\":4,\"etiquetas\":5}', '{\"eventos\":[\"conf_04\"]}', 'Plumas', '437.2', 1, '2022-03-24 13:18:49'),
(30, 'Octavio', 'Mesa', 'poer0601@hotmail.com', '2022-03-24 19:22:29', '{\"pase_dia\":2,\"pase_completo\":3,\"dos_dias\":4,\"camisas\":5,\"etiquetas\":6}', '{\"eventos\":[\"taller_16\"]}', 'Etiquetas', '448.5', 1, '2022-03-25 09:23:33'),
(31, 'Jose', 'Arroyave', 'poer0601@hotmail.com', '2022-03-25 15:23:59', '{\"pase_dia\":1,\"pase_completo\":1,\"dos_dias\":1,\"camisas\":1,\"etiquetas\":1}', '{\"eventos\":[\"conf_03\"]}', 'Etiquetas', '136.3', 0, NULL),
(32, 'Jose', 'Arroyave', 'poer0601@hotmail.com', '2022-03-25 15:24:18', '{\"pase_dia\":1,\"pase_completo\":3,\"dos_dias\":1,\"camisas\":1,\"etiquetas\":1}', '{\"eventos\":[\"conf_03\"]}', 'Pulseras', '236.3', 1, NULL),
(33, 'Jose', 'Arroyave', 'poer0601@hotmail.com', '2022-03-28 22:58:48', '{\"pase_dia\":1,\"camisas\":1,\"etiquetas\":1}', '{\"eventos\":[\"conf_03\",\"taller_01\",\"taller_02\",\"taller_03\",\"taller_04\"]}', 'Pulseras', '41.3', 0, NULL),
(34, 'Jose', 'Arroyave', 'poer0601@hotmail.com', '2022-03-29 05:09:32', '{\"pase_dia\":1,\"camisas\":1,\"etiquetas\":1}', '{\"eventos\":[\"sem_01\",\"conf_02\",\"conf_03\",\"taller_02\",\"taller_03\"]}', 'Etiquetas', '41.3', 1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `categoria_evento`
--
ALTER TABLE `categoria_evento`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `id_cat_evento` (`id_cat_evento`),
  ADD KEY `id_inv_evento` (`id_inv_evento`);

--
-- Indices de la tabla `invitados`
--
ALTER TABLE `invitados`
  ADD PRIMARY KEY (`id_invitado`);

--
-- Indices de la tabla `regalos`
--
ALTER TABLE `regalos`
  ADD PRIMARY KEY (`id_regalo`),
  ADD KEY `nombre_regalo` (`nombre_regalo`);

--
-- Indices de la tabla `registrados`
--
ALTER TABLE `registrados`
  ADD PRIMARY KEY (`id_registrado`),
  ADD KEY `regalo` (`regalo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categoria_evento`
--
ALTER TABLE `categoria_evento`
  MODIFY `id_categoria` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` tinyint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `invitados`
--
ALTER TABLE `invitados`
  MODIFY `id_invitado` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `regalos`
--
ALTER TABLE `regalos`
  MODIFY `id_regalo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `registrados`
--
ALTER TABLE `registrados`
  MODIFY `id_registrado` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_cat_evento`) REFERENCES `categoria_evento` (`id_categoria`),
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`id_inv_evento`) REFERENCES `invitados` (`id_invitado`);

--
-- Filtros para la tabla `registrados`
--
ALTER TABLE `registrados`
  ADD CONSTRAINT `registrados_ibfk_1` FOREIGN KEY (`regalo`) REFERENCES `regalos` (`nombre_regalo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
