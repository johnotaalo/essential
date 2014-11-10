CREATE DEFINER=`root`@`localhost` PROCEDURE `get_commodity_location`(criteria VARCHAR(45), analytic_value VARCHAR(45), survey_type VARCHAR(45), survey_category VARCHAR(45), supplyfor VARCHAR(45))
BEGIN


CASE criteria

WHEN 'national' THEN
SELECT 
     supplier_code,
   sum(if(ac_location = 'Pharmacy', 1, 0)) as phar_values,
   sum(if(ac_location = 'Store', 1, 0)) as sto_values,
   sum(if(ac_location = 'Delivery Room', 1, 0)) as del_values,
   sum(if(ac_location = 'Other', 1, 0)) as ot_values
   
FROM
    available_commodities av
WHERE
    av.supplier_code IN (SELECT 
            supplier_code
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
GROUP BY av.supplier_code
ORDER BY av.supplier_code ASC;

WHEN 'facility' THEN
SELECT 
     supplier_code,
   sum(if(ac_location = 'Pharmacy', 1, 0)) as phar_values,
   sum(if(ac_location = 'Store', 1, 0)) as sto_values,
   sum(if(ac_location = 'Delivery Room', 1, 0)) as del_values,
   sum(if(ac_location = 'Other', 1, 0)) as ot_values
   
FROM
    available_commodities av
WHERE
    av.supplier_code IN (SELECT 
            supplier_code
        FROM
            supplies
        WHERE
            supplier_for = supplyfor)
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
GROUP BY av.supplier_code
ORDER BY av.supplier_code ASC;

WHEN 'district' THEN
SELECT 
     supplier_code,
   sum(if(ac_location = 'Pharmacy', 1, 0)) as phar_values,
   sum(if(ac_location = 'Store', 1, 0)) as sto_values,
   sum(if(ac_location = 'Delivery Room', 1, 0)) as del_values,
   sum(if(ac_location = 'Other', 1, 0)) as ot_values
   
FROM
    available_commodities av
WHERE
    av.supplier_code IN (SELECT 
            supplier_code
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
GROUP BY av.supplier_code
ORDER BY av.supplier_code ASC;

WHEN 'county' THEN
SELECT 
     supplier_code,
   sum(if(ac_location = 'Pharmacy', 1, 0)) as phar_values,
   sum(if(ac_location = 'Store', 1, 0)) as sto_values,
   sum(if(ac_location = 'Delivery Room', 1, 0)) as del_values,
   sum(if(ac_location = 'Other', 1, 0)) as ot_values
   
FROM
    available_commodities av
WHERE
    av.supplier_code IN (SELECT 
            supplier_code
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
GROUP BY av.supplier_code
ORDER BY av.supplier_code ASC;

END CASE;

END