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
<form id="addNewVendorLoans" action="<?php echo base_url() ?>addNewVendorLoans" method="post" role="form" autocomplete="off">
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

									<input type="hidden" id="vendor_id" name="vendor_id" class="form-control form-control-sm" />
									<input type="hidden" id="vehicle_id" name="vehicle_id" class="form-control form-control-sm" />


									<div class="form-group">
										<label for="vehicle_no">Vehicle No. <span class="red-text">*</span></label>
										<input type="text" id="vehicle_no" name="vehicle_no" class="form-control form-control-sm required autocompletevehicleloan_no" placeholder="Vehicle No." data-bind="content" />
									</div>
								</div>


								<div class="col-md-6">
									<div class="form-group">
										<label for="loan_amount">Loan Amount <span class="red-text">*</span></label>
										<input type="number" class="form-control form-control-sm required" placeholder="Loan Amount" value="0" id="loan_amount" name="loan_amount" required onkeyup="loanamount()">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="loan_rate">Loan Rate(%) <span class="red-text">*</span></label>
										<input type="number" class="form-control form-control-sm required" placeholder="Loan Rate" value="10" id="loan_rate" name="loan_rate" required onchange="loanamount()">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="loan_period">Loan Period <span class="red-text">*</span></label>
										<select class="form-control form-control-sm required" id="loan_period" name="loan_period" required onchange="loanamount()">
											<option value="">Select Year</option>
											<option value="1">1 Year</option>
											<option value="2">2 Year</option>
											<option value="3">3 Year</option>
											<option value="4">4 Year</option>
											<option value="5">5 Year</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="total_paid">Total Paid</label>
										<input type="number" class="form-control form-control-sm" placeholder="Total Paid" value="0" id="total_paid" name="total_paid" readonly>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="emi_per_month">EMI per month </label>
										<input type="number" class="form-control form-control-sm" placeholder="EMI per month" value="0" id="emi_per_month" name="emi_per_month" readonly>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="agreement_date">Agreement Date <span class="red-text">*</span></label>
										<input type="text" class="form-control form-control-sm required" placeholder="dd-mm-yyyy" value="<?php echo date("d-m-Y"); ?>" id="agreement_date" name="agreement_date" required>

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
				<div class="card-header white-text primary-color">Loan Information</div>
				<!--Card content-->
				<div class="card-body">
					<div class="row">
						<div class="col-md-12" id="loandetails">
							No records found!
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