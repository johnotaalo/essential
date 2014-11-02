CREATE TABLE `log_treatments` (
  `lt_id` int(11) NOT NULL AUTO_INCREMENT,
  `lt_total` int(11) DEFAULT NULL,
  `lt_classification` varchar(255) DEFAULT '-1',
  `lt_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `treatment_code` varchar(45) DEFAULT NULL,
  `facility_mfl` varchar(11) DEFAULT NULL,
  `ss_id` int(11) DEFAULT NULL,
  `lt_other_treatment` text,
  `lt_treatments` varchar(255) NOT NULL DEFAULT 'NULL',
  `lt_other_treatments` text,
  `lt_other_treatments_numbers` text,
  PRIMARY KEY (`lt_id`),
  KEY `Challenges_id` (`lt_id`),
  KEY `ChallengeID` (`treatment_code`),
  KEY `facilityID` (`facility_mfl`),
  KEY `facilityID_2` (`facility_mfl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1