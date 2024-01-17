<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Bharat Verma / bharatverma.verma@gmail.com
 * @version : 1.0
 * @since : 27.02.2018
 */
class Master extends BaseController
{
	/**
	 * This is default constructor of the class
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('company_model');
		$this->load->model('master_model');
		$this->load->model('vendor_model');
		$this->load->model('vehicle_model');
		$this->load->model('zone_model');
		// Datas -> libraries ->BaseController / This function used load user sessions
		$this->datas();
		// isLoggedIn / Login control function /  This function used login control
		$isLoggedIn = $this->session->userdata('isLoggedIn');
		if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
			redirect('login');
		} else {
			// isManagerOrAdmin / Admin or manager role control function / This function used admin or manager role control
			if ($this->isManagerOrAdmin() == TRUE) {
				$this->accesslogincontrol();
			}
		}
	}


	/**
	 * This function used to show Tax
	 */
	function guardListing()
	{
		$data['guardRecords'] = $this->master_model->getGuards();
		$data['guardPriceRecords'] = $this->master_model->getGuardPrices();


		$process = 'All of Guard';
		$processFunction = 'Manager/guardListing';
		$this->logrecord($process, $processFunction);

		$this->global['pageTitle'] = 'All of Guards';

		$this->loadViews("master/guardListing", $this->global, $data, NULL);
	}

	/**
	 * This function is used to load the add new Tax
	 */
	function addNewGuard()
	{
		$data['states'] = $this->master_model->getStateList();
		$this->global['pageTitle'] = 'Add a Guard';
		$this->loadViews("master/addNewGuard", $this->global, $data, NULL);
	}



	/**
	 * This function is used to add new Tax to the system
	 */
	function addNewGuards()
	{
		$this->load->library('form_validation');


		$this->form_validation->set_rules('salutation', 'Salutation', 'required');
		$this->form_validation->set_rules('full_name', 'Full Name', 'required');
		//$this->form_validation->set_rules('mobile','Mobile','required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->addNewGuard();
		} else {
			$salutation = $this->input->post('salutation');
			$full_name = $this->security->xss_clean($this->input->post('full_name'));
			$email = $this->security->xss_clean($this->input->post('email'));
			$mobile = $this->input->post('mobile');
			$pan = $this->input->post('pan');
			$dob = $this->input->post('dob');
			$pincode = $this->input->post('pincode');
			$address = $this->security->xss_clean($this->input->post('address'));
			$city = $this->security->xss_clean($this->input->post('city'));
			$state = $this->input->post('state');
			$company_name = $this->security->xss_clean($this->input->post('company_name'));
			$statusId = 1;

			$guardInfo = array(
				'salutation' => $salutation,
				'name' => ucwords(strtolower($full_name)),
				'email' => strtolower($email),
				'mobile' => $mobile,
				'pan' => strtoupper($pan),
				'dob' => $dob,
				'pincode' => $pincode,
				'address' => $address,
				'city' => $city,
				'state' => $state,
				'company_name' => $company_name,
				'statusId' => $statusId,
				'createdBy' => $this->vendorId,
				'createdDtm' => date('Y-m-d H:i:s')
			);

			// $checkTax = $this->master_model->checkGuardExist($stateId);

			// if($checkTax == false)
			//{ 
			$result = $this->master_model->addNewGuards($guardInfo);

			if ($result > 0) {
				$process = 'Add a Guard';
				$processFunction = 'Manager/addNewGuards';
				$this->logrecord($process, $processFunction);

				$this->session->set_flashdata('success', 'Guard created successfully');
			} else {
				$this->session->set_flashdata('error', 'Guard creation failed');
			}
			//}
			//else{
			//    $this->session->set_flashdata('error', 'Guard already in record');
			//}

			redirect('addNewGuard');
		}
	}

	/**
	 * This function is used to open edit taxs view
	 */
	function editOldGuard($guardId = NULL)
	{
		if ($guardId == null) {
			redirect('guardListing');
		}
		$data['states'] = $this->master_model->getStateList();
		$data['guardInfo'] = $this->master_model->getGuardInfo($guardId);

		$this->global['pageTitle'] = 'Guard Edit';

		$this->loadViews("master/editOldGuard", $this->global, $data, NULL);
	}

	/**
	 * This function is used to edit taxs
	 */
	function editGuard()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('salutation', 'Salutation', 'required');
		$this->form_validation->set_rules('full_name', 'Full Name', 'required');
		//$this->form_validation->set_rules('mobile','Mobile','required|numeric');
		$this->form_validation->set_rules('status', 'Status', 'required|numeric');

		$guardId = $this->input->post('guardId');

		if ($this->form_validation->run() == FALSE) {
			$this->editOldGuard($guardId);
		} else {
			$salutation = $this->input->post('salutation');
			$full_name = $this->security->xss_clean($this->input->post('full_name'));
			$email = $this->security->xss_clean($this->input->post('email'));
			$mobile = $this->input->post('mobile');
			$pan = $this->input->post('pan');
			$dob = $this->input->post('dob');
			$pincode = $this->input->post('pincode');
			$address = $this->security->xss_clean($this->input->post('address'));
			$city = $this->security->xss_clean($this->input->post('city'));
			$state = $this->input->post('state');
			$company_name = $this->security->xss_clean($this->input->post('company_name'));
			$statusId = $this->input->post('status');

			$guardInfo = array(
				'salutation' => $salutation,
				'name' => ucwords(strtolower($full_name)),
				'email' => strtolower($email),
				'mobile' => $mobile,
				'pan' => strtoupper($pan),
				'dob' => $dob,
				'pincode' => $pincode,
				'address' => $address,
				'city' => $city,
				'state' => $state,
				'company_name' => $company_name,
				'statusId' => $statusId,
				'updatedBy' => $this->vendorId,
				'updatedDtm' => date('Y-m-d H:i:s')
			);

			//$checkTax = $this->master_model->checkTaxExist($stateId, $guardId);

			//if($checkTax == false)
			//{
			$result = $this->master_model->editGuard($guardInfo, $guardId);

			if ($result > 0) {
				$process = 'Guard Edit';
				$processFunction = 'Manager/editGuard';
				$this->logrecord($process, $processFunction);
				$this->session->set_flashdata('success', 'Guard Edit successful');
			} else {
				$this->session->set_flashdata('error', 'Guard Edit failed');
			}
			//}
			//else{
			//    $this->session->set_flashdata('error', 'Guard already in record');
			//}
			redirect('guardListing');
		}
	}

	/**
	 * This function is used to delete taxs
	 */
	function deleteGuard($guardId = NULL)
	{
		if ($guardId == null) {
			redirect('guardListing');
		}

		$result = $this->master_model->deleteGuard($guardId);

		if ($result == TRUE) {
			$process = 'Guard Delete';
			$processFunction = 'Manager/deleteGuard';
			$this->logrecord($process, $processFunction);

			$this->session->set_flashdata('success', 'Guard delete successful');
		} else {
			$this->session->set_flashdata('error', 'Guard delete failed');
		}
		redirect('guardListing');
	}

	/**
	 * This function used to show Tax
	 */
	function guardPriceListing()
	{
		$data['guardPriceRecords'] = $this->master_model->getGuardPrices();


		$process = 'All of Guard Price';
		$processFunction = 'Manager/guard Price Listing';
		$this->logrecord($process, $processFunction);

		$this->global['pageTitle'] = 'All of Guard Prices';

		$this->loadViews("master/guardListing", $this->global, $data, NULL);
	}

	/**
	 * This function is used to load the add new Tax
	 */
	function addNewGuardPrice()
	{
		$data = '';
		$this->global['pageTitle'] = 'Add a Guard Price';
		$this->loadViews("master/addNewGuardPrice", $this->global, $data, NULL);
	}



	/**
	 * This function is used to add new Tax to the system
	 */
	function addNewGuardPrices()
	{
		$this->load->library('form_validation');


		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->addNewGuardPrice();
		} else {
			$gender = $this->input->post('gender');
			$price = $this->input->post('price');
			$statusId = 1;

			$guardPriceInfo = array(
				'gender' => $gender,
				'price' => $price,
				'createdDtm' => date('Y-m-d H:i:s')
			);

			$checkGuardPriceEx = $this->master_model->checkGuardPriceExist($gender);

			if ($checkGuardPriceEx == false) {
				$result = $this->master_model->addNewGuardPrices($guardPriceInfo);

				if ($result > 0) {
					$process = 'Add a Guard Price';
					$processFunction = 'Manager/addNewGuardPrices';
					$this->logrecord($process, $processFunction);

					$this->session->set_flashdata('success', 'Guard Price created successfully');
				} else {
					$this->session->set_flashdata('error', 'Guard Price creation failed');
				}
			} else {
				$this->session->set_flashdata('error', 'Guard Price already in record');
			}

			redirect('addNewGuardPrice');
		}
	}

	/**
	 * This function is used to open edit taxs view
	 */
	function editOldGuardPrice($guardPriceId = NULL)
	{
		if ($guardPriceId == null) {
			redirect('guardListing');
		}
		$data['guardPriceInfo'] = $this->master_model->getGuardPriceInfo($guardPriceId);

		$this->global['pageTitle'] = 'Guard Price Edit';

		$this->loadViews("master/editOldGuardPrice", $this->global, $data, NULL);
	}

	/**
	 * This function is used to edit taxs
	 */
	function editGuardPrice()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required|numeric');

		$guardPriceId = $this->input->post('guardPriceId');

		if ($this->form_validation->run() == FALSE) {
			$this->editOldGuardPrice($guardPriceId);
		} else {
			$gender = $this->input->post('gender');
			$price = $this->input->post('price');

			$guardPriceInfo = array(
				'gender' => $gender,
				'price' => $price,
				'updatedDtm' => date('Y-m-d H:i:s')
			);

			$checkGuardPriceEx = $this->master_model->checkGuardPriceExist($gender, $guardPriceId);

			if ($checkGuardPriceEx == false) {
				$result = $this->master_model->editGuardPrice($guardPriceInfo, $guardPriceId);

				if ($result > 0) {
					$process = 'Guard Price Edit';
					$processFunction = 'Manager/editGuardPrice';
					$this->logrecord($process, $processFunction);
					$this->session->set_flashdata('success', 'Guard Price Edit successful');
				} else {
					$this->session->set_flashdata('error', 'Guard Price Edit failed');
				}
			} else {
				$this->session->set_flashdata('error', 'Guard Price already in record');
			}
			redirect('guardListing');
		}
	}

	/**
	 * This function is used to delete taxs
	 */
	function deleteGuardPrice($guardPriceId = NULL)
	{
		if ($guardPriceId == null) {
			redirect('guardListing');
		}

		$result = $this->master_model->deleteGuardPrice($guardPriceId);

		if ($result == TRUE) {
			$process = 'Guard Price Delete';
			$processFunction = 'Manager/deleteGuardPrice';
			$this->logrecord($process, $processFunction);

			$this->session->set_flashdata('success', 'Guard Price delete successful');
		} else {
			$this->session->set_flashdata('error', 'Guard Price delete failed');
		}
		redirect('guardListing');
	}













	/**
	 * This function used to show Tax
	 */
	function invoiceListing()
	{
		$data['guardRecords'] = $this->master_model->getInvoices();


		$process = 'All of Invoice';
		$processFunction = 'Manager/invoiceListing';
		$this->logrecord($process, $processFunction);

		$this->global['pageTitle'] = 'All of Invoices';

		$this->loadViews("master/invoiceListing", $this->global, $data, NULL);
	}

	/**
	 * This function is used to load the add new Tax
	 */
	function addNewInvoice()
	{
		$data['states'] = $this->master_model->getStateList();
		$this->global['pageTitle'] = 'Add a Invoice';
		$this->loadViews("master/addNewInvoice", $this->global, $data, NULL);
	}



	/**
	 * This function is used to add new Tax to the system
	 */
	function addNewInvoices()
	{
		$this->load->library('form_validation');


		$this->form_validation->set_rules('salutation', 'Salutation', 'required');
		$this->form_validation->set_rules('full_name', 'Full Name', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->addNewGuard();
		} else {
			$salutation = $this->input->post('salutation');
			$full_name = $this->input->post('full_name');
			$email = $this->input->post('email');
			$mobile = $this->input->post('mobile');
			$pan = $this->input->post('pan');
			$dob = $this->input->post('dob');
			$pincode = $this->input->post('pincode');
			$address = $this->input->post('address');
			$city = $this->input->post('city');
			$state = $this->input->post('state');
			$company_name = $this->input->post('company_name');
			$statusId = 1;

			$invoiceInfo = array(
				'salutation' => $salutation,
				'name' => $full_name,
				'email' => $email,
				'mobile' => $mobile,
				'pan' => strtoupper($pan),
				'dob' => $dob,
				'pincode' => $pincode,
				'address' => $address,
				'city' => $city,
				'state' => $state,
				'company_name' => $company_name,
				'statusId' => $statusId,
				'createdDtm' => date('Y-m-d H:i:s')
			);

			// $checkTax = $this->master_model->checkGuardExist($stateId);

			// if($checkTax == false)
			//{ 
			$result = $this->master_model->addNewGuards($invoiceInfo);

			if ($result > 0) {
				$process = 'Add a Invoice';
				$processFunction = 'Manager/addNewInvoices';
				$this->logrecord($process, $processFunction);

				$this->session->set_flashdata('success', 'Invoice created successfully');
			} else {
				$this->session->set_flashdata('error', 'Invoice creation failed');
			}
			//}
			//else{
			//    $this->session->set_flashdata('error', 'Invoice already in record');
			//}

			redirect('addNewGuard');
		}
	}

	/**
	 * This function is used to open edit taxs view
	 */
	function editOldInvoice($invoiceId = NULL)
	{
		if ($invoiceId == null) {
			redirect('invoiceListing');
		}
		$data['states'] = $this->master_model->getStateList();
		$data['invoiceInfo'] = $this->master_model->getInvoiceInfo($invoiceId);

		$this->global['pageTitle'] = 'Invoice Edit';

		$this->loadViews("master/editOldInvoice", $this->global, $data, NULL);
	}

	/**
	 * This function is used to edit taxs
	 */
	function editInvoice()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('salutation', 'Salutation', 'required');
		$this->form_validation->set_rules('full_name', 'Full Name', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric');
		$this->form_validation->set_rules('status', 'Status', 'required|numeric');

		$guardId = $this->input->post('invoiceId');

		if ($this->form_validation->run() == FALSE) {
			$this->editOldGuard($invoiceId);
		} else {
			$salutation = $this->input->post('salutation');
			$full_name = $this->input->post('full_name');
			$email = $this->input->post('email');
			$mobile = $this->input->post('mobile');
			$pan = $this->input->post('pan');
			$dob = $this->input->post('dob');
			$pincode = $this->input->post('pincode');
			$address = $this->input->post('address');
			$city = $this->input->post('city');
			$state = $this->input->post('state');
			$company_name = $this->input->post('company_name');
			$statusId = $this->input->post('status');

			$invoiceInfo = array(
				'salutation' => $salutation,
				'name' => $full_name,
				'email' => $email,
				'mobile' => $mobile,
				'pan' => strtoupper($pan),
				'dob' => $dob,
				'pincode' => $pincode,
				'address' => $address,
				'city' => $city,
				'state' => $state,
				'company_name' => $company_name,
				'statusId' => $statusId,
				'updatedDtm' => date('Y-m-d H:i:s')
			);

			//$checkTax = $this->master_model->checkTaxExist($stateId, $invoiceId);

			//if($checkTax == false)
			//{
			$result = $this->master_model->editGuard($invoiceInfo, $invoiceId);

			if ($result > 0) {
				$process = 'Invoice Edit';
				$processFunction = 'Manager/editInvoice';
				$this->logrecord($process, $processFunction);
				$this->session->set_flashdata('success', 'Invoice Edit successful');
			} else {
				$this->session->set_flashdata('error', 'Invoice Edit failed');
			}
			//}
			//else{
			//    $this->session->set_flashdata('error', 'Invoice already in record');
			//}
			redirect('invoiceListing');
		}
	}

	/**
	 * This function is used to delete taxs
	 */
	function deleteInvoice($invoiceId = NULL)
	{
		if ($guardId == null) {
			redirect('invoiceListing');
		}

		$result = $this->master_model->deleteInvoice($invoiceId);

		if ($result == TRUE) {
			$process = 'Invoice Delete';
			$processFunction = 'Manager/deleteInvoice';
			$this->logrecord($process, $processFunction);

			$this->session->set_flashdata('success', 'Invoice delete successful');
		} else {
			$this->session->set_flashdata('error', 'Invoice delete failed');
		}
		redirect('invoiceListing');
	}


	/**
	 * This function used to show Tax
	 */
	function cabRosterListing()
	{
		//$data['cabRosterList'] = $this->master_model->getCabRosterList();

		$data['companyList'] = $this->company_model->getCompanyList();


		$process = 'All of Cab Roster';
		$processFunction = 'Manager/cabRosterListing';
		$this->logrecord($process, $processFunction);

		$this->global['pageTitle'] = 'All of Cab Roster';

		$this->loadViews("master/cabRosterListing", $this->global, $data, NULL);
	}


	/**
	 * This function is used to load the add new Tax
	 */
	function addNewCabRoster($id = NULL)
	{
		//$data['states'] = $this->master_model->getStateList();
		$data['companyList'] = $this->company_model->getCompanyList();
		$data['cabVendorList'] = $this->vendor_model->vendorList();
		$data['invoiceNumber'] = $this->master_model->generateInvoiceNumber($this->vendorId);
		$data['vehicleType'] = $this->vehicle_model->getVehicleTypes();
		$data['zoneList'] = $this->zone_model->getAllZoneList();
		$data['zoneType'] = $this->zone_model->getZoneTypes();

		$data['company_id'] = $id;
		//$data['cabTypeList'] = $this->master_model->cabTypeList();
		$this->global['pageTitle'] = 'Add a Cab Roster';
		$this->loadViews("master/addNewCabRoster", $this->global, $data, NULL);
	}



	/**
	 * This function is used to add new Tax to the system
	 */
	function addNewCabRosters()
	{
		$params = array();
		parse_str($_POST['invoiceData'], $params);

		if (empty($params)) {
			$resultsend['status'] = "error";
			$resultsend['message'] = "Please enter mandatory fields";
			echo json_encode($resultsend);
			die;
		}

		$invoiceInfo = array(
			'invoice_type' => 'Roster',
			'invoice_no' => $this->security->xss_clean($params['invoice_serial_number']),
			'invoice_date' => $params['roster_date'],
			'company_id' => $params['company_name'],
			'company_branch_id' => isset($params['company_branch']) ? $params['company_branch'] : '',
			'financial_year' => $this->master_model->generateFinancialYear(),
			'statusId' => 1,
			'createdBy' => $this->vendorId,
			'createdDtm' => date('Y-m-d H:i:s')
		);

		$invoiceItemArray = array();
		$invoiceTotalAmount = 0.00;
		if (isset($params['invoice_vehicle_id']) && count($params['invoice_vehicle_id']) > 0) {

			$invoiceitems = count($params['invoice_vehicle_id']);
			for ($i = 0; $i < $invoiceitems; $i++) {

				$dataInvoiceArr = array();
				$dataInvoiceArr['invoice_vehicle_id'] = isset($params['invoice_vehicle_id'][$i]) ? $params['invoice_vehicle_id'][$i] : '';
				$dataInvoiceArr['invoice_vendor_id'] = isset($params['invoice_vendor_id'][$i]) ? $params['invoice_vendor_id'][$i] : '';
				$dataInvoiceArr['invoice_shift_timing'] = isset($params['invoice_shift_timing'][$i]) ? $params['invoice_shift_timing'][$i] : '';
				$dataInvoiceArr['invoice_roster_type'] = isset($params['invoice_roster_type'][$i]) ? $params['invoice_roster_type'][$i] : '';
				$dataInvoiceArr['invoice_vehicle_no'] = isset($params['invoice_vehicle_no'][$i]) ? $params['invoice_vehicle_no'][$i] : '';
				$dataInvoiceArr['invoice_vehicle_type'] = isset($params['invoice_vehicle_type'][$i]) ? $params['invoice_vehicle_type'][$i] : '';

				$dataInvoiceArr['invoice_trip_id'] = isset($params['invoice_trip_id'][$i]) ? $params['invoice_trip_id'][$i] : '';
				$dataInvoiceArr['invoice_location'] = isset($params['invoice_location'][$i]) ? $params['invoice_location'][$i] : '';
				$dataInvoiceArr['invoice_zone'] = isset($params['invoice_zone'][$i]) ? $params['invoice_zone'][$i] : '';
				$dataInvoiceArr['invoice_zone_type'] = isset($params['invoice_zone_type'][$i]) ? $params['invoice_zone_type'][$i] : '';
				$dataInvoiceArr['invoice_guard'] = isset($params['invoice_guard'][$i]) ? $params['invoice_guard'][$i] : '';
				$dataInvoiceArr['invoice_penality'] = isset($params['invoice_penality'][$i]) ? $params['invoice_penality'][$i] : '';
				$dataInvoiceArr['invoice_penality_clause'] = isset($params['invoice_penality_clause'][$i]) ? $params['invoice_penality_clause'][$i] : '';

				$dataInvoiceArr['invoice_rate'] = isset($params['invoice_rate'][$i]) ? $params['invoice_rate'][$i] : '0.00';
				$dataInvoiceArr['invoice_guard_rate'] = isset($params['invoice_guard_rate'][$i]) ? $params['invoice_guard_rate'][$i] : '0.00';

				$dataInvoiceArr['invoice_vendor_rate'] = isset($params['invoice_vendor_rate'][$i]) ? $params['invoice_vendor_rate'][$i] : '0.00';
				$dataInvoiceArr['invoice_vendor_guard_rate'] = isset($params['invoice_vendor_guard_rate'][$i]) ? $params['invoice_vendor_guard_rate'][$i] : '0.00';


				$ItemArray = array(
					"company_id" => $invoiceInfo['company_id'],
					"vehicle_id" => $dataInvoiceArr['invoice_vehicle_id'],
					"vendor_id" => $dataInvoiceArr['invoice_vendor_id'],
					"shift_timing" => $dataInvoiceArr['invoice_shift_timing'],
					"roster_type" => $dataInvoiceArr['invoice_roster_type'],
					"vehicle_no" => $dataInvoiceArr['invoice_vehicle_no'],
					"vehicle_type" => $dataInvoiceArr['invoice_vehicle_type'],
					"trip_id" => $dataInvoiceArr['invoice_trip_id'],
					"location" => $dataInvoiceArr['invoice_location'],
					"zone" => $dataInvoiceArr['invoice_zone'],
					"zone_type" => $dataInvoiceArr['invoice_zone_type'],
					"guard" => $dataInvoiceArr['invoice_guard'],
					"penality" => $dataInvoiceArr['invoice_penality'],
					"penality_clause" => $dataInvoiceArr['invoice_penality_clause'],
					"car_rate" => $dataInvoiceArr['invoice_rate'],
					"guard_rate" => $dataInvoiceArr['invoice_guard_rate'],
					"vendor_rate" => $dataInvoiceArr['invoice_vendor_rate'],
					"vendor_guard_rate" => $dataInvoiceArr['invoice_vendor_guard_rate'],
					"statusId" => 1,
					"createdBy" => $this->vendorId,
					"createdDtm" => date('Y-m-d H:i:s')
				);

				array_push($invoiceItemArray, $ItemArray);
			}
		}


		$result = $this->master_model->addNewInvoices($invoiceInfo);

		if ($result > 0) {
			$process = 'Create New Roster';
			$processFunction = 'Manager/addNewRoster';
			$this->logrecord($process, $processFunction);

			$processedInvoiceItemArray = array();
			foreach ($invoiceItemArray as $itemArr) {

				$itemArr['invoice_id'] = $result;
				array_push($processedInvoiceItemArray, $itemArr);
			}

			$result = $this->master_model->addNewInvoicesDetails($processedInvoiceItemArray);

			$resultsend['status'] = "success";
			$resultsend['message'] = "Cab Roster create successfully";
			echo json_encode($resultsend);
			die;

			//$this->session->set_flashdata('success', 'Cab Roster create successfully');
		} else {
			//$this->session->set_flashdata('error', 'Cab Roster creation failed');
			$resultsend['status'] = "error";
			$resultsend['message'] = "Cab Roster creation failed";
			echo json_encode($resultsend);
			die;
		}
	}

	/**
	 * This function is used to open edit taxs view
	 */
	function editOldCabRoster($id = NULL)
	{
		if ($id == null) {
			redirect('cabRosterListing');
		}
		$data['companyList'] = $this->company_model->getCompanyList();
		$data['cabVendorList'] = $this->vendor_model->vendorList();
		$data['vehicleType'] = $this->vehicle_model->getVehicleTypes();
		$data['cabRosterList'] = $this->master_model->getCabRosterById($id);

		$vendor_id = $data['cabRosterList'][0]->vendor_id;
		$company_id = $data['cabRosterList'][0]->company_id;

		$data['zoneList'] = $this->master_model->getZoneByVendorId($vendor_id, $company_id);

		$this->global['pageTitle'] = 'Cab Roster Edit';
		$this->loadViews("master/editOldCabRoster", $this->global, $data, NULL);
	}

	/**
	 * This function is used to edit taxs
	 */
	function editCabRoster()
	{
		$params = array();
		parse_str($_POST['invoiceData'], $params);

		if (empty($params)) {
			$resultsend['status'] = "error";
			$resultsend['message'] = "Please enter mandatory fields";
			echo json_encode($resultsend);
			die;
		}

		$id = $params['invoice_id'];

		$invoiceInfo = array(
			'invoice_type' => 'Roster',
			'invoice_no' => $this->security->xss_clean($params['invoice_serial_number']),
			'invoice_date' => $params['roster_date'],
			'company_id' => isset($params['company_name']) ? $params['company_name'] : '',
			'company_branch_id' => isset($params['company_branch']) ? $params['company_branch'] : '',
			'financial_year' => $this->master_model->generateFinancialYear(),
			'statusId' => 1,
			'createdBy' => $this->vendorId,
			'createdDtm' => date('Y-m-d H:i:s')
		);

		$invoiceItemArray = array();
		$invoiceTotalAmount = 0.00;
		if (isset($params['invoice_vehicle_id']) && count($params['invoice_vehicle_id']) > 0) {

			$invoiceitems = count($params['invoice_vehicle_id']);
			for ($i = 0; $i < $invoiceitems; $i++) {

				$dataInvoiceArr = array();
				$dataInvoiceArr['invoice_vehicle_id'] = isset($params['invoice_vehicle_id'][$i]) ? $params['invoice_vehicle_id'][$i] : '';
				$dataInvoiceArr['invoice_vendor_id'] = isset($params['invoice_vendor_id'][$i]) ? $params['invoice_vendor_id'][$i] : '';
				$dataInvoiceArr['invoice_shift_timing'] = isset($params['invoice_shift_timing'][$i]) ? $params['invoice_shift_timing'][$i] : '';
				$dataInvoiceArr['invoice_roster_type'] = isset($params['invoice_roster_type'][$i]) ? $params['invoice_roster_type'][$i] : '';
				$dataInvoiceArr['invoice_vehicle_no'] = isset($params['invoice_vehicle_no'][$i]) ? $params['invoice_vehicle_no'][$i] : '';
				$dataInvoiceArr['invoice_vehicle_type'] = isset($params['invoice_vehicle_type'][$i]) ? $params['invoice_vehicle_type'][$i] : '';

				$dataInvoiceArr['invoice_trip_id'] = isset($params['invoice_trip_id'][$i]) ? $params['invoice_trip_id'][$i] : '';
				$dataInvoiceArr['invoice_location'] = isset($params['invoice_location'][$i]) ? $params['invoice_location'][$i] : '';
				$dataInvoiceArr['invoice_zone'] = isset($params['invoice_zone'][$i]) ? $params['invoice_zone'][$i] : '';
				$dataInvoiceArr['invoice_zone_type'] = isset($params['invoice_zone_type'][$i]) ? $params['invoice_zone_type'][$i] : '';
				$dataInvoiceArr['invoice_guard'] = isset($params['invoice_guard'][$i]) ? $params['invoice_guard'][$i] : '';
				$dataInvoiceArr['invoice_penality'] = isset($params['invoice_penality'][$i]) ? $params['invoice_penality'][$i] : '';
				$dataInvoiceArr['invoice_penality_clause'] = isset($params['invoice_penality_clause'][$i]) ? $params['invoice_penality_clause'][$i] : '';

				$dataInvoiceArr['invoice_rate'] = isset($params['invoice_rate'][$i]) ? $params['invoice_rate'][$i] : '0.00';
				$dataInvoiceArr['invoice_guard_rate'] = isset($params['invoice_guard_rate'][$i]) ? $params['invoice_guard_rate'][$i] : '0.00';

				$dataInvoiceArr['invoice_vendor_rate'] = isset($params['invoice_vendor_rate'][$i]) ? $params['invoice_vendor_rate'][$i] : '0.00';
				$dataInvoiceArr['invoice_vendor_guard_rate'] = isset($params['invoice_vendor_guard_rate'][$i]) ? $params['invoice_vendor_guard_rate'][$i] : '0.00';


				$ItemArray = array(
					"company_id" => $invoiceInfo['company_id'],
					"vehicle_id" => $dataInvoiceArr['invoice_vehicle_id'],
					"vendor_id" => $dataInvoiceArr['invoice_vendor_id'],
					"shift_timing" => $dataInvoiceArr['invoice_shift_timing'],
					"roster_type" => $dataInvoiceArr['invoice_roster_type'],
					"vehicle_no" => $dataInvoiceArr['invoice_vehicle_no'],
					"vehicle_type" => $dataInvoiceArr['invoice_vehicle_type'],
					"trip_id" => $dataInvoiceArr['invoice_trip_id'],
					"location" => $dataInvoiceArr['invoice_location'],
					"zone" => $dataInvoiceArr['invoice_zone'],
					"zone_type" => $dataInvoiceArr['invoice_zone_type'],
					"guard" => $dataInvoiceArr['invoice_guard'],
					"penality" => $dataInvoiceArr['invoice_penality'],
					"penality_clause" => $dataInvoiceArr['invoice_penality_clause'],
					"car_rate" => $dataInvoiceArr['invoice_rate'],
					"guard_rate" => $dataInvoiceArr['invoice_guard_rate'],
					"vendor_rate" => $dataInvoiceArr['invoice_vendor_rate'],
					"vendor_guard_rate" => $dataInvoiceArr['invoice_vendor_guard_rate'],
					"statusId" => 1,
					"createdBy" => $this->vendorId,
					"createdDtm" => date('Y-m-d H:i:s')
				);

				array_push($invoiceItemArray, $ItemArray);
			}
		}

		$result = $this->master_model->editCabRoster($id, $invoiceInfo);

		if ($id > 0) {
			$process = 'Edit Cab Roster';
			$processFunction = 'Manager/editCabRoster';
			$this->logrecord($process, $processFunction);

			$processedInvoiceItemArray = array();
			foreach ($invoiceItemArray as $itemArr) {

				$itemArr['invoice_id'] = $id;
				array_push($processedInvoiceItemArray, $itemArr);
			}

			$this->master_model->deleteInvoicesDetails($id);
			$result = $this->master_model->addNewInvoicesDetails($processedInvoiceItemArray);

			$resultsend['status'] = "success";
			$resultsend['message'] = "Cab Roster edit successfully";
			echo json_encode($resultsend);
			die;

			//$this->session->set_flashdata('success', 'Cab Roster create successfully');
		} else {
			//$this->session->set_flashdata('error', 'Cab Roster creation failed');
			$resultsend['status'] = "error";
			$resultsend['message'] = "Cab Roster update failed";
			echo json_encode($resultsend);
			die;
		}
	}

	/**
	 * This function is used to delete taxs
	 */
	function deleteCabRoster()
	{
		$id = $this->input->post('id');

		if ($id == null) {
			redirect('cabRosterListing');
		}

		$dataArr = array(
			'isDeleted' => 1,
			'updatedBy' => $this->vendorId,
			'updatedDtm' => date('Y-m-d H:i:s')
		);


		$result = $this->master_model->deleteCabRoster($id, $dataArr);

		if ($result == TRUE) {
			$process = 'Cab Roster Delete';
			$processFunction = 'Manager/deleteCabRoster';
			$this->logrecord($process, $processFunction);

			$this->session->set_flashdata('success', 'Cab Roster delete successful');
		} else {
			$this->session->set_flashdata('error', 'Cab Roster delete failed');
		}
		// redirect('cabRosterListing');
	}


	function cabBillingListing($id = NULL)
	{
		if ($id == null) {
			redirect('cabRosterListing');
		}


		$data['company_id'] = $id;
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');

		$data['cabRosterList'] = $this->master_model->getCabRosterListByCompId($id, $start_date, $end_date);

		$process = 'Cab Billing';
		$processFunction = 'Manager/cabBillingListing';
		$this->logrecord($process, $processFunction);

		$this->global['pageTitle'] = 'All of Cab Roster';

		$this->loadViews("master/cabBillingListing", $this->global, $data, NULL);
	}

	function viewCabRoster($id = NULL)
	{
		if ($id == null) {
			redirect('cabRosterListing');
		}
		$data['companyList'] = $this->company_model->getCompanyList();
		$data['cabVendorList'] = $this->vendor_model->vendorList();
		$data['vehicleType'] = $this->vehicle_model->getVehicleTypes();
		$data['cabRosterList'] = $this->master_model->getCabRosterByCompId($id);

		//pre($data['cabRosterList']);

		$this->global['pageTitle'] = 'Cab Roster Edit';
		$this->loadViews("master/viewCabRoster", $this->global, $data, NULL);
	}



	/**
	 * This function used to show Tax
	 */
	function reports()
	{
		$data['companyList'] = $this->company_model->getCompanyList();
		$data['vendorList'] = $this->vendor_model->getAllVendors();

		//pre($data['vendorList']);		

		$process = 'All Reports';
		$processFunction = 'Manager/reports';
		$this->logrecord($process, $processFunction);

		$this->global['pageTitle'] = 'All Reports';
		$this->loadViews("master/reports/reports", $this->global, $data, NULL);
	}

	/**
	 * This function is used to add new Tax to the system
	 */
	function getAllReports()
	{
		$results = array();
		$data['company_id'] = $company_id = $this->input->post('company_id');
		$data['vendor_id'] = $vendor_id = $this->input->post('vendor_id');
		$data['vehicle_id'] = $vehicle_id = $this->input->post('vehicle_id');
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');

		if (empty($start_date)) {
			$start_date = date('Y-m-d');
		}
		if (empty($end_date)) {
			$end_date = date('Y-m-d');
		}


		$data['start_date'] = $start_date;
		$data['end_date'] = $end_date;

		$results = $this->master_model->getAllReports($data);

		?>
		<table class="table table-striped table-bordered table-sm">
			<caption class="lead">Total records found</strong>: <?= count($results); ?></caption>
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Company Name</th>
					<th scope="col">Vendor Name</th>
					<th scope="col">Vehicle No.</th>
					<th scope="col">Total Trip</th>
					<th scope="col">Guard Rate</th>
					<th scope="col">Penality</th>
					<th scope="col">Cab Rate</th>
					<th scope="col">Action</th>
					<!-- <th scope="col">Delete</th> -->
				</tr>
			</thead>
			<tbody>
				<?php $i = 1;
						$total_guard_price = 0;
						$total_penality = 0;
						$total_cab_price = 0;
						$total_trip = 0;
						//For table indexing. 
						?>
				<?php foreach ($results as $record) {

							if ($record->guard == 1) {
								$total_guard_price += $record->guard_rate;
							}
							$total_cab_price += $record->cab_rate;
							$total_penality += $record->penality;
							$total_trip += 	$record->total_trip;

							?>
					<tr>
						<th scope="row"><?php echo $i++; ?></th>

						<td><?php echo $record->company_name; ?></td>
						<td><?php echo $record->vendor_name; ?></td>
						<td><?php echo $record->vehicle_no; ?></td>
						<td><?php echo $record->total_trip; ?></td>
						<td><?= ($record->guard == 1) ? $record->guard_rate : '0.00'; ?></td>
						<td><?= ($record->penality) ? $record->penality : '0.00'; ?></td>
						<!-- <td><?= ($record->guard == 1) ? $record->guard_rate + $record->cab_rate : $record->cab_rate; ?></td> -->
						<td><?= $record->cab_rate ?></td>

						<td>
							<a href="#" class="btn-sm btn-outline-info btn-rounded viewRoster material-tooltip-main" data-companyid="<?php echo $record->company_id; ?>" data-vendorid="<?php echo $record->vendor_id; ?>" data-vehicleid="<?php echo $record->vehicle_id; ?>" data-toggle="tooltip" data-placement="bottom" title="View Details">
								<i class="fas fa-eye" aria-hidden="true"></i>
							</a>
							&nbsp;
							<a href="#" class="btn-sm btn-outline-primary btn-rounded viewCompanyWiseRoster material-tooltip-main" data-companyid="<?php echo $record->company_id; ?>" data-vendorid="<?php echo $record->vendor_id; ?>" data-vehicleid="<?php echo $record->vehicle_id; ?>" data-toggle="tooltip" data-placement="bottom" title="View Company Wise Details">
								<i class="fas fa-eye" aria-hidden="true"></i>
							</a>
						</td>
					</tr>

				<?php } ?>
				<tr>
					<td colspan="4" class="text-right"><strong>Sub Total:</strong></td>
					<td><strong><?php echo $total_trip; ?></strong></td>
					<td><strong><?php echo $total_guard_price; ?>/-</strong></td>
					<td><strong><?php echo $total_penality; ?>/-</strong></td>
					<td colspan="2"><strong><?php echo $total_cab_price; ?>/-</strong></td>
				</tr>
				<tr>
					<td colspan="5" class="text-right"><strong>Total:</strong></td>
					<td colspan="3" class="blue-text"><strong><?php echo (($total_guard_price + $total_cab_price) - $total_penality); ?>/-</strong></td>
					<td><a href="#" class="btn-sm btn-outline-info btn-rounded viewSearchRosterDetailsAll material-tooltip-main" data-companyid="<?php echo $data['company_id']; ?>" data-vendorid="<?php echo $data['vendor_id']; ?>" data-vehicleid="<?php echo $data['vehicle_id']; ?>" data-toggle="tooltip" data-placement="bottom" title="View Company Wise Details">
							<i class="fas fa-eye"></i>
						</a>&nbsp;
						<a href="#" class="btn-sm btn-outline-primary btn-rounded viewCompanyWiseRosterAll material-tooltip-main" data-companyid="<?php echo $data['company_id']; ?>" data-vendorid="<?php echo $data['vendor_id']; ?>" data-vehicleid="<?php echo $data['vehicle_id']; ?>" data-toggle="tooltip" data-placement="bottom" title="View Company Wise Details">
							<i class="fas fa-eye"></i>
						</a></td>
				</tr>
			</tbody>
		</table>


	<?php

		}

		function viewSearchRosterDetails()
		{
			$results = array();
			$data['company_id'] = $company_id = $this->input->post('company_id');
			$data['vendor_id'] = $vendor_id = $this->input->post('vendor_id');
			$data['vehicle_id'] = $vehicle_id = $this->input->post('vehicle_id');
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');

			$data['start_date'] = $start_date;
			$data['end_date'] = $end_date;

			$results = $this->master_model->viewSearchRosterDetails($data);
			//pre($results);
			?>
		<style>
			table.table td,
			table.table th {
				padding-top: 4px;
				padding-bottom: 4px;
			}
		</style>

		<div class="modal fade" id="viewSearchRosterDetails" tabindex="-1" role="dialog" aria-labelledby="viewSearchRosterDetails" aria-hidden="true">
			<div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<div class="col-md-3">
							<h6 class="modal-title" id="modalLabel">Company Name: <strong><?= $results[0]->company_name ?></strong></h6>
						</div>
						<div class="col-md-3">
							<h6 class="modal-title" id="modalLabel">Vendor Name: <strong><?= $results[0]->vendor_name ?></strong></h6>
						</div>
						<div class="col-md-3">
							<h6 class="modal-title" id="modalLabel">Invoice No.: <strong><?= $results[0]->invoice_no ?></strong></h6>
						</div>
						<div class="col-md-3">
							<h6 class="modal-title" id="modalLabel">Invoice Date: <strong><?= $results[0]->invoice_date ?></strong></h6>
						</div>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body table-responsive">
						<table class="table table-striped table-bordered">
							<thead class="thead-dark">
								<tr>
									<th scope="col">#</th>
									<th scope="col">Shift Time</th>
									<th scope="col">Pick/Drop</th>
									<th scope="col">Cab No</th>
									<th scope="col">Cab Type</th>
									<th scope="col">Trip Id</th>
									<th scope="col">Location</th>
									<th scope="col">Zone Name</th>
									<th scope="col">Zone Type</th>
									<th scope="col">Guard</th>
									<th scope="col">Guard Rate</th>
									<th scope="col">Penality</th>
									<th scope="col">Penality Clouse</th>
									<th scope="col">Cab Rate</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1;
										$total_guard_price = 0;
										$total_penality = 0;
										$total_cab_price = 0;
										//For table indexing. 
										?>
								<?php foreach ($results as $record) {
											if ($record->guard == 1) {
												$total_guard_price += $record->guard_rate;
											}
											$total_cab_price += $record->car_rate;
											$total_penality += $record->penality;
											?>
									<tr>
										<th scope="row"><?php echo $i++; ?></th>
										<td><?php echo $record->shift_timing; ?></td>
										<td><?php echo ucfirst(strtolower($record->roster_type)); ?></td>
										<td><?php echo $record->vehicle_no; ?></td>
										<td><?php echo ucfirst(strtolower($record->vehicle_type)); ?></td>
										<td><?php echo $record->trip_id; ?></td>
										<td><?php echo ucfirst(strtolower($record->location)); ?></td>
										<td><?php echo ucfirst(strtolower($record->zone_name)); ?></td>
										<td><?php echo $record->zone_type . ' - ' . $record->zone_description; ?></td>
										<td><?= ($record->guard == 0) ? 'No' : 'Yes'; ?></td>
										<td><?= ($record->guard == 0) ? '0.00' : $record->guard_rate; ?></td>
										<td><?php echo $record->penality; ?></td>
										<td><?php echo $record->penality_clause; ?></td>
										<td><?php echo $record->car_rate; ?></td>

										<!-- <td class="text-center">
										<a href="#" class="btn btn-info btn-sm viewRoster" data-companyid="<?php echo $record->company_id; ?>" data-vendorid="<?php echo $record->vendor_id; ?>" data-vehicleid="<?php echo $record->vehicle_id; ?>">
											<i class="fas fa-eye white-text" aria-hidden="true"></i>
										</a>
									</td> -->

									</tr>

								<?php } ?>
								<tr>
									<td colspan="10" class="text-right"><strong>Sub Total:</strong></td>
									<td><strong><?php echo $total_guard_price; ?>/-</strong></td>
									<td><strong><?php echo $total_penality; ?>/-</strong></td>
									<td><strong>-</td>
									<td><strong><?php echo $total_cab_price; ?>/-</strong></td>
								</tr>
								<tr>
									<td colspan="10" class="text-right"><strong>Total:</strong></td>
									<td colspan="4"><strong><?php echo (($total_guard_price + $total_cab_price) - $total_penality); ?>/-</strong></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	<?php
		}
		function viewCompanyWiseRoster()
		{
			$results = array();
			$data['company_id'] = $company_id = $this->input->post('company_id');
			$data['vendor_id'] = $vendor_id = $this->input->post('vendor_id');
			$data['vehicle_id'] = $vehicle_id = $this->input->post('vehicle_id');
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');

			$data['start_date'] = $start_date;
			$data['end_date'] = $end_date;

			$results = $this->master_model->getZoneWiseReports($data);
			//pre($results);	
			$this->load->model('tax_model');
			$serviceTax = $this->tax_model->getServiceTaxs();

			$loanresults = $this->master_model->getVehicleLoans($data);
			$mcdresults = $this->master_model->getVehicleMcd($data);
			$taxresults = $this->master_model->getVehicleTax($data);
			$chargesresults = $this->master_model->getVendorPfEsi($data);

			?>

		<div class="modal fade" id="viewCompanyWiseRoster" tabindex="-1" role="dialog" aria-labelledby="viewCompanyWiseRoster" aria-hidden="true">
			<div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
				<div class="modal-content">
					<div class="modal-body table-responsive">
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4">
										<table class="table table-sm">
											<tbody>
												<tr>
													<td><strong>SewakCabs</strong></td>
													<td>Address</td>
												</tr>
												<tr>
													<td>City</td>
													<td>State</td>
												</tr>
											</tbody>
										</table>
									</div>
									<div class="col-md-2">&nbsp;</div>
									<div class="col-md-6">
										<table class="table table-sm text-right">
											<tbody>
												<tr>
													<td><strong>Vendor Name:</strong> <?= ucfirst(strtolower($results[0]->vendor_name)); ?></td>
													<td><strong>PAN:</strong> <?= strtoupper($results[0]->vendor_pan); ?></td>
												</tr>
												<tr>
													<td><strong>Vehicle No.:</strong> <?= $results[0]->vehicle_no; ?></td>
													<td><strong>Billing Month:</strong> <?= $start_date . ' <strong>To</strong> ' . $end_date; ?></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div><strong>Roster Details (A)</strong></div>
								<table class="table table-striped table-bordered table-sm">
									<thead class="thead-dark">
										<tr>
											<th scope="col">#</th>
											<th scope="col">Company Name</th>
											<th scope="col">Zone</th>
											<th scope="col">Vehicle</th>
											<th scope="col">Trip</th>
											<th scope="col">Guard Rate</th>
											<th scope="col">Rate</th>
											<th scope="col">Amount</th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1;
												$total_trip = 0;
												$total_guard_price = 0;
												$total_penality = 0;
												$total_cab_price = 0;
			$total_zone = array();
			$dataArr = array();
			//For table indexing. 
			$j = 0;


			$x = 0;
			$y = 0;
			$z = 0;
			$a = 1;
			$temp_number = '';
			$state_id = '';
												//For table indexing. 
												?>
										<?php foreach ($results as $record) {

													if ($record->guard == 1) {
														$total_guard_price += $record->guard_rate;
													}
													$total_trip += $record->total_trip;
													$total_cab_price += $record->cab_rate;
													$total_penality += $record->penality;

											if ($state_id != '' && $state_id != $record->state_id) {
												$x++;
											}

											$dataArr[$x]['state_id'] = $record->state_id;
											$dataArr[$x]['total_trip'] += $record->total_trip;

											$state_id = $record->state_id;

													?>
											<tr>
												<th scope="row"><?php echo $i++; ?></th>
												<td><?php echo $record->company_name; ?></td>
												<td><?php echo ucwords(strtolower($record->zone_name . ' - ' . $record->zone_description)); ?></td>
												<td><?php echo ucfirst(strtolower($record->vehicle_type)); ?></td>
												<td><?php echo $record->total_trip; ?></td>
												<td><?php echo $record->guard_rate; ?></td>
												<td><?php echo $record->rate; ?></td>
												<td><?= $record->guard_rate + $record->rate; ?></td>
											</tr>
										<?php } ?>
										<tr>
											<td colspan="4" class="text-right"><strong>Total - A</strong></td>
											<td><strong><?php echo $total_trip; ?></strong></td>
											<td><?= $total_guard_price ?></td>
											<td><strong><?php echo $total_cab_price; ?>/-</strong></td>
											<td><strong><?php echo $total_guard_price + $total_cab_price; ?>/-</strong></td>
										</tr>
									</tbody>
								</table>

								<?php
										$total_service_charge = 0;
										$total_advance_charge = 0;
										$total_deduction = 0;
										

										$total_service_charge = ((($total_guard_price + $total_cab_price) * $serviceTax[0]->price) / 100);


										$total_advance_charge = (($results[0]->advance_amount * $results[0]->advance_rate) / 100);
		//$total_deduction = ($total_service_charge + $total_advance_charge) + ($results[0]->office_charge + $results[0]->gps_rate + $results[0]->advance_amount) + $results[0]->total_penality;

		if (!empty($taxresults)) {
			$totaltax = 0;
			foreach ($taxresults as $tax) {

				//array_column($b2b_array, 'state_id')
				//pre($dataArr);
				foreach ($dataArr as $dataTax) {
					if ($dataTax['state_id'] == $tax->state_id) {
						$totaltax = $tax->total_tax * $dataTax['total_trip'];
					}
				}
			}
		}

										$total_deduction = ($total_service_charge + $total_advance_charge) + ($results[0]->office_charge + $results[0]->gps_rate + $results[0]->advance_amount) + ($results[0]->total_penality + $loanresults[0]->total_emi + $mcdresults[0]->total_mcd) + ($chargesresults[0]->total_pf + $chargesresults[0]->total_esi) - $totaltax;

										?>

								<div><strong>Deduction (B)</strong></div>
								<table class="table table-bordered table-sm">
									<thead class="thead-light">
										<tr>
											<th scope="col">Service Charge</th>
											<th scope="col">Office Charge</th>
											<th scope="col">GPS Rent</th>
											<th scope="col">Taxi/Penality</th>
											<th scope="col">PF/ESI</th>
											<th scope="col">MCD/TAX</th>
											<th scope="col">EMI</th>
											<th scope="col">Advance</th>
											<th scope="col">Advance Int.</th>
											<th scope="col"><strong>Total - B</strong></th>
											<!-- <th scope="col">Amount</th> -->
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><?php echo number_format($total_service_charge, 2); ?></td>
											<td><?= $results[0]->office_charge; ?></td>
											<td><?= $results[0]->gps_rate; ?></td>
											<td><?= $results[0]->total_penality; ?></td>
											<td><?= $chargesresults[0]->total_pf . '/' . $chargesresults[0]->total_esi ?></td>
											<td><?= $mcdresults[0]->total_mcd . '/' . $totaltax ?></td>
											<td><?= $loanresults[0]->total_emi ?></td>
											<td><?= $results[0]->advance_amount; ?></td>
											<td><?= $total_advance_charge; ?></td>
											<td><strong><?php echo number_format($total_deduction, 2); ?>/-</strong></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="float-right">
							<table class="table table-responsive table-sm">
								<tbody>
									<tr>
										<td class="text-dark">Total Roster (A)</td>
										<td><strong><?php echo number_format($total_guard_price + $total_cab_price, 2); ?>/-</strong></td>
									</tr>
									<tr>
										<td class="text-dark">Total Deduction (B)</td>
										<td><strong><?php echo number_format($total_deduction, 2); ?>/-</strong></td>
									</tr>
									<tr>
										<td class="text-dark">Previous Pending (C)</td>
										<td><strong>0.00/-</strong></td>
									</tr>
									<tr>
										<td class="text-primary">Net Payable Amount (A-B-C)</td>
										<td><strong><i class="fas fa-rupee-sign mr-1"></i><?php echo number_format(($total_guard_price + $total_cab_price) - $total_deduction, 2); ?>/-</strong></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		<?php
			}

			function vehicleReports()
			{
				$data['vehicleReport'] = $this->master_model->getVehicleReport();

				$process = 'All Reports';
				$processFunction = 'Manager/vehicleReports';
				$this->logrecord($process, $processFunction);

				$this->global['pageTitle'] = 'All Reports';

				$this->loadViews("master/reports/vehicleReports", $this->global, $data, NULL);
			}

			function vendorWiseReports()
			{
				$data['vendorReport'] = $this->master_model->getAllVendorReport();

				//pre($data['vendorReport']);


				/*
			$dataArr = $response = $b2b_array = $b2b_ids = array();

        if (isset($data['vendorReport']) && !empty($data['vendorReport'])) {

            $x = 0;
            $y = 0;
            $z = 0;
            $a = 1;
            $temp_number = '';
            $ctin = '';
            foreach($data['vendorReport'] as $dataIn) {

				if ($temp_number != '' && $temp_number != $dataIn->vendor_id) {
                    $z = 0;
                    $a = 1;
					
                }
				
				if ($ctin != '' && $ctin != $dataIn->company_id) {
                    $z = 0;
                    $y = 0;
					$x++;
                    
                }
				
				//pre($dataIn);

              //  $dataArr['b2b'][$x]['vendor_name'] = $dataIn->name;
				//$dataArr['b2b'][$x]['inv'][$x]['company_name'] = $dataIn->company_name;
                
				//$dataArr['b2b'][$x]['inv'][$y]['details'][$z]['num'] = (int) $a;
				//$dataArr['b2b'][$x]['inv'][$y]['details'][$z]['company_name'] = $dataIn->company_name;
               //$dataArr['b2b'][$x]['inv'][$y]['idt'] = date('d-m-Y', strtotime($dataIn->invoice_date));
                //$dataArr['b2b'][$x]['inv'][$y]['val'] = (float) $dataIn->invoice_total_value;
                //$dataArr['b2b'][$x]['inv'][$y]['pos'] = strlen($dataIn->supply_place) == '1' ? '0' . $dataIn->supply_place : $dataIn->supply_place;
               // $dataArr['b2b'][$x]['inv'][$y]['inv_typ'] = $dataIn->invoice_type;
                
				$ctin = $dataIn->company_id;

                $z++;
                $temp_number = $dataIn->vendor_id;
                $a++;
				$y++;
                $b2b_array[] = (array) $dataIn;
            }
            if (!empty($b2b_array)) {
                $b2b_ids = array_unique(array_column($b2b_array, 'roster_id'));
            }
        }
        $response['b2b_ids'] = $b2b_ids;
        $response['b2b_arr'] = $dataArr;
		
		
		pre($response['b2b_arr']);
			*/



































				$process = 'All Reports';
				$processFunction = 'Manager/vendorWiseReports';
				$this->logrecord($process, $processFunction);

				$this->global['pageTitle'] = 'All Vendor Reports';

				$this->loadViews("master/reports/vendorWiseReports", $this->global, $data, NULL);
			}


			function viewVehicleReport($id = NULL)
			{

				if ($id == null) {
					redirect('vehicleReports');
				}
				$data['vehicleCompany'] = $this->master_model->vehicleCompany($id);
				//$data['vehicleReport'] = $this->master_model->viewVehicleReport($id);			

				$process = 'All Reports';
				$processFunction = 'Manager/viewVehicleReport';
				$this->logrecord($process, $processFunction);

				$this->global['pageTitle'] = 'All Reports';

				$this->loadViews("master/reports/viewVehicleReport", $this->global, $data, NULL);
			}

			function getZoneByVendorId()
			{
				$results = array();
				if (isset($_GET['vendor_id'])) {
					$results = $this->master_model->getZoneByVendorId($_GET['vendor_id'], $_GET['company_id']);

					//Print out the array in a JSON format.
					header('Content-Type: application/json');
					echo json_encode($results);
				}
			}

			function getZoneTypeById()
			{
				$results = array();
				if (isset($_GET['zone_id'])) {
					$results = $this->master_model->getZoneTypeById($_GET['vendor_id'], $_GET['zone_id'], $_GET['company_id']);

					//Print out the array in a JSON format.
					header('Content-Type: application/json');
					echo json_encode($results);
				}
			}

			function getCabRate()
			{
				$results = array();

				$data['company_id'] = $this->input->post('company_id');
				$data['vendor_id'] = $this->input->post('vendor_id');
				$data['vehicle_id'] = $this->input->post('vehicle_id');
				$data['vehicle_type_id'] = $this->input->post('vehicle_type_id');
				$data['zone_id'] = $this->input->post('zone_id');
				$data['zone_type_id'] = $this->input->post('zone_type_id');

				if ($data['company_id'] != '' && $data['vehicle_type_id'] != '' && $data['zone_id'] != '' && $data['zone_type_id'] != '') {
					$results = $this->master_model->getCabRate($data);
					//Print out the array in a JSON format.
					header('Content-Type: application/json');
					echo json_encode($results);
				}
			}




			function deleteRoster()
			{
				$id =  $this->input->post('id');
				$description =  $this->input->post('description');

				$dataArr = array(
					'isDeleted' => 1,
					'delete_description' => $description,
					'updatedBy' => $this->vendorId,
					'updatedDtm' => date('Y-m-d H:i:s')
				);

				$result = $this->master_model->deleteRoster($id, $dataArr);

				if ($result == TRUE) {
					$process = 'Roster Delete';
					$processFunction = 'Manager/deleteRoster';
					$this->logrecord($process, $processFunction);

					echo 1;
				} else {
					echo 0;
				}
			}

			function cancelRoster()
			{
				$id =  $this->input->post('id');
				$description =  $this->input->post('description');

				$dataArr = array(
					'is_cancel' => 1,
					'cancel_description' => $description,
					'updatedBy' => $this->vendorId,
					'updatedDtm' => date('Y-m-d H:i:s')
				);

				$result = $this->master_model->cancelRoster($id, $dataArr);

				if ($result == TRUE) {
					$process = 'Roster Cancel';
					$processFunction = 'Manager/cancelRoster';
					$this->logrecord($process, $processFunction);

					echo 1;
				} else {
					echo 0;
				}
			}


			function cancelRosterWithTaxi()
			{
				$this->load->library('form_validation');

				$roster_detail_id = $this->input->post('id');
				$roster_id = $this->input->post('invoice_id');
				$company_id = $this->input->post('company_id');
				$vendor_id = $this->input->post('vendor_id');
				$vehicle_id = $this->input->post('vehicle_id');
				$taxi_number = $this->input->post('taxi_number');
				$amount = $this->input->post('amount');
				$description = $this->input->post('description');
				$statusId = 1;

				$dataArr = array(
					'roster_details_id' => $roster_detail_id,
					'roster_id' => $roster_id,
					'company_id' => $company_id,
					'vendor_id' => $vendor_id,
					'vehicle_id' => $vehicle_id,
					'taxi_number' => $taxi_number,
					'amount' => $amount,
					'description' => $description,
					'statusId' => $statusId,
					'createdBy' => $this->vendorId,
					'createdDtm' => date('Y-m-d H:i:s')
				);

				$dataArr2 = array(
					'is_cancel' => 1,
					'cancel_description' => $description,
					'updatedBy' => $this->vendorId,
					'updatedDtm' => date('Y-m-d H:i:s')
				);

				$this->master_model->cancelRoster($roster_detail_id, $dataArr2);

				$result = $this->master_model->cancelRosterWithTaxi($dataArr);

				if ($result > 0) {
					$process = 'Cancel Roster with Taxi';
					$processFunction = 'Master/cancelRosterWithTaxi';
					$this->logrecord($process, $processFunction);

					echo 1;
				} else {
					echo 0;
				}
			}

			function getZoneTypeByIds()
			{
				$results = array();
				if (isset($_GET['zone_id'])) {
					$results = $this->master_model->getZoneTypeByIds($_GET['zone_id']);

					//Print out the array in a JSON format.
					header('Content-Type: application/json');
					echo json_encode($results);
				}
			}

			function viewSearchRosterDetailsAll()
			{
				$results = array();
				$data['company_id'] = $company_id = $this->input->post('company_id');
				$data['vendor_id'] = $vendor_id = $this->input->post('vendor_id');
				$data['vehicle_id'] = $vehicle_id = $this->input->post('vehicle_id');
				$start_date = $this->input->post('start_date');
				$end_date = $this->input->post('end_date');

				$data['start_date'] = $start_date;
				$data['end_date'] = $end_date;

				$results = $this->master_model->viewSearchRosterDetailsAll($data);
				//pre($results);
				?>
			<style>
				table.table td,
				table.table th {
					padding-top: 4px;
					padding-bottom: 4px;
				}
			</style>

			<div class="modal fade" id="viewSearchRosterDetailsAlls" tabindex="-1" role="dialog" aria-labelledby="viewSearchRosterDetailsAlls" aria-hidden="true">
				<div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<div class="col-md-3">
								<h6 class="modal-title" id="modalLabel">Company Name: <strong><?= $results[0]->company_name ?></strong></h6>
							</div>
							<div class="col-md-3">
								<h6 class="modal-title" id="modalLabel">Vendor Name: <strong><?= $results[0]->vendor_name ?></strong></h6>
							</div>
							<div class="col-md-3">
								<h6 class="modal-title" id="modalLabel">Invoice No.: <strong><?= $results[0]->invoice_no ?></strong></h6>
							</div>
							<div class="col-md-3">
								<h6 class="modal-title" id="modalLabel">Invoice Date: <strong><?= $results[0]->invoice_date ?></strong></h6>
							</div>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body table-responsive">
							<table class="table table-striped table-bordered">
								<thead class="thead-dark">
									<tr>
										<th scope="col">#</th>
										<th scope="col">Shift Time</th>
										<th scope="col">Pick/Drop</th>
										<th scope="col">Company</th>
										<th scope="col">Cab No</th>
										<th scope="col">Cab Type</th>
										<th scope="col">Trip Id</th>
										<th scope="col">Location</th>
										<th scope="col">Zone Name</th>
										<th scope="col">Zone Type</th>
										<th scope="col">Guard</th>
										<th scope="col">Guard Rate</th>
										<th scope="col">Penality</th>
										<th scope="col">Penality Clouse</th>
										<th scope="col">Cab Rate</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
											$total_guard_price = 0;
											$total_penality = 0;
											$total_cab_price = 0;
											//For table indexing. 
											?>
									<?php foreach ($results as $record) {
												if ($record->guard == 1) {
													$total_guard_price += $record->guard_rate;
												}
												$total_cab_price += $record->car_rate;
												$total_penality += $record->penality;
												?>
										<tr>
											<th scope="row"><?php echo $i++; ?></th>
											<td><?php echo $record->shift_timing; ?></td>
											<td><?php echo ucfirst(strtolower($record->roster_type)); ?></td>
											<td><?php echo $record->company_name; ?></td>
											<td><?php echo $record->vehicle_no; ?></td>
											<td><?php echo ucfirst(strtolower($record->vehicle_type)); ?></td>
											<td><?php echo $record->trip_id; ?></td>
											<td><?php echo ucfirst(strtolower($record->location)); ?></td>
											<td><?php echo ucfirst(strtolower($record->zone_name)); ?></td>
											<td><?php echo $record->zone_type . ' - ' . $record->zone_description; ?></td>
											<td><?= ($record->guard == 0) ? 'No' : 'Yes'; ?></td>
											<td><?= ($record->guard == 0) ? '0.00' : $record->guard_rate; ?></td>
											<td><?php echo $record->penality; ?></td>
											<td><?php echo $record->penality_clause; ?></td>
											<td><?php echo $record->car_rate; ?></td>

											<!-- <td class="text-center">
										<a href="#" class="btn btn-info btn-sm viewRoster" data-companyid="<?php echo $record->company_id; ?>" data-vendorid="<?php echo $record->vendor_id; ?>" data-vehicleid="<?php echo $record->vehicle_id; ?>">
											<i class="fas fa-eye white-text" aria-hidden="true"></i>
										</a>
									</td> -->

										</tr>

									<?php } ?>
									<tr>
										<td colspan="10" class="text-right"><strong>Sub Total:</strong></td>
										<td><strong><?php echo $total_guard_price; ?>/-</strong></td>
										<td><strong><?php echo $total_penality; ?>/-</strong></td>
										<td><strong>-</td>
										<td><strong><?php echo $total_cab_price; ?>/-</strong></td>
									</tr>
									<tr>
										<td colspan="10" class="text-right"><strong>Total:</strong></td>
										<td colspan="4"><strong><?php echo (($total_guard_price + $total_cab_price) - $total_penality); ?>/-</strong></td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		<?php
			}


			function viewCompanyWiseRosterAll()
			{
				$results = array();
				$data['company_id'] = $company_id = $this->input->post('company_id');
				$data['vendor_id'] = $vendor_id = $this->input->post('vendor_id');
				$data['vehicle_id'] = $vehicle_id = $this->input->post('vehicle_id');
				$start_date = $this->input->post('start_date');
				$end_date = $this->input->post('end_date');

				$data['start_date'] = $start_date;
				$data['end_date'] = $end_date;

				$results = $this->master_model->getZoneWiseReportsAll($data);
				//pre($results);	
				$this->load->model('tax_model');
				$serviceTax = $this->tax_model->getServiceTaxs();
				$loanresults = $this->master_model->getVehicleLoans($data);
				$mcdresults = $this->master_model->getVehicleMcd($data);
				$taxresults = $this->master_model->getVehicleTax($data);
				$chargesresults = $this->master_model->getVendorPfEsi($data);
				?>

			<div class="modal fade" id="viewCompanyWiseRosterAll" tabindex="-1" role="dialog" aria-labelledby="viewCompanyWiseRosterAll" aria-hidden="true">
				<div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
					<div class="modal-content">
						<div class="modal-body table-responsive">
							<div class="row">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-4">
											<table class="table table-sm">
												<tbody>
													<tr>
														<td><strong>SewakCabs</strong></td>
														<td>Address</td>
													</tr>
													<tr>
														<td>City</td>
														<td>State</td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="col-md-2">&nbsp;</div>
										<div class="col-md-6">
											<table class="table table-sm text-right">
												<tbody>
													<tr>
														<td><strong>Vendor Name:</strong> <?= ucfirst(strtolower($results[0]->vendor_name)); ?></td>
														<td><strong>PAN:</strong> <?= strtoupper($results[0]->vendor_pan); ?></td>
													</tr>
													<tr>
														<td><strong>Vehicle No.:</strong> <?= $results[0]->vehicle_no; ?></td>
														<td><strong>Billing Month:</strong> <?= $start_date . ' <strong>To</strong> ' . $end_date; ?></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div><strong>Roster Details (A)</strong></div>
									<table class="table table-striped table-bordered table-sm">
										<thead class="thead-dark">
											<tr>
												<th scope="col">#</th>
												<th scope="col">Company Name</th>
												<th scope="col">Zone</th>
												<th scope="col">Vehicle</th>
												<th scope="col">Trip</th>
												<th scope="col">Rate</th>
												<th scope="col">Guard Rate</th>
												<th scope="col">Amount</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1;
													$total_trip = 0;
													$total_guard_price = 0;
													$total_penality = 0;
													$total_cab_price = 0;
													$total_zone = array();
													$dataArr = array();
													//For table indexing. 
													$j = 0;


													$x = 0;
													$y = 0;
													$z = 0;
													$a = 1;
													$temp_number = '';
													$state_id = '';
													?>
											<?php foreach ($results as $record) {

														if ($record->guard == 1) {
															$total_guard_price += $record->guard_rate;
														}
														$total_trip += $record->total_trip;
														$total_cab_price += ($record->total_trip * $record->rate);
														$total_penality += $record->penality;


														if ($state_id != '' && $state_id != $record->state_id) {
															$x++;
														}

														$dataArr[$x]['state_id'] = $record->state_id;
														$dataArr[$x]['total_trip'] += $record->total_trip;

														$state_id = $record->state_id;





														?>
												<tr>
													<th scope="row"><?php echo $i++; ?></th>
													<td><?php echo $record->company_name; ?></td>
													<td><?php echo ucwords(strtolower($record->zone_name . ' - ' . $record->zone_description)); ?></td>
													<td><?php echo ucfirst(strtolower($record->vehicle_type)); ?></td>
													<td><?php echo $record->total_trip; ?></td>
													<td><?php echo $record->rate; ?></td>
													<td><?php echo $record->guard_rate; ?></td>

													<td><?= $record->guard_rate + ($record->total_trip * $record->rate); ?></td>
												</tr>
											<?php
														$j++;
													}



													?>
											<tr>
												<td colspan="4" class="text-right"><strong>Total - A</strong></td>
												<td><strong><?php echo $total_trip; ?></strong></td>

												<td><strong><?php echo $total_cab_price; ?>/-</strong></td>
												<td><?= $total_guard_price ?></td>
												<td><strong><?php echo $total_guard_price + $total_cab_price; ?>/-</strong></td>
											</tr>
										</tbody>
									</table>

									<?php
											$total_service_charge = 0;
											$total_advance_charge = 0;
											$total_deduction = 0;

											$total_service_charge = ((($total_guard_price + $total_cab_price) * $serviceTax[0]->price) / 100);


											$total_advance_charge = (($results[0]->advance_amount * $results[0]->advance_rate) / 100);
											//$total_deduction = ($total_service_charge + $total_advance_charge) + ($results[0]->office_charge + $results[0]->gps_rate + $results[0]->advance_amount) + $results[0]->total_penality;

											if (!empty($taxresults)) {
												$totaltax = 0;
												foreach ($taxresults as $tax) {

													//array_column($b2b_array, 'state_id')
													//pre($dataArr);
													foreach ($dataArr as $dataTax) {
														if ($dataTax['state_id'] == $tax->state_id) {
															$totaltax = $tax->total_tax * $dataTax['total_trip'];
														}
													}
												}
											}

											$total_deduction = ($total_service_charge + $total_advance_charge) + ($results[0]->office_charge + $results[0]->gps_rate + $results[0]->advance_amount) + ($results[0]->total_penality + $loanresults[0]->total_emi + $mcdresults[0]->total_mcd) + ($chargesresults[0]->total_pf + $chargesresults[0]->total_esi) - $totaltax;



											?>

									<div><strong>Deduction (B)</strong></div>
									<table class="table table-bordered table-sm">
										<thead class="thead-light">
											<tr>
												<th scope="col">Service Charge</th>
												<th scope="col">Office Charge</th>
												<th scope="col">GPS Rent</th>
												<th scope="col">Taxi/Penality</th>
												<th scope="col">PF/ESI</th>
												<th scope="col">MCD/TAX</th>
												<th scope="col">EMI</th>
												<th scope="col">Advance</th>
												<th scope="col">Advance Int.</th>
												<th scope="col"><strong>Total - B</strong></th>
												<!-- <th scope="col">Amount</th> -->
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><?php echo number_format($total_service_charge, 2); ?></td>
												<td><?= $results[0]->office_charge; ?></td>
												<td><?= $results[0]->gps_rate; ?></td>
												<td><?= $results[0]->total_penality; ?></td>
												<td><?= $chargesresults[0]->total_pf . '/' . $chargesresults[0]->total_esi ?></td>
												<td><?= $mcdresults[0]->total_mcd . '/' . $totaltax ?></td>
												<td><?= $loanresults[0]->total_emi ?></td>
												<td><?= $results[0]->advance_amount; ?></td>
												<td><?= $total_advance_charge; ?></td>
												<td><strong><?php echo number_format($total_deduction, 2); ?>/-</strong></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="float-right">
								<table class="table table-responsive table-sm">
									<tbody>
										<tr>
											<td class="text-dark">Total Roster (A)</td>
											<td><strong><?php echo number_format($total_guard_price + $total_cab_price, 2); ?>/-</strong></td>
										</tr>
										<tr>
											<td class="text-dark">Total Deduction (B)</td>
											<td><strong><?php echo number_format($total_deduction, 2); ?>/-</strong></td>
										</tr>
										<tr>
											<td class="text-dark">Previous Pending (C)</td>
											<td><strong>0.00/-</strong></td>
										</tr>
										<tr>
											<td class="text-primary">Net Payable Amount (A-B-C)</td>
											<td><strong><i class="fas fa-rupee-sign mr-1"></i><?php echo number_format(($total_guard_price + $total_cab_price) - $total_deduction, 2); ?>/-</strong></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
		<?php
			}
		}

		?>