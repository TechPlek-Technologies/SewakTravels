<!-- Heading -->
<div class="card mb-3">
	<!--Card content-->
	<div class="card-body d-sm-flex justify-content-between">
		<h6 class="mb-sm-0">
			<a href="<?php echo base_url(); ?>dashboard">Dashboard</a>
			<span>/</span>
			<span>Report's Master</span>
		</h6>
	</div>
</div>
<!-- Heading -->
<!--Grid row-->
<div class="row">
	<!--Grid column-->
	<div class="col-md-12 mb-4">
		<!--Card-->
		<div class="card">
			<div class="card-header white-text primary-color">Vehicle Reports List</div>
			<!--Card content-->
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">

						<div class="table-responsive text-nowrap">

							<table width="100%" class="table table-striped table-bordered table-hover table-sm" id="dataTables-example">
								<thead>
									<tr>
										<th>Id</th>
										<th>Vehicle No.</th>
										<th>Vendor Name</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									if (!empty($vehicleReport)) {
										$i = 0;
										foreach ($vehicleReport as $record) {
											?>
											<tr>
												<td><?php echo ++$i; ?></td>
												<td><?php echo $record->vehicle_no; ?></td>
												<td><?php echo ucfirst(strtolower($record->vendor_name)); ?></td>
												<td><?php echo '<span class="badge badge-success">Active</span>'; ?></td>
												<td>
													<a class="btn-sm btn-outline-primary btn-rounded material-tooltip-main" href="<?php echo base_url() . 'viewVehicleReport/' . $record->id; ?>" data-toggle="tooltip" data-placement="bottom" title="View Full Details">
														<i class="fas fa-eye"></i>
													</a>&nbsp;

													<a class="btn-sm btn-outline-primary btn-rounded" href="<?php echo base_url() . 'editOldCabRoster/' . $record->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit Billing">
														<i class="fas fa-eye"></i>
													</a>&nbsp;
													<a class="btn-sm btn-outline-primary btn-rounded deletecabRoster" href="#" data-id="<?php echo $record->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Delete Billing">
														<i class="fas fa-eye"></i>
													</a>
												</td>
											</tr>
									<?php
										}
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>