<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Bharat Verma / bharatverma.verma@gmail.com
 * @version : 1.0
 * @since : 27.02.2018
 */
class User extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Home page';

       // $data['tasksCount'] = $this->user_model->tasksCount();
        //$data['finishedTasksCount'] = $this->user_model->finishedTasksCount();
        $data['logsCount'] = $this->user_model->logsCount();
        $data['usersCount'] = $this->user_model->usersCount();

        if ($this->getUserStatus() == TRUE)
        {
            $this->session->set_flashdata('error', 'Please change your Password for your safety.');
            redirect('loadChangePass');
        }

        $this->loadViews("dashboard", $this->global, $data , NULL);
    }
     function quotation()
    {

        $process = 'Quotation';
		$processFunction = 'Manager/Quotation';
		$this->logrecord($process,$processFunction);
        $this->global['pageTitle'] = 'quotation | Online Cab Booking Services in Gurgaon and Delhi NCR';
		
		$this->loadViews("master/quotation/quotation", $this->global, $data, NULL);
    }

    /**
     * This function is used to check whether email already exist or not
     */
    function checkEmailExists()
    {
        $userId = $this->input->post("userId");
        $email = $this->input->post("email");

        if(empty($userId)){
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if(empty($result)){ echo("true"); }
        else { echo("false"); }
    }

    /**
     * This function is used to load edit user view
     */
    function loadUserEdit()
    {
        $this->global['pageTitle'] = 'Account settings';
        
        $data['userInfo'] = $this->user_model->getUserInfo($this->vendorId);

        $this->loadViews("userEdit", $this->global, $data, NULL);
    }

    /**
     * This function is used to update the of the user info
     */
    function updateUser()
    {
        $this->load->library('form_validation');
            
        $userId = $this->input->post('userId');
        
        $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
        $this->form_validation->set_rules('oldpassword','Old password','max_length[20]');
        $this->form_validation->set_rules('cpassword','Password','matches[cpassword2]|max_length[20]');
        $this->form_validation->set_rules('cpassword2','Confirm Password','matches[cpassword]|max_length[20]');
        $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->loadUserEdit();
        }
        else
        {
            $name = $this->security->xss_clean($this->input->post('fname'));
            $email = $this->security->xss_clean($this->input->post('email'));
            $password = $this->input->post('cpassword');
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $oldPassword = $this->input->post('oldpassword');

            $userInfo = array();

            if(empty($password))
            {
            $userInfo = array('email'=>$email,'name'=>$name,
                            'mobile'=>$mobile, 'status'=>1, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
            }
            else
            {
                $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);
            
                if(empty($resultPas))
                {
                $this->session->set_flashdata('nomatch', 'Your old password is not correct');
                redirect('userEdit');
                }
                else
                {
                $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password),
                    'name'=>ucwords($name), 'mobile'=>$mobile,'status'=>1, 'updatedBy'=>$this->vendorId, 
                    'updatedDtm'=>date('Y-m-d H:i:s'));
                }
            }
            
            $result = $this->user_model->editUser($userInfo, $userId);
            
            if($result == true)
            {
                $process = 'Account settings update';
                $processFunction = 'User/updateUser';
                $this->logrecord($process,$processFunction);

                $this->session->set_flashdata('success', 'Your account settings have been successfully updated');
            }
            else
            {
                $this->session->set_flashdata('error', 'Account settingsnı update failed');
            }
            
            redirect('userEdit');
        }
    }


    
    /**
     * This function is used to load the change password view
     */
    function loadChangePass()
    {
        $this->global['pageTitle'] = 'Change Password';
        
        $this->loadViews("changePassword", $this->global, NULL, NULL);
    }
    
    
    /**
     * This function is used to change the password of the user
     */
    function changePassword()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('oldPassword','Old password','required|max_length[20]');
        $this->form_validation->set_rules('newPassword','New password','required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword','Confirm New password','required|matches[newPassword]|max_length[20]');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->loadChangePass();
        }
        else
        {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');
            
            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);
            
            if(empty($resultPas))
            {
                $this->session->set_flashdata('nomatch', 'Your old password is not correct');
                redirect('loadChangePass');
            }
            else
            {
                $usersData = array('password'=>getHashedPassword($newPassword),'status'=>1, 'updatedBy'=>$this->vendorId,
                                'updatedDtm'=>date('Y-m-d H:i:s'));
                
                $result = $this->user_model->changePassword($this->vendorId, $usersData);
                
                if($result > 0) {

                    $process = 'Change Password';
                    $processFunction = 'User/changePassword';
                    $this->logrecord($process,$processFunction);

                     $this->session->set_flashdata('success', 'Change Password successful');
                     }
                else {
                     $this->session->set_flashdata('error', 'Change Password failed'); 
                    }
                
                redirect('loadChangePass');
            }
        }
    }

    /**
     * This function is used to open 404 view
     */
    function pageNotFound()
    {
        $this->global['pageTitle'] = '404 - Page Not Found';
        
        $this->loadViews("404", $this->global, NULL, NULL);
    }

    /**
     * This function is used to finish tasks.
     */
    function endTask($taskId)
    {
            $taskInfo = array('statusId'=>2,'endDtm'=>date('Y-m-d H:i:s'));
            
            $result = $this->user_model->endTask($taskId, $taskInfo);
            
            if ($result > 0) {
                 $process = 'Task End';
                 $processFunction = 'User/endTask';
                 $this->logrecord($process,$processFunction);
                 $this->session->set_flashdata('success', 'Task successfully Completed');
                 if ($this->role != ROLE_EMPLOYEE){
                    redirect('tasks');
                 }
                 else{
                    redirect('etasks');
                 }
                }
            else {
                $this->session->set_flashdata('error', 'Task completion failed');
                if ($this->role != ROLE_EMPLOYEE){
                    redirect('tasks');
                 }
                 else{
                    redirect('etasks');
                 }
            }
    }

    /**
     * This function is used to open the tasks page for users (no edit/delete etc)
     */
    function etasks()
    {
            $data['taskRecords'] = $this->user_model->getTasks();

            $process = 'User All of Tasks';
            $processFunction = 'User/etasks';
            $this->logrecord($process,$processFunction);

            $this->global['pageTitle'] = 'All of Tasks';
            
            $this->loadViews("etasks", $this->global, $data, NULL);
    }

 function register()
    {
		$this->global['pageTitle'] = 'Register Here';
		$this->global['Description'] = 'Register to book a Cab Online by Sewakabs';
		$this->loadViews("register", $this->global, NULL, NULL);
		
    }

    /**
     * This function is used to update the of the user info
     */
    function register_user()
    {
        //echo 'Mobile number already registerd';
        //OTP sent! please check your mobile
        //sms sent to 9990999876
            $name = $this->security->xss_clean($this->input->post('name'));
            $email = $this->security->xss_clean($this->input->post('email'));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $pincode = $this->security->xss_clean($this->input->post('pincode'));
            $city = $this->security->xss_clean($this->input->post('city'));
            $state = $this->security->xss_clean($this->input->post('state'));
            $state_code = $this->security->xss_clean($this->input->post('state_code'));
            $officename = $this->security->xss_clean($this->input->post('officename'));
            $address = $this->security->xss_clean($this->input->post('address'));
            $terms_conditions = $this->security->xss_clean($this->input->post('terms_conditions'));

            $code = generateRandomString1(6);
            $createdDate = date('Y-m-d H:i:s');
            $ip_address = $this->input->ip_address();

            $userInfo = array();

            if (!empty($email)) {
                $userInfo['email'] = $email;
            }
            $userInfo['name'] = ucwords(strtolower($name));
            $userInfo['mobile'] = $mobile;
            $userInfo['pincode'] = $pincode;
            $userInfo['city'] = $city;
            $userInfo['state'] = $state;
            $userInfo['state_code'] = $state_code;
            $userInfo['officename'] = $officename;
            $userInfo['address'] = $address;
            $userInfo['is_accept'] = $terms_conditions;
            $userInfo['mobile_code'] = $code;
            $userInfo['otp_date'] = $createdDate;
            $userInfo['otp_created_ip'] = $ip_address;
            $userInfo['status'] = 1;
            $userInfo['created_ip'] = $ip_address;
            $userInfo['createdDtm'] = $createdDate;

            $checkExist = $this->user_model->checkUserExist($mobile, $email);

            if ($checkExist == false) {

            $result = $this->user_model->addNewUser($userInfo);

            if ($result > 0) {
		$loginText = 'Verification Code: ' . $code . ' to login into your SewakCabs account.';
		$tempId = '&TemplateID=1007908145709052470';
        $sendOtp = $this->sendSMS($mobile, $loginText, $tempId);
// 		$sendOtp = $this->sendSMS($mobile, $loginText, '');

		$sendOtp = "Message Submitted";
		if (strcmp($sendOtp,"Message Submitted")){
			$arr_result = array('status' => 1, 'code' => $code, 'user_id' => $result);
			header('Content-Type: application/json');
			echo json_encode($arr_result, JSON_PRETTY_PRINT);
			
			
		} else {
			$arr_result = array('status' => 0, 'message' => 'There seems to be an error, when user registration. Please try again.');
			header('Content-Type: application/json');
			echo json_encode($arr_result, JSON_PRETTY_PRINT);
			
		}
            } else {
                $arr_result = array('status' => 0, 'message' => 'There seems to be an error, when user registration. Please try again.');
                header('Content-Type: application/json');
                echo json_encode($arr_result, JSON_PRETTY_PRINT);
                
            }
        } else {
            $arr_result = array('status' => 0, 'message' => 'This account already associated with us.');
            header('Content-Type: application/json');
            echo json_encode($arr_result, JSON_PRETTY_PRINT);

        }
        
        // redirect('loginMe');
    }

    function getZipCode()
    {
        $search = $this->input->get('search');
        $data = $this->user_model->getzipcodesearch($search);
        echo json_encode($data, true);
    }


    function add_to_cart()
    {
        $this->cart->destroy();

      // pre($this->input->post());
        $this->load->model('vehicle_model');
        $data['minAmount'] = $this->vehicle_model->getminamount();
		
		$trip_type = $this->security->xss_clean($this->input->post('trip_type'));
		$pick_type = $this->security->xss_clean($this->input->post('pick_type'));
		$duration = $this->input->post('duration');
		$total_tax = $this->input->post('total_tax');
		$total_cart_price = $this->input->post('total_cart_price');
		
		if($pick_type == "round_trip")
		{
			//$duration = $duration*2;
			//$total_tax = $total_tax*2;
			//$total_cart_price = $total_cart_price*2;
		}
        $dataA = array(
            'id'      => $this->input->post('cab_id'),
            'qty'     => 1,
            'price'   => $this->input->post('car_price'),
            'name'    => $this->input->post('car_type'),
            'minAmount'    => $data['minAmount'][0]->price,
            'pick_type'    => $pick_type,
            'pickup_location'    => $this->security->xss_clean($this->input->post('pickup_location')),
            'drop_location'    => $this->security->xss_clean($this->input->post('drop_location')),
            'pickup_date'    => $this->input->post('pickup_date'),
            'pickup_time'    => $this->input->post('pickup_time'),
            'return_date'    => $this->input->post('return_date'),
            'return_time'    => $this->input->post('return_time'),
            'distance'    => (int) $this->input->post('distance'),
            'duration'    => $duration,
            'car_type'    => $this->input->post('car_type'),
            'car_price'    => $this->input->post('car_price'),
            'total_tax'    => $total_tax,
            'total_discount'    => $this->input->post('total_discount'),
            'total_cart_price'    => $total_cart_price
        );

        $itemid = $this->cart->insert($dataA);

        $arr_result = array('status' => 1, 'itemid' => $itemid);
        header('Content-Type: application/json');
        echo json_encode($arr_result, JSON_PRETTY_PRINT);

        //pre($this->cart->contents());

       // die();

        // foreach ($this->cart->contents() as $items) {

        //     pre($items);
        // }
    }

    function checkUserExist()
    { 
        $name = $this->security->xss_clean($this->input->post('name'));
        $email = $this->security->xss_clean($this->input->post('email'));
        $mobile = $this->security->xss_clean($this->input->post('mobile'));
        $terms_conditions = $this->security->xss_clean($this->input->post('terms_conditions'));
        
        $result = $this->user_model->checkMobileExist($mobile);
        echo "<pre>"; print_r($result);die;
        if(!empty($result)){
            echo $result[0]->userId;
        }
        else{
            $code = generateRandomString1(6);
            $createdDate = date('Y-m-d H:i:s');
            $ip_address = $this->input->ip_address();

            $userInfo = array();

            if (!empty($email)) {
                $userInfo['email'] = $email;
            }
            $userInfo['name'] = ucwords(strtolower($name));
            $userInfo['mobile'] = $mobile;
            $userInfo['is_accept'] = $terms_conditions;
            $userInfo['mobile_code'] = $code;
            $userInfo['otp_date'] = $createdDate;
            $userInfo['otp_created_ip'] = $ip_address;
            $userInfo['status'] = 1;
            $userInfo['created_ip'] = $ip_address;
            $userInfo['createdDtm'] = $createdDate;

            echo $result = $this->user_model->addNewUser($userInfo);
            
        }
    }
	
	public function bookcar()
    {		
		$start_hours = $hours = $car_price = $distance = 0;
		$duration = $distance_price = $subtotal = $tax = 0;
		$total = $total_cart_price = $total_tax = $cart_id = 0;
		$return_date = $return_time = $discount = $min_amount = 0;
		$km_approx = $distance_value = 0;
		
		$this->load->library('form_validation');
        
		//$this->form_validation->set_rules('trip_type','Trip Type','required|trim');
		//$this->form_validation->set_rules('pick_type','Pick Type','required');
        $this->form_validation->set_rules('pickup_location','Pickup Location','required|trim');
		$this->form_validation->set_rules('drop_location','Drop Location','required|trim');
		$this->form_validation->set_rules('pickup_date','Pickup Date','required|trim');
		$this->form_validation->set_rules('pickup_time','Pickup Time','required|trim');	
		
        if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
			$this->load->model('vehicle_model');
			$this->global['pageTitle'] = 'Home page';
			
			$data['trip_type'] = 'city';
			$data['pick_type'] = 'one_way';
			$data['pickup_location'] = $this->security->xss_clean($this->input->post('pickup_location'));
			$data['drop_location'] = $this->security->xss_clean($this->input->post('drop_location'));
			$data['pickup_date'] = $this->input->post('pickup_date');
			$data['pickup_time'] = $this->input->post('pickup_time');
			$data['return_date'] = $return_date = $this->input->post('return_date');
			$data['return_time'] = $return_time = $this->input->post('return_time');
			$data['distance'] = 0;
			$data['duration'] = 0;
			
			// Get distance in km and time
			$distance = getDistanceTime($data['pickup_location'], $data['drop_location'], "K");


			// if($distance < 2)
			// {
			// 	redirect('dashboard');
			// }
			
			if($distance['status'] == 1){
				$data['distance'] = $distance_value = $distance['distance_value'];
				$data['duration'] = $distance['duration'];
			}
			
			if(!empty($this->vendorId)){
				$data['userInfo'] = $this->user_model->getUserInfo($this->vendorId);
			}else{
				$data['userInfo'][0] = (object)array("email" => false, 'mobile' => '');
			}
			
			$data['vehicleRecords'] = $this->vehicle_model->getallvehicles();
			$data['vehicleRateRecords'] = $this->vehicle_model->getvehiclesPrice($data['vehicleRecords'][0]->id, '', 'city', '');

            $data['minAmount'] = $this->vehicle_model->getminamount();
			
			if($data['pick_type'] == 'round_trip')
			{
				if(!empty($data['distance'])){
					$data['distance'] = $data['distance']*2;
				}
				$distance = $data['distance'];
				$duration = $data['duration'];
				$car_price = $data['vehicleRateRecords'][0]->two_pay_price;
				$distance_price = $car_price*$data['distance'];
				$data['km_approx'] = $km_approx = $data['duration'].' '.$data['distance'].' km';
			}
			else{
				$distance = $data['distance'];
				$duration = $data['duration'];
				$car_price = $data['vehicleRateRecords'][0]->price;
				$distance_price = $car_price*$data['distance'];
				$data['km_approx'] = $km_approx = $data['duration'].' - '.$data['distance'].' km';
			}
			
			$subtotal = $distance_price - $discount;
			$subtotal += $data['vehicleRecords'][0]->start_fee;
			$total_tax = (($subtotal*5)/100);
			$total_cart_price = $subtotal + $total_tax;
			$min_amount = (($total_cart_price * $data['minAmount'][0]->price)/100);
			
			$this->cart->destroy();
			
			$dataA = array(
				'id'      => $data['vehicleRecords'][0]->id,
				'cab_price_id'      => $data['vehicleRateRecords'][0]->id,
				'qty'     => 1,
				'price'   => $car_price,
				'name'    => $data['vehicleRecords'][0]->name,
				'minAmount'    => $data['minAmount'][0]->price,
				'trip_type'    => $data['trip_type'],
				'pick_type'    => $data['pick_type'],
				'pickup_location'    => $data['pickup_location'],
				'drop_location'    => $data['drop_location'],
				'pickup_date'    => $data['pickup_date'],
				'pickup_time'    => $data['pickup_time'],
				'return_date'    => $return_date,
				'return_time'    => $return_time,
				'km_approx' => $km_approx,
				'one_way_distance'  => $distance_value,
				'distance'    => $distance,
				'duration'    => $duration,
				'additional_ride_time_fare' => $data['vehicleRateRecords'][0]->additional_ride_time_fare,
				'additional_km_fare' => $data['vehicleRateRecords'][0]->additional_km_fare,
				'driver_allowance' => $data['vehicleRateRecords'][0]->driver_allowance,
				'night_charges' => $data['vehicleRateRecords'][0]->night_charges,
				'car_price'    => $distance_price + $data['vehicleRecords'][0]->start_fee,
				'min_total'    => number_format($min_amount, 2),
				'sub_total'    => number_format($subtotal, 2),
				'total_tax'    => number_format($total_tax, 2),
				'total_discount'    => number_format($discount, 2),
				'total_price'    => number_format($total_cart_price, 2),
				'start_fee' => $data['vehicleRecords'][0]->start_fee
				
			);
			
			//pre($dataA);

			$data['cart_id'] = $cart_id = $this->cart->insert($dataA);
		
			$data['cart_items'] = $this->cart->contents();
			$data['cart_items'] = $data['cart_items'][$cart_id];           

			$this->loadViews("book-car", $this->global, $data , NULL);
		}
    }
	
	
    public function bookairportcar()
    {		
		$start_hours = $hours = $car_price = $distance = 0;
		$duration = $distance_price = $subtotal = $tax = 0;
		$total = $total_cart_price = $total_tax = $cart_id = 0;
		$return_date = $return_time = $discount = $min_amount = 0;
		$km_approx = $distance_value = 0;
		
		$this->load->library('form_validation');
        
		//$this->form_validation->set_rules('trip_type','Trip Type','required|trim');
		//$this->form_validation->set_rules('pick_type','Pick Type','required');
        $this->form_validation->set_rules('pickup_location','Pickup Location','required|trim');
		$this->form_validation->set_rules('drop_location','Drop Location','required|trim');
		$this->form_validation->set_rules('pickup_date','Pickup Date','required|trim');
		$this->form_validation->set_rules('pickup_time','Pickup Time','required|trim');	
		
        if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
			$this->load->model('vehicle_model');
			$this->global['pageTitle'] = 'Home page';
			
			$data['trip_type'] = 'airport';
			$data['pick_type'] = 'from_airport';
			$data['pickup_location'] = $this->security->xss_clean($this->input->post('pickup_location'));
			$data['drop_location'] = $this->security->xss_clean($this->input->post('drop_location'));
			$data['pickup_date'] = $this->input->post('pickup_date');
			$data['pickup_time'] = $this->input->post('pickup_time');
			$data['return_date'] = $return_date = $this->input->post('return_date');
			$data['return_time'] = $return_time = $this->input->post('return_time');
			$data['distance'] = 0;
			$data['duration'] = 0;
			
			// Get distance in km and time
			$distance = getDistanceTime($data['pickup_location'], $data['drop_location'], "K");


			if($distance < 1)
			{
				redirect('dashboard');
			}
			
			if($distance['status'] == 1){
				$data['distance'] = $distance_value = $distance['distance_value'];
				$data['duration'] = $distance['duration'];
			}
			
			if(!empty($this->vendorId)){
				$data['userInfo'] = $this->user_model->getUserInfo($this->vendorId);
			}else{
				$data['userInfo'][0] = (object)array("email" => false, 'mobile' => '');
			}
			
			$data['vehicleRecords'] = $this->vehicle_model->getallvehicles();
			$data['vehicleRateRecords'] = $this->vehicle_model->getvehiclesPrice($data['vehicleRecords'][0]->id, '', 'airport', '');

            $data['minAmount'] = $this->vehicle_model->getminamount();
			
			if($data['pick_type'] == 'to_airport')
			{
				if(!empty($data['distance'])){
					$data['distance'] = $data['distance']*2;
				}
				$distance = $data['distance'];
				$duration = $data['duration'];
				$car_price = $data['vehicleRateRecords'][0]->two_pay_price;
				$distance_price = $car_price*$data['distance'];
				$data['km_approx'] = $km_approx = $data['duration'].' '.$data['distance'].' km';
			}
			else{
				$distance = $data['distance'];
				$duration = $data['duration'];
				$car_price = $data['vehicleRateRecords'][0]->price;
				$distance_price = $car_price*$data['distance'];
				$data['km_approx'] = $km_approx = $data['duration'].' - '.$data['distance'].' km';
			}
			
			$subtotal = $distance_price - $discount;
			$subtotal += $data['vehicleRecords'][0]->start_fee;
			$total_tax = (($subtotal*5)/100);
			$total_cart_price = $subtotal + $total_tax;
			$min_amount = (($total_cart_price * $data['minAmount'][0]->price)/100);
			
			$this->cart->destroy();
			
			$dataA = array(
				'id'      => $data['vehicleRecords'][0]->id,
				'cab_price_id'      => $data['vehicleRateRecords'][0]->id,
				'qty'     => 1,
				'price'   => $car_price,
				'name'    => $data['vehicleRecords'][0]->name,
				'minAmount'    => $data['minAmount'][0]->price,
				'trip_type'    => $data['trip_type'],
				'pick_type'    => $data['pick_type'],
				'pickup_location'    => $data['pickup_location'],
				'drop_location'    => $data['drop_location'],
				'pickup_date'    => $data['pickup_date'],
				'pickup_time'    => $data['pickup_time'],
				'return_date'    => $return_date,
				'return_time'    => $return_time,
				'km_approx' => $km_approx,
				'one_way_distance'  => $distance_value,
				'distance'    => $distance,
				'duration'    => $duration,
				'additional_ride_time_fare' => $data['vehicleRateRecords'][0]->additional_ride_time_fare,
				'additional_km_fare' => $data['vehicleRateRecords'][0]->additional_km_fare,
				'driver_allowance' => $data['vehicleRateRecords'][0]->driver_allowance,
				'night_charges' => $data['vehicleRateRecords'][0]->night_charges,
				'car_price'    => $distance_price + $data['vehicleRecords'][0]->start_fee,
				'min_total'    => number_format($min_amount, 2),
				'sub_total'    => number_format($subtotal, 2),
				'total_tax'    => number_format($total_tax, 2),
				'total_discount'    => number_format($discount, 2),
				'total_price'    => number_format($total_cart_price, 2),
				'start_fee' => $data['vehicleRecords'][0]->start_fee
				
			);
			
			//pre($dataA);

			$data['cart_id'] = $cart_id = $this->cart->insert($dataA);
		
			$data['cart_items'] = $this->cart->contents();
			$data['cart_items'] = $data['cart_items'][$cart_id];           

			$this->loadViews("book-airport-car", $this->global, $data , NULL);
		}
    }
    
    function update_airport_cart()
    {
		$start_hours = $hours = $car_price = $distance = 0;
		$duration = $distance_price = $subtotal = $tax = 0;
		$total = $total_cart_price = $total_tax = $cart_id = 0;
		$return_date = $return_time = $discount = $min_amount = 0;
		$km_approx = $pick_type1 = 0;
		
		$trip_id = $this->security->xss_clean($this->input->post('trip_id'));
		$vehicle_id = $this->security->xss_clean($this->input->post('vehicle_id'));
		//$pick_type = $this->security->xss_clean($this->input->post('pick_type'));
		$pick_type = 'from_airport';
		$pickup_date = $this->input->post('pickup_date');
		$pickup_time = $this->input->post('pickup_time');
		$return_date = $return_date = $this->input->post('return_date');
		$return_time = $return_time = $this->input->post('return_time');
		
		$this->load->model('vehicle_model');
		
		foreach ($this->cart->contents() as $items){
			$distance = $items['distance'];
			$duration = $items['duration'];
			$pick_type1 = $items['pick_type'];
			$one_way_distance = $items['one_way_distance'];
		}
		
		$data['vehicleRateRecords'] = $this->vehicle_model->getvehiclesDetails($vehicle_id, $distance, 'city', '');

        $data['minAmount'] = $this->vehicle_model->getminamount();
		
		if($pick_type == 'to_airport')
		{
			$distance = $one_way_distance*2;
			$duration = $duration;
			$car_price = $data['vehicleRateRecords'][0]->two_pay_price;
			$distance_price = $car_price*$distance;
			$km_approx = $km_approx = $duration.' - '.$distance.' km';
		}
		else{
			$distance = $one_way_distance;
			$duration = $duration;
			$car_price = $data['vehicleRateRecords'][0]->price;
			$distance_price = $car_price*$distance;
			$km_approx = $km_approx = $duration .' - ' .$distance.' km';
		}
		
		
		$subtotal = $distance_price - $discount;
		$subtotal += $data['vehicleRateRecords'][0]->start_fee;
		$total_tax = (($subtotal*5)/100);
		$total_cart_price = $subtotal + $total_tax;
		$min_amount = (($total_cart_price * $data['minAmount'][0]->price)/100);
		
        $dataA = array(
				'rowid' => $trip_id,
				'id'      => $vehicle_id,
				'cab_price_id'      => $data['vehicleRateRecords'][0]->id,
				'price'   => $car_price,
				'name'    => $data['vehicleRateRecords'][0]->name,
				'minAmount'    => $data['minAmount'][0]->price,
				'pick_type'    => $pick_type,
				'pickup_date'    => $pickup_date,
				'pickup_time'    => $pickup_time,
				'return_date'    => $return_date,
				'return_time'    => $return_time,
				'km_approx' => $km_approx,
				'additional_ride_time_fare' => $data['vehicleRateRecords'][0]->additional_ride_time_fare,
				'additional_km_fare' => $data['vehicleRateRecords'][0]->additional_km_fare,
				'driver_allowance' => $data['vehicleRateRecords'][0]->driver_allowance,
				'night_charges' => $data['vehicleRateRecords'][0]->night_charges,
				'car_price'    => $distance_price + $data['vehicleRateRecords'][0]->start_fee,
				'min_total'    => number_format($min_amount, 2),
				'sub_total'    => number_format($subtotal, 2),
				'total_tax'    => number_format($total_tax, 2),
				'total_discount'    => number_format($discount, 2),
				'total_price'    => number_format($total_cart_price, 2),
				'start_fee' => $data['vehicleRecords'][0]->start_fee
				
			);

        $itemid = $this->cart->update($dataA);

        $arr_result = array('status' => 1, 'cart_data' => $dataA);
		header('Content-Type: application/json');
		echo json_encode($arr_result, JSON_PRETTY_PRINT);
    }
	
    	
	
	function update_city_cart()
    {
		$start_hours = $hours = $car_price = $distance = 0;
		$duration = $distance_price = $subtotal = $tax = 0;
		$total = $total_cart_price = $total_tax = $cart_id = 0;
		$return_date = $return_time = $discount = $min_amount = 0;
		$km_approx = $pick_type1 = 0;
		
		$trip_id = $this->security->xss_clean($this->input->post('trip_id'));
		$vehicle_id = $this->security->xss_clean($this->input->post('vehicle_id'));
		//$pick_type = $this->security->xss_clean($this->input->post('pick_type'));
		$pick_type = 'one_way';
		$pickup_date = $this->input->post('pickup_date');
		$pickup_time = $this->input->post('pickup_time');
		$return_date = $return_date = $this->input->post('return_date');
		$return_time = $return_time = $this->input->post('return_time');
		
		$this->load->model('vehicle_model');
		
		foreach ($this->cart->contents() as $items){
			$distance = $items['distance'];
			$duration = $items['duration'];
			$pick_type1 = $items['pick_type'];
			$one_way_distance = $items['one_way_distance'];
		}
		
		$data['vehicleRateRecords'] = $this->vehicle_model->getvehiclesDetails($vehicle_id, $distance, 'city', '');

        $data['minAmount'] = $this->vehicle_model->getminamount();
		
		if($pick_type == 'round_trip')
		{
			$distance = $one_way_distance*2;
			$duration = $duration;
			$car_price = $data['vehicleRateRecords'][0]->two_pay_price;
			$distance_price = $car_price*$distance;
			$km_approx = $km_approx = $duration.' - '.$distance.' km';
		}
		else{
			$distance = $one_way_distance;
			$duration = $duration;
			$car_price = $data['vehicleRateRecords'][0]->price;
			$distance_price = $car_price*$distance;
			$km_approx = $km_approx = $duration .' - ' .$distance.' km';
		}
		
		
		$subtotal = $distance_price - $discount;
		$subtotal += $data['vehicleRateRecords'][0]->start_fee;
		$total_tax = (($subtotal*5)/100);
		$total_cart_price = $subtotal + $total_tax;
		$min_amount = (($total_cart_price * $data['minAmount'][0]->price)/100);
		
        $dataA = array(
				'rowid' => $trip_id,
				'id'      => $vehicle_id,
				'cab_price_id'      => $data['vehicleRateRecords'][0]->id,
				'price'   => $car_price,
				'name'    => $data['vehicleRateRecords'][0]->name,
				'minAmount'    => $data['minAmount'][0]->price,
				'pick_type'    => $pick_type,
				'pickup_date'    => $pickup_date,
				'pickup_time'    => $pickup_time,
				'return_date'    => $return_date,
				'return_time'    => $return_time,
				'km_approx' => $km_approx,
				'additional_ride_time_fare' => $data['vehicleRateRecords'][0]->additional_ride_time_fare,
				'additional_km_fare' => $data['vehicleRateRecords'][0]->additional_km_fare,
				'driver_allowance' => $data['vehicleRateRecords'][0]->driver_allowance,
				'night_charges' => $data['vehicleRateRecords'][0]->night_charges,
				'car_price'    => $distance_price + $data['vehicleRateRecords'][0]->start_fee,
				'min_total'    => number_format($min_amount, 2),
				'sub_total'    => number_format($subtotal, 2),
				'total_tax'    => number_format($total_tax, 2),
				'total_discount'    => number_format($discount, 2),
				'total_price'    => number_format($total_cart_price, 2),
				'start_fee' => $data['vehicleRecords'][0]->start_fee
				
			);

        $itemid = $this->cart->update($dataA);

        $arr_result = array('status' => 1, 'cart_data' => $dataA);
		header('Content-Type: application/json');
		echo json_encode($arr_result, JSON_PRETTY_PRINT);
    }
	
	public function bookoutstationcar()
    {
		$start_hours = $hours = $car_price = $distance = 0;
		$duration = $distance_price = $subtotal = $tax = 0;
		$total = $total_cart_price = $total_tax = $cart_id = 0;
		$return_date = $return_time = $discount = $min_amount = 0;
		$km_approx = $distance_value = 0;
		
		$this->load->library('form_validation');
        
		//$this->form_validation->set_rules('trip_type','Trip Type','required|trim');

		$this->form_validation->set_rules('pick_type','Pick Type','required');
        $this->form_validation->set_rules('pickup_location','Pickup Location','required|trim');
		$this->form_validation->set_rules('drop_location','Drop Location','required|trim');
		$this->form_validation->set_rules('pickup_date','Pickup Date','required|trim');
		$this->form_validation->set_rules('pickup_time','Pickup Time','required|trim');	
		
        if($this->form_validation->run() == FALSE)
        {
            // $this->index();
            redirect('quotation');
        }
        else
        {
			$this->load->model('vehicle_model');
			$this->global['pageTitle'] = 'Quotation Page';
			
			$data['trip_type'] = 'outstation';
			$data['pick_type'] = $this->security->xss_clean($this->input->post('pick_type'));
			$data['pickup_location'] = $this->security->xss_clean($this->input->post('pickup_location'));
			$data['drop_location'] = $this->security->xss_clean($this->input->post('drop_location'));
			$data['pickup_date'] = $this->input->post('pickup_date');
			$data['pickup_time'] = $this->input->post('pickup_time');
			$data['return_date'] = $return_date = $this->input->post('return_date');
			$data['return_time'] = $return_time = $this->input->post('return_time');
			$data['distance'] = 0;
			$data['duration'] = 0;
			
			// Get distance in km
			//$data['distance'] = $distance = getDistance($data['pickup_location'], $data['drop_location'], "K");
			
			// Get distance in km and time
			$distance = getDistanceTime($data['pickup_location'], $data['drop_location'], "K");
			
			// remove comment

			if($distance < 2)
			{
				redirect('quotation');
			}

			// end
			
			if($distance['status'] == 1){
				$data['distance'] = $distance_value = $distance['distance_value'];
				$data['duration'] = $distance['duration'];
			}
			
			if(!empty($this->vendorId)){
				$data['userInfo'] = $this->user_model->getUserInfo($this->vendorId);
			}else{
				$data['userInfo'][0] = (object)array("email" => false, 'mobile' => '');
			}
			
			$data['vehicleRecords'] = $this->vehicle_model->getallvehicles();
			$data['vehicleRateRecords'] = $this->vehicle_model->getvehiclesPrice($data['vehicleRecords'][0]->id, '', 'outstation', '');
			//echo '<br><br><br><br><br><br><br><br>';
			//pre($data['vehicleRateRecords']);
			//pre($data);
            $data['minAmount'] = $this->vehicle_model->getminamount();
			
			if($data['pick_type'] == 'round_trip')
			{
				if(!empty($data['distance'])){
					$data['distance'] = $data['distance']*2;
				    $data['duration'] = $data['duration']*2;
				}
				$distance = $data['distance'];
				$duration = 'Round Trip (one side: '.$data['duration'].')';
				$car_price = $data['vehicleRateRecords'][0]->two_pay_price;
				$distance_price = $car_price*$data['distance'];
				$data['km_approx'] = $km_approx = 'Round Trip ('.$data['duration'].') '.$data['distance'].' km';
			}
			else{
				$distance = $data['distance'];
				$duration = 'One Way Trip (one side: '.$data['duration'].')';
				$car_price = $data['vehicleRateRecords'][0]->price;
				$distance_price = $car_price*$data['distance'];
				$data['km_approx'] = $km_approx = 'One Way Trip ('.$data['duration'].') - '.$data['distance'].' km';
			}
			
			$subtotal = $distance_price - $discount;
			$subtotal += $data['vehicleRecords'][0]->start_fee;
			$total_tax = (($subtotal*5)/100);
			$total_cart_price = $subtotal + $total_tax;
			$min_amount = (($total_cart_price * $data['minAmount'][0]->price)/100);
			
			$this->cart->destroy();
			
			$dataA = array(
				'id'      => $data['vehicleRecords'][0]->id,
				'cab_price_id'      => $data['vehicleRateRecords'][0]->id,
				'qty'     => 1,
				'price'   => $car_price,
				'name'    => $data['vehicleRecords'][0]->name,
				'minAmount'    => $data['minAmount'][0]->price,
				'trip_type'    => $data['trip_type'],
				'pick_type'    => $data['pick_type'],
				'pickup_location'    => $data['pickup_location'],
				'drop_location'    => $data['drop_location'],
				'pickup_date'    => $data['pickup_date'],
				'pickup_time'    => $data['pickup_time'],
				'return_date'    => $return_date,
				'return_time'    => $return_time,
				'km_approx' => $km_approx,
				'one_way_distance'  => $distance_value,
				'distance'    => $distance,
				'duration_text'    => $duration,
				'duration'    => $data['duration'],
				'additional_ride_time_fare' => $data['vehicleRateRecords'][0]->additional_ride_time_fare,
				'additional_km_fare' => $data['vehicleRateRecords'][0]->additional_km_fare,
				'driver_allowance' => $data['vehicleRateRecords'][0]->driver_allowance,
				'night_charges' => $data['vehicleRateRecords'][0]->night_charges,
				'car_price'    => $distance_price + $data['vehicleRecords'][0]->start_fee,
				'min_total'    => number_format($min_amount, 2),
				'sub_total'    => number_format($subtotal, 2),
				'total_tax'    => number_format($total_tax, 2),
				'total_discount'    => number_format($discount, 2),
				'total_price'    => number_format($total_cart_price, 2),
				'start_fee' => $data['vehicleRecords'][0]->start_fee
				
			);
			
			//pre($dataA);

			$data['cart_id'] = $cart_id = $this->cart->insert($dataA);
		
			$data['cart_items'] = $this->cart->contents();
			$data['cart_items'] = $data['cart_items'][$cart_id];  
			
			$this->loadViews("book-outstation-car", $this->global, $data , NULL);
		}
    }
    
	function update_outstation_cart()
    {
		$start_hours = $hours = $car_price = $distance = 0;
		$duration = $distance_price = $subtotal = $tax = 0;
		$total = $total_cart_price = $total_tax = $cart_id = 0;
		$return_date = $return_time = $discount = $min_amount = 0;
		$km_approx = $pick_type1 = 0;
		
		$trip_id = $this->security->xss_clean($this->input->post('trip_id'));
		$vehicle_id = $this->security->xss_clean($this->input->post('vehicle_id'));
		$pick_type = $this->security->xss_clean($this->input->post('pick_type'));
		$pickup_date = $this->input->post('pickup_date');
		$pickup_time = $this->input->post('pickup_time');
		$return_date = $return_date = $this->input->post('return_date');
		$return_time = $return_time = $this->input->post('return_time');
		
		$this->load->model('vehicle_model');
		
		foreach ($this->cart->contents() as $items){
			$distance = $items['distance'];
			$duration = $items['duration'];
			$pick_type1 = $items['pick_type'];
			$one_way_distance = $items['one_way_distance'];
		}
		
		$data['vehicleRateRecords'] = $this->vehicle_model->getvehiclesDetails($vehicle_id, $distance, 'outstation', '');
		
		//pre($data['vehicleRateRecords']);

        $data['minAmount'] = $this->vehicle_model->getminamount();
		
		
		if($pick_type == 'round_trip')
		{
			$distance = $one_way_distance*2;
			$duration = $duration;
			$car_price = $data['vehicleRateRecords'][0]->two_pay_price;
			$distance_price = $car_price*$distance;
			$km_approx = $km_approx = 'Round Trip (one side: '.$duration.') '.$distance.' km';
		}
		else{
			$distance = $one_way_distance;
			$duration = $duration;
			$car_price = $data['vehicleRateRecords'][0]->price;
			$distance_price = $car_price*$distance;
			$km_approx = $km_approx = 'One Way Trip (one side: '.$duration.') - '.$distance.' km';
		}
		
		if($distance < 1)
		{
			redirect('quotation');
		}
		$subtotal = $distance_price - $discount;
		$subtotal = $subtotal + $data['vehicleRateRecords'][0]->start_fee;
		$total_tax = (($subtotal*5)/100);
		$total_cart_price = $subtotal + $total_tax;
		$min_amount = (($total_cart_price * $data['minAmount'][0]->price)/100);
		
        $dataA = array(
				'rowid' => $trip_id,
				'id'      => $vehicle_id,
				'cab_price_id'      => $data['vehicleRateRecords'][0]->id,
				'price'   => $car_price,
				'name'    => $data['vehicleRateRecords'][0]->name,
				'minAmount'    => $data['minAmount'][0]->price,
				'pick_type'    => $pick_type,
				'pickup_date'    => $pickup_date,
				'pickup_time'    => $pickup_time,
				'return_date'    => $return_date,
				'return_time'    => $return_time,
				'km_approx' => $km_approx,
				'additional_ride_time_fare' => $data['vehicleRateRecords'][0]->additional_ride_time_fare,
				'additional_km_fare' => $data['vehicleRateRecords'][0]->additional_km_fare,
				'driver_allowance' => $data['vehicleRateRecords'][0]->driver_allowance,
				'night_charges' => $data['vehicleRateRecords'][0]->night_charges,
				'car_price'    => $distance_price + $data['vehicleRateRecords'][0]->start_fee,
				'min_total'    => number_format($min_amount, 2),
				'sub_total'    => number_format($subtotal, 2),
				'total_tax'    => number_format($total_tax, 2),
				'total_discount'    => number_format($discount, 2),
				'total_price'    => number_format($total_cart_price, 2),
				'start_fee' => $data['vehicleRateRecords'][0]->start_fee
			);
		//pre($dataA);
        $itemid = $this->cart->update($dataA);

        $arr_result = array('status' => 1, 'cart_data' => $dataA);
		header('Content-Type: application/json');
		echo json_encode($arr_result, JSON_PRETTY_PRINT);
    }
	
	public function bookrentalcar()
    {
		$start_hours = $hours = $car_price = $distance = 0;
		$duration = $distance_price = $subtotal = $tax = 0;
		$total = $total_cart_price = $total_tax = $cart_id = 0;
		$return_date = $return_time = $discount = $min_amount = 0;
		$km_approx = 0;
		
		
		$this->load->library('form_validation');
        
		//$this->form_validation->set_rules('trip_type','Trip Type','required|trim');
		$this->form_validation->set_rules('pick_type','Pick Type','required');
        $this->form_validation->set_rules('pickup_location','Pickup Location','required|trim');
		$this->form_validation->set_rules('pickup_date','Pickup Date','required|trim');
		$this->form_validation->set_rules('pickup_time','Pickup Time','required|trim');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->index();
        }
        else
        {
			$this->load->model('vehicle_model');
			$this->global['pageTitle'] = 'Home page';
			
			$data['trip_type'] = 'rental';
			$data['pick_type'] = $this->security->xss_clean($this->input->post('pick_type'));
			$data['pickup_location'] = $this->security->xss_clean($this->input->post('pickup_location'));
			$data['pickup_date'] = $this->input->post('pickup_date');
			$data['pickup_time'] = $this->input->post('pickup_time');
			
			if(!empty($this->vendorId))
			{
				$data['userInfo'] = $this->user_model->getUserInfo($this->vendorId);
			}else{
				$data['userInfo'][0] = (object)array("email" => false, 'mobile' => '');
			}
			
			
			$data['vehicleRecords'] = $this->vehicle_model->getallvehicles();
			$data['vehicleRateRecords'] = $this->vehicle_model->getvehiclesPrice($data['vehicleRecords'][0]->id, '', 'rental', $data['pick_type']);
			//echo '<br><br><br><br><br><br><br><br>';
			//pre($data['vehicleRateRecords']);
			//pre($data);
            $data['minAmount'] = $this->vehicle_model->getminamount();
			
			if($data['pick_type'] == 'full_day')
			{
				$start_hours = $data['pickup_date'].' '.$data['pickup_time'];
				$return_date = date('d-m-Y',strtotime('+8 hour', strtotime($start_hours)));
				$return_time = date('H:i A',strtotime('+8 hour', strtotime($start_hours)));
				$hours = date('d-m-Y H:i A',strtotime('+8 hour', strtotime($start_hours)));
				$distance = 80;
				$duration = 'Full Day Trip (8 hrs 80 km)';
				$car_price = $data['vehicleRateRecords'][0]->price;
				$distance_price = $car_price*80;
				$km_approx = '8 hrs 80 km';
			}
			else{
				$start_hours = $data['pickup_date'].' '.$data['pickup_time'];
				$return_date = date('d-m-Y',strtotime('+4 hour', strtotime($start_hours)));
				$return_time = date('H:i A',strtotime('+4 hour', strtotime($start_hours)));
				$hours = date('d-m-Y H:i A',strtotime('+4 hour', strtotime($start_hours)));
				$distance = 40;
				$duration = 'Half Day Trip (4 hrs 40 km)';
				$car_price = $data['vehicleRateRecords'][0]->price;
				$distance_price = $car_price*40;
				$km_approx = '4 hrs 40 km';
			}
			
			if($distance < 1)
			{
				redirect('quotation');
			}
			
			$subtotal = $distance_price - $discount;
			$subtotal = $subtotal + $data['vehicleRecords'][0]->start_fee;
			$total_tax = (($subtotal*5)/100);
			$total_cart_price = $subtotal + $total_tax;
			$min_amount = (($total_cart_price * $data['minAmount'][0]->price)/100);
			
			$this->cart->destroy();
			
			$dataA = array(
				'id'      => $data['vehicleRecords'][0]->id,
				'cab_price_id'      => $data['vehicleRateRecords'][0]->id,
				'qty'     => 1,
				'price'   => $data['vehicleRateRecords'][0]->price,
				'name'    => $data['vehicleRecords'][0]->name,
				'minAmount'    => $data['minAmount'][0]->price,
				'trip_type'    => $data['trip_type'],
				'pick_type'    => $data['pick_type'],
				'pickup_location'    => $data['pickup_location'],
				'drop_location'    => $data['pickup_location'],
				'pickup_date'    => $data['pickup_date'],
				'pickup_time'    => $data['pickup_time'],
				'return_date'    => $return_date,
				'return_time'    => $return_time,
				'km_approx' => $km_approx,
				'distance'    => $distance,
				'duration'    => $duration,
				'additional_ride_time_fare' => $data['vehicleRateRecords'][0]->additional_ride_time_fare,
				'additional_km_fare' => $data['vehicleRateRecords'][0]->additional_km_fare,
				'driver_allowance' => $data['vehicleRateRecords'][0]->driver_allowance,
				'night_charges' => $data['vehicleRateRecords'][0]->night_charges,
				'car_price'    => $distance_price + $data['vehicleRecords'][0]->start_fee,
				'min_total'    => number_format($min_amount, 2),
				'sub_total'    => number_format($subtotal, 2),
				'total_tax'    => number_format($total_tax, 2),
				'total_discount'    => number_format($discount, 2),
				'total_price'    => number_format($total_cart_price, 2),
				'start_fee' => $data['vehicleRecords'][0]->start_fee
			);

			$data['cart_id'] = $cart_id = $this->cart->insert($dataA);
		
			$data['cart_items'] = $this->cart->contents();
			$data['cart_items'] = $data['cart_items'][$cart_id];           

			$this->loadViews("book-rental-car", $this->global, $data , NULL);
		}
    }
	
	function update_rental_cart()
    {
		$start_hours = $hours = $car_price = $distance = 0;
		$duration = $distance_price = $subtotal = $tax = 0;
		$total = $total_cart_price = $total_tax = $cart_id = 0;
		$return_date = $return_time = $discount = $min_amount = 0;
		$km_approx = 0;
		
		$trip_id = $this->security->xss_clean($this->input->post('trip_id'));
		$vehicle_id = $this->security->xss_clean($this->input->post('vehicle_id'));
		$pick_type = $this->security->xss_clean($this->input->post('pick_type'));
		$pickup_date = $this->input->post('pickup_date');
		$pickup_time = $this->input->post('pickup_time');
		
		$this->load->model('vehicle_model');
		
		$data['vehicleRateRecords'] = $this->vehicle_model->getvehiclesDetails($vehicle_id, '', 'rental', $pick_type);

        $data['minAmount'] = $this->vehicle_model->getminamount();
		
		if($pick_type == 'full_day')
		{
			$start_hours = $pickup_date.' '.$pickup_time;
			$return_date = date('d-m-Y',strtotime('+8 hour', strtotime($start_hours)));
			$return_time = date('H:i A',strtotime('+8 hour', strtotime($start_hours)));
			$hours = date('d-m-Y H:i A',strtotime('+8 hour', strtotime($start_hours)));
			$distance = 80;
			$duration = 'Full Day Trip (8 hrs 80 km)';
			$car_price = $data['vehicleRateRecords'][0]->price;
			$distance_price = $car_price*80;
			$km_approx = '8 hrs 80 km';
		}
		else{
			$start_hours = $pickup_date.' '.$pickup_time;
			$return_date = date('d-m-Y',strtotime('+4 hour', strtotime($start_hours)));
			$return_time = date('H:i A',strtotime('+4 hour', strtotime($start_hours)));
			$hours = date('d-m-Y H:i A',strtotime('+4 hour', strtotime($start_hours)));
			$distance = 40;
			$duration = 'Half Day Trip (4 hrs 40 km)';
			$car_price = $data['vehicleRateRecords'][0]->price;
			$distance_price = $car_price*40;
			$km_approx = '4 hrs 40 km';
		}
		
		$subtotal = $distance_price - $discount;
		$subtotal += $data['vehicleRateRecords'][0]->start_fee;
		$total_tax = (($subtotal*5)/100);
		$total_cart_price = $subtotal + $total_tax;
		$min_amount = (($total_cart_price * $data['minAmount'][0]->price)/100);
		
        $dataA = array(
				'rowid' => $trip_id,
				'id'      => $vehicle_id,
				'cab_price_id'      => $data['vehicleRateRecords'][0]->id,
				'qty'     => 1,
				'price'   => $data['vehicleRateRecords'][0]->price,
				'name'    => $data['vehicleRateRecords'][0]->name,
				'minAmount'    => $data['minAmount'][0]->price,
				'pick_type'    => $pick_type,
				'pickup_date'    => $pickup_date,
				'pickup_time'    => $pickup_time,
				'return_date'    => $return_date,
				'return_time'    => $return_time,
				'km_approx' => $km_approx,
				'distance'    => $distance,
				'duration'    => $duration,
				'additional_ride_time_fare' => $data['vehicleRateRecords'][0]->additional_ride_time_fare,
				'additional_km_fare' => $data['vehicleRateRecords'][0]->additional_km_fare,
				'driver_allowance' => $data['vehicleRateRecords'][0]->driver_allowance,
				'night_charges' => $data['vehicleRateRecords'][0]->night_charges,
				'car_price'    => $distance_price + $data['vehicleRateRecords'][0]->start_fee,
				'min_total'    => number_format($min_amount, 2),
				'sub_total'    => number_format($subtotal, 2),
				'total_tax'    => number_format($total_tax, 2),
				'total_discount'    => number_format($discount, 2),
				'total_price'    => number_format($total_cart_price, 2),
				'start_fee' => $data['vehicleRateRecords'][0]->start_fee
			);

        $itemid = $this->cart->update($dataA);

        $arr_result = array('status' => 1, 'cart_data' => $dataA);
		header('Content-Type: application/json');
		echo json_encode($arr_result, JSON_PRETTY_PRINT);
    }
	
	

	
	
	
}

?>