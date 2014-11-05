CREATE DEFINER=`root`@`localhost` PROCEDURE `get_commodity_usage`(criteria VARCHAR(45), analytic_value VARCHAR(45), survey_type VARCHAR(45), survey_category VARCHAR(45), questionfor VARCHAR(45), statistics VARCHAR(45))
BEGIN
CASE statistics
WHEN 'consumption' THEN
CASE criteria
WHEN 'national' THEN
SELECT 
    SUM(ls.lcso_usage) AS consumption, comm.comm_name
FROM
    log_commodity_stock_outs ls 
		JOIN 
	facilities f ON f.fac_mfl = ls.fac_id
		JOIN 
	survey_status ss ON ss.fac_id = f.fac_mfl
		JOIN
	survey_types st ON st.st_id = ss.st_id AND st.st_name = survey_type
		JOIN
	survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
        JOIN
    commodities comm ON comm.comm_code = ls.comm_id
WHERE comm.comm_for = questionfor
GROUP BY comm.comm_name;
WHEN 'county' THEN
SELECT 
    COUNT(ls.lcso_usage) AS consumption, comm.comm_name
FROM
    log_commodity_stock_outs ls 
		JOIN 
	facilities f ON f.fac_mfl = ls.fac_id
		JOIN 
	survey_status ss ON ss.fac_id = f.fac_mfl
		JOIN
	survey_types st ON st.st_id = ss.st_id AND st.st_name = survey_type
		JOIN
	survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
        JOIN
    commodities comm ON comm.comm_code = ls.comm_id
WHERE comm.comm_for = questionfor AND fac_county = analytic_value
GROUP BY comm.comm_name;
WHEN 'district' THEN
SELECT 
    COUNT(ls.lcso_usage) AS consumption, comm.comm_name
FROM
    log_commodity_stock_outs ls 
		JOIN 
	facilities f ON f.fac_mfl = ls.fac_id
		JOIN 
	survey_status ss ON ss.fac_id = f.fac_mfl
		JOIN
	survey_types st ON st.st_id = ss.st_id AND st.st_name = survey_type
		JOIN
	survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
        JOIN
    commodities comm ON comm.comm_code = ls.comm_id
WHERE comm.comm_for = questionfor AND fac_district = analytic_value
GROUP BY comm.comm_name;
WHEN 'facility' THEN
SELECT 
    COUNT(ls.lcso_usage) AS consumption, comm.comm_name
FROM
    log_commodity_stock_outs ls 
		JOIN 
	facilities f ON f.fac_mfl = ls.fac_id
		JOIN 
	survey_status ss ON ss.fac_id = f.fac_mfl
		JOIN
	survey_types st ON st.st_id = ss.st_id AND st.st_name = survey_type
		JOIN
	survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
        JOIN
    commodities comm ON comm.comm_code = ls.comm_id
WHERE comm.comm_for = questionfor AND fac_mfl = analytic_value
GROUP BY comm.comm_name;
END CASE;

WHEN 'unavailability' THEN
CASE criteria
WHEN 'national' THEN
SELECT 
    count(ls.lcso_unavailable_times) AS frequency,
    ls.lcso_unavailable_times AS unavailable_times,
    ls.comm_id AS commodity_id,
    c.comm_name AS commodity_name
FROM
    log_commodity_stock_outs ls
        JOIN
    commodities c ON (c.comm_code = ls.comm_id
        AND c.comm_for = questionfor)
        JOIN
    facilities f ON (f.fac_mfl = ls.fac_id)
        JOIN
    survey_status ss ON (ss.fac_id = ls.fac_id)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
WHERE ls.lcso_unavailable_times != '' && ls.lcso_unavailable_times != 'n/a'
GROUP BY lcso_unavailable_times , c.comm_name;

WHEN 'county' THEN
SELECT 
    count(ls.lcso_unavailable_times) AS frequency,
    ls.lcso_unavailable_times AS unavailable_times,
    ls.comm_id AS commodity_id,
    c.comm_name AS commodity_name
FROM
    log_commodity_stock_outs ls
        JOIN
    commodities c ON (c.comm_code = ls.comm_id
        AND c.comm_for = questionfor)
        JOIN
    facilities f ON (f.fac_mfl = ls.fac_id)
        JOIN
    survey_status ss ON (ss.fac_id = ls.fac_id)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type )
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category) WHERE fac_county = analytic_value
AND ls.lcso_unavailable_times != '' && ls.lcso_unavailable_times != 'n/a'
GROUP BY lcso_unavailable_times , c.comm_name;

WHEN 'district' THEN
SELECT 
    count(ls.lcso_unavailable_times) AS frequency,
    ls.lcso_unavailable_times AS unavailable_times,
    ls.comm_id AS commodity_id,
    c.comm_name AS commodity_name
FROM
    log_commodity_stock_outs ls
        JOIN
    commodities c ON (c.comm_code = ls.comm_id
        AND c.comm_for = questionfor)
        JOIN
    facilities f ON (f.fac_mfl = ls.fac_id)
        JOIN
    survey_status ss ON (ss.fac_id = ls.fac_id)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type )
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category) WHERE fac_district = analytic_value
AND ls.lcso_unavailable_times != '' && ls.lcso_unavailable_times != 'n/a'
GROUP BY lcso_unavailable_times , c.comm_name;

WHEN 'facility' THEN
SELECT 
    count(ls.lcso_unavailable_times) AS frequency,
    ls.lcso_unavailable_times AS unavailable_times,
    ls.comm_id AS commodity_id,
    c.comm_name AS commodity_name
FROM
    log_commodity_stock_outs ls
        JOIN
    commodities c ON (c.comm_code = ls.comm_id
        AND c.comm_for = questionfor)
        JOIN
    facilities f ON (f.fac_mfl = ls.fac_id)
        JOIN
    survey_status ss ON (ss.fac_id = ls.fac_id)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type )
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category) WHERE fac_mfl = analytic_value
AND ls.lcso_unavailable_times != '' && ls.lcso_unavailable_times != 'n/a'
GROUP BY lcso_unavailable_times , c.comm_name;
END CASE;

WHEN 'reason' THEN
CASE criteria
WHEN 'national' THEN
SELECT 
    ls.lcso_option_on_outage, ls.comm_id, c.comm_name,c.comm_unit,count(*) as total
FROM
    log_commodity_stock_outs ls
        JOIN
    commodities c ON (c.comm_code = ls.comm_id AND c.comm_for = questionfor)
        JOIN
    survey_status ss ON ss.fac_id = ls.fac_id
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
WHERE
    ls.lcso_option_on_outage != ''
        && ls.lcso_option_on_outage != 'N/A'
GROUP BY ls.lcso_option_on_outage , ls.comm_id
ORDER BY ls.lcso_option_on_outage;

WHEN 'county' THEN
SELECT 
    ls.lcso_option_on_outage, ls.comm_id, c.comm_name
FROM
    log_commodity_stock_outs ls
        JOIN
    commodities c ON (c.comm_code = ls.comm_id AND c.comm_for = questionfor)
        JOIN
    survey_status ss ON ss.fac_id = ls.fac_id
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
WHERE fac_county = analytic_value AND
    ls.lcso_option_on_outage != ''
        && ls.lcso_option_on_outage != 'N/A'
GROUP BY ls.lcso_option_on_outage , ls.comm_id
ORDER BY ls.lcso_option_on_outage;

WHEN 'district' THEN
SELECT 
    ls.lcso_option_on_outage, ls.comm_id, c.comm_name
FROM
    log_commodity_stock_outs ls
        JOIN
    commodities c ON (c.comm_code = ls.comm_id AND c.comm_for = questionfor)
        JOIN
    survey_status ss ON ss.fac_id = ls.fac_id
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
WHERE fac_district = analytic_value AND
    ls.lcso_option_on_outage != ''
        && ls.lcso_option_on_outage != 'N/A'
GROUP BY ls.lcso_option_on_outage , ls.comm_id
ORDER BY ls.lcso_option_on_outage;

WHEN 'facility' THEN
SELECT 
    ls.lcso_option_on_outage, ls.comm_id, c.comm_name
FROM
    log_commodity_stock_outs ls
        JOIN
    commodities c ON (c.comm_code = ls.comm_id AND c.comm_for = questionfor)
        JOIN
    survey_status ss ON ss.fac_id = ls.fac_id
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
WHERE fac_mfl = analytic_value AND
    ls.lcso_option_on_outage != ''
        && ls.lcso_option_on_outage != 'N/A'
GROUP BY ls.lcso_option_on_outage , ls.comm_id
ORDER BY ls.lcso_option_on_outage;
END CASE;
END CASE;
END