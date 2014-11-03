CREATE DEFINER=`root`@`localhost` PROCEDURE `get_treatment_statistics`(criteria VARCHAR(45),analytic_value VARCHAR(45), survey_type VARCHAR(45), survey_category VARCHAR(45), statistic VARCHAR(45))
BEGIN

CASE statistic
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

END