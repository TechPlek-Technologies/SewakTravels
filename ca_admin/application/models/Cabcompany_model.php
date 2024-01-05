<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class CabCompany_model extends CI_Model
{

	/**
     * This function is used to get tasks
     */
    function cabCompanyListing()
    {		
		/*$this->db->select('CabCompanyTbl.id, CabCompanyTbl.company_id, CabCompanyTbl.statusId, Companies.company_name as company_name, zone.name as zone_name, zone_type.type as zone_type');
        $this->db->from('tbl_vendor_company as CabCompanyTbl');
		$this->db->join('tbl_companies as Companies','Companies.id = CabCompanyTbl.company_id', 'left');
		$this->db->join('tbl_zone as zone','zone.id = CabCompanyTbl.zone_id', 'left');
		$this->db->join('tbl_zone_type as zone_type','zone_type.id = CabCompanyTbl.zone_type_id', 'left');
        $this->db->order_by('CabCompanyTbl.id ASC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;*/
		
		$this->db->select('t1.id, t1.vendor_id, t1.statusId, t1.createdDtm, t2.salutation, t2.name, t2.mobile, t3.company_name, t1.company_id');
        $this->db->from('tbl_vendor_company as t1');
        $this->db->join('tbl_vendors as t2','t2.id = t1.vendor_id', 'left');
        $this->db->join('tbl_companies as t3','t3.id = t1.company_id', 'left');
		$this->db->group_by('t1.vendor_id, t1.company_id');
        $this->db->order_by('t1.id, t3.company_name ASC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }

    function checkCabCompanyExist($vehicle_id, $company_id, $zone_id, $zone_type_id, $id = 0)
    {
        $this->db->select("id");
        $this->db->from("tbl_vendor_company");
        //$this->db->where("vehicle_id", $vehicle_id);
		$this->db->where("company_id", $company_id);
		$this->db->where("zone_id", $zone_id);
		$this->db->where("zone_type_id", $zone_type_id); 
		$this->db->where_in('vehicle_id', $vehicle_id);		
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

    function addNewCabCompanies($data)
    {
		$this->db->trans_start();
        $this->db->insert('tbl_vendor_company', $data);        
        $insert_id = $this->db->insert_id();        
        $this->db->trans_complete();
        
        return $insert_id;
    }


    function updateCabCompanies($data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_vendor_company', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;

        //return $this->db->update_batch('tbl_vendor_company', $data, 'id');

        
    }
    
    /**
     * This function is used to add a new task
     */
    function addNewCabCompany($companyInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_vendor_company', $companyInfo);        
        $insert_id = $this->db->insert_id();        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    /**
     * This function used to get task information by id
     * @param number $taskId : This is task id
     * @return array $result : This is task information
     */
    function getCabCompanyInfo($companyId)
    {
        //$this->db->select('id, vendor_id, company_id, zone_id, zone_type_id, guard_price, statusId, createdDtm');
        $this->db->select('t1.id, t1.vendor_id, t1.company_id, t1.zone_id, t1.zone_type_id, t1.guard_price, t1.statusId, t1.createdDtm, t3.company_name, t2.name as vendor_name');
        $this->db->from('tbl_vendor_company as t1');
        $this->db->join('tbl_vendors as t2','t2.id = t1.vendor_id', 'left');
        $this->db->join('tbl_companies as t3','t3.id = t1.company_id', 'left');
        $this->db->where('t1.isDeleted', 0);
        $this->db->where('t1.id', $companyId);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    /**
     * This function is used to edit Guard
     */
    function editCabCompany($companyInfo, $companyId)
    {
        $this->db->where('id', $companyId);
        $this->db->update('tbl_vendor_company', $companyInfo);

        return TRUE;
    }
    
    /**
     * This function is used to delete Guard
     */
    function deleteCabCompany($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbl_vendor_company');
        return TRUE;
    }

    function deleteCabVendorPrice($id)
    {
        $this->db->where('vendor_company_id', $id);
        $this->db->delete('tbl_vendor_company_price');
        return TRUE;
    }
	
	function getCabCompanyRate($data)
    {
        $this->db->select('cab_rate_company, guard_price_company');
        $this->db->from('tbl_vendor_company');
        $this->db->where('vendor_id', $data['vendor_id']);
		$this->db->where('vehicle_id', $data['vehicle_id']);
		$this->db->where('company_id', $data['company_id']);
		$this->db->where('zone_id', $data['zone_id']);
		$this->db->where('zone_type_id', $data['zone_type_id']);
        $query = $this->db->get();
        
        return $query->result();
    }
	
	function addNewCabPrice($data)
    {
        $this->db->insert_batch('tbl_vendor_company_price', $data);	
		return true;
    }

    function updateCabPrice($data)
    {
        $this->db->insert_batch('tbl_vendor_company_price', $data);
        return true;
        //return $this->db->update_batch('tbl_vendor_company_price', $data, 'id');
    }
	
	/*function viewCabCompanyRates()
    {		
		$this->db->select('t1.id, t1.statusId, t1.createdDtm, t2.salutation, t2.name, t2.mobile, t2.company_name');
        $this->db->from('tbl_vendor_company as t1');
		$this->db->join('tbl_vendors as t2','t2.id = t1.vendor_id', 'left');
		$this->db->group_by('t1.vendor_id');
        $this->db->order_by('t1.id ASC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }*/

    function viewCabCompanyRates($vendor_id)
    {		
		$this->db->select('t1.id, t1.vendor_id, t1.statusId, t1.createdDtm, t2.salutation, t2.name, t2.mobile, t3.company_name, t4.rate, t5.type as vehicle_type, t6.name AS zone_name, t7.type AS zone_type_name, t7.`description` AS zone_type_description');
        $this->db->from('tbl_vendor_company as t1');
        $this->db->join('tbl_vendors as t2','t2.id = t1.vendor_id', 'left');
        $this->db->join('tbl_companies as t3','t3.id = t1.company_id', 'left');
        $this->db->join('tbl_vendor_company_price as t4', 't4.vendor_company_id = t1.id', 'left');
        $this->db->join('tbl_vehicle_type as t5', 't5.id = t4.vehicle_type_id', 'left');
        $this->db->join('tbl_zone as t6', 't6.id = t1.zone_id', 'left');
        $this->db->join('tbl_zone_type as t7', 't7.id = t1.zone_type_id', 'left');
		$this->db->where('t1.vendor_id', $vendor_id);
        //$this->db->order_by('t1.id, t3.company_name ASC');
        $this->db->order_by('t7.`description`, t5.type ASC');
        
        $query = $this->db->get();

       // $str = $this->db->last_query();
        //pre($str);

        $result = $query->result();
        return $result;
    }

    
    /*function getCabRatesbyVendor($vendor_id)
    {
        $this->db->select('t1.id, t1.vendor_id, t1.company_id, t1.zone_id, t1.zone_type_id, t1.guard_price, t1.statusId, t1.createdDtm, t2.vehicle_type_id, t2.rate');
        $this->db->from('tbl_vendor_company_price as t2');
        $this->db->join('tbl_vendor_company as t1','t1.id = t2.vendor_company_id', 'left');
        $this->db->where('t1.isDeleted', 0);
        $this->db->where('t1.vendor_id', $vendor_id);
        $query = $this->db->get();
        
        return $query->result();
    }*/
    function getCabRatesbyVendor($vendor_id, $company_id = 0)
    {
        $this->db->select('t1.id as vendor_company_id, t1.vendor_id, t1.company_id, t1.zone_id, t1.zone_type_id, t1.guard_price, t1.statusId, t1.createdDtm, t2.vehicle_type_id, t2.rate, t2.statusId as rate_status, t2.id as vendor_company_price_id');
        $this->db->from('tbl_vendor_company as t1');
        $this->db->join('tbl_vendor_company_price as t2','t2.vendor_company_id = t1.id');
        $this->db->where('t1.isDeleted', 0);
        $this->db->where('t1.vendor_id', $vendor_id);

        if ($company_id != 0) {
            $this->db->where("t1.company_id", $company_id);
        }

       // $this->db->group_by('t1.zone_id, t1.zone_type_id, t2.vehicle_type_id');
        $this->db->order_by('t1.zone_id, t1.zone_type_id, t2.vehicle_type_id ASC');
        $query = $this->db->get();

       // $str = $this->db->last_query();
        //pre($str);
        
        return $query->result();
    }
    /*function getCabRatesbyVendor($vendor_id)
    {
        $this->db->select('id, vendor_id, company_id, zone_id, zone_type_id, guard_price, statusId, createdDtm');
        $this->db->from('tbl_vendor_company');
        $this->db->where('isDeleted', 0);
        $this->db->where('vendor_id', $vendor_id);
        $query = $this->db->get();
        
        return $query->result();
    }*/
}

  