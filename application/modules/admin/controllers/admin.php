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

    $this->load->module('data_handler/indicators');
    $this->load->module('data_handler/hcw');
    $this->load->module('data_handler/equipment');
    $this->load->module('data_handler/supplies');
    $this->load->module('data_handler/questions');
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
  public function get($object,$form,$identifier=''){
    switch($object){
      case 'hcw':
        $this->hcw->read($form,$identifier);
          break;
      case 'equipment':
        $this->equipment->read($form,$identifier);
          break;
      case 'supplies':
        $this->supplies->read($form,$identifier);
          break;
      case 'questions':
        $this->questions->read($form,$identifier);
          break;
      case 'indicators':
        $this->indicators->read($form,$identifier);
          break;
    }
  }
}
