CREATE DEFINER=`root`@`localhost` PROCEDURE `get_cs_statistics`(criteria VARCHAR(45), analytic_value VARCHAR(45),survey_type VARCHAR(45), survey_category VARCHAR(45))
BEGIN
CASE criteria
WHEN 'national' THEN
SELECT 
    COUNT(lq.lq_response) AS total_response, q.question_name AS question_name
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
		JOIN facilities f ON f.fac_mfl = lq.fac_mfl
JOIN survey_status ss ON ss.fac_id = lq.fac_mfl
JOIN survey_types st ON st.st_id = ss.st_id AND st.st_name = survey_type
JOIN survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
WHERE
    q.question_for = questionfor
        AND lq.lq_response = 'No'
GROUP BY lq.lq_response,q.question_name;

WHEN 'county' THEN
SELECT 
    COUNT(lq.lq_response) AS total_response, q.question_name AS question_name
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
		JOIN facilities f ON f.fac_mfl = lq.fac_mfl
JOIN survey_status ss ON ss.fac_id = lq.fac_mfl
JOIN survey_types st ON st.st_id = ss.st_id AND st.st_name = survey_type
JOIN survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
WHERE
    q.question_for = questionfor
        AND lq.lq_response = 'No' AND f.fac_county = analytic_value
GROUP BY lq.lq_response,q.question_name;
WHEN 'district' THEN
SELECT 
    COUNT(lq.lq_response) AS total_response, q.question_name AS question_name
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
		JOIN facilities f ON f.fac_mfl = lq.fac_mfl
JOIN survey_status ss ON ss.fac_id = lq.fac_mfl
JOIN survey_types st ON st.st_id = ss.st_id AND st.st_name = survey_type
JOIN survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
WHERE
    q.question_for = questionfor
        AND lq.lq_response = 'No' AND f.fac_district = analytic_value
GROUP BY lq.lq_response,q.question_name;
WHEN 'facility' THEN
SELECT 
    COUNT(lq.lq_response) AS total_response, q.question_name AS question_name
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
		JOIN facilities f ON f.fac_mfl = lq.fac_mfl
JOIN survey_status ss ON ss.fac_id = lq.fac_mfl
JOIN survey_types st ON st.st_id = ss.st_id AND st.st_name = survey_type
JOIN survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
WHERE
    q.question_for = questionfor
        AND lq.lq_response = 'No' AND f.fac_mfl = analytic_value
GROUP BY lq.lq_response,q.question_name;

END CASE;
END