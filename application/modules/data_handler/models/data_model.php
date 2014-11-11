<?php

class Data_Model extends MY_Model{
  /**
  * Constructor Function
  */
  public function __construct() {
    parent::__construct();
  }
  /**
  * Handles Data Retrieval
  * @param  [type] $object     [description]
  * @param  string $identifier [description]
  * @return [type]             [description]
  */
  public function get($object,$identifier=''){
    switch($object){
    case 'hcw':
      $results = $this->getHCW($identifier);

      foreach($results as $result){
        foreach($result as $key=>$value){
          if($value!='' && $key!='id'){
            $newResult[$key]=$value;
          }
        }
        unset($newResult['designation']);
        unset($newResult['department']);
        unset($newResult['dates']);
        unset($newResult['upload_date']);
        unset($newResult['cadre']);
        unset($newResult['activity_id']);
        // $newResult['county']=$this->getFacilityCounty($result['mfl_code']);
        $newResults[]=$newResult;
      }
      break;
      case 'equipment':
      $results = $this->getEquipments();
      foreach($results as $result){
        foreach($result as $key=>$value){
          if($value!='' && $key!='id'){
            $newResult[$key]=$value;
          }
        }

        // $newResult['county']=$this->getFacilityCounty($result['mfl_code']);
        $newResults[]=$newResult;
      }
      break;
    }
    return $newResults;
  }

}
