<?php
class Data_Model extends MY_Model
{
    var $em;
    function __construct() {
        parent::__construct();
        $this->em = $this->doctrine->em;

    }

    function getCheckOptions()
    {
    	$check_options = array();
    	$some_array = array();
    	$query = $this->db->query("SELECT * FROM log_questions_hcw WHERE question_code = 'QHC28' OR question_code = 'QHC29' OR question_code = 'QHC30'");
    	$result = $query->result_array();
    	if($result)
    	{
    		foreach ($result as $value) {
    			$check_options[$value['hcw_id']][] = $value;
    		}

    		$counter = 0;
    		foreach ($check_options as $key => $val) {
    			foreach ($val as $value) {
    				$specific[$key][$value['question_code']] = $value['lq_response']; 
    			}
    		}
    		return $specific;
    	}
    	else
    	{

	    	return $check_options;
	    }
    }

    function getNoMfls()
    {
    	$query = $this->db->query("SELECT * FROM `hcw_list` WHERE `mfl_code` LIKE 'NMFL' GROUP BY facility_name");

    	$query = $query->result_array();

    	return $query;
    }

    function addFacility($mflcode, $fac_name, $county, $district, $province, $ownership)
    {
    	$query = $this->db->query("INSERT INTO facilities (fac_mfl, fac_name, fac_district, fac_county, fac_ownership, fac_province) VALUES('".$mflcode."', '".$fac_name."', '".$district."', '".$county."', '".$ownership."', '".$county."')");

    	if($query)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }

    function updatehcw_list($hcw_id, $mfl)
    {
    	$query = $this->db->query("UPDATE hcw_list SET facility_code = 'updated', mfl_code = '" .$mfl. "' WHERE id = " . $hcw_id);

    	if($query)
    	{
    		echo "Updated mfl: " . $mfl . " <br />"; 
    	}
    	else
    	{
    		echo "Error... ".$mfl."<br />";
    	}
    }

    function getNossids()
    {
        $query = $this->db->query("SELECT DISTINCT(facilityCode), ast_survey FROM assessment_tracker WHERE ss_id IS NULL AND (ast_survey = 'mnh' OR ast_survey = 'ch')");

        $result = $query->result_array();

        return $result;
    }

    function getNulls()
    {
        $query = $this->db->query("SELECT t.tg_id, t.fac_mfl,t.guide_code, s.ss_id, s.st_id, g.guide_for FROM training_guidelines_n t 
            JOIN survey_status s ON t.fac_mfl = s.fac_id
            JOIN guidelines g ON g.guide_code = t.guide_code
            JOIN survey_types st ON st.st_id = s.st_id
            WHERE t.ss_id IS NULL ");

        $result = $query->result_array();

       return $result;
    }

    function getGuidelines()
    {
        $guidelines = array();
        $query = $this->db->query("SELECT guide_code, guide_for FROM guidelines");

        $result = $query->result_array();

        foreach ($result as $guide) {
            if($guide['guide_for'] == 'mnh')
            {
                $guidelines['mnh'][] = $guide['guide_code'];
            }
            else if($guide['guide_for'] == 'ch')
            {
                $guidelines['ch'][] = $guide['guide_code'];
            }
        }

        return $guidelines;
    }

    function updatessid($tg_id, $ss_id)
    {
        $query = $this->db->query("UPDATE training_guidelines_n SET ss_id = " .$ss_id." WHERE tg_id = " .$tg_id );

        if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function getQuestionCodes($qfor)
    {
        $query = $this->db->query("SELECT question_code FROM questions WHERE question_for = '" .$qfor. "'");

        $result = $query->result_array();
        $codes = array();

        foreach ($result as $qcodes) {
            $codes[] = $qcodes['question_code'];
        }

        return $codes;
    }
    
    function getHCWs($code)
    {
        $query = $this->db->query("SELECT h.names_of_participant, q.question_name ,lq.lq_response FROM 
                log_questions_hcw lq
                JOIN hcw_list h ON h.id = lq.hcw_id
                JOIN questions q ON q.question_code = lq.question_code 
                WHERE lq.question_code LIKE '%" . $code . "%'");
        $result = $query->result_array();

        return $result;
    }
    
    function getSheet()
    {
        $questionwp = array('QUC32'=> 'Still Working at Original Facility Where Trained', 'QUC33' => 'Transferred within Same County', 'QUC34' => 'Transferred to Another County');
        $certsa = array('QHC28' => 'Certified', 'QHC29'=>'Recommended for ToT', 'QHC30' => 'Recommended for Mentorship');
        // print_r($questioncodes);die;
        $query = $this->db->query("SELECT 
            h.names_of_participant as 'Health Care Worker Name', 
            h.mobile_number as 'Phone Number',
            h.id as 'Personal Number', 
            h.id_number as 'National ID',
            h.upload_date as 'Year-Month Trained',
            h.operational_status as 'Training Coordinator',
            f.fac_county as 'County Orginal Facility Trained in'

            FROM hcw_list h
            JOIN facilities f ON f.fac_mfl = h.mfl_code
            ");
        $result = $query->result_array();

        $hcw_cerfication = array();
        $hcw_wp = array();
        $service = array();

        $new_array = array();
        foreach ($result as $hcw) {
            $certification = $this->getcerts($hcw['Personal Number']);
            $wp = $this->getwp($hcw['Personal Number']);
            $servicepoints = $this->getserviceunit($hcw['Personal Number']);
            if(count($certification) > 0)
            {
                $valid = array();
                foreach ($certification as $certs) {

                    if($certs['lq_response'] == 'Yes')
                    {
                        $valid[] = $certsa[$certs['question_code']];
                    }
                }
                $ce = implode(',', $valid);
                $hcw_cerfication['Certification'] = $ce;
                //print_r($hcw_cerfication);die;
            }
            else
            {
                foreach ($certsa as $key => $value) {
                    $hcw_cerfication['Certification'] = 'Not Assessed';
                }            
            }

            if(count($wp) > 0)
            {
                foreach ($wp as $c) {
                    $hcw_wp[$questionwp[$c['question_code']]] = $c['lq_response'];
                }

                //print_r($hcw_cerfication);die;
            }
            else
            {
                foreach ($questionwp as $key => $value) {
                    $hcw_wp[$value] = 'Not Assessed';
                }            
            }

            if(count($servicepoints) > 0)
            {
                foreach ($servicepoints as $sp) {
                    $service['Current Service Unit'] = $sp['spoint'];
                }
            }
            else
            {
                $service['Current Service Unit'] = 'Not Assessed';           
            }

            array_push($hcw, $service);
            array_push($hcw, $hcw_wp);
            array_push($hcw, $hcw_cerfication);
            
            $new_array[] = $hcw;
            
        }
        $complete_array = array();

        $last_array = array();
        foreach ($new_array as $key => $value) {
            foreach ($value as $v_key => $v_value) {
                if(is_array($v_value))
                {
                    foreach ($v_value as $k => $val) {
                        $complete_array[$k] = $val;
                    }
                }
                else
                {
                    $complete_array[$v_key] = $v_value;
                }
            }
            $complete_array['Assessment Outcome'] = 'n/a';
            array_push($last_array, $complete_array);

        }

        return $last_array;

    }

    function getcerts($hcw_id)
    {
         $certs = array('QHC28' => 'Certified', 'QHC29'=>'Recommended for Mentorship', 'QHC30' => 'Recommended for TOT');
         $query = $this->db->query("SELECT question_code, lq_response FROM log_questions_hcw WHERE hcw_id = " . $hcw_id . " AND (question_code = 'QHC28' OR question_code = 'QHC29' || question_code = 'QHC30')");

         $result = $query->result_array();

         return $result;
    }

    function getwp($hcw_id)
    {
        $query = $this->db->query("SELECT question_code, lq_response FROM log_questions_hcw WHERE hcw_id = " . $hcw_id . " AND (question_code = 'QUC32' OR question_code = 'QUC33' || question_code = 'QUC34')");
         $result = $query->result_array();

         return $result;
    }

    function getserviceunit($hcw_id)
    {
        $query = $this->db->query("SELECT s.spoint FROM service_point s
            JOIN work_profile wp ON wp.lq_response = s.spoint_code
            WHERE wp.ss_id = " . $hcw_id);
         $result = $query->result_array();

         return $result;
    }

    function getHCWAssessed($county)
    {
        $query = $this->db->query("SELECT COUNT(DISTINCT(t.ast_section)) as sections, h.*, f.* FROM hcw_assessment_tracker t 
        JOIN hcw_list h ON t.hcw_id = h.id
        JOIN facilities f ON f.fac_mfl = h.mfl_code
        WHERE f.fac_county = '".$county."'
        GROUP BY t.hcw_id");

        $result = $query->result_array();

        return $result;
    }

    function getHCWRecommendation($county, $type)
    {
        $types = array('QHC28' => 'Certified', 'QHC29'=>'Mentorship', 'QHC30' => 'TOT');

        foreach ($types as $key => $value) {
            if ($value == $type) {
                $query = $this->db->query("SELECT h.*, f.* FROM facilities f
                    LEFT JOIN hcw_list h ON h.mfl_code = f.fac_mfl
                    JOIN log_questions_hcw q ON q.hcw_id = h.id
                    WHERE f.fac_county = '" . $county ."'
                    AND q.question_code = '".$key."' AND q.lq_response = 'Yes' AND h.activity_id = 10");

                $result = $query->result_array();

            }
        }

        return $result;
    }

    function gettraceresults($county, $type)
    {
        $trace_columns = array('declined' => 'declined_assessment', 'not_traced' => 'cannot_be_traced');
        // print_r($trace_columns);die;

        $query = $this->db->query("SELECT h.*, f.* FROM hcw_list h
        JOIN facilities f ON f.fac_mfl = h.mfl_code
         WHERE ".$trace_columns[$type]." = 'Yes' 
         AND f.fac_county = '".$county."'
         AND h.activity_id = 10");

        $result = $query->result_array();

        return $result;
    }
}
