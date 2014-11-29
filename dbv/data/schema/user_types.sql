CREATE TABLE `user_types` (
  `ut_id` int(11) NOT NULL AUTO_INCREMENT,
  `ut_name` varchar(45) DEFAULT NULL,
  `ut_level` varchar(45) DEFAULT NULL,
  `ut_roles` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ut_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1