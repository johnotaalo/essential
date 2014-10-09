<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Template extends MY_Controller
{
    
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
        $data['head'] = 'mnh/segments/head';
        $data['header'] = 'mnh/segments/header';
        $data['footer'] = 'mnh/segments/footer';
        $data['modals'] = 'mnh/segments/modals';
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
