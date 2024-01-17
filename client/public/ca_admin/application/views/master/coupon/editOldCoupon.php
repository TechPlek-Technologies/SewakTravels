<?php

$id = '';
$coupon_name = '';
$coupon_code = '';
$coupon_description = '';
$coupon_type = '';
$coupon_amount = '';
$coupon_redeem = '';
$start_date = '';
$end_date = '';
$statusId = '';


if (!empty($coupon_info)) {
	foreach ($coupon_info as $uf) {
		$id = $uf->id;
		$coupon_name = $uf->name;
		$coupon_code = $uf->coupon_code;
		$coupon_description = $uf->coupon_desc;
		$coupon_type = $uf->coupon_type;
		$coupon_amount = $uf->coupon_amount;
		$coupon_redeem = $uf->redeem;
		$start_date = $uf->coupon_start_date;
		$end_date = $uf->coupon_exp_date;
		$statusId = $uf->statusId;
	}
}


?>

<!-- Heading -->
<div class="card mb-3">
	<!--Card content-->
	<div class="card-body d-sm-flex justify-content-between">
		<h6 class="mb-sm-0">
			<a href="<?php echo base_url(); ?>couponListings" data-toggle="tooltip" data-placement="bottom" title="Coupon Master">Coupon Master</a>
			<span>/</span>
			<span>Edit Coupon</span>
		</h6>
	</div>
</div>
<!-- Heading -->

<!-- form start -->
<?php $this->load->helper("form"); ?>
<form role="form" id="editCoupon" action="<?php echo base_url() ?>editCoupon" method="post">
	<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
	<!--Grid row-->
	<div class="row">
		<!--Grid column-->
		<div class="col-md-12">
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
										<input type="text" class="form-control form-control-sm required" placeholder="Coupon Name" value="<?php echo $coupon_name; ?>" id="coupon_name" name="coupon_name">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="coupon_code">Coupon Code <span class="red-text">*</span></label>
										<input type="text" class="form-control form-control-sm required" placeholder="Coupon Code" value="<?php echo strtoupper($coupon_code); ?>" id="coupon_code" name="coupon_code" onkeyup="this.value = this.value.toUpperCase();">

									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="coupon_description">Coupon Description <span class="red-text">*</span></label>
										<input type="text" class="form-control form-control-sm required" placeholder="Coupon Description" value="<?php echo $coupon_description; ?>" id="coupon_description" name="coupon_description">

									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="coupon_type">Coupon Type <span class="red-text">*</span></label>
										<select class="form-control form-control-sm required" name="coupon_type" id="coupon_type">
										  <option value="flat" <?php if($coupon_type == 'flat') {echo "selected=selected";} ?>>Flat Discount</option>
										  <option value="per" <?php if($coupon_type == 'per') {echo "selected=selected";} ?>>% Discount</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="coupon_amount">Coupon Amount <span class="red-text">*</span></label>
										<input type="text" class="form-control form-control-sm required" placeholder="Coupon Amount" value="<?php echo $coupon_amount; ?>" id="coupon_amount" name="coupon_amount">

									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="coupon_redeem">Coupon Redeem <span class="red-text">*</span></label>
										<input type="number" class="form-control form-control-sm required" placeholder="Coupon Redeem" value="<?php echo $coupon_redeem; ?>" id="coupon_redeem" name="coupon_redeem" min="1" max="50">

									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="start_date">Start Date <span class="red-text">*</span></label>
										<input type="text" class="form-control form-control-sm required" placeholder="Start Date" value="<?php echo $start_date; ?>" id="start_date" name="start_date">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="end_date">Expiry Date <span class="red-text">*</span></label>
										<input type="text" class="form-control form-control-sm required" placeholder="Expiry Date" value="<?php echo $end_date; ?>" id="end_date" name="end_date">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
									<label for="status">Status <span class="red-text">*</span></label>
									<select class="form-control form-control-sm required" id="status" name="status" required>
										<option value="">Select</option>
										<option value="1" <?=($statusId == 1)?'selected':'';?>>Active</option>
										<option value="0" <?=($statusId == 0)?'selected':'';?>>In-Active</option>          
									</select>										
								</div>
								</div>
							</div>
						</div>
				</div>
			</div>
			</div>
			</div>

		<div class="col-md-12">
				<!-- Accordion card -->
				<div class="card-footer text-center">
					<input type="submit" class="btn btn-primary" value="Submit" />
					<input type="reset" class="btn btn-default" value="Reset" />
				</div>
			</div>
		</div>
	</div>
</form>