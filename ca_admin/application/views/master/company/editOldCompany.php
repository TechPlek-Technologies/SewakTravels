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
$mcd_tax = '';
$state_tax = '';
$mcd_amount = '';
$state_tax_amount = '';
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
		$mcd_tax = $uf->mcd_tax;
		$state_tax = $uf->state_tax;
		$mcd_amount = $uf->mcd_amount;
		$state_tax_amount = $uf->state_tax_amount;
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
			<a href="<?php echo base_url(); ?>companyListing" data-toggle="tooltip" data-placement="bottom" title="Company Master">Company Master</a>
			<span>/</span>
			<span>Edit Company</span>
		</h6>
	</div>
</div>
<!-- Heading -->

<!-- form start -->
<?php $this->load->helper("form"); ?>
<form role="form" id="editCompany" action="#" method="post" autocomplete="off">
	<input type="hidden" name="companyId" id="companyId" value="<?php echo $id; ?>">
	<!--Grid row-->
	<div class="row">
		<!--Grid column-->
		<div class="col-md-9">
			<!--Card-->
			<div class="card mb-3">
				<div class="card-header white-text primary-color">Enter Company Information</div>
				<!--Card content-->
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="company_name">Company Name <span class="red-text">*</span></label>
										<input type="text" class="form-control form-control-sm required" placeholder="Company Name" value="<?php echo $company_name; ?>" id="company_name" name="company_name">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="contact_person">Contact Person</label>
										<input type="text" class="form-control form-control-sm" placeholder="Contact Person" value="<?php echo $contact_person; ?>" id="contact_person" name="contact_person">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="email">Email</label>
										<input type="email" class="form-control form-control-sm" placeholder="Email Address" value="<?php echo $email; ?>" id="email" name="email">
									</div>
								</div>
								<div class="col-md-3">
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
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="mobile">Mobile</label>
										<input type="tel" class="form-control form-control-sm" placeholder="Mobile" value="<?php echo $mobile; ?>" id="mobile" name="mobile" maxlength="10" minlength="10">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="landline">Landline</label>
										<input type="tel" class="form-control form-control-sm" placeholder="Landline" value="<?php echo $landline; ?>" id="landline" name="landline">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="pan">PAN</label>
										<input type="text" class="form-control form-control-sm" placeholder="PAN" value="<?php echo $pan; ?>" id="pan" name="pan" onkeyup="this.value = this.value.toUpperCase();" minlength="10" maxlength="12">

									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="gstin">GSTIN</label>
										<input type="text" class="form-control form-control-sm" placeholder="GSTIN" value="<?php echo $gstin; ?>" id="gstin" name="gstin" onkeyup="this.value = this.value.toUpperCase();">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="pincode">Pincode</label>
										<input type="text" class="form-control form-control-sm" placeholder="Pincode" value="<?php echo $pincode; ?>" id="pincode" name="pincode" minlength="6" maxlength="6">

									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="address">Address</label>
										<input type="text" class="form-control form-control-sm" placeholder="Address" value="<?php echo $address; ?>" id="address" name="address">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="city">City</label>
										<input type="text" class="form-control form-control-sm" placeholder="City" value="<?php echo $city; ?>" id="city" name="city">
									</div>
								</div>
								<div class="col-md-3">
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
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="card mb-3">
				<div class="card-header white-text primary-color" role="tab">
					<a class="collapsed white-text" data-toggle="collapse" href="#collapseTwo2">
						Edit Company Rate for Pickup/Drop <i class="fas fa-angle-up rotate-icon ml-2"></i>
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
											<?php
											$counter = 1;
											if (!empty($companyRateList)) {
												foreach ($companyRateList as $invData) { ?>
													<tr class="company_tr" data-row-id="<?php echo $counter; ?>" id="company_tr_<?php echo $counter; ?>">

														<?php if ($counter == 1) { ?>

															<td>
																<a class="addMoreCompanyRate green-text" href="javascript:void(0);">
																	<i class="fas fa-plus-circle"></i>
																</a>
															</td>

														<?php } else { ?>

															<td>
																<a class="deleteCompanyRate red-text" data-invoice-id="<?php echo $counter; ?>" href="javascript:void(0)">
																	<i class="fas fa-trash deleteicon"></i>
																</a>
															</td>

														<?php } ?>

														<td class="text-center">
															<span id="company_tr_<?php echo $counter; ?>_id"><?php echo $counter; ?></span>
														</td>
														<td>
															<select class="form-control form-control-sm required" id="company_tr_1_vehicle_type" name="vehicle_type[]" data-bind="content">
																<option value="">Select</option>
																<?php
																		if (!empty($vehicleTypes)) {
																			foreach ($vehicleTypes as $rl) {
																				?>
																		<option value="<?php echo $rl->id ?>" <?php if ($rl->id == $invData->vehicle_type_id) {
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
															<select class="form-control form-control-sm addzone required" id="company_tr_<?php echo $counter; ?>_zone" name="company_zone[]" data-bind="content">
																<option value="">Select</option>
																<?php
																		if (!empty($zoneList)) {
																			foreach ($zoneList as $rl) {
																				?>
																		<option value="<?php echo $rl->id ?>" <?php if ($rl->id == $invData->zone) {
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

															<select class="form-control form-control-sm addzonetype required" id="company_tr_<?php echo $counter; ?>_zone_type" name="company_zone_type[]" data-bind="content">
																<option value="" id="loading_zone_type">Select</option>


																<?php

																		$zoneTypeList = $this->zone_model->getAttachedZoneListById($invData->zone);
																		//echo '<option value="0" selected="selected">Flat</option>';
																		if (!empty($zoneTypeList)) {
																			foreach ($zoneTypeList as $rl) {
																				?>
																		<option value="<?php echo $rl->zone_type_id ?>" <?php if ($rl->zone_type_id == $invData->zone_type) {
																																			echo "selected=selected";
																																		} ?>>
																			<?php echo $rl->zone_type . ' (' . $rl->description . ')'; ?>
																		</option>
																<?php
																			}
																		}
																		?>

															</select>
														</td>

														<td>
															<input type="text" id="company_tr_<?php echo $counter; ?>_cab_rate" name="company_cab_rate[]" class="form-control form-control-sm required" data-bind="number" placeholder="0" value="<?php echo $invData->cab_rate; ?>" />
														</td>
														<td>
															<select class="form-control form-control-sm required" id="company_tr_<?php echo $counter; ?>_guard" name="company_guard[]" data-bind="content">
																<option value="0" <?= ($invData->guard == 0) ? 'selected' : ''; ?>>No</option>
																<option value="1" <?= ($invData->guard == 1) ? 'selected' : ''; ?>>Yes</option>
															</select>
														</td>
														<td>
															<input type="text" id="company_tr_<?php echo $counter; ?>_guard_rate required" name="company_guard_rate[]" class="form-control form-control-sm" data-bind="number" placeholder="0" value="<?php echo $invData->guard_price; ?>" />
														</td>

													</tr>
												<?php
														$counter++;
													}
												} else { ?>
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
											<?php }						?>
										</tbody>

									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="card mb-3">
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
											<?php
											$counterCab = 1;
											if (!empty($companyCabRateList)) {
												foreach ($companyCabRateList as $invCabData) { ?>
													<tr class="company_cab_tr" data-row-id="<?php echo $counterCab; ?>" id="company_cab_tr_1">

														<?php if ($counterCab == 1) { ?>

															<td>
																<a class="addMoreCompanyCabRate green-text" href="javascript:void(0);">
																	<i class="fas fa-plus-circle"></i>
																</a>
															</td>

														<?php } else { ?>

															<td>
																<a class="deleteCompanyCabRate red-text" data-invoice-id="<?php echo $counterCab; ?>" href="javascript:void(0)">
																	<i class="fas fa-trash deleteicon"></i>
																</a>
															</td>

														<?php } ?>

														<td class="text-center">
															<span id="company_cab_tr_<?php echo $counterCab; ?>_id"><?php echo $counterCab; ?></span>
														</td>
														<td>
															<select class="form-control form-control-sm" id="company_cab_tr_1_vehicle_type" name="company_cab_vehicle_type[]" data-bind="content" style="width:160px;">
																<option value="">Select</option>
																<?php
																		if (!empty($vehicleTypes)) {
																			foreach ($vehicleTypes as $rl) {
																				?>
																		<option value="<?php echo $rl->id ?>" <?php if ($rl->id == $invCabData->vehicle_type_id) {
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
																		<option value="<?php echo $rl->id ?>" <?php if ($rl->id == $invCabData->zone_id) {
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
														<td><input type="text" id="company_cab_tr_1_rate_km" name="company_cab_rate_km[]" class="form-control form-control-sm" data-bind="number" placeholder="0" value="<?php echo $invCabData->rate_km; ?>" /></td>
														<td><input type="text" id="company_cab_tr_1_rate_flat" name="company_cab_rate_flat[]" class="form-control form-control-sm" data-bind="number" placeholder="0" value="<?php echo $invCabData->rate_flat; ?>" /></td>
														<td><input type="text" id="company_cab_tr_1_night_charge" name="company_cab_night_charge[]" class="form-control form-control-sm" data-bind="number" placeholder="0" value="<?php echo $invCabData->night_charge; ?>" /></td>
														<td><input type="text" id="company_cab_tr_1_toll_tax" name="company_cab_toll_tax[]" class="form-control form-control-sm" data-bind="number" placeholder="0" value="<?php echo $invCabData->toll_tax; ?>" /></td>
														<td><input type="text" id="company_cab_tr_1_extra" name="company_cab_extra[]" class="form-control form-control-sm" data-bind="number" placeholder="0" value="<?php echo $invCabData->extra; ?>" /></td>

													<?php
															$counterCab++;
														}
													} else { ?>
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
												<?php } ?>
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
										<option value="0" <?php if ($mcd_tax == 0) {
																echo "selected=selected";
															} ?>>No</option>
										<option value="1" <?php if ($mcd_tax == 1) {
																echo "selected=selected";
															} ?>>Per Trip</option>
										<option value="2" <?php if ($mcd_tax == 2) {
																echo "selected=selected";
															} ?>>Monthly</option>
									</select>
								</div>
								<div class="form-group">
								<label for="mcd_amount">MCD Amount</label>
								<input type="text" id="mcd_amount" name="mcd_amount" class="form-control form-control-sm" data-bind="number" placeholder="0" value="<?=$mcd_amount?>" />
							</div>
								<div class="form-group">
									<label for="state_tax">State TAX <span class="red-text">*</span></label>
									<select class="form-control form-control-sm required" id="state_tax" name="state_tax">
										<option value="0" <?php if ($state_tax == 0) {
																echo "selected=selected";
															} ?>>No</option>
										<option value="1" <?php if ($state_tax == 1) {
																echo "selected=selected";
															} ?>>Per Trip</option>
										<option value="2" <?php if ($state_tax == 2) {
																echo "selected=selected";
															} ?>>Monthly</option>
									</select>
								</div>
								<div class="form-group">
								<label for="state_tax_amount">State TAX Amount</label>
								<input type="text" id="state_tax_amount" name="state_tax_amount" class="form-control form-control-sm" data-bind="number" placeholder="0" value="<?=$state_tax_amount?>" />
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-12">
				<!-- Accordion card -->
				<div class="card-footer text-center">
					<!-- <input type="submit" class="btn btn-primary" value="Submit" /> -->
					<a href="javascript:void(0);" class="btn btn-info" id="update_add_new_company">Update</a>
					<input type="reset" class="btn btn-default" value="Reset" />
				</div>
			</div>
		</div>
	</div>
</form>