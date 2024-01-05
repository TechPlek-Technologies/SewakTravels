<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Tax_model extends CI_Model
{
	/**
     * This function is used to get tasks
     */
    function getTaxs()
    {
        $this->db->select('TaxTbl.id, TaxTbl.price, TaxTbl.price_per_trip, TaxTbl.statusId, State.state');
        $this->db->from('tbl_tax as TaxTbl');
        $this->db->join('state_list as State','State.id = TaxTbl.stateId');
        $this->db->order_by('TaxTbl.id ASC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
	
	function getServiceTaxs()
    {
        $this->db->select('ServiceTaxTbl.id, ServiceTaxTbl.price');
        $this->db->from('tbl_service_tax as ServiceTaxTbl');
        $this->db->order_by('ServiceTaxTbl.id ASC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
	
	/**
     * This function used to check email exists or not
     * @param {string} $email : This is users email id
     * @return {boolean} $result : TRUE/FALSE
     */
    function checkTaxExist($stateId, $taxId = 0)
    {
        $this->db->select("id");
        $this->db->from("tbl_tax");
        $this->db->where("stateId", $stateId);   
        if($taxId != 0){
            $this->db->where("id !=", $taxId);
        }
        $query = $this->db->get();

        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }
	
	/**
     * This function used to check email exists or not
     * @param {string} $email : This is users email id
     * @return {boolean} $result : TRUE/FALSE
     */
    function checkServiceTaxExist($price, $taxId = 0)
    {
        $this->db->select("id");
        $this->db->from("tbl_service_tax");
        
		/*
			$this->db->where("price", $price);   
			if($taxId != 0){
				$this->db->where("id !=", $taxId);
			}
		*/
        $query = $this->db->get();

        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }
	
	/**
     * This function is used to add a new task
     */
    function addNewServiceTaxs($taxInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_service_tax', $taxInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    /**
     * This function used to get task information by id
     * @param number $taskId : This is task id
     * @return array $result : This is task information
     */
    function getServiceTaxInfo($taxId)
    {
        $this->db->select('*');
        $this->db->from('tbl_service_tax');
        $this->db->where('id', $taxId);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    /**
     * This function is used to edit tasks
     */
    function editServiceTax($taxInfo, $taxId)
    {
        $this->db->where('id', $taxId);
        $this->db->update('tbl_service_tax', $taxInfo);
        
        //$this->db->affected_rows();
        return TRUE;
    }
    
    /**
     * This function is used to delete tasks
     */
    function deleteServiceTax($taxId)
    {
        $this->db->where('id', $taxId);
        $this->db->delete('tbl_service_tax');
        return TRUE;
    }

    
    /**
     * This function is used to add a new task
     */
    function addNewTaxs($taxInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_tax', $taxInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    /**
     * This function used to get task information by id
     * @param number $taskId : This is task id
     * @return array $result : This is task information
     */
    function getTaxInfo($taxId)
    {
        $this->db->select('*');
        $this->db->from('tbl_tax');
        $this->db->where('id', $taxId);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    /**
     * This function is used to edit tasks
     */
    function editTax($taxInfo, $taxId)
    {
        $this->db->where('id', $taxId);
        $this->db->update('tbl_tax', $taxInfo);
        
        //$this->db->affected_rows();
        return TRUE;
    }
    
    /**
     * This function is used to delete tasks
     */
    function deleteTax($taxId)
    {
        $this->db->where('id', $taxId);
        $this->db->delete('tbl_tax');
        return TRUE;
    }


    /**
     * This function is used to get the tasks count
     * @return array $result : This is result
     */
    function taxsCount()
    {
        $this->db->select('*');
        $this->db->from('tbl_tax as BaseTbl');
        $query = $this->db->get();
        return $query->num_rows();
    }
	
	/**
     * This function is used to get tasks
     */
    function getGstTaxs()
    {
        $this->db->select('GstTaxTbl.id, GstTaxTbl.rate, GstTaxTbl.statusId');
        $this->db->from('tbl_gst_tax as GstTaxTbl');
        $this->db->order_by('GstTaxTbl.id ASC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }


    /**
     * This function used to check email exists or not
     * @param {string} $email : This is users email id
     * @return {boolean} $result : TRUE/FALSE
     */
    function checkGstTaxExist($rate, $GstTaxId = 0)
    {
        $this->db->select("id");
        $this->db->from("tbl_gst_tax");
       
		/*	   
			$this->db->where("rate", $rate);   
			if($GstTaxId != 0){
				$this->db->where("id !=", $GstTaxId);
			}
		*/
        $query = $this->db->get();

        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    
    /**
     * This function is used to add a new task
     */
    function addNewGstTaxs($GstTaxInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_gst_tax', $GstTaxInfo);        
        $insert_id = $this->db->insert_id();        
        $this->db->trans_complete();        
        return $insert_id;
    }

    /**
     * This function used to get task information by id
     * @param number $taskId : This is task id
     * @return array $result : This is task information
     */
    function getGstTaxInfo($GstTaxId)
    {
        $this->db->select('*');
        $this->db->from('tbl_gst_tax');
        $this->db->where('id', $GstTaxId);
        $query = $this->db->get();        
        return $query->result();
    }
    
    /**
     * This function is used to edit tasks
     */
    function editGstTax($GstTaxInfo, $GstTaxId)
    {
        $this->db->where('id', $GstTaxId);
        $this->db->update('tbl_gst_tax', $GstTaxInfo);        
        //$this->db->affected_rows();
        return TRUE;
    }
    
    /**
     * This function is used to delete tasks
     */
    function deleteGstTax($GstTaxId)
    {
        $this->db->where('id', $GstTaxId);
        $this->db->delete('tbl_gst_tax');
        return TRUE;
    }
}

  