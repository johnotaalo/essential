CREATE DEFINER=`root`@`localhost` PROCEDURE `get_survey_info`(survey_type VARCHAR(45),survey_category VARCHAR(45),statistic VARCHAR(45),analytic_value VARCHAR(45))
BEGIN

DECLARE section VARCHAR(45) DEFAULT NULL;
CASE survey_category

WHEN 'baseline' THEN

CASE survey_type

WHEN 'mnh' THEN
SET section='section-6';
WHEN 'ch' THEN
SET section='section-6';
WHEN 'hcw' THEN
SET section='section-6';

END CASE;

WHEN 'mid-term' THEN

CASE survey_type

WHEN 'mnh' THEN
SET section='section-8';
WHEN 'ch' THEN
SET section='section-9';
WHEN 'hcw' THEN
SET section='section-5';

END CASE;

WHEN 'end-term' THEN

CASE survey_type

WHEN 'mnh' THEN
SET section='section-8';
WHEN 'ch' THEN
SET section='section-9';
WHEN 'hcw' THEN
SET section='section-5';

END CASE;

END CASE;


CASE statistic
WHEN 'facility' THEN

SELECT 
   f.fac_mfl,
   f.fac_name,
   f.fac_district,
   f.fac_county,
   MAX(ast_section) AS max_section,
   MAX(cast(ast_last_activity as Datetime)) AS last_activity,
(CASE WHEN MAX(ast_section) = section THEN 'complete'
WHEN MAX(ast_section) != section THEN 'pending' END) as status
FROM

   facilities f LEFT JOIN
   assessment_tracker at ON f.fac_mfl=at.facilityCode

       JOIN
   survey_status ss ON ss.fac_id = f.fac_mfl
       AND f.fac_mfl = analytic_value
       AND f.fac_mfl = facilityCode
       JOIN
   survey_categories sc ON (sc.sc_id = ss.sc_id
       AND sc.sc_name = survey_category)
       JOIN
   survey_types st ON (st.st_id = ss.st_id
       AND st.st_name = survey_type
       AND st.st_name = ast_survey)
GROUP BY f.fac_mfl;

WHEN 'district' THEN

SELECT 
   f.fac_mfl,
   f.fac_name,
   f.fac_district,
   f.fac_county,
   MAX(ast_section) AS max_section,
   MAX(cast(ast_last_activity as Datetime)) AS last_activity,
(CASE WHEN MAX(ast_section) >= section THEN 'complete'
WHEN MAX(ast_section) < section THEN 'pending' WHEN MAX(ast_section) IS NULL THEN 'not-started' END) as status
FROM

   facilities f   LEFT OUTER JOIN
   assessment_tracker at ON f.fac_mfl=at.facilityCode
  JOIN
   survey_status ss ON ss.fac_id = f.fac_mfl
       
       AND f.fac_mfl = facilityCode
         JOIN
   survey_categories sc ON (sc.sc_id = ss.sc_id
       AND sc.sc_name = survey_category)
         JOIN
   survey_types st ON (st.st_id = ss.st_id
       AND st.st_name = survey_type
       AND st.st_name = ast_survey)
WHERE f.fac_district = analytic_value
GROUP BY f.fac_mfl;
END CASE;
END