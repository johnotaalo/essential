CREATE DEFINER=`root`@`localhost` PROCEDURE `get_bemonc_reason`(criteria VARCHAR(45), analytic_value VARCHAR(45), survey_type VARCHAR(45),survey_category VARCHAR(45))
BEGIN

CASE criteria
WHEN 'national' THEN

SELECT
    count(challenge_code) as total_response,challenge_code as challenge,fac_level as flevel
FROM
    bemonc_functions join
    facilities f ON bemonc_functions.fac_mfl = f.fac_mfl AND f.fac_level!=''
WHERE
challenge_code!="" AND 
    sf_code IN (SELECT
            sf_code
        FROM
            signal_functions)
        AND f.fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type))
GROUP BY challenge_code,f.fac_level
ORDER BY challenge_code;

WHEN 'county' THEN
SELECT
    count(challenge_code) as total_response,challenge_code as challenge,fac_level as flevel
FROM
    bemonc_functions join
    facilities f ON bemonc_functions.fac_mfl = f.fac_mfl AND f.fac_level!=''
WHERE
challenge_code!="" AND 
    sf_code IN (SELECT
            sf_code
        FROM
            signal_functions)
        AND f.fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type))
GROUP BY challenge_code,f.fac_level
ORDER BY challenge_code;

WHEN 'district' THEN
SELECT
    count(challenge_code) as total_response,challenge_code as challenge,fac_level as flevel
FROM
    bemonc_functions join
    facilities f ON bemonc_functions.fac_mfl = f.fac_mfl AND f.fac_level!=''
WHERE
challenge_code!="" AND 
    sf_code IN (SELECT
            sf_code
        FROM
            signal_functions)
        AND f.fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type))
GROUP BY challenge_code,f.fac_level
ORDER BY challenge_code;

WHEN 'facility' THEN
SELECT
    count(challenge_code) as total_response,challenge_code as challenge,fac_level as flevel
FROM
    bemonc_functions join
    facilities f ON bemonc_functions.fac_mfl = f.fac_mfl AND f.fac_level!=''
WHERE
challenge_code!="" AND 
    sf_code IN (SELECT
            sf_code
        FROM
            signal_functions)
        AND f.fac_mfl IN (SELECT
            fac_mfl
        FROM
            facilities f
                JOIN
            survey_status ss ON ss.fac_id = f.fac_mfl
                JOIN
	survey_categories sc ON (sc.sc_id = ss.sc_id AND sc.sc_name = survey_category)
                JOIN
            survey_types st ON (st.st_id = ss.st_id
                AND st.st_name = survey_type))
GROUP BY challenge_code,f.fac_level
ORDER BY challenge_code;

END CASE;

END