<?php
class Checkout_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function set_order($data)
	{
		$this->load->helper('url');
		$this->db->insert('orders', $data);
		return $this->db->insert_id();
	}
	public function set_billing_details($data)
	{
		$this->load->helper('url');
		$this->db->insert('billing_details', $data);
		return $this->db->insert_id();
	}
	public function checkout($data)
	{
		$this->load->helper('url');
	}
}