<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Payment_model extends CI_Model 
{
	// save order	 
	function validate_coupon($coupon)
	{
		$result = array();
		$this->db->select("coupon_start_date, coupon_exp_date, coupon_amount, coupon_type");
		$this->db->from("tbl_coupon");
		$this->db->where("coupon_code", $coupon);
		$this->db->where("statusId", 1);
		$this->db->where("isDeleted", 0);

		$query = $this->db->get();
		$resultArr = $query->num_rows();

		if ($resultArr > 0) {
			$result['response'] = 1;
			$result['status'] = 'success';
			$result['data'] = $query->result();
			return $result;
		} else {
			$result['response'] = 0;
			$result['status'] = 'failed';
			$result['data'] = array();
			return $result;
		}
	}

	
	function save_order($data)
	{
		$this->db->insert('payments', $data);
		//$str = $this->db->last_query();
		return $this->db->insert_id();
	}	
	
	// update order
	function update_order($tranaction_id, $data)
	{
		//$this->db->where('user_id', $userid);
		$this->db->where('transaction_id', $tranaction_id);
		return $this->db->update('payments', $data);
	}
	
	// get orders	
	function getpayments($userid)
	{			
		$this->db->where('user_id', $userid);
		$this->db->order_by('id','desc');
	 	$result = $this->db->get("payments")->result_array();
	 	return $result;
	}
	
	// get order by tranaction id 
	function getorder($txnid)
	{
		$this->db->where('transaction_id', $txnid);
	 	$result = $this->db->get("payments")->result();
	 	return $result;
	}

	// get order by order id 
	function getorderbyid($order_id)
	{
		$order_details  = $this->db->query('SELECT * FROM `payments` WHERE `id` = "'.$order_id.'"')->result();

		return $order_details;
	}

	function save_address_details($data)
	{
		$this->db->select("user_id");
		$this->db->from("billing_details");
		$this->db->where("user_id", $data['user_id']);

		$query = $this->db->get();
		if (!empty($query->num_rows())) {
			$this->db->where('user_id', $data['user_id']);
			$this->db->update('billing_details', $data);
			//return $this->db->affected_rows();
			return true;
		} else {
			$this->db->insert('billing_details', $data);
			return $this->db->insert_id();
		}

	}

	// update order
	function update_order_status($tranaction_id, $data)
	{
		$this->db->where('transaction_id', $tranaction_id);
		return $this->db->update('payments', $data);
	}


}
