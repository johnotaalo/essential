<?php
/**
* Handles All CRUD + A & V Functions
*/
class Supplies extends MY_Controller{
  /**
  * Constructor Function
  */
  public function __construct() {
    parent::__construct();
    $this->load->model('data_model');
  }
  /**
  * [create description]
  * @return [type] [description]
  */
  public function create(){
    $data = $this->input->post();
  }
  /**
<<<<<<< HEAD
  * [read description]
  * @return [type] [description]
  */
  public function read(){
    $data = $this->data_model->get('supplies');
=======
   * [read description]
   * @param  [type] $form [description]
   * @return [type]       [description]
   */
  public function read($form){
    $data = $this->data_model->get('supplies');
    foreach($data[0] as $key=>$value){
      $raw['title'][]=$key;
    }
    $raw['data']=$this->export->generate($data,'Supplies List',$form);
    // var_dump($raw['data']);
    if($form=='datatable'){
      echo json_encode($raw);
    }
>>>>>>> 620c6d83b2ade2cf5ec13e70e9068595b16c23d6
  }
  /**
  * [update description]
  * @param  [type] $id [description]
  * @return [type]     [description]
  */
  public function update($id){
    $data = $this->data_model->get('supplies',$id);

  }
  /**
  * [disable description]
  * @param  [type] $id [description]
  * @return [type]     [description]
  */
  public function disable($id){
    $data = $this->data_model->get('supplies',$id);

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
