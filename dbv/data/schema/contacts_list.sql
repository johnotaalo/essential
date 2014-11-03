CREATE TABLE `contacts_list` (
  `cl_id` int(11) NOT NULL AUTO_INCREMENT,
  `cl_name` varchar(45) DEFAULT NULL,
  `cl_phone_number` int(10) DEFAULT NULL,
  `cl_email_address` varchar(45) DEFAULT NULL,
  `cl_country` varchar(45) NOT NULL,
  PRIMARY KEY (`cl_id`),
  UNIQUE KEY `cl_phone_number_UNIQUE` (`cl_phone_number`),
  UNIQUE KEY `cl_email_address` (`cl_email_address`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1