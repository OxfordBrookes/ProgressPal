SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `mydb` ;
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
SHOW WARNINGS;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `user` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `user` (
  `email` VARCHAR(30) NOT NULL ,
  `first_name` VARCHAR(20) NOT NULL ,
  `last_name` VARCHAR(20) NOT NULL ,
  `is_staff` TINYINT(1) NOT NULL ,
  `password` VARCHAR(20) NOT NULL ,
  `user_id` INT NOT NULL AUTO_INCREMENT ,
  PRIMARY KEY (`user_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE UNIQUE INDEX `Email_UNIQUE` ON `user` (`email` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `milestone`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `milestone` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `milestone` (
  `milestone_id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(50) NULL ,
  `description` LONGTEXT NULL ,
  `parent_module_id` INT NULL ,
  `has_parent` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`milestone_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `deadline`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `deadline` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `deadline` (
  `milestone_id` INT NOT NULL ,
  `group_id` INT NOT NULL ,
  `start_date` DATE NOT NULL ,
  `end_date` DATE NOT NULL ,
  `deadline_id` INT NOT NULL AUTO_INCREMENT ,
  PRIMARY KEY (`deadline_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `task`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `task` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `task` (
  `milestone_id` INT NOT NULL ,
  `group_id` VARCHAR(45) NOT NULL ,
  `user_id` VARCHAR(45) NOT NULL ,
  `is_complete` VARCHAR(45) NOT NULL ,
  `task_id` INT NOT NULL AUTO_INCREMENT ,
  PRIMARY KEY (`task_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `group`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `group` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `group` (
  `group_id` INT NOT NULL AUTO_INCREMENT ,
  `milestone_id` INT NOT NULL ,
  `name` VARCHAR(20) NOT NULL ,
  `group_leader` INT NOT NULL ,
  `parent_module` INT NOT NULL ,
  PRIMARY KEY (`group_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `member`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `member` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `member` (
  `member_id` INT NOT NULL AUTO_INCREMENT ,
  `group_id` INT NOT NULL ,
  `user_id` INT NOT NULL ,
  PRIMARY KEY (`member_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `module`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `module` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `module` (
  `module_id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `description` LONGTEXT NULL ,
  `module_leader` INT NOT NULL ,
  `child_group` INT NOT NULL ,
  PRIMARY KEY (`module_id`) )
ENGINE = InnoDB;

SHOW WARNINGS;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
