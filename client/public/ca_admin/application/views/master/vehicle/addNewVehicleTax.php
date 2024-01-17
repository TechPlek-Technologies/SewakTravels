<!-- Heading -->
<div class="card mb-3">
	<!--Card content-->
	<div class="card-body d-sm-flex justify-content-between">
		<h6 class="mb-sm-0">
			<a href="<?php echo base_url(); ?>vendorListing" data-toggle="tooltip" data-placement="bottom" title="Vendor List">Vendor List</a>
			<span>/</span>
			<span>Add New Loan</span>
		</h6>
	</div>
</div>
<!-- Heading -->
<?php $this->load->helper('form'); ?>
<form id="addNewVehicleTaxs" name="addNewVehicleTaxs" method="post" role="form" autocomplete="off">
	<!--Grid row-->
	<div class="row">
		<!--Grid column-->
		<div class="col-md-12 mb-3">
			<div class="card">
				<div class="card-header white-text primary-color">
					Add MCD Details
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive text-nowrap">
								<table width="100%" class="table table-striped table-bordered table-hover companyMcdTaxtable table-sm">
									<thead>
										<tr>
											<th>#</th>
											<th>S.No</th>
											<th>Vehicle No. <span class="red-text">*</span></th>
											<th>State <span class="red-text">*</span></th>
											<th>Type <span class="red-text">*</span></th>
											<th>Amount <span class="red-text">*</span></th>
											<th>Start Date <span class="red-text">*</span></th>
											<th>End Date <span class="red-text">*</span></th>
										</tr>
									</thead>
									<tbody>
										<tr class="vehicle_mcd_tr" data-mcd-id="1" id="vehicle_mcd_tr_1">
											<td>
												<!-- addMoreCompanyRate -->
												<a class="addMoreVehicleMcdTax green-text" href="javascript:void(0);">
													<i class="fas fa-plus-circle"></i>
												</a>
											</td>
											<td class="text-center">
												<span id="vehicle_mcd_1_id">1</span>
												<input type="hidden" id="vehicle_mcd_tr_1_vendor_id" name="mcd_vendor_id[]">
												<input type="hidden" id="vehicle_mcd_tr_1_vendor_vehicle_id" name="mcd_vendor_vehicle_id[]">
											</td>
											<td>
												<input type="text" class="form-control form-control-sm autocomplete_mcd" placeholder="Vehicle Number" id="vehicle_mcd_tr_1_vehicle_id" name="mcd_vehicle_id[]">
											</td>
											<td>
												<select class="form-control form-control-sm" id="vehicle_mcd_1_state" name="mcd_state[]" data-bind="content">
													<?php
													if (!empty($states)) {
														foreach ($states as $rl) {
															?>
															<option value="<?php echo $rl->id ?>" <?php if ($rl->id == 9) {
																												echo "selected=selected";
																											} ?>>
																<?php echo ucwords(strtolower($rl->state)); ?>
															</option>
													<?php
														}
													}
													?>
												</select>
											</td>
											<td>
												<select class="form-control form-control-sm" id="vehicle_mcd_1_mcd_type" name="mcd_type[]" data-bind="content">
													<!-- <option value="0">No</option> -->
													<option value="1">Per Trip</option>
													<option value="2" selected>Monthly</option>
												</select>
											</td>

											<td>
												<input type="number" id="vehicle_mcd_1_mcd_amount" name="mcd_amount[]" class="form-control form-control-sm" data-bind="number" placeholder="0" />
											</td>
											<td>
												<input type="text" id="vehicle_mcd_1_start_date" name="mcd_start_date[]" class="form-control form-control-sm start_date" data-bind="content" placeholder="dd-mm-yy" value="<?php echo date('d-m-Y'); ?>" />
											</td>
											<td>
												<input type="text" id="vehicle_mcd_1_end_date" name="mcd_end_date[]" class="form-control form-control-sm end_date" data-bind="content" placeholder="dd-mm-yy" />
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


		<div class="col-md-12">
			<div class="card">
				<div class="card-header white-text primary-color">
					Add State TAX Details
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive text-nowrap">
								<table width="100%" class="table table-striped table-bordered table-hover companyStateTaxtable table-sm">
									<thead>
										<tr>
											<th>#</th>
											<th>S.No</th>
											<th>Vehicle No. <span class="red-text">*</span></th>
											<th>State <span class="red-text">*</span></th>
											<th>Type <span class="red-text">*</span></th>
											<th>Amount <span class="red-text">*</span></th>
											<th>Start Date <span class="red-text">*</span></th>
											<th>End Date <span class="red-text">*</span></th>
										</tr>
									</thead>
									<tbody>
										<tr class="vehicle_tax_tr" data-tax-id="1" id="vehicle_tax_tr_1">
											<td>
												<!-- addMoreCompanyRate -->
												<a class="addMoreVehicleStateTax green-text" href="javascript:void(0);">
													<i class="fas fa-plus-circle"></i>
												</a>
											</td>
											<td class="text-center">
												<span id="vehicle_tax_tr_1_id">1</span>
												<input type="hidden" id="vehicle_tax_tr_1_vendor_id" name="tax_vendor_id[]">
												<input type="hidden" id="vehicle_tax_tr_1_vendor_vehicle_id" name="tax_vendor_vehicle_id[]">
											</td>
											<td>
												<input type="text" class="form-control form-control-sm  autocomplete_tax" placeholder="Vehicle Number" id="vehicle_tax_tr_1_vehicle_id" name="tax_vehicle_id[]">
											</td>
											<td>
												<select class="form-control form-control-sm addzone " id="vehicle_tax_tr_1_state" name="tax_state[]" data-bind="content">
													<?php
													if (!empty($states)) {
														foreach ($states as $rl) {
															?>
															<option value="<?php echo $rl->id ?>" <?php if ($rl->id == 34) {
																												echo "selected=selected";
																											} ?>>
																<?php echo ucwords(strtolower($rl->state)); ?>
															</option>
													<?php
														}
													}
													?>
												</select>
											</td>
											<td>
												<select class="form-control form-control-sm " id="vehicle_tax_tr_1_mcd_type" name="tax_type[]" data-bind="content">
													<!-- <option value="0">No</option> -->
													<option value="1" selected>Per Trip</option>
													<option value="2">Monthly</option>
												</select>
											</td>

											<td>
												<input type="number" id="vehicle_tax_tr_1_mcd_amount" name="tax_amount[]" class="form-control form-control-sm " data-bind="number" placeholder="0" />
											</td>
											<td>
												<input type="text" id="vehicle_tax_tr_1_start_date" name="tax_start_date[]" class="form-control form-control-sm  start_date" data-bind="content" placeholder="dd-mm-yy" value="<?php echo date('d-m-Y'); ?>" />
											</td>
											<td>
												<input type="text" id="vehicle_tax_tr_1_end_date" name="tax_end_date[]" class="form-control form-control-sm  end_date" data-bind="content" placeholder="dd-mm-yy" />
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
	</div>
	<div class="card-footer text-center">
		<input type="reset" class="btn btn-default" value="Reset" />
		<a href="javascript:void(0);" class="btn btn-info" id="save_add_new_tax">Save & Add New TAX</a>
	</div>
</form>