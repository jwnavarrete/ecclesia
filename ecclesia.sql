-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2018 a las 05:07:24
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecclesia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_about`
--

CREATE TABLE `ici_about` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `enlace` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `panel` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8_spanish_ci DEFAULT 'about.jpg',
  `titulo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `orden` int(11) NOT NULL,
  `extra` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ici_about`
--

INSERT INTO `ici_about` (`id`, `name`, `enlace`, `panel`, `foto`, `titulo`, `descripcion`, `orden`, `extra`) VALUES
(1, 'Valores', '#Valores', 'Valores', 'f20a30563f2760a118cb49ffbac2232d.jpg', 'Valores', '“Si aprendes a amar, tienes muchas probabilidades de que la felicidad llame a tu puerta”, asegura el libro La fórmula de la felicidad. La matemática del bienestar. Está claro que el ser humano necesita amor. Sin él no puede ser verdaderamente feliz.\r\n', 1, ''),
(2, 'Mision', '#Mision', 'Mision', 'e9b01d4a3ca378e8f50b96cde48b48f8.png', 'Misión', 'Capacitar líderes Nacionales e Internacionales para que puedan compartir la palabra y traiga un crecimiento en la iglesia en miembro y madures.\r\n', 2, ''),
(3, 'Vision', '#Vision', 'Vision', 'c984a84397dd24fdaea6edcae9169d29.jpg', 'Visión', 'Convertir a nuevos  creyentes en discípulos para cristo. ', 3, ''),
(4, 'Credo', '#Credo', 'Credo', 'about.jpg', 'Credo', 'Creemos que la salvación se obtiene por medio del arrepentimiento y la confesión de pecados; es dada por gracia divina (no por obras) y se recibe por la fe en Cristo Jesús. Pues, Él es el único mediador entre Dios y los hombres. (Hechos 4:12).', 4, ''),
(5, 'Mapa', '#Mapa', 'Mapa', '6b911d47fa395bede319d7f0435ad278.png', 'Ubicanos', 'Encuentranos a través de google maps y obtén la direccion exacta de nuestra iglesia, por favor dar clic en el siguiente enlace para mayor información.', 5, '<a target=\"blank\" href=\"https://www.google.com/maps/place/2%C2%B010\'14.9%22S+79%C2%B047\'54.3%22W/@-2.1743091,-79.7988953,16z/data=!4m6!3m5!1s0x902d6bc7a437cc4d:0x2036750e71ce6c72!7e2!8m2!3d-2.1708185!4d-79.7984205?hl=en\">Clic Aqui</a>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_activations`
--

CREATE TABLE `ici_activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_asistencia_child`
--

CREATE TABLE `ici_asistencia_child` (
  `idCrono` int(11) NOT NULL,
  `idChild` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `asiste` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_asistencia_cursos`
--

CREATE TABLE `ici_asistencia_cursos` (
  `idCrono` int(10) NOT NULL,
  `idUsuario` int(10) UNSIGNED NOT NULL,
  `asiste` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ici_asistencia_cursos`
--

INSERT INTO `ici_asistencia_cursos` (`idCrono`, `idUsuario`, `asiste`) VALUES
(4, 18, 1),
(4, 20, 1),
(4, 26, 1),
(5, 18, 0),
(5, 20, 1),
(5, 26, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_catalogo`
--

CREATE TABLE `ici_catalogo` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `data` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'A',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ici_catalogo`
--

INSERT INTO `ici_catalogo` (`id`, `nombre`, `descripcion`, `data`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Pastor', 'Pastor de iglesia', 'G', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(2, 'Tesorero', 'Tesorero de iglesia', 'G', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(3, 'Miembro', 'Miembro de iglesia', 'G', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(4, 'Visitante', 'Visitante de iglesia', 'G', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(5, 'Oyente', 'Oyente de iglesia', 'G', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(6, 'Lider', 'Lider de iglesia', 'G', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(7, 'Enero', '', 'M', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(8, 'Febrero', '', 'M', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(9, 'Marzo', '', 'M', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(10, 'Abril', '', 'M', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(11, 'Mayo', '', 'M', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(12, 'Junio', '', 'M', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(13, 'Julio', '', 'M', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(14, 'Agosto', '', 'M', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(15, 'Septiembre', '', 'M', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(16, 'Octubre', '', 'M', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(17, 'Noviembre', '', 'M', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(18, 'Diciembre', '', 'M', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(19, 'Ecuador', '', 'P', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(20, 'Chile', '', 'P', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(21, 'Peru', '', 'P', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(22, 'Colombia', '', 'P', 'A', '2018-03-01 08:29:05', '2018-03-01 08:29:05'),
(23, 'Guayaquil', '', 'C', 'A', '2018-03-01 08:29:05', '2018-03-01 08:29:05'),
(24, 'Quito', '', 'C', 'A', '2018-03-01 08:29:05', '2018-03-01 08:29:05'),
(25, '', '', 'C', 'A', '2018-03-01 08:29:05', '2018-03-01 08:29:05'),
(26, 'Lima', '', 'C', 'A', '2018-03-01 08:29:05', '2018-03-01 08:29:05'),
(27, 'Columna debido a', 'Lesion, enfermedad, congenito', 'S', 'A', '2018-07-15 08:29:05', '2018-07-15 08:29:05'),
(28, 'Pie izquierdo debido a', 'Lesion, enfermedad, congenito', 'S', 'A', '2018-07-15 08:29:05', '2018-07-15 08:29:05'),
(29, 'Pie derecho debido a', 'Lesion, enfermedad, congenito', 'S', 'A', '2018-07-15 08:29:05', '2018-07-15 08:29:05'),
(30, 'Mano izquierda debido a', 'Lesion, enfermedad, congenito', 'S', 'A', '2018-07-15 08:29:05', '2018-07-15 08:29:05'),
(31, 'Mano derecha debido a', 'Lesion, enfermedad, congenito', 'S', 'A', '2018-07-15 08:29:05', '2018-07-15 08:29:05'),
(32, 'Pierna izquierda debido a', 'Lesion, enfermedad, congenito', 'S', 'A', '2018-07-15 08:29:05', '2018-07-15 08:29:05'),
(33, 'Pierna derecha debido a', 'Lesion, enfermedad, congenito', 'S', 'A', '2018-07-15 08:29:05', '2018-07-15 08:29:05'),
(34, 'Brazo izquierdo debido a', 'Lesion, enfermedad, congenito', 'S', 'A', '2018-07-15 08:29:05', '2018-07-15 08:29:05'),
(35, 'Brazo derecho debido a', 'Lesion, enfermedad, congenito', 'S', 'A', '2018-07-15 08:29:05', '2018-07-15 08:29:05'),
(36, 'Oido izquierdo', 'tiene defecto, Sordo', 'OIDO', 'A', '2018-07-15 08:29:05', '2018-07-15 08:29:05'),
(37, 'Oido derecho', 'tiene defecto, Sordo', 'OIDO', 'A', '2018-07-15 08:29:05', '2018-07-15 08:29:05'),
(38, 'Ojo isquierdo', 'tiene defecto, Ciego', 'OJO', 'A', '2018-07-15 08:29:05', '2018-07-15 08:29:05'),
(39, 'Ojo derecho', 'tiene defecto, Ciego', 'OJO', 'A', '2018-07-15 08:29:05', '2018-07-15 08:29:05'),
(40, 'Guarderia / Preescolar', '', 'EDU', 'A', '2018-07-15 08:29:05', '2018-07-15 08:29:05'),
(41, 'Primero de basica (Kinder)', '', 'EDU', 'A', '2018-07-15 08:29:05', '2018-07-15 08:29:05'),
(42, '2do de basica a 7mo de basica (Primaria)', '', 'EDU', 'A', '2018-07-15 08:29:05', '2018-07-15 08:29:05'),
(43, '8vo a 10mo de basica (Secundaria)', '', 'EDU', 'A', '2018-07-15 08:29:05', '2018-07-15 08:29:05'),
(44, '1ro a 3ro de bachillerato', '', 'EDU', 'A', '2018-07-15 08:29:05', '2018-07-15 08:29:05'),
(45, 'Padre', '', 'GUAR', 'A', '2018-03-01 08:29:05', '2018-03-01 08:29:05'),
(46, 'Madre', '', 'GUAR', 'A', '2018-03-01 08:29:05', '2018-03-01 08:29:05'),
(47, 'Tio', '', 'GUAR', 'A', '2018-03-01 08:29:05', '2018-03-01 08:29:05'),
(48, 'Tia', '', 'GUAR', 'A', '2018-03-01 08:29:05', '2018-03-01 08:29:05'),
(49, 'Hermano', '', 'GUAR', 'A', '2018-03-01 08:29:05', '2018-03-01 08:29:05'),
(50, 'Hermana', '', 'GUAR', 'A', '2018-03-01 08:29:05', '2018-03-01 08:29:05'),
(51, 'Abuelo', '', 'GUAR', 'A', '2018-03-01 08:29:05', '2018-03-01 08:29:05'),
(52, 'Abuela', '', 'GUAR', 'A', '2018-03-01 08:29:05', '2018-03-01 08:29:05'),
(53, 'Padrastro', '', 'GUAR', 'A', '2018-03-01 08:29:05', '2018-03-01 08:29:05'),
(54, 'Madrastra', '', 'GUAR', 'A', '2018-03-01 08:29:05', '2018-03-01 08:29:05'),
(55, 'Padrino', '', 'GUAR', 'A', '2018-03-01 08:29:05', '2018-03-01 08:29:05'),
(56, 'Madrina', '', 'GUAR', 'A', '2018-03-01 08:29:05', '2018-03-01 08:29:05'),
(57, 'Amigos', '', 'GUAR', 'A', '2018-03-01 08:29:05', '2018-03-01 08:29:05'),
(58, 'Trabajadores institucionales', '', 'GUAR', 'A', '2018-03-01 08:29:05', '2018-03-01 08:29:05'),
(59, 'Padres adoptivos', '', 'GUAR', 'A', '2018-03-01 08:29:05', '2018-03-01 08:29:05'),
(60, 'Otros Parientes', '', 'GUAR', 'A', '2018-03-01 08:29:05', '2018-03-01 08:29:05'),
(61, 'Escuela Dominical / Iglesia', '', 'ACT', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(62, 'Escuela Biblica vacacional', '', 'ACT', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(63, 'Sociedad de Jovenes', '', 'ACT', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(64, 'Coro', '', 'ACT', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(65, 'Clase Biblica', '', 'ACT', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(66, 'Campamento', '', 'ACT', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(67, 'Otras', '', 'ACT', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(68, 'Lava Ropa', '', 'OBLI', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(69, 'Limpia Asea', '', 'OBLI', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(70, 'Costura', '', 'OBLI', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(71, 'Ayuda en la Cocina', '', 'OBLI', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(72, 'Huerto Granja', '', 'OBLI', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(73, 'Cuida Animales', '', 'OBLI', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(74, 'Recoge Leña', '', 'OBLI', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(75, 'Mandado', '', 'OBLI', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(76, 'Recoge Agua', '', 'OBLI', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(77, 'Enseña a Otros', '', 'OBLI', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(78, 'Cuida a menores', '', 'OBLI', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(79, 'Compra, Vende en el mercado', '', 'OBLI', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(80, 'Muñecas', '', 'PASA', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(81, 'La casita', '', 'PASA', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(82, 'Mascateta', '', 'PASA', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(83, 'Escondidas', '', 'PASA', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(84, 'Leer', '', 'PASA', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(85, 'Cantar', '', 'PASA', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(86, 'Juegos en Grupos', '', 'PASA', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(87, 'Hula Hula', '', 'PASA', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(88, 'Bolas/Canicas', '', 'PASA', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(89, 'Carros', '', 'PASA', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(90, 'Arte/Dibujar', '', 'PASA', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(91, 'Esuchar Musica', '', 'PASA', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(92, 'Futbol', '', 'PASA', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(93, 'Beisbol', '', 'PASA', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(94, 'Basketball', '', 'PASA', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(95, 'Voleiball', '', 'PASA', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(96, 'Ping Pong', '', 'PASA', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(97, 'Juegos de Pelota', '', 'PASA', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(98, 'Bicicleta', '', 'PASA', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(99, 'Caminatas', '', 'PASA', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(100, 'Nadar', '', 'PASA', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(101, 'Correr', '', 'PASA', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(102, 'Saltar  la Soga', '', 'PASA', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(103, 'Contar historias', '', 'PASA', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(104, 'Ninguna', '', 'ENFE', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(105, 'Retardo Mental', '', 'ENFE', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(106, 'Epilepsia', '', 'ENFE', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(107, 'Asma', '', 'ENFE', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(108, 'Polio', '', 'ENFE', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04'),
(109, 'Otra', '', 'ENFE', 'A', '2018-03-01 08:29:04', '2018-03-01 08:29:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_comp_child`
--

CREATE TABLE `ici_comp_child` (
  `codigo` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sexo` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `primerNombre` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `segundoNombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellidoPaterno` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellidoMaterno` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombreComun` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `domicilio` text COLLATE utf8_spanish_ci,
  `actividades` varchar(99) COLLATE utf8_spanish_ci NOT NULL,
  `obligaciones` varchar(99) COLLATE utf8_spanish_ci NOT NULL,
  `pasatiempos` varchar(99) COLLATE utf8_spanish_ci NOT NULL,
  `enfermedades` varchar(99) COLLATE utf8_spanish_ci NOT NULL,
  `lesiones` varchar(99) COLLATE utf8_spanish_ci NOT NULL,
  `defectohabla` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `defectooido` varchar(99) COLLATE utf8_spanish_ci NOT NULL,
  `defectovista` varchar(99) COLLATE utf8_spanish_ci NOT NULL,
  `asisteescuela` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `razonnonsiste` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `mejormateria` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `encargados` varchar(99) COLLATE utf8_spanish_ci NOT NULL,
  `padresjuntos` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `padrenatural` varchar(99) COLLATE utf8_spanish_ci NOT NULL,
  `madrenatural` varchar(99) COLLATE utf8_spanish_ci NOT NULL,
  `numerohijos` int(11) DEFAULT NULL,
  `numerohijas` int(11) DEFAULT NULL,
  `hermanoscompassion` varchar(99) COLLATE utf8_spanish_ci DEFAULT NULL,
  `detalle` text COLLATE utf8_spanish_ci,
  `foto` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'child.png',
  `niveleducacion` char(4) COLLATE utf8_spanish_ci NOT NULL,
  `promedioescolar` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `padreguardian` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `madreguardian` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `estadocivil` char(4) COLLATE utf8_spanish_ci NOT NULL,
  `grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ici_comp_child`
--

INSERT INTO `ici_comp_child` (`codigo`, `sexo`, `fechaNacimiento`, `primerNombre`, `segundoNombre`, `apellidoPaterno`, `apellidoMaterno`, `nombreComun`, `domicilio`, `actividades`, `obligaciones`, `pasatiempos`, `enfermedades`, `lesiones`, `defectohabla`, `defectooido`, `defectovista`, `asisteescuela`, `razonnonsiste`, `mejormateria`, `encargados`, `padresjuntos`, `padrenatural`, `madrenatural`, `numerohijos`, `numerohijas`, `hermanoscompassion`, `detalle`, `foto`, `niveleducacion`, `promedioescolar`, `padreguardian`, `madreguardian`, `estadocivil`, `grupo`) VALUES
('ECU-1234', 'M', '2017-08-12', 'Zaid', 'Caleb', 'Navarrete', 'Fun-Sang', 'Zaid', 'recreo ', '[\"61\",\"62\"]', '[\"68\",\"69\"]', '[\"80\",\"81\"]', '[\"107\"]', '[\"27\",\"28\"]', 'S', '[\"36\"]', '[\"39\"]', 'S', 'si asiste xq?', 'ingles', '[\"47\"]', 'S', '[\"vivo\"]', '[\"viviendo\"]', 1, 2, '[]', 'todo bien ', 'ECU-1234.jpg', '41', 'A', '0', '1', '2', 1),
('ECU-4760', 'M', '1997-06-07', 'Matias', 'Roberto', 'Rivas', 'Alvarez', 'Mateo', 'recreo', '[\"61\",\"62\",\"63\"]', '[\"70\",\"71\"]', '[\"81\",\"83\"]', '[]', '[]', 'N', '[]', '[]', 'N', '', 'matematicas', '[]', 'N', '[]', '[]', 0, 0, '[]', '', 'ECU-4760.jpg', '', '', '', '', '', 1),
('ECU-4761', 'M', '1997-07-06', 'Carlos', 'Alberto', 'Fun-Sang', 'Pinargote', 'Carlitos', 'recreo', '[\"61\",\"62\",\"63\"]', '[\"70\",\"71\"]', '[\"81\",\"83\"]', '[]', '[\"27\",\"28\"]', 'S', '[\"36\"]', '[]', 'N', '', 'matematicas', '[]', 'N', '[]', '[]', 0, 0, '[]', '', 'ECU-4761.JPG', '', '', '', '', '', 1),
('ECU-1235', 'F', '2007-12-07', 'Zeling', 'Lilis', 'Fun- Sang', 'Pinargote', 'Zeling', 'recreo ', '[\"61\",\"62\"]', '[\"68\"]', '[\"80\"]', '[]', '[\"27\",\"28\",\"29\",\"30\"]', 'S', '[\"36\"]', '[]', 'N', 'si asiste', 'ingles', '[]', 'N', '[]', '[]', 1, 0, '[]', 'todo bien ', 'ECU-1235.JPG', '', '', '', '', '', 1),
('ECU-1236', 'F', '2018-04-07', 'Yailing', 'Leonela', 'Fun-Sang', 'Pinargote', 'Yailing', 'recreo', '[\"61\"]', '[\"71\"]', '[\"84\"]', '[\"104\"]', '[]', 'N', '[]', '[]', 'S', '', 'Educación física', '[\"46\",\"53\"]', 'N', '[\"vivo\",\"contribuye\"]', '[\"vivo\",\"viviendo\"]', 0, 4, '[]', 'todo bien mi panas', 'ECU-1236.JPG', '43', 'P', '0', '', '3', 1),
('ECU-4768', 'M', '2018-03-07', 'Sebastian', 'Daniel', 'Fun-Sang', 'Pinargote', 'Sebas', 'recreo', '[\"61\",\"62\",\"63\"]', '[\"70\",\"71\"]', '[\"81\",\"83\"]', '[]', '[\"27\",\"28\"]', 'S', '[\"36\"]', '[]', 'N', '', 'matematicas', '[]', 'N', '[]', '[]', 0, 0, '[]', '', 'ECU-4768.JPG', '', '', '', '', '', 1),
('ECU-1237', 'M', '2018-07-04', 'Carlos', 'Esteban', 'Silva', 'Acosta', 'Carlos', 'Urdesa', '[\"61\"]', '[\"68\"]', '[\"80\"]', '[]', '[]', 'N', '[]', '[]', 'N', '', '', '[]', 'N', '[]', '[]', 0, 0, '[]', '', 'ECU-1237.jpg', '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_comp_grupos`
--

CREATE TABLE `ici_comp_grupos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `edad_minima` int(11) NOT NULL,
  `edad_maxima` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ici_comp_grupos`
--

INSERT INTO `ici_comp_grupos` (`id`, `nombre`, `descripcion`, `edad_minima`, `edad_maxima`, `capacidad`) VALUES
(1, 'Grupo A', 'Niños desde cuatro a cinco de edad', 4, 5, 20),
(2, 'Grupo B', 'Niños desde seis a siete años de edad', 6, 7, 20),
(3, 'Grupo C', 'Niños desde ocho a nueve años de edad', 8, 9, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_comp_grupos_tutores`
--

CREATE TABLE `ici_comp_grupos_tutores` (
  `idGrupo` int(11) NOT NULL,
  `idTutor` varchar(13) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ici_comp_grupos_tutores`
--

INSERT INTO `ici_comp_grupos_tutores` (`idGrupo`, `idTutor`) VALUES
(1, '0940528110'),
(2, '0940528110'),
(3, '0953524873');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_convenio`
--

CREATE TABLE `ici_convenio` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `contrato` varchar(100) NOT NULL,
  `imagenes` text NOT NULL,
  `ruta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ici_convenio`
--

INSERT INTO `ici_convenio` (`id`, `titulo`, `descripcion`, `contrato`, `imagenes`, `ruta`) VALUES
(1, 'Convenio Universidad Guayaquil', 'Yo, Geovanni Bohórquez, en mi calidad de representante de la Iglesia de Cristo Iberoamericana del Recreo (ICIR), autorizo y me comprometo en unión a los estudiantes de la Universidad de Guayaquil, Facultad de Ingeniería Industrial en la carrera de Licenciatura de Sistemas de Información representada por el Decano de la Carrera José Antonio Caicedo Salazar y el Señor Ulises Villacís Chancay como Gestor de Proyectos de Vinculación con la Comunidad, en brindar el tiempo y la disposición necesaria para llevar a cabo este proyecto, así mismo cumplir con todas las actividades que demanden para desarrollar el Proyecto: Portal Web "ICIR – IGLESIA DE CRISTO IBEROAMERICA DEL RECREO”.', 'Contrato.docx', '[\"IMAGENUG.jpg\",\"LOGOFIIUG.jpg\",\"logoug.jpg\"]', '/img/universidad/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_cronograma_child`
--

CREATE TABLE `ici_cronograma_child` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `created` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Block',
  `url` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `grupo` int(11) DEFAULT NULL,
  `tutor` char(13) COLLATE utf8_spanish_ci NOT NULL,
  `comentario` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ici_cronograma_child`
--

INSERT INTO `ici_cronograma_child` (`id`, `title`, `description`, `start_date`, `end_date`, `created`, `status`, `url`, `grupo`, `tutor`, `comentario`) VALUES
(1, 'actividad 1', 'dia del nino', '2018-08-25 00:00:00', '2018-08-25 00:00:00', '2018-08-25 00:00:00', 1, 'listaChildGrupo', 1, '0940528110', NULL),
(2, 'actividad 2', 'dia del nino', '2018-08-27 00:00:00', '2018-08-27 00:00:00', '2018-08-25 00:00:00', 1, 'listaChildGrupo', 1, '0940528110', NULL),
(3, 'actividad 3', 'dia del nino', '2018-08-30 00:00:00', '2018-08-30 00:00:00', '2018-08-25 00:00:00', 1, 'listaChildGrupo', 1, '0940528110', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_cronograma_cursos`
--

CREATE TABLE `ici_cronograma_cursos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `created` datetime NOT NULL,
  `url` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `comentario` text COLLATE utf8_spanish_ci NOT NULL,
  `curso` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ici_cronograma_cursos`
--

INSERT INTO `ici_cronograma_cursos` (`id`, `title`, `description`, `start_date`, `end_date`, `created`, `url`, `comentario`, `curso`) VALUES
(4, 'bienvenida', 'conocernos', '2018-10-25 10:30:00', '2018-10-25 18:30:00', '2018-10-05 01:51:17', '.', 'todo bien, los niños se portaron de maravilla el dia de hoy ', 5),
(5, 'afinacion ', 'afinacion con diapason', '2018-10-26 08:10:00', '2018-10-26 13:10:00', '2018-10-05 02:19:50', '.', '', 5),
(7, 'escala', 'escala de acordes', '2018-10-27 13:10:00', '2018-10-27 16:10:00', '2018-10-05 02:27:00', '.', '', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_cursos`
--

CREATE TABLE `ici_cursos` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `maestro` int(10) DEFAULT NULL,
  `detalle` text COLLATE utf8_unicode_ci NOT NULL,
  `capacidad` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '1',
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'curso.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ici_cursos`
--

INSERT INTO `ici_cursos` (`id`, `titulo`, `maestro`, `detalle`, `capacidad`, `estado`, `foto`, `created_at`, `updated_at`) VALUES
(5, 'Curso de Guitarra', 1, 'Afinacion, notas mayores y menores', 20, 1, '3936277c6d41f620aad36d674e187747.png', '2018-10-05 06:50:34', '2018-10-05 06:50:34'),
(6, 'ROBOTICA', 1, 'EN ESTE CURSO SE PRESENTA UNA BREVE INTRODUCCIÓN A LA ROBOTICA ', 15, 1, '2df4dfe45c3d544650fcb7c2ace51a82.jpg', '2018-10-22 04:45:54', '2018-10-22 09:25:29'),
(7, 'Ingles', 2, 'Cursos de ingles basico', 20, 1, 'curso.jpg', '2018-10-22 05:37:28', '2018-10-22 05:37:28'),
(8, 'Piano', 2, 'Curso de Piano ', 20, 1, 'curso.jpg', '2018-10-22 05:37:29', '2018-10-22 05:37:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_donaciones`
--

CREATE TABLE `ici_donaciones` (
  `id` int(11) NOT NULL,
  `cuenta` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `numeroCuenta` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `banco` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `enlace` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ici_donaciones`
--

INSERT INTO `ici_donaciones` (`id`, `cuenta`, `numeroCuenta`, `banco`, `enlace`, `imagen`) VALUES
(1, 'Ahorro', '123456789', 'Pichincha', '#contáctenos', '/img/donaciones/pichincha.jpg'),
(2, 'Ahorro', '123456789', 'Guayaquil', '#contáctenos', '/img/donaciones/guayaquil.jpg'),
(3, 'Ahorro', '123456789', 'Bolivariano', '#contáctenos', '/img/donaciones/bolivariano.jpg'),
(4, 'Ahorro', '123456789', 'Pacifico', '#contáctenos', '/img/donaciones/pacifico.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_equipo`
--

CREATE TABLE `ici_equipo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8_spanish_ci DEFAULT 'user.png',
  `cargo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `orden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ici_equipo`
--

INSERT INTO `ici_equipo` (`id`, `nombre`, `foto`, `cargo`, `descripcion`, `orden`) VALUES
(1, 'Geovanni Bohorquez', '49580d64f7a22c91b384c5684c3240fc.jpg', 'Pastor', 'Pastor de la Iglesia de Cristo Iberoamericana el Recreo', 0),
(2, 'Marcelo Puentes', '5b319273022eada8b442e78928fc26d3.jpg', 'Misionero Fundador', 'Misionero fundador del ministerio Iberoamericano en Ecuador', 1),
(3, 'Samuel', '595df4cabb9e3978ed153c394386e7f6.jpg', 'Supervisor Internacional', 'Hermano amado nacido en Chile, supervisa el trabajo que se realiza en las distintas congregaciones iberoamericanas al rededor de todo Ecuador', 2),
(4, 'Manuel', '59d54f5c26cf38c0b174c725215a2fa5.jpg', 'Florencia', 'Líder de Jóvenes y participante de la junta de ancianos en la iglesia de Cristo Iberoamericana el Recreo.', 3),
(5, 'Silvia', 'e77c7724fb930623ea2a7343b1ef4113.jpg', 'Velasquez', 'Hermana encargada de administrar las finanzas.', 3),
(6, 'Jose', '53b0322161d83a7ee3f698d28be1112e.jpg', 'Vargas', 'Líder del ministerio de alabanza y participante en la junta de ancianos', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_galeria`
--

CREATE TABLE `ici_galeria` (
  `id` int(10) NOT NULL,
  `tipo` char(1) NOT NULL,
  `archivo` varchar(100) NOT NULL,
  `ruta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ici_galeria`
--

INSERT INTO `ici_galeria` (`id`, `tipo`, `archivo`, `ruta`) VALUES
(5, 'G', 'af651ca49105dce984fc0fdc78536140.jpg', '/img/galeria/'),
(6, 'G', '6.jpg', '/img/galeria/'),
(7, 'G', '7.jpg', '/img/galeria/'),
(8, 'G', '8.jpg', '/img/galeria/'),
(9, 'G', '9.jpg', '/img/galeria/'),
(10, 'G', '10.jpg', '/img/galeria/'),
(11, 'G', '11.jpg', '/img/galeria/'),
(12, 'G', '0aa08cfbbf047eff1d00a95a94166fe3.jpg', '/img/galeria/'),
(13, 'G', '5a6b2952a610ba14732642cb9620f746.jpg', '/img/galeria/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_home_card`
--

CREATE TABLE `ici_home_card` (
  `id` int(10) NOT NULL,
  `titulo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `icono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `detalle` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `tabla` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `color` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ici_home_card`
--

INSERT INTO `ici_home_card` (`id`, `titulo`, `icono`, `detalle`, `tabla`, `url`, `color`) VALUES
(1, 'Total de Cursos', 'fa fa-graduation-cap', 'CURSOS', 'ici_cursos', 'cursos', 'warning-color'),
(2, 'Total Usuarios', 'fa fa-users', 'USUARIOS', 'ici_users', 'usuarios', 'default-color'),
(3, 'Total de Roles', 'fa fa-sitemap', 'ROLES', 'ici_roles', 'roles', 'danger-color'),
(4, 'Inscripciones', 'fa fa-book', 'INSCRIPCIONES', 'ici_usuario_x_curso', 'inscripciones', 'primary-color'),
(5, 'Niños', 'fa fa-child', 'NIÑOS', 'ici_comp_child', 'children', 'success-color'),
(6, 'Tutores', 'fa fa-male', 'TUTORES', 'ici_tutores', 'tutores', 'secondary-color-dark'),
(7, 'Asistencia', 'fa fa-check-square-o', 'Actividades', '', 'ChildAssistance', 'warning-color'),
(9, 'Configuración', 'fa fa-cogs', 'Parametro', '', 'parametro', 'info-color');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_home_card_roles`
--

CREATE TABLE `ici_home_card_roles` (
  `idRol` int(11) UNSIGNED NOT NULL,
  `idCard` int(10) NOT NULL,
  `orden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ici_home_card_roles`
--

INSERT INTO `ici_home_card_roles` (`idRol`, `idCard`, `orden`) VALUES
(1, 1, 4),
(1, 2, 7),
(1, 3, 1),
(1, 4, 5),
(1, 5, 2),
(1, 6, 3),
(1, 7, 6),
(1, 9, 8),
(2, 4, 1),
(3, 5, 1),
(3, 7, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_horarios`
--

CREATE TABLE `ici_horarios` (
  `id` int(11) NOT NULL,
  `dia` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `comentario` text COLLATE utf8_spanish_ci NOT NULL,
  `lugar` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `horario` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ici_horarios`
--

INSERT INTO `ici_horarios` (`id`, `dia`, `titulo`, `comentario`, `lugar`, `horario`) VALUES
(1, 'Martes', 'Casa extendida', 'Reuniones que se realizan en casa de hermanos, por favor preguntar a su lider que casa le queda mas cerca', 'casa cercana', '20:00 - 22:00'),
(2, 'Jueves', 'Estudio biblico', 'Culto donde los hermanos aprenden del amor de Dios.', 'Iglesia de Cristo Iberoamericana ICIR', '19:00 - 20:00'),
(3, 'Miercoles', 'Culto de Oracion', 'Servicio de Oracion, esta invitado quien desee y sienta la necesidad de clamar a Dios.', 'Iglesia de Cristo Iberoamericana ICIR', '19:00 - 20:00'),
(4, 'Sabado', 'Culto de Jovenes', 'Reunion donde asisten los jovenes de la iglesia, comparten del amor de Dios y practican la justicia.', 'Iglesia de Cristo Iberoamericana ICIR', '17:00 - 19:00'),
(5, 'Domingo', 'Culto dominical', 'Culto congregacional donde toda la membresia participa en el recordatorio de sacrificio de nuestro Señor Jesucristo.', 'Iglesia de Cristo Iberoamericana ICIR', '09:00 12:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_iglesia`
--

CREATE TABLE `ici_iglesia` (
  `id` int(10) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `telefonos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Pastor` int(11) NOT NULL,
  `Tesorero` int(11) NOT NULL,
  `correoContacto` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ici_iglesia`
--

INSERT INTO `ici_iglesia` (`id`, `nombre`, `direccion`, `telefonos`, `Pastor`, `Tesorero`, `correoContacto`, `created_at`, `updated_at`) VALUES
(1, 'ICI el Recreo', 'Ciudadela el Recreo 3 etapa Solar A1', '5052024', 0, 0, 'iglesiaicir@gmail.com', '2018-03-01 08:29:05', '2018-03-01 08:29:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_maestro`
--

CREATE TABLE `ici_maestro` (
  `id` int(10) NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `nivel_estudio` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `especialidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cargo_actual` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ici_maestro`
--

INSERT INTO `ici_maestro` (`id`, `userId`, `nivel_estudio`, `especialidad`, `cargo_actual`) VALUES
(1, 20, 'Superior', 'Analisis de Sistemas', 'Desarrollador Web'),
(2, 30, 'Superior', 'Licenciada en sistemas', 'Soporte tecnico'),
(12, 34, 'superior', 'desarrollo app moviles', 'lider programador'),
(13, 28, 'superior', 'desarrollo web', 'analista'),
(14, 31, 'Superior', 'LSI', 'IT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_menu`
--

CREATE TABLE `ici_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'fa fa-link',
  `order` smallint(6) NOT NULL DEFAULT '0',
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ici_menu`
--

INSERT INTO `ici_menu` (`id`, `name`, `slug`, `parent`, `icon`, `order`, `enabled`, `created_at`, `updated_at`) VALUES
(1, 'Seguridad', '', 0, 'fa fa-user-secret', 0, 1, '2018-03-01 08:29:06', '2018-03-01 08:29:06'),
(2, 'Usuarios', 'usuarios', 1, 'fa fa-users', 1, 1, '2018-03-01 08:29:06', '2018-10-22 02:12:00'),
(3, 'Menu', 'menu', 1, 'fa fa-list-ul', 3, 1, '2018-03-01 08:29:06', '2018-03-21 07:57:04'),
(4, 'Roles', 'roles', 1, 'fa fa-sitemap', 2, 1, '2018-03-01 08:29:06', '2018-10-22 02:12:00'),
(5, 'Permisos', 'permisos', 1, 'fa fa-key', 4, 1, '2018-03-01 08:29:06', '2018-03-20 03:30:58'),
(6, 'Cursos', 's', 0, 'fa fa-graduation-cap', 6, 1, '2018-03-01 08:29:06', '2018-10-06 08:16:33'),
(7, 'Asistencia', 'asistencia', 6, 'fa fa-link', 9, 1, '2018-03-01 08:29:06', '2018-10-05 08:04:39'),
(8, 'Parametro', 'parametro', 0, 'fa fa-cogs', 19, 1, '2018-03-01 08:29:06', '2018-10-06 08:22:40'),
(9, 'Administrar', 'cursos', 6, 'fa fa-table', 7, 1, '2018-03-01 08:29:06', '2018-10-06 08:18:02'),
(11, 'Inscripciones', 'inscripciones', 6, 'fa fa-check', 10, 1, '2018-03-01 08:29:06', '2018-10-06 08:19:14'),
(14, 'Casa Amanecer', 'compassion', 0, 'fa fa-child', 11, 1, '2018-07-14 21:53:46', '2018-10-05 08:04:39'),
(15, 'Reportes', 'reporteria', 0, 'fa fa-pie-chart', 18, 1, '2018-07-14 21:57:35', '2018-10-05 08:04:39'),
(16, 'Niños', 'children', 14, 'fa fa-address-card-o', 12, 1, '2018-07-31 09:05:32', '2018-10-05 08:04:39'),
(17, 'Asistencia', 'ChildAssistance', 14, 'fa fa-list-alt ', 16, 1, '2018-07-31 09:07:27', '2018-10-05 08:04:39'),
(18, 'Control Médico', 'ChildMedicalControl', 14, 'fa fa-stethoscope', 17, 1, '2018-07-31 09:10:17', '2018-10-05 08:04:39'),
(19, 'Tutores', 'tutores', 14, 'fa fa-male', 13, 1, '2018-07-31 09:46:03', '2018-10-05 08:04:39'),
(20, 'Cronograma', 'CronogramaChild', 14, 'fa fa-calendar', 15, 1, '2018-08-09 07:37:19', '2018-10-05 08:04:39'),
(21, 'Grupos', 'gruposChild', 14, 'fa fa-users', 14, 1, '2018-08-12 01:27:27', '2018-10-05 08:04:39'),
(22, 'Acceso directos', 'homeCard', 1, 'fa fa-external-link', 5, 1, '2018-09-30 07:30:55', '2018-09-30 07:31:06'),
(23, 'Asistencia', 'CronogramaCurso', 6, 'fa fa-calendar', 8, 1, '2018-10-05 08:02:36', '2018-10-05 08:04:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_menu_x_rol`
--

CREATE TABLE `ici_menu_x_rol` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ici_menu_x_rol`
--

INSERT INTO `ici_menu_x_rol` (`role_id`, `menu_id`) VALUES
(2, 6),
(2, 11),
(3, 14),
(3, 16),
(3, 17),
(1, 1),
(1, 2),
(1, 4),
(1, 3),
(1, 5),
(1, 22),
(1, 6),
(1, 9),
(1, 23),
(1, 11),
(1, 14),
(1, 16),
(1, 19),
(1, 21),
(1, 20),
(1, 17),
(1, 18),
(1, 15),
(1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_migrations`
--

CREATE TABLE `ici_migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ici_migrations`
--

INSERT INTO `ici_migrations` (`id`, `migration`, `batch`) VALUES
(71, '2014_10_12_000000_create_users_table', 1),
(72, '2014_10_12_100000_create_password_resets_table', 1),
(73, '2015_06_27_181053_create-roles', 1),
(74, '2015_06_27_181105_create-role-user', 1),
(75, '2015_06_27_183301_create-social-logins', 1),
(76, '2016_10_19_100749_create-activations-table', 1),
(77, '2018_02_13_042740_create_sessions_table', 1),
(78, '2018_02_25_005138_create_Catalogoa_table', 1),
(79, '2018_02_25_012951_add_user_Catalogo', 1),
(80, '2018_02_25_014525_create_Iglesia_table', 1),
(81, '2018_02_25_015606_create_usuario_atributo', 1),
(82, '2018_02_25_021531_CreateMenusTable', 1),
(83, '2018_02_25_035246_create_menu_rol', 1),
(84, '2018_02_25_042103_add_role_user', 1),
(89, '2018_03_20_030144_cursos', 2),
(90, '2018_03_20_030619_usuario_x_curso', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_ministerios`
--

CREATE TABLE `ici_ministerios` (
  `id` int(11) NOT NULL,
  `titulo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(100) COLLATE utf8_spanish_ci DEFAULT 'about.jpg',
  `dia` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `desde` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `hasta` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `orden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ici_ministerios`
--

INSERT INTO `ici_ministerios` (`id`, `titulo`, `descripcion`, `foto`, `dia`, `desde`, `hasta`, `orden`) VALUES
(1, 'Damas', 'Ministerio de damas, ayudando a mujeres y adorando a Dios como solo el se lo merece\r\n', 'e5b1f70fa63f42e2a83ee8a3dd5aebe2.jpg', 'Viernes', '15:00', '15:30', 0),
(2, 'Alabanza', 'La adoracion a Dios es una oportunidad de agradecer a Dios por todo lo que el nos ha dado', '5d00917a8b4b88f22d4897ed022adea9.jpg', 'Miercoles  Sabados', '00:00', '22:00', 1),
(3, 'Teatro', 'Ministerio de teatro, un medio para alcanzar mas almas para Cristo', '1ccebef6694c15c420dc3bec269ac0e6.jpg', 'Sabados', '16:00', '18:00', 2),
(4, 'Jovenes', 'Ministerio de Jóvenes, rescatando a los jóvenes del mundo', '8d974a45a6acffd5ab7b6c1487cfe3df.png', 'Sabados', '16:00', '18:00', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_parametro`
--

CREATE TABLE `ici_parametro` (
  `1` int(11) NOT NULL,
  `inicial` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `fondo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `titulo_hoarios` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_horarios` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ici_parametro`
--

INSERT INTO `ici_parametro` (`1`, `inicial`, `nombre`, `fondo`, `direccion`, `telefono`, `correo`, `titulo_hoarios`, `descripcion_horarios`) VALUES
(1, 'ICIR', 'IGLESIA DE CRISTO IBEROAMERICANA EL RECR', 'fondo.jpg', 'Ciudadela el Recreo 3 etapa Solar A1', 2673265, 'iglesiaicir@gmail.com', 'Horarios de Servicio', 'Nuestros horarios de servicio están dictaminados por el siguiente horario a fin de que cada uno de ustedes pueda asistir a nuestras actividades en los diferentes horarios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_password_resets`
--

CREATE TABLE `ici_password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ici_password_resets`
--

INSERT INTO `ici_password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(1, 'jwnavarretez@gmail.com', '43266d2ab62c7af020beb55639ef2f34e2d1774e8928a78c8f2cd5c6676e26de', '2018-10-09 06:25:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_roles`
--

CREATE TABLE `ici_roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ici_roles`
--

INSERT INTO `ici_roles` (`id`, `name`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrador', '2018-03-01 08:29:03', '2018-08-19 05:42:57'),
(2, 'user', 'Usuario Web', '2018-03-01 08:29:03', '2018-08-19 05:45:19'),
(3, 'tutor', 'Tutor Casa Amanecer', '2018-08-19 05:36:21', '2018-08-19 05:45:42'),
(4, 'miembroIcir', 'Miembro ICI Recreo', '2018-08-19 05:51:52', '2018-08-19 05:51:52'),
(5, 'secretariaIcir', 'Secretaria ICI Recreo', '2018-08-19 05:53:12', '2018-08-19 05:53:12'),
(6, 'PROBAR', 'prueba', '2018-09-28 07:22:33', '2018-09-28 07:22:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_sessions`
--

CREATE TABLE `ici_sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8_unicode_ci,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_social_logins`
--

CREATE TABLE `ici_social_logins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `provider` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `social_id` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ici_social_logins`
--

INSERT INTO `ici_social_logins` (`id`, `user_id`, `provider`, `social_id`, `created_at`, `updated_at`) VALUES
(13, 18, 'twitter', '962064005706670081', '2018-08-19 00:59:35', '2018-08-19 00:59:35'),
(14, 20, 'google', '103212245685430285306', '2018-08-19 01:16:24', '2018-08-19 01:16:24'),
(15, 24, 'google', '102305233109815137547', '2018-08-23 07:58:44', '2018-08-23 07:58:44'),
(16, 26, 'facebook', '2174517699275158', '2018-09-16 01:18:00', '2018-09-16 01:18:00'),
(17, 30, 'google', '104782860568423362348', '2018-10-20 21:02:01', '2018-10-20 21:02:01'),
(18, 37, 'twitter', '257955057', '2018-10-23 03:20:02', '2018-10-23 03:20:02'),
(19, 38, 'google', '106038038689950136572', '2018-10-23 03:21:44', '2018-10-23 03:21:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_tutores`
--

CREATE TABLE `ici_tutores` (
  `cedula` char(13) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` char(10) COLLATE utf8_spanish_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `foto` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'tutor.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ici_tutores`
--

INSERT INTO `ici_tutores` (`cedula`, `nombres`, `apellidos`, `sexo`, `telefono`, `fechaNacimiento`, `foto`) VALUES
('0940528110', 'John William', 'Navarrete Zuniga', 'M', '0980308420', '1996-07-06', '0940528110.JPG'),
('0950382689', 'Luis', 'Rodriguez', 'M', '0980392273', '1994-12-04', '0950382689.png'),
('0953524873', 'Youling Yomira', 'Fun-Sang Pinargote', 'F', '0980308420', '1996-07-06', '0953524873.JPG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_users`
--

CREATE TABLE `ici_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/img/usuarios/user.png',
  `password` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ciudad` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pais` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion` text COLLATE utf8_unicode_ci,
  `iglesia` int(10) DEFAULT '1',
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ici_users`
--

INSERT INTO `ici_users` (`id`, `first_name`, `last_name`, `email`, `foto`, `password`, `remember_token`, `activated`, `token`, `created_at`, `updated_at`, `ciudad`, `pais`, `username`, `direccion`, `iglesia`, `role_id`) VALUES
(18, 'john', 'Navarrete', 'missingrqgCtCquKm@gmail.com', 'e43541fb4e134ce76c382f50c960bc83.jpg', '$2y$10$Z3hWKw2oOIcWCNBS280N.eNZtpJB2qBatL3iY3o4w3ZiEvEMZYZ76', 'K5l9Y0yq9SBN54bghLqZYesL7GMXcVBtVIvJmEojIwFarn6RYaLUZsciHpG1', 1, 'oxUlA9VJKxMXgya1lePgp8s6Pbasg44FjrOc0ZIpbxMIrjy2wfhoUsOag0Akspjl', '2018-08-19 00:59:35', '2018-10-22 07:41:02', '23', '19', 'jwnavarretez', 'recreo', 1, 3),
(19, 'admin', '.', 'iglesiaicir@gmail.com', '/img/usuarios/user.png', '$2y$10$6vjhlsW4CmbxLTmFmD.XbuG3f2pOWs6wSFhmlSrgXrNEyNwQoo35q', 'KWOXxQxqU2Bw2cMqYshjBrsqCEr8LwrPa91JO3InprprIeAJSxoBpJQ4pB58', 1, 'SlTMuDgiUF1PnqNUKlUR9mhdlXilZghQvIgLe3fugaU9FZI2ZkWwBJiS0KIh82us', '2018-08-19 01:10:46', '2018-10-23 03:33:41', NULL, NULL, NULL, NULL, 1, 1),
(20, 'John', 'Navarrete', 'jwnavarretez@gmail.com', 'https://lh5.googleusercontent.com/-OvJyKiaq2GY/AAAAAAAAAAI/AAAAAAAAF4Y/Ozxy5XPFKKs/photo.jpg?sz=50', '$2y$10$qSsQtgQ/i6QF11OGX3ijOuzGsGz7hK3wZQ/0Vz8gkdQo5qIjkgUiK', 'YPXgJdDlKIgXLRZwSwFmDJnOYNnPiYVXsUMI0uFSvmKqPa2tVfcNDH4MTAYL', 1, 'UDlOcP3V9zxwL5M0fH3RkY74fx2nN95TsNizxpsbl5gKKY182huMnAnelKDWucBc', '2018-08-19 01:16:23', '2018-10-20 20:59:53', NULL, NULL, 'Sempai', NULL, 1, 2),
(23, 'Yula', 'Pinargote', 'yula@gmail.com', '/img/usuarios/user.png', '$2y$10$DAMruKaxecWjit36PayHzu.SQFHWoFIpRmBZNSsOFdmetbFrwlInu', 'cqrTd0hbw9tyPd5yKlRK6jvzH2ezzu7pxmZ481zuI1Vxl1WiHr0neBbg3KA7', 1, 'HZWtQlz43QbhAnr70BFSxlvqfFYJlGvy5ouGcAZpWhQi7URVU7PG8oYvJnPiHz8m', '2018-08-22 03:14:56', '2018-09-29 23:48:19', '23', '19', 'YUla', 'recreo', 1, 2),
(24, 'John', 'Willian', 'jwnavarrete@itb.edu.ec', 'https://lh4.googleusercontent.com/-VsBDow_nNO8/AAAAAAAAAAI/AAAAAAAADTM/SsJ5f4SQLYY/photo.jpg?sz=50', '$2y$10$pJRlwtyV59qfuiyDyirUoOLSKZ83FKE3FN/.omSavwXMU3DuRL0ca', '3yIPt8kAk7MC4BAUf3v4aDsUDwCHI3P7lh8zkikVintbuQ2y02Qg4iH1GFHk', 1, 'CElTR3rpm8KmP86yvP1PkdpupbLGvp6GDmmxiSPq50KkhYhwtCGYvicGeYQAktch', '2018-08-23 07:58:43', '2018-08-24 09:48:53', NULL, NULL, NULL, NULL, 1, 2),
(25, 'prueba', 'prueba', 'tutor@gmail.com', '/img/usuarios/user.png', '$2y$10$ZPUZKBEI8lgmK02DA2sU6emv5D4gDfHF58Kg.cybmFeOpPvcCEcOC', 'FcXCtsQ2aUKMjc4POcZYJyoB6mHvVUZvGTWYmHaEo0giDL7hzpPHY9wcsHuR', 0, '', '2018-09-02 00:53:54', '2018-09-02 00:55:58', '23', '19', 'test', 'recreo', 1, 3),
(26, 'John', 'Navarrete', 'john_16gemelos@hotmail.com', 'https://graph.facebook.com/v2.8/2174517699275158/picture?type=normal', '$2y$10$7.QnkAwDaz8NyelASsQ3FOB3NOOPWacvdU49kiekkVnlotXIvGHay', 'xzhKAyQS0t4YohQQ6IhbDiCxap9nF8K3IsbxUc7jCWOSHnmTsfZNwzn6IDoU', 1, 'mjRwBdBnV8Q0iWxnbbayueyu1CQj1lo1jAshbMZPC4sauMaz5dQI207jUGvaRkcS', '2018-09-16 01:18:00', '2018-10-23 03:19:37', NULL, NULL, NULL, NULL, 1, 2),
(27, 'Bryan', 'Navarrete', 'bryan@gmail.com', '/img/usuarios/user.png', '$2y$10$NpeZnWydSdGvBw0ptlNlD.kpdfzW2kN7.BT5F9KqlFyLr2llzdL3.', 'uHE17UZF5A4j1Mq8IrGNN0sa6A2TOVClZgaiaD2Wk310SyqCECZkqYEHIv7K', 1, 'Aszogw1gczPBOXP8hbM6iH6gAmJWLVJGnCbvtg5NbKYWSvCPLixVDhAt7vPR0sPG', '2018-10-09 06:26:54', '2018-10-09 06:39:27', NULL, NULL, NULL, NULL, 1, 2),
(28, 'mafer', 'carrasco', 'nena99-mafer@hotmail.com', '/img/usuarios/user.png', '$2y$10$sJd9X3QHeny8m99poBXo6.dekyF5eDZWQzqKwm9uK3xsxIIPQEA0e', 'vhNp4jRMfNPGsmzjjjdhoiAU4jSilCKhqK8KAwMYWwoa3uwkG0mzb1gZzGKK', 1, 'zC7kDHYQhHT9EG0nt2Crcc0FU1TuRnVrSFqr4hkRxoL0r3LDVB1o49gIEnRGzqDP', '2018-10-09 10:35:33', '2018-10-09 10:36:38', NULL, NULL, NULL, NULL, 1, 2),
(29, 'demo', 'demo', 'demo@gmail.com', '/img/usuarios/user.png', '$2y$10$Zg6KG66Vn68sBeUcSxXyxOnK024JA2a/JzHc2kZqjtfKo.s3LrJ6a', 'Q5KWQa0ZkznOwkvhbNQ8zoJMfRjv5y7qZpuDHbNgzxxCYZ0hXGhUxeAnCpmk', 1, 'ehacAqOERAeBbZrzVw1pawKhHNQPtAKABSaU7dVF5fGsDMTeLkt8uBtsfRq2b1M2', '2018-10-20 20:53:32', '2018-10-20 20:54:39', NULL, NULL, NULL, NULL, 1, 2),
(30, 'Liza', 'Mera', 'lizamera91@gmail.com', 'https://lh4.googleusercontent.com/-g332zW31X9c/AAAAAAAAAAI/AAAAAAAAHQY/PmLdsAS1wyc/photo.jpg?sz=50', '$2y$10$TlcgQabmSH90vDgi7KDne.UEnaxoRBUDWDq0LNu/n7/.gRLOvPj32', '7J245XkfcDiFOHVolAQoAlq72pBGOg3jnuIwRZd5MsT2Zu6uWjSJNNkhMvGj', 1, 'QAlMEmCtiUV07ZBah4ZoLJv0s1AH2LjUiM9slAEBViXcoNJEip42VdxYHqIqqX0w', '2018-10-20 21:02:01', '2018-10-20 21:28:24', NULL, NULL, NULL, NULL, 1, 2),
(31, 'Luis', 'Rodriguez', 'luis.rodriguezf@ug.edu.ec', '4667926120224a5a5c6cb4eddcf3df4c.jpg', '$2y$10$jjx.efPnZhl9g2uu85ze2OfFuxy4jH3wLOxpaKYDYDul4TcUmVPk6', NULL, 1, 'oux5I9aCZsfcVuxN5DWzjtcwu7rTw3EW4WAto99M8Ufmz3aVUcSaqGdhyzU430hP', '2018-10-20 21:50:16', '2018-10-21 22:53:20', '23', '19', 'luisrodriguez', 'Guayaquil', 1, 1),
(32, 'miguel angel', 'chavez delgado', 'miguel_chavez89@hotmail.com', '/img/usuarios/user.png', '$2y$10$3BKuYdBz//p5fEtfiLfr5..uZHlCuDfmwC611lNOhlTBMOSg65Tde', NULL, 0, '', '2018-10-22 03:26:19', '2018-10-22 03:26:19', '23', '19', 'miguel', 'PASCUALES', 1, 1),
(34, 'miguel', 'chavez', 'elfedex_idp56@hotmail.com', '/img/usuarios/user.png', '$2y$10$9vI38LsawsJnmYdI2r4YsubAobC.Zwn6GoWme8VdRTNDxFVtw2f2.', NULL, 0, '', '2018-10-22 03:29:16', '2018-10-22 03:29:16', '23', '19', 'fedex', 'PASCUALES', 1, 1),
(35, 'lidia ', 'mera', 'administrador@iglesia-ici.com', '/img/usuarios/user.png', '$2y$10$tc.olQVc6Me1F6XcFjGJgO/DM5.qpmpow.4zpJDYUjb1PM2cZu2zK', NULL, 0, '', '2018-10-22 03:33:21', '2018-10-22 03:33:21', '23', '19', 'lidia', 'guayaquil', 1, 1),
(36, 'Karolina', 'Elizabeth', 'k-elizabeth92@hotmail.es', '/img/usuarios/user.png', '$2y$10$ofOq4gDM0oo6Ym3ol4RknOdaTbYI3QjFDMEJMoRT4V/gHu505tW3y', NULL, 1, 'Wecm37MvHK59Juc9RsMGnQMAFCKUwhmmoE5woXu1Fg5QTub735TAMP1Lfp1Z4jD3', '2018-10-23 02:48:07', '2018-10-23 02:48:07', NULL, NULL, NULL, NULL, 1, 2),
(37, 'Luis', 'Rodriguez', 'missingIycnyjEiMJ@gmail.com', 'http://pbs.twimg.com/profile_images/622832159032758274/khH8Daq0_normal.jpg', '$2y$10$hR9uERSd3ksM2HM3fiGoeukGm1FGC7VgbkNcyWBnxVB9KfnDfnW22', 'OfL1m2kd10QwAVcqOz09LVojaTqGaXOjV1dNRKIaPF6YGVAAQDd9ForCvXgp', 1, 'm1sxPTHamD3oXStYBEkdYRDvTGYlbienSLcHPfee3Rsw60NioRfcdqk1QPsi11ee', '2018-10-23 03:20:02', '2018-10-23 03:21:28', NULL, NULL, 'luis_rodri94', NULL, 1, 2),
(38, 'Luis', 'Rodriguez', 'luis.rodriguezf1994@gmail.com', 'https://lh4.googleusercontent.com/-U3Os75gaXss/AAAAAAAAAAI/AAAAAAAARz8/NViXk_i2t-s/photo.jpg?sz=50', '$2y$10$jlvh5tjFBSVgGw0NvhBf9OHPhz0qkFb2K5np.6/L2nzarq.8hls3K', 'lpjSITzvyrIJBedPa9gpxRZmBTIZCTxjw8i6j6ObG0EI1n3F1MU5XUI2dvJv', 1, 'obQW0XqkMSvyKNTZTIBvhduehzp14g2WQx82i8M5QfFWRRb3O98E0hFMBarqjZsq', '2018-10-23 03:21:43', '2018-10-23 03:21:44', NULL, NULL, NULL, NULL, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_usuario_atributo`
--

CREATE TABLE `ici_usuario_atributo` (
  `data` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cargo_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ici_usuario_x_curso`
--

CREATE TABLE `ici_usuario_x_curso` (
  `cursoId` int(10) UNSIGNED NOT NULL,
  `usuarioId` int(10) UNSIGNED NOT NULL,
  `asistencia` int(11) NOT NULL,
  `fec_registro` datetime NOT NULL,
  `usuario_registro` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ici_usuario_x_curso`
--

INSERT INTO `ici_usuario_x_curso` (`cursoId`, `usuarioId`, `asistencia`, `fec_registro`, `usuario_registro`) VALUES
(5, 20, 1, '0000-00-00 00:00:00', '19'),
(5, 18, 0, '0000-00-00 00:00:00', '18'),
(5, 26, 0, '0000-00-00 00:00:00', '26'),
(5, 28, 0, '0000-00-00 00:00:00', '28'),
(8, 19, 0, '0000-00-00 00:00:00', '19'),
(6, 19, 0, '0000-00-00 00:00:00', '19'),
(7, 37, 0, '0000-00-00 00:00:00', '37');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ici_about`
--
ALTER TABLE `ici_about`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ici_activations`
--
ALTER TABLE `ici_activations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activations_user_id_index` (`user_id`);

--
-- Indices de la tabla `ici_asistencia_child`
--
ALTER TABLE `ici_asistencia_child`
  ADD KEY `idCrono` (`idCrono`),
  ADD KEY `idChild` (`idChild`);

--
-- Indices de la tabla `ici_asistencia_cursos`
--
ALTER TABLE `ici_asistencia_cursos`
  ADD UNIQUE KEY `idCrono_2` (`idCrono`,`idUsuario`),
  ADD KEY `idCrono` (`idCrono`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `ici_catalogo`
--
ALTER TABLE `ici_catalogo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ici_comp_child`
--
ALTER TABLE `ici_comp_child`
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `ici_comp_grupos`
--
ALTER TABLE `ici_comp_grupos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ici_comp_grupos_tutores`
--
ALTER TABLE `ici_comp_grupos_tutores`
  ADD UNIQUE KEY `GrupoTutor` (`idTutor`,`idGrupo`),
  ADD KEY `idGrupoTutor` (`idGrupo`);

--
-- Indices de la tabla `ici_convenio`
--
ALTER TABLE `ici_convenio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ici_cronograma_child`
--
ALTER TABLE `ici_cronograma_child`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grupoForign` (`grupo`),
  ADD KEY `tutorForeign` (`tutor`);

--
-- Indices de la tabla `ici_cronograma_cursos`
--
ALTER TABLE `ici_cronograma_cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curso` (`curso`);

--
-- Indices de la tabla `ici_cursos`
--
ALTER TABLE `ici_cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maestroId` (`maestro`);

--
-- Indices de la tabla `ici_donaciones`
--
ALTER TABLE `ici_donaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ici_equipo`
--
ALTER TABLE `ici_equipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ici_galeria`
--
ALTER TABLE `ici_galeria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ici_home_card`
--
ALTER TABLE `ici_home_card`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ici_home_card_roles`
--
ALTER TABLE `ici_home_card_roles`
  ADD UNIQUE KEY `uniqueRolCard` (`idRol`,`idCard`) USING BTREE,
  ADD KEY `idRolCard` (`idCard`);

--
-- Indices de la tabla `ici_horarios`
--
ALTER TABLE `ici_horarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ici_iglesia`
--
ALTER TABLE `ici_iglesia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ici_maestro`
--
ALTER TABLE `ici_maestro`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userId` (`userId`);

--
-- Indices de la tabla `ici_menu`
--
ALTER TABLE `ici_menu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menu_slug_unique` (`slug`);

--
-- Indices de la tabla `ici_menu_x_rol`
--
ALTER TABLE `ici_menu_x_rol`
  ADD KEY `menu_x_rol_role_id_index` (`role_id`),
  ADD KEY `menu_x_rol_menu_id_index` (`menu_id`);

--
-- Indices de la tabla `ici_migrations`
--
ALTER TABLE `ici_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ici_ministerios`
--
ALTER TABLE `ici_ministerios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ici_parametro`
--
ALTER TABLE `ici_parametro`
  ADD PRIMARY KEY (`1`);

--
-- Indices de la tabla `ici_password_resets`
--
ALTER TABLE `ici_password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `ici_roles`
--
ALTER TABLE `ici_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ici_sessions`
--
ALTER TABLE `ici_sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indices de la tabla `ici_social_logins`
--
ALTER TABLE `ici_social_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_logins_user_id_index` (`user_id`);

--
-- Indices de la tabla `ici_tutores`
--
ALTER TABLE `ici_tutores`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `ici_users`
--
ALTER TABLE `ici_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_role_id_index` (`role_id`),
  ADD KEY `iglesia` (`iglesia`);

--
-- Indices de la tabla `ici_usuario_atributo`
--
ALTER TABLE `ici_usuario_atributo`
  ADD KEY `usuario_atributo_user_id_index` (`user_id`),
  ADD KEY `usuario_atributo_cargo_id_index` (`cargo_id`);

--
-- Indices de la tabla `ici_usuario_x_curso`
--
ALTER TABLE `ici_usuario_x_curso`
  ADD KEY `usuario_x_curso_cursoid_index` (`cursoId`),
  ADD KEY `usuario_x_curso_usuarioid_index` (`usuarioId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ici_about`
--
ALTER TABLE `ici_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `ici_activations`
--
ALTER TABLE `ici_activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ici_catalogo`
--
ALTER TABLE `ici_catalogo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT de la tabla `ici_comp_grupos`
--
ALTER TABLE `ici_comp_grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `ici_convenio`
--
ALTER TABLE `ici_convenio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `ici_cronograma_child`
--
ALTER TABLE `ici_cronograma_child`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `ici_cronograma_cursos`
--
ALTER TABLE `ici_cronograma_cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `ici_cursos`
--
ALTER TABLE `ici_cursos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `ici_donaciones`
--
ALTER TABLE `ici_donaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `ici_equipo`
--
ALTER TABLE `ici_equipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `ici_galeria`
--
ALTER TABLE `ici_galeria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `ici_home_card`
--
ALTER TABLE `ici_home_card`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `ici_horarios`
--
ALTER TABLE `ici_horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `ici_iglesia`
--
ALTER TABLE `ici_iglesia`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `ici_maestro`
--
ALTER TABLE `ici_maestro`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `ici_menu`
--
ALTER TABLE `ici_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `ici_migrations`
--
ALTER TABLE `ici_migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT de la tabla `ici_ministerios`
--
ALTER TABLE `ici_ministerios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `ici_parametro`
--
ALTER TABLE `ici_parametro`
  MODIFY `1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `ici_password_resets`
--
ALTER TABLE `ici_password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `ici_roles`
--
ALTER TABLE `ici_roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `ici_social_logins`
--
ALTER TABLE `ici_social_logins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `ici_users`
--
ALTER TABLE `ici_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ici_activations`
--
ALTER TABLE `ici_activations`
  ADD CONSTRAINT `activations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `ici_users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ici_asistencia_child`
--
ALTER TABLE `ici_asistencia_child`
  ADD CONSTRAINT `idChild` FOREIGN KEY (`idChild`) REFERENCES `ici_comp_child` (`codigo`) ON DELETE CASCADE,
  ADD CONSTRAINT `idCrono` FOREIGN KEY (`idCrono`) REFERENCES `ici_cronograma_child` (`id`);

--
-- Filtros para la tabla `ici_asistencia_cursos`
--
ALTER TABLE `ici_asistencia_cursos`
  ADD CONSTRAINT `cronoId` FOREIGN KEY (`idCrono`) REFERENCES `ici_cronograma_cursos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `usuarioId` FOREIGN KEY (`idUsuario`) REFERENCES `ici_users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ici_comp_grupos_tutores`
--
ALTER TABLE `ici_comp_grupos_tutores`
  ADD CONSTRAINT `idGrupoTutor` FOREIGN KEY (`idGrupo`) REFERENCES `ici_comp_grupos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `idTutor` FOREIGN KEY (`idTutor`) REFERENCES `ici_tutores` (`cedula`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ici_cronograma_child`
--
ALTER TABLE `ici_cronograma_child`
  ADD CONSTRAINT `grupoForign` FOREIGN KEY (`grupo`) REFERENCES `ici_comp_grupos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tutorForeign` FOREIGN KEY (`tutor`) REFERENCES `ici_tutores` (`cedula`);

--
-- Filtros para la tabla `ici_cronograma_cursos`
--
ALTER TABLE `ici_cronograma_cursos`
  ADD CONSTRAINT `cursoId` FOREIGN KEY (`curso`) REFERENCES `ici_cursos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ici_cursos`
--
ALTER TABLE `ici_cursos`
  ADD CONSTRAINT `maestroId` FOREIGN KEY (`maestro`) REFERENCES `ici_maestro` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `ici_home_card_roles`
--
ALTER TABLE `ici_home_card_roles`
  ADD CONSTRAINT `idRolCard` FOREIGN KEY (`idCard`) REFERENCES `ici_home_card` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `idRoles` FOREIGN KEY (`idRol`) REFERENCES `ici_roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ici_maestro`
--
ALTER TABLE `ici_maestro`
  ADD CONSTRAINT `usuario` FOREIGN KEY (`userId`) REFERENCES `ici_users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ici_menu_x_rol`
--
ALTER TABLE `ici_menu_x_rol`
  ADD CONSTRAINT `menu_id` FOREIGN KEY (`menu_id`) REFERENCES `ici_menu` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_rol` FOREIGN KEY (`menu_id`) REFERENCES `ici_menu` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roleId` FOREIGN KEY (`role_id`) REFERENCES `ici_roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ici_social_logins`
--
ALTER TABLE `ici_social_logins`
  ADD CONSTRAINT `social_logins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `ici_users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ici_users`
--
ALTER TABLE `ici_users`
  ADD CONSTRAINT `iglesia` FOREIGN KEY (`iglesia`) REFERENCES `ici_iglesia` (`id`),
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `ici_roles` (`id`) ON DELETE NO ACTION;

--
-- Filtros para la tabla `ici_usuario_atributo`
--
ALTER TABLE `ici_usuario_atributo`
  ADD CONSTRAINT `usuario_atributo_cargo_id_foreign` FOREIGN KEY (`cargo_id`) REFERENCES `ici_catalogo` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `usuario_atributo_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `ici_users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ici_usuario_x_curso`
--
ALTER TABLE `ici_usuario_x_curso`
  ADD CONSTRAINT `usuario_x_curso_cursoid_foreign` FOREIGN KEY (`cursoId`) REFERENCES `ici_cursos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `usuario_x_curso_usuarioid_foreign` FOREIGN KEY (`usuarioId`) REFERENCES `ici_users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
