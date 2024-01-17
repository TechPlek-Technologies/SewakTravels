<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Bharat Verma / bharatverma.verma@gmail.com
 * @version : 1.0
 * @since : 27.02.2018
 */
class CabCompany extends BaseController
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
		$this->load->model('vendor_model');
		$this->load->model('vehicle_model');
		$this->load->model('cabcompany_model');
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
    function cabCompanyListing()
    {
		$data['companyRecords'] = $this->cabcompany_model->cabCompanyListing();		

		$process = 'All of Companies';
		$processFunction = 'Manager/companyListing';
		$this->logrecord($process,$processFunction);

		$this->global['pageTitle'] = 'All of Companies';
		
		$this->loadViews("master/cab_company_attach/cabCompanyListing", $this->global, $data, NULL);
    }
	
	/**
     * This function is used to load the add new Tax
     */
    function addNewCabCompany()
    {
		$data['companyList'] = $this->company_model->companyList();
		$data['zoneList'] = $this->zone_model->getAllZoneList();
		//$data['zoneType'] = $this->zone_model->getZoneTypes();
		$data['vendorList'] = $this->vendor_model->getAllVendorsVehicleWise();
		$data['vehicleTypeList'] = $this->vehicle_model->getVehicleTypeList();
		//$data['vehicleList'] = $this->vehicle_model->getAllVehicleList();
		$this->global['pageTitle'] = 'Add a Cab + Company';
				
		$this->loadViews("master/cab_company_attach/addNewCabCompany", $this->global, $data, NULL);
    }
	


     /**
     * This function is used to add new Tax to the system
     */
    function addNewCabCompanies()
    {
		$vehicleTypeList = $this->vehicle_model->getVehicleTypeList();
		$vehicleTypeCount = count($vehicleTypeList);
		
		$params = array();
		parse_str($_POST['invoiceData'], $params);
		
		if (empty($params)) {
			$resultsend['status'] = "error";
			$resultsend['message'] = "Please enter mandatory fields";
			echo json_encode($resultsend);
			die;
		}
		$cabItemArray = array();
		$invoiceTotalAmount = 0.00;
		
		$dataInvoiceArr = array();
		$cabArray = array();
		$cabRateArray = array();

		if(isset($params['company_id']) && count($params['company_id']) > 0) {

			$companies = count($params['company_id']);
				
			for($i=0; $i < $companies; $i++) {
				
				$company_id = $dataInvoiceArr['company_id'] = $params['company_id'][$i];
				$dataInvoiceArr['zone_id'] = isset($params['company_zone'][$i]) ? $params['company_zone'][$i] : 0;
				$dataInvoiceArr['zone_type_id'] = isset($params['company_zone_type'][$i]) ? $params['company_zone_type'][$i] : 0;
				$dataInvoiceArr['guard_price'] = isset($params['company_guard_rate'][$i]) ? $params['company_guard_rate'][$i] : 0.00;

				if(isset($params['company_cab_id'.$company_id]) && count($params['company_cab_id'.$company_id]) > 0) 
				{
					$totalCabCompanies = count($params['company_cab_id'.$company_id]);
					
					for($ij=0; $ij < $totalCabCompanies; $ij++) 
					{
						//$cabRateArray[$ij]['vendor_company_id'] = $result;
						$cabArray[$ij]['vendor_id'] = $params['vendor_id'];
						$cabArray[$ij]['company_id'] = $company_id;
						$cabArray[$ij]['zone_id'] = $params['company_zone'.$company_id][$ij];
						$cabArray[$ij]['zone_type_id'] = $params['company_zone_type'.$company_id][$ij];
						$cabArray[$ij]['guard_price'] = $params['company_guard_rate'.$company_id][$ij];
						$cabArray[$ij]['statusId'] = 1;
						$cabArray[$ij]['createdBy'] = $this->vendorId;
						$cabArray[$ij]['createdDtm'] = date('Y-m-d H:i:s');						
							
						for($j=0; $j < $vehicleTypeCount; $j++) 
						{
							$company_cab_rate = count($params['company_cab_rate_'.$company_id.$j]);				

							for($k=0; $k < $company_cab_rate; $k++) 
							{								
								$cabRateArray[$k][$j]['rate'] = isset($params['company_cab_rate_'.$company_id.$j][$k]) ? $params['company_cab_rate_'.$company_id.$j][$k] : 0.00;
								$cabRateArray[$k][$j]['vehicle_type_id'] = isset($params['company_vehicle_type_id_'.$company_id.$j][$k]) ? $params['company_vehicle_type_id_'.$company_id.$j][$k] : 0.00;
								$cabRateArray[$k][$j]['statusId'] = 1;
								$cabRateArray[$k][$j]['createdBy'] = $this->vendorId;
								$cabRateArray[$k][$j]['createdDtm'] = date('Y-m-d H:i:s');	
													
							}
						}
						$result = $this->cabcompany_model->addNewCabCompanies($cabArray[$ij]);
						
						if($result > 0)
						{
							$process = 'Create New Cab Price';
							$processFunction = 'Cabcompany/addNewCabCompanies';
							$this->logrecord($process,$processFunction);
							
							$processedCabItemArray = array();
							foreach($cabRateArray[$ij] as $itemArr) {

								$itemArr['vendor_company_id'] = $result;
								array_push($processedCabItemArray, $itemArr);
							}
							
							$result = $this->cabcompany_model->addNewCabPrice($processedCabItemArray);
							$flag = 1;
										
						}
						else
						{
							$flag = 0;
						}				
					}			
				}				
			}
			
			if($flag == 1)
			{
				$resultsend['status'] = "success";
				$resultsend['message'] = "Cab price create successfully";
				echo json_encode($resultsend);
				die;
			}
			else
			{
				$resultsend['status'] = "error";
				$resultsend['message'] = "Cab price creation failed";
				echo json_encode($resultsend);
				die;
			}
		}
		
	}

	function updateCompanyRate()
	{
		$vehicleTypeList = $this->vehicle_model->getVehicleTypeList();
		$vehicleTypeCount = count($vehicleTypeList);

		$params = array();
		parse_str($_POST['invoiceData'], $params);

		if (empty($params)) {
			$resultsend['status'] = "error";
			$resultsend['message'] = "Please enter mandatory fields";
			echo json_encode($resultsend);
			die;
		}

		$dataInvoiceArr = array();
		$cabArray = array();
		$cabRateArray = array();

		if (isset($params['company_id'])) {



				$company_id = $dataInvoiceArr['company_id'] = $params['company_id'];
				$dataInvoiceArr['zone_id'] = isset($params['company_zone']) ? $params['company_zone'] : 0;
				$dataInvoiceArr['zone_type_id'] = isset($params['company_zone_type']) ? $params['company_zone_type'] : 0;
				$dataInvoiceArr['guard_price'] = isset($params['company_guard_rate']) ? $params['company_guard_rate'] : 0.00;

				if (isset($params['vendor_company_id']) && count($params['vendor_company_id']) > 0) {
					$totalCabCompanies = count($params['vendor_company_id']);

		for ($ij = 0; $ij < $totalCabCompanies; $ij++) {
			//$cabArray[$ij]['id'] = $params['vendor_company_id'][$ij];
			$cabArray[$ij]['vendor_id'] = $params['vendor_id'];
			$cabArray[$ij]['company_id'] = $company_id;
			$cabArray[$ij]['zone_id'] = $params['company_zone'][$ij];
			$cabArray[$ij]['zone_type_id'] = $params['company_zone_type'][$ij];
			$cabArray[$ij]['guard_price'] = $params['company_guard_rate'][$ij];
			$cabArray[$ij]['statusId'] = 1;
			$cabArray[$ij]['createdBy'] = $this->vendorId;
			$cabArray[$ij]['createdDtm'] = date('Y-m-d H:i:s');

			for ($j = 0; $j < $vehicleTypeCount; $j++) {
				$company_cab_rate = count($params['company_cab_rate_' . $j]);

				for ($k = 0; $k < $company_cab_rate; $k++) {
					//$cabRateArray[$k][$j]['vendor_company_id'] = $params['vendor_company_id'][$ij];
					$cabRateArray[$k][$j]['rate'] = isset($params['company_cab_rate_'.$j][$k]) ? $params['company_cab_rate_' . $j][$k] : 0.00;
					$cabRateArray[$k][$j]['vehicle_type_id'] = isset($params['company_vehicle_type_id_' . $j][$k]) ? $params['company_vehicle_type_id_'.$j][$k] : 0.00;
					$cabRateArray[$k][$j]['statusId'] = 1;
					$cabRateArray[$k][$j]['createdBy'] = $this->vendorId;
					$cabRateArray[$k][$j]['createdDtm'] = date('Y-m-d H:i:s');
				}
			}

						//pre($params['vendor_company_id'][$ij]);
						//pre($cabArray[$ij]);
						//pre($cabRateArray[$ij]);
						//die();
						//echo $params['vendor_company_id'][$ij];
						//die();
						$this->cabcompany_model->deleteCabVendorPrice($params['vendor_company_id'][$ij]);
						//die();
						$this->cabcompany_model->deleteCabCompany($params['vendor_company_id'][$ij]);
						$result = $this->cabcompany_model->updateCabCompanies($cabArray[$ij]);
						$flag = 1;

						if ($result > 0) {
							$process = 'Vendor Cab Price Update';
							$processFunction = 'Cabcompany/updateCompanyRate';
							$this->logrecord($process, $processFunction);

							$processedCabItemArray = array();
							foreach ($cabRateArray[$ij] as $itemArr) {

								$itemArr['vendor_company_id'] = $result;
								array_push($processedCabItemArray, $itemArr);
							}

							$result = $this->cabcompany_model->updateCabPrice($processedCabItemArray);
							$flag = 1;
						} else {
							$flag = 0;
						}
					}
				}


			if ($flag == 1) {
				$resultsend['status'] = "success";
				$resultsend['message'] = "Cab price update successfully";
				echo json_encode($resultsend);
				die;
			} else {
				$resultsend['status'] = "error";
				$resultsend['message'] = "Cab price update failed";
				echo json_encode($resultsend);
				die;
			}
		}
	}

    /**
     * This function is used to open edit taxs view
     */
    function editOldCabCompany($id = NULL)
    {
		if($id == null)
		{
			redirect('cabCompanyListing');
		}
		
		$data['companyList'] = $this->company_model->companyList();
		$data['zoneList'] = $this->zone_model->getAllZoneList();
		$data['vendorList'] = $this->vendor_model->getAllVendors();
		$data['vehicleTypeList'] = $this->vehicle_model->getVehicleTypeList();	
		
		$data['cabCompanyInfo'] = $this->cabcompany_model->getCabCompanyInfo($id);

		$data['vehicleList'] = $this->vehicle_model->getVehiclesByVendorId($data['cabCompanyInfo'][0]->vendor_id);

		$data['zoneType'] = $this->zone_model->getAttachedZoneListById($data['cabCompanyInfo'][0]->zone_id);
		
		$data['getCabRates'] = $this->cabcompany_model->getCabRatesbyVendor($data['cabCompanyInfo'][0]->vendor_id);

		//pre($data['getCabRates']);
		
		$this->global['pageTitle'] = 'Cab Company Edit';		
		$this->loadViews("master/cab_company_attach/editOldCabCompany", $this->global, $data, NULL);
    }

	function editCabCompanyRate($id = NULL, $vendor_id, $company_id)
    {
		if($vendor_id == null)
		{
			redirect('cabCompanyListing');
		}
		
		$data['companyList'] = $this->company_model->companyList();
		$data['zoneList'] = $this->zone_model->getAllZoneList();
		$data['vendorList'] = $this->vendor_model->getAllVendors();
		$data['vehicleTypeList'] = $this->vehicle_model->getVehicleTypeList();	
		
		$data['cabCompanyInfo'] = $this->cabcompany_model->getCabCompanyInfo($id);
		//pre($data['cabCompanyInfo']);
		$data['vehicleList'] = $this->vehicle_model->getVehiclesByVendorId($vendor_id);

		$data['zoneType'] = $this->zone_model->getAttachedZoneListById($data['cabCompanyInfo'][0]->zone_id);


		//pre($data['zoneType']);


		//$data['getCabRates'] = $this->cabcompany_model->getCabRatesbyVendor($vendor_id);
		$data['getCabRates'] = $this->cabcompany_model->getCabRatesbyVendor($vendor_id, $company_id);
		//pre($data['getCabRates']);

		$getCabRates = $data['getCabRates'];

		$dataArr = $response = $b2b_array = array();
		if (isset($getCabRates) && !empty($getCabRates)) {

			$x = 0;
			$y = 0;
			$z = 0;
			$a = 1;
			$temp_number = '';
			$ctin = '';
			foreach ($getCabRates as $dataIn) {

				if ($temp_number != '' && $temp_number != $dataIn->zone_type_id) {
					$z = 0;
					$y++;
					$a = 1;
				}

				if ($ctin != '' && $ctin != $dataIn->zone_id) {
					$z = 0;
					$y = 0;
					$x++;
				}

				$dataArr['cab_rates'][$x]['vendor_company_id'] = $dataIn->vendor_company_id;
				$dataArr['cab_rates'][$x]['vendor_id'] = $dataIn->vendor_id;
				$dataArr['cab_rates'][$x]['company_id'] = $dataIn->company_id;
				//$dataArr['cab_rates'][$x]['zone_id'] = $dataIn->zone_id;
				//$dataArr['cab_rates'][$x]['zone_type_id'] = $dataIn->zone_type_id;
				
				$dataArr['cab_rates'][$x]['zones'][$y]['vendor_company_id'] = $dataIn->vendor_company_id;
				$dataArr['cab_rates'][$x]['zones'][$y]['zone_id'] = $dataIn->zone_id;
				$dataArr['cab_rates'][$x]['zones'][$y]['zone_type_id'] = $dataIn->zone_type_id;

				//$dataArr['cab_rates'][$x]['zone_type_id'][$y][] = $dataIn->zone_type_id;

				//$dataArr['cab_rates'][$x]['zones'][$y]['vehicle_type_id'] = $dataIn->vehicle_type_id;
				//$dataArr['cab_rates'][$x]['inv'][$y]['zone_type_id'] = $dataIn->zone_type_id;

				//$dataArr['cab_rates'][$x]['inv'][$y]['itms'][$z]['num'] = (int) $a;
				$dataArr['cab_rates'][$x]['zones'][$y]['itms'][$z]['vendor_company_price_id'] = $dataIn->vendor_company_price_id;
				$dataArr['cab_rates'][$x]['zones'][$y]['itms'][$z]['vehicle_type_id'] = $dataIn->vehicle_type_id;
				$dataArr['cab_rates'][$x]['zones'][$y]['itms'][$z]['rt'] = (float) $dataIn->rate;
				//$dataArr['cab_rates'][$x]['inv'][$y]['itms'][$z]['itm_det']['rt'] = (float) $dataIn->rate;



				//$dataArr['cab_rates'][$x]['inv'][$y]['vehicle_type_id'] = $dataIn->vehicle_type_id;
				//$dataArr['cab_rates'][$x]['inv'][$y]['rate'] = $dataIn->rate;
				//$dataArr['b2b'][$x]['inv'][$y]['inv_typ'] = $dataIn->invoice_type;
				//$dataArr['b2b'][$x]['inv'][$y]['rchrg'] = $dataIn->reverse_charge;

				$dataArr['cab_rates'][$x]['zones'][$y]['guard_price'] = $dataIn->guard_price;

				$ctin = $dataIn->zone_id;

				$z++;
				$temp_number = $dataIn->zone_type_id;
				$a++;
				$b2b_array[] = (array) $dataIn;
			}
		}

		$data['cab_rates'] = $dataArr;
		//pre($data['cab_rates']);
		//die;
	

		//pre($data['zoneType']);
		$this->global['pageTitle'] = 'Cab Company Edit';		
		$this->loadViews("master/cab_company_attach/editCabCompanyRate", $this->global, $data, NULL);
    }
    /**
     * This function is used to edit taxs
     */
    function editCabCompany()
    {            
        $this->load->library('form_validation');

        //$this->form_validation->set_rules('vehicle_id','Vehicle No.','required');
		$this->form_validation->set_rules('company_id','Company Name','required|numeric');
		$this->form_validation->set_rules('zone_id','Zone Name','required|numeric');
		$this->form_validation->set_rules('zone_type','Zone Type','required|numeric');
		$this->form_validation->set_rules('cab_rate_vendor','Cab Rate (Vendor)','required|numeric');
		if($this->global['role'] == ROLE_ADMIN) { 
			$this->form_validation->set_rules('cab_rate_company','Cab Rate (Company)','required|numeric');
		}
		$this->form_validation->set_rules('guard','Guard','required|numeric');
		$this->form_validation->set_rules('guard_price','Guard Price (V)','required|numeric');
		$this->form_validation->set_rules('guard_price_company','Guard Price (C)','required|numeric');
		
		$this->form_validation->set_rules('status','Status','required|numeric');
        
        $cabCompanyId = $this->input->post('cabCompanyId');

        if($this->form_validation->run() == FALSE)
        {
            $this->editOldCabCompany($cabCompanyId);
        }
        else
        {
			$cabCompanyInfo = array();
            $vendor_id = $this->input->post('vendor_id');
            $vehicle_id = $this->input->post('vehicle_id');
			$company_id = $this->input->post('company_id');
			$zone_id = $this->input->post('zone_id');
			$zone_type_id = $this->input->post('zone_type');
			$cab_rate_vendor = $this->input->post('cab_rate_vendor');
			$cab_rate_company = $this->input->post('cab_rate_company');
			$guard = $this->input->post('guard');
			$guard_price = $this->input->post('guard_price');	
			$guard_price_company = $this->input->post('guard_price_company');
			$statusId = $this->input->post('status');
			
			
			//foreach($vehicle_id as $vehicle) 
			//{
				$cabCompanyInfo = array(
					'vendor_id' => $vendor_id,
					'vehicle_id' => $vehicle_id,
					'company_id' => $company_id,
					'zone_id' => $zone_id,
					'zone_type_id' => $zone_type_id,
					'cab_rate_vendor' => $cab_rate_vendor,
					'cab_rate_company' => $cab_rate_company,
					'guard' => $guard,
					'guard_price' => $guard_price,
					'guard_price_company' => $guard_price_company,
					'statusId' => $statusId,
					'updatedBy'=>$this->vendorId,
					'updatedDtm'=>date('Y-m-d H:i:s')
				);
			//}
			
			//pre($cabCompanyInfo);
			//die();
		
                                
            $checkCabCompany = $this->cabcompany_model->checkCabCompanyExist($vehicle_id, $company_id, $zone_id, $zone_type_id, $cabCompanyId);

                if($checkCabCompany == false)
                {
                    $result = $this->cabcompany_model->editCabCompany($cabCompanyInfo, $cabCompanyId);
            
                    if($result > 0)
                    {
                        $process = 'Cab Company Edit';
                        $processFunction = 'Manager/editCabCompany';
                        $this->logrecord($process,$processFunction);
                        $this->session->set_flashdata('success', 'Cab Company Edit successful');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Cab Company Edit failed');
                    }
                }
                else{
                    $this->session->set_flashdata('error', 'Cab Company already in record');
                }
                redirect('cabCompanyListing');

            }
    }

    /**
     * This function is used to delete taxs
     */
    function deleteCabCompany($companyId = NULL)
    {
        if($companyId == null)
		{
			redirect('cabCompanyListing');
		}

		$result = $this->cabcompany_model->deleteCabCompany($companyId);
		
		if ($result == TRUE) {
			 $process = 'Cab Company Delete';
			 $processFunction = 'Manager/deleteCabCompany';
			 $this->logrecord($process,$processFunction);

			 $this->session->set_flashdata('success', 'Cab Company delete successful');
			}
		else
		{
			$this->session->set_flashdata('error', 'Cab Company delete failed');
		}
		redirect('cabCompanyListing');
    }
	

	
	function getCabCompanyRate()
    {
        $results = array();
		
		$data['company_id'] = $this->input->post('company_id');
		$data['vendor_id'] = $this->input->post('vendor_id');
		$data['vehicle_id'] = $this->input->post('vehicle_id');
		$data['zone_id'] = $this->input->post('zone_id');
		$data['zone_type_id'] = $this->input->post('zone_type_id');

		if(!empty($data['company_id']) && !empty($data['vendor_id']) && !empty($data['vehicle_id']) && !empty($data['zone_id']) && !empty($data['zone_type_id']))
		{
			$results = $this->cabcompany_model->getCabCompanyRate($data);
		
			//Print out the array in a JSON format.
			header('Content-Type: application/json');
			echo json_encode($results);
		}
    }

	
	function viewCabCompanyRates($vendor_id)
    {
		$data['companyRecords'] = $this->cabcompany_model->viewCabCompanyRates($vendor_id);	

		$process = 'All of Companies Rates';
		$processFunction = 'Manager/viewCabCompanyRates';
		$this->logrecord($process,$processFunction);

		$this->global['pageTitle'] = 'All of Companies Rates';
		
		$this->loadViews("master/cab_company_attach/viewCabCompanyRates", $this->global, $data, NULL);
    }
}

?>