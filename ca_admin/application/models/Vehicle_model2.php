<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Vehicle_model2 extends CI_Model
{
	/**
     * This function is used to get state list
     */
    function getVehicleTypeList()
    {
        $this->db->select('id, type, description, slug');
        $this->db->from('tbl_vehicle_type');
		$this->db->where('isDeleted', 0);
        $query = $this->db->get();
        
        return $query->result();
    }
	
	/**
     * This function is used to get tasks
     */
    function getVehicleTypes()
    {		
		$this->db->select('id, type, description, slug');
        $this->db->from('tbl_vehicle_type');
		$this->db->where('isDeleted', 0);
        $query = $this->db->get();
        
        return $query->result();
    }

 
    /**
     * This function used to check email exists or not
     * @param {string} $email : This is users email id
     * @return {boolean} $result : TRUE/FALSE
     */
    function checkVehicleTypeExist($type, $id = null)
    {
        $this->db->select("id");
        $this->db->from("tbl_vehicle_type");
		$this->db->where('isDeleted', 0);
        $this->db->where("type", $type);
		
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
    function addNewVehicleTypes($vehicleTypeInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_vehicle_type', $vehicleTypeInfo);        
        $insert_id = $this->db->insert_id();        
        $this->db->trans_complete();        
        return $insert_id;
    }

    /**
     * This function used to get task information by id
     * @param number $taskId : This is task id
     * @return array $result : This is task information
     */
    function getVehicleTypeInfo($vehicleTypeId)
    {
        $this->db->select('*');
        $this->db->from('tbl_vehicle_type');
        $this->db->where('id', $vehicleTypeId);
		$this->db->where('isDeleted', 0);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    /**
     * This function is used to edit vehicle type
     */
    function editVehicleType($vehicleTypeInfo, $vehicleTypeId)
    {
        $this->db->where('id', $vehicleTypeId);
        $this->db->update('tbl_vehicle_type', $vehicleTypeInfo);
        
        //$this->db->affected_rows();
        return TRUE;
    }
    
    /**
     * This function is used to delete vehicle type
     */
    function deleteVehicleType($id, $data)
    {		
		$this->db->where('id', $id);
        $this->db->update('tbl_vehicle_type', $data);
        
        return $this->db->affected_rows();
    }

    /**
     * This function used to check email exists or not
     * @param {string} $email : This is users email id
     * @return {boolean} $result : TRUE/FALSE
     */
    function checkVehicleExist($vendor_id, $vehicle_no, $id = null)
    {
        $this->db->select("id");
        $this->db->from("tbl_vendors_vehicle");
		$this->db->where('isDeleted', 0);
        //$this->db->where("vendor_id", $vendor_id);
        $this->db->where("vehicle_no", $vehicle_no);
		
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
    function addNewVehicle($data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_vendors_vehicle', $data);        
        $insert_id = $this->db->insert_id();        
        $this->db->trans_complete();        
        return $insert_id;
    }

    /**
     * This function is used to add a new task
     */
    function addNewVehicleEmi($data)
    {      
        $result = $this->db->insert('tbl_vendor_emi', $data);

        if($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function getVehicleInfoByVendorId($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendors_vehicle');
        $this->db->where('vendor_id', $id);
		$this->db->where('isDeleted', 0);
        $query = $this->db->get();
        
        return $query->result();
    }

    function getVehicleInfoById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendors_vehicle');
        $this->db->where('id', $id);
		$this->db->where('isDeleted', 0);
        $query = $this->db->get();
        
        return $query->result();
    }

    /**
     * This function is used to edit vehicle type
     */
    function editVehicle($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_vendors_vehicle', $data);
        
        //$this->db->affected_rows();
        return TRUE;
    }

    

     /**
     * This function is used to delete vehicle type
     */
    function deleteVehicle($id, $data)
    {		
		$this->db->where('id', $id);
        $this->db->update('tbl_vendors_vehicle', $data);
        
        return $this->db->affected_rows();
    }

    /**
     * This function is used to add a new task
     */
    function editVendorEmi($data)
    {

        $this->db->select("id");
        $this->db->from("tbl_vendor_emi");
		$this->db->where('isDeleted', 0);
        $this->db->where("vendor_id", $data['vendor_id']);
        $this->db->where("vehicle_id", $data['vehicle_id']);

		
        $query = $this->db->get();

        if ($query->num_rows() > 0){
            $this->db->where('vendor_id', $data['vendor_id']);
            $this->db->where('vehicle_id', $data['vehicle_id']);
            $this->db->update('tbl_vendor_emi', $data);
        } else {
            $this->db->insert('tbl_vendor_emi', $data);
        }

        return TRUE;
    }
	
	function upload_vehicle_files($id, $data){
        $this->db->where('id', $id);
        $this->db->update('tbl_vendors_vehicle', $data);
        return $this->db->affected_rows();
    }
	
	function getVehicles($term = NULL)
    {
		$this->db->select('t1.id, t1.vehicle_type_id, t1.vehicle_no, t1.vendor_id');
		$this->db->from('tbl_vendors_vehicle as t1');
		//$this->db->join('tbl_vendor_company as t2', 't2.vehicle_id = t1.id','left');
		
		if(!empty($term))
		{
			$this->db->like('t1.vehicle_no', $term, 'both');
		}
		$this->db->where('t1.isDeleted', 0);
		$this->db->where('t1.statusId', 1);
		$query = $this->db->get();
		
		return $query->result();
    }

    function getAllVehicleList()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendors_vehicle');
		$this->db->where('isDeleted', 0);
        $query = $this->db->get();
        
        return $query->result();
    }
    function getVendorId($vehicle_id)
    {
        $this->db->select('vendor_id');
        $this->db->from('tbl_vendors_vehicle');
        $this->db->where('id', $vehicle_id);
		$this->db->where('isDeleted', 0);
        $query = $this->db->get();
        
        return $query->result();
    }
	
	function getVehiclesByVendorId($vendor_id)
    {
        $this->db->select('id, vehicle_no');
        $this->db->from('tbl_vendors_vehicle');
        $this->db->where('vendor_id', $vendor_id);
		$this->db->where('isDeleted', 0);
		$this->db->where('statusId', 1);
        $query = $this->db->get();
		
		//$str = $this->db->last_query();
		//pre($str);
        
        return $query->result();
    }
	
	function getAdvanceListings()
    {
        $this->db->select('tbl_advance_details.*, vehicle.vehicle_no');
        $this->db->from('tbl_advance_details');
		$this->db->join('tbl_vendors_vehicle as vehicle','vehicle.id = tbl_advance_details.vehicle_id', 'left');
        $this->db->where('tbl_advance_details.isDeleted', 0);
        $this->db->order_by('tbl_advance_details.createdDtm DESC');
        $query = $this->db->get();
        return $query->result();
    }
	
	function addNewAdvance($data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_advance_details', $data);        
        $insert_id = $this->db->insert_id();        
        $this->db->trans_complete();        
        return $insert_id;
    }

     function getAdvanceInfoById($id)
    {
        $this->db->select('t1.id, t1.amount, t1.rate, t1.advance_date, t1.description, t1.statusId, t2.vehicle_no');
        $this->db->from('tbl_advance_details as t1');
		$this->db->join('tbl_vendors_vehicle as t2','t2.id = t1.vehicle_id', 'left');
        $this->db->where('t1.id', $id);
		$this->db->where('t1.isDeleted', 0);
        $query = $this->db->get();
        
        return $query->result();
    }

    function editAdvance($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_advance_details', $data);
        
        return $this->db->affected_rows();
    }
    function deleteAdvance($id, $data)
    {		
		$this->db->where('id', $id);
        $this->db->update('tbl_advance_details', $data);
        
        return $this->db->affected_rows();
    }
	
	function getVehicle($vendor_id)
    {
        $this->db->select('vehicle_no');
        $this->db->from('tbl_vendors_vehicle');
        $this->db->where('vendor_id', $vendor_id);
		$this->db->where('isDeleted', 0);
		$this->db->where('statusId', 1);
        $query = $this->db->get();
        
        return $results = $query->result();

		/*$arr_result = array();
		if (count($results) > 0) {
			foreach ($results as $row)
				$arr_result[] = $row->vehicle_no;
			}
		return json_encode($arr_result, JSON_PRETTY_PRINT);*/
    }

    function addNewVehicleTaxs($data)
    {
        /*$this->db->trans_start();
        $this->db->insert('tbl_vehicle_tax', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();

        return $insert_id;*/

        return $this->db->insert_batch('tbl_vehicle_tax', $data);
    }

    function addNewVehicleMcds($data)
    {
        /*$this->db->trans_start();
        $this->db->insert('tbl_vehicle_mcd', $data);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();*/

        return $this->db->insert_batch('tbl_vehicle_mcd', $data);
    }

    function getMCDListings()
    {
        $this->db->select('id, vehicle_no, state_id, type, amount, start_date, end_date, statusId');
        $this->db->from('tbl_vehicle_mcd');
        $this->db->where('isDeleted', 0);
        $this->db->order_by('id DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function getTAXListings()
    {
        $this->db->select('id, vehicle_no, state_id, type, amount, start_date, end_date, statusId');
        $this->db->from('tbl_vehicle_tax');
        $this->db->where('isDeleted', 0);
        $this->db->order_by('id DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function deleteVehicleMcd($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_vehicle_mcd', $data);

        //return $this->db->affected_rows();
        return TRUE;
    }

    function deleteVehicleTaxs($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_vehicle_tax', $data);

        //return $this->db->affected_rows();
        return TRUE;
    }

    function getMcdbyId($id)
    {
        $this->db->select('id, vehicle_no, state_id, type, amount, start_date, end_date, statusId');
        $this->db->from('tbl_vehicle_mcd');
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $results = $query->result();
    }

    function getTaxbyId($id)
    {
        $this->db->select('id, vehicle_no, state_id, type, amount, start_date, end_date, statusId');
        $this->db->from('tbl_vehicle_tax');
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $query->result();
    }

    function editVehicleMcd($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_vehicle_mcd', $data);

        return $this->db->affected_rows();
    }

    function editVehicleTax($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_vehicle_tax', $data);

        return $this->db->affected_rows();
    }
	
	function getallvehicles()
    {
		
		$this->db->select('t1.id, t1.name, t1.description, t1.passengers, t1.luggage, t1.start_fee, t1.fee_per_person, t1.vehicle_image');
        $this->db->from('tbl_cab_vehicle as t1');
        $this->db->where('t1.statusId', 1);
		$this->db->where('t1.isDeleted', 0);
		$this->db->order_by('t1.name ASC');
        $query = $this->db->get();
		
		
        /*$this->db->select('t1.id, t1.name, t1.description, t1.passengers, t1.luggage, t1.start_fee, t1.fee_per_person, t1.vehicle_image, t2.from, t2.to, t2.price');
        $this->db->from('tbl_cab_vehicle as t1');
		$this->db->join('tbl_cab_vehicle_price as t2','t2.cab_vehicle_id = t1.id', 'right');
        $this->db->where('t1.statusId', 1);
		$this->db->where('t1.isDeleted', 0);
		$this->db->order_by('t1.name ASC');
        $query = $this->db->get();*/
		

        return $query->result();
    }
	
	function getallvehiclesPrice($id)
    {
		
		$this->db->select('id, from, to, price, two_pay_price, additional_ride_time_fare, additional_km_fare, driver_allowance, night_charges');
        $this->db->from('tbl_cab_vehicle_price');
        $this->db->where('statusId', 1);
		$this->db->where('isDeleted', 0);
		$this->db->where('cab_vehicle_id', $id);
		$this->db->order_by('from ASC');
        $query = $this->db->get();


        return $query->result();
    }
	function getvehiclesPrice($id, $distance = '', $trip_type, $pick_type = '')
    {
		$this->db->select('id, from, to, price, two_pay_price, additional_ride_time_fare, additional_km_fare, driver_allowance, night_charges');
        $this->db->from('tbl_cab_vehicle_price');
        $this->db->where('statusId', 1);
		$this->db->where('isDeleted', 0);
		$this->db->where('trip_type', $trip_type);
		$this->db->where('cab_vehicle_id', $id);
		
		
		if($pick_type != '')
		{
			$this->db->where('pickup_type', $pick_type);
		}
		
		if($distance != '')
		{
			$this->db->where('from <=', $distance);
			$this->db->where('to >=', $distance);
		}
		
		
		$this->db->limit(1);
		$this->db->order_by('from ASC');
        $query = $this->db->get();
		
		//return $this->db->last_query();
		
        return $query->result();
    }
	function getminamount()
    {
        $this->db->select('price');
        $this->db->from('tbl_min_amount');
        $query = $this->db->get();

        return $query->result();
    }
	
	function getvehiclesDetails($id, $distance = '', $trip_type, $pick_type = '')
    {
		$this->db->select('t1.id, t1.from, t1.to, t1.price, t1.two_pay_price, t1.additional_ride_time_fare, t1.additional_km_fare, t1.driver_allowance, t1.night_charges, t2.name, t2.start_fee');
        $this->db->from('tbl_cab_vehicle_price as t1');
		$this->db->join('tbl_cab_vehicle as t2','t2.id = t1.cab_vehicle_id', 'left');
        $this->db->where('t1.statusId', 1);
		$this->db->where('t1.isDeleted', 0);
		$this->db->where('t1.trip_type', $trip_type);
		$this->db->where('t1.cab_vehicle_id', $id);
		
		
		if($pick_type != '')
		{
			$this->db->where('pickup_type', $pick_type);
		}
		
		if($distance != '')
		{
			$this->db->where('from <=', $distance);
			$this->db->where('to >=', $distance);
		}
		
		
		$this->db->limit(1);
		$this->db->order_by('from ASC');
        $query = $this->db->get();
		
		//return $this->db->last_query();
		
        return $query->result();
    }
}

  