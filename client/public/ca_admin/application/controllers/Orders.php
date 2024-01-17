<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Bharat Verma / bharatverma.verma@gmail.com
 * @version : 1.0
 * @since : 27.02.2018
 */
class Orders extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
		$this->load->model('orders_model');

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
    function orders()
    {
        
        // echo "avc"; die;
		$data['records'] = $this->orders_model->getOrderDetails();

        
		$process = 'All Orders';
		$processFunction = 'Manager/Orders';
		$this->logrecord($process,$processFunction);
        $this->global['pageTitle'] = 'Order Listings';
		$this->loadViews("master/orders/orderListing", $this->global, $data, NULL);
    }
	
// 	  function orderss()
//     {
        
//         echo "avc";die;
// 		$data['records'] = $this->orders_model->getOrderDetails();

        
// 		$process = 'All Orders';
// 		$processFunction = 'Manager/Orders';
// 		$this->logrecord($process,$processFunction);
//         $this->global['pageTitle'] = 'Order Listings';
// 		$this->loadViews("master/orders/orderListing", $this->global, $data, NULL);
//     }
	/**
     * This function is used to send an email of order
	 */
    function sendOrderEmail()
    {
		$id =  $this->input->post('id'); 
		
		$result = false;
		if($id == null){
			$result['status'] = 'failed';
			$result['response'] = 0;
			$result['message'] = 'Invalid order id.';
			header('Content-Type: application/json');
			echo json_encode($result, JSON_PRETTY_PRINT);
		}else{
			
			$data['data'] = $detail = $this->orders_model->getorder($id);
			
			
			if(!empty($detail))
			{
				if(!empty($detail[0]->billing_email))
				{
					$CI = &get_instance();

					
							
					$CI->load->library('email');
					
					$config['protocol'] = ORDER_PROTOCOL;
					$config['mailpath'] = ORDER_MAIL_PATH;
					$config['smtp_host'] = ORDER_SMTP_HOST;
					$config['smtp_port'] = ORDER_SMTP_PORT;
					$config['smtp_user'] = ORDER_SMTP_USER;
					$config['smtp_pass'] = ORDER_SMTP_PASS;
					$config['charset'] = "utf-8";
					$config['mailtype'] = "html";
					$config['newline'] = "\r\n";
					$config['wordwrap'] = TRUE;
					
					

					$CI->email->initialize($config);

					$CI->email->from(ORDER_EMAIL_FROM, ORDER_FROM_NAME);
					$CI->email->bcc(ORDER_EMAIL_FROM);
					$CI->email->subject("SewakCabs Invoice #".$detail[0]->transaction_id);
					$msg = $CI->load->view('email/invoice', $data, TRUE);
					// $msg="This is message.";
					// print_r($msg);die;
					$CI->email->message($msg);
					$CI->email->to($detail[0]->billing_email);

					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					$headers .= "From: booking@sewaktravels.com" . "\r\n" .
					"CC: booking@sewaktravels.com";

					// mail($detail[0]->billing_email,'SewakCabs Invoice'.$detail[0]->transaction_id,$msg,$headers); die;
					
					
					

					// if($CI->email->send())
					if(mail($detail[0]->billing_email,'SewakCabs Invoice'.$detail[0]->transaction_id,$msg,$headers))
					{
						$dataArr = array(			
							'send_email' => 1,
							'updatedBy' => $this->vendorId,
							'updated_at' => date('Y-m-d H:i:s')
						);		

						$res = $this->orders_model->sendOrderEmail($id, $dataArr);
						
						if ($res == TRUE) {
							$process = 'Send an email of an order';
							$processFunction = 'orders/sendOrderEmail';
							$this->logrecord($process, $processFunction);

							$result['status'] = 'success';
							$result['response'] = 1;
							$result['message'] = 'Email has been sent successfully.';
							header('Content-Type: application/json');
							echo json_encode($result, JSON_PRETTY_PRINT);
							
							
						}else{
							$result['status'] = 'success';
							$result['response'] = 1;
							$result['message'] = 'Email has been sent successfully.';
							header('Content-Type: application/json');
							echo json_encode($result, JSON_PRETTY_PRINT);
						}
					}
					else{
						$result['status'] = 'failed';
						$result['response'] = 0;
						$result['message'] = 'Email not sent.';
						header('Content-Type: application/json');
						echo json_encode($result, JSON_PRETTY_PRINT);
					}
				}
				else{
					$result['status'] = 'failed';
					$result['response'] = 0;
					$result['message'] = 'Invalid email id.';
					header('Content-Type: application/json');
					echo json_encode($result, JSON_PRETTY_PRINT);
				}
			}
			else{
				$result['status'] = 'failed';
				$result['response'] = 0;
				$result['message'] = 'Invalid order id.';
				header('Content-Type: application/json');
				echo json_encode($result, JSON_PRETTY_PRINT);
			}
		}
    }
	
	/**
     * This function is used to send message of order
	 */
    function sendOrderMessage()
    {
		$id = $this->input->post('id');
		
		$result = false;
		if($id == null){
			$result['status'] = 'failed';
			$result['response'] = 0;
			$result['message'] = 'Invalid order id.';
			header('Content-Type: application/json');
			echo json_encode($result, JSON_PRETTY_PRINT);
		}else{
			$data['data'] = $detail = $this->orders_model->getorder($id);
			
			if(!empty($detail))
			{
				if(!empty($detail[0]->billing_mobile))
				{
					
					$dlrurl=1007075064447377989;
					$loginText = "We have received a payment of Rs. " . $detail[0]->paid_amount . " on behalf of Transaction ID: ".$detail[0]->transaction_id;
					$sendOtp = $this->sendSMS($detail[0]->billing_mobile, $loginText, $dlrurl);
					

					if (strcmp($sendOtp,"Message Submitted"))
					{
						$dataArr = array(			
							'send_otp' => 1,
							'updatedBy' => $this->vendorId,
							'updated_at' => date('Y-m-d H:i:s')
						);

						$res = $this->orders_model->sendOrderMessage($id, $dataArr);
						
						if ($res == TRUE) {
							$process = 'Send sms of an order';
							$processFunction = 'orders/sendOrderMessage';
							$this->logrecord($process, $processFunction);

							$result['status'] = 'success';
							$result['response'] = 1;
							$result['message'] = 'SMS has been sent successfully.';
							header('Content-Type: application/json');
							echo json_encode($result, JSON_PRETTY_PRINT);
						}else{
							$result['status'] = 'success';
							$result['response'] = 1;
							$result['message'] = 'SMS has been sent successfully.';
							header('Content-Type: application/json');
							echo json_encode($result, JSON_PRETTY_PRINT);
						}
					}
					else{
						$result['status'] = 'failed';
						$result['response'] = 0;
						$result['message'] = 'SMS not sent.';
						header('Content-Type: application/json');
						echo json_encode($result, JSON_PRETTY_PRINT);
					}
				}
				else{
					$result['status'] = 'failed';
					$result['response'] = 0;
					$result['message'] = 'Invalid phone number.';
					header('Content-Type: application/json');
					echo json_encode($result, JSON_PRETTY_PRINT);
				}
			}
			else{
				$result['status'] = 'failed';
				$result['response'] = 0;
				$result['message'] = 'Invalid order id.';
				header('Content-Type: application/json');
				echo json_encode($result, JSON_PRETTY_PRINT);
			}
		}
    }


	// Coded by surya narayan
	function download_order()
	{
		$value=array(
			'status'=>$_POST['status'],
			'startdate'=>$_POST['startdate'],
			'enddate'=>$_POST['enddate']
		);

		

		$data = $this->orders_model->downloadOrderDetails($value);
		
			$delimiter = ","; 
			$filename = "DownloadOrders_" . date('Y-m-d') . ".csv"; 
			 
			// Create a file pointer 
			$f = fopen('php://memory', 'w'); 
			 
			// Set column headers 
			$fields = array("ID","User Id", "Transaction Id", "Invoice No"," Billing Name", "Billing Email", "Billing Mobile", "Billing Address", "Billing State","Billing City","Billing Pincode", "Mode Of Payment", "State Code", "Cab Type", "Min Amount", "Trip Type", "Pick Type", "Pickup location", "Drop location","Pickup Date", "Pickup Time", "Return Date", "Return Time", "Distance", "Duration", "km Approx", "Additional Ride Time Fare","Additional km Fare", "Driver Allowance", "Night Charges", "Car Type", "Ip Address", "Base Price", "Quantity", "Tax", "Car Price", "Discount", "Sub Total", "Order Comments", "Coupon Code", "Total", "Status", "Created At", "Updated At", "Gateway Id", "IsDeleted", "Amount Type", "Min Paid Amount", "Paid Amount", "Send Otp", "Send Email", "UpdatedBy"); 
			fputcsv($f, $fields, $delimiter); 
			 
			// Output each row of the data, format line as csv and write to file pointer 

			foreach($data as $datas)
			{
				fputcsv($f, $datas, $delimiter);	
			}
		
			// Move back to beginning of file 
			fseek($f, 0); 
			 
			// Set headers to download file rather than displayed 
			header('Content-Type: text/csv'); 
			header('Content-Disposition: attachment; filename="' . $filename . '";'); 
			 
			//output all remaining data on a file pointer 
			fpassthru($f); 
		
			exit; 


	}
	// Coded by surya narayan 
	
}

?>