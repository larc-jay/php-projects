<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library(array('session'));
		$this->load->model('dashboard_model');
		$this->load->helper(array('form', 'url'));
	}

	public function index(){
		$this->load->view('dashboard/templates/header');
		$this->load->view('dashboard/index');
		$this->load->view('dashboard/templates/footer');
	}
	public function logout() {
		$this->session->unset_userdata('lms_logged_in');
		$this->session->sess_destroy();
		redirect(base_url()."index.php/dashboard");
	}
	public function dashboard(){
		$alluser['users']=$this->dashboard_model->get_all_user();
		$alluser['msg'] ="";
		$this->load->view('dashboard/templates/header');
		$this->load->view('dashboard/templates/sidebar');
		$this->load->view('dashboard/dashboard',$alluser);
		$this->load->view('dashboard/templates/footer');
	}
	public function login(){

		// create the data object
		$data = new stdClass();
		// load form helper and validation library
		$this->load->helper('form');
		$this->load->library('form_validation');

		// set validation rules
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$alluser['users']=$this->dashboard_model->get_all_user();
		$alluser['msg'] ="";
		if ($this->form_validation->run() == false) {
		
			// validation not ok, send validation errors to the view
			$this->load->view('dashboard/templates/header');
			$this->load->view('dashboard/templates/sidebar');
			$this->load->view('dashboard/dashboard',$alluser);
			$this->load->view('dashboard/templates/footer');

		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			if ($this->dashboard_model->resolve_user_login($username, $password)) {

				$user_id = $this->dashboard_model->get_user_id_from_username($username);
				$row    = $this->dashboard_model->get_user($user_id);

				$data = array(
					'username' => $row->username,
					'email' => $row->email,
					'user_type' => $row->user_type,
					'status' => $row->status,
					'logged_in' => (bool)true
				);
					
				$this->session->set_userdata($data);
				// user login ok
				$this->load->view('dashboard/templates/header');
				$this->load->view('dashboard/templates/sidebar');
				$this->load->view('dashboard/dashboard', $alluser);
				$this->load->view('dashboard/templates/footer');

			} else {

				// login failed
				$data->error = 'Wrong username or password.';
				// send error to the view
				$this->load->view('dashboard/templates/header');
				$this->load->view('dashboard/templates/sidebar');
				$this->load->view('dashboard/dashboard', $data);
				$this->load->view('dashboard/templates/footer');
			}
		}
	}
	public function getMainCategories(){
		$data['categories'] = $this->dashboard_model->get_main_category();
		$cat = $this->load->view('dashboard/maincategories',$data,TRUE);
		$this->output->set_output($cat);
	}
	public function getSubCategories(){
		$data['categories'] = $this->dashboard_model->get_sub_category();
		$cat = $this->load->view('dashboard/subcategories',$data,TRUE);
		$this->output->set_output($cat);
	}
	public function getCourseEnrollments(){
		$data['enrollments'] = $this->dashboard_model->get_course_enrollments();
		$cat = $this->load->view('dashboard/courseenrollments',$data,TRUE);
		$this->output->set_output($cat);
	}
	public function maincategory(){
		$cat = $this->load->view('dashboard/addmaincategory','',TRUE);
		$this->output->set_output($cat);
	}
	public function subcategory(){
		$data['maincategories'] =  $this->dashboard_model->get_main_category();
		$cat = $this->load->view('dashboard/addsubcategory',$data,TRUE);
		$this->output->set_output($cat);
	}
	/*public function addmaincategory(){
		$data=array(
			'course_name' => $this->input->post('catname'),
			'image' => $this->input->post('imageurl')
		);
		$id = $this->dashboard_model->addmaincategory($data);
		if($id>0){
			$resp['status'] ="success";
			$this->output->set_output(json_encode($resp));
		}else{
			$resp['status'] ="fails";
			$this->output->set_output(json_encode($resp));
		}
	}*/
	public function managedatavasetables(){
		if($this->input->get('dbflush')=="dbcleanupdb" && $this->input->get('flag')=="1"){
			$this->dashboard_model->manage_db_tables();
			echo "Database flushed";
		}else{
			echo "Error";
		}
	}
	public function addsubcategory(){
		$config['upload_path']          = UPLOADPATH;
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 3000;
		$config['max_width']            = 5024;
		$config['max_height']           = 1768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
			//$this->load->view('dashboard/dashboard', $error);
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());
			$data = $this->upload->data();
			$input = array(
				'cat_name' => $this->input->post('subcatname'),
				'image' => base_url().'static/images/'. $data['file_name'],
				'main_cat_id' => $this->input->post('maincatid'),
				'details' => $this->input->post('details')
			);
			$this->dashboard_model->addsubcategory($input);
			$alluser['users']=$this->dashboard_model->get_all_user();
			$alluser['msg'] ="Sub category added";
			$this->load->view('dashboard/templates/header');
			$this->load->view('dashboard/templates/sidebar');
			$this->load->view('dashboard/dashboard',$alluser);
			$this->load->view('dashboard/templates/footer');
		}
		
	}
	public function updatemaincategory(){
		$data=array(
			'course_name' => $this->input->post('catname'),
			'image' => $this->input->post('imageurl')
		);
		if($this->dashboard_model->updatemaincategory($data,$this->input->post('catid'))){
			$resp['status'] ="success";
			$this->output->set_output(json_encode($resp));
		}else{
			$resp['status'] ="fails";
			$this->output->set_output(json_encode($resp));
		}
	}
	public function updatesubcategory(){
		$data=array(
			'cat_name' => $this->input->post('catname'),
			'details' => $this->input->post('details'),
			'image' => $this->input->post('imageurl')
		);
		if($this->dashboard_model->updatesubcategory($data,$this->input->post('catid'))){
			$resp['status'] ="success";
			$this->output->set_output(json_encode($resp));
		}else{
			$resp['status'] ="fails";
			$this->output->set_output(json_encode($resp));
		}
	}
	public function  manageuser(){
		$data['users']=$this->dashboard_model->get_admin_user();
		$this->load->view('dashboard/templates/header');
		$this->load->view('dashboard/manageuser',$data);
		$this->load->view('dashboard/templates/footer');
	}
	public function addnewadminuser(){
		$data=array(
			'username' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
			'user_type' => 'ADMIN',
			'status' => 'ACTIVE',
		);
		if($this->dashboard_model->add_new_admin_user($data)>0){
			$resp['status'] ="success";
			$this->output->set_output(json_encode($resp));
		}else{
			$resp['status'] ="fails";
			$this->output->set_output(json_encode($resp));
		}
	}
	public function addmaincategory()
	{
		$config['upload_path']          = UPLOADPATH;
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 3000;
		$config['max_width']            = 5024;
		$config['max_height']           = 1768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
			//$this->load->view('dashboard/dashboard', $error);
		}
		else
		{
			//$data = array('upload_data' => $this->upload->data());
			$data = $this->upload->data();
			$input = array(
				'course_name' => $this->input->post('catname'),
				'image' =>base_url().'static/images/'. $data['file_name'],
				'description' => $this->input->post('desc')
			);
			$this->dashboard_model->addmaincategory($input);
			$alluser['users']=$this->dashboard_model->get_all_user();
			$alluser['msg'] ="Main category added";
			$this->load->view('dashboard/templates/header');
			$this->load->view('dashboard/templates/sidebar');
			$this->load->view('dashboard/dashboard',$alluser);
			$this->load->view('dashboard/templates/footer');
		}
	}
}
?>