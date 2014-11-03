CREATE TABLE `community_strategies` (
  `cs_id` int(11) NOT NULL AUTO_INCREMENT,
  `cs_response` int(11) NOT NULL DEFAULT '-1',
  `cs_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `strategy_code` varchar(45) NOT NULL,
  `fac_mfl` varchar(11) NOT NULL,
  `ss_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cs_id`),
  KEY `facilityID` (`fac_mfl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1