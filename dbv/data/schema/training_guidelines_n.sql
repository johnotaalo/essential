CREATE TABLE `training_guidelines_n` (
  `tg_id` int(11) NOT NULL AUTO_INCREMENT,
  `tg_staff` varchar(45) DEFAULT NULL,
  `tg_total_facility` int(11) DEFAULT NULL,
  `tg_total_duty` int(11) DEFAULT NULL,
  `tg_working` int(11) DEFAULT NULL,
  `tg_before` int(11) DEFAULT NULL,
  `tg_after` int(11) DEFAULT NULL,
  `tg_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `guide_code` varchar(45) DEFAULT NULL,
  `fac_mfl` varchar(45) DEFAULT NULL,
  `ss_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`tg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1