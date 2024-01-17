<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Company_model extends CI_Model
{
	/**
     * This function is used to get tasks
     */
    function getCompanies()
    {
		$this->db->select('CompanyTbl.id, CompanyTbl.contact_person, CompanyTbl.email, CompanyTbl.mobile, CompanyTbl.pan, CompanyTbl.gstin, CompanyTbl.pincode, CompanyTbl.address, CompanyTbl.city, CompanyTbl.state, CompanyTbl.company_name, CompanyTbl.landline, CompanyTbl.statusId, State.state as statename, Branch.name as BranchName, Branch.id as BranchId');
		$this->db->from('tbl_companies as CompanyTbl');
		$this->db->join('state_list as State','State.id = CompanyTbl.state');
		$this->db->join('tbl_company_branch as Branch','Branch.company_id = CompanyTbl.id', 'left');
		$this->db->where('CompanyTbl.isDeleted', 0);
		$this->db->order_by('CompanyTbl.id ASC');
		$query = $this->db->get();
		$result = $query->result();        
		return $result;
    }	

	function companyList()
    {		
		$this->db->select('t1.id, t1.company_name, t1.address, t1.city, t1.statusId, state_list.state as statename');
        $this->db->from('tbl_companies as t1');
		$this->db->join('state_list','state_list.id = t1.state');
		$this->db->where('t1.isDeleted', 0);
        $this->db->order_by('t1.company_name ASC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
	
	function getCompanyInfo($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_companies');
        $this->db->where('id', $id);
        $query = $this->db->get();
        
        return $query->result();
    }


    /**
     * This function used to check email exists or not
     * @param {string} $email : This is users email id
     * @return {boolean} $result : TRUE/FALSE
     */
    function checkCompanyExist($company_name, $pan, $companyId = 0)
    {
        $this->db->select("id");
        $this->db->from("tbl_companies");
        $this->db->where("company_name", $company_name);
		//$this->db->where("pan", $pan);
		$this->db->where("isDeleted", 0);		
        if($companyId != 0){
            $this->db->where("id !=", $companyId);
        }
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
    function addNewCompanies($data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_companies', $data);        
        $insert_id = $this->db->insert_id();        
        $this->db->trans_complete();
        
        return $insert_id;
    }
	
	function addNewCompanyRateDetails($data)
    {
		return $this->db->insert_batch('tbl_company_rates', $data);
    }
	function addNewCompanyCabRate($data)
    {
		return $this->db->insert_batch('tbl_company_full_day_rates', $data);
    }
	
	function getCompanyRateById($id)
    {	
		
		$this->db->select('cii.company_id, cii.vehicle_type_id, cii.zone, cii.zone_type, cii.cab_rate, cii.guard, cii.guard_price');
        $this->db->from('tbl_company_rates as cii');
		//$this->db->join('tbl_company_rates as cii','company.id = cii.company_id');
		$this->db->where('cii.company_id', $id);
		//$this->db->where('company.isDeleted', 0);
		//$this->db->where('cii.isDeleted', 0);
        $this->db->order_by('cii.id DESC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;		
    }
	function getCompanyRateFullDayById($id)
    {	
		
		$this->db->select('cii.company_id, cii.vehicle_type_id, cii.zone_id, cii.rate_km, cii.rate_flat, cii.night_charge, cii.toll_tax, cii.extra');
        $this->db->from('tbl_company_full_day_rates as cii');
		$this->db->where('cii.company_id', $id);
        $this->db->order_by('cii.id DESC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;		
    }
	function deleteCompanyRateDetails($company_id)
    {
		$this->db->delete('tbl_company_rates', array('company_id' => $company_id));
		return true;
    }
	function deleteCompanyCabRate($company_id)
    {
		$this->db->delete('tbl_company_full_day_rates', array('company_id' => $company_id));
		return true;
    }
    
    /**
     * This function is used to edit Guard
     */
    function editCompany($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_companies', $data);
        return TRUE;
    }
    
    /**
     * This function is used to delete Guard
     */
    function deleteCompany($id, $data)
    {
		$this->db->where('id', $id);
        $this->db->update('tbl_companies', $data);
        
        return $this->db->affected_rows();
    }
	
	function getBranchList()
    {		
		$this->db->select('BranchTbl.id, BranchTbl.contact_person, BranchTbl.email, BranchTbl.mobile, BranchTbl.pan, BranchTbl.gstin, BranchTbl.pincode, BranchTbl.address, BranchTbl.city, BranchTbl.name, BranchTbl.landline, BranchTbl.statusId, State.state as statename, CompanyTbl.company_name');
		$this->db->from('tbl_company_branch as BranchTbl');
		$this->db->join('state_list as State','State.id = BranchTbl.state');
		$this->db->join('tbl_companies as CompanyTbl','CompanyTbl.id = BranchTbl.company_id', 'left');
		$this->db->where('BranchTbl.isDeleted', 0);
		$this->db->order_by('BranchTbl.id ASC');
		$query = $this->db->get();
		$result = $query->result();        
		return $result;
    }


	/**
     * This function used to check email exists or not
     * @param {string} $email : This is users email id
     * @return {boolean} $result : TRUE/FALSE
     */
    function checkBranchCompanyExist($company_id, $name, $id = 0)
    {
        $this->db->select("id");
        $this->db->from("tbl_company_branch");
        $this->db->where("company_id", $company_id); 
		$this->db->where("name", $name);
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
     * This function is used to add a new task
     */
    function addNewBranch($companyInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_company_branch', $companyInfo);        
        $insert_id = $this->db->insert_id();        
        $this->db->trans_complete();
        
        return $insert_id;
    }

	function getCompanyBranchInfo($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_company_branch');
        $this->db->where('id', $id);
        $query = $this->db->get();
        
        return $query->result();
    }

	/**
     * This function is used to edit Guard
     */
    function editCompanyBranch($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_company_branch', $data);
        return TRUE;
    }
    
    /**
     * This function is used to delete Guard
     */
    function deleteCompanyBranch($id, $data)
    {
		$this->db->where('id', $id);
        $this->db->update('tbl_company_branch', $data);
        
        return $this->db->affected_rows();
    }
	
	function getCompanyList()
    {		
		$this->db->select('id, company_name');
        $this->db->from('tbl_companies');
		$this->db->where('isDeleted', 0);
		$this->db->where('statusId', 1);
        $this->db->order_by('company_name ASC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
	
	
	function getBranchListbyCompanyId($id)
    {		
		$this->db->select('id, name');
		$this->db->from('tbl_company_branch');
		$this->db->where("company_id", $id); 
		$this->db->where('isDeleted', 0);
		$query = $this->db->get();
		$result = $query->result();        
		return $result;
    }
	
	function getCompanyRate($data)
    {
		
        $this->db->select('cab_rate as cab_rate_company, guard_price as guard_price_company');
        $this->db->from('tbl_company_rates');
        //$this->db->where('vendor_id', $data['vendor_id']);
		//$this->db->where('vehicle_id', $data['vehicle_id']);
			
		$this->db->where('company_id', $data['company_id']);
		$this->db->where('vehicle_type_id', $data['vehicle_type_id']);
		$this->db->where('zone', $data['zone_id']);
		$this->db->where('zone_type', $data['zone_type_id']);
        $query = $this->db->get();
        
        return $query->result();
    }
}

  