CREATE SCHEMA IF NOT EXISTS `mydb`;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`user` (
  `email` VARCHAR(30) NOT NULL ,
  `first_name` VARCHAR(20) NOT NULL ,
  `last_name` VARCHAR(20) NOT NULL ,
  `is_staff` TINYINT(1) NOT NULL ,
  `password` VARCHAR(20) NOT NULL ,
  `user_id` INT NOT NULL AUTO_INCREMENT ,
  PRIMARY KEY (`user_id`) )
ENGINE = InnoDB;

CREATE UNIQUE INDEX `Email_UNIQUE` ON `mydb`.`user` (`email` ASC) ;


-- -----------------------------------------------------
-- Table `mydb`.`milestone`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`milestone` (
  `milestone_id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(50) NULL ,
  `description` LONGTEXT NULL ,
  `parent_modules_id` INT NULL ,
  `has_parent` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`milestone_id`)
  FOREIGN KEY (`parent_modules_id`) REFERENCES `mydb`.`modules`(`modules_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`deadline`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`deadline` (
  `milestone_id` INT NOT NULL ,
  `start_date` DATE NOT NULL ,
  `end_date` DATE NOT NULL ,
  `deadline_id` INT NOT NULL AUTO_INCREMENT ,
  PRIMARY KEY (`deadline_id`)
  FOREIGN KEY (`milestone_id`) REFERENCES `mydb`.`milestone`(`milestone_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`task`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`task` (
  `milestone_id` INT NOT NULL ,
  `user_id` VARCHAR(45) NOT NULL ,
  `is_complete` VARCHAR(45) NOT NULL ,
  `task_id` INT NOT NULL AUTO_INCREMENT ,
  PRIMARY KEY (`task_id`)
  FOREIGN KEY (`user_id`) REFERENCES `mydb`.`user`(`user_id`) )
  FOREIGN KEY (`milestone_id`) REFERENCES `mydb`.`milestone`(`milestone_id`) )
  
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`member`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`member` (
  `member_id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `modules_id` INT NOT NULL,
  PRIMARY KEY (`member_id`)
  FOREIGN KEY (`user_id`) REFERENCES `mydb`.`user`(`user_id`) 
  FOREIGN KEY (`modules_id`) REFERENCES `mydb`.`modules`(`modules_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`modules`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`modules` (
  `modules_id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `description` LONGTEXT NULL ,
  `modules_leader` INT NOT NULL ,
  PRIMARY KEY (`modules_id`) 
  FOREIGN KEY (`modules_leader`) REFERENCES `mydb`.`user`(`user_id`) )
ENGINE = InnoDB;

USE `mydb` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
