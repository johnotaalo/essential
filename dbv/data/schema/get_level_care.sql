CREATE DEFINER=`root`@`localhost` PROCEDURE `get_level_care`(criteria VARCHAR (45),analytic_value VARCHAR (45),survey_type VARCHAR (45),survey_cat VARCHAR(45))
BEGIN

CASE criteria
WHEN 'national' THEN
SELECT
    tracker.level_total, tracker.facilityLevel
FROM
    (SELECT
        COUNT(fac_level) as level_total,
            fac_level as facilityLevel,
            fac_county as countyName
    FROM
        facilities f
    JOIN survey_status ss ON ss.fac_id = f.fac_mfl
    JOIN survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type) JOIN assessment_tracker ta ON(
 f.fac_mfl = ta.facilityCode)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_cat)
    WHERE
        f.fac_level!=""
    GROUP BY fac_Level
    ORDER BY COUNT(fac_Level) ASC) AS tracker;

WHEN 'county' THEN
SELECT
    tracker.level_total, tracker.facilityLevel
FROM
    (SELECT
        COUNT(fac_level) as level_total,
            fac_level as facilityLevel,
            fac_county as countyName
    FROM
        facilities f
    JOIN survey_status ss ON ss.fac_id = f.fac_mfl
    JOIN survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
    JOIN assessment_tracker ta ON(
         f.fac_mfl = ta.facilityCode)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_cat)
    WHERE
        fac_county = analytic_value AND f.fac_level!=""
    GROUP BY fac_Level
    ORDER BY COUNT(fac_Level) ASC) AS tracker;

WHEN 'district' THEN
SELECT
    tracker.level_total, tracker.facilityLevel
FROM
    (SELECT
        COUNT(fac_level) as level_total,
            fac_level as facilityLevel,
            fac_county as countyName
    FROM
        facilities f
    JOIN survey_status ss ON ss.fac_id = f.fac_mfl
    JOIN survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
	JOIN assessment_tracker ta ON(
         f.fac_mfl = ta.facilityCode)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_cat)
    WHERE
        fac_district = analytic_value AND f.fac_level!=""
    GROUP BY fac_Level
    ORDER BY COUNT(fac_Level) ASC) AS tracker;

WHEN 'facility' THEN
SELECT
    tracker.level_total, tracker.facilityLevel
FROM
    (SELECT
        COUNT(fac_level) as level_total,
            fac_level as facilityLevel,
            fac_county as countyName
    FROM
        facilities f
    JOIN survey_status ss ON ss.fac_id = f.fac_mfl
    JOIN survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
    JOIN assessment_tracker ta ON(
         f.fac_mfl = ta.facilityCode)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_cat)
    WHERE
        fac_mfl = analytic_value AND f.fac_level!=""
    GROUP BY fac_Level
    ORDER BY COUNT(fac_Level) ASC) AS tracker;
END CASE;

END