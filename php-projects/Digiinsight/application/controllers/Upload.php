<?php
class Upload extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('user_model');
	}
	public function index()
	{
		$this->load->view('user/upload_form', array('error' => ' ' ));
	}
	public function uploadProfileImage()
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
			$this->load->view('user/upload_form', $error);
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());
			$data = $this->upload->data();
			$this->user_model->profileImage($data['file_name']);
			redirect('user/profile');
		}
	}
	
}
?>