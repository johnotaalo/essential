<?php
/**
* Handles All CRUD + A & V Functions
*/
class HCW extends MY_Controller{
  /**
  * Constructor Function
  */
  public function __construct() {
    parent::__construct();
    $this->load->model('data_model');
    $this->load->module('export');
  }
  /**
  * [create description]
  * @return [type] [description]
  */
  public function create(){
    $data = $this->input->post();
  }
  /**
  * [read description]
  * @return [type] [description]
  */
  public function read($form){
    $data = $this->data_model->get('hcw');
    foreach($data[0] as $key=>$value){
      $raw['title'][]=$key;
    }
    $raw['data']=$this->export->generate($data,'HCW List',$form);

    if($form=='datatable'){
      $recordSize = sizeof($raw['data']);
      // $raw['data']=	array("data"=>$raw['data']);
      // $raw['data']=	array(
      //   "sEcho"						=> 1,
      //   "iTotalRecords"				=>$recordSize,
      //   "iTotalDisplayRecords"		=>$recordSize,
      //   "aaData"					=>$raw['data']
      // );
      echo json_encode($raw);
    }

  }
  /**
  * [update description]
  * @param  [type] $id [description]
  * @return [type]     [description]
  */
  public function update($id){
    $data = $this->data_model->get('hcw',$id);

  }
  /**
  * [disable description]
  * @param  [type] $id [description]
  * @return [type]     [description]
  */
  public function disable($id){
    $data = $this->data_model->get('hcw',$id);

  }
  /**
  * [add description]
  */
  public function add(){
    $data = $this->input->post();
  }
  /**
  * [visualize description]
  * @return [type] [description]
  */
  public function visualize(){

  }
}
