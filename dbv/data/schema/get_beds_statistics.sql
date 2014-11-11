CREATE DEFINER=`root`@`localhost` PROCEDURE `get_beds_statistics`(criteria VARCHAR(45), analytic_value VARCHAR(45), survey_type VARCHAR(45), survey_category VARCHAR(45),questionfor VARCHAR(45))
BEGIN
CASE criteria 
WHEN 'national' THEN
SELECT 
    sum(lq.lq_response_count) AS total_response,
    lq.question_code,
    q.question_name
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor
		JOIN facilities f ON f.fac_mfl = lq.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
GROUP BY lq.question_code
ORDER BY lq.question_code;

WHEN 'county' THEN
SELECT 
    sum(lq.lq_response_count) AS total_response,
    lq.question_code,
    q.question_name
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor
		JOIN facilities f ON f.fac_mfl = lq.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
	WHERE f.fac_county = analytic_value
GROUP BY lq.question_code
ORDER BY lq.question_code;

WHEN 'district' THEN
SELECT 
    sum(lq.lq_response_count) AS total_response,
    lq.question_code,
    q.question_name
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor
		JOIN facilities f ON f.fac_mfl = lq.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
	WHERE f.fac_district = analytic_value
GROUP BY lq.question_code
ORDER BY lq.question_code;

WHEN 'facicility' THEN
SELECT 
    sum(lq.lq_response_count) AS total_response,
    lq.question_code,
    q.question_name
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor
		JOIN facilities f ON f.fac_mfl = lq.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
	WHERE f.fac_mfl = analytic_value
GROUP BY lq.question_code
ORDER BY lq.question_code;
END CASE;
END