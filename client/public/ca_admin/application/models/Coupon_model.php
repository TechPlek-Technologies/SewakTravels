<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Coupon_model extends CI_Model
{
	/**
     * This function is used to get coupons
     */
	function couponList()
    {		
		$this->db->select('*');
        $this->db->from('tbl_coupon');
		$this->db->where('isDeleted', 0);
        $this->db->order_by('name ASC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
	
	/**
     * This function is used to get coupon by id
     */
	function getCouponInfo($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_coupon');
        $this->db->where('id', $id);
        $query = $this->db->get();
        
        return $query->result();
    }


    /**
     * This function used to check Coupon exists or not
     * @param {string} $code : This is coupon code
     * @return {boolean} $result : TRUE/FALSE
     */
    function checkCoupon($code, $id = 0)
    {
        $this->db->select("id");
        $this->db->from("tbl_coupon");
        $this->db->where("coupon_code", $code);
		$this->db->where("isDeleted", 0);		
        if($id != 0){
            $this->db->where("id !=", $id);
        }
        $query = $this->db->get();

        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    
    /**
     * This function is used to add a new Coupon
     */
    function addNewCoupon($data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_coupon', $data);        
        $insert_id = $this->db->insert_id();        
        $this->db->trans_complete();
        
        return $insert_id;
    }
	
    
    /**
     * This function is used to edit Coupon
     */
    function editCoupon($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_coupon', $data);
        return TRUE;
    }
    
    /**
     * This function is used to delete Coupon
     */
    function deleteCoupon($id, $data)
    {
		$this->db->where('id', $id);
        $this->db->update('tbl_coupon', $data);
        
        return $this->db->affected_rows();
    }
}

  