CREATE TABLE `log_diarrhoea` (
  `ld_id` int(11) NOT NULL AUTO_INCREMENT,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `month` varchar(45) DEFAULT NULL,
  `year` varchar(45) DEFAULT NULL,
  `fac_mfl` varchar(11) NOT NULL,
  `ss_id` int(11) DEFAULT NULL,
  `ld_number` int(11) DEFAULT NULL,
  PRIMARY KEY (`ld_id`),
  KEY `facilityID` (`fac_mfl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1