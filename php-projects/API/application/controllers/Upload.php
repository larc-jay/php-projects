<?php

class Upload extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('dashboard_model');
	}
	public function addmaincategory()
	{
		$config['upload_path']          = UPLOADPATH;
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());
			echo $error;
			//$this->load->view('dashboard/dashboard', $error);
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());
			$data = $this->upload->data();
			$input = array(
				'course_name' => $this->input->post('catname'),
				'image' => $data['file_name']
			);
			$this->dashboard_model->addmaincategory($input);
			$alluser['users']=$this->dashboard_model->get_all_user();
		$this->load->view('dashboard/templates/header');
		$this->load->view('dashboard/templates/sidebar');
		$this->load->view('dashboard/dashboard',$alluser);
		$this->load->view('dashboard/templates/footer');
		}
	}
}