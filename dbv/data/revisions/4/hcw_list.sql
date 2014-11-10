ALTER TABLE `hcw_list` CHANGE `mobile_number_` `p_mobile_number_` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL;
ALTER TABLE `hcw_assessment_tracker` CHANGE `ast_id` `ast_id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `log_questions_hcw` CHANGE `lq_id` `lq_id` INT(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `log_indicators_hcw` CHANGE `li_id` `li_id` INT(11) NOT NULL AUTO_INCREMENT;