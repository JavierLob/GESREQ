-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-01-2014 a las 18:41:55
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_ges_req`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tacceso`
--

CREATE TABLE IF NOT EXISTS `tacceso` (
  `idacceso` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` char(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fechaacceso` date DEFAULT NULL,
  `horaacceso` time DEFAULT NULL,
  `ip` char(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`idacceso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2414 ;

--
-- Volcado de datos para la tabla `tacceso`
--

INSERT INTO `tacceso` (`idacceso`, `idusuario`, `fechaacceso`, `horaacceso`, `ip`) VALUES
(2409, 'ljbracho47', '2014-01-16', '02:42:08', '::1'),
(2410, 'jamartin68', '2014-01-16', '05:59:23', '127.0.0.1'),
(2411, 'jamartin68', '2014-01-17', '03:04:00', '127.0.0.1'),
(2412, 'jamartin68', '2014-01-17', '20:45:46', '127.0.0.1'),
(2413, 'jamartin68', '2014-01-17', '23:46:40', '127.0.0.1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tartefacto`
--

CREATE TABLE IF NOT EXISTS `tartefacto` (
  `idartefacto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(300) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `extension` varchar(4) COLLATE utf8_spanish2_ci NOT NULL,
  `idusuario` char(45) COLLATE utf8_spanish2_ci NOT NULL,
  `idrequerimiento` int(11) NOT NULL,
  PRIMARY KEY (`idartefacto`),
  KEY `idusuario` (`idusuario`,`idrequerimiento`),
  KEY `idrequerimiento` (`idrequerimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbitacora`
--

CREATE TABLE IF NOT EXISTS `tbitacora` (
  `idbitacora` int(11) NOT NULL AUTO_INCREMENT,
  `urlvisitada` text COLLATE utf8_spanish2_ci,
  `idsesion` int(11) DEFAULT NULL,
  PRIMARY KEY (`idbitacora`),
  KEY `fk_tbitacora_idsesion_idx` (`idsesion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testatusip`
--

CREATE TABLE IF NOT EXISTS `testatusip` (
  `ip` char(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estatus` char(1) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `intentos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `testatusip`
--

INSERT INTO `testatusip` (`ip`, `estatus`, `intentos`) VALUES
('::1', '0', 0),
('127.0.0.1', '0', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testatususuario`
--

CREATE TABLE IF NOT EXISTS `testatususuario` (
  `idestatususu` int(11) NOT NULL,
  `nombreestatususu` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`idestatususu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `testatususuario`
--

INSERT INTO `testatususuario` (`idestatususu`, `nombreestatususu`) VALUES
(1, 'ACTIVO'),
(2, 'INACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `thistorial`
--

CREATE TABLE IF NOT EXISTS `thistorial` (
  `idhistorial` int(11) NOT NULL AUTO_INCREMENT,
  `idrequerimiento` int(11) NOT NULL,
  `idpersona` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci,
  PRIMARY KEY (`idhistorial`),
  KEY `fk_idpersona_thistorial_idx` (`idpersona`),
  KEY `fk_idrequerimiento_thistorial_idx` (`idrequerimiento`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `thistorial`
--

INSERT INTO `thistorial` (`idhistorial`, `idrequerimiento`, `idpersona`, `descripcion`) VALUES
(3, 1, '21561768', 'Ya está siendo atendido.'),
(4, 3, '21561768', 'Ya está siendo atendido el requerimiento.'),
(5, 3, '21561768', 'No lo puedo atender por los momentos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tintentos`
--

CREATE TABLE IF NOT EXISTS `tintentos` (
  `ip` char(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `campousuario` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `campopassword` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fechaintento` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `horaintento` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tintentos`
--

INSERT INTO `tintentos` (`ip`, `campousuario`, `campopassword`, `fechaintento`, `horaintento`) VALUES
('::1', 'invalido', 'invalido', '2014/01/16', '01:53:21'),
('127.0.0.1', '', '', '2014/01/16', '05:32:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmensaje`
--

CREATE TABLE IF NOT EXISTS `tmensaje` (
  `idmensaje` int(11) NOT NULL AUTO_INCREMENT,
  `remitentemen` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `destinatariomen` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `mensajemen` text COLLATE utf8_spanish2_ci NOT NULL,
  `fechamen` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estatusmen` char(1) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`idmensaje`),
  KEY `remitentemen` (`remitentemen`),
  KEY `destinatariomen` (`destinatariomen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmodulo_sistema`
--

CREATE TABLE IF NOT EXISTS `tmodulo_sistema` (
  `idmodulosis` int(3) NOT NULL AUTO_INCREMENT,
  `nombremodsis` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `urlmodsis` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `iconomodsis` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcionmodsis` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`idmodulosis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tnotificacion`
--

CREATE TABLE IF NOT EXISTS `tnotificacion` (
  `idnotificacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombrenot` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `fechanot` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mensajenot` text COLLATE utf8_spanish2_ci NOT NULL,
  `estatusnot` char(1) COLLATE utf8_spanish2_ci NOT NULL DEFAULT '0',
  `idremitente` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `iddestinatario` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`idnotificacion`),
  KEY `fk_tnotificacion_idpersona1_idx` (`idremitente`),
  KEY `fk_tnotificacion_idpersona2_idx` (`iddestinatario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpersona`
--

CREATE TABLE IF NOT EXISTS `tpersona` (
  `idpersona` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `nombreunoper` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `nombredosper` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellidounoper` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidodosper` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha_nac_per` date NOT NULL,
  `sexoper` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  `emailunoper` varchar(70) COLLATE utf8_spanish2_ci NOT NULL,
  `emaildosper` varchar(70) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefonounoper` char(11) COLLATE utf8_spanish2_ci NOT NULL,
  `telefonodosper` char(11) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `direccionper` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `idtipoper` int(11) NOT NULL,
  PRIMARY KEY (`idpersona`),
  KEY `fk_idtipoper_ttipoper` (`idtipoper`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tpersona`
--

INSERT INTO `tpersona` (`idpersona`, `nombreunoper`, `nombredosper`, `apellidounoper`, `apellidodosper`, `fecha_nac_per`, `sexoper`, `emailunoper`, `emaildosper`, `telefonounoper`, `telefonodosper`, `direccionper`, `idtipoper`) VALUES
('00000000', 'WEBMASTER', 'AULA', 'FRONTINO', '', '1991-09-17', 'M', 'webmaster@aulafrontino.org.ve', '', '04245026277', '', 'AGUA CLARA', 1),
('19636791', 'ANGELICA', 'KATIUSCA', 'ROSENDO', 'LARES', '1991-10-30', 'F', 'angelik.1352@gmail.com', 'angelik_rosendo@hotmail.com', '04245152521', '', 'URB. BELLAS ARTES', 1),
('20156541', 'AMILCAR', 'JOSE', 'MORALES', 'VIVAS', '1991-09-17', 'M', 'amilcarjmorales@gmail.com', '', '04245026277', '', 'AGUA CLARA', 1),
('20158248', 'KARELYS', 'ANDREINA', 'HERNANDEZ', 'ESCUDERO', '1991-06-10', 'F', 'karelysh10@gmail.com', 'karelysh@hotmail.com', '04263375279', '02557921797', 'MUNICIPIO AGUA BLANCA EDO. PORTUGUESA ', 1),
('20272772', 'MARIA', 'JOSÉ', 'VARGAS', 'COLMENAREZ', '1991-05-10', 'F', 'disnoa@gmail.com', 'disnoa@hotmail.com', '04120715582', '', 'TINAJERO II', 1),
('20929049', 'HENDIMAR', 'ROSSELING', 'MOGOLLÓN', 'CAMACHO', '1992-10-03', 'F', 'hendimarmc@hotmail.com', '', '04245775966', '02559884794', 'TERRAZAS DE SAN JOSÉ, TERRAZA 23 CALLE 15 CASA #1 ', 1),
('21056774', 'ERICK', 'EDUARDO', 'GIMENEZ', 'ROBIOU', '1991-06-15', 'M', 'erick7_15_@hotmail.com', 'erick.egr@gmail.com', '04245308824', '02556223258', 'AVENIDA 2 ENTRE CALLE 3 Y 4 URBANIZACIÓN LA CORTEZA', 1),
('21561768', 'JAVIER', 'ANTONIO', 'MARTIN', 'LOBO', '1991-09-25', 'M', 'recupera.javier@gmail.com', '', '04129428301', '', 'ARAURE, VILLA ARAURE 1, CA 1 ENTRE AV 1 Y 3, CASA #6244', 1),
('9562847', 'LUIS', 'JAVIER', 'BRACHO', 'PIÑA', '1963-08-25', 'M', 'ljbracho@gmail.com', '', '04166232913', '', 'CALLE ÚNICA DE LA TAPA, SIN NÚMERO. ARAURE ESTADO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpublicacion`
--

CREATE TABLE IF NOT EXISTS `tpublicacion` (
  `idpublicacion` int(11) NOT NULL AUTO_INCREMENT,
  `mensajepub` text COLLATE utf8_spanish2_ci NOT NULL,
  `idusuariopub` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `idprogramapub` int(11) NOT NULL,
  `fechapub` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estatuspub` tinyint(1) NOT NULL,
  PRIMARY KEY (`idpublicacion`),
  KEY `idusuariopub` (`idusuariopub`),
  KEY `idprogramapub` (`idprogramapub`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trequerimiento`
--

CREATE TABLE IF NOT EXISTS `trequerimiento` (
  `idrequerimiento` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci,
  `codigo` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tipo` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `requepadre` int(11) DEFAULT NULL,
  `idresponsable` char(45) COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'Sin Asignar',
  `fechareg` date DEFAULT NULL,
  `fechaact` date DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  `prioridad` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `dificultad` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estatus` varchar(20) COLLATE utf8_spanish2_ci DEFAULT 'ABIERTO',
  PRIMARY KEY (`idrequerimiento`),
  KEY `idresponsable` (`idresponsable`),
  KEY `requepadre` (`requepadre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `trequerimiento`
--

INSERT INTO `trequerimiento` (`idrequerimiento`, `titulo`, `descripcion`, `codigo`, `tipo`, `requepadre`, `idresponsable`, `fechareg`, `fechaact`, `fechafin`, `prioridad`, `dificultad`, `estatus`) VALUES
(1, 'Registro de usuarios', 'Se deben poder registrar los usuarios del sistema.', 'RE-01', 'Funcional', NULL, 'jamartin68', '2014-01-16', '2014-01-17', NULL, 'Alta', 'Alta', 'ATENDIDO'),
(2, 'Consultar Usuario', 'Se debe poder consultar los datos del usuario', 'RE-02', 'Funcional', NULL, 'ajmorales41', '2014-01-17', NULL, NULL, 'Media', 'Media', 'ABIERTO'),
(3, 'Modificar Usuarios', 'El Usuario debe poder cambiar sus datos personales, como teléfono, dirección y correo alternativo.', 'RE-03', 'Funcional', 1, 'jamartin68', '2014-01-17', '2014-01-17', NULL, 'Alta', 'Alta', 'ABIERTO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trol`
--

CREATE TABLE IF NOT EXISTS `trol` (
  `idrol` int(11) NOT NULL AUTO_INCREMENT,
  `nombrerol` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `stringserviciosrol` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `stringmodulosrol` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcionrol` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`idrol`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `trol`
--

INSERT INTO `trol` (`idrol`, `nombrerol`, `stringserviciosrol`, `stringmodulosrol`, `descripcionrol`) VALUES
(1, 'PARTICIPANTE ', NULL, NULL, 'PARTICIPANTE DEL PROYECTO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tservicio`
--

CREATE TABLE IF NOT EXISTS `tservicio` (
  `idservicio` int(3) NOT NULL AUTO_INCREMENT,
  `nombreser` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcionser` text COLLATE utf8_spanish2_ci,
  `url` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `idmodulo` int(3) NOT NULL,
  `actualizacionser` tinyint(1) DEFAULT NULL,
  `iconoser` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `posicionser` int(11) DEFAULT NULL,
  `action` text CHARACTER SET utf8 COLLATE utf8_swedish_ci,
  PRIMARY KEY (`idservicio`),
  KEY `fk_idmodulo_tmodulo` (`idmodulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ttipopersona`
--

CREATE TABLE IF NOT EXISTS `ttipopersona` (
  `idtipopersona` int(11) NOT NULL AUTO_INCREMENT,
  `nombretipoper` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`idtipopersona`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `ttipopersona`
--

INSERT INTO `ttipopersona` (`idtipopersona`, `nombretipoper`) VALUES
(1, 'PARTICIPANTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuario`
--

CREATE TABLE IF NOT EXISTS `tusuario` (
  `idusuario` char(45) COLLATE utf8_spanish2_ci NOT NULL,
  `cedulausu` char(9) COLLATE utf8_spanish2_ci NOT NULL,
  `contrasena` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `idrol` int(11) NOT NULL,
  `intentosfallido` int(11) DEFAULT NULL,
  `modificacion` int(11) DEFAULT NULL,
  `fotousu` tinyint(1) DEFAULT NULL,
  `idestatususu` int(11) NOT NULL,
  `conectadousu` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `fk_idrol_trol` (`idrol`),
  KEY `fk_tusuario_1_idx` (`cedulausu`),
  KEY `fk_tusuario_estatusper_idx` (`idestatususu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tusuario`
--

INSERT INTO `tusuario` (`idusuario`, `cedulausu`, `contrasena`, `idrol`, `intentosfallido`, `modificacion`, `fotousu`, `idestatususu`, `conectadousu`) VALUES
('ajmorales41', '20156541', '9853f094be76effbe837cb4c55b020d2', 1, 0, 1, 1, 1, '1'),
('akrosendo91', '19636791', '6196f402bbed3f1e0617976b84ab2d93', 1, 0, 1, 1, 1, '1'),
('eegimenez74', '21056774', 'd249c3dbafdd16cc976c253a275aaffb', 1, 0, 1, NULL, 1, ''),
('hrmogollon49', '20929049', '006e8bdffdc84a52f2ce46b8e639e48b', 1, 0, 0, NULL, 1, ''),
('jamartin68', '21561768', 'ccaa8b87228943ffb955ba95a5d7505e', 1, 0, 1, 1, 1, '1'),
('kahernandez48', '20158248', 'ba4b02a89bd14c9f6a7a1f7c6a1a5f1b', 1, 0, 1, 1, 1, '0'),
('ljbracho47', '9562847', '50e4d3f0bb3b7b131e0a547c674d196e', 1, 0, 1, 1, 1, '1'),
('mjvargas72', '20272772', '02be4167f8b5e602c742cb3a2f10aec9', 1, 0, 1, 1, 1, '1'),
('webmaster', '00000000', '9853f094be76effbe837cb4c55b020d2', 1, 0, 1, 1, 1, '1');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vservicios`
--
CREATE TABLE IF NOT EXISTS `vservicios` (
`idservicio` int(3)
,`nombreser` varchar(50)
,`descripcionser` text
,`url` varchar(100)
,`actualizacionser` tinyint(1)
,`iconoser` varchar(50)
,`posicionser` int(11)
,`nombremodsis` varchar(30)
,`idmodulosis` int(3)
,`urlmodsis` varchar(100)
,`iconomodsis` varchar(100)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vusuario`
--
CREATE TABLE IF NOT EXISTS `vusuario` (
`idpersona` char(9)
,`nombreunoper` varchar(50)
,`nombredosper` varchar(50)
,`apellidounoper` varchar(50)
,`apellidodosper` varchar(50)
,`fecha_nac_per` date
,`sexoper` char(1)
,`emailunoper` varchar(70)
,`emaildosper` varchar(70)
,`telefonounoper` char(11)
,`telefonodosper` char(11)
,`direccionper` varchar(100)
,`idtipopersona` int(11)
,`nombretipoper` varchar(60)
,`idusuario` char(45)
,`contrasena` varchar(45)
,`intentosfallido` int(11)
,`modificacion` int(11)
,`fotousu` tinyint(1)
,`idestatususu` int(11)
,`nombreestatususu` varchar(25)
,`idrol` int(11)
,`nombrerol` varchar(50)
,`stringserviciosrol` varchar(255)
,`stringmodulosrol` varchar(255)
,`descripcionrol` varchar(60)
);
-- --------------------------------------------------------

--
-- Estructura para la vista `vservicios`
--
DROP TABLE IF EXISTS `vservicios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`amilcar`@`localhost` SQL SECURITY DEFINER VIEW `vservicios` AS select `tservicio`.`idservicio` AS `idservicio`,`tservicio`.`nombreser` AS `nombreser`,`tservicio`.`descripcionser` AS `descripcionser`,`tservicio`.`url` AS `url`,`tservicio`.`actualizacionser` AS `actualizacionser`,`tservicio`.`iconoser` AS `iconoser`,`tservicio`.`posicionser` AS `posicionser`,`tmodulo_sistema`.`nombremodsis` AS `nombremodsis`,`tmodulo_sistema`.`idmodulosis` AS `idmodulosis`,`tmodulo_sistema`.`urlmodsis` AS `urlmodsis`,`tmodulo_sistema`.`iconomodsis` AS `iconomodsis` from (`tservicio` join `tmodulo_sistema`) where (`tservicio`.`idmodulo` = `tmodulo_sistema`.`idmodulosis`);

-- --------------------------------------------------------

--
-- Estructura para la vista `vusuario`
--
DROP TABLE IF EXISTS `vusuario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`amilcar`@`localhost` SQL SECURITY DEFINER VIEW `vusuario` AS select `tpersona`.`idpersona` AS `idpersona`,`tpersona`.`nombreunoper` AS `nombreunoper`,`tpersona`.`nombredosper` AS `nombredosper`,`tpersona`.`apellidounoper` AS `apellidounoper`,`tpersona`.`apellidodosper` AS `apellidodosper`,`tpersona`.`fecha_nac_per` AS `fecha_nac_per`,`tpersona`.`sexoper` AS `sexoper`,`tpersona`.`emailunoper` AS `emailunoper`,`tpersona`.`emaildosper` AS `emaildosper`,`tpersona`.`telefonounoper` AS `telefonounoper`,`tpersona`.`telefonodosper` AS `telefonodosper`,`tpersona`.`direccionper` AS `direccionper`,`ttipopersona`.`idtipopersona` AS `idtipopersona`,`ttipopersona`.`nombretipoper` AS `nombretipoper`,`tusuario`.`idusuario` AS `idusuario`,`tusuario`.`contrasena` AS `contrasena`,`tusuario`.`intentosfallido` AS `intentosfallido`,`tusuario`.`modificacion` AS `modificacion`,`tusuario`.`fotousu` AS `fotousu`,`testatususuario`.`idestatususu` AS `idestatususu`,`testatususuario`.`nombreestatususu` AS `nombreestatususu`,`trol`.`idrol` AS `idrol`,`trol`.`nombrerol` AS `nombrerol`,`trol`.`stringserviciosrol` AS `stringserviciosrol`,`trol`.`stringmodulosrol` AS `stringmodulosrol`,`trol`.`descripcionrol` AS `descripcionrol` from ((((`tpersona` join `ttipopersona`) join `tusuario`) join `testatususuario`) join `trol`) where ((`tpersona`.`idtipoper` = `ttipopersona`.`idtipopersona`) and (`tpersona`.`idpersona` = `tusuario`.`cedulausu`) and (`tusuario`.`idestatususu` = `testatususuario`.`idestatususu`) and (`tusuario`.`idrol` = `trol`.`idrol`));

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tartefacto`
--
ALTER TABLE `tartefacto`
  ADD CONSTRAINT `tartefacto_ibfk_1` FOREIGN KEY (`idusuario`) REFERENCES `tusuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tartefacto_ibfk_2` FOREIGN KEY (`idrequerimiento`) REFERENCES `trequerimiento` (`idrequerimiento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `thistorial`
--
ALTER TABLE `thistorial`
  ADD CONSTRAINT `fk_idpersona_thistorial` FOREIGN KEY (`idpersona`) REFERENCES `tpersona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_idrequerimiento_thistorial` FOREIGN KEY (`idrequerimiento`) REFERENCES `trequerimiento` (`idrequerimiento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tpersona`
--
ALTER TABLE `tpersona`
  ADD CONSTRAINT `fk_idtipoper_tpersona` FOREIGN KEY (`idtipoper`) REFERENCES `ttipopersona` (`idtipopersona`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `trequerimiento`
--
ALTER TABLE `trequerimiento`
  ADD CONSTRAINT `trequerimiento_ibfk_1` FOREIGN KEY (`idresponsable`) REFERENCES `tusuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `trequerimiento_ibfk_2` FOREIGN KEY (`requepadre`) REFERENCES `trequerimiento` (`idrequerimiento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tservicio`
--
ALTER TABLE `tservicio`
  ADD CONSTRAINT `fk_idmodulo_tservicio` FOREIGN KEY (`idmodulo`) REFERENCES `tmodulo_sistema` (`idmodulosis`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tusuario`
--
ALTER TABLE `tusuario`
  ADD CONSTRAINT `fk_cedulausu_tusuario` FOREIGN KEY (`cedulausu`) REFERENCES `tpersona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_idestatuusu_tusuario` FOREIGN KEY (`idestatususu`) REFERENCES `testatususuario` (`idestatususu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_idrol_tusuario` FOREIGN KEY (`idrol`) REFERENCES `trol` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
