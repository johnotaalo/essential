CREATE TABLE `hcw_profile` (
  `hp_id` int(11) NOT NULL AUTO_INCREMENT,
  `hp_firstName` varchar(400) DEFAULT 'n/a',
  `hp_surname` varchar(400) DEFAULT 'n/a',
  `hp_nationalID` varchar(255) DEFAULT '-1',
  `hp_phoneNumber` int(11) DEFAULT '-1',
  `hp_coordinator` varchar(45) DEFAULT NULL,
  `hp_year` varchar(9) DEFAULT NULL,
  `hp_designation` varchar(255) DEFAULT '-1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `facility_mfl` varchar(11) DEFAULT NULL,
  `ss_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`hp_id`),
  KEY `facilityID` (`facility_mfl`),
  KEY `facilityID_2` (`facility_mfl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1