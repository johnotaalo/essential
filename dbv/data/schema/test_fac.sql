CREATE TABLE `test_fac` (
  `fac_id` int(11) NOT NULL AUTO_INCREMENT,
  `fac_mfl` varchar(6) NOT NULL,
  `county` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  PRIMARY KEY (`fac_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1