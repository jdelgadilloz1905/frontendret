-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.18-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para ret_db
CREATE DATABASE IF NOT EXISTS `ret_db` /*!40100 DEFAULT CHARACTER SET utf32 COLLATE utf32_spanish_ci */;
USE `ret_db`;

-- Volcando estructura para tabla ret_db.almacenes
CREATE TABLE IF NOT EXISTS `almacenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` text COLLATE utf32_spanish_ci NOT NULL COMMENT 'Venta, Compra, Consumo, RMA',
  `nombre` text COLLATE utf32_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- Volcando datos para la tabla ret_db.almacenes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `almacenes` DISABLE KEYS */;
INSERT INTO `almacenes` (`id`, `tipo`, `nombre`) VALUES
	(1, 'ppal', 'Principal');
/*!40000 ALTER TABLE `almacenes` ENABLE KEYS */;

-- Volcando estructura para tabla ret_db.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla ret_db.categorias: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
	(1, 'Equipos Electromecánicos', '2019-04-08 13:57:51'),
	(2, 'Taladros', '2017-12-21 18:53:29'),
	(3, 'Andamios', '2017-12-21 18:53:29'),
	(4, 'Generadores de energía', '2017-12-21 18:53:29'),
	(5, 'Equipos para construcción', '2017-12-21 18:53:29'),
	(6, 'Martillos mecánicos', '2017-12-21 21:06:40'),
	(7, 'Equipos celulares', '2019-04-12 11:47:55'),
	(8, 'Materiales de Campanas', '2021-01-18 11:05:52');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Volcando estructura para tabla ret_db.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `email` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `incidencia` int(11) NOT NULL DEFAULT 0 COMMENT 'numero de incidencia generada',
  `ultima_incidencia` datetime DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_grupo` int(11) NOT NULL DEFAULT 0,
  `estatus` int(11) NOT NULL DEFAULT 0 COMMENT '0 = activo y 1 = Inactivo',
  `localizador` text COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=210 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla ret_db.clientes: ~206 rows (aproximadamente)
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id`, `nombre`, `documento`, `email`, `telefono`, `direccion`, `fecha_nacimiento`, `incidencia`, `ultima_incidencia`, `fecha`, `id_grupo`, `estatus`, `localizador`) VALUES
	(1, 'Jackeline Bonano', 117, 'nelson.torres@ret-inc.com', '(117) 872-2883', 'PO Box 801322', '0000-00-00', 0, NULL, '2021-09-02 11:29:46', 1, 0, 'Comandante '),
	(2, 'Julián García', 118, NULL, '787-200-7003', 'Amalia Marín Esquina Gándara, Río Piedras, PR 00925', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Río Piedras'),
	(3, 'Jackeline Colón', 184, NULL, '787-679-7725', 'Ave. Roberto H. Todd, Santurce, PR 00925', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Santurce - Pda 18'),
	(4, 'José Vargas', 243, 'nelson.torres@ret-inc.com', '(178) 722-8833', 'PO Box 801322', '0000-00-00', 0, NULL, '2021-09-02 11:21:17', 1, 0, 'Arecibo'),
	(5, 'Jackeline Colón', 268, NULL, '787-753-1368', 'Ave. Ponce de León #207, Detrás de Popular Center, San Juan PR 00917', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Hato Rey-Milla de Oro'),
	(6, 'Francisco Salas', 348, NULL, '787-679-7727', 'Ave. Campo Rico Ext. Contry Club, Río Piedras, PR 00928', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Campo Rico I'),
	(7, 'Milka Pérez', 385, NULL, '787-743-4755', 'Antigua Carretera # 1 de Caguas a Cayey, Caguas, PR 00725', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Caguas 1'),
	(8, 'Joel Jácome', 687, 'pruebase57@admin.com', '(787) 843-5005', 'Ave. Las Américas, Esquina Ave. de Hostos, Ponce, PR 00731', '0000-00-00', 0, NULL, '2020-11-30 23:36:16', 1, 0, 'Ponce 1'),
	(9, 'Julio Vale', 1071, NULL, '787-834-0520', 'Calle Luna # 54 (Pueblo), Condominio Apolo, Mayagüez, PR 00968', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Mayagüez 1'),
	(10, 'Joel Jácome', 1108, NULL, '787-844-8355', 'Calle Marginal KM 7, Carretera Estatal # 1, Barrio Machuelo Bajo, Urb. Valle Verde, Ponce, PR 00731', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Ponce 2'),
	(11, 'Julio Vale', 1172, NULL, '787-833-2180', 'Mayagüez Mall, Carretera #2 Km. 159.4, Mayagüez, PR 00680', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Mayagüez 2'),
	(12, 'Milka Pérez', 1386, NULL, '787-738-2083', 'Carretera # 1 Int. # 15 Barrio Monte Llanos, Cayey Shopping Center, Cayey, PR 00736', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Cayey 1'),
	(13, 'Wilfredo Torres', 1409, NULL, '787-720-4782', 'Calle México, Esquina Carretera # 833 Parkville, Guaynabo, PR 00955', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Parkville'),
	(14, 'Luis Soto', 1460, NULL, '787-786-1927', 'Carretera Estatal # 2 Km. 14.7 Hato Tejas, Bayamón, PR 00961', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Bayamón Oeste '),
	(15, 'Jackeline Colón', 1521, NULL, '787-679-7728', 'Calle Rodríguez Serrá, Esquina Ave. Ashford, Condado, PR 00901', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Condado I'),
	(16, 'Francisco Salas', 2075, NULL, '787-710-8177', 'Ave. Boca Cangrejos, Esquina Baldorioty de Castro, Isla Verde, Carolina, PR  00979', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Isla Verde '),
	(17, 'Lourdes Ortíz', 2158, NULL, '787-852-4935', 'Carretera # 30 Calle Dr. Rincón, Reparto Rivera Donato, Humacao, PR 00791', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Humacao I'),
	(18, 'Santiago Huezo', 2231, NULL, '787-780-3435', 'Ave. Lomas Verdes Carretera # 174, Barrio Juan Sánchez, Bayamón, PR 00956', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Lomas Verdes '),
	(19, 'Julián García', 2456, NULL, '787-763-1621', 'El Señorial Shopping Center, Esquina Paraná, Cupey, San Juan, PR 00925', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Señorial'),
	(20, 'Francisco Salas', 2457, NULL, '787-755-0565', 'Trujillo Alto Plaza, Expreso de Trujillo Alto Carr. 181, Trujillo Alto, PR 00976', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Trujillo Alto'),
	(21, 'Xiomara Labrador', 2511, NULL, '787-797-8500', 'Rexville Plaza Shopping Center, Carretera Estatal # 167 Km. 18.8, Bayamón, PR 00956', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Rexville '),
	(22, 'Rosvelyn Félix', 2524, NULL, '787-863-4262', 'Centro Comercial El Batey, Barrio Sandinera  Carr. Municipal, Desvío a Las Croabas, \nFajardo, PR 00738;1', NULL, 0, NULL, '2019-07-25 22:40:20', 1, 0, NULL),
	(23, 'José Rivera', 2533, NULL, '787-854-3173', 'Carretera Estatal # 2, Esquina Calle # 6, Urb. Félix Dávila, Manatí, PR 00674', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Manatí'),
	(24, 'Jackeline Colón', 2601, NULL, '787-296-8971', 'Calle San Francisco # 269, Esquina Calle Tasca Viejo San Juan, San Juan, PR 00901', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Viejo San Juan'),
	(25, 'Jackeline Colón', 2767, NULL, '787-296-8972', 'Amalia Marín, Esquina Gándara, Ave. Domenech, Esquina Juan J. Jiménez, San Juan, PR 00925', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Domenech '),
	(26, 'Angel Delgado', 2785, NULL, '787-278-2121', 'Dorado Shopping Center, Carretera Estatal # 693, Barrio Mameyal, Dorado, PR 00646', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Dorado'),
	(27, 'Wilfredo Torres', 2856, NULL, '787-754-0311', 'Plaza Las Américas Shopping Center, Local #305 Tercer Nivel, Hato Rey, PR 00917', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Plaza I - La Terraza'),
	(28, 'José Vargas', 3015, NULL, '787-878-6821', 'Plaza Atlántico Shopping Center Local K,  Km. 8.3, Arecibo, PR 00612  ', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Plaza Atlántico '),
	(29, 'Joel Jácome', 3039, NULL, '787-840-1991', 'Carretera Estatal # 2 Km 260.4, Valle Real, Ponce, PR 00731', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Ponce 3'),
	(30, 'William López', 3040, NULL, '787-825-2665', 'Carretera Estatal # 4, Esquina Calle A, Barrio San Delfonso, Coamo, PR 00769', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Coamo'),
	(31, 'Audie Alvarez', 3067, NULL, '787-856-1465', 'Carretera Estatal # 127, Calle 25 de Julio, Yauco, PR 00698', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Yauco'),
	(32, 'Milka Pérez', 3256, NULL, '787-738-5333', 'Calle de Diego Esquina Corchado, Cayey, PR 00736', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Cayey 2 '),
	(33, 'Damaris Flores', 3257, NULL, '787-864-2450', 'Carretera Estatal # 3, KM. 135.8, Guayama, PR 00784 ', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Guayama 1'),
	(34, 'Julio Vale', 3291, NULL, '787-834-2825', 'Calle Post & Basora, Mayagüez, PR 00680', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Mayagüez 3 '),
	(35, 'Wilfredo Torres', 3370, NULL, '787-720-8802', 'Expreso Martínez Nadal, Los Jardines Shopping Center, Guaynabo PR 00965', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Guaynabo'),
	(36, 'Wilfredo Torres', 3539, NULL, '787-296-8973', 'Centro Comercial San Francisco, Río Piedras, PR 00925', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'San Francisco '),
	(37, 'Julián García', 3560, NULL, '787-296-8974', 'Solar 170 - A Bloque S, Urb. San Agustín, Barrio Sabana Llana, Río Piedras, PR 00928', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'San Agustín '),
	(38, 'Luis Soto', 3741, NULL, '787-795-6525', 'Plaza Río Hondo Shopping Center Ave. Comerío, Bayamón, PR 00961', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Río Hondo (Estacionamiento)'),
	(39, 'Julián García', 3769, NULL, '787-710-8285', 'Ave. José C. Barbosa # 368, Urb. Dávila & Llenaza, Hato Rey,  PR 00907', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Barbosa '),
	(40, 'Joel Jácome', 3872, NULL, '787-840-7570', 'Calle Unión # 7 (Frente a la Plaza de Recreo), Plaza Degetau Calle Unión, Ponce, PR 00907', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Ponce 4'),
	(41, 'Julián García', 3986, NULL, '787-751-4744', 'Centro Médico Fast Food Center, Cafetería Central de Centro Médico, Entre hospital Universitario y Hospital del niño,  Río Piedras, PR 00925 ', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Centro Médico'),
	(42, 'Wilfredo Torres', 3987, NULL, '787-710-8286', 'Plaza Puerto Rico, Carretera # 1 Esquina Camino Sein, Río Piedras, PR 00925', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Interamericana '),
	(43, 'Audie Alvarez', 4325, NULL, '787-892-4390', 'Carretera # 102 Barrio Maresua  Km. 204.6 (Frente a Universidad Interamericana), San Germán, PR 00683', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'San Germán '),
	(44, 'Lizamaira Rodríguez', 4512, NULL, '787-894-3940', 'Carretera Estatal # 111 - R, Calle Dr. Cueto, Utuado, PR 00641', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Utuado'),
	(45, 'Jackeline Bonano', 4545, NULL, '787-752-4190', 'Ave.65 Infantería KM 7, Carolina, PR 00987', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Roberto Clemente'),
	(46, 'Francisco Salas', 4595, NULL, '787-710-8287', 'Carretera # 187, Esquina Los Gobernadores, Carolina, 00979', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Plazoleta Isla Verde'),
	(47, 'Francisco Salas', 4821, NULL, '787-710-8288', 'Ave.65 Infantería, Esquina Calle Abad, Urb. Club Manor Bo. Sabana Llena, \nRío Piedras, PR 00925;1', NULL, 0, NULL, '2019-07-25 22:40:20', 1, 0, NULL),
	(48, 'Jessica Bermúdez', 4978, NULL, '787-746-2523', 'Carretera # 1, Km. 34.5 (Frente a Centro Comercial Villa Blanca) Entrada Urbanización Bairoa, Caguas, PR 00725', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Caguas 2 '),
	(49, 'Xiomara Labrador', 5060, NULL, '787-740-1464', 'Carretera Estatal # 2 Km. 10.0, Santa Rosa Mall, Bayamón, PR 00959', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Santa Rosa '),
	(50, 'Jackeline Colón', 5131, NULL, '787-710-8289', 'Ave. Baldorioty de Castro, Calle Esquilín y Linda Vista, Santurce, PR 00907', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Baldorioty'),
	(51, 'Rosvelyn Félix', 5254, NULL, '787-887-8030', 'Carretera # 3 Km. 23.5, Barrio Ciénaga Baja, Río Grande, PR 00745', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Río Grande'),
	(52, 'Luis Soto', 5405, NULL, '787-786-3055', 'Ave. Comerío Esquina Calle 24, Sierra Bayamón, Bayamón, PR 00961', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Sierra Bayamón'),
	(53, 'Julián García', 5437, NULL, '787-710-8290', 'Carretera 176 Intersección Carretera # 838, Río Piedras, PR 00926', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Cupey 2 '),
	(54, 'William González', 5475, NULL, '787-891-9359', 'Carretera # 2 Esquina Carretera Estatal # 459, Aguadilla, PR 00603', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Aguadilla 1'),
	(55, 'Angel Delgado', 5476, NULL, '787-883-6476', 'Carretera Estatal #2 Centro Comercial Plaza del Caribe, Vega Alta, PR 00692 ', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Vega Alta '),
	(56, 'José Vargas', 5531, NULL, '787-895-2583', 'Carretera Estatal # 2 Km. 100.7, Quebradillas, PR 00678', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Quebradilla '),
	(57, 'Jessica Bermúdez', 5844, NULL, '787-746-8683', 'Plaza Centro I, Ave. Rafael Cordero, Esquina Carretera # 30, Caguas, PR 00725', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Caguas 4, Plaza Centro 1'),
	(58, 'Francisco Salas', 5845, NULL, '787-710-8291', 'Ave. Campo Rico AL-15 Country Club, San Juan, PR 00982', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Campo Rico 2 - Carolina'),
	(59, 'Xiomara Labrador', 5930, NULL, '787-785-8282', 'Ave. Santa Juanita, Calle 24, Bayamón Sur Shopping Center Los Millones, Bayamón, PR 00956', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Bayamón, Los Millones '),
	(60, 'Evelyn Vázquez', 5977, NULL, '787-850-2466', 'Vista del Río Comercial Park, Carretera # 3 Ramal # 908 Vista del Río, Humacao, PR 00791', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Humacao, Vista del Río '),
	(61, 'Evelyn Vázquez', 6043, NULL, '787-850-0631', 'Carretera Estatal # 3 y Carretera # 908 Urb. Villa Universitaria, \nHumacao, PR 00791;1', NULL, 0, NULL, '2019-07-25 22:40:20', 1, 0, NULL),
	(62, 'Xiomara Labrador', 6115, NULL, '787-740-0350', 'Carretera Estatal # 167, Urb. Forest Hills, Bayamón, PR 00959', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Forest Hills - Bayamón'),
	(63, 'José Rivera', 6319, NULL, '787-858-5555', 'Las Vegas Mall, Carretera # 2 Km. 39.4, Barrio Algarrobo, Vega Baja, PR 00693', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Vega Baja '),
	(64, 'Wilfredo Torres', 6321, NULL, '787-250-8737', 'Primer Nivel Plaza las Américas al lado de Sears, Hato Rey, PR 00693', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Plaza Sears, Plaza las Américas'),
	(65, 'Jessica Bermúdez', 6328, NULL, '787-746-2429', 'Centro Comercial Mi Antojo, Ave. Gautier Benítez, Km. 37 Lote A, Caguas, PR 00725', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Caguas Mi Antojo'),
	(66, 'Luis Soto', 6754, NULL, '787-261-0128', 'Ave. Sabana Seca, Esquina Lizzie Graham, Calle 726 & 734, Levittown Lakes, Toa Baja, PR  00949', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Levittown 1'),
	(67, 'Santiago Huezo', 7154, NULL, '787-710-8292', 'Calle Industrial Ctro. de Seguros San Patricio, Calle Resolución Esquina, F.D. Roosevelt, \nPueblo Viejo, San Juan, PR 00920;1', NULL, 0, NULL, '2019-07-25 22:40:20', 1, 0, NULL),
	(68, 'Rosvelyn Félix', 7161, NULL, '787-860-1500', 'Ctro. Comercial Monte Brisas, Urb. Monte Brisas, Carretera 194 Km. 2.0 Fajardo, PR 00716', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Fajardo 2'),
	(69, 'William González', 7171, NULL, '787-877-5555', 'Carretera # 111 Km. 4.6, San Francisco Cour, Moca, PR 00676', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Moca '),
	(70, 'William López', 7289, NULL, '787-837-6862', 'Intersección Carretera Estatal # 149 con Carretera # 584, Juana Díaz, PR 00795', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Juana Díaz '),
	(71, 'Rosvelyn Félix', 7539, NULL, '787-256-2350', 'Ctro. Comercial Plaza Noroeste, Carr.  Estatal # 3 Km. 20.5 Villas de Loíza, Loíza, PR 00795', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Loíza'),
	(72, 'José Vargas', 7788, NULL, '787-880-0446', 'Plaza del Norte Shopping Center, Carretera # 2 Km. 81.9, Hatillo, PR 00659', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Hatillo 1'),
	(73, 'William González', 7822, NULL, '787-829-3037', 'Centro Multiservicios Cooperativo, Carretera Estatal # 115 Km. 24.8, Barrio Asomante \nAguada, PR 00602 ;1', NULL, 0, NULL, '2019-07-25 22:40:20', 1, 0, NULL),
	(74, 'Joel Jácome', 7884, NULL, '787-259-8299', 'Ponce Builders Square, Carretera Estatal # 2 Barrio Cañas, Ponce, PR 00731', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Ponce Massó '),
	(75, 'Joel Jácome', 7967, NULL, '787-840-3396', 'Calle Fagot, La Rambla, Ponce, PR 00731', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Ponce Rambla'),
	(76, 'Damaris Flores', 8308, NULL, '787-866-8271', 'Carretera # 54 (desvío Sur carr. # 3 ) Barrio Machete, Guayama, PR 00785', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Guayama Machete'),
	(77, 'Damaris Flores', 8452, NULL, '787-864-5010', 'Plaza Guayama Shopping Center, Carretera Estatal # 3 Km. 134.6, Guayama, PR 00785', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Guayama 3'),
	(78, 'Damaris Flores', 8858, NULL, '787-845-6972', 'Carretera # 52 Intersección Carretera 153, Barrio Jauca, Santa Isabel, PR 00757', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Santa Isabel'),
	(79, 'José Vargas', 8863, NULL, '787-830-1605', 'Plaza Isabel Shopping Center, Carretera Estatal # 2 Km. 111, Isabela, PR 00794', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Isabela'),
	(80, 'Vacante', 8966, NULL, '787-857-5437', 'Carretera Estatal # 156 Km. 14.2, Bo. Honduras, Barranquitas, PR 00794', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Barranquitas'),
	(81, 'Julio Vale', 8968, NULL, '787-831-8225', 'Mayagüez Builders Sq. Shopping Center, Carr. Estatal # 2 Bo. Sabaneta, Mayagüez, PR 00680', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Mayagüez Massó'),
	(82, 'Jackeline Bonano', 9410, NULL, '787-710-8293', 'Los Colobos Shopping Center, Ave. 65 Infantería, Carolina, PR 00982', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Los Colobos '),
	(83, 'Evelyn Vázquez', 10030, NULL, '787-285-8237', 'Palma Real Shopping Center, Food Court, Int. 53, Carretera PR # 3, Humacao, PR 00791', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Humacao, Palma Real'),
	(84, 'Julio Vale', 10045, NULL, '787-255-1595', 'Carretera Estatal # 101, Km. 17.2 Solar # 2 Boquerón Beach, Cabo Rojo PR 00622', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Cabo Rojo, Boquerón '),
	(85, 'Audie Alvarez', 10052, NULL, '787-892-4528', 'Parque Industrial, Camino Real, Carr. Estatal # 2 Esquina Carr. 102, San Germán, PR 00963', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'San Germán 2'),
	(86, 'Francisco Salas', 10069, NULL, '787-710-8294', 'Caribbean Airport Facilities, Aeropuerto Internacional Luis Muñoz Marín, Carolina, PR 00979', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Tiri Airport '),
	(87, 'Lourdes Ortíz', 10485, NULL, '787-745-1015', 'Carretera Estatal # 189 Km. 3.5 Barrio Rincón, Gurabo, PR 00778', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Caguas,Turabo'),
	(88, 'Lourdes Ortíz', 10736, NULL, '787-733-1535', 'Carretera Estatal # 183 Km. 20.7, Barrio Montones, Las Piedras, PR 00771', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Las Piedras '),
	(89, 'Santiago Huezo', 10822, NULL, '939-793-7233', 'Econo Supermarket, Ave. Martínez Nadal , Esquina con Jesús T. Piñeiro, Altamira, Guaynabo, PR 00920', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Altamira'),
	(90, 'Julio Vale', 10823, NULL, '787-265-5515', 'Mayagüez Mall, Local W - 6 Food Court, Carretera Estatal # 2 Km. 159.4, Mayagüez, PR 00680', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Mayagüez Mall '),
	(91, 'José Vargas', 11102, NULL, '787-820-4629', 'Carretera # 2 PR 2, Km. 86.6 Barrio Pueblo, Hatillo PR 00659', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Hatillo 2'),
	(92, 'Evelyn Vázquez', 11103, NULL, '787-266-2287', 'Carretera Estatal 901 Km. 8.6 Urb. Valles de Yabucoa, Bo. Juan Martín, Yabucoa PR  ', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Yabucoa '),
	(93, 'Jessica Bermúdez', 11218, NULL, '787-286-0710', 'Notre Dame Commercial Development, Ave. Muñoz Marín (Frente a la Urb. Notre Dame) Bo. Thomas de Castro, Caguas, PR 00725 ', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Caguas, Notre Dame'),
	(94, 'Lourdes Ortíz', 11272, NULL, '787-713-1070', 'Juncos Plaza Shopping, Carr. Estatal # 31 Km. 24.0 Bo. Ceiba Norte, Juncos, PR 00777', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Juncos'),
	(95, 'Jackeline Bonano', 11521, NULL, '787-710-8295', 'Carretera Estatal # 3 Km. 11.6, Centro Judicial Barrio Trujillo Alto, Carolina, PR 00979', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Carolina, Centro Judicial '),
	(96, 'Evelyn Vázquez', 11563, NULL, '787-885-2839', 'Calle Lauro Piñero # 3161 Esquina Carretera, Estatal # 978 Km. 21.19, Ceiba, PR 00735', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Ceiba'),
	(97, 'Rosvelyn Félix', 11605, NULL, '787-809-2431', 'Río Grande States Shopping Center, Carretera # 3 Ave. 65 Infantería Esquina Carretera # 956 Km. 28.0 Barrio Zarzal, Río Grande, PR 00745', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Río Grande 2'),
	(98, 'William López', 11674, NULL, '787-829-3037', 'Ave. Rudolfo González Final, Carr. #10, Barrio Rodríguez, Sector Desvío, Adjuntas, PR 00601', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Adjuntas'),
	(99, 'William González', 11677, NULL, '787-280-0455', 'San Sebastián Shopping Center, Carr. Estatal # 118 Km. 18.0, San Sebastián, PR 00685', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'San Sebastián'),
	(100, 'Xiomara Labrador', 11678, NULL, '787-778-8214', 'Calle Santa Cruz # 60, Urb. Santa Cruz, Bayamón, PR 00961', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'San Pablo '),
	(101, 'Jackeline Bonano', 11687, NULL, '787-710-8296', 'Ave. Jesús M. Frogoso Esq. Ave. Fidalgo Diaz, Urb. Villa Fontana, Carolina, PR 00985', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Puma Plaza Carolina'),
	(102, 'Luis Soto', 11902, NULL, '787-261-3770', 'Carretera Estatal # 165, Esquina Avenida Boulevard, Levittown, Toa Baja, PR 000959', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Levittown 2'),
	(103, 'Milka Pérez', 11907, NULL, '787-714-0525', 'Carretera Estatal # 172 Km. 13.6, Cidra, PR 00739', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Cidra'),
	(104, 'Lizamaira Rodríguez', 11908, NULL, '787-897-4743', 'Carretera Estatal # 111 Km. 2.9, Barrio Pueblo, Lares, PR 00669', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Lares'),
	(105, 'Francisco Salas', 11959, NULL, '787-710-8297', 'Plaza Escorial Shopping Center, Carolina, PR 00979', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Parque Escorial'),
	(106, 'Julián García', 12144, NULL, '787-287-7340', 'Carretera Estatal # 52, Montehiedra Shopping Center, Río Piedras, PR 00920', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Montehiedra'),
	(107, 'Luis Soto', 12234, NULL, '787-785-7948', 'Shopping Center, Ave. West Main # 501 Sierra Bayamón, Bayamón, PR 00961', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Plaza del Sol '),
	(108, 'Milka Pérez', 12273, NULL, '787-738-2285', 'Carretera Estatal # 14 Km. 65.5, Cayey, PR 00736', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Cayey 3'),
	(109, 'Lizamaira Rodríguez', 12282, NULL, '787-816-6781', 'Carretera Estatal # 129 Km. 42.5,(Frente Residencial El Cotto), Arecibo, RR 00612', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Arecibo Jové'),
	(110, 'Santiago Huezo', 12352, NULL, '787-995-0580', 'Lucchetti Industrial Park, Carretera Estatal # 28 Km. 2.2, Bayamón, PR 00956', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Lucchetti '),
	(111, 'Damaris Flores', 12353, NULL, '787-271-0854', 'Carretera Estatal # 3, Km. 123.0, Patillas, PR 00723 ', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Patillas'),
	(112, 'José Rivera', 12354, NULL, '787-862-3917', 'Carretera Estatal 155, Km. 47.4, Morovis, PR 00687', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, ' Morovis'),
	(113, 'Jackeline Bonano', 12381, NULL, '787-776-2254', 'Plaza Carolina Mall (primer nivel) Ave. Fragoso, Villa Fontana, Carolina, PR 00729', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Plaza Carolina 2'),
	(114, 'Jackeline Bonano', 12383, NULL, '787-710-8299', 'Rial Plaza Shopping, Carretera Estatal #185 Km. 0.0, Canóvanas, PR 00729', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Canóvanas '),
	(115, 'Vacante', 12384, NULL, '787-802-0706', 'Carretera Estatal # 159 Km. 15.2, Corozal, PR 00783', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Corozal '),
	(116, 'Evelyn Vázquez', 12715, NULL, '787-874-6883', 'Carretera Estatal # 31, Km. 3.2, Naguabo, PR 00718 ', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Naguabo'),
	(117, 'William González', 12716, NULL, '787-823-0710', 'Carretera Estatal # 115 Km. 11.0, Rincón, PR 00677', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Rincón'),
	(118, 'Julio Vale', 12717, NULL, '787-892-3210', 'Carretera Estatal # 2 Km. 167.3, Hormigueros, PR 00660', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Hormigueros'),
	(119, 'William López', 12718, NULL, '787-847-0398', 'Carretera Estatal #149 Km. 55.2, Villalba, PR 00766 ', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Villalba'),
	(120, 'Santiago Huezo', 13085, NULL, '787-945-0074', 'Carretera Estatal # 24 Lote 10, Metro Office Park, Guaynabo, PR 00968 - 1705', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Metro Office'),
	(121, 'Jessica Bermúdez', 13086, NULL, '787-286-2915', 'Carretera # 52 (Expreso) & Carretera Estatal # 156, Caguas, PR 00725', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Las Catalinas Mall '),
	(122, 'Angel Delgado', 13104, NULL, '787-270-1114', 'Carretera Estatal # 2 Km. 29.7, Vega Alta, PR 00692', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Plaza Grand Mall '),
	(123, 'Jessica Bermúdez', 13291, NULL, '787-745-1055', 'Plaza Centro 3 Shopping FC, Ave Muñoz Marín, Carr. Estatal #30 Esquina Rafael Cordero,  Caguas, PR 00725 ', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Caguas, Plaza Centro 3 '),
	(124, 'José Rivera', 13429, NULL, '787-867-7174', 'Carr. Estatal #155 Km. 30.8 con Carr. Estatal # 157 Barrio Garos, Orocovis, PR 00720', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Orocovis'),
	(125, 'William López', 13457, NULL, '787-803-1887', 'Coamo Plaza, Carretera Estatal # 153 Km. 13.5, Coamo, PR 00769', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Coamo 2'),
	(126, 'Julio Vale', 13458, NULL, '787-851-0520', 'Carretera Estatal # 100, Km. 7.3, Cabo Rojo, PR 00623', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Cabo Rojo 2'),
	(127, 'Audie Alvarez', 13460, NULL, '787-821-4505', 'Carretera Estatal #116, Esquina Carretera # 333, Guánica, PR 00653', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Guánica'),
	(128, 'Rosvelyn Félix', 13482, NULL, '787-801-1251', 'Carretera Estatal # 3 Km. 7.3, Monte Plaza, Fajardo, PR 00738', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Fajardo, Montesol'),
	(129, 'Lourdes Ortíz', 13527, NULL, '787-715-1250', 'Carretera Estatal # 181, Esquina Carretera Estatal # 183, San Lorenzo, PR 00754', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'San Lorenzo'),
	(130, 'Audie Alvarez', 13547, NULL, '787-873-0190', 'Sabana Grande Plaza, Carretera Estatal # 121 Km.216, Sabana Grande, PR 00637', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Sabana Grande'),
	(131, 'Joel Jácome', 13638, NULL, '787-284-1245', 'Ponce 2000 Mall, Expreso # 2 Avenida Baramaya, Ponce, PR 00731', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Ponce 2000'),
	(132, 'Audie Alvarez', 13646, NULL, '787-835-6620', 'Carretera Estatal # 127, KM 9.2, Barrio Jaguas, Guayanilla, PR 00656', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Guayanilla '),
	(133, 'Lizamaira Rodríguez', 13763, NULL, '787-846-0650', 'Expreso # 2 KM. 57.3, Solar A, Forida Afuera,  Barceloneta, PR 00617', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Barceloneta'),
	(134, 'Luis Soto', 13789, NULL, '787-784-4943', 'Embarcadero Food Court, Bayamón, PR 00956', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Río Hondo 2 '),
	(135, 'Evelyn Vázquez', 13926, NULL, '787-285-7714', 'Plaza SAM\'S, Carretera Estatal # 3 KM 82.0, Humacao, PR 00791', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Humacao Sam\'s'),
	(136, 'William González', 13935, NULL, '787-868-1272', 'Carretera Estatal # 115 Km. 22.0, Aguada, PR 00602', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Aguada 2'),
	(137, 'Vacante', 14094, NULL, '787-869-8410', 'Mercado Plaza, Carretera Estatal # 152, Km. 16.0, Naranjito, PR 000791', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Naranjito'),
	(138, 'Vacante', 14099, NULL, '787-991-2435', 'Carretera Estatal # 14 Km. 52.7, Aibonito, PR 00705', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Aibonito'),
	(139, 'Vacante', 14118, NULL, '787-870-3322', 'Carretera Estatal # 159 Km. 20.2, Toa Alta, PR 00953', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Toa Alta'),
	(140, 'Rosvelyn Félix', 14170, NULL, '787-256-5720', 'Edificio #4 Espacio #90, Carretera Estatal #188, Canóvanas, PR 00729', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Canóvanas, Outlets'),
	(141, 'Vacante', 14684, NULL, '787-799-5046', 'Centro Comercial Pájaros, Shopping Village, Carretera Estatal #861 Int. Carretera #862, Bo. Pájaros, Toa Alta, PR 00956', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Bayamón, Barrio Pájaros'),
	(142, 'Vacante', 14695, NULL, '787-875-3005', 'Carretera Estatal # 774 Km. 0.9, Comerío, PR 00782', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Comerío'),
	(143, 'José Rivera', 14696, NULL, '787-871-5511', 'Carretera Estatal #149 , Intersección con Carretera #145, Barrio Jaguas, Ciales, PR 00638', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Ciales'),
	(144, 'José Rivera', 14908, NULL, '787-854-5340', 'Plaza Monte Real Shopping Center, Carretera Estatal #2 Km. 45.6, Manatí, PR 00674', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Manatí Wal-Mart'),
	(145, 'William López', 14963, NULL, '787-840-4382', 'Centro Comercial Coto Laurel, Carretera Estatal # 14 Km. 14.9, Ponce, PR 00780', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Ponce, Coto Laurel'),
	(146, 'William López', 15216, NULL, '787-828-1878', 'Carretera Estatal # 144, Intersección Carretera Ramal #141, Jayuya, PR 00664 ', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Jayuya'),
	(147, 'Lourdes Ortíz', 15217, NULL, '787-733-7905', 'Carretera # 30 Intersección Carretera #198, Las Piedras, PR 00771 ', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Las Piedras II'),
	(148, 'José Vargas', 15473, NULL, '787-262-5292', 'Carretera Estatal PR #2 Km. 92.9, Bo. Membrillo, Camuy, PR 00627', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Camuy'),
	(149, 'Xiomara Labrador', 15486, NULL, '787-799-4644', 'Carretera  #830 Km. 0.5 Cerro Gordo, Bayamón, PR 00957 ', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Bayamón Inter.'),
	(150, 'Lourdes Ortíz', 15487, NULL, '787-737-2620', 'Carretera #181 Intersección Carr. #30, Gurabo, PR 00778', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Gurabo'),
	(151, 'Milka Pérez', 15728, NULL, '939-205-0075', 'Borinquén, Barrio Turabo, Carr. Estatal # 52 Intersección con Carr. Estatal # 1, Caguas, PR 00725', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Caguas Sur'),
	(152, 'Jessica Bermúdez', 16290, NULL, '787-694-2011', 'Carretera 174 Km. 22.4, Barrio Sonadora, Aguas Buenas, PR 00703', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Aguas Buenas'),
	(153, 'José Rivera', 16361, NULL, '787-921-2500', 'Carr. 670 Intersección con Carr. 6668 Km. 1.0, Bo. Cotto Norte, Manatí, PR 00674', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Manatí, Econo'),
	(154, 'Audie Alvarez', 16394, NULL, '787-986-5006', 'Carretera 116 Km. 2.3, Barrio Sabana Yeguas, Lajas, PR 00967', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Lajas'),
	(155, 'Audie Alvarez', 16395, NULL, '787-987-2105', 'Carretera PR 385 Km. 0.6, Barrio Cuevas, Peñuelas, PR 00624', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Peñuelas'),
	(156, 'Angel Delgado', 16958, NULL, '787-965-2010', 'Calle Casimar, Esq. PR-160, Salida 35, PR-22, Vega Baja, PR 00693', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Vega Baja Almirante (Blondet)'),
	(157, 'Lizamaira Rodríguez', 16959, NULL, '787-280-2070', 'Carretera PR-129, Km. 8.4, Bo. Campo Alegre, Hatillo, PR 00659', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Hatillo Jové'),
	(158, 'William González', 17102, NULL, '787-891-2424', 'Carretera #2, Km. 129.6, Barrio Victoria, Aguadilla, PR 00602', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Aguadilla Hattón'),
	(159, 'Julio Vale', 17393, NULL, '787-265-7880', 'Calle Ramón Emeterio Betances #392 Sur, Mayaguez, PR 00680', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Mayagüez Post'),
	(160, 'Rosvelyn Félix', 17679, NULL, '787-500-2985', 'Carretera PR 3 Km. 17.8, Plaza Canóvanas, Canóvanas PR 00729', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Canóvanas 20/20'),
	(161, 'Damaris Flores', 17702, NULL, '787-680-2986', 'Carretera 1, Km. 89.5 Bo. Aguirre Salinas, PR  00751', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Salinas 20/20'),
	(162, 'Lizamaira Rodríguez', 17705, NULL, '787-965-2986', 'Barceloneta Shopping Court, Carretera 140, Int. 2, Bo. Manatí Barcelonteta, PR  00617', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Barceloneta 20/20'),
	(163, 'Angel Delgado', 17939, NULL, '787-965-2987', 'Carretera #2,  Km. 28.3, Bo. Espinosa Vega Alta, PR  00692', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Vega Alta Gel'),
	(164, 'Milka Pérez', 18057, NULL, '787-961-7075', '172 Km. 0.5, Urbanización Villa del Rey, Caguas, PR  00725', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Caguas 172'),
	(165, 'Damaris Flores', 18247, NULL, '787-271-7021', 'Carretera Estatal #3, Km. 130.2 Arroyo Town Center Lote E, Arroyo, PR  00714', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Arroyo'),
	(166, 'Xiomara Labrador', 18571, NULL, '939-225-2040', 'PR-199 Int. PR 840, Royal Town, Bayamón, PR  ', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Royal Town Total'),
	(167, 'Wilfredo Torres', 18572, NULL, '939-205-5618', 'Carretera PR-199 Ave.Las Cumbres Solar A Barrio Frailes Guaynabo, PR 00965', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Las Cumbres'),
	(168, 'Lizamaira Rodríguez', 18863, NULL, '787-680-2901', 'Bo. Santana Carr. #2, Arecibo, PR  00612', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Arecibo Santana'),
	(169, 'Joel Jácome', 18864, NULL, '787-709-4772', 'PR-132 Intersección PR-123 Bo. Cañas Urbano Ponce, PR 00731', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Ponce Villa'),
	(170, 'Angel Delgado', 18866, NULL, '939-202-2840', 'Carretera Estatal #2, Km 22.4, Media Luna Ward, Toa Baja, PR  00949', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'La Virgencita'),
	(171, 'Santiago Huezo', 19168, NULL, '939-205-5940', 'Centro Comercial San Patricio Plaza Ave. San Patricio Esq.Roosevelt Río Piedras, PR 00936', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'San Patricio F/C'),
	(172, 'Luis Soto', 20702, NULL, '787-626-4401', 'Carretera Estatal PR#5 Esquina Calle 11 Cataño, PR 00962', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Cataño'),
	(173, 'Angel Delgado', 21907, NULL, '787-665-7889', 'Salida 24, Exp. #22 en B.O. Maguayo, Dorado, PR. 00646', NULL, 0, NULL, '2019-07-25 22:39:28', 1, 0, 'Dorado 2'),
	(174, 'Dayari cliente Betancourt', 1111, 'daybet.1@gmail.com', '(123) 456-7890', 'miranda', '0000-00-00', 0, NULL, '2020-03-02 23:00:38', 1, 0, 'prueba'),
	(177, 'Jenny Escalera', 516, 'santiago.estevez@encantopr.com', '(787) 725-5305', 'Ave. Munoz Rivera, esq. San Juan Bautista 00901', '0000-00-00', 0, NULL, '2020-10-08 16:46:08', 3, 0, 'Puerta de Tierra'),
	(178, 'Jocelyn Serrano', 506, 'santiago.estevez@encantopr.com', '(787) 727-7102', 'Calle Loiza, Esq. corchado, Santurce 00908', '0000-00-00', 0, NULL, '2020-10-09 10:04:40', 3, 0, 'Calle loiza'),
	(180, 'Jorge Landing', 553, 'fernando.morales@encantopr.com', '(787) 768-4705', 'Ave. Campo Rico, int. #190, Sabana Abajo Ind Park 00983', '0000-00-00', 0, NULL, '2020-10-09 10:15:06', 3, 0, 'Campo Rico 2'),
	(181, 'Miguel Quinones', 532, 'fernando.morales@encantopr.com', '(787) 763-3230', 'Calle #31, Bo. Sabana Llana, 65 Inf. 00928', '0000-00-00', 0, NULL, '2020-10-09 10:18:08', 3, 0, '65 Infanteria'),
	(182, 'Yomar Morales', 528, 'fernando.morales@encantopr.com', '(787) 755-5480', 'Calle Saratoga, Park Garden km. 0.9 Trujillo Alto 00976', '0000-00-00', 0, NULL, '2020-10-09 10:24:05', 3, 0, 'Trujillo Alto'),
	(183, 'Neisha Calzada', 817, 'fernando.morales@encantopr.com', '(787) 418-0418', 'Local #12, Ave. J. Galerias del Escorial, Carolina, PR.', '0000-00-00', 0, NULL, '2020-10-09 10:26:17', 3, 0, 'Escorial'),
	(184, 'Migdalia Flores', 514, 'fernando.morales@encantopr.com', '(787) 762-4795', 'Carr. #3 Parque Industrial Carolina 00983', '0000-00-00', 0, NULL, '2020-10-09 10:32:50', 3, 0, 'Carolina'),
	(185, 'Carlos Luna', 564, 'fernando.morales@encantopr.com', '(787) 276-5080', 'Los Colobos Shopping Center, Carr. #3, km. 14.3, Carolina 00983', '0000-00-00', 0, NULL, '2020-10-09 10:35:57', 3, 0, 'Los Colobos '),
	(186, 'Ronaldo Gomez', 821, 'fernando.morales@encantopr.com', '(787) 886-0212', 'Plaza Canovanas, Bo. Canovanas, Carr. #3, km. 17.8, Canovanas, P.R 00729', '0000-00-00', 0, NULL, '2020-10-09 10:38:28', 3, 0, 'Canovanas 2'),
	(187, 'Yahaira Rosario', 594, 'fernando.morales@encantopr.com', '(787) 809-7777', 'Carr. #3, km. 28.2 Rio Grande, P.R. 00745', '0000-00-00', 0, NULL, '2020-10-09 10:56:13', 3, 0, 'Rio Grande 2 State'),
	(188, 'Jorge Landing', 553, 'fernando.morales@encantopr.com', '(787) 768-4705', 'Ave. Campo Rico, int. #190, Sabana Abajo Ind Park 00983', '0000-00-00', 0, NULL, '2020-10-09 10:53:35', 3, 0, 'Campo Rico 2 Lift Station'),
	(189, 'Yahaira Rosario', 594, 'fernando.morales@encantopr.com', '(787) 809-7777', 'Carr. #3, km. 28.2 Rio Grande, P.R. 00745', '0000-00-00', 0, NULL, '2020-10-09 10:55:27', 3, 0, 'Rio Grande 2 State Lift Station'),
	(190, 'Yarelis Prado', 543, 'fernando.morales@encantopr.com', '(787) 889-5780', 'Plaza Oriente shopping, carr. #3, km. 36.2 Luquillo 00773', '0000-00-00', 0, NULL, '2020-10-09 11:03:19', 3, 0, 'Luquillo'),
	(191, 'Yarelis Prado', 543, 'fernando.morales@encantopr.com', '(787) 889-5780', 'Plaza Oriente shopping, carr. #3, km. 36.2 Luquillo 00773', '0000-00-00', 0, NULL, '2020-10-09 11:04:28', 3, 0, 'Luquillo Lift Station'),
	(192, 'Jose Aponte', 546, 'fernando.morales@encantopr.com', '(787) 860-4180', 'Carr. Estatal #3 km 46.0 Quebrada Ward, Fajardo 00738', '0000-00-00', 0, NULL, '2020-10-09 11:14:56', 3, 0, 'Fajardo'),
	(193, 'Jose Aponte', 546, 'fernando.morales@encantopr.com', '(787) 860-4180', 'Carr. Estatal #3 km 46.0 Quebrada Ward, Fajardo 00738', '0000-00-00', 0, NULL, '2020-10-09 11:17:22', 3, 0, 'Fajardo Lift Statioj'),
	(194, 'Gerardo Ocasio', 824, 'fernando.morales@encantopr.com', '(787) 860-8806', 'Punta del Este shopping center inter PR #3 y PR #194, Fajardo PR 00738', '0000-00-00', 0, NULL, '2020-10-09 11:19:56', 3, 0, 'Fajardo 2'),
	(195, 'Xiomara Poupart', 804, 'fernando.morales@encantopr.com', '(787) 863-5701', 'Carr. #3 km. 49.7 Quebrada Vueltas Fajardo PR 00738', '0000-00-00', 0, NULL, '2020-10-09 11:21:54', 3, 0, 'Ceiba'),
	(196, 'Jonuel Perez', 538, 'john.gonzalez@encantopr.com', '(787) 846-2848', 'BO. Florida (afuera) entre carr. #150 y #2 00617', '0000-00-00', 0, NULL, '2020-10-09 11:26:31', 3, 0, 'Barceloneta 1'),
	(197, 'Keishla Barreto', 820, 'john.gonzalez@encantopr.com', '(787) 965-2988', 'Barceloneta Shopping center, PR. 140 int carr. #2 Bo. Florida Afuera, Barceloneta PR.', '0000-00-00', 0, NULL, '2020-10-09 11:31:07', 3, 0, 'Barceloneta 2'),
	(198, 'prueba', 123, 'pruebas@pruebas.com', '(123) 456-7899', 'aaaaa#bbb,ccc.', '0000-00-00', 0, NULL, '2020-10-09 12:12:22', 4, 0, 'caracas'),
	(199, 'Luis A Ortiz', 530, 'fernando.morales@encantopr.com', '(787) 887-4406', 'Carr #3 km. 22.9 Parque Industrial, Rio Grande 00745', '0000-00-00', 0, NULL, '2020-10-09 12:14:33', 3, 0, 'Rio Grande'),
	(200, 'Yashira Ramos', 624, 'fernando.morales@encantopr.com', '(787) 701-7474', 'Isla Verde Food Mall, Carr. 187,  Km. 1.0, Isla Verde,  Carolina, P.R.  00979', '0000-00-00', 0, NULL, '2020-10-09 15:36:11', 5, 0, 'Isla verde'),
	(201, 'Efrain Bigio', 689, 'fernando.morales@encantopr.com', '(787) 769-7474', 'Calle 1, Bloque A, Urb. Castellana Gdns.Carolina, PR  00983', '0000-00-00', 0, NULL, '2020-10-09 15:40:53', 5, 0, 'Campo Rico'),
	(202, 'Emilio Miranda', 653, 'fernando.morales@encantopr.com', '(787) 250-7474', 'Ave. 65 Infanteria, Km. 3.1, Sabana Llana, Rio Piedras, P.R.  00927', '0000-00-00', 0, NULL, '2020-10-09 15:44:31', 5, 0, '65 Infanteria'),
	(203, 'David Sanchez', 1702, 'fernando.morales@encantopr.com', '(787) 791-1050', 'ISLA VERDE FC, CARR 187 #6080 CAROLINA  00979', '0000-00-00', 0, NULL, '2020-10-14 14:03:30', 4, 0, 'Isla verde'),
	(204, 'Jorge Landing', 553, 'fernando.morales@encantopr.com', '(787) 768-4705', 'AVE. CAMPO RICO, INT #190, SABANA ABAJO IND PAK 00983', '0000-00-00', 0, NULL, '2020-10-14 14:09:58', 4, 0, 'Campo Rico 2'),
	(205, 'Jorge Landing', 553, 'fernando.morales@encantopr.com', '(787) 768-4705', 'AVE. CAMPO RICO, INT #190, SABANA ABAJO IND PAK 00983', '0000-00-00', 0, NULL, '2020-10-14 14:10:56', 4, 0, 'Campo Rico 2 Lift Station'),
	(206, 'Pedro Altreche', 124, 'cmelendez@irsipr.com', '(787) 725-5657', '1451 Av. Ashford, San Juan, 00907', '0000-00-00', 0, NULL, '2020-11-02 10:21:26', 10, 0, 'Condado '),
	(207, 'Pedro Altreche', 1020, 'cmelendez@irsipr.com', '(787) 791-3200', 'Av. Isla Verde, Carolina, 00968', '0000-00-00', 0, NULL, '2020-11-04 14:10:25', 10, 0, 'Isla verde'),
	(208, 'Jordalys Alejandro Rodriguez', 2020, 'jalejandro@presbypr.com', '(787) 721-2160', 'Ashford Presbyterian Community Hospital 1451 Ashford Avenue, San Juan PR  00907-1511', '0000-00-00', 0, NULL, '2020-11-05 16:50:13', 7, 0, 'Ashpford Presbyterian Condado'),
	(209, 'usuario prueba', 333, 'pruebase57@gmail.com', '(123) 456-7890', 'Altavista calle 5', '0000-00-00', 0, NULL, '2021-09-21 21:18:48', 4, 0, 'caracas');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;

-- Volcando estructura para tabla ret_db.compras
CREATE TABLE IF NOT EXISTS `compras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proveedor` int(11) NOT NULL,
  `id_supervisor` int(11) NOT NULL,
  `productos` text COLLATE utf32_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estatus` int(11) NOT NULL DEFAULT 0 COMMENT '0 = activa, 1 = anulada',
  `descripcion` text COLLATE utf32_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- Volcando datos para la tabla ret_db.compras: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` (`id`, `id_proveedor`, `id_supervisor`, `productos`, `fecha`, `estatus`, `descripcion`) VALUES
	(1, 1, 1, '[{"id":"53","descripcion":"Bomba Hidrostatica","cantidad":"5","stock":"13"},{"id":"54","descripcion":"Chapeta","cantidad":"10","stock":"25"},{"id":"57","descripcion":"Cizalla de Tijera","cantidad":"15","stock":"35"}]', '2020-08-26 10:10:36', 0, 'OC prueba'),
	(2, 2, 1, '[{"id":"51","descripcion":"Tensor","cantidad":"30","stock":"48"}]', '2020-08-26 10:13:53', 0, 'OC tensores');
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;

-- Volcando estructura para tabla ret_db.detalle_ruta
CREATE TABLE IF NOT EXISTS `detalle_ruta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ruta` int(11) NOT NULL DEFAULT 0,
  `id_tecnico` int(11) NOT NULL,
  `tipo_servicio` text NOT NULL,
  `detalle` text NOT NULL,
  `comentario` text NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_modif` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla ret_db.detalle_ruta: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `detalle_ruta` DISABLE KEYS */;
INSERT INTO `detalle_ruta` (`id`, `id_ruta`, `id_tecnico`, `tipo_servicio`, `detalle`, `comentario`, `fecha_creacion`, `fecha_modif`) VALUES
	(17, 14, 330, 'recogido-de-liquido', '[{"direccion":"Ave. Munoz Rivera, esq. San Juan Bautista 00901","grupo":"KFC","localizador":"Puerta de Tierra","documento":"516","idCliente":"177","alias":"KFC"},{"direccion":"Calle Loiza, Esq. corchado, Santurce 00908","grupo":"KFC","localizador":"Calle loiza","documento":"506","idCliente":"178","alias":"KFC"},{"direccion":"Ave. Baldorioty de Castro, Calle Esquilín y Linda Vista, Santurce, PR 00907","grupo":"Burger King","localizador":"Baldorioty","documento":"5131","idCliente":"50","alias":"BK"},{"direccion":"Calle Rodríguez Serrá, Esquina Ave. Ashford, Condado, PR 00901","grupo":"Burger King","localizador":"Condado I","documento":"1521","idCliente":"15","alias":"BK"},{"direccion":"Carretera # 187, Esquina Los Gobernadores, Carolina, 00979","grupo":"Burger King","localizador":"Plazoleta Isla Verde","documento":"4595","idCliente":"46","alias":"BK"},{"direccion":"Ave. Boca Cangrejos, Esquina Baldorioty de Castro, Isla Verde, Carolina, PR  00979","grupo":"Burger King","localizador":"Isla Verde ","documento":"2075","idCliente":"16","alias":"BK"},{"direccion":"ISLA VERDE FC, CARR 187 #6080 CAROLINA  00979","grupo":"Taco Bell","localizador":"Isla verde","documento":"1702","idCliente":"203","alias":"TB"},{"direccion":"Isla Verde Food Mall, Carr. 187,  Km. 1.0, Isla Verde,  Carolina, P.R.  00979","grupo":"Pizza Hut","localizador":"Isla verde","documento":"624","idCliente":"200","alias":"PH"},{"direccion":"Av. Isla Verde, Carolina, 00968","grupo":"CHILIS","localizador":"Isla verde","documento":"1020","idCliente":"207","alias":"CH"},{"direccion":"Ashford Presbyterian Community Hospital 1451 Ashford Avenue, San Juan PR  00907-1511","grupo":"Hospitales","localizador":"Ashpford Presbyterian Condado","documento":"2020","idCliente":"208","alias":""}]', 'RUTA 1 AMARILLO', '2020-10-14 14:18:39', '2020-11-04 14:14:02'),
	(18, 16, 330, 'recogido-de-liquido', '[{"direccion":"Ave. 65 Infantería, Km. 7 Hm. 3, Río Piedras, PR 00924","grupo":"Burger King","localizador":"Comandante ","documento":"117","idCliente":"1","alias":"BK"},{"direccion":"Ave. Campo Rico Ext. Contry Club, Río Piedras, PR 00928","grupo":"Burger King","localizador":"Campo Rico I","documento":"348","idCliente":"6","alias":"BK"},{"direccion":"Ave. Campo Rico AL-15 Country Club, San Juan, PR 00982","grupo":"Burger King","localizador":"Campo Rico 2 - Carolina","documento":"5845","idCliente":"58","alias":"BK"},{"direccion":"Caribbean Airport Facilities, Aeropuerto Internacional Luis Muñoz Marín, Carolina, PR 00979","grupo":"Burger King","localizador":"Tiri Airport ","documento":"10069","idCliente":"86","alias":"BK"},{"direccion":"Ave. Campo Rico, int. #190, Sabana Abajo Ind Park 00983","grupo":"KFC","localizador":"Campo Rico 2","documento":"553","idCliente":"180","alias":"KFC"},{"direccion":"Ave. Campo Rico, int. #190, Sabana Abajo Ind Park 00983","grupo":"KFC","localizador":"Campo Rico 2 Lift Station","documento":"553","idCliente":"188","alias":"KFC"},{"direccion":"AVE. CAMPO RICO, INT #190, SABANA ABAJO IND PAK 00983","grupo":"Taco Bell","localizador":"Campo Rico 2","documento":"553","idCliente":"204","alias":"TB"},{"direccion":"AVE. CAMPO RICO, INT #190, SABANA ABAJO IND PAK 00983","grupo":"Taco Bell","localizador":"Campo Rico 2 Lift Station","documento":"553","idCliente":"205","alias":"TB"},{"direccion":"Calle 1, Bloque A, Urb. Castellana Gdns.Carolina, PR  00983","grupo":"Pizza Hut","localizador":"Campo Rico","documento":"689","idCliente":"201","alias":"PH"},{"direccion":"Calle #31, Bo. Sabana Llana, 65 Inf. 00928","grupo":"KFC","localizador":"65 Infanteria","documento":"532","idCliente":"181","alias":"KFC"},{"direccion":"Ave. 65 Infanteria, Km. 3.1, Sabana Llana, Rio Piedras, P.R.  00927","grupo":"Pizza Hut","localizador":"65 Infanteria","documento":"653","idCliente":"202","alias":"PH"},{"direccion":"Solar 170 - A Bloque S, Urb. San Agustín, Barrio Sabana Llana, Río Piedras, PR 00928","grupo":"Burger King","localizador":"San Agustín ","documento":"3560","idCliente":"37","alias":"BK"},{"direccion":"Ave.65 Infantería, Esquina Calle Abad, Urb. Club Manor Bo. Sabana Llena, Río Piedras, PR 00925;1","grupo":"Burger King","localizador":"null","documento":"4821","idCliente":"47","alias":"BK"},{"direccion":"Carretera 176 Intersección Carretera # 838, Río Piedras, PR 00926","grupo":"Burger King","localizador":"Cupey 2 ","documento":"5437","idCliente":"53","alias":"BK"}]', 'RUTA 2 AMARILLO', '2020-10-14 14:24:09', '2020-10-14 14:24:09'),
	(19, 19, 63, 'recogido-de-liquido', '[{"direccion":"Carr. #2, Ave. Llorens Torres, Arecibo Shopping Center, Arecibo, PR 00612","grupo":"Burger King","localizador":"Arecibo","documento":"243","idCliente":"4","alias":"BK"},{"direccion":"Plaza Canovanas, Bo. Canovanas, Carr. #3, km. 17.8, Canovanas, P.R 00729","grupo":"KFC","localizador":"Canovanas 2","documento":"821","idCliente":"186","alias":"KFC"},{"direccion":"Carr. #3, km. 28.2 Rio Grande, P.R. 00745","grupo":"KFC","localizador":"Rio Grande 2 State","documento":"594","idCliente":"187","alias":"KFC"},{"direccion":"Av. Isla Verde, Carolina, 00968","grupo":"CHILIS","localizador":"Isla verde","documento":"1020","idCliente":"207","alias":"CH"}]', 'Limpieza de trampas de grasa', '2021-09-02 10:55:36', '2021-09-02 10:55:36'),
	(20, 20, 63, 'recogido-de-liquido', '[{"direccion":"Isla Verde Food Mall, Carr. 187,  Km. 1.0, Isla Verde,  Carolina, P.R.  00979","grupo":"Pizza Hut","localizador":"Isla verde","documento":"624","idCliente":"200","alias":"PH"},{"direccion":"Calle 1, Bloque A, Urb. Castellana Gdns.Carolina, PR  00983","grupo":"Pizza Hut","localizador":"Campo Rico","documento":"689","idCliente":"201","alias":"PH"},{"direccion":"Ave. 65 Infanteria, Km. 3.1, Sabana Llana, Rio Piedras, P.R.  00927","grupo":"Pizza Hut","localizador":"65 Infanteria","documento":"653","idCliente":"202","alias":"PH"}]', 'RUTA DE PRUEBA', '2021-09-08 10:32:56', '2021-09-08 10:32:56'),
	(21, 21, 61, 'recogido-de-liquido', '[{"direccion":"PO Box 801322","grupo":"Burger King","localizador":"Comandante ","documento":"117","idCliente":"1","alias":"BK"},{"direccion":"Ave. Roberto H. Todd, Santurce, PR 00925","grupo":"Burger King","localizador":"Santurce - Pda 18","documento":"184","idCliente":"3","alias":"BK"},{"direccion":"PO Box 801322","grupo":"Burger King","localizador":"Arecibo","documento":"243","idCliente":"4","alias":"BK"}]', 'de todo ', '2021-09-24 10:05:16', '2021-09-24 10:05:16');
/*!40000 ALTER TABLE `detalle_ruta` ENABLE KEYS */;

-- Volcando estructura para tabla ret_db.grupo_cliente
CREATE TABLE IF NOT EXISTS `grupo_cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf32_spanish_ci NOT NULL,
  `alias` text COLLATE utf32_spanish_ci NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 0 COMMENT '1 = activo , 0 = inactivo',
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_modif` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- Volcando datos para la tabla ret_db.grupo_cliente: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `grupo_cliente` DISABLE KEYS */;
INSERT INTO `grupo_cliente` (`id`, `nombre`, `alias`, `estatus`, `fecha_creacion`, `fecha_modif`) VALUES
	(1, 'Burger King', 'BK', 0, '2019-07-09 22:37:29', '2020-09-09 20:42:59'),
	(3, 'KFC', 'KFC', 0, '2019-08-01 12:35:23', '2020-09-10 10:06:05'),
	(4, 'Taco Bell', 'TB', 0, '2019-08-01 12:35:40', '2020-09-10 10:07:25'),
	(5, 'Pizza Hut', 'PH', 0, '2019-08-01 12:35:56', '2020-09-10 10:35:50'),
	(6, 'Farmaceuticas', '', 0, '2019-08-01 12:36:41', '2019-08-01 12:36:41'),
	(7, 'Hospitales', 'HOSP', 0, '2019-08-01 12:36:55', '2020-11-04 14:16:01'),
	(8, 'Hoteles', 'Htl', 0, '2019-08-01 12:37:05', '2020-10-29 16:16:35'),
	(9, 'Grupo prueba', 'Prueba', 0, '2020-10-30 10:32:46', '2020-10-30 10:32:46'),
	(10, 'CHILIS', 'CH', 0, '2020-11-02 09:43:50', '2020-11-02 09:43:50');
/*!40000 ALTER TABLE `grupo_cliente` ENABLE KEYS */;

-- Volcando estructura para tabla ret_db.incidencias
CREATE TABLE IF NOT EXISTS `incidencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_modif` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_resuelto` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hora_inicio` time NOT NULL COMMENT 'cuando el tecnico le de al boton iniciar trabajo se actualiza este campo ',
  `hora_fin` time NOT NULL,
  `estatus_incidencia` int(11) NOT NULL DEFAULT 0 COMMENT '0=Iniciar, 1=Proceso, 2=Terminado',
  `id_grupo` int(11) NOT NULL DEFAULT 0 COMMENT 'es el id del grupo familiar a quien pertenece la incidencia',
  `id_ruta` int(11) NOT NULL DEFAULT 0,
  `aprobado` int(11) NOT NULL DEFAULT 0 COMMENT 'para confirmar la tercera firma',
  `nombre_usuario_aprobado` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla ret_db.incidencias: ~60 rows (aproximadamente)
/*!40000 ALTER TABLE `incidencias` DISABLE KEYS */;
INSERT INTO `incidencias` (`id`, `id_usuario`, `id_cliente`, `id_tecnico`, `tipo_servicio`, `fecha_visita`, `direccion`, `asunto`, `descripcion`, `prioridad`, `estatus`, `fecha_creacion`, `fecha_modif`, `fecha_resuelto`, `hora_inicio`, `hora_fin`, `estatus_incidencia`, `id_grupo`, `id_ruta`, `aprobado`, `nombre_usuario_aprobado`) VALUES
	(1, '1', 9, 327, 'recogido-de-liquido', '2019-08-24', 'Calle Luna # 54 (Pueblo), Condominio Apolo, Mayagüez, PR 00968', 'Prueba Erick', 'Probando', 'alta', 'cerrado', '2019-08-23 19:40:21', '2019-12-20 00:43:02', '2019-12-20 00:43:02', '17:29:21', '22:43:02', 2, 0, 0, 0, ''),
	(2, '1', 10, 327, 'plomeria', '2019-08-30', 'Calle Marginal KM 7, Carretera Estatal # 1, Barrio Machuelo Bajo, Urb. Valle Verde, Ponce, PR 00731', 'Prueba Plomeria', 'Plomeria', 'baja', 'cerrado', '2019-08-27 09:31:11', '2020-08-26 11:16:05', '2020-08-26 11:16:05', '21:02:17', '10:16:05', 2, 0, 0, 0, ''),
	(4, '1', 3, 327, 'recogido-de-liquido', '2019-08-28', 'Ave. Roberto H. Todd, Santurce, PR 00925', 'Prueba Recogido de Liquido', 'Liquido', 'normal', 'cerrado', '2019-08-27 09:31:51', '2020-01-29 12:50:31', '2020-01-29 12:50:31', '20:14:55', '10:50:31', 2, 0, 0, 0, ''),
	(6, '1', 1, 327, 'limpieza-de-campana', '2019-08-30', '', 'Prueba Limpieza 2', 'Prueba', 'normal', 'cerrado', '2019-08-27 10:16:16', '2020-01-29 12:53:23', '2020-01-29 12:53:23', '20:16:40', '10:53:23', 2, 0, 0, 0, ''),
	(7, '1', 14, 327, 'plomeria', '2019-08-31', 'Carretera Estatal # 2 Km. 14.7 Hato Tejas, Bayamón, PR 00961', 'Mantenimiento de campanas', 'mantenimiento a las campanas, tomar en consideracion el material a utilizar', 'normal', 'cerrado', '2019-08-27 10:31:49', '2020-02-04 19:30:50', '2020-02-04 19:30:50', '20:17:07', '17:30:50', 2, 0, 0, 0, ''),
	(8, '1', 3, 327, 'recogido-de-liquido', '2019-09-27', 'Ave. Roberto H. Todd, Santurce, PR 00925', 'Mantenimiento de grasa', 'mantenimiento&nbsp;', 'alta', 'cerrado', '2019-09-20 12:16:31', '2020-01-29 13:05:40', '2020-01-29 13:05:40', '10:56:30', '11:05:40', 2, 1, 0, 0, ''),
	(9, '1', 123, 327, 'limpieza-de-campana', '2019-09-30', 'Plaza Centro 3 Shopping FC, Ave Muñoz Marín, Carr. Estatal #30 Esquina Rafael Cordero,  Caguas, PR 00725 ', 'Recoger la basura del tanque 3.66', 'test2', 'alta', 'cerrado', '2019-09-20 14:06:53', '2019-12-20 00:02:00', '2019-12-20 00:02:00', '22:01:33', '22:02:00', 2, 1, 0, 0, ''),
	(10, '1', 14, 327, 'recogido-de-liquido', '2019-09-24', 'Carretera Estatal # 2 Km. 14.7 Hato Tejas, Bayamón, PR 00961', 'correa de tiempo', 'test 3', 'normal', 'cerrado', '2019-09-20 14:09:11', '2020-01-29 13:08:56', '2020-01-29 13:08:56', '21:45:38', '11:08:56', 2, 1, 0, 0, ''),
	(11, '1', 15, 327, 'recogido-de-liquido', '2020-09-30', 'Calle Rodríguez Serrá, Esquina Ave. Ashford, Condado, PR 00901', 'prueba 4', 'prueba 5', 'normal', 'cerrado', '2019-09-20 14:18:14', '2020-01-29 13:12:47', '2020-01-29 13:12:47', '10:13:25', '11:12:47', 2, 1, 0, 0, ''),
	(12, '1', 113, 327, 'plomeria', '2019-10-02', 'Plaza Carolina Mall (primer nivel) Ave. Fragoso, Villa Fontana, Carolina, PR 00729', 'tuberia de la cocina', 'llevar material&nbsp;', 'baja', 'asignado', '2019-09-20 14:19:18', '2020-01-29 12:25:56', '0000-00-00 00:00:00', '10:25:56', '00:00:00', 1, 1, 0, 0, ''),
	(13, '1', 13, 327, 'limpieza-de-campana', '2019-09-25', 'Calle México, Esquina Carretera # 833 Parkville, Guaynabo, PR 00955', 'Limpieza de grasa y cocina', 'Limpiar', 'normal', 'cerrado', '2019-09-20 14:24:12', '2020-01-29 13:45:05', '2020-01-29 13:45:05', '10:31:59', '11:45:05', 2, 1, 0, 0, ''),
	(14, '1', 71, 327, 'plomeria', '2019-09-23', 'Ctro. Comercial Plaza Noroeste, Carr.  Estatal # 3 Km. 20.5 Villas de Loíza, Loíza, PR 00795', 'Cambiar tubos de una pulgada', 'Cambiar tubos&nbsp;', 'normal', 'cerrado', '2019-09-20 14:25:37', '2020-11-18 14:41:31', '2020-11-18 14:41:31', '10:58:33', '12:41:31', 2, 1, 0, 0, ''),
	(15, '1', 15, 327, 'recogido-de-liquido', '2019-09-25', 'Calle Rodríguez Serrá, Esquina Ave. Ashford, Condado, PR 00901', 'cambio de bateria fria', 'Prueba 22', 'alta', 'cerrado', '2019-09-20 14:46:16', '2020-01-29 14:26:03', '2020-01-29 14:26:03', '11:58:03', '12:26:03', 2, 1, 0, 0, ''),
	(18, '1', 7, 327, 'recogido-de-liquido', '2019-11-28', '', 'Prueba ', 'Probando', 'normal', 'asignado', '2019-11-27 21:39:01', '2020-01-30 22:29:28', '2020-01-30 14:11:18', '20:29:28', '12:11:18', 1, 1, 0, 0, ''),
	(19, '1', 1, 327, 'limpieza-de-campana', '2019-12-19', 'Ave. 65 Infantería, Km. 7 Hm. 3, Río Piedras, PR 00924', 'mantenimiento campana', 'Esto es una prueba <br>', 'alta', 'cerrado', '2019-12-18 19:03:29', '2020-01-31 22:20:54', '2020-01-31 22:20:54', '20:16:22', '20:20:54', 2, 1, 0, 0, ''),
	(20, '1', 1, 327, 'limpieza-de-campana', '2020-08-25', 'Ave. 65 Infantería, Km. 7 Hm. 3, Río Piedras, PR 00924', 'Limpieza de Campana', 'Limpieza de Campana', 'normal', 'asignado', '2020-08-26 10:48:27', '2020-08-26 10:56:37', '0000-00-00 00:00:00', '09:56:37', '00:00:00', 1, 1, 0, 0, ''),
	(21, '1', 9, 327, 'plomeria', '2020-08-26', 'Calle Luna # 54 (Pueblo), Condominio Apolo, Mayagüez, PR 00968', 'servicio de plomeria', 'servicio de plomeria', 'normal', 'asignado', '2020-08-26 10:52:03', '2020-08-26 11:15:21', '0000-00-00 00:00:00', '10:15:21', '00:00:00', 1, 1, 0, 0, ''),
	(24, '1', 4, 327, 'recogido-de-liquido', '2020-09-07', 'Carr. #2, Ave. Llorens Torres, Arecibo Shopping Center, Arecibo, PR 00612', '1', 'A1 asignación', 'normal', 'cerrado', '2020-09-07 11:34:39', '2020-09-09 08:07:25', '2020-09-09 08:07:25', '07:07:14', '07:07:25', 2, 1, 3, 0, ''),
	(40, '1', 174, 63, 'recogido-de-liquido', '2020-09-12', 'miranda', 'Burger King-1', 'Prueba de RUTAS.', 'normal', 'cerrado', '2020-09-09 10:24:08', '2020-11-05 15:22:26', '2020-11-05 15:22:26', '13:22:16', '13:22:26', 2, 1, 6, 0, ''),
	(41, '1', 175, 63, 'recogido-de-liquido', '2020-09-12', 'caracas', 'KFC-1', 'Prueba de RUTAS.', 'normal', 'cerrado', '2020-09-09 10:24:08', '2020-11-05 15:32:08', '2020-11-05 15:32:08', '13:32:02', '13:32:08', 2, 3, 6, 0, ''),
	(42, '1', 172, 63, 'recogido-de-liquido', '2020-09-12', 'Carretera Estatal PR#5 Esquina Calle 11 Cataño, PR 00962', 'Burger King-1', 'Prueba de RUTAS.', 'normal', 'cerrado', '2020-09-09 10:24:08', '2020-11-05 17:22:06', '2020-11-05 17:22:06', '14:57:15', '15:22:06', 2, 1, 6, 0, ''),
	(47, '1', 7, 63, 'recogido-de-liquido', '2020-09-11', 'Antigua Carretera # 1 de Caguas a Cayey, Caguas, PR 00725', 'Burger King-1', 'lorem ip', 'normal', 'cerrado', '2020-09-10 09:46:42', '2021-02-01 08:51:57', '2020-11-05 18:01:38', '16:01:26', '16:01:38', 2, 1, 10, 1, 'Administrador'),
	(58, '1', 177, 63, 'recogido-de-liquido', '2020-11-09', 'Ave. Munoz Rivera, esq. San Juan Bautista 00901', 'KFC-516-1', 'Limpieza de trampas de grasa', 'normal', 'cerrado', '2020-11-05 14:58:38', '2021-02-01 08:51:57', '2020-11-05 18:03:29', '16:03:16', '16:03:29', 2, 3, 14, 1, 'Administrador'),
	(59, '1', 178, 63, 'recogido-de-liquido', '2020-11-09', 'Calle Loiza, Esq. corchado, Santurce 00908', 'KFC-506-1', 'Limpieza de trampas de grasa', 'normal', 'cerrado', '2020-11-05 14:58:38', '2021-01-27 11:40:03', '2020-11-05 18:23:26', '16:23:15', '16:23:26', 2, 3, 14, 1, 'Administrador'),
	(60, '1', 50, 63, 'recogido-de-liquido', '2020-11-09', 'Ave. Baldorioty de Castro, Calle Esquilín y Linda Vista, Santurce, PR 00907', 'BK-5131-1', 'Limpieza de trampas de grasa', 'normal', 'cerrado', '2020-11-05 14:58:38', '2021-01-27 11:30:43', '2021-01-18 11:10:03', '09:09:49', '09:10:03', 2, 1, 14, 1, 'Administrador'),
	(61, '1', 15, 63, 'recogido-de-liquido', '2020-11-09', 'Calle Rodríguez Serrá, Esquina Ave. Ashford, Condado, PR 00901', 'BK-1521-1', 'Limpieza de trampas de grasa', 'normal', 'cerrado', '2020-11-05 14:58:38', '2021-02-25 09:21:20', '2021-02-25 09:21:20', '07:20:21', '07:21:20', 2, 1, 14, 0, ''),
	(62, '1', 46, 63, 'recogido-de-liquido', '2020-11-09', 'Carretera # 187, Esquina Los Gobernadores, Carolina, 00979', 'BK-4595-1', 'Limpieza de trampas de grasa', 'normal', 'cerrado', '2020-11-05 14:58:38', '2021-02-25 11:38:06', '2021-02-25 09:49:05', '07:36:27', '07:49:05', 2, 1, 14, 1, 'Administrador'),
	(63, '1', 16, 63, 'recogido-de-liquido', '2020-11-09', 'Ave. Boca Cangrejos, Esquina Baldorioty de Castro, Isla Verde, Carolina, PR  00979', 'BK-2075-1', 'Limpieza de trampas de grasa', 'normal', 'cerrado', '2020-11-05 14:58:39', '2021-09-01 15:47:17', '2021-09-01 15:47:17', '14:46:47', '14:47:17', 2, 1, 14, 0, ''),
	(74, '1', 203, 63, 'recogido-de-liquido', '2020-11-10', 'ISLA VERDE FC, CARR 187 #6080 CAROLINA  00979', 'TB-1702-1', 'Limpieza de trampas de grasa', 'normal', 'cerrado', '2020-11-05 15:01:35', '2021-01-27 11:30:43', '2020-11-05 15:38:29', '13:38:21', '13:38:29', 2, 4, 14, 1, 'Administrador'),
	(78, '1', 184, 330, 'plomeria', '2020-11-09', 'Carr. #3 Parque Industrial Carolina 00983', 'Destape KFC Carolina', 'Prueba #5', 'normal', 'cerrado', '2020-11-05 17:05:38', '2020-12-07 11:47:38', '2020-11-05 17:40:58', '15:40:48', '15:40:58', 2, 3, 14, 1, ''),
	(81, '1', 207, 63, 'plomeria', '2020-11-18', 'Av. Isla Verde, Carolina, 00968', 'Destape', 'Prueba 9', 'alta', 'cerrado', '2020-11-18 15:27:54', '2020-12-07 11:43:39', '2020-11-18 15:32:30', '13:32:11', '13:32:30', 2, 10, 0, 1, ''),
	(90, '1', 1, 63, 'recogido-de-liquido', '2021-02-26', 'Ave. 65 Infantería, Km. 7 Hm. 3, Río Piedras, PR 00924', 'BK-117-1', 'RUTA 2 AMARILLO', 'normal', 'cerrado', '2021-02-25 09:14:52', '2021-03-24 15:49:26', '2021-03-24 15:49:26', '14:49:17', '14:49:26', 2, 1, 16, 0, ''),
	(93, '1', 86, 63, 'recogido-de-liquido', '2021-02-26', 'Caribbean Airport Facilities, Aeropuerto Internacional Luis Muñoz Marín, Carolina, PR 00979', 'BK-10069-1', 'RUTA 2 AMARILLO', 'normal', 'cerrado', '2021-02-25 09:14:53', '2021-03-24 15:42:55', '2021-03-24 15:42:55', '14:42:41', '14:42:55', 2, 1, 16, 0, ''),
	(104, '1', 180, 63, 'plomeria', '2021-02-26', 'Ave. Campo Rico, int. #190, Sabana Abajo Ind Park 00983', 'Destape', 'Prueba 1501', 'alta', 'cerrado', '2021-02-25 10:05:40', '2021-09-01 16:07:40', '2021-02-25 11:46:32', '08:19:26', '09:46:32', 2, 3, 0, 1, 'Administrador'),
	(105, '1', 208, 63, 'limpieza-de-campana', '2021-02-25', 'Ashford Presbyterian Community Hospital 1451 Ashford Avenue, San Juan PR  00907-1511', 'Limpieza de campanas', 'Limpieza de extractores y filtros.', 'normal', 'cerrado', '2021-02-25 12:29:40', '2021-09-01 16:06:51', '2021-02-25 12:33:00', '10:32:10', '10:33:00', 2, 7, 0, 1, 'Administrador'),
	(106, '1', 177, 63, 'recogido-de-liquido', '2021-09-02', 'Ave. Munoz Rivera, esq. San Juan Bautista 00901', 'KFC-516-1', 'RUTA 1 AMARILLO', 'normal', 'cerrado', '2021-09-01 16:13:42', '2021-09-02 11:15:22', '2021-09-02 11:15:22', '10:15:12', '10:15:22', 2, 3, 14, 0, ''),
	(107, '1', 178, 63, 'recogido-de-liquido', '2021-09-02', 'Calle Loiza, Esq. corchado, Santurce 00908', 'KFC-506-1', 'RUTA 1 AMARILLO', 'normal', 'asignado', '2021-09-01 16:13:42', '2021-09-02 10:43:37', '0000-00-00 00:00:00', '09:43:37', '00:00:00', 1, 3, 14, 0, ''),
	(108, '1', 50, 63, 'recogido-de-liquido', '2021-09-02', 'Ave. Baldorioty de Castro, Calle Esquilín y Linda Vista, Santurce, PR 00907', 'BK-5131-1', 'RUTA 1 AMARILLO', 'normal', 'cerrado', '2021-09-01 16:13:42', '2021-09-02 09:51:12', '2021-09-02 09:36:24', '08:35:14', '08:36:24', 2, 1, 14, 1, 'Administrador'),
	(109, '1', 15, 63, 'recogido-de-liquido', '2021-09-02', 'Calle Rodríguez Serrá, Esquina Ave. Ashford, Condado, PR 00901', 'BK-1521-1', 'RUTA 1 AMARILLO', 'normal', 'cerrado', '2021-09-01 16:13:42', '2021-09-01 16:15:11', '2021-09-01 16:15:11', '15:14:43', '15:15:11', 2, 1, 14, 0, ''),
	(110, '1', 46, 63, 'recogido-de-liquido', '2021-09-02', 'Carretera # 187, Esquina Los Gobernadores, Carolina, 00979', 'BK-4595-1', 'RUTA 1 AMARILLO', 'normal', 'asignado', '2021-09-01 16:13:42', '2021-09-01 16:34:41', '0000-00-00 00:00:00', '15:34:41', '00:00:00', 1, 1, 14, 0, ''),
	(111, '1', 16, 63, 'recogido-de-liquido', '2021-09-02', 'Ave. Boca Cangrejos, Esquina Baldorioty de Castro, Isla Verde, Carolina, PR  00979', 'BK-2075-1', 'RUTA 1 AMARILLO', 'normal', 'cerrado', '2021-09-01 16:13:42', '2021-09-02 09:51:12', '2021-09-01 16:17:46', '15:15:46', '15:17:46', 2, 1, 14, 1, 'Administrador'),
	(112, '1', 203, 63, 'recogido-de-liquido', '2021-09-02', 'ISLA VERDE FC, CARR 187 #6080 CAROLINA  00979', 'TB-1702-1', 'RUTA 1 AMARILLO', 'normal', 'asignado', '2021-09-01 16:13:42', '2021-09-01 16:13:42', '0000-00-00 00:00:00', '00:00:00', '00:00:00', 0, 4, 14, 0, ''),
	(113, '1', 200, 63, 'recogido-de-liquido', '2021-09-02', 'Isla Verde Food Mall, Carr. 187,  Km. 1.0, Isla Verde,  Carolina, P.R.  00979', 'PH-624-1', 'RUTA 1 AMARILLO', 'normal', 'asignado', '2021-09-01 16:13:42', '2021-09-01 16:13:42', '0000-00-00 00:00:00', '00:00:00', '00:00:00', 0, 5, 14, 0, ''),
	(114, '1', 207, 63, 'recogido-de-liquido', '2021-09-02', 'Av. Isla Verde, Carolina, 00968', 'CH-1020-1', 'RUTA 1 AMARILLO', 'normal', 'asignado', '2021-09-01 16:13:42', '2021-09-02 10:00:47', '0000-00-00 00:00:00', '09:00:47', '00:00:00', 1, 10, 14, 0, ''),
	(115, '1', 208, 330, 'recogido-de-liquido', '2021-09-04', 'Ashford Presbyterian Community Hospital 1451 Ashford Avenue, San Juan PR  00907-1511', 'HOSP-2020-1', 'RUTA 1 AMARILLO', 'normal', 'asignado', '2021-09-01 16:13:42', '2021-09-02 10:23:50', '0000-00-00 00:00:00', '00:00:00', '00:00:00', 0, 7, 14, 0, ''),
	(116, '1', 4, 63, 'recogido-de-liquido', '2021-09-03', 'Carr. #2, Ave. Llorens Torres, Arecibo Shopping Center, Arecibo, PR 00612', 'BK-243-1', 'Limpieza de trampas de grasa', 'normal', 'cerrado', '2021-09-02 10:58:08', '2021-09-22 15:31:16', '2021-09-22 21:31:16', '21:21:04', '21:31:16', 2, 1, 19, 0, ''),
	(117, '1', 186, 63, 'recogido-de-liquido', '2021-09-03', 'Plaza Canovanas, Bo. Canovanas, Carr. #3, km. 17.8, Canovanas, P.R 00729', 'KFC-821-1', 'Limpieza de trampas de grasa', 'normal', 'asignado', '2021-09-02 10:58:08', '2021-09-22 15:31:13', '0000-00-00 00:00:00', '21:31:13', '00:00:00', 1, 3, 19, 0, ''),
	(118, '1', 187, 63, 'recogido-de-liquido', '2021-09-22', 'Carr. #3, km. 28.2 Rio Grande, P.R. 00745', 'Plomeria', 'Limpieza de trampas de grasa', 'normal', 'asignado', '2021-09-02 10:58:08', '2021-09-22 15:32:50', '0000-00-00 00:00:00', '00:00:00', '00:00:00', 0, 3, 19, 0, ''),
	(119, '1', 41, 63, 'recogido-de-liquido', '2021-09-22', 'Centro Médico Fast Food Center, Cafetería Central de Centro Médico, Entre hospital Universitario y Hospital del niño,  Río Piedras, PR 00925 ', 'Vaciado de emergencia', '', 'normal', 'asignado', '2021-09-02 11:04:49', '2021-09-22 15:33:00', '0000-00-00 00:00:00', '00:00:00', '00:00:00', 0, 1, 19, 0, ''),
	(120, '1', 4, 63, 'recogido-de-liquido', '2021-09-03', 'Carr. #2, Ave. Llorens Torres, Arecibo Shopping Center, Arecibo, PR 00612', 'BK - 243', 'Vaciado de emergencia', 'normal', 'cerrado', '2021-09-02 11:09:32', '2021-09-16 10:52:53', '2021-09-16 10:52:53', '09:52:48', '09:52:53', 2, 1, 19, 0, ''),
	(121, '1', 4, 63, 'limpieza-de-campana', '2021-09-02', 'PO Box 801322', 'Limpieza de campanas', '', 'alta', 'cerrado', '2021-09-02 11:22:33', '2021-09-02 11:25:53', '2021-09-02 11:25:53', '10:25:48', '10:25:53', 2, 1, 0, 0, ''),
	(122, '1', 1, 63, 'limpieza-de-campana', '2021-09-02', 'PO Box 801322', 'Limpieza de campanas', '', 'alta', 'cerrado', '2021-09-02 11:30:25', '2021-09-02 11:32:22', '2021-09-02 11:32:22', '10:31:50', '10:32:22', 2, 1, 0, 0, ''),
	(123, '331', 200, 63, 'recogido-de-liquido', '2021-09-08', 'Isla Verde Food Mall, Carr. 187,  Km. 1.0, Isla Verde,  Carolina, P.R.  00979', 'PH-624-1', 'RUTA DE PRUEBA', 'normal', 'cerrado', '2021-09-08 10:42:08', '2021-09-09 12:44:17', '2021-09-09 12:29:26', '11:28:09', '11:29:26', 2, 5, 20, 1, 'Ivelisse Droz'),
	(124, '331', 201, 63, 'recogido-de-liquido', '2021-09-08', 'Calle 1, Bloque A, Urb. Castellana Gdns.Carolina, PR  00983', 'PH-689-1', 'RUTA DE PRUEBA', 'normal', 'cerrado', '2021-09-08 10:42:08', '2021-09-09 12:49:53', '2021-09-09 12:46:04', '11:45:53', '11:46:04', 2, 5, 20, 1, 'Administrador'),
	(125, '331', 202, 63, 'recogido-de-liquido', '2021-09-08', 'Ave. 65 Infanteria, Km. 3.1, Sabana Llana, Rio Piedras, P.R.  00927', 'PH-653-1', 'RUTA DE PRUEBA', 'normal', 'asignado', '2021-09-08 10:42:08', '2021-09-09 12:41:07', '0000-00-00 00:00:00', '11:41:07', '00:00:00', 1, 5, 20, 0, ''),
	(126, '331', 202, 63, 'recogido-de-liquido', '2021-09-16', 'Ave. 65 Infanteria, Km. 3.1, Sabana Llana, Rio Piedras, P.R.  00927', 'PH-653-1', 'RUTA DE PRUEBA', 'normal', 'cerrado', '2021-09-16 08:17:14', '2021-09-16 08:58:37', '2021-09-16 08:58:37', '07:19:39', '07:58:37', 2, 5, 20, 0, ''),
	(127, '1', 203, 63, 'limpieza-de-campana', '2021-09-22', 'ISLA VERDE FC, CARR 187 #6080 CAROLINA  00979', 'Limpieza de campanas', '', 'normal', 'asignado', '2021-09-16 12:11:17', '2021-09-22 15:32:37', '0000-00-00 00:00:00', '21:32:05', '00:00:00', 1, 4, 0, 0, ''),
	(129, '1', 3, 332, 'plomeria', '2021-09-25', 'Ave. Roberto H. Todd, Santurce, PR 00925', 'prueba', 'prueba de alerta', 'normal', 'cerrado', '2021-09-21 21:35:52', '2021-09-21 21:44:05', '2021-09-21 21:44:05', '20:41:34', '20:44:05', 2, 1, 14, 0, ''),
	(130, '1', 9, 61, 'plomeria', '2021-09-23', 'Calle Luna # 54 (Pueblo), Condominio Apolo, Mayagüez, PR 00968', 'dgdhgfhjgfh', 'fghgfhgfjghjghjghjhgj', 'normal', 'asignado', '2021-09-22 12:27:42', '2021-09-22 12:27:42', '0000-00-00 00:00:00', '00:00:00', '00:00:00', 0, 1, 14, 0, ''),
	(131, '1', 1, 61, 'recogido-de-liquido', '2021-09-25', 'PO Box 801322', 'BK-117-1', 'de todo ', 'normal', 'cerrado', '2021-09-24 10:05:39', '2021-10-27 15:26:34', '2021-10-27 21:26:34', '21:26:32', '21:26:34', 2, 1, 21, 0, ''),
	(132, '1', 3, 61, 'recogido-de-liquido', '2021-09-25', 'Ave. Roberto H. Todd, Santurce, PR 00925', 'BK-184-1', 'de todo ', 'normal', 'asignado', '2021-09-24 10:05:40', '2021-09-24 10:05:40', '0000-00-00 00:00:00', '00:00:00', '00:00:00', 0, 1, 21, 0, ''),
	(133, '1', 4, 61, 'recogido-de-liquido', '2021-09-25', 'PO Box 801322', 'BK-243-1', 'de todo ', 'normal', 'asignado', '2021-09-24 10:05:40', '2021-09-24 10:05:40', '0000-00-00 00:00:00', '00:00:00', '00:00:00', 0, 1, 21, 0, '');
/*!40000 ALTER TABLE `incidencias` ENABLE KEYS */;

-- Volcando estructura para tabla ret_db.incidencias_fotos
CREATE TABLE IF NOT EXISTS `incidencias_fotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_incidencia` int(11) NOT NULL,
  `img_url` text COLLATE utf32_spanish_ci DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `nombre` text COLLATE utf32_spanish_ci DEFAULT NULL,
  `tipo` text COLLATE utf32_spanish_ci DEFAULT NULL,
  `tamano` text COLLATE utf32_spanish_ci DEFAULT NULL,
  `extension` text COLLATE utf32_spanish_ci DEFAULT NULL,
  `titulo` text COLLATE utf32_spanish_ci DEFAULT NULL,
  `momento` text COLLATE utf32_spanish_ci DEFAULT NULL COMMENT 'se debe realizar la carga de fotos antes de comenzar y despues de terminar el trabajo se carga otras fotos',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- Volcando datos para la tabla ret_db.incidencias_fotos: ~37 rows (aproximadamente)
/*!40000 ALTER TABLE `incidencias_fotos` DISABLE KEYS */;
INSERT INTO `incidencias_fotos` (`id`, `id_incidencia`, `img_url`, `fecha_creacion`, `nombre`, `tipo`, `tamano`, `extension`, `titulo`, `momento`) VALUES
	(1, 7, 'vistas/img/archivos/1_20190827093607_EXqK18dry7JVzgD_mve2.jpg', '2019-08-27 10:36:07', '1_20190827093607_EXqK18dry7JVzgD_mve2.jpg', 'image/jpeg', '24298', 'jpg', '1_20190827093607_EXqK18dry7JVzgD_mve2', 'archivo'),
	(2, 8, 'vistas/img/archivos/1_20190920111849_giy6zaUp5AGQdVcZNj8S.jpg', '2019-09-20 12:18:49', '1_20190920111849_giy6zaUp5AGQdVcZNj8S.jpg', 'image/jpeg', '99654', 'jpg', '1_20190920111849_giy6zaUp5AGQdVcZNj8S', 'archivo'),
	(6, 1, 'vistas/img/archivos/1_20190930150928_GD_dAmFrtQwKuPBN04Rg.jpg', '2019-09-30 16:09:28', '1_20190930150928_GD_dAmFrtQwKuPBN04Rg.jpg', 'image/jpeg', '4361', 'jpg', '1_20190930150928_GD_dAmFrtQwKuPBN04Rg', 'archivo'),
	(7, 1, 'vistas/img/archivos/1_20190930150928_2cDGFP9zvqmfV_3eKung.jpg', '2019-09-30 16:09:28', '1_20190930150928_2cDGFP9zvqmfV_3eKung.jpg', 'image/jpeg', '11375', 'jpg', '1_20190930150928_2cDGFP9zvqmfV_3eKung', 'archivo'),
	(41, 8, 'vistas/img/incidencias/327_8_SmV3Bb6zfvpCnlw9UhEa.jpg', '2019-12-18 17:38:13', '327_8_SmV3Bb6zfvpCnlw9UhEa.jpg', 'image/jpg', '20264', 'jpg', '327_8_SmV3Bb6zfvpCnlw9UhEa', 'antes'),
	(42, 8, 'vistas/img/incidencias/327_8_MgcFBY8ACDtVNfqpo9Wb.jpg', '2019-12-18 17:43:41', '327_8_MgcFBY8ACDtVNfqpo9Wb.jpg', 'image/jpg', '16373', 'jpg', '327_8_MgcFBY8ACDtVNfqpo9Wb', 'despues'),
	(45, 1, 'vistas/img/incidencias/327_1_ZqazRply5b3gKncBsVk_.jpg', '2019-12-18 19:29:21', '327_1_ZqazRply5b3gKncBsVk_.jpg', 'image/jpg', '145239', 'jpg', '327_1_ZqazRply5b3gKncBsVk_', 'antes'),
	(46, 2, 'vistas/img/incidencias/327_2_FkwhD1v9HbplEyoIgdKC.jpg', '2019-12-18 23:02:17', '327_2_FkwhD1v9HbplEyoIgdKC.jpg', 'image/jpg', '20548', 'jpg', '327_2_FkwhD1v9HbplEyoIgdKC', 'antes'),
	(47, 4, 'vistas/img/incidencias/327_4_sImVX4KzODqyvBGCiS15.jpg', '2019-12-19 22:14:55', '327_4_sImVX4KzODqyvBGCiS15.jpg', 'image/jpg', '145239', 'jpg', '327_4_sImVX4KzODqyvBGCiS15', 'antes'),
	(48, 6, 'vistas/img/incidencias/327_6_PQDLb0lhZ3Fx5UoM2nyJ.jpg', '2019-12-19 22:16:40', '327_6_PQDLb0lhZ3Fx5UoM2nyJ.jpg', 'image/jpg', '16373', 'jpg', '327_6_PQDLb0lhZ3Fx5UoM2nyJ', 'antes'),
	(49, 7, 'vistas/img/incidencias/327_7_etRS64NVnsyOQ8B3Fwfx.jpg', '2019-12-19 22:17:07', '327_7_etRS64NVnsyOQ8B3Fwfx.jpg', 'image/jpg', '14146', 'jpg', '327_7_etRS64NVnsyOQ8B3Fwfx', 'antes'),
	(52, 10, 'vistas/img/incidencias/327_10_P7rOfZJCTGmVFgMe1nXA.jpg', '2019-12-19 23:45:38', '327_10_P7rOfZJCTGmVFgMe1nXA.jpg', 'image/jpg', '12803', 'jpg', '327_10_P7rOfZJCTGmVFgMe1nXA', 'antes'),
	(53, 9, 'vistas/img/incidencias/327_9_dbXqpaT1Y82gLIntyzeA.jpg', '2019-12-20 00:01:33', '327_9_dbXqpaT1Y82gLIntyzeA.jpg', 'image/jpg', '15270', 'jpg', '327_9_dbXqpaT1Y82gLIntyzeA', 'antes'),
	(54, 9, 'vistas/img/incidencias/327_9_NVuytRIvCHGg3Qj89Y5E.jpg', '2019-12-20 00:02:00', '327_9_NVuytRIvCHGg3Qj89Y5E.jpg', 'image/jpg', '18524', 'jpg', '327_9_NVuytRIvCHGg3Qj89Y5E', 'despues'),
	(55, 10, 'vistas/img/incidencias/327_10_OcZJfBurjgT6wzIFLUtl.jpg', '2019-12-20 00:08:34', '327_10_OcZJfBurjgT6wzIFLUtl.jpg', 'image/jpg', '15601', 'jpg', '327_10_OcZJfBurjgT6wzIFLUtl', 'despues'),
	(56, 1, 'vistas/img/incidencias/327_1_glJscbqntiT1vIBzC7Rx.jpg', '2019-12-20 00:14:36', '327_1_glJscbqntiT1vIBzC7Rx.jpg', 'image/jpg', '16373', 'jpg', '327_1_glJscbqntiT1vIBzC7Rx', 'despues'),
	(57, 2, 'vistas/img/incidencias/327_2_X6Ulwgzhr5m3ORHTbDQj.jpg', '2019-12-20 00:57:40', '327_2_X6Ulwgzhr5m3ORHTbDQj.jpg', 'image/jpg', '112212', 'jpg', '327_2_X6Ulwgzhr5m3ORHTbDQj', 'despues'),
	(58, 4, 'vistas/img/incidencias/327_4_GxDnb4YlEa6pk7VmrcfZ.jpg', '2019-12-20 01:01:48', '327_4_GxDnb4YlEa6pk7VmrcfZ.jpg', 'image/jpg', '10588', 'jpg', '327_4_GxDnb4YlEa6pk7VmrcfZ', 'despues'),
	(59, 6, 'vistas/img/incidencias/327_6_IYe2MXKfnhp6xWH_CSm0.jpg', '2020-01-27 20:54:45', '327_6_IYe2MXKfnhp6xWH_CSm0.jpg', 'image/jpg', '200874', 'jpg', '327_6_IYe2MXKfnhp6xWH_CSm0', 'despues'),
	(60, 11, 'vistas/img/incidencias/327_11_SqWh3lvUzP9m8JgfaYu6.jpg', '2020-01-29 12:13:25', '327_11_SqWh3lvUzP9m8JgfaYu6.jpg', 'image/jpg', '29535', 'jpg', '327_11_SqWh3lvUzP9m8JgfaYu6', 'antes'),
	(61, 11, 'vistas/img/incidencias/327_11_uBG4glA89sW_TrzRandE.jpg', '2020-01-29 12:20:55', '327_11_uBG4glA89sW_TrzRandE.jpg', 'image/jpg', '79583', 'jpg', '327_11_uBG4glA89sW_TrzRandE', 'despues'),
	(62, 12, 'vistas/img/incidencias/327_12_tmKMag1sEdwHBc9Dil38.jpg', '2020-01-29 12:25:56', '327_12_tmKMag1sEdwHBc9Dil38.jpg', 'image/jpg', '27006', 'jpg', '327_12_tmKMag1sEdwHBc9Dil38', 'antes'),
	(63, 13, 'vistas/img/incidencias/327_13_NuFlODbmxjdhBr4396Eo.jpg', '2020-01-29 12:31:59', '327_13_NuFlODbmxjdhBr4396Eo.jpg', 'image/jpg', '33429', 'jpg', '327_13_NuFlODbmxjdhBr4396Eo', 'antes'),
	(64, 13, 'vistas/img/incidencias/327_13_yuAw_TzK45CPWnOgNcB7.jpg', '2020-01-29 12:35:59', '327_13_yuAw_TzK45CPWnOgNcB7.jpg', 'image/jpg', '31495', 'jpg', '327_13_yuAw_TzK45CPWnOgNcB7', 'despues'),
	(65, 14, 'vistas/img/incidencias/327_14_fOysxgzbAwtV1M5HTa_X.jpg', '2020-01-29 12:58:33', '327_14_fOysxgzbAwtV1M5HTa_X.jpg', 'image/jpg', '26703', 'jpg', '327_14_fOysxgzbAwtV1M5HTa_X', 'antes'),
	(66, 12, 'vistas/img/incidencias/327_12_vqKk2fxV_pDFOwRXTimr.jpg', '2020-01-29 13:17:25', '327_12_vqKk2fxV_pDFOwRXTimr.jpg', 'image/jpg', '67350', 'jpg', '327_12_vqKk2fxV_pDFOwRXTimr', 'despues'),
	(67, 15, 'vistas/img/incidencias/327_15_7qOYgcoAlPwjDpNy58KL.jpg', '2020-01-29 13:58:03', '327_15_7qOYgcoAlPwjDpNy58KL.jpg', 'image/jpg', '67350', 'jpg', '327_15_7qOYgcoAlPwjDpNy58KL', 'antes'),
	(68, 15, 'vistas/img/incidencias/327_15_AN5Q_cdIX9foF1agsRCn.jpg', '2020-01-29 14:24:15', '327_15_AN5Q_cdIX9foF1agsRCn.jpg', 'image/jpg', '33429', 'jpg', '327_15_AN5Q_cdIX9foF1agsRCn', 'despues'),
	(90, 18, 'vistas/img/incidencias/327_18_VQ9T5pBJ4Ud_jwFOocYv.jpg', '2020-01-30 22:29:28', '327_18_VQ9T5pBJ4Ud_jwFOocYv.jpg', 'image/jpg', '126171', 'jpg', '327_18_VQ9T5pBJ4Ud_jwFOocYv', 'antes'),
	(91, 18, 'vistas/img/incidencias/327_18_fPbRok34V0XeThmK6t1D.jpg', '2020-01-30 22:29:28', '327_18_fPbRok34V0XeThmK6t1D.jpg', 'image/jpg', '516752', 'jpg', '327_18_fPbRok34V0XeThmK6t1D', 'antes'),
	(92, 19, 'vistas/img/incidencias/327_19_aXwMHBYgN97dRne_AbFr.jpg', '2020-01-31 22:16:22', '327_19_aXwMHBYgN97dRne_AbFr.jpg', 'image/jpeg', '264838', 'jpg', '327_19_aXwMHBYgN97dRne_AbFr', 'antes'),
	(93, 19, 'vistas/img/incidencias/327_19_NZhHXnrAR9Cit3Ml0Be1.png', '2020-01-31 22:16:49', '327_19_NZhHXnrAR9Cit3Ml0Be1.png', 'image/png', '370317', 'png', '327_19_NZhHXnrAR9Cit3Ml0Be1', 'despues'),
	(94, 82, 'vistas/img/archivos/1_20201118204715_pvfuQO3diEx2ZYGJbwRF.jpg', '2020-11-18 22:47:15', '1_20201118204715_pvfuQO3diEx2ZYGJbwRF.jpg', 'image/jpeg', '113397', 'jpg', '1_20201118204715_pvfuQO3diEx2ZYGJbwRF', 'archivo'),
	(95, 82, 'vistas/img/incidencias/1_82_RLXjwqxPmeYdglnAE2Op.jpg', '2020-11-18 22:48:55', '1_82_RLXjwqxPmeYdglnAE2Op.jpg', 'image/jpeg', '113397', 'jpg', '1_82_RLXjwqxPmeYdglnAE2Op', 'antes'),
	(98, 86, 'vistas/img/incidencias/1_86_3eSAuJlj2k57OIqXDnUY.jpg', '2021-01-06 12:43:18', '1_86_3eSAuJlj2k57OIqXDnUY.jpg', 'image/jpeg', '200240', 'jpg', '1_86_3eSAuJlj2k57OIqXDnUY', 'antes'),
	(99, 62, 'vistas/img/incidencias/63_62_d78N9IHOTKy1qGolt3zg.jpg', '2021-02-25 09:41:16', '63_62_d78N9IHOTKy1qGolt3zg.jpg', 'image/jpeg', '2134460', 'jpg', '63_62_d78N9IHOTKy1qGolt3zg', 'despues'),
	(100, 62, 'vistas/img/incidencias/63_62_dhwfcES2ImyXAjJnz0Fe.jpg', '2021-02-25 09:43:52', '63_62_dhwfcES2ImyXAjJnz0Fe.jpg', 'image/jpeg', '2322330', 'jpg', '63_62_dhwfcES2ImyXAjJnz0Fe', 'antes');
/*!40000 ALTER TABLE `incidencias_fotos` ENABLE KEYS */;

-- Volcando estructura para tabla ret_db.movimiento_inventario
CREATE TABLE IF NOT EXISTS `movimiento_inventario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_incidencia` int(11) NOT NULL DEFAULT 0 COMMENT 'solo aplica cuando es una salida del inventario , del resto debe ser cero ',
  `id_compra` int(11) NOT NULL DEFAULT 0,
  `id_producto` text COLLATE utf32_spanish_ci NOT NULL,
  `tipo` text COLLATE utf32_spanish_ci NOT NULL COMMENT 'si es entrada o salida',
  `cantidad` int(11) NOT NULL,
  `id_almacen` text COLLATE utf32_spanish_ci NOT NULL COMMENT 'almacenes, pero la principal ppal',
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_modif` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- Volcando datos para la tabla ret_db.movimiento_inventario: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `movimiento_inventario` DISABLE KEYS */;
INSERT INTO `movimiento_inventario` (`id`, `id_incidencia`, `id_compra`, `id_producto`, `tipo`, `cantidad`, `id_almacen`, `fecha_creacion`, `fecha_modif`) VALUES
	(1, 0, 1, '53', 'entrada', 5, 'ppal', '2020-08-26 09:10:36', '2020-08-26 09:10:36'),
	(2, 0, 1, '54', 'entrada', 10, 'ppal', '2020-08-26 09:10:36', '2020-08-26 09:10:36'),
	(3, 0, 1, '57', 'entrada', 15, 'ppal', '2020-08-26 09:10:36', '2020-08-26 09:10:36'),
	(4, 0, 2, '51', 'entrada', 30, 'ppal', '2020-08-26 09:13:53', '2020-08-26 09:13:53');
/*!40000 ALTER TABLE `movimiento_inventario` ENABLE KEYS */;

-- Volcando estructura para tabla ret_db.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `tipo` text COLLATE utf8_spanish_ci NOT NULL COMMENT 'si es servicio o venta',
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `ventas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla ret_db.productos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `tipo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `fecha`) VALUES
	(1, 1, '101', 'venta', 'Aspiradora Industrial ', 'vistas/img/productos/101/105.png', 13, 1000, 1200, 2, '2019-04-12 13:37:51'),
	(62, 8, '801', 'servicio', 'Purple Degreaser', 'vistas/img/productos/default/anonymous.png', 1, 0, 0, 1, '2021-02-25 11:54:20');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla ret_db.proveedores
CREATE TABLE IF NOT EXISTS `proveedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf32_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `email` text COLLATE utf32_spanish_ci NOT NULL,
  `telefono` text COLLATE utf32_spanish_ci NOT NULL,
  `direccion` text COLLATE utf32_spanish_ci NOT NULL,
  `ordenes` int(11) NOT NULL COMMENT 'numero de ordenes generada',
  `ultima_orden` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- Volcando datos para la tabla ret_db.proveedores: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT INTO `proveedores` (`id`, `nombre`, `documento`, `email`, `telefono`, `direccion`, `ordenes`, `ultima_orden`, `fecha`) VALUES
	(2, 'proveedor ATK', 12457890, 'pruebas@pruebas.com', '(123) 098-7654', 'puerto rico', 0, '0000-00-00 00:00:00', '2020-08-26 10:12:22');
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;

-- Volcando estructura para tabla ret_db.rutas
CREATE TABLE IF NOT EXISTS `rutas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text CHARACTER SET utf32 COLLATE utf32_spanish_ci NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT 0 COMMENT '1 = activo , 0 = inactivo',
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_modif` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla ret_db.rutas: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `rutas` DISABLE KEYS */;
INSERT INTO `rutas` (`id`, `nombre`, `estatus`, `fecha_creacion`, `fecha_modif`) VALUES
	(14, 'RUTA A1', 0, '2020-10-14 14:13:49', '2020-11-02 10:05:15'),
	(16, 'RUTA A2', 0, '2020-10-14 14:20:43', '2020-11-02 10:05:26'),
	(19, 'RUTA A3', 0, '2021-09-02 10:53:13', '2021-09-02 10:53:13'),
	(20, 'RUTA DE PRUEBA', 0, '2021-09-08 10:31:33', '2021-09-08 10:31:33'),
	(21, 'Nuevo horizonte ', 0, '2021-09-24 10:04:57', '2021-09-24 10:04:57');
/*!40000 ALTER TABLE `rutas` ENABLE KEYS */;

-- Volcando estructura para tabla ret_db.servicio_general
CREATE TABLE IF NOT EXISTS `servicio_general` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_modif` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estatus` int(11) NOT NULL DEFAULT 0 COMMENT '0 = activo , 1 = anulado',
  `planta_tratamiento` text COLLATE utf32_spanish_ci NOT NULL,
  `otra_facilidad` text COLLATE utf32_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- Volcando datos para la tabla ret_db.servicio_general: ~30 rows (aproximadamente)
/*!40000 ALTER TABLE `servicio_general` DISABLE KEYS */;
INSERT INTO `servicio_general` (`id`, `id_incidencia`, `vaciado`, `vaciado_parcial`, `otros`, `limpeza_regular`, `inspeccion`, `interceptor_aceite`, `tanque_almacenamiento`, `pozo_septico`, `estacion_bombas`, `tanque_recibidor`, `tanque_aceites`, `otros1`, `interior`, `exterior`, `interior_exterior`, `limpieza_derrame_liquido`, `limpieza_manhole`, `limpieza_lift_station`, `limpieza_tuberias`, `limpieza_tuberias_num`, `limpieza_registros_desagues`, `limpieza_registros_num`, `limpieza_desagues_num`, `remocion_acarreo`, `remocion_grasas`, `otros2`, `vacuum`, `vacuumNum`, `vacuum_portable`, `water_jetter`, `tanktruck`, `otros3`, `coverAll`, `guantes`, `capacete`, `equipo_espacio_confinado`, `otros5`, `comentario`, `desechos_liquidos`, `aguas_residuales`, `aceites_vegetales`, `otros4`, `total_desperciado`, `tecnico_adicional`, `hora_entrada`, `hora_salida`, `fecha_visita`, `fecha_creacion`, `fecha_modif`, `estatus`, `planta_tratamiento`, `otra_facilidad`) VALUES
	(1, 5, 'on', 'on', '', '', '', '', 'on', '', '', 'on', '', '', '', '', '', '', '', 'on', 'off', '', '', '', '', '', '', 'on', 'on', '99', '', '', '', '', '', '', 'on', '', '', 'Test', 'on', '', '', '', '', '2', '09:17:21', '09:17:36', '0000-00-00', '2019-08-27 10:18:28', '2019-08-27 10:18:28', 0, '', ''),
	(2, 16, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'off', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '13:07:05', '15:20:12', '0000-00-00', '2019-09-30 16:20:24', '2019-09-30 16:20:24', 0, '', ''),
	(9, 4, 'on', 'on', 'on', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '20:14:55', '12:49:54', '0000-00-00', '2020-01-29 12:50:31', '2020-01-29 12:50:31', 0, 'on', 'on'),
	(10, 6, 'on', 'on', 'on', 'on', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '20:16:40', '12:53:08', '0000-00-00', '2020-01-29 12:53:23', '2020-01-29 12:53:23', 0, 'on', ''),
	(11, 8, 'on', 'on', 'on', 'on', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '10:56:30', '13:03:52', '0000-00-00', '2020-01-29 13:05:40', '2020-01-29 13:05:40', 0, '', ''),
	(12, 10, '', '', '', '', '', 'on', 'on', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '21:45:38', '13:08:42', '0000-00-00', '2020-01-29 13:08:56', '2020-01-29 13:08:56', 0, '', ''),
	(13, 11, '', '', 'on', 'on', 'on', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '10:13:25', '13:12:03', '0000-00-00', '2020-01-29 13:12:46', '2020-01-29 13:12:46', 0, '', ''),
	(14, 13, '', 'on', 'on', 'on', '', '', '', '', 'on', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '10:31:59', '13:44:50', '0000-00-00', '2020-01-29 13:45:05', '2020-01-29 13:45:05', 0, '', ''),
	(15, 15, '', '', '', '', '', 'on', 'on', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '11:58:03', '14:25:10', '0000-00-00', '2020-01-29 14:26:03', '2020-01-29 14:26:03', 0, '', ''),
	(16, 19, '', 'on', 'on', 'on', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'on', 'on', '', '', '17:05:25', '14:29:09', '0000-00-00', '2020-01-29 14:29:51', '2020-01-31 22:20:54', 0, 'on', 'on'),
	(17, 18, '', 'on', 'on', 'on', '', '', 'on', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '20:25:49', '02:34:20', '0000-00-00', '2020-01-29 22:31:11', '2020-01-30 14:11:18', 0, '', ''),
	(18, 24, 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'aaaa', 'on', '', '', '', '', '', '07:07:14', '07:07:26', '0000-00-00', '2020-09-09 08:08:01', '2020-09-09 08:08:01', 0, 'on', ''),
	(19, 40, '', 'on', '', '', '', 'on', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', 'on', '15444', '', '', '', '', '', 'on', '', '', '', 'Prueba #1.', 'on', '', '', '', '200', 'Jose Lopez', '13:22:16', '13:22:27', '0000-00-00', '2020-11-05 15:25:43', '2020-11-05 15:25:43', 0, '', 'on'),
	(20, 41, 'on', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '', 'Prueba #2', 'on', '', '', '', '500', '', '13:32:02', '13:32:09', '0000-00-00', '2020-11-05 15:33:41', '2020-11-05 15:33:41', 0, 'on', ''),
	(21, 74, '', 'on', '', '', '', 'on', '', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', 'on', 'HP-15441', '', '', '', '', '', 'on', '', '', '', 'Prueba #3', 'on', '', '', '', '100', 'Jose Lopez', '13:38:21', '13:38:30', '0000-00-00', '2020-11-05 15:40:02', '2020-11-05 15:40:02', 0, 'on', ''),
	(22, 42, 'on', '', '', '', '', 'on', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '', 'on', '', '', '', '', 'on', '', '', '', '', '', '', '', '', 'Prueba #6', 'on', '', '', '', '100', 'Jose Lopez', '14:57:15', '15:22:07', '0000-00-00', '2020-11-05 17:34:27', '2020-11-05 17:34:27', 0, 'on', ''),
	(23, 58, '', '', '', '', '', 'on', '', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', 'on', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', 'on', '', '', '', '25', '', '16:03:16', '16:03:31', '0000-00-00', '2020-11-05 18:05:14', '2020-11-05 18:05:14', 0, 'on', ''),
	(24, 60, '', 'on', '', '', '', '', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'HP-15441', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Jose Lopez', '09:09:49', '09:10:04', '0000-00-00', '2021-01-18 11:11:26', '2021-01-18 11:11:26', 0, '', 'on'),
	(25, 61, '', 'on', '', '', '', 'on', '', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', 'on', 'on', '', 'on', '1', '', '', '', '', '', 'on', '', '', '', 'Prueba', 'on', '', '', '', '200', '1', '07:20:21', '07:21:20', '0000-00-00', '2021-02-25 09:26:20', '2021-02-25 09:26:20', 0, '', 'on'),
	(26, 62, 'on', '', '', '', '', 'on', '', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', 'on', '', '', 'on', 'HP-15441', '', '', '', '', '', 'on', '', '', '', 'Otra prueba', 'on', '', '', '', '250', 'K. Vega', '07:36:27', '07:49:06', '0000-00-00', '2021-02-25 09:58:15', '2021-02-25 09:58:15', 0, '', 'on'),
	(27, 105, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '10:32:10', '10:33:01', '0000-00-00', '2021-02-25 12:43:27', '2021-02-25 12:43:27', 0, '', 'on'),
	(28, 93, '', 'on', '', '', '', '', '', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', 'on', 'HP-15441', '', '', '', '', '', '', '', '', '', 'Vaciado parcial', 'on', '', '', '', '200', 'Victor Castro', '14:42:41', '14:42:56', '0000-00-00', '2021-03-24 15:45:02', '2021-03-24 15:45:02', 0, '', 'on'),
	(29, 90, '', 'on', '', '', '', 'on', '', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', 'on', '2', '', '', '', '', '', '', '', '', '', 'Vaciado parcial ', '', '', '', '', '200', '', '14:49:17', '14:49:27', '0000-00-00', '2021-03-24 15:50:38', '2021-03-24 15:50:38', 0, '', 'on'),
	(30, 63, '', 'on', '', '', '', 'on', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', 'on', '1', '', '', '', '', '', 'on', '', '', '', 'Esto es otra prueba.', 'on', '', '', '', '200', '1', '14:46:47', '14:47:18', '0000-00-00', '2021-09-01 15:49:51', '2021-09-01 15:49:51', 0, '', 'on'),
	(31, 108, '', 'on', '', '', '', 'on', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', 'on', '1', '', '', '', '', '', 'on', '', '', '', '', 'on', '', '', '', '200', '1', '08:35:14', '08:36:25', '0000-00-00', '2021-09-02 09:47:38', '2021-09-02 09:47:38', 0, '', 'on'),
	(32, 106, 'on', '', '', '', '', '', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '200', '', '10:15:12', '10:15:22', '0000-00-00', '2021-09-02 11:18:58', '2021-09-02 11:18:58', 0, '', 'on'),
	(33, 123, '', '', '', '', 'on', 'on', 'on', 'on', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Array', '11:28:09', '11:29:27', '0000-00-00', '2021-09-09 12:35:33', '2021-10-27 17:21:17', 0, 'on', 'on'),
	(34, 124, '', 'on', '', '', '', '', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '200', '', '11:45:53', '11:46:05', '0000-00-00', '2021-09-09 12:46:59', '2021-09-09 12:46:59', 0, '', 'on'),
	(35, 126, '', 'on', '', '', '', 'on', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', 'on', '1', '', '', '', '', '', 'on', '', '', '', '', 'on', '', '', '', '300', 'KELMIET VEGA', '07:19:39', '07:58:37', '0000-00-00', '2021-09-16 09:11:26', '2021-09-16 09:11:26', 0, 'on', ''),
	(36, 120, 'on', '', '', '', '', 'on', '', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', 'on', '2', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '2000', 'Charlie Colon, Ivelisse Droz', '09:52:48', '09:52:54', '0000-00-00', '2021-09-16 10:56:36', '2021-09-16 10:56:36', 0, 'on', ''),
	(37, 116, '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '', '', 'dfgdfg', 'on', '', '', '', '', '3', '21:21:04', '21:31:16', '0000-00-00', '2021-09-22 15:31:27', '2021-09-22 15:31:27', 0, 'on', 'on');
/*!40000 ALTER TABLE `servicio_general` ENABLE KEYS */;

-- Volcando estructura para tabla ret_db.servicio_plomeria
CREATE TABLE IF NOT EXISTS `servicio_plomeria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_modif` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `productos` text COLLATE utf32_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- Volcando datos para la tabla ret_db.servicio_plomeria: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `servicio_plomeria` DISABLE KEYS */;
INSERT INTO `servicio_plomeria` (`id`, `id_incidencia`, `destape`, `reparacion`, `otros`, `instalacion`, `inspeccion`, `detalle_servicio_regulares`, `banos`, `cocina`, `otros1`, `trampas`, `drenaje`, `detalle_servicio_realizado`, `inspeccion_cctv`, `inspeccion_cctv_num`, `limpieza_tuberia`, `limpieza_tuberia_num`, `inpeccion_controles`, `reparacion_controles`, `limpieza_desagues`, `limpieza_desagues_num`, `limpieza_desagues_registro`, `limpieza_derrame`, `detalle_servicios_especiales`, `k1`, `k2`, `water`, `soplete`, `fuete`, `otros2`, `equipo_seguridad`, `cover`, `guantes`, `botas`, `capacete`, `camara`, `detalle_equipos_utilizados`, `comentario`, `tecnico_adicional`, `hora_entrada`, `hora_salida`, `titulo`, `nombre_letra_molde`, `fecha_visita`, `fecha_creacion`, `fecha_modif`, `productos`) VALUES
	(1, 7, '', 'on', '', '', 'on', '', '', '', '', '', '', '', 'on', '', '', '', '', '', 'on', '', '', 'on', ',mjmj', '', '', '', '', '', '', '', '', '', '', '', '', '', 'knhh', '', '20:17:07', '17:30:50', '', '', '0000-00-00', '2020-02-04 19:32:06', '2020-02-04 19:32:06', ''),
	(2, 2, 'on', '', '', '', 'on', '', '', '', 'on', '', '', '', '', '', 'on', '', 'on', '', '', '', '', '', '', '', 'on', '', '', '', 'on', '', '', '', '', '', '', '', '', '', '21:02:17', '10:16:06', '', '', '0000-00-00', '2020-08-26 11:16:52', '2020-08-26 11:16:52', ''),
	(3, 78, 'on', '', '', '', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', 'on', '1', '2', '', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Victor Castro', '15:40:48', '15:40:59', '', 'Nelson Torres', '0000-00-00', '2020-11-05 17:46:17', '2020-11-05 17:46:17', ''),
	(4, 104, 'on', '', '', '', '', '', '', '', 'on', '', '', 'Destape de línea principal', '', '', '', '', '', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '', 'on', '', '', '', '', '', '', '08:19:26', '09:46:33', 'Gerente', 'Ivelisse', '0000-00-00', '2021-02-25 11:54:20', '2021-02-25 11:54:20', '[{"id":"62","descripcion":"Purple Degreaser","cantidad":"1","stock":"0"},{"id":"44","descripcion":"Escalera de Tijera Aluminio ","cantidad":"4","stock":"16"}]'),
	(5, 129, 'on', '', '', '', 'on', '', 'on', '', '', 'on', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '20:41:34', '20:44:06', 'pablo segura', 'prueba de nombre', '0000-00-00', '2021-09-21 21:51:47', '2021-09-21 21:51:47', '');
/*!40000 ALTER TABLE `servicio_plomeria` ENABLE KEYS */;

-- Volcando estructura para tabla ret_db.soporte
CREATE TABLE IF NOT EXISTS `soporte` (
  `id` int(11) NOT NULL,
  `id_tecnico` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_modif` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish_ci;

-- Volcando datos para la tabla ret_db.soporte: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `soporte` DISABLE KEYS */;
/*!40000 ALTER TABLE `soporte` ENABLE KEYS */;

-- Volcando estructura para tabla ret_db.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_grupo` int(11) NOT NULL DEFAULT 0 COMMENT 'solo aplica si el perfil es Especial',
  `id_cliente` int(11) NOT NULL DEFAULT 0 COMMENT 'se atara con un cliente es decir cliente asociado a un usuario',
  `dispositivo` text COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=333 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla ret_db.usuarios: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`, `id_grupo`, `id_cliente`, `dispositivo`) VALUES
	(1, 'Administrador', 'admin', '$2a$07$asxx54ahjppf45sd87a5auHhDisdvuSxcDBsaoZYMwJrghJ3jkICW', 'Administrador', 'vistas/img/usuarios/admin/656.png', 1, '2021-10-27 16:11:30', '2021-10-27 17:11:30', 0, 0, 'WEB'),
	(61, 'Ashbel Roldan ', 'aroldan', '$2a$07$asxx54ahjppf45sd87a5auHhDisdvuSxcDBsaoZYMwJrghJ3jkICW', 'Tecnico', 'vistas/img/usuarios/aroldan/391.jpg', 1, '2021-10-27 14:26:26', '2021-10-27 15:26:26', 0, 0, 'WEB'),
	(63, 'Roberto Negron', 'colo', '$2a$07$asxx54ahjppf45sd87a5auHhDisdvuSxcDBsaoZYMwJrghJ3jkICW', 'Tecnico', 'vistas/img/usuarios/Colo/459.jpg', 1, '2021-09-23 12:17:34', '2021-09-23 13:17:34', 0, 0, 'WEB'),
	(329, 'Dayari Betancourt', 'dbetancourt', '$2a$07$asxx54ahjppf45sd87a5auHhDisdvuSxcDBsaoZYMwJrghJ3jkICW', 'Cliente', 'vistas/img/usuarios/dbetancourt/207.jpg', 1, '2020-03-02 22:42:49', '2020-03-02 23:42:49', 0, 174, 'WEB'),
	(330, 'Nelson Torres', 'ntorres', '$2a$07$asxx54ahjppf45sd87a5auXpEfw39eDSeIuDz9JiUvTPlngOzU2jq', 'Tecnico', '', 1, '2020-11-05 16:40:13', '2020-11-05 17:40:13', 0, 0, 'WEB'),
	(331, 'Ivelisse Droz', 'Ivelisse', '$2a$07$asxx54ahjppf45sd87a5aum8TTeFur8Ke7naasEiiZShvA9s5tHtG', 'Administrador', '', 1, '2021-09-16 08:33:53', '2021-09-16 09:33:53', 0, 0, 'WEB'),
	(332, 'Juan Perez', 'jperez', '$2a$07$asxx54ahjppf45sd87a5auHhDisdvuSxcDBsaoZYMwJrghJ3jkICW', 'Tecnico', '', 1, '2021-09-21 20:38:56', '2021-09-21 21:38:56', 0, 0, 'WEB');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
