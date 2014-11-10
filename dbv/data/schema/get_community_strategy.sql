CREATE DEFINER=`root`@`localhost` PROCEDURE `get_community_strategy`(criteria VARCHAR(45), analytic_value VARCHAR(45),survey_type VARCHAR(45),survey_category VARCHAR(45), questionfor VARCHAR(45))
BEGIN
CASE criteria
WHEN 'national' THEN
SELECT 
    cs.strategy_code AS strategy,
    SUM(cs.cs_response) AS strategy_number,
	q.question_name AS question_name
FROM
    community_strategies cs JOIN facilities f ON f.fac_mfl = cs.fac_mfl
        JOIN
    questions q ON cs.strategy_code = q.question_code
        AND q.question_for = questionfor
        JOIN
    survey_status ss ON ss.fac_id = cs.fac_mfl
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
        AND cs.cs_response != - 1
GROUP BY cs.strategy_code ASC;

WHEN 'county' THEN
SELECT 
    cs.strategy_code AS strategy,
    SUM(cs.cs_response) AS strategy_number,
	q.question_name AS question_name
FROM
    community_strategies cs JOIN facilities f ON f.fac_mfl = cs.fac_mfl
        JOIN
    questions q ON cs.strategy_code = q.question_code
        AND q.question_for = questionfor
        JOIN
    survey_status ss ON ss.fac_id = cs.fac_mfl
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
        AND cs.cs_response != - 1 WHERE f.fac_county = analytic_value
GROUP BY cs.strategy_code ASC;

WHEN 'district' THEN
SELECT 
    cs.strategy_code AS strategy,
    SUM(cs.cs_response) AS strategy_number,
	q.question_name AS question_name
FROM
    community_strategies cs JOIN facilities f ON f.fac_mfl = cs.fac_mfl
        JOIN
    questions q ON cs.strategy_code = q.question_code
        AND q.question_for = questionfor
        JOIN
    survey_status ss ON ss.fac_id = cs.fac_mfl
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
        AND cs.cs_response != - 1 WHERE f.fac_district = analytic_value
GROUP BY cs.strategy_code ASC;

WHEN 'facility' THEN
SELECT 
    cs.strategy_code AS strategy,
    SUM(cs.cs_response) AS strategy_number,
	q.question_name AS question_name
FROM
    community_strategies cs JOIN facilities f ON f.fac_mfl = cs.fac_mfl
        JOIN
    questions q ON cs.strategy_code = q.question_code
        AND q.question_for = questionfor
        JOIN
    survey_status ss ON ss.fac_id = cs.fac_mfl
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
        AND cs.cs_response != - 1 WHERE f.fac_mfl = analytic_value
GROUP BY cs.strategy_code ASC;
END CASE;
END