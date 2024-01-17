<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Orders_model extends CI_Model
{
	
	/**
     * This function is used to get tasks
     */
    function getOrderDetails()
    {		
		$this->db->select('*');
        $this->db->from('payments');
		$this->db->where("isDeleted", 0);
		$this->db->order_by('id DESC');
        $query = $this->db->get();
        
        return $query->result();
    }
	

    function downloadOrderDetails($value)
    {	
        // print_r($value['startdate']);die;	
		$this->db->select('*');
        $this->db->from('payments');
		$this->db->where("isDeleted", 0);
        if($value['status']=="both"){

        }
        else
        {
            $this->db->where("status", $value['status']);
        }
        $this->db->where('created_at >=', $value['startdate'] .' 23:59:59');
        $this->db->where('created_at <=', $value['enddate'].' 23:59:59');
       
        
        
		$this->db->order_by('id DESC');
        $query = $this->db->get();
       
        return $query->result_array();
    }

	// get order by tranaction id 
	function getorder($txnid)
	{
		$this->db->where('id', $txnid);
	 	$result = $this->db->get("payments")->result();
	 	return $result;
	}
	
	function sendOrderEmail($id, $data)
    {		
		$this->db->where('id', $id);
        $this->db->update('payments', $data);
        
        return $this->db->affected_rows();
    }
	
	function sendOrderMessage($id, $data)
    {		
		$this->db->where('id', $id);
        $this->db->update('payments', $data);
        
        return $this->db->affected_rows();
    }
}

  