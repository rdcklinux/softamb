SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `softamb` DEFAULT CHARACTER SET utf8 ;
USE `softamb` ;

-- -----------------------------------------------------
-- Table `softamb`.`persona`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `softamb`.`persona` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `rut` VARCHAR(10) NOT NULL ,
  `password` VARCHAR(255) NULL ,
  `nombre` VARCHAR(255) NOT NULL ,
  `apellido` VARCHAR(255) NOT NULL ,
  `fecha_nacimiento` DATE NOT NULL ,
  `telefono` VARCHAR(20) NULL ,
  `direccion` VARCHAR(45) NOT NULL ,
  `activo` TINYINT(1) NOT NULL DEFAULT '1' ,
  `gestor` TINYINT(1) NULL DEFAULT '0' ,
  `cliente` TINYINT(1) NULL DEFAULT '1' ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `softamb`.`ambulancia`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `softamb`.`ambulancia` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `patente` VARCHAR(45) NOT NULL ,
  `persona_id` INT(11) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_ambulancia_persona_idx` (`persona_id` ASC) ,
  CONSTRAINT `fk_ambulancia_persona`
    FOREIGN KEY (`persona_id` )
    REFERENCES `softamb`.`persona` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `softamb`.`categoria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `softamb`.`categoria` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `softamb`.`sintoma`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `softamb`.`sintoma` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `descripcion_sintomas` VARCHAR(45) NOT NULL ,
  `primeros_auxilios` MEDIUMTEXT NULL DEFAULT NULL ,
  `ambulancia` TINYINT(1) NULL DEFAULT 0 ,
  `category_id` INT NOT NULL ,
  `nombre` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_sintoma_category1_idx` (`category_id` ASC) ,
  CONSTRAINT `fk_sintoma_category1`
    FOREIGN KEY (`category_id` )
    REFERENCES `softamb`.`categoria` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `softamb`.`carga`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `softamb`.`carga` (
  `persona_id` INT(11) NOT NULL ,
  `carga_id` INT(11) NOT NULL ,
  `nombre` VARCHAR(255) NULL ,
  `apellido` VARCHAR(255) NULL ,
  `edad` INT(11) NULL ,
  `rut` VARCHAR(255) NULL ,
  INDEX `fk_persona_idx` (`persona_id` ASC) ,
  INDEX `fk_carga_idx` (`carga_id` ASC) ,
  PRIMARY KEY (`carga_id`, `persona_id`) ,
  CONSTRAINT `fk_carga_persona`
    FOREIGN KEY (`persona_id` )
    REFERENCES `softamb`.`persona` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_carga_carga`
    FOREIGN KEY (`carga_id` )
    REFERENCES `softamb`.`persona` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `softamb` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
