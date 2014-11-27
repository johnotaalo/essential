UPDATE survey_status s
        JOIN
    survey_categories sc ON s.sc_id = sc.sc_id
        JOIN
    facilities f ON f.fac_mfl = s.fac_id
        JOIN
    survey_types st ON s.st_id = st.st_id 
SET 
    s.sc_id = 1
WHERE
    st.st_name = 'ch'
        AND sc.sc_name = 'mid-term'
        AND f.fac_county = 'Garissa';