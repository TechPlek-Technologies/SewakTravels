<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between ">
        <h6 class="mb-sm-0 mt-1">
            <a href="<?php echo base_url(); ?>dashboard">Dashboard</a>
            <span>/</span>
            <span>Guard Master</span>
        </h6>
        <div class="col-md-5 ">
            <a class="btn btn-info btn-sm m-0" href="<?php echo base_url(); ?>addNewGuardPrice">
                <i class="fas fa-plus"></i> Add Guard Price
            </a>
            <a class="btn btn-primary btn-sm m-0" href="<?php echo base_url(); ?>addNewGuard">
                <i class="fas fa-plus"></i> Add New Guard
            </a>
        </div>
    </div>
</div>
<!-- Heading -->
<!--Grid row-->
<div class="row">
    <!--Grid column-->
    <div class="col-md-12 mb-4">
        <!--Card-->
        <div class="card">

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
            <div class="card-header white-text primary-color">Guard Price</div>
            <!--Card content-->
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table width="100%" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Gender</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($guardPriceRecords)) {
                                $i = 0;
                                foreach ($guardPriceRecords as $record) {
                                    ?>
                                    <tr>
                                        <td><?php echo ++$i; ?></td>
                                        <td><?php echo $record->gender; ?></td>
                                        <td><?php echo $record->price; ?></td>
                                        <td>
                                            <a class="btn btn-sm btn-info" href="<?php echo base_url() . 'editOldGuardPrice/' . $record->id; ?>" title="Edit">
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
            <div class="card-header white-text primary-color">Guard List</div>
            <!--Card content-->
            <div class="card-body">
                <div class="table-responsive text-nowrap">


                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Salutation</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Company Name</th>
                                <th>Date of Birth</th>
                                <th>PAN</th>
                                <th>Pincode</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($guardRecords)) {
                                $i = 0;
                                foreach ($guardRecords as $record) {
                                    ?>
                                    <tr>
                                        <td><?php echo ++$i; ?></td>
                                        <td><?php echo $record->salutation; ?></td>
                                        <td><?php echo $record->name; ?></td>
                                        <td><?php echo $record->email; ?></td>
                                        <td><?php echo $record->mobile; ?></td>
                                        <td><?php echo $record->company_name; ?></td>
                                        <td><?php echo $record->dob; ?></td>
                                        <td><?php echo $record->pan; ?></td>
                                        <td><?php echo $record->pincode; ?></td>
                                        <td><?php echo $record->address; ?></td>
                                        <td><?php echo $record->city; ?></td>
                                        <td><?= ($record->statusId == 1) ? 'Active' : 'In-Active'; ?></td>
                                        <td><?php echo $record->statename; ?></td>

                                        <td>
                                            <a class="btn btn-sm btn-info" href="<?php echo base_url() . 'editOldGuard/' . $record->id; ?>" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-sm btn-danger deleteUser" href="<?php echo base_url() . 'deleteGuard/' . $record->id; ?>" data-userid="<?php echo $record->id; ?>" title="Delete">
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
</div>