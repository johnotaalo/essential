CREATE DEFINER=`root`@`localhost` PROCEDURE `get_delivery_reasons`(criteria VARCHAR(45), analytic_value VARCHAR(45), survey_type VARCHAR(45), survey_category VARCHAR(45))
BEGIN


CASE criteria

WHEN 'national' THEN
SELECT 
     question_code,
   sum(if(lq_reason = 'Inadequate skill,', 1, 0)) as skill,
   sum(if(lq_reason = 'Inadequate staff,', 1, 0)) as staff,
   sum(if(lq_reason = 'Inadequate infrastructure,', 1, 0)) as infrastructure,
   sum(if(lq_reason = 'Inadequate Equipment,', 1, 0)) as equipment,
   sum(if(lq_reason = 'Inadequate commodities and supplies,', 1, 0)) as commodities,
   sum(if(lq_reason = 'Other (Please specify),', 1, 0)) as other
   
FROM
    log_questions ae
WHERE
    lq_reason!="N/A" && lq_reason!="" && ae.question_code = 'QMNH200'
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
GROUP BY ae.question_code
ORDER BY ae.question_code ASC;


WHEN 'facility' THEN
SELECT 
     question_code,
   sum(if(lq_reason = 'Inadequate skill,', 1, 0)) as skill,
   sum(if(lq_reason = 'Inadequate staff,', 1, 0)) as staff,
   sum(if(lq_reason = 'Inadequate infrastructure,', 1, 0)) as infrastructure,
   sum(if(lq_reason = 'Inadequate Equipment,', 1, 0)) as equipment,
   sum(if(lq_reason = 'Inadequate commodities and supplies,', 1, 0)) as commodities,
   sum(if(lq_reason = 'Other (Please specify),', 1, 0)) as other
   
FROM
    log_questions ae
WHERE
    lq_reason!="N/A" && lq_reason!="" && ae.question_code = 'QMNH200'
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
GROUP BY ae.question_code
ORDER BY ae.question_code ASC;

WHEN 'district' THEN
SELECT 
     question_code,
   sum(if(lq_reason = 'Inadequate skill,', 1, 0)) as skill,
   sum(if(lq_reason = 'Inadequate staff,', 1, 0)) as staff,
   sum(if(lq_reason = 'Inadequate infrastructure,', 1, 0)) as infrastructure,
   sum(if(lq_reason = 'Inadequate Equipment,', 1, 0)) as equipment,
   sum(if(lq_reason = 'Inadequate commodities and supplies,', 1, 0)) as commodities,
   sum(if(lq_reason = 'Other (Please specify),', 1, 0)) as other
   
FROM
    log_questions ae
WHERE
    lq_reason!="N/A" && lq_reason!="" && ae.question_code = 'QMNH200'
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
GROUP BY ae.question_code
ORDER BY ae.question_code ASC;

WHEN 'county' THEN
SELECT 
     question_code,
   sum(if(lq_reason = 'Inadequate skill,', 1, 0)) as skill,
   sum(if(lq_reason = 'Inadequate staff,', 1, 0)) as staff,
   sum(if(lq_reason = 'Inadequate infrastructure,', 1, 0)) as infrastructure,
   sum(if(lq_reason = 'Inadequate Equipment,', 1, 0)) as equipment,
   sum(if(lq_reason = 'Inadequate commodities and supplies,', 1, 0)) as commodities,
   sum(if(lq_reason = 'Other (Please specify),', 1, 0)) as other
   
FROM
    log_questions ae
WHERE
    lq_reason!="N/A" && lq_reason!="" && ae.question_code = 'QMNH200'
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
GROUP BY ae.question_code
ORDER BY ae.question_code ASC;
END CASE;

END