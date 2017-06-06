SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema softamb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema softamb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `softamb` DEFAULT CHARACTER SET utf8 ;
USE `softamb` ;

-- -----------------------------------------------------
-- Table `softamb`.`persona`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softamb`.`persona` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `rut` VARCHAR(10) NOT NULL,
  `password` VARCHAR(255) NULL,
  `nombre` VARCHAR(255) NOT NULL,
  `apellido` VARCHAR(255) NOT NULL,
  `fecha_nacimiento` VARCHAR(255) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `contacto` VARCHAR(45) NULL,
  `activo` TINYINT(1) NOT NULL DEFAULT '1',
  `gestor` TINYINT(1) NULL DEFAULT '0',
  `cliente` TINYINT(1) NULL DEFAULT '1',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `softamb`.`ambulancia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softamb`.`ambulancia` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `patente` VARCHAR(45) NOT NULL,
  `persona_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_ambulancia_persona_idx` (`persona_id` ASC),
  CONSTRAINT `fk_ambulancia_persona`
    FOREIGN KEY (`persona_id`)
    REFERENCES `softamb`.`persona` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `softamb`.`category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softamb`.`category` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softamb`.`sintoma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softamb`.`sintoma` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  `categoria` VARCHAR(255) NOT NULL,
  `descripcion_sintomas` VARCHAR(45) NOT NULL,
  `primeros_auxilios` MEDIUMTEXT NULL DEFAULT NULL,
  `ambulancia` TINYINT(1) NULL DEFAULT NULL,
  `category_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_sintoma_category1_idx` (`category_id` ASC),
  CONSTRAINT `fk_sintoma_category1`
    FOREIGN KEY (`category_id`)
    REFERENCES `softamb`.`category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `softamb`.`carga`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softamb`.`carga` (
  `persona_id` INT(11) NOT NULL,
  `carga_id` INT(11) NOT NULL,
  `nombre` VARCHAR(225) NULL,
  `fecha_nacimiento` VARCHAR(255) NULL,
  INDEX `fk_persona_idx` (`persona_id` ASC),
  INDEX `fk_carga_idx` (`carga_id` ASC),
  PRIMARY KEY (`carga_id`, `persona_id`),
  CONSTRAINT `fk_carga_persona`
    FOREIGN KEY (`persona_id`)
    REFERENCES `softamb`.`persona` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_carga_carga`
    FOREIGN KEY (`carga_id`)
    REFERENCES `softamb`.`persona` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
-- Insertar Datos Basicos

INSERT INTO `persona` (`id`, `rut`, `password`, `nombre`, `apellido`, `fecha_nacimiento`, `direccion`, `contacto`, `activo`, `gestor`, `cliente`) VALUES ('2', 'admin', '356a192b7913b04c54574d18c28d46e6395428ab', 'Admin', 'Admin', 'fecha', 'dir', '234234', '1', '1', '0');
INSERT INTO `persona` (`id`, `rut`, `password`, `nombre`, `apellido`, `fecha_nacimiento`, `direccion`, `contacto`, `activo`, `gestor`, `cliente`) VALUES ('3', 'cliente', '356a192b7913b04c54574d18c28d46e6395428ab', 'Cliente', 'Cliente', 'fecha', 'dir', '234234', '1', '0', '1');
INSERT INTO `persona` (`id`, `rut`, `password`, `nombre`, `apellido`, `fecha_nacimiento`, `direccion`, `contacto`, `activo`, `gestor`, `cliente`) VALUES ('4', 'ambos', '356a192b7913b04c54574d18c28d46e6395428ab', 'Ambos', 'Ambos', 'fecha', 'dir', '234234', '1', '1', '1');

-- Categorias Basicas
INSERT INTO `category` (`id`, `nombre`) VALUES ('1', 'Estomago');
INSERT INTO `category` (`id`, `nombre`) VALUES ('2', 'Cabeza');
INSERT INTO `category` (`id`, `nombre`) VALUES ('3', 'Ojos');
INSERT INTO `category` (`id`, `nombre`) VALUES ('4', 'Espalda');
INSERT INTO `category` (`id`, `nombre`) VALUES ('5', 'Manos');
INSERT INTO `category` (`id`, `nombre`) VALUES ('6', 'Pies');

-- Sintomas Basicos
INSERT INTO `sintoma` (`id`, `nombre`,  `categoria`, `descripcion_sintomas`, `primeros_auxilios`, `ambulancia`, `category_id`) VALUES ('1', 'Acidez', 'Estomago', 'Desc sintoma ....', 'Que hacer en caso de ....', '0', '1');
INSERT INTO `sintoma` (`id`, `nombre`,  `categoria`, `descripcion_sintomas`, `primeros_auxilios`, `ambulancia`, `category_id`) VALUES ('2', 'Nauseas', 'Estomago', 'Desc sintoma ....', 'Que hacer en caso de ....', '0', '1');
INSERT INTO `sintoma` (`id`, `nombre`,  `categoria`, `descripcion_sintomas`, `primeros_auxilios`, `ambulancia`, `category_id`) VALUES ('3', 'Dolor Punzante', 'Estomago', 'Desc sintoma ....', 'Que hacer en caso de ....', '0', '1');
INSERT INTO `sintoma` (`id`, `nombre`,  `categoria`, `descripcion_sintomas`, `primeros_auxilios`, `ambulancia`, `category_id`) VALUES ('4', 'Ardor', 'Estomago', 'Desc sintoma ....', 'Que hacer en caso de ....', '0', '1');


INSERT INTO `sintoma` (`id`, `nombre`,  `categoria`, `descripcion_sintomas`, `primeros_auxilios`, `ambulancia`, `category_id`) VALUES ('5', 'Dolor Zona Frontal', 'Cabeza', 'Desc sintoma ....', 'Que hacer en caso de ....', '0', '2');
INSERT INTO `sintoma` (`id`, `nombre`,  `categoria`, `descripcion_sintomas`, `primeros_auxilios`, `ambulancia`, `category_id`) VALUES ('6', 'Mareos', 'Cabeza', 'Desc sintoma ....', 'Que hacer en caso de ....', '0', '2');
INSERT INTO `sintoma` (`id`, `nombre`,  `categoria`, `descripcion_sintomas`, `primeros_auxilios`, `ambulancia`, `category_id`) VALUES ('7', 'Perdida de Memoria', 'Cabeza', 'Desc sintoma ....', 'Que hacer en caso de ....', '0', '2');
INSERT INTO `sintoma` (`id`, `nombre`,  `categoria`, `descripcion_sintomas`, `primeros_auxilios`, `ambulancia`, `category_id`) VALUES ('8', 'Desmayos', 'Cabeza', 'Desc sintoma ....', 'Que hacer en caso de ....', '1', '2');



INSERT INTO `sintoma` (`id`, `nombre`,  `categoria`, `descripcion_sintomas`, `primeros_auxilios`, `ambulancia`, `category_id`) VALUES ('9', 'Dolor Lumbar', 'Espalda', 'Desc sintoma ....', 'Que hacer en caso de ....', '0', '4');
INSERT INTO `sintoma` (`id`, `nombre`,  `categoria`, `descripcion_sintomas`, `primeros_auxilios`, `ambulancia`, `category_id`) VALUES ('10', 'Dolor Muscular', 'Espalda', 'Desc sintoma ....', 'Que hacer en caso de ....', '0', '4');
INSERT INTO `sintoma` (`id`, `nombre`,  `categoria`, `descripcion_sintomas`, `primeros_auxilios`, `ambulancia`, `category_id`) VALUES ('11', 'Perdida de Movilidad', 'Espalda', 'Desc sintoma ....', 'Que hacer en caso de ....', '1', '4');
INSERT INTO `sintoma` (`id`, `nombre`,  `categoria`, `descripcion_sintomas`, `primeros_auxilios`, `ambulancia`, `category_id`) VALUES ('12', 'Fractura Expuesta', 'Espalda', 'Desc sintoma ....', 'Que hacer en caso de ....', '1', '4');