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
      $result = $this->em->createQuery('SELECT i FROM models\Entities\Indicators i ORDER BY i.indicatorFor,i.indicatorCode');
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
   * [getUsers description]
   * @return [type] [description]
   */
  public function getUsers() {
    try {
      $result = $this->em->createQuery('SELECT u FROM models\Entities\Users u');
      $result = $result->getArrayResult();
      // var_dump($result);
    }
    catch(exception $ex) {
      // var_dump($ex);
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

  public function retrieveDataHCW($table_name, $identifier) {
    $results = $this->db->get_where($table_name, array('hcw_id' => $this->session->userdata('hcw_id')));
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
      if($this->result!=null){
        $result = $this->result->getTreatmentName();
      }

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
      $this->result = $this->em->getRepository('models\Entities\commodities')->findOneBy(array('commCode' => $code));

      if($this->result!=null){
        $result = $this->result->getCommName();
      }
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
    $query = 'CALL get_survey_info("' . $survey_type . '","' . $survey_category . '","' . $statistic . '","' . $facMFL . '");';

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
  /**
  * [getStoredData description]
  * @param  [type] $table [description]
  * @param  [type] $data  [description]
  * @return [type]        [description]
  */
  public function getStoredData($table, $data) {
    try {
      $result = $this->em->getRepository($table)->findOneBy($data);
    }
    catch(Exception $ex) {
      echo $ex->getMessage();
    }

    return $result;
  }

  public function getFacilityTypes()
  {
    $query = $this->db->query("SELECT *  FROM facility_types");
    $result = $query->result_array();

    return $result;
  }

  public function getFacilityCounty($facmfl)
  {
    $query = $this->db->query("SELECT fac_county FROM facilities WHERE fac_mfl = '" . $facmfl . "' LIMIT 1");
    $result = $query->result_array();

    return $result[0]['fac_county'];
  }

  public function getFacInCounty($county)
  {
    $query = $this->db->query("SELECT * FROM facilities WHERE fac_county = '".$county."'");
    $result = $query->result_array($query);

    return $result;
  }
  public function getCadre()
  {
    $query = $this->db->query("SELECT * FROM cadre");
    $result = $query->result_array($query);

    return $result;
  }

  public function getServicePoints()
  {
    $query = $this->db->query("SELECT * FROM service_point");
    $result = $query->result_array();

    return $result;
  }

  public function getHCWByDistrict($dName)
  {
    $query = $this->db->query("SELECT h.* FROM facilities f
      LEFT JOIN hcw_list h ON h.mfl_code = f.fac_mfl
      WHERE f.fac_district = '" . $dName ."' AND  h.activity_id = 10");
      $result = $query->result_array();

      return $result;
  }

  public function getHCWByCounty($cName)
  {
    $query = $this->db->query("SELECT h.* FROM facilities f
      LEFT JOIN hcw_list h ON h.mfl_code = f.fac_mfl
      WHERE f.fac_county = '" . $cName ."' AND  h.activity_id = 10");

    $result = $query->result_array();

    return $result;
  }

    public function getHCWWorkProfile($hcw_id)
    {

      $result =  $this->db->get_where('hcw_list', array('id' => $hcw_id));


      $result = $result->result_array();


      return $result;

    }

    public function getCertification($hcw_id)
    {
      $result = $this->db->query("SELECT * FROM log_questions_hcw WHERE hcw_id = '" . $hcw_id . "'");
      $result = $result->result_array();

      return $result;
    }
    /**
    * Get LIST
    * @param string $district [description]
    */
    public function getHCW($district=''){
      /**
      * [$result description]
      * @var array
      */
      $result=array();
      if($district!=''){
        $query = $this->em->createQuery("SELECT h FROM models\Entities\HcwList h ON h.district = '" . $district ."' ");
      }
      else{
      $query = $this->em->createQuery("SELECT h FROM models\Entities\HcwList h");
      }
      $result = $query->getArrayResult();
      // echo $this->db->last_query();die;
      // var_dump($result);die;
      return $result;
    }
    /**
    * Get LIST
    * @param string $district [description]
    */
    public function updateField($table,$field,$value,$primary_key,$primary_value){
      /**
      * [$result description]
      * @var array
      */
      $result=array();
      $qb = $this->em->createQueryBuilder();
      $q = $qb->update($table,'t')->set('t.'.$field,"'".$value."'")->where('t.'.$primary_key."= '".$primary_value."' ")->getQuery();
  // print_r ($q);die;
      $result = $q->execute();
      return $result;
    }

  }
