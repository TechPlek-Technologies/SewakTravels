<!DOCTYPE html>
<html>
<head>
<title>Sewak travels payment</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<?php

$plan_name = $order_details[0]->cab_type;
$checkSum = "";
$paramList = array();

// $description        = "Product Description";
// $txnid              = date("YmdHis");     
// $currency_code      = $currency_code;   
// $amount             = 1;
// $email              = '005surya@gmail.com';
// $phone              = '8447616933';
// $name               = "RazorPay Infovistar";

$currency_code                  = 'INR';         
$merchant_order_id              = "SWK-".date("YmdHis");
$card_holder_name               = 'David Chase';
$paramList["key"]               = RP_KEY_ID; 
$paramList["productinfo"]       = $plan_name;
$paramList["service_provider"]  = 'razor_pay';
$paramList["txnid"]             = $order_details[0]->transaction_id;

    if($order_details[0]->amount_type == "min"){
    	$paramList["amount"] = $order_details[0]->min_paid_amount;
    }
    else{
    	$paramList["amount"] = $order_details[0]->total;
    }


$total  = ($paramList["amount"]* 100); // 100 = 1 indian rupees

// $total   = (1* 100); // 100 = 1 indian rupees

if(!empty($order_details[0]->billing_email))
					{
						$paramList["email"] = $order_details[0]->billing_email; //Email ID of customer
					}
$paramList["phone"] = $order_details[0]->billing_mobile;
$paramList["firstname"] = $order_details[0]->billing_name;

$curl=  base_url().'payment/success';
$surl=  base_url().'payment/success';
$furl=  base_url().'payment/failure';
?>

<?php

/* This is from downloaded Github folder just put in directory and using here */
require_once(APPPATH."libraries/razorpay/Razorpay.php");
// require('razorpay-php/Razorpay.php');
use Razorpay\Api\Api;
$api = new Api(RP_KEY_ID, RP_SECRET_KEY);
$orderData = [
    'receipt'         => $merchant_order_id,
    'amount'          => $total,
    'currency'        => $currency_code,
    'payment_capture' => 1
];
$razorpayOrder = $api->order->create($orderData);
$razorpayOrderId = $razorpayOrder['id'];

?>


<div class="container">
<div class="page-header">

</div>
<div class="page-body">
<form name="razorpay-form" id="razorpay-form" action="<?php echo $curl; ?>" method="POST">
<input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" />
<!-- <input type="hidden" name="razorpay_order_id" id="razorpay_order_id" /> -->
<input type="hidden" name="merchant_order_id" id="merchant_order_id" value="<?php echo $merchant_order_id; ?>"/>
<input type="hidden" name="txnid" id="merchant_trans_id" value="<?php echo $paramList["txnid"]; ?>"/>
<input type="hidden" name="productinfo" id="productinfo" value="<?php echo $paramList["productinfo"]; ?>"/>
<input type="hidden" name="merchant_surl_id" id="merchant_surl_id" value="<?php echo $surl; ?>"/>
<input type="hidden" name="merchant_furl_id" id="merchant_furl_id" value="<?php echo $furl; ?>"/>
<input type="hidden" name="firstname" id="card_holder_name_id" value="<?php echo $paramList["firstname"]; ?>"/>
<input type="hidden" name="phone" id="phone" value="<?php echo $paramList["phone"]; ?>"/>
<input type="hidden" name="email" id="email" value="<?php echo $paramList["email"]; ?>"/>
<input type="hidden" name="merchant_total" id="merchant_total" value="<?php echo $total; ?>"/>
<input type="hidden" name="amount" id="merchant_amount" value="<?php echo $paramList["amount"]; ?>"/>

</form>

</div>
</div>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>


<script>
	$(document).ready(function(){

	});
	</script>


<script>





var options = {
		
		key:            "<?php echo $paramList["key"]; ?>",
		amount:         "<?php echo $total; ?>",
		name:           "Sewak Travels",
		order_id: "<?php echo $razorpayOrderId; ?>",
   		description:    "Order # <?php echo $merchant_order_id; ?>",
		netbanking:     true,
		currency:       "<?php echo $currency_code; ?>", // INR
		prefill: {
		name:       "<?php echo $paramList["firstname"]; ?>",
		email:      "<?php echo $paramList["email"]; ?>",
		contact:    "<?php echo $paramList["phone"]; ?>"
		},

		notes: {
		soolegal_order_id: "<?php echo $merchant_order_id; ?>",
		},

		handler: function (transaction) {
			// console.log(transaction);
			// alert(transaction);
			
		document.getElementById('razorpay_payment_id').value = transaction.razorpay_payment_id;
		document.getElementById('razorpay-form').submit();
		},

		"modal": {
		"ondismiss": function(){
						location.reload()
						}
				}
};




var razorpay_pay_btn, instance;
function razorpaySubmit(el) {
		if(typeof Razorpay == 'undefined') 
			{
					setTimeout(razorpaySubmit, 200);
					if(!razorpay_pay_btn && el) 
					{
						razorpay_pay_btn    = el;
						el.disabled         = true;
						el.value            = 'Please wait...';  
					}
			} 
		else 
			{
				if(!instance) 
				{
					instance = new Razorpay(options);
					if(razorpay_pay_btn) 
						{
							razorpay_pay_btn.disabled   = false;
							razorpay_pay_btn.value      = "Pay Now";
						}
				}
				instance.open();
			}
}  
</script>

<script>
	$(document).ready(function(){
		razorpaySubmit();
	});
</script>

</body>
</html>

<!-- --------------------------------------------------------------------- -->


