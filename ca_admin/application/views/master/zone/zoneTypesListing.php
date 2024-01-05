<!-- Heading -->
<div class="card mb-3">
	<!--Card content-->
	<div class="card-body d-sm-flex justify-content-between">
		<h6 class="mb-sm-0 mt-1">
			<a href="<?php echo base_url(); ?>dashboard" data-toggle="tooltip" data-placement="bottom" title="Dashboard">Dashboard</a>
			<span>/</span>
			<span>Zone Type Master</span>
		</h6>
		<div class="text-right">
			<a class="btn btn-primary btn-sm m-0" href="<?php echo base_url(); ?>addNewZone" data-toggle="tooltip" data-placement="bottom" title="Add New Zone">
				<i class="fas fa-plus"></i> Add New Zone
			</a>
			<a class="btn btn-info btn-sm m-0" href="<?php echo base_url(); ?>addNewZoneType" data-toggle="tooltip" data-placement="bottom" title="Add New Zone Type">
				<i class="fas fa-plus"></i> Add New Zone Type
			</a>
			<a class="btn btn-blue btn-sm m-0" href="<?php echo base_url(); ?>addAttachZoneType" data-toggle="tooltip" data-placement="bottom" title="Attach Zone Type">
				<i class="fas fa-plus"></i> Attach Zone Type
			</a>
		</div>
	</div>
</div>
<!-- Heading -->

<!--Grid row-->
<div class="row">
	<!--Grid column-->
	<div class="col-md-12">
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
	</div>
	<div class="col-md-6">
		<!--Card-->
		<div class="card">
			<div class="card-header white-text primary-color">Zone List</div>
			<!--Card content-->
			<div class="card-body">

				<div class="table-responsive text-nowrap">
					<table width="100%" class="table table-striped table-bordered table-hover table-sm">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Description</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if (!empty($zoneRecords)) {
								$i = 0;
								foreach ($zoneRecords as $record) {
									?>
									<tr>
										<td><?php echo ++$i; ?></td>
										<td><?php echo $record->name ?></td>
										<td><?php echo $record->description ?></td>
										<td><?= ($record->statusId == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>'; ?></td>
										<td>
											<a class="btn-sm btn-outline-primary btn-rounded" href="<?php echo base_url() . 'editOldZone/' . $record->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit Zone">
												<i class="fas fa-pencil-alt"></i>
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
		<div class="clearfix">&nbsp;</div>
		<div class="card">
			<div class="card-header white-text primary-color ">Zone Type's List</div>
			<!--Card content-->
			<div class="card-body">
				<div class="table-responsive text-nowrap">
					<table width="100%" class="table table-striped table-bordered table-hover table-sm">
						<thead>
							<tr>
								<th>#</th>
								<th>Type</th>
								<th>Description</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if (!empty($records)) {
								$i = 0;
								foreach ($records as $record) {
									?>
									<tr>
										<td><?php echo ++$i; ?></td>
										<td><?php echo $record->type ?></td>
										<td><?php echo $record->description ?></td>
										<td><?= ($record->statusId == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>'; ?></td>
										<td>
											<a class="btn-sm btn-outline-primary btn-rounded" href="<?php echo base_url() . 'editOldZoneType/' . $record->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit Zone Type">
												<i class="fas fa-pencil-alt"></i>
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

	<div class="col-md-6">
		<!--Card-->
		<div class="card">
			<div class="card-header white-text primary-color">Zone Type attached in zone</div>
			<!--Card content-->
			<div class="card-body">
				<div class="table-responsive text-nowrap">
					<table width="100%" class="table table-striped table-bordered table-hover table-sm">
						<thead>
							<tr>
								<th>#</th>
								<th>Zone Name</th>
								<th>Zone Type</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if (!empty($zoneAttachRecords)) {
								$i = 0;
								foreach ($zoneAttachRecords as $record) {
									?>
									<tr>
										<td><?php echo ++$i; ?></td>
										<td><?php echo $record->zone_name ?></td>
										<td><?php echo $record->zone_type ?></td>
										<td>
											<a class="btn-sm btn-outline-primary btn-rounded" href="<?php echo base_url() . 'editAttachZoneTypes/' . $record->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit Zone Type">
												<i class="fas fa-pencil-alt"></i>
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

	<div class="col-md-12">
		<!--Card-->

	</div>
</div>