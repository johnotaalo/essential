CREATE DEFINER=`root`@`localhost` PROCEDURE `get_resource_location`(criteria VARCHAR(45), analytic_value VARCHAR(45), survey_type VARCHAR(45), survey_category VARCHAR(45), resourcefor VARCHAR(45))
BEGIN


CASE criteria

WHEN 'national' THEN
SELECT 
     supplier_code,
   sum(if(ar_location = 'OPD', 1, 0)) as opd_values,
   sum(if(ar_location = 'MCH', 1, 0)) as mch_values,
   sum(if(ar_location = 'U5 Clinic', 1, 0)) as clinic_values,
   sum(if(ar_location = 'Ward', 1, 0)) as ward_values,
   sum(if(ar_location = 'Other', 1, 0)) as other_values
   
FROM
    available_resources av
WHERE
    ar_location!="N/A" && ar_location!="" && av.supplier_code IN (SELECT 
            supplier_name
        FROM
            suppliers
        WHERE
            supplier_for = resourcefor)
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
   sum(if(ar_location = 'OPD', 1, 0)) as opd_values,
   sum(if(ar_location = 'MCH', 1, 0)) as mch_values,
   sum(if(ar_location = 'U5 Clinic', 1, 0)) as clinic_values,
   sum(if(ar_location = 'Ward', 1, 0)) as ward_values,
   sum(if(ar_location = 'Other', 1, 0)) as other_values
   
FROM
    available_resources av
WHERE
    ar_location!="N/A" && ar_location!="" && av.supplier_code IN (SELECT 
            supplier_name
        FROM
            suppliers
        WHERE
            supplier_for = resourcefor)
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
   sum(if(ar_location = 'OPD', 1, 0)) as opd_values,
   sum(if(ar_location = 'MCH', 1, 0)) as mch_values,
   sum(if(ar_location = 'U5 Clinic', 1, 0)) as clinic_values,
   sum(if(ar_location = 'Ward', 1, 0)) as ward_values,
   sum(if(ar_location = 'Other', 1, 0)) as other_values
   
FROM
    available_resources av
WHERE
    ar_location!="N/A" && ar_location!="" && av.supplier_code IN (SELECT 
            supplier_name
        FROM
            suppliers
        WHERE
            supplier_for = resourcefor)
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
   sum(if(ar_location = 'OPD', 1, 0)) as opd_values,
   sum(if(ar_location = 'MCH', 1, 0)) as mch_values,
   sum(if(ar_location = 'U5 Clinic', 1, 0)) as clinic_values,
   sum(if(ar_location = 'Ward', 1, 0)) as ward_values,
   sum(if(ar_location = 'Other', 1, 0)) as other_values
   
FROM
    available_resources av
WHERE
   ar_location!="N/A" && ar_location!="" && av.supplier_code IN (SELECT 
            supplier_name
        FROM
            suppliers
        WHERE
            supplier_for = resourcefor)
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