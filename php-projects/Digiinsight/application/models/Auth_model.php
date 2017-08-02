<?php
class Auth_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		 $this->tableName = 'fb_users';
        $this->primaryKey = 'id';
	}
	public function set_users($data)
	{
		$this->load->helper('url');
		$this->db->insert('users', $data);
		$id=$this->db->insert_id();
		$profile=array(
			'user_id'=>$id
		);
		$this->db->insert('profile', $profile);
		if($id>0){
			return "success";
		}else{
			return "fails";
		}
	}
	public function getUser(){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id',$this->session->di_logged_in);
		$query = $this->db->get();
		return $query->row();
	}
	public function login_auth($user,$pass){
		$this->load->helper('url');
		$password = hash('sha256', $pass);
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('status', 'ACTIVE');
		$this->db->where('email', $user);
		$this->db->where('password', $password);
		$query = $this->db->get();
		
		if($query->num_rows() == 1)
		{
			$row = $query->row();
			$data = array(
					'di_id' => $row->id,
					'di_fname' => $row->first_name,
					'di_lname' => $row->last_name,
					'di_email' => $row->email,
					'di_phone' => $row->phone,
					'di_type' => $row->user_type,
					'di_status' => $row->status,
					'di_logged_in' => true
					);
					
			$this->session->set_userdata($data);
			return "success";
		}
		return "fails";
	}
	public function forgot_password($email)
	{
		$this->load->helper('url');
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email', $email);
		$query = $this->db->get();
		if($query->num_rows() == 1)
		{
			return $query->row();
		}else{
			return null;
		}
	}
	public function resetPasswordValidation($userId , $resetId, $encKey){
		$this->load->helper('url');
		$this->db->select('*');
		$this->db->from('reset_password');
		$this->db->where('id', $resetId);
		$this->db->where('user_id', $userId);
		$this->db->where('enc_key', $encKey);
		$this->db->where('version',0);
		$this->db->order_by('id', 'DESC'); 
		$this->db->limit(1); 
		$query = $this->db->get();
		if($query->num_rows() == 1)
		{
			$row = $query->result_array();
			return $row;
		}else{
			return null;
		}
	}
	public function reset_new_password($uid,$passwd){
		$this->load->helper('url');
		$this->db->set('password',hash('sha256', $passwd));
		$this->db->where('id',$uid);
		$this->db->update('users');
	}
	public function reset_enc_version($sid){
		$this->load->helper('url');
		$this->db->set('version', 1);
		$this->db->where('id',$sid);
		$this->db->update('reset_password');
	}
	public function setEncryption($data){
		$this->load->helper('url');
		$this->db->insert('reset_password', $data);
		return $this->db->insert_id();
	}
	public function change_password($uid,$passwd){
		$this->load->helper('url');
		$this->db->set('password',hash('sha256', $passwd));
		$this->db->where('id',$uid);
		if($this->db->update('users')){
			return true;
		}else{
			return false;
		}
	}
	public function userPasswordChange($oldp, $newp , $renewp){
		$this->load->helper('url');
		$user = $this->getUser();
		if($user->password == hash('sha256', $oldp)){
			if($this->change_password($this->session->di_logged_in,$newp)){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
    public function checkUser($data = array()){
        $this->db->select($this->primaryKey);
        $this->db->from($this->tableName);
        $this->db->where(array('oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid']));
        $prevQuery = $this->db->get();
        $prevCheck = $prevQuery->num_rows();
        
        if($prevCheck > 0){
            $prevResult = $prevQuery->row_array();
            $data['modified'] = date("Y-m-d H:i:s");
            $update = $this->db->update($this->tableName,$data,array('id'=>$prevResult['id']));
            $userID = $prevResult['id'];
        }else{
            $data['created'] = date("Y-m-d H:i:s");
            $data['modified'] = date("Y-m-d H:i:s");
            $insert = $this->db->insert($this->tableName,$data);
          //  $insert1 = $this->db->insert('users',$user);
            $userID = $this->db->insert_id();
        }

        return $userID?$userID:FALSE;
    }
}

?>