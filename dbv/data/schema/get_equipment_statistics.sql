CREATE DEFINER=`root`@`localhost` PROCEDURE `get_equipment_statistics`(criteria VARCHAR(45), analytic_value VARCHAR(45), survey_type VARCHAR(45), survey_category VARCHAR(45), equipmentfor VARCHAR(45),equipment_statistic VARCHAR(45))
BEGIN
CASE equipment_statistic

WHEN 'availability' THEN
CASE criteria
WHEN 'national' THEN

SELECT count(ea.ae_availability) AS total_response,
                      ea.eq_code as equipment,
              ea.ae_availability AS frequency, 
                       e.eq_name as equipment_name 
   FROM available_equipments ea JOIN equipments e ON (ea.eq_code=e.eq_code AND e.eq_for=equipmentfor) WHERE ea.fac_mfl IN (SELECT fac_mfl FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN 
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type)) 
GROUP BY ea.eq_code,ea.ae_availability ORDER BY ea.eq_code ASC;

WHEN 'county' THEN

SELECT count(ea.ae_availability) AS total_response,ea.eq_code as equipment,ea.ae_availability AS frequency, e.eq_name as equipment_name FROM available_equipments ea JOIN equipments e ON (ea.eq_code=e.eq_code AND e.eq_for=equipmentfor) WHERE ea.fac_mfl IN (SELECT fac_mfl FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN 
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_county=analytic_value) 
GROUP BY ea.eq_code,ea.ae_availability ORDER BY ea.eq_code ASC;

WHEN 'district' THEN
SELECT count(ea.ae_availability) AS total_response,ea.eq_code as equipment,ea.ae_availability AS frequency, e.eq_name as equipment_name FROM available_equipments ea JOIN equipments e ON (ea.eq_code=e.eq_code AND e.eq_for=equipmentfor) WHERE ea.fac_mfl IN (SELECT fac_mfl FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN 
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_county = analytic_value) 
GROUP BY ea.eq_code,ea.ae_availability ORDER BY ea.eq_code ASC;

WHEN 'facility' THEN
SELECT 
count(ea.ae_availability) AS total_response,
ea.eq_code as equipment,
ea.ae_availability AS frequency, 
e.eq_name as equipment_name 
FROM available_equipments ea JOIN equipments e ON (ea.eq_code=e.eq_code AND e.eq_for=equipmentfor) WHERE ea.fac_mfl IN (SELECT fac_mfl FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN 
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_mfl=analytic_value) 
GROUP BY ea.eq_code,ea.ae_availability ORDER BY ea.eq_code ASC;
END CASE;

WHEN 'location' THEN

CASE criteria
WHEN 'national' THEN
SELECT 
count(ea.ae_location) AS total_response,
ea.eq_code as equipment,
ea.ae_location AS location, 
e.eq_name as equipment_name

FROM available_equipments ea JOIN equipments e ON (ea.eq_code=e.eq_code AND e.eq_for=equipmentfor) WHERE ea.fac_mfl IN (SELECT fac_mfl FROM
facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN 
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type))
                 
AND ea.ae_location NOT LIKE '%Not Applicable%' GROUP BY ea.eq_code,ea.ae_location ORDER BY ea.eq_code ASC;

WHEN 'county' THEN
SELECT count(ea.ae_location) AS total_response,ea.eq_code as equipment,ea.ae_location AS location, e.eq_name as equipment_name
FROM available_equipments ea JOIN equipments e ON (ea.eq_code=e.eq_code AND e.eq_for=equipmentfor) WHERE ea.fac_mfl IN (SELECT fac_mfl FROM
facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN 
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_county=analytic_value)
                 
AND ea.ae_location NOT LIKE '%Not Applicable%' GROUP BY ea.eq_code,ea.ae_location ORDER BY ea.eq_code ASC;
WHEN 'district' THEN
SELECT count(ea.ae_location) AS total_response,ea.eq_code as equipment,ea.ae_location AS location, e.eq_name as equipment_name
FROM available_equipments ea JOIN equipments e ON (ea.eq_code=e.eq_code AND e.eq_for=equipmentfor) WHERE ea.fac_mfl IN (SELECT fac_mfl FROM
facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN 
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_district=analytic_value)
                 
AND ea.ae_location NOT LIKE '%Not Applicable%' GROUP BY ea.eq_code,ea.ae_location ORDER BY ea.eq_code ASC;
WHEN 'facility' THEN
SELECT count(ea.ae_location) AS total_response,ea.eq_code as equipment,ea.ae_location AS location, e.eq_name as equipment_name
FROM available_equipments ea JOIN equipments e ON (ea.eq_code=e.eq_code AND e.eq_for=equipmentfor) WHERE ea.fac_mfl IN (SELECT fac_mfl FROM
facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN 
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_mfl=analytic_value)
                 
AND ea.ae_location NOT LIKE '%Not Applicable%' GROUP BY ea.eq_code,ea.ae_location ORDER BY ea.eq_code ASC;
END CASE;

WHEN 'functionality' THEN

CASE criteria
WHEN 'national' THEN
SELECT ea.eq_code as equipment,SUM(ea.ae_fully_functional) AS total_functional,SUM(ea.ae_non_functional) AS total_non_functional, e.eq_name as equipment_name FROM available_equipments ea JOIN equipments e ON (ea.eq_code=e.eq_code AND e.eq_for=equipmentfor)
WHERE ea.fac_mfl IN (SELECT fac_mfl FROM facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN 
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type))

AND ea.ae_fully_functional !=-1 AND ea.ae_non_functional !=-1
GROUP BY ea.eq_code
ORDER BY ea.eq_code ASC;
WHEN 'county' THEN
SELECT ea.eq_code as equipment,SUM(ea.ae_fully_functional) AS total_functional,SUM(ea.ae_non_functional) AS total_non_functional, e.eq_name as equipment_name FROM available_equipments ea JOIN equipments e ON (ea.eq_code=e.eq_code AND e.eq_for=equipmentfor)
WHERE ea.fac_mfl IN (SELECT fac_mfl FROM facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN 
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_county=analytic_value)

AND ea.ae_fully_functional !=-1 AND ea.ae_non_functional !=-1
GROUP BY ea.eq_code
ORDER BY ea.eq_code ASC;
WHEN 'district' THEN
SELECT ea.eq_code as equipment,SUM(ea.ae_fully_functional) AS total_functional,SUM(ea.ae_non_functional) AS total_non_functional, e.eq_name as equipment_name FROM available_equipments ea JOIN equipments e ON (ea.eq_code=e.eq_code AND e.eq_for=equipmentfor)
WHERE ea.fac_mfl IN (SELECT fac_mfl FROM facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN 
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_district=analytic_value)

AND ea.ae_fully_functional !=-1 AND ea.ae_non_functional !=-1
GROUP BY ea.eq_code
ORDER BY ea.eq_code ASC;
WHEN 'facility' THEN
SELECT ea.eq_code as equipment,SUM(ea.ae_fully_functional) AS total_functional,SUM(ea.ae_non_functional) AS total_non_functional, e.eq_name as equipment_name FROM available_equipments ea JOIN equipments e ON (ea.eq_code=e.eq_code AND e.eq_for=equipmentfor)
WHERE ea.fac_mfl IN (SELECT fac_mfl FROM facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN 
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_mfl=analytic_value)

AND ea.ae_fully_functional !=-1 AND ea.ae_non_functional !=-1
GROUP BY ea.eq_code
ORDER BY ea.eq_code ASC;
END CASE;

END CASE;
END