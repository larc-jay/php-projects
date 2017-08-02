<?php
class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library('session');
	}
	public function profile()
	{
		$profile =  $this->user_model->professional_summary();
		$userDetails = $this->user_model->userDetails();
		$datap['rows'] = $profile;
		$datap['userDetails']=$userDetails;
		$data['basicprofile']=$this->load->view('user/basicprofile',$datap, TRUE);
		$data['profileimage']=$profile->image;
		$this->load->view('templates/header');
		$this->load->view('user/profile',$data);
		$this->load->view('templates/footer');
	}
	/*public function profileOnly(){
		$datap['rows']  =  $this->user_model->professional_summary();
		$this->load->view('user/basicprofile',$rows);
		}*/
	public function updateProfile()
	{
		try{
			$profile=array(
					'contact'=>	$this->input->post('contact'),
				 	'dob'=>	$this->input->post('dob'),
					'designation'=>	$this->input->post('desi'),
					'organization'=>$this->input->post('orgni'),
					'address'=>	$this->input->post('address'),
					'professional_summary'=>$this->input->post('psummary'),
					'skills_education'=>$this->input->post('skills')
			);
			$user = array(
					'first_name'=>	$this->input->post('fname'),
					'last_name'=>	$this->input->post('lname'),
					'email'=>	$this->input->post('email'),
					'phone'=>	$this->input->post('phone')
			);
			$this->user_model->update_profile($profile);
			$this->user_model->update_user($user);
			$data['results']='success';
			$this->output->set_output(json_encode($data));
		}catch(Exception $e){
			var_dump($e->getMessage());
			$data['results']='fails';
			$this->output->set_output(json_encode($data));
		}
	}
	public function getMyLearnings(){
		$data['mylearnings']=$this->user_model->getMyLearnings();
		$courses = $this->load->view('user/mylearnings',$data, TRUE);
		$this->output->set_output($courses);
	}
	public function subscribe(){
		$data=array(
			'email' =>$this->input->get('email')
		);
		if($this->user_model->subscribe($data)){
			$data['results']='success';
			$data['message']='Thanks for subscribing with digiinsight';
			$this->output->set_output(json_encode($data));
		}else{
			$data['results']='success';
			$data['message']='You have already subscribe';
			$this->output->set_output(json_encode($data));
		}
	}
	public function getMySchedules(){
		$data['myschedules']=$this->user_model->getMySchedules();
		$courses = $this->load->view('user/myschedules',$data, TRUE);
		$this->output->set_output($courses);
	}
	public function addattendees(){
		$data = array(
			'order_id'=> $this->input->get('oid'),
			'name'=> $this->input->get('name'),
			'email'=> $this->input->get('email'),
			'phone'=> $this->input->get('mobile'),
			'organization'=> $this->input->get('org'),
			'city'=> $this->input->get('city'),
			'country'=> $this->input->get('country')
		);
		$id=$this->user_model->addattendees($data);
		$this->output->set_output($id);
	}
}
?>