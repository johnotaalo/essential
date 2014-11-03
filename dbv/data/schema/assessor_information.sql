CREATE TABLE `assessor_information` (
  `assessor_id` int(11) NOT NULL AUTO_INCREMENT,
  `assessor_name` varchar(400) DEFAULT 'n/a',
  `assessor_designation` varchar(255) DEFAULT '-1',
  `assessor_emailAddress` varchar(255) DEFAULT '-1',
  `assessor_phoneNumber` int(11) DEFAULT '-1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `facility_mfl` varchar(11) DEFAULT NULL,
  `ss_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`assessor_id`),
  KEY `facilityID` (`facility_mfl`),
  KEY `facilityID_2` (`facility_mfl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1