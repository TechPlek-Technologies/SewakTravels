<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0 mt-1">
            <a href="<?php echo base_url(); ?>dashboard" data-toggle="tooltip" data-placement="bottom" title="Dashboard">Dashboard</a>
            <span>/</span>
            <span>Cab Rate Master</span>
        </h6>
        <a class="btn btn-primary btn-sm m-0" href="<?php echo base_url(); ?>addNewCabCompany" data-toggle="tooltip" data-placement="bottom" title="Add New Cab Rate">
            <i class="fas fa-plus"></i> Add New Cab Rate
        </a>
    </div>
</div>
<!-- Heading -->
<!--Grid row-->
<div class="row">
    <!--Grid column-->
    <div class="col-md-12 mb-4">
        <!--Card-->
        <div class="card">
            <div class="card-header white-text primary-color">Cab Rate List</div>
            <!--Card content-->
            <div class="card-body">
                <div class="table-responsive text-nowrap ">
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

                    <table width="100%" class="table table-striped table-bordered table-hover table-sm" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Vendor Name</th>
                                <th>Mobile</th>
                                <th>Company Name</th>
                                <th>Status</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($companyRecords)) {
                                $i = 0;
                                foreach ($companyRecords as $record) {
                                    ?>
                                    <tr>
                                        <td><?php echo ++$i; ?></td>
                                        <td><?php echo ucwords(strtolower($record->salutation . ' ' . $record->name)); ?></td>
                                        <td><?php echo $record->mobile; ?></td>
                                        <td><?php echo ucwords(strtolower($record->company_name)); ?></td>
                                        <td><?= ($record->statusId == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>'; ?></td>
                                        <td>
                                            <a class="btn-sm btn-outline-primary btn-rounded" href="<?php echo base_url() . 'viewCabCompany/' . $record->vendor_id; ?>" data-toggle="tooltip" data-placement="bottom" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>&nbsp;
                                            <!-- editOldCabCompany -->
                                            <a class="btn-sm btn-outline-info btn-rounded" href="<?php echo base_url() . 'editCabCompanyRate/' . $record->id . '/' . $record->vendor_id . '/' . $record->company_id; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit">
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