<?php
class Checkout extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('checkout_model');
		$this->load->library('cart');
		$this->load->library('breadcrumbs');
	}
	public function  index(){
		$this->breadcrumbs->push('Home','/');
		$this->breadcrumbs->push('Checkout', '/checkout/checkout');
		if(count($this->cart->contents())>0){
			$inputdata = array(
			'user_id' => $this->session->di_id,
			'transaction_status'=>'processing',
			'order_status' => 'pending',
			);
			$amount =  $this->cart->total() + $this->cart->total()* TAX_PERCENT/100;
			$data['order'] = $this->checkout_model->set_order($inputdata);
			$data['amount'] = $amount;
			$data['success']='success';
			$this->load->view('templates/header');
			$this->load->view('checkout/checkout',$data);
			$this->load->view('templates/footer');
		}else{
			$data['success']='fails';
			$this->load->view('templates/header');
			$this->load->view('checkout/checkout',$data);
			$this->load->view('templates/footer');
		}
	}
	public function payment(){
				$data = array(
					'tid'=>$this->input->post('orderId'),
					'merchant_id'=>'109826',
					'amount'=>$this->cart->total() + $this->cart->total()*TAX_PERCENT/100,
					'order_id'=>$this->input->post('orderId'),
					'currency'=>'INR',
					'redirect_url'=>WEBPATH.'payment/success',
					'cancel_url'=>WEBPATH.'payment/cancelorder',
					'language'=>'EN',
					'billing_name'=>$this->input->post('billing_name'),
					'billing_address'=>$this->input->post('billing_address'),
					'billing_city'=>$this->input->post('billing_city'),
					'billing_state'=>$this->input->post('billing_state'),
					'billing_zip'=>$this->input->post('billing_zip'),
					'billing_country'=>$this->input->post('billing_country'),
					'billing_tel'=>$this->input->post('billing_tel'),
					'billing_email'=>$this->input->post('billing_email'),
					'integration_type'=>'iframe_normal'
				);
				$billing =array(
					'name'=>$this->input->post('billing_name'),
					'address'=>$this->input->post('billing_address'),
					'city'=>$this->input->post('billing_city'),
					'state'=>$this->input->post('billing_state'),
					'zip'=>$this->input->post('billing_zip'),
					'country'=>$this->input->post('billing_country'),
					'phone'=>$this->input->post('billing_tel'),
					'email'=>$this->input->post('billing_email'),
					'user_id' => $this->session->di_id,
					'order_id' =>$this->input->post('orderId')
				);
				$formData['formValues']=$data;
				$id = $this->checkout_model->set_billing_details($billing);
				$payment = $this->load->view('checkout/payment',$formData,TRUE);
				$this->output->set_output($payment);
	}
	public function paymentInstant(){
				$data = array(
					'tid'=>$this->input->post('orderId'),
					'merchant_id'=>'109826',
					'amount'=>8625,
					'order_id'=>$this->input->post('orderId'),
					'currency'=>'INR',
					'redirect_url'=>WEBPATH.'payment/order_success',
					'cancel_url'=>WEBPATH.'payment/cancelorder',
					'language'=>'EN',
					'billing_name'=>$this->input->post('billing_name'),
					'billing_address'=>$this->input->post('billing_address'),
					'billing_city'=>$this->input->post('billing_city'),
					'billing_state'=>$this->input->post('billing_state'),
					'billing_zip'=>$this->input->post('billing_zip'),
					'billing_country'=>$this->input->post('billing_country'),
					'billing_tel'=>$this->input->post('billing_tel'),
					'billing_email'=>$this->input->post('billing_email'),
					'integration_type'=>'iframe_normal'
				);
				$billing =array(
					'name'=>$this->input->post('billing_name'),
					'address'=>$this->input->post('billing_address'),
					'city'=>$this->input->post('billing_city'),
					'state'=>$this->input->post('billing_state'),
					'zip'=>$this->input->post('billing_zip'),
					'country'=>$this->input->post('billing_country'),
					'phone'=>$this->input->post('billing_tel'),
					'email'=>$this->input->post('billing_email'),
					'user_id' =>1
				);
				$formData['formValues']=$data;
				$id = $this->checkout_model->set_billing_details($billing);
				$payment = $this->load->view('checkout/payment',$formData,TRUE);
				$this->output->set_output($payment);
	}
	
	public function instantbooking(){
		$inputdata = array(
			'user_id' => 1,
			'transaction_status'=>'processing',
			'order_status' => 'pending',
		);
		$response['orderId'] = $this->checkout_model->set_order($inputdata);
		$response['amount']=69999;
		$response['userid']=1;
		
		$this->load->view('templates/header');
		$this->load->view('checkout/instantbooking',$response);
		$this->load->view('templates/footer');
	}
	public function Agile_NCR_Conference_2016(){
		$inputdata = array(
			'user_id' => 1,
			'transaction_status'=>'processing',
			'order_status' => 'pending',
		);
		$response['orderId'] = $this->checkout_model->set_order($inputdata);
		$response['amount']=7500;
		$response['userid']=1;
		
		$this->load->view('templates/header');
		$this->load->view('checkout/instantbooking',$response);
		$this->load->view('templates/footer');
	}
}
?>