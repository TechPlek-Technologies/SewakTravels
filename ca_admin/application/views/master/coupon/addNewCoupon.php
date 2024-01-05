<!-- Heading -->
<div class="card mb-3">
	<!--Card content-->
	<div class="card-body d-sm-flex justify-content-between">
		<h6 class="mb-sm-0">
			<a href="<?php echo base_url(); ?>couponListings" data-toggle="tooltip" data-placement="bottom" title="Coupon Master">Coupon Master</a>
			<span>/</span>
			<span>Add New Coupon</span>
		</h6>
	</div>
</div>
<!-- Heading -->
<!--Grid row-->
<!-- form start -->
<?php $this->load->helper("form"); ?>
<form role="form" id="addNewCoupons" action="<?php echo base_url() ?>addNewCoupons" method="post">
	<div class="row">
		<!--Grid column-->
		<div class="col-md-9">

			<!--Card-->
			<div class="card mb-3">
				<div class="card-header white-text primary-color">Enter Coupon Information</div>
				<!--Card content-->
				<div class="card-body">
					<div class="row">
					<div class="col-md-12">
							<div class="row">
                                <div class="col-md-4">
									<div class="form-group">
										<label for="coupon_name">Coupon Name <span class="red-text">*</span></label>
										<input type="text" class="form-control form-control-sm required" placeholder="Coupon Name" value="<?php echo set_value('coupon_name'); ?>" id="coupon_name" name="coupon_name">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="coupon_code">Coupon Code <span class="red-text">*</span></label>
										<input type="text" class="form-control form-control-sm required" placeholder="Coupon Code" value="<?php echo $code; ?>" id="coupon_code" name="coupon_code" onkeyup="this.value = this.value.toUpperCase();">

									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="coupon_description">Coupon Description <span class="red-text">*</span></label>
										<input type="text" class="form-control form-control-sm required" placeholder="Coupon Description" value="<?php echo $code; ?>" id="coupon_description" name="coupon_description">

									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="coupon_type">Coupon Type <span class="red-text">*</span></label>
										<select class="form-control form-control-sm required" name="coupon_type" id="coupon_type">
										  <option value="flat" selected>Flat Discount</option>
										  <option value="per">% Discount</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="coupon_amount">Coupon Amount <span class="red-text">*</span></label>
										<input type="text" class="form-control form-control-sm required" placeholder="Coupon Amount" value="0.00" id="coupon_amount" name="coupon_amount">

									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="coupon_redeem">Coupon Redeem <span class="red-text">*</span></label>
										<input type="number" class="form-control form-control-sm required" placeholder="Coupon Redeem" value="1" id="coupon_redeem" name="coupon_redeem" min="1" max="50">

									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="start_date">Start Date <span class="red-text">*</span></label>
										<input type="text" class="form-control form-control-sm required" placeholder="Start Date" value="<?php echo date('Y-m-d'); ?>" id="start_date" name="start_date">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="end_date">Expiry Date <span class="red-text">*</span></label>
										<input type="text" class="form-control form-control-sm required" placeholder="Expiry Date" value="<?php echo date('Y-m-d'); ?>" id="end_date" name="end_date">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            <div class="col-md-12">
			<!-- Accordion card -->
			<div class="card-footer text-center">
				<input type="submit" class="btn btn-primary" value="Submit"/>
				<input type="reset" class="btn btn-default" value="Reset" />
			</div>
		</div>
	</div>
	</div>
	<div class="col-md-3">
                    <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                        <?php } ?>
                        <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                        <?php } ?>

                        <div class="row">
                            <div class="col-md-12">
                                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                            </div>
                        </div>
					</div>
</div>
</form>