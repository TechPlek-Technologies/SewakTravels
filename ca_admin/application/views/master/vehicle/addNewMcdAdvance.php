<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>advanceListing">Advance List</a>
            <span>/</span>
            <span>Add New MCD Advance</span>
        </h6>
    </div>
</div>
<!-- Heading -->

    <!--Grid row-->
<div class="row">
    <!--Grid column-->
    <div class="col-md-12 mb-4">
	<!-- form start -->
    <?php $this->load->helper("form"); ?>
     <form role="form" id="addNewMcdAdvances" action="<?php echo base_url() ?>addNewMcdAdvances" method="post" autocomplete="off">
	 <input type="hidden" id="vendor_id" name="vendor_id">
	 <input type="hidden" id="vendor_vehicle_id" name="vendor_vehicle_id">		
		<div class="card">
            <div class="card-header white-text primary-color">Enter Advance Toll TAX Information</div>  
	        <!--Card content-->
	        <div class="card-body">
                <div class="row">
					<div class="col-md-12">
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
                        <?php }
                        $success = $this->session->flashdata('success');
                        if($success){ ?>
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
					<div class="col-md-12">                    
                        <div class="row">								                               
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="advance_date">Date <span class="red-text">*</span></label>
                                    <input type="text" class="form-control form-control-sm" placeholder="dd/mm/yyyy" value="<?php echo date('d-m-Y'); ?>" id="advance_date" name="advance_date" required>								
                                </div>
                            </div> 
							<div class="col-md-2">
                                <div class="form-group">
                                    <label for="vehicle_id">Vehicle Number <span class="red-text">*</span></label>
                                    <input type="text" class="form-control form-control-sm required autocomplete_advance" placeholder="Vehicle Number" value="<?php echo set_value('vehicle_id'); ?>" id="vehicle_id" name="vehicle_id" required>
                                    
                                </div>
                            </div>
							<div class="col-md-2">
                                <div class="form-group">
                                    <label for="amount">Toll Tax Amount <span class="red-text">*</span></label>
                                    <input type="text" class="form-control form-control-sm required" placeholder="Amount" value="<?php echo set_value('amount'); ?>" id="amount" name="amount" required>
                                    
                                </div>
                            </div>
							<div class="col-md-4">
                                <div class="form-group">
                                    <label for="description">Description <span class="red-text">*</span></label>
                                    <input type="text" class="form-control form-control-sm required" placeholder="Description" value="<?php echo set_value('description'); ?>" id="description" name="description" required>
                                    
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer text-center">
        <input type="submit" class="btn btn-primary" value="Submit" />
        <input type="reset" class="btn btn-default" value="Reset" />
    </div>
		</form>
	</div>
</div>