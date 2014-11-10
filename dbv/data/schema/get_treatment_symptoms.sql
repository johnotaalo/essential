CREATE DEFINER=`root`@`localhost` PROCEDURE `get_treatment_symptoms`(criteria VARCHAR(45), analytic_value VARCHAR(45), survey_type VARCHAR(45),survey_category VARCHAR(45))
BEGIN
CASE criteria
WHEN 'national' THEN
SELECT 
    count(lt.lt_other_treatments) AS total,
	lt.lt_other_treatments AS treatment
FROM
    log_treatments lt 
		JOIN 
	facilities f ON f.fac_mfl = lt.facility_mfl
		JOIN 
	survey_status ss ON ss.fac_id = f.fac_mfl 
		JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name =survey_category)
		JOIN
	survey_types st ON (st.st_id = ss.st_id AND st.st_name = survey_type)
WHERE 
	lt.lt_other_treatments LIKE '%TRM%'
GROUP BY lt.lt_other_treatments;

WHEN 'county' THEN
SELECT 
    count(lt.lt_other_treatments) AS total,
	lt.lt_other_treatments AS treatment
FROM
    log_treatments lt 
		JOIN 
	facilities f ON f.fac_mfl = lt.facility_mfl
		JOIN 
	survey_status ss ON ss.fac_id = f.fac_mfl 
		JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name =survey_category)
		JOIN
	survey_types st ON (st.st_id = ss.st_id AND st.st_name = survey_type)
	AND f.fac_county = analytic_value
WHERE 
	lt.lt_other_treatments LIKE '%TRM%'
GROUP BY lt.lt_other_treatments;

WHEN 'district' THEN
SELECT 
    count(lt.lt_other_treatments) AS total,
	lt.lt_other_treatments AS treatment
FROM
    log_treatments lt 
		JOIN 
	facilities f ON f.fac_mfl = lt.facility_mfl
		JOIN 
	survey_status ss ON ss.fac_id = f.fac_mfl 
		JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name =survey_category)
		JOIN
	survey_types st ON (st.st_id = ss.st_id AND st.st_name = survey_type)
	AND f.fac_district = analytic_value
WHERE 
	lt.lt_other_treatments LIKE '%TRM%'
GROUP BY lt.lt_other_treatments;

WHEN 'facility' THEN
SELECT 
    count(lt.lt_other_treatments) AS total,
	lt.lt_other_treatments AS treatment
FROM
    log_treatments lt 
		JOIN 
	facilities f ON f.fac_mfl = lt.facility_mfl
		JOIN 
	survey_status ss ON ss.fac_id = f.fac_mfl 
		JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name =survey_category)
		JOIN
	survey_types st ON (st.st_id = ss.st_id AND st.st_name = survey_type)
	AND f.fac_mfl = analytic_value
WHERE 
	lt.lt_other_treatments LIKE '%TRM%'
GROUP BY lt.lt_other_treatments;

END CASE;
END