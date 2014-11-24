USE `mnh_live`;
DROP procedure IF EXISTS `get_facility_list`;

DELIMITER $$
USE `mnh_live`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_facility_list`(statistic VARCHAR(45),analytic_value VARCHAR(45))
BEGIN

CASE statistic

WHEN 'national' THEN

SELECT 
   f.fac_mfl,
   f.fac_name,
   f.fac_district,
   f.fac_county
FROM
   facilities f 
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district,f.fac_name;

WHEN 'county' THEN

SELECT 
   f.fac_mfl,
   f.fac_name,
   f.fac_district,
   f.fac_county
FROM
   facilities f 
   WHERE f.fac_county = analytic_value
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district,f.fac_name;

WHEN 'district' THEN

SELECT 
   f.fac_mfl,
   f.fac_name,
   f.fac_district,
   f.fac_county
FROM
   facilities f 
   WHERE f.fac_district = analytic_value
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district,f.fac_name;

WHEN 'facility' THEN

SELECT 
   f.fac_mfl,
   f.fac_name,
   f.fac_district,
   f.fac_county
FROM
   facilities f 
   WHERE f.fac_mfl = analytic_value
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district,f.fac_name;

END CASE;

END
$$

DELIMITER ;

