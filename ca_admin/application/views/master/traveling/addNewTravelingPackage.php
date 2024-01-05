<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>travelingPackagesListing" data-toggle="tooltip" data-placement="bottom" title="Traveling Package">Traveling Package</a>
            <span>/</span>
            <span>Add New Traveling Package</span>
        </h6>
    </div>
</div>
<!-- Heading -->
<div class="row">
    <!--Grid column-->
    <div class="col-md-12 mb-4">
    <!--Card-->
        <div class="card">
            <div class="card-header white-text primary-color">Enter Traveling Package Information</div>  
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
					<div class="col-md-12">
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addNewTravelingPackages" action="<?php echo base_url() ?>addNewTravelingPackages" method="post" autocomplete="off">
                            <div class="row">
								<div class="col-md-2">
                                    <div class="form-group">
                                        <label for="traveling_type_id">Traveling Type <span class="red-text">*</span></label>						
										<select class="form-control form-control-sm" id="traveling_type_id" name="traveling_type_id" required>
                                            <option value="">Select</option>
                                            <?php
                                            if(!empty($traveling_type))
                                            {
                                                foreach ($traveling_type as $rl)
                                                {
                                                    ?>
                                                <option value="<?php echo $rl->id ?>" <?php if($rl->id == set_value('traveling_type_id')) {echo "selected=selected";} ?>>
                                                    <?php echo $rl->name ?>
                                                </option>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </select>										
                                    </div>
                                </div>
								<div class="col-md-4">
                                    <div class="form-group">
                                        <label for="traveling_vehicle_id">Traveling Vehicle <span class="red-text">*</span></label>						
										<select class="form-control form-control-sm" id="traveling_vehicle_id" name="traveling_vehicle_id" required>
                                            <option value="">Select</option>
                                            <?php
                                            if(!empty($traveling_vehicle))
                                            {
                                                foreach ($traveling_vehicle as $rl)
                                                {
                                                    ?>
                                                <option value="<?php echo $rl->id ?>" <?php if($rl->id == set_value('traveling_vehicle_id')) {echo "selected=selected";} ?>>
                                                    <?php echo $rl->name ?>
                                                </option>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </select>										
                                    </div>
                                </div>
								<div class="col-md-3">
                                    <div class="form-group">
                                        <label for="name">Package Name<span class="red-text">*</span></label>
                                        <input type="text" class="form-control form-control-sm required" placeholder="i.e. 8Hrs 80Km" value="<?php echo set_value('name'); ?>" id="name" name="name" required>
                                    </div>
                                </div>                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="description">Package Description</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="Package Description" value="<?php echo set_value('description'); ?>" id="description" name="description">
                                    </div>
                                </div>                                
                            </div>
							<div class="row">
								<div class="col-md-2">
                                    <div class="form-group">
                                        <label for="rate">Flat Rate</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="0" value="<?php echo set_value('rate'); ?>" id="rate" name="rate">
                                    </div>
                                </div>
								<div class="col-md-2">
                                    <div class="form-group">
                                        <label for="extra_km_rate">Extra Rate Per Km</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="0" value="<?php echo set_value('extra_km_rate'); ?>" id="extra_km_rate" name="extra_km_rate">
                                    </div>
                                </div>
								<div class="col-md-2">
                                    <div class="form-group">
                                        <label for="extra_hour_rate">Extra Rate Per Hour</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="0" value="<?php echo set_value('extra_hour_rate'); ?>" id="extra_hour_rate" name="extra_hour_rate">
                                    </div>
                                </div>
								<div class="col-md-3">
                                    <div class="form-group">
                                        <label for="driver_allowance">Driver Allowance</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="0" value="<?php echo set_value('driver_allowance'); ?>" id="driver_allowance" name="driver_allowance">
                                    </div>
                                </div>
								<div class="col-md-3">
                                    <div class="form-group">
                                        <label for="toll_parking_tax">Toll, Parking & Tax</label>
                                        <input type="text" class="form-control form-control-sm" placeholder="0" value="<?php echo set_value('toll_parking_tax'); ?>" id="toll_parking_tax" name="toll_parking_tax">
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
                
				</div>				
			</div>
		</div>
	</div>
</div>