
<link href="<?php echo base_url(); ?>assets/css/theme.css" rel="stylesheet" type="text/css" />
<div class="main-body">
	<!-- First section block -->
	<section class="">
		<div class="page-wrapper">
			<div class="page-body">
				<div class="card">
					<div class="card-block">
						<div class="confirmation">
							<div class="confirmation-content text-center">
								<h3>Thank you! We have received your order.</h3>
								<h3>The transaction details have been given below for your reference.</h3>
								<div class="row">
									<div class="col-md-6 offset-md-3">
										<p>&nbsp;</p>
										<p style="line-height:24px;">
											<strong>Transaction Status:</strong> Pending.<br>
											<strong>Transaction ID:</strong> <?php echo $txnid; ?><br>
											<strong>Amount:</strong> <?=$order_details[0]['total']?>/-<br>
											<strong>Date and Time:</strong> <?=$order_details[0]['created_at']?><br><br>
											Our team will get in touch with you soon for the payment. The transaction status will be changed from <strong>"pending"</strong> to <strong>"successful"</strong> once the payment is received.
										</p>
										<p>&nbsp;</p>
										<a href="<?php echo base_url();?>index.php/payment/history"><button class="btn btn-primary m-y m-b-50">Payment History</button></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> 
			</div>
		</div>
	</section>
</div> 
