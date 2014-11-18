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

    $this->load->module('data_handler/indicators_h');
    $this->load->module('data_handler/hcw');
    $this->load->module('data_handler/equipment');
    $this->load->module('data_handler/supplies');
    $this->load->module('data_handler/questions_h');
    $this->load->module('data_handler/users');
    $this->load->module('template');
  }
  public function home(){
    $data['content']='admin/output';
    $this->template->mnch($data);

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
        $this->questions_h->read($form,$identifier);
          break;
      case 'indicators':
        $this->indicators_h->read($form,$identifier);
          break;
      case 'users':
        $this->users->read($form,$identifier);
          break;
    }
  }

  /**
  * Handles U from CRUD - A & V Functions
  * @param  string $object Value of Action required by user.
  * @param  string $form File type to download.
  * @return [type]         [description]
  */
  public function edit($object){
    switch($object){
      case 'hcw':
        $this->hcw->update();
          break;
      case 'equipment':
        $this->equipment->update();
          break;
      case 'supplies':
        $this->supplies->update();
          break;
      case 'questions':
        $this->questions->update();
          break;
      case 'indicators':
        $this->indicators->update();
          break;
    }
  }
  public function login(){
    $data['content']='admin/login';
    $data['showheader']=1;
    $data['showfooter']=1;
    $this->template->mnch($data);
  }
}
