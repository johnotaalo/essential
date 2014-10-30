<?php
class Reporting extends MY_Controller
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
        $this->load->model('analytics_model');
        $this->load->module('template');
    }

    public function index() {
      $data['content'] = 'mnh/pages/v_home';
      $data['title'] = 'MoH Data Management Tool :: Reporting Progress';
      $this->template->mnch($data);

    }
    public function runMap($survey,$survey_category,$statistic) {
        $counties = $this->analytics_model->runMap($survey,$survey_category,$statistic);
        $map = array();
        $datas = array();
        $status = '';
        foreach ($counties as $county) {

            //var_dump($county);
            $percentage = (int)$county[0][0]['percentage'];
            $reported = (int)$county[0][0]['reported'];
            $actual = (int)$county[0][0]['actual'];
            $countyMap = (int)$county[1];
            $countyName = $county[2];

            //echo $percentage.',';

            switch ($percentage) {
                case ($percentage == 0):
                    $status = '#ffffff';
                    break;

                case ($percentage < 20):
                    $status = '#e93939';
                    break;

                case ($percentage < 40):
                    $status = '#da8a33';
                    break;

                case ($percentage < 60):
                    $status = '#dad833';
                    break;

                case ($percentage < 80):
                    $status = '#91da33';
                    break;

                case ($percentage <= 100):
                    $status = '#7ada33';
                    break;

                    //case ($percentage===100) :
                    //	$status = '#13b00b';
                    //	break;


                default:
                    $status = '#ffffff';
                    break;
            }
            $datas[] = array('id' => $countyMap, 'value' => $countyName, 'color' => $status, 'tooltext' => $countyName . '  Percentage Complete:  ' . $percentage . '% (' . $reported . '/' . $actual . ')', 'link' => "Javascript:runCountyData('" . $countyName . "," . $survey.",".$survey_category."')");
            //$datas[] = array('id' => $countyMap, 'value' => $countyName, 'color' => $status, 'tooltext' => $countyName . '  Percentage Complete:  ' . $percentage . '% (' . $reported . '/' . $actual . ')', 'link' => base_url() . 'c_analytics/setActive/' . $countyName . '/' . $survey.'/'.$survey_category);
        }
        $map = array("canvasBorderColor" => "#ffffff", "hoverColor" => "#aaaaaa",
        "fillcolor" => "D7F4FF", "numbersuffix" => "M", "includevalueinlabels" => "1", "labelsepchar" => ":", "basefontsize" => "9", "borderColor" => '#999999', "showBevel" => "0", 'showShadow' => "0");
        $styles = array("showBorder" => 0);
        $finalMap = array('map' => $map, 'data' => $datas, 'styles' => $styles);
        $finalMap = json_encode($finalMap);
        echo $finalMap;
    }

      function getReportingRatio($survey, $survey_category, $county,$statistic) {

            /*using DQL*/

            $finalData = array();

            try {

                $query = 'CALL get_reporting_ratio("' . $survey . '","' . $survey_category . '","' . $county . '","' . $statistic . '");';
                $myData = $this->db->query($query);
                $finalData = $myData->result_array();

                $myData->next_result();

                // Dump the extra resultset.
                $myData->free_result();

                // Does what it says.


            }
            catch(exception $ex) {

                //ignore
                //echo($ex -> getMessage());


            }
            print_r($finalData);die;
            return $finalData;
        }
  }
