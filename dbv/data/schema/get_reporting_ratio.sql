CREATE DEFINER=`root`@`localhost` PROCEDURE `get_reporting_ratio`(IN survey_type VARCHAR(45),IN survey_category VARCHAR(45), IN analytic_value VARCHAR(45), IN statistic VARCHAR(45))
    DETERMINISTIC
    COMMENT 'Gets County Reporting Ratio'
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
WHEN 'national' THEN
SELECT
    tracker.reported,
    tracker_2.pending,
    facilityData.actual,
    round((tracker.reported / facilityData.actual) * 100,
            0) as percentage,
    actual - (reported + pending) as notstarted
FROM
    (SELECT
        COUNT(distinct fac_mfl) as reported
    FROM
        facilities f
    JOIN survey_status ss ON ss.fac_id = f.fac_mfl
    JOIN survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
    JOIN assessment_tracker ast ON ast.facilityCode = f.fac_mfl
        AND ast.ast_section >= section
        AND ast.ast_survey = survey_type
    JOIN survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)) as tracker,
    (SELECT
        SUM(CASE
                when pending = 'pending' then 1
                else 0
            end) as pending
    FROM
        (SELECT
            IF(MAX(ast.ast_section) < section, 'pending', 'complete') as pending
        FROM
            facilities f
        JOIN survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN survey_types st ON (st.st_id = ss.st_id
            AND st.st_name = survey_type)
        JOIN assessment_tracker ast ON ast.facilityCode = f.fac_mfl
            AND ast.ast_survey = survey_type
        JOIN survey_categories sc ON (ss.sc_id = sc.sc_id
            AND sc.sc_name = survey_category)
        group by ast.facilityCode)as t1) as tracker_2,
        (SELECT
            COUNT(DISTINCT fac_mfl) as actual
        FROM
            facilities f
        WHERE
                fac_type != 'Dental Clinic'
                AND fac_type != 'VCT Centre (Stand-Alone)'
                AND fac_type != 'Training Institution in Health (Stand-alone)'
                AND fac_type != 'Funeral Home (Stand-alone)'
                AND fac_type != 'Laboratory (Stand-alone)'
                AND fac_type != 'Health Project'
                AND fac_type != 'Eye Clinic'
                AND fac_type != 'Eye Centre'
                AND fac_type != 'Radiology Unit') as facilityData;
WHEN 'county' THEN

SELECT
    tracker.reported,
    tracker_2.pending,
    facilityData.actual,
    round((tracker.reported / facilityData.actual) * 100,
            0) as percentage,
    actual - (reported + pending) as notstarted
FROM
    (SELECT
        COUNT(distinct fac_mfl) as reported
    FROM
        facilities f
    JOIN survey_status ss ON ss.fac_id = f.fac_mfl
    JOIN survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
    JOIN assessment_tracker ast ON ast.facilityCode = f.fac_mfl
        AND ast.ast_section >= section
        AND ast.ast_survey = survey_type
    JOIN survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
    WHERE
        f.fac_county = analytic_value) as tracker,
    (SELECT
        SUM(CASE
                when pending = 'pending' then 1
                else 0
            end) as pending
    FROM
        (SELECT
            IF(MAX(ast.ast_section) < section, 'pending', 'complete') as pending
        FROM
            facilities f
        JOIN survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN survey_types st ON (st.st_id = ss.st_id
            AND st.st_name = survey_type)
        JOIN assessment_tracker ast ON ast.facilityCode = f.fac_mfl
            AND ast.ast_survey = survey_type
        JOIN survey_categories sc ON (ss.sc_id = sc.sc_id
            AND sc.sc_name = survey_category)
        WHERE
            f.fac_county = analytic_value
        group by ast.facilityCode)as t1) as tracker_2,
        (SELECT
            COUNT(DISTINCT fac_mfl) as actual
        FROM
            facilities f
        WHERE
            f.fac_county = analytic_value
                AND fac_type != 'Dental Clinic'
                AND fac_type != 'VCT Centre (Stand-Alone)'
                AND fac_type != 'Training Institution in Health (Stand-alone)'
                AND fac_type != 'Funeral Home (Stand-alone)'
                AND fac_type != 'Laboratory (Stand-alone)'
                AND fac_type != 'Health Project'
                AND fac_type != 'Eye Clinic'
                AND fac_type != 'Eye Centre'
                AND fac_type != 'Radiology Unit') as facilityData;

WHEN 'district' THEN
SELECT
    tracker.reported,
    tracker_2.pending,
    facilityData.actual,
    round((tracker.reported / facilityData.actual) * 100,
            0) as percentage,
    actual - (reported + pending) as notstarted
FROM
    (SELECT
        COUNT(distinct fac_mfl) as reported
    FROM
        facilities f
    JOIN survey_status ss ON ss.fac_id = f.fac_mfl
    JOIN survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
    JOIN assessment_tracker ast ON ast.facilityCode = f.fac_mfl
        AND ast.ast_section >= section
        AND ast.ast_survey = survey_type
    JOIN survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
    WHERE
        f.fac_district = analytic_value) as tracker,
    (SELECT
        SUM(CASE
                when pending = 'pending' then 1
                else 0
            end) as pending
    FROM
        (SELECT
            IF(MAX(ast.ast_section) < section, 'pending', 'complete') as pending
        FROM
            facilities f
        JOIN survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN survey_types st ON (st.st_id = ss.st_id
            AND st.st_name = survey_type)
        JOIN assessment_tracker ast ON ast.facilityCode = f.fac_mfl
            AND ast.ast_survey = survey_type
        JOIN survey_categories sc ON (ss.sc_id = sc.sc_id
            AND sc.sc_name = survey_category)
        WHERE
            f.fac_district = analytic_value
        group by ast.facilityCode)as t1) as tracker_2,
        (SELECT
            COUNT(fac_mfl) as actual
        FROM
            facilities f
        WHERE
            f.fac_district = analytic_value
                AND fac_type != 'Dental Clinic'
                AND fac_type != 'VCT Centre (Stand-Alone)'
                AND fac_type != 'Training Institution in Health (Stand-alone)'
                AND fac_type != 'Funeral Home (Stand-alone)'
                AND fac_type != 'Laboratory (Stand-alone)'
                AND fac_type != 'Health Project'
                AND fac_type != 'Eye Clinic'
                AND fac_type != 'Eye Centre'
                AND fac_type != 'Radiology Unit') as facilityData;


END CASE;
END