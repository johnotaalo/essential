CREATE DEFINER=`root`@`localhost` PROCEDURE `get_diarrhoea_statistics`(criteria VARCHAR(45), analytic_value VARCHAR(45), survey_type VARCHAR(45),survey_category VARCHAR(45))
BEGIN

CASE criteria
WHEN 'national' THEN
SELECT 
    sum(ld_number), month
FROM
    log_diarrhoea ld
        JOIN
    facilities f ON ld.fac_mfl = f.fac_mfl
        JOIN
    survey_status ss ON ld.fac_mfl = ss.fac_id
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
GROUP BY month
order by FIELD(month,
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'october',
        'November',
        'December');

WHEN 'county' THEN
SELECT 
    sum(ld_number), month
FROM
    log_diarrhoea ld
        JOIN
    facilities f ON ld.fac_mfl = f.fac_mfl AND fac_county=analytic_value
        JOIN
    survey_status ss ON ld.fac_mfl = ss.fac_id
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
GROUP BY month
order by FIELD(month,
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'october',
        'November',
        'December');

WHEN 'district' THEN
SELECT 
    sum(ld_number), month
FROM
    log_diarrhoea ld
        JOIN
    facilities f ON ld.fac_mfl = f.fac_mfl AND fac_district=analytic_value
        JOIN
    survey_status ss ON ld.fac_mfl = ss.fac_id
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
GROUP BY month
order by FIELD(month,
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'october',
        'November',
        'December');

WHEN 'facility' THEN
SELECT 
    sum(ld_number), month
FROM
    log_diarrhoea ld
        JOIN
    facilities f ON ld.fac_mfl = f.fac_mfl AND fac_mfl=analytic_value
        JOIN
    survey_status ss ON ld.fac_mfl = ss.fac_id
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
GROUP BY month
order by FIELD(month,
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'october',
        'November',
        'December');

END CASE;



END