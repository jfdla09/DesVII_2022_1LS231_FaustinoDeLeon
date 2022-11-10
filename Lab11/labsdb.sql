-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2022 a las 02:45:54
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `labsdb`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_votos` (IN `param_votos1` VARCHAR(255), IN `param_votos2` VARCHAR(255))   BEGIN
	SET @s=CONCAT("UPDATE votos SET votos1=", param_votos1 ,", votos2=", param_votos2);
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultar_valor` ()   BEGIN 
SELECT valor FROM paginacion; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_decremento` ()   BEGIN 
UPDATE paginacion
SET valor = valor - 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_incremento` ()   BEGIN 
UPDATE paginacion
SET valor = valor + 1; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_noticias` ()   BEGIN
	SELECT id, titulo, texto, categoria, fecha, imagen FROM noticias;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_noticias_filtro` (IN `param_campo` VARCHAR(255), IN `param_valor` VARCHAR(255))   BEGIN
	SET @s = CONCAT("SELECT id, titulo, texto, categoria, fecha, imagen FROM noticias WHERE ", param_campo, " Like CONCAT('%", param_valor ,"%')");
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_noticias_filtro2` ()   BEGIN
	SELECT id, titulo, texto, categoria, fecha, imagen FROM noticias LIMIT 5;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_noticias_pag` (IN `param_lm` VARCHAR(30), IN `param_os` VARCHAR(30))   BEGIN
SET @s = CONCAT("SELECT id, titulo, texto, categoria, fecha, imagen\r\n                 FROM noticias LIMIT ", param_lm ," OFFSET ", param_os);
PREPARE stmt FROM @s;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_votos` ()   BEGIN
	SELECT votos1, votos2 FROM votos;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `titulo` varchar(100) NOT NULL DEFAULT '',
  `texto` text NOT NULL,
  `categoria` enum('promociones','ofertas','costas') NOT NULL DEFAULT 'promociones',
  `fecha` date NOT NULL,
  `imagen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `texto`, `categoria`, `fecha`, `imagen`) VALUES
(1, 'Nueva promocion en Ciudad Cristal', '145 viviendas\r\nde lujo en urbanizacion ajardinada situadas en un entorno privilegiado', 'promociones', '2019-02-04', NULL),
(2, 'Ultimas viviendas junto al rio', 'Apartamentos de 1\r\ny 2 dormitorios, con fantasticas vistas. Excelentes condiciones de financiacion.', 'ofertas', '2019-02-05', NULL),
(3, 'Apartamentos en el Puerto de San Martin', 'En la\r\nPlaya del Sol, en primera linea de playa. Pisos reformados y completamente\r\namueblados.', 'costas', '2019-02-06', 'apartamento8.jpg'),
(4, 'Casa reformada en el barrio de la Palmera', 'Dos\r\nplantas y atico, 5 habitaciones, patio interior, amplio garaje. Situada en una calle\r\ntranquila y a un paso del centro historico.', 'promociones', '2019-02-07', NULL),
(5, 'Promocion en Costa Mar', 'Con vistas al campo de\r\ngolf, magnificas calidades, entorno ajardinado con piscina y servicio de\r\nvigilancia.', 'costas', '2019-02-09', 'apartamento9.jpg'),
(6, 'Nuevas Viviendas en Coco del Mar', 'Excelentes acabados, nuevos modelos, lo mejor de la ciudad. Vengan a verlas, son irresistibles', 'costas', '2016-10-04', NULL),
(7, 'Nuevas Viviendas en Coco del Mar', 'Excelentes acabados, nuevos modelos, lo mejor de la ciudad. Vengan a verlas, son irresistibles', 'costas', '1970-01-01', NULL),
(8, 'Nueva promocion en Ciudad Cristal 2', '145 viviendas\r\nde lujo en urbanizacion ajardinada situadas en un entorno privilegiado 2', '', '2022-02-04', NULL),
(9, 'Ultimas viviendas junto al rio 2', 'Apartamentos de 1\r\ny 2 dormitorios, con fantasticas vistas. Excelentes condiciones de financiacion. 2', '', '2022-02-05', NULL),
(10, 'Apartamentos en el Puerto de San Martin 2', 'En la\r\nPlaya del Sol, en primera linea de playa. Pisos reformados y completamente\r\namueblados. 2', '', '2022-02-06', 'apartamento8.jpg'),
(11, 'Casa reformada en el barrio de la Palmera 2', 'Dos\r\nplantas y atico, 5 habitaciones, patio interior, amplio garaje. Situada en una calle\r\ntranquila y a un paso del centro historico. 2', '', '2022-02-07', NULL),
(12, 'Promocion en Costa Mar 2', 'Con vistas al campo de\r\ngolf, magnificas calidades, entorno ajardinado con piscina y servicio de\r\nvigilancia. 2', '', '2022-02-09', 'apartamento9.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paginacion`
--

CREATE TABLE `paginacion` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `valor` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paginacion`
--

INSERT INTO `paginacion` (`id`, `valor`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votos`
--

CREATE TABLE `votos` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `votos1` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `votos2` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `votos`
--

INSERT INTO `votos` (`id`, `votos1`, `votos2`) VALUES
(1, 51, 14);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paginacion`
--
ALTER TABLE `paginacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `votos`
--
ALTER TABLE `votos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `paginacion`
--
ALTER TABLE `paginacion`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `votos`
--
ALTER TABLE `votos`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
