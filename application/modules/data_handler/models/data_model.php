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
          if($value!=''){
            if($key=='uploadDate'){
              $value=date('l, d-m-Y',$value);
            }
            $newResult[$key]=$value;
          }
        }
        unset($newResult['designation']);
        unset($newResult['department']);
        unset($newResult['dates']);
        unset($newResult['upload_date']);
        unset($newResult['cadre']);
        unset($newResult['activity_id']);
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
        $newResults[]=$newResult;
      }
      break;

      case 'supplies':
      $results = $this->getSupplies();

      foreach($results as $result){
        foreach($result as $key=>$value){
          if($value!='' && $key!='id'){
            $newResult[$key]=$value;
          }
        }
        $newResults[]=$newResult;
      }
      break;

      case 'questions':
      $results = $this->getQuestions();
      foreach($results as $result){
        foreach($result as $key=>$value){
          if($value!='' && $key!='id'){
            $newResult[$key]=$value;
          }
        }
        $newResults[]=$newResult;
      }
      break;

      case 'indicators':
      $results = $this->getIndicators();
      foreach($results as $result){
        foreach($result as $key=>$value){
          if($value!='' && $key!='id'){
            $newResult[$key]=$value;
          }
        }
        $newResults[]=$newResult;
      }
      break;

      case 'users':
      $results = $this->getUsers();
      foreach($results as $result){
        foreach($result as $key=>$value){
          if($value!='' && $key!='id'){
            $newResult[$key]=$value;
          }
        }
        $newResults[]=$newResult;
      }
      break;

      case 'facilities':
      $results = $this->getFacilities();
      foreach($results as $result){
        foreach($result as $key=>$value){
          if($value!='' && $key!='id'){
            $newResult[$key]=$value;
          }
        }
        $newResults[]=$newResult;
      }
      break;
    }
    return $newResults;
  }

}
