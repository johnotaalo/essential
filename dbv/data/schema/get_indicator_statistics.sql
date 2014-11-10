CREATE DEFINER=`root`@`localhost` PROCEDURE `get_indicator_statistics`(criteria VARCHAR(45), analytic_value VARCHAR(45), survey_type VARCHAR(45),survey_category VARCHAR(45), indicatorfor VARCHAR(45),statistic VARCHAR(45))
BEGIN
CASE statistic
WHEN 'response_raw' THEN

CASE criteria
WHEN 'national'THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    (CASE WHEN li.li_response = 'Yes' && li.li_hcwResponse = 'N/A' THEN 'Yes' 
		  WHEN li.li_response = 'No' && li.li_hcwResponse = 'N/A' THEN 'No'
		  WHEN li.li_response = 'N/A' && li.li_hcwResponse = 'Yes' THEN 'Yes' 
		  WHEN li.li_response = 'N/A' && li.li_hcwResponse = 'No' THEN 'No'
		  WHEN li.li_response = '' || li.li_hcwResponse = 'Yes' THEN 'Yes' 
		  WHEN li.li_response = '' || li.li_hcwResponse = 'No' THEN 'No' 
	      WHEN li.li_response = 'Yes' || li.li_hcwResponse = '' THEN 'Yes' 
		  WHEN li.li_response = 'No' || li.li_hcwResponse = '' THEN 'No'END) as response,
    i.indicator_name
FROM
    log_indicators li
        JOIN
    indicators i ON (li.indicator_code = i.indicator_code
        AND i.indicator_for = indicatorfor)
        JOIN
    facilities f ON li.fac_mfl = f.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY li.fac_mfl ASC;

WHEN 'county' THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    (CASE WHEN li.li_response = 'Yes' && li.li_hcwResponse = 'N/A' THEN 'Yes' 
		  WHEN li.li_response = 'No' && li.li_hcwResponse = 'N/A' THEN 'No'
		  WHEN li.li_response = 'N/A' && li.li_hcwResponse = 'Yes' THEN 'Yes' 
		  WHEN li.li_response = 'N/A' && li.li_hcwResponse = 'No' THEN 'No'
		  WHEN li.li_response = '' || li.li_hcwResponse = 'Yes' THEN 'Yes' 
		  WHEN li.li_response = '' || li.li_hcwResponse = 'No' THEN 'No' 
	      WHEN li.li_response = 'Yes' || li.li_hcwResponse = '' THEN 'Yes' 
		  WHEN li.li_response = 'No' || li.li_hcwResponse = '' THEN 'No'END) as response,
    i.indicator_name
FROM
    log_indicators li
        JOIN
    indicators i ON (li.indicator_code = i.indicator_code
        AND i.indicator_for = indicatorfor)
        JOIN
    facilities f ON li.fac_mfl = f.fac_mfl AND fac_county=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY li.fac_mfl ASC;

WHEN 'district' THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    (CASE WHEN li.li_response = 'Yes' && li.li_hcwResponse = 'N/A' THEN 'Yes' 
		  WHEN li.li_response = 'No' && li.li_hcwResponse = 'N/A' THEN 'No'
		  WHEN li.li_response = 'N/A' && li.li_hcwResponse = 'Yes' THEN 'Yes' 
		  WHEN li.li_response = 'N/A' && li.li_hcwResponse = 'No' THEN 'No'
		  WHEN li.li_response = '' || li.li_hcwResponse = 'Yes' THEN 'Yes' 
		  WHEN li.li_response = '' || li.li_hcwResponse = 'No' THEN 'No' 
	      WHEN li.li_response = 'Yes' || li.li_hcwResponse = '' THEN 'Yes' 
		  WHEN li.li_response = 'No' || li.li_hcwResponse = '' THEN 'No'END) as response,
    i.indicator_name
FROM
    log_indicators li
        JOIN
    indicators i ON (li.indicator_code = i.indicator_code
        AND i.indicator_for = indicatorfor)
        JOIN
    facilities f ON li.fac_mfl = f.fac_mfl
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl AND fac_district=analytic_value
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY li.fac_mfl ASC;

WHEN 'facility' THEN
SELECT DISTINCT
    (f.fac_mfl),
    f.fac_name,
    f.fac_district,
    f.fac_county,
    (CASE WHEN li.li_response = 'Yes' && li.li_hcwResponse = 'N/A' THEN 'Yes' 
		  WHEN li.li_response = 'No' && li.li_hcwResponse = 'N/A' THEN 'No'
		  WHEN li.li_response = 'N/A' && li.li_hcwResponse = 'Yes' THEN 'Yes' 
		  WHEN li.li_response = 'N/A' && li.li_hcwResponse = 'No' THEN 'No'
		  WHEN li.li_response = '' || li.li_hcwResponse = 'Yes' THEN 'Yes' 
		  WHEN li.li_response = '' || li.li_hcwResponse = 'No' THEN 'No' 
	      WHEN li.li_response = 'Yes' || li.li_hcwResponse = '' THEN 'Yes' 
		  WHEN li.li_response = 'No' || li.li_hcwResponse = '' THEN 'No'END) as response,
    i.indicator_name
FROM
    log_indicators li
        JOIN
    indicators i ON (li.indicator_code = i.indicator_code
        AND i.indicator_for = indicatorfor)
        JOIN
    facilities f ON li.fac_mfl = f.fac_mfl AND fac_mfl=analytic_value
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
ORDER BY li.fac_mfl ASC;
END CASE;

WHEN 'response' THEN
CASE criteria
WHEN 'national' THEN

SELECT 
    i.indicator_name,
    i.indicator_code,
    li.li_response,
    li.li_hcwResponse,
	(CASE WHEN li.li_response = 'Yes' && li.li_hcwResponse = 'N/A' THEN 'Yes' 
		  WHEN li.li_response = 'No' && li.li_hcwResponse = 'N/A' THEN 'No'
		  WHEN li.li_response = 'N/A' && li.li_hcwResponse = 'Yes' THEN 'Yes' 
		  WHEN li.li_response = 'N/A' && li.li_hcwResponse = 'No' THEN 'No'
		  WHEN li.li_response = '' || li.li_hcwResponse = 'Yes' THEN 'Yes' 
		  WHEN li.li_response = '' || li.li_hcwResponse = 'No' THEN 'No' 
	      WHEN li.li_response = 'Yes' || li.li_hcwResponse = '' THEN 'Yes' 
		  WHEN li.li_response = 'No' || li.li_hcwResponse = '' THEN 'No'END) as response,
	
    COUNT(IF(li_hcwResponse != ''
            || li_hcwResponse != 'n/a'
            || li.li_response != ''
            || li_response = 'n/a',
        1,
        0)) as total_response
FROM
    log_indicators li
        JOIN
    indicators i ON li.indicator_code = i.indicator_code
        AND i.indicator_for = indicatorfor
        JOIN
    survey_status ss ON ss.fac_id = li.fac_mfl
        JOIN
    facilities f ON f.fac_mfl = li.fac_mfl
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
WHERE
    li.li_response != ''
        || li.li_hcwResponse != ''
        && li.li_response != 'n/a'
        || li.li_hcwResponse != 'n/a'
GROUP BY li.indicator_code,response
ORDER BY response DESC;

WHEN 'county' THEN
SELECT 
    i.indicator_name,
    i.indicator_code,
    li.li_response,
    li.li_hcwResponse,
	(CASE WHEN li.li_response = 'Yes' && li.li_hcwResponse = 'N/A' THEN 'Yes' 
		  WHEN li.li_response = 'No' && li.li_hcwResponse = 'N/A' THEN 'No'
		  WHEN li.li_response = 'N/A' && li.li_hcwResponse = 'Yes' THEN 'Yes' 
		  WHEN li.li_response = 'N/A' && li.li_hcwResponse = 'No' THEN 'No'
		  WHEN li.li_response = '' || li.li_hcwResponse = 'Yes' THEN 'Yes' 
		  WHEN li.li_response = '' || li.li_hcwResponse = 'No' THEN 'No' 
	      WHEN li.li_response = 'Yes' || li.li_hcwResponse = '' THEN 'Yes' 
		  WHEN li.li_response = 'No' || li.li_hcwResponse = '' THEN 'No'END) as response,
	
    COUNT(IF(li_hcwResponse != ''
            || li_hcwResponse != 'n/a'
            || li.li_response != ''
            || li_response = 'n/a',
        1,
        0)) as total_response
FROM
    log_indicators li
        JOIN
    indicators i ON li.indicator_code = i.indicator_code
        AND i.indicator_for = indicatorfor
        JOIN
    survey_status ss ON ss.fac_id = li.fac_mfl
        JOIN
    facilities f ON f.fac_mfl = li.fac_mfl
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
WHERE
    li.li_response != ''
        || li.li_hcwResponse != ''
        && li.li_response != 'n/a'
        || li.li_hcwResponse != 'n/a'
AND fac_county = analytic_value
GROUP BY li.indicator_code,response
ORDER BY response DESC;

WHEN 'district' THEN

SELECT 
    i.indicator_name,
    i.indicator_code,
    li.li_response,
    li.li_hcwResponse,
	(CASE WHEN li.li_response = 'Yes' && li.li_hcwResponse = 'N/A' THEN 'Yes' 
		  WHEN li.li_response = 'No' && li.li_hcwResponse = 'N/A' THEN 'No'
		  WHEN li.li_response = 'N/A' && li.li_hcwResponse = 'Yes' THEN 'Yes' 
		  WHEN li.li_response = 'N/A' && li.li_hcwResponse = 'No' THEN 'No'
		  WHEN li.li_response = '' || li.li_hcwResponse = 'Yes' THEN 'Yes' 
		  WHEN li.li_response = '' || li.li_hcwResponse = 'No' THEN 'No' 
	      WHEN li.li_response = 'Yes' || li.li_hcwResponse = '' THEN 'Yes' 
		  WHEN li.li_response = 'No' || li.li_hcwResponse = '' THEN 'No'END) as response,
	
    COUNT(IF(li_hcwResponse != ''
            || li_hcwResponse != 'n/a'
            || li.li_response != ''
            || li_response = 'n/a',
        1,
        0)) as total_response
FROM
    log_indicators li
        JOIN
    indicators i ON li.indicator_code = i.indicator_code
        AND i.indicator_for = indicatorfor
        JOIN
    survey_status ss ON ss.fac_id = li.fac_mfl
        JOIN
    facilities f ON f.fac_mfl = li.fac_mfl
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
WHERE
    li.li_response != ''
        || li.li_hcwResponse != ''
        && li.li_response != 'n/a'
        || li.li_hcwResponse != 'n/a'
AND fac_district = analytic_value
GROUP BY li.indicator_code,response
ORDER BY response DESC;

WHEN 'facility' THEN

SELECT 
    i.indicator_name,
    i.indicator_code,
    li.li_response,
    li.li_hcwResponse,
	(CASE WHEN li.li_response = 'Yes' && li.li_hcwResponse = 'N/A' THEN 'Yes' 
		  WHEN li.li_response = 'No' && li.li_hcwResponse = 'N/A' THEN 'No'
		  WHEN li.li_response = 'N/A' && li.li_hcwResponse = 'Yes' THEN 'Yes' 
		  WHEN li.li_response = 'N/A' && li.li_hcwResponse = 'No' THEN 'No'
		  WHEN li.li_response = '' || li.li_hcwResponse = 'Yes' THEN 'Yes' 
		  WHEN li.li_response = '' || li.li_hcwResponse = 'No' THEN 'No' 
	      WHEN li.li_response = 'Yes' || li.li_hcwResponse = '' THEN 'Yes' 
		  WHEN li.li_response = 'No' || li.li_hcwResponse = '' THEN 'No'END) as response,
	
    COUNT(IF(li_hcwResponse != ''
            || li_hcwResponse != 'n/a'
            || li.li_response != ''
            || li_response = 'n/a',
        1,
        0)) as total_response
FROM
    log_indicators li
        JOIN
    indicators i ON li.indicator_code = i.indicator_code
        AND i.indicator_for = indicatorfor
        JOIN
    survey_status ss ON ss.fac_id = li.fac_mfl
        JOIN
    facilities f ON f.fac_mfl = li.fac_mfl
        JOIN
    survey_types st ON st.st_id = ss.st_id
        AND st.st_name = survey_type
        JOIN
    survey_categories sc ON sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category
WHERE
    li.li_response != ''
        || li.li_hcwResponse != ''
        && li.li_response != 'n/a'
        || li.li_hcwResponse != 'n/a'
 AND fac_mfl = analytic_value
GROUP BY li.indicator_code,response
ORDER BY response DESC;
END CASE;

WHEN 'findings' THEN
CASE criteria
WHEN 'national' THEN
SELECT count(li.li_hcwFindings) AS total_response,
       li.indicator_code as indicators,
       li.li_hcwFindings AS frequency, 
       i.indicator_name as indicator_name

    FROM log_indicators li,indicators i
		WHERE li.li_hcwFindings!=''
          AND li.indicator_code=i.indicator_code 
           AND i.indicator_for=indicatorfor 
            AND li.fac_mfl IN (SELECT fac_mfl FROM facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type))
			GROUP BY li.indicator_code,li.li_hcwFindings 
            ORDER BY li.indicator_code ASC;

WHEN 'county' THEN
SELECT count(li.li_hcwFindings) AS total_response,
       li.indicator_code as indicators,
       li.li_hcwFindings AS frequency, 
       i.indicator_name as indicator_name

    FROM log_indicators li,indicators i
		WHERE li.li_hcwFindings!=''
          AND li.indicator_code=i.indicator_code 
           AND i.indicator_for=indicatorfor 
            AND li.fac_mfl IN (SELECT fac_mfl FROM facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_county = analytic_value)
			GROUP BY li.indicator_code,li.li_hcwFindings 
            ORDER BY li.indicator_code ASC;
WHEN 'district' THEN
SELECT count(li.li_hcwFindings) AS total_response,
       li.indicator_code as indicators,
       li.li_hcwFindings AS frequency, 
       i.indicator_name as indicator_name

    FROM log_indicators li,indicators i
		WHERE li.li_hcwFindings!=''
          AND li.indicator_code=i.indicator_code 
           AND i.indicator_for=indicatorfor 
            AND li.fac_mfl IN (SELECT fac_mfl FROM facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_district = analytic_value)
			GROUP BY li.indicator_code,li.li_hcwFindings 
            ORDER BY li.indicator_code ASC;
WHEN 'facility' THEN
SELECT count(li.li_hcwFindings) AS total_response,
       li.indicator_code as indicators,
       li.li_hcwFindings AS frequency, 
       i.indicator_name as indicator_name

    FROM log_indicators li,indicators i
		WHERE li.li_hcwFindings!=''
          AND li.indicator_code=i.indicator_code 
           AND i.indicator_for=indicatorfor 
            AND li.fac_mfl IN (SELECT fac_mfl FROM facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
				JOIN
			survey_categories sc ON sc.sc_id = ss.sc_id AND sc.sc_name = survey_category
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type) WHERE fac_mfl = analytic_value)
			GROUP BY li.indicator_code,li.li_hcwFindings 
            ORDER BY li.indicator_code ASC;
END CASE;

END CASE;
END