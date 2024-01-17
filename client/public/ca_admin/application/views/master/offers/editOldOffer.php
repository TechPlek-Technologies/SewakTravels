<?php

$id = '';
$title = '';
$price = '';

if (!empty($offer_list)) {

    foreach ($offer_list as $uf) {
        $id = $uf->id;
        $title = $uf->title;
        $price = $uf->price;
        $offer_image = $uf->offer_image;
    }
}


?>
<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>offerListing">Offers</a>
            <span>/</span>
            <span>Edit Offer</span>
        </h6>
    </div>
</div>
<!-- Heading -->

<!-- form start -->
<?php $this->load->helper("form"); ?>
<form role="form" id="editOffer" action="<?php echo base_url() ?>editOffer" method="post" autocomplete="off" enctype="multipart/form-data">
<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
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
                                        <input type="text" class="form-control form-control-sm required" placeholder="Title" value="<?php echo $title; ?>" id="title" name="title">

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="price">Price <span class="red-text">*</span></label>
                                        <input type="text" class="form-control form-control-sm required" placeholder="Price" value="<?php echo $price; ?>" id="price" name="price">

                                    </div>
                                </div>
                                <div class="col-md-6">
									<div class="form-group">
										<label for="file">Offer Image <span class="red-text">*</span> (Size: 150px X 100px and 1.5 ratio)</label>
										<input type="file" name="upl_files0" class="form-control form-control-sm" accept=".jpeg , .jpg ,.png" value="">
									</div>
								</div>
								<div class="col-md-6">
									<img src="<?php echo base_url().'upload/offfer/'.$offer_image ?>" />
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