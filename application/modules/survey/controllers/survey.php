<?php
class Survey extends MY_Controller
{
    var $rows, $combined_form, $message;
    
    /**
     * [__construct Constructor Class]
     */
    public function __construct() {
        parent::__construct();
        
        //print var_dump($this->tValue); exit;
        $this->rows = '';
        $this->combined_form;
    }
    
    public function index() {
    }
    
    /**
     * [loadSurvey description]
     * @param  [type] $survey_form [description]
     * @param  [type] $survey_type [description]
     * @return [type]              [description]
     */
    public function load($survey_form, $survey_type) {
        $this->session->unset_userdata('survey_form');
        $this->session->set_userdata('survey_form', $survey_form);

        $this->session->unset_userdata('survey');
        $this->session->set_userdata('survey', $survey_type);

        $this->load->module('survey/form');
        switch ($survey_type) {
            case 'mnh':
                $this->form->get_mnh_form();
                break;

            case 'mch':
                $this->form->get_mch_form();
                break;

            case 'hcw':
                $this->form->get_hcw_form();
                break;
        }
    }
}
