<?php

//error_reporting(1);
ini_set('memory_limit', '-1');

//# Extend CI_Controller to include Doctrine Entity Manager

class MY_Controller extends MX_Controller
{
	public $questions,$indicators,$commodities,$survey,$survey_form, $facilitydetails;

    public function __construct() {
        parent::__construct();
				$this->load->module('export');
				$this->load->module('data_handler/arrays');
        // Load IMCI defaults if one is accessing IMCI
        if($this->uri->segment(1) === 'imci')
        {
            $this->load_imci_defaults();
        }

    }

    public function load_imci_defaults()
    {
        $this->meta_description = 'The Integrated Management of Childhood Infections';
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


   public function createFacilitiesInCounty($county)
    {
        $this->load->model('survey/data_model');
        $facility_combo = '';
        $facilities = $this->data_model->getFacInCounty($county);
        $facility_combo .= '<select name = "facilitieslist"><option value = "">Select a Facility</option>';
        foreach ($facilities as $facility) {
            $facility_combo .= '<option value = "'.$facility['fac_name'].'">'.$facility['fac_name'].'</option>';
        }
        $facility_combo .= '</select>';
        return $facility_combo;
    }

    public function createCounties()
    {
        $this->load->model('survey/data_model');
        $county_combo = '';
        $counties = $this->data_model->getCounties();
        $county_combo .= '<select id = "m_county_choose" name = "counties_select"><option value = "">Select a County</option>';
        foreach ($counties as $county) {
            $county_combo .= '<option value = "'.$county['countyName'].'">'.$county['countyName'].'</option>';
        }
        $county_combo .= '</select>';
        return $county_combo;
    }

    public function createCadre()
    {
         $this->load->model('survey/data_model');
         $cadre_combo = '';
         $cadres = $this->data_model->getCadre();
         $cadre_combo .= '<option value = "">Select a cadre</option>';
         foreach ($cadres as $cadre) {
            $cadre_combo .= '<option value = "'.$cadre['cadre_code'].'">'.$cadre['cadre'].'</option>';
         }

         return $cadre_combo;
    }

    public function createServicePoint()
    {
        $this->load->model('survey/data_model');
        $sp_combo = '';
        $servicepoints = $this->data_model->getServicePoints();
        $sp_combo .= '<option value = "">Select a Service Point</option>';
        foreach ($servicepoints as $servicepoint) {
            $sp_combo .= '<option value = "'.$servicepoint['spoint_code'].'">'.$servicepoint['spoint'].'</option>';
        }
        $sp_combo .= '</select>';

        return $sp_combo;
    }

}
