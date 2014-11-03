<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Test extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	public function index($module=NULL, $module_id=NULL)
	{
		$data = array(
			'page_title' => 'Test Center',
			'page_view' => 'test/home_v',
		);
		$this->imci_template('test', $data);
	}

	public function start($module_id=NULL)
	{
		if($this->input->post('start_test_btn'))
		{
			$data = array(
				'page_title' => 'Examine: Module Name',
				'page_view' => 'test/take_test_v',
			);
			$this->imci_template('test', $data);
		}
		else
		{
			$data = array(
				'page_title' => 'Start Test: Module Name',
				'page_view' => 'test/start_test_confirm_v',
			);
			$this->imci_template('test', $data);
		}
	}

	public function practice($module_id=NULL)
	{
		if($this->input->post('start_practice_btn'))
		{
			$data = array(
				'page_title' => 'Practice: Module Name',
				'page_view' => 'test/take_practice_test_v',
			);
			$this->imci_template('test', $data);
		}
		else
		{
			$data = array(
				'page_title' => 'Start Test: Module Name',
				'page_view' => 'test/start_practice_test_confirm_v',
			);
			$this->imci_template('test', $data);
		}
	}

}