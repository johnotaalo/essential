CREATE DEFINER=`root`@`localhost` PROCEDURE `get_reason_statistics`(criteria VARCHAR(45), analytic_value VARCHAR(45), survey_type VARCHAR(45),survey_category VARCHAR(45), questionfor VARCHAR(45))
BEGIN

CASE criteria
WHEN 'national' THEN
SELECT count(lq.lq_reason) AS total_response,
                      lq.question_code as question,
              lq.lq_reason AS frequency, 
                       q.question_name as question_name 
   FROM log_questions lq JOIN questions q ON (lq.question_code=q.question_code AND q.question_for=questionfor) WHERE lq.lq_reason!='' AND lq.lq_reason!= 'n/a' AND lq.lq_response='No' AND lq.fac_mfl IN (SELECT fac_mfl FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type)) 
GROUP BY lq.question_code,lq.lq_reason ORDER BY lq.question_code ASC;


WHEN 'county' THEN
SELECT count(lq.lq_reason) AS total_response,
                      lq.question_code as question,
              lq.lq_reason AS frequency, 
                       q.question_name as question_name 
   FROM log_questions lq JOIN questions q ON (lq.question_code=q.question_code AND q.question_for=questionfor) WHERE lq.lq_reason!='' AND lq.lq_reason!= 'n/a' AND lq.lq_response='No' AND lq.fac_mfl IN (SELECT fac_mfl FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_county = analytic_value) 
GROUP BY lq.question_code,lq.lq_reason ORDER BY lq.question_code ASC;

WHEN 'district' THEN
SELECT count(lq.lq_reason) AS total_response,
                      lq.question_code as question,
              lq.lq_reason AS frequency, 
                       q.question_name as question_name 
   FROM log_questions lq JOIN questions q ON (lq.question_code=q.question_code AND q.question_for=questionfor) WHERE lq.lq_reason!='' AND lq.lq_reason!= 'n/a' AND lq.lq_response='No' AND lq.fac_mfl IN (SELECT fac_mfl FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_district = analytic_value) 
GROUP BY lq.question_code,lq.lq_reason ORDER BY lq.question_code ASC;


WHEN 'facility' THEN
SELECT count(lq.lq_reason) AS total_response,
                      lq.question_code as question,
              lq.lq_reason AS frequency, 
                       q.question_name as question_name 
   FROM log_questions lq JOIN questions q ON (lq.question_code=q.question_code AND q.question_for=questionfor) WHERE lq.lq_reason!='' AND lq.lq_reason!= 'n/a' AND lq.lq_response='No' AND lq.fac_mfl IN (SELECT fac_mfl FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_mfl = analytic_value) 
GROUP BY lq.question_code,lq.lq_reason ORDER BY lq.question_code ASC;

END CASE;

END