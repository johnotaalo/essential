<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
//for the query builder
use Doctrine\ORM\Query\ResultSetMappingBuilder;
class Data_Model extends MY_Model
{
    
    /*user variables*/
    var $dataSet, $final_data_set, $query, $rsm, $districtName, $countyFacilities;
    
    /*constructor*/
    function __construct() {
        parent::__construct();
        
        //var initialization
        $this->dataSet = $this->query = null;
    }
    /**
    * [verifyRespondedByDistrict description]
    * @return [type] [description]
    */
    public function verifyRespondedByDistrict() {
        if ($this->input->post()) {
            try {
                $district = $this->em->getRepository('models\Entities\Districts')->findOneBy(array('districtName' => $this->input->post('district', TRUE), 'districtAccessCode' => md5($this->input->post('usercode', TRUE))));
                
                if ($district) {
                    $result['found']= 'true';
                    $result['id']=$district->getDistrictId();
					$result['name']=$district->getDistrictName();
                } else {
                    $result['found']= 'false';
                }
            }
            catch(exception $ex) {
                
                //ignore
                die($ex->getMessage());
            }
            return $result;
        }
        
        //close the this->input->post
        
        
    }
}