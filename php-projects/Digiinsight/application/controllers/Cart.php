<?php 
class Cart extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('cart_model');
		$this->load->library('breadcrumbs');
	}
	public function cart()
	{
		$this->cart_model->getScheduleForCart($this->input->get('sid'));
	}
	public function ordercart() {
		//$this->breadcrumbs->push('Home','/');
		//$this->breadcrumbs->push('Course Vendors', '/courses/coursesvenders');
		//$this->breadcrumbs->push('Order Cart', '/cart/ordercart');
		$this->load->view('templates/header');
		$this->load->view('cart/ordercart');
		$this->load->view('templates/footer');
	}
	public function updatecart(){
		$data = array(
			'rowid'=>$this->input->post('rowid'),
			'qty'=>$this->input->post('qty')
		);
		$this->cart_model->updatecart($data);
		$this->session->set_tempdata('cartcount', count($this->cart->contents(), 300));
	}
	public function guestuser(){
		//print_r($this->input->post());
		$data = array(
		    	'first_name'=>$this->input->post('name'),
		    	'last_name' =>'',
		    	'email'=>$this->input->post('email'),
		    	'phone'=>$this->input->post('mobile'),
		    	'user_type'=>'GUEST',
		    	'status'=>'ACTIVE',
		    	'password'=>hash('sha256', trim($this->input->post('mobile')))
		);
		$userId = $this->cart_model->set_users($data);
		if($userId > 0){
				$resp['results']='success';
				$this->output->set_output(json_encode($resp));
		}else{
			$resp['results']='fails';
			$this->output->set_output(json_encode($resp));
		}
	}
	public function clear_cart(){
		$this->cart_model->clear_cart();
	}
}
?>