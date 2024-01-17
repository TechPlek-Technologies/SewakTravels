<?php

$id = '';
$vehicle_no = '';
$state_id = '';
$type = '';
$amount = '';
$start_date = '';
$end_date = '';
$statusId = '';

if (!empty($record)) {
	foreach ($record as $uf) {
		$id = $uf->id;
		$vehicle_no = $uf->vehicle_no;
		$state_id = $uf->state_id;
		$type = $uf->type;
		$amount = $uf->amount;
		$start_date = $uf->start_date;
		$end_date = $uf->end_date;
		$statusId = $uf->statusId;
	}
}

?>


<!-- Heading -->
<div class="card mb-3">
	<!--Card content-->
	<div class="card-body d-sm-flex justify-content-between">
		<h6 class="mb-sm-0">
			<a href="<?php echo base_url(); ?>vehicleTaxListings" data-toggle="tooltip" data-placement="bottom" title="Vehicle MCD/TAX">Vehicle MCD/TAX List</a>
			<span>/</span>
			<span>Edit TAX</span>
		</h6>
	</div>
</div>
<!-- Heading -->


<form role="form" action="<?php echo base_url() ?>editVehicleTax" method="post" id="editVehicleTax" autocomplete="off">
	<input type="hidden" id="id" name="id" value="<?= $id ?>">
	<!--Grid row-->
	<div class="row">
		<!--Grid column-->
		<div class="col-md-12 mb-3">

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
			<div class="card">
				<div class="card-header white-text primary-color">
					Edit MCD Details
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive text-nowrap">
								<table width="100%" class="table table-striped table-bordered table-hover table-sm">
									<thead>
										<tr>
											<th>Vehicle No. <span class="red-text">*</span></th>
											<th>State <span class="red-text">*</span></th>
											<th>Type <span class="red-text">*</span></th>
											<th>Amount <span class="red-text">*</span></th>
											<th>Start Date <span class="red-text">*</span></th>
											<th>End Date <span class="red-text">*</span></th>
											<th>Status <span class="red-text">*</span></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<input type="text" class="form-control form-control-sm" placeholder="Vehicle Number" id="vehicle_no" name="vehicle_no" value="<?php echo $vehicle_no; ?>" readonly>
											</td>
											<td>
												<select class="form-control form-control-sm" id="state_id" name="state_id" required>
													<?php
													if (!empty($states)) {
														foreach ($states as $rl) {
															?>
															<option value="<?php echo $rl->id ?>" <?php if ($rl->id == $state_id) {
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
												<select class="form-control form-control-sm" id="tax_type" name="tax_type" required>
													<option value="1" <?= ($type == 1) ? 'selected' : '' ?>>Per Trip</option>
													<option value="2" <?= ($type == 2) ? 'selected' : '' ?>>Monthly</option>
												</select>
											</td>

											<td>
												<input type="number" id="amount" name="amount" class="form-control form-control-sm" placeholder=" 0" value="<?php echo $amount; ?>" required />
											</td>
											<td>
												<input type="text" id="start_date" name="start_date" class="form-control form-control-sm start_date" placeholder="dd-mm-yy" value="<?php echo $start_date; ?>" required />
											</td>
											<td>
												<input type="text" id="end_date" name="end_date" class="form-control form-control-sm end_date" placeholder="dd-mm-yy" value="<?php echo $end_date; ?>" required />
											</td>
											<td>
												<select class="form-control form-control-sm" id="status" name="status" required>
													<option value="1" <?= ($statusId == 1) ? 'selected' : '' ?>>Active</option>
													<option value="2" <?= ($statusId == 2) ? 'selected' : '' ?>>In-Active</option>
												</select>
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
		<input type="submit" class="btn btn-primary" value="Submit" />
		<input type="reset" class="btn btn-default" value="Reset" />
	</div>
</form>