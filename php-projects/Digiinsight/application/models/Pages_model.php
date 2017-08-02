<?php
class Pages_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->load->library('commanfunction');
	}
	public function slugconverter($table){
		$courses = $this->getCourses($table);
		$data = array();
		foreach ($courses as $course){
			$slug = $this->commanfunction->create_unique_slug($course['name'],$table,'slug');
			$this->updateCourseSlug($course['id'],$slug,$table);
			$sub = array(
					'name'=>$course['name'],
					'slug'=>$slug					
			);
			array_push($data,$sub);
		}
		return $data;
	}
	public function getCourses($table)
	{
		$this->load->helper('url');
		$this->db->select('*');
		$query = $this->db->get($table);
		$this->db->where('slug is null');
		return $query->result_array();
	}
	public function updateCourseSlug($id,$slug,$table)
	{
		$this->db->set('slug',$slug);
		$this->db->where('id',$id);
		$this->db->update($table);
	}
	public function getAuto($kw){
	 $inputs =  explode(" ", $kw);
	 $this->db->select('name');
	 $this->db->like('name', $kw);
	 if(count($inputs)>1){
	 	foreach($inputs as $input){
	 		  $this->db->or_like('name', $input);
	 	}
	 }
	
	 $query = $this->db->get('courses');
	 if($query->num_rows() > 0){
	 	foreach ($query->result_array() as $row){
	 		$row_set[] = htmlentities(stripslashes($row['name']));
	 	}
	 	echo json_encode($row_set);
	 }
	}
}