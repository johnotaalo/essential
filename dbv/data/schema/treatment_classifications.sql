CREATE TABLE `treatment_classifications` (
  `tc_id` int(11) NOT NULL AUTO_INCREMENT,
  `tc_name` varchar(45) DEFAULT NULL,
  `tc_for` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`tc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1