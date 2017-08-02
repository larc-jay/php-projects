<?php
class Courses extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('course_model');
		$this->load->library('breadcrumbs');
		$this->load->library('cart');
	}
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('courses/index' );
		$this->load->view('templates/footer');
	}
	public function courses()
	{
		$this->breadcrumbs->push('Home','/');
		$this->breadcrumbs->push('Courses', '/courses/courses');
		$data['categories']=$this->course_model->getParentCourses();	
		$data['courses']=$this->course_model->getCourses();
		$data['courseindex']=$this->load->view('courses/courseIndex',$data, TRUE);
		$this->load->view('templates/header');
		$this->load->view('courses/courses',$data);
		$this->load->view('templates/footer');
	}
	public function coursesvenders($slug)
	{
		$this->breadcrumbs->push('Home','/');
		$this->breadcrumbs->push('Courses Vendors', '/courses/coursesvenders');
		$courseData	=$this->course_model->getCoursesName($slug);
		$data['coursename'] = $courseData->name;
		$data['coursedetails'] =$this->course_model->getCoursesDetails($courseData->id);
		$cvid= array();
		$location=array();
		foreach($data['coursedetails'] as $name){
			array_push($cvid, $name['cvid']);
		}
		$data['cid'] = $courseData->id;
		$data['cslug'] = $slug;
		$data['description'] = $this->course_model->getCoursesDescription($courseData->id);
		$data['schedules']=$this->course_model->scheduleDetails(join(",",$cvid));
		$defaultLocation = 0;
		foreach($data['schedules'] as $loc){
			array_push($location, $loc['location']);
			if($loc['location']=="Delhi/NCR"){
				$defaultLocation++;
			}
		}
		if($this->input->get('loc')==null){
			$data['defaultloc'] = 'Delhi/NCR';
		}else{
			$data['defaultloc'] = $this->input->get('loc');
		}
		$data['defaultLocation'] = $defaultLocation;
		$data['location'] =  array_unique($location);
		$this->load->view('templates/header');
		$this->load->view('courses/coursesvenders',$data );
		$this->load->view('templates/footer');
	}
	
	public function searchCourseByLocation()
	{
		$data['coursedetails'] =$this->course_model->getCoursesDetails($this->input->get('cid'));
		$cvid= array();
		foreach($data['coursedetails'] as $name){
			array_push($cvid, $name['cvid']);
		}
		$data['coursename']	=$this->course_model->getCoursesNameById($this->input->get('cid'));
		$data['cid'] = $this->input->get('cid');
		$data['schedules']=$this->course_model->scheduleDetailsL(join(",",$cvid), $this->input->get('loc'));
		$data['defaultloc'] =  $this->input->get('loc');
		$this->load->view('courses/searchByLocation',$data );
		//$this->output->set_output($data);
	}
	public function searchScheduledCourseByLocation()
	{
		$data['schedules']=$this->course_model->scheduleDetailsL($this->input->get('cvmid'), $this->input->get('loc'));
		$data['defaultloc'] =  $this->input->get('loc');
		$this->load->view('courses/searchScheByLocation',$data );
		//$this->output->set_output($data);
	}
	public function coursedetails($vslug,$cslug,$cvmid){
		$this->breadcrumbs->push('Home','/');
		$this->breadcrumbs->push('Courses Details', '/courses/coursedetails');
		$courseData	=$this->course_model->getCoursesName($cslug);
		$vendorData	=$this->course_model->getVendorName($vslug);
		$data['coursename'] = $courseData->name;
		$data['vendorname'] = $vendorData->name;
		$data['coursedetails'] =$this->course_model->getVendorCoursesDetails($courseData->id,$vendorData->id);
		$data['coursesdetails'] = $this->course_model->getFullCoursesDetails($courseData->id,$vendorData->id);
		$location=array();
		$data['cvmid'] = $cvmid;
		$data['description'] = $this->course_model->getCoursesDescription($courseData->id);
		$data['schedules']=$this->course_model->scheduleDetails($cvmid);
		foreach($data['schedules'] as $loc){
			array_push($location, $loc['location']);
			if($loc['location']=="Delhi/NCR"){
			}
		}
		if($this->input->get('loc')==null){
			$data['defaultloc'] = 'Delhi/NCR';
		}else{
			$data['defaultloc'] = $this->input->get('loc');
		}
		$data['location'] =  array_unique($location);
		$this->load->view('templates/header');
		$this->load->view('courses/coursedetails',$data);
		$this->load->view('templates/footer');
	}
	public function searchCourseByName(){
		$data['courses']	=$this->course_model->search_course_by_name($this->input->get('key'));
		$courses = $this->load->view('courses/courseIndex',$data, TRUE);
		$this->output->set_output($courses);
	}
	public function searchCourseByCategory(){
		$data['courses']	=$this->course_model->search_course_by_category($this->input->get('id'));
		$courses = $this->load->view('courses/courseIndex',$data, TRUE);
		$this->output->set_output($courses);
	}
	public function programsearch(){
		$this->breadcrumbs->push('Home','/');
		$this->breadcrumbs->push('Program Search', '/courses/programsearch');
		$data['catCourses'] = $this->course_model->catCourseCount();
		if($this->input->post('location')!=null){
			$data['courses'] = $this->course_model->searchCourseByKWWithLoc($this->input->post('srch-term'),$this->input->post('location')); 
		}else{
			$data['courses'] = $this->course_model->searchCourseByKeyword($this->input->post('srch-term'));
		}
		$data['keyword'] = $this->input->post('srch-term');
		$this->load->view('templates/header');
		$this->load->view('courses/programsearch',$data); 
		$this->load->view('templates/footer');
		//redirect(base_url().'index.php/courses/searchCourseByKeyword');
	}
	public function shortMessage(){
		$this->load->library('email');
		$this->email->from($this->input->post('email'), 'DigiInsight | Learn From EExperts');
		$this->email->to('helpdesk@digiinsight.com');
		$this->email->cc('learning@digiinsight.com');
		$this->email->bcc('jay.answer@gmail.com');
		$this->email->subject('Query for Booking Schedule');
		$this->email->message('Name :'.$this->input->post('name').'<br />Phone :'.$this->input->post('phone').'<br />'.$this->input->post('msg'));
		if($this->email->send()) {
			return "success";
		}else{
			return "fails";
		}
	}
	public function  trainingcalendar(){
		$this->breadcrumbs->push('Home','/');
		$this->breadcrumbs->push('Training Calendar', '/courses/trainingcalendar');
		$data['schedules'] = $this->course_model->getSchedules('');
		$location = array();
		$vendors = array();
		$trainingtype = array();
		foreach($data['schedules'] as $sch){
			$vn =  array(
				'id'=>$sch['vid'],
				'vname'=>$sch['vname']
			);
			array_push($location, $sch['loc']);
			if(!in_array($vn,$vendors)){
				array_push($vendors, $vn);
			}
			array_push($trainingtype, $sch['trainingtype']);
		}
		$data['locations'] = array_unique($location);
		$data['vendors'] = $vendors;
		$data['trainingtype'] = array_unique($trainingtype);
		$this->load->view('templates/header');
		$this->load->view('courses/trainingcalendar',$data); 
		$this->load->view('templates/footer');
	}
	public function filterScheduledCourses(){
		$this->load->library('commanfunction');
		$filters = explode(',', $this->input->post('filter'));
		$subquery = $this->commanfunction->filterSearchQueryGenerator($filters);
		$data['schedules'] = $this->course_model->getSchedules($subquery);
		$scheduleList = $this->load->view('courses/trainingcalendarfilters',$data,TRUE); 
		$this->output->set_output($scheduleList);
	}
	public function filterScheduledCoursesByDate(){
		$subquery=' and s.schedule_start_time>=\''. $this->input->get('from').'\' and s.schedule_start_time<=\''.$this->input->get('to').'\'';
		$data['schedules'] = $this->course_model->getSchedules($subquery);
		$scheduleList = $this->load->view('courses/trainingcalendarfilters',$data,TRUE); 
		$this->output->set_output($scheduleList);
	}
	public function getDiscoverProgrem(){
		return $this->course_model->getDiscoverProgrem();
	}
	public function contactForSchedule(){
		$data = array(
			'email'=>$this->input->post('email'),
			'name'=>$this->input->post('name'),
			'mobile'=>$this->input->post('mobile'),
			'from'=>$this->input->post('from'),
			'to'=>$this->input->post('to'),
			'msg'=>'',
			'query'=>'Query for Booking Schedule'
		);
		$body = $this->load->view('templates/email-tpl',$data,TRUE); 
		$this->load->library('email');
		$this->email->from($this->input->post('email'), 'DigiInsight | Learn From EExperts');
		$this->email->to('helpdesk@digiinsight.com');
		$this->email->cc('learning@digiinsight.com');
		$this->email->bcc('jay.answer@gmail.com');
		$this->email->subject('Query for Booking Schedule');
		$this->email->message($body);
		if($this->email->send()) {
			$data['results']='success';	
			$this->output->set_output(json_encode($data));
		}else{
			$data['results']='fails';	
			$this->output->set_output(json_encode($data));
		}
	}
}
?>