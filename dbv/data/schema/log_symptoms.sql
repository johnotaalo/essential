CREATE TABLE `log_symptoms` (
  `ls_id` int(11) NOT NULL AUTO_INCREMENT,
  `ls_shortname` varchar(45) DEFAULT NULL,
  `ls_treatments` varchar(255) DEFAULT '-1',
  `lt_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `facility_mfl` varchar(11) DEFAULT NULL,
  `ss_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ls_id`),
  KEY `facilityID` (`facility_mfl`),
  KEY `facilityID_2` (`facility_mfl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1