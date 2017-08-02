<?php
class Api_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function set_user($data){
		$this->db->insert('user_confermation', $data);
		$id=$this->db->insert_id();
		return $id;
	}
	public function login_auth($user,$pass){
		$this->load->helper('url');
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username', $user);
		$this->db->where('password', $pass);
		$query = $this->db->get();
		
		if($query->num_rows() == 1)
		{
			$row = $query->row();
			$data = array(
					'username' => $row->username,
					'logged_in' => true
					);
					
			$this->session->set_userdata($data);
			return "success";
		}
		return "fails";
	}
	public function record_count(){
		 return $this->db->count_all("user_confermation");
	}
 	public function fetch_users($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("user_confermation");

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
   }
}