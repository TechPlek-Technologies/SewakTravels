<?php

$id = '';
$amount = '';
$rate = '';
$advance_date = '';
$vehicle_no = '';
$description = '';
$statusId = '';

if(!empty($advance_list))
{
    foreach ($advance_list as $uf)
    {
        $id = $uf->id;
        $amount = $uf->amount;
        $rate = $uf->rate;
		$advance_date = $uf->advance_date;
        $vehicle_no = $uf->vehicle_no;
        $description = $uf->description;
		$statusId = $uf->statusId;
    }
}


?>

<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>advanceListing">Advance List</a>
            <span>/</span>
            <span>Add New Advance</span>
        </h6>
    </div>
</div>
<!-- Heading -->

    <!--Grid row-->
<div class="row">
    <!--Grid column-->
    <div class="col-md-12">
	<!-- form start -->
    <?php $this->load->helper("form"); ?>
     <form role="form" id="editAdvance" action="<?php echo base_url() ?>editAdvance" method="post" autocomplete="off">
	 <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
    <!--Card-->
        <div class="card">
            <div class="card-header white-text primary-color">Edit Advance Information</div>  
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
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="rate">Rate <span class="red-text">*</span></label>
                                    <input type="text" class="form-control form-control-sm required" placeholder="Rate" value="<?php echo $rate; ?>" id="rate" name="rate" readonly>
                                    
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="vehicle_id">Vehicle Number <span class="red-text">*</span></label>
                                    <input type="text" class="form-control form-control-sm required" placeholder="Vehicle Number" value="<?php echo $vehicle_no; ?>" id="vehicle_id" name="vehicle_id" readonly>
                                    
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="advance_date">Date <span class="red-text">*</span></label>
                                    <input type="text" class="form-control form-control-sm" placeholder="dd/mm/yyyy" value="<?php echo $advance_date; ?>" id="advance_date" name="advance_date">								
                                </div>
                            </div> 
							<div class="col-md-2">
                                <div class="form-group">
                                    <label for="amount">Advance Amount <span class="red-text">*</span></label>
                                    <input type="text" class="form-control form-control-sm required" placeholder="Amount" value="<?php echo $amount; ?>" id="amount" name="amount">
                                    
                                </div>
                            </div>
							
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="description">Description <span class="red-text">*</span></label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Description" value="<?php echo $description; ?>" id="description" name="description">								
                                </div>
                            </div>
                            <div class="col-md-2">
								<div class="form-group">
									<label for="status">Status <span class="red-text">*</span></label>
									<select class="form-control form-control-sm required" id="status" name="status" required>
										<option value="">Select</option>
										<option value="1" <?=($statusId == 1)?'selected':'';?>>Active</option>
										<option value="0" <?=($statusId == 0)?'selected':'';?>>In-Active</option>          
									</select>										
								</div>
							</div>                              
                        
                        </div>
					</div>
				</div>
			</div>
		</div>
			
        <div class="clearfix">&nbsp;</div>


    <div class="card-footer text-center">
        <input type="submit" class="btn btn-primary" value="Submit" />
        <input type="reset" class="btn btn-default" value="Reset" />
    </div>	
		
		</form>
	</div>
</div>