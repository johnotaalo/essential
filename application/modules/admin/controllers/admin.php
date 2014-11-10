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
}
  // /**
  // * Handles all CRUD - A & V Functions of HCW
  // * @param  string $action Value of Action required by user.
  // * @return [type]         [description]
  // */
  // public function hcw($action){
  //   switch($action){
  //     case 'create':
  //       $this->hcw->create();
  //
  //     break;
  //     case 'read':
  //       $this->hcw->read();
  //
  //     break;
  //     case 'update':
  //       $this->hcw->update();
  //
  //     break;
  //     case 'disable':
  //       $this->hcw->disable();
  //
  //     break;
  //   }
  // }
