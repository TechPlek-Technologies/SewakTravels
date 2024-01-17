<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Master_model extends CI_Model
{

    /**
     * This function is used to get state list
     */
    function getStateList()
    {
        $this->db->select('*');
        $this->db->from('state_list');
        $query = $this->db->get();
        
        return $query->result();
    }
	
	

	
	/**
     * This function is used to get tasks
     */
    function getGuards()
    {	
		
		$this->db->select('GuardTbl.id, GuardTbl.salutation, GuardTbl.name, GuardTbl.email, GuardTbl.mobile, GuardTbl.pan, GuardTbl.dob, GuardTbl.pincode, GuardTbl.address, GuardTbl.city, GuardTbl.state, GuardTbl.company_name, GuardTbl.statusId, State.state as statename');
        $this->db->from('tbl_guards as GuardTbl');
        $this->db->join('state_list as State','State.id = GuardTbl.state');
        $this->db->order_by('GuardTbl.id ASC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }


    /**
     * This function used to check email exists or not
     * @param {string} $email : This is users email id
     * @return {boolean} $result : TRUE/FALSE
     */
    function checkGuardExist($stateId, $guardId = 0)
    {
        $this->db->select("id");
        $this->db->from("tbl_guards");
        $this->db->where("stateId", $stateId);   
        if($guardId != 0){
            $this->db->where("id !=", $guardId);
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
    function addNewGuards($guardInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_guards', $guardInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    /**
     * This function used to get task information by id
     * @param number $taskId : This is task id
     * @return array $result : This is task information
     */
    function getGuardInfo($guardId)
    {
        $this->db->select('*');
        $this->db->from('tbl_guards');
        $this->db->where('id', $guardId);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    /**
     * This function is used to edit Guard
     */
    function editGuard($guardInfo, $guardId)
    {
        $this->db->where('id', $guardId);
        $this->db->update('tbl_guards', $guardInfo);
        
        //$this->db->affected_rows();
        return TRUE;
    }
    
    /**
     * This function is used to delete Guard
     */
    function deleteGuard($guardId)
    {
        $this->db->where('id', $guardId);
        $this->db->delete('tbl_guards');
        return TRUE;
    }
	
	/**
     * This function is used to get tasks
     */
    function getGuardPrices()
    {	
		
		$this->db->select('GuardPriceTbl.id, GuardPriceTbl.gender, GuardPriceTbl.price, GuardPriceTbl.statusId');
        $this->db->from('tbl_guard_prices as GuardPriceTbl');
        $this->db->order_by('GuardPriceTbl.id ASC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }


    /**
     * This function used to check email exists or not
     * @param {string} $email : This is users email id
     * @return {boolean} $result : TRUE/FALSE
     */
    function checkGuardPriceExist($gender, $guardPriceId = 0)
    {
        $this->db->select("id");
        $this->db->from("tbl_guard_prices");
        $this->db->where("gender", $gender);   
        if($guardPriceId != 0){
            $this->db->where("id !=", $guardPriceId);
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
    function addNewGuardPrices($guardPriceInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_guard_prices', $guardPriceInfo);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }

    /**
     * This function used to get task information by id
     * @param number $taskId : This is task id
     * @return array $result : This is task information
     */
    function getGuardPriceInfo($guardPriceId)
    {
        $this->db->select('*');
        $this->db->from('tbl_guard_prices');
        $this->db->where('id', $guardPriceId);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    /**
     * This function is used to edit Guard
     */
    function editGuardPrice($guardPriceInfo, $guardPriceId)
    {
        $this->db->where('id', $guardPriceId);
        $this->db->update('tbl_guard_prices', $guardPriceInfo);
        
        //$this->db->affected_rows();
        return TRUE;
    }
    
    /**
     * This function is used to delete Guard
     */
    function deleteGuardPrice($guardPriceId)
    {
        $this->db->where('id', $guardPriceId);
        $this->db->delete('tbl_guard_prices');
        return TRUE;
    }
	
	
	
	
	
	function cabTypeList()
    {	
		
		$this->db->select('id, type');
        $this->db->from('tbl_vehicle_type');
        $this->db->order_by('id ASC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }


    /**
     * This function used to check email exists or not
     * @param {string} $email : This is users email id
     * @return {boolean} $result : TRUE/FALSE
     */
    function checkVendorExist($stateId, $vendorId = 0)
    {
        $this->db->select("id");
        $this->db->from("tbl_guards");
        $this->db->where("stateId", $stateId);   
        if($vendorId != 0){
            $this->db->where("id !=", $vendorId);
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
    function checkVehicleExist($vehicle_no, $vendorId = 0)
    {
        $this->db->select("id");
        $this->db->from("tbl_vendors");
        $this->db->where("vehicle_no", $vehicle_no);   
        if($vendorId != 0){
            $this->db->where("id !=", $vendorId);
        }
        $query = $this->db->get();

        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    
   
	
	

    
    
    
	
	
	
	
     
	
	/**
     * This function is used to get tasks
     */
    function getInvoices()
    {	
		
		$this->db->select('GuardTbl.id, GuardTbl.salutation, GuardTbl.name, GuardTbl.email, GuardTbl.mobile, GuardTbl.pan, GuardTbl.dob, GuardTbl.pincode, GuardTbl.address, GuardTbl.city, GuardTbl.state, GuardTbl.company_name, GuardTbl.statusId, State.state as statename');
        $this->db->from('tbl_guards as GuardTbl');
        $this->db->join('state_list as State','State.id = GuardTbl.state');
        $this->db->order_by('GuardTbl.id ASC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }


    /**
     * This function used to check email exists or not
     * @param {string} $email : This is users email id
     * @return {boolean} $result : TRUE/FALSE
     */
    function checkInvoiceExist($stateId, $invoiceId = 0)
    {
        $this->db->select("id");
        $this->db->from("tbl_guards");
        $this->db->where("stateId", $stateId);   

        $query = $this->db->get();

        if ($query->num_rows() > 0){
            return true;
        } else {
            return false;
        }
    }

    
   

    /**
     * This function used to get task information by id
     * @param number $taskId : This is task id
     * @return array $result : This is task information
     */
    function getInvoiceInfo($invoiceId)
    {
        $this->db->select('*');
        $this->db->from('tbl_guards');
        $this->db->where('id', $invoiceId);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    /**
     * This function is used to edit Guard
     */
    function editInvoice($invoiceInfo, $invoiceId)
    {
        $this->db->where('id', $invoiceId);
        $this->db->update('tbl_guards', $invoiceInfo);
        
        //$this->db->affected_rows();
        return TRUE;
    }
    
    /**
     * This function is used to delete Guard
     */
    function deleteInvoice($invoiceId)
    {
        $this->db->where('id', $invoiceId);
        $this->db->delete('tbl_guards');
        return TRUE;
    }
	
	
	/* generate financial year for client */

    public function generateFinancialYear() {

        $financial_year = date('Y') . "-" . date('Y', strtotime('+1 years'));
        if (date('n') < 4) {
            $financial_year = date('Y', strtotime('-1 years')) . "-" . date('Y');
        }

        return $financial_year;
    }
	
	/* generate invoice number for client */
    function generateInvoiceNumber($userId) 
	{

		$currentFinancialYear = $this->generateFinancialYear();
		
		$this->db->select('invoice_no');
        $this->db->from('tbl_roster');
        $this->db->where('financial_year', $currentFinancialYear);
		$this->db->where('createdBy', $userId);
        $query = $this->db->get();
		$invoices = $query->result();

        if (!empty($invoices)) {
            $nextInvoice = count($invoices) + 1;
            return "INV-" . str_pad($nextInvoice, 12, "0", STR_PAD_LEFT);
        } else {
            return "INV-000000000001";
        }
    }


     /**
     * This function is used to add a new task
     */
    function addNewInvoices($data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_roster', $data);        
        $insert_id = $this->db->insert_id();        
        $this->db->trans_complete();
        
        return $insert_id;
    }
	
	function deleteInvoicesDetails($id)
    {
		$this->db->delete('tbl_roster_details', array('invoice_id' => $id));
		return true;
    }

	function addNewInvoicesDetails($data)
    {
		return $this->db->insert_batch('tbl_roster_details', $data);
    }

    function getCabRosterList()
    {	
		
		$this->db->select('roster.id, roster.invoice_no, roster.invoice_date, roster.company_id, roster.statusId, roster.createdDtm, company.company_name');
        $this->db->from('tbl_roster as roster');
        $this->db->join('tbl_companies as company','company.id = roster.company_id');
		$this->db->where('roster.isDeleted', 0);
        $this->db->order_by('roster.id DESC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
	
	
	
	function getCabRosterById($id)
    {	
		
		$this->db->select('roster.id, roster.invoice_no, roster.invoice_date, roster.company_id, roster.statusId, cii.vendor_id, cii.vehicle_id, cii.shift_timing, cii.roster_type, cii.vehicle_no, cii.vehicle_type, cii.trip_id, cii.location, cii.guard, cii.zone, cii.penality, cii.penality_clause, cii.car_rate as rate, cii.guard_rate, cii.zone_type, cii.is_cancel, cii.vendor_rate, cii.vendor_guard_rate');
        $this->db->from('tbl_roster as roster');
		$this->db->join('tbl_roster_details as cii','roster.id = cii.invoice_id');
		$this->db->where('roster.id', $id);
		$this->db->where('roster.isDeleted', 0);
		$this->db->where('cii.isDeleted', 0);
        $this->db->order_by('roster.id DESC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;		
    }
	
	function getCabRosterListByCompId($id, $start_date = NULL, $end_date = NULL)
    {	
		
		$this->db->select('roster.id, roster.invoice_no, roster.invoice_date, roster.company_id, roster.statusId, roster.createdDtm, company.company_name');
        $this->db->from('tbl_roster as roster');
        $this->db->join('tbl_companies as company','company.id = roster.company_id');
		
		
		if(!empty($start_date) && !empty($end_date)) {
           /* $likeCriteria = "(roster.createdDtm >= '".$start_date." 00:00:00'
                            AND roster.createdDtm <= '".$end_date." 23:59:59')";	*/	

			$likeCriteria = "(roster.createdDtm BETWEEN '".$start_date." 00:00:00' AND '".$end_date." 23:59:59')";							
            $this->db->where($likeCriteria);
        }
		
		
		
		
		$this->db->where('roster.company_id', $id);
		$this->db->where('roster.isDeleted', 0);
        $this->db->order_by('roster.id DESC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;
    }
	
	function getCabRosterByCompId($id)
    {		
		$this->db->select('roster.id, roster.invoice_no, roster.invoice_date, roster.company_id, roster.statusId, cii.vendor_id, cii.vehicle_id, cii.shift_timing, cii.roster_type, cii.vehicle_no, cii.vehicle_type, cii.trip_id, cii.location, cii.guard, cii.penality, cii.penality_clause, company.company_name, vehicle_type.type as v_type, zone.name as zone, zone_type.type as zone_type, zone_type.description as zone_description, cii.is_cancel, cii.id as roster_details_id, cii.isDeleted');
        $this->db->from('tbl_roster as roster');
		$this->db->join('tbl_roster_details as cii','roster.id = cii.invoice_id');
		$this->db->join('tbl_vehicle_type as vehicle_type','vehicle_type.id = cii.vehicle_type');
        $this->db->join('tbl_companies as company','company.id = roster.company_id');
        $this->db->join('tbl_zone as zone','zone.id = cii.zone');
        $this->db->join('tbl_zone_type as zone_type','zone_type.id = cii.zone_type');
		$this->db->where('roster.id', $id);
		$this->db->where('roster.isDeleted', 0);
		//$this->db->where('cii.isDeleted', 0);
        $this->db->order_by('roster.id DESC');
        $query = $this->db->get();
        $result = $query->result();        
        return $result;		
    }
	
	function editCabRoster($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_roster', $data);
        
        //$this->db->affected_rows();
        return TRUE;
    }
	
	function deleteCabRoster($id, $data)
    {		
		$this->db->where('id', $id);
        $this->db->update('tbl_roster', $data);
        
        return $this->db->affected_rows();
    }
	
	
	function getVehicleReport()
    {	
		
		$this->db->select('vehicle.id, vehicle.vendor_id, vehicle.vehicle_type_id, vehicle.vehicle_no, vendor.name as vendor_name');
        $this->db->from('tbl_vendors_vehicle as vehicle');
		$this->db->join('tbl_vendors as vendor','vendor.id = vehicle.vendor_id');
		$this->db->where('vehicle.isDeleted', 0);
		$this->db->where('vehicle.statusId', 1);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;		
    }
	
	function vehicleCompany($id)
    {	
		
		$this->db->select('tbl_vendor_company.cab_rate_vendor, tbl_companies.company_name, count(roster.roster_type) as total_trip');
        $this->db->from('tbl_vendor_company');
		$this->db->join('tbl_companies','tbl_companies.id = tbl_vendor_company.company_id', 'left');
		$this->db->join('tbl_roster_details as roster','roster.vehicle_id = tbl_vendor_company.vehicle_id', 'left');
		$this->db->where('tbl_vendor_company.vehicle_id', $id);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;		
    }
	
	function viewVehicleReport($id)
    {	
		
		$this->db->select('count(roster.roster_type) as total_trip, roster.id, roster.vehicle_type, roster.roster_type');
        $this->db->from('tbl_roster_details as roster');
		//$this->db->join('tbl_vendors as vendor','vendor.id = vehicle.vendor_id');
		$this->db->where('roster.vehicle_id', $id);
        $query = $this->db->get();
        $result = $query->result();        
        return $result;		
    }
	
	
	function getAllVendorReport()
    {	
		
		/*$this->db->select('vendor.id as vendor_id, vendor.name, vendor_vehicle.id as vehicle_id');
        $this->db->from('tbl_vendors as vendor');
		$this->db->join('tbl_vendors_vehicle as vendor_vehicle','vendor_vehicle.id = vendor.id');
		//$this->db->join('tbl_roster_details as roster_details','roster_details.vehicle_id = vendor_vehicle.id', 'left');
		$this->db->where('vendor.isDeleted', 0);
		$this->db->where('vendor.statusId', 1);*/
		
		/*$query = $this->db->query('SELECT COUNT(roster_details.id) as total_trip, vendor.name
		FROM tbl_roster_details as roster_details 
		LEFT JOIN tbl_vendors_vehicle as vendor_vehicle ON vendor_vehicle.id = roster_details.vehicle_id 
		LEFT JOIN tbl_vendors as vendor ON vendor.id = vendor_vehicle.vendor_id'
		);*/
		
		//$this->db->select('roster_details.id as roster_id, roster_details.vendor_id, roster_details.vehicle_id, roster_details.company_id, vendor.name, company.company_name as company_name, vehicle.vehicle_no');
		$this->db->select('count(*) as total_trip, roster_details.id as roster_id, roster_details.vendor_id, roster_details.vehicle_id, roster_details.company_id, vendor.name, company.company_name as company_name');
        $this->db->from('tbl_roster_details as roster_details');
		$this->db->join('tbl_vendors as vendor','vendor.id = roster_details.vendor_id', 'left');
		//$this->db->join('tbl_vendors_vehicle as vehicle','vehicle.id = roster_details.vehicle_id', 'left');
		$this->db->join('tbl_companies as company','company.id = roster_details.company_id', 'left');
		$query = $this->db->group_by('roster_details.company_id, roster_details.vendor_id');
		$query = $this->db->order_by('vendor.name');
		
        $query = $this->db->get();
        $result = $query->result();        
        return $result;		
    }
	
	function getAllReports($data)
    {

        // $this->db->select('count(*) as total_trip, roster_details.id as roster_id, roster_details.vendor_id, roster_details.vehicle_id, roster_details.company_id, vendor.name as vendor_name, vehicle.vehicle_no, company.company_name as company_name, roster_details.guard, SUM(roster_details.car_rate) as cab_rate, SUM(roster_details.guard_rate) as guard_rate, roster_details.penality, roster_details.car_rate as rate');
        // $this->db->from('tbl_roster_details as roster_details');
        // $this->db->join('tbl_vendors as vendor','vendor.id = roster_details.vendor_id', 'left');
        // $this->db->join('tbl_vendors_vehicle as vehicle','vehicle.id = roster_details.vehicle_id', 'left');
        // $this->db->join('tbl_companies as company','company.id = roster_details.company_id', 'left');	

        // if($data['company_id'] != 0){
        // 	$this->db->where('roster_details.company_id', $data['company_id']);
        // }
        // if($data['vendor_id'] != 0){
        // 	$this->db->where('roster_details.vendor_id', $data['vendor_id']);
        // }
        // if($data['vehicle_id'] != 0){
        // 	$this->db->where('roster_details.vehicle_id', $data['vehicle_id']);
        // }
        // if($data['start_date'] != 0 && $data['end_date'] != 0)
        // {
        // 	$dateWise = array('roster_details.createdDtm >=' => date('Y-m-d 00:00:00',strtotime($data['start_date'])), 'roster_details.createdDtm <=' => date('Y-m-d 23:59:59',strtotime($data['end_date'])));
        // 	$this->db->where($dateWise);
        // }

        // $this->db->group_by('roster_details.company_id, roster_details.vendor_id');
        // $this->db->order_by('vendor.name');		
        // $query = $this->db->get();
		//SUM(roster_details.vendor_guard_rate) AS guard_rate, roster_details.penality,

        $this->db->select('count(*) as total_trip, roster_details.id as roster_id, roster_details.vendor_id, roster_details.vehicle_id, roster_details.company_id, vendor.name as vendor_name, vehicle.vehicle_no, company.company_name as company_name, roster_details.guard, SUM(roster_details.car_rate) as company_cab_rate, SUM(roster_details.guard_rate) as company_guard_rate, roster_details.car_rate as company_rate, SUM(roster_details.vendor_rate) as cab_rate, SUM(CASE WHEN roster_details.guard = 1 THEN roster_details.vendor_guard_rate ELSE 0 END) AS guard_rate, `roster_details`.`vendor_rate` AS `rate`, SUM(roster_details.penality) as penality');
        $this->db->from('tbl_roster_details as roster_details');
        $this->db->join('tbl_vendors as vendor', 'vendor.id = roster_details.vendor_id', 'left');
        $this->db->join('tbl_vendors_vehicle as vehicle', 'vehicle.id = roster_details.vehicle_id', 'left');
        $this->db->join('tbl_companies as company', 'company.id = roster_details.company_id', 'left');

        if ($data['company_id'] != 0) {
            $this->db->where('roster_details.company_id', $data['company_id']);
        }
        if ($data['vendor_id'] != 0) {
            $this->db->where('roster_details.vendor_id', $data['vendor_id']);
        }
        if ($data['vehicle_id'] != 0) {
            $this->db->where('roster_details.vehicle_id', $data['vehicle_id']);
        }
        if ($data['start_date'] != 0 && $data['end_date'] != 0) {
            $dateWise = array('roster_details.createdDtm >=' => date('Y-m-d 00:00:00', strtotime($data['start_date'])), 'roster_details.createdDtm <=' => date('Y-m-d 23:59:59', strtotime($data['end_date'])));
            $this->db->where($dateWise);
        }

        $this->db->group_by('roster_details.company_id, roster_details.vendor_id');
        $this->db->order_by('vendor.name');
        $query = $this->db->get();


        //$str = $this->db->last_query();
        //pre($str);


        $result = $query->result(); 
		
        return $result;		
    }
	
	function viewSearchRosterDetails($data)
    {	
		$this->db->select('roster_details.id as roster_details_id, roster_details.invoice_id as roster_id, roster_details.vendor_id, roster_details.vehicle_id, roster_details.company_id, roster_details.shift_timing, roster_details.roster_type, roster_details.vehicle_no, roster_details.trip_id, roster_details.location, roster_details.guard, roster_details.penality, roster_details.penality_clause, roster_details.guard_rate as company_guard_rate, roster_details.car_rate as company_car_rate, vendor.name as vendor_name, vehicle.vehicle_no, company.company_name as company_name, zone.name as zone_name, vehicle_type.type as vehicle_type, zone_type.type as zone_type, zone_type.description as zone_description, roster.invoice_no, roster.invoice_date, roster_details.vendor_guard_rate as guard_rate, roster_details.vendor_rate as car_rate');
        $this->db->from('tbl_roster_details as roster_details');
		$this->db->join('tbl_vendors as vendor','vendor.id = roster_details.vendor_id', 'left');
		$this->db->join('tbl_vendors_vehicle as vehicle','vehicle.id = roster_details.vehicle_id', 'left');
		$this->db->join('tbl_companies as company','company.id = roster_details.company_id', 'left');
		$this->db->join('tbl_zone as zone','zone.id = roster_details.zone', 'left');		
		$this->db->join('tbl_zone_type as zone_type','zone_type.id = roster_details.zone_type', 'left');
		$this->db->join('tbl_vehicle_type as vehicle_type','vehicle_type.id = roster_details.vehicle_type', 'left');
		$this->db->join('tbl_roster as roster','roster.id = roster_details.invoice_id', 'left');
		
		$this->db->where('roster_details.company_id', $data['company_id']);
		$this->db->where('roster_details.vendor_id', $data['vendor_id']);
		$this->db->where('roster_details.vehicle_id', $data['vehicle_id']);

		$dateWise = array('roster_details.createdDtm >=' => date('Y-m-d 00:00:00',strtotime($data['start_date'])), 'roster_details.createdDtm <=' => date('Y-m-d 23:59:59',strtotime($data['end_date'])));
		$this->db->where($dateWise);
		
		//$this->db->group_by('roster_details.company_id, roster_details.vendor_id');
		$this->db->order_by('vendor.name');
		
        $query = $this->db->get();

        //$str = $this->db->last_query();
        //pre($str);
        $result = $query->result(); 
		
        return $result;		
    }
	
	
	function getZoneWiseReports($data)
    {
	//roster_details.vendor_guard_rate as guard_rate/
		
		$this->db->select('count(*) as total_trip, roster_details.id as roster_id, roster_details.vendor_id, roster_details.vehicle_id, roster_details.company_id, vendor.name as vendor_name, vendor.pan as vendor_pan, vendor.office_charge, vehicle.vehicle_no,  vehicle.gps_rate, company.company_name as company_name, roster_details.guard, SUM(roster_details.car_rate) as company_cab_rate, SUM(roster_details.guard_rate) as company_guard_rate, roster_details.penality, roster_details.car_rate as rate, vehicle_type.type as vehicle_type, roster_details.zone, roster_details.zone_type, zone.name as zone_name, zone_type.type as zone_type, zone_type.description as zone_description, sum(advance_details.amount) as advance_amount, advance_details.rate as advance_rate, SUM(roster_details.penality) as total_penality, SUM(roster_details.vendor_rate) as cab_rate, roster_details.vendor_rate as rate, `vehicle`.`emi_rate`, 
		SUM(CASE WHEN roster_details.guard = 1 THEN roster_details.vendor_guard_rate ELSE 0 END) AS guard_rate, zone.state_id');
        $this->db->from('tbl_roster_details as roster_details');
		$this->db->join('tbl_vendors as vendor','vendor.id = roster_details.vendor_id', 'left');
		$this->db->join('tbl_vendors_vehicle as vehicle','vehicle.id = roster_details.vehicle_id', 'left');
		$this->db->join('tbl_companies as company','company.id = roster_details.company_id', 'left');
		$this->db->join('tbl_vehicle_type as vehicle_type','vehicle_type.id = roster_details.vehicle_type', 'left');
		$this->db->join('tbl_zone as zone','zone.id = roster_details.zone', 'left');		
		$this->db->join('tbl_zone_type as zone_type','zone_type.id = roster_details.zone_type', 'left');
		$this->db->join('tbl_advance_details as advance_details','advance_details.vehicle_id = roster_details.vehicle_id AND advance_details.advance_date >="'.$data['start_date'].'" AND advance_details.advance_date <="'.$data['end_date'].'"', 'left');
		
		if($data['company_id'] != 0){
			$this->db->where('roster_details.company_id', $data['company_id']);
		}
		if($data['vendor_id'] != 0){
			$this->db->where('roster_details.vendor_id', $data['vendor_id']);
		}
		if($data['vehicle_id'] != 0){
			$this->db->where('roster_details.vehicle_id', $data['vehicle_id']);
		}
		if($data['start_date'] != 0 && $data['end_date'] != 0)
		{
			$dateWise = array('roster_details.createdDtm >=' => date('Y-m-d 00:00:00',strtotime($data['start_date'])), 'roster_details.createdDtm <=' => date('Y-m-d 23:59:59',strtotime($data['end_date'])));
			$this->db->where($dateWise);
		}
		
		$this->db->group_by('roster_details.company_id, roster_details.vendor_id, roster_details.vehicle_type, roster_details.zone, roster_details.zone_type');
		$this->db->order_by('company.company_name, zone.name');
		
        $query = $this->db->get();

       // $str = $this->db->last_query();
        //pre($str);

        $result = $query->result(); 
		
        return $result;		
    }
	
	
	


    function getZoneByVendorId($vendor_id, $company_id)
    {
       /* $this->db->select('t1.id, t1.zone_type_id, zone_type.type as zone_type, zone_type.description, t1.zone_id as zone_id');
        $this->db->from('tbl_zone_attach as t1');
		$this->db->join('tbl_zone_type as zone_type', 'zone_type.id = t1.zone_type_id','left');
        $this->db->where('t1.zone_id', $zone_id);
		$this->db->where('t1.isDeleted', 0);
        $this->db->where('t1.statusId', 1);*/
        
        $this->db->select('t1.id as vendor_company_id, t1.vendor_id, t1.company_id, t1.zone_id, t1.zone_type_id, t1.guard_price, t2.name as zone_name');
        $this->db->from('tbl_vendor_company as t1');
        $this->db->join('tbl_zone as t2','t2.id = t1.zone_id');
        $this->db->where('t1.vendor_id', $vendor_id);
        $this->db->where('t1.company_id', $company_id);
        $this->db->where('t1.isDeleted', 0);
        $this->db->group_by('t1.zone_id');
        $query = $this->db->get();
        
        return $query->result();
    }

    function getZoneTypeById($vendor_id, $zone_id, $company_id)
    {        
        $this->db->select('t1.id as vendor_company_id, t1.vendor_id, t1.company_id, t1.zone_id, t1.zone_type_id, t2.type as zone_type, t2.description, t1.zone_id as zone_id');
        $this->db->from('tbl_vendor_company as t1');
        $this->db->join('tbl_zone_type as t2','t2.id = t1.zone_type_id');
        $this->db->where('t1.vendor_id', $vendor_id);
        $this->db->where('t1.company_id', $company_id);
        $this->db->where('t1.zone_id', $zone_id);
        $this->db->where('t1.isDeleted', 0);
		$this->db->where('t1.statusId', 1);
        $query = $this->db->get();
       
        return $query->result();
    }

    function getCabRate($data)
    {

        // $this->db->select('t1.guard_price as guard_price_company, t2.rate as cab_rate_company');
        // $this->db->from('tbl_vendor_company as t1');
        // $this->db->join('tbl_vendor_company_price as t2','t2.vendor_company_id = t1.id');
        // $this->db->where('t1.vendor_id', $data['vendor_id']);
        // $this->db->where('t1.company_id', $data['company_id']);
        // $this->db->where('t1.zone_id', $data['zone_id']);
        // $this->db->where('t1.zone_type_id', $data['zone_type_id']);
        // $this->db->where('t2.vehicle_type_id', $data['vehicle_type_id']);
        // $query = $this->db->get();

        $this->db->select('t1.guard_price as guard_price_vendor, t2.rate as cab_rate_vendor, t3.guard_price AS guard_price_company, t3.cab_rate AS cab_rate_company');
        $this->db->from('tbl_vendor_company as t1');
        $this->db->join('tbl_vendor_company_price as t2', 't2.vendor_company_id = t1.id');
        $this->db->join('tbl_company_rates AS t3', 't3.company_id = t1.company_id AND t3.statusId = 1');
        $this->db->where('t1.vendor_id', $data['vendor_id']);
        $this->db->where('t1.company_id', $data['company_id']);
        $this->db->where('t1.zone_id', $data['zone_id']);
        $this->db->where('t1.zone_type_id', $data['zone_type_id']);
        $this->db->where('t2.vehicle_type_id', $data['vehicle_type_id']);
        $this->db->where('t3.zone', $data['zone_id']);
        $this->db->where('t3.zone_type', $data['zone_type_id']);
        $this->db->where('t3.vehicle_type_id', $data['vehicle_type_id']);
        $query = $this->db->get();


       //$str = $this->db->last_query();
       // pre($str);

        return $query->result();
    }

    function cancelRoster($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_roster_details', $data);
        
        return $this->db->affected_rows();
    }

    function deleteRoster($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_roster_details', $data);
        
        return $this->db->affected_rows();
    }

    /**
     * This function is used to add a new task
     */
    function cancelRosterWithTaxi($data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_roster_cancel_taxi', $data);
        
        $insert_id = $this->db->insert_id();
        
        $this->db->trans_complete();
        
        return $insert_id;
    }


    function getZoneTypeByIds($zone_id)
    {        
        $this->db->select('t1.id, t1.zone_type_id, zone_type.type as zone_type, zone_type.description, t1.zone_id as zone_id');
        $this->db->from('tbl_zone_attach as t1');
		$this->db->join('tbl_zone_type as zone_type', 'zone_type.id = t1.zone_type_id','left');
        $this->db->where('t1.zone_id', $zone_id);
		$this->db->where('t1.isDeleted', 0);
        $this->db->where('t1.statusId', 1);
        $query = $this->db->get();
        
        return $query->result();
    }
	
	function viewSearchRosterDetailsAll($data)
    {	
		$this->db->select('roster_details.id as roster_details_id, roster_details.invoice_id as roster_id, roster_details.vendor_id, roster_details.vehicle_id, roster_details.company_id, roster_details.shift_timing, roster_details.roster_type, roster_details.vehicle_no, roster_details.trip_id, roster_details.location, roster_details.guard, roster_details.penality, roster_details.penality_clause, roster_details.guard_rate as company_guard_rate, roster_details.car_rate as company_car_rate, vendor.name as vendor_name, vehicle.vehicle_no, company.company_name as company_name, zone.name as zone_name, vehicle_type.type as vehicle_type, zone_type.type as zone_type, zone_type.description as zone_description, roster.invoice_no, roster.invoice_date, roster_details.vendor_guard_rate as guard_rate, roster_details.vendor_rate as car_rate, zone.state_id');
        $this->db->from('tbl_roster_details as roster_details');
		$this->db->join('tbl_vendors as vendor','vendor.id = roster_details.vendor_id', 'left');
		$this->db->join('tbl_vendors_vehicle as vehicle','vehicle.id = roster_details.vehicle_id', 'left');
		$this->db->join('tbl_companies as company','company.id = roster_details.company_id', 'left');
		$this->db->join('tbl_zone as zone','zone.id = roster_details.zone', 'left');		
		$this->db->join('tbl_zone_type as zone_type','zone_type.id = roster_details.zone_type', 'left');
		$this->db->join('tbl_vehicle_type as vehicle_type','vehicle_type.id = roster_details.vehicle_type', 'left');
		$this->db->join('tbl_roster as roster','roster.id = roster_details.invoice_id', 'left');
				
		if($data['company_id'] != 0){
			$this->db->where('roster_details.company_id', $data['company_id']);
		}
		if($data['vendor_id'] != 0){
			$this->db->where('roster_details.vendor_id', $data['vendor_id']);
		}
		if($data['vehicle_id'] != 0){
			$this->db->where('roster_details.vehicle_id', $data['vehicle_id']);
		}
		
		if($data['start_date'] != 0 && $data['end_date'] != 0)
		{
			$dateWise = array('roster_details.createdDtm >=' => date('Y-m-d 00:00:00',strtotime($data['start_date'])), 'roster_details.createdDtm <=' => date('Y-m-d 23:59:59',strtotime($data['end_date'])));
			$this->db->where($dateWise);
		}

		
		
		//$this->db->group_by('roster_details.company_id, roster_details.vendor_id');
		$this->db->order_by('vendor.name, company.company_name');
		
        $query = $this->db->get();

        //$str = $this->db->last_query();
        //pre($str);
        $result = $query->result(); 
		
        return $result;		
    }
	
	
	function getZoneWiseReportsAll($data)
    {
	//roster_details.vendor_guard_rate as guard_rate/
		
		$this->db->select('count(*) as total_trip, roster_details.id as roster_id, roster_details.vendor_id, roster_details.vehicle_id, roster_details.company_id, vendor.name as vendor_name, vendor.pan as vendor_pan, vendor.office_charge, vehicle.vehicle_no,  vehicle.gps_rate, company.company_name as company_name, roster_details.guard, SUM(roster_details.car_rate) as company_cab_rate, SUM(roster_details.guard_rate) as company_guard_rate, roster_details.penality, roster_details.car_rate as rate, vehicle_type.type as vehicle_type, roster_details.zone, roster_details.zone_type, zone.name as zone_name, zone_type.type as zone_type, zone_type.description as zone_description, sum(advance_details.amount) as advance_amount, advance_details.rate as advance_rate, SUM(roster_details.penality) as total_penality, SUM(roster_details.vendor_rate) as cab_rate, roster_details.vendor_rate as rate, `vehicle`.`emi_rate`, 
		SUM(CASE WHEN roster_details.guard = 1 THEN roster_details.vendor_guard_rate ELSE 0 END) AS guard_rate, zone.state_id');
        $this->db->from('tbl_roster_details as roster_details');
		$this->db->join('tbl_vendors as vendor','vendor.id = roster_details.vendor_id', 'left');
		$this->db->join('tbl_vendors_vehicle as vehicle','vehicle.id = roster_details.vehicle_id', 'left');
		$this->db->join('tbl_companies as company','company.id = roster_details.company_id', 'left');
		$this->db->join('tbl_vehicle_type as vehicle_type','vehicle_type.id = roster_details.vehicle_type', 'left');
		$this->db->join('tbl_zone as zone','zone.id = roster_details.zone', 'left');		
		$this->db->join('tbl_zone_type as zone_type','zone_type.id = roster_details.zone_type', 'left');
		$this->db->join('tbl_advance_details as advance_details','advance_details.vehicle_id = roster_details.vehicle_id AND advance_details.advance_date >="'.$data['start_date'].'" AND advance_details.advance_date <="'.$data['end_date'].'"', 'left');
		
		/* if($data['company_id'] != 0){
			$this->db->where('roster_details.company_id', $data['company_id']);
		}*/
		if($data['vendor_id'] != 0){
			$this->db->where('roster_details.vendor_id', $data['vendor_id']);
		}
		if($data['start_date'] != 0 && $data['end_date'] != 0)
		{
			$dateWise = array('roster_details.createdDtm >=' => date('Y-m-d 00:00:00',strtotime($data['start_date'])), 'roster_details.createdDtm <=' => date('Y-m-d 23:59:59',strtotime($data['end_date'])));
			$this->db->where($dateWise);
		}
		
		$this->db->group_by('roster_details.company_id, roster_details.vendor_id, roster_details.vehicle_type, roster_details.zone, roster_details.zone_type');
		$this->db->order_by('company.company_name, zone.name');
		
        $query = $this->db->get();

        //$str = $this->db->last_query();
        //pre($str);

        $result = $query->result(); 
		
        return $result;		
    }


    function getVehicleLoans($data)
    {
        // $this->db->select('count(*) as total_trip, roster_details.id as roster_id, roster_details.vendor_id, roster_details.vehicle_id, roster_details.company_id, vendor.name as vendor_name, vendor.pan as vendor_pan, vendor.office_charge, vehicle.vehicle_no,  vehicle.gps_rate, company.company_name as company_name, roster_details.guard, SUM(roster _details.car_rate) as company_cab_rate, SUM(roster_details.guard_rate) as company_guard_rate, roster_details.penality, roster_details.car_rate as rate, vehicle_type.type as vehicle_type, roster_details.zone, roster_details.zone_type, zone.name as zone_name, zone_type.type as zone_type, zone_type.description as zone_description, sum(advance_details.amount) as advance_amount, advance_details.rate as advance_rate, SUM(roster_details.penality) as total_penality, SUM(roster_details.vendor_rate) as cab_rate, roster_details.vendor_rate as rate, `vehicle`.`emi_rate`, 
        // SUM(CASE WHEN roster_details.guard = 1 THEN roster_details.vendor_guard_rate ELSE 0 END) AS guard_rate');

        $this->db->select('loan.id, loan_details.emi, SUM(`loan_details`.`emi`) AS total_emi');
        $this->db->from('tbl_vendor_loan as loan');
        $this->db->join('tbl_vendor_loan_details as loan_details', 'loan_details.vendor_loan_id = loan.id AND loan_details.month >="' . date('F', strtotime($data['start_date'])) . '" AND loan_details.month <="' . date('F', strtotime($data['end_date'])) . '" AND loan_details.year >="' . date('Y', strtotime($data['start_date'])) . '" AND loan_details.year <="' . date('Y', strtotime($data['end_date'])) . '"', 'left');


        if ($data['vendor_id'] != 0) {
            $this->db->where('loan.vendor_id', $data['vendor_id']);
        }
        if ($data['vehicle_id'] != 0) {
            $this->db->where('loan.vehicle_id', $data['vehicle_id']);
        }

        $this->db->where('loan.isDeleted', 0);

        

        $query = $this->db->get();

        //$str = $this->db->last_query();
        //pre($str);

        $result = $query->result();

        return $result;
    }


    function getVehicleMcd($data)
    {

        $this->db->select('SUM(`mcd`.`amount`) AS total_mcd');
        $this->db->from('tbl_vehicle_mcd as mcd');

        if ($data['vendor_id'] != 0) {
            $this->db->where('mcd.vendor_id', $data['vendor_id']);
        }
        if ($data['vehicle_id'] != 0) {
            $this->db->where('mcd.vehicle_id', $data['vehicle_id']);
        }

        if ($data['start_date'] != 0 && $data['end_date'] != 0) {
            //$dateWise = array('mcd.start_date >=' => date('Y-m', strtotime($data['start_date'])), 'mcd.end_date <=' => date('Y-m', strtotime($data['end_date'])));
            //$this->db->where($dateWise);

            $this->db->like('mcd.start_date', date('Y-m', strtotime($data['start_date'])));
        }

        $this->db->where('mcd.isDeleted', 0);

        $query = $this->db->get();

        //$str = $this->db->last_query();
        //pre($str);

        $result = $query->result();

        return $result;
    }

    function getVendorPfEsi($data)
    {

        $this->db->select('SUM(`vendor_charges`.`pf_amount`) AS total_pf, SUM(`vendor_charges`.`esi_amount`) AS total_esi');
        $this->db->from('tbl_vendor_charges as vendor_charges');

        if ($data['vendor_id'] != 0) {
            $this->db->where('vendor_charges.vendor_id', $data['vendor_id']);
        }

        if ($data['start_date'] != 0 && $data['end_date'] != 0) {
            $dateWise = array('vendor_charges.month_id >=' => date('m', strtotime($data['start_date'])), 'vendor_charges.month_id <=' => date('m', strtotime($data['end_date'])));
            $this->db->where($dateWise);

            //$this->db->like('vendor_charges.start_date', date('Y-m', strtotime($data['start_date'])));
        }

        $this->db->where('vendor_charges.isDeleted', 0);

        $query = $this->db->get();

        //$str = $this->db->last_query();
        //pre($str);

        $result = $query->result();

        return $result;
    }

    function getVehicleTax($data)
    {

        $this->db->select('SUM(`tax`.`amount`) AS total_tax, `tax`.`type`, tax.state_id');
        $this->db->from('tbl_vehicle_tax as tax');

        if ($data['vendor_id'] != 0) {
            $this->db->where('tax.vendor_id', $data['vendor_id']);
        }
        if ($data['vehicle_id'] != 0) {
            $this->db->where('tax.vehicle_id', $data['vehicle_id']);
        }

        if ($data['start_date'] != 0 && $data['end_date'] != 0) {
            //$dateWise = array('mcd.start_date >=' => date('Y-m', strtotime($data['start_date'])), 'mcd.end_date <=' => date('Y-m', strtotime($data['end_date'])));
            //$this->db->where($dateWise);

            $this->db->like('tax.start_date', date('Y-m', strtotime($data['start_date'])));
        }

        $this->db->where('tax.isDeleted', 0);

        $query = $this->db->get();

        //$str = $this->db->last_query();
        //pre($str);

        $result = $query->result();

        return $result;
    }
	
	
	
}

  