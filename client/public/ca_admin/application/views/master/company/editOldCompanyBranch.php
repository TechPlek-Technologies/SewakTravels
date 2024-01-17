<?php

$id = '';
$company_id = '';
$name = '';
$contact_person = '';
$email = '';
$mobile = '';	
$landline = '';	
$pan = '';
$gstin = '';
$pincode = '';
$address = '';
$city = '';
$state = '';
$statusId = '';


if(!empty($branchInfo))
{
    foreach ($branchInfo as $uf)
    {
        $id = $uf->id;
		$company_id = $uf->company_id;
		$name = $uf->name;
		$contact_person = $uf->contact_person;
		$email = $uf->email;
		$mobile = $uf->mobile;	
		$landline = $uf->landline;		
		$pan = $uf->pan;
		$gstin = $uf->gstin;
		$pincode = $uf->pincode;
		$address = $uf->address;
		$city = $uf->city;
		$state = $uf->state; 		
        $statusId = $uf->statusId;
    }
}


?>

<!-- Heading -->
<div class="card mb-3">
    <!--Card content-->
    <div class="card-body d-sm-flex justify-content-between">
        <h6 class="mb-sm-0">
            <a href="<?php echo base_url(); ?>companyListing" data-toggle="tooltip" data-placement="bottom" title="Company Master">Company Master</a>
            <span>/</span>
            <span>Edit Branch</span>
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
		<form role="form" id="editCompanyBranch" action="<?php echo base_url() ?>editCompanyBranch" method="post" autocomplete="off">
		<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
    <!--Card-->
        <div class="card">
            <div class="card-header white-text primary-color">Edit Branch Information</div>  
	        <!--Card content-->
	        <div class="card-body">

                    <div class="row">
					<div class="col-md-12">
                
						<div class="row">
						<div class="col-md-3">
                                     <div class="form-group">
                                        <label for="company_id">Company Name <span class="red-text">*</span></label>								
										<select class="form-control form-control-sm" id="company_id" name="company_id" required>
                                            <option value="">Select Company</option>
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
							<div class="col-md-3">
								 <div class="form-group">
									<label for="name">Branch Name <span class="red-text">*</span></label>
									<input type="text" class="form-control form-control-sm required" placeholder="Branch Name" value="<?php echo $name; ?>" id="name" name="name">
									
								</div>
							</div>                                
							<div class="col-md-3">
								 <div class="form-group">
									<label for="contact_person">Contact Person</label>
									<input type="text" class="form-control form-control-sm" placeholder="Contact Person" value="<?php echo $contact_person; ?>" id="contact_person" name="contact_person">
									
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="email">Email</label>
									<input type="text" class="form-control form-control-sm" placeholder="Email Address" value="<?php echo $email; ?>" id="email" name="email">									
								</div>
							</div>
						</div>
						<div class="row">						
							
							<div class="col-md-3">
								<div class="form-group">
									<label for="mobile">Mobile</label>
									<input type="text" class="form-control form-control-sm" placeholder="Mobile" value="<?php echo $mobile; ?>" id="mobile" name="mobile">								
								</div>
                            </div>
							<div class="col-md-3">
                                    <div class="form-group">
                                        <label for="landline">Landline</label>
										<input type="text" class="form-control form-control-sm" placeholder="Landline" value="<?php echo $landline; ?>" id="landline" name="landline">
										
                                    </div>
                                </div> 
								<!--<div class="col-md-3">
                                    <div class="form-group">
                                        <label for="pan">PAN</label>
										<input type="text" class="form-control form-control-sm" placeholder="PAN" value="<?php echo $pan; ?>" id="pan" name="pan">
										
                                    </div>
                                </div>                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="gstin">GSTIN</label>
										 <input type="text" class="form-control form-control-sm" placeholder="GSTIN" value="<?php echo $gstin; ?>" id="gstin" name="gstin">								
									</div>  
								</div>
                                -->
						</div>
						<div class="row">							
                                                               
								 
								<div class="col-md-3">
                                    <div class="form-group">
                                        <label for="pincode">Pincode</label>
										<input type="text" class="form-control form-control-sm" placeholder="Pincode" value="<?php echo $pincode; ?>" id="pincode" name="pincode" minlength="6" maxlength="6">
										
                                    </div>
                                </div> 								
								                               
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="address">Address</label>
										<input type="text" class="form-control form-control-sm" placeholder="Address" value="<?php echo $address; ?>" id="address" name="address">								
                                    </div>
                                </div>                                
                            
								<div class="col-md-3">
                                    <div class="form-group">
                                        <label for="city">City</label>
										<input type="text" class="form-control form-control-sm" placeholder="City" value="<?php echo $city; ?>" id="city" name="city">
										
                                    </div>
                                </div> 
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="state">State <span class="red-text">*</span></label>
										<select class="form-control form-control-sm" id="state" name="state" required>
                                            <option value="">Select State</option>
                                            <?php
                                            if(!empty($states))
                                            {
                                                foreach ($states as $rl)
                                                {
                                                    ?>
                                                <option value="<?php echo $rl->id ?>" <?php if($rl->id == $state) {echo "selected=selected";} ?>>
                                                    <?php echo $rl->state ?>
                                                </option>
                                                <?php
                                                }
                                            }
                                            ?>
                                        </select>								
                                    </div>
                                </div>                                
								                               
                                <div class="col-md-2">
									<div class="form-group">
										<label for="status">Status <span class="red-text">*</span></label>
										<select class="form-control form-control-sm required" id="status" name="status">
											<option value="">Select status</option>
											<option value="1" <?php if($statusId == 1) {echo "selected=selected";} ?>>Active</option>
											<option value="0" <?php if($statusId != 1) {echo "selected=selected";} ?>>In-Active</option>
															
										</select>
									</div>
                                </div>                                
                            </div>
                            <!-- /.box-body -->
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
              <!-- Accordion card -->
       <div class="card-footer text-center">
			<input type="submit" class="btn btn-primary" value="Submit" />
			<input type="reset" class="btn btn-default" value="Reset" />
		</div>
		</form>
</div>
</div>