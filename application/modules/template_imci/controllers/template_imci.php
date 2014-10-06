<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Template_imci extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index($data)
	{
		$this->load->view('default_v', $data);
	}

	public function learn($data)
	{
		$this->load->view('learn_v', $data);
	}

	public function test($data)
	{
		$this->load->view('test_v', $data);
	}

	public function docs($data)
	{
		$this->load->view('docs_v', $data);
	}

	public function manage($data)
	{
		$this->load->view('manage_v', $data);
	}

}