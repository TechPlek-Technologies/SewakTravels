<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice Mailer</title>
</head>
<body>
   <table width="600" border="0" cellspacing="0" align="center" cellpadding="0" style="border: 1px solid #ccc; background: #fff;">
    <tr>
    <td align="left" valign="top" style="padding: 15px;" width="200">
		<a href="https://www.sewaktravels.com/" target="_blank">
			<img src="https://www.sewaktravels.com/assets/img/logo.png" alt="Logo" title="Logo">
		</a>
	</td>
	<td align="right" valign="top" style="padding: 15px;" width="400">
	<span style="font-weight:bold; font-family:Segoe UI, Arial, sans-serif; font-size:14px;">You can reach us by</span><br>
	<span style="font-family:Segoe UI, Arial, sans-serif; font-size:14px;">writing in to us on <a href="mailto:booking@sewaktravels.com">booking@sewaktravels.com</a> OR</span><br>
	<span style="font-family:Segoe UI, Arial, sans-serif; font-size:14px;">Call us on : <a href="tel:<?php echo MOBILE_URL; ?>">8377-828-828</a></span>	
	</td>
  </tr>
  <tr>
      <td align="left" valign="top" colspan="2"><hr></td>
    </tr>
  <tr>
      <td align="left" valign="top" style="font-family: Segoe UI, Arial, sans-serif; font-size: 16px; color:#363636; font-weight: bold; padding: 15px; line-height: 20px" colspan="2">
		Your Booking ID is: <?=$data[0]->transaction_id?></td>
    </tr>
	<tr>
      <td align="left" valign="top" style="font-family: Segoe UI, Arial, sans-serif; font-size: 14px;color:#363636; font-weight: normal; padding: 10px 15px; line-height: 24px" colspan="2">
		Thank you for booking with SewakTravels.
	  </td>
    </tr>
	<tr>
      <td align="left" valign="top" style="font-family: Segoe UI, Arial, sans-serif; font-size: 14px;color:#363636; font-weight: normal; padding: 0px 15px; line-height: 20px" colspan="2">
		You will receive driver details atleast 30 mins prior to pick up time.</td>
    </tr>
	<tr>
      <td align="left" valign="top" style="font-family: Segoe UI, Arial, sans-serif; font-size: 16px; color:#363636; font-weight: bold; padding: 15px; line-height: 20px" colspan="2">
		Booking Summary</td>
    </tr>
    <tr>
    	<td align="center" valign="top" style="text-align: left; font-size: 14px; font-weight: 600; color:#0077bd; font-family: Segoe UI, Arial, sans-serif; margin: 0; padding:0px 15px;" colspan="2">
			<table border="0" cellspacing="2" align="left" cellpadding="2" style="font-size: 14px; font-family: Segoe UI, Arial, sans-serif;">
				<tbody>
					<tr>
						<td align="left" valign="top" style="font-family: Segoe UI, Arial, sans-serif; color:#363636; font-weight: 600; line-height: 20px">Name</td>
						<td>:</td>
						<td><?php echo ucwords($data[0]->billing_name); ?></td>
					</tr>
					<tr>
						<td align="left" valign="top" style="font-family: Segoe UI, Arial, sans-serif; color:#363636; font-weight: 600; line-height: 20px">Contact Number</td>
						<td>:</td>
						<td><?php echo $data[0]->billing_mobile; ?></td>
					</tr>
					<tr>
						<td align="left" valign="top" style="font-family: Segoe UI, Arial, sans-serif; color:#363636; font-weight: 600; line-height: 20px">Journey Date & Time</td>
						<td>:</td>
						<td><?php echo date('F jS, Y',strtotime($data[0]->pickup_date)).' '.$data[0]->pickup_time; ?></td>
					</tr>
					<tr>
						<td align="left" valign="top" style="font-family: Segoe UI, Arial, sans-serif; color:#363636; font-weight: 600; line-height: 20px">Booking Type</td>
						<td>:</td>
						<td><?php echo ucwords($data[0]->trip_type); 
						if($data[0]->pick_type=="one_way"){
							echo ', One Way';
						}else{
							echo ', Round Trip';
						}
						?></td>
					</tr>
					<tr>
						<td align="left" valign="top" style="font-family: Segoe UI, Arial, sans-serif; color:#363636; font-weight: 600; line-height: 20px">Pickup Location</td>
						<td>:</td>
						<td><?php echo $data[0]->pickup_location; ?></td>
					</tr>
					<tr>
						<td align="left" valign="top" style="font-family: Segoe UI, Arial, sans-serif; color:#363636; font-weight: 600; line-height: 20px">Drop Location</td>
						<td>:</td>
						<td><?php echo $data[0]->drop_location; ?></td>
					</tr>
					<tr>
						<td align="left" valign="top" style="font-family: Segoe UI, Arial, sans-serif; color:#363636; font-weight: 600; line-height: 20px">Vehicle Type</td>
						<td>:</td>
						<td><?php echo $data[0]->cab_type; ?></td>
					</tr>
					<tr>
						<td align="left" valign="top" style="font-family: Segoe UI, Arial, sans-serif; color:#363636; font-weight: 600; line-height: 20px">Base Fare</td>
						<td>:</td>
						<td><?php echo $data[0]->base_price; ?></td>
					</tr>
					<tr>
						<td align="left" valign="top" style="font-family: Segoe UI, Arial, sans-serif; color:#363636; font-weight: 600; line-height: 20px">Tax</td>
						<td>:</td>
						<td><?php echo $data[0]->tax; ?></td>
					</tr>
					<tr>
						<td align="left" valign="top" style="font-family: Segoe UI, Arial, sans-serif; color:#363636; font-weight: 600; line-height: 20px">Total Amount</td>
						<td>:</td>
						<td><?php echo $data[0]->total; ?></td>
					</tr>
					<tr>
						<td align="left" valign="top" style="font-family: Segoe UI, Arial, sans-serif; color:#363636; font-weight: 600; line-height: 20px">Paid Amount</td>
						<td>:</td>
						<td>						
							<?php
								if($data[0]->amount_type == 'min'){
									echo $data[0]->min_paid_amount;
								}
								else{
									echo $data[0]->total;
								}
							?>
						</td>
					</tr>
					<tr>
						<td align="left" valign="top" style="font-family: Segoe UI, Arial, sans-serif; color:#363636; font-weight: 600; line-height: 20px">Extra KM Fare</td>
						<td>:</td>
						<td><?php echo $data[0]->additional_km_fare; ?></td>
					</tr>					
					<tr>
						<td align="left" valign="top" style="font-family: Segoe UI, Arial, sans-serif; color:#363636; font-weight: 600; line-height: 20px">Waiting Charges</td>
						<td>:</td>
						<td><?php echo $data[0]->additional_ride_time_fare; ?></td>
					</tr>
					<tr>
						<td align="left" valign="top" style="font-family: Segoe UI, Arial, sans-serif; color:#363636; font-weight: 600; line-height: 20px">Driver Allowance</td>
						<td>:</td>
						<td><?php echo $data[0]->driver_allowance; ?></td>
					</tr>
					<tr>
						<td align="left" valign="top" style="font-family: Segoe UI, Arial, sans-serif; color:#363636; font-weight: 600; line-height: 20px">Night Charges</td>
						<td>:</td>
						<td><?php echo $data[0]->night_charges; ?></td>
					</tr>
					<tr>
						<td align="left" valign="top" style="font-family: Segoe UI, Arial, sans-serif; color:#363636; font-weight: 600; line-height: 20px">Cancellation Charges</td>
						<td>:</td>
						<td>Cancellation charges of Rs. 100 applicable if cancelled within 1 hours of the pickup time</td>
					</tr>
				</tbody>			
			</table>
		</td>
    </tr>
   <tr>
                <td style="background:#fff;" align="center" valign="top" colspan="2">
				<hr>
                    <table align="center" cellspacing="0" cellpadding="0" border="0" style="padding:5px 0px;">
                        <tbody>
                            <tr>
                                <td style="padding-right:10px;"><a href="<?= FACEBOOK_URL; ?>" target="_blank"><img src="https://www.sewaktravels.com/assets/img/Facebook.png" width="20" height="20" border="0" alt="FaceBook"></a></td>
                                <td style="padding-right:10px;"><a href="<?= TWITTER_URL; ?>" target="_blank"><img src="https://www.sewaktravels.com/assets/img/Twitter.png" width="20" height="20" border="0" alt="Twitter"></a></td>
                                <td style="padding-right:10px;"><a href="<?= LINKEDIN_URL; ?>" target="_blank"><img src="https://www.sewaktravels.com/assets/img/linkedin.png" width="20" height="20" border="0" alt="Linkedin"></a></td>
                                <td style="padding-right:10px;"><a href="<?= INSTAGRAM_URL; ?>" target="_blank"><img src="https://www.sewaktravels.com/assets/img/instagram.png" width="20" height="20" border="0" alt="Instagram"></a></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
			<tr>
              <td align="center" valign="top" style="font-family: Segoe UI, Arial, sans-serif; font-size: 13px; padding: 0px 0px 2px; margin: 0;color: #363636;" colspan="2">Email: <a href="mailto:booking@sewaktravels.com" style="text-decoration: none; outline: none;color: #363636;">booking@sewaktravels.com</a> | Website: <a href="https://www.sewaktravels.com/" target="_blank" style="text-decoration: none; outline: none;color: #363636;">www.sewaktravels.com</a></td>
            </tr>
            <tr>
                <td style="font-family: Segoe UI, Arial, sans-serif; text-align: center; padding: 2px 0px; line-height: 16px; font-size: 13px; font-weight: 500; color: #000; background: #fff;" colspan="2">
                    Plot No. 804, Ashok Vihar, Phase 1, Gurgaon - 122001
                </td>
            </tr>
            <tr>
                <td style="font-family: Segoe UI, Arial, sans-serif; text-align: center; padding: 2px 0px 4px 0px; line-height: 16px; font-size: 13px; font-weight: 500; color: #000; background: #fff;" colspan="2">
                    &copy; <?=date('Y')?> SewakTravels Pvt. Ltd. All rights reserved.
                </td>
            </tr>
</table>
</body>

</html>