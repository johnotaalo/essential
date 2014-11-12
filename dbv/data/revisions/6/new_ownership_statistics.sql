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
    tracker.ownership_total, tracker.facilityOwner
FROM
    (SELECT 
        COUNT(distinct fac_mfl) AS ownership_total,
           (CASE
                WHEN fac_ownership = "Private Practice - General Practitioner" THEN "Private"
                WHEN fac_ownership = "Private Practice - Nurse / Midwife" THEN "Private"
                WHEN fac_ownership = "Private Enterprise (Institution)" THEN "Private"
                WHEN fac_ownership = "Private Practice - Clinical Officer" THEN "Private"
                WHEN fac_ownership = "Christian Health Association of Kenya" THEN "Faith Based Organisation"
                WHEN fac_ownership = "Other Faith Based" THEN "Faith Based Organisation"
                WHEN fac_ownership = "FBO" THEN "Faith Based Organisation"
                WHEN fac_ownership = "Kenya Episcopal Conference-Catholic Secretariat" THEN "Faith Based Organisation"
                WHEN fac_ownership = "GOK" THEN "Ministry of Health"
                ELSE fac_ownership
            END) as facilityOwner,
            fac_county AS countyName
    FROM
        facilities f
         JOIN assessment_tracker ast ON ast.facilityCode = f.fac_mfl
        AND ast.ast_section >= section
        AND ast.ast_survey = survey_type
    JOIN survey_status ss ON ss.fac_id = f.fac_mfl
    JOIN survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
    JOIN survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
        GROUP BY fac_ownership
    ORDER BY COUNT(distinct fac_mfl) ASC) AS tracker;

WHEN 'county' THEN
SELECT 
    tracker.ownership_total, tracker.facilityOwner
FROM
    (SELECT 
        COUNT(distinct fac_mfl) AS ownership_total,
           (CASE
                WHEN fac_ownership = "Private Practice - General Practitioner" THEN "Private"
                WHEN fac_ownership = "Private Practice - Nurse / Midwife" THEN "Private"
                WHEN fac_ownership = "Private Enterprise (Institution)" THEN "Private"
                WHEN fac_ownership = "Private Practice - Clinical Officer" THEN "Private"
                WHEN fac_ownership = "Christian Health Association of Kenya" THEN "Faith Based Organisation"
                WHEN fac_ownership = "Other Faith Based" THEN "Faith Based Organisation"
                WHEN fac_ownership = "FBO" THEN "Faith Based Organisation"
                WHEN fac_ownership = "Kenya Episcopal Conference-Catholic Secretariat" THEN "Faith Based Organisation"
                WHEN fac_ownership = "GOK" THEN "Ministry of Health"
                ELSE fac_ownership
            END) as facilityOwner,
            fac_county AS countyName
    FROM
        facilities f
         JOIN assessment_tracker ast ON ast.facilityCode = f.fac_mfl
        AND ast.ast_section >= section
        AND ast.ast_survey = survey_type
    JOIN survey_status ss ON ss.fac_id = f.fac_mfl
    JOIN survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
    JOIN survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
        WHERE
    f.fac_county = analytic_value
        GROUP BY fac_ownership
    ORDER BY COUNT(distinct fac_mfl) ASC) AS tracker;

WHEN 'district' THEN
SELECT 
    tracker.ownership_total, tracker.facilityOwner
FROM
    (SELECT 
        COUNT(distinct fac_mfl) AS ownership_total,
           (CASE
                WHEN fac_ownership = "Private Practice - General Practitioner" THEN "Private"
                WHEN fac_ownership = "Private Practice - Nurse / Midwife" THEN "Private"
                WHEN fac_ownership = "Private Enterprise (Institution)" THEN "Private"
                WHEN fac_ownership = "Private Practice - Clinical Officer" THEN "Private"
                WHEN fac_ownership = "Christian Health Association of Kenya" THEN "Faith Based Organisation"
                WHEN fac_ownership = "Other Faith Based" THEN "Faith Based Organisation"
                WHEN fac_ownership = "FBO" THEN "Faith Based Organisation"
                WHEN fac_ownership = "Kenya Episcopal Conference-Catholic Secretariat" THEN "Faith Based Organisation"
                WHEN fac_ownership = "GOK" THEN "Ministry of Health"
                ELSE fac_ownership
            END) as facilityOwner,
            fac_county AS countyName
    FROM
        facilities f
         JOIN assessment_tracker ast ON ast.facilityCode = f.fac_mfl
        AND ast.ast_section >= section
        AND ast.ast_survey = survey_type
    JOIN survey_status ss ON ss.fac_id = f.fac_mfl
    JOIN survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
    JOIN survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
        WHERE
    f.fac_district = analytic_value
        GROUP BY fac_ownership
    ORDER BY COUNT(distinct fac_mfl) ASC) AS tracker;
WHEN 'facility' THEN
SELECT 
    tracker.ownership_total, tracker.facilityOwner
FROM
    (SELECT 
        COUNT(distinct fac_mfl) AS ownership_total,
           (CASE
                WHEN fac_ownership = "Private Practice - General Practitioner" THEN "Private"
                WHEN fac_ownership = "Private Practice - Nurse / Midwife" THEN "Private"
                WHEN fac_ownership = "Private Enterprise (Institution)" THEN "Private"
                WHEN fac_ownership = "Private Practice - Clinical Officer" THEN "Private"
                WHEN fac_ownership = "Christian Health Association of Kenya" THEN "Faith Based Organisation"
                WHEN fac_ownership = "Other Faith Based" THEN "Faith Based Organisation"
                WHEN fac_ownership = "FBO" THEN "Faith Based Organisation"
                WHEN fac_ownership = "Kenya Episcopal Conference-Catholic Secretariat" THEN "Faith Based Organisation"
                WHEN fac_ownership = "GOK" THEN "Ministry of Health"
                ELSE fac_ownership
            END) as facilityOwner,
            fac_county AS countyName
    FROM
        facilities f
         JOIN assessment_tracker ast ON ast.facilityCode = f.fac_mfl
        AND ast.ast_section >= section
        AND ast.ast_survey = survey_type
    JOIN survey_status ss ON ss.fac_id = f.fac_mfl
    JOIN survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
    JOIN survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
        WHERE
    f.fac_mfl = analytic_value
        GROUP BY fac_ownership
    ORDER BY COUNT(distinct fac_mfl) ASC) AS tracker;
END CASE;

WHEN 'response_raw' THEN 
CASE criteria
WHEN 'national' THEN 
SELECT 
    tracker.ownership_total, tracker.facilityOwner
FROM
    (SELECT 
        COUNT(distinct fac_mfl) AS ownership_total,
           (CASE
                WHEN fac_ownership = "Private Practice - General Practitioner" THEN "Private"
                WHEN fac_ownership = "Private Practice - Nurse / Midwife" THEN "Private"
                WHEN fac_ownership = "Private Enterprise (Institution)" THEN "Private"
                WHEN fac_ownership = "Private Practice - Clinical Officer" THEN "Private"
                WHEN fac_ownership = "Christian Health Association of Kenya" THEN "Faith Based Organisation"
                WHEN fac_ownership = "Other Faith Based" THEN "Faith Based Organisation"
                WHEN fac_ownership = "FBO" THEN "Faith Based Organisation"
                WHEN fac_ownership = "Kenya Episcopal Conference-Catholic Secretariat" THEN "Faith Based Organisation"
                WHEN fac_ownership = "GOK" THEN "Ministry of Health"
                ELSE fac_ownership
            END) as facilityOwner,
            fac_county AS countyName
    FROM
        facilities f
         JOIN assessment_tracker ast ON ast.facilityCode = f.fac_mfl
        AND ast.ast_section >= section
        AND ast.ast_survey = survey_type
    JOIN survey_status ss ON ss.fac_id = f.fac_mfl
    JOIN survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
    JOIN survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
        WHERE
    f.fac_county = analytic_value
       GROUP BY fac_mfl
ORDER BY fac_county,fac_district,fac_name ASC) AS tracker;


WHEN 'county' THEN
SELECT 
    tracker.ownership_total, tracker.facilityOwner
FROM
    (SELECT 
        COUNT(distinct fac_mfl) AS ownership_total,
           (CASE
                WHEN fac_ownership = "Private Practice - General Practitioner" THEN "Private"
                WHEN fac_ownership = "Private Practice - Nurse / Midwife" THEN "Private"
                WHEN fac_ownership = "Private Enterprise (Institution)" THEN "Private"
                WHEN fac_ownership = "Private Practice - Clinical Officer" THEN "Private"
                WHEN fac_ownership = "Christian Health Association of Kenya" THEN "Faith Based Organisation"
                WHEN fac_ownership = "Other Faith Based" THEN "Faith Based Organisation"
                WHEN fac_ownership = "FBO" THEN "Faith Based Organisation"
                WHEN fac_ownership = "Kenya Episcopal Conference-Catholic Secretariat" THEN "Faith Based Organisation"
                WHEN fac_ownership = "GOK" THEN "Ministry of Health"
                ELSE fac_ownership
            END) as facilityOwner,
            fac_county AS countyName
    FROM
        facilities f
         JOIN assessment_tracker ast ON ast.facilityCode = f.fac_mfl
        AND ast.ast_section >= section
        AND ast.ast_survey = survey_type
    JOIN survey_status ss ON ss.fac_id = f.fac_mfl
    JOIN survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
    JOIN survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
        WHERE
    f.fac_district = analytic_value
       GROUP BY fac_mfl
ORDER BY fac_county,fac_district,fac_name ASC) AS tracker;

WHEN 'district' THEN
SELECT 
    tracker.ownership_total, tracker.facilityOwner
FROM
    (SELECT 
        COUNT(distinct fac_mfl) AS ownership_total,
           (CASE
                WHEN fac_ownership = "Private Practice - General Practitioner" THEN "Private"
                WHEN fac_ownership = "Private Practice - Nurse / Midwife" THEN "Private"
                WHEN fac_ownership = "Private Enterprise (Institution)" THEN "Private"
                WHEN fac_ownership = "Private Practice - Clinical Officer" THEN "Private"
                WHEN fac_ownership = "Christian Health Association of Kenya" THEN "Faith Based Organisation"
                WHEN fac_ownership = "Other Faith Based" THEN "Faith Based Organisation"
                WHEN fac_ownership = "FBO" THEN "Faith Based Organisation"
                WHEN fac_ownership = "Kenya Episcopal Conference-Catholic Secretariat" THEN "Faith Based Organisation"
                WHEN fac_ownership = "GOK" THEN "Ministry of Health"
                ELSE fac_ownership
            END) as facilityOwner,
            fac_county AS countyName
    FROM
        facilities f
         JOIN assessment_tracker ast ON ast.facilityCode = f.fac_mfl
        AND ast.ast_section >= section
        AND ast.ast_survey = survey_type
    JOIN survey_status ss ON ss.fac_id = f.fac_mfl
    JOIN survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
    JOIN survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
        WHERE
    f.fac_district = analytic_value
       GROUP BY fac_mfl
ORDER BY fac_county,fac_district,fac_name ASC) AS tracker;

WHEN 'facility' THEN
SELECT 
    tracker.ownership_total, tracker.facilityOwner
FROM
    (SELECT 
        COUNT(distinct fac_mfl) AS ownership_total,
           (CASE
                WHEN fac_ownership = "Private Practice - General Practitioner" THEN "Private"
                WHEN fac_ownership = "Private Practice - Nurse / Midwife" THEN "Private"
                WHEN fac_ownership = "Private Enterprise (Institution)" THEN "Private"
                WHEN fac_ownership = "Private Practice - Clinical Officer" THEN "Private"
                WHEN fac_ownership = "Christian Health Association of Kenya" THEN "Faith Based Organisation"
                WHEN fac_ownership = "Other Faith Based" THEN "Faith Based Organisation"
                WHEN fac_ownership = "FBO" THEN "Faith Based Organisation"
                WHEN fac_ownership = "Kenya Episcopal Conference-Catholic Secretariat" THEN "Faith Based Organisation"
                WHEN fac_ownership = "GOK" THEN "Ministry of Health"
                ELSE fac_ownership
            END) as facilityOwner,
            fac_county AS countyName
    FROM
        facilities f
         JOIN assessment_tracker ast ON ast.facilityCode = f.fac_mfl
        AND ast.ast_section >= section
        AND ast.ast_survey = survey_type
    JOIN survey_status ss ON ss.fac_id = f.fac_mfl
    JOIN survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
    JOIN survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
        WHERE
    f.fac_county = analytic_value
       GROUP BY fac_mfl
ORDER BY fac_county,fac_district,fac_name ASC) AS tracker;

END CASE;

END CASE;

END
