CREATE DEFINER=`root`@`localhost` PROCEDURE `get_signal_function`(criteria VARCHAR(45), analytic_value VARCHAR(45), survey_type VARCHAR(45), questionfor VARCHAR(45), signal_statistic VARCHAR(45), signal_function VARCHAR(45))
BEGIN
CASE signal_function
WHEN 'reason' THEN

CASE signal_statistic
WHEN 'ceoc' THEN

CASE criteria
WHEN 'national' THEN

SELECT
     count(*) as lq_response,lq_reason,question_code
FROM
    log_questions
WHERE
    question_code IN (SELECT
            question_code
        FROM
            questions
        WHERE
            question_for = 'ceoc')
        AND fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type))
            GROUP BY lq_reason,question_code
ORDER BY question_code;

WHEN 'county' THEN
SELECT
     count(*) as lq_response,lq_reason,question_code
FROM
    log_questions
WHERE
    question_code IN (SELECT
            question_code
        FROM
            questions
        WHERE
            question_for = 'ceoc')
        AND fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type)
                 WHERE fac_county = analytic_value)
            GROUP BY lq_reason,question_code
ORDER BY question_code;

WHEN 'district' THEN
SELECT
     count(*) as lq_response,lq_reason,question_code
FROM
    log_questions
WHERE
    question_code IN (SELECT
            question_code
        FROM
            questions
        WHERE
            question_for = 'ceoc')
        AND fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type)
                 WHERE fac_district = analytic_value)
            GROUP BY lq_reason,question_code
ORDER BY question_code;

WHEN 'facility' THEN
SELECT
     count(*) as lq_response,lq_reason,question_code
FROM
    log_questions
WHERE
    question_code IN (SELECT
            question_code
        FROM
            questions
        WHERE
            question_for = 'ceoc')
        AND fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type)
                 WHERE fac_mfl = analytic_value)
            GROUP BY lq_reason,question_code
ORDER BY question_code;

END CASE;


WHEN 'bemonc' THEN

CASE criteria
WHEN 'national' THEN

SELECT
    count(*) as response,challenge_code,fac_level as level
FROM
    bemonc_functions join
    facilities f ON bemonc_functions.fac_mfl = f.fac_mfl AND f.fac_level!=''
WHERE
    sf_code IN (SELECT
            sf_code
        FROM
            signal_functions)
        AND f.fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type))
GROUP BY challenge_code,f.fac_level
ORDER BY challenge_code;

WHEN 'county' THEN
SELECT
    count(*) as response,challenge_code,fac_level as level
FROM
    bemonc_functions join
    facilities f ON bemonc_functions.fac_mfl = f.fac_mfl AND f.fac_level!=''
WHERE
    sf_code IN (SELECT
            sf_code
        FROM
            signal_functions)
        AND f.fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type)
                 WHERE fac_county= analytic_value )
GROUP BY challenge_code,f.fac_level
ORDER BY challenge_code;

WHEN 'district' THEN
SELECT
    count(*) as response,challenge_code,fac_level as level
FROM
    bemonc_functions join
    facilities f ON bemonc_functions.fac_mfl = f.fac_mfl AND f.fac_level!=''
WHERE
    sf_code IN (SELECT
            sf_code
        FROM
            signal_functions)
        AND f.fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type)
                 WHERE fac_district= analytic_value )
GROUP BY challenge_code,f.fac_level
ORDER BY challenge_code;

WHEN 'facility' THEN
SELECT
    count(*) as response,challenge_code,fac_level as level
FROM
    bemonc_functions join
    facilities f ON bemonc_functions.fac_mfl = f.fac_mfl AND f.fac_level!=''
WHERE
    sf_code IN (SELECT
            sf_code
        FROM
            signal_functions)
        AND f.fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type)
                 WHERE fac_mfl= analytic_value )
GROUP BY challenge_code,f.fac_level
ORDER BY challenge_code;

END CASE;
END CASE;

WHEN 'question' THEN

CASE signal_statistic
WHEN 'bemonc' THEN

CASE criteria
WHEN 'national' THEN

SELECT
    sf_code,
    sum(if(bem_conducted = 'Yes', 1, 0)) as yes_values,
    sum(if(bem_conducted = 'No', 1, 0)) as no_values
FROM
    bemonc_functions
WHERE
    sf_code IN (SELECT
            sf_code
        FROM
            signal_functions)
        AND fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type))
GROUP BY sf_code
ORDER BY sf_code;

WHEN 'county' THEN

SELECT
    sf_code,
    sum(if(bem_conducted = 'Yes', 1, 0)) as yes_values,
    sum(if(bem_conducted = 'No', 1, 0)) as no_values
FROM
    bemonc_functions
WHERE
    sf_code IN (SELECT
            sf_code
        FROM
            signal_functions)
        AND fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type)
             WHERE fac_county = analytic_value)
GROUP BY sf_code
ORDER BY sf_code;

WHEN 'district' THEN
SELECT
    sf_code,
    sum(if(bem_conducted = 'Yes', 1, 0)) as yes_values,
    sum(if(bem_conducted = 'No', 1, 0)) as no_values
FROM
    bemonc_functions
WHERE
    sf_code IN (SELECT
            sf_code
        FROM
            signal_functions)
        AND fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type)
             WHERE fac_district = analytic_value)
GROUP BY sf_code
ORDER BY sf_code;

WHEN 'facility' THEN
SELECT
    sf_code,
    sum(if(bem_conducted = 'Yes', 1, 0)) as yes_values,
    sum(if(bem_conducted = 'No', 1, 0)) as no_values
FROM
    bemonc_functions
WHERE
    sf_code IN (SELECT
            sf_code
        FROM
            signal_functions)
        AND fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type)
             WHERE fac_mfl = analytic_value)
GROUP BY sf_code
ORDER BY sf_code;

END CASE;
END CASE;
END CASE;


END