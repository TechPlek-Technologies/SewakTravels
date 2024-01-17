<?php

$id = '';
$gender = '';
$price = '';
$statusId = '';


if(!empty($guardPriceInfo))
{
    foreach ($guardPriceInfo as $uf)
    {
        $id = $uf->id;
		$gender = $uf->gender;
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
            <a href="<?php echo base_url(); ?>guardListing">Guard Price Master</a>
            <span>/</span>
            <span>Edit Guard Price</span>
        </h6>
    </div>
</div>
    <!--Grid row-->
<div class="row">
    <!--Grid column-->
    <div class="col-md-12 mb-4">
    <!--Card-->
        <div class="card">
            <div class="card-header white-text primary-color">Enter Guard Price Information</div>  
	        <!--Card content-->
	        <div class="card-body">

                    <div class="row">
					<div class="col-md-8">
                <!-- form start -->
                <?php $this->load->helper("form"); ?>
                <form role="form" id="addNewGuardPrice" action="<?php echo base_url() ?>editGuardPrice" method="post" role="form">
				<input type="hidden" name="guardPriceId" id="guardPriceId" value="<?php echo $id; ?>">
                            <div class="row">
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="gender">Gender <span class="red-text">*</span></label>
										<select class="form-control form-control-sm required" id="gender" name="gender">
                                            <option value="">Select Salutaion</option>      <option value="Male" <?=($gender == 'Male')?'selected':''?>>Male</option>
											<option value="Female" <?=($gender == 'Female')?'selected':''?>>Female</option>        
                                        </select>
										
                                    </div>
                                </div>                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price">Price <span class="red-text">*</span></label>
										<input type="text" class="form-control form-control-sm required" placeholder="Price" value="<?php echo $price; ?>" id="price" name="price">								
                                    </div>
                                </div>                                
                            </div>
                            <!-- /.box-body -->
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