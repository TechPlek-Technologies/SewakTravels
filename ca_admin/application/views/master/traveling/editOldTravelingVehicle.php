<?php

$id = '';
$name = '';
$description = '';
$status = '';



if(!empty($vehicle_list))
{
    foreach ($vehicle_list as $uf)
    {
        $id = $uf->id;
        $name = $uf->name;
        $description = $uf->description;
		$status = $uf->statusId;
    }
}


?>

<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>travelingVehiclesListing" data-toggle="tooltip" data-placement="bottom" title="Traveling Vehicle">Traveling Vehicle</a>
            <span>/</span>
            <span>Edit Traveling Vehicle</span>
        </h6>
    </div>
</div>
    <!--Grid row-->
<div class="row">
    <!--Grid column-->
    <div class="col-md-12 mb-4">
    <!--Card-->
        <div class="card">
            <div class="card-header white-text primary-color">Enter Traveling Vehicle Information</div>  
	        <!--Card content-->
	        <div class="card-body">

                    <div class="row">
					<div class="col-md-8">
                <!-- form start -->
                <?php $this->load->helper("form"); ?>
                <form role="form" id="editTravelingVehicle" action="<?php echo base_url() ?>editTravelingVehicle" method="post" role="form">
                        <div class="row">


                        <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="traveling_vehicle">Traveling Vehicles <span class="red-text">*</span></label>
                                    <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                                    <input type="text" class="form-control form-control-sm required" value="<?php echo $name; ?>" id="traveling_vehicle" name="traveling_vehicle">
                                </div>
                                </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="description">Desciprtion</label>
                                    <input type="text" class="form-control form-control-sm" value="<?php echo $description; ?>" id="description" name="description">
                                </div>
                            </div>
							<div class="col-md-4">
                                    <div class="form-group">
                                        <label for="status">Status <span class="red-text">*</span></label>						
										<select class="form-control form-control-sm" id="status" name="status" required>
                                            <option value="">Select</option>

                                            <option value="0" <?php if($status==0) {echo "selected=selected";} ?>>In Active</option>
											<option value="1" <?php if($status==1) {echo "selected=selected";} ?>>Active</option>

                                        </select>										
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