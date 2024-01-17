
<link href="<?php echo base_url(); ?>assets/css/theme.css" rel="stylesheet" type="text/css" />
<div class="container mt-5">
    <div class="container my-5">
        <section class="dark-grey-text">
            <div class="row">
				<div class="col-md-12 mb-md-0 text-center">
					<img src="<?php echo base_url(); ?>assets/img/loadingspinner.gif" height="100px" alt="Loading Spinner" />
					<h2>Initiating your payment process</h2>
					<br>
					<div class="col-sm-12">
						<legend>Your payment is being processed, Please wait for a moment.</legend>
					</div>				
					<?php

					$plan_name = $order_details[0]->cab_type;
					$checkSum = "";
					$paramList = array();	

					// Create an array having all required parameters for creating checksum.
					$paramList["key"] = HB_MERCHANT_KEY;
					
					$paramList["txnid"] = $order_details[0]->transaction_id;
				
					if($order_details[0]->amount_type == "min"){
						$paramList["amount"] = $order_details[0]->min_paid_amount;
					}
					else{
						$paramList["amount"] = $order_details[0]->total;
					}
					$paramList["firstname"] = $order_details[0]->billing_name;
					if(!empty($order_details[0]->billing_email))
					{
						$paramList["email"] = $order_details[0]->billing_email; //Email ID of customer
					}
					$paramList["phone"] = $order_details[0]->billing_mobile; //Mobile number of customer
					$paramList["productinfo"] = $plan_name;
					$paramList["service_provider"] = 'payu_paisa';
					$paramList["surl"] = base_url().'payment/success';
					$paramList["furl"] = base_url().'payment/failure';
					$paramList["curl"] = base_url().'payment/cancel';
					
					//pre($paramList);
					$checkSum = getChecksumFromArrayPayu($paramList, HB_SALT);
					
				
					?>

                    
					<form method="POST" action="<?php echo HB_PAYU_URL ?>" name="f2">
						<?php
						foreach($paramList as $name => $value) {
							echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
						}
						?>
						<input type="hidden" name="hash" value="<?php echo $checkSum ?>">
						<script type="text/javascript">
							document.f2.submit();
						</script>
					</form>
				</div>
			</div>
		</section>
		
		<!--<php? echo "$retHashSeq"; ?>-->
		
	</div>
</div>