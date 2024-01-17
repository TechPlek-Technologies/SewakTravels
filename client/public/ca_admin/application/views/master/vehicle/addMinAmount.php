<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>cabListing" data-toggle="tooltip" data-placement="bottom" title="Cab/Vehicle">Cab/Vehicle Details</a>
            <span>/</span>
            <span>Add Minimum Amount</span>
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
                        <!-- form start -->
                        <?php $this->load->helper("form"); ?>
                        <form role="form" id="addMinAmounts" action="<?php echo base_url() ?>addMinAmounts" method="post" autocomplete="off">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="price">Minimum Amount (%)</label>
                                        <input type="number" class="form-control form-control-sm required" placeholder="100" value="100" id="price" name="price" min="10" max="100">
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" value="Submit" />
                                <input type="reset" class="btn btn-default" value="Reset" />
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