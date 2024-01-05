<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>dashboard">Dashboard</a>
            <span>/</span>
            <span>Edit <?php echo $records[0]->heading; ?> Page</span>
        </h6>
    </div>
</div>
<!-- Heading -->

<!-- form start -->
<?php $this->load->helper("form"); ?>
<form role="form" id="editPages" action="<?php echo base_url() ?>editPages" method="post" autocomplete="off">
<input type="hidden" class="form-control form-control-sm" value="<?php echo $records[0]->page_type; ?>" id="page_type" name="page_type" required>
    <div class="row">
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
            <?php }
            $success = $this->session->flashdata('success');
            if ($success) { ?>
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
        <!--Grid column-->
        <div class="col-md-12 mb-3">
            <!--Card-->
            <div class="card">
                <div class="card-header white-text primary-color">Privacy Policy</div>
                <!--Card content-->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="heading">Heading<span class="red-text">*</span></label>
                                        <input type="text" class="form-control form-control-sm" placeholder="" value="<?php echo $records[0]->heading; ?>" id="heading" name="heading" required>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Description (City) <span class="red-text">*</span></label>
										
										<?php echo $this->ckeditor->editor("banner_description",$records[0]->description); ?>
										
										
                                        <!-- <textarea class="form-control form-control-sm" id="banner_description" name="description" rows="20" required><?php echo $records[0]->description; ?></textarea> --.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card-footer text-center">
                <input type="submit" class="btn btn-primary" value="Submit" />
                <input type="reset" class="btn btn-default" value="Reset" />
            </div>
        </div>
    </div>
</form>