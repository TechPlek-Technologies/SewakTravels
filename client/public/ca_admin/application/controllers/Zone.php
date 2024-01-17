<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Bharat Verma / bharatverma.verma@gmail.com
 * @version : 1.0
 * @since : 27.02.2018
 */
class Zone extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
		$this->load->model('zone_model');
        // Datas -> libraries ->BaseController / This function used load user sessions
        $this->datas();
        // isLoggedIn / Login control function /  This function used login control
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        if(!isset($isLoggedIn) || $isLoggedIn != TRUE)
        {
            redirect('login');
        }
        else
        {
            // isManagerOrAdmin / Admin or manager role control function / This function used admin or manager role control
            if($this->isManagerOrAdmin() == TRUE)
            {
                $this->accesslogincontrol();
            }
        }
    }
	
	/**
     * This function used to show Tax
     */
    function zoneTypesListing()
    {
		$data['zoneRecords'] = $this->zone_model->getAllZoneList();
		$data['records'] = $this->zone_model->getZoneTypes();
		$data['zoneAttachRecords'] = $this->zone_model->getAttachedZoneList();

		$process = 'All of Zone Types';
		$processFunction = 'Manager/zoneTypesListings';
		$this->logrecord($process,$processFunction);

		$this->global['pageTitle'] = 'All of Zone Types';
		
		$this->loadViews("master/zone/zoneTypesListing", $this->global, $data, NULL);
    }

    /**
     * This function is used to load the add new Zone
     */
    function addNewZoneType()
    {
		$data['states'] = '';
		$this->global['pageTitle'] = 'Add a Zone';
		$this->loadViews("master/zone/addNewZoneType", $this->global, $data, NULL);
    }
	


     /**
     * This function is used to add new Tax to the system
     */
    function addNewZoneTypes()
    {
            $this->load->library('form_validation');          
            
            $this->form_validation->set_rules('zone_type','Zone Type','required|trim');
			$this->form_validation->set_rules('description','Description','required|trim');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNewZoneType();
            }
            else
            {
                $zone_type = $this->security->xss_clean($this->input->post('zone_type')); 
				$description = $this->security->xss_clean($this->input->post('description')); 				
                $Info = array('type' => $zone_type, 'description' => $description, 'createdBy' => $this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'));
                
                $checkZoneType = $this->zone_model->checkZoneTypeExist($zone_type, $description);

                if($checkVehicleType == false)
                { 
                    $result = $this->zone_model->addNewZoneTypes($Info);
                
                    if($result > 0)
                    {
                        $process = 'Add a Zone Type';
                        $processFunction = 'Manager/addNewZoneTypes';
                        $this->logrecord($process,$processFunction);

                        $this->session->set_flashdata('success', 'Zone type created successfully');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Zone type creation failed');
                    }
                }
                else{
                    $this->session->set_flashdata('error', 'Zone description already in record');
                }
                
                redirect('addNewZoneType');
            }
        }

    /**
     * This function is used to open edit taxs view
     */
    function editOldZoneType($id = NULL)
    {
            if($id == null)
            {
                redirect('zoneTypesListing');
            }
            
            $data['Info'] = $this->zone_model->getZoneTypeInfo($id);           
            $this->global['pageTitle'] = 'Zone Type Edit';
            
            $this->loadViews("master/zone/editOldZoneType", $this->global, $data, NULL);
    }

    /**
     * This function is used to edit Zone Types
     */
    function editZoneType()
    {            
        $this->load->library('form_validation');
		$this->form_validation->set_rules('zone_type','Zone Type','required|trim');
		$this->form_validation->set_rules('description','Desciprtion','required|trim');

        $id = $this->input->post('id');

        if($this->form_validation->run() == FALSE)
        {
            $this->editOldZoneType($id);
        }
        else
        {
            $zone_type = $this->security->xss_clean($this->input->post('zone_type')); 
			$description = $this->security->xss_clean($this->input->post('description')); 
			$statusId = $this->input->post('status'); 

			$Info = array('type' => $zone_type, 'description' => $description, 'statusId' => $statusId, 'updatedBy' => $this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
                                
            $checkTax = $this->zone_model->checkZoneTypeExist($zone_type, $description, $id);

                if($checkTax == false)
                {
                    $result = $this->zone_model->editZoneType($Info, $id);
            
                    if($result > 0)
                    {
                        $process = 'Zone Type Edit';
                        $processFunction = 'Manager/editZoneType';
                        $this->logrecord($process,$processFunction);
                        $this->session->set_flashdata('success', 'Zone Type Edit successful');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Zone Type Edit failed');
                    }
                }
                else{
                    $this->session->set_flashdata('error', 'Zone description already in record');
                }
                redirect('zoneTypesListing');

            }
    }

    /**
     * This function is used to delete Zone Type
     */
    function deleteZoneType($id = NULL)
    {
		if($id == null)
		{
			redirect('zoneTypesListing');
		}
		
		$dataArr = array(			
			'isDeleted' => 1,
			'updatedBy' => $this->vendorId,
			'updatedDtm'=>date('Y-m-d H:i:s')
		);		

		$result = $this->zone_model->deleteZoneType($id, $dataArr);
		
		if ($result == TRUE) {
			 $process = 'Zone Type Delete';
			 $processFunction = 'Manager/deleteTax';
			 $this->logrecord($process,$processFunction);

			 $this->session->set_flashdata('success', 'Zone Type delete successful');
			}
		else
		{
			$this->session->set_flashdata('error', 'Zone Type delete failed');
		}
		redirect('zoneTypesListing');
    }

    /**
     * This function is used to load the add new Tax
     */
    function addNewZone()
    {
		$data = array();
		$this->global['pageTitle'] = 'Add New Zone';
		$this->loadViews("master/zone/addNewZone", $this->global, $data, NULL);
    }

    /**
     * This function is used to add new Tax to the system
     */
    function addNewZones()
    {
        $this->load->library('form_validation'); 
        $this->form_validation->set_rules('zone_name','Zone Name','required|trim');
		$this->form_validation->set_rules('description','Desciprtion','required|trim');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->addNewZone();
        }
        else
        {
            $zone_name = $this->security->xss_clean($this->input->post('zone_name')); 
			$description = $this->security->xss_clean($this->input->post('description')); 
			
            $dataArr = array(
                'name' => $zone_name, 
                'description' => $description, 
                'statusId' => 1, 
                'createdBy' => $this->vendorId, 
                'createdDtm'=>date('Y-m-d H:i:s')
            );
            
            $checkZoneType = $this->zone_model->checkZoneExist($zone_name);

            if($checkZoneType == false)
            { 
                $result = $this->zone_model->addNewZone($dataArr);
            
                if($result > 0)
                {
                    $process = 'Add a Zone';
                    $processFunction = 'Manager/addNewZone';
                    $this->logrecord($process,$processFunction);
					
                    $this->session->set_flashdata('success', 'New Zone created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'New Zone creation failed');
                }
            }
            else{
                $this->session->set_flashdata('error', 'New Zone already in record');
            }
            
            redirect('addNewZone');
        }
    }

    function editOldZone($id = NULL)
    {
        if($id == null)
        {
            redirect('zoneTypesListing');
        }

        $data['Info'] = $this->zone_model->getZoneInfoById($id);
        

       // echo $id;
		$this->global['pageTitle'] = 'Edit Zone';
		$this->loadViews("master/zone/editOldZone", $this->global, $data, NULL);
    }

     /**
     * This function is used to add new Tax to the system
     */
    function editZone()
    {
        $this->load->library('form_validation'); 
        $this->form_validation->set_rules('zone_name','Zone Name','required|trim');
		$this->form_validation->set_rules('description','Desciprtion','required|trim');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->addNewZone();
        }
        else
        {
            $id = $this->input->post('id');            
            $zone_name = $this->security->xss_clean($this->input->post('zone_name')); 
			$description = $this->security->xss_clean($this->input->post('description'));
            $statusId = $this->input->post('status'); 
			
            $dataArr = array(
                'name' => $zone_name, 
                'description' => $description, 
                'statusId' => $statusId, 
                'updatedBy' => $this->vendorId, 
                'updatedDtm'=>date('Y-m-d H:i:s')
            );
            
            $checkZone = $this->zone_model->checkZoneExist($zone_name, $id);

            if($checkZone == false)
            { 
                $result = $this->zone_model->editZone($id, $dataArr);
            
                if($result > 0)
                {
                    $process = 'Edit Zone';
                    $processFunction = 'Manager/editZone';
                    $this->logrecord($process,$processFunction);

                    $this->session->set_flashdata('success', 'Zone updation successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Zone updation failed');
                }
            }
            else{
                $this->session->set_flashdata('error', 'Zone already in record');
            }
            
            redirect('zoneTypesListing');
        }
    }

     /**
     * This function is used to delete Zone Type
     */
    function deleteZone($id = NULL)
    {
		if($id == null)
		{
			redirect('zoneTypesListing');
		}
		
		$dataArr = array(			
			'isDeleted' => 1,
			'updatedBy' => $this->vendorId,
			'updatedDtm'=>date('Y-m-d H:i:s')
		);		

		$result = $this->zone_model->deleteZone($id, $dataArr);
		
		if ($result == TRUE) {
			 $process = 'Zone Delete';
			 $processFunction = 'Manager/deleteVehicle';
			 $this->logrecord($process,$processFunction);

			 $this->session->set_flashdata('success', 'Zone delete successful');
			}
		else
		{
			$this->session->set_flashdata('error', 'Zone delete failed');
		}
		redirect('vendorListing');
    }
	

	
	function getZones()
    {
		$result = array();
		if(isset($_GET['search'])) 
		{
		   $result = $this->zone_model->getZones($_GET['search']);
			if (count($result) > 0) {
			foreach ($result as $row)
				$arr_result[] = array(
					'value'	=> $row->id,
					'label'	=> $row->vehicle_no,
					'vehicle_type_id' => $row->vehicle_type_id,
					'rate' => $row->cab_rate_company
				);
				echo json_encode($arr_result);
			}
		}
    }
	
	
	function addAttachZoneType()
    {
		$data['zone_list'] = $this->zone_model->getAllZoneList();
		$data['zone_type_list'] = $this->zone_model->getZoneTypes();
		$this->global['pageTitle'] = 'Attach Zone type with Zone';
		$this->loadViews("master/zone/addAttachZoneType", $this->global, $data, NULL);
    }
	


     /**
     * This function is used to add new Tax to the system
     */
    function addAttachZoneTypes()
    {
            $this->load->library('form_validation');          
            
            $this->form_validation->set_rules('zone_id','Zone Name','required|numeric');
			$this->form_validation->set_rules('zone_type','Zone Type','required|numeric');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addAttachZoneType();
            }
            else
            {
                $zone_id = $this->input->post('zone_id'); 
				$zone_type_id = $this->input->post('zone_type'); 				
                $Info = array('zone_id' => $zone_id, 'zone_type_id' => $zone_type_id, 'statusId' =>1, 'createdBy' => $this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'));
                
                $checkAttachZoneType = $this->zone_model->checkAttachZoneTypeExist($zone_id, $zone_type_id);

                if($checkAttachZoneType == false)
                { 
                    $result = $this->zone_model->addAttachZoneTypes($Info);
                
                    if($result > 0)
                    {
                        $process = 'Add a Zone Type';
                        $processFunction = 'Manager/addAttachZoneTypes';
                        $this->logrecord($process,$processFunction);

                        $this->session->set_flashdata('success', 'Zone type attached successfully');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Zone type attached failed');
                    }
                }
                else{
                    $this->session->set_flashdata('error', 'Zone type already attached in record');
                }
                
                redirect('addAttachZoneType');
            }
        }

    /**
     * This function is used to open edit taxs view
     */
    function editAttachZoneTypes($id = NULL)
    {
		if($id == null)
		{
			redirect('zoneTypesListing');
		}
		
		$data['Info'] = $this->zone_model->getAttachedZoneById($id);
		$data['zone_list'] = $this->zone_model->getAllZoneList();
		$data['zone_type_list'] = $this->zone_model->getZoneTypes();	
		
		$this->global['pageTitle'] = 'Attach Zone Type';            
		$this->loadViews("master/zone/editAttachZoneTypes", $this->global, $data, NULL);
    }

    /**
     * This function is used to edit Zone Types
     */
    function editAttachZoneType()
    {            
        $this->load->library('form_validation');
		$this->form_validation->set_rules('zone_id','Zone Name','required|numeric');
		$this->form_validation->set_rules('zone_type','Zone Type','required|numeric');

        $id = $this->input->post('id');

        if($this->form_validation->run() == FALSE)
        {
            $this->editAttachZoneTypes($id);
        }
        else
        {
            $zone_id = $this->input->post('zone_id'); 
			$zone_type_id = $this->input->post('zone_type');
			$status = $this->input->post('status');

			$Info = array('zone_id' => $zone_id, 'zone_type_id' => $zone_type_id, 'statusId' => $status, 'updatedBy' => $this->vendorId, 'updatedDtm' => date('Y-m-d H:i:s'));
			
			//pre($Info);
			//pre($id);
			
                                
            $checkAttachZone = $this->zone_model->checkAttachZoneTypeExist($zone_id, $zone_type_id, $id);

                if($checkAttachZone == false)
                {
                    $result = $this->zone_model->editAttachZoneType($Info, $id);
            
                    if($result > 0)
                    {
                        $process = 'Zone Type Edit';
                        $processFunction = 'Manager/editAttachZoneType';
                        $this->logrecord($process,$processFunction);
                        $this->session->set_flashdata('success', 'Zone attached edit successful');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Zone attached edit failed');
                    }
                }
                else{
                    $this->session->set_flashdata('error', 'Zone attached already in record');
                }
                redirect('zoneTypesListing');

            }
    }

    function getZoneId()
    {
        $result = array();
		if (isset($_GET['vehicle_id'])) 
		{
            $result = $this->zone_model->getZoneId($_GET['vehicle_id']);
            echo $result[0]->vendor_id;
        }
    }
	
	function getAttachedZoneListById()
    {
        $results = array();
		if (isset($_GET['zone_id'])) 
		{
            $results = $this->zone_model->getAttachedZoneListById($_GET['zone_id']);
			
			//Print out the array in a JSON format.
			header('Content-Type: application/json');
			echo json_encode($results);
        }
    }
	
	/*
	function getZoneListByZoneId($zone_id)
    {
        $results = $this->zone_model->getAttachedZoneListById($zone_id);
		echo json_encode($results);
    }
	*/
}

?>