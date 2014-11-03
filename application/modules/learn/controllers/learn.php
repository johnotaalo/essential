<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Learn extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$data = array(
			'page_title' => 'Start Learning',
			'page_view' => 'learn/learn_v',
		);
		$this->imci_template('index', $data);

		# Remember form validation
		$this->session->set_userdata('module_id', $this->input->post('module_id'));
		$this->session->set_userdata('cluster_id', $this->input->post('cluster_id'));
		$this->session->set_userdata('unit_id', $this->input->post('unit_id'));

	}

	public function content($page=FALSE)
	{
		if($page !== FALSE)
		{
			switch ($page) {
				case 'read':
					$data['page_view'] = 'learn/read_v';
					break;
				
				case 'see':
					$data['page_view'] = 'learn/see_v';
					break;
				
				default:
					show_404();
					break;
			}

			$data['page_title'] = 'Learning Center';
			$this->imci_template('learn', $data);
		}
		else
		{
			show_404();
		}
	}

}