<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Bharat Verma / bharatverma.verma@gmail.com
 * @version : 1.0
 * @since : 27.02.2018
 */
class Quotation extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
// 		$this->load->model('orders_model');

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
    function quotation()
    {
// 		$data['records'] = $this->orders_model->getOrderDetails();
        $process = 'All Orders';
		$processFunction = 'Manager/Quotation';
		$this->logrecord($process,$processFunction);
        $this->global['pageTitle'] = 'quotation | Online Cab Booking Services in Gurgaon and Delhi NCR';
		
		$this->loadViews("master/quotation/quotation", $this->global, $data, NULL);
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

            $data['minAmount'] = $this->vehicle_model->getminamount2();
			
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

            $data['minAmount'] = $this->vehicle_model->getminamount2();
		
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

        $data['minAmount'] = $this->vehicle_model->getminamount2();
		
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
				
			$this->global['pageTitle'] = 'Home Page';
			
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
				
			// echo '<br><br><br><br><br><br><br><br>';
			// pre($data['vehicleRecords']);
			// die;
            $data['minAmount'] = $this->vehicle_model->getminamount2();
	
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
				'id'=> $data['vehicleRecords'][0]->id,
				'cab_price_id'=> $data['vehicleRateRecords'][0]->id,
				'qty'=> 1,
				'price' => $car_price,
				'name'=> $data['vehicleRecords'][0]->name,
				'minAmount'=> $data['minAmount'][0]->price,
				'trip_type'=> $data['trip_type'],
				'pick_type'=> $data['pick_type'],
				'pickup_location'=> $data['pickup_location'],
				'drop_location'=> $data['drop_location'],
				'pickup_date'=> $data['pickup_date'],
				'pickup_time'=> $data['pickup_time'],
				'return_date'=> $return_date,
				'return_time'=> $return_time,
				'km_approx'=> $km_approx,
				'one_way_distance'=> $distance_value,
				'distance'=> $distance,
				'duration_text'=> $duration,
				'duration'=> $data['duration'],
				'additional_ride_time_fare'=> $data['vehicleRateRecords'][0]->additional_ride_time_fare,
				'additional_km_fare'=> $data['vehicleRateRecords'][0]->additional_km_fare,
				'driver_allowance'=> $data['vehicleRateRecords'][0]->driver_allowance,
				'night_charges'=> $data['vehicleRateRecords'][0]->night_charges,
				'car_price'=> $distance_price + $data['vehicleRecords'][0]->start_fee,
				'min_total'=> number_format($min_amount, 2),
				'sub_total'=> number_format($subtotal, 2),
				'total_tax'=> number_format($total_tax, 2),
				'total_discount'=> number_format($discount, 2),
				'total_price'=> number_format($total_cart_price, 2),
				'start_fee'=> $data['vehicleRecords'][0]->start_fee
				
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

        $data['minAmount'] = $this->vehicle_model->getminamount2();
		
		
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
			$this->global['pageTitle'] = 'Quotation page';
			
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
            $data['minAmount'] = $this->vehicle_model->getminamount2();
			
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
		
// 		echo "<pre>"; print_r($_POST);die;
		
		$trip_id = $this->security->xss_clean($this->input->post('trip_id'));
		$vehicle_id = $this->security->xss_clean($this->input->post('vehicle_id'));
		$pick_type = $this->security->xss_clean($this->input->post('pick_type'));
		$pickup_date = $this->input->post('pickup_date');
		$pickup_time = $this->input->post('pickup_time');
		
		$this->load->model('vehicle_model');
		
		$data['vehicleRateRecords'] = $this->vehicle_model->getvehiclesDetails($vehicle_id, '', 'rental', $pick_type);

        $data['minAmount'] = $this->vehicle_model->getminamount2();
        
        
		
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

					$CI->email->message($msg);
					$CI->email->to($detail[0]->billing_email);
					if($CI->email->send())
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
					$loginText = "We have received a payment of Rs. " . $detail[0]->paid_amount . " on behalf of Transaction ID: ".$detail[0]->transaction_id;
					$sendOtp = $this->sendSMS($detail[0]->billing_mobile, $loginText, '');

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
	
}

?>