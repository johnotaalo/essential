<?php
class Data_Model extends MY_Model
{
    /**
     * [__construct description]
     */
    public function __construct() {
        parent::__construct();
        $this->load->model('m_analytics');
    }
    
    /**
     * [getReportingCounties description]
     * @return [type] [description]
     */
    public function getReportingCounties() {
        $this->selectReportingCounties = '';
        $survey = $this->session->userdata('survey');
        
        $this->data_found = $this->m_analytics->getReportingCounties();
        
        //echo "<pre>";print_r($this->data_found);echo "</pre>";die;
        foreach ($this->data_found as $value) {
            $this->selectReportingCounties.= '<option value="' . $value['county'] . '">' . $value['county'] . '</option>' . '<br />';
        }
        
        //var_dump($this -> session -> userdata('allCounties')); exit;
        
        return $this->selectReportingCounties;
    }
}
