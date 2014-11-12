<?php
class Datatable_Handler extends MY_Controller{
  /**
  * [__construct description]
  */
  function __construct()
  {
    parent::__construct();
  }
  /**
  * [index description]
  * @return [type] [description]
  */
  public function index()
  {

  }

  public function normal($data){
    // var_dump($data);
    /**
    * [$dataSet description]
    * @var array
    */
    $dataSet=array();
    /**
    * [$rowCounter description]
    * @var integer
    */
    $rowCounter=1;
    /**
    * Looping through rows
    */
    foreach($data as $row){
      /**
      * [$counter description]
      * @var integer
      */
      $counter=0;
      /**
      * Stores a ROW of Data
      * @var array
      */
      $rowSet=array();
      foreach($row as $k=>$field){
        $rowSet[]=$field;
        $counter++;
      }

      $dataSet[]=$rowSet;
    }
    return $dataSet;
  }

  public function editable($data,$identifier){
    $identifier = explode('_',$identifier);
    $identifier[1]=ucwords($identifier[1]);
    $identifier = $identifier[0].$identifier[1];
    // var_dump($data);
    /**
    * [$dataSet description]
    * @var array
    */
    $dataSet=array();
    /**
    * [$rowCounter description]
    * @var integer
    */
    $rowCounter=1;
    /**
    * Looping through rows
    */
    foreach($data as $row){
      /**
      * [$counter description]
      * @var integer
      */
      $counter=0;
      /**
      * Stores a ROW of Data
      * @var array
      */
      $rowSet=array();
      foreach($row as $k=>$field){
        // echo $row[$identifier];die;
        $rowSet[]='<a id="' . $k . '_' . $counter . '" data-type="text" data-name="'.$k.'" data-pk="'.$row[$identifier].'" class="editable">' . $field . '</a>';
        $counter++;
      }
// echo '<pre>';print_r($rowSet);die;
      $dataSet[]=$rowSet;
    }
    // echo '<pre>';print_r($dataSet);die;
    return $dataSet;
  }
}
