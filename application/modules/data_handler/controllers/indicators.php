<?php
/**
* Handles All CRUD + A & V Functions
*/
class Indicators extends MY_Controller{
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
  * [read description]
  * @return [type] [description]
  */
  public function read(){
    $data = $this->data_model->get('indicators');
  }
  /**
  * [update description]
  * @param  [type] $id [description]
  * @return [type]     [description]
  */
  public function update($id){
    $data = $this->data_model->get('indicators',$id);

  }
  /**
  * [disable description]
  * @param  [type] $id [description]
  * @return [type]     [description]
  */
  public function disable($id){
    $data = $this->data_model->get('indicators',$id);

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
