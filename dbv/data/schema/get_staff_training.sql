CREATE DEFINER=`root`@`localhost` PROCEDURE `get_staff_training`(criteria VARCHAR(45),analytic_value VARCHAR(45), survey_type VARCHAR(45), survey_category VARCHAR(45), guidefor VARCHAR(45))
BEGIN
CASE criteria
WHEN 'national' THEN
SELECT 
       sum(gtn.tg_total_facility) AS total_in_facility,
	   sum(gtn.tg_total_duty) AS total_on_duty,
              gtn.tg_staff AS cadre
   FROM training_guidelines_n gtn JOIN guidelines g ON (gtn.guide_code=g.guide_code AND g.guide_for=guidefor) 
WHERE gtn.tg_total_facility !=-1 AND gtn.tg_total_duty !=-1 
AND gtn.fac_mfl IN (SELECT fac_mfl FROM

            facilities f
			
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON (sc.sc_id = ss.sc_id  AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id AND st.st_name = survey_type)) 
				
GROUP BY gtn.tg_staff ORDER BY gtn.tg_staff ASC;
WHEN 'county' THEN
SELECT 
       sum(gtn.tg_total_facility) AS total_in_facility,
	   sum(gtn.tg_total_duty) AS total_on_duty,
              gtn.tg_staff AS cadre 
   FROM training_guidelines_n gtn JOIN guidelines g ON (gtn.guide_code=g.guide_code AND g.guide_for=guidefor) 
WHERE gtn.tg_total_facility !=-1 AND gtn.tg_total_duty !=-1 
AND gtn.fac_mfl IN (SELECT fac_mfl FROM

            facilities f
			
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON (sc.sc_id = ss.sc_id  AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id AND st.st_name = survey_type) AND fac_county = analytic_value) 
				
GROUP BY gtn.tg_staff ORDER BY gtn.tg_staff ASC;
WHEN 'district' THEN
SELECT 
       sum(gtn.tg_total_facility) AS total_in_facility,
	   sum(gtn.tg_total_duty) AS total_on_duty,
              gtn.tg_staff AS cadre
   FROM training_guidelines_n gtn JOIN guidelines g ON (gtn.guide_code=g.guide_code AND g.guide_for=guidefor) 
WHERE gtn.tg_total_facility !=-1 AND gtn.tg_total_duty !=-1 
AND gtn.fac_mfl IN (SELECT fac_mfl FROM

            facilities f
			
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON (sc.sc_id = ss.sc_id  AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id AND st.st_name = survey_type) AND fac_district = analytic_value) 
				
GROUP BY gtn.tg_staff ORDER BY gtn.tg_staff ASC;
WHEN 'facility' THEN
SELECT 
       sum(gtn.tg_total_facility) AS total_in_facility,
	   sum(gtn.tg_total_duty) AS total_on_duty,
              gtn.tg_staff AS cadre
   FROM training_guidelines_n gtn JOIN guidelines g ON (gtn.guide_code=g.guide_code AND g.guide_for=guidefor) 
WHERE gtn.tg_total_facility !=-1 AND gtn.tg_total_duty !=-1 
AND gtn.fac_mfl IN (SELECT fac_mfl FROM

            facilities f
			
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON (sc.sc_id = ss.sc_id  AND sc.sc_name = survey_category)	
                JOIN
            survey_types st ON (st.st_id = ss.st_id AND st.st_name = survey_type) AND fac_mfl = analytic_value) 
				
GROUP BY gtn.tg_staff ORDER BY gtn.tg_staff ASC;
END CASE;
END