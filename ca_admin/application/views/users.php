<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0 mt-1">
            <a href="<?php echo base_url(); ?>dashboard" data-toggle="tooltip" data-placement="bottom" title="Dashboard">Dashboard</a>
            <span>/</span>
            <span>User Management</span>
        </h6>
        <a class="btn btn-primary btn-sm m-0" href="<?php echo base_url(); ?>addNew" data-toggle="tooltip" data-placement="bottom" title="Add User">
            <i class="fas fa-plus"></i> Add User
        </a>
    </div>
</div>
<!-- Heading -->
<!--Grid row-->
<div class="row">
    <!--Grid column-->
    <div class="col-md-12">
        <!--Card-->
        <div class="card">
            <div class="card-header white-text primary-color">User's List</div>
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
                    <?php }
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
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone number</th>
                                <th>Authority</th>
                                <th>Transactions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($userRecords)) {
                                $i = 0;
                                foreach ($userRecords as $record) {
                                    ?>
                                    <tr>
                                        <td><?php echo ++$i; ?></td>
                                        <td><?php echo $record->name; ?></td>
                                        <td><?php echo $record->email; ?></td>
                                        <td><?php echo $record->mobile; ?></td>
                                        <td><?php echo $record->role; ?></td>
                                        <td>
                                            <a class="btn-sm btn-outline-info btn-rounded" href="<?= base_url() . 'log-history/' . $record->userId; ?>" title="Log History" data-toggle="tooltip" data-placement="bottom" title="User Log History">
                                                <i class="fas fa-history"></i>
                                            </a>&nbsp;
                                            <a class="btn-sm btn-outline-primary btn-rounded" href="<?php echo base_url() . 'editOld/' . $record->userId; ?>" title="Edit" data-toggle="tooltip" data-placement="bottom" title="Edit User">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>&nbsp;
                                            <a class="btn-sm btn-outline-danger btn-rounded deleteUser" href="#" data-userid="<?php echo $record->userId; ?>" title="Delete" data-toggle="tooltip" data-placement="bottom" title="Delete User">
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

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>