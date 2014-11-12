USE `mnh_live`;
DROP procedure IF EXISTS `get_facility_level`;

DELIMITER $$
USE `mnh_live`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_facility_level`(criteria VARCHAR(45), analytic_value VARCHAR(45), survey_type VARCHAR(45), survey_category VARCHAR(45) , statistic VARCHAR(45))
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
WHEN 'response' THEN
CASE criteria
WHEN 'national' THEN
SELECT
    tracker.level_total, tracker.facilityLevel
FROM
    (SELECT
        COUNT(distinct fac_mfl) as level_total,
            fac_tier as facilityLevel,
            fac_county as countyName
    FROM
        facilities f
	JOIN assessment_tracker ast ON ast.facilityCode = f.fac_mfl
        AND ast.ast_section >= section
        AND ast.ast_survey = survey_type
    JOIN survey_status ss ON ss.fac_id = f.fac_mfl
    JOIN survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
    GROUP BY fac_tier
    ORDER BY COUNT(distinct fac_mfl) ASC) AS tracker;

WHEN 'county' THEN
SELECT
    tracker.level_total, tracker.facilityLevel
FROM
    (SELECT
        COUNT(distinct fac_mfl) as level_total,
            fac_tier as facilityLevel,
            fac_county as countyName
    FROM
        facilities f
	JOIN assessment_tracker ast ON ast.facilityCode = f.fac_mfl
        AND ast.ast_section >= section
        AND ast.ast_survey = survey_type
    JOIN survey_status ss ON ss.fac_id = f.fac_mfl
    JOIN survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
    WHERE
        f.fac_county = analytic_value 
    GROUP BY fac_tier
    ORDER BY COUNT(distinct fac_mfl) ASC) AS tracker;

WHEN 'district' THEN
SELECT
    tracker.level_total, tracker.facilityLevel
FROM
    (SELECT
        COUNT(distinct fac_mfl) as level_total,
            fac_tier as facilityLevel,
            fac_county as countyName
    FROM
        facilities f
	JOIN assessment_tracker ast ON ast.facilityCode = f.fac_mfl
        AND ast.ast_section >= section
        AND ast.ast_survey = survey_type
    JOIN survey_status ss ON ss.fac_id = f.fac_mfl
    JOIN survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
    WHERE
        f.fac_district = analytic_value
    GROUP BY fac_tier
    ORDER BY COUNT(distinct fac_mfl) ASC) AS tracker;

WHEN 'facility' THEN
SELECT
    tracker.level_total, tracker.facilityLevel
FROM
    (SELECT
        COUNT(distinct fac_mfl) as level_total,
            fac_tier as facilityLevel,
            fac_county as countyName
    FROM
        facilities f
	JOIN assessment_tracker ast ON ast.facilityCode = f.fac_mfl
        AND ast.ast_section >= section
        AND ast.ast_survey = survey_type
    JOIN survey_status ss ON ss.fac_id = f.fac_mfl
    JOIN survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
    WHERE
        f.fac_mfl = analytic_value and f.fac_tier!=""
    GROUP BY fac_tier
    ORDER BY COUNT(distinct fac_mfl) ASC) AS tracker;
END CASE;

WHEN 'response_raw' THEN
CASE criteria
WHEN 'national' THEN
SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_tier
FROM
    facilities f
	JOIN 
    assessment_tracker ast ON ast.facilityCode = f.fac_mfl
        AND ast.ast_section >= section
        AND ast.ast_survey = survey_type 
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
GROUP BY fac_mfl
ORDER BY fac_county , fac_district , fac_name;

WHEN 'county' THEN
SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_tier
FROM
    facilities f
    JOIN assessment_tracker ast ON ast.facilityCode = f.fac_mfl
        AND ast.ast_section >= section
        AND ast.ast_survey = survey_type
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl AND fac_county = analytc_value
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
GROUP BY fac_mfl
ORDER BY fac_county , fac_district , fac_name;

WHEN 'district' THEN
SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_tier
FROM
    facilities f
    JOIN assessment_tracker ast ON ast.facilityCode = f.fac_mfl
        AND ast.ast_section >= section
        AND ast.ast_survey = survey_type
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl AND fac_district = analytic_value
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
GROUP BY fac_mfl
ORDER BY fac_county , fac_district , fac_name;

WHEN 'facility' THEN
SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_tier
FROM
    facilities f
    JOIN assessment_tracker ast ON ast.facilityCode = f.fac_mfl
        AND ast.ast_section >= section
        AND ast.ast_survey = survey_type
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl AND fac_mfl = analytic_value
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
GROUP BY fac_mfl
ORDER BY fac_county , fac_district , fac_name;

END CASE;
END CASE;
END$$

DELIMITER ;

