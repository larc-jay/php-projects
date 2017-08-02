<?php
class Auth extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
	}
	public function signup()
	{
		$this->load->view('templates/header');
		$this->load->view('auth/signup');
		$this->load->view('templates/footer');
	}
	public function signupuser(){
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]',
		array(
				                'required'      => 'You have not provided %s.',
				                'is_unique'     => 'This %s already exists.'
				                )
				                );
				                $this->form_validation->set_rules('phone', 'Phone', 'required|regex_match[/^[0-9]{10}$/]');
				                $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
				                $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]');

				                $data['title'] = 'Register New User';
				                if ($this->form_validation->run() == FALSE)
				                {
				                	$this->load->view('templates/header', $data);
				                	$this->load->view('auth/signup');
				                	$this->load->view('templates/footer');
				                }
				                else
				                {
				                	$this->auth_model->set_users();
				                	$this->load->view('templates/header', $data);
				                	$this->load->view('auth/login');
				                	$this->load->view('templates/footer');
				                }
	}
	public function register(){
		$data = array(
		    	'first_name'=>$this->input->post('fname'),
		    	'last_name' =>$this->input->post('lname'),
		    	'email'=>$this->input->post('email'),
		    	'phone'=>$this->input->post('phone'),
		    	'user_type'=>'DEFAULT',
		    	'status'=>'ACTIVE',
		    	'password'=>hash('sha256', trim($this->input->post('passwd')))
		);
		$datar['results'] = $this->auth_model->set_users($data);
		$this->sendMailSignup($data);
		$this->output->set_output(json_encode($datar));
	}
	public function login()
	{
		$action=$this->input->get('action');
		
		if($action=='login'){
			$data=array(
				'lactive'=>'active',
				'factive'=>'',
				'lshow'=>'in active',
				'fshow'=>''
			);	
		}else{
			$data=array(
				'lactive'=>'',
				'factive'=>'active',
				'lshow'=>'',
				'fshow'=>'in active'
			);	
		}
		$res['data']=$data;
		return $this->load->view('auth/login',$res);
	}
	public function changePassword()
	{
		return $this->load->view('auth/changePassword');
	}
	public function userPasswordChange()
	{
		$oldpassword = $this->input->post('oldpasswd');
		$newpassword = $this->input->post('newpasswd');
		$renewpassword = $this->input->post('renewpasswd');
		if($this->auth_model->userPasswordChange($oldpassword, $newpassword , $renewpassword)){	
			$data['results']='success';	
			$this->output->set_output(json_encode($data));
		}else{
			$data['results']='fails';
			$this->output->set_output(json_encode($data));
		}
	}
	public function signin(){
		$data['results'] = $this->auth_model->login_auth($this->input->post('email'),$this->input->post('passwd'));
		$this->output->set_output(json_encode($data));
	}
	public function forgotPassword(){
		$userdata = $this->auth_model->forgot_password($this->input->post('email'));
		$enc_email = hash('sha256', trim($this->input->post('email')));
		$data = array(
			'user_id'=>$userdata->id,
			'enc_key'=>$enc_email
		);
		$resetPasswordId = $this->auth_model->setEncryption($data);
		if($resetPasswordId!=null && $resetPasswordId>0){
			$data['results']='success';
			$data['url']=WEBPATH.'auth/resetPassword?user_session='.$userdata->id.'&enc_key='.$enc_email.'&user_pwd_reset='.$resetPasswordId;
			$this->output->set_output(json_encode($data));
			$data['results']='success';
			//echo base_url().'index.php/auth/resetPassword?user_session='.$id.'&enc_key='.$enc_email.'&user_pwd_reset='.$resetPasswordId;
			$this->sendMail($this->input->post('email'),WEBPATH.'auth/resetPassword?user_session='.$userdata->id.'&enc_key='.$enc_email.'&user_pwd_reset='.$resetPasswordId,$userdata);
		}else{
			$data['results']='fails';
			$this->output->set_output(json_encode($data));
		}
	}
	public function resetPassword(){
		try{
			$data['rows'] = $this->auth_model->resetPasswordValidation($this->input->get('user_session'),$this->input->get('user_pwd_reset'),$this->input->get('enc_key'));
			$this->load->view('templates/header');
			$this->load->view('auth/resetPassword',$data);
			$this->load->view('templates/footer');
		}catch(Exception$e){
			var_dump($e->getMessage());
		}
	}
	public function resetNewPassword(){
		try{
			$this->auth_model->reset_new_password($this->input->post('uid'),$this->input->post('passwd'));
			$this->auth_model->reset_enc_version($this->input->post('rsid'));
			$data['results']='success';
			$this->output->set_output(json_encode($data));
		}catch(Exception$e){
			var_dump($e->getMessage());
			$data['results']='fails';
			$this->output->set_output(json_encode($data));
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('di_logged_in');
		$this->session->sess_destroy();
		redirect(base_url());
	}
	public function sendMail($to,$link,$userdata){
		$data=array(
			'link'=>$link,
			'email'=>$to,
			'username'=>$userdata->first_name.' '.$userdata->last_name
		);
		$this->load->library('email');
		$this->email->from('helpdesk@digiinsight.com', 'DigiInsight | Learn From EExperts');
		$this->email->to($to);
		$this->email->cc('learning@digiinsight.com');
		//$this->email->bcc('them@their-example.com');
		$this->email->subject('Reset Your Password for DigiInsight');
		$this->email->set_mailtype('html');
		$body = $this->load->view('templates/fp-email-tpl',$data,TRUE); 
		$this->email->message($body);
		if($this->email->send()) {
			return "success";
		}else{
			return "fails";
		}
	}
	public function sendMailSignup($data){
		$userdata = array(
			'username'=>$data['first_name'].' '.$data['last_name'],
			'email'=>$data['email']
		);
		$this->load->library('email');
		$this->email->from('helpdesk@digiinsight.com', 'DigiInsight | Learn From EExperts');
		$this->email->to($data['email']);
		$this->email->cc('learning@digiinsight.com');
		//$this->email->bcc('them@their-example.com');
		$this->email->subject('Welcome for register with DigiInsight');
		$this->email->set_mailtype('html');
		$body = $this->load->view('templates/welcome-email-tpl',$userdata,TRUE); 
		$this->email->message($body);
		if($this->email->send()) {
			return "success";
		}else{
			return "fails";
		}
	}
	public function fblogin(){
		
        // Include the facebook api php libraries
        include_once APPPATH."libraries/facebook-api/facebook.php";
        // Facebook API Configuration
        $appId = '444288462581567';   //245143745601356
        $appSecret = 'ed6f3db2247c98a369cee10be750cebc'; //ac66b0602a8c23fe5db9c8d4fcb6160e
        $redirectUrl = 'https://www.digiinsight.com/auth/fblogin';
        $fbPermissions = 'email';
        
        //Call Facebook API
        $facebook = new Facebook(array(
          'appId'  => $appId,
          'secret' => $appSecret
        
        ));
        $fbuser = $facebook->getUser();
        echo 'isUser :'.$fbuser;
        /*
        if($fbuser) {
            $userProfile = $facebook->api('/me?fields=id,first_name,last_name,email,gender,locale,picture');
            // Preparing data for database insertion
            $metaData= array();
            $user= array();


            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['first_name'];
            $userData['last_name'] = $userProfile['last_name'];
            $userData['email'] = $userProfile['email'];
            $userData['gender'] = $userProfile['gender'];
            $userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            $userData['picture_url'] = $userProfile['picture']['data']['url'];
            
            $user['user_type'] = 'FACEBOOK';
            $user['first_name'] = $userProfile['first_name'];
            $user['last_name'] = $userProfile['last_name'];
            $user['email'] = $userProfile['email'];
	    $user['status'] = 'ACTIVE';
            $metaData['oauth_uid']=$userProfile['id'];
            $metaData['gender']=$userProfile['gender'];
            $metaData['profile_url']=$userProfile['profile_url'];
            $metaData['picture_url']=$userProfile['picture_url']; 
            $metaData['locale']=$userProfile['locale'];
            $user['meta_data'] = json_encode($metaData);
            
           
            // Insert or update user data
            $userID = $this->auth_model->checkUser($userData,$user);
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
                redirect(base_url());
            } else {
               $data['userData'] = array();
            }
        } else {
            $fbuser = '';
            $data['authUrl'] = $facebook->getLoginUrl(array('redirect_uri'=>$redirectUrl,'scope'=>$fbPermissions));
        }
        */
        
         if ($fbuser) {
            $userProfile = $facebook->api('/me?fields=id,first_name,last_name,email,gender,locale,picture');
            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid'] = $userProfile['id'];
            $userData['first_name'] = $userProfile['first_name'];
            $userData['last_name'] = $userProfile['last_name'];
            $userData['email'] = $userProfile['email'];
            $userData['gender'] = $userProfile['gender'];
            $userData['locale'] = $userProfile['locale'];
            $userData['profile_url'] = 'https://www.facebook.com/'.$userProfile['id'];
            $userData['picture_url'] = $userProfile['picture']['data']['url'];
            // Insert or update user data
            $userID = $this->auth_model->checkUser($userData);
            if(!empty($userID)){
                $data['userData'] = $userData;
                $this->session->set_userdata('userData',$userData);
            } else {
               $data['userData'] = array();
            }
        } else {
            $fbuser = '';
            $data['authUrl'] = $facebook->getLoginUrl(array('redirect_uri'=>$redirectUrl,'scope'=>$fbPermissions));
        }
        $this->load->view('auth/fblogin',$data);
        //redirect(base_url());
        }
	 
}
?>