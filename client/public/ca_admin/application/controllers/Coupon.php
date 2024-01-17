<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Bharat Verma / bharatverma.verma@gmail.com
 * @version : 1.0
 * @since : 27.02.2018
 */
class Coupon extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('coupon_model');

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
    function couponListings()
    {
		$data['records'] = $this->coupon_model->couponList();
		$process = 'All list of coupon';
		$processFunction = 'Coupon/couponListings';
		$this->logrecord($process,$processFunction);

		$this->global['pageTitle'] = 'All of coupons';            
		$this->loadViews("master/coupon/couponListings", $this->global, $data, NULL);
		
    }


    /**
     * This function is used to load the add new Tax
     */
    function addNewCoupon()
    {
		$this->global['pageTitle'] = 'Add new coupon';
		$data['code'] = generateSubscriberRandomCode(8);
		$this->loadViews("master/coupon/addNewCoupon", $this->global, $data, NULL);
    }


     /**
     * This function is used to add new Tax to the system
     */
    function addNewCoupons()
    {
		$this->load->library('form_validation');		
		
		$this->form_validation->set_rules('coupon_name','Coupon Name','required|trim');
		$this->form_validation->set_rules('coupon_code','Coupon Code','required|trim');
		$this->form_validation->set_rules('coupon_description','Coupon Description','required|trim');
		$this->form_validation->set_rules('coupon_type','Coupon Type','required|trim');
		$this->form_validation->set_rules('coupon_amount','Coupon Amount','required|numeric');
		$this->form_validation->set_rules('coupon_redeem','Coupon Redeem','required|numeric');
		$this->form_validation->set_rules('start_date','Start Date','required');
		$this->form_validation->set_rules('end_date','Expiry Date','required');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->addNewCoupon();
		}
		else
		{
			$coupon_name = $this->security->xss_clean($this->input->post('coupon_name'));
			$coupon_code = $this->security->xss_clean($this->input->post('coupon_code'));
			$coupon_description = $this->security->xss_clean($this->input->post('coupon_description'));
			$coupon_type = $this->security->xss_clean($this->input->post('coupon_type'));
			$coupon_amount = $this->security->xss_clean($this->input->post('coupon_amount'));
			$coupon_redeem = $this->security->xss_clean($this->input->post('coupon_redeem'));
			$start_date = $this->security->xss_clean($this->input->post('start_date'));
			$expiry_date = $this->security->xss_clean($this->input->post('end_date'));			
			$statusId = 1;
			
			$data = array(
				'name' => $coupon_name,
				'coupon_code' => strtoupper($coupon_code),
				'coupon_desc' => $coupon_description,
				'coupon_type' => $coupon_type,
				'coupon_amount' => $coupon_amount,
				'redeem' => $coupon_redeem,
				'coupon_start_date' => date('Y-m-d', strtotime($start_date)),
				'coupon_exp_date' => date('Y-m-d', strtotime($expiry_date)),					
				'statusId' => $statusId,
				'createdBy' => $this->vendorId,
				'createdDtm' => date('Y-m-d H:i:s')
			);
			
		   $check = $this->coupon_model->checkCoupon($coupon_code);

			if($check == false)
			{ 
				$result = $this->coupon_model->addNewCoupon($data);
			
				if($result > 0)
				{
					$process = 'Add a Coupon';
					$processFunction = 'Coupon/addNewCoupon';
					$this->logrecord($process,$processFunction);

					$this->session->set_flashdata('success', 'Coupon created successfully');
				}
				else
				{
					$this->session->set_flashdata('error', 'Coupon creation failed');
				}
			}
			else{
				$this->session->set_flashdata('error', 'Coupon already in record');
			}
			
			redirect('couponListings');
		}
	}

    /**
     * This function is used to open edit taxs view
     */
    function editOldCoupon($id = NULL)
    {
		if($id == null)
		{
			redirect('couponListings');
		}

		$data['coupon_info'] = $this->coupon_model->getCouponInfo($id);
		//$data['usa_coupon_info'] = $this->company_model->getCompanyRateById($id);

		$this->global['pageTitle'] = 'Coupon Edit';
		
		$this->loadViews("master/coupon/editOldCoupon", $this->global, $data, NULL);
    }

    /**
     * This function is used to edit taxs
     */
    function editCoupon()
    {           
        $this->load->library('form_validation');

        $this->form_validation->set_rules('coupon_name','Coupon Name','required|trim');
		$this->form_validation->set_rules('coupon_code','Coupon Code','required|trim');
		$this->form_validation->set_rules('coupon_description','Coupon Description','required|trim');
		$this->form_validation->set_rules('coupon_type','Coupon Type','required|trim');
		$this->form_validation->set_rules('coupon_amount','Coupon Amount','required|numeric');
		$this->form_validation->set_rules('coupon_redeem','Coupon Redeem','required|numeric');
		$this->form_validation->set_rules('start_date','Start Date','required');
		$this->form_validation->set_rules('end_date','Expiry Date','required');
		$this->form_validation->set_rules('status','Status','required|numeric');
        
        $id = $this->input->post('id');

        if($this->form_validation->run() == FALSE)
        {
            $this->editOldCoupon($id);
        }
        else
        {
            $id = $this->input->post('id');
			$coupon_name = $this->security->xss_clean($this->input->post('coupon_name'));
			$coupon_code = $this->security->xss_clean($this->input->post('coupon_code'));
			$coupon_description = $this->security->xss_clean($this->input->post('coupon_description'));
			$coupon_type = $this->security->xss_clean($this->input->post('coupon_type'));
			$coupon_amount = $this->security->xss_clean($this->input->post('coupon_amount'));
			$coupon_redeem = $this->security->xss_clean($this->input->post('coupon_redeem'));
			$start_date = $this->security->xss_clean($this->input->post('start_date'));
			$expiry_date = $this->security->xss_clean($this->input->post('end_date'));			
			$statusId = $this->input->post('status');
			
			$data = array(
				'name' => $coupon_name,
				'coupon_code' => strtoupper($coupon_code),
				'coupon_desc' => $coupon_description,
				'coupon_type' => $coupon_type,
				'coupon_amount' => $coupon_amount,
				'redeem' => $coupon_redeem,
				'coupon_start_date' => date('Y-m-d', strtotime($start_date)),
				'coupon_exp_date' => date('Y-m-d', strtotime($expiry_date)),					
				'statusId' => $statusId,
				'updatedBy' => $this->vendorId,
				'updatedDtm'=>date('Y-m-d H:i:s')
			);
                
                                
            $check = $this->coupon_model->checkCoupon($coupon_name, $id);

			if($check == false)
			{
				$result = $this->coupon_model->editCoupon($id, $data);
		
				if($result > 0)
				{
					$process = 'Coupon Edit';
					$processFunction = 'Coupon/editCoupon';
					$this->logrecord($process,$processFunction);
					$this->session->set_flashdata('success', 'Coupon Edit successful');
				}
				else
				{
					$this->session->set_flashdata('error', 'Coupon Edit failed');
				}
			}
			else{
				$this->session->set_flashdata('error', 'Coupon already in record');
			}
			redirect('couponListings');

		}

    }

    /**
     * This function is used to delete taxs
     */
    function deleteCoupon()
    {
		$id = $this->input->post('id');
        if($id == null)
		{
			redirect('couponListings');
		}
		
		$data = array(			
			'isDeleted' => 1,
			'updatedBy' => $this->vendorId,
			'updatedDtm'=>date('Y-m-d H:i:s')
		);

		$result = $this->coupon_model->deleteCoupon($id, $data);
		
		if ($result > 0) {
			 $process = 'Coupon Delete';
			 $processFunction = 'Coupon/deleteCoupon';
			 $this->logrecord($process,$processFunction);

			 echo 1;
			}
		else
		{
			echo 0;
		}
    }
}

?>