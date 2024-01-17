<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
/**
 * Class : Admin (AdminController)
 * Admin class to control to authenticate admin credentials and include admin functions.
 * @author : Bharat Verma / bharatverma.verma@gmail.com
 * @version : 1.0
 * @since : 27.02.2018
 */
class Admin extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('user_model');
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
            // isAdmin / Admin role control function / This function used admin role control
            if($this->isAdmin() == TRUE)
            {
                $this->accesslogincontrol();
            }
        }
    }
	
     /**
     * This function is used to load the user list
     */
    function userListing()
    {   
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            $count = $this->user_model->userListingCount($searchText);

			$returns = $this->paginationCompress ( "userListing/", $count, 10 );
            
            $data['userRecords'] = $this->user_model->userListing($searchText, $returns["page"], $returns["segment"]);
            
            $process = 'User Listing';
            $processFunction = 'Admin/userListing';
            $this->logrecord($process,$processFunction);

            $this->global['pageTitle'] = 'User List';
            
            $this->loadViews("users", $this->global, $data, NULL);
    }

    /**
     * This function is used to load the add new form
     */
    function addNew()
    {
            $data['roles'] = $this->user_model->getUserRoles();
            $this->global['pageTitle'] = 'Add User';
            $this->loadViews("addNew", $this->global, $data, NULL);
    }

    /**
     * This function is used to add new user to the system
     */
    function addNewUser()
    {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('password','Password','required|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
            $this->form_validation->set_rules('role','Role','trim|required|numeric');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                $email = $this->security->xss_clean($this->input->post('email'));
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
                
                $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>$roleId, 'name'=> $name,
                                    'mobile'=>$mobile, 'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'));
                                    
                $result = $this->user_model->addNewUser($userInfo);
                
                if($result > 0)
                {
                    $process = 'Add User';
                    $processFunction = 'Admin/addNewUser';
                    $this->logrecord($process,$processFunction);

                    $this->session->set_flashdata('success', 'User successfully created');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User creation failed');
                }
                
                redirect('userListing');
            }
        }

     /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editOld($userId = NULL)
    {
            if($userId == null)
            {
                redirect('userListing');
            }
            
            $data['roles'] = $this->user_model->getUserRoles();
            $data['userInfo'] = $this->user_model->getUserInfo($userId);

            $this->global['pageTitle'] = 'User Edit';
            
            $this->loadViews("editOld", $this->global, $data, NULL);
    }

   
    /**
     * This function is used to edit the user informations
     */
    function editUser()
    {
            $this->load->library('form_validation');
            
            $userId = $this->input->post('userId');
            
            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
            $this->form_validation->set_rules('password','Password','matches[cpassword]|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','matches[password]|max_length[20]');
            $this->form_validation->set_rules('role','Role','trim|required|numeric');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($userId);
            }
            else
            {
                $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
                $email = $this->security->xss_clean($this->input->post('email'));
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->security->xss_clean($this->input->post('mobile'));
                
                $userInfo = array();
                
                if(empty($password))
                {
                    $userInfo = array('email'=>$email, 'roleId'=>$roleId, 'name'=>$name,
                                    'mobile'=>$mobile, 'status'=>0, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
                }
                else
                {
                    $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>$roleId,
                        'name'=>ucwords($name), 'mobile'=>$mobile,'status'=>0, 'updatedBy'=>$this->vendorId, 
                        'updatedDtm'=>date('Y-m-d H:i:s'));
                }
                
                $result = $this->user_model->editUser($userInfo, $userId);
                
                if($result == true)
                {
                    $process = 'User update';
                    $processFunction = 'Admin/editUser';
                    $this->logrecord($process,$processFunction);

                    $this->session->set_flashdata('success', 'User successfully updated');
                }
                else
                {
                    $this->session->set_flashdata('error', 'User update failed');
                }
                
                redirect('userListing');
            }
    }

    

     /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser()
    {
            $userId = $this->input->post('userId');
            $userInfo = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            
            $result = $this->user_model->deleteUser($userId, $userInfo);
            
            if ($result > 0) {
                 echo(json_encode(array('status'=>TRUE)));

                 $process = 'User Deletion';
                 $processFunction = 'Admin/deleteUser';
                 $this->logrecord($process,$processFunction);

                }
            else { echo(json_encode(array('status'=>FALSE))); }
    }
	
	
	
	/**
     * This function is used to load the user list
     */
    function adminCompanyListing()
    {               
		$data['companyRecords'] = $this->user_model->adminCompanyListing();
		
		$process = 'Admin Company Listing';
		$processFunction = 'Admin/adminCompanyListing';
		$this->logrecord($process,$processFunction);

		$this->global['pageTitle'] = 'Admin Company List';
		
		$this->loadViews("adminCompanyListing", $this->global, $data, NULL);
    }

    /**
     * This function is used to load the add new form
     */
    function addNewAdminCompany()
    {
		$data['states'] = $this->user_model->getStateList();
		$this->global['pageTitle'] = 'Add Admin Company';
		$this->loadViews("addNewAdminCompany", $this->global, $data, NULL);
    }

    /**
     * This function is used to add new user to the system
     */
    function addNewAdminCompanies()
    {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('company_name','Company Name','trim|required');
			$this->form_validation->set_rules('state','State','required');
			$this->form_validation->set_rules('pan','Pan','required');
			//$this->form_validation->set_rules('mobile','Mobile','required|numeric');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNewAdminCompany();
            }
            else
            {
                $company_name = $this->security->xss_clean($this->input->post('company_name'));
				$contact_person = $this->security->xss_clean($this->input->post('contact_person'));
				$email = $this->security->xss_clean($this->input->post('email'));
				$mobile = $this->security->xss_clean($this->input->post('mobile'));
				$landline = $this->input->post('landline');
				$pan = $this->input->post('pan');
				$gstin = $this->input->post('gstin');
				$pincode = $this->input->post('pincode');
				$address = $this->security->xss_clean($this->input->post('address'));
				$city = $this->security->xss_clean($this->input->post('city'));
				$state = $this->input->post('state');
				$bank_name = $this->input->post('bank_name');
				$account_number = $this->input->post('account_number');
				$branch_name = $this->input->post('branch_name');
				$ifsc_code = $this->input->post('ifsc_code');				
                $statusId = 1;
                
                $companyInfo = array(
					'company_name' => ucwords(strtolower($company_name)),
					'contact_person' => $contact_person,
					'email' => $email,
					'mobile' => $mobile,
					'pan' => strtoupper($pan),
					'gstin' => strtoupper($gstin),
					'pincode' => $pincode,
					'address' => $address,
					'city' => $city,
					'state' => $state,
					'bank_name' => $bank_name,
					'account_number' => $account_number,
					'branch_name' => $branch_name,
					'ifsc_code' => $ifsc_code,
					'landline' => $landline,					
					'statusId' => $statusId,
					'createdBy' => $this->vendorId,
					'createdDtm'=>date('Y-m-d H:i:s')
				);
                
               $checkCompanyExist = $this->user_model->checkAdminCompanyExist($company_name);

                if($checkCompanyExist == false)
                { 
                    $result = $this->user_model->addNewAdminCompanies($companyInfo);
                
                    if($result > 0)
                    {
                        $process = 'Add a Admin Company';
                        $processFunction = 'Manager/addNewAdminCompanies';
                        $this->logrecord($process,$processFunction);

                        $this->session->set_flashdata('success', 'Admin Company created successfully');
                    }
                    else
                    {
                        $this->session->set_flashdata('error', 'Admin Company creation failed');
                    }
                }
                else{
                    $this->session->set_flashdata('error', 'Admin Company already in record');
                }
                
                redirect('adminCompanyListing');
            }
        }

     /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editOldAdminCompany($id = NULL)
    {
		if($id == null)
		{
			redirect('adminCompanyListing');
		}
		
		$data['states'] = $this->user_model->getStateList();
		$data['companyInfo'] = $this->user_model->getCompanyInfo($id);

		$this->global['pageTitle'] = 'Admin Company Edit';
		
		$this->loadViews("editOldAdminCompany", $this->global, $data, NULL);
    }

   
    /**
     * This function is used to edit the user informations
     */
    function editAdminCompany()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('company_name','Company Name','trim|required');
		$this->form_validation->set_rules('state','State','required');
			$this->form_validation->set_rules('pan','Pan','required');
		//$this->form_validation->set_rules('mobile','Mobile','required|numeric');
        
        $id = $this->input->post('id');

        if($this->form_validation->run() == FALSE)
        {
            $this->editOldAdminCompany($id);
        }
        else
        {
            $company_name = $this->security->xss_clean($this->input->post('company_name'));
			$contact_person = $this->security->xss_clean($this->input->post('contact_person'));
			$email = $this->security->xss_clean($this->input->post('email'));
			$mobile = $this->security->xss_clean($this->input->post('mobile'));
			$landline = $this->input->post('landline');
			$pan = $this->input->post('pan');
			$gstin = $this->input->post('gstin');
			$pincode = $this->input->post('pincode');
			$address = $this->security->xss_clean($this->input->post('address'));
			$city = $this->security->xss_clean($this->input->post('city'));
			$state = $this->input->post('state');
			$bank_name = $this->input->post('bank_name');
			$account_number = $this->input->post('account_number');
			$branch_name = $this->input->post('branch_name');
			$ifsc_code = $this->input->post('ifsc_code');			
			$statusId = $this->input->post('status');
                
			$companyInfo = array(
				'company_name' => ucwords(strtolower($company_name)),
				'contact_person' => $contact_person,
				'email' => $email,
				'mobile' => $mobile,
				'pan' => strtoupper($pan),
				'gstin' => strtoupper($gstin),
				'pincode' => $pincode,
				'address' => $address,
				'city' => $city,
				'state' => $state,
				'bank_name' => $bank_name,
				'account_number' => $account_number,
				'branch_name' => $branch_name,
				'ifsc_code' => $ifsc_code,
				'landline' => $landline,					
				'statusId' => $statusId,
				'updatedBy' => $this->vendorId,
				'updatedDtm'=>date('Y-m-d H:i:s')
			);
                                
				$result = $this->user_model->editAdminCompany($companyInfo, $id);
		
				if($result > 0)
				{
					$process = 'Admin Company Edit';
					$processFunction = 'Manager/editAdminCompany';
					$this->logrecord($process,$processFunction);
					$this->session->set_flashdata('success', 'Admin Company Edit successful');
				}
				else
				{
					$this->session->set_flashdata('error', 'Admin Company Edit failed');
				}
                redirect('adminCompanyListing');

            }
    }

    

     /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteAdminCompany()
    {
		$id = $this->input->post('id');
		$dataArr = array('isDeleted' => 1,'updatedBy' => $this->vendorId, 'updatedDtm' => date('Y-m-d H:i:s'));
		
		$result = $this->user_model->deleteAdminCompany($id, $dataArr);
		
		if ($result > 0) {
			 $process = 'Admin Company Deletion';
			 $processFunction = 'Admin/deleteAdminCompany';
			 $this->logrecord($process,$processFunction);
			 echo 1;

			}
		else { echo 0; }
    }
	
	
	function do_upload(){
		
        $config['upload_path'] = "./upload/admin/images";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;
		
		$id = $this->input->post('id');
         
        $this->load->library('upload', $config);
        if($this->upload->do_upload("userfile")){
            $data = array('upload_data' => $this->upload->data());
			
			
			//Resize and Compress Image
            $config['image_library'] = 'gd2';
            $config['source_image'] = './upload/admin/images/'.$data['upload_data']['file_name'];
            $config['create_thumb'] = FALSE;
            $config['maintain_ratio'] = FALSE;
            $config['quality'] = '100%';
            $config['width'] = 150;
            $config['height'] = 75;
            $config['new_image'] = './upload/admin/images/'.$data['upload_data']['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
 
            $image = array(
						'image' => $data['upload_data']['file_name']
					); 
             
            $result = $this->user_model->save_upload($id, $image);
			
			//redirect('adminCompanyListing');
        }
 
     }

    

     /**
     * This function used to show log history
     * @param number $userId : This is user id
     */
    function logHistory($userId = NULL)
    {
            $data['dbinfo'] = $this->user_model->gettablemb('tbl_log','ci_user_panel_management');
            if(isset($data['dbinfo']->total_size))
            {
                if(($data['dbinfo']->total_size)>1000){
                    $this->backupLogTable();
                }
            }
            $data['userRecords'] = $this->user_model->logHistory($userId);

            $process = 'Log visualization';
            $processFunction = 'Admin/logHistory';
            $this->logrecord($process,$processFunction);

            $this->global['pageTitle'] = 'User Sign history';
            
            $this->loadViews("logHistory", $this->global, $data, NULL);
    }

    /**
     * This function used to show specific user log history
     * @param number $userId : This is user id
     */
    function logHistorysingle($userId = NULL)
    {       
            $userId = ($userId == NULL ? $this->session->userdata("userId") : $userId);
            $data["userInfo"] = $this->user_model->getUserInfoById($userId);
            $data['userRecords'] = $this->user_model->logHistory($userId);
            
            $process = 'Single Log visualization';
            $processFunction = 'Admin/logHistorysingle';
            $this->logrecord($process,$processFunction);

            $this->global['pageTitle'] = 'User Sign history';
            
            $this->loadViews("logHistorysingle", $this->global, $data, NULL);      
    }
    
    /**
     * This function used to backup and delete log table
     */
    function backupLogTable()
    {
        $this->load->dbutil();
        $prefs = array(
            'tables'=>array('tbl_log')
        );
        $backup=$this->dbutil->backup($prefs) ;

        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-Y H-i');

        $filename = './backup/'.$date.'.sql.gz';
        $this->load->helper('file');
        write_file($filename,$backup);

        $this->user_model->clearlogtbl();

        if($backup)
        {
            $this->session->set_flashdata('success', 'Replacement Table cleaning process successful');
            redirect('log-history');
        }
        else
        {
            $this->session->set_flashdata('error', 'Replacement Table cleaning process failed');
            redirect('log-history');
        }
    }

    /**
     * This function used to open the logHistoryBackup page
     */
    function logHistoryBackup()
    {
            $data['dbinfo'] = $this->user_model->gettablemb('tbl_log_backup','ci_user_panel_management');
            if(isset($data['dbinfo']->total_size))
            {
            if(($data['dbinfo']->total_size)>1000){
                $this->backupLogTable();
            }
            }
            $data['userRecords'] = $this->user_model->logHistoryBackup();

            $process = 'Replacement Log visualization';
            $processFunction = 'Admin/logHistoryBackup';
            $this->logrecord($process,$processFunction);

            $this->global['pageTitle'] = 'User Replacement Sign history';
            
            $this->loadViews("logHistoryBackup", $this->global, $data, NULL);
    }

    /**
     * This function used to delete backup_log table
     */
    function backupLogTableDelete()
    {
        $backup=$this->user_model->clearlogBackuptbl();

        if($backup)
        {
            $this->session->set_flashdata('success', 'Table cleaning process successful');
            redirect('log-history-backup');
        }
        else
        {
            $this->session->set_flashdata('error', 'Table cleaning process failed');
            redirect('log-history-backup');
        }
    }

    /**
     * This function used to open the logHistoryUpload page
     */
    function logHistoryUpload()
    {       
            $this->load->helper('directory');
            $map = directory_map('./backup/', FALSE, TRUE);
        
            $data['backups']=$map;

            $process = 'Download Backup Log';
            $processFunction = 'Admin/logHistoryUpload';
            $this->logrecord($process,$processFunction);

            $this->global['pageTitle'] = 'User Log Load';
            
            $this->loadViews("logHistoryUpload", $this->global, $data, NULL);      
    }

    /**
     * This function used to upload backup for backup_log table
     */
    function logHistoryUploadFile()
    {
        $optioninput = $this->input->post('optionfilebackup');

        if ($optioninput == '0' && $_FILES['filebackup']['name'] != '')
        {
            $config = array(
            'upload_path' => "./uploads/",
            'allowed_types' => "gz|sql|gzip",
            'overwrite' => TRUE,
            'max_size' => "20048000", // Can be set to particular file size , here it is 20 MB(20048 Kb)
            );

            $this->load->library('upload', $config);
            $upload= $this->upload->do_upload('filebackup');
                $data = $this->upload->data();
                $filepath = $data['full_path'];
                $path_parts = pathinfo($filepath);
                $filetype = $path_parts['extension'];
                if ($filetype == 'gz')
                {
                    // Read entire gz file
                    $lines = gzfile($filepath);
                    $lines = str_replace('tbl_log','tbl_log_backup', $lines);
                }
                else
                {
                    // Read in entire file
                    $lines = file($filepath);
                    $lines = str_replace('tbl_log','tbl_log_backup', $lines);
                }
        }

        else if ($optioninput != '0' && $_FILES['filebackup']['name'] == '')
        {
            $filepath = './backup/'.$optioninput;
            $path_parts = pathinfo($filepath);
            $filetype = $path_parts['extension'];
            if ($filetype == 'gz')
            {
                // Read entire gz file
                $lines = gzfile($filepath);
                $lines = str_replace('tbl_log','tbl_log_backup', $lines);
            }
            else
            {
                // Read in entire file
                $lines = file($filepath);
                $lines = str_replace('tbl_log','tbl_log_backup', $lines);
            }
        }
                // Set line to collect lines that wrap
                $templine = '';
                
                // Loop through each line
                foreach ($lines as $line)
                {
                    // Skip it if it's a comment
                    if (substr($line, 0, 2) == '--' || $line == '')
                    continue;
                    // Add this line to the current templine we are creating
                    $templine .= $line;

                    // If it has a semicolon at the end, it's the end of the query so can process this templine
                    if (substr(trim($line), -1, 1) == ';')
                    {
                        // Perform the query
                        $this->db->query($templine);

                        // Reset temp variable to empty
                        $templine = '';
                    }
                }
            if (empty($lines) || !isset($lines))
            {
                $this->session->set_flashdata('error', 'Replacement process failed');
                redirect('log-history-upload');
            }
            else
            {
                $this->session->set_flashdata('success', 'Replacement process successful');
                redirect('log-history-upload');
            }
    }
}