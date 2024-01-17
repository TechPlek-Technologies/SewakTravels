<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>zoneTypesListing" data-toggle="tooltip" data-placement="bottom" title="Zone Master">Zone Master</a>
            <span>/</span>
            <span>Add New Zone Type</span>
        </h6>
    </div>
</div>
<!-- Heading -->
<div class="row">
    <!--Grid column-->
    <div class="col-md-12 mb-4">
    <!--Card-->
        <div class="card">
            <div class="card-header white-text primary-color">Enter Zone Type Information</div>  
	        <!--Card content-->
	        <div class="card-body">

                    <div class="row">
					<div class="col-md-7">
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addNewZoneType" action="<?php echo base_url() ?>addNewZoneTypes" method="post" autocomplete="off">
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="zone_type">Zone Type <span class="red-text">*</span></label>
                                        <input type="text" class="form-control form-control-sm required" placeholder="Zone Type: i.e. A/B/C/D" value="<?php echo set_value('zone_type'); ?>" id="zone_type" name="zone_type">
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description">Description <span class="red-text">*</span></label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Zone Description" value="<?php echo set_value('description'); ?>" id="description" name="description">
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