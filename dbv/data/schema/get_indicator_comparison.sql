CREATE DEFINER=`root`@`localhost` PROCEDURE `get_indicator_comparison`(criteria VARCHAR(45), analytic_value VARCHAR(45), survey_type VARCHAR(45),survey_category VARCHAR(45), indicator_for VARCHAR(45))
BEGIN

CASE criteria
WHEN 'national' THEN
SELECT 
    count(CASE
        WHEN
            li.li_assessorResponse != ''
                && li.li_assessorResponse != 'n/a'
                && li.li_hcwResponse != ''
                && li.li_hcwResponse != 'n/a'
        THEN
            CASE
                WHEN li.li_assessorResponse = li.li_hcwResponse THEN 'correct'
                ELSE 'incorrect'
            END
    END) as total,
    (CASE
        WHEN li.li_assessorResponse = li.li_hcwResponse THEN 'correct'
        ELSE 'incorrect'
    END) as verdict,
    i.indicator_name,
    i.indicator_for
FROM
    log_indicators li
        JOIN
    indicators i ON (li.indicator_code = i.indicator_code
        AND i.indicator_for = indicator_for)
        JOIN
    facilities f ON (li.fac_mfl = f.fac_mfl
        )
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
GROUP BY indicator_name , verdict;
WHEN 'county' THEN
SELECT 
    count(CASE
        WHEN
            li.li_assessorResponse != ''
                && li.li_assessorResponse != 'n/a'
                && li.li_hcwResponse != ''
                && li.li_hcwResponse != 'n/a'
        THEN
            CASE
                WHEN li.li_assessorResponse = li.li_hcwResponse THEN 'correct'
                ELSE 'incorrect'
            END
    END) as total,
    (CASE
        WHEN li.li_assessorResponse = li.li_hcwResponse THEN 'correct'
        ELSE 'incorrect'
    END) as verdict,
    i.indicator_name,
    i.indicator_for
FROM
    log_indicators li
        JOIN
    indicators i ON (li.indicator_code = i.indicator_code
        AND i.indicator_for = indicator_for)
        JOIN
    facilities f ON (li.fac_mfl = f.fac_mfl
       AND fac_county=analytic_value )
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
GROUP BY indicator_name , verdict;
WHEN 'district' THEN
SELECT 
    count(CASE
        WHEN
            li.li_assessorResponse != ''
                && li.li_assessorResponse != 'n/a'
                && li.li_hcwResponse != ''
                && li.li_hcwResponse != 'n/a'
        THEN
            CASE
                WHEN li.li_assessorResponse = li.li_hcwResponse THEN 'correct'
                ELSE 'incorrect'
            END
    END) as total,
    (CASE
        WHEN li.li_assessorResponse = li.li_hcwResponse THEN 'correct'
        ELSE 'incorrect'
    END) as verdict,
    i.indicator_name,
    i.indicator_for
FROM
    log_indicators li
        JOIN
    indicators i ON (li.indicator_code = i.indicator_code
        AND i.indicator_for = indicator_for)
        JOIN
    facilities f ON (li.fac_mfl = f.fac_mfl
       AND fac_district=analytic_value )
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
GROUP BY indicator_name , verdict;
WHEN 'facility' THEN
SELECT 
    count(CASE
        WHEN
            li.li_assessorResponse != ''
                && li.li_assessorResponse != 'n/a'
                && li.li_hcwResponse != ''
                && li.li_hcwResponse != 'n/a'
        THEN
            CASE
                WHEN li.li_assessorResponse = li.li_hcwResponse THEN 'correct'
                ELSE 'incorrect'
            END
    END) as total,
    (CASE
        WHEN li.li_assessorResponse = li.li_hcwResponse THEN 'correct'
        ELSE 'incorrect'
    END) as verdict,
    i.indicator_name,
    i.indicator_for
FROM
    log_indicators li
        JOIN
    indicators i ON (li.indicator_code = i.indicator_code
        AND i.indicator_for = indicator_for)
        JOIN
    facilities f ON (li.fac_mfl = f.fac_mfl
       AND fac_mfl=analytic_value )
        JOIN
    survey_status ss ON ss.fac_id = f.fac_mfl
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (sc.sc_id = ss.sc_id
        AND sc.sc_name = survey_category)
GROUP BY indicator_name , verdict;
END CASE;

END