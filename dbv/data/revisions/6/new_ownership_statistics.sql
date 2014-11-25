USE `mnh_live`;
DROP procedure IF EXISTS `get_ownership_statistics`;

DELIMITER $$
USE `mnh_live`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_ownership_statistics`(criteria VARCHAR (45),analytic_value VARCHAR(45),survey_type VARCHAR(45), survey_category VARCHAR(45),statistic VARCHAR(45))
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
COUNT(distinct fac_mfl) AS ownership_total,
    COUNT(distinct fac_mfl) AS ownership_total,
    (CASE
        WHEN fac_ownership LIKE '%Private %' THEN 'Private'
        WHEN fac_ownership LIKE 'Christian Health Association of Kenya' THEN 'Faith Based Organisation'
        WHEN fac_ownership LIKE '%NON-Governmental%' THEN 'Private'
        WHEN fac_ownership LIKE '%Parastatal%' THEN 'Public'
        WHEN fac_ownership LIKE '%Company%' THEN 'Private'
        WHEN fac_ownership LIKE '%Public%' THEN 'Public'
        WHEN fac_ownership LIKE '%Ministry of Health%' THEN 'Public'
        WHEN fac_ownership LIKE '%State%' THEN 'Public'
        WHEN fac_ownership LIKE '%Academic%' THEN 'Private'
        WHEN fac_ownership LIKE '%Armed%' THEN 'Public'
        WHEN fac_ownership LIKE '%Local%' THEN 'Public'
        WHEN fac_ownership LIKE '%Muslims%' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'Other Faith Based' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'FBO' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'Kenya Episcopal Conference-Catholic Secretariat' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'GOK' THEN 'Public'
        WHEN fac_ownership LIKE '%Community%' THEN 'Community'
        ELSE fac_ownership
    END) AS ownership
FROM
    facilities f
    JOIN assessment_tracker ast ON ast.facilityCode = f.fac_mfl
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
GROUP BY ownership
ORDER BY COUNT(distinct fac_mfl);

WHEN 'county' THEN

SELECT 
COUNT(distinct fac_mfl) AS ownership_total,
    COUNT(distinct fac_mfl) AS ownership_total,
    (CASE
        WHEN fac_ownership LIKE '%Private %' THEN 'Private'
        WHEN fac_ownership LIKE 'Christian Health Association of Kenya' THEN 'Faith Based Organisation'
        WHEN fac_ownership LIKE '%NON-Governmental%' THEN 'Private'
        WHEN fac_ownership LIKE '%Parastatal%' THEN 'Public'
        WHEN fac_ownership LIKE '%Company%' THEN 'Private'
        WHEN fac_ownership LIKE '%Public%' THEN 'Public'
        WHEN fac_ownership LIKE '%Ministry of Health%' THEN 'Public'
        WHEN fac_ownership LIKE '%State%' THEN 'Public'
        WHEN fac_ownership LIKE '%Academic%' THEN 'Private'
        WHEN fac_ownership LIKE '%Armed%' THEN 'Public'
        WHEN fac_ownership LIKE '%Local%' THEN 'Public'
        WHEN fac_ownership LIKE '%Muslims%' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'Other Faith Based' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'FBO' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'Kenya Episcopal Conference-Catholic Secretariat' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'GOK' THEN 'Public'
        WHEN fac_ownership LIKE '%Community%' THEN 'Community'
        ELSE fac_ownership
    END) AS ownership
FROM
    facilities f
    JOIN assessment_tracker ast ON ast.facilityCode = f.fac_mfl
        AND ast.ast_section >= section
        AND ast.ast_survey = survey_type
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl AND fac_county = analytic_value
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
GROUP BY ownership
ORDER BY COUNT(distinct fac_mfl);

WHEN 'district' THEN

SELECT 
COUNT(distinct fac_mfl) AS ownership_total,
    COUNT(distinct fac_mfl) AS ownership_total,
    (CASE
        WHEN fac_ownership LIKE '%Private %' THEN 'Private'
        WHEN fac_ownership LIKE 'Christian Health Association of Kenya' THEN 'Faith Based Organisation'
        WHEN fac_ownership LIKE '%NON-Governmental%' THEN 'Private'
        WHEN fac_ownership LIKE '%Parastatal%' THEN 'Public'
        WHEN fac_ownership LIKE '%Company%' THEN 'Private'
        WHEN fac_ownership LIKE '%Public%' THEN 'Public'
        WHEN fac_ownership LIKE '%Ministry of Health%' THEN 'Public'
        WHEN fac_ownership LIKE '%State%' THEN 'Public'
        WHEN fac_ownership LIKE '%Academic%' THEN 'Private'
        WHEN fac_ownership LIKE '%Armed%' THEN 'Public'
        WHEN fac_ownership LIKE '%Local%' THEN 'Public'
        WHEN fac_ownership LIKE '%Muslims%' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'Other Faith Based' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'FBO' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'Kenya Episcopal Conference-Catholic Secretariat' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'GOK' THEN 'Public'
        WHEN fac_ownership LIKE '%Community%' THEN 'Community'
        ELSE fac_ownership
    END) AS ownership
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
GROUP BY ownership
ORDER BY COUNT(distinct fac_mfl);

WHEN 'facility' THEN

SELECT 
COUNT(distinct fac_mfl) AS ownership_total,
    COUNT(distinct fac_mfl) AS ownership_total,
    (CASE
        WHEN fac_ownership LIKE '%Private %' THEN 'Private'
        WHEN fac_ownership LIKE 'Christian Health Association of Kenya' THEN 'Faith Based Organisation'
        WHEN fac_ownership LIKE '%NON-Governmental%' THEN 'Private'
        WHEN fac_ownership LIKE '%Parastatal%' THEN 'Public'
        WHEN fac_ownership LIKE '%Company%' THEN 'Private'
        WHEN fac_ownership LIKE '%Public%' THEN 'Public'
        WHEN fac_ownership LIKE '%Ministry of Health%' THEN 'Public'
        WHEN fac_ownership LIKE '%State%' THEN 'Public'
        WHEN fac_ownership LIKE '%Academic%' THEN 'Private'
        WHEN fac_ownership LIKE '%Armed%' THEN 'Public'
        WHEN fac_ownership LIKE '%Local%' THEN 'Public'
        WHEN fac_ownership LIKE '%Muslims%' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'Other Faith Based' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'FBO' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'Kenya Episcopal Conference-Catholic Secretariat' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'GOK' THEN 'Public'
        WHEN fac_ownership LIKE '%Community%' THEN 'Community'
        ELSE fac_ownership
    END) AS ownership
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
GROUP BY ownership
ORDER BY COUNT(distinct fac_mfl);

END CASE;

WHEN 'response_raw' THEN 
CASE criteria
WHEN 'national' THEN 

SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    COUNT(distinct fac_mfl) AS ownership_total,
    (CASE
        WHEN fac_ownership LIKE '%Private %' THEN 'Private'
        WHEN fac_ownership LIKE 'Christian Health Association of Kenya' THEN 'Faith Based Organisation'
        WHEN fac_ownership LIKE '%NON-Governmental%' THEN 'Private'
        WHEN fac_ownership LIKE '%Parastatal%' THEN 'Public'
        WHEN fac_ownership LIKE '%Company%' THEN 'Private'
        WHEN fac_ownership LIKE '%Public%' THEN 'Public'
        WHEN fac_ownership LIKE '%Ministry of Health%' THEN 'Public'
        WHEN fac_ownership LIKE '%State%' THEN 'Public'
        WHEN fac_ownership LIKE '%Academic%' THEN 'Private'
        WHEN fac_ownership LIKE '%Armed%' THEN 'Public'
        WHEN fac_ownership LIKE '%Local%' THEN 'Public'
        WHEN fac_ownership LIKE '%Muslims%' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'Other Faith Based' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'FBO' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'Kenya Episcopal Conference-Catholic Secretariat' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'GOK' THEN 'Public'
        WHEN fac_ownership LIKE '%Community%' THEN 'Community'
        ELSE fac_ownership
    END) AS ownership
FROM
    facilities f
    JOIN assessment_tracker ast ON ast.facilityCode = f.fac_mfl
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
    COUNT(distinct fac_mfl) AS ownership_total,
    (CASE
        WHEN fac_ownership LIKE '%Private %' THEN 'Private'
        WHEN fac_ownership LIKE 'Christian Health Association of Kenya' THEN 'Faith Based Organisation'
        WHEN fac_ownership LIKE '%NON-Governmental%' THEN 'Private'
        WHEN fac_ownership LIKE '%Parastatal%' THEN 'Public'
        WHEN fac_ownership LIKE '%Company%' THEN 'Private'
        WHEN fac_ownership LIKE '%Public%' THEN 'Public'
        WHEN fac_ownership LIKE '%Ministry of Health%' THEN 'Public'
        WHEN fac_ownership LIKE '%State%' THEN 'Public'
        WHEN fac_ownership LIKE '%Academic%' THEN 'Private'
        WHEN fac_ownership LIKE '%Armed%' THEN 'Public'
        WHEN fac_ownership LIKE '%Local%' THEN 'Public'
        WHEN fac_ownership LIKE '%Muslims%' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'Other Faith Based' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'FBO' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'Kenya Episcopal Conference-Catholic Secretariat' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'GOK' THEN 'Public'
        WHEN fac_ownership LIKE '%Community%' THEN 'Community'
        ELSE fac_ownership
    END) AS ownership
FROM
    facilities f
    JOIN assessment_tracker ast ON ast.facilityCode = f.fac_mfl
        AND ast.ast_section >= section
        AND ast.ast_survey = survey_type
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl AND fac_county = analytic_value
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
    COUNT(distinct fac_mfl) AS ownership_total,
    (CASE
        WHEN fac_ownership LIKE '%Private %' THEN 'Private'
        WHEN fac_ownership LIKE 'Christian Health Association of Kenya' THEN 'Faith Based Organisation'
        WHEN fac_ownership LIKE '%NON-Governmental%' THEN 'Private'
        WHEN fac_ownership LIKE '%Parastatal%' THEN 'Public'
        WHEN fac_ownership LIKE '%Company%' THEN 'Private'
        WHEN fac_ownership LIKE '%Public%' THEN 'Public'
        WHEN fac_ownership LIKE '%Ministry of Health%' THEN 'Public'
        WHEN fac_ownership LIKE '%State%' THEN 'Public'
        WHEN fac_ownership LIKE '%Academic%' THEN 'Private'
        WHEN fac_ownership LIKE '%Armed%' THEN 'Public'
        WHEN fac_ownership LIKE '%Local%' THEN 'Public'
        WHEN fac_ownership LIKE '%Muslims%' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'Other Faith Based' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'FBO' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'Kenya Episcopal Conference-Catholic Secretariat' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'GOK' THEN 'Public'
        WHEN fac_ownership LIKE '%Community%' THEN 'Community'
        ELSE fac_ownership
    END) AS ownership
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
    COUNT(distinct fac_mfl) AS ownership_total,
    (CASE
        WHEN fac_ownership LIKE '%Private %' THEN 'Private'
        WHEN fac_ownership LIKE 'Christian Health Association of Kenya' THEN 'Faith Based Organisation'
        WHEN fac_ownership LIKE '%NON-Governmental%' THEN 'Private'
        WHEN fac_ownership LIKE '%Parastatal%' THEN 'Public'
        WHEN fac_ownership LIKE '%Company%' THEN 'Private'
        WHEN fac_ownership LIKE '%Public%' THEN 'Public'
        WHEN fac_ownership LIKE '%Ministry of Health%' THEN 'Public'
        WHEN fac_ownership LIKE '%State%' THEN 'Public'
        WHEN fac_ownership LIKE '%Academic%' THEN 'Private'
        WHEN fac_ownership LIKE '%Armed%' THEN 'Public'
        WHEN fac_ownership LIKE '%Local%' THEN 'Public'
        WHEN fac_ownership LIKE '%Muslims%' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'Other Faith Based' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'FBO' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'Kenya Episcopal Conference-Catholic Secretariat' THEN 'Faith Based Organisation'
        WHEN fac_ownership = 'GOK' THEN 'Public'
        WHEN fac_ownership LIKE '%Community%' THEN 'Community'
        ELSE fac_ownership
    END) AS ownership
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

