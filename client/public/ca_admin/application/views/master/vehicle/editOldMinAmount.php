<?php

$id = '';
$price = '';
$statusId = '';

if (!empty($info)) {
    foreach ($info as $uf) {
        $id = $uf->id;
        $price = $uf->price;
        $statusId = $uf->statusId;
    }
}
?>
<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>cabListing" data-toggle="tooltip" data-placement="bottom" title="Cab/Vehicle Details">Cab/Vehicle Details</a>
            <span>/</span>
            <span>Edit Minimum Amount</span>
        </h6>
    </div>
</div>
<!-- Heading -->
<!--Grid row-->
<div class="row">
    <!--Grid column-->
    <div class="col-md-12">
        <!--Card-->
        <div class="card">
            <div class="card-header white-text primary-color">Enter Amount Information</div>
            <!--Card content-->
            <div class="card-body">

                <div class="row">
                    <div class="col-md-8">
                        <?php $this->load->helper("form"); ?>
                        <form role="form" id="editMinAmount" action="<?php echo base_url() ?>editMinAmount" method="post" autocomplete="off">
                            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="price">Minimum Amount (%)</label>
                                        <input type="number" class="form-control form-control-sm required" value="<?php echo $price; ?>" id="price" name="price" min="10" max="100" placeholder="100">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-footer text-center">
                                        <input type="submit" class="btn btn-primary" value="Submit" />
                                        <input type="reset" class="btn btn-default" value="Reset" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
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

                        <div class="row">
                            <div class="col-md-12">
                                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>