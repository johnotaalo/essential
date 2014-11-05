CREATE TABLE `log_questions` (
  `lq_id` int(11) NOT NULL AUTO_INCREMENT,
  `lq_response` varchar(55) DEFAULT NULL,
  `lq_reason` varchar(200) DEFAULT 'n/a',
  `lq_specified_or_follow_up` varchar(255) DEFAULT 'n/a',
  `lq_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `lq_response_count` int(11) DEFAULT '0',
  `question_code` varchar(8) DEFAULT NULL,
  `fac_mfl` varchar(11) DEFAULT NULL,
  `ss_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`lq_id`),
  KEY `facilityID` (`fac_mfl`),
  KEY `questionID` (`question_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1