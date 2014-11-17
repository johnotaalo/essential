<?php
/*helps authenticate a user*/
class Auth extends MY_Controller {
    var $data;
    public function __construct() {
        parent::__construct();
        $this->data='';
        $this->load->model('data_model');
        $this->load->module('template');
    }
    public function go(){

        $result=$this->data_model->verifyRespondedByDistrict();
        if ($result['found']=='true') {
        //$this->m_zinc_ors_inventory->retrieveMFLInformation();
            // $this->facilityInDistrict=$this->m_mnh_survey->districtFacilities;
            // $this->createFacilitiesListSection();
            $assessment = $this->input->post('assessment');
            $category = $this->input->post('term');
            // echo $category;die;
            if($assessment=='Child Health'){
                $assessment='ch';
            }
            elseif($assessment=='Maternal and Neonatal Health'){
                $assessment='mnh';
            }
            else{
                $assessment='hcw';
            }
            /*create session data*/
            if(!$category)
            {
                $category = 'all';
            }
            // echo $category;die;
            $newdata = array('dName' => $result['name'],'dCode'=>$result['id'],'survey'=>$assessment,'survey_category'=>$category);
        //var_dump($newdata); exit;
        $this -> session -> set_userdata($newdata);
            // redirect(base_url().'mnch/assessment', 'refresh');
            $this->data['content']='mnh/pages/v_survey_main';
            $this->data['logged']='Yes';
            $this->data['title']='MoH::Data Management Tool';
            $this->template->mnch($this->data);
        }else {
            if($this->input->post('assessment') == 'IMCI Follow-Up')
            {
                if($this->input->post('usercode') == '123456')
                {
                    $category = 'all';
                    $newdata = array('county' => $this->input->post('county'),'survey'=>'hcw','survey_category'=>$category);
                    $this -> session -> set_userdata($newdata);

                    $this->data['content']='mnh/pages/v_survey_main';
                    $this->data['logged']='Yes';
                    $this->data['title']='MoH::Data Management Tool';
                    $this->template->mnch($this->data);
                }
            }
            else
            {
                #use an ajax request and not a whole refresh
                $data['title']='MoH::Data Management Tool';
                //die('Failed');
                $this->data['login_message'] = 'Invalid District and Password Combination!';
                $this->data['survey'] = '';
                $this -> data['content'] = 'mnh/pages/v_login';
                //$this -> load -> view('index', $this->data); //login view
                $this->template->mnch($this -> data);
            }
        }
    }
public function doCheckFacilityCode(){/**from the session data*/
    if(!$this -> session -> userdata('dName')){
        redirect(base_url() . '/assessment', 'refresh');
        return true;
        }else{
            $this->requestMFC();
            return false;
        }
    }
private function requestMFC(){
        #use an ajax request and not a whole refresh
            $this->data['form'] = '<p>Facility Identification Required!<p>';
            $this->data['title']='MoH Data Management Tool::Authentication';
            $this -> load -> view('pages/v_login', $this->data);
}
    public function logout(){
        //$data['facility']=$this ->selectFacility;
        $data['title']='MoH::Data Management Tool';
        $data['content']='mnh/pages/v_home';
        $this->session->sess_destroy();
        $this->template->mnch($data);
        redirect(base_url(), 'refresh');
    }
}
