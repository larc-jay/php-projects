<?php

class MailSender extends CI_Controller {
	public function sendMail($to,$link){
		$this->load->library('email');
		$this->email->from('helpdesk@digiinsight.com', 'DigiInsight | Learn From Experts');
		$this->email->to($to);
		$this->email->cc('learning@digiinsight.com');
		$this->email->set_mailtype('html');
		//$this->email->bcc('them@their-example.com');
		$this->email->subject('Reset Your Password for DigiInsight');
		$this->email->message('Dear Candidate,<br><br>Please click to link for reset your password :'.$link);
		if($this->email->send()) {
		 	return "success";
		 }else{
		 	return "fails";
		 }
	}
}
?>