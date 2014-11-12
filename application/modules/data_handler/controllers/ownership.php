<?php
/**
* Handles R & V - CUD Functions
*/
class Ownership extends MY_Controller{
  /**
  * Constructor Function
  */
  public function __construct() {
    parent::__construct();
    $this->load->model('data_model');
    $this->load->module('export');
  }

  /**
  * [read description]
  * @param  [type] $form [description]
  * @return [type]       [description]
  */
  public function read($form,$identifier=''){
    // echo $identifier;die;
    $data = $this->data_model->get('hcw');
    foreach($data[0] as $key=>$value){
      $raw['title'][]=$key;
    }
    $raw['data']=$this->export->generate($data,'Ownership List',$form,$identifier);

    if($form=='datatable' || $form=='x-datatable'){
      $recordSize = sizeof($raw['data']);
      echo json_encode($raw);
    }
  }

  public function visualize(){

  }
}
