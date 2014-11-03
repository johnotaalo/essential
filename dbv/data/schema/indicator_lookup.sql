CREATE TABLE `indicator_lookup` (
  `il_id` int(11) NOT NULL AUTO_INCREMENT,
  `il_for` varchar(45) DEFAULT NULL,
  `il_full_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`il_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1