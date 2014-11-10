CREATE DEFINER=`root`@`localhost` PROCEDURE `get_equipment_location`(criteria VARCHAR(45), analytic_value VARCHAR(45), survey_type VARCHAR(45), survey_category VARCHAR(45), equipfor VARCHAR(45))
BEGIN


CASE criteria

WHEN 'national' THEN
SELECT 
     eq_code,
   sum(if(ae_location = 'Delivery Room', 1, 0)) as del_values,
   sum(if(ae_location = 'Pharmacy', 1, 0)) as phar_values,
   sum(if(ae_location = 'Store', 1, 0)) as sto_values,
   sum(if(ae_location = 'Other', 1, 0)) as ot_values
   
FROM
    available_equipments ae
WHERE
    ae_location!="N/A" && ae_location!="" && ae.eq_code IN (SELECT 
            eq_code
        FROM
            equipments
        WHERE
            eq_for = equipfor)
        AND ae.fac_mfl IN (SELECT 
            fac_mfl
        FROM
            facilities f JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type) )
GROUP BY ae.eq_code
ORDER BY ae.eq_code ASC;

WHEN 'facility' THEN
SELECT 
     eq_code,
   sum(if(ae_location = 'Delivery Room', 1, 0)) as del_values,
   sum(if(ae_location = 'Pharmacy', 1, 0)) as phar_values,
   sum(if(ae_location = 'Store', 1, 0)) as sto_values,
   sum(if(ae_location = 'Other', 1, 0)) as ot_values
   
FROM
    available_equipments ae
WHERE
    ae_location!="N/A" && ae_location!="" && ae.eq_code IN (SELECT 
            eq_code
        FROM
            equipments
        WHERE
            eq_for = equipfor)
        AND ae.fac_mfl IN (SELECT 
            fac_mfl
        FROM
            facilities f JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type) WHERE fac_mfl = analytic_value)
GROUP BY ae.eq_code
ORDER BY ae.eq_code ASC;

WHEN 'district' THEN
SELECT 
     eq_code,
   sum(if(ae_location = 'Delivery Room', 1, 0)) as del_values,
   sum(if(ae_location = 'Pharmacy', 1, 0)) as phar_values,
   sum(if(ae_location = 'Store', 1, 0)) as sto_values,
   sum(if(ae_location = 'Other', 1, 0)) as ot_values
   
FROM
    available_equipments ae
WHERE
    ae_location!="N/A" && ae_location!="" && ae.eq_code IN (SELECT 
            eq_code
        FROM
            equipments
        WHERE
            eq_for = equipfor)
        AND ae.fac_mfl IN (SELECT 
            fac_mfl
        FROM
            facilities f JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type) WHERE fac_district = analytic_value)
GROUP BY ae.eq_code
ORDER BY ae.eq_code ASC;

WHEN 'county' THEN
SELECT 
     eq_code,
   sum(if(ae_location = 'Delivery Room', 1, 0)) as del_values,
   sum(if(ae_location = 'Pharmacy', 1, 0)) as phar_values,
   sum(if(ae_location = 'Store', 1, 0)) as sto_values,
   sum(if(ae_location = 'Other', 1, 0)) as ot_values
   
FROM
    available_equipments ae
WHERE
    ae_location!="N/A" && ae_location!="" && ae.eq_code IN (SELECT 
            eq_code
        FROM
            equipments
        WHERE
            eq_for = equipfor)
        AND ae.fac_mfl IN (SELECT 
            fac_mfl
        FROM
            facilities f JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type) WHERE fac_county = analytic_value)
GROUP BY ae.eq_code
ORDER BY ae.eq_code ASC;
END CASE;

END