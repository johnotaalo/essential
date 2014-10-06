<?php
error_reporting(1);
ini_set('memory_limit', '-1');

//# Extend CI_Controller to include Doctrine Entity Manager

class MY_Controller extends MX_Controller
{
	public $questions,$indicators,$commodities,$survey;

    public function __construct() {
        parent::__construct();
        
        $this->load->module('survey/generate');

    }
/**
 * [template description]
 * @param  [type] $data [description]
 * @return [type]       [description]
 */
    public function template($data) {
        $data['head'] = 'mnh/segments/head';
        $data['header'] = 'mnh/segments/header';
        $data['footer'] = 'mnh/segments/footer';
        $data['modals'] = 'mnh/segments/modals';
        $data['show_menu'] = 0;
        $data['show_sidemenu'] = 0;
        $this->load->module('template');
        $this->template->index($data);
    }
    
    }


