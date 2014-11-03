CREATE TABLE `facility_owners` (
  `fo_id` int(11) NOT NULL AUTO_INCREMENT,
  `fo_name` varchar(200) DEFAULT NULL,
  `fo_for` varchar(200) DEFAULT NULL,
  `fo_created` datetime DEFAULT NULL,
  PRIMARY KEY (`fo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1