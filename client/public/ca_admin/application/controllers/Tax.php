<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Bharat Verma / bharatverma.verma@gmail.com
 * @version : 1.0
 * @since : 27.02.2018
 */
class Tax extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
		$this->load->model('master_model');
        $this->load->model('tax_model');
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
    function taxs()
    {
		$data['taxRecords'] = $this->tax_model->getTaxs();
		$data['serviceTaxRecords'] = $this->tax_model->getServiceTaxs();

		$process = 'All of Tax';
		$processFunction = 'Manager/taxs';
		$this->logrecord($process,$processFunction);

		$this->global['pageTitle'] = 'All of Taxs';		
		$this->loadViews("master/tax/taxs", $this->global, $data, NULL);
    }

    /**
     * This function is used to load the add new Tax
     */
    function addNewTax()
    {
		$data['states'] = $this->master_model->getStateList();
		$this->global['pageTitle'] = 'Add a Tax';
		$this->loadViews("master/tax/addNewTax", $this->global, $data, NULL);
    }
	
	/**
     * This function is used to load the add new Tax
     */
    function addNewServiceTax()
    {
		$data = array();
		$this->global['pageTitle'] = 'Add a Service Tax';
		$this->loadViews("master/tax/addNewServiceTax", $this->global, $data, NULL);
    }
	
	/**
     * This function is used to add new Tax to the system
     */
    function addNewServiceTaxs()
    {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('price','Service Tax Rate','required|numeric');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->addNewServiceTax();
		}
		else
		{
			$price = $this->input->post('price');
			$statusId = 1;
			
			$taxInfo = array('price' => $price, 'statusId' => $statusId, 'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'));
			
			$checkServiceTax = $this->tax_model->checkServiceTaxExist($price);

			if($checkServiceTax == false)
			{ 
				$result = $this->tax_model->addNewServiceTaxs($taxInfo);
			
				if($result > 0)
				{
					$process = 'Add a Service Tax';
					$processFunction = 'Manager/addNewServiceTaxs';
					$this->logrecord($process,$processFunction);

					$this->session->set_flashdata('success', 'Service Tax created successfully');
				}
				else
				{
					$this->session->set_flashdata('error', 'Service Tax creation failed');
				}
			}
			else{
				$this->session->set_flashdata('error', 'Service Tax already in record');
			}
			
			redirect('addNewServiceTax');
		}
	}
		
		/**
     * This function is used to open edit taxs view
     */
    function editOldServiceTax($serviceTaxId = NULL)
    {
		if($serviceTaxId == null)
		{
			redirect('taxs');
		}
		
		$data['serviceTaxInfo'] = $this->tax_model->getServiceTaxInfo($serviceTaxId);         
		$this->global['pageTitle'] = 'Service Tax Edit';            
		$this->loadViews("master/tax/editOldServiceTax", $this->global, $data, NULL);
    }

    /**
     * This function is used to edit taxs
     */
    function editServiceTax()
    {            
        $this->load->library('form_validation');
		$this->form_validation->set_rules('price','Service Tax Rate','required|numeric');
        
        $serviceTaxId = $this->input->post('serviceTaxId');

        if($this->form_validation->run() == FALSE)
        {
            $this->editOldServiceTax($serviceTaxId);
        }
        else
        {
            $price = $this->input->post('price');
            $statusId = 1;
            
            $taxInfo = array('price'=>$price, 'statusId'=> $statusId, 'updatedBy'=>$this->vendorId, 
                        'updatedDtm'=>date('Y-m-d H:i:s'));
                                
            //$checkServiceTax = $this->tax_model->checkServiceTaxExist($price, $serviceTaxId);

                //if($checkServiceTax == false)
                //{
                    $result = $this->tax_model->editServiceTax($taxInfo, $serviceTaxId);
            
                    if($result > 0)
                    {
                        $process = 'Service Tax Edit';
                        $processFunction = 'Manager/editServiceTax';
                        $this->logrecord($process,$processFunction);
                        $this->session->set_flashdata('success', 'Service Tax Edit successful');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Service Tax Edit failed');
                    }
                //}
                //else{
                //    $this->session->set_flashdata('error', 'Service Tax already in record');
                //}
                redirect('taxs');

            }
    }

    /**
     * This function is used to delete taxs
     */
    function deleteServiceTax($serviceTaxId = NULL)
    {
        if($serviceTaxId == null)
		{
			redirect('taxs');
		}

		$result = $this->tax_model->deleteServiceTax($serviceTaxId);
		
		if ($result == TRUE) {
			 $process = 'Service Tax Delete';
			 $processFunction = 'Manager/deleteServiceTax';
			 $this->logrecord($process,$processFunction);

			 $this->session->set_flashdata('success', 'Service Tax delete successful');
			}
		else
		{
			$this->session->set_flashdata('error', 'Service Tax delete failed');
		}
		redirect('taxs');
    }
	


     /**
     * This function is used to add new Tax to the system
     */
    function addNewTaxs()
    {
		$this->load->library('form_validation');
		
		
		$this->form_validation->set_rules('state','State','required');
		$this->form_validation->set_rules('price','Tax Rate','required|numeric');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->addNewTax();
		}
		else
		{
			$price = $this->input->post('price');
			$stateId = $this->input->post('state');
			$price_per_trip = $this->input->post('price_per_trip');
			$statusId = 1;
			
			$taxInfo = array('price' => $price, 'price_per_trip' => $price_per_trip, 'stateId' => $stateId, 'statusId' => $statusId, 'createdDtm'=>date('Y-m-d H:i:s'));
			
			$checkTax = $this->tax_model->checkTaxExist($stateId);

			if($checkTax == false)
			{ 
				$result = $this->tax_model->addNewTaxs($taxInfo);
			
				if($result > 0)
				{
					$process = 'Add a Tax';
					$processFunction = 'Manager/addNewTaxs';
					$this->logrecord($process,$processFunction);

					$this->session->set_flashdata('success', 'Tax created successfully');
				}
				else
				{
					$this->session->set_flashdata('error', 'Tax creation failed');
				}
			}
			else{
				$this->session->set_flashdata('error', 'Tax already in record');
			}
			
			redirect('addNewTax');
		}
	}

    /**
     * This function is used to open edit taxs view
     */
    function editOldTax($taxId = NULL)
    {
		if($taxId == null)
		{
			redirect('taxs');
		}
		
		$data['taxInfo'] = $this->tax_model->getTaxInfo($taxId);  
		$data['states'] = $this->master_model->getStateList();          
		$this->global['pageTitle'] = 'Tax Edit';
		
		$this->loadViews("master/tax/editOldTax", $this->global, $data, NULL);
    }

    /**
     * This function is used to edit taxs
     */
    function editTax()
    {            
        $this->load->library('form_validation');

        $this->form_validation->set_rules('state','State','required');
		$this->form_validation->set_rules('price','Tax Rate','required|numeric');
        
        $taxId = $this->input->post('taxId');

        if($this->form_validation->run() == FALSE)
        {
            $this->editOldTax($taxId);
        }
        else
        {
            $taxId = $this->input->post('taxId');
            $price = $this->input->post('price');
			$price_per_trip = $this->input->post('price_per_trip');
            $stateId = $this->input->post('state');
            $statusId = 1;
            
            $taxInfo = array('price'=>$price, 'price_per_trip'=>$price_per_trip, 'stateId'=>$stateId, 'statusId'=> $statusId);
                                
            $checkTax = $this->tax_model->checkTaxExist($stateId, $taxId);

                if($checkTax == false)
                {
                    $result = $this->tax_model->editTax($taxInfo, $taxId);
            
                    if($result > 0)
                    {
                        $process = 'Tax Edit';
                        $processFunction = 'Manager/editTax';
                        $this->logrecord($process,$processFunction);
                        $this->session->set_flashdata('success', 'Tax Edit successful');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Tax Edit failed');
                    }
                }
                else{
                    $this->session->set_flashdata('error', 'Tax already in record');
                }
                redirect('taxs');

            }
    }

    /**
     * This function is used to delete taxs
     */
    function deleteTax($taxId = NULL)
    {
        if($taxId == null)
		{
			redirect('taxs');
		}

		$result = $this->tax_model->deleteTax($taxId);
		
		if ($result == TRUE) {
			 $process = 'Tax Delete';
			 $processFunction = 'Manager/deleteTax';
			 $this->logrecord($process,$processFunction);

			 $this->session->set_flashdata('success', 'Tax delete successful');
			}
		else
		{
			$this->session->set_flashdata('error', 'Tax delete failed');
		}
		redirect('taxs');
    }
	
	/**
     * This function used to show Tax
     */
    function gstTaxListing()
    {
		$data['gstTaxRecords'] = $this->tax_model->getGstTaxs();

		$process = 'All of GST Tax';
		$processFunction = 'Manager/gstTaxListing';
		$this->logrecord($process,$processFunction);

		$this->global['pageTitle'] = 'All of Gst Taxs';
		
		$this->loadViews("master/tax/gstTaxListing", $this->global, $data, NULL);
    }

    /**
     * This function is used to load the add new Tax
     */
    function addNewGstTax()
    {
		$data = array();
		$this->global['pageTitle'] = 'Add a Gst Tax';
		$this->loadViews("master/tax/addNewGstTax", $this->global, $data, NULL);
    }
	


     /**
     * This function is used to add new Tax to the system
     */
    function addNewGstTaxs()
    {
		$this->load->library('form_validation');            
		$this->form_validation->set_rules('rate','Gst Tax Rate','required|numeric');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->addNewGstTax();
		}
		else
		{
			$rate = $this->input->post('rate');
			$statusId = 1;
			
			$GstTaxInfo = array('rate' => $rate, 'statusId' => $statusId, 'createdDtm'=>date('Y-m-d H:i:s'));
			
			$checkGstTax = $this->tax_model->checkGstTaxExist($rate);

			if($checkGstTax == false)
			{ 
				$result = $this->tax_model->addNewGstTaxs($GstTaxInfo);
			
				if($result > 0)
				{
					$process = 'Add a Gst Tax';
					$processFunction = 'Manager/addNewGstTaxs';
					$this->logrecord($process,$processFunction);

					$this->session->set_flashdata('success', 'Gst Tax created successfully');
				}
				else
				{
					$this->session->set_flashdata('error', 'Gst Tax creation failed');
				}
			}
			else{
				$this->session->set_flashdata('error', ' Gst Tax already in record');
			}
			
			redirect('addNewGstTax');
		}
	}

    /**
     * This function is used to open edit taxs view
     */
    function editOldGstTax($GstTaxId = NULL)
    {
		if($GstTaxId == null)
		{
			redirect('gstTaxListing');
		}
		
		$data['GstTaxInfo'] = $this->tax_model->getGstTaxInfo($GstTaxId);           
		$this->global['pageTitle'] = 'Gst Tax Edit';
		
		$this->loadViews("master/tax/editOldGstTax", $this->global, $data, NULL);
    }

    /**
     * This function is used to edit taxs
     */
    function editGstTax()
    {            
        $this->load->library('form_validation');
        $this->form_validation->set_rules('rate','Rate','required|numeric');
        
        $GstTaxId = $this->input->post('GstTaxId');

        if($this->form_validation->run() == FALSE)
        {
            $this->editOldGstTax($GstTaxId);
        }
        else
        {
            $rate = $this->input->post('rate');
            $statusId = 1;
            
            $GstTaxInfo = array('rate'=>$rate, 'statusId'=> $statusId);
                                
            //$checkGstTax = $this->tax_model->checkGstTaxExist($rate, $GstTaxId);

                //if($checkGstTax == false)
                //{
                    $result = $this->tax_model->editGstTax($GstTaxInfo, $GstTaxId);
            
                    if($result > 0)
                    {
                        $process = 'Gst Tax Edit';
                        $processFunction = 'Manager/editGstTax';
                        $this->logrecord($process,$processFunction);
                        $this->session->set_flashdata('success', 'Gst Tax Edit successful');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Gst Tax Edit failed');
                    }
                //}
                //else{
                    //$this->session->set_flashdata('error', 'Gst Tax already in record');
                //}
                redirect('gstTaxListing');

            }
    }

    /**
     * This function is used to delete taxs
     */
    function deleteGstTax($GstTaxId = NULL)
    {
        if($GstTaxId == null)
		{
			redirect('gstTaxListing');
		}

		$result = $this->tax_model->deleteGstTax($GstTaxId);
		
		if ($result == TRUE) {
			 $process = 'GST Tax Delete';
			 $processFunction = 'Manager/deleteGstTax';
			 $this->logrecord($process,$processFunction);

			 $this->session->set_flashdata('success', 'GST Tax delete successful');
			}
		else
		{
			$this->session->set_flashdata('error', 'GST Tax delete failed');
		}
		redirect('gstTaxListing');
    }
}

?>