USE `mnh_live`;
DROP procedure IF EXISTS `get_facility_type`;

DELIMITER $$
USE `mnh_live`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_facility_type`(criteria VARCHAR (45),analytic_value VARCHAR (45),survey_type VARCHAR (45),survey_category VARCHAR(45),statistic VARCHAR(45))
BEGIN
CASE statistic
WHEN 'response' THEN
CASE criteria
WHEN 'national' THEN
SELECT
    tracker.type_total, tracker.facilityType
FROM
    (SELECT
        COUNT(fac_type) as type_total,
            fac_type as facilityType,
            fac_county as countyName
    FROM
        facilities f
    JOIN survey_status ss ON ss.fac_id = f.fac_mfl
    JOIN survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type) JOIN facility_types ft ON(
 f.fac_type = ft.ft_name)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
    WHERE
        f.fac_level!=""
    GROUP BY fac_type
    ORDER BY COUNT(fac_type) ASC) AS tracker;

WHEN 'county' THEN
SELECT
    tracker.type_total, tracker.facilityType
FROM
    (SELECT
        COUNT(fac_type) as type_total,
            fac_type as facilityType,
            fac_county as countyName
    FROM
        facilities f
    JOIN survey_status ss ON ss.fac_id = f.fac_mfl
    JOIN survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
    JOIN facility_types ft ON(
 f.fac_type = ft.ft_name)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
    WHERE
        fac_county = analytic_value AND f.fac_level!=""
    GROUP BY fac_type
    ORDER BY COUNT(fac_type) ASC) AS tracker;

WHEN 'district' THEN
SELECT
    tracker.type_total, tracker.facilityType
FROM
    (SELECT
        COUNT(fac_type) as type_total,
            fac_type as facilityType,
            fac_county as countyName
    FROM
        facilities f
    JOIN survey_status ss ON ss.fac_id = f.fac_mfl
    JOIN survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
	JOIN facility_types ft ON(
 f.fac_type = ft.ft_name)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
    WHERE
        fac_district = analytic_value AND f.fac_level!=""
    GROUP BY fac_type
    ORDER BY COUNT(fac_type) ASC) AS tracker;

WHEN 'facility' THEN
SELECT
    tracker.type_total, tracker.facilityType
FROM
    (SELECT
        COUNT(fac_type) as type_total,
            fac_type as facilityType,
            fac_county as countyName
    FROM
        facilities f
    JOIN survey_status ss ON ss.fac_id = f.fac_mfl
    JOIN survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
    JOIN facility_types ft ON(
 f.fac_type = ft.ft_name)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category)
    WHERE
        fac_mfl = analytic_value AND f.fac_level!=""
    GROUP BY fac_type
    ORDER BY COUNT(fac_type) ASC) AS tracker;
END CASE;
WHEN 'response_raw' THEN
CASE criteria
WHEN 'national' THEN
SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_type
FROM
    facilities f
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
GROUP BY fac_mfl
ORDER BY fac_county,fac_district,fac_name;

WHEN 'county' THEN
SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_type
FROM
    facilities f
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl AND fac_county = analytic_value
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
GROUP BY fac_mfl
ORDER BY fac_county,fac_district,fac_name;

WHEN 'district' THEN
SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_type
FROM
    facilities f
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl AND fac_district = analytic_value
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
GROUP BY fac_mfl
ORDER BY fac_county,fac_district,fac_name;

WHEN 'facility' THEN
SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    f.fac_type
FROM
    facilities f
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl AND fac_mfl = analytic_value
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
GROUP BY fac_mfl
ORDER BY fac_county,fac_district,fac_name;
END CASE;
END CASE;
END$$

DELIMITER ;

