CREATE TABLE `hcw_conclusion` (
  `hc_id` int(11) NOT NULL AUTO_INCREMENT,
  `hc_action_taken_supervisor` varchar(45) DEFAULT NULL,
  `hc_action_taken_supervisee` varchar(45) DEFAULT NULL,
  `hc_signature_supervisor` varchar(45) DEFAULT NULL,
  `hc_signature_supervisee` varchar(45) DEFAULT NULL,
  `hc_date_supervisor` varchar(45) DEFAULT NULL,
  `hc_date_supervisee` varchar(45) DEFAULT NULL,
  `hcw_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fac_mfl` int(11) DEFAULT NULL,
  `ss_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`hc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1