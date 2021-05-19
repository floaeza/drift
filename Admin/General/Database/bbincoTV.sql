-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema bbincoTV
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bbincoTV
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bbincoTV` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `bbincoTV` ;

-- -----------------------------------------------------
-- Table `bbincoTV`.`cat_estacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`cat_estacion` (
  `id_estacion` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `numero_estacion` VARCHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `nombre_canal` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `indicativo` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `logo` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id_estacion`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bbincoTV`.`cat_canal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`cat_canal` (
  `id_canal` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `src` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `puerto` VARCHAR(5) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `id_estacion` INT(3) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id_canal`)  COMMENT '',
  INDEX `fk_cat_canal_1_idx` (`id_estacion` ASC)  COMMENT '',
  CONSTRAINT `fk_cat_canal_1`
    FOREIGN KEY (`id_estacion`)
    REFERENCES `bbincoTV`.`cat_estacion` (`id_estacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bbincoTV`.`cat_contenido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`cat_contenido` (
  `id_contenido` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `url_contenido` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL COMMENT '',
  `texto_contenido` VARCHAR(500) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id_contenido`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bbincoTV`.`cat_estatus_energia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`cat_estatus_energia` (
  `id_estatus_energia` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `estatus_energia` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `descripcion_energia` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  PRIMARY KEY (`id_estatus_energia`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
ROW_FORMAT = DYNAMIC;

--
-- Dumping data for table `cat_estatus_energia`
--

INSERT INTO `cat_estatus_energia` (`id_estatus_energia`, `estatus_energia`, `descripcion_energia`) VALUES
(1, 'encendido', 'El dispositivo esta conectado'),
(2, 'apagado', 'El dispositivo esta desconectado');


-- -----------------------------------------------------
-- Table `bbincoTV`.`cat_estatus_disponibilidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`cat_estatus_disponibilidad` (
  `id_estatus_disponibilidad` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `estatus_disponibilidad` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `descripcion_estatus` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  PRIMARY KEY (`id_estatus_disponibilidad`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

--
-- Dumping data for table `cat_estatus_disponibilidad`
--

INSERT INTO `cat_estatus_disponibilidad` (`id_estatus_disponibilidad`, `estatus_disponibilidad`, `descripcion_estatus`) VALUES
(1, 'disponible', 'El dispositivo esta libre para ser asignado a una locacion'),
(2, 'no disponible', 'El dispositivo a sigo asociado a una locacion');

-- -----------------------------------------------------
-- Table `bbincoTV`.`cat_estatus_licencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`cat_estatus_licencia` (
  `id_estatus_licencia` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `estatus_licencia` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `descripcion_estatus` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  PRIMARY KEY (`id_estatus_licencia`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

--
-- Dumping data for table `cat_estatus_licencia`
--

INSERT INTO `cat_estatus_licencia` (`id_estatus_licencia`, `estatus_licencia`, `descripcion_estatus`) VALUES
(1, 'activa', 'El dispositivo puede funcionar correctamente'),
(2, 'inactivo', 'Las licencias han caducado o se han terminado');

-- -----------------------------------------------------
-- Table `bbincoTV`.`cat_paquete`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`cat_paquete` (
  `id_paquete` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre_paquete` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `descripcion_paquete` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id_paquete`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bbincoTV`.`cat_dispositivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`cat_dispositivo` (
  `id_dispositivo` INT(9) NOT NULL AUTO_INCREMENT COMMENT '',
  `mac_address` VARCHAR(17) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `ip` VARCHAR(15) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `ubicacion_dispositivo` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `version_software` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL COMMENT '',
  `fecha_activacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '',
  `modelo` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL COMMENT '',
  `id_estatus_energia` INT(3) NOT NULL COMMENT '',
  `id_estatus_disponibilidad` INT(3) NOT NULL COMMENT '',
  `id_estatus_licencia` INT(3) NOT NULL COMMENT '',
  `grabador` INT(1) NOT NULL COMMENT '',
  `id_paquete` INT(3) NOT NULL COMMENT '',
  PRIMARY KEY (`id_dispositivo`)  COMMENT '',
  INDEX `fk_cat_dispositivo_1_idx` (`id_estatus_energia` ASC)  COMMENT '',
  INDEX `fk_cat_dispositivo_2_idx` (`id_estatus_disponibilidad` ASC)  COMMENT '',
  INDEX `fk_cat_dispositivo_3_idx` (`id_estatus_licencia` ASC)  COMMENT '',
  INDEX `fk_cat_dispositivo_4_idx` (`id_paquete` ASC)  COMMENT '',
  CONSTRAINT `fk_cat_dispositivo_1`
    FOREIGN KEY (`id_estatus_energia`)
    REFERENCES `bbincoTV`.`cat_estatus_energia` (`id_estatus_energia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cat_dispositivo_2`
    FOREIGN KEY (`id_estatus_disponibilidad`)
    REFERENCES `bbincoTV`.`cat_estatus_disponibilidad` (`id_estatus_disponibilidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cat_dispositivo_3`
    FOREIGN KEY (`id_estatus_licencia`)
    REFERENCES `bbincoTV`.`cat_estatus_licencia` (`id_estatus_licencia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cat_dispositivo_4`
    FOREIGN KEY (`id_paquete`)
    REFERENCES `bbincoTV`.`cat_paquete` (`id_paquete`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bbincoTV`.`cat_estatus_lectura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`cat_estatus_lectura` (
  `id_estatus_lectura` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `estatus_lectura` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `descripcion_lectura` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id_estatus_lectura`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

--
-- Dumping data for table `cat_estatus_lectura`
--

INSERT INTO `cat_estatus_lectura` (`id_estatus_lectura`, `estatus_lectura`, `descripcion_lectura`) VALUES
(1, 'leido', 'El mensaje a sido visualizado por el cliente'),
(2, 'no leido', 'El mensaje no a sido visualizado por el cliente');

-- -----------------------------------------------------
-- Table `bbincoTV`.`cat_estatus_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`cat_estatus_usuario` (
  `id_estatus_usuario` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `estatus_usuario` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `descripcion_estatus` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  PRIMARY KEY (`id_estatus_usuario`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

--
-- Dumping data for table `cat_estatus_usuario`
--

INSERT INTO `cat_estatus_usuario` (`id_estatus_usuario`, `estatus_usuario`, `descripcion_estatus`) VALUES
(1, 'habilitado', 'El usuario puede iniciar sesion en el sistema'),
(2, 'inhabilitado', 'El usuario a sido dado de baja definitiva'),
(3, 'suspendido', 'El usuario a sido inhabilitado por un tiempo');


-- -----------------------------------------------------
-- Table `bbincoTV`.`cat_evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`cat_evento` (
  `id_evento` INT(3) NOT NULL AUTO_INCREMENT COMMENT '\n',
  `nombre_evento` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `descripcion_evento` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  PRIMARY KEY (`id_evento`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bbincoTV`.`cat_grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`cat_grupo` (
  `id_grupo` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre_grupo` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `descripcion_grupo` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL COMMENT '',
  `vigencia` DATETIME NOT NULL COMMENT '',
  PRIMARY KEY (`id_grupo`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bbincoTV`.`cat_perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`cat_perfil` (
  `id_perfil` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre_perfil` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `descripcion_perfil` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  PRIMARY KEY (`id_perfil`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

--
-- Dumping data for table `cat_perfil`
--

INSERT INTO `cat_perfil` (`id_perfil`, `nombre_perfil`, `descripcion_perfil`) VALUES
(1, 'administrador', 'Tiene acceso a los modulos generales y los modulos de administracion del sistema'),
(2, 'operador', 'Tiene acceso a los modulos generales'),
(3, 'basico', 'Tiene acceso a ciertos modulos del sistema');

-- -----------------------------------------------------
-- Table `bbincoTV`.`cat_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`cat_usuario` (
  `id_usuario` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `correo_usuario` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `clave` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `nombre_usuario` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `apellido_paterno` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `apellido_materno` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `fecha_creacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '',
  `id_estatus_usuario` INT(3) NOT NULL COMMENT '',
  `id_perfil` INT(3) NOT NULL COMMENT '',
  `imagen_usuario` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  PRIMARY KEY (`id_usuario`)  COMMENT '',
  INDEX `fk_cat_usuario_1_idx` (`id_estatus_usuario` ASC)  COMMENT '',
  INDEX `fk_cat_usuario_2_idx` (`id_perfil` ASC)  COMMENT '',
  UNIQUE INDEX `correo_usuario_UNIQUE` (`correo_usuario` ASC)  COMMENT '',
  CONSTRAINT `fk_cat_usuario_1`
    FOREIGN KEY (`id_estatus_usuario`)
    REFERENCES `bbincoTV`.`cat_estatus_usuario` (`id_estatus_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cat_usuario_2`
    FOREIGN KEY (`id_perfil`)
    REFERENCES `bbincoTV`.`cat_perfil` (`id_perfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bbincoTV`.`cat_licencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`cat_licencia` (
  `id_licencia` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `cantidad_licencias` INT(11) NOT NULL COMMENT '',
  `fecha_inicio` DATETIME NOT NULL COMMENT '',
  `fecha_fin` DATETIME NOT NULL COMMENT '',
  `id_usuario` INT(3) NOT NULL COMMENT '',
  `cantidad_usadas` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`id_licencia`)  COMMENT '',
  INDEX `fk_cat_licencia_1_idx` (`id_usuario` ASC)  COMMENT '',
  CONSTRAINT `fk_cat_licencia_1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `bbincoTV`.`cat_usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bbincoTV`.`cat_template`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`cat_template` (
  `id_template` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre_template` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `descripcion_template` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `url_template` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  PRIMARY KEY (`id_template`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bbincoTV`.`cat_modulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`cat_modulo` (
  `id_modulo` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre_modulo` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `descripcion_modulo` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `id_template` INT(3) NOT NULL COMMENT '',
  `modulo_principal` INT(3) NOT NULL COMMENT '',
  `url_modulo` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL COMMENT '',
  `nombre_icono` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id_modulo`)  COMMENT '',
  INDEX `fk_cat_modulo_1_idx` (`id_template` ASC)  COMMENT '',
  CONSTRAINT `fk_cat_modulo_1`
    FOREIGN KEY (`id_template`)
    REFERENCES `bbincoTV`.`cat_template` (`id_template`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bbincoTV`.`cat_tipo_locacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`cat_tipo_locacion` (
  `id_tipo_locacion` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre_tipo_locacion` VARCHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `descripcion_tipo_locacion` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id_tipo_locacion`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bbincoTV`.`cat_miembro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`cat_miembro` (
  `id_miembro` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `codigo_miembro` VARCHAR(15) NOT NULL COMMENT '',
  `titulo` VARCHAR(5) NULL COMMENT '',
  `nombre_miembro` VARCHAR(15) NOT NULL COMMENT '',
  `paterno_miembro` VARCHAR(15) NOT NULL COMMENT '',
  `correo_miembro` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`id_miembro`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bbincoTV`.`cat_estatus_locacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`cat_estatus_locacion` (
  `id_estatus_locacion` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `codigo_locacion` VARCHAR(25) NOT NULL COMMENT '',
  `descripcion_locacion` VARCHAR(45) NOT NULL COMMENT '',
  PRIMARY KEY (`id_estatus_locacion`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bbincoTV`.`cat_descripcion_tipo_locacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`cat_descripcion_tipo_locacion` (
  `id_descripcion_tipo_locacion` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `codigo_tipo_locacion` VARCHAR(45) NOT NULL COMMENT '',
  `descripcion_tipo_locacion` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id_descripcion_tipo_locacion`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bbincoTV`.`cat_locacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`cat_locacion` (
  `id_locacion` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `codigo_locacion` VARCHAR(11) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `id_estatus_locacion` INT(3) NOT NULL COMMENT '',
  `password_locacion` VARCHAR(4) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL COMMENT '',
  `direccion_locacion` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL COMMENT '',
  `descripcion_locacion` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL COMMENT '',
  `id_modulo` INT(3) NOT NULL COMMENT '',
  `grabador` INT(1) NULL DEFAULT NULL COMMENT '',
  `id_tipo_locacion` INT(3) NOT NULL COMMENT '',
  `id_miembro` INT(3) NOT NULL COMMENT '',
  `id_descripcion_tipo_locacion` INT(3) NOT NULL COMMENT '',
  PRIMARY KEY (`id_locacion`)  COMMENT '',
  INDEX `fk_cat_locacion_2_idx` (`id_modulo` ASC)  COMMENT '',
  INDEX `fk_cat_locacion_3_idx` (`id_tipo_locacion` ASC)  COMMENT '',
  INDEX `fk_cat_locacion_1_idx` (`id_miembro` ASC)  COMMENT '',
  INDEX `fk_cat_locacion_4_idx` (`id_estatus_locacion` ASC)  COMMENT '',
  INDEX `fk_cat_locacion_5_idx` (`id_descripcion_tipo_locacion` ASC)  COMMENT '',
  CONSTRAINT `fk_cat_locacion_2`
    FOREIGN KEY (`id_modulo`)
    REFERENCES `bbincoTV`.`cat_modulo` (`id_modulo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cat_locacion_3`
    FOREIGN KEY (`id_tipo_locacion`)
    REFERENCES `bbincoTV`.`cat_tipo_locacion` (`id_tipo_locacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cat_locacion_1`
    FOREIGN KEY (`id_miembro`)
    REFERENCES `bbincoTV`.`cat_miembro` (`id_miembro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cat_locacion_4`
    FOREIGN KEY (`id_estatus_locacion`)
    REFERENCES `bbincoTV`.`cat_estatus_locacion` (`id_estatus_locacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cat_locacion_5`
    FOREIGN KEY (`id_descripcion_tipo_locacion`)
    REFERENCES `bbincoTV`.`cat_descripcion_tipo_locacion` (`id_descripcion_tipo_locacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bbincoTV`.`cat_menu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`cat_menu` (
  `id_menu` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre_menu` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `descripcion_menu` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `icono` VARCHAR(50) CHARACTER SET 'utf32' NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id_menu`)  COMMENT '')
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bbincoTV`.`cat_submenu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`cat_submenu` (
  `id_submenu` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre_submenu` VARCHAR(45) NOT NULL COMMENT '',
  `descripcion_submenu` VARCHAR(255) NULL DEFAULT NULL COMMENT '',
  `icono` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL COMMENT '',
  `url_submenu` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `id_menu` INT(3) NOT NULL COMMENT '',
  PRIMARY KEY (`id_submenu`)  COMMENT '',
  INDEX `fk_cat_submenu_1_idx` (`id_menu` ASC)  COMMENT '',
  CONSTRAINT `fk_cat_submenu_1`
    FOREIGN KEY (`id_menu`)
    REFERENCES `bbincoTV`.`cat_menu` (`id_menu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bbincoTV`.`cat_submodulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`cat_submodulo` (
  `id_submodulo` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `nombre_submodulo` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `descripcion_submodulo` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `id_modulo` INT(3) NOT NULL COMMENT '',
  `id_template` INT(3) NOT NULL COMMENT '',
  `url_submodulo` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id_submodulo`)  COMMENT '',
  INDEX `fk_cat_submodulo_1_idx` (`id_template` ASC)  COMMENT '',
  INDEX `fk_cat_submodulo_2_idx` (`id_modulo` ASC)  COMMENT '',
  CONSTRAINT `fk_cat_submodulo_1`
    FOREIGN KEY (`id_template`)
    REFERENCES `bbincoTV`.`cat_template` (`id_template`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cat_submodulo_2`
    FOREIGN KEY (`id_modulo`)
    REFERENCES `bbincoTV`.`cat_modulo` (`id_modulo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bbincoTV`.`contador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`contador` (
  `id_contador_visitas` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `id_dispositivo` INT(3) NOT NULL COMMENT '',
  `hora_visita` TIME NOT NULL COMMENT '',
  `fecha_visita` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '',
  `id_modulo` INT(3) NOT NULL COMMENT '',
  `id_submodulo` INT(3) NOT NULL COMMENT '',
  PRIMARY KEY (`id_contador_visitas`)  COMMENT '',
  INDEX `fk_contador_visitas_1_idx` (`id_modulo` ASC)  COMMENT '',
  INDEX `fk_contador_visitas_2_idx` (`id_submodulo` ASC)  COMMENT '',
  INDEX `fk_contador_visitas_3_idx` (`id_dispositivo` ASC)  COMMENT '',
  CONSTRAINT `fk_contador_visitas_1`
    FOREIGN KEY (`id_modulo`)
    REFERENCES `bbincoTV`.`cat_modulo` (`id_modulo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contador_visitas_2`
    FOREIGN KEY (`id_submodulo`)
    REFERENCES `bbincoTV`.`cat_submodulo` (`id_submodulo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_contador_visitas_3`
    FOREIGN KEY (`id_dispositivo`)
    REFERENCES `bbincoTV`.`cat_dispositivo` (`id_dispositivo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bbincoTV`.`dispositivo_locacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`dispositivo_locacion` (
  `id_dispositivo_locacion` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `id_dispositivo` INT(3) NOT NULL COMMENT '',
  `id_locacion` INT(3) NOT NULL COMMENT '',
  PRIMARY KEY (`id_dispositivo_locacion`)  COMMENT '',
  INDEX `fk_dispositivo_locacion_1_idx` (`id_locacion` ASC)  COMMENT '',
  INDEX `fk_dispositivo_locacion_2_idx` (`id_dispositivo` ASC)  COMMENT '',
  CONSTRAINT `fk_dispositivo_locacion_1`
    FOREIGN KEY (`id_locacion`)
    REFERENCES `bbincoTV`.`cat_locacion` (`id_locacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_dispositivo_locacion_2`
    FOREIGN KEY (`id_dispositivo`)
    REFERENCES `bbincoTV`.`cat_dispositivo` (`id_dispositivo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bbincoTV`.`estadisticas_canales`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`estadisticas_canales` (
  `id_estadisticas_canales` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `id_dispositivo` INT(3) NOT NULL COMMENT '',
  `id_canal` INT(3) NOT NULL COMMENT '',
  `fecha_registro` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '',
  `id_evento` INT(3) NOT NULL COMMENT '',
  PRIMARY KEY (`id_estadisticas_canales`)  COMMENT '',
  INDEX `fk_estadisticas_canales_1_idx` (`id_evento` ASC)  COMMENT '',
  INDEX `fk_estadisticas_canales_2_idx` (`id_dispositivo` ASC)  COMMENT '',
  INDEX `fk_estadisticas_canales_3` (`id_canal` ASC)  COMMENT '',
  CONSTRAINT `fk_estadisticas_canales_1`
    FOREIGN KEY (`id_evento`)
    REFERENCES `bbincoTV`.`cat_evento` (`id_evento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_estadisticas_canales_2`
    FOREIGN KEY (`id_dispositivo`)
    REFERENCES `bbincoTV`.`cat_dispositivo` (`id_dispositivo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_estadisticas_canales_3`
    FOREIGN KEY (`id_canal`)
    REFERENCES `bbincoTV`.`cat_canal` (`id_canal`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bbincoTV`.`grupo_locacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`grupo_locacion` (
  `id_grupo_locacion` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `id_grupo` INT(3) NOT NULL COMMENT '',
  `id_locacion` INT(3) NOT NULL COMMENT '',
  PRIMARY KEY (`id_grupo_locacion`)  COMMENT '',
  INDEX `fk_grupo_locacion_1_idx` (`id_locacion` ASC)  COMMENT '',
  INDEX `fk_grupo_locacion_2_idx` (`id_grupo` ASC)  COMMENT '',
  CONSTRAINT `fk_grupo_locacion_1`
    FOREIGN KEY (`id_locacion`)
    REFERENCES `bbincoTV`.`cat_locacion` (`id_locacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_grupo_locacion_2`
    FOREIGN KEY (`id_grupo`)
    REFERENCES `bbincoTV`.`cat_grupo` (`id_grupo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bbincoTV`.`log`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`log` (
  `id_log` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `fecha_log` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '',
  `descripcion_log` VARCHAR(500) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `id_usuario` INT(3) NOT NULL COMMENT '',
  PRIMARY KEY (`id_log`)  COMMENT '',
  INDEX `fk_log_1_idx` (`id_usuario` ASC)  COMMENT '',
  CONSTRAINT `fk_log_1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `bbincoTV`.`cat_usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bbincoTV`.`mensaje`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`mensaje` (
  `id_mensaje` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `destinatario` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `asunto` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `cuerpo_mensaje` VARCHAR(255) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL COMMENT '',
  `fecha_envio` DATETIME NOT NULL COMMENT '',
  `fecha_fin_envio` DATETIME NOT NULL COMMENT '',
  `id_usuario` INT(3) NOT NULL COMMENT '',
  `id_estatus_lectura` INT(3) NOT NULL COMMENT '',
  PRIMARY KEY (`id_mensaje`)  COMMENT '',
  INDEX `fk_mensaje_1_idx` (`id_usuario` ASC)  COMMENT '',
  INDEX `fk_mensaje_2_idx` (`id_estatus_lectura` ASC)  COMMENT '',
  CONSTRAINT `fk_mensaje_1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `bbincoTV`.`cat_usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mensaje_2`
    FOREIGN KEY (`id_estatus_lectura`)
    REFERENCES `bbincoTV`.`cat_estatus_lectura` (`id_estatus_lectura`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bbincoTV`.`mensaje_grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`mensaje_grupo` (
  `id_mensaje_grupo` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `id_grupo` INT(3) NOT NULL COMMENT '',
  `id_mensaje` INT(3) NOT NULL COMMENT '',
  PRIMARY KEY (`id_mensaje_grupo`)  COMMENT '',
  INDEX `fk_mensaje_grupo_1_idx` (`id_grupo` ASC)  COMMENT '',
  INDEX `fk_mensaje_grupo_2_idx` (`id_mensaje` ASC)  COMMENT '',
  CONSTRAINT `fk_mensaje_grupo_1`
    FOREIGN KEY (`id_grupo`)
    REFERENCES `bbincoTV`.`cat_grupo` (`id_grupo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mensaje_grupo_2`
    FOREIGN KEY (`id_mensaje`)
    REFERENCES `bbincoTV`.`mensaje` (`id_mensaje`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bbincoTV`.`mensaje_locacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`mensaje_locacion` (
  `id_mensaje_locacion` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `id_locacion` INT(3) NOT NULL COMMENT '',
  `id_mensaje` INT(3) NOT NULL COMMENT '',
  PRIMARY KEY (`id_mensaje_locacion`)  COMMENT '',
  INDEX `fk_mensaje_locacion_2_idx` (`id_mensaje` ASC)  COMMENT '',
  INDEX `fk_mensaje_locacion_1_idx` (`id_locacion` ASC)  COMMENT '',
  CONSTRAINT `fk_mensaje_locacion_1`
    FOREIGN KEY (`id_locacion`)
    REFERENCES `bbincoTV`.`cat_locacion` (`id_locacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mensaje_locacion_2`
    FOREIGN KEY (`id_mensaje`)
    REFERENCES `bbincoTV`.`mensaje` (`id_mensaje`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bbincoTV`.`paquete_canal`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`paquete_canal` (
  `id_paquete_canal` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `id_canal` INT(3) NOT NULL COMMENT '',
  `id_paquete` INT(3) NOT NULL COMMENT '',
  `numero_canal` INT(4) NOT NULL COMMENT '',
  PRIMARY KEY (`id_paquete_canal`)  COMMENT '',
  INDEX `fk_paquete_canal_1_idx` (`id_canal` ASC)  COMMENT '',
  INDEX `fk_paquete_canal_2_idx` (`id_paquete_canal` ASC)  COMMENT '',
  INDEX `fk_paquete_canal_2_idx1` (`id_paquete` ASC)  COMMENT '',
  CONSTRAINT `fk_paquete_canal_1`
    FOREIGN KEY (`id_canal`)
    REFERENCES `bbincoTV`.`cat_canal` (`id_canal`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_paquete_canal_2`
    FOREIGN KEY (`id_paquete`)
    REFERENCES `bbincoTV`.`cat_paquete` (`id_paquete`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bbincoTV`.`perfil_menu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`perfil_menu` (
  `id_perfil_menu` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `id_perfil` INT(3) NOT NULL COMMENT '',
  `id_menu` INT(3) NOT NULL COMMENT '',
  PRIMARY KEY (`id_perfil_menu`)  COMMENT '',
  INDEX `fk_perfil_menu_1_idx` (`id_perfil` ASC)  COMMENT '',
  INDEX `fk_perfil_menu_2_idx` (`id_menu` ASC)  COMMENT '',
  CONSTRAINT `fk_perfil_menu_1`
    FOREIGN KEY (`id_perfil`)
    REFERENCES `bbincoTV`.`cat_perfil` (`id_perfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_perfil_menu_2`
    FOREIGN KEY (`id_menu`)
    REFERENCES `bbincoTV`.`cat_menu` (`id_menu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bbincoTV`.`template_contenido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bbincoTV`.`template_contenido` (
  `id_template_contenido` INT(3) NOT NULL AUTO_INCREMENT COMMENT '',
  `id_contenido` INT(3) NOT NULL COMMENT '',
  `id_template` INT(3) NOT NULL COMMENT '',
  PRIMARY KEY (`id_template_contenido`)  COMMENT '',
  INDEX `fk_template_contenido_1_idx` (`id_contenido` ASC)  COMMENT '',
  INDEX `fk_template_contenido_2_idx` (`id_template` ASC)  COMMENT '',
  CONSTRAINT `fk_template_contenido_1`
    FOREIGN KEY (`id_contenido`)
    REFERENCES `bbincoTV`.`cat_contenido` (`id_contenido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_template_contenido_2`
    FOREIGN KEY (`id_template`)
    REFERENCES `bbincoTV`.`cat_template` (`id_template`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
