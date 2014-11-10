CREATE TABLE `hcw_assessment_tracker` (
  `ast_id` int(11) NOT NULL AUTO_INCREMENT,
  `ast_section` varchar(45) NOT NULL,
  `ast_last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `facilityCode` varchar(45) NOT NULL,
  `hcw_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ast_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1