<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Offers_model extends CI_Model
{
	/**
     * This function is used to get state list
     */
    function getOfferList()
    {
        $this->db->select('id, offer_image, title, price');
        $this->db->from('tbl_offers');
		$this->db->where('isDeleted', 0);
        $query = $this->db->get();
        
        return $query->result();
    }
	
    
    /**
     * This function is used to add a new task
     */
  
    function editOldOffer($OfferInfo, $OfferInfoId)
    {
        $this->db->where('id', $OfferInfoId);
        $this->db->update('tbl_offers', $OfferInfo);
        
        //$this->db->affected_rows();
        return TRUE;
    }
    
    function editCab($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_offers', $data);
        
        return $this->db->affected_rows();
    }
    
     function getOfferInfoById($id)
    {
        $this->db->select('t1.id, t1.title, t1.price, t1.offer_image');
        $this->db->from('tbl_offers as t1');
        $this->db->where('t1.id', $id);
		$this->db->where('t1.isDeleted', 0);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    /**
     * This function is used to delete vehicle type
     */
    function deleteOffer($id, $data)
    {		
		$this->db->where('id', $id);
        $this->db->update('tbl_offers', $data);
        
        return $this->db->affected_rows();
    }

    /**
     * This function used to check email exists or not
     * @param {string} $email : This is users email id
     * @return {boolean} $result : TRUE/FALSE
     */


    /**
     * This function is used to add a new task
     */
    function addNewOffer($data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_offers', $data);        
        $insert_id = $this->db->insert_id();        
        $this->db->trans_complete();        
        return $insert_id;
    }
    
    	function checkOfferExist($title, $price, $id = null)
    {
        $this->db->select("id");
        $this->db->from("tbl_offers");
		$this->db->where('isDeleted', 0);
        $this->db->where("title", $title);
		$this->db->where("price", $price);
      
		// if($id != 0){
        //     $this->db->where("id !=", $id);
        // }
		
        $query = $this->db->get();

       

        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }




    function editOffer($id, $dataArr)
    {
       
        $this->db->where('id', $id);
        $this->db->update('tbl_offers', $dataArr);
        
        return $this->db->affected_rows();
    }

}

  