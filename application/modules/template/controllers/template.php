<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Template extends MY_Controller
{
    /*
    Using the template controller
        - Pass the required application Variables
            application_description
            application_keywords
            application_authors

            application_title -> title/page for the particular application
            application_css -> application specific css view having all css
            application_js -> application specific js view having all js
            application_body[] -> the main body of the application. Load an array with your various views and their orders
            application_footer -> application specific footer e.g. @ ApplicationName 2014 | Feedback | Help

        Notes
            - Index handles the essential pages e.g. landing page
    **/
    
    function __construct() {
        parent::__construct();
    }
    
    public function index() {

    }
    
    /**
    * This function loads the IMCI Template
    * @param  array $data Has the various views and settings required by the Template View
    * @return none       This function has no return
    */
    public function imci($data) {
        $this->load->view('template_v', $data);
    }
    
    /**
    * This function loads the MNCH Template
    * @param  array $data Has the various views and settings required by the Template View
    * @return none       This function has no return
    */
    public function mnch($data) {
        $data['application_description'] = 'adsdsasda';
        $data['application_keywords'] = 'adsdsasda';
        $data['application_authors'] = 'adsdsasda';

        $data['application_title'] = 'MNCH';

        $data['application_css'] = 'mnh/segments/application_css';
        $data['application_js'] = 'mnh/segments/application_js';

        $header = 'mnh/segments/header';
        $modals = 'mnh/segments/modals';
        $content = $data['content'];

        $data['application_body']=array($header,$content,$modals);
        $data['application_footer'] = 'mnh/segments/footer';
        
        $data['show_menu'] = 0;
        $data['show_sidemenu'] = 0;

        $this->load->view('template_v', $data);
    }
    
    /**
    * This function loads the Program Monitor Tool Template
    * @param  array $data Has the various views and settings required by the Template View
    * @return none       This function has no return
    */
    public function pmt($data) {
        $this->load->view('template_v', $data);
    }
    
    /**
    * [check_session description]
    * @return [type] [description]
    */
    public function check_session() {
        $current_url = $this->router->class;
        if ($current_url == "recover") {
            return true;
        } else {
            if ($current_url != "login" && $this->session->userdata("id") == null) {
                return false;
            } else if ($current_url == "login" && $this->session->userdata("id") != null) {
                redirect($this->config->item('module_after_login'));
            } else {
                return true;
            }
        }
    }

}
