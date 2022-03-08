CREATE DATABASE csv;
Use csv; 
CREATE TABLE `data` ( `user_id` INT NOT NULL AUTO_INCREMENT ,  `full_name` VARCHAR(255) NOT NULL ,  `email` VARCHAR(255) NOT NULL ,  `password` VARCHAR(255) NOT NULL ,  `is_admin` BOOLEAN NOT NULL ,  `created_on` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,  `created_by` INT(111) NOT NULL ,    PRIMARY KEY  (`user_id`)) ENGINE = InnoDB;