INSERT INTO training_guidelines_n 
(tg_staff,tg_before,tg_after,tg_working,tg_created,guide_code,fac_mfl,ss_id) 
SELECT 'Staff',tg_trained_before_2010,tg_trained_after_2010,tg_working,tg_created,guide_code,fac_mfl,ss_id 
FROM `mnh_live`.training_guidelines ;