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
    
    
}
