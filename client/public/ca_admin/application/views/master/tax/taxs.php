<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0 mt-1">
            <a href="<?php echo base_url(); ?>dashboard" data-toggle="tooltip" data-placement="bottom" title="Dashboard">Dashboard</a>
            <span>/</span>
            <span>Tax Master</span>
        </h6>
        <div class="col-md-5 text-right">
            <?php if (empty($serviceTaxRecords)) { ?><a class="btn btn-info btn-sm m-0" href="<?php echo base_url(); ?>addNewServiceTax" data-toggle="tooltip" data-placement="bottom" title="Add New Service Charge">
                    <i class="fas fa-plus"></i> Add New Service Charge
                </a> <?php } ?>
            <a class="btn btn-primary btn-sm m-0" href="<?php echo base_url(); ?>addNewTax" data-toggle="tooltip" data-placement="bottom" title="Add New Tax">
                <i class="fas fa-plus"></i> Add New Tax
            </a>
        </div>
    </div>
</div>
<!-- Heading -->
<!--Grid row-->
<div class="row">
    <!--Grid column-->
    <div class="col-md-12">
        <!--Card-->
        <div class="card mb-3">
            <div class="card-header white-text primary-color">Tax List</div>
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
                                <th>State Name</th>
                                <th>Price Monthly</th>
                                <th>Price (Per Trip)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($taxRecords)) {
                                $i = 0;
                                foreach ($taxRecords as $record) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo ++$i; ?>
                                        </td>
                                        <td>
                                            <?php echo $record->state ?>
                                        </td>
                                        <td>
                                            <?php echo $record->price ?>
                                        </td>
                                        <td>
                                            <?php echo $record->price_per_trip ?>
                                        </td>
                                        <td>
                                            <a class="btn-sm btn-outline-primary btn-rounded" href="<?php echo base_url() . 'editOldTax/' . $record->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <!-- <a class="btn btn-sm btn-danger deleteUser" href="<?php echo base_url() . 'deleteTax/' . $record->id; ?>" data-userid="<?php echo $record->id; ?>"
                                        title="Delete">
                                        <i class="fas fa-trash"></i>
                                      </a> -->
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

        <div class="card">
            <div class="card-header white-text primary-color">Service Charge List</div>
            <!--Card content-->
            <div class="card-body">
                <div class="table-responsive text-nowrap">


                    <table width="100%" class="table table-striped table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Type</th>
                                <th>Rate(%)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($serviceTaxRecords)) {
                                $i = 0;
                                foreach ($serviceTaxRecords as $record) {
                                    ?>
                                    <tr>
                                        <td><?php echo ++$i; ?></td>
                                        <td>Service Charge</td>
                                        <td><?php echo $record->price; ?></td>
                                        <td>
                                            <a class="btn-sm btn-outline-primary btn-rounded" href="<?php echo base_url() . 'editOldServiceTax/' . $record->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <!-- <a class="btn btn-sm btn-danger" href="<?php echo base_url() . 'deleteServiceTax/' . $record->id; ?>" data-userid="<?php echo $record->id; ?>"
                                        title="Delete">
                                        <i class="fas fa-trash"></i>
                                      </a> -->
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