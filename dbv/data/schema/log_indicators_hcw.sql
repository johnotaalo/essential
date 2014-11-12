CREATE TABLE `log_indicators_hcw` (
  `li_id` int(11) NOT NULL,
  `li_response` varchar(6) DEFAULT NULL,
  `li_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `indicator_code` varchar(8) DEFAULT NULL,
  `fac_mfl` varchar(11) NOT NULL,
  `hcw_id` int(11) DEFAULT NULL,
  `li_hcwResponse` varchar(45) DEFAULT NULL,
  `li_assessorResponse` varchar(45) DEFAULT NULL,
  `li_hcwFindings` varchar(45) DEFAULT NULL,
  `li_assessorFindings` varchar(45) DEFAULT NULL,
  `li_treatments` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1