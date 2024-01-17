<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Zone_model extends CI_Model
{
	/**
     * This function is used to get state list
     */
    function getZoneTypeList()
    {
        $this->db->select('*');
        $this->db->from('tbl_zone_type');
		$this->db->where('isDeleted', 0);
        $query = $this->db->get();
        
        return $query->result();
    }
	
	/**
     * This function is used to get tasks
     */
    function getZoneTypes()
    {		
		$this->db->select('id, type, description, statusId');
        $this->db->from('tbl_zone_type');
		$this->db->where('isDeleted', 0);
        $query = $this->db->get();
        
        return $query->result();
    }

 
    /**
     * This function used to check email exists or not
     * @param {string} $email : This is users email id
     * @return {boolean} $result : TRUE/FALSE
     */
    function checkZoneTypeExist($zone_type, $description, $id = null)
    {
        $this->db->select("id");
        $this->db->from("tbl_zone_type");
        $this->db->where('isDeleted', 0);
        $this->db->where("type", $zone_type);
        $this->db->where("description", $description);
		
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
    function addNewZoneTypes($data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_zone_type', $data);        
        $insert_id = $this->db->insert_id();        
        $this->db->trans_complete();        
        return $insert_id;
    }

    /**
     * This function used to get task information by id
     * @param number $taskId : This is task id
     * @return array $result : This is task information
     */
    function getZoneTypeInfo($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_zone_type');
        $this->db->where('id', $id);
		$this->db->where('isDeleted', 0);
        $query = $this->db->get();
        
        return $query->result();
    }
    
    /**
     * This function is used to edit vehicle type
     */
    function editZoneType($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_zone_type', $data);
        
        //$this->db->affected_rows();
        return TRUE;
    }
    
    /**
     * This function is used to delete vehicle type
     */
    function deleteZoneType($id, $data)
    {		
		$this->db->where('id', $id);
        $this->db->update('tbl_zone_type', $data);
        
        return $this->db->affected_rows();
    }

    /**
     * This function used to check email exists or not
     * @param {string} $email : This is users email id
     * @return {boolean} $result : TRUE/FALSE
     */
    function checkZoneExist($name, $id = null)
    {
        $this->db->select("id");
        $this->db->from("tbl_zone");
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

    /**
     * This function is used to add a new task
     */
    function addNewZone($data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_zone', $data);        
        $insert_id = $this->db->insert_id();        
        $this->db->trans_complete();        
        return $insert_id;
    }


    function getZoneInfoByVendorId($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_zone');
        $this->db->where('id', $id);
		$this->db->where('isDeleted', 0);
        $query = $this->db->get();
        
        return $query->result();
    }

    function getZoneInfoById($id)
    {
        $this->db->select('id, name, description, statusId');
        $this->db->from('tbl_zone');
        $this->db->where('id', $id);
		$this->db->where('isDeleted', 0);
        $query = $this->db->get();
        
        return $query->result();
    }

    /**
     * This function is used to edit vehicle type
     */
    function editZone($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_zone', $data);
        
        //$this->db->affected_rows();
        return TRUE;
    }

    

     /**
     * This function is used to delete vehicle type
     */
    function deleteZone($id, $data)
    {		
		$this->db->where('id', $id);
        $this->db->update('tbl_zone', $data);
        
        return $this->db->affected_rows();
    }

	
	function getZones($term = NULL)
    {
		$this->db->select('t1.id, t1.vehicle_type_id, t1.vehicle_no, t2.cab_rate_company');
		$this->db->from('tbl_vendors_vehicle as t1');
		$this->db->join('tbl_vendor_company as t2', 't2.vehicle_id = t1.id','left');
		
		if(!empty($term))
		{
			$this->db->like('t1.vehicle_no', $term, 'both');
		}
		$this->db->where('t1.isDeleted', 0);
		$this->db->where('t1.statusId', 1);
		$query = $this->db->get();
		
		return $query->result();
    }

    function getAllZoneList()
    {
        $this->db->select('id, id as zone_id, name, name as zone_name, description, statusId');
        $this->db->from('tbl_zone');
		$this->db->where('isDeleted', 0);
        $query = $this->db->get();
        
        return $query->result();
    }
    function getZoneId($id)
    {
        $this->db->select('name');
        $this->db->from('tbl_zone');
        $this->db->where('id', $id);
		$this->db->where('isDeleted', 0);
        $query = $this->db->get();
        
        return $query->result();
    }
	
	 function getAttachedZoneList()
    {
        $this->db->select('t1.id, zone.name as zone_name, zone_type.type as zone_type');
        $this->db->from('tbl_zone_attach as t1');
		$this->db->join('tbl_zone as zone', 'zone.id = t1.zone_id','left');
		$this->db->join('tbl_zone_type as zone_type', 'zone_type.id = t1.zone_type_id','left');
		$this->db->where('t1.isDeleted', 0);
		$this->db->where('t1.statusId', 1);
        $query = $this->db->get();
        
        return $query->result();
    }
	
	function checkAttachZoneTypeExist($zone_id, $zone_type_id, $id = null)
    {
        $this->db->select("id");
        $this->db->from("tbl_zone_attach");
		$this->db->where('isDeleted', 0);
        $this->db->where("zone_id", $zone_id);
		$this->db->where("zone_type_id", $zone_type_id);
		
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
	
	function addAttachZoneTypes($data)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_zone_attach', $data);        
        $insert_id = $this->db->insert_id();        
        $this->db->trans_complete();        
        return $insert_id;
    }
	function getAttachedZoneById($id)
    {
        $this->db->select('id, zone_id, zone_type_id, statusId');
        $this->db->from('tbl_zone_attach');
        $this->db->where('id', $id);
		$this->db->where('isDeleted', 0);
		$this->db->where('statusId', 1);
        $query = $this->db->get();
        
        return $query->result();
    }

    /**
     * This function is used to edit vehicle type
     */
    function editAttachZoneType($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_zone_attach', $data);
        
        //$this->db->affected_rows();
        return TRUE;
    }
	
	function getAttachedZoneListById($zone_id)
    {
        $this->db->select('t1.id, t1.zone_type_id, zone_type.type as zone_type, zone_type.description, t1.zone_id as zone_id');
        $this->db->from('tbl_zone_attach as t1');
		$this->db->join('tbl_zone_type as zone_type', 'zone_type.id = t1.zone_type_id','left');
        $this->db->where('t1.zone_id', $zone_id);
		$this->db->where('t1.isDeleted', 0);
		$this->db->where('t1.statusId', 1);
        $query = $this->db->get();
       // $str = $this->db->last_query();
       // pre($str);
        
        return $query->result();
    }
}

  