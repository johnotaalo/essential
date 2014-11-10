CREATE DEFINER=`root`@`localhost` PROCEDURE `get_resource_statistics`(criteria VARCHAR(45), analytic_value VARCHAR(45), survey_type VARCHAR(45),survey_category VARCHAR(45), equipmentfor VARCHAR(45),resource_statistic VARCHAR(45))
BEGIN
CASE resource_statistic

WHEN 'availability' THEN
CASE criteria
WHEN 'national' THEN

SELECT
    ra.eq_code as equipment,
    equipments.eq_name as resource_name,
    ra.ar_availability AS frequency,
    count(ra.ar_availability) AS total_response
FROM
    available_resources ra
        JOIN
    equipments ON ra.eq_code = equipments.eq_code
WHERE
    ra.fac_mfl IN (SELECT
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
        AND ra.eq_code IN (SELECT
            eq_code
        FROM
            equipments
        WHERE
            eq_for = equipmentfor)
GROUP BY ra.eq_code , ra.ar_availability
ORDER BY ra.eq_code ASC;


WHEN 'county' THEN

SELECT
   ra.eq_code as equipment,
    equipments.eq_name as resource_name,
    ra.ar_availability AS frequency,
    count(ra.ar_availability) AS total_response
FROM
    available_resources ra
        JOIN
    equipments ON ra.eq_code = equipments.eq_code
WHERE
    ra.fac_mfl IN (SELECT
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
                AND st.st_name = survey_type)
                 WHERE fac_county=analytic_value)
        AND ra.eq_code IN (SELECT
            eq_code
        FROM
            equipments
        WHERE
            eq_for = equipmentfor)
GROUP BY ra.eq_code , ra.ar_availability
ORDER BY ra.eq_code ASC;

WHEN 'district' THEN
SELECT
   ra.eq_code as equipment,
    equipments.eq_name as resource_name,
    ra.ar_availability AS frequency,
    count(ra.ar_availability) AS total_response
FROM
    available_resources ra
        JOIN
    equipments ON ra.eq_code = equipments.eq_code
WHERE
    ra.fac_mfl IN (SELECT
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
                AND st.st_name = survey_type)
               WHERE fac_district = analytic_value)
        AND ra.eq_code IN (SELECT
            eq_code
        FROM
            equipments
        WHERE
            eq_for = equipmentfor)
GROUP BY ra.eq_code , ra.ar_availability
ORDER BY ra.eq_code ASC;

WHEN 'facility' THEN
SELECT
   ra.eq_code as equipment,
    equipments.eq_name as resource_name,
    ra.ar_availability AS frequency,
    count(ra.ar_availability) AS total_response
FROM
    available_resources ra
        JOIN
    equipments ON ra.eq_code = equipments.eq_code
WHERE
    ra.fac_mfl IN (SELECT
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
                AND st.st_name = survey_type)
                 WHERE fac_mfl=analytic_value )
        AND ra.eq_code IN (SELECT
            eq_code
        FROM
            equipments
        WHERE
            eq_for = equipmentfor)
GROUP BY ra.eq_code , ra.ar_availability
ORDER BY ra.eq_code ASC;
END CASE;

WHEN 'location' THEN

CASE criteria
WHEN 'national' THEN
SELECT 
count(ea.ar_location) AS total_response,
    ea.eq_code as equipment,
    ea.ar_location AS location, 
    e.eq_name as equipment_name

FROM available_resources ea JOIN equipments e ON (ea.eq_code=e.eq_code AND e.eq_for=equipmentfor) WHERE ea.fac_mfl IN (SELECT fac_mfl FROM
facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
			survey_categories sc ON (sc.sc_id = ss.sc_id 
			AND sc.sc_name = survey_category)
				JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type))
                 
AND ea.ar_location NOT LIKE '%Not Applicable%' GROUP BY ea.eq_code,ea.ar_location ORDER BY ea.eq_code ASC;

WHEN 'county' THEN
SELECT 
count(ea.ar_location) AS total_response,
    ea.eq_code as equipment,
    ea.ar_location AS location, 
    e.eq_name as equipment_name

FROM available_resources ea JOIN equipments e ON (ea.eq_code=e.eq_code AND e.eq_for=equipmentfor) WHERE ea.fac_mfl IN (SELECT fac_mfl FROM
facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON (sc.sc_id = ss.sc_id 
			AND sc.sc_name = survey_category)
				JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type)
                 WHERE fac_county=analytic_value)
        AND ea.ar_location NOT LIKE '%Not Applicable%' GROUP BY ea.eq_code,ea.ar_location ORDER BY ea.eq_code ASC;

WHEN 'district' THEN
SELECT 
count(ea.ar_location) AS total_response,
    ea.eq_code as equipment,
    ea.ar_location AS location, 
    e.eq_name as equipment_name

FROM available_resources ea JOIN equipments e ON (ea.eq_code=e.eq_code AND e.eq_for=equipmentfor) WHERE ea.fac_mfl IN (SELECT fac_mfl FROM
facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON (sc.sc_id = ss.sc_id 
			AND sc.sc_name = survey_category)
				JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type)
                 WHERE fac_district = analytic_value)
        AND ea.ar_location NOT LIKE '%Not Applicable%' GROUP BY ea.eq_code,ea.ar_location ORDER BY ea.eq_code ASC;

WHEN 'facility' THEN
SELECT 
count(ea.ar_location) AS total_response,
    ea.eq_code as equipment,
    ea.ar_location AS location, 
    e.eq_name as equipment_name

FROM available_resources ea JOIN equipments e ON (ea.eq_code=e.eq_code AND e.eq_for=equipmentfor) WHERE ea.fac_mfl IN (SELECT fac_mfl FROM
facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON (sc.sc_id = ss.sc_id 
			AND sc.sc_name = survey_category)
				JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type)
                WHERE fac_mfl=analytic_value)
       AND ea.ar_location NOT LIKE '%Not Applicable%' GROUP BY ea.eq_code,ea.ar_location ORDER BY ea.eq_code ASC;
END CASE;

WHEN 'supplier' THEN
CASE criteria
WHEN 'national' THEN
SELECT 
    COUNT(ar.supplier_code) AS total_response,
    ar.supplier_code AS suppliers,
    s.supplier_code
FROM
    available_resources ar
        JOIN
    suppliers s ON s.supplier_name = ar.supplier_code
        JOIN
    equipments eq ON ar.eq_code = eq.eq_code
        AND eq.eq_for = equipmentfor
        JOIN
    survey_status ss ON ss.fac_id = ar.fac_mfl
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
WHERE
    ar.supplier_code != ''
GROUP BY supplier_code;

WHEN 'county' THEN
SELECT 
    COUNT(ar.supplier_code) AS total_response,
    ar.supplier_code AS suppliers,
    s.supplier_code
FROM
    available_resources ar
        JOIN
	facilities f ON f.fac_mfl = ar.fac_mfl
		JOIN
    suppliers s ON s.supplier_name = ar.supplier_code
        JOIN
    equipments eq ON ar.eq_code = eq.eq_code
        AND eq.eq_for = equipmentfor
        JOIN
    survey_status ss ON ss.fac_id = ar.fac_mfl
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
WHERE fac_county = analytic_value AND
    ar.supplier_code != ''
GROUP BY supplier_code;

WHEN 'district' THEN
SELECT 
    COUNT(ar.supplier_code) AS total_response,
    ar.supplier_code AS suppliers,
    s.supplier_code
FROM
    available_resources ar
		JOIN
	facilities f ON f.fac_mfl = ar.fac_mfl
        JOIN
    suppliers s ON s.supplier_name = ar.supplier_code
        JOIN
    equipments eq ON ar.eq_code = eq.eq_code
        AND eq.eq_for = equipmentfor
        JOIN
    survey_status ss ON ss.fac_id = ar.fac_mfl
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
WHERE fac_district = analytic_value AND
    ar.supplier_code != ''
GROUP BY supplier_code;

WHEN 'facility' THEN
SELECT 
    COUNT(ar.supplier_code) AS total_response,
    ar.supplier_code AS suppliers,
    s.supplier_code
FROM
    available_resources ar
		JOIN
	facilities f ON f.fac_mfl = ar.fac_mfl
        JOIN
    suppliers s ON s.supplier_name = ar.supplier_code
        JOIN
    equipments eq ON ar.eq_code = eq.eq_code
        AND eq.eq_for = equipmentfor
        JOIN
    survey_status ss ON ss.fac_id = ar.fac_mfl
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
WHERE fac_mfl = analytic_value AND
    ar.supplier_code != ''
GROUP BY supplier_code;
END CASE;

WHEN 'mainsource' THEN
CASE criteria
WHEN 'national' THEN
SELECT 
    count(ea.ar_location) AS total_response,
    ea.eq_code as equipment,
    ea.ar_location AS mainSource,
    e.eq_name as equipment_name
FROM
    available_resources ea
        JOIN
    equipments e ON (ea.eq_code = e.eq_code
        AND e.eq_for = equipmentfor)
WHERE
    ea.fac_mfl IN (SELECT 
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
AND ea.ar_location NOT LIKE '%OPD,MCH,U5 Clinic,Ward,Other%'
        AND ea.ar_location NOT LIKE '%Not Applicable%'
		
GROUP BY ea.eq_code , ea.ar_location
ORDER BY ea.eq_code ASC;

WHEN 'county' THEN

SELECT 
    count(ea.ar_location) AS total_response,
    ea.eq_code as equipment,
    ea.ar_location AS mainSource,
    e.eq_name as equipment_name
FROM
    available_resources ea
        JOIN
    equipments e ON (ea.eq_code = e.eq_code
        AND e.eq_for = equipmentfor)
WHERE
    ea.fac_mfl IN (SELECT 
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
                AND st.st_name = survey_type)AND fac_county = analytic_value)
		AND ea.ar_location NOT LIKE '%OPD,MCH,U5 Clinic,Ward,Other%'
        AND ea.ar_location NOT LIKE '%Not Applicable%'

GROUP BY ea.eq_code , ea.ar_location
ORDER BY ea.eq_code ASC;

WHEN 'district' THEN 
SELECT 
    count(ea.ar_location) AS total_response,
    ea.eq_code as equipment,
    ea.ar_location AS mainSource,
    e.eq_name as equipment_name
FROM
    available_resources ea
        JOIN
    equipments e ON (ea.eq_code = e.eq_code
        AND e.eq_for = equipmentfor)
WHERE
    ea.fac_mfl IN (SELECT 
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
                AND st.st_name = survey_type)AND fac_district = analytic_value)
		AND ea.ar_location NOT LIKE '%OPD,MCH,U5 Clinic,Ward,Other%'
        AND ea.ar_location NOT LIKE '%Not Applicable%'

GROUP BY ea.eq_code , ea.ar_location
ORDER BY ea.eq_code ASC;
WHEN 'facility' THEN
SELECT 
    count(ea.ar_location) AS total_response,
    ea.eq_code as equipment,
    ea.ar_location AS mainSource,
    e.eq_name as equipment_name
FROM
    available_resources ea
        JOIN
    equipments e ON (ea.eq_code = e.eq_code
        AND e.eq_for = equipmentfor)
WHERE
    ea.fac_mfl IN (SELECT 
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
                AND st.st_name = survey_type)AND fac_mfl = analytic_value)
		AND ea.ar_location NOT LIKE '%OPD,MCH,U5 Clinic,Ward,Other%'
        AND ea.ar_location NOT LIKE '%Not Applicable%'

GROUP BY ea.eq_code , ea.ar_location
ORDER BY ea.eq_code ASC;

END CASE;
END CASE;
END