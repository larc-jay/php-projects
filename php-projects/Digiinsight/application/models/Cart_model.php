<?php
class Cart_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
		$this->load->library('cart');
	}
	public function getScheduleForCart($id){
		$this->db->select('*');
		$this->db->from('schedules');
		$this->db->where('id',$id);
		$query = $this->db->get();
		$row =  $query->row();
		$vendor = $this->getVendorName($row->course_vendor_map_id);
		$course = $this->getCourseName($row->course_vendor_map_id);
		$data = array(
			  'id'      => $row->id,
			  'schedule_id' =>$id,	
			  'vcmid' =>$row->course_vendor_map_id,	 
		      'qty'     => 1,
		      'price'   => $row->course_price,
		      'name'    => $vendor,
			  'course' => $course,
			  'trainingtype' =>$row->training_type,	
		      'location' => $row->location,
		 	  'sdate' => $row->schedule_start_time,
		 	  'edate' => $row->schedule_end_time
		);
		$this->cart->insert($data);
		$this->session->set_tempdata('cartcount', count($this->cart->contents(), 300));
		$this->set_cart();
	}
	public function getVendorName($id){
		$query = $this->db->query('select v.name as cname from course_vendor_map c , vendors v where c.id = '.$id.' and v.id=c.vendor_id limit 1');
		return $query->row()->cname;
	}
	public function getCourseName($id){
		$query = $this->db->query('select s.name as name from course_vendor_map c , courses s where c.id ='.$id.' and c.course_id=s.id limit 1');
		return $query->row()->name;
	}
	public function updatecart($data){
		$this->cart->update($data);
	}
	public function set_users($data)
	{
		$this->load->helper('url');
		echo $data['email'];
		$userExists = $this->get_user($data['email']);
		if($userExists==0){
			$this->db->insert('users', $data);
			$userExists=$this->db->insert_id();
			$profile=array(
				'user_id'=>$userExists
			);
			$this->db->insert('profile', $profile);
		}
		if($userExists>0){
			$udata = array(
					'di_id' => $userExists,
					'di_fname' => 'Guest',
					'di_lname' => '',
					'di_email' => $data['email'],
					'di_phone' => $data['phone'],
					'di_type' => 'GUEST',
					'di_status' => 'ACTIVE',
					'di_logged_in' => true
			);
			$this->session->set_userdata($udata);
		}
		return $userExists;
	}
	public function get_user($email){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$email);
		$query = $this->db->get();
		$id=0;
		if($query->num_rows()==1){
			$row=$query->row();
			$id = $row->id;
		}
		return $id;
	}
	public function  set_cart(){
		$userid=0;
		if(isset($this->session->di_logged_in) && $this->session->di_logged_in){
			$userid= $this->session->di_id;
		}
		$dataArray = array();
		 foreach ($this->cart->contents() as $items): 
			$data=array(
				'cart_id'=>$items['rowid'],
				'vendor_course_map_id'=>$items['vcmid'],
				'schedule_id'=>$items['schedule_id'],
				'price'=>$items['price'],
				'qty'=>$items['qty'],
				'vendor_name'=>$items['name'],
				'course'=>$items['course'],
				'training_type'=>$items['trainingtype'],
			    'location'=>$items['location'],
				'start_date'=>$items['sdate'],
			    'user_id'=>$userid,
				'end_date' =>$items['edate']
			);
			array_push($dataArray,$data);
		 endforeach;
		 $this->db->insert_batch('cart', $dataArray);
	}
	public function clear_cart(){
		foreach ($this->cart->contents() as $items):
		$data =array(
				'rowid'=>$items['rowid'],
				'qty'=>0
		);
		$this->cart->update($data);
		endforeach;
	}
}