CREATE DEFINER=`root`@`localhost` PROCEDURE `get_challenge_statistics`(criteria VARCHAR (45),analytic_value VARCHAR (45),survey_type VARCHAR (45),survey_category VARCHAR(45))
BEGIN

CASE criteria
WHEN 'national' THEN
SELECT count(lc.ach_code) AS total_response,
lc.ach_code as challenge,
ac.ach_name AS ch_name 

FROM log_challenges lc,access_challenges ac
                    WHERE lc.ach_code=ac.ach_code AND lc.fac_mfl IN (SELECT fac_mfl FROM facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
				JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type))
			GROUP BY lc.ach_code,ac.ach_name ORDER BY lc.ach_code ASC; 

WHEN 'county' THEN
SELECT count(lc.ach_code) AS total_response,
lc.ach_code as challenge,
ac.ach_name AS ch_name 

FROM log_challenges lc,access_challenges ac
                    WHERE lc.ach_code=ac.ach_code AND lc.fac_mfl IN (SELECT fac_mfl FROM facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
				JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_county = analytic_value)
                    GROUP BY lc.ach_code,ac.ach_name ORDER BY lc.ach_code ASC; 
WHEN 'district' THEN
SELECT count(lc.ach_code) AS total_response,
lc.ach_code as challenge,
ac.ach_name AS ch_name 

FROM log_challenges lc,access_challenges ac
                    WHERE lc.ach_code=ac.ach_code AND lc.fac_mfl IN (SELECT fac_mfl FROM facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
				JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_district = analytic_value)
                    GROUP BY lc.ach_code,ac.ach_name ORDER BY lc.ach_code ASC; 
WHEN 'facility' THEN
SELECT count(lc.ach_code) AS total_response,
lc.ach_code as challenge,
ac.ach_name AS ch_name 

FROM log_challenges lc,access_challenges ac
                    WHERE lc.ach_code=ac.ach_code AND lc.fac_mfl IN (SELECT fac_mfl FROM facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
				JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_mfl = analytic_value)
                    GROUP BY lc.ach_code,ac.ach_name ORDER BY lc.ach_code ASC; 
END CASE;


END