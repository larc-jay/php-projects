<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('api_model');
		$this->load->library("pagination");
		$this->load->helper("url");
	}
	public function index()
	{
		$this->load->view('helper/header');
		$this->load->view('invitation/login');
		$this->load->view('helper/footer');
	}

	public function send()
	{
		$emails = $this->input->post('emails');
		$emailsArray =  preg_split('/[\s\n]/', $emails );

		foreach($emailsArray as $em){
			$this->sendMail($em);
		}
		$data['emails'] = $emailsArray;
		$this->load->view('helper/header');
		$this->load->view('invitation/success',$data);
		$this->load->view('helper/footer');
	}
	public function confirm(){
		$data = array(
			'email' => $this->input->get('email'),
			'location' => $this->input->get('loc')
		);
		$this->api_model->set_user($data);
		$this->sendConfirmMail($this->input->get('email'));
		$this->load->view('helper/header');
		$this->load->view('invitation/confirmed',$data);
		$this->load->view('helper/footer');
	}
	public function sendMail($email){
		$data = array(
			'email' =>$email
		);
		$this->load->library('email');
		$this->email->from('helpdesk@digiinsight.com', 'Navigators Logistics Ltd - INTERNATIONAL OFFICE LAUNCH EVENT');
		$this->email->to($data['email']);
		$this->email->cc('learning@digiinsight.com');
		//$this->email->bcc('them@their-example.com');
		$this->email->subject('Navigators Logistics Ltd - INTERNATIONAL OFFICE LAUNCH EVENT');
		$this->email->set_mailtype('html');
		$body1 = $this->load->view('template/tmp-1',$data,TRUE);
		$body2 = $this->load->view('template/tmp-2',$data,TRUE);
		$body3 = $this->load->view('template/tmp-3',$data,TRUE);
		$this->email->message($body1.$body2.$body3);
		if($this->email->send()) {
			return "success";
		}else{
			return "fails";
		}
	}
	public function invitation(){
		$data['results'] = $this->api_model->login_auth($this->input->post('username'),$this->input->post('passwd'));
		$this->output->set_output(json_encode($data));
		$this->load->view('helper/header');
		$this->load->view('invitation/invt');
		$this->load->view('helper/footer');
	}
	public function sendConfirmMail($email){
		$data = array(
			'email' =>$email
		);
		$this->load->library('email');
		$this->email->from($email, 'Navigators Logistics Ltd - INTERNATIONAL OFFICE LAUNCH EVENT');
		$this->email->to('helpdesk@digiinsight.com');
		//$this->email->cc('learning@digiinsight.com');
		//$this->email->bcc('them@their-example.com');
		$this->email->subject('User confirmation');
		$this->email->set_mailtype('html');
		//$body = $this->load->view('template/invitation-tpl',$data,TRUE);
		$this->email->message("Confirmed by user ".$email);
		if($this->email->send()) {
			return "success";
		}else{
			return "fails";
		}
	}
	public function userlist(){
		$config = array();
		$config["base_url"] = base_url() . "index.php/api/userlist";
		$config["total_rows"] = $this->api_model->record_count();
		$config["per_page"] = 10;
		$config["uri_segment"] = 3;
		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["results"] = $this->api_model->fetch_users($config["per_page"], $page);
		$data["links"] = $this->pagination->create_links();
		$this->load->view('helper/header');
		$this->load->view("user/list", $data);
		$this->load->view('helper/footer');
	}
}