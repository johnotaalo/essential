CREATE TABLE `help` (
  `help_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `fac_mfl` varchar(45) DEFAULT NULL,
  `complaint` text,
  PRIMARY KEY (`help_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1