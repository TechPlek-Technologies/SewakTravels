<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Bharat Verma / bharatverma.verma@gmail.com
 * @version : 1.0
 * @since : 27.02.2018
 */
class Traveling extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('traveling_model');
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
    function travelingTypesListing()
    {
		$data['travelingRecords'] = $this->traveling_model->getTravelingTypes();

		$process = 'All of Traveling Types';
		$processFunction = 'Manager/travelingTypesListing';
		$this->logrecord($process,$processFunction);

		$this->global['pageTitle'] = 'All of Traveling Types';
		
		$this->loadViews("master/traveling/travelingTypes", $this->global, $data, NULL);
    }


    function addNewTravelingType()
    {
		$data['states'] = '';
		$this->global['pageTitle'] = 'Add a Traveling Type';
		$this->loadViews("master/traveling/addNewTravelingType", $this->global, $data, NULL);
    }
	


    function addNewTravelingTypes()
    {
            $this->load->library('form_validation');          
            
            $this->form_validation->set_rules('traveling_type','Traveling Type','required|trim');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNewTravelingType();
            }
            else
            {
                $traveling_type = $this->security->xss_clean($this->input->post('traveling_type')); 
				$description = $this->security->xss_clean($this->input->post('description')); 				
                $Info = array('name' => $traveling_type, 'description' => $description, 'createdBy' => $this->vendorId, 'createdDtm' => date('Y-m-d H:i:s'));
                
                $check = $this->traveling_model->checkTravelingTypeExist($traveling_type);

                if($check == false)
                { 
                    $result = $this->traveling_model->addNewTravelingTypes($Info);
                
                    if($result > 0)
                    {
                        $process = 'Add a Traveling Type';
                        $processFunction = 'Manager/addNewTravelingTypes';
                        $this->logrecord($process,$processFunction);

                        $this->session->set_flashdata('success', 'Traveling type created successfully');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Traveling type creation failed');
                    }
                }
                else{
                    $this->session->set_flashdata('error', 'Traveling type already in record');
                }
                
                redirect('addNewTravelingType');
            }
        }

    function editOldTravelingType($id = NULL)
    {
        if($id == null)
        {
            redirect('travelingTypesListing');
        }
        
        $data['travelingTypeInfo'] = $this->traveling_model->getTravelingTypeInfo($id);           
        $this->global['pageTitle'] = 'Traveling Type Edit';
        
        $this->loadViews("master/traveling/editOldTravelingType", $this->global, $data, NULL);
    }

    function editTravelingType()
    {            
        $this->load->library('form_validation');
		$this->form_validation->set_rules('traveling_type','Traveling Type','required|trim');

        $id = $this->input->post('id');

        if($this->form_validation->run() == FALSE)
        {
            $this->editOldTravelingType($id);
        }
        else
        {
            $traveling_type = $this->security->xss_clean($this->input->post('traveling_type')); 
			$description = $this->security->xss_clean($this->input->post('description')); 

			$Info = array('name' => $traveling_type, 'description' => $description, 'updatedBy' => $this->vendorId, 'updatedDtm' => date('Y-m-d H:i:s'));
                                
            $check = $this->traveling_model->checkTravelingTypeExist($traveling_type, $id);

                if($check == false)
                {
                    $result = $this->traveling_model->editTravelingType($Info, $id);
            
                    if($result > 0)
                    {
                        $process = 'Traveling Type Edit';
                        $processFunction = 'Manager/editTravelingType';
                        $this->logrecord($process,$processFunction);
                        $this->session->set_flashdata('success', 'Traveling Type Edit successful');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Traveling Type Edit failed');
                    }
                }
                else{
                    $this->session->set_flashdata('error', 'Traveling Type already in record');
                }
                redirect('travelingTypesListing');

            }
    }

  
    function deleteTravelingType()
    {
        $id =  $this->input->post('id');
		if($id == null)
		{
			redirect('travelingTypesListing');
		}
		
       

		$dataArr = array(			
			'isDeleted' => 1,
			'updatedBy' => $this->vendorId,
			'updatedDtm'=>date('Y-m-d H:i:s')
		);		
        $result=$this->traveling_model->deleteTravelingType($id, $dataArr);
        print_r($result);
		// if($this->traveling_model->deleteTravelingType($id, $dataArr))
        // {
        //     return true;
        // }
        // else{
        //     return false;
        // }
    }


    function travelingVehiclesListing()
    {
		$data['Records'] = $this->traveling_model->getTravelingVehicles();

		$process = 'All of Traveling Vehicles';
		$processFunction = 'Manager/travelingVehiclesListing';
		$this->logrecord($process,$processFunction);

		$this->global['pageTitle'] = 'All of Traveling Vehicles';
		
		$this->loadViews("master/traveling/travelingVehicles", $this->global, $data, NULL);
    }

    function addNewTravelingVehicle()
    {
		$data['traveling_type'] = '';
		$this->global['pageTitle'] = 'Add New Traveling';
		$this->loadViews("master/traveling/addNewTravelingVehicles", $this->global, $data, NULL);
    }


    function addNewTravelingVehicles()
    {
        $this->load->library('form_validation'); 
        $this->form_validation->set_rules('traveling_vehicle','Traveling Vehicle','required|trim');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->addNewTravelingVehicle();
        }
        else
        {
            $name = $this->security->xss_clean($this->input->post('traveling_vehicle')); 
            $description = $this->security->xss_clean($this->input->post('description')); 

			
            $dataArr = array(
                'name' => $name, 
                'description' => $description,
                'statusId' => 1, 
                'createdBy' => $this->vendorId, 
                'createdDtm'=>date('Y-m-d H:i:s')
            );
            
            $check = $this->traveling_model->checkTravelingVehicleExist($name);

            if($check == false)
            { 
                $result = $this->traveling_model->addNewTravelingVehicle($dataArr);
            
                if($result > 0)
                {
                    $process = 'Add a Traveling Vehicle';
                    $processFunction = 'Manager/addNewTravelingVehicles';
                    $this->logrecord($process,$processFunction);

                    $this->session->set_flashdata('success', 'New Traveling Vehicle created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'New Traveling Vehicle creation failed');
                }
            }
            else{
                $this->session->set_flashdata('error', 'New Traveling Vehicle already in record');
            }
            
            redirect('addNewTravelingVehicle');
        }
    }

    function editOldTravelingVehicle($id = NULL)
    {
        if($id == null)
        {
            redirect('travelingVehiclesListing');
        }
        $data['vehicle_list'] = $this->traveling_model->getTravelingVehicleInfoById($id);
        

       // echo $id;
		$this->global['pageTitle'] = 'Edit Vehicle';
		$this->loadViews("master/traveling/editOldTravelingVehicle", $this->global, $data, NULL);
    }

 
    function editTravelingVehicle()
    {
        $this->load->library('form_validation'); 
        $this->form_validation->set_rules('traveling_vehicle','Traveling Vehicle','required|trim');
        $this->form_validation->set_rules('status','Status','required|trim');
        $id = $this->input->post('id');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->editOldTravelingVehicle($id);
        }
        else
        {
            
            
            $name = $this->security->xss_clean($this->input->post('traveling_vehicle')); 
            $description = $this->security->xss_clean($this->input->post('description'));
            $statusId = $this->input->post('status');
			
            $dataArr = array(
                'name' => $name, 
                'description' => $description, 
                'statusId' => $statusId, 
                'updatedBy' => $this->vendorId, 
                'updatedDtm'=>date('Y-m-d H:i:s')
            );
            
            $check = $this->traveling_model->checkTravelingVehicleExist($name, $id);

            if($check == false)
            { 
                $result = $this->traveling_model->editTravelingVehicle($id, $dataArr);
            
                if($result > 0)
                {
                    $process = 'Edit Traveling Vehicle';
                    $processFunction = 'Manager/editTravelingVehicle';
                    $this->logrecord($process,$processFunction);

                    $this->session->set_flashdata('success', 'Traveling vehicle update successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Traveling Vehicle updataion failed');
                }
            }
            else{
                $this->session->set_flashdata('error', 'Traveling Vehicle already in record');
            }
            
            redirect('travelingVehiclesListing');
        }
    }

 
    function deleteTravelingVehicle()
    {
        $id =  $this->input->post('id');
        
		if($id == null)
		{
			redirect('travelingVehiclesListing');
		}
		
		$dataArr = array(			
			'isDeleted' => 1,
			'updatedBy' => $this->vendorId,
			'updatedDtm'=>date('Y-m-d H:i:s')
		);		

		if($this->traveling_model->deleteTravelingVehicle($id, $dataArr))
		{
            return true;
        }
        else{
            return false;
        }
    }


    function travelingPackagesListing()
    {
        $data['Records'] = $this->traveling_model->getTravelingPackages();
        

		$process = 'All of Traveling Packages';
		$processFunction = 'Manager/travelingPackagesListing';
		$this->logrecord($process,$processFunction);

		$this->global['pageTitle'] = 'All of Traveling Packages';
		
		$this->loadViews("master/traveling/travelingPackages", $this->global, $data, NULL);
    }

    function addNewTravelingPackage()
    {
        $data['traveling_type'] = $this->traveling_model->getTravelingTypes();
        $data['traveling_vehicle'] = $this->traveling_model->getTravelingVehicles();
		$this->global['pageTitle'] = 'Add New Traveling Package';
		$this->loadViews("master/traveling/addNewTravelingPackage", $this->global, $data, NULL);
    }


    function addNewTravelingPackages()
    {
        $this->load->library('form_validation'); 
        $this->form_validation->set_rules('traveling_type_id','Traveling Type','required|numeric');
        $this->form_validation->set_rules('traveling_vehicle_id','Traveling Vehicle','required|numeric');
        $this->form_validation->set_rules('name','Package Name','required|trim');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->addNewTravelingPackage();
        }
        else
        {
            $traveling_type_id = $this->input->post('traveling_type_id');
            $traveling_vehicle_id = $this->input->post('traveling_vehicle_id');
            $name = $this->security->xss_clean($this->input->post('name')); 
            $description = $this->security->xss_clean($this->input->post('description'));            
            $rate = $this->input->post('rate');
            $extra_km_rate = $this->input->post('extra_km_rate');
            $extra_hour_rate = $this->input->post('extra_hour_rate');
            $driver_allowance = $this->input->post('driver_allowance');
            $toll_parking_tax = $this->input->post('toll_parking_tax'); 

			
            $dataArr = array(
                'traveling_type_id' => $traveling_type_id,
                'traveling_vehicle_id' => $traveling_vehicle_id,
                'name' => $name, 
                'description' => $description,
                'rate' => $rate,
                'extra_km_rate' => $extra_km_rate,
                'extra_hour_rate' => $extra_hour_rate,
                'driver_allowance' => $driver_allowance,
                'toll_parking_tax' => $toll_parking_tax,
                'statusId' => 1, 
                'createdBy' => $this->vendorId, 
                'createdDtm'=>date('Y-m-d H:i:s')
            );
            
            $check = $this->traveling_model->checkTravelingPackageExist($traveling_type_id, $traveling_vehicle_id, $name);

            if($check == false)
            { 
                $result = $this->traveling_model->addNewTravelingPackages($dataArr);
            
                if($result > 0)
                {
                    $process = 'Add a Traveling Package';
                    $processFunction = 'Manager/addNewTravelingPackages';
                    $this->logrecord($process,$processFunction);

                    $this->session->set_flashdata('success', 'Traveling Package created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Traveling Package creation failed');
                }
            }
            else{
                $this->session->set_flashdata('error', 'Traveling Package already in record');
            }
            
            redirect('addNewTravelingPackage');
        }
    }

    function editOldTravelingPackage($id = NULL)
    {
        if($id == null)
        {
            redirect('travelingPackagesListing');
        }
        
        $data['traveling_type'] = $this->traveling_model->getTravelingTypes();
        $data['traveling_vehicle'] = $this->traveling_model->getTravelingVehicles();
        $data['package_list'] = $this->traveling_model->getTravelingPackageInfo($id);
        

       // echo $id;
		$this->global['pageTitle'] = 'Edit editOldTravelingPackage';
		$this->loadViews("master/traveling/editOldTravelingPackage", $this->global, $data, NULL);
    }

 
    function editTravelingPackage()
    {
        $this->load->library('form_validation'); 
        $this->form_validation->set_rules('traveling_type_id','Traveling Type','required|numeric');
        $this->form_validation->set_rules('traveling_vehicle_id','Traveling Vehicle','required|numeric');
        $this->form_validation->set_rules('name','Package Name','required|trim');
        $this->form_validation->set_rules('status','Status','required|trim');
        $id = $this->input->post('id');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->editOldTravelingPackage($id);
        }
        else
        {            
            $traveling_type_id = $this->input->post('traveling_type_id');
            $traveling_vehicle_id = $this->input->post('traveling_vehicle_id');
            $name = $this->security->xss_clean($this->input->post('name')); 
            $description = $this->security->xss_clean($this->input->post('description'));            
            $rate = $this->input->post('rate');
            $extra_km_rate = $this->input->post('extra_km_rate');
            $extra_hour_rate = $this->input->post('extra_hour_rate');
            $driver_allowance = $this->input->post('driver_allowance');
            $toll_parking_tax = $this->input->post('toll_parking_tax');
            $statusId = $this->input->post('status');
			
            $dataArr = array(
                'traveling_type_id' => $traveling_type_id,
                'traveling_vehicle_id' => $traveling_vehicle_id,
                'name' => $name, 
                'description' => $description,
                'rate' => $rate,
                'extra_km_rate' => $extra_km_rate,
                'extra_hour_rate' => $extra_hour_rate,
                'driver_allowance' => $driver_allowance,
                'toll_parking_tax' => $toll_parking_tax, 
                'statusId' => $statusId, 
                'updatedBy' => $this->vendorId, 
                'updatedDtm'=>date('Y-m-d H:i:s')
            );
            
            $check = $this->traveling_model->checkTravelingPackageExist($traveling_type_id, $traveling_vehicle_id, $name, $id);

            if($check == false)
            { 
                $result = $this->traveling_model->editTravelingPackage($dataArr, $id);
            
                if($result > 0)
                {
                    $process = 'Edit Traveling Package';
                    $processFunction = 'Manager/editTravelingPackage';
                    $this->logrecord($process,$processFunction);

                    $this->session->set_flashdata('success', 'Traveling Package update successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Traveling Package updataion failed');
                }
            }
            else{
                $this->session->set_flashdata('error', 'Traveling Package already in record');
            }
            
            redirect('travelingPackagesListing');
        }
    }

 
    function deleteTravelingPackage()
    {
        $id =  $this->input->post('id');
        echo $id;
		if($id == null)
		{
			redirect('travelingPackagesListing');
		}
		
		$dataArr = array(			
			'isDeleted' => 1,
			'updatedBy' => $this->vendorId,
			'updatedDtm'=>date('Y-m-d H:i:s')
		);		

        if($this->traveling_model->deleteTravelingPackage($id, $dataArr))
        {
            return true;
        }
        else{
            return false;
        }
    }
	
	

	


}

?>