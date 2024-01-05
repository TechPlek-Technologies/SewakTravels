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
<form id="addNewVendorCharges" action="<?php echo base_url() ?>addNewVendorCharges" method="post" role="form" autocomplete="off">
	<!--Grid row-->
	<div class="row">
		<!--Grid column-->

		<!-- form start -->
		<div class="col-md-3">
			<!--Card-->
			<div class="card">
				<div class="card-header white-text primary-color">Enter New Vendor PF/ESI Information</div>
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
								<div class="col-md-12">
									<div class="form-group" id="vendor_charges_id">
										<label for="vendor_id">Vendor <span class="red-text">*</span></label>
										<select class="form-control form-control-sm required vendor_charges" id="vendor_id" name="vendor_id" required>
											<option value="">Select Vendor</option>
											<?php
											if (!empty($vendorList)) {
												foreach ($vendorList as $rl) {
													?>
													<option value="<?php echo $rl->id ?>">
														<?php echo $rl->name . ' - ' . $rl->company_name; ?>
													</option>
											<?php
												}
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="month">Month <span class="red-text">*</span></label>
										<?php echo month_select_box(); ?>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="pf_amount">PF Amount <span class="red-text">*</span></label>
										<input type="number" class="form-control form-control-sm required" placeholder="PF Amount" value="0" id="pf_amount" name="pf_amount" required>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="esi_amount">ESI Amount <span class="red-text">*</span></label>
										<input type="number" class="form-control form-control-sm required" placeholder="ESI Amount" value="0" id="esi_amount" name="esi_amount" required>

									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<!-- Accordion card -->
						<div class="text-center">
							<input type="submit" class="btn btn-primary btn-sm" value="Save" />
						</div>
					</div>
				</div>


			</div>
		</div>

		<div class="col-md-9">
			<div class="card">
				<div class="card-header white-text primary-color">Vendor PF/ESI Information</div>
				<!--Card content-->
				<div class="card-body">
					<div class="row">
						<div class="col-md-12" id="chargesdetails">
							No records found!
						</div>
					</div>
				</div>
			</div>

		</div>



	</div>
</form>