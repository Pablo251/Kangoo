-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-11-2015 a las 19:29:09
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbkangoo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adressee`
--

CREATE TABLE IF NOT EXISTS `adressee` (
  `id_user` bigint(20) unsigned NOT NULL,
  `id_mail` bigint(20) unsigned NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `email_confirmations`
--

CREATE TABLE IF NOT EXISTS `email_confirmations` (
  `id` bigint(20) unsigned NOT NULL,
  `usersId` bigint(20) unsigned DEFAULT NULL,
  `code` char(32) NOT NULL,
  `createdAt` int(10) unsigned NOT NULL,
  `modifiedAt` int(10) unsigned DEFAULT NULL,
  `confirmed` char(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mail`
--

CREATE TABLE IF NOT EXISTS `mail` (
  `id_mail` bigint(20) unsigned NOT NULL,
  `fk_user` bigint(20) unsigned DEFAULT NULL,
  `state` varchar(10) DEFAULT NULL,
  `subject` text,
  `content` text,
  `date` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` bigint(20) unsigned NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text,
  `email` text,
  `active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adressee`
--
ALTER TABLE `adressee`
  ADD PRIMARY KEY (`id_user`,`id_mail`),
  ADD KEY `id_mail` (`id_mail`);

--
-- Indices de la tabla `email_confirmations`
--
ALTER TABLE `email_confirmations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `usersId` (`usersId`);

--
-- Indices de la tabla `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id_mail`),
  ADD UNIQUE KEY `id_mail` (`id_mail`),
  ADD KEY `fk_user` (`fk_user`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `email_confirmations`
--
ALTER TABLE `email_confirmations`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `mail`
--
ALTER TABLE `mail`
  MODIFY `id_mail` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `adressee`
--
ALTER TABLE `adressee`
  ADD CONSTRAINT `adressee_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `adressee_ibfk_2` FOREIGN KEY (`id_mail`) REFERENCES `mail` (`id_mail`);

--
-- Filtros para la tabla `email_confirmations`
--
ALTER TABLE `email_confirmations`
  ADD CONSTRAINT `email_confirmations_ibfk_1` FOREIGN KEY (`usersId`) REFERENCES `user` (`id_user`);

--
-- Filtros para la tabla `mail`
--
ALTER TABLE `mail`
  ADD CONSTRAINT `mail_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `user` (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
