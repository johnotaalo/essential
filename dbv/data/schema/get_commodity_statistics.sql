CREATE DEFINER=`root`@`localhost` PROCEDURE `get_commodity_statistics`(criteria VARCHAR (45),analytic_value VARCHAR (45),survey_type VARCHAR (45),survey_category VARCHAR(45),commfor VARCHAR(45),commodity_statistic VARCHAR (45))
BEGIN
CASE commodity_statistic

WHEN 'availability_raw' THEN

CASE criteria
WHEN 'national'THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    
    ca.ac_availability,
    c.comm_name,c.comm_unit
FROM
	available_commodities ca
        JOIN
    commodities c ON (ca.comm_code = c.comm_code
        AND c.comm_for = commfor)
        JOIN
    facilities f ON ca.fac_mfl = f.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY ca.fac_mfl,comm_name ASC;

WHEN 'county' THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    
    ca.ac_availability,
    c.comm_name,c.comm_unit
FROM
	available_commodities ca
        JOIN
    commodities c ON (ca.comm_code = c.comm_code
        AND c.comm_for = commfor)
        JOIN
    facilities f ON ca.fac_mfl = f.fac_mfl and fac_county=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY ca.fac_mfl,comm_name ASC;

WHEN 'district' THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    
    ca.ac_availability,
    c.comm_name,c.comm_unit
FROM
	available_commodities ca
        JOIN
    commodities c ON (ca.comm_code = c.comm_code
        AND c.comm_for = commfor)
        JOIN
    facilities f ON ca.fac_mfl = f.fac_mfl AND fac_district=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY ca.fac_mfl,comm_name ASC;

WHEN 'facility' THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    
    ca.ac_availability,
    c.comm_name,c.comm_unit
FROM
	available_commodities ca
        JOIN
    commodities c ON (ca.comm_code = c.comm_code
        AND c.comm_for = commfor)
        JOIN
    facilities f ON ca.fac_mfl = f.fac_mfl AND fac_mfl=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY ca.fac_mfl,comm_name ASC;
END CASE;
WHEN 'supplier_raw' THEN

CASE criteria
WHEN 'national'THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
     s.supplier_name,
    c.comm_name,c.comm_unit
FROM
	available_commodities ca
        JOIN
    suppliers s ON (ca.supplier_code = s.supplier_code)
    JOIN commodities c ON (ca.comm_code=c.comm_code
        AND c.comm_for = commfor)
        JOIN
    facilities f ON ca.fac_mfl = f.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY ca.fac_mfl,comm_name ASC;

WHEN 'county' THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
     s.supplier_name,
    c.comm_name,c.comm_unit
FROM
	available_commodities ca
        JOIN
    suppliers s ON (ca.supplier_code = s.supplier_code)
    JOIN commodities c ON (ca.comm_code=c.comm_code
        AND c.comm_for = commfor)
        JOIN
    facilities f ON ca.fac_mfl = f.fac_mfl AND fac_county=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY ca.fac_mfl,comm_name ASC;

WHEN 'district' THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
     s.supplier_name,
    c.comm_name,c.comm_unit
FROM
	available_commodities ca
        JOIN
    suppliers s ON (ca.supplier_code = s.supplier_code)
    JOIN commodities c ON (ca.comm_code=c.comm_code
        AND c.comm_for = commfor)
        JOIN
    facilities f ON ca.fac_mfl = f.fac_mfl AND fac_district=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY ca.fac_mfl,comm_name ASC;

WHEN 'facility' THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    s.supplier_name,
    c.comm_name,c.comm_unit
FROM
	available_commodities ca
        JOIN
    suppliers s ON (ca.supplier_code = s.supplier_code)
    JOIN commodities c ON (ca.comm_code=c.comm_code
        AND c.comm_for = commfor)
        JOIN
    facilities f ON ca.fac_mfl = f.fac_mfl AND fac_mfl=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY ca.fac_mfl,comm_name ASC;
END CASE;
WHEN 'location_raw' THEN

CASE criteria
WHEN 'national'THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    ca.ac_location,
    c.comm_name,c.comm_unit
FROM
	available_commodities ca
        JOIN
    commodities c ON (ca.comm_code = c.comm_code
        AND c.comm_for = commfor)
        JOIN
    facilities f ON ca.fac_mfl = f.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY ca.fac_mfl,comm_name ASC;

WHEN 'county' THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    ca.ac_location,
    c.comm_name,c.comm_unit
FROM
	available_commodities ca
        JOIN
    commodities c ON (ca.comm_code = c.comm_code
        AND c.comm_for = commfor)
        JOIN
    facilities f ON ca.fac_mfl = f.fac_mfl and fac_county=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY ca.fac_mfl,comm_name ASC;

WHEN 'district' THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    ca.ac_location,
    c.comm_name,c.comm_unit
FROM
	available_commodities ca
        JOIN
    commodities c ON (ca.comm_code = c.comm_code
        AND c.comm_for = commfor)
        JOIN
    facilities f ON ca.fac_mfl = f.fac_mfl AND fac_district=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY ca.fac_mfl,comm_name ASC;

WHEN 'facility' THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    ca.ac_location,
    c.comm_name,c.comm_unit
FROM
	available_commodities ca
        JOIN
    commodities c ON (ca.comm_code = c.comm_code
        AND c.comm_for = commfor)
        JOIN
    facilities f ON ca.fac_mfl = f.fac_mfl AND fac_mfl=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY ca.fac_mfl,comm_name ASC;
END CASE;
WHEN 'unavailability_raw' THEN

CASE criteria
WHEN 'national'THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    ca.ac_reason_unavailable,
    c.comm_name,c.comm_unit
FROM
	available_commodities ca
        JOIN
    commodities c ON (ca.comm_code = c.comm_code
        AND c.comm_for = commfor)
        JOIN
    facilities f ON ca.fac_mfl = f.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY ca.fac_mfl,comm_name ASC;

WHEN 'county' THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    ca.ac_reason_unavailable,
    c.comm_name,c.comm_unit
FROM
	available_commodities ca
        JOIN
    commodities c ON (ca.comm_code = c.comm_code
        AND c.comm_for = commfor)
        JOIN
    facilities f ON ca.fac_mfl = f.fac_mfl and fac_county=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY ca.fac_mfl,comm_name ASC;

WHEN 'district' THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    ca.ac_reason_unavailable,
    c.comm_name,c.comm_unit
FROM
	available_commodities ca
        JOIN
    commodities c ON (ca.comm_code = c.comm_code
        AND c.comm_for = commfor)
        JOIN
    facilities f ON ca.fac_mfl = f.fac_mfl AND fac_district=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY ca.fac_mfl,comm_name ASC;

WHEN 'facility' THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    ca.ac_reason_unavailable,
    c.comm_name,c.comm_unit
FROM
	available_commodities ca
        JOIN
    commodities c ON (ca.comm_code = c.comm_code
        AND c.comm_for = commfor)
        JOIN
    facilities f ON ca.fac_mfl = f.fac_mfl AND fac_mfl=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY ca.fac_mfl,comm_name ASC;
END CASE;
WHEN 'availability' THEN
CASE criteria
WHEN 'national' THEN
SELECT count(ca.ac_Availability) AS total_response,ca.comm_code as commodities,ca.ac_Availability AS frequency, c.comm_name as commodity_name, c.comm_unit as unit FROM available_commodities ca,commodities c
                    WHERE ca.comm_code=c.comm_code AND c.comm_for=commfor AND ca.fac_mfl IN (SELECT fac_mfl FROM facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type))
			GROUP BY ca.comm_code,ca.ac_Availability ORDER BY ca.comm_code ASC; 

WHEN 'county' THEN
SELECT count(ca.ac_Availability) AS total_response,ca.comm_code as commodities,ca.ac_Availability AS frequency, c.comm_name as commodity_name, c.comm_unit as unit FROM available_commodities ca,commodities c
                    WHERE ca.comm_code=c.comm_code AND c.comm_for=commfor AND ca.fac_mfl IN (SELECT fac_mfl FROM facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_county = analytic_value)
                    GROUP BY ca.comm_code,ca.ac_Availability
                    ORDER BY ca.comm_code;
WHEN 'district' THEN
SELECT count(ca.ac_Availability) AS total_response,ca.comm_code as commodities,ca.ac_Availability AS frequency, c.comm_name as commodity_name, c.comm_unit as unit FROM available_commodities ca,commodities c
                    WHERE ca.comm_code=c.comm_code AND c.comm_for=commfor AND ca.fac_mfl IN (SELECT fac_mfl FROM facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type)WHERE fac_district = analytic_value)
                    GROUP BY ca.comm_code,ca.ac_Availability
                    ORDER BY ca.comm_code;
WHEN 'facility' THEN
SELECT count(ca.ac_Availability) AS total_response,ca.comm_code as commodities,ca.ac_Availability AS frequency, c.comm_name as commodity_name, c.comm_unit as unit FROM available_commodities ca,commodities c
                    WHERE ca.comm_code=c.comm_code AND c.comm_for=commfor AND ca.fac_mfl IN (SELECT fac_mfl FROM facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_mfl = analytic_value)
                    GROUP BY ca.comm_code,ca.ac_Availability
                    ORDER BY ca.comm_code;
END CASE;

WHEN 'unavailability' THEN
CASE criteria
WHEN 'national' THEN
SELECT count(ca.ac_reason_unavailable) AS total_response,ca.comm_code as commodities,ca.ac_reason_unavailable AS reason, c.comm_name as commodity_name, c.comm_unit as unit FROM available_commodities ca,commodities c
                    WHERE ca.comm_code=c.comm_code AND c.comm_for = commfor AND ca.fac_mfl IN (SELECT fac_mfl FROM facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type))
                    AND ca.comm_code IN (SELECT comm_code FROM commodities WHERE comm_for=commfor)
                    AND ca.ac_reason_unavailable !='Not Applicable'
                    GROUP BY ca.comm_code,ca.ac_reason_unavailable
                    ORDER BY ca.comm_code,reason ASC;

WHEN 'county' THEN
SELECT count(ca.ac_reason_unavailable) AS total_response,ca.comm_code as commodities,ca.ac_reason_unavailable AS reason, c.comm_name as commodity_name, c.comm_unit as unit FROM available_commodities ca,commodities c
                    WHERE ca.comm_code=c.comm_code AND c.comm_for = commfor AND ca.fac_mfl IN (SELECT fac_mfl FROM facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_county = analytic_value)
                    AND ca.comm_code IN (SELECT comm_code FROM commodities WHERE comm_for=commfor)
                    AND ca.ac_reason_unavailable !='Not Applicable'
                    GROUP BY ca.comm_code,ca.ac_reason_unavailable
                    ORDER BY ca.comm_code,reason ASC;
WHEN 'district' THEN
SELECT count(ca.ac_reason_unavailable) AS total_response,ca.comm_code as commodities,ca.ac_reason_unavailable AS reason, c.comm_name as commodity_name, c.comm_unit as unit FROM available_commodities ca,commodities c
                    WHERE ca.comm_code=c.comm_code AND c.comm_for = commfor AND ca.fac_mfl IN (SELECT fac_mfl FROM facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_district = analytic_value)
                    AND ca.comm_code IN (SELECT comm_code FROM commodities WHERE comm_for=commfor)
                    AND ca.ac_reason_unavailable !='Not Applicable'
                    GROUP BY ca.comm_code,ca.ac_reason_unavailable
                    ORDER BY ca.comm_code,reason ASC;
WHEN 'facility' THEN
SELECT count(ca.ac_reason_unavailable) AS total_response,ca.comm_code as commodities,ca.ac_reason_unavailable AS reason, c.comm_name as commodity_name, c.comm_unit as unit FROM available_commodities ca,commodities c
                    WHERE ca.comm_code=c.comm_code AND c.comm_for = commfor AND ca.fac_mfl IN (SELECT fac_mfl FROM facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_mfl = analytic_value)
                    AND ca.comm_code IN (SELECT comm_code FROM commodities WHERE comm_for=commfor)
                    AND ca.ac_reason_unavailable !='Not Applicable'
                    GROUP BY ca.comm_code,ca.ac_reason_unavailable
                    ORDER BY ca.comm_code,reason ASC;
END CASE;

WHEN 'location' THEN
CASE criteria
WHEN 'national' THEN
SELECT
    count(ca.ac_location) AS total_response,
    ca.comm_code as commodities,
    ca.ac_location AS location,
    c.comm_name as commodity_name, c.comm_unit as unit
FROM
    available_commodities ca,
    commodities c
WHERE
    ca.comm_code = c.comm_code AND c.comm_for=commfor
        AND ca.fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type))
        AND ca.ac_location NOT LIKE '%Not Applicable%'
GROUP BY ca.comm_code , ca.ac_location
ORDER BY ca.comm_code,location ASC;
WHEN 'county' THEN
SELECT
    count(ca.ac_location) AS total_response,
    ca.comm_code as commodities,
    ca.ac_location AS location,
    c.comm_name as commodity_name, c.comm_unit as unit
FROM
    available_commodities ca,
    commodities c
WHERE
    ca.comm_code = c.comm_code AND c.comm_for=commfor
        AND ca.fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_county = analytic_value)
        AND ca.ac_location NOT LIKE '%Not Applicable%'
GROUP BY ca.comm_code , ca.ac_location
ORDER BY ca.comm_code,location ASC;
WHEN 'district' THEN
SELECT
    count(ca.ac_location) AS total_response,
    ca.comm_code as commodities,
    ca.ac_location AS location,
    c.comm_name as commodity_name, c.comm_unit as unit
FROM
    available_commodities ca,
    commodities c
WHERE
    ca.comm_code = c.comm_code AND c.comm_for=commfor
        AND ca.fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_district = analytic_value)
        AND ca.ac_location NOT LIKE '%Not Applicable%'
GROUP BY ca.comm_code , ca.ac_location
ORDER BY ca.comm_code,location ASC;
WHEN 'facility' THEN
SELECT
    count(ca.ac_location) AS total_response,
    ca.comm_code as commodities,
    ca.ac_location AS location,
    c.comm_name as commodity_name, c.comm_unit as unit
FROM
    available_commodities ca,
    commodities c
WHERE
    ca.comm_code = c.comm_code AND c.comm_for=commfor
        AND ca.fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type)WHERE fac_mfl = analytic_value)
        AND ca.ac_location NOT LIKE '%Not Applicable%'
GROUP BY ca.comm_code , ca.ac_location
ORDER BY ca.comm_code,location ASC;
END CASE;

WHEN 'quantity' THEN
CASE criteria
WHEN 'national' THEN
SELECT
    SUM(ca.ac_quantity) AS total_quantity,
    ca.comm_code as commodities,c.comm_name as commodity_name, c.comm_unit as unit
FROM
    available_commodities ca,commodities c
WHERE
c.comm_code=ca.comm_code AND c.comm_for = commfor AND
    ca.fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type))
        AND ca.ac_quantity != - 1
GROUP BY ca.comm_code
ORDER BY ca.comm_code;
WHEN 'county' THEN
SELECT
    SUM(ca.ac_quantity) AS total_quantity,
    ca.comm_code as commodities,c.comm_name as commodity_name, c.comm_unit as unit
FROM
    available_commodities ca,commodities c
WHERE
c.comm_code=ca.comm_code AND c.comm_for = commfor AND
    ca.fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_county = analytic_value)
        AND ca.ac_quantity != - 1
GROUP BY ca.comm_code
ORDER BY ca.comm_code;
WHEN 'district' THEN
SELECT
    SUM(ca.ac_quantity) AS total_quantity,
    ca.comm_code as commodities,c.comm_name as commodity_name, c.comm_unit as unit
FROM
    available_commodities ca,commodities c
WHERE
c.comm_code=ca.comm_code AND c.comm_for = commfor AND
    ca.fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_district = analytic_value)
        AND ca.ac_quantity != - 1
GROUP BY ca.comm_code
ORDER BY ca.comm_code;
WHEN 'facility' THEN
SELECT
    SUM(ca.ac_quantity) AS total_quantity,
    ca.comm_code as commodities,c.comm_name as commodity_name, c.comm_unit as unit
FROM
    available_commodities ca,commodities c
WHERE
c.comm_code=ca.comm_code AND c.comm_for = commfor AND
    ca.fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_mfl = analytic_value)
        AND ca.ac_quantity != - 1
GROUP BY ca.comm_code
ORDER BY ca.comm_code;
END CASE;

WHEN 'supplier' THEN
CASE criteria
WHEN 'national' THEN
SELECT 
    count(supplier_code) AS supplier_name, supplier_code
FROM
    available_commodities ac
        JOIN
    commodities c ON c.comm_code = ac.comm_code
        AND c.comm_for = commfor
        JOIN
    survey_status ss ON ss.fac_id = ac.fac_mfl
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
GROUP BY supplier_code;

WHEN 'county' THEN
SELECT 
    count(supplier_code) AS supplier_name, supplier_code
FROM
    available_commodities ac
        JOIN
    commodities c ON c.comm_code = ac.comm_code
        AND c.comm_for = commfor
        JOIN
    survey_status ss ON ss.fac_id = ac.fac_mfl
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category 
	WHERE fac_county = analytic_value
GROUP BY supplier_code;

WHEN 'district' THEN
SELECT 
    count(supplier_code) AS supplier_name, supplier_code
FROM
    available_commodities ac
        JOIN
    commodities c ON c.comm_code = ac.comm_code
        AND c.comm_for = commfor
        JOIN
    survey_status ss ON ss.fac_id = ac.fac_mfl
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category 
	WHERE fac_district = analytic_value
GROUP BY supplier_code;

WHEN 'facility' THEN
SELECT 
    count(supplier_code) AS supplier_name, supplier_code
FROM
    available_commodities ac
        JOIN
    commodities c ON c.comm_code = ac.comm_code
        AND c.comm_for = commfor
        JOIN
    survey_status ss ON ss.fac_id = ac.fac_mfl
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category 
	WHERE fac_mfl = analytic_value
GROUP BY supplier_code;
END CASE;
END CASE;
END