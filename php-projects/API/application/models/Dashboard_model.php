<?php
class Dashboard_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function resolve_user_login($username, $password) {
		$this->db->select('password');
		$this->db->from('admin_user');
		$this->db->where('email', $username);
		$hash = $this->db->get()->row('password');
		return $this->verify_password_hash($password, $hash);
	}
	
	private function verify_password_hash($password, $hash) {
		return password_verify($password, $hash);
	}
	public function get_user_id_from_username($username) {
		$this->db->select('id');
		$this->db->from('admin_user');
		$this->db->where('email', $username);
		return $this->db->get()->row('id');
	}
	public function manage_db_tables(){
		$this->load->dbforge();
		$this->dbforge->drop_table('admin_user');
		$this->dbforge->drop_table('course_enrollment');
		$this->dbforge->drop_table('main_categories');
		$this->dbforge->drop_table('sub_categories');
		$this->dbforge->drop_table('users');
	}
	public function get_user($user_id) {
		$this->db->from('admin_user');
		$this->db->where('id', $user_id);
		return $this->db->get()->row();
	}

	private function hash_password($password) {
		return password_hash($password, PASSWORD_BCRYPT);
	}
	public function get_all_user() {
		$query =  $this->db->get('users');
		return $query->result_array();
	}
	public function get_main_category() {
		$query =  $this->db->get('main_categories');
		return $query->result_array();
	}
	public function get_sub_category() {
		$query =  $this->db->get('sub_categories');
		return $query->result_array();
	}
	public function get_course_enrollments(){
		$query =  $this->db->get('course_enrollment');
		return $query->result_array();
	}
	public function addsubcategory($data){
		$this->db->insert('sub_categories', $data);
		$id=$this->db->insert_id();
		return $id;
	}
	public function addmaincategory($data){
		$this->db->insert('main_categories', $data);
		$id=$this->db->insert_id();
		return $id;
	}
	public function updatemaincategory($data,$id) {
		$this->db->where('id',$id);
		if($this->db->update('main_categories',$data)){
			return true;
		}else{
			return false;
		}
	}
	public function updatesubcategory($data,$id) {
		$this->db->where('id',$id);
		if($this->db->update('sub_categories',$data)){
			return true;
		}else{
			return false;
		}
	}
	public function get_admin_user() {
		$query =  $this->db->get('admin_user');
		return $query->result_array();
	}
	public function add_new_admin_user($data){
		$this->db->insert('admin_user', $data);
		$id=$this->db->insert_id();
		return $id;
	}
}