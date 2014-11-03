CREATE TABLE `log_challenges` (
  `lc_id` int(11) NOT NULL AUTO_INCREMENT,
  `ach_code` varchar(45) DEFAULT NULL,
  `fac_mfl` int(11) DEFAULT NULL,
  `ss_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`lc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1