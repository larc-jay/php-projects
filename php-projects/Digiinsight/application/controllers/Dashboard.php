<?php
class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
		$this->load->helper('url');
		$this->load->library("pagination");
	}
	public function index()
	{
		$this->load->view('dashboard/adminheader');
		$this->load->view('dashboard/dashboard');
		$this->load->view('dashboard/adminfooter');
	}
	public function dashboard()
	{
		$this->load->view('dashboard/adminheader');
		$this->load->view('dashboard/sidebar');
		$this->load->view('dashboard/dashboard');
		$this->load->view('dashboard/adminfooter');
	}
	public function seo()
	{	
		$config = array();
        $config["base_url"] = base_url() . "dashboard/seo";
        $config["total_rows"] = $this->dashboard_model->getSeo();
        $config["per_page"] = 5;
        $config["uri_segment"] = 3;
        $config['first_tag_open']='<div>'; 
        $config['first_tag_close']='</div>'; 
        $config['first_url'] = 'First';
        
        $config['last_tag_open']='<div>'; 
        $config['last_tag_close']='</div>'; 
        $config['last_link'] = 'Last';
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['results'] =  $this->dashboard_model->getLimitSeo($config["per_page"], $page);;
		$this->pagination->initialize($config);
		$data["links"] = $this->pagination->create_links();
		
		$data['analytics'] =  $this->dashboard_model->getSeoAnalytics();
		$this->load->view('dashboard/adminheader');
		$this->load->view('dashboard/sidebar');
		$this->load->view('dashboard/seo',$data);
		$this->load->view('dashboard/adminfooter');
	}
	public function adminusers()
	{
		$data['rows'] = $this->dashboard_model->getAdminUsers();
		$this->load->view('dashboard/adminheader');
		$this->load->view('dashboard/sidebar');
		$this->load->view('dashboard/adminusers',$data);
		$this->load->view('dashboard/adminfooter');
	}
	public function  addAdminUser(){
		$password = hash('sha256', trim($this->input->post('passwd')));
		$data = array(
		 'username' => $this->input->post('user'),
		 'email' => $this->input->post('email'),
		 'user_type' =>'DI-ADMIN',
		 'status' => 'ACTIVE',
         'password' =>$password
		);
		return $this->dashboard_model->addAdminUser($data);
	}
	public function addUsers(){
		$password = hash('sha256', trim($this->input->post('password')));
		$data = array(
		 'first_name' => $this->input->post('firstname'),
		 'last_name' => $this->input->post('lastname'),
         'phone' => $this->input->post('phone'),
		 'user_type' =>'DEFAULT',
		 'status' => 'ACTIVE',
         'password' =>$password,
         'email' => $this->input->post('email')
		);
		return $this->dashboard_model->addUsers($data);
	}
	public function users()
	{
		$data['rows']=$this->dashboard_model->getUsers();
		$this->load->view('dashboard/adminheader');
		$this->load->view('dashboard/sidebar');
		$this->load->view('dashboard/users',$data);
		$this->load->view('dashboard/adminfooter');
	}
	public function login(){
		$this->form_validation->set_rules('username', 'User Name', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('dashboard/adminheader');
			$this->load->view('dashboard/sidebar');
			$this->load->view('dashboard/dashboard');
			$this->load->view('dashboard/adminfooter');
		}
		$this->dashboard_model->admin_login_auth($this->input->post('username'),$this->input->post('password'));
		$this->load->view('dashboard/adminheader');
		$this->load->view('dashboard/sidebar');
		$this->load->view('dashboard/dashboard');
		$this->load->view('dashboard/adminfooter');
	}
	public function getUpdateUser(){
		$data['rows'] = $this->dashboard_model->getUserData($this->input->post('id'));
		return $this->load->view('dashboard/updateuser',$data);
	}
	public function updateUserDetails(){
		$id = $this->input->post('id');
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$this->dashboard_model->updateUserDetails($id,$fname,$lname,$phone,$email);
	}
	public function courses()
	{
		$this->load->view('dashboard/adminheader');
		$this->load->view('dashboard/sidebar');
		$this->load->view('dashboard/courses');
		$this->load->view('dashboard/adminfooter');
	}
	public function trainings()
	{
		$this->load->view('dashboard/adminheader');
		$this->load->view('dashboard/sidebar');
		$this->load->view('dashboard/trainings');
		$this->load->view('dashboard/adminfooter');
	}

	public function vendors()
	{
		$this->load->view('dashboard/adminheader');
		$this->load->view('dashboard/sidebar');
		$this->load->view('dashboard/vendors');
		$this->load->view('dashboard/adminfooter');
	}
	public function addParentCourse(){
		$this->load->library('commanfunction');
		$name = $this->input->get('name');
		$slug=$this->commanfunction->create_unique_slug($name,'parent_course','slug');
		return $this->dashboard_model->addParentCourse($name,$slug);
	}
	public function getParentCourse(){
		$data['parents'] = $this->dashboard_model->getParentCourse();
		$data['vendors'] = $this->dashboard_model->getVendors();
		return $this->load->view('dashboard/parentcourses',$data);
	}
	public function addChildCourse(){
		$this->load->library('commanfunction');
		$name = $this->input->get('name');
		$pid = $this->input->get('id');
		$vendorId = $this->input->get('vendorid');
		$slug=$this->commanfunction->create_unique_slug($name,'courses','slug');
		$cid = $this->dashboard_model->addChildCourse($name,$pid,$slug);
		$data =array(
			'course_id'=>$cid,
			'vendor_id'=>$vendorId
		);
		if($vendorId>0){
			$this->dashboard_model->courseVendorMap($data);
		}
	}
	public function addVendors(){
		$slug=$this->commanfunction->create_unique_slug($this->input->post('cname'),'vendors','slug');
		$data = array(
		        'name' =>  $this->input->post('cname'),
		        'web_url' =>   $this->input->post('web'),
		        'contact_person_name' => $this->input->post('cperson'),
				 'phone' => $this->input->post('phone'),
				 'mobile' => $this->input->post('mobile'),
				 'designation' => $this->input->post('desi'),
				 'address' => $this->input->post('address'),
				 'slug' => $slug,
				 'social_media_link' => $this->input->post('smedia')
		);
		return $this->dashboard_model->addVendors($data);
	}
	public function getVendorCourse(){
		$data['courses'] = $this->dashboard_model->getCourses();
		$data['vendors'] = $this->dashboard_model->getVendors();
		return $this->load->view('dashboard/vendorcoursemap',$data);
	}
	public function courseVendorMap(){
		$vendorId=$this->input->post('vendorId');
		$courseId=$this->input->post('courseId');
		$data =array(
			'course_id'=>$courseId,
			'vendor_id'=>$vendorId
		);
		$this->dashboard_model->courseVendorMap($data);
	}
	
	public function insertSchedule(){
		$vendorId=$this->input->post('vendorId');
		$courseId=$this->input->post('courseId');
		$price=$this->input->post('price');
		$location=$this->input->post('location');
		$scheduleStart=$this->input->post('scheduleStart');
		$scheduleEnd=$this->input->post('scheduleEnd');
		$trainingType = $this->input->post('trainingType');
		$inserId=$this->dashboard_model->getVendorCourseMapId($vendorId,$courseId);
		$data1 =array(
			'course_vendor_map_id'=>$inserId,
			'course_price'=>$price,
			'schedule_start_time'=>$scheduleStart,
			'schedule_end_time'=>$scheduleEnd,
			'location'=>$location,
			'training_type'=>$trainingType
		);
		return $this->dashboard_model->insertSchedule($data1);
		/*$data =array();
		$vendorIds=json_decode($this->input->post('vendorId'));
		foreach($vendorIds as $vid){
			$da = array(
				'course_id'=>$courseId,
				'vendor_id'=>$vid,
				'course_price'=>$price
			);
			array_push($data,$da);
		}*/	
	}
	
	public function addCourseDetail(){
		$data['courses'] = $this->dashboard_model->getCourses();
		$data['vendors'] = $this->dashboard_model->getVendors();
		$this->load->view('dashboard/coursedetails',$data);
	}
	public function getCourseDetails(){
		 $vid = $this->input->post('vid');
		 $cid = $this->input->post('cid');
		 $data = $this->dashboard_model->getCourseDetails($cid,$vid);
		 if($data==null){
		 	 $data = new stdClass();
		 }
		 $this->output->set_output(json_encode($data));
	}
	public function addCourseDetails(){
		$data = array(
		        'course_id' =>  $this->input->post('course'),
		        'vendor_id' =>   $this->input->post('vendor'),
		        'details' => $this->input->post('details'),
				 'highlights' => $this->input->post('highlight'),
				 'overview' => $this->input->post('overview'),
				 'agenda' => $this->input->post('agenda'),
				 'benefits' => $this->input->post('benefit'),
				 'who_can_attend' => $this->input->post('whocan'),
				 'certification_details' => $this->input->post('certification')	
		);
		return $this->dashboard_model->addCourseDetails($data);
	}
	public function logout()
	{
		$this->session->unset_userdata('di_admin_logged_in');
		$this->session->sess_destroy();
		redirect('dashboard/dashboard');
	}
	public function addSeo(){
		$data = array(
			'page' => $this->input->post('name'),
			'page_hash' =>md5($this->input->post('name')),
			'meta_description' => $this->input->post('desc'),
			'meta_keyword' => $this->input->post('keywords'),
			'title' => $this->input->post('title')
		);
		if($this->dashboard_model->addSeo($data)){
			$resp['results']='success';
			$this->output->set_output(json_encode($resp));
		}else{
			$resp['results']='fails';
			$this->output->set_output(json_encode($resp));
		}
	}
	public function addAnaylitcsCode(){
		$data = array(
			'google_analytics' => $this->input->post('google'),
			'bing_analytics' => $this->input->post('bing'),
			'yahoo_analytics' => $this->input->post('yahoo')
		);
		if($this->dashboard_model->addAnaylitcsCode($data)){
			$resp['results']='success';
			$this->output->set_output(json_encode($resp));
		}else{
			$resp['results']='fails';
			$this->output->set_output(json_encode($resp));
		}
	}
	public function discoverprograms(){
		$data['discoverPrograms'] = $this->dashboard_model->getDiscoverPrograms();
		$data['courses'] = $this->dashboard_model->getCourses();
		$this->load->view('dashboard/adminheader');
		$this->load->view('dashboard/sidebar');
		$this->load->view('dashboard/discoverprograms',$data);
		$this->load->view('dashboard/adminfooter');
	}
	public function addDiscoverProgram(){
		$data = array(
			'program_name' => $this->input->post('pname'),
			'program_id' => $this->input->post('program'),
			'status' => $this->input->post('status')
		);
		if($this->dashboard_model->addDiscoverProgram($data)){
			$resp['results']='success';
			$this->output->set_output(json_encode($resp));
		}else{
			$resp['results']='fails';
			$this->output->set_output(json_encode($resp));
		}
	}
	public function activeDP(){
		if($this->dashboard_model->activeDP( $this->input->post('pid'), $this->input->post('status'))){
			$resp['results']='success';
			$this->output->set_output(json_encode($resp));
		}else{
			$resp['results']='fails';
			$this->output->set_output(json_encode($resp));
		}
	}
	public function courseDescription(){
		$data['courses'] = $this->dashboard_model->getCourses();
		return $this->load->view('dashboard/coursedesc',$data);
	}
	public function addCourseDescription(){
		$data = array(
			'course_id' => $this->input->post('courseid'),
			'description' => $this->input->post('desc')
		);
		$this->dashboard_model->set_course_description($data);
	}
	public function getCourseDesc(){
		$id=$this->input->post('courseid');
		$data=$this->dashboard_model->get_course_desc($id);
		$this->output->set_output(json_encode($data));
	}
}