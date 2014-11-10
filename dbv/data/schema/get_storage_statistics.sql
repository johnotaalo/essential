CREATE DEFINER=`root`@`localhost` PROCEDURE `get_storage_statistics`(criteria VARCHAR(45), analytic_value VARCHAR(45), survey_type VARCHAR(45), survey_category VARCHAR(45),questionfor VARCHAR(45))
BEGIN
CASE criteria
WHEN 'national' THEN
SELECT 
    count(lq.lq_specified_or_follow_up) AS total_response,
    lq.lq_specified_or_follow_up
FROM
    log_questions lq JOIN questions q ON lq.question_code = q.question_code  AND q.question_for = questionfor
	JOIN facilities f ON f.fac_mfl = lq.fac_mfl
	JOIN
    survey_status ss ON lq.fac_mfl = ss.fac_id
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
WHERE
    lq.lq_specified_or_follow_up != ''
        && lq.lq_specified_or_follow_up != 'n/a'
        AND lq.question_code = 'QMNH01'
GROUP BY lq.lq_specified_or_follow_up;

WHEN 'county' THEN
SELECT 
    count(lq.lq_specified_or_follow_up) AS total_response,
    lq.lq_specified_or_follow_up
FROM
    log_questions lq JOIN questions q ON lq.question_code = q.question_code AND q.question_for = questionfor
        JOIN facilities f ON f.fac_mfl = lq.fac_mfl
JOIN
    survey_status ss ON lq.fac_mfl = ss.fac_id
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
WHERE
    lq.lq_specified_or_follow_up != ''
        && lq.lq_specified_or_follow_up != 'n/a'
        AND lq.question_code = 'QMNH01' AND fac_county = analytic_value
GROUP BY lq.lq_specified_or_follow_up;

WHEN 'district' THEN
SELECT 
    count(lq.lq_specified_or_follow_up) AS total_response,
    lq.lq_specified_or_follow_up
FROM
    log_questions lq JOIN questions q ON lq.question_code = q.question_code AND q.question_for = questionfor
     JOIN facilities f ON f.fac_mfl = lq.fac_mfl  
 JOIN
    survey_status ss ON lq.fac_mfl = ss.fac_id
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
WHERE
    lq.lq_specified_or_follow_up != ''
        && lq.lq_specified_or_follow_up != 'n/a'
        AND lq.question_code = 'QMNH01' AND fac_district = analytic_value
GROUP BY lq.lq_specified_or_follow_up;

WHEN 'facility' THEN
SELECT 
    count(lq.lq_specified_or_follow_up) AS total_response,
    lq.lq_specified_or_follow_up
FROM
    log_questions lq JOIN questions q ON lq.question_code = q.question_code AND q.question_for = questionfor
       JOIN facilities f ON f.fac_mfl = lq.fac_mfl 
	JOIN
    survey_status ss ON lq.fac_mfl = ss.fac_id
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
WHERE
    lq.lq_specified_or_follow_up != ''
        && lq.lq_specified_or_follow_up != 'n/a'
        AND lq.question_code = 'QMNH01' AND fac_mfl = analytic_value
GROUP BY lq.lq_specified_or_follow_up;
END CASE;
END