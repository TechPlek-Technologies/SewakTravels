<?php

$id = '';
$company_name = '';
$contact_person = '';
$email = '';
$mobile = '';
$landline = '';
$pan = '';
$gstin = '';
$pincode = '';
$address = '';
$city = '';
$state = '';
$bank_name = '';
$account_number = '';
$branch_name = '';
$ifsc_code = '';
$statusId = '';


if (!empty($companyInfo)) {
	foreach ($companyInfo as $uf) {
		$id = $uf->id;
		$company_name = $uf->company_name;
		$contact_person = $uf->contact_person;
		$email = $uf->email;
		$mobile = $uf->mobile;
		$landline = $uf->landline;
		$pan = $uf->pan;
		$gstin = $uf->gstin;
		$pincode = $uf->pincode;
		$address = $uf->address;
		$city = $uf->city;
		$state = $uf->state;
		$bank_name = $uf->bank_name;
		$account_number = $uf->account_number;
		$branch_name = $uf->branch_name;
		$ifsc_code = $uf->ifsc_code;
		$statusId = $uf->statusId;
	}
}


?>

<!-- Heading -->
<div class="card mb-3">
	<!--Card content-->
	<div class="card-body d-sm-flex justify-content-between">
		<h6 class="mb-sm-0">
			<a href="<?php echo base_url(); ?>adminCompanyListing">Admin Company Master</a>
			<span>/</span>
			<span>Edit Admin Company</span>
		</h6>
	</div>
</div>
<!-- Heading -->

<!-- form start -->
<?php $this->load->helper("form"); ?>
<form role="form" id="editAdminCompany" action="<?php echo base_url() ?>editAdminCompany" method="post" role="form">
	<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
	<!--Grid row-->
	<div class="row">
		<!--Grid column-->
		<div class="col-md-8">

			<!--Card-->
			<div class="card">
				<div class="card-header white-text primary-color">Enter Admin Company Information</div>
				<!--Card content-->
				<div class="card-body">

					<div class="row">

						<div class="col-md-12">
							<?php
							$this->load->helper('form');
							$error = $this->session->flashdata('error');
							if ($error) {
								?>
								<div class="alert alert-danger alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<?php echo $this->session->flashdata('error'); ?>
								</div>
							<?php } ?>
							<?php
							$success = $this->session->flashdata('success');
							if ($success) {
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
						<div class="col-md-12">

							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="company_name">Company Name <span class="red-text">*</span></label>
										<input type="text" class="form-control form-control-sm required" placeholder="Company Name" value="<?php echo $company_name; ?>" id="company_name" name="company_name">

									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="contact_person">Contact Person</label>
										<input type="text" class="form-control form-control-sm" placeholder="Contact Person" value="<?php echo $contact_person; ?>" id="contact_person" name="contact_person">

									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="email">Email</label>
										<input type="email" class="form-control form-control-sm" placeholder="Email Address" value="<?php echo $email; ?>" id="email" name="email">

									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="mobile">Mobile</label>
										<input type="tel" class="form-control form-control-sm" placeholder="Mobile" value="<?php echo $mobile; ?>" id="mobile" name="mobile">
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="pan">PAN <span class="red-text">*</span></label>
										<input type="text" class="form-control form-control-sm" placeholder="PAN" value="<?php echo $pan; ?>" id="pan" name="pan" onkeyup="this.value = this.value.toUpperCase();" minlength="10" maxlength="12">

									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="gstin">GSTIN</label>
										<input type="text" class="form-control form-control-sm" placeholder="GSTIN" value="<?php echo $gstin; ?>" id="gstin" name="gstin" onkeyup="this.value = this.value.toUpperCase();" minlength="10" maxlength="20">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="pincode">Pincode</label>
										<input type="text" class="form-control form-control-sm" placeholder="Pincode" value="<?php echo $pincode; ?>" id="pincode" name="pincode" minlength="6" maxlength="6">

									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="address">Address</label>
										<input type="text" class="form-control form-control-sm" placeholder="Address" value="<?php echo $address; ?>" id="address" name="address">
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label for="city">City</label>
										<input type="text" class="form-control form-control-sm" placeholder="City" value="<?php echo $city; ?>" id="city" name="city">

									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="state">State <span class="red-text">*</span></label>
										<select class="form-control form-control-sm" id="state" name="state" required>
											<option value="">Select State</option>
											<?php
											if (!empty($states)) {
												foreach ($states as $rl) {
													?>
													<option value="<?php echo $rl->id ?>" <?php if ($rl->id == $state) {
																										echo "selected=selected";
																									} ?>>
														<?php echo $rl->state ?>
													</option>
											<?php
												}
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="landline">Landline</label>
										<input type="text" class="form-control form-control-sm" placeholder="Landline" value="<?php echo $landline; ?>" id="landline" name="landline">

									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="status">Status <span class="red-text">*</span></label>
										<select class="form-control form-control-sm required" id="status" name="status">
											<option value="">Select status</option>
											<option value="1" <?php if ($statusId == 1) {
																	echo "selected=selected";
																} ?>>Active</option>
											<option value="0" <?php if ($statusId != 1) {
																	echo "selected=selected";
																} ?>>In-Active</option>

										</select>
									</div>
								</div>
							</div>
							<!-- /.box-body -->

						</div>

					</div>
				</div>
			</div>

		</div>
		<div class="col-md-4">
			<div class="card">
				<!-- Card header -->
				<div class="card-header white-text primary-color">
					<a class="white-text">
						Edit Bank Details
					</a>
				</div>

				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="bank_name">Bank Name</label>
								<input type="text" class="form-control form-control-sm" placeholder="Bank Name" value="<?php echo $bank_name; ?>" id="bank_name" name="bank_name">

							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="account_number">Account Number</label>
								<input type="text" class="form-control form-control-sm" placeholder="Account Number" value="<?php echo $account_number; ?>" id="account_number" name="account_number">

							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="branch_name">Branch Name</label>
								<input type="text" class="form-control form-control-sm" placeholder="Branch Name" value="<?php echo $branch_name; ?>" id="branch_name" name="branch_name">

							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="ifsc_code">IFSC Code</label>
								<input type="text" class="form-control form-control-sm" placeholder="IFSC Code" value="<?php echo $ifsc_code; ?>" id="ifsc_code" name="ifsc_code">

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
</form>