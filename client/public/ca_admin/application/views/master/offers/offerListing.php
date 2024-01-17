<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0 mt-1">
            <a href="<?php echo base_url(); ?>dashboard" data-toggle="tooltip" data-placement="bottom" title="Dashboard">Dashboard</a>
            <span>/</span>
            <span>Offers</span>
        </h6>
        <div class="col-md-6 text-right">
            <a class="btn btn-info btn-sm m-0" href="<?php echo base_url(); ?>addNewOffer" data-toggle="tooltip" data-placement="bottom" title="Add New Offer">
                <i class="fas fa-plus"></i> Add New Offer
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
            <div class="card-header white-text primary-color">Offers's List</div>
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
                    
                    <!-- Delete offer -->
                    <?php
                    
                    $offer_delete_error = $this->session->flashdata('offer_delete_error');
                    if ($offer_delete_error) {
                    ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $this->session->flashdata('offer_delete_error'); ?>
                        </div>
                    <?php } ?>

                    <?php
                    $offer_delete = $this->session->flashdata('offer_delete');
                    if ($offer_delete) {
                    ?>
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $this->session->flashdata('offer_delete'); ?>
                        </div>
                    <?php } ?>
                    <?php $this->session->unset_userdata('error'); ?>
                    <?php $this->session->unset_userdata('success'); ?>
                    <?php $this->session->unset_userdata('offer_delete_error'); ?>
                    <?php $this->session->unset_userdata('offer_delete'); ?>
                    <!-- Delete offer -->

                    <table width="100%" class="table table-striped table-bordered table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Image</th>
                                <th>Title</th>
								<th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($records)) {
								//pre($records);
                                $i = 0;
                                $image_path = base_url() . 'upload/offfer/';
                                foreach ($records as $record) {
                            ?>
                                    <tr>
                                        <td><?php echo ++$i; ?></td>
                                        <td><img src="<?php echo $image_path . $record->offer_image ?>" height="40px" /></td>
                                        <td><?php echo $record->title ?></td>
										<td><?php echo $record->price ?></td>
                                        <td>
                                            <a class="btn-sm btn-outline-primary btn-rounded" href="<?php echo base_url() . 'editOldOffer/' . $record->id; ?>" data-toggle="tooltip" data-placement="bottom" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>&nbsp;
                                            <a class="btn-sm btn-outline-danger btn-rounded deleteOffer" href="<?php echo base_url() . 'deleteOffer/' . $record->id; ?>" data-id="<?php echo $record->id; ?>" title="Delete" data-toggle="tooltip" data-placement="bottom" title="Delete">
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

