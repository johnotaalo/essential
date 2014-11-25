USE `mnh_live`;
DROP procedure IF EXISTS `get_staff_trained`;

DELIMITER $$
USE `mnh_live`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_staff_trained`(criteria VARCHAR(45), analytic_value VARCHAR(45), survey_type VARCHAR(45),survey_category VARCHAR(45), guidefor VARCHAR(45),statistic VARCHAR(45))
BEGIN

CASE statistic
WHEN 'total' THEN
CASE criteria
WHEN 'national' THEN

SELECT sum(gtn.tg_total_facility) AS total,
		sum(gtn.tg_before) AS trained_before,
		sum(gtn.tg_after) AS trained_after,
			gtn.tg_staff AS cadre, 
			g.guide_name as guide_name 
   FROM training_guidelines_n gtn JOIN guidelines g ON (gtn.guide_code=g.guide_code AND g.guide_for=guidefor) 
WHERE gtn.tg_before !=-1 AND gtn.tg_working !=-1 AND gtn.tg_after !=-1
AND gtn.fac_mfl IN (SELECT fac_mfl FROM

            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
			survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
				JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type)) 
GROUP BY gtn.guide_code,gtn.tg_staff ORDER BY gtn.guide_code ASC;

WHEN 'county' THEN

SELECT sum(gtn.tg_total_facility) AS total,
		sum(gtn.tg_before) AS trained_before,
		sum(gtn.tg_after) AS trained_after,
			gtn.tg_staff AS cadre, 
			g.guide_name as guide_name 
   FROM training_guidelines_n gtn JOIN guidelines g ON (gtn.guide_code=g.guide_code AND g.guide_for=guidefor) 
WHERE gtn.tg_before !=-1 AND gtn.tg_working !=-1 AND gtn.tg_after !=-1
AND gtn.fac_mfl IN (SELECT fac_mfl FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_county=analytic_value) 
GROUP BY gtn.guide_code,gtn.tg_staff ORDER BY gtn.guide_code ASC;

WHEN 'district' THEN
SELECT sum(gtn.tg_total_facility) AS total,
		sum(gtn.tg_before) AS trained_before,
		sum(gtn.tg_after) AS trained_after,
			gtn.tg_staff AS cadre, 
			g.guide_name as guide_name 
   FROM training_guidelines_n gtn JOIN guidelines g ON (gtn.guide_code=g.guide_code AND g.guide_for=guidefor) 
WHERE gtn.tg_before !=-1 AND gtn.tg_working !=-1 AND gtn.tg_after !=-1
AND gtn.fac_mfl IN (SELECT fac_mfl FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_county = analytic_value) 
GROUP BY gtn.guide_code,gtn.tg_staff ORDER BY gtn.guide_code ASC;

WHEN 'facility' THEN
SELECT 
		sum(gtn.tg_total_facility) AS total,
		sum(gtn.tg_before) AS trained,
		sum(gtn.tg_after) AS trained_after,
			gtn.tg_staff AS cadre, 
			g.guide_name as guide_name 
   FROM training_guidelines_n gtn JOIN guidelines g ON (gtn.guide_code=g.guide_code AND g.guide_for=guidefor) 
WHERE gtn.tg_before !=-1 AND gtn.tg_working !=-1 AND gtn.tg_after !=-1
AND gtn.fac_mfl IN (SELECT fac_mfl FROM

            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_mfl=analytic_value) 
GROUP BY gtn.guide_code,gtn.tg_staff ORDER BY gtn.guide_code ASC;
END CASE;

WHEN 'total_raw' THEN
CASE criteria
WHEN 'national' THEN

SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    gtn.tg_before AS trained_before,
    gtn.tg_after AS trained_after,
    gtn.tg_staff AS cadre,
    g.guide_name AS guide_name
FROM
    training_guidelines_n gtn
        JOIN
    guidelines g ON (gtn.guide_code = g.guide_code
        AND g.guide_for = guidefor)
        JOIN
    facilities f ON gtn.fac_mfl = f.fac_mfl
        JOIN
    survey_status ss ON ss.ss_id = gtn.ss_id
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY f.fac_county , f.fac_district , f.fac_name , guide_name , cadre ASC;


WHEN 'county' THEN

SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    gtn.tg_before AS trained_before,
    gtn.tg_after AS trained_after,
    gtn.tg_staff AS cadre,
    g.guide_name AS guide_name
FROM
    training_guidelines_n gtn
        JOIN
    guidelines g ON (gtn.guide_code = g.guide_code
        AND g.guide_for = guidefor)
        JOIN
    facilities f ON gtn.fac_mfl = f.fac_mfl AND fac_county = analytic_value
        JOIN
    survey_status ss ON ss.ss_id = gtn.ss_id
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY f.fac_county , f.fac_district , f.fac_name , guide_name , cadre ASC;

WHEN 'district' THEN

SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    gtn.tg_before AS trained_before,
    gtn.tg_after AS trained_after,
    gtn.tg_staff AS cadre,
    g.guide_name AS guide_name
FROM
    training_guidelines_n gtn
        JOIN
    guidelines g ON (gtn.guide_code = g.guide_code
        AND g.guide_for = guidefor)
        JOIN
    facilities f ON gtn.fac_mfl = f.fac_mfl AND fac_district = analytic_value
        JOIN
    survey_status ss ON ss.ss_id = gtn.ss_id
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY f.fac_county , f.fac_district , f.fac_name , guide_name , cadre ASC;

WHEN 'facility' THEN

SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    gtn.tg_before AS trained_before,
    gtn.tg_after AS trained_after,
    gtn.tg_staff AS cadre,
    g.guide_name AS guide_name
FROM
    training_guidelines_n gtn
        JOIN
    guidelines g ON (gtn.guide_code = g.guide_code
        AND g.guide_for = guidefor)
        JOIN
    facilities f ON gtn.fac_mfl = f.fac_mfl AND fac_mfl = analytic_value
        JOIN
    survey_status ss ON ss.ss_id = gtn.ss_id
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY f.fac_county , f.fac_district , f.fac_name , guide_name , cadre ASC;

END CASE;
END CASE;
END$$

DELIMITER ;

