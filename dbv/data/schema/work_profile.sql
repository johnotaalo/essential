CREATE TABLE `work_profile` (
  `lq_id` int(11) NOT NULL AUTO_INCREMENT,
  `lq_currentUnit` varchar(45) NOT NULL,
  `lq_response` varchar(55) NOT NULL,
  `lq_responseForYes` varchar(200) NOT NULL DEFAULT 'n/a',
  `lq_responseForNo` varchar(200) NOT NULL DEFAULT 'n/a',
  `lq_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `question_code` varchar(8) NOT NULL,
  `fac_mfl` varchar(11) NOT NULL,
  `ss_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`lq_id`),
  KEY `facilityID` (`fac_mfl`),
  KEY `questionID` (`question_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1