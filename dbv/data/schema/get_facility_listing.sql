CREATE DEFINER=`root`@`localhost` PROCEDURE `get_facility_listing`(IN survey_type VARCHAR(45) ,IN survey_category VARCHAR(45), IN county VARCHAR(45))
BEGIN
	DECLARE section VARCHAR(45) DEFAULT NULL;
	CASE survey_category

	WHEN 'baseline' THEN

		CASE survey_type

		WHEN 'mnh' THEN
		SET section='section-6';
		WHEN 'ch' THEN
		SET section='section-6';
		WHEN 'hcw' THEN
		SET section='section-6';

		END CASE;

	WHEN 'mid-term' THEN

		CASE survey_type

		WHEN 'mnh' THEN
		SET section='section-8';
		WHEN 'ch' THEN
		SET section='section-9';
		WHEN 'hcw' THEN
		SET section='section-5';

		END CASE;

	WHEN 'end-term' THEN

		CASE survey_type

		WHEN 'mnh' THEN
		SET section='section-8';
		WHEN 'ch' THEN
		SET section='section-9';
		WHEN 'hcw' THEN
		SET section='section-5';

		END CASE;

	END CASE;

	SELECT 
    f.fac_mfl as 'Facility MFL',
    f.fac_name as 'Facility Name',
    f.fac_level as 'Facility Level',
    f.fac_type as 'Facility Type',
    f.fac_district as 'Facility District',
    f.fac_county as 'Facility County',
    sc.sc_name as 'Survey Category',
    st.st_name as 'Survey Type',
    MAX(ast.ast_section) as 'current_section'
FROM
    facilities f,
    survey_categories sc,
    survey_types st,
    assessment_tracker ast,
    survey_status ss
WHERE
    f.fac_mfl = ast.facilityCode
        AND ss.fac_id = ast.facilityCode
        AND st.st_id = ss.st_id
        AND ss.sc_id = sc.sc_id
        AND f.fac_county = county
        AND st.st_name = survey_type
        AND sc.sc_name = survey_category
GROUP BY f.fac_name
ORDER BY ast.ast_section DESC;
END