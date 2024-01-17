<?php

$id = '';
$price = '';
$statusId = '';



if(!empty($serviceTaxInfo))
{
    foreach ($serviceTaxInfo as $uf)
    {
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
            <a href="<?php echo base_url(); ?>taxs" data-toggle="tooltip" data-placement="bottom" title="Tax Master">Tax Master</a>
            <span>/</span>
            <span>Edit Service Charge</span>
        </h6>
    </div>
</div>
<!-- Heading -->
    <!--Grid row-->
<div class="row">
    <!--Grid column-->
    <div class="col-md-12 mb-4">
    <!--Card-->
        <div class="card">
            <div class="card-header white-text primary-color">Enter Service Charge Information</div>  
	        <!--Card content-->
	        <div class="card-body">

                    <div class="row">
					<div class="col-md-8">
                <?php $this->load->helper("form"); ?>
                <form role="form" id="editServiceTax" action="<?php echo base_url() ?>editServiceTax" method="post" autocomplete="off">
                        <div class="row">


                        <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tax_type">Tax Type <span class="red-text">*</span></label>
                                        <input type="text" class="form-control form-control-sm" placeholder="0.00" value="Service Charge" id="tax_type" name="tax_type" readonly>
                                    </div>
                                </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Service Charge Rate <span class="red-text">*</span></label>
                                    <input type="hidden" name="serviceTaxId" id="serviceTaxId" value="<?php echo $id; ?>">
                                    <input type="text" class="form-control form-control-sm required" value="<?php echo $price; ?>" id="price" name="price">
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
            if($error)
            {
        ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                        <?php } ?>
                        <?php  
            $success = $this->session->flashdata('success');
            if($success)
            {
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