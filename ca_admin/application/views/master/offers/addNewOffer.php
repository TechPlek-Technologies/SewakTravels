<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>cabListing">Offers List</a>
            <span>/</span>
            <span>Add New Offer</span>
        </h6>
    </div>
</div>
<!-- Heading -->

<!-- form start -->
<?php $this->load->helper("form"); ?>
<form role="form" id="addNewOffers" action="<?php echo base_url() ?>addNewOffers" method="post" autocomplete="off" enctype="multipart/form-data" name="addNewOffers">
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
        <div class="col-md-12">
            <!--Card-->
            <div class="card">
                <div class="card-header white-text primary-color">Enter New Offer Information</div>
                <!--Card content-->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">                          
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="title">Title <span class="red-text">*</span></label>
                                        <input type="text" class="form-control form-control-sm required" placeholder="Title" value="<?php echo set_value('title'); ?>" id="title" name="title">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                     <div class="form-group">
                                        <label for="price">Price <span class="red-text">*</span></label>
                                        <input type="price" class="form-control form-control-sm required" placeholder="Price" value="<?php echo set_value('price'); ?>" id="price" name="price">
                                    </div>
                                </div>
                                <div class="col-md-12">
									<div class="form-group">
										<label for="upl_files0">Offer Image <span class="red-text">*</span> (Size: 150px X 100px and 1.5 ratio)</label>
										<input type="file" name="upl_files0" class="form-control form-control-sm" accept=".jpeg , .jpg ,.png">
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
                <input type="submit" class="btn btn-primary btn-sm" value="Submit" />
                <input type="reset" class="btn btn-default btn-sm" value="Reset" />
            </div>
        </div>
    </div>
</form>