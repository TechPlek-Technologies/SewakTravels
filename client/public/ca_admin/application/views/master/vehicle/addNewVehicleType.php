<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>vehicleTypes" data-toggle="tooltip" data-placement="bottom" title="Vehicle Type Master">Vehicle Type Master</a>
            <span>/</span>
            <span>Add New Vehicle Type</span>
        </h6>
    </div>
</div>
<!-- Heading -->
<div class="row">
    <!--Grid column-->
    <div class="col-md-12 mb-4">
    <!--Card-->
        <div class="card">
            <div class="card-header white-text primary-color">Enter Vehicle Type Information</div>  
	        <!--Card content-->
	        <div class="card-body">

                    <div class="row">
					<div class="col-md-7">
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addNewVehicleType" action="<?php echo base_url() ?>addNewVehicleTypes" method="post" autocomplete="off">
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="vehicle_type">Vehicle Type <span class="red-text">*</span></label>
                                        <input type="text" class="form-control form-control-sm required" placeholder="Vehicle Type: i.e. Small/Big" value="<?php echo set_value('vehicle_type'); ?>" id="vehicle_type" name="vehicle_type">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description">Vehicle Description</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Vehicle Description" value="<?php echo set_value('description'); ?>" id="description" name="description">
                                    </div>
                                </div>
                                
                            </div>
                            <!-- /.box-body -->

                            <div class="card-footer text-center">
                                <input type="submit" class="btn btn-primary" value="Submit" />
                                <input type="reset" class="btn btn-default" value="Reset" />
                            </div>
                    </form>
                </div>
                <div class="col-md-5">
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