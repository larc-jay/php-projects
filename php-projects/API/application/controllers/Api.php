<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Api extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('api_model');
	}
	public function register(){
		$this->load->helper(array('url'));
		$userData = array(
			'first_name'=>$this->input->post('firstName'),
			'last_name'=>$this->input->post('lastName'),
			'email'=>$this->input->post('email'),
			'dob'=>$this->input->post('dateofBirth'),
			'country'=>$this->input->post('countryName'),
			'password'=>password_hash($this->input->post('password'), PASSWORD_BCRYPT)
		);
		if($this->api_model->is_exists_user($this->input->post('email'))){
			$data['success']=0;
			$data['registration']="user already exists";
			$this->output->set_output(json_encode($data));
		}else{
			$id = $this->api_model->set_user($userData);
			if($id>0){
				$data['success']=1;
				$data['registration']="success";
				$this->output->set_output(json_encode($data));
			}else{
				$data['success']=0;
				$data['registration']="fail";
				$this->output->set_output(json_encode($data));
			}
		}
	}
	public function login(){
		$this->load->helper(array('url'));
		if($this->api_model->is_exists_user($this->input->post('email'))){
			if($this->api_model->user_login($this->input->post('email'), $this->input->post('password'))){
				$user = $this->api_model->get_user($this->input->post('email'));
				$data['success']=1;
				$data['msg']="login success";
				$data['userId']=$user->id;
				$this->output->set_output(json_encode($data));
			}else{
				$data['success']=0;
				$data['msg']="login fails, you have entered wrong password";
				$this->output->set_output(json_encode($data));
			}
		}
		else{
			$data['success']=0;
			$data['msg']="user does not exists, please register first";
			$this->output->set_output(json_encode($data));
		}
	}
	public function forgotPassword(){
		if($this->api_model->forgot_password($this->input->post('email'),password_hash($this->input->post('password'), PASSWORD_BCRYPT))){
			$data['success']=1;
			$data['msg']="Password update success";
			$this->output->set_output(json_encode($data));
		}else{
			$data['success']=1;
			$data['msg']="Password update failed";
			$this->output->set_output(json_encode($data));
		}
	}
	public function getMainCategories(){
		$data =  $this->api_model->get_main_categories();
		if($data!=null){
			$response['data']=$data;
			$response['success']=1;
			$response['msg']='all data';
			$this->output->set_output(json_encode($response));
		}else{
			$response['success']=0;
			$response['msg']='no data';
			$this->output->set_output(json_encode($response));
		}
	}
	public function getSubCategories(){
		$data =  $this->api_model->get_sub_categories($this->input->post('name'));
		if($data!=null){
			$response['data']=$data;
			$response['success']=1;
			$response['msg']='all data';
			$this->output->set_output(json_encode($response));
		}else{
			$response['success']=0;
			$response['msg']='no data';
			$this->output->set_output(json_encode($response));
		}
	}
	public function  courseEnrollment(){
		$cdata = array(
			'user_id'=>$this->input->post('userId'),
			'course_id'=>$this->input->post('courseId'),
			'course_fee'=>$this->input->post('courseFee'),
			'payment_id'=>$this->input->post('paymentId'),
			'payment_status'=>$this->input->post('paymentStatus')
		);
		$id = $this->api_model->course_enrollment($cdata);
		if($id>0){
			$data['success']=1;
			$data['msg']="success";
			$this->output->set_output(json_encode($data));
		}else{
			$data['success']=0;
			$data['msg']="fail";
			$this->output->set_output(json_encode($data));
		}
	}
}

