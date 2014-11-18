CREATE TABLE `mnh_live`.`users` (
  `user_id` INT NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(45) NULL,
  `user_password` VARCHAR(45) NULL,
  `cl_id` VARCHAR(45) NULL,
  `ut_id` VARCHAR(45) NULL,
  PRIMARY KEY (`user_id`));
  
  ALTER TABLE `mnh_live`.`users` 
CHANGE COLUMN `cl_id` `cl_id` INT(11) NULL DEFAULT NULL ,
CHANGE COLUMN `ut_id` `ut_id` INT(11) NULL DEFAULT NULL ;

ALTER TABLE `mnh_live`.`users` 
ADD INDEX `contact_list_users_idx` (`cl_id` ASC),
ADD INDEX `user_types_users_idx` (`ut_id` ASC);
ALTER TABLE `mnh_live`.`users` 
ADD CONSTRAINT `contact_list_users`
  FOREIGN KEY (`cl_id`)
  REFERENCES `mnh_live`.`contacts_list` (`cl_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `user_types_users`
  FOREIGN KEY (`ut_id`)
  REFERENCES `mnh_live`.`user_types` (`ut_id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
