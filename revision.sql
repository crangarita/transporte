-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-05-2016 a las 02:16:15
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `revision`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `frecuencia`
--

CREATE TABLE IF NOT EXISTS `frecuencia` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `meses` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 PACK_KEYS=0 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `frecuencia`
--

INSERT INTO `frecuencia` (`id`, `descripcion`, `meses`) VALUES
(1, 'Mensual', 1),
(2, 'Bimensual', 2),
(3, 'Trimestral', 3),
(4, 'Semestral', 4),
(5, 'Anual', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itemfrecuencia`
--

CREATE TABLE IF NOT EXISTS `itemfrecuencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `frecuencia` int(2) DEFAULT NULL,
  `item` int(11) DEFAULT NULL,
  `estado` varchar(1) DEFAULT 'A',
  PRIMARY KEY (`id`),
  KEY `item` (`item`),
  KEY `frecuencia` (`frecuencia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 PACK_KEYS=0 AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `itemfrecuencia`
--

INSERT INTO `itemfrecuencia` (`id`, `frecuencia`, `item`, `estado`) VALUES
(1, 2, 1, 'A'),
(2, 2, 2, 'A'),
(3, 2, 3, 'A'),
(4, 2, 4, 'A'),
(5, 2, 5, 'A'),
(6, 2, 6, 'A'),
(7, 2, 7, 'A'),
(8, 2, 8, 'A'),
(9, 2, 9, 'A'),
(10, 2, 10, 'A'),
(11, 2, 11, 'A'),
(12, 2, 12, 'A'),
(13, 2, 13, 'A'),
(14, 2, 14, 'A'),
(15, 2, 15, 'A'),
(16, 2, 16, 'A'),
(17, 2, 17, 'A'),
(18, 2, 18, 'A'),
(19, 2, 19, 'A'),
(20, 2, 20, 'A'),
(21, 2, 21, 'A'),
(22, 2, 22, 'A'),
(23, 2, 23, 'A'),
(24, 2, 24, 'A'),
(25, 2, 25, 'A'),
(26, 1, 1, 'A'),
(27, 1, 2, 'A'),
(28, 1, 3, 'A'),
(29, 1, 4, 'A'),
(30, 1, 5, 'A'),
(31, 1, 6, 'A'),
(32, 1, 7, 'A'),
(33, 1, 8, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itemmantenimientoprev`
--

CREATE TABLE IF NOT EXISTS `itemmantenimientoprev` (
  `mantenimiento` int(11) NOT NULL,
  `itemfrecuencia` int(11) NOT NULL,
  `estado` int(1) DEFAULT NULL,
  PRIMARY KEY (`mantenimiento`,`itemfrecuencia`),
  KEY `itemfrecuencia` (`itemfrecuencia`),
  KEY `mantenimiento` (`mantenimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 PACK_KEYS=0;

--
-- Volcado de datos para la tabla `itemmantenimientoprev`
--

INSERT INTO `itemmantenimientoprev` (`mantenimiento`, `itemfrecuencia`, `estado`) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itemrevision`
--

CREATE TABLE IF NOT EXISTS `itemrevision` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `procedimiento` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 PACK_KEYS=0 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `itemrevision`
--

INSERT INTO `itemrevision` (`id`, `descripcion`, `procedimiento`) VALUES
(1, 'Cambios de aceite', NULL),
(2, 'Cambio de filtros', NULL),
(3, 'Revisión de líquidos: frenos', NULL),
(4, 'Revisión de líquidos: Hidraulicos', NULL),
(5, 'Revisión de líquidos: batería', NULL),
(6, 'Engrase', NULL),
(7, 'Estado de las llantas', NULL),
(8, 'Revisión general del Motor', NULL),
(9, 'Revisión de frenos', NULL),
(10, 'Revisión de la suspensión ', NULL),
(11, 'Engrase De Rodamiento', NULL),
(12, 'Revisión de sistema eléctrico, ', NULL),
(13, 'Arranque, ', NULL),
(14, 'Alternador y cableado, fusibles.', NULL),
(15, 'Revisión De Batería ', NULL),
(16, 'Radiador', NULL),
(17, 'Revisión de rines y  cauchos,', NULL),
(18, 'Balineros, crucetas ', NULL),
(19, 'Cardan', NULL),
(20, 'Cambio de valvulinas', NULL),
(21, 'Revisión de correas', NULL),
(22, 'Revisión de puertas y vidrios', NULL),
(23, 'Revisión de la silla del conductor', NULL),
(24, 'Revisión del área de los pasajeros ', NULL),
(25, 'Revisión de equipo de prevención y seguridad', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE IF NOT EXISTS `mantenimiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `vehiculo` int(11) DEFAULT NULL,
  `frecuencia` int(2) DEFAULT NULL,
  `observaciones` varchar(1000) DEFAULT NULL,
  `conductor` varchar(15) DEFAULT NULL,
  `revisor` varchar(15) DEFAULT NULL,
  `tipo` varchar(1) DEFAULT NULL,
  `falla` varchar(1000) DEFAULT NULL,
  `reparacion` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vehiculo` (`vehiculo`),
  KEY `frecuencia` (`frecuencia`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 PACK_KEYS=0 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`id`, `fecha`, `vehiculo`, `frecuencia`, `observaciones`, `conductor`, `revisor`, `tipo`, `falla`, `reparacion`) VALUES
(1, '2016-05-08', 219, 1, 'jajaja                    	                    ', 'Jairo', 'Pedro', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 PACK_KEYS=0 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `descripcion`) VALUES
(1, 'AGRALE'),
(3, 'ARO CARPATY'),
(4, 'ASIATOPIC'),
(5, 'CHEVROLET'),
(6, 'DAIHATSU'),
(7, 'DODGE'),
(8, 'FORD'),
(9, 'HYUNDAI'),
(10, 'KIA'),
(11, 'MAZDA'),
(12, 'MERCURY '),
(13, 'MITSUBISHI'),
(15, 'NISSAN'),
(16, 'NON PLUS'),
(17, 'TOYOTA'),
(18, 'UAZ'),
(19, 'WOLKSWAGE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `documento` varchar(15) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`documento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 PACK_KEYS=0;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietariovehiculo`
--

CREATE TABLE IF NOT EXISTS `propietariovehiculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `persona` varchar(15) DEFAULT NULL,
  `vehiculo` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `persona` (`persona`),
  KEY `vehiculo` (`vehiculo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 PACK_KEYS=0 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `radioaccion`
--

CREATE TABLE IF NOT EXISTS `radioaccion` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 PACK_KEYS=0 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `radioaccion`
--

INSERT INTO `radioaccion` (`id`, `descripcion`) VALUES
(4, 'METROPOLITANO'),
(5, 'NACIONAL'),
(6, 'MUNICIPAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 PACK_KEYS=0 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `descripcion`) VALUES
(7, 'BUS'),
(8, 'BUSETA'),
(9, 'MICROBUS'),
(10, 'CAMIONETA'),
(11, 'CAMPERO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocombustible`
--

CREATE TABLE IF NOT EXISTS `tipocombustible` (
  `id` varchar(1) NOT NULL,
  `descripcion` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 PACK_KEYS=0;

--
-- Volcado de datos para la tabla `tipocombustible`
--

INSERT INTO `tipocombustible` (`id`, `descripcion`) VALUES
('1', 'GASOLINA'),
('2', 'ACPM'),
('3', 'GAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `usuario` varchar(10) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado` varchar(1) NOT NULL,
  `rol` varchar(15) NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario`, `clave`, `nombre`, `estado`, `rol`) VALUES
('carlosa', 'd1b254c9620425f582e27f0044be34bee087d8b4', 'Carlos Rene Angarita Sanguino', 'A', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE IF NOT EXISTS `vehiculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(1) NOT NULL DEFAULT 'S',
  `placa` varchar(10) NOT NULL,
  `marca` int(11) DEFAULT NULL,
  `tipo` int(3) DEFAULT NULL,
  `nummotor` varchar(30) DEFAULT NULL,
  `linea` varchar(50) DEFAULT NULL,
  `numchasis` varchar(50) DEFAULT NULL,
  `tipocarroceria` varchar(50) DEFAULT NULL,
  `cilindraje` varchar(10) DEFAULT NULL,
  `capacidad` int(2) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `servicio` varchar(30) DEFAULT NULL,
  `modelo` varchar(4) DEFAULT NULL,
  `numpuertas` int(11) DEFAULT NULL,
  `combustible` varchar(1) DEFAULT NULL,
  `numlicencia` varchar(20) DEFAULT NULL,
  `radio` int(3) DEFAULT NULL,
  `numtarjoperacional` varchar(30) DEFAULT NULL,
  `fecvenctarjoperacional` date DEFAULT NULL,
  `fecvenctecnomecanico` date DEFAULT NULL,
  `feciniciolabores` date DEFAULT NULL,
  `observacion` text,
  PRIMARY KEY (`id`),
  KEY `combustible` (`combustible`),
  KEY `marca` (`marca`),
  KEY `tipo` (`tipo`),
  KEY `radio` (`radio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=222 ;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id`, `estado`, `placa`, `marca`, `tipo`, `nummotor`, `linea`, `numchasis`, `tipocarroceria`, `cilindraje`, `capacidad`, `area`, `servicio`, `modelo`, `numpuertas`, `combustible`, `numlicencia`, `radio`, `numtarjoperacional`, `fecvenctarjoperacional`, `fecvenctecnomecanico`, `feciniciolabores`, `observacion`) VALUES
(1, 'S', 'SQA-664', 8, 9, '', 'E-34 VAN', '1FTJ534H9RHB69884', NULL, '', 14, NULL, NULL, '1994', NULL, NULL, NULL, 4, '10080541', NULL, '2011-04-19', '2008-06-24', ''),
(2, 'N', 'VIV-040', 4, 9, 'SS-054722', 'HI TOPIC', 'KN2FAD2A1RC005546', NULL, '', 15, NULL, NULL, '1994', NULL, NULL, NULL, 4, '90600063', '2011-06-17', NULL, '2009-06-09', ''),
(3, 'N', 'URD-574', 18, 11, 'URD-574R', '469B', '144300', NULL, '2400', NULL, NULL, NULL, '1988', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1996-09-13', ''),
(4, 'N', 'URC-525', 3, 11, '9983803091', 'CARPATI', '45245', NULL, '2200', NULL, NULL, NULL, '1979', NULL, NULL, NULL, 6, '', '2003-08-27', NULL, '1993-09-01', ''),
(5, 'S', 'XAB-696', 3, 11, '9935903091', 'CARPATI', '44775', NULL, '2400', 14, NULL, NULL, '1979', NULL, NULL, NULL, 4, '101100775', '2012-08-16', '2013-05-15', '1992-09-22', ''),
(6, 'N', 'URD-403', 3, 11, 'URD403', 'CARPATI', '48061', NULL, '2400', NULL, NULL, NULL, '1980', NULL, NULL, NULL, 5, '209668', '2007-04-22', NULL, '2001-12-06', ''),
(7, 'N', 'UVE-674', 18, 11, '71005713', '4020', '234297', NULL, '4000', 10, NULL, NULL, '1978', NULL, NULL, NULL, 5, '510410', '2011-10-20', '2012-01-25', NULL, ''),
(8, 'N', 'XZJ-387', 18, 11, 'XZJ387', '469B', '469B61045884', NULL, '2200', NULL, NULL, NULL, '1984', NULL, NULL, NULL, 6, '', NULL, NULL, '2001-05-22', ''),
(9, 'S', 'URK-683', 19, 8, '4031979', 'SIN LINEA', '9BWV2UV61WRS7001', NULL, '4300', 29, NULL, NULL, '1999', NULL, NULL, NULL, 6, '38802', '2014-05-31', '2013-02-01', '2011-03-01', ''),
(10, 'N', 'UVE-588', 18, 11, '451MT-0401403', '469BT', '', NULL, '2200', NULL, NULL, NULL, '1977', NULL, NULL, NULL, 6, '', NULL, NULL, '1994-08-20', ''),
(11, 'S', 'SRZ-012', 5, 9, '473988', 'NKR', '9GCNKR55EYB541007', NULL, '3000', 19, NULL, NULL, '2000', NULL, NULL, NULL, 6, '28021', '2012-05-31', '2012-12-21', '2010-11-29', ''),
(12, 'S', 'XGB-980', 13, 9, '4G63RV0582', 'L-300', '8X1P13WHLT0000002', NULL, '1997', 12, NULL, NULL, '1996', NULL, NULL, NULL, 6, '34502', '2014-05-31', '2013-02-23', '2010-11-02', ''),
(13, 'S', 'XVL-260', 5, 9, '471713', 'NKR', '9GCNKR55EXB600905', NULL, '4700', 19, NULL, NULL, '1999', NULL, NULL, NULL, 6, '36080', '2014-05-31', '2012-08-24', '2010-09-10', ''),
(14, 'N', 'SGI-502', 10, 9, 'HW138875', 'BESTA', 'KNHTP7352PS314775', NULL, '2184', 13, NULL, NULL, '1993', NULL, NULL, NULL, 6, '26296', '2012-05-31', NULL, '2010-05-31', ''),
(15, 'S', 'SRY-991', 10, 9, 'SH060296', '3600 S(KM)', 'KN3JAP5S1WK099250', NULL, '3600', 19, NULL, NULL, '1998', NULL, NULL, NULL, 6, '38975', '2014-05-31', NULL, '2010-05-13', ''),
(16, 'N', 'XLL-839', 5, 8, '622663', 'NPR/3900', '9GCNPR65PWB101112', NULL, '3900', 30, NULL, NULL, '1998', NULL, NULL, NULL, 6, '25808', '2012-05-31', NULL, NULL, ''),
(17, 'S', 'XVL-256', 5, 9, '471875', 'NKR', '9GNKR55EXB540205', NULL, '4700', 19, NULL, NULL, '1999', NULL, NULL, NULL, 6, '38858', '2014-05-31', '2012-11-30', '2010-04-30', ''),
(18, 'N', 'UYG-789', 11, 9, 'F2764410', 'B2200', 'SPO3934', NULL, '2200', 13, NULL, NULL, '1994', NULL, NULL, NULL, 6, '25795', '2012-05-31', '2012-02-28', '2010-04-21', ''),
(19, 'S', 'URK-547', 5, 9, 'URK547', 'NKR', '9GCNKR55EXB506805', NULL, '2771', 19, NULL, NULL, '1999', NULL, NULL, NULL, 6, '38466', '2014-05-31', '2013-03-08', '2010-03-27', ''),
(20, 'N', 'XZJ-801', 10, 9, 'XZJ801', 'BESTA', 'KNHTP7352RS319163', NULL, '2200', 12, NULL, NULL, '1994', NULL, NULL, NULL, 6, '23659', '2012-05-31', '2011-08-02', '2010-03-18', ''),
(21, 'S', 'SRZ-040', 5, 8, '692699', 'NPR', '9GCNPR71PYB113211', NULL, '3956', 32, NULL, NULL, '2000', NULL, NULL, NULL, 6, '37215', '2014-05-31', '2012-03-10', '2010-03-11', ''),
(22, 'S', 'SRY-714', 5, 8, '617175', 'NPR/3900', '9GCNPR65PWB448208', NULL, '4500', 30, NULL, NULL, '1998', NULL, NULL, NULL, 6, '38804', '2014-05-31', '2012-03-11', '2010-03-11', ''),
(23, 'S', 'SRY-433', 5, 8, '587923', 'NPR/3900', 'NL96389102', NULL, '4500', 30, NULL, NULL, '1997', NULL, NULL, NULL, 6, '38803', '2014-05-31', '2012-05-02', '2010-03-11', ''),
(24, 'S', 'XLL-538', 5, 8, '613716', 'NPR/3900', '9GCNPR65WB446501', NULL, '3900', 30, NULL, NULL, '1998', NULL, NULL, NULL, 6, '34507', '2014-05-31', '2013-01-21', '2010-03-08', ''),
(25, 'N', 'URG-828', 13, 9, 'PN9024', 'L-300', 'P13VJLCLBRB0039', NULL, '2300', 12, NULL, NULL, '1993', NULL, NULL, NULL, 6, '28161', '2012-05-31', '2011-02-10', '2010-02-26', ''),
(26, 'S', 'XWB-936', 6, 9, '1456660', 'V-118', 'V11807211', NULL, '3660', 19, NULL, NULL, '1996', NULL, NULL, NULL, 6, '34508', '2014-05-31', '2012-10-05', '2009-10-15', ''),
(27, 'N', 'XVL-237', 5, 9, '472646', 'NKR', '9GCNKR55EXB540712', NULL, '5200', NULL, NULL, NULL, '1999', NULL, NULL, NULL, 6, '23681', '2012-05-31', '2010-08-28', NULL, ''),
(28, 'N', 'TJA-023', 6, 9, '1638915', 'DELTA', 'V118-60851', NULL, '3660', 19, NULL, NULL, '2000', NULL, NULL, NULL, 6, '26312', '2012-05-31', '2013-01-16', '2009-11-13', ''),
(29, 'N', 'SKG-161', 5, 9, 'CRF105741', 'C-30', '1GACG39K2RF105741', NULL, '4500', 19, NULL, NULL, '1994', NULL, NULL, NULL, 6, '', NULL, NULL, '2009-11-13', ''),
(30, 'S', 'XVH-957', 13, 9, '4G63PV0117', 'L-300', 'DHZP13WRA00357', NULL, '2000', 10, NULL, NULL, '1994', NULL, NULL, NULL, 6, '39469', '2014-01-13', '2012-09-02', '2008-09-23', ''),
(31, 'N', 'SYV-361', 5, 9, '100843', 'LUV2300', 'TSB64430', NULL, '2300', 13, NULL, NULL, '1992', NULL, NULL, NULL, 6, '25792', '2012-05-31', '2012-09-27', '2003-10-04', ''),
(32, 'S', 'SJK-117', 16, 9, 'BD30DLZ07579C', 'MT-3000', 'CKDKE0558WC000105', NULL, '3000', 16, NULL, NULL, '1998', NULL, NULL, NULL, 6, '25796', '2012-05-31', '2013-01-12', '2009-05-05', ''),
(33, 'S', 'XVK-831', 6, 9, '539296', 'DELTA', 'V11856479', NULL, '3600', 19, NULL, NULL, '1998', NULL, NULL, NULL, 6, '36081', '2014-05-31', '2012-11-19', '2009-01-30', ''),
(34, 'S', 'UQQ-980', 5, 9, '505794', 'NKR', '9GCNKR55EWB502502', NULL, '2500', 20, NULL, NULL, '1998', NULL, NULL, NULL, 6, '38979', '2014-05-31', '2012-05-26', '2009-05-05', ''),
(35, 'N', 'SWE403', 5, 9, '313030', 'LUV', 'TS94230129', NULL, '2300', 12, NULL, NULL, '1994', NULL, NULL, NULL, 6, '25802', '2012-05-31', '2011-01-21', NULL, ''),
(36, 'S', 'UQP-483', 5, 9, '876720', 'NKR', '9GCNKR55E3B922803', NULL, '2700', 19, NULL, NULL, '2003', NULL, NULL, NULL, 6, '38976', '2014-05-31', '2011-05-19', NULL, ''),
(37, 'N', 'XVH-616', 13, 9, '4G63PJ3029', 'L-300', 'DHZP13WPA01402', NULL, '1600', 12, NULL, NULL, '1993', NULL, NULL, NULL, 6, '27792', '2012-05-31', '2011-10-02', '2008-08-13', ''),
(38, 'S', 'XVL-308', 5, 9, 'XVL308', 'NKR', '9GCNKR55EYB543509', NULL, '2771', 19, NULL, NULL, '2000', NULL, NULL, NULL, 6, '34506', '2014-05-31', '2013-01-23', NULL, ''),
(39, 'S', 'UZA-705', 6, 9, '1551157', 'DELTA', 'V11856827', NULL, '3660', 19, NULL, NULL, '1998', NULL, NULL, NULL, 6, '39061', '2014-05-31', '2013-02-13', '2011-07-06', ''),
(40, 'S', 'UZA-413', 15, 9, 'Z20887626', 'CERRADO', 'WHCE24009006', NULL, '2000', 15, NULL, NULL, '1993', NULL, NULL, NULL, 6, '38899', '2013-07-19', '2012-08-04', NULL, ''),
(41, 'S', 'SRZ-135', 6, 9, '1651563', 'DELTA', 'V11862271', NULL, '3000', 19, NULL, NULL, '2000', NULL, NULL, NULL, 6, '38805', '2014-05-31', '2012-08-13', NULL, ''),
(42, 'S', 'UVV-247', 6, 9, '1390594', 'V118DJU', 'V11805798', NULL, '3000', 19, NULL, NULL, '1995', NULL, NULL, NULL, 6, '38669', '2014-05-31', '2011-03-03', NULL, ''),
(43, 'N', 'TBK 836', 5, 9, '245620', 'NKR', '9GCNKR5596BOO3759', NULL, '4700', NULL, NULL, NULL, '2006', NULL, NULL, NULL, 6, '10305', '2008-05-31', NULL, '2007-09-21', ''),
(44, 'N', 'URM-108', 5, 9, '874172', 'NKR MWB', '9GCNKR55E3B922201', NULL, '', NULL, NULL, NULL, '2003', NULL, NULL, NULL, 6, '4826', '2008-05-31', NULL, NULL, ''),
(45, 'N', 'XVK-141', 6, 9, '1449600', 'DELTA', 'V11807065', NULL, '', NULL, NULL, NULL, '1996', NULL, NULL, NULL, 6, '4476', '2008-05-31', NULL, NULL, ''),
(46, 'S', 'URH-488', 13, 9, '4G63-QQ2519', 'L-300', 'P13VJLCLESB0078', NULL, '2300', 11, NULL, NULL, '1995', NULL, NULL, NULL, 6, '37216', '2014-05-31', '2013-06-19', NULL, ''),
(47, 'N', 'UWO-083', 11, 9, 'F2710008', 'B-2200', 'B2200-00763', NULL, '2200', NULL, NULL, NULL, '1992', NULL, NULL, NULL, 6, '2611', '2008-05-31', NULL, NULL, ''),
(48, 'N', 'XVH-455', 5, 9, '411131', 'NPR', 'NLC66504', NULL, '', NULL, NULL, NULL, '1993', NULL, NULL, NULL, 6, '16247', '2010-05-31', '2009-07-11', '2008-05-22', ''),
(49, 'S', 'URH-010', 13, 9, 'PM9549', 'L-300', 'P13VJLCLPPB0469', NULL, '2300', 12, NULL, NULL, '1993', NULL, NULL, NULL, 6, '37034', '2014-02-01', '2013-05-19', NULL, ''),
(50, 'N', 'VXE-326', 5, 9, 'VXE-326', 'LUV TFR', 'TS972126', NULL, '2300', NULL, NULL, NULL, '1989', NULL, NULL, NULL, 6, '42414', '2007-09-14', NULL, NULL, ''),
(51, 'N', 'UAF-456', 5, 9, '903295', 'LUV', 'TSA79419', NULL, '2300', 13, NULL, NULL, '1991', NULL, NULL, NULL, 6, '23728', '2012-05-31', '2010-11-27', NULL, ''),
(52, 'N', 'SRC-185', 5, 9, '904208', 'LUV ', 'TSA79406', NULL, 'LUV 2300', 14, NULL, NULL, '1991', NULL, NULL, NULL, 4, '91200342', '2011-12-18', '2012-12-05', NULL, ''),
(53, 'S', 'UTT-572', 13, 9, 'PB-8775', 'L-300', 'P13VJLCLTPB0223', NULL, '2000', 13, NULL, NULL, '1993', NULL, NULL, NULL, 6, '38859', '2013-08-25', '2012-06-10', NULL, ''),
(54, 'N', 'UTT-726', 10, 9, 'HW-126713', 'VESTA', 'KNHTP7352PS307551', NULL, '2200', NULL, NULL, NULL, '1993', NULL, NULL, NULL, 6, '3174', '2008-05-31', NULL, NULL, ''),
(55, 'N', 'SDQ-072', 5, 9, '213964', 'VAN WFR', 'JADWFR12DP100309', NULL, '2300', NULL, NULL, NULL, '1993', NULL, NULL, NULL, 6, '5318', '2008-05-31', NULL, NULL, ''),
(56, 'N', 'UTT-522', 15, 9, 'Z20881690', 'WHGE24D', 'WHGE24008550', NULL, '2400', NULL, NULL, NULL, '1993', NULL, NULL, NULL, 6, '5772', '2008-05-31', NULL, NULL, ''),
(57, 'N', 'VXE-511', 11, 9, 'FE866817', 'B-2000', 'B2OOOO9162', NULL, '2000', 14, NULL, NULL, '1990', NULL, NULL, NULL, 6, '', NULL, NULL, NULL, ''),
(58, 'N', 'VXE-323', 5, 9, '704695', 'LUV-2300', 'TS972121', NULL, '2300', NULL, NULL, NULL, '1989', NULL, NULL, NULL, 6, '4815', '2008-05-31', NULL, NULL, ''),
(59, 'N', 'UTT-837', 10, 9, 'FE-508586', 'VESTA', 'KNHTP735PS11769', NULL, '2000', NULL, NULL, NULL, '1993', NULL, NULL, NULL, 6, '5318', '2008-05-31', NULL, NULL, ''),
(60, 'S', 'SFY-508', 5, 9, '201053', 'LUV', 'TSC44516', NULL, '2300', 13, NULL, NULL, '1993', NULL, NULL, NULL, 6, '37037', '2013-02-19', '2013-03-28', NULL, ''),
(61, 'N', 'UAF-556', 5, 9, '146297', 'LUV', 'TSC47016', NULL, '2300', 13, NULL, NULL, '1992', NULL, NULL, NULL, 4, '91000292', '2011-10-18', NULL, NULL, ''),
(62, 'S', 'SDQ-065', 5, 9, '188176', 'LUV', 'TSC50615', NULL, '2300', 13, NULL, NULL, '1993', NULL, NULL, NULL, 6, '39111', '2013-04-23', '2013-02-17', NULL, ''),
(63, 'S', 'SDQ-915', 17, 9, '3822621', 'HILUX', 'RN855102667', NULL, '2300', 12, NULL, NULL, '1994', NULL, NULL, NULL, 6, '26310', '2012-05-31', '2012-04-16', NULL, ''),
(64, 'S', 'SWE-466', 17, 9, '3882946', 'HILUX', 'RN855112026', NULL, '2300', 13, NULL, NULL, '1994', NULL, NULL, NULL, 6, '38670', '2014-05-31', '2012-07-08', NULL, ''),
(65, 'S', 'SDQ-120', 5, 9, '263822', 'VAN WFR', 'JADWFR12FP7100785', NULL, '2300', 13, NULL, NULL, '1993', NULL, NULL, NULL, 6, '37033', '2013-09-02', '2012-10-11', NULL, ''),
(66, 'S', 'UVP-164', 5, 9, '200913', 'LUV', 'TSC51013', NULL, '2300', 13, NULL, NULL, '1993', NULL, NULL, NULL, 6, '38898', '2013-03-01', '2012-08-09', NULL, ''),
(67, 'N', 'SWE-394', 5, 9, '318132', 'LUV', 'TS94230726', NULL, '2300', NULL, NULL, NULL, '1994', NULL, NULL, NULL, 6, '37061', '2006-08-27', NULL, NULL, ''),
(68, 'S', 'UQA-417', 5, 9, '321966', 'LUV', 'TS94231230', NULL, '2300', 13, NULL, NULL, '1994', NULL, NULL, NULL, 6, '38467', '2014-05-31', '2012-05-25', NULL, ''),
(69, 'N', 'UAF-669', 5, 9, '162269', 'LUV TFR', 'TSC47528', NULL, '2300', 13, NULL, NULL, '1992', NULL, NULL, NULL, 6, '23679', '2012-05-31', '2012-01-18', NULL, ''),
(70, 'N', 'UAF-801', 5, 9, '168427', 'LUV TFR', 'TSC49827', NULL, '2300', NULL, NULL, NULL, '1992', NULL, NULL, NULL, 6, '5385', '2008-05-31', NULL, NULL, ''),
(71, 'S', 'SDQ-063', 15, 9, 'Z20881157X', 'URVAN DLX', '24008479', NULL, '2400', 15, NULL, NULL, '1993', NULL, NULL, NULL, 6, '26306', '2012-05-31', '2012-06-10', NULL, ''),
(72, 'S', 'UAF-531', 5, 9, '149859', 'LUV-2300', 'TSC47808', NULL, '2300', 13, NULL, NULL, '1992', NULL, NULL, NULL, 6, '23727', '2012-05-31', '2012-03-12', NULL, ''),
(73, 'N', 'SFK-519', 5, 9, '737700', 'LUV TFR', 'TS973611', NULL, '2300', NULL, NULL, NULL, '1990', NULL, NULL, NULL, 6, '4061', '2008-05-31', NULL, NULL, ''),
(74, 'N', 'VBG-021', 15, 9, 'Z20870936X', 'URVAN', 'NWHGE24006127AR', NULL, '2300', NULL, NULL, NULL, '1992', NULL, NULL, NULL, 6, '', '2004-02-21', NULL, '2003-02-01', ''),
(75, 'N', 'VIV-367', 16, 9, 'BD3001105ZY', 'ULTRA', 'CKDK0558XC001395', NULL, '2300', NULL, NULL, NULL, '2001', NULL, NULL, NULL, 5, '2077', '2009-04-19', NULL, NULL, ''),
(76, 'N', 'SYV-485', 5, 9, '162276', 'LUV-2300', 'TSC47602', NULL, 'LUV2300', 13, NULL, NULL, '1992', NULL, NULL, NULL, 6, '26295', '2012-05-31', '2012-04-25', NULL, ''),
(77, 'N', 'VXH-798', 10, 9, 'XVHT798HW131147', 'KESTA', 'MNHTP7352PS303391', NULL, '2220', NULL, NULL, NULL, '1993', NULL, NULL, NULL, 6, '4088', '2008-05-31', NULL, NULL, ''),
(78, 'N', 'UVT-357', 4, 9, 'SSO37899', 'HI TOPIC', '3030625', NULL, '2400', NULL, NULL, NULL, '1994', NULL, NULL, NULL, 6, '', '2006-06-02', NULL, NULL, ''),
(79, 'S', 'SDQ-116', 5, 9, '233089', 'LUV TFR', 'TSD-53407', NULL, '2300', 19, NULL, NULL, '1993', NULL, NULL, NULL, 6, '23688', '2012-05-31', '2012-12-23', NULL, ''),
(80, 'N', 'UUJ-753', 7, 8, '4T-13297', 'D-300', '4860633', NULL, '5700', NULL, NULL, NULL, '1984', NULL, NULL, NULL, 6, '25490', '2004-07-18', NULL, '2002-05-23', ''),
(81, 'S', 'XGB-956', 13, 10, '4G3QV0912', 'L-300', 'P13WHLCLTSB0180', NULL, '2000', 9, NULL, NULL, '1995', NULL, NULL, NULL, 6, '34503', '2014-05-31', '2013-05-14', NULL, ''),
(82, 'N', 'SYV-101', 11, 9, '811946', 'B-2000', 'B2000-08056', NULL, '2000', NULL, NULL, NULL, '1990', NULL, NULL, NULL, 6, '5187', '2008-05-31', NULL, NULL, ''),
(83, 'S', 'UVR-021', 17, 9, '3612851', 'HILUX', 'RN855079030', NULL, '7300', 13, NULL, NULL, '1993', NULL, NULL, NULL, 6, '38089', '2013-11-19', '2012-05-25', NULL, ''),
(84, 'N', 'WND-758', 11, 9, 'FE145059', 'B-2000', 'B200011445', NULL, '2000', NULL, NULL, NULL, '1991', NULL, NULL, NULL, 6, '3027', '2008-05-31', NULL, NULL, ''),
(85, 'S', 'SDQ-177', 17, 9, '3613147', 'HILUX', 'RN855079255', NULL, '2400', 15, NULL, NULL, '1993', NULL, NULL, NULL, 6, '37031', '2013-12-21', '2013-04-28', NULL, ''),
(86, 'S', 'UVP-871', 15, 9, '220884854', 'URVAN', 'DHGE24503103', NULL, '2000', 13, NULL, NULL, '1993', NULL, NULL, NULL, 6, '38090', '2013-07-27', '2013-05-25', NULL, ''),
(87, 'N', 'XLA-566', 11, 9, 'FE859211', 'B-2000', '8953', NULL, '2000', NULL, NULL, NULL, '1990', NULL, NULL, NULL, 6, '3025', '2008-05-31', NULL, NULL, ''),
(88, 'N', 'UVV-625', 17, 9, '4125440', 'HILUX', 'RN855141299', NULL, '2400', NULL, NULL, NULL, '1996', NULL, NULL, NULL, 6, '3720', '2008-05-31', NULL, NULL, ''),
(89, 'N', 'SDQ-093', 5, 9, '167317', 'LUV', 'TSC50108', NULL, '2300', NULL, NULL, NULL, '1993', NULL, NULL, NULL, 6, '2229', '2008-05-31', NULL, NULL, ''),
(90, 'S', 'UVQ-918', 5, 9, '233086', 'LUV', 'TSD-53408', NULL, '2300', 13, NULL, NULL, '1993', NULL, NULL, NULL, 6, '37035', '2013-06-01', '2012-05-20', NULL, ''),
(91, 'N', 'SDQ-073', 5, 9, '186469', 'LUV TFR', 'TSC50315', NULL, '2300', NULL, NULL, NULL, '1993', NULL, NULL, NULL, 6, '0.322.', '2008-05-31', NULL, NULL, ''),
(92, 'S', 'UVQ-994', 5, 9, '224548', 'LUV', 'TSD 52327', NULL, '2300', 13, NULL, NULL, '1993', NULL, NULL, NULL, 6, '37032', '2013-11-18', '2012-09-02', NULL, ''),
(93, 'S', 'UVT-356', 11, 9, 'F2-749173', 'B2200', 'B220002731', NULL, '2200', 14, NULL, NULL, '1993', NULL, NULL, NULL, 6, '37030', '2013-06-28', '2013-01-04', NULL, ''),
(94, 'N', 'UVQ-158', 5, 9, '203493', 'LUV-TFR', 'TSC44806', NULL, '2300', 13, NULL, NULL, '1993', NULL, NULL, NULL, 6, '26300', '2012-05-31', NULL, NULL, ''),
(95, 'S', 'UVV-611', 17, 9, '4117998', 'HILUX', 'RN855139340', NULL, '2300', 14, NULL, NULL, '1995', NULL, NULL, NULL, 6, '35764', '2014-05-31', '2012-10-21', NULL, ''),
(96, 'S', 'UVV-518', 17, 9, '4101575', 'HILUX', 'RN855135426', NULL, '2400', 14, NULL, NULL, '1995', NULL, NULL, NULL, 6, '39059', '2014-05-31', '2012-05-16', NULL, ''),
(97, 'S', 'XLD-389', 5, 9, '244843', 'VAN ', 'JADWFR12FP7100541', NULL, '2500', 14, NULL, NULL, '1993', NULL, NULL, NULL, 6, '37036', '2013-06-22', '2012-10-28', NULL, ''),
(98, 'N', 'SDQ-075', 11, 9, 'F2734575', 'B-2200', '1675', NULL, '2200', NULL, NULL, NULL, '1993', NULL, NULL, NULL, 6, '32965', '2005-08-22', NULL, '2001-06-21', ''),
(99, 'S', 'XVN-788', 5, 9, '159436', 'NKR', '9GCNK5565B003250', NULL, '2500', 19, NULL, NULL, '2005', NULL, NULL, NULL, 6, '34509', '2014-05-31', '2013-01-23', '2009-04-01', ''),
(100, 'S', 'UVU-060', 17, 9, '3924954', 'HILUX', 'RN855116704', NULL, '2300', 14, NULL, NULL, '1994', NULL, NULL, NULL, 6, '37217', '2014-05-31', '2012-05-18', NULL, ''),
(101, 'S', 'UVT-175', 17, 9, '3788675', 'HILUX', 'RN855098903', NULL, '2300', 14, NULL, NULL, '1994', NULL, NULL, NULL, 6, '37218', '2014-05-31', '2012-11-17', NULL, ''),
(102, 'S', 'UVT-362', 11, 9, 'F2753833', 'B-2200', 'B220003039', NULL, '2200', 13, NULL, NULL, '1993', NULL, NULL, NULL, 6, '38679', '2013-12-13', '2013-06-02', NULL, ''),
(103, 'N', 'SDQ-289', 11, 9, 'F2763975SP', 'B-2202', '3760', NULL, '2200', NULL, NULL, NULL, '1993', NULL, NULL, NULL, 6, '37275', '2006-09-06', NULL, NULL, ''),
(104, 'N', 'UUA471', 5, 9, '476368', 'NKR', '9GCNKR55EWB65904', NULL, '2700', 19, NULL, NULL, '1998', NULL, NULL, NULL, 6, '26313', '2012-05-31', '2011-05-18', '1998-08-05', ''),
(105, 'S', 'UVV-845', 17, 9, '4124498', 'HILUX', 'RN855141403', NULL, '2300', 14, NULL, NULL, '1996', NULL, NULL, NULL, 6, '34510', '2014-05-31', '2013-01-14', NULL, ''),
(106, 'N', 'UVU-058', 17, 9, '3935561', 'HILUX', 'RN855117788', NULL, '2400', NULL, NULL, NULL, '1994', NULL, NULL, NULL, 6, '1276', '2008-05-31', NULL, NULL, ''),
(107, 'S', 'UVT-510', 17, 9, '3809699', 'HILUX', 'RN855103181', NULL, '2300', 13, NULL, NULL, '1994', NULL, NULL, NULL, 6, '38092', '2014-05-31', '2012-08-24', NULL, ''),
(108, 'N', 'URC-638', 3, 9, '9975503991', '240', '45153', NULL, '2400', NULL, NULL, NULL, '1979', NULL, NULL, NULL, 6, '35926', '2006-07-12', NULL, '1998-12-03', ''),
(109, 'S', 'UVS-798', 17, 9, 'UVS798', 'HILUX', 'RN855084881', NULL, '2400', 14, NULL, NULL, '1995', NULL, NULL, NULL, 6, '38680', '2013-12-08', '2013-03-13', NULL, ''),
(110, 'S', 'TKD-807', 17, 9, '3974293', 'HILUX', 'RN855121978', NULL, '2400', 13, NULL, NULL, '1995', NULL, NULL, NULL, 6, '38468', '2014-05-31', '2012-05-25', NULL, ''),
(111, 'N', 'SRZ-102', 6, 9, '1646493', 'DELTA', 'V11861595', NULL, '3600', 19, NULL, NULL, '2000', NULL, NULL, NULL, 6, '23687', '2012-05-31', '2011-10-22', '2009-09-13', ''),
(112, 'S', 'UVT-354', 11, 9, 'F2768134', 'B-2200', 'B220004620', NULL, '2200', 13, NULL, NULL, '1994', NULL, NULL, NULL, 6, '26993', '2012-05-31', '2011-02-25', NULL, ''),
(113, 'S', 'SDQ-969', 5, 9, '460922', ' LUV TFR', 'TS96280512', NULL, '2200', 13, NULL, NULL, '1996', NULL, NULL, NULL, 6, '38093', '2014-05-31', '2013-05-25', NULL, ''),
(114, 'S', 'UFJ-096', 11, 9, 'F2745775', 'B-2200', 'B220002453', NULL, '2200', NULL, NULL, NULL, '1993', NULL, NULL, NULL, 6, '37038', '2014-05-31', '2012-09-23', NULL, ''),
(115, 'S', 'UQT-306', 13, 9, 'VNO29305', 'L-300', '914VJLRLMPB0339', NULL, '2400', 12, NULL, NULL, '1993', NULL, NULL, NULL, 6, '34504', '2014-05-31', '2013-04-30', '1995-08-10', ''),
(116, 'S', 'XLD-351', 5, 9, 'JS032348', 'WFR', 'JADWFR12FP710399', NULL, '2400', 14, NULL, NULL, '1993', NULL, NULL, NULL, 6, '26303', '2012-05-31', '2012-06-02', '1998-11-30', ''),
(117, 'N', 'XZJ-613', 13, 9, '4G32HP6842', 'L-300', 'DHCP12WNA00572', NULL, '2300', NULL, NULL, NULL, '1992', NULL, NULL, NULL, 6, '25809', '2012-05-31', '2010-11-27', NULL, ''),
(118, 'N', 'SYV-164', 3, 9, '169305-01481', 'ARO-240', '16930501481', NULL, '2400', NULL, NULL, NULL, '1988', NULL, NULL, NULL, 4, '1639', '2008-06-02', NULL, NULL, ''),
(119, 'S', 'SJK-138', 5, 9, '471430', 'NKR', '9GCNKR55EXB601006', NULL, '3000', 19, NULL, NULL, '1999', NULL, NULL, NULL, 6, '38917', '2014-05-31', '2012-09-20', '2009-06-02', ''),
(120, 'S', 'URG-734', 13, 9, 'PM9546', 'L-300', 'P13VJLCLPPB0472', NULL, '2300', 12, NULL, NULL, '1993', NULL, NULL, NULL, 6, '37219', '2013-10-26', '2012-02-29', NULL, ''),
(121, 'N', 'SRY-962', 6, 9, '1582403', 'DELTA', 'V11858279', NULL, '3800', NULL, NULL, NULL, '1999', NULL, NULL, NULL, 6, '25799', '2012-05-31', '2011-08-10', '2009-09-24', ''),
(122, 'S', 'XYC898', 5, 9, '471882', 'NKR', '9GCNKR55EXB540207', NULL, '2700', 19, NULL, NULL, '1999', NULL, NULL, NULL, 6, '26190', '2012-05-31', '2012-07-21', NULL, ''),
(123, 'S', 'UUA-400', 8, 8, '', 'ECOLINE 350', '1FTJS34HOSHGA90724', NULL, '5800', 15, NULL, NULL, '1995', NULL, NULL, NULL, 4, '120201201', '2014-02-16', '2012-05-16', NULL, ''),
(124, 'S', 'SRR-641', 15, 9, 'BD30010335Y', 'TRADE100', 'EENT1CABDCA50436', NULL, '3000', 19, NULL, NULL, '2001', NULL, NULL, NULL, 6, '35765', '2014-05-31', '2012-07-22', '2000-06-20', ''),
(125, 'S', 'SRY-976', 15, 9, 'BD30DLZD08623D', 'TRADE 100', 'EENT1CABDAAE99794', NULL, '3700', 19, NULL, NULL, '1999', NULL, NULL, NULL, 6, '26997', '2012-05-31', '2012-09-06', '2010-06-15', ''),
(126, 'N', 'TLA-015', 1, 9, '4104517', 'MA60TCA', '9CNOAJ54B000769', NULL, '4300', NULL, NULL, NULL, '2004', NULL, NULL, NULL, 4, '1637', '2008-05-25', NULL, NULL, ''),
(127, 'S', 'URK-440', 5, 9, '520845', 'NKR55', '9GCNKR55EWB503410', NULL, '2771', 19, NULL, NULL, '1998', NULL, NULL, NULL, 5, '', NULL, '2011-11-27', NULL, ''),
(128, 'N', 'PZJ-083', 18, 9, '2F-614660', '469B', '469G3280986', NULL, '2400', NULL, NULL, NULL, '1978', NULL, NULL, NULL, 5, '122978', '2008-03-24', NULL, '1999-07-26', ''),
(129, 'N', 'SYV-364', 11, 9, 'F178037SYV364', '', 'B200012683', NULL, '2200', NULL, NULL, NULL, '1992', NULL, NULL, NULL, 6, '20115', '2010-05-31', NULL, NULL, ''),
(130, 'N', 'URC-860', 18, 9, '451MT80206126', '469B', '159970', NULL, '2200', NULL, NULL, NULL, '1978', NULL, NULL, NULL, 6, '', NULL, NULL, '1993-01-15', ''),
(131, 'S', 'XV-L362', 15, 9, 'BD30D16441E', 'SIN LINEA', 'EENT1CBDCA100267', NULL, '3000', 19, NULL, NULL, '2000', NULL, NULL, NULL, 6, '39060', '2014-05-31', '2012-09-02', '2001-07-17', ''),
(132, 'S', 'XVK-824', 9, 8, '601624', 'H350', 'KMFHA17EPWC108232', NULL, '5000', 27, NULL, NULL, '1998', NULL, NULL, NULL, 6, '34505', '2014-05-31', '2011-11-20', '2010-06-10', ''),
(133, 'S', 'URH-409', 13, 9, '4G63QM3341', 'L-300', 'P13WHLCLRRB0513', NULL, '2300', 12, NULL, NULL, '1994', NULL, NULL, NULL, 6, '38091', '2014-05-31', '2013-05-18', '1996-12-13', ''),
(134, 'S', 'UEE-586', 15, 9, 'UEE586', 'URVAN ', 'DHGE24505161', NULL, '2400', 15, NULL, NULL, '1994', NULL, NULL, NULL, 6, '25806', '2012-05-31', '2013-02-03', NULL, ''),
(135, 'N', 'URA-276', 8, 7, 'B615VC75695', 'F-600', 'B615VC75695', NULL, '', NULL, NULL, NULL, '1976', NULL, NULL, NULL, 5, '209497', '2007-02-18', NULL, '2002-12-30', ''),
(136, 'N', 'URB-856', 7, 7, 'T710003C82', 'D-600', 'DT710003', NULL, '', NULL, NULL, NULL, '1977', NULL, NULL, NULL, 5, '', NULL, NULL, NULL, ''),
(137, 'S', 'URB-675', 7, 7, 'T610509C82', 'D-600', 'DT610509', NULL, '5500', 34, NULL, NULL, '1976', NULL, NULL, NULL, 5, '615650', '2012-10-07', '2012-02-03', '2005-02-11', ''),
(138, 'N', 'URB-933', 7, 7, 'T713207C82', 'D-600', 'DT713207', NULL, '', NULL, NULL, NULL, '1978', NULL, NULL, NULL, 4, '728', '2004-06-30', NULL, NULL, ''),
(139, 'S', 'URD-002', 5, 7, 'M201519L86', 'SIN LINEA', 'BM201519', NULL, '7500', 36, NULL, NULL, '1982', NULL, NULL, NULL, 5, '510471', '2011-10-14', '2013-05-10', '2007-02-02', ''),
(140, 'N', 'URB-005', 7, 7, 'T920406C72R', 'D-600', 'DT920406', NULL, '6000', NULL, NULL, NULL, '1979', NULL, NULL, NULL, 4, '717', '2005-11-11', NULL, '2003-10-20', ''),
(141, 'N', 'URB-886', 7, 7, 'URB-886', 'D-600', 'DT712410', NULL, '6000', NULL, NULL, NULL, '1977', NULL, NULL, NULL, 5, '208970', '2006-07-02', NULL, '2002-05-30', ''),
(142, 'N', 'UGA-925', 7, 8, 'UGA925', 'D-300', '', NULL, '6500', NULL, NULL, NULL, '1975', NULL, NULL, NULL, 5, '363120', '2008-12-15', NULL, NULL, ''),
(143, 'N', 'TIA-507', 5, 9, 'CL602307', '', 'CL602307', NULL, '2300', NULL, NULL, NULL, '1986', NULL, NULL, NULL, 6, '1576 METROP.', NULL, NULL, '2000-07-07', ''),
(144, 'S', 'URB-512', 7, 7, '362GM2U0146621', 'D-600', '7000682', NULL, '6000', 34, NULL, NULL, '1975', NULL, NULL, NULL, 5, '637230', '2012-08-30', '2012-04-13', NULL, ''),
(145, 'S', 'WBB-644', 5, 8, '557887', 'NPR/3900', 'NL954442069', NULL, '4000', 27, NULL, NULL, '1996', NULL, NULL, NULL, 5, '510676', '2011-12-10', '2012-08-26', '2007-10-24', ''),
(146, 'N', 'XVJ-834', 5, 8, 'XVJ834', 'P30-133', 'PL105208', NULL, '', NULL, NULL, NULL, '1982', NULL, NULL, NULL, 4, '638', '2005-10-16', NULL, '2000-01-12', ''),
(147, 'N', 'URA-772', 7, 7, 'T710009C82', 'D-600', 'DT710009', NULL, '', NULL, NULL, NULL, '1977', NULL, NULL, NULL, NULL, '', NULL, NULL, '2001-09-28', ''),
(148, 'N', 'URA-539', 7, 7, 'T707716', 'D-600', 'T707716', NULL, '', NULL, NULL, NULL, '1977', NULL, NULL, NULL, 6, '24694', '2004-05-10', NULL, '1999-12-20', ''),
(149, 'N', 'URB-690', 7, 7, 'T610914C82', 'D-600', 'DT610914', NULL, '', NULL, NULL, NULL, '1976', NULL, NULL, NULL, 6, '32317', '2005-07-30', NULL, NULL, ''),
(150, 'N', 'URA-134', 7, 7, 'GT12651', 'D-600', '', NULL, '7560', NULL, NULL, NULL, '1971', NULL, NULL, NULL, 6, '34829', '2006-04-25', NULL, '1999-06-03', ''),
(151, 'N', 'URJ-769', 7, 7, 'GT11525', 'D-600', 'N313458', NULL, '', NULL, NULL, NULL, '1971', NULL, NULL, NULL, 6, '', NULL, NULL, '1999-06-24', ''),
(152, 'S', 'URB-608', 7, 7, '5T7004731', 'D-600', '6250803', NULL, '6500', 34, NULL, NULL, '1976', NULL, NULL, NULL, 5, '615522', '2012-08-30', '2011-07-22', NULL, ''),
(153, 'S', 'URB-297', 7, 7, '4T14103', 'D-600', '4863851', NULL, '3500', 34, NULL, NULL, '1974', NULL, NULL, NULL, 5, '615523', '2012-08-30', '2011-08-06', NULL, ''),
(154, 'N', 'URA-500', 7, 7, 'T634513C82', 'D-600', 'DT634513', NULL, '', NULL, NULL, NULL, '1976', NULL, NULL, NULL, 6, '', NULL, NULL, '1999-03-18', ''),
(155, 'N', 'URA-582', 7, 7, 'FT10675', 'D-600', 'D51FGON103768', NULL, '7500', NULL, NULL, NULL, '1970', NULL, NULL, NULL, 4, '1280', '2007-05-03', NULL, NULL, ''),
(156, 'S', 'URJ-449', 7, 7, 'T625108C82', 'D-600', 'DT625108', NULL, '5500', 34, NULL, NULL, '1976', NULL, NULL, NULL, 5, '615646', '2012-10-12', '2012-08-12', NULL, ''),
(157, 'N', 'URB-169', 7, 7, 'GT-13689', 'D-600', 'N315952', NULL, '7500', NULL, NULL, NULL, '1971', NULL, NULL, NULL, 4, '1581', '2008-01-04', NULL, '1998-11-19', ''),
(158, 'N', 'URJ-758', 7, 8, 'FT12606', 'D-300', 'D31BE0N109199', NULL, '7500', NULL, NULL, NULL, '1970', NULL, NULL, NULL, 5, '209878', '2007-07-29', NULL, NULL, ''),
(159, 'N', 'ITC-659', 7, 8, 'T703208C13', 'D-300', 'PT703208', NULL, '5500', NULL, NULL, NULL, '1977', NULL, NULL, NULL, 5, '122812', '2008-02-14', NULL, NULL, ''),
(160, 'N', 'URB-596', 7, 7, '5T7003334', 'D-600', '7003334', NULL, '', NULL, NULL, NULL, '1975', NULL, NULL, NULL, 6, '', NULL, NULL, '1999-02-02', ''),
(161, 'N', 'URB-303', 7, 7, '4T14337', 'D-600', '4863731', NULL, '', NULL, NULL, NULL, '1974', NULL, NULL, NULL, 6, '34830', '2006-04-25', NULL, '1998-12-01', ''),
(162, 'N', 'URA-453', 7, 7, 'T642408C82', 'D-600', 'DT642408', NULL, '', NULL, NULL, NULL, '1976', NULL, NULL, NULL, 6, '3872', '2006-12-31', NULL, '1999-08-09', ''),
(163, 'N', 'URC-718', 5, 7, 'M004911186', 'C-60', 'BM004911', NULL, '7200', 34, NULL, NULL, '1981', NULL, NULL, NULL, 5, '511139', '2012-05-12', '2011-06-11', NULL, ''),
(164, 'N', 'URA-257', 8, 7, 'B615VC75692', 'F-700', 'B615VC75692', NULL, '', NULL, NULL, NULL, '1976', NULL, NULL, NULL, 6, '', NULL, NULL, '1999-01-16', ''),
(165, 'N', 'URB-288', 7, 7, '4T14364', 'D-600', '4863794', NULL, '7000', NULL, NULL, NULL, '1974', NULL, NULL, NULL, 4, '1279', '2007-05-02', NULL, NULL, ''),
(166, 'N', 'UVE-129', 12, 8, 'M60DOE11803', 'F-600', 'M60DOE11800', NULL, '', NULL, NULL, NULL, '1960', NULL, NULL, NULL, 5, '', NULL, NULL, '1998-07-15', ''),
(167, 'N', 'URJ-895', 7, 7, 'T625406C82', 'D-600', 'DT625406', NULL, '', NULL, NULL, NULL, '1976', NULL, NULL, NULL, 5, '362664', '2008-08-08', NULL, '2002-07-23', ''),
(168, 'N', 'UVE-128', 8, 8, 'F60Z5E18441 CH', '-', 'F6CZ5E18441', NULL, '', NULL, NULL, NULL, '1955', NULL, NULL, NULL, 5, '', NULL, NULL, '1999-07-14', ''),
(169, 'S', 'URC-580', 7, 7, '362GM2U035497', 'D-600', 'DT993809', NULL, '7500', 34, NULL, NULL, '1980', NULL, NULL, NULL, 5, '511148', '2012-05-13', '2011-06-04', NULL, ''),
(170, 'N', 'URB-357', 7, 7, '4T15013', 'D-600', '4866075', NULL, '', NULL, NULL, NULL, '1974', NULL, NULL, NULL, 6, '', NULL, NULL, '1999-01-16', ''),
(171, 'N', 'URA-759', 7, 7, 'GT12649', 'D-600', 'N318812', NULL, '', NULL, NULL, NULL, '1971', NULL, NULL, NULL, 6, '', NULL, NULL, '1999-01-16', ''),
(172, 'N', 'URB-240', 7, 7, 'GT17388', 'D-600', 'N323733', NULL, '', NULL, NULL, NULL, '1973', NULL, NULL, NULL, 6, '', NULL, NULL, '1998-12-12', ''),
(173, 'S', 'UVE-126', 5, 8, '97153960', 'SIN LINEA', '', NULL, '4500', 29, NULL, NULL, '1955', NULL, NULL, NULL, 5, '703249', '2014-02-01', '2013-02-23', '2000-04-25', ''),
(174, 'S', 'SUB-794', 5, 7, '468TM2U528893', 'B660', 'BMA12723', NULL, '8200', 33, NULL, NULL, '1991', NULL, NULL, NULL, 5, '511205', '2012-06-02', '2013-01-11', '2010-06-03', ''),
(175, 'N', 'WRJ-128', 8, 7, 'B60DEED42192', 'B660', 'B60DEEDA42192', NULL, '6600', NULL, NULL, NULL, '1968', NULL, NULL, NULL, 5, '510453', '2011-10-05', '2010-09-01', NULL, ''),
(176, 'N', 'ITD-506', 18, 11, '289907', '469BT', '289907', NULL, '2400', NULL, NULL, NULL, '1978', NULL, NULL, NULL, 5, '362263', '2008-03-31', NULL, '1994-08-23', ''),
(177, 'N', 'UVE-543', 18, 11, '451MT4095255', '469BT', '85012', NULL, '2200', NULL, NULL, NULL, '1974', NULL, NULL, NULL, 5, '', NULL, NULL, '1992-06-04', ''),
(178, 'N', 'XZJ-334', 18, 11, '451MT209101288210', '469BT', '469B-495342-82', NULL, '2200', NULL, NULL, NULL, '1982', NULL, NULL, NULL, 6, '', NULL, NULL, '1997-04-07', ''),
(179, 'N', 'SYV-153', NULL, NULL, '', '', '', NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, 6, '', NULL, NULL, NULL, ''),
(180, 'N', 'SYV-154', NULL, NULL, '', '', '', NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, 6, '', NULL, NULL, NULL, ''),
(181, 'N', 'SVE-309', NULL, NULL, '', '', '', NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, 6, '', NULL, NULL, NULL, ''),
(182, 'N', 'ZNK-204', NULL, NULL, '', '', '', NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, 6, '', NULL, NULL, NULL, ''),
(185, 'N', 'URC-507', 3, 11, '100428004892', '240', '45326', NULL, '2400', NULL, NULL, NULL, '1979', NULL, NULL, NULL, 6, '', NULL, NULL, '1998-11-30', ''),
(186, 'N', 'XZJ-340', 18, 11, '451MT21201551-82', '469B', '469B502847', NULL, '2400', NULL, NULL, NULL, '1982', NULL, NULL, NULL, 6, '', NULL, NULL, NULL, ''),
(187, 'N', 'SHF-147', 16, 9, 'BD30DLZ12673D', '', 'CKDKK0558XC000690', NULL, '', NULL, NULL, NULL, '1999', NULL, NULL, NULL, 6, '', NULL, NULL, '2009-03-05', ''),
(188, 'N', 'SYV-174', 3, 9, '1694011681', 'CARPATY', '152766', NULL, '2400', NULL, NULL, NULL, '1988', NULL, NULL, NULL, 6, '34639', '2006-04-11', NULL, '1997-05-19', ''),
(189, 'N', 'SYV-185', 3, 9, '48616', 'ARO-240', '152690', NULL, '2400', NULL, NULL, NULL, '1988', NULL, NULL, NULL, 4, '1627', '2008-05-09', NULL, NULL, ''),
(190, 'N', 'SYV-859', 3, 9, '10694316691', '240', '049-125', NULL, '2400', NULL, NULL, NULL, '1981', NULL, NULL, NULL, 6, '10258', '2008-04-30', NULL, '1994-05-12', ''),
(191, 'N', 'URC-860', 18, 9, '451MT80206126', '469B', '159970', NULL, '2200', NULL, NULL, NULL, '1978', NULL, NULL, NULL, 6, '', NULL, NULL, '1993-01-15', ''),
(192, 'N', 'SOJ-715', NULL, NULL, '', '', '', NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, 6, '', NULL, NULL, '2009-09-23', ''),
(193, 'N', 'SYV-184', 3, 11, '152672', 'ARO-240', '152672', NULL, '2500', NULL, NULL, NULL, '1988', NULL, NULL, NULL, 6, '37001', '2006-08-19', NULL, '1999-03-24', ''),
(194, 'N', 'XZJ-343', 1, NULL, '', '', '', NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, 6, '', NULL, NULL, NULL, ''),
(195, 'N', 'UYJ-290', 3, 11, 'UYJ290', 'M-461', '32798', NULL, '461', NULL, NULL, NULL, '1970', NULL, NULL, NULL, 5, '', '2003-08-31', NULL, '2000-08-17', ''),
(196, 'S', 'UVE-999', 18, 8, '', '', '', NULL, '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, ''),
(216, 'S', '', NULL, NULL, '', '', '', '', '', 0, 0, '', '', 0, NULL, '', NULL, '', '2016-05-07', '2016-05-07', NULL, NULL),
(217, 'S', '', NULL, NULL, '', '', '', '', '', 0, 0, '', '', 0, NULL, '', NULL, '', '2016-05-07', '2016-05-07', NULL, NULL),
(218, 'S', 'XXX-123', NULL, NULL, '', '', '', '', '', 0, 0, '', '', 0, NULL, '', NULL, '', '2016-05-07', '2016-05-07', NULL, NULL),
(219, 'S', 'XXX-456', 5, 9, '3', '3', '3', '5', '3', 3, 0, '5', '3', 0, '1', '5', 4, '5', '2016-05-07', '2016-05-07', NULL, '5'),
(220, 'S', 'XXX-XXX', 13, 10, '1', '1', '1', '', '1', 1, 0, '', '1', 0, '2', '', 4, '', '2016-05-07', '2016-05-07', NULL, '                    	                    1'),
(221, 'S', 'XXX-111', 15, 10, '9', '9', '9', '9', '9', 9, 9, '9', '9', 9, '1', '9', 4, '9', '2016-05-07', '2016-05-07', NULL, '                    	                    FF');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `itemfrecuencia`
--
ALTER TABLE `itemfrecuencia`
  ADD CONSTRAINT `itemfrecuencia_fk2` FOREIGN KEY (`frecuencia`) REFERENCES `frecuencia` (`id`),
  ADD CONSTRAINT `itemfrecuencia_fk1` FOREIGN KEY (`item`) REFERENCES `itemrevision` (`id`);

--
-- Filtros para la tabla `itemmantenimientoprev`
--
ALTER TABLE `itemmantenimientoprev`
  ADD CONSTRAINT `itemmantenimientoprev_fk2` FOREIGN KEY (`mantenimiento`) REFERENCES `mantenimiento` (`id`),
  ADD CONSTRAINT `itemmantenimientoprev_fk1` FOREIGN KEY (`itemfrecuencia`) REFERENCES `itemfrecuencia` (`id`);

--
-- Filtros para la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `mantenimiento_fk1` FOREIGN KEY (`vehiculo`) REFERENCES `vehiculo` (`id`),
  ADD CONSTRAINT `mantenimiento_fk2` FOREIGN KEY (`frecuencia`) REFERENCES `frecuencia` (`id`);

--
-- Filtros para la tabla `propietariovehiculo`
--
ALTER TABLE `propietariovehiculo`
  ADD CONSTRAINT `propietariovehiculo_fk2` FOREIGN KEY (`vehiculo`) REFERENCES `vehiculo` (`id`),
  ADD CONSTRAINT `propietariovehiculo_fk1` FOREIGN KEY (`persona`) REFERENCES `persona` (`documento`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_fk1` FOREIGN KEY (`radio`) REFERENCES `radioaccion` (`id`),
  ADD CONSTRAINT `vehiculo_marca_fk1` FOREIGN KEY (`marca`) REFERENCES `marca` (`id`),
  ADD CONSTRAINT `vehiculo_tipo_fk1` FOREIGN KEY (`tipo`) REFERENCES `tipo` (`id`),
  ADD CONSTRAINT `veh_tipocomb_fk1` FOREIGN KEY (`combustible`) REFERENCES `tipocombustible` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
