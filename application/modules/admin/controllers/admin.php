<?php
/**
* Handles Admin and USES CRUD
*/
class Admin extends MY_Controller{
  /**
  * Constructor Function
  */
  public function __construct() {
    parent::__construct();
    $this->load->module('data_handler/hcw');
    $this->load->module('template');
  }
  public function index(){
    $data['content']='admin/output';
    $this->template->mnch($data);

  }
  public function test(){
    echo 'test';
  }

  /**
  * Handles R from CRUD - A & V Functions
  * @param  string $object Value of Action required by user.
  * @param  string $form File type to download.
  * @return [type]         [description]
  */
  public function get($object,$form){
    switch($object){
      case 'hcw':
      $this->hcw->read($form);

      break;
      case 'read':
      $this->hcw->read();

      break;
      case 'update':
      $this->hcw->update();

      break;
      case 'disable':
      $this->hcw->disable();

      break;
    }
  }
}
