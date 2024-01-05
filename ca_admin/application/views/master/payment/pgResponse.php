
<link href="<?php echo base_url(); ?>assets/css/theme.css" rel="stylesheet" type="text/css" />
<div class="main-body">
<!-- First section block -->
<section class="">
	<div class="page-wrapper">
		<div class="page-body">
			<div class="card">
				<div class="card-block text-center">					
					<div class="row">
                        <div class="col-sm-12">
                           <!-- <h3>Your payment is <strong><?=$txn_response['res_message']?></strong> Here is the details for it</h3> -->

                           <h3>Thank you! We have received your order.</h3>
						    <h3>The transaction details have been given below for your reference.</h3>
                        </div>
                    </div>
                    <div class="clearfix">&nbsp;</div>
                   <!--
                    <div class="row">
                        <div class="col-sm-6"><strong>Order Number:</strong> <?=$txn_response['order_no']?></div>
                        <div class="col-sm-6"><strong>Amount:</strong> <?=$txn_response['amount']?></div>
                    </div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="row">
                        <div class="col-sm-6"><strong>Transaction AG REF:</strong> <?=$txn_response['ag_ref']?></div>
                        <div class="col-sm-6"><strong>Transaction PG REF:</strong> <?=$txn_response['pg_ref']?></div>
                    </div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="row">
                        <div class="col-sm-6"><strong>Transaction Status:</strong> <?=$txn_response['status']?></div>
                        <div class="col-sm-6"><strong>Transaction Date and Time:</strong> <?=$txn_response['txn_date'].' '.$return_elements['txn_time']?></div>
                    </div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="clearfix">&nbsp;</div>
                    -->
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                        <p>&nbsp;</p>
                        <p style="line-height:24px;">
                            <strong>Transaction Status:</strong> <?=$status?>.<br>
							<strong>Transaction ID:</strong> <?php echo $txnid; ?><br>
							<strong>Amount:</strong> <?=$order_details[0]['total']?>/-<br>
							<strong>Date and Time:</strong> <?=$order_details[0]['created_at']?><br><br>
                                Our team will get in touch with you soon for the payment. The transaction status will be changed from "pending" to "successful" once the payment is received.
                        </p>
                            <p>&nbsp;</p>
                            <a href="<?php echo base_url();?>index.php/payment/history">
                                <button class="btn btn-primary m-y m-b-50">Payment History</button>
                            </a>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</section>
</div>