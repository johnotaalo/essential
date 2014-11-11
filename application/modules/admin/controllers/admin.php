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
<<<<<<< HEAD
    $this->load->module('data_handler/hcw');
=======
    $this->load->module('data_handler/indicators');
    $this->load->module('data_handler/hcw');
    $this->load->module('data_handler/equipment');
    $this->load->module('data_handler/supplies');
    $this->load->module('data_handler/questions');
>>>>>>> 620c6d83b2ade2cf5ec13e70e9068595b16c23d6
    $this->load->module('template');
  }
  public function index(){
    $data['content']='admin/output';
    $this->template->mnch($data);

  }
  public function test(){
    echo 'test';
  }
<<<<<<< HEAD
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
=======

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
      case 'equipment':
        $this->equipment->read($form);
          break;
      case 'supplies':
        $this->supplies->read($form);
          break;
      case 'questions':
        $this->questions->read($form);
          break;
      case 'indicators':
        $this->indicators->read($form);
          break;
    }
  }
}
>>>>>>> 620c6d83b2ade2cf5ec13e70e9068595b16c23d6
