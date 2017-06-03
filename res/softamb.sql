-- MySQL Script generated by MySQL Workbench
-- 06/01/17 20:21:14
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

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
  `id` INT(11) NOT NULL,
  `rut` VARCHAR(10) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `nombre` VARCHAR(255) NOT NULL,
  `apellido` VARCHAR(255) NOT NULL,
  `fecha_nacimiento` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `contacto` INT(11) NULL DEFAULT NULL,
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
  `id` INT(11) NOT NULL,
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
-- Table `softamb`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softamb`.`category` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softamb`.`sintoma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `softamb`.`sintoma` (
  `id` INT(11) NOT NULL,
  `categoria` VARCHAR(255) NOT NULL,
  `descripcion_sintomas` VARCHAR(45) NOT NULL,
  `primeros_auxilios` MEDIUMTEXT NULL DEFAULT NULL,
  `ambulancia` TINYINT(1) NULL,
  `categoria_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_sintoma_categoria1_idx` (`categoria_id` ASC),
  CONSTRAINT `fk_sintoma_categoria1`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `softamb`.`categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
