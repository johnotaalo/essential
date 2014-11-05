<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Docs extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$data = array(
			'page_title' => 'IMCI Documents',
			'page_view' => 'docs/home_v',
		);
		$this->imci_template('docs', $data);
	}

	public function read($topic=FALSE)
	{
		if($topic !== FALSE)
		{
			$data = array(
				'page_title' => 'Document Title',
				'page_view' => 'docs/document_v',
			);
			$this->imci_template('docs', $data);
		}
		else
		{
			show_404();
		}
	}

}