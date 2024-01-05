<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Payment extends BaseController {

	public function __construct() {
	
		parent::__construct();
		$this->load->model('payment_model');
		$this->load->model('user_model');

		$this->global['admin_details'] = $this->user_model->adminCompanyListing();
		
		$this->datas();
		
	}

	public function apply_coupon()
	{
		$coupon = $this->input->post('coupon_code');
		$row_id = $this->input->post('id');
		$coupon_valid = $this->payment_model->validate_coupon($coupon);

		$date_now = date("Y-m-d");
		$price = $discount = $sub_total = $total_tax = $total_discount = $total_price = 0;
		$minAmount = $distance_price = 0;

		if ($coupon_valid['response'] == 1) {
			//get current date and check current date is not greater than coupon expiry date
			$current_date =  strtotime($date_now);
			$coupon_expiry = strtotime($coupon_valid['data'][0]->coupon_exp_date);

			if ($current_date <= $coupon_expiry){
				foreach ($this->cart->contents() as $items) {
					$minAmount = $items['minAmount'];
					$distance_price = $items['distance'] * $items['price'];
				}

				if($coupon_valid['data'][0]->coupon_type == 'per'){
					if($distance_price > 0)
					{
						$discount = (($distance_price * $coupon_valid['data'][0]->coupon_amount)/100);
						//$discount = (float) $discount;
						//$discount = number_format($discount, 2);
					}
				}else{
					$discount =  $coupon_valid['data'][0]->coupon_amount;
					//$discount = (float) $discount;
					//$discount = number_format($discount, 2);
				}
				
				$sub_total = $distance_price - $discount;
				$total_tax = (($sub_total*5)/100);
				$total_price = $sub_total + $total_tax;
				$min_amount = (($total_price * $minAmount)/100);
				
				$data = array(
						'rowid' => $row_id, 
						'sub_total' => number_format($sub_total, 2), 
						'total_tax' => number_format($total_tax, 2), 
						'min_total' => number_format($min_amount, 2),
						'total_price' => number_format($total_price, 2),						
						'total_discount' => number_format($discount, 2)
					);

				$this->cart->update($data);
				
				$arr_result = array('status' => 1, 'message' => 'Coupon applied successfully', 'cart_data' => $data);
				header('Content-Type: application/json');
				echo json_encode($arr_result, JSON_PRETTY_PRINT);
			} else {
				$arr_result = array('status' => 0, 'message' => 'Coupon is expired');
				header('Content-Type: application/json');
				echo json_encode($arr_result, JSON_PRETTY_PRINT);
			}
		} else {
			$arr_result = array('status' => 0, 'message' => 'Invalid Coupon');
			header('Content-Type: application/json');
			echo json_encode($arr_result, JSON_PRETTY_PRINT);
		}
	}


	public function add_plan_ajax()
	{
		$price_type = 0;
		$planBasePrice  = 0;

		$plan_id = $this->input->post('plan_id');
		$plan_service_id = $this->input->post('plan_service_id');
		$max_users_id = $this->input->post('max_users_id');

		if ($this->input->post('price_type')) {
			$price_type = $this->input->post('price_type');
		}

		$price = $this->plansmodel->getpriceidfromservice($plan_service_id, $max_users_id);
		$data['plan'] = $this->plansmodel->plan($price[0]['id'], $max_users_id);

		if ($planBasePrice == 0) {
			$this->cart->destroy();
		}
		foreach ($this->cart->contents() as $items) {
			if ($items['is_free'] == 1) {
				$this->cart->destroy();
			}
		}

		$planBasePrice = $data['plan'][0]['price'];

		$finalPlanPrice = '';
				$tax =  ($finalPlanPrice * 18 / 100);
				$tax = round($tax);
				//$total = ($finalPlanPrice + $tax);
				$total = $finalPlanPrice;

				$data = array(
					'status'	=>	true,
					'id'	=>	$price[0]['sku'],
					'plan_id'	=>	$plan_id,
					'price'	=> $planBasePrice,
					'tax'	=> number_format(0, 2),
					'name'	=> $data['plan'][0]['name'],
					'description'	=> $data['plan'][0]['description'],
					'licence_key' => '',
					'is_bulk' => $data['plan'][0]['is_bulk'],
					'tempPrice' => 0,
					'coupon_code'	=>	'',
					'tax_rate'	=>	0,
					'discount'	=>	0,
					'discount_type' => '',
					'discount_rate' => 0,
					'subtotalprice'	=>	$finalPlanPrice,
					'total'	=>	$total,
					'price_type'	=>	$price_type
				);

				$data['itemid'] = $this->cart->insert($data);
				$data['total_cart'] = $this->cart->total_items();
				if (isset($_POST['failedInvoice'])) {
					return $data;
				} else {
					echo json_encode($data);
				}
	}
	
	
	//failure page if payment is unsuccessfull any reasons	
	public function failure()
	{
		//pre($_POST);
		$data = array();
		$dataArr = array();
		$data['status'] = $_POST["status"];
		$data['amount'] = $_POST["amount"];
		$data['txnid'] = $_POST["txnid"];
		$data['productinfo'] = $_POST["productinfo"];
		$data['created_at'] = $_POST["addedon"];

		$dataArr['status'] = 'failed';
		$dataArr['gateway_id'] = $_POST["payuMoneyId"];
		$dataArr['updated_at'] = date('Y-m-d H:i:s');
		$dataArr['paid_amount'] = $_POST["amount"];


		$this->payment_model->update_order_status($_POST["txnid"], $dataArr);

		// $loginText = 'Sewakcabs transaction has failed or was cancelled.';
	    // $sendOtp = $this->sendSMS($_POST["phone"], $loginText, '');

		
		$this->global['pageTitle'] = 'Payment Status - Failure';

		$this->loadViews("master/payment/failure", $this->global, $data , NULL);
		//exit();
	}
	
// 	public function success()
// 	{
// // 		$status = '';
// // 		$firstname = '';
// // 		$amount = '';
// // 		$txnid = '';
// // 		$posted_hash = '';
// // 		$key = '';
// // 		$productinfo = '';
// // 		$email = '';
// // 		$mobile = '';
// // 		$salt = '';
	
// // 		$status = $_POST["status"];
// 		$status = "success";
// 		$firstname = $_POST["fname"];
// 		$amount = $_POST["amount"];
// 		$txnid = $_POST["txnid"];
// 		$posted_hash = $_POST["hash"];
// 		$key = $_POST["key"];
// 		$productinfo = $_POST["productinfo"];
// 		$email = $_POST["email"];
// 		$mobile = $_POST["phone"];
// 		$salt = HB_SALT;
// 		//pre($_POST);
		
// 		/*$status = "success";
// 		$firstname = "Bharat Bhushan";
// 		$amount = "31.50";
// 		$txnid = "1440627";
// 		$posted_hash = $_POST["hash"];
// 		$key = $_POST["key"];
// 		$productinfo = "Hatchback";
// 		$email = "bharatverma.verma@gmail.com";
// 		$mobile = "9990999876";		*/

// 		// Salt should be same Post Request 
// 		if(isset($_POST["additionalCharges"])) {
// 			$additionalCharges = $_POST["additionalCharges"];
// 			$retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
// 		} 
// 		else {
// 			$retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
// 		}
		
// 		$hash = hash("sha512", $retHashSeq);
// 		$status = $this->payment_model->update_order_status($_POST["txnid"], $dataArr);
		
// 		$data = array();
// 		$update = array();
// 		$data['status'] = $status;
// 		$data['amount'] = $amount;
// 		$data['txnid'] = $txnid;
// 		$data['productinfo'] = $_POST["productinfo"];
// 		$data['created_at'] = $_POST["addedon"];
// 		$data['gateway_id'] = $_POST["payuMoneyId"];
// 		$update['paid_amount'] = $_POST["amount"];
		
// 		if ($hash != $posted_hash) {
// 			$data['status'] = "Invalid Transaction";
// 		} else {
// 			if($txnid)
// 			{
// 				$mail['order'] = $this->payment_model->getorder($txnid);
// 				//pre($mail['order']);
// 				//pre($mail['order'][0]->send_otp);
				
// 				$update['status'] = 'success';
// 				$update['paid_amount'] = $amount;
				
// 				if(!empty($mail['order']))
// 				{					
// 					if($mail['order'][0]->send_email == 0)
// 					{
// 						$email_status = sendInvoice($mail['order']);
// 						if($email_status == 1)
// 						{
// 							$update['send_email'] = 1;
// 						}
// 						else{
// 							$update['send_email'] = 0;
// 						}
// 					}

// 					if($mail['order'][0]->send_otp == 0)
// 					{						
// 						$loginText = "We have received a payment of Rs. " . $amount . " on behalf of Transaction ID: ".$txnid;
// 						$tempId = '&TemplateID=1007075064447377989';
//                         $sendOtp = $this->sendSMS($mobile, $loginText, $tempId);
// 				// 		$sendOtp = $this->sendSMS($mobile, $loginText, '');
// 						if (strcmp($sendOtp,"Message Submitted")){
// 							$update['send_otp'] = 1;
// 						}
// 						else{
// 							$update['send_otp'] = 0;
// 						}
// 					}
// 					$update['updated_at'] = date('Y-m-d H:i:s');
// 					//pre($update);
// 					// save details in payment.
// 					$this->payment_model->update_order($txnid, $update);
// 				}
// 			}
// 		}
		
// 		$this->global['pageTitle'] = 'Payment Status - Success';
// 		$this->loadViews("master/payment/success", $this->global, $data , NULL);
// 	}
	
    // Payumoney success start
// 	public function success()
// 	{
// 		$status = '';
// 		$firstname = '';
// 		$amount = '';
// 		$txnid = '';
// 		$posted_hash = '';
// 		$key = '';
// 		$productinfo = '';
// 		$email = '';
// 		$mobile = '';
// 		$salt = '';
	
// 		$status = $_POST["status"];
// 		$firstname = $_POST["firstname"];
// 		$amount = $_POST["amount"];
// 		$txnid = $_POST["txnid"];
// 		$posted_hash = $_POST["hash"];
// 		$key = $_POST["key"];
// 		$productinfo = $_POST["productinfo"];
// 		$email = $_POST["email"];
// 		$mobile = $_POST["phone"];
// 		$salt = HB_SALT;
// 		//pre($_POST);
		
// 		/*$status = "success";
// 		$firstname = "Bharat Bhushan";
// 		$amount = "31.50";
// 		$txnid = "1440627";
// 		$posted_hash = $_POST["hash"];
// 		$key = $_POST["key"];
// 		$productinfo = "Hatchback";
// 		$email = "bharatverma.verma@gmail.com";
// 		$mobile = "9990999876";		*/

// 		// Salt should be same Post Request 
// 		if(isset($_POST["additionalCharges"])) {
// 			$additionalCharges = $_POST["additionalCharges"];
// 			$retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
// 		} 
// 		else {
// 			$retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
// 		}
		
// 		$hash = hash("sha512", $retHashSeq);
		
// 		$data = array();
// 		$update = array();
// 		$data['status'] = $status;
// 		$data['amount'] = $amount;
// 		$data['txnid'] = $txnid;
// 		$data['productinfo'] = $_POST["productinfo"];
// 		$data['created_at'] = $_POST["addedon"];
// 		$data['gateway_id'] = $_POST["payuMoneyId"];
// 		$update['paid_amount'] = $_POST["amount"];
		
// 		if ($hash != $posted_hash) {
// 			$data['status'] = "Invalid Transaction";
// 		} else {
// 			if($txnid)
// 			{
// 				$mail['order'] = $this->payment_model->getorder($txnid);
// 				//pre($mail['order']);
// 				//pre($mail['order'][0]->send_otp);
				
// 				$update['status'] = $status;
// 				$update['paid_amount'] = $amount;
				
// 				if(!empty($mail['order']))
// 				{					
// 					if($mail['order'][0]->send_email == 0)
// 					{
// 						$email_status = sendInvoice($mail['order']);
// 						if($email_status == 1)
// 						{
// 							$update['send_email'] = 1;
// 						}
// 						else{
// 							$update['send_email'] = 0;
// 						}
// 					}

// 					if($mail['order'][0]->send_otp == 0)
// 					{						
// 						$loginText = "We have received a payment of Rs. " . $amount . " on behalf of Transaction ID: ".$txnid;
// 						$tempId = '&TemplateID=1007075064447377989';
// 						$addnewnum = ".$mobile. + ',919540572257'";
//                         // $sendOtp = $this->sendSMS(".$mobile.,9540572257". $loginText, $tempId);
//                         $sendOtp = $this->sendSMS($addnewnum, $loginText, $tempId);
// 				// 		$sendOtp = $this->sendSMS($mobile, $loginText, '');
// 						if (strcmp($sendOtp,"Message Submitted")){
// 							$update['send_otp'] = 1;
// 						}
// 						else{
// 							$update['send_otp'] = 0;
// 						}
// 					}
// 					$update['updated_at'] = date('Y-m-d H:i:s');
// 					//pre($update);
// 					// save details in payment.
// 					$this->payment_model->update_order($txnid, $update);
// 				}
// 			}
// 		}
		
// 		$this->global['pageTitle'] = 'Payment Status - Success';
// 		$this->loadViews("master/payment/success", $this->global, $data , NULL);
// 	}
    // Payumoney success end


	// Success for the razorpay start
	public function success()
	{

	

		$status = '';
		$firstname = '';
		$amount = '';
		$txnid = '';
		$posted_hash = '';
		$key = '';
		$productinfo = '';
		$email = '';
		$mobile = '';
		$salt = '';

		if($_POST['razorpay_payment_id']!="" || $_POST['razorpay_payment_id']!=null)

		{
			$status='success';
		}
		else{
			$status='Pending';
		}
	
// 		print_r($status);die;
		
		$firstname      = $_POST["firstname"];
		$amount         = $_POST["amount"];
		$txnid          = $_POST["txnid"];
		$productinfo    = $_POST["productinfo"];
		$email          = $_POST["email"];
		$mobile         = $_POST["phone"];
		
		
		
		$data = array();
		$update = array();
		$data['status'] = $status;
		$data['amount'] = $amount;
		$data['txnid'] = $txnid;
		$data['productinfo'] = $_POST["productinfo"];
		// $data['created_at'] = $_POST["addedon"];
		$data['created_at'] = date('Y-m-d h:i:s');
		$data['gateway_id'] = $_POST["payuMoneyId"];
		$update['paid_amount'] = $_POST["amount"];
		
		

		if ($_POST['razorpay_payment_id']=="" || $_POST['razorpay_payment_id']==null) {
			$data['status'] = "Invalid Transaction";
		} else {
			if($txnid)
			{
				$mail['order'] = $this->payment_model->getorder($txnid);
				
				
				
				$update['status'] = $status;
				$update['paid_amount'] = $amount;
				
				if(!empty($mail['order']))
				{					
					if($mail['order'][0]->send_email == 0)
					{
						$email_status = sendInvoice($mail['order']);
						
						if($email_status == 1)
						{
							$update['send_email'] = 1;
						}
						else{
							$update['send_email'] = 0;
						}
					}

					if($mail['order'][0]->send_otp == 0)
					{						
						$loginText = "We have received a payment of Rs. " . $amount . " on behalf of Transaction ID: ".$txnid;
						$tempId = '&TemplateID=1007075064447377989';
						$addnewnum = ".$mobile. + ',919540572257'";
                        
                        $sendOtp = $this->sendSMS($addnewnum, $loginText, $tempId);
                       
						if (strcmp($sendOtp,"Message Submitted")){
							$update['send_otp'] = 1;
						}
						else{
							$update['send_otp'] = 0;
						}
					}
					$update['updated_at'] = date('Y-m-d H:i:s');
					
					$this->payment_model->update_order($txnid, $update);
				}
			}
		}
		
	   // echo "<pre>";
	   // print_r($this->global);
	   // echo "<pre>";
	   // print_r($data);die;
		
		$this->global['pageTitle'] = 'Payment Status - Success';
		$this->loadViews("master/payment/success", $this->global, $data , NULL);
	}
	// Success for the razorpay end




	//save order
	public function save_order()
	{			
		$status = 'Pending';
		$pickup_date = $pickup_time = $final_date_time = $cart_date_time = '';
		$billing_name = $billing_email = $billing_mobile = $plan_name = '';
		$ip_address = $created_at = $plan_id = $car_type = $trip_type = '';
		
		$user_id = $start_hours = $hours = $car_price = $distance = 0;
		$duration = $distance_price = $base_price = $subtotal = $tax = 0;
		$total = $total_cart_price = $total_tax = $cart_id = 0;
		$return_date = $return_time = $discount = $min_amount = 0;
		$km_approx = $total_amount = $additional_ride_time_fare = 0;
		$additional_km_fare = $driver_allowance = $night_charges = 0;
		
		$pickup_date1 = $this->input->post('pickup_date');
		$pickup_time1 = $this->input->post('pickup_time');
		
		$final_date_time = $pickup_date1.' '.$pickup_time1;
		
		$user_id = $this->security->xss_clean($this->input->post('user_id'));
		$billing_name = $this->security->xss_clean($this->input->post('name'));
		$billing_email = $this->security->xss_clean($this->input->post('email'));
		$billing_mobile = $this->security->xss_clean($this->input->post('mobile'));
		
		
		$billing_email = ($billing_email)?strtolower($billing_email):'';
		$created_at = date('Y-m-d H:i:s');
		$ip_address = $this->input->ip_address();
		

		foreach ($this->cart->contents() as $items)
		{
			$cab_price = $items['price']; // 18 per km
			$cab_type = $items['name']; //  SUV, Sedan
			$min_amount = $items['minAmount']; // 20%
			$pick_type = $items['pick_type']; // half_day, full_day
			$trip_type = $items['trip_type']; // rental
			$pickup_location = $items['pickup_location']; // Gurgaon
			$drop_location = $items['drop_location']; // Gurgaon
			$pickup_date = $items['pickup_date']; // 24-07-2020
			$pickup_time = $items['pickup_time']; // 10:45 AM
			$return_date = $items['return_date']; // 24-07-2020
			$return_time = $items['return_time']; // 14:45 PM
			$distance = $items['distance']; // 40, 80
			$duration = $items['duration']; // Half Day Trip (4 hrs 40 km)
			$km_approx = $items['km_approx'];
			$additional_ride_time_fare = $items['additional_ride_time_fare'];
			$additional_km_fare = $items['additional_km_fare'];
			$driver_allowance = $items['driver_allowance'];
			$night_charges = $items['night_charges'];
			$base_price = $items['car_price'];
			$min_total = $items['min_total'];
			$sub_total = $items['sub_total'];
			$total_tax = $items['total_tax'];
			$total_discount = $items['total_discount'];
			$total_amount = $items['total_price'];
			$cart_date_time = $pickup_date.' '.$pickup_time;
			
		}
		
		$final_date_time =  strtotime($final_date_time);
		$cart_date_time = strtotime($cart_date_time);

		if ($final_date_time != $cart_date_time)
		{
			if($pick_type == 'full_day')
			{
				$pickup_date = $pickup_date1;
				$pickup_time = $pickup_time1;
				$start_hours = $pickup_date1.' '.$pickup_time1;
				$return_date = date('d-m-Y',strtotime('+8 hour', strtotime($start_hours)));
				$return_time = date('H:i A',strtotime('+8 hour', strtotime($start_hours)));
			}
			else{
				$pickup_date = $pickup_date1;
				$pickup_time = $pickup_time1;
				$start_hours = $pickup_date1.' '.$pickup_time1;
				$return_date = date('d-m-Y',strtotime('+4 hour', strtotime($start_hours)));
				$return_time = date('H:i A',strtotime('+4 hour', strtotime($start_hours)));
			}
		}

		
		/*invoice generation*/
		//$txnid = $data['txnid'] = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
		$fy = date('Y') + 1;
		$txnid = 'SWCABS'.$fy.mt_rand(000000,999999);
		
		$invoice_no = $txnid;

		$addressdataArr = array(
			'user_id' => $user_id,
			'name' => $billing_name,
			'email' => $billing_email,
			'phone' => $billing_mobile,
			'updated_at' => $created_at,
			'ip_address' => $ip_address
		);
		
		$str1 = $min_total;
		$x = str_replace( ',', '', $str1);
		$str2 = $total_amount;
		$z = str_replace( ',', '', $str2);

		$orderdataArr = array(
			'user_id' => $user_id,
			'invoice_no' => $invoice_no,
			'transaction_id' => $txnid,
			'billing_name' => $billing_name,
			'billing_email' => $billing_email,
			'billing_mobile' => $billing_mobile,
			'cab_type' => $cab_type,
			'car_price' => $cab_price,
			'min_amount' => $min_amount,
			'trip_type' => $trip_type,
			'pick_type' => $pick_type,
			'pickup_location' => $pickup_location,
			'drop_location' => $drop_location,
			'pickup_date' => $pickup_date,
			'pickup_time' => $pickup_time,
			'return_date' => $return_date,
			'return_time' => $return_time,
			'distance' => $distance,
			'duration' => $duration,
			'km_approx' => $km_approx,
			'additional_ride_time_fare' => $additional_ride_time_fare,
			'additional_km_fare' => $additional_km_fare,
			'driver_allowance' => $driver_allowance,
			'night_charges' => $night_charges,
			'base_price' => $base_price,
			'discount' => $total_discount,
			'min_paid_amount' => $x,
			'sub_total' => $sub_total,
			'tax' => $total_tax,
			'total' => $z,
			'amount_type' => $this->input->post('amount_type'),
			'coupon_code' => $this->security->xss_clean($this->input->post('coupon_code')),
			'order_comments' => 'Rentals',
			'created_at' => $created_at,
			'ip_address' => $ip_address,
			'mode_of_payment' => 'payumoney'
		);

		$this->payment_model->save_address_details($addressdataArr);

		$order_id = $this->payment_model->save_order($orderdataArr);		

		echo $order_id;
	}

	public function pgRedirect($order_id)
	{
		$data['order_details'] = $this->payment_model->getorderbyid($order_id);
		
// 		echo "<pre>"; print_r($data); exit();

		$this->global['pageTitle'] = 'Checkout page';

		$this->loadViews("master/payment/pgRedirect", $this->global, $data , NULL);
    // return $retHashSeq;
	}
	
	//update order
	public function update_order($userid, $tranaction_id, $data)
	{
		return $res = $this->payment_model->update_order($userid, $tranaction_id, $data);
	}
	
	//payment history page
	public function history()
	{
		$data['payment'] = $this->payment_model->getpayments($_SESSION['user_id']);
		
		$this->load->view('include/header');
		$this->load->view('include/header-menu', $this->dataUser);
		$this->load->view('payment/paymenthistory', $data);
		$this->load->view('include/footer');
	}
	
	public function success_email()
	{
		$status = '';
		$firstname = '';
		$amount = '';
		$txnid = '';
		$posted_hash = '';
		$key = '';
		$productinfo = '';
		$email = '';
		$mobile = '';
		$salt = '';
	
		$status = "success";
		$firstname = "Bharat Bhushan";
		$amount = "31.50";
		$txnid = "1440627";
		$productinfo = "Hatchback";
		$email = "bharatverma.verma@gmail.com";
		$mobile = "9990999876";

		
		$data = array();
		$update = array();
		$data['status'] = $status;
		$data['amount'] = $amount;
		$data['txnid'] = $txnid;
		$data['productinfo'] = $productinfo;
		$data['created_at'] = date('Y-m-d H:i:s');
		
		$update['paid_amount'] = $amount;
		
		$mail['order'] = $this->payment_model->getorder($txnid);
		
		$update['status'] = $status;
		$update['paid_amount'] = $amount;
		
		if(!empty($mail['order']))
		{	
			pre($mail['order'][0]->send_email);
			die();
	
			if($mail['order'][0]->send_email == 0)
			{
				$email_status = sendInvoice($mail['order']);
				if($email_status == 1)
				{
					$update['send_email'] = 1;
				}
				else{
					$update['send_email'] = 0;
				}
			}

			if($mail['order'][0]->send_otp == 0)
			{					
				$loginText = "We have received a payment of Rs. " . $amount . " on behalf of Transaction ID: ".$txnid;
				$sendOtp = $this->sendSMS($mobile, $loginText, '');
				if (strcmp($sendOtp,"Message Submitted")){
					$update['send_otp'] = 1;
				}
				else{
					$update['send_otp'] = 0;
				}
			}
			$update['updated_at'] = date('Y-m-d H:i:s');
			// pre($update);
			// save details in payment.
			$this->payment_model->update_order($txnid, $update);
		}
		$this->global['pageTitle'] = 'Payment Status - Success';
		$this->loadViews("master/payment/success", $this->global, $data , NULL);
	}
	
}