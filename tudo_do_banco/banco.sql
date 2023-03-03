-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema sisematwig
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema sisematwig
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sistematwig` DEFAULT CHARACTER SET utf8 ;
USE `sistematwig` ;

-- -----------------------------------------------------
-- Table `sistematwig`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistematwig`.`usuarios` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `username` VARCHAR(255) NOT NULL,
  `senha` VARCHAR(255) NOT NULL,
  `admin` TINYINT NOT NULL DEFAULT 0,
  `ativo` TINYINT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = '		';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO `usuarios` (`id`, `nome`, `email`, `username`, `senha`, `admin`, `ativo`) 
VALUES (NULL, 'Inácio Lago', 'inaciobortolaslago@gmail.com', 'inacio', '123', '1', '1'),
 (NULL, 'Fulano de tal', 'fulano@detal.com', 'fulano', '123', '0', '1');