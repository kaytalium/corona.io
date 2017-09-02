SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `corona7210` ;
CREATE SCHEMA IF NOT EXISTS `corona7210` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `corona7210` ;

-- -----------------------------------------------------
-- Table `corona7210`.`person`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `corona7210`.`person` ;

CREATE TABLE IF NOT EXISTS `corona7210`.`person` (
  `email` VARCHAR(255) NOT NULL,
  `firstname` VARCHAR(255) NULL,
  `lastname` VARCHAR(255) NULL,
  `AvatarUrl` VARCHAR(255) NULL,
  `password` VARCHAR(255) NULL,
  `salt` VARCHAR(255) NULL,
  `agreement` VARCHAR(45) NULL,
  PRIMARY KEY (`email`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;