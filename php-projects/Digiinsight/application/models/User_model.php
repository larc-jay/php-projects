<?php
class User_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function professional_summary()
	{
		$this->load->helper('url');
		$this->db->select('*');
		$this->db->from('profile');
		$this->db->where('user_id', $this->session->userdata('di_id'));
		$query = $this->db->get();
		return $query->row();
	}
	public function userDetails(){
		$this->load->helper('url');
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('id', $this->session->userdata('di_id'));
		$query = $this->db->get();
		return $query->row();
	}
	public function profileImage($image){
		$this->load->helper('url');
		$this->db->set('image', $image);
		$this->db->where('user_id',$this->session->userdata('di_id'));
		$this->db->update('profile');
	}
	public function update_user($user){
		$this->load->helper('url');
		$this->db->set('first_name', $user['first_name']);
		$this->db->set('last_name', $user['last_name']);
		$this->db->set('email', $user['email']);
		$this->db->set('phone', $user['phone']);
		$this->db->where('id',$this->session->userdata('di_id'));
		$this->db->update('users');
	}
	public function update_profile($profile){
		$this->load->helper('url');
		$this->db->set('dob', $profile['dob']);
		$this->db->set('designation', $profile['designation']);
		$this->db->set('organization', $profile['organization']);
		$this->db->set('address', $profile['address']);
		$this->db->set('professional_summary', $profile['professional_summary']);
		$this->db->set('contact', $profile['contact']);
		$this->db->set('skills_education', $profile['skills_education']);
		$this->db->where('user_id',$this->session->userdata('di_id'));
		$this->db->update('profile');
	}
	public function getMyLearnings(){
		$qry="
			select fn.*, ve.name from
				(select ode.*,co.name as cname from
					(select odse.*, cv.course_id as courseid, cv.vendor_id as vendorid from 
						(select ods.*,
							se.schedule_start_time as stime,
							se.schedule_end_time as etime,
							se.training_type as ttype
				 	from 
					(select
								o.user_id as uid, 
								o.id as orderid,
								od.schedule_id as sid,
								od.course_vendor_map_id as cvmid,
								o.order_status as ostatus
						 from order_detail od , orders o where o.id=od.order_id and o.user_id=".$this->session->userdata('di_id')." 
						) ods 
						left join schedules se on se.id=ods.sid 
					) 
					odse left join course_vendor_map cv on odse.cvmid=cv.id
			) ode left join courses co on co.id=ode.courseid 
			) fn left join vendors ve on ve.id=fn.vendorid
		";
		$query = $this->db->query($qry);
		return $query->result_array();
	}
	
	public function getMySchedules(){
		$qry='select o.id,od.course_vendor_map_id,od.schedule_id,od.quantity,od.grand_total,
				o.order_status,s.course_price,s.schedule_start_time,s.schedule_end_time,co.name from 
				order_detail  od , orders o , schedules s , course_vendor_map c , courses co
				where od.order_id = o.id and o.user_id='.$this->session->userdata('di_id').' and s.course_vendor_map_id=od.course_vendor_map_id
				and s.id=od.schedule_id and c.id=s.course_vendor_map_id and c.course_id=co.id';
		$query = $this->db->query($qry);
		return $query->result_array();
	}
	public function subscribe($data){
		try{
			$this->db->insert('newsletters', $data);
			return true;
		}catch(Exception $e){
			return false;
		}
	}
	public function addattendees($data){
		$this->db->insert('attendees', $data);
		$id=$this->db->insert_id();
		return $id;
	}
}
?>	