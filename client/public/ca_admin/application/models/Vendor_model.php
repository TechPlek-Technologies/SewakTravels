<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Vendor_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function vendorListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.vendorId, BaseTbl.vehicleNo, BaseTbl.pan, BaseTbl.gstin, BaseTbl.companyName, BaseTbl.name, BaseTbl.mobile, BaseTbl.pincode, BaseTbl.address, BaseTbl.city, BaseTbl.state, BaseTbl.vehicleTypeId');
        $this->db->from('tbl_vendors as BaseTbl');
        if (!empty($searchText)) {
            $likeCriteria = "(BaseTbl.pan  LIKE '%" . $searchText . "%'
                            OR  BaseTbl.name  LIKE '%" . $searchText . "%'
							OR  BaseTbl.name  LIKE '%" . $searchText . "%'
							OR  BaseTbl.companyName  LIKE '%" . $searchText . "%'
                            OR  BaseTbl.mobile  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $query = $this->db->get();

        return $query->num_rows();
    }


    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function vendorListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.vendorId, BaseTbl.vehicleNo, BaseTbl.pan, BaseTbl.gstin, BaseTbl.companyName, BaseTbl.name, BaseTbl.mobile, VehicleType.type as VehicleType');
        $this->db->from('tbl_vendors as BaseTbl');
        $this->db->join('tbl_vehicle_type as VehicleType', 'VehicleType.id = BaseTbl.vehicleTypeId', 'left');
        if (!empty($searchText)) {
            $likeCriteria = "(BaseTbl.pan  LIKE '%" . $searchText . "%'
                            OR  BaseTbl.name  LIKE '%" . $searchText . "%'
							OR  BaseTbl.companyName  LIKE '%" . $searchText . "%'
                            OR  BaseTbl.mobile  LIKE '%" . $searchText . "%')";
            $this->db->where($likeCriteria);
        }
        $this->db->where('BaseTbl.isDeleted', 0);
        $this->db->limit($page, $segment);
        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }


    /**
     * This function is used to get the User Roles information
     * @return array $result : This is result of the query
     */
    function getVendorServices()
    {
        $this->db->select('serviceId, service');
        $this->db->from('tbl_service');
        $query = $this->db->get();

        return $query->result();
    }


    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewVendor($vendorInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_members', $vendorInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
    }


    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    /* function getVendorInfo($vendorId)
    {
        $this->db->select('userId, name, email, mobile, roleId');
        $this->db->from('tbl_vendors');
        $this->db->where('isDeleted', 0);
        $this->db->where('userId', $vendorId);
        $query = $this->db->get();
        
        return $query->result();
    }
	*/

    /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editVendor($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_vendors', $data);

        return TRUE;
    }




    /**
     * This function is used to delete the user information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteVendor($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_vendors', $data);

        return $this->db->affected_rows();
    }






    /**
     * This function used to get user information by id
     * @param number $userId : This is user id
     * @return array $result : This is user information
     */
    function getVendorInfoById($vendorId)
    {
        $this->db->select('userId, name, email, mobile, roleId');
        $this->db->from('tbl_vendors');
        $this->db->where('isDeleted', 0);
        $this->db->where('vendorId', $vendorId);
        $query = $this->db->get();

        return $query->row();
    }



    /**
     * This function is used to get the users count
     * @return array $result : This is result
     */
    function vendorsCount()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendors as BaseTbl');
        $this->db->where('isDeleted', 0);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function getVendorStatus($vendorId)
    {
        $this->db->select('BaseTbl.status');
        $this->db->where('BaseTbl.vendorId', $vendorId);
        $this->db->limit(1);
        $query = $this->db->get('tbl_vendors as BaseTbl');

        return $query->row();
    }

    /**
     * This function is used to get tasks
     */
    function getVendors()
    {

        $this->db->select('v.id, v.salutation, v.name, v.email, v.mobile, v.pan, v.pincode, v.address, v.city, v.state, v.company_name, v.gstin, v.office_charge, v.statusId, s.state as statename, COUNT(vv.id) as total_vehicles');
        $this->db->from('tbl_vendors as v');
        $this->db->join('state_list as s', 's.id = v.state');
        $this->db->join('tbl_vendors_vehicle as vv', 'vv.vendor_id = v.id', 'left');
        $this->db->where('v.isDeleted', 0);
        $this->db->group_by('v.id');
        $this->db->order_by('v.name ASC');
        $query = $this->db->get();
        $result = $query->result();

        //pre($result);

        return $result;
    }

    function vendorList()
    {

        $this->db->select('id, name, company_name');
        $this->db->from('tbl_vendors');
        $this->db->where('isDeleted', 0);
        $this->db->order_by('name ASC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    /**
     * This function is used to check whether email id is already exist or not
     * @param {string} $email : This is email id
     * @param {number} $userId : This is user id
     * @return {mixed} $result : This is searched result
     */
    function checkVendorExist($name, $mobile, $company_name = '', $pan, $id = 0)
    {
        $this->db->select("name");
        $this->db->from("tbl_vendors");
        $this->db->where("name", $name);
        $this->db->where("mobile", $mobile);
        $this->db->where("pan", $pan);

        if ($company_name != '') {
            $this->db->where("company_name", $company_name);
        }

        if ($id != 0) {
            $this->db->where("id !=", $id);
        }

        $this->db->where("isDeleted", 0);
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * This function is used to add a new task
     */
    function addNewVendors($vendorInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_vendors', $vendorInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();

        return $insert_id;
    }

    /**
     * This function used to get task information by id
     * @param number $taskId : This is task id
     * @return array $result : This is task information
     */
    function getVendorInfo($id)
    {
        /*
            $this->db->select('*, State.state as statename');
            $this->db->from('tbl_vendors');
            $this->db->join('state_list as State','State.id = tbl_vendors.state');
            $this->db->where('tbl_vendors.isDeleted', 0);
            $this->db->where('tbl_vendors.id', $id);
            $query = $this->db->get();
        */
        $this->db->select('*');
        $this->db->from('tbl_vendors');
        $this->db->where('tbl_vendors.isDeleted', 0);
        $this->db->where('tbl_vendors.id', $id);
        $query = $this->db->get();

        return $query->result();
    }

    function getVendorDetails($id)
    {

        $this->db->select('tbl_vendors.*, State.state as statename');
        $this->db->from('tbl_vendors');
        $this->db->join('state_list as State', 'State.id = tbl_vendors.state');
        $this->db->where('tbl_vendors.isDeleted', 0);
        $this->db->where('tbl_vendors.id', $id);
        $query = $this->db->get();

        return $query->result();
    }

    function getVendorList()
    {

        $this->db->select('id, name, company_name');
        $this->db->from('tbl_vendors');
        $this->db->where('isDeleted', 0);
        $this->db->where('statusId', 1);
        $this->db->order_by('name ASC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function getAllVendors()
    {

        $this->db->select('id, name');
        $this->db->from('tbl_vendors');
        $this->db->where('isDeleted', 0);
        $this->db->where('statusId', 1);
        $this->db->order_by('name ASC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function getAllVendorsVehicleWise()
    {

        $this->db->select('t1.id, t1.name');
        $this->db->from('tbl_vendors t1');
        $this->db->join('tbl_vendors_vehicle as t2', 't2.vendor_id = t1.id');
        $this->db->where('t1.isDeleted', 0);
        $this->db->where('t1.statusId', 1);
        $this->db->group_by('t2.vendor_id');
        $this->db->order_by('t1.name ASC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }


    function vendorChargeList()
    {

        $this->db->select('id, vendor_id, month_id, pf_amount, esi_amount, statusId');
        $this->db->from('tbl_vendor_charges');
        $this->db->where('isDeleted', 0);
        $this->db->order_by('vendor_id ASC');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function checkVendorChargesExist($vendor_id, $month_id, $id = 0)
    {
        $this->db->select("id");
        $this->db->from("tbl_vendor_charges");
        $this->db->where("vendor_id", $vendor_id);
        $this->db->where("month_id", $month_id);

        if ($id != 0) {
            $this->db->where("id !=", $id);
        }

        $this->db->where("isDeleted", 0);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * This function is used to add a new task
     */
    function addNewVendorCharges($vendorInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_vendor_charges', $vendorInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();

        return $insert_id;
    }

    function editVendorCharge($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_vendor_charges', $data);

        return TRUE;
    }

    function deleteVendorCharge($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_vendor_charges', $data);

        //return $this->db->affected_rows();
        return TRUE;
    }

    function getChargesbyVendorId($vendor_id)
    {

        $this->db->select('t1.vendor_id, t1.id, t1.month_id, t1.pf_amount, t1.esi_amount, t1.statusId, t2.name as vendor_name, t2.company_name as company_name');
        $this->db->from('tbl_vendor_charges as t1');
        $this->db->join('tbl_vendors as t2', 't2.id = t1.vendor_id', 'left');
        $this->db->where('t1.isDeleted', 0);
        $this->db->where('t1.vendor_id', $vendor_id);
        $this->db->order_by('t1.month_id ASC');
        $query = $this->db->get();
        //$str = $this->db->last_query();
        //pre($str);
        return $query->result();
    }

    function getChargesbyId($id)
    {

        $this->db->select('t1.vendor_id, t1.id, t1.month_id, t1.pf_amount, t1.esi_amount, t1.statusId, t2.name as vendor_name, t2.company_name as company_name');
        $this->db->from('tbl_vendor_charges as t1');
        $this->db->join('tbl_vendors as t2', 't2.id = t1.vendor_id', 'left');
        $this->db->where('t1.isDeleted', 0);
        $this->db->where('t1.id', $id);
        $this->db->order_by('t1.month_id ASC');
        $query = $this->db->get();
        //$str = $this->db->last_query();
        //pre($str);
        return $query->result();
    }


    function addNewVendorLoans($vendorInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_vendor_loan', $vendorInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();

        return $insert_id;
    }

    function addNewVendorLoanDetails($data)
    {
        return $this->db->insert_batch('tbl_vendor_loan_details', $data);
    }

    function editVendorLoan($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_vendor_loan', $data);

        return TRUE;
    }

    function deleteVendorLoan($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_vendor_loan', $data);

        //return $this->db->affected_rows();
        return TRUE;
    }
    function getLoansbyVendorId($vehicle_id)
    {

        $this->db->select('t1.id, t1.loan_id, t1.loan_period, t1.loan_rate, t1.loan_amount, t1.total_paid, t1.emi_per_month, t1.agreement_date, t1.statusId, t2.name as vendor_name');
        $this->db->from('tbl_vendor_loan as t1');
        $this->db->join('tbl_vendors as t2', 't2.id = t1.vendor_id', 'left');
        $this->db->where('t1.isDeleted', 0);
        $this->db->where('t1.vehicle_id', $vehicle_id);
        //$this->db->order_by('t1.month_id ASC');
        $query = $this->db->get();
        //$str = $this->db->last_query();
        //pre($str);
        return $query->result();
    }

    function getLoansbyId($id)
    {

        $this->db->select('t1.id, t1.vehicle_id, t1.vehicle_no, t1.loan_id, t1.loan_period, t1.loan_rate, t1.loan_amount, t1.total_paid, t1.emi_per_month, t1.agreement_date, t1.statusId, t2.name as vendor_name');
        $this->db->from('tbl_vendor_loan as t1');
        $this->db->join('tbl_vendors as t2', 't2.id = t1.vendor_id', 'left');
        $this->db->where('t1.isDeleted', 0);
        $this->db->where('t1.id', $id);
        //$this->db->order_by('t1.month_id ASC');
        $query = $this->db->get();
        //$str = $this->db->last_query();
        //pre($str);
        return $query->result();
    }

    function deleteVendorLoanDetails($id)
    {
        $this->db->where('vendor_loan_id', $id);
        $this->db->delete('tbl_vendor_loan_details');
        return TRUE;
    }

    function getLoansDetailsById($id)
    {

        $this->db->select('t1.id, t1.emi, t1.month, t1.year, t1.statusId, t2.loan_id, t2.vehicle_no, t2.loan_rate, t2.loan_amount, t2.agreement_date');
        $this->db->from('tbl_vendor_loan_details as t1');
        $this->db->join('tbl_vendor_loan as t2', 't2.id = t1.vendor_loan_id', 'left');
        $this->db->where('t1.isDeleted', 0);
        $this->db->where('t1.vendor_loan_id', $id);
        //$this->db->order_by('t1.month_id ASC');
        $query = $this->db->get();
        //$str = $this->db->last_query();
        //pre($str);
        return $query->result();
    }
    
}
