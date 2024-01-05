<?php

$id = '';
$vehicle_no = '';
$loan_period = '';
$loan_rate = '';
$statusId = '';
$loan_amount = '';
$total_paid = '';
$emi_per_month = '';
$agreement_date = '';

if (!empty($vendorInfo)) {

	foreach ($vendorInfo as $uf) {
		$id = $uf->id;
		$vehicle_no = $uf->vehicle_no;
		$loan_period = $uf->loan_period;
		$loan_rate = $uf->loan_rate;
		$loan_amount = $uf->loan_amount;
		$total_paid = $uf->total_paid;
		$emi_per_month = $uf->emi_per_month;
		$agreement_date = $uf->agreement_date;
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
			<span>Edit Vendor Loans</span>
		</h6>
		<div class="col-md-6 text-right">
			<a class="btn btn-primary btn-sm m-0" href="<?php echo base_url(); ?>addNewVendorLoan" data-toggle="tooltip" data-placement="bottom" title="Add New Charges">
				<i class="fas fa-plus mr-1"></i> Loan
			</a>
		</div>
	</div>
</div>
<!-- Heading -->
<?php $this->load->helper('form'); ?>
<form id="editVendorLoan" action="<?php echo base_url() ?>editVendorLoan" method="post" role="form" autocomplete="off">
	<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
	<!--Grid row-->
	<div class="row">
		<!--Grid column-->

		<!-- form start -->
		<div class="col-md-3">
			<!--Card-->
			<div class="card">
				<div class="card-header white-text primary-color">Enter New Loan Information</div>
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
								<div class="col-md-6">

									<div class="form-group">
										<label for="vehicle_no">Vehicle No. <span class="red-text">*</span></label>
										<input type="text" id="vehicle_no" name="vehicle_no" class="form-control form-control-sm required" placeholder="Vehicle No." data-bind="content" value="<?php echo $vehicle_no; ?>" readonly />
									</div>
								</div>


								<div class="col-md-6">
									<div class="form-group">
										<label for="loan_amount">Loan Amount <span class="red-text">*</span></label>
										<input type="number" class="form-control form-control-sm required" placeholder="Loan Amount" value="<?php echo $loan_amount; ?>" id="loan_amount" name="loan_amount" required onkeyup="loanamount()">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="loan_rate">Loan Rate(%) <span class="red-text">*</span></label>
										<input type="number" class="form-control form-control-sm required" placeholder="Loan Rate" value="<?php echo $loan_rate; ?>" id="loan_rate" name="loan_rate" required onchange="loanamount()">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="loan_period">Loan Period <span class="red-text">*</span></label>
										<select class="form-control form-control-sm required" id="loan_period" name="loan_period" required onchange="loanamount()">
											<option value="">Select Year</option>
											<option value="1" <?= ($loan_period == 1) ? 'selected' : ''; ?>>1 Year</option>
											<option value="2" <?= ($loan_period == 2) ? 'selected' : ''; ?>>2 Year</option>
											<option value="3" <?= ($loan_period == 3) ? 'selected' : ''; ?>>3 Year</option>
											<option value="4" <?= ($loan_period == 4) ? 'selected' : ''; ?>>4 Year</option>
											<option value="5" <?= ($loan_period == 5) ? 'selected' : ''; ?>>5 Year</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="total_paid">Total Paid</label>
										<input type="number" class="form-control form-control-sm" placeholder="Total Paid" value="<?php echo $total_paid; ?>" id="total_paid" name="total_paid" readonly>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="emi_per_month">EMI per month </label>
										<input type="number" class="form-control form-control-sm" placeholder="EMI per month" value="<?php echo $emi_per_month; ?>" id="emi_per_month" name="emi_per_month" readonly>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="agreement_date">Agreement Date <span class="red-text">*</span></label>
										<input type="text" class="form-control form-control-sm required" placeholder="dd-mm-yyyy" value="<?php echo $agreement_date; ?>" id="agreement_date" name="agreement_date" required readonly>

									</div>
								</div>
								<div class="col-md-6">
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
				<div class="card-header white-text primary-color">Vendor Loan Information</div>
				<!--Card content-->
				<div class="card-body">
					<div class="row">
						<div class="col-md-12" id="chargesdetails">
							<table class="table table-striped bg-white table-bordered table-sm">
								<caption class="lead">List of already associated Loan with Vendor </caption>
								<thead class="thead-dark">
									<tr>
										<th scope="col">#</th>
										<th scope="col">Loan ID</th>
										<th scope="col">Vendor Name</th>
										<th scope="col">Loan Tenure</th>
										<th scope="col">Loan Rate %</th>
										<th scope="col">Loan Amount</th>
										<th scope="col">Tota Paid</th>
										<th scope="col">EMI/mo</th>
										<th scope="col">Agreement Date</th>
										<!-- <th scope="col">Status</th> -->
										<th scope="col">Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1;
									if (!empty($records)) {
										?>
										<?php foreach ($records as $record) { ?>
											<tr>
												<th scope="row"><?php echo $i++; ?></th>
												<td><?php echo $record->loan_id; ?></td>
												<td><?php echo $record->vendor_name; ?></td>
												<td><?php echo $record->loan_period; ?> Year's</td>
												<td><?php echo $record->loan_rate; ?></td>
												<td><?php echo $record->loan_amount; ?></td>
												<td><?php echo $record->total_paid; ?></td>
												<td><?php echo $record->emi_per_month; ?></td>
												<td><?php echo $record->agreement_date; ?></td>
												<!-- <td><?= ($record->statusId == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>'; ?></td> -->
												<td class="text-center">
													<a href="#" class="viewVendorLoan" data-id="<?php echo $record->id; ?>">
														<i class="fas fa-eye pink-text" aria-hidden="true"></i>
													</a>&nbsp;
													<a href="<?php echo base_url() . 'editOldVendorLoan/' . $record->id; ?>">
														<i class="fas fa-pencil-alt blue-text" aria-hidden="true"></i>
													</a>
												</td>
											</tr>
										<?php }
										} else { ?>

										<tr>
											<td colspan="8">No records found!</td>
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


<div class="modal fade" id="noClassesModal" tabindex="-1" role="dialog" aria-labelledby="noClassesModal" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalLabel">Loan Details</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="viewloandetails"></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>