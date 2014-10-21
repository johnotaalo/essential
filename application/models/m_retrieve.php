<?php
/**
 *model to persist data for mnh form
 */

class M_Retrieve extends MY_Model
{

    function __construct() {
        parent::__construct();
         }

    public function retrieveData($table_name,$identifier){
    	$results = $this->db->get_where($table_name,array('ss_id'=>$this->session->userdata('survey_status')));
    	$results = $results->result_array();

    	foreach($results as $result){
    		$data[$result[$identifier]]=$result;
    	}
    	return $data;
    }

}
