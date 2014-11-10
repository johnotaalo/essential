CREATE DEFINER=`root`@`localhost` PROCEDURE `get_supplies_location`(criteria VARCHAR(45), analytic_value VARCHAR(45), survey_type VARCHAR(45), survey_category VARCHAR(45), supplyfor VARCHAR(45))
BEGIN


CASE criteria

WHEN 'national' THEN
SELECT 
     supply_code,
   sum(if(as_location = 'Pharmacy', 1, 0)) as phar_values,
   sum(if(as_location = 'Store', 1, 0)) as sto_values,
   sum(if(as_location = 'Delivery Room', 1, 0)) as del_values,
   sum(if(as_location = 'Other', 1, 0)) as ot_values
   
FROM
    available_supplies av
WHERE
    av.supply_code IN (SELECT 
            supply_code
        FROM
            supplies
        WHERE
            supply_for = supplyfor)
        AND av.fac_mfl IN (SELECT 
            fac_mfl
        FROM
            facilities f JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type) )
GROUP BY av.supply_code
ORDER BY av.supply_code ASC;

WHEN 'facility' THEN
SELECT 
     supply_code,
   sum(if(as_location = 'Pharmacy', 1, 0)) as phar_values,
   sum(if(as_location = 'Store', 1, 0)) as sto_values,
   sum(if(as_location = 'Delivery Room', 1, 0)) as del_values,
   sum(if(as_location = 'Other', 1, 0)) as ot_values
   
FROM
    available_supplies av
WHERE
    av.supply_code IN (SELECT 
            supply_code
        FROM
            supplies
        WHERE
            supply_for = supplyfor)
        AND av.fac_mfl IN (SELECT 
            fac_mfl
        FROM
            facilities f JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type) WHERE fac_mfl = analytic_value)
GROUP BY av.supply_code
ORDER BY av.supply_code ASC;

WHEN 'district' THEN
SELECT 
     supply_code,
   sum(if(as_location = 'Pharmacy', 1, 0)) as phar_values,
   sum(if(as_location = 'Store', 1, 0)) as sto_values,
   sum(if(as_location = 'Delivery Room', 1, 0)) as del_values,
   sum(if(as_location = 'Other', 1, 0)) as ot_values
   
FROM
    available_supplies av
WHERE
    av.supply_code IN (SELECT 
            supply_code
        FROM
            supplies
        WHERE
            supply_for = supplyfor)
        AND av.fac_mfl IN (SELECT 
            fac_mfl
        FROM
            facilities f JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type) WHERE fac_district = analytic_value)
GROUP BY av.supply_code
ORDER BY av.supply_code ASC;

WHEN 'county' THEN
SELECT 
     supply_code,
   sum(if(as_location = 'Pharmacy', 1, 0)) as phar_values,
   sum(if(as_location = 'Store', 1, 0)) as sto_values,
   sum(if(as_location = 'Delivery Room', 1, 0)) as del_values,
   sum(if(as_location = 'Other', 1, 0)) as ot_values
   
FROM
    available_supplies av
WHERE
    av.supply_code IN (SELECT 
            supply_code
        FROM
            supplies
        WHERE
            supply_for = supplyfor)
        AND av.fac_mfl IN (SELECT 
            fac_mfl
        FROM
            facilities f JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type) WHERE fac_county = analytic_value)
GROUP BY av.supply_code
ORDER BY av.supply_code ASC;

END CASE;

END