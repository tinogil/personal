

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+01:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;



CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `tipo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;



INSERT INTO `categorias` (`id_categoria`, `tipo`) VALUES
(4, 'Humor'),
(3, 'Magazine'),
(2, 'Música'),
(1, 'Noticias');

-- --------------------------------------------------------



CREATE TABLE `dias` (
  `id_dia` int(11) NOT NULL,
  `dias` varchar(25) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;



INSERT INTO `dias` (`id_dia`, `dias`) VALUES
(1, 'Lunes'),
(2, 'Martes'),
(3, 'Miercoles'),
(4, 'Jueves'),
(5, 'Viernes'),
(6, 'Sábado'),
(7, 'Domingo');



CREATE TABLE `empleados` (
  `id_empleado` int(11) NOT NULL,
  `nivel` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `pass` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;



CREATE TABLE `news` (
  `id_noticia` int(11) NOT NULL,
  `titulo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `cuerpo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `card` int(11) NOT NULL,
  `imag` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `activa` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;



CREATE TABLE `niveles` (
  `id_nivel` int(11) NOT NULL,
  `tipo_nivel` varchar(25) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;



INSERT INTO `niveles` (`id_nivel`, `tipo_nivel`) VALUES
(1, 'presentador'),
(2, 'realizador'),
(3, 'webmaster');


CREATE TABLE `planilla_semanal` (
  `id` int(11) NOT NULL,
  `id_programa` int(11) NOT NULL,
  `id_dia` int(11) NOT NULL,
  `horario` varchar(10) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;



CREATE TABLE `programas` (
  `id_programa` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `id_presentador` int(11) NOT NULL,
  `id_realizador` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `desc_ultimo` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `file_ultimo` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_categoria` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;



INSERT INTO `programas` (`id_programa`, `nombre`, `id_presentador`, `id_realizador`, `descripcion`, `imagen`, `desc_ultimo`, `file_ultimo`, `id_categoria`, `activo`) VALUES
(1, 'Descerebrados', 0, 0, 'El programa para los jovenes descerebrados presentado por papá Pitufo', 'indice.jpg', 'Descerebrados visita una piscina con trampolín de balconing', 'Sleep Away.mp3', 4, 1),



ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`),
  ADD UNIQUE KEY `id_categoria` (`id_categoria`),
  ADD UNIQUE KEY `tipo` (`tipo`);


ALTER TABLE `dias`
  ADD PRIMARY KEY (`id_dia`);


ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD UNIQUE KEY `id_empleado` (`id_empleado`);


ALTER TABLE `news`
  ADD PRIMARY KEY (`id_noticia`);

-
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`id_nivel`);


ALTER TABLE `programas`
  ADD PRIMARY KEY (`id_programa`),
  ADD UNIQUE KEY `id_programa` (`id_programa`);




ALTER TABLE `empleados`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `news`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

ALTER TABLE `niveles`
  MODIFY `id_nivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `programas`
  MODIFY `id_programa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
