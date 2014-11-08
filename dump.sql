-- MySQL Script generated by MySQL Workbench
-- 11/08/14 10:17:09
-- Model: New Model    Version: 1.0
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `webdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`service`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS service` (
  `id` INT(2) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(155) NOT NULL,
  `desc` TEXT NOT NULL,
  `price` INT(3) NOT NULL,
  `archive` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`subscriber`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `subscriber` (
  `id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `surname` VARCHAR(45) NOT NULL,
  `patronymic` VARCHAR(45) NULL,
  `brithdate` DATE NOT NULL,
  `gender` ENUM('M','F') NOT NULL,
  `pasport_series` VARCHAR(10) NOT NULL,
  `pas_number` VARCHAR(6) NOT NULL,
  `pas_adress` VARCHAR(150) NOT NULL,
  `pas_get_date` DATE NOT NULL,
  `pas_get_dep` VARCHAR(155) NOT NULL,
  `phone_contact` VARCHAR(11) NULL,
  `login_phone` VARCHAR(10) NOT NULL,
  `email` VARCHAR(150) NULL,
  `status` ENUM('ON','TMPOFF','OFF') NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`service_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `service_info` (
  `begin_date` DATE NOT NULL,
  `end_date` DATE NULL,
  `service_id` INT(2) UNSIGNED NOT NULL,
  `subscriber_id` INT(5) UNSIGNED NOT NULL,
  INDEX `service_id_idx` (`service_id` ASC),
  INDEX `subscriber_id_idx` (`subscriber_id` ASC),
  CONSTRAINT `con_service_id`
    FOREIGN KEY (`service_id`)
    REFERENCES `webdb`.`service` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `con_subscriber_id`
    FOREIGN KEY (`subscriber_id`)
    REFERENCES `webdb`.`subscriber` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tariff`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tariff` (
  `id` INT(2) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(155) NOT NULL,
  `desc` TEXT NOT NULL,
  `price` INT(3) UNSIGNED NOT NULL,
  `archive` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`staff`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `staff` (
  `id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  `surname` VARCHAR(150) NOT NULL,
  `patronymic` VARCHAR(150) NULL,
  `brithdate` DATE NOT NULL,
  `gender` ENUM('F','M') NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `department` ENUM('OT1','OT2') NOT NULL,
  `position` VARCHAR(100) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `login_UNIQUE` (`login` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ticket`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ticket` (
  `id` INT(4) NOT NULL AUTO_INCREMENT,
  `subscriber_id` INT(5) UNSIGNED NOT NULL,
  `operator_id` INT(5) UNSIGNED NOT NULL,
  `topic` VARCHAR(255) NOT NULL,
  `rating_efficiency` INT(5) UNSIGNED NOT NULL DEFAULT 0,
  `rating_speed` INT(5) UNSIGNED NOT NULL DEFAULT 0,
  `ratig_quality` INT(5) UNSIGNED NOT NULL DEFAULT 0,
  `status` ENUM('OPEN','CLOSED') NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `con_subscriber_ida`
    FOREIGN KEY (`subscriber_id`)
    REFERENCES `subscriber` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `operator_id`
    FOREIGN KEY (`operator_id`)
    REFERENCES `staff` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`message`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `message` (
  `id` INT(4) NOT NULL AUTO_INCREMENT,
  `text` TEXT NOT NULL,
  `date` DATE NOT NULL,
  `direct` ENUM('ABON','OPERAT') NOT NULL,
  `ticket_id` INT(4) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `con_ticket_id`
    FOREIGN KEY (`ticket_id`)
    REFERENCES `mydb`.`ticket` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`brigade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `brigade` (
  `id` INT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `brigadier` VARCHAR(80) NOT NULL,
  `auto_reg_num` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `auto_reg_num_UNIQUE` (`auto_reg_num` ASC),
  UNIQUE INDEX `login_UNIQUE` (`login` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tariff_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tariff_info` (
  `begin_date` DATE NOT NULL,
  `end_date` DATE NULL,
  `tariff_id` INT(2) NOT NULL,
  `subscriber_id` INT(5) UNSIGNED NOT NULL,
  INDEX `subscriber_id_idx` (`subscriber_id` ASC),
  INDEX `tariff_id_idx` (`tariff_id` ASC),
  CONSTRAINT `con_subscriber_idb`
    FOREIGN KEY (`subscriber_id`)
    REFERENCES `subscriber` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `con_tariff_id`
    FOREIGN KEY (`tariff_id`)
    REFERENCES `tariff` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`balance`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `balance` (
  `summ` INT(4) NOT NULL DEFAULT 0,
  `date` DATE NOT NULL,
  `type` ENUM('dengi','bonuce') NOT NULL,
  `subscriber_id` INT(5) UNSIGNED NOT NULL,
  INDEX `subscriber_id_idx` (`subscriber_id` ASC),
  CONSTRAINT `con_subscriber_idc`
    FOREIGN KEY (`subscriber_id`)
    REFERENCES `subscriber` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`request_card`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `request_card` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `subscriber_id` INT(5) UNSIGNED NOT NULL,
  `operator_id` INT(5) UNSIGNED NULL,
  `brigade_id` INT(3) UNSIGNED NULL,
  `target` VARCHAR(200) NOT NULL,
  `status` ENUM('READ','EXECUTE','DONE','CANCELED') NOT NULL,
  `begin_date` DATE NOT NULL,
  `end_date` DATE NULL,
  `brigade_rating_efficiency` INT(5) UNSIGNED NOT NULL DEFAULT 0,
  `brigade_rating_speed` INT(5) UNSIGNED NOT NULL DEFAULT 0,
  `brigade_rating_service` INT(5) UNSIGNED NOT NULL DEFAULT 0,
  `operator_rating_efficiency` INT(5) UNSIGNED NOT NULL DEFAULT 0,
  `operator_rating_speed` INT(5) UNSIGNED NOT NULL DEFAULT 0,
  `operator_rating_service` INT(5) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `operator_id_idx` (`operator_id` ASC),
  INDEX `subscriber_id_idx` (`subscriber_id` ASC),
  CONSTRAINT `con_subscriber_idd`
    FOREIGN KEY (`subscriber_id`)
    REFERENCES `subscriber` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `operator_id`
    FOREIGN KEY (`operator_id`)
    REFERENCES `staff` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `brigade_id`
    FOREIGN KEY (`brigade_id`)
    REFERENCES `brigade` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`rate_staff`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rate_staff` (
  `idrate_staff` INT NOT NULL,
  PRIMARY KEY (`idrate_staff`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;