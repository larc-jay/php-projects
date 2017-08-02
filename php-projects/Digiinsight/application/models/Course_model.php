<?php
class Course_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function getParentCourses()
	{
		$this->load->helper('url');
		$query = $this->db->get('parent_course');
		return $query->result_array();
	}
	public function getCourses()
	{
		$this->load->helper('url');
		$query = $this->db->get('courses');
		return $query->result_array();
	}
	public function getCoursesName($slug)
	{
		$this->db->select('name,id');
		$this->db->from('courses');
		$this->db->where('slug',$slug);
		$query = $this->db->get();
		$row=$query->row();
		return $row;
	}
	public function getCoursesNameById($id)
	{
		$this->db->select('*');
		$this->db->from('courses');
		$this->db->where('id',$id);
		$query = $this->db->get();
		$row=$query->row();
		return $row;
	}
	public function getVendorName($slug)
	{
		$this->db->select('name,id');
		$this->db->from('vendors');
		$this->db->where('slug',$slug);
		$query = $this->db->get();
		$row=$query->row();
		return $row;
	}
	
	public function getCoursesDescription($id)
	{
		$this->db->select('description');
		$this->db->from('course_description');
		$this->db->where('course_id',$id);
		$query = $this->db->get();
		if($query->num_rows()==1){
			$row=$query->row();
			return $row->description;
		}
		else{ 
			return null;	
		}
	}
	
	public function getCoursesDetails($id)
	{
		$this->load->helper('url');
		$this->db->select('c.id as cvid,c.course_id AS cid ,c.vendor_id as vid,v.name as cname,v.slug as slug');
		$this->db->from('course_vendor_map c');
		$this->db->join('vendors v', 'c.vendor_id = v.id');
		$this->db->where('c.course_id',$id);
		$this->db->order_by('c.id','ASC');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getVendorCoursesDetails($cid,$vid)
	{
		$this->load->helper('url');
		$this->db->select('c.id as cvid,c.course_id AS cid ,c.vendor_id as vid,v.name as cname,v.slug as slug');
		$this->db->from('course_vendor_map c');
		$this->db->join('vendors v', 'c.vendor_id = v.id');
		$this->db->where('c.course_id',$cid);
		$this->db->where('v.id',$vid);
		$this->db->order_by('c.id','ASC');
		$query = $this->db->get();
		return $query->result_array();
	}
	
	public function scheduleDetails($id)
	{
		//select c.course_id AS cid , c.vendor_id as vid, v.name as cname ,  s.course_price as price, s.schedule_start_time as stime,  s.location as location from vendors v,course_vendor_map c ,schedules s where  c .vendor_id = v.id and c.course_id=1 and s.course_vendor_map_id=c.id order by
		$this->load->helper('url');
		$query =$this->db->query('select s.*,datediff(s.schedule_start_time,now()) as daycount from schedules s where s.course_vendor_map_id in ('.$id.')  and s.schedule_end_time>now()  order by course_vendor_map_id ASC');
		//$query = $this->db->get();
		return $query->result_array();
	}
	public function scheduleDetailsL($id,$loc)
	{
		//select c.course_id AS cid , c.vendor_id as vid, v.name as cname ,  s.course_price as price, s.schedule_start_time as stime,  s.location as location from vendors v,course_vendor_map c ,schedules s where  c .vendor_id = v.id and c.course_id=1 and s.course_vendor_map_id=c.id order by
		$this->load->helper('url');
		$query =$this->db->query('select s.*, datediff(s.schedule_start_time,now()) as daycount from schedules s where s.course_vendor_map_id in ('.$id.') and s.location =\''.$loc.'\'  and s.schedule_end_time>now()  order by s.course_vendor_map_id ASC');
		//$query = $this->db->get();
		return $query->result_array();
	}
	public function search_course_by_name($key){
		$this->load->helper('url');
		$this->db->select('*');
		$this->db->from('courses');
		if(preg_match('/[a-zA-Z]/', $key)){
			$this->db->like('name', $key, 'after');
		}else{
			$this->db->like('name', '1', 'after');
			$this->db->or_like('name', '2', 'after');
			$this->db->or_like('name', '3', 'after');
			$this->db->or_like('name', '4', 'after');
			$this->db->or_like('name', '5', 'after');
			$this->db->or_like('name', '6', 'after');
			$this->db->or_like('name', '7', 'after');
			$this->db->or_like('name', '8', 'after');
			$this->db->or_like('name', '9', 'after');
			$this->db->or_like('name', '0', 'after');
		} 
		$this->db->limit(100);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function search_course_by_category($id){
		$this->load->helper('url');
		$this->db->select('*');
		$this->db->from('courses');
		$this->db->where('parent_course_id',$id);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function searchCourseByKeyword($keyword){
		$this->load->helper('url');
		$qur = 'select distinct co.id as courseid , co.name as coursename , count(distinct ve.id) as vcount ,
		 sc.course_price as price , cd.details as cdetails, co.slug as cslug from courses co , vendors ve , course_vendor_map cv , schedules sc,
		 course_details cd where co.name like \'%'.$keyword.'%\' and co.id = cv.course_id and ve.id = cv.vendor_id and
		  sc.course_vendor_map_id = cv.id and cd.course_id=co.id and cd.vendor_id=ve.id group by co.name';
		$query = $this->db->query($qur);
		return $query->result_array();
	}
	public function searchCourseByKWWithLoc($keyword,$loc){
		$this->load->helper('url');
		$qur = 'select distinct co.id as courseid , co.name as coursename , count(distinct ve.id) as vcount ,
		 sc.course_price as price , cd.details as cdetails, co.slug as cslug from courses co , vendors ve , course_vendor_map cv , schedules sc,
		 course_details cd where co.name like \'%'.$keyword.'%\' and co.id = cv.course_id and ve.id = cv.vendor_id and
		  sc.course_vendor_map_id = cv.id and cd.course_id=co.id and cd.vendor_id=ve.id and sc.location=\''.$loc.'\' group by co.name';
		$query = $this->db->query($qur);
		return $query->result_array();
	}
	public function catCourseCount(){
		$this->load->helper('url');
		$query = $this->db->query('select p.name as cname, count(distinct c.id) as ccount from parent_course p , courses c where p.id=c.parent_course_id group by p.name');
		return $query->result_array();
	}
	public function getFullCoursesDetails($cid,$vid){
		$this->load->helper('url');
		$this->db->select('*');
		$this->db->from('course_details');
		$this->db->where('vendor_id',$vid);
		$this->db->where('course_id',$cid);
		$query = $this->db->get();
		return $query->row();
	}
	public function getSchedules($subquery){
		$this->load->helper('url');
		$qry ='select 
				v.name as vname,
				v.id as vid,
				v.slug as vslug,
				c.id as cid,
				c.name as cname,
				c.slug as cslug,
				m.id as cvmid,
				s.id as scid,
				s.course_price as price,
				s.schedule_start_time as stime,
				s.schedule_end_time as etime,
				s.location as loc,
				s.training_type as trainingtype
			from vendors v , courses c , course_vendor_map m , schedules s
			where  s.status=0  and s.course_vendor_map_id = m.id and v.id = m.vendor_id and c.id = m.course_id  and s.schedule_end_time>=now() '
			.$subquery.' order by s.schedule_start_time asc';
		$query = $this->db->query($qry);
		return $query->result_array();
	}
	public function getTop10Schedules(){
		$this->load->helper('url');
		$qry ='select 
				v.name as vname,
				v.id as vid,
				v.slug as vslug,
				c.id as cid,
				c.name as cname,
				c.slug as cslug,
				m.id as cvmid,
				s.id as scid,
				s.course_price as price,
				s.schedule_start_time as stime,
				s.schedule_end_time as etime,
				s.location as loc,
				s.training_type as trainingtype
			from vendors v , courses c , course_vendor_map m , schedules s
			where  s.status=0  and s.course_vendor_map_id = m.id and v.id = m.vendor_id and c.id = m.course_id 
			order by s.schedule_start_time asc limit 10';
		$query = $this->db->query($qry);
		return $query->result_array();
	}
	public function getDiscoverProgrem(){
		$this->db->select('program_name,slug');
		$this->db->from('discover_programs');
		$this->db->join('courses', 'discover_programs.program_id=courses.id');
		$this->db->where('discover_programs.status=1');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function getLocations(){
		$this->db->select('location');
		$this->db->from('schedules');
		$this->db->distinct();
		$query = $this->db->get();
		return $query->result_array();
	}
	
}
	?>