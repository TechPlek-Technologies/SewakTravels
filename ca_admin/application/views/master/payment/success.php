<?php  foreach($data as $value){
// echo "<pre>";print_r($value);die;    
} ?>
<style>
.wrapper .header {
    display: none;
}

.wrapper.opened .header1 {
    display: block;
}

.footer {
    display: none;
}

.wrap-all h4,
.wrap-all h6 {
    color: #1a1a1a;
    font-weight: 600;
    text-align: center;
    line-height: 25px;
}

.wrap-all {
    margin-bottom: 30px;
    margin-top: 30px;
}

.cardesign {
    background-color: #ffffff;
    border-color: #e9e9e9;
    -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
    -webkit-box-shadow: 0 1px 3px rgb(0 0 0 / 20%);
    box-shadow: 0 1px 3px rgb(0 0 0 / 20%);
    padding: 15px;
    margin: 15px 0px 15px 0px;

}
</style>

<body id="home" class="wide full-screen-map">
    <!-- PRELOADER -->
    <!--<div id="preloader">-->
    <!--    <div id="preloader-status">-->
    <!--        <div class="spinner">-->
    <!--            <div class="rect1"></div>-->
    <!--            <div class="rect2"></div>-->
    <!--            <div class="rect3"></div>-->
    <!--            <div class="rect4"></div>-->
    <!--            <div class="rect5"></div>-->
    <!--        </div>-->
    <!--        <div id="preloader-title">Loading</div>-->
    <!--    </div>-->
    <!--</div>-->
    <!-- /PRELOADER -->

    <!-- Google map -->
    <!--<div class="" style="background-image:url('<?php echo base_url() ?>assets/img/rental-right-side-banner.jpg'); background-position: right;-->
    <!--background-size: cover;min-height: 100%;min-width: 1024px;position: fixed;width: 100%;"></div>-->
    <!-- /Google map -->

    <!-- WRAPPER -->
    <div class="wrapper opened">

        <div class="content-area scroll">

            <div class="swiper-wrapper">
                <div class="swiper-slide">

                    <section class="sticky-wrapper">
					   <?php $this->load->view('includes/headersmall'); ?>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 " style="background: #ffffff;padding:25px;text-align:center;">
                                    <div class="wrap-all">
									    <h4>Thank you! We have received your order.</h4>
										<h4>The transaction details have been given below for your reference.</h4>
										<div class="row">
											<div class="col-md-12 text-center">
												<div class="cardesign mb-3">
													<div class="card-header">
														<h4 class="m-0 font-weight-bold">Transaction Summary</h4>
													</div>
													<div class="card-body">
														<div class="row">
															<div class="col-md-12">
																<div class="table-responsive">
																	<table class="table table-sm text-right" id="mini-total">
																		<tbody>
																			<tr>
																				<th><strong>Transaction Id:</strong></th>
																				<td><?=$value->transaction_id?></td>
																			</tr>
																			<tr>
																				<th><strong>Transaction Status:</strong></th>
																				<td><?=$value->status?></td>
																			</tr>
																			<tr>
																				<th><strong>Amount:</strong></th>
																				<td><?=$value->min_paid_amount?></td>
																			</tr>

																			<tr>
																				<th><strong>Date & Time:</strong></th>
																					<td><?=$value->created_at?></td>
																				</td>
																			</tr>
																			<tr><td colspan="2" class="text-center">Our team will get in touch with you soon for the payment.<br> The transaction status will be changed from <strong>"pending"</strong> to <strong>"successful"</strong> once the payment is received.</td></tr>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
													</div>
													<div class="card-footer ">
														<a href="<?php echo base_url(); ?>" class="btn btn-theme btn-theme-dark" title="Dashboard">Home</a>
													</div>
												</div>
											</div>
										
										</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
					<div class="helping-center-line p-0">
						<div class="container p-0">
							<!-- <button type="submit" name="submit" id="proceed-payment" class="btn btn-theme btn-block btn-theme-dark ">Book Now</button> -->
							<button href="tel:<?php echo MOBILE_URL; ?>" class="btn btn-theme btn-block btn-theme-dark ">8377 828 828</button>									
						</div>
                    </div>
                </div>
            </div>


            <div class="swiper-scrollbar"></div>

        </div>

    </div>