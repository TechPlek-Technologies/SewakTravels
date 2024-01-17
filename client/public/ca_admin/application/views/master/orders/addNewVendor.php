<!-- Heading -->
<div class="card mb-3">
	<!--Card content-->
	<div class="card-body d-sm-flex justify-content-between">
		<h6 class="mb-sm-0">
			<a href="<?php echo base_url(); ?>vendorListing" data-toggle="tooltip" data-placement="bottom" title="Vendor List">Vendor List</a>
			<span>/</span>
			<span>Add New Vendor</span>
		</h6>
	</div>
</div>
<!-- Heading -->
<?php $this->load->helper('form'); ?>
<form id="addNewVendors" action="<?php echo base_url() ?>addNewVendors" method="post" role="form" autocomplete="off">
	<!--Grid row-->
	<div class="row">
		<!--Grid column-->

		<!-- form start -->
		<div class="col-md-9">
			<!--Card-->
			<div class="card">
				<div class="card-header white-text primary-color">Enter New Vendor Information</div>
				<!--Card content-->
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<?php
							$error = $this->session->flashdata('error');
							if ($error) { ?>
								<div class="alert alert-danger alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
									<?php echo $this->session->flashdata('error'); ?>
								</div>
							<?php }
							$success = $this->session->flashdata('success');
							if ($success) { ?>
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
								<div class="col-md-3">
									<div class="form-group">
										<label for="salutaion">Salutaion <span class="red-text">*</span></label>
										<select class="form-control form-control-sm required" id="salutation" name="salutation" required>
											<option value="">Select Salutaion</option>
											<option value="Mr." selected="">Mr.</option>
											<option value="Ms.">Ms.</option>
											<option value="Mrs.">Mrs.</option>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="full_name">Owner Name <span class="red-text">*</span></label>
										<input type="text" class="form-control form-control-sm required" placeholder="Full Name" value="<?php echo set_value('full_name'); ?>" id="full_name" name="full_name" required>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="company_name">Company Name</label>
										<input type="text" class="form-control form-control-sm" placeholder="Company Name" value="<?php echo set_value('company_name'); ?>" id="company_name" name="company_name">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="email">Email</label>
										<input type="email" class="form-control form-control-sm" placeholder="Email Address" value="<?php echo set_value('email'); ?>" id="email" name="email">

									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="mobile">Mobile <span class="red-text">*</span></label>
										<input type="tel" class="form-control form-control-sm required" placeholder="Mobile" value="<?php echo set_value('mobile'); ?>" id="mobile" name="mobile" required maxlength="10" minlength="10">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="pan">PAN <span class="red-text">*</span></label>
										<input type="text" class="form-control form-control-sm" placeholder="PAN" value="<?php echo set_value('pan'); ?>" id="pan" name="pan" required onkeyup="this.value = this.value.toUpperCase();" minlength="10" maxlength="12">

									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="gstin">GSTIN</label>
										<input type="text" class="form-control form-control-sm" id="gstin" name="gstin" maxlength="20" placeholder="GSTIN" onkeyup="this.value = this.value.toUpperCase();">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="pincode">Pincode</label>
										<input type="text" class="form-control form-control-sm" placeholder="Pincode" value="<?php echo set_value('pincode'); ?>" id="pincode" name="pincode">

									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="address">Address</label>
										<input type="text" class="form-control form-control-sm" placeholder="Address" value="<?php echo set_value('address'); ?>" id="address" name="address">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="city">City</label>
										<input type="text" class="form-control form-control-sm" placeholder="City" value="<?php echo set_value('city'); ?>" id="city" name="city">

									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="state">State <span class="red-text">*</span></label>
										<select class="form-control form-control-sm required" id="state" name="state">
											<option value="">Select State</option>
											<?php
											if (!empty($states)) {
												foreach ($states as $rl) {
													?>
													<option value="<?php echo $rl->id ?>" <?php if ($rl->id == 14) {
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
							</div>
						</div>


					</div>
				</div>
			</div>

			<div class="row mt-3">
				<div class="col-md-3 mb-3">
					<div class="card">
						<div class="card-header white-text primary-color" role="tab">
							<a class="collapsed white-text" data-toggle="collapse" href="#collapseTwo1">
								Office Charges
								<i class="fas fa-angle-down rotate-icon ml-2"></i>
							</a>
						</div>
						<div id="collapseTwo1" class="collapse show" role="tabpanel">
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label for="office_charge">Office Charge</label>
											<input type="text" class="form-control form-control-sm" placeholder="0" value="<?php echo set_value('office_charge'); ?>" id="office_charge" name="office_charge">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-9 mb-3">
					<div class="card">
						<div class="card-header white-text primary-color" role="tab">
							<a class="collapsed white-text" data-toggle="collapse" href="#collapseTwo2">
								Add Bank Details <i class="fas fa-angle-down rotate-icon ml-2"></i>
							</a>
						</div>

						<div id="collapseTwo2" class="collapse show" role="tabpanel">
							<div class="card-body">
								<div class="row">
									<div class="col-md-3 ">
										<div class="form-group">
											<label for="bank_name">Bank Name</label>
											<input type="text" class="form-control form-control-sm" placeholder="Bank Name" value="<?php echo set_value('bank_name'); ?>" id="bank_name" name="bank_name">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="account_number">Account Number</label>
											<input type="text" class="form-control form-control-sm" placeholder="Account Number" value="<?php echo set_value('account_number'); ?>" id="account_number" name="account_number">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="branch_name">Branch Name</label>
											<input type="text" class="form-control form-control-sm" placeholder="Branch Name" value="<?php echo set_value('branch_name'); ?>" id="branch_name" name="branch_name">
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label for="ifsc_code">IFSC Code</label>
											<input type="text" class="form-control form-control-sm" placeholder="IFSC Code" value="<?php echo set_value('ifsc_code'); ?>" id="ifsc_code" name="ifsc_code">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<!--Card-->
			<div class="card mb-3">
				<div class=" card-header white-text primary-color">ESI/PF Information</div>
				<!--Card content-->
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="esi_no">ESI No.</label>
								<input type="text" class="form-control form-control-sm" placeholder="ESI Number" value="<?php echo set_value('esi_no'); ?>" id="esi_no" name="esi_no">
							</div>
							<div class="form-group">
								<label for="pf_number">PF No.</label>
								<input type="text" class="form-control form-control-sm" placeholder="PF Number" value="<?php echo set_value('pf_number'); ?>" id="pf_number" name="pf_number">
							</div>
							<!-- <div class="form-group">
								<label for="esi_amount">ESI Amount/mo</label>
								<input type="text" class="form-control form-control-sm" placeholder="ESI Amount" value="<?php echo set_value('esi_amount'); ?>" id="esi_amount" name="esi_amount">
							</div> -->
						</div>
					</div>
				</div>
			</div>

			<!-- <div class="card mb-3">
				<div class=" card-header white-text primary-color">PF Information</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="pf_number">PF No.</label>
								<input type="text" class="form-control form-control-sm" placeholder="PF Number" value="<?php echo set_value('pf_number'); ?>" id="pf_number" name="pf_number">
							</div>
							<div class="form-group">
								<label for="pf_amount">PF Amount/mo</label>
								<input type="text" class="form-control form-control-sm" placeholder="PF Amount" value="<?php echo set_value('pf_amount'); ?>" id="pf_amount" name="pf_amount">
							</div>
						</div>
					</div>
				</div>
			</div> -->
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