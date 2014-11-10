CREATE DEFINER=`root`@`localhost` PROCEDURE `get_ownership_statistics`(criteria VARCHAR (45),analytic_value VARCHAR(45),survey_type VARCHAR(45), survey_category VARCHAR(45))
BEGIN
CASE criteria
WHEN 'national' THEN 
SELECT
    tracker.ownership_total, tracker.facilityOwner
FROM(SELECT
    COUNT(fac_ownership) as ownership_total,
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
    fac_county as countyName
FROM
    facilities f
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
		JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
GROUP BY facilityOwner
ORDER BY COUNT(facilityOwner) ASC) as tracker;

WHEN 'county' THEN
SELECT
    tracker.ownership_total, tracker.facilityOwner
FROM(SELECT
    COUNT(fac_ownership) as ownership_total,
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
    fac_county as countyName
FROM
    facilities f
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
		JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
WHERE
    f.fac_county = analytic_value
GROUP BY facilityOwner
ORDER BY COUNT(facilityOwner) ASC) as tracker;

WHEN 'district' THEN
SELECT
    tracker.ownership_total, tracker.facilityOwner
FROM(SELECT
    COUNT(fac_ownership) as ownership_total,
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
    fac_county as countyName
FROM
    facilities f
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
		JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
WHERE
    f.fac_district = analytic_value
GROUP BY facilityOwner
ORDER BY COUNT(facilityOwner) ASC) as tracker;
WHEN 'facility' THEN
SELECT
    tracker.ownership_total, tracker.facilityOwner
FROM(SELECT
    COUNT(fac_ownership) as ownership_total,
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
    fac_county as countyName
FROM
    facilities f
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
		JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
WHERE
    f.fac_mfl = analytic_value
GROUP BY facilityOwner
ORDER BY COUNT(facilityOwner) ASC) as tracker;
END CASE;

END