USE `mnh_live`;
DROP procedure IF EXISTS `get_question_statistics`;

DELIMITER $$
USE `mnh_live`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_question_statistics`(criteria VARCHAR(45), analytic_value VARCHAR(45), survey_type VARCHAR(45), survey_category VARCHAR(45), questionfor VARCHAR(45), statistics VARCHAR(45))
BEGIN
CASE statistics
WHEN 'functionality_raw' THEN
CASE criteria
WHEN 'national' THEN

SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_tier,
    q.question_name,
    (CASE (q.question_code = 'QUC28'
        || q.question_code = 'QUC27')
        WHEN lq.lq_response = 'Yes' THEN 'functional'
        ELSE 'nonfunctional'
    END) AS response
FROM
    log_questions lq
        JOIN
    questions q ON (q.question_code = lq.question_code
        AND q.question_for = questionfor)
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON (ss.st_id = st.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
WHERE
    q.question_code = 'QUC27'
        || q.question_code = 'QUC28'
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;

WHEN 'county' THEN

SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_tier,
    q.question_name,
    (CASE (q.question_code = 'QUC28'
        || q.question_code = 'QUC27')
        WHEN lq.lq_response = 'Yes' THEN 'functional'
        ELSE 'nonfunctional'
    END) AS response
FROM
    log_questions lq
        JOIN
    questions q ON (q.question_code = lq.question_code
        AND q.question_for = questionfor)
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl AND fac_county = analytic_value
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON (ss.st_id = st.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
WHERE
    q.question_code = 'QUC27'
        || q.question_code = 'QUC28'
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;

WHEN 'district' THEN

SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_tier,
    q.question_name,
    (CASE (q.question_code = 'QUC28'
        || q.question_code = 'QUC27')
        WHEN lq.lq_response = 'Yes' THEN 'functional'
        ELSE 'nonfunctional'
    END) AS response
FROM
    log_questions lq
        JOIN
    questions q ON (q.question_code = lq.question_code
        AND q.question_for = questionfor)
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl AND fac_district = analytic_value
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON (ss.st_id = st.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
WHERE
    q.question_code = 'QUC27'
        || q.question_code = 'QUC28'
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;

WHEN 'facility' THEN

SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_tier,
    q.question_name,
    (CASE (q.question_code = 'QUC28'
        || q.question_code = 'QUC27')
        WHEN lq.lq_response = 'Yes' THEN 'functional'
        ELSE 'nonfunctional'
    END) AS response
FROM
    log_questions lq
        JOIN
    questions q ON (q.question_code = lq.question_code
        AND q.question_for = questionfor)
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl AND fac_mfl = analytic_value
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON (ss.st_id = st.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
WHERE
    q.question_code = 'QUC27'
        || q.question_code = 'QUC28'
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;

END CASE;

WHEN 'location_raw' THEN
CASE criteria
WHEN 'national' THEN

SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_tier,
    q.question_name,
    lq.lq_response
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON (ss.st_id = st.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
WHERE
    q.question_code = 'QUC02b'
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;

WHEN 'county' THEN

SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_tier,
    q.question_name,
    lq.lq_response
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl AND fac_county = analytic_value
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON (ss.st_id = st.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
WHERE
    q.question_code = 'QUC02b'
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;

WHEN 'district' THEN

SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_tier,
    q.question_name,
    lq.lq_response
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl AND fac_district = analytic_value
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON (ss.st_id = st.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
WHERE
    q.question_code = 'QUC02b'
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;

WHEN 'facility' THEN

SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_tier,
    q.question_name,
    lq.lq_response
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl AND fac_mfl = analytic_value
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON (ss.st_id = st.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
WHERE
    q.question_code = 'QUC02b'
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;

END CASE;
WHEN 'availability_raw' THEN
CASE criteria
WHEN 'national'THEN

SELECT 
	f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_tier,
    q.question_name,
    (CASE
        WHEN lq.lq_response = 'Yes' THEN 'Available'
        WHEN lq.lq_response = 'No' THEN 'Not Available'
        WHEN
            (lq.lq_response = ''
                || lq.lq_response = 'n/a')
        THEN
            'No data'
    END) AS response
FROM
    log_questions lq
        JOIN
    questions q ON (lq.question_code = q.question_code
        AND q.question_for = questionfor)
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON (ss.st_id = st.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
WHERE
    q.question_code = 'QUC01'
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;

WHEN 'county' THEN

SELECT 
	f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_tier,
    q.question_name,
    (CASE
        WHEN lq.lq_response = 'Yes' THEN 'Available'
        WHEN lq.lq_response = 'No' THEN 'Not Available'
        WHEN
            (lq.lq_response = ''
                || lq.lq_response = 'n/a')
        THEN
            'No data'
    END) AS response
FROM
    log_questions lq
        JOIN
    questions q ON (lq.question_code = q.question_code
        AND q.question_for = questionfor)
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl AND fac_county = analytic_value
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON (ss.st_id = st.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
WHERE
    q.question_code = 'QUC01'
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;

WHEN 'district' THEN

SELECT 
	f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_tier,
    q.question_name,
    (CASE
        WHEN lq.lq_response = 'Yes' THEN 'Available'
        WHEN lq.lq_response = 'No' THEN 'Not Available'
        WHEN
            (lq.lq_response = ''
                || lq.lq_response = 'n/a')
        THEN
            'No data'
    END) AS response
FROM
    log_questions lq
        JOIN
    questions q ON (lq.question_code = q.question_code
        AND q.question_for = questionfor)
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl AND fac_district = analytic_value
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON (ss.st_id = st.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
WHERE
    q.question_code = 'QUC01'
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;

WHEN 'facility' THEN

SELECT 
	f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_tier,
    q.question_name,
    (CASE
        WHEN lq.lq_response = 'Yes' THEN 'Available'
        WHEN lq.lq_response = 'No' THEN 'Not Available'
        WHEN
            (lq.lq_response = ''
                || lq.lq_response = 'n/a')
        THEN
            'No data'
    END) AS response
FROM
    log_questions lq
        JOIN
    questions q ON (lq.question_code = q.question_code
        AND q.question_for = questionfor)
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl AND fac_mfl = analytic_value
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON (ss.st_id = st.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
WHERE
    q.question_code = 'QUC01'
GROUP BY f.fac_mfl
ORDER BY f.fac_county,f.fac_district, f.fac_name;
END CASE;

WHEN 'response_raw' THEN

CASE criteria
WHEN 'national'THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    lq_response,
    q.question_name
FROM
    log_questions lq
        JOIN
    questions q ON (lq.question_code = q.question_code
        AND q.question_for = questionfor)
        JOIN
    facilities f ON lq.fac_mfl = f.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY lq.fac_mfl ASC;

WHEN 'county' THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    lq_response,
    q.question_name
FROM
    log_questions lq
        JOIN
    questions q ON (lq.question_code = q.question_code
        AND q.question_for = questionfor)
        JOIN
    facilities f ON lq.fac_mfl = f.fac_mfl AND fac_county=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY lq.fac_mfl ASC;

WHEN 'district' THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    lq_response,
    q.question_name
FROM
    log_questions lq
        JOIN
    questions q ON (lq.question_code = q.question_code
        AND q.question_for = questionfor)
        JOIN
    facilities f ON lq.fac_mfl = f.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl AND fac_district=analytic_value
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY lq.fac_mfl ASC;

WHEN 'facility' THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    lq_response,
    q.question_name
FROM
    log_questions lq
        JOIN
    questions q ON (lq.question_code = q.question_code
        AND q.question_for = questionfor)
        JOIN
    facilities f ON lq.fac_mfl = f.fac_mfl AND fac_mfl=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY lq.fac_mfl ASC;
END CASE;

WHEN 'total_raw' THEN

CASE criteria 
WHEN 'national' THEN
SELECT 
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    lq_response_count,
    q.question_name
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor
        JOIN
    facilities f ON lq.fac_mfl = f.fac_mfl
        JOIN
    survey_status ss ON lq.fac_mfl = ss.fac_id
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
ORDER BY f.fac_county,f.fac_district, f.fac_name;

WHEN 'county' THEN

SELECT 
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    lq_response_count,
    q.question_name
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor
        JOIN
    facilities f ON lq.fac_mfl = f.fac_mfl AND fac_county=analytic_value
        JOIN
    survey_status ss ON lq.fac_mfl = ss.fac_id
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
ORDER BY f.fac_county,f.fac_district, f.fac_name;

WHEN 'district' THEN

SELECT 
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    lq_response_count,
    q.question_name
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor
        JOIN
    facilities f ON lq.fac_mfl = f.fac_mfl AND fac_district = analytic_value
        JOIN
    survey_status ss ON lq.fac_mfl = ss.fac_id
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
ORDER BY f.fac_county,f.fac_district, f.fac_name;

WHEN 'facility' THEN

SELECT 
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    lq_response_count,
    q.question_name
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor
        JOIN
    facilities f ON lq.fac_mfl = f.fac_mfl AND fac_mfl = analytic_value
        JOIN
    survey_status ss ON lq.fac_mfl = ss.fac_id
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
ORDER BY f.fac_county,f.fac_district, f.fac_name;

END CASE;

WHEN 'reason_raw' THEN
CASE criteria

WHEN 'national' THEN
SELECT 
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    lq_reason,
    q.question_name
FROM
    log_questions lq
        JOIN
    facilities f ON lq.fac_mfl = f.fac_mfl
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
WHERE
    lq_reason != '' && lq_reason != 'n/a'
ORDER BY question_name;
WHEN 'county' THEN

SELECT 
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    lq_reason,
    q.question_name
FROM
    log_questions lq
        JOIN
    facilities f ON lq.fac_mfl = f.fac_mfl AND f.fac_county = analytic_value
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
WHERE
    lq_reason != '' && lq_reason != 'n/a'
ORDER BY question_name;

WHEN 'district' THEN

SELECT 
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    lq_reason,
    q.question_name
FROM
    log_questions lq
        JOIN
    facilities f ON lq.fac_mfl = f.fac_mfl
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl AND fac_district = analytic_value
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
WHERE
    lq_reason != '' && lq_reason != 'n/a'
ORDER BY question_name;

WHEN 'facility' THEN

SELECT 
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    lq_reason,
    q.question_name
FROM
    log_questions lq
        JOIN
    facilities f ON lq.fac_mfl = f.fac_mfl
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl AND fac_mfl = analytic_value
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
WHERE
    lq_reason != '' && lq_reason != 'n/a'
ORDER BY question_name;

END CASE;
WHEN 'response' THEN
CASE criteria
WHEN 'national' THEN
SELECT 
     q.question_code,
    count(DISTINCT(f.fac_mfl)) as total_response,
    lq_response as response,
    (CASE WHEN (lq.lq_response = '' || lq.lq_response = 'n/a' 
    || lq.lq_response IS NULL) THEN 'No data' 
            WHEN lq.lq_response = 'Yes' THEN 'Yes' 
            WHEN lq.lq_response = 'No' THEN 'No' END) as response
FROM
    log_questions lq
        JOIN
            questions q ON (lq.question_code = q.question_code
        AND q.question_for = questionfor)
        JOIN
            facilities f  ON f.fac_mfl = lq.fac_mfl JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
GROUP BY lq.question_code, response
ORDER BY lq.question_code,count(DISTINCT f.fac_mfl);

WHEN 'county' THEN
SELECT 
     q.question_code,
    count(DISTINCT(f.fac_mfl)) as total_response,
    lq_response as response,
    (CASE WHEN (lq.lq_response = '' || lq.lq_response = 'n/a'
    || lq.lq_response IS NULL) THEN 'No data' 
            WHEN lq.lq_response = 'Yes' THEN 'Yes' 
            WHEN lq.lq_response = 'No' THEN 'No' END) as response

FROM
    log_questions lq
        JOIN
            questions q ON (lq.question_code = q.question_code
        AND q.question_for = questionfor)
        JOIN
            facilities f  ON f.fac_mfl = lq.fac_mfl JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
    WHERE f.fac_county = analytic_value
GROUP BY lq.question_code, response
ORDER BY lq.question_code,count(DISTINCT f.fac_mfl);

WHEN 'district' THEN
SELECT 
     q.question_code,
    count(DISTINCT(f.fac_mfl)) as total_response,
    lq_response as response,
    (CASE WHEN (lq.lq_response = '' || lq.lq_response = 'n/a'
    || lq.lq_response IS NULL) THEN 'No data' 
            WHEN lq.lq_response = 'Yes' THEN 'Yes' 
            WHEN lq.lq_response = 'No' THEN 'No' END) as response
FROM
    log_questions lq
        JOIN
            questions q ON (lq.question_code = q.question_code
        AND q.question_for = questionfor)
        JOIN
            facilities f  ON f.fac_mfl = lq.fac_mfl JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
    WHERE f.fac_district = analytic_value
GROUP BY lq.question_code, response
ORDER BY lq.question_code,count(DISTINCT f.fac_mfl);

WHEN 'facility' THEN
SELECT 
     q.question_code,
    count(distinct f.fac_mfl) as total_response,
    lq_response as response,
(CASE WHEN (lq.lq_response = '' || lq.lq_response = 'n/a'
|| lq.lq_response IS NULL ) THEN 'No data' 
            WHEN lq.lq_response = 'Yes' THEN 'Yes' 
            WHEN lq.lq_response = 'No' THEN 'No' END) as response
FROM
    log_questions lq
        JOIN
            questions q ON (lq.question_code = q.question_code
        AND q.question_for = questionfor)
        JOIN
            facilities f  ON f.fac_mfl = lq.fac_mfl JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
    WHERE f.fac_mfl = analytic_value
GROUP BY lq.question_code, response
ORDER BY lq.question_code,count(DISTINCT f.fac_mfl);
END CASE;

WHEN 'reason' THEN
CASE criteria
WHEN 'national' THEN
SELECT 
    COUNT(DISTINCT(f.fac_mfl)) AS total_response,lq.lq_reason, lq.question_code AS questions,
(CASE
        WHEN lq.lq_reason Like 'Blood not available%' THEN 'Blood not available' 
        WHEN lq.lq_reason Like 'Supplies and equipment not available%' THEN 'Supplies and equipment not available' 
        WHEN lq.lq_reason Like 'Theatre space not available%' THEN 'Theatre space not available'
        WHEN lq.lq_reason Like 'Human Resource not available%' THEN 'Human Resource not available'
        WHEN (lq.lq_reason = '' || lq.lq_reason = 'N/A') THEN 'No data'
        ELSE 'Other Reasons'
    END) as reason
FROM
    log_questions lq
        JOIN
        facilities f ON f.fac_mfl = lq.fac_mfl
        JOIN
    questions q ON lq.question_code = q.question_code AND q.question_for = questionfor
        JOIN 
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN 
    survey_types st ON st.st_id = ss.st_id AND st.st_name = survey_type
        JOIN 
    survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category 
GROUP BY lq.lq_reason
ORDER BY questions;

WHEN 'county' THEN
SELECT 
    COUNT(DISTINCT(f.fac_mfl)) AS total_response,lq.lq_reason, lq.question_code AS questions,
(CASE
        WHEN lq.lq_reason Like 'Blood not available%' THEN 'Blood not available' 
        WHEN lq.lq_reason Like 'Supplies and equipment not available%' THEN 'Supplies and equipment not available' 
        WHEN lq.lq_reason Like 'Theatre space not available%' THEN 'Theatre space not available'
        WHEN lq.lq_reason Like 'Human Resource not available%' THEN 'Human Resource not available'
        WHEN (lq.lq_reason = '' || lq.lq_reason = 'N/A') THEN 'No data'
        ELSE 'Other Reasons'
    END) as reason
FROM
    log_questions lq
        JOIN 
    facilities f ON f.fac_mfl = lq.fac_mfl 
        JOIN
    questions q ON lq.question_code = q.question_code AND q.question_for = questionfor
        JOIN 
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN 
    survey_types st ON st.st_id = ss.st_id AND st.st_name = survey_type 
        JOIN 
    survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
WHERE
   fac_county = analytic_value
GROUP BY lq.lq_reason
ORDER BY questions;
WHEN 'district' THEN
SELECT 
    COUNT(DISTINCT(f.fac_mfl)) AS total_response,lq.lq_reason, lq.question_code AS questions,
(CASE
        WHEN lq.lq_reason Like 'Blood not available%' THEN 'Blood not available' 
        WHEN lq.lq_reason Like 'Supplies and equipment not available%' THEN 'Supplies and equipment not available' 
        WHEN lq.lq_reason Like 'Theatre space not available%' THEN 'Theatre space not available'
        WHEN lq.lq_reason Like 'Human Resource not available%' THEN 'Human Resource not available'
        WHEN (lq.lq_reason = '' || lq.lq_reason = 'N/A') THEN 'No data'
        ELSE 'Other Reasons'
    END) as reason
FROM
    log_questions lq
        JOIN 
    facilities f ON f.fac_mfl = lq.fac_mfl 
        JOIN
    questions q ON lq.question_code = q.question_code AND q.question_for = questionfor
        JOIN 
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN 
    survey_types st ON st.st_id = ss.st_id AND st.st_name = survey_type AND fac_district = analytic_value
        JOIN 
    survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
WHERE
    fac_district = analytic_value
GROUP BY lq.lq_reason;
WHEN 'facility' THEN
SELECT 
    COUNT(distinct f.fac_mfl) AS total_response,lq.lq_reason AS reason, lq.question_code AS questions
FROM
    log_questions lq
        JOIN 
    facilities f ON f.fac_mfl = lq.fac_mfl 
        JOIN
    questions q ON lq.question_code = q.question_code AND q.question_for = questionfor
        JOIN 
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN 
    survey_types st ON st.st_id = ss.st_id AND st.st_name = survey_type AND fac_mfl = analytic_value
        JOIN 
    survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
WHERE
    f.fac_mfl = analytic_value
GROUP BY lq.lq_reason
ORDER BY questions;
END CASE;

WHEN 'storage' THEN
CASE criteria
WHEN 'national' THEN
SELECT 
    count(distinct f.fac_mfl) AS total_response,
    lq.lq_specified_or_follow_up
FROM
    log_questions lq JOIN questions q ON lq.question_code = q.question_code  AND q.question_for = questionfor
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
        AND lq.question_code = 'qmnh02'
GROUP BY lq.lq_specified_or_follow_up;

WHEN 'county' THEN
SELECT 
    count(distinct f.fac_mfl) AS total_response,
    lq.lq_specified_or_follow_up
FROM
    log_questions lq JOIN questions q ON lq.question_code = q.question_code AND q.question_for = questionfor
        JOIN
    survey_status ss ON lq.fac_mfl = ss.fac_id
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
WHERE
     fac_county = analytic_value AND lq.question_code = 'qmnh02'
GROUP BY lq.lq_specified_or_follow_up;

WHEN 'district' THEN
SELECT 
    count(distinct f.fac_mfl) AS total_response,
    lq.lq_specified_or_follow_up
FROM
    log_questions lq JOIN questions q ON lq.question_code = q.question_code AND q.question_for = questionfor
        JOIN
    survey_status ss ON lq.fac_mfl = ss.fac_id
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
WHERE
     fac_district = analytic_value AND lq.question_code = 'qmnh02'
GROUP BY lq.lq_specified_or_follow_up;

WHEN 'facility' THEN
SELECT 
    count(distinct f.fac_mfl) AS total_response,
    lq.lq_specified_or_follow_up
FROM
    log_questions lq JOIN questions q ON lq.question_code = q.question_code AND q.question_for = questionfor
        JOIN
    survey_status ss ON lq.fac_mfl = ss.fac_id
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
WHERE
     fac_mfl = analytic_value AND lq.question_code = 'qmnh02'
GROUP BY lq.lq_specified_or_follow_up;
END CASE;

WHEN 'total' THEN

CASE criteria
WHEN 'national' THEN
SELECT 
    count(distinct f.fac_mfl) as total,q.question_code
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor
        JOIN
    facilities f ON lq.fac_mfl = f.fac_mfl
        JOIN
    survey_status ss ON lq.fac_mfl = ss.fac_id
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
GROUP BY q.question_code
ORDER BY q.question_code;
WHEN 'county' THEN
SELECT 
    count(distinct f.fac_mfl) as total,q.question_code
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor
        JOIN
    facilities f ON lq.fac_mfl = f.fac_mfl AND fac_county = analytic_value
        JOIN
    survey_status ss ON lq.fac_mfl = ss.fac_id
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
GROUP BY q.question_code
ORDER BY q.question_code;
WHEN 'district' THEN
SELECT 
    count(distinct f.fac_mfl) as total,q.question_code
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor
        JOIN
    facilities f ON lq.fac_mfl = f.fac_mfl AND fac_district = analytic_value
        JOIN
    survey_status ss ON lq.fac_mfl = ss.fac_id
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
GROUP BY q.question_code
ORDER BY q.question_code;
WHEN 'facility' THEN
SELECT 
    count(distinct f.fac_mfl) as total,q.question_code
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor
        JOIN
    facilities f ON lq.fac_mfl = f.fac_mfl AND fac_mfl = analytic_value
        JOIN
    survey_status ss ON lq.fac_mfl = ss.fac_id
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
GROUP BY q.question_code
ORDER BY q.question_code;


END CASE;

WHEN 'healthservice' THEN
CASE criteria
WHEN 'national' THEN
SELECT 
    lq.question_code,
    q.question_name,
    lq.lq_response as response,
    COUNT(distinct f.fac_mfl) as total_response
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor 
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
WHERE q.question_code = 'QUC30'
GROUP BY lq.lq_response, q.question_code ;

WHEN 'county' THEN
SELECT 
    lq.question_code,
    q.question_name,
    lq.lq_response as response,
    COUNT(distinct f.fac_mfl) as total_response
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor 
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
WHERE q.question_code = 'QUC30'
AND f.fac_county = analytic_value
GROUP BY lq.lq_response, q.question_code ;

WHEN 'district' THEN 
SELECT 
    lq.question_code,
    q.question_name,
    lq.lq_response as response,
    COUNT(distinct f.fac_mfl) as total_response
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor 
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
WHERE q.question_code = 'QUC30'
AND f.fac_district = analytic_value
GROUP BY lq.lq_response, q.question_code ;

WHEN 'facility' THEN 
SELECT 
    lq.question_code,
    q.question_name,
    lq.lq_response as response,
    COUNT(distinct f.fac_mfl) as total_response
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor 
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
WHERE q.question_code = 'QUC30'
AND f.fac_mfl = analytic_value
GROUP BY lq.lq_response, q.question_code ;
END CASE;

WHEN 'mainsource' THEN
CASE criteria
WHEN 'national' THEN
SELECT 
    lq.lq_specified_or_follow_up as reason,
    count(lq.lq_specified_or_follow_up) as total_response,
    lq.question_code,
    (case
        when lq.lq_specified_or_follow_up like 'blood bank available%' THEN 'blood bank available'
        when lq.lq_specified_or_follow_up like 'transfusion done%' THEN 'transfusion done'
        when lq.lq_specified_or_follow_up = 'n/a' THEN 'Not Applicable'
    end) as reason
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor
        JOIN facilities f ON f.fac_mfl = lq.fac_mfl
        JOIN survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN survey_categories sc ON ss.sc_id = ss.sc_id AND sc.sc_name = survey_category
        JOIN survey_types st ON ss.st_id = ss.st_id AND st.st_name = survey_type
WHERE
    lq.lq_specified_or_follow_up != ''
group by lq.lq_specified_or_follow_up;

WHEN 'county' THEN
SELECT 
    lq.lq_specified_or_follow_up as reason,
    count(lq.lq_specified_or_follow_up) as total_response,
    lq.question_code,
    (case
        when lq.lq_specified_or_follow_up like 'blood bank available%' THEN 'blood bank available'
        when lq.lq_specified_or_follow_up like 'transfusion done%' THEN 'transfusion done'
        when lq.lq_specified_or_follow_up = 'n/a' THEN 'Not Applicable'
    end) as reason
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor
        JOIN facilities f ON f.fac_mfl = lq.fac_mfl
        JOIN survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN survey_categories sc ON ss.sc_id = ss.sc_id AND sc.sc_name = survey_category
        JOIN survey_types st ON ss.st_id = ss.st_id AND st.st_name = survey_type
WHERE
    lq.lq_specified_or_follow_up != ''
AND f.fac_county = analytic_value
group by lq.lq_specified_or_follow_up;

WHEN 'district' THEN
SELECT 
    lq.lq_specified_or_follow_up as reason,
    count(lq.lq_specified_or_follow_up)as total_response,
    lq.question_code,
    (case
        when lq.lq_specified_or_follow_up like 'blood bank available%' THEN 'blood bank available'
        when lq.lq_specified_or_follow_up like 'transfusion done%' THEN 'transfusion done'
        when lq.lq_specified_or_follow_up = 'n/a' THEN 'Not Applicable'
    end) as reason
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor
        JOIN facilities f ON f.fac_mfl = lq.fac_mfl
        JOIN survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN survey_categories sc ON ss.sc_id = ss.sc_id AND sc.sc_name = survey_category
        JOIN survey_types st ON ss.st_id = ss.st_id AND st.st_name = survey_type
WHERE
    lq.lq_specified_or_follow_up != ''
AND f.fac_district = analytic_value
group by lq.lq_specified_or_follow_up;

WHEN 'facility' THEN
SELECT 
    lq.lq_specified_or_follow_up as reason,
    count(lq.lq_specified_or_follow_up)as total_response,
    lq.question_code,
    (case
        when lq.lq_specified_or_follow_up like 'blood bank available%' THEN 'blood bank available'
        when lq.lq_specified_or_follow_up like 'transfusion done%' THEN 'transfusion done'
        when lq.lq_specified_or_follow_up = 'n/a' THEN 'Not Applicable'
    end) as reason
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor
        JOIN facilities f ON f.fac_mfl = lq.fac_mfl
        JOIN survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN survey_categories sc ON ss.sc_id = ss.sc_id AND sc.sc_name = survey_category
        JOIN survey_types st ON ss.st_id = ss.st_id AND st.st_name = survey_type
WHERE
    lq.lq_specified_or_follow_up != ''
AND f.fac_mfl = analytic_value
group by lq.lq_specified_or_follow_up;
END CASE;

WHEN 'availability' THEN 
CASE criteria
WHEN 'national' THEN 
SELECT 
    lq.lq_response,
    COUNT(DISTINCT(f.fac_mfl)) AS total_response,
    lq.question_code,
    f.fac_tier,
    (CASE WHEN lq.lq_response = 'Yes' THEN 'Available'
          WHEN lq.lq_response = 'No' THEN 'Not Available'
            WHEN (lq.lq_response = '' || lq.lq_response = 'n/a') THEN 'No data'
            END) as response
FROM
    log_questions lq
        JOIN
    questions q ON (lq.question_code = q.question_code
        AND q.question_for = questionfor)
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON (ss.st_id = st.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
    WHERE q.question_code = 'QUC01'
GROUP BY lq.lq_response, q.question_code,f.fac_tier
ORDER BY count(DISTINCT f.fac_mfl);

WHEN 'county' THEN 
SELECT 
    lq.lq_response,
    COUNT(DISTINCT(f.fac_mfl)) AS total_response,
    lq.question_code,
    f.fac_tier,
    (CASE WHEN lq.lq_response = 'Yes' THEN 'Available'
          WHEN lq.lq_response = 'No' THEN 'Not Available'
            WHEN (lq.lq_response = '' || lq.lq_response = 'n/a') THEN 'No data'
            END) as response
FROM
    log_questions lq
        JOIN
    questions q ON (lq.question_code = q.question_code
        AND q.question_for = questionfor)
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON (ss.st_id = st.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
    WHERE f.fac_county = analytic_value
AND  q.question_code = 'QUC01'
GROUP BY lq.lq_response, q.question_code,f.fac_tier
ORDER BY count(DISTINCT f.fac_mfl);

WHEN 'district' THEN 
SELECT 
    lq.lq_response,
    COUNT(DISTINCT(f.fac_mfl)) AS total_response,
    lq.question_code,
    f.fac_tier,
    (CASE WHEN lq.lq_response = 'Yes' THEN 'Available'
          WHEN lq.lq_response = 'No' THEN 'Not Available'
            WHEN (lq.lq_response = '' || lq.lq_response = 'n/a') THEN 'No data'
            END) as response
FROM
    log_questions lq
        JOIN
    questions q ON (lq.question_code = q.question_code
        AND q.question_for = questionfor)
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON (ss.st_id = st.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
    WHERE f.fac_district = analytic_value
AND  q.question_code = 'QUC01'
GROUP BY lq.lq_response, q.question_code,f.fac_tier
ORDER BY count(DISTINCT f.fac_mfl);

WHEN 'facility' THEN 
SELECT 
    lq.lq_response,
    COUNT(DISTINCT(f.fac_mfl)) AS total_response,
    lq.question_code,
    f.fac_tier,
    (CASE WHEN lq.lq_response = 'Yes' THEN 'Available'
          WHEN lq.lq_response = 'No' THEN 'Not Available'
            WHEN (lq.lq_response = '' || lq.lq_response = 'n/a') THEN 'No data'
            END) as response
FROM
    log_questions lq
        JOIN
    questions q ON (lq.question_code = q.question_code
        AND q.question_for = questionfor)
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON (ss.st_id = st.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
    WHERE f.fac_mfl = analytic_value
AND  q.question_code = 'QUC01'
GROUP BY lq.lq_response, q.question_code,f.fac_tier
ORDER BY count(DISTINCT f.fac_mfl);
END CASE;

WHEN 'location' THEN
CASE criteria
WHEN 'national' THEN
SELECT 
    COUNT(DISTINCT(f.fac_mfl)) AS total_response,
    lq.question_code,
    lq.lq_response,
    f.fac_tier,
    (CASE
        WHEN lq.lq_response LIKE 'MCH%' THEN 'MCH'
        WHEN lq.lq_response LIKE 'U5 Clinic%' THEN 'U5 Clinic'
        WHEN lq.lq_response LIKE 'OPD%' THEN 'OPD'
        WHEN lq.lq_response LIKE 'WARD%' THEN 'WARD'
        ELSE 'Other'
    END) AS response
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON (ss.st_id = st.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
WHERE
    q.question_code = 'QUC02b'
GROUP BY lq.lq_response , f.fac_tier
ORDER BY count(f.fac_mfl);

WHEN 'county' THEN
SELECT 
    COUNT(DISTINCT(f.fac_mfl)) AS total_response,
    lq.question_code,
    lq.lq_response,
    f.fac_tier,
    (CASE
        WHEN lq.lq_response LIKE 'MCH%' THEN 'MCH'
        WHEN lq.lq_response LIKE 'U5 Clinic%' THEN 'U5 Clinic'
        WHEN lq.lq_response LIKE 'OPD%' THEN 'OPD'
        WHEN lq.lq_response LIKE 'WARD%' THEN 'WARD'
        ELSE 'Other'
    END) AS response
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON (ss.st_id = st.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
WHERE
    f.fac_county = analytic_value
 AND   q.question_code = 'QUC02b'
GROUP BY lq.lq_response , f.fac_tier
ORDER BY count(f.fac_mfl);

WHEN 'district' THEN
SELECT 
    COUNT(DISTINCT(f.fac_mfl)) AS total_response,
    lq.question_code,
    lq.lq_response,
    f.fac_tier
    (CASE
        WHEN lq.lq_response LIKE 'MCH%' THEN 'MCH'
        WHEN lq.lq_response LIKE 'U5 Clinic%' THEN 'U5 Clinic'
        WHEN lq.lq_response LIKE 'OPD%' THEN 'OPD'
        WHEN lq.lq_response LIKE 'WARD%' THEN 'WARD'
        ELSE 'Other'
    END) AS response
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON (ss.st_id = st.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
WHERE
    f.fac_district = analytic_value
 AND   q.question_code = 'QUC02b'
GROUP BY lq.lq_response , f.fac_tier
ORDER BY count(f.fac_mfl);

WHEN 'facility' THEN
SELECT 
    COUNT(DISTINCT(f.fac_mfl)) AS total_response,
    lq.question_code,
    lq.lq_response,
    f.fac_tier,
    (CASE
        WHEN lq.lq_response LIKE 'MCH%' THEN 'MCH'
        WHEN lq.lq_response LIKE 'U5 Clinic%' THEN 'U5 Clinic'
        WHEN lq.lq_response LIKE 'OPD%' THEN 'OPD'
        WHEN lq.lq_response LIKE 'WARD%' THEN 'WARD'
        ELSE 'Other'
    END) AS response
FROM
    log_questions lq
        JOIN
    questions q ON lq.question_code = q.question_code
        AND q.question_for = questionfor
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON (ss.st_id = st.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
WHERE
    f.fac_mfl = analytic_value
 AND   q.question_code = 'QUC02b'
GROUP BY lq.lq_response , f.fac_tier
ORDER BY count(f.fac_mfl);
END CASE;

WHEN 'functionality' THEN 
CASE criteria
WHEN 'national' THEN
SELECT 
    COUNT(DISTINCT(f.fac_mfl)) AS total_response,
    lq.lq_response,
    q.question_code,
    f.fac_tier,
    (CASE (q.question_code = 'QUC28'
        || q.question_code = 'QUC27')
        WHEN lq.lq_response = 'Yes' THEN 'functional'
        ELSE 'nonfunctional'
    END) AS response
FROM
    log_questions lq
        JOIN
    questions q ON (q.question_code = lq.question_code
        AND q.question_for = questionfor)
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON (ss.st_id = st.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
WHERE
    q.question_code = 'QUC27'
        || q.question_code = 'QUC28'
GROUP BY lq.lq_response , q.question_code , f.fac_tier;

WHEN 'county' THEN
SELECT 
    COUNT(DISTINCT(f.fac_mfl)) AS total_response,
    lq.lq_response,
    q.question_code,
    f.fac_tier,
    (CASE (q.question_code = 'QUC28'
        || q.question_code = 'QUC27')
        WHEN lq.lq_response = 'Yes' THEN 'functional'
        ELSE 'nonfunctional'
    END) AS response
FROM
    log_questions lq
        JOIN
    questions q ON (q.question_code = lq.question_code
        AND q.question_for = questionfor)
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON (ss.st_id = st.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
WHERE
    q.question_code = 'QUC27'
        || q.question_code = 'QUC28'
AND f.fac_county = analytic_value
GROUP BY lq.lq_response , q.question_code , f.fac_tier;

WHEN 'district' THEN
SELECT 
    COUNT(DISTINCT(f.fac_mfl)) AS total_response,
    lq.lq_response,
    q.question_code,
    f.fac_tier,
    (CASE (q.question_code = 'QUC28'
        || q.question_code = 'QUC27')
        WHEN lq.lq_response = 'Yes' THEN 'functional'
        ELSE 'nonfunctional'
    END) AS response
FROM
    log_questions lq
        JOIN
    questions q ON (q.question_code = lq.question_code
        AND q.question_for = questionfor)
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON (ss.st_id = st.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_catergory)
WHERE
    q.question_code = 'QUC27'
        || q.question_code = 'QUC28'
        AND f.fac_district = analytic_value
GROUP BY lq.lq_response , q.question_code , f.fac_tier;

WHEN 'facililty' THEN 
SELECT 
    COUNT(DISTINCT(f.fac_mfl)) AS total_response,
    lq.lq_response,
    q.question_code,
    f.fac_tier,
    (CASE (q.question_code = 'QUC28'
        || q.question_code = 'QUC27')
        WHEN lq.lq_response = 'Yes' THEN 'functional'
        ELSE 'nonfunctional'
    END) AS response
FROM
    log_questions lq
        JOIN
    questions q ON (q.question_code = lq.question_code
        AND q.question_for = questionfor)
        JOIN
    facilities f ON f.fac_mfl = lq.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = lq.fac_mfl
        JOIN
    survey_types st ON (ss.st_id = st.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
WHERE
    q.question_code = 'QUC27'
        || q.question_code = 'QUC28'
        AND f.fac_mfl = analytic_value
GROUP BY lq.lq_response , q.question_code , f.fac_tier;

END CASE;
END CASE;


END$$

DELIMITER ;

