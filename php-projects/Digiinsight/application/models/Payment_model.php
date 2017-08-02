<?php
class Payment_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->load->library('cart');
	}
	public function set_transaction($data)
	{
		$this->load->helper('url');
		$this->db->insert('transactions', $data);
		$id=$this->db->insert_id();
		if($id>0){
			return true;
		}else{
			return false;
		}
	}
	public function updateOrder($id,$ts,$os){
		$this->db->set('transaction_status', $ts);
		$this->db->set('order_status', $os);
		$this->db->where('id',$id);
		$this->db->update('orders');
	}
	public function addOrderDetails($oid){
		$dataArray = array();
		 foreach ($this->cart->contents() as $items): 
		 $tax = $items['price']*TAX_PERCENT/100;
		 $grandtotle = $items['price']*TAX_PERCENT/100+$items['price'];
			$data=array(
				'order_id'=>$oid,
				'course_vendor_map_id'=>$items['vcmid'],
				'schedule_id'=>$items['schedule_id'],
				'price'=>$items['price'],
				'quantity'=>$items['qty'],
				'tax_rate'=>TAX_PERCENT,
				'tax_amount'=>$tax,
				'grand_total'=>$grandtotle
			);
			array_push($dataArray,$data);
		 endforeach;
		 $this->db->insert_batch('order_detail', $dataArray);
	}
	
	public function addOrderDetailsInstant($oid){
			$data=array(
				'order_id'=>$oid,
				'course_vendor_map_id'=>1,
				'schedule_id'=>1,
				'price'=>69999,
				'quantity'=>1,
				'tax_rate'=>TAX_PERCENT,
				'tax_amount'=>10499.85,
				'grand_total'=>80498.85
			);
		 $this->db->insert('order_detail', $dataArray);
	}
	public function getBillingAddress($oid){
		$this->db->select('*');
		$this->db->from('billing_details');
		$this->db->where('user_id',$this->session->di_id);
		$this->db->where('order_id',$oid);
		$query = $this->db->get();
		return $query->row();
	}
	public function set_attendees($data){
		$this->load->helper('url');
		$this->db->insert('attendees', $data);
	}
	public function get_attendees($oid){
		$this->db->select('*');
		$this->db->from('attendees');
		$this->db->where('order_id',$oid);
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>