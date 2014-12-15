<?php

//include ('c_load.php');
class Facilities extends MY_Controller
{
	function __construct()
	{
		$this->load->model('data_model');
		$this->load->module('export/generate');
	}

	function recreatefacilities()
	{
		$facMFL = '';
		$facilities = $this->data_model->getNoMfls();

		$counter = 0;
		foreach ($facilities as $facility) {
			$fac_id = $facility['id'];
			$fac_name = mysql_real_escape_string($facility['facility_name']);
			$district = $facility['district'];
			$county = mysql_real_escape_string($facility['county']);
			$ownership = $facility['public_or_private'];
			$province = $facility['province'];
			$counter++;
			if($counter < 10)
			{
				$facNo = '000'.$counter;
			}
			else if($counter >= 10 && $counter < 100)
			{
				$facNo = '00' . $counter;
			}
			else
			{
				$facNo = '0' . $counter;
			}
			$facMFL = 'N' . $facNo;

			$insertion = $this->data_model->addFacility($facMFL, $fac_name, $county, $district, $province, $ownership);
			$this->data_model->updatehcw_list($fac_id, $facMFL);
		}
	}

	function recreatesurveystatus(){
		$tables = array("log_indicators" => 'fac_mfl', "log_questions" => 'fac_mfl' , "log_treatment" => 'facility_mfl', "assessment_tracker" => 'facilityCode', "available_commodities" => 'fac_mfl', "available_equipments" => 'fac_mfl', "available_resources" => 'fac_mfl', "available_supplies" => 'fac_mfl', "bemonc_functions" => 'fac_mfl');
		$ssid = '';
		$survey_year = '2013-2014';
		$surveys = $this->data_model->getNossids();
		foreach ($surveys as $survey) {
			$fac_mfl = $survey['facilityCode'];
			$survey_type = $survey['ast_survey'];
			$survey_category = 'baseline';
			$ss_id = $this->newstartSurvey($survey_type, $survey_category, $fac_mfl, $survey_year);

			foreach ($tables as $key => $value) {
				$data = array('ss_id' => $ss_id);

				$this->db->where($value, $fac_mfl);
				$this->db->update($key, $data); 
			}
		}
	}


	function newStartSurvey($survey_type, $survey_category, $fac_mfl, $survey_year)
	{
		$result = $this->db->get_where('survey_types', array('st_name' => $survey_type));
        $result = $result->result_array();
        $survey_type = $result[0]['st_id'];

        $result = $this->db->get_where('survey_categories', array('sc_name' => $survey_category));
        $result = $result->result_array();
        $survey_category = $result[0]['sc_id'];

        $data = array('ss_year' => $survey_year, 'st_id' => $survey_type, 'sc_id' => $survey_category, 'fac_id' => $fac_mfl);

        //echo '<pre>';print_r($data);echo '</pre>';die;
        $count = $this->checkifExists($data, 'survey_status');
        if ($count == 0) {
            $this->db->insert('survey_status', $data);
        } else {
        }

        $result = $this->db->get_where('survey_status', array('ss_year' => $survey_year, 'st_id' => $survey_type, 'sc_id' => $survey_category, 'fac_id' => $fac_mfl));
        $result = $result->result_array();
        $ss_id = $result[0]['ss_id'];
    

       return $ss_id;
   }

	 public function checkifExists($data, $table) {
        $this->db->like($data);
        $this->db->from($table);
        $count = $this->db->count_all_results();
        return (int)$count;
    }

    public function returnSurveyStatus()
    {
    	$completed = array();
    	$mfls = $this->data_model->getNulls();
    	//print_r($mfls);die;
    	$guidelines = $this->data_model->getGuidelines();

    	$tables = array('training_guidelines_n');

    	foreach ($mfls as $mfl) {
    		$tg_id = $mfl['tg_id'];
    		$ssid = $mfl['ss_id'];

    		$result = $this->data_model->updatessid($tg_id, $ssid);
    		if ($result) {
    			$completed['done'][] = $tg_id;
    		}
    		else
    		{
    			$completed['failed'][] = $tg_id;
    		}


    	}

    	echo "<pre>";print_r($completed);die;
    }

    public function generatequestionraw($question_for)
    {
    	$for = 'Certification';
    	switch ($question_for) {
    		case 'certa':
    			$columns = array('Health Care Worker Name', 'Criteria for Certification', 'Response');
    			$datacol =  array('Health Care Worker Name' => 'names_of_participant', 'Criteria for Certification' => 'question_name', 'Response' => 'lq_response');
    			break;
    		case 'certb':
    			$columns = array('Health Care Worker Name', 'Condition Checked', 'Response');
    			$datacol =  array('Health Care Worker Name' => 'names_of_participant', 'Condition Checked' => 'question_name', 'Response' => 'lq_response');
    			break;
    		default:
    			echo "No Data";die;
    			break;
    	}

    	$data['columns'] = $columns;
    	

    	$qCodes = $this->data_model->getQuestionCodes($question_for);

    	foreach ($qCodes as $codes) {
    		$hcws[$codes] = $this->data_model->getHCWs($codes);
    	}

    	$hcw_data = array();
    	$new_array = array();
    	foreach ($hcws as $key => $value) {
    		foreach ($value as $k => $v) {
    			foreach ($datacol as $col => $col_val) {
    				foreach ($v as $var=>$val) {
    					if($var== $col_val)
    					{
    						$new_array[$col] = $val;
    					}
    				}
    			}
    			$hcw_data[] = $new_array;
    		}
    	}

    	$data['data'] = $hcw_data;

    	//$this->generate->generate($data, 'Question Statistics for ' . ucwords($for) . '(' . $question_for . ')', 'dynamic_excel');
    	$hcw_certification = $this->data_model->getSheet();


    	$certification = array('Health Care Worker Name', 'Phone Number', 'Personal Number', 'National ID', 'Year-Month Trained', 'Training Coordinator', 'County Orginal Facility Trained in', 'Current Service Unit', 'Still Working at Original Facility Where Trained', 'Transferred within Same County', 'Transferred to Another County', 'Certification', 'Assessment Outcome');
    	$mydata['columns'] = $certification;
    	$mydata['data'] = $hcw_certification;
    	$this->generate->generate($mydata, 'HCW Certification', 'dynamic_excel');
    }
}
