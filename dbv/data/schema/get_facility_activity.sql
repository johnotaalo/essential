CREATE DEFINER=`root`@`localhost` PROCEDURE `get_facility_activity`(IN survey_type VARCHAR(45),IN survey_category VARCHAR(45))
    DETERMINISTIC
    COMMENT 'Gets Facility Activity Information Per Survey Per Category'
BEGIN
SELECT 
    max(ast_id),
    max(ast_section),
    facilityCode,
    max(ast_last_activity) as ast_last_activity,
    ast.ss_id,
    facilities.fac_name,
    facilities.fac_ownership,
    facilities.fac_district,
    facilities.fac_county
FROM
    assessment_tracker ast
        JOIN
    survey_status ss ON ss.fac_id = ast.facilityCode
        JOIN
    survey_types st ON (st.st_id = ss.st_id
        AND st.st_name = survey_type)
        JOIN
    survey_categories sc ON (ss.sc_id = sc.sc_id
        AND sc.sc_name = survey_category),
    (SELECT 
        fac_mfl as fac_mfl,
            fac_name,
            fac_ownership,
            fac_district,
            fac_county
    FROM
        facilities) as facilities
WHERE
    facilities.fac_mfl = ss.fac_id
GROUP BY facilityCode
ORDER BY ast_last_activity ASC;
END