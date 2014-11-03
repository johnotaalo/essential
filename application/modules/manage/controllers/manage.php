<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Manage extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$data = array(
			'page_title' => 'Administrator Home',
			'page_view' => 'manage/home_v',
		);
		$this->imci_template('manage', $data);
	}

	public function users($type=FALSE, $action=FALSE, $id=NULL)
	{
		if($type !== FALSE || $action !== FALSE)
		{
			switch ($action) {
				case 'view':
					if($type === 'admins')
					{
						$data = array(
							'page_title' => 'System Administrator',
							'page_view' => 'manage/administrators_v',
						);
						$this->imci_template('manage', $data);
					}
					elseif($type === 'trainees')
					{
						$data = array(
							'page_title' => 'Trainees',
							'page_view' => 'manage/trainees_v',
						);
						$this->imci_template('manage', $data);
					}
					elseif($type === 'perfomance')
					{
						$data = array(
							'page_title' => 'Trainee Perfomance',
							'page_view' => 'manage/trainee_perfomance_v',
						);
						$this->imci_template('manage', $data);
					}
					else
					{
						show_404();
					}
					break;
				
				default:
					# code...
					break;
			}
		}
		else
		{
			show_404();
		}
	}

	public function media($type=FALSE, $action=FALSE, $id=NULL)
	{
		if($type !== FALSE || $action !== FALSE)
		{
			switch ($action) {
				case 'view':
					$data = array(
						'page_title' => 'Media View',
						'page_view' => 'manage/media_v',
					);
					$this->imci_template('manage', $data);
					break;
				
				default:
					# code...
					break;
			}
		}
		else
		{
			show_404();
		}
	}

	public function exams($action=FALSE, $id=NULL)
	{
		if($action !== FALSE)
		{
			switch ($action) {
				case 'view':
					$data = array(
						'page_title' => 'Tests & Exams',
						'page_view' => 'manage/exams_v',
					);
					$this->imci_template('manage', $data);
					break;
				
				default:
					# code...
					break;
			}
		}
		else
		{
			show_404();
		}
	}

	public function upload($type=FALSE)
	{
		if($type !== FALSE)
		{
			switch ($type) {
				case 'admin':
					$data = array(
						'page_title' => 'Add Administrator',
						'page_view' => 'manage/add_admin_v',
					);
					break;
				
				case 'media':
					$data = array(
						'page_title' => 'Add Media',
						'page_view' => 'manage/add_media_v',
					);
					break;
				
				case 'material':
					$data = array(
						'page_title' => 'Add Reading Material',
						'page_view' => 'manage/add_material_v',
					);
					break;
				
				case 'exam':
					$data = array(
						'page_title' => 'Add Exam',
						'page_view' => 'manage/add_exam_v',
					);
					break;
				
				default:
					# code...
					break;
			}

			$this->imci_template('manage', $data);
		}
		else
		{

		}
	}

}