<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Bharat Verma / bharatverma.verma@gmail.com
 * @version : 1.0
 * @since : 27.02.2018
 */
class Vendor extends BaseController
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
	function vendorListing()
	{
		$data['vendorRecords'] = $this->vendor_model->getVendors();

		$process = 'All of Vendors';
		$processFunction = 'Manager/vendorListing';
		$this->logrecord($process, $processFunction);

		$this->global['pageTitle'] = 'All of Vendors';

		$this->loadViews("master/vendor/vendorListing", $this->global, $data, NULL);
	}


	/**
	 * This function is used to load the add new Tax
	 */
	function addNewVendor()
	{
		$data['states'] = $this->master_model->getStateList();
		$data['vehicle_type'] = $this->vehicle_model->getVehicleTypeList();
		$this->global['pageTitle'] = 'Add a Vendor';
		$this->loadViews("master/vendor/addNewVendor", $this->global, $data, NULL);
	}



	/**
	 * This function is used to add new Tax to the system
	 */
	function addNewVendors()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('salutation', 'Salutation', 'trim|required');
		$this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric');
		$this->form_validation->set_rules('pan', 'Pan', 'required|min_length[10]');
		$this->form_validation->set_rules('state', 'State', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->addNewVendor();
		} else {
			$salutation = $this->security->xss_clean($this->input->post('salutation'));
			$full_name = $this->security->xss_clean($this->input->post('full_name'));
			$company_name = $this->security->xss_clean($this->input->post('company_name'));
			$email = $this->security->xss_clean($this->input->post('email'));
			$mobile = $this->security->xss_clean($this->input->post('mobile'));
			$pan = $this->security->xss_clean($this->input->post('pan'));
			$gstin = $this->security->xss_clean($this->input->post('gstin'));
			$pincode = $this->input->post('pincode');
			$address = $this->security->xss_clean($this->input->post('address'));
			$city = $this->security->xss_clean($this->input->post('city'));
			$state = $this->input->post('state');
			$mcd_tax = @$this->input->post('mcd_tax');
			$state_tax = @$this->input->post('state_tax');
			$esi_no = @$this->input->post('esi_no');
			$esi_amount = 0;
			$pf_number = @$this->input->post('pf_number');
			$pf_amount = 0;
			$office_charge = $this->input->post('office_charge');
			$bank_name = $this->input->post('bank_name');
			$account_number = $this->input->post('account_number');
			$branch_name = $this->input->post('branch_name');
			$ifsc_code = $this->input->post('ifsc_code');

			$vendorInfo = array(
				'salutation' => $salutation,
				'name' => $full_name,
				'company_name' => $company_name,
				'email' => strtolower($email),
				'mobile' => $mobile,
				'pan' => strtoupper($pan),
				'gstin' => strtoupper($gstin),
				'pincode' => $pincode,
				'address' => $address,
				'city' => $city,
				'state' => $state,
				'mcd_tax' => $mcd_tax,
				'state_tax' => $state_tax,
				'esi_no' => $esi_no,
				'esi_amount' => $esi_amount,
				'pf_number' => $pf_number,
				'pf_amount' => $pf_amount,
				'office_charge' => $office_charge,
				'bank_name' => $bank_name,
				'account_number' => $account_number,
				'branch_name' => $branch_name,
				'ifsc_code' => $ifsc_code,
				'statusId' => 1,
				'createdBy' => $this->vendorId,
				'createdDtm' => date('Y-m-d H:i:s')
			);

			$checkVendorExist = $this->vendor_model->checkVendorExist($full_name, $mobile, $company_name, $pan);

			if ($checkVendorExist == false) {
				$result = $this->vendor_model->addNewVendors($vendorInfo);

				if ($result > 0) {
					$process = 'Add a Vendor';
					$processFunction = 'Manager/addNewVendors';
					$this->logrecord($process, $processFunction);

					$this->session->set_flashdata('success', 'Vendor created successfully');
				} else {
					$this->session->set_flashdata('error', 'Vendor creation failed');
				}
			} else {
				$this->session->set_flashdata('error', 'Vendor already in record');
			}

			redirect('addNewVendor');
		}
	}

	/**
	 * This function is used to open edit taxs view
	 */
	function editOldVendor($id = NULL)
	{
		if ($id == null) {
			redirect('vendorListing');
		}
		$data['states'] = $this->master_model->getStateList();
		$data['vehicle_type'] = $this->vehicle_model->getVehicleTypeList();
		$data['vendorInfo'] = $this->vendor_model->getVendorInfo($id);

		$this->global['pageTitle'] = 'Vendor Edit';

		$this->loadViews("master/vendor/editOldVendor", $this->global, $data, NULL);
	}

	/**
	 * This function is used to edit taxs
	 */
	function editVendor()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('salutation', 'Salutation', 'trim|required');
		$this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric');
		$this->form_validation->set_rules('pan', 'Pan', 'required|min_length[10]');
		$this->form_validation->set_rules('state', 'State', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		$vendorId = $this->input->post('vendorId');

		if ($this->form_validation->run() == FALSE) {
			$this->editOldVendor($vendorId);
		} else {
			$salutation = $this->security->xss_clean($this->input->post('salutation'));
			$full_name = $this->security->xss_clean($this->input->post('full_name'));
			$company_name = $this->security->xss_clean($this->input->post('company_name'));
			$email = $this->security->xss_clean($this->input->post('email'));
			$mobile = $this->security->xss_clean($this->input->post('mobile'));
			$pan = $this->security->xss_clean($this->input->post('pan'));
			$gstin = $this->security->xss_clean($this->input->post('gstin'));
			$pincode = $this->input->post('pincode');
			$address = $this->security->xss_clean($this->input->post('address'));
			$city = $this->security->xss_clean($this->input->post('city'));
			$state = $this->input->post('state');
			$mcd_tax = @$this->input->post('mcd_tax');
			$state_tax = @$this->input->post('state_tax');
			$esi_no = @$this->input->post('esi_no');
			$esi_amount = 0;
			$pf_number = @$this->input->post('pf_number');
			$pf_amount = 0;
			$office_charge = $this->input->post('office_charge');
			$bank_name = $this->input->post('bank_name');
			$account_number = $this->input->post('account_number');
			$branch_name = $this->input->post('branch_name');
			$ifsc_code = $this->input->post('ifsc_code');
			$statusId = $this->input->post('status');

			$vendorInfo = array(
				'salutation' => $salutation,
				'name' => $full_name,
				'company_name' => $company_name,
				'email' => strtolower($email),
				'mobile' => $mobile,
				'pan' => strtoupper($pan),
				'gstin' => strtoupper($gstin),
				'pincode' => $pincode,
				'address' => $address,
				'city' => $city,
				'state' => $state,
				'mcd_tax' => $mcd_tax,
				'state_tax' => $state_tax,
				'esi_no' => $esi_no,
				'esi_amount' => $esi_amount,
				'pf_number' => $pf_number,
				'pf_amount' => $pf_amount,
				'office_charge' => $office_charge,
				'bank_name' => $bank_name,
				'account_number' => $account_number,
				'branch_name' => $branch_name,
				'ifsc_code' => $ifsc_code,
				'statusId' => $statusId,
				'updatedBy' => $this->vendorId,
				'updatedDtm' => date('Y-m-d H:i:s')
			);

			$checkVendorExist = $this->vendor_model->checkVendorExist($full_name, $mobile, $company_name, $pan, $vendorId);

			if ($checkVendorExist == false) {
				$result = $this->vendor_model->editVendor($vendorId, $vendorInfo);

				if ($result > 0) {
					$process = 'Vendor Edit';
					$processFunction = 'Manager/editVendor';
					$this->logrecord($process, $processFunction);
					$this->session->set_flashdata('success', 'Vendor Edit successful');
				} else {
					$this->session->set_flashdata('error', 'Vendor Edit failed');
				}
			} else {
				$this->session->set_flashdata('error', 'Vendor already in record');
			}
			redirect('vendorListing');
		}
	}

	/**
	 * This function is used to delete taxs
	 */
	function deleteVendor()
	{
		$id =  $this->input->post('id');
		if ($id == null) {
			redirect('vendorListing');
		}

		$dataArr = array(
			'isDeleted' => 1,
			'updatedBy' => $this->vendorId,
			'updatedDtm' => date('Y-m-d H:i:s')
		);

		$result = $this->vendor_model->deleteVendor($id, $dataArr);

		if ($result == TRUE) {
			$process = 'Vendor Delete';
			$processFunction = 'Manager/deleteVendor';
			$this->logrecord($process, $processFunction);

			echo 1;
		} else {
			echo 0;
		}
	}

	/**
	 * This function used to show Tax
	 */
	function viewVendor($id = NULL)
	{
		if ($id == null) {
			redirect('vendorListing');
		}

		$data['vendorRecords'] = $this->vendor_model->getVendorDetails($id);
		$data['vehicleRecords'] = $this->vehicle_model->getVehicleInfoByVendorId($id);

		$process = 'All of Vendors';
		$processFunction = 'Manager/viewVendor';
		$this->logrecord($process, $processFunction);

		$this->global['pageTitle'] = 'All of Vendors';

		$this->loadViews("master/vendor/viewVendor", $this->global, $data, NULL);
	}

	function getZoneTypes()
	{
		$results = array();
		$id = $this->input->post('id');
		$results = $this->company_model->getBranchListbyCompanyId($id);

		if (!empty($results)) {
			foreach ($results as $result) {
				echo '<option value="' . $result->id . '">' . $result->name . '</option>';
			}
		}
	}




	function vendorCharges()
	{
		$data['vendorRecords'] = $this->vendor_model->getVendors();

		$process = 'All of Vendors';
		$processFunction = 'Manager/vendorCharges';
		$this->logrecord($process, $processFunction);

		$this->global['pageTitle'] = 'All of Vendors';

		$this->loadViews("master/vendor/vendorCharges", $this->global, $data, NULL);
	}


	/**
	 * This function is used to load the add new Tax
	 */
	function addNewVendorCharge()
	{
		$data['vendorList'] = $this->vendor_model->vendorList();
		$this->global['pageTitle'] = 'Add a Vendor';
		$this->loadViews("master/vendor/addNewVendorCharge", $this->global, $data, NULL);
	}



	/**
	 * This function is used to add new Tax to the system
	 */
	function addNewVendorCharges()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('vendor_id', 'Vendor', 'required|numeric');
		$this->form_validation->set_rules('month_id', 'Month', 'required|numeric');
		$this->form_validation->set_rules('esi_amount', 'ESI Amount', 'required|numeric');
		$this->form_validation->set_rules('pf_amount', 'PF Amount', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->addNewVendorCharge();
		} else {
			$vendor_id = $this->security->xss_clean($this->input->post('vendor_id'));
			$month_id = $this->security->xss_clean($this->input->post('month_id'));
			$esi_amount = $this->input->post('esi_amount');
			$pf_amount = $this->input->post('pf_amount');


			$info = array(
				'vendor_id' => $vendor_id,
				'month_id' => $month_id,
				'esi_amount' => $esi_amount,
				'pf_amount' => $pf_amount,
				'statusId' => 1,
				'createdBy' => $this->vendorId,
				'createdDtm' => date('Y-m-d H:i:s')
			);

			$checkExist = $this->vendor_model->checkVendorChargesExist($vendor_id, $month_id);

			if ($checkExist == false) {
				$result = $this->vendor_model->addNewVendorCharges($info);

				if ($result > 0) {
					$process = 'Add a Vendor Charges';
					$processFunction = 'Manager/addNewVendorCharges';
					$this->logrecord($process, $processFunction);

					$this->session->set_flashdata('success', 'Created successfully');
				} else {
					$this->session->set_flashdata('error', 'Creation failed');
				}
			} else {
				$this->session->set_flashdata('error', 'Already in record');
			}

			redirect('addNewVendorCharge');
		}
	}

	/**
	 * This function is used to open edit taxs view
	 */
	function editOldVendorCharge($id = NULL)
	{
		if ($id == null) {
			redirect('addNewVendorCharge');
		}
		$data['vendorList'] = $this->vendor_model->vendorList();
		$data['vendorInfo'] = $this->vendor_model->getChargesbyId($id);
		$data['records'] = $this->vendor_model->getChargesbyVendorId($data['vendorInfo'][0]->vendor_id);

		$this->global['pageTitle'] = 'Vendor charge Edit';

		$this->loadViews("master/vendor/editOldVendorCharge", $this->global, $data, NULL);
	}

	/**
	 * This function is used to edit taxs
	 */
	function editVendorCharge()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('esi_amount', 'ESI Amount', 'required|numeric');
		$this->form_validation->set_rules('pf_amount', 'PF Amount', 'required|numeric');
		$this->form_validation->set_rules('status', 'Status', 'required|numeric');

		$id = $this->input->post('id');

		if ($this->form_validation->run() == FALSE) {
			$this->editOldVendorCharge($id);
		} else {
			$esi_amount = $this->input->post('esi_amount');
			$pf_amount = $this->input->post('pf_amount');
			$statusId = $this->input->post('status');

			$info = array(
				'esi_amount' => $esi_amount,
				'pf_amount' => $pf_amount,
				'statusId' => $statusId,
				'updatedBy' => $this->vendorId,
				'updatedDtm' => date('Y-m-d H:i:s')
			);

			$result = $this->vendor_model->editVendorCharge($id, $info);

			if ($result > 0) {
				$process = 'Vendor charge Edit';
				$processFunction = 'Manager/editVendorCharge';
				$this->logrecord($process, $processFunction);
				$this->session->set_flashdata('success', 'Charge Edit successful');
			} else {
				$this->session->set_flashdata('error', 'Charge Edit failed');
			}
			$this->editOldVendorCharge($id);
		}
	}

	/**
	 * This function is used to delete taxs
	 */
	function deleteVendorCharge()
	{
		$id =  $this->input->post('id');

		$dataArr = array(
			'isDeleted' => 1,
			'updatedBy' => $this->vendorId,
			'updatedDtm' => date('Y-m-d H:i:s')
		);

		$result = $this->vendor_model->deleteVendorCharge($id, $dataArr);

		if ($result == TRUE) {
			$process = 'Vendor Delete';
			$processFunction = 'Manager/deleteVendorCharge';
			$this->logrecord($process, $processFunction);

			echo 1;
		} else {
			echo 0;
		}
	}


	function vendor_charges_template()
	{
		$vendor_id = $this->input->post('vendor_id');
		$data['records'] = $this->vendor_model->getChargesbyVendorId($vendor_id);
		?>
		<table class="table table-striped bg-white table-bordered table-sm">
			<caption class="lead">List of already associated PF/ESI with Vendor </caption>
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Vendor Name</th>
					<th scope="col">Month</th>
					<th scope="col">PF Amount (in <i class="fas fa-rupee-sign"></i>)</th>
					<th scope="col">ESI Amount (in <i class="fas fa-rupee-sign"></i>)</th>
					<th scope="col">Status</th>
					<th scope="col">Edit</th>
					<th scope="col">Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1;
						if (!empty($data['records'])) {
							?>
					<?php foreach ($data['records'] as $record) { ?>
						<tr>
							<th scope="row"><?php echo $i++; ?></th>
							<td><?php echo $record->vendor_name . ' - ' . $record->company_name; ?></td>
							<td><?php echo getMonthName($record->month_id); ?></td>
							<td><?php echo $record->pf_amount; ?></td>
							<td><?php echo $record->esi_amount; ?></td>
							<td><?= ($record->statusId == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>'; ?></td>
							<td class="text-center">
								<a href="<?php echo base_url() . 'editOldVendorCharge/' . $record->id; ?>">
									<i class="fas fa-pencil-alt blue-text" aria-hidden="true"></i>
								</a>
							</td>
							<td class="text-center">
								<a class="deleteVendorCharge" href="#" data-id="<?php echo $record->id; ?>">
									<i class="fas fa-minus-circle red-text" aria-hidden="true"></i>
								</a>
							</td>
						</tr>
					<?php }
							} else { ?>

					<tr>
						<td colspan="8">No records found!</td>
					</tr>

				<?php }
						?>
			</tbody>
		</table>
	<?php

		}

		/**
		 * This function is used to load the add new Tax
		 */
		function addNewVendorLoan()
		{
			$data['vendorList'] = $this->vendor_model->vendorList();
			$this->global['pageTitle'] = 'Add a Vendor';
			$this->loadViews("master/vendor/addNewVendorLoan", $this->global, $data, NULL);
		}



		/**
		 * This function is used to add new Tax to the system
		 */
		function addNewVendorLoans()
		{
			$this->load->library('form_validation');

			$this->form_validation->set_rules('vehicle_id', 'Vehicle No.', 'required|numeric');
			$this->form_validation->set_rules('loan_period', 'ESI Amount', 'required|numeric');
			$this->form_validation->set_rules('loan_rate', 'Loan Rate', 'required|numeric');
			$this->form_validation->set_rules('loan_amount', 'Loan Amount', 'required|numeric');

			if ($this->form_validation->run() == FALSE) {
				$this->addNewVendorLoans();
			} else {
				$vendor_id = $this->security->xss_clean($this->input->post('vendor_id'));
				$vehicle_id = $this->security->xss_clean($this->input->post('vehicle_id'));
				$vehicle_no = $this->security->xss_clean($this->input->post('vehicle_no'));
				$loan_period = $this->input->post('loan_period');
				$loan_rate = $this->input->post('loan_rate');
				$loan_amount = $this->input->post('loan_amount');
				$total_paid = $this->input->post('total_paid');
				$emi_per_month = $this->input->post('emi_per_month');
				$agreement_date = $this->input->post('agreement_date');

				$agreement_date_final  = date('Y-m-d', strtotime($agreement_date));


				$info = array(
					'loan_id' => generateSubscriberRandomCode(20),
					'vendor_id' => $vendor_id,
					'vehicle_id' => $vehicle_id,
					'vehicle_no' => $vehicle_no,
					'loan_period' => $loan_period,
					'loan_rate' => $loan_rate,
					'loan_amount' => $loan_amount,
					'total_paid' => $total_paid,
					'emi_per_month' => $emi_per_month,
					'agreement_date' => $agreement_date_final,
					'loan_type' => 'Personal',
					'loan_frequency' => 'Monthly',
					'currency' => 'INR',
					'statusId' => 1,
					'createdBy' => $this->vendorId,
					'createdDtm' => date('Y-m-d H:i:s')
				);


				$result = $this->vendor_model->addNewVendorLoans($info);

				$loanArray = array();
				$loanDetailsArray = array();
				$loanTenure = $loan_period * 12;
				$emi =  $total_paid / $loanTenure;

				$agreement_month_id = date('n', strtotime($agreement_date_final));
				$agreement_month_id = $agreement_month_id + 1;
				for ($i = 0; $i < $loanTenure; $i++) {

					$loanArray = array(
						"vendor_loan_id" => $result,
					// "emi" => number_format($emi, 2),
						"emi" => $emi,
						"month" => date('F', mktime(0, 0, 0, $agreement_month_id + $i, 0, 0)),
						"year" => date('Y', mktime(0, 0, 0, $agreement_month_id + $i, 0, date("Y"))),
						"statusId" => 1,
						"createdBy" => $this->vendorId,
						"createdDtm" => date('Y-m-d H:i:s')
					);

					array_push($loanDetailsArray, $loanArray);
				}


				$result = $this->vendor_model->addNewVendorLoanDetails($loanDetailsArray);

				if ($result > 0) {
					$process = 'Add a Vendor Loans';
					$processFunction = 'Manager/addNewVendorLoans';
					$this->logrecord($process, $processFunction);

					$this->session->set_flashdata('success', 'Created successfully');
				} else {
					$this->session->set_flashdata('error', 'Creation failed');
				}

				redirect('addNewVendorLoan');
			}
		}

		/**
		 * This function is used to open edit taxs view
		 */
		function editOldVendorLoan($id = NULL)
		{
			if ($id == null) {
				redirect('addNewVendorLoan');
			}
			$data['vendorList'] = $this->vendor_model->vendorList();
			$data['vendorInfo'] = $this->vendor_model->getLoansbyId($id);
			$data['records'] = $this->vendor_model->getLoansbyVendorId($data['vendorInfo'][0]->vehicle_id);

			$this->global['pageTitle'] = 'Vendor Loan Edit';

			$this->loadViews("master/vendor/editOldVendorLoan", $this->global, $data, NULL);
		}

		/**
		 * This function is used to edit taxs
		 */
		function editVendorLoan()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('loan_period', 'ESI Amount', 'required|numeric');
			$this->form_validation->set_rules('loan_rate', 'Loan Rate', 'required|numeric');
			$this->form_validation->set_rules('loan_amount', 'Loan Amount', 'required|numeric');

			$id = $this->input->post('id');

			if ($this->form_validation->run() == FALSE) {
				$this->editOldVendorLoan($id);
			} else {

				$loan_period = $this->input->post('loan_period');
				$loan_rate = $this->input->post('loan_rate');
				$loan_amount = $this->input->post('loan_amount');
				$total_paid = $this->input->post('total_paid');
				$emi_per_month = $this->input->post('emi_per_month');
				$agreement_date = $this->input->post('agreement_date');

				$agreement_date_final  = date('Y-m-d', strtotime($agreement_date));
				$statusId = $this->input->post('status');


				$info = array(
					'loan_period' => $loan_period,
					'loan_rate' => $loan_rate,
					'loan_amount' => $loan_amount,
					'total_paid' => $total_paid,
					'emi_per_month' => $emi_per_month,
					'agreement_date' => $agreement_date_final,
					'statusId' => $statusId,
					'updatedBy' => $this->vendorId,
					'updatedDtm' => date('Y-m-d H:i:s')
				);


				$result = $this->vendor_model->editVendorLoan($id, $info);


				$loanArray = array();
				$loanDetailsArray = array();
				$loanTenure = $loan_period * 12;
				$emi =  $total_paid / $loanTenure;

				$agreement_month_id = date('n', strtotime($agreement_date_final));
				$agreement_month_id = $agreement_month_id + 1;
				for ($i = 0; $i < $loanTenure; $i++) {

					$loanArray = array(
						"vendor_loan_id" => $id,
					// "emi" => number_format($emi, 2),
					"emi" => $emi,
						"month" => date('F', mktime(0, 0, 0, $agreement_month_id + $i, 0, 0)),
						"year" => date('Y', mktime(0, 0, 0, $agreement_month_id + $i, 0, date("Y"))),
						"statusId" => 1,
						"updatedBy" => $this->vendorId,
						"createdDtm" => date('Y-m-d H:i:s'),
						"updatedBy" => $this->vendorId,
						"updatedDtm" => date('Y-m-d H:i:s')
					);

					array_push($loanDetailsArray, $loanArray);
				}

				$this->vendor_model->deleteVendorLoanDetails($id);
				$result = $this->vendor_model->addNewVendorLoanDetails($loanDetailsArray);

				if ($result > 0) {
					$process = 'Vendor charge Edit';
					$processFunction = 'Manager/editVendorLoan';
					$this->logrecord($process, $processFunction);
					$this->session->set_flashdata('success', 'Loan Edit successful');
				} else {
					$this->session->set_flashdata('error', 'Loan Edit failed');
				}
				$this->editOldVendorLoan($id);
			}
		}

		/**
		 * This function is used to delete taxs
		 */
		function deleteVendorLoan()
		{
			$id =  $this->input->post('id');

			$dataArr = array(
				'isDeleted' => 1,
				'updatedBy' => $this->vendorId,
				'updatedDtm' => date('Y-m-d H:i:s')
			);

			$result = $this->vendor_model->deleteVendorLoan($id, $dataArr);

			if ($result == TRUE) {
				$process = 'Vendor Delete';
				$processFunction = 'Manager/deleteVendorLoan';
				$this->logrecord($process, $processFunction);

				echo 1;
			} else {
				echo 0;
			}
		}


		function vendor_loans_template()
		{
			$vendor_id = $this->input->post('vendor_id');
			$vehicle_id = $this->input->post('vehicle_id');
			$data['records'] = $this->vendor_model->getLoansbyVendorId($vehicle_id);
			?>
		<table class="table table-striped bg-white table-bordered table-sm">
			<caption class="lead">List of already associated Loan with Vendor </caption>
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Loan ID</th>
					<th scope="col">Vendor Name</th>
					<th scope="col">Loan Tenure</th>
					<th scope="col">Loan Rate %</th>
					<th scope="col">Loan Amount</th>
					<th scope="col">Tota Paid</th>
					<th scope="col">EMI/mo</th>
					<th scope="col">Agreement Date</th>
					<!-- <th scope="col">Status</th> -->
					<th scope="col">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1;
						if (!empty($data['records'])) {
							?>
					<?php foreach ($data['records'] as $record) { ?>
						<tr>
							<th scope="row"><?php echo $i++; ?></th>
							<td><?php echo $record->loan_id; ?></td>
							<td><?php echo $record->vendor_name; ?></td>
							<td><?php echo $record->loan_period; ?> Year's</td>
							<td><?php echo $record->loan_rate; ?></td>
							<td><?php echo $record->loan_amount; ?></td>
							<td><?php echo $record->total_paid; ?></td>
							<td><?php echo $record->emi_per_month; ?></td>
							<td><?php echo $record->agreement_date; ?></td>
							<!-- <td><?= ($record->statusId == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>'; ?></td> -->
							<td class="text-center">
								<a href="#" class="viewVendorLoan" data-id="<?php echo $record->id; ?>">
									<i class="fas fa-eye pink-text" aria-hidden="true"></i>
								</a>&nbsp;
								<a href="<?php echo base_url() . 'editOldVendorLoan/' . $record->id; ?>">
									<i class="fas fa-pencil-alt blue-text" aria-hidden="true"></i>
								</a>&nbsp;
								<a class="deleteVendorLoan" href="#" data-id="<?php echo $record->id; ?>">
									<i class="fas fa-minus-circle red-text" aria-hidden="true"></i>
								</a>
							</td>
						</tr>
					<?php }
							} else { ?>

					<tr>
						<td colspan="8">No records found!</td>
					</tr>

				<?php }
						?>
			</tbody>
		</table>
	<?php

		}



		function view_loans_template()
		{
			$id = $this->input->post('id');
			$data['records'] = $this->vendor_model->getLoansDetailsById($id);
			?>
		<table class="table table-striped bg-white table-bordered table-sm">
			<caption class="lead"><strong>Loan ID:</strong> <?php echo $data['records'][0]->loan_id; ?>,<strong> Loan Amount:</strong> <?php echo $data['records'][0]->loan_amount; ?>, <strong>Agreement Date:</strong> <?php echo $data['records'][0]->agreement_date; ?></caption>
			<thead class="thead-dark">
				<tr>
					<th scope="col">#</th>
					<th scope="col">EMI</th>
					<th scope="col">Month</th>
					<th scope="col">Year</th>
					<th scope="col">Status</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1;
						if (!empty($data['records'])) {
							?>
					<?php foreach ($data['records'] as $record) { ?>
						<tr>
							<th scope="row"><?php echo $i++; ?></th>
							<td><?php echo $record->emi; ?></td>
							<td><?php echo $record->month; ?></td>
							<td><?php echo $record->year; ?></td>
							<td><?php
												if ($record->statusId == 1) {
													echo '<span class="badge badge-danger">Unpaid</span>';
												} else if ($record->statusId == 2) {
													echo '<span class="badge badge-info">Paid</span>';
												} else {
													echo '<span class="badge badge-success">Active</span>';
												}
												?></td>
						</tr>
					<?php }
							} else { ?>

					<tr>
						<td colspan="8">No records found!</td>
					</tr>

				<?php }
						?>
			</tbody>
		</table>
<?php

	}
}

?>