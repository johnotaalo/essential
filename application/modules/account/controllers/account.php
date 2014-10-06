<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Account extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->profile();
	}

	public function create()
	{
		$data = array(
			'page_title' => 'Create Account',
			'page_view' => 'account/create_account_v',
		);
		$this->imci_template('index', $data);
	}

	public function activate($id, $code)
	{

	}

	public function access()
	{
		$data = array(
			'page_title' => 'Login',
			'page_view' => 'account/access_account_v',
		);
		$this->imci_template('index', $data);
	}

	public function forgot_password()
	{
		$data = array(
			'page_title' => 'Forgot Password',
			'page_view' => 'account/forgot_password_v',
		);
		$this->imci_template('index', $data);
	}

	public function reset_password($id, $code)
	{

	}

	public function profile()
	{
		$data = array(
			'page_title' => 'Surname',
			'page_view' => 'account/profile_v',
		);
		$this->imci_template('index', $data);
	}

	public function edit($id=NULL)
	{
		$data = array(
			'page_title' => 'Edit Account',
			'page_view' => 'account/edit_profile_v',
		);
		$this->imci_template('index', $data);
	}

	public function logout()
	{
		$data = array(
			'page_title' => 'Sign Out Successful',
			'page_view' => 'account/logout_v',
		);
		$this->imci_template('index', $data);
	}

}