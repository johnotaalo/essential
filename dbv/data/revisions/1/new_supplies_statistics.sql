USE `mnh_live`;
DROP procedure IF EXISTS `get_supplies_statistics`;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_supplies_statistics`(criteria VARCHAR(45), analytic_value VARCHAR(45), survey_type VARCHAR(45), survey_category VARCHAR(45),supplyfor VARCHAR(45),supplies_statistic VARCHAR(45))
BEGIN
CASE supplies_statistic
WHEN 'availability_raw' THEN

CASE criteria
WHEN 'national'THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    
    sa.as_availability,
    s.supply_name,s.supply_unit
FROM
	available_supplies sa
        JOIN
    supplies s ON (sa.supply_code = s.supply_code
        AND s.supply_for = supplyfor)
        JOIN
    facilities f ON sa.fac_mfl = f.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY sa.fac_mfl,supply_name ASC;

WHEN 'county' THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    
    sa.as_availability,
    s.supply_name,s.supply_unit
FROM
	available_supplies sa
        JOIN
    supplies s ON (sa.supply_code = s.supply_code
        AND s.supply_for = supplyfor)
        JOIN
    facilities f ON sa.fac_mfl = f.fac_mfl and fac_county=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY sa.fac_mfl,supply_name ASC;

WHEN 'district' THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    
    sa.as_availability,
    s.supply_name,s.supply_unit
FROM
	available_supplies sa
        JOIN
    supplies s ON (sa.supply_code = s.supply_code
        AND s.supply_for = supplyfor)
        JOIN
    facilities f ON sa.fac_mfl = f.fac_mfl AND fac_district=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY sa.fac_mfl,supply_name ASC;

WHEN 'facility' THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    
    sa.as_availability,
    s.supply_name,s.supply_unit
FROM
	available_supplies sa
        JOIN
    supplies s ON (sa.supply_code = s.supply_code
        AND s.supply_for = supplyfor)
        JOIN
    facilities f ON sa.fac_mfl = f.fac_mfl AND fac_mfl=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY sa.fac_mfl,supply_name ASC;
END CASE;
WHEN 'supplier_raw' THEN

CASE criteria
WHEN 'national'THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
     sp.supplier_name,
    s.supply_name,s.supply_unit
FROM
	available_supplies sa
        JOIN
    suppliers sp ON (sa.supplier_code = sp.supplier_code)
    JOIN supplies s ON (sa.supply_code=s.supply_code
        AND s.supply_for = supplyfor)
        JOIN
    facilities f ON sa.fac_mfl = f.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY sa.fac_mfl,supply_name ASC;

WHEN 'county' THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
     sp.supplier_name,
    s.supply_name,s.supply_unit
FROM
	available_supplies sa
        JOIN
    suppliers sp ON (sa.supplier_code = sp.supplier_code)
    JOIN supplies s ON (sa.supply_code=s.supply_code
        AND s.supply_for = supplyfor)
        JOIN
    facilities f ON sa.fac_mfl = f.fac_mfl AND fac_county=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY sa.fac_mfl,supply_name ASC;

WHEN 'district' THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
     sp.supplier_name,
    s.supply_name,s.supply_unit
FROM
	available_supplies sa
        JOIN
    suppliers sp ON (sa.supplier_code = sp.supplier_code)
    JOIN supplies s ON (sa.supply_code=s.supply_code
        AND s.supply_for = supplyfor)
        JOIN
    facilities f ON sa.fac_mfl = f.fac_mfl AND fac_district=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY sa.fac_mfl,supply_name ASC;

WHEN 'facility' THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    sp.supplier_name,
    s.supply_name,s.supply_unit
FROM
	available_supplies sa
        JOIN
    suppliers sp ON (sa.supplier_code = sp.supplier_code)
    JOIN supplies s ON (sa.supply_code=s.supply_code
        AND s.supply_for = supplyfor)
        JOIN
    facilities f ON sa.fac_mfl = f.fac_mfl AND fac_mfl=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY sa.fac_mfl,supply_name ASC;
END CASE;
WHEN 'location_raw' THEN

CASE criteria
WHEN 'national'THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    sa.as_location,
    s.supply_name,s.supply_unit
FROM
	available_supplies sa
        JOIN
    supplies s ON (sa.supply_code = s.supply_code
        AND s.supply_for = supplyfor)
        JOIN
    facilities f ON sa.fac_mfl = f.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY sa.fac_mfl,supply_name ASC;

WHEN 'county' THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    sa.as_location,
    s.supply_name,s.supply_unit
FROM
	available_supplies sa
        JOIN
    supplies s ON (sa.supply_code = s.supply_code
        AND s.supply_for = supplyfor)
        JOIN
    facilities f ON sa.fac_mfl = f.fac_mfl and fac_county=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY sa.fac_mfl,supply_name ASC;

WHEN 'district' THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    sa.as_location,
    s.supply_name,s.supply_unit
FROM
	available_supplies sa
        JOIN
    supplies s ON (sa.supply_code = s.supply_code
        AND s.supply_for = supplyfor)
        JOIN
    facilities f ON sa.fac_mfl = f.fac_mfl AND fac_district=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY sa.fac_mfl,supply_name ASC;

WHEN 'facility' THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    sa.as_location,
    s.supply_name,s.supply_unit
FROM
	available_supplies sa
        JOIN
    supplies s ON (sa.supply_code = s.supply_code
        AND s.supply_for = supplyfor)
        JOIN
    facilities f ON sa.fac_mfl = f.fac_mfl AND fac_mfl=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY sa.fac_mfl,supply_name ASC;
END CASE;
WHEN 'availability' THEN

CASE criteria
WHEN 'national' THEN
SELECT
    count(sq.as_availability) AS total_response,
    sq.supply_code as supplies,
    sq.as_availability AS frequency,
	s.supply_name

FROM
    available_supplies sq,
    supplies s
WHERE
    sq.supply_code = s.supply_code
        AND sq.fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON(sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type))
        AND sq.supply_code IN (SELECT
            supply_code
        FROM
            supplies
        WHERE
            supply_for = supplyfor)
GROUP BY sq.supply_code , sq.as_availability
ORDER BY sq.supply_code;
WHEN 'county' THEN
SELECT
    count(sq.as_availability) AS total_response,
    sq.supply_code as supplies,
    sq.as_availability AS frequency,
	s.supply_name
FROM
    available_supplies sq,
    supplies s
WHERE
    sq.supply_code = s.supply_code
        AND sq.fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON(sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_county=analytic_value)
        AND sq.supply_code IN (SELECT
            supply_code
        FROM
            supplies
        WHERE
            supply_for = supplyfor)
GROUP BY sq.supply_code , sq.as_availability
ORDER BY sq.supply_code;
WHEN 'district' THEN

SELECT
    count(sq.as_availability) AS total_response,
    sq.supply_code as supplies,
    sq.as_availability AS frequency,
	s.supply_name
FROM
    available_supplies sq,
    supplies s
WHERE
    sq.supply_code = s.supply_code
        AND sq.fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON(sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_district = analytic_value)
        AND sq.supply_code IN (SELECT
            supply_code
        FROM
            supplies
        WHERE
            supply_for = supplyfor)
GROUP BY sq.supply_code , sq.as_availability
ORDER BY sq.supply_code;
WHEN 'facility' THEN
SELECT
    count(sq.as_availability) AS total_response,
    sq.supply_code as supplies,
    sq.as_availability AS frequency,
	s.supply_name
FROM
    available_supplies sq,
    supplies s
WHERE
    sq.supply_code = s.supply_code
        AND sq.fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON(sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_mfl=analytic_value)
        AND sq.supply_code IN (SELECT
            supply_code
        FROM
            supplies
        WHERE
            supply_for = supplyfor)
GROUP BY sq.supply_code , sq.as_availability
ORDER BY sq.supply_code;
END CASE;

WHEN 'location' THEN

CASE criteria
WHEN 'national' THEN

SELECT
    count(sq.as_location) AS total_response,
    sq.supply_code as supplies,
    sq.as_location AS location,
	s.supply_name
FROM
    available_supplies sq
	JOIN supplies s ON (sq.supply_code = s.supply_code AND s.supply_for=supplyfor)
WHERE
    sq.fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON(sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type))
       
        AND sq.as_location NOT LIKE '%Not Applicable%'
GROUP BY sq.supply_code , sq.as_location
ORDER BY sq.supply_code ASC;

WHEN 'county' THEN

SELECT
    count(sq.as_location) AS total_response,
    sq.supply_code as supplies,
    sq.as_location AS locations,
	s.supply_name
FROM
    available_supplies sq
	JOIN supplies s ON (sq.supply_code = s.supply_code AND s.supply_for=supplyfor)
WHERE
    sq.fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON(sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_county=analytic_value)
        
        AND sq.as_location NOT LIKE '%Not Applicable%'
GROUP BY sq.supply_code , sq.as_location
ORDER BY sq.supply_code ASC;
WHEN 'district' THEN
SELECT
    count(sq.as_location) AS total_response,
    sq.supply_code as supplies,
    sq.as_location AS location,
	s.supply_name
FROM
    available_supplies sq
	JOIN supplies s ON (sq.supply_code = s.supply_code AND s.supply_for=supplyfor)
WHERE
    sq.fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON(sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_district=analytic_value)
        
        AND sq.as_location NOT LIKE '%Not Applicable%'
GROUP BY sq.supply_code , sq.as_location
ORDER BY sq.supply_code ASC;
WHEN 'facility' THEN
SELECT
    count(sq.as_location) AS total_response,
    sq.supply_code as supplies,
    sq.as_location AS location,
	s.supply_name
FROM
    available_supplies sq
	JOIN supplies s ON (sq.supply_code = s.supply_code AND s.supply_for=supplyfor)
WHERE
    sq.fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON(sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_mfl = analytic_value)
        AND sq.as_location NOT LIKE '%Not Applicable%'
GROUP BY sq.supply_code , sq.as_location
ORDER BY sq.supply_code ASC;

END CASE;

WHEN 'supplier' THEN
CASE criteria
WHEN 'national' THEN
SELECT 
    count(a_s.supplier_code) AS total_response,
    s.supplier_code AS supply_code,
    s.supplier_name AS supply_name
FROM
    available_supplies a_s
        JOIN
    facilities f ON f.fac_mfl = a_s.fac_mfl
        JOIN
    suppliers s ON a_s.supplier_code = s.supplier_name
        AND s.supplier_for = supplyfor
        JOIN
    survey_status ss ON ss.fac_id = a_s.fac_mfl
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
WHERE
    a_s.supplier_code != ''
        && a_s.supplier_code != 'N/A'
GROUP BY a_s.supplier_code , s.supplier_name;

WHEN 'county' THEN
SELECT 
    count(a_s.supplier_code) AS total_response,
    s.supplier_code AS supply_code,
    s.supplier_name AS supply_name
FROM
    available_supplies a_s
        JOIN
    facilities f ON f.fac_mfl = a_s.fac_mfl
        JOIN
    suppliers s ON a_s.supplier_code = s.supplier_name
        AND s.supplier_for = supplyfor
        JOIN
    survey_status ss ON ss.fac_id = a_s.fac_mfl
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
WHERE f.fac_county = analytic_value AND
    a_s.supplier_code != ''
        && a_s.supplier_code != 'N/A'
GROUP BY a_s.supplier_code , s.supplier_name;

WHEN 'district' THEN
SELECT 
    count(a_s.supplier_code) AS total_response,
    s.supplier_code AS supply_code,
    s.supplier_name AS supply_name
FROM
    available_supplies a_s
        JOIN
    facilities f ON f.fac_mfl = a_s.fac_mfl
        JOIN
    suppliers s ON a_s.supplier_code = s.supplier_name
        AND s.supplier_for = supplyfor
        JOIN
    survey_status ss ON ss.fac_id = a_s.fac_mfl
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
WHERE f.fac_district = analytic_value AND
    a_s.supplier_code != ''
        && a_s.supplier_code != 'N/A'
GROUP BY a_s.supplier_code , s.supplier_name;

WHEN 'facility' THEN
SELECT 
    count(a_s.supplier_code) AS total_response,
    s.supplier_code AS supply_code,
    s.supplier_name AS supply_name
FROM
    available_supplies a_s
        JOIN
    facilities f ON f.fac_mfl = a_s.fac_mfl
        JOIN
    suppliers s ON a_s.supplier_code = s.supplier_name
        AND s.supplier_for = supplyfor
        JOIN
    survey_status ss ON ss.fac_id = a_s.fac_mfl
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
WHERE f.fac_mfl = analytic_value AND
    a_s.supplier_code != ''
        && a_s.supplier_code != 'N/A'
GROUP BY a_s.supplier_code , s.supplier_name;
END CASE;
END CASE;
END$$

DELIMITER ;

