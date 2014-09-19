<?php
// error_reporting(1);
ini_set('memory_limit', '-1');

//# Extend CI_Controller to include Doctrine Entity Manager

class MY_Controller extends MX_Controller
{
	public $questions,$indicators,$commodities;

    public function __construct() {
        parent::__construct();
        
        $this->load->module('survey/generate');

    }
    
    }


