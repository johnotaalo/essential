USE `mnh_live`;
DROP procedure IF EXISTS `get_treatment_statistics`;

DELIMITER $$
USE `mnh_live`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_treatment_statistics`(criteria VARCHAR(45),analytic_value VARCHAR(45), survey_type VARCHAR(45), survey_category VARCHAR(45), statistic VARCHAR(45))
BEGIN

CASE statistic
WHEN 'other_treatment_raw' THEN
CASE criteria 
WHEN 'national' THEN
SELECT 
	f.fac_mfl,
	f.fac_name,
	f.fac_district,
	f.fac_county,
    lt_other_treatments,
    COUNT(lt_other_treatments) AS total_treatment,
    lt_classification AS treatment,
    tc.tc_for AS treatment_for
FROM
    log_treatments lt
        JOIN
    treatment_classifications tc ON lt.lt_classification = tc.tc_name
        JOIN
    facilities f ON facility_mfl = f.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
WHERE
    lt_treatments != 'n/a'
GROUP BY f.fac_name, lt_other_treatments
ORDER BY f.fac_county,f.fac_district,f.fac_name ASC;
WHEN 'county' THEN
SELECT
	f.fac_mfl,
	f.fac_name,
	f.fac_district,
	f.fac_county, 
    lt_other_treatments,
    COUNT(lt_other_treatments) AS total_treatment,
    lt_classification AS treatment,
    tc.tc_for AS treatment_for
FROM
    log_treatments lt
        JOIN
    treatment_classifications tc ON lt.lt_classification = tc.tc_name
        JOIN
    facilities f ON facility_mfl = f.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        AND f.fac_county = analytic_value
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
WHERE
    lt_treatments != 'n/a'
GROUP BY f.fac_name, lt_other_treatments
ORDER BY f.fac_county,f.fac_district,f.fac_name ASC;
WHEN 'district' THEN
SELECT 
	f.fac_mfl,
	f.fac_name,
	f.fac_district,
	f.fac_county,
    lt_other_treatments,
    COUNT(lt_other_treatments) AS total_treatment,
    lt_classification AS treatment,
    tc.tc_for AS treatment_for
FROM
    log_treatments lt
        JOIN
    treatment_classifications tc ON lt.lt_classification = tc.tc_name
        JOIN
    facilities f ON facility_mfl = f.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        AND f.fac_district = analytic_value
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
WHERE
    lt_treatments != 'n/a'
GROUP BY f.fac_name, lt_other_treatments
ORDER BY f.fac_county,f.fac_district,f.fac_name ASC;
WHEN 'facility' THEN
SELECT
	f.fac_mfl,
	f.fac_name,
	f.fac_district,
	f.fac_county,
    lt_other_treatments,
    COUNT(lt_other_treatments) AS total_treatment,
    lt_classification AS treatment,
    tc.tc_for AS treatment_for
FROM
    log_treatments lt
        JOIN
    treatment_classifications tc ON lt.lt_classification = tc.tc_name
        JOIN
    facilities f ON facility_mfl = f.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        AND f.fac_mfl = analytic_value
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
WHERE
    lt_treatments != 'n/a'
GROUP BY f.fac_name, lt_other_treatments
ORDER BY f.fac_county,f.fac_district,f.fac_name ASC;
END CASE;

WHEN 'treatment_raw' THEN
CASE criteria 
WHEN 'national' THEN
SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    lt_treatments,
    COUNT(lt_treatments) AS total_treatment,
    lt_classification AS treatment,
    tc.tc_for AS treatment_for
FROM
    log_treatments lt
        JOIN
    treatment_classifications tc ON lt.lt_classification = tc.tc_name
        JOIN
    facilities f ON facility_mfl = f.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = 'baseline')
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = 'mnh')
WHERE
    lt_treatments != 'n/a'
GROUP BY f.fac_name,lt_treatments
ORDER BY f.fac_county,f.fac_district,f.fac_name ASC;
WHEN 'county' THEN
SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    lt_treatments,
    COUNT(lt_treatments) AS total_treatment,
    lt_classification AS treatment,
    tc.tc_for AS treatment_for
FROM
    log_treatments lt
        JOIN
    treatment_classifications tc ON lt.lt_classification = tc.tc_name
        JOIN
    facilities f ON facility_mfl = f.fac_mfl AND f.fac_county=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = 'baseline')
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = 'mnh')
WHERE
    lt_treatments != 'n/a'
GROUP BY f.fac_name,lt_treatments
ORDER BY f.fac_county,f.fac_district,f.fac_name ASC;
WHEN 'district' THEN
SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    lt_treatments,
    COUNT(lt_treatments) AS total_treatment,
    lt_classification AS treatment,
    tc.tc_for AS treatment_for
FROM
    log_treatments lt
        JOIN
    treatment_classifications tc ON lt.lt_classification = tc.tc_name
        JOIN
    facilities f ON facility_mfl = f.fac_mfl AND fac_district=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = 'baseline')
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = 'mnh')
WHERE
    lt_treatments != 'n/a'
GROUP BY f.fac_name,lt_treatments
ORDER BY f.fac_county,f.fac_district,f.fac_name ASC;
WHEN 'facility' THEN
SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    lt_treatments,
    COUNT(lt_treatments) AS total_treatment,
    lt_classification AS treatment,
    tc.tc_for AS treatment_for
FROM
    log_treatments lt
        JOIN
    treatment_classifications tc ON lt.lt_classification = tc.tc_name
        JOIN
    facilities f ON facility_mfl = f.fac_mfl AND f.fac_mfl = analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = 'baseline')
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = 'mnh')
WHERE
    lt_treatments != 'n/a'
GROUP BY f.fac_name,lt_treatments
ORDER BY f.fac_county,f.fac_district,f.fac_name ASC;
END CASE;
WHEN 'cases_raw' THEN
CASE criteria

WHEN 'national' THEN
SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    SUM(CASE lt_total
        WHEN NULL THEN 0
        ELSE lt_total
    END) AS total,
    lt_classification AS treatment,
    tc.tc_for AS treatment_for
FROM
    log_treatments lt
        JOIN
    treatment_classifications tc ON lt.lt_classification = tc.tc_name
        JOIN
    facilities f ON facility_mfl = f.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
GROUP BY f.fac_name , tc.tc_for , tc.tc_name
ORDER BY f.fac_county,fac_district,f.fac_name , tc.tc_for ASC;

WHEN 'county' THEN
SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    SUM(CASE lt_total
        WHEN NULL THEN 0
        ELSE lt_total
    END) AS total,
    lt_classification AS treatment,
    tc.tc_for AS treatment_for
FROM
    log_treatments lt
        JOIN
    treatment_classifications tc ON lt.lt_classification = tc.tc_name
        JOIN
    facilities f ON facility_mfl = f.fac_mfl AND f.fac_county = analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
GROUP BY f.fac_name , tc.tc_for , tc.tc_name
ORDER BY f.fac_county,fac_district,f.fac_name , tc.tc_for ASC;
WHEN 'district' THEN
SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    SUM(CASE lt_total
        WHEN NULL THEN 0
        ELSE lt_total
    END) AS total,
    lt_classification AS treatment,
    tc.tc_for AS treatment_for
FROM
    log_treatments lt
        JOIN
    treatment_classifications tc ON lt.lt_classification = tc.tc_name
        JOIN
    facilities f ON facility_mfl = f.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl AND fac_district = analytic_value
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
GROUP BY f.fac_name , tc.tc_for , tc.tc_name
ORDER BY f.fac_county,fac_district,f.fac_name , tc.tc_for ASC;
WHEN 'facility' THEN
SELECT 
    f.fac_mfl,
    f.fac_name,
    f.fac_district,
    f.fac_county,
    SUM(CASE lt_total
        WHEN NULL THEN 0
        ELSE lt_total
    END) AS total,
    lt_classification AS treatment,
    tc.tc_for AS treatment_for
FROM
    log_treatments lt
        JOIN
    treatment_classifications tc ON lt.lt_classification = tc.tc_name
        JOIN
    facilities f ON facility_mfl = f.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl AND fac_mfl = analytic_value
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
GROUP BY f.fac_name , tc.tc_for , tc.tc_name
ORDER BY f.fac_county,fac_district,f.fac_name , tc.tc_for ASC;
END CASE;
WHEN 'cases' THEN
CASE criteria

WHEN 'national' THEN
SELECT 
    SUM(CASE lt_total
        WHEN NUll THEN 0
        ELSE lt_total
    END) as total,
    lt_classification as treatment,
	tc.tc_for as treatment_for
FROM
    log_treatments lt  JOIN treatment_classifications tc ON lt.lt_classification = tc.tc_name
WHERE
    facility_mfl != '' 
AND facility_mfl IN(SELECT 
            fac_mfl
        FROM
            facilities f JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
		JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type) ) 
group by tc.tc_for , tc.tc_name order by  tc.tc_for;

WHEN 'county' THEN
SELECT 
    SUM(CASE lt_total
        WHEN NUll THEN 0
        ELSE lt_total
    END) as total,
    lt_classification as treatment,
	tc.tc_for as treatment_for
FROM
    log_treatments lt  JOIN treatment_classifications tc ON lt.lt_classification = tc.tc_name
WHERE
    facility_mfl != '' 
AND facility_mfl IN(SELECT 
            fac_mfl
        FROM
            facilities f JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
		JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type) WHERE fac_county = analytic_value ) 
group by tc.tc_for , tc.tc_name order by  tc.tc_for;

WHEN 'district' THEN
SELECT 
    SUM(CASE lt_total
        WHEN NUll THEN 0
        ELSE lt_total
    END) as total,
    lt_classification as treatment,
	tc.tc_for as treatment_for
FROM
    log_treatments lt  JOIN treatment_classifications tc ON lt.lt_classification = tc.tc_name
WHERE
    facility_mfl != '' 
AND facility_mfl IN(SELECT 
            fac_mfl
        FROM
            facilities f JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
		JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type) WHERE fac_district = analytic_value ) 
group by tc.tc_for , tc.tc_name order by  tc.tc_for;
WHEN 'facility' THEN
SELECT 
    SUM(CASE lt_total
        WHEN NUll THEN 0
        ELSE lt_total
    END) as total,
    lt_classification as treatment,
	tc.tc_for as treatment_for
FROM
    log_treatments lt  JOIN treatment_classifications tc ON lt.lt_classification = tc.tc_name
WHERE
    facility_mfl != '' 
AND facility_mfl IN(SELECT 
            fac_mfl
        FROM
            facilities f JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
		JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type) WHERE fac_mfl = analytic_value ) 
group by tc.tc_for , tc.tc_name order by  tc.tc_for;
END CASE;

WHEN 'treatment' THEN
CASE criteria 
WHEN 'national' THEN
SELECT 
    lt_treatments,
    COUNT(lt_treatments) as total_treatment,
    lt_classification as treatment,
    tc.tc_for as treatment_for
FROM
    log_treatments lt
        JOIN
    treatment_classifications tc ON lt.lt_classification = tc.tc_name
WHERE
    lt_treatments != 'n/a'
        AND facility_mfl != ''
        AND facility_mfl IN (SELECT 
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
            survey_categories sc ON (sc.sc_id = ss.sc_id
                AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type))
GROUP BY lt_treatments;
WHEN 'county' THEN
SELECT 
    lt_treatments,
    COUNT(lt_treatments) as total_treatment,
    lt_classification as treatment,
    tc.tc_for as treatment_for
FROM
    log_treatments lt
        JOIN
    treatment_classifications tc ON lt.lt_classification = tc.tc_name
WHERE
    lt_treatments != 'n/a'
        AND facility_mfl != ''
        AND facility_mfl IN (SELECT 
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl AND f.fac_county=analytic_value
                JOIN
            survey_categories sc ON (sc.sc_id = ss.sc_id
                AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type))
GROUP BY lt_treatments;
WHEN 'district' THEN
SELECT 
    lt_treatments,
    COUNT(lt_treatments) as total_treatment,
    lt_classification as treatment,
    tc.tc_for as treatment_for
FROM
    log_treatments lt
        JOIN
    treatment_classifications tc ON lt.lt_classification = tc.tc_name
WHERE
    lt_treatments != 'n/a'
        AND facility_mfl != ''
        AND facility_mfl IN (SELECT 
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl AND f.fac_district=analytic_value
                JOIN
            survey_categories sc ON (sc.sc_id = ss.sc_id
                AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type))
GROUP BY lt_treatments;
WHEN 'facility' THEN
SELECT 
    lt_treatments,
    COUNT(lt_treatments) as total_treatment,
    lt_classification as treatment,
    tc.tc_for as treatment_for
FROM
    log_treatments lt
        JOIN
    treatment_classifications tc ON lt.lt_classification = tc.tc_name
WHERE
    lt_treatments != 'n/a'
        AND facility_mfl != ''
        AND facility_mfl IN (SELECT 
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl AND f.fac_mfl=analytic_value
                JOIN
            survey_categories sc ON (sc.sc_id = ss.sc_id
                AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type))
GROUP BY lt_treatments;
END CASE;

WHEN 'other_treatment' THEN
CASE criteria 
WHEN 'national' THEN
SELECT 
    lt_other_treatments,
    COUNT(lt_other_treatments) as total_treatment,
    lt_classification as treatment,
    tc.tc_for as treatment_for
FROM
    log_treatments lt
        JOIN
    treatment_classifications tc ON lt.lt_classification = tc.tc_name
WHERE
    lt_treatments != 'n/a'
        AND facility_mfl != ''
        AND facility_mfl IN (SELECT 
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
            survey_categories sc ON (sc.sc_id = ss.sc_id
                AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type))
GROUP BY lt_other_treatments;
WHEN 'county' THEN
SELECT 
    lt_other_treatments,
    COUNT(lt_other_treatments) as total_treatment,
    lt_classification as treatment,
    tc.tc_for as treatment_for
FROM
    log_treatments lt
        JOIN
    treatment_classifications tc ON lt.lt_classification = tc.tc_name
WHERE
    lt_treatments != 'n/a'
        AND facility_mfl != ''
        AND facility_mfl IN (SELECT 
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl AND f.fac_county=analytic_value
                JOIN
            survey_categories sc ON (sc.sc_id = ss.sc_id
                AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type))
GROUP BY lt_other_treatments;
WHEN 'district' THEN
SELECT 
    lt_other_treatments,
    COUNT(lt_other_treatments) as total_treatment,
    lt_classification as treatment,
    tc.tc_for as treatment_for
FROM
    log_treatments lt
        JOIN
    treatment_classifications tc ON lt.lt_classification = tc.tc_name
WHERE
    lt_treatments != 'n/a'
        AND facility_mfl != ''
        AND facility_mfl IN (SELECT 
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl AND f.fac_district=analytic_value
                JOIN
            survey_categories sc ON (sc.sc_id = ss.sc_id
                AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type))
GROUP BY lt_other_treatments;
WHEN 'facility' THEN
SELECT 
    lt_other_treatments,
    COUNT(lt_other_treatments) as total_treatment,
    lt_classification as treatment,
    tc.tc_for as treatment_for
FROM
    log_treatments lt
        JOIN
    treatment_classifications tc ON lt.lt_classification = tc.tc_name
WHERE
    lt_treatments != 'n/a'
        AND facility_mfl != ''
        AND facility_mfl IN (SELECT 
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl AND f.fac_mfl=analytic_value
                JOIN
            survey_categories sc ON (sc.sc_id = ss.sc_id
                AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type))
GROUP BY lt_other_treatments;
END CASE;

END CASE;

END$$

DELIMITER ;

