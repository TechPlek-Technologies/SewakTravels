<!-- Heading -->
<div class="card mb-3">
	<!--Card content-->
	<div class="card-body d-sm-flex justify-content-between">
		<h6 class="mb-sm-0">
			<a href="<?php echo base_url(); ?>companyListing" data-toggle="tooltip" data-placement="bottom" title="Company Master">Company Master</a>
			<span>/</span>
			<span>Add New Company</span>
		</h6>
	</div>
</div>
<!-- Heading -->
<!--Grid row-->
<!-- form start -->
<?php $this->load->helper("form"); ?>
<form role="form" id="addNewCompany" action="#" method="post" autocomplete="off">
	<div class="row">
		<!--Grid column-->
		<div class="col-md-9">

			<!--Card-->
			<div class="card mb-3">
				<div class=" card-header white-text primary-color">Enter Company Information</div>
				<!--Card content-->
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">

							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="company_name">Company Name <span class="red-text">*</span></label>
										<input type="text" class="form-control form-control-sm required" placeholder="Company Name" value="<?php echo set_value('company_name'); ?>" id="company_name" name="company_name">

									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="contact_person">Contact Person</label>
										<input type="text" class="form-control form-control-sm" placeholder="Contact Person" value="<?php echo set_value('contact_person'); ?>" id="contact_person" name="contact_person">

									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="email">Email</label>
										<input type="email" class="form-control form-control-sm" placeholder="Email Address" value="<?php echo set_value('email'); ?>" id="email" name="email">

									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="mobile">Mobile</label>
										<input type="tel" class="form-control form-control-sm" placeholder="Mobile" value="<?php echo set_value('mobile'); ?>" id="mobile" name="mobile" maxlength="10" minlength="10">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="landline">Landline</label>
										<input type="tel" class="form-control form-control-sm" placeholder="Landline" value="<?php echo set_value('landline'); ?>" id="landline" name="landline">

									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="pan">PAN</label>
										<input type="text" class="form-control form-control-sm" placeholder="PAN" value="<?php echo set_value('pan'); ?>" id="pan" name="pan" onkeyup="this.value = this.value.toUpperCase();" minlength="10" maxlength="12">

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
										<input type="text" class="form-control form-control-sm" placeholder="Pincode" value="<?php echo set_value('pincode'); ?>" id="pincode" name="pincode" minlength="6" maxlength="6">

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
													<option value="<?php echo $rl->id ?>" <?php if ($rl->id == set_value('state')) {
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
							<!-- /.box-body -->

						</div>

					</div>
				</div>
			</div>


			<div class="card mb-3">
				<div class="card-header white-text primary-color" role="tab">
					<a class="collapsed white-text" data-toggle="collapse" href="#collapseTwo2">
						Add Company Rate for Pickup/Drop <i class="fas fa-angle-up rotate-icon ml-2"></i>
					</a>
				</div>
				<div id="collapseTwo2" class="collapse show" role="tabpanel">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive text-nowrap">
									<table width="100%" class="table table-striped table-bordered table-hover companytable table-sm">
										<thead>
											<tr>
												<th>#</th>
												<th>S.No</th>
												<th>Vehicle Type <span class="red-text">*</span></th>
												<th>Zone Name <span class="red-text">*</span></th>
												<th>Zone Type <span class="red-text">*</span></th>
												<th>Cab Rate <span class="red-text">*</span></th>
												<th>Guard <span class="red-text">*</span></th>
												<th>Guard Price <span class="red-text">*</span></th>
											</tr>
										</thead>
										<tbody>
											<tr class="company_tr" data-row-id="1" id="company_tr_1">
												<td>
													<a class="addMoreCompanyRate green-text" href="javascript:void(0);">
														<i class="fas fa-plus-circle"></i>
													</a>
												</td>
												<td class="text-center">
													<span id="company_tr_1_id">1</span>
												</td>
												<td>
													<select class="form-control form-control-sm required" id="company_tr_1_vehicle_type" name="vehicle_type[]" data-bind="content">
														<option value="">Select</option>
														<?php
														if (!empty($vehicleTypes)) {
															foreach ($vehicleTypes as $rl) {
																?>
																<option value="<?php echo $rl->id ?>" <?php if ($rl->id == set_value('vehicle_type')) {
																													echo "selected=selected";
																												} ?>>
																	<?php echo ucwords(strtolower($rl->type)); ?>
																</option>
														<?php
															}
														}
														?>
													</select>
												</td>
												<td>
													<select class="form-control form-control-sm addzone required" id="company_tr_1_zone" name="company_zone[]" data-bind="content">
														<option value="">Select</option>
														<?php
														if (!empty($zoneList)) {
															foreach ($zoneList as $rl) {
																?>
																<option value="<?php echo $rl->id ?>" <?php if ($rl->id == set_value('company_zone')) {
																													echo "selected=selected";
																												} ?>>
																	<?php echo ucwords(strtolower($rl->name)); ?>
																</option>
														<?php
															}
														}
														?>
													</select>
												</td>
												<td>
													<select class="form-control form-control-sm addzonetype required" id="company_tr_1_zone_type" name="company_zone_type[]" data-bind="content">
														<option value="" id="loading_zone_type">Select</option>

													</select>
												</td>

												<td>
													<input type="text" id="company_tr_1_cab_rate" name="company_cab_rate[]" class="form-control form-control-sm required" data-bind="number" placeholder="0" />
												</td>
												<td>
													<select class="form-control form-control-sm required" id="company_tr_1_guard" name="company_guard[]" data-bind="content">
														<option value="0">No</option>
														<option value="1">Yes</option>
													</select>
												</td>
												<td>
													<input type="text" id="company_tr_1_guard_rate required" name="company_guard_rate[]" class="form-control form-control-sm" data-bind="number" placeholder="0" value="0" />
												</td>

											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="card">
				<div class="card-header white-text primary-color" role="tab">
					<a class="collapsed white-text" data-toggle="collapse" href="#collapseTwo3">
						Add Company Rate for Full Day <i class="fas fa-angle-up rotate-icon ml-2"></i>
					</a>
				</div>
				<div id="collapseTwo3" class="collapse show" role="tabpanel">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12">

								<div class="table-responsive text-nowrap">
									<table width="100%" class="table table-striped table-bordered table-hover companycabtable table-sm">
										<thead>
											<tr>
												<th>#</th>
												<th>S.No</th>
												<th>Vehicle Type</th>
												<th>Zone Name </th>
												<th>Rate (Per KM)</th>
												<th>Rate (Flat)</th>
												<th>Night Charges</th>
												<th>Toll Tax</th>
												<th>Extra</th>
											</tr>
										</thead>
										<tbody>
											<tr class="company_cab_tr" data-row-id="1" id="company_cab_tr_1">
												<td>
													<a class="addMoreCompanyCabRate green-text" href="javascript:void(0);">
														<i class="fas fa-plus-circle"></i>
													</a>
												</td>
												<td class="text-center"><span id="company_cab_tr_1_id">1</span></td>
												<td>
													<select class="form-control form-control-sm" id="company_cab_tr_1_vehicle_type" name="company_cab_vehicle_type[]" data-bind="content" style="width:160px;">
														<option value="">Select</option>
														<?php
														if (!empty($vehicleTypes)) {
															foreach ($vehicleTypes as $rl) {
																?>
																<option value="<?php echo $rl->id ?>" <?php if ($rl->id == set_value('vehicle_type')) {
																													echo "selected=selected";
																												} ?>>
																	<?php echo ucwords(strtolower($rl->type)); ?>
																</option>
														<?php
															}
														}
														?>
													</select>
												</td>
												<td>
													<select class="form-control form-control-sm" id="company_cab_tr_1_zone" name="company_cab_zone[]" data-bind="content" style="width:160px;">
														<option value="">Select</option>
														<?php
														if (!empty($zoneList)) {
															foreach ($zoneList as $rl) {
																?>
																<option value="<?php echo $rl->id ?>" <?php if ($rl->id == set_value('company_cab_zone')) {
																													echo "selected=selected";
																												} ?>>
																	<?php echo ucwords(strtolower($rl->name)); ?>
																</option>
														<?php
															}
															echo '<option value="0">Other</option>';
														}
														?>
													</select>
												</td>
												<td><input type="text" id="company_cab_tr_1_rate_km" name="company_cab_rate_km[]" class="form-control form-control-sm" data-bind="number" placeholder="0" value="<?php echo set_value('company_cab_rate_km'); ?>" /></td>
												<td><input type="text" id="company_cab_tr_1_rate_flat" name="company_cab_rate_flat[]" class="form-control form-control-sm" data-bind="number" placeholder="0" value="<?php echo set_value('company_cab_rate_flat'); ?>" /></td>
												<td><input type="text" id="company_cab_tr_1_night_charge" name="company_cab_night_charge[]" class="form-control form-control-sm" data-bind="number" placeholder="0" value="<?php echo set_value('company_cab_night_charge'); ?>" /></td>
												<td><input type="text" id="company_cab_tr_1_toll_tax" name="company_cab_toll_tax[]" class="form-control form-control-sm" data-bind="number" placeholder="0" value="<?php echo set_value('company_cab_toll_tax'); ?>" /></td>
												<td><input type="text" id="company_cab_tr_1_extra" name="company_cab_extra[]" class="form-control form-control-sm" data-bind="number" placeholder="0" value="<?php echo set_value('company_cab_extra'); ?>" /></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> -->
		</div>

		<div class="col-md-3">
			<!--Card-->
			<div class="card mb-3">
				<div class=" card-header white-text primary-color">MCD/TAX Information</div>
				<!--Card content-->
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="mcd_tax">MCD <span class="red-text">*</span></label>
								<select class="form-control form-control-sm required" id="mcd_tax" name="mcd_tax">
									<option value="0">No</option>
									<option value="1">Per Trip</option>
									<option value="2">Monthly</option>
								</select>
							</div>
							<div class="form-group">
								<label for="mcd_amount">MCD Amount</label>
								<input type="text" id="mcd_amount" name="mcd_amount" class="form-control form-control-sm" data-bind="number" placeholder="0" value="0" />
							</div>
							
							<div class="form-group">
								<label for="state_tax">State TAX <span class="red-text">*</span></label>
								<select class="form-control form-control-sm required" id="state_tax" name="state_tax">
									<option value="0">No</option>
									<option value="1">Per Trip</option>
									<option value="2">Monthly</option>
								</select>
							</div>
							<div class="form-group">
								<label for="state_tax_amount">State TAX Amount</label>
								<input type="text" id="state_tax_amount" name="state_tax_amount" class="form-control form-control-sm" data-bind="number" placeholder="0" value="0" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-12">
			<!-- Accordion card -->
			<div class="card-footer text-center">
				<!-- <input type="submit" class="btn btn-primary" value="Submit" id="save_add_new_company"/> -->
				<a href="javascript:void(0);" class="btn btn-info" id="save_add_new_company">Submit</a>
				<input type="reset" class="btn btn-default" value="Reset" />
			</div>
		</div>
	</div>
</form>