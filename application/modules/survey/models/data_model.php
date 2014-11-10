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

    function getAssessmentInfo()
    {
    	$sections = array();
    	$query = $this->db->query("SELECT COUNT(DISTINCT(ast_section)) as sections, hcw_id FROM hcw_assessment_tracker GROUP BY hcw_id");

    	$result = $query->result_array();

    	foreach ($result as $value) {
    		$sections[$value['hcw_id']] = $value['sections'];
    	}

    	return $sections;
    }
    
    
}
