<?php
class Mnch_Data extends MY_Controller
{
    var $data;
    var $county;
    public function __construct() {
        parent::__construct();
        $this->data = '';
        $this->load->model('data_model');
        
        // $this->load->library('PHPExcel');
        
        //$this -> county = $this -> session -> userdata('county_analytics');
        
        
    }
    public function index() {
    }
    
    /**
     * [getReportingProgress description]
     * @return [type] [description]
     */
    public function getReportingCounties() {
        $results = $this->data_model->getReportingCounties();
        return $results;
    }
}
