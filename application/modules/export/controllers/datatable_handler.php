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
}
