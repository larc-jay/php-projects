<?php
class Payment extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('payment_model');
		$this->load->library('cart');
	}
	public function  successs(){
		$response['billings'] = $this->payment_model->getBillingAddress(100);
		$response['orderId']=102;
		$response['transactionId']=1121211221;
		$response['bankRefNo']=323223322321;
		$response['status']="Success";
		$response['message']="Your registration has been confirmed, We have provided your order information below.";
		$this->load->view('templates/header');
		$this->load->view('payment/success',$response);
		$this->load->view('templates/footer');
	}
	public function  success(){
		$this->load->library('crypto');
		$encResponse=$this->input->post('encResp');			//This is the response sent by the CCAvenue Server
		$workingKey='286124AEA1259E445B93C5EC5DC4CE5C';		//Working Key should be provided here.
		$rcvdString=$this->crypto->decrypt($encResponse,$workingKey);//Crypto Decryption used as per the specified working key.
		$order_status="";
		$decryptValues=explode('&', $rcvdString);
		$dataSize=sizeof($decryptValues);
		$response['status']="";
		$order_id="";
		for($i = 0; $i < $dataSize; $i++)
		{
			$information=explode('=',$decryptValues[$i]);
			if($i==3){	
				$order_status=$information[1];
			}
			if($i==0){
				$order_id = $information[1];
			}
			if($i==1){
				$response['transactionId'] = $information[1];
			}
			if($i==2){
				$response['bankRefNo'] = $information[1];
			}
		}
		$response['orderId'] = $order_id;
		if($order_status=="Success")
		{
			$response['message']="Your registration has been confirmed, We have provided your order information below. ";
			$response['status']=$order_status;
			$this->payment_model->updateOrder($order_id,'success','complete');
		}
		else if($order_status=="Aborted")
		{
			$response['message']="Thank you for register with us.We will keep you posted regarding the status of your registration through e-mail";
			$response['status']="aborted";	
			$this->payment_model->updateOrder($order_id,'processing','aborted');
			$response['transactionId'] = "None";
			$response['bankRefNo'] =  "None";
		}
		else if($order_status=="Failure")
		{
			$response['message']="Thank you for shopping training with us. However,the transaction has been declined.";
			$response['status']="Failure";
			$this->payment_model->updateOrder($order_id,'processing','failure');
			$response['transactionId'] = "None";
			$response['bankRefNo'] =  "None";
		}
		else
		{
			$response['message']="Security Error. Illegal access detected";
			$response['status']="Security Error. Illegal access detected";
			$this->payment_model->updateOrder($order_id,'processing','error');
			$response['transactionId'] = "None";
			$response['bankRefNo'] =  "None";
		}
		$transaction = array();
		for($i = 0; $i < $dataSize; $i++)
		{
			$information=explode('=',$decryptValues[$i]);
			$transaction[$information[0]]=$information[1];
		}
		
		$this->payment_model->addOrderDetails($order_id);
		$this->payment_model->set_transaction($transaction);
		$this->sendEmail($transaction);
		$this->load->view('payment/success',$response);
	}
	public function  order_success(){
		$this->load->library('crypto');
		$encResponse=$this->input->post('encResp');			//This is the response sent by the CCAvenue Server
		$workingKey='286124AEA1259E445B93C5EC5DC4CE5C';		//Working Key should be provided here.
		$rcvdString=$this->crypto->decrypt($encResponse,$workingKey);//Crypto Decryption used as per the specified working key.
		$order_status="";
		$decryptValues=explode('&', $rcvdString);
		$dataSize=sizeof($decryptValues);
		$response['status']="";
		$order_id="";
		for($i = 0; $i < $dataSize; $i++)
		{
			$information=explode('=',$decryptValues[$i]);
			if($i==3){	
				$order_status=$information[1];
			}
			if($i==0){
				$order_id = $information[1];
			}
		}
		if($order_status==="Success")
		{
			$response['message']="<p>Thank you,</p> <p>You have successfully register training. <p/><p>Your order id is ".$order_id;
			$response['status']="success";
			$this->payment_model->updateOrder($order_id,'success','complete');
		}
		else if($order_status==="Aborted")
		{
			$response['message']="<p>Thank you for register with us.We will keep you posted regarding the status of your registration through e-mail</p>";
			$response['status']="aborted";	
			$this->payment_model->updateOrder($order_id,'processing','aborted');
		}
		else if($order_status==="Failure")
		{
			$response['message']="<p>Thank you for shopping training with us. However,the transaction has been declined.</p>";
			$response['status']="Failure";
			$this->payment_model->updateOrder($order_id,'processing','failure');
		}
		else
		{
			$response['message']="<p>Security Error. Illegal access detected</p>";
			$response['status']="Security Error. Illegal access detected";
			$this->payment_model->updateOrder($order_id,'processing','error');
		}
		$transaction = array();
		for($i = 0; $i < $dataSize; $i++)
		{
			$information=explode('=',$decryptValues[$i]);
			$transaction[$information[0]]=$information[1];
		}
		$this->payment_model->addOrderDetailsInstant($order_id);
		$this->payment_model->set_transaction($transaction);
		$response['billings'] = $this->payment_model->getBillingAddress($order_id);
		$this->payment_model->clear_cart();
		$this->load->view('templates/header');
		$this->load->view('payment/order_success',$response);
		$this->load->view('templates/footer');
	}
	public function  cancelorder(){
		$this->load->view('templates/header');
		$this->load->view('payment/cancelorder');
		$this->load->view('templates/footer');
	}
	public function  attendees(){
		$data = array(
			'order_id'=>$this->input->post('orderId'),
			'name'=>$this->input->post('name'),
			'email'=>$this->input->post('email'),
			'phone'=>$this->input->post('phone'),
			'organization'=>$this->input->post('org'),
			'city'=>$this->input->post('city'),
			'country'=>$this->input->post('country')
		);
		$this->payment_model->set_attendees($data);
		$resp['attendees'] = $this->payment_model->get_attendees($this->input->post('orderId'));
		$att = $this->load->view('payment/attendees',$resp,TRUE); 
		$this->output->set_output($att);
	}
	public function sendEmail($transation){
        $billings=$transation['billing_name'].'<br>'.$transation['billing_address'].', '.$transation['billing_city'].'<br>'.$transation['billing_state'].'-'.$transation['billing_zip'].', '.$transation['billing_country'];
        $program='';
        $grandtotle=0;
        foreach ($this->cart->contents() as $items): 
        	$tax = $items['price']*TAX_PERCENT/100;
			$grandtotle =$grandtotle + $items['price']*TAX_PERCENT/100+$items['price'];
			$program=$program.', '.$items['course'];
		 endforeach;
        
    	$data=array(
			'order_id'=>$transation['order_id'],
			'billings'=>$billings,
			'username'=>$this->session->di_fname.' '.$this->session->di_lname,
    		'program'=>$program,
    		'price'=>$grandtotle
		);
		$this->load->library('email');
		$this->email->from('helpdesk@digiinsight.com', 'DigiInsight | Learn From EExperts');
		$this->email->to($to);
		$this->email->cc('learning@digiinsight.com');
		//$this->email->bcc('them@their-example.com');
		$this->email->subject('Registration Successful');
		$this->email->set_mailtype('html');
		$body = $this->load->view('templates/order-email-tpl',$data,TRUE); 
		$this->email->message($body);
		if($this->email->send()) {
			return "success";
		}else{
			return "fails";
		}
	}
}
?>