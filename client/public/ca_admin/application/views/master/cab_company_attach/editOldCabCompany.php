<?php
$id = '';
$company_id = '';
$vendor_id = '';
$zone_id = '';
$zone_type_id = '';
$guard_price = '';
$statusId = '';
$all_vehicle_id = array();

if(!empty($cabCompanyInfo))
{
	$i=0;
    foreach ($cabCompanyInfo as $uf)
    {
        $id = $uf->id;
		$company_id = $uf->company_id;
		$vendor_id = $uf->vendor_id;
		$zone_id = $uf->zone_id;
		$zone_type_id = $uf->zone_type_id;
		$guard_price = $uf->guard_price;
        $statusId = $uf->statusId;
		$i++;
    }
}


?>

<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>cabCompanyListing" data-toggle="tooltip" data-placement="bottom" title="Cab Rate Master">Cab Rate Master</a>
            <span>/</span>
            <span>Edit Cab Rate</span>
        </h6>
    </div>
</div>
<!-- Heading -->


    <!--Grid row-->
<div class="row ">
    <!--Grid column-->
    <div class="col-md-12 mb-4">
    <!--Card-->
        <div class="card">
            <div class="card-header white-text primary-color">Enter Cab Rate Information</div>  
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
                <form role="form" id="editCabCompany" action="<?php echo base_url() ?>editCabCompany" method="post" autocomplete="off">
				<input type="hidden" name="cabCompanyId" id="cabCompanyId" value="<?php echo $id; ?>">						
						<div class="row">
								<div class="col-md-3" id="vendor_check_id">
                                     <div class="form-group">
                                        <label for="vendor_id">Vendor Name <span class="red-text">*</span></label>
										<select class="form-control required vendor_id" id="vendor_id" name="vendor_id" required>
                                            <option value="">Select Vendor</option>
                                            <?php
                                            if(!empty($vendorList))
                                            {
                                                foreach ($vendorList as $rl)
                                                {
                                                    ?>
                                                <option value="<?php echo $rl->id ?>" <?php if($rl->id == $vendor_id) {echo "selected=selected";} ?>>
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
                                        <label for="vehicle_id">Vehicle No.</label>
										<select class="form-control form-control-sm" id="vehicle_id" name="vehicle_id" multiple="multiple" readonly>
                                            <!-- <?php
                                            if(!empty($vehicleList))
                                            {
                                                foreach ($vehicleList as $rl)
                                                {
                                                    ?>
                                                <option value="<?php echo $rl->id ?>" <?php if($rl->id == set_value('vehicle_id')) {echo "selected=selected";} ?>>
                                                    <?php echo $rl->vehicle_no ?>
                                                </option>
                                                <?php
                                                }
                                            }
                                            ?> -->
                                        </select>										
                                    </div>
                                </div>
								
								<div class="col-md-3">
                                     <div class="form-group">
                                        <label for="company_id">Company Name <span class="red-text">*</span></label>
										<select class="form-control form-control-sm required" id="company_id" name="company_id[]" multiple style="height:120px;">
                                            <option value="0">Select Company</option>
                                            <?php
                                            if(!empty($companyList))
                                            {
                                                foreach ($companyList as $rl)
                                                {
                                                    ?>
                                                <option value="<?php echo $rl->id ?>" <?php if($rl->id == $company_id) {echo "selected=selected";} ?>>
                                                    <?php echo $rl->company_name ?>
                                                </option>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </select>										
                                    </div>
                                </div>
								
								 
								</div>
							
														
					

                            <!-- /.box-body -->

                            
                </div>
                
				</div>				
			</div>
		</div>
		
		
		
		
		
		
		<div class="clearfix">&nbsp;</div>
		<div id="company_wise">
		</div>
		<div class="card-footer text-center">
				<!-- <input type="submit" class="btn btn-primary" value="Submit" /> -->
				<a href="javascript:void(0);" class="btn btn-info" id="save_edit_cabrate">Edit Cab Rate</a>
				<input type="reset" class="btn btn-default" value="Reset" />
			</div>
	</form>
		
		
	</div>
</div>