<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Surya Narayan / 005surya@gmail.com
 * @version : 1.0
 * @since : 27.02.2020
 */
class Vehicle extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
		$this->load->model('master_model');
        $this->load->model('vehicle_model');
        $this->load->model('vendor_model');
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
    function vehicleTypes()
    {
		$data['vehicleRecords'] = $this->vehicle_model->getVehicleTypes();

		$process = 'All of Vehicle Types';
		$processFunction = 'Manager/vehicleTypes';
		$this->logrecord($process,$processFunction);

		$this->global['pageTitle'] = 'All of Vehicle Types';
		
		$this->loadViews("master/vehicle/vehicleTypes", $this->global, $data, NULL);
    }

    /**
     * This function is used to load the add new Vehicle
     */
    function addNewVehicleType()
    {
		$data['states'] = '';
		$this->global['pageTitle'] = 'Add a Vehicle';
		$this->loadViews("master/vehicle/addNewVehicleType", $this->global, $data, NULL);
    }
	


     /**
     * This function is used to add new Tax to the system
     */
    function addNewVehicleTypes()
    {
            $this->load->library('form_validation');          
            
            $this->form_validation->set_rules('vehicle_type','Vehicle Type','required');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNewVehicleType();
            }
            else
            {
                $vehicle_type = $this->input->post('vehicle_type'); 
				$description = $this->input->post('description'); 				
                $vehicleTypeInfo = array('type' => $vehicle_type, 'description' => $description, 'createdBy' => $this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'));
                
                $checkVehicleType = $this->vehicle_model->checkVehicleTypeExist($vehicle_type);

                if($checkVehicleType == false)
                { 
                    $result = $this->vehicle_model->addNewVehicleTypes($vehicleTypeInfo);
                
                    if($result > 0)
                    {
                        $process = 'Add a Vehicle Type';
                        $processFunction = 'Manager/addNewVehicleTypes';
                        $this->logrecord($process,$processFunction);

                        $this->session->set_flashdata('success', 'Vehicle type created successfully');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Vehicle type creation failed');
                    }
                }
                else{
                    $this->session->set_flashdata('error', 'Vehicle type already in record');
                }
                
                redirect('addNewVehicleType');
            }
        }

    /**
     * This function is used to open edit taxs view
     */
    function editOldVehicleType($vehicleTypeId = NULL)
    {
            if($vehicleTypeId == null)
            {
                redirect('vehicleTypes');
            }
            
            $data['vehicleTypeInfo'] = $this->vehicle_model->getVehicleTypeInfo($vehicleTypeId);           
            $this->global['pageTitle'] = 'Vehicle Type Edit';
            
            $this->loadViews("master/vehicle/editOldVehicleType", $this->global, $data, NULL);
    }

    /**
     * This function is used to edit vehicle Types
     */
    function editVehicleType()
    {            
        $this->load->library('form_validation');
		$this->form_validation->set_rules('vehicle_type','Vehicle Type','required');

        $vehicleTypeId = $this->input->post('vehicleTypeId');

        if($this->form_validation->run() == FALSE)
        {
            $this->editOldVehicleType($vehicleTypeId);
        }
        else
        {
            $vehicle_type = $this->input->post('vehicle_type'); 
			$description = $this->input->post('description'); 

			$vehicleTypeInfo = array('type' => $vehicle_type, 'description' => $description, 'updatedBy' => $this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
                                
            $checkTax = $this->vehicle_model->checkVehicleTypeExist($vehicle_type, $vehicleTypeId);

                if($checkTax == false)
                {
                    $result = $this->vehicle_model->editVehicleType($vehicleTypeInfo, $vehicleTypeId);
            
                    if($result > 0)
                    {
                        $process = 'Vehicle Type Edit';
                        $processFunction = 'Manager/editVehicleType';
                        $this->logrecord($process,$processFunction);
                        $this->session->set_flashdata('success', 'Vehicle Type Edit successful');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Vehicle Type Edit failed');
                    }
                }
                else{
                    $this->session->set_flashdata('error', 'Vehicle Type already in record');
                }
                redirect('vehicleTypes');

            }
    }

    /**
     * This function is used to delete Vehicle Type
     */
    function deleteVehicleType($id = NULL)
    {
		if($id == null)
		{
			redirect('vehicleTypes');
		}
		
		$dataArr = array(			
			'isDeleted' => 1,
			'updatedBy' => $this->vendorId,
			'updatedDtm'=>date('Y-m-d H:i:s')
		);		

		$result = $this->vehicle_model->deleteVehicleType($id, $dataArr);
		
		if ($result == TRUE) {
			 $process = 'Vehicle Type Delete';
			 $processFunction = 'Manager/deleteTax';
			 $this->logrecord($process,$processFunction);

			 $this->session->set_flashdata('success', 'Vehicle Type delete successful');
			}
		else
		{
			$this->session->set_flashdata('error', 'Vehicle Type delete failed');
		}
		redirect('vehicleTypes');
    }

    /**
     * This function is used to load the add new Tax
     */
    function addNewVehicle()
    {
		$data['vendorList'] = $this->vendor_model->vendorList();
		$data['vehicle_type'] = $this->vehicle_model->getVehicleTypeList();
		$this->global['pageTitle'] = 'Add New Vehicle';
		$this->loadViews("master/vehicle/addNewVehicle", $this->global, $data, NULL);
    }

    /**
     * This function is used to add new Tax to the system
     */
    function addNewVehicles()
    {
        $this->load->library('form_validation'); 
        $this->form_validation->set_rules('vehicle_type','Vehicle Type','required|numeric');
        $this->form_validation->set_rules('vendor_id','Vendor','required|numeric');
        $this->form_validation->set_rules('vehicle_no','Vehicle Number','required|trim');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->addNewVehicle();
        }
        else
        {
            $vehicle_type = $this->input->post('vehicle_type'); 
            $vendor_id = $this->input->post('vendor_id');
            $vehicle_no = $this->security->xss_clean($this->input->post('vehicle_no'));
            $vehicle_no = strtoupper($vehicle_no);
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $alternate_mobile = $this->security->xss_clean($this->input->post('alternate_mobile'));
            

			$driver_name = $this->security->xss_clean($this->input->post('driver_name'));
            $mobile_no = $this->input->post('mobile_no');
            $police_verification = $this->input->post('police_verification');
            $aadhar_card = $this->security->xss_clean($this->input->post('aadhar_card'));
            $driving_licence = $this->security->xss_clean($this->input->post('driving_licence'));

            //$insurance = $this->security->xss_clean($this->input->post('insurance'));
            $fitness_expiry_date = $this->security->xss_clean($this->input->post('fitness_expiry_date'));
            $insurance_expiry_date = $this->input->post('insurance_expiry_date');

            $polution_expiry_date = $this->input->post('polution_expiry_date');

            //$permit_1_year = $this->input->post('permit_1_year');
            $permit_1_year_expiry_date = $this->input->post('permit_1_year_expiry_date');

            //$permit_5_year = $this->input->post('permit_5_year');
            $permit_5_year_expiry_date = $this->input->post('permit_5_year_expiry_date');

            $gps = $this->input->post('gps');
            $gps_rate = $this->input->post('gps_rate');
           
           
            // $emi = $this->input->post('emi');
            // $emi_loan_amount = $this->input->post('emi_loan_amount');
            // $emi_years = $this->input->post('emi_years');
            // $emi_rate = $this->input->post('emi_rate');
			
            $dataArr = array(
                'vehicle_type_id' => $vehicle_type, 
                'vendor_id' => $vendor_id, 
                'vehicle_no' => $vehicle_no, 
                'mobile' => $mobile,
                'alternate_mobile' => $alternate_mobile,
				'driver_name' => $driver_name,
				'mobile_no' => $mobile_no,
				'police_verification' => $police_verification,
				'aadhar_card' => $aadhar_card,
				'driving_licence' => $driving_licence,
                //'is_insurance' => $insurance, 
                'fitness_expiry_date' => $fitness_expiry_date, 
                'insurance_expiry_date' => $insurance_expiry_date, 
                'polution_expiry_date' => $polution_expiry_date, 
                //'permit_1_year' => $permit_1_year, 
                'permit_1_year_expiry_date' => $permit_1_year_expiry_date, 
                //'permit_5_year' => $permit_5_year, 
                'permit_5_year_expiry_date' => $permit_5_year_expiry_date, 
                'gps' => $gps, 
                'gps_rate' => $gps_rate, 
                // 'emi' => $emi, 
                // 'emi_loan_amount' => $emi_loan_amount, 
                // 'emi_years' => $emi_years, 
                // 'emi_rate' => $emi_rate, 
                'statusId' => 1, 
                'createdBy' => $this->vendorId, 
                'createdDtm'=>date('Y-m-d H:i:s')
            );
            
            $checkVehicleType = $this->vehicle_model->checkVehicleExist($vendor_id, $vehicle_no);

            if($checkVehicleType == false)
            { 
                $result = $this->vehicle_model->addNewVehicle($dataArr);
            
                if($result > 0)
                {
                    $process = 'Add a Vehicle';
                    $processFunction = 'Manager/addNewVehicles';
                    $this->logrecord($process,$processFunction);

                    // if($emi === 1){
						
					// 	$vendorEmiInfo = array(
                    //         'vendor_id' => $vendor_id,
                    //         'vehicle_id' => $result,
					// 		'emi' => $emi,
					// 		'emi_loan_amount' => $emi_loan_amount,
					// 		'emi_years' => $emi_years,
					// 		'emi_rate' => $emi_rate,
					// 		'statusId' => $statusId,
					// 		'createdBy' => $this->vendorId,
					// 		'createdDtm' => date('Y-m-d H:i:s')
					// 	);
					// 	$this->vehicle_model->addNewVendorEmi($vendorEmiInfo);
					// }

                    $this->session->set_flashdata('success', 'New Vehicle created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'New Vehicle creation failed');
                }
            }
            else{
                $this->session->set_flashdata('error', 'New Vehicle already in record');
            }
            
            redirect('addNewVehicle');
        }
    }

    function editOldVehicle($id = NULL)
    {
        if($id == null)
        {
            redirect('vendorListing');
        }
		$data['vendorList'] = $this->vendor_model->vendorList();
        $data['vehicle_type'] = $this->vehicle_model->getVehicleTypeList();
        $data['vehicle_list'] = $this->vehicle_model->getVehicleInfoById($id);
        

       // echo $id;
		$this->global['pageTitle'] = 'Edit Vehicle';
		$this->loadViews("master/vehicle/editOldVehicle", $this->global, $data, NULL);
    }

     /**
     * This function is used to add new Tax to the system
     */
    function editVehicle()
    {
        $this->load->library('form_validation'); 
        $this->form_validation->set_rules('vehicle_type','Vehicle Type','required|numeric');
        $this->form_validation->set_rules('vendor_id','Vendor','required|numeric');
        $this->form_validation->set_rules('vehicle_no','Vehicle Number','required');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->addNewVehicle();
        }
        else
        {
            $id = $this->input->post('id');
            
            $vehicle_type = $this->input->post('vehicle_type'); 
            $vendor_id = $this->input->post('vendor_id');
            $vehicle_no = $this->security->xss_clean($this->input->post('vehicle_no'));
            $vehicle_no = strtoupper($vehicle_no);
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
			
			
			$driver_name = $this->security->xss_clean($this->input->post('driver_name'));
            $mobile_no = $this->input->post('mobile_no');
            $police_verification = $this->input->post('police_verification');
            $aadhar_card = $this->security->xss_clean($this->input->post('aadhar_card'));
            $driving_licence = $this->security->xss_clean($this->input->post('driving_licence'));
			

           // $insurance = $this->security->xss_clean($this->input->post('insurance'));
            $fitness_expiry_date = $this->security->xss_clean($this->input->post('fitness_expiry_date'));
            $insurance_expiry_date = $this->input->post('insurance_expiry_date');

            $polution_expiry_date = $this->input->post('polution_expiry_date');

            //$permit_1_year = $this->input->post('permit_1_year');
            $permit_1_year_expiry_date = $this->input->post('permit_1_year_expiry_date');

            //$permit_5_year = $this->input->post('permit_5_year');
            $permit_5_year_expiry_date = $this->input->post('permit_5_year_expiry_date');

            $gps = $this->input->post('gps');
            $gps_rate = $this->input->post('gps_rate');
            // $emi = $this->input->post('emi');
            // $emi_loan_amount = $this->input->post('emi_loan_amount');
            // $emi_years = $this->input->post('emi_years');
            // $emi_rate = $this->input->post('emi_rate');

            $statusId = $this->input->post('status');
			
            $dataArr = array(
                'vehicle_type_id' => $vehicle_type, 
                'vendor_id' => $vendor_id, 
                'vehicle_no' => $vehicle_no, 
                'mobile' => $mobile,
				'driver_name' => $driver_name,
				'mobile_no' => $mobile_no,
				'police_verification' => $police_verification,
				'aadhar_card' => $aadhar_card,
				'driving_licence' => $driving_licence,				
                //'is_insurance' => $insurance, 
                'fitness_expiry_date' => $fitness_expiry_date, 
                'insurance_expiry_date' => $insurance_expiry_date, 
                'polution_expiry_date' => $polution_expiry_date, 
                //'permit_1_year' => $permit_1_year, 
                'permit_1_year_expiry_date' => $permit_1_year_expiry_date, 
                //'permit_5_year' => $permit_5_year, 
                'permit_5_year_expiry_date' => $permit_5_year_expiry_date, 
                'gps' => $gps, 
                'gps_rate' => $gps_rate, 
                // 'emi' => $emi, 
                // 'emi_loan_amount' => $emi_loan_amount, 
                // 'emi_years' => $emi_years, 
                // 'emi_rate' => $emi_rate, 
                'statusId' => $statusId, 
                'updatedBy' => $this->vendorId, 
                'updatedDtm'=>date('Y-m-d H:i:s')
            );
            
            $checkVehicleType = $this->vehicle_model->checkVehicleExist($vendor_id, $vehicle_no, $id);

            if($checkVehicleType == false)
            { 
                $result = $this->vehicle_model->editVehicle($id, $dataArr);
            
                if($result > 0)
                {
                    $process = 'Edit Vehicle';
                    $processFunction = 'Manager/editVehicle';
                    $this->logrecord($process,$processFunction);

                    // if($emi === 1){
						
					// 	$vendorEmiInfo = array(
                    //         'vendor_id' => $vendor_id,
                    //         'vehicle_id' => $id,
					// 		'emi' => $emi,
					// 		'emi_loan_amount' => $emi_loan_amount,
					// 		'emi_years' => $emi_years,
					// 		'emi_rate' => $emi_rate,
					// 		'statusId' => $statusId,
					// 		'updatedBy' => $this->vendorId,
					// 		'updatedDtm' => date('Y-m-d H:i:s')
					// 	);
					// 	$this->vehicle_model->editVendorEmi($vendorEmiInfo);
					// }

                    $this->session->set_flashdata('success', 'New Vehicle created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'New Vehicle creation failed');
                }
            }
            else{
                $this->session->set_flashdata('error', 'New Vehicle already in record');
            }
            
            redirect('vendorListing');
        }
    }

     /**
     * This function is used to delete Vehicle Type
     */
    function deleteVehicle()
    {
		$id =  $this->input->post('id');
		
		if($id == null)
		{
			redirect('vendorListing');
		}
		
		$dataArr = array(			
			'isDeleted' => 1,
			'updatedBy' => $this->vendorId,
			'updatedDtm'=>date('Y-m-d H:i:s')
		);		

		$result = $this->vehicle_model->deleteVehicle($id, $dataArr);
		
		if ($result == TRUE) {
			 $process = 'Vehicle Delete';
			 $processFunction = 'Manager/deleteVehicle';
			 $this->logrecord($process,$processFunction);

			 echo 1;
			}
		else
		{
			echo 0;
		}
    }
	
	function uploadVehicleLogo($id = NULL){
		
		if($id == null)
        {
            redirect('viewVendor/'.$id);
        }
		
		$data['id'] = $id;
		
		//$data['vendorList'] = $this->vendor_model->vendorList();
        //$data['vehicle_type'] = $this->vehicle_model->getVehicleTypeList();
        //$data['vehicle_list'] = $this->vehicle_model->getVehicleInfoById($id);

       // echo $id;
		$this->global['pageTitle'] = 'Upload Vehicle Doc';
		$this->loadViews("master/vehicle/uploadVehicleLogo", $this->global, $data, NULL);
		
	}
	
	function upload_vehicle_files()
	{
		
				
		$config['upload_path'] = "./upload/vehicle/images";
        $config['allowed_types'] = "gif|jpg|png|jpeg|pdf|PNG";
		$config['max_size'] = '1024';
		//$config['max_width'] = '1024';
		//$config['max_height'] = '768';
        $config['encrypt_name'] = TRUE;
        $config['remove_spaces'] = TRUE;

		
		$id = $this->input->post('id');       
		
		for ($i=0; $i<8; $i++)
		{
		  if(!empty($_FILES['upl_files'.$i]['name']))
		  {
			  $_FILES['userfile']['name']     = $_FILES['upl_files'.$i]['name'];
			  $_FILES['userfile']['type']     = $_FILES['upl_files'.$i]['type'];
			  $_FILES['userfile']['tmp_name'] = $_FILES['upl_files'.$i]['tmp_name'];
			  $_FILES['userfile']['error']    = $_FILES['upl_files'.$i]['error'];
			  $_FILES['userfile']['size']     = $_FILES['upl_files'.$i]['size'];

			  $this->load->library('upload', $config);
			  $this->upload->initialize($config);
			  
			if (!$this->upload->do_upload()){
				$response = array('status' => 'error', 'message' => $this->upload->display_errors());
			}
			else
			{
				$data[$i] = array('upload_data' => $this->upload->data());
				$image = array();
				if($i==0)
				{
					$image = array('arcy_image' => $data[$i]['upload_data']['file_name']);
				}
				else if($i==1)
				{
					$image = array('insurance_image' => $data[$i]['upload_data']['file_name']);
				}
				else if($i==2)
				{
					$image = array('polution_image' => $data[$i]['upload_data']['file_name']);
				}
				else if($i==3)
				{
					$image = array('fitness_image' => $data[$i]['upload_data']['file_name']);
				}
				else if($i==4)
				{
					$image = array('aadhar_card_image' => $data[$i]['upload_data']['file_name']);
				}
				else if($i==5)
				{
					$image = array('driving_licence_image' => $data[$i]['upload_data']['file_name']);
				}
				else if($i==6)
				{
					$image = array('police_verification_image' => $data[$i]['upload_data']['file_name']);
				}
				else if($i==7)
				{
					$image = array('driver_image' => $data[$i]['upload_data']['file_name']);
				}				
			
			$result = $this->vehicle_model->upload_vehicle_files($id, $image);			
			$this->session->set_flashdata('success', 'Docs upload successful');
			// Continue processing the uploaded data
			$response = array('status' => 'success', 'message' => 'Sucessfully uploaded');
			
		  }
		}
	  
		
	  }
	  
	  echo json_encode($response);
	
	}
	
	function getVehicles()
    {
		$result = array();
		if(isset($_GET['search'])) 
		{
		   $result = $this->vehicle_model->getVehicles($_GET['search']);
			if (count($result) > 0) {
			foreach ($result as $row)
				$arr_result[] = array(
					'value'	=> $row->id,
					'label'	=> $row->vehicle_no,
					'vehicle_type_id' => $row->vehicle_type_id,
					'vendor_id'	=> $row->vendor_id
				);
				echo json_encode($arr_result);
			}
		}
    }

    function getVendorId()
    {
        $result = array();
		if (isset($_GET['vehicle_id'])) 
		{
            $result = $this->vehicle_model->getVendorId($_GET['vehicle_id']);
            echo $result[0]->vendor_id;
        }
    }
	
	function getVehiclesByVendorId()
    {
        $results = array();
		if (isset($_GET['vendor_id'])) 
		{
            $results = $this->vehicle_model->getVehiclesByVendorId($_GET['vendor_id']);
			
			//Print out the array in a JSON format.
			header('Content-Type: application/json');
			echo json_encode($results);
        }
    }
	
	
	function advanceListing()
    {
		$data['records'] = $this->vehicle_model->getAdvanceListings();

		$process = 'All of Advance List';
		$processFunction = 'Manager/advanceListing';
		$this->logrecord($process,$processFunction);

		$this->global['pageTitle'] = 'All of Vehicle Types';
		
		$this->loadViews("master/vehicle/advanceListing", $this->global, $data, NULL);
    }

    /**
     * This function is used to load the add new Vehicle
     */
    function addNewAdvance()
    {
		$data['states'] = '';
		$this->global['pageTitle'] = 'Add New Advance';
		$this->loadViews("master/vehicle/addNewAdvance", $this->global, $data, NULL);
    }
	


     /**
     * This function is used to add new Tax to the system
     */
    function addNewAdvances()
    {
        $this->load->library('form_validation');          
        
        $this->form_validation->set_rules('vendor_id','Vendor Id','required');
        $this->form_validation->set_rules('vendor_vehicle_id','Vehicle Id.','required');
        $this->form_validation->set_rules('vehicle_id','Vehicle No.','required');
        $this->form_validation->set_rules('rate','Rate','required');
        $this->form_validation->set_rules('amount','Amount','required');        
        $this->form_validation->set_rules('advance_date','Date','required');
        $this->form_validation->set_rules('description','Description','required');
        
        
        if($this->form_validation->run() == FALSE)
        {
            $this->addNewAdvance();
        }
        else
        {
            $vendor_id = $this->input->post('vendor_id'); 
            $vehicle_id = $this->input->post('vendor_vehicle_id');
            $amount = $this->input->post('amount');
            $rate = $this->input->post('rate');				
            $advance_date = $this->input->post('advance_date');
            $description = $this->security->xss_clean($this->input->post('description'));
            
            $data = array('vendor_id' => $vendor_id, 'vehicle_id' => $vehicle_id, 'amount' => $amount, 'advance_date' => $advance_date, 'rate' => $rate, 'description' => $description, 'statusId' => 1, 'createdBy' => $this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'));
            
            $result = $this->vehicle_model->addNewAdvance($data);
        
            if($result > 0)
            {
                $process = 'Add a Advance Details';
                $processFunction = 'Manager/addNewAdvance';
                $this->logrecord($process,$processFunction);

                $this->session->set_flashdata('success', 'Advance details created successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Advance details creation failed');
            }

            
            redirect('advanceListing');
        }
    }




    function editOldAdvance($id = NULL)
    {
        if($id == null)
        {
            redirect('advanceListing');
        }

        $data['advance_list'] = $this->vehicle_model->getAdvanceInfoById($id);

		$this->global['pageTitle'] = 'Edit Advance';
		$this->loadViews("master/vehicle/editOldAdvance", $this->global, $data, NULL);
    }

     /**
     * This function is used to add new Tax to the system
     */
    function editAdvance()
    {
        $this->load->library('form_validation'); 
        $this->form_validation->set_rules('amount','Amount','required');
        $this->form_validation->set_rules('advance_date','Date','required');
        $this->form_validation->set_rules('description','Description','required');
        $this->form_validation->set_rules('status','Status','required|numeric');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->addNewAdvance();
        }
        else
        {
            $id = $this->input->post('id');
            
            //$vendor_id = $this->input->post('vendor_id'); 
            //$vehicle_id = $this->input->post('vendor_vehicle_id');
            $amount = $this->input->post('amount');
            //$rate = $this->input->post('rate');				
            $advance_date = $this->input->post('advance_date');
            $statusId = $this->input->post('status');
            $description = $this->security->xss_clean($this->input->post('description'));
            
            $dataArr = array('amount' => $amount, 'advance_date' => $advance_date, 'description' => $description, 'statusId' => $statusId, 'updatedBy' => $this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            
            //$data = array('vendor_id' => $vendor_id, 'vehicle_id' => $vehicle_id, 'amount' => $amount, 'advance_date' => $advance_date, 'rate' => $rate, 'description' => $description, 'statusId' => $statusId, 'createdBy' => $this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'));
			
            $result = $this->vehicle_model->editAdvance($id, $dataArr);
            
            if($result > 0)
            {
                $process = 'Edit Vehicle';
                $processFunction = 'Manager/editVehicle';
                $this->logrecord($process,$processFunction);

                $this->session->set_flashdata('success', 'Advance updated successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Advance updation failed');
            }
            
            redirect('advanceListing');
        }
    }

     /**
     * This function is used to delete Vehicle Type
     */
    function deleteAdvance()
    {
		$id =  $this->input->post('id');
		
		if($id == null)
		{
			redirect('advanceListing');
		}
		
		$dataArr = array(			
			'isDeleted' => 1,
			'updatedBy' => $this->vendorId,
			'updatedDtm'=>date('Y-m-d H:i:s')
		);		

		$result = $this->vehicle_model->deleteAdvance($id, $dataArr);
		
		if ($result == TRUE) {
			 $process = 'Advance Delete';
			 $processFunction = 'Vehicle/deleteAdvance';
			 $this->logrecord($process,$processFunction);

			 echo 1;
			}
		else
		{
			echo 0;
		}
    }

















    /**
     * This function is used to open edit taxs view
     */
    function editOldVehicleTssype($vehicleTypeId = NULL)
    {
            if($vehicleTypeId == null)
            {
                redirect('vehicleTypes');
            }
            
            $data['vehicleTypeInfo'] = $this->vehicle_model->getVehicleTypeInfo($vehicleTypeId);           
            $this->global['pageTitle'] = 'Vehicle Type Edit';
            
            $this->loadViews("master/vehicle/editOldVehicleType", $this->global, $data, NULL);
    }

    /**
     * This function is used to edit vehicle Types
     */
    function editVehicleTysspe()
    {            
        $this->load->library('form_validation');
		$this->form_validation->set_rules('vehicle_type','Vehicle Type','required');

        $vehicleTypeId = $this->input->post('vehicleTypeId');

        if($this->form_validation->run() == FALSE)
        {
            $this->editOldVehicleType($vehicleTypeId);
        }
        else
        {
            $vehicle_type = $this->input->post('vehicle_type'); 
			$description = $this->input->post('description'); 

			$vehicleTypeInfo = array('type' => $vehicle_type, 'description' => $description, 'updatedBy' => $this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
                                
            $checkTax = $this->vehicle_model->checkVehicleTypeExist($vehicle_type, $vehicleTypeId);

                if($checkTax == false)
                {
                    $result = $this->vehicle_model->editVehicleType($vehicleTypeInfo, $vehicleTypeId);
            
                    if($result > 0)
                    {
                        $process = 'Vehicle Type Edit';
                        $processFunction = 'Manager/editVehicleType';
                        $this->logrecord($process,$processFunction);
                        $this->session->set_flashdata('success', 'Vehicle Type Edit successful');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Vehicle Type Edit failed');
                    }
                }
                else{
                    $this->session->set_flashdata('error', 'Vehicle Type already in record');
                }
                redirect('vehicleTypes');

            }
    }

    /**
     * This function is used to delete Vehicle Type
     */
    function deleteVehicleTypsse($id = NULL)
    {
		if($id == null)
		{
			redirect('vehicleTypes');
		}
		
		$dataArr = array(			
			'isDeleted' => 1,
			'updatedBy' => $this->vendorId,
			'updatedDtm'=>date('Y-m-d H:i:s')
		);		

		$result = $this->vehicle_model->deleteVehicleType($id, $dataArr);
		
		if ($result == TRUE) {
			 $process = 'Vehicle Type Delete';
			 $processFunction = 'Manager/deleteTax';
			 $this->logrecord($process,$processFunction);

			 $this->session->set_flashdata('success', 'Vehicle Type delete successful');
			}
		else
		{
			$this->session->set_flashdata('error', 'Vehicle Type delete failed');
		}
		redirect('vehicleTypes');
    }










    function vehicleTaxListings()
    {
        $data['mcdRecords'] = $this->vehicle_model->getMCDListings();
        $data['taxRecords'] = $this->vehicle_model->getTAXListings();

        $data['states'] = $this->master_model->getStateList();

        $process = 'All of Advance List';
        $processFunction = 'Manager/vehicleTaxListings';
        $this->logrecord($process, $processFunction);

        $this->global['pageTitle'] = 'All of Vehicle Types';

        $this->loadViews("master/vehicle/vehicleTaxListings", $this->global, $data, NULL);
    }

    /**
     * This function is used to load the add new Vehicle
     */
    function addNewVehicleTax()
    {
        $data['states'] = $this->master_model->getStateList();
        $this->global['pageTitle'] = 'Add New Advance';
        $this->loadViews("master/vehicle/addNewVehicleTax", $this->global, $data, NULL);
    }



    /**
     * This function is used to add new Tax to the system
     */
    function addNewVehicleTaxs()
    {
        $params = array();
        parse_str($_POST['invoiceData'], $params);

        if (empty($params)) {
            $resultsend['status'] = "error";
            $resultsend['message'] = "Please enter mandatory fields";
            echo json_encode($resultsend);
            die;
        }

        $mcdItemArray = array();

        if (isset($params['mcd_vendor_id']) && count($params['mcd_vendor_id']) > 0) {

            $mcditems = count($params['mcd_vendor_id']);
            for ($i = 0; $i < $mcditems; $i++) {

                $mcdInfo = array(
                    'vendor_id' => $params['mcd_vendor_id'][$i],
                    'vehicle_id' => $params['mcd_vendor_vehicle_id'][$i],
                    'vehicle_no' => $params['mcd_vehicle_id'][$i],
                    'state_id' => $params['mcd_state'][$i],
                    'type' => $params['mcd_type'][$i],
                    'amount' => $params['mcd_amount'][$i],
                    'start_date' => date('Y-m-d', strtotime($params['mcd_start_date'][$i])),
                    'end_date' => date('Y-m-d', strtotime($params['mcd_end_date'][$i])),
                    'statusId' => 1,
                    'createdBy' => $this->vendorId,
                    'createdDtm' => date('Y-m-d H:i:s')
                );

                array_push($mcdItemArray, $mcdInfo);
            }
            //pre($mcdItemArray);
            //die();
            $result = $this->vehicle_model->addNewVehicleMcds($mcdItemArray);
        }

        $taxItemArray = array();
        if (isset($params['tax_vendor_id']) && count($params['tax_vendor_id']) > 0) {

            $taxitems = count($params['tax_vendor_id']);
            for ($i = 0; $i < $taxitems; $i++) {

                $taxInfo = array(
                    'vendor_id' => $params['tax_vendor_id'][$i],
                    'vehicle_id' => $params['tax_vendor_vehicle_id'][$i],
                    'vehicle_no' => $params['tax_vehicle_id'][$i],
                    'state_id' => $params['tax_state'][$i],
                    'type' => $params['tax_type'][$i],
                    'amount' => $params['tax_amount'][$i],
                    'start_date' => date('Y-m-d', strtotime($params['tax_start_date'][$i])),
                    'end_date' => date('Y-m-d', strtotime($params['tax_end_date'][$i])),
                    'statusId' => 1,
                    'createdBy' => $this->vendorId,
                    'createdDtm' => date('Y-m-d H:i:s')
                );

                array_push($taxItemArray, $taxInfo);
            }
            // pre($taxItemArray);
            //die();
            $result = $this->vehicle_model->addNewVehicleTaxs($taxItemArray);
        }
        
        if ($result > 0) {
            $process = 'Create TAX';
            $processFunction = 'Manager/addNewVehicleTaxs';
            $this->logrecord($process, $processFunction);

            $resultsend['status'] = "success";
            $resultsend['message'] = "TAX's create successfully";
            echo json_encode($resultsend);
            die;
        } else {
            $resultsend['status'] = "error";
            $resultsend['message'] = "TAX's creation failed";
            echo json_encode($resultsend);
            die;
        }
    }




    function editOldVehicleTaxs($id = NULL)
    {
        if ($id == null) {
            redirect('addNewVehicleTax');
        }
        $data['states'] = $this->master_model->getStateList();
        $data['advance_list'] = $this->vehicle_model->getAdvanceInfoById($id);

        $this->global['pageTitle'] = 'Edit Advance';
        $this->loadViews("master/vehicle/addNewVehicleTax", $this->global, $data, NULL);
    }

    /**
     * This function is used to add new Tax to the system
     */
    function editVehicleTaxs()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        $this->form_validation->set_rules('advance_date', 'Date', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->editVehicleTaxs();
        } else {
            

            //$vendor_id = $this->input->post('vendor_id'); 
            //$vehicle_id = $this->input->post('vendor_vehicle_id');
            $amount = $this->input->post('amount');
            //$rate = $this->input->post('rate');				
            $advance_date = $this->input->post('advance_date');
            $statusId = $this->input->post('status');
            $description = $this->security->xss_clean($this->input->post('description'));

            $dataArr = array('amount' => $amount, 'advance_date' => $advance_date, 'description' => $description, 'statusId' => $statusId, 'updatedBy' => $this->vendorId, 'updatedDtm' => date('Y-m-d H:i:s'));

            //$data = array('vendor_id' => $vendor_id, 'vehicle_id' => $vehicle_id, 'amount' => $amount, 'advance_date' => $advance_date, 'rate' => $rate, 'description' => $description, 'statusId' => $statusId, 'createdBy' => $this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'));

            $result = $this->vehicle_model->editVehicleTaxs($id, $dataArr);

            if ($result > 0) {
                $process = 'Edit Vehicle';
                $processFunction = 'Manager/editVehicleTaxs';
                $this->logrecord($process, $processFunction);

                $this->session->set_flashdata('success', 'Advance updated successfully');
            } else {
                $this->session->set_flashdata('error', 'Advance updation failed');
            }

            redirect('addNewVehicleTax');
        }
    }

    /**
     * This function is used to delete Vehicle Type
     */
    function deleteVehicleMcd()
    {
        $id =  $this->input->post('id');

        $dataArr = array(
            'isDeleted' => 1,
            'updatedBy' => $this->vendorId,
            'updatedDtm' => date('Y-m-d H:i:s')
        );

        $result = $this->vehicle_model->deleteVehicleMcd($id, $dataArr);

        if ($result == TRUE) {
            $process = 'Vendor Delete';
            $processFunction = 'Manager/deleteVehicleMcd';
            $this->logrecord($process, $processFunction);

            echo 1;
        } else {
            echo 0;
        }
    }

    function deleteVehicleTaxs()
    {
        $id =  $this->input->post('id');

        $dataArr = array(
            'isDeleted' => 1,
            'updatedBy' => $this->vendorId,
            'updatedDtm' => date('Y-m-d H:i:s')
        );

        $result = $this->vehicle_model->deleteVehicleTaxs($id, $dataArr);

        if ($result == TRUE) {
            $process = 'Vendor Delete';
            $processFunction = 'Manager/deleteVehicleTaxs';
            $this->logrecord($process, $processFunction);

            echo 1;
        } else {
            echo 0;
        }
    }


    function editOldVehicleMcd($id = NULL)
    {
        if ($id == null) {
            redirect('vehicleTaxListings');
        }
        $data['states'] = $this->master_model->getStateList();
        $data['record'] = $this->vehicle_model->getMcdbyId($id);
        $this->global['pageTitle'] = 'MCD Edit';
        $this->loadViews("master/vehicle/editOldVehicleMcd", $this->global, $data, NULL);
    }
    function editVehicleMcd()
    {
        
        $this->load->library('form_validation');

        $this->form_validation->set_rules('state_id', 'State', 'required');
        $this->form_validation->set_rules('tax_type', 'Type', 'required');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('end_date', 'End Date', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        $this->form_validation->set_rules('status', 'State', 'required');

        $id = $this->input->post('id');

        

        if ($this->form_validation->run() == FALSE) {
            $this->editOldVehicleMcd($id);
        } else {

            $state_id = $this->input->post('state_id');
            $type = $this->input->post('tax_type');
            $amount = $this->input->post('amount');
            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');
            $statusId = $this->input->post('status');
            $id = $this->input->post('id');
            $start_date  = date('Y-m-d', strtotime($start_date));
            $end_date  = date('Y-m-d', strtotime($end_date));
        
            $info = array(
                'state_id' => $state_id,
                'type' => $type,
                'amount' => $amount,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'statusId' => $statusId,
                'updatedBy' => $this->vendorId,
                'updatedDtm' => date('Y-m-d H:i:s')
            );

            $result = $this->vehicle_model->editVehicleMcd($id, $info);

            if ($result > 0) {
                $process = 'Vehicle MCD Edit';
                $processFunction = 'Manager/editVehicleMcd';
                $this->logrecord($process, $processFunction);
                $this->session->set_flashdata('success', 'MCD Edit successful');
            } else {
                $this->session->set_flashdata('error', 'MCD Edit failed');
            }
            $this->editOldVehicleMcd($id);
        }
    }


    function editOldVehicleTax($id = NULL)
    {
        if ($id == null) {
            redirect('vehicleTaxListings');
        }
        $data['states'] = $this->master_model->getStateList();
        $data['record'] = $this->vehicle_model->getTaxbyId($id);
        $this->global['pageTitle'] = 'TAX Edit';
        $this->loadViews("master/vehicle/editOldVehicleTax", $this->global, $data, NULL);
    }
    function editVehicleTax()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('state_id', 'State', 'required');
        $this->form_validation->set_rules('tax_type', 'Type', 'required');
        $this->form_validation->set_rules('start_date', 'Start Date', 'required');
        $this->form_validation->set_rules('end_date', 'End Date', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        $this->form_validation->set_rules('status', 'State', 'required');

        $id = $this->input->post('id');

        if ($this->form_validation->run() == FALSE) {
            $this->editOldVehicleTax($id);
        } else {

            $state_id = $this->input->post('state_id');
            $type = $this->input->post('tax_type');
            $amount = $this->input->post('amount');
            $start_date = $this->input->post('start_date');
            $end_date = $this->input->post('end_date');
            $statusId = $this->input->post('status');
            $id = $this->input->post('id');
            $start_date  = date('Y-m-d', strtotime($start_date));
            $end_date  = date('Y-m-d', strtotime($end_date));

            $info = array(
                'state_id' => $state_id,
                'type' => $type,
                'amount' => $amount,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'statusId' => $statusId,
                'updatedBy' => $this->vendorId,
                'updatedDtm' => date('Y-m-d H:i:s')
            );


            $result = $this->vehicle_model->editVehicleTax($id, $info);

            if ($result > 0) {
                $process = 'Vehicle TAX Edit';
                $processFunction = 'Manager/editVehicleTax';
                $this->logrecord($process, $processFunction);
                $this->session->set_flashdata('success', 'TAX Edit successful');
            } else {
                $this->session->set_flashdata('error', 'TAX Edit failed');
            }
            $this->editOldVehicleTax($id);
        }
    }
	
	function cabListing()
    {
        $data['records'] = $this->vehicle_model->getCabListings();
        $data['minamountrecords'] = $this->vehicle_model->getMinAmountInfo();

		$process = 'All of Advance List';
		$processFunction = 'Manager/cabListing';
		$this->logrecord($process,$processFunction);

		$this->global['pageTitle'] = 'All of Cab/Vehicle Listings';
		
		$this->loadViews("master/vehicle/cabListings", $this->global, $data, NULL);
    }
	function addNewCab()
    {
		$this->global['pageTitle'] = 'Add New Cab/Vehicle';
		$this->loadViews("master/vehicle/addNewCab", $this->global, $data, NULL);
    }

    /**
     * This function is used to add new Tax to the system
     */
    function addNewCabs()
    {
       
        $this->load->library('form_validation'); 
        $this->form_validation->set_rules('vehicle_name','Vehicle Name','required|trim');
        $this->form_validation->set_rules('description','Description','required|trim');
        $this->form_validation->set_rules('passengers','Passengers','required|numeric');
		$this->form_validation->set_rules('luggage','Luggage','required|numeric');
		$this->form_validation->set_rules('start_fee','Start Fee','required|numeric');
		$this->form_validation->set_rules('fee_per_person','Fee Per Person','required|numeric');
        
                

        if($this->form_validation->run()!=1)
        {
           
            $this->addNewCab();
        }
        else
        {
            
            
            $vehicle_name = $this->security->xss_clean($this->input->post('vehicle_name')); 
            $description = $this->security->xss_clean($this->input->post('description'));
            $passengers = $this->security->xss_clean($this->input->post('passengers'));
            $luggage = $this->input->post('luggage');
            $start_fee = $this->input->post('start_fee');
			$fee_per_person = $this->input->post('fee_per_person');
			$image_path = $_FILES['upl_files0']['name'];
            

		//set preferences
            //file upload destination
            $upload_path = './upload/vehicle/images/';
            $config['upload_path'] = $upload_path;
            //allowed file types. * means all types
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|svg';
            //allowed max file size. 0 means unlimited file size
            $config['max_size'] = 1024;
            //max file name size
            $config['max_filename'] = '255';
            //whether file name should be encrypted or not
            $config['encrypt_name'] = TRUE;
            //store image info once uploaded
            $image_data = array();
            //check for errors
            $is_file_error = FALSE;
            //check if file was selected for upload

			//$config['max_width']            = 400;
			//$config['max_height']           = 400;
            
			if (!$is_file_error) 
			{	
              			
				//load the preferences
				$this->load->library('upload', $config);
				
				//check file successfully uploaded. 'image_name' is the name of the input
				if (!$this->upload->do_upload('upl_files0'))
				{
					//if file upload failed then catch the errors
					$error = array('status' => 'error', 'error' => $this->upload->display_errors());
					echo json_encode($error);
                    
				}
				else
				{
                    
					//store the file info
					$image_data = $this->upload->data();
					$config['image_library'] = 'gd2';
					$config['source_image'] = $image_data['full_path']; //get original image
					$config['maintain_ratio'] = TRUE;
					$config['width'] = 150;
					$config['height'] = 65;
					$this->load->library('image_lib', $config);

					if (!$this->image_lib->resize()) {
						$error = array('status' => 'error', 'error' => $this->upload->display_errors());
						echo json_encode($error);
					}
				}

				// There were errors, we have to delete the uploaded image
				if ($is_file_error) {
					if ($image_data) {
						$file = $upload_path . $image_data['file_name'];
						if (file_exists($file)) {
							unlink($file);
						}
					}
				} else {
					$data['resize_img'] = $upload_path . $image_data['file_name'];
					$savedata = array(
						'name' => $vehicle_name,
						'description' => $description,
						'passengers' => $passengers,
						'luggage' => $luggage,
						'start_fee' => $start_fee,
						'fee_per_person' => $fee_per_person,
						'vehicle_image' => $image_data['file_name'],
						'statusId' => 1, 
						'createdBy' => $this->vendorId, 
						'createdDtm'=>date('Y-m-d H:i:s')
					);
				}

			} 
               
            $checkVehicleType = $this->vehicle_model->checkCabVehicleExist($vehicle_name);
            
            if($checkVehicleType != 1)
            { 
                
				$params = array();
				
				
				foreach($_POST as $key => $value )
				{
                    
					$params[$key] = $this->input->post($key);
                   
                    
				}
               
                

				// parse_str($params[$key], $params);

              

				if (empty($params)) {
					//$resultsend['status'] = "error";
					//$resultsend['message'] = "Please enter mandatory fields";
					//echo json_encode($resultsend);
					$this->session->set_flashdata('error', 'Please enter mandatory fields');
					//die;
				}

              
               
				$result = $this->vehicle_model->addNewCab($savedata);
				
				$invoiceItemArray = array();
				$invoiceTotalAmount = 0.00;
                
				if (isset($params['cab_city_from']) && count($params['cab_city_from']) > 0) {
					$invoiceitems = count($params['cab_city_from']);
					for ($i = 0; $i < $invoiceitems; $i++) {

						$dataInvoiceArr = array();

						$dataInvoiceArr['cab_city_from'] = isset($params['cab_city_from'][$i]) ? $params['cab_city_from'][$i] : 0;
						$dataInvoiceArr['cab_city_to'] = isset($params['cab_city_to'][$i]) ? $params['cab_city_to'][$i] : 0;
						$dataInvoiceArr['cab_city_amount_one_way'] = isset($params['cab_city_amount_one_way'][$i]) ? $params['cab_city_amount_one_way'][$i] : 0.00;
						$dataInvoiceArr['cab_city_amount_two_way'] = isset($params['cab_city_amount_two_way'][$i]) ? $params['cab_city_amount_two_way'][$i] : 0.00;
						
						$dataInvoiceArr['cab_city_additional_amount'] = isset($params['cab_city_additional_amount'][$i]) ? $params['cab_city_additional_amount'][$i] : 0.00;
						$dataInvoiceArr['cab_city_time_amount'] = isset($params['cab_city_time_amount'][$i]) ? $params['cab_city_time_amount'][$i] : 0.00;
						
						
						
						$dataInvoiceArr['cab_city_driver_amount'] = isset($params['cab_city_driver_amount'][$i]) ? $params['cab_city_driver_amount'][$i] : 0;
						$dataInvoiceArr['cab_city_night_amount'] = isset($params['cab_city_night_amount'][$i]) ? $params['cab_city_night_amount'][$i] : 0;
						

						$ItemArray = array(
							"from" => $dataInvoiceArr['cab_city_from'],
							"to" => $dataInvoiceArr['cab_city_to'],
							"trip_type" => 'city',
							"price" => $dataInvoiceArr['cab_city_amount_one_way'],
							"two_pay_price" => $dataInvoiceArr['cab_city_amount_two_way'],
							"additional_km_fare" => $dataInvoiceArr['cab_city_additional_amount'],
							"additional_ride_time_fare" => $dataInvoiceArr['cab_city_time_amount'],
							"driver_allowance" => $dataInvoiceArr['cab_city_driver_amount'],
							"night_charges" => $dataInvoiceArr['cab_city_night_amount'],
							"cab_vehicle_id" => $result,
							"statusId" => 1,
							"createdBy" => $this->vendorId,
							"createdDtm" => date('Y-m-d H:i:s')
						);

						array_push($invoiceItemArray, $ItemArray);
					}
                   
					$result1 = $this->vehicle_model->addCabVehicleDetails($invoiceItemArray);
				}
				
				$invoiceItemArray = array();
				$invoiceTotalAmount = 0.00;
				if (isset($params['cab_airport_from']) && count($params['cab_airport_from']) > 0) {
					$invoiceitems = count($params['cab_airport_from']);
					for ($i = 0; $i < $invoiceitems; $i++) {

						$dataInvoiceArr = array();

						$dataInvoiceArr['cab_airport_from'] = isset($params['cab_airport_from'][$i]) ? $params['cab_airport_from'][$i] : 0;
						$dataInvoiceArr['cab_airport_to'] = isset($params['cab_airport_to'][$i]) ? $params['cab_airport_to'][$i] : 0;
						$dataInvoiceArr['cab_airport_amount'] = isset($params['cab_airport_amount'][$i]) ? $params['cab_airport_amount'][$i] : 0.00;
						$dataInvoiceArr['cab_airport_additional_amount'] = isset($params['cab_airport_additional_amount'][$i]) ? $params['cab_airport_additional_amount'][$i] : 0.00;
						$dataInvoiceArr['cab_airport_time_amount'] = isset($params['cab_airport_time_amount'][$i]) ? $params['cab_airport_time_amount'][$i] : 0.00;
						
						$ItemArray = array(
							"from" => $dataInvoiceArr['cab_airport_from'],
							"to" => $dataInvoiceArr['cab_airport_to'],
							"trip_type" => 'airport',
							"price" => $dataInvoiceArr['cab_airport_amount'],
							"additional_km_fare" => $dataInvoiceArr['cab_airport_additional_amount'],
							"additional_ride_time_fare" => $dataInvoiceArr['cab_airport_time_amount'],
							"cab_vehicle_id" => $result,
							"statusId" => 1,
							"createdBy" => $this->vendorId,
							"createdDtm" => date('Y-m-d H:i:s')
						);

						array_push($invoiceItemArray, $ItemArray);
					}
					$result1 = $this->vehicle_model->addCabVehicleDetails($invoiceItemArray);
				}
				
				
				$invoiceItemArray = array();
				$invoiceTotalAmount = 0.00;
				if (isset($params['cab_outstation_from']) && count($params['cab_outstation_from']) > 0) {
					$invoiceitems = count($params['cab_outstation_from']);
					for ($i = 0; $i < $invoiceitems; $i++) {

						$dataInvoiceArr = array();

						$dataInvoiceArr['cab_outstation_from'] = isset($params['cab_outstation_from'][$i]) ? $params['cab_outstation_from'][$i] : 0;
						$dataInvoiceArr['cab_outstation_to'] = isset($params['cab_outstation_to'][$i]) ? $params['cab_outstation_to'][$i] : 0;
						$dataInvoiceArr['cab_outstation_one_way_amount'] = isset($params['cab_outstation_one_way_amount'][$i]) ? $params['cab_outstation_one_way_amount'][$i] : 0.00;
						$dataInvoiceArr['cab_outstation_two_way_amount'] = isset($params['cab_outstation_two_way_amount'][$i]) ? $params['cab_outstation_two_way_amount'][$i] : 0.00;
						
						$dataInvoiceArr['cab_outstation_additional_amount'] = isset($params['cab_outstation_additional_amount'][$i]) ? $params['cab_outstation_additional_amount'][$i] : 0.00;
						$dataInvoiceArr['cab_outstation_time_amount'] = isset($params['cab_outstation_time_amount'][$i]) ? $params['cab_outstation_time_amount'][$i] : 0.00;
						
						
						$dataInvoiceArr['cab_outstation_driver_amount'] = isset($params['cab_outstation_driver_amount'][$i]) ? $params['cab_outstation_driver_amount'][$i] : 0;
						$dataInvoiceArr['cab_outstation_night_amount'] = isset($params['cab_outstation_night_amount'][$i]) ? $params['cab_outstation_night_amount'][$i] : 0;

						$ItemArray = array(
							"from" => $dataInvoiceArr['cab_outstation_from'],
							"to" => $dataInvoiceArr['cab_outstation_to'],
							"trip_type" => 'outstation',
							"price" => $dataInvoiceArr['cab_outstation_one_way_amount'],
							"two_pay_price" => $dataInvoiceArr['cab_outstation_two_way_amount'],
							"additional_km_fare" => $dataInvoiceArr['cab_outstation_additional_amount'],
							"additional_ride_time_fare" => $dataInvoiceArr['cab_outstation_time_amount'],
							"driver_allowance" => $dataInvoiceArr['cab_outstation_driver_amount'],
							"night_charges" => $dataInvoiceArr['cab_outstation_night_amount'],
							"cab_vehicle_id" => $result,
							"statusId" => 1,
							"createdBy" => $this->vendorId,
							"createdDtm" => date('Y-m-d H:i:s')
						);

						array_push($invoiceItemArray, $ItemArray);
					}
					$result1 = $this->vehicle_model->addCabVehicleDetails($invoiceItemArray);
				}
				
				$invoiceItemArray = array();
				$invoiceTotalAmount = 0.00;
				if (isset($params['cab_rental_from']) && count($params['cab_rental_from']) > 0) {
					$invoiceitems = count($params['cab_rental_from']);
					for ($i = 0; $i < $invoiceitems; $i++) {

						$dataInvoiceArr = array();

						$dataInvoiceArr['cab_rental_from'] = isset($params['cab_rental_from'][$i]) ? $params['cab_rental_from'][$i] : 0;
						$dataInvoiceArr['cab_rental_to'] = isset($params['cab_rental_to'][$i]) ? $params['cab_rental_to'][$i] : 0;
						$dataInvoiceArr['cab_rental_amount'] = isset($params['cab_rental_amount'][$i]) ? $params['cab_rental_amount'][$i] : 0.00;

						$dataInvoiceArr['cab_rental_driver_amount'] = isset($params['cab_rental_driver_amount'][$i]) ? $params['cab_rental_driver_amount'][$i] : 0;
						$dataInvoiceArr['cab_rental_night_amount'] = isset($params['cab_rental_night_amount'][$i]) ? $params['cab_rental_night_amount'][$i] : 0;
						$dataInvoiceArr['cab_rental_additional_amount'] = isset($params['cab_rental_additional_amount'][$i]) ? $params['cab_rental_additional_amount'][$i] : 0.00;
						$dataInvoiceArr['cab_rental_time_amount'] = isset($params['cab_rental_time_amount'][$i]) ? $params['cab_rental_time_amount'][$i] : 0.00;

						$ItemArray = array(
							"from" => $dataInvoiceArr['cab_rental_from'],
							"to" => $dataInvoiceArr['cab_rental_to'],
							"trip_type" => 'rental',
							"price" => $dataInvoiceArr['cab_rental_amount'],
							"driver_allowance" => $dataInvoiceArr['cab_rental_driver_amount'],
							"night_charges" => $dataInvoiceArr['cab_rental_night_amount'],
							"additional_km_fare" => $dataInvoiceArr['cab_rental_additional_amount'],
							"additional_ride_time_fare" => $dataInvoiceArr['cab_rental_time_amount'],
							"cab_vehicle_id" => $result,
							"pickup_type" => $params['cab_rental_pick'][$i],
							"statusId" => 1,
							"createdBy" => $this->vendorId,
							"createdDtm" => date('Y-m-d H:i:s')
						);

						array_push($invoiceItemArray, $ItemArray);
					}
					$result1 = $this->vehicle_model->addCabVehicleDetails($invoiceItemArray);
				}
            
                if($result > 0)
                {
                    $process = 'Add a Cab/Vehicle';
                    $processFunction = 'Manager/addNewVehicles';
                    $this->logrecord($process,$processFunction);

                    $this->session->set_flashdata('success', 'New Vehicle created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'New Vehicle creation failed');
                }
            }
            else{
                $this->session->set_flashdata('error', 'New Vehicle already in record');
            }
            
            redirect('addNewCab');
        }
    }

    function editOldCab($id = NULL)
    {
        if($id == null)
        {
            redirect('cabListing');
        }
        $data['vehicle_list'] = $this->vehicle_model->getCabInfoById($id);
		$data['vehicleCityRateList'] = $this->vehicle_model->vehicleRateList($id, 'city');
		$data['vehicleOutstationRateList'] = $this->vehicle_model->vehicleRateList($id, 'outstation');
		$data['vehicleRentalRateList'] = $this->vehicle_model->vehicleRateList($id, 'rental');
		$data['vehicleAirportRateList'] = $this->vehicle_model->vehicleRateList($id, 'airport');
        
        

       // echo $id;
		$this->global['pageTitle'] = 'Edit Vehicle';
		$this->loadViews("master/vehicle/editOldCab", $this->global, $data, NULL);
    }

     /**
     * This function is used to add new Tax to the system
     */
    function editCab()
    {
        $this->load->library('form_validation'); 
        $this->form_validation->set_rules('vehicle_name','Vehicle Name','required|trim');
        $this->form_validation->set_rules('description','Description','required|trim');
        $this->form_validation->set_rules('passengers','Passengers','required|numeric');
		$this->form_validation->set_rules('luggage','Luggage','required|numeric');
		$this->form_validation->set_rules('start_fee','Start Fee','required|numeric');
		$this->form_validation->set_rules('fee_per_person','Fee Per Person','required|numeric');
		
		$id = $this->input->post('id');
		//$cab_vehicle_id = $this->input->post('cab_vehicle_id');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->editOldCab($id);
        }
        else
        {
            
			$vehicle_name = $this->security->xss_clean($this->input->post('vehicle_name')); 
            $description = $this->security->xss_clean($this->input->post('description'));
            $passengers = $this->security->xss_clean($this->input->post('passengers'));
            $luggage = $this->input->post('luggage');
            $start_fee = $this->input->post('start_fee');
			$fee_per_person = $this->input->post('fee_per_person');
			$image_path = $_FILES['upl_files0']['name'];
            $statusId = 1;	

			
			
			if(!empty($image_path))
			{
			
				//set preferences
				//file upload destination
				$upload_path = './upload/vehicle/images/';
				$config['upload_path'] = $upload_path;
				//allowed file types. * means all types
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
				//allowed max file size. 0 means unlimited file size
				$config['max_size'] = 1024;
				//max file name size
				$config['max_filename'] = '255';
				//whether file name should be encrypted or not
				$config['encrypt_name'] = TRUE;
				//store image info once uploaded
				$image_data = array();
				//check for errors
				$is_file_error = FALSE;
				//check if file was selected for upload

				//$config['max_width']            = 400;
				//$config['max_height']           = 400;

				if (!$is_file_error) 
				{				
					//load the preferences
					$this->load->library('upload', $config);
					
					//check file successfully uploaded. 'image_name' is the name of the input
					if (!$this->upload->do_upload('upl_files0'))
					{
						//if file upload failed then catch the errors
						$error = array('status' => 'error', 'error' => $this->upload->display_errors());
						echo json_encode($error);
					}
					else
					{
						//store the file info
						$image_data = $this->upload->data();
						$config['image_library'] = 'gd2';
						$config['source_image'] = $image_data['full_path']; //get original image
						$config['maintain_ratio'] = TRUE;
						$config['width'] = 150;
						$config['height'] = 65;
						$this->load->library('image_lib', $config);

						if (!$this->image_lib->resize()) {
							$error = array('status' => 'error', 'error' => $this->upload->display_errors());
							echo json_encode($error);
						}
					}

					// There were errors, we have to delete the uploaded image
					if ($is_file_error) {
						if ($image_data) {
							$file = $upload_path . $image_data['file_name'];
							if (file_exists($file)) {
								unlink($file);
							}
						}
					} else {
						$data['resize_img'] = $upload_path . $image_data['file_name'];
						$dataArr['vehicle_image'] = $image_data['file_name'];
					}
				}
			}
			
			$dataArr['name'] = $vehicle_name;
			$dataArr['description'] = $description;
			$dataArr['passengers'] = $passengers;
			$dataArr['luggage'] = $luggage;
			$dataArr['start_fee'] = $start_fee;
			$dataArr['fee_per_person'] = $fee_per_person;
			$dataArr['statusId'] = 1;
			$dataArr['updatedBy'] = $this->vendorId;
			$dataArr['updatedDtm'] = date('Y-m-d H:i:s');
		
            $checkVehicleType = $this->vehicle_model->checkCabVehicleExist($vehicle_name, $id);

            if($checkVehicleType == false)
            { 
		
                $result = $this->vehicle_model->editCab($id, $dataArr);
				
				$dataDeleteArr = array(			
					'isDeleted' => 1,
					'updatedBy' => $this->vendorId,
					'updatedDtm' => date('Y-m-d H:i:s')
				);

                
				$this->vehicle_model->deleteCabRateDetails($id, $dataDeleteArr);
				

				$params = array();

				
				
				foreach($_POST as $key => $value )
				{
					$params[$key] = $this->input->post($key);
				}

                
               
				// parse_str($params[$key], $params);

                
				
				if (empty($params)) {
					//$resultsend['status'] = "error";
					//$resultsend['message'] = "Please enter mandatory fields";
					//echo json_encode($resultsend);
					$this->session->set_flashdata('error', 'Please enter mandatory fields');
					//die;
				}
				
				$invoiceItemArray = array();
				$invoiceTotalAmount = 0.00;
                
               

				if (isset($params['cab_city_from']) && count($params['cab_city_from']) > 0) {
					$invoiceitems = count($params['cab_city_from']);
					for ($i = 0; $i < $invoiceitems; $i++) {

						$dataInvoiceArr = array();

						$dataInvoiceArr['cab_city_from'] = isset($params['cab_city_from'][$i]) ? $params['cab_city_from'][$i] : 0;
						$dataInvoiceArr['cab_city_to'] = isset($params['cab_city_to'][$i]) ? $params['cab_city_to'][$i] : 0;
						$dataInvoiceArr['cab_city_amount_one_way'] = isset($params['cab_city_amount_one_way'][$i]) ? $params['cab_city_amount_one_way'][$i] : 0.00;
						$dataInvoiceArr['cab_city_amount_two_way'] = isset($params['cab_city_amount_two_way'][$i]) ? $params['cab_city_amount_two_way'][$i] : 0.00;
						
						
						$dataInvoiceArr['cab_city_additional_amount'] = isset($params['cab_city_additional_amount'][$i]) ? $params['cab_city_additional_amount'][$i] : 0.00;
						$dataInvoiceArr['cab_city_time_amount'] = isset($params['cab_city_time_amount'][$i]) ? $params['cab_city_time_amount'][$i] : 0.00;
						
						
						$dataInvoiceArr['cab_city_driver_amount'] = isset($params['cab_city_driver_amount'][$i]) ? $params['cab_city_driver_amount'][$i] : 0;
						$dataInvoiceArr['cab_city_night_amount'] = isset($params['cab_city_night_amount'][$i]) ? $params['cab_city_night_amount'][$i] : 0;

						$ItemArray = array(
							"from" => $dataInvoiceArr['cab_city_from'],
							"to" => $dataInvoiceArr['cab_city_to'],
							"trip_type" => 'city',
							"price" => $dataInvoiceArr['cab_city_amount_one_way'],
							"two_pay_price" => $dataInvoiceArr['cab_city_amount_two_way'],
							"additional_km_fare" => $dataInvoiceArr['cab_city_additional_amount'],
							"additional_ride_time_fare" => $dataInvoiceArr['cab_city_time_amount'],
							"driver_allowance" => $dataInvoiceArr['cab_city_driver_amount'],
							"driver_allowance" => $dataInvoiceArr['cab_city_driver_amount'],
							"night_charges" => $dataInvoiceArr['cab_city_night_amount'],
							"cab_vehicle_id" => $id,
							"statusId" => 1,
							"createdBy" => $this->vendorId,
							"createdDtm" => date('Y-m-d H:i:s')
						);

						array_push($invoiceItemArray, $ItemArray);
					}
                    
                   
                    
					$result1 = $this->vehicle_model->addCabVehicleDetails($invoiceItemArray);

                //     echo "<pre>";
                // print_r($result1);die;
				}
				
				$invoiceItemArray = array();
				$invoiceTotalAmount = 0.00;
				if (isset($params['cab_airport_from']) && count($params['cab_airport_from']) > 0) {
					$invoiceitems = count($params['cab_airport_from']);
					for ($i = 0; $i < $invoiceitems; $i++) {

						$dataInvoiceArr = array();

						$dataInvoiceArr['cab_airport_from'] = isset($params['cab_airport_from'][$i]) ? $params['cab_airport_from'][$i] : 0;
						$dataInvoiceArr['cab_airport_to'] = isset($params['cab_airport_to'][$i]) ? $params['cab_airport_to'][$i] : 0;
						$dataInvoiceArr['cab_airport_amount'] = isset($params['cab_airport_amount'][$i]) ? $params['cab_airport_amount'][$i] : 0.00;

						$dataInvoiceArr['cab_airport_additional_amount'] = isset($params['cab_airport_additional_amount'][$i]) ? $params['cab_airport_additional_amount'][$i] : 0.00;
						$dataInvoiceArr['cab_airport_time_amount'] = isset($params['cab_airport_time_amount'][$i]) ? $params['cab_airport_time_amount'][$i] : 0.00;
						
						

						$ItemArray = array(
							"from" => $dataInvoiceArr['cab_airport_from'],
							"to" => $dataInvoiceArr['cab_airport_to'],
							"trip_type" => 'airport',
							"price" => $dataInvoiceArr['cab_airport_amount'],
							"additional_km_fare" => $dataInvoiceArr['cab_airport_additional_amount'],
							"additional_ride_time_fare" => $dataInvoiceArr['cab_airport_time_amount'],
							"cab_vehicle_id" => $id,
							"statusId" => 1,
							"createdBy" => $this->vendorId,
							"createdDtm" => date('Y-m-d H:i:s')
						);

						array_push($invoiceItemArray, $ItemArray);
					}

                   

					$result1 = $this->vehicle_model->addCabVehicleDetails($invoiceItemArray);
				}
				
				$invoiceItemArray = array();
				$invoiceTotalAmount = 0.00;
				if (isset($params['cab_outstation_from']) && count($params['cab_outstation_from']) > 0) {
					$invoiceitems = count($params['cab_outstation_from']);
					for ($i = 0; $i < $invoiceitems; $i++) {

						$dataInvoiceArr = array();

						$dataInvoiceArr['cab_outstation_from'] = isset($params['cab_outstation_from'][$i]) ? $params['cab_outstation_from'][$i] : 0;
						$dataInvoiceArr['cab_outstation_to'] = isset($params['cab_outstation_to'][$i]) ? $params['cab_outstation_to'][$i] : 0;
						$dataInvoiceArr['cab_outstation_one_way_amount'] = isset($params['cab_outstation_one_way_amount'][$i]) ? $params['cab_outstation_one_way_amount'][$i] : 0.00;
						$dataInvoiceArr['cab_outstation_two_way_amount'] = isset($params['cab_outstation_two_way_amount'][$i]) ? $params['cab_outstation_two_way_amount'][$i] : 0.00;
						
						$dataInvoiceArr['cab_outstation_additional_amount'] = isset($params['cab_outstation_additional_amount'][$i]) ? $params['cab_outstation_additional_amount'][$i] : 0.00;
						$dataInvoiceArr['cab_outstation_time_amount'] = isset($params['cab_outstation_time_amount'][$i]) ? $params['cab_outstation_time_amount'][$i] : 0.00;
						
						
						$dataInvoiceArr['cab_outstation_driver_amount'] = isset($params['cab_outstation_driver_amount'][$i]) ? $params['cab_outstation_driver_amount'][$i] : 0;
						$dataInvoiceArr['cab_outstation_night_amount'] = isset($params['cab_outstation_night_amount'][$i]) ? $params['cab_outstation_night_amount'][$i] : 0;

						$ItemArray = array(
							"from" => $dataInvoiceArr['cab_outstation_from'],
							"to" => $dataInvoiceArr['cab_outstation_to'],
							"trip_type" => 'outstation',
							"price" => $dataInvoiceArr['cab_outstation_one_way_amount'],
							"two_pay_price" => $dataInvoiceArr['cab_outstation_two_way_amount'],
							"additional_km_fare" => $dataInvoiceArr['cab_outstation_additional_amount'],
							"additional_ride_time_fare" => $dataInvoiceArr['cab_outstation_time_amount'],
							"driver_allowance" => $dataInvoiceArr['cab_outstation_driver_amount'],
							"night_charges" => $dataInvoiceArr['cab_outstation_night_amount'],
							"cab_vehicle_id" => $id,
							"statusId" => 1,
							"createdBy" => $this->vendorId,
							"createdDtm" => date('Y-m-d H:i:s')
						);

						array_push($invoiceItemArray, $ItemArray);
					}
					$result1 = $this->vehicle_model->addCabVehicleDetails($invoiceItemArray);
				}
				
				$invoiceItemArray = array();
				$invoiceTotalAmount = 0.00;
				if (isset($params['cab_rental_from']) && count($params['cab_rental_from']) > 0) {
					$invoiceitems = count($params['cab_rental_from']);
					for ($i = 0; $i < $invoiceitems; $i++) {

						$dataInvoiceArr = array();

						$dataInvoiceArr['cab_rental_from'] = isset($params['cab_rental_from'][$i]) ? $params['cab_rental_from'][$i] : 0;
						$dataInvoiceArr['cab_rental_to'] = isset($params['cab_rental_to'][$i]) ? $params['cab_rental_to'][$i] : 0;
						$dataInvoiceArr['cab_rental_amount'] = isset($params['cab_rental_amount'][$i]) ? $params['cab_rental_amount'][$i] : 0.00;

						$dataInvoiceArr['cab_rental_driver_amount'] = isset($params['cab_rental_driver_amount'][$i]) ? $params['cab_rental_driver_amount'][$i] : 0;
						$dataInvoiceArr['cab_rental_night_amount'] = isset($params['cab_rental_night_amount'][$i]) ? $params['cab_rental_night_amount'][$i] : 0;
						$dataInvoiceArr['cab_rental_additional_amount'] = isset($params['cab_rental_additional_amount'][$i]) ? $params['cab_rental_additional_amount'][$i] : 0.00;
						$dataInvoiceArr['cab_rental_time_amount'] = isset($params['cab_rental_time_amount'][$i]) ? $params['cab_rental_time_amount'][$i] : 0.00;

						$ItemArray = array(
							"from" => $dataInvoiceArr['cab_rental_from'],
							"to" => $dataInvoiceArr['cab_rental_to'],
							"trip_type" => 'rental',
							"price" => $dataInvoiceArr['cab_rental_amount'],
							"driver_allowance" => $dataInvoiceArr['cab_rental_driver_amount'],
							"night_charges" => $dataInvoiceArr['cab_rental_night_amount'],
							"additional_km_fare" => $dataInvoiceArr['cab_rental_additional_amount'],
							"additional_ride_time_fare" => $dataInvoiceArr['cab_rental_time_amount'],
							"cab_vehicle_id" => $id,
							"pickup_type" => $params['cab_rental_pick'][$i],
							"statusId" => 1,
							"createdBy" => $this->vendorId,
							"createdDtm" => date('Y-m-d H:i:s')
						);

						array_push($invoiceItemArray, $ItemArray);
					}
					$result1 = $this->vehicle_model->addCabVehicleDetails($invoiceItemArray);
				}
            
                if($result > 0)
                {
                    $process = 'Edit Vehicle';
                    $processFunction = 'Manager/editCab';
                    $this->logrecord($process,$processFunction);

                    $this->session->set_flashdata('success', 'New Cab/Vehicle created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'New Cab/Vehicle creation failed');
                }
            }
            else{
                
                $this->session->set_flashdata('error', 'New Cab/Vehicle already in record');
            }
            
            
            redirect('cabListing');
        }
    }

     /**
     * This function is used to delete Vehicle Type
     */
    function deleteCab()
    {
		$id =  $this->input->post('id');
		
		if($id == null)
		{
			redirect('cabListing');
		}
		
		$dataArr = array(			
			'isDeleted' => 1,
			'updatedBy' => $this->vendorId,
			'updatedDtm'=>date('Y-m-d H:i:s')
		);		

		$result = $this->vehicle_model->deleteCab($id, $dataArr);
		
		if ($result == TRUE) {
			 $process = 'Vehicle Delete';
			 $processFunction = 'Manager/deleteCab';
			 $this->logrecord($process,$processFunction);

			 echo 1;
			}
		else
		{
			echo 0;
		}
    }


    function addMinAmount()
    {
        $data = array();
        $this->global['pageTitle'] = 'Add Minimum Amount';
        $this->loadViews("master/vehicle/addMinAmount", $this->global, $data, NULL);
    }

    /**
     * This function is used to add new Tax to the system
     */
    function addMinAmounts()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('price', 'Minimum Amount', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->addMinAmount();
        } else {
            $price = $this->input->post('price');
            $statusId = 1;

            $taxInfo = array('price' => $price, 'statusId' => $statusId, 'createdBy' => $this->vendorId, 'createdDtm' => date('Y-m-d H:i:s'));

            $check = $this->vehicle_model->checkMinAmountExist();

            if ($check == false) {
                $result = $this->vehicle_model->addMinAmounts($taxInfo);

                if ($result > 0) {
                    $process = 'Add Min Amount';
                    $processFunction = 'vehicle/addMinAmounts';
                    $this->logrecord($process, $processFunction);

                    $this->session->set_flashdata('success', 'Minimum amount created successfully');
                } else {
                    $this->session->set_flashdata('error', 'Minimum amount creation failed');
                }
            } else {
                $this->session->set_flashdata('error', 'Minimum amount already in record');
            }

            redirect('cabListing');
        }
    }

    /**
     * This function is used to open edit taxs view
     */
    function editOldMinAmount($id = NULL)
    {
        if ($id == null) {
            redirect('cabListing');
        }

        $data['info'] = $this->vehicle_model->getMinAmount($id);
        $this->global['pageTitle'] = 'Minimum Amount Edit';
        $this->loadViews("master/vehicle/editOldMinAmount", $this->global, $data, NULL);
    }

    /**
     * This function is used to edit taxs
     */
    function editMinAmount()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('price', 'Minimum Amount', 'required|numeric');

        $id = $this->input->post('id');

        if ($this->form_validation->run() == FALSE) {
            $this->editOldMinAmount($id);
        } else {
            $price = $this->input->post('price');
            $statusId = 1;

            $taxInfo = array(
                'price' => $price, 'statusId' => $statusId, 'updatedBy' => $this->vendorId,
                'updatedDtm' => date('Y-m-d H:i:s')
            );

            $result = $this->vehicle_model->editMinAmount($taxInfo, $id);

            if ($result > 0) {
                $process = 'Service Tax Edit';
                $processFunction = 'vehicle/editMinAmount';
                $this->logrecord($process, $processFunction);
                $this->session->set_flashdata('success', 'Minimum amount edit successful');
            } else {
                $this->session->set_flashdata('error', 'Minimum amount edit failed');
            }
            redirect('cabListing');
        }
    }













	
}

?>