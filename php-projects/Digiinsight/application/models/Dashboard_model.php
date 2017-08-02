<?php
class Dashboard_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function set_users()
	{
		$this->load->helper('url');
		return $this->db->insert('users', $data);
	}
	public function addUsers($data)
	{
		$this->load->helper('url');
		
		return $this->db->insert('users', $data);
	}
	public function getUsers()
	{
		$this->load->helper('url');
		$query = $this->db->get('users');
		return $query->result_array();
	}
	public function getAdminUsers(){
		$this->load->helper('url');
		$query = $this->db->get('admin_user');
		return $query->result_array();
	}
	public function addAdminUser($data){
		$this->load->helper('url');
		$this->db->insert('admin_user', $data);
		return true;
	}
	public function admin_login_auth($user,$pass){
		$this->load->helper('url');
		$password = hash('sha256', $pass);
		$this->db->select('*');
		$this->db->from('admin_user');
		$this->db->where('username', $user);
		$this->db->where('user_type', 'DI_ADMIN');
		$this->db->where('status', 'ACTIVE');
		$this->db->where('password', $password);
		$query = $this->db->get();
		if($query->num_rows() == 1)
		{
			$row = $query->row();
			$data = array(
					'di_admin_user_name' => $row->username,
					'di_admin_user_type' => $row->user_type,
					'di_admin_user_status' => $row->status,
					'di_admin_email' => $row->email,
					'di_admin_logged_in' => true
					);
					
			$this->session->set_userdata($data);
			return true;
		}
		return false;
	}
	public function getUserData($id){
		$this->load->helper('url');
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id', $id);
		$query = $this->db->get();
		if($query->num_rows() == 1)
		{
			$row = $query->result_array();
			return $row;
		}
		return null;
	}
	public function updateUserDetails($id,$fname,$lname,$phone,$email){
		$this->load->helper('url');
		$this->db->set('first_name',$fname);
		$this->db->set('last_name',$lname);
		$this->db->set('email',$email);
		$this->db->set('phone',$phone);
		$this->db->where('id',$id);
		$this->db->update('users');
	}
	public function addParentCourse($name,$slug){
		$this->load->helper('url');
		
		$data = array(
		 	'name' => trim($name),
			'slug' => $slug
		);
		return $this->db->insert('parent_course', $data);
	}
	public function getParentCourse()
	{
		$this->load->helper('url');
		$query = $this->db->get('parent_course');
		return $query->result_array();
	}
	public function addChildCourse($name,$id,$slug){
		$this->load->helper('url');
		$data = array(
		 'name' => trim($name),
		 'slug' => $slug,
		 'parent_course_id' => trim($id)
		);
		$this->db->insert('courses', $data);
		return $this->db->insert_id();
	}
	public function addVendors($data){
		$this->load->helper('url');
		return $this->db->insert('vendors', $data);
	}
	public function getCourses()
	{
		$this->load->helper('url');
		$query = $this->db->get('courses');
		return $query->result_array();;
	}
	public function getVendors()
	{
		$this->load->helper('url');
		$query = $this->db->get('vendors');
		return $query->result_array();
	}
	public function courseVendorMap($data){
		$this->load->helper('url');
		//return $this->db->insert_batch('course_vendor_map', $data);
		$this->db->insert('course_vendor_map', $data);
		return $this->db->insert_id();
	}
	public function getVendorCourseMapId($vid,$cid){
		$this->load->helper('url');
		$this->db->select('id');
		$this->db->from('course_vendor_map');
		$this->db->where('course_id', $cid);
		$this->db->where('vendor_id', $vid);
		$query = $this->db->get();
		$row = $query->row();
		if($row ==null){
			$data =array(
				'course_id'=>$cid,
				'vendor_id'=>$vid
			);
			$this->db->insert('course_vendor_map', $data);
			$id = $this->db->insert_id();
		}else{
			$id = $row->id;
		}
		return $id;
	}
	public function addCourseDetails($data){
		$this->load->helper('url');
		$qur = 'INSERT INTO course_details(course_id,vendor_id,details,highlights,overview,agenda,benefits,who_can_attend,certification_details) 
		values('.$data['course_id'].','.$data['vendor_id'].',\''.$data['details'].'\',\''.$data['highlights'].'\',\''.$data['overview'].'\',\''.$data['agenda'].
		'\',\''.$data['benefits'].'\',\''.$data['who_can_attend'].'\',\''.$data['certification_details'].'\') ON DUPLICATE KEY UPDATE '.
		' course_id='.$data['course_id'].',vendor_id='.$data['vendor_id'].',details=\''.$data['details'].'\',highlights=\''.$data['highlights'].
		'\',overview=\''.$data['overview'].'\',agenda=\''.$data['agenda'].'\',benefits=\''.$data['benefits'].'\',who_can_attend=\''.$data['who_can_attend'].'\',certification_details=\''.$data['certification_details'].'\'';
		//echo $qur;
		return  $this->db->query($qur);
		//return  $this->db->insert('course_details', $data);
	}
	public function insertSchedule($data){
		$this->load->helper('url');
		return $this->db->insert('schedules', $data);
	}
	public function getCourseDetails($cid,$vid){
		$this->db->select('*');
		$this->db->from('course_details');
		$this->db->where('course_id', $cid);
		$this->db->where('vendor_id', $vid);
		$query = $this->db->get();
		return $query->row();
	}
	public function addSeo($data){
		$this->load->helper('url');
		if($this->db->insert('seo', $data)){
			return true;
		}else{
			return false;
		}
	}
	public function getSeo(){
		$this->db->select('*');
		$this->db->from('seo');
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function getLimitSeo($limit, $start){
		 $this->db->limit($limit, $start);
        $query = $this->db->get("seo");
		return $query->result_array();
	}
	public function getSeoAnalytics(){
		$this->db->select('*');
		$this->db->from('seo_analytics');
		$query = $this->db->get();
		return $query->row();
	}
	
	public function addAnaylitcsCode($data){
		$this->load->helper('url');
		$this->db->where('id',1);
		if($this->db->update('seo_analytics',$data)){
			return true;
		}else{
			return false;
		}
	}
	public function getDiscoverPrograms(){
		$this->load->helper('url');
		$query = $this->db->get('discover_programs');
		return $query->result_array();
	}
	public function addDiscoverProgram($data){
		$this->load->helper('url');
		if($this->db->insert('discover_programs', $data)){
			return true;
		}else{
			return false;
		}
	}
	public function activeDP($pid,$status){
		$this->load->helper('url');
		if($status==1){
			$this->db->set('status',0);
		}else{
			$this->db->set('status',1);
		}
		$this->db->where('id',$pid);
		if($this->db->update('discover_programs')){
			return true;
		}else{
			return false;
		}
	}
	public function set_course_description($data){
		$this->load->helper('url');
		$sql = $this->db->insert_string('course_description', $data) . ' ON DUPLICATE KEY UPDATE description=\''.$data['description'].'\'';
		$this->db->query($sql);
	}
	public function get_course_desc($id){
		$this->db->select('*');
		$this->db->from('course_description');
		$this->db->where('course_id',$id);
		$query = $this->db->get();
		return $query->row();
	}
}

?>