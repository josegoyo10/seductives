-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2019 a las 13:08:58
-- Versión del servidor: 5.5.8-log
-- Versión de PHP: 7.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `seductives`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'ESCORTS', '2019-07-02 04:00:00', NULL),
(2, 'MADURAS', '2019-07-01 04:00:00', NULL),
(3, 'LESBIANAS', '2019-05-23 11:00:00', NULL),
(4, 'TRAVESTIS', '2019-08-18 04:00:00', '2019-08-18 04:00:00'),
(5, 'TRANSEXUALES', '2019-08-18 04:00:00', '2019-08-18 04:00:00'),
(6, 'MASAJISTAS', '2019-08-18 04:00:00', '2019-08-18 04:00:00'),
(7, 'GAYS', '2019-08-18 04:00:00', '2019-08-18 04:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `escort_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `body` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `escort_id`, `parent_id`, `body`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, 'hola es muy bonita escort', '2019-10-28 23:24:29', '2019-10-28 23:24:29', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comuna`
--

CREATE TABLE `comuna` (
  `id` int(11) NOT NULL,
  `id_region` int(11) DEFAULT NULL,
  `nombre` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comuna`
--

INSERT INTO `comuna` (`id`, `id_region`, `nombre`) VALUES
(1, 1, 'Arica'),
(2, 1, 'Camarones'),
(3, 1, 'Putre'),
(4, 1, 'General Lagos'),
(5, 2, 'Iquique'),
(6, 2, 'Alto Hospicio'),
(7, 2, 'Pozo Almonte'),
(8, 2, 'Camiña'),
(9, 2, 'Colchane'),
(10, 2, 'Huara'),
(11, 2, 'Pica'),
(12, 3, 'Antofagasta'),
(13, 3, 'Mejillones'),
(14, 3, 'Sierra Gorda'),
(15, 3, 'Taltal'),
(16, 3, 'Calama'),
(17, 3, 'Ollagüe'),
(18, 3, 'San Pedro de Atacama'),
(19, 3, 'Tocopilla'),
(20, 3, 'María Elena'),
(21, 4, 'Copiapó'),
(22, 4, 'Caldera'),
(23, 4, 'Tierra Amarilla'),
(24, 4, 'Chañaral'),
(25, 4, 'Diego de Almagro'),
(26, 4, 'Vallenar'),
(27, 4, 'Alto del Carmen'),
(28, 4, 'Freirina'),
(29, 4, 'Huasco'),
(30, 5, 'La Serena'),
(31, 5, 'Coquimbo'),
(32, 5, 'Andacollo'),
(33, 5, 'La Higuera'),
(34, 5, 'Paiguano'),
(35, 5, 'Vicuña'),
(36, 5, 'Illapel'),
(37, 5, 'Canela'),
(38, 5, 'Los Vilos'),
(39, 5, 'Salamanca'),
(40, 5, 'Ovalle'),
(41, 5, 'Combarbalá'),
(42, 5, 'Monte Patria'),
(43, 5, 'Punitaqui'),
(44, 5, 'Río Hurtado'),
(45, 6, 'Valparaíso'),
(46, 6, 'Casablanca'),
(47, 6, 'Concón'),
(48, 6, 'Puchuncaví'),
(49, 6, 'Juan Fernández'),
(50, 6, 'Quintero'),
(51, 6, 'Viña del Mar'),
(52, 6, 'Isla de Pascua'),
(53, 6, 'Los Andes'),
(54, 6, 'Calle Larga'),
(55, 6, 'Rinconada'),
(56, 6, 'San Esteban'),
(57, 6, 'La Ligua'),
(58, 6, 'Cabildo'),
(59, 6, 'Papudo'),
(60, 6, 'Petorca'),
(61, 6, 'Zapallar'),
(62, 6, 'Quillota'),
(63, 6, 'Calera'),
(64, 6, 'Hijuelas'),
(65, 6, 'La Cruz'),
(66, 6, 'Nogales'),
(67, 6, 'San Antonio'),
(68, 6, 'Algarrobo'),
(69, 6, 'Cartagena'),
(70, 6, 'El Quisco'),
(71, 6, 'El Tabo'),
(72, 6, 'Santo Domingo'),
(73, 6, 'San Felipe'),
(74, 6, 'Catemu'),
(75, 6, 'Llaillay'),
(76, 6, 'Panquehue'),
(77, 6, 'Putaendo'),
(78, 6, 'Santa María'),
(79, 6, 'Quilpué'),
(80, 6, 'Limache'),
(81, 6, 'Olmué'),
(82, 6, 'Villa Alemana'),
(83, 7, 'Rancagua'),
(84, 7, 'Codegua'),
(85, 7, 'Coinco'),
(86, 7, 'Coltauco'),
(87, 7, 'Doñihue'),
(88, 7, 'Graneros'),
(89, 7, 'Las Cabras'),
(90, 7, 'Machalí'),
(91, 7, 'Malloa'),
(92, 7, 'Mostazal'),
(93, 7, 'Peumo'),
(94, 7, 'Pichidegua'),
(95, 7, 'Quinta de Tilcoco'),
(96, 7, 'Rengo'),
(97, 7, 'Requínoa'),
(98, 7, 'San Vicente'),
(99, 7, 'Pichilemu'),
(100, 7, 'La Estrella'),
(101, 7, 'Litueche'),
(102, 7, 'Marchihue'),
(103, 7, 'Navidad'),
(104, 7, 'Paredones'),
(105, 7, 'San Fernando'),
(106, 7, 'Chépica'),
(107, 7, 'Chimbarongo'),
(108, 7, 'Lolol'),
(109, 7, 'Nancagua'),
(110, 7, 'Peralillo'),
(111, 7, 'Placilla'),
(112, 7, 'Pumanque'),
(113, 7, 'Santa Cruz'),
(114, 8, 'Talca'),
(115, 8, 'Constitución'),
(116, 8, 'Curepto'),
(117, 8, 'Empedrado'),
(118, 8, 'Maule'),
(119, 8, 'Pencahue'),
(120, 8, 'Río Claro'),
(121, 8, 'San Clemente'),
(122, 8, 'San Rafael'),
(123, 8, 'Cauquenes'),
(124, 8, 'Chanco'),
(125, 8, 'Pelluhue'),
(126, 8, 'Curicó'),
(127, 8, 'Hualañé'),
(128, 8, 'Licantén'),
(129, 8, 'Molina'),
(130, 8, 'Rauco'),
(131, 8, 'Romeral'),
(132, 8, 'Sagrada Familia'),
(133, 8, 'Teno'),
(134, 8, 'Vichuquén'),
(135, 8, 'Linares'),
(136, 8, 'Colbún'),
(137, 8, 'Longaví'),
(138, 8, 'Parral'),
(139, 8, 'ReVro'),
(140, 8, 'San Javier'),
(141, 8, 'Villa Alegre'),
(142, 8, 'Yerbas Buenas'),
(143, 9, 'Concepción'),
(144, 9, 'Coronel'),
(145, 9, 'Chiguayante'),
(146, 9, 'Florida'),
(147, 9, 'Hualqui'),
(148, 9, 'Lota'),
(149, 9, 'Penco'),
(150, 9, 'San Pedro de la Paz'),
(151, 9, 'Santa Juana'),
(152, 9, 'Talcahuano'),
(153, 9, 'Tomé'),
(154, 9, 'Hualpén'),
(155, 9, 'Lebu'),
(156, 9, 'Arauco'),
(157, 9, 'Cañete'),
(158, 9, 'Contulmo'),
(159, 9, 'Curanilahue'),
(160, 9, 'Los Álamos'),
(161, 9, 'Tirúa'),
(162, 9, 'Los Ángeles'),
(163, 9, 'Antuco'),
(164, 9, 'Cabrero'),
(165, 9, 'Laja'),
(166, 9, 'Mulchén'),
(167, 9, 'Nacimiento'),
(168, 9, 'Negrete'),
(169, 9, 'Quilaco'),
(170, 9, 'Quilleco'),
(171, 9, 'San Rosendo'),
(172, 9, 'Santa Bárbara'),
(173, 9, 'Tucapel'),
(174, 9, 'Yumbel'),
(175, 9, 'Alto Biobío'),
(176, 9, 'Chillán'),
(177, 9, 'Bulnes'),
(178, 9, 'Cobquecura'),
(179, 9, 'Coelemu'),
(180, 9, 'Coihueco'),
(181, 9, 'Chillán Viejo'),
(182, 9, 'El Carmen'),
(183, 9, 'Ninhue'),
(184, 9, 'Ñiquén'),
(185, 9, 'Pemuco'),
(186, 9, 'Pinto'),
(187, 9, 'Portezuelo'),
(188, 9, 'Quillón'),
(189, 9, 'Quirihue'),
(190, 9, 'Ránquil'),
(191, 9, 'San Carlos'),
(192, 9, 'San Fabián'),
(193, 9, 'San Ignacio'),
(194, 9, 'San Nicolás'),
(195, 9, 'Treguaco'),
(196, 9, 'Yungay'),
(197, 10, 'Temuco'),
(198, 10, 'Carahue'),
(199, 10, 'Cunco'),
(200, 10, 'Curarrehue'),
(201, 10, 'Freire'),
(202, 10, 'Galvarino'),
(203, 10, 'Gorbea'),
(204, 10, 'Lautaro'),
(205, 10, 'Loncoche'),
(206, 10, 'Melipeuco'),
(207, 10, 'Nueva Imperial'),
(208, 10, 'Padre las Casas'),
(209, 10, 'Perquenco'),
(210, 10, 'Pitrufquén'),
(211, 10, 'Pucón'),
(212, 10, 'Saavedra'),
(213, 10, 'Teodoro Schmidt'),
(214, 10, 'Toltén'),
(215, 10, 'Vilcún'),
(216, 10, 'Cholchol'),
(217, 10, 'Angol'),
(218, 10, 'Collipulli'),
(219, 10, 'Curacautín'),
(220, 10, 'Ercilla'),
(221, 10, 'Lonquimay'),
(222, 10, 'Los Sauces'),
(223, 10, 'Lumaco'),
(224, 10, 'Purén'),
(225, 10, 'Renaico'),
(226, 10, 'Traiguén'),
(227, 10, 'Victoria'),
(228, 11, 'Valdivia'),
(229, 11, 'Corral'),
(230, 11, 'Lanco'),
(231, 11, 'Máfil'),
(232, 11, 'Mariquina'),
(233, 11, 'Paillaco'),
(234, 11, 'Panguipulli'),
(235, 11, 'La Unión'),
(236, 11, 'Futrono'),
(237, 11, 'Lago Ranco'),
(238, 11, 'Río Bueno'),
(239, 12, 'Puerto Montt'),
(240, 12, 'Calbuco'),
(241, 12, 'Cochamó'),
(242, 12, 'Fresia'),
(243, 12, 'FruVllar'),
(244, 12, 'Llanquihue'),
(245, 12, 'Maullín'),
(246, 12, 'Puerto Varas'),
(247, 12, 'Castro'),
(248, 12, 'Ancud'),
(249, 12, 'Chonchi'),
(250, 12, 'Curaco de Vélez'),
(251, 12, 'Dalcahue'),
(252, 12, 'Puqueldón'),
(253, 12, 'Queilén'),
(254, 12, 'Quellón'),
(255, 12, 'Quemchi'),
(256, 12, 'Quinchao'),
(257, 12, 'Osorno'),
(258, 12, 'Puerto Octay'),
(259, 12, 'Purranque'),
(260, 12, 'Puyehue'),
(261, 12, 'Río Negro'),
(262, 12, 'San Juan de la Costa'),
(263, 12, 'San Pablo'),
(264, 12, 'Chaitén'),
(265, 12, 'Futaleufú'),
(266, 12, 'Hualaihué'),
(267, 12, 'Palena'),
(268, 13, 'Coihaique'),
(269, 13, 'Lago Verde'),
(270, 13, 'Aisén'),
(271, 13, 'Cisnes'),
(272, 13, 'Guaitecas'),
(273, 13, 'Cochrane'),
(274, 13, 'O’Higgins'),
(275, 13, 'Tortel'),
(276, 13, 'Chile Chico'),
(277, 13, 'Río Ibáñez'),
(278, 14, 'Punta Arenas'),
(279, 14, 'Laguna Blanca'),
(280, 14, 'Río Verde'),
(281, 14, 'Cabo de Hornos (Ex Navarino)'),
(282, 14, 'Antártica'),
(283, 14, 'Porvenir'),
(284, 14, 'Primavera'),
(285, 14, 'Timaukel'),
(286, 14, 'Natales'),
(287, 14, 'Torres del Paine'),
(288, 15, 'Cerrillos'),
(289, 15, 'Cerro Navia'),
(290, 15, 'Conchalí'),
(291, 15, 'El Bosque'),
(292, 15, 'Estación Central'),
(293, 15, 'Huechuraba'),
(294, 15, 'Independencia'),
(295, 15, 'La Cisterna'),
(296, 15, 'La Florida'),
(297, 15, 'La Granja'),
(298, 15, 'La Pintana'),
(299, 15, 'La Reina'),
(300, 15, 'Las Condes'),
(301, 15, 'Lo Barnechea'),
(302, 15, 'Lo Espejo'),
(303, 15, 'Lo Prado'),
(304, 15, 'Maipú'),
(305, 15, 'Ñuñoa'),
(306, 15, 'Pedro Aguirre Cerda'),
(307, 15, 'Peñalolén'),
(308, 15, 'Providencia'),
(309, 15, 'Pudahuel'),
(310, 15, 'Quilicura'),
(311, 15, 'Quinta Normal'),
(312, 15, 'Recoleta'),
(313, 15, 'Renca'),
(314, 15, 'San Joaquín'),
(315, 15, 'Santiago'),
(316, 15, 'San Miguel'),
(317, 15, 'San Ramón'),
(318, 15, 'Vitacura'),
(319, 15, 'Puente Alto'),
(320, 15, 'Pirque'),
(321, 15, 'San José de Maipo'),
(322, 15, 'Colina'),
(323, 15, 'Lampa'),
(324, 15, 'Til'),
(325, 15, 'San Bernardo'),
(326, 15, 'Buin'),
(327, 15, 'Calera de Tango'),
(328, 15, 'Paine'),
(329, 15, 'Melipilla'),
(330, 15, 'Alhué'),
(331, 15, 'Curacaví'),
(332, 15, 'María Pinto'),
(333, 15, 'San Pedro'),
(334, 15, 'Talagante'),
(335, 15, 'El Monte'),
(336, 15, 'Isla de Maipo'),
(337, 15, 'Padre Hurtado'),
(338, 15, 'Peñaflor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escorts`
--

CREATE TABLE `escorts` (
  `id` int(10) UNSIGNED NOT NULL,
  `rut` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellidos` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apodo_escort` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nacionalidad` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comentario_escort` varchar(350) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comentario_aprob_rechazo` varchar(350) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_estado` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `escorts`
--

INSERT INTO `escorts` (`id`, `rut`, `nombres`, `apellidos`, `apodo_escort`, `email`, `sexo`, `fecha_nacimiento`, `nacionalidad`, `comentario_escort`, `comentario_aprob_rechazo`, `id_estado`, `created_at`, `updated_at`) VALUES
(1, '25269398K', 'Daniela maria', 'CHAVEZ', 'LA DANI', 'danielachavez@hotmail.com', '1', '01/11/1987', 'chile', 'hola quiero pertenecer a su pagina web.', NULL, 3, '2019-08-07 01:59:39', '2019-08-07 01:59:39'),
(2, '16775337-k', 'Dioshaily Rosfer', 'Canales Gil', 'DIOSA CANALES', 'diosa@gmail.com', '1', '01/12/1990', 'venezuela', 'hola quiero pertenecer  a su pagina web', NULL, 3, '2019-08-07 02:04:20', '2019-08-07 02:04:20'),
(3, '15579843-2', 'jimena', 'Araya Navarro', 'rosita', 'rosita@hotmail.com', '1', '05/19/1982', 'venezuela', 'Hola quiero pertenecer a su pagina web', NULL, 3, '2019-08-07 02:09:02', '2019-08-07 02:09:02'),
(4, '17424275-5', 'Sabrina', 'Salemi', 'LA CATIRA', 'sabrina@gmail.com', '1', '07/17/1973', 'venezuela', 'hola quiero pertenecer a su pagina web.', NULL, 3, '2019-08-07 02:13:14', '2019-08-07 02:13:14'),
(5, '17678175-0', 'Sofia alejandra', 'VERGARA', 'LA COLOMBIANA', 'sofia@gmail.com', '1', '10/21/1975', 'colombia', 'hola quiero pertenecer a su pagina web.', NULL, 3, '2019-08-07 02:17:08', '2019-08-07 02:17:08'),
(6, '16248777-9', 'valeria', 'orsini', 'la vale', 'valeriaorsini@gmail.com', '1', '01/31/1990', 'colombia', 'hola quiero pertenecer a su pagina web.', NULL, 3, '2019-08-07 02:20:22', '2019-08-07 02:20:22'),
(7, '12246451-2', 'SHANNY', 'lam', 'la china', 'shanny@hotmail.com', '1', '06/18/1985', 'venezuela', 'hola me gustaria pertenecer a tu pagina web.', NULL, 3, '2019-08-16 12:20:22', '2019-08-16 12:57:55'),
(8, '11416560-3', 'pamela', 'anderson', 'la gringa', 'pamela@gmail.com', '1', '02/12/1965', 'argentina', 'hola escuche de su pagina web me gustaria pertenecer  a su pagina web.', NULL, 3, '2019-08-16 12:23:05', '2019-08-16 12:57:36'),
(9, '9376695-4', 'yASMINE', 'BLEETH', 'la tigresa', 'yasmine@gmail.com', '1', '10/18/1968', 'chile', 'hola soy una mujer madura quiero pertenecer  a su pagina', NULL, 3, '2019-08-16 12:30:27', '2019-08-16 12:59:45'),
(10, '20066462-0', 'MICHELE', 'LEWIN', 'LA FITNESS', 'MICHELE@GMAIL.COM', '1', '10/31/1973', 'venezuela', 'HOLA QUIERO PERTENECER A SU PAGINA', NULL, 3, '2019-08-16 12:32:35', '2019-08-16 12:58:54'),
(11, '15705658-1', 'MIA', 'KHALIFA', 'LA TURCA', 'MIA@HOTMAIL.COM', '1', '02/10/1993', 'colombia', 'QUIERO PERTENECER A SU PAGINA WEB VEAN MIS FOTOS !!!', NULL, 3, '2019-08-16 12:35:09', '2019-08-16 12:58:22'),
(12, '6429729-5', 'ESPERANZA', 'GOMEZ', 'LA PAISA', 'ESPERANZA@GMAIL.COM', '1', '05/18/1980', 'colombia', 'HOLA SOY NUEVA EN LA CIUDAD QUIERO PERTENECER A SU PAGINA WEB.', NULL, 3, '2019-08-16 12:37:54', '2019-08-16 12:59:26'),
(13, '17694657-1', 'Maria elena', 'davila', 'la marie', 'mariadavila@gmail.com', '1', '06/20/1995', 'venezuela', 'hola me gustaria ser parte de su pagina web', NULL, 3, '2019-09-10 23:21:45', '2019-09-10 23:29:51'),
(14, '23513978-2', 'BELLA', 'THORNE', 'LA BELLA', 'BELLA@GMAIL.COM', '1', '05/19/1998', 'chile', 'hola me gustaria pertenecer a su prestigiosa pagina web', NULL, 3, '2019-09-10 23:25:50', '2019-09-10 23:30:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escort_fotos`
--

CREATE TABLE `escort_fotos` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_escort` int(10) UNSIGNED NOT NULL,
  `id_perfil` int(10) UNSIGNED NOT NULL,
  `url_fotos` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escort_video`
--

CREATE TABLE `escort_video` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `escort_id` int(11) NOT NULL,
  `desc_video` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion_estado` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `descripcion_estado`, `created_at`, `updated_at`) VALUES
(1, 'PENDIENTE', NULL, NULL),
(2, 'RECHAZADO', NULL, NULL),
(3, 'APROBADA', NULL, NULL),
(4, 'ACTIVO', NULL, NULL),
(5, 'INACTIVO', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `follow_escort`
--

CREATE TABLE `follow_escort` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `status_invitacion` int(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `follow_escort`
--

INSERT INTO `follow_escort` (`id`, `sender_id`, `receiver_id`, `status_invitacion`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, '2019-08-14 00:12:13', '2019-08-14 00:12:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes_escort`
--

CREATE TABLE `likes_escort` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `escort_id` int(11) NOT NULL,
  `escort_foto_id` int(11) NOT NULL,
  `likes_count` int(11) NOT NULL DEFAULT '0',
  `dislike_count` int(11) DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `likes_escort`
--

INSERT INTO `likes_escort` (`id`, `user_id`, `escort_id`, `escort_foto_id`, `likes_count`, `dislike_count`, `updated_at`, `created_at`) VALUES
(1, 10, 1, 1, 3, 0, '2019-10-28 23:50:48', '2019-10-28 23:49:22'),
(2, 10, 2, 1, 3, 0, '2019-10-28 23:51:22', '2019-10-28 23:49:48'),
(3, 1, 1, 1, 1, 0, '2019-10-28 23:50:31', '2019-10-28 23:50:31'),
(4, 1, 2, 1, 1, 0, '2019-10-28 23:51:17', '2019-10-28 23:51:17'),
(5, 1, 3, 1, 1, 0, '2019-10-28 23:51:33', '2019-10-28 23:51:33'),
(6, 1, 4, 1, 1, 0, '2019-10-28 23:51:37', '2019-10-28 23:51:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(114, '2014_09_28_000000_create_users_table', 1),
(115, '2014_10_12_100000_create_password_resets_table', 1),
(116, '2019_05_26_172829_create_categorias_table', 1),
(117, '2019_05_27_202659_create_escorts_table', 1),
(118, '2019_05_27_211416_create_perfiles_table', 1),
(119, '2019_05_28_144355_create_estados_table', 1),
(120, '2019_05_28_145438_create_escort_fotos', 1),
(121, '2019_06_06_172139_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(3, 'App\\User', 1),
(3, 'App\\User', 2),
(3, 'App\\User', 3),
(1, 'App\\User', 4),
(2, 'App\\User', 5),
(2, 'App\\User', 6),
(2, 'App\\User', 7),
(2, 'App\\User', 8),
(2, 'App\\User', 9),
(3, 'App\\User', 10),
(2, 'App\\User', 11),
(3, 'App\\User', 11),
(2, 'App\\User', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `escort_id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `cantidad_news` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `news`
--

INSERT INTO `news` (`id`, `user_id`, `escort_id`, `descripcion`, `cantidad_news`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 'Hola hoy lunes vengo de promocion llamame...', 1, '2019-08-13 02:31:06', '2019-08-13 02:31:06'),
(2, 5, 1, 'Hola noticia del dia Lunes.', 1, '2019-09-03 01:52:01', '2019-09-03 01:52:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('jgregoriorason@gmail.com', '$2y$10$UJBlKDAUrS07gkmEWKu7YujD6foG4CayS6EX0trARop66iTIyl4vO', '2019-08-08 19:46:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfil` int(10) UNSIGNED NOT NULL,
  `id_escort` int(10) UNSIGNED NOT NULL,
  `id_categoria` int(10) UNSIGNED NOT NULL,
  `seo_slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_principal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_secundaria_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_secundaria_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comuna` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `comentario_escort` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `altura` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medidas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hora_inicio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hora_fin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `atencion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dias_disponibles` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precio` int(10) DEFAULT NULL,
  `fecha_registro` timestamp NULL DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `categoria_escort` int(11) DEFAULT NULL,
  `color_piel` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_cabello` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caracteristica_fisicas` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `id_escort`, `id_categoria`, `seo_slug`, `foto_principal`, `foto_secundaria_1`, `foto_secundaria_2`, `region`, `comuna`, `descripcion`, `comentario_escort`, `edad`, `altura`, `medidas`, `hora_inicio`, `hora_fin`, `atencion`, `dias_disponibles`, `telefono`, `precio`, `fecha_registro`, `id_estado`, `created_at`, `updated_at`, `categoria_escort`, `color_piel`, `color_cabello`, `caracteristica_fisicas`) VALUES
(1, 1, 1, '', '1565143179Webp.net-resizeimage.jpg', '1565143179foto-3600x400.jpg', '1565143179foto-2600x400.jpg', '15', '307', 'Mi nombre es Dani soy una linda lolita, tierna, hermosa, simpática y muy apasionada. Me gustaría conocer gente con buen gusto y que le encante el sexo y pasarlo bien. Te espero. Besitos dulces como yo!', 'hola quiero pertenecer a su pagina web.', 32, '1,89', '90-60-83', '1:45 PM', '8:00 PM', 'Depto Propio', 'Lunes a Domingo', '+56 9 62 95 39 03', 65000, '2019-08-07 01:59:39', 3, '2019-08-07 01:59:39', '2019-10-19 02:26:20', 1, 'Blanca', 'Rubia', 'Delgada'),
(2, 2, 1, '', '1565143460Webp.net-resizeimage.png', '1565143460DIOS03.jpg', '1565143460DIOSA02.jpg', '15', '300', 'Atención en mi departamento ubicado en Las Condes, me manejo únicamente a nivel ejecutivo. Cuento con estacionamiento privado y todo lo necesario para sentirte seguro.', 'hola quiero pertenecer  a su pagina web', 29, '1,69', '87-90-45', '10:15 AM', '8:15 PM', 'Domicilio', 'Viernes a Domingo', '+56 9 61 96 70 35', 450000, '2019-08-07 02:04:20', 3, '2019-08-07 02:04:20', '2019-10-21 00:16:27', 3, 'Blanca', 'Negro', 'Tetona'),
(3, 3, 1, '', '1565143742rosita-01.png', '1565143742jimena-araya-2012-3_400x400.jpg', '1565143742rosita03.jpg', '15', '299', NULL, NULL, 37, NULL, NULL, NULL, NULL, NULL, NULL, '+56 9 5322 9597', NULL, '2019-08-07 02:09:03', NULL, '2019-08-07 02:09:03', '2019-08-07 02:09:03', NULL, NULL, NULL, NULL),
(4, 4, 1, '', '1565143994sabr.png', '1565143994SABrina022.jpg', '1565143994sabrinas21.jpg', '15', '300', 'hola, mi nombre es Sabrina y soy una delgada escort de lujo, una elegante universitaria que en público te deslumbrará ya que mi clase no tiene comparación pero debes saber que en la cama soy morbosa y aseguro que en mi apartamento cumpliré tus fantasías más viciosas.', 'hola quiero pertenecer a su pagina web.', 46, '1,78', '90-56-90', '1:15 PM', '10:15 PM', 'Depto Propio', 'Lunes a Domingo', '+56 9 4968 3098', 90000, '2019-08-07 02:13:14', 3, '2019-08-07 02:13:14', '2019-08-22 00:08:48', 1, 'Blanca', 'Rubio', 'Normal'),
(5, 5, 1, '', '1565144228sofia01.png', '1565144228SOFIA11.jpeg', '1565144228SOFIASS.jpg', '15', '315', 'Date un gusto, una noche completa o un día, junto a la Sofi. Descuento especial, cenamos, bailamos día o noche. Soy Alanis, una preciosa mujer madura llena de simpatía y encanto con la que podrás disfrutar de una compañía adorable e inolvidable.', 'hola quiero pertenecer a su pagina web.', 43, '1,89', '90-50-50', '5:15 PM', '2:15 AM', 'Hoteles', 'Viernes a Domingo', '+56 9 18 27 18 18', 50000, '2019-08-07 02:17:08', 3, '2019-08-07 02:17:08', '2019-08-22 00:15:51', 4, 'Triguena', 'Castano', 'Rellena'),
(6, 6, 1, '', '1565144422valeria1.png', '1565144422valeria02.jpg', '1565144422VALERIAPRNCIPAL.jpg', '15', '290', NULL, NULL, 29, NULL, NULL, NULL, NULL, NULL, NULL, '+56 9 18 27 11 81', NULL, '2019-08-07 02:20:22', NULL, '2019-08-07 02:20:22', '2019-08-07 02:20:22', NULL, NULL, NULL, NULL),
(7, 7, 1, '', '1565958022foto_01.jpg', '1565958022foto_02.jpg', '1565958022foto_03.jpg', '6', '82', NULL, NULL, 34, NULL, NULL, NULL, NULL, NULL, NULL, '+56 9 81 72 82 71', NULL, '2019-08-16 12:20:23', NULL, '2019-08-16 12:20:23', '2019-08-16 12:20:23', NULL, NULL, NULL, NULL),
(8, 8, 1, '', '1565958185pamela01.jpg', '1565958185pamela02.jpg', '1565958185pamela03.jpeg', '6', '300', 'Hola soy Pamela, te invito a que juntos pasemos un momento super agradable, placentero de relajación plena con una exquisita sesión de masajes profesionales, sensitivos, descontracturantes.', 'hola escuche de su pagina web me gustaria pertenecer  a su pagina web.', 54, '1,98', '84-61-90', '2:00 PM', '10:00 PM', 'Hoteles', 'Lunes a Viernes', '+56 9 17 28 27 18', 25000, '2019-08-16 12:23:05', 3, '2019-08-16 12:23:05', '2019-08-22 01:56:14', 2, 'Blanca', 'Rubio', 'Tetona'),
(9, 9, 1, '', '1565958627Yasmine-01.jpg', '1565958627yasmine-02.jpg', '1565958627yaszmine03.jpg', '15', '299', NULL, NULL, 50, NULL, NULL, NULL, NULL, NULL, NULL, '+56 9 5720 3556 ', NULL, '2019-08-16 12:30:28', NULL, '2019-08-16 12:30:28', '2019-08-16 12:30:28', NULL, NULL, NULL, NULL),
(10, 10, 1, '', '1565958754michele_lewin01.jpg', '1565958754michele_lewin02.jpg', '1565958754michele_lewin03.jpg', '12', '239', NULL, NULL, 45, NULL, NULL, NULL, NULL, NULL, NULL, '+56 9 5699 6823', NULL, '2019-08-16 12:32:35', NULL, '2019-08-16 12:32:35', '2019-08-16 12:32:35', NULL, NULL, NULL, NULL),
(11, 11, 1, '', '1565958909mia01.jpg', '1565958909mia02.jpg', '1565958909mia03.jpg', '6', '315', 'Soy Mia una mujer espectacular de muy lindo rostro, cuerpo impresionantes y curvas seductoras. Te invito a que juntos disfrutemos de un momento inolvidable, lleno de lujuria y placer. Solo tienes que comprobarlo.', 'QUIERO PERTENECER A SU PAGINA WEB VEAN MIS FOTOS !!!', 18, '1,87', '90-65-60', '5:00 PM', '10:30 PM', 'Depto Propio', 'Lunes a Sabado', '+56 9 6203 2165', 65000, '2019-08-16 12:35:09', 3, '2019-08-16 12:35:09', '2019-08-22 02:21:54', 1, 'Morena', 'Negro', 'Tetona'),
(12, 12, 1, '', '1565959074esperanzagomez01.jpg', '1565959074esperanzagomez02.jpg', '1565959074esperanzagomez03.jpg', '15', '296', NULL, NULL, 39, NULL, NULL, NULL, NULL, NULL, NULL, '+56 9 5693 3271', NULL, '2019-08-16 12:37:54', NULL, '2019-08-16 12:37:54', '2019-08-16 12:37:54', NULL, NULL, NULL, NULL),
(13, 13, 1, '', '1568157704maria-davila-01.jpg', '1568157704maria-davila-02.jpg', '1568157704maria-davila-03.jpg', '15', '318', NULL, NULL, 28, NULL, NULL, NULL, NULL, NULL, NULL, '+56 8 71 62 53 26', NULL, '2019-09-10 23:21:45', NULL, '2019-09-10 23:21:45', '2019-09-10 23:21:45', NULL, NULL, NULL, NULL),
(14, 14, 1, '', '1568157949bella3.jpg', '1568157950bella-thorne-01.png', '1568157950bella-thorne-02.png', '3', '12', NULL, NULL, 21, NULL, NULL, NULL, NULL, NULL, NULL, '+56 7 16 26 26 22', NULL, '2019-09-10 23:25:50', NULL, '2019-09-10 23:25:50', '2019-09-10 23:25:50', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `escort_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating_total` double DEFAULT NULL,
  `llamada` int(2) DEFAULT '0',
  `lugar_atencion` int(2) DEFAULT '0',
  `presentacion_personal` int(2) DEFAULT '0',
  `rostro` int(2) DEFAULT '0',
  `busto` int(2) DEFAULT '0',
  `trasero` int(2) DEFAULT '0',
  `comentarios_users` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fecha_calificacion` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ratings`
--

INSERT INTO `ratings` (`id`, `escort_id`, `user_id`, `rating_total`, `llamada`, `lugar_atencion`, `presentacion_personal`, `rostro`, `busto`, `trasero`, `comentarios_users`, `created_at`, `updated_at`, `fecha_calificacion`) VALUES
(1, 1, 1, 5.93, 5, 5, 7, 5, 6, 8, 'mUY BUENA ESCORT', '2019-10-29 00:31:50', '2019-10-29 00:31:50', '2019-10-29 00:31:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regiones`
--

CREATE TABLE `regiones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `regiones`
--

INSERT INTO `regiones` (`id`, `nombre`) VALUES
(1, 'Arica y Parinacota'),
(2, 'Tarapacá'),
(3, 'Antofagasta'),
(4, 'Atacama'),
(5, 'Coquimbo'),
(6, 'Valparaíso'),
(7, 'Región del Libertador Gral. Bernardo O’Higgins'),
(8, 'Región del Maule'),
(9, 'Región del Biobío'),
(10, 'Región de la Araucanía'),
(11, 'Región de Los Ríos'),
(12, 'Región de Los Lagos'),
(13, 'Región Aisén del Gral. Carlos Ibáñez del Campo'),
(14, 'Región de Magallanes y de la AntárVca Chilena'),
(15, 'Región Metropolitana de Santiago');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', NULL, NULL),
(2, 'Escort', 'web', NULL, NULL),
(3, 'USUARIO REGISTRADO', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_escort`
--

CREATE TABLE `servicios_escort` (
  `id` int(11) NOT NULL,
  `id_escort` int(11) DEFAULT NULL,
  `id_tipo_servicio` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicios_escort`
--

INSERT INTO `servicios_escort` (`id`, `id_escort`, `id_tipo_servicio`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-10-19 02:26:20', '2019-10-19 02:26:20'),
(2, 1, 5, '2019-10-19 02:26:20', '2019-10-19 02:26:20'),
(3, 1, 7, '2019-10-19 02:26:20', '2019-10-19 02:26:20'),
(4, 1, 11, '2019-10-19 02:26:20', '2019-10-19 02:26:20'),
(5, 1, 14, '2019-10-19 02:26:20', '2019-10-19 02:26:20'),
(6, 1, 15, '2019-10-19 02:26:21', '2019-10-19 02:26:21'),
(7, 1, 16, '2019-10-19 02:26:21', '2019-10-19 02:26:21'),
(8, 1, 17, '2019-10-19 02:26:21', '2019-10-19 02:26:21'),
(9, 2, 1, '2019-10-21 00:16:49', '2019-10-21 00:16:49'),
(10, 2, 2, '2019-10-21 00:16:49', '2019-10-21 00:16:49'),
(11, 2, 3, '2019-10-21 00:16:49', '2019-10-21 00:16:49'),
(12, 2, 4, '2019-10-21 00:16:49', '2019-10-21 00:16:49'),
(13, 2, 5, '2019-10-21 00:16:49', '2019-10-21 00:16:49'),
(14, 2, 6, '2019-10-21 00:16:49', '2019-10-21 00:16:49'),
(15, 2, 11, '2019-10-21 00:16:49', '2019-10-21 00:16:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_evaluados_escort`
--

CREATE TABLE `servicios_evaluados_escort` (
  `id` int(11) NOT NULL,
  `id_rating` int(11) NOT NULL,
  `nombre_servicio` varchar(80) DEFAULT NULL,
  `valor_servicio_evaluado` int(11) DEFAULT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicios_evaluados_escort`
--

INSERT INTO `servicios_evaluados_escort` (`id`, `id_rating`, `nombre_servicio`, `valor_servicio_evaluado`, `created_at`, `updated_at`) VALUES
(1, 1, 'Besos', 5, '2019-10-28', '2019-10-28'),
(2, 1, 'Masajes', 7, '2019-10-28', '2019-10-28'),
(3, 1, 'Parejas', 7, '2019-10-28', '2019-10-28'),
(4, 1, 'Normal', 5, '2019-10-28', '2019-10-28'),
(5, 1, 'Trios', 7, '2019-10-28', '2019-10-28'),
(6, 1, 'Mov. Pelvicos', 6, '2019-10-28', '2019-10-28'),
(7, 1, 'Sexo oral', 5, '2019-10-28', '2019-10-28'),
(8, 1, 'Quejidos', 5, '2019-10-28', '2019-10-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servicios`
--

CREATE TABLE `tipo_servicios` (
  `id` int(11) NOT NULL,
  `nombre_servicio` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_servicios`
--

INSERT INTO `tipo_servicios` (`id`, `nombre_servicio`, `created_at`, `updated_at`) VALUES
(1, 'Besos', '2019-08-18 04:00:00', '2019-08-18 04:00:00'),
(2, 'Rusa', '2019-08-18 04:00:00', '2019-08-18 04:00:00'),
(3, 'Americana', '2019-08-18 04:00:00', '2019-08-18 04:00:00'),
(4, 'Lesbico', '2019-08-18 04:00:00', '2019-08-18 04:00:00'),
(5, 'Masajes', '2019-08-18 04:00:00', '2019-08-18 04:00:00'),
(6, 'Sexo Anal', '2019-08-18 04:00:00', '2019-08-18 04:00:00'),
(7, 'Parejas', '2019-08-18 04:00:00', '2019-08-18 04:00:00'),
(8, 'Dominacion', '2019-08-18 04:00:00', '2019-08-18 04:00:00'),
(9, 'Despedidas de Solteros', '2019-08-18 04:00:00', '2019-08-18 04:00:00'),
(10, 'Dos Hombres', '2019-08-18 04:00:00', '2019-08-18 04:00:00'),
(11, 'Normal', '2019-08-18 04:00:00', '2019-08-18 04:00:00'),
(12, 'Cambio de Rol', '2019-08-18 04:00:00', '2019-08-18 04:00:00'),
(13, 'Dama de Compañia', '2019-05-30 14:00:00', '2019-08-18 04:00:00'),
(14, 'Trios', '2019-08-18 04:00:00', NULL),
(15, 'Mov. Pelvicos', '2019-05-30 14:00:00', NULL),
(16, 'Sexo oral', '2019-10-15 03:00:00', NULL),
(17, 'Quejidos', '2019-10-15 03:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuarios`
--

CREATE TABLE `tipo_usuarios` (
  `id_tipo_usuario` int(11) NOT NULL,
  `descripcion` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuarios`
--

INSERT INTO `tipo_usuarios` (`id_tipo_usuario`, `descripcion`) VALUES
(1, 'ESCORTS'),
(2, 'USUARIO REGISTRADO'),
(3, 'ADMIN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `id_tipo_usuario` int(11) DEFAULT NULL,
  `follower_number` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_principal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `id_estado`, `id_tipo_usuario`, `follower_number`, `remember_token`, `foto_principal`, `created_at`, `updated_at`) VALUES
(1, 'JOSE GREGORIO', 'RODRIGUEZ RASON', 'jgregoriorason@gmail.com', NULL, '$2y$10$49c0DUNLwHcmuMj5N9YqfuA5AfBahov5zHOjvs/icQE3H54JYr6Ti', 3, 2, 0, NULL, NULL, '2019-07-02 13:32:10', '2019-07-02 13:32:10'),
(2, 'CRISTOBAL', 'Muñoz', 'cristobal@gmail.com', NULL, '$2y$10$/wNEFGzCJi5nxcDlL7EcWeCHPhjURoEDvm3wMhGcJzHT9MjMhlnUq', 3, 2, 0, NULL, NULL, '2019-07-02 13:34:27', '2019-07-02 13:34:27'),
(3, 'SEBASTIAN', 'CARRASCO', 'sebastiancarrasco@gmail.com', NULL, '$2y$10$mAzmjkK0ou3cmSxe721Mh.WS02SsmSS1sd5e/7aXvJbgIVPopcGKy', 3, 2, 0, NULL, NULL, '2019-07-02 13:37:36', '2019-07-02 13:37:36'),
(4, 'ADMINISTRADOR', 'SEDUCTIVES', 'admin@gmail.com', NULL, '$2y$10$fwXG4yPGAgk5mib5UfJoR.olVjjaI9RmF0As6mfdfQRCGVLTeFqnW', 3, 3, 0, 'QfmwADKkOJ8Aez8YXWyOS3RowG0YmIEqWT2PGZoCLyF4HO6mKbS5FHSsn63b', NULL, '2019-07-02 14:13:56', '2019-07-02 14:13:56'),
(5, 'LA DANI', NULL, 'DANIELACHAVEZ@HOTMAIL.COM', NULL, '$2y$10$5whaNixHUXS0q2/Bzh7GBeqp8.56mtjWGXZteUWLVpNtOEZCigZ8.', 3, 1, 0, NULL, NULL, '2019-08-09 01:58:11', '2019-08-09 01:58:11'),
(6, 'LA DIOSA', NULL, 'DIOSA@GMAIL.COM', NULL, '$2y$10$OWyIN0emLuvsVybe8B9rnuhOU0ocC/9pmDXuxuwR8LCISG.7ANEEi', 3, 1, 0, NULL, NULL, '2019-08-09 02:16:57', '2019-08-09 02:16:57'),
(7, 'SABRINA', NULL, 'SABRINA@GMAIL.COM', NULL, '$2y$10$SNDVMyOPCGuwD3whfUeHd.UXPn4nzSWlACHBw0jL8vqRShxofIJUy', 3, 1, 0, NULL, NULL, '2019-08-09 02:24:01', '2019-08-09 02:24:01'),
(9, 'LA SOFI', NULL, 'SOFIA@GMAIL.COM', NULL, '$2y$10$GqjSsgRDuTDhETtINA9xu.aMePuxJwzzLCc0D3lRqGBpMuI0cneM.', 3, 1, 0, NULL, NULL, '2019-08-09 02:28:52', '2019-08-09 02:28:52'),
(10, 'GUILLERMO GONZALEZ', NULL, 'GUILLERMO@HOTMAIL.COM', NULL, '$2y$10$UFhzj9FDKKL4kkXKzDrRV.rH/lzW5hO5dMowK911Txi31ovjq.cWi', 3, 2, 0, NULL, NULL, '2019-08-17 15:07:30', '2019-08-17 15:07:30'),
(11, 'PAMELA ANDERSON', NULL, 'PAMELA@GMAIL.COM', NULL, '$2y$10$Lhdsoe.4.pW4yh80IKYu3emYBe3vVvPy/z0Gwiwm0qnMg2wsfuWh2', 3, 1, 0, NULL, NULL, '2019-08-22 01:53:46', '2019-08-22 01:53:46'),
(12, 'MIA KHALIFA', NULL, 'MIA@HOTMAIL.COM', NULL, '$2y$10$qpGNM/Z8t3a9xvHbe7liKetv9fjq8.HGn./e6nqBjhEz.IhSWcDAu', 3, 1, 0, NULL, NULL, '2019-08-22 02:19:02', '2019-08-22 02:19:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visited_profile`
--

CREATE TABLE `visited_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `escort_id` int(11) NOT NULL,
  `seen` int(11) NOT NULL DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `visited_profile`
--

INSERT INTO `visited_profile` (`id`, `user_id`, `escort_id`, `seen`, `updated_at`, `created_at`) VALUES
(1, 1, 1, 1233, '2019-11-09 12:04:04', '2019-07-09 01:51:52'),
(2, 1, 2, 60, '2019-10-28 23:18:31', '2019-07-09 01:57:17'),
(3, 2, 3, 44, '2019-10-28 23:41:31', '2019-07-24 01:58:08'),
(4, 2, 4, 10, '2019-10-29 00:37:36', '2019-07-24 02:16:52'),
(5, 1, 14, 1, '2019-10-28 23:24:10', '2019-10-28 23:24:10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_idx` (`id_region`);

--
-- Indices de la tabla `escorts`
--
ALTER TABLE `escorts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `escorts_email_unique` (`email`);

--
-- Indices de la tabla `escort_fotos`
--
ALTER TABLE `escort_fotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `escort_fotos_id_perfil_foreign` (`id_perfil`),
  ADD KEY `escort_fotos_id_escort_foreign` (`id_escort`);

--
-- Indices de la tabla `escort_video`
--
ALTER TABLE `escort_video`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `follow_escort`
--
ALTER TABLE `follow_escort`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `likes_escort`
--
ALTER TABLE `likes_escort`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfil`),
  ADD KEY `perfiles_id_categoria_foreign` (`id_categoria`),
  ADD KEY `perfiles_id_escort_foreign` (`id_escort`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `regiones`
--
ALTER TABLE `regiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `servicios_escort`
--
ALTER TABLE `servicios_escort`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios_evaluados_escort`
--
ALTER TABLE `servicios_evaluados_escort`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_servicios`
--
ALTER TABLE `tipo_servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `visited_profile`
--
ALTER TABLE `visited_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `comuna`
--
ALTER TABLE `comuna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=339;

--
-- AUTO_INCREMENT de la tabla `escorts`
--
ALTER TABLE `escorts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `escort_fotos`
--
ALTER TABLE `escort_fotos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `escort_video`
--
ALTER TABLE `escort_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `follow_escort`
--
ALTER TABLE `follow_escort`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `likes_escort`
--
ALTER TABLE `likes_escort`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT de la tabla `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `regiones`
--
ALTER TABLE `regiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicios_escort`
--
ALTER TABLE `servicios_escort`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `servicios_evaluados_escort`
--
ALTER TABLE `servicios_evaluados_escort`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipo_servicios`
--
ALTER TABLE `tipo_servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `visited_profile`
--
ALTER TABLE `visited_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD CONSTRAINT `id` FOREIGN KEY (`id_region`) REFERENCES `regiones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `escort_fotos`
--
ALTER TABLE `escort_fotos`
  ADD CONSTRAINT `escort_fotos_id_escort_foreign` FOREIGN KEY (`id_escort`) REFERENCES `escorts` (`id`),
  ADD CONSTRAINT `escort_fotos_id_perfil_foreign` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD CONSTRAINT `perfiles_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `perfiles_id_escort_foreign` FOREIGN KEY (`id_escort`) REFERENCES `escorts` (`id`);

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
