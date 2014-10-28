CREATE TABLE `access_challenges` (
  `ach_id` int(11) NOT NULL AUTO_INCREMENT,
  `ach_code` varchar(45) DEFAULT NULL,
  `ach_name` text,
  PRIMARY KEY (`ach_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1