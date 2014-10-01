<?php
class Analytics extends MY_Controller{
    var $data;
    var $county;
    public function __construct() {
        parent::__construct();
        $this->data = '';
        // $this->load->model('m_analytics');
        // $this->load->library('PHPExcel');
        
        //$this -> county = $this -> session -> userdata('county_analytics');
        
        
    }
    public function index(){
       
    }

}