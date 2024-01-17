<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0 mt-1">
            <a href="<?php echo base_url(); ?>dashboard" data-toggle="tooltip" data-placement="bottom" title="Dashboard">Dashboard</a>
            <span>/</span>
            <span>Coupon Master</span>
        </h6>
        <div class="col-md-8 text-right">
            <a class="btn btn-primary btn-sm m-0" href="<?php echo base_url(); ?>addNewCoupon" data-toggle="tooltip" data-placement="bottom" title="Add Coupon">
                <i class="fas fa-plus"></i> Add Coupon
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
            <div class="card-header white-text primary-color">Coupon List</div>
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
                    <table width="100%" class="table table-striped table-bordered table-hover table-sm" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Coupon Name</th>
                                <th>Coupon Code</th>
                                <th>Description</th>
								<th>Type</th>
                                <th>Amount</th>
								<th>Redeem</th>
								<th>Start Date</th>
								<th>Expiry Date</th>
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
                                        <td><?php echo $record->name; ?></td>
                                        <td><?php echo $record->coupon_code; ?></td>
                                        <td><?php echo $record->coupon_desc; ?></td>
                                        <td><?php echo $record->coupon_type; ?></td>
										<td><?php echo $record->coupon_amount; ?></td>
										<td><?php echo $record->redeem; ?></td>
										<td><?php echo $record->coupon_start_date; ?></td>
										<td><?php echo $record->coupon_exp_date; ?></td>
                                        <td><?= ($record->statusId == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">In-Active</span>'; ?></td>
                                        <td>
                                            <a class="btn-sm btn-outline-primary btn-rounded" href="<?php echo base_url() . 'editOldCoupon/' . $record->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>&nbsp;
                                            <a class="btn-sm btn-outline-danger btn-rounded deleteCoupon" href="#" data-id="<?php echo $record->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Delete">
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