<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Bharat Verma / bharatverma.verma@gmail.com
 * @version : 1.0
 * @since : 27.02.2018
 */
class Company extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
		$this->load->model('master_model');
        $this->load->model('company_model');
		$this->load->model('vehicle_model');
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
    function companyListing()
    {
		$data['companyRecords'] = $this->company_model->companyList();
		$process = 'All list of company';
		$processFunction = 'Manager/companyListing';
		$this->logrecord($process,$processFunction);

		$this->global['pageTitle'] = 'All of Companies';            
		$this->loadViews("master/company/companyListing", $this->global, $data, NULL);
    }


    /**
     * This function is used to load the add new Tax
     */
    function addNewCompany()
    {
		$this->load->model('zone_model');
		$data['states'] = $this->master_model->getStateList();
		$data['zoneList'] = $this->zone_model->getAllZoneList();
		$data['vehicleTypes'] = $this->vehicle_model->getVehicleTypeList();
		$this->global['pageTitle'] = 'Add newc ompany';
		$this->loadViews("master/company/addNewCompany", $this->global, $data, NULL);
    }


     /**
     * This function is used to add new Tax to the system
     */
    function addNewCompanies()
    {
		
		
		$params = array();
		parse_str($_POST['companyData'], $params);
		
		if (empty($params)) {
			$resultsend['status'] = "error";
			$resultsend['message'] = "Please enter mandatory fields";
			echo json_encode($resultsend);
			die;
		}

		$company_name = $this->security->xss_clean($params['company_name']);
		$contact_person = $this->security->xss_clean($params['contact_person']);
		$email = $this->security->xss_clean($params['email']);
		$mobile = $this->security->xss_clean($params['mobile']);
		$landline = $params['landline'];
		$pan = isset($params['pan'])?strtoupper($params['pan']):'';
		$gstin = isset($params['gstin'])?strtoupper($params['gstin']):'';
		$pincode = $params['pincode'];
		$address = $this->security->xss_clean($params['address']);
		$city = $this->security->xss_clean($params['city']);
		$state = $params['state'];
		$mcd_tax = $params['mcd_tax'];
		$state_tax = $params['state_tax'];
		$mcd_amount = $params['mcd_amount'];
		$state_tax_amount = $params['state_tax_amount'];
		$bank_name = '';
		$account_number = '';
		$branch_name = '';
		$ifsc_code = '';
	
	
		$companyInfo = array(
				'company_name' => ucwords(strtolower($company_name)),
				'contact_person' => $contact_person,
				'email' => strtolower($email),
				'mobile' => $mobile,
				'pan' => $pan,
				'gstin' => $gstin,
				'pincode' => $pincode,
				'address' => $address,
				'city' => $city,
				'state' => $state,
				'landline' => $landline,
				'mcd_tax' => $mcd_tax,
				'state_tax' => $state_tax,
				'mcd_amount' => $mcd_amount,
				'state_tax_amount' => $state_tax_amount,
				'bank_name' => $bank_name,
				'account_number' => $account_number,
				'branch_name' => $branch_name,
				'ifsc_code' => $ifsc_code,					
				'statusId' => 1,
				'createdBy' => $this->vendorId,
				'createdDtm'=>date('Y-m-d H:i:s')
			);
			
		$invoiceItemArray = array();
		$invoiceTotalAmount = 0.00;
		
		if(isset($params['company_zone']) && count($params['company_zone']) > 0) {

			$invoiceitems = count($params['company_zone']);
			for($i=0; $i < $invoiceitems; $i++) {

				$dataInvoiceArr = array();
				$dataInvoiceArr['vehicle_type'] = isset($params['vehicle_type'][$i]) ? $params['vehicle_type'][$i] : '';
				$dataInvoiceArr['company_zone'] = isset($params['company_zone'][$i]) ? $params['company_zone'][$i] : '';
				$dataInvoiceArr['company_zone_type'] = isset($params['company_zone_type'][$i]) ? $params['company_zone_type'][$i] : '0';
				$dataInvoiceArr['company_cab_rate'] = isset($params['company_cab_rate'][$i]) ? $params['company_cab_rate'][$i] : '0';
				$dataInvoiceArr['company_guard'] = isset($params['company_guard'][$i]) ? $params['company_guard'][$i] : '0';
				$dataInvoiceArr['company_guard_rate'] = isset($params['company_guard_rate'][$i]) ? $params['company_guard_rate'][$i] : '0';

				$ItemArray = array(
					"vehicle_type_id" => $dataInvoiceArr['vehicle_type'],
					"zone" => $dataInvoiceArr['company_zone'],
					"zone_type" => $dataInvoiceArr['company_zone_type'],
					"cab_rate" => $dataInvoiceArr['company_cab_rate'],
					"guard" => $dataInvoiceArr['company_guard'],
					"guard_price" => $dataInvoiceArr['company_guard_rate'],
					"statusId" => 1,
					"createdBy" => $this->vendorId,
					"createdDtm" => date('Y-m-d H:i:s')
				);

				array_push($invoiceItemArray, $ItemArray);

			}
		}
		
		$cabItemArray = array();	
		if(isset($params['company_cab_vehicle_type']) && count($params['company_cab_vehicle_type']) > 0) {

			$invoiceitems = count($params['company_cab_vehicle_type']);
			for($i=0; $i < $invoiceitems; $i++) {

				$dataInvoiceArr = array();
				$dataInvoiceArr['vehicle_type'] = isset($params['company_cab_vehicle_type'][$i]) ? $params['company_cab_vehicle_type'][$i] : '';
				$dataInvoiceArr['cab_zone'] = isset($params['company_cab_zone'][$i]) ? $params['company_cab_zone'][$i] : '';
				$dataInvoiceArr['rate_km'] = isset($params['company_cab_rate_km'][$i]) ? $params['company_cab_rate_km'][$i] : '0';
				$dataInvoiceArr['rate_flat'] = isset($params['company_cab_rate_flat'][$i]) ? $params['company_cab_rate_flat'][$i] : '0';
				$dataInvoiceArr['night_charge'] = isset($params['company_cab_night_charge'][$i]) ? $params['company_cab_night_charge'][$i] : '0';
				$dataInvoiceArr['toll_tax'] = isset($params['company_cab_toll_tax'][$i]) ? $params['company_cab_toll_tax'][$i] : '0';
				$dataInvoiceArr['extra'] = isset($params['company_cab_extra'][$i]) ? $params['company_cab_extra'][$i] : '0';

				$cabArray = array(
					"vehicle_type_id" => $dataInvoiceArr['vehicle_type'],
					"zone_id" => $dataInvoiceArr['cab_zone'],
					"rate_km" => $dataInvoiceArr['rate_km'],
					"rate_flat" => $dataInvoiceArr['rate_flat'],
					"night_charge" => $dataInvoiceArr['night_charge'],
					"toll_tax" => $dataInvoiceArr['toll_tax'],
					"extra" => $dataInvoiceArr['extra'],
					"statusId" => 1,
					"createdBy" => $this->vendorId,
					"createdDtm" => date('Y-m-d H:i:s')
				);

				array_push($cabItemArray, $cabArray);

			}
		}
		
		$checkCompanyExist = $this->company_model->checkCompanyExist($company_name, $pan);

		if($checkCompanyExist == false)
		{				
			$result = $this->company_model->addNewCompanies($companyInfo);
                
			if($result > 0)
			{
				$process = 'Create New Company';
				$processFunction = 'Company/addNewCompanies';
				$this->logrecord($process,$processFunction);
				
				$processedInvoiceItemArray = array();
				foreach($invoiceItemArray as $itemArr) {

					$itemArr['company_id'] = $result;
					array_push($processedInvoiceItemArray, $itemArr);
				}
				
				$this->company_model->addNewCompanyRateDetails($processedInvoiceItemArray);
				
				if(!empty($cabItemArray))
				{
					$processedCabItemArray = array();
					foreach($cabItemArray as $cabitemArr) {

						$cabitemArr['company_id'] = $result;
						array_push($processedCabItemArray, $cabitemArr);
					}
					$this->company_model->addNewCompanyCabRate($processedCabItemArray);
				}
				
				$resultsend['status'] = "success";
				$resultsend['message'] = "Company create successfully";
				echo json_encode($resultsend);
				die;
			}
			else
			{
				$resultsend['status'] = "error";
				$resultsend['message'] = "Company creation failed";
				echo json_encode($resultsend);
				die;
			}
		}
		else{
			$resultsend['status'] = "error";
			$resultsend['message'] = "Company already in record";
			echo json_encode($resultsend);
			die;
		}
	}

    /**
     * This function is used to open edit taxs view
     */
    function editOldCompany($id = NULL)
    {
		if($id == null)
		{
			redirect('companyListing');
		}
		//getAttachedZoneListById($zone_id)
		$this->load->model('zone_model');
		$data['states'] = $this->master_model->getStateList();
		$data['zoneList'] = $this->zone_model->getAllZoneList();
		//$data['zoneTypeList'] = $this->zone_model->getZoneTypes();
		$data['vehicleTypes'] = $this->vehicle_model->getVehicleTypeList();
		$data['companyInfo'] = $this->company_model->getCompanyInfo($id);
		$data['companyRateList'] = $this->company_model->getCompanyRateById($id);
		$data['companyCabRateList'] = $this->company_model->getCompanyRateFullDayById($id);

		$this->global['pageTitle'] = 'Company Edit';
		
		$this->loadViews("master/company/editOldCompany", $this->global, $data, NULL);
    }

    /**
     * This function is used to edit taxs
     */
    function editCompany()
    {           
        $params = array();
		parse_str($_POST['companyData'], $params);
		
		if (empty($params)) {
			$resultsend['status'] = "error";
			$resultsend['message'] = "Please enter mandatory fields";
			echo json_encode($resultsend);
			die;
		}
	
		$id = $params['companyId'];
		
		$company_name = $this->security->xss_clean($params['company_name']);
		$contact_person = $this->security->xss_clean($params['contact_person']);
		$email = $this->security->xss_clean($params['email']);
		$mobile = $this->security->xss_clean($params['mobile']);
		$landline = $params['landline'];
		$pan = isset($params['pan'])?strtoupper($params['pan']):'';
		$gstin = isset($params['gstin'])?strtoupper($params['gstin']):'';
		$pincode = $params['pincode'];
		$address = $this->security->xss_clean($params['address']);
		$city = $this->security->xss_clean($params['city']);
		$state = $params['state'];
		$mcd_tax = $params['mcd_tax'];
		$state_tax = $params['state_tax'];
		$mcd_amount = $params['mcd_amount'];
		$state_tax_amount = $params['state_tax_amount'];
		$bank_name = '';
		$account_number = '';
		$branch_name = '';
		$ifsc_code = '';
	
	
		$companyInfo = array(
			'company_name' => ucwords(strtolower($company_name)),
			'contact_person' => $contact_person,
			'email' => strtolower($email),
			'mobile' => $mobile,
			'pan' => $pan,
			'gstin' => $gstin,
			'pincode' => $pincode,
			'address' => $address,
			'city' => $city,
			'state' => $state,
			'mcd_tax' => $mcd_tax,
			'state_tax' => $state_tax,
			'mcd_amount' => $mcd_amount,
			'state_tax_amount' => $state_tax_amount,
			'landline' => $landline,
			'bank_name' => $bank_name,
			'account_number' => $account_number,
			'branch_name' => $branch_name,
			'ifsc_code' => $ifsc_code,					
			'statusId' => 1,
			'updatedBy' => $this->vendorId,
			'updatedDtm'=>date('Y-m-d H:i:s')
		);
			
		$invoiceItemArray = array();
		$invoiceTotalAmount = 0.00;
		if(isset($params['company_zone']) && count($params['company_zone']) > 0) {

			$invoiceitems = count($params['company_zone']);
			for($i=0; $i < $invoiceitems; $i++) {

				$dataInvoiceArr = array();
				$dataInvoiceArr['vehicle_type'] = isset($params['vehicle_type'][$i]) ? $params['vehicle_type'][$i] : '';
				$dataInvoiceArr['company_zone'] = isset($params['company_zone'][$i]) ? $params['company_zone'][$i] : '';
				$dataInvoiceArr['company_zone_type'] = isset($params['company_zone_type'][$i]) ? $params['company_zone_type'][$i] : '0';
				$dataInvoiceArr['company_cab_rate'] = isset($params['company_cab_rate'][$i]) ? $params['company_cab_rate'][$i] : '0.00';
				$dataInvoiceArr['company_guard'] = isset($params['company_guard'][$i]) ? $params['company_guard'][$i] : '0';
				$dataInvoiceArr['company_guard_rate'] = isset($params['company_guard_rate'][$i]) ? $params['company_guard_rate'][$i] : '0.00';

				$ItemArray = array(
					"vehicle_type_id" => $dataInvoiceArr['vehicle_type'],
					"zone" => $dataInvoiceArr['company_zone'],
					"zone_type" => $dataInvoiceArr['company_zone_type'],
					"cab_rate" => $dataInvoiceArr['company_cab_rate'],
					"guard" => $dataInvoiceArr['company_guard'],
					"guard_price" => $dataInvoiceArr['company_guard_rate'],
					"statusId" => 1,
					"createdBy" => $this->vendorId,
					"createdDtm" => date('Y-m-d H:i:s')
				);

				array_push($invoiceItemArray, $ItemArray);

			}
		}
		
		$cabItemArray = array();	
		if(isset($params['company_cab_vehicle_type']) && count($params['company_cab_vehicle_type']) > 0) {

			$invoiceitems = count($params['company_cab_vehicle_type']);
			for($i=0; $i < $invoiceitems; $i++) {

				$dataInvoiceArr = array();
				$dataInvoiceArr['vehicle_type'] = isset($params['company_cab_vehicle_type'][$i]) ? $params['company_cab_vehicle_type'][$i] : '';
				$dataInvoiceArr['cab_zone'] = isset($params['company_cab_zone'][$i]) ? $params['company_cab_zone'][$i] : '';
				$dataInvoiceArr['rate_km'] = isset($params['company_cab_rate_km'][$i]) ? $params['company_cab_rate_km'][$i] : '0.00';
				$dataInvoiceArr['rate_flat'] = isset($params['company_cab_rate_flat'][$i]) ? $params['company_cab_rate_flat'][$i] : '0.00';
				$dataInvoiceArr['night_charge'] = isset($params['company_cab_night_charge'][$i]) ? $params['company_cab_night_charge'][$i] : '0';
				$dataInvoiceArr['toll_tax'] = isset($params['company_cab_toll_tax'][$i]) ? $params['company_cab_toll_tax'][$i] : '0.00';
				$dataInvoiceArr['extra'] = isset($params['company_cab_extra'][$i]) ? $params['company_cab_extra'][$i] : '0.00';

				$cabArray = array(
					"vehicle_type_id" => $dataInvoiceArr['vehicle_type'],
					"zone_id" => $dataInvoiceArr['cab_zone'],
					"rate_km" => $dataInvoiceArr['rate_km'],
					"rate_flat" => $dataInvoiceArr['rate_flat'],
					"night_charge" => $dataInvoiceArr['night_charge'],
					"toll_tax" => $dataInvoiceArr['toll_tax'],
					"extra" => $dataInvoiceArr['extra'],
					"statusId" => 1,
					"createdBy" => $this->vendorId,
					"createdDtm" => date('Y-m-d H:i:s')
				);

				array_push($cabItemArray, $cabArray);

			}
		}
		
		$checkCompanyExist = $this->company_model->checkCompanyExist($company_name, $pan, $id);

		if($checkCompanyExist == false)
		{
			$result = $this->company_model->editCompany($id, $companyInfo);
  
			if($id > 0)
			{
				$process = 'Edit Company';
				$processFunction = 'Company/editCompany';
				$this->logrecord($process,$processFunction);
				
				$processedInvoiceItemArray = array();
				foreach($invoiceItemArray as $itemArr) {

					$itemArr['company_id'] = $id;
					array_push($processedInvoiceItemArray, $itemArr);
				}
				
				$this->company_model->deleteCompanyRateDetails($id);
				$result = $this->company_model->addNewCompanyRateDetails($processedInvoiceItemArray);
				
				if(!empty($cabItemArray))
				{
					$processedCabItemArray = array();
					foreach($cabItemArray as $cabitemArr) {

						$cabitemArr['company_id'] = $id;
						array_push($processedCabItemArray, $cabitemArr);
					}
					$this->company_model->deleteCompanyCabRate($id);
					$this->company_model->addNewCompanyCabRate($processedCabItemArray);
				}
				
				$resultsend['status'] = "success";
				$resultsend['message'] = "Company edit successfully";
				echo json_encode($resultsend);
				die;
			}
			else
			{
				$resultsend['status'] = "error";
				$resultsend['message'] = "Company update failed";
				echo json_encode($resultsend);
				die;
			}
		}
		else{
			$resultsend['status'] = "error";
			$resultsend['message'] = "Company already in record";
			echo json_encode($resultsend);
			die;
		}

		redirect('companyListing');

    }

    /**
     * This function is used to delete taxs
     */
    function deleteCompany()
    {
		$id = $this->input->post('id');
        if($id == null)
		{
			redirect('companyListing');
		}
		
		$companyInfo = array(			
			'isDeleted' => 1,
			'updatedBy' => $this->vendorId,
			'updatedDtm'=>date('Y-m-d H:i:s')
		);

		$result = $this->company_model->deleteCompany($id, $companyInfo);
		
		if ($result > 0) {
			 $process = 'Company Delete';
			 $processFunction = 'Manager/deleteCompany';
			 $this->logrecord($process,$processFunction);

			 echo 1;
			}
		else
		{
			echo 0;
		}
    }
	
	
	/**
     * This function used to show Tax
     */
    function companyBranchListing()
    {
		$data['branchRecords'] = $this->company_model->getBranchList();
		$process = 'All list of company branch';
		$processFunction = 'Manager/companyBranchListing';
		$this->logrecord($process,$processFunction);

		$this->global['pageTitle'] = 'All of branches';            
		$this->loadViews("master/company/companyBranchListing", $this->global, $data, NULL);
    }
	
	/**
     * This function is used to load the add new Tax
     */
    function addNewCompanyBranch()
    {
		$data['companyList'] = $this->company_model->companyList();
		$data['states'] = $this->master_model->getStateList();
		$this->global['pageTitle'] = ' Add a Company Branch';
		$this->loadViews("master/company/addNewCompanyBranch", $this->global, $data, NULL);
    }
	/**
     * This function is used to add new Tax to the system
     */
    function addNewBranch()
    {
		$this->load->library('form_validation');		
		
		$this->form_validation->set_rules('company_id','Company Name','required|numeric');
		$this->form_validation->set_rules('name','Branch Name','trim|required');
		$this->form_validation->set_rules('state','State','required');
		//$this->form_validation->set_rules('mobile','Mobile','required|numeric');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->addNewCompanyBranch();
		}
		else
		{
			$company_id = $this->input->post('company_id');
			$name = $this->security->xss_clean($this->input->post('name'));
			$contact_person = $this->security->xss_clean($this->input->post('contact_person'));
			$email = $this->security->xss_clean($this->input->post('email'));
			$mobile = $this->security->xss_clean($this->input->post('mobile'));
			$landline = $this->input->post('landline');
			
			//$pan = $this->input->post('pan');
			//$gstin = $this->input->post('gstin');
			
			$pincode = $this->input->post('pincode');
			$address = $this->security->xss_clean($this->input->post('address'));
			$city = $this->security->xss_clean($this->input->post('city'));
			$state = $this->input->post('state');			
			$statusId = 1;
			
			$companyInfo = array(
				'company_id' => $company_id,
				'name' => ucwords(strtolower($name)),
				'contact_person' => $contact_person,
				'email' => strtolower($email),
				'mobile' => $mobile,
				//'pan' => strtoupper($pan),
				//'gstin' => strtoupper($gstin),
				'pincode' => $pincode,
				'address' => $address,
				'city' => $city,
				'state' => $state,
				'landline' => $landline,					
				'statusId' => $statusId,
				'createdBy' => $this->vendorId,
				'createdDtm'=>date('Y-m-d H:i:s')
			);
			
		   $checkBranchCompanyExist = $this->company_model->checkBranchCompanyExist($company_id, $name);

			if($checkBranchCompanyExist == false)
			{ 
				$result = $this->company_model->addNewBranch($companyInfo);
			
				if($result > 0)
				{
					$process = 'Add a Branch';
					$processFunction = 'Manager/addNewBranch';
					$this->logrecord($process,$processFunction);

					$this->session->set_flashdata('success', 'Branch created successfully');
				}
				else
				{
					$this->session->set_flashdata('error', 'Branch creation failed');
				}
			}
			else{
				$this->session->set_flashdata('error', 'Branch already in record');
			}
			
			redirect('companyListing');
		}
	}
	/**
     * This function is used to open edit taxs view
     */
    function editOldCompanyBranch($id = NULL)
    {
		if($id == null)
		{
			redirect('companyBranchListing');
		}
		$data['states'] = $this->master_model->getStateList();
		$data['companyList'] = $this->company_model->companyList();
		$data['branchInfo'] = $this->company_model->getCompanyBranchInfo($id);
		
		$this->global['pageTitle'] = 'Company Branch Edit';
		
		$this->loadViews("master/company/editOldCompanyBranch", $this->global, $data, NULL);
    }

    /**
     * This function is used to edit taxs
     */
    function editCompanyBranch()
    {            
        $this->load->library('form_validation');

        $this->form_validation->set_rules('id','Branch ID','required|numeric');
		$this->form_validation->set_rules('company_id','Company Name','required|numeric');
		$this->form_validation->set_rules('name','Branch Name','trim|required');
		$this->form_validation->set_rules('state','State','required');
		//$this->form_validation->set_rules('mobile','Mobile','required|numeric');
        
        $id = $this->input->post('id');

        if($this->form_validation->run() == FALSE)
        {
            $this->editOldCompanyBranch($id);
        }
        else
        {
            $company_id = $this->input->post('company_id');
			$name = $this->security->xss_clean($this->input->post('name'));
			$contact_person = $this->security->xss_clean($this->input->post('contact_person'));
			$email = $this->security->xss_clean($this->input->post('email'));
			$mobile = $this->security->xss_clean($this->input->post('mobile'));
			$landline = $this->input->post('landline');
			
			//$pan = $this->input->post('pan');
			//$gstin = $this->input->post('gstin');

			$pincode = $this->input->post('pincode');
			$address = $this->security->xss_clean($this->input->post('address'));
			$city = $this->security->xss_clean($this->input->post('city'));
			$state = $this->input->post('state');					
			$statusId = $this->input->post('status');
                
			$companyInfo = array(
				'company_id' => $company_id,
				'name' => ucwords(strtolower($name)),
				'contact_person' => $contact_person,
				'email' => strtolower($email),
				'mobile' => $mobile,
				//'pan' => strtoupper($pan),
				//'gstin' => strtoupper($gstin),
				'pincode' => $pincode,
				'address' => $address,
				'city' => $city,
				'state' => $state,
				'landline' => $landline,				
				'statusId' => $statusId,
				'updatedBy' => $this->vendorId,
				'updatedDtm'=>date('Y-m-d H:i:s')
			);
                                
            $checkCompanyExist = $this->company_model->checkBranchCompanyExist($company_id, $name, $id);

			if($checkCompanyExist == false)
			{
				$result = $this->company_model->editCompanyBranch($id, $companyInfo);
		
				if($result > 0)
				{
					$process = 'Company Branch Edit';
					$processFunction = 'Manager/editCompanyBranch';
					$this->logrecord($process,$processFunction);
					$this->session->set_flashdata('success', 'Branch Edit successful');
				}
				else
				{
					$this->session->set_flashdata('error', 'Branch Edit failed');
				}
			}
			else{
				$this->session->set_flashdata('error', 'Branch already in record');
			}
			redirect('companyBranchListing');

		}
    }

    /**
     * This function is used to delete taxs
     */
    function deleteCompanyBranch($id = NULL)
    {
		$id = $this->input->post('id');

        if($id == null)
		{
			redirect('companyBranchListing');
		}
		
		$branchInfo = array(			
			'isDeleted' => 1,
			'updatedBy' => $this->vendorId,
			'updatedDtm'=> date('Y-m-d H:i:s')
		);

		$result = $this->company_model->deleteCompanyBranch($id, $branchInfo);
		
		if ($result > 0) {
			 $process = 'Company Branch Delete';
			 $processFunction = 'Manager/deleteCompanyBranch';
			 $this->logrecord($process,$processFunction);

			 echo 1;
			}
		else
		{
			echo 0;
		}
    }
	
	function getBranchListbyCompanyId()
    {
		$results = array();
		$id = $this->input->post('id');
		$results = $this->company_model->getBranchListbyCompanyId($id);
		
		
		if(!empty($results)){
			echo '<label for="company_branch">Company Branch Name</label>';
			echo '<select class="form-control form-control-sm" id="company_branch" name="company_branch">';                                        
			echo '<option value="">Select Branch</option>';
			foreach($results as $result){

				echo '<option value="'.$result->id.'">'.$result->name.'</option>'; 
			}
			echo '</select>';
		}
		
		
		//echo json_encode($result);
    }
	
	function getCompanyRate()
    {
        $results = array();
		
		$data['company_id'] = $this->input->post('company_id');
		$data['vendor_id'] = $this->input->post('vendor_id');
		$data['vehicle_id'] = $this->input->post('vehicle_id');
		$data['vehicle_type_id'] = $this->input->post('vehicle_type_id');
		$data['zone_id'] = $this->input->post('zone_id');
		$data['zone_type_id'] = $this->input->post('zone_type_id');

		if($data['company_id']!= '' && $data['vehicle_type_id'] != '' && $data['zone_id'] != '' && $data['zone_type_id'] !='' )
		{
			$results = $this->company_model->getCompanyRate($data);
			//Print out the array in a JSON format.
			header('Content-Type: application/json');
			echo json_encode($results);
		}
    }
}

?>