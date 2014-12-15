<?php
class Survey extends MY_Controller
{
    var $rows, $combined_form, $message, $data;

    /**
     * [__construct Constructor Class]
     */
    public function __construct() {
        parent::__construct();

        //print var_dump($this->tValue); exit;
        $this->rows = '';
        $this->combined_form;
        $this->load->model('data_model');
        $this->load->module('template');
        $this->load->module('export/generate');
    }

    public function index() {
    }

    /**
     * [active_survey description]
     * @return [type] [description]
     */
    public function active_survey() {
        $this->data['content'] = 'mnh/pages/v_login';
        if (!$this->session->userdata('dCode')) {

            // $data['facility']=$this ->selectFacility;
            $this->data['title'] = 'MoH Data Management Tool::Authentication';
            $this->data['form'] = '<p>User Login<p>';
            $this->data['login_response'] = '';
            $this->data['login_message'] = 'Login to Take Survey';
            $this->data['survey'] = strtoupper($this->survey);

            // print_r($this->data);
            //$this -> load -> view('index', $this->data); //login view
            $this->template->mnch($this->data);
        } else {
            $this->inventory();
        }
    }

    /**
     * [loadSection description]
     * @param  [type] $survey [description]
     * @return [type]         [description]
     */
    public function loadSection($survey) {
        switch ($survey) {
            case 'mnh':

                //$sectionNames = array('Facility Information', 'Facility Data And Maternal And Neotanal Service Delivery', 'Guidelines, Job Aid and Tools Availability', 'Staff Training', 'Commodity Availability', 'Commodity  Usage', 'Equipment Availability and Functionality', 'Supplies Availability', 'Resources Availability', 'Community Strategy');
                $sectionNames = array('Facility Information', 'Facility Data And Maternal And Neotanal Service Delivery', 'Guidelines, Job Aid and Tools Availability', 'Staff Training', 'Commodity Availability', 'Commodity  Usage', 'Equipment Availability and Functionality', 'Community Strategy');
                $sections = 8;
                break;

            case 'ch':
                $sectionNames = array('Facility Information', 'Guidelines,Job Aids and Tools', 'Case Management', 'Commodity & Bundling', 'ORT Corner Assessment', 'Equipment Availability and Status', 'Supplies Availability', 'Resources Availability', 'Community Strategy');
                $sections = 9;
                break;

            case 'hcw':
                $sectionNames = array('Facility,HCW and Work Station Information', 'Observation of Case Management: One Case per HCW', 'Does the HCW Check for the Following Conditions', 'Consultation and Exit Interviews', 'Certification');
                $sections = 5;
                break;

            default:
                break;
        }
        for ($x = 1; $x <= $sections; $x++) {
            $stringLength = strlen($sectionNames[$x - 1]);
            $class = ($stringLength>50)?'ui step two line':'ui step';
            $sectionList.= '<div class="'.$class.'" '.$strLength.'data-section="' . $x . '">'.$x .':'. $sectionNames[$x - 1] . '</div>';
        }
        echo json_encode($sectionList);
    }

    function returnnosections($survey)
    {
        switch ($survey) {
            case 'mnh':

                //$sectionNames = array('Facility Information', 'Facility Data And Maternal And Neotanal Service Delivery', 'Guidelines, Job Aid and Tools Availability', 'Staff Training', 'Commodity Availability', 'Commodity  Usage', 'Equipment Availability and Functionality', 'Supplies Availability', 'Resources Availability', 'Community Strategy');
                $sections = 8;
                break;

            case 'ch':
                $sections = 9;
                break;

            case 'hcw':
                $sections = 5;
                break;

            default:
                break;
        }

        echo $sections;
    }
    /**
     * [inventory description]
     * @return [type] [description]
     */
    public function inventory() {
        if ($this->session->userdata('dCode')) {
            $this->data['survey'] = $this->survey;
            $this->data['hidden'] = "display:none";
            $this->data['status'] = "";
            $this->data['response'] = "";
            $this->data['form'] = '<div class="error ui-autocomplete-loading" style="width:200px;height:76px"><br/><br/>Loading...please wait.<br/><br/></div>';
            if ($this->session->userdata('survey') == 'mnh') {
                $this->data['title'] = strtoupper($this->session->userdata('survey')) . '::Commodity, Equipment and Supplies Assessment';
            } elseif ($this->session->userdata('survey') == 'hcw') {
                $this->data['title'] = strtoupper($this->session->userdata('survey')) . '::Follow-Up Tool After IMCI Training';
            } else {
                $this->data['title'] = strtoupper($this->session->userdata('survey')) . '::Diarrhoea Treatment Scale Up Baseline Assessment';
            }
            $this->data['logged'] = 1;
            $this->data['form_id'] = '';
            $this->data['content'] = 'mnh/pages/v_survey_main';
            $this->template->mnch($this->data);
        } else {
            redirect(base_url() . 'home', 'refresh');
        }
    }

    /**
     * [loadSurvey description]
     * @param  [type] $survey_form [description]
     * @param  [type] $survey_type [description]
     * @return [type]              [description]
     */
    public function load($survey_form, $survey_type) {

        /**
         * Form stores the form selected
         * @var string
         */
        $form = '';
        $this->session->unset_userdata('survey_form');
        $this->session->set_userdata('survey_form', $survey_form);
        $this->survey_form = $survey_form;
        $this->load->module('survey/generate');

        $this->session->unset_userdata('survey');
        $this->session->set_userdata('survey', $survey_type);

        $this->load->module('survey/form_handler');
        switch ($survey_type) {
            case 'mnh':
                $form = $this->form_handler->get_mnh_form();
                break;

            case 'ch':
                $form = $this->form_handler->get_mch_form();
                break;

            case 'hcw':
                $form = $this->form_handler->get_hcw_form();
                break;
        }
        switch ($survey_form) {
            case 'offline':
                $this->form_handler->loadPDF($form, $survey_type);
                break;

            case 'online':
                echo $form;
                break;

            default:

                break;
        }
    }
    public function getFacilityDetails() {

        /*retrieve facility info if any*/
        $this->load->model('m_mnh_survey');
        if (($this->m_mnh_survey->retrieveFacilityInfo($this->input->get_post('facilityMFL', TRUE))) == true) {

            //retrieve existing data..else just load a blank form
            //set facility code into the session
            $new_data = array('facilityMFL' => $this->input->get_post('facilityMFL', TRUE));
            $this->session->set_userdata($new_data);
            print $this->m_mnh_survey->formRecords;
        }
    }

    public function suggestfac_name() {
        $this->load->model('m_autocomplete');
        $fac_name = strtolower($this->input->get_post('term', TRUE));

        //term is obtained from an ajax call

        if (!strlen($fac_name) < 2)

        //echo $fac_name;

        try {
            $this->rows = $this->m_autocomplete->getAutocomplete(array('keyword' => $fac_name));

            //die (var_dump($this->rows));
            $json_data = array();

            //foreach($this->rows as $key=>$value)
            //array_push($json_data,$value['fac_name']);
            foreach ($this->rows as $value) {
                array_push($json_data, $value->fac_name);

                //print $key.' '.$value.'<br />';
                //$json_data=array('code'=>$value->fac_mfl,'name'=>$value->fac_name);


            }
            print json_encode($json_data);

            //die;


        }
        catch(exception $ex) {

            //ignore
            //$ex->getMessage();


        }
    }

    /**
     * [startSurvey description]
     * @param  [type] $survey_type     [description]
     * @param  [type] $survey_category [description]
     * @param  [type] $fac_mfl         [description]
     * @param  [type] $survey_year     [description]
     * @return [type]                  [description]
     */
    public function startSurvey($survey_type, $survey_category, $fac_mfl, $survey_year) {

        

        $result = $this->db->get_where('survey_types', array('st_name' => $survey_type));
        $result = $result->result_array();
        $survey_type = $result[0]['st_id'];

        $result = $this->db->get_where('survey_categories', array('sc_name' => $survey_category));
        $result = $result->result_array();
        $survey_category = $result[0]['sc_id'];

        $data = array('ss_year' => $survey_year, 'st_id' => $survey_type, 'sc_id' => $survey_category, 'fac_id' => $fac_mfl);

        //echo '<pre>';print_r($data);echo '</pre>';die;
        $count = $this->checkifExists($data, 'survey_status');
        if ($count == 0) {
            $this->db->insert('survey_status', $data);
        } else {
        }

        $result = $this->db->get_where('survey_status', array('ss_year' => $survey_year, 'st_id' => $survey_type, 'sc_id' => $survey_category, 'fac_id' => $fac_mfl));
        $result = $result->result_array();
        $ss_id = $result[0]['ss_id'];
        $data = array('survey_status' => $ss_id, 'facilityMFL' => $fac_mfl);
        $this->session->set_userdata($data);

        $result = $this->db->get_where('facilities', array('fac_mfl' => $fac_mfl));
        $result = $result->result_array();

        // print_r($result);die;

        echo json_encode($result);
    }

    /**
     * [checkifExists description]
     * @param  [type] $data  [description]
     * @param  [type] $table [description]
     * @return [type]        [description]
     */
    public function checkifExists($data, $table) {
        $this->db->like($data);
        $this->db->from($table);
        $count = $this->db->count_all_results();
        return (int)$count;
    }

    /**
     * [getFacilitySection description]
     * @param  [type] $survey          [description]
     * @param  [type] $fac_mfl         [description]
     * @param  [type] $survey_category [description]
     * @return [type]                  [description]
     */
    public function getFacilitySection($survey, $survey_category, $fac_mfl) {
        /**
         * [$current description]
         * @var string
         */
        $current='';

        if ($dataFound) {
            $current = $dataFound[0]['max_section'];
        }
        echo $current;
    }

    /**
     * [suggest description]
     * @return [type] [description]
     */
    public function suggest() {
        $this->load->model('m_autocomplete');

        //$fac_name=$this->input->post('username',TRUE);

        try {
            $this->rows = $this->m_autocomplete->getAllFacilityNames();

            //die(var_dump($this->rows));
            $json_data = array();

            foreach ($this->rows as $key => $value)

            //array_push($json_names,$value['fac_name']);
            $json_data = array('code' => $value['fac_mfl'], 'name' => $value['fac_name']);
            print json_encode($json_data);
        }
        catch(exception $ex) {

            //ignore
            $ex->getMessage();
        }
    }
    public function createHCWListSection ()
    {
        $hcwlist = '';
        $cannotbetraced = '';
        $declined = '';
        $result = $this->data_model->getHCWByCounty($this->session->userdata('county'));
        $count = count($result);
        $this->session->set_userdata(array('fCount' => $count));
        $sections = $this->data_model->getAssessmentInfo();
        // echo "<pre>"; print_r($sections);die;
        $question_codes = array('QHC28'=>'Certified', 'QHC29' => 'For Mentorship', 'QHC30' => 'For TOT');
        //print_r($result);die;
        $checkbox_options = $this->data_model->getCheckOptions();
        $counter = 0;
        foreach ($result as $value) {
            foreach ($value as $key => $val) {
                if($val == NULL)
                {
                    $val = "";
                    $value[$key] = $val;
                }
            }
            // echo $value['id'];die;
            $counter++;
            $hcwlist .= '<tr><td>'.$counter.'</td><td>'.$value['mfl_code'].'</td><td>'.$value['facility_name'].'</td><td>'.$value['names_of_participant'].'</td><td>'.$value['id_number'].'</td><td>'.$value['mobile_number'].'</td><td>'.$value['email_address'].'</td><td>';
            if (array_key_exists( $value['id'], $checkbox_options)) {
                foreach ($question_codes as $code => $v) {
                    $response = $checkbox_options[$value['id']][$code];
                    if($response == 'Yes')
                    {
                         $hcwlist .= '<input type = "checkbox" disabled = "disabled" checked>'.$v.' <br>';
                    }
                    else
                    {
                         $hcwlist .= '<input type = "checkbox" disabled = "disabled">'.$v.'<br>';
                    }
                }
                $hcwlist .= '</td>';
            }
            else
            {
                 $hcwlist .= '
            <input type = "checkbox" disabled = "disabled" > Certified <br>
            <input type = "checkbox" disabled = "disabled" > For Mentorship <br>
            <input type = "checkbox" disabled = "disabled" > For TOT</td>
            ';
            }

            if(array_key_exists($value['id'], $sections))
            {
                $hcw_section = $sections[$value['id']]['sections'];
                $hcw_section = trim($hcw_section, 'section-');
            }
            else
            {
                $hcw_section = 0;
            }

            $percentage = ($hcw_section/5)*100;
            if($value['declined_assessment'] == 'Yes')
            {
                $declined = '<a data-response = "No" class = "trace " data-id = "'.$value['id'].'" data-column = "declined_assessment"><span class="label label-danger">Declined Assessment</span></a>';
            }
            else
            {
                $declined = '<a data-response = "Yes" class = "trace" data-id = "'.$value['id'].'" data-column = "declined_assessment"><span class="label label-success">Decline Assessment</span></a>';
            }
            if ($value['cannot_be_traced'] == 'Yes') {
                $cannotbetraced = '<a data-response = "No" class = "trace" data-id = "'.$value['id'].'" data-column = "cannot_be_traced"><span class="label label-danger">Could not be Traced</span></a>';
            }
            else
            {
                $cannotbetraced = '<a data-response = "Yes" class = "trace" data-id = "'.$value['id'].'" data-column = "cannot_be_traced"><span class="label label-success">Can not be Traced</span></a>';
            }
            if($hcw_section < 5 && $hcw_section > 0)
            {
                $hcw_section = $hcw_section - 1;
                $hcwlist .= '<td><div class="progress" style = "padding: 0;"><div class="progress-bar progress-bar-warning" role = "progressbar" aria-valuenow="'.$percentage.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$percentage.'%;">'.$percentage.'%</div></div><center><h4 class="label label-warning" style = "">Pending</h4></center></td>';
                $hcwlist .= '<td><a class="hcw-action" data-hcwid ="' . $value['id'] . '" data-action = "begin" data-section ="0">Continue Assessment</a>';
                $hcwlist .= '<br/>'.$declined . '<br/>'.$cannotbetraced.'</td>';
            }
            else if($hcw_section == 5)
            {
                $hcwlist .= '<td><div class="progress" style = "padding: 0;"><div class="progress-bar progress-bar-success" role = "progressbar" aria-valuenow="'.$percentage.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$percentage.'%;">'.$percentage.'%</div></div><span class="label label-success">Assessed</span></td>';
                $hcwlist .= '<td><a class="hcw-action" data-hcwid ="' . $value['id'] . '" data-action = "begin" data-section ="0">Reassess</a>';
                $hcwlist .= '<br/>'.$declined . '<br/>'.$cannotbetraced.'</td>';
            }
            else if($hcw_section == 0)
            {
                $hcwlist .= '<td><div class="progress" style = "padding: 0;"><div class="progress-bar" role = "progressbar" aria-valuenow="'.$percentage.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$percentage.'%;">'.$percentage.'%</div></div><span class="label label-danger">Not Started</span></td>';
                $hcwlist .= '<td><a class="hcw-action" data-hcwid ="' . $value['id'] . '" data-action = "begin" data-section ="0">Start Assessment</a>';
                $hcwlist .= '<br/>'.$declined . '<br/>'.$cannotbetraced.'</td>';
            }
            else
            {
                $hcwlist .= '';
                $hcwlist .= '<td><a class="hcw-action" data-hcwid ="' . $value['id'] . '" data-action = "begin" data-section ="0">Could not be traced</a><span class="label label-success">Success</span></td>';
            }

            $hcwlist .= '</tr>';
        }
       // echo $hcwlist;die;
        return $hcwlist;
    }
    /**
     * [createFacilitiesListSection description]
     * @return [type] [description]
     */
    public function createFacilitiesListSection() {

        /*retrieve facility list*/
        $result = $this->data_model->getFacilitiesByDistrict($this->session->userdata('dName'));

        // var_dump($result);
        $counter = 0;
        $link = '';
        $surveyCompleteFlag = '';

        /**
         * [$districtFacilityListSection description]
         * @var string
         */
        $districtFacilityListSection = '';
        if (count($result) > 0) {

            //set session data
            $this->session->set_userdata(array('fCount' => count($result)));

            //print 'true'; die;
            foreach ($result as $value) {
                $counter++;
                $fac_mfl = $value['facMfl'];
                $survey = $this->session->userdata('survey');
                $survey_category = $this->session->userdata('survey_category');
                if ($survey == 'mnh') {
                    $total = 8;
                } else if ($survey == 'ch') {
                    $total = 9;
                } else {
                    $total = 5;
                }
                $dataFound = $this->data_model->getSurveyInfo($survey, $survey_category, 'facility', $fac_mfl);

                if ($dataFound) {
                    $current = trim($dataFound[0]['max_section'], 'section-');

                    //                 echo $current;
                    $last_activity = $dataFound[0]['last_activity'];
                    $label = $dataFound[0]['status'];
                } else {
                    $current = NULL;
                    $last_activity = NULL;
                    $label = NULL;
                }

                $progress = round(($current / $total) * 100);
                if ($progress == 0) {
                    $linkText = 'Begin Survey';
                    $linkClass = 'action';
                    $attr = 'begin';
                } elseif ($progress == 100) {
                    $linkText = 'Review Entries';
                    $linkClass = 'action';
                    $attr = 'review';
                } else {
                    $linkText = 'Continue Survey';
                    $linkClass = 'action';
                    $attr = 'continue';
                }
                switch ($label) {
                    case 'complete':
                        $label_class = 'green';
                        break;

                    case 'pending':
                        $label_class = 'orange';
                        break;

                    default:
                        $label = 'not started';
                        $label_class = 'red';
                        break;
                }

                $last_activity = ($last_activity != NULL) ? $last_activity : 'not started yet';

                // echo $last_activity;die;
                // Get Survey Information

                $link = '<td><div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="' .
                 $progress . '" aria-valuemin="0" aria-valuemax="100" style="width: ' . $progress . '%;">' . $progress . '%</div></div></div>';

                $link.= '<div class="ui label ' . $label_class . ' status">' . $label .
                '</div></td><td><div class="ui label activity"> Last Activity : <span class="activity-text">' . $last_activity . '</span></div></td><td><a class="' . $linkClass . '" id="facility_1" data-action="' . $attr . '" data-mfl ="' . $value['facMfl'] . '" data-section ="' . $current . '" href="#">' . $linkText . '</a></td>';

                $districtFacilityListSection.= '<tr>

        <td >' . $counter . '</td>
        <td >' . $value['facMfl'] . '</td>
        <td >' . $value['facName'] . '</td>
        ' . $link . '
        </tr>';
            }

            //print 'fs: '.$this->districtFacilityListSection;die;


        } else {

            //print 'false'; die;
            $districtFacilityListSection.= '<tr><td colspan="22">No Facilities Found</td></tr>';
        }

        return $districtFacilityListSection;
    }

    public function createFacilityTable() {



        // var_dump($districtFacilityListSection);die;
        //<div class="breadcrumb">
        //     <th colspan="22" >' . strtoupper($this -> session -> userdata('dName')) . ' DISTRICT/SUB-COUNTY FACILITIES</th>
        //     <div>
        $survey = $this->session->userdata('survey');
        // echo $survey;die;
        if($survey != 'hcw')
        {
            $districtFacilityListSection = $this->createFacilitiesListSection();
            $facilityList = '
                <table class="centre dataTable">

        <thead>
                    <th>#</th>
                    <th>MFL CODE</th>
                    <th> FACILITY NAME </th>
                    <th>REPORTING PROGRESS</th>
                    <th style="width:100px">ACTIVITY</th>
                    <th>LINK</th>
        </thead>
                </tr>' . $districtFacilityListSection . '
                </table>';
        }
        else
        {
            $hcwListSection = $this->createHCWListSection();
            // print_r($hcwListSection);die;
            $facilityList = '<table class = "center dataTable">
                <thead>
                    <th>#</th>
                    <th>MFL CODE</th>
                    <th>Facility Name</th>
                    <th>HCW Name</th>
                    <th>National ID No</th>
                    <th>Phone No</th>
                    <th>Email Address</th>
                    <th>certification</th>
                    <th style = "width: 15%;">Status</th>
                    <th>Link</th>
                </thead>
                <tbody>'.$hcwListSection.'</tbody>
            </table>';
        }

        // echo $facilityList;
        $data['form'] = $facilityList;
        $data['form_id'] = '';
        $this->load->view('form', $data);
    }
    public function getNationalData($survey_type, $survey_category) {
        $county = urldecode($county);
        $results = $this->data_model->getReportingRatio($survey_type, $survey_category, '', 'national');
        echo json_encode($results);
    }

    /**
     * [getCountyData description]
     * @param  [type] $survey_type     [description]
     * @param  [type] $survey_category [description]
     * @param  [type] $county          [description]
     * @return [type]                  [description]
     */
    public function getCountyData($survey_type, $survey_category, $county) {
        $county = urldecode($county);
        $results = $this->data_model->getReportingRatio($survey_type, $survey_category, $county, 'county');
        echo json_encode($results);
    }

    /**
     * [getDistrictData description]
     * @param  [type] $survey_type     [description]
     * @param  [type] $survey_category [description]
     * @param  [type] $county          [description]
     * @return [type]                  [description]
     */
    public function getDistrictData($survey_type, $survey_category, $county) {
        $county = urldecode($county);
        $results = $this->data_model->getReportingRatio($survey_type, $survey_category, $county, 'district');
        echo json_encode($results);
    }

    public function complete_survey()
    {
        $this->load->model('m_complete_survey');
        $this->m_complete_survey->store_data();
    }
    public function startAssessment($hcwid, $fac_mfl)
    {
         $result = $this->db->get_where('hcw_list', array('id' => $hcwid));
         $result = $result->result_array();
        $facilityMFL = $result[0]['mfl_code'];
        $data = array('hcw_id' => $hcwid, 'facilityMFL' => $facilityMFL);
        $this->session->set_userdata($data);
    }

    public function getCountyCountData()
    {
        $county = $this->session->userdata('county');
        if(!$county)
        {
            $county = 'national';
        }
        $result = $this->data_model->getCountyData($county);

        echo json_encode($result);
    }

    public function updatehcw($col, $response, $hcw_id)
    {
        $data = array($col => $response);
        $where = "id = " . $hcw_id;

        $update = $this->db->update_string('hcw_list', $data, $where);
        $update_query = $this->db->query($update);

        if($update_query){
            echo 'True';
        }
        else
        {
            echo 'False';
        }
    }

    public function getexceldata($data_type)
    {
        $county = $this->session->userdata('county');
        $print_data = '';
        $excel_data['columns'] = array('Name of Participant', 'Facility', 'Facility MFL', 'District', 'ID Number', 'Phone Number', 'Email Address');
        if($data_type == 'all')
        {
            $print_data = 'TOTAL HCWs';
            $hcws = $this->data_model->getHCWByCounty($county);
        }
        else if($data_type == 'assessed')
        {
            $print_data = 'ASSESSED HCWs';
            $hcws = $this->data_model->getHCWAssessed($county);

            foreach ($hcws as $key => $value) {
            if ($value['sections'] == 5) {
                $hcws[] = $value;
            }
        }
        }

        else if($data_type == 'certified')
        {
            $print_data = 'CERTIFIED HCWs';
            $type = 'Certified';
            $hcws = $this->data_model->getHCWRecommendation($county, $type);
        }

        else if($data_type == 'tot')
        {
            $print_data = 'HCWs RECOMMEDED FOR TOT';
            $type = 'TOT';
            $hcws = $this->data_model->getHCWRecommendation($county, $type);
        }

        else if($data_type == 'mentorship')
        {
            $print_data = 'HCWs RECOMMEDED FOR MENTORSHIP';
            $type = 'Mentorship';
            $hcws = $this->data_model->getHCWRecommendation($county, $type);
        }

        else if($data_type == 'declined')
        {
            $print_data = 'DECLINED ASSESSMENTS';
            $hcws = $this->data_model->gettraceresults($county, $data_type);
        }

        else if($data_type == 'not_traced')
        {
            $print_data = 'UNTRACED HCWs';
            $hcws = $this->data_model->gettraceresults($county, $data_type);
        }

        else
        {
            echo "No Data Found";die;
        }
        foreach ($hcws as $key => $value) {
            $excel_data['data'][] = array('Name of Participant' => $value['names_of_participant'], 'Facility' => $value['facility_name'], 'Facility MFL' => $value['mfl_code'], 'District' => $value['fac_district'], 'ID Number' => $value['id_number'], 'Phone Number' => $value['mobile_number'], 'Email Address' => $value['email_address']);
        }
        // echo "<pre>";print_r($excel_data);die;
        $this->generate->generate($excel_data, 'HCW LIST FOR ' . $print_data . ' IN ' . strtoupper($county) . ' COUNTY ', 'dynamic_excel');
    }

    public function getHCWs()
    {
        $hcws = $this->data_model->getHCWByCounty($this->session->userdata('county'));

    }
}
