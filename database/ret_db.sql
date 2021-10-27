-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 17-02-2020 a las 20:10:39
-- Versión del servidor: 5.6.41-84.1
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ashbel18_ret_db`
--
CREATE DATABASE IF NOT EXISTS `ashbel18_ret_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `ashbel18_ret_db`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenes`
--

CREATE TABLE `almacenes` (
  `id` int(11) NOT NULL,
  `tipo` text COLLATE utf32_spanish_ci NOT NULL COMMENT 'Venta, Compra, Consumo, RMA',
  `nombre` text COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `almacenes`
--

INSERT INTO `almacenes` (`id`, `tipo`, `nombre`) VALUES
(1, 'ppal', 'Principal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(1, 'Equipos Electromecánicos', '2019-04-08 17:57:51'),
(2, 'Taladros', '2017-12-21 22:53:29'),
(3, 'Andamios', '2017-12-21 22:53:29'),
(4, 'Generadores de energía', '2017-12-21 22:53:29'),
(5, 'Equipos para construcción', '2017-12-21 22:53:29'),
(6, 'Martillos mecánicos', '2017-12-22 01:06:40'),
(7, 'Equipos celulares', '2019-04-12 15:47:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `email` text COLLATE utf8_spanish_ci,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `incidencia` int(11) NOT NULL DEFAULT '0' COMMENT 'numero de incidencia generada',
  `ultima_incidencia` datetime DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_grupo` int(11) NOT NULL DEFAULT '0',
  `estatus` int(11) NOT NULL DEFAULT '0' COMMENT '0 = activo y 1 = Inactivo',
  `localizador` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `documento`, `email`, `telefono`, `direccion`, `fecha_nacimiento`, `incidencia`, `ultima_incidencia`, `fecha`, `id_grupo`, `estatus`, `localizador`) VALUES
(1, 'Jackeline Bonano', 117, NULL, '787-200-7002', 'Ave. 65 Infantería, Km. 7 Hm. 3, Río Piedras, PR 00924', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Comandante '),
(2, 'Julián García', 118, NULL, '787-200-7003', 'Amalia Marín Esquina Gándara, Río Piedras, PR 00925', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Río Piedras'),
(3, 'Jackeline Colón', 184, NULL, '787-679-7725', 'Ave. Roberto H. Todd, Santurce, PR 00925', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Santurce - Pda 18'),
(4, 'José Vargas', 243, NULL, '787-878-4455', 'Carr. #2, Ave. Llorens Torres, Arecibo Shopping Center, Arecibo, PR 00612', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Arecibo'),
(5, 'Jackeline Colón', 268, NULL, '787-753-1368', 'Ave. Ponce de León #207, Detrás de Popular Center, San Juan PR 00917', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Hato Rey-Milla de Oro'),
(6, 'Francisco Salas', 348, NULL, '787-679-7727', 'Ave. Campo Rico Ext. Contry Club, Río Piedras, PR 00928', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Campo Rico I'),
(7, 'Milka Pérez', 385, NULL, '787-743-4755', 'Antigua Carretera # 1 de Caguas a Cayey, Caguas, PR 00725', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Caguas 1'),
(8, 'Joel Jácome', 687, NULL, '787-843-5005', 'Ave. Las Américas, Esquina Ave. de Hostos, Ponce, PR 00731', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Ponce 1'),
(9, 'Julio Vale', 1071, NULL, '787-834-0520', 'Calle Luna # 54 (Pueblo), Condominio Apolo, Mayagüez, PR 00968', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Mayagüez 1'),
(10, 'Joel Jácome', 1108, NULL, '787-844-8355', 'Calle Marginal KM 7, Carretera Estatal # 1, Barrio Machuelo Bajo, Urb. Valle Verde, Ponce, PR 00731', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Ponce 2'),
(11, 'Julio Vale', 1172, NULL, '787-833-2180', 'Mayagüez Mall, Carretera #2 Km. 159.4, Mayagüez, PR 00680', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Mayagüez 2'),
(12, 'Milka Pérez', 1386, NULL, '787-738-2083', 'Carretera # 1 Int. # 15 Barrio Monte Llanos, Cayey Shopping Center, Cayey, PR 00736', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Cayey 1'),
(13, 'Wilfredo Torres', 1409, NULL, '787-720-4782', 'Calle México, Esquina Carretera # 833 Parkville, Guaynabo, PR 00955', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Parkville'),
(14, 'Luis Soto', 1460, NULL, '787-786-1927', 'Carretera Estatal # 2 Km. 14.7 Hato Tejas, Bayamón, PR 00961', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Bayamón Oeste '),
(15, 'Jackeline Colón', 1521, NULL, '787-679-7728', 'Calle Rodríguez Serrá, Esquina Ave. Ashford, Condado, PR 00901', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Condado I'),
(16, 'Francisco Salas', 2075, NULL, '787-710-8177', 'Ave. Boca Cangrejos, Esquina Baldorioty de Castro, Isla Verde, Carolina, PR  00979', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Isla Verde '),
(17, 'Lourdes Ortíz', 2158, NULL, '787-852-4935', 'Carretera # 30 Calle Dr. Rincón, Reparto Rivera Donato, Humacao, PR 00791', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Humacao I'),
(18, 'Santiago Huezo', 2231, NULL, '787-780-3435', 'Ave. Lomas Verdes Carretera # 174, Barrio Juan Sánchez, Bayamón, PR 00956', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Lomas Verdes '),
(19, 'Julián García', 2456, NULL, '787-763-1621', 'El Señorial Shopping Center, Esquina Paraná, Cupey, San Juan, PR 00925', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Señorial'),
(20, 'Francisco Salas', 2457, NULL, '787-755-0565', 'Trujillo Alto Plaza, Expreso de Trujillo Alto Carr. 181, Trujillo Alto, PR 00976', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Trujillo Alto'),
(21, 'Xiomara Labrador', 2511, NULL, '787-797-8500', 'Rexville Plaza Shopping Center, Carretera Estatal # 167 Km. 18.8, Bayamón, PR 00956', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Rexville '),
(22, 'Rosvelyn Félix', 2524, NULL, '787-863-4262', 'Centro Comercial El Batey, Barrio Sandinera  Carr. Municipal, Desvío a Las Croabas, \nFajardo, PR 00738;1', NULL, 0, NULL, '2019-07-26 02:40:20', 1, 0, NULL),
(23, 'José Rivera', 2533, NULL, '787-854-3173', 'Carretera Estatal # 2, Esquina Calle # 6, Urb. Félix Dávila, Manatí, PR 00674', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Manatí'),
(24, 'Jackeline Colón', 2601, NULL, '787-296-8971', 'Calle San Francisco # 269, Esquina Calle Tasca Viejo San Juan, San Juan, PR 00901', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Viejo San Juan'),
(25, 'Jackeline Colón', 2767, NULL, '787-296-8972', 'Amalia Marín, Esquina Gándara, Ave. Domenech, Esquina Juan J. Jiménez, San Juan, PR 00925', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Domenech '),
(26, 'Angel Delgado', 2785, NULL, '787-278-2121', 'Dorado Shopping Center, Carretera Estatal # 693, Barrio Mameyal, Dorado, PR 00646', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Dorado'),
(27, 'Wilfredo Torres', 2856, NULL, '787-754-0311', 'Plaza Las Américas Shopping Center, Local #305 Tercer Nivel, Hato Rey, PR 00917', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Plaza I - La Terraza'),
(28, 'José Vargas', 3015, NULL, '787-878-6821', 'Plaza Atlántico Shopping Center Local K,  Km. 8.3, Arecibo, PR 00612  ', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Plaza Atlántico '),
(29, 'Joel Jácome', 3039, NULL, '787-840-1991', 'Carretera Estatal # 2 Km 260.4, Valle Real, Ponce, PR 00731', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Ponce 3'),
(30, 'William López', 3040, NULL, '787-825-2665', 'Carretera Estatal # 4, Esquina Calle A, Barrio San Delfonso, Coamo, PR 00769', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Coamo'),
(31, 'Audie Alvarez', 3067, NULL, '787-856-1465', 'Carretera Estatal # 127, Calle 25 de Julio, Yauco, PR 00698', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Yauco'),
(32, 'Milka Pérez', 3256, NULL, '787-738-5333', 'Calle de Diego Esquina Corchado, Cayey, PR 00736', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Cayey 2 '),
(33, 'Damaris Flores', 3257, NULL, '787-864-2450', 'Carretera Estatal # 3, KM. 135.8, Guayama, PR 00784 ', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Guayama 1'),
(34, 'Julio Vale', 3291, NULL, '787-834-2825', 'Calle Post & Basora, Mayagüez, PR 00680', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Mayagüez 3 '),
(35, 'Wilfredo Torres', 3370, NULL, '787-720-8802', 'Expreso Martínez Nadal, Los Jardines Shopping Center, Guaynabo PR 00965', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Guaynabo'),
(36, 'Wilfredo Torres', 3539, NULL, '787-296-8973', 'Centro Comercial San Francisco, Río Piedras, PR 00925', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'San Francisco '),
(37, 'Julián García', 3560, NULL, '787-296-8974', 'Solar 170 - A Bloque S, Urb. San Agustín, Barrio Sabana Llana, Río Piedras, PR 00928', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'San Agustín '),
(38, 'Luis Soto', 3741, NULL, '787-795-6525', 'Plaza Río Hondo Shopping Center Ave. Comerío, Bayamón, PR 00961', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Río Hondo (Estacionamiento)'),
(39, 'Julián García', 3769, NULL, '787-710-8285', 'Ave. José C. Barbosa # 368, Urb. Dávila & Llenaza, Hato Rey,  PR 00907', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Barbosa '),
(40, 'Joel Jácome', 3872, NULL, '787-840-7570', 'Calle Unión # 7 (Frente a la Plaza de Recreo), Plaza Degetau Calle Unión, Ponce, PR 00907', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Ponce 4'),
(41, 'Julián García', 3986, NULL, '787-751-4744', 'Centro Médico Fast Food Center, Cafetería Central de Centro Médico, Entre hospital Universitario y Hospital del niño,  Río Piedras, PR 00925 ', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Centro Médico'),
(42, 'Wilfredo Torres', 3987, NULL, '787-710-8286', 'Plaza Puerto Rico, Carretera # 1 Esquina Camino Sein, Río Piedras, PR 00925', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Interamericana '),
(43, 'Audie Alvarez', 4325, NULL, '787-892-4390', 'Carretera # 102 Barrio Maresua  Km. 204.6 (Frente a Universidad Interamericana), San Germán, PR 00683', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'San Germán '),
(44, 'Lizamaira Rodríguez', 4512, NULL, '787-894-3940', 'Carretera Estatal # 111 - R, Calle Dr. Cueto, Utuado, PR 00641', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Utuado'),
(45, 'Jackeline Bonano', 4545, NULL, '787-752-4190', 'Ave.65 Infantería KM 7, Carolina, PR 00987', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Roberto Clemente'),
(46, 'Francisco Salas', 4595, NULL, '787-710-8287', 'Carretera # 187, Esquina Los Gobernadores, Carolina, 00979', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Plazoleta Isla Verde'),
(47, 'Francisco Salas', 4821, NULL, '787-710-8288', 'Ave.65 Infantería, Esquina Calle Abad, Urb. Club Manor Bo. Sabana Llena, \nRío Piedras, PR 00925;1', NULL, 0, NULL, '2019-07-26 02:40:20', 1, 0, NULL),
(48, 'Jessica Bermúdez', 4978, NULL, '787-746-2523', 'Carretera # 1, Km. 34.5 (Frente a Centro Comercial Villa Blanca) Entrada Urbanización Bairoa, Caguas, PR 00725', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Caguas 2 '),
(49, 'Xiomara Labrador', 5060, NULL, '787-740-1464', 'Carretera Estatal # 2 Km. 10.0, Santa Rosa Mall, Bayamón, PR 00959', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Santa Rosa '),
(50, 'Jackeline Colón', 5131, NULL, '787-710-8289', 'Ave. Baldorioty de Castro, Calle Esquilín y Linda Vista, Santurce, PR 00907', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Baldorioty'),
(51, 'Rosvelyn Félix', 5254, NULL, '787-887-8030', 'Carretera # 3 Km. 23.5, Barrio Ciénaga Baja, Río Grande, PR 00745', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Río Grande'),
(52, 'Luis Soto', 5405, NULL, '787-786-3055', 'Ave. Comerío Esquina Calle 24, Sierra Bayamón, Bayamón, PR 00961', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Sierra Bayamón'),
(53, 'Julián García', 5437, NULL, '787-710-8290', 'Carretera 176 Intersección Carretera # 838, Río Piedras, PR 00926', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Cupey 2 '),
(54, 'William González', 5475, NULL, '787-891-9359', 'Carretera # 2 Esquina Carretera Estatal # 459, Aguadilla, PR 00603', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Aguadilla 1'),
(55, 'Angel Delgado', 5476, NULL, '787-883-6476', 'Carretera Estatal #2 Centro Comercial Plaza del Caribe, Vega Alta, PR 00692 ', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Vega Alta '),
(56, 'José Vargas', 5531, NULL, '787-895-2583', 'Carretera Estatal # 2 Km. 100.7, Quebradillas, PR 00678', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Quebradilla '),
(57, 'Jessica Bermúdez', 5844, NULL, '787-746-8683', 'Plaza Centro I, Ave. Rafael Cordero, Esquina Carretera # 30, Caguas, PR 00725', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Caguas 4, Plaza Centro 1'),
(58, 'Francisco Salas', 5845, NULL, '787-710-8291', 'Ave. Campo Rico AL-15 Country Club, San Juan, PR 00982', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Campo Rico 2 - Carolina'),
(59, 'Xiomara Labrador', 5930, NULL, '787-785-8282', 'Ave. Santa Juanita, Calle 24, Bayamón Sur Shopping Center Los Millones, Bayamón, PR 00956', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Bayamón, Los Millones '),
(60, 'Evelyn Vázquez', 5977, NULL, '787-850-2466', 'Vista del Río Comercial Park, Carretera # 3 Ramal # 908 Vista del Río, Humacao, PR 00791', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Humacao, Vista del Río '),
(61, 'Evelyn Vázquez', 6043, NULL, '787-850-0631', 'Carretera Estatal # 3 y Carretera # 908 Urb. Villa Universitaria, \nHumacao, PR 00791;1', NULL, 0, NULL, '2019-07-26 02:40:20', 1, 0, NULL),
(62, 'Xiomara Labrador', 6115, NULL, '787-740-0350', 'Carretera Estatal # 167, Urb. Forest Hills, Bayamón, PR 00959', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Forest Hills - Bayamón'),
(63, 'José Rivera', 6319, NULL, '787-858-5555', 'Las Vegas Mall, Carretera # 2 Km. 39.4, Barrio Algarrobo, Vega Baja, PR 00693', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Vega Baja '),
(64, 'Wilfredo Torres', 6321, NULL, '787-250-8737', 'Primer Nivel Plaza las Américas al lado de Sears, Hato Rey, PR 00693', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Plaza Sears, Plaza las Américas'),
(65, 'Jessica Bermúdez', 6328, NULL, '787-746-2429', 'Centro Comercial Mi Antojo, Ave. Gautier Benítez, Km. 37 Lote A, Caguas, PR 00725', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Caguas Mi Antojo'),
(66, 'Luis Soto', 6754, NULL, '787-261-0128', 'Ave. Sabana Seca, Esquina Lizzie Graham, Calle 726 & 734, Levittown Lakes, Toa Baja, PR  00949', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Levittown 1'),
(67, 'Santiago Huezo', 7154, NULL, '787-710-8292', 'Calle Industrial Ctro. de Seguros San Patricio, Calle Resolución Esquina, F.D. Roosevelt, \nPueblo Viejo, San Juan, PR 00920;1', NULL, 0, NULL, '2019-07-26 02:40:20', 1, 0, NULL),
(68, 'Rosvelyn Félix', 7161, NULL, '787-860-1500', 'Ctro. Comercial Monte Brisas, Urb. Monte Brisas, Carretera 194 Km. 2.0 Fajardo, PR 00716', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Fajardo 2'),
(69, 'William González', 7171, NULL, '787-877-5555', 'Carretera # 111 Km. 4.6, San Francisco Cour, Moca, PR 00676', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Moca '),
(70, 'William López', 7289, NULL, '787-837-6862', 'Intersección Carretera Estatal # 149 con Carretera # 584, Juana Díaz, PR 00795', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Juana Díaz '),
(71, 'Rosvelyn Félix', 7539, NULL, '787-256-2350', 'Ctro. Comercial Plaza Noroeste, Carr.  Estatal # 3 Km. 20.5 Villas de Loíza, Loíza, PR 00795', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Loíza'),
(72, 'José Vargas', 7788, NULL, '787-880-0446', 'Plaza del Norte Shopping Center, Carretera # 2 Km. 81.9, Hatillo, PR 00659', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Hatillo 1'),
(73, 'William González', 7822, NULL, '787-829-3037', 'Centro Multiservicios Cooperativo, Carretera Estatal # 115 Km. 24.8, Barrio Asomante \nAguada, PR 00602 ;1', NULL, 0, NULL, '2019-07-26 02:40:20', 1, 0, NULL),
(74, 'Joel Jácome', 7884, NULL, '787-259-8299', 'Ponce Builders Square, Carretera Estatal # 2 Barrio Cañas, Ponce, PR 00731', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Ponce Massó '),
(75, 'Joel Jácome', 7967, NULL, '787-840-3396', 'Calle Fagot, La Rambla, Ponce, PR 00731', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Ponce Rambla'),
(76, 'Damaris Flores', 8308, NULL, '787-866-8271', 'Carretera # 54 (desvío Sur carr. # 3 ) Barrio Machete, Guayama, PR 00785', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Guayama Machete'),
(77, 'Damaris Flores', 8452, NULL, '787-864-5010', 'Plaza Guayama Shopping Center, Carretera Estatal # 3 Km. 134.6, Guayama, PR 00785', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Guayama 3'),
(78, 'Damaris Flores', 8858, NULL, '787-845-6972', 'Carretera # 52 Intersección Carretera 153, Barrio Jauca, Santa Isabel, PR 00757', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Santa Isabel'),
(79, 'José Vargas', 8863, NULL, '787-830-1605', 'Plaza Isabel Shopping Center, Carretera Estatal # 2 Km. 111, Isabela, PR 00794', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Isabela'),
(80, 'Vacante', 8966, NULL, '787-857-5437', 'Carretera Estatal # 156 Km. 14.2, Bo. Honduras, Barranquitas, PR 00794', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Barranquitas'),
(81, 'Julio Vale', 8968, NULL, '787-831-8225', 'Mayagüez Builders Sq. Shopping Center, Carr. Estatal # 2 Bo. Sabaneta, Mayagüez, PR 00680', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Mayagüez Massó'),
(82, 'Jackeline Bonano', 9410, NULL, '787-710-8293', 'Los Colobos Shopping Center, Ave. 65 Infantería, Carolina, PR 00982', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Los Colobos '),
(83, 'Evelyn Vázquez', 10030, NULL, '787-285-8237', 'Palma Real Shopping Center, Food Court, Int. 53, Carretera PR # 3, Humacao, PR 00791', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Humacao, Palma Real'),
(84, 'Julio Vale', 10045, NULL, '787-255-1595', 'Carretera Estatal # 101, Km. 17.2 Solar # 2 Boquerón Beach, Cabo Rojo PR 00622', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Cabo Rojo, Boquerón '),
(85, 'Audie Alvarez', 10052, NULL, '787-892-4528', 'Parque Industrial, Camino Real, Carr. Estatal # 2 Esquina Carr. 102, San Germán, PR 00963', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'San Germán 2'),
(86, 'Francisco Salas', 10069, NULL, '787-710-8294', 'Caribbean Airport Facilities, Aeropuerto Internacional Luis Muñoz Marín, Carolina, PR 00979', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Tiri Airport '),
(87, 'Lourdes Ortíz', 10485, NULL, '787-745-1015', 'Carretera Estatal # 189 Km. 3.5 Barrio Rincón, Gurabo, PR 00778', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Caguas,Turabo'),
(88, 'Lourdes Ortíz', 10736, NULL, '787-733-1535', 'Carretera Estatal # 183 Km. 20.7, Barrio Montones, Las Piedras, PR 00771', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Las Piedras '),
(89, 'Santiago Huezo', 10822, NULL, '939-793-7233', 'Econo Supermarket, Ave. Martínez Nadal , Esquina con Jesús T. Piñeiro, Altamira, Guaynabo, PR 00920', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Altamira'),
(90, 'Julio Vale', 10823, NULL, '787-265-5515', 'Mayagüez Mall, Local W - 6 Food Court, Carretera Estatal # 2 Km. 159.4, Mayagüez, PR 00680', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Mayagüez Mall '),
(91, 'José Vargas', 11102, NULL, '787-820-4629', 'Carretera # 2 PR 2, Km. 86.6 Barrio Pueblo, Hatillo PR 00659', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Hatillo 2'),
(92, 'Evelyn Vázquez', 11103, NULL, '787-266-2287', 'Carretera Estatal 901 Km. 8.6 Urb. Valles de Yabucoa, Bo. Juan Martín, Yabucoa PR  ', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Yabucoa '),
(93, 'Jessica Bermúdez', 11218, NULL, '787-286-0710', 'Notre Dame Commercial Development, Ave. Muñoz Marín (Frente a la Urb. Notre Dame) Bo. Thomas de Castro, Caguas, PR 00725 ', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Caguas, Notre Dame'),
(94, 'Lourdes Ortíz', 11272, NULL, '787-713-1070', 'Juncos Plaza Shopping, Carr. Estatal # 31 Km. 24.0 Bo. Ceiba Norte, Juncos, PR 00777', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Juncos'),
(95, 'Jackeline Bonano', 11521, NULL, '787-710-8295', 'Carretera Estatal # 3 Km. 11.6, Centro Judicial Barrio Trujillo Alto, Carolina, PR 00979', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Carolina, Centro Judicial '),
(96, 'Evelyn Vázquez', 11563, NULL, '787-885-2839', 'Calle Lauro Piñero # 3161 Esquina Carretera, Estatal # 978 Km. 21.19, Ceiba, PR 00735', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Ceiba'),
(97, 'Rosvelyn Félix', 11605, NULL, '787-809-2431', 'Río Grande States Shopping Center, Carretera # 3 Ave. 65 Infantería Esquina Carretera # 956 Km. 28.0 Barrio Zarzal, Río Grande, PR 00745', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Río Grande 2'),
(98, 'William López', 11674, NULL, '787-829-3037', 'Ave. Rudolfo González Final, Carr. #10, Barrio Rodríguez, Sector Desvío, Adjuntas, PR 00601', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Adjuntas'),
(99, 'William González', 11677, NULL, '787-280-0455', 'San Sebastián Shopping Center, Carr. Estatal # 118 Km. 18.0, San Sebastián, PR 00685', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'San Sebastián'),
(100, 'Xiomara Labrador', 11678, NULL, '787-778-8214', 'Calle Santa Cruz # 60, Urb. Santa Cruz, Bayamón, PR 00961', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'San Pablo '),
(101, 'Jackeline Bonano', 11687, NULL, '787-710-8296', 'Ave. Jesús M. Frogoso Esq. Ave. Fidalgo Diaz, Urb. Villa Fontana, Carolina, PR 00985', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Puma Plaza Carolina'),
(102, 'Luis Soto', 11902, NULL, '787-261-3770', 'Carretera Estatal # 165, Esquina Avenida Boulevard, Levittown, Toa Baja, PR 000959', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Levittown 2'),
(103, 'Milka Pérez', 11907, NULL, '787-714-0525', 'Carretera Estatal # 172 Km. 13.6, Cidra, PR 00739', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Cidra'),
(104, 'Lizamaira Rodríguez', 11908, NULL, '787-897-4743', 'Carretera Estatal # 111 Km. 2.9, Barrio Pueblo, Lares, PR 00669', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Lares'),
(105, 'Francisco Salas', 11959, NULL, '787-710-8297', 'Plaza Escorial Shopping Center, Carolina, PR 00979', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Parque Escorial'),
(106, 'Julián García', 12144, NULL, '787-287-7340', 'Carretera Estatal # 52, Montehiedra Shopping Center, Río Piedras, PR 00920', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Montehiedra'),
(107, 'Luis Soto', 12234, NULL, '787-785-7948', 'Shopping Center, Ave. West Main # 501 Sierra Bayamón, Bayamón, PR 00961', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Plaza del Sol '),
(108, 'Milka Pérez', 12273, NULL, '787-738-2285', 'Carretera Estatal # 14 Km. 65.5, Cayey, PR 00736', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Cayey 3'),
(109, 'Lizamaira Rodríguez', 12282, NULL, '787-816-6781', 'Carretera Estatal # 129 Km. 42.5,(Frente Residencial El Cotto), Arecibo, RR 00612', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Arecibo Jové'),
(110, 'Santiago Huezo', 12352, NULL, '787-995-0580', 'Lucchetti Industrial Park, Carretera Estatal # 28 Km. 2.2, Bayamón, PR 00956', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Lucchetti '),
(111, 'Damaris Flores', 12353, NULL, '787-271-0854', 'Carretera Estatal # 3, Km. 123.0, Patillas, PR 00723 ', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Patillas'),
(112, 'José Rivera', 12354, NULL, '787-862-3917', 'Carretera Estatal 155, Km. 47.4, Morovis, PR 00687', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, ' Morovis'),
(113, 'Jackeline Bonano', 12381, NULL, '787-776-2254', 'Plaza Carolina Mall (primer nivel) Ave. Fragoso, Villa Fontana, Carolina, PR 00729', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Plaza Carolina 2'),
(114, 'Jackeline Bonano', 12383, NULL, '787-710-8299', 'Rial Plaza Shopping, Carretera Estatal #185 Km. 0.0, Canóvanas, PR 00729', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Canóvanas '),
(115, 'Vacante', 12384, NULL, '787-802-0706', 'Carretera Estatal # 159 Km. 15.2, Corozal, PR 00783', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Corozal '),
(116, 'Evelyn Vázquez', 12715, NULL, '787-874-6883', 'Carretera Estatal # 31, Km. 3.2, Naguabo, PR 00718 ', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Naguabo'),
(117, 'William González', 12716, NULL, '787-823-0710', 'Carretera Estatal # 115 Km. 11.0, Rincón, PR 00677', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Rincón'),
(118, 'Julio Vale', 12717, NULL, '787-892-3210', 'Carretera Estatal # 2 Km. 167.3, Hormigueros, PR 00660', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Hormigueros'),
(119, 'William López', 12718, NULL, '787-847-0398', 'Carretera Estatal #149 Km. 55.2, Villalba, PR 00766 ', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Villalba'),
(120, 'Santiago Huezo', 13085, NULL, '787-945-0074', 'Carretera Estatal # 24 Lote 10, Metro Office Park, Guaynabo, PR 00968 - 1705', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Metro Office'),
(121, 'Jessica Bermúdez', 13086, NULL, '787-286-2915', 'Carretera # 52 (Expreso) & Carretera Estatal # 156, Caguas, PR 00725', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Las Catalinas Mall '),
(122, 'Angel Delgado', 13104, NULL, '787-270-1114', 'Carretera Estatal # 2 Km. 29.7, Vega Alta, PR 00692', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Plaza Grand Mall '),
(123, 'Jessica Bermúdez', 13291, NULL, '787-745-1055', 'Plaza Centro 3 Shopping FC, Ave Muñoz Marín, Carr. Estatal #30 Esquina Rafael Cordero,  Caguas, PR 00725 ', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Caguas, Plaza Centro 3 '),
(124, 'José Rivera', 13429, NULL, '787-867-7174', 'Carr. Estatal #155 Km. 30.8 con Carr. Estatal # 157 Barrio Garos, Orocovis, PR 00720', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Orocovis'),
(125, 'William López', 13457, NULL, '787-803-1887', 'Coamo Plaza, Carretera Estatal # 153 Km. 13.5, Coamo, PR 00769', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Coamo 2'),
(126, 'Julio Vale', 13458, NULL, '787-851-0520', 'Carretera Estatal # 100, Km. 7.3, Cabo Rojo, PR 00623', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Cabo Rojo 2'),
(127, 'Audie Alvarez', 13460, NULL, '787-821-4505', 'Carretera Estatal #116, Esquina Carretera # 333, Guánica, PR 00653', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Guánica'),
(128, 'Rosvelyn Félix', 13482, NULL, '787-801-1251', 'Carretera Estatal # 3 Km. 7.3, Monte Plaza, Fajardo, PR 00738', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Fajardo, Montesol'),
(129, 'Lourdes Ortíz', 13527, NULL, '787-715-1250', 'Carretera Estatal # 181, Esquina Carretera Estatal # 183, San Lorenzo, PR 00754', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'San Lorenzo'),
(130, 'Audie Alvarez', 13547, NULL, '787-873-0190', 'Sabana Grande Plaza, Carretera Estatal # 121 Km.216, Sabana Grande, PR 00637', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Sabana Grande'),
(131, 'Joel Jácome', 13638, NULL, '787-284-1245', 'Ponce 2000 Mall, Expreso # 2 Avenida Baramaya, Ponce, PR 00731', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Ponce 2000'),
(132, 'Audie Alvarez', 13646, NULL, '787-835-6620', 'Carretera Estatal # 127, KM 9.2, Barrio Jaguas, Guayanilla, PR 00656', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Guayanilla '),
(133, 'Lizamaira Rodríguez', 13763, NULL, '787-846-0650', 'Expreso # 2 KM. 57.3, Solar A, Forida Afuera,  Barceloneta, PR 00617', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Barceloneta'),
(134, 'Luis Soto', 13789, NULL, '787-784-4943', 'Embarcadero Food Court, Bayamón, PR 00956', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Río Hondo 2 '),
(135, 'Evelyn Vázquez', 13926, NULL, '787-285-7714', 'Plaza SAM\'S, Carretera Estatal # 3 KM 82.0, Humacao, PR 00791', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Humacao Sam\'s'),
(136, 'William González', 13935, NULL, '787-868-1272', 'Carretera Estatal # 115 Km. 22.0, Aguada, PR 00602', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Aguada 2'),
(137, 'Vacante', 14094, NULL, '787-869-8410', 'Mercado Plaza, Carretera Estatal # 152, Km. 16.0, Naranjito, PR 000791', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Naranjito'),
(138, 'Vacante', 14099, NULL, '787-991-2435', 'Carretera Estatal # 14 Km. 52.7, Aibonito, PR 00705', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Aibonito'),
(139, 'Vacante', 14118, NULL, '787-870-3322', 'Carretera Estatal # 159 Km. 20.2, Toa Alta, PR 00953', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Toa Alta'),
(140, 'Rosvelyn Félix', 14170, NULL, '787-256-5720', 'Edificio #4 Espacio #90, Carretera Estatal #188, Canóvanas, PR 00729', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Canóvanas, Outlets'),
(141, 'Vacante', 14684, NULL, '787-799-5046', 'Centro Comercial Pájaros, Shopping Village, Carretera Estatal #861 Int. Carretera #862, Bo. Pájaros, Toa Alta, PR 00956', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Bayamón, Barrio Pájaros'),
(142, 'Vacante', 14695, NULL, '787-875-3005', 'Carretera Estatal # 774 Km. 0.9, Comerío, PR 00782', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Comerío'),
(143, 'José Rivera', 14696, NULL, '787-871-5511', 'Carretera Estatal #149 , Intersección con Carretera #145, Barrio Jaguas, Ciales, PR 00638', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Ciales'),
(144, 'José Rivera', 14908, NULL, '787-854-5340', 'Plaza Monte Real Shopping Center, Carretera Estatal #2 Km. 45.6, Manatí, PR 00674', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Manatí Wal-Mart'),
(145, 'William López', 14963, NULL, '787-840-4382', 'Centro Comercial Coto Laurel, Carretera Estatal # 14 Km. 14.9, Ponce, PR 00780', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Ponce, Coto Laurel'),
(146, 'William López', 15216, NULL, '787-828-1878', 'Carretera Estatal # 144, Intersección Carretera Ramal #141, Jayuya, PR 00664 ', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Jayuya'),
(147, 'Lourdes Ortíz', 15217, NULL, '787-733-7905', 'Carretera # 30 Intersección Carretera #198, Las Piedras, PR 00771 ', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Las Piedras II'),
(148, 'José Vargas', 15473, NULL, '787-262-5292', 'Carretera Estatal PR #2 Km. 92.9, Bo. Membrillo, Camuy, PR 00627', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Camuy'),
(149, 'Xiomara Labrador', 15486, NULL, '787-799-4644', 'Carretera  #830 Km. 0.5 Cerro Gordo, Bayamón, PR 00957 ', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Bayamón Inter.'),
(150, 'Lourdes Ortíz', 15487, NULL, '787-737-2620', 'Carretera #181 Intersección Carr. #30, Gurabo, PR 00778', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Gurabo'),
(151, 'Milka Pérez', 15728, NULL, '939-205-0075', 'Borinquén, Barrio Turabo, Carr. Estatal # 52 Intersección con Carr. Estatal # 1, Caguas, PR 00725', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Caguas Sur'),
(152, 'Jessica Bermúdez', 16290, NULL, '787-694-2011', 'Carretera 174 Km. 22.4, Barrio Sonadora, Aguas Buenas, PR 00703', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Aguas Buenas'),
(153, 'José Rivera', 16361, NULL, '787-921-2500', 'Carr. 670 Intersección con Carr. 6668 Km. 1.0, Bo. Cotto Norte, Manatí, PR 00674', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Manatí, Econo'),
(154, 'Audie Alvarez', 16394, NULL, '787-986-5006', 'Carretera 116 Km. 2.3, Barrio Sabana Yeguas, Lajas, PR 00967', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Lajas'),
(155, 'Audie Alvarez', 16395, NULL, '787-987-2105', 'Carretera PR 385 Km. 0.6, Barrio Cuevas, Peñuelas, PR 00624', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Peñuelas'),
(156, 'Angel Delgado', 16958, NULL, '787-965-2010', 'Calle Casimar, Esq. PR-160, Salida 35, PR-22, Vega Baja, PR 00693', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Vega Baja Almirante (Blondet)'),
(157, 'Lizamaira Rodríguez', 16959, NULL, '787-280-2070', 'Carretera PR-129, Km. 8.4, Bo. Campo Alegre, Hatillo, PR 00659', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Hatillo Jové'),
(158, 'William González', 17102, NULL, '787-891-2424', 'Carretera #2, Km. 129.6, Barrio Victoria, Aguadilla, PR 00602', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Aguadilla Hattón'),
(159, 'Julio Vale', 17393, NULL, '787-265-7880', 'Calle Ramón Emeterio Betances #392 Sur, Mayaguez, PR 00680', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Mayagüez Post'),
(160, 'Rosvelyn Félix', 17679, NULL, '787-500-2985', 'Carretera PR 3 Km. 17.8, Plaza Canóvanas, Canóvanas PR 00729', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Canóvanas 20/20'),
(161, 'Damaris Flores', 17702, NULL, '787-680-2986', 'Carretera 1, Km. 89.5 Bo. Aguirre Salinas, PR  00751', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Salinas 20/20'),
(162, 'Lizamaira Rodríguez', 17705, NULL, '787-965-2986', 'Barceloneta Shopping Court, Carretera 140, Int. 2, Bo. Manatí Barcelonteta, PR  00617', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Barceloneta 20/20'),
(163, 'Angel Delgado', 17939, NULL, '787-965-2987', 'Carretera #2,  Km. 28.3, Bo. Espinosa Vega Alta, PR  00692', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Vega Alta Gel'),
(164, 'Milka Pérez', 18057, NULL, '787-961-7075', '172 Km. 0.5, Urbanización Villa del Rey, Caguas, PR  00725', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Caguas 172'),
(165, 'Damaris Flores', 18247, NULL, '787-271-7021', 'Carretera Estatal #3, Km. 130.2 Arroyo Town Center Lote E, Arroyo, PR  00714', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Arroyo'),
(166, 'Xiomara Labrador', 18571, NULL, '939-225-2040', 'PR-199 Int. PR 840, Royal Town, Bayamón, PR  ', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Royal Town Total'),
(167, 'Wilfredo Torres', 18572, NULL, '939-205-5618', 'Carretera PR-199 Ave.Las Cumbres Solar A Barrio Frailes Guaynabo, PR 00965', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Las Cumbres'),
(168, 'Lizamaira Rodríguez', 18863, NULL, '787-680-2901', 'Bo. Santana Carr. #2, Arecibo, PR  00612', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Arecibo Santana'),
(169, 'Joel Jácome', 18864, NULL, '787-709-4772', 'PR-132 Intersección PR-123 Bo. Cañas Urbano Ponce, PR 00731', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Ponce Villa'),
(170, 'Angel Delgado', 18866, NULL, '939-202-2840', 'Carretera Estatal #2, Km 22.4, Media Luna Ward, Toa Baja, PR  00949', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'La Virgencita'),
(171, 'Santiago Huezo', 19168, NULL, '939-205-5940', 'Centro Comercial San Patricio Plaza Ave. San Patricio Esq.Roosevelt Río Piedras, PR 00936', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'San Patricio F/C'),
(172, 'Luis Soto', 20702, NULL, '787-626-4401', 'Carretera Estatal PR#5 Esquina Calle 11 Cataño, PR 00962', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Cataño'),
(173, 'Angel Delgado', 21907, NULL, '787-665-7889', 'Salida 24, Exp. #22 en B.O. Maguayo, Dorado, PR. 00646', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Dorado 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_supervisor` int(11) NOT NULL,
  `productos` text COLLATE utf32_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estatus` int(11) NOT NULL DEFAULT '0' COMMENT '0 = activa, 1 = anulada',
  `descripcion` text COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_cliente`
--

CREATE TABLE `grupo_cliente` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf32_spanish_ci NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '0' COMMENT '1 = activo , 0 = inactivo',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modif` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `grupo_cliente`
--

INSERT INTO `grupo_cliente` (`id`, `nombre`, `estatus`, `fecha_creacion`, `fecha_modif`) VALUES
(1, 'Burger King', 0, '2019-07-10 02:37:29', '2019-07-10 03:25:52'),
(3, 'KFC', 0, '2019-08-01 16:35:23', '2019-08-01 16:35:23'),
(4, 'Taco Bell', 0, '2019-08-01 16:35:40', '2019-08-01 16:35:40'),
(5, 'Pizza Hut', 0, '2019-08-01 16:35:56', '2019-08-01 16:35:56'),
(6, 'Farmaceuticas', 0, '2019-08-01 16:36:41', '2019-08-01 16:36:41'),
(7, 'Hospitales', 0, '2019-08-01 16:36:55', '2019-08-01 16:36:55'),
(8, 'Hoteles', 0, '2019-08-01 16:37:05', '2019-08-01 16:37:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id` int(11) NOT NULL,
  `id_usuario` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'es el usuario que esta creando la incidencia',
  `id_cliente` int(11) NOT NULL,
  `id_tecnico` int(11) NOT NULL,
  `tipo_servicio` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_visita` date NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `asunto` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `prioridad` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'BAJA, NORMAL O ALTA, dependiendo de la circuntancia',
  `estatus` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'estatus general, PENDIENTE, ASIGNADO O TERMINADO',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modif` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_resuelto` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hora_inicio` time NOT NULL COMMENT 'cuando el tecnico le de al boton iniciar trabajo se actualiza este campo ',
  `hora_fin` time NOT NULL,
  `estatus_incidencia` int(11) NOT NULL DEFAULT '0' COMMENT '0=Iniciar, 1=Proceso, 2=Terminado',
  `id_grupo` int(11) NOT NULL DEFAULT '0' COMMENT 'es el id del grupo familiar a quien pertenece la incidencia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id`, `id_usuario`, `id_cliente`, `id_tecnico`, `tipo_servicio`, `fecha_visita`, `direccion`, `asunto`, `descripcion`, `prioridad`, `estatus`, `fecha_creacion`, `fecha_modif`, `fecha_resuelto`, `hora_inicio`, `hora_fin`, `estatus_incidencia`, `id_grupo`) VALUES
(1, '1', 9, 327, 'recogido-de-liquido', '2019-08-24', 'Calle Luna # 54 (Pueblo), Condominio Apolo, Mayagüez, PR 00968', 'Prueba Erick', 'Probando', 'alta', 'cerrado', '2019-08-23 23:40:21', '2019-12-20 04:43:02', '2019-12-20 04:43:02', '17:29:21', '22:43:02', 2, 0),
(2, '1', 10, 327, 'plomeria', '2019-08-30', 'Calle Marginal KM 7, Carretera Estatal # 1, Barrio Machuelo Bajo, Urb. Valle Verde, Ponce, PR 00731', 'Prueba Plomeria', 'Plomeria', 'baja', 'asignado', '2019-08-27 13:31:11', '2019-12-19 03:02:17', '0000-00-00 00:00:00', '21:02:17', '00:00:00', 1, 0),
(4, '1', 3, 327, 'recogido-de-liquido', '2019-08-28', 'Ave. Roberto H. Todd, Santurce, PR 00925', 'Prueba Recogido de Liquido', 'Liquido', 'normal', 'cerrado', '2019-08-27 13:31:51', '2020-01-29 16:50:31', '2020-01-29 16:50:31', '20:14:55', '10:50:31', 2, 0),
(5, '1', 12, 61, 'limpieza-de-campana', '2019-08-29', '', 'Prueba Limpieza de Campana', 'Limpieza de Campanas', 'alta', 'asignado', '2019-08-27 13:33:07', '2019-12-18 22:53:21', '2019-08-27 14:17:35', '00:00:00', '00:00:00', 0, 0),
(6, '1', 1, 327, 'limpieza-de-campana', '2019-08-30', '', 'Prueba Limpieza 2', 'Prueba', 'normal', 'cerrado', '2019-08-27 14:16:16', '2020-01-29 16:53:23', '2020-01-29 16:53:23', '20:16:40', '10:53:23', 2, 0),
(7, '1', 14, 327, 'plomeria', '2019-08-31', 'Carretera Estatal # 2 Km. 14.7 Hato Tejas, Bayamón, PR 00961', 'Mantenimiento de campanas', 'mantenimiento a las campanas, tomar en consideracion el material a utilizar', 'normal', 'cerrado', '2019-08-27 14:31:49', '2020-02-04 23:30:50', '2020-02-04 23:30:50', '20:17:07', '17:30:50', 2, 0),
(8, '1', 3, 327, 'recogido-de-liquido', '2019-09-27', 'Ave. Roberto H. Todd, Santurce, PR 00925', 'Mantenimiento de grasa', 'mantenimiento&nbsp;', 'alta', 'cerrado', '2019-09-20 16:16:31', '2020-01-29 17:05:40', '2020-01-29 17:05:40', '10:56:30', '11:05:40', 2, 1),
(9, '1', 123, 327, 'limpieza-de-campana', '2019-09-30', 'Plaza Centro 3 Shopping FC, Ave Muñoz Marín, Carr. Estatal #30 Esquina Rafael Cordero,  Caguas, PR 00725 ', 'Recoger la basura del tanque 3.66', 'test2', 'alta', 'cerrado', '2019-09-20 18:06:53', '2019-12-20 04:02:00', '2019-12-20 04:02:00', '22:01:33', '22:02:00', 2, 1),
(10, '1', 14, 327, 'recogido-de-liquido', '2019-09-24', 'Carretera Estatal # 2 Km. 14.7 Hato Tejas, Bayamón, PR 00961', 'correa de tiempo', 'test 3', 'normal', 'cerrado', '2019-09-20 18:09:11', '2020-01-29 17:08:56', '2020-01-29 17:08:56', '21:45:38', '11:08:56', 2, 1),
(11, '1', 15, 327, 'recogido-de-liquido', '2020-09-30', 'Calle Rodríguez Serrá, Esquina Ave. Ashford, Condado, PR 00901', 'prueba 4', 'prueba 5', 'normal', 'cerrado', '2019-09-20 18:18:14', '2020-01-29 17:12:47', '2020-01-29 17:12:47', '10:13:25', '11:12:47', 2, 1),
(12, '1', 113, 327, 'plomeria', '2019-10-02', 'Plaza Carolina Mall (primer nivel) Ave. Fragoso, Villa Fontana, Carolina, PR 00729', 'tuberia de la cocina', 'llevar material&nbsp;', 'baja', 'asignado', '2019-09-20 18:19:18', '2020-01-29 16:25:56', '0000-00-00 00:00:00', '10:25:56', '00:00:00', 1, 1),
(13, '1', 13, 327, 'limpieza-de-campana', '2019-09-25', 'Calle México, Esquina Carretera # 833 Parkville, Guaynabo, PR 00955', 'Limpieza de grasa y cocina', 'Limpiar', 'normal', 'cerrado', '2019-09-20 18:24:12', '2020-01-29 17:45:05', '2020-01-29 17:45:05', '10:31:59', '11:45:05', 2, 1),
(14, '1', 71, 327, 'plomeria', '2019-09-23', 'Ctro. Comercial Plaza Noroeste, Carr.  Estatal # 3 Km. 20.5 Villas de Loíza, Loíza, PR 00795', 'Cambiar tubos de una pulgada', 'Cambiar tubos&nbsp;', 'normal', 'asignado', '2019-09-20 18:25:37', '2020-01-29 16:58:33', '2019-11-26 14:55:24', '10:58:33', '00:00:00', 1, 1),
(15, '1', 15, 327, 'recogido-de-liquido', '2019-09-25', 'Calle Rodríguez Serrá, Esquina Ave. Ashford, Condado, PR 00901', 'cambio de bateria fria', 'Prueba 22', 'alta', 'cerrado', '2019-09-20 18:46:16', '2020-01-29 18:26:03', '2020-01-29 18:26:03', '11:58:03', '12:26:03', 2, 1),
(16, '1', 19, 328, 'limpieza-de-campana', '2019-10-01', 'El Señorial Shopping Center, Esquina Paraná, Cupey, San Juan, PR 00925', 'limpieza con quita grasa para la cocina ', 'Pendiente por ejecutar la limpieza completa', 'alta', 'asignado', '2019-09-30 15:36:26', '2019-12-18 22:53:42', '2019-09-30 20:20:11', '00:00:00', '00:00:00', 0, 1),
(17, '1', 10, 328, 'plomeria', '2019-10-09', 'Calle Marginal KM 7, Carretera Estatal # 1, Barrio Machuelo Bajo, Urb. Valle Verde, Ponce, PR 00731', 'Cambiar codos de 45', 'Cambiar toda la tubería de codos de 45', 'normal', 'asignado', '2019-09-30 15:37:36', '2019-12-18 22:53:47', '0000-00-00 00:00:00', '00:00:00', '00:00:00', 0, 1),
(18, '1', 7, 327, 'recogido-de-liquido', '2019-11-28', '', 'Prueba ', 'Probando', 'normal', 'asignado', '2019-11-28 01:39:01', '2020-01-31 02:29:28', '2020-01-30 18:11:18', '20:29:28', '12:11:18', 1, 1),
(19, '1', 1, 327, 'limpieza-de-campana', '2019-12-19', 'Ave. 65 Infantería, Km. 7 Hm. 3, Río Piedras, PR 00924', 'mantenimiento campana', 'Esto es una prueba <br>', 'alta', 'cerrado', '2019-12-18 23:03:29', '2020-02-01 02:20:54', '2020-02-01 02:20:54', '20:16:22', '20:20:54', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias_fotos`
--

CREATE TABLE `incidencias_fotos` (
  `id` int(11) NOT NULL,
  `id_incidencia` int(11) NOT NULL,
  `img_url` text COLLATE utf32_spanish_ci,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nombre` text COLLATE utf32_spanish_ci,
  `tipo` text COLLATE utf32_spanish_ci,
  `tamano` text COLLATE utf32_spanish_ci,
  `extension` text COLLATE utf32_spanish_ci,
  `titulo` text COLLATE utf32_spanish_ci,
  `momento` text COLLATE utf32_spanish_ci COMMENT 'se debe realizar la carga de fotos antes de comenzar y despues de terminar el trabajo se carga otras fotos'
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `incidencias_fotos`
--

INSERT INTO `incidencias_fotos` (`id`, `id_incidencia`, `img_url`, `fecha_creacion`, `nombre`, `tipo`, `tamano`, `extension`, `titulo`, `momento`) VALUES
(1, 7, 'vistas/img/archivos/1_20190827093607_EXqK18dry7JVzgD_mve2.jpg', '2019-08-27 14:36:07', '1_20190827093607_EXqK18dry7JVzgD_mve2.jpg', 'image/jpeg', '24298', 'jpg', '1_20190827093607_EXqK18dry7JVzgD_mve2', 'archivo'),
(2, 8, 'vistas/img/archivos/1_20190920111849_giy6zaUp5AGQdVcZNj8S.jpg', '2019-09-20 16:18:49', '1_20190920111849_giy6zaUp5AGQdVcZNj8S.jpg', 'image/jpeg', '99654', 'jpg', '1_20190920111849_giy6zaUp5AGQdVcZNj8S', 'archivo'),
(3, 16, 'vistas/img/incidencias/328_16_Gpcrfm_X5HgSWvJRMaCo.jpg', '2019-09-30 19:32:19', '328_16_Gpcrfm_X5HgSWvJRMaCo.jpg', 'image/jpeg', '173194', 'jpg', '328_16_Gpcrfm_X5HgSWvJRMaCo', 'antes'),
(4, 16, 'vistas/img/incidencias/328_16_mUKGhqAPO_7NR6B4ldIQ.jpg', '2019-09-30 19:32:19', '328_16_mUKGhqAPO_7NR6B4ldIQ.jpg', 'image/jpeg', '16049', 'jpg', '328_16_mUKGhqAPO_7NR6B4ldIQ', 'antes'),
(5, 16, 'vistas/img/incidencias/328_16_MmnUJYFaDwOzsoiEtqxX.jpg', '2019-09-30 19:32:20', '328_16_MmnUJYFaDwOzsoiEtqxX.jpg', 'image/jpeg', '173194', 'jpg', '328_16_MmnUJYFaDwOzsoiEtqxX', 'despues'),
(6, 1, 'vistas/img/archivos/1_20190930150928_GD_dAmFrtQwKuPBN04Rg.jpg', '2019-09-30 20:09:28', '1_20190930150928_GD_dAmFrtQwKuPBN04Rg.jpg', 'image/jpeg', '4361', 'jpg', '1_20190930150928_GD_dAmFrtQwKuPBN04Rg', 'archivo'),
(7, 1, 'vistas/img/archivos/1_20190930150928_2cDGFP9zvqmfV_3eKung.jpg', '2019-09-30 20:09:28', '1_20190930150928_2cDGFP9zvqmfV_3eKung.jpg', 'image/jpeg', '11375', 'jpg', '1_20190930150928_2cDGFP9zvqmfV_3eKung', 'archivo'),
(41, 8, 'vistas/img/incidencias/327_8_SmV3Bb6zfvpCnlw9UhEa.jpg', '2019-12-18 21:38:13', '327_8_SmV3Bb6zfvpCnlw9UhEa.jpg', 'image/jpg', '20264', 'jpg', '327_8_SmV3Bb6zfvpCnlw9UhEa', 'antes'),
(42, 8, 'vistas/img/incidencias/327_8_MgcFBY8ACDtVNfqpo9Wb.jpg', '2019-12-18 21:43:41', '327_8_MgcFBY8ACDtVNfqpo9Wb.jpg', 'image/jpg', '16373', 'jpg', '327_8_MgcFBY8ACDtVNfqpo9Wb', 'despues'),
(45, 1, 'vistas/img/incidencias/327_1_ZqazRply5b3gKncBsVk_.jpg', '2019-12-18 23:29:21', '327_1_ZqazRply5b3gKncBsVk_.jpg', 'image/jpg', '145239', 'jpg', '327_1_ZqazRply5b3gKncBsVk_', 'antes'),
(46, 2, 'vistas/img/incidencias/327_2_FkwhD1v9HbplEyoIgdKC.jpg', '2019-12-19 03:02:17', '327_2_FkwhD1v9HbplEyoIgdKC.jpg', 'image/jpg', '20548', 'jpg', '327_2_FkwhD1v9HbplEyoIgdKC', 'antes'),
(47, 4, 'vistas/img/incidencias/327_4_sImVX4KzODqyvBGCiS15.jpg', '2019-12-20 02:14:55', '327_4_sImVX4KzODqyvBGCiS15.jpg', 'image/jpg', '145239', 'jpg', '327_4_sImVX4KzODqyvBGCiS15', 'antes'),
(48, 6, 'vistas/img/incidencias/327_6_PQDLb0lhZ3Fx5UoM2nyJ.jpg', '2019-12-20 02:16:40', '327_6_PQDLb0lhZ3Fx5UoM2nyJ.jpg', 'image/jpg', '16373', 'jpg', '327_6_PQDLb0lhZ3Fx5UoM2nyJ', 'antes'),
(49, 7, 'vistas/img/incidencias/327_7_etRS64NVnsyOQ8B3Fwfx.jpg', '2019-12-20 02:17:07', '327_7_etRS64NVnsyOQ8B3Fwfx.jpg', 'image/jpg', '14146', 'jpg', '327_7_etRS64NVnsyOQ8B3Fwfx', 'antes'),
(52, 10, 'vistas/img/incidencias/327_10_P7rOfZJCTGmVFgMe1nXA.jpg', '2019-12-20 03:45:38', '327_10_P7rOfZJCTGmVFgMe1nXA.jpg', 'image/jpg', '12803', 'jpg', '327_10_P7rOfZJCTGmVFgMe1nXA', 'antes'),
(53, 9, 'vistas/img/incidencias/327_9_dbXqpaT1Y82gLIntyzeA.jpg', '2019-12-20 04:01:33', '327_9_dbXqpaT1Y82gLIntyzeA.jpg', 'image/jpg', '15270', 'jpg', '327_9_dbXqpaT1Y82gLIntyzeA', 'antes'),
(54, 9, 'vistas/img/incidencias/327_9_NVuytRIvCHGg3Qj89Y5E.jpg', '2019-12-20 04:02:00', '327_9_NVuytRIvCHGg3Qj89Y5E.jpg', 'image/jpg', '18524', 'jpg', '327_9_NVuytRIvCHGg3Qj89Y5E', 'despues'),
(55, 10, 'vistas/img/incidencias/327_10_OcZJfBurjgT6wzIFLUtl.jpg', '2019-12-20 04:08:34', '327_10_OcZJfBurjgT6wzIFLUtl.jpg', 'image/jpg', '15601', 'jpg', '327_10_OcZJfBurjgT6wzIFLUtl', 'despues'),
(56, 1, 'vistas/img/incidencias/327_1_glJscbqntiT1vIBzC7Rx.jpg', '2019-12-20 04:14:36', '327_1_glJscbqntiT1vIBzC7Rx.jpg', 'image/jpg', '16373', 'jpg', '327_1_glJscbqntiT1vIBzC7Rx', 'despues'),
(57, 2, 'vistas/img/incidencias/327_2_X6Ulwgzhr5m3ORHTbDQj.jpg', '2019-12-20 04:57:40', '327_2_X6Ulwgzhr5m3ORHTbDQj.jpg', 'image/jpg', '112212', 'jpg', '327_2_X6Ulwgzhr5m3ORHTbDQj', 'despues'),
(58, 4, 'vistas/img/incidencias/327_4_GxDnb4YlEa6pk7VmrcfZ.jpg', '2019-12-20 05:01:48', '327_4_GxDnb4YlEa6pk7VmrcfZ.jpg', 'image/jpg', '10588', 'jpg', '327_4_GxDnb4YlEa6pk7VmrcfZ', 'despues'),
(59, 6, 'vistas/img/incidencias/327_6_IYe2MXKfnhp6xWH_CSm0.jpg', '2020-01-28 00:54:45', '327_6_IYe2MXKfnhp6xWH_CSm0.jpg', 'image/jpg', '200874', 'jpg', '327_6_IYe2MXKfnhp6xWH_CSm0', 'despues'),
(60, 11, 'vistas/img/incidencias/327_11_SqWh3lvUzP9m8JgfaYu6.jpg', '2020-01-29 16:13:25', '327_11_SqWh3lvUzP9m8JgfaYu6.jpg', 'image/jpg', '29535', 'jpg', '327_11_SqWh3lvUzP9m8JgfaYu6', 'antes'),
(61, 11, 'vistas/img/incidencias/327_11_uBG4glA89sW_TrzRandE.jpg', '2020-01-29 16:20:55', '327_11_uBG4glA89sW_TrzRandE.jpg', 'image/jpg', '79583', 'jpg', '327_11_uBG4glA89sW_TrzRandE', 'despues'),
(62, 12, 'vistas/img/incidencias/327_12_tmKMag1sEdwHBc9Dil38.jpg', '2020-01-29 16:25:56', '327_12_tmKMag1sEdwHBc9Dil38.jpg', 'image/jpg', '27006', 'jpg', '327_12_tmKMag1sEdwHBc9Dil38', 'antes'),
(63, 13, 'vistas/img/incidencias/327_13_NuFlODbmxjdhBr4396Eo.jpg', '2020-01-29 16:31:59', '327_13_NuFlODbmxjdhBr4396Eo.jpg', 'image/jpg', '33429', 'jpg', '327_13_NuFlODbmxjdhBr4396Eo', 'antes'),
(64, 13, 'vistas/img/incidencias/327_13_yuAw_TzK45CPWnOgNcB7.jpg', '2020-01-29 16:35:59', '327_13_yuAw_TzK45CPWnOgNcB7.jpg', 'image/jpg', '31495', 'jpg', '327_13_yuAw_TzK45CPWnOgNcB7', 'despues'),
(65, 14, 'vistas/img/incidencias/327_14_fOysxgzbAwtV1M5HTa_X.jpg', '2020-01-29 16:58:33', '327_14_fOysxgzbAwtV1M5HTa_X.jpg', 'image/jpg', '26703', 'jpg', '327_14_fOysxgzbAwtV1M5HTa_X', 'antes'),
(66, 12, 'vistas/img/incidencias/327_12_vqKk2fxV_pDFOwRXTimr.jpg', '2020-01-29 17:17:25', '327_12_vqKk2fxV_pDFOwRXTimr.jpg', 'image/jpg', '67350', 'jpg', '327_12_vqKk2fxV_pDFOwRXTimr', 'despues'),
(67, 15, 'vistas/img/incidencias/327_15_7qOYgcoAlPwjDpNy58KL.jpg', '2020-01-29 17:58:03', '327_15_7qOYgcoAlPwjDpNy58KL.jpg', 'image/jpg', '67350', 'jpg', '327_15_7qOYgcoAlPwjDpNy58KL', 'antes'),
(68, 15, 'vistas/img/incidencias/327_15_AN5Q_cdIX9foF1agsRCn.jpg', '2020-01-29 18:24:15', '327_15_AN5Q_cdIX9foF1agsRCn.jpg', 'image/jpg', '33429', 'jpg', '327_15_AN5Q_cdIX9foF1agsRCn', 'despues'),
(90, 18, 'vistas/img/incidencias/327_18_VQ9T5pBJ4Ud_jwFOocYv.jpg', '2020-01-31 02:29:28', '327_18_VQ9T5pBJ4Ud_jwFOocYv.jpg', 'image/jpg', '126171', 'jpg', '327_18_VQ9T5pBJ4Ud_jwFOocYv', 'antes'),
(91, 18, 'vistas/img/incidencias/327_18_fPbRok34V0XeThmK6t1D.jpg', '2020-01-31 02:29:28', '327_18_fPbRok34V0XeThmK6t1D.jpg', 'image/jpg', '516752', 'jpg', '327_18_fPbRok34V0XeThmK6t1D', 'antes'),
(92, 19, 'vistas/img/incidencias/327_19_aXwMHBYgN97dRne_AbFr.jpg', '2020-02-01 02:16:22', '327_19_aXwMHBYgN97dRne_AbFr.jpg', 'image/jpeg', '264838', 'jpg', '327_19_aXwMHBYgN97dRne_AbFr', 'antes'),
(93, 19, 'vistas/img/incidencias/327_19_NZhHXnrAR9Cit3Ml0Be1.png', '2020-02-01 02:16:49', '327_19_NZhHXnrAR9Cit3Ml0Be1.png', 'image/png', '370317', 'png', '327_19_NZhHXnrAR9Cit3Ml0Be1', 'despues');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_inventario`
--

CREATE TABLE `movimiento_inventario` (
  `id` int(11) NOT NULL,
  `id_incidencia` int(11) NOT NULL DEFAULT '0' COMMENT 'solo aplica cuando es una salida del inventario , del resto debe ser cero ',
  `id_compra` int(11) NOT NULL DEFAULT '0',
  `id_producto` text COLLATE utf32_spanish_ci NOT NULL,
  `tipo` text COLLATE utf32_spanish_ci NOT NULL COMMENT 'si es entrada o salida',
  `cantidad` int(11) NOT NULL,
  `id_almacen` text COLLATE utf32_spanish_ci NOT NULL COMMENT 'almacenes, pero la principal ppal',
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modif` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `tipo` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'si es servicio o venta',
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `ventas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `tipo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `fecha`) VALUES
(1, 1, '101', 'venta', 'Aspiradora Industrial ', 'vistas/img/productos/101/105.png', 13, 1000, 1200, 2, '2019-04-12 17:37:51'),
(2, 1, '102', 'venta', 'Plato Flotante para Allanadora', 'vistas/img/productos/102/940.jpg', 6, 4500, 6300, 3, '2019-04-12 17:37:51'),
(3, 1, '103', 'venta', 'Compresor de Aire para pintura', 'vistas/img/productos/103/763.jpg', 8, 3000, 4200, 12, '2019-04-12 17:37:51'),
(4, 1, '104', 'venta', 'Cortadora de Adobe sin Disco ', 'vistas/img/productos/104/957.jpg', 16, 4000, 5600, 4, '2019-04-12 17:37:51'),
(5, 1, '105', 'venta', 'Cortadora de Piso sin Disco ', 'vistas/img/productos/105/630.jpg', 13, 1540, 2156, 7, '2019-04-12 17:37:51'),
(6, 1, '106', 'venta', 'Disco Punta Diamante ', 'vistas/img/productos/106/635.jpg', 15, 1100, 1540, 5, '2019-04-12 17:37:51'),
(7, 1, '107', 'venta', 'Extractor de Aire ', 'vistas/img/productos/107/848.jpg', 12, 1540, 2156, 8, '2019-04-12 17:37:51'),
(8, 1, '108', 'venta', 'Guadañadora ', 'vistas/img/productos/108/163.jpg', 13, 1540, 2156, 7, '2019-04-12 17:37:51'),
(9, 1, '109', 'venta', 'Hidrolavadora Eléctrica ', 'vistas/img/productos/109/769.jpg', 15, 2600, 3640, 5, '2019-04-12 17:37:51'),
(10, 1, '110', 'venta', 'Hidrolavadora Gasolina', 'vistas/img/productos/110/582.jpg', 18, 2210, 3094, 2, '2019-04-12 17:37:51'),
(11, 1, '111', 'venta', 'Motobomba a Gasolina', 'vistas/img/productos/default/anonymous.png', 20, 2860, 4004, 0, '2019-04-12 17:37:51'),
(12, 1, '112', 'venta', 'Motobomba El?ctrica', 'vistas/img/productos/default/anonymous.png', 20, 2400, 3360, 0, '2019-04-12 17:37:51'),
(13, 1, '113', 'venta', 'Sierra Circular ', 'vistas/img/productos/default/anonymous.png', 20, 1100, 1540, 0, '2019-04-12 17:37:51'),
(14, 1, '114', 'venta', 'Disco de tugsteno para Sierra circular', 'vistas/img/productos/default/anonymous.png', 20, 4500, 6300, 0, '2019-04-12 17:37:51'),
(15, 1, '115', 'venta', 'Soldador Electrico ', 'vistas/img/productos/default/anonymous.png', 20, 1980, 2772, 0, '2019-04-12 17:37:51'),
(16, 1, '116', 'venta', 'Careta para Soldador', 'vistas/img/productos/default/anonymous.png', 20, 4200, 5880, 0, '2019-04-12 17:37:51'),
(17, 1, '117', 'venta', 'Torre de iluminacion ', 'vistas/img/productos/default/anonymous.png', 20, 1800, 2520, 0, '2019-04-12 17:37:51'),
(18, 2, '201', 'venta', 'Martillo Demoledor de Piso 110V', 'vistas/img/productos/default/anonymous.png', 20, 5600, 7840, 0, '2019-04-12 17:37:51'),
(19, 2, '202', 'venta', 'Muela o cincel martillo demoledor piso', 'vistas/img/productos/default/anonymous.png', 20, 9600, 13440, 0, '2019-04-12 17:37:51'),
(20, 2, '203', 'venta', 'Taladro Demoledor de muro 110V', 'vistas/img/productos/default/anonymous.png', 17, 3850, 5390, 3, '2019-04-12 17:37:51'),
(21, 2, '204', 'venta', 'Muela o cincel martillo demoledor muro', 'vistas/img/productos/default/anonymous.png', 20, 9600, 13440, 0, '2019-04-12 17:37:51'),
(22, 2, '205', 'venta', 'Taladro Percutor de 1/2 Madera y Metal', 'vistas/img/productos/default/anonymous.png', 20, 8000, 11200, 0, '2019-04-12 17:37:51'),
(23, 2, '206', 'venta', 'Taladro Percutor SDS Plus 110V', 'vistas/img/productos/default/anonymous.png', 20, 3900, 5460, 0, '2019-04-12 17:37:51'),
(24, 2, '207', 'venta', 'Taladro Percutor SDS Max 110V (Mineria)', 'vistas/img/productos/default/anonymous.png', 20, 4600, 6440, 0, '2019-04-12 17:37:51'),
(25, 3, '301', 'venta', 'Andamio colgante', 'vistas/img/productos/default/anonymous.png', 20, 1440, 2016, 0, '2019-04-12 17:37:51'),
(26, 3, '302', 'venta', 'Distanciador andamio colgante', 'vistas/img/productos/default/anonymous.png', 20, 1600, 2240, 0, '2019-04-12 17:37:51'),
(27, 3, '303', 'venta', 'Marco andamio modular ', 'vistas/img/productos/default/anonymous.png', 20, 900, 1260, 0, '2019-04-12 17:37:51'),
(28, 3, '304', 'venta', 'Marco andamio tijera', 'vistas/img/productos/default/anonymous.png', 20, 100, 140, 0, '2019-04-12 17:37:51'),
(29, 3, '305', 'venta', 'Tijera para andamio', 'vistas/img/productos/default/anonymous.png', 20, 162, 226, 0, '2019-04-12 17:37:51'),
(30, 3, '306', 'venta', 'Escalera interna para andamio', 'vistas/img/productos/default/anonymous.png', 20, 270, 378, 0, '2019-04-12 17:37:51'),
(31, 3, '307', 'venta', 'Pasamanos de seguridad', 'vistas/img/productos/default/anonymous.png', 20, 75, 105, 0, '2019-04-12 17:37:51'),
(32, 3, '308', 'venta', 'Rueda giratoria para andamio', 'vistas/img/productos/default/anonymous.png', 20, 168, 235, 0, '2019-04-12 17:37:51'),
(33, 3, '309', 'venta', 'Arnes de seguridad', 'vistas/img/productos/default/anonymous.png', 20, 1750, 2450, 0, '2019-04-12 17:37:51'),
(34, 3, '310', 'venta', 'Eslinga para arnes', 'vistas/img/productos/default/anonymous.png', 20, 175, 245, 0, '2019-04-12 17:37:51'),
(35, 3, '311', 'venta', 'Plataforma Met?lica', 'vistas/img/productos/default/anonymous.png', 20, 420, 588, 0, '2019-04-12 17:37:51'),
(36, 4, '401', 'venta', 'Planta Electrica Diesel 6 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3500, 4900, 0, '2019-04-12 17:37:51'),
(37, 4, '402', 'venta', 'Planta Electrica Diesel 10 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3550, 4970, 0, '2019-04-12 17:37:51'),
(38, 4, '403', 'venta', 'Planta Electrica Diesel 20 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3600, 5040, 0, '2019-04-12 17:37:51'),
(39, 4, '404', 'venta', 'Planta Electrica Diesel 30 Kva', 'vistas/img/productos/default/anonymous.png', 19, 3650, 5110, 1, '2019-04-12 17:37:51'),
(40, 4, '405', 'venta', 'Planta Electrica Diesel 60 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3700, 5180, 0, '2019-04-12 17:37:51'),
(41, 4, '406', 'venta', 'Planta Electrica Diesel 75 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3750, 5250, 0, '2019-04-12 17:37:51'),
(42, 4, '407', 'venta', 'Planta Electrica Diesel 100 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3800, 5320, 0, '2019-04-12 17:37:51'),
(43, 4, '408', 'venta', 'Planta Electrica Diesel 120 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3850, 5390, 0, '2019-04-12 17:37:51'),
(44, 5, '501', 'venta', 'Escalera de Tijera Aluminio ', 'vistas/img/productos/default/anonymous.png', 20, 350, 490, 0, '2019-04-12 17:37:51'),
(45, 5, '502', 'venta', 'Extension Electrica ', 'vistas/img/productos/default/anonymous.png', 20, 370, 518, 0, '2019-04-12 17:37:51'),
(46, 5, '503', 'venta', 'Gato tensor', 'vistas/img/productos/default/anonymous.png', 20, 380, 532, 0, '2019-04-12 17:37:51'),
(47, 5, '504', 'venta', 'Lamina Cubre Brecha ', 'vistas/img/productos/default/anonymous.png', 20, 380, 532, 0, '2019-04-12 17:37:51'),
(48, 5, '505', 'venta', 'Llave de Tubo', 'vistas/img/productos/default/anonymous.png', 20, 480, 672, 0, '2019-04-12 17:37:51'),
(49, 5, '506', 'venta', 'Manila por Metro', 'vistas/img/productos/default/anonymous.png', 20, 600, 840, 0, '2019-04-12 17:37:51'),
(50, 5, '507', 'venta', 'Polea 2 canales', 'vistas/img/productos/default/anonymous.png', 20, 900, 1260, 0, '2019-04-12 17:37:51'),
(51, 5, '508', 'venta', 'Tensor', 'vistas/img/productos/508/500.jpg', 18, 100, 140, 2, '2019-06-10 20:17:15'),
(52, 5, '509', 'venta', 'Bascula ', 'vistas/img/productos/509/878.jpg', 12, 130, 182, 8, '2019-04-12 17:37:51'),
(53, 5, '510', 'venta', 'Bomba Hidrostatica', 'vistas/img/productos/510/870.jpg', 8, 770, 1078, 12, '2019-04-12 17:37:51'),
(54, 5, '511', 'venta', 'Chapeta', 'vistas/img/productos/511/239.jpg', 15, 660, 924, 5, '2019-06-10 20:09:34'),
(55, 5, '512', 'venta', 'Cilindro muestra de concreto', 'vistas/img/productos/512/266.jpg', 16, 400, 560, 4, '2019-04-12 17:37:51'),
(56, 5, '513', 'venta', 'Cizalla de Palanca', 'vistas/img/productos/513/445.jpg', 10, 450, 630, 17, '2019-04-12 17:37:51'),
(57, 5, '514', 'venta', 'Cizalla de Tijera', 'vistas/img/productos/514/249.jpg', 20, 580, 812, 13, '2019-04-12 17:37:51'),
(58, 5, '515', 'venta', 'Coche llanta neumatica', 'vistas/img/productos/515/174.jpg', 17, 420, 588, 3, '2019-04-12 17:37:51'),
(59, 5, '516', 'venta', 'Cono slump', 'vistas/img/productos/516/228.jpg', 20, 140, 196, 4, '2019-06-19 17:42:10'),
(60, 2, '517', 'servicio', 'Cortadora de Baldosin', 'vistas/img/productos/517/746.jpg', 6, 930, 1302, 6, '2019-06-19 17:42:10'),
(61, 7, '701', 'venta', 'celular blu', 'vistas/img/productos/701/730.jpg', 1482, 0, 0, 2, '2019-06-19 14:36:09'),
(62, 7, '702', 'venta', 'Instalacion de software', 'vistas/img/productos/702/831.jpg', 20, 0, 0, 0, '2019-06-19 17:42:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf32_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `email` text COLLATE utf32_spanish_ci NOT NULL,
  `telefono` text COLLATE utf32_spanish_ci NOT NULL,
  `direccion` text COLLATE utf32_spanish_ci NOT NULL,
  `ordenes` int(11) NOT NULL COMMENT 'numero de ordenes generada',
  `ultima_orden` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_general`
--

CREATE TABLE `servicio_general` (
  `id` int(11) NOT NULL,
  `id_incidencia` int(11) NOT NULL,
  `vaciado` text COLLATE utf32_spanish_ci NOT NULL,
  `vaciado_parcial` text COLLATE utf32_spanish_ci NOT NULL,
  `otros` text COLLATE utf32_spanish_ci NOT NULL,
  `limpeza_regular` text COLLATE utf32_spanish_ci NOT NULL,
  `inspeccion` text COLLATE utf32_spanish_ci NOT NULL,
  `interceptor_aceite` text COLLATE utf32_spanish_ci NOT NULL,
  `tanque_almacenamiento` text COLLATE utf32_spanish_ci NOT NULL,
  `pozo_septico` text COLLATE utf32_spanish_ci NOT NULL,
  `estacion_bombas` text COLLATE utf32_spanish_ci NOT NULL,
  `tanque_recibidor` text COLLATE utf32_spanish_ci NOT NULL,
  `tanque_aceites` text COLLATE utf32_spanish_ci NOT NULL,
  `otros1` text COLLATE utf32_spanish_ci NOT NULL,
  `interior` text COLLATE utf32_spanish_ci NOT NULL,
  `exterior` text COLLATE utf32_spanish_ci NOT NULL,
  `interior_exterior` text COLLATE utf32_spanish_ci NOT NULL,
  `limpieza_derrame_liquido` text COLLATE utf32_spanish_ci NOT NULL,
  `limpieza_manhole` text COLLATE utf32_spanish_ci NOT NULL,
  `limpieza_lift_station` text COLLATE utf32_spanish_ci NOT NULL,
  `limpieza_tuberias` text COLLATE utf32_spanish_ci NOT NULL,
  `limpieza_tuberias_num` text COLLATE utf32_spanish_ci NOT NULL,
  `limpieza_registros_desagues` text COLLATE utf32_spanish_ci NOT NULL,
  `limpieza_registros_num` text COLLATE utf32_spanish_ci NOT NULL,
  `limpieza_desagues_num` text COLLATE utf32_spanish_ci NOT NULL,
  `remocion_acarreo` text COLLATE utf32_spanish_ci NOT NULL,
  `remocion_grasas` text COLLATE utf32_spanish_ci NOT NULL,
  `otros2` text COLLATE utf32_spanish_ci NOT NULL,
  `vacuum` text COLLATE utf32_spanish_ci NOT NULL,
  `vacuumNum` text COLLATE utf32_spanish_ci NOT NULL,
  `vacuum_portable` text COLLATE utf32_spanish_ci NOT NULL,
  `water_jetter` text COLLATE utf32_spanish_ci NOT NULL,
  `tanktruck` text COLLATE utf32_spanish_ci NOT NULL,
  `otros3` text COLLATE utf32_spanish_ci NOT NULL,
  `coverAll` text COLLATE utf32_spanish_ci NOT NULL,
  `guantes` text COLLATE utf32_spanish_ci NOT NULL,
  `capacete` text COLLATE utf32_spanish_ci NOT NULL,
  `equipo_espacio_confinado` text COLLATE utf32_spanish_ci NOT NULL,
  `otros5` text COLLATE utf32_spanish_ci NOT NULL,
  `comentario` text COLLATE utf32_spanish_ci NOT NULL,
  `desechos_liquidos` text COLLATE utf32_spanish_ci NOT NULL,
  `aguas_residuales` text COLLATE utf32_spanish_ci NOT NULL,
  `aceites_vegetales` text COLLATE utf32_spanish_ci NOT NULL,
  `otros4` text COLLATE utf32_spanish_ci NOT NULL,
  `total_desperciado` text COLLATE utf32_spanish_ci NOT NULL,
  `tecnico_adicional` text COLLATE utf32_spanish_ci NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time NOT NULL,
  `fecha_visita` date NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modif` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estatus` int(11) NOT NULL DEFAULT '0' COMMENT '0 = activo , 1 = anulado',
  `planta_tratamiento` text COLLATE utf32_spanish_ci NOT NULL,
  `otra_facilidad` text COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `servicio_general`
--

INSERT INTO `servicio_general` (`id`, `id_incidencia`, `vaciado`, `vaciado_parcial`, `otros`, `limpeza_regular`, `inspeccion`, `interceptor_aceite`, `tanque_almacenamiento`, `pozo_septico`, `estacion_bombas`, `tanque_recibidor`, `tanque_aceites`, `otros1`, `interior`, `exterior`, `interior_exterior`, `limpieza_derrame_liquido`, `limpieza_manhole`, `limpieza_lift_station`, `limpieza_tuberias`, `limpieza_tuberias_num`, `limpieza_registros_desagues`, `limpieza_registros_num`, `limpieza_desagues_num`, `remocion_acarreo`, `remocion_grasas`, `otros2`, `vacuum`, `vacuumNum`, `vacuum_portable`, `water_jetter`, `tanktruck`, `otros3`, `coverAll`, `guantes`, `capacete`, `equipo_espacio_confinado`, `otros5`, `comentario`, `desechos_liquidos`, `aguas_residuales`, `aceites_vegetales`, `otros4`, `total_desperciado`, `tecnico_adicional`, `hora_entrada`, `hora_salida`, `fecha_visita`, `fecha_creacion`, `fecha_modif`, `estatus`, `planta_tratamiento`, `otra_facilidad`) VALUES
(1, 5, 'on', 'on', '', '', '', '', 'on', '', '', 'on', '', '', '', '', '', '', '', 'on', 'off', '', '', '', '', '', '', 'on', 'on', '99', '', '', '', '', '', '', 'on', '', '', 'Test', 'on', '', '', '', '', '2', '09:17:21', '09:17:36', '0000-00-00', '2019-08-27 14:18:28', '2019-08-27 14:18:28', 0, '', ''),
(2, 16, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'off', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '13:07:05', '15:20:12', '0000-00-00', '2019-09-30 20:20:24', '2019-09-30 20:20:24', 0, '', ''),
(9, 4, 'on', 'on', 'on', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '20:14:55', '12:49:54', '0000-00-00', '2020-01-29 16:50:31', '2020-01-29 16:50:31', 0, 'on', 'on'),
(10, 6, 'on', 'on', 'on', 'on', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '20:16:40', '12:53:08', '0000-00-00', '2020-01-29 16:53:23', '2020-01-29 16:53:23', 0, 'on', ''),
(11, 8, 'on', 'on', 'on', 'on', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '10:56:30', '13:03:52', '0000-00-00', '2020-01-29 17:05:40', '2020-01-29 17:05:40', 0, '', ''),
(12, 10, '', '', '', '', '', 'on', 'on', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '21:45:38', '13:08:42', '0000-00-00', '2020-01-29 17:08:56', '2020-01-29 17:08:56', 0, '', ''),
(13, 11, '', '', 'on', 'on', 'on', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '10:13:25', '13:12:03', '0000-00-00', '2020-01-29 17:12:46', '2020-01-29 17:12:46', 0, '', ''),
(14, 13, '', 'on', 'on', 'on', '', '', '', '', 'on', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '10:31:59', '13:44:50', '0000-00-00', '2020-01-29 17:45:05', '2020-01-29 17:45:05', 0, '', ''),
(15, 15, '', '', '', '', '', 'on', 'on', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '11:58:03', '14:25:10', '0000-00-00', '2020-01-29 18:26:03', '2020-01-29 18:26:03', 0, '', ''),
(16, 19, '', 'on', 'on', 'on', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'on', 'on', '', '', '17:05:25', '14:29:09', '0000-00-00', '2020-01-29 18:29:51', '2020-02-01 02:20:54', 0, 'on', 'on'),
(17, 18, '', 'on', 'on', 'on', '', '', 'on', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '20:25:49', '02:34:20', '0000-00-00', '2020-01-30 02:31:11', '2020-01-30 18:11:18', 0, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_plomeria`
--

CREATE TABLE `servicio_plomeria` (
  `id` int(11) NOT NULL,
  `id_incidencia` int(11) NOT NULL,
  `destape` text COLLATE utf32_spanish_ci NOT NULL,
  `reparacion` text COLLATE utf32_spanish_ci NOT NULL,
  `otros` text COLLATE utf32_spanish_ci NOT NULL,
  `instalacion` text COLLATE utf32_spanish_ci NOT NULL,
  `inspeccion` text COLLATE utf32_spanish_ci NOT NULL,
  `detalle_servicio_regulares` text COLLATE utf32_spanish_ci NOT NULL,
  `banos` text COLLATE utf32_spanish_ci NOT NULL,
  `cocina` text COLLATE utf32_spanish_ci NOT NULL,
  `otros1` text COLLATE utf32_spanish_ci NOT NULL,
  `trampas` text COLLATE utf32_spanish_ci NOT NULL,
  `drenaje` text COLLATE utf32_spanish_ci NOT NULL,
  `detalle_servicio_realizado` text COLLATE utf32_spanish_ci NOT NULL,
  `inspeccion_cctv` text COLLATE utf32_spanish_ci NOT NULL,
  `inspeccion_cctv_num` text COLLATE utf32_spanish_ci NOT NULL,
  `limpieza_tuberia` text COLLATE utf32_spanish_ci NOT NULL,
  `limpieza_tuberia_num` text COLLATE utf32_spanish_ci NOT NULL,
  `inpeccion_controles` text COLLATE utf32_spanish_ci NOT NULL,
  `reparacion_controles` text COLLATE utf32_spanish_ci NOT NULL,
  `limpieza_desagues` text COLLATE utf32_spanish_ci NOT NULL,
  `limpieza_desagues_num` text COLLATE utf32_spanish_ci NOT NULL,
  `limpieza_desagues_registro` text COLLATE utf32_spanish_ci NOT NULL,
  `limpieza_derrame` text COLLATE utf32_spanish_ci NOT NULL,
  `detalle_servicios_especiales` text COLLATE utf32_spanish_ci NOT NULL,
  `k1` text COLLATE utf32_spanish_ci NOT NULL,
  `k2` text COLLATE utf32_spanish_ci NOT NULL,
  `water` text COLLATE utf32_spanish_ci NOT NULL,
  `soplete` text COLLATE utf32_spanish_ci NOT NULL,
  `fuete` text COLLATE utf32_spanish_ci NOT NULL,
  `otros2` text COLLATE utf32_spanish_ci NOT NULL,
  `equipo_seguridad` text COLLATE utf32_spanish_ci NOT NULL,
  `cover` text COLLATE utf32_spanish_ci NOT NULL,
  `guantes` text COLLATE utf32_spanish_ci NOT NULL,
  `botas` text COLLATE utf32_spanish_ci NOT NULL,
  `capacete` text COLLATE utf32_spanish_ci NOT NULL,
  `camara` text COLLATE utf32_spanish_ci NOT NULL,
  `detalle_equipos_utilizados` text COLLATE utf32_spanish_ci NOT NULL,
  `comentario` text COLLATE utf32_spanish_ci NOT NULL,
  `tecnico_adicional` text COLLATE utf32_spanish_ci NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time NOT NULL,
  `titulo` text COLLATE utf32_spanish_ci NOT NULL,
  `nombre_letra_molde` text COLLATE utf32_spanish_ci NOT NULL,
  `fecha_visita` date NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modif` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `productos` text COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `servicio_plomeria`
--

INSERT INTO `servicio_plomeria` (`id`, `id_incidencia`, `destape`, `reparacion`, `otros`, `instalacion`, `inspeccion`, `detalle_servicio_regulares`, `banos`, `cocina`, `otros1`, `trampas`, `drenaje`, `detalle_servicio_realizado`, `inspeccion_cctv`, `inspeccion_cctv_num`, `limpieza_tuberia`, `limpieza_tuberia_num`, `inpeccion_controles`, `reparacion_controles`, `limpieza_desagues`, `limpieza_desagues_num`, `limpieza_desagues_registro`, `limpieza_derrame`, `detalle_servicios_especiales`, `k1`, `k2`, `water`, `soplete`, `fuete`, `otros2`, `equipo_seguridad`, `cover`, `guantes`, `botas`, `capacete`, `camara`, `detalle_equipos_utilizados`, `comentario`, `tecnico_adicional`, `hora_entrada`, `hora_salida`, `titulo`, `nombre_letra_molde`, `fecha_visita`, `fecha_creacion`, `fecha_modif`, `productos`) VALUES
(1, 7, '', 'on', '', '', 'on', '', '', '', '', '', '', '', 'on', '', '', '', '', '', 'on', '', '', 'on', ',mjmj', '', '', '', '', '', '', '', '', '', '', '', '', '', 'knhh', '', '20:17:07', '17:30:50', '', '', '0000-00-00', '2020-02-04 23:32:06', '2020-02-04 23:32:06', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soporte`
--

CREATE TABLE `soporte` (
  `id` int(11) NOT NULL,
  `id_tecnico` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modif` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_grupo` int(11) NOT NULL DEFAULT '0' COMMENT 'solo aplica si el perfil es Especial',
  `id_cliente` int(11) NOT NULL DEFAULT '0' COMMENT 'se atara con un cliente es decir cliente asociado a un usuario',
  `dispositivo` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`, `id_grupo`, `id_cliente`, `dispositivo`) VALUES
(1, 'Administrador', 'admin', '$2a$07$asxx54ahjppf45sd87a5auHhDisdvuSxcDBsaoZYMwJrghJ3jkICW', 'Administrador', 'vistas/img/usuarios/admin/656.png', 1, '2020-02-12 16:33:25', '2020-02-12 21:33:25', 0, 0, 'WEB'),
(61, 'Ashbel Roldan ', 'aroldan', '$2a$07$asxx54ahjppf45sd87a5auO9SticqA7hBpqNxk667pE/VD9af6fES', 'Tecnico', 'vistas/img/usuarios/aroldan/391.jpg', 1, '2019-08-27 08:30:02', '2019-08-27 13:30:02', 0, 0, NULL),
(63, 'Roberto Negron', 'Colo', '$2a$07$asxx54ahjppf45sd87a5au.ranjuT/8uZuV5hmJIkf3omrAYQUxbW', 'Tecnico', 'vistas/img/usuarios/Colo/459.jpg', 1, '0000-00-00 00:00:00', '2019-09-30 17:57:31', 0, 0, NULL),
(64, 'Victor Castro', 'Victor', '$2a$07$asxx54ahjppf45sd87a5audGQgdB8zdUGLRylP2hFlZq07ScngbfS', 'Tecnico', 'vistas/img/usuarios/Victor/174.jpg', 0, '0000-00-00 00:00:00', '2019-08-01 15:04:39', 0, 0, NULL),
(65, 'Burger King', 'burgerking', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Especial', '', 1, '0000-00-00 00:00:00', '2019-09-20 14:10:30', 1, 0, NULL),
(66, 'KFC', 'kfc', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Especial', '', 0, '0000-00-00 00:00:00', '2019-09-20 14:11:19', 3, 0, NULL),
(67, 'Taco Bell', 'tacobell', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Especial', '', 0, '0000-00-00 00:00:00', '2019-09-20 14:11:20', 4, 0, NULL),
(68, 'Pizza Hut', 'pizzahut', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Especial', '', 0, '0000-00-00 00:00:00', '2019-09-20 14:11:16', 5, 0, NULL),
(69, 'Farmaceuticas', 'farmaceuticas', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Especial', '', 0, '0000-00-00 00:00:00', '2019-09-20 14:11:16', 6, 0, NULL),
(70, 'Hospitales', 'hospitales', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Especial', '', 0, '0000-00-00 00:00:00', '2019-09-20 14:11:07', 7, 0, NULL),
(71, 'Hoteles', 'hoteles', '$2a$07$asxx54ahjppf45sd87a5auwyofmEvd3W7TOOpq9Po2qMDeLPNov22', 'Especial', '', 0, '0000-00-00 00:00:00', '2019-09-20 14:11:39', 8, 0, NULL),
(72, '000117', '000117', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 1, NULL),
(73, '000118', '000118', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 2, NULL),
(74, '000184', '000184', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 3, NULL),
(75, '000243', '000243', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 4, NULL),
(76, '000268', '000268', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 5, NULL),
(77, '000348', '000348', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 6, NULL),
(78, '000385', '000385', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 7, NULL),
(79, '000687', '000687', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 8, NULL),
(80, '001071', '001071', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 9, NULL),
(81, '001108', '001108', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 10, NULL),
(82, '001172', '001172', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 11, NULL),
(83, '001386', '001386', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 12, NULL),
(84, '001409', '001409', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 13, NULL),
(85, '001460', '001460', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '2019-09-20 11:00:34', '2019-09-20 16:06:07', 1, 14, NULL),
(86, '001521', '001521', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 15, NULL),
(87, '002075', '002075', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 16, NULL),
(88, '002158', '002158', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 17, NULL),
(89, '002231', '002231', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 18, NULL),
(90, '002456', '002456', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 19, NULL),
(91, '002457', '002457', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 20, NULL),
(92, '002511', '002511', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 21, NULL),
(93, '002524', '002524', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 22, NULL),
(94, '002533', '002533', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 23, NULL),
(95, '002601', '002601', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 24, NULL),
(96, '002767', '002767', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 25, NULL),
(97, '002785', '002785', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 26, NULL),
(98, '002856', '002856', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 27, NULL),
(99, '003015', '003015', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 28, NULL),
(100, '003039', '003039', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 29, NULL),
(101, '003040', '003040', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 30, NULL),
(102, '003067', '003067', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 31, NULL),
(103, '003256', '003256', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 32, NULL),
(104, '003257', '003257', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 33, NULL),
(105, '003291', '003291', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 34, NULL),
(106, '003370', '003370', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 35, NULL),
(107, '003539', '003539', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 36, NULL),
(108, '003560', '003560', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 37, NULL),
(109, '003741', '003741', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 38, NULL),
(110, '003769', '003769', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 39, NULL),
(111, '003872', '003872', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 40, NULL),
(112, '003986', '003986', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 41, NULL),
(113, '003987', '003987', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 42, NULL),
(114, '004325', '004325', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 43, NULL),
(115, '004512', '004512', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 44, NULL),
(116, '004545', '004545', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 45, NULL),
(117, '004595', '004595', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 46, NULL),
(118, '004821', '004821', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 47, NULL),
(119, '004978', '004978', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 48, NULL),
(120, '005060', '005060', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 49, NULL),
(121, '005131', '005131', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 50, NULL),
(122, '005254', '005254', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 51, NULL),
(123, '005405', '005405', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 52, NULL),
(124, '005437', '005437', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 53, NULL),
(125, '005475', '005475', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 54, NULL),
(126, '005476', '005476', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 55, NULL),
(127, '005531', '005531', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 56, NULL),
(128, '005844', '005844', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 57, NULL),
(129, '005845', '005845', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 58, NULL),
(130, '005930', '005930', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 59, NULL),
(131, '005977', '005977', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 60, NULL),
(132, '006043', '006043', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 61, NULL),
(133, '006115', '006115', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 62, NULL),
(134, '006319', '006319', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 63, NULL),
(135, '006321', '006321', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 64, NULL),
(136, '006328', '006328', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 65, NULL),
(137, '006754', '006754', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 66, NULL),
(138, '007154', '007154', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 67, NULL),
(139, '007161', '007161', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 68, NULL),
(140, '007171', '007171', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 69, NULL),
(141, '007289', '007289', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 70, NULL),
(142, '007539', '007539', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 71, NULL),
(143, '007788', '007788', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 72, NULL),
(144, '007822', '007822', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 73, NULL),
(145, '007884', '007884', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 74, NULL),
(146, '007967', '007967', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 75, NULL),
(147, '008308', '008308', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 76, NULL),
(148, '008452', '008452', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 77, NULL),
(149, '008858', '008858', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 78, NULL),
(150, '008863', '008863', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 79, NULL),
(151, '008966', '008966', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 80, NULL),
(152, '008968', '008968', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 81, NULL),
(153, '009410', '009410', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 82, NULL),
(154, '010030', '010030', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 83, NULL),
(155, '010045', '010045', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 84, NULL),
(156, '010052', '010052', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 85, NULL),
(157, '010069', '010069', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 86, NULL),
(158, '010485', '010485', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 87, NULL),
(159, '010736', '010736', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 88, NULL),
(160, '010822', '010822', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 89, NULL),
(161, '010823', '010823', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 90, NULL),
(162, '011102', '011102', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 91, NULL),
(163, '011103', '011103', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 92, NULL),
(164, '011218', '011218', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 93, NULL),
(165, '011272', '011272', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 94, NULL),
(166, '011521', '011521', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 95, NULL),
(167, '011563', '011563', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 96, NULL),
(168, '011605', '011605', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 97, NULL),
(169, '011674', '011674', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 98, NULL),
(170, '011677', '011677', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 99, NULL),
(171, '011678', '011678', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 100, NULL),
(172, '011687', '011687', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 101, NULL),
(173, '011902', '011902', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 102, NULL),
(174, '011907', '011907', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 103, NULL),
(175, '011908', '011908', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 104, NULL),
(176, '011959', '011959', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 105, NULL),
(177, '012144', '012144', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 106, NULL),
(178, '012234', '012234', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 107, NULL),
(179, '012273', '012273', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 108, NULL),
(180, '012282', '012282', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 109, NULL),
(181, '012352', '012352', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 110, NULL),
(182, '012353', '012353', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 111, NULL),
(183, '012354', '012354', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 112, NULL),
(184, '012381', '012381', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 113, NULL),
(185, '012383', '012383', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 114, NULL),
(186, '012384', '012384', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 115, NULL),
(187, '012715', '012715', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 116, NULL),
(188, '012716', '012716', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 117, NULL),
(189, '012717', '012717', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 118, NULL),
(190, '012718', '012718', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 119, NULL),
(191, '013085', '013085', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 120, NULL),
(192, '013086', '013086', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 121, NULL),
(193, '013104', '013104', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 122, NULL),
(194, '013291', '013291', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 123, NULL),
(195, '013429', '013429', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 124, NULL),
(196, '013457', '013457', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 125, NULL),
(197, '013458', '013458', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 126, NULL),
(198, '013460', '013460', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 127, NULL),
(199, '013482', '013482', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 128, NULL),
(200, '013527', '013527', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 129, NULL),
(201, '013547', '013547', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 130, NULL),
(202, '013638', '013638', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 131, NULL),
(203, '013646', '013646', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 132, NULL),
(204, '013763', '013763', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 133, NULL),
(205, '013789', '013789', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 134, NULL),
(206, '013926', '013926', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 135, NULL),
(207, '013935', '013935', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 136, NULL),
(208, '014094', '014094', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 137, NULL),
(209, '014099', '014099', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 138, NULL),
(210, '014118', '014118', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 139, NULL),
(211, '014170', '014170', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 140, NULL),
(212, '014684', '014684', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 141, NULL),
(213, '014695', '014695', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 142, NULL),
(214, '014696', '014696', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 143, NULL),
(215, '014908', '014908', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 144, NULL),
(216, '014963', '014963', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 145, NULL),
(217, '015216', '015216', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 146, NULL),
(218, '015217', '015217', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 147, NULL),
(219, '015473', '015473', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 148, NULL),
(220, '015486', '015486', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 149, NULL),
(221, '015487', '015487', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 150, NULL),
(222, '015728', '015728', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 151, NULL),
(223, '016290', '016290', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 152, NULL),
(224, '016361', '016361', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 153, NULL),
(225, '016394', '016394', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 154, NULL),
(226, '016395', '016395', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 155, NULL),
(227, '016958', '016958', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 156, NULL),
(228, '016959', '016959', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 157, NULL),
(229, '017102', '017102', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 158, NULL),
(230, '017393', '017393', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 159, NULL),
(231, '017679', '017679', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 160, NULL),
(232, '017702', '017702', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 161, NULL),
(233, '017705', '017705', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 162, NULL),
(234, '017939', '017939', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 163, NULL),
(235, '018057', '018057', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 164, NULL),
(236, '018247', '018247', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 165, NULL),
(237, '018571', '018571', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 166, NULL),
(238, '018572', '018572', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 167, NULL),
(239, '018863', '018863', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 168, NULL),
(240, '018864', '018864', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 169, NULL),
(241, '018866', '018866', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 170, NULL),
(242, '019168', '019168', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 171, NULL),
(243, '020702', '020702', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 172, NULL),
(244, '021907', '021907', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 173, NULL),
(327, 'Jorge Luis Delgadillo Zuñiga', 'jdelgadillo', '$2a$07$asxx54ahjppf45sd87a5auHhDisdvuSxcDBsaoZYMwJrghJ3jkICW', 'Tecnico', 'vistas/img/usuarios/jdelgadillo/652.jpg', 1, '2020-02-04 18:30:17', '2020-02-04 23:30:17', 0, 0, 'WEB'),
(328, 'Amilcar Barahona', 'abarahona', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Tecnico', 'vistas/img/usuarios/abarahona/220.jpg', 1, '2019-10-01 11:45:31', '2019-10-01 16:45:31', 0, 0, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacenes`
--
ALTER TABLE `almacenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupo_cliente`
--
ALTER TABLE `grupo_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `incidencias_fotos`
--
ALTER TABLE `incidencias_fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movimiento_inventario`
--
ALTER TABLE `movimiento_inventario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicio_general`
--
ALTER TABLE `servicio_general`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicio_plomeria`
--
ALTER TABLE `servicio_plomeria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `soporte`
--
ALTER TABLE `soporte`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacenes`
--
ALTER TABLE `almacenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupo_cliente`
--
ALTER TABLE `grupo_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `incidencias_fotos`
--
ALTER TABLE `incidencias_fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `movimiento_inventario`
--
ALTER TABLE `movimiento_inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicio_general`
--
ALTER TABLE `servicio_general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `servicio_plomeria`
--
ALTER TABLE `servicio_plomeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;
--
-- Base de datos: `ashbel18_ret_db`
--
CREATE DATABASE IF NOT EXISTS `ashbel18_ret_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `ashbel18_ret_db`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenes`
--

CREATE TABLE `almacenes` (
  `id` int(11) NOT NULL,
  `tipo` text COLLATE utf32_spanish_ci NOT NULL COMMENT 'Venta, Compra, Consumo, RMA',
  `nombre` text COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `almacenes`
--

INSERT INTO `almacenes` (`id`, `tipo`, `nombre`) VALUES
(1, 'ppal', 'Principal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(1, 'Equipos Electromecánicos', '2019-04-08 17:57:51'),
(2, 'Taladros', '2017-12-21 22:53:29'),
(3, 'Andamios', '2017-12-21 22:53:29'),
(4, 'Generadores de energía', '2017-12-21 22:53:29'),
(5, 'Equipos para construcción', '2017-12-21 22:53:29'),
(6, 'Martillos mecánicos', '2017-12-22 01:06:40'),
(7, 'Equipos celulares', '2019-04-12 15:47:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `email` text COLLATE utf8_spanish_ci,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `incidencia` int(11) NOT NULL DEFAULT '0' COMMENT 'numero de incidencia generada',
  `ultima_incidencia` datetime DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_grupo` int(11) NOT NULL DEFAULT '0',
  `estatus` int(11) NOT NULL DEFAULT '0' COMMENT '0 = activo y 1 = Inactivo',
  `localizador` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `documento`, `email`, `telefono`, `direccion`, `fecha_nacimiento`, `incidencia`, `ultima_incidencia`, `fecha`, `id_grupo`, `estatus`, `localizador`) VALUES
(1, 'Jackeline Bonano', 117, NULL, '787-200-7002', 'Ave. 65 Infantería, Km. 7 Hm. 3, Río Piedras, PR 00924', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Comandante '),
(2, 'Julián García', 118, NULL, '787-200-7003', 'Amalia Marín Esquina Gándara, Río Piedras, PR 00925', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Río Piedras'),
(3, 'Jackeline Colón', 184, NULL, '787-679-7725', 'Ave. Roberto H. Todd, Santurce, PR 00925', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Santurce - Pda 18'),
(4, 'José Vargas', 243, NULL, '787-878-4455', 'Carr. #2, Ave. Llorens Torres, Arecibo Shopping Center, Arecibo, PR 00612', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Arecibo'),
(5, 'Jackeline Colón', 268, NULL, '787-753-1368', 'Ave. Ponce de León #207, Detrás de Popular Center, San Juan PR 00917', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Hato Rey-Milla de Oro'),
(6, 'Francisco Salas', 348, NULL, '787-679-7727', 'Ave. Campo Rico Ext. Contry Club, Río Piedras, PR 00928', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Campo Rico I'),
(7, 'Milka Pérez', 385, NULL, '787-743-4755', 'Antigua Carretera # 1 de Caguas a Cayey, Caguas, PR 00725', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Caguas 1'),
(8, 'Joel Jácome', 687, NULL, '787-843-5005', 'Ave. Las Américas, Esquina Ave. de Hostos, Ponce, PR 00731', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Ponce 1'),
(9, 'Julio Vale', 1071, NULL, '787-834-0520', 'Calle Luna # 54 (Pueblo), Condominio Apolo, Mayagüez, PR 00968', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Mayagüez 1'),
(10, 'Joel Jácome', 1108, NULL, '787-844-8355', 'Calle Marginal KM 7, Carretera Estatal # 1, Barrio Machuelo Bajo, Urb. Valle Verde, Ponce, PR 00731', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Ponce 2'),
(11, 'Julio Vale', 1172, NULL, '787-833-2180', 'Mayagüez Mall, Carretera #2 Km. 159.4, Mayagüez, PR 00680', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Mayagüez 2'),
(12, 'Milka Pérez', 1386, NULL, '787-738-2083', 'Carretera # 1 Int. # 15 Barrio Monte Llanos, Cayey Shopping Center, Cayey, PR 00736', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Cayey 1'),
(13, 'Wilfredo Torres', 1409, NULL, '787-720-4782', 'Calle México, Esquina Carretera # 833 Parkville, Guaynabo, PR 00955', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Parkville'),
(14, 'Luis Soto', 1460, NULL, '787-786-1927', 'Carretera Estatal # 2 Km. 14.7 Hato Tejas, Bayamón, PR 00961', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Bayamón Oeste '),
(15, 'Jackeline Colón', 1521, NULL, '787-679-7728', 'Calle Rodríguez Serrá, Esquina Ave. Ashford, Condado, PR 00901', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Condado I'),
(16, 'Francisco Salas', 2075, NULL, '787-710-8177', 'Ave. Boca Cangrejos, Esquina Baldorioty de Castro, Isla Verde, Carolina, PR  00979', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Isla Verde '),
(17, 'Lourdes Ortíz', 2158, NULL, '787-852-4935', 'Carretera # 30 Calle Dr. Rincón, Reparto Rivera Donato, Humacao, PR 00791', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Humacao I'),
(18, 'Santiago Huezo', 2231, NULL, '787-780-3435', 'Ave. Lomas Verdes Carretera # 174, Barrio Juan Sánchez, Bayamón, PR 00956', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Lomas Verdes '),
(19, 'Julián García', 2456, NULL, '787-763-1621', 'El Señorial Shopping Center, Esquina Paraná, Cupey, San Juan, PR 00925', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Señorial'),
(20, 'Francisco Salas', 2457, NULL, '787-755-0565', 'Trujillo Alto Plaza, Expreso de Trujillo Alto Carr. 181, Trujillo Alto, PR 00976', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Trujillo Alto'),
(21, 'Xiomara Labrador', 2511, NULL, '787-797-8500', 'Rexville Plaza Shopping Center, Carretera Estatal # 167 Km. 18.8, Bayamón, PR 00956', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Rexville '),
(22, 'Rosvelyn Félix', 2524, NULL, '787-863-4262', 'Centro Comercial El Batey, Barrio Sandinera  Carr. Municipal, Desvío a Las Croabas, \nFajardo, PR 00738;1', NULL, 0, NULL, '2019-07-26 02:40:20', 1, 0, NULL),
(23, 'José Rivera', 2533, NULL, '787-854-3173', 'Carretera Estatal # 2, Esquina Calle # 6, Urb. Félix Dávila, Manatí, PR 00674', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Manatí'),
(24, 'Jackeline Colón', 2601, NULL, '787-296-8971', 'Calle San Francisco # 269, Esquina Calle Tasca Viejo San Juan, San Juan, PR 00901', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Viejo San Juan'),
(25, 'Jackeline Colón', 2767, NULL, '787-296-8972', 'Amalia Marín, Esquina Gándara, Ave. Domenech, Esquina Juan J. Jiménez, San Juan, PR 00925', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Domenech '),
(26, 'Angel Delgado', 2785, NULL, '787-278-2121', 'Dorado Shopping Center, Carretera Estatal # 693, Barrio Mameyal, Dorado, PR 00646', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Dorado'),
(27, 'Wilfredo Torres', 2856, NULL, '787-754-0311', 'Plaza Las Américas Shopping Center, Local #305 Tercer Nivel, Hato Rey, PR 00917', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Plaza I - La Terraza'),
(28, 'José Vargas', 3015, NULL, '787-878-6821', 'Plaza Atlántico Shopping Center Local K,  Km. 8.3, Arecibo, PR 00612  ', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Plaza Atlántico '),
(29, 'Joel Jácome', 3039, NULL, '787-840-1991', 'Carretera Estatal # 2 Km 260.4, Valle Real, Ponce, PR 00731', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Ponce 3'),
(30, 'William López', 3040, NULL, '787-825-2665', 'Carretera Estatal # 4, Esquina Calle A, Barrio San Delfonso, Coamo, PR 00769', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Coamo'),
(31, 'Audie Alvarez', 3067, NULL, '787-856-1465', 'Carretera Estatal # 127, Calle 25 de Julio, Yauco, PR 00698', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Yauco'),
(32, 'Milka Pérez', 3256, NULL, '787-738-5333', 'Calle de Diego Esquina Corchado, Cayey, PR 00736', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Cayey 2 '),
(33, 'Damaris Flores', 3257, NULL, '787-864-2450', 'Carretera Estatal # 3, KM. 135.8, Guayama, PR 00784 ', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Guayama 1'),
(34, 'Julio Vale', 3291, NULL, '787-834-2825', 'Calle Post & Basora, Mayagüez, PR 00680', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Mayagüez 3 '),
(35, 'Wilfredo Torres', 3370, NULL, '787-720-8802', 'Expreso Martínez Nadal, Los Jardines Shopping Center, Guaynabo PR 00965', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Guaynabo'),
(36, 'Wilfredo Torres', 3539, NULL, '787-296-8973', 'Centro Comercial San Francisco, Río Piedras, PR 00925', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'San Francisco '),
(37, 'Julián García', 3560, NULL, '787-296-8974', 'Solar 170 - A Bloque S, Urb. San Agustín, Barrio Sabana Llana, Río Piedras, PR 00928', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'San Agustín '),
(38, 'Luis Soto', 3741, NULL, '787-795-6525', 'Plaza Río Hondo Shopping Center Ave. Comerío, Bayamón, PR 00961', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Río Hondo (Estacionamiento)'),
(39, 'Julián García', 3769, NULL, '787-710-8285', 'Ave. José C. Barbosa # 368, Urb. Dávila & Llenaza, Hato Rey,  PR 00907', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Barbosa '),
(40, 'Joel Jácome', 3872, NULL, '787-840-7570', 'Calle Unión # 7 (Frente a la Plaza de Recreo), Plaza Degetau Calle Unión, Ponce, PR 00907', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Ponce 4'),
(41, 'Julián García', 3986, NULL, '787-751-4744', 'Centro Médico Fast Food Center, Cafetería Central de Centro Médico, Entre hospital Universitario y Hospital del niño,  Río Piedras, PR 00925 ', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Centro Médico'),
(42, 'Wilfredo Torres', 3987, NULL, '787-710-8286', 'Plaza Puerto Rico, Carretera # 1 Esquina Camino Sein, Río Piedras, PR 00925', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Interamericana '),
(43, 'Audie Alvarez', 4325, NULL, '787-892-4390', 'Carretera # 102 Barrio Maresua  Km. 204.6 (Frente a Universidad Interamericana), San Germán, PR 00683', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'San Germán '),
(44, 'Lizamaira Rodríguez', 4512, NULL, '787-894-3940', 'Carretera Estatal # 111 - R, Calle Dr. Cueto, Utuado, PR 00641', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Utuado'),
(45, 'Jackeline Bonano', 4545, NULL, '787-752-4190', 'Ave.65 Infantería KM 7, Carolina, PR 00987', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Roberto Clemente'),
(46, 'Francisco Salas', 4595, NULL, '787-710-8287', 'Carretera # 187, Esquina Los Gobernadores, Carolina, 00979', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Plazoleta Isla Verde'),
(47, 'Francisco Salas', 4821, NULL, '787-710-8288', 'Ave.65 Infantería, Esquina Calle Abad, Urb. Club Manor Bo. Sabana Llena, \nRío Piedras, PR 00925;1', NULL, 0, NULL, '2019-07-26 02:40:20', 1, 0, NULL),
(48, 'Jessica Bermúdez', 4978, NULL, '787-746-2523', 'Carretera # 1, Km. 34.5 (Frente a Centro Comercial Villa Blanca) Entrada Urbanización Bairoa, Caguas, PR 00725', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Caguas 2 '),
(49, 'Xiomara Labrador', 5060, NULL, '787-740-1464', 'Carretera Estatal # 2 Km. 10.0, Santa Rosa Mall, Bayamón, PR 00959', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Santa Rosa '),
(50, 'Jackeline Colón', 5131, NULL, '787-710-8289', 'Ave. Baldorioty de Castro, Calle Esquilín y Linda Vista, Santurce, PR 00907', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Baldorioty'),
(51, 'Rosvelyn Félix', 5254, NULL, '787-887-8030', 'Carretera # 3 Km. 23.5, Barrio Ciénaga Baja, Río Grande, PR 00745', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Río Grande'),
(52, 'Luis Soto', 5405, NULL, '787-786-3055', 'Ave. Comerío Esquina Calle 24, Sierra Bayamón, Bayamón, PR 00961', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Sierra Bayamón'),
(53, 'Julián García', 5437, NULL, '787-710-8290', 'Carretera 176 Intersección Carretera # 838, Río Piedras, PR 00926', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Cupey 2 '),
(54, 'William González', 5475, NULL, '787-891-9359', 'Carretera # 2 Esquina Carretera Estatal # 459, Aguadilla, PR 00603', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Aguadilla 1'),
(55, 'Angel Delgado', 5476, NULL, '787-883-6476', 'Carretera Estatal #2 Centro Comercial Plaza del Caribe, Vega Alta, PR 00692 ', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Vega Alta '),
(56, 'José Vargas', 5531, NULL, '787-895-2583', 'Carretera Estatal # 2 Km. 100.7, Quebradillas, PR 00678', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Quebradilla '),
(57, 'Jessica Bermúdez', 5844, NULL, '787-746-8683', 'Plaza Centro I, Ave. Rafael Cordero, Esquina Carretera # 30, Caguas, PR 00725', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Caguas 4, Plaza Centro 1'),
(58, 'Francisco Salas', 5845, NULL, '787-710-8291', 'Ave. Campo Rico AL-15 Country Club, San Juan, PR 00982', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Campo Rico 2 - Carolina'),
(59, 'Xiomara Labrador', 5930, NULL, '787-785-8282', 'Ave. Santa Juanita, Calle 24, Bayamón Sur Shopping Center Los Millones, Bayamón, PR 00956', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Bayamón, Los Millones '),
(60, 'Evelyn Vázquez', 5977, NULL, '787-850-2466', 'Vista del Río Comercial Park, Carretera # 3 Ramal # 908 Vista del Río, Humacao, PR 00791', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Humacao, Vista del Río '),
(61, 'Evelyn Vázquez', 6043, NULL, '787-850-0631', 'Carretera Estatal # 3 y Carretera # 908 Urb. Villa Universitaria, \nHumacao, PR 00791;1', NULL, 0, NULL, '2019-07-26 02:40:20', 1, 0, NULL),
(62, 'Xiomara Labrador', 6115, NULL, '787-740-0350', 'Carretera Estatal # 167, Urb. Forest Hills, Bayamón, PR 00959', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Forest Hills - Bayamón'),
(63, 'José Rivera', 6319, NULL, '787-858-5555', 'Las Vegas Mall, Carretera # 2 Km. 39.4, Barrio Algarrobo, Vega Baja, PR 00693', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Vega Baja '),
(64, 'Wilfredo Torres', 6321, NULL, '787-250-8737', 'Primer Nivel Plaza las Américas al lado de Sears, Hato Rey, PR 00693', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Plaza Sears, Plaza las Américas'),
(65, 'Jessica Bermúdez', 6328, NULL, '787-746-2429', 'Centro Comercial Mi Antojo, Ave. Gautier Benítez, Km. 37 Lote A, Caguas, PR 00725', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Caguas Mi Antojo'),
(66, 'Luis Soto', 6754, NULL, '787-261-0128', 'Ave. Sabana Seca, Esquina Lizzie Graham, Calle 726 & 734, Levittown Lakes, Toa Baja, PR  00949', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Levittown 1'),
(67, 'Santiago Huezo', 7154, NULL, '787-710-8292', 'Calle Industrial Ctro. de Seguros San Patricio, Calle Resolución Esquina, F.D. Roosevelt, \nPueblo Viejo, San Juan, PR 00920;1', NULL, 0, NULL, '2019-07-26 02:40:20', 1, 0, NULL),
(68, 'Rosvelyn Félix', 7161, NULL, '787-860-1500', 'Ctro. Comercial Monte Brisas, Urb. Monte Brisas, Carretera 194 Km. 2.0 Fajardo, PR 00716', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Fajardo 2'),
(69, 'William González', 7171, NULL, '787-877-5555', 'Carretera # 111 Km. 4.6, San Francisco Cour, Moca, PR 00676', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Moca '),
(70, 'William López', 7289, NULL, '787-837-6862', 'Intersección Carretera Estatal # 149 con Carretera # 584, Juana Díaz, PR 00795', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Juana Díaz '),
(71, 'Rosvelyn Félix', 7539, NULL, '787-256-2350', 'Ctro. Comercial Plaza Noroeste, Carr.  Estatal # 3 Km. 20.5 Villas de Loíza, Loíza, PR 00795', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Loíza'),
(72, 'José Vargas', 7788, NULL, '787-880-0446', 'Plaza del Norte Shopping Center, Carretera # 2 Km. 81.9, Hatillo, PR 00659', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Hatillo 1'),
(73, 'William González', 7822, NULL, '787-829-3037', 'Centro Multiservicios Cooperativo, Carretera Estatal # 115 Km. 24.8, Barrio Asomante \nAguada, PR 00602 ;1', NULL, 0, NULL, '2019-07-26 02:40:20', 1, 0, NULL),
(74, 'Joel Jácome', 7884, NULL, '787-259-8299', 'Ponce Builders Square, Carretera Estatal # 2 Barrio Cañas, Ponce, PR 00731', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Ponce Massó '),
(75, 'Joel Jácome', 7967, NULL, '787-840-3396', 'Calle Fagot, La Rambla, Ponce, PR 00731', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Ponce Rambla'),
(76, 'Damaris Flores', 8308, NULL, '787-866-8271', 'Carretera # 54 (desvío Sur carr. # 3 ) Barrio Machete, Guayama, PR 00785', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Guayama Machete'),
(77, 'Damaris Flores', 8452, NULL, '787-864-5010', 'Plaza Guayama Shopping Center, Carretera Estatal # 3 Km. 134.6, Guayama, PR 00785', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Guayama 3'),
(78, 'Damaris Flores', 8858, NULL, '787-845-6972', 'Carretera # 52 Intersección Carretera 153, Barrio Jauca, Santa Isabel, PR 00757', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Santa Isabel'),
(79, 'José Vargas', 8863, NULL, '787-830-1605', 'Plaza Isabel Shopping Center, Carretera Estatal # 2 Km. 111, Isabela, PR 00794', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Isabela'),
(80, 'Vacante', 8966, NULL, '787-857-5437', 'Carretera Estatal # 156 Km. 14.2, Bo. Honduras, Barranquitas, PR 00794', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Barranquitas'),
(81, 'Julio Vale', 8968, NULL, '787-831-8225', 'Mayagüez Builders Sq. Shopping Center, Carr. Estatal # 2 Bo. Sabaneta, Mayagüez, PR 00680', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Mayagüez Massó'),
(82, 'Jackeline Bonano', 9410, NULL, '787-710-8293', 'Los Colobos Shopping Center, Ave. 65 Infantería, Carolina, PR 00982', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Los Colobos '),
(83, 'Evelyn Vázquez', 10030, NULL, '787-285-8237', 'Palma Real Shopping Center, Food Court, Int. 53, Carretera PR # 3, Humacao, PR 00791', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Humacao, Palma Real'),
(84, 'Julio Vale', 10045, NULL, '787-255-1595', 'Carretera Estatal # 101, Km. 17.2 Solar # 2 Boquerón Beach, Cabo Rojo PR 00622', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Cabo Rojo, Boquerón '),
(85, 'Audie Alvarez', 10052, NULL, '787-892-4528', 'Parque Industrial, Camino Real, Carr. Estatal # 2 Esquina Carr. 102, San Germán, PR 00963', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'San Germán 2'),
(86, 'Francisco Salas', 10069, NULL, '787-710-8294', 'Caribbean Airport Facilities, Aeropuerto Internacional Luis Muñoz Marín, Carolina, PR 00979', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Tiri Airport '),
(87, 'Lourdes Ortíz', 10485, NULL, '787-745-1015', 'Carretera Estatal # 189 Km. 3.5 Barrio Rincón, Gurabo, PR 00778', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Caguas,Turabo'),
(88, 'Lourdes Ortíz', 10736, NULL, '787-733-1535', 'Carretera Estatal # 183 Km. 20.7, Barrio Montones, Las Piedras, PR 00771', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Las Piedras '),
(89, 'Santiago Huezo', 10822, NULL, '939-793-7233', 'Econo Supermarket, Ave. Martínez Nadal , Esquina con Jesús T. Piñeiro, Altamira, Guaynabo, PR 00920', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Altamira'),
(90, 'Julio Vale', 10823, NULL, '787-265-5515', 'Mayagüez Mall, Local W - 6 Food Court, Carretera Estatal # 2 Km. 159.4, Mayagüez, PR 00680', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Mayagüez Mall '),
(91, 'José Vargas', 11102, NULL, '787-820-4629', 'Carretera # 2 PR 2, Km. 86.6 Barrio Pueblo, Hatillo PR 00659', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Hatillo 2'),
(92, 'Evelyn Vázquez', 11103, NULL, '787-266-2287', 'Carretera Estatal 901 Km. 8.6 Urb. Valles de Yabucoa, Bo. Juan Martín, Yabucoa PR  ', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Yabucoa '),
(93, 'Jessica Bermúdez', 11218, NULL, '787-286-0710', 'Notre Dame Commercial Development, Ave. Muñoz Marín (Frente a la Urb. Notre Dame) Bo. Thomas de Castro, Caguas, PR 00725 ', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Caguas, Notre Dame'),
(94, 'Lourdes Ortíz', 11272, NULL, '787-713-1070', 'Juncos Plaza Shopping, Carr. Estatal # 31 Km. 24.0 Bo. Ceiba Norte, Juncos, PR 00777', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Juncos'),
(95, 'Jackeline Bonano', 11521, NULL, '787-710-8295', 'Carretera Estatal # 3 Km. 11.6, Centro Judicial Barrio Trujillo Alto, Carolina, PR 00979', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Carolina, Centro Judicial '),
(96, 'Evelyn Vázquez', 11563, NULL, '787-885-2839', 'Calle Lauro Piñero # 3161 Esquina Carretera, Estatal # 978 Km. 21.19, Ceiba, PR 00735', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Ceiba'),
(97, 'Rosvelyn Félix', 11605, NULL, '787-809-2431', 'Río Grande States Shopping Center, Carretera # 3 Ave. 65 Infantería Esquina Carretera # 956 Km. 28.0 Barrio Zarzal, Río Grande, PR 00745', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Río Grande 2'),
(98, 'William López', 11674, NULL, '787-829-3037', 'Ave. Rudolfo González Final, Carr. #10, Barrio Rodríguez, Sector Desvío, Adjuntas, PR 00601', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Adjuntas'),
(99, 'William González', 11677, NULL, '787-280-0455', 'San Sebastián Shopping Center, Carr. Estatal # 118 Km. 18.0, San Sebastián, PR 00685', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'San Sebastián'),
(100, 'Xiomara Labrador', 11678, NULL, '787-778-8214', 'Calle Santa Cruz # 60, Urb. Santa Cruz, Bayamón, PR 00961', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'San Pablo '),
(101, 'Jackeline Bonano', 11687, NULL, '787-710-8296', 'Ave. Jesús M. Frogoso Esq. Ave. Fidalgo Diaz, Urb. Villa Fontana, Carolina, PR 00985', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Puma Plaza Carolina'),
(102, 'Luis Soto', 11902, NULL, '787-261-3770', 'Carretera Estatal # 165, Esquina Avenida Boulevard, Levittown, Toa Baja, PR 000959', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Levittown 2'),
(103, 'Milka Pérez', 11907, NULL, '787-714-0525', 'Carretera Estatal # 172 Km. 13.6, Cidra, PR 00739', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Cidra'),
(104, 'Lizamaira Rodríguez', 11908, NULL, '787-897-4743', 'Carretera Estatal # 111 Km. 2.9, Barrio Pueblo, Lares, PR 00669', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Lares'),
(105, 'Francisco Salas', 11959, NULL, '787-710-8297', 'Plaza Escorial Shopping Center, Carolina, PR 00979', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Parque Escorial'),
(106, 'Julián García', 12144, NULL, '787-287-7340', 'Carretera Estatal # 52, Montehiedra Shopping Center, Río Piedras, PR 00920', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Montehiedra'),
(107, 'Luis Soto', 12234, NULL, '787-785-7948', 'Shopping Center, Ave. West Main # 501 Sierra Bayamón, Bayamón, PR 00961', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Plaza del Sol '),
(108, 'Milka Pérez', 12273, NULL, '787-738-2285', 'Carretera Estatal # 14 Km. 65.5, Cayey, PR 00736', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Cayey 3'),
(109, 'Lizamaira Rodríguez', 12282, NULL, '787-816-6781', 'Carretera Estatal # 129 Km. 42.5,(Frente Residencial El Cotto), Arecibo, RR 00612', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Arecibo Jové'),
(110, 'Santiago Huezo', 12352, NULL, '787-995-0580', 'Lucchetti Industrial Park, Carretera Estatal # 28 Km. 2.2, Bayamón, PR 00956', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Lucchetti '),
(111, 'Damaris Flores', 12353, NULL, '787-271-0854', 'Carretera Estatal # 3, Km. 123.0, Patillas, PR 00723 ', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Patillas'),
(112, 'José Rivera', 12354, NULL, '787-862-3917', 'Carretera Estatal 155, Km. 47.4, Morovis, PR 00687', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, ' Morovis'),
(113, 'Jackeline Bonano', 12381, NULL, '787-776-2254', 'Plaza Carolina Mall (primer nivel) Ave. Fragoso, Villa Fontana, Carolina, PR 00729', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Plaza Carolina 2'),
(114, 'Jackeline Bonano', 12383, NULL, '787-710-8299', 'Rial Plaza Shopping, Carretera Estatal #185 Km. 0.0, Canóvanas, PR 00729', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Canóvanas '),
(115, 'Vacante', 12384, NULL, '787-802-0706', 'Carretera Estatal # 159 Km. 15.2, Corozal, PR 00783', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Corozal '),
(116, 'Evelyn Vázquez', 12715, NULL, '787-874-6883', 'Carretera Estatal # 31, Km. 3.2, Naguabo, PR 00718 ', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Naguabo'),
(117, 'William González', 12716, NULL, '787-823-0710', 'Carretera Estatal # 115 Km. 11.0, Rincón, PR 00677', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Rincón'),
(118, 'Julio Vale', 12717, NULL, '787-892-3210', 'Carretera Estatal # 2 Km. 167.3, Hormigueros, PR 00660', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Hormigueros'),
(119, 'William López', 12718, NULL, '787-847-0398', 'Carretera Estatal #149 Km. 55.2, Villalba, PR 00766 ', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Villalba'),
(120, 'Santiago Huezo', 13085, NULL, '787-945-0074', 'Carretera Estatal # 24 Lote 10, Metro Office Park, Guaynabo, PR 00968 - 1705', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Metro Office'),
(121, 'Jessica Bermúdez', 13086, NULL, '787-286-2915', 'Carretera # 52 (Expreso) & Carretera Estatal # 156, Caguas, PR 00725', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Las Catalinas Mall '),
(122, 'Angel Delgado', 13104, NULL, '787-270-1114', 'Carretera Estatal # 2 Km. 29.7, Vega Alta, PR 00692', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Plaza Grand Mall '),
(123, 'Jessica Bermúdez', 13291, NULL, '787-745-1055', 'Plaza Centro 3 Shopping FC, Ave Muñoz Marín, Carr. Estatal #30 Esquina Rafael Cordero,  Caguas, PR 00725 ', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Caguas, Plaza Centro 3 '),
(124, 'José Rivera', 13429, NULL, '787-867-7174', 'Carr. Estatal #155 Km. 30.8 con Carr. Estatal # 157 Barrio Garos, Orocovis, PR 00720', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Orocovis'),
(125, 'William López', 13457, NULL, '787-803-1887', 'Coamo Plaza, Carretera Estatal # 153 Km. 13.5, Coamo, PR 00769', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Coamo 2'),
(126, 'Julio Vale', 13458, NULL, '787-851-0520', 'Carretera Estatal # 100, Km. 7.3, Cabo Rojo, PR 00623', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Cabo Rojo 2'),
(127, 'Audie Alvarez', 13460, NULL, '787-821-4505', 'Carretera Estatal #116, Esquina Carretera # 333, Guánica, PR 00653', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Guánica'),
(128, 'Rosvelyn Félix', 13482, NULL, '787-801-1251', 'Carretera Estatal # 3 Km. 7.3, Monte Plaza, Fajardo, PR 00738', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Fajardo, Montesol'),
(129, 'Lourdes Ortíz', 13527, NULL, '787-715-1250', 'Carretera Estatal # 181, Esquina Carretera Estatal # 183, San Lorenzo, PR 00754', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'San Lorenzo'),
(130, 'Audie Alvarez', 13547, NULL, '787-873-0190', 'Sabana Grande Plaza, Carretera Estatal # 121 Km.216, Sabana Grande, PR 00637', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Sabana Grande'),
(131, 'Joel Jácome', 13638, NULL, '787-284-1245', 'Ponce 2000 Mall, Expreso # 2 Avenida Baramaya, Ponce, PR 00731', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Ponce 2000'),
(132, 'Audie Alvarez', 13646, NULL, '787-835-6620', 'Carretera Estatal # 127, KM 9.2, Barrio Jaguas, Guayanilla, PR 00656', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Guayanilla '),
(133, 'Lizamaira Rodríguez', 13763, NULL, '787-846-0650', 'Expreso # 2 KM. 57.3, Solar A, Forida Afuera,  Barceloneta, PR 00617', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Barceloneta'),
(134, 'Luis Soto', 13789, NULL, '787-784-4943', 'Embarcadero Food Court, Bayamón, PR 00956', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Río Hondo 2 '),
(135, 'Evelyn Vázquez', 13926, NULL, '787-285-7714', 'Plaza SAM\'S, Carretera Estatal # 3 KM 82.0, Humacao, PR 00791', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Humacao Sam\'s'),
(136, 'William González', 13935, NULL, '787-868-1272', 'Carretera Estatal # 115 Km. 22.0, Aguada, PR 00602', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Aguada 2'),
(137, 'Vacante', 14094, NULL, '787-869-8410', 'Mercado Plaza, Carretera Estatal # 152, Km. 16.0, Naranjito, PR 000791', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Naranjito'),
(138, 'Vacante', 14099, NULL, '787-991-2435', 'Carretera Estatal # 14 Km. 52.7, Aibonito, PR 00705', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Aibonito'),
(139, 'Vacante', 14118, NULL, '787-870-3322', 'Carretera Estatal # 159 Km. 20.2, Toa Alta, PR 00953', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Toa Alta'),
(140, 'Rosvelyn Félix', 14170, NULL, '787-256-5720', 'Edificio #4 Espacio #90, Carretera Estatal #188, Canóvanas, PR 00729', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Canóvanas, Outlets'),
(141, 'Vacante', 14684, NULL, '787-799-5046', 'Centro Comercial Pájaros, Shopping Village, Carretera Estatal #861 Int. Carretera #862, Bo. Pájaros, Toa Alta, PR 00956', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Bayamón, Barrio Pájaros'),
(142, 'Vacante', 14695, NULL, '787-875-3005', 'Carretera Estatal # 774 Km. 0.9, Comerío, PR 00782', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Comerío'),
(143, 'José Rivera', 14696, NULL, '787-871-5511', 'Carretera Estatal #149 , Intersección con Carretera #145, Barrio Jaguas, Ciales, PR 00638', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Ciales'),
(144, 'José Rivera', 14908, NULL, '787-854-5340', 'Plaza Monte Real Shopping Center, Carretera Estatal #2 Km. 45.6, Manatí, PR 00674', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Manatí Wal-Mart'),
(145, 'William López', 14963, NULL, '787-840-4382', 'Centro Comercial Coto Laurel, Carretera Estatal # 14 Km. 14.9, Ponce, PR 00780', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Ponce, Coto Laurel'),
(146, 'William López', 15216, NULL, '787-828-1878', 'Carretera Estatal # 144, Intersección Carretera Ramal #141, Jayuya, PR 00664 ', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Jayuya'),
(147, 'Lourdes Ortíz', 15217, NULL, '787-733-7905', 'Carretera # 30 Intersección Carretera #198, Las Piedras, PR 00771 ', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Las Piedras II'),
(148, 'José Vargas', 15473, NULL, '787-262-5292', 'Carretera Estatal PR #2 Km. 92.9, Bo. Membrillo, Camuy, PR 00627', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Camuy'),
(149, 'Xiomara Labrador', 15486, NULL, '787-799-4644', 'Carretera  #830 Km. 0.5 Cerro Gordo, Bayamón, PR 00957 ', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Bayamón Inter.'),
(150, 'Lourdes Ortíz', 15487, NULL, '787-737-2620', 'Carretera #181 Intersección Carr. #30, Gurabo, PR 00778', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Gurabo'),
(151, 'Milka Pérez', 15728, NULL, '939-205-0075', 'Borinquén, Barrio Turabo, Carr. Estatal # 52 Intersección con Carr. Estatal # 1, Caguas, PR 00725', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Caguas Sur'),
(152, 'Jessica Bermúdez', 16290, NULL, '787-694-2011', 'Carretera 174 Km. 22.4, Barrio Sonadora, Aguas Buenas, PR 00703', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Aguas Buenas'),
(153, 'José Rivera', 16361, NULL, '787-921-2500', 'Carr. 670 Intersección con Carr. 6668 Km. 1.0, Bo. Cotto Norte, Manatí, PR 00674', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Manatí, Econo'),
(154, 'Audie Alvarez', 16394, NULL, '787-986-5006', 'Carretera 116 Km. 2.3, Barrio Sabana Yeguas, Lajas, PR 00967', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Lajas'),
(155, 'Audie Alvarez', 16395, NULL, '787-987-2105', 'Carretera PR 385 Km. 0.6, Barrio Cuevas, Peñuelas, PR 00624', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Peñuelas'),
(156, 'Angel Delgado', 16958, NULL, '787-965-2010', 'Calle Casimar, Esq. PR-160, Salida 35, PR-22, Vega Baja, PR 00693', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Vega Baja Almirante (Blondet)'),
(157, 'Lizamaira Rodríguez', 16959, NULL, '787-280-2070', 'Carretera PR-129, Km. 8.4, Bo. Campo Alegre, Hatillo, PR 00659', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Hatillo Jové'),
(158, 'William González', 17102, NULL, '787-891-2424', 'Carretera #2, Km. 129.6, Barrio Victoria, Aguadilla, PR 00602', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Aguadilla Hattón'),
(159, 'Julio Vale', 17393, NULL, '787-265-7880', 'Calle Ramón Emeterio Betances #392 Sur, Mayaguez, PR 00680', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Mayagüez Post'),
(160, 'Rosvelyn Félix', 17679, NULL, '787-500-2985', 'Carretera PR 3 Km. 17.8, Plaza Canóvanas, Canóvanas PR 00729', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Canóvanas 20/20'),
(161, 'Damaris Flores', 17702, NULL, '787-680-2986', 'Carretera 1, Km. 89.5 Bo. Aguirre Salinas, PR  00751', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Salinas 20/20'),
(162, 'Lizamaira Rodríguez', 17705, NULL, '787-965-2986', 'Barceloneta Shopping Court, Carretera 140, Int. 2, Bo. Manatí Barcelonteta, PR  00617', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Barceloneta 20/20'),
(163, 'Angel Delgado', 17939, NULL, '787-965-2987', 'Carretera #2,  Km. 28.3, Bo. Espinosa Vega Alta, PR  00692', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Vega Alta Gel'),
(164, 'Milka Pérez', 18057, NULL, '787-961-7075', '172 Km. 0.5, Urbanización Villa del Rey, Caguas, PR  00725', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Caguas 172'),
(165, 'Damaris Flores', 18247, NULL, '787-271-7021', 'Carretera Estatal #3, Km. 130.2 Arroyo Town Center Lote E, Arroyo, PR  00714', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Arroyo'),
(166, 'Xiomara Labrador', 18571, NULL, '939-225-2040', 'PR-199 Int. PR 840, Royal Town, Bayamón, PR  ', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Royal Town Total'),
(167, 'Wilfredo Torres', 18572, NULL, '939-205-5618', 'Carretera PR-199 Ave.Las Cumbres Solar A Barrio Frailes Guaynabo, PR 00965', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Las Cumbres'),
(168, 'Lizamaira Rodríguez', 18863, NULL, '787-680-2901', 'Bo. Santana Carr. #2, Arecibo, PR  00612', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Arecibo Santana'),
(169, 'Joel Jácome', 18864, NULL, '787-709-4772', 'PR-132 Intersección PR-123 Bo. Cañas Urbano Ponce, PR 00731', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Ponce Villa'),
(170, 'Angel Delgado', 18866, NULL, '939-202-2840', 'Carretera Estatal #2, Km 22.4, Media Luna Ward, Toa Baja, PR  00949', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'La Virgencita'),
(171, 'Santiago Huezo', 19168, NULL, '939-205-5940', 'Centro Comercial San Patricio Plaza Ave. San Patricio Esq.Roosevelt Río Piedras, PR 00936', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'San Patricio F/C'),
(172, 'Luis Soto', 20702, NULL, '787-626-4401', 'Carretera Estatal PR#5 Esquina Calle 11 Cataño, PR 00962', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Cataño'),
(173, 'Angel Delgado', 21907, NULL, '787-665-7889', 'Salida 24, Exp. #22 en B.O. Maguayo, Dorado, PR. 00646', NULL, 0, NULL, '2019-07-26 02:39:28', 1, 0, 'Dorado 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_supervisor` int(11) NOT NULL,
  `productos` text COLLATE utf32_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estatus` int(11) NOT NULL DEFAULT '0' COMMENT '0 = activa, 1 = anulada',
  `descripcion` text COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_cliente`
--

CREATE TABLE `grupo_cliente` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf32_spanish_ci NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '0' COMMENT '1 = activo , 0 = inactivo',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modif` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `grupo_cliente`
--

INSERT INTO `grupo_cliente` (`id`, `nombre`, `estatus`, `fecha_creacion`, `fecha_modif`) VALUES
(1, 'Burger King', 0, '2019-07-10 02:37:29', '2019-07-10 03:25:52'),
(3, 'KFC', 0, '2019-08-01 16:35:23', '2019-08-01 16:35:23'),
(4, 'Taco Bell', 0, '2019-08-01 16:35:40', '2019-08-01 16:35:40'),
(5, 'Pizza Hut', 0, '2019-08-01 16:35:56', '2019-08-01 16:35:56'),
(6, 'Farmaceuticas', 0, '2019-08-01 16:36:41', '2019-08-01 16:36:41'),
(7, 'Hospitales', 0, '2019-08-01 16:36:55', '2019-08-01 16:36:55'),
(8, 'Hoteles', 0, '2019-08-01 16:37:05', '2019-08-01 16:37:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id` int(11) NOT NULL,
  `id_usuario` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'es el usuario que esta creando la incidencia',
  `id_cliente` int(11) NOT NULL,
  `id_tecnico` int(11) NOT NULL,
  `tipo_servicio` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_visita` date NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `asunto` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `prioridad` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'BAJA, NORMAL O ALTA, dependiendo de la circuntancia',
  `estatus` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'estatus general, PENDIENTE, ASIGNADO O TERMINADO',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modif` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fecha_resuelto` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hora_inicio` time NOT NULL COMMENT 'cuando el tecnico le de al boton iniciar trabajo se actualiza este campo ',
  `hora_fin` time NOT NULL,
  `estatus_incidencia` int(11) NOT NULL DEFAULT '0' COMMENT '0=Iniciar, 1=Proceso, 2=Terminado',
  `id_grupo` int(11) NOT NULL DEFAULT '0' COMMENT 'es el id del grupo familiar a quien pertenece la incidencia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id`, `id_usuario`, `id_cliente`, `id_tecnico`, `tipo_servicio`, `fecha_visita`, `direccion`, `asunto`, `descripcion`, `prioridad`, `estatus`, `fecha_creacion`, `fecha_modif`, `fecha_resuelto`, `hora_inicio`, `hora_fin`, `estatus_incidencia`, `id_grupo`) VALUES
(1, '1', 9, 327, 'recogido-de-liquido', '2019-08-24', 'Calle Luna # 54 (Pueblo), Condominio Apolo, Mayagüez, PR 00968', 'Prueba Erick', 'Probando', 'alta', 'cerrado', '2019-08-23 23:40:21', '2019-12-20 04:43:02', '2019-12-20 04:43:02', '17:29:21', '22:43:02', 2, 0),
(2, '1', 10, 327, 'plomeria', '2019-08-30', 'Calle Marginal KM 7, Carretera Estatal # 1, Barrio Machuelo Bajo, Urb. Valle Verde, Ponce, PR 00731', 'Prueba Plomeria', 'Plomeria', 'baja', 'asignado', '2019-08-27 13:31:11', '2019-12-19 03:02:17', '0000-00-00 00:00:00', '21:02:17', '00:00:00', 1, 0),
(4, '1', 3, 327, 'recogido-de-liquido', '2019-08-28', 'Ave. Roberto H. Todd, Santurce, PR 00925', 'Prueba Recogido de Liquido', 'Liquido', 'normal', 'cerrado', '2019-08-27 13:31:51', '2020-01-29 16:50:31', '2020-01-29 16:50:31', '20:14:55', '10:50:31', 2, 0),
(5, '1', 12, 61, 'limpieza-de-campana', '2019-08-29', '', 'Prueba Limpieza de Campana', 'Limpieza de Campanas', 'alta', 'asignado', '2019-08-27 13:33:07', '2019-12-18 22:53:21', '2019-08-27 14:17:35', '00:00:00', '00:00:00', 0, 0),
(6, '1', 1, 327, 'limpieza-de-campana', '2019-08-30', '', 'Prueba Limpieza 2', 'Prueba', 'normal', 'cerrado', '2019-08-27 14:16:16', '2020-01-29 16:53:23', '2020-01-29 16:53:23', '20:16:40', '10:53:23', 2, 0),
(7, '1', 14, 327, 'plomeria', '2019-08-31', 'Carretera Estatal # 2 Km. 14.7 Hato Tejas, Bayamón, PR 00961', 'Mantenimiento de campanas', 'mantenimiento a las campanas, tomar en consideracion el material a utilizar', 'normal', 'cerrado', '2019-08-27 14:31:49', '2020-02-04 23:30:50', '2020-02-04 23:30:50', '20:17:07', '17:30:50', 2, 0),
(8, '1', 3, 327, 'recogido-de-liquido', '2019-09-27', 'Ave. Roberto H. Todd, Santurce, PR 00925', 'Mantenimiento de grasa', 'mantenimiento&nbsp;', 'alta', 'cerrado', '2019-09-20 16:16:31', '2020-01-29 17:05:40', '2020-01-29 17:05:40', '10:56:30', '11:05:40', 2, 1),
(9, '1', 123, 327, 'limpieza-de-campana', '2019-09-30', 'Plaza Centro 3 Shopping FC, Ave Muñoz Marín, Carr. Estatal #30 Esquina Rafael Cordero,  Caguas, PR 00725 ', 'Recoger la basura del tanque 3.66', 'test2', 'alta', 'cerrado', '2019-09-20 18:06:53', '2019-12-20 04:02:00', '2019-12-20 04:02:00', '22:01:33', '22:02:00', 2, 1),
(10, '1', 14, 327, 'recogido-de-liquido', '2019-09-24', 'Carretera Estatal # 2 Km. 14.7 Hato Tejas, Bayamón, PR 00961', 'correa de tiempo', 'test 3', 'normal', 'cerrado', '2019-09-20 18:09:11', '2020-01-29 17:08:56', '2020-01-29 17:08:56', '21:45:38', '11:08:56', 2, 1),
(11, '1', 15, 327, 'recogido-de-liquido', '2020-09-30', 'Calle Rodríguez Serrá, Esquina Ave. Ashford, Condado, PR 00901', 'prueba 4', 'prueba 5', 'normal', 'cerrado', '2019-09-20 18:18:14', '2020-01-29 17:12:47', '2020-01-29 17:12:47', '10:13:25', '11:12:47', 2, 1),
(12, '1', 113, 327, 'plomeria', '2019-10-02', 'Plaza Carolina Mall (primer nivel) Ave. Fragoso, Villa Fontana, Carolina, PR 00729', 'tuberia de la cocina', 'llevar material&nbsp;', 'baja', 'asignado', '2019-09-20 18:19:18', '2020-01-29 16:25:56', '0000-00-00 00:00:00', '10:25:56', '00:00:00', 1, 1),
(13, '1', 13, 327, 'limpieza-de-campana', '2019-09-25', 'Calle México, Esquina Carretera # 833 Parkville, Guaynabo, PR 00955', 'Limpieza de grasa y cocina', 'Limpiar', 'normal', 'cerrado', '2019-09-20 18:24:12', '2020-01-29 17:45:05', '2020-01-29 17:45:05', '10:31:59', '11:45:05', 2, 1),
(14, '1', 71, 327, 'plomeria', '2019-09-23', 'Ctro. Comercial Plaza Noroeste, Carr.  Estatal # 3 Km. 20.5 Villas de Loíza, Loíza, PR 00795', 'Cambiar tubos de una pulgada', 'Cambiar tubos&nbsp;', 'normal', 'asignado', '2019-09-20 18:25:37', '2020-01-29 16:58:33', '2019-11-26 14:55:24', '10:58:33', '00:00:00', 1, 1),
(15, '1', 15, 327, 'recogido-de-liquido', '2019-09-25', 'Calle Rodríguez Serrá, Esquina Ave. Ashford, Condado, PR 00901', 'cambio de bateria fria', 'Prueba 22', 'alta', 'cerrado', '2019-09-20 18:46:16', '2020-01-29 18:26:03', '2020-01-29 18:26:03', '11:58:03', '12:26:03', 2, 1),
(16, '1', 19, 328, 'limpieza-de-campana', '2019-10-01', 'El Señorial Shopping Center, Esquina Paraná, Cupey, San Juan, PR 00925', 'limpieza con quita grasa para la cocina ', 'Pendiente por ejecutar la limpieza completa', 'alta', 'asignado', '2019-09-30 15:36:26', '2019-12-18 22:53:42', '2019-09-30 20:20:11', '00:00:00', '00:00:00', 0, 1),
(17, '1', 10, 328, 'plomeria', '2019-10-09', 'Calle Marginal KM 7, Carretera Estatal # 1, Barrio Machuelo Bajo, Urb. Valle Verde, Ponce, PR 00731', 'Cambiar codos de 45', 'Cambiar toda la tubería de codos de 45', 'normal', 'asignado', '2019-09-30 15:37:36', '2019-12-18 22:53:47', '0000-00-00 00:00:00', '00:00:00', '00:00:00', 0, 1),
(18, '1', 7, 327, 'recogido-de-liquido', '2019-11-28', '', 'Prueba ', 'Probando', 'normal', 'asignado', '2019-11-28 01:39:01', '2020-01-31 02:29:28', '2020-01-30 18:11:18', '20:29:28', '12:11:18', 1, 1),
(19, '1', 1, 327, 'limpieza-de-campana', '2019-12-19', 'Ave. 65 Infantería, Km. 7 Hm. 3, Río Piedras, PR 00924', 'mantenimiento campana', 'Esto es una prueba <br>', 'alta', 'cerrado', '2019-12-18 23:03:29', '2020-02-01 02:20:54', '2020-02-01 02:20:54', '20:16:22', '20:20:54', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias_fotos`
--

CREATE TABLE `incidencias_fotos` (
  `id` int(11) NOT NULL,
  `id_incidencia` int(11) NOT NULL,
  `img_url` text COLLATE utf32_spanish_ci,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nombre` text COLLATE utf32_spanish_ci,
  `tipo` text COLLATE utf32_spanish_ci,
  `tamano` text COLLATE utf32_spanish_ci,
  `extension` text COLLATE utf32_spanish_ci,
  `titulo` text COLLATE utf32_spanish_ci,
  `momento` text COLLATE utf32_spanish_ci COMMENT 'se debe realizar la carga de fotos antes de comenzar y despues de terminar el trabajo se carga otras fotos'
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `incidencias_fotos`
--

INSERT INTO `incidencias_fotos` (`id`, `id_incidencia`, `img_url`, `fecha_creacion`, `nombre`, `tipo`, `tamano`, `extension`, `titulo`, `momento`) VALUES
(1, 7, 'vistas/img/archivos/1_20190827093607_EXqK18dry7JVzgD_mve2.jpg', '2019-08-27 14:36:07', '1_20190827093607_EXqK18dry7JVzgD_mve2.jpg', 'image/jpeg', '24298', 'jpg', '1_20190827093607_EXqK18dry7JVzgD_mve2', 'archivo'),
(2, 8, 'vistas/img/archivos/1_20190920111849_giy6zaUp5AGQdVcZNj8S.jpg', '2019-09-20 16:18:49', '1_20190920111849_giy6zaUp5AGQdVcZNj8S.jpg', 'image/jpeg', '99654', 'jpg', '1_20190920111849_giy6zaUp5AGQdVcZNj8S', 'archivo'),
(3, 16, 'vistas/img/incidencias/328_16_Gpcrfm_X5HgSWvJRMaCo.jpg', '2019-09-30 19:32:19', '328_16_Gpcrfm_X5HgSWvJRMaCo.jpg', 'image/jpeg', '173194', 'jpg', '328_16_Gpcrfm_X5HgSWvJRMaCo', 'antes'),
(4, 16, 'vistas/img/incidencias/328_16_mUKGhqAPO_7NR6B4ldIQ.jpg', '2019-09-30 19:32:19', '328_16_mUKGhqAPO_7NR6B4ldIQ.jpg', 'image/jpeg', '16049', 'jpg', '328_16_mUKGhqAPO_7NR6B4ldIQ', 'antes'),
(5, 16, 'vistas/img/incidencias/328_16_MmnUJYFaDwOzsoiEtqxX.jpg', '2019-09-30 19:32:20', '328_16_MmnUJYFaDwOzsoiEtqxX.jpg', 'image/jpeg', '173194', 'jpg', '328_16_MmnUJYFaDwOzsoiEtqxX', 'despues'),
(6, 1, 'vistas/img/archivos/1_20190930150928_GD_dAmFrtQwKuPBN04Rg.jpg', '2019-09-30 20:09:28', '1_20190930150928_GD_dAmFrtQwKuPBN04Rg.jpg', 'image/jpeg', '4361', 'jpg', '1_20190930150928_GD_dAmFrtQwKuPBN04Rg', 'archivo'),
(7, 1, 'vistas/img/archivos/1_20190930150928_2cDGFP9zvqmfV_3eKung.jpg', '2019-09-30 20:09:28', '1_20190930150928_2cDGFP9zvqmfV_3eKung.jpg', 'image/jpeg', '11375', 'jpg', '1_20190930150928_2cDGFP9zvqmfV_3eKung', 'archivo'),
(41, 8, 'vistas/img/incidencias/327_8_SmV3Bb6zfvpCnlw9UhEa.jpg', '2019-12-18 21:38:13', '327_8_SmV3Bb6zfvpCnlw9UhEa.jpg', 'image/jpg', '20264', 'jpg', '327_8_SmV3Bb6zfvpCnlw9UhEa', 'antes'),
(42, 8, 'vistas/img/incidencias/327_8_MgcFBY8ACDtVNfqpo9Wb.jpg', '2019-12-18 21:43:41', '327_8_MgcFBY8ACDtVNfqpo9Wb.jpg', 'image/jpg', '16373', 'jpg', '327_8_MgcFBY8ACDtVNfqpo9Wb', 'despues'),
(45, 1, 'vistas/img/incidencias/327_1_ZqazRply5b3gKncBsVk_.jpg', '2019-12-18 23:29:21', '327_1_ZqazRply5b3gKncBsVk_.jpg', 'image/jpg', '145239', 'jpg', '327_1_ZqazRply5b3gKncBsVk_', 'antes'),
(46, 2, 'vistas/img/incidencias/327_2_FkwhD1v9HbplEyoIgdKC.jpg', '2019-12-19 03:02:17', '327_2_FkwhD1v9HbplEyoIgdKC.jpg', 'image/jpg', '20548', 'jpg', '327_2_FkwhD1v9HbplEyoIgdKC', 'antes'),
(47, 4, 'vistas/img/incidencias/327_4_sImVX4KzODqyvBGCiS15.jpg', '2019-12-20 02:14:55', '327_4_sImVX4KzODqyvBGCiS15.jpg', 'image/jpg', '145239', 'jpg', '327_4_sImVX4KzODqyvBGCiS15', 'antes'),
(48, 6, 'vistas/img/incidencias/327_6_PQDLb0lhZ3Fx5UoM2nyJ.jpg', '2019-12-20 02:16:40', '327_6_PQDLb0lhZ3Fx5UoM2nyJ.jpg', 'image/jpg', '16373', 'jpg', '327_6_PQDLb0lhZ3Fx5UoM2nyJ', 'antes'),
(49, 7, 'vistas/img/incidencias/327_7_etRS64NVnsyOQ8B3Fwfx.jpg', '2019-12-20 02:17:07', '327_7_etRS64NVnsyOQ8B3Fwfx.jpg', 'image/jpg', '14146', 'jpg', '327_7_etRS64NVnsyOQ8B3Fwfx', 'antes'),
(52, 10, 'vistas/img/incidencias/327_10_P7rOfZJCTGmVFgMe1nXA.jpg', '2019-12-20 03:45:38', '327_10_P7rOfZJCTGmVFgMe1nXA.jpg', 'image/jpg', '12803', 'jpg', '327_10_P7rOfZJCTGmVFgMe1nXA', 'antes'),
(53, 9, 'vistas/img/incidencias/327_9_dbXqpaT1Y82gLIntyzeA.jpg', '2019-12-20 04:01:33', '327_9_dbXqpaT1Y82gLIntyzeA.jpg', 'image/jpg', '15270', 'jpg', '327_9_dbXqpaT1Y82gLIntyzeA', 'antes'),
(54, 9, 'vistas/img/incidencias/327_9_NVuytRIvCHGg3Qj89Y5E.jpg', '2019-12-20 04:02:00', '327_9_NVuytRIvCHGg3Qj89Y5E.jpg', 'image/jpg', '18524', 'jpg', '327_9_NVuytRIvCHGg3Qj89Y5E', 'despues'),
(55, 10, 'vistas/img/incidencias/327_10_OcZJfBurjgT6wzIFLUtl.jpg', '2019-12-20 04:08:34', '327_10_OcZJfBurjgT6wzIFLUtl.jpg', 'image/jpg', '15601', 'jpg', '327_10_OcZJfBurjgT6wzIFLUtl', 'despues'),
(56, 1, 'vistas/img/incidencias/327_1_glJscbqntiT1vIBzC7Rx.jpg', '2019-12-20 04:14:36', '327_1_glJscbqntiT1vIBzC7Rx.jpg', 'image/jpg', '16373', 'jpg', '327_1_glJscbqntiT1vIBzC7Rx', 'despues'),
(57, 2, 'vistas/img/incidencias/327_2_X6Ulwgzhr5m3ORHTbDQj.jpg', '2019-12-20 04:57:40', '327_2_X6Ulwgzhr5m3ORHTbDQj.jpg', 'image/jpg', '112212', 'jpg', '327_2_X6Ulwgzhr5m3ORHTbDQj', 'despues'),
(58, 4, 'vistas/img/incidencias/327_4_GxDnb4YlEa6pk7VmrcfZ.jpg', '2019-12-20 05:01:48', '327_4_GxDnb4YlEa6pk7VmrcfZ.jpg', 'image/jpg', '10588', 'jpg', '327_4_GxDnb4YlEa6pk7VmrcfZ', 'despues'),
(59, 6, 'vistas/img/incidencias/327_6_IYe2MXKfnhp6xWH_CSm0.jpg', '2020-01-28 00:54:45', '327_6_IYe2MXKfnhp6xWH_CSm0.jpg', 'image/jpg', '200874', 'jpg', '327_6_IYe2MXKfnhp6xWH_CSm0', 'despues'),
(60, 11, 'vistas/img/incidencias/327_11_SqWh3lvUzP9m8JgfaYu6.jpg', '2020-01-29 16:13:25', '327_11_SqWh3lvUzP9m8JgfaYu6.jpg', 'image/jpg', '29535', 'jpg', '327_11_SqWh3lvUzP9m8JgfaYu6', 'antes'),
(61, 11, 'vistas/img/incidencias/327_11_uBG4glA89sW_TrzRandE.jpg', '2020-01-29 16:20:55', '327_11_uBG4glA89sW_TrzRandE.jpg', 'image/jpg', '79583', 'jpg', '327_11_uBG4glA89sW_TrzRandE', 'despues'),
(62, 12, 'vistas/img/incidencias/327_12_tmKMag1sEdwHBc9Dil38.jpg', '2020-01-29 16:25:56', '327_12_tmKMag1sEdwHBc9Dil38.jpg', 'image/jpg', '27006', 'jpg', '327_12_tmKMag1sEdwHBc9Dil38', 'antes'),
(63, 13, 'vistas/img/incidencias/327_13_NuFlODbmxjdhBr4396Eo.jpg', '2020-01-29 16:31:59', '327_13_NuFlODbmxjdhBr4396Eo.jpg', 'image/jpg', '33429', 'jpg', '327_13_NuFlODbmxjdhBr4396Eo', 'antes'),
(64, 13, 'vistas/img/incidencias/327_13_yuAw_TzK45CPWnOgNcB7.jpg', '2020-01-29 16:35:59', '327_13_yuAw_TzK45CPWnOgNcB7.jpg', 'image/jpg', '31495', 'jpg', '327_13_yuAw_TzK45CPWnOgNcB7', 'despues'),
(65, 14, 'vistas/img/incidencias/327_14_fOysxgzbAwtV1M5HTa_X.jpg', '2020-01-29 16:58:33', '327_14_fOysxgzbAwtV1M5HTa_X.jpg', 'image/jpg', '26703', 'jpg', '327_14_fOysxgzbAwtV1M5HTa_X', 'antes'),
(66, 12, 'vistas/img/incidencias/327_12_vqKk2fxV_pDFOwRXTimr.jpg', '2020-01-29 17:17:25', '327_12_vqKk2fxV_pDFOwRXTimr.jpg', 'image/jpg', '67350', 'jpg', '327_12_vqKk2fxV_pDFOwRXTimr', 'despues'),
(67, 15, 'vistas/img/incidencias/327_15_7qOYgcoAlPwjDpNy58KL.jpg', '2020-01-29 17:58:03', '327_15_7qOYgcoAlPwjDpNy58KL.jpg', 'image/jpg', '67350', 'jpg', '327_15_7qOYgcoAlPwjDpNy58KL', 'antes'),
(68, 15, 'vistas/img/incidencias/327_15_AN5Q_cdIX9foF1agsRCn.jpg', '2020-01-29 18:24:15', '327_15_AN5Q_cdIX9foF1agsRCn.jpg', 'image/jpg', '33429', 'jpg', '327_15_AN5Q_cdIX9foF1agsRCn', 'despues'),
(90, 18, 'vistas/img/incidencias/327_18_VQ9T5pBJ4Ud_jwFOocYv.jpg', '2020-01-31 02:29:28', '327_18_VQ9T5pBJ4Ud_jwFOocYv.jpg', 'image/jpg', '126171', 'jpg', '327_18_VQ9T5pBJ4Ud_jwFOocYv', 'antes'),
(91, 18, 'vistas/img/incidencias/327_18_fPbRok34V0XeThmK6t1D.jpg', '2020-01-31 02:29:28', '327_18_fPbRok34V0XeThmK6t1D.jpg', 'image/jpg', '516752', 'jpg', '327_18_fPbRok34V0XeThmK6t1D', 'antes'),
(92, 19, 'vistas/img/incidencias/327_19_aXwMHBYgN97dRne_AbFr.jpg', '2020-02-01 02:16:22', '327_19_aXwMHBYgN97dRne_AbFr.jpg', 'image/jpeg', '264838', 'jpg', '327_19_aXwMHBYgN97dRne_AbFr', 'antes'),
(93, 19, 'vistas/img/incidencias/327_19_NZhHXnrAR9Cit3Ml0Be1.png', '2020-02-01 02:16:49', '327_19_NZhHXnrAR9Cit3Ml0Be1.png', 'image/png', '370317', 'png', '327_19_NZhHXnrAR9Cit3Ml0Be1', 'despues');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_inventario`
--

CREATE TABLE `movimiento_inventario` (
  `id` int(11) NOT NULL,
  `id_incidencia` int(11) NOT NULL DEFAULT '0' COMMENT 'solo aplica cuando es una salida del inventario , del resto debe ser cero ',
  `id_compra` int(11) NOT NULL DEFAULT '0',
  `id_producto` text COLLATE utf32_spanish_ci NOT NULL,
  `tipo` text COLLATE utf32_spanish_ci NOT NULL COMMENT 'si es entrada o salida',
  `cantidad` int(11) NOT NULL,
  `id_almacen` text COLLATE utf32_spanish_ci NOT NULL COMMENT 'almacenes, pero la principal ppal',
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modif` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `tipo` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'si es servicio o venta',
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `ventas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `tipo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `fecha`) VALUES
(1, 1, '101', 'venta', 'Aspiradora Industrial ', 'vistas/img/productos/101/105.png', 13, 1000, 1200, 2, '2019-04-12 17:37:51'),
(2, 1, '102', 'venta', 'Plato Flotante para Allanadora', 'vistas/img/productos/102/940.jpg', 6, 4500, 6300, 3, '2019-04-12 17:37:51'),
(3, 1, '103', 'venta', 'Compresor de Aire para pintura', 'vistas/img/productos/103/763.jpg', 8, 3000, 4200, 12, '2019-04-12 17:37:51'),
(4, 1, '104', 'venta', 'Cortadora de Adobe sin Disco ', 'vistas/img/productos/104/957.jpg', 16, 4000, 5600, 4, '2019-04-12 17:37:51'),
(5, 1, '105', 'venta', 'Cortadora de Piso sin Disco ', 'vistas/img/productos/105/630.jpg', 13, 1540, 2156, 7, '2019-04-12 17:37:51'),
(6, 1, '106', 'venta', 'Disco Punta Diamante ', 'vistas/img/productos/106/635.jpg', 15, 1100, 1540, 5, '2019-04-12 17:37:51'),
(7, 1, '107', 'venta', 'Extractor de Aire ', 'vistas/img/productos/107/848.jpg', 12, 1540, 2156, 8, '2019-04-12 17:37:51'),
(8, 1, '108', 'venta', 'Guadañadora ', 'vistas/img/productos/108/163.jpg', 13, 1540, 2156, 7, '2019-04-12 17:37:51'),
(9, 1, '109', 'venta', 'Hidrolavadora Eléctrica ', 'vistas/img/productos/109/769.jpg', 15, 2600, 3640, 5, '2019-04-12 17:37:51'),
(10, 1, '110', 'venta', 'Hidrolavadora Gasolina', 'vistas/img/productos/110/582.jpg', 18, 2210, 3094, 2, '2019-04-12 17:37:51'),
(11, 1, '111', 'venta', 'Motobomba a Gasolina', 'vistas/img/productos/default/anonymous.png', 20, 2860, 4004, 0, '2019-04-12 17:37:51'),
(12, 1, '112', 'venta', 'Motobomba El?ctrica', 'vistas/img/productos/default/anonymous.png', 20, 2400, 3360, 0, '2019-04-12 17:37:51'),
(13, 1, '113', 'venta', 'Sierra Circular ', 'vistas/img/productos/default/anonymous.png', 20, 1100, 1540, 0, '2019-04-12 17:37:51'),
(14, 1, '114', 'venta', 'Disco de tugsteno para Sierra circular', 'vistas/img/productos/default/anonymous.png', 20, 4500, 6300, 0, '2019-04-12 17:37:51'),
(15, 1, '115', 'venta', 'Soldador Electrico ', 'vistas/img/productos/default/anonymous.png', 20, 1980, 2772, 0, '2019-04-12 17:37:51'),
(16, 1, '116', 'venta', 'Careta para Soldador', 'vistas/img/productos/default/anonymous.png', 20, 4200, 5880, 0, '2019-04-12 17:37:51'),
(17, 1, '117', 'venta', 'Torre de iluminacion ', 'vistas/img/productos/default/anonymous.png', 20, 1800, 2520, 0, '2019-04-12 17:37:51'),
(18, 2, '201', 'venta', 'Martillo Demoledor de Piso 110V', 'vistas/img/productos/default/anonymous.png', 20, 5600, 7840, 0, '2019-04-12 17:37:51'),
(19, 2, '202', 'venta', 'Muela o cincel martillo demoledor piso', 'vistas/img/productos/default/anonymous.png', 20, 9600, 13440, 0, '2019-04-12 17:37:51'),
(20, 2, '203', 'venta', 'Taladro Demoledor de muro 110V', 'vistas/img/productos/default/anonymous.png', 17, 3850, 5390, 3, '2019-04-12 17:37:51'),
(21, 2, '204', 'venta', 'Muela o cincel martillo demoledor muro', 'vistas/img/productos/default/anonymous.png', 20, 9600, 13440, 0, '2019-04-12 17:37:51'),
(22, 2, '205', 'venta', 'Taladro Percutor de 1/2 Madera y Metal', 'vistas/img/productos/default/anonymous.png', 20, 8000, 11200, 0, '2019-04-12 17:37:51'),
(23, 2, '206', 'venta', 'Taladro Percutor SDS Plus 110V', 'vistas/img/productos/default/anonymous.png', 20, 3900, 5460, 0, '2019-04-12 17:37:51'),
(24, 2, '207', 'venta', 'Taladro Percutor SDS Max 110V (Mineria)', 'vistas/img/productos/default/anonymous.png', 20, 4600, 6440, 0, '2019-04-12 17:37:51'),
(25, 3, '301', 'venta', 'Andamio colgante', 'vistas/img/productos/default/anonymous.png', 20, 1440, 2016, 0, '2019-04-12 17:37:51'),
(26, 3, '302', 'venta', 'Distanciador andamio colgante', 'vistas/img/productos/default/anonymous.png', 20, 1600, 2240, 0, '2019-04-12 17:37:51'),
(27, 3, '303', 'venta', 'Marco andamio modular ', 'vistas/img/productos/default/anonymous.png', 20, 900, 1260, 0, '2019-04-12 17:37:51'),
(28, 3, '304', 'venta', 'Marco andamio tijera', 'vistas/img/productos/default/anonymous.png', 20, 100, 140, 0, '2019-04-12 17:37:51'),
(29, 3, '305', 'venta', 'Tijera para andamio', 'vistas/img/productos/default/anonymous.png', 20, 162, 226, 0, '2019-04-12 17:37:51'),
(30, 3, '306', 'venta', 'Escalera interna para andamio', 'vistas/img/productos/default/anonymous.png', 20, 270, 378, 0, '2019-04-12 17:37:51'),
(31, 3, '307', 'venta', 'Pasamanos de seguridad', 'vistas/img/productos/default/anonymous.png', 20, 75, 105, 0, '2019-04-12 17:37:51'),
(32, 3, '308', 'venta', 'Rueda giratoria para andamio', 'vistas/img/productos/default/anonymous.png', 20, 168, 235, 0, '2019-04-12 17:37:51'),
(33, 3, '309', 'venta', 'Arnes de seguridad', 'vistas/img/productos/default/anonymous.png', 20, 1750, 2450, 0, '2019-04-12 17:37:51'),
(34, 3, '310', 'venta', 'Eslinga para arnes', 'vistas/img/productos/default/anonymous.png', 20, 175, 245, 0, '2019-04-12 17:37:51'),
(35, 3, '311', 'venta', 'Plataforma Met?lica', 'vistas/img/productos/default/anonymous.png', 20, 420, 588, 0, '2019-04-12 17:37:51'),
(36, 4, '401', 'venta', 'Planta Electrica Diesel 6 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3500, 4900, 0, '2019-04-12 17:37:51'),
(37, 4, '402', 'venta', 'Planta Electrica Diesel 10 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3550, 4970, 0, '2019-04-12 17:37:51'),
(38, 4, '403', 'venta', 'Planta Electrica Diesel 20 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3600, 5040, 0, '2019-04-12 17:37:51'),
(39, 4, '404', 'venta', 'Planta Electrica Diesel 30 Kva', 'vistas/img/productos/default/anonymous.png', 19, 3650, 5110, 1, '2019-04-12 17:37:51'),
(40, 4, '405', 'venta', 'Planta Electrica Diesel 60 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3700, 5180, 0, '2019-04-12 17:37:51'),
(41, 4, '406', 'venta', 'Planta Electrica Diesel 75 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3750, 5250, 0, '2019-04-12 17:37:51'),
(42, 4, '407', 'venta', 'Planta Electrica Diesel 100 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3800, 5320, 0, '2019-04-12 17:37:51'),
(43, 4, '408', 'venta', 'Planta Electrica Diesel 120 Kva', 'vistas/img/productos/default/anonymous.png', 20, 3850, 5390, 0, '2019-04-12 17:37:51'),
(44, 5, '501', 'venta', 'Escalera de Tijera Aluminio ', 'vistas/img/productos/default/anonymous.png', 20, 350, 490, 0, '2019-04-12 17:37:51'),
(45, 5, '502', 'venta', 'Extension Electrica ', 'vistas/img/productos/default/anonymous.png', 20, 370, 518, 0, '2019-04-12 17:37:51'),
(46, 5, '503', 'venta', 'Gato tensor', 'vistas/img/productos/default/anonymous.png', 20, 380, 532, 0, '2019-04-12 17:37:51'),
(47, 5, '504', 'venta', 'Lamina Cubre Brecha ', 'vistas/img/productos/default/anonymous.png', 20, 380, 532, 0, '2019-04-12 17:37:51'),
(48, 5, '505', 'venta', 'Llave de Tubo', 'vistas/img/productos/default/anonymous.png', 20, 480, 672, 0, '2019-04-12 17:37:51'),
(49, 5, '506', 'venta', 'Manila por Metro', 'vistas/img/productos/default/anonymous.png', 20, 600, 840, 0, '2019-04-12 17:37:51'),
(50, 5, '507', 'venta', 'Polea 2 canales', 'vistas/img/productos/default/anonymous.png', 20, 900, 1260, 0, '2019-04-12 17:37:51'),
(51, 5, '508', 'venta', 'Tensor', 'vistas/img/productos/508/500.jpg', 18, 100, 140, 2, '2019-06-10 20:17:15'),
(52, 5, '509', 'venta', 'Bascula ', 'vistas/img/productos/509/878.jpg', 12, 130, 182, 8, '2019-04-12 17:37:51'),
(53, 5, '510', 'venta', 'Bomba Hidrostatica', 'vistas/img/productos/510/870.jpg', 8, 770, 1078, 12, '2019-04-12 17:37:51'),
(54, 5, '511', 'venta', 'Chapeta', 'vistas/img/productos/511/239.jpg', 15, 660, 924, 5, '2019-06-10 20:09:34'),
(55, 5, '512', 'venta', 'Cilindro muestra de concreto', 'vistas/img/productos/512/266.jpg', 16, 400, 560, 4, '2019-04-12 17:37:51'),
(56, 5, '513', 'venta', 'Cizalla de Palanca', 'vistas/img/productos/513/445.jpg', 10, 450, 630, 17, '2019-04-12 17:37:51'),
(57, 5, '514', 'venta', 'Cizalla de Tijera', 'vistas/img/productos/514/249.jpg', 20, 580, 812, 13, '2019-04-12 17:37:51'),
(58, 5, '515', 'venta', 'Coche llanta neumatica', 'vistas/img/productos/515/174.jpg', 17, 420, 588, 3, '2019-04-12 17:37:51'),
(59, 5, '516', 'venta', 'Cono slump', 'vistas/img/productos/516/228.jpg', 20, 140, 196, 4, '2019-06-19 17:42:10'),
(60, 2, '517', 'servicio', 'Cortadora de Baldosin', 'vistas/img/productos/517/746.jpg', 6, 930, 1302, 6, '2019-06-19 17:42:10'),
(61, 7, '701', 'venta', 'celular blu', 'vistas/img/productos/701/730.jpg', 1482, 0, 0, 2, '2019-06-19 14:36:09'),
(62, 7, '702', 'venta', 'Instalacion de software', 'vistas/img/productos/702/831.jpg', 20, 0, 0, 0, '2019-06-19 17:42:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf32_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `email` text COLLATE utf32_spanish_ci NOT NULL,
  `telefono` text COLLATE utf32_spanish_ci NOT NULL,
  `direccion` text COLLATE utf32_spanish_ci NOT NULL,
  `ordenes` int(11) NOT NULL COMMENT 'numero de ordenes generada',
  `ultima_orden` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_general`
--

CREATE TABLE `servicio_general` (
  `id` int(11) NOT NULL,
  `id_incidencia` int(11) NOT NULL,
  `vaciado` text COLLATE utf32_spanish_ci NOT NULL,
  `vaciado_parcial` text COLLATE utf32_spanish_ci NOT NULL,
  `otros` text COLLATE utf32_spanish_ci NOT NULL,
  `limpeza_regular` text COLLATE utf32_spanish_ci NOT NULL,
  `inspeccion` text COLLATE utf32_spanish_ci NOT NULL,
  `interceptor_aceite` text COLLATE utf32_spanish_ci NOT NULL,
  `tanque_almacenamiento` text COLLATE utf32_spanish_ci NOT NULL,
  `pozo_septico` text COLLATE utf32_spanish_ci NOT NULL,
  `estacion_bombas` text COLLATE utf32_spanish_ci NOT NULL,
  `tanque_recibidor` text COLLATE utf32_spanish_ci NOT NULL,
  `tanque_aceites` text COLLATE utf32_spanish_ci NOT NULL,
  `otros1` text COLLATE utf32_spanish_ci NOT NULL,
  `interior` text COLLATE utf32_spanish_ci NOT NULL,
  `exterior` text COLLATE utf32_spanish_ci NOT NULL,
  `interior_exterior` text COLLATE utf32_spanish_ci NOT NULL,
  `limpieza_derrame_liquido` text COLLATE utf32_spanish_ci NOT NULL,
  `limpieza_manhole` text COLLATE utf32_spanish_ci NOT NULL,
  `limpieza_lift_station` text COLLATE utf32_spanish_ci NOT NULL,
  `limpieza_tuberias` text COLLATE utf32_spanish_ci NOT NULL,
  `limpieza_tuberias_num` text COLLATE utf32_spanish_ci NOT NULL,
  `limpieza_registros_desagues` text COLLATE utf32_spanish_ci NOT NULL,
  `limpieza_registros_num` text COLLATE utf32_spanish_ci NOT NULL,
  `limpieza_desagues_num` text COLLATE utf32_spanish_ci NOT NULL,
  `remocion_acarreo` text COLLATE utf32_spanish_ci NOT NULL,
  `remocion_grasas` text COLLATE utf32_spanish_ci NOT NULL,
  `otros2` text COLLATE utf32_spanish_ci NOT NULL,
  `vacuum` text COLLATE utf32_spanish_ci NOT NULL,
  `vacuumNum` text COLLATE utf32_spanish_ci NOT NULL,
  `vacuum_portable` text COLLATE utf32_spanish_ci NOT NULL,
  `water_jetter` text COLLATE utf32_spanish_ci NOT NULL,
  `tanktruck` text COLLATE utf32_spanish_ci NOT NULL,
  `otros3` text COLLATE utf32_spanish_ci NOT NULL,
  `coverAll` text COLLATE utf32_spanish_ci NOT NULL,
  `guantes` text COLLATE utf32_spanish_ci NOT NULL,
  `capacete` text COLLATE utf32_spanish_ci NOT NULL,
  `equipo_espacio_confinado` text COLLATE utf32_spanish_ci NOT NULL,
  `otros5` text COLLATE utf32_spanish_ci NOT NULL,
  `comentario` text COLLATE utf32_spanish_ci NOT NULL,
  `desechos_liquidos` text COLLATE utf32_spanish_ci NOT NULL,
  `aguas_residuales` text COLLATE utf32_spanish_ci NOT NULL,
  `aceites_vegetales` text COLLATE utf32_spanish_ci NOT NULL,
  `otros4` text COLLATE utf32_spanish_ci NOT NULL,
  `total_desperciado` text COLLATE utf32_spanish_ci NOT NULL,
  `tecnico_adicional` text COLLATE utf32_spanish_ci NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time NOT NULL,
  `fecha_visita` date NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modif` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estatus` int(11) NOT NULL DEFAULT '0' COMMENT '0 = activo , 1 = anulado',
  `planta_tratamiento` text COLLATE utf32_spanish_ci NOT NULL,
  `otra_facilidad` text COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `servicio_general`
--

INSERT INTO `servicio_general` (`id`, `id_incidencia`, `vaciado`, `vaciado_parcial`, `otros`, `limpeza_regular`, `inspeccion`, `interceptor_aceite`, `tanque_almacenamiento`, `pozo_septico`, `estacion_bombas`, `tanque_recibidor`, `tanque_aceites`, `otros1`, `interior`, `exterior`, `interior_exterior`, `limpieza_derrame_liquido`, `limpieza_manhole`, `limpieza_lift_station`, `limpieza_tuberias`, `limpieza_tuberias_num`, `limpieza_registros_desagues`, `limpieza_registros_num`, `limpieza_desagues_num`, `remocion_acarreo`, `remocion_grasas`, `otros2`, `vacuum`, `vacuumNum`, `vacuum_portable`, `water_jetter`, `tanktruck`, `otros3`, `coverAll`, `guantes`, `capacete`, `equipo_espacio_confinado`, `otros5`, `comentario`, `desechos_liquidos`, `aguas_residuales`, `aceites_vegetales`, `otros4`, `total_desperciado`, `tecnico_adicional`, `hora_entrada`, `hora_salida`, `fecha_visita`, `fecha_creacion`, `fecha_modif`, `estatus`, `planta_tratamiento`, `otra_facilidad`) VALUES
(1, 5, 'on', 'on', '', '', '', '', 'on', '', '', 'on', '', '', '', '', '', '', '', 'on', 'off', '', '', '', '', '', '', 'on', 'on', '99', '', '', '', '', '', '', 'on', '', '', 'Test', 'on', '', '', '', '', '2', '09:17:21', '09:17:36', '0000-00-00', '2019-08-27 14:18:28', '2019-08-27 14:18:28', 0, '', ''),
(2, 16, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'off', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '13:07:05', '15:20:12', '0000-00-00', '2019-09-30 20:20:24', '2019-09-30 20:20:24', 0, '', ''),
(9, 4, 'on', 'on', 'on', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '20:14:55', '12:49:54', '0000-00-00', '2020-01-29 16:50:31', '2020-01-29 16:50:31', 0, 'on', 'on'),
(10, 6, 'on', 'on', 'on', 'on', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '20:16:40', '12:53:08', '0000-00-00', '2020-01-29 16:53:23', '2020-01-29 16:53:23', 0, 'on', ''),
(11, 8, 'on', 'on', 'on', 'on', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '10:56:30', '13:03:52', '0000-00-00', '2020-01-29 17:05:40', '2020-01-29 17:05:40', 0, '', ''),
(12, 10, '', '', '', '', '', 'on', 'on', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '21:45:38', '13:08:42', '0000-00-00', '2020-01-29 17:08:56', '2020-01-29 17:08:56', 0, '', ''),
(13, 11, '', '', 'on', 'on', 'on', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '10:13:25', '13:12:03', '0000-00-00', '2020-01-29 17:12:46', '2020-01-29 17:12:46', 0, '', ''),
(14, 13, '', 'on', 'on', 'on', '', '', '', '', 'on', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '10:31:59', '13:44:50', '0000-00-00', '2020-01-29 17:45:05', '2020-01-29 17:45:05', 0, '', ''),
(15, 15, '', '', '', '', '', 'on', 'on', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '11:58:03', '14:25:10', '0000-00-00', '2020-01-29 18:26:03', '2020-01-29 18:26:03', 0, '', ''),
(16, 19, '', 'on', 'on', 'on', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'on', 'on', '', '', '17:05:25', '14:29:09', '0000-00-00', '2020-01-29 18:29:51', '2020-02-01 02:20:54', 0, 'on', 'on'),
(17, 18, '', 'on', 'on', 'on', '', '', 'on', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '20:25:49', '02:34:20', '0000-00-00', '2020-01-30 02:31:11', '2020-01-30 18:11:18', 0, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_plomeria`
--

CREATE TABLE `servicio_plomeria` (
  `id` int(11) NOT NULL,
  `id_incidencia` int(11) NOT NULL,
  `destape` text COLLATE utf32_spanish_ci NOT NULL,
  `reparacion` text COLLATE utf32_spanish_ci NOT NULL,
  `otros` text COLLATE utf32_spanish_ci NOT NULL,
  `instalacion` text COLLATE utf32_spanish_ci NOT NULL,
  `inspeccion` text COLLATE utf32_spanish_ci NOT NULL,
  `detalle_servicio_regulares` text COLLATE utf32_spanish_ci NOT NULL,
  `banos` text COLLATE utf32_spanish_ci NOT NULL,
  `cocina` text COLLATE utf32_spanish_ci NOT NULL,
  `otros1` text COLLATE utf32_spanish_ci NOT NULL,
  `trampas` text COLLATE utf32_spanish_ci NOT NULL,
  `drenaje` text COLLATE utf32_spanish_ci NOT NULL,
  `detalle_servicio_realizado` text COLLATE utf32_spanish_ci NOT NULL,
  `inspeccion_cctv` text COLLATE utf32_spanish_ci NOT NULL,
  `inspeccion_cctv_num` text COLLATE utf32_spanish_ci NOT NULL,
  `limpieza_tuberia` text COLLATE utf32_spanish_ci NOT NULL,
  `limpieza_tuberia_num` text COLLATE utf32_spanish_ci NOT NULL,
  `inpeccion_controles` text COLLATE utf32_spanish_ci NOT NULL,
  `reparacion_controles` text COLLATE utf32_spanish_ci NOT NULL,
  `limpieza_desagues` text COLLATE utf32_spanish_ci NOT NULL,
  `limpieza_desagues_num` text COLLATE utf32_spanish_ci NOT NULL,
  `limpieza_desagues_registro` text COLLATE utf32_spanish_ci NOT NULL,
  `limpieza_derrame` text COLLATE utf32_spanish_ci NOT NULL,
  `detalle_servicios_especiales` text COLLATE utf32_spanish_ci NOT NULL,
  `k1` text COLLATE utf32_spanish_ci NOT NULL,
  `k2` text COLLATE utf32_spanish_ci NOT NULL,
  `water` text COLLATE utf32_spanish_ci NOT NULL,
  `soplete` text COLLATE utf32_spanish_ci NOT NULL,
  `fuete` text COLLATE utf32_spanish_ci NOT NULL,
  `otros2` text COLLATE utf32_spanish_ci NOT NULL,
  `equipo_seguridad` text COLLATE utf32_spanish_ci NOT NULL,
  `cover` text COLLATE utf32_spanish_ci NOT NULL,
  `guantes` text COLLATE utf32_spanish_ci NOT NULL,
  `botas` text COLLATE utf32_spanish_ci NOT NULL,
  `capacete` text COLLATE utf32_spanish_ci NOT NULL,
  `camara` text COLLATE utf32_spanish_ci NOT NULL,
  `detalle_equipos_utilizados` text COLLATE utf32_spanish_ci NOT NULL,
  `comentario` text COLLATE utf32_spanish_ci NOT NULL,
  `tecnico_adicional` text COLLATE utf32_spanish_ci NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time NOT NULL,
  `titulo` text COLLATE utf32_spanish_ci NOT NULL,
  `nombre_letra_molde` text COLLATE utf32_spanish_ci NOT NULL,
  `fecha_visita` date NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modif` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `productos` text COLLATE utf32_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

--
-- Volcado de datos para la tabla `servicio_plomeria`
--

INSERT INTO `servicio_plomeria` (`id`, `id_incidencia`, `destape`, `reparacion`, `otros`, `instalacion`, `inspeccion`, `detalle_servicio_regulares`, `banos`, `cocina`, `otros1`, `trampas`, `drenaje`, `detalle_servicio_realizado`, `inspeccion_cctv`, `inspeccion_cctv_num`, `limpieza_tuberia`, `limpieza_tuberia_num`, `inpeccion_controles`, `reparacion_controles`, `limpieza_desagues`, `limpieza_desagues_num`, `limpieza_desagues_registro`, `limpieza_derrame`, `detalle_servicios_especiales`, `k1`, `k2`, `water`, `soplete`, `fuete`, `otros2`, `equipo_seguridad`, `cover`, `guantes`, `botas`, `capacete`, `camara`, `detalle_equipos_utilizados`, `comentario`, `tecnico_adicional`, `hora_entrada`, `hora_salida`, `titulo`, `nombre_letra_molde`, `fecha_visita`, `fecha_creacion`, `fecha_modif`, `productos`) VALUES
(1, 7, '', 'on', '', '', 'on', '', '', '', '', '', '', '', 'on', '', '', '', '', '', 'on', '', '', 'on', ',mjmj', '', '', '', '', '', '', '', '', '', '', '', '', '', 'knhh', '', '20:17:07', '17:30:50', '', '', '0000-00-00', '2020-02-04 23:32:06', '2020-02-04 23:32:06', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soporte`
--

CREATE TABLE `soporte` (
  `id` int(11) NOT NULL,
  `id_tecnico` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modif` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_grupo` int(11) NOT NULL DEFAULT '0' COMMENT 'solo aplica si el perfil es Especial',
  `id_cliente` int(11) NOT NULL DEFAULT '0' COMMENT 'se atara con un cliente es decir cliente asociado a un usuario',
  `dispositivo` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`, `id_grupo`, `id_cliente`, `dispositivo`) VALUES
(1, 'Administrador', 'admin', '$2a$07$asxx54ahjppf45sd87a5auHhDisdvuSxcDBsaoZYMwJrghJ3jkICW', 'Administrador', 'vistas/img/usuarios/admin/656.png', 1, '2020-02-12 16:33:25', '2020-02-12 21:33:25', 0, 0, 'WEB'),
(61, 'Ashbel Roldan ', 'aroldan', '$2a$07$asxx54ahjppf45sd87a5auO9SticqA7hBpqNxk667pE/VD9af6fES', 'Tecnico', 'vistas/img/usuarios/aroldan/391.jpg', 1, '2019-08-27 08:30:02', '2019-08-27 13:30:02', 0, 0, NULL),
(63, 'Roberto Negron', 'Colo', '$2a$07$asxx54ahjppf45sd87a5au.ranjuT/8uZuV5hmJIkf3omrAYQUxbW', 'Tecnico', 'vistas/img/usuarios/Colo/459.jpg', 1, '0000-00-00 00:00:00', '2019-09-30 17:57:31', 0, 0, NULL),
(64, 'Victor Castro', 'Victor', '$2a$07$asxx54ahjppf45sd87a5audGQgdB8zdUGLRylP2hFlZq07ScngbfS', 'Tecnico', 'vistas/img/usuarios/Victor/174.jpg', 0, '0000-00-00 00:00:00', '2019-08-01 15:04:39', 0, 0, NULL),
(65, 'Burger King', 'burgerking', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Especial', '', 1, '0000-00-00 00:00:00', '2019-09-20 14:10:30', 1, 0, NULL),
(66, 'KFC', 'kfc', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Especial', '', 0, '0000-00-00 00:00:00', '2019-09-20 14:11:19', 3, 0, NULL),
(67, 'Taco Bell', 'tacobell', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Especial', '', 0, '0000-00-00 00:00:00', '2019-09-20 14:11:20', 4, 0, NULL),
(68, 'Pizza Hut', 'pizzahut', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Especial', '', 0, '0000-00-00 00:00:00', '2019-09-20 14:11:16', 5, 0, NULL),
(69, 'Farmaceuticas', 'farmaceuticas', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Especial', '', 0, '0000-00-00 00:00:00', '2019-09-20 14:11:16', 6, 0, NULL),
(70, 'Hospitales', 'hospitales', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Especial', '', 0, '0000-00-00 00:00:00', '2019-09-20 14:11:07', 7, 0, NULL),
(71, 'Hoteles', 'hoteles', '$2a$07$asxx54ahjppf45sd87a5auwyofmEvd3W7TOOpq9Po2qMDeLPNov22', 'Especial', '', 0, '0000-00-00 00:00:00', '2019-09-20 14:11:39', 8, 0, NULL),
(72, '000117', '000117', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 1, NULL),
(73, '000118', '000118', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 2, NULL),
(74, '000184', '000184', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 3, NULL),
(75, '000243', '000243', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 4, NULL),
(76, '000268', '000268', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 5, NULL),
(77, '000348', '000348', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 6, NULL),
(78, '000385', '000385', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 7, NULL),
(79, '000687', '000687', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 8, NULL),
(80, '001071', '001071', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 9, NULL),
(81, '001108', '001108', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 10, NULL),
(82, '001172', '001172', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 11, NULL),
(83, '001386', '001386', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 12, NULL),
(84, '001409', '001409', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 13, NULL),
(85, '001460', '001460', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '2019-09-20 11:00:34', '2019-09-20 16:06:07', 1, 14, NULL),
(86, '001521', '001521', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 15, NULL),
(87, '002075', '002075', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 16, NULL),
(88, '002158', '002158', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 17, NULL),
(89, '002231', '002231', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 18, NULL),
(90, '002456', '002456', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 19, NULL),
(91, '002457', '002457', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 20, NULL),
(92, '002511', '002511', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 21, NULL),
(93, '002524', '002524', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 22, NULL),
(94, '002533', '002533', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 23, NULL),
(95, '002601', '002601', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 24, NULL),
(96, '002767', '002767', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 25, NULL),
(97, '002785', '002785', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 26, NULL),
(98, '002856', '002856', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 27, NULL),
(99, '003015', '003015', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 28, NULL),
(100, '003039', '003039', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 29, NULL),
(101, '003040', '003040', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 30, NULL),
(102, '003067', '003067', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 31, NULL),
(103, '003256', '003256', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 32, NULL),
(104, '003257', '003257', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 33, NULL),
(105, '003291', '003291', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 34, NULL),
(106, '003370', '003370', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 35, NULL),
(107, '003539', '003539', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 36, NULL),
(108, '003560', '003560', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 37, NULL),
(109, '003741', '003741', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 38, NULL),
(110, '003769', '003769', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 39, NULL),
(111, '003872', '003872', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 40, NULL),
(112, '003986', '003986', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 41, NULL),
(113, '003987', '003987', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 42, NULL),
(114, '004325', '004325', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 43, NULL),
(115, '004512', '004512', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 44, NULL),
(116, '004545', '004545', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 45, NULL),
(117, '004595', '004595', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 46, NULL),
(118, '004821', '004821', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 47, NULL),
(119, '004978', '004978', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 48, NULL),
(120, '005060', '005060', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 49, NULL),
(121, '005131', '005131', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 50, NULL),
(122, '005254', '005254', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 51, NULL),
(123, '005405', '005405', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 52, NULL),
(124, '005437', '005437', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 53, NULL),
(125, '005475', '005475', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 54, NULL),
(126, '005476', '005476', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 55, NULL),
(127, '005531', '005531', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 56, NULL),
(128, '005844', '005844', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 57, NULL),
(129, '005845', '005845', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 58, NULL),
(130, '005930', '005930', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 59, NULL),
(131, '005977', '005977', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 60, NULL),
(132, '006043', '006043', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 61, NULL),
(133, '006115', '006115', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 62, NULL),
(134, '006319', '006319', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 63, NULL),
(135, '006321', '006321', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 64, NULL),
(136, '006328', '006328', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 65, NULL),
(137, '006754', '006754', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 66, NULL),
(138, '007154', '007154', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 67, NULL),
(139, '007161', '007161', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 68, NULL),
(140, '007171', '007171', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 69, NULL),
(141, '007289', '007289', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 70, NULL),
(142, '007539', '007539', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 71, NULL),
(143, '007788', '007788', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 72, NULL),
(144, '007822', '007822', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 73, NULL),
(145, '007884', '007884', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 74, NULL),
(146, '007967', '007967', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 75, NULL),
(147, '008308', '008308', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 76, NULL),
(148, '008452', '008452', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 77, NULL),
(149, '008858', '008858', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 78, NULL),
(150, '008863', '008863', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 79, NULL),
(151, '008966', '008966', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 80, NULL),
(152, '008968', '008968', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 81, NULL),
(153, '009410', '009410', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 82, NULL),
(154, '010030', '010030', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 83, NULL),
(155, '010045', '010045', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 84, NULL),
(156, '010052', '010052', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 85, NULL),
(157, '010069', '010069', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 86, NULL),
(158, '010485', '010485', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 87, NULL),
(159, '010736', '010736', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 88, NULL),
(160, '010822', '010822', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 89, NULL),
(161, '010823', '010823', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 90, NULL),
(162, '011102', '011102', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 91, NULL),
(163, '011103', '011103', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 92, NULL),
(164, '011218', '011218', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 93, NULL),
(165, '011272', '011272', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 94, NULL),
(166, '011521', '011521', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 95, NULL),
(167, '011563', '011563', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 96, NULL),
(168, '011605', '011605', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 97, NULL),
(169, '011674', '011674', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 98, NULL),
(170, '011677', '011677', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 99, NULL),
(171, '011678', '011678', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 100, NULL),
(172, '011687', '011687', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 101, NULL),
(173, '011902', '011902', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 102, NULL),
(174, '011907', '011907', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 103, NULL),
(175, '011908', '011908', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 104, NULL),
(176, '011959', '011959', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 105, NULL),
(177, '012144', '012144', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 106, NULL),
(178, '012234', '012234', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 107, NULL),
(179, '012273', '012273', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 108, NULL),
(180, '012282', '012282', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 109, NULL),
(181, '012352', '012352', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 110, NULL),
(182, '012353', '012353', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 111, NULL),
(183, '012354', '012354', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 112, NULL),
(184, '012381', '012381', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 113, NULL),
(185, '012383', '012383', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 114, NULL),
(186, '012384', '012384', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 115, NULL),
(187, '012715', '012715', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 116, NULL),
(188, '012716', '012716', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 117, NULL),
(189, '012717', '012717', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 118, NULL),
(190, '012718', '012718', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 119, NULL),
(191, '013085', '013085', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 120, NULL),
(192, '013086', '013086', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 121, NULL),
(193, '013104', '013104', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 122, NULL),
(194, '013291', '013291', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 123, NULL),
(195, '013429', '013429', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 124, NULL),
(196, '013457', '013457', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 125, NULL),
(197, '013458', '013458', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 126, NULL),
(198, '013460', '013460', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 127, NULL),
(199, '013482', '013482', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 128, NULL),
(200, '013527', '013527', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 129, NULL),
(201, '013547', '013547', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 130, NULL),
(202, '013638', '013638', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 131, NULL),
(203, '013646', '013646', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 132, NULL),
(204, '013763', '013763', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 133, NULL),
(205, '013789', '013789', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 134, NULL),
(206, '013926', '013926', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 135, NULL),
(207, '013935', '013935', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 136, NULL),
(208, '014094', '014094', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 137, NULL),
(209, '014099', '014099', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 138, NULL),
(210, '014118', '014118', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 139, NULL),
(211, '014170', '014170', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 140, NULL),
(212, '014684', '014684', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 141, NULL),
(213, '014695', '014695', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 142, NULL),
(214, '014696', '014696', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 143, NULL),
(215, '014908', '014908', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 144, NULL),
(216, '014963', '014963', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 145, NULL),
(217, '015216', '015216', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 146, NULL),
(218, '015217', '015217', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 147, NULL),
(219, '015473', '015473', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 148, NULL),
(220, '015486', '015486', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 149, NULL),
(221, '015487', '015487', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 150, NULL),
(222, '015728', '015728', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 151, NULL),
(223, '016290', '016290', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 152, NULL),
(224, '016361', '016361', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 153, NULL),
(225, '016394', '016394', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 154, NULL),
(226, '016395', '016395', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 155, NULL),
(227, '016958', '016958', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 156, NULL),
(228, '016959', '016959', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 157, NULL),
(229, '017102', '017102', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 158, NULL),
(230, '017393', '017393', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 159, NULL),
(231, '017679', '017679', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 160, NULL),
(232, '017702', '017702', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 161, NULL),
(233, '017705', '017705', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 162, NULL),
(234, '017939', '017939', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 163, NULL),
(235, '018057', '018057', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 164, NULL),
(236, '018247', '018247', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 165, NULL),
(237, '018571', '018571', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 166, NULL),
(238, '018572', '018572', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 167, NULL),
(239, '018863', '018863', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 168, NULL),
(240, '018864', '018864', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 169, NULL),
(241, '018866', '018866', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 170, NULL),
(242, '019168', '019168', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 171, NULL),
(243, '020702', '020702', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 172, NULL),
(244, '021907', '021907', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Cliente', '', 1, '0000-00-00 00:00:00', '2019-09-20 16:06:07', 1, 173, NULL),
(327, 'Jorge Luis Delgadillo Zuñiga', 'jdelgadillo', '$2a$07$asxx54ahjppf45sd87a5auHhDisdvuSxcDBsaoZYMwJrghJ3jkICW', 'Tecnico', 'vistas/img/usuarios/jdelgadillo/652.jpg', 1, '2020-02-04 18:30:17', '2020-02-04 23:30:17', 0, 0, 'WEB'),
(328, 'Amilcar Barahona', 'abarahona', '$2a$07$asxx54ahjppf45sd87a5auRajNP0zeqOkB9Qda.dSiTb2/n.wAC/2', 'Tecnico', 'vistas/img/usuarios/abarahona/220.jpg', 1, '2019-10-01 11:45:31', '2019-10-01 16:45:31', 0, 0, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacenes`
--
ALTER TABLE `almacenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupo_cliente`
--
ALTER TABLE `grupo_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `incidencias_fotos`
--
ALTER TABLE `incidencias_fotos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movimiento_inventario`
--
ALTER TABLE `movimiento_inventario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicio_general`
--
ALTER TABLE `servicio_general`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicio_plomeria`
--
ALTER TABLE `servicio_plomeria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `soporte`
--
ALTER TABLE `soporte`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacenes`
--
ALTER TABLE `almacenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupo_cliente`
--
ALTER TABLE `grupo_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `incidencias_fotos`
--
ALTER TABLE `incidencias_fotos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `movimiento_inventario`
--
ALTER TABLE `movimiento_inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicio_general`
--
ALTER TABLE `servicio_general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `servicio_plomeria`
--
ALTER TABLE `servicio_plomeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
