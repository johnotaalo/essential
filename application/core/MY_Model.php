<?php

//# Extend CI_Model to include Doctrine Entity Manager
date_default_timezone_set('Africa/Nairobi');

class MY_Model extends CI_Model
{
    
    /**
     * [$em description]
     * @var [type]
     */
    var $em;
    
    /**
     * [$result description]
     * @var [type]
     */
    var $result;
    function __construct() {
        parent::__construct();
        $this->em = $this->doctrine->em;
        $this->result = '';
    }
    
    /**
     * [getAccessChallenges description]
     * @return [type] [description]
     */
    public function getAccessChallenges() {
        try {
            $result = $this->em->createQuery('SELECT a.achCode, a.achName FROM models\Entities\AccessChallenges a ORDER BY a.achCode ASC ');
            $result = $result->getArrayResult();
        }
        catch(exception $ex) {
        }
        return $result;
    }
    
    /**
     * [getCommodities description]
     * @return [type] [description]
     */
    public function getCommodities() {
        try {
            $result = $this->em->createQuery('SELECT c.commCode,c.commName,c.commFor, c.commUnit FROM models\Entities\Commodities c ORDER BY c.commFor, c.commName ASC ');
            $result = $result->getArrayResult();
        }
        catch(exception $ex) {
        }
        return $result;
    }
    
    public function getSpecificCommodities($for) {
        try {
            $result = $this->em->createQuery('SELECT c.commCode,c.commName,c.commFor, c.commUnit FROM models\Entities\Commodities c WHERE c.commFor = :for ORDER BY c.commFor, c.commCode ASC ');
            $result->setParameter('for', $for);
            $result = $result->getArrayResult();
        }
        catch(exception $ex) {
        }
        return $result;
    }
    
    /**
     * [getEquipments description]
     * @return [type] [description]
     */
    public function getEquipments() {
        try {
            $result = $this->em->createQuery('SELECT e.eqCode,e.eqName,e.eqFor FROM models\Entities\Equipments e ORDER BY e.eqFor,e.eqCode ASC ');
            $result = $result->getArrayResult();
        }
        catch(exception $ex) {
        }
        return $result;
    }
    
    /**
     * [getSupplies description]
     * @return [type] [description]
     */
    public function getSupplies() {
        try {
            $result = $this->em->createQuery('SELECT s.supplyCode,s.supplyName,s.supplyFor FROM models\Entities\Supplies s ORDER BY s.supplyFor,s.supplyCode ASC ');
            $result = $result->getArrayResult();
        }
        catch(exception $ex) {
        }
        return $result;
    }
    
    /**
     * [getSuppliers description]
     * @return [type] [description]
     */
    public function getSuppliers() {
        try {
            $result = $this->em->createQuery('SELECT s.supplierCode,s.supplierName,s.supplierFor FROM models\Entities\Suppliers s ORDER BY s.supplierFor,s.supplierCode ASC ');
            $result = $result->getArrayResult();
        }
        catch(exception $ex) {
        }
        return $result;
    }
    
    /**
     * [getChallenges description]
     * @return [type] [description]
     */
    public function getChallenges() {
        try {
            $result = $this->em->createQuery('SELECT c.challengeCode,c.challengeName FROM models\Entities\Challenges c ORDER BY c.challengeCode ASC ');
            $result = $result->getArrayResult();
        }
        catch(exception $ex) {
        }
        return $result;
    }
    
    /**
     * [getCommodityOutageOptions description]
     * @return [type] [description]
     */
    public function getCommodityOutageOptions() {
        try {
            $result = $this->em->createQuery('SELECT c.cooDescription FROM models\Entities\CommodityOutageOptions c');
            $result = $result->getArrayResult();
        }
        catch(exception $ex) {
        }
        return $result;
    }
    
    /**
     * [getContactsList description]
     * @return [type] [description]
     */
    public function getContactsList() {
        try {
            $result = $this->em->createQuery('SELECT cl.clName,cl.clPhoneNumber,cl.clEmailAddress,cl.clCountry FROM models\Entities\ContactList cl');
            $result = $result->getArrayResult();
        }
        catch(exception $ex) {
        }
        return $result;
    }
    
    /**
     * [getCounties description]
     * @return [type] [description]
     */
    public function getCounties() {
        try {
            $result = $this->em->createQuery('SELECT c.countyName,c.countyFusionMapId FROM models\Entities\Counties c');
            $result = $result->getArrayResult();
        }
        catch(exception $ex) {
        }
        return $result;
    }
    
    /**
     * [getDistricts description]
     * @return [type] [description]
     */
    public function getDistricts() {
        try {
            $result = $this->em->createQuery('SELECT d.districtName FROM models\Entities\Districts d ');
            $result = $result->getArrayResult();
        }
        catch(exception $ex) {
        }
        return $result;
    }
    
    /**
     * [getFacilities description]
     * @return [type] [description]
     */
    public function getFacilities() {
        try {
            $result = $this->em->createQuery('SELECT f FROM models\Entities\Facilities f ');
            $result = $result->getArrayResult();
        }
        catch(exception $ex) {
        }
        return $result;
    }
    
    /**
     * [getFacilityLevels description]
     * @return [type] [description]
     */
    public function getFacilityLevels() {
        try {
            $result = $this->em->createQuery('SELECT f.flName FROM models\Entities\FacilityLevels f');
            $result = $result->getArrayResult();
        }
        catch(exception $ex) {
        }
        return $result;
    }
    
    /**
     * [getFacilityOwners description]
     * @return [type] [description]
     */
    public function getFacilityOwners() {
        try {
            $result = $this->em->createQuery('SELECT f.foName,f.foFor FROM models\Entities\FacilityOwners f');
            $result = $result->getArrayResult();
        }
        catch(exception $ex) {
        }
        return $result;
    }
    
    /**
     * [getGuidelines description]
     * @return [type] [description]
     */
    public function getGuidelines() {
        try {
            $result = $this->em->createQuery('SELECT g FROM models\Entities\Guidelines g');
            $result = $result->getArrayResult();
        }
        catch(exception $ex) {
        }
        return $result;
    }
    
    /**
     * [getIndicators description]
     * @return [type] [description]
     */
    public function getIndicators() {
        try {
            $result = $this->em->createQuery('SELECT i FROM models\Entities\Indicators i ORDER BY i.indicatorFor');
            $result = $result->getArrayResult();
        }
        catch(exception $ex) {
        }
        return $result;
    }
    
    /**
     * [getQuestions description]
     * @return [type] [description]
     */
    public function getQuestions() {
        try {
            $result = $this->em->createQuery('SELECT q FROM models\Entities\Questions q ORDER BY q.questionFor,q.questionCode');
            $result = $result->getArrayResult();
        }
        catch(exception $ex) {
        }
        return $result;
    }
    
    /**
     * [getReasonNoDeliveries description]
     * @return [type] [description]
     */
    public function getReasonNoDeliveries() {
        try {
            $result = $this->em->createQuery('SELECT rnd FROM models\Entities\ReasonNoDeliveries rnd');
            $result = $result->getArrayResult();
        }
        catch(exception $ex) {
        }
        return $result;
    }
    
    /**
     * [getSignalFunctions description]
     * @return [type] [description]
     */
    public function getSignalFunctions() {
        try {
            $result = $this->em->createQuery('SELECT sf FROM models\Entities\SignalFunctions sf');
            $result = $result->getArrayResult();
        }
        catch(exception $ex) {
        }
        return $result;
    }
    
    /**
     * [getSuppliesOutageOptions description]
     * @return [type] [description]
     */
    public function getSuppliesOutageOptions() {
        try {
            $result = $this->em->createQuery('SELECT soo FROM models\Entities\SuppliesOutageOptions soo');
            $result = $result->getArrayResult();
        }
        catch(exception $ex) {
        }
        return $result;
    }
    
    /**
     * [getSurveyTypes description]
     * @return [type] [description]
     */
    public function getSurveyTypes() {
        try {
            $result = $this->em->createQuery('SELECT st FROM models\Entities\SurveyTypes st');
            $result = $result->getArrayResult();
        }
        catch(exception $ex) {
        }
        return $result;
    }
    
    /**
     * [getSurveyCategories description]
     * @return [type] [description]
     */
    public function getSurveyCategories() {
        try {
            $result = $this->em->createQuery('SELECT sc FROM models\Entities\SurveyCategories sc');
            $result = $result->getArrayResult();
        }
        catch(exception $ex) {
        }
        return $result;
    }
    
    /**
     * [getTreatmentClassifications description]
     * @return [type] [description]
     */
    public function getTreatmentClassifications() {
        try {
            $result = $this->em->createQuery('SELECT tc FROM models\Entities\TreatmentClassifications tc');
            $result = $result->getArrayResult();
        }
        catch(exception $ex) {
        }
        return $result;
    }
    
    /**
     * [getTreatments description]
     * @return [type] [description]
     */
    public function getTreatments() {
        try {
            $result = $this->em->createQuery('SELECT t FROM models\Entities\Treatments t ORDER BY t.treatmentFor, t.treatmentCode');
            $result = $result->getArrayResult();
        }
        catch(exception $ex) {
        }
        return $result;
    }
    
    /**
     * [retrieveData description]
     * @param  [type] $table_name [description]
     * @param  [type] $identifier [description]
     * @return [type]             [description]
     */
    public function retrieveData($table_name, $identifier) {
        $results = $this->db->get_where($table_name, array('ss_id' => $this->session->userdata('survey_status')));
        $results = $results->result_array();
        if ($results) {
            foreach ($results as $result) {
                $data[$result[$identifier]] = $result;
            }
        } else {
            $data = array();
        }
        return $data;
    }
    
    /**
     * [getQuestionName description]
     * @param  [type] $code [description]
     * @return [type]       [description]
     */
    public function getQuestionName($code) {
        try {
            $this->result = $this->em->getRepository('models\Entities\questions')->findOneBy(array('questionCode' => $code));
            $result = $this->result->getQuestionName();
            
            // var_dump($result);die;
            
            
        }
        catch(exception $ex) {
        }
        return $result;
    }
    /**
     * [getIndicatorName description]
     * @param  [type] $code [description]
     * @return [type]       [description]
     */
    public function getTreatmentName($code) {
        try {
            $this->result = $this->em->getRepository('models\Entities\treatments')->findOneBy(array('treatmentCode' => $code));
            // var_dump($this->result);die;
            $result = $this->result->getTreatmentName();
            
            
            
            
        }
        catch(exception $ex) {
        }
        return $result;
    }
    /**
     * [getCommodityName description]
     * @param  [type] $code [description]
     * @return [type]       [description]
     */
    public function getCommodityName($code) {
        try {
            $this->result = $this->em->getRepository('models\Entities\commodityName')->findOneBy(array('commCode' => $code));
            $result = $this->result->getCommName();
            
            // var_dump($result);die;
            
            
        }
        catch(exception $ex) {
        }
        return $result;
    }
    /**
     * [getIndicatorName description]
     * @param  [type] $code [description]
     * @return [type]       [description]
     */
    public function getIndicatorName($code) {
        try {
            $this->result = $this->em->getRepository('models\Entities\indicators')->findOneBy(array('indicatorCode' => $code));
            $result = $this->result->getIndicatorName();
            
            // var_dump($result);die;
            
            
        }
        catch(exception $ex) {
        }
        return $result;
    }
    
    /**
     * [getSignalName description]
     * @param  [type] $code [description]
     * @return [type]       [description]
     */
    public function getSignalName($code) {
        try {
            $this->result = $this->em->getRepository('models\Entities\signalFunctions')->findOneBy(array('sfCode' => $code));
            $result = $this->result->getSfName();
            return $result;
            // var_dump($result);die;
            
            
        }
        catch(exception $ex) {
            print_r($ex);
        }
        
    }
    
    /**
     * [getCommodityOutageOptionName description]
     * @param  [type] $code [description]
     * @return [type]       [description]
     */
    public function getCommodityOutageOptionName($code) {
        try {
            $this->result = $this->em->getRepository('models\Entities\commodityOutageOptions')->findOneBy(array('cooId' => $code));
            $result = $this->result->getCooDescription();
            
            // var_dump($result);die;
            
            
        }
        catch(exception $ex) {
        }
        return $result;
    }
    
    /**
     * [getFacilitiesByDistrict description]
     * @param  [type] $districtName [description]
     * @return [type]               [description]
     */
    public function getFacilitiesByDistrict($districtName) {
        try {
            
            //Using DQL
            
            $result = $this->em->createQuery('SELECT f.facMfl,f.facName FROM models\Entities\Facilities f WHERE f.facDistrict= :district ORDER BY f.facName ASC ');
            $result->setParameter('district', $districtName);
            
            $result = $result->getArrayResult();
            return $result;
            
            // var_dump($result);
            
            
        }
        catch(exception $ex) {
            
            //ignore
            //die($ex->getMessage());
            
            
        }
    }
    
    /**
     * [getSurveyInfo description]
     * @param  [type] $survey_type     [description]
     * @param  [type] $survey_category [description]
     * @param  [type] $statistic       [description]
     * @param  [type] $facMFL          [description]
     * @return [type]                  [description]
     */
    public function getSurveyInfo($survey_type, $survey_category, $statistic, $facMFL) {
        $query = 'CALL get_survey_info("' . $survey_type . '","' . $survey_category . '","' . $statistic . '",' . $facMFL . ');';
        
        try {
            $myData = $this->db->query($query);
            $finalData = $myData->result_array();
            
            // print($this->db->last_query());die;
            $myData->next_result();
            
            // Dump the extra resultset.
            $myData->free_result();
            
            // Does what it says.
            
            
        }
        catch(exception $ex) {
        }
        return $finalData;
    }
    
    /**
     * [getReportingRatio description]
     * @param  [type] $survey          [description]
     * @param  [type] $survey_category [description]
     * @param  [type] $county          [description]
     * @param  [type] $statistic       [description]
     * @return [type]                  [description]
     */
    function getReportingRatio($survey, $survey_category, $county, $statistic) {
        
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
        return $finalData;
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
                    $result['found'] = 'true';
                    $result['id'] = $district->getDistrictId();
                    $result['name'] = $district->getDistrictName();
                } else {
                    $result['found'] = 'false';
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
