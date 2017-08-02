<?php
class Api_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function set_user($data){
		$this->db->insert('users', $data);
		$id=$this->db->insert_id();
		return $id;
	}
	public function get_user($email){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$email);
		$query = $this->db->get();
		return $query->row();
	}
	public function is_exists_user($email){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$email);
		$query = $this->db->get();
		if($query->num_rows() == 1)
		return true;
		else
		return false;
	}
	public function user_login($username, $password) {
		$this->db->select('password');
		$this->db->from('users');
		$this->db->where('email', $username);
		$hash = $this->db->get()->row('password');
		return $this->verify_password_hash($password, $hash);
	}
	private function verify_password_hash($password, $hash) {
		return password_verify($password, $hash);
	}
	public function forgot_password($email,$passwd){
		if($this->db->query('update users set password=\''.$passwd.'\' where email=\''.$email.'\'')){
			return true;
		}else{
			return false;
		}
	}
	public function get_main_categories(){
		$this->db->select('id as courseid, course_name as coursename, image,description');
		$this->db->from('main_categories');
		$query =  $this->db->get();
		return $query->result_array();
	}
	public function get_sub_categories($name){
		$this->db->select('sub_categories.id as subcatid,sub_categories.cat_name as subcatname, sub_categories.details as details, sub_categories.image as image');
		$this->db->from('sub_categories');
		$this->db->join('main_categories', 'main_categories.id = sub_categories.main_cat_id');
		$this->db->where('main_categories.course_name',$name);
		$query =  $this->db->get();
		return $query->result_array();
	}
	public function is_duplicate_enrollment($data){
		$this->db->select("*");
		$this->db->from('course_enrollment');
		$this->db->where('user_id',$data['user_id']);
		$this->db->where('course_id',$data['course_id']);
		$this->db->where('course_fee',$data['course_fee']);
		$this->db->where('payment_id',$data['payment_id']);
		$query = $this->db->get();
		if($query->num_rows() == 1){
			return false;
		}else{
			return true;
		}
	}
	public function course_enrollment($data){
		if($this->is_duplicate_enrollment($data)){
			$this->db->insert('course_enrollment', $data);
			return $this->db->insert_id();
		}else{
			return 0;
		}
	}
}