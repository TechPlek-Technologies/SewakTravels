<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0 mt-1">
            <a href="<?php echo base_url(); ?>dashboard" data-toggle="tooltip" data-placement="bottom" title="Dashboard">Dashboard</a>
            <span>/</span>
            <span>Cab/Vehicle Master</span>
        </h6>
        <div class="col-md-6 text-right">
            <a class="btn btn-info btn-sm m-0" href="<?php echo base_url(); ?>addMinAmount" data-toggle="tooltip" data-placement="bottom" title="Take Minimum Amount">
                <i class="fas fa-plus"></i> Take Minimum Amount
            </a>
            <a class="btn btn-primary btn-sm m-0" href="<?php echo base_url(); ?>addNewCab" data-toggle="tooltip" data-placement="bottom" title="Add New Cab/Vehicle">
                <i class="fas fa-plus"></i> Add New Cab/Vehicle
            </a>
        </div>
    </div>
</div>
<!-- Heading -->

<!--Grid row-->
<div class="row">
    <!--Grid column-->
    <div class="col-md-12 mb-3">
        <!--Card-->
        <div class="card">
            <div class="card-header white-text primary-color">Cab/Vehicle's List</div>
            <!--Card content-->
            <div class="card-body">
                <div class="table-responsive text-nowrap">
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

                    <table width="100%" class="table table-striped table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Vehicle Image</th>
                                <th>Name</th>
								<th>Description</th>
                                <th>Passengers</th>
                                <th>Luggage</th>
								<th>Start Fee</th>
								<th>Fee /person</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($records)) {
								//pre($records);
                                $i = 0;
                                $image_path = base_url() . 'upload/vehicle/images/';
                                foreach ($records as $record) {
                            ?>
                                    <tr>
                                        <td><?php echo ++$i; ?></td>
                                        <td><img src="<?php echo $image_path . $record->vehicle_image ?>" height="40px" /></td>
                                        <td><?php echo $record->name ?></td>
										<td><?php echo $record->description ?></td>
                                        <td><?php echo $record->passengers ?></td>
                                        <td><?php echo $record->luggage ?></td>
										<td><?php echo $record->start_fee ?></td>
										<td><?php echo $record->fee_per_person ?></td>
                                        <td><?= ($record->statusId == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>'; ?></td>
                                        <td>
                                            <a class="btn-sm btn-outline-primary btn-rounded" href="<?php echo base_url() . 'editOldCab/' . $record->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>&nbsp;
                                            <a class="btn-sm btn-outline-danger btn-rounded deleteCab" href="#" data-id="<?php echo $record->id; ?>" title="Delete" data-toggle="tooltip" data-placement="bottom" title="Delete">
                                                <i class="fas fa-trash"></i>
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

    <div class="col-md-12 mb-4">
        <!--Card-->
        <div class="card">
            <div class="card-header white-text primary-color">Minimum Take Amount</div>
            <!--Card content-->
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table width="100%" class="table table-striped table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($minamountrecords)) {
                                $i = 0;
                                foreach ($minamountrecords as $record) {
                            ?>
                                    <tr>
                                        <td><?php echo ++$i; ?></td>
                                        <td><?php echo $record->price ?></td>
                                        <td><?= ($record->statusId == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>'; ?></td>
                                        <td>
                                            <a class="btn-sm btn-outline-primary btn-rounded" href="<?php echo base_url() . 'editOldMinAmount/' . $record->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit">
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
</div>