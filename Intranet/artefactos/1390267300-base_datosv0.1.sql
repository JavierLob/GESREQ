SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `db_ges_req` ;
CREATE SCHEMA IF NOT EXISTS `db_ges_req` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci ;
USE `db_ges_req` ;

-- -----------------------------------------------------
-- Table `db_ges_req`.`tacceso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_ges_req`.`tacceso` (
  `idacceso` INT(11) NOT NULL AUTO_INCREMENT,
  `idusuario` CHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `fechaacceso` DATE NULL DEFAULT NULL,
  `horaacceso` TIME NULL DEFAULT NULL,
  `ip` CHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`idacceso`))
ENGINE = InnoDB
AUTO_INCREMENT = 2409
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `db_ges_req`.`tbitacora`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_ges_req`.`tbitacora` (
  `idbitacora` INT(11) NOT NULL AUTO_INCREMENT,
  `urlvisitada` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `idsesion` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idbitacora`),
  INDEX `fk_tbitacora_idsesion_idx` (`idsesion` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `db_ges_req`.`testatususuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_ges_req`.`testatususuario` (
  `idestatususu` INT(11) NOT NULL,
  `nombreestatususu` VARCHAR(25) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`idestatususu`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `db_ges_req`.`tmensaje`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_ges_req`.`tmensaje` (
  `idmensaje` INT(11) NOT NULL AUTO_INCREMENT,
  `remitentemen` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `destinatariomen` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `mensajemen` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `fechamen` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estatusmen` CHAR(1) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL DEFAULT '0',
  PRIMARY KEY (`idmensaje`),
  INDEX `remitentemen` (`remitentemen` ASC),
  INDEX `destinatariomen` (`destinatariomen` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 95
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `db_ges_req`.`tmodulo_sistema`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_ges_req`.`tmodulo_sistema` (
  `idmodulosis` INT(3) NOT NULL AUTO_INCREMENT,
  `nombremodsis` VARCHAR(30) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `urlmodsis` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `iconomodsis` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `descripcionmodsis` VARCHAR(250) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`idmodulosis`))
ENGINE = InnoDB
AUTO_INCREMENT = 121
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `db_ges_req`.`tnotificacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_ges_req`.`tnotificacion` (
  `idnotificacion` INT(11) NOT NULL AUTO_INCREMENT,
  `nombrenot` VARCHAR(150) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `fechanot` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mensajenot` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `estatusnot` CHAR(1) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL DEFAULT '0',
  `idremitente` CHAR(9) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `iddestinatario` CHAR(9) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  PRIMARY KEY (`idnotificacion`),
  INDEX `fk_tnotificacion_idpersona1_idx` (`idremitente` ASC),
  INDEX `fk_tnotificacion_idpersona2_idx` (`iddestinatario` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 156;


-- -----------------------------------------------------
-- Table `db_ges_req`.`ttipopersona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_ges_req`.`ttipopersona` (
  `idtipopersona` INT NOT NULL AUTO_INCREMENT,
  `nombretipoper` VARCHAR(60) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`idtipopersona`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_ges_req`.`tpersona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_ges_req`.`tpersona` (
  `idpersona` CHAR(9) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `nombreunoper` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `nombredosper` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `apellidounoper` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `apellidodosper` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `fecha_nac_per` DATE NOT NULL,
  `sexoper` CHAR(1) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `emailunoper` VARCHAR(70) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `emaildosper` VARCHAR(70) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `telefonounoper` CHAR(11) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `telefonodosper` CHAR(11) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `direccionper` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `idtipoper` INT  NOT NULL,
  PRIMARY KEY (`idpersona`),
  INDEX `fk_idtipoper_ttipoper` (`idtipoper` ASC),
  CONSTRAINT `fk_idtipoper_tpersona`
    FOREIGN KEY (`idtipoper`)
    REFERENCES `db_ges_req`.`ttipopersona` (`idtipopersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_ges_req`.`tpublicacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_ges_req`.`tpublicacion` (
  `idpublicacion` INT(11) NOT NULL AUTO_INCREMENT,
  `mensajepub` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `idusuariopub` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `idprogramapub` INT(11) NOT NULL,
  `fechapub` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estatuspub` TINYINT(1) NOT NULL,
  PRIMARY KEY (`idpublicacion`),
  INDEX `idusuariopub` (`idusuariopub` ASC),
  INDEX `idprogramapub` (`idprogramapub` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 22;


-- -----------------------------------------------------
-- Table `db_ges_req`.`trequerimiento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_ges_req`.`trequerimiento` (
  `idrequerimiento` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(150) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `descripcion` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `codigo` VARCHAR(25) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `tipo` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `fechareg` DATE NULL DEFAULT NULL,
  `fechaact` DATE NULL DEFAULT NULL,
  `fechafin` DATE NULL DEFAULT NULL,
  `prioridad` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `dificultad` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `estatus` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`idrequerimiento`))
ENGINE = InnoDB
AUTO_INCREMENT = 1;


-- -----------------------------------------------------
-- Table `db_ges_req`.`trol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_ges_req`.`trol` (
  `idrol` INT NOT NULL AUTO_INCREMENT,
  `nombrerol` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `stringserviciosrol` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `stringmodulosrol` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `descripcionrol` VARCHAR(60) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`idrol`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_ges_req`.`tservicio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_ges_req`.`tservicio` (
  `idservicio` INT(3) NOT NULL AUTO_INCREMENT,
  `nombreser` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `descripcionser` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `url` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `idmodulo` INT(3) NOT NULL,
  `actualizacionser` TINYINT(1) NULL DEFAULT NULL,
  `iconoser` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NULL DEFAULT NULL,
  `posicionser` INT(11) NULL DEFAULT NULL,
  `action` TEXT CHARACTER SET 'utf8' COLLATE 'utf8_swedish_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`idservicio`),
  INDEX `fk_idmodulo_tmodulo` (`idmodulo` ASC),
  CONSTRAINT `fk_idmodulo_tservicio`
    FOREIGN KEY (`idmodulo`)
    REFERENCES `db_ges_req`.`tmodulo_sistema` (`idmodulosis`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 157;


-- -----------------------------------------------------
-- Table `db_ges_req`.`tusuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_ges_req`.`tusuario` (
  `idusuario` CHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `cedulausu` CHAR(9) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `contrasena` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `idrol` INT NOT NULL,
  `intentosfallido` INT(11) NULL DEFAULT NULL,
  `modificacion` INT(11) NULL DEFAULT NULL,
  `fotousu` TINYINT(1) NULL DEFAULT NULL,
  `idestatususu` INT(11) NOT NULL,
  `conectadousu` CHAR(1) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  PRIMARY KEY (`idusuario`),
  INDEX `fk_idrol_trol` (`idrol` ASC),
  INDEX `fk_tusuario_1_idx` (`cedulausu` ASC),
  INDEX `fk_tusuario_estatusper_idx` (`idestatususu` ASC),
  CONSTRAINT `fk_cedulausu_tusuario`
    FOREIGN KEY (`cedulausu`)
    REFERENCES `db_ges_req`.`tpersona` (`idpersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_idestatuusu_tusuario`
    FOREIGN KEY (`idestatususu`)
    REFERENCES `db_ges_req`.`testatususuario` (`idestatususu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_idrol_tusuario`
    FOREIGN KEY (`idrol`)
    REFERENCES `db_ges_req`.`trol` (`idrol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_ges_req`.`thistorial`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_ges_req`.`thistorial` (
  `idhistorial` INT NOT NULL AUTO_INCREMENT,
  `idrequerimiento` INT NOT NULL,
  `idpersona` CHAR(9) CHARACTER SET 'utf8' COLLATE 'utf8_spanish2_ci' NOT NULL,
  `descripcion` TEXT NULL,
  PRIMARY KEY (`idhistorial`),
  INDEX `fk_idpersona_thistorial_idx` (`idpersona` ASC),
  INDEX `fk_idrequerimiento_thistorial_idx` (`idrequerimiento` ASC),
  CONSTRAINT `fk_idpersona_thistorial`
    FOREIGN KEY (`idpersona`)
    REFERENCES `db_ges_req`.`tpersona` (`idpersona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_idrequerimiento_thistorial`
    FOREIGN KEY (`idrequerimiento`)
    REFERENCES `db_ges_req`.`trequerimiento` (`idrequerimiento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `db_ges_req` ;

-- -----------------------------------------------------
-- Placeholder table for view `db_ges_req`.`vservicios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_ges_req`.`vservicios` (`idservicio` INT, `nombreser` INT, `descripcionser` INT, `url` INT, `actualizacionser` INT, `iconoser` INT, `posicionser` INT, `nombremodsis` INT, `idmodulosis` INT, `urlmodsis` INT, `iconomodsis` INT);

-- -----------------------------------------------------
-- Placeholder table for view `db_ges_req`.`vusuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_ges_req`.`vusuario` (`idpersona` INT, `nombreunoper` INT, `nombredosper` INT, `apellidounoper` INT, `apellidodosper` INT, `fecha_nac_per` INT, `sexoper` INT, `emailunoper` INT, `emaildosper` INT, `telefonounoper` INT, `telefonodosper` INT, `direccionper` INT, `nacionalidadper` INT, `idprograma` INT, `idcampus` INT, `nombrecampus` INT, `nombrecortocam` INT, `idinstitucion` INT, `nombreins` INT, `nombrecortoins` INT, `logoins` INT, `idtipopersona` INT, `nombretipoper` INT, `idusuario` INT, `contrasena` INT, `intentosfallido` INT, `password_moodle` INT, `password_foro` INT, `modificacion` INT, `fotousu` INT, `idestatususu` INT, `nombreestatususu` INT, `idrol` INT, `nombrerol` INT, `stringserviciosrol` INT, `stringmodulosrol` INT, `descripcionrol` INT);

-- -----------------------------------------------------
-- View `db_ges_req`.`vservicios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_ges_req`.`vservicios`;
USE `db_ges_req`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`amilcar`@`localhost` SQL SECURITY DEFINER VIEW `vservicios` AS select `tservicio`.`idservicio` AS `idservicio`,`tservicio`.`nombreser` AS `nombreser`,`tservicio`.`descripcionser` AS `descripcionser`,`tservicio`.`url` AS `url`,`tservicio`.`actualizacionser` AS `actualizacionser`,`tservicio`.`iconoser` AS `iconoser`,`tservicio`.`posicionser` AS `posicionser`,`tmodulo_sistema`.`nombremodsis` AS `nombremodsis`,`tmodulo_sistema`.`idmodulosis` AS `idmodulosis`,`tmodulo_sistema`.`urlmodsis` AS `urlmodsis`,`tmodulo_sistema`.`iconomodsis` AS `iconomodsis` from (`tservicio` join `tmodulo_sistema`) where (`tservicio`.`idmodulo` = `tmodulo_sistema`.`idmodulosis`);

-- -----------------------------------------------------
-- View `db_ges_req`.`vusuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_ges_req`.`vusuario`;
USE `db_ges_req`;
CREATE  OR REPLACE ALGORITHM=UNDEFINED DEFINER=`amilcar`@`localhost` SQL SECURITY DEFINER VIEW `vusuario` AS 
select `tpersona`.`idpersona` AS `idpersona`,`tpersona`.`nombreunoper` AS `nombreunoper`,`tpersona`.`nombredosper` 
AS `nombredosper`,`tpersona`.`apellidounoper` AS `apellidounoper`,`tpersona`.`apellidodosper` 
AS `apellidodosper`,`tpersona`.`fecha_nac_per` AS `fecha_nac_per`,`tpersona`.`sexoper` 
AS `sexoper`,`tpersona`.`emailunoper` AS `emailunoper`,`tpersona`.`emaildosper` AS `emaildosper`,`tpersona`.`telefonounoper` 
AS `telefonounoper`,`tpersona`.`telefonodosper` AS `telefonodosper`,`tpersona`.`direccionper` AS `direccionper`,
 `ttipopersona`.`idtipopersona` AS `idtipopersona`,`ttipopersona`.`nombretipoper` AS `nombretipoper`,
 `tusuario`.`idusuario` AS `idusuario`,`tusuario`.`contrasena` AS `contrasena`,`tusuario`.`intentosfallido` 
 AS `intentosfallido`,`tusuario`.`modificacion` AS `modificacion`,`tusuario`.`fotousu` 
 AS `fotousu`,`testatususuario`.`idestatususu` AS `idestatususu`,`testatususuario`.`nombreestatususu` 
 AS `nombreestatususu`,`trol`.`idrol` AS `idrol`,`trol`.`nombrerol` AS `nombrerol`,`trol`.`stringserviciosrol` 
 AS `stringserviciosrol`,`trol`.`stringmodulosrol` AS `stringmodulosrol`,`trol`.`descripcionrol` 
 AS `descripcionrol` from ((((`tpersona` join `ttipopersona`) join `tusuario`) join `testatususuario`) join `trol`) 
 where ((`tpersona`.`idtipoper` = `ttipopersona`.`idtipopersona`) and 
  (`tpersona`.`idpersona` = `tusuario`.`cedulausu`) and
   (`tusuario`.`idestatususu` = `testatususuario`.`idestatususu`) and (`tusuario`.`idrol` = `trol`.`idrol`));

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
