<?php

$id = '';
$vendor_id = '';
$month_id = '';
$statusId = '';
$esi_amount = '';
$pf_amount = '';
$vendor_name = '';
$company_name = '';


if (!empty($vendorInfo)) {

	foreach ($vendorInfo as $uf) {
		$id = $uf->id;
		$vendor_id = $uf->vendor_id;
		$vendor_name = $uf->vendor_name;
		$company_name = $uf->company_name;
		$month_id = $uf->month_id;
		$esi_amount = $uf->esi_amount;
		$pf_amount = $uf->pf_amount;
		$statusId = $uf->statusId;
	}
}


?>


<!-- Heading -->
<div class="card mb-3">
	<!--Card content-->
	<div class="card-body d-sm-flex justify-content-between">
		<h6 class="mb-sm-0 mt-1">
			<a href="<?php echo base_url(); ?>vendorListing" data-toggle="tooltip" data-placement="bottom" title="Vendor List">Vendor List</a>
			<span>/</span>
			<span>Edit Vendor Charges</span>
		</h6>
		<div class="col-md-6 text-right">
			<a class="btn btn-primary btn-sm m-0" href="<?php echo base_url(); ?>addNewVendorCharge" data-toggle="tooltip" data-placement="bottom" title="Add New Charges">
				<i class="fas fa-plus"></i> Add New Charges
			</a>
		</div>
	</div>
</div>
<!-- Heading -->
<?php $this->load->helper('form'); ?>
<form id="editVendorCharge" action="<?php echo base_url() ?>editVendorCharge" method="post" role="form" autocomplete="off">
	<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
	<!--Grid row-->
	<div class="row">
		<!--Grid column-->

		<!-- form start -->
		<div class="col-md-3">
			<!--Card-->
			<div class="card">
				<div class="card-header white-text primary-color">Edit Vendor PF/ESI Information</div>
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
										<input type="text" class="form-control form-control-sm required" placeholder="PF Amount" value="<?php echo $vendor_name . ' - ' . $company_name; ?>" id="vendor_id" name="vendor_id" required readonly>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="month">Month <span class="red-text">*</span></label>
										<input type="text" class="form-control form-control-sm required" placeholder="PF Amount" value="<?php echo getMonthName($month_id); ?>" id="month_id" name="month_id" required readonly>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="pf_amount">PF Amount <span class="red-text">*</span></label>
										<input type="number" class="form-control form-control-sm required" placeholder="PF Amount" value="<?php echo $pf_amount; ?>" id="pf_amount" name="pf_amount" required>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="esi_amount">ESI Amount <span class="red-text">*</span></label>
										<input type="number" class="form-control form-control-sm required" placeholder="ESI Amount" value="<?php echo $esi_amount; ?>" id="esi_amount" name="esi_amount" required>

									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="status">Status <span class="red-text">*</span></label>
										<select class="form-control form-control-sm required" id="status" name="status" required>
											<option value="">Select</option>
											<option value="1" <?= ($statusId == 1) ? 'selected' : ''; ?>>Active</option>
											<option value="0" <?= ($statusId == 0) ? 'selected' : ''; ?>>In-Active</option>
										</select>

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
							<table class="table table-striped bg-white table-bordered table-sm">
								<caption class="lead">List of already associated PF/ESI with Vendor </caption>
								<thead class="thead-dark">
									<tr>
										<th scope="col">#</th>
										<th scope="col">Vendor Name</th>
										<th scope="col">Month</th>
										<th scope="col">PF Amount (in <i class="fas fa-rupee-sign"></i>)</th>
										<th scope="col">ESI Amount (in <i class="fas fa-rupee-sign"></i>)</th>
										<th scope="col">Status</th>
										<th scope="col">Edit</th>
										<!-- <th scope="col">Delete</th> -->
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									if (!empty($records)) {
										?>
										<?php foreach ($records as $record) { ?>
											<tr>
												<th scope="row"><?php echo $i++; ?></th>
												<td><?php echo $record->vendor_name . ' - ' . $record->company_name; ?></td>
												<td><?php echo getMonthName($record->month_id); ?></td>
												<td><?php echo $record->pf_amount; ?></td>
												<td><?php echo $record->esi_amount; ?></td>
												<td><?= ($record->statusId == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>'; ?></td>
												<td class="text-center">
													<a href="<?php echo base_url() . 'editOldVendorCharge/' . $record->id; ?>">
														<i class="fas fa-pencil-alt blue-text" aria-hidden="true"></i>
													</a>
												</td>
												<!-- <td class="text-center">
													<a class="deleteVendorCharge" href="#" data-id="<?php echo $record->id; ?>">
														<i class="fas fa-minus-circle red-text" aria-hidden="true"></i>
													</a>
												</td> -->
											</tr>
										<?php }
										} else { ?>

										<tr>
											<td colspan="7">No records found!</td>
										</tr>

									<?php }
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</form>