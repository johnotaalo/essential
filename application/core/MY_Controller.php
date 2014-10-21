<?php

error_reporting(1);
ini_set('memory_limit', '-1');

//# Extend CI_Controller to include Doctrine Entity Manager

class MY_Controller extends MX_Controller
{
	public $questions,$indicators,$commodities,$survey,$survey_form;

    public function __construct() {
        parent::__construct();
        
       
// $this->survey_form='';
        // Load IMCI defaults if one is accessing IMCI
        if($this->uri->segment(1) === 'imci')
        {
            $this->load_imci_defaults();
        }

    }
    
    public function load_imci_defaults()
    {
        $this->meta_description = 'The INtegrated Management of Childhood Infections';
        $this->meta_keywords = array('html', 'css', 'javascript', 'bootstrap', 'codeigniter', 'nairobi', 'kenya');
        $this->meta_author = 'HP-Strathmore Lab, Clinton Health Access Initiative, @Biggie_1969';

        $this->nav_brand = 'IMCI Platform';
        $this->nav_brand_title = 'Small sub-title here...';

        $footer_links = array(
            anchor('#', 'About', 'About'),
            anchor('#', 'Contacts', 'Contacts'),
            anchor('#', 'Help', 'Get Help'),
        );
        $this->footer_links = implode(' | ', $footer_links);

        $this->company_name = 'Integrated Management of Childhood Infections';
        $this->company_link_title = 'Link title goes here...';

        $extra_footer_links = array(
            anchor('#', 'Privacy Policy', 'Link title'),
            anchor('#', 'Terms of Use', 'Link title'),
        );
        $this->extra_footer_links = implode(' | ', $extra_footer_links);
    }

    public function imci_template($template, $data)
    {
        $this->load->module('template');
        $this->template->imci($data);
    }

}


