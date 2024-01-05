<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Traveling_model extends CI_Model
{
	/**
     * This function is used to get state list
     */
    function getTravelingTypeList()
    {
        $this->db->select('*');
        $this->db->from('tbl_traveling_type');
		$this->db->where('isDeleted', 0);
        $query = $this->db->get();
        
        return $query->result();
    }

    function getTravelingTypes()
    {		
		$this->db->select('id, name, description, statusId');
        $this->db->from('tbl_traveling_type');
		$this->db->where('isDeleted', 0);
        $query = $this->db->get();
        
        return $query->result();
    }


    function checkTravelingTypeExist($name, $id = null)
    {
        $this->db->select("id");
        $this->db->from("tbl_traveling_type");
		$this->db->where('isDeleted', 0);
        $this->db->where("name", $name);
		
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

    function addNewTravelingTypes($data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_traveling_type', $data);        
        $insert_id = $this->db->insert_id();        
        $this->db->trans_complete();        
        return $insert_id;
    }

    function getTravelingTypeInfo($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_traveling_type');
        $this->db->where('id', $id);
		$this->db->where('isDeleted', 0);
        $query = $this->db->get();
        
        return $query->result();
    }
    

    function editTravelingType($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_traveling_type', $data);
        
        //$this->db->affected_rows();
        return TRUE;
    }

    function deleteTravelingType($id, $data)
    {		
		$this->db->where('id', $id);
        $this->db->update('tbl_traveling_type', $data);
        // $this->db->affected_rows();
        return $this->db->affected_rows();
    }

    function getTravelingVehicles()
    {
		$this->db->select('id, name, description, statusId');
        $this->db->from('tbl_traveling_vehicle');
		$this->db->where('isDeleted', 0);
        $query = $this->db->get();
        
        return $query->result();
    }

    function checkTravelingVehicleExist($name, $id = null)
    {
        $this->db->select("id");
        $this->db->from("tbl_traveling_vehicle");
		$this->db->where('isDeleted', 0);
        $this->db->where("name", $name);
		
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

    function addNewTravelingVehicle($data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_traveling_vehicle', $data);        
        $insert_id = $this->db->insert_id();        
        $this->db->trans_complete();        
        return $insert_id;
    }


    function getTravelingVehicleInfoByVendorId($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_traveling_vehicle');
        $this->db->where('vendor_id', $id);
		$this->db->where('isDeleted', 0);
        $query = $this->db->get();
        
        return $query->result();
    }

    function getTravelingVehicleInfoById($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_traveling_vehicle');
        $this->db->where('id', $id);
		$this->db->where('isDeleted', 0);
        $query = $this->db->get();
        
        return $query->result();
    }


    function editTravelingVehicle($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_traveling_vehicle', $data);
        
        //$this->db->affected_rows();
        return TRUE;
    }

    

    function deleteTravelingVehicle($id, $data)
    {		
		$this->db->where('id', $id);
        $this->db->update('tbl_traveling_vehicle', $data);
        
        return $this->db->affected_rows();
    }

    function getTravelingPackages()
    {		
		$this->db->select('p.id, p.name, p.description, p.statusId, p.traveling_type_id, p.traveling_vehicle_id, p.rate, p.extra_km_rate, p.extra_hour_rate, p.driver_allowance, p.toll_parking_tax, type.name as traveling_type, vehicle.name as vehicle_name');
        $this->db->join('tbl_traveling_type as type','type.id = p.traveling_vehicle_id', 'left');
        $this->db->join('tbl_traveling_vehicle as vehicle','vehicle.id = p.traveling_vehicle_id', 'left');
        $this->db->from('tbl_traveling_package as p');
		$this->db->where('p.isDeleted', 0);
        $query = $this->db->get();
        
        return $query->result();
    }


    function checkTravelingPackageExist($traveling_type_id, $traveling_vehicle_id, $name, $id = null)
    {
        $this->db->select("id");
        $this->db->from("tbl_traveling_package");
		$this->db->where('isDeleted', 0);
        $this->db->where("traveling_type_id", $traveling_type_id);
        $this->db->where("traveling_vehicle_id", $traveling_vehicle_id);
        $this->db->where("name", $name);
		
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

    function addNewTravelingPackages($data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_traveling_package', $data);        
        $insert_id = $this->db->insert_id();        
        $this->db->trans_complete();        
        return $insert_id;
    }

    function getTravelingPackageInfo($id)
    {
        $this->db->select('id, name, description, statusId, traveling_type_id, traveling_vehicle_id, rate, extra_km_rate, extra_hour_rate, driver_allowance, toll_parking_tax');
        $this->db->from('tbl_traveling_package');
        $this->db->where('id', $id);
        $query = $this->db->get();
        
        return $query->result();
    }
    

    function editTravelingPackage($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_traveling_package', $data);
        return TRUE;
    }

    function deleteTravelingPackage($id, $data)
    {		
		$this->db->where('id', $id);
        $this->db->update('tbl_traveling_package', $data);        
        return $this->db->affected_rows();
    }

    
    


	

    function getAllTravelingVehicleList()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendors_vehicle');
		$this->db->where('isDeleted', 0);
        $query = $this->db->get();
        
        return $query->result();
    }


}

  