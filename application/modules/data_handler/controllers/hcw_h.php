<?php
/**
* Handles All CRUD + A & V Functions
*/
class HCW_H extends MY_Controller{
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
  * @param  [type] $form [description]
  * @return [type]       [description]
  */
  public function read($form,$identifier=''){
    // echo $identifier;die;
    $data = $this->data_model->get('hcw');
    foreach($data[0] as $key=>$value){
      $raw['title'][]=$key;
    }
    $raw['data']=$this->export->generate($data,'HCW List',$form,$identifier);

    if($form=='datatable' || $form=='x-datatable'){
      $recordSize = sizeof($raw['data']);
      echo json_encode($raw);
    }else{
      $data = $this->arrays->reset($data);
      // echo '<pre>';print_r($data);die;
      $this->export->generate($data,'HCW List',$form);
    }
  }


  /**
  * [update description]
  * @return [type] [description]
  */
  public function update(){
    $data = $this->input->post();
    $table ='models\Entities\HcwList';
    $field = $this->input->post('name');
    $value = $this->input->post('value');
    $primary_key = 'id';
    $primary_value = $this->input->post('pk');
    // echo $table.' '.$field.' '.$value.' '.$primary_key.' '.$primary_value;die;
    $this->data_model->updateField($table,$field,$value,$primary_key,$primary_value);
    // $data = $this->data_model->get('hcw',$id);

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
